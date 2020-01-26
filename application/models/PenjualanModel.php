<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenjualanModel extends CI_Model{

    public function get()
    {

    }

    public function carts($id = null)
    {
        $this->db->select('keranjang.id, keranjang.produk_id, produk.nama_produk, produk.harga_jual, keranjang.qty');
        $this->db->from('keranjang');
        if ($id !== null) {
            $this->db->where('produk_id', $id);
        }
        $this->db->join('produk', 'produk.id = keranjang.produk_id');
        return $this->db->get();
    }

    public function grandTotal()
    {
        $query = 'SELECT sum(subtotal) AS grand_total FROM keranjang_detail';
        return $this->db->query($query)->row()->grand_total;
    }

    public function addtocart($param)
    {
        $prod = $this->db->select('*')->from('keranjang')->where('produk_id', $param['produk_id'])->get()->row();
        if ($this->input->post('produk') == $prod->produk_id) {
            $this->db->set('produk_id', $param['produk_id']);
            $this->db->where('id', $prod->id);
            $this->db->update('keranjang');
        } else {
            $this->db->insert('keranjang', $param);
        }
    }

    public function hapus($id)
    {
        $this->db->where('produk_id', $id);
        $this->db->delete('keranjang');
    }

    public function tambah($id)
    {
        $this->db->set('qty','qty + 1', FALSE);
        $this->db->where('produk_id', $id);
        $this->db->update('keranjang');
    }

    public function kurang($id)
    {
        $this->db->set('qty','qty - 1', FALSE);
        $this->db->where('produk_id', $id);
        $this->db->update('keranjang');
    }

    public function getCartDetail($id)
    {
        $this->db->select('keranjang.*, produk.nama_produk, produk.harga_jual, produk.harga_beli');
        $this->db->from('keranjang');
        $this->db->join('produk', 'produk.id = keranjang.produk_id');
        $this->db->where('produk_id', $id);
        return $this->db->get();
    }
    
    public function addtocartdetail($param)
    {
        $this->db->insert('keranjang_detail', $param);
    }

    public function updatecartdetail($param)
    {
        $this->db->set('subtotal', $param['subtotal']);
        $this->db->set('profit', $param['profit']);
        $this->db->where('keranjang_id', $param['keranjang_id']);
        $this->db->update('keranjang_detail');
    }
}