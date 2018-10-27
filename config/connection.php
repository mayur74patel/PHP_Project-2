<?php 
$servername = "localhost";
$username = "patel";
$password = "patel";
$database = "airport";


global $conn;
$conn = mysqli_connect($servername, $username, $password,$database);
if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}

?>