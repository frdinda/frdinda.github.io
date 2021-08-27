<?= $this->extend('layout/template_magang'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- basic table -->
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Semua Permohonan</h4>
            <br>
            <div class="table-responsive">
                <table id="zero_config" class="table table-hover table-bordered no-wrap display">
                    <thead>
                        <tr>
                            <th>No</th>
                            <?php if ($jenis_akses == 'admin') { ?>
                                <th>Nama Pemohon</th>
                            <?php } ?>
                            <th>Tanggal Input</th>
                            <th>Jenis Permohonan</th>
                            <th>Dokumen Permohonan</th>
                            <th>Status Permohonan</th>
                            <th>Keterangan Verifikasi</th>
                            <th>Dokumen Balasan</th>
                            <?php if ($jenis_akses == 'admin') { ?>
                                <th></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 0;
                        foreach ($all_magang as $m) : if ($m['jenis_permohonan'] == 'magang') { ?>
                                <tr>
                                    <td><?php $nomor = $nomor + 1;
                                        echo $nomor; ?></td>
                                    <?php if ($jenis_akses == 'admin') { ?>
                                        <th><?= $m['nama']; ?></th>
                                    <?php } ?>
                                    <td><?php $tanggal_input = date("d-m-Y", strtotime($m['tanggal_input']));
                                        $hari_input = date("D", strtotime($m['tanggal_input']));
                                        if ($hari_input == 'Mon') {
                                            $hari_input = 'Senin';
                                            $tanggal_input = $hari_input . ", " . $tanggal_input;
                                            echo $tanggal_input;
                                        } else if ($hari_input == 'Tue') {
                                            $hari_input = 'Selasa';
                                            $tanggal_input = $hari_input . ", " . $tanggal_input;
                                            echo $tanggal_input;
                                        } else if ($hari_input == 'Wed') {
                                            $hari_input = 'Rabu';
                                            $tanggal_input = $hari_input . ", " . $tanggal_input;
                                            echo $tanggal_input;
                                        } else if ($hari_input == 'Thu') {
                                            $hari_input = 'Kamis';
                                            $tanggal_input = $hari_input . ", " . $tanggal_input;
                                            echo $tanggal_input;
                                        } else if ($hari_input == 'Fri') {
                                            $hari_input = 'Jumat';
                                            $tanggal_input = $hari_input . ", " . $tanggal_input;
                                            echo $tanggal_input;
                                        } else if ($hari_input == 'Sat') {
                                            $hari_input = 'Sabtu';
                                            $tanggal_input = $hari_input . ", " . $tanggal_input;
                                            echo $tanggal_input;
                                        } else if ($hari_input == 'Sun') {
                                            $hari_input = 'Minggu';
                                            $tanggal_input = $hari_input . ", " . $tanggal_input;
                                            echo $tanggal_input;
                                        } ?></td>
                                    <td><?= $m['jenis_permohonan']; ?></td>
                                    <td style="text-align:center">
                                        <a href="<?= base_url('/dokumen_persyaratan/' . $m['dokumen_permohonan']); ?>" target="_blank"><i class="fas fa-file-pdf"></i>
                                            <?= "Dokumen Permohonan" ?>
                                        </a>
                                    </td>
                                    <td><?php if ($m['status_permohonan'] == 'v-ny') {
                                            echo 'Belum Diverifikasi';
                                        } else if ($m['status_permohonan'] == 'v-ok') {
                                            echo 'Permohonan Diterima';
                                        } else if ($m['status_permohonan'] == 'v-rs') {
                                            echo 'Permohonan Ditolak';
                                        } else if ($m['status_permohonan'] == 'v-wl') {
                                            echo 'Menunggu Proses';
                                        } ?>
                                    <td><?= $m['keterangan_balasan']; ?></td>
                                    <td style="text-align:center">
                                        <?php if (isset($m['dokumen_balasan'])) { ?>
                                            <a href="<?= base_url('/dokumen_balasan/' . $m['dokumen_balasan']); ?>" target="_blank"><i class="fas fa-file-pdf"></i>
                                                <?= "Dokumen Balasan" ?>
                                            </a>
                                        <?php } else {
                                            echo "";
                                        } ?>
                                    </td>
                                    <?php if ($jenis_akses == 'admin') { ?>
                                        <td>
                                            <?php if ($m['status_permohonan'] == 'v-ok') { ?>
                                            <?php } else { ?>
                                                <a href="<?php $code = $m['dokumen_permohonan'];
                                                            echo base_url('/vmg/' . $code); ?>" class="btn btn-block btn-dark">Proses</a>
                                            <?php } ?>
                                        </td>
                                    <?php } ?>
                                </tr>
                        <?php }
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>

<?= $this->endSection(); ?>