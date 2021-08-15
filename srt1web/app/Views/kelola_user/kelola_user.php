<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid ms-0 me-0">
    <div class="row all justify-content-start">
        <?= $this->include('layout/side_menu'); ?>
        <div class="col-md-10">
            <?php if ($status_user == 'super') { ?>
                <a href="<?= base_url('/tambah_user'); ?>" class="btn btn-primary btn-lg col-2 active">Tambah User</a>
            <?php } ?>
            <div>
                <table class="table table-hover mt-2" id="table-user">
                    <thead class="">
                        <tr>
                            <th class="col-md-2" scope="col">NIP</th>
                            <th class="col-md-2" scope="col">Nama Kepala</th>
                            <th class="col-md-2" scope="col">Subbagian</th>
                            <th class="col-md-3" scope="col">Bagian</th>
                            <th class="col-md-2" scope="col">Divisi</th>
                            <?php if ($status_user == 'super') { ?>
                                <th class="col-md-1" scope="col">Akses</th>
                            <?php } ?>
                            <th class="col-md-1" scope="col"></th>
                            <?php if ($status_user == 'super') { ?>
                                <th class="col-md-1" scope="col"></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($user as $u) : ?>
                            <tr>
                                <td scope="row"><?= $u['nip_kepala']; ?></td>
                                <td><?= $u['nama_kepala']; ?></td>
                                <td><?= $u['nama_subbag']; ?></td>
                                <td><?= $u['nama_bag']; ?></td>
                                <?php if ($u['id_akses'] == 'kkw') { ?>
                                    <td></td>
                                <?php } else { ?>
                                    <td>Divisi <?= $u['nama_div']; ?></td>
                                <?php } ?>
                                <?php if ($status_user == 'super') { ?>
                                    <td><?= $u['jenis_akses']; ?></td>
                                <?php } ?>
                                <td><a href="<?= base_url('/edit_user/' . $u['user_id']); ?>" class="btn btn-primary">Edit</a></td>
                                <?php if ($status_user == 'super') { ?>
                                    <td>
                                        <form action="<?= base_url('/edit_user/hapus/' . $u['user_id']); ?>" method="post" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger" type="submit" onclick="return confirm('Anda Yakin?')">Hapus</button>
                                        </form>
                                    </td>
                                <?php } ?>
                                <!-- <td><button class="btn btn-primary" type="submit">Edit</button></td> -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>