-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2020 at 10:07 AM
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
-- Table structure for table `access_control`
--

CREATE TABLE `access_control` (
  `uid` int(11) NOT NULL,
  `access_type` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_control`
--

INSERT INTO `access_control` (`uid`, `access_type`) VALUES
(1, 'Penilai'),
(2, 'Bukan Penilai');

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

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`uid`, `nama_kumpulan`) VALUES
(1, 'Pengurusan & Profesional'),
(2, 'Pelaksana');

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
  `unit_id` int(10) DEFAULT NULL,
  `kumpulan_id` int(10) NOT NULL,
  `access_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`uid`, `kad_pengenalan`, `nama`, `jawatan`, `gred`, `cawangan_id`, `unit_id`, `kumpulan_id`, `access_id`) VALUES
(3, '821112125042', 'Alyunizah binti Alim', 'KPSU', 'M48', 3, 12, 1, 1),
(4, '730211085978', ' Shahira binti Ishak', 'PPTK', 'N32', 3, 12, 2, 2),
(5, '700909105603', ' Mohamad Arif bin Ijun', 'PTT', 'N26', 3, 12, 2, 2),
(6, '700130025300', ' Zarini binti Bidin', 'PTK', 'N22', 3, 12, 2, 2),
(7, '771011066044', ' Norlela binti Abd Rashid', 'PT (P/O)', 'KUP N22', 3, 12, 2, 2),
(8, '830417115341', ' Azrul Izwan bin Azizoon', 'PT (P/O)', 'KUP N22', 3, 12, 2, 2),
(9, '841102035842', ' Nomawati binti Che Harun', 'PT (P/O)', 'N19', 3, 12, 2, 2),
(10, '840612146249', ' Mohd Farid Affendi bin Abdullah', 'PT (P/O)', 'N20', 3, 12, 2, 2),
(11, '870417115639', ' Mohd Azrol Hafiz bin Mat Jusoh', 'PT (P/O)', 'N21', 3, 12, 2, 2),
(12, '751222075559', ' Rizal bin Ismail', 'PAP', 'N1', 3, 12, 2, 2),
(13, '780605105818', ' Azlimah binti Atzahari', 'Pembantu Operasi', 'N11', 3, 12, 2, 2),
(14, '840407105747', ' Shahrul Azzual bin Ahmad Zailan', 'Pemandu', 'H11', 3, 12, 2, 2),
(15, '871024015121', ' Mohamad Hafeez bin Hidzir', 'Pemandu', 'H11', 3, 12, 2, 2),
(16, '850128145139', ' Mohd Faizal bin Idris', 'Pemandu', 'H11', 3, 12, 2, 2),
(17, '710912105793', ' Ahmad Fazli bin Mustapha', 'PT(P/O)', 'KUP N22', 3, 12, 2, 2),
(18, '831110015260', ' Azizah binti Shahrom', 'Akauntan', 'WA48 (KUP)', 3, 12, 1, 2),
(19, '871215015378', ' Nur Hadijah binti Hashim', 'Akauntan', 'WA41', 3, 12, 1, 2),
(20, '610211015519', ' Abd Razak bin Abd Majid', 'Penolong Akauntan', 'W36', 3, 12, 2, 2),
(21, '820314105539', ' Mohd Azhar bin Mokhtar', 'Penolong Akauntan', 'W29', 3, 12, 2, 2),
(22, '860512565401', ' Mohd Izwan bin Shuhatdi', 'PT (Kewangan)', 'W19', 3, 12, 2, 2),
(23, '780307026142', ' Sarina binti Azmi', 'Penolong Akauntan', 'W29', 3, 12, 2, 2),
(24, '830619085654', ' Nurdiana binti Othman', 'Penolong Akauntan', 'W29', 3, 12, 2, 2),
(25, '830714105684', ' Zamzailah binti Jamil', 'PT (Kewangan)', 'W22 (KUP)', 3, 12, 2, 2),
(26, '750419115150', ' Hariati binti Alias', 'PT (P/O)', 'N19', 3, 12, 2, 2),
(27, '831216135332', ' Azrianie binti Assahari', 'KPSU', 'M48', 3, 11, 1, 2),
(28, '741223035277', ' Nurisham bin Yusoff', 'PSUK', 'M44', 3, 11, 1, 2),
(29, '800507145352', ' Mira Aisa binti Shaarani', 'KPSUK', 'M52', 3, 10, 1, 2),
(30, '830107105324', ' Irna Suhaiza binti Mohamed Rahman', 'PSUK', 'M44', 3, 10, 1, 2),
(31, '850504085820', ' Nurul \'Ain binti Abd Jalil', 'PT (P/O)', 'KUP N22', 3, 10, 2, 2),
(32, '790803115098', ' Nur Aida binti Hussin', 'KPSUK', 'M52', 3, 9, 1, 2),
(33, '911219135565', ' Alexion Datu anak Brandah', 'PSU', 'M41', 3, 9, 1, 2),
(34, '850616035596', ' W. Nurfahizul Izzati binti W. Alias', 'PSU', 'N41', 3, 9, 1, 2),
(35, '850611145841', ' Muhamad Hafiz bin Yusof', 'PPTK', 'N32', 3, 9, 2, 2),
(36, '930530045136', 'Nur Nisha Shafikah binti Ahmad Izram', 'PPTK', 'N29', 3, 9, 2, 2),
(37, '831213145914', ' Shareena binti Sakiman', 'PT(P/O)', 'KUP N22', 3, 9, 2, 2),
(38, '860605595343', ' Abd Hafiz bin Abd Manap', 'PT (P/O)', 'N19', 3, 9, 2, 2),
(39, '670502085458', ' Lili Suriani binti Hassan', 'PT (P/O)', 'KUP N22', 3, 9, 2, 2),
(40, '860908565848', ' Dhivyah a/p Vanugopal', 'PT (P/O)', 'N19', 3, 9, 2, 2),
(41, '700903035173', ' Ahmad Nafiz bin Abd. Halim', 'TSUB', 'M54', 3, NULL, 1, 2),
(42, '861002595218', ' Siti Sabariah binti Mohd Noor', 'Arkitek', 'J44', 2, 8, 1, 2),
(43, '740820086158', ' Sr Sahida binti Shahudin', 'Jurukur Bahan', 'J41', 2, 8, 1, 2),
(44, '860910435127', ' Mohd Khuzaieri bin Mudzamer', 'Jurukur Bahan', 'J41', 2, 8, 1, 2),
(45, '891110086020', ' Siti Safiah binti Md Zainudin', 'PPT', 'N29', 2, 8, 2, 2),
(46, '800331065235', ' Mohd Ridhwan bin Mohd Yusof', 'Pelukis Pelan (Awam)', 'JA19', 2, 8, 2, 2),
(47, '840914146340', ' Fairuz Zahirah binti Kadir Rosman', 'PT (P/O)', 'KUP N22', 2, 8, 2, 2),
(48, '850412105687', ' Ahmad Ridzuan bin Ismail', 'PT (P/O)', 'KUP N22', 2, 8, 2, 2),
(49, '800403085447', ' Saravanan a/l Gogarajah', 'KPSU', 'M48', 2, 7, 1, 2),
(50, '830429105255', ' Muhd Shafawi bin Ahmad Batrod', 'PSUK', 'M44', 2, 7, 1, 2),
(51, '910831145829', ' Mohd Bambang bin Mualip', 'PSU', 'M41', 2, 7, 1, 2),
(52, '810921045057', ' Mohd Hairol bin Talib', 'PT (P/O)', 'N19', 2, 7, 2, 2),
(53, '850702025386', ' Marianie binti Omar', 'PT (P/O)', 'N19', 2, 7, 2, 2),
(54, '840323035956', ' Nik Abisharliza binti Nik Abdullah', 'PT (P/O)', 'KUP N22', 2, 7, 2, 2),
(55, '820614145209', ' Jaswant Singh Gill', 'KPSU', 'M48', 2, 6, 1, 2),
(56, '840621085847', ' Mohammad Firdhaus bin Md Dah', 'PSUK', 'M44', 2, 6, 1, 2),
(57, '750721105068', ' Siti Mariam binti Moksin', 'PT (P/O)', 'N19', 2, 6, 2, 2),
(58, '850414115424', ' Mazian binti Harun', 'PT (P/O)', 'N19', 2, 6, 2, 2),
(59, '810310026068', ' Nurhafizah binti Mohd Shariff', 'KPSUK', 'M52', 2, 5, 1, 2),
(60, '800515145651', ' Muhammad Shahrizal bin Abd Ghani', 'PSUK', 'M44', 2, 5, 1, 2),
(61, '881011035368', ' Nur Hidayah binti Che Hassan', 'PSU', 'M41', 2, 5, 1, 2),
(62, '820316065120', ' Norraida binti Amzah', 'PT (P/O)', 'N19', 2, 5, 2, 2),
(63, '810725035564', ' Norafida binti Abd. Rahim', 'PT (P/O)', 'N19', 2, 5, 2, 2),
(64, '750823055559', ' Dhanesh Kumar a/l Danesekaran', 'TSUB', 'M54', 2, NULL, 1, 2),
(65, '840616085244', ' Nurul Hidayah binti Abd Khalid', 'KPSU', 'M48', 1, 4, 1, 2),
(66, '900505146448', ' Nor Sakinah binti Abdul Ghani', 'PSU', 'M41', 1, 4, 1, 2),
(67, '650721075374', ' Robaayah binti Yaakob', 'PTT', 'N26', 1, 4, 2, 2),
(68, '830606055480', ' Farazilah binti Abdul Latir', 'PT (P/O)', 'N19', 1, 4, 2, 2),
(69, '780910086262', ' Siti Zubaidah binti Hassim', 'PT (P/O)', 'N19', 1, 4, 2, 2),
(70, '820626045061', ' Mohd Fadhil bin Razmi', 'KPSU', 'M48', 1, 3, 1, 2),
(71, '840701145256', ' Emmie Aryanie binti Norizan', 'PSU', 'M41', 1, 3, 1, 2),
(72, '770630086971', ' Azbarisyam bin Baharuddin', 'PPTT', 'N36', 1, 3, 2, 2),
(73, '861023527089', ' Muhammad Danial bin Ludin', 'PPT', 'N29', 1, 3, 2, 2),
(74, '700418065416', ' Anita binti Abd Aziz', 'PT (P/O)', 'KUP N22', 1, 3, 2, 2),
(75, '820802145740', ' Shasaliza binti Mohamad Dol Donan', 'PT (P/O)', 'KUP N22', 1, 3, 2, 2),
(76, '811027085219', ' Rosli bin Dol', 'PT (P/O)', 'N19', 1, 3, 2, 2),
(77, '800403085447', ' Shahizal Rizwan bin Ahmat Raslan', 'KPSU', 'M48', 1, 2, 1, 2),
(78, '810326115591', ' Iruwi bin Othman', 'PSUK', 'M44', 1, 2, 1, 2),
(79, '880707525686', ' Fazrina binti Hamzah', 'PSU', 'M41', 1, 2, 1, 2),
(80, '790207115518', ' Mazrina binti Adzemi', 'PT (P/O)', 'KUP N22', 1, 2, 2, 2),
(81, '771110135340', ' Mastura binti Su\'ud', 'PT (P/O)', 'N19', 1, 2, 2, 2),
(82, '811204085501', ' Sathiaseelan a/l Perumal', 'KPSU', 'M48', 1, 1, 1, 2),
(83, '940822135693', ' Franky Kwok', 'PSU', 'M41', 1, 1, 1, 2),
(84, '610909085412', ' Aminatun binti Ngah Karim', 'PTK', 'N22', 1, 1, 2, 2),
(85, '840928086238', ' Nashila binti Mohd Ayob', 'PT (P/O)', 'KUP N22', 1, 1, 2, 2),
(86, '871122145958', ' Shahidatul Mastura binti Mohd Azlan', 'PT (P/O)', 'KUP N22', 1, 1, 2, 2),
(87, '680330016075', ' Muhamad Zamani bin Mohd Ali', 'TSUB', 'M54', 1, NULL, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `penilai`
--

CREATE TABLE `penilai` (
  `uid` int(11) NOT NULL,
  `passwd` longtext NOT NULL,
  `pegawai_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilai`
--

INSERT INTO `penilai` (`uid`, `passwd`, `pegawai_id`) VALUES
(1, '$2y$10$xvuQvGP83uPKlHDEjxM3LuXzbBPSaln2B6nQI48HEuut01hbNb9Ya', 3);

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
-- Indexes for table `access_control`
--
ALTER TABLE `access_control`
  ADD PRIMARY KEY (`uid`);

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
  ADD KEY `fk_kumpulan` (`kumpulan_id`),
  ADD KEY `fk_access` (`access_id`);

--
-- Indexes for table `penilai`
--
ALTER TABLE `penilai`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `fk_pegawai` (`pegawai_id`);

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
-- AUTO_INCREMENT for table `access_control`
--
ALTER TABLE `access_control`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `uid` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `penilai`
--
ALTER TABLE `penilai`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `fk_access` FOREIGN KEY (`access_id`) REFERENCES `access_control` (`uid`),
  ADD CONSTRAINT `fk_cawangan` FOREIGN KEY (`cawangan_id`) REFERENCES `cawangan` (`uid`),
  ADD CONSTRAINT `fk_kumpulan` FOREIGN KEY (`kumpulan_id`) REFERENCES `kategori` (`uid`),
  ADD CONSTRAINT `fk_unit` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`uid`);

--
-- Constraints for table `penilai`
--
ALTER TABLE `penilai`
  ADD CONSTRAINT `fk_pegawai` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`uid`);

--
-- Constraints for table `unit`
--
ALTER TABLE `unit`
  ADD CONSTRAINT `unit_ibfk_1` FOREIGN KEY (`cawangan_id`) REFERENCES `cawangan` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
