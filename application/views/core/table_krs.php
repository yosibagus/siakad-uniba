<?php $i = 1;
foreach ($krs as $get) : ?>

    <tr>
        <td><?= $i++; ?></td>
        <td><?= $get['nim']; ?></td>
        <td><?= $get['nama_mahasiswa']; ?></td>
        <td><?= $get['jenis_kelamin'] == "L" ? 'Laki-Laki' : 'Perempuan' ?></td>
        <td><?= $get['nama_program_studi']; ?></td>
        <td><?= substr($get['nama_periode_masuk'], 0, 4); ?></td>
        <td>
            <button class="btn btn-icon btn-danger hapus-krs-mhs" id="<?= $get['id_perkuliahan_mhs'] ?>">
                <span class="btn-inner">
                    <i class="bi bi-trash" style="font-size: 10px;"></i>
                </span>
            </button>
        </td>
    </tr>

<?php endforeach; ?>