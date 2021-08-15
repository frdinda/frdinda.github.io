<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid ms-0 me-0">
    <div class="row all justify-content-start">
        <?= $this->include('layout/side_menu'); ?>
        <div class="col-md-10 bg-light">
            <h2>Tambah Akses</h2>
            <form class="edit_akses mt-4" id="edit_akses" action="<?= base_url('/akses/save_akses'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="id_akses" class="form-label">Id Akses</label>
                    <input type="text" class="form-control" id="id_akses" name="id_akses" value="" required>
                </div>
                <div class="mb-3">
                    <label for="jenis_akses" class="form-label">Jenis Akses</label>
                    <input type="text" class="form-control" id="jenis_akses" name="jenis_akses" value="" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>