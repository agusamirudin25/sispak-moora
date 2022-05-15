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
                    Sispak
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
                    <li class="nav-item <?= $uri[2] == 'Dashboard' ? 'active' : '' ?>">
                        <a href="<?= base_url('Dashboard') ?>" class="nav-link">
                            <i class="link-icon" data-feather="box"></i>
                            <span class="link-title">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item <?= $uri[2] == 'Pengguna' ? 'active' : '' ?>">
                        <a href="<?= base_url('Pengguna') ?>" class="nav-link">
                            <i class="link-icon" data-feather="user"></i>
                            <span class="link-title">Data Pengguna</span>
                        </a>
                    </li>
                    <li class="nav-item <?= $uri[2] == 'Penyakit' ? 'active' : '' ?>">
                        <a href="<?= base_url('Penyakit') ?>" class="nav-link">
                            <i class="link-icon" data-feather="user"></i>
                            <span class="link-title">Data Penyakit</span>
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
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown nav-profile">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="https://via.placeholder.com/30x30" alt="profile">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="profileDropdown">
                                <div class="dropdown-header d-flex flex-column align-items-center">
                                    <div class="figure mb-3">
                                        <img src="https://via.placeholder.com/80x80" alt="">
                                    </div>
                                    <div class="info text-center">
                                        <p class="name font-weight-bold mb-0"><?= session_get('nama') ?></p>
                                        <p class="email text-muted mb-3"><?= session_get('emailPengguna') ?></p>
                                    </div>
                                </div>
                                <div class="dropdown-body">
                                    <ul class="profile-nav p-0 pt-3">
                                        <li class="nav-item">
                                            <a href="<?= base_url('Auth/logout') ?>" class="nav-link">
                                                <i data-feather="log-out"></i>
                                                <span>Log Out</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>