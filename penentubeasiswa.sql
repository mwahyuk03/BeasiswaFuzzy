-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2018 at 04:30 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penentubeasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelayakan`
--

CREATE TABLE `kelayakan` (
  `id` int(11) NOT NULL,
  `keputusan` varchar(20) NOT NULL,
  `ip` varchar(10) NOT NULL,
  `gaji` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelayakan`
--

INSERT INTO `kelayakan` (`id`, `keputusan`, `ip`, `gaji`) VALUES
(3, 'TL', 'jelek', 'rendah'),
(4, 'TL', 'jelek', 'standar'),
(5, 'TL', 'jelek', 'tinggi'),
(6, 'L', 'bagus', 'rendah'),
(7, 'L', 'bagus', 'standar'),
(8, 'TL', 'bagus', 'tinggi'),
(9, 'L', 'mayan', 'rendah'),
(10, 'TL', 'mayan', 'standar'),
(11, 'TL', 'mayan', 'tinggi');

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `id` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `ipk` varchar(3) NOT NULL,
  `gaji` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`id`, `nama`, `ipk`, `gaji`) VALUES
(1, 'Muldino Rinawa', '3.5', 4000000),
(2, 'Lucas Podolski', '2.8', 4600000),
(3, 'jj;', '3', 2750000);

-- --------------------------------------------------------

--
-- Table structure for table `p_gaji`
--

CREATE TABLE `p_gaji` (
  `id` int(10) NOT NULL,
  `max` varchar(40) NOT NULL,
  `min` varchar(40) NOT NULL,
  `ket` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_gaji`
--

INSERT INTO `p_gaji` (`id`, `max`, `min`, `ket`) VALUES
(1, '3000000', '0', 'kurang'),
(2, '5000000', '2500000', 'cukup'),
(3, '6000000', '4500000', 'lebih');

-- --------------------------------------------------------

--
-- Table structure for table `p_ipk`
--

CREATE TABLE `p_ipk` (
  `id` int(11) NOT NULL,
  `max` varchar(5) NOT NULL,
  `min` varchar(5) NOT NULL,
  `ket` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_ipk`
--

INSERT INTO `p_ipk` (`id`, `max`, `min`, `ket`) VALUES
(1, '2.75', '0', 'jelek'),
(2, '3.2', '2', 'lumayan'),
(3, '4', '2.75', 'bagus');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelayakan`
--
ALTER TABLE `kelayakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_gaji`
--
ALTER TABLE `p_gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_ipk`
--
ALTER TABLE `p_ipk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelayakan`
--
ALTER TABLE `kelayakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `mhs`
--
ALTER TABLE `mhs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `p_gaji`
--
ALTER TABLE `p_gaji`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `p_ipk`
--
ALTER TABLE `p_ipk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
