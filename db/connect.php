<?php
$servername = "localhost";
$database = "web_h3s";
$user = "root";
$password = "";
$conn = mysqli_connect($servername, $user, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>