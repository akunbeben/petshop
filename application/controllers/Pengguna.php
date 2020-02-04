<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PelangganModel');
        $this->load->model('PenggunaModel');
        $this->load->model('KaryawanModel');
    }

    public function index()
    {
        $data = [
            'title'     => 'Pengguna',
            'pengguna'  => $this->PenggunaModel->get()->result(),
            'karyawan'  => $this->KaryawanModel->get()->result()
        ];
        $this->template->load('layout/master', 'pengguna/index', $data);
    }

    public function tambah()
    {
        $data   = [
            'id'            => null,
            'id_karyawan'   => $this->input->post('id_karyawan'),
            'username'      => $this->input->post('username'),
            'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'status'        => 0
        ];
        // dd($data);
        // die;
        $this->PenggunaModel->save($data);
        $this->session->set_flashdata('sukses-produk', 'Data pengguna berhasil ditambah.');
        redirect('pengguna/');
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        $this->PenggunaModel->delete($id);
        $this->session->set_flashdata('sukses-produk', 'Data pengguna berhasil dihapus.');
        redirect('pengguna/');
    }

    public function edit()
    {
        $id = $this->input->post('id_pengguna');
        $data   = [
            'id'            => $id,
            'id_karyawan'   => $this->input->post('editid_karyawan'),
            'username'      => $this->input->post('editusername'),
            'password'      => password_hash($this->input->post('editpassword'), PASSWORD_DEFAULT),
            'status'        => 0
        ];
        // dd($data);
        // die;
        $this->PenggunaModel->edit($data);
        $this->session->set_flashdata('sukses-produk', 'Data karyawan berhasil diupdate.');
        redirect('pengguna/');
    }
}