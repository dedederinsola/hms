<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

// Set database connection parameters
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'crawford_uni';

// Connect to the database using MySQLi
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->error) {
    die('Connection failed: ' . $conn->error);
}
?>
