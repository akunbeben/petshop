<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_Data extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProdukModel');
        is_not_login();
    }

    public function produk()
    {
        $data = [
            'title'     => 'Produk',
            'kategori'  => $this->ProdukModel->get_category(1)->result(),
            'unit'      => $this->ProdukModel->get_unit()->result(),
            'stok'      => $this->ProdukModel->get_stock()->row(),
            'produk'    => $this->ProdukModel->get()->result()
            // 'detail'    => $this->ProdukModel->detail()->result()
        ];
        
        $this->form_validation->set_rules('produk', 'Produk', 'required|trim');
        $this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required|trim');
        $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layout/master', 'produk/index', $data);
        } else {
            $produk = [
                'id'            => null,
                'nama_produk'   => $this->input->post('produk'),
                'stok'          => 0,
                'gambar'        => 'default.png',
                'kategori'      => $this->input->post('kategori'),
                'unit'          => $this->input->post('unit'),
                'harga_beli'    => $this->input->post('harga_beli'),
                'harga_jual'    => $this->input->post('harga_jual'),
                'profit'        => $this->input->post('harga_jual') - $this->input->post('harga_beli')
            ];
            $this->session->set_flashdata('sukses-produk', 'Produk berhasil ditambah.');
            $this->ProdukModel->add($produk);
            redirect('master-data/produk/');
        }
    }

    function stockin()
    {
        $id = $this->input->post('id_prod');
        if ($id == null) {
            redirect('produk/');
        } else {
            $param = [
                'id'            => $id,
                'stok-in'       => $this->input->post('jumlah_stok'),
                'produk'        => $this->ProdukModel->get($id)->row()->stok,
                'created_by'    => $this->session->userdata('username')
            ];
            $this->session->set_flashdata('sukses-produk', 'Stok produk berhasil ditambah.');
            $this->ProdukModel->stockin($param);
            $this->ProdukModel->track_stock($param);
            redirect('master-data/produk/');
        }
    }

    public function edit()
    {
        $id = $this->input->post('edit_idprod');
        $harga_beli = $this->ProdukModel->get($id)->row()->harga_beli;
        if ($id == null) {
            redirect('master-data/produk/');
        } else {
            $param = [
                'id'            => $id,
                'nama_produk'   => $this->input->post('editproduk'),
                'kategori'      => $this->input->post('editkategori'),
                'unit'          => $this->input->post('editunit'),
                'harga_jual'    => $this->input->post('harga'),
                'profit'        => $this->input->post('harga') - $harga_beli
            ];
            // var_dump($param);
            $this->session->set_flashdata('sukses-produk', 'Data produk berhasil diubah.');
            $this->ProdukModel->edit($param);
            redirect('master-data/produk/');
        }
    }

    public function kategori_produk()
    {
        $data = [
            'title'     => 'Kategori Produk',
            'kategori'  => $this->ProdukModel->get_category()->result()
        ];
        
        $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layout/master', 'produk/kategori-produk', $data);
        } else {
            $param = [
                'id'            => null,
                'nama_kategori' => $this->input->post('kategori'),
                'aktif'         => ($this->input->post('status') == null ? '0' : $this->input->post('status'))
            ];
            $this->session->set_flashdata('sukses-produk', 'Kategori berhasil ditambah.');
            $this->ProdukModel->add_cat($param);
            redirect('master-data/kategori-produk/');
        }
    }

    public function edit_cat()
    {
        $id = $this->input->post('id_kategori');
        if ($id == null) {
            $this->session->set_flashdata('sukses-produk', 'Failed.');
            redirect('master-data/kategori-produk/');
        } else {
            $param = [
                'id'            => $id,
                'nama_kategori' => $this->input->post('editkategori'),
                'aktif'         => ($this->input->post('editstatus') == null ? '0' : $this->input->post('editstatus'))
            ];
            $this->session->set_flashdata('sukses-produk', 'Data kategori berhasil diubah.');
            $this->ProdukModel->edit_cat($param);
            redirect('master-data/kategori-produk/');
        }
    }

    public function unit_produk()
    {
        $data = [
            'title'     => 'Unit Produk',
            'unit'      => $this->ProdukModel->get_unit()->result()
        ];
        
        $this->form_validation->set_rules('unit', 'unit', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layout/master', 'produk/unit-produk', $data);
        } else {
            $param = [
                'id'            => null,
                'nama_unit'     => $this->input->post('unit'),
                'aktif'         => ($this->input->post('status') == null ? '0' : $this->input->post('status'))
            ];
            $this->session->set_flashdata('sukses-produk', 'Unit berhasil ditambah.');
            $this->ProdukModel->add_unit($param);
            redirect('master-data/unit-produk/');
        }
    }

    public function edit_unit()
    {
        $id = $this->input->post('id_unit');
        if ($id == null) {
            $this->session->set_flashdata('sukses-produk', 'Failed.');
            redirect('master-data/unit-produk/');
        } else {
            $param = [
                'id'            => $id,
                'nama_unit'     => $this->input->post('editunit'),
                'aktif'         => ($this->input->post('editstatus') == null ? '0' : $this->input->post('editstatus'))
            ];
            $this->session->set_flashdata('sukses-produk', 'Data unit berhasil diubah.');
            $this->ProdukModel->edit_unit($param);
            redirect('master-data/unit-produk/');
        }
    }
}