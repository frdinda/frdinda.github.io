<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid ms-0 me-0">
    <div class="row all justify-content-start">
        <?= $this->include('layout/side_menu'); ?>
        <div class="col-md-10">
            <a href="<?= base_url('/subbag/tambah_subbag'); ?>" class="btn btn-primary btn-lg col-2 active">Tambah Subbagian</a>
            <div>
                <table class="table table-hover mt-2">
                    <thead class="">
                        <tr>
                            <th class="col-md-2" scope="col">Id Subbagian</th>
                            <th class="col-md-2" scope="col">Nama Subbagian</th>
                            <th class="col-md-1" scope="col">Nama Bagian</th>
                            <th class="col-md-1" scope="col">Nama Divisi</th>
                            <th class="col-md-1" scope="col"></th>
                            <th class="col-md-1" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($subbag as $d) : ?>
                            <tr>
                                <td scope="row"><?= $d['id_subbag']; ?></td>
                                <td><?= $d['nama_subbag']; ?></td>
                                <td><?= $d['nama_bag']; ?></td>
                                <td><?= $d['nama_div']; ?></td>
                                <td><a href="<?= base_url('/subbag/' . $d['id_subbag']); ?>" class="btn btn-primary">Edit</a></td>
                                <td>
                                    <form action="<?= base_url('/subbag/hapus/' . $d['id_subbag']); ?>" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Anda Yakin?')">Hapus</button>
                                    </form>
                                </td>
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