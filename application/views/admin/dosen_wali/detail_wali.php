<div class="text-center" id="loader">
    <div class="loading-layar">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<div class="content-inner pb-0 container-fluid" id="content-utama" style="display: none">
    <div class="card">
        <div class="card-header d-flex justify-content-between flex-wrap align-items-center">
            <div class="header-title">
                <h4 class="card-title mb-0" id="nama_dosen"></h4>
                <span id="nidn-dosen"></span>
            </div>
            <div class="d-flex align-items-center gap-3">
                <a href="#/data_wali" class="text-center btn btn-primary btn-sm">
                    <i class="bi bi-list-task"></i>
                    Daftar Wali
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th width="10">No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
                        </tr>
                    </thead>
                    <tbody id="tmp-detail-wali"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        var token = "<?= $token ?>";

        $.ajax({
            type: "GET",
            url: "<?= base_url('core/info_dosen') ?>",
            dataType: "json",
            data: {
                token: token
            },
            success: function(data) {
                $("#nama_dosen").html(data.nama_dosen);
                $("#nidn-dosen").html(data.nidn);
            }
        });

        $.ajax({
            type: "GET",
            url: "<?= base_url('core/data_detail_wali') ?>",
            dataType: "html",
            data: {
                token: token
            },
            success: function(data) {
                console.log(data);
                $("#tmp-detail-wali").html(data);
                $("#loader").fadeOut(1000, function() {
                    $("#loader").remove();
                    $("#content-utama").fadeIn(800);
                });
            }
        });

    });
</script>