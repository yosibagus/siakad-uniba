<div id="tmp-mahasiswa" class="content-inner pb-0 container-fluid">

    <div class="card">
        <div class="card-body">
            <h4>Data Mahasiswa</h4>
            <div class="table-responsive">
                <table id="tableMahasiswa" class="display expandable-table table table-striped table-sm" style="width:100%">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th width="10">No</th>
                            <th data-priority="1">Nama</th>
                            <th>NPM</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Tanggal Lahir</th>
                            <th>Jurusan</th>
                            <th>Angkatan</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#judul").html("SIAKAD - Mahasiswa");
        $('#tableMahasiswa').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "lengthMenu": [
                [20, 50, 100, -1],
                [20, 50, 100, "All"]
            ],
            "ajax": {
                "url": "<?= base_url('core/data_mahasiswa') ?>",
                "type": "post"
            },
            "columDefs": [{
                "target": [-1],
                "orderable": false
            }]
        });
    });
</script>