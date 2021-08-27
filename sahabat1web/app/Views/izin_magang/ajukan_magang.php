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
            <form class="col-lg-12 ajukan_permohonan" action="<?= base_url('/56c4'); ?>" method="post" enctype="multipart/form-data">
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
                            <select class="col-lg-6 custom-select select_izin" name="select_izin" id="inlineFormCustomSelect" required>
                                <option selected disabled>Pilih Salah Satu...</option>
                                <option value="magang">Magang / Praktik Kerja Lapangan (PKL)</option>
                                <option value="penelitian">Penelitian</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="text-dark" for="dokumen_persyaratan">Dokumen Persyaratan</label> <br>
                            <h6>Harap Melampirkan Dokumen Surat Pengantar dari Instansi Asal (Kampus/Sekolah) yang ditujukan kepada Kepala Kantor Wilayah</h6>
                            <h6 class="text-danger">*File dalam format PDF dengan besar maksimal 5MB</h6>
                            <div class="custom-file col-lg-6">
                                <input type="file" class="custom-file-input" name="dokumen_persyaratan" id="dokumen_persyaratan" required>
                                <label class="custom-file-label" for="dokumen_persyaratan">Pilih file</label>
                            </div>
                        </div>
                        <div class="text-center mt-5">
                            <button type="submit" class="col-lg-6 btn btn-block btn-dark">Login</button>
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