<?php

require 'conn_db.php';

$conn = $_SESSION['conn'];
$sql = "SELECT * FROM tabel_panen ORDER BY id";
$query = mysqli_query($conn, $sql);
$_SESSION['query'] = $query;
$data = mysqli_fetch_assoc($query);
$SESSION['data'] = $data;

?>