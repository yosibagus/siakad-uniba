<div class="content-inner pb-0 container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex bd-highlight mb-3">
                <div class="flex-grow-1 bd-highlight">
                    <h5 class="card-title mb-0">Ubah Status Mahasiswa </h5>
                    <span>Program Studi <?= $prodi['nama_program_studi'] ?></span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th width="10">No</th>
                            <th class="text-center">Periode Masuk</th>
                            <th class="text-center">Jumlah Mahasiswa</th>
                            <th class="text-center">Set Non Aktif</th>
                        </tr>
                    </thead>
                    <tbody id="tmp-set-mhs"></tbody>
                </table>

                <button class="btn btn-primary btn-sm">Simpan</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        var id = "<?= $id_prodi ?>";

        setMhsJurusan();

        console.log(id);

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
    })
</script>