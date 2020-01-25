<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PelangganModel extends CI_Model
{
    public function get($param = null)
    {
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
}