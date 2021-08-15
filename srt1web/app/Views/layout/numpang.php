<div class="col-md-2" id="sticky-sidebar">
    <a href="<?= base_url('/nomor/hari_ini'); ?>" class="btn btn-primary btn-lg mb-3 mt-5 col-12 
    <?php if ($page == 'hari_ini') { ?>disabled<?php } else { ?>active<?php } ?>
    ">Nomor Hari Ini</a>
    <a href="<?= base_url('/nomor/hitung_mundur'); ?>" class="btn btn-primary btn-lg  mb-3 col-12
    <?php if ($page == 'hitung_mundur') { ?>disabled<?php } else { ?>active<?php } ?>
    ">Nomor Tanggal Mundur</a>
    <?php if ($status_user == 'admin' || $status_user == 'super') { ?>
        <a href="<?= base_url('/mng_user'); ?>" class="btn btn-primary btn-lg  mb-3 col-12
    <?php if ($page == 'kelola_user') { ?>disabled<?php } else { ?>active<?php } ?>
    ">Kelola User</a>
    <?php } ?>
    <?php if ($status_user == 'super') { ?>
        <a href="<?= base_url('/div'); ?>" class="btn btn-primary btn-lg mb-3 col-12
    <?php if ($page == 'kelola_div') { ?>disabled<?php } else { ?>active<?php } ?>
    ">Kelola Divisi</a>
    <?php } ?>
    <?php if ($status_user == 'super') { ?>
        <a href="<?= base_url('/bag'); ?>" class="btn btn-primary btn-lg mb-3 col-12
    <?php if ($page == 'kelola_bag') { ?>disabled<?php } else { ?>active<?php } ?>
    ">Kelola Bagian</a>
    <?php } ?>
    <?php if ($status_user == 'super') { ?>
        <a href="<?= base_url('/subbag'); ?>" class="btn btn-primary btn-lg mb-3 col-12
    <?php if ($page == 'kelola_subbag') { ?>disabled<?php } else { ?>active<?php } ?>
    ">Kelola Subbagian</a>
    <?php } ?>
    <?php if ($status_user == 'super') { ?>
        <a href="<?= base_url('/akses'); ?>" class="btn btn-primary btn-lg  col-12
    <?php if ($page == 'kelola_akses') { ?>disabled<?php } else { ?>active<?php } ?>
    ">Kelola Akses</a>
    <?php } ?>
</div>