<?php 
require 'connectMySQLi.php'; 

$room_no = NULL;
$description = NULL;
$category = NULL;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the matriculation number is present
    if (isset($_POST['room_no'], $_POST['date_time_available'])){ 

        $room_no = $_POST['room_no'];
        $description = $_POST['description'];
        $category = $_POST['category'];

        //Select the record where room_no and date_time is the same as the one submitted, using a prepared statement
        $query = "INSERT INTO resolvedcomplaints (room_no, category, description, date_time_resolved) VALUES (?, ?, ?, NOW())";
        $stmt = mysqli_prepare($conn, $query);
        if (!$stmt) {
            die('Error in preparing the statement: ' . mysqli_error($conn));
        }
        mysqli_stmt_bind_param($stmt, 'sss', $room_no, $category, $description,);
        mysqli_stmt_execute($stmt);
        // echo 'Error: ' . mysqli_error($conn) .'</br>';
        // $result = mysqli_stmt_get_result($stmt);
        // var_dump($result);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            include 'admincomplaints.php';
        } else {
            echo 'Failed to insert into resolvedcomplaints';
        }
        // var_dump($room_no, $date_time_available);
    } else {
        echo 'Incomplete info';
    }
    // var_dump($room_no, $date_time_available);


    // var_dump($room_no, $date_time_available);

}
