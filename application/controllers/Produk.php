<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProdukModel');
    }

    public function index()
    {
        $data = [
            'title'     => 'Produk',
            'kategori'  => $this->ProdukModel->get_category()->result(),
            'unit'      => $this->ProdukModel->get_unit()->result(),
            'stok'      => $this->ProdukModel->get_stock()->row(),
            'produk'    => $this->ProdukModel->get()->result()
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
                'stok'          => $this->input->post('jumlah'),
                'gambar'        => 'default.png',
                'kategori'      => $this->input->post('kategori'),
                'unit'          => $this->input->post('unit'),
                'harga_beli'    => $this->input->post('harga_beli'),
                'harga_jual'    => $this->input->post('harga_jual'),
                'profit'        => $this->input->post('harga_jual') - $this->input->post('harga_beli')
            ];
            $this->session->set_flashdata('sukses-produk', 'Produk berhasil ditambah.');
            $this->ProdukModel->add($produk);
            redirect('produk/');
        }
    }

    function stockin()
    {
        $id = $this->input->post('id_prod');
        if ($id == null) {
            redirect('produk/');
        } else {
            $param = [
                'id'        => $id,
                'stok-in'   => $this->input->post('jumlah_stok'),
                'produk'    => $this->ProdukModel->get($id)->row()->stok
            ];
            $this->session->set_flashdata('sukses-produk', 'Stok produk berhasil ditambah.');
            $this->ProdukModel->stockin($param);
            $this->ProdukModel->track_stock($param);
            redirect('produk/');
        }
    }

    public function edit()
    {
        $id = $this->input->post('edit_idprod');
        if ($id == null) {
            redirect('produk/');
        } else {
            $param = [
                'id'            => $id,
                'nama_produk'   => $this->input->post('editproduk'),
                'kategori'      => $this->input->post('editkategori'),
                'unit'          => $this->input->post('editunit')
            ];
            $this->session->set_flashdata('sukses-produk', 'Data produk berhasil diubah.');
            $this->ProdukModel->edit($param);
            redirect('produk/');
        }
    }
}