-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2020 at 10:05 AM
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
(1, 'Ketua Cawangan'),
(2, 'Ketua Unit'),
(3, 'SUBK'),
(4, 'TSUBK'),
(5, 'Lain-lain');

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
  `access_id` int(10) DEFAULT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`uid`, `kad_pengenalan`, `nama`, `jawatan`, `gred`, `cawangan_id`, `unit_id`, `kumpulan_id`, `access_id`, `status_id`) VALUES
(3, '821112125042', 'Alyunizah binti Alim', 'KPSU', 'M48', 3, 12, 1, 2, 0),
(4, '730211085978', ' Shahira binti Ishak', 'PPTK', 'N32', 3, 12, 2, 5, 0),
(5, '700909105603', ' Mohamad Arif bin Ijun', 'PTT', 'N26', 3, 12, 2, 5, 0),
(6, '700130025300', ' Zarini binti Bidin', 'PTK', 'N22', 3, 12, 2, 5, 0),
(7, '771011066044', ' Norlela binti Abd Rashid', 'PT (P/O)', 'KUP N22', 3, 12, 2, 5, 0),
(8, '830417115341', ' Azrul Izwan bin Azizoon', 'PT (P/O)', 'KUP N22', 3, 12, 2, 5, 0),
(9, '841102035842', ' Nomawati binti Che Harun', 'PT (P/O)', 'N19', 3, 12, 2, 5, 0),
(10, '840612146249', ' Mohd Farid Affendi bin Abdullah', 'PT (P/O)', 'N20', 3, 12, 2, 5, 0),
(11, '870417115639', ' Mohd Azrol Hafiz bin Mat Jusoh', 'PT (P/O)', 'N21', 3, 12, 2, 5, 0),
(12, '751222075559', ' Rizal bin Ismail', 'PAP', 'N1', 3, 12, 2, 5, 0),
(13, '780605105818', ' Azlimah binti Atzahari', 'Pembantu Operasi', 'N11', 3, 12, 2, 5, 0),
(14, '840407105747', ' Shahrul Azzual bin Ahmad Zailan', 'Pemandu', 'H11', 3, 12, 2, 5, 0),
(15, '871024015121', ' Mohamad Hafeez bin Hidzir', 'Pemandu', 'H11', 3, 12, 2, 5, 0),
(16, '850128145139', ' Mohd Faizal bin Idris', 'Pemandu', 'H11', 3, 12, 2, 5, 0),
(17, '710912105793', ' Ahmad Fazli bin Mustapha', 'PT(P/O)', 'KUP N22', 3, 12, 2, 5, 0),
(18, '831110015260', ' Azizah binti Shahrom', 'Akauntan', 'WA48 (KUP)', 3, 12, 1, 5, 0),
(19, '871215015378', ' Nur Hadijah binti Hashim', 'Akauntan', 'WA41', 3, 12, 1, 5, 0),
(20, '610211015519', ' Abd Razak bin Abd Majid', 'Penolong Akauntan', 'W36', 3, 12, 2, 5, 0),
(21, '820314105539', ' Mohd Azhar bin Mokhtar', 'Penolong Akauntan', 'W29', 3, 12, 2, 5, 0),
(22, '860512565401', ' Mohd Izwan bin Shuhatdi', 'PT (Kewangan)', 'W19', 3, 12, 2, 5, 0),
(23, '780307026142', ' Sarina binti Azmi', 'Penolong Akauntan', 'W29', 3, 12, 2, 5, 0),
(24, '830619085654', ' Nurdiana binti Othman', 'Penolong Akauntan', 'W29', 3, 12, 2, 5, 0),
(25, '830714105684', ' Zamzailah binti Jamil', 'PT (Kewangan)', 'W22 (KUP)', 3, 12, 2, 5, 0),
(26, '750419115150', ' Hariati binti Alias', 'PT (P/O)', 'N19', 3, 12, 2, 5, 0),
(27, '831216135332', ' Azrianie binti Assahari', 'KPSU', 'M48', 3, 11, 1, 2, 0),
(28, '741223035277', ' Nurisham bin Yusoff', 'PSUK', 'M44', 3, 11, 1, 5, 0),
(29, '800507145352', ' Mira Aisa binti Shaarani', 'KPSUK', 'M52', 3, 10, 1, 2, 0),
(30, '830107105324', ' Irna Suhaiza binti Mohamed Rahman', 'PSUK', 'M44', 3, 10, 1, 5, 0),
(31, '850504085820', ' Nurul \'Ain binti Abd Jalil', 'PT (P/O)', 'KUP N22', 3, 10, 2, 5, 0),
(32, '790803115098', ' Nur Aida binti Hussin', 'KPSUK', 'M52', 3, 9, 1, 2, 0),
(33, '911219135565', ' Alexion Datu anak Brandah', 'PSU', 'M41', 3, 9, 1, 5, 0),
(34, '850616035596', ' W. Nurfahizul Izzati binti W. Alias', 'PSU', 'N41', 3, 9, 1, 5, 0),
(35, '850611145841', ' Muhamad Hafiz bin Yusof', 'PPTK', 'N32', 3, 9, 2, 5, 0),
(36, '930530045136', 'Nur Nisha Shafikah binti Ahmad Izram', 'PPTK', 'N29', 3, 9, 2, 5, 0),
(37, '831213145914', ' Shareena binti Sakiman', 'PT(P/O)', 'KUP N22', 3, 9, 2, 5, 0),
(38, '860605595343', ' Abd Hafiz bin Abd Manap', 'PT (P/O)', 'N19', 3, 9, 2, 5, 0),
(39, '670502085458', ' Lili Suriani binti Hassan', 'PT (P/O)', 'KUP N22', 3, 9, 2, 5, 0),
(40, '860908565848', ' Dhivyah a/p Vanugopal', 'PT (P/O)', 'N19', 3, 9, 2, 5, 0),
(41, '700903035173', ' Ahmad Nafiz bin Abd. Halim', 'TSUB', 'M54', 3, 15, 1, 1, 0),
(42, '861002595218', ' Siti Sabariah binti Mohd Noor', 'Arkitek', 'J44', 2, 8, 1, 2, 0),
(43, '740820086158', ' Sr Sahida binti Shahudin', 'Jurukur Bahan', 'J41', 2, 8, 1, 5, 0),
(44, '860910435127', ' Mohd Khuzaieri bin Mudzamer', 'Jurukur Bahan', 'J41', 2, 8, 1, 5, 0),
(45, '891110086020', ' Siti Safiah binti Md Zainudin', 'PPT', 'N29', 2, 8, 2, 5, 0),
(46, '800331065235', ' Mohd Ridhwan bin Mohd Yusof', 'Pelukis Pelan (Awam)', 'JA19', 2, 8, 2, 5, 0),
(47, '840914146340', ' Fairuz Zahirah binti Kadir Rosman', 'PT (P/O)', 'KUP N22', 2, 8, 2, 5, 0),
(48, '850412105687', ' Ahmad Ridzuan bin Ismail', 'PT (P/O)', 'KUP N22', 2, 8, 2, 5, 0),
(49, '800403085447', ' Saravanan a/l Gogarajah', 'KPSU', 'M48', 2, 7, 1, 2, 0),
(50, '830429105255', ' Muhd Shafawi bin Ahmad Batrod', 'PSUK', 'M44', 2, 7, 1, 5, 0),
(51, '910831145829', ' Mohd Bambang bin Mualip', 'PSU', 'M41', 2, 7, 1, 5, 0),
(52, '810921045057', ' Mohd Hairol bin Talib', 'PT (P/O)', 'N19', 2, 7, 2, 5, 0),
(53, '850702025386', ' Marianie binti Omar', 'PT (P/O)', 'N19', 2, 7, 2, 5, 0),
(54, '840323035956', ' Nik Abisharliza binti Nik Abdullah', 'PT (P/O)', 'KUP N22', 2, 7, 2, 5, 0),
(55, '820614145209', ' Jaswant Singh Gill', 'KPSU', 'M48', 2, 6, 1, 2, 0),
(56, '840621085847', ' Mohammad Firdhaus bin Md Dah', 'PSUK', 'M44', 2, 6, 1, 5, 0),
(57, '750721105068', ' Siti Mariam binti Moksin', 'PT (P/O)', 'N19', 2, 6, 2, 5, 0),
(58, '850414115424', ' Mazian binti Harun', 'PT (P/O)', 'N19', 2, 6, 2, 5, 0),
(59, '810310026068', ' Nurhafizah binti Mohd Shariff', 'KPSUK', 'M52', 2, 5, 1, 2, 0),
(60, '800515145651', ' Muhammad Shahrizal bin Abd Ghani', 'PSUK', 'M44', 2, 5, 1, 5, 0),
(61, '881011035368', ' Nur Hidayah binti Che Hassan', 'PSU', 'M41', 2, 5, 1, 5, 0),
(62, '820316065120', ' Norraida binti Amzah', 'PT (P/O)', 'N19', 2, 5, 2, 5, 0),
(63, '810725035564', ' Norafida binti Abd. Rahim', 'PT (P/O)', 'N19', 2, 5, 2, 5, 0),
(64, '750823055559', ' Dhanesh Kumar a/l Danesekaran', 'TSUB', 'M54', 2, 14, 1, 1, 0),
(65, '840616085244', ' Nurul Hidayah binti Abd Khalid', 'KPSU', 'M48', 1, 4, 1, 2, 0),
(66, '900505146448', ' Nor Sakinah binti Abdul Ghani', 'PSU', 'M41', 1, 4, 1, 5, 0),
(67, '650721075374', ' Robaayah binti Yaakob', 'PTT', 'N26', 1, 4, 2, 5, 0),
(68, '830606055480', ' Farazilah binti Abdul Latir', 'PT (P/O)', 'N19', 1, 4, 2, 5, 0),
(69, '780910086262', ' Siti Zubaidah binti Hassim', 'PT (P/O)', 'N19', 1, 4, 2, 5, 0),
(70, '820626045061', ' Mohd Fadhil bin Razmi', 'KPSU', 'M48', 1, 3, 1, 2, 0),
(71, '840701145256', ' Emmie Aryanie binti Norizan', 'PSU', 'M41', 1, 3, 1, 5, 0),
(72, '770630086971', ' Azbarisyam bin Baharuddin', 'PPTT', 'N36', 1, 3, 2, 5, 0),
(73, '861023527089', ' Muhammad Danial bin Ludin', 'PPT', 'N29', 1, 3, 2, 5, 0),
(74, '700418065416', ' Anita binti Abd Aziz', 'PT (P/O)', 'KUP N22', 1, 3, 2, 5, 0),
(75, '820802145740', ' Shasaliza binti Mohamad Dol Donan', 'PT (P/O)', 'KUP N22', 1, 3, 2, 5, 0),
(76, '811027085219', ' Rosli bin Dol', 'PT (P/O)', 'N19', 1, 3, 2, 5, 0),
(77, '800403085447', ' Shahizal Rizwan bin Ahmat Raslan', 'KPSU', 'M48', 1, 2, 1, 2, 0),
(78, '810326115591', ' Iruwi bin Othman', 'PSUK', 'M44', 1, 2, 1, 5, 0),
(79, '880707525686', ' Fazrina binti Hamzah', 'PSU', 'M41', 1, 2, 1, 5, 0),
(80, '790207115518', ' Mazrina binti Adzemi', 'PT (P/O)', 'KUP N22', 1, 2, 2, 5, 0),
(81, '771110135340', ' Mastura binti Su\'ud', 'PT (P/O)', 'N19', 1, 2, 2, 5, 0),
(82, '811204085501', ' Sathiaseelan a/l Perumal', 'KPSU', 'M48', 1, 1, 1, 2, 0),
(83, '940822135693', ' Franky Kwok', 'PSU', 'M41', 1, 1, 1, 5, 0),
(84, '610909085412', ' Aminatun binti Ngah Karim', 'PTK', 'N22', 1, 1, 2, 5, 0),
(85, '840928086238', ' Nashila binti Mohd Ayob', 'PT (P/O)', 'KUP N22', 1, 1, 2, 5, 0),
(86, '871122145958', ' Shahidatul Mastura binti Mohd Azlan', 'PT (P/O)', 'KUP N22', 1, 1, 2, 5, 0),
(87, '680330016075', ' Muhamad Zamani bin Mohd Ali', 'TSUB', 'M54', 1, 13, 1, 1, 0);

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
(2, '$2y$10$KewIs26HzizgWanjlTE/BeBBWh16.IxzoS0y2BJEt6Cd/U1BGp1.a', 82),
(3, '$2y$10$T4bBepZjHU/Qunk49Tr5f.8deLaiwXBr3pyqfF79wVE6rFzt0TbUO', 77),
(4, '$2y$10$AxP0bvoq9BzFGPloExU2me5JF3xh9aySecg9mvFtHXhOgE7Zo05Sy', 70),
(5, '$2y$10$9XZqr1jwFET8Ce4L7xTq6ul3XWyLd00Wf/5aebDh0CGZizOGBnXjW', 65),
(6, '$2y$10$7NYM4JzjpUc6rvThOimS4.owhQQ0uqJP4eYmw56xsI/1/oe7eOdVm', 59),
(7, '$2y$10$Ncs77Aebk/rLfbHq9IJESe4FLb0yH4PYGMtPKULAfIuRToN3ubIo2', 55),
(8, '$2y$10$zX4YMj7530Pvr6AA3YeR4uCIhW4jBbVSedYbXwsm..tyFiAG0W7F2', 49),
(9, '$2y$10$gsT7vCNpxZOEMQrf7SwIvOpOCSvd.PN7dwHg08DU3xDLCzES6Be82', 42),
(10, '$2y$10$QmUw7FLVVlUj56WiqZvZWu4euaZ2x07oWNXVOLizswwYAjRTbQJDS', 32),
(11, '$2y$10$NnnRNHfNKcYMQRlPk18byeyK4c/nV2usl9qOvTg36a8bpmxHvqW96', 29),
(12, '$2y$10$i4ET/G.b6tE7lvU/XM6LweS/jcKpgPry7dwkSxVxSC6q8S0MG9tHK', 27),
(13, '$2y$10$6OE71H5r2w1DapyMEmELaeiOBQad6EK4XDKod88/E.fkw0Z4O1j1i', 3),
(14, '$2y$10$JIIhwxSV7yCXJ.NZ4zmNK.O52w6kyB.9aIkV3Gq5ziwBnVAQXocL2', 41);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `uid` int(11) NOT NULL,
  `pegawai_id` int(10) NOT NULL,
  `markah` double NOT NULL,
  `penilai_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`uid`, `pegawai_id`, `markah`, `penilai_id`) VALUES
(8, 4, 10, 3),
(9, 4, 10, 3),
(10, 4, 12.5, 3),
(11, 4, 10, 3),
(12, 7, 15, 3);

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
(12, 'Unit Kewangan & Pentadbiran', 3),
(13, 'Pejabat TSUB (Pengurusan Projek 1)', 1),
(14, 'Pejabat TSUB (Pengurusan Projek 2)', 2),
(15, 'Pejabat TSUB (Pengurusan Sumber)', 3);

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
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
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
-- AUTO_INCREMENT for table `access_control`
--
ALTER TABLE `access_control`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `uid` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `penilai`
--
ALTER TABLE `penilai`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
