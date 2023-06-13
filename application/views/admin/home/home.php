<style>
    .card-judul {
        font-weight: bold;
        color: black;
        font-size: 15px;
    }
</style>
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4 gap-3" data-select2-id="select2-data-13-rktn">
        <div class="d-flex flex-column">
            <h3>Dashboard</h3>
            <p class="text-primary mb-0">Ruang Admin</p>
        </div>
        <div class="d-flex justify-content-between align-items-center rounded flex-wrap gap-3" data-select2-id="select2-data-12-k20k">
            Semester Aktif : 2022/2023 Genap
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
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
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    Selamat Datang
                </div>
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
                console.log(data);
                $("#nidn").html(data.nidn);
                $("#no_nidn").html(data.no_nidn);
                $("#total_dosen").html(data.total);
            }
        })
    });
</script>