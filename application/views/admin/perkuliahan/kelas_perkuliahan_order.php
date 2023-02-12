<div class="content-inner pb-0 container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between flex-wrap align-items-center">
            <div class="header-title">
                <h4 class="card-title mb-0">Kelas Perkuliahan</h4>
                <span>List matakuliah pengampuh</span>
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
        <div class="card-body" id="content-utama" style="display: none;">
            <div class="table-responsive">
                <table id="tablePerkuliahanDosen" class="display table table-bordered table-sm text-black table-hover">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th width="10">No</th>
                            <th>Semester</th>
                            <th>Kode MK</th>
                            <th>Mata Kuliah</th>
                            <th>Nama Kelas</th>
                            <th>Kuota</th>
                            <th>Peserta</th>
                            <th>Ruangan</th>
                            <th>Jadwal</th>
                        </tr>
                    </thead>
                    <tbody id="tmp-kelas-kuliah"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $.ajax({
            type: "GET",
            url: "<?= base_url('core/data_perkuliahan_kelas_dosen') ?>",
            dataType: "html",
            success: function(data) {
                $("#tmp-kelas-kuliah").html(data);
                $("#loader").fadeOut(1000, function() {
                    $("#loader").remove();
                    $("#content-utama").fadeIn(800);
                });
            }
        });

    });
</script>