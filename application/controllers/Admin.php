<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_not_login();
    }

    public function index()
    {
        $data = [
            'title' => 'Beranda'
        ];

        $this->template->load('layout/master', 'admin/index', $data);
    }
}