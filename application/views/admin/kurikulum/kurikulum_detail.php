<div style="position: absolute; left:50%; top:50%;">
    <img id="loading" width="100" src="<?= base_url('assets/loading2.gif') ?>" alt="">
</div>


<div id="tmp-detail" class="content-inner pb-0 container-fluid" style="display: none;">

</div>

<script>
    $(document).ready(function() {
        $("#loading").fadeOut(800);
        $("#tmp-detail").fadeIn(800);

        tampil_data();

        $('#myTable').DataTable();

        function tampil_data() {
            $.ajax({
                url: '<?= base_url("core/detail_kurikulum/") . $id; ?>',
                async: false,
                dataType: 'html',
                success: function(data) {
                    $("#tmp-detail").html(data);
                }
            })
        }

    });
</script>