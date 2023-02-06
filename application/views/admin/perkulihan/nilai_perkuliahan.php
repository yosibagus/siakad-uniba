<div id="kelas-perkuliahan">
    <div class="iq-navbar-header" style="height: 215px;">
        <div class="container-fluid iq-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-wrap d-flex justify-content-between align-items-center">
                        <div>
                            <h1>Nilai Perkuliahan</h1>
                            <p>Fitur ini di gunakan untuk menyimpan jadwal perkuliahan yang di bukaserta peserta kelas setiap periode</p>
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
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <table id="table-nilai" class="display expandable-table table table-striped table-sm" style="width:100%">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th width="10">No</th>
                                        <th>Semester</th>
                                        <th>Kode MK</th>
                                        <th>Mata Kuliah</th>
                                        <th>Nama Kelas</th>
                                        <th>Bobot MK</th>
                                        <th>Peserta</th>
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
    $(document).ready(function() {
        $('#table-nilai').DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "order": [],
            "fixedHeader": true,
            "lengthMenu": [
                [20, 50, 100, -1],
                [20, 50, 100, "All"]
            ],
            "ajax": {
                "url": "<?= base_url('core/data_nilai_perkuliahan') ?>",
                "type": "post"
            },
            "columDefs": [{
                "target": [-1],
                "orderable": false
            }]
        });
    });
</script>