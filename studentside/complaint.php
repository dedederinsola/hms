<?php
// Set error reporting and display errors
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

// Connect to the database
$connect = mysqli_connect("localhost", "root", "", "crawford_uni");
if (!$connect) {
    die('Connection Failed: ' . mysqli_connect_error());
}

// Insert user information into the database
$user_info = "INSERT INTO activecomplaints (room_no, category, description, date_time_available) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($connect, $user_info);
if (!$stmt) {
    die('Error preparing query: ' . mysqli_error($connect));
}

$room_no = $_SESSION['room_no'];
$category = $_POST['category'];
$description = $_POST['description'];
$date_time_available = $_POST['date_time_available'];

if (!mysqli_stmt_bind_param($stmt, "ssss", $room_no, $category, $description, $date_time_available)) {
    die('Error binding parameters: ' . mysqli_error($connect));
}

if (!mysqli_stmt_execute($stmt)) {
    die('Error executing query, Have you gotten a room?: ' . mysqli_error($connect));
} else{
    $success = "Your complaint will be attended to.";
    include("complaint!.html");
}

// Close the database connection
mysqli_close($connect);



// // Set error reporting and display errors
// if (session_status() == PHP_SESSION_NONE) {
//     session_start();
//     error_reporting(E_ALL);
//     ini_set('display_errors', 1);
// }

// // Connect to the database
// $connect = mysqli_connect("localhost", "root", "", "crawford_uni");
// if (!$connect) {
//     die('Connection Failed: ' . mysqli_connect_error());
// }

// // Insert user information into the database
// $user_info = "INSERT INTO activecomplaints (room_no, category, description, date_time_available) VALUES (?, ?, ?, ?)";
// $stmt = mysqli_prepare($connect, $user_info);
// if (!$stmt) {
//     die('Error preparing query: ' . mysqli_error($connect));
// }
// $room_no = $_POST['room_no'];
// $category = $_POST['category'];
// $description = $_POST['description'];
// $date_time_available = $_POST['date_time_available'];
// if (!mysqli_stmt_bind_param($stmt, "ssss", $room_no, $category, $description, $date_time_available)) {
//     die('Error binding parameters: ' . mysqli_error($connect));
// }
// if (!mysqli_stmt_execute($stmt)) {
//     die('Error executing query: ' . mysqli_error($connect));
// } else{
//     $success = "Your complaint will be attended to.";
//     include("complaint!.php");
// }
// // Close the database connection
// mysqli_close($connect);
?>