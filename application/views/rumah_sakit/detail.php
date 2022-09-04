<div class="row">
    <div class="container">
        <div class="card">
            <div class="card-header">
                Detail Pasien

            </div>
            <div class="card-body">
                <ul class="list-group">
                    <div class="row">
                        <div class="col">
                            <label for="#nama"><b>NAMA :</b></label>
                            <li class="list-group-item" id="nama"><?= $data['nama'] ?></li>
                        </div>
                        <div class="col">
                            <label for="#nama"><b>NIK :</b></label>
                            <li class="list-group-item"><?= $data['nik'] ?></li>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="#nama"><b>UMUR :</b></label>
                            <li class="list-group-item"><?= $data['umur'] . ' Tahun' ?></li>
                        </div>
                        <div class="col">
                            <label for="#nama"><b>TANGGAL LAHIR :</b></label>
                            <li class="list-group-item"><?= $data['tgl_lahir'] ?></li>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="#nama"><b>JENIS KELAMIN :</b></label>
                            <li class="list-group-item"><?= $data['jk'] ?></li>
                        </div>
                        <div class="col">
                            <label for="#nama"><b>STATUS KAWIN :</b></label>
                            <li class="list-group-item"><?= $data['status_kawin'] ?></li>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="#nama"><b>PEKERJAAN :</b></label>
                            <li class="list-group-item"><?= $data['pekerjaan'] ?></li>
                        </div>
                        <div class="col">
                            <label for="#nama"><b>KONTAK :</b></label>
                            <li class="list-group-item"><?= $data['kontak'] ?></li>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="#nama"><b>ALAMAT :</b></label>
                            <li class="list-group-item"><?= $alamat['alamat'] ?></li>
                        </div>
                        <div class="col">
                            <label for="#nama"><b>WILAYAH :</b></label>
                            <li class="list-group-item"><?= $alamat['desa'] ?></li>
                            <li class="list-group-item"><?= $alamat['kecamatan'] ?></li>
                            <li class="list-group-item"><?= $alamat['kabupaten'] ?></li>
                            <li class="list-group-item"><?= $alamat['provinsi'] ?></li>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </div>
    <!-- ./col -->