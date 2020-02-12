<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penitipan extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PenitipanModel');
        $this->load->model('PelangganModel');
        is_not_login();
    }

    public function index()
    {
        $data = [
            'title'         => 'Penitipan Peliharaan',
            'list'          => $this->PenitipanModel->get()->result(),
            'list_keluar'   => $this->PenitipanModel->get_keluar()->result(),
            'pelanggan'     => $this->PelangganModel->get()->result()
        ];
        $this->template->load('layout/master', 'penitipan/index', $data);
    }

    public function masuk()
    {
        $data = [
            'id'                => null,
            'nama_peliharaan'   => $this->input->post('nama_peliharaan'),
            'pemilik'           => $this->input->post('pemilik'),
            'catatan'           => $this->input->post('catatan'),
            'tanggal_masuk'     => date('Y-m-d H:i:s', time()),
            'status'            => 0
        ];

        $this->session->set_flashdata('sukses-produk', 'Peliharaan telah di titipkan.');
        $this->PenitipanModel->masuk($data);
        redirect('penitipan/');
    }

    public function edit()
    {
        $id = $this->input->post('edit_id');
        if ($id == null) {
            redirect('penitipan/');
        } else {
            $data = [
                'id'                => $id,
                'nama_peliharaan'   => $this->input->post('edit_nama_peliharaan'),
                'pemilik'           => $this->input->post('edit_pemilik'),
                'catatan'           => $this->input->post('edit_catatan'),
                'status'            => 0
            ];
            $this->session->set_flashdata('sukses-produk', 'Data Penitipan telah di ubah.');
            $this->PenitipanModel->edit($data);
            redirect('penitipan/');
        }
    }

    public function keluar()
    {
        $id = $this->input->post('id');
        if ($id == null) {
            redirect('penitipan/');
        } else {
            $data = [
                'id'                => $id,
                'status'            => 1,
                'tanggal_keluar'    => date('Y-m-d H:i:s', time())
            ];
            var_dump($data);
            $this->session->set_flashdata('sukses-produk', 'Peliharaan telah diambil.');
            $this->PenitipanModel->keluar($data);
            redirect('penitipan/');
        }
    }
}