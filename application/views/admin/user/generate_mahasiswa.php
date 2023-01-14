<style>
    .note.note-info {
        background-color: #f5f8fd;
        border-color: #8bb4e7;
        color: #010407;
    }

    .note {
        margin: 0 0 20px;
        padding: 15px 30px 15px 15px;
        border-left: 5px solid #ddd;
        border-radius: 0 4px 4px 0;
    }
</style>
<div id="generate-mahasiswa-list" class="content-inner pb-0 container-fluid">
    <form action="" method="POST" id="form-generate-mahasiswa">
        <div class="card">
            <div class="card-header d-flex justify-content-between flex-wrap align-items-center">
                <div class="header-title">
                    <h4 class="card-title mb-0">Generate Username & Password Mahasiswa Aktif</h4>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <button class="text-center btn btn-primary d-flex gap-2" type="submit">
                        <svg width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Generate
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="note note-info">
                    <h5 class="block">Informasi</h5>
                    <ol style="font-size: 13px;">
                        <li>Fitur ini digunakan untuk melakukan generate Username &amp; Password Mahasiswa.</li>
                        <li>Default user yang di-generate untuk username : <strong>NIM</strong> &amp; password : <strong>tanggal lahir dengan format yyyy-mm-dd (tanda '-' dihilangkan)</strong>. Contoh : 1997-02-03 --&gt; 19970203.</li>
                        <li>Daftar mahasiswa yang sudah terdaftar di Forlap &amp; berstatus AKTIF.</li>
                        <li>Untuk melihat daftar user <a href="#/daftar_user">klik disini</a>.</li>
                    </ol>
                </div>
                <div class="table-responsive" id="form-select">
                    <table class="table table-hover table-bordered">
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
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="row justify-content-center my-3">
                    <div class="col-md-3 text-center" id="loading-data" style="display: none;">
                        <button class="btn btn-info" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span class="visually-hidden">Loading...</span> Sedang Mengambil Data ...
                        </button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="10"><input type="checkbox" id="cekall" style="padding:8px;" class="form-check-input"></th>
                                <th width="10">No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Prodi</th>
                                <th>Angkatan</th>
                            </tr>
                        </thead>
                        <tbody id="tmp-user-mhs"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $("#cekall").click(function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>

<script>
    $(document).ready(function() {
        $('#angkatan').select2({
            placeholder: 'Pilih Angkatan',
            allowClear: true
        });
        $('#prodi').select2({
            placeholder: 'Pilih Prodi',
            allowClear: true
        });
    });

    $(document).ready(function() {
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
    })
</script>


<script>
    $(document).ready(function() {
        $("#form-select").on('change', '#angkatan, #prodi', function() {
            var angkatan = $("#angkatan").val();
            var prodi = $("#prodi").val();
            $("#loading-data").fadeIn(500);
            $.ajax({
                url: "<?= base_url('core/tampil_mhs_generate') ?>",
                method: "GET",
                data: {
                    angkatan: angkatan,
                    prodi: prodi
                },
                success: function(data) {
                    $("#loading-data").fadeOut(500);
                    $("#tmp-user-mhs").html(data);
                }
            })
        })
    })
</script>


<script>
    $(document).ready(function() {
        $("#form-generate-mahasiswa").on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "<?= base_url('core/input_generate_mahasiswa') ?>",
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

                    window.location.href = '<?= base_url('#/daftar_user') ?>';
                }
            });
        })
    })
</script>