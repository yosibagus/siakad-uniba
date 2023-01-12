<div class="content-inner pb-0 container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between flex-wrap align-items-center">
            <div class="header-title">
                <h4 class="card-title mb-0">Daftar Wali</h4>
            </div>
            <div class="d-flex align-items-center gap-3">
                <a href="#/data_wali" class="text-center btn btn-primary btn-sm">
                    <i class="bi bi-list-task"></i>
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
                <input name="token" id="token" hidden type="text">
                <button class="btn btn-warning" onclick="reset()"><i class="bi bi-arrow-clockwise"></i> Reset</button>
            </div>
        </div>
    </div>
    <div class="card" id="card-wali" style="display: none;">
        <div class="card-header d-flex justify-content-between flex-wrap align-items-center">
            <div class="header-title">
                <h4 class="card-title mb-0" id="nama_dosen">Daftar Wali</h4>
            </div>
        </div>
        <div class="card-body">

            <div class="row justify-content-center mb-4">
                <div class="col-md-7">
                    <input type="text" class="form-control" name="nim_mahasiswa" id="nim_mahasiswa" placeholder="Ketikkan NIM/Nama mahasiswa disini">
                    <input type="text" name="nim" id="nim" hidden>
                    <button class="btn btn-info btn-sm wi-50 text-white mt-2" onclick="tambahMhsDosenWali()"><i class="bi bi-plus"></i> Tambah Mahasiswa</button>
                    <a href="" class="btn btn-info btn-sm wi-50 text-white mt-2"><i class="bi bi-list-check"></i> Set Mahasiswa Kolektif</a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td width="10">No.</td>
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
                $('[name="nim"]').val(ui.item.nim);
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

            // console.log(id_dosen);

            $.ajax({
                type: "POST",
                url: "<?= base_url('core/dosen_wali_tambah') ?>",
                dataType: "json",
                data: {
                    id_dosen: id_dosen,
                    semester: semester
                },
                success: function(data) {
                    // console.log(data);
                    if (data.pesan == 409) {
                        $("#token").val(data.token);
                        $.ajax({
                            type: "POST",
                            url: "<?= base_url('core/data_mahasiswa_wali') ?>",
                            dataType: "html",
                            data: {
                                token: data.token
                            },
                            success: function(data) {
                                $("#tmp-mhs-dosenwali").html(data);
                            }
                        })
                    } else if (data.pesan == 200) {
                        $("#token").val(data.token);
                    }

                }
            })

        }
    }

    function reset() {
        $("#id_dosen").val("");
        $("#token").val("");
        $("#nim").val("");
        $("#dosen").val("");
        $("#semester_krs").val("").trigger("change");
        $("#card-wali").hide(1000);

        // var token = $("#token").val();

        // $.ajax({
        //     type: "POST",
        //     url: "<?= base_url('core/dosen_wali_reset') ?>",
        //     dataType: "json",
        //     data: {
        //         token: token
        //     },
        //     success: function(data) {
        //         console.log(data);
        //     }
        // })
    }

    function tambahMhsDosenWali() {
        var token = $("#token").val();
        var nim = $("#nim").val();

        if ($("#nim_mahasiswa").val() == "" || nim == "") {
            $.toast({
                heading: 'Error',
                text: 'Data Mahasiswa Tidak Boleh Kosong!',
                showHideTransition: 'fade',
                icon: 'error',
                position: 'bottom-right',
                loader: false
            })
        } else {
            $.ajax({
                type: "POST",
                url: "<?= base_url('core/mahasiswa_dosen_wali') ?>",
                dataType: "json",
                data: {
                    token: token,
                    nim: nim
                },
                success: function(data) {
                    // console.log(data);
                    $.toast({
                        heading: 'Success',
                        text: 'Mahasiswa Berhasil Ditambahkan',
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'top-right'
                    });
                    $("#nim").val("");
                    $("#nim_mahasiswa").val("");
                    $("#tmp-mhs-dosenwali").html("");

                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('core/data_mahasiswa_wali') ?>",
                        dataType: "html",
                        data: {
                            token: token
                        },
                        success: function(data) {
                            $("#tmp-mhs-dosenwali").html(data);
                        }
                    })
                }
            })
        }
    }
</script>