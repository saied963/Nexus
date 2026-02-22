<?php
// db_connect.php
$host = "localhost";
$user = "root";
$password = "";
$db = "productenowner"; // jouw database naam

// Maak verbinding met de database
$conn = new mysqli($host, $user, $password, $db);

// Check of de verbinding succesvol is
if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}
?>
