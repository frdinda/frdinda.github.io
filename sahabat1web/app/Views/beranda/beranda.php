<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- NAVBAR -->
<div class="d-flex background_awal">

</div>
<header class="l-header">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light pe-5 ps-5" id="navbar">
        <!-- gue kepengen dia pas udh scrolling di bawah bd-nya ada warnanya -->
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SAHABAT KUSUMA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse menu d-flex justify-content-end" id="navbarText">
                <ul class="navbar-nav me-5 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#layanan_kami">Layanan Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#survey_pelayanan">Survei Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#hubungi_kami">Hubungi Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main class="l-main mt-5">
    <section class="beranda" id="beranda">
        <div class="container-fluid beranda_fluid">
            <div class="beranda_judul">
                <h1 class="beranda_judul_besar">
                    HI, <span class="beranda_warna_judul_1">SAHABAT</span> <br><span class="beranda_warna_judul_2">KUSUMA</span>
                </h1>
                <p>SAHABAT KUSUMA tak perlu datang, cukup klik apa yang SAHABAT butuhkan</p>
                <a href="#layanan_kami" class="beranda_button btn btn-primary">
                    LAYANAN KAMI
                </a>
            </div>
            <div class="beranda_maskot">
                <img class="beranda_elma" src="/img/FILE KUSUMA_KUSUMA PNG 2.png" alt="">
            </div>
        </div>
    </section>
    <section class="layanan_kami" id="layanan_kami">
        <div class="container container_layanan_kami">
            <div class="row justify-content-around">
                <div class="col-lg-3 card">
                    <a href="https://sipoltak.com/web/index.php?r=site%2Flogin" target="_blank">
                        <img src="/img/notary.png" class="card-img-top" alt="SIPOLTAK">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">SIPOLTAK</h5>
                        <p class="card-text">Sistem Pelaporan, Pemeriksaan dan Pengawasan Melekat Kenotariatan Online</p>
                        <a href="https://sipoltak.com/web/index.php?r=site%2Flogin" class="card_button btn btn-primary" target="_blank">Masuk</a>
                    </div>
                </div>
                <div class="col-lg-3 card">
                    <a href="https://www.sililaba.id/login" target="_blank">
                        <img src="/img/ship.png" class="card-img-top" alt="SILILABA">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">SILILABA</h5>
                        <p class="card-text">Sistem Informasi Pelaporan Izin Keimigrasian Alat Angkut Pelabuhan</p>
                        <a href="https://www.sililaba.id/login" class="card_button btn btn-primary" target="_blank">Masuk</a>
                    </div>
                </div>
                <div class="col-lg-3 card">
                    <a href="https://monwai.kumhamsumut.com/" target="_blank">
                        <img src="/img/businessman.png" class="card-img-top" alt="MONWAI KPP">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">MONWAI KPP</h5>
                        <p class="card-text">Monitoring Kepegawaian Kenaikan Pangkat dan Pensiun</p>
                        <a href="https://monwai.kumhamsumut.com/" class="card_button btn btn-primary" target="_blank">Masuk</a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-around mt-5">
                <div class="col-lg-3 card">
                    <a href="https://www.tidio.com/talk/wpv78l8remlyrku6cf45vjbfapuo7w95" target="_blank">
                        <img src="/img/customer-service.png" class="card-img-top" alt="">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">KONSULTASI PELAYANAN</h5>
                        <p class="card-text">Bicara dengan Tim Pelayanan KUSUMA untuk Konsultasi Pelayanan</p>
                        <a href="https://www.tidio.com/talk/wpv78l8remlyrku6cf45vjbfapuo7w95" class="card_button btn btn-primary" target="_blank">Masuk</a>
                    </div>
                </div>
                <div class="col-lg-3 card">
                    <a href="https://wa.me/message/H3ANITC6Y5CNH1" target="_blank">
                        <img src="/img/rating (1).png" class="card-img-top" alt="">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">KUSUMA DUMAS</h5>
                        <p class="card-text">Pengaduan Masyarakat Kanwil Kemenkumham Sumatera Utara</p>
                        <a href="https://wa.me/message/H3ANITC6Y5CNH1" class="card_button btn btn-primary" target="_blank">Masuk</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="detail_layanan">
        <div class="container container_detail_layanan">
            <div class="row justify-content-around row_detail_layanan">
                <div class="col-lg-4">
                    <img src="/img/notaris2.JPG" class="detail-img" alt="SIPOLTAK">
                    <!-- <a href="https://sipoltak.com/web/index.php?r=site%2Flogin" target="_blank">
                        <img src="/img/NOTARIS_4.png" class="detail-img" alt="SIPOLTAK">
                    </a> -->
                </div>
                <div class="col-lg-7">
                    <h1 class="card-title">SIPOLTAK</h1>
                    <p class="card-text">SIPOLTAK merupakan Aplikasi Sistem Pelaporan, Pemeriksaan, dan Pengawasa n Melekat Kenotariatan Online. Melalui SIPOLTAK, pengawasan kenotariatan dapat mudah dilaksanakan karena KUSUMA dapat langsung mengetahui alamat dan kondisi kantor notaris secara real time menggunakan satelit yang terhubung dengan aplikasi. </p>
                    <a href="https://sipoltak.com/web/index.php?r=site%2Flogin" class="card_button btn btn-primary" target="_blank">Masuk</a>
                </div>
            </div>
            <div class="row justify-content-around row_detail_layanan">
                <div class="col-lg-4">
                    <img src="/img/belawan.jpg" class="detail-img" alt="SILILABA">
                    <!-- <a href="https://www.sililaba.id/login" target="_blank">
                        <img src="/img/belawan.jpg" class="detail-img" alt="SILILABA">
                    </a> -->
                </div>
                <div class="col-lg-7">
                    <h1 class="card-title">SILILABA</h1>
                    <p class="card-text">SILILABA merupakan Aplikasi Sistem Informasi Pelaporan Izin Keimigrasian Alat Angkut Pelabuhan. Melalui SILILABA, agen perkapalan dapat dengan mudah melakukan pengesahan daftar ABK dan pemeriksaan keimigrasian pun dapat dilaksanakan secara lebih cepat. </p>
                    <a href="https://www.sililaba.id/login" class="card_button btn btn-primary" target="_blank">Masuk</a>
                </div>
            </div>
            <div class="row justify-content-around row_detail_layanan">
                <div class="col-lg-4">
                    <img src="/img/pangkat.jpg" class="detail-img" alt="MONWAI KPP">
                    <!-- <a href="https://monwai.kumhamsumut.com/" target="_blank">
                        <img src="/img/22ApelImam8.jpeg" class="detail-img" alt="MONWAI KPP">
                    </a> -->
                </div>
                <div class="col-lg-7">
                    <h1 class="card-title">MONWAI KPP</h1>
                    <p class="card-text">MONWAI KPP adalah Aplikasi Monitoring Kepegawaian Kenaikan Pangkat dan Pensiun. Melalui MONWAI KPP, pengajuan berkas berbasis teknologi dan paperless ini meminimalisir resiko kehilangan atau kerusakan berkas saat pengiriman berkas, selain itu MONWAI KPP juga dapat mewujudkan efisiensi biaya dan waktu pengiriman serta mengintegrasikan data dengan format yang dimiliki oleh Badan Kepegawaian Negara. </p>
                    <a href="https://monwai.kumhamsumut.com/" class="card_button btn btn-primary" target="_blank">Masuk</a>
                </div>
            </div>
            <div class="row justify-content-around row_detail_layanan">
                <div class="col-lg-4">
                    <img src="/img/kusuma dumas.jpeg" class="detail-img" alt="KONSULTASI PELAYANAN">
                    <!-- <a href="#" target="_blank">
                        <img src="/img/duta layanan.jpg" class="detail-img" alt="KONSULTASI PELAYANAN">
                    </a> -->
                </div>
                <div class="col-lg-7">
                    <h1 class="card-title">KONSULTASI PELAYANAN</h1>
                    <p class="card-text">KONSULTASI PELAYANAN adalah sarana live chat yang KUSUMA sediakan untuk SAHABAT jika ada informasi pelayanan yang diperlukan oleh SAHABAT. Akan ada Duta Layanan kami yang dengan cepat dan sigap memberikan informasi pelayanan yang dibutuhkan oleh SAHABAT. </p>
                    <a href="https://www.tidio.com/talk/wpv78l8remlyrku6cf45vjbfapuo7w95" class="card_button btn btn-primary" target="_blank">Masuk</a>
                </div>
            </div>
            <div class="row justify-content-around row_detail_layanan">
                <div class="col-lg-4">
                    <img src="/img/dumas.jpeg" class="detail-img" alt="KUSUMA DUMAS">
                    <!-- <a href="https://wa.me/message/H3ANITC6Y5CNH1" target="_blank">
                        <img src="/img/kusuma dumas.jpeg" class="detail-img" alt="KUSUMA DUMAS">
                    </a> -->
                </div>
                <div class="col-lg-7">
                    <h1 class="card-title">KUSUMA DUMAS</h1>
                    <p class="card-text">KUSUMA DUMAS (Pengaduan Masyarakat Kanwil Kemenkumham Sumatera Utara) adalah layanan pengaduan masyarakat yang disediakan sebagai wadah aspirasi dan pengaduan bagi pengguna layanan publik di lingkungan KUSUMA.</p>
                    <a href="https://wa.me/message/H3ANITC6Y5CNH1" class="card_button btn btn-primary" target="_blank">Masuk</a>
                </div>
            </div>
        </div>
    </section>
    <section class="survey_pelayanan" id="survey_pelayanan">
        <div class="container container_survey_pelayanan">
            <div class="row justify-content-around">
                <div class="col-md-7 align-self-center">
                    <h1 class="card-title">SURVEY PELAYANAN</h1>
                    <p class="card-text">Bantu kami mengetahui apa yang perlu kami perbaiki dan kembangkan dari pelayanan kami melalui Survey Indeks Persepsi Korupsi dan Indeks Kepuasan Masyarakat (IPK-IKM).</p>
                    <a href="https://wa.me/message/H3ANITC6Y5CNH1" class="card_button btn btn-primary" target="_blank">Masuk</a>
                </div>
                <div class="col-md-5">
                    <img src="/img/2152177.png" class="detail-img" alt="SURVEY IPK-IKM">
                </div>
            </div>
        </div>
    </section>
    <section class="hubungi_kami" id="hubungi_kami">
        <div class="container container_hubungi_kami">
            <div class="row justify-content-around">
                <div class="col-md-5">
                    <img src="/img/5124556.png" class="detail-img" alt="HUBUNGI KAMI">
                </div>
                <div class="col-md-7 align-self-center">
                    <h1 class="card-title">HUBUNGI KAMI</h1>
                    <p>SAHABAT dapat menghubungi kami melalui email maupun sosial media KUSUMA berikut ini:</p>
                    <p class="align-self-center">
                        <img src="/img/mail.png" class="icon-img" alt="Email">
                        humas.kanwilsumut@gmail.com
                    </p>
                    <a href="https://web.facebook.com/kanwilkemenkumham.sumut" class="sosmed align-self-center" target="_blank">
                        <p>
                            <img src="/img/facebook.png" class="icon-img" alt="Facebook">
                            Kanwil Kemenkumham Sumut
                        </p>
                    </a>
                    <a href="https://www.instagram.com/kemenkumhamsumut/" class="sosmed align-self-center" target="_blank">
                        <p>
                            <img src="/img/instagram.png" class="icon-img" alt="Instagram">
                            kemenkumhamsumut
                        </p>
                    </a>
                    <a href="https://twitter.com/Kemenkumham_SUM" class="sosmed align-self-center" target="_blank">
                        <p>
                            <img src="/img/twitter-sign.png" class="icon-img" alt="Twitter">
                            Kemenkumham_SUM
                        </p>
                    </a>
                    <a href="https://www.youtube.com/c/KanwilKemenkumhamSumut/featured" class="sosmed align-self-center" target="_blank">
                        <p>
                            <img src="/img/youtube.png" class="icon-img" alt="Youtube">
                            Kanwil Kemenkumham Sumut
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<footer>
    <h5 class="footer">2021 © Kanwil Kemenkumham Sumatera Utara. All Rights Reserved.</h5>
</footer>
<?= $this->endSection(); ?>