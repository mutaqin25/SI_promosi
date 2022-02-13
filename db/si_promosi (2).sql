-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2022 at 01:26 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_promosi`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

CREATE TABLE `bobot` (
  `id_bobot` int(15) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `nilai` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`id_bobot`, `nama`, `nilai`) VALUES
(1, 'K1', 5),
(2, 'K2', 2),
(3, 'K3', 3),
(4, 'K4', 4),
(5, 'K5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_promosi`
--

CREATE TABLE `kriteria_promosi` (
  `id` int(15) NOT NULL,
  `id_produk` int(15) NOT NULL,
  `kd_promosi` int(15) NOT NULL,
  `A1` float NOT NULL,
  `A2` float NOT NULL,
  `A3` float NOT NULL,
  `A4` float NOT NULL,
  `A5` float NOT NULL,
  `max` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria_promosi`
--

INSERT INTO `kriteria_promosi` (`id`, `id_produk`, `kd_promosi`, `A1`, `A2`, `A3`, `A4`, `A5`, `max`) VALUES
(1, 1, 1, 0.756, 0.767, 0.527, 0.444, 0, 0.767);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` int(13) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_pengguna`, `nama`, `no_hp`, `email`) VALUES
(1, 3, 'budi', 812153453, 'example@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_user` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `jenis_user`, `username`, `email`, `password`) VALUES
(1, 'Sugeng', 'admin', 'Sugeng', 'sugeng@gmail.com', 'sugeng123'),
(2, 'Dewi', 'general manager', 'Dewi', 'dewi@gmail.com', 'dewi123'),
(3, 'Annas', 'marketing', 'Annas', 'annas@gmail.com', 'annas123');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(15) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(15) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_pengguna`, `nama_produk`, `harga_produk`, `foto`) VALUES
(1, 3, 'Andora', 300000000, '1009097522_rumah-cluster-andora-citraraya.jpg'),
(2, 3, 'Fountain', 50000000, '718781935_Citra-Raya-Cluster-Fountain.jpg'),
(3, 2, 'West Portofino', 60000000, '1630524933_west portofino.jpg'),
(4, 3, 'Vaenza', 1000000000, '965419361_Citra-Raya-Cluster-Faaenza.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `promosi`
--

CREATE TABLE `promosi` (
  `id_promosi` int(11) NOT NULL,
  `periklanan` int(20) NOT NULL,
  `penjualanpersonal` int(20) NOT NULL,
  `promosipenjualan` int(20) NOT NULL,
  `publisitas` int(20) NOT NULL,
  `pemasaranlangsung` int(20) NOT NULL,
  `id_pengguna` int(30) NOT NULL,
  `id_produk` int(15) NOT NULL,
  `kd_promosi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promosi`
--

INSERT INTO `promosi` (`id_promosi`, `periklanan`, `penjualanpersonal`, `promosipenjualan`, `publisitas`, `pemasaranlangsung`, `id_pengguna`, `id_produk`, `kd_promosi`) VALUES
(1, 5, 4, 4, 4, 3, 3, 1, 1),
(2, 5, 3, 5, 4, 4, 3, 1, 2),
(3, 5, 3, 4, 3, 3, 3, 1, 3),
(4, 4, 2, 3, 3, 4, 3, 1, 4),
(5, 3, 2, 3, 3, 1, 3, 1, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indexes for table `kriteria_promosi`
--
ALTER TABLE `kriteria_promosi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_promosi` (`id_produk`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `promosi`
--
ALTER TABLE `promosi`
  ADD PRIMARY KEY (`id_promosi`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
