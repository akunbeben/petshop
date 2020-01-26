<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanModel Extends CI_Model
{
    public function get_inventori($param = null)
    {
        $this->db->where('doc_type', 1);
        if ($param !== null) {
            $this->db->where('id', $param);
        }
        $this->db->order_by('id DESC');
        return $this->db->get('laporan');
    }

    public function get_stok($param = null)
    {
        $this->db->where('doc_type', 2);
        if ($param !== null) {
            $this->db->where('id', $param);
        }
        $this->db->order_by('id DESC');
        return $this->db->get('laporan');
    }

    public function detail_inventori($param)
    {
        $this->db->where('doc_id', $param);
        return $this->db->get('laporan_inventory_detail');
    }

    public function detail_stok($param)
    {
        $this->db->where('doc_id', $param);
        $this->db->where('jumlah > 0');
        return $this->db->get('laporan_stok_detail');
    }

    public function getLastID()
    {
        $this->db->from('laporan');
        $this->db->limit(1);
        $this->db->order_by('id DESC');
        return $this->db->get();
    }

    public function generate_inv($data)
    {
        $this->db->insert_batch('laporan_inventory_detail', $data);
    }

    public function generate_stok($data)
    {
        $this->db->insert_batch('laporan_stok_detail', $data);
    }

    public function generateInv($param)
    {
        $this->db->insert('laporan', $param);
    }

    public function generateStok($param)
    {
        $this->db->insert('laporan', $param);
    }

    public function filter_inventori($param)
    {
        $this->db->where('doc_type', 1);
        $this->db->where('created_at >=', $param['tgl_awal']);
        $this->db->where('created_at <=', $param['tgl_akhir']);
        return $this->db->get('laporan');
    }

    public function filter_stok($param)
    {
        $this->db->where('doc_type', 2);
        $this->db->where('created_at >=', $param['tgl_awal']);
        $this->db->where('created_at <=', $param['tgl_akhir']);
        return $this->db->get('laporan');
    }
}