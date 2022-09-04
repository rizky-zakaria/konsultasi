<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User Profile</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?= base_url('../vendor/dist/img/') . $this->session->userdata('avatar'); ?>" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center"><?= $profile['nama']; ?></h3>

                        <p class="text-muted text-center"><?= $profile['jabatan']; ?></p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->

                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">

                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">About Me</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <strong><i class="fas fa-number mr-1"></i># NIP</strong>

                                        <p class="text-muted">
                                            <?= $profile['nip']; ?>
                                        </p>

                                        <hr>
                                        <strong><i class="fas fa-briefcase mr-1"></i> Jabatan</strong>

                                        <p class="text-muted">
                                            <?= $profile['jabatan']; ?>
                                        </p>

                                        <hr>

                                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                                        <p class="text-muted"><?= $profile['alamat']; ?></p>

                                        <hr>

                                        <hr>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->