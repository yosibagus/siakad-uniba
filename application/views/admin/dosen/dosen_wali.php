<div class="content-inner pb-0 container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between flex-wrap align-items-center">
            <div class="header-title">
                <h4 class="card-title mb-0">Daftar Wali</h4>
            </div>
            <div class="d-flex align-items-center gap-3">
                <a href="#/dosen" class="text-center btn btn-primary d-flex gap-2">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 5C2 4.44772 2.44772 4 3 4H8.66667H21C21.5523 4 22 4.44772 22 5V8H15.3333H8.66667H2V5Z" stroke="currentColor" />
                        <path d="M6 8H2V11M6 8V20M6 8H14M6 20H3C2.44772 20 2 19.5523 2 19V11M6 20H14M14 8H22V11M14 8V20M14 20H21C21.5523 20 22 19.5523 22 19V11M2 11H22M2 14H22M2 17H22M10 8V20M18 8V20" stroke="currentColor" />
                    </svg>
                    Daftar Dosen
                </a>
            </div>
        </div>
        <div class="card-body">
            <div id="peringatan"></div>
            <div class="table-responsive" id="form-dosen-select">
                <table class="table table-bordered table-hover">
                    <tr>
                        <td width="30%">NIDN/Nama Dosen</td>
                        <td>
                            <input type="text" require class="form-control" placeholder="Ketikkan NIPD/Nama dosen disini" id="dosen" name="dosen">
                            <input type="text" name="id_dosen" hidden id="id_dosen">
                        </td>
                    </tr>
                    <tr>
                        <td width="30%">Semester KRS</td>
                        <td>
                            <select name="semester_krs" id="semester_krs" class="form-control" style="width: 100%;">
                                <option value=""></option>
                            </select>
                        </td>
                    </tr>
                </table>
                <button class="btn btn-info" onclick="tampilkan()"><i class="bi bi-search"></i> Tampilkan</button>
                <button class="btn btn-warning" onclick="reset()"><i class="bi bi-arrow-clockwise"></i> Reset</button>
            </div>
        </div>
    </div>
    <div class="card" id="card-wali">
        <div class="card-header d-flex justify-content-between flex-wrap align-items-center">
            <div class="header-title">
                <h4 class="card-title mb-0" id="nama_dosen">Daftar Wali</h4>
            </div>
        </div>
        <div class="card-body">

            <div class="row justify-content-center mb-4">
                <div class="col-md-7">
                    <input type="text" class="form-control" name="nim_mahasiswa" id="nim_mahasiswa" placeholder="Ketikkan NIM/Nama mahasiswa disini">
                    <button class="btn btn-info btn-sm wi-50 text-white mt-2"><i class="bi bi-plus"></i> Tambah Mahasiswa</button>
                    <a href="" class="btn btn-info btn-sm wi-50 text-white mt-2"><i class="bi bi-list-check"></i> Set Mahasiswa Kolektif</a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>NIM</td>
                            <td>Nama</td>
                            <td>Prodi</td>
                            <td>Status</td>
                            <td>Angkatan</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody id="tmp-mhs-dosenwali"></tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#semester_krs').select2({
            placeholder: 'Pilih Semester',
            allowClear: true
        });
    });
</script>

<script>
    $(document).ready(function() {
        $("#dosen").autocomplete({
            source: "<?= base_url('core/autofill_dosen?') ?>",
            select: function(event, ui) {
                $('[name="id_dosen"]').val(ui.item.id_dosen);
                // console.log(ui.item.id_dosen);
            }
        });
    });

    $(document).ready(function() {
        $("#nim_mahasiswa").autocomplete({
            source: "<?= base_url('core/autofill_mahasiswa?') ?>",
            select: function(event, ui) {
                // $('[name="nim_mhs"]').val(ui.item.label);
                //$('[name="id_mhs"]').val(ui.item.nim);
                console.log(ui.item.nim);

            }
        })
    })
</script>

<script>
    $(document).ready(function() {
        var app = {
            show: function() {
                $.ajax({
                    url: "<?= base_url('core/krs_semester') ?>",
                    method: "GET",
                    success: function(data) {
                        $("#semester_krs").html(data)
                    }
                })
            }
        }
        app.show();
    })

    function tampilkan() {
        var id_dosen = $("#id_dosen").val();
        var dosen = $("#dosen").val();
        var semester = $("#semester_krs").val();

        if (id_dosen == "" || dosen == "") {
            $("#peringatan").html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal!</strong> Silahkan Pilih Dosen.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>`);
        } else if (semester == "") {
            $("#peringatan").html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal!</strong> Silahkan Pilih Semester.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>`);
        } else {
            $("#card-wali").show(1000);
            $("#nama_dosen").html(dosen + " (" + semester + ")");
            $("#peringatan").html("");
        }
    }

    function reset() {
        $("#id_dosen").val("");
        $("#dosen").val("");
        $("#semester_krs").val("").trigger("change");
        $("#card-wali").hide(1000);
    }
</script>