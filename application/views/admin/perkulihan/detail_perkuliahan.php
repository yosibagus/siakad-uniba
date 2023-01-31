<!-- <div style="position: relative; left:50%; right:50%;">
    <img id="loading" width="100" src="<?= base_url('assets/loading2.gif') ?>" alt="">
</div> -->

<style>
    .loading-layar {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
    }

    .loading-layar div {
        display: inline-block;
        position: absolute;
        left: 8px;
        width: 16px;
        background: #3a57e8;
        animation: loading-layar 1.2s cubic-bezier(0, 0.5, 0.5, 1) infinite;
    }

    .loading-layar div:nth-child(1) {
        left: 8px;
        animation-delay: -0.24s;
    }

    .loading-layar div:nth-child(2) {
        left: 32px;
        animation-delay: -0.12s;
    }

    .loading-layar div:nth-child(3) {
        left: 56px;
        animation-delay: 0;
    }

    @keyframes loading-layar {
        0% {
            top: 8px;
            height: 64px;
        }

        50%,
        100% {
            top: 24px;
            height: 32px;
        }
    }
</style>

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
            $.ajax({
                type: "GET",
                url: '<?= base_url("core/perkuliahan_kelas_detail?token=") . $_GET['token']; ?>',
                dataType: 'html',
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