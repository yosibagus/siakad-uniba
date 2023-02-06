<style>
    .item {
        color: #424242;
        font-weight: bold;
    }

    .th-center {
        vertical-align: middle;
        text-align: center;
    }
</style>
<div class="content-inner pb-0 container-fluid">
    <div class="card" id="form-select">
        <div class="card-body">
            <div class="d-flex bd-highlight mb-3">
                <div class="flex-grow-1 bd-highlight">
                    <h4 class="mb-0">Data KHS</h4>
                </div>
                <div class="bd-highlight">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <select name="semester" id="semester" class="form-control"></select>
                    </div>
                </div>
            </div>

            <table width="90%" style="color:#424242;">
                <tr>
                    <td width="30%" class="item">Nama</td>
                    <td width="10">:</td>
                    <td><span id="tmp-nama"></span></td>
                    <td class="item">NIM</td>
                    <td>:</td>
                    <td><span id="tmp-nim"></span></td>
                </tr>
                <tr>
                    <td class="item">Program Studi</td>
                    <td>:</td>
                    <td><span id="tmp-prodi">s</span></td>
                    <td class="item">Periode</td>
                    <td>:</td>
                    <td><span id="tmp-periode">sadas</span></td>
                </tr>
            </table>

            <div class="table-responsive">
                <table class="display expandable-table table table-bordered table-striped table-sm mt-3">
                    <thead>
                        <tr>
                            <th rowspan="2" width="5%" class="th-center">No</th>
                            <th rowspan="2" class="th-center">Kode MK</th>
                            <th rowspan="2" class="th-center">Nama MK</th>
                            <th rowspan="2" class="th-center">Bobot MK<br>(sks)</th>
                            <th colspan="3" class="th-center">Nilai</th>
                            <th rowspan="2" class="th-center">sks * Indeks</th>
                        </tr>
                        <tr>
                            <th class="th-center">Angka</th>
                            <th class="th-center">Huruf</th>
                            <th class="th-center">Indeks</th>
                        </tr>
                    </thead>
                    <tbody id="tmp-khs"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#semester').select2({
            placeholder: 'Pilih Semester',
            allowClear: true
        });
        var nim = "<?= $_GET['id'] ?>";
        var app = {
            show: function() {
                $.ajax({
                    url: "<?= base_url('core/data_khs_detail') ?>",
                    method: "GET",
                    data: {
                        nim: nim
                    },
                    success: function(data) {
                        $("#semester").html(data);
                    }
                })
            }
        }
        app.show();

        $.ajax({
            type: "GET",
            url: "<?= base_url('core/info_mahasiswa') ?>",
            dataType: 'json',
            data: {
                nim: nim
            },
            success: function(data) {
                // console.log(data);
                $("#tmp-nama").html(data.nama_mahasiswa);
                $("#tmp-nim").html(data.nim);
                $("#tmp-prodi").html(data.nama_program_studi);
                $("#tmp-periode").html(data.id_periode);
            }
        });

        $("#form-select").on('change', '#semester', function() {
            var semester = $("#semester").val();
            $.ajax({
                url: "<?= base_url('core/tampil_khs_mahasiswa') ?>",
                method: "GET",
                data: {
                    semester: semester,
                    nim: nim
                },
                dataType: "html",
                success: function(data) {
                    console.log(data);
                    $("#tmp-khs").html(data);
                }
            })
        })
    })
</script>