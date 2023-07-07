<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

    public function index()
    {
        echo "halaman api integrasi NEO FEEDER PDDIKTI";
    }

    private function linkApi()
    {
        return "http://localhost:3003/ws/live2.php?=&=";
    }

    private function getToken()
    {
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => $this->linkApi(),
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
            )
        );

        $response = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($response, true);

        for ($i = 0; $i < count($data['data']); $i++) {
            $resultnew = ['token_kode' => $data['data']['token']];
        }
        return $resultnew['token_kode'];

        // $this->db->insert_batch('master_kurikulum', $result);
    }

    public function getListMahasiswa($id_prodi)
    {
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => $this->linkApi(),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
				"act":"GetListMahasiswa",
                "filter" : "id_prodi=' . "'" . $id_prodi . "'" . '",
				"token" : "' . $this->getToken() . '",
				"username":"071098",
				"password":"m4dh4ry"
			    }',

                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            )
        );

        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);

        foreach ($data['data'] as $get) {
            if ($get['id_mahasiswa'] == '30d654fd-2c32-4842-8006-56f05c7188a9') { } else {
                $result[] = [
                    'id_mahasiswa' => $get['id_mahasiswa'],
                    'nama_mahasiswa' => $get['nama_mahasiswa'],
                    'jenis_kelamin' => $get['jenis_kelamin'],
                    'tanggal_lahir' => $get['tanggal_lahir'],
                    'id_perguruan_tinggi' => $get['id_perguruan_tinggi'],
                    'nipd' => $get['nipd'],
                    'nama_agama' => $get['nama_agama'],
                    'id_prodi' => $get['id_prodi'],
                    'nama_status_mahasiswa' => $get['nama_status_mahasiswa'],
                    'nim' => $get['nim'],
                    'id_periode' => $get['id_periode'],
                    'nama_periode_masuk' => $get['nama_periode_masuk'],
                    'id_registrasi_mahasiswa' => $get['id_registrasi_mahasiswa']
                ];
            }
        }

        // $this->db->insert_batch('master_mahasiswa', $result);
        echo json_encode($result);
    }

    public function getAktivitasKuliah($id_prodi)
    {
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => 'http://192.168.250.3:3003/ws/live2.php?=&=',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
				"act":"GetAktivitasKuliahMahasiswa",
                "filter" : "id_prodi=' . "'" . $id_prodi . "'" . '",
				"token" : "' . $this->getToken() . '",
				"username":"071098",
				"password":"m4dh4ry"
			}',

                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            )
        );

        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);

        foreach ($data['data'] as $get) {
            $result[] = [
                'id_mahasiswa' => $get['id_mahasiswa'],
                'id_semester' => $get['id_semester'],
                'id_prodi' => $get['id_prodi'],
                'ips' => $get['ips'],
                'ipk' => $get['ipk'],
                'sks_semester' => $get['sks_semester'],
                'sks_total' => $get['sks_total'],
                'biaya_kuliah_smt' => $get['biaya_kuliah_smt']
            ];
        }

        // $this->db->insert_batch('mahasiswa_aktivitas', $result);
        echo json_encode($result);
    }

    public function getSemester()
    {
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => $this->linkApi(),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
				"act":"GetSemester",
				"token" : "' . $this->getToken() . '",
				"username":"071098",
				"password":"m4dh4ry"
			}',

                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            )
        );

        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);

        foreach ($data['data'] as $get) {
            $result[] = $get;
        }

        // $this->db->insert_batch('master_semester', $result);
        echo json_encode($data);
    }

    public function getDosen()
    {
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => $this->linkApi(),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
				"act":"GetListDosen",
				"token" : "' . $this->getToken() . '",
				"username":"071098",
				"password":"m4dh4ry"
			}',

                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            )
        );

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
                'status' => $get['nama_status_aktif'],
                'jabatan_dosen' => 'DOSEN'
            ];
        }

        echo json_encode($result);

        // $this->db->insert_batch('master_dosen', $result);
    }

    public function getKurikulum()
    {
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => 'http://localhost:3003/ws/live2.php?=&=',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
				"act":"GetListKurikulum",
				"token" : "' . $this->getToken() . '",
				"username":"071098",
				"password":"m4dh4ry"
			}',

                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            )
        );

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
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => 'http://localhost:3003/ws/live2.php?=&=',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
				"act":"GetListMataKuliah",
				"token" : "' . $this->getToken() . '",
				"username":"071098",
				"password":"m4dh4ry"
			}',

                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            )
        );

        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);

        foreach ($data['data'] as $get) {
            $result[] = $get;
        }

        echo json_encode($result);
        // $this->db->insert_batch('master_matkuls', $result);
    }

    public function getMatkulKurikulum()
    {
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
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
            )
        );

        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);

        foreach ($data['data'] as $get) {
            $result[] = $get;
        }

        echo json_encode($result);
        // $this->db->insert_batch('master_matkul', $result);
    }

    public function getkelasPerkuliahan($id_prodi)
    {
        // "filter" : "id_prodi=' . "'" . $id_prodi . "'" . '",
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => $this->linkApi(),
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
            )
        );

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
                'id_semester' => $data['data'][$i]['id_semester'],
                'nama_kelas' => $data['data'][$i]['nama_kelas_kuliah'],
                'id_ruangan' => '',
                'jam_awal' => '',
                'jam_akhir' => '',
                'kuota_kelas' => ''
            ];
        }

        // $this->db->insert_batch('perkuliahan_kelas', $result);

        echo json_encode($result);
        // file_put_contents('./assets/getperiode.json', serialize(json_encode($data)));
    }

    public function getDosenKelasPerkuliahan()
    {
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => $this->linkApi(),
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
            )
        );

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

    public function getKrs($id_prodi)
    {
        // $id_prodi = "125de1a4-d11b-4e90-b9c6-0c1d89be4a8e";
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => $this->linkApi(),
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
            )
        );

        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);

        foreach ($data['data'] as $get) {
            $result[] = [
                'id_perkuliahan_kelas' => $get['id_kelas'],
                'nim' => $get['nim'],
                'status' => 1
            ];
        }
        echo json_encode($result);
        // $this->db->insert_batch('perkuliahan_mahasiswa', $result);
        // file_put_contents('./assets/getperiode.json', serialize(json_encode($data)));
    }

    public function getNilai($id_prodi)
    {
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => $this->linkApi(),
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
            )
        );

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
                'id_semester' => $get['id_semester'],
                'semester_perkuliahan' => $get['nama_semester']
            ];
        }
        echo json_encode($result);
        // $this->db->insert_batch('perkuliahan_nilai', $result);
    }

    public function getNilaiIps()
    {
        $mhs = $this->db->get_where('master_mahasiswa', ['id_prodi' => 'd1cc4baf-4926-42da-ac18-63398da29f5a'])->result_array();

        foreach ($mhs as $mhs) {
            $data = $this->db->query("SELECT nim, id_semester FROM perkuliahan_nilai where nim = '$mhs[nim]' group by id_semester")->result_array();
            $i = 1;
            foreach ($data as $get) {
                $sks = 0.0;
                $total = 0.0;
                $val = $this->mcore->getDataKhs($mhs['nim'], $get['id_semester'])->result_array();
                foreach ($val as $val) {
                    $index_sks = $val['sks_mata_kuliah'] * $val['nilai_indeks'];
                    $sks += $val['sks_mata_kuliah'];
                    $total += $index_sks;
                }

                $result[] = [
                    'nim' => $get['nim'],
                    'id_semester' => $get['id_semester'],
                    'total_sks' => $sks,
                    'sks_indeks' => $total,
                    'ips' => number_format($total / $sks, 2),
                    'semester' => $i++
                ];
            }
        }
        // $this->db->insert_batch('perkuliahan_ips', $result);

        echo json_encode($result);
    }

    public function getSkalaNilai()
    {
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => 'http://localhost:3003/ws/live2.php?=&=',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
				"act":"GetListSkalaNilaiProdi",
				"token" : "' . $this->getToken() . '",
				"username":"071098",
				"password":"m4dh4ry"
			}',

                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            )
        );

        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);

        echo json_encode($data['data']);
    }
}

/* End of file Api.php and path \application\controllers\Api.php */
