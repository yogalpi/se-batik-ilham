-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 26, 2024 at 03:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
('0001', '2024-04-05', 'Meja', 15, 'Furnitur'),
('0002', '2024-04-05', 'Kursi', 10, 'Furnitur'),
('0003', '2024-04-05', 'Kursi smackdown', 10, 'Alat Perang'),
('0004', '2024-04-21', 'Tayo Jasmani', 3, 'Kendaraan');

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
('000', 'P-001', 'benang', '2', 'perlengkapan produks', 'baik', '2024-04-25');

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
  `id` int(11) NOT NULL,
  `kode_pengadaan` char(10) NOT NULL,
  `kebutuhan` varchar(40) NOT NULL,
  `biaya` int(11) NOT NULL,
  `kode_supplier` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pengadaan`
--

INSERT INTO `detail_pengadaan` (`id`, `kode_pengadaan`, `kebutuhan`, `biaya`, `kode_supplier`) VALUES
(1, 'PN-001', '4g499999922', 1198, 'S01'),
(2, 'PN-001', '4g4999999', 1198, 'S01'),
(3, 'PN-001', '4g499999900', 1198, 'S01'),
(4, 'PN-001', '4g4999999', 1198, 'S01'),
(5, 'PN-002', 'oitddd', 3, 'S01'),
(6, 'PN-002', 'oitddd', 3, 'S01');

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
  `jenis_baju` varchar(25) NOT NULL,
  `ukuran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_produksi`
--

INSERT INTO `detail_produksi` (`kode_produksi`, `jenis_baju`, `ukuran`) VALUES
('P-006', 'kemeja panjang', 'xl'),
('P-006', 'kemeja pendek', 'l'),
('P-007', 'x', 'x'),
('P-007', 'x', 'x'),
('P-002', 's', 's');

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

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`kode`, `tanggal`, `status`, `jumlah`, `keterangan`, `kode_pengguna`) VALUES
(' k001', '2024-04-23', 'kredit', 87, 'nh', 'KE001');

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
('PN-001', 'AGBB001', '2024-04-02', 'u', 'HEM', 'Pending'),
('PN-002', 'AGBB001', '2024-04-26', 'asd', 'HEM', 'Pending');

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
('PEN-002', 'ON', '2024-04-20', 'CUS-001', 'Dikirim', 'BCA', 'JNE');

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `kode_pengadaan` char(10) NOT NULL,
  `kode_barang` char(10) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `kode_produksi` char(10) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `rencana_produksi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`kode_pengadaan`, `kode_barang`, `jumlah_barang`, `kode_produksi`, `tanggal_mulai`, `rencana_produksi`) VALUES
('PN-001', '000', 2, 'P-001', '2024-05-02', 'n');

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
  ADD PRIMARY KEY (`id`),
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
  ADD KEY `kode_produksi` (`kode_produksi`);

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
  ADD KEY `kode_tipe` (`kode_tipe`),
  ADD KEY `kode_pelanggan` (`kode_pelanggan`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`kode_produksi`),
  ADD KEY `kode_pengadaan` (`kode_pengadaan`),
  ADD KEY `kode_barang` (`kode_barang`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pengadaan`
--
ALTER TABLE `detail_pengadaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`kode_karyawan`) REFERENCES `karyawan` (`kode`);

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
-- Constraints for table `detail_pengadaan`
--
ALTER TABLE `detail_pengadaan`
  ADD CONSTRAINT `detail_pengadaan_ibfk_1` FOREIGN KEY (`kode_pengadaan`) REFERENCES `pengadaan` (`kode_pengadaan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
