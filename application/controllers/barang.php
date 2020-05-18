<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('cart');
    }

    public function produk()
    {
        $data['title'] = 'Produk';
        $data['users'] = $this->db->get_where('users', [
            'username' => $this->session->userdata('username')
        ])->row_array();
        // $data['produk'] = $this->db->get('barang')->result_array();
        // $data['barang'] = $this->modelbrg->showbrg()->result();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('barang/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function aksesoris()
    {
        $data['title'] = 'Aksesoris';
        $data['users'] = $this->db->get_where('users', [
            'username' => $this->session->userdata('username')
        ])->row_array();
        // $data['produk'] = $this->db->get('barang')->result_array();
        // $data['barang'] = $this->modelbrg->showbrg()->result();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('barang/aksesoris', $data);
        $this->load->view('templates/footer', $data);
    }

    public function elektronik()
    {
        $data['title'] = 'Elektronik';
        $data['users'] = $this->db->get_where('users', [
            'username' => $this->session->userdata('username')
        ])->row_array();
        // $data['produk'] = $this->db->get('barang')->result_array();
        // $data['barang'] = $this->modelbrg->showbrg()->result();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('barang/elektronik', $data);
        $this->load->view('templates/footer', $data);
    }

    public function furniture()
    {
        $data['title'] = 'Furniture';
        $data['users'] = $this->db->get_where('users', [
            'username' => $this->session->userdata('username')
        ])->row_array();
        // $data['produk'] = $this->db->get('barang')->result_array();
        // $data['barang'] = $this->modelbrg->showbrg()->result();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('barang/furniture', $data);
        $this->load->view('templates/footer', $data);
    }

    public function transportasi()
    {
        $data['title'] = 'Transportasi';
        $data['users'] = $this->db->get_where('users', [
            'username' => $this->session->userdata('username')
        ])->row_array();
        // $data['produk'] = $this->db->get('barang')->result_array();
        // $data['barang'] = $this->modelbrg->showbrg()->result();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('barang/transportasi', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Produk';
        $data['users'] = $this->db->get_where('users', [
            'username' => $this->session->userdata('username')
        ])->row_array();
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim');
        // $this->form_validation->set_rules('tipe', 'Tipe Barang', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga Barang', 'required|trim');
        // $this->form_validation->set_rules('nomor_penyedia', 'Kontak Penyedia', 'required|trim');
        $this->form_validation->set_rules('wa_penyedia', 'Link Whatsapp', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Barang', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Produk';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('barang/tambah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $foto = $_FILES["foto"]["name"];
            if ($foto) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10000';
                $config['upload_path'] = './assets/img/product';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $foto = $this->upload->data('file_name');
                }
            }
            $data = [
                'nama_barang' => htmlspecialchars($this->input->post('nama_barang', true)),
                'tipe' => $this->input->post('tipe', true),
                'penyedia' => htmlspecialchars($this->input->post('penyedia', true)),
                'harga' => htmlspecialchars($this->input->post('harga', true)),
                'nomor_penyedia' => htmlspecialchars($this->input->post('nomor_penyedia', true)),
                'wa_penyedia' => htmlspecialchars($this->input->post('wa_penyedia', true)),
                'foto' => $foto,
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true))
            ];

            $this->db->insert('barang', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Produk berhasil ditambahkan</div>');
            redirect('barang/produk');
        }
    }

    public function search()
    {
        $data['title'] = 'Search';
        $data['users'] = $this->db->get_where('users', [
            'username' => $this->session->userdata('username')
        ])->row_array();


        $keyword = htmlspecialchars($this->input->post('search', true));
        $data['keyword'] = $keyword;


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('barang/search', $data);
        $this->load->view('templates/footer', $data);
    }

    public function detail($id_brg)
    {
        $data['title'] = 'Detail';
        $data['users'] = $this->db->get_where('users', [
            'username' => $this->session->userdata('username')
        ])->row_array();

        // $keyword = $this->db->get_where('barang', [
        //     'id_brg' => $id_brg
        // ]);
        $data['keyword'] = $id_brg;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('barang/detail', $data);
        $this->load->view('templates/footer', $data);
    }

    public function keranjang($id_brg)
    {
        $data['title'] = 'Keranjang';
        $data['users'] = $this->db->get_where('users', [
            'username' => $this->session->userdata('username')
        ])->row_array();

        $keyword = $this->db->get_where('barang', [
            'id_brg' => $id_brg
        ])->row_array();

        $cart = [
            'id'    => $id_brg,
            'qty'   => 1,
            'price' => $keyword['harga'],
            'name'  => $keyword['nama_barang']
        ];


        $this->cart->insert($cart);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Produk berhasil ditambahkan ke keranjang.</div>');
        redirect('barang/produk');
    }

    public function cart()
    {
        $data['title'] = 'Keranjang';
        $data['users'] = $this->db->get_where('users', [
            'username' => $this->session->userdata('username')
        ])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('barang/cart', $data);
        $this->load->view('templates/footer', $data);
    }

    public function clearcart()
    {
        $this->cart->destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Keranjang berhasil dibersihkan.</div>');
        redirect('barang/produk');
    }

    public function user()
    {
        $data['title'] = 'Profile';
        $data['users'] = $this->db->get_where('users', [
            'username' => $this->session->userdata('username')
        ])->row_array();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit()
    {
        $data['title'] = 'Edit Produk';
        $data['users'] = $this->db->get_where('users', [
            'username' => $this->session->userdata('username')
        ])->row_array();
        // $data['produk'] = $this->db->get('barang')->result_array();
        // $data['barang'] = $this->modelbrg->showbrg()->result();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('barang/edit', $data);
        $this->load->view('templates/footer', $data);
    }

    public function update($id)
    {
        $data['title'] = 'Edit Produk';
        $data['users'] = $this->db->get_where('users', [
            'username' => $this->session->userdata('username')
        ])->row_array();

        $data['produk'] = $this->db->get_where('barang', [
            'id_brg' => $id
        ])->row_array();

        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim');
        // $this->form_validation->set_rules('tipe', 'Tipe Barang', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga Barang', 'required|trim');
        // $this->form_validation->set_rules('nomor_penyedia', 'Kontak Penyedia', 'required|trim');
        $this->form_validation->set_rules('wa_penyedia', 'Link Whatsapp', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Barang', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Produk';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('barang/update', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $foto = $_FILES["foto"]["name"];
            if ($foto) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10000';
                $config['upload_path'] = './assets/img/product';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $foto = $this->upload->data('file_name');
                }
            }
            $data = [
                'nama_barang' => htmlspecialchars($this->input->post('nama_barang', true)),
                'tipe' => $this->input->post('tipe', true),
                'penyedia' => htmlspecialchars($this->input->post('penyedia', true)),
                'harga' => htmlspecialchars($this->input->post('harga', true)),
                'nomor_penyedia' => htmlspecialchars($this->input->post('nomor_penyedia', true)),
                'wa_penyedia' => htmlspecialchars($this->input->post('wa_penyedia', true)),
                'foto' => $foto,
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true))
            ];

            $this->db->where('id_brg', $id);
            $this->db->update('barang', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Produk berhasil diupdate</div>');
            redirect('barang/edit');
        }
    }

    public function deletebrg($id)
    {
        $data['title'] = 'Delete Produk';
        $data['users'] = $this->db->get_where('users', [
            'username' => $this->session->userdata('username')
        ])->row_array();

        $data['produk'] = $this->db->get_where('barang', [
            'id_brg' => $id
        ])->row_array();


        $hapus = array('id_brg' => $id);
        $this->db->where($hapus);
        $this->db->delete('barang');
        // $this->db->get_where('barang', [
        //     'id_brg' => $id
        // ]);
        // $this->db->where('id_brg', $id);
        // $this->db->delete($hapus);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Produk berhasil dihapus</div>');
        redirect('barang/edit');
        // }
    }
}
