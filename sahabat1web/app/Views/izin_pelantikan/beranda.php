<?= $this->extend('layout/template_pelantikan'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <h4 class="card-title text-dark">Keseluruhan Permohonan</h4>
    <div class="card-group">
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium"><?= $jumlah_ok; ?></h2>
                            <!-- <span class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">+18.33%</span> -->
                        </div>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Permohonan Sudah Diproses</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium"><?= $jumlah_wl; ?></h2>
                            <!-- <span class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block">-18.33%</span> -->
                        </div>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Permohonan Dalam Diproses</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <h2 class="text-dark mb-1 font-weight-medium"><?= $jumlah_ny; ?></h2>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Permohonan Belum Diproses</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <h2 class="text-dark mb-1 font-weight-medium"><?= $jumlah_total; ?></h2>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Permohonan</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if ($jenis_akses == 'admin' || $jenis_akses == 'pimpinan') { ?>
        <h4 class="card-title">Permohonan Pelantikan Notaris</h4>
        <div class="card-group notaris">
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium"><?= $jumlah_ok_n; ?></h2>
                                <!-- <span class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">+18.33%</span> -->
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Permohonan Pelantikan Notaris <br> Sudah Diproses</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium"><?= $jumlah_wl_n; ?></h2>
                                <!-- <span class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block">-18.33%</span> -->
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Permohonan Pelantikan Notaris <br> Dalam Diproses</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium"><?= $jumlah_ny_n; ?></h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Permohonan Pelantikan Notaris <br> Belum Diproses</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium"><?= $jumlah_total_n; ?></h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Permohonan <br> Pelantikan Notaris</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <h4 class="card-title">Permohonan Pelantikan Notaris Pengganti</h4>
        <div class="card-group notaris">
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium"><?= $jumlah_ok_np; ?></h2>
                                <!-- <span class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">+18.33%</span> -->
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Permohonan Pelantikan <br> Notaris Pengganti <br> Sudah Diproses</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium"><?= $jumlah_wl_np; ?></h2>
                                <!-- <span class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block">-18.33%</span> -->
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Permohonan Pelantikan <br> Notaris Pengganti <br> Dalam Diproses</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium"><?= $jumlah_ny_np; ?></h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Permohonan Pelantikan <br> Notaris Pengganti <br> Belum Diproses</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium"><?= $jumlah_total_np; ?></h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Permohonan <br> Pelantikan Notaris Pengganti</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <h4 class="card-title">Permohonan Pelantikan PPNS</h4>
        <div class="card-group ppns">
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium"><?= $jumlah_ok_p; ?></h2>
                                <!-- <span class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">+18.33%</span> -->
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Permohonan Pelantikan PPNS Sudah Diproses</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium"><?= $jumlah_wl_p; ?></h2>
                                <!-- <span class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block">-18.33%</span> -->
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Permohonan Pelantikan PPNS Dalam Diproses</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium"><?= $jumlah_ny_p; ?></h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Permohonan Pelantikan PPNS Belum Diproses</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium"><?= $jumlah_total_p; ?></h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Permohonan Pelantikan PPNS</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <h4 class="card-title">Permohonan Pelantikan Kewarganegaraan</h4>
        <div class="card-group kewarganegaraan">
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium"><?= $jumlah_ok_k; ?></h2>
                                <!-- <span class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">+18.33%</span> -->
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Permohonan Pelantikan Kewarganegaraan Sudah Diproses</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium"><?= $jumlah_wl_k; ?></h2>
                                <!-- <span class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block">-18.33%</span> -->
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Permohonan Pelantikan Kewarganegaraan Dalam Diproses</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium"><?= $jumlah_ny_k; ?></h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Permohonan Pelantikan Kewarganegaraan Belum Diproses</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium"><?= $jumlah_total_k; ?></h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Permohonan Pelantikan Kewarganegaraan</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>


<?= $this->endSection(); ?>