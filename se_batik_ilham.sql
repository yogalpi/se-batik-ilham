-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2024 at 04:36 PM
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
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('0001', '2024-04-05', 'Meja', 15, 'Furnitur'),
('0002', '2024-04-05', 'Kursi', 10, 'Furnitur'),
('0003', '2024-04-05', 'Kursi smackdown', 10, 'Alat Perang');

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

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `kode_penjualan` char(10) NOT NULL,
  `kode_detail_gudang_jadi` char(10) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `kode_jenis` char(10) NOT NULL,
  `gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `kode_jenis` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `kode` char(10) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(25) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(25) NOT NULL,
  `kode_pengguna` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `tipe`
--

CREATE TABLE `tipe` (
  `kode` char(10) NOT NULL,
  `keterangan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`kode_karyawan`);

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
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`kode_chat`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `detail_gudang_jadi`
--
ALTER TABLE `detail_gudang_jadi`
  ADD PRIMARY KEY (`kode`),
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
  ADD UNIQUE KEY `kode_pengguna` (`kode_pengguna`);

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
  ADD KEY `kode_tipe` (`kode_tipe`);

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
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`kode_karyawan`) REFERENCES `karyawan` (`kode`);

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
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`kode_tipe`) REFERENCES `tipe` (`kode`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
