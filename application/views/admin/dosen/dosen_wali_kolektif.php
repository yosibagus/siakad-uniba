<div class="content-inner pb-0 container-fluid">
    <form id="form-generate-wali" method="post" action="" class="card">
        <div class="card-header d-flex justify-content-between flex-wrap align-items-center">
            <div class="header-title">
                <h4 class="card-title mb-0" id="nama_dosen"></h4>
                <div>
                    <span id="semester"></span>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3">
                <button type="submit" class="btn btn-info btn-sm wi-50 text-white"><i class="bi bi-check-lg"></i> Simpan</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive" id="form-select">
                <table class="table table-hover table-bordered table-sm">
                    <tr>
                        <td width="30%">Program Studi</td>
                        <td>
                            <select name="prodi" id="prodi" class="form-control" style="width: 100%;">
                                <option value=""></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Angkatan</td>
                        <td>
                            <select name="angkatan" id="angkatan" class="form-control" style="width: 100%;">
                                <option value=""></option>
                            </select>
                            <input type="text" id="token" name="token" style="display: none;">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-3 text-center" id="loading-data" style="display: none;">
                    <button class="" type="button" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <small>Sedang Mengambil Data...</small>
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table id="" class="display expandable-table table table-striped table-sm dataTable no-footer">
                    <thead>
                        <tr>
                            <th width="10"><input type="checkbox" id="cekall" style="padding:8px;" class="form-check-input"></th>
                            <th width="10">No.</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Angkatan</th>
                        </tr>
                    </thead>
                    <tbody id="tmp-mhs-wali"></tbody>
                </table>
            </div>
        </div>
    </form>
</div>

<script>
    $("#cekall").click(function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    $(document).ready(function() {

        var token = "<?= $_GET['token'] ?>"

        $.ajax({
            type: "GET",
            url: "<?= base_url('core/getDetailWaliKolektif') ?>",
            data: {
                token: token
            },
            dataType: "json",
            success: function(data) {
                // console.log(data);
                $("#nama_dosen").html(data.nama_dosen)
                $("#semester").html(data.semester_krs)
                $("#token").val(token)
            }
        })

        $('#angkatan').select2({
            placeholder: 'Pilih Angkatan',
            allowClear: true
        });
        $('#prodi').select2({
            placeholder: 'Pilih Prodi',
            allowClear: true
        });

        var app = {
            show: function() {
                $.ajax({
                    url: "<?= base_url('core/select_angkatan') ?>",
                    method: "GET",
                    success: function(data) {
                        $("#angkatan").html(data)
                    }
                })
            },
            tampil: function() {
                $.ajax({
                    url: "<?= base_url('core/select_prodi') ?>",
                    method: "GET",
                    success: function(data) {
                        $("#prodi").html(data)
                    }
                })
            }
        }
        app.show();
        app.tampil();

        $("#form-select").on('change', '#angkatan, #prodi', function() {
            var angkatan = $("#angkatan").val();
            var prodi = $("#prodi").val();
            $("#loading-data").fadeIn(500);
            $.ajax({
                url: "<?= base_url('core/getMahasiswaWaliKolektif') ?>",
                method: "GET",
                data: {
                    angkatan: angkatan,
                    prodi: prodi
                },
                success: function(data) {
                    $("#loading-data").fadeOut(500);
                    $("#tmp-mhs-wali").html(data);
                }
            })
        });

        $("#form-generate-wali").on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "<?= base_url('core/input_generate_wali') ?>",
                data: $(this).serialize(),
                success: function(data) {
                    // console.log(data);
                    $.toast({
                        heading: 'Success',
                        text: 'Mahasiswa berhasil ditambahkan',
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'top-right'
                    });

                    window.location.href = '<?= base_url('#/data_wali') ?>';
                }
            });
        })

    })
</script>