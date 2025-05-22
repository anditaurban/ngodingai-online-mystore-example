-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 22, 2025 at 09:11 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int NOT NULL,
  `invoice_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `whatsapp` varchar(13) NOT NULL,
  `total` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_id`, `customer_name`, `whatsapp`, `total`, `created_at`, `updated_at`) VALUES
(1, 'INV-20250522-8513', 'Andita', '0895339977843', 129, '2025-05-22 08:21:06', '2025-05-22 08:21:06'),
(2, 'INV-20250522-8793', 'Andita', '0895339977843', 1166, '2025-05-22 08:23:24', '2025-05-22 08:23:24'),
(3, 'INV-20250522-8899', 'Andita', '0895339977843', 278, '2025-05-22 08:24:31', '2025-05-22 08:24:31'),
(4, 'INV-20250522-8173', 'Andita', '085339977843', 129, '2025-05-22 08:53:01', '2025-05-22 08:53:01'),
(5, 'INV-20250522-6248', 'Andita', '085339977843', 1166, '2025-05-22 08:59:16', '2025-05-22 08:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE `invoice_items` (
  `id` int NOT NULL,
  `invoice_id` varchar(50) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL,
  `subtotal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `invoice_items`
--

INSERT INTO `invoice_items` (`id`, `invoice_id`, `product_name`, `quantity`, `price`, `subtotal`) VALUES
(1, 'INV-20250522-8513', 'Stylish Jacket', 1, 129, 129),
(2, 'INV-20250522-8793', 'Smartphone X100', 1, 799, 799),
(3, 'INV-20250522-8793', 'Stylish Jacket', 1, 129, 129),
(4, 'INV-20250522-8793', 'Modern Lamp', 1, 89, 89),
(5, 'INV-20250522-8793', 'Running Shoes', 1, 149, 149),
(6, 'INV-20250522-8899', 'Running Shoes', 1, 149, 149),
(7, 'INV-20250522-8899', 'Stylish Jacket', 1, 129, 129),
(8, 'INV-20250522-6248', 'Stylish Jacket', 1, 129, 129),
(9, 'INV-20250522-6248', 'Modern Lamp', 1, 89, 89),
(10, 'INV-20250522-6248', 'Smartphone X100', 1, 799, 799),
(11, 'INV-20250522-6248', 'Running Shoes', 1, 149, 149);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
