<?php
// connection dado
$servername = 'servername';
$dbname = 'dbname';
$username = 'username';
$password = 'password';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	echo "erro";
	die("Connection failed: " . $conn->connect_error);
}
?>