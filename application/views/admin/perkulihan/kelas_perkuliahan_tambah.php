<div style="position: absolute; left:50%; top:50%;">
    <img id="loading" width="100" src="<?= base_url('assets/loading2.gif') ?>" alt="">
</div>
<div class="content-inner pb-0 container-fluid">
    <form action="" method="post" id="form-perkuliahan" class="card" style="display: none;">
        <div class="card-body">

            <div class="d-flex bd-highlight mb-2">
                <div class="pt-2 flex-grow-1 bd-highlight">
                    <h3 class="mb-0 mt-1">Kelas Perkulihan</h3>
                </div>
                <div class="p-2 bd-highlight">
                    <button type="submit" class="btn btn-info btn-sm wi-50 text-white"><i class="bi bi-check-lg"></i> Simpan</button>
                </div>
                <div class="p-2 bd-highlight">
                    <a href="#kelas_perkuliahan" class="btn btn-success btn-sm wi-50 text-white"><i class="bi bi-list-ul"></i> Daftar</a>
                </div>
            </div>

            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Form Kelas Perkuliahan,</strong> Menyimpan Jadwal Perkuliahan Setiap Periode
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <div class="mt-2">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="id_prodi">Program Studi <span class="text-danger">*</span></label>
                            <select required name="id_prodi" id="id_prodi" class="form-control form-control-sm">
                                <option value=""></option>
                                <?php foreach ($prodi as $get) : ?>
                                    <option value="<?= $get['id_prodi'] ?>"><?= $get['nama_jenjang_pendidikan'] . " " . $get['nama_program_studi'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger" id="m-prodi"><i></i></small>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="semester_perkuliahan">Semester <span class="text-danger">*</span></label>
                            <input required type="text" class="form-control form-ku" name="semester_perkuliahan" id="semester_perkuliahan">
                            <small class="text-danger" id="m-semester"><i></i></small>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="id_matkul">Mata Kuliah <span class="text-danger">*</span></label>
                            <select required name="id_matkul" id="id_matkul" class="form-control form-control-sm">
                                <option value=""></option>
                                <?php foreach ($matkul as $get) : ?>
                                    <option value="<?= $get['id_matkul'] ?>"><?= $get['kode_mata_kuliah'] . " - " . $get['nama_mata_kuliah'] . " (" . (int)($get['sks_mata_kuliah']) . " sks) Kurikulum " . $get['nama_program_studi']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger" id="m-matkul"><i></i></small>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="nama_kelas">Nama Kelas <span class="text-danger">*</span></label>
                            <input required type="text" class="form-control form-ku" name="nama_kelas" id="nama_kelas">
                            <small class="text-danger" id="m-namakelas"><i></i></small>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="id_gedung">Gedung <span class="text-danger">*</span></label>
                            <select required name="id_gedung" id="id_gedung" class="form-control form-control-sm">
                                <option value=""></option>
                            </select>
                            <small class="text-danger" id="m-gedung"><i></i></small>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="id_ruangan">Ruangan <span class="text-danger">*</span></label>
                            <select required name="id_ruangan" id="id_ruangan" class="form-control form-control-sm">
                            </select>
                            <small class="text-danger" id="m-ruangan"><i></i></small>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="kuota">Kuota Kelas</label>
                            <input required type="text" name="kuota_kelas" id="kuota_kelas" class="form-control form-ku">
                            <small class="text-danger" id="m-kuota"><i></i></small>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="hari">Hari</label>
                                    <select name="hari" id="hari" class="form-control form-ku">
                                        <option value=""></option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jum'at</option>
                                        <option value="Sabtu">Sabtu</option>
                                    </select>
                                    <small class="text-danger" id="m-hari"><i></i></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="jam_awal">Jam Awal</label>
                                    <input type="time" required name="jam_awal" id="jam_awal" class="form-control form-ku">
                                    <small class="text-danger" id="m-jamawal"><i></i></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="jam_akhir">Jam Akhir</label>
                                    <input type="time" required name="jam_akhir" id="jam_akhir" class="form-control form-ku">
                                    <small class="text-danger" id="m-jamakhir"><i></i></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $("#form-perkuliahan").fadeIn(800);
        $("#loading").fadeOut(800);
        $("#form-perkuliahan").validate();
    });
</script>

<script>
    $(document).ready(function() {
        $("#form-perkuliahan").on('submit', function(e) {
            e.preventDefault();
            var data = $('#form-perkuliahan').serialize();
            $.ajax({
                type: 'POST',
                url: "<?= base_url('core/data_perkuliahan_kelas_tambah') ?>",
                data: data,
                dataType: 'json',
                success: function(data) {
                    // console.log(data);
                    $.toast({
                        heading: 'Success',
                        text: 'Data Berhasil Ditambahkan',
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'top-right'
                    })
                    // $('.toast').toast('show');
                    window.location.href = '<?= base_url('#detail_perkuliahan?token=') ?>' + data.token;
                }
            });
        })
    })
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#id_prodi').select2({
            placeholder: 'Pilih Program Studi',
            allowClear: true
        });
        $('#id_matkul').select2({
            placeholder: 'Pilih Mata Kuliah',
            allowClear: true
        });
        $('#id_gedung').select2({
            placeholder: 'Pilih Gedung',
            allowClear: true
        });
        $('#id_ruangan').select2({
            placeholder: 'Pilih Ruangan',
            allowClear: true
        });
        $('#hari').select2({
            placeholder: 'Pilih Hari',
            allowClear: true
        });
    });

    $(document).ready(function() {
        var app = {
            show: function() {
                $.ajax({
                    url: "<?= base_url('core/select_gedung') ?>",
                    method: "GET",
                    success: function(data) {
                        $("#id_gedung").html(data)
                    }
                })
            },
            tampil: function() {
                var idGedung = $(this).val();
                $.ajax({
                    url: "<?= base_url('core/select_ruangan') ?>",
                    method: "POST",
                    data: {
                        idGedung: idGedung
                    },
                    success: function(data) {
                        $("#id_ruangan").html(data)
                    }
                })
            }
        }
        app.show();
        $(document).on("change", "#id_gedung", app.tampil)
    })


    // $("span .select2-selection__arrow").addClass('margin-ku');
</script>