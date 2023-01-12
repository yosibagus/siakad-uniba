<div class="content-inner pb-0 container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between flex-wrap align-items-center">
            <div class="header-title">
                <h4 class="card-title mb-0">Daftar Dosen Wali</h4>
            </div>
            <div class="d-flex align-items-center gap-3">
                <a href="#/dosen_wali" class="text-center btn btn-primary btn-sm">
                    <i class="bi bi-gear"></i>
                    Set Dosen Wali
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tableWali" class="display expandable-table table table-striped table-sm dataTable no-footer">
                    <thead>
                        <tr>
                            <th width="10">No.</th>
                            <th width="10"></th>
                            <th>Nama</th>
                            <th>Jumlah Mahasiswa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tmp-dosen-wali"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        tampilData();

        $('#tableWali').DataTable();

        function tampilData() {
            $.ajax({
                url: "<?= base_url('core/data_dosen_wali') ?>",
                async: false,
                dataType: "html",
                success: function(data) {
                    $("#tmp-dosen-wali").html(data);
                }
            })
        }

    })
</script>