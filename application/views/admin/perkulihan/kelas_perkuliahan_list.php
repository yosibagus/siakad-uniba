<div id="kelas-perkuliahan">
    <div class="iq-navbar-header" style="height: 215px;">
        <div class="container-fluid iq-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-wrap d-flex justify-content-between align-items-center">
                        <div>
                            <h1>Kelas Perkuliahan</h1>
                            <p>Fitur ini di gunakan untuk menyimpan jadwal perkuliahan yang di bukaserta peserta kelas setiap periode</p>
                        </div>
                        <div>
                            <a href="#kelas_perkuliahan_tambah" class="btn btn-link btn-soft-light">

                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4" d="M19.9927 18.9534H14.2984C13.7429 18.9534 13.291 19.4124 13.291 19.9767C13.291 20.5422 13.7429 21.0001 14.2984 21.0001H19.9927C20.5483 21.0001 21.0001 20.5422 21.0001 19.9767C21.0001 19.4124 20.5483 18.9534 19.9927 18.9534Z" fill="currentColor"></path>
                                    <path d="M10.309 6.90385L15.7049 11.2639C15.835 11.3682 15.8573 11.5596 15.7557 11.6929L9.35874 20.0282C8.95662 20.5431 8.36402 20.8344 7.72908 20.8452L4.23696 20.8882C4.05071 20.8903 3.88775 20.7613 3.84542 20.5764L3.05175 17.1258C2.91419 16.4915 3.05175 15.8358 3.45388 15.3306L9.88256 6.95545C9.98627 6.82108 10.1778 6.79743 10.309 6.90385Z" fill="currentColor"></path>
                                    <path opacity="0.4" d="M18.1208 8.66544L17.0806 9.96401C16.9758 10.0962 16.7874 10.1177 16.6573 10.0124C15.3927 8.98901 12.1545 6.36285 11.2561 5.63509C11.1249 5.52759 11.1069 5.33625 11.2127 5.20295L12.2159 3.95706C13.126 2.78534 14.7133 2.67784 15.9938 3.69906L17.4647 4.87078C18.0679 5.34377 18.47 5.96726 18.6076 6.62299C18.7663 7.3443 18.597 8.0527 18.1208 8.66544Z" fill="currentColor"></path>
                                </svg>

                                Tambah Kelas
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="iq-header-img">
            <img src="<?= base_url('assets/admin/') ?>assets/images/dashboard/top-header.png" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
            <img src="<?= base_url('assets/admin/') ?>assets/images/dashboard/top-header1.png" alt="header" class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
            <img src="<?= base_url('assets/admin/') ?>assets/images/dashboard/top-header2.png" alt="header" class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
            <img src="<?= base_url('assets/admin/') ?>assets/images/dashboard/top-header3.png" alt="header" class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
            <img src="<?= base_url('assets/admin/') ?>assets/images/dashboard/top-header4.png" alt="header" class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
            <img src="<?= base_url('assets/admin/') ?>assets/images/dashboard/top-header5.png" alt="header" class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
        </div>
    </div>

    <div class="content-inner pb-0 container-fluid" style=" margin-top:-70px">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                        <div class="d-flex bd-highlight">
                            <div class="flex-grow-1 bd-highlight">
                                <div class="header-title mb-4">
                                    Filter Semester : <?= $aktif['nama_semester'] ?>
                                </div>
                            </div>
                            <div class="bd-highlight">
                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="bi bi-filter"></i> Filter Perkuliahan
                                </button>
                            </div>
                        </div>
                        <div class="modal modal-lg fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-table"></i> Filter Perkuliahan List</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="id_semester">Pilih Semester</label>
                                            <select name="id_semester" id="id_semester" class="form-control"></select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Batal</button>
                                        <a type="button" onclick="btnFilter()" class="btn btn-primary"><i class="bi bi-filter"></i> Terapkan Filter</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-0 pt-0">
                        <div class="table-responsive">
                            <table id="table-perkuliahan" class="display expandable-table table table-striped table-sm" style="width:100%">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th width="10">No</th>
                                        <th>Semester</th>
                                        <th>Kode MK</th>
                                        <th>Mata Kuliah</th>
                                        <th>Nama Kelas</th>
                                        <th>Kuota</th>
                                        <th>Peserta</th>
                                        <th>Dosen</th>
                                        <th>Ruangan</th>
                                        <th>Jadwal</th>
                                        <!-- <th>Kuota</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function btnFilter() {
        var id = $("#id_semester").val();
        window.location.href = "<?= base_url('#/kelas_perkuliahan/') ?>" + id;
        location.reload();
    }

    $(document).ready(function() {
        $("#judul").html("SIAKAD - Kelas Perkuliahan");
        $('#table-perkuliahan').DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "order": [],
            "fixedHeader": true,
            "lengthMenu": [
                [25, 50, 100, -1],
                [25, 50, 100, "All"]
            ],
            "ajax": {
                "url": "<?= base_url('core/data_perkuliahan/') . $semester ?>",
                "type": "post"
            },
            "columDefs": [{
                "target": [-1],
                "orderable": false
            }]
        });

        $.ajax({
            type: "GET",
            url: "<?= base_url('core/data_pilih_semester') ?>",
            dataType: "html",
            success: function(data) {
                $("#id_semester").html(data);
            }
        })
    });
</script>