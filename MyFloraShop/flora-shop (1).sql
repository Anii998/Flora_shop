-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2020 at 12:52 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flora-shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clothes`
--

CREATE TABLE `tbl_clothes` (
  `id_cloth` int(10) NOT NULL,
  `id_make` int(11) NOT NULL,
  `size` varchar(4) NOT NULL,
  `price` int(5) UNSIGNED NOT NULL,
  `number` int(3) UNSIGNED NOT NULL,
  `moreinfo` text NOT NULL,
  `picture` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_clothes`
--

INSERT INTO `tbl_clothes` (`id_cloth`, `id_make`, `size`, `price`, `number`, `moreinfo`, `picture`) VALUES
(1, 2, 'S', 20, 4, 'Описание...', 'Pic4.jpg'),
(2, 3, 'L', 50, 19, 'Описание...', 'Pic2.jpg'),
(8, 1, 'XS', 25, 12, 'Описание...', 'Pic8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_makes`
--

CREATE TABLE `tbl_makes` (
  `id_make` int(10) NOT NULL,
  `make` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_makes`
--

INSERT INTO `tbl_makes` (`id_make`, `make`) VALUES
(2, 'Пола'),
(3, 'Риза'),
(1, 'Сако');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id_order` int(10) NOT NULL,
  `id_make` int(10) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `address` varchar(15) NOT NULL,
  `count` int(10) NOT NULL,
  `phone` int(10) NOT NULL,
  `payment` varchar(30) NOT NULL,
  `delivery` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id_order`, `id_make`, `firstName`, `lastName`, `address`, `count`, `phone`, `payment`, `delivery`) VALUES
(6, 1, 'Велина', 'Спасова', 'гр.Дряново', 1, 877112345, 'bank', 'Speedy'),
(7, 3, 'Анелия', 'Петрова', 'гр. Габрово', 1, 877127615, 'bank', 'Speedy'),
(11, 1, 'Ивана', 'Иванова', 'гр.Хасково', 1, 881231234, 'bank', 'Econt');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(10) NOT NULL,
  `username` varchar(15) NOT NULL,
  `passwd` varchar(15) NOT NULL,
  `usertype` tinyint(4) NOT NULL,
  `personname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `username`, `passwd`, `usertype`, `personname`) VALUES
(1, 'admin', 'admin', 1, 'Администратор'),
(2, 'seller', 'seller', 2, 'Продавач');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_clothes`
--
ALTER TABLE `tbl_clothes`
  ADD PRIMARY KEY (`id_cloth`),
  ADD KEY `id_make` (`id_make`);

--
-- Indexes for table `tbl_makes`
--
ALTER TABLE `tbl_makes`
  ADD PRIMARY KEY (`id_make`),
  ADD UNIQUE KEY `make` (`make`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_make` (`id_make`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_clothes`
--
ALTER TABLE `tbl_clothes`
  MODIFY `id_cloth` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_makes`
--
ALTER TABLE `tbl_makes`
  MODIFY `id_make` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id_order` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_clothes`
--
ALTER TABLE `tbl_clothes`
  ADD CONSTRAINT `tbl_cloth_ibfk_1` FOREIGN KEY (`id_make`) REFERENCES `tbl_makes` (`id_make`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
