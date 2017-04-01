-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 01, 2017 at 05:48 PM
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
  `id_pesanan` int(10) NOT NULL,
  `id_menu` varchar(5) NOT NULL,
  `kasir` varchar(64) NOT NULL,
  `status` varchar(16) NOT NULL DEFAULT 'unconfirmed',
  `jumlah` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `id_resi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_pesanan`, `id_menu`, `kasir`, `status`, `jumlah`, `tanggal`, `id_resi`) VALUES
(1, 'U1', 'Owner Mama Mertua', 'confirmed', '3', '2017-03-17', 1),
(4, 'U1', '', 'confirmed', '2', '2017-04-01', 3),
(6, 'U3', '', 'confirmed', '6', '2017-04-01', 5),
(7, 'U1', '', 'confirmed', '5', '2017-04-01', 6),
(16, 'U9', '', 'confirmed', '3', '2017-04-01', 16),
(19, 'U4', '', 'confirmed', '3', '2017-04-01', 19),
(20, 'U9', '', 'confirmed', '4', '2017-04-01', 20),
(22, 'U1', '', 'confirmed', '2', '2017-04-01', 22),
(24, 'U1', '', 'confirmed', '8', '2017-04-01', 24),
(26, 'U1', '', 'confirmed', '5', '2017-04-02', 26),
(27, 'U1', '', 'confirmed', '6', '2017-04-02', 27),
(40, 'U1', '', 'confirmed', '3', '2017-04-02', 36);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` varchar(5) NOT NULL,
  `nama_menu` varchar(64) NOT NULL,
  `harga` int(10) NOT NULL,
  `jenis` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
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
-- Table structure for table `nota_pembayaran`
--

CREATE TABLE `nota_pembayaran` (
  `id_nota` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nota_pembayaran`
--

INSERT INTO `nota_pembayaran` (`id_nota`, `tanggal`, `total`) VALUES
(28, '2017-04-02', 80000),
(35, '2017-04-02', 84000),
(36, '2017-04-02', 60000);

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
(1, 100000, '2017-03-17', 'confirmed', 0),
(3, 50000, '2017-04-01', 'confirmed', 0),
(5, 100000, '2017-04-01', 'confirmed', 0),
(6, 100000, '2017-04-01', 'confirmed', 0),
(16, 50000, '2017-04-01', 'confirmed', 0),
(19, 100000, '2017-04-01', 'confirmed', 0),
(20, 100000, '2017-04-01', 'confirmed', 0),
(22, 50000, '2017-04-01', 'confirmed', 20000),
(24, 100000, '2017-04-01', 'confirmed', 80000),
(26, 60000, '2017-04-02', 'confirmed', 50000),
(27, 100000, '2017-04-02', 'confirmed', 60000),
(28, 100000, '2017-04-02', 'confirmed', 80000),
(36, 100000, '2017-04-02', 'confirmed', 60000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

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
  MODIFY `id_pesanan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `nota_pembayaran`
--
ALTER TABLE `nota_pembayaran`
  MODIFY `id_nota` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
