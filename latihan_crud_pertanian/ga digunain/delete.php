<?php

function index(){
    $id = $_GET['id'];
    $conn = mysqli_connect("localhost", "root", "", "pertanian");
    $sql = "DELETE FROM tabel_panen WHERE id = " .$id;
    echo $id;
    if(mysqli_query($conn, $sql)){
        echo $id;
    }else{
        echo "error: " .mysqli_error($conn);
    }
}

?>