<?php
$servername = "localhost";
$database = "web";
$username = "root";
$password = "123456";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>