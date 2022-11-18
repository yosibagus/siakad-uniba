<style>
    a {
        text-decoration: none;
    }

    .custom-ku:hover {
        background-color: green;
        color: white;
    }

    .custom-ku2:hover {
        background-color: red;
        color: white;
    }
</style>

<div style="position: absolute; left:50%; top:50%;">
    <img id="loading" width="100" src="<?= base_url('assets/loading2.gif') ?>" alt="">
</div>

<div id="ruangan-list" class="content-inner pb-0 container-fluid" style="display: none;">
    <div class="card mb-2">
        <div class="card-body">
            <p class="card-title">Gedung Perkuliahan</p>
            <div class="row">
                <div class="col-md-6 mb-2">
                    <div class="">
                        <label for="">Nama Singkat</label>
                        <input type="text" disabled class="form-control form-control-sm" value="<?= $gedung['nama_gedung'] ?>">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <label for="">Gedung</label>
                    <input type="text" disabled class="form-control form-control-sm" value="<?= $gedung['nama_panjang'] ?>">
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <div class="d-flex bd-highlight mb-2">
                <div class="pt-2 flex-grow-1 bd-highlight">
                    <h4 class="mb-0 mt-2">Kelas Perkulihan</h4>
                </div>
                <div class="p-2 bd-highlight">
                    <a href="#tambahruangan?id=<?= $_GET['id'] ?>" class="btn btn-info btn-sm wi-50 text-white"><i class="bi bi-plus"></i> Tambah</a>
                </div>
                <div class="p-2 bd-highlight">
                    <a href="#gedung" class="btn btn-success btn-sm wi-50 text-white"><i class="bi bi-list-ul"></i> Daftar</a>
                </div>
            </div>

            <div class="table-responsive">
                <table id="myTable" class="display expandable-table table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th width="10">No</th>
                            <th>Nama Ruangan</th>
                            <th width="10">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tmp-ruangan">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $("#loading").fadeOut(800);
        $("#ruangan-list").fadeIn(800);
        tampil_data();

        // $('#myTable').DataTable();

        function tampil_data() {
            $.ajax({
                url: '<?= base_url("core/data_ruangan/") . $_GET['id']; ?>',
                async: false,
                dataType: 'html',
                success: function(data) {
                    $("#tmp-ruangan").html(data);
                }
            })
        }

        $(document).on('click', '.btn-hapus-ruangan', function() {
            var id = $(this).attr('id');
            $.ajax({
                type: 'POST',
                url: '<?= base_url('core/hapus_ruangan'); ?>',
                data: {
                    id: id
                },
                success: function() {
                    tampil_data();
                    $("div").removeClass("modal-backdrop");
                },
                complete: function() {
                    $.toast({
                        heading: 'Success',
                        text: 'Data Berhasil Dihapus',
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'top-right'
                    })
                },
                error: function() {
                    console.log(response.responseText);
                }
            })
        });
    });
</script>