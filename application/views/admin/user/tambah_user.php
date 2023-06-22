<style>
    .form-smku {
        font-size: 13px;
    }
</style>

<div class="content-inner pb-0 container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="header-title">
                <h4 class="card-title mb-0">Tambah User</h4>
                <span>Form tambah user beserta hak akses untuk mengakses sistem</span>
            </div>

            <div class="mb-3 mt-2 w-50 alert alert-left alert-info alert-dismissible fade show" role="alert" style="font-size: 13px;">
                <span> <b>Penting! </b> Inputan dengan tanda ( <span class="text-danger">*</span> ) <b>Wajib</b> di isi</span>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <form class="form-horizontal" method="post" id="form-tambah-user" action="" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="control-label col-sm-3 align-self-center mb-0" for="username_akun">Username<span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control form-smku" id="username_akun" name="username_akun" placeholder="Masukkan username akun">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-sm-3 align-self-center mb-0" for="email_akun">Email<span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control form-smku" id="email_akun" name="email_akun" placeholder="...@unibamadura.ac.id">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-sm-3 align-self-center mb-0" for="nama_akun">Nama Akun<span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control form-smku" id="nama_akun" name="nama_akun" placeholder="Nama lengkap pemilik akun">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-sm-3 align-self-center mb-0" for="password_akun">Password<span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control form-smku" name="password_akun" id="password_akun" placeholder="Password minimal 8 karakter">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-sm-3 align-self-center mb-0" for="foto_akun">Foto Akun</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control form-smku" name="foto_akun" id="foto_akun" placeholder="Password minimal 8 karakter">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-sm-3 align-self-center mb-0" for="role">Role Akses<span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <select name="role" id="role" class="form-control form-smku">
                            <option value="admin">Admin</option>
                            <option value="keuangan">Keuangan</option>
                            <option value="akademik">Akademik</option>
                            <option value="dosen">Dosen</option>
                            <option value="mahasiswa">Mahasiswa</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="#/daftar_user" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $("#username_akun, #email_akun").on({
            keydown: function(e) {
                if (e.which === 32)
                    return false;
            },
            keyup: function() {
                this.value = this.value.toLowerCase();
            },
            change: function() {
                this.value = this.value.replace(/\s/g, "");

            }
        });

        $("#form-tambah-user").on('submit', function(e) {
            e.preventDefault();
            var data = $("#form-tambah-user").serialize();
            $.ajax({
                type: "POST",
                processData: false,
                contentType: false,
                url: "<?= base_url('core/tambah_user_action') ?>",
                data: new FormData(this),
                dataType: "json",
                success: function(data) {
                    if (data.pesan == "oversize") {
                        console.log('gambar terlalu besar');
                    } else if (data.pesan == "error") {
                        console.log('ekstensi tidak diizinkan');
                    } else {
                        console.log('berhasil');
                    }
                }
            })
        });
    })
</script>