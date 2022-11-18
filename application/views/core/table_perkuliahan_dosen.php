<?php $i = 1;
foreach ($dosen as $get) : ?>
    <tr class="text-center">
        <td><?= $i++; ?></td>
        <td><?= $get['nidn']; ?></td>
        <td><?= $get['nama_dosen']; ?></td>
        <td><?= $get['bobot_sks']; ?></td>
        <td><?= $get['jumlah_rencana_pertemuan']; ?></td>
        <td><?= $get['jumlah_rencana_pertemuan']; ?></td>
        <td><?= $get['jenis_evaluasi']; ?></td>
        <td></td>
    </tr>
<?php endforeach; ?>