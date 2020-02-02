<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
    }

    public function login() 
    {   
        $data = [
            'title' => 'Login'
        ];

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_message('required', '{field} cannot be empty.');

        if ($this->form_validation->run() == FALSE) {
            if ($this->session->userdata('petshop-token')) {
                redirect('admin/');
            } else {
                $this->load->view('auth/login', $data);
            }
        } else {
            $this->do_login();
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('petshop-token');
        redirect('auth/login/');
    }

    function do_login()
    {
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');

        $getUser    = $this->AuthModel->get($username)->row();
        
        if ($getUser) {
            if (password_verify($password, $getUser->password)) {
                $data_session   = [
                    'username'      => $username,
                    'nama'          => $getUser->nama,
                    'jabatan'       => $getUser->jabatan,
                    'petshop-token' => password_hash($username, PASSWORD_DEFAULT)
                ];
                $this->session->set_userdata($data_session);
                redirect('admin/');
            } else {
                $this->session->set_flashdata('gagal-produk', 'Password salah.');
                redirect('auth/login/');
            }
        } else {
            $this->session->set_flashdata('gagal-produk', 'Pengguna tidak ditemukan.');
            redirect('auth/login/');
        }
    }
}