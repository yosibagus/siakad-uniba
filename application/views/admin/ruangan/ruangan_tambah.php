<div class="content-inner pb-0 container-fluid">
    <div class="card">
        <div class="card-header">
            Form Tambah Ruangan
        </div>
        <div class="card-body">
            <div class="mb-2">
                <button type="button" class="btn btn-secondary btn-sm text-white" id="btn-tambah-form"><i class="bi bi-plus"></i></button>
                <button type="button" class="btn btn-secondary btn-sm text-white" id="btn-reset-form"><i class="bi bi-arrow-clockwise"></i></button>
            </div>
            <form action="" method="post" id="form-ruangan">
                <div class="form-group">
                    <label for="nama_ruangan">Nama Ruangan</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">RUANGAN</span>
                        <input type="text" name="nama_ruangan[]" id="nama_ruangan" class="form-control form-control-sm" autofocus aria-describedby="basic-addon3">
                    </div>
                    <input type="text" name="id" value="<?= $_GET['id'] ?>" hidden>
                </div>
                <div id="insert-form"></div>
                <input type="hidden" id="jumlah-form" value="1">
                <button type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
                <a href="#ruangan?id=<?= $_GET['id'] ?>" class="btn btn-danger btn-sm text-white">Kembali</a>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() { // Ketika halaman sudah diload dan siap
            $("#btn-tambah-form").click(function() { // Ketika tombol Tambah Data Form di klik
                var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
                var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

                // Kita akan menambahkan form dengan menggunakan append
                // pada sebuah tag div yg kita beri id insert-form
                $("#insert-form").append(`
                <div class="form-group">
                <label for="nama_ruangan">Nama Ruangan</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">RUANGAN</span>
                    <input type="text" name="nama_ruangan[]" id="nama_ruangan" class="form-control form-control-sm" autofocus aria-describedby="basic-addon3">
                </div>
                <input type="text" name="id" value="<?= $_GET['id'] ?>" hidden>
            </div>
            `);

                $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
            });

            // Buat fungsi untuk mereset form ke semula
            $("#btn-reset-form").click(function() {
                $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
                $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $("#form-ruangan").on('submit', function(e) {
                e.preventDefault();
                var namaruangan = $("#nama_ruangan").val();
                if (namaruangan == "") {
                    $.toast({
                        heading: 'Error',
                        text: 'Nama Ruangan Tidak Boleh Kosong!',
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'bottom-right',
                        loader: false
                    })
                } else {
                    $.ajax({
                        url: "<?= base_url('core/input_ruangan') ?>",
                        method: "POST",
                        data: $(this).serialize(),
                        success: function() {
                            Swal.fire({
                                title: 'Success',
                                text: "Data Berhasil Ditambahkan",
                                icon: 'success',
                                showCancelButton: true,
                                confirmButtonColor: '#d33',
                                cancelButtonColor: '#63c76a',
                                confirmButtonText: 'Lihat Data',
                                cancelButtonText: 'Lanjut Input?'
                            }).then((result) => {
                                if (result.value) {
                                    window.location.href = '<?= base_url('#ruangan?id=') . $_GET['id'] ?>'
                                }
                            })
                            $('#nama_ruangan').val('');
                        }
                    })
                }
            })
        })
    </script>
</div>