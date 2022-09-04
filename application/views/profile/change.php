<div class="container">
    <form action="<?= base_url($controller . "/changesnow"); ?>" method="post">
        <div class="col-auto">
            <label class="sr-only" for="inlineFormInputGroup">Username</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-lock"></i></div>
                </div>
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Masukan Password Lama" name="old_pass">
            </div>
        </div>
        <div class="col-auto">
            <label class="sr-only" for="inlineFormInputGroup">Username</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-lock"></i></div>
                </div>
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Masukan Password Baru" name="new_pass">
                <input type="text" name="repeat" class="form-control" id="inlineFormInputGroup" placeholder="Ulangi Password Baru">
            </div>
        </div>
        <div class="col-auto">
            <div class="input-group-prepend">
                <input type="submit" value="Change Now" class="btn btn-success" style="width: 100%;">
            </div>
        </div>
    </form>
</div>