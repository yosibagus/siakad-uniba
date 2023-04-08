<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model', 'mauth');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login_admin');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $cek = $this->mauth->loginAdminValidatin($username, $password)->num_rows();
            if ($cek > 0) {
                $get = $this->mauth->loginAdminValidatin($username, $password)->row_array();

                if ($get['role'] == 'mahasiswa') {
                    echo "Bukan Role Anda, Kunjungi siakad.unibamadura.ac.id";
                } else {
                    $array = array(
                        'id_operator' => $get['id_akun'],
                        'id_user' => $get['id_user'],
                        'nama_operator' => $get['username_akun'],
                        'nama_akun' => $get['nama_akun'],
                        'level_operator' => $get['role']
                    );

                    $this->session->set_userdata($array);

                    echo "<script>window.location.href='" . base_url() . "'</script>";
                }
            } else {
                echo "login gagal, cek username/password anda";
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id_operator');
        $this->session->unset_userdata('nama_operator');
        $this->session->unset_userdata('level_operator');
        redirect('auth');
    }
}

/* End of file Auth.php and path \application\controllers\Auth.php */
