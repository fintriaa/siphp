-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2022 at 11:21 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsiphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst_pegawai`
--

CREATE TABLE `mst_pegawai` (
  `nip_lama` varchar(9) NOT NULL,
  `nip_baru` varchar(30) NOT NULL,
  `nama_pegawai` varchar(80) NOT NULL,
  `gol_kd` int(11) NOT NULL,
  `tmt` date NOT NULL,
  `jabatan_kd` int(11) NOT NULL,
  `ket_jabatan` varchar(50) NOT NULL,
  `pendidikan_kd` int(11) NOT NULL,
  `tahun_pdd` year(4) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `satker_kd` varchar(4) NOT NULL,
  `es3_kd` varchar(4) NOT NULL,
  `es4_kd` varchar(2) NOT NULL,
  `fungsional_kd` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akses_menu`
--

CREATE TABLE `tbl_akses_menu` (
  `id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `view_level` enum('Y','N') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_akses_menu`
--

INSERT INTO `tbl_akses_menu` (`id`, `level_id`, `menu_id`, `view_level`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Y', NULL, '2022-06-28 13:20:03', NULL),
(2, 1, 2, 'Y', NULL, '2022-06-28 13:20:03', NULL),
(3, 1, 3, 'Y', NULL, '2022-06-28 13:20:03', NULL),
(4, 1, 4, 'Y', NULL, '2022-06-28 13:20:03', NULL),
(5, 7, 1, 'Y', NULL, '2022-06-28 13:34:05', NULL),
(6, 7, 2, 'Y', NULL, '2022-06-28 13:34:05', NULL),
(7, 7, 3, 'N', NULL, '2022-06-28 13:34:05', NULL),
(8, 7, 4, 'N', NULL, '2022-06-28 13:34:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akses_submenu`
--

CREATE TABLE `tbl_akses_submenu` (
  `id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `submenu_id` int(11) NOT NULL,
  `view_level` enum('Y','N') NOT NULL,
  `add_level` enum('Y','N') NOT NULL,
  `delete_level` enum('Y','N') NOT NULL,
  `edit_level` enum('Y','N') NOT NULL,
  `print_level` enum('Y','N') NOT NULL,
  `upload_level` enum('Y','N') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_akses_submenu`
--

INSERT INTO `tbl_akses_submenu` (`id`, `level_id`, `submenu_id`, `view_level`, `add_level`, `delete_level`, `edit_level`, `print_level`, `upload_level`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', NULL, NULL, NULL),
(2, 1, 2, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', NULL, NULL, NULL),
(3, 1, 3, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', NULL, NULL, NULL),
(4, 1, 4, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', NULL, NULL, NULL),
(5, 1, 5, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', NULL, NULL, NULL),
(6, 1, 6, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', NULL, NULL, NULL),
(7, 1, 7, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', NULL, NULL, NULL),
(8, 1, 8, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', NULL, NULL, NULL),
(9, 7, 1, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', NULL, '2022-06-28 13:34:05', NULL),
(10, 7, 2, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', NULL, '2022-06-28 13:34:05', NULL),
(11, 7, 3, 'N', 'N', 'N', 'N', 'N', 'N', NULL, '2022-06-28 13:34:05', NULL),
(12, 7, 4, 'N', 'N', 'N', 'N', 'N', 'N', NULL, '2022-06-28 13:34:05', NULL),
(13, 7, 5, 'N', 'N', 'N', 'N', 'N', 'N', NULL, '2022-06-28 13:34:05', NULL),
(14, 7, 6, 'N', 'N', 'N', 'N', 'N', 'N', NULL, '2022-06-28 13:34:05', NULL),
(15, 7, 7, 'N', 'N', 'N', 'N', 'N', 'N', NULL, '2022-06-28 13:34:05', NULL),
(16, 7, 8, 'N', 'N', 'N', 'N', 'N', 'N', NULL, '2022-06-28 13:34:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akses_user_level`
--

CREATE TABLE `tbl_akses_user_level` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_akses_user_level`
--

INSERT INTO `tbl_akses_user_level` (`id`, `user_id`, `level_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 8, NULL, NULL, NULL),
(2, 2, 5, NULL, NULL, NULL),
(3, 3, 5, NULL, NULL, NULL),
(4, 4, 7, NULL, NULL, NULL),
(5, 5, 5, NULL, NULL, NULL),
(6, 6, 9, NULL, NULL, NULL),
(7, 7, 7, NULL, NULL, NULL),
(8, 8, 2, NULL, NULL, NULL),
(9, 9, 3, NULL, NULL, NULL),
(10, 10, 7, NULL, NULL, NULL),
(11, 11, 7, NULL, NULL, NULL),
(12, 12, 6, NULL, NULL, NULL),
(13, 13, 7, NULL, NULL, NULL),
(14, 14, 7, NULL, NULL, NULL),
(15, 15, 4, NULL, NULL, NULL),
(16, 16, 3, NULL, NULL, NULL),
(17, 17, 7, NULL, NULL, NULL),
(18, 18, 7, NULL, NULL, NULL),
(19, 19, 7, NULL, NULL, NULL),
(20, 20, 3, NULL, NULL, NULL),
(21, 21, 7, NULL, NULL, NULL),
(22, 22, 7, NULL, NULL, NULL),
(23, 23, 7, NULL, NULL, NULL),
(24, 24, 7, NULL, NULL, NULL),
(25, 25, 7, NULL, NULL, NULL),
(26, 26, 7, NULL, NULL, NULL),
(27, 27, 7, NULL, NULL, NULL),
(28, 28, 7, NULL, NULL, NULL),
(29, 29, 7, NULL, NULL, NULL),
(30, 30, 7, NULL, NULL, NULL),
(31, 31, 7, NULL, NULL, NULL),
(32, 32, 7, NULL, NULL, NULL),
(33, 33, 6, NULL, NULL, NULL),
(34, 34, 6, NULL, NULL, NULL),
(35, 35, 7, NULL, NULL, NULL),
(36, 37, 5, NULL, NULL, NULL),
(37, 38, 7, NULL, NULL, NULL),
(38, 39, 7, NULL, NULL, NULL),
(39, 40, 6, NULL, NULL, NULL),
(40, 41, 7, NULL, NULL, NULL),
(41, 42, 6, NULL, NULL, NULL),
(42, 43, 7, NULL, NULL, NULL),
(43, 44, 6, NULL, NULL, NULL),
(44, 45, 7, NULL, NULL, NULL),
(45, 46, 8, NULL, NULL, NULL),
(46, 47, 6, NULL, NULL, NULL),
(47, 48, 7, NULL, NULL, NULL),
(48, 49, 7, NULL, NULL, NULL),
(49, 50, 6, NULL, NULL, NULL),
(50, 51, 7, NULL, NULL, NULL),
(51, 52, 6, NULL, NULL, NULL),
(52, 53, 7, NULL, NULL, NULL),
(53, 54, 7, NULL, NULL, NULL),
(54, 55, 5, NULL, NULL, NULL),
(55, 56, 7, NULL, NULL, NULL),
(56, 57, 7, NULL, NULL, NULL),
(57, 58, 6, NULL, NULL, NULL),
(58, 59, 6, NULL, NULL, NULL),
(59, 60, 7, NULL, NULL, NULL),
(60, 61, 6, NULL, NULL, NULL),
(61, 62, 7, NULL, NULL, NULL),
(62, 63, 5, NULL, NULL, NULL),
(63, 64, 6, NULL, NULL, NULL),
(64, 65, 7, NULL, NULL, NULL),
(65, 66, 6, NULL, NULL, NULL),
(66, 67, 7, NULL, NULL, NULL),
(67, 68, 7, NULL, NULL, NULL),
(68, 69, 6, NULL, NULL, NULL),
(69, 70, 7, NULL, NULL, NULL),
(70, 71, 1, NULL, NULL, NULL),
(71, 72, 10, NULL, NULL, NULL),
(72, 73, 11, NULL, NULL, NULL),
(73, 74, 7, NULL, NULL, NULL),
(74, 75, 3, NULL, NULL, NULL),
(75, 76, 7, NULL, NULL, NULL),
(76, 77, 7, NULL, NULL, NULL),
(77, 78, 7, NULL, NULL, NULL),
(78, 79, 7, NULL, NULL, NULL),
(79, 80, 7, NULL, NULL, NULL),
(80, 81, 7, NULL, NULL, NULL),
(81, 82, 7, NULL, NULL, NULL),
(82, 83, 7, NULL, NULL, NULL),
(83, 84, 7, NULL, NULL, NULL),
(84, 86, 7, NULL, NULL, NULL),
(85, 70, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(30) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `urutan` int(11) NOT NULL,
  `is_active` enum('Y','N') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `nama_menu`, `link`, `icon`, `urutan`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dashboard', '/dashboard', 'fas fa-tachometer-alt', 1, 'Y', NULL, '2022-06-28 13:19:17', NULL),
(2, 'Laporan Harian', '#', 'fas fa-book', 2, 'Y', NULL, '2022-06-23 19:12:13', NULL),
(3, 'Kelola Master', '#', 'fas fa-users', 3, 'Y', NULL, NULL, NULL),
(4, 'Sistem', '#', 'fas fa-desktop', 4, 'Y', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_submenu`
--

CREATE TABLE `tbl_submenu` (
  `id` int(11) NOT NULL,
  `nama_submenu` varchar(30) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `link` varchar(50) NOT NULL,
  `is_active` enum('Y','N') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_submenu`
--

INSERT INTO `tbl_submenu` (`id`, `nama_submenu`, `menu_id`, `link`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Daftar Laporan', 2, '/listLaporan', 'Y', NULL, NULL, NULL),
(2, 'Input Kegiatan', 2, '/inputKegiatan', 'Y', NULL, NULL, NULL),
(3, 'Master User', 3, '/masterUser', 'Y', NULL, NULL, NULL),
(4, 'Master Pegawai', 3, '/masterPegawai', 'Y', NULL, NULL, NULL),
(5, 'Master Kegiatan', 3, '/masterKegiatan', 'Y', NULL, NULL, NULL),
(6, 'Kelola Level', 4, '/kelolaLevel', 'Y', NULL, NULL, NULL),
(7, 'Kelola Menu', 4, '/kelolaMenu', 'Y', NULL, NULL, NULL),
(8, 'Kelola Sub Menu', 4, '/kelolaSubMenu', 'Y', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `nip_lama_user` varchar(9) NOT NULL,
  `is_active` enum('Y','N') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `fullname`, `email`, `password`, `token`, `image`, `nip_lama_user`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'agus_sudibyo', 'Agus Sudibyo, M.Stat', 'agus_sudibyo@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340015309', 'Y', NULL, NULL, NULL),
(2, 'susiawati', 'Susiawati Kristiarini, S.ST', 'susiawati@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340015731', 'Y', NULL, NULL, NULL),
(3, 'sisilia', 'Sisilia Nurteta, S.ST., M.Si.', 'sisilia@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340016277', 'Y', NULL, NULL, NULL),
(4, 'oeli', 'Oeliestina, S.ST', 'oeli@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340016973', 'Y', NULL, NULL, NULL),
(5, 'noprian', 'Nopriansyah, S.ST., M.Si.', 'noprian@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340016975', 'Y', NULL, NULL, NULL),
(6, 'syarpan', 'Syarpan Dani, SE.', 'syarpan@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340013141', 'Y', NULL, NULL, NULL),
(7, 'sutino', 'Sutino, SE.', 'sutino@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340014682', 'Y', NULL, NULL, NULL),
(8, 'dwiutami', 'Dwi Utaminingsih, S.Psi, MM.', 'dwiutami@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340054647', 'Y', NULL, NULL, NULL),
(9, 'baktian', 'Baktian Nurmantyo, S.Si., M.E.', 'baktian@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340015999', 'Y', NULL, NULL, NULL),
(10, 'afria', 'Afriyanti, M.E.', 'afria@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340017147', 'Y', NULL, NULL, NULL),
(11, 'eka.sari', 'Eka Putri Maya Sari, S.ST.', 'eka.sari@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340058230', 'Y', NULL, NULL, NULL),
(12, 'ton', 'Hartono, S.Si., M.E.', 'ton@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340015473', 'Y', NULL, NULL, NULL),
(13, 'sitimar', 'Siti Marfuah, SE.', 'sitimar@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340018099', 'Y', NULL, NULL, NULL),
(14, 'virna', 'Virnancya Nuraini Yonathan, SH.', 'virna@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340054663', 'Y', NULL, NULL, NULL),
(15, 'gafur', 'Gafur, S.ST', 'gafur@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340016477', 'Y', NULL, NULL, NULL),
(16, 'marni', 'Sumarni', 'marni@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '50065439', 'Y', NULL, NULL, NULL),
(17, 'herli', 'Herlina, SE.', 'herli@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340013114', 'Y', NULL, NULL, NULL),
(18, 'mitha', 'Mitha Rama Sari, SE.', 'miftha@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340017517', 'Y', NULL, NULL, NULL),
(19, 'marisa', 'Marisa Hariani, A. Md.', 'marisa@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340051219', 'Y', NULL, NULL, NULL),
(20, 'murtado', 'Muhammad Murtado, SE.', 'murtado@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340018107', 'Y', NULL, NULL, NULL),
(21, 'wahyud', 'M. Wahyudi', 'wahyud@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340016846', 'Y', NULL, NULL, NULL),
(22, 'chai', 'Chaidir', 'chai@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340018936', 'Y', NULL, NULL, NULL),
(23, 'tuber', 'Tuberwanlastu, A.Md', 'tuber@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340054662', 'Y', NULL, NULL, NULL),
(24, 'juniar', 'Juniar, S.E.', 'juniar@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340014688', 'Y', NULL, NULL, NULL),
(25, 'nidyautami', 'Chumanidya Utami, S.Si.', 'nidyautami@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340056006', 'Y', NULL, NULL, NULL),
(26, 'hendr', 'Hendra, SE', 'hendr@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340053547', 'Y', NULL, NULL, NULL),
(27, 'sunandar', 'Sunandar, SE., M.Si.', 'sunandar@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340013729', 'Y', NULL, NULL, NULL),
(28, 'hermann', 'Herman M.', 'hermann@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340011363', 'Y', NULL, NULL, NULL),
(29, 'diyas', 'Diyas Marliyanda, S.E.', 'diyas@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340056007', 'Y', NULL, NULL, NULL),
(30, 'suardani', 'Ni Kadek Suardani, S.ST., M.S.E.', 'suardani@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340017830', 'Y', NULL, NULL, NULL),
(31, 'marintan', 'Juliana Marintan Siahaan, S.ST.', 'marintan@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340020005', 'Y', NULL, NULL, NULL),
(32, 'smuslih', 'Syaeful Muslih, S.Si.', 'smuslih@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340051346', 'Y', NULL, NULL, NULL),
(33, 'rifati', 'Rita Rif\'ati, S.ST., M.Si.', 'rifati@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340016170', 'Y', NULL, NULL, NULL),
(34, 'anidwi', 'Ani Dwi Nugraeni, S.ST.', 'anidwi@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340015872', 'Y', NULL, NULL, NULL),
(35, 'ririh', 'Ririh Jatismara, S.Si.', 'ririh@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340059164', 'Y', NULL, NULL, NULL),
(37, 'aidil', 'Aidil Adha, SE, ME.', 'aidil@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340014249', 'N', NULL, NULL, NULL),
(38, 'eviyana', 'Eviyana Atmanegara, S.ST., M.Stat.', 'eviyana@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340020078', 'Y', NULL, NULL, NULL),
(39, 'septie', 'Septie Wulandary, S.ST., M.Stat.', 'septie@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340050244', 'Y', NULL, NULL, NULL),
(40, 'eny', 'Eny Tristanti, S.ST, ME.', 'eny@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340016060', 'Y', NULL, NULL, NULL),
(41, 'vitaei', 'Vita Eisynta Dewi, S.E.', 'vitaei@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340018514', 'Y', NULL, NULL, NULL),
(42, 'poppi', 'Poppi Marini, M.Si.', 'poppi@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340016574', 'Y', NULL, NULL, NULL),
(43, 'marfuddin', 'Marfuddin, SE', 'marfuddin@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340011502', 'N', NULL, NULL, NULL),
(44, 'amad', 'Amad Safei, S.E.', 'amad@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340011895', 'Y', NULL, NULL, NULL),
(45, 'sasria', 'Hery Sasria, S.Si.', 'sasria@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340051166', 'Y', NULL, NULL, NULL),
(46, 'totoab', 'Toto Abdul Fatah, M.Si', 'totoab@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340015341', 'N', NULL, NULL, NULL),
(47, 'dwija', 'Dwi Jayanti, S.ST', 'dwija@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340019993', 'Y', NULL, NULL, NULL),
(48, 'sukir', 'Sukirman, S.E.', 'sukir@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340016381', 'Y', NULL, NULL, NULL),
(49, 'fuad', 'Fuad Hasyim', 'fuad@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340016847', 'Y', NULL, NULL, NULL),
(50, 'budihar', 'Budi Hartono, S.ST., M.Si.', 'budihar@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340050004', 'Y', NULL, NULL, NULL),
(51, 'dahian', 'Siti Nurhayati', 'dahian@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '50047740', 'Y', NULL, NULL, NULL),
(52, 'ipada', 'Fitria Ipada, S.ST.', 'ipada@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340019122', 'Y', NULL, NULL, NULL),
(53, 'annisa.ayu', 'Annisa Ayu Wulandari, S.Si.', 'annisa.ayu@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340059155', 'Y', NULL, NULL, NULL),
(54, 'hisam', 'Muhisam, S.ST.', 'hisam@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340013506', 'Y', NULL, NULL, NULL),
(55, 'kusriatmi', 'Dr. Ir. Kusriatmi, MP.', 'kusriatmi@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340014133', 'Y', NULL, NULL, NULL),
(56, 'gusmanita', 'Lisa Gusmanita, S.ST., M.E.', 'gusmanita@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340050143', 'Y', NULL, NULL, NULL),
(57, 'hapsari', 'Risma Hapsari, S.ST., M.Si.', 'hapsari@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340020064', 'Y', NULL, NULL, NULL),
(58, 'sumarmi', 'Sumarmi, S.ST, M.Si.', 'sumarmi@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340016187', 'Y', NULL, NULL, NULL),
(59, 'norindah', 'Nor Indah Fitriya Ningrum, S.ST., M.Stat.', 'norindah@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340016473', 'Y', NULL, NULL, NULL),
(60, 'jasman', 'Jasman, S.E., M.E.', 'jasman@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340010808', 'N', NULL, NULL, NULL),
(61, 'nicky', 'Nicky Rizkiansyah, S.ST', 'nicky@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340054171', 'Y', NULL, NULL, NULL),
(62, 'ryanpasca', 'Ryan Pasca Aulia, S.Stat.', 'ryanpasca@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340059165', 'Y', NULL, NULL, NULL),
(63, 'iman', 'Iman Karyadi, S.ST.', 'iman@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340013013', 'Y', NULL, NULL, NULL),
(64, 'theresa', 'Theresa Putri, S.ST', 'theresa@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340053273', 'Y', NULL, NULL, NULL),
(65, 'wulanagusp', 'Wulan Agus Pramita Sari, S.ST.', 'wulanagusp@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340056779', 'Y', NULL, NULL, NULL),
(66, 'aguswid', 'Agus Widodo, S.ST., M.Si.', 'aguswid@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340016475', 'Y', NULL, NULL, NULL),
(67, 'eli.minarni', 'Eli Minarni', 'eli.minarni@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340010449', 'N', NULL, NULL, NULL),
(68, 'rizkia', 'Rizki Ananda, S.ST.', 'rizkia@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340056760', 'N', NULL, NULL, NULL),
(69, 'sulvaria', 'Indah Sulvaria, S.ST., MBA.', 'sulvaria@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340054170', 'Y', NULL, NULL, NULL),
(70, 'sandy.pradana', 'Sandy Pradana, S.ST.', 'sandy.pradana@bps.go.id', '$2y$05$md/K5eteGypjsML1iuCDIephCxOQNiBLdQKnluidJwSI.2b55KeaK', '-', 'default.png', '340058485', 'Y', NULL, NULL, NULL),
(71, 'admin', 'Administrator', '', '$2y$05$VNl7qndhGNKUxxrk6npYyuh5sy7MPiz7mlkbTlfBXR7enLl9nTJYa', '-', 'default.png', '340099999', 'Y', NULL, NULL, NULL),
(72, 'bps1501', 'BPS Kabupaten Kerinci', '', '$2y$05$uHsL6/zurwh2Vl/BDGEYVuza2WRgkRvHoItHNzewOm8.lw0sV1qtG', '-', 'default.png', '', 'Y', NULL, NULL, NULL),
(73, 'sekretaris1500', 'Sekretaris BPS Provinsi Jambi', '', '$2y$05$fBRJ2cpsFo8LV5kisViQROG3TQ9NXv5ZPUzZPAPo0tTiSTz9eMSRu', '-', 'default.png', '', 'Y', NULL, NULL, NULL),
(74, 'linda.annisa', 'Linda Annisa SST', 'linda.annisa@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340057667', 'Y', NULL, NULL, NULL),
(75, 'liana', 'Liana A.Md', '', '$2y$05$QI92.VhoWMGnz4uXKPYr8e6/jK371TSJMo7yRehq09jj/ivLdI8TC', '-', 'default.png', '340054652', 'Y', NULL, NULL, NULL),
(76, 'uziroh', 'Uziroh A.Md', 'uziroh@bps.go.id', '$2y$05$mBas6TPVxjig4whXCi/WjOJ/JFuORqtt/UKjkHk55uieceeoo.XxS', '-', 'default.png', '340051365', 'Y', NULL, NULL, NULL),
(77, 'novam', 'Nova Moestafa, S.ST., M.Si.', 'novam@bps.go.id', '$2y$05$TBCt60BvcTK2XTbu62keQOAbP3VDxnzevGTZA15ifcR/lKGu0BgiS', '-', 'default.png', '340016976', 'Y', NULL, NULL, NULL),
(78, 'kuswan', 'Kuswan Gunanto, S.ST., M.Ec.Dev.', 'kuswan@bps.go.id', '$2y$05$BjVU0xBgTG8c1/9TokEW0OltaJLqvP5/SkEzZowPm/tSuX5WjYuby', '-', 'default.png', '340016200', 'Y', NULL, NULL, NULL),
(79, 'betty.woro', 'Betty Woro Pratiwi S.Si.', 'betty.woro@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340059156', 'Y', NULL, NULL, NULL),
(80, 'yarni', 'Yarni', 'yarni@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340011486', 'Y', NULL, NULL, NULL),
(81, 'marniala.larasati', 'Marniala Larasati Situmorang A.Md.Kb.N.', 'marniala.larasati@bps.go.id', '$2y$05$UmMBq5cOmFrfgsuKe.B76O7WBI01d2zJXpU7fbOBekccIsQ1MvEnK', '-', 'default.png', '340061101', 'Y', NULL, NULL, NULL),
(82, 'esuprapto', 'Eko Suprapto A.Md', 'esuprapto@bps.go.id', '$2y$05$fBRJ2cpsFo8LV5kisViQROG3TQ9NXv5ZPUzZPAPo0tTiSTz9eMSRu', '-', 'default.png', '340054648', 'Y', NULL, NULL, NULL),
(83, 'riani', 'Eva Riani, S.ST.,M.E.', 'riani@bps.go.id', '$2y$05$fBRJ2cpsFo8LV5kisViQROG3TQ9NXv5ZPUzZPAPo0tTiSTz9eMSRu', '-', 'default.png', '340016191', 'Y', NULL, NULL, NULL),
(84, 'vitalia', 'Vitalia Susanti SST, M.Si.', 'vitalia@bps.go.id', '$2y$05$pcVmpwocTNKHimcR.yYWpOMrOvUnr2YKsXWkttg0iczO8un4JVjmW', '-', 'default.png', '340016971', 'Y', NULL, NULL, NULL),
(86, 'sabriyanto', 'Sabriyanto, SH, MH', 'sabri.siaranpers@gmail.com', '$2y$05$BjVU0xBgTG8c1/9TokEW0OltaJLqvP5/SkEzZowPm/tSuX5WjYuby', '-', 'default.png', '150099801', 'Y', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id` int(11) NOT NULL,
  `nama_level` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id`, `nama_level`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrator', NULL, NULL, NULL),
(2, 'Kepegawaian', NULL, NULL, NULL),
(3, 'Keuangan', NULL, NULL, NULL),
(4, 'Pejabat Pembuat Komitmen', NULL, NULL, NULL),
(5, 'Koordinator Fungsi', NULL, NULL, NULL),
(6, 'Sub Koordinator Fungsi', NULL, NULL, NULL),
(7, 'Staf/ Pegawai', NULL, NULL, NULL),
(8, 'Kepala BPS Provinsi', NULL, NULL, NULL),
(9, 'Kabag Umum BPS Provinsi', NULL, NULL, NULL),
(10, 'Kepala BPS Kabupaten/Kota', NULL, NULL, NULL),
(11, 'Sekretaris Kepala BPS Provinsi', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mst_pegawai`
--
ALTER TABLE `mst_pegawai`
  ADD PRIMARY KEY (`nip_lama`);

--
-- Indexes for table `tbl_akses_menu`
--
ALTER TABLE `tbl_akses_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `tbl_akses_submenu`
--
ALTER TABLE `tbl_akses_submenu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `submenu_id` (`submenu_id`);

--
-- Indexes for table `tbl_akses_user_level`
--
ALTER TABLE `tbl_akses_user_level`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `level_id` (`level_id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_submenu`
--
ALTER TABLE `tbl_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `nip_lama_user` (`nip_lama_user`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_akses_menu`
--
ALTER TABLE `tbl_akses_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_akses_submenu`
--
ALTER TABLE `tbl_akses_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_akses_user_level`
--
ALTER TABLE `tbl_akses_user_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_submenu`
--
ALTER TABLE `tbl_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
