<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kategori extends CI_Model
{

    // Mengambil semua data
    public function get()
    {
        // Dengan Join 3 Table
        $this->db->select('*');
        $this->db->from('tb_kategori');
        return $this->db->get()->result();
    }

    public function input($data)
    {
        $this->db->insert('tb_kategori', $data);
    }

    // Edit Data
    public function edit($edit)
    {
        $this->db->where('id_kategori', $edit['id_kategori']);
        $this->db->update('tb_kategori', $edit);
    }
}
