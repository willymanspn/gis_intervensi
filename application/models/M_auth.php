<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
    public function input($data)
    {
        $this->db->insert('tb_user', $data);
    }

    public function login_check($username)
    {
        return $this->db->get_where('tb_user', ['username' => $username])->row_array();
    }
}
