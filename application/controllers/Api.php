<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

    public function index()
    {
        echo "Halaman APi Integrasi PDDIKTI";
    }

    private function curl($url)
    {
        //strtotime(time)
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    public function getToken()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:3003/ws/live2.php?=&=',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
				"act":"GetToken",
				"username":"071098",
				"password":"m4dh4ry"
			}',

            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);

        for ($i = 0; $i < count($data['data']); $i++) {
            $resultnew = ['token_kode' => $data['data']['token']];
        }
        return $resultnew['token_kode'];

        // $this->db->insert_batch('master_kurikulum', $result);
    }

    public function getDosen()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL            => 'http://localhost:3003/ws/live2.php?=&=',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => '',
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => 'POST',
            CURLOPT_POSTFIELDS     => '{
				"act":"GetListDosen",
				"token" : "' . $this->getToken() . '",
				"username":"071098",
				"password":"m4dh4ry"
			}',

            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);

        foreach ($data['data'] as $get) {
            $result[] = [
                'nama_dosen' => $get['nama_dosen'],
                'id_dosen' => $get['id_dosen'],
                'nik' => '',
                'nidn' => $get['nidn'],
                'jenis_kelamin' => $get['jenis_kelamin'],
                'nama_agama' => $get['nama_agama'],
                'tanggal_lahir' => $get['tanggal_lahir'],
                'status' => $get['nama_status_aktif']
            ];
        }

        echo json_encode($result);

        $this->db->insert_batch('master_dosen', $result);
    }


    public function getKurikulum()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL            => 'http://localhost:3003/ws/live2.php?=&=',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => '',
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => 'POST',
            CURLOPT_POSTFIELDS     => '{
				"act":"GetListKurikulum",
				"token" : "' . $this->getToken() . '",
				"username":"071098",
				"password":"m4dh4ry"
			}',

            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);

        foreach ($data['data'] as $get) {
            $result[] = $get;
        }

        echo json_encode($result);
        // $this->db->insert_batch('master_kurikulum', $result);
    }

    public function getMatakuliah()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL            => 'http://localhost:3003/ws/live2.php?=&=',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => '',
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => 'POST',
            CURLOPT_POSTFIELDS     => '{
				"act":"GetListMataKuliah",
				"token" : "' . $this->getToken() . '",
				"username":"071098",
				"password":"m4dh4ry"
			}',

            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);

        foreach ($data['data'] as $get) {
            $result[] = $get;
        }

        echo json_encode($result);
        $this->db->insert_batch('master_matkuls', $result);
    }

    public function getMatkulKurikulum()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:3003/ws/live2.php?=&=',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
				"act":"GetMatkulKurikulum",
				"token" : "' . $this->getToken() . '",
				"username":"071098",
				"password":"m4dh4ry"
			}',

            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);

        foreach ($data['data'] as $get) {
            $result[] = $get;
        }

        echo json_encode($result);
        //$this->db->insert_batch('master_matkul', $result);
    }

    public function getkelasPerkuliahan()
    {
        $id_prodi = "d1cc4baf-4926-42da-ac18-63398da29f5a";
        // "filter" : "id_prodi=' . "'" . $id_prodi . "'" . '",
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:3003/ws/live2.php?=&=',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
				"act":"GetListKelasKuliah",
				"filter" : "id_prodi=' . "'" . $id_prodi . "'" . '",
				"token" : "' . $this->getToken() . '",
				"username":"071098",
				"password":"m4dh4ry"
			}',

            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);

        $this->load->helper('string');

        for ($i = 0; $i < count($data['data']); $i++) {
            $result[] = [
                'token' => random_string('md5'),
                'id_perkuliahan_kelas' => $data['data'][$i]['id_kelas_kuliah'],
                'id_prodi' => $data['data'][$i]['id_prodi'],
                'id_matkul' => $data['data'][$i]['id_matkul'],
                'semester_perkuliahan' => $data['data'][$i]['nama_semester'],
                'nama_kelas' => $data['data'][$i]['nama_kelas_kuliah'],
                'id_ruangan' => '',
                'jam_awal' => '',
                'jam_akhir' => '',
                'kuota_kelas' => ''
            ];
        }

        $this->db->insert_batch('perkuliahan_kelas', $result);

        echo json_encode($result);
        // file_put_contents('./assets/getperiode.json', serialize(json_encode($data)));
    }

    public function getDosenKelasPerkuliahan()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:3003/ws/live2.php?=&=',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
				"act":"GetDosenPengajarKelasKuliah",
				"token" : "' . $this->getToken() . '",
				"username":"071098",
				"password":"m4dh4ry"
			}',

            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);

        foreach ($data['data'] as $get) {
            $result[] = [
                'id_perkuliahan_kelas' => $get['id_kelas_kuliah'],
                'id_dosen' => $get['id_dosen'],
                'bobot_sks' => $get['sks_substansi_total'],
                'jumlah_rencana_pertemuan' => $get['realisasi_minggu_pertemuan'],
                'jenis_evaluasi' => $get['nama_jenis_evaluasi']
            ];
        }

        echo json_encode($result);
        // $this->db->insert_batch('perkuliahan_dosen', $result);
    }

    public function getKrs()
    {
        $id_prodi = "4721e4a6-1600-4daf-851f-c616ed6489f5";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:3003/ws/live2.php?=&=',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
				"act":"GetKRSMahasiswa",
				"filter" : "id_prodi=' . "'" . $id_prodi . "'" . '",
				"token" : "' . $this->getToken() . '",
				"username":"071098",
				"password":"m4dh4ry"
			}',

            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);

        foreach ($data['data'] as $get) {
            $result[] = [
                'id_perkuliahan_kelas' => $get['id_kelas'],
                'nim' => $get['nim']
            ];
        }
        echo json_encode($result);
        // $this->db->insert_batch('perkuliahan_mahasiswa', $result);
        // file_put_contents('./assets/getperiode.json', serialize(json_encode($data)));
    }

    public function getWilayah()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:3003/ws/live2.php?=&=',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                "act":"GetNegara",
                "token" : "' . $this->getToken() . '",
                "username":"071098",
                "password":"m4dh4ry"
            }',

            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        echo $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);
    }

    public function getNilai()
    {
        $id_prodi = "d1cc4baf-4926-42da-ac18-63398da29f5a";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:3003/ws/live2.php?=&=',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
				"act":"GetDetailNilaiPerkuliahanKelas",
				"filter" : "id_prodi=' . "'" . $id_prodi . "'" . '",
				"token" : "' . $this->getToken() . '",
				"username":"071098",
				"password":"m4dh4ry"
			}',

            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);

        foreach ($data['data'] as $get) {
            $result[] = [
                'nim' => $get['nim'],
                'id_perkuliahan_kelas' => $get['id_kelas_kuliah'],
                'id_matkul' => $get['id_matkul'],
                'nilai_angka' => $get['nilai_angka'],
                'nilai_indeks' => $get['nilai_indeks'],
                'nilai_huruf' => $get['nilai_huruf'],
            ];
        }
        echo json_encode($result);
        //$this->db->insert_batch('perkuliahan_nilai', $result);
    }
}

/* End of file Api.php and path \application\controllers\Api.php */
