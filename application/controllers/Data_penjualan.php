<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_penjualan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('PenjualanModel');
    $this->load->model('Report');
    is_not_login();
  }

  public function index()
  {
    $this->form_validation->set_rules('tanggal_awal', 'Tanggal Awal', 'required');
    $this->form_validation->set_rules('tanggal_akhir', 'Tanggal Akhir', 'required');

    if ($this->form_validation->run() == FALSE) {
      $data = [
        'title'     => 'Data Penjualan',
        'penjualan' => $this->PenjualanModel->get()->result()
      ];

      $this->template->load('layout/master', 'penjualan/data', $data);
    } else {
      $dateRange = [
        'tanggal_awal' => $this->input->post('tanggal_awal') . ' 00:00:00',
        'tanggal_akhir' => $this->input->post('tanggal_akhir') . ' 23:59:59'
      ];
      $data = [
        'title'     => 'Data Penjualan',
        'penjualan' => $this->PenjualanModel->filterPenjualan($dateRange)->result()
      ];
      $this->template->load('layout/master', 'penjualan/data', $data);
    }
  }

  public function hapus()
  {
    $id = $this->input->post('id');
    $this->session->set_flashdata('sukses-produk', 'Data penjualan berhasil dihapus.');
    $this->PenjualanModel->hapus_penjualan($id);
    redirect('data-penjualan/');
  }

  public function detail_profit()
  {
    $data = [
      'title' => 'Detail Profit',
      'data' => $this->Report->getDataProfit()
    ];

    $this->template->load('layout/master', 'penjualan/profit', $data);
  }
}
