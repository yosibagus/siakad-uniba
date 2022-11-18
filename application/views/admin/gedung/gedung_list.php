<div style="position: absolute; left:50%; top:50%;">
    <img id="loading" width="100" src="<?= base_url('assets/loading2.gif') ?>" alt="">
</div>

<div id="tmp-gedung" class="content-inner pb-0 container-fluid" style="display: none;">

</div>

<script>
    $(document).ready(function() {

        $("#loading").fadeOut(800);
        $("#tmp-gedung").fadeIn(800);

        tampil_data();

        $('#myTable').DataTable({
            responsive: true
        });

        function tampil_data() {
            $.ajax({
                url: '<?= base_url("core/data_gedung"); ?>',
                async: false,
                dataType: 'html',
                success: function(data) {
                    $("#tmp-gedung").html(data);
                }
            })
        }

    });
</script>