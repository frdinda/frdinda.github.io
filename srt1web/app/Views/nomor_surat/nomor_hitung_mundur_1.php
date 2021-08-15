<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid ms-0 me-0">
    <div class="row all justify-content-start">
        <?= $this->include('layout/side_menu'); ?>
        <div class="col-md-10 bg-light">
            <h2>Input Nomor Surat</h2>
            <form class="nomor_hitung_mundur mt-4" id="nomor_hitung_mundur" action="<?= base_url('/nomor/hitung_mundur_input'); ?>" method="post">
                <div class="mb-3">
                    <label for="tanggal_hitung_mundur" class="form-label">Tanggal</label>
                    <input type="date" class="form-control tanggal_hitung_mundur" id="tanggal_hitung_mundur" name="tanggal_hitung_mundur">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                    <!-- seharusnya bukan a tapi button karna mau ada action di dalamnya -->
                    <!-- <button type="submit" class="btn btn-primary mb-3" href="/nomor/hitung_mundur_input">Submit</button> -->
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>