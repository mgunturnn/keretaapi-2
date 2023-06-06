-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 03:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kereta`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(25) NOT NULL,
  `asal_rute` varchar(25) NOT NULL,
  `tujuan_rute` varchar(25) NOT NULL,
  `kelas` varchar(25) NOT NULL,
  `harga` int(25) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `asal_rute`, `tujuan_rute`, `kelas`, `harga`, `tanggal`, `waktu`) VALUES
(1, 'Merak', 'Bandung', 'Ekonomi', 25000, '2023-06-10', '20:00:00.000000'),
(2, 'Merak', 'Pasar Senen', 'Ekonomi', 50000, '2023-06-10', '20:30:00.000000'),
(3, 'Merak', 'Solo Balapan', 'Ekonomi', 75000, '2023-06-10', '21:00:00.000000'),
(4, 'Merak', 'Yogyakarta', 'Ekonomi', 100000, '2023-06-10', '21:30:00.000000'),
(5, 'Merak', 'Surabaya', 'Ekonomi', 150000, '2023-06-10', '22:00:00.000000'),
(6, 'Surabaya', 'Yogyakarta', 'Ekonomi', 25000, '2023-06-11', '07:00:00.000000'),
(7, 'Surabaya', 'Solo Balapan', 'Ekonomi', 50000, '2023-06-11', '07:30:00.000000'),
(8, 'Surabaya', 'Pasar Senen', 'Ekonomi', 75000, '2023-06-11', '08:00:00.000000'),
(9, 'Surabaya', 'Bandung', 'Ekonomi', 100000, '2023-06-11', '08:00:00.000000'),
(10, 'Surabaya', 'Merak', 'Ekonomi', 150000, '2023-06-11', '08:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `kategori_penumpang` varchar(20) NOT NULL,
  `tgl_order` date NOT NULL,
  `jml_penumpang` int(50) NOT NULL,
  `id_user` int(25) NOT NULL,
  `id_jadwal` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id` int(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` int(15) NOT NULL,
  `kategori_penumpang` varchar(25) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `durasi` int(25) NOT NULL,
  `jml_penumpang` int(50) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_jadwal` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(25) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `status_transaksi` varchar(50) NOT NULL,
  `bukti_transaksi` varchar(25) NOT NULL,
  `id_order` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`) VALUES
(6, 'guntur', 'guntur@upi.edu', '30d8692c0d2ac50d082f20cfc4648206'),
(8, 'Aldi', 'aldi@upi.edu', 'c4fdebe929cdf83a1b4ddce0942b935d'),
(10, 'amin', 'amin@upi.edu', 'b25bd893d48f22c82f5e8e3f08ee1b42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id_user`,`id_jadwal`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_order` (`id_order`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id`);

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `tiket_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
