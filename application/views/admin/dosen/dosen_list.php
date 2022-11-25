<div class="content-inner pb-0 container-fluid" id="halaman-dosen" style="display: none;">
    <div class="card">
        <div class="card-body">
            <div class="d-flex bd-highlight mb-3">
                <div class="flex-grow-1 bd-highlight">
                    <h4 class="mb-0">Data Dosen</h4>
                </div>
                <div class="bd-highlight">
                    <a href="#dosen_tambah" class="btn btn-info btn-sm wi-50 text-white"><i class="bi bi-plus"></i> Tambah</a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="myTable" class="display expandable-table table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th width="10">No</th>
                            <th>Nama</th>
                            <th>NIDN</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Tanggal Lahir</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tmp-dosen"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $("#halaman-dosen").fadeIn(800);

        tampil_data();

        $('#myTable').DataTable();

        function tampil_data() {
            $.ajax({
                url: '<?= base_url("core/data_dosen"); ?>',
                async: false,
                dataType: 'html',
                success: function(data) {
                    $("#tmp-dosen").html(data);
                }
            })
        }

    });

    $(document).on('click', '.hapus-dosen', function() {
        var id = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: "<?= base_url('core/data_dosen_hapus') ?>",
            data: {
                'id': id
            },
            success: function() {
                $.toast({
                    heading: 'Success',
                    text: 'Data Berhasil Hapus',
                    showHideTransition: 'slide',
                    icon: 'success',
                    position: 'top-right'
                });
                tampil_data();
            },
            error: function(response) {
                console.log(response.responseText);
            }
        })
    })
</script>