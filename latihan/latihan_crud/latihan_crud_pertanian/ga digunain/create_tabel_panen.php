<?php

$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "pertanian";

$conn = new mysqli($servername, $username, $pass, $dbname);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE tabel_panen (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nama_tanaman VARCHAR(30) NOT NULL,
hasil_panen INT(30) NOT NULL,
lama_tanam INT(11) NOT NULL,
tanggal_panen DATE NULL)";

if($conn->query($sql) === TRUE){
    echo "Table tabel_panen created successfully";
}else{
    echo "Error created table: " . $conn->error;
}

?>