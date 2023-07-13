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
// $matric_no = $_SESSION['employee_id'];
$sql = "SELECT * FROM students";
$stmt = $conn->prepare($sql);
$stmt->execute();

// Check if the query executed successfully
if ($mysqli->stmt($stmt)) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $room_no = $row["room_no"];
        $category = $row["category"];
        $description = $row["description"];
        $date_time_available = $row["date_time_available"];
        $resolved = $row["resolved"];
        }
}
else {
    die('Error in retrieving student info: no student found');
}
?>