<div class="content-inner pb-0 container-fluid">
    <div class="card" style="box-shadow: 0 1px 5px rgb(0 0 0 / 20%), 0 2px 2px rgb(0 0 0 / 14%), 0 3px 1px -2px rgb(0 0 0 / 12%);
    border-radius: 4px;
    vertical-align: top;
    background: #fff; color:#3c3c3c;">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table width="100%">
                        <tr>
                            <th>Program Studi</th>
                            <th>:</th>
                            <th><?= $detail['nama_program_studi'] ?></th>
                        </tr>
                        <tr>
                            <th>Semester</th>
                            <th>:</th>
                            <th><?= $detail['semester_perkuliahan'] ?></th>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table width="100%">
                        <tr>
                            <th>Mata Kuliah</th>
                            <th>:</th>
                            <th><?= $detail['nama_mata_kuliah'] ?></th>
                        </tr>
                        <tr>
                            <th>Nama Kelas</th>
                            <th>:</th>
                            <th><?= $detail['nama_kelas'] ?></th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex bd-highlight mb-2">
        <div class="pt-2 flex-grow-1 bd-highlight">
            <h4 class="mb-0">Input Nilai</h4>
        </div>
        <div class="p-2 bd-highlight">
            <a href="" class="btn btn-warning btn-sm wi-50 text-white"><i class="bi bi-pencil-square"></i> Ubah</a>
        </div>
        <div class="p-2 bd-highlight">
            <a href="#nilai_perkuliahan" class="btn btn-success btn-sm wi-50 text-white"><i class="bi bi-list-ul"></i> Daftar</a>
        </div>
    </div>

    <div class="card" style="box-shadow: 0 1px 5px rgb(0 0 0 / 20%), 0 2px 2px rgb(0 0 0 / 14%), 0 3px 1px -2px rgb(0 0 0 / 12%);
    border-radius: 4px;
    vertical-align: top;
    background: #fff; color:#3c3c3c;">
        <div class="card-body px-0">
            <div class="table-responsive">
                <table class="table table-bordered" id="table-nilai-mhs-krs">
                    <thead>
                        <tr class="q-tr">
                            <th class="align-middle" width="10" rowspan="2" style="text-align: center;"><strong>No</strong></th>
                            <th class="align-middle" rowspan="2" style="text-align: center;"><strong>Nim</strong></th>
                            <th class="align-middle" rowspan="2" style="text-align: center;"><strong>Nama Mahasiswa</strong></th>
                            <th class="align-middle" rowspan="2" style="text-align: center;"><strong>Jurusan</strong></th>
                            <th class="align-middle" rowspan="2" style="text-align: center;"><strong>Angkatan</strong></th>
                            <th colspan="2" style="text-align: center;"><strong>Nilai</strong></th>
                        </tr>
                        <tr class="q-tr">
                            <th style="text-align: center;"><strong>Angka</strong></th>
                            <th style="text-align: center;"><strong>Huruf</strong></th>
                        </tr>
                    </thead>
                    <tbody id="tmp-nilai-perkuliahan"></tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {

        tampil();

        function tampil() {
            $.ajax({
                url: '<?= base_url("core/data_nilai/") . $detail['id_perkuliahan_kelas'] ?>',
                async: false,
                dataType: 'html',
                success: function(data) {
                    $("#tmp-nilai-perkuliahan").html(data);
                }
            })
        }
    })
</script>