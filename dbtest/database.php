<?php
$servername = "127.0.0.1:8000";
$username = "user@name";
$password = "123456";
$database = "database";
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>
