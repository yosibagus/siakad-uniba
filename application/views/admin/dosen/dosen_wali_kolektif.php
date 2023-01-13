<div class="content-inner pb-0 container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between flex-wrap align-items-center">
            <div class="header-title">
                <h4 class="card-title mb-0" id="nama_dosen"></h4>
                <div>
                    <span id="semester"></span>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-info btn-sm wi-50 text-white"><i class="bi bi-check-lg"></i> Simpan</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive" id="form-select">
                <table class="table table-hover table-bordered table-sm">
                    <tr>
                        <td width="30%">Program Studi</td>
                        <td>
                            <select name="prodi" id="prodi" class="form-control" style="width: 100%;">
                                <option value=""></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Angkatan</td>
                        <td>
                            <select name="angkatan" id="angkatan" class="form-control" style="width: 100%;">
                                <option value=""></option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="table-responsive">
                <table id="" class="display expandable-table table table-striped table-sm dataTable no-footer">
                    <thead>
                        <tr>
                            <th width="10">No.</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Angkatan</th>
                        </tr>
                    </thead>
                    <tbody id="tmp-dosen-wali"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        var token = "<?= $_GET['token'] ?>"

        $.ajax({
            type: "GET",
            url: "<?= base_url('core/getDetailWaliKolektif') ?>",
            data: {
                token: token
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                $("#nama_dosen").html(data.nama_dosen)
                $("#semester").html(data.semester_krs)
            }
        })

    })
</script>