<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PelangganModel extends CI_Model
{
    public function get($param = null)
    {
        $this->db->where('status', 0);
        if ($param !== null) {
            $this->db->where('produk.id', $param);
        }
        return $this->db->get('pelanggan');
    }

    public function add($param)
    {
        $this->db->insert('pelanggan', $param);
    }

    public function edit($param)
    {
        $this->db->set('nama', $param['nama']);
        $this->db->set('telepon', $param['telepon']);
        $this->db->set('alamat', $param['alamat']);
        $this->db->where('id', $param['id']);
        $this->db->update('pelanggan');
    }

    public function hapus($id)
    {
        $this->db->set('status', 1);
        $this->db->where('id', $id);
        $this->db->update('pelanggan');
    }
}