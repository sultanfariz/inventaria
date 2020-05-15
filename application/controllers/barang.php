<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

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

    public function tambah()
    {
        $data['title'] = 'Tambah Produk';
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim');
        // $this->form_validation->set_rules('tipe', 'Tipe Barang', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga Barang', 'required|trim');
        // $this->form_validation->set_rules('nomor_penyedia', 'Kontak Penyedia', 'required|trim');
        $this->form_validation->set_rules('wa_penyedia', 'Link Whatsapp', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Produk';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('barang/tambah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'nama_barang' => htmlspecialchars($this->input->post('nama_barang', true)),
                'tipe' => $this->input->post('tipe', true),
                'penyedia' => 'a',
                'harga' => htmlspecialchars($this->input->post('harga', true)),
                'nomor_penyedia' => 'a',
                'wa_penyedia' => htmlspecialchars($this->input->post('wa_penyedia', true)),
                'foto' => htmlspecialchars($this->input->post('foto', true)),
            ];

            $this->db->insert('barang', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Produk berhasil ditambahkan</div>');
            redirect('barang');
        }
    }
}
