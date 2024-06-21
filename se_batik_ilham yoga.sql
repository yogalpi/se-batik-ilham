-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2024 at 03:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `se_batik_ilham`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `kode_karyawan` char(10) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`kode_karyawan`, `tanggal`, `status`) VALUES
('KU-001', '2024-04-28', 'HADIR'),
('KU-001', '2024-04-29', 'HADIR'),
('KU-004', '2024-04-29', 'HADIR'),
('KU-003', '2024-04-30', 'HADIR'),
('KU-002', '2024-04-30', 'HADIR'),
('KU-003', '2024-05-03', 'HADIR'),
('KU-002', '2024-05-03', 'HADIR'),
('KU-003', '2024-05-12', 'HADIR'),
('KU-002', '2024-05-12', 'HADIR'),
('KU-003', '2024-05-14', 'HADIR'),
('KU-002', '2024-05-14', 'HADIR'),
('KU-003', '2024-05-15', 'TIDAK MASUK'),
('KU-002', '2024-05-15', 'HADIR'),
('KU-003', '2024-06-05', 'HADIR'),
('KU-002', '2024-06-05', 'HADIR'),
('KU-003', '2024-06-20', 'HADIR'),
('KU-002', '2024-06-20', 'HADIR'),
('KU-003', '2024-06-21', 'HADIR'),
('KU-002', '2024-06-21', 'HADIR');

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE `akses` (
  `kode` char(10) NOT NULL,
  `akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`kode`, `akses`) VALUES
('AGBB', 'AdminGudangBahanBaku'),
('AGP', 'AdminGudangProduk'),
('AMA', 'AdminManajemenAset'),
('AOS', 'AdminOnlineShop'),
('CUS', 'Customer'),
('HRD', 'HRD'),
('KE', 'Keuangan'),
('KP', 'KepalaProduksi'),
('KSR', 'Kasir'),
('OWN', 'Owner');

-- --------------------------------------------------------

--
-- Table structure for table `akun_pelanggan`
--

CREATE TABLE `akun_pelanggan` (
  `kode` char(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun_pelanggan`
--

INSERT INTO `akun_pelanggan` (`kode`, `username`, `password`) VALUES
('CUS-000', 'Offline', 'Offline'),
('CUS-001', 'nabil', 'nabil');

-- --------------------------------------------------------

--
-- Table structure for table `aset`
--

CREATE TABLE `aset` (
  `kode_aset` char(10) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_aset` varchar(50) NOT NULL,
  `jumlah` smallint(5) UNSIGNED NOT NULL,
  `jenis_aset` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aset`
--

INSERT INTO `aset` (`kode_aset`, `tanggal`, `nama_aset`, `jumlah`, `jenis_aset`) VALUES
(' AT-001', '2024-05-04', 'Mobil Pickup', 1, 'Kendaraan'),
(' AT-002', '2024-04-25', 'Meja', 1, 'Kendaraan'),
(' AT-004', '2024-05-02', 'Mio Mirza', 1, 'Kendaraan'),
(' AT-006', '2024-04-30', 'b', 3, 'Kendaraan'),
(' AT-007', '2024-04-30', 'v', 4, 'Kendaraan'),
(' AT-008', '2024-04-24', 'Mobil Pickup', 3, 'Kendaraan'),
(' AT-009', '2024-04-30', 'Meja', 3, 'Kendaraan'),
(' AT-010', '2024-04-16', 'Meja', 4, 'Kendaraan');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `kode_barang` char(10) NOT NULL,
  `kode_produksi` char(10) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`kode_barang`, `kode_produksi`, `nama_barang`, `jumlah`, `jenis`, `keterangan`, `tanggal`) VALUES
('00099', 'P-001', 'hgfhg', '9', '', 'iyiuyiuy', '2024-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `kode_chat` char(10) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kode` char(10) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_gudang_jadi`
--

CREATE TABLE `detail_gudang_jadi` (
  `kode_gudang_jadi` char(10) NOT NULL,
  `kode` char(10) NOT NULL,
  `ukuran` char(5) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_gudang_jadi`
--

INSERT INTO `detail_gudang_jadi` (`kode_gudang_jadi`, `kode`, `ukuran`, `jumlah`, `harga`) VALUES
('P-001', 'P-001', 'M', 10, 75000),
('P-002', 'P-002', 'M', 1, 2),
('P-002', 'P-002', 'XL', 20, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pelanggan`
--

CREATE TABLE `detail_pelanggan` (
  `kode_akun` char(10) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengadaan`
--

CREATE TABLE `detail_pengadaan` (
  `kode_pengadaan` char(10) NOT NULL,
  `kebutuhan` varchar(40) NOT NULL,
  `biaya` int(11) NOT NULL,
  `kode_supplier` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pengadaan`
--

INSERT INTO `detail_pengadaan` (`kode_pengadaan`, `kebutuhan`, `biaya`, `kode_supplier`) VALUES
('P-001', 'nasi padang', 10000, 'S01'),
('11111', 'hkh', 213, 'S01');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `kode_penjualan` char(10) NOT NULL,
  `kode_detail_gudang_jadi` char(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`kode_penjualan`, `kode_detail_gudang_jadi`, `qty`, `harga`) VALUES
('PEN-001', 'P-001', 2, 75000),
('PEN-001', 'P-002', 5, 100000),
('PEN-002', 'P-002', 10, 100000);

--
-- Triggers `detail_penjualan`
--
DELIMITER $$
CREATE TRIGGER `get_price` BEFORE INSERT ON `detail_penjualan` FOR EACH ROW SET NEW.harga = (SELECT harga FROM detail_gudang_jadi WHERE detail_gudang_jadi.kode = NEW.kode_detail_gudang_jadi)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_produksi`
--

CREATE TABLE `detail_produksi` (
  `kode_produksi` char(10) NOT NULL,
  `kode_aset` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_tipe`
--

CREATE TABLE `detail_tipe` (
  `kode_tipe` char(10) NOT NULL,
  `kode_akun_pelanggan` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_tipe`
--

INSERT INTO `detail_tipe` (`kode_tipe`, `kode_akun_pelanggan`) VALUES
('ON', 'CUS-001');

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `kode_jenis` char(10) NOT NULL,
  `gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`kode_jenis`, `gaji`) VALUES
('KP', 8000),
('KU', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `gaji_pegawai_produksi`
--

CREATE TABLE `gaji_pegawai_produksi` (
  `kode_gaji` char(10) NOT NULL,
  `jumlah_produksi` int(11) NOT NULL,
  `total_gaji` int(11) NOT NULL,
  `kode` char(10) NOT NULL,
  `kode_produksi` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gaji_pegawai_produksi`
--

INSERT INTO `gaji_pegawai_produksi` (`kode_gaji`, `jumlah_produksi`, `total_gaji`, `kode`, `kode_produksi`) VALUES
('G-003-006', 3, 16000, 'KP-001', 'P-003'),
('G-004-009', 90, 720000, 'KP-002', 'P-004'),
('G-005-001', 12, 6000, 'KP-004', 'P-005'),
('G-005-002', 80, 40000, 'KP-001', 'P-005'),
('G-006-010', 100, 800000, 'KP-002', 'P-006'),
('G-006-011', 23, 184000, 'KP-001', 'P-006'),
('G-007-003', 100, 800000, 'KP-002', 'P-007'),
('G-007-004', 15, 120000, '-- Pilih K', 'P-007');

-- --------------------------------------------------------

--
-- Table structure for table `gaji_pegawai_umum`
--

CREATE TABLE `gaji_pegawai_umum` (
  `kode_gaji` char(10) NOT NULL,
  `jumlah_absensi` int(11) NOT NULL,
  `total_gaji` int(11) NOT NULL,
  `kode` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gaji_pegawai_umum`
--

INSERT INTO `gaji_pegawai_umum` (`kode_gaji`, `jumlah_absensi`, `total_gaji`, `kode`) VALUES
('G-0524-002', 3, 300000, 'KU-002'),
('G-0624-003', 1, 20000, 'KU-003');

-- --------------------------------------------------------

--
-- Table structure for table `gudang_bahan`
--

CREATE TABLE `gudang_bahan` (
  `kode_produksi` char(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gudang_jadi`
--

CREATE TABLE `gudang_jadi` (
  `kode_produksi` char(10) NOT NULL,
  `kode` char(10) NOT NULL,
  `nama_pakaian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gudang_jadi`
--

INSERT INTO `gudang_jadi` (`kode_produksi`, `kode`, `nama_pakaian`) VALUES
('P-001', 'P-001', 'Baju Batik'),
('P-001', 'P-002', 'Barang Coba');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `kode` char(10) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL,
  `kode_jenis` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`kode`, `tanggal`, `nama`, `alamat`, `jenis_kelamin`, `status`, `kode_jenis`) VALUES
('KP-001', '2024-04-02', 'yoga', 'nmnm', 'Laki-laki', 'aktif', 'KP'),
('KP-002', '2024-05-05', 'dapa', 'limas', 'Laki-laki', 'aktif', 'KP'),
('KU-001', '2024-04-02', 'Boboiboy', 'panjang wetan', 'Laki-laki', 'nonaktif', 'KU'),
('KU-002', '2024-04-26', 'Ying', 'krtaon', 'Laki-laki', 'aktif', 'KU'),
('KU-003', '2024-04-02', 'Bima', 'mmm', 'Laki-laki', 'aktif', 'KU');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `kode` char(10) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(25) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `kode_pengguna` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`kode`, `tanggal`, `status`, `jumlah`, `keterangan`, `kode_pengguna`) VALUES
(' AT-0101', '2024-04-24', 'KREDIT', 100000, 'tcyf', 'AMA001'),
('G-005-002', '2024-05-03', 'KREDIT', 40000, 'Gaji Karyawan Produksi Tanggal 2024-05-03', 'HRD001'),
('G-0524-002', '2024-05-12', 'KREDIT', 300000, 'Gaji Karyawan Umum Tanggal 2024-05-12', 'HRD001');

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan`
--

CREATE TABLE `pengadaan` (
  `kode_pengadaan` char(10) NOT NULL,
  `kode_pengguna` char(10) NOT NULL,
  `tanggal` date NOT NULL,
  `rencana_pengadaan` varchar(40) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengadaan`
--

INSERT INTO `pengadaan` (`kode_pengadaan`, `kode_pengguna`, `tanggal`, `rencana_pengadaan`, `jenis`, `status`) VALUES
('11111', 'KP001', '2024-04-21', 'dsa', 'dsaa', 'acc'),
('P-001', 'AGBB001', '2024-04-19', 'membuat baju batik', 'baju', 'acc');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `kode` char(10) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `kode_akses` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`kode`, `nama`, `username`, `password`, `kode_akses`) VALUES
('AGBB001', 'Muhammad Nabil', 'nabil', 'nabil', 'AGBB'),
('AGP001', 'Muhammad Said Alkhudri', 'said', 'said', 'AGP'),
('AMA001', 'Yoga Sugiono', 'yoga', 'yoga', 'AMA'),
('AOS001', 'sadi', 'sadi', 'sadi', 'AOS'),
('CUS001', 'Abana', 'abana', 'abana', 'CUS'),
('HRD001', 'Yogaa', 'yogahr', 'yogahr', 'HRD'),
('KE001', 'Akhmad Reyhan Syabana', 'bana', 'bana', 'KE'),
('KP001', 'NabilKP', 'nabilkp', 'nabillkp', 'KP'),
('KSR001', 'sadikasir', 'sadikasir', 'sadikasir', 'KSR'),
('OWN001', 'Oliq', 'oliq', 'oliq', 'OWN');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `kode` char(10) NOT NULL,
  `kode_tipe` char(10) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_pelanggan` char(10) NOT NULL,
  `status` varchar(30) NOT NULL,
  `metode_pembayaran` varchar(20) NOT NULL,
  `jenis_pengiriman` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`kode`, `kode_tipe`, `tanggal`, `kode_pelanggan`, `status`, `metode_pembayaran`, `jenis_pengiriman`) VALUES
('PEN-001', 'OFF', '2024-04-20', 'CUS-000', 'Dibatalkan', 'CASH', 'Offline'),
('PEN-002', 'ON', '2024-04-20', 'CUS-001', 'Dibatalkan', 'BCA', 'JNE');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE `permintaan` (
  `kode_permintaan` char(10) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `nominal` int(11) NOT NULL,
  `file` text NOT NULL,
  `kode` char(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permintaan`
--

INSERT INTO `permintaan` (`kode_permintaan`, `tanggal`, `keterangan`, `nominal`, `file`, `kode`, `status`) VALUES
('1', '2024-06-07', 'Penggajian Karyawan Produksi dengan kode produksi P-006', 984000, '07-06-24-Laporan_Gaji_Karyawan_Produksi (5).pdf', 'HRD001', 'PENDING'),
('7', '2024-06-07', 'Penggajian Karyawan Umum Bulan Juni', 20000, '07-06-24-Laporan_Gaji_Karyawan_Umum (5).pdf', 'HRD001', 'ACC'),
('8', '2024-06-07', 'Penggajian Karyawan Umum Bulan Mei', 300000, '07-06-24-Laporan_Gaji_Karyawan_Umum (5).pdf', 'HRD001', 'REVISI'),
('9', '2024-06-07', 'Penggajian Karyawan Produksi dengan kode produksi P-005', 40000, '07-06-24-Laporan_Gaji_Karyawan_Umum (5).pdf', 'HRD001', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `kode_pengadaan` char(10) NOT NULL,
  `kode_produksi` char(10) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`kode_pengadaan`, `kode_produksi`, `tanggal_mulai`, `tanggal_selesai`, `status`) VALUES
('P-001', 'P-001', '2024-04-19', '2024-04-25', 'diproses'),
('P-001', 'P-002', '2024-04-24', '2024-04-27', 'diproses'),
('P-001', 'P-003', '2024-04-24', '2024-04-27', 'diproses'),
('P-001', 'P-004', '2024-04-24', '2024-04-27', 'diproses'),
('P-001', 'P-005', '2024-04-24', '2024-04-27', 'diproses'),
('P-001', 'P-006', '2024-04-24', '2024-04-27', 'diproses'),
('P-001', 'P-007', '2024-04-24', '2024-04-27', 'diproses');

-- --------------------------------------------------------

--
-- Table structure for table `sanggan`
--

CREATE TABLE `sanggan` (
  `kode_produksi` char(10) NOT NULL,
  `kode_karyawan` char(10) NOT NULL,
  `jumlah_diselesaikan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `kode_supplier` char(10) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `nomor_hp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kode_supplier`, `nama`, `alamat`, `nomor_hp`) VALUES
('S01', 'cibaduyud', 'cibaduyud', 987);

-- --------------------------------------------------------

--
-- Table structure for table `tipe`
--

CREATE TABLE `tipe` (
  `kode` char(10) NOT NULL,
  `keterangan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipe`
--

INSERT INTO `tipe` (`kode`, `keterangan`) VALUES
('OFF', 'Offline'),
('ON', 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `nomor` int(11) NOT NULL,
  `kegiatan` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `kode` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`nomor`, `kegiatan`, `status`, `kode`) VALUES
(1, 'Meeting dengan Direktur Utama jam 12', 'selesai', 'HRD001'),
(2, 'Makan siang di nasi padang dudung', 'belum selesai', 'HRD001'),
(3, 'saya akan makan soto', 'belum selesai', 'HRD001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `akun_pelanggan`
--
ALTER TABLE `akun_pelanggan`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`kode_aset`);

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `kode_produksi` (`kode_produksi`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`kode_chat`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `detail_gudang_jadi`
--
ALTER TABLE `detail_gudang_jadi`
  ADD PRIMARY KEY (`kode`,`ukuran`),
  ADD KEY `kode_gudang_jadi` (`kode_gudang_jadi`);

--
-- Indexes for table `detail_pelanggan`
--
ALTER TABLE `detail_pelanggan`
  ADD PRIMARY KEY (`kode_akun`);

--
-- Indexes for table `detail_pengadaan`
--
ALTER TABLE `detail_pengadaan`
  ADD KEY `kode_pengadaan` (`kode_pengadaan`),
  ADD KEY `kode_supplier` (`kode_supplier`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD KEY `kode_penjualan` (`kode_penjualan`),
  ADD KEY `kode_detail_gudang_jadi` (`kode_detail_gudang_jadi`);

--
-- Indexes for table `detail_produksi`
--
ALTER TABLE `detail_produksi`
  ADD KEY `kode_produksi` (`kode_produksi`),
  ADD KEY `kode_aset` (`kode_aset`);

--
-- Indexes for table `detail_tipe`
--
ALTER TABLE `detail_tipe`
  ADD UNIQUE KEY `kode_tipe` (`kode_tipe`),
  ADD UNIQUE KEY `kode_akun_pelanggan` (`kode_akun_pelanggan`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`kode_jenis`);

--
-- Indexes for table `gaji_pegawai_produksi`
--
ALTER TABLE `gaji_pegawai_produksi`
  ADD PRIMARY KEY (`kode_gaji`),
  ADD KEY `kode` (`kode`),
  ADD KEY `kode_produksi` (`kode_produksi`);

--
-- Indexes for table `gaji_pegawai_umum`
--
ALTER TABLE `gaji_pegawai_umum`
  ADD PRIMARY KEY (`kode_gaji`),
  ADD KEY `kode` (`kode`);

--
-- Indexes for table `gudang_bahan`
--
ALTER TABLE `gudang_bahan`
  ADD KEY `kode_produksi` (`kode_produksi`);

--
-- Indexes for table `gudang_jadi`
--
ALTER TABLE `gudang_jadi`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `kode_produksi` (`kode_produksi`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `kode_jenis` (`kode_jenis`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `kode_pengguna` (`kode_pengguna`);

--
-- Indexes for table `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD PRIMARY KEY (`kode_pengadaan`),
  ADD KEY `kode_pengguna` (`kode_pengguna`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`kode`),
  ADD UNIQUE KEY `kode_akses` (`kode_akses`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `kode_tipe` (`kode_tipe`),
  ADD KEY `kode_pelanggan` (`kode_pelanggan`);

--
-- Indexes for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`kode_permintaan`),
  ADD KEY `permintaan_ibfk_1` (`kode`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`kode_produksi`),
  ADD KEY `kode_pengadaan` (`kode_pengadaan`);

--
-- Indexes for table `sanggan`
--
ALTER TABLE `sanggan`
  ADD KEY `kode_produksi` (`kode_produksi`),
  ADD KEY `kode_karyawan` (`kode_karyawan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- Indexes for table `tipe`
--
ALTER TABLE `tipe`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`nomor`),
  ADD KEY `kode` (`kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD CONSTRAINT `bahan_baku_ibfk_1` FOREIGN KEY (`kode_produksi`) REFERENCES `produksi` (`kode_produksi`);

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`kode`) REFERENCES `akun_pelanggan` (`kode`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`kode`) REFERENCES `pengguna` (`kode`);

--
-- Constraints for table `detail_gudang_jadi`
--
ALTER TABLE `detail_gudang_jadi`
  ADD CONSTRAINT `detail_gudang_jadi_ibfk_1` FOREIGN KEY (`kode_gudang_jadi`) REFERENCES `gudang_jadi` (`kode`);

--
-- Constraints for table `detail_pelanggan`
--
ALTER TABLE `detail_pelanggan`
  ADD CONSTRAINT `detail_pelanggan_ibfk_1` FOREIGN KEY (`kode_akun`) REFERENCES `akun_pelanggan` (`kode`);

--
-- Constraints for table `detail_pengadaan`
--
ALTER TABLE `detail_pengadaan`
  ADD CONSTRAINT `detail_pengadaan_ibfk_1` FOREIGN KEY (`kode_pengadaan`) REFERENCES `pengadaan` (`kode_pengadaan`),
  ADD CONSTRAINT `detail_pengadaan_ibfk_2` FOREIGN KEY (`kode_supplier`) REFERENCES `supplier` (`kode_supplier`);

--
-- Constraints for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `detail_penjualan_ibfk_1` FOREIGN KEY (`kode_penjualan`) REFERENCES `penjualan` (`kode`),
  ADD CONSTRAINT `detail_penjualan_ibfk_2` FOREIGN KEY (`kode_detail_gudang_jadi`) REFERENCES `detail_gudang_jadi` (`kode`);

--
-- Constraints for table `detail_produksi`
--
ALTER TABLE `detail_produksi`
  ADD CONSTRAINT `detail_produksi_ibfk_1` FOREIGN KEY (`kode_produksi`) REFERENCES `produksi` (`kode_produksi`),
  ADD CONSTRAINT `detail_produksi_ibfk_2` FOREIGN KEY (`kode_aset`) REFERENCES `aset` (`kode_aset`);

--
-- Constraints for table `detail_tipe`
--
ALTER TABLE `detail_tipe`
  ADD CONSTRAINT `detail_tipe_ibfk_1` FOREIGN KEY (`kode_tipe`) REFERENCES `tipe` (`kode`),
  ADD CONSTRAINT `detail_tipe_ibfk_2` FOREIGN KEY (`kode_akun_pelanggan`) REFERENCES `akun_pelanggan` (`kode`);

--
-- Constraints for table `gudang_bahan`
--
ALTER TABLE `gudang_bahan`
  ADD CONSTRAINT `gudang_bahan_ibfk_1` FOREIGN KEY (`kode_produksi`) REFERENCES `produksi` (`kode_produksi`);

--
-- Constraints for table `gudang_jadi`
--
ALTER TABLE `gudang_jadi`
  ADD CONSTRAINT `gudang_jadi_ibfk_1` FOREIGN KEY (`kode_produksi`) REFERENCES `produksi` (`kode_produksi`);

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`kode_jenis`) REFERENCES `gaji` (`kode_jenis`);

--
-- Constraints for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD CONSTRAINT `keuangan_ibfk_1` FOREIGN KEY (`kode_pengguna`) REFERENCES `pengguna` (`kode`);

--
-- Constraints for table `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD CONSTRAINT `pengadaan_ibfk_1` FOREIGN KEY (`kode_pengguna`) REFERENCES `pengguna` (`kode`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_2` FOREIGN KEY (`kode_akses`) REFERENCES `akses` (`kode`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`kode_tipe`) REFERENCES `tipe` (`kode`),
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`kode_pelanggan`) REFERENCES `akun_pelanggan` (`kode`);

--
-- Constraints for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD CONSTRAINT `permintaan_ibfk_1` FOREIGN KEY (`kode`) REFERENCES `pengguna` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produksi`
--
ALTER TABLE `produksi`
  ADD CONSTRAINT `produksi_ibfk_1` FOREIGN KEY (`kode_pengadaan`) REFERENCES `pengadaan` (`kode_pengadaan`);

--
-- Constraints for table `sanggan`
--
ALTER TABLE `sanggan`
  ADD CONSTRAINT `sanggan_ibfk_1` FOREIGN KEY (`kode_produksi`) REFERENCES `produksi` (`kode_produksi`),
  ADD CONSTRAINT `sanggan_ibfk_2` FOREIGN KEY (`kode_karyawan`) REFERENCES `karyawan` (`kode`);

--
-- Constraints for table `todo`
--
ALTER TABLE `todo`
  ADD CONSTRAINT `todo_ibfk_1` FOREIGN KEY (`kode`) REFERENCES `pengguna` (`kode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
