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

    public function header()
    {
        $this->load->view('template/header');
    }

    public function home()
    {
        $this->load->view('admin/home/home');
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

    public function kurikulum_detail()
    {
        $this->load->view('admin/kurikulum/kurikulum_detail');
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

    public function kelas_perkuliahan()
    {
        $this->load->view('admin/perkulihan/kelas_perkuliahan_list');
    }

    public function kelas_perkuliahan_tambah()
    {
        $this->load->model('Core_model', 'mcore');
        $data['prodi'] = $this->mcore->getAllMulti('master_prodi')->result_array();
        $data['matkul'] = $this->mcore->getAllMulti('master_matkuls')->result_array();
        $data['gedung'] = $this->mcore->getAllMulti('master_gedung')->result_array();
        $this->load->view('admin/perkulihan/kelas_perkuliahan_tambah', $data);
    }

    public function detail_perkuliahan()
    {
        $this->load->view('admin/perkulihan/detail_perkuliahan');
    }

    public function kolektif_mahasiswa()
    {
        $token = $_GET['token'];
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

    public function generate_mahasiswa()
    {
        $this->load->view('admin/user/generate_mahasiswa');
    }
}

/* End of file Admin.php and path \application\controllers\Admin.php */
