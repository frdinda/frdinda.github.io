<?php

require 'conn_db.php';

$conn = $_SESSION['conn'];
if(isset($_POST['btn_simpan'])){
$id = time();
$nama_tanaman = $_POST["nama_tanaman"];
$hasil_panen = $_POST["hasil_panen"];
$lama_tanam = $_POST["lama_tanam"];
$tanggal_panen = $_POST["tanggal_panen"];

    if(!empty($nama_tanaman) && !empty($hasil_panen) && !empty($lama_tanam) && !empty($tanggal_panen)){
    $sql = "INSERT INTO tabel_panen (id, nama_tanaman, hasil_panen, lama_tanam, tanggal_panen) VALUES(".$id.", '".$nama_tanaman."', ".$hasil_panen.", ".$lama_tanam.", '".$tanggal_panen."')";
        if (mysqli_query($conn, $sql)) {
            header ('location: index.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }else{
            header ('location: index.php');
    }

}

?>