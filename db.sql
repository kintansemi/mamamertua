-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17 Mar 2017 pada 05.02
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` varchar(5) NOT NULL,
  `nama_menu` varchar(64) NOT NULL,
  `harga` int(10) NOT NULL,
  `jenis` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga`, `jenis`) VALUES
('U1', 'Nasi Goreng Telur Dadar', 10000, NULL),
('U10', 'Mie Goreng Ayam', 15000, NULL),
('U11', 'Mie Goreng Telur Mata Sapi', 12000, NULL),
('U12', 'Lenggang Goreng', 10000, NULL),
('U13', 'Oreo Goreng', 10000, NULL),
('U2', 'Nasi Goreng Telur Mata Sapi', 12000, NULL),
('U3', 'Nasi Goreng Telur + Ayam', 15000, NULL),
('U4', 'Nasi Goreng Komplit Mama Mertua', 18000, NULL),
('U5', 'Mie Kuah Pedas', 15000, NULL),
('U6', 'Mie Kuah Super Pedas', 15000, NULL),
('U7', 'Mie Kuah Ayam', 15000, NULL),
('U8', 'Nasi Goreng Ayam Pedas', 15000, NULL),
('U9', 'Nasi Goreng Ayam Super Pedas', 15000, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(10) NOT NULL,
  `id_menu` varchar(5) NOT NULL,
  `kasir` varchar(64) NOT NULL,
  `status` varchar(16) NOT NULL DEFAULT 'unconfirmed',
  `jumlah` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `id_resi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_menu`, `kasir`, `status`, `jumlah`, `tanggal`, `id_resi`) VALUES
(1, 'U1', 'Owner Mama Mertua', 'confirmed', 3, '2017-03-17', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `resi`
--

CREATE TABLE `resi` (
  `no_resi` int(16) NOT NULL,
  `uang` bigint(20) DEFAULT '0',
  `kembalian` bigint(20) DEFAULT '0',
  `tanggal` date NOT NULL,
  `status` varchar(16) NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `resi`
--

INSERT INTO `resi` (`no_resi`, `uang`, `kembalian`, `tanggal`, `status`) VALUES
(1, 100000, 0, '2017-03-17', 'confirmed');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(2) NOT NULL,
  `role_name` varchar(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(36) NOT NULL,
  `password` varchar(64) NOT NULL,
  `id_role` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `id_role`) VALUES
('kasir', '99d56572d55a95c22fc6dc8fee6635be', 2),
('owner', '4dc2a159b17b4725943816b8ba6d7ff5', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_data`
--

CREATE TABLE `user_data` (
  `username` varchar(16) NOT NULL,
  `nama` varchar(36) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_data`
--

INSERT INTO `user_data` (`username`, `nama`, `alamat`) VALUES
('kasir', 'Ari Susanto', ''),
('owner', 'Owner Mama Mertua', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `resi`
--
ALTER TABLE `resi`
  ADD PRIMARY KEY (`no_resi`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `resi`
--
ALTER TABLE `resi`
  MODIFY `no_resi` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
