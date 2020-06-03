<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pertanian</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
    <?php
        $conn = mysqli_connect("localhost", "root", "", "pertanian");
    ?>
    <center><h1>PERTANIAN</h1></center>
    <br>
    <div class="form">
        <form action="" method="POST">
            <fieldset>
                <legend><h2>Tambah Data</h2></legend>
                <label>
                    Nama Tanaman
                    <input type="text" name="nama_tanaman"/>
                </label>
                <br>
                <label>
                    Hasil Panen
                    <input type="number" name="hasil_panen"/>
                </label>
                <br>
                <label>
                    Lama Tanam
                    <input type="number" name="lama_tanam"/>
                </label>
                <br>
                <label>
                    Tanggal Panen
                    <input type="date" name="tanggal_panen"/>
                </label>
                <br>
                <label>
                    <input type="submit" name="btn_simpan" value="Simpan">
                    <input type="reset" name="reset" value="Reset">
                </label>
            </fieldset>
        </form>
    </div>
    <div class="table">
        <?php
            $sql = "SELECT * FROM tabel_panen ORDER BY id";
            $query = mysqli_query($conn, $sql);
        ?>
        <fieldset>
            <legend><h2>Data Panen</h2></legend>
            <table border='1' cellpadding='10'>
                <tr>
                    <th>ID</th>
                    <th>Nama Tanaman</th>
                    <th>Hasil Panen</th>
                    <th>Lama Tanam</th>
                    <th>Tanggal Panen</th>
                    <th></th>
                </tr>
                <?php 
                    while($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td><?= $data['id'];?></td>
                    <td><?= $data['nama_tanaman'];?></td>
                    <td><?= $data['hasil_panen'];?></td>
                    <td><?= $data['lama_tanam'];?></td>
                    <td><?= $data['tanggal_panen'];?></td>
                    <td>
                        <a href="update.php?id=<?= $data['id'];?>">update</a>
                        <a href="index.php?id=<?= $data['id'];?>" onclick="return confirm('yakin?');">delete</a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </fieldset>
    </div>
    <?php
        if(isset($_POST['btn_simpan'])){
            tambah_data($conn);
        }
        function tambah_data($conn){
            $id = time();
            $nama_tanaman = $_POST["nama_tanaman"];
            $hasil_panen = $_POST["hasil_panen"];
            $lama_tanam = $_POST["lama_tanam"];
            $tanggal_panen = $_POST["tanggal_panen"];

            if(!empty($nama_tanaman) && !empty($hasil_panen) && !empty($lama_tanam) && !empty($tanggal_panen)){
                $sql = "INSERT INTO tabel_panen (id, nama_tanaman, hasil_panen, lama_tanam, tanggal_panen) VALUES(".$id.", '".$nama_tanaman."', ".$hasil_panen.", ".$lama_tanam.", '".$tanggal_panen."')";
                    if (mysqli_query($conn, $sql)) {
                        $message = "Data Berhasil Ditambahkan";
                        echo "<script type='text/javascript'>alert('$message')</script>"; 
                        header ('location: index.php');
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
            }else{
                $message = "Form Belum Terisi Lengkap";
                echo "<script type='text/javascript'>alert('$message')</script>";         
            }
        }
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            delete_data($id, $conn);
        }
        function delete_data($id, $conn){
            $sql = "DELETE FROM tabel_panen WHERE id = " .$id;
            if(mysqli_query($conn, $sql)){
                header ('location: index.php');
                echo '<script language="javascript">';
                echo 'alert("Data Berhasil Dihapus")';
                echo '</script>';
            }else{
                echo "error: " .mysqli_error($conn);
            }
        }
    ?>
</body>
</html>