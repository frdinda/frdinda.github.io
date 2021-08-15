<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid ms-0 me-0">
    <div class="row all justify-content-start">
        <?= $this->include('layout/side_menu'); ?>
        <div class="col-md-10 bg-light">
            <h2>Tambah Subbagian</h2>
            <form class="edit_subbag mt-4" id="edit_subbag" action="<?= base_url('/subbag/save_subbag'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="id_subbag" class="form-label">Id Subbagian</label>
                    <input type="text" class="form-control" id="id_subbag" name="id_subbag" value="">
                </div>
                <div class="mb-3">
                    <label for="nama_subbag" class="form-label">Nama Subbagian</label>
                    <input type="text" class="form-control" id="nama_subbag" name="nama_subbag" value="">
                </div>
                <div class="mb-3 div_id_div" id="div_id_div" name="div_id_div">
                    <label for="sbg_id_div" class="form-label">Divisi</label>
                    <select class="form-select" name="sbg_id_div" id="sbg_id_div" required>
                        <?php foreach ($all_divisi as $d) : ?>
                            <option value="<?= $d['id_div']; ?>"><?= $d['nama_div']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3 div_id_bag" id="div_id_bag" name="div_id_bag">
                    <label for="sbg_id_bag" class="form-label">Bagian</label>
                    <select class="form-select" name="sbg_id_bag" id="sbg_id_bag" required>
                        <!-- nanti option disini mengikuti hasil pilihan divisi -->
                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>