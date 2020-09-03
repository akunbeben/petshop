<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Model
{
  function getDataOmset()
  {
    $query =
      "SELECT
        SUM(penjualan.total) omset,
        DATE_FORMAT(penjualan.waktu_transaksi, '%m/%d/%Y') AS transaction_date
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

  function getDataOmsetPenitipan()
  {
    $query =
      "SELECT 
        SUM(penitipan.biaya) omset, 
        DATE_FORMAT(penitipan.tanggal_masuk, '%m/%d/%Y') AS transaction_date 
      FROM 
        penitipan 
      WHERE 
        penitipan.tanggal_masuk BETWEEN NOW() - INTERVAL 30 DAY AND NOW() 
      AND 
        penitipan.status = 1 
      GROUP BY transaction_date";

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
        long_date";

    $execute = $this->db->query($query);

    if ($execute->row() == null) {
      return ['profit' => 0, 'transaction_date' => 'Data Kosong.'];
    } else {
      return $execute->result();
    }
  }

  function getDataProfitPenitipan()
  {
    $query =
      "SELECT 
        SUM(penitipan.biaya) profit, 
        DATE_FORMAT(penitipan.tanggal_masuk, '%b') AS transaction_date, 
        MONTHNAME(penitipan.tanggal_masuk) AS long_date 
      FROM 
        penitipan 
      WHERE 
        penitipan.tanggal_masuk BETWEEN NOW() - INTERVAL 12 MONTH AND NOW() 
      AND 
        penitipan.status = 1 
      GROUP BY 
        long_date";

    $execute = $this->db->query($query);

    if ($execute->row() == null) {
      return ['profit' => 0, 'transaction_date' => 'Data Kosong.'];
    } else {
      return $execute->result();
    }
  }
}
