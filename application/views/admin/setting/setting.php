<div id="ruangan-list" class="content-inner pb-0 container-fluid">
    <form class="card mb-2" id="form-setting" method="POST">
        <div class="card-body">
            <h5 class="card-title">Setting Global</h5>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="semester_berlaku_aktif">Semester Berlaku Aktif</label>
                        <input type="text" name="semester_berlaku_aktif" id="semester_berlaku_aktif" class="form-control">
                        </>
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
            </div>
            <button class="btn btn-primary">Simpan Setting</button>
        </div>
    </form>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <th width="10">No</th>
                        <th>Semester Berlaku Aktif</th>
                        <th>Semester KRS</th>
                        <th>Batas SKS KRS</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#form-setting").on('submit', function(e) {
            e.preventDefault();
            var data = $('#form-setting').serialize();
            $.ajax({
                type: 'POST',
                url: "<?= base_url('core/data_setting_tambah') ?>",
                data: data,
                dataType: 'json',
                success: function(data) {
                    //console.log(data);
                    $.toast({
                        heading: 'Success',
                        text: 'Data Berhasil Ditambahkan',
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'top-right'
                    })

                }
            });
        })
    })
</script>