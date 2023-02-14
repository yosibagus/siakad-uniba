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
<div class="content-inner pb-0 container-fluid">
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
            <a href="" class="btn btn-warning btn-sm wi-50 text-white"><i class="bi bi-pencil-square"></i> Ubah</a>
        </div>
        <div class="p-2 bd-highlight">
            <?php if ($this->session->userdata('level_operator') == 'dosen') : ?>
                <a href="#/kelas_perkuliahan_order" class="btn btn-success btn-sm wi-50 text-white"><i class="bi bi-list-ul"></i> Daftar</a>
            <?php else : ?>
                <a href="#nilai_perkuliahan" class="btn btn-success btn-sm wi-50 text-white"><i class="bi bi-list-ul"></i> Daftar</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="card" style="box-shadow: 0 1px 5px rgb(0 0 0 / 20%), 0 2px 2px rgb(0 0 0 / 14%), 0 3px 1px -2px rgb(0 0 0 / 12%);
    border-radius: 4px;
    vertical-align: top;
    background: #fff; color:#3c3c3c;">
        <div class="card-body px-0">
            <!-- <input type="text" name="nilai_angkas" id="nilai_angkas">
            <input type="text" name="total" id="total"> -->
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

</div>

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
                    if (value >= 81.00 && value <= 100.00) {
                        $("." + nim).html("A (4.00)");
                    } else if (value >= 71.00 && value <= 80.99) {
                        $("." + nim).html("AB (3.50)");
                    } else if (value >= 66.00 && value <= 70.99) {
                        $("." + nim).html("B (3.00)");
                    } else if (value >= 61.00 && value <= 65.99) {
                        $("." + nim).html("BC (2.50)");
                    } else if (value >= 56.00 && value <= 60.99) {
                        $("." + nim).html("C (2.00)");
                    } else if (value >= 41.00 && value <= 55.99) {
                        $("." + nim).html("D (1.50)");
                    } else if (value >= 0.00 && value <= 40.00) {
                        $("." + nim).html("E (1.00)");
                    } else {
                        $("." + nim).html("");
                    }
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
    })
</script>