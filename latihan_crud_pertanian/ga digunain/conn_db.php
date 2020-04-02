<?php

$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "pertanian";

$conn = mysqli_connect($servername, $username, $pass, $dbname);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

session_start();
$_SESSION['conn'] = $conn;

?>