-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 09:47 AM
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
-- Database: `web_masjid`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(30) NOT NULL,
  `isi_berita` text NOT NULL,
  `gambar_berita` varchar(255) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id_inventory` int(11) NOT NULL,
  `nama_inventory` varchar(30) NOT NULL,
  `merk` varchar(30) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kondisi_barang` varchar(30) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id_inventory`, `nama_inventory`, `merk`, `satuan`, `jumlah`, `kondisi_barang`, `tanggal_masuk`) VALUES
(3, 'Meja', 'Hail', 'Buah', 10, 'Sedang', '2022-06-22'),
(4, 'Kursi', 'chakpi', 'Kodi', 12, 'Amat Baik', '2022-06-30'),
(5, 'hai', 'Hail', 'Lembar', 10, 'Tidak Baik', '2022-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `iuran`
--

CREATE TABLE `iuran` (
  `id_iuran` int(11) NOT NULL,
  `bulan` varchar(30) NOT NULL,
  `tahun` varchar(30) NOT NULL,
  `tanggal_iuran` date NOT NULL,
  `jumlah_iuran` int(100) NOT NULL,
  `id_user` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `iuran`
--

INSERT INTO `iuran` (`id_iuran`, `bulan`, `tahun`, `tanggal_iuran`, `jumlah_iuran`, `id_user`) VALUES
(2, 'Januari', '2022', '2020-12-12', 900000, '7e28509b66c00e27a9d08a4cf61eb603'),
(5, 'Februari', '2019', '2022-06-09', 10000000, '9c29ff6121686a7bd4c68c4daf8203c6');

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `id_kas` int(11) NOT NULL,
  `jenis_kas` enum('Debit','Kredit') NOT NULL,
  `nominal` int(11) NOT NULL,
  `keterangan_kas` text NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kas`
--

INSERT INTO `kas` (`id_kas`, `jenis_kas`, `nominal`, `keterangan_kas`, `tanggal_transaksi`) VALUES
(1, 'Debit', 1000000, 'Sumbangan haji alem\r\n', '2022-06-19'),
(6, 'Debit', 1000000000, 'Sumbangan bos taufik\r\n', '2022-06-19'),
(7, 'Debit', 100000, 'Sumbangan kematian\r\n', '2022-06-20'),
(8, 'Kredit', 300000, 'Membeli kursi', '2022-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `kematian`
--

CREATE TABLE `kematian` (
  `id_kematian` int(11) NOT NULL,
  `tanggal_kematian` date NOT NULL,
  `jam_kematian` time NOT NULL,
  `usia` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kematian`
--

INSERT INTO `kematian` (`id_kematian`, `tanggal_kematian`, `jam_kematian`, `usia`, `id_user`) VALUES
(6, '2022-06-09', '14:08:00', 70, 'c6b4baf1dee319638f342dfc893cf4bb');

-- --------------------------------------------------------

--
-- Table structure for table `status_verifikasi`
--

CREATE TABLE `status_verifikasi` (
  `id_status_verfikasi` int(11) NOT NULL,
  `status_verfikasi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_verifikasi`
--

INSERT INTO `status_verifikasi` (`id_status_verfikasi`, `status_verfikasi`) VALUES
(1, 'Belum Di Verifikasi'),
(2, 'Menunggu Verifikasi '),
(3, 'Verifikasi Ditolak'),
(4, 'Verifikasi Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(255) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `id_user_detail` varchar(255) NOT NULL,
  `id_user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `id_user_detail`, `id_user_level`) VALUES
('1d7435860716a08092681637d39a826d', 'admin', 'hasim@gmail.com', '123', '1d7435860716a08092681637d39a826d', 1),
('5a370c106f2703961690cf8bc4f93836', 'bendahara', 'nandos@gmail.com', '123', '5a370c106f2703961690cf8bc4f93836', 2),
('7e28509b66c00e27a9d08a4cf61eb603', 'kresna', 'taufiiqulhakim23@gmail.com', '123', '7e28509b66c00e27a9d08a4cf61eb603', 3),
('9c29ff6121686a7bd4c68c4daf8203c6', 'tespupr', 'taufiiqul.hakim@binus.ac.id', '123', '9c29ff6121686a7bd4c68c4daf8203c6', 3),
('c6b4baf1dee319638f342dfc893cf4bb', 'rian', 'rian23@gmail.com', '123', 'c6b4baf1dee319638f342dfc893cf4bb', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id_user_detail` varchar(255) NOT NULL,
  `nama_lengkap` varchar(30) DEFAULT NULL,
  `jabatan` varchar(30) DEFAULT NULL,
  `no_kk` varchar(30) DEFAULT NULL,
  `no_ktp` varchar(30) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `agama` varchar(30) DEFAULT NULL,
  `no_hp` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `foto_kk` varchar(255) DEFAULT NULL,
  `id_status_verifikasi` int(11) DEFAULT NULL,
  `tanggal_registered` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id_user_detail`, `nama_lengkap`, `jabatan`, `no_kk`, `no_ktp`, `jenis_kelamin`, `agama`, `no_hp`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `foto_kk`, `id_status_verifikasi`, `tanggal_registered`) VALUES
('1d7435860716a08092681637d39a826d', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-06-15'),
('5a370c106f2703961690cf8bc4f93836', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-06-15'),
('7e28509b66c00e27a9d08a4cf61eb603', 'Taufiiqulhakim', 'Anggota Biasa', '12', '12', 'L', 'Islam', '+62812781728', 'Jl. Sekip', 'Palembang', '2022-06-22', '159635db729a4b819d92718a41e05c6f_kk.png', 4, '2022-06-17'),
('9c29ff6121686a7bd4c68c4daf8203c6', 'Rezki', 'Anggota Biasa', '12', '12', 'L', 'Islam', '081271828172', 'Jl. Sekip', 'Palembang', '2001-12-12', 'a18256a61215f6c8d2678be460aeee6a_kk.png', 4, '2022-06-18'),
('c6b4baf1dee319638f342dfc893cf4bb', 'Rian', 'Sekre', '12', '12', 'L', 'Islam', 'Rian', 'Jl. Sekip', 'Palembang', '2022-06-23', '05a108188fec06cc861a0f7718bcaa81_kk.png', 1, '2022-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id_user_level` int(11) NOT NULL,
  `user_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id_user_level`, `user_level`) VALUES
(1, 'Admin'),
(2, 'Bendahara'),
(3, 'Anggota');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id_inventory`);

--
-- Indexes for table `iuran`
--
ALTER TABLE `iuran`
  ADD PRIMARY KEY (`id_iuran`);

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id_kas`);

--
-- Indexes for table `kematian`
--
ALTER TABLE `kematian`
  ADD PRIMARY KEY (`id_kematian`);

--
-- Indexes for table `status_verifikasi`
--
ALTER TABLE `status_verifikasi`
  ADD PRIMARY KEY (`id_status_verfikasi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id_user_detail`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id_inventory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `iuran`
--
ALTER TABLE `iuran`
  MODIFY `id_iuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `id_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kematian`
--
ALTER TABLE `kematian`
  MODIFY `id_kematian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `status_verifikasi`
--
ALTER TABLE `status_verifikasi`
  MODIFY `id_status_verfikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
