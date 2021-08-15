<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid ms-0 me-0">
    <div class="row all justify-content-start">
        <?= $this->include('layout/side_menu'); ?>
        <div class="col-md-10 bg-light">
            <h2>Edit Bagian</h2>
            <form class="edit_bag mt-4" id="edit_bag" action="<?= base_url('/bag/updatebag'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="id_bag" class="form-label">Id Bagian</label>
                    <input type="text" class="form-control" id="" name="" value="<?= $detail['id_bag']; ?>" disabled>
                    <input type="hidden" class="form-control" id="id_bag" name="id_bag" value="<?= $detail['id_bag']; ?>" aria-disabled="true" required>
                </div>
                <div class="mb-3">
                    <label for="nama_bag" class="form-label">Nama Bagian</label>
                    <input type="text" class="form-control" id="nama_bag" name="nama_bag" value="<?= $detail['nama_bag']; ?>" required>
                </div>
                <div class="mb-3 div_id_div" id="div_id_div" name="div_id_div">
                    <label for="sbg_id_div" class="form-label">Divisi</label>
                    <select class="form-select" name="sbg_id_div" id="sbg_id_div" required>
                        <?php foreach ($all_divisi as $d) :
                            if ($d['id_div'] == $detail['id_div']) { ?>
                                <option value="<?= $d['id_div']; ?>" selected><?= $d['nama_div']; ?></option>
                            <?php } else { ?>
                                <option value="<?= $d['id_div']; ?>"><?= $d['nama_div']; ?></option>
                        <?php }
                        endforeach; ?>
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