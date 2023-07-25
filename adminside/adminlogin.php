<?php
require_once 'connectMySQLi.php';

// Retrieve username and password from the form
$employee_id = $_POST['employee_id'];
$password = $_POST['password'];

// Prepare the SQL query using a prepared statement
$sql = "SELECT * FROM admin_login WHERE employee_id=? AND password=?";
$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
  die('Error in preparing the statement: ' . mysqli_error($conn));
}

// Bind the parameters to the prepared statement
mysqli_stmt_bind_param($stmt, 'ss', $employee_id, $password);

// Execute the prepared statement
mysqli_stmt_execute($stmt);
// var_dump($result);

// Get the result from the prepared statement
$result = mysqli_stmt_get_result($stmt);

// Check if there is a row returned
if (mysqli_num_rows($result) == 1) {
  if ($employee_id == 'Superadmin') {
    header('Location: superadmin.php');
    $_SESSION['employee_id'] = 'Superadmin';
  }
  else {
    header('Location: admincomplaints.php');
    $_SESSION['employee_id'] = $employee_id;
  }
  exit;
} else {
  // Invalid username or password
  $error = "Invalid username or password";
  include("adminlogin.html");
}

// Close the prepared statement
mysqli_stmt_close($stmt);

// Close the database connection
mysqli_close($conn);
?>
