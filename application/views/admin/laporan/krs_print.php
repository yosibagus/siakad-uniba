<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_pdf ?></title>
    <style>
        * {
            font-family: arial;
        }

        .tengah {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .tableku {
            font-size: 14px;
        }

        .tengah {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        #table {
            font-size: 11px;
            font-family: Arial, "Trebuchet MS", Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th {
            border: 1px solid #000;
            padding: 8px;
        }

        footer {
            position: fixed;
            bottom: -15px;
            left: 0px;
            right: 0px;
            height: 50px;
        }
    </style>
</head>

<body>
    <img src="<?= base_url('assets/logo.png') ?>" style="display: block;  margin-left: 43%;" width="85" alt="">
    <h4 style="text-align:center; margin-bottom:0px; padding-bottom:0px; font-size:14px;">UNIVERSITAS BAHAUDIN MUDHARY</h4>
    <h5 style="text-align:center; margin-top:3px; font-size:14px;">KARTU RENCANA STUDI</h5>

    <div>
        <table style="margin-left:auto;margin-right:auto;margin-top:20px; width:100%; font-size:14px;">
            <tr>
                <td width="20%">NPM</td>
                <td width="10">:</td>
                <td width="30%"><span id="nim"><?= $detail['nim'] ?></span></td>
                <td width="20%">Tahun Akademik</td>
                <td width="10">:</td>
                <td><span id="tahun_akademik"><?= substr($detail['semester'], 0, 9) ?></span></td>
            </tr>
            <tr>
                <td width="20%">Nama</td>
                <td width="10">:</td>
                <td width="30%"><span id="nama"><?= $detail['nama_mahasiswa'] ?></span></td>
                <td width="20%">Semester</td>
                <td width="10">:</td>
                <td><span id="semester"><?= substr($detail['semester'], 9) ?></span></td>
            </tr>
            <tr>
                <td width="20%">Program Studi</td>
                <td width="10">:</td>
                <td><span id="prodi"><?= $detail['nama_program_studi'] ?></span></td>
            </tr>
        </table>

        <table id="table" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th style="vertical-align: middle; text-align:center;">Kode<br>Mata Kuliah</th>
                    <th style="vertical-align: middle; text-align:center;">Nama<br>Mata Kuliah</th>
                    <th style="vertical-align: middle; text-align:center;">SKS</th>
                    <th style="vertical-align: middle; text-align:center;">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $sks = 0.0;
                foreach ($krs as $get) : ?>
                    <?php $matkul = $this->mcore->getMatkulKrsMhs($get['id_prodi'], $get['semester'], $detail['nim'], $detail['id_semester'])->result_array(); ?>
                    <?php foreach ($matkul as $val) :
                            $sks += $val['sks_mata_kuliah']; ?>
                        <tr>
                            <td style="vertical-align: middle; text-align:center;"><?= $val['kode_mata_kuliah'] ?></td>
                            <td><?= $val['nama_mata_kuliah'] ?></td>
                            <td style="vertical-align: middle; text-align:center;"><?= (int) $val['sks_mata_kuliah'] ?></td>
                            <td></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2" style="vertical-align: middle; text-align:center;"><b>Jumlah SKS Disetujui</b></td>
                    <td style="vertical-align: middle; text-align:center;"><b><?= $sks ?></b></td>
                    <td style="border-bottom: 1px solid white;
                    border-right: 1px solid white;"></td>
                </tr>
            </tbody>
        </table>

    </div>
</body>

</html>