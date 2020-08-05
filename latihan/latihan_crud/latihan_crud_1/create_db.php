<?php

$servername = 'localhost';
$username = 'root';
$pass = '';

$conn = new mysqli($servername, $username, $pass);

if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
}else{
    $sql = "CREATE DATABASE sekolah";

    if($conn->query($sql) === TRUE){
        echo "Database created successfully";
    }else{
        echo "Error creating database: " .$conn->error;
    }
}

?>