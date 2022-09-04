<div class="row">
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <span><b>Daftar Pasien</b></span>
                        </div>
                        <ul class="list-group list-group-flush">
                            <?php
                            foreach ($data as $dt) :
                            ?>
                                <li class="list-group-item">
                                    <span><?= $dt['nama'] ?></span>
                                    <button class="badge badge-success float-right" onclick="viewChat(<?= $dt['id_pengirim'] ?>)">Chat now!</button>
                                </li>
                            <?php
                            endforeach;
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card" style="height: 26em">
                        <div class="card-header bg-primary" id="chat-name">

                        </div>
                        <div class="card-body" id="card-body" style="overflow: scroll">

                        </div>
                        <div class="form"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function viewChat(id) {
            $("#not").hide();
            $("#isi").remove();
            $("#form-caht").remove();
            // $(".form").hide();
            var cek = $('#card-body').find('#kirim');
            if (cek) {
                $('#kirim').remove();
                $('#isi').remove();
                // $(".form").hide();
            }

            getNama(id);
            var element = $('#chat').find("#isi");
            if (element == "") {
                $("#not").show();
                $("#isi").remove();
                // $(".form").hide();
            } else {
                $("#isi").remove();
                $("#not").hide();
                fetchData(id);
                showForm(id);
            }
            var nama = $("#chat-name").find("#personal");
            if (nama != "") {
                $("#personal").remove();
                getNama(id);
            }
        }

        function showForm(id) {
            $(".form").append(`
                        <form id="form-chat" class="form-chat" method="post" action="<?= base_url('DokterController/post_chat'); ?>">
                            <div class="row">
                                <div class="col-md-10">
                                    <input type="hidden" class="id" name="id" value="` + id + `" />
                                    <textarea name="chat" id="chat" class="ml-3 mb-2 form-control"></textarea>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-success ml-3" id="kirim">Kirim</button>
                                </div>
                            </div>
                        </form>
            `);
        }

        function fetchData(id) {
            $.ajax({
                type: "GET",
                url: "<?= base_url('api/DokterController/chatbyid?id=') ?>" + id,
                dataType: "json",
                success: function(response) {
                    $.each(response.data, function(key, item) {
                        if (item.pengirim == "pasien") {
                            $("#card-body").append(`
                                <div class='card bg-success' id='isi' style='padding: 0.5em; width: 90%'>` + item.pesan + `</div>
                            `);
                        } else {
                            $("#card-body").append(
                                `
                                <div class='card bg-primary float-right' id='isi' style='padding: 0.5em; width: 90%'>` +
                                item.pesan + `</div>
                            `);
                        }
                    });
                }
            });
        }

        function getNama(id) {
            $.ajax({
                type: "GET",
                url: "<?= base_url('api/DokterController/nama?id='); ?>" + id,
                // console.log(url);
                dataType: "json",
                success: function(response) {
                    $("#personal").remove();
                    $("#chat-name").append(`
                    <b id="personal">` + response.nama + `</b>
                `);
                }
            });
        }
    </script>