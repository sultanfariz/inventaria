<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $data['users'] = $this->db->get_where('users', [
            'username' => $this->session->userdata('email')
        ])->row_array();

        echo 'Selamat datang ' . $data['users']['username'];
    }
}
