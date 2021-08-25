<?= $this->extend('layout/template_magang'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- basic table -->
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Ajukan Permohonan</h4>
            <br>
            <form class="col-lg-12 ajukan_permohonan" action="<?= base_url('/20a3'); ?>" method="post">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input hidden="hidden" class="col-lg-6 form-control" id="email" name="email" type="email" value="<?= $email; ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="text-dark" for="nama">Nama</label>
                            <input class="col-lg-6 form-control" id="nama" name="nama" type="text" value="<?= $nama; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label class="text-dark" for="nama">Instansi</label>
                            <input class="col-lg-6 form-control" id="nama" name="nama" type="text" value="<?= $instansi; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label class="text-dark" for="inlineFormCustomSelect">Permohonan untuk Izin</label> <br>
                            <select class="col-lg-6 custom-select" id="inlineFormCustomSelect">
                                <option selected>Pilih Salah Satu...</option>
                                <option value="magang">Magang / Praktik Kerja Lapangan (PKL)</option>
                                <option value="penelitian">Penelitian</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="text-dark" for="inlineFormCustomSelect">Dokumen Persyaratan</label> <br>
                            <h6>Harap Melampirkan Dokumen Surat Pengantar dari Instansi Asal (Kampus/Sekolah)</h5>
                                <div class="custom-file col-lg-6">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>

<?= $this->endSection(); ?>