<?php
// Start or resume the session
session_start();

// Unset all session variables
$_SESSION = array();
unset($_SESSION['user_ID']);

// Destroy the session
session_destroy();

// Redirect to the login page or any other page after logout
header("Location: ./../login.php");
exit();
?>
