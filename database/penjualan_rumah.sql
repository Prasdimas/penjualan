-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2024 at 08:57 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan_rumah`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama`, `email`, `telepon`, `alamat`) VALUES
(1, 'yanto', 'yanto@example.com', '085234567890', 'Jalan Baru No. 123'),
(2, 'doma', 'domA@example.com', '081234567890', 'Jalan Baru No. 123'),
(8, 'Alice Johnson', 'alice.johnson@example.com', '081234567900', 'Jalan CDE No. 2425'),
(9, 'Brian Davis', 'brian.davis@example.com', '081234567901', 'Jalan EFG No. 2627'),
(10, 'Karen Wilson', 'karen.wilson@example.com', '081234567902', 'Jalan HIJ No. 2829'),
(11, 'Daniel Taylor', 'daniel.taylor@example.com', '081234567903', 'Jalan KLM No. 3031'),
(12, 'Olivia Anderson', 'olivia.anderson@example.com', '081234567904', 'Jalan NOP No. 3233'),
(13, 'William Martinez', 'william.martinez@example.com', '081234567905', 'Jalan QRS No. 3435'),
(14, 'Megan Harris', 'megan.harris@example.com', '081234567906', 'Jalan TUV No. 3637'),
(15, 'Christopher King', 'christopher.king@example.com', '081234567907', 'Jalan WXY No. 3839'),
(16, 'Lauren Brown', 'lauren.brown@example.com', '081234567908', 'Jalan YZA No. 4041'),
(17, 'Kevin Wright', 'kevin.wright@example.com', '081234567909', 'Jalan BCD No. 4243');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_rumah`
--

CREATE TABLE `penjualan_rumah` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `id_rumah` int(11) DEFAULT NULL,
  `id_sales` int(11) DEFAULT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `jenis_pembayaran` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan_rumah`
--

INSERT INTO `penjualan_rumah` (`id`, `tanggal`, `id_rumah`, `id_sales`, `id_customer`, `harga`, `jenis_pembayaran`) VALUES
(1, '2024-03-12', 2, 4, 1, '5000.00', 'cash'),
(2, '2024-03-15', 2, 4, 2, '67890.00', 'Tunai'),
(3, '2024-03-16', 2, 4, 1, '67890.00', 'Tunai'),
(4, '2024-03-29', 8, 4, 1, '11.00', 'Kredit'),
(25, '2024-03-14', 13, 18, 17, '5000.00', 'cash'),
(66, '2023-01-01', 11, 11, 11, '99999999.99', 'Tunai'),
(67, '2023-01-02', 12, 12, 12, '99999999.99', 'Kredit'),
(68, '2023-01-03', 13, 13, 12, '99999999.99', 'Tunai'),
(69, '2023-01-04', 14, 14, 12, '99999999.99', 'Kredit'),
(70, '2023-01-05', 15, 15, 13, '99999999.99', 'Tunai'),
(71, '2023-01-06', 13, 16, 14, '99999999.99', 'Kredit'),
(72, '2023-01-07', 12, 17, 12, '99999999.99', 'Tunai'),
(73, '2023-01-08', 12, 18, 13, '99999999.99', 'Kredit'),
(74, '2023-01-09', 12, 19, 15, '99999999.99', 'Tunai'),
(75, '2023-01-10', 11, 12, 10, '99999999.99', 'Kredit');

-- --------------------------------------------------------

--
-- Table structure for table `rumah`
--

CREATE TABLE `rumah` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `harga` varchar(10) DEFAULT NULL,
  `luas_tanah` varchar(8) DEFAULT NULL,
  `luas_bangunan` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rumah`
--

INSERT INTO `rumah` (`id`, `nama`, `alamat`, `harga`, `luas_tanah`, `luas_bangunan`) VALUES
(2, 'housakle', 'jln.com', '67890', '123', '100'),
(8, 'ase', 'asas', '11', '1', '2'),
(9, 'Rumah Indah', 'Jalan Raya No. 123', '500000000', '250', '150'),
(10, 'Rumah Asri', 'Jalan Melati No. 45', '600000000', '300', '180'),
(11, 'Rumah Sejati', 'Jalan Kencana No. 67', '750000000', '350', '200'),
(12, 'Rumah Bahagia', 'Jalan Ceria No. 89', '900000000', '400', '220'),
(13, 'Rumah Damai', 'Jalan Damai No. 1011', '1200000000', '500', '250'),
(14, 'Rumah Harmoni', 'Jalan Harmoni No. 1213', '1500000000', '600', '280'),
(15, 'Rumah Sederhana', 'Jalan Sederhana No. 1415', '800000000', '400', '200'),
(16, 'Rumah Sentosa', 'Jalan Sentosa No. 1617', '1000000000', '450', '230'),
(17, 'Rumah Sejahtera', 'Jalan Sejahtera No. 1819', '1100000000', '480', '240'),
(18, 'Rumah Syahdu', 'Jalan Syahdu No. 2021', '950000000', '420', '210');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `nama`, `email`, `telepon`, `alamat`) VALUES
(4, 'dom', 'dom@example.com', '081234567890', 'Jalan Baru No. 123'),
(8, 'doma', 'domA@example.com', '081234567890', 'Jalan Baru No. 123'),
(10, 'John Doe', 'john.doe@example.com', '081234567890', 'Jalan ABC No. 123'),
(11, 'Jane Smith', 'jane.smith@example.com', '081234567891', 'Jalan XYZ No. 456'),
(12, 'Michael Johnson', 'michael.johnson@example.com', '081234567892', 'Jalan DEF No. 789'),
(13, 'Emily Brown', 'emily.brown@example.com', '081234567893', 'Jalan GHI No. 1011'),
(14, 'Robert Wilson', 'robert.wilson@example.com', '081234567894', 'Jalan MNO No. 1213'),
(15, 'Sarah Martinez', 'sarah.martinez@example.com', '081234567895', 'Jalan PQR No. 1415'),
(16, 'David Thompson', 'david.thompson@example.com', '081234567896', 'Jalan STU No. 1617'),
(17, 'Jessica Garcia', 'jessica.garcia@example.com', '081234567897', 'Jalan VWX No. 1819'),
(18, 'James Robinson', 'james.robinson@example.com', '081234567898', 'Jalan YZA No. 2021'),
(19, 'Amanda Lee', 'amanda.lee@example.com', '081234567899', 'Jalan BCD No. 2223');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan_rumah`
--
ALTER TABLE `penjualan_rumah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rumah` (`id_rumah`),
  ADD KEY `id_sales` (`id_sales`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `rumah`
--
ALTER TABLE `rumah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `penjualan_rumah`
--
ALTER TABLE `penjualan_rumah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `rumah`
--
ALTER TABLE `rumah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penjualan_rumah`
--
ALTER TABLE `penjualan_rumah`
  ADD CONSTRAINT `penjualan_rumah_ibfk_1` FOREIGN KEY (`id_rumah`) REFERENCES `rumah` (`id`),
  ADD CONSTRAINT `penjualan_rumah_ibfk_2` FOREIGN KEY (`id_sales`) REFERENCES `sales` (`id`),
  ADD CONSTRAINT `penjualan_rumah_ibfk_3` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
