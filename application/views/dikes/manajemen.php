<div class="row">
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary">
                <h5>Form Manajemen Pelayanan</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url($controller . '/insertManajemen'); ?>" method="post">
                    <div class="form-group">
                        <label for="username">Pasien</label>
                        <select name="id_pasien" id="" class="form-control" required>
                            <option value="">Pilih Pasien</option>
                            <?php
                            foreach ($pasien as $key => $value) {
                            ?>
                                <option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="username">Dokter</label>
                        <select name="id_dokter" id="" class="form-control" required>
                            <option value="">Pilih Dokter</option>
                            <?php
                            foreach ($dokter as $key => $value) {
                            ?>
                                <option value="<?= $value['id'] ?>"><?= $value['username'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <button type=" submit" class="form-control btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>