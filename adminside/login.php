<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
}
// Database connection parameters
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'crawford_uni';

// Connect to the database
$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
  die('Connection failed: ' . mysqli_connect_error());
}

// Retrieve username and password from the form
$matric_no = $_POST['matric_no'];
$password = $_POST['password'];

$_SESSION['matric_no'] = $matric_no;

// Prepare the SQL query using a prepared statement
$sql = "SELECT * FROM login_credentials WHERE matric_no=? AND password=?";
$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
  die('Error in preparing the statement: ' . mysqli_error($conn));
}

// Bind the parameters to the prepared statement
mysqli_stmt_bind_param($stmt, 'ss', $matric_no, $password);

// Execute the prepared statement
mysqli_stmt_execute($stmt);
var_dump($result);

// Get the result from the prepared statement
$result = mysqli_stmt_get_result($stmt);
var_dump($row);

// Check if there is a row returned
if (mysqli_num_rows($result) == 1) {
    header('Location: dashboard!.php');
  exit;
} else {
  // Invalid username or password
  $error = "Invalid username or password";
  include("login.html");
}

// Close the prepared statement
mysqli_stmt_close($stmt);

// Close the database connection
mysqli_close($conn);
?>
