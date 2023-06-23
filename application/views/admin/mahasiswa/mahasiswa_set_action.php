<div class="content-inner pb-0 container-fluid">
    <form method="POST" action="" class="card" id="form-update-status">
        <div class="card-body">
            <div class="d-flex bd-highlight mb-4">
                <div class="flex-grow-1 bd-highlight">
                    <h5 class="card-title mb-0">Ubah Status Mahasiswa </h5>
                    <span>Program Studi <?= $prodi['nama_program_studi'] ?></span>
                </div>
                <div class="p-2 bd-highlight">
                    <button type="submit" class="btn btn-info btn-sm wi-50 text-white"><i class="bi bi-check-lg"></i> Simpan</button>
                </div>
                <div class="p-2 bd-highlight">
                    <a href="#/set_mahasiswa" class="btn btn-success btn-sm wi-50 text-white"><i class="bi bi-list-ul"></i> Daftar</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th width="10">No</th>
                            <th class="text-center">Periode Masuk</th>
                            <th class="text-center">Jumlah Mahasiswa</th>
                            <th class="text-center">Belum di Set</th>
                            <th class="text-center">Set Non Aktif</th>
                        </tr>
                    </thead>
                    <tbody id="tmp-set-mhs"></tbody>
                </table>
            </div>
        </div>
    </form>
</div>


<script>
    $(document).ready(function() {

        var id = "<?= $id_prodi ?>";

        setMhsJurusan();

        function setMhsJurusan() {
            $.ajax({
                type: "GET",
                url: "<?= base_url('core/set_mhs_prodi') ?>",
                data: {
                    id: id
                },
                dataType: "html",
                success: function(data) {
                    $("#tmp-set-mhs").html(data);
                }
            })
        }

        $("#form-update-status").on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "<?= base_url('core/update_status_mahasiswa/') ?>" + id,
                data: $(this).serialize(),
                dataType: "json",
                success: function(data) {
                    $.toast({
                        heading: 'Success',
                        text: 'Proses berhasil di jalankan',
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'top-right'
                    });

                    window.location.href = "<?= base_url('#/set_mahasiswa') ?>"
                }
            });
        })

    })
</script>