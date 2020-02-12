<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PelangganModel');
        $this->load->model('KaryawanModel');
        is_not_login();
    }

    public function index()
    {
        $data = [
            'title'     => 'Karyawan',
            'karyawan'  => $this->KaryawanModel->get()->result()
        ];
        $this->template->load('layout/master', 'karyawan/index', $data);
    }

    public function tambah()
    {
        $data   = [
            'id'            => null,
            'nama'          => $this->input->post('karyawan'),
            'alamat'        => $this->input->post('alamat'),
            'email'         => $this->input->post('email'),
            'telepon'       => $this->input->post('telepon'),
            'jabatan'       => $this->input->post('jabatan'),
            'start_date'    => date('Y-m-d H:i:s', time())
        ];
        $this->KaryawanModel->save($data);
        $this->session->set_flashdata('sukses-produk', 'Data karyawan berhasil ditambah.');
        redirect('karyawan/');
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        $this->KaryawanModel->delete($id);
        $this->session->set_flashdata('sukses-produk', 'Data karyawan berhasil dihapus.');
        redirect('karyawan/');
    }

    public function edit()
    {
        $id = $this->input->post('id_karyawan');
        $data   = [
            'id'            => $id,
            'nama'          => $this->input->post('editkaryawan'),
            'alamat'        => $this->input->post('editalamat'),
            'email'         => $this->input->post('editemail'),
            'telepon'       => $this->input->post('edittelepon'),
            'jabatan'       => $this->input->post('editjabatan')
        ];
        $this->KaryawanModel->edit($data);
        $this->session->set_flashdata('sukses-produk', 'Data karyawan berhasil diupdate.');
        redirect('karyawan/');
    }
}