<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid ms-0 me-0">
    <div class="row all justify-content-start">
        <?= $this->include('layout/side_menu'); ?>
        <div class="col-md-10 bg-light">
            <h2>Edit Surat</h2>
            <form class="nomor_hari_ini mt-4" id="nomor_hari_ini" action="<?= base_url('/nomor/updatesurat'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="tanggal_surat" class="form-label">Tanggal</label>
                    <input type="text" class="form-control" name="" id="" value="<?php
                                                                                    $tanggal_surat = date("d-m-Y", strtotime($detail_surat['tanggal_surat']));
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
                                                                                    } ?>" disabled>
                    <input type="hidden" class="form-control" name="tanggal_surat" id="tanggal_surat" value="<?php echo date('Y-m-d'); ?>" aria-disabled="true" required>
                </div>
                <?php if ($status_user == "sbg" || $status_user == "super" || $status_user == "admin") { ?>
                    <div class="mb-3">
                        <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                        <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" value="<?= $detail_surat['nama_pegawai']; ?>" required>
                    </div>
                <?php } ?>
                <div class="mb-3">
                    <div class="row">
                        <label for="penomoran_surat" class="form-label">Penomoran Surat</label>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="" id="" value="W.2." disabled>
                            <input hidden="hidden" class="form-control" name="kode_unit" id="kode_unit" value="W.2." required>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" name="kode_masalah" id="kode_masalah" required>
                                <?php foreach ($all_kode_masalah as $b) :
                                    if ($b['kode_masalah'] == $detail_surat['kode_masalah']) { ?>
                                        <option value="<?= $b['kode_masalah']; ?>" selected><?= $b['kode_masalah']; ?> - <?= $b['penjabaran_masalah']; ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $b['kode_masalah']; ?>"><?= $b['kode_masalah']; ?> - <?= $b['penjabaran_masalah']; ?></option>
                                <?php }
                                endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" name="masalah_substantif_1" id="masalah_substantif_1" required>
                                <?php foreach ($all_subs_1 as $b) :
                                    if ($b['masalah_substantif_1'] == $detail_surat['masalah_substantif_1']) { ?>
                                        <option value="<?= $b['masalah_substantif_1']; ?>" selected><?= $b['masalah_substantif_1']; ?> - <?= $b['penjabaran_subs_1']; ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $b['masalah_substantif_1']; ?>"><?= $b['masalah_substantif_1']; ?> - <?= $b['penjabaran_subs_1']; ?></option>
                                <?php }
                                endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" name="masalah_substantif_2" id="masalah_substantif_2" required>
                                <?php foreach ($all_subs_2 as $b) :
                                    if ($b['masalah_substantif_2'] == $detail_surat['masalah_substantif_2']) { ?>
                                        <option value="<?= $b['masalah_substantif_2']; ?>" selected><?= $b['masalah_substantif_2']; ?> - <?= $b['penjabaran_subs_2']; ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $b['masalah_substantif_2']; ?>"><?= $b['masalah_substantif_2']; ?> - <?= $b['penjabaran_subs_2']; ?></option>
                                <?php }
                                endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="" id="" value="<?= $detail_surat['no_surat']; ?>" disabled>
                            <input type="hidden" class="form-control" name="no_surat" id="no_surat" value="<?= $detail_surat['no_surat']; ?>" required>
                            <!-- ini nanti datanya nambah satu dari nilai terbesar di database -->
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="perihal" class="form-label">Perihal</label>
                    <textarea class="form-control" name="perihal" id="perihal" rows="3" required><?= $detail_surat['perihal']; ?></textarea>
                </div>
                <div class="jenis_perubahan mb-3" id="jenis_perubahan" name="jenis_perubahan">
                    <label for="jenis_perubahan" class="form-label">Jenis Perubahan</label>
                    <div>
                        <input class="form-check-input" type="checkbox" name="jenis_perubahan[]" value="Edit Penomoran Surat" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            Edit Penomoran Surat
                        </label>
                    </div>
                    <div>
                        <input class="form-check-input" type="checkbox" name="jenis_perubahan[]" value="Edit Nama Pegawai" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            Edit Nama Pegawai
                        </label>
                    </div>
                    <div>
                        <input class="form-check-input" type="checkbox" name="jenis_perubahan[]" value="Edit Perihal" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            Edit Perihal
                        </label>
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