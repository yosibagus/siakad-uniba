<div class="content-inner pb-0 container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="header-title mb-4">
                <h4 class="card-title mb-0">Data Kurikulum</h4>
                <span>List Data Mata Kuliah Kurikulum</span>
            </div>
            <div class="text-center" id="loader">
                <div class="loading-layar">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
            <div class="table-responsive" style="display:none;" id="content-utama">
                <table id="tableKurikulum" class="display expandable-table table table-striped table-sm" style="width:100%">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th style="width: 10px">No</th>
                            <th>Nama Kurikulum</th>
                            <th>Program Studi</th>
                            <th>Masa Berlaku</th>
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

        $.ajax({
            url: '<?= base_url("core/data_kurikulum"); ?>',
            dataType: 'json',
            async: true,
            success: function(data) {
                $("#loader").fadeOut(1000, function() {
                    $("#loader").remove();
                    $("#content-utama").fadeIn(800);
                });
                $("#judul").html("SIAKAD - Data Kurikulum");
                $("#tableKurikulum").dataTable({
                    data: data,
                    columns: [{
                            'data': 'no',
                            'width': '10px'
                        },
                        {
                            'data': 'nama_kurikulum'
                        },
                        {
                            'data': 'nama_program_studi'
                        },
                        {
                            'data': 'semester_mulai_berlaku'
                        },
                    ]
                });
            }
        })


    });
</script>