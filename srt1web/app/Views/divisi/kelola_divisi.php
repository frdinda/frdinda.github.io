<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid ms-0 me-0">
    <div class="row all justify-content-start">
        <?= $this->include('layout/side_menu'); ?>
        <div class="col-md-10">
            <a href="<?= base_url('/div/tambah_div'); ?>" class="btn btn-primary btn-lg col-2 active">Tambah Divisi</a>
            <div>
                <table class="table table-hover mt-2">
                    <thead class="">
                        <tr>
                            <th class="col-md-2" scope="col">Id Divisi</th>
                            <th class="col-md-2" scope="col">Nama Divisi</th>
                            <th class="col-md-1" scope="col"></th>
                            <th class="col-md-1" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($div as $d) : ?>
                            <tr>
                                <td scope="row"><?= $d['id_div']; ?></td>
                                <td><?= $d['nama_div']; ?></td>
                                <td><a href="<?= base_url('/div/' . $d['id_div']); ?>" class="btn btn-primary">Edit</a></td>
                                <td>
                                    <form action="<?= base_url('/div/hapus/' . $d['id_div']); ?>" method="post" class="d-inline">
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