<!DOCTYPE html>
<html lang = "en">
<head>
    <title>CRUD MURID 1</title>
</head>
<body>
    <?php
        $servername = 'localhost';
        $username = 'root';
        $pass = '';
        $dbname = 'sekolah';

        $conn = new mysqli($servername, $username, $pass, $dbname);
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
                            <input type="number" name="nis">
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Siswa</td>
                        <td>
                            <input type="text" name="nama_siswa">
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>
                            <input type="date" name="tanggal_lahir">
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>
                            <input type="text" name="alamat">
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
    <div class="table">
        <?php
            $sql = "SELECT * FROM tb_murid";
            $query = $conn->query($sql);
        ?>
        <fieldset>
            <legend><h2>Data Siswa</h2></legend>
            <table border='0' cellpadding='10'>
                <tr>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                    while($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td><?= $data['nis'];?></td>
                    <td><?= $data['nama'];?></td>
                    <td><?= $data['tanggal_lahir'];?></td>
                    <td><?= $data['alamat'];?></td>
                    <td>
                        <a href="update_murid_1.php?id=<?= $data['nis'];?>">update</a>
                        <a href="index_murid_1.php?id=<?= $data['nis'];?>" onClick="return confirm ('yakin?');">delete</a>
                    </td>
                <tr>
                <?php
                    }
                ?>
            </table>
        </fieldset>
    </div>
    <div class="menu">
        <h1><a href="index.php">Back to Menu</a></h1>
    </div>
    <?php
        if(isset($_POST['btn_simpan'])){
            tambah_data($conn);
        }
        function tambah_data($conn){
            $nis = $_POST['nis'];
            $nama = $_POST['nama_siswa'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $alamat = $_POST['alamat'];

            if(!empty($nis) && !empty($nama) && !empty($tanggal_lahir) && !empty($alamat)){
                $sql = "INSERT INTO tb_murid(nis, nama, tanggal_lahir, alamat) VALUE (".$nis.", '".$nama."', '".$tanggal_lahir."', '".$alamat."')";
                if($conn->query($sql) === TRUE){
                    header('location: index_murid_1.php');
                }else{
                    echo "Error: " .$sql. "<br>" .$conn->error;
                }
            }else{
                echo "jiah";
            }
        }
        if(isset($_GET['id'])){
            $nis = $_GET['id'];
            delete_data($conn, $nis);
        }
        function delete_data($conn, $nis){
            $sql = "DELETE FROM tb_murid WHERE nis = " .$nis;
            if($conn->query($sql) === TRUE){
                header ('location: index_murid_1.php');
            }else{
                echo "Error: " .$sql. "<br>" .$conn->error;
            }
        }
    ?>
</body>
</html>