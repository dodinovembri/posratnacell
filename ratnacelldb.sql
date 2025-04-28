-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2025 at 10:17 AM
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
-- Database: `ratnacelldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `base_price` decimal(10,0) DEFAULT NULL,
  `selling_price` decimal(10,0) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `code`, `name`, `base_price`, `selling_price`, `created_at`, `modified_at`, `modified_by`) VALUES
(1, 'AGB65', 'Anti Gores Bening 6.5', 2000, 15000, '2025-04-21 10:24:13', '2025-04-22 07:25:01', 'Fini Anggraini Safitri'),
(2, 'VOCIM32-5G', 'Voucher IM3 2.5 GB', 6500, 9000, '2025-04-22 07:27:33', '2025-04-22 07:28:18', 'Fini Anggraini Safitri');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(10) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `base_price` decimal(10,0) DEFAULT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `warehouse` varchar(50) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `product_id`, `product_code`, `qty`, `base_price`, `amount`, `date`, `warehouse`, `user`, `modified_date`, `modified_by`) VALUES
(1, 1, 'AGB65', 3, 3500, 10500, '2025-04-22 06:58:38', 'melati', 'Fini Anggraini Safitri', NULL, NULL),
(2, 1, 'AGB65', 2, 4000, 8000, '2025-04-22 07:00:55', 'melati', 'Fini Anggraini Safitri', NULL, NULL),
(3, 1, 'AGB65', 3, 4000, 12000, '2025-04-22 07:15:32', 'melati', 'Fini Anggraini Safitri', NULL, NULL),
(4, 1, 'AGB65', 1, 2000, 4000, '2025-04-22 07:18:09', 'melati', 'Fini Anggraini Safitri', NULL, NULL),
(5, 1, 'AGB65', 1, 4500, 4500, '2025-04-22 07:18:47', 'melati', 'Fini Anggraini Safitri', NULL, NULL),
(6, 1, 'AGB65', 1, 4600, 4600, '2025-04-22 07:19:37', 'melati', 'Fini Anggraini Safitri', NULL, NULL),
(7, 1, 'AGB65', 1, 4700, 4700, '2025-04-22 07:20:24', 'melati', 'Fini Anggraini Safitri', NULL, NULL),
(8, 1, 'AGB65', 1, 3000, 3000, '2025-04-22 07:24:01', 'melati', 'Fini Anggraini Safitri', NULL, NULL),
(9, 1, 'AGB65', 1, 2000, 2000, '2025-04-22 07:25:01', 'melati', 'Fini Anggraini Safitri', NULL, NULL),
(10, 2, 'VOCIM32-5G', 1, 6500, 6500, '2025-04-22 07:28:18', 'melati', 'Fini Anggraini Safitri', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(10) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `base_price` decimal(10,0) DEFAULT NULL,
  `selling_price` decimal(10,0) DEFAULT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `discount` decimal(10,0) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `warehouse` varchar(50) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product_id`, `product_code`, `qty`, `base_price`, `selling_price`, `amount`, `discount`, `date`, `warehouse`, `user`, `modified_date`, `modified_by`) VALUES
(1, 1, 'AGB65', 1, 3500, 15000, 15000, 0, '2025-04-22 06:57:23', 'melati', 'Fini Anggraini Safitri', NULL, NULL),
(2, 1, 'AGB65', 1, 3500, 15000, 15000, 0, '2025-04-22 06:57:58', 'melati', 'Fini Anggraini Safitri', NULL, NULL),
(3, 1, 'AGB65', 1, 2000, 15000, 15000, 0, '2025-04-22 07:26:19', 'melati', 'Fini Anggraini Safitri', NULL, NULL),
(4, 2, 'VOCIM32-5G', 1, 7000, 9000, 9000, 0, '2025-04-22 07:27:45', 'melati', 'Fini Anggraini Safitri', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `warehouse` varchar(50) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `qty_alert` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `product_id`, `warehouse`, `qty`, `qty_alert`, `modified_at`, `modified_by`) VALUES
(1, 1, 'melati', 16, 3, '2025-04-22 07:26:19', 'Fini Anggraini Safitri'),
(2, 1, 'srengseng', 4, 3, NULL, NULL),
(3, 2, 'melati', 3, 3, '2025-04-22 07:28:18', 'Fini Anggraini Safitri');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(50) NOT NULL,
  `warehouse` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `warehouse`) VALUES
(1, 'Dodi Novembri', 'dodinovembri32@gmail.com', '$2y$10$SlOlGdexV4KUHr.NRNuvLuRw9YEEmeWc8hY81kDRKkFiRdtx8zPHC', 'owner', NULL),
(2, 'Tri Ratna Sari', 'ratna@gmail.com', '$2y$10$dqKooc3QrXxQYy9.MOaojOeTI3LOdYMHdnhCh3bnHvtRK37axUkx.', 'owner', NULL),
(3, 'Fini Anggraini Safitri', 'fini@gmail.com', '$2y$10$4whCseaCgAlbGmRid1RR7.ZNAR8dUFQF.1JoBEZc8KR0fs0/amRO2', 'staff', 'melati'),
(4, 'Sari Novita', 'sari@gmail.com', '$2y$10$Pz4bdWIQDjMSepDipN1j3uEIPdmZTzKhoSVwziOcQ13Ses8OCfNUC', 'staff', 'srengseng');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
