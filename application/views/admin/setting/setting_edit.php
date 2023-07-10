<div class="content-inner pb-0 container-fluid">
    <form class="card mb-2" id="form-setting" method="POST">
        <div class="card-body">
            <h5 class="card-title">Setting Global</h5>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="semester_berlaku_aktif">Semester Berlaku Aktif</label>
                        <select name="id_semester" id="id_semester" class="form-control"></select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="batas_sks_krs">Batas SKS KRS</label>
                        <input type="text" name="batas_sks_krs" id="batas_sks_krs" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="perhitungan">Perhitungan Matakuliah Mengulang</label>
                        <select name="perhitungan" id="perhitungan" class="form-control">
                            <option value=""></option>
                            <option value="0">Tertinggi</option>
                            <option value="1">Terbaru</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary btn-sm" onclick="simpanSetting()">Simpan Setting</button>
            <a href="<?= base_url('#/global_setting') ?>" class="btn btn-danger btn-sm">Kembali</a>
        </div>
    </form>
</div>
<script>
    function simpanSetting() {
        var id_semester = $("#id_semester").val();
        var batas_sks_krs = $("#batas_sks_krs").val();
        var perhitungan = $("#perhitungan").val();

        $.ajax({
            type: "POST",
            data: {
                id_semester: id_semester,
                batas_sks_krs: batas_sks_krs,
                perhitungan: perhitungan
            },
            url: "<?= base_url('core/update_setting') ?>",
            success: function() {
                $.toast({
                    heading: 'Success',
                    text: 'Setting Berhasil Diubah',
                    showHideTransition: 'slide',
                    icon: 'success',
                    position: 'top-right'
                });
                window.location.href = "<?= base_url('#/global_setting') ?>";
            }
        })
    }

    $(document).ready(function() {

        $('#id_semester').select2({
            placeholder: 'Pilih Semester',
            allowClear: true
        });

        $('#perhitungan').select2({
            placeholder: 'Pilih Perhitungan',
            allowClear: true
        });

        $.ajax({
            type: "GET",
            url: "<?= base_url('core/data_pilih_semester') ?>",
            dataType: "html",
            success: function(data) {
                $("#id_semester").html(data);
            }
        });
    })
</script>