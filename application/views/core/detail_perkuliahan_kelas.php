<style>
    .nav-pills.nav-pills-custom .nav-link.active {
        background: #4b49ac;
        color: #ffffff;
    }
</style>

<form action="" method="post" id="form-perkuliahan-detail" class="card">
    <div class="card-body">
        <div class="d-flex bd-highlight mb-2">
            <div class="pt-2 flex-grow-1 bd-highlight">
                <h3 class="mb-0">Kelas Perkulihan</h3>
            </div>
            <div class="p-2 bd-highlight">
                <a href="#kelas_perkuliahan_tambah" class="btn btn-info btn-sm wi-50 text-white"><i class="bi bi-plus"></i> Tambah</a>
                <a href="" class="btn btn-warning btn-sm wi-50 text-white"><i class="bi bi-pencil-square"></i> Ubah</a>
                <button type="button" class="btn btn-danger btn-sm wi-50 text-white hapus-data" id="<?= $detail['id_perkuliahan_kelas'] ?>"><i class="bi bi-trash"></i> Hapus</button>
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
                        <!-- <select disabled style="width: 100%;" required name="id_prodi" id="id_prodi" class="form-control form-control-sm">
                            <option value=""></option>
                            <option value="" selected><?= $detail['id_prodi'] ?></option>
                        </select> -->
                        <input type="text" class="form-control form-ku" value="S1 <?= $detail['nama_prodi'] ?>" disabled>
                        <small class="text-danger" id="m-prodi"><i></i></small>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="semester_perkuliahan">Semester <span class="text-danger">*</span></label>
                        <input disabled required type="text" class="form-control form-ku" name="semester_perkuliahan" value="<?= $detail['semester_perkuliahan'] ?>" id="semester_perkuliahan">
                        <small class="text-danger" id="m-semester"><i></i></small>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="id_matkul">Mata Kuliah <span class="text-danger">*</span></label>
                        <!-- <select disabled style="width: 100%;" required name="id_matkul" id="id_matkul" class="form-control form-control-sm">
                            <option value=""></option>
                            <?php foreach ($matkul as $get) : ?>
                                <option <?= $get['id_matkul'] == $detail['id_matkul'] ? 'selected' : '' ?> value="<?= $get['id_matkul'] ?>"><?= $get['kode_mata_kuliah'] . " | " . $get['nama_mata_kuliah'] ?></option>
                            <?php endforeach; ?>
                        </select> -->
                        <input type="text" disabled value="<?= $detail['kode_mata_kuliah'] . " | " . $detail['nama_mata_kuliah'] ?>" class="form-control">
                        <small class="text-danger" id="m-matkul"><i></i></small>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="nama_kelas">Nama Kelas <span class="text-danger">*</span></label>
                        <input disabled required type="text" value="<?= $detail['nama_kelas'] ?>" class="form-control form-ku" name="nama_kelas" id="nama_kelas">
                        <small class="text-danger" id="m-namakelas"><i></i></small>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="id_gedung">Gedung <span class="text-danger">*</span></label>
                        <!-- <select disabled style="width: 100%;" required name="id_gedung" id="id_gedung" class="form-control form-control-sm">
                            <option value=""></option>
                            <?php foreach ($gedung as $get) : ?>
                                <option <?= $get['id_ruangan'] == $detail['id_ruangan'] ? 'selected' : '' ?> value="<?= $get['id_ruangan'] ?>"><?= $get['nama_gedung'] . " | " . $get['nama_ruangan'] ?></option>
                            <?php endforeach; ?>
                        </select> -->
                        <input type="text" class="form-control" disabled value="<?= $detail['nama_gedung'] . " | " . $detail['nama_ruangan'] ?>">
                        <small class="text-danger" id="m-gedung"><i></i></small>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="kuota">Kuota Kelas</label>
                        <input disabled required type="text" value="<?= $detail['kuota_kelas'] ?>" name="kuota_kelas" id="kuota_kelas" class="form-control form-ku">
                        <small class="text-danger" id="m-kuota"><i></i></small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sks">SKS</label>
                        <input disabled type="text" required name="sks" id="sks" class="form-control form-ku" value="<?= $detail['sks_mata_kuliah'] ?>">
                        <small class="text-danger" id="m-jamakhir"><i></i></small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jam_awal">Hari</label>
                                <input disabled type="text" required name="jam_awal" id="jam_awal" class="form-control form-ku" value="<?= $detail['hari'] ?>">
                                <small class="text-danger" id="m-jamawal"><i></i></small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jam_awal">Jam Awal</label>
                                <input disabled type="time" required name="jam_awal" id="jam_awal" class="form-control form-ku" value="<?= $detail['jam_awal'] ?>">
                                <small class="text-danger" id="m-jamawal"><i></i></small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jam_akhir">Jam Akhir</label>
                                <input disabled type="time" required name="jam_akhir" id="jam_akhir" class="form-control form-ku" value="<?= $detail['jam_akhir'] ?>">
                                <small class="text-danger" id="m-jamakhir"><i></i></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<div class="col-lg-12">
    <div class="card card-block card-stretch card-height">
        <nav class="tab-bottom-bordered">
            <div class="mb-0 nav nav-tabs justify-content-around" id="nav-tab1" role="tablist">
                <button class="nav-link py-3 active" id="nav-home-11-tab" data-bs-toggle="tab" data-bs-target="#nav-home-11" type="button" role="tab" aria-controls="nav-home-11" aria-selected="true">DOSEN PENGAJAR</button>
                <button class="nav-link py-3" id="nav-profile-11-tab" data-bs-toggle="tab" data-bs-target="#nav-profile-11" type="button" role="tab" aria-controls="nav-profile-11" aria-selected="false">MAHASISWA KRS / PESERTA KELAS</button>
            </div>
        </nav>
        <div class="tab-content iq-tab-fade-up" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home-11" role="tabpanel" aria-labelledby="nav-home-11-tab">
                <!-- DOSEN -->
                <div class="p-3">
                    <button class="btn btn-info btn-sm text-white mb-2" id="tambah-form"><i class="bi bi-plus-lg"></i> Aktifitas Mengajar Dosen</button>

                    <div class="d-flex bd-highlight">
                        <div class="pt-2 flex-grow-1 bd-highlight">
                            <h4 class="mb-0 mt-1" id="header-dosen">Form Dosen Pengajar</h3>
                        </div>
                        <div class="p-2 bd-highlight">
                            <button class="btn btn-danger btn-sm text-white mb-2" id="cancel-form">Cancel</button>
                        </div>
                    </div>

                    <div class="table-responsive" id="table-dosen">
                        <table id="myTable" class="display expandable-table table table-striped" style="width:100%">
                            <thead>
                                <tr class="q-tr">
                                    <th rowspan="2" class="text-center"><strong>No</strong></th>
                                    <th rowspan="2" class="text-center"><strong>NIDN</strong></th>
                                    <th rowspan="2" class="text-center"><strong>Nama Dosen</strong></th>
                                    <th rowspan="2" class="text-center"><strong>Bobot (sks)</strong></th>
                                    <th colspan="2" class="text-center"><strong>Pertemuan</strong></th>
                                    <th rowspan="2" class="text-center"><strong>Jenis Evaluasi</strong></th>
                                    <th rowspan="2" class="text-center"><strong>Aksi</strong></th>
                                </tr>
                                <tr class="q-tr">
                                    <th style="border-radius: 0;" class="text-center"><strong>Rencana</strong></th>
                                    <th style="border-radius: 0;" class="text-center"><strong>Realisasi</strong></th>
                                </tr>
                            </thead>
                            <tbody id="tmp-dosen-kelas"></tbody>
                        </table>
                    </div>

                    <form action="" method="post" id="form-aktifitas-dosen">
                        <div class="row" id="form-tambah">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_dosen">Dosen <span class="text-danger">*</span></label>
                                    <select name="id_dosen" style="width: 100%;" class="form-control" id="id_dosen">
                                        <option value=""></option>
                                        <?php foreach ($dosen as $get) : ?>
                                            <option value="<?= $get['id_dosen'] ?>"><?= $get['nidn'] . ' - ' . $get['nama_dosen'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bobot_sks">Bobot SKS <span class="text-danger">*</span></label>
                                    <input type="text" name="bobot_sks" id="bobot_sks" class="form-control form-ku" value="<?= $detail['sks_mata_kuliah'] ?>" placeholder="bobot sks">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jumlah_rencana_pertemuan">Jumlah Rencana Pertemuan <span class="text-danger">*</span></label>
                                    <input type="text" id="jumlah_rencana_pertemuan" name="jumlah_rencana_pertemuan" class="form-control form-ku" placeholder="Jumlah Rencana Pertemuan">
                                    <input type="text" hidden name="id_perkuliahan_kelas" value="<?= $detail['id_perkuliahan_kelas'] ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_evaluasi">Jenis Evaluasi <span class="text-danger">*</span></label>
                                    <select name="jenis_evaluasi" style="width: 100%;" class="form-control" id="jenis_evaluasi">
                                        <option value=""></option>
                                        <option value="Kognitif/Pengetahuan">Kognitif/Pengetahuan</option>
                                        <option value="Hasil Proyek">Hasil Proyek</option>
                                        <option value="Aktifitas Partisipatif">Aktifitas Partisipatif</option>
                                        <option value="Evaluasi Akademik">Evaluasi Akademik</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex bd-highlight">
                                <div class="pt-2 flex-grow-1 bd-highlight">

                                </div>
                                <div class="p-2 bd-highlight">
                                    <button class="btn btn-info btn-sm text-white"><i class="ti-save"></i> <span style="margin-top: -5px;"><i class="bi bi-check-lg"></i> Simpan Data Pengajar</span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <div class="tab-pane fade" id="nav-profile-11" role="tabpanel" aria-labelledby="nav-profile-11-tab">
                <div class="p-4">
                    <!-- tambah data mahasiswa kelas -->
                    <div class="card" style="background: #e0f7fa; box-shadow: 0 1px 5px rgb(0 0 0 / 20%), 0 2px 2px rgb(0 0 0 / 14%), 0 3px 1px -2px rgb(0 0 0 / 12%);">
                        <div class="card-body text-black">
                            <form action="" method="post" id="form-krs">
                                <table style="width: 100%;">
                                    <tr>
                                        <td><label for="nim_mhs">NIM/NAMA</label></td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" require class="form-control" placeholder="Mahasiswa" id="nim_mhs" name="nim_mhs">
                                            <input type="text" hidden name="id_mhs" id="id_mhs">
                                            <input type="text" hidden name="id_perkuliahan_kelas" id="id_perkuliahan_kelas" value="<?= $detail['id_perkuliahan_kelas'] ?>">
                                        </td>
                                        <td>
                                            &nbsp;
                                            &nbsp;
                                            <button type="submit" class="btn btn-info btn-sm"><i class="bi bi-check-lg"></i> Tambah Mahasiswa</button>
                                            <a href="#kolektif_mahasiswa/<?= $detail['token'] ?>" class="btn btn-info btn-sm"><i class="bi bi-list-check"></i> Input Kolektif</a>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>

                    <!-- tabel mahasiswa kelas -->
                    <div class="card" style="box-shadow: 0 1px 5px rgb(0 0 0 / 20%), 0 2px 2px rgb(0 0 0 / 14%), 0 3px 1px -2px rgb(0 0 0 / 12%);">
                        <div class="card-body px-0 pb-0">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table-krss">
                                    <thead>
                                        <tr>
                                            <th width="10">No</th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Jurusan</th>
                                            <th>Angkatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tmp-krs"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div hidden class="token" id="<?= $detail['id_perkuliahan_kelas'] ?>"></div>

<!-- tampil mahasiswa -->
<script>
    $(document).ready(function() {
        selesai();
    });

    function selesai() {
        setTimeout(function() {
            tampil_krs();
            selesai();
        }, 2000);
    }

    function tampil_krs() {
        $.ajax({
            url: '<?= base_url("core/data_krs/" . $detail['id_perkuliahan_kelas']); ?>',
            async: false,
            dataType: 'html',
            success: function(data) {
                $("#tmp-krs").html(data);
            }
        })
    }
</script>

<!-- input mahasiswa -->
<script>
    $(document).ready(function() {
        $("#form-krs").on('submit', function(e) {
            e.preventDefault();
            var data = $('#form-krs').serialize();
            if ($("#id_mhs").val() == "") {
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
                    type: 'POST',
                    url: "<?= base_url('core/add_mhsKrs') ?>",
                    data: data,
                    dataType: 'json',
                    success: function(data) {
                        $.toast({
                            heading: 'Success',
                            text: ' Data Berhasil Ditambahkan',
                            showHideTransition: 'slide',
                            icon: 'success',
                            position: 'top-right'
                        });

                        $("#nim_mhs").val("");
                        $("#id_mhs").val("");

                    }
                });
            }
        })
    })
</script>

<!-- hapus mahasiswa krs -->
<script>
    $(document).on('click', '.hapus-krs-mhs', function() {
        var id = $(this).attr('id');
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data Mahasiswa dihapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: "<?= base_url('core/hapus_krs') ?>",
                    data: {
                        id: id
                    },
                    success: function() {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                        // window.location.href = '<?= base_url('#kelas_perkuliahan') ?>';
                    },
                    error: function(response) {
                        console.log(response.responseText);
                    }
                });

            }
        })

    });
</script>

<!-- auto compleate mahasiswa -->
<script>
    $(document).ready(function() {
        $("#nim_mhs").autocomplete({
            source: "<?= base_url('core/autofill_mahasiswa?') ?>",
            select: function(event, ui) {
                // $('[name="nim_mhs"]').val(ui.item.label);
                $('[name="id_mhs"]').val(ui.item.nim);
                // console.log(ui.item.nim);

            }
        })
    })
</script>

<!-- form dosen -->
<script>
    $(document).ready(function() {

        tampil();

        function tampil() {
            var id = $(".token").attr('id');
            $.ajax({
                url: '<?= base_url("core/data_perkuliahan_dosen?token=") . $detail['id_perkuliahan_kelas'] ?>',
                type: 'GET',
                success: function() {
                    $("#tmp-dosen-kelas").load('<?= base_url("core/data_perkuliahan_dosen?token=") . $detail['id_perkuliahan_kelas'] ?>');
                }
            })
        }

        $("#form-tambah").hide();
        $("#cancel-form").hide();
        $("#header-dosen").hide();

        $("#tambah-form").click(function() {
            $("#header-dosen").show(800);
            $("#table-dosen").hide(800);
            $("#form-tambah").show(800);
            $("#tambah-form").hide(800);
            $("#cancel-form").show(800);
        });

        $("#cancel-form").click(function() {
            $("#table-dosen").show(800);
            $("#form-tambah").hide(800);
            $("#tambah-form").show(800);
            $("#header-dosen").hide(800);
            $("#cancel-form").hide(800);
        });


        //tambah data
        $("#form-aktifitas-dosen").on('submit', function(e) {
            e.preventDefault();
            var data = $('#form-aktifitas-dosen').serialize();
            $.ajax({
                type: 'POST',
                url: "<?= base_url('core/aktifitas_dosen') ?>",
                data: data,
                success: function() {
                    //console.log(data);
                    $.toast({
                        heading: 'Success',
                        text: 'Data Berhasil Ditambahkan',
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'top-right'
                    });

                    $("#id_dosen").val("");
                    $("#bobot_sks").val("");
                    $("#jenis_evaluasi").val("");
                    $("#jumlah_rencana_pertemuan").val("");
                    tampil();
                }
            });
        })

    });
</script>

<!-- hapus kelas perkuliahan -->
<script>
    $(document).on('click', '.hapus-data', function() {
        var id = $(this).attr('id');
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data Mata Kuliah Bersangkutan dihapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: "<?= base_url('core/hapus_perkuliahan') ?>",
                    data: {
                        id: id
                    },
                    success: function() {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                        window.location.href = '<?= base_url('#kelas_perkuliahan') ?>';
                    },
                    error: function(response) {
                        console.log(response.responseText);
                    }
                });

            }
        })

    });
</script>

<!-- fokus form dosen -->
<script type="text/javascript">
    $("#form-dosen").focus();
</script>