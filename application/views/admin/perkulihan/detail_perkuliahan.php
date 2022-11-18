<!-- <div style="position: absolute; left:50%; top:50%;">
    <img id="loading" width="100" src="<?= base_url('assets/loading2.gif') ?>" alt="">
</div> -->

<div id="tmp-perkuliahan_kelas_detail" class="content-inner pb-0 container-fluid" style="display: none;">

</div>

<script>
    $(document).ready(function() {
        // $("#loading").fadeOut(800);
        $("#tmp-perkuliahan_kelas_detail").fadeIn(800);
        tampil_data();

        // $('#myTable').DataTable();

        function tampil_data() {
            $.ajax({
                url: '<?= base_url("core/perkuliahan_kelas_detail?token=") . $_GET['token']; ?>',
                async: false,
                dataType: 'html',
                success: function(data) {
                    $("#tmp-perkuliahan_kelas_detail").html(data);
                }
            })
        }

    });

    $(document).ready(function() {
        $('#id_prodi').select2({
            placeholder: 'Pilih Program Studi',
            allowClear: true
        });
        $('#id_matkul').select2({
            placeholder: 'Pilih Mata Kuliah',
            allowClear: true
        });
        $('#id_gedung').select2({
            placeholder: 'Pilih Gedung',
            allowClear: true
        });
        $('#id_ruangan').select2({
            placeholder: 'Pilih Ruangan',
            allowClear: true
        });

        $('#id_dosen').select2({
            placeholder: 'Pilih Dosen',
            allowClear: true
        });
        $('#jenis_evaluasi').select2({
            placeholder: 'Pilih Jenis Evaluasi',
            allowClear: true
        });
    });
</script>