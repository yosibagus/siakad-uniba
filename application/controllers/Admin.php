<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id_operator'))) {
            redirect('auth');
        }
    }

    public function index()
    {
        $this->load->view('layout/template');
    }

    public function home()
    {
        $this->load->model('Core_model', 'mcore');
        if ($this->session->userdata('level_operator') == "dosen") {
            $dosen = $this->session->userdata('id_user');
            $role = $this->session->userdata('level_operator');
            $data['total_kelas_perkuliahan'] = $this->mcore->getKelasPerkuliahanDosen($dosen)->num_rows();
            $data['total_perwalian'] = $this->mcore->getDosenWaliMahasiswa($dosen, $role)->num_rows();
            $this->load->view('admin/home/home_dosen', $data);
        } else {
            $data['total_mahasiswa'] = $this->mcore->getAllMulti('master_mahasiswa')->num_rows();
            $data['semester_aktif'] = $this->mcore->semesterDetail($this->mcore->getSemesterAktif());
            $this->load->view('admin/home/home', $data);
        }
    }

    public function mahasiswa()
    {
        $this->load->view('admin/mahasiswa/mahasiswa_list');
    }

    public function dosen()
    {
        $this->load->view('admin/dosen/dosen_list');
    }

    public function dosen_tambah()
    {
        $this->load->view('admin/dosen/dosen_tambah');
    }

    public function kurikulum()
    {
        $this->load->view('admin/kurikulum/kurikulum_list');
    }

    public function kurikulum_detail($id)
    {
        $data['id'] = $id;
        $this->load->view('admin/kurikulum/kurikulum_detail', $data);
    }

    public function gedung()
    {
        $this->load->view('admin/gedung/gedung_list');
    }

    public function ruangan()
    {
        $this->load->model('Core_model', 'mcore');
        $data['gedung'] = $this->mcore->gedungByid($_GET['id'])->row_array();
        $this->load->view('admin/ruangan/ruangan_list', $data);
    }

    public function tambahruangan()
    {
        $this->load->view('admin/ruangan/ruangan_tambah');
    }

    public function prodi()
    {
        $this->load->view('admin/prodi/prodi_list');
    }

    public function matakuliah()
    {
        $this->load->view('admin/matakuliah/matakuliah_list');
    }

    public function kelas_perkuliahan($semester = null)
    {
        $this->load->model('Core_model', 'mcore');
        $data['aktif'] = $this->mcore->semesterDetail($semester);
        $data['semester'] = $semester;
        $this->load->view('admin/perkulihan/kelas_perkuliahan_list', $data);
    }

    public function kelas_perkuliahan_tambah()
    {
        $this->load->model('Core_model', 'mcore');
        $data['prodi'] = $this->mcore->getAllMulti('master_prodi')->result_array();
        $data['matkul'] = $this->mcore->getAllMulti('master_matkul')->result_array();
        $data['gedung'] = $this->mcore->getAllMulti('master_gedung')->result_array();
        $data['semester'] = $this->mcore->getSemesterAktifKuliah();
        $this->load->view('admin/perkulihan/kelas_perkuliahan_tambah', $data);
    }

    public function detail_perkuliahan($token)
    {
        $data['token'] = $token;
        $this->load->view('admin/perkulihan/detail_perkuliahan', $data);
    }

    public function kolektif_mahasiswa($token)
    {
        $this->load->model('Core_model', 'mcore');
        $data['detail'] = $this->mcore->getKelasPerkuliahanDetail($token)->row_array();
        $this->load->view('admin/perkulihan/kolektif_mahasiswa', $data);
    }

    public function nilai_perkuliahan()
    {
        $this->load->view('admin/perkulihan/nilai_perkuliahan');
    }

    public function detail_nilai_perkuliahan($id)
    {
        $data['token'] = $id;
        $this->load->model('Core_model', 'mcore');
        $data['detail'] = $this->mcore->getKelasPerkuliahanDetail($id)->row_array();
        $data['semester_aktif'] = $this->mcore->getSemesterAktif() == $data['detail']['id_semester'] ? 1 : 0;
        $data['fitur_nilai'] = $this->mcore->fitur_nilai_lock($data['detail']['id_prodi'])->row_array();
        $this->load->view('admin/perkulihan/detail_nilai_perkuliahan', $data);
    }

    public function global_setting()
    {
        $this->load->view('admin/setting/setting');
    }

    public function daftar_user()
    {
        $this->load->view('admin/user/daftar_user');
    }

    public function tambah_user()
    {
        $this->load->view('admin/user/tambah_user');
    }

    public function generate_mahasiswa()
    {
        $this->load->view('admin/user/generate_mahasiswa');
    }

    public function generate_dosen()
    {
        $this->load->view('admin/user/generate_dosen');
    }

    public function dosen_wali()
    {
        $this->load->view('admin/dosen/dosen_wali');
    }

    public function data_wali()
    {
        $this->load->view('admin/dosen/data_dosen_wali');
    }

    public function kolektif_wali_mhs()
    {
        $this->load->view('admin/dosen/dosen_wali_kolektif');
    }

    public function validasi_krs()
    {
        $this->load->view('admin/dosen/validasi_krs');
    }

    public function detail_krs($id)
    {
        $data['nim'] = $id;
        $this->load->view('admin/dosen/detail_krs', $data);
    }

    public function setting_tema()
    {
        $this->load->view('admin/setting/tema');
    }

    public function khs_mhs($nim)
    {
        $data['nim'] = $nim;
        $this->load->view('admin/khs/khs_detail', $data);
    }

    public function detail_wali($token)
    {
        $data['token'] = $token;
        $this->load->view('admin/dosen_wali/detail_wali', $data);
    }

    public function kelas_perkuliahan_order()
    {
        $this->load->view('admin/perkuliahan/kelas_perkuliahan_order');
    }

    public function ubah_nilai($id)
    {
        $data['id_perkuliahan'] = $id;
        $this->load->view('admin/perkulihan/edit_nilai_perkuliahan', $data);
    }

    public function lap_krs()
    {
        $this->load->view('admin/laporan/krs');
    }

    public function print_krs($semester, $nim)
    {
        $this->load->library('pdfgenerator');
        $data['title_pdf'] = $nim . ' - Kartu Rencana Studi';
        $file_pdf = "KRS Periode - " . $semester;
        $paper = 'A4';
        $orientation = "portrait";

        $data['detail'] = $this->detail_mhs_krs($nim, $semester);
        $data['krs'] = $this->detail_matkul_krs($nim, $semester);
        $html = $this->load->view('admin/laporan/krs_print', $data, true);
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);

        // $data['detail'] = $this->detail_mhs_krs($nim, $semester);
        // $data['krs'] = $this->detail_matkul_krs($nim, $semester);
        // $html = $this->load->view('admin/laporan/krs_print', $data);
    }

    private function detail_mhs_krs($nim, $semester)
    {
        $this->load->model('Core_model', 'mcore');
        $mhs = $this->mcore->infoMahasiswa($nim)->row_array();
        $smt = $this->mcore->getSemester($semester)->row_array();

        $data = [
            'nama_mahasiswa' => $mhs['nama_mahasiswa'],
            'nama_program_studi' => $mhs['nama_program_studi'],
            'id_prodi' => $mhs['id_prodi'],
            'nim' => $mhs['nim'],
            'id_semester' => $smt['id_semester'],
            'semester' => $smt['nama_semester']
        ];

        return $data;
    }

    private function detail_matkul_krs($nim, $semester)
    {
        $this->load->model('Core_model', 'mcore');
        $mhs = $this->mcore->infoMahasiswa($nim)->row_array();
        $data = $this->mcore->getDataSemesterKrsPrint($nim, $mhs['id_prodi'], $semester)->result_array();

        return $data;
    }

    public function ubah_setting()
    {
        $this->load->view('admin/setting/setting_edit');
    }

    public function set_mahasiswa($id = null)
    {
        if (empty($id)) {
            $this->load->view('admin/mahasiswa/mahasiswa_set');
        } else {
            $this->load->model('Core_model', 'mcore');
            $data['id_prodi'] = $id;
            $data['prodi'] = $this->mcore->getDetailProdi($id)->row_array();
            $this->load->view('admin/mahasiswa/mahasiswa_set_action', $data);
        }
    }

    public function pembayaran()
    {
        $this->load->view('admin/keuangan/pembayaran');
    }
}

/* End of file Admin.php and path \application\controllers\Admin.php */
