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
        $id = $_GET['id'];
        $conn = mysqli_connect("localhost", "root", "", "pertanian");
        $sql = "SELECT * FROM tabel_panen WHERE id = " .$id;
        $query = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($query);
    ?>
    <center><h1>PERTANIAN</h1></center>
    <br>
    <div class="form">
        <form action="" method="POST">
            <fieldset>
                <legend><h2>Update Data</h2></legend>
                <label>
                    Nama Tanaman
                    <input type="text" name="nama_tanaman" value="<?= $data['nama_tanaman']?>"/>
                </label>
                <br>
                <label>
                    Hasil Panen
                    <input type="number" name="hasil_panen" value="<?= $data['hasil_panen']?>"/>
                </label>
                <br>
                <label>
                    Lama Tanam
                    <input type="number" name="lama_tanam" value="<?= $data['lama_tanam']?>"/>
                </label>
                <br>
                <label>
                    Tanggal Panen
                    <input type="date" name="tanggal_panen" value="<?= $data['tanggal_panen']?>"/>
                </label>
                <br>
                <label>
                    <input type="submit" name="btn_simpan" value="Simpan">
                    <input type="reset" name="reset" value="Reset">
                </label>
            </fieldset>
        </form>
    </div>
    <?php
    if(isset($_POST['btn_simpan'])){
        update_data($conn, $id);
    }
    function update_data($conn, $id){
        $nama_tanaman = $_POST["nama_tanaman"];
        $hasil_panen = $_POST["hasil_panen"];
        $lama_tanam = $_POST["lama_tanam"];
        $tanggal_panen = $_POST["tanggal_panen"];

        if(!empty($nama_tanaman) && !empty($hasil_panen) && !empty($lama_tanam) && !empty($tanggal_panen)){
            $sql = "UPDATE tabel_panen SET nama_tanaman = '" .$nama_tanaman. "', hasil_panen = " .$hasil_panen. ", lama_tanam = " .$lama_tanam. ", tanggal_panen = '" .$tanggal_panen. "' WHERE id = " .$id;
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
    ?>
</body>
</html>