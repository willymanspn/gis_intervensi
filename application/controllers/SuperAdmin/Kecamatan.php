<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kecamatan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kecamatan');
        $this->load->model('M_auth');
        if ($this->session->userdata('id_role') != 1) {
            redirect('Auth');
        }
    }

    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'content' => 'SuperAdmin/Kecamatan/v_kecamatan',
            'user' => $this->M_auth->login_check($this->session->userdata('username')),
            'kecamatan' => $this->M_kecamatan->get(),
        );
        $this->load->view('Layouts/UserLayout/index', $data, false);
    }

    // Form penginputan data harus diisi semua
    public function inputForm()
    {
        $this->form_validation->set_rules('kd_kecamatan', 'Nama Keluraha', 'required|is_unique[tb_kecamatan.kd_kecamatan]', [
            'is_unique' => 'Kode kecamatan sudah ada!',
        ]);
        $this->form_validation->set_rules('nm_kecamatan', 'Nama Keluraha', 'required|is_unique[tb_kecamatan.nm_kecamatan]', [
            'is_unique' => 'Nama kecamatan sudah ada!',
        ]);
        // $this->form_validation->set_rules('gj_kecamatan', 'Geojson Kecamatan', 'required', []);
        // $this->form_validation->set_rules('wr_kecamatan', 'Warna Kecamatan', 'required', []);

        if ($this->form_validation->run() == FALSE) {

            // Load view + template
            $data = array(
                'title' => 'Form Input Data Kecamatan',
                'content' => 'SuperAdmin/Kecamatan/v_input',
                'user' => $this->M_auth->login_check($this->session->userdata('username')),
                'kecamatan' => $this->M_kecamatan->get(),
            );
            $this->load->view('Layouts/UserLayout/index', $data, false);
        } else {

            $config['upload_path']          = './assets/geojson/';
            $config['allowed_types']        = '*';
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('gj_kecamatan')) {
                // Load view + template
                $data = array(
                    'title' => 'Form Input Data Kecamatan',
                    'content' => 'SuperAdmin/Kecamatan/v_input',
                    'user' => $this->M_auth->login_check($this->session->userdata('username')),
                    'kecamatan' => $this->M_kecamatan->get(),
                    'error_upload' => $this->upload->display_errors(),
                );
                $this->load->view('Layouts/UserLayout/index', $data, false);
            } else {

                $upload_data = array('upload_data' => $this->upload->data());
                $this->load->library('upload', $config);

                // Tidak ditambah file
                // Simpan data ke DB
                $data = array(
                    'kd_kecamatan' => $this->input->post('kd_kecamatan'),
                    'nm_kecamatan' => $this->input->post('nm_kecamatan'),
                    'gj_kecamatan' => $upload_data['upload_data']['file_name'],
                    'wr_kecamatan' => $this->input->post('wr_kecamatan'),
                );

                // $this->namaModel->input(variabel penampung);
                $this->M_kecamatan->input($data);

                // Pesan data berhasil diinput
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data kecamatan berhasil ditambahkan!
               </div>');

                // redirect('namaControler/method');
                redirect('SuperAdmin/Kecamatan/inputForm');
            }
        }
    }

    public function editForm($id_kecamatan)
    {
        $this->form_validation->set_rules('kd_kecamatan', 'Kode Kecamatan', 'required', []);
        $this->form_validation->set_rules('nm_kecamatan', 'Nama Kecamatan', 'required', []);

        if ($this->form_validation->run() ==  TRUE) {
            $config['upload_path']          = './assets/geojson/';
            $config['allowed_types']        = '*';
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('gj_kecamatan')) {

                // Load view + template
                $data = array(
                    'title' => 'Form Edit Data Kecamatan',
                    'content' => 'SuperAdmin/Kecamatan/v_edit',
                    'error_upload' => $this->upload->display_errors(),
                    'user' => $this->M_auth->login_check($this->session->userdata('username')),
                    'kecamatan' => $this->M_kecamatan->detail($id_kecamatan),
                );
                $this->load->view('Layouts/UserLayout/index', $data, FALSE);
            } else {

                $kecamatan = $this->M_kecamatan->detail($id_kecamatan);
                if ($kecamatan->gj_kecamatan != "") {
                    unlink('./assets/geojson/' . $kecamatan->gj_kecamatan);
                }

                $upload_data = array('upload_data' => $this->upload->data());
                $this->load->library('upload', $config);

                $data = array(
                    'id_kecamatan' => $id_kecamatan,
                    'kd_kecamatan' => $this->input->post('kd_kecamatan'),
                    'nm_kecamatan' => $this->input->post('nm_kecamatan'),
                    'gj_kecamatan' => $upload_data['upload_data']['file_name'],
                    'wr_kecamatan' => $this->input->post('wr_kecamatan')
                );
                $this->M_kecamatan->edit($data);

                // Pesan data berhasil diinput
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data kecamatan berhasil diubah!
               </div>');

                // redirect('namaControler/method');
                redirect('SuperAdmin/Kecamatan');
            }

            $data = array(
                'id_kecamatan' => $id_kecamatan,
                'kd_kecamatan' => $this->input->post('kd_kecamatan'),
                'nm_kecamatan' => $this->input->post('nm_kecamatan'),
                'wr_kecamatan' => $this->input->post('wr_kecamatan')
            );
            $this->M_kecamatan->edit($data);

            // Pesan data berhasil diinput
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data kecamatan berhasil diubah!
           </div>');

            // redirect('namaControler/method');
            redirect('SuperAdmin/Kecamatan/index');
        }
        // Load view + template
        $data = array(
            'title' => 'Form Edit Data Kecamatan',
            'content' => 'SuperAdmin/Kecamatan/v_edit',
            'user' => $this->M_auth->login_check($this->session->userdata('username')),
            'kecamatan' => $this->M_kecamatan->detail($id_kecamatan),
        );
        $this->load->view('Layouts/UserLayout/index', $data, false);
    }

    public function deleteData($id_kecamatan)
    {
        $kecamatan = $this->M_kecamatan->detail($id_kecamatan);
        if ($kecamatan->gj_kecamatan != "") {
            unlink('./assets/geojson/' . $kecamatan->gj_kecamatan);
        }

        $data = array('id_kecamatan' => $id_kecamatan);
        $this->M_kecamatan->delete($data);

        // Pesan data berhasil dihapus
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Data kecamatan berhasil dihapus!
          </div>');

        // redirect('namaControler/method');
        redirect('SuperAdmin/Kecamatan/index');
    }
}
