<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kecamatan extends CI_Model
{
    public function get()
    {
        $this->db->select('*');
        $this->db->from('tb_kecamatan');
        return $this->db->get()->result();
    }

    public function input($data)
    {
        $this->db->insert('tb_kecamatan', $data);
    }

    // Mengambil data berdasarjan id_kecamatan
    public function detail($id_kecamatan)
    {
        $this->db->select('*');
        $this->db->from('tb_kecamatan');
        $this->db->where('id_kecamatan', $id_kecamatan);
        return $this->db->get()->row();
    }

    // Edit Data
    public function edit($edit)
    {
        $this->db->where('id_kecamatan', $edit['id_kecamatan']);
        $this->db->update('tb_kecamatan', $edit);
    }

    // Delete Data
    public function delete($delete)
    {
        $this->db->where('id_kecamatan', $delete['id_kecamatan']);
        $this->db->delete('tb_kecamatan', $delete);
    }
}
