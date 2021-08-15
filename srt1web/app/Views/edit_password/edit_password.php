<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row all justify-content-start">
        <?= $this->include('layout/side_menu'); ?>
        <div class="col-md-10">
            <h2>Edit Profil</h2>
            <form class="edit_pass mt-4" id="edit_pass" action="<?= base_url('/edit_pass/updatepass'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="text" class="form-label mb-0">User ID</label>
                            <input type="text" class="form-control" id="" value="<?= $user_id; ?>" disabled>
                            <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?= $user_id; ?>" required>
                            <!-- value diubah nanti. terus ubah juga inputnya ngikutin yang edit akses -->
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label mb-0"><?php if ($detail_user['id_akses'] == 'kbg') { ?>Nama Bagian/Bidang<?php } else if ($detail_user['id_akses'] == 'kdv') { ?>Nama Divisi<?php } else if ($detail_user['id_akses'] == 'kkw') { ?>Nama Kantor Wilayah<?php } else { ?>Nama Subbagian/Subbidang<?php } ?></label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php
                                                                                                            if (isset($detail_user['nama_subbag'])) {
                                                                                                                echo $detail_user['nama_subbag'];
                                                                                                            } else if (isset($detail_user['nama_bag'])) {
                                                                                                                echo $detail_user['nama_bag'];
                                                                                                            } else if (isset($detail_user['nama_div'])) {
                                                                                                                echo $detail_user['nama_div'];
                                                                                                            } else {
                                                                                                                echo "Kantor Wilayah Kemenkumham Sumatera Utara";
                                                                                                            } ?>" disabled>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="text" class="form-label mb-0">Password Baru</label>
                            <input type="password" class="form-control" id="password_baru" name="password_baru" required>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label mb-0"><?php if ($detail_user['id_akses'] == 'kbg') { ?>Nama Kepala Bagian/Bidang<?php } else if ($detail_user['id_akses'] == 'kdv') { ?>Nama Kepala Divisi<?php } else if ($detail_user['id_akses'] == 'kkw') { ?>Nama Kepala Kantor Wilayah<?php } else if ($detail_user['id_akses'] == 'sbg') { ?>Nama Kepala Subbagian/Subbidang<?php } else { ?>Nama Pegawai<?php } ?></label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $detail_user['nama_kepala']; ?>" disabled>
                            <!-- value diubah nanti -->
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="text" class="form-label mb-0">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" required>
                        </div>
                        <div class=" col-md-6">
                            <label for="exampleFormControlInput1" class="form-label mb-0">NIP <?php if ($detail_user['id_akses'] == 'kbg') { ?>Kepala Bagian/Bidang<?php } else if ($detail_user['id_akses'] == 'kdv') { ?>Kepala Divisi<?php } else if ($detail_user['id_akses'] == 'kdv') { ?>Kepala Kantor Wilayah<?php } else { ?>Kepala Subbagian/Subbidang<?php } ?></label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $detail_user['nip_kepala']; ?>" disabled>
                            <!-- value diubah nanti -->
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>