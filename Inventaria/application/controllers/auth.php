<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $users = $this->db->get_where('users', [
            'username' => $username
        ])->row_array();

        if ($users) {
            if ($users['is_active'] == 1) {
                if (password_verify($password, $users['password'])) {
                    $data = [
                        'username' => $users['username'],
                        'role_id' => $users['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($users['role_id'] == 1) redirect('admin');
                    else redirect('user');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password salah !</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Username belum diaktifkan !</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Username tidak terdaftar!</div>');
            redirect('auth');
        }
    }


    public function registration()
    {
        $this->form_validation->set_rules('firstname', 'First Name', 'required|trim');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
            'is_unique' => 'Email telah terdaftar!'
        ]);
        $this->form_validation->set_rules('phone', 'Phone Numbers', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]', [
            'is_unique' => 'Username tidak tersedia!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]', [
            "min_length" => 'Password minimal 6 karakter!'
        ]);
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|min_length[6]|matches[password1]', [
            "matches" => 'Password tidak cocok!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'firstname' => htmlspecialchars($this->input->post('firstname', true)),
                'lastname' => htmlspecialchars($this->input->post('lastname', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'phone' => htmlspecialchars($this->input->post('phone', true)),
                'address' => htmlspecialchars($this->input->post('address', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1', true), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('users', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun anda berhasil dibuat. Silakan Login</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
        Anda telah logout.</div>');
        redirect('auth');
    }
}
