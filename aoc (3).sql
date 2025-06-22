-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2024 at 03:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenpemulihan`
--

CREATE TABLE `agenpemulihan` (
  `id_agen` varchar(10) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `JK` varchar(100) NOT NULL,
  `Umur` varchar(100) NOT NULL,
  `golonganumur` varchar(100) DEFAULT NULL,
  `Pekerjaan` varchar(100) NOT NULL,
  `Tahun` int(5) NOT NULL,
  `id_kelurahan` varchar(10) DEFAULT NULL,
  `NoHp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agenpemulihan`
--

INSERT INTO `agenpemulihan` (`id_agen`, `Nama`, `JK`, `Umur`, `golonganumur`, `Pekerjaan`, `Tahun`, `id_kelurahan`, `NoHp`) VALUES
('AP01', 'Mulyono', 'Laki-laki', '51', 'Lansia', 'BPD', 2024, 'kl53', '081123434434');

-- --------------------------------------------------------

--
-- Table structure for table `clientrehabilitasi`
--

CREATE TABLE `clientrehabilitasi` (
  `id_klien` varchar(10) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `JK` varchar(100) NOT NULL,
  `Umur` int(3) NOT NULL,
  `golonganumur` varchar(100) NOT NULL,
  `Pekerjaan` varchar(100) NOT NULL,
  `JenisZat` varchar(100) NOT NULL,
  `Kategori` varchar(100) NOT NULL,
  `Tahun` int(5) NOT NULL,
  `id_kelurahan` varchar(10) NOT NULL,
  `Tipe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clientrehabilitasi`
--

INSERT INTO `clientrehabilitasi` (`id_klien`, `Nama`, `JK`, `Umur`, `golonganumur`, `Pekerjaan`, `JenisZat`, `Kategori`, `Tahun`, `id_kelurahan`, `Tipe`) VALUES
('CL01', 'AH', 'Laki-laki', 21, 'Dewasa', 'Mahasiswa', 'Sabu', 'Sedang', 2024, 'kl06', 'Voluntary'),
('CL02', 'S', 'Laki-laki', 23, 'Dewasa', 'Karyawan Swasta', 'Multipel', 'Ringan', 2024, 'kl04', 'Voluntary');

-- --------------------------------------------------------

--
-- Table structure for table `desa_bersinar`
--

CREATE TABLE `desa_bersinar` (
  `id_desa_bersinar` varchar(10) NOT NULL,
  `id_kelurahan` varchar(10) NOT NULL,
  `tahun` int(5) DEFAULT NULL,
  `pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `desa_bersinar`
--

INSERT INTO `desa_bersinar` (`id_desa_bersinar`, `id_kelurahan`, `tahun`, `pic`) VALUES
('DB01', 'kl14', 2024, 'Fajar Dinarwoko'),
('DB02', 'kl127', 2024, 'Kusdiantoro');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `nama_kabupaten` varchar(100) NOT NULL,
  `latitude` decimal(10,7) NOT NULL,
  `longitude` decimal(10,7) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id_kabupaten`, `nama_kabupaten`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'Cilacap', -7.5741700, 108.9886100, '2024-12-02 21:11:58', '2024-12-21 02:08:30'),
(3, 'Cilacap', -7.7279890, 109.0059130, '2024-12-02 21:12:58', '2024-12-02 21:12:58'),
(4, 'Kabupaten Cilacap-2', -7.7279890, 109.0059130, '2024-12-02 21:17:57', '2024-12-21 19:17:32'),
(5, 'Kabupaten Cilacap', -7.7279890, 109.0059130, '2024-12-03 00:36:15', '2024-12-03 00:36:15'),
(6, 'Kabupaten Cilacap', -7.7279890, 109.0059130, '2024-12-03 00:36:36', '2024-12-03 00:36:36'),
(7, 'Kabupaten Cilacap', -7.7279890, 109.0059130, '2024-12-03 00:37:15', '2024-12-03 00:37:15'),
(8, 'Banyumas', -6.8888890, 109.1234560, '2024-11-28 05:49:18', '2024-12-21 02:07:27');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` varchar(100) NOT NULL,
  `id_kabupaten` varchar(100) NOT NULL,
  `nama_kecamatan` varchar(100) NOT NULL,
  `latitude` decimal(10,7) NOT NULL,
  `longitude` decimal(10,7) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `id_kabupaten`, `nama_kecamatan`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
('kc01', '1', 'Cilacap Tengah', 999.9999999, 928.0000000, '2024-12-10 03:18:49', '2024-12-10 03:18:49'),
('kc02', '1', 'Cilacap Utara', 999.9999999, 999.9999999, '2024-12-10 03:19:11', '2024-12-10 03:19:11'),
('kc03', '1', 'Cilacap Selatan ', 999.9999999, 999.9999999, '2024-12-10 03:19:53', '2024-12-10 03:19:53'),
('kc04', '1', 'Kampung Laut', 999.9999999, 999.9999999, '2024-12-10 03:20:15', '2024-12-10 03:20:15'),
('kc05', '1', 'Kesugihan', 999.9999999, 468.0000000, '2024-12-10 03:21:54', '2024-12-10 03:21:54'),
('kc06', '1', 'Maos', 944.0000000, 999.9999999, '2024-12-10 03:22:19', '2024-12-10 03:22:19'),
('kc07', '1', 'Sampang', 999.9999999, 999.9999999, '2024-12-10 03:22:47', '2024-12-10 03:22:47'),
('kc08', '1', 'Adipala', 999.9999999, 999.9999999, '2024-12-10 03:23:10', '2024-12-10 03:23:10'),
('kc09', '1', 'Binangun', 999.9999999, 999.9999999, '2024-12-10 03:24:08', '2024-12-10 03:32:38'),
('kc10', '1', 'Kroya', 999.9999999, 999.9999999, '2024-12-10 03:24:34', '2024-12-10 03:24:34'),
('kc11', '1', 'Nusawungu', 999.9999999, 999.9999999, '2024-12-10 03:24:56', '2024-12-10 03:24:56'),
('kc12', '1', 'Jeruklegi', 999.9999999, 999.9999999, '2024-12-10 03:25:20', '2024-12-22 02:26:46'),
('kc13', '1', 'Kawunganten', 999.9999999, 999.9999999, '2024-12-10 03:25:48', '2024-12-10 03:25:48'),
('kc14', '1', 'Bantarsari', 999.9999999, 848.0000000, '2024-12-10 03:27:06', '2024-12-10 03:27:06'),
('kc15', '1', 'Gandrungmangu', 999.9999999, 3.0000000, '2024-12-10 03:27:29', '2024-12-10 03:27:29'),
('kc16', '1', 'Sidareja', 6.0000000, 8.0000000, '2024-12-10 03:28:02', '2024-12-10 03:28:02'),
('kc17', '1', 'Kedungreja', 90.0000000, 898.0000000, '2024-12-10 03:28:31', '2024-12-10 03:28:31'),
('kc18', '1', 'Patimuan', 79.0000000, 87.0000000, '2024-12-10 03:28:53', '2024-12-10 03:28:53'),
('kc19', '1', 'Cipari', 2.0000000, 2.0000000, '2024-12-10 03:29:20', '2024-12-10 03:29:20'),
('kc20', '1', 'Karangpucung', 2.0000000, 3.0000000, '2024-12-10 03:29:40', '2024-12-10 03:29:40'),
('kc21', '1', 'Cimanggu', 8.0000000, 9.0000000, '2024-12-10 03:30:10', '2024-12-10 03:30:10'),
('kc22', '1', 'Majenang', 948.0000000, 849.0000000, '2024-12-10 03:30:44', '2024-12-10 03:30:44'),
('kc23', '1', 'Wanareja', 133.0000000, 12.0000000, '2024-12-10 03:31:02', '2024-12-10 03:31:02'),
('kc24', '1', 'Dayaehluhur', 7.0000000, 8.0000000, '2024-12-10 03:31:29', '2024-12-10 03:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kelurahan` varchar(10) NOT NULL,
  `id_kecamatan` varchar(100) DEFAULT NULL,
  `nama_kelurahan` varchar(100) DEFAULT NULL,
  `pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id_kelurahan`, `id_kecamatan`, `nama_kelurahan`, `pic`) VALUES
('kl01', 'kc01', 'Donan', 'Lurah Donan'),
('kl02', 'kc01', 'Gunungsimping', 'Lurah Gunungsimping'),
('kl03', 'kc01', 'Kutawaru', 'null'),
('kl04', 'kc01', 'Lomanis', 'null'),
('kl05', 'kc01', 'Sidanegara', 'null'),
('kl06', 'kc02', 'Gumilir', 'null'),
('kl07', 'kc02', 'Karangtalun', 'null'),
('kl08', 'kc02', 'Kebonmanis', 'null'),
('kl09', 'kc02', 'Mertasinga', 'null'),
('kl10', 'kc02', 'Tritih Kulon', 'null'),
('kl11', NULL, NULL, 'Fajar Dinarwoko'),
('kl114', 'kc11', 'Karangputat', 'null'),
('kl115', 'kc11', 'Karangsembung', 'null'),
('kl116', 'kc11', 'Karangtawang', 'null'),
('kl117', 'kc11', 'kedungbenda', 'null'),
('kl118', 'kc11', 'Klumprit', 'null'),
('kl119', 'kc11', 'nusawangkal', 'null'),
('kl12', 'kc03', 'Tambakreja', 'null'),
('kl120', 'kc11', 'nusawungu', 'null'),
('kl121', 'kc11', 'Purwodadi', 'null'),
('kl122', 'kc11', 'Sikanco', 'null'),
('kl123', 'kc12', 'Brebeg', 'null'),
('kl124', 'kc12', 'Cilibang', 'null'),
('kl125', 'kc12', 'citepus\r\n', 'null'),
('kl126', 'kc12', 'Jambusari', 'null'),
('kl127', 'kc12', 'Jeruk Legi Kulon', 'null'),
('kl128', 'kc12', 'Jeruklegi Wetan', 'null'),
('kl129', 'kc12', 'KarangkemiriJLG', 'null'),
('kl13', 'kc03', 'Sidakaya', 'null'),
('kl130', 'kc12', 'Mendala', 'null'),
('kl131', 'kc12', 'Prapagan', 'null'),
('kl132', 'kc12', 'Sawangan', 'null'),
('kl133', 'kc12', 'Sumingkir', 'null'),
('kl134', 'kc12', 'Tritih Lor\r\n', 'null'),
('kl135', 'kc12', 'Tritih Wetan', 'null'),
('kl136', 'kc13', 'Babakan', 'null'),
('kl137', 'kc13', 'Bojong', 'null'),
('kl138', 'kc13', 'Bringkeng', 'null'),
('kl139', 'kc13', 'Grugu', 'null'),
('kl14', 'kc03', 'Tegalkamulyan', 'null'),
('kl140', 'kc13', 'Kalijeruk', 'null'),
('kl141', 'kc13', 'Kawuganten', 'null'),
('kl142', 'kc13', 'Kawunganten Lor', 'null'),
('kl143', 'kc13', 'Kubangkangkung', 'null'),
('kl144', 'kc13', 'Mentasan', 'null'),
('kl145', 'kc13', 'Sarwadadi', 'null'),
('kl146', 'kc13', 'SidauripKWT', 'null'),
('kl147', 'kc13', 'Ujungmanik', 'null'),
('kl148', 'kc14', 'Bantarsari', 'null'),
('kl149', 'kc14', 'Binangun BTS', 'null'),
('kl15', 'kc03', 'Tegalreja', 'null'),
('kl150', 'kc14', 'Bulaksari', 'null'),
('kl151', 'kc14', 'Cikendondong', 'null'),
('kl152', 'kc14', 'Citembong', 'null'),
('kl153', 'kc14', 'Kamulyan ', 'null'),
('kl154', 'kc14', 'Kedungwadas', 'null'),
('kl155', 'kc14', 'Rawajaya', 'null'),
('kl156', 'Kc15', 'Bulusari', 'null'),
('kl157', 'kc15', 'Cinangsi', 'null'),
('kl158', 'Kc15', 'Cisumur', 'null'),
('kl159', 'Kc15', 'Gandrungmangu', 'null'),
('kl16', 'kc04', 'Klaces', 'null'),
('kl160', 'kc15', 'Gandrungmanis', 'null'),
('kl161', 'kc15', 'Gintungreja', 'null'),
('kl162', 'kc15', 'KaranganyarGM', 'null'),
('kl163', 'kc15', 'Karanggintung', 'null'),
('kl164', 'kc15', 'Kertajaya', 'null'),
('kl165', 'kc15', 'Layansari', 'null'),
('kl166', 'kc15', 'Muktisari', 'null'),
('kl167', 'kc15', 'Rungkang', 'null'),
('kl168', 'kc15', 'SidauripGM', 'null'),
('kl169', 'kc15', 'Wringinharjo', 'null'),
('kl17', 'kc04', 'Panikel', 'null'),
('kl170', 'kc16', 'Gunungreja', 'null'),
('kl171', 'kc16', 'Karanggedang', 'null'),
('kl172', 'kc16', 'Kunci', 'null'),
('kl173', 'kc16', 'Margasari', 'null'),
('kl174', 'kc16', 'Penyarang ', 'null'),
('kl175', 'kc16', 'Sidamulya', 'null'),
('kl176', 'kc16', 'Sidareja', 'null'),
('kl177', 'kc16', 'Sudagaran', 'null'),
('kl178', 'kc16', 'Tegalsari', 'null'),
('kl179', 'kc16', 'Tinggarjaya', 'null'),
('kl18', 'kc04', 'Ujungalang', 'null'),
('kl180', 'kc17', 'Bangunreja', 'null'),
('kl181', 'kc17', 'Bojongsari', 'null'),
('kl182', 'kc17', 'Bumireja', 'null'),
('kl183', 'kc17', 'Ciklapa', 'null'),
('kl184', 'kc17', 'Jatisari', 'null'),
('kl185', 'kc17', 'Kaliwungu', 'null'),
('kl186', 'kc17', 'Kedungreja', 'null'),
('kl187', 'kc17', 'Rejamulya', 'null'),
('kl188', 'kc17', 'SidanegaraKDJ', 'null'),
('kl189', 'kc17', 'TambakrejaKDJ', 'null'),
('kl19', 'kc04', 'ujunggagak', 'null'),
('kl190', 'kc17', 'TambaksariKDJ', 'null'),
('kl191', 'kc18', 'Bulupayung', 'null'),
('kl192', 'kc18', 'Cimrutu', 'null'),
('kl193', 'kc18', 'Cinyawang', 'null'),
('kl194', 'kc18', 'Patimuan', 'null'),
('kl195', 'kc18', 'Purwodadi', 'null'),
('kl196', 'kc18', 'Rawaapu', 'null'),
('kl197', 'kc18', 'Sidamukti', 'null'),
('kl198', 'kc19', 'Caruy', 'null'),
('kl199', 'kc19', 'Cipari', 'null'),
('kl20', 'kc05', 'Bulupayung', 'null'),
('kl200', 'kc19', 'Cisuru', 'null'),
('kl201', 'kc19', 'KarangrejaCPR', 'null'),
('kl202', 'kc19', 'Kutasari', 'null'),
('kl203', 'kc19', 'Mekarsari', 'null'),
('kl204', 'kc19', 'Mulyadadi', 'null'),
('kl205', 'kc19', 'Pegadingan', 'null'),
('kl206', 'kc19', 'Segaralangu', 'null'),
('kl207', 'kc19', 'Serang', 'null'),
('kl208', 'kc19', 'SidasariCPR', 'null'),
('kl209', 'kc20', 'Babagan', 'null'),
('kl21', 'kc05', 'Ciwuni', 'null'),
('kl210', 'kc20', 'Bengbulang', 'null'),
('kl211', 'kc20', 'Cidadap', 'null'),
('kl212', 'kc20', 'Ciporos', 'null'),
('kl213', 'kc20', 'Ciruyung', 'null'),
('kl214', 'kc20', 'Gunungtelu', 'null'),
('kl215', 'kc20', 'Karangpucung', 'null'),
('kl216', 'kc20', 'Pamulihan', 'null'),
('kl217', 'kc20', 'Pengawaren', 'null'),
('kl218', 'kc20', 'SidamulyaKPC', 'null'),
('kl219', 'kc20', 'Sindangbarang', 'null'),
('kl22', 'kc05', 'Dondong', 'null'),
('kl220', 'kc20', 'Surusunda', 'null'),
('kl221', 'kc20', 'Tayem', 'null'),
('kl222', 'kc20', 'Tayemtimur', 'null'),
('kl223', 'kc21', 'Bantarmangu', 'null'),
('kl224', 'kc21', 'Bantarpanjang', 'null'),
('kl225', 'kc21', 'Cibalung', 'null'),
('kl226', 'kc21', 'Cijati', 'null'),
('kl227', 'kc21', 'Cilempuyang', 'null'),
('kl228', 'kc21', 'Cimanggu', 'null'),
('kl229', 'kc21', 'Cisalak', 'null'),
('kl23', 'kc05', 'Jangrana', 'null'),
('kl230', 'kc21', 'KarangrejaCMG', 'null'),
('kl231', 'kc21', 'KarangsariCMG', 'null'),
('kl232', 'kc21', 'Kutabima', 'null'),
('kl233', 'kc21', 'Mandala', 'null'),
('kl234', 'kc21', 'Negarajati', 'null'),
('kl235', 'kc21', 'Panimbang', 'null'),
('kl236', 'kc21', 'Pesahangan', 'null'),
('kl237', 'kc21', 'Rejodadi', 'null'),
('kl238', 'kc22', 'Bener', 'null'),
('kl239', 'kc22', 'Boja', 'null'),
('kl24', 'kc05', 'Kalisabuk', 'null'),
('kl240', 'kc22', 'Cibeunying', 'null'),
('kl241', 'kc22', 'Cilopadang', 'null'),
('kl242', 'kc22', 'Jenang', 'null'),
('kl243', 'kc22', 'MulyadadiMJG', 'null'),
('kl244', 'kc22', 'Mulyasari', 'null'),
('kl245', 'kc22', 'Padangjaya', 'null'),
('kl246', 'kc22', 'Padangsari', 'null'),
('kl247', 'kc22', 'Pahonjean', 'null'),
('kl248', 'kc22', 'Pengadegan', 'null'),
('kl249', 'kc22', 'Sadabumi', 'null'),
('kl25', 'kc05', 'Karangjengkol', 'null'),
('kl250', 'kc22', 'Sadahayu', 'null'),
('kl251', 'kc22', 'Salebu', 'null'),
('kl252', 'kc22', 'Sepatnunggal', 'null'),
('kl253', 'kc22', 'Sindangsari', 'null'),
('kl254', 'kc22', 'Ujungbarang', 'null'),
('kl255', 'kc23', 'Adimulya', 'null'),
('kl256', 'kc23', 'Bantar', 'null'),
('kl257', 'kc23', 'Cigintung', 'null'),
('kl258', 'kc23', 'Cilongkrang', 'null'),
('kl259', 'kc23', 'Jambu', 'null'),
('kl26', 'kc05', 'Karangkandri', 'null'),
('kl260', 'kc23', 'Limbangan', 'null'),
('kl261', 'kc23', 'Madura', 'null'),
('kl262', 'kc23', 'Madusari', 'null'),
('kl263', 'kc23', 'Majingklak', 'null'),
('kl264', 'kc23', 'Malabar', 'null'),
('kl265', 'kc23', 'Palugon', 'null'),
('kl266', 'kc23', 'Purwasari', 'null'),
('kl267', 'kc23', 'SidamulyaWNR', 'null'),
('kl268', 'kc23', 'Tambaksari', 'null'),
('kl269', 'kc23', 'Tarisi', 'null'),
('kl27', 'kc05', 'Keleng', 'null'),
('kl270', 'kc23', 'Wanareja', 'null'),
('kl271', 'kc24', 'Bingkeng', 'null'),
('kl272', 'kc24', 'Bolang', 'null'),
('kl273', 'kc24', 'Cijeruk', 'null'),
('kl274', 'kc24', 'Cilumping', 'null'),
('kl275', 'kc24', 'Ciwalen', 'null'),
('kl276', 'kc24', 'Datar', 'null'),
('kl277', 'kc24', 'Dayeuhluhur', 'null'),
('kl278', 'kc24', 'Hanum', 'null'),
('kl279', 'kc24', 'Kutaagung', 'null'),
('kl28', 'kc05', 'Kesugihan', 'null'),
('kl280', 'kc24', 'Matenggeng', 'null'),
('kl281', 'kc24', 'Panulisan', 'null'),
('kl282', 'kc24', 'Panulisan Barat', 'null'),
('kl283', 'kc24', 'Panulisan Timur', 'null'),
('kl284', 'kc24', 'Sumpinghayu', 'null'),
('kl29', 'kc05', 'Kesugihan Kidul', 'null'),
('kl30', 'kc05', 'Kuripan', 'null'),
('kl31', 'kc05', 'Kuripan Kidul', 'null'),
('kl32', 'kc05', 'Menganti', 'null'),
('kl33', 'kc05', 'Pesanggrahan', 'null'),
('kl34', 'kc05', 'Planjan', 'null'),
('kl35', 'kc05', 'Slarang', 'null'),
('kl36', 'kc06', 'Glempang', 'null'),
('kl37', 'kc06', 'Kalijaran', 'null'),
('kl38', 'kc06', 'Karangkemiri', 'null'),
('kl39', 'kc06', 'Karangreja', 'null'),
('kl40', 'kc06', 'Karangrena', 'null'),
('kl41', 'kc06', 'Klapagada', 'null'),
('kl42', 'kc06', 'Maos Kidul', 'null'),
('kl43', 'kc06', 'Maos Lor', 'null'),
('kl44', 'kc06', 'Mernek', 'null'),
('kl45', 'kc06', 'Penisihan', 'null'),
('kl46', 'kc07', 'Brani', 'null'),
('kl47', 'kc07', 'Karangasem', 'null'),
('kl48', 'kc07', 'Karangjati', 'null'),
('kl49', 'kc07', 'Karangtengah', 'null'),
('kl50', 'kc07', 'Ketanggung', 'null'),
('kl51', 'kc07', 'Nusajati', 'null'),
('kl52', 'kc07', 'Paberasan', 'null'),
('kl53', 'kc07', 'Paketingan', 'null'),
('kl54', 'kc07', 'Sampang', 'null'),
('kl55', 'kc07', 'Sidasari', 'null'),
('kl56', 'kc08', 'Adipala', 'null'),
('kl57', 'kc08', 'Adiraja', 'null'),
('kl58', 'kc08', 'Adireja Kulon', 'null'),
('kl59', 'kc08', 'Adireja Wetan', 'null'),
('kl60', 'kc08', 'Bunton', 'null'),
('kl61', 'kc08', 'Doplang', 'null'),
('kl62', 'kc08', 'Glempangpasir', 'null'),
('kl63', 'kc08', 'Gombolharjo', 'null'),
('kl64', 'kc08', 'Kalikudi', 'null'),
('kl65', 'kc08', 'Karanganyar', 'null'),
('kl66', 'Karangbenda', 'Karangbenda', 'null'),
('kl67', 'kc08', 'Karangsari', 'null'),
('kl68', 'kc08', 'Pedasong', 'null'),
('kl69', 'kc08', 'Penggalang', 'null'),
('kl70', 'kc08', 'Welahan Wetan', 'null'),
('kl71', 'kc08', 'Wlahar', 'null'),
('kl72', 'kc09', 'Alangamba', 'null'),
('kl73', 'kc09', 'Bangkal', 'null'),
('kl74', 'kc09', 'Binangun', 'null'),
('kl75', 'kc09', 'Jati', 'null'),
('kl76', 'kc09', 'Jepara Kulon', 'null'),
('kl77', 'kc09', 'Jepara Wetan', 'null'),
('kl78', 'kc09', 'Karangnangka', 'null'),
('kl79', 'kc09', 'Kemojing', 'null'),
('kl80', 'kc09', 'kepudang', 'null'),
('kl81', 'kc9', 'pagubugan', 'null'),
('kl82', 'kc09', 'Pagubugan kulon', 'null'),
('kl83', 'kc09', 'Pasuruhan', 'null'),
('kl84', 'kc09', 'Pesawahan', 'null'),
('kl85', 'kc09', 'Sidaurip', 'null'),
('kl86', 'kc09', 'Sidaayu', 'null'),
('kl87', 'kc09', 'Widarapayung Kulon', 'null'),
('kl88', 'kc09', 'Widarapayung Wetan', 'null'),
('kl89', 'kc10', 'Ayamalas', 'null'),
('kl90', 'kc10', 'Bajing', 'null'),
('kl91', 'kc10', 'Bajing Kulon', 'null'),
('kl92', 'kc10', 'Buntu', 'null'),
('kl93', 'kc10', 'Gentasari', 'null'),
('kl94', 'kc10', 'Karangmangu', 'null'),
('kl95', 'kc10', 'Karangturi', 'null'),
('kl96', 'kc10', 'Kedawung', 'null'),
('kl97', 'kc10', 'Kroya', 'null'),
('kl98', 'kc10', 'Mergawati', 'null'),
('kl99', 'kc10', 'Mujur', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `kerawanan_kelurahan`
--

CREATE TABLE `kerawanan_kelurahan` (
  `id_kerawanan_kelurahan` int(4) NOT NULL,
  `id_kelurahan` varchar(5) NOT NULL,
  `id_tingkat_kerawanan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penggiat`
--

CREATE TABLE `penggiat` (
  `id_penggiat` varchar(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jk` varchar(100) DEFAULT NULL,
  `umur` int(3) DEFAULT NULL,
  `golonganumur` varchar(100) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `tahun` int(5) DEFAULT NULL,
  `id_kelurahan` varchar(10) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `lembaga` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penggiat`
--

INSERT INTO `penggiat` (`id_penggiat`, `nama`, `jk`, `umur`, `golonganumur`, `pekerjaan`, `tahun`, `id_kelurahan`, `nohp`, `lembaga`) VALUES
('PG01', 'Suharjo', 'Laki-laki', 42, 'Dewasa', 'Kepala Sekolah', 2024, 'kl06', '08977089291', 'SD Gumilir 01');

-- --------------------------------------------------------

--
-- Table structure for table `rts`
--

CREATE TABLE `rts` (
  `id_rts` varchar(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jk` varchar(100) DEFAULT NULL,
  `umur` int(3) DEFAULT NULL,
  `tahun` int(5) DEFAULT NULL,
  `id_kelurahan` varchar(10) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `asal_sekolah` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rts`
--

INSERT INTO `rts` (`id_rts`, `nama`, `jk`, `umur`, `tahun`, `id_kelurahan`, `nohp`, `asal_sekolah`) VALUES
('RTS01', 'Haikal ', 'Laki-laki', 14, 2024, 'kl06', '08977089291', 'SMP N 4 Cilacap'),
('RTS02', 'Nina', 'Perempuan', 13, 2024, 'kl11', '08131144646', 'SMP N 1 Cilacap');

-- --------------------------------------------------------

--
-- Table structure for table `tingkat_kerawanan`
--

CREATE TABLE `tingkat_kerawanan` (
  `id_tingkat_kerawanan` int(2) NOT NULL,
  `tingkat_kerawanan` varchar(15) NOT NULL,
  `warna` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tingkat_kerawanan`
--

INSERT INTO `tingkat_kerawanan` (`id_tingkat_kerawanan`, `tingkat_kerawanan`, `warna`) VALUES
(1, 'WASPADA', '#66e36c'),
(2, 'SIAGA', '#ede726'),
(3, 'RAWAN', '#ed1346');

-- --------------------------------------------------------

--
-- Table structure for table `ungkap_kasus`
--

CREATE TABLE `ungkap_kasus` (
  `id_kasus` varchar(15) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `JK` varchar(100) NOT NULL,
  `Umur` varchar(100) NOT NULL,
  `golonganumur` varchar(100) DEFAULT NULL,
  `Pekerjaan` varchar(100) NOT NULL,
  `BB` varchar(100) NOT NULL,
  `JmlBB` varchar(100) NOT NULL,
  `Satuan` varchar(100) NOT NULL,
  `MO` varchar(100) NOT NULL,
  `Tahun` int(5) NOT NULL,
  `id_kelurahan` varchar(5) DEFAULT NULL,
  `Jam` time NOT NULL,
  `TKP` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ungkap_kasus`
--

INSERT INTO `ungkap_kasus` (`id_kasus`, `Nama`, `JK`, `Umur`, `golonganumur`, `Pekerjaan`, `BB`, `JmlBB`, `Satuan`, `MO`, `Tahun`, `id_kelurahan`, `Jam`, `TKP`) VALUES
('U1', 'Robi Andrianto', 'Laki-laki', '24', 'Dewasa', 'Buruh', 'Sabu', '0.5', 'Gram', 'Pengguna', 2024, 'kl01', '13:00:00', 'Jl Brantas'),
('U2', 'Anggar', 'Laki-laki', '32', 'Dewasa', 'PNS', 'Sabu', '1', 'Gram', 'Pengedar', 2024, 'kl135', '20:00:00', 'madukara');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `hak_akses` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password_hash`, `nama`, `hak_akses`, `no_hp`, `is_active`) VALUES
('US01', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'all', '', 1),
('US02', 'kukuhj', 'fa5c00b81bf9bcb60d50043007731b54', 'Kukuh Jamaludin', 'pencegahan', '08977089291', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenpemulihan`
--
ALTER TABLE `agenpemulihan`
  ADD PRIMARY KEY (`id_agen`);

--
-- Indexes for table `clientrehabilitasi`
--
ALTER TABLE `clientrehabilitasi`
  ADD PRIMARY KEY (`id_klien`);

--
-- Indexes for table `desa_bersinar`
--
ALTER TABLE `desa_bersinar`
  ADD PRIMARY KEY (`id_desa_bersinar`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`);

--
-- Indexes for table `kerawanan_kelurahan`
--
ALTER TABLE `kerawanan_kelurahan`
  ADD PRIMARY KEY (`id_kerawanan_kelurahan`);

--
-- Indexes for table `penggiat`
--
ALTER TABLE `penggiat`
  ADD PRIMARY KEY (`id_penggiat`);

--
-- Indexes for table `rts`
--
ALTER TABLE `rts`
  ADD PRIMARY KEY (`id_rts`);

--
-- Indexes for table `tingkat_kerawanan`
--
ALTER TABLE `tingkat_kerawanan`
  ADD PRIMARY KEY (`id_tingkat_kerawanan`);

--
-- Indexes for table `ungkap_kasus`
--
ALTER TABLE `ungkap_kasus`
  ADD PRIMARY KEY (`id_kasus`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
