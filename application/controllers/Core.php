<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Core extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Core_model', 'mcore');
    }

    public function data_dosen()
    {
        $data['dosen'] = $this->mcore->getAllMulti('master_dosen')->result_array();
        $this->load->view('core/table_dosen', $data);
    }

    public function data_dosen_tambah()
    {
        $this->load->helper('string');

        $id_dosen = md5(random_string('numeric'));
        $data = [
            'id_dosen'      => $id_dosen,
            'nik'           => $this->input->post('nik'),
            'nama_dosen'    => $this->input->post('nama_dosen'),
            'nidn'          => $this->input->post('nidn'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'nama_agama'    => $this->input->post('nama_agama'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'status'        => $this->input->post('status')
        ];

        echo json_encode($data);
        $this->mcore->inputMulti('master_dosen', $data);
    }

    public function data_dosen_hapus()
    {
        $id = $_POST['id'];
        $this->db->where('id_dosen', $id);
        $this->db->delete('master_dosen');
    }

    public function data_kurikulum()
    {
        $data['kurikulum'] = $this->mcore->getAllMulti('master_kurikulum')->result_array();
        $this->load->view('core/table_kurikulum', $data);
    }

    public function detail_kurikulum($id)
    {
        $data['matkul'] = $this->mcore->detailKurikulum_matkul($id)->result_array();
        $data['detail'] = $this->mcore->detailKurikulum($id)->row_array();
        $this->load->view('core/table_matkul', $data);
    }

    public function data_gedung()
    {
        // sleep(5);
        $data['gedung'] = $this->mcore->getAllMulti('master_gedung')->result_array();
        $this->load->view('core/table_gedung', $data);
    }

    public function data_ruangan($id)
    {
        $data['ruangan'] = $this->mcore->ruanganByid($id)->result_array();
        $this->load->view('core/table_ruangan', $data);
    }

    public function input_ruangan()
    {
        $nama_ruangan = $_POST['nama_ruangan'];

        $i = 0;
        foreach ($nama_ruangan as $get) {
            $data = [
                'id_gedung' => $this->input->post('id'),
                'nama_ruangan' => $_POST['nama_ruangan'][$i]
            ];
            $i++;
            $this->db->insert('master_ruangan', $data);
        }
    }

    public function hapus_ruangan()
    {
        $id = $this->input->post('id');
        $this->db->where('id_ruangan', $id);
        $this->db->delete('master_ruangan');
    }

    public function mahasiwa()
    {
        $this->load->view('admin/mahasiswa/mahasiswa_list');
    }

    public function data_prodi()
    {
        $data['prodi'] = $this->mcore->getAllMulti('master_prodi')->result_array();
        $this->load->view('core/table_prodi', $data);
    }

    public function data_mahasiswa()
    {
        $this->load->model('ServerSide_Perkuliahan_model', 'mperkuliahan');
        $results = $this->mperkuliahan->getDataMahasiswa();
        $data = [];
        $no = $_POST['start'];

        foreach ($results as $result) {
            $row = array();
            $row[] = ++$no;
            $row[] = $result->nama_mahasiswa;
            $row[] = $result->nim;
            $row[] = $result->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan';
            $row[] = $result->nama_agama;
            $row[] = $result->tanggal_lahir;
            $row[] = $result->nama_program_studi;
            $row[] = substr($result->nama_periode_masuk, 0, 4);
            $data[] = $row;
        }

        $output = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->mperkuliahan->count_all_data(),
            'recordsFiltered' => $this->mperkuliahan->count_filtered_data(),
            'data' => $data
        );

        $this->output->set_content_type('aplication/json')->set_output(json_encode($output));
    }

    public function data_perkuliahan()
    {
        error_reporting(0);
        $this->load->model('ServerSide_Perkuliahan_model', 'mperkuliahan');
        $results = $this->mperkuliahan->getDataPerkuliahan();
        $data = [];
        $no = $_POST['start'];

        foreach ($results as $result) {

            $dosen = $this->mcore->getDosenPerkuliahan($result->id_perkuliahan_kelas)->row();

            $row = array();
            $row[] = ++$no;
            $row[] = $result->semester_perkuliahan;
            $row[] = '<a href="' . base_url('#detail_perkuliahan?token=') . $result->token . '">' . $result->kode_mata_kuliah . '</a>';
            $row[] = $result->nama_mata_kuliah;
            $row[] = $result->nama_kelas;
            $row[] = $result->kuota_kelas;
            $row[] = $dosen->nama_dosen;
            $row[] = $result->nama_ruangan;
            $row[] = $result->hari . ", " . $result->jam_awal . '-' . $result->jam_akhir;
            $data[] = $row;
        }

        $output = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->mperkuliahan->count_all_data_perkuliahan(),
            'recordsFiltered' => $this->mperkuliahan->count_filtered_data_perkuliahan(),
            'data' => $data
        );

        $this->output->set_content_type('aplication/json')->set_output(json_encode($output));
    }

    public function select_ruangan_detail()
    {
        $id = $_GET['id'];

        $data = $this->db->query("SELECT * FROM master_ruangan join master_gedung on master_gedung.id_gedung = master_ruangan.id_gedung")->result_array();
        $output = '<option value=""></option>';

        foreach ($data as $get) {
            if ($get['id_ruangan'] == $id) {
                $output .= '<option selected value="' . $get["id_ruangan"] . '">' . $get["nama_gedung"] . " &nbsp; - " . $get['nama_ruangan'] .  '</option>';
            } else {
                $output .= '<option value="' . $get["id_ruangan"] . '">' . $get["nama_gedung"] . " &nbsp; - &nbsp; " . $get['nama_ruangan'] .  '</option>';
            }
        }

        echo $output;
    }

    public function select_gedung()
    {
        $data = $this->mcore->getAllMulti('master_gedung')->result_array();
        $output = '<option value=""></option>';
        foreach ($data as $get) {
            $output .= '<option value="' . $get["id_gedung"] . '">' . $get["nama_gedung"] . " &nbsp; " . $get['nama_panjang'] .  '</option>';
        }

        echo $output;
    }

    public function select_ruangan()
    {
        $id = $_POST['idGedung'];
        if ($id !== "") {
            $data = $this->db->get_where('master_ruangan', ['id_gedung' => $id])->result_array();
            $output = '<option value=""></option>';
            foreach ($data as $get) {
                $output .= '<option value="' . $get['id_ruangan'] . '">' . $get["nama_ruangan"] . '</option>';
            }
        } else {
            $output = '<option value="">--Tolong pilih data--</option>';
        }
        echo  $output;
    }

    public function data_perkuliahan_kelas_tambah()
    {
        $this->load->helper('string');
        $token = random_string('md5');

        $data = [
            'id_perkuliahan_kelas' => random_string('alnum'),
            'token' => $token,
            'id_prodi' => $this->input->post('id_prodi'),
            'id_matkul' => $this->input->post('id_matkul'),
            'semester_perkuliahan' => $this->input->post('semester_perkuliahan'),
            'id_ruangan' => $this->input->post('id_ruangan'),
            'nama_kelas' => $this->input->post('nama_kelas'),
            'hari' => $this->input->post('hari'),
            'jam_awal' => $this->input->post('jam_awal'),
            'jam_akhir' => $this->input->post('jam_akhir'),
            'kuota_kelas' => $this->input->post('kuota_kelas')
        ];

        echo json_encode($data);

        $this->mcore->inputMulti('perkuliahan_kelas', $data);
    }

    public function perkuliahan_kelas_detail()
    {
        $token = $_GET['token'];
        $data['detail'] = $this->mcore->getKelasPerkuliahanDetail($token)->row_array();
        $data['prodi'] = $this->mcore->getAllMulti('master_prodi')->result_array();
        $data['matkul'] = $this->mcore->getAllMulti('master_matkul')->result_array();
        $data['gedung'] = $this->mcore->getAllMulti('master_gedung')->result_array();
        $data['gedung'] = $this->mcore->ruanganByGedung()->result_array();
        $data['dosen'] = $this->mcore->getAllMulti('master_dosen')->result_array();
        $this->load->view('core/detail_perkuliahan_kelas', $data);
    }

    public function hapus_perkuliahan()
    {
        $id = $_POST['id'];
        $this->db->where('id_perkuliahan_kelas', $id);
        $this->db->delete('perkuliahan_kelas');
    }

    public function data_perkuliahan_dosen()
    {
        $data['dosen'] = $this->mcore->getDosenPerkuliahan($_GET['token'])->result_array();
        $this->load->view('core/table_perkuliahan_dosen', $data);
    }

    public function aktifitas_dosen()
    {
        $data = [
            'id_perkuliahan_kelas' => $this->input->post('id_perkuliahan_kelas'),
            'id_dosen' => $this->input->post('id_dosen'),
            'bobot_sks' => $this->input->post('bobot_sks'),
            'jumlah_rencana_pertemuan' => $this->input->post('jumlah_rencana_pertemuan'),
            'jenis_evaluasi' => $this->input->post('jenis_evaluasi'),
        ];
        $this->mcore->inputMulti('perkuliahan_dosen', $data);
    }

    public function autofill_mahasiswa()
    {
        // $er = "Mahasiswa Tidak Ditemukan";
        if (isset($_GET['term'])) {
            $result = $this->mcore->mahasiswaAutoFill($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row) {
                    $arr_result[] =  [
                        'label' => $row->nim . " - " . $row->nama_mahasiswa,
                        'nim' => $row->nim
                    ];
                }
                echo json_encode($arr_result);
            }
        }
    }

    public function add_mhsKrs()
    {
        $data = [
            'id_perkuliahan_kelas' => $this->input->post('id_perkuliahan_kelas'),
            'nim' => $this->input->post('id_mhs')
        ];
        echo json_encode($data);
        $this->mcore->inputMulti('perkuliahan_mahasiswa', $data);
    }

    public function data_krs($id)
    {
        $data['krs'] = $this->mcore->getKrs($id)->result_array();
        $this->load->view('core/table_krs', $data);
    }

    public function hapus_krs()
    {
        $id = $_POST['id'];
        $this->db->where('id_perkuliahan_mhs', $id);
        $this->db->delete('perkuliahan_mahasiswa');
    }

    public function select_angkatan()
    {
        $data = $this->mcore->getAngkatan()->result_array();
        $output = '<option value=""></option>';
        foreach ($data as $get) {
            $output .= '<option value="' . $get["id_periode_crop"] . '">' . $get["id_periode_crop"] . '</option>';
        }

        echo $output;
    }

    public function select_prodi()
    {
        $data = $this->mcore->getAllMulti('master_prodi')->result_array();
        $output = '<option value=""></option>';
        foreach ($data as $get) {
            $output .= '<option value="' . $get["id_prodi"] . '">' . $get['nama_jenjang_pendidikan'] . " " . $get["nama_program_studi"] . '</option>';
        }

        echo $output;
    }

    public function tampil_mhs_angkatan()
    {
        // sleep(3);
        $angkatan = $_GET['angkatan'];
        $prodi = $_GET['prodi'];
        $id_perkuliahan = $_GET['idperkuliahan'];

        if (empty($prodi)) {
            $data = $this->mcore->select_kolektif_angkatan($angkatan)->result_array();
        } else {
            $data = $this->mcore->select_kolektif_prodi($angkatan, $prodi)->result_array();
        }

        $output = '';

        $i = 1;
        foreach ($data as $get) {

            $cek = $this->db->query("SELECT nim from perkuliahan_mahasiswa where nim = '$get[nim]' and id_perkuliahan_kelas = '$id_perkuliahan'")->num_rows();

            if ($cek > 0) {
                $output .= '<tr class="bg-light">';
                $output .= '<td class="text-center"><input type="checkbox" style="padding:8px;" class="form-check-input" checked disabled name="id_mahasiswa[]" id="id_mahasiswa[]" value="' . $get['nim'] . '"></td>';
            } else {
                $output .= '<tr>';
                $output .= '<td class="text-center"><input type="checkbox" style="padding:8px;" class="form-check-input" name="id_mahasiswa[]" id="id_mahasiswa[]" value="' . $get['nim'] . '"></td>';
            }

            $output .= '<td class="text-center">' . $i++ . '</td>';
            $output .= '<td class="fw-bold">' . $get['nim'] . '</td>';
            $output .= '<td>' . $get['nama_mahasiswa'] . '</td>';
            $output .= '<td>' . $get['nama_program_studi'] . '</td>';
            $output .= '<td>' . substr($get['id_periode'], 0, 4) . '</td>';
            $output .= '</tr>';
        }

        echo $output;
    }

    public function input_krs()
    {
        $id_mahasiswa = $_POST['id_mahasiswa'];

        $i = 0;
        foreach ($id_mahasiswa as $get) {
            $data[] = [
                'id_perkuliahan_kelas' => $this->input->post('id_perkuliahan_kelas'),
                'nim' => $_POST['id_mahasiswa'][$i]
            ];
            $i++;
            // $this->db->insert('master_ruangan', $data);
        }

        $this->db->insert_batch('perkuliahan_mahasiswa', $data);
        echo json_encode($data);
    }


    public function data_nilai_perkuliahan()
    {
        $this->load->model('ServerSide_Perkuliahan_model', 'mperkuliahan');
        $results = $this->mperkuliahan->getDataPerkuliahan();
        $data = [];
        $no = $_POST['start'];

        foreach ($results as $result) {
            $row = array();
            $row[] = ++$no;
            $row[] = $result->semester_perkuliahan;
            $row[] = '<a href="' . base_url('#detail_nilai_perkuliahan/') . $result->token . '">' . $result->kode_mata_kuliah . '</a>';
            $row[] = $result->nama_mata_kuliah;
            $row[] = $result->nama_kelas;
            $data[] = $row;
        }

        $output = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->mperkuliahan->count_all_data_perkuliahan(),
            'recordsFiltered' => $this->mperkuliahan->count_filtered_data_perkuliahan(),
            'data' => $data
        );

        $this->output->set_content_type('aplication/json')->set_output(json_encode($output));
    }

    public function data_nilai($id)
    {
        $data = $this->mcore->getDetailNilaiPerkuliahan($id)->result_array();

        $output = '';
        $i = 1;
        foreach ($data as $get) {
            $output .= '<tr>';
            $output .= '<td class="text-center">' . $i++ . '</td>';
            $output .= '<td class="fw-bold">' . $get['nim'] . '</td>';
            $output .= '<td>' . $get['nama_mahasiswa'] . '</td>';
            $output .= '<td>' . $get['nama_program_studi'] . '</td>';
            $output .= '<td>' . substr($get['id_periode'], 0, 4) . '</td>';
            $output .= '<td>' . $get['nilai_angka'] . '</td>';
            $output .= '<td>' . $get['nilai_huruf'] . '</td>';
            $output .= '</tr>';
        }
        echo $output;
    }

    public function data_user()
    {
        // $data = $this->mcore->getDataUser()->result_array();
        // $output = '';
        // $i = 1;
        // $akun = '';

        // foreach ($data as $get) {

        //     if ($get['status_akun'] > 0) {
        //         $akun = '<i class="bi bi-check-circle-fill text-success"></i>';
        //     } else {
        //         $akun = "tidak aktif";
        //     }

        //     $output .= '<tr>';
        //     $output .= '<td class="text-center">' . $i++ . '</td>';
        //     $output .= '<td class="fw-bold">' . $akun . " " . $get['username_akun'] . '</td>';
        //     $output .= '<td>' . $get['nama_akun'] . '</td>';
        //     $output .= '<td>' . $get['hint'] . '</td>';
        //     $output .= '<td class="text-capitalize">' . $get['role'] . '</td>';
        //     $output .= '</tr>';
        // }
        // echo $output;


        $this->load->model('ServerSide_Perkuliahan_model', 'mperkuliahan');
        $results = $this->mperkuliahan->getDataUser();
        $data = [];
        $no = $_POST['start'];

        foreach ($results as $result) {
            $row = array();
            $row[] = ++$no;
            $row[] = $result->username_akun;
            $row[] = $result->nama_akun;
            $row[] = $result->hint;
            $row[] = ucfirst($result->role);
            //$row[] = $result->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan';
            // $row[] = $result->nama_program_studi;
            // $row[] = substr($result->nama_periode_masuk, 0, 4);
            $data[] = $row;
        }

        $output = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->mperkuliahan->count_all_data_user(),
            'recordsFiltered' => $this->mperkuliahan->count_filtered_data_user(),
            'data' => $data
        );

        $this->output->set_content_type('aplication/json')->set_output(json_encode($output));
    }

    public function data_setting_tambah()
    {
        $data = [
            'semester_berlaku_aktif' => $this->input->post('semester_berlaku_aktif'),
            'semester_krs' => $this->input->post('semester_krs'),
            'batas_sks_krs' => $this->input->post('batas_sks_krs')
        ];

        $this->mcore->inputMulti('settings', $data);

        echo json_encode($data);
    }

    public function tampil_mhs_generate()
    {
        $angkatan = $_GET['angkatan'];
        $prodi = $_GET['prodi'];

        if (empty($prodi)) {
            $data = $this->mcore->select_kolektif_angkatan($angkatan)->result_array();
        } else {
            $data = $this->mcore->select_kolektif_prodi($angkatan, $prodi)->result_array();
        }

        $output = '';
        $i = 1;
        foreach ($data as $get) {


            $cek = $this->db->get_where('tb_akun', ['id_user' => $get['id_mahasiswa']])->num_rows();

            $output .= '<tr>';
            if ($cek > 0) {
                $output .= '<td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td>';
            } else {
                $output .= '<td class="text-center"><input type="checkbox" style="padding:8px;" class="form-check-input" name="id_mahasiswa[]" id="id_mahasiswa[]" value="' . $get['id_mahasiswa'] . '"></td>';
            }

            $output .= '<td class="text-center">' . $i++ . '</td>';
            $output .= '<td class="fw-bold">' . $get['nim'] . '</td>';
            $output .= '<td>' . $get['nama_mahasiswa'] . '</td>';
            $output .= '<td>' . $get['nama_program_studi'] . '</td>';
            $output .= '<td>' . substr($get['id_periode'], 0, 4) . '</td>';
            $output .= '</tr>';
        }

        echo $output;
    }

    public function input_generate_mahasiswa()
    {
        $id_mahasiswa = $_POST['id_mahasiswa'];

        $i = 0;
        foreach ($id_mahasiswa as $get) {
            $id_mhs = $_POST['id_mahasiswa'][$i];

            $getMhs = $this->db->get_where('master_mahasiswa', ['id_mahasiswa' => $id_mhs])->row_array();

            $data[] = [
                'id_user' => $id_mhs,
                'nama_akun' => $getMhs['nama_mahasiswa'],
                'username_akun' => $getMhs['nim'],
                'email_akun' => '',
                'password_akun' => md5(date('Ymd', strtotime($getMhs['tanggal_lahir']))),
                'status_akun' => 1,
                'hint' => date('Ymd', strtotime($getMhs['tanggal_lahir'])),
                'role' => 'mahasiswa'
            ];
            $i++;
        }

        $this->db->insert_batch('tb_akun', $data);
        echo json_encode($data);
    }

    public function autofill_dosen()
    {
        if (isset($_GET['term'])) {
            $result = $this->mcore->dosenAutoFill($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row) {
                    $arr_result[] =  [
                        'label' => $row->nidn . " - " . $row->nama_dosen,
                        'id_dosen' => $row->id_dosen
                    ];
                }
                echo json_encode($arr_result);
            }
        }
    }

    public function krs_semester()
    {
        $data = $this->mcore->getAllMulti('settings')->result_array();

        $output = '<option value=""></option>';
        foreach ($data as $get) {
            $output .= '<option value="' . $get["semester_krs"] . '">' . $get["semester_krs"] . '</option>';
        }

        echo $output;
    }

    public function dosen_wali_tambah()
    {
        $this->load->helper('string');
        $token = random_string('numeric', 10);
        $id_dosen = $_POST['id_dosen'];
        $semester_krs = $_POST['semester'];

        $cek = $this->mcore->cekDosenWali($id_dosen, $semester_krs)->num_rows();

        if ($cek > 0) {
            $val = $this->mcore->cekDosenWali($id_dosen, $semester_krs)->row_array();
            $data = [
                'pesan' => 409,
                'token' => $val['token']
            ];
            echo json_encode($data);
        } else {
            $data = [
                'id_dosen' => $id_dosen,
                'semester_krs' => $semester_krs,
                'token' => $token
            ];

            $this->mcore->inputMulti('dosen_wali', $data);

            $pesan = [
                'token' => $token,
                'pesan' => 200
            ];
            echo json_encode($pesan);
        }
    }

    public function dosen_wali_reset()
    {
        $id = $this->input->post('token');
        $this->db->where('token', $id);
        $this->db->delete('dosen_wali');
        echo json_encode($id);
    }

    public function mahasiswa_dosen_wali()
    {
        $token = $this->input->post('token');
        $nim = $this->input->post('nim');

        $data = [
            'token' => $token,
            'nim' => $nim
        ];

        $this->mcore->inputMulti('perkuliahan_wali', $data);

        echo json_encode($data);
    }

    public function data_mahasiswa_wali()
    {
        $token = $this->input->post('token');
        $output = "";
        $data = $this->mcore->getMahasiswaDosenWali($token)->result_array();
        $i = 1;
        foreach ($data as $get) {
            $output .= '<tr>';
            $output .= '<td class="text-center">' . $i++ . '</td>';
            $output .= '<td class="fw-bold">' . $get['nim'] . '</td>';
            $output .= '<td>' . $get['nama_mahasiswa'] . '</td>';
            $output .= '<td>' . $get['nama_program_studi'] . '</td>';
            $output .= '<td>' . $get['nama_status_mahasiswa'] . '</td>';
            $output .= '<td>' . substr($get['id_periode'], 0, 4) . '</td>';
            $output .= '</tr>';
        }

        echo $output;
    }

    public function data_dosen_wali()
    {
        $data = $this->mcore->getDataDosenWali()->result_array();
        $output = "";
        $i = 1;
        foreach ($data as $get) {
            $output .= '<tr>';
            $output .= '<td class="text-center">' . $i++ . '</td>';
            $output .= '<td class="text-center">
            <a href="javascript:void(0);" class="btn btn-outline-danger rounded-circle btn-icon btn-sm p-2">
            <span class="btn-inner">
            <i class="bi bi-trash" style="font-size:11px;"></i>
            </span>                            
            </a></td>';
            $output .= '<td class="fw-bold">' . $get['nama_dosen'] . '</td>';
            $output .= '<td>' . $this->mcore->getMahasiswaDosenWali($get['token'])->num_rows() . '</td>';
            $output .= '<td>
                <span id="" class="bg-soft-info rounded-pill iq-custom-badge hapus-dosen" style="font-size: 12px; cursor:pointer;">Detail
                    <button class="btn btn-info btn-sm rounded-pill iq-cancel-btn" style="padding:1px;">
                    <i class="bi bi-search"></i>
                    </button>
                </span>
            </td>';
            $output .= '</tr>';
        }

        echo $output;
    }

    public function getDetailWaliKolektif()
    {
        $token = $_GET['token'];
        $data = $this->mcore->getDetailWaliKolektif($token)->row_array();

        echo json_encode($data);
    }

    public function getMahasiswaWaliKolektif()
    {
        $angkatan = $_GET['angkatan'];
        $prodi = $_GET['prodi'];

        if (empty($prodi)) {
            $data = $this->mcore->select_kolektif_angkatan($angkatan)->result_array();
        } else {
            $data = $this->mcore->select_kolektif_prodi($angkatan, $prodi)->result_array();
        }

        $output = '';
        $i = 1;
        foreach ($data as $get) {

            $cek = $this->db->get_where('perkuliahan_wali', ['nim' => $get['nim']])->num_rows();

            $output .= '<tr>';
            if ($cek > 0) {
                $output .= '<td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td>';
            } else {
                $output .= '<td class="text-center"><input type="checkbox" style="padding:8px;" class="form-check-input" name="id_mahasiswa[]" id="id_mahasiswa[]" value="' . $get['nim'] . '"></td>';
            }

            $output .= '<td class="text-center">' . $i++ . '</td>';
            $output .= '<td class="fw-bold">' . $get['nim'] . '</td>';
            $output .= '<td>' . $get['nama_mahasiswa'] . '</td>';
            $output .= '<td>' . substr($get['id_periode'], 0, 4) . '</td>';
            // $output .= '<td>' . $get['nama_program_studi'] . '</td>';
            $output .= '</tr>';
        }

        echo $output;
    }

    public function input_generate_wali()
    {
        $id_mahasiswa = $_POST['id_mahasiswa'];

        $i = 0;
        foreach ($id_mahasiswa as $get) {
            $id_mhs = $_POST['id_mahasiswa'][$i];
            $data[] = [
                'token' => $_POST['token'],
                'nim' => $id_mhs
            ];
            $i++;
        }

        $this->db->insert_batch('perkuliahan_wali', $data);
        echo json_encode($data);
    }

    public function getDataDosenGenerate()
    {
        if ($_GET['kategori'] == 'nidn') {
            $data = $this->mcore->getDataDosenGenerate('nidn')->result_array();
        } else {
            $data = $this->mcore->getDataDosenGenerate('non')->result_array();
        }

        $output = "";
        $i = 1;
        foreach ($data as $get) {
            $cek = $this->db->get_where('tb_akun', ['id_user' => $get['id_dosen']])->num_rows();

            $output .= '<tr>';
            if ($cek > 0) {
                $output .= '<td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td>';
            } else {
                $output .= '<td class="text-center"><input type="checkbox" style="padding:8px;" class="form-check-input" name="id_dosen[]" id="id_dosen[]" value="' . $get['id_dosen'] . '"></td>';
            }

            $output .= '<td class="text-center">' . $i++ . '</td>';
            $output .= '<td class="fw-bold">' . $get['nama_dosen'] . '</td>';
            $output .= '<td>' . $get['nidn'] . '</td>';
            $output .= '<td>' . $get['status'] . '</td>';
            $output .= '</tr>';
        }
        echo $output;
    }

    public function input_generate_dosen()
    {
        $id_dosen = $_POST['id_dosen'];

        $i = 0;
        foreach ($id_dosen as $get) {
            $id_dosen = $_POST['id_dosen'][$i];

            $getDosen = $this->db->get_where('master_dosen', ['id_dosen' => $id_dosen])->row_array();
            $namadosenLow = strtolower($getDosen['nama_dosen']);
            $data[] = [
                'id_user' => $id_dosen,
                'nama_akun' => ucwords($namadosenLow),
                'username_akun' => $getDosen['nidn'],
                'email_akun' => '',
                'password_akun' => md5(date('Ymd', strtotime($getDosen['tanggal_lahir']))),
                'status_akun' => 1,
                'hint' => date('Ymd', strtotime($getDosen['tanggal_lahir'])),
                'role' => 'dosen'
            ];
            $i++;
        }
        $this->db->insert_batch('tb_akun', $data);
        echo json_encode($data);
    }

    public function select_kategori_dosen()
    {
        $output = '<option value=""></option>';
        $output .= '<option value="nidn">NIDN</option>';
        $output .= '<option value="non-nidn">Non NIDN</option>';

        echo $output;
    }
}

/* End of file Core.php and path \application\controllers\Core.php */
