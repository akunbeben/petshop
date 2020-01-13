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
            'produk'    => $this->ProdukModel->get()->result()
        ];
        $this->template->load('layout/master', 'produk/index', $data);
    }
}