<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_ikm extends CI_Model
{

    // Mengambil semua data
    public function get()
    {
        // $this->db->select('*');
        // $this->db->from('tb_ikm');
        // return $this->db->get()->result();

        // Dengan Join 2 Table
        // $this->db->select('*');
        // $this->db->from('tb_kecamatan');
        // $this->db->join('tb_ikm', 'tb_ikm.kd_kecamatan = tb_kecamatan.kd_kecamatan');

        // Dengan Join 3 Table
        // $this->db->select('*');
        // $this->db->from('tb_kecamatan');
        // $this->db->join('tb_ikm', 'tb_kecamatan.id_kecamatan = tb_ikm.id_kecamatan');
        // $this->db->join('tb_kategori', 'tb_ikm.id_kategori = tb_kategori.id_kategori');

        // Dengan Join 3 Table
        $this->db->select('*');
        $this->db->from('tb_ikm');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_ikm.id_kecamatan', 'left');
        $this->db->join('tb_kelurahan', 'tb_kelurahan.id_kelurahan = tb_ikm.id_kelurahan', 'left');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_ikm.id_kategori', 'left');
        $this->db->join('tb_produk', 'tb_produk.id_produk = tb_ikm.id_produk', 'left');
        $this->db->order_by('id_ikm', 'desc');

        return $this->db->get()->result();
    }

    public function get_geo()
    {

        $this->db->select('*');
        $this->db->from('tb_kecamatan');

        return $this->db->get()->result();
    }

    // Simpan data ke db
    public function input($data)
    {
        $this->db->insert('tb_ikm', $data);
    }

    // Mengambil data berdasarjan id_ikm
    public function detail($id_ikm)
    {
        $this->db->select('*');
        $this->db->from('tb_ikm');
        $this->db->where('id_ikm', $id_ikm);
        return $this->db->get()->row();
    }

    // Edit Data
    public function edit($edit)
    {
        $this->db->where('id_ikm', $edit['id_ikm']);
        $this->db->update('tb_ikm', $edit);
    }

    // Delete Data
    public function delete($delete)
    {
        $this->db->where('id_ikm', $delete['id_ikm']);
        $this->db->delete('tb_ikm', $delete);
    }
}
