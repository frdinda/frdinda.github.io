<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD GURU</title>
</head>
<body>
    <?php
        $servername = 'localhost';
        $username = 'root';
        $pass = '';
        $dbname = 'sekolah';
        $conn = new mysqli($servername, $username, $pass, $dbname);
    ?>
    <h1>DATA GURU</h1>
    <div class="form">
        <form action="" method="POST">
            <fieldset>
                <legend><h2>Tambah Data</h2></legend>
                <table border='0' cellpadding='10'>
                    <tr>
                        <td>NIP</td>
                        <td>
                            <input type="number" name="nip">
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Guru</td>
                        <td>
                            <input type="text" name="nama_guru">
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>
                            <input type="date" name="tanggal_lahir">
                        </td>
                    </tr>
                    <tr>
                        <td>Mata Pelajaran</td>
                        <td>
                            <select name="mata_pelajaran">
                                <option value="matematika">Matematika</option>
                                <option value="bahasa inggris">Bahasa Inggris</option>
                                <option value="ipa">IPA</option>
                            </select>
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
            $sql = "SELECT * FROM tb_guru ORDER BY nip";
            $query = $conn->query($sql);
        ?>
        <fieldset>
            <legend><h2>Data Guru</h2></legend>
            <table border='1' cellpadding='10'>
                <tr>
                    <th>NIP</th>
                    <th>Nama Guru</th>
                    <th>Tanggal Lahir</th>
                    <th>Mata Pelajaran</th>
                    <th></th>
                </tr>
                <?php
                    while($data = mysqli_fetch_array($query)){
                        
                ?>
                <tr>
                    <td><?= $data['nip'];?></td>
                    <td><?= $data['nama']?></td>
                    <td><?= $data['tanggal_lahir'];?></td>
                    <td><?= $data['mata_pelajaran'];?></td>
                    <td>
                        <a href="update_guru.php?id=<?= $data['nip'];?>">update</a>
                        <a href="index_guru.php?id=<?= $data['nip'];?>" onClick="return confirm ('yakin?')">delete</a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </fieldset>
    </div>
    <div class="menu">
        <h2><a href="index.php">Back To Menu</a></h2>
    </div>
    <?php
        if(isset($_POST['btn_simpan'])){
            tambah_data($conn);
        }
        function tambah_data($conn){
            $nip = $_POST["nip"];
            $nama = $_POST["nama_guru"];
            $tanggal_lahir = $_POST["tanggal_lahir"];
            $mata_pelajaran = $_POST["mata_pelajaran"];

            if(!empty($nip) && !empty($nama) && !empty($tanggal_lahir) && !empty($mata_pelajaran)){
                $sql = "INSERT INTO tb_guru (nip, nama, tanggal_lahir, mata_pelajaran) VALUES (".$nip.", '".$nama."', '".$tanggal_lahir."', '".$mata_pelajaran."')";
                if($conn->query($sql) === TRUE){
                    header('location: index_guru.php');
                }else{
                    echo "Error: " .$sql. "<br>" .$conn->error; 
                }
            }else{
                header('location: index_guru.php');
            }
        }
        if(isset($_GET['id'])){
            $nip = $_GET['id'];
            delete_data($nip, $conn);
        }
        function delete_data($nip, $conn){
            $sql = "DELETE FROM tb_guru WHERE nip = " .$nip;
            if($conn->query($sql) === TRUE){
                header('location: index_guru.php');
            }
        }
    ?>
</body>
</html>