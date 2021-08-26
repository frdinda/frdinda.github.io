<?= $this->extend('layout/template_magang'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Proses Permohonan</h4>
            <br>
            <form class="col-lg-12 ajukan_permohonan" action="<?= base_url('/v7r3'); ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input hidden="hidden" class="col-lg-6 form-control" id="id_mgpn" name="id_mgpn" type="number" value="<?= $data_magang['id_mgpn']; ?>" required>
                        </div>
                        <div class="form-group">
                            <input hidden="hidden" class="col-lg-6 form-control" id="dokumen_persyaratan" name="dokumen_persyaratan" type="text" value="<?= $data_magang['dokumen_permohonan']; ?>" required>
                        </div>
                        <div class="form-group">
                            <input hidden="hidden" class="col-lg-6 form-control" id="email" name="email" type="email" value="<?= $data_magang['email']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="text-dark" for="nama">Nama</label>
                            <input hidden="hidden" class="col-lg-6 form-control" id="nama" name="nama" type="text" value="<?= $data_magang['nama']; ?>">
                            <input class="col-lg-6 form-control" id="nama" name="nama" type="text" value="<?= $data_magang['nama']; ?>" disabled>
                        </div>
                        <div class="form-group mt-5">
                            <label class="text-dark" for="instansi">Instansi</label>
                            <input class="col-lg-6 form-control" id="instansi" name="instansi" type="text" value="<?= $data_magang['instansi_asal']; ?>" disabled>
                        </div>
                        <div class="form-group mt-5">
                            <label class="text-dark" for="dokumen_persyaratan">Dokumen Permohonan</label>
                            <br>
                            <a href="<?= base_url('/dokumen_persyaratan/' . $data_magang['dokumen_permohonan']); ?>" target="_blank"><i class="fas fa-file-pdf"></i>
                                <?= "Dokumen Permohonan" ?>
                            </a>
                        </div>
                        <div class="form-group mt-5">
                            <label class="text-dark" for="dokumen_balasan">Dokumen Balasan</label> <br>
                            <h6 class="text-danger">*File dalam format PDF dengan besar maksimal 5MB</h6>
                            <div class="custom-file col-lg-6">
                                <input type="file" class="custom-file-input" name="dokumen_balasan" id="dokumen_balasan">
                                <label class="custom-file-label" for="dokumen_balasan">Pilih file</label>
                            </div>
                        </div>
                        <div class="form-group mt-5">
                            <label class="text-dark" for="inlineFormCustomSelect">Status Permohonan</label> <br>
                            <select class="col-lg-6 custom-select status_permohonan" name="status_permohonan" id="inlineFormCustomSelect" required>
                                <option selected disabled>Pilih Salah Satu...</option>
                                <option value="v-ok">Disetujui</option>
                                <option value="v-wl">Proses</option>
                                <option value="v-rs">Tolak</option>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <h6 class="col-lg-6">Catatan: <br>
                                - Pilih 'Setujui' jika permohonan diterima dan dokumen balasan sudah siap (harap mengupload dokumen jika permohonan disetujui);<br>
                                - Pilih 'Proses' jika permohonan diterima tetapi dokumen balasan masih dalam proses;<br>
                                - Pilih 'Tolak' jika permohonan tidak diterima (harap menginput keterangan jika permohonan ditolak);
                            </h6>
                        </div>
                        <div class="form-group mt-5">
                            <label class="text-dark" for="keterangan">Keterangan</label>
                            <textarea class="col-lg-6 form-control" id="keterangan" name="keterangan" type="text">
                            </textarea>
                        </div>
                        <div class="text-center mt-5">
                            <button type="submit" class="col-lg-6 btn btn-block btn-dark">Submit</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>