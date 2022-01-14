-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2022 at 03:40 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sudutkopi`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun_user`
--

CREATE TABLE `akun_user` (
  `id` int(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL,
  `status` text NOT NULL,
  `kode` mediumint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun_user`
--

INSERT INTO `akun_user` (`id`, `nama`, `email`, `password`, `level`, `status`, `kode`) VALUES
(1, 'admin', 'default@default.com', '$2a$04$gwdf5rlB9wMc9Pbnk0/q2uoiEeXi/Ubu9RAmCaq53iiRF7FZ3.4ZK', 'admin', 'verified', 0),
(2, 'sample', 'sample@mail.com', '$2a$04$A0yvaQm4Lre1Hnf7RQsW7e01UgiJyv.fIW0WgupGcNnHYeFqjWo3e', 'kustomer', 'verified', 0);

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE `makanan` (
  `id_menu` int(30) NOT NULL,
  `nama_makanan` varchar(30) NOT NULL,
  `harga` int(30) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `images_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`id_menu`, `nama_makanan`, `harga`, `kategori`, `images_path`) VALUES
(1, 'Americano', 15000, 'kopi', 'foodIMG/americano.jpeg'),
(2, 'Cappucino', 15000, 'kopi', 'foodIMG/cappuccino.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(255) NOT NULL,
  `id_menu` int(30) NOT NULL,
  `nama_makanan` varchar(30) NOT NULL,
  `harga` int(30) NOT NULL,
  `jumlah` int(30) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `id_menu`, `nama_makanan`, `harga`, `jumlah`, `email`) VALUES
(1, 1, 'Americano', 15000, 1, 'sample@mail.com'),
(2, 2, 'Cappucino', 15000, 1, 'sample@mail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_user`
--
ALTER TABLE `akun_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `nama_makanan` (`nama_makanan`),
  ADD KEY `nama_makanan_2` (`nama_makanan`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun_user`
--
ALTER TABLE `akun_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `makanan`
--
ALTER TABLE `makanan`
  MODIFY `id_menu` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
