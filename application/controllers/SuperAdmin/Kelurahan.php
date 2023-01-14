<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelurahan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kelurahan');
        $this->load->model('M_kecamatan');
        $this->load->model('M_auth');
        if ($this->session->userdata('id_role') != 1) {
            redirect('Auth');
        }
    }

    public function index()
    {
        $data = array(
            'title' => 'Kelurahan',
            'content' => 'SuperAdmin/Kelurahan/v_kelurahan',
            'user' => $this->M_auth->login_check($this->session->userdata('username')),
            'kelurahan' => $this->M_kelurahan->get(),
            'kecamatan' => $this->M_kecamatan->get(),
        );
        $this->load->view('Layouts/UserLayout/index', $data, false);
    }

    public function inputForm()
    {
        // $this->form_validation->set_rules('nm_kelurahan', 'Nama Kelurahan', 'required', []);
        $this->form_validation->set_rules('kd_kelurahan', 'Nama Keluraha', 'required|is_unique[tb_kelurahan.kd_kelurahan]', [
            'is_unique' => 'Kode kelurahan sudah ada!',
        ]);
        $this->form_validation->set_rules('nm_kelurahan', 'Nama Keluraha', 'required|is_unique[tb_kelurahan.nm_kelurahan]', [
            'is_unique' => 'Nama Kelurahan sudah ada!',
        ]);


        if ($this->form_validation->run() == FALSE) {

            // Load view + template
            $data = array(
                'title' => 'Form Input Data Kelurahan',
                'content' => 'SuperAdmin/Kelurahan/v_input',
                'user' => $this->M_auth->login_check($this->session->userdata('username')),
                'kelurahan' => $this->M_kelurahan->get(),
                'kecamatan' => $this->M_kecamatan->get()
            );
            $this->load->view('Layouts/UserLayout/index', $data, false);
        } else {
            // Simpan data ke DB
            $data = array(
                'kd_kelurahan' => $this->input->post('kd_kelurahan'),
                'nm_kelurahan' => $this->input->post('nm_kelurahan'),
                'id_kecamatan' => $this->input->post('id_kecamatan')
            );

            // $this->namaModel->input(variabel penampung);
            $this->M_kelurahan->input($data);

            // Pesan data berhasil diinput
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data kelurahan berhasil disimpan!
           </div>');

            // redirect('namaControler/method');
            redirect('SuperAdmin/Kelurahan/inputForm');
        }
    }

    public function editForm($id_kelurahan)
    {
        // $this->form_validation->set_rules('kd_kelurahan', 'Kode Kelurahan', 'required', []);
        $this->form_validation->set_rules('nm_kelurahan', 'Nama Kelurahan', 'required', []);

        if ($this->form_validation->run() == FALSE) {
            // Load view + template
            $data = array(
                'title' => 'Form Edit Data Kelurahan',
                'content' => 'SuperAdmin/Kelurahan/v_edit',
                'user' => $this->M_auth->login_check($this->session->userdata('username')),
                'kelurahan' => $this->M_kelurahan->detail($id_kelurahan),
                'kecamatan' => $this->M_kecamatan->get()
            );
            $this->load->view('Layouts/UserLayout/index', $data, false);
        } else {
            // Simpan data ke DB
            $data = array(
                'id_kelurahan' => $id_kelurahan,
                'kd_kelurahan' => $this->input->post('kd_kelurahan'),
                'nm_kelurahan' => $this->input->post('nm_kelurahan'),
                'id_kecamatan' => $this->input->post('id_kecamatan'),
            );
            // $this->namaModel->input(variabel penampung);
            $this->M_kelurahan->edit($data);

            // Pesan data berhasil diinput
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data kelurahan berhasil diubah!
           </div>');

            // redirect('namaControler/method');
            redirect('SuperAdmin/Kelurahan/index');
        }
    }

    public function deleteData($id_kelurahan)
    {
        $data = array('id_kelurahan' => $id_kelurahan);
        $this->M_kelurahan->delete($data);

        // Pesan data berhasil dihapus
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data kelurahan berhasil dihapus!
       </div>');

        // redirect('namaControler/method');
        redirect('SuperAdmin/Kelurahan/index');
    }
}
