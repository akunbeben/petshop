<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenjualanModel extends CI_Model{

    public function get()
    {
        return $this->db->get('penjualan');
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
        $query = "SELECT sum(subtotal) AS grand_total FROM keranjang_detail HAVING (sum(subtotal) > 0)";
        $execute = $this->db->query($query);
        if ($execute->num_rows() == 0) {
            return 0;
        } else {
            return $execute;
        }
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

    public function profit()
    {
        $query = 'SELECT sum(profit) AS profit FROM keranjang_detail';
        return $this->db->query($query)->row()->profit;
    }

    public function clear()
    {
        $this->db->empty_table('keranjang');
    }

    public function proses($param)
    {
        $this->db->insert('penjualan', $param);
    }

    public function last_row()
    {
        return $this->db->from('penjualan')->order_by('faktur DESC')->limit(1)->get()->row();
    }

    public function addDetail($no_invoice)
    {
        $this->db->query("INSERT INTO penjualan_detail (id, faktur_id, produk, jumlah_terjual)
                    SELECT null, '$no_invoice', keranjang.produk_id, keranjang.qty
                    FROM keranjang");
    }

    public function nota_header()
    {
        $this->db->order_by('faktur DESC');
        $this->db->limit(1);
        return $this->db->get('penjualan');
    }

    public function nota_line($faktur)
    {
        $this->db->select('penjualan_detail.*, produk.nama_produk, produk.harga_jual');
        $this->db->join('produk', 'penjualan_detail.produk = produk.id');
        $this->db->where('faktur_id', $faktur);
        $this->db->from('penjualan_detail');
        return $this->db->get();
    }
}