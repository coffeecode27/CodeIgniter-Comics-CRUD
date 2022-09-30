-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 30 Sep 2022 pada 22.11
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajarci4`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `komik`
--

CREATE TABLE `komik` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `sampul` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komik`
--

INSERT INTO `komik` (`id`, `judul`, `slug`, `penulis`, `penerbit`, `sampul`, `created_at`, `updated_at`) VALUES
(1, 'Naruto', 'naruto', 'Masashi Kishimoto', 'Shonen Jump', 'naruto.jpg', '2022-08-28 21:11:58', '2022-08-28 21:11:58'),
(2, 'One Punch Man', 'one-punch-man', 'Yusuke Murata', 'Jump Comics', 'opm.jpeg', '2022-08-28 21:11:58', '2022-08-28 21:11:58'),
(3, 'Jujutsu Kaisen', 'jujutsu-kaisen', 'Gege Akutami', 'Jump Comics', 'jujutsu.jpg', '2022-08-29 15:13:11', '2022-08-29 15:13:11'),
(10, 'test 4', 'test-4', 'eretet', 'teret', '1661981766_ead61d03288c8b35acbc.jpg', '2022-08-31 14:15:46', '2022-08-31 16:36:06');

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
(1, '2022-09-01-161304', 'App\\Database\\Migrations\\Orang', 'default', 'App', 1662049238, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orang`
--

CREATE TABLE `orang` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `orang`
--

INSERT INTO `orang` (`id`, `nama`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Darmana Paiman Permadi M.Ak', 'Ki. Hasanuddin No. 421, Pangkal Pinang 12113, Bali', '2001-11-26 21:53:56', '2022-09-01 12:39:02'),
(2, 'Vanya Agustina', 'Jr. Gotong Royong No. 691, Bitung 85242, Lampung', '1995-08-16 04:44:02', '2022-09-01 12:39:02'),
(3, 'Nova Utami M.Ak', 'Psr. Tambun No. 565, Bontang 45605, Jabar', '1992-09-21 12:36:24', '2022-09-01 12:39:02'),
(4, 'Marsito Paiman Halim S.E.I', 'Psr. Yap Tjwan Bing No. 426, Kotamobagu 83705, Kaltara', '2014-07-01 04:25:35', '2022-09-01 12:39:02'),
(5, 'Rahmat Ganep Sirait S.Farm', 'Jr. Jend. Sudirman No. 527, Kupang 52941, DKI', '1994-09-27 17:22:38', '2022-09-01 12:39:02'),
(6, 'Harjo Saadat Wijaya', 'Gg. Babadak No. 808, Kediri 13420, NTB', '2016-03-28 22:10:55', '2022-09-01 12:39:02'),
(7, 'Septi Aryani', 'Kpg. Otto No. 446, Denpasar 13226, Jabar', '1977-07-09 01:01:16', '2022-09-01 12:39:02'),
(8, 'Nilam Kartika Nuraini', 'Psr. Bata Putih No. 220, Banjarbaru 19066, Kalbar', '1993-11-20 21:26:12', '2022-09-01 12:39:02'),
(9, 'Gangsar Imam Firmansyah S.E.I', 'Psr. Wahidin Sudirohusodo No. 538, Sungai Penuh 37969, Babel', '1973-03-11 00:06:24', '2022-09-01 12:39:02'),
(10, 'Faizah Nasyidah', 'Ki. Baranangsiang No. 787, Salatiga 31022, DIY', '1982-03-28 00:59:05', '2022-09-01 12:39:02'),
(11, 'Tirtayasa Kenzie Saptono S.IP', 'Kpg. Sugiyopranoto No. 988, Surakarta 67935, NTT', '2006-03-14 09:27:50', '2022-09-01 12:39:02'),
(12, 'Upik Prasetyo', 'Psr. Jaksa No. 622, Solok 50584, Babel', '2013-06-13 17:37:06', '2022-09-01 12:39:02'),
(13, 'Mutia Farida', 'Kpg. Sentot Alibasa No. 425, Palembang 63280, Sumsel', '2018-07-02 16:50:24', '2022-09-01 12:39:03'),
(14, 'Ulya Sudiati', 'Jln. Yogyakarta No. 136, Padangpanjang 95747, Sulbar', '1972-06-20 17:12:24', '2022-09-01 12:39:03'),
(15, 'Leo Hartana Mandala', 'Dk. Sugiyopranoto No. 78, Surakarta 55476, Malut', '1987-07-09 04:24:30', '2022-09-01 12:39:03'),
(16, 'Siti Amelia Fujiati S.Ked', 'Dk. Monginsidi No. 682, Dumai 30078, Jambi', '1990-12-08 06:48:22', '2022-09-01 12:39:03'),
(17, 'Ophelia Fujiati', 'Dk. Bara Tambar No. 538, Sorong 61438, DIY', '1999-01-31 19:02:24', '2022-09-01 12:39:03'),
(18, 'Elisa Gabriella Rahimah S.T.', 'Jr. Bakhita No. 87, Parepare 65679, Jabar', '1986-12-10 23:54:19', '2022-09-01 12:39:03'),
(19, 'Paiman Galang Haryanto', 'Ki. Asia Afrika No. 479, Prabumulih 83327, Sulsel', '2017-05-06 17:12:50', '2022-09-01 12:39:03'),
(20, 'Zizi Suartini S.H.', 'Kpg. Bara Tambar No. 72, Padangsidempuan 94973, Sulteng', '1990-07-06 07:49:37', '2022-09-01 12:39:03');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `komik`
--
ALTER TABLE `komik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orang`
--
ALTER TABLE `orang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `komik`
--
ALTER TABLE `komik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `orang`
--
ALTER TABLE `orang`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
