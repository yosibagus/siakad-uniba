<form id="form-kolektif" action="" method="POST">
    <div class="content-inner pb-0 container-fluid">
        <div class="card mb-2">
            <div class="card-body">
                <div class="d-flex bd-highlight mb-2">
                    <div class="pt-2 flex-grow-1 bd-highlight">
                        <h4 class="mb-0">Input KRS / Peserta Kelas</h4>
                    </div>
                    <div class="p-2 bd-highlight">
                        <button class="btn btn-info btn-sm wi-50 text-white"><i class="bi bi-check-lg"></i> Simpan</button>
                    </div>
                    <div class="p-2 bd-highlight">
                        <a href="#detail_perkuliahan/<?= $detail['token'] ?>" class="btn btn-success btn-sm wi-50 text-white"><i class="bi bi-list-ul"></i> Daftar</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Program Studi</label>
                            <input class="form-control" type="text" disabled value="<?= $detail['nama_program_studi'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Mata Kuliah</label>
                            <input class="form-control" type="text" disabled value="<?= $detail['nama_mata_kuliah'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Semester</label>
                            <input class="form-control" type="text" disabled value="<?= $detail['semester_perkuliahan'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama Kelas</label>
                            <input class="form-control" type="text" disabled value="<?= $detail['nama_kelas'] ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body pb-0 px-0">
                <div id="form-select" class="row">
                    <div class="col-md-6">
                        <select name="angkatan" id="angkatan" class="form-control">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select name="prodi" id="prodi" class="form-control">
                            <option value=""></option>
                        </select>
                        <input type="text" name="id_perkuliahan_kelas" id="id_perkuliahan_kelas" value="<?= $detail['id_perkuliahan_kelas'] ?>" hidden>
                    </div>
                </div>
                <div class="row justify-content-center my-3">
                    <div class="col-md-3 text-center" id="loading-data" style="display: none;">
                        <button class="" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <small>Sedang Mengambil Data...</small>
                        </button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>Pilih</th>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Prodi</th>
                                <th>Angkatan</th>
                            </tr>
                        </thead>
                        <tbody id="tmp-mhs">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- tampil select angkatan & prodi -->
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

        // <!-- on change data angkatan & prodi -->
        $("#form-select").on('change', '#angkatan, #prodi', function() {
            var angkatan = $("#angkatan").val();
            var prodi = $("#prodi").val();
            var perkuliahan = "<?= $detail['id_perkuliahan_kelas'] ?>";
            $("#loading-data").fadeIn(500);
            $.ajax({
                url: "<?= base_url('core/tampil_mhs_angkatan') ?>",
                method: "GET",
                data: {
                    angkatan: angkatan,
                    prodi: prodi,
                    idperkuliahan: perkuliahan
                },
                success: function(data) {
                    $("#loading-data").fadeOut(500);
                    $("#tmp-mhs").html(data);
                }
            })
        });

        // <!-- input mahasiswa krs -->
        $("#form-kolektif").on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "<?= base_url('core/input_krs') ?>",
                data: $(this).serialize(),
                success: function(data) {
                    $.toast({
                        heading: 'Success',
                        text: 'Mahasiswa berhasil ditambahkan',
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'top-right'
                    });

                    window.location.href = '<?= base_url('#detail_perkuliahan/' . $detail['token']) ?>';
                }
            });
        });
    })
</script>