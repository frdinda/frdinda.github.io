<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- NAVBAR -->
<div class="d-flex background_awal">

</div>
<header class="l-header">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light pe-5 ps-5" id="navbar">
        <!-- gue kepengen dia pas udh scrolling di bawah bd-nya ada warnanya -->
        <div class="container-fluid">
            <a class="navbar-brand navbar-a" href="#" id="navbar-a">SAHABAT KUSUMA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse menu collapse-2" id="navbarText">
                <ul class="navbar-nav me-5 mb-2 mb-lg-0 collapse-2">
                    <li class="nav-item">
                        <a class="nav-link active navbar-a" id="navbar-a" aria-current="page" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-a" id="navbar-a" href="#layanan_kami">Layanan Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-a" id="navbar-a" href="#survey_pelayanan">Survei Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-a" id="navbar-a" href="#hubungi_kami">Hubungi Kami</a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse menu d-flex justify-content-end collapse-1">
                <ul class="navbar-nav me-5 mb-2 mb-lg-0 collapse-1">
                    <li class="nav-item">
                        <a class="nav-link active navbar-a" id="navbar-a" aria-current="page" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-a" id="navbar-a" href="#layanan_kami">Layanan Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-a" id="navbar-a" href="#survey_pelayanan">Survei Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-a" id="navbar-a" href="#hubungi_kami">Hubungi Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main class="l-main mt-5">
    <section class="beranda" id="beranda">
        <div class="container-fluid beranda_fluid">
            <div class="col-6 beranda_judul">
                <div class="row logo_container justify-content-around">
                    <div class="div_logo">
                        <img class="logo" src="/img/logo_fix.png" alt="Kementerian Hukum dan HAM">
                    </div>
                    <p class="logo">Kantor Wilayah Kementerian Hukum dan HAM <br> Sumatera Utara</p>
                </div>
                <h1 class="beranda_judul_besar">
                    HI, <span class="beranda_warna_judul_1">SAHABAT</span> <br><span class="beranda_warna_judul_2">KUSUMA</span>
                </h1>
                <p class="p-beranda">SAHABAT KUSUMA tak perlu datang, cukup klik apa yang SAHABAT butuhkan</p>
                <a href="#layanan_kami" class="btn btn-secondary beranda_button">LAYANAN KAMI</a>
                <!-- <div class="btn-group">
                    <button class="btn btn-secondary dropdown-toggle beranda_button" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        LAYANAN KAMI
                    </button>
                    <ul class="dropdown-menu" id="myDropdown" aria-labelledby="dropdownMenuButton">
                        <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                        <li><a class="dropdown-item" href="#">Menu item 1</a></li>
                        <li><a class="dropdown-item" href="#">Menu item 2</a></li>
                        <li><a class="dropdown-item" href="#">ijah</a></li>
                    </ul>
                </div> -->
            </div>
            <div class="col-3 beranda_maskot">
                <img class="beranda_elma" src="/img/FILE KUSUMA_KUSUMA PNG 2.png" alt="">
            </div>
        </div>
    </section>
    <section class="layanan_kami" id="layanan_kami">
        <div class="container container_layanan_kami">
            <div class="row judul_besar">
                <h1>LAYANAN KAMI</h1>
                <p>Silahkan Pilih Layanan yang Diinginkan</p>
            </div>
            <div class="row">
                <div class="btn-group cari_center">
                    <button class="btn btn-secondary dropdown-toggle cari_center_button" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        CARI LAYANAN
                    </button>
                    <ul class="dropdown-menu isi_center" id="myDropdown" aria-labelledby="dropdownMenuButton">
                        <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                        <li><a class="dropdown-item" href="https://sipoltak.com/web/index.php?r=site%2Flogin" target="_blank">SIPOLTAK (Pelaporan, Pemeriksaan, dan Pengawasan Melekat Kenotariatan)</a></li>
                        <li><a class="dropdown-item" href="https://www.sililaba.id/login" target="_blank">SILILABA (Pelaporan Izin Keimigrasian Alat Angkut Pelabuhan)</a></li>
                        <li><a class="dropdown-item" href="https://monwai.kumhamsumut.com/" target="_blank">MONWAI KPP (Monitoring Kepegawaian Kenaikan Pangkat dan Pensiun)</a></li>
                        <li><a class="dropdown-item" href="https://merek.dgip.go.id/" target="_blank">Pendaftaran Merek</a></li>
                        <li><a class="dropdown-item" href="https://paten.dgip.go.id/site/login" target="_blank">Permohonan Hak Paten</a></li>
                        <li><a class="dropdown-item" href="https://e-hakcipta.dgip.go.id/index.php/login" target="_blank">Pengurusan Hak Cipta</a></li>
                        <li><a class="dropdown-item" href="https://desainindustri.dgip.go.id/site/login" target="_blank">Pelayanan Desain Industri</a></li>
                        <li><a class="dropdown-item" href="http://ig.dgip.go.id/" target="_blank">Pelayanan Indikasi Geografis</a></li>
                        <li><a class="dropdown-item" href="https://loketvirtual.dgip.go.id/" target="_blank">Loket Virtual Kekayaan Intelektual (KI)</a></li>
                        <li><a class="dropdown-item" href="https://pdki-indonesia.dgip.go.id/" target="_blank">Pangkalan Data Kekayaan Intelektual (KI)</a></li>
                        <li><a class="dropdown-item" href="http://kikomunal-indonesia.dgip.go.id/" target="_blank">Kekayaan Intelektual (KI) Komunal</a></li>
                        <li><a class="dropdown-item" href="https://e-pengaduan.dgip.go.id/" target="_blank">Pengaduan Pelanggaran Kekayaan Intelektual (KI)</a></li>
                        <li><a class="dropdown-item" href="http://sidbankum.bphn.go.id/" target="_blank">SIDBANKUM (Permohonan dan Pencairan Bantuan Hukum)</a></li>
                        <li><a class="dropdown-item" href="https://www.imigrasi.go.id/imigrasiv1/cek_status_permohonan/paspor" target="_blank">Cek Status Permohonan Paspor</a></li>
                        <li><a class="dropdown-item" href="https://www.imigrasi.go.id/imigrasiv1/cek_status_permohonan/visa" target="_blank">Cek Status Persetujuan Visa Elektronik</a></li>
                        <li><a class="dropdown-item" href="https://visa-online.imigrasi.go.id/" target="_blank">Visa Elektronik</a></li>
                        <li><a class="dropdown-item" href="https://www.imigrasi.go.id/imigrasiv1/cek_status_permohonan/intal" target="_blank">Cek Status Permohonan Izin Tinggal</a></li>
                        <li><a class="dropdown-item" href="https://izintinggal-online.imigrasi.go.id/" target="_blank">Aplikasi Permohonan Izin Tinggal Online</a></li>
                        <li><a class="dropdown-item" href="https://apoa.imigrasi.go.id/poa/" target="_blank">Aplikasi Pelaporan Orang Asing (APOA)</a></li>
                        <li><a class="dropdown-item" href="https://www.tidio.com/talk/wpv78l8remlyrku6cf45vjbfapuo7w95" target="_blank">Konsultasi Pelayanan</a></li>
                        <li><a class="dropdown-item" href="https://wa.me/message/H3ANITC6Y5CNH1" target="_blank">KUSUMA DUMAS (Pengaduan Masyarakat)</a></li>
                    </ul>
                </div>
            </div>
            <div class="row justify-content-around">
                <div class="col-lg-3 card">
                    <a href="https://sipoltak.com/web/index.php?r=site%2Flogin" target="_blank">
                        <img src="/img/notary.png" class="card-img-top" alt="SIPOLTAK">
                        <div class="card-body">
                            <h5 class="card-title">SIPOLTAK</h5>
                            <p class="card-text">Sistem Pelaporan, Pemeriksaan dan Pengawasan Melekat Kenotariatan Online</p>
                            <!-- <a href="https://sipoltak.com/web/index.php?r=site%2Flogin" class="card_button btn btn-primary" target="_blank">Masuk</a> -->
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 card">
                    <a href="https://www.sililaba.id/login" target="_blank">
                        <img src="/img/ship.png" class="card-img-top" alt="SILILABA">
                        <div class="card-body">
                            <h5 class="card-title">SILILABA</h5>
                            <p class="card-text">Sistem Informasi Pelaporan Izin Keimigrasian Alat Angkut Pelabuhan</p>
                            <!-- <a href="https://www.sililaba.id/login" class="card_button btn btn-primary" target="_blank">Masuk</a> -->
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 card">
                    <a href="https://monwai.kumhamsumut.com/" target="_blank">
                        <img src="/img/businessman.png" class="card-img-top" alt="MONWAI KPP">
                        <div class="card-body">
                            <h5 class="card-title">MONWAI KPP</h5>
                            <p class="card-text">Monitoring Kepegawaian Kenaikan Pangkat dan Pensiun</p>
                            <!-- <a href="https://monwai.kumhamsumut.com/" class="card_button btn btn-primary" target="_blank">Masuk</a> -->
                        </div>
                    </a>
                </div>
            </div>
            <div class="row justify-content-around mt-5">
                <div class="col-lg-3 card">
                    <a href="https://merek.dgip.go.id/" target="_blank">
                        <img src="/img/brand.png" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">PENDAFTARAN MEREK</h5>
                            <p class="card-text">Aplikasi Layanan Pengurusan Merek (Pendaftaran, Cek Sertifikat, dan Cek Publikasi Merek)</p>
                            <!-- <a href="https://www.tidio.com/talk/wpv78l8remlyrku6cf45vjbfapuo7w95" class="card_button btn btn-primary" target="_blank">Masuk</a> -->
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 card">
                    <a href="https://paten.dgip.go.id/site/login" target="_blank">
                        <img src="/img/compliant.png" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">PERMOHONAN HAK PATEN</h5>
                            <p class="card-text">Aplikasi Pengurusan Hak Paten (Permohonan, Perpanjangan, Pengalihan Hak, dan Cetak Sertifikat)</p>
                            <!-- <a href="https://www.tidio.com/talk/wpv78l8remlyrku6cf45vjbfapuo7w95" class="card_button btn btn-primary" target="_blank">Masuk</a> -->
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 card">
                    <a href="https://e-hakcipta.dgip.go.id/index.php/login" target="_blank">
                        <img src="/img/copyright.png" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">PENGURUSAN HAK CIPTA</h5>
                            <p class="card-text">Aplikasi Layanan Pengurusan Hak Cipta oleh Direktorat Jenderal Kekayaan Intelektual</p>
                            <!-- <a href="https://www.tidio.com/talk/wpv78l8remlyrku6cf45vjbfapuo7w95" class="card_button btn btn-primary" target="_blank">Masuk</a> -->
                        </div>
                    </a>
                </div>
            </div>
            <div class="row justify-content-around mt-5">
                <div class="col-lg-3 card">
                    <a href="https://desainindustri.dgip.go.id/site/login" target="_blank">
                        <img src="/img/prototype.png" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">PELAYANAN DESAIN INDUSTRI</h5>
                            <p class="card-text">Aplikasi Layanan Permohonan Desain Industri oleh Direktorat Jenderal Kekayaan Intelektual</p>
                            <!-- <a href="https://www.tidio.com/talk/wpv78l8remlyrku6cf45vjbfapuo7w95" class="card_button btn btn-primary" target="_blank">Masuk</a> -->
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 card">
                    <a href="http://ig.dgip.go.id/" target="_blank">
                        <img src="/img/navigation.png" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">INDIKASI GEOGRAFIS</h5>
                            <p class="card-text">Aplikasi Layanan Terkait Indikasi Geografis oleh Direktorat Jenderal Kekayaan Intelektual</p>
                            <!-- <a href="https://www.tidio.com/talk/wpv78l8remlyrku6cf45vjbfapuo7w95" class="card_button btn btn-primary" target="_blank">Masuk</a> -->
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 card">
                    <a href="https://loketvirtual.dgip.go.id/" target="_blank">
                        <img src="/img/counter.png" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">LOKET VIRTUAL KI</h5>
                            <p class="card-text">Aplikasi Pelayanan Online yang Disediakan oleh Direktorat Jenderal Kekayaan Intelektual</p>
                            <!-- <a href="https://www.tidio.com/talk/wpv78l8remlyrku6cf45vjbfapuo7w95" class="card_button btn btn-primary" target="_blank">Masuk</a> -->
                        </div>
                    </a>
                </div>
            </div>
            <div class="row justify-content-around mt-5">
                <div class="col-lg-3 card">
                    <a href="https://pdki-indonesia.dgip.go.id/" target="_blank">
                        <img src="/img/database-storage.png" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">PANGKALAN DATA KI</h5>
                            <p class="card-text">Pangkalan Data Kekayaan Intelektual untuk Melihat Data Merk, Paten, Hak Cipta, dll</p>
                            <!-- <a href="https://www.tidio.com/talk/wpv78l8remlyrku6cf45vjbfapuo7w95" class="card_button btn btn-primary" target="_blank">Masuk</a> -->
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 card">
                    <a href="http://kikomunal-indonesia.dgip.go.id/" target="_blank">
                        <img src="/img/tumpeng.png" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">KI KOMUNAL</h5>
                            <p class="card-text">Pangkalan Data Kekayaan Intelektual untuk Melihat Data Kekayaan Intelektual Komunal</p>
                            <!-- <a href="https://www.tidio.com/talk/wpv78l8remlyrku6cf45vjbfapuo7w95" class="card_button btn btn-primary" target="_blank">Masuk</a> -->
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 card">
                    <a href="https://e-pengaduan.dgip.go.id/" target="_blank">
                        <img src="/img/teacher.png" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">PENGADUAN KI</h5>
                            <p class="card-text">Aplikasi Pengaduan Pelanggaran Kekayaan Intelektual oleh Direktorat Jenderal Kekayaan Intelektual</p>
                            <!-- <a href="https://www.tidio.com/talk/wpv78l8remlyrku6cf45vjbfapuo7w95" class="card_button btn btn-primary" target="_blank">Masuk</a> -->
                        </div>
                    </a>
                </div>
            </div>
            <div class="row justify-content-around mt-5">
                <div class="col-lg-3 card">
                    <a href="http://sidbankum.bphn.go.id/" target="_blank">
                        <img src="/img/legal-paper.png" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">PERMOHONAN DAN PENCAIRAN BANTUAN HUKUM</h5>
                            <p class="card-text">Layanan Administratif Bantuan Hukum melalui SIDBANKUM (Sistem Informasi Database Bantuan Hukum/SID Bankum)</p>
                            <!-- <a href="https://www.tidio.com/talk/wpv78l8remlyrku6cf45vjbfapuo7w95" class="card_button btn btn-primary" target="_blank">Masuk</a> -->
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 card">
                    <a href="https://www.imigrasi.go.id/imigrasiv1/cek_status_permohonan/paspor" target="_blank">
                        <img src="/img/checking.png" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">CEK STATUS PERMOHONAN PASPOR</h5>
                            <p class="card-text">Aplikasi Pengecekan Status Permohonan Paspor oleh Direktorat Jenderal Keimigrasian</p>
                            <!-- <a href="https://www.tidio.com/talk/wpv78l8remlyrku6cf45vjbfapuo7w95" class="card_button btn btn-primary" target="_blank">Masuk</a> -->
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 card">
                    <a href="https://www.imigrasi.go.id/imigrasiv1/cek_status_permohonan/visa" target="_blank">
                        <img src="/img/passport (5).png" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">CEK STATUS PERSETUJUAN VISA ELEKTRONIK</h5>
                            <p class="card-text">Aplikasi Pengecekan Status Persetujuan Visa Elektronik oleh Direktorat Jenderal Keimigrasian</p>
                            <!-- <a href="https://www.tidio.com/talk/wpv78l8remlyrku6cf45vjbfapuo7w95" class="card_button btn btn-primary" target="_blank">Masuk</a> -->
                        </div>
                    </a>
                </div>
            </div>
            <div class="row justify-content-around mt-5">
                <div class="col-lg-3 card">
                    <a href="https://visa-online.imigrasi.go.id/" target="_blank">
                        <img src="/img/passport (3).png" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">VISA ELEKTRONIK</h5>
                            <p class="card-text">Aplikasi Pengurusan Visa Elektronik oleh Direktorat Jenderal Keimigrasian</p>
                            <!-- <a href="https://www.tidio.com/talk/wpv78l8remlyrku6cf45vjbfapuo7w95" class="card_button btn btn-primary" target="_blank">Masuk</a> -->
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 card">
                    <a href="https://www.imigrasi.go.id/imigrasiv1/cek_status_permohonan/intal" target="_blank">
                        <img src="/img/passport (5).png" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">CEK STATUS PERMOHONAN IZIN TINGGAL</h5>
                            <p class="card-text">Aplikasi Pengecekan Status Permohonan Izin Tinggal oleh Direktorat Jenderal Keimigrasian</p>
                            <!-- <a href="https://www.tidio.com/talk/wpv78l8remlyrku6cf45vjbfapuo7w95" class="card_button btn btn-primary" target="_blank">Masuk</a> -->
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 card">
                    <a href="https://izintinggal-online.imigrasi.go.id/" target="_blank">
                        <img src="/img/website.png" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">APLIKASI PERMOHONAN IZIN TINGGAL ONLINE</h5>
                            <p class="card-text">Aplikasi Permohonan Izin Tinggal oleh Direktorat Jenderal Keimigrasian</p>
                            <!-- <a href="https://www.tidio.com/talk/wpv78l8remlyrku6cf45vjbfapuo7w95" class="card_button btn btn-primary" target="_blank">Masuk</a> -->
                        </div>
                    </a>
                </div>
            </div>
            <div class="row justify-content-around mt-5">
                <div class="col-lg-3 card">
                    <a href="https://apoa.imigrasi.go.id/poa/" target="_blank">
                        <img src="/img/browser.png" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">APLIKASI PELAPORAN ORANG ASING</h5>
                            <p class="card-text">Aplikasi Pelaporan Orang Asing (APOA) oleh Direktorat Jenderal Keimigrasian</p>
                            <!-- <a href="https://www.tidio.com/talk/wpv78l8remlyrku6cf45vjbfapuo7w95" class="card_button btn btn-primary" target="_blank">Masuk</a> -->
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 card">
                    <a href="https://www.tidio.com/talk/wpv78l8remlyrku6cf45vjbfapuo7w95" target="_blank">
                        <img src="/img/customer-service.png" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">KONSULTASI PELAYANAN</h5>
                            <p class="card-text">Bicara dengan Tim Pelayanan KUSUMA untuk Konsultasi Pelayanan</p>
                            <!-- <a href="https://www.tidio.com/talk/wpv78l8remlyrku6cf45vjbfapuo7w95" class="card_button btn btn-primary" target="_blank">Masuk</a> -->
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 card">
                    <a href="https://wa.me/message/H3ANITC6Y5CNH1" target="_blank">
                        <img src="/img/rating (1).png" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">KUSUMA DUMAS</h5>
                            <p class="card-text">Pengaduan Masyarakat Kanwil Kemenkumham Sumatera Utara</p>
                            <!-- <a href="https://wa.me/message/H3ANITC6Y5CNH1" class="card_button btn btn-primary" target="_blank">Masuk</a> -->
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="survey_pelayanan" id="survey_pelayanan">
        <!-- <div class="container container_jumlah_survei">
dibuat grafiknya?
        </div> -->
        <div class="container container_survey_pelayanan">
            <div class="row justify-content-around">
                <div class="col-md-7 align-self-center">
                    <h1 class="card-title">SURVEY PELAYANAN</h1>
                    <p class="card-text">Bantu kami mengetahui apa yang perlu kami perbaiki dan kembangkan dari pelayanan kami melalui Survey Indeks Persepsi Korupsi dan Indeks Kepuasan Masyarakat (IPK-IKM).</p>
                    <a href="https://survei.balitbangham.go.id/ly/h5J068jb" class="card_button btn btn-primary" target="_blank">Masuk</a>
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
    <!-- <p>Icons made by <a href="https://www.flaticon.com/authors/turkkub" title="turkkub">turkkub</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></p> -->
</footer>
<?= $this->endSection(); ?>