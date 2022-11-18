    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
    <div class="card mb-2">
        <div class="card-body">
            <p class="card-title">Kurikulum Kuliah</p>
            <div class="row">
                <div class="col-md-6 mb-2">
                    <div class="">
                        <label for="">Nama Kurikulum</label>
                        <input type="text" disabled class="form-control form-control-sm" value="<?= $detail['nama_kurikulum'] ?>">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <label for="">Jumlah Bobot Mata Kuliah Pilihan</label>
                    <input type="text" disabled class="form-control form-control-sm" value="<?= $detail['jumlah_sks_pilihan'] ?>">
                </div>
                <div class="col-md-6 mb-2">
                    <div class="">
                        <label for="">Program Studi</label>
                        <input type="text" disabled class="form-control form-control-sm" value="<?= $detail['nama_program_studi'] ?>">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <label for="">Mulai Berlaku</label>
                    <input type="text" disabled class="form-control form-control-sm" value="<?= $detail['semester_mulai_berlaku'] ?>">
                </div>
                <div class="col-md-6 mb-2">
                    <div class="">
                        <label for="">Jumlah SKS</label>
                        <input type="text" disabled class="form-control form-control-sm" value="<?= $detail['jumlah_sks_lulus'] ?>">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <label for="">Bobot SKS Wajib</label>
                    <input type="text" disabled class="form-control form-control-sm" value="<?= $detail['jumlah_sks_wajib'] ?>">
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h4>Data Mata Kuliah</h4>
            <div class="table-responsive">
                <table id="" class="display expandable-table table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <!-- <th width="10"></th> -->
                            <th width="10">No</th>
                            <th>Kode Mata Kuliah</th>
                            <th>Nama Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Semester</th>
                            <th width="10">Wajib?</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($matkul as $get) : ?>
                            <tr>
                                <!-- <th>
                                <a href="#kurikulum_detail?id=<?= $get['id_matkul'] ?>" class="badge badge-primary">Detail</a>
                            </th> -->
                                <td><?= $i++; ?></td>
                                <td><?= $get['kode_mata_kuliah']; ?></td>
                                <td><?= $get['nama_mata_kuliah']; ?></td>
                                <td><?= $get['sks_mata_kuliah'] ?></td>
                                <td><?= $get['semester']; ?></td>
                                <td>
                                    <?php if ($get['apakah_wajib'] == 1) : ?>
                                        <a href=""><i class="bi bi-check-lg"></i></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).on('click', '.tampil', function() {
            var id = $(this).attr('id-tampil');
            console.log(id);
        });
    </script>