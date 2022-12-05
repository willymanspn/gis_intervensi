<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{

    // Mengambil semua data
    public function get()
    {
        $this->db->select('*');
        $this->db->from('tb_ikm');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_ikm.id_kecamatan', 'left');
        $this->db->join('tb_kelurahan', 'tb_kelurahan.id_kelurahan = tb_ikm.id_kelurahan', 'left');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_ikm.id_kategori', 'left');
        return $this->db->get()->result();
    }

    public function get_kec()
    {
        $this->db->select('*');
        $this->db->from('tb_kecamatan');
        return $this->db->get()->result();
    }

    public function ikm_count()
    {
        return $this->db->get('tb_ikm')->num_rows();
    }

    public function kec_count()
    {
        return $this->db->get('tb_kecamatan')->num_rows();
    }

    public function kel_count()
    {
        return $this->db->get('tb_kelurahan')->num_rows();
    }

    public function kategori_count()
    {
        return $this->db->get('tb_kategori')->num_rows();
    }

    public function admin_count()
    {
        return $this->db->get('tb_user')->num_rows();
    }
}
