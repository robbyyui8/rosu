-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2019 at 06:14 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ucapps_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktivitas`
--

CREATE TABLE `aktivitas` (
  `ID_AKTIVITAS` int(11) NOT NULL,
  `ID_PROFESI` int(11) DEFAULT NULL,
  `NAMA_AKTIVITAS` char(125) DEFAULT NULL,
  `KATEGORI_AKTIVITAS` int(11) DEFAULT NULL,
  `PRESENTASE_USAHA` double DEFAULT NULL,
  `TEMPLATE` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aktivitas`
--

INSERT INTO `aktivitas` (`ID_AKTIVITAS`, `ID_PROFESI`, `NAMA_AKTIVITAS`, `KATEGORI_AKTIVITAS`, `PRESENTASE_USAHA`, `TEMPLATE`) VALUES
(1, 2, 'Requirements', 1, 7.5, 0),
(2, 2, 'Specifications & Design', 1, 17.5, 0),
(3, 1, 'Coding', 1, 10, 0),
(4, 4, 'Testing', 1, 7, 0),
(5, 3, 'Project management', 2, 7, 0),
(6, 2, 'Configuration Management', 2, 3, 0),
(7, 5, 'Documentation', 2, 3, 0),
(8, 2, 'Training & Support', 2, 3, 0),
(9, 3, 'Acceptance & Deployment', 2, 5, 0),
(10, 3, 'Quality Assurance & Control', 3, 12.34, 0),
(11, 4, 'Evaluation and Testing', 3, 24.66, 0),
(12, 2, 'Requirements', 1, 22.16, 1),
(13, 2, 'Specifications & Design', 1, 20.5, 1),
(14, 1, 'Coding', 1, 12, 1),
(15, 4, 'Testing', 1, 5, 1),
(16, 3, 'Project management', 2, 4, 1),
(17, 2, 'Configuration Management', 2, 7, 1),
(18, 5, 'Documentation', 2, 2, 1),
(19, 2, 'Training & Support', 2, 12, 1),
(20, 3, 'Acceptance & Deployment', 2, 5, 1),
(21, 3, 'Quality Assurance & Control', 3, 10.34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `ID_ANGGOTA` int(11) NOT NULL,
  `NAMA_ANGGOTA` char(125) DEFAULT NULL,
  `ID_PROFESI` int(11) DEFAULT NULL,
  `PENGALAMAN` char(125) DEFAULT NULL,
  `STATUS` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`ID_ANGGOTA`, `NAMA_ANGGOTA`, `ID_PROFESI`, `PENGALAMAN`, `STATUS`) VALUES
(1, 'Mukhamad Faiz Fanani', 1, '2 tahun', NULL),
(2, 'Rima Faiqoh Augustine', 5, ' 1 bulan', NULL),
(3, 'Hudalizaman', 1, '2 tahun', NULL),
(4, 'Sella Wahyu Restiana', 5, '1 tahun', NULL),
(8, 'Ronald Renaldi', 1, '3 Tahun', NULL),
(9, 'Renny Pradina', 2, '3 Tahun', NULL),
(10, 'Ahmad Fashel', 2, '3 Tahun', NULL),
(11, 'Hendra Eko Prayogo', 1, '1 Tahun', NULL),
(12, 'panji', 1, '2 tahun', NULL),
(14, '', 2, '2 tahun', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `anggota_tim`
--

CREATE TABLE `anggota_tim` (
  `ID_ANGGOTA_TIM` int(11) NOT NULL,
  `ID_TIM` int(11) DEFAULT NULL,
  `ID_ANGGOTA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota_tim`
--

INSERT INTO `anggota_tim` (`ID_ANGGOTA_TIM`, `ID_TIM`, `ID_ANGGOTA`) VALUES
(1, 6, 1),
(2, 6, 4),
(3, 6, 9),
(6, 7, 1),
(7, 7, 2),
(12, 9, 1),
(13, 9, 2),
(14, 9, 10),
(21, 10, 1),
(22, 10, 2),
(23, 10, 10),
(24, 11, 1),
(26, 8, 1),
(27, 12, 2),
(28, 12, 3),
(29, 13, 2),
(30, 13, 4),
(31, 14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `aplikasi`
--

CREATE TABLE `aplikasi` (
  `ID_APLIKASI` int(11) NOT NULL,
  `NAMA_APLIKASI` char(125) DEFAULT NULL,
  `UUCW` double(10,2) DEFAULT '0.00',
  `UAW` double(10,2) DEFAULT '0.00',
  `TCF` double(10,2) DEFAULT '0.00',
  `ECF` double(10,2) DEFAULT '0.00',
  `EFFORT_ESTIMATE` double(10,2) DEFAULT '0.00',
  `EFFORT_REAL` double(12,2) NOT NULL DEFAULT '0.00' COMMENT '0',
  `BIAYA_ESTIMASI` double(255,2) DEFAULT '0.00',
  `DATE_CREATED` varchar(125) DEFAULT NULL,
  `ID_TIM` int(11) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `TEMPLATE` int(11) DEFAULT NULL,
  `STEP` int(5) DEFAULT '0',
  `ID_CLIENT` int(10) DEFAULT NULL,
  `ER` double(10,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aplikasi`
--

INSERT INTO `aplikasi` (`ID_APLIKASI`, `NAMA_APLIKASI`, `UUCW`, `UAW`, `TCF`, `ECF`, `EFFORT_ESTIMATE`, `EFFORT_REAL`, `BIAYA_ESTIMASI`, `DATE_CREATED`, `ID_TIM`, `STATUS`, `TEMPLATE`, `STEP`, `ID_CLIENT`, `ER`) VALUES
(1, 'ucp', 10.00, 4.00, 1.03, 0.98, 120.12, 0.00, 2116750.01, '23-06-2018', 6, 1, 0, 7, 39, 8.50),
(2, 'fwa', 10.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '24-06-2018', 7, 0, 0, 3, 40, 0.00),
(3, 'sas', 10.00, 5.00, 1.05, 1.08, 144.59, 0.00, 835714.08, '24-06-2018', 8, 2, 0, 7, 41, 8.50),
(4, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '25-06-2018', 9, 0, 0, 2, 42, 0.00),
(5, 'Aplikasi Estimasi Harga Perangkat Lunak', 5.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '25-06-2018', 10, 0, 0, 3, 43, 0.00),
(6, 'Aplikasi Estimasi Harga Perangkat Lunak', 5.00, 2.00, 0.96, 0.96, 54.84, 0.00, 1842857.84, '02-07-2018', 11, 4, 0, 8, 44, 8.50),
(7, 'Aplikasi Estimasi Harga Perangkat Lunak', 5.00, 2.00, 1.00, 0.78, 46.41, 0.00, 804709.38, '02-07-2018', 12, 0, 0, 7, 45, 8.50),
(8, 'Aplikasi Estimasi Harga Perangkat Lunak', 10.00, 2.00, 0.00, 0.00, 0.00, 0.00, 0.00, '02-07-2018', 14, 0, 0, 4, 46, 0.00),
(9, 'sas', 5.00, 3.00, 1.03, 0.96, 33.22, 0.00, 630176.58, '02-07-2018', 13, 0, 1, 7, 47, 4.20),
(10, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '04-07-2018', NULL, NULL, NULL, 1, 48, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `biaya_op`
--

CREATE TABLE `biaya_op` (
  `ID_OP` int(10) NOT NULL,
  `ID_APLIKASI` int(10) DEFAULT NULL,
  `DESKRIPSI` varchar(125) DEFAULT NULL,
  `NILAI` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biaya_op`
--

INSERT INTO `biaya_op` (`ID_OP`, `ID_APLIKASI`, `DESKRIPSI`, `NILAI`) VALUES
(1, 6, 'listrik   ', 50000.00);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `ID_CLIENT` int(10) NOT NULL,
  `NAMA` varchar(125) DEFAULT NULL,
  `ALAMAT` text,
  `TANGGAL_PENGAJUAN` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`ID_CLIENT`, `NAMA`, `ALAMAT`, `TANGGAL_PENGAJUAN`) VALUES
(20, 'Aplikasi Sabun', 'Jalan Sumolowaru', '20-05-2015'),
(21, 'Mr. A', 'Jalan A Saja No. 7', '01-05-2015'),
(22, 'Sudaharto`', 'Jalan Asem Payung', '11-06-2015'),
(23, 'Ryco', 'Jalan medokan', '16-06-2015'),
(24, 'Faiz', 'Jalan Simangraja', '10-06-2015'),
(25, 'Bapak Dimas', 'Jalan Simangraja Selatan No.20', '05-06-2015'),
(26, 'Julius', 'Jalan sidang', '02-06-2015'),
(27, 'DTS', 'Jalan sidang kemuning', '11-06-2015'),
(28, 'a', 'D', '17-06-2015'),
(29, 'Jurusan Sistem Informasi', 'Jalan Sukolilo', '10-06-2015'),
(30, 'Ainur Liqwa', 'Jalan Asem ', '17-06-2015'),
(31, 'MbkPak Yan', 'surabaya', '28-06-2015'),
(32, 'Client bakso', 'Jalan jajar', '24-06-2015'),
(33, 'Agus Setiawan', 'Jalan Gebang Putih No.34', '23-06-2015'),
(34, 'Client rumah', 'sd', '30-06-2015'),
(35, 'Bapak Dimas', 'Jalan Asem Payung', '23-06-2015'),
(36, 'Aplikasi mobail', 'jalan jaja tunggal', '07-06-2015'),
(37, 'Bapak Marsudi', 'Jalan Sukolilo', '02-06-2015'),
(38, 'Bapak Faiz Fanani', 'Jalan Sukolilo Regency', '02-06-2015'),
(39, 'Danang', 'sby', '19-06-2018'),
(40, 'adae', 'ea', '13-06-2018'),
(41, 'Danang', 'aw', '20-06-2018'),
(42, 'Danang', 'Keputih', '27-06-2018'),
(43, '', 'Keputih', '27-06-2018'),
(44, 'Danang', 'ITS', '19-06-2018'),
(45, 'Dennys', 'sby', '13-06-2018'),
(46, 'Dana', 'sda', '13-06-2018'),
(47, 'Danan', 'sby', '13-06-2018'),
(48, 'Danan', 'keputih', '19-07-2018');

-- --------------------------------------------------------

--
-- Table structure for table `fitur`
--

CREATE TABLE `fitur` (
  `ID_FITUR` int(10) NOT NULL,
  `ID_APLIKASI` int(10) DEFAULT NULL,
  `NAMA_FITUR` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fitur`
--

INSERT INTO `fitur` (`ID_FITUR`, `ID_APLIKASI`, `NAMA_FITUR`) VALUES
(1, 1, 'menghitung harga'),
(2, 1, 'mencetak harga'),
(3, 1, 'login'),
(4, 2, 'menghitung harga'),
(5, 3, 'menghitung harga'),
(15, 5, 'menghitung harga'),
(16, 5, 'login'),
(17, 6, 'menghitung harga'),
(19, 3, 'login'),
(20, 7, 'login'),
(21, 7, 'menghitung harga'),
(22, 9, 'menghitung harga'),
(23, 8, 'menghitung harga');

-- --------------------------------------------------------

--
-- Table structure for table `log_aktor`
--

CREATE TABLE `log_aktor` (
  `ID_LOG_A` int(11) NOT NULL,
  `ID_APLIKASI` int(11) DEFAULT NULL,
  `ID_P_A` int(11) DEFAULT NULL,
  `NAMA_AKTOR` char(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_aktor`
--

INSERT INTO `log_aktor` (`ID_LOG_A`, `ID_APLIKASI`, `ID_P_A`, `NAMA_AKTOR`) VALUES
(1, 1, 2, 'manager'),
(2, 1, 1, 'pegawai'),
(3, 1, 1, 'kasir'),
(5, 3, 2, 'direktur'),
(6, 3, 2, 'analis'),
(7, 3, 1, 'admin'),
(8, 6, 2, 'wq'),
(9, 7, 2, 'Sekertaris'),
(10, 9, 3, 'sekertaris'),
(11, 8, 2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `log_biaya`
--

CREATE TABLE `log_biaya` (
  `ID_LOG_BIAYA` int(11) NOT NULL,
  `ID_APLIKASI` int(11) DEFAULT NULL,
  `ID_AKTIVITAS` int(11) DEFAULT NULL,
  `NILAI_USAHA` double DEFAULT NULL,
  `GAJI_PER_JAM` double DEFAULT NULL,
  `BIAYA_AKTIVITAS` double DEFAULT NULL,
  `EDIT_BIAYA` int(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_biaya`
--

INSERT INTO `log_biaya` (`ID_LOG_BIAYA`, `ID_APLIKASI`, `ID_AKTIVITAS`, `NILAI_USAHA`, `GAJI_PER_JAM`, `BIAYA_AKTIVITAS`, `EDIT_BIAYA`) VALUES
(100, 1, 1, 9.01, 19687.5, 177384.38, 0),
(101, 1, 2, 21.02, 19687.5, 413831.25, 0),
(102, 1, 3, 12.01, 14062.5, 168890.63, 0),
(103, 1, 4, 8.41, 12500, 105125, 0),
(104, 1, 5, 8.41, 23906.25, 201051.56, 0),
(105, 1, 6, 3.6, 19687.5, 70875, 0),
(106, 1, 7, 3.6, 11250, 40500, 0),
(107, 1, 8, 3.6, 19687.5, 70875, 0),
(108, 1, 9, 6.01, 23906.25, 143676.56, 0),
(109, 1, 10, 14.82, 23906.25, 354290.63, 0),
(110, 1, 11, 29.62, 12500, 370250, 0),
(188, 6, 1, 4.11, 0, 80915.637, 1),
(189, 6, 2, 9.6, 0, 189000, 1),
(190, 6, 3, 5.48, 0, 77062.5, 1),
(191, 6, 4, 3.84, 0, 48000, 1),
(192, 6, 5, 3.84, 0, 918000, 1),
(193, 6, 6, 1.65, 0, 32484.38, 1),
(194, 6, 7, 1.65, 0, 18562.5, 1),
(195, 6, 8, 1.65, 0, 32484.38, 1),
(196, 6, 9, 2.74, 0, 65503.13, 1),
(197, 6, 10, 6.77, 0, 161845.31, 1),
(198, 6, 11, 13.52, 0, 169000, 1),
(221, 3, 1, 3.61, 0, 71071.88, 1),
(222, 3, 2, 8.43, 0, 165965.63, 1),
(223, 3, 3, 4.82, 0, 54225, 1),
(224, 3, 4, 3.37, 0, 42125, 1),
(225, 3, 5, 3.37, 0, 80564.06, 1),
(226, 3, 6, 1.45, 0, 28546.88, 1),
(227, 3, 7, 1.45, 0, 16312.5, 1),
(228, 3, 8, 1.45, 0, 28546.88, 1),
(229, 3, 9, 2.41, 0, 57614.06, 1),
(230, 3, 10, 5.95, 0, 142242.19, 1),
(231, 3, 11, 11.88, 0, 148500, 1),
(408, 7, 1, 3.48, 19687.5, 68512.5, 0),
(409, 7, 2, 8.12, 19687.5, 159862.5, 0),
(410, 7, 3, 4.64, 11250, 52200, 0),
(411, 7, 4, 3.25, 12500, 40625, 0),
(412, 7, 5, 3.25, 23906.25, 77695.31, 0),
(413, 7, 6, 1.39, 19687.5, 27365.63, 0),
(414, 7, 7, 1.39, 11250, 15637.5, 0),
(415, 7, 8, 1.39, 19687.5, 27365.63, 0),
(416, 7, 9, 2.32, 23906.25, 55462.5, 0),
(417, 7, 10, 5.73, 23906.25, 136982.81, 0),
(418, 7, 11, 11.44, 12500, 143000, 0),
(419, 9, 12, 7.36, 19687.5, 144900, 0),
(420, 9, 13, 6.81, 19687.5, 134071.88, 0),
(421, 9, 14, 3.99, 11250, 44887.5, 0),
(422, 9, 15, 1.66, 12500, 20750, 0),
(423, 9, 16, 1.33, 23906.25, 31795.31, 0),
(424, 9, 17, 2.33, 19687.5, 45871.88, 0),
(425, 9, 18, 0.66, 11250, 7425, 0),
(426, 9, 19, 3.99, 19687.5, 78553.13, 0),
(427, 9, 20, 1.66, 23906.25, 39684.38, 0),
(428, 9, 21, 3.44, 23906.25, 82237.5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `log_indikator_ecf`
--

CREATE TABLE `log_indikator_ecf` (
  `ID_LOG_ECF` int(11) NOT NULL,
  `ID_P_ECF` int(11) DEFAULT NULL,
  `ID_APLIKASI` int(11) DEFAULT NULL,
  `VALUE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_indikator_ecf`
--

INSERT INTO `log_indikator_ecf` (`ID_LOG_ECF`, `ID_P_ECF`, `ID_APLIKASI`, `VALUE`) VALUES
(1, 1, 1, 3),
(2, 2, 1, 1),
(3, 3, 1, 3),
(4, 4, 1, 4),
(5, 5, 1, 2),
(6, 6, 1, 4),
(7, 7, 1, 2),
(8, 8, 1, 4),
(9, 1, 3, 3),
(10, 2, 3, 4),
(11, 3, 3, 1),
(12, 4, 3, 4),
(13, 5, 3, 3),
(14, 6, 3, 2),
(15, 7, 3, 4),
(16, 8, 3, 2),
(28, 1, 6, 2),
(29, 2, 6, 3),
(30, 3, 6, 4),
(31, 4, 6, 4),
(32, 5, 6, 2),
(33, 6, 6, 4),
(34, 7, 6, 3),
(35, 8, 6, 3),
(36, 1, 7, 4),
(37, 2, 7, 2),
(38, 3, 7, 4),
(39, 4, 7, 3),
(40, 5, 7, 2),
(41, 6, 7, 5),
(42, 7, 7, 3),
(43, 8, 7, 1),
(44, 1, 9, 3),
(45, 2, 9, 4),
(46, 3, 9, 5),
(47, 4, 9, 2),
(48, 5, 9, 3),
(49, 6, 9, 2),
(50, 7, 9, 1),
(51, 8, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `log_indikator_tcf`
--

CREATE TABLE `log_indikator_tcf` (
  `ID_LOG_TCF` int(11) NOT NULL,
  `ID_APLIKASI` int(11) DEFAULT NULL,
  `ID_P_TCF` int(11) DEFAULT NULL,
  `VALUE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_indikator_tcf`
--

INSERT INTO `log_indikator_tcf` (`ID_LOG_TCF`, `ID_APLIKASI`, `ID_P_TCF`, `VALUE`) VALUES
(1, 1, 51, 3),
(2, 1, 52, 2),
(3, 1, 53, 5),
(4, 1, 54, 2),
(5, 1, 55, 3),
(6, 1, 56, 1),
(7, 1, 57, 4),
(8, 1, 58, 5),
(9, 1, 59, 3),
(10, 1, 60, 3),
(11, 1, 61, 2),
(12, 1, 62, 4),
(13, 1, 63, 1),
(14, 3, 51, 4),
(15, 3, 52, 2),
(16, 3, 53, 4),
(17, 3, 54, 5),
(18, 3, 55, 1),
(19, 3, 56, 3),
(20, 3, 57, 2),
(21, 3, 58, 4),
(22, 3, 59, 4),
(23, 3, 60, 2),
(24, 3, 61, 5),
(25, 3, 62, 1),
(26, 3, 63, 3),
(55, 6, 51, 2),
(56, 6, 52, 3),
(57, 6, 53, 3),
(58, 6, 54, 2),
(59, 6, 55, 4),
(60, 6, 56, 2),
(61, 6, 57, 4),
(62, 6, 58, 2),
(63, 6, 59, 4),
(64, 6, 60, 0),
(65, 6, 61, 3),
(66, 6, 62, 3),
(67, 6, 63, 3),
(68, 7, 51, 2),
(69, 7, 52, 3),
(70, 7, 53, 4),
(71, 7, 54, 1),
(72, 7, 55, 4),
(73, 7, 56, 3),
(74, 7, 57, 2),
(75, 7, 58, 4),
(76, 7, 59, 3),
(77, 7, 60, 2),
(78, 7, 61, 3),
(79, 7, 62, 3),
(80, 7, 63, 2),
(81, 9, 51, 3),
(82, 9, 52, 2),
(83, 9, 53, 4),
(84, 9, 54, 5),
(85, 9, 55, 3),
(86, 9, 56, 2),
(87, 9, 57, 1),
(88, 9, 58, 4),
(89, 9, 59, 3),
(90, 9, 60, 1),
(91, 9, 61, 5),
(92, 9, 62, 3),
(93, 9, 63, 2),
(94, 8, 51, 3),
(95, 8, 52, 1),
(96, 8, 53, 4),
(97, 8, 54, 2),
(98, 8, 55, 3),
(99, 8, 56, 3),
(100, 8, 57, 1),
(101, 8, 58, 4),
(102, 8, 59, 3),
(103, 8, 60, 2),
(104, 8, 62, 4);

-- --------------------------------------------------------

--
-- Table structure for table `log_konstanta_effort`
--

CREATE TABLE `log_konstanta_effort` (
  `ID_K_EFFORT` int(11) NOT NULL,
  `NILAI_EFFORT` double(10,2) NOT NULL,
  `DATE_CREATED` varchar(125) DEFAULT NULL,
  `TEMPLATE` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_konstanta_effort`
--

INSERT INTO `log_konstanta_effort` (`ID_K_EFFORT`, `NILAI_EFFORT`, `DATE_CREATED`, `TEMPLATE`) VALUES
(1, 8.20, '20-04-2015', 0),
(2, 4.20, '20-04-2015', 1),
(11, 8.80, '24-06-2015', 0);

-- --------------------------------------------------------

--
-- Table structure for table `log_use_case`
--

CREATE TABLE `log_use_case` (
  `ID_LOG_UC` int(11) NOT NULL,
  `NAMA_USE_CASE` char(125) DEFAULT NULL,
  `JUMLAH_TRANSAKSI` int(11) DEFAULT NULL,
  `ID_APLIKASI` int(11) DEFAULT NULL,
  `ID_P_UC` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_use_case`
--

INSERT INTO `log_use_case` (`ID_LOG_UC`, `NAMA_USE_CASE`, `JUMLAH_TRANSAKSI`, `ID_APLIKASI`, `ID_P_UC`) VALUES
(1, 'login', 1, 1, 1),
(2, 'memperkirakan harga', 2, 1, 1),
(6, 'asf', 4, 2, 2),
(9, 'Login', 3, 5, 1),
(11, 'fwq', 1, 6, 1),
(12, 'Menambah data pengguna', 2, 7, 1),
(13, 'Menambah data pengguna', 2, 9, 1),
(14, 'Menambah data pengguna', 3, 3, 1),
(15, 'Merubah data pengguna', 1, 3, 1),
(16, '', 2, 8, 1),
(17, 'Menambah data pengguna', 2, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembobotan_aktor`
--

CREATE TABLE `pembobotan_aktor` (
  `ID_P_A` int(11) NOT NULL,
  `KLASIFIKASI_AKTOR` char(125) DEFAULT NULL,
  `TIPE_AKTOR` char(125) DEFAULT NULL,
  `BOBOT` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembobotan_aktor`
--

INSERT INTO `pembobotan_aktor` (`ID_P_A`, `KLASIFIKASI_AKTOR`, `TIPE_AKTOR`, `BOBOT`) VALUES
(1, 'Simple', 'Berinteraksi melalui baris perintah atau Command Prompt', 1),
(2, 'Average', 'Berinteraksi dengan protokiol  komunikasi seperti (e.g. TCP/IP, FTP, HTTP, database)', 2),
(3, 'Complex', 'Berinteraksi dengan GUI atau web page', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pembobotan_ecf`
--

CREATE TABLE `pembobotan_ecf` (
  `ID_P_ECF` int(11) NOT NULL,
  `INDIKATOR` char(125) DEFAULT NULL,
  `DESKRIPSI` text,
  `BOBOT` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembobotan_ecf`
--

INSERT INTO `pembobotan_ecf` (`ID_P_ECF`, `INDIKATOR`, `DESKRIPSI`, `BOBOT`) VALUES
(1, 'Familiarity with the Project', 'Apakah tim anda merasa familiar (menguasai) dengan proyek pengembangan perangkat lunak\r\nSemakin familiar (menguasai), maka nilai semakin tinggi.', 1.5),
(2, 'Application Experience', 'Sejauh mana pengalaman tim anda dalam membuat perubahan pada proyek pengembangan perangkat lunak yang sama? Semakin banyak pengalaman dalam membuat perubahan pada proyek yang sama maka nilanya semkin tinggi', 0.5),
(3, 'OO Programming Experience', 'Sejauh mana pengalaman tim anda dalam membuat proyek perangkat lunak berbasis Object Oriented (OO) programming?. Semakin banyak pengalaman dalam Object Oriented (OO) programming, maka nilai semakin tinggi.', 1),
(4, 'Lead Analyst Capability', 'Seberapa besar kapabilitas (kemampuan) dan pengetahuan menganalisa dalam tim anda? “Analisa kebutuhan yang buruk adalah pembunuh nomor satu dalam proyek - Standish Group melaporkan bahwa 40% sampai 60% dari cacat produk berasal dari kebutuhan yang buruk. Semakin besar kapabilitas dan pengetahuan, maka nilai semakin tinggi.', 0.5),
(5, 'Motivation', 'Seberapa besar motivasi pada tim anda dalam membuat proyek pengembangan perangkat lunak ini?\r\nSemakin besar motivasi, maka nilai semakin tinggi.', 1),
(6, 'Stable Requirements', 'Seberapa besar kebutuhan pada proyek pengembangan perangkat lunak ini mengalami perubahan?\r\nSemakin besar kebutuhan akan perubahan, maka nilai semakin tinggi.', 2),
(7, 'Part Time Staff', 'Apakah dalam tim anda terdapat anggota tim yang bekerja paruh waktu?\r\nSemakin banyak waktu yang digunakan anggota tim untuk bekerja paruh waktu, maka nilai semakin tinggi.', -1),
(8, 'Difficult Programming Language', 'Seberapa sulit bagi tim anda, bahasa pemrograman yang digunakan dalam pembuatan proyek perangkat lunak ini?\r\nSemakin sulit bahasa pemrograman, maka nilai semakin tinggi.', -1);

-- --------------------------------------------------------

--
-- Table structure for table `pembobotan_tcf`
--

CREATE TABLE `pembobotan_tcf` (
  `ID_P_TCF` int(11) NOT NULL,
  `INDIKATOR` char(125) DEFAULT NULL,
  `DESKRIPSI` text,
  `BOBOT` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembobotan_tcf`
--

INSERT INTO `pembobotan_tcf` (`ID_P_TCF`, `INDIKATOR`, `DESKRIPSI`, `BOBOT`) VALUES
(51, 'Distributed System Required', 'Seberapa kompleks (terpusat ataupun terdistribusi) kebutuhan arsitektur pada proyek perangkat lunak ini?\r\nSemakin kompleks kebutuhan arsitektur, maka nilai semakin tinggi.', 2),
(52, 'Response Time Is Important', 'Apakah menurut tim anda kecepatan respon (server) bagi pengguna merupakan faktor penting?\r\nSemakin pentingnya peningkatan waktu respon, maka nilai semakin tinggi.', 1),
(53, 'End User Efficiency', 'Apakah menurut tim anda proyek perangkat lunak yang dikembangkan ini untuk mengoptimalkan efisiensi pengguna, atau hanya mengutamakan kemampuan tim saja?\r\nSemakin optimal efisiensi pengguna, maka nilai semakin tinggi. ', 1),
(54, 'Complex Internal Processing Required', 'Seberapa banyak algoritma yang sulit (kompleks) untuk dilakukan dan diuji pada proyek perangkat lunak ini?\r\nSemakin kompleks algoritma (resource leveling, OLAP cubes, etc) maka nilai semakin tinggi. Namun, database sederhana, maka nilai semakin rendah.', 1),
(55, 'Reusable Code Must Be A Focus', 'Seberapa besar penggunaan ulang kode pada proyek perangkat lunak ini? “Penggunaan ulang kode mengurangi jumlah usaha yang diperlukan untuk mendistribusikan sebuah proyek dan mengurangi jumlah waktu yang diperlukan untuk debugging sebuah proyek.”\r\nSemakin tinggi tingkat penggunaan ulang kode, maka nilai semakin rendah.', 1),
(56, 'Installation Easy', 'Apakah menurut tim anda kemudahan instalasi proyek perangkat lunak ini bagi pengguna akhir merupakan faktor penting?\r\nSemakin tinggi tingkat kompetensi pengguna dalam instalasi proyek perangkat lunak ini, maka nilai semakin rendah.', 0.5),
(57, 'Usability', 'Apakah kemudahan dalam penggunaan aplikasi merupakan kriteria utama dari proyek pembuatan perangkat lunak tim anda?\r\nSemakin besar pentingnya kegunaan, semakin tinggi nilai yang diberikan. ', 0.5),
(58, 'Cross-Platform Support', 'Apakah dibutuhkan dukungan multi-platform untuk aplikasi dari tim anda?\r\nSemakin banyak platform yang harus didukung (ini bisa versi browser, perangkat mobile, dll atau Windows / OSX / Unix), semakin tinggi nilai yang diberikan.', 2),
(59, 'Easy To Change', 'Apakah aplikasi anda mudah untuk diubah atau disesuaikan oleh pengguna / customer di masa depan? Semakin mudah perubahan atau penyesuaian aplikasi anda,maka nilai semakin tinggi. ', 1),
(60, 'Highly Concurrent', 'Apakah dalam aplikasi anda dapat mengatasi penguncian database atau masalah konkurensi lainnya?\r\nSemakin tinggi perhatian yang diberikan untuk menyelesaikan permasalahan dalam data atau aplikasi, maka nilai semakin tinggi. ', 1),
(61, 'Custom Security', 'Apakah dalam aplikasi anda solusi keamanan yang ada mudah digunakan, atau kode kustom harus dikembangkan?\r\nApabila kode kustom kemanan lebih harus dilakukan, maka nilai semakin tinggi', 1),
(62, 'Dependence On Third-Party Code', 'Apakah aplikasi anda masih memerlukan kontrol dari pihak ketiga, seperti penggunaan ulang kode?\r\nApabila kebutuhan kontrol dari pihak ketiga tidak terlalu penting, maka nilai semakin tinggi.', 1),
(63, 'User Training', 'Berapa lama waktu yang dibutuhkan untuk pelatihan pengguna diperlukan?\r\nSemakin lama waktu yang dibutuhkan pengguna untuk penguasaan aplikasi, maka semakin tinggi nilai yang diberikan.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembobotan_use_case`
--

CREATE TABLE `pembobotan_use_case` (
  `ID_P_UC` int(11) NOT NULL,
  `TIPE` char(125) DEFAULT NULL,
  `JUMLAH_TRANSAKSI` char(125) DEFAULT NULL,
  `BOBOT` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembobotan_use_case`
--

INSERT INTO `pembobotan_use_case` (`ID_P_UC`, `TIPE`, `JUMLAH_TRANSAKSI`, `BOBOT`) VALUES
(1, 'Simple', '1-3', 5),
(2, 'Average', '4-7', 10),
(3, 'Complex', '>=8', 15);

-- --------------------------------------------------------

--
-- Table structure for table `profesi`
--

CREATE TABLE `profesi` (
  `ID_PROFESI` int(11) NOT NULL,
  `NAMA_PROFESI` char(125) DEFAULT NULL,
  `GAJI_PER_BULAN` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profesi`
--

INSERT INTO `profesi` (`ID_PROFESI`, `NAMA_PROFESI`, `GAJI_PER_BULAN`) VALUES
(1, 'Programmer', 1800000),
(2, 'Sistem Analis', 3150000),
(3, 'Project Manager', 3825000),
(4, 'Tester', 2000000),
(5, 'Dokumentator', 1800000);

-- --------------------------------------------------------

--
-- Table structure for table `tim`
--

CREATE TABLE `tim` (
  `ID_TIM` int(11) NOT NULL,
  `NAMA_TIM` char(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tim`
--

INSERT INTO `tim` (`ID_TIM`, `NAMA_TIM`) VALUES
(1, 'Tim Aplikasi Pemilihan Online'),
(2, 'Tim Aplikasi Jalan Sehat'),
(3, 'Tim Aplikasi UCP'),
(4, 'Tim Aplikasi Chek Bahasa'),
(5, 'Tim Sistem Informasi Apartemen'),
(6, 'Tim ucp'),
(7, 'Tim fwa'),
(8, 'Tim sas'),
(9, 'Tim Aplikasi Estimasi Harga Perangkat Lunak'),
(10, 'Tim Aplikasi Estimasi Harga Perangkat Lunak'),
(11, 'Tim Aplikasi Estimasi Harga Perangkat Lunak'),
(12, 'Tim Aplikasi Estimasi Harga Perangkat Lunak'),
(13, 'Tim sas'),
(14, 'Tim Aplikasi Estimasi Harga Perangkat Lunak');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL,
  `NAMA` char(125) DEFAULT NULL,
  `USERNAME` char(125) DEFAULT NULL,
  `EMAIL` varchar(125) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `ROLE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_USER`, `NAMA`, `USERNAME`, `EMAIL`, `PASSWORD`, `ROLE`) VALUES
(2, 'Administrator', 'admin', NULL, '21232f297a57a5a743894a0e4a801fc3', 1),
(5, 'Aula Ayubi2', 'sekretaris', 'danangary13@gmail.com', '893d376739371ea724608e8d2ab96cee', 4),
(6, 'Affas', 'analis', 'danangary13@gmail.com', '6f7cf810b9252805f195bcf981156af6', 3),
(7, 'Fathurahman', 'sekertaris', 'fananifaiz@yahoo.com', '893d376739371ea724608e8d2ab96cee', 4),
(8, 'Danang', 'danang', 'nope@nope.com', '4fbfd324f5ffcdff5dbf6f019b02eca8', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`ID_AKTIVITAS`),
  ADD KEY `FK_REFERENCE_11` (`ID_PROFESI`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`ID_ANGGOTA`),
  ADD KEY `FK_REFERENCE_15` (`ID_PROFESI`);

--
-- Indexes for table `anggota_tim`
--
ALTER TABLE `anggota_tim`
  ADD PRIMARY KEY (`ID_ANGGOTA_TIM`),
  ADD KEY `Fk_tim` (`ID_TIM`),
  ADD KEY `fk_anggota` (`ID_ANGGOTA`);

--
-- Indexes for table `aplikasi`
--
ALTER TABLE `aplikasi`
  ADD PRIMARY KEY (`ID_APLIKASI`),
  ADD KEY `FK_REFERENCE_12` (`ID_TIM`),
  ADD KEY `FK_CLIENT` (`ID_CLIENT`);

--
-- Indexes for table `biaya_op`
--
ALTER TABLE `biaya_op`
  ADD PRIMARY KEY (`ID_OP`),
  ADD KEY `fk_id_aplikasi` (`ID_APLIKASI`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID_CLIENT`);

--
-- Indexes for table `fitur`
--
ALTER TABLE `fitur`
  ADD PRIMARY KEY (`ID_FITUR`),
  ADD KEY `fk_id_aplikasi_fitur` (`ID_APLIKASI`);

--
-- Indexes for table `log_aktor`
--
ALTER TABLE `log_aktor`
  ADD PRIMARY KEY (`ID_LOG_A`),
  ADD KEY `FK_REFERENCE_3` (`ID_APLIKASI`),
  ADD KEY `FK_REFERENCE_4` (`ID_P_A`);

--
-- Indexes for table `log_biaya`
--
ALTER TABLE `log_biaya`
  ADD PRIMARY KEY (`ID_LOG_BIAYA`),
  ADD KEY `FK_REFERENCE_10` (`ID_AKTIVITAS`),
  ADD KEY `FK_REFERENCE_9` (`ID_APLIKASI`);

--
-- Indexes for table `log_indikator_ecf`
--
ALTER TABLE `log_indikator_ecf`
  ADD PRIMARY KEY (`ID_LOG_ECF`),
  ADD KEY `FK_REFERENCE_5` (`ID_P_ECF`),
  ADD KEY `FK_REFERENCE_6` (`ID_APLIKASI`);

--
-- Indexes for table `log_indikator_tcf`
--
ALTER TABLE `log_indikator_tcf`
  ADD PRIMARY KEY (`ID_LOG_TCF`),
  ADD KEY `FK_REFERENCE_7` (`ID_APLIKASI`),
  ADD KEY `FK_REFERENCE_8` (`ID_P_TCF`);

--
-- Indexes for table `log_konstanta_effort`
--
ALTER TABLE `log_konstanta_effort`
  ADD PRIMARY KEY (`ID_K_EFFORT`);

--
-- Indexes for table `log_use_case`
--
ALTER TABLE `log_use_case`
  ADD PRIMARY KEY (`ID_LOG_UC`),
  ADD KEY `FK_REFERENCE_1` (`ID_APLIKASI`),
  ADD KEY `FK_REFERENCE_2` (`ID_P_UC`);

--
-- Indexes for table `pembobotan_aktor`
--
ALTER TABLE `pembobotan_aktor`
  ADD PRIMARY KEY (`ID_P_A`);

--
-- Indexes for table `pembobotan_ecf`
--
ALTER TABLE `pembobotan_ecf`
  ADD PRIMARY KEY (`ID_P_ECF`);

--
-- Indexes for table `pembobotan_tcf`
--
ALTER TABLE `pembobotan_tcf`
  ADD PRIMARY KEY (`ID_P_TCF`);

--
-- Indexes for table `pembobotan_use_case`
--
ALTER TABLE `pembobotan_use_case`
  ADD PRIMARY KEY (`ID_P_UC`);

--
-- Indexes for table `profesi`
--
ALTER TABLE `profesi`
  ADD PRIMARY KEY (`ID_PROFESI`);

--
-- Indexes for table `tim`
--
ALTER TABLE `tim`
  ADD PRIMARY KEY (`ID_TIM`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `ID_AKTIVITAS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `ID_ANGGOTA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `anggota_tim`
--
ALTER TABLE `anggota_tim`
  MODIFY `ID_ANGGOTA_TIM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `aplikasi`
--
ALTER TABLE `aplikasi`
  MODIFY `ID_APLIKASI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `biaya_op`
--
ALTER TABLE `biaya_op`
  MODIFY `ID_OP` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `ID_CLIENT` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `fitur`
--
ALTER TABLE `fitur`
  MODIFY `ID_FITUR` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `log_aktor`
--
ALTER TABLE `log_aktor`
  MODIFY `ID_LOG_A` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `log_biaya`
--
ALTER TABLE `log_biaya`
  MODIFY `ID_LOG_BIAYA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=429;

--
-- AUTO_INCREMENT for table `log_indikator_ecf`
--
ALTER TABLE `log_indikator_ecf`
  MODIFY `ID_LOG_ECF` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `log_indikator_tcf`
--
ALTER TABLE `log_indikator_tcf`
  MODIFY `ID_LOG_TCF` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `log_konstanta_effort`
--
ALTER TABLE `log_konstanta_effort`
  MODIFY `ID_K_EFFORT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `log_use_case`
--
ALTER TABLE `log_use_case`
  MODIFY `ID_LOG_UC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pembobotan_aktor`
--
ALTER TABLE `pembobotan_aktor`
  MODIFY `ID_P_A` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembobotan_ecf`
--
ALTER TABLE `pembobotan_ecf`
  MODIFY `ID_P_ECF` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembobotan_tcf`
--
ALTER TABLE `pembobotan_tcf`
  MODIFY `ID_P_TCF` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `pembobotan_use_case`
--
ALTER TABLE `pembobotan_use_case`
  MODIFY `ID_P_UC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profesi`
--
ALTER TABLE `profesi`
  MODIFY `ID_PROFESI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tim`
--
ALTER TABLE `tim`
  MODIFY `ID_TIM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD CONSTRAINT `FK_REFERENCE_11` FOREIGN KEY (`ID_PROFESI`) REFERENCES `profesi` (`ID_PROFESI`);

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `FK_REFERENCE_15` FOREIGN KEY (`ID_PROFESI`) REFERENCES `profesi` (`ID_PROFESI`);

--
-- Constraints for table `anggota_tim`
--
ALTER TABLE `anggota_tim`
  ADD CONSTRAINT `Fk_tim` FOREIGN KEY (`ID_TIM`) REFERENCES `tim` (`ID_TIM`),
  ADD CONSTRAINT `fk_anggota` FOREIGN KEY (`ID_ANGGOTA`) REFERENCES `anggota` (`ID_ANGGOTA`);

--
-- Constraints for table `aplikasi`
--
ALTER TABLE `aplikasi`
  ADD CONSTRAINT `FK_CLIENT` FOREIGN KEY (`ID_CLIENT`) REFERENCES `client` (`ID_CLIENT`),
  ADD CONSTRAINT `FK_REFERENCE_12` FOREIGN KEY (`ID_TIM`) REFERENCES `tim` (`ID_TIM`);

--
-- Constraints for table `biaya_op`
--
ALTER TABLE `biaya_op`
  ADD CONSTRAINT `fk_id_aplikasi` FOREIGN KEY (`ID_APLIKASI`) REFERENCES `aplikasi` (`ID_APLIKASI`);

--
-- Constraints for table `fitur`
--
ALTER TABLE `fitur`
  ADD CONSTRAINT `fk_id_aplikasi_fitur` FOREIGN KEY (`ID_APLIKASI`) REFERENCES `aplikasi` (`ID_APLIKASI`);

--
-- Constraints for table `log_aktor`
--
ALTER TABLE `log_aktor`
  ADD CONSTRAINT `FK_REFERENCE_3` FOREIGN KEY (`ID_APLIKASI`) REFERENCES `aplikasi` (`ID_APLIKASI`),
  ADD CONSTRAINT `FK_REFERENCE_4` FOREIGN KEY (`ID_P_A`) REFERENCES `pembobotan_aktor` (`ID_P_A`);

--
-- Constraints for table `log_biaya`
--
ALTER TABLE `log_biaya`
  ADD CONSTRAINT `FK_REFERENCE_10` FOREIGN KEY (`ID_AKTIVITAS`) REFERENCES `aktivitas` (`ID_AKTIVITAS`),
  ADD CONSTRAINT `FK_REFERENCE_9` FOREIGN KEY (`ID_APLIKASI`) REFERENCES `aplikasi` (`ID_APLIKASI`);

--
-- Constraints for table `log_indikator_ecf`
--
ALTER TABLE `log_indikator_ecf`
  ADD CONSTRAINT `FK_REFERENCE_5` FOREIGN KEY (`ID_P_ECF`) REFERENCES `pembobotan_ecf` (`ID_P_ECF`),
  ADD CONSTRAINT `FK_REFERENCE_6` FOREIGN KEY (`ID_APLIKASI`) REFERENCES `aplikasi` (`ID_APLIKASI`);

--
-- Constraints for table `log_indikator_tcf`
--
ALTER TABLE `log_indikator_tcf`
  ADD CONSTRAINT `FK_REFERENCE_7` FOREIGN KEY (`ID_APLIKASI`) REFERENCES `aplikasi` (`ID_APLIKASI`),
  ADD CONSTRAINT `FK_REFERENCE_8` FOREIGN KEY (`ID_P_TCF`) REFERENCES `pembobotan_tcf` (`ID_P_TCF`);

--
-- Constraints for table `log_use_case`
--
ALTER TABLE `log_use_case`
  ADD CONSTRAINT `FK_REFERENCE_1` FOREIGN KEY (`ID_APLIKASI`) REFERENCES `aplikasi` (`ID_APLIKASI`),
  ADD CONSTRAINT `FK_REFERENCE_2` FOREIGN KEY (`ID_P_UC`) REFERENCES `pembobotan_use_case` (`ID_P_UC`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
