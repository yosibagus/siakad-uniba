<?php $i = 1;
foreach ($prodi as $get) : ?>
    <tr>
        <td><?= $i++; ?></td>
        <td><?= $get['kode_program_studi']; ?> </td>
        <td><?= $get['nama_program_studi']; ?> </td>
        <td><?= $get['nama_jenjang_pendidikan']; ?> </td>
    </tr>
<?php endforeach; ?>