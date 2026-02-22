<?php
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$dbname = "nexus"; // Using your existing database name from nexus.sql

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set character set to UTF-8
$conn->set_charset("utf8mb4");
?>