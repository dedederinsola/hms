<?php
require 'connectMySQLi.php';

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
// var_dump($stmt);

// Get the result from the prepared statement
$result = mysqli_stmt_get_result($stmt);
// var_dump($result);

// Check if there is a row returned
if (mysqli_num_rows($result) == 1) {
    header('Location: studentside/dashboard.php');
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
