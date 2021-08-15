<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid ms-0 me-0">
    <div class="row all justify-content-start">
        <?= $this->include('layout/side_menu'); ?>
        <div class="col-md-10">
            <div class="row">
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Nomor Surat</label>
                    <div class="col-sm-1">:</div>
                    <div class="col">
                        <?php if (is_null($detail_surat['kode_masalah'])) {
                            echo $detail_surat['no_surat'];
                        } else {
                            echo $penomoran_surat = $detail_surat['kode_unit'] . $detail_surat['kode_masalah'] . "." . $detail_surat['masalah_substantif_1'] . "." . $detail_surat['masalah_substantif_2'] . ".";
                            echo $detail_surat['no_surat'];
                        } ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Tanggal Surat</label>
                    <div class="col-sm-1">:</div>
                    <div class="col">
                        <?php $tanggal_surat = date("d-m-Y", strtotime($detail_surat['tanggal_surat']));
                        $hari_surat = date("D", strtotime($detail_surat['tanggal_surat']));
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
                        } ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Subbagian/Bagian/Divisi</label>
                    <div class="col-sm-1">:</div>
                    <div class="col">
                        <?php
                        if ($detail_surat['id_akses'] == "super" || $detail_surat['id_akses'] == "admin" || $detail_surat['id_akses'] == "kkw") {
                            echo $detail_surat['jenis_akses'];
                        } else if (empty($detail_surat['nama_subbag'])) {
                            if (empty($detail_surat['nama_bag'])) {
                                echo $detail_surat['nama_div'];
                            } else {
                                echo $detail_surat['nama_bag'];
                            }
                        } else {
                            echo $detail_surat['nama_subbag'];
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Perihal</label>
                    <div class="col-sm-1">:</div>
                    <div class="col">
                        <?= $detail_surat['perihal']; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Nama Pegawai</label>
                    <div class="col-sm-1">:</div>
                    <div class="col">
                        <?= $detail_surat['nama_pegawai']; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Tanggal Input</label>
                    <div class="col-sm-1">:</div>
                    <div class="col">
                        <?php $tanggal_surat = date("d-m-Y", strtotime($detail_surat['tanggal_pengambilan']));
                        $hari_surat = date("D", strtotime($detail_surat['tanggal_pengambilan']));
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
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Tanggal Revisi Terakhir</label>
                    <div class="col-sm-1">:</div>
                    <div class="col">
                        <?php if ($detail_surat['tanggal_revisi'] == 0000 - 00 - 00) {
                            echo "-";
                        } else {
                            $tanggal_surat = date("d-m-Y", strtotime($tanggal_revisi_max));
                            $hari_surat = date("D", strtotime($tanggal_revisi_max));
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
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="tab-content" id="myTabContent">
                    <table class="table table-hover mt-2">
                        <thead class="">
                            <tr>
                                <th class="col-md-2" scope="col">Tanggal Revisi</th>
                                <th class="col-md-2" scope="col">Penomoran Surat</th>
                                <th class="col-md-2" scope="col">Perihal</th>
                                <th class="col-md-3" scope="col">Nama Pegawai</th>
                                <th class="col-md-2" scope="col">Jenis Perubahan</th>
                                <!-- <th class="col-md-1" scope="col"></th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($detail_revisi as $d) : ?>
                                <tr>
                                    <td>
                                        <?php if ($d['tanggal_revisi'] == 0000 - 00 - 00) {
                                            $tanggal_surat = date("d-m-Y", strtotime($detail_surat['tanggal_pengambilan']));
                                            $hari_surat = date("D", strtotime($detail_surat['tanggal_pengambilan']));
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
                                        } else {
                                            $tanggal_surat = date("d-m-Y", strtotime($detail_surat['tanggal_revisi']));
                                            $hari_surat = date("D", strtotime($detail_surat['tanggal_revisi']));
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
                                        } ?>
                                    </td>
                                    <td>
                                        <?
                                        if (is_null($d['kode_masalah_sblm'])) {
                                        } else {
                                            echo $penomoran_surat = $d['kode_unit_sblm'] . $d['kode_masalah_sblm'] . "." . $d['masalah_substantif_1_sblm'] . "." . $d['masalah_substantif_2_sblm'];
                                            echo $d['no_surat'];
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?= $d['perihal_sblm']; ?>
                                    </td>
                                    <td>
                                        <?= $d['nama_pegawai_sblm']; ?>
                                    </td>
                                    <td>
                                        <?= $d['jenis_perubahan']; ?>
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