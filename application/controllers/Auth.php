<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_auth');
        $this->load->model('M_user');
    }

    public function index()
    {
        // nambah
        // if ($this->session->userdata('username')) {
        //     if ($this->session->userdata('id_role') == 1) {
        //         redirect('SuperAdmin/Dashboard');
        //     } else {
        //         redirect('Admin/Dashboard');
        //     }
        // }

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {

            $data = array(
                'title' => 'Login',
                'content' => 'Auth/v_login',
            );
            $this->load->view('Layouts/AuthLayout/index', $data, false);
        } else {
            // Validasi lolos
            $this->_login();
        }
    }

    // Validasi
    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->M_auth->login_check($username);
        // $user = $this->db->get_where('tb_admin', ['username' => $username])->row_array();

        // User ada
        if ($user) {
            // Jika user aktif
            if ($user['is_active'] == 1) {
                // Cek password
                if (password_verify($password, $user['password'])) {
                    // Password benar atau sama
                    $data = [
                        'username' => $user['username'],
                        'id_role' => $user['id_role'],
                    ];
                    $this->session->set_userdata($data);
                    // Cek role untuk login
                    if ($user['id_role'] == 1) {
                        // Jika 1
                        redirect('SuperAdmin/Dashboard');
                    } else {
                        // Jika selain 1
                        redirect('Admin/Dashboard');
                    }
                } else {
                    // Password salah
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password salah!
              </div>');
                    redirect('Auth');
                }
            } else {
                // User tidak aktif
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Akun tidak aktif!
          </div>');
                redirect('Auth');
            }
        } else {
            // User Tidak ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Akun tidak terdaftar!
          </div>');
            redirect('Auth');
        }
    }

    public function register()
    {

        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_user.username]', [
            'is_unique' => 'Username ini sudah digunakan, harap ganti yang lain!',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_lenght' => 'Password terlalu pendek',
        ]);

        if ($this->form_validation->run() == false) {
            $data = array(
                'title' => 'Register',
                'content' => 'Auth/v_register',
            );
            $this->load->view('Layouts/AuthLayout/index', $data, false);
        } else {
            $data = [
                'nm_user' => htmlspecialchars($this->input->post('nm_user', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'ft_user' => 'default.png',
                'id_role' => 2,
                'is_active' => 1,
                'date_created' => time(),
            ];

            $this->M_auth->input($data);
            // $this->db->insert('tb_admin', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! akun telah dibuat. Silahkan login!
          </div>');

            redirect('SuperAdmin/DataUser');
            // redirect('Auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nm_user');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('ft_user');
        $this->session->unset_userdata('id_role');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Logout succsess!
      </div>');

        redirect('Auth');
    }
}
