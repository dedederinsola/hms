<?php

include 'studentdetailsMySQLi.php';



echo 'please nau';
var_dump($matric_no, $_POST['hostel'], $_POST['room_no']);


if (isset($_POST['upload'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['hostel']) && isset($_POST['room_no'])) {
            $hostel = $_POST['hostel'];
            $room_no = $_POST['room_no'];
            $matric_no = $_SESSION['matric_no'];
            $name = $_SESSION['name'];
        } else {
            echo 'hi';
            var_dump($hostel, $room_no, $matric_no, $name);
            die ('Error executing query :' .$conn->error());
        }
    } else {
        echo 'why';
        die ('Error executing query :' .$conn->error());
    } 


    $sql = mysqli_prepare($conn, "SELECT * FROM p_o_p WHERE matric_no = ?");

    mysqli_stmt_bind_param($sql, 's', $matric_no);

    mysqli_stmt_execute($sql);

    $result = mysqli_stmt_get_result($sql);

    if ($result->num_rows != 0){
        echo 'You have already requested a room';
        include 'requestroom.php';
        exit();
    }


    $validExtensions = ['jpeg', 'jpg', 'png']; 
    $imageTemp = $_FILES['image']['tmp_name'];
    if (empty($_FILES['image'])) {
        $message = "Upload an image";
        include 'requestroom.php';
    }

    $imageExtension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

    


    if (!in_array($imageExtension, $validExtensions)) {
        $message = "Only JPEG, JPG, and PNG files are allowed.";
        include 'requestroom.php';
        exit();

    } else {
        $imageData = file_get_contents(addslashes($imageTemp));


        // Prepare the SQL statement
        $stmt = mysqli_prepare($conn, "INSERT INTO p_o_p (matric_no, name, hostel, room_no, proof) VALUES (?, ?, ?, ?, ?)");

        // Bind the image data as a parameter
        mysqli_stmt_bind_param($stmt, "sssss", $matric_no, $name, $hostel, $room_no, $imageData);

        // Execute the statement
        $success = mysqli_stmt_execute($stmt);



        if ($success){
            $message= "Image uploaded successfully!";
            header('Location: dashboard!.php');

        } else {
            $message= "Failed to upload the image.";
        }

        // Close the statement
        $stmt->close();
    }
} else {
    echo 'why';
    // var_dump($matric_no, $name, $hostel, $room_no);
    // die ('Error executing query :' .$conn->error());
}


// Close the database connection
$conn->close();

?>
