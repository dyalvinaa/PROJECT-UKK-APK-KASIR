-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2024 at 02:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kasir`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_lihat_laporan` ()   BEGIN
SELECT tbl_penjualan.id_penjualan, tbl_penjualan.no_faktur, tbl_penjualan.tgl_penjualan, tbl_penjualan.total
FROM tbl_penjualan
ORDER BY tbl_penjualan.tgl_penjualan DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_lihat_produk` ()   SELECT tbl_produk.id_produk, tbl_produk.kode_produk, tbl_produk.nama_produk, tbl_produk.harga_beli, tbl_produk.harga_jual, tbl_satuan.nama_satuan, tbl_kategori.nama_kategori, tbl_produk.stok
FROM tbl_produk
JOIN tbl_satuan ON tbl_satuan.id_satuan=tbl_produk.id_satuan
JOIN tbl_kategori ON tbl_kategori.id_kategori=tbl_produk.id_kategori
WHERE tbl_produk.stok > 0$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tampil_kategori` ()   BEGIN
SELECT tbl_kategori.nama_kategori
FROM tbl_kategori 
ORDER BY tbl_kategori.id_kategori DESC;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_penjualan`
--

CREATE TABLE `tbl_detail_penjualan` (
  `id_detail` int(10) NOT NULL,
  `id_penjualan` int(25) NOT NULL,
  `id_produk` int(25) NOT NULL,
  `qty` int(5) NOT NULL,
  `total_harga` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_detail_penjualan`
--

INSERT INTO `tbl_detail_penjualan` (`id_detail`, `id_penjualan`, `id_produk`, `qty`, `total_harga`) VALUES
(1, 28, 28, 3, 9000),
(2, 28, 28, 2, 6000),
(3, 29, 28, 1, 3000),
(4, 30, 28, 2, 6000),
(5, 31, 28, 1, 3000),
(6, 32, 29, 1, 3000),
(7, 33, 28, 1, 3000),
(8, 33, 29, 2, 6000),
(9, 34, 28, 2, 6000),
(10, 35, 28, 2, 6000),
(11, 36, 28, 3, 9000),
(13, 37, 28, 2, 6000),
(14, 37, 28, 1, 3000),
(15, 37, 28, 1, 3000),
(18, 39, 31, 50, 900000),
(19, 40, 28, 1, 3000),
(20, 40, 28, 2, 6000),
(21, 41, 28, 2, 6000);

--
-- Triggers `tbl_detail_penjualan`
--
DELIMITER $$
CREATE TRIGGER `kurangiStok` AFTER INSERT ON `tbl_detail_penjualan` FOR EACH ROW UPDATE tbl_produk SET tbl_produk.stok = tbl_produk.stok - NEW.qty
WHERE tbl_produk.id_produk = NEW.id_produk
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `nambahTotalHarga` AFTER INSERT ON `tbl_detail_penjualan` FOR EACH ROW UPDATE tbl_penjualan SET tbl_penjualan.total = tbl_penjualan.total + NEW.total_harga
WHERE tbl_penjualan.id_penjualan= NEW.id_penjualan
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(10) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Minuman'),
(4, 'Makanan'),
(8, 'Deterjen'),
(13, 'Alat tulis kantor');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `id_penjualan` int(10) NOT NULL,
  `no_faktur` varchar(25) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `total` int(11) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`id_penjualan`, `no_faktur`, `tgl_penjualan`, `total`, `id_user`) VALUES
(38, 'SCDPS2403010001', '2024-03-01', 9000, 8),
(39, 'SCDPS2403020002', '2024-03-02', 900000, 8),
(40, 'SCDPS2403020003', '2024-03-02', 9000, 8),
(41, 'SCDPS2403020004', '2024-03-02', 6000, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(10) NOT NULL,
  `kode_produk` varchar(25) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_beli` int(30) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `id_satuan` int(10) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `stok` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `kode_produk`, `nama_produk`, `harga_beli`, `harga_jual`, `id_satuan`, `id_kategori`, `stok`) VALUES
(28, 'PRD006', 'Indomie', 3000, 3000, 7, 2, 83),
(29, 'PRD007', 'Aqua Gelas', 2000, 3000, 10, 2, 46),
(31, 'PRD008', 'Rinso', 15000, 18000, 16, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satuan`
--

CREATE TABLE `tbl_satuan` (
  `id_satuan` int(10) NOT NULL,
  `nama_satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_satuan`
--

INSERT INTO `tbl_satuan` (`id_satuan`, `nama_satuan`) VALUES
(7, 'Unit'),
(9, 'Liter'),
(10, 'Boks'),
(12, 'Sachet'),
(14, 'Berat (Kg)'),
(15, 'Dus'),
(16, 'Satuan/Kemasan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(10) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(8) NOT NULL,
  `level` enum('admin','kasir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
(7, 'Alvina', 'alvina', '123', 'admin'),
(8, 'Tesyala', 'tesya', '1234', 'kasir'),
(11, 'sindyistritaehyung', 'sindy', '555', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_detail_penjualan`
--
ALTER TABLE `tbl_detail_penjualan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_penjualan` (`id_penjualan`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_satuan` (`id_satuan`);

--
-- Indexes for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_detail_penjualan`
--
ALTER TABLE `tbl_detail_penjualan`
  MODIFY `id_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  MODIFY `id_penjualan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  MODIFY `id_satuan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD CONSTRAINT `tbl_produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_produk_ibfk_2` FOREIGN KEY (`id_satuan`) REFERENCES `tbl_satuan` (`id_satuan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
