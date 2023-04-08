<style>
    .white-bg {
        background-color: white;
    }

    input.form-control:focus,
    textarea.form-control:focus {
        border: 2px solid #3a57e8;
        box-sizing: border-box;
    }

    .table thead tr {
        background-color: #ffffff;
    }
</style>
<form method="POST" action="" id="form-nilai" class="content-inner pb-0 container-fluid">
    <input type="text" value="<?= $id_perkuliahan ?>" id="token" name="token" hidden>
    <div class="card" style="box-shadow: 0 1px 5px rgb(0 0 0 / 20%), 0 2px 2px rgb(0 0 0 / 14%), 0 3px 1px -2px rgb(0 0 0 / 12%);
    border-radius: 4px;
    vertical-align: top;
    background: #fff; color:#3c3c3c;">
        <div class="card-body">
            <!-- <div class="row">
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
            </div> -->
        </div>
    </div>

    <div class="d-flex bd-highlight mb-2">
        <div class="pt-2 flex-grow-1 bd-highlight">
            <h4 class="mb-0">Input Nilai</h4>
        </div>
        <div class="p-2 bd-highlight">
            <button type="submit" class="btn btn-info btn-sm wi-50 text-white"><i class="bi bi-pencil-square"></i> Simpan Perubahan</button>
        </div>
        <div class="p-2 bd-highlight">
            <?php if ($this->session->userdata('level_operator') == 'dosen') : ?>
                <a href="#/kelas_perkuliahan_order" class="btn btn-success btn-sm wi-50 text-white"><i class="bi bi-list-ul"></i> Daftar</a>
            <?php else : ?>
                <a href="#nilai_perkuliahan" class="btn btn-success btn-sm wi-50 text-white"><i class="bi bi-list-ul"></i> Daftar</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Keterangan</strong> <br>
        1. Isilah Semua Kolom Nilai Angka<br>
        2. Jika ada nilai ( , ) maka gantilah dengan ( . ) (contoh : 95,5 menjadi 95.5)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="card" style="box-shadow: 0 1px 5px rgb(0 0 0 / 20%), 0 2px 2px rgb(0 0 0 / 14%), 0 3px 1px -2px rgb(0 0 0 / 12%);
    border-radius: 4px;
    vertical-align: top;
    background: #fff; color:#3c3c3c;">
        <div class="card-body px-0">
            <div class="table-responsive">
                <table class="table table-bordered text-black" id="table-nilai-mhs-krs">
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

</form>

<script>
    $(document).ready(function() {

        $(document).ready(function() {

            $("input").keydown(function() {
                // $(this).css("background-color", "yellow");
            });
            $("input").keyup(function() {
                //hanya angka
                var regex = /[^\d.]|\.(?=.*\.)/g;
                var subst = "";
                var str = $(this).val();
                var result = str.replace(regex, subst);
                $(this).val(result);

                var nim = $(this).attr("idmhs");

                //bg
                $("#bg-" + nim).css("background-color", "rgb(52 213 202 / 11%)");

                //validasi nilai
                var value = $(this).val();
                if (value == "") {
                    $("." + nim).html("");
                    $("#bg-" + nim).css("background-color", "white");
                } else {
                    $.ajax({
                        type: "GET",
                        url: "<?= base_url('core/get_nilai') ?>",
                        data: {
                            nim: nim,
                            nilai: value
                        },
                        dataType: "json",
                        success: function(data) {
                            $("." + nim).html(data.nilai_huruf + "(" + data.nilai_indeks + ")");
                        }
                    })
                }
            });
        });

        tampil();

        function tampil() {
            $.ajax({
                url: '<?= base_url("core/data_nilai_ubah/") . $id_perkuliahan ?>',
                async: false,
                dataType: 'html',
                success: function(data) {
                    $("#tmp-nilai-perkuliahan").html(data);
                }
            })
        }
    });
</script>

<script>
    $(document).ready(function() {
        $("#form-nilai").on('submit', function(e) {
            e.preventDefault();
            var data = $("#form-nilai").serialize();
            $.ajax({
                type: "POST",
                url: "<?= base_url('core/data_nilai_input') ?>",
                data: data,
                dataType: "json",
                success: function(data) {
                    if (data.status) {
                        $.toast({
                            heading: 'Success',
                            text: 'Nilai Berhasil Ditambahkan',
                            showHideTransition: 'slide',
                            icon: 'success',
                            position: 'top-right'
                        });
                    } else {
                        $.toast({
                            heading: 'Error',
                            text: 'Nilai Gagal Ditambahkan',
                            showHideTransition: 'slide',
                            icon: 'error',
                            position: 'top-right'
                        });
                    }
                    window.location.href = '<?= base_url('#/detail_nilai_perkuliahan/') ?>' + data.token;
                }
            });
        });
    })
</script>