<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Tambah Produk';
        $data['users'] = $this->db->get_where('users', [
            'username' => $this->session->userdata('username')
        ])->row_array();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('barang/tambah', $data);
        $this->load->view('templates/footer', $data);
    }
}
