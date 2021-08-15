<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid ms-0 me-0">
    <div class="row all justify-content-start">
        <?= $this->include('layout/side_menu'); ?>
        <div class="col-md-10">
            <!-- <div class="row">
                <div class="col">
                    <div class="row justify-content-end mb-1">
                        <div class="col-md-3">
                            <form class="login mt-4" id="login" action="/nomor/search" method="post">
                                <input type="text" class="form-control" id="search" name="search" aria-describedby="" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row">
                <div class="tab-content" id="myTabContent">
                    <table class="table table-hover mt-2" id="table-surat-all">
                        <thead class="">
                            <tr>
                                <th class="col-md-2" scope="col">No. Surat</th>
                                <th class="col-md-2" scope="col">Penomoran Surat</th>
                                <th class="col-md-2" scope="col">Tanggal Surat</th>
                                <th class="col-md-2" scope="col">Subbagian/ Bagian/ Divisi</th>
                                <th class="col-md-3" scope="col">Perihal</th>
                                <th class="col-md-2" scope="col">Nama Pegawai</th>
                                <th class="col-md-2" scope="col">Tanggal Input</th>
                                <th class="col-md-2" scope="col">Tanggal Revisi</th>
                                <th scope="col">Detail Revisi</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <!-- <th class="col-md-1" scope="col"></th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($search)) {
                                $surat = $search;
                            } else {
                            }
                            foreach ($surat as $s) : ?>
                                <tr>
                                    <td scope="row"><?= $s['no_surat']; ?></td>
                                    <td scope="row">
                                        <?php if (is_null($s['kode_masalah'])) { ?>
                                            -
                                        <?php } else { ?>
                                            <?= $s['kode_unit']; ?>-<?= $s['kode_masalah']; ?>.<?= $s['masalah_substantif_1']; ?>.<?= $s['masalah_substantif_2']; ?>
                                        <?php } ?>
                                    </td>
                                    <td><?php $tanggal_surat = date("d-m-Y", strtotime($s['tanggal_surat']));
                                        $hari_surat = date("D", strtotime($s['tanggal_surat']));
                                        if ($hari_surat == 'Mon') {
                                            $hari_surat = 'Senin';
                                            $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                            echo $tanggal_surat;
                                        } else if ($hari_surat == 'Tue') {
                                            $hari_surat = 'Selasa';
                                            $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                            echo $tanggal_surat;
                                        } else if ($hari_surat == 'Wed') {
                                            $hari_surat = 'Rabu';
                                            $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                            echo $tanggal_surat;
                                        } else if ($hari_surat == 'Thu') {
                                            $hari_surat = 'Kamis';
                                            $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                            echo $tanggal_surat;
                                        } else if ($hari_surat == 'Fri') {
                                            $hari_surat = 'Jumat';
                                            $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                            echo $tanggal_surat;
                                        } else if ($hari_surat == 'Sat') {
                                            $hari_surat = 'Sabtu';
                                            $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                            echo $tanggal_surat;
                                        } else if ($hari_surat == 'Sun') {
                                            $hari_surat = 'Minggu';
                                            $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                            echo $tanggal_surat;
                                        } ?></td>
                                    <td>
                                        <?php if (is_null($s['id_akses'])) { ?>
                                            -
                                        <?php } else {
                                            if ($s['id_akses'] == "super" || $s['id_akses'] == "admin" || $s['id_akses'] == "kkw") {
                                                echo $s['jenis_akses'];
                                            } else if (empty($s['nama_subbag'])) {
                                                if (empty($s['nama_bag'])) {
                                                    echo $s['nama_div'];
                                                } else {
                                                    echo $s['nama_bag'];
                                                }
                                            } else {
                                                echo $s['nama_subbag'];
                                            }
                                        }
                                        ?>

                                    </td>
                                    <td>
                                        <?php if (is_null($s['perihal'])) { ?>
                                            -
                                        <?php } else {
                                            echo $s['perihal'];
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php if (is_null($s['id_akses'])) { ?>
                                            -
                                        <?php } else {
                                            if ($s['id_akses'] == "sbg" || $s['id_akses'] == "super" || $s['id_akses'] == "admin") {
                                                echo $s['nama_pegawai'];
                                            } else {
                                                echo $s['nama_kepala'];
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td><?php if ($s['tanggal_pengambilan'] != 0000 - 00 - 00) {
                                            $tanggal_surat = date("d-m-Y", strtotime($s['tanggal_pengambilan']));
                                            $hari_surat = date("D", strtotime($s['tanggal_pengambilan']));
                                            if ($hari_surat == 'Mon') {
                                                $hari_surat = 'Senin';
                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                echo $tanggal_surat;
                                            } else if ($hari_surat == 'Tue') {
                                                $hari_surat = 'Selasa';
                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                echo $tanggal_surat;
                                            } else if ($hari_surat == 'Wed') {
                                                $hari_surat = 'Rabu';
                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                echo $tanggal_surat;
                                            } else if ($hari_surat == 'Thu') {
                                                $hari_surat = 'Kamis';
                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                echo $tanggal_surat;
                                            } else if ($hari_surat == 'Fri') {
                                                $hari_surat = 'Jumat';
                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                echo $tanggal_surat;
                                            } else if ($hari_surat == 'Sat') {
                                                $hari_surat = 'Sabtu';
                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                echo $tanggal_surat;
                                            } else if ($hari_surat == 'Sun') {
                                                $hari_surat = 'Minggu';
                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                echo $tanggal_surat;
                                            }
                                        } else { ?>
                                            -
                                        <?php } ?></td>
                                    <td><?php if ($s['tanggal_revisi'] != 0000 - 00 - 00) {
                                            $tanggal_surat = date("d-m-Y", strtotime($s['tanggal_revisi']));
                                            $hari_surat = date("D", strtotime($s['tanggal_revisi']));
                                            if ($hari_surat == 'Mon') {
                                                $hari_surat = 'Senin';
                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                echo $tanggal_surat;
                                            } else if ($hari_surat == 'Tue') {
                                                $hari_surat = 'Selasa';
                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                echo $tanggal_surat;
                                            } else if ($hari_surat == 'Wed') {
                                                $hari_surat = 'Rabu';
                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                echo $tanggal_surat;
                                            } else if ($hari_surat == 'Thu') {
                                                $hari_surat = 'Kamis';
                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                echo $tanggal_surat;
                                            } else if ($hari_surat == 'Fri') {
                                                $hari_surat = 'Jumat';
                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                echo $tanggal_surat;
                                            } else if ($hari_surat == 'Sat') {
                                                $hari_surat = 'Sabtu';
                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                echo $tanggal_surat;
                                            } else if ($hari_surat == 'Sun') {
                                                $hari_surat = 'Minggu';
                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                echo $tanggal_surat;
                                            }
                                        } else { ?>
                                            -
                                        <?php } ?></td>
                                    <td><a href="<?= base_url('/nomor/detail_revisi/' . $s['no_surat']); ?>" class="btn btn-primary">Detail</a></td>
                                    <td><a href="<?= base_url('/nomor/' . $s['no_surat']); ?>" class="btn btn-primary">Edit</a></td>
                                    <td>
                                        <form action="<?= base_url('/nomor/hapus/' . $s['no_surat']); ?>" method="post" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger" type="submit" onclick="return confirm('Anda Yakin?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <!-- <td><button class="btn btn-primary" type="submit">Edit</button></td> -->
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>