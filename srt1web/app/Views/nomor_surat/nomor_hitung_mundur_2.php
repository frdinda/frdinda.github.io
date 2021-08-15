<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid ms-0 me-0">
    <div class="row all justify-content-start">
        <?= $this->include('layout/side_menu'); ?>
        <div class="col-md-10 bg-light">
            <h2>Input Nomor Surat</h2>
            <form class="nomor_hitung_mundur mt-4" id="nomor_hitung_mundur" action="<?= base_url('/nomor_hitung_mundur/save_nomor'); ?>" method="post">
                <div class="mb-3">
                    <label for="tanggal_surat_mundur" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="" name="" value="<?php echo $tanggal_surat; ?>" disabled>
                    <input type="hidden" class="form-control" id="tanggal_surat_mundur" name="tanggal_surat_mundur" value="<?php echo $tanggal_surat; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                    <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="">
                </div>
                <div class="mb-3">
                    <label for="jumlah_sisa" class="form-label">Jumlah Nomor Tersisa</label>
                    <input type="number" class="form-control" id="jumlah_sisa" name="jumlah_sisa" value="<?= $jumlah_nomor_mundur; ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="jumlah_surat_mundur" class="form-label">Jumlah Nomor yang Diambil</label>
                    <input type="number" class="form-control" name="jumlah_surat_mundur" id="jumlah_surat_mundur" value="1" required>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <label for="exampleFormControlTextarea1" class="form-label">Penomoran Surat</label>
                    </div>
                    <div class="row">
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
                        <div class="col-md-1">
                            <input type="text" class="form-control" id="" value="<?= $nomor_kecil; ?>" disabled>
                            <input type="hidden" class="form-control" name="no_surat_mundur" id="no_surat_mundur" value="<?= $nomor_kecil; ?>" required>
                            <!-- ini nanti datanya nambah satu dari nilai terbesar di database -->
                        </div>
                        -
                        <div class="col-md-1">
                            <input type="text" class="form-control" name="no_surat_mundur_terakhir" id="no_surat_mundur_terakhir" value="" disabled>
                            <input type="hidden" class="form-control" name="no_surat_mundur_terakhir" id="no_surat_mundur_terakhir" value="" required>
                            <!-- ini nanti datanya ngitung dari jumlah yang dia masukin di 'jumlah surat' -->
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="perihal" class="form-label">Perihal</label>
                    <textarea class="form-control" id="perihal" name="perihal" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                    <a class="btn btn-primary mb-3" href="<?= base_url('/nomor/hitung_mundur'); ?>">Reset</a>
                    <!-- ini seharusnya bukan a -->
                    <!-- <button type="submit" class="btn btn-primary mb-3" href="/nomor/hitung_mundur">Reset</button> -->
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>