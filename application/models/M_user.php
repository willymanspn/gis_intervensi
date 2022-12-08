<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function getAdmin()
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_role', 'tb_role.id_role = tb_user.id_role', 'left');
        $this->db->order_by('id_user', 'desc');
        return $this->db->get()->result();
    }

    public function getRole()
    {
        $this->db->select('*');
        $this->db->from('tb_role');
        return $this->db->get()->result();
    }

    // Mengambil data berdasarjan id_kecamatan
    public function detail($id_user)
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('id_user', $id_user);
        return $this->db->get()->row();
    }

    // Edit Data
    public function edit($edit)
    {
        $this->db->where('id_user', $edit['id_user']);
        $this->db->update('tb_user', $edit);
    }

    // Delete Data
    public function delete($delete)
    {
        $this->db->where('id_user', $delete['id_user']);
        $this->db->delete('tb_user', $delete);
    }
}
