-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2024 at 06:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berkah-fashionku-satu`
--

-- --------------------------------------------------------

--
-- Table structure for table `beli_bahan_bakus`
--

CREATE TABLE `beli_bahan_bakus` (
  `kode_belibahanbaku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jumlahbeli` int(11) NOT NULL,
  `tgl_beli` date NOT NULL,
  `status_beli` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beli_bahan_bakus`
--

INSERT INTO `beli_bahan_bakus` (`kode_belibahanbaku`, `total_jumlahbeli`, `tgl_beli`, `status_beli`, `created_at`, `updated_at`) VALUES
('PBB-00001', 1010, '2024-01-18', 2, '2024-01-18 07:25:17', '2024-01-18 07:27:23'),
('PBB-00002', 100, '2024-01-18', 2, '2024-01-18 09:38:20', '2024-01-20 19:02:10'),
('PBB-00003', 300, '2024-01-21', 2, '2024-01-20 17:08:46', '2024-01-20 17:08:46'),
('PBB-00004', 600, '2024-01-21', 2, '2024-01-20 18:36:17', '2024-01-22 22:02:12'),
('PBB-00005', 10, '2024-01-23', 2, '2024-01-22 19:06:20', '2024-01-22 19:08:12'),
('PBB-00006', 100, '2024-01-23', 2, '2024-01-22 22:53:02', '2024-01-24 09:01:32'),
('PBB-00007', 1, '2024-01-24', 2, '2024-01-24 08:15:58', '2024-01-24 09:03:56'),
('PBB-00008', 1, '2024-01-24', 2, '2024-01-24 09:04:44', '2024-01-24 09:05:12'),
('PBB-00009', 5, '2024-01-25', 2, '2024-01-24 09:05:44', '2024-01-24 09:06:49'),
('PBB-00010', 12, '2024-01-25', 2, '2024-01-24 09:08:36', '2024-01-24 09:19:32'),
('PBB-00011', 2, '2024-01-25', 2, '2024-01-24 11:04:47', '2024-01-24 11:04:47'),
('PBB-00012', 500, '2024-01-26', 2, '2024-01-24 12:41:42', '2024-01-28 04:56:36'),
('PBB-00013', 150, '2024-01-28', 2, '2024-01-27 22:03:27', '2024-01-28 12:01:30'),
('PBB-00014', 10, '2024-01-28', 2, '2024-01-27 22:11:29', '2024-01-27 22:13:40'),
('PBB-00015', 100, '2024-01-28', 2, '2024-01-27 23:24:19', '2024-01-28 01:56:18'),
('PBB-00016', 12, '2024-01-28', 2, '2024-01-27 23:51:43', '2024-01-28 12:29:51'),
('PBB-00017', 30, '2024-01-29', 2, '2024-01-28 01:59:12', '2024-01-28 12:23:50'),
('PBB-00018', 3, '2024-01-28', 2, '2024-01-28 02:42:59', '2024-01-28 11:43:32'),
('PBB-00019', 12, '2024-01-29', 2, '2024-01-28 12:04:12', '2024-01-28 12:06:07'),
('PBB-00020', 30, '2024-01-29', 1, '2024-01-28 22:17:45', '2024-01-28 22:17:45'),
('PBB-00021', 400, '2024-02-18', 1, '2024-02-18 04:28:55', '2024-02-18 04:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `data_bahanbakus`
--

CREATE TABLE `data_bahanbakus` (
  `kode_bahanbaku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bahanbaku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_warna` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_satuan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_bahanbakus`
--

INSERT INTO `data_bahanbakus` (`kode_bahanbaku`, `nama_bahanbaku`, `kode_warna`, `kode_satuan`, `stok`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
('BB-00001', 'Kain Katun Hitam', 'WARNA-00001', 'SATUAN-00002', 6077, 'Tersedia di bagian cutting', 1, '2024-01-18 07:22:52', '2024-01-28 12:23:50'),
('BB-00002', 'Kain Katun Putih', 'WARNA-00002', 'SATUAN-00002', 880, 'Tersedia di bagian cutting', 1, '2024-01-18 07:23:08', '2024-01-28 12:29:51'),
('BB-00003', 'Kancing Bungkus Hitam', 'WARNA-00001', 'SATUAN-00005', 29, 'Tersedia di bagian jahit', 1, '2024-01-18 07:23:19', '2024-01-28 12:23:50'),
('BB-00004', 'Plastik Bening', 'WARNA-00008', 'SATUAN-00003', 5, NULL, 1, '2024-01-28 12:03:34', '2024-01-28 12:06:07');

-- --------------------------------------------------------

--
-- Table structure for table `data_produks`
--

CREATE TABLE `data_produks` (
  `kode_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_warna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_ukuran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_produks`
--

INSERT INTO `data_produks` (`kode_produk`, `nama_produk`, `kode_warna`, `kode_ukuran`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
('PRODUK-00001', 'Kemeja Salur Hitam All size', 'WARNA-00001', 'UKURAN-00005', 'Memerlukan kain sebanyak 1.444 Yard Atau 132cm', 1, '2024-01-18 07:13:23', '2024-01-18 07:13:47'),
('PRODUK-00002', 'Gamis Anak Putih U 7-10', 'WARNA-00002', 'UKURAN-00001', 'Membutuhkan 1.587 Yard Atau 145cm', 1, '2024-01-18 07:17:34', '2024-01-18 07:17:34'),
('PRODUK-00003', 'Blazer Hitam All Size', 'WARNA-00001', 'UKURAN-00005', 'Membutuhkan 1.31 Yard atau 120cm', 1, '2024-01-18 07:20:17', '2024-01-18 07:20:17'),
('PRODUK-00004', 'A', 'WARNA-00005', 'UKURAN-00005', NULL, 1, '2024-01-24 07:13:52', '2024-01-24 07:13:52');

-- --------------------------------------------------------

--
-- Table structure for table `data_satuans`
--

CREATE TABLE `data_satuans` (
  `kode_satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_satuans`
--

INSERT INTO `data_satuans` (`kode_satuan`, `nama_satuan`, `status`, `created_at`, `updated_at`) VALUES
('SATUAN-00001', 'Meter', 1, '2024-01-18 07:04:47', '2024-01-18 07:04:47'),
('SATUAN-00002', 'Yard', 1, '2024-01-18 07:04:57', '2024-01-18 07:04:57'),
('SATUAN-00003', 'Lusin', 1, '2024-01-18 07:05:11', '2024-01-18 07:05:11'),
('SATUAN-00004', 'Pcs', 1, '2024-01-18 07:05:19', '2024-01-18 07:05:19'),
('SATUAN-00005', 'Bungkus', 1, '2024-01-27 22:05:36', '2024-01-27 22:07:04');

-- --------------------------------------------------------

--
-- Table structure for table `data_statusbeli`
--

CREATE TABLE `data_statusbeli` (
  `kode_statusbeli` int(11) NOT NULL,
  `status_beli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_statusbeli`
--

INSERT INTO `data_statusbeli` (`kode_statusbeli`, `status_beli`, `created_at`, `updated_at`) VALUES
(1, 'Dipesan', '2024-01-18 07:20:48', '2024-01-18 07:20:48'),
(2, 'Selesai', '2024-01-18 07:20:54', '2024-01-18 07:20:54');

-- --------------------------------------------------------

--
-- Table structure for table `data_status_upahs`
--

CREATE TABLE `data_status_upahs` (
  `kode_statusupah` int(11) NOT NULL,
  `status_upah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_ukurans`
--

CREATE TABLE `data_ukurans` (
  `kode_ukuran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ukuran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_ukurans`
--

INSERT INTO `data_ukurans` (`kode_ukuran`, `nama_ukuran`, `status`, `created_at`, `updated_at`) VALUES
('UKURAN-00001', 'S (Small)', 1, '2024-01-18 07:04:16', '2024-01-18 07:04:16'),
('UKURAN-00002', 'M (Medium)', 1, '2024-01-18 07:04:22', '2024-01-18 07:04:22'),
('UKURAN-00003', 'L (Large)', 1, '2024-01-18 07:04:28', '2024-01-18 07:04:28'),
('UKURAN-00004', 'XL (Extra Large)', 1, '2024-01-18 07:04:33', '2024-01-18 07:04:33'),
('UKURAN-00005', 'All Size', 1, '2024-01-18 07:04:38', '2024-01-18 07:04:38'),
('UKURAN-00006', 'All Size 1', 0, '2024-01-20 16:37:47', '2024-01-20 16:37:54'),
('UKURAN-00007', 'H', 0, '2024-01-24 06:26:14', '2024-01-24 06:26:36');

-- --------------------------------------------------------

--
-- Table structure for table `data_warnas`
--

CREATE TABLE `data_warnas` (
  `kode_warna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_warna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_warnas`
--

INSERT INTO `data_warnas` (`kode_warna`, `nama_warna`, `status`, `created_at`, `updated_at`) VALUES
('WARNA-00001', 'Hitam', 1, '2024-01-18 07:05:27', '2024-01-18 07:05:27'),
('WARNA-00002', 'Putih', 1, '2024-01-18 07:05:33', '2024-01-18 07:05:33'),
('WARNA-00003', 'Maroon', 1, '2024-01-18 07:05:38', '2024-01-18 07:05:38'),
('WARNA-00004', 'Ben', 0, '2024-01-18 07:05:43', '2024-01-22 07:12:51'),
('WARNA-00005', 'Army', 1, '2024-01-18 07:05:53', '2024-01-18 07:05:53'),
('WARNA-00006', 'Biru', 1, '2024-01-18 07:06:07', '2024-01-18 07:06:07'),
('WARNA-00007', 'Pink', 1, '2024-01-18 07:06:18', '2024-01-18 07:06:18'),
('WARNA-00008', 'Transparan', 1, '2024-01-18 07:06:32', '2024-01-18 07:06:32');

-- --------------------------------------------------------

--
-- Table structure for table `detail_beli_bahan_bakus`
--

CREATE TABLE `detail_beli_bahan_bakus` (
  `kode_detail_belibahanbaku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_belibahanbaku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_bahanbaku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_warna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_beli_bahan_bakus`
--

INSERT INTO `detail_beli_bahan_bakus` (`kode_detail_belibahanbaku`, `kode_belibahanbaku`, `kode_bahanbaku`, `kode_warna`, `kode_satuan`, `jumlah_beli`, `keterangan`, `created_at`, `updated_at`) VALUES
('DPBB-00001', 'PBB-00001', 'BB-00001', 'WARNA-00001', 'SATUAN-00002', 500, NULL, '2024-01-18 07:25:17', '2024-01-18 07:25:17'),
('DPBB-00002', 'PBB-00001', 'BB-00002', 'WARNA-00002', 'SATUAN-00002', 500, NULL, '2024-01-18 07:25:17', '2024-01-18 07:25:17'),
('DPBB-00003', 'PBB-00001', 'BB-00003', 'WARNA-00001', 'SATUAN-00004', 10, NULL, '2024-01-18 07:25:17', '2024-01-18 07:25:17'),
('DPBB-00004', 'PBB-00002', 'BB-00001', 'WARNA-00001', 'SATUAN-00002', 100, NULL, '2024-01-18 09:38:21', '2024-01-18 09:38:21'),
('DPBB-00005', 'PBB-00003', 'BB-00001', 'WARNA-00001', 'SATUAN-00002', 300, NULL, '2024-01-20 17:08:46', '2024-01-20 17:08:46'),
('DPBB-00006', 'PBB-00004', 'BB-00001', 'WARNA-00001', 'SATUAN-00002', 600, NULL, '2024-01-20 18:36:17', '2024-01-20 18:36:17'),
('DPBB-00007', 'PBB-00005', 'BB-00003', 'WARNA-00001', 'SATUAN-00004', 10, 'Yang isi 100', '2024-01-22 19:06:20', '2024-01-22 19:06:20'),
('DPBB-00008', 'PBB-00006', 'BB-00001', 'WARNA-00001', 'SATUAN-00002', 100, NULL, '2024-01-22 22:53:02', '2024-01-22 22:53:02'),
('DPBB-00009', 'PBB-00007', 'BB-00001', 'WARNA-00002', 'SATUAN-00001', 1, NULL, '2024-01-24 08:15:58', '2024-01-24 08:15:58'),
('DPBB-00010', 'PBB-00008', 'BB-00001', 'WARNA-00001', 'SATUAN-00001', 1, NULL, '2024-01-24 09:04:44', '2024-01-24 09:04:44'),
('DPBB-00011', 'PBB-00009', 'BB-00001', 'WARNA-00001', 'SATUAN-00002', 5, NULL, '2024-01-24 09:05:44', '2024-01-24 09:05:44'),
('DPBB-00012', 'PBB-00010', 'BB-00001', 'WARNA-00001', 'SATUAN-00002', 12, NULL, '2024-01-24 09:08:36', '2024-01-24 09:08:36'),
('DPBB-00013', 'PBB-00011', 'BB-00001', 'WARNA-00001', 'SATUAN-00002', 2, NULL, '2024-01-24 11:04:47', '2024-01-24 11:04:47'),
('DPBB-00014', 'PBB-00012', 'BB-00001', 'WARNA-00001', 'SATUAN-00002', 500, NULL, '2024-01-24 12:41:42', '2024-01-24 12:41:42'),
('DPBB-00015', 'PBB-00013', 'BB-00001', 'WARNA-00001', 'SATUAN-00002', 150, NULL, '2024-01-27 22:03:27', '2024-01-27 22:03:27'),
('DPBB-00016', 'PBB-00014', 'BB-00003', 'WARNA-00001', 'SATUAN-00005', 10, 'Sebanyak 10 bungkus', '2024-01-27 22:11:29', '2024-01-27 22:11:29'),
('DPBB-00017', 'PBB-00015', 'BB-00001', 'WARNA-00001', 'SATUAN-00002', 50, 'Jumlahnya 50 yard', '2024-01-27 23:24:19', '2024-01-27 23:24:19'),
('DPBB-00018', 'PBB-00015', 'BB-00003', 'WARNA-00001', 'SATUAN-00005', 50, 'Jumlahnya 50 bungkus', '2024-01-27 23:24:19', '2024-01-27 23:24:19'),
('DPBB-00019', 'PBB-00016', 'BB-00002', 'WARNA-00002', 'SATUAN-00002', 12, NULL, '2024-01-27 23:51:43', '2024-01-27 23:51:43'),
('DPBB-00020', 'PBB-00017', 'BB-00001', 'WARNA-00001', 'SATUAN-00002', 10, NULL, '2024-01-28 01:59:12', '2024-01-28 01:59:12'),
('DPBB-00021', 'PBB-00017', 'BB-00002', 'WARNA-00002', 'SATUAN-00002', 10, NULL, '2024-01-28 01:59:12', '2024-01-28 01:59:12'),
('DPBB-00022', 'PBB-00017', 'BB-00003', 'WARNA-00001', 'SATUAN-00005', 10, NULL, '2024-01-28 01:59:12', '2024-01-28 01:59:12'),
('DPBB-00023', 'PBB-00018', 'BB-00001', 'WARNA-00001', 'SATUAN-00002', 1, NULL, '2024-01-28 02:42:59', '2024-01-28 02:42:59'),
('DPBB-00024', 'PBB-00018', 'BB-00003', 'WARNA-00001', 'SATUAN-00005', 1, NULL, '2024-01-28 02:42:59', '2024-01-28 02:42:59'),
('DPBB-00025', 'PBB-00018', 'BB-00002', 'WARNA-00002', 'SATUAN-00002', 1, NULL, '2024-01-28 02:42:59', '2024-01-28 02:42:59'),
('DPBB-00026', 'PBB-00019', 'BB-00004', 'WARNA-00008', 'SATUAN-00003', 2, NULL, '2024-01-28 12:04:12', '2024-01-28 12:04:12'),
('DPBB-00027', 'PBB-00019', 'BB-00002', 'WARNA-00002', 'SATUAN-00002', 10, NULL, '2024-01-28 12:04:12', '2024-01-28 12:04:12'),
('DPBB-00028', 'PBB-00020', 'BB-00001', 'WARNA-00001', 'SATUAN-00002', 20, NULL, '2024-01-28 22:17:45', '2024-01-28 22:17:45'),
('DPBB-00029', 'PBB-00020', 'BB-00004', 'WARNA-00008', 'SATUAN-00003', 10, NULL, '2024-01-28 22:17:45', '2024-01-28 22:17:45'),
('DPBB-00030', 'PBB-00021', 'BB-00001', 'WARNA-00001', 'SATUAN-00002', 300, 'Sekitar 10 roll', '2024-02-18 04:28:55', '2024-02-18 04:28:55'),
('DPBB-00031', 'PBB-00021', 'BB-00002', 'WARNA-00002', 'SATUAN-00002', 100, 'Sekitar 2 roll', '2024-02-18 04:28:55', '2024-02-18 04:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `detail_produksi_pakaian_cuttings`
--

CREATE TABLE `detail_produksi_pakaian_cuttings` (
  `kode_detail_produksipakaian_cutting` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_produksipakaian_cutting` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_rencanaproduksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_kerja` date NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warna_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_rencanaproduksi` int(11) NOT NULL,
  `jumlah_berhasil` int(11) NOT NULL,
  `jumlah_gagal` int(11) NOT NULL,
  `total_berhasildangagal` int(11) NOT NULL,
  `upah_kerja` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_produksi_pakaian_cuttings`
--

INSERT INTO `detail_produksi_pakaian_cuttings` (`kode_detail_produksipakaian_cutting`, `kode_produksipakaian_cutting`, `kode_rencanaproduksi`, `id_user`, `tanggal_kerja`, `nama_produk`, `warna_produk`, `ukuran_produk`, `jumlah_rencanaproduksi`, `jumlah_berhasil`, `jumlah_gagal`, `total_berhasildangagal`, `upah_kerja`, `created_at`, `updated_at`) VALUES
('D-CUTTING-00001', 'CUTTING-00001', 'RENCANA-00001', '7', '2024-01-19', 'Gamis Anak Putih U 7-10', 'Putih', 'S (Small)', 50, 15, 0, 15, 30000, '2024-01-22 06:02:09', '2024-01-22 06:02:09'),
('D-CUTTING-00002', 'CUTTING-00002', 'RENCANA-00002', '2', '2024-01-19', 'Blazer Hitam All Size', 'Hitam', 'All Size', 70, 15, 0, 15, 30000, '2024-01-22 06:02:50', '2024-01-22 06:02:50'),
('D-CUTTING-00003', 'CUTTING-00001', 'RENCANA-00001', '2', '2024-01-19', 'Gamis Anak Putih U 7-10', 'Putih', 'S (Small)', 50, 20, 0, 20, 40000, '2024-01-22 06:03:51', '2024-01-22 06:03:51'),
('D-CUTTING-00004', 'CUTTING-00001', 'RENCANA-00001', '7', '2024-01-20', 'Gamis Anak Putih U 7-10', 'Putih', 'S (Small)', 50, 15, 0, 15, 30000, '2024-01-22 06:04:57', '2024-01-22 06:04:57'),
('D-CUTTING-00005', 'CUTTING-00002', 'RENCANA-00002', '2', '2024-01-20', 'Blazer Hitam All Size', 'Hitam', 'All Size', 70, 20, 5, 25, 40000, '2024-01-22 06:09:01', '2024-01-22 06:09:01'),
('D-CUTTING-00006', 'CUTTING-00002', 'RENCANA-00002', '7', '2024-01-20', 'Blazer Hitam All Size', 'Hitam', 'All Size', 70, 15, 0, 15, 30000, '2024-01-22 06:12:03', '2024-01-22 06:12:03'),
('D-CUTTING-00007', 'CUTTING-00007', 'RENCANA-00003', '2', '2024-01-16', 'Kemeja Salur Hitam All size', 'Hitam', 'All Size', 100, 50, 0, 50, 50000, '2024-01-22 18:46:46', '2024-01-22 18:46:46'),
('D-CUTTING-00008', 'CUTTING-00007', 'RENCANA-00003', '2', '2024-01-17', 'Kemeja Salur Hitam All size', 'Hitam', 'All Size', 100, 50, 0, 50, 50000, '2024-01-22 18:47:37', '2024-01-22 18:47:37'),
('D-CUTTING-00009', 'CUTTING-00009', 'RENCANA-00004', '2', '2024-01-24', 'Kemeja Salur Hitam All size', 'Hitam', 'All Size', 50, 3, 0, 3, 6000, '2024-01-23 09:32:43', '2024-01-23 09:32:43'),
('D-CUTTING-00010', 'CUTTING-00002', 'RENCANA-00002', '2', '2024-01-24', 'Blazer Hitam All Size', 'Hitam', 'All Size', 70, 5, 0, 5, 10000, '2024-01-23 09:44:40', '2024-01-23 09:44:40'),
('D-CUTTING-00011', 'CUTTING-00002', 'RENCANA-00002', '2', '2024-01-19', 'Blazer Hitam All Size', 'Hitam', 'All Size', 70, 5, 0, 5, 10000, '2024-01-23 12:40:37', '2024-01-23 12:40:37'),
('D-CUTTING-00012', 'CUTTING-00009', 'RENCANA-00004', '2', '2024-01-23', 'Kemeja Salur Hitam All size', 'Hitam', 'All Size', 50, 5, 0, 5, 10000, '2024-01-23 12:42:33', '2024-01-23 12:42:33'),
('D-CUTTING-00013', 'CUTTING-00002', 'RENCANA-00002', '2', '2024-01-24', 'Blazer Hitam All Size', 'Hitam', 'All Size', 70, 2, 0, 2, 4000, '2024-01-24 09:46:30', '2024-01-24 09:46:30'),
('D-CUTTING-00014', 'CUTTING-00002', 'RENCANA-00002', '2', '2024-01-25', 'Blazer Hitam All Size', 'Hitam', 'All Size', 70, 2, 0, 2, 4000, '2024-01-24 12:37:38', '2024-01-24 12:37:38'),
('D-CUTTING-00015', 'CUTTING-00009', 'RENCANA-00004', '2', '2024-01-25', 'Kemeja Salur Hitam All size', 'Hitam', 'All Size', 50, 10, 0, 10, 20000, '2024-01-24 23:43:15', '2024-01-24 23:43:15'),
('D-CUTTING-00016', 'CUTTING-00016', 'RENCANA-00005', '2', '2024-01-28', 'Blazer Hitam All Size', 'Hitam', 'All Size', 100, 50, 0, 50, 100000, '2024-01-28 05:38:21', '2024-01-28 05:38:21'),
('D-CUTTING-00017', 'CUTTING-00016', 'RENCANA-00005', '2', '2024-01-27', 'Blazer Hitam All Size', 'Hitam', 'All Size', 100, 5, 0, 5, 10000, '2024-01-28 05:39:09', '2024-01-28 05:39:09'),
('D-CUTTING-00018', 'CUTTING-00018', 'RENCANA-00006', '2', '2024-01-28', 'Kemeja Salur Hitam All size', 'Hitam', 'All Size', 100, 20, 0, 20, 40000, '2024-01-28 05:48:34', '2024-01-28 05:48:34'),
('D-CUTTING-00019', 'CUTTING-00002', 'RENCANA-00002', '2', '2024-01-28', 'Blazer Hitam All Size', 'Hitam', 'All Size', 70, 1, 0, 1, 2000, '2024-01-28 09:14:44', '2024-01-28 09:14:44'),
('D-CUTTING-00020', 'CUTTING-00018', 'RENCANA-00006', '2', '2024-01-29', 'Kemeja Salur Hitam All size', 'Hitam', 'All Size', 100, 80, 0, 80, 160000, '2024-01-29 00:39:35', '2024-01-29 00:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `detail_produksi_pakaian_jahits`
--

CREATE TABLE `detail_produksi_pakaian_jahits` (
  `kode_detail_produksipakaian_jahit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_produksipakaian_jahit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_rencanaproduksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_kerja` date NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warna_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_rencanaproduksi` int(11) NOT NULL,
  `jumlah_berhasil` int(11) NOT NULL,
  `jumlah_gagal` int(11) NOT NULL,
  `total_berhasildangagal` int(11) NOT NULL,
  `upah_kerja` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_produksi_pakaian_jahits`
--

INSERT INTO `detail_produksi_pakaian_jahits` (`kode_detail_produksipakaian_jahit`, `kode_produksipakaian_jahit`, `kode_rencanaproduksi`, `id_user`, `tanggal_kerja`, `nama_produk`, `warna_produk`, `ukuran_produk`, `jumlah_rencanaproduksi`, `jumlah_berhasil`, `jumlah_gagal`, `total_berhasildangagal`, `upah_kerja`, `created_at`, `updated_at`) VALUES
('D-JAHIT-00001', 'JAHIT-00001', 'RENCANA-00001', '3', '2024-01-20', 'Gamis Anak Putih U 7-10', 'Putih', 'S (Small)', 50, 20, 0, 20, 140000, '2024-01-22 06:11:14', '2024-01-22 06:11:14'),
('D-JAHIT-00002', 'JAHIT-00001', 'RENCANA-00001', '3', '2024-01-19', 'Gamis Anak Putih U 7-10', 'Putih', 'S (Small)', 50, 15, 0, 15, 105000, '2024-01-22 06:13:49', '2024-01-22 06:13:49'),
('D-JAHIT-00003', 'JAHIT-00002', 'RENCANA-00002', '4', '2024-01-19', 'Blazer Hitam All Size', 'Hitam', 'All Size', 70, 20, 0, 20, 140000, '2024-01-22 06:14:56', '2024-01-22 06:14:56'),
('D-JAHIT-00004', 'JAHIT-00001', 'RENCANA-00001', '4', '2024-01-20', 'Gamis Anak Putih U 7-10', 'Putih', 'S (Small)', 50, 15, 0, 15, 105000, '2024-01-22 06:16:39', '2024-01-22 06:16:39'),
('D-JAHIT-00005', 'JAHIT-00003', 'RENCANA-00003', '3', '2024-01-16', 'Kemeja Salur Hitam All size', 'Hitam', 'All Size', 100, 25, 0, 25, 175000, '2024-01-22 18:57:41', '2024-01-22 18:57:41'),
('D-JAHIT-00006', 'JAHIT-00003', 'RENCANA-00003', '3', '2024-01-19', 'Kemeja Salur Hitam All size', 'Hitam', 'All Size', 100, 75, 0, 75, 525000, '2024-01-22 18:58:24', '2024-01-22 18:58:24'),
('D-JAHIT-00007', 'JAHIT-00002', 'RENCANA-00002', '3', '2024-01-24', 'Blazer Hitam All Size', 'Hitam', 'All Size', 70, 5, 0, 5, 35000, '2024-01-23 13:08:19', '2024-01-23 13:08:19'),
('D-JAHIT-00008', 'JAHIT-00004', 'RENCANA-00004', '3', '2024-01-25', 'Kemeja Salur Hitam All size', 'Hitam', 'All Size', 50, 7, 0, 7, 49000, '2024-01-24 23:40:28', '2024-01-24 23:40:28'),
('D-JAHIT-00009', 'JAHIT-00002', 'RENCANA-00002', '3', '2024-01-28', 'Blazer Hitam All Size', 'Hitam', 'All Size', 70, 9, 0, 9, 63000, '2024-01-28 08:10:16', '2024-01-28 08:10:16'),
('D-JAHIT-00010', 'JAHIT-00002', 'RENCANA-00002', '3', '2024-01-29', 'Blazer Hitam All Size', 'Hitam', 'All Size', 70, 5, 0, 5, 35000, '2024-01-28 08:15:47', '2024-01-28 08:15:47'),
('D-JAHIT-00011', 'JAHIT-00002', 'RENCANA-00002', '3', '2024-01-29', 'Blazer Hitam All Size', 'Hitam', 'All Size', 70, 5, 0, 5, 35000, '2024-01-28 08:16:57', '2024-01-28 08:16:57'),
('D-JAHIT-00012', 'JAHIT-00002', 'RENCANA-00002', '3', '2024-01-29', 'Blazer Hitam All Size', 'Hitam', 'All Size', 70, 5, 0, 5, 35000, '2024-01-28 08:20:33', '2024-01-28 08:20:33'),
('D-JAHIT-00013', 'JAHIT-00004', 'RENCANA-00004', '3', '2024-01-29', 'Kemeja Salur Hitam All size', 'Hitam', 'All Size', 50, 2, 0, 2, 14000, '2024-01-28 08:24:58', '2024-01-28 08:24:58'),
('D-JAHIT-00014', 'JAHIT-00002', 'RENCANA-00002', '3', '2024-01-29', 'Blazer Hitam All Size', 'Hitam', 'All Size', 70, 1, 0, 1, 7000, '2024-01-28 08:26:17', '2024-01-28 08:26:17'),
('D-JAHIT-00015', 'JAHIT-00004', 'RENCANA-00004', '3', '2024-01-26', 'Kemeja Salur Hitam All size', 'Hitam', 'All Size', 50, 5, 0, 5, 35000, '2024-01-28 08:26:43', '2024-01-28 08:26:43'),
('D-JAHIT-00016', 'JAHIT-00002', 'RENCANA-00002', '3', '2024-01-29', 'Blazer Hitam All Size', 'Hitam', 'All Size', 70, 4, 0, 4, 28000, '2024-01-28 08:29:58', '2024-01-28 08:29:58'),
('D-JAHIT-00017', 'JAHIT-00002', 'RENCANA-00002', '3', '2024-01-29', 'Blazer Hitam All Size', 'Hitam', 'All Size', 70, 5, 1, 6, 35000, '2024-01-28 08:33:52', '2024-01-28 08:33:52'),
('D-JAHIT-00018', 'JAHIT-00002', 'RENCANA-00002', '3', '2024-01-28', 'Blazer Hitam All Size', 'Hitam', 'All Size', 70, 4, 0, 4, 28000, '2024-01-28 08:34:24', '2024-01-28 08:34:24'),
('D-JAHIT-00019', 'JAHIT-00005', 'RENCANA-00006', '3', '2024-01-29', 'Kemeja Salur Hitam All size', 'Hitam', 'All Size', 100, 5, 0, 5, 35000, '2024-01-28 08:36:41', '2024-01-28 08:36:41'),
('D-JAHIT-00020', 'JAHIT-00006', 'RENCANA-00005', '3', '2024-01-28', 'Blazer Hitam All Size', 'Hitam', 'All Size', 100, 2, 0, 2, 14000, '2024-01-28 08:37:07', '2024-01-28 08:37:07'),
('D-JAHIT-00021', 'JAHIT-00005', 'RENCANA-00006', '3', '2024-01-29', 'Kemeja Salur Hitam All size', 'Hitam', 'All Size', 100, 2, 0, 2, 14000, '2024-01-28 08:40:20', '2024-01-28 08:40:20'),
('D-JAHIT-00022', 'JAHIT-00005', 'RENCANA-00006', '3', '2024-01-28', 'Kemeja Salur Hitam All size', 'Hitam', 'All Size', 100, 1, 0, 1, 7000, '2024-01-28 08:41:01', '2024-01-28 08:41:01'),
('D-JAHIT-00023', 'JAHIT-00006', 'RENCANA-00005', '3', '2024-01-28', 'Blazer Hitam All Size', 'Hitam', 'All Size', 100, 3, 0, 3, 21000, '2024-01-28 08:51:21', '2024-01-28 08:51:21'),
('D-JAHIT-00024', 'JAHIT-00005', 'RENCANA-00006', '4', '2024-01-29', 'Kemeja Salur Hitam All size', 'Hitam', 'All Size', 100, 50, 0, 50, 350000, '2024-01-29 00:42:09', '2024-01-29 00:42:09'),
('D-JAHIT-00025', 'JAHIT-00005', 'RENCANA-00006', '3', '2024-01-29', 'Kemeja Salur Hitam All size', 'Hitam', 'All Size', 100, 42, 0, 42, 294000, '2024-01-29 00:44:26', '2024-01-29 00:44:26');

-- --------------------------------------------------------

--
-- Table structure for table `detail_produksi_pakaian_packings`
--

CREATE TABLE `detail_produksi_pakaian_packings` (
  `kode_detail_produksipakaian_packing` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_produksipakaian_packing` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_rencanaproduksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_kerja` date NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warna_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_rencanaproduksi` int(11) NOT NULL,
  `jumlah_berhasil` int(11) NOT NULL,
  `jumlah_gagal` int(11) NOT NULL,
  `total_berhasildangagal` int(11) NOT NULL,
  `upah_kerja` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_produksi_pakaian_packings`
--

INSERT INTO `detail_produksi_pakaian_packings` (`kode_detail_produksipakaian_packing`, `kode_produksipakaian_packing`, `kode_rencanaproduksi`, `id_user`, `tanggal_kerja`, `nama_produk`, `warna_produk`, `ukuran_produk`, `jumlah_rencanaproduksi`, `jumlah_berhasil`, `jumlah_gagal`, `total_berhasildangagal`, `upah_kerja`, `created_at`, `updated_at`) VALUES
('D-PACKING-00001', 'PACKING-00001', 'RENCANA-00001', '6', '2024-01-21', 'Gamis Anak Putih U 7-10', 'Putih', 'S (Small)', 50, 35, 0, 35, 35000, '2024-01-22 06:21:11', '2024-01-22 06:21:11'),
('D-PACKING-00002', 'PACKING-00002', 'RENCANA-00002', '6', '2024-01-21', 'Blazer Hitam All Size', 'Hitam', 'All Size', 70, 15, 0, 15, 15000, '2024-01-22 06:21:47', '2024-01-22 06:21:47'),
('D-PACKING-00003', 'PACKING-00001', 'RENCANA-00001', '8', '2024-01-21', 'Gamis Anak Putih U 7-10', 'Putih', 'S (Small)', 50, 15, 0, 15, 15000, '2024-01-22 06:24:27', '2024-01-22 06:24:27'),
('D-PACKING-00004', 'PACKING-00002', 'RENCANA-00002', '8', '2024-01-21', 'Blazer Hitam All Size', 'Hitam', 'All Size', 70, 5, 0, 5, 5000, '2024-01-22 06:25:12', '2024-01-22 06:25:12'),
('D-PACKING-00005', 'PACKING-00003', 'RENCANA-00003', '6', '2024-01-20', 'Kemeja Salur Hitam All size', 'Hitam', 'All Size', 100, 100, 0, 100, 50000, '2024-01-22 19:00:08', '2024-01-22 19:00:08'),
('D-PACKING-00006', 'PACKING-00002', 'RENCANA-00002', '6', '2024-01-24', 'Blazer Hitam All Size', 'Hitam', 'All Size', 70, 5, 0, 5, 5000, '2024-01-23 13:21:49', '2024-01-23 13:21:49'),
('D-PACKING-00007', 'PACKING-00002', 'RENCANA-00002', '6', '2024-01-28', 'Blazer Hitam All Size', 'Hitam', 'All Size', 70, 4, 0, 4, 4000, '2024-01-28 09:05:27', '2024-01-28 09:05:27'),
('D-PACKING-00008', 'PACKING-00004', 'RENCANA-00006', '8', '2024-01-29', 'Kemeja Salur Hitam All size', 'Hitam', 'All Size', 100, 50, 0, 50, 50000, '2024-01-29 00:48:33', '2024-01-29 00:48:33'),
('D-PACKING-00009', 'PACKING-00004', 'RENCANA-00006', '6', '2024-01-29', 'Kemeja Salur Hitam All size', 'Hitam', 'All Size', 100, 50, 0, 50, 50000, '2024-01-29 00:51:53', '2024-01-29 00:51:53');

-- --------------------------------------------------------

--
-- Table structure for table `detail_rencana_produksis`
--

CREATE TABLE `detail_rencana_produksis` (
  `kode_detail_rencanaproduksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_rencanaproduksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_bahanbaku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_warna_stokbahanbaku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_satuan_stokbahanbaku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_perlu_stokbahanbaku` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_rencana_produksis`
--

INSERT INTO `detail_rencana_produksis` (`kode_detail_rencanaproduksi`, `kode_rencanaproduksi`, `kode_bahanbaku`, `kode_warna_stokbahanbaku`, `kode_satuan_stokbahanbaku`, `jumlah_perlu_stokbahanbaku`, `created_at`, `updated_at`) VALUES
('D-RENCANA-00003', 'RENCANA-00001', 'BB-00002', 'Putih', 'Yard', 60, '2024-01-22 05:12:07', '2024-01-22 05:12:07'),
('D-RENCANA-00004', 'RENCANA-00002', 'BB-00001', 'Hitam', 'Yard', 80, '2024-01-22 05:27:30', '2024-01-22 05:27:30'),
('D-RENCANA-00005', 'RENCANA-00002', 'BB-00003', 'Hitam', 'Pcs', 2, '2024-01-22 05:27:30', '2024-01-22 05:27:30'),
('D-RENCANA-00006', 'RENCANA-00003', 'BB-00001', 'Hitam', 'Yard', 120, '2024-01-22 18:36:58', '2024-01-22 18:36:58'),
('D-RENCANA-00007', 'RENCANA-00003', 'BB-00003', 'Hitam', 'Pcs', 2, '2024-01-22 18:36:58', '2024-01-22 18:36:58'),
('D-RENCANA-00008', 'RENCANA-00004', 'BB-00001', 'Hitam', 'Yard', 10, '2024-01-22 22:03:24', '2024-01-22 22:03:24'),
('D-RENCANA-00009', 'RENCANA-00005', 'BB-00001', 'Hitam', 'Yard', 100, '2024-01-28 05:37:01', '2024-01-28 05:37:01'),
('D-RENCANA-00010', 'RENCANA-00005', 'BB-00003', 'Hitam', 'Bungkus', 2, '2024-01-28 05:37:01', '2024-01-28 05:37:01'),
('D-RENCANA-00011', 'RENCANA-00006', 'BB-00001', 'Hitam', 'Yard', 100, '2024-01-28 05:47:41', '2024-01-28 05:47:41'),
('D-RENCANA-00012', 'RENCANA-00006', 'BB-00003', 'Hitam', 'Bungkus', 4, '2024-01-28 05:47:41', '2024-01-28 05:47:41');

-- --------------------------------------------------------

--
-- Table structure for table `detail_restocks`
--

CREATE TABLE `detail_restocks` (
  `kode_detail_restock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_restock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_bahanbaku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_warna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_item` int(11) NOT NULL,
  `jumlah_item` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_restocks`
--

INSERT INTO `detail_restocks` (`kode_detail_restock`, `kode_restock`, `kode_bahanbaku`, `kode_warna`, `kode_satuan`, `harga_item`, `jumlah_item`, `keterangan`, `created_at`, `updated_at`) VALUES
('DRS-00001', 'RS-00001', 'BB-00001', 'WARNA-00001', 'SATUAN-00002', 8000, 500, NULL, '2024-01-18 07:27:23', '2024-01-18 07:27:23'),
('DRS-00002', 'RS-00001', 'BB-00002', 'WARNA-00002', 'SATUAN-00002', 8000, 500, NULL, '2024-01-18 07:27:23', '2024-01-18 07:27:23'),
('DRS-00003', 'RS-00001', 'BB-00003', 'WARNA-00001', 'SATUAN-00004', 5000, 10, NULL, '2024-01-18 07:27:23', '2024-01-18 07:27:23'),
('DRS-00004', 'RS-00002', 'BB-00001', 'WARNA-00001', 'SATUAN-00002', 8000, 700, NULL, '2024-01-20 19:02:10', '2024-01-20 19:02:10'),
('DRS-00005', 'RS-00003', 'BB-00003', 'WARNA-00001', 'SATUAN-00004', 5000, 10, NULL, '2024-01-22 19:08:12', '2024-01-22 19:08:12'),
('DRS-00006', 'RS-00004', 'BB-00001', 'WARNA-00001', 'SATUAN-00002', 8000, 10, NULL, '2024-01-22 22:02:12', '2024-01-22 22:02:12'),
('DRS-00007', 'RS-00005', 'BB-00001', 'WARNA-00001', 'SATUAN-00002', 2000, 3, NULL, '2024-01-24 09:01:32', '2024-01-24 09:01:32'),
('DRS-00008', 'RS-00006', 'BB-00001', 'WARNA-00001', 'SATUAN-00001', 10, 5000, NULL, '2024-01-24 09:19:32', '2024-01-24 09:19:32'),
('DRS-00009', 'RS-00007', 'BB-00003', 'WARNA-00001', 'SATUAN-00005', 500, 4, '4 bungkus', '2024-01-27 22:13:40', '2024-01-27 22:13:40'),
('DRS-00011', 'RS-00009', 'BB-00002', 'WARNA-00002', 'SATUAN-00002', 2000, 400, 'Jumlah item 400', '2024-01-28 11:43:32', '2024-01-28 11:43:32'),
('DRS-00012', 'RS-00009', 'BB-00003', 'WARNA-00001', 'SATUAN-00005', 5000, 10, 'Jumlah item 10', '2024-01-28 11:43:32', '2024-01-28 11:43:32'),
('DRS-00013', 'RS-00010', 'BB-00001', 'WARNA-00001', 'SATUAN-00002', 8000, 10, 'Sudah tersedia di bagian cutting', '2024-01-28 12:01:30', '2024-01-28 12:01:30'),
('DRS-00014', 'RS-00011', 'BB-00004', 'WARNA-00008', 'SATUAN-00003', 5000, 5, NULL, '2024-01-28 12:06:07', '2024-01-28 12:06:07'),
('DRS-00015', 'RS-00011', 'BB-00002', 'WARNA-00002', 'SATUAN-00002', 5000, 10, NULL, '2024-01-28 12:06:07', '2024-01-28 12:06:07'),
('DRS-00016', 'RS-00012', 'BB-00001', 'WARNA-00001', 'SATUAN-00002', 5000, 10, NULL, '2024-01-28 12:23:50', '2024-01-28 12:23:50'),
('DRS-00017', 'RS-00012', 'BB-00002', 'WARNA-00002', 'SATUAN-00002', 5000, 10, NULL, '2024-01-28 12:23:50', '2024-01-28 12:23:50'),
('DRS-00018', 'RS-00012', 'BB-00003', 'WARNA-00001', 'SATUAN-00005', 200, 4, NULL, '2024-01-28 12:23:50', '2024-01-28 12:23:50'),
('DRS-00019', 'RS-00013', 'BB-00002', 'WARNA-00002', 'SATUAN-00002', 7000, 20, NULL, '2024-01-28 12:29:51', '2024-01-28 12:29:51');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manajemen_users`
--

CREATE TABLE `manajemen_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(79, '2014_10_12_000000_create_users_table', 1),
(80, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(81, '2019_08_19_000000_create_failed_jobs_table', 1),
(82, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(83, '2023_12_28_015721_create_data_ukurans_table', 1),
(84, '2023_12_28_021556_create_data_satuans_table', 1),
(85, '2023_12_28_022245_create_data_warnas_table', 1),
(86, '2023_12_28_022744_create_data_produks_table', 1),
(87, '2023_12_28_023433_create_data_bahanbakus_table', 1),
(88, '2024_01_08_142332_create_data_statusbeli_table', 1),
(89, '2024_01_09_075107_create_status_produksis_table', 1),
(90, '2024_01_10_072106_create_beli_bahan_bakus_table', 1),
(91, '2024_01_10_073055_create_detail_beli_bahan_bakus_table', 1),
(92, '2024_01_10_102417_create_restocks_table', 1),
(93, '2024_01_10_102429_create_detail_restocks_table', 1),
(94, '2024_01_10_194106_create_stok_bahan_bakus_table', 1),
(95, '2024_01_11_111006_create_rencana_produksis_table', 1),
(96, '2024_01_11_112111_create_detail_rencana_produksis_table', 1),
(97, '2024_01_12_142708_create_data_status_upahs_table', 1),
(98, '2024_01_13_093506_create_produksi_pakaian_cuttings_table', 1),
(99, '2024_01_13_113123_create_detail_produksi_pakaian_cutttings_table', 1),
(100, '2024_01_15_034200_create_produksi_pakaian_jahits_table', 1),
(101, '2024_01_15_034236_create_detail_produksi_pakaian_jahits_table', 1),
(102, '2024_01_15_072907_create_produksi_pakaian_packings_table', 1),
(103, '2024_01_15_072919_create_detail_produksi_pakaian_packings_table', 1),
(104, '2024_01_15_150329_create_manajemen_users_table', 1),
(105, '2024_01_25_025456_create_data_upahs_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produksi_pakaian_cuttings`
--

CREATE TABLE `produksi_pakaian_cuttings` (
  `kode_produksipakaian_cutting` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_rencanaproduksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warna_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_rencanaproduksi` int(11) NOT NULL,
  `total_jumlahberhasil` int(11) NOT NULL,
  `total_jumlahgagal` int(11) NOT NULL,
  `total_produksi_pakaian` int(11) NOT NULL DEFAULT 0,
  `status_produksi_cutting` int(11) NOT NULL DEFAULT 1,
  `tanggal_awal` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produksi_pakaian_cuttings`
--

INSERT INTO `produksi_pakaian_cuttings` (`kode_produksipakaian_cutting`, `kode_rencanaproduksi`, `nama_produk`, `warna_produk`, `ukuran_produk`, `jumlah_rencanaproduksi`, `total_jumlahberhasil`, `total_jumlahgagal`, `total_produksi_pakaian`, `status_produksi_cutting`, `tanggal_awal`, `tanggal_selesai`, `created_at`, `updated_at`) VALUES
('CUTTING-00001', 'RENCANA-00001', 'Gamis Anak Putih U 7-10', 'Putih', 'S (Small)', 50, 50, 0, 50, 2, '2024-01-18', '2024-01-22', '2024-01-22 06:02:09', '2024-01-22 06:04:57'),
('CUTTING-00002', 'RENCANA-00002', 'Blazer Hitam All Size', 'Hitam', 'All Size', 70, 65, 5, 70, 2, '2024-01-19', '2024-01-22', '2024-01-22 06:02:50', '2024-01-28 09:14:44'),
('CUTTING-00007', 'RENCANA-00003', 'Kemeja Salur Hitam All size', 'Hitam', 'All Size', 100, 100, 0, 100, 2, '2024-01-16', '2024-01-23', '2024-01-22 18:46:46', '2024-01-22 18:47:37'),
('CUTTING-00009', 'RENCANA-00004', 'Kemeja Salur Hitam All size', 'Hitam', 'All Size', 50, 18, 0, 18, 1, '2024-01-23', '2024-01-23', '2024-01-23 09:32:43', '2024-01-24 23:43:16'),
('CUTTING-00016', 'RENCANA-00005', 'Blazer Hitam All Size', 'Hitam', 'All Size', 100, 55, 0, 55, 1, '2024-01-28', '2024-01-28', '2024-01-28 05:38:21', '2024-01-28 05:39:09'),
('CUTTING-00018', 'RENCANA-00006', 'Kemeja Salur Hitam All size', 'Hitam', 'All Size', 100, 100, 0, 100, 2, '2024-01-28', '2024-01-28', '2024-01-28 05:48:34', '2024-01-29 00:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `produksi_pakaian_jahits`
--

CREATE TABLE `produksi_pakaian_jahits` (
  `kode_produksipakaian_jahit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_rencanaproduksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warna_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_rencanaproduksi` int(11) NOT NULL,
  `total_berhasil_daricutting` int(11) NOT NULL,
  `total_jumlahberhasil` int(11) NOT NULL,
  `total_jumlahgagal` int(11) NOT NULL,
  `total_produksi_pakaian` int(11) NOT NULL DEFAULT 0,
  `status_produksi_jahit` int(11) NOT NULL DEFAULT 1,
  `tanggal_awal` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produksi_pakaian_jahits`
--

INSERT INTO `produksi_pakaian_jahits` (`kode_produksipakaian_jahit`, `kode_rencanaproduksi`, `nama_produk`, `warna_produk`, `ukuran_produk`, `jumlah_rencanaproduksi`, `total_berhasil_daricutting`, `total_jumlahberhasil`, `total_jumlahgagal`, `total_produksi_pakaian`, `status_produksi_jahit`, `tanggal_awal`, `tanggal_selesai`, `created_at`, `updated_at`) VALUES
('JAHIT-00001', 'RENCANA-00001', 'Gamis Anak Putih U 7-10', 'Putih', 'S (Small)', 50, 50, 50, 0, 50, 2, '2024-01-18', '2024-01-22', '2024-01-22 06:11:14', '2024-01-22 06:16:39'),
('JAHIT-00002', 'RENCANA-00002', 'Blazer Hitam All Size', 'Hitam', 'All Size', 70, 64, 63, 1, 64, 2, '2024-01-19', '2024-01-22', '2024-01-22 06:14:56', '2024-01-28 08:34:24'),
('JAHIT-00003', 'RENCANA-00003', 'Kemeja Salur Hitam All size', 'Hitam', 'All Size', 100, 100, 100, 0, 100, 2, '2024-01-16', '2024-01-23', '2024-01-22 18:57:42', '2024-01-22 18:58:24'),
('JAHIT-00004', 'RENCANA-00004', 'Kemeja Salur Hitam All size', 'Hitam', 'All Size', 50, 18, 14, 0, 14, 1, '2024-01-23', '2024-01-25', '2024-01-24 23:40:28', '2024-01-28 08:26:43'),
('JAHIT-00005', 'RENCANA-00006', 'Kemeja Salur Hitam All size', 'Hitam', 'All Size', 100, 100, 100, 0, 100, 2, '2024-01-28', '2024-01-28', '2024-01-28 08:36:41', '2024-01-29 00:44:26'),
('JAHIT-00006', 'RENCANA-00005', 'Blazer Hitam All Size', 'Hitam', 'All Size', 100, 55, 5, 0, 5, 1, '2024-01-28', '2024-01-28', '2024-01-28 08:37:07', '2024-01-28 08:51:21');

-- --------------------------------------------------------

--
-- Table structure for table `produksi_pakaian_packings`
--

CREATE TABLE `produksi_pakaian_packings` (
  `kode_produksipakaian_packing` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_rencanaproduksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warna_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_rencanaproduksi` int(11) NOT NULL,
  `total_berhasil_darijahit` int(11) NOT NULL,
  `total_jumlahberhasil` int(11) NOT NULL,
  `total_jumlahgagal` int(11) NOT NULL,
  `total_produksi_pakaian` int(11) NOT NULL DEFAULT 0,
  `status_produksi_packing` int(11) NOT NULL DEFAULT 1,
  `tanggal_awal` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produksi_pakaian_packings`
--

INSERT INTO `produksi_pakaian_packings` (`kode_produksipakaian_packing`, `kode_rencanaproduksi`, `nama_produk`, `warna_produk`, `ukuran_produk`, `jumlah_rencanaproduksi`, `total_berhasil_darijahit`, `total_jumlahberhasil`, `total_jumlahgagal`, `total_produksi_pakaian`, `status_produksi_packing`, `tanggal_awal`, `tanggal_selesai`, `created_at`, `updated_at`) VALUES
('PACKING-00001', 'RENCANA-00001', 'Gamis Anak Putih U 7-10', 'Putih', 'S (Small)', 50, 50, 50, 0, 50, 2, '2024-01-18', '2024-01-22', '2024-01-22 06:21:11', '2024-01-22 06:24:27'),
('PACKING-00002', 'RENCANA-00002', 'Blazer Hitam All Size', 'Hitam', 'All Size', 70, 63, 29, 0, 29, 1, '2024-01-19', '2024-01-22', '2024-01-22 06:21:47', '2024-01-28 09:05:27'),
('PACKING-00003', 'RENCANA-00003', 'Kemeja Salur Hitam All size', 'Hitam', 'All Size', 100, 100, 100, 0, 100, 2, '2024-01-16', '2024-01-24', '2024-01-22 19:00:08', '2024-01-22 19:00:08'),
('PACKING-00004', 'RENCANA-00006', 'Kemeja Salur Hitam All size', 'Hitam', 'All Size', 100, 100, 100, 0, 100, 2, '2024-01-28', '2024-01-29', '2024-01-29 00:48:33', '2024-01-29 00:51:53');

-- --------------------------------------------------------

--
-- Table structure for table `rencana_produksis`
--

CREATE TABLE `rencana_produksis` (
  `kode_rencanaproduksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_warnaproduk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_ukuranproduk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `biaya_cutting` int(11) NOT NULL,
  `biaya_jahit` int(11) NOT NULL,
  `biaya_packing` int(11) NOT NULL,
  `jumlah_rencanaproduksi` int(11) NOT NULL,
  `status_produksi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rencana_produksis`
--

INSERT INTO `rencana_produksis` (`kode_rencanaproduksi`, `kode_produk`, `kode_warnaproduk`, `kode_ukuranproduk`, `tgl_awal`, `tgl_akhir`, `biaya_cutting`, `biaya_jahit`, `biaya_packing`, `jumlah_rencanaproduksi`, `status_produksi`, `created_at`, `updated_at`) VALUES
('RENCANA-00001', 'PRODUK-00002', 'WARNA-00002', 'UKURAN-00001', '2024-01-18', '2024-01-25', 2000, 7000, 1000, 50, 2, '2024-01-22 05:12:07', '2024-01-22 06:24:27'),
('RENCANA-00002', 'PRODUK-00003', 'WARNA-00001', 'UKURAN-00005', '2024-01-19', '2024-01-22', 2000, 7000, 1000, 70, 1, '2024-01-22 05:27:30', '2024-01-22 05:27:30'),
('RENCANA-00003', 'PRODUK-00001', 'WARNA-00001', 'UKURAN-00005', '2024-01-16', '2024-01-30', 1000, 7000, 500, 100, 2, '2024-01-22 18:36:58', '2024-01-22 19:00:08'),
('RENCANA-00004', 'PRODUK-00001', 'WARNA-00001', 'UKURAN-00005', '2024-01-23', '2024-01-30', 2000, 7000, 1000, 50, 1, '2024-01-22 22:03:24', '2024-01-22 22:03:24'),
('RENCANA-00005', 'PRODUK-00003', 'WARNA-00001', 'UKURAN-00005', '2024-01-28', '2024-02-04', 2000, 7000, 1000, 100, 1, '2024-01-28 05:37:01', '2024-01-28 05:37:01'),
('RENCANA-00006', 'PRODUK-00001', 'WARNA-00001', 'UKURAN-00005', '2024-01-28', '2024-02-04', 2000, 7000, 1000, 100, 2, '2024-01-28 05:47:41', '2024-01-29 00:51:53');

-- --------------------------------------------------------

--
-- Table structure for table `restocks`
--

CREATE TABLE `restocks` (
  `kode_restock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_faktur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_belibahanbaku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_hargaitem` int(11) NOT NULL,
  `tgl_restock` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restocks`
--

INSERT INTO `restocks` (`kode_restock`, `no_faktur`, `kode_belibahanbaku`, `total_hargaitem`, `tgl_restock`, `created_at`, `updated_at`) VALUES
('RS-00001', 'F000001', 'PBB-00001', 8050000, '2024-01-18', '2024-01-18 07:27:23', '2024-01-18 07:27:23'),
('RS-00002', 'F000003', 'PBB-00002', 5600000, '2024-01-21', '2024-01-20 19:02:10', '2024-01-20 19:02:10'),
('RS-00003', '00005', 'PBB-00005', 50000, '2024-01-23', '2024-01-22 19:08:12', '2024-01-22 19:08:12'),
('RS-00004', 'F000004', 'PBB-00004', 80000, '2024-01-23', '2024-01-22 22:02:12', '2024-01-22 22:02:12'),
('RS-00005', 'F000004', 'PBB-00006', 6000, '2024-01-24', '2024-01-24 09:01:32', '2024-01-24 09:01:32'),
('RS-00006', 'F000007', 'PBB-00010', 50000, '2024-01-24', '2024-01-24 09:19:32', '2024-01-24 09:19:32'),
('RS-00007', 'F0000014', 'PBB-00014', 2000, '2024-01-28', '2024-01-27 22:13:40', '2024-01-27 22:13:40'),
('RS-00009', 'F0000018', 'PBB-00018', 850000, '2024-01-29', '2024-01-28 11:43:32', '2024-01-28 11:43:32'),
('RS-00010', 'F0000013', 'PBB-00013', 80000, '2024-01-29', '2024-01-28 12:01:30', '2024-01-28 12:01:30'),
('RS-00011', 'F0000019', 'PBB-00019', 75000, '2024-01-29', '2024-01-28 12:06:07', '2024-01-28 12:06:07'),
('RS-00012', 'F0000017', 'PBB-00017', 100800, '2024-01-29', '2024-01-28 12:23:50', '2024-01-28 12:23:50'),
('RS-00013', 'F0000016', 'PBB-00016', 140000, '2024-01-29', '2024-01-28 12:29:51', '2024-01-28 12:29:51');

-- --------------------------------------------------------

--
-- Table structure for table `status_produksis`
--

CREATE TABLE `status_produksis` (
  `kode_statusproduksi` int(11) NOT NULL,
  `status_produksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_produksis`
--

INSERT INTO `status_produksis` (`kode_statusproduksi`, `status_produksi`, `created_at`, `updated_at`) VALUES
(1, 'Diproduksi', '2024-01-18 07:21:04', '2024-01-18 07:21:04'),
(2, 'Selesai Produksi', '2024-01-18 07:21:11', '2024-01-18 07:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `stok_bahan_bakus`
--

CREATE TABLE `stok_bahan_bakus` (
  `kode_stokbahanbaku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_bahanbaku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_warna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok_bahanbaku` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('pemilik','cutting','jahit','packing') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pemilik',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nuryadin', 'pemilik', 'pemilik@gmail.com', NULL, '$2y$12$Qde2UnACtEmFAgC1.vqKj.4TZUl3fdZUdL9Ecf8AO/FmYvnDJTmBW', 1, NULL, '2024-01-18 07:04:00', '2024-01-18 07:04:00'),
(2, 'Hadi Kurniawan', 'cutting', 'cutting1@gmail.com', NULL, '$2y$12$XjyKtd0.7BXC.6LHi0rHuuIE4EZWvokb8EYS/A9pcHpQ9RqHwbryG', 1, NULL, '2024-01-18 07:04:00', '2024-01-18 07:04:00'),
(3, 'Ibu', 'jahit', 'jahit1@gmail.com', NULL, '$2y$12$6aaGZbHfiR1BP294ZO8sEuHtTmbvqYvwTNFdMLxgAh0L2MJH106Mi', 1, NULL, '2024-01-18 07:04:00', '2024-01-18 07:04:00'),
(4, 'Rian', 'jahit', 'jahit2@gmail.com', NULL, '$2y$12$dfK6jWkbTB68a0mOelLJ2OPwBehDqV812cY6JKFvZfATQbHTIxARi', 1, NULL, '2024-01-18 07:04:00', '2024-01-18 07:04:00'),
(5, 'Diman', 'jahit', 'jahit3@gmail.com', NULL, '$2y$12$//t5cD3GrHRlQDe3CVAZV.LncsTsCNjxPLY5VUftxer314e7JwE8.', 1, NULL, '2024-01-18 07:04:00', '2024-01-18 07:04:00'),
(6, 'Hanifa', 'packing', 'packing1@gmail.com', NULL, '$2y$12$pVfQAcHJR6452pIXkhwjE.7vSIFPn6oNCDq8fAR5VeUovlJDNco7.', 1, NULL, '2024-01-18 07:04:00', '2024-01-18 07:04:00'),
(7, 'Mina', 'cutting', 'cutting2@gmail.com', NULL, '$2y$12$X2Oc3xn9/2SBTtLZEDRypewtw/CLl4orHxpY1/hQkgWjBxuf4SUE2', 1, NULL, '2024-01-20 19:04:28', '2024-01-20 19:04:28'),
(8, 'Wina', 'packing', 'packing2@gmail.com', NULL, '$2y$12$utJilnxlbLNwVklZn1bCG.T6SofbR6fDnua79ADTeJsRUOJNhywc2', 1, NULL, '2024-01-22 06:23:36', '2024-01-22 06:23:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beli_bahan_bakus`
--
ALTER TABLE `beli_bahan_bakus`
  ADD PRIMARY KEY (`kode_belibahanbaku`);

--
-- Indexes for table `data_bahanbakus`
--
ALTER TABLE `data_bahanbakus`
  ADD PRIMARY KEY (`kode_bahanbaku`);

--
-- Indexes for table `data_produks`
--
ALTER TABLE `data_produks`
  ADD PRIMARY KEY (`kode_produk`);

--
-- Indexes for table `data_satuans`
--
ALTER TABLE `data_satuans`
  ADD PRIMARY KEY (`kode_satuan`);

--
-- Indexes for table `data_statusbeli`
--
ALTER TABLE `data_statusbeli`
  ADD PRIMARY KEY (`kode_statusbeli`);

--
-- Indexes for table `data_status_upahs`
--
ALTER TABLE `data_status_upahs`
  ADD PRIMARY KEY (`kode_statusupah`);

--
-- Indexes for table `data_ukurans`
--
ALTER TABLE `data_ukurans`
  ADD PRIMARY KEY (`kode_ukuran`);

--
-- Indexes for table `data_warnas`
--
ALTER TABLE `data_warnas`
  ADD PRIMARY KEY (`kode_warna`);

--
-- Indexes for table `detail_beli_bahan_bakus`
--
ALTER TABLE `detail_beli_bahan_bakus`
  ADD PRIMARY KEY (`kode_detail_belibahanbaku`);

--
-- Indexes for table `detail_produksi_pakaian_cuttings`
--
ALTER TABLE `detail_produksi_pakaian_cuttings`
  ADD PRIMARY KEY (`kode_detail_produksipakaian_cutting`);

--
-- Indexes for table `detail_produksi_pakaian_jahits`
--
ALTER TABLE `detail_produksi_pakaian_jahits`
  ADD PRIMARY KEY (`kode_detail_produksipakaian_jahit`);

--
-- Indexes for table `detail_produksi_pakaian_packings`
--
ALTER TABLE `detail_produksi_pakaian_packings`
  ADD PRIMARY KEY (`kode_detail_produksipakaian_packing`);

--
-- Indexes for table `detail_rencana_produksis`
--
ALTER TABLE `detail_rencana_produksis`
  ADD PRIMARY KEY (`kode_detail_rencanaproduksi`);

--
-- Indexes for table `detail_restocks`
--
ALTER TABLE `detail_restocks`
  ADD PRIMARY KEY (`kode_detail_restock`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `manajemen_users`
--
ALTER TABLE `manajemen_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produksi_pakaian_cuttings`
--
ALTER TABLE `produksi_pakaian_cuttings`
  ADD PRIMARY KEY (`kode_produksipakaian_cutting`);

--
-- Indexes for table `produksi_pakaian_jahits`
--
ALTER TABLE `produksi_pakaian_jahits`
  ADD PRIMARY KEY (`kode_produksipakaian_jahit`);

--
-- Indexes for table `produksi_pakaian_packings`
--
ALTER TABLE `produksi_pakaian_packings`
  ADD PRIMARY KEY (`kode_produksipakaian_packing`);

--
-- Indexes for table `rencana_produksis`
--
ALTER TABLE `rencana_produksis`
  ADD PRIMARY KEY (`kode_rencanaproduksi`);

--
-- Indexes for table `restocks`
--
ALTER TABLE `restocks`
  ADD PRIMARY KEY (`kode_restock`);

--
-- Indexes for table `status_produksis`
--
ALTER TABLE `status_produksis`
  ADD PRIMARY KEY (`kode_statusproduksi`);

--
-- Indexes for table `stok_bahan_bakus`
--
ALTER TABLE `stok_bahan_bakus`
  ADD PRIMARY KEY (`kode_stokbahanbaku`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manajemen_users`
--
ALTER TABLE `manajemen_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
