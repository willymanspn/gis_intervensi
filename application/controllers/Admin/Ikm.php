<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ikm extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_ikm');
        $this->load->model('M_kecamatan');
        $this->load->model('M_kelurahan');
        $this->load->model('M_kategori');
        $this->load->model('M_auth');
        $this->load->model('M_produk');
        if ($this->session->userdata('id_role') != 2) {
            redirect('Auth');
        }
    }

    public function index()
    {
        // Load view + template
        $data = array(
            'title' => 'GIS IKM',
            'content' => 'Admin/Ikm/v_ikm',
            'user' => $this->M_auth->login_check($this->session->userdata('username')),
            'location' => $this->M_ikm->get(),
            'kecamatan' => $this->M_kecamatan->get(),
            'g_kecamatan' => $this->M_kecamatan->get(),
        );
        $this->load->view('Layouts/UserLayout/index', $data, false);
    }

    public function inputForm()
    {
        $this->form_validation->set_rules('nm_ikm', 'Nama IKM', 'required', []);
        // $this->form_validation->set_rules('id_produk', 'Nama Produk', 'required', []);
        $this->form_validation->set_rules('alamat_ikm', 'Alamat IKM', 'required', []);
        $this->form_validation->set_rules('id_kecamatan', 'Kecamatan', 'required', []);
        $this->form_validation->set_rules('id_kelurahan', 'Kelurahan', 'required', []);
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required', []);
        $this->form_validation->set_rules('latitude', 'Latitude', 'required', []);
        $this->form_validation->set_rules('longitude', 'Longitude', 'required', []);

        if ($this->form_validation->run() == FALSE) {

            // Load view + template
            $data = array(
                'title' => 'Form Input IKM',
                'content' => 'Admin/Ikm/v_input',
                'user' => $this->M_auth->login_check($this->session->userdata('username')),
                'location' => $this->M_ikm->get(),
                'kecamatan' => $this->M_kecamatan->get(),
                'kelurahan' => $this->M_kelurahan->get(),
                'kategori' => $this->M_kategori->get(),
                'produk' => $this->M_produk->get(),
                // 'location' => $this->IkmModel->get(),
                // 'kecamatan' => $this->KecamatanModel->get(),
                // 'kelurahan' => $this->KelurahanModel->get(),
                // 'kategori' => $this->KategoriModel->get()
            );
            $this->load->view('Layouts/UserLayout/index', $data, false);
        } else {
            // Simpan data ke DB
            $data = array(
                'nm_ikm' => $this->input->post('nm_ikm'),
                'produk_ikm' => implode(", ", $this->input->post('produk_ikm')),
                'alamat_ikm' => $this->input->post('alamat_ikm'),
                'no_hp' => $this->input->post('no_hp'),
                'id_kecamatan' => $this->input->post('id_kecamatan'),
                'id_kelurahan' => $this->input->post('id_kelurahan'),
                'id_kategori' => $this->input->post('id_kategori'),
                'date_created' => $this->input->post('date_created'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
            );
            // $this->namaModel->input(variabel penampung);
            $this->M_ikm->input($data);

            // Pesan data berhasil diinput
            $this->session->set_flashdata('pesan', 'Data pemetaan berhasil disimpan !');

            // redirect('namaControler/method');
            redirect('Admin/Ikm/inputForm');
        }
    }

    public function editForm($id_ikm)
    {
        $this->form_validation->set_rules('nm_ikm', 'Nama IKM', 'required', []);
        $this->form_validation->set_rules('produk_ikm', 'Produk', 'required', []);
        $this->form_validation->set_rules('alamat_ikm', 'Alamat IKM', 'required', []);
        $this->form_validation->set_rules('id_kecamatan', 'Kecamatan', 'required', []);
        $this->form_validation->set_rules('id_kelurahan', 'Kelurahan', 'required', []);
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required', []);
        $this->form_validation->set_rules('latitude', 'Latitude', 'required', []);
        $this->form_validation->set_rules('longitude', 'Longitude', 'required', []);

        if ($this->form_validation->run() == FALSE) {
            // Load view + template
            $data = array(
                'title' => 'Form Edit IKM',
                'content' => 'Admin/Ikm/v_edit',
                'user' => $this->M_auth->login_check($this->session->userdata('username')),
                'location' => $this->M_ikm->detail($id_ikm),
                'kecamatan' => $this->M_kecamatan->get(),
                'kelurahan' => $this->M_kelurahan->get(),
                'kategori' => $this->M_kategori->get(),
            );
            $this->load->view('Layouts/UserLayout/index', $data, false);
        } else {
            // Simpan data ke DB
            $data = array(
                'id_ikm' => $id_ikm,
                'nm_ikm' => $this->input->post('nm_ikm'),
                'produk_ikm' => $this->input->post('produk_ikm'),
                'alamat_ikm' => $this->input->post('alamat_ikm'),
                'no_hp' => $this->input->post('no_hp'),
                'id_kecamatan' => $this->input->post('id_kecamatan'),
                'id_kelurahan' => $this->input->post('id_kelurahan'),
                'id_kategori' => $this->input->post('id_kategori'),
                'date_created' => $this->input->post('date_created'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
            );
            // $this->namaModel->input(variabel penampung);
            $this->M_ikm->edit($data);

            // Pesan data berhasil diinput
            $this->session->set_flashdata('pesan', 'Data pemetaan berhasil diubah !');

            // redirect('namaControler/method');
            redirect('Admin/Ikm/index');
        }
    }

    public function deleteData($id_ikm)
    {
        $data = array('id_ikm' => $id_ikm);
        $this->M_ikm->delete($data);

        // Pesan data berhasil diinput
        $this->session->set_flashdata('pesan', 'Data pemetaan berhasil dihapus !');

        // redirect('namaControler/method');
        redirect('Admin/Ikm/index');
    }

    public function print()
    {
        // Load view + template
        $data = array(
            'title' => 'Cetak Data IKM',
            'content' => 'Admin/Ikm/v_print',
            'user' => $this->M_auth->login_check($this->session->userdata('username')),
            'location' => $this->M_ikm->get(),
            'kecamatan' => $this->M_kecamatan->get(),
            'kelurahan' => $this->M_kelurahan->get(),
            'kategori' => $this->M_kategori->get(),
            // 'location' => $this->IkmModel->get(),
            // 'g_kecamatan' => $this->KecamatanModel->get()
        );
        $this->load->view('Layouts/UserLayout/index', $data, false);
    }
}
