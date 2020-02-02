<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PelangganModel');
        is_not_login();
    }

    public function index()
    {
        $data = [
            'title'     => 'Pelanggan',
            'pelanggan' => $this->PelangganModel->get()->result()
            // 'detail'    => $this->ProdukModel->detail()->result()
        ];
        
        $this->form_validation->set_rules('pelanggan', 'Nama Pelanggan', 'required|trim');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layout/master', 'pelanggan/index', $data);
        } else {
            $param = [
                'id'        => null,
                'nama'      => $this->input->post('pelanggan'),
                'telepon'   => $this->input->post('telepon'),
                'alamat'    => $this->input->post('alamat')
            ];
            $this->session->set_flashdata('sukses-produk', 'Data Pelanggan berhasil ditambah.');
            $this->PelangganModel->add($param);
            redirect('pelanggan/');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id_plg');
        if ($id == null) {
            redirect('pelanggan/');
        } else {
            $param = [
                'id'        => $id,
                'nama'      => $this->input->post('editpelanggan'),
                'telepon'   => $this->input->post('edittelepon'),
                'alamat'    => $this->input->post('editalamat')
            ];
            $this->session->set_flashdata('sukses-produk', 'Data pelanggan berhasil diubah.');
            $this->PelangganModel->edit($param);
            redirect('pelanggan/');
        }
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        $this->PelangganModel->hapus($id);
        $this->session->set_flashdata('sukses-produk', 'Data pelanggan berhasil dihapus.');
        redirect('pelanggan/');
    }
}