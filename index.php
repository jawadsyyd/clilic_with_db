<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinicdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_errno) {
  echo "Failed to connect to MySQL: " . $conn->connect_error;
  exit;
}

echo "Connected successfully";

// Perform database operations here

$conn->close();
?>