<div class="container mt-3">  
    <div class="row">
        <div class="col-10">
            <br>
            <br>
            <h1>Daftar Siswa</h1>
            <div class="row">
                <div class="col-lg-6">
                    <?php Flasher::flash();?>
                </div>
            </div>
            <button type="button" class="btn btn-secondary mt-2 ModalTambah" data-toggle="modal" data-target="#TampilModalDetail">tambah data</button>
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['siswa'] as $siswa):?>
                        <tr>
                            <td><?= $siswa['nama']?></td>
                            <td><?= $siswa['nis']?></td>
                            <td><?= $siswa['tanggal_lahir']?></td>
                            <td><button type="button" class="btn btn-secondary btn-sm ModalUbah" data-toggle="modal" data-target="#TampilModalDetail" data-id ="<?= $siswa['id'];?>">ubah</button></td>
                            <td><a role="button" class="btn btn-secondary btn-sm HapusData" href="<?= BASEURL;?>/data_siswa/hapus_data/<?= $siswa['id']?>;" onclick="return confirm('yakin?');">hapus</a></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
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
                <form action="<?= BASEURL;?>/data_siswa/ubah_data" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="nis">NIS</label>
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