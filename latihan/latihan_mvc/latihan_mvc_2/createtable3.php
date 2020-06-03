<?php

$servername = 'localhost';
$username = 'root';
$pass = '';
$dbname = 'journal';

$conn = new mysqli($servername, $username, $pass, $dbname);

// if($conn->connect_error){
    // die("Connection failed: " .$conn->connect_error);
// }else{
    // $sql = "CREATE DATABASE journal";

    // if($conn->query($sql)){
        // echo "database created successfully";
    // }else{
        // echo "error creating database: " .$conn->error;
    // }
// }

if($conn->connect_error){
    die("connection failed: " .$conn->connect_error);
}else{
    $sql = "CREATE TABLE tb_journal(
    id INT(5) AUTO_INCREMENT,
    tanggal_input DATE NOT NULL,
    judul VARCHAR(50) NOT NULL,
    isi VARCHAR(2000) NOT NULL,
    PRIMARY KEY(id))";

    if($conn->query($sql) === TRUE){
        echo "table created successfully";
    }else{
        echo "error creating table: " .$conn->error;
    }
}

?>