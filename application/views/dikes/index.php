<div class="row">
    <div class="container">
        <div class="card">
            <div class="card-header">
                Data Rumah Sakit
                <?php
                if ($role == "dokter") {
                ?>
                    <a href="<?= base_url($controller . '/formTambahFaskes'); ?>" class="btn btn-primary float-right">Tambah</a>
                <?php
                } else {
                ?>
                    <a href="<?= base_url($controller . '/formTambahPasien'); ?>" class="btn btn-primary float-right">Tambah</a>
                <?php
                }
                ?>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <?php
                            if ($role != "pasien") {
                            ?>
                                <th>Password</th>
                            <?php
                            } else {
                            ?>
                                <th>Nomor Induk Kependudukan</th>
                            <?php
                            }
                            ?>
                            <th>Token</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $data) {

                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['username'] ?></td>
                                <?php
                                if ($role != "pasien") {
                                ?>
                                    <td><?= $data['password'] ?></td>
                                <?php
                                } else {
                                ?>
                                    <td><?= $data['nik'] ?></td>
                                <?php
                                }
                                ?>
                                <td><?= $data['token'] ?></td>
                                <td>
                                    <a href="<?= base_url($controller . "/formEdit/" . $data['id']); ?>" class="btn btn-success">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <?php
                                    if ($role == "pasien") {
                                    ?>
                                        <a href="<?= base_url($controller . "/detail/" . $data['id']); ?>" class="btn btn-warning">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <!-- modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Yakin Ingin Menghapus?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url() . $controller; ?>/hapus/<?= $data['id']; ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>