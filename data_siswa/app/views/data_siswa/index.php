<div class="container mt-3">

    <div class="row">
        <div class="col-6">
            <br>
            <br>
            <h3>Daftar Mahasiswa</h3>
            <ul class="list-group">
                <?php foreach($data['siswa'] as $siswa) : ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center"><?= $siswa['nama']?>
                        <button type="button" class="btn btn-secondary btn-sm ModalDetail" data-toggle="modal" data-target="#TampilModalDetail" data-id ="<?= $siswa['id'];?>">detail</button>
                    </li>
                <?php endforeach; ?>            
            </ul>
        </div>
    </div>

</div>

<div class="modal fade" id="TampilModalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Detail Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="siswa_detail">
                <form action="<?= BASEURL;?>/mahasiswa/tambah" method="post">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="nis">NIM</label>
                        <input type="number" class="form-control" id="nis" name="nis">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                    </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>