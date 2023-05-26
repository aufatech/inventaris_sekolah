-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2021 at 07:53 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `bangunan`
--

CREATE TABLE `bangunan` (
  `kode_bangunan` varchar(11) NOT NULL,
  `kode _tanah` varchar(11) NOT NULL,
  `nama_bangunan` varchar(100) NOT NULL,
  `luas_bangunan` int(11) NOT NULL,
  `jumlah_lantai` int(11) NOT NULL,
  `tahun_dibangun` date NOT NULL,
  `harga` int(11) NOT NULL,
  `kepemilikan` enum('milik','tidak milik') NOT NULL,
  `tgl_sk_dipakai` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(11) NOT NULL,
  `kode_ruang` varchar(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `jumlah_barang` int(10) NOT NULL,
  `type` varchar(100) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pinjam`
--

CREATE TABLE `detail_pinjam` (
  `id` int(11) NOT NULL,
  `id_trans` int(11) NOT NULL,
  `kode_barang` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `nama_peminjam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `nama`, `username`, `password`, `alamat`, `no_telp`, `level`) VALUES
(1, 'Drs Nur Hasan, M. Pd.', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Desa Batangan Kaliori Pati', '08973487223', 'admin'),
(2, 'Aji Jaya Kusmintarsi', 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'Desa Kabongan Kidul Kec Rembang Kab Rembang ', '0873784823', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `kode_ruang` varchar(11) NOT NULL,
  `kode_bangunan` varchar(11) NOT NULL,
  `nama_ruang` int(100) NOT NULL,
  `lantai_ke` int(10) NOT NULL,
  `luas` int(10) NOT NULL,
  `harga` int(15) NOT NULL,
  `keterangan` int(255) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tanah`
--

CREATE TABLE `tanah` (
  `kode_tanah` varchar(11) NOT NULL,
  `no_sertifikat` varchar(100) NOT NULL,
  `nama_tanah` varchar(100) NOT NULL,
  `luas_tanah` int(15) NOT NULL,
  `tanggal_sertifikat` date NOT NULL,
  `harga` int(15) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanah`
--

INSERT INTO `tanah` (`kode_tanah`, `no_sertifikat`, `nama_tanah`, `luas_tanah`, `tanggal_sertifikat`, `harga`, `keterangan`, `created_by`) VALUES
('T0001', 'Da.II/x9/123/75', 'Tanah Sekolah SMP Negeri 2 Rembang', 14380, '1965-07-01', 90000, 'Hak Milik', 2),
('T0002', 'Da.II/x9/123/67', 'Tanah Sekolah SMP N 2 Rembang', 9160, '1976-07-01', 900000000, 'Hak Milik', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bangunan`
--
ALTER TABLE `bangunan`
  ADD PRIMARY KEY (`kode_bangunan`),
  ADD KEY `kode _tanah` (`kode _tanah`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `kode_ruang` (`kode_ruang`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_trans` (`id_trans`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`kode_ruang`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `kode_bangunan` (`kode_bangunan`);

--
-- Indexes for table `tanah`
--
ALTER TABLE `tanah`
  ADD PRIMARY KEY (`kode_tanah`),
  ADD KEY `created_by` (`created_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bangunan`
--
ALTER TABLE `bangunan`
  ADD CONSTRAINT `bangunan_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `petugas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bangunan_ibfk_2` FOREIGN KEY (`kode _tanah`) REFERENCES `tanah` (`kode_tanah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kode_ruang`) REFERENCES `ruang` (`kode_ruang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `petugas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `petugas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ruang`
--
ALTER TABLE `ruang`
  ADD CONSTRAINT `ruang_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `petugas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ruang_ibfk_2` FOREIGN KEY (`kode_bangunan`) REFERENCES `bangunan` (`kode_bangunan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tanah`
--
ALTER TABLE `tanah`
  ADD CONSTRAINT `tanah_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `petugas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
