<div class="row">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Form Tambah Data</h3>
            </div>
            <div class="card-body">
                <?php
                if ($role == "dokter") {
                ?>
                    <form action="<?= base_url('RumahsakitController/insertDataDokter'); ?>" method="post">
                    <?php
                } else {
                    ?>
                        <form action="<?= base_url('RumahsakitController/insertDataPerawat'); ?>" method="post">
                        <?php
                    }
                        ?>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" name="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <button type="submit" class="form-control btn-success">Simpan</button>
                        </form>
            </div>
        </div>
    </div>