<div class="row justify-content-center">
    <div class="col-md-2">
        <div class="loading-layar">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>

<div id="tmp-perkuliahan_kelas_detail" class="content-inner pb-0 container-fluid" style="display: none;">

</div>

<script>
    $(document).ready(function() {
        // $("#loading").fadeOut(800);
        // $("#tmp-perkuliahan_kelas_detail").fadeIn(800);

        tampil_data();

        function tampil_data() {
            var token = "<?= $token ?>";
            $.ajax({
                type: "GET",
                url: '<?= base_url("core/perkuliahan_kelas_detail"); ?>',
                dataType: 'html',
                data: {
                    token: token
                },
                success: function(data) {
                    $(".loading-layar").fadeOut(1000, function() {
                        $(".loading-layar").remove();
                        $("#tmp-perkuliahan_kelas_detail").fadeIn(500);
                    });
                    $("#tmp-perkuliahan_kelas_detail").html(data);
                }
            })
        }

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
    });
</script>