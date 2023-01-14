<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataUser extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->model('M_auth');
        if ($this->session->userdata('id_role') != 1) {
            redirect('Auth');
        }
    }

    public function index()
    {
        $data = array(
            'title' => 'Data Admin',
            'content' => 'SuperAdmin/DataAdmin/v_user',
            'user' => $this->M_auth->login_check($this->session->userdata('username')),
            'admin' => $this->M_user->getAdmin(),
            'role' => $this->M_user->getRole(),
        );
        $this->load->view('Layouts/UserLayout/index', $data, false);
    }

    public function editForm($id_user)
    {
        // $this->form_validation->set_rules('nm_admin', 'Nama Admin', 'required', []);
        // $this->form_validation->set_rules('username', 'Username Admin', 'required|trim|is_unique[tb_user.username]', [
        //     'is_unique' => 'This username has already registered!',
        // ]);
        $this->form_validation->set_rules('nm_user', 'Nama admin', 'required', []);
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[3]', [
            'min_lenght' => 'Password terlalu pendek!',
        ]);
        // $this->form_validation->set_rules('ft_admin', 'Foto Admin', 'required', []);
        // $this->form_validation->set_rules('id_role', 'Role Admin', 'required', []);
        // $this->form_validation->set_rules('created_at', 'Tanggal Masuk', 'required', []);

        if ($this->form_validation->run() ==  TRUE) {
            $config['upload_path']          = './assets/img/profile/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('ft_user')) {

                // Load view + template
                $data = array(
                    'title' => 'Form Edit Data Admin',
                    'content' => 'SuperAdmin/DataAdmin/v_edit',
                    'error_upload' => $this->upload->display_errors(),
                    'user' => $this->M_auth->login_check($this->session->userdata('username')),
                    'admin' => $this->M_user->detail($id_user),
                    'role' => $this->M_user->getRole(),
                );
                $this->load->view('Layouts/UserLayout/index', $data, FALSE);
            } else {

                $admin = $this->M_user->detail($id_user);
                if ($admin->ft_user != "") {
                    unlink('./assets/img/profile/' . $admin->ft_user);
                }

                $upload_data = array('upload_data' => $this->upload->data());
                $this->load->library('upload', $config);

                $data = array(
                    'id_user' => $id_user,
                    'nm_user' => htmlspecialchars($this->input->post('nm_user', true)),
                    'username' => htmlspecialchars($this->input->post('username', true)),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'ft_user' => $upload_data['upload_data']['file_name'],
                    'id_role' => $this->input->post('id_role'),
                    // 'date_created' => $this->input->post('date_created'),
                );
                $this->M_user->edit($data);

                // Pesan data berhasil diubah
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data admin berhasil diubah!
               </div>');

                // redirect('namaControler/method');
                redirect('SuperAdmin/DataUser/index');
            }

            $data = array(
                'id_user' => $id_user,
                'nm_user' => htmlspecialchars($this->input->post('nm_user', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'id_role' => $this->input->post('id_role'),
                // 'date_created' => $this->input->post('date_created')
            );
            $this->M_user->edit($data);

            // Pesan data berhasil diinput
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data admin berhasil diubah!
           </div>');

            // redirect('namaControler/method');
            redirect('SuperAdmin/DataUser/index');
        }
        // Load view + template
        $data = array(
            'title' => 'Form Edit Data Admin',
            'content' => 'SuperAdmin/DataAdmin/v_edit',
            'user' => $this->M_auth->login_check($this->session->userdata('username')),
            'admin' => $this->M_user->detail($id_user),
            'role' => $this->M_user->getRole(),
        );
        $this->load->view('Layouts/UserLayout/index', $data, false);
    }

    public function deleteData($id_user)
    {
        $admin = $this->M_user->detail($id_user);
        if ($admin->ft_admin != "") {
            unlink('./assets/profile/' . $admin->ft_user);
        }

        $data = array('id_user' => $id_user);
        $this->M_user->delete($data);

        // Pesan data berhasil dihapus
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Data admin berhasil dihapus!
          </div>');

        // redirect('namaControler/method');
        redirect('SuperAdmin/DataUser/index');
    }
}
