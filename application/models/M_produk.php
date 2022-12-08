<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_produk extends CI_Model
{

    // Mengambil semua data
    public function get()
    {
        // Dengan Join 3 Table
        $this->db->select('*');
        $this->db->from('tb_produk');
        return $this->db->get()->result();
    }

    public function input($data)
    {
        $this->db->insert('tb_produk', $data);
    }

    // Edit Data
    public function edit($edit)
    {
        $this->db->where('id_produk', $edit['id_produk']);
        $this->db->update('tb_produk', $edit);
    }
}
