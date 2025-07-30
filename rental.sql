-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2025 at 03:57 PM
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
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID_cus` int(11) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Alamat` text NOT NULL,
  `No_Telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID_cus`, `Nama`, `Alamat`, `No_Telp`) VALUES
(1, 'Andi Pratama', 'Jl. Merdeka No.1', '081234567890'),
(2, 'Budi Santoso', 'Jl. Sudirman No.2', '082345678901'),
(3, 'Citra Dewi', 'Jl. Thamrin No.3', '083456789012'),
(4, 'Dewi Lestari', 'Jl. Gatot Subroto No.4', '084567890123'),
(5, 'Eka Putra', 'Jl. Ahmad Yani No.5', '085678901234'),
(6, 'Fajar Hidayat', 'Jl. Imam Bonjol No.6', '086789012345'),
(7, 'Gita Sari', 'Jl. Diponegoro No.7', '087890123456'),
(8, 'Hendra Kusuma', 'Jl. Hasanuddin No.8', '088901234567'),
(9, 'Indah Ayu', 'Jl. RA Kartini No.9', '089012345678'),
(10, 'Joko Widodo', 'Jl. Pattimura No.10', '081012345679'),
(11, 'Kartika Sari', 'Jl. Wahid Hasyim No.11', '082123456789'),
(12, 'Lukman Hakim', 'Jl. Sisingamangaraja No.12', '083234567890');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `No_Plat` varchar(20) NOT NULL,
  `Jenis` varchar(50) NOT NULL,
  `Merk` varchar(50) NOT NULL,
  `Harga_Per_Hari` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`No_Plat`, `Jenis`, `Merk`, `Harga_Per_Hari`) VALUES
('B0123BCD', 'Mobil', 'Ford', 600000.00),
('B1234ABC', 'Mobil', 'Toyota', 500000.00),
('B1234CDE', 'Mobil', 'Chevrolet', 530000.00),
('B2345DEF', 'Mobil', 'Honda', 450000.00),
('B2345EFG', 'Motor', 'BMW', 200000.00),
('B3456GHI', 'Mobil', 'Suzuki', 400000.00),
('B4567JKL', 'Motor', 'Yamaha', 150000.00),
('B5678MNO', 'Motor', 'Honda', 140000.00),
('B6789PQR', 'Mobil', 'Mitsubishi', 550000.00),
('B7890STU', 'Mobil', 'Nissan', 480000.00),
('B8901VWX', 'Motor', 'Kawasaki', 160000.00),
('B9012YZA', 'Motor', 'Vespa', 170000.00);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `ID_pembayaran` int(11) NOT NULL,
  `ID_pinjam` int(11) DEFAULT NULL,
  `STATUS` enum('lunas','pending') DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`ID_pembayaran`, `ID_pinjam`, `STATUS`, `total`) VALUES
(13, 13, 'lunas', NULL),
(14, 14, 'pending', NULL),
(15, 15, 'pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penyewaan`
--

CREATE TABLE `penyewaan` (
  `ID_pinjam` int(11) NOT NULL,
  `ID_cus` int(11) NOT NULL,
  `No_Plat` varchar(20) NOT NULL,
  `Tanggal_Pinjam` date NOT NULL,
  `Tanggal_Kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penyewaan`
--

INSERT INTO `penyewaan` (`ID_pinjam`, `ID_cus`, `No_Plat`, `Tanggal_Pinjam`, `Tanggal_Kembali`) VALUES
(13, 5, 'B1234CDE', '2025-01-25', '2025-01-27'),
(14, 7, 'B0123BCD', '2025-01-25', '2025-01-24'),
(15, 8, 'B0123BCD', '2025-01-21', '2025-01-31');

--
-- Triggers `penyewaan`
--
DELIMITER $$
CREATE TRIGGER `after_insert_penyewaan` AFTER INSERT ON `penyewaan` FOR EACH ROW BEGIN
  INSERT INTO pembayaran (id_pinjam, STATUS, total)
  VALUES (new.id_pinjam, 'pending', null);
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID_cus`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`No_Plat`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`ID_pembayaran`),
  ADD KEY `pembayaran_ibfk_1` (`ID_pinjam`);

--
-- Indexes for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`ID_pinjam`),
  ADD KEY `ID_cus` (`ID_cus`),
  ADD KEY `No_Plat` (`No_Plat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID_cus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `ID_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `penyewaan`
--
ALTER TABLE `penyewaan`
  MODIFY `ID_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`ID_pinjam`) REFERENCES `penyewaan` (`ID_pinjam`) ON UPDATE CASCADE;

--
-- Constraints for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD CONSTRAINT `penyewaan_ibfk_1` FOREIGN KEY (`ID_cus`) REFERENCES `customer` (`ID_cus`) ON DELETE CASCADE,
  ADD CONSTRAINT `penyewaan_ibfk_2` FOREIGN KEY (`No_Plat`) REFERENCES `mobil` (`No_Plat`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
