<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid ms-0 me-0">
    <div class="row all justify-content-start">
        <?= $this->include('layout/side_menu'); ?>
        <div class="col-md-10 bg-light">
            <h2>Tambah User</h2>
            <p><small>Jika ada perubahan kepemimpinan dapat mengganti profil untuk akun yang sudah ada</small></p>
            <select class="form-select mt-3" name="tipe_user" id="tipe_user">
                <option value="" selected disabled>Tipe User</option>
                <option value="sbg">Subbagian</option>
                <option value="kbg">Kepala Bagian</option>
                <option value="kdv">Kepala Divisi</option>
                <option value="admin">Admin</option>
                <option value="super">Super Admin</option>
                <option value="kkw">Kepala Kantor Wilayah</option>
            </select>
            <form class="tambah_user mt-4" id="sbg" action="<?= base_url('/tambah_user/saveusersbg'); ?>" method="post">
                <?= csrf_field(); ?>
                <!-- cuma dipake kalau ada subbagian baru -->
                <div class="mb-3">
                    <label for="sbg_user_id" class="form-label">UserID</label>
                    <input type="text" class="form-control" name="sbg_user_id" id="sbg_user_id" required>
                </div>
                <div class="mb-3">
                    <label for="sbg_nama_kepala" class="form-label">Nama Kepala Subbagian</label>
                    <input type="text" class="form-control" name="sbg_nama_kepala" id="sbg_nama_kepala" required>
                </div>
                <div class="mb-3">
                    <label for="sbg_nip_kepala" class="form-label">NIP Kepala Subbagian</label>
                    <input type="number" class="form-control" name="sbg_nip_kepala" id="sbg_nip_kepala" required>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="sbg_id_div" class="form-label">Divisi</label>
                        <select class="form-select" name="sbg_id_div" id="sbg_id_div" required>
                            <option value="" selected disabled></option>
                            <?php foreach ($all_divisi as $d) : ?>
                                <option value="<?= $d['id_div']; ?>"><?= $d['nama_div']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="sbg_id_bag" class="form-label">Bagian</label>
                        <select class="form-select" name="sbg_id_bag" id="sbg_id_bag" required>
                            <!-- nanti option disini mengikuti hasil pilihan divisi -->
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="sbg_id_subbag" class="form-label">Subbagian</label>
                    <select class="form-select" name="sbg_id_subbag" id="sbg_id_subbag" required>
                        <!-- nanti option disini mengikuti hasil pilihan divisi -->
                    </select>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="sbg_password" class="form-label mb-0">Password</label>
                        <input type="password" class="form-control" name="sbg_password" id="sbg_password" required>
                    </div>
                    <div class="col">
                        <label for="sbg_password" class="form-label mb-0">Konfirmasi Password</label>
                        <input type="password" class="form-control" name="sbg_konfirmasi_password" id="sbg_konfirmasi_password" required>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </div>
            </form>
            <form class="tambah_user mt-4" id="kbg" action="<?= base_url('/tambah_user/saveuserkbg'); ?>" method="post">
                <?= csrf_field(); ?>
                <!-- cuma dipake kalau ada bagian baru -->
                <div class="mb-3">
                    <label for="kbg_user_id" class="form-label">UserID</label>
                    <input type="text" class="form-control" name="kbg_user_id" id="kbg_user_id" required>
                </div>
                <div class="mb-3">
                    <label for="kbg_nama_kepala" class="form-label">Nama Kepala Bagian</label>
                    <input type="text" class="form-control" name="kbg_nama_kepala" id="kbg_nama_kepala" required>
                </div>
                <div class="mb-3">
                    <label for="kbg_nip_kepala" class="form-label">NIP Kepala Bagian</label>
                    <input type="number" class="form-control" name="kbg_nip_kepala" id="kbg_nip_kepala" required>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="kbg_id_div" class="form-label">Divisi</label>
                        <select class="form-select" name="kbg_id_div" id="kbg_id_div" required>
                            <option value="" selected disabled></option>
                            <?php foreach ($all_divisi as $d) : ?>
                                <option value="<?= $d['id_div']; ?>"><?= $d['nama_div']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="kbg_id_bag" class="form-label">Bagian</label>
                        <select class="form-select" name="kbg_id_bag" id="kbg_id_bag" required>
                            <!-- nanti option disini mengikuti hasil pilihan divisi -->
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="kbg_password" class="form-label mb-0">Password</label>
                        <input type="password" class="form-control" name="kbg_password" id="kbg_password" required>
                    </div>
                    <div class="col">
                        <label for="kbg_konfirmasi_password" class="form-label mb-0">Konfirmasi Password</label>
                        <input type="password" class="form-control" name="kbg_konfirmasi_password" id="kbg_konfirmasi_password" required>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </div>
            </form>
            <form class="tambah_user mt-4" id="kdv" action="<?= base_url('/tambah_user/saveuserkdv'); ?>" method="post">
                <?= csrf_field(); ?>
                <!-- cuma dipake kalau ada divisi baru -->
                <div class="mb-3">
                    <label for="kdv_user_id" class="form-label">UserID</label>
                    <input type="text" class="form-control" name="kdv_user_id" id="kdv_user_id" required>
                </div>
                <div class="mb-3">
                    <label for="kdv_nama_kepala" class="form-label">Nama Kepala Divisi</label>
                    <input type="text" class="form-control" name="kdv_nama_kepala" id="kdv_nama_kepala" required>
                </div>
                <div class="mb-3">
                    <label for="kdv_nip_kepala" class="form-label">NIP Kepala Divisi</label>
                    <input type="number" class="form-control" name="kdv_nip_kepala" id="kdv_nip_kepala" required>
                </div>
                <div class="mb-3">
                    <label for="kdv_id_div" class="form-label">Divisi</label>
                    <select class="form-select" name="kdv_id_div" id="kdv_id_div" required>
                        <option value="" selected disabled></option>
                        <?php foreach ($all_divisi as $d) : ?>
                            <option value="<?= $d['id_div']; ?>"><?= $d['nama_div']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="kdv_password" class="form-label mb-0">Password</label>
                        <input type="password" class="form-control" name="kdv_password" id="kdv_password" required>
                    </div>
                    <div class="col">
                        <label for="kdv_konfirmasi_password" class="form-label mb-0">Konfirmasi Password</label>
                        <input type="password" class="form-control" name="kdv_konfirmasi_password" id="kdv_konfirmasi_password" required>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </div>
            </form>
            <form class="tambah_user mt-4" id="admin" action="<?= base_url('/tambah_user/saveuseradm'); ?>" method="post">
                <?= csrf_field(); ?>
                <!-- cuma dipake kalau ada divisi baru -->
                <div class="mb-3">
                    <label for="adm_user_id" class="form-label">UserID</label>
                    <input type="text" class="form-control" name="adm_user_id" id="kdv_user_id" required>
                </div>
                <div class="mb-3">
                    <label for="adm_nama_kepala" class="form-label">Nama Admin</label>
                    <input type="text" class="form-control" name="adm_nama_kepala" id="adm_nama_kepala" required>
                </div>
                <div class="mb-3">
                    <label for="adm_nip_kepala" class="form-label">NIP Admin</label>
                    <input type="number" class="form-control" name="adm_nip_kepala" id="adm_nip_kepala" required>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="adm_id_div" class="form-label">Divisi</label>
                        <select class="form-select" name="adm_id_div" id="adm_id_div" required>
                            <option value="" selected disabled></option>
                            <?php foreach ($all_divisi as $d) : ?>
                                <option value="<?= $d['id_div']; ?>"><?= $d['nama_div']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="adm_id_bag" class="form-label">Bagian</label>
                        <select class="form-select" name="adm_id_bag" id="adm_id_bag" required>
                            <!-- nanti option disini mengikuti hasil pilihan divisi -->
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="adm_id_subbag" class="form-label">Subbagian</label>
                    <select class="form-select" name="adm_id_subbag" id="adm_id_subbag" required>
                        <!-- nanti option disini mengikuti hasil pilihan divisi -->
                    </select>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="adm_password" class="form-label mb-0">Password</label>
                        <input type="password" class="form-control" name="adm_password" id="adm_password" required>
                    </div>
                    <div class="col">
                        <label for="adm_konfirmasi_password" class="form-label mb-0">Konfirmasi Password</label>
                        <input type="password" class="form-control" name="adm_konfirmasi_password" id="adm_konfirmasi_password" required>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </div>
            </form>
            <form class="tambah_user mt-4" id="super" action="<?= base_url('/tambah_user/saveusersupadm'); ?>" method="post">
                <?= csrf_field(); ?>
                <!-- cuma dipake kalau ada divisi baru -->
                <div class="mb-3">
                    <label for="sadm_user_id" class="form-label">UserID</label>
                    <input type="text" class="form-control" name="sadm_user_id" id="kdv_user_id" required>
                </div>
                <div class="mb-3">
                    <label for="sadm_nama_kepala" class="form-label">Nama Admin</label>
                    <input type="text" class="form-control" name="sadm_nama_kepala" id="adm_nama_kepala" required>
                </div>
                <div class="mb-3">
                    <label for="sadm_nip_kepala" class="form-label">NIP Admin</label>
                    <input type="number" class="form-control" name="sadm_nip_kepala" id="adm_nip_kepala" required>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="sadm_id_div" class="form-label">Divisi</label>
                        <select class="form-select" name="sadm_id_div" id="sadm_id_div" required>
                            <option value="" selected disabled></option>
                            <?php foreach ($all_divisi as $d) : ?>
                                <option value="<?= $d['id_div']; ?>"><?= $d['nama_div']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="sadm_id_bag" class="form-label">Bagian</label>
                        <select class="form-select" name="sadm_id_bag" id="sadm_id_bag" required>
                            <!-- nanti option disini mengikuti hasil pilihan divisi -->
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="sadm_id_subbag" class="form-label">Subbagian</label>
                    <select class="form-select" name="sadm_id_subbag" id="sadm_id_subbag" required>
                        <!-- nanti option disini mengikuti hasil pilihan divisi -->
                    </select>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="sadm_password" class="form-label mb-0">Password</label>
                        <input type="password" class="form-control" name="sadm_password" id="sadm_password" required>
                    </div>
                    <div class="col">
                        <label for="sadm_konfirmasi_password" class="form-label mb-0">Konfirmasi Password</label>
                        <input type="password" class="form-control" name="sadm_konfirmasi_password" id="sadm_konfirmasi_password" required>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </div>
            </form>
            <form class="tambah_user mt-4" id="kkw" action="<?= base_url('/tambah_user/saveuserkkw'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="kkw_user_id" class="form-label">UserID</label>
                    <input type="text" class="form-control" name="kkw_user_id" id="kkw_user_id" required>
                </div>
                <div class="mb-3">
                    <label for="kkw_nama_kepala" class="form-label">Nama Kepala Kantor Wilayah</label>
                    <input type="text" class="form-control" name="kkw_nama_kepala" id="kkw_nama_kepala" required>
                </div>
                <div class="mb-3">
                    <label for="kkw_nip_kepala" class="form-label">NIP Kepala Kantor Wilayah</label>
                    <input type="number" class="form-control" name="kkw_nip_kepala" id="kkw_nip_kepala" required>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="kkw_password" class="form-label mb-0">Password</label>
                        <input type="password" class="form-control" name="kkw_password" id="kkw_password" required>
                    </div>
                    <div class="col">
                        <label for="kkw_konfirmasi_password" class="form-label mb-0">Konfirmasi Password</label>
                        <input type="password" class="form-control" name="kkw_konfirmasi_password" id="kkw_konfirmasi_password" required>
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