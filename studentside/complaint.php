<?php
require_once 'studentdetailsMySQLi.php';

error_reporting(0);

$success= ''; 
$error = '';

// Insert user information into the database
$user_info = "INSERT INTO activecomplaints (room_no, category, description, date_time_available) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $user_info);
if (!$stmt) {
    die('Error preparing query: ' . mysqli_error($conn));
}

$room_no = $_SESSION['room_no'];
$category = $_POST['category'];
$description = $_POST['description'];
$date_time_available = $_POST['date_time_available'];




if (!mysqli_stmt_bind_param($stmt, "ssss", $room_no, $category, $description, $date_time_available)) {
    die('Error binding parameters: ' . mysqli_error($conn));
}

if (empty($date_time_available) || empty($description)) {
    $error = 'Description and date and time you\'ll be available is required.';
    include('complaint!.php');

} elseif(empty($room_no)){
    $error = 'You don\'t have a room yet.';
    include('complaint!.php');
} else {
    if (!mysqli_stmt_execute($stmt)) {
        include('complaint!.php');
    } else{
         $success = "Your complaint will be attended to.";
         include("complaint!.php");
    }
}



// Close the database connection
mysqli_close($conn);

?>