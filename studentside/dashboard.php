<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set database connection parameters
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'crawford_uni';

// Connect to the database using PDO and prepared statements
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}

// Ensure the session has started before accessing its variables
//session_start();

// Get the student info from the database using a prepared statement
$matric_no = $_POST['matric_no'];
$sql = "SELECT * FROM students WHERE matric_no = matric_no";
$stmt = $conn->prepare($sql);
$stmt->bindParam('matric_no', $matric_no);
$stmt->execute();

// Check if the query executed successfully
if ($stmt->rowCount() === 0) {
    die('Error in retrieving student info: no student found');
}

// Store the student info in variables
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$_SESSION['id_image'] = $row['id_image'];
$_SESSION['name'] = $row['name'];
$_SESSION['dept'] = $row['dept'];
$_SESSION['level'] = $row['level'];
$_SESSION['matric_no'] = $row['matric_no'];
$_SESSION['gender'] = $row['gender'];
$_SESSION['dob'] = $row['dob'];
$_SESSION['room_no'] = $row['room_no'];
?>
