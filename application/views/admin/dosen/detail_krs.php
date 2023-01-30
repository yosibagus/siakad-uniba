<div class="content-inner pb-0 container-fluid">
    <form method="post" action="" id="form-validasi-krs" class="card">
        <div class="card-header d-flex justify-content-between flex-wrap align-items-center">
            <div class="header-title">
                <h4 class="card-title mb-0">Detail Kartu Rencana Studi</h4>
                <span id="d-nama-mahasiswa"></span>
            </div>
            <div class="d-flex align-items-center gap-3">
                <label for="cekallkrs" style="cursor: pointer;">Ceklist All</label>
                <input type="checkbox" id="cekallkrs" style="padding:8px;" class="form-check-input">
                <button type="submit" class="text-center btn btn-primary btn-sm">
                    <i class="bi bi-check2-all"></i>
                    Validasi KRS
                </button>
                <a href="<?= base_url('#/validasi_krs') ?>" class="text-center btn btn-info btn-sm">
                    <i class="bi bi-list"></i>
                    Daftar
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive" id="tmp-krs-detail">

            </div>
        </div>
    </form>
</div>


<script>
    $("#cekallkrs").click(function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    $(document).ready(function() {

        var nim = "<?= $_GET['as'] ?>";

        $.ajax({
            type: "GET",
            url: "<?= base_url('core/detail_info_mhs') ?>",
            data: {
                nim: nim
            },
            dataType: "json",
            success: function(data) {
                // console.log(data);
                $("#d-nama-mahasiswa").html(data.nim + " - " + data.nama_mahasiswa);
            }
        });

        getData();

        function getData() {
            $.ajax({
                type: "GET",
                url: "<?= base_url('core/detail_krs_mahasiswa') ?>",
                async: false,
                data: {
                    nim: nim
                },
                dataType: "html",
                success: function(data) {
                    // console.log(data);
                    $("#tmp-krs-detail").html(data);
                }
            });
        }

        $("#form-validasi-krs").on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "<?= base_url('core/validasi_krs') ?>",
                data: $(this).serialize(),
                success: function(data) {
                    console.log(data);
                    $.toast({
                        heading: 'Success',
                        text: 'Dosen berhasil divalidasi',
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'top-right'
                    });

                    getData();

                    // window.location.href = '<?= base_url('#/data_krs') ?>';
                }
            });
        })

    })
</script>