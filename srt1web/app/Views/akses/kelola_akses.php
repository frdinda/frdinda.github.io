<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid ms-0 me-0">
    <div class="row all justify-content-start">
        <?= $this->include('layout/side_menu'); ?>
        <div class="col-md-10">
            <a href="<?= base_url('/akses/tambah_akses'); ?>" class="btn btn-primary btn-lg col-2 active">Tambah Akses</a>
            <div>
                <table class="table table-hover mt-2">
                    <thead class="">
                        <tr>
                            <th class="col-md-2" scope="col">Id Akses</th>
                            <th class="col-md-2" scope="col">Jenis Akses</th>
                            <th class="col-md-1" scope="col"></th>
                            <th class="col-md-1" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($akses as $d) : ?>
                            <tr>
                                <td scope="row"><?= $d['id_akses']; ?></td>
                                <td><?= $d['jenis_akses']; ?></td>
                                <td><a href="<?= base_url('/akses/' . $d['id_akses']); ?>" class="btn btn-primary">Edit</a></td>
                                <td>
                                    <form action="<?= base_url('/akses/hapus/' . $d['id_akses']); ?>" method="post" class="d-inline">
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