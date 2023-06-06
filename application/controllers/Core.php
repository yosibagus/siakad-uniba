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
        $this->load->model('ServerSide_Perkuliahan_model', 'mperkuliahan');
        $results = $this->mperkuliahan->getDataDosen();
        $data = [];
        $no = $_POST['start'];
        foreach ($results as $result) {
            $row = array();
            $row[] = ++$no;
            $row[] = $result->nama_dosen;
            $row[] = $result->nidn;
            $row[] = $result->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan';
            $row[] = $result->nama_agama;
            $row[] = $result->tanggal_lahir;
            $row[] = $result->status;
            $row[] = '
                <span id="' . $result->id_dosen . '" class="bg-soft-danger rounded-pill iq-custom-badge hapus-dosen" style="font-size: 12px; cursor:pointer;">
                    Hapus
                    <button class="btn btn-danger btn-sm rounded-pill iq-cancel-btn">
                        <svg class="icon-14" width="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4" d="M19.643 9.48851C19.643 9.5565 19.11 16.2973 18.8056 19.1342C18.615 20.8751 17.4927 21.9311 15.8092 21.9611C14.5157 21.9901 13.2494 22.0001 12.0036 22.0001C10.6809 22.0001 9.38741 21.9901 8.13185 21.9611C6.50477 21.9221 5.38147 20.8451 5.20057 19.1342C4.88741 16.2873 4.36418 9.5565 4.35445 9.48851C4.34473 9.28351 4.41086 9.08852 4.54507 8.93053C4.67734 8.78453 4.86796 8.69653 5.06831 8.69653H18.9388C19.1382 8.69653 19.3191 8.78453 19.4621 8.93053C19.5953 9.08852 19.6624 9.28351 19.643 9.48851Z" fill="currentColor"></path>
                            <path d="M21 5.97686C21 5.56588 20.6761 5.24389 20.2871 5.24389H17.3714C16.7781 5.24389 16.2627 4.8219 16.1304 4.22692L15.967 3.49795C15.7385 2.61698 14.9498 2 14.0647 2H9.93624C9.0415 2 8.26054 2.61698 8.02323 3.54595L7.87054 4.22792C7.7373 4.8219 7.22185 5.24389 6.62957 5.24389H3.71385C3.32386 5.24389 3 5.56588 3 5.97686V6.35685C3 6.75783 3.32386 7.08982 3.71385 7.08982H20.2871C20.6761 7.08982 21 6.75783 21 6.35685V5.97686Z" fill="currentColor"></path>
                        </svg>
                    </button>
                </span>
                <span class="bg-soft-primary rounded-pill iq-custom-badge" style="font-size: 12px; cursor:pointer;">
                    Ubah
                    <button class="btn btn-primary btn-sm rounded-pill iq-cancel-btn">
                        <svg class="icon-14" width="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4" d="M19.9927 18.9534H14.2984C13.7429 18.9534 13.291 19.4124 13.291 19.9767C13.291 20.5422 13.7429 21.0001 14.2984 21.0001H19.9927C20.5483 21.0001 21.0001 20.5422 21.0001 19.9767C21.0001 19.4124 20.5483 18.9534 19.9927 18.9534Z" fill="currentColor"></path>
                            <path d="M10.309 6.90385L15.7049 11.2639C15.835 11.3682 15.8573 11.5596 15.7557 11.6929L9.35874 20.0282C8.95662 20.5431 8.36402 20.8344 7.72908 20.8452L4.23696 20.8882C4.05071 20.8903 3.88775 20.7613 3.84542 20.5764L3.05175 17.1258C2.91419 16.4915 3.05175 15.8358 3.45388 15.3306L9.88256 6.95545C9.98627 6.82108 10.1778 6.79743 10.309 6.90385Z" fill="currentColor"></path>
                            <path opacity="0.4" d="M18.1208 8.66544L17.0806 9.96401C16.9758 10.0962 16.7874 10.1177 16.6573 10.0124C15.3927 8.98901 12.1545 6.36285 11.2561 5.63509C11.1249 5.52759 11.1069 5.33625 11.2127 5.20295L12.2159 3.95706C13.126 2.78534 14.7133 2.67784 15.9938 3.69906L17.4647 4.87078C18.0679 5.34377 18.47 5.96726 18.6076 6.62299C18.7663 7.3443 18.597 8.0527 18.1208 8.66544Z" fill="currentColor"></path>
                        </svg>
                    </button>
                </span>
            ';
            $data[] = $row;
        }

        $output = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->mperkuliahan->count_all_data_dosen(),
            'recordsFiltered' => $this->mperkuliahan->count_filtered_data_dosen(),
            'data' => $data
        );

        $this->output->set_content_type('aplication/json')->set_output(json_encode($output));
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
        $data = $this->mcore->getAllMulti('master_kurikulum')->result_array();
        // $this->load->view('core/table_kurikulum', $data);
        $i = 1;
        foreach ($data as $get) {
            $output[] = [
                'no' => $i++,
                'nama_kurikulum' => '<a href="' . base_url('#/kurikulum_detail/') . $get['id_kurikulum'] . '">' . $get['nama_kurikulum'] . '</a>',
                'nama_program_studi' => $get['nama_program_studi'],
                'semester_mulai_berlaku' => $get['semester_mulai_berlaku']
            ];
        }

        $this->output->set_content_type('aplication/json')->set_output(json_encode($output));
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

    public function data_prodi()
    {
        $data['prodi'] = $this->mcore->getAllMulti('master_prodi')->result_array();
        // $this->load->view('core/table_prodi', $data);
        $html = "";
        $i = 1;
        foreach ($data['prodi'] as $get) {
            $html .= '<tr>';
            $html .= '<td>' . $i++ . '</td>';
            $html .= '<td>' . $get['kode_program_studi'] . '</td>';
            $html .= '<td>' . $get['nama_program_studi'] . '</td>';
            $html .= '<td>' . $get['nama_jenjang_pendidikan'] . '</td>';
            $html .= '</tr>';
        }
        echo $html;
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
            $row[] = '<a href="' . base_url('#/khs_mhs/') . $result->nim . '">' . $result->nama_mahasiswa . '</a>';
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

    public function detail_mahasiswa()
    {
        $nim = $_GET['nim'];
        $data = $this->mcore->infoMahasiswa($nim)->row_array();

        echo json_encode($data);
    }

    public function data_perkuliahan()
    {
        // error_reporting(0);
        $this->load->model('ServerSide_Perkuliahan_model', 'mperkuliahan');
        $results = $this->mperkuliahan->getDataPerkuliahan();
        $data = [];
        $no = $_POST['start'];

        foreach ($results as $result) {

            // $dosen = $this->mcore->getDosenPerkuliahan($result->id_perkuliahan_kelas)->row();
            $jumlah = $this->mcore->getJumlahMhsKelas($result->id_perkuliahan_kelas);

            $row = array();
            $row[] = ++$no;
            $row[] = $result->semester_perkuliahan;
            $row[] = '<a href="' . base_url('#detail_perkuliahan/') . $result->token . '">' . $result->kode_mata_kuliah . '</a>';
            $row[] = $result->nama_mata_kuliah;
            $row[] = $result->nama_kelas;
            $row[] = $result->kuota_kelas == 0 ? "Tidak di set" : $result->kuota_kelas;
            $row[] = $jumlah;
            $row[] = $result->nama_dosen;
            $row[] = $result->nama_ruangan == "" ? "Tidak di set" : $result->nama_ruangan;
            $row[] = $result->hari == "" ? "Tidak di set" : $result->hari . ", " . $result->jam_awal . '-' . $result->jam_akhir;
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

    public function data_matakuliah()
    {
        $this->load->model('ServerSide_Perkuliahan_model', 'mperkuliahan');
        $results = $this->mperkuliahan->getDataMataKuliah();
        $data = [];
        $no = $_POST['start'];

        foreach ($results as $result) {

            $row = array();
            $row[] = ++$no;
            $row[] = $result->kode_mata_kuliah;
            $row[] = $result->nama_mata_kuliah;
            $row[] = (int) $result->sks_mata_kuliah;
            $row[] = $result->nama_program_studi;
            $data[] = $row;
        }

        $output = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->mperkuliahan->count_all_data_matakuliah(),
            'recordsFiltered' => $this->mperkuliahan->count_filtered_data_matakuliah(),
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
            'id_semester' => 20222,
            'semester_perkuliahan' => '2022/2023 Genap',
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
        $data['semester_aktif'] = $this->mcore->getSemesterAktif() == $data['detail']['id_semester'] ? 1 : 0;
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
        $data = $this->mcore->getDosenPerkuliahan($_GET['token'])->result_array();
        $html = "";
        $i = 1;
        foreach ($data as $get) {
            $html .= '<tr class="text-center">';
            $html .= '<td>' . $i++ . '</td>';
            $html .= '<td>' . $get['nidn'] . '</td>';
            $html .= '<td>' . $get['nama_dosen'] . '</td>';
            $html .= '<td>' . $get['bobot_sks'] . '</td>';
            $html .= '<td>' . $get['jumlah_rencana_pertemuan'] . '</td>';
            $html .= '<td>' . $get['jumlah_rencana_pertemuan'] . '</td>';
            $html .= '<td>' . $get['jenis_evaluasi'] . '</td>';
            $html .= '<td></td>';
            $html .= '</tr>';
        }
        echo $html;
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
        $data = $this->mcore->getKrs($id)->result_array();
        // $this->load->view('core/table_krs', $data);
        $output = "";
        $i = 1;

        foreach ($data as $get) {

            if ($get['jenis_kelamin'] == "L") {
                $jenkel = "Laki-Laki";
            } else {
                $jenkel = "Perempuan";
            }

            $output .= '<tr>';
            $output .= '<td>' . $i++ . '</td>';
            $output .= '<td>' . $get['nim'] . '</td>';
            $output .= '<td>' . $get['nama_mahasiswa'] . '</td>';
            $output .= '<td>' . $jenkel . '</td>';
            $output .= '<td>' . $get['nama_program_studi'] . '</td>';
            $output .= '<td>' . substr($get['nama_periode_masuk'], 0, 4) . '</td>';
            $output .= '<td><button class="btn btn-icon btn-danger hapus-krs-mhs" id="' . $get['id_perkuliahan_mhs'] . '">
                            <span class="btn-inner">
                                <i class="bi bi-trash" style="font-size: 10px;"></i>
                            </span>
                        </button></td>';
            // $output .= '</tr>';
        }

        echo $output;
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
                'nim' => $_POST['id_mahasiswa'][$i],
                'status' => 1
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
            $row[] = '<div class="text-center">' . (int) $result->sks_mata_kuliah . '</div>';

            $row[] = '<div class="text-left">' . $this->mcore->getJumlahMhsKelas($result->id_perkuliahan_kelas) . '</div>';
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
        // $data = $this->mcore->getDetailNilaiPerkuliahan($id)->result_array();
        $data = $this->mcore->getInputNilaiMahasiswa($id)->result_array();
        $output = '';
        $i = 1;
        foreach ($data as $get) {
            $output .= '<tr id="bg-' . $get['nim'] . '">';
            $output .= '<td class="text-center">' . $i++ . '</td>';
            $output .= '<td class="fw-bold">' . $get['nim'] . '</td>';
            $output .= '<td>' . $get['nama_mahasiswa'] . '</td>';
            $output .= '<td>' . $get['nama_program_studi'] . '</td>';
            $output .= '<td>' . substr($get['id_periode'], 0, 4) . '</td>';
            if ($this->mcore->getNilaiMahasiswa($id, $get['nim'])->num_rows() > 0) {
                $nilai = $this->mcore->getNilaiMahasiswa($id, $get['nim'])->row_array();
                $output .= '<td width="10%"><input type="text" value="' . $nilai['nilai_angka'] . '" class="form-control" id="nilai_angka[]" name="nilai_angka[]" readonly idmhs="' . $get['nim'] . '"></td>';
                $output .= '<td width="15%" class="text-center"><div class="' . $get['nim'] . '">' . $nilai['nilai_huruf'] . "(" . $nilai['nilai_indeks'] . ")" . '</div></td>';
            } else {
                $output .= '<td width="10%"><input type="text" class="form-control" readonly></td>';
                $output .= '<td width="15%" class="text-center"></td>';
            }
            $output .= '</tr>';
            $output .= '</tr>';
        }
        echo $output;
    }

    public function data_nilai_ubah($id)
    {
        $data = $this->mcore->getInputNilaiMahasiswa($id)->result_array();
        $output = '';
        $i = 1;
        foreach ($data as $get) {
            $output .= '<tr id="bg-' . $get['nim'] . '">';
            $output .= '<td class="text-center">' . $i++ . '</td>';
            $output .= '<td class="fw-bold">' . $get['nim'] . '</td>';
            $output .= '<td>' . $get['nama_mahasiswa'] . '</td>';
            $output .= '<td>' . $get['nama_program_studi'] . '</td>';
            $output .= '<td>' . substr($get['id_periode'], 0, 4) . '</td>';

            if ($this->mcore->getNilaiMahasiswa($id, $get['nim'])->num_rows() > 0) {
                $nilai = $this->mcore->getNilaiMahasiswa($id, $get['nim'])->row_array();
                $output .= '<td width="10%">
                <input type="text" value="' . $nilai['nilai_angka'] . '" class="form-control" id="nilai_angka_input[]" name="nilai_angka_input[]" idmhs="' . $get['nim'] . '">
                <input type="text" value="' . $get['nim'] . '" hidden class="form-control" id="id_mhs[]" name="id_mhs[]">
                </td>';
                $output .= '<td width="15%" class="text-center"><div class="' . $get['nim'] . '">' . $nilai['nilai_huruf'] . "(" . $nilai['nilai_indeks'] . ")" . '</div></td>';
            } else {
                $output .= '<td width="10%">
                    <input type="text" class="form-control" id="nilai_angka_input[]" name="nilai_angka_input[]" idmhs="' . $get['nim'] . '">
                    <input type="text" value="' . $get['nim'] . '" hidden class="form-control" id="id_mhs[]" name="id_mhs[]">
                </td>';
                $output .= '<td width="15%" class="text-center"><div class="' . $get['nim'] . '"></div></td>';
            }

            $output .= '</tr>';
        }
        echo $output;
    }

    public function data_nilai_input()
    {
        $matkul = $this->db->query("SELECT token, id_perkuliahan_kelas, id_matkul FROM perkuliahan_kelas where id_perkuliahan_kelas = '$_POST[token]'")->row_array();
        $nilai = $_POST['nilai_angka_input'];
        $i = 0;

        foreach ($nilai as $get) {
            $nilai = $this->_saring_nilai($_POST['nilai_angka_input'][$i]);

            $nim = $_POST['id_mhs'][$i];
            $token = $_POST['token'];

            $data = [
                'nim' => $nim,
                'nilai_angka' => $_POST['nilai_angka_input'][$i],
                'nilai_huruf' => $nilai['nilai_huruf'],
                'nilai_indeks' => $nilai['nilai_index'],
                'id_matkul' => $matkul['id_matkul'],
                'id_perkuliahan_kelas' => $token,
                'id_semester' => "20222",
                'semester_perkuliahan' => "2022/2023 Genap"
            ];

            if ($this->mcore->getNilaiMahasiswa($token, $nim)->num_rows() > 0) {
                $query = $this->mcore->update_nilai($token, $nim, $data);
            } else {
                $query = $this->db->insert('perkuliahan_nilai', $data);
            }

            $i++;
        }
        echo json_encode(['status' => $query, 'token' => $matkul['token']]);
    }

    private function _saring_nilai($nilai_angka)
    {
        $nilai_huruf = "";
        $nilai_index = "";
        if ($nilai_angka >= 81.00 && $nilai_angka <= 100.00) {
            $nilai_huruf = "A";
            $nilai_index = 4.00;
        } else if ($nilai_angka >= 71.00 && $nilai_angka <= 80.99) {
            $nilai_huruf = "AB";
            $nilai_index = "3.50";
        } else if ($nilai_angka >= 66.00 && $nilai_angka <= 70.99) {
            $nilai_huruf = "B";
            $nilai_index = 3.00;
        } else if ($nilai_angka >= 61.00 && $nilai_angka <= 65.99) {
            $nilai_huruf = "BC";
            $nilai_index = 2.50;
        } else if ($nilai_angka >= 56.00 && $nilai_angka <= 60.99) {
            $nilai_huruf = "C";
            $nilai_index = 2.00;
        } else if ($nilai_angka >= 41.00 && $nilai_angka <= 55.99) {
            $nilai_huruf = "D";
            $nilai_index = 1.50;
        } else if ($nilai_angka >= 0.00 && $nilai_angka <= 40.00) {
            $nilai_huruf = "E";
            $nilai_index = 1.00;
        } else if ($nilai_angka == "") {
            $nilai_huruf = "E";
            $nilai_index = 0;
        } else {
            $nilai_huruf = "E";
            $nilai_index = "0";
        }

        return ['nilai_huruf' => $nilai_huruf, 'nilai_index' => $nilai_index];
    }

    public function get_nilai()
    {
        $nim = $_GET['nim'];
        $nilai_angka = $_GET['nilai'];
        $mhs = $this->mcore->infoMahasiswa($nim)->row_array();

        $skala = $this->mcore->getSkalaNilai($mhs['id_prodi'], $nilai_angka)->result_array();

        foreach ($skala as $get) {
            if ($nilai_angka >= $get['bobot_minimum'] && $nilai_angka <= $get['bobot_maksimum']) {
                $arr = [
                    'nilai_huruf' => $get['nilai_huruf'],
                    'nilai_indeks' => $get['nilai_indeks']
                ];
            } else if ($nilai_angka >= 101) {
                $arr = [
                    'nilai_huruf' => 'format',
                    'nilai_indeks' => 'salah'
                ];
            }
        }
        echo json_encode($arr);
    }

    public function data_user()
    {
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
            $output .= '<td class="text-center" width="10">' . $i++ . '</td>';
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
            // $output .= '<td class="text-center" width="10">' . $i++ . '</td>';
            $output .= '<td class="fw-bold"><a href="' . base_url('#/detail_wali/') . $get['token'] . '">' . $get['nama_dosen'] . '</a></td>';
            $output .= '<td>' . $this->mcore->getMahasiswaDosenWali($get['token'])->num_rows() . '</td>';
            // $output .= '<td>
            // <a href="' . base_url('#/detail_wali/') . $get['token'] . '" class="btn btn-info btn-sm rounded-pill iq-cancel-btn" style="padding:1px;">
            // <i class="bi bi-search"></i> Detail
            // </a>
            // <a href="javascript:void(0);" class="btn btn-outline-danger rounded-circle btn-icon btn-sm p-2">
            // <span class="btn-inner">
            // <i class="bi bi-trash" style="font-size:11px;"></i>
            // </span>                            
            // </a>
            // </td>';
            $output .= '</tr>';
        }

        echo $output;
    }

    public function info_dosen()
    {
        $token = $_GET['token'];
        $data = $this->mcore->getinfoDosen($token)->row_array();

        echo json_encode($data);
    }

    public function data_detail_wali()
    {
        $token = $_GET['token'];
        $data = $this->mcore->getDetailWali($token)->result_array();
        $output = "";
        $i = 1;
        foreach ($data as $get) {
            $output .= '<tr>';
            $output .= '<td class="text-center">' . $i++ . '</td>';
            $output .= '<td>' . $get['nim'] . '</td>';
            $output .= '<td>' . $get['nama_mahasiswa'] . '</td>';
            $output .= '<td>' . $get['nama_program_studi'] . '</td>';
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

    public function data_dosen_wali_mhs()
    {
        $id = $this->session->userdata('id_user');
        $role = $this->session->userdata('role');
        $data = $this->mcore->getDosenWaliMahasiswa($id, $role)->result_array();
        $i = 1;
        foreach ($data as $get) {
            $krs = $this->mcore->hitungSksPengajuanKRS($get['nim'], $get['id_prodi'])->row_array();
            $output[] = [
                'no' => $i++,
                'nim' => $get['nim'],
                'nama_mahasiswa' => $get['nama_mahasiswa'],
                'totalSks' => (int) $krs['totalSks'],
                'detail' => '<a href="#/detail_krs/' . $get['nim'] . '" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Detail KRS</a>',
                'nama_status_mahasiswa' => $get['nama_status_mahasiswa'],
                'action' => ''
            ];
        };
        $this->output->set_content_type('aplication/json')->set_output(json_encode($output));
    }

    public function detail_info_mhs()
    {
        $nim = $_GET['nim'];

        $data = $this->mcore->getDetailMahasiswa($nim)->row_array();

        echo json_encode($data);
    }

    public function detail_krs_mahasiswa()
    {
        $nim = $_GET['nim'];
        $mhs = $this->mcore->getDetailMahasiswa($nim)->row_array();

        $data = $this->mcore->getDataKrsMhs($nim, $mhs['id_prodi'])->result_array();

        echo '
        <table class="display expandable-table table table-sm table-hover text-black" id="tableKRS">
                    <thead>
                        <tr class="text-center bg-primary text-white">
                            <th width="10" valign="middle"></th>
                            <th valign="middle">Nama Mata Kuliah</th>
                            <th width="10" valign="middle">SKS</th>
                            <th valign="middle">Ruang</th>
                            <th valign="middle">Hari</th>
                            <th valign="middle">Waktu Mulai</th>
                            <th valign="middle">Waktu Selesai</th>
                            <th width="10" valign="middle">Semester</th>
                            <th valign="middle">Status</th>
                            <th valign="middle">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
        ';

        foreach ($data as $val) {

            $status = $val['statusKrs'] == 1 ? 'Disetujui' : '';

            if ($status > 0) {
                $cek = '<td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td>';
            } else {
                $cek = '<td class="text-center"><input type="checkbox" style="padding:8px;" class="form-check-input" name="id_perkuliahan[]" id="id_perkuliahan[]" value="' . $val['id_perkuliahan_kelas'] . '"></td>';
            }
            $dosen = $this->mcore->getDataDosenKrs($val['id_perkuliahan_kelas'])->row_array();
            $kecil = strtolower($dosen['nama_dosen']);

            echo '
                <tr>
                    ' . $cek . '
                    <td><b class="text-black">' . $val['nama_mata_kuliah'] . '</b><br>' . ucwords($kecil) . '</td>
                    <td class="text-center">' . (int) $val['sks_mata_kuliah'] . '</td>
                    <td>' . $val['nama_ruangan'] . '</td>
                    <td class="text-center">' . $val['hari'] . '</td>
                    <td class="text-center">' . $val['jam_awal'] . '</td>
                    <td class="text-center">' . $val['jam_akhir'] . '</td>
                    <td class="text-center">' . $val['semester'] . '</td>
                    <td class="text-center">' . $status . '</td>
                    <td>
                        <a href="" class="bg-soft-danger rounded-pill iq-custom-badge">
                            Tolak
                            <button class="btn btn-danger btn-sm rounded-pill iq-cancel-btn">
                                <svg width="14" height="14" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </a>
                    </td>
                </tr>
            ';
        }
        $sks = $this->mcore->hitungSksPengajuanKRS($nim, $mhs['id_prodi'])->row_array();
        echo '
        </tbody>
        <tfoot>
            <tr class="fw-bold">
                <td></td>
                <td>Total SKS</td>
                <td class="text-center">' . (int) $sks['totalSks'] . '</td>
            </tr>
        </tfoot>
        
        ';
    }

    public function validasi_krs()
    {
        $id = $_POST['id_perkuliahan'];

        for ($i = 0; $i < count($id); $i++) {
            $this->db->where('id_perkuliahan_kelas', $_POST['id_perkuliahan'][$i]);
            $this->db->update('perkuliahan_mahasiswa', ['status' => 1]);
        }
        // echo json_encode($data);
    }

    public function data_khs_detail()
    {
        $nim = $_GET['nim'];
        $semester = $this->mcore->getSemesterKhs($nim)->result_array();
        $output = '<option value=""></option>';
        foreach ($semester as $get) {
            $output .= '<option value="' . $get['id_semester'] . '">' . $get['nama_semester'] . '</option>';
        }
        echo $output;
    }

    public function info_mahasiswa()
    {
        $nim = $_GET['nim'];
        $data = $this->mcore->infoMahasiswa($nim)->row_array();

        echo json_encode($data);
    }

    public function tampil_khs_mahasiswa()
    {
        $semester = $_GET['semester'];
        $nim = $_GET['nim'];
        $prodi = $this->mcore->infoMahasiswa($nim)->row_array();
        $data = $this->mcore->getKhsMahasiswa($nim, $semester, $prodi['id_prodi'])->result_array();
        $output = "";
        $i = 1;
        $total = 0.0;
        foreach ($data as $get) {
            $output .= '<tr>';
            $output .= '<td style="text-align:center">' . $i++ . '</td>';
            $output .= '<td>' . $get['kode_mata_kuliah'] . '</td>';
            $output .= '<td>' . $get['nama_mata_kuliah'] . '</td>';
            $output .= '<td style="text-align:right">' . $get['sks_mata_kuliah'] . '</td>';
            $output .= '<td style="text-align:center">' . $get['nilai_angka'] . '</td>';
            $output .= '<td style="text-align:center">' . $get['nilai_huruf'] . '</td>';
            $output .= '<td style="text-align:center">' . $get['nilai_indeks'] . '</td>';
            $hitung = $get['sks_mata_kuliah'] * $get['nilai_indeks'];
            $output .= '<td style="text-align:right">' . number_format($hitung, 2) . '</td>';
            $total += $hitung;
            $output .= '</tr>';
        }
        $output .= '<tr>
            <td colspan="3" align="right"><strong>Jumlah</strong></td>
            <td style="text-align:right">' . $this->mcore->getJumlahKhs($nim, $semester) . '</td>
            <td colspan="3"></td>
            <td style="text-align:right">' . $total . '</td>
        </tr>';
        $output .= '<tr>
            <td colspan="7" align="right"><strong>IPS ( Indeks Prestasi Semester )</strong></td>
            <th style="text-align:right">' . number_format($total / $this->mcore->getJumlahKhs($nim, $semester), 2) . '</th>
        </tr>';
        echo $output;
    }

    public function data_perkuliahan_kelas_dosen()
    {
        $dosen = $this->session->userdata('id_user');
        $data = $this->mcore->getKelasPerkuliahanDosen($dosen)->result_array();
        $i = 1;
        foreach ($data as $get) {
            $output[] = [
                'no' => $i++,
                'aksi' => '<a href="' . base_url('#/detail_nilai_perkuliahan/') . $get['token'] . '" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i> Input Nilai</a>',
                'semester_perkuliahan' => $get['semester_perkuliahan'],
                'kode_mata_kuliah' => '<a href="' . base_url('#/detail_nilai_perkuliahan/') . $get['token'] . '">' . $get['kode_mata_kuliah'] . '</a>',
                'nama_mata_kuliah' => $get['nama_mata_kuliah'],
                'nama_kelas' => $get['nama_kelas'],
                'peserta' => $this->mcore->getJumlahMhsKelas($get['id_perkuliahan_kelas']),
                'dinilai' => $this->mcore->getJumlahMhsNilai($get['id_perkuliahan_kelas'])
            ];
        }

        $this->output->set_content_type('aplication/json')->set_output(json_encode($output));
    }

    public function aktif_menu()
    {
        $kode = $_POST['kode'];
        $link = "";
        if ($kode == "validasi_krs") {
            $link = "- Validasi KRS";
        } else if ($kode == "mahasiswa") {
            $link = "- Data Mahasiswa";
        } else if ($kode == "dosen") {
            $link = "- Data Dosen";
        } else if ($kode == "prodi") {
            $link = "- Data Prodi";
        } else if ($kode == "gedung") {
            $link = "- Data Gedung";
        } else if ($kode == "kelas_perkuliahan") {
            $link = "- Kelas Perkuliahan";
        } else if ($kode == "nilai_perkuliahan") {
            $link = "- Nilai Perkuliahan";
        } else if ($kode == "dosen_wali") {
            $link = "- Dosen Wali";
        } else if ($kode == "global_setting") {
            $link = "- Setting Global";
        }

        echo json_encode(['link' => $link]);
    }

    public function data_setting()
    {
        $data = $this->mcore->getDataSetting()->result_array();
        $i = 1;
        $output = "";
        foreach ($data as $get) {
            $perhitungan = $get['perhitungan'] == 0 ? "Nilai Tertinggi" : "Nilai Terbaru";
            $output .= "<tr>";
            $output .= "<td>" . $i++ . "</td>";
            $output .= "<td>" . $get['nama_semester'] . "</td>";
            $output .= "<td>" . $get['batas_sks_krs'] . "</td>";
            $output .= "<td>" . $perhitungan . "</td>";
            $status = $get['status_setting'] == 1 ? "Aktif" : "Non-Aktif";
            $output .= "<td>" . $status . "</td>";
            $output .= "</tr>";
        }
        echo $output;
    }

    public function data_prodi_setting()
    {
        $data = $this->mcore->getAllSetting()->result_array();
        $output = "";
        foreach ($data as $get) {
            $cek_krs = $get['open_krs'] == 1 ? 'checked' : '';
            $cek_penilaian = $get['open_penilaian'] == 1 ? 'checked' : '';
            $cek_khs = $get['open_khs'] == 1 ? 'checked' : '';
            $cek_kuisioner = $get['open_kuisioner'] == 1 ? 'checked' : '';

            $output .= "<tr>";
            $output .= "<td class='text-center'>" . $get['kode_program_studi'] . "</td>";
            $output .= "<td class='text-center'>" . $get['nama_program_studi'] . "</td>";
            $output .= "<td class='text-center'>
                <div class='form-check form-switch d-flex justify-content-center'>
                    <input class='form-check-input buka-akses' tipe='krs' style='padding:8px; cursor:pointer' type='checkbox' role='switch' id='" . $get['id_prodi'] . "' " . $cek_krs . ">
                    <label class='form-check-label' for='buka'></label>
                </div>
            </td>";
            $output .= "<td class='text-center d-flex justify-content-center'>
                <div class='form-check form-switch'>
                    <input class='form-check-input buka-akses' tipe='penilaian' type='checkbox' style='padding:8px; cursor:pointer' role='switch' id='" . $get['id_prodi'] . "' " . $cek_penilaian . ">
                    <label class='form-check-label' for=''></label>
                </div>
            </td>";
            $output .= "<td class='text-center'>
                <div class='form-check form-switch d-flex justify-content-center'>
                    <input class='form-check-input buka-akses' tipe='khs' type='checkbox' style='padding:8px; cursor:pointer' role='switch' id='" . $get['id_prodi'] . "' " . $cek_khs . ">
                    <label class='form-check-label' for=''></label>
                </div>
            </td>";
            $output .= "<td class='text-center'>
                <div class='form-check form-switch d-flex justify-content-center'>
                    <input class='form-check-input buka-akses' tipe='kuisioner' type='checkbox' style='padding:8px; cursor:pointer' role='switch' id='" . $get['id_prodi'] . "' " . $cek_kuisioner . ">
                    <label class='form-check-label' for=''></label>
                </div>
            </td>";
            $output .= "</tr>";
        }
        echo $output;
    }

    public function update_akses_global()
    {
        $idprodi = $_GET['id_prodi'];
        $cek = $this->db->get_where('setting_akses', ['id_prodi' => $idprodi])->row_array();

        $tipe = $_GET['tipe'];

        if ($tipe == 'krs') {
            if ($cek['open_krs'] == 1) {
                $pesan = 0;
                $this->mcore->update_akses($idprodi, 'open_krs', 0);
            } else {
                $pesan = 1;
                $this->mcore->update_akses($idprodi, 'open_krs', 1);
            }
        } else if ($tipe == 'penilaian') {
            if ($cek['open_penilaian'] == 1) {
                $pesan = 0;
                $this->mcore->update_akses($idprodi, 'open_penilaian', 0);
            } else {
                $pesan = 1;
                $this->mcore->update_akses($idprodi, 'open_penilaian', 1);
            }
        } else if ($tipe == 'khs') {
            if ($cek['open_khs'] == 1) {
                $pesan = 0;
                $this->mcore->update_akses($idprodi, 'open_khs', 0);
            } else {
                $pesan = 1;
                $this->mcore->update_akses($idprodi, 'open_khs', 1);
            }
        } else {
            if ($cek['open_kuisioner'] == 1) {
                $pesan = 0;
                $this->mcore->update_akses($idprodi, 'open_kuisioner', 0);
            } else {
                $pesan = 1;
                $this->mcore->update_akses($idprodi, 'open_kuisioner', 1);
            }
        }

        echo json_encode(['pesan' => $pesan]);
    }

    public function data_semester()
    {
        $data = $this->mcore->getSemester()->result_array();
        echo '<option value=""></option>';
        foreach ($data as $get) {
            echo '<option value="' . $get['id_semester'] . '">' . $get['nama_semester'] . '</option>';
        }
    }

    public function data_laporan_krs()
    {
        $semester = $_GET['semester'];
        $nim = $_GET['nim'];

        $data = $this->mcore->getKrsLaporan($nim, $semester)->result_array();
        $no = 1;
        $html = "";
        foreach ($data as $get) {
            $html .= "<tr>";
            $html .= "<td>" . $no++ . "</td>";
            $html .= "<td>" . $get['kode_mata_kuliah'] . "</td>";
            $html .= "<td>" . $get['nama_mata_kuliah'] . "</td>";
            $html .= "<td>" . $get['sks_mata_kuliah'] . "</td>";
            $html .= "</tr>";
        }

        echo $html;
    }

    public function data_pilih_semester()
    {
        $semester = $this->mcore->getSemester()->result_array();
        echo "<option value=''></option>";
        foreach ($semester as $get) {
            echo "<option value='" . $get['id_semester'] . "'>" . $get['nama_semester'] . "</option>";
        }
    }
}

/* End of file Core.php and path \application\controllers\Core.php */
