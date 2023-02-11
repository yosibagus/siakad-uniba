<div class="content-inner pb-0 container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between flex-wrap align-items-center">
            <div class="header-title">
                <h4 class="card-title mb-0">Validasi KRS Mahasiswa</h4>
                <span>Digunakan untuk melakukan validasi KRS mahasiswa oleh dosen wali</span>
            </div>
            <div class="d-flex align-items-center gap-3">
            </div>
        </div>
        <div class="text-center" id="loader">
            <div class="loading-layar">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="card-body" id="content-utama" style="display:none;">
            <div class="table-responsive">
                <table class="display table table-bordered table-sm text-black table-hover">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th width="10">No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Jumlah SKS</th>
                            <th>Detail SKS</th>
                            <th>Status Mahasiswa</th>
                            <th>Status Validasi</th>
                        </tr>
                    </thead>
                    <tbody id="tmp-mhs-wali"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        $.ajax({
            type: "POST",
            url: "<?= base_url('core/data_dosen_wali_mhs') ?>",
            dataType: "html",
            success: function(data) {
                $("#tmp-mhs-wali").html(data);
                $("#loader").fadeOut(1000, function() {
                    $("#loader").remove();
                    $("#content-utama").fadeIn(800);
                });
            }
        })

    })
</script>