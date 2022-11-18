<div class="card">
    <div class="card-body">
        <div class="d-flex bd-highlight mb-3">
            <div class="flex-grow-1 bd-highlight">
                <h4 class="mb-0 mt-2">Data Gedung</h4>
            </div>
            <div class="bd-highlight">
                <a href="#" class="btn btn-info btn-sm wi-50 text-white"><i class="bi bi-plus"></i> Tambah</a>
            </div>
        </div>
        <div class="table-responsive">
            <table id="myTable" class="display expandable-table table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th width="10">No</th>
                        <th>Nama Gedung</th>
                        <th>Fakultas</th>
                        <th>Jumlah Ruangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($gedung as $get) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td>
                                <a href="#ruangan?id=<?= $get['id_gedung'] ?>">
                                    <?= $get['nama_gedung']; ?> <br>
                                </a>
                            </td>
                            <td><?= $get['nama_panjang'] ?></td>
                            <td>
                                <?= $this->db->get_where('master_ruangan', ['id_gedung' => $get['id_gedung']])->num_rows(); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>