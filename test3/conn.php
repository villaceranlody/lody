<?php
// Database configuration
$host = 'localhost';  // Your database host (usually localhost)
$dbname = 'user_signup';  // Database name
$username = 'root';  // Your MySQL username (adjust if necessary)
$password = '';  // Your MySQL password (adjust if necessary)

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
