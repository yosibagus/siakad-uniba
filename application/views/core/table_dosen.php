<?php $i = 1;
foreach ($dosen as $get) : ?>
    <tr>
        <td><?= $i++; ?></td>
        <td><?= $get['nama_dosen']; ?></td>
        <td><?= $get['nidn']; ?></td>
        <td><?= $get['jenis_kelamin'] == 'L' ? 'Laki-Laki' : 'Perempuan'; ?></td>
        <td><?= $get['nama_agama']; ?></td>
        <td><?= $get['tanggal_lahir']; ?></td>
        <td><?= $get['status']; ?></td>
    </tr>
<?php endforeach; ?>