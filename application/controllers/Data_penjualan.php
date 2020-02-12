<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_penjualan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PenjualanModel');
        is_not_login();
    }

    public function index()
    {
        $data = [
            'title'     => 'Data Penjualan',
            'penjualan' => $this->PenjualanModel->get()->result()
        ];
        $this->template->load('layout/master', 'penjualan/data', $data);
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        $this->session->set_flashdata('sukses-produk', 'Data penjualan berhasil dihapus.');
        $this->PenjualanModel->hapus_penjualan($id);
        redirect('data-penjualan/');
    }
}