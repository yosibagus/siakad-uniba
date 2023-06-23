<div class="content-inner pb-0 container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex bd-highlight mb-3">
                <div class="flex-grow-1 bd-highlight">
                    <h5 class="card-title mb-0">Set Status Mahasiswa</h5>
                    <span>Pengaturan status mahasiswa periode aktif.</span>
                </div>
                <!-- <div class="bd-highlight">
                    <a href="#/ubah_setting" class="btn btn-primary btn-sm wi-50 text-white"><i class="bi bi-pencil-square"></i> Set Mahasiswa</a>
                </div> -->
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th width="10">No</th>
                            <th class="text-center">Kode Prodi</th>
                            <th>Program Studi</th>
                            <th>Jumlah Belum Diset</th>
                            <th width="10" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tmp-set"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $("#judul").html("SIAKAD - Set Mahasiswa");

        loadJurusanSet();

        function loadJurusanSet() {
            $.ajax({
                type: "GET",
                url: "<?= base_url('core/jurusan_set_data') ?>",
                dataType: "html",
                success: function(data) {
                    $("#tmp-set").html(data);
                }
            })
        }
    })
</script>