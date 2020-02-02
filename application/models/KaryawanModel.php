<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KaryawanModel extends CI_Model {

    public function get($id = null)
    {
        if ($id !== null) {
            $this->db->where('id', $id);
        }
        $this->db->where('status', 0);
        return $this->db->get('karyawan');
    }

    public function save($data)
    {
        $this->db->insert('karyawan', $data);
    }

    public function delete($id)
    {
        $this->db->set('status', 1);
        $this->db->where('id', $id);
        $this->db->update('karyawan');
    }

    public function edit($data)
    {
        $this->db->set('nama', $data['nama']);
        $this->db->set('alamat', $data['alamat']);
        $this->db->set('email', $data['email']);
        $this->db->set('telepon', $data['telepon']);
        $this->db->set('jabatan', $data['jabatan']);
        $this->db->where('id', $data['id']);
        $this->db->update('karyawan');
    }
}