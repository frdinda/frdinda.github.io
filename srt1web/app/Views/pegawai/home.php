<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-flluid ms-0 me-0">
    <div class="row all justify-content-start">
        <?= $this->include('layout/side_menu'); ?>
        <div class="col-md-10">
            <!-- <div class="row">
                <div class="col">
                    <div class="row justify-content-end mb-1">
                        <div class="col-md-3">
                            <form class="login mt-4" id="login" action="/nomor/search" method="post">
                                <input type="text" class="form-control" id="search" name="search" aria-describedby="" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="surat-all-tab" data-bs-toggle="tab" data-bs-target="#surat-all" type="button" role="tab" aria-controls="surat-all" aria-selected="true">Semua Surat Keluar</button>
                    </li>
                    <?php if ($status_user == 'kbg' || $status_user == 'kdv') { ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="surat-bag-tab" data-bs-toggle="tab" data-bs-target="#surat-bag" type="button" role="tab" aria-controls="surat-bag" aria-selected="false">Surat Keluar <?php if ($status_user == 'kbg') { ?>
                                    Bagian/Bidang
                                <?php } else if ($status_user == 'kdv') { ?>
                                    Divisi
                                <?php } ?></button>
                        </li>
                    <?php } else {
                    } ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="surat-user-tab" data-bs-toggle="tab" data-bs-target="#surat-user" type="button" role="tab" aria-controls="surat-user" aria-selected="false">Surat Keluar User</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="surat-all" role="tabpanel" aria-labelledby="surat-all-tab">
                        <table class="table table-hover mt-2" id="table-surat-all">
                            <thead class="">
                                <tr>
                                    <th class="col-md-1" scope="col">No. Surat</th>
                                    <th class="col-md-2" scope="col">Penomoran</th>
                                    <th class="col-md-2" scope="col">Tanggal_Surat</th>
                                    <th class="col-md-3" scope="col">Subbagian/Subbidang</th>
                                    <th class="col-md-3" scope="col">Perihal</th>
                                    <th class="col-md-2" scope="col">Detail Revisi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($search)) {
                                    $surat = $search;
                                } else {
                                }
                                foreach ($surat as $s) : ?>
                                    <tr>
                                        <td scope="row"><?= $s['no_surat']; ?></td>
                                        <td scope="row">
                                            <?php if (is_null($s['kode_masalah'])) { ?>
                                                -
                                            <?php } else { ?>
                                                <?= $s['kode_unit']; ?>-<?= $s['kode_masalah']; ?>.<?= $s['masalah_substantif_1']; ?>.<?= $s['masalah_substantif_2']; ?>
                                            <?php } ?>
                                        </td>
                                        <td><?php $tanggal_surat = date("d-m-Y", strtotime($s['tanggal_surat']));
                                            $hari_surat = date("D", strtotime($s['tanggal_surat']));
                                            if ($hari_surat == 'Mon') {
                                                $hari_surat = 'Senin';
                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                echo $tanggal_surat;
                                            } else if ($hari_surat == 'Tue') {
                                                $hari_surat = 'Selasa';
                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                echo $tanggal_surat;
                                            } else if ($hari_surat == 'Wed') {
                                                $hari_surat = 'Rabu';
                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                echo $tanggal_surat;
                                            } else if ($hari_surat == 'Thu') {
                                                $hari_surat = 'Kamis';
                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                echo $tanggal_surat;
                                            } else if ($hari_surat == 'Fri') {
                                                $hari_surat = 'Jumat';
                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                echo $tanggal_surat;
                                            } else if ($hari_surat == 'Sat') {
                                                $hari_surat = 'Sabtu';
                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                echo $tanggal_surat;
                                            } else if ($hari_surat == 'Sun') {
                                                $hari_surat = 'Minggu';
                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                echo $tanggal_surat;
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if (is_null($s['id_akses'])) { ?>
                                                -
                                            <?php } else {
                                                if ($s['id_akses'] == "kkw") {
                                                    echo $s['jenis_akses'];
                                                } else if (empty($s['nama_subbag'])) {
                                                    if (empty($s['nama_bag'])) {
                                                        echo $s['nama_div'];
                                                    } else {
                                                        echo $s['nama_bag'];
                                                    }
                                                } else {
                                                    echo $s['nama_subbag'];
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php if (is_null($s['perihal'])) { ?>
                                                -
                                            <?php } else {
                                                echo $s['perihal'];
                                            }
                                            ?>
                                        </td>
                                        <td><a href="<?= base_url('/nomor/detail_revisi/' . $s['no_surat']); ?>" class="btn btn-primary">Detail</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="surat-bag" role="tabpanel" aria-labelledby="surat-bag-tab">
                        <table class="table table-hover mt-2" id="table-surat-bag">
                            <thead class="">
                                <tr>
                                    <th class="col-md-1" scope="col">No. Surat</th>
                                    <th class="col-md-2" scope="col">Penomoran</th>
                                    <th class="col-md-2" scope="col">Tanggal_Surat</th>
                                    <th class="col-md-3" scope="col">Subbagian/Subbidang</th>
                                    <th class="col-md-3" scope="col">Perihal</th>
                                    <th class="col-md-2" scope="col">Detail Revisi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($surat_pim)) {
                                    if (isset($search)) {
                                        foreach ($search as $p) :
                                            if ($status_user == 'kbg') {
                                                if ($p['id_bag'] == $id_bag) {
                                ?>
                                                    <tr>
                                                        <td scope="row"><?= $p['no_surat']; ?></td>
                                                        <td scope="row">
                                                            <?php if (is_null($p['kode_masalah'])) { ?>
                                                                -
                                                            <?php } else { ?>
                                                                <?= $p['kode_unit']; ?>-<?= $p['kode_masalah']; ?>.<?= $p['masalah_substantif_1']; ?>.<?= $p['masalah_substantif_2']; ?>
                                                            <?php } ?>
                                                        </td>
                                                        <td><?php $tanggal_surat = date("d-m-Y", strtotime($p['tanggal_surat']));
                                                            $hari_surat = date("D", strtotime($p['tanggal_surat']));
                                                            if ($hari_surat == 'Mon') {
                                                                $hari_surat = 'Senin';
                                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                                echo $tanggal_surat;
                                                            } else if ($hari_surat == 'Tue') {
                                                                $hari_surat = 'Selasa';
                                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                                echo $tanggal_surat;
                                                            } else if ($hari_surat == 'Wed') {
                                                                $hari_surat = 'Rabu';
                                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                                echo $tanggal_surat;
                                                            } else if ($hari_surat == 'Thu') {
                                                                $hari_surat = 'Kamis';
                                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                                echo $tanggal_surat;
                                                            } else if ($hari_surat == 'Fri') {
                                                                $hari_surat = 'Jumat';
                                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                                echo $tanggal_surat;
                                                            } else if ($hari_surat == 'Sat') {
                                                                $hari_surat = 'Sabtu';
                                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                                echo $tanggal_surat;
                                                            } else if ($hari_surat == 'Sun') {
                                                                $hari_surat = 'Minggu';
                                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                                echo $tanggal_surat;
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <?php if (is_null($p['id_akses'])) { ?>
                                                                -
                                                            <?php } else {
                                                                if ($p['id_akses'] == "kkw") {
                                                                    echo $p['jenis_akses'];
                                                                } else if (empty($p['nama_subbag'])) {
                                                                    if (empty($p['nama_bag'])) {
                                                                        echo $p['nama_div'];
                                                                    } else {
                                                                        echo $p['nama_bag'];
                                                                    }
                                                                } else {
                                                                    echo $p['nama_subbag'];
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php if (is_null($p['perihal'])) { ?>
                                                                -
                                                            <?php } else {
                                                                echo $p['perihal'];
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><a href="<?= base_url('/nomor/detail_revisi/' . $p['no_surat']); ?>" class="btn btn-primary">Detail</a></td>
                                                    </tr>
                                                <?php
                                                }
                                            } else if ($status_user == 'kdv') {
                                                if ($p['id_div'] == $id_div) {
                                                ?>
                                                    <tr>
                                                        <td scope="row"><?= $p['no_surat']; ?></td>
                                                        <td scope="row">
                                                            <?php if (is_null($p['kode_masalah'])) { ?>
                                                                -
                                                            <?php } else { ?>
                                                                <?= $p['kode_unit']; ?>-<?= $p['kode_masalah']; ?>.<?= $p['masalah_substantif_1']; ?>.<?= $p['masalah_substantif_2']; ?>
                                                            <?php } ?>
                                                        </td>
                                                        <td><?php $tanggal_surat = date("d-m-Y", strtotime($p['tanggal_surat']));
                                                            $hari_surat = date("D", strtotime($p['tanggal_surat']));
                                                            if ($hari_surat == 'Mon') {
                                                                $hari_surat = 'Senin';
                                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                                echo $tanggal_surat;
                                                            } else if ($hari_surat == 'Tue') {
                                                                $hari_surat = 'Selasa';
                                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                                echo $tanggal_surat;
                                                            } else if ($hari_surat == 'Wed') {
                                                                $hari_surat = 'Rabu';
                                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                                echo $tanggal_surat;
                                                            } else if ($hari_surat == 'Thu') {
                                                                $hari_surat = 'Kamis';
                                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                                echo $tanggal_surat;
                                                            } else if ($hari_surat == 'Fri') {
                                                                $hari_surat = 'Jumat';
                                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                                echo $tanggal_surat;
                                                            } else if ($hari_surat == 'Sat') {
                                                                $hari_surat = 'Sabtu';
                                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                                echo $tanggal_surat;
                                                            } else if ($hari_surat == 'Sun') {
                                                                $hari_surat = 'Minggu';
                                                                $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                                echo $tanggal_surat;
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <?php if (is_null($p['id_akses'])) { ?>
                                                                -
                                                            <?php } else {
                                                                if ($p['id_akses'] == "kkw") {
                                                                    echo $p['jenis_akses'];
                                                                } else if (empty($p['nama_subbag'])) {
                                                                    if (empty($p['nama_bag'])) {
                                                                        echo $p['nama_div'];
                                                                    } else {
                                                                        echo $p['nama_bag'];
                                                                    }
                                                                } else {
                                                                    echo $p['nama_subbag'];
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php if (is_null($p['perihal'])) { ?>
                                                                -
                                                            <?php } else {
                                                                echo $p['perihal'];
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><a href="<?= base_url('/nomor/detail_revisi/' . $p['no_surat']); ?>" class="btn btn-primary">Detail</a></td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                        endforeach;
                                    } else {
                                        foreach ($surat_pim as $p) : ?>
                                            <tr>
                                                <td scope="row"><?= $p['no_surat']; ?></td>
                                                <td scope="row">
                                                    <?php if (is_null($p['kode_masalah'])) { ?>
                                                        -
                                                    <?php } else { ?>
                                                        <?= $p['kode_unit']; ?>-<?= $p['kode_masalah']; ?>.<?= $p['masalah_substantif_1']; ?>.<?= $p['masalah_substantif_2']; ?>
                                                    <?php } ?>
                                                </td>
                                                <td><?php $tanggal_surat = date("d-m-Y", strtotime($p['tanggal_surat']));
                                                    $hari_surat = date("D", strtotime($p['tanggal_surat']));
                                                    if ($hari_surat == 'Mon') {
                                                        $hari_surat = 'Senin';
                                                        $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                        echo $tanggal_surat;
                                                    } else if ($hari_surat == 'Tue') {
                                                        $hari_surat = 'Selasa';
                                                        $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                        echo $tanggal_surat;
                                                    } else if ($hari_surat == 'Wed') {
                                                        $hari_surat = 'Rabu';
                                                        $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                        echo $tanggal_surat;
                                                    } else if ($hari_surat == 'Thu') {
                                                        $hari_surat = 'Kamis';
                                                        $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                        echo $tanggal_surat;
                                                    } else if ($hari_surat == 'Fri') {
                                                        $hari_surat = 'Jumat';
                                                        $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                        echo $tanggal_surat;
                                                    } else if ($hari_surat == 'Sat') {
                                                        $hari_surat = 'Sabtu';
                                                        $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                        echo $tanggal_surat;
                                                    } else if ($hari_surat == 'Sun') {
                                                        $hari_surat = 'Minggu';
                                                        $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                        echo $tanggal_surat;
                                                    } ?>
                                                </td>
                                                <td>
                                                    <?php if (is_null($p['id_akses'])) { ?>
                                                        -
                                                    <?php } else {
                                                        if ($p['id_akses'] == "kkw") {
                                                            echo $p['jenis_akses'];
                                                        } else if (empty($p['nama_subbag'])) {
                                                            if (empty($p['nama_bag'])) {
                                                                echo $p['nama_div'];
                                                            } else {
                                                                echo $p['nama_bag'];
                                                            }
                                                        } else {
                                                            echo $p['nama_subbag'];
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php if (is_null($p['perihal'])) { ?>
                                                        -
                                                    <?php } else {
                                                        echo $p['perihal'];
                                                    }
                                                    ?>
                                                </td>
                                                <td><a href="<?= base_url('/nomor/detail_revisi/' . $p['no_surat']); ?>" class="btn btn-primary">Detail</a></td>
                                            </tr>
                                <?php
                                        endforeach;
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="surat-user" role="tabpanel" aria-labelledby="surat-user-tab">
                        <table class="table table-hover mt-2" id="table-surat-user">
                            <thead class="">
                                <tr>
                                    <th class="col-md-1" scope="col">No. Surat</th>
                                    <th class="col-md-2" scope="col">Penomoran</th>
                                    <th class="col-md-2" scope="col">Tanggal_Surat</th>
                                    <th class="col-md-3" scope="col">Subbagian/Subbidang</th>
                                    <th class="col-md-3" scope="col">Perihal</th>
                                    <th class="col-md-2" scope="col">Nama Pegawai</th>
                                    <th class="col-md-2" scope="col">Tanggal Input</th>
                                    <th class="col-md-2" scope="col">Tanggal Revisi</th>
                                    <th scope="col">Detail Revisi</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th class="col-md-2" scope="col">Detail Revisi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- BELUM SAYANG -->
                                <?php if (isset($search)) {
                                    $surat_user = $search;
                                } else {
                                }
                                foreach ($surat_user as $d) :
                                    if ($d['user_id'] == $user_id) { ?>
                                        <tr>
                                            <td scope="row"><?= $d['no_surat']; ?></td>
                                            <td scope="row">
                                                <?php if (is_null($d['kode_masalah'])) { ?>
                                                    -
                                                <?php } else { ?>
                                                    <?= $d['kode_unit']; ?>-<?= $d['kode_masalah']; ?>.<?= $d['masalah_substantif_1']; ?>.<?= $d['masalah_substantif_2']; ?>
                                                <?php } ?>
                                            </td>
                                            <td><?php $tanggal_surat = date("d-m-Y", strtotime($d['tanggal_surat']));
                                                $hari_surat = date("D", strtotime($d['tanggal_surat']));
                                                if ($hari_surat == 'Mon') {
                                                    $hari_surat = 'Senin';
                                                    $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                    echo $tanggal_surat;
                                                } else if ($hari_surat == 'Tue') {
                                                    $hari_surat = 'Selasa';
                                                    $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                    echo $tanggal_surat;
                                                } else if ($hari_surat == 'Wed') {
                                                    $hari_surat = 'Rabu';
                                                    $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                    echo $tanggal_surat;
                                                } else if ($hari_surat == 'Thu') {
                                                    $hari_surat = 'Kamis';
                                                    $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                    echo $tanggal_surat;
                                                } else if ($hari_surat == 'Fri') {
                                                    $hari_surat = 'Jumat';
                                                    $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                    echo $tanggal_surat;
                                                } else if ($hari_surat == 'Sat') {
                                                    $hari_surat = 'Sabtu';
                                                    $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                    echo $tanggal_surat;
                                                } else if ($hari_surat == 'Sun') {
                                                    $hari_surat = 'Minggu';
                                                    $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                    echo $tanggal_surat;
                                                } ?></td>
                                            <td>
                                                <?php if (is_null($d['id_akses'])) { ?>
                                                    -
                                                <?php } else {
                                                    if ($d['id_akses'] == "super" || $d['id_akses'] == "admin" || $d['id_akses'] == "kkw") {
                                                        echo $d['jenis_akses'];
                                                    } else if (empty($d['nama_subbag'])) {
                                                        if (empty($d['nama_bag'])) {
                                                            echo $d['nama_div'];
                                                        } else {
                                                            echo $d['nama_bag'];
                                                        }
                                                    } else {
                                                        echo $d['nama_subbag'];
                                                    }
                                                }
                                                ?>

                                            </td>
                                            <td>
                                                <?php if (is_null($d['perihal'])) { ?>
                                                    -
                                                <?php } else {
                                                    echo $d['perihal'];
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php if (is_null($d['id_akses'])) { ?>
                                                    -
                                                <?php } else {
                                                    if ($d['id_akses'] == "sbg" || $d['id_akses'] == "super" || $d['id_akses'] == "admin") {
                                                        echo $d['nama_pegawai'];
                                                    } else {
                                                        echo $d['nama_kepala'];
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td><?php if ($d['tanggal_pengambilan'] != 0000 - 00 - 00) {
                                                    $tanggal_surat = date("d-m-Y", strtotime($d['tanggal_pengambilan']));
                                                    $hari_surat = date("D", strtotime($d['tanggal_pengambilan']));
                                                    if ($hari_surat == 'Mon') {
                                                        $hari_surat = 'Senin';
                                                        $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                        echo $tanggal_surat;
                                                    } else if ($hari_surat == 'Tue') {
                                                        $hari_surat = 'Selasa';
                                                        $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                        echo $tanggal_surat;
                                                    } else if ($hari_surat == 'Wed') {
                                                        $hari_surat = 'Rabu';
                                                        $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                        echo $tanggal_surat;
                                                    } else if ($hari_surat == 'Thu') {
                                                        $hari_surat = 'Kamis';
                                                        $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                        echo $tanggal_surat;
                                                    } else if ($hari_surat == 'Fri') {
                                                        $hari_surat = 'Jumat';
                                                        $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                        echo $tanggal_surat;
                                                    } else if ($hari_surat == 'Sat') {
                                                        $hari_surat = 'Sabtu';
                                                        $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                        echo $tanggal_surat;
                                                    } else if ($hari_surat == 'Sun') {
                                                        $hari_surat = 'Minggu';
                                                        $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                        echo $tanggal_surat;
                                                    }
                                                } else { ?>
                                                    -
                                                <?php } ?></td>
                                            <td><?php if ($d['tanggal_revisi'] != 0000 - 00 - 00) {
                                                    $tanggal_surat = date("d-m-Y", strtotime($d['tanggal_revisi']));
                                                    $hari_surat = date("D", strtotime($d['tanggal_revisi']));
                                                    if ($hari_surat == 'Mon') {
                                                        $hari_surat = 'Senin';
                                                        $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                        echo $tanggal_surat;
                                                    } else if ($hari_surat == 'Tue') {
                                                        $hari_surat = 'Selasa';
                                                        $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                        echo $tanggal_surat;
                                                    } else if ($hari_surat == 'Wed') {
                                                        $hari_surat = 'Rabu';
                                                        $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                        echo $tanggal_surat;
                                                    } else if ($hari_surat == 'Thu') {
                                                        $hari_surat = 'Kamis';
                                                        $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                        echo $tanggal_surat;
                                                    } else if ($hari_surat == 'Fri') {
                                                        $hari_surat = 'Jumat';
                                                        $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                        echo $tanggal_surat;
                                                    } else if ($hari_surat == 'Sat') {
                                                        $hari_surat = 'Sabtu';
                                                        $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                        echo $tanggal_surat;
                                                    } else if ($hari_surat == 'Sun') {
                                                        $hari_surat = 'Minggu';
                                                        $tanggal_surat = $hari_surat . ", " . $tanggal_surat;
                                                        echo $tanggal_surat;
                                                    }
                                                } else { ?>
                                                    -
                                                <?php } ?></td>
                                            <td><a href="<?= base_url('/nomor/detail_revisi/' . $d['no_surat']); ?>" class="btn btn-primary">Detail</a></td>
                                            <td><a href="<?= base_url('/nomor/' . $d['no_surat']); ?>" class="btn btn-primary">Edit</a></td>
                                            <td>
                                                <form action="<?= base_url('/nomor/hapus/' . $d['no_surat']); ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Anda Yakin?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                <?php }
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?= $this->endSection(); ?>