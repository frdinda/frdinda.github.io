<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row all justify-content-start">
        <h2>Edit Profil</h2>
        <form>
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <label for="text" class="form-label mb-0">UserID</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="SB_HMRBTI" disabled>
                        <!-- value diubah nanti -->
                    </div>
                    <div class="col-md-6">
                        <label for="exampleFormControlInput1" class="form-label mb-0">Nama</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="Sondang Wahyuni Tamba">
                        <!-- value diubah nanti -->
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label for="text" class="form-label mb-0">Jabatan</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="Kepala Bagian Program dan Hubungan Masyarakat">
                        <!-- value diubah nanti -->
                    </div>
                    <div class="col-md-6">
                        <label for="exampleFormControlInput1" class="form-label mb-0">No. Telp</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="085710101467">
                        <!-- value diubah nanti -->
                    </div>
                </div>
                <!-- bisa nggak kalau dia status kabag bisa lihat ini, kalau status kadiv bisa lihatnya divisi kalau status kakanwil nanti unit kerja jatohnya -->
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label for="text" class="form-label mb-0">Bagian</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="Bagian Program dan Hubungan Masyarakat">
                        <!-- value diubah nanti -->
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label for="text" class="form-label mb-0">Divisi</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="Divisi Administrasi">
                        <!-- value diubah nanti -->
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>