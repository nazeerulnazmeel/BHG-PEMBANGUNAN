-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2020 at 09:54 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pembangunan_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `uid` int(100) NOT NULL,
  `adm_usrname` varchar(50) NOT NULL,
  `adm_passwd` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`uid`, `adm_usrname`, `adm_passwd`) VALUES
(1, 'admin', '939e0f37932e3e440087f8a7e3035d27'),
(2, 'bahar', '$2y$10$vau.pCzUxe7nMoxf7kbHI.SD16o2gEdYf7uoQh3xD.oY/5JKjVpqG');

-- --------------------------------------------------------

--
-- Table structure for table `cawangan`
--

CREATE TABLE `cawangan` (
  `uid` int(10) NOT NULL,
  `nama_cawangan` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cawangan`
--

INSERT INTO `cawangan` (`uid`, `nama_cawangan`) VALUES
(1, 'Cawangan Pengurusan Projek 1'),
(2, 'Cawangan Pengurusan Projek 2'),
(3, 'Cawangan Pengurusan Sumber');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `uid` int(10) NOT NULL,
  `nama_kumpulan` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `uid` int(150) NOT NULL,
  `kad_pengenalan` varchar(12) NOT NULL,
  `nama` tinytext NOT NULL,
  `jawatan` tinytext NOT NULL,
  `gred` tinytext NOT NULL,
  `cawangan_id` int(10) NOT NULL,
  `unit_id` int(10) NOT NULL,
  `kumpulan_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penilai`
--

CREATE TABLE `penilai` (
  `uid` int(11) NOT NULL,
  `kad_pengenalan` varchar(12) NOT NULL,
  `passwd` longtext NOT NULL,
  `nama` tinytext NOT NULL,
  `jawatan` tinytext NOT NULL,
  `gred` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `uid` int(10) NOT NULL,
  `nama_unit` tinytext NOT NULL,
  `cawangan_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`uid`, `nama_unit`, `cawangan_id`) VALUES
(1, 'Unit Projek 1 (Utara)', 1),
(2, 'Unit Projek 3 (Timur)', 1),
(3, 'Unit Bajet', 1),
(4, 'Unit Penyelarasan (Urusetia Mesyuarat)', 1),
(5, 'Unit Projek 2 (Tengah)', 2),
(6, 'Unit Projek 4 (Selatan)', 2),
(7, 'Unit Projek 5 (Sabah & Sarawak)', 2),
(8, 'Unit Teknikal & Perolehan', 2),
(9, 'Unit Tanah', 3),
(10, 'Unit Public Private Partnership', 3),
(11, 'Unit Penyelarasan (Lawatan/Parlimen)', 3),
(12, 'Unit Kewangan & Pentadbiran', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `cawangan`
--
ALTER TABLE `cawangan`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `fk_cawangan` (`cawangan_id`),
  ADD KEY `fk_unit` (`unit_id`),
  ADD KEY `fk_kumpulan` (`kumpulan_id`);

--
-- Indexes for table `penilai`
--
ALTER TABLE `penilai`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `cawangan_id` (`cawangan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `uid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cawangan`
--
ALTER TABLE `cawangan`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `uid` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penilai`
--
ALTER TABLE `penilai`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `fk_cawangan` FOREIGN KEY (`cawangan_id`) REFERENCES `cawangan` (`uid`),
  ADD CONSTRAINT `fk_kumpulan` FOREIGN KEY (`kumpulan_id`) REFERENCES `kategori` (`uid`),
  ADD CONSTRAINT `fk_unit` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`uid`);

--
-- Constraints for table `unit`
--
ALTER TABLE `unit`
  ADD CONSTRAINT `unit_ibfk_1` FOREIGN KEY (`cawangan_id`) REFERENCES `cawangan` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
