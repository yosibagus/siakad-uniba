<form method="POST" action="" id="form-pembayaran" class="content-inner pb-0 container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex bd-highlight mb-3">
                <div class="flex-grow-1 bd-highlight">
                    <h5 class="card-title mb-0">Pembayaran Uang Kuliah</h5>
                    <span>Klik centang dan simpan untuk mengubah status mahasiswa menjadi lunas.</span>
                </div>
                <div class="bd-highlight">
                    <button class="text-center btn btn-primary d-flex gap-2" type="submit">
                        <svg width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Simpan
                    </button>
                </div>
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
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th width="10">Lunas? <input type="checkbox" id="cekall" style="padding:8px;" class="form-check-input"></th>
                            <th width="10">No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Angkatan</th>
                        </tr>
                    </thead>
                    <tbody id="tmp-user-mhs" style="display: none;"></tbody>
                </table>
            </div>
        </div>
    </div>
</form>

<script>
    $("#cekall").click(function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
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
    });
    $(document).ready(function() {
        $("#form-select").on('change', '#angkatan, #prodi', function() {
            var angkatan = $("#angkatan").val();
            var prodi = $("#prodi").val()
            if (angkatan != "" || prodi != "") {
                $("#loading-data").fadeIn(500);
            }
            $.ajax({
                url: "<?= base_url('core/tampil_mhs_pembayaran') ?>",
                method: "GET",
                data: {
                    angkatan: angkatan,
                    prodi: prodi
                },
                success: function(data) {
                    $("#tmp-user-mhs").fadeIn(1000);
                    $("#loading-data").fadeOut(500);
                    $("#tmp-user-mhs").html(data);
                }
            })
        })
    });

    $(document).ready(function() {
        $("#form-pembayaran").on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "<?= base_url('core/input_pembayaran_mahasiswa') ?>",
                data: $(this).serialize(),
                success: function(data) {
                    $.toast({
                        heading: 'Success',
                        text: 'Mahasiswa berhasil ditambahkan',
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'top-right'
                    });

                    window.location.href = '<?= base_url('#/pembayaran') ?>';
                }
            });
        })
    })
</script>