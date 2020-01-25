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
        return $this->db->get('laporan');
    }

    public function detail_inventori($param)
    {
        $this->db->where('doc_id', $param);
        return $this->db->get('laporan_inventory_detail');
    }
}