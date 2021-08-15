<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid ms-0 me-0">
    <div class="row all justify-content-start">
        <?= $this->include('layout/side_menu'); ?>
        <div class="col-md-10 bg-light">
            <h2>Edit Divisi</h2>
            <form class="edit_div mt-4" id="edit_div" action="<?= base_url('/div/updatediv'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="id_div" class="form-label">Id Divisi</label>
                    <input type="text" class="form-control" id="" name="" value="<?= $detail['id_div']; ?>" disabled>
                    <input type="hidden" class="form-control" id="id_div" name="id_div" value="<?= $detail['id_div']; ?>" aria-disabled="true" required>
                </div>
                <div class="mb-3">
                    <label for="nama_div" class="form-label">Nama Divisi</label>
                    <input type="text" class="form-control" id="nama_div" name="nama_div" value="<?= $detail['nama_div']; ?>" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>