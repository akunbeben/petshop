<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard');
        is_not_login();
    }

    public function index()
    {
        $data = [
            'title'     => 'Beranda',
            'stok'      => $this->Dashboard->get_stok_masuk(),
            'qty'       => $this->Dashboard->get_qty(),
            'penjualan' => $this->Dashboard->get_penjualan(),
            'pelanggan' => $this->Dashboard->get_pelanggan(),
            'profit_k'  => $this->Dashboard->get_selisih(),
        ];

        $this->template->load('layout/master', 'admin/index', $data);
    }
}