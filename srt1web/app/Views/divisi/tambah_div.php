<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid ms-0 me-0">
    <div class="row all justify-content-start">
        <?= $this->include('layout/side_menu'); ?>
        <div class="col-md-10 bg-light">
            <h2>Tambah Pegawai</h2>
            <form class="tambah_div mt-4" id="tambah_div" action="<?= base_url('/div/save_div'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="user_id" class="form-label">Id Divisi</label>
                    <input type="text" class="form-control" id="id_div" name="id_div" value="" required>
                </div>
                <div class="mb-3">
                    <label for="nama_div" class="form-label">Nama Divisi</label>
                    <input type="text" class="form-control" id="nama_div" name="nama_div" value="" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>