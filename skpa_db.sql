-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2022 at 03:23 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skpa_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tb`
--

CREATE TABLE `admin_tb` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tb`
--

INSERT INTO `admin_tb` (`username`, `password`) VALUES
('admin', '1234admin');

-- --------------------------------------------------------

--
-- Table structure for table `formulir_tb`
--

CREATE TABLE `formulir_tb` (
  `namaPelapor` varchar(20) NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `alamatPelapor` varchar(100) NOT NULL,
  `statusPelapor` varchar(20) NOT NULL,
  `waktuKejadian` varchar(50) NOT NULL,
  `namaTerlapor` varchar(20) NOT NULL,
  `kronologi` varchar(200) NOT NULL,
  `statusAduan` varchar(20) NOT NULL DEFAULT 'masuk',
  `tanggalPengaduan` varchar(30) NOT NULL,
  `id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `formulir_tb`
--

INSERT INTO `formulir_tb` (`namaPelapor`, `kontak`, `alamatPelapor`, `statusPelapor`, `waktuKejadian`, `namaTerlapor`, `kronologi`, `statusAduan`, `tanggalPengaduan`, `id`) VALUES
('Bunga', '0832473872', 'Jakarta', 'Tetangga', '17:30 WIB, di rumah korban', 'SSS', 'Ya ndak tahu', 'selesai', '03-06-22 09:19:03 PM', 19),
('Bunga', '0832473872', '324', 'Kerabat', 'Di pasar', 'GG', 'AAA', 'selesai', '04-06-22 05:50:27 AM', 20),
('asd', 'asd', 'asd', 'asd', 'sad', 'asd', 'asd', 'ditolak', '04-06-22 07:24:00 AM', 22),
('Dino', '08234235', 'Pangandaran', 'Sodara', 'Di sungai', 'WQ', 'WQ menendang Dino ', 'diproses', '04-06-22 11:09:30 AM', 23),
('Cindy', '0838435', 'Konoha', 'Saingan', 'Warung', 'RR', 'Kunai', 'masuk', '05-06-22 12:48:16 PM', 26),
('Anya', '0983432', 'Berlint', 'Teman', 'Sekolah', 'Damian', 'Pemukulan', 'masuk', '05-06-22 12:49:42 PM', 27),
('Becky', '0976324', 'Eden', 'Kenalan', 'Pagi di jalan', 'Desmond', 'Penjambretan', 'ditolak', '05-06-22 12:50:26 PM', 28),
('dfgdfg', 'fdgfdg', 'fdg', 'fdgfd', 'dfg', 'dfgfd', 'gfd', 'masuk', '05-06-22 06:39:35 PM', 29);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `formulir_tb`
--
ALTER TABLE `formulir_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `formulir_tb`
--
ALTER TABLE `formulir_tb`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
