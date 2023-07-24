<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}
  
// Clear all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page
header('Location: adminlogin.html');
exit();
?>