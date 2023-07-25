<?php

require_once 'studentdetailsMySQLi.php';


// echo 'please nau';
// var_dump($matric_no, $_POST['hostel'], $_POST['room_no']);


if (isset($_POST['upload'])) {
    // echo 'hi </br>';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // echo 'hi </br>';

        if (isset($_POST['hostel']) && isset($_POST['room_no'])) {
            // echo 'hi </br>';

            $hostel = $_POST['hostel'];
            $unroom_no = $_POST['room_no'];
            $room_no = mysqli_real_escape_string($conn, $unroom_no);
            $matric_no = $_SESSION['matric_no'];
            $name = $_SESSION['name'];
            // var_dump($matric_no, $name, $hostel, $room_no);

        } else {
            // echo 'hi </br>';
            var_dump($hostel, $room_no, $matric_no, $name);
            die ('Error executing query :' .$conn->error());
        }
    } else {
        // echo 'why';
        die ('Error executing query :' .$conn->error());
    } 


    $sql = mysqli_prepare($conn, "SELECT * FROM p_o_p WHERE matric_no = ?");


    mysqli_stmt_bind_param($sql, 's', $matric_no);

    mysqli_stmt_execute($sql);



    $result = mysqli_stmt_get_result($sql);

    if ($result->num_rows != 0){
        $error = 'You have already requested a room';
        include('requestroom.php');
        // header('Location: requestroom.php');
        // exit();
    }


    $validExtensions = ['jpeg', 'jpg', 'png']; 
    $imageTemp = $_FILES['image']['tmp_name'];


    // if (empty($_FILES['image'])) {
    //     $error = "Upload an image";
    //     include('requestroom.php');
    //     // header('Location: requestroom.php');
    // }

    $imageExtension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

    


    if (!in_array($imageExtension, $validExtensions)) {
        $error = "Only JPEG, JPG, and PNG files are allowed.";
        include('requestroom.php');
        // header('Location: requestroom.php');
        exit();

    } else {
        $imageData = file_get_contents(addslashes($imageTemp));


        // Prepare the SQL statement
        $stmt = mysqli_prepare($conn, "INSERT INTO p_o_p (matric_no, name, hostel, room_no, proof) VALUES (?, ?, ?, ?, ?)");

        if (!$stmt) {
            die("Error preparing SQL statement stmt: " . mysqli_error($conn));
        }
    

        // Bind the image data as a parameter
        mysqli_stmt_bind_param($stmt, "sssss", $matric_no, $name, $hostel, $room_no, $imageData);

        // Execute the statement
        $success = mysqli_stmt_execute($stmt);

        if (!$success) {
            die("Error executing SQL statement success: " . mysqli_error($conn));
        }



        if ($success){
            $smessage= "Image uploaded successfully!";
            include('requestroom.php');

            // header('Location: dashboard!.php');

        }

        // Close the statement
        $stmt->close();
    }
} else {
    // echo 'why';
    // var_dump($matric_no, $name, $hostel, $room_no);
    // die ('Error executing query :' .$conn->error());
}

// var_dump($matric_no, $name, $hostel, $room_no, $imageData);
// var_dump($_FILES);


// Close the database connection
$conn->close();

?>
