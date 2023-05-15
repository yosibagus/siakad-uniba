<div class="content-inner pb-0 container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex bd-highlight mb-3">
                <div class="flex-grow-1 bd-highlight">
                    <h5 class="card-title mb-0">Setting Global</h5>
                    <span>Pengaturan periode semester, penilaian, KRS dan KHS yang sedang dibuka.</span>
                </div>
                <div class="bd-highlight">
                    <a href="#/ubah_setting" class="btn btn-primary btn-sm wi-50 text-white"><i class="bi bi-pencil-square"></i> Ubah Setting</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <th width="10">No</th>
                        <th>Semester Berlaku Aktif</th>
                        <th>Batas SKS KRS</th>
                        <th>Perhitungan Matakuliah Mengulang</th>
                        <th>Status</th>
                    </thead>
                    <tbody id="tmp-setting"></tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="d-flex bd-highlight mb-3">
                <div class="flex-grow-1 bd-highlight">
                    <h5 class="card-title mb-0">Manajemen Fitur</h5>
                    <span>Pengaturan untuk buka dan tutup fitur tertentu. </span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-sm table-hover">
                    <thead>
                        <tr>
                            <th style="vertical-align: middle; text-align:center;" width="20%">Kode Prodi</th>
                            <th style="vertical-align: middle; text-align:center;" width="40%">Nama Prodi</th>
                            <th width="10%" class="text-center">Buka<br>KRS</th>
                            <th width="10%" class="text-center">Buka<br>Penilaian</th>
                            <th width="10%" class="text-center">Buka<br>KHS</th>
                            <th width="10%" class="text-center">Buka<br>Kuisioner </th>
                        </tr>
                    </thead>
                    <tbody id="tmp-fitur">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#form-setting").on('submit', function(e) {
            e.preventDefault();
            var data = $('#form-setting').serialize();
            $.ajax({
                type: 'POST',
                url: "<?= base_url('core/data_setting_tambah') ?>",
                data: data,
                dataType: 'json',
                success: function(data) {
                    $.toast({
                        heading: 'Success',
                        text: 'Data Berhasil Ditambahkan',
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'top-right'
                    })
                }
            });
        });

        loadfitur();

        $.ajax({
            type: "GET",
            url: "<?= base_url('core/data_setting') ?>",
            dataType: "html",
            success: function(data) {
                $("#tmp-setting").html(data);
            }
        });

        function loadfitur() {
            $.ajax({
                type: "GET",
                url: "<?= base_url('core/data_prodi_setting') ?>",
                dataType: "html",
                success: function(data) {
                    $("#tmp-fitur").html(data);
                }
            });
        }

        $(document).on('click', '.buka-krs', function() {
            var id_prodi = $(this).attr('id');
            $.ajax({
                type: "POST",
                url: "<?= base_url('core/update_akses_global') ?>",
                data: {
                    id_prodi: id_prodi
                },
                dataType: "json",
                success: function(data) {
                    var pemberitahuan = '';
                    var icon = '';
                    if (data.pesan == 1) {
                        pemberitahuan = "di Aktifkan";
                        icon = 'success';
                    } else {
                        pemberitahuan = "di Nonaktifkan";
                        icon = 'warning';
                    }

                    $.toast({
                        heading: 'Setting Global',
                        text: 'Fitur Berhasil ' + pemberitahuan,
                        showHideTransition: 'slide',
                        icon: icon,
                        position: 'top-right',
                        loader: false,
                    })
                }
            })
        });

    })
</script>