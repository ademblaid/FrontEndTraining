<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "friend";

// Create a connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>