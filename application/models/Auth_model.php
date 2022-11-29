<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function loginAdminValidatin($username, $password)
    {
        return $this->db->get_where('operator_sistem', ['username_operator' => $username, 'password_operator' => md5($password)]);
    }
}


/* End of file Auth_model.php and path \application\models\Auth_model.php */
