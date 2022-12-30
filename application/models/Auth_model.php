<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function loginAdminValidatin($username, $password)
    {
        return $this->db->get_where('tb_akun', ['username_akun' => $username, 'password_akun' => md5($password)]);
    }
}


/* End of file Auth_model.php and path \application\models\Auth_model.php */
