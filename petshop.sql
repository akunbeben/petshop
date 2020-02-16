-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Feb 2020 pada 13.58
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(128) NOT NULL,
  `telepon` varchar(128) NOT NULL,
  `jabatan` int(11) NOT NULL COMMENT '2:kasir, 1:admin',
  `start_date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `alamat`, `email`, `telepon`, `jabatan`, `start_date`, `status`) VALUES
(1, 'Dwyne Johnson', 'Banjarmasin', 'example@mail.com', '080111111111', 1, '2020-02-03 02:43:57', 0),
(4, 'Mike Tyson', 'JALAN', 'akunbeben@gmail.com', '088888888', 2, '2020-02-04 23:23:13', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL,
  `aktif` int(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `aktif`) VALUES
(1, 'Foods', 1),
(2, 'Tools', 1),
(8, 'Peliharaan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang_detail`
--

CREATE TABLE `keranjang_detail` (
  `id` int(11) NOT NULL,
  `keranjang_id` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `profit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `no_doc` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` varchar(20) NOT NULL,
  `doc_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id`, `no_doc`, `created_at`, `created_by`, `doc_type`) VALUES
(1, 'DOC/00001/INV/25/01/2020', '2020-01-25 10:45:58', 'admin', 1),
(2, 'DOC/00002/INV/25/01/2020', '2020-01-25 11:56:57', 'admin', 1),
(4, 'DOC/00001/SM/25/01/2020', '2020-01-25 12:22:02', 'admin', 2),
(5, 'DOC/00003/INV/25/01/2020', '2020-01-25 12:26:43', 'admin', 1),
(6, 'DOC/00002/SM/26/01/2020', '2020-01-26 04:18:56', 'admin', 2),
(7, 'DOC/00004/INV/26/01/2020', '2020-01-26 06:30:32', 'admin', 1),
(8, 'DOC/00005/INV/26/01/2020', '2020-01-26 07:25:45', 'admin', 1),
(11, 'DOC/00001/PJ/27/01/2020', '2020-01-26 16:01:28', 'admin', 3),
(12, 'DOC/00002/PJ/31/01/2020', '2020-01-30 16:30:38', 'admin', 3),
(13, 'DOC/00003/SM/31/01/2020', '2020-01-30 16:44:24', 'admin', 2),
(14, 'DOC/00006/INV/31/01/2020', '2020-01-30 17:54:32', 'admin', 1),
(21, 'DOC/00001/PN/31/01/2020', '2020-01-30 21:03:51', 'admin', 4),
(22, 'DOC/00007/INV/31/01/2020', '2020-01-31 13:40:51', 'admin', 1),
(23, 'DOC/00003/PJ/04/02/2020', '2020-02-04 15:15:33', 'admin', 3),
(24, 'DOC/00004/PJ/04/02/2020', '2020-02-04 15:17:02', 'Dwyne Johnson', 3),
(25, 'DOC/00008/INV/04/02/2020', '2020-02-04 15:25:51', 'Mike Tyson', 1),
(26, 'DOC/00009/INV/07/02/2020', '2020-02-06 21:11:44', 'Dwyne Johnson', 1),
(27, 'DOC/00005/PJ/13/02/2020', '2020-02-12 18:13:17', 'Dwyne Johnson', 3),
(28, 'DOC/00006/PJ/13/02/2020', '2020-02-12 19:19:54', 'Dwyne Johnson', 3),
(29, 'DOC/00010/INV/15/02/2020', '2020-02-15 12:12:38', 'Dwyne Johnson', 1),
(30, 'DOC/00007/PJ/15/02/2020', '2020-02-15 12:14:09', 'Dwyne Johnson', 3),
(31, 'DOC/00008/PJ/16/02/2020', '2020-02-16 09:51:07', 'Dwyne Johnson', 3),
(32, 'DOC/00009/PJ/16/02/2020', '2020-02-16 12:54:57', 'Dwyne Johnson', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_inventory_detail`
--

CREATE TABLE `laporan_inventory_detail` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `produk` varchar(128) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan_inventory_detail`
--

INSERT INTO `laporan_inventory_detail` (`id`, `doc_id`, `produk`, `jumlah`) VALUES
(1, 1, 'Wiskas', 5),
(2, 1, 'Kandang', 5),
(3, 2, 'Wiskas', 5),
(4, 2, 'Kandang', 5),
(5, 5, 'Wiskas', 10),
(6, 5, 'Kandang', 3),
(7, 7, 'Wiskas', 10),
(8, 7, 'Kandang', 3),
(9, 8, 'Wiskas', 10),
(10, 8, 'Kandang', 3),
(11, 14, 'Wiskas', 15),
(12, 14, 'Kandang', 0),
(13, 22, 'Wiskas', 15),
(14, 22, 'Kandang', 0),
(15, 25, 'Wiskas', 4),
(16, 25, 'Kandang', 10),
(17, 26, 'Wiskas', 0),
(18, 26, 'Kandang', 10),
(19, 29, 'Wiskas', 10),
(20, 29, 'Kandang', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_penitipan_detail`
--

CREATE TABLE `laporan_penitipan_detail` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `nama_peliharaan` varchar(128) NOT NULL,
  `pemilik` varchar(128) NOT NULL,
  `catatan` text NOT NULL,
  `tanggal_masuk` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan_penitipan_detail`
--

INSERT INTO `laporan_penitipan_detail` (`id`, `doc_id`, `nama_peliharaan`, `pemilik`, `catatan`, `tanggal_masuk`) VALUES
(3, 21, 'Pet', 'Benny Rahmat', 'Sehat', '2020-01-31 04:51:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_penjualan_detail`
--

CREATE TABLE `laporan_penjualan_detail` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `faktur` varchar(128) NOT NULL,
  `total` int(11) NOT NULL,
  `profit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan_penjualan_detail`
--

INSERT INTO `laporan_penjualan_detail` (`id`, `doc_id`, `faktur`, `total`, `profit`) VALUES
(1, 11, 'P2601200001', 20000, 10000),
(2, 11, 'P2601200002', 80000, 40000),
(3, 12, 'P2601200001', 20000, 10000),
(4, 12, 'P2601200002', 80000, 40000),
(5, 12, 'P2701200003', 40000, 20000),
(6, 12, 'P2701200004', 40000, 20000),
(7, 12, 'P3001200005', 40000, 20000),
(8, 23, 'P0402200001', 40000, 20000),
(9, 23, 'P0402200002', 80000, 40000),
(10, 24, 'P0402200001', 40000, 20000),
(11, 24, 'P0402200002', 80000, 40000),
(12, 27, 'P0402200001', 40000, 20000),
(13, 27, 'P0402200002', 80000, 40000),
(14, 27, 'P0502200003', 20000, 10000),
(15, 27, 'P0502200004', 60000, 30000),
(16, 27, 'P0502200005', 80000, 40000),
(17, 27, 'P0602200006', 40000, 20000),
(18, 27, 'P1302200007', 40000, 20000),
(19, 28, 'P0402200002', 80000, 40000),
(20, 28, 'P0502200003', 20000, 10000),
(21, 28, 'P0502200004', 60000, 30000),
(22, 28, 'P0502200005', 80000, 40000),
(23, 28, 'P0602200006', 40000, 20000),
(24, 28, 'P1302200007', 40000, 20000),
(25, 30, 'P0402200002', 80000, 40000),
(26, 30, 'P0502200003', 20000, 10000),
(27, 30, 'P0502200004', 60000, 30000),
(28, 30, 'P0502200005', 80000, 40000),
(29, 30, 'P0602200006', 40000, 20000),
(30, 30, 'P1502200008', 40000, 20000),
(31, 31, 'P0402200002', 80000, 40000),
(32, 31, 'P0502200003', 20000, 10000),
(33, 31, 'P0502200004', 60000, 30000),
(34, 31, 'P0502200005', 80000, 40000),
(35, 31, 'P0602200006', 40000, 20000),
(36, 31, 'P1502200008', 40000, 20000),
(37, 32, 'P1602200009', 20000, 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_stok_detail`
--

CREATE TABLE `laporan_stok_detail` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `produk` varchar(128) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `time_stamp` datetime NOT NULL,
  `created_by` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan_stok_detail`
--

INSERT INTO `laporan_stok_detail` (`id`, `doc_id`, `produk`, `jumlah`, `time_stamp`, `created_by`) VALUES
(13, 4, 'Wiskas', 0, '2020-01-25 20:19:32', 'admin'),
(14, 4, 'Wiskas', 10, '2020-01-25 20:19:56', 'admin'),
(15, 4, 'Kandang', 0, '2020-01-25 20:19:50', 'admin'),
(16, 4, 'Kandang', 1, '2020-01-25 20:20:04', 'admin'),
(17, 4, 'Kandang', 2, '2020-01-25 20:20:10', 'admin'),
(18, 6, 'Wiskas', 0, '2020-01-25 20:19:32', 'admin'),
(19, 6, 'Wiskas', 10, '2020-01-25 20:19:56', 'admin'),
(20, 6, 'Kandang', 0, '2020-01-25 20:19:50', 'admin'),
(21, 6, 'Kandang', 1, '2020-01-25 20:20:04', 'admin'),
(22, 6, 'Kandang', 2, '2020-01-25 20:20:10', 'admin'),
(23, 13, 'Wiskas', 0, '2020-01-25 20:19:32', 'admin'),
(24, 13, 'Wiskas', 10, '2020-01-25 20:19:56', 'admin'),
(25, 13, 'Wiskas', 10, '2020-01-31 00:44:06', 'admin'),
(26, 13, 'Kandang', 0, '2020-01-25 20:19:50', 'admin'),
(27, 13, 'Kandang', 1, '2020-01-25 20:20:04', 'admin'),
(28, 13, 'Kandang', 2, '2020-01-25 20:20:10', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `telepon`, `alamat`, `status`) VALUES
(2, 'Charina Zahratunnisa', '082253054008', 'Jalan Sukamara No 11 RT 06 RW 02', 0),
(3, 'Hehen', '128371923', 'Banjarmasin', 0),
(4, 'Dwyne Johnson', '123123123', 'Jalanan', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penitipan`
--

CREATE TABLE `penitipan` (
  `id` int(11) NOT NULL,
  `nama_peliharaan` varchar(128) NOT NULL,
  `pemilik` int(11) NOT NULL,
  `catatan` text DEFAULT NULL,
  `tanggal_masuk` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal_keluar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penitipan`
--

INSERT INTO `penitipan` (`id`, `nama_peliharaan`, `pemilik`, `catatan`, `tanggal_masuk`, `status`, `tanggal_keluar`) VALUES
(5, 'Kucing', 3, 'Sakit', '2020-02-04 23:19:56', 1, '2020-02-04 23:20:00'),
(6, 'Tsar', 4, 'Sehat', '2020-02-15 20:14:44', 1, '2020-02-15 20:14:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `faktur` varchar(128) NOT NULL,
  `kasir` varchar(128) NOT NULL,
  `pelanggan` varchar(128) NOT NULL,
  `total` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `waktu_transaksi` datetime NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`faktur`, `kasir`, `pelanggan`, `total`, `profit`, `bayar`, `kembalian`, `waktu_transaksi`, `aktif`) VALUES
('P0402200001', 'admin', 'Umum', 40000, 20000, 60000, 20000, '2020-02-04 23:13:36', 1),
('P0402200002', 'Dwyne Johnson', 'Umum', 80000, 40000, 100000, 20000, '2020-02-04 23:15:22', 0),
('P0502200003', 'Dwyne Johnson', 'Umum', 20000, 10000, 20000, 0, '2020-02-05 00:50:23', 0),
('P0502200004', 'Dwyne Johnson', 'Umum', 60000, 30000, 80000, 20000, '2020-02-05 01:21:20', 0),
('P0502200005', 'Dwyne Johnson', 'Umum', 80000, 40000, 100000, 20000, '2020-02-05 01:22:19', 0),
('P0602200006', 'Dwyne Johnson', 'Umum', 40000, 20000, 50000, 10000, '2020-02-06 20:37:46', 0),
('P1302200007', 'Dwyne Johnson', 'Dwyne Johnson', 40000, 20000, 50000, 10000, '2020-02-13 02:11:41', 1),
('P1502200008', 'Dwyne Johnson', 'Umum', 40000, 20000, 50000, 10000, '2020-02-15 20:13:46', 0),
('P1602200009', 'Dwyne Johnson', 'Umum', 20000, 10000, 20000, 0, '2020-02-16 20:44:01', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id` int(11) NOT NULL,
  `faktur_id` varchar(128) NOT NULL,
  `produk` int(11) NOT NULL,
  `jumlah_terjual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id`, `faktur_id`, `produk`, `jumlah_terjual`) VALUES
(19, 'P0402200001', 3, 2),
(20, 'P0402200002', 3, 4),
(21, 'P0502200003', 3, 1),
(22, 'P0502200004', 3, 3),
(23, 'P0502200005', 3, 4),
(24, 'P0602200006', 3, 2),
(25, 'P1302200007', 4, 2),
(26, 'P1502200008', 3, 2),
(27, 'P1602200009', 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(128) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `kategori` int(2) NOT NULL,
  `unit` int(2) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `profit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `stok`, `gambar`, `kategori`, `unit`, `harga_beli`, `harga_jual`, `profit`) VALUES
(3, 'Wiskas', 7, 'default.png', 1, 2, 10000, 20000, 10000),
(4, 'Kandang', 8, 'default.png', 2, 1, 10000, 20000, 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_masuk`
--

CREATE TABLE `produk_masuk` (
  `id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk_masuk`
--

INSERT INTO `produk_masuk` (`id`, `produk_id`, `jumlah`, `time_stamp`, `created_by`) VALUES
(3, 3, 0, '2020-01-25 12:19:32', 'admin'),
(4, 4, 0, '2020-01-25 12:19:50', 'admin'),
(5, 3, 10, '2020-01-25 12:19:56', 'admin'),
(6, 4, 1, '2020-01-25 12:20:04', 'admin'),
(7, 4, 2, '2020-01-25 12:20:10', 'admin'),
(8, 3, 10, '2020-01-30 16:44:06', 'admin'),
(9, 3, 6, '2020-02-04 15:58:23', 'Dwyne Johnson'),
(10, 3, 10, '2020-02-15 12:12:26', 'Dwyne Johnson');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `nama_unit` varchar(128) NOT NULL,
  `aktif` int(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`id`, `nama_unit`, `aktif`) VALUES
(1, 'Pcs', 1),
(2, 'Pack', 1),
(3, 'Ekor', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `id_karyawan`, `username`, `password`, `status`) VALUES
(1, 1, 'admin', '$2y$10$bP7mmm2F3JnV7TfE4Z0E2eRaOVBhUYcudIdFB39KirwYnhoVDSGim', 0),
(13, 4, 'mike', '$2y$10$c.0cwzUk7XwTjxZ15RLJSuzNDiBwwYfAJOTUplyNGyWfIu75rXUgS', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`produk_id`);

--
-- Indeks untuk tabel `keranjang_detail`
--
ALTER TABLE `keranjang_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keranjang_id` (`keranjang_id`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan_inventory_detail`
--
ALTER TABLE `laporan_inventory_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doc_id` (`doc_id`);

--
-- Indeks untuk tabel `laporan_penitipan_detail`
--
ALTER TABLE `laporan_penitipan_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doc_id` (`doc_id`);

--
-- Indeks untuk tabel `laporan_penjualan_detail`
--
ALTER TABLE `laporan_penjualan_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doc_id` (`doc_id`);

--
-- Indeks untuk tabel `laporan_stok_detail`
--
ALTER TABLE `laporan_stok_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doc_id` (`doc_id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penitipan`
--
ALTER TABLE `penitipan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemilik` (`pemilik`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`faktur`);

--
-- Indeks untuk tabel `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faktur_id` (`faktur_id`),
  ADD KEY `produk` (`produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori` (`kategori`),
  ADD KEY `unit` (`unit`);

--
-- Indeks untuk tabel `produk_masuk`
--
ALTER TABLE `produk_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indeks untuk tabel `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `keranjang_detail`
--
ALTER TABLE `keranjang_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `laporan_inventory_detail`
--
ALTER TABLE `laporan_inventory_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `laporan_penitipan_detail`
--
ALTER TABLE `laporan_penitipan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `laporan_penjualan_detail`
--
ALTER TABLE `laporan_penjualan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `laporan_stok_detail`
--
ALTER TABLE `laporan_stok_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `penitipan`
--
ALTER TABLE `penitipan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `produk_masuk`
--
ALTER TABLE `produk_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keranjang_detail`
--
ALTER TABLE `keranjang_detail`
  ADD CONSTRAINT `keranjang_detail_ibfk_1` FOREIGN KEY (`keranjang_id`) REFERENCES `keranjang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `laporan_inventory_detail`
--
ALTER TABLE `laporan_inventory_detail`
  ADD CONSTRAINT `laporan_inventory_detail_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `laporan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `laporan_penitipan_detail`
--
ALTER TABLE `laporan_penitipan_detail`
  ADD CONSTRAINT `laporan_penitipan_detail_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `laporan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `laporan_penjualan_detail`
--
ALTER TABLE `laporan_penjualan_detail`
  ADD CONSTRAINT `laporan_penjualan_detail_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `laporan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `laporan_stok_detail`
--
ALTER TABLE `laporan_stok_detail`
  ADD CONSTRAINT `laporan_stok_detail_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `laporan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD CONSTRAINT `penjualan_detail_ibfk_1` FOREIGN KEY (`faktur_id`) REFERENCES `penjualan` (`faktur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjualan_detail_ibfk_2` FOREIGN KEY (`produk`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`unit`) REFERENCES `unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk_masuk`
--
ALTER TABLE `produk_masuk`
  ADD CONSTRAINT `produk_masuk_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
