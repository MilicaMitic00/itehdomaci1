-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2023 at 01:27 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `modeling agencija`
--

-- --------------------------------------------------------

--
-- Table structure for table `agencija`
--

CREATE TABLE `agencija` (
  `id` bigint(20) NOT NULL,
  `NazivAgencije` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `agencija`
--

INSERT INTO `agencija` (`id`, `NazivAgencije`) VALUES
(1, 'IMG Models'),
(2, 'Ford Models'),
(3, 'Modelwerk'),
(4, 'Next Management');

-- --------------------------------------------------------

--
-- Table structure for table `kasting`
--

CREATE TABLE `kasting` (
  `id` bigint(20) NOT NULL,
  `model` bigint(20) NOT NULL,
  `datum` date DEFAULT NULL,
  `nazivKastinga` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kasting`
--

INSERT INTO `kasting` (`id`, `model`, `datum`, `nazivKastinga`) VALUES
(1, 1, '2022-09-08', 'Victorias Secret Fashion Show'),
(2, 2, '2022-10-09', 'Sports Illustrated Swimsuit Edition'),
(3, 6, '2023-01-07', 'New York Fashion Week'),
(4, 5, '2023-02-11', 'London Fashion Week');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` bigint(20) NOT NULL,
  `imePrezime` varchar(40) DEFAULT NULL,
  `agencija` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `imePrezime`, `agencija`) VALUES
(1, 'Gigi Hadid', 1),
(2, 'Kendall Jenner', 3),
(3, 'Bella Hadid', 2),
(4, 'Joan Smalls', 4),
(5, 'Ashley Graham', 2),
(6, 'Liu Wen', 3),
(7, 'Adriana Lima', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agencija`
--
ALTER TABLE `agencija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kasting`
--
ALTER TABLE `kasting`
  ADD PRIMARY KEY (`id`,`model`),
  ADD KEY `model` (`model`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agencija` (`agencija`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agencija`
--
ALTER TABLE `agencija`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kasting`
--
ALTER TABLE `kasting`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kasting`
--
ALTER TABLE `kasting`
  ADD CONSTRAINT `kasting_model_fk` FOREIGN KEY (`model`) REFERENCES `model` (`id`);

--
-- Constraints for table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model_agencija_fk` FOREIGN KEY (`agencija`) REFERENCES `agencija` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
