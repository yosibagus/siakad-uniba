<div class="content-inner pb-0 container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between flex-wrap align-items-center">
            <div class="header-title">
                <h4 class="card-title mb-0" id="nama_dosen"></h4>
                <span id="nidn-dosen"></span>
            </div>
            <div class="d-flex align-items-center gap-3">
                <!-- <a href="#/dosen_wali" class="text-center btn btn-primary btn-sm">
                    <i class="bi bi-gear"></i>
                    Daftar
                </a> -->
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
                        </tr>
                    </thead>
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

    });
</script>