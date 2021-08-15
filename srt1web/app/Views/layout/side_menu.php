<?php if ($status_user != "logout" || $page != "login") { ?>
    <div class="col-md-2 side-bar pt-5" id="sticky-sidebar">
        <div class="row web-name">
            <?php if ($status_user == "admin" || $status_user == "super") { ?>
                <a class="navbar-brand" href="<?= base_url('/' . $status_user); ?>">
                <?php } else { ?>
                    <a class="navbar-brand" href="<?= base_url('/pegawai'); ?>">
                    <?php } ?>
                    <h1>SISTEM<br>PENOMORAN<br>SURAT</h1>
                    </a>
        </div>
        <div class="row menu justify-content-start" id="menu">
            <a href="<?= base_url('/nomor/hari_ini'); ?>" class="btn btn-lg mb-2 mt-3 col-11 
    <?php if ($page == 'hari_ini') { ?>disabled<?php } else { ?>active<?php } ?>
    ">Nomor Hari Ini
            </a>
            <a href="<?= base_url('/nomor/hitung_mundur'); ?>" class="btn btn-lg  mb-2 col-11 hitung-mundur
    <?php if ($page == 'hitung_mundur') { ?>disabled<?php } else { ?>active<?php } ?>
    ">Nomor Tanggal Mundur</a>
            <?php if ($status_user == 'admin' || $status_user == 'super') { ?>
                <a href="<?= base_url('/mng_user'); ?>" class="btn btn-lg  mb-2 col-11
    <?php if ($page == 'kelola_user') { ?>disabled<?php } else { ?>active<?php } ?>
    ">Kelola User</a>
            <?php } ?>
            <?php if ($status_user == 'super') { ?>
                <a href="<?= base_url('/div'); ?>" class="btn btn-lg mb-2 col-11
    <?php if ($page == 'kelola_div') { ?>disabled<?php } else { ?>active<?php } ?>
    ">Kelola Divisi</a>
            <?php } ?>
            <?php if ($status_user == 'super') { ?>
                <a href="<?= base_url('/bag'); ?>" class="btn btn-lg mb-2 col-11
    <?php if ($page == 'kelola_bag') { ?>disabled<?php } else { ?>active<?php } ?>
    ">Kelola Bagian</a>
            <?php } ?>
            <?php if ($status_user == 'super') { ?>
                <a href="<?= base_url('/subbag'); ?>" class="btn btn-lg mb-2 col-11
    <?php if ($page == 'kelola_subbag') { ?>disabled<?php } else { ?>active<?php } ?>
    ">Kelola Subbagian</a>
            <?php } ?>
            <?php if ($status_user == 'super') { ?>
                <a href="<?= base_url('/akses'); ?>" class="btn btn-lg  mb-5 col-11
    <?php if ($page == 'kelola_akses') { ?>disabled<?php } else { ?>active<?php } ?>
    ">Kelola Akses</a>
            <?php } ?>
        </div>
        <?php if ($status_user != 'super') { ?>
            <br><br><br>
        <?php } ?>
        <div class="row align-items-end profile">
            <div class="row">
                <div class="col">
                    <?= $nama; ?>
                    <?php if ($status_user == 'super' || $status_user == 'admin') { ?>
                        <br> <?= $ket_user; ?>
                    <?php } ?>
                </div>
            </div>
            <div class="row d-flex align-items-center justify-content-start edit-signout">
                <a class="mb-2 mt-2" href="<?= base_url('/edit_password'); ?>"><small>Edit Password</small></a>
                <a href="<?= base_url('/logout'); ?>"><small>Sign Out</small></a>
            </div>
        </div>
    </div>
<?php } ?>