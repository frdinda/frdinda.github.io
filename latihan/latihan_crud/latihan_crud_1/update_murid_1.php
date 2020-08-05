<!DOCTYPE html>
<html lang="en">
<head>
    <title>UPDATE MURID 1</title>
</head>
<body>
<?php
        $servername = 'localhost';
        $username = 'root';
        $pass = '';
        $dbname = 'sekolah';

        $conn = new mysqli($servername, $username, $pass, $dbname);
        $nis = $_GET['id'];

        $sql = "SELECT * FROM tb_murid WHERE nis = " .$nis;
        $query = $conn->query($sql);
        $data = mysqli_fetch_array($query);
    ?>
    <h1>DATA SISWA</h1>
    <div class = "form">
        <form action="" method="POST">
            <fieldset>
                <legend><h2>TAMBAH DATA</h2></legend>
                <table border='0' cellpadding='10'>
                    <tr>
                        <td>NIS</td>
                        <td>
                            <input type="number" name="nis" value="<?= $data['nis'];?>" disabled="disabled">
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Siswa</td>
                        <td>
                            <input type="text" name="nama_siswa" value="<?= $data['nama'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>
                            <input type="date" name="tanggal_lahir" value="<?= $data['tanggal_lahir'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>
                            <input type="text" name="alamat" value="<?= $data['alamat'];?>">
                        </td>
                    </tr>
                </table>
                <br>
                <br>
                <input type="submit" name="btn_simpan" value="Simpan">
                <input type="reset" name="btn_reset" value="Reset">
            </fieldset>
        </form>
    </div>
    <div class="back">
        <h2><a href="index_murid_1.php">Kembali</a></h2>
    </div>
    <?php
        if(isset($_POST['btn_simpan'])){
            update_data($conn, $nis);
        }
        function update_data($conn, $nis){
            $nama = $_POST['nama_siswa'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $alamat = $_POST['alamat'];

            if(!empty($nis) && !empty($nama) && !empty($tanggal_lahir) && !empty($alamat)){
                $sql = "UPDATE tb_murid SET 
                nama = '".$nama."', 
                tanggal_lahir = '".$tanggal_lahir."', 
                alamat = '".$alamat."'
                WHERE nis = ".$nis;
                if($conn->query($sql) === TRUE){
                    header('location: index_murid_1.php');
                }else{
                    echo "Error: " .$sql. "<br>" .$conn->error;
                }
            }else{
                echo "jiah";
            }
        }
    ?>
</body>
</html>