<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kelurahan extends CI_Model
{
    public function get()
    {
        $this->db->select('*');
        $this->db->from('tb_kelurahan');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan', 'left');
        return $this->db->get()->result();
    }

    public function input($data)
    {
        $this->db->insert('tb_kelurahan', $data);
    }

    // Edit Data
    public function edit($edit)
    {
        $this->db->where('id_kelurahan', $edit['id_kelurahan']);
        $this->db->update('tb_kelurahan', $edit);
    }

    // Mengambil data berdasarjan id_kecamatan
    public function detail($id_kelurahan)
    {
        $this->db->select('*');
        $this->db->from('tb_kelurahan');
        $this->db->where('id_kelurahan', $id_kelurahan);
        return $this->db->get()->row();
    }

    // Delete Data
    public function delete($delete)
    {
        $this->db->where('id_kelurahan', $delete['id_kelurahan']);
        $this->db->delete('tb_kelurahan', $delete);
    }
}
