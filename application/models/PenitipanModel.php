<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenitipanModel extends CI_Model{

    public function get($id = null)
    {
        $this->db->select('penitipan.*, pelanggan.nama, pelanggan.id id_pemilik');
        $this->db->join('pelanggan', 'pelanggan.id = penitipan.pemilik');
        $this->db->where('status', 0);
        if ($id !== null) {
            $this->db->where('id', $id);
        }
        return $this->db->get('penitipan');
    }

    public function get_keluar($id = null)
    {
        $this->db->select('penitipan.*, pelanggan.nama, pelanggan.id id_pemilik');
        $this->db->join('pelanggan', 'pelanggan.id = penitipan.pemilik');
        $this->db->where('status', 1);
        if ($id !== null) {
            $this->db->where('id', $id);
        }
        return $this->db->get('penitipan');
    }

    public function masuk($data)
    {
        $this->db->insert('penitipan', $data);
    }

    public function edit($data)
    {
        $this->db->set('nama_peliharaan', $data['nama_peliharaan']);
        $this->db->set('pemilik', $data['pemilik']);
        $this->db->set('catatan', $data['catatan']);
        $this->db->where('id', $data['id']);
        $this->db->update('penitipan');
    }

    public function keluar($data)
    {
        $this->db->set('status', $data['status']);
        $this->db->set('tanggal_keluar', $data['tanggal_keluar']);
        $this->db->where('id', $data['id']);
        $this->db->update('penitipan');
    }
}