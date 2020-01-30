<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PelangganModel');
        $this->load->model('ProdukModel');
        $this->load->model('PenjualanModel');
        is_not_login();
    }

    public function index()
    {
        $data = [
            'title'         => 'Penjualan',
            'customer'      => $this->PelangganModel->get()->result(),
            'produk'        => $this->ProdukModel->get()->result(),
            'keranjang'     => $this->PenjualanModel->carts()->result(),
            'grand_total'   => $this->PenjualanModel->grandTotal()
        ];
        $this->template->load('layout/master', 'penjualan/index', $data);
    }
    
    public function addtocart()
    {
        $param = [
            'id'            => null,
            'produk_id'     => $this->input->post('produk'),
            'qty'           => 0
        ];
        $this->PenjualanModel->addtocart($param);
        
        $getCartDetail = $this->PenjualanModel->getCartDetail($param['produk_id'])->row();

        $cart = [
            'id'            => null,
            'keranjang_id'  => $getCartDetail->id,
            'subtotal'      => $getCartDetail->harga_jual * $getCartDetail->qty,
            'profit'        => $getCartDetail->harga_jual - $getCartDetail->harga_beli
        ];
        $this->PenjualanModel->addtocartdetail($cart);
        redirect('penjualan/');
    }

    public function hapus($id)
    {
        $curQty = $this->PenjualanModel->carts($id)->row()->qty;
        $this->ProdukModel->returnStok($id, $curQty);
        $this->PenjualanModel->hapus($id);
        redirect('penjualan/');
    }

    public function tambah($id)
    {
        $curStok = $this->ProdukModel->get($id)->row()->stok;
        if (($curStok - 1) < 0) {
            $this->session->set_flashdata('gagal-produk', 'Stok produk tidak mencukupi.');
            redirect('penjualan/');
        } else {
            $this->PenjualanModel->tambah($id);
            $this->ProdukModel->kurang($id);
            $getCartDetail = $this->PenjualanModel->getCartDetail($id)->row();
            $cart = [
                'id'            => null,
                'keranjang_id'  => $getCartDetail->id,
                'subtotal'      => $getCartDetail->harga_jual * $getCartDetail->qty,
                'profit'        => ($getCartDetail->harga_jual * $getCartDetail->qty) - ($getCartDetail->harga_beli * $getCartDetail->qty)
            ];
            $this->PenjualanModel->updatecartdetail($cart);
            redirect('penjualan/');
        }
    }

    public function kurang($id)
    {
        $curQty = $this->PenjualanModel->carts($id)->row()->qty;
        if (($curQty - 1) < 0) {
            $this->session->set_flashdata('gagal-produk', 'Jumlah pesanan kurang.');
            redirect('penjualan/');
        } else {
            $this->PenjualanModel->kurang($id);
            $this->ProdukModel->tambah($id);
            $getCartDetail = $this->PenjualanModel->getCartDetail($id)->row();
            $cart = [
                'id'            => null,
                'keranjang_id'  => $getCartDetail->id,
                'subtotal'      => $getCartDetail->harga_jual * $getCartDetail->qty,
                'profit'        => ($getCartDetail->harga_jual * $getCartDetail->qty) - ($getCartDetail->harga_beli * $getCartDetail->qty)
            ];
            $this->PenjualanModel->updatecartdetail($cart);
            redirect('penjualan/');
        }
    }

    public function proses()
    {
        if ($this->input->post('customers') == null) {
            $pelanggan = 'Umum';
        } else {
            $pelanggan = $this->input->post('customers');
        }
        $data = [
            'faktur'            => noFaktur(fakturAutoID()),
            'kasir'             => $this->session->userdata('username'),
            'pelanggan'         => $pelanggan,
            'total'             => $this->PenjualanModel->grandTotal()->row()->grand_total,
            'profit'            => $this->PenjualanModel->profit(),
            'bayar'             => $this->input->post('bayar'),
            'kembalian'         => $this->input->post('bayar') - $this->PenjualanModel->grandTotal()->row()->grand_total,
            'waktu_transaksi'   => date('Y-m-d H:i:s', time())
        ];

        if ($this->PenjualanModel->grandTotal()->num_rows() <= 0) {
            $this->session->set_flashdata('gagal-produk', 'Keranjang belanja masih kosong.');
            redirect('penjualan/');
        } else {
            $this->PenjualanModel->proses($data);
            $this->PenjualanModel->addDetail($this->PenjualanModel->last_row()->faktur);
            $this->PenjualanModel->clear();
            $cashback       = $this->PenjualanModel->last_row()->cashback;
            if ($cashback == 0) {
                $this->session->set_flashdata('sukses-produk', 'Transaksi sukses.');
            } else {
                $this->session->set_flashdata('sukses-produk', 'Transaksi sukses. Kembalian anda ' . rupiah($cashback));
            }
            redirect('penjualan/print/');
        }
    }

    public function print()
    {
        $faktur = $this->PenjualanModel->nota_header()->row()->faktur;
        $data = [
            'header'    => $this->PenjualanModel->nota_header()->row(),
            'body'      => $this->PenjualanModel->nota_line($faktur)->result()
        ];
        $this->load->view('penjualan/nota', $data);
    }
}