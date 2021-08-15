<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid ms-0 me-0">
    <div class="row all justify-content-start">
        <?= $this->include('layout/side_menu'); ?>
        <div class="col-md-10 bg-light">
            <h2>Input Nomor Surat</h2>
            <form class="nomor_hari_ini mt-4" id="nomor_hari_ini" action="<?= base_url('/nomor_hari_ini/save_nomor'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="tanggal_surat" class="form-label">Tanggal</label>
                    <input type="text" class="form-control" name="" id="" value="<?php echo date("d M, Y"); ?>" disabled>
                    <input type="hidden" class="form-control" name="tanggal_surat" id="tanggal_surat" value="<?php echo date('Y-m-d'); ?>" aria-disabled="true" required>
                </div>
                <?php if ($status_user == "sbg" || $status_user == "super" || $status_user == "admin") { ?>
                    <div class="mb-3">
                        <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                        <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" value="" required>
                    </div>
                <?php } ?>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah Nomor yang Diambil</label>
                    <input type="number" class="form-control" name="jumlah" id="jumlah" value="1" required>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <label for="penomoran_surat" class="form-label">Penomoran Surat</label>
                    </div>
                    <div class="row">
                        <div class="row mb-3">
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="" id="" value="W.2." disabled>
                                <input hidden="hidden" class="form-control" name="kode_unit" id="kode_unit" value="W.2." required>
                            </div>
                            <div class="col-md-2">
                                <select class="form-select" name="kode_masalah" id="kode_masalah" required>
                                    <option value="" selected disabled></option>
                                    <?php foreach ($all_kode_masalah as $d) : ?>
                                        <option value="<?= $d['kode_masalah']; ?>"><?= $d['kode_masalah'] ?> - <?= $d['penjabaran_masalah']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select class="form-select" name="masalah_substantif_1" id="masalah_substantif_1" required>

                                </select>
                            </div>
                            <div class="col-md-2">
                                <select class="form-select" name="masalah_substantif_2" id="masalah_substantif_2" required>

                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="" id="" value="<?= $no_surat_terakhir; ?>" disabled>
                                <input type="hidden" class="form-control" name="no_surat" id="no_surat" value="<?= $no_surat_terakhir; ?>" required>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="no_surat_terakhir" id="no_surat_terakhir" value="" disabled>
                                <input type="hidden" class="form-control" name="no_surat_terakhir" id="no_surat_terakhir" value="" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="perihal" class="form-label">Perihal</label>
                    <textarea class="form-control" name="perihal" id="perihal" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>