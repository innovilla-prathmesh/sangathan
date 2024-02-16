<?php
$hostname = "localhost"; // Replace with your database host name or IP address
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$database = "sanathan"; // Replace with your database name

// Create a connection to the database
$conn = new mysqli($hostname, $username, $password, $database);

// /*
// Check the connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } else {
//     echo "Connected successfully";
// }
// */
?>