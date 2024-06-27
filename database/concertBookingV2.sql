-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2024 at 04:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemesanan_tiket`
--

-- --------------------------------------------------------

--
-- Table structure for table `acara`
--

CREATE TABLE `acara` (
  `id_acara` int(11) NOT NULL,
  `gambar` varchar(30) NOT NULL,
  `nama_acara` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acara`
--

INSERT INTO `acara` (`id_acara`, `gambar`, `nama_acara`, `tanggal`, `lokasi`, `deskripsi`) VALUES
(1, 'a7x.png', 'Avenged Sevenfold Tour 2024', '2024-12-14', 'Stadion Madya Gelora Bung Karno, Jakarta', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ullamcorper.'),
(2, 'bk.png', 'High Octane Metal Engine (H.O.M.E).', '2024-08-20', 'JIExpo Kemayoran, Jakarta', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ullamcorper.'),
(3, 'bmth.png', 'BMTH Tour de Asia 2024', '2024-09-13', 'Jakarta International Stadium, Jakarta', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ullamcorper.'),
(4, 'mcr.png', 'MCR Go To Indonesia', '2024-10-18', 'ICE BSD, Jakarta', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ullamcorper.'),
(5, 'seringai.png', 'Seringai Java Tour 2024', '2024-11-06', 'Lapangan Kenari, Yogyakarta', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ullamcorper.');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$C.I8QcGEAzO1Yqh/DASVYeJvTFxR90OSir7iIfdLNCPQREeImzySe'),
(2, 'daka', 'gus@gmail.com', '$2y$10$rkQk4/Gm5cyiIUd9.ufRn.TSfxtiQCfVrcZ8tVdb1BZVJjgyFGktW'),
(3, 'agus', 'agus@gmail.com', '$2y$10$SHz8Z2OP5A47xwQo.fVNBupwV7GNFUvBETXYtneIGWSSHlZDTl3OO'),
(4, 'agus1', 'agus1@gmail.com', '$2y$10$oOlB/naR3C5K/rGe8Jyw0ueMXjtuQ5mu9TQOb.KBV3Ucu9t.aMSdi');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL,
  `id_acara` int(11) DEFAULT NULL,
  `kelas` varchar(50) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `id_acara`, `kelas`, `harga`) VALUES
(1, 1, 'VIP', 200000.00),
(2, 1, 'Gold', 150000.00),
(3, 1, 'Silver', 100000.00),
(4, 1, 'Bronze', 75000.00),
(5, 1, 'Regular', 50000.00),
(6, 2, 'VIP', 220000.00),
(7, 2, 'Gold', 170000.00),
(8, 2, 'Silver', 120000.00),
(9, 2, 'Bronze', 85000.00),
(10, 2, 'Regular', 55000.00),
(11, 3, 'VIP', 250000.00),
(12, 3, 'Gold', 200000.00),
(13, 3, 'Silver', 150000.00),
(14, 3, 'Bronze', 100000.00),
(15, 3, 'Regular', 60000.00),
(16, 4, 'VIP', 230000.00),
(17, 4, 'Gold', 180000.00),
(18, 4, 'Silver', 130000.00),
(19, 4, 'Bronze', 90000.00),
(20, 4, 'Regular', 65000.00),
(21, 5, 'VIP', 210000.00),
(22, 5, 'Gold', 160000.00),
(23, 5, 'Silver', 110000.00),
(24, 5, 'Bronze', 80000.00),
(25, 5, 'Regular', 60000.00);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_acara` int(11) NOT NULL,
  `id_tiket` int(11) NOT NULL,
  `metode_pembayaran` varchar(50) NOT NULL,
  `jumlah_tiket` int(11) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `total_harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pengguna`, `id_acara`, `id_tiket`, `metode_pembayaran`, `jumlah_tiket`, `tanggal_pembayaran`, `total_harga`) VALUES
(5, 4, 1, 1, 'kartu_kredit', 3, '2024-06-27', 600000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`id_acara`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `id_acara` (`id_acara`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_acara` (`id_acara`),
  ADD KEY `id_tiket` (`id_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acara`
--
ALTER TABLE `acara`
  MODIFY `id_acara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`id_acara`) REFERENCES `acara` (`id_acara`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_acara`) REFERENCES `acara` (`id_acara`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_tiket`) REFERENCES `tiket` (`id_tiket`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
