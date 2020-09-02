<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Model
{
  function getDataOmset()
  {
    $query =
      "SELECT
        SUM(penjualan.total) omset,
        DATE_FORMAT(penjualan.waktu_transaksi, '%d/%m/%Y') AS transaction_date
      FROM
        penjualan
      WHERE 
        penjualan.waktu_transaksi BETWEEN NOW() - INTERVAL 30 DAY AND NOW()
      AND
        penjualan.aktif = 0
      GROUP BY
        transaction_date";

    $execute = $this->db->query($query);

    if ($execute->row() == null) {
      return ['omset' => 0, 'transaction_date' => 'Data Kosong.'];
    } else {
      return $execute->result();
    }
  }

  function getDataProfit()
  {
    $query =
      "SELECT
        SUM(penjualan.profit) profit,
        DATE_FORMAT(penjualan.waktu_transaksi, '%b') AS transaction_date,
        MONTHNAME(penjualan.waktu_transaksi) AS long_date
      FROM
        penjualan
      WHERE 
        penjualan.waktu_transaksi BETWEEN NOW() - INTERVAL 12 MONTH AND NOW()
      AND
        penjualan.aktif = 0
      GROUP BY
        MONTHNAME(transaction_date)";

    $execute = $this->db->query($query);

    if ($execute->row() == null) {
      return ['profit' => 0, 'transaction_date' => 'Data Kosong.'];
    } else {
      return $execute->result();
    }
  }
}
