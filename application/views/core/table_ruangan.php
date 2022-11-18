<?php $i = 1;
foreach ($ruangan as $get) : ?>
    <tr>
        <td><?= $i++; ?></td>
        <td>
            <?= $get['nama_ruangan']; ?>
        </td>
        <th class="text-center">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $get['id_ruangan'] ?>">
                <i class="bi bi-trash"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal<?= $get['id_ruangan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="document">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Peringatan!!!</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Yakin ingin menghapus data?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="<?= $get['id_ruangan'] ?>" class="btn btn-danger text-white btn-hapus-ruangan">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        </th>
    </tr>
<?php endforeach; ?>