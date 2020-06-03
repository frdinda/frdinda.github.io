<?php

$servername = 'localhost';
$username = 'root';
$pass = '';
$dbname = 'sekolah';

$conn = new mysqli($servername, $username, $pass, $dbname);

if($conn->connect_error){
    die("Connection failed: " .$conn->connect_error);
}else{
    $sql = "CREATE TABLE tb_guru(
    nip VARCHAR(5) PRIMARY KEY,
    nama VARCHAR(30) NOT NULL,
    tanggal_lahir DATE NOT NULL,
    mata_pelajaran VARCHAR(30) NOT NULL)";

    if($conn->query($sql) === TRUE){
        echo "Table Created Successfully";
    }else{
        echo "Error Created Table: " .$conn->error;
    }
}

?>