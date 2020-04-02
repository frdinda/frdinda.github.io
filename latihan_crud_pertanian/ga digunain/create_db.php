<?php

$servername = "localhost";
$username = "root";
$pass = "";

$conn = new mysqli($servername, $username, $pass);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE pertanian";

if($conn->query($sql) === TRUE){
    echo "Database created successfully";
}else{
    echo "Error creating database: " . $conn->error;
}

?>