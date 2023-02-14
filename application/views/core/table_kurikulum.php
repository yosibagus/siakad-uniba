<div class="card">
    <div class="card-body">
        <h4>Data Kurikulum</h4>

        <div class="table-responsive" style="display:none;" id="content-utama">
            <table id="myTable" class="display expandable-table table table-striped table-sm" style="width:100%">
                <thead>
                    <tr class="bg-primary text-white">
                        <th width="10">No</th>
                        <th>Nama Kurikulum</th>
                        <th>Program Studi</th>
                        <th>Masa Berlaku</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($kurikulum as $get) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td>
                                <a href="#kurikulum_detail?id=<?= $get['id_kurikulum'] ?>">
                                    <?= $get['nama_kurikulum']; ?>
                                </a>
                            </td>
                            <td><?= $get['nama_program_studi']; ?></td>
                            <td><?= $get['semester_mulai_berlaku']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>