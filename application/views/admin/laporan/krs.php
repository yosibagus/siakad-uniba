<div class="content-inner pb-0 container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between flex-wrap align-items-center">
            <div class="header-title">
                <h4 class="card-title mb-0">KRS Mahasiswa</h4>
                <span>Kartu Rencana Studi</span>
            </div>
            <div class="d-flex align-items-center gap-3">
            </div>
        </div>
        <hr>
        <div class="card-body pt-1">
            <div class="row">
                <div class="col-md-5">
                    <div class="alert alert-info" role="alert">
                        <i class="bi bi-info-circle-fill"></i> Isi NIM dan Periode KRS, Kemudian tampilkan dan Print
                    </div>



                    <div class="form-group">
                        <label for="nim">Nomor Induk Mahasiswa <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="NIM" name="nim" id="nim_mhs">
                        <input type="text" name="id_mhs" id="id_mhs" hidden>
                    </div>
                    <div class="form-group">
                        <label for="periode">Periode</label>
                        <select name="periode" id="periode" class="form-control form-ku"></select>
                    </div>

                    <button class="btn btn-primary" onclick="tampilKrs()">Tampilkan</button>
                    <button class="btn btn-warning">Reset</button>

                </div>
                <div class="col-md-7">
                    <div class="text-center" id="loader" style="display: none;">
                        <div class="loading-layar">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="card" id="content-utama" style="display: none; box-shadow: rgb(0 0 0 / 18%) 0px 0rem 1rem 0px;">
                        <div class="card-body">
                            <table style="color:#424242;" width="90%">
                                <tbody>
                                    <tr>
                                        <td class="item" width="25%">Nama</td>
                                        <td width="10">:</td>
                                        <td><span id="tmp-nama"></span></td>
                                        <td class="item">NIM</td>
                                        <td>:</td>
                                        <td><span id="tmp-nim"></span></td>
                                    </tr>
                                    <tr>
                                        <td class="item">Program Studi</td>
                                        <td>:</td>
                                        <td><span id="tmp-prodi"></span></td>
                                        <td class="item">Periode</td>
                                        <td>:</td>
                                        <td><span id="tmp-periode"></span></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="table-responsive">
                                <table class="table table-bordered mt-3">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Mata Kuliah</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>Bobot SKS</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tmp-krs"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function tampilKrs() {

        $("#loader").fadeIn(100);

        var nim = $("#id_mhs").val();
        var semester = $("#periode").val();

        $.ajax({
            type: "GET",
            url: "<?= base_url('core/data_laporan_krs') ?>",
            data: {
                nim: nim,
                semester: semester
            },
            dataType: "html",
            success: function(data) {
                $("#loader").fadeOut(1000, function() {
                    $("#loader").remove();
                    $("#content-utama").fadeIn(800);
                });
                $("#tmp-krs").html(data);

                $.ajax({
                    type: "GET",
                    url: "<?= base_url('core/detail_mahasiswa') ?>",
                    data: {
                        nim: nim
                    },
                    dataType: "json",
                    success: function(data) {
                        $("#tmp-nama").html(data.nama_mahasiswa);
                        $("#tmp-nim").html(data.nim);
                        $("#tmp-prodi").html(data.nama_program_studi);
                    }
                })
            }
        })
    }

    $(document).ready(function() {
        $('#periode').select2({
            placeholder: 'Pilih Periode KRS',
            allowClear: true
        });

        $.ajax({
            type: "GET",
            url: "<?= base_url('core/data_semester') ?>",
            dataType: "html",
            success: function(data) {
                $("#periode").html(data);
            }
        });

        $("#nim_mhs").autocomplete({
            source: "<?= base_url('core/autofill_mahasiswa?') ?>",
            select: function(event, ui) {
                // $('[name="nim_mhs"]').val(ui.item.label);
                $('[name="id_mhs"]').val(ui.item.nim);
                // console.log(ui.item.nim);

            }
        })

    })
</script>