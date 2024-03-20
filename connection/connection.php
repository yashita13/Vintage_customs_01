<?php
$servername = "localhost";
$database = "vintage";
$username = "root";
$password = "2188";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check the connection
if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>