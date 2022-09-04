<div class="row">
    <div class="container">
        <div class="card">
            <div class="card-header">
                Data Rumah Sakit
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Identitas</th>
                            <th>Nama</th>
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
                                <td><?= $data['nama'] ?></td>
                                <td>
                                    <a href="<?= base_url('DokterController/detaillaporan/') . $data['id']; ?>" class="badge-primary btn">Detail</a>
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