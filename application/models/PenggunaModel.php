<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenggunaModel extends CI_Model {

    public function get()
    {
        $this->db->select('users.*, karyawan.nama, karyawan.id sub_id');
        $this->db->from('users');
        $this->db->join('karyawan', 'users.id_karyawan = karyawan.id');
        $this->db->where('users.status', 0);
        return $this->db->get();
    }

    public function save($data)
    {
        $this->db->insert('users', $data);
    }

    public function delete($id)
    {
        $this->db->set('status', 1);
        $this->db->where('id', $id);
        $this->db->update('users');
    }

    public function edit($data)
    {
        $this->db->set('username', $data['username']);
        $this->db->set('password', $data['password']);
        $this->db->where('id', $data['id']);
        $this->db->update('users');
    }
}