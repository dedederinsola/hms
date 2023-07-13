<?php 
// Set database connection parameters
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'girls_hostel';

// Connect to the database
$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Get the image file contents
$imageData = file_get_contents('C:\wamp64\www\hostel management project\pictures\id_image1.jpg');

// Check for errors in file_get_contents
if (!$imageData) {
    die('Error reading file: ' . error_get_last()['message']);
}

// Prepare the SQL query
$sql = "UPDATE students SET id_image = ?";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    die('Error in preparing the statement: ' . mysqli_error($conn));
}

// Bind the parameters to the prepared statement
mysqli_stmt_bind_param($stmt, 's', $imageData);

// Execute the prepared statement
if (mysqli_stmt_execute($stmt)) {
    echo 'Images updated successfully';
} else {
    die('Error in executing the statement: ' . mysqli_stmt_error($stmt));
}

// Close the prepared statement
mysqli_stmt_close($stmt);

// Close the database connection
mysqli_close($conn);
?>