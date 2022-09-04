<div class="row">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Form Edit Data</h3>
            </div>
            <div class="card-body">
                <form action="<?= base_url('RootController/update'); ?>" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="hidden" name="username" class="form-control" id="username" placeholder="Username" value="<?= $data['id']; ?>">
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?= $data['username']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control" id="password" placeholder="New Password">
                    </div>
                    <button type=" submit" class="form-control btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>