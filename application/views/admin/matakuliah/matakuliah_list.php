<div class="content-inner pb-0 container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="header-title mb-4">
                <h4 class="card-title mb-0">Data Mata Kuliah</h4>
                <span>List Data Mata Kuliah</span>
            </div>
            <!-- <div class="text-center" id="loader">
                <div class="loading-layar">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div> -->
            <div class="table-responsive" id="content-utama">
                <table id="table-matakuliah" class="display expandable-table table table-striped table-sm" style="width:100%">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th style="width: 10px">No</th>
                            <th>Kode Mata Kuliah</th>
                            <th>Nama Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Program Studi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#judul").html("SIAKAD - Mata Kuliah");
        $('#table-matakuliah').DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "order": [],
            // "fixedHeader": true,
            // "lengthMenu": [
            //     [10, 25, 50, 100, -1],
            //     [10, 25, 50, 100, "All"]
            // ],
            "ajax": {
                "url": "<?= base_url('core/data_matakuliah') ?>",
                "type": "post"
            },
            "columDefs": [{
                "target": [-1],
                "orderable": false
            }]
        });
    });
</script>