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
<div id="generate-dosen-list" class="content-inner pb-0 container-fluid">
    <form action="" method="POST" id="form-generate-dosen">
        <div class="card">
            <div class="card-header d-flex justify-content-between flex-wrap align-items-center">
                <div class="header-title">
                    <h4 class="card-title mb-0">Generate Username & Password Dosen</h4>
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
                        <li>Default user yang di-generate untuk username : <strong>NIDN</strong> &amp; password : <strong>Tanggal Lahir dengan format yyyy-mm-dd (tanda '-' dihilangkan)</strong>. Contoh : 1962-12-04 --&gt; 19621204.</li>
                        <li>Daftar dosen yang sudah terdaftar di Forlap.</li>
                        <li>Untuk melihat daftar user <a href="#/daftar_user">klik disini</a>.</li>
                    </ol>
                </div>
                <div class="table-responsive" id="form-select-kategori">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <td width="30%">Kategori</td>
                            <td>
                                <select name="kategori" id="kategori" class="form-control" style="width: 100%;">
                                    <option value=""></option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="row justify-content-center my-3">
                    <div class="col-md-3 text-center" id="loading-data" style="display: none; position:fixed;">
                        <button class="btn btn-info" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span class="visually-hidden">Loading...</span> Sedang Mengambil Data ...
                        </button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="tableGDosen">
                        <thead>
                            <tr>
                                <th width="10"><input type="checkbox" id="cekalldosen" style="padding:8px;" class="form-check-input"></th>
                                <th width="10">No</th>
                                <th>Nama</th>
                                <th>NIDN / NUP / NIDK </th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="tmp-user-dosen"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</div>


<script>
    $(document).ready(function() {
        $('#kategori').select2({
            placeholder: 'Pilih Kategori Dosen',
            allowClear: true
        });
    });
    $("#cekalldosen").click(function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    $(document).ready(function() {

        var app = {
            show: function() {
                $.ajax({
                    url: "<?= base_url('core/select_kategori_dosen') ?>",
                    method: "GET",
                    success: function(data) {
                        $("#kategori").html(data)
                    }
                })
            }
        }
        app.show();

        $("#form-select-kategori").on('change', '#kategori', function() {
            var kategori = $("#kategori").val();
            $("#loading-data").fadeIn(500);
            $.ajax({
                url: "<?= base_url('core/getDataDosenGenerate') ?>",
                method: "GET",
                data: {
                    kategori: kategori
                },
                success: function(data) {
                    $("#loading-data").fadeOut(500);
                    $("#tmp-user-dosen").html(data);
                }
            })
        })

        // tampilData();

        // $('#tableGDosen').DataTable({
        //     "lengthMenu": [
        //         [10, 25, 50, -1],
        //         [10, 25, 50, "All"]
        //     ]
        // });

        // function tampilData() {
        //     $.ajax({
        //         type: "POST",
        //         url: "<?= base_url('core/getDataDosenGenerate') ?>",
        //         async: false,
        //         success: function(data) {
        //             // console.log(data);
        //             $("#tmp-user-dosen").html(data);
        //         }
        //     })
        // }

        $("#form-generate-dosen").on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "<?= base_url('core/input_generate_dosen') ?>",
                data: $(this).serialize(),
                success: function(data) {
                    $.toast({
                        heading: 'Success',
                        text: 'Dosen berhasil ditambahkan',
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