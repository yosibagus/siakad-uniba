<style>
    .card-judul {
        font-weight: bold;
        color: black;
        font-size: 15px;
    }
</style>
<div class="content-inner container-fluid pb-0" id="page_layout">


    <div class="row">
        <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center flex-wrap align-middle" data-select2-id="select2-data-13-rktn">
                        <div class="d-flex flex-column align-middle">
                            <img src="<?= base_url('assets/dashboard.png') ?>" width="500" alt="">
                        </div>
                        <div class="d-flex justify-content-between align-items-center rounded flex-wrap" data-select2-id="select2-data-12-k20k">
                            <div class="table-responsive">
                                <h4 class="text-bold text-weight-bolder" style="color: rgb(96, 191, 220); text-shadow: rgb(0, 74, 206) 1px 2px 2px;">Sistem Informasi Akademik <br>Universitas Bahaudin Mudhary Madura</h3>
                                    <table style="font-size: 15px;">
                                        <tr>
                                            <td>Alamat</td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td>Jl. raya Lenteng No. 10, Desa Batuan, Kec. Batuan</td>
                                        </tr>
                                        <tr>
                                            <td>Telephone</td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                                            <td>(0328) 6771010</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                                            <td>admin@unibamadura.ac.id</td>
                                        </tr>
                                        <tr>
                                            <td>Website</td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                                            <td>https://unibamadura.ac.id</td>
                                        </tr>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 align-middle" data-select2-id="select2-data-13-rktn">
                        <div class="d-flex flex-column align-middle">
                            <span class="card-judul">Semester Aktif</span>
                            <span style="font-size:10px;">Tahun Ajaran</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center rounded flex-wrap gap-3" data-select2-id="select2-data-12-k20k">
                            <span class="card-judul" style="font-size: 20px"><i class="bi bi-check" style="color:green;"></i> 2023/2024 Ganjil</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 align-middle" data-select2-id="select2-data-13-rktn">
                        <div class="d-flex flex-column align-middle">
                            <span class="card-judul">Pengaturan Fitur</span>
                            <span style="font-size:10px;">Setting Main</span>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm mt-1 mb-0" style="font-size: 12px;">
                            <tr>
                                <td>Batas SKS</td>
                                <td>24</td>
                            </tr>
                            <tr>
                                <td>Perhitungan</td>
                                <td>Nilai Tertinggi</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td><i class="bi bi-check-circle-fill" style="color:green"></i> Aktif</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 align-middle" data-select2-id="select2-data-13-rktn">
                        <div class="d-flex flex-column align-middle">
                            <span class="card-judul">Mahasiswa</span>
                            <span style="font-size:10px;">Total Keseluruhan</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center rounded flex-wrap gap-3" data-select2-id="select2-data-12-k20k">
                            <span class="card-judul" style="font-size: 30px"><?= $total_mahasiswa ?></span>
                        </div>
                    </div>
                    <div class="jumlah-mhs-jurusan mt-4">

                    </div>
                </div>
                <div class="card-footer pb-2 pt-2 text-center" onclick="linkmhs()" style="box-shadow: 1px 0px 3px 1px rgb(55 55 55 / 13%); cursor:pointer">
                    <span class="text-primary">Lihat Selengkapnya &raquo;</span>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-md-12">
            <div class="alert alert-top alert-info alert-dismissible fade show mb-3" role="alert">
                <strong>Halo Admin!</strong> Selamat datang di pusat data Sistem Informasi Akademik Universitas Bahaudin Mudhary Madura.
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 align-middle" data-select2-id="select2-data-13-rktn">
                                <div class="d-flex flex-column align-middle">
                                    <span class="card-judul">Kondisi Dosen</span>
                                    <span style="font-size:10px;">Prosentase Dosen</span>
                                </div>
                            </div>

                            <table width="90%" class="mt-5">
                                <tr>
                                    <th width="30%" class="text-center" style="font-size: 50px; color:black"><span id="nidn"></span></th>
                                    <th>
                                        <div class="d-flex" style="height: 100px;">
                                            <div class="vr"></div>
                                        </div>
                                    </th>
                                    <th width="30%" class="text-center" style="font-size: 50px;color:black"><span id="no_nidn"></span></th>
                                    <th>
                                        <div class="d-flex" style="height: 100px;">
                                            <div class="vr"></div>
                                        </div>
                                    </th>
                                    <th width="30%" class="text-center" style="font-size: 50px;color:black"><span id="total_dosen"></span></th>
                                </tr>
                                <tr>
                                    <th class="text-center"><i class="bi bi-bookmark-fill" style="color: rgba(54, 162, 235, 0.2)"></i> NIDN</th>
                                    <th class="text-center"></th>
                                    <th class="text-center"><i class="bi bi-bookmark-fill" style="color: rgba(255, 159, 64, 0.2)"></i> NO NIDN</th>
                                    <th class="text-center"></th>
                                    <th class="text-center">Total</th>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card-footer pb-2 pt-2 text-center" onclick="linkmhs()" style="box-shadow: 1px 0px 3px 1px rgb(55 55 55 / 13%); cursor:pointer">
                    <span class="text-primary">Lihat Selengkapnya &raquo;</span>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 align-middle" data-select2-id="select2-data-13-rktn">
                        <div class="d-flex flex-column align-middle">
                            <span class="card-judul">Info Login</span>
                            <span style="font-size:10px;"><?= $this->session->userdata('nama_akun') ?></span>
                        </div>
                        <hr class="mb-0 mt-0" style="width: 100%;">

                        <div class="d-flex flex-column align-middle">
                            <span class="card-judul" style="font-size: 13px;">Username</span>
                            <span style="font-size:10px;" id="username_akun"></span>
                        </div>
                        <hr class="mb-0 mt-0" style="width: 100%;">

                        <div class="d-flex flex-column align-middle">
                            <span class="card-judul" style="font-size: 13px;">Email</span>
                            <span style="font-size:10px;" id="email_akun"></span>
                        </div>
                        <hr class="mb-0 mt-0" style="width: 100%;">

                        <div class="d-flex flex-column align-middle">
                            <span class="card-judul" style="font-size: 13px;">Last Login</span>
                            <span style="font-size:10px;" id="last_login"></span>
                        </div>
                        <hr class="mb-0 mt-0" style="width: 100%;">

                        <div class="d-flex flex-column align-middle">
                            <span class="card-judul" style="font-size: 13px;">Role Akses</span>
                            <span style="font-size:10px;" id="role"></span>
                        </div>
                        <hr class="mb-0 mt-0" style="width: 100%;">

                        <div class="d-flex flex-column align-middle">
                            <span class="card-judul" style="font-size: 13px;">Browser</span>
                            <span style="font-size:10px;" id="browser"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function linkmhs() {
        window.location.href = "<?= base_url('#/mahasiswa') ?>"
    }
    new Chart(document.getElementById("myChart"), {
        type: 'pie',
        data: {
            labels: ['NIDN', 'NO NIDN'],
            datasets: [{
                    label: "IPS",
                    backgroundColor: ['rgba(255, 159, 64, 0.2)', 'rgba(54, 162, 235, 0.2)'],
                    borderColor: ['rgba(255, 159, 64, 0.2)', 'rgba(54, 162, 235, 0.2)'],
                    borderWidth: 2,
                    data: ['10', '20'],
                    fill: false,
                    pointStyle: 'circle',
                    pointRadius: 10,
                    pointHoverRadius: 15
                },

            ]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: false
            }
        }
    });
</script>

<script>
    $(document).ready(function() {
        $("#judul").html("SIAKAD - Home");

        var id = "<?= $this->session->userdata('id_operator') ?>";

        $.ajax({
            type: "GET",
            url: "<?= base_url('core/info_login') ?>",
            dataType: "json",
            data: {
                id: id
            },
            success: function(data) {
                console.log(data);
                $("#last_login").html('<i class="bi bi-alarm"></i> ' + data.last_login);
                $("#role").html('<i class="bi bi-gear"></i> ' + data.role);
                $("#username_akun").html('<i class="bi bi-person"></i> ' + data.username_akun);
                $("#email_akun").html('<i class="bi bi-envelope-at"></i> ' + data.email_akun);

                let logo;
                if (data.browser == 'Chrome') {
                    logo = '<i class="bi bi-browser-chrome"></i> ';
                } else if (data.browser == 'Firefox') {
                    logo = '<i class="bi bi-browser-firefox"></i> ';
                } else {
                    logo = '<i class="bi bi-globe"></i> ';
                }

                $("#browser").html(logo + data.browser + " / " + data.ip);
            }
        });

        $.ajax({
            type: "GET",
            url: "<?= base_url('core/jumlah_mhs') ?>",
            dataType: "html",
            success: function(data) {
                $(".jumlah-mhs-jurusan").html(data);
            }
        });

        $.ajax({
            type: "GET",
            url: "<?= base_url('core/jumlah_dosen') ?>",
            dataType: "json",
            success: function(data) {
                $("#nidn").html(data.nidn);
                $("#no_nidn").html(data.no_nidn);
                $("#total_dosen").html(data.total);
            }
        })
    });
</script>