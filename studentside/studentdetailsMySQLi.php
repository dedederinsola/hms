<?php
include_once 'connectMySQLi.php';
// Ensure the session has started before accessing its variables

// Get the student info from the database using a prepared statement
$matric_no = $_SESSION['matric_no'];
$sql = "SELECT * FROM students WHERE matric_no = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $matric_no);
$stmt->execute();

// Check if the query executed successfully
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    die('Error in retrieving student info: no student found, kindly log in');
}

// Store the student info in variables
$row = $result->fetch_assoc();
$imageData = $row['id_image'];
$_SESSION['name'] = $row['name'];
$_SESSION['dept'] = $row['dept'];
$_SESSION['level'] = $row['level'];
$_SESSION['matric_no'] = $row['matric_no'];
$_SESSION['gender'] = $row['gender'];
$_SESSION['dob'] = $row['dob'];
$_SESSION['room_no'] = $row['room_no'];

// Convert the BLOB data to base64 encoding
$imageDataEncoded = base64_encode($imageData);
?>
