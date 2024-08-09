-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2024 at 07:52 AM
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
-- Database: `db_bd2_tokobuku`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(5) UNSIGNED NOT NULL,
  `id_rak` int(5) UNSIGNED DEFAULT NULL,
  `kode_buku` char(3) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `penulis` varchar(30) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `harga` int(10) NOT NULL,
  `sinopsis` varchar(255) DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `stok` int(7) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_rak`, `kode_buku`, `judul`, `penulis`, `penerbit`, `harga`, `sinopsis`, `foto`, `stok`) VALUES
(5, 4, '002', 'Algoritma & Pemrograman', 'Rinaldi Munir', 'Penerbit Informatika', 100000, 'Informatika bersatu', '002.jpg', 0),
(6, 4, '003', 'Database Relasional', 'Abdul Kadir', 'Penerbit Informatika', 100000, 'Lorem ipsum dolor sit amet', 'default.jpg', 19),
(7, 1, '001', 'One Piece Volume 1', 'Eiichiro Oda', 'Elex Media', 50000, 'Monkey D. Luffy', '001.jpg', 39),
(8, 2, '004', 'Fathul Qarib', 'Muhammad bin Qasim Al-Ghazi', 'Kudus', 70000, 'Lorem ipsum dolor sit amet', 'default.jpg', 16),
(9, 5, '005', 'Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka', 120000, 'Lorem ipsum dolor sit amet', 'default.jpg', 13),
(10, 7, '010', 'IPA', 'Ahmad', 'Erlangga', 80000, 'Buku IPA', '010.png', 17);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-07-13-135202', 'App\\Database\\Migrations\\CreateRakTable', 'default', 'App', 1720859861, 1),
(2, '2024-07-13-135353', 'App\\Database\\Migrations\\CreateBukuTable', 'default', 'App', 1720859861, 1),
(3, '2024-07-13-140420', 'App\\Database\\Migrations\\CreateTransaksiTable', 'default', 'App', 1720859861, 1),
(4, '2024-07-25-113305', 'App\\Database\\Migrations\\ChangeFotoColumnToNotNull', 'default', 'App', 1721883804, 2),
(6, '2024-07-25-113416', 'App\\Database\\Migrations\\CreateStokTrigger', 'default', 'App', 1721884282, 3),
(7, '2024-08-07-170114', 'App\\Database\\Migrations\\AlterTransaksiTable', 'default', 'App', 1723026389, 4),
(8, '2024-08-07-172347', 'App\\Database\\Migrations\\CreateTrxBukuTable', 'default', 'App', 1723026389, 4),
(9, '2024-08-08-212543', 'App\\Database\\Migrations\\DropStokTrigger', 'default', 'App', 1723127179, 5),
(11, '2024-08-09-103034', 'App\\Database\\Migrations\\AddMetodeBayarToTransaksiTable', 'default', 'App', 1723174562, 6);

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE `rak` (
  `id_rak` int(5) UNSIGNED NOT NULL,
  `kode_rak` char(3) NOT NULL,
  `nama_rak` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`id_rak`, `kode_rak`, `nama_rak`) VALUES
(1, 'KOM', 'Komik'),
(2, 'AGM', 'Agama'),
(4, 'INF', 'Informatika'),
(5, 'NOV', 'Novel'),
(6, 'SEJ', 'Sejarah'),
(7, 'SAI', 'IPA');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(5) UNSIGNED NOT NULL,
  `tanggal_transaksi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `metode_bayar` enum('Cash','QRIS','Debit','Kredit') DEFAULT 'Cash',
  `harga_total` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal_transaksi`, `metode_bayar`, `harga_total`) VALUES
(30, '2024-08-09 04:19:03', 'Cash', 260000),
(32, '2024-08-09 05:45:29', 'Cash', 370000);

-- --------------------------------------------------------

--
-- Table structure for table `trxbuku`
--

CREATE TABLE `trxbuku` (
  `id_trxbuku` int(5) UNSIGNED NOT NULL,
  `id_transaksi` int(5) UNSIGNED NOT NULL,
  `id_buku` int(5) UNSIGNED NOT NULL,
  `jumlah` int(7) NOT NULL,
  `subtotal` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trxbuku`
--

INSERT INTO `trxbuku` (`id_trxbuku`, `id_transaksi`, `id_buku`, `jumlah`, `subtotal`) VALUES
(8, 30, 7, 1, 50000),
(9, 30, 8, 3, 210000),
(12, 32, 6, 1, 100000),
(13, 32, 8, 1, 70000),
(14, 32, 10, 1, 80000),
(15, 32, 9, 1, 120000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `buku_id_rak_foreign` (`id_rak`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `trxbuku`
--
ALTER TABLE `trxbuku`
  ADD PRIMARY KEY (`id_trxbuku`),
  ADD KEY `trxbuku_id_transaksi_foreign` (`id_transaksi`),
  ADD KEY `trxbuku_id_buku_foreign` (`id_buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `id_rak` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `trxbuku`
--
ALTER TABLE `trxbuku`
  MODIFY `id_trxbuku` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_id_rak_foreign` FOREIGN KEY (`id_rak`) REFERENCES `rak` (`id_rak`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Constraints for table `trxbuku`
--
ALTER TABLE `trxbuku`
  ADD CONSTRAINT `trxbuku_id_buku_foreign` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trxbuku_id_transaksi_foreign` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
