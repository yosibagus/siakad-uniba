<style>
    label {
        font-weight: bold;
        color: black;
    }
</style>
<div class="content-inner pb-0 container-fluid">

    <form method="post" action="" class="card" id="form-dosen">
        <div class="card-body">
            <div class="d-flex bd-highlight mb-2">
                <div class="pt-2 flex-grow-1 bd-highlight">
                    <h3 class="mb-0">Dosen</h3>
                </div>
                <div class="p-2 bd-highlight">
                    <button type="submit" class="btn btn-primary btn-sm wi-50 text-white"><i class="bi bi-check-lg"></i> Simpan</button>
                </div>
                <div class="p-2 bd-highlight">
                    <a href="#dosen" class="btn btn-success btn-sm wi-50 text-white"><i class="bi bi-list-ul"></i> Daftar</a>
                </div>
            </div>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Form Tambah Dosen,</strong> Menyimpan Data Dosen Pengajar
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <div class="form">
                <div class="form-group row">
                    <label class="control-label col-sm-2 align-self-center mb-0" for="nama_dosen">Nama Lengkap <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="nama_dosen" autofocus class="form-control" id="nama_dosen" name="nama_dosen" placeholder="Nama Lengkap (DOSEN)">
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nik">Nomor Induk Kepegawaian <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="NIK" name="nik" id="nik">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nidn">Nomor Induk Dosen Nasional</label>
                            <input type="text" class="form-control" placeholder="NIDN" name="nidn" id="nidn">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_agama">Agama <span class="text-danger">*</span></label>
                            <select name="nama_agama" id="nama_agama" class="form-control">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Islam">Islam</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Khonghucu">Khonghucu</option>
                                <option value="Protestan">Protestan</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" placeholder="tanggal_lahir" name="tanggal_lahir" id="tanggal_lahir">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Status <span class="text-danger">*</span></label>
                            <select name="status" id="status" class="form-control">
                                <option value=""></option>
                                <option value="Aktif" selected>Aktif</option>
                                <option value="Non-Aktif">Non-Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>

</div>

<script>
    $(document).ready(function() {
        $('#nama_agama').select2({
            placeholder: 'Pilih Agama',
            allowClear: true
        });
        $('#status').select2({
            placeholder: 'Pilih Status',
            allowClear: true
        });
    });
</script>

<script>
    $(document).ready(function() {
        $("#form-dosen").on('submit', function(e) {
            e.preventDefault();
            var data = $('#form-dosen').serialize();
            $.ajax({
                type: 'POST',
                url: "<?= base_url('core/data_dosen_tambah') ?>",
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
                    window.location.href = '<?= base_url('#dosen') ?>';
                }
            });
        })
    })
</script>