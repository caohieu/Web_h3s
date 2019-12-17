<?php
$servername = "localhost";
$database = "web";
$user = "root";
$password = "123456";
$conn = mysqli_connect($servername, $user, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>