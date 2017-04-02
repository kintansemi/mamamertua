-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 02, 2017 at 01:48 PM
-- Server version: 5.7.17-log
-- PHP Version: 7.0.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mamamertua`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detailpesanan` int(10) NOT NULL,
  `id_menu` varchar(5) NOT NULL,
  `status` varchar(16) NOT NULL DEFAULT 'unconfirmed',
  `jumlah` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pesanan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_detailpesanan`, `id_menu`, `status`, `jumlah`, `tanggal`, `id_pesanan`) VALUES
(1, 'U1', 'confirmed', '7', '2017-04-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` varchar(5) NOT NULL,
  `nama_menu` varchar(64) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga`) VALUES
('U1', 'Nasi Goreng Telur Dadar', 10000),
('U10', 'Mie Goreng Ayam', 15000),
('U11', 'Mie Goreng Telur Mata Sapi', 12000),
('U12', 'Lenggang Goreng', 10000),
('U13', 'Oreo Goreng', 10000),
('U2', 'Nasi Goreng Telur Mata Sapi', 12000),
('U3', 'Nasi Goreng Telur + Ayam', 15000),
('U4', 'Nasi Goreng Komplit Mama Mertua', 18000),
('U5', 'Mie Kuah Pedas', 15000),
('U6', 'Mie Kuah Super Pedas', 15000),
('U7', 'Mie Kuah Ayam', 15000),
('U8', 'Nasi Goreng Ayam Pedas', 15000),
('U9', 'Nasi Goreng Ayam Super Pedas', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `nota_pembayaran`
--

CREATE TABLE `nota_pembayaran` (
  `id_nota` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(20) NOT NULL,
  `id_pesanan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nota_pembayaran`
--

INSERT INTO `nota_pembayaran` (`id_nota`, `tanggal`, `total`, `id_pesanan`) VALUES
(1, '2017-04-02', 70000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(16) NOT NULL,
  `uang` bigint(20) DEFAULT '0',
  `tanggal` date NOT NULL,
  `status` varchar(16) NOT NULL DEFAULT 'belum',
  `total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `uang`, `tanggal`, `status`, `total`) VALUES
(1, 100000, '2017-04-02', 'confirmed', 70000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detailpesanan`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `nota_pembayaran`
--
ALTER TABLE `nota_pembayaran`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detailpesanan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nota_pembayaran`
--
ALTER TABLE `nota_pembayaran`
  MODIFY `id_nota` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
