<div class="content-inner pb-0 container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex bd-highlight mb-3">
                <div class="flex-grow-1 bd-highlight">
                    <div class="header-title mb-4">
                        <h4 class="card-title mb-0">Data Program Studi</h4>
                        <span>List Data Prodi</span>
                    </div>
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
                            <th>Kode Prodi</th>
                            <th>Program Studi</th>
                            <th>Jenjang</th>
                        </tr>
                    </thead>
                    <tbody id="tmp-prodi"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        tampil_data();

        $('#myTable').DataTable();

        function tampil_data() {
            $.ajax({
                url: '<?= base_url("core/data_prodi"); ?>',
                async: false,
                dataType: 'html',
                success: function(data) {
                    $("#tmp-prodi").html(data);
                }
            })
        }

    });
</script>