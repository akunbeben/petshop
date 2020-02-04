<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdukModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'produk_masuk';
    }

    public function get($param = null)
    {
        $this->db->select('produk.*, kategori.nama_kategori, unit.nama_unit');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.kategori = kategori.id');
        $this->db->join('unit', 'produk.unit = unit.id');
        $this->db->where('kategori.aktif', '1');
        if ($param !== null) {
            $this->db->where('produk.id', $param);
        }
        $this->db->order_by('id ASC');
        return $this->db->get();
    }
    
    public function detail()
    {
        $this->db->select('produk_masuk.*, produk.nama_produk');
        $this->db->from('produk_masuk');
        $this->db->join('produk', 'produk.id = produk_masuk.produk_id');
        $this->db->where('produk_masuk.time_stamp BETWEEN (select last_day(curdate() - interval 2 month) + interval 1 day) and NOW()');
        $this->db->order_by('produk_id, time_stamp ASC');
        return $this->db->get();
    }

    public function add($param)
    {
        $this->db->insert('produk', $param);
        $this->db->query("
        INSERT INTO
                    produk_masuk
                    (produk_id, jumlah, created_by)
            VALUES
                    ((SELECT id FROM produk ORDER BY id DESC LIMIT 1), 0, '" . $this->session->userdata('nama') ."')
        ");
    }

    public function get_category($status = null)
    {
        if ($status) {
            $this->db->where('aktif', 1);
        }
        return $this->db->get('kategori');
    }

    public function get_unit($status = null)
    {
        if ($status) {
            $this->db->where('aktif', 1);
        }
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
            'time_stamp'    => date('Y-m-d H:i:s', time()),
            'created_by'    => $param['created_by']
        ];
        $this->db->insert('produk_masuk', $data);
    }

    public function edit($param)
    {
        $this->db->set('nama_produk', $param['nama_produk']);
        $this->db->set('kategori', $param['kategori']);
        $this->db->set('unit', $param['unit']);
        $this->db->set('harga_jual', $param['harga_jual']);
        $this->db->set('profit', $param['profit']);
        $this->db->where('id', $param['id']);
        $this->db->update('produk');
    }

    public function add_cat($param)
    {
        $this->db->insert('kategori', $param);
    }

    public function edit_cat($param)
    {
        $this->db->set('nama_kategori', $param['nama_kategori']);
        $this->db->set('aktif', $param['aktif']);
        $this->db->where('id', $param['id']);
        $this->db->update('kategori');
    }

    public function add_unit($param)
    {
        $this->db->insert('unit', $param);
    }

    public function edit_unit($param)
    {
        $this->db->set('nama_unit', $param['nama_unit']);
        $this->db->set('aktif', $param['aktif']);
        $this->db->where('id', $param['id']);
        $this->db->update('unit');
    }

    public function delete($id)
    {
        $this->db->delete($param['tableName'], ['id' => $param['id']]);
    }

    public function kurang($id)
    {
        $this->db->set('stok', 'stok - 1', FALSE);
        $this->db->where('id', $id);
        $this->db->update('produk');
    }

    public function tambah($id)
    {
        $this->db->set('stok', 'stok + 1', FALSE);
        $this->db->where('id', $id);
        $this->db->update('produk');
    }

    public function returnStok($id = null, $qty = null)
    {
        $this->db->set('stok', 'stok + ' . $qty, FALSE);
        $this->db->where('id', $id);
        $this->db->update('produk');
    }
}