<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Model
{

  public function get_stok_masuk()
  {
    $query = "SELECT SUM(jumlah) as jumlah FROM produk_masuk WHERE time_stamp >= TIMESTAMP(CURDATE())";
    $execute = $this->db->query($query);
    if ($execute->row() == null) {
      return null;
    } else {
      return $this->db->query($query)->row()->jumlah;
    }
  }

  public function get_qty()
  {
    $query = "SELECT SUM(stok) as jumlah FROM produk";
    $execute = $this->db->query($query);
    if ($execute->row() == null) {
      return null;
    } else {
      return $this->db->query($query)->row()->jumlah;
    }
  }

  public function get_penjualan()
  {
    $query = "SELECT COUNT(faktur) as total FROM penjualan WHERE waktu_transaksi >= CURDATE() AND aktif = 0";
    $execute = $this->db->query($query);
    if ($execute->row() == null) {
      return null;
    } else {
      return $this->db->query($query)->row()->total;
    }
  }

  public function get_pelanggan()
  {
    $query = "SELECT COUNT(id) as total FROM pelanggan";
    $execute = $this->db->query($query);
    if ($execute->row() == null) {
      return null;
    } else {
      return $this->db->query($query)->row()->total;
    }
  }

  public function get_selisih()
  {
    $query = "
    SELECT
        ( 
              ( 
                (SELECT SUM(profit) AS profit FROM penjualan WHERE waktu_transaksi >= timestamp(CURDATE()) AND aktif = 0)
        /
                (SELECT SUM(profit) AS profit FROM penjualan WHERE waktu_transaksi >= SUBDATE(CURDATE(),1) AND waktu_transaksi <= NOW() AND aktif = 0)
            ) * 100
        ) 
    AS profit
            ";

    $execute = $this->db->query($query);
    if ($execute->row() == null) {
      return null;
    } else {
      return $this->db->query($query)->row()->profit;
    }
  }
}
