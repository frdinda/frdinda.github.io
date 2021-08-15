<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid ms-0 me-0">
    <div class="row all justify-content-start">
        <?= $this->include('layout/side_menu'); ?>
        <div class="col-md-10 bg-light">
            <h2>Edit User</h2>
            <form class="edit_user mt-4" id="edit_user" action="<?= base_url('/edit_user/updateuser'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="user_id" class="form-label">UserID</label>
                    <input type="text" class="form-control" id="" name="" value="<?= $detail_user['user_id']; ?>" disabled>
                    <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?= $detail_user['user_id']; ?>" aria-disabled="true" required>
                </div>
                <div class="mb-3">
                    <label for="nip_kepala" class="form-label">NIP</label>
                    <input type="text" class="form-control" id="nip_kepala" name="nip_kepala" value="<?= $detail_user['nip_kepala']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nama_kepala" class="form-label">Nama Kepala</label>
                    <input type="text" class="form-control" id="nama_kepala" name="nama_kepala" value="<?= $detail_user['nama_kepala']; ?>" required>
                </div>
                <div class="mb-3 div_id_akses" id="div_id_akses">
                    <label for="id_akses" class="form-label">Akses</label>
                    <select class="form-select" name="id_akses" id="id_akses" required>
                        <?php foreach ($all_akses as $a) :
                            if ($a['id_akses'] == $detail_user['id_akses']) { ?>
                                <option value="<?= $a['id_akses']; ?>" selected><?= $a['jenis_akses']; ?></option>
                            <?php } else { ?>
                                <option value="<?= $a['id_akses']; ?>"><?= $a['jenis_akses']; ?></option>
                        <?php }
                        endforeach; ?>
                    </select>
                </div>
                <?php if ($detail_user['id_akses'] == 'kkw') { ?>
                <?php } else { ?>
                    <div class="mb-3 div_id_div" id="div_id_div" name="div_id_div">
                        <label for="sbg_id_div" class="form-label">Divisi</label>
                        <select class="form-select" name="sbg_id_div" id="sbg_id_div" required>
                            <?php foreach ($all_divisi as $d) :
                                if ($d['id_div'] == $detail_user['id_div']) { ?>
                                    <option value="<?= $d['id_div']; ?>" selected><?= $d['nama_div']; ?></option>
                                <?php } else { ?>
                                    <option value="<?= $d['id_div']; ?>"><?= $d['nama_div']; ?></option>
                            <?php }
                            endforeach; ?>
                        </select>
                    </div>
                <?php } ?>
                <?php if ($detail_user['id_akses'] == 'kbg' || $detail_user['id_akses'] == 'sbg' || $detail_user['id_akses'] == 'admin' || $detail_user['id_akses'] == 'super_adm') { ?>
                    <div class="mb-3 div_id_bag" id="div_id_bag" name="div_id_bag">
                        <label for="sbg_id_bag" class="form-label">Bagian</label>
                        <select class="form-select" name="sbg_id_bag" id="sbg_id_bag" required>
                            <?php foreach ($all_bag as $b) :
                                if ($b['id_bag'] == $detail_user['id_bag']) { ?>
                                    <option value="<?= $b['id_bag']; ?>" selected><?= $b['nama_bag']; ?></option>
                                <?php } else {
                                ?>
                                    <option value="<?= $b['id_bag']; ?>"><?= $b['nama_bag']; ?></option>
                            <?php }
                            endforeach; ?>
                        </select>
                    </div>
                    <?php if ($detail_user['id_akses'] == 'sbg' || $detail_user['id_akses'] == 'admin' || $detail_user['id_akses'] == 'super_adm') { ?>
                        <div class="mb-3 div_id_subbag" id="div_id_subbag" name="div_id_subbag">
                            <label for="sbg_id_subbag" class="form-label">Subbagian</label>
                            <select class="form-select" name="sbg_id_subbag" id="sbg_id_subbag" required>
                                <?php foreach ($all_subbag as $sub) :
                                    if ($sub['id_subbag'] == $detail_user['id_subbag']) { ?>
                                        <option value="<?= $sub['id_subbag']; ?>" selected><?= $sub['nama_subbag']; ?></option>
                                    <?php } else {
                                    ?>
                                        <option value="<?= $sub['id_subbag']; ?>"><?= $sub['nama_subbag']; ?></option>
                                <?php }
                                endforeach; ?>
                            </select>
                        </div>
                    <?php } ?>
                <?php } ?>
                <div class="mb-3">
                    <div class="col">
                        <label for="password" class="form-label mb-0">Password</label>
                        <input type="password" class="form-control" name="password" id="password" value="<?= $detail_user['password']; ?>" required>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="col">
                        <label for="konfirmasi_password" class="form-label mb-0">Konfirmasi Password</label>
                        <input type="password" class="form-control" name="konfirmasi_password" id="konfirmasi_password" required>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>