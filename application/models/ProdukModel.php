<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdukModel extends CI_Model
{
    public function get($param = null)
    {
        $this->db->select('produk.*, kategori.nama_kategori, unit.nama_unit');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.kategori = kategori.id');
        $this->db->join('unit', 'produk.unit = unit.id');
        if ($param !== null) {
            $this->db->where('produk.id', $param);
        }
        $this->db->order_by('id ASC');
        return $this->db->get();
    }

    public function add($param)
    {
        $this->db->insert('produk', $param);
        $this->db->query("
        INSERT INTO
                    produk_masuk
                    (produk_id, jumlah)
            VALUES
                    ((SELECT id FROM produk ORDER BY id DESC LIMIT 1), ". $this->input->post('jumlah') .")
        ");
    }

    public function get_category()
    {
        return $this->db->get('kategori');
    }

    public function get_unit()
    {
        return $this->db->get('unit');
    }

    public function get_stock()
    {
        return $this->db->query("SELECT stok FROM produk ORDER BY id DESC LIMIT 1");
    }

    public function stockin($param)
    {
        $this->db->set('stok', $param['produk'] + $param['stok-in']);
        $this->db->where('id', $param['id']);
        $this->db->update('produk');
    }

    public function track_stock($param)
    {
        $data = [
            'id'            => null,
            'produk_id'     => $param['id'],
            'jumlah'        => $param['stok-in'],
            'time_stamp'    => date('Y-m-d H:i:s', time())
        ];
        $this->db->insert('produk_masuk', $data);
    }

    public function edit($param)
    {
        $this->db->set('nama_produk', $param['nama_produk']);
        $this->db->set('kategori', $param['kategori']);
        $this->db->set('unit', $param['unit']);
        $this->db->where('id', $param['id']);
        $this->db->update('produk');
    }
}