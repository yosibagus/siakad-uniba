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
                        <label for="semester_krs">Semester KRS</label>
                        <input type="text" name="semester_krs" id="semester_krs" class="form-control">
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
            <button class="btn btn-primary">Simpan Setting</button>
        </div>
    </form>
</div>


<script>
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
        })
    })
</script>