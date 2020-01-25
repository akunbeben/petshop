<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProdukModel');
        $this->load->model('LaporanModel');
        $this->load->library('pdf');
    }

    public function inventori()
    {
        $data = [
            'title'     => 'Laporan Inventori',
            'inventori' => $this->LaporanModel->get_inventori()->result()
        ];
        $this->template->load('layout/master', 'laporan/inventori', $data);
    }

    public function print()
    {
        $id = $this->input->post('id');
        $data = [
            'header'    => $this->LaporanModel->get_inventori($id)->row(),
            'body'      => $this->LaporanModel->detail_inventori($id)->result(),
            'produk'    => $this->ProdukModel->get()->result(),
            'title'     => 'LAPORAN INVENTORI'
        ];
        
        $this->load->library('pdf');
        
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = preg_replace("([/])", '-', $data['header']->no_doc);
        $this->pdf->load_view('laporan/print', $data);
    }

}

