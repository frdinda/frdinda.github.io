<?= $this->extend('layout/template_pelantikan'); ?>

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
            <form class="col-lg-12 ajukan_permohonan" action="<?= base_url('/3v7a'); ?>" method="post" enctype="multipart/form-data">
                <div class="row justify-content-around">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input hidden="hidden" class="col-lg-12 form-control" id="email" name="email" type="email" value="<?= $email; ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="text-dark" for="nama">Nama</label>
                            <input class="col-lg-12 form-control" id="nama" name="nama" type="text" value="<?= $nama; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label class="text-dark" for="jenis_permohonan">Permohonan untuk Pelantikan</label> <br>
                            <select class="col-lg-12 custom-select select_izin" name="select_izin" id="jenis_permohonan" required>
                                <option selected disabled>Pilih Salah Satu...</option>
                                <option value="notaris">Notaris Baru / Notaris Pindahan</option>
                                <option value="notaris_pengganti">Notaris Pengganti</option>
                                <option value="ppns">PPNS</option>
                                <option value="kewarganegaraan">Kewarganegaraan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="text-dark" for="dokumen_persyaratan">Dokumen Persyaratan</label> <br>
                            <!-- <h6 class="list_dokumen" id="notaris">Harap Melampirkan Dokumen Berikut:
                                <br>
                                1. Surat Permohonan;
                                <br>
                                2. SK Pengangkatan Notaris;
                                <br>
                                3. Fotokopi Ijazah S1 dan S2 yang dilegalisir;
                                <br>
                                4. Fotokopi KTP;
                                <br>
                                5. 2 lembar Pas Foto berwarna ukurang 4 x 6;
                                <br>
                                6. Bukti Pembayaran PNBP;
                                <br>
                                7. Rekomendasi Pengda INI dan MPD.
                            </h6> -->
                            <!-- <h6 class="list_dokumen" id="ppns">Harap Melampirkan Dokumen Berikut:
                            </h6>
                            <h6 class="list_dokumen" id="kewarganegaraan">Harap Melampirkan Dokumen lol</h6> -->
                            <h6 class="text-danger">*File dalam format PDF dengan besar maksimal 50MB</h6>
                            <div class="custom-file col-lg-12">
                                <input type="file" class="custom-file-input" name="dokumen_persyaratan" id="dokumen_persyaratan" required>
                                <label class="custom-file-label" for="dokumen_persyaratan">Pilih file</label>
                            </div>
                        </div>
                        <div class="text-center mt-5">
                            <button type="submit" class="col-lg-12 btn btn-block btn-dark">Login</button>
                        </div>
                    </div>
                    <div class="col-lg-5 mt-4">
                        <h5 class="list_dokumen" id="notaris"><b>Harap Melampirkan Dokumen Berikut:</b>
                            <br>
                            1. Surat Permohonan;
                            <br>
                            2. SK Pengangkatan Notaris;
                            <br>
                            3. Fotokopi Ijazah S1 dan S2 yang dilegalisir;
                            <br>
                            4. Fotokopi KTP;
                            <br>
                            5. 2 lembar Pas Foto berwarna ukurang 4 x 5;
                            <br>
                            6. Bukti Pembayaran PNBP;
                            <br>
                            7. Rekomendasi Pengda INI dan MPD.
                        </h5>
                        <h5 class="list_dokumen" id="notaris_pengganti"><b>Harap Melampirkan Dokumen Berikut.</b>
                            <br>
                            Dokumen Notaris:
                            <br>
                            1. Surat Permohonan;
                            <br>
                            2. SK Cuti;
                            <br>
                            3. Fotokopi Sertifikat Cuti;
                            <br>
                            4. Fotokopi Berita Acara Pelantikan;
                            <br>
                            5. Fotokopi SK Pengangkatan Notaris;
                            <br>
                            <br>
                            Dokumen Notaris Pengganti:
                            <br>
                            1. Fotokopi Ijazah Sarjana Hukum yang dilegalisir;
                            <br>
                            2. Fotokopi KTP;
                            <br>
                            3. 2 lembar Pas Foto berwarna ukuran 4x6;
                            <br>
                            4. Bukti Pembayaran PNBP.
                        </h5>
                        <h5 class="list_dokumen" id="ppns"><b>Harap Melampirkan Dokumen Berikut.</b>
                            <br>
                            1. Surat Pengantar dan Permohonan Pelantikan dari instansi terkait;
                            <br>
                            2. SK Pengangkatan dari Kementerian hukum dan Hak Asasi Manusia;
                            <br>
                            3. Kartu Tanda Penduduk (KTP);
                            <br>
                            4. Kartu Tanda Anggota (KTA) PPNS;
                            <br>
                            5. 2 lembar Pas Foto berwarna ukuran 4x6 (latar belakang merah).
                        </h5>
                        <h5 class="list_dokumen" id="kewarganegaraan"><b>Harap Melampirkan Dokumen Berikut.</b>
                            <br>
                            1. Surat pemberitahuan penetapan Keputusan Presiden dari Kementerian Sekretariat Negara RI;
                            <br>
                            2. 4 lembar Pas Foto berwarna ukuran 4x6 (latar belakang merah);
                            <br>
                            3. Surat permohonan secara tertulis dari pemohon ditujukan kepada Kepala Kantor Wilayah Kementerian Hukum dan Hak Asasi Manusia Jawa Barat;
                        </h5>
                    </div>
            </form>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>

<?= $this->endSection(); ?>