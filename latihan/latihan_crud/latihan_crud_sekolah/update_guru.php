<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Guru</title>
</head>
<body>
    <?php
        $servername = 'localhost';
        $username = 'root';
        $pass = '';
        $dbname = 'sekolah';
        $conn = new mysqli($servername, $username, $pass, $dbname);

        if(isset($_GET['id'])){
            $nip = $_GET['id'];
            $sql = "SELECT * FROM tb_guru WHERE nip = " .$nip;
            $query = $conn->query($sql);
            $data = mysqli_fetch_array($query);
        }
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
                            <input type="number" name="nip" value="<?= $data['nip'];?>" disabled="disabled">
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Guru</td>
                        <td>
                            <input type="text" name="nama_guru" value="<?= $data['nama'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>
                            <input type="date" name="tanggal_lahir" value="<?= $data['tanggal_lahir'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Mata Pelajaran</td>
                        <td>
                            <select name="mata_pelajaran">
                                <?php 
                                    $option = array('matematika', 'bahasa inggris', 'ipa');
                                    foreach ($option as $mata_pelajaran){
                                        $selected = $data['mata_pelajaran'] == $mata_pelajaran ? ' selected = "selected"' : '';
                                        echo '<option value="'.$mata_pelajaran.'"'.$selected.'>'.$mata_pelajaran.'</option>';
                                    }
                                ?>
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
    <?php
        if(isset($_POST['btn_simpan'])){
            update_data($conn, $nip);
        }
        function update_data($conn, $nip){
            $nama = $_POST["nama_guru"];
            $tanggal_lahir = $_POST["tanggal_lahir"];
            $mata_pelajaran = $_POST["mata_pelajaran"];

            if(!empty($nip) && !empty($nama) && !empty($tanggal_lahir) && !empty($mata_pelajaran)){
                $sql = "UPDATE tb_guru SET
                nama = '".$nama."',
                tanggal_lahir = '".$tanggal_lahir."',
                mata_pelajaran = '".$mata_pelajaran."'
                WHERE nip = ".$nip;
                if($conn->query($sql) === TRUE){
                    header('location: index_guru.php');
                }else{
                    echo "Error: " .$sql. "<br>" .$conn->error;
                }
            }else{
                echo "Error, data kurang lengkap";
            }
        }
    ?>
</body>
</html>