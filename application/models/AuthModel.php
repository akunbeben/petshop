<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model
{

    public function get($param = null)
    {
        $this->db->select('users.*, karyawan.nama, karyawan.jabatan');
        $this->db->from('users');
        $this->db->join('karyawan', 'users.id_karyawan = karyawan.id');
        $this->db->where('username', $param);
        return $this->db->get();
    }
}