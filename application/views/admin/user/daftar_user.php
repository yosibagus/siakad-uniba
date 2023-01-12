<div id="daftaruser-list" class="content-inner pb-0 container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between flex-wrap align-items-center">
            <div class="header-title">
                <h4 class="card-title mb-0">Daftar User</h4>
            </div>
            <div class="d-flex align-items-center gap-3">
                <a href="#/daftar_user_tambah" class="text-center btn btn-primary d-flex gap-2" data-bs-toggle="modal" data-bs-target="#new-permission">
                    <svg width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="table-daftar-user">
                    <thead>
                        <tr>
                            <th width="10">#</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Hint</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody id="tmp-user"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#table-daftar-user').DataTable({
            // "responsive": true,
            "processing": true,
            "serverSide": true,
            "order": [],
            // "fixedHeader": true,
            "ajax": {
                "url": "<?= base_url('core/data_user') ?>",
                "type": "post"
            },
            "columDefs": [{
                "target": [-1],
                "orderable": false
            }]
        });

    })
</script>