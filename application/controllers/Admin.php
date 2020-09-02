<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Dashboard');
    $this->load->model('Report');
    is_not_login();
  }

  public function index()
  {
    $data = [
      'title'       => 'Beranda',
      'javascript'  => 'dashboard.js',
      'stok'        => $this->Dashboard->get_stok_masuk(),
      'qty'         => $this->Dashboard->get_qty(),
      'penjualan'   => $this->Dashboard->get_penjualan(),
      'pelanggan'   => $this->Dashboard->get_pelanggan(),
      'profit_k'    => $this->Dashboard->get_selisih(),
    ];

    $this->template->load('layout/master', 'admin/index', $data);
  }

  public function api_omset()
  {
    $data = $this->Report->getDataOmset();

    header('Content-Type: application/json');
    echo json_encode(['status' => true, 'data' => $data]);
  }

  public function api_profit()
  {
    $data = $this->Report->getDataProfit();

    header('Content-Type: application/json');
    echo json_encode(['status' => true, 'data' => $data]);
  }
}
