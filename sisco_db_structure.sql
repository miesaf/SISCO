-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 10.4.1.136:3306
-- Generation Time: Feb 06, 2020 at 09:29 AM
-- Server version: 10.2.24-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisco`
--

-- --------------------------------------------------------

--
-- Table structure for table `ADMINISTRATOR`
--

CREATE TABLE `ADMINISTRATOR` (
  `SA_ID` int(10) NOT NULL,
  `SA_PW` varchar(20) NOT NULL,
  `SA_NAME` varchar(50) NOT NULL,
  `SA_TYPE` varchar(4) NOT NULL DEFAULT 'TRNR'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ADMINISTRATOR`
--

INSERT INTO `ADMINISTRATOR` (`SA_ID`, `SA_PW`, `SA_NAME`, `SA_TYPE`) VALUES
(1, 'testteam', 'Test Team (Admin)', 'ROOT'),
(2, 'testteam', 'Test Team (Trainer)', 'TRNR'),

-- --------------------------------------------------------

--
-- Table structure for table `ANNOUNCEMENTS`
--

CREATE TABLE `ANNOUNCEMENTS` (
  `ANN_ID` varchar(50) NOT NULL,
  `ANN_TIME` datetime NOT NULL DEFAULT current_timestamp(),
  `ANN_AUTH` varchar(50) NOT NULL,
  `ANN_TITLE` varchar(50) NOT NULL,
  `ANN_CONTENT` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ANNOUNCEMENTS`
--

INSERT INTO `ANNOUNCEMENTS` (`ANN_ID`, `ANN_TIME`, `ANN_AUTH`, `ANN_TITLE`, `ANN_CONTENT`) VALUES
('beb722ea3b45de2b08cc7471ac3f469ecc6c1eab', '2015-09-27 00:42:29', 'Pentadbir Sistem', 'Markah Latihan Padang', 'Assalamualaikum. Para jurulatih dikehendaki memasukkan markah latihan padang pelajar bermula 20 September 2015 sehingga 1 Oktober 2015. Kerjasama para jurulatih amat kami hargai.'),
('63147a909ab3c2dbdfe4091ca3525d3382dc5e3c', '2015-09-27 00:42:50', 'Pentadbir Sistem', 'Markah Peperiksaan Akhir', 'Assalamualaikum. Para jurulatih dikehendaki memasukkan markah peperiksaan akhir pelajar bermula 20 September 2015 sehingga 1 Oktober 2015. Kerjasama para jurulatih amat kami hargai.'),
('5545c4652166f7e542f605cae2862c280f6f7173', '2015-09-27 00:43:11', 'Syed Sirajuddin Bin Syed Yahya', 'Makluman Kelas Ganti Kokurikulum', 'Perhatian kepada pelajar kokurikulum HBU114 (Persatuan Bulan Sabit Merah I) kelas JHBU114B, kelas ganti kokurikulum akan diadakan pada 26 September 2015 dari jam 10.00 pagi sehingga 12.00 tgh hari di U101.');

-- --------------------------------------------------------

--
-- Table structure for table `COURSE`
--

CREATE TABLE `COURSE` (
  `CR_ID` varchar(6) NOT NULL,
  `CR_NAME` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `COURSE`
--

INSERT INTO `COURSE` (`CR_ID`, `CR_NAME`) VALUES
('HBU111', 'Kesatria Negara I'),
('HBU112', 'Pertahanan Awam I'),
('HBU113', 'Kadet Bomba I'),
('HBU114', 'Persatuan Bulan Sabit Merah I'),
('HBU115', 'Kesatria Kembara I'),
('HBU116', 'Pancaragam I'),
('HBU121', 'Kesatria Negara II'),
('HBU122', 'Pertahanan Awam II'),
('HBU123', 'Kadet Bomba II'),
('HBU124', 'Persatuan Bulan Sabit Merah II'),
('HBU125', 'Kesatria Kembara II'),
('HBU126', 'Pancaragam II'),
('HBU131', 'Kesatria Negara III'),
('HBU132', 'Pertahanan Awam III'),
('HBU133', 'Kadet Bomba III'),
('HBU134', 'Persatuan Bulan Sabit Merah III'),
('HBU135', 'Kesatria Kembara III'),
('HBU136', 'Pancaragam III'),
('HKB112', 'Drama I'),
('HKB115', 'Seni Tari Tradisi & Kreatif I'),
('HKB118', 'Seni Silat Gayong Malaysia I'),
('HKB222', 'Drama II'),
('HKB225', 'Seni Tari Tradisi & Kreatif II'),
('HKB228', 'Seni Silat Gayong Malaysia II'),
('HKR111', 'Pengurusan Institusi Keluarga I'),
('HKR113', 'Pengurusan Institusi Masjid I'),
('HKR221', 'Pengurusan Institusi Keluarga II'),
('HKR223', 'Pengurusan Institusi Masjid II'),
('HPD111', 'Public Speaking I'),
('HPD112', 'Pengucapan Awam I'),
('HPD113', 'Debat Bahasa Malaysia I'),
('HPD114', 'Debat Bahasa Inggeris I'),
('HPD118', 'Kembara Usahawan (KEMUSA) I'),
('HPD119', 'Kaunseling Rakan Sebaya I'),
('HPD132', 'Pemikiran Pemimpin Negara I'),
('HPD133', 'Khidmat Masyarakat I'),
('HPD221', 'Public Speaking II'),
('HPD222', 'Pengucapan Awam II'),
('HPD223', 'Debat Bahasa Malaysia II'),
('HPD224', 'Debat Bahasa Inggeris II'),
('HPD228', 'Kembara Usahawan (KEMUSA) II'),
('HPD229', 'Kaunseling Rakan Sebaya II'),
('HPD232', 'Pemikiran Pemimpin Negara II'),
('HPD233', 'Khidmat Masyarakat II'),
('HSK114', 'Bola Baling I'),
('HSK116', 'Bola Jaring I'),
('HSK117', 'Bola Sepak I'),
('HSK224', 'Bola Baling II'),
('HSK226', 'Bola Jaring II'),
('HSK227', 'Bola Sepak II'),
('HSL111', 'Badminton I'),
('HSL118', 'Tenis I'),
('HSL119', 'Hoki I'),
('HSL221', 'Badminton II'),
('HSL228', 'Tenis II'),
('HSL229', 'Hoki II'),
('HSM111', 'Ragbi I'),
('HSM113', 'Taekwan-do I'),
('HSM221', 'Ragbi II'),
('HSM223', 'Taekwan-do II'),
('HSN113', 'Futsal I'),
('HSN223', 'Futsal II'),
('PDM111', 'Sukarelawan Polis (SUKSIS) I'),
('PDM121', 'Sukarelawan Polis (SUKSIS) II'),
('PDM131', 'Sukarelawan Polis (SUKSIS) III');

-- --------------------------------------------------------

--
-- Table structure for table `PROGRAM`
--

CREATE TABLE `PROGRAM` (
  `PR_ID` varchar(5) NOT NULL,
  `PR_NAME` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PROGRAM`
--

INSERT INTO `PROGRAM` (`PR_ID`, `PR_NAME`) VALUES
('AC110', 'Diploma Perakaunan'),
('AC220', 'Ijazah Sarjana Muda Perakaunan (Kepujian)'),
('BM111', 'Diploma Pengajian Perniagaan'),
('BM114', 'Diploma Analisis Pelaburan'),
('BM117', 'Diploma Pengajian Perniagaan (Pengankutan)'),
('BM119', 'Diploma Pengajian Perbankan'),
('BM220', 'Ijazah Sarjana Muda Pentadbiran Perniagaan (Kepujian) Pemasaran'),
('BM240', 'Ijazah Sarjana Muda Pemasaran'),
('BM242', 'Ijazah Sarjana Muda Kewangan'),
('BM249', 'Ijazah Sarjana Muda Perbankan Islam'),
('BM771', 'Ijazah Sarjana Pentadbiran Perniagaan (Eksekutif) (e-MBA)'),
('CS110', 'Diploma Sains Komputer'),
('CS113', 'Diploma Sains Kuantitatif'),
('CS143', 'Diploma Sains Matematik'),
('EC110', 'Diploma Kejuruteraan Awam'),
('EE110', 'Diploma Kejuruteraan Elektrik (Kawalan dan Instumentasi)'),
('EE111', 'Diploma Kejuruteraan Elektrik (Elektronik)'),
('EE112', 'Diploma Kejuruteraan Elektrik (Kuasa)'),
('EH110', 'Diploma Kejuruteraan Kimia'),
('EM110', 'Diploma Kejuruteraan Mekanikal'),
('IM110', 'Diploma Pengurusan Maklumat'),
('IM222', 'Ijazah Sarjana Muda (Sains) Pengurusan Rekod (Kepujian)'),
('IM226', 'Ijazah Sarjana Muda (Sains) Pengurusan Rekod (Kepujian)'),
('PD002', 'Pra-Perdagangan');

-- --------------------------------------------------------

--
-- Table structure for table `STUDENT`
--

CREATE TABLE `STUDENT` (
  `S_ID` int(10) NOT NULL,
  `S_NAME` varchar(50) NOT NULL,
  `S_IC` varchar(15) NOT NULL,
  `S_SEX` varchar(10) NOT NULL,
  `S_ADDR` text NOT NULL,
  `S_TEL` varchar(15) DEFAULT NULL,
  `S_MAIL` varchar(40) DEFAULT NULL,
  `S_RLTV` varchar(20) NOT NULL,
  `S_RVNR` varchar(15) NOT NULL,
  `S_SIZE` varchar(5) NOT NULL,
  `S_RLGN` varchar(20) NOT NULL,
  `S_PROG` varchar(5) NOT NULL,
  `S_PART` int(1) NOT NULL,
  `S_CRS` varchar(6) NOT NULL,
  `S_PLTN` varchar(8) NOT NULL,
  `S_RSDN` text NOT NULL,
  `S_BLOOD` varchar(11) NOT NULL,
  `S_HEALTH` text DEFAULT NULL,
  `S_ALGY` varchar(200) DEFAULT NULL,
  `S_FPNT` decimal(5,0) NOT NULL,
  `S_EXAM` decimal(5,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TRAINER`
--

CREATE TABLE `TRAINER` (
  `T_ID` int(10) NOT NULL,
  `T_SEX` varchar(10) NOT NULL,
  `T_NAME` varchar(50) NOT NULL,
  `T_IC` varchar(15) NOT NULL,
  `T_ADDR` text NOT NULL,
  `T_TEL` varchar(15) NOT NULL,
  `T_MAIL` varchar(40) DEFAULT NULL,
  `T_BANK` int(50) NOT NULL,
  `T_CRS` varchar(6) NOT NULL,
  `T_PLTN` varchar(8) NOT NULL,
  `T_EXP` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ADMINISTRATOR`
--
ALTER TABLE `ADMINISTRATOR`
  ADD PRIMARY KEY (`SA_ID`);

--
-- Indexes for table `ANNOUNCEMENTS`
--
ALTER TABLE `ANNOUNCEMENTS`
  ADD PRIMARY KEY (`ANN_ID`);

--
-- Indexes for table `COURSE`
--
ALTER TABLE `COURSE`
  ADD PRIMARY KEY (`CR_ID`);

--
-- Indexes for table `PROGRAM`
--
ALTER TABLE `PROGRAM`
  ADD PRIMARY KEY (`PR_ID`);

--
-- Indexes for table `STUDENT`
--
ALTER TABLE `STUDENT`
  ADD PRIMARY KEY (`S_ID`);

--
-- Indexes for table `TRAINER`
--
ALTER TABLE `TRAINER`
  ADD PRIMARY KEY (`T_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
