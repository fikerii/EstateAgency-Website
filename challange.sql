-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 11:00 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `challange`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pw` varchar(30) NOT NULL,
  `role` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `pw`, `role`) VALUES
(1, 'fikri', 'fikri', 0),
(2, 'keri', 'keri', 1),
(3, 'iwan', 'iwan', 0),
(8, 'hapis', 'hapis', 0),
(9, 'zaki', '$2y$10$qyy5lL11/owxKT2prTSzEuA', 0),
(10, 'raden', 'f47346fbd867762eb9938c2eb43a1e', 1),
(11, 'iki', 'iki', 0),
(12, 'minda', 'minda', 0),
(13, 'ilkom', 'ilkom', 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_akun`
--

CREATE TABLE `data_akun` (
  `id_akun` int(11) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `images` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_akun`
--

INSERT INTO `data_akun` (`id_akun`, `nama_lengkap`, `email`, `phone`, `images`) VALUES
(1, 'Muhammad Fikri', 'fikri@mhs.id', '08080800808', 'IMG_1557.jpg'),
(2, 'keri', 'keri@mhs.id', '0800880800', 'DSCF6738.JPG'),
(3, '', '', '', ''),
(8, 'hapis', '', '', 'IMG_0496.JPG'),
(9, 'zaki', '', '', 'IMG_1248.JPG'),
(10, 'raden', '', '', 'DSCF6655.JPG'),
(12, 'minda', '', '', 'ghost.png'),
(13, 'ilkom', 'ilkom@mhs.com', '08080802138', 'IMG_2822.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_rumah`
--

CREATE TABLE `data_rumah` (
  `id_rumah` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `tipe` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `area` int(11) NOT NULL,
  `harga` double NOT NULL,
  `beds` int(11) NOT NULL,
  `baths` int(11) NOT NULL,
  `garages` int(11) NOT NULL,
  `image` varchar(300) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_rumah`
--

INSERT INTO `data_rumah` (`id_rumah`, `id_akun`, `tipe`, `alamat`, `area`, `harga`, `beds`, `baths`, `garages`, `image`, `status`) VALUES
(5, 1, 'Futuristik', 'Banjarmasin', 1000, 1500000, 6, 7, 1, 'futuristik2.jpg', 0),
(6, 1, 'Classic', 'Tanjung', 1000, 3000000, 5, 7, 2, 'classic1.jpg', 0),
(7, 1, 'Futuristik', 'Martapura', 700, 25000000, 4, 6, 1, 'Futuristik1.jpeg', 0),
(9, 1, 'Modern', 'Martapura', 300, 300000, 4, 5, 0, 'modern3.jpg', 1),
(11, 8, 'Classic', 'Martapura', 1100, 1000000, 6, 8, 1, 'classic3.jpg', 0),
(12, 11, 'Modern', 'Banjarbaru', 1000, 15000000, 4, 6, 2, 'modern4.jpg', 0),
(13, 1, 'Nature', 'Martapura', 700, 4000000, 5, 6, 1, 'nature2.jpg', 0),
(14, 1, 'Nature', 'Banjarbaru', 400, 9000000, 4, 5, 1, 'nature1.jpg', 0),
(15, 12, 'Classic', 'Landasan Ulin', 500, 4500000, 4, 4, 1, 'classic3.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `data_akun`
--
ALTER TABLE `data_akun`
  ADD KEY `id_akun` (`id_akun`);

--
-- Indexes for table `data_rumah`
--
ALTER TABLE `data_rumah`
  ADD PRIMARY KEY (`id_rumah`),
  ADD KEY `id_akun` (`id_akun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `data_rumah`
--
ALTER TABLE `data_rumah`
  MODIFY `id_rumah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_akun`
--
ALTER TABLE `data_akun`
  ADD CONSTRAINT `data_akun_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`);

--
-- Constraints for table `data_rumah`
--
ALTER TABLE `data_rumah`
  ADD CONSTRAINT `data_rumah_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
