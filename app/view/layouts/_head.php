<!DOCTYPE html>
<html>

<head>
    <title>Sistem Pakar MOORA</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="<?= base_url('') ?>favicon.ico">

    <!-- plugin css -->
    <link href="<?= base_url('') ?>assets/fonts/feather-font/css/iconfont.css" rel="stylesheet" />
    <link href="<?= base_url('') ?>assets/plugins/flag-icon-css/css/flag-icon.min.css" rel="stylesheet" />
    <link href="<?= base_url('') ?>assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" />
    <!-- end plugin css -->

    <!-- Plugin css import here -->
    <link rel="stylesheet" href="<?= base_url('') ?>assets/plugins/datatables-net/dataTables.bootstrap4.css">
    <!-- common css -->
    <link href="<?= base_url('') ?>assets/css/app.css" rel="stylesheet" />
    <!-- end common css -->
    <script src="<?= base_url('') ?>assets/js/app.js"></script>
    <link href="<?= asset('assets/plugins/sweetalert2/sweetalert2.min.css') ?>" rel="stylesheet" />

</head>

<body data-base-url="<?= base_url('/') ?>">

    <script src="<?= base_url('') ?>assets/js/spinner.js"></script>

    <div class="main-wrapper" id="app">
        <nav class="sidebar">
            <div class="sidebar-header">
                <a href="#" class="sidebar-brand">
                    SISPAK
                </a>
                <div class="sidebar-toggler not-active">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <?php
            $uri = get_uri();
            ?>
            <div class="sidebar-body">
                <ul class="nav">
                    <?php if (session_get('type') == 1) : ?>
                        <li class="nav-item <?= $uri[2] == 'Dashboard' ? 'active' : '' ?>">
                            <a href="<?= base_url('Dashboard') ?>" class="nav-link">
                                <i class="link-icon" data-feather="box"></i>
                                <span class="link-title">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-item <?= $uri[2] == 'Pengguna' ? 'active' : '' ?>">
                            <a href="<?= base_url('Pengguna') ?>" class="nav-link">
                                <i class="link-icon" data-feather="user"></i>
                                <span class="link-title">Kelola Data Pengguna</span>
                            </a>
                        </li>
                        <li class="nav-item <?= $uri[2] == 'Penyakit' || $uri[2] == 'penyakit' ? 'active' : '' ?>">
                            <a href="<?= base_url('Penyakit') ?>" class="nav-link">
                                <i class="link-icon" data-feather="aperture"></i>
                                <span class="link-title">Kelola Data Penyakit</span>
                            </a>
                        </li>
                        <li class="nav-item <?= $uri[2] == 'Gejala' || $uri[2] == 'gejala' ? 'active' : '' ?>">
                            <a href="<?= base_url('Gejala') ?>" class="nav-link">
                                <i class="link-icon" data-feather="crosshair"></i>
                                <span class="link-title">Kelola Data Gejala</span>
                            </a>
                        </li>
                        <li class="nav-item <?= $uri[2] == 'Konsultasi' || $uri[2] == 'konsultasi' ? 'active' : '' ?>">
                            <a href="<?= base_url('Konsultasi') ?>" class="nav-link">
                                <i class="link-icon" data-feather="wind"></i>
                                <span class="link-title">Konsultasi</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" data-toggle="collapse" href="#laporan" role="button" aria-expanded="false" aria-controls="laporan">
                                <i class="link-icon" data-feather="book"></i>
                                <span class="link-title">Laporan</span>
                                <i class="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div class="collapse " id="laporan">
                                <ul class="nav sub-menu">
                                    <li class="nav-item">
                                        <a href="<?= base_url('Laporan/tahunan') ?>" class="nav-link ">Laporan Tahunan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('Laporan/bulanan') ?>" class="nav-link ">Laporan Bulanan</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    <?php endif; ?>

                    <?php if (session_get('type') == 2) : ?>
                        <li class="nav-item <?= $uri[2] == 'Dashboard' ? 'active' : '' ?>">
                            <a href="<?= base_url('Dashboard') ?>" class="nav-link">
                                <i class="link-icon" data-feather="box"></i>
                                <span class="link-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" data-toggle="collapse" href="#validasi" role="button" aria-expanded="false" aria-controls="validasi">
                                <i class="link-icon" data-feather="book"></i>
                                <span class="link-title">Validasi</span>
                                <i class="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div class="collapse " id="validasi">
                                <ul class="nav sub-menu">
                                    <li class="nav-item">
                                        <a href="<?= base_url('Gejala/lihatGejala') ?>" class="nav-link ">Data Gejala</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('Penyakit/lihatPenyakit') ?>" class="nav-link ">Data Penyakit</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item <?= $uri[2] == 'Pengetahuan' ? 'active' : '' ?>">
                            <a href="<?= base_url('Pengetahuan') ?>" class="nav-link">
                                <i class="link-icon" data-feather="archive"></i>
                                <span class="link-title">Pengetahuan</span>
                            </a>
                        </li>
                        <li class="nav-item <?= $uri[2] == 'Konsultasi' || $uri[2] == 'konsultasi' ? 'active' : '' ?>">
                            <a href="<?= base_url('Konsultasi') ?>" class="nav-link">
                                <i class="link-icon" data-feather="wind"></i>
                                <span class="link-title">Konsultasi</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" data-toggle="collapse" href="#laporan" role="button" aria-expanded="false" aria-controls="laporan">
                                <i class="link-icon" data-feather="book"></i>
                                <span class="link-title">Laporan</span>
                                <i class="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div class="collapse " id="laporan">
                                <ul class="nav sub-menu">
                                    <li class="nav-item">
                                        <a href="<?= base_url('Laporan/tahunan') ?>" class="nav-link ">Laporan Tahunan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('Laporan/bulanan') ?>" class="nav-link ">Laporan Bulanan</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    <?php endif; ?>

                    <?php if (session_get('type') == 3) : ?>
                        <li class="nav-item <?= $uri[2] == 'Diagnosis' || $uri[2] == 'Diagnosis' ? 'active' : '' ?>">
                            <a href="<?= base_url('Diagnosis') ?>" class="nav-link">
                                <i class="link-icon" data-feather="grid"></i>
                                <span class="link-title">Diagnosa</span>
                            </a>
                        </li>
                        <li class="nav-item <?= $uri[2] == 'Konsultasi' || $uri[2] == 'konsultasi' ? 'active' : '' ?>">
                            <a href="<?= base_url('Konsultasi') ?>" class="nav-link">
                                <i class="link-icon" data-feather="wind"></i>
                                <span class="link-title">Konsultasi</span>
                            </a>
                        </li>
                    <?php endif; ?>


                    <li class="nav-item">
                        <a href="<?= base_url('Auth/logout') ?>" class="nav-link">
                            <i class="link-icon" data-feather="log-out"></i>
                            <span class="link-title">Logout</span>
                        </a>
                    </li>

                </ul>
            </div>
        </nav>

        <div class="page-wrapper">
            <nav class="navbar">
                <a href="#" class="sidebar-toggler">
                    <i data-feather="menu"></i>
                </a>
                <div class="navbar-content">
                    <div class="d-flex my-2">
                        <a href="<?= base_url('dashboard/bantuan') ?>" class="btn btn-info text-white p-3 mr-2">Bantuan</a>
                        <a href="<?= base_url('dashboard/tentang') ?>" class="btn btn-primary text-white p-3">Tentang</a>
                    </div>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown nav-profile">
                            <h5><?= session_get('nama') ?></h5>
                        </li>
                    </ul>
                </div>
            </nav>