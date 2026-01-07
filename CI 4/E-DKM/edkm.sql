-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jan 2022 pada 09.13
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edkm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) UNSIGNED NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `tgl_kegiatan` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id`, `kategori_id`, `tgl_kegiatan`, `foto`, `created_at`, `updated_at`) VALUES
(1, 5, '09/07/2021', '1632297091_19f85071ecc7856171ce.jpg', '2021-09-22 14:51:31', '2021-09-22 14:51:31'),
(2, 5, '07/09/2021', '1632297583_8537d9330223c695247c.jpg', '2021-09-22 14:59:43', '2021-09-22 14:59:43'),
(3, 5, '03/10/2021', '1632297612_7325ac1ac8a088b163e6.jpg', '2021-09-22 15:00:12', '2021-09-22 15:00:12'),
(4, 1, '09/17/2021', '1632299609_88f47d61e43a1c2c3ec7.jpeg', '2021-09-22 15:33:29', '2021-09-22 15:33:29'),
(5, 1, '09/12/2021', '1632299635_8f0fe32f23c5aaec519f.jpeg', '2021-09-22 15:33:55', '2021-09-22 15:33:55'),
(6, 1, '09/13/2021', '1632299664_fa808f96d0c11671d128.jpeg', '2021-09-22 15:34:24', '2021-09-22 15:34:24'),
(7, 4, '09/10/2021', '1632300051_383a95ce386eeee78721.jpg', '2021-09-22 15:40:51', '2021-09-22 15:40:51'),
(8, 4, '09/13/2021', '1632300088_db82f62d8a5200475af9.jpg', '2021-09-22 15:41:28', '2021-09-22 15:41:28'),
(10, 4, '09/13/2021', '1632300400_402b7bd42505343facf5.jpg', '2021-09-22 15:46:41', '2021-09-22 15:46:41'),
(12, 3, '10/04/2021', '1633499945_9d04b135c12ba069c1da.jpg', '2021-10-06 12:59:05', '2021-10-06 12:59:05'),
(15, 3, '10/11/2021', '1634282697_a90621ae64bd0aa00001.jpg', '2021-10-15 14:24:57', '2021-10-15 14:24:57'),
(19, 9, '12/01/2021', '1638682394_e54e79477c488587acef.jpg', '2021-12-05 12:33:14', '2021-12-05 12:33:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_foto`
--

CREATE TABLE `kategori_foto` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kategori_foto`
--

INSERT INTO `kategori_foto` (`id`, `nama_kategori`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Pengajian', 'pengajian', '2021-12-04 15:55:01', '2021-12-04 15:55:01'),
(2, 'Bukber', 'bukber', '2021-12-04 15:55:01', '2021-12-04 15:55:01'),
(3, 'Rapat Pengurus', 'rapat-pengurus', '2021-12-04 15:55:01', '2021-12-04 15:55:01'),
(4, 'Pesantren Kilat', 'pesantren-kilat', '2021-12-04 15:55:01', '2021-12-04 15:55:01'),
(5, 'Kurban', 'kurban', '2021-12-04 15:55:01', '2021-12-04 15:55:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_keuangan`
--

CREATE TABLE `laporan_keuangan` (
  `id` int(11) UNSIGNED NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `pemasukkan` varchar(100) NOT NULL,
  `pengeluaran` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `laporan_keuangan`
--

INSERT INTO `laporan_keuangan` (`id`, `tanggal`, `keterangan`, `pemasukkan`, `pengeluaran`, `created_at`, `updated_at`) VALUES
(2, '10/01/2021', 'Infak dari warga', '100000', '0', '2021-10-01 15:08:04', '2021-10-01 15:08:04'),
(3, '08/18/2021', 'Infak dari warga', '250000', '0', '2021-10-01 15:08:39', '2021-10-01 15:08:39'),
(6, '10/04/2021', 'Beli semen 5 sak', '0', '260000', '2021-10-04 11:05:14', '2021-10-04 11:05:14'),
(10, '09/27/2021', 'Beli sapu', '0', '20000', '2021-10-04 11:21:20', '2021-10-04 11:21:20'),
(11, '09/26/2021', 'Beli sejadah', '0', '250000', '2021-10-04 11:28:18', '2021-10-04 11:28:18'),
(13, '01/20/2021', 'Infak dari warga', '150000', '0', '2021-10-05 12:09:04', '2021-10-05 12:09:04'),
(14, '01/23/2021', 'Infak dari warga', '50000', '0', '2021-10-06 11:31:57', '2021-10-06 11:31:57'),
(15, '01/04/2021', 'Beli sapu', '0', '50000', '2021-10-06 11:58:21', '2021-10-06 11:58:21'),
(16, '02/16/2021', 'Infak dari warga', '100000', '0', '2021-10-10 20:41:16', '2021-10-10 20:41:16'),
(17, '09/21/2021', 'Infak dari warga', '150000', '0', '2021-10-11 12:18:40', '2021-10-11 12:18:40'),
(18, '11/04/2021', 'Infak dari warga', '100000', '0', '2021-11-06 21:43:32', '2021-11-06 21:43:32'),
(19, '12/01/2021', 'Infak dari warga', '150000', '0', '2021-12-01 21:17:39', '2021-12-01 21:17:39'),
(20, '12/01/2021', 'Beli sapu', '0', '10000', '2021-12-04 10:53:29', '2021-12-04 10:53:29'),
(21, '01/06/2022', 'Infak dari warga', '150000', '0', '2022-01-07 15:03:03', '2022-01-07 15:03:03'),
(22, '01/07/2022', 'Beli sapu', '0', '20000', '2022-01-07 15:03:50', '2022-01-07 15:03:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(7, '2021-09-13-035339', 'App\\Database\\Migrations\\Pengurus', 'default', 'App', 1631694188, 1),
(8, '2021-09-15-071443', 'App\\Database\\Migrations\\Sumbangan', 'default', 'App', 1631694188, 1),
(9, '2021-09-16-082633', 'App\\Database\\Migrations\\Galeri', 'default', 'App', 1631796838, 2),
(10, '2021-10-01-071758', 'App\\Database\\Migrations\\LaporanKeuangan', 'default', 'App', 1633073337, 3),
(11, '2021-09-10-061723', 'App\\Database\\Migrations\\Users', 'default', 'App', 1633852778, 4),
(12, '2021-12-04-084704', 'App\\Database\\Migrations\\KategoriFoto', 'default', 'App', 1638607785, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengurus`
--

CREATE TABLE `pengurus` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pengurus`
--

INSERT INTO `pengurus` (`id`, `name`, `alamat`, `no_telp`, `jabatan`, `created_at`, `updated_at`) VALUES
(1, 'Johan Sitoru S.I', 'Dk. Barasak No. 267', '0812456789', 'Ketua', '1984-08-30 16:10:02', '2021-12-04 11:58:37'),
(2, 'Ibrahim Adriansyah', 'Jln. Industri No. 810', '0812456789', 'Wakil Ketua', '2008-02-13 22:08:57', '2021-09-15 03:23:56'),
(3, 'Carla Ellis Rahayu S.Gz', 'Jr. Bak Mandi No. 786', '0812456789', 'Bendahara', '1979-10-15 14:21:51', '2021-09-15 03:23:56'),
(4, 'Tasnim Pangestu S.Ked', 'Ds. Casablanca No. 40', '0812456789', 'Sekertaris', '2014-07-08 06:36:56', '2021-09-15 03:23:56'),
(5, 'Umar Hutagalung', 'Ds. Jakarta No. 539', '0812456789', 'Ketua Bidang Dakwah', '1992-07-26 13:47:38', '2021-09-15 03:23:56'),
(6, 'Rini Yuniar', 'Kpg. Sampangan No. 706', '0812456789', 'Anggota Bidah Dakwah', '1972-02-28 07:35:25', '2021-09-15 03:23:56'),
(7, 'Hairyanto Adiarja Hutapea S.I.Kom', 'Dk. Sunaryo No. 464', '0812456789', 'Ketua Bidang Pendidikan Dan Pelatihan', '2019-12-27 05:02:51', '2021-09-15 03:23:56'),
(8, 'Dina Hassanah', 'Kpg. Bata Putih No. 497', '0812456789', 'Anggota Bidang Pendidikan Dan Pelatihan', '2011-04-13 10:09:51', '2021-09-15 03:23:56'),
(9, 'Kalim Prasasta', 'Kpg. Samanhudi No. 771', '0812456789', 'Ketua Bidang Organisasi dan Kelembagaan', '1980-05-10 07:19:16', '2021-09-15 03:23:56'),
(10, 'Kasiyah Gasti Agustina', 'Jr. Padma No. 344', '0812456789', 'Anggota Bidang Organisasi dan Kelembagaan', '1991-12-07 17:18:15', '2021-09-15 03:23:56'),
(28, 'Ridho Aditya', 'Komp.Guru Minda no.25 RT.04/11 Tanah tinggi, Tangerang', '081219832835', 'Anggota pki', '2021-12-04 12:03:35', '2021-12-04 12:03:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sumbangan`
--

CREATE TABLE `sumbangan` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `bukti_transfer` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `sumbangan`
--

INSERT INTO `sumbangan` (`id`, `name`, `no_telp`, `jumlah`, `pesan`, `bukti_transfer`, `created_at`, `updated_at`) VALUES
(3, 'Joko', '0812348123', '100000', 'Semoga berkah', '1631939237_8b7f6f248be2ec3ab5c6.jpg', '2021-09-18 11:27:17', '2021-09-18 11:27:17'),
(4, 'Adi Kusuma', '08123488123', '75000', 'Berkah Selalu', '1631939279_55134bdaab0716d76213.jpg', '2021-09-18 11:27:59', '2021-09-18 11:27:59'),
(8, 'Ridho Aditya', '08123421515', '100000', 'halooo', '1635740647_1ffe1fd30054389da9f5.jpg', '2021-11-01 11:24:07', '2021-11-01 11:24:07'),
(9, 'Maung Bandung', '09124512312', '100000', 'asdasdasd', '1635742088_586ce668bdc82258f89a.jpg', '2021-11-01 11:48:08', '2021-11-01 11:48:08'),
(10, 'Maung Bandung', '08141551125', '100000', 'haloo', '1635742864_55eb55c922fb5b13e423.jpg', '2021-11-01 12:01:04', '2021-11-01 12:01:04'),
(11, 'Ridho Aditya', '081237487124', '120000', 'Semoga berkah', '1638368056_d1f757058296741184a5.jpg', '2021-12-01 21:14:16', '2021-12-01 21:14:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin', 'rajahutan31245@gmail.com', '$2y$10$N8RnUmUfRMexhO6SyUxoveSoPP9Sej40M.SAr43h.qUkAaepJrY.6', 1, '1995-03-15 20:32:17', '2021-12-04 15:27:29'),
(2, 'Ridho Aditya Nurtama', 'ridho', 'r2603an@gmail.com', '$2y$10$ZaSKqRFSr.BvUlf6OBgn2uiejpGMwZs4buPwtxx73jGLUDCw6v2VC', 2, '2007-04-16 05:34:23', '2021-12-21 16:26:56'),
(3, 'Sandhika Maulana', 'sandhika', 'sandikamaulana@gmail.com', '$2y$10$nLe3i6RMbUdKUBn2NSfd1.XLoP7WcyQLT6TgYmwnbaZP1ppyq8jCG', 2, '1992-08-18 01:46:24', '2021-12-22 11:03:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'sandikamaulana@gmail.com', '13ba8ed2e520748bbf30868f774b70c0', 1640254011),
(2, 'rajahutan31245@gmail.com', '5408abfc7508f7d2d39105808b0975e7', 1640254058);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_foto`
--
ALTER TABLE `kategori_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sumbangan`
--
ALTER TABLE `sumbangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `kategori_foto`
--
ALTER TABLE `kategori_foto`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `sumbangan`
--
ALTER TABLE `sumbangan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
