<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid ms-0 me-0">
    <div class="row all justify-content-start">
        <?= $this->include('layout/side_menu'); ?>
        <div class="col-md-10">
            <div class="row">
                <h1>Resi Pengambilan Nomor</h1>
                <div class="form-group row mt-3">
                    <label for="" class="col-md-3 col-form-label">Nomor Surat</label>
                    <div class="col-sm-1">:</div>
                    <div class="col">
                        <?= $penomoran_surat;
                        echo $no_surat_awal;
                        if ($no_surat_awal != $no_surat_terakhir) {
                            echo " - " . $no_surat_terakhir;
                        } ?>
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <label for="" class="col-md-3 col-form-label">Perihal</label>
                    <div class="col-sm-1">:</div>
                    <div class="col">
                        <?= $perihal; ?>
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <label for="" class="col-md-3 col-form-label">Tanggal Surat</label>
                    <div class="col-sm-1">:</div>
                    <div class="col">
                        <?php
                        $tanggal_surat = date("d-m-Y", strtotime($tanggal_surat));
                        $hari_surat = date("D", strtotime($tanggal_surat));
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
                        ?>
                    </div>
                </div>
                <div class="form-group row mt-2 mb-5">
                    <label for="" class="col-md-3 col-form-label">Tanggal Pengambilan</label>
                    <div class="col-sm-1">:</div>
                    <div class="col">
                        <?php
                        $tanggal_surat = date("d-m-Y", strtotime($tanggal_pengambilan));
                        $hari_surat = date("D", strtotime($tanggal_pengambilan));
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
                        ?>
                    </div>
                </div>
                <a href="<?php if ($status_user == 'super' || $status_user == 'admin') {
                                echo base_url('/' . $status_user);
                            } else {
                                echo base_url('/pegawai');
                            }
                            ?>" class="btn btn-primary btn-lg col-2 active">Halaman Utama</a>
            </div>
        </div>
    </div>
    <?= $this->endSection(); ?>