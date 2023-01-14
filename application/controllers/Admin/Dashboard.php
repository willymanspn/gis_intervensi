<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth');
        $this->load->model('M_dashboard');
        if ($this->session->userdata('id_role') != 2) {
            redirect('Auth');
        }
    }

    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'content' => 'Admin/v_dashboard',
            'user' => $this->M_auth->login_check($this->session->userdata('username')),
            'location' => $this->M_dashboard->get(),
            'g_kecamatan' => $this->M_dashboard->get_kec(),
            'num_ikm' => $this->M_dashboard->ikm_count(),
            'num_kec' => $this->M_dashboard->kec_count(),
            'num_kel' => $this->M_dashboard->kel_count(),
            'num_kat' => $this->M_dashboard->kategori_count(),
            'num_adm' => $this->M_dashboard->admin_count(),
        );
        $this->load->view('Layouts/UserLayout/index', $data, false);
    }
}
