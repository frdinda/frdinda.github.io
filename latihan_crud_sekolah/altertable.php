<?php

$servername = 'localhost';
$username = 'root';
$pass = '';
$dbname = 'sekolah';

$conn = new mysqli($servername, $username, $pass, $dbname);

if($conn->connect_error){
    die("Connection failed: " .$conn->connect_error);
}else{
    $sql = "ALTER TABLE tb_murid ADD alamat VARCHAR(50)";

    if($conn->query($sql) === TRUE){
        echo "Column added successfully";
    }else{
        echo "Error while adding column: " .$conn->error;
    }
}

?>