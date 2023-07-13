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

// Connect to the database using PDO and prepared statements
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
?>