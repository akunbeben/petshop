<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdukModel extends CI_Model
{
    public function get($param = null)
    {
        $this->db->select('produk.*, kategori.nama_kategori, unit.nama_unit, harga.harga_jual, harga.ppn');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.kategori = kategori.id');
        $this->db->join('unit', 'produk.unit = unit.id');
        $this->db->join('harga', 'produk.id = harga.produk_id');
        if ($param !== null) {
            $this->db->where('produk.id', $param);
        }
        return $this->db->get();
    }
}