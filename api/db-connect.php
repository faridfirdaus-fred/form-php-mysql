<?php
// Database configuration
$servername = "localhost";
$username = "root";  // Change to your MySQL username
$password = "";      // Change to your MySQL password
$dbname = "form_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set character set to UTF-8
$conn->set_charset("utf8");
?>
