<div class="content-inner pb-0 container-fluid" id="halaman-dosen" style="display: none;">
    <div class="card">
        <div class="card-body">
            <div class="d-flex bd-highlight mb-3">
                <div class="flex-grow-1 bd-highlight">
                    <h4 class="card-title mb-0">Data Dosen</h4>
                    List Data Dosen Internal
                </div>
                <div class="bd-highlight">
                    <a href="#dosen_tambah" class="btn btn-primary btn-sm wi-50 text-white"><i class="bi bi-plus"></i> Tambah</a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="tableDosen" class="display expandable-table table table-striped table-sm" style="width:100%">
                    <thead>
                        <tr class="text-white bg-primary">
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

        $('#tableDosen').DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "order": [],
            "lengthMenu": [
                [20, 50, 100, -1],
                [20, 50, 100, "All"]
            ],
            // "fixedHeader": true,
            "ajax": {
                "url": "<?= base_url('core/data_dosen') ?>",
                "type": "post"
            },
            "columDefs": [{
                "target": [-1],
                "orderable": false
            }]
        });

        $(document).on('click', '.hapus-dosen', function() {
            var id = $(this).attr('id');
            Swal.fire({
                title: 'Pemberitahuan!',
                text: "Yakin data akan dihapus permanen?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
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
                            $('#myTable').DataTable();
                        },
                        error: function(response) {
                            console.log(response.responseText);
                        }
                    })
                }
            })
        })

    });
</script>