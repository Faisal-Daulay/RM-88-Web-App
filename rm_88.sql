-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 02, 2020 at 07:18 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coba_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_kar` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `notel` varchar(30) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_kar`, `nama`, `alamat`, `notel`, `foto`) VALUES
(1, 'Dendi', 'Binjai', '0812746574831', 'IMG-20191204-WA0043.jpg'),
(2, 'Cici', 'Binjai', '08527637483742', 'IMG_20200119_213554.jpg'),
(3, 'Yudha', 'Binjai', '081238475842', '');

-- --------------------------------------------------------

--
-- Table structure for table `ratingkami`
--

CREATE TABLE `ratingkami` (
  `id_rating` int(6) NOT NULL,
  `id_kar` int(6) NOT NULL,
  `tgl` text NOT NULL,
  `kebersihan` int(2) NOT NULL,
  `kerapian` int(2) NOT NULL,
  `pelayanan` int(2) NOT NULL,
  `keramahan` int(2) NOT NULL,
  `nama_customer` varchar(30) NOT NULL,
  `no_struk` float NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratingkami`
--

INSERT INTO `ratingkami` (`id_rating`, `id_kar`, `tgl`, `kebersihan`, `kerapian`, `pelayanan`, `keramahan`, `nama_customer`, `no_struk`, `komentar`) VALUES
(1, 2, '2020-01', 4, 5, 5, 4, 'Rizal', 83748, 'asdasdasd'),
(2, 1, '2020-01', 3, 4, 5, 3, 'Rizal', 291783, 'czxczxczxc'),
(3, 2, '2020-01', 4, 4, 5, 5, 'Rizal', 291783, 'fsdffgfhfg'),
(4, 2, '2020-01', 5, 4, 5, 3, 'Rahma', 72681, 'sfgfhghjhjkhkhj'),
(5, 1, '2020-02', 1, 4, 5, 5, 'Vira', 9278370, 'oke cukup baik'),
(6, 1, '2020-02', 1, 3, 3, 2, 'Ratih', 82683, 'ok'),
(7, 1, '2020-02', 4, 2, 4, 5, 'Ratih', 82683, 'un'),
(8, 3, '2020-02', 2, 2, 4, 4, 'Ratih', 82683, 'oke guys');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(6) NOT NULL,
  `id_kar` int(6) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_kar`, `username`, `password`, `role`) VALUES
(1, 0, 'Santi', 'santi', 'admin'),
(2, 1, '', '', 'barista'),
(3, 2, '', '', 'kasir'),
(4, 3, '', '', 'barista');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_kar`);

--
-- Indexes for table `ratingkami`
--
ALTER TABLE `ratingkami`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_kar` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ratingkami`
--
ALTER TABLE `ratingkami`
  MODIFY `id_rating` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
