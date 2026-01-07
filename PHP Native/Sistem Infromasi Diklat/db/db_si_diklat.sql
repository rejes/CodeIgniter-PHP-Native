-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2022 at 05:47 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_si_diklat`
--

-- --------------------------------------------------------

--
-- Table structure for table `award`
--

CREATE TABLE `award` (
  `id_award` int(11) NOT NULL,
  `id_diklat` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `nm_award` varchar(50) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `award`
--

INSERT INTO `award` (`id_award`, `id_diklat`, `id_peserta`, `nm_award`, `link`) VALUES
(2, 4, 6, 'Peserta Paling Antusias', 'https://drive.google.com/file/d/1bzymzLPNYZS0dk8wsOiYE2pxbHV4Vzo7/view?usp=sharing');

-- --------------------------------------------------------

--
-- Table structure for table `diklat`
--

CREATE TABLE `diklat` (
  `id_diklat` int(11) NOT NULL,
  `tema` varchar(100) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `id_tutor` int(11) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `jam_mulai` varchar(10) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `sts` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diklat`
--

INSERT INTO `diklat` (`id_diklat`, `tema`, `id_materi`, `id_tutor`, `tgl_mulai`, `tgl_selesai`, `jam_mulai`, `id_ruangan`, `sts`) VALUES
(2, 'Membangun Kepemimpian Leadership', 1, 2, '2022-06-25', '2022-06-26', '08:00', 2, '1'),
(3, 'Membangun Tanggung Jawab dalam Tim', 2, 1, '2022-07-01', '2022-07-01', '10:00', 2, '1'),
(4, 'Diklat contoh', 2, 1, '2022-06-24', '2022-06-24', '09:00', 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id_instansi` int(11) NOT NULL,
  `nm_instansi` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `hp_instansi` varchar(20) NOT NULL,
  `email_instansi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id_instansi`, `nm_instansi`, `alamat`, `hp_instansi`, `email_instansi`) VALUES
(1, 'SMAN 1 Banjarmasin', 'Jl. Mulawarman No.25, Tlk. Dalam, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70115', '05114368225', 'sman1bjm@gmail.com'),
(2, 'SMAN 2 Banjarmasin', 'Jl. Mulawarman No.21, Tlk. Dalam, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70115', '05114368226', 'sman2bjm@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `id_diklat` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`id_kehadiran`, `id_diklat`, `id_peserta`) VALUES
(13, 4, 6),
(14, 4, 4),
(15, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `nm_materi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `nm_materi`) VALUES
(1, 'Kepemimpinan'),
(2, 'Tanggung Jawab');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `nomor` varchar(20) DEFAULT NULL,
  `id_diklat` int(11) NOT NULL,
  `id_instansi` int(11) NOT NULL,
  `verif` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `id_peserta`, `nomor`, `id_diklat`, `id_instansi`, `verif`) VALUES
(2, 4, 'NPD0001', 2, 1, '1'),
(4, 4, 'NPD0001', 3, 1, '1'),
(5, 6, 'NPD0001', 4, 2, '1'),
(6, 4, 'NPD0002', 4, 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(11) NOT NULL,
  `nm_peserta` varchar(50) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `tmpt_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(20) NOT NULL,
  `hp_peserta` varchar(20) NOT NULL,
  `email_peserta` varchar(50) NOT NULL,
  `pendidikan` varchar(30) NOT NULL,
  `pas_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `nm_peserta`, `nip`, `tmpt_lahir`, `tgl_lahir`, `jk`, `hp_peserta`, `email_peserta`, `pendidikan`, `pas_foto`) VALUES
(4, 'Aimyon', '131313', 'Banjarmasin', '2000-06-15', 'Perempuan', '081391701913', 'aimyon@gmail.com', 'Sarjana', '93624.jpg'),
(5, 'Curt Cobain', '121212', 'London West', '1990-06-14', 'Laki-laki', '081391701910', 'curt@mail.com', 'SLTA', '78672.jpg'),
(6, 'Rizal', '13333337', 'Banjarbaru', '1997-06-22', 'Laki-laki', '081391701913', 'rizaldev@gmail.com', 'Sarjana', '61753.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nm_ruangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nm_ruangan`) VALUES
(1, 'Ruangan 1'),
(2, 'Ruangan 2');

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id_sertifikat` int(11) NOT NULL,
  `id_diklat` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `materi` text NOT NULL,
  `sertifikat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sertifikat`
--

INSERT INTO `sertifikat` (`id_sertifikat`, `id_diklat`, `id_peserta`, `materi`, `sertifikat`) VALUES
(3, 4, 6, 'https://drive.google.com/file/d/1TYVrNLbFPK95fF_TrdRg4DPfB7vAxvt6/view?usp=sharing', 'https://drive.google.com/file/d/1nCAidMcWgTIr0Ql_MvJjALT5R7r00dqw/view?usp=sharing');

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `id_tutor` int(11) NOT NULL,
  `nm_tutor` varchar(50) NOT NULL,
  `pendidikan` varchar(30) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `hp_tutor` varchar(20) NOT NULL,
  `email_tutor` varchar(50) NOT NULL,
  `domisili` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`id_tutor`, `nm_tutor`, `pendidikan`, `jabatan`, `hp_tutor`, `email_tutor`, `domisili`) VALUES
(1, 'Steve Jobs', 'Sarjana', 'Bendahara', '081278909090', 'steve@apple.com', 'Banjarmasin'),
(2, 'Muhammad Hammidy', 'Sarjana', 'Kadiv Kominfo', '085248176794', 'hammidy@gmail.com', 'Banjarbaru'),
(3, 'Ayu', 'Sarjana', 'Sekdiv Kominfo', '085248176794', 'ayu@mail.com', 'Banjarmasin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_peserta` int(11) DEFAULT NULL,
  `nm_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_peserta`, `nm_user`, `username`, `password`, `level`) VALUES
(1, NULL, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
(2, NULL, 'Kepala Balai', 'kabalai', '31ac85c0b4ec3a2d975be82d07834f69', '2'),
(3, 4, 'Aimyon', 'aimyon', '83f6d8891c564d387e7598f8a2b65545', '3'),
(4, 5, 'Curt Cobain', 'curt', '0d9ab6066a79ccddb295cbd1be995201', '3'),
(6, 6, 'Rizal', 'rizal', '150fb021c56c33f82eef99253eb36ee1', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `award`
--
ALTER TABLE `award`
  ADD PRIMARY KEY (`id_award`),
  ADD KEY `id_diklat` (`id_diklat`),
  ADD KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `diklat`
--
ALTER TABLE `diklat`
  ADD PRIMARY KEY (`id_diklat`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`),
  ADD KEY `id_diklat` (`id_diklat`),
  ADD KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `id_peserta` (`id_peserta`),
  ADD KEY `id_diklat` (`id_diklat`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id_sertifikat`),
  ADD KEY `id_diklat` (`id_diklat`),
  ADD KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`id_tutor`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_peserta` (`id_peserta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `award`
--
ALTER TABLE `award`
  MODIFY `id_award` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `diklat`
--
ALTER TABLE `diklat`
  MODIFY `id_diklat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id_instansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tutor`
--
ALTER TABLE `tutor`
  MODIFY `id_tutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `award`
--
ALTER TABLE `award`
  ADD CONSTRAINT `award_ibfk_1` FOREIGN KEY (`id_diklat`) REFERENCES `diklat` (`id_diklat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `award_ibfk_2` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD CONSTRAINT `kehadiran_ibfk_1` FOREIGN KEY (`id_diklat`) REFERENCES `diklat` (`id_diklat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kehadiran_ibfk_2` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`id_diklat`) REFERENCES `diklat` (`id_diklat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD CONSTRAINT `sertifikat_ibfk_1` FOREIGN KEY (`id_diklat`) REFERENCES `diklat` (`id_diklat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sertifikat_ibfk_2` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
