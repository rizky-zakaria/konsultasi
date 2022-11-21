<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $judul; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>vendor/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url(); ?>vendor/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>vendor/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>vendor/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>vendor/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar bg-primary text-light elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url('DashboardController'); ?>" class="brand-link">
                <img src="<?= base_url(); ?>assets/img/hiv.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
                <span class="text-light">Consult-web</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?= base_url('HomeController'); ?>" class="nav-link text-light">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Home
                                </p>
                            </a>
                        </li>
                        <?php
                        if ($this->session->userdata('role') == 1) :
                        ?>
                            <li class="nav-header">Account</li>
                            <li class="nav-item">
                                <a href="<?= base_url(); ?>RootController" class="nav-link text-light">
                                    <i class="nav-icon fas fa-users-cog"></i>
                                    <p>
                                        Manajemen Akun
                                    </p>
                                </a>
                            </li>
                        <?php
                        endif;

                        if ($this->session->userdata('role') == 2) :
                        ?>
                            <li class="nav-header">Manajemen Akun</li>
                            <li class="nav-item">
                                <a href="<?= base_url(); ?>DikesController/faskes" class="nav-link text-light">
                                    <i class="nav-icon fas fa-user-md"></i>
                                    <p>
                                        Fasilitas Kesehatan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url(); ?>DikesController/pasien" class="nav-link text-light">
                                    <i class="nav-icon fas fa-hospital"></i>
                                    <p>
                                        Pasien
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url(); ?>DikesController/manajemen" class="nav-link text-light">
                                    <i class="nav-icon fas fa-users-cog"></i>
                                    <p>
                                        Manajemen
                                    </p>
                                </a>
                            </li>
                            <li class="nav-header">Laporan</li>
                            <li class="nav-item">
                                <a href="<?= base_url(); ?>DikesController/obat" class="nav-link text-light">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>
                                        Pra E dan ART
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url(); ?>DikesController/obat" class="nav-link text-light">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>
                                        Pengguna Aktif
                                    </p>
                                </a>
                            </li>
                        <?php
                        endif;

                        if ($this->session->userdata('role') == 3) :
                        ?>
                            <li class="nav-header">Konsultasi</li>
                            <li class="nav-item">
                                <a href="<?= base_url(); ?>FaskesController/konsultasi" class="nav-link text-light">
                                    <i class="nav-icon fas fa-comment"></i>
                                    <p>
                                        Ruang Konsultasi
                                    </p>
                                </a>
                            </li>
                            <li class="nav-header">Fasilitas</li>
                            <li class="nav-item">
                                <a href="<?= base_url(); ?>DikesController/obat" class="nav-link text-light">
                                    <i class="nav-icon fas fa-file-medical"></i>
                                    <p>
                                        Obat
                                    </p>
                                </a>
                            </li>
                            <li class="nav-header">Laporan</li>
                            <li class="nav-item">
                                <a href="<?= base_url(); ?>DikesController/obat" class="nav-link text-light">
                                    <i class="nav-icon fas fa-file-medical"></i>
                                    <p>
                                        Pra E dan ART
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url(); ?>FaskesController/logmasukpasien" class="nav-link text-light">
                                    <i class="nav-icon fas fa-map-marker"></i>
                                    <p>
                                        Log Masuk Pasien
                                    </p>
                                </a>
                            </li>
                        <?php
                        endif;
                        ?>
                        <li class="nav-header">Other</li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>HomeController/logout" class="nav-link  bg-danger">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><?= $judul; ?></h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">