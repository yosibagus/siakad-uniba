<div class="content-inner pb-0 container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between flex-wrap align-items-center">
            <div class="header-title">
                <h4 class="card-title mb-0">Kelas Perkuliahan</h4>
                <span>List matakuliah pengampuh</span>
            </div>
            <div class="d-flex align-items-center gap-3">
                <a href="#kelas_perkuliahan_tambah" class="btn btn-primary">
                    <svg width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>Buka Kelas Perkuliahan
                </a>
            </div>
        </div>
        <hr>
        <div class="text-center" id="loader">
            <div class="loading-layar">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="card-body pt-1" id="content-utama" style="display: none;">
            <div class="table-responsive">
                <table id="tablePerkuliahanDosen" class="display table table-sm text-black w-100">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th width="10">No</th>
                            <th>Aksi</th>
                            <th>Semester</th>
                            <th>Kode MK</th>
                            <th>Mata Kuliah</th>
                            <th>Nama Kelas</th>
                            <th>Peserta</th>
                            <th>Dinilai</th>
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
            dataType: "json",
            success: function(data) {
                $("#loader").fadeOut(1000, function() {
                    $("#loader").remove();
                    $("#content-utama").fadeIn(800);

                });
                $("#tablePerkuliahanDosen").dataTable({
                    data: data,
                    columns: [{
                            'data': 'no'
                        },
                        {
                            'data': 'aksi'
                        },
                        {
                            'data': 'semester_perkuliahan'
                        },
                        {
                            'data': 'kode_mata_kuliah'
                        },
                        {
                            'data': 'nama_mata_kuliah'
                        },
                        {
                            'data': 'nama_kelas'
                        },
                        {
                            'data': 'peserta'
                        },
                        {
                            'data': 'dinilai'
                        }
                    ]
                });
            }
        });

    });
</script>