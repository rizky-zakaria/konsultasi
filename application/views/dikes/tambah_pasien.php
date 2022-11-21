<div class="row">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Input Data Pasien</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url($controller . '/insertPasien') ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" name="nik" class="form-control" id="nik" placeholder="NIK" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" placeholder="Tanggal Lahir" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select class="custom-select" id="jk" name="jk" required>
                                    <option selected disabled>Pilih</option>
                                    <option value="pria">Pria</option>
                                    <option value="wanita">Wanita</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" placeholder="Pekerjaan" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status Kawin</label>
                                <select class="custom-select" id="status" name="status_kawin" required>
                                    <option selected disabled>Pilih</option>
                                    <option value="pria">Menikah</option>
                                    <option value="wanita">Belum Menikah</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kontak">Kontak</label>
                                <input type="text" name="kontak" class="form-control" id="kontak" placeholder="0842XXXXXX" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="penyebab">Penyebab</label>
                                <input type="text" name="penyebab" class="form-control" id="penyebab" placeholder="Penyebab" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="desa">Kelurahan / Desa</label>
                                <input type="text" name="desa" class="form-control" id="desa" placeholder="Kelurahan / Desa" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan</label>
                                <input type="text" name="kecamatan" class="form-control" id="kecamatan" placeholder="Kecamatan" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kabupaten">Kabupaten / Kota</label>
                                <input type="text" name="kabupaten" class="form-control" id="kabupaten" placeholder="Kabupaten / Kota" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="provinsi">Provinsi</label>
                                <input type="text" name="provinsi" class="form-control" id="provinsi" placeholder="Provinsi" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="provinsi">Alamat Detail</label>
                                <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="form-control btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>