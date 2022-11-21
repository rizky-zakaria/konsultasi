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
                            <th>Pesan</th>
                            <th>Waktu</th>
                            <th>Titik Lokasi</th>
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
                                <td><?= $data['log'] ?></td>
                                <td><?= $data['tanggal'] . " " . $data['waktu'] ?></td>
                                <td><?= $data['desa'] . ", " . $data['kecamatan'] . ", " . $data['kabupaten'] . ", " . $data['provinsi'] ?></td>
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