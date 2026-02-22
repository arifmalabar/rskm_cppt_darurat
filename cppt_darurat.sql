-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Feb 2026 pada 15.23
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cppt_darurat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cppt`
--

CREATE TABLE `cppt` (
  `id` int(100) NOT NULL,
  `id_kunjungan` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `oleh` varchar(200) NOT NULL,
  `ppa` varchar(200) NOT NULL,
  `subyektif` longtext NOT NULL,
  `obyektif` longtext NOT NULL,
  `assesment` longtext NOT NULL,
  `planning` longtext NOT NULL,
  `tanggal_rencana_pulang` datetime NOT NULL,
  `status_sbar` int(11) NOT NULL,
  `status_tbak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cppt`
--

INSERT INTO `cppt` (`id`, `id_kunjungan`, `tanggal`, `oleh`, `ppa`, `subyektif`, `obyektif`, `assesment`, `planning`, `tanggal_rencana_pulang`, `status_sbar`, `status_tbak`) VALUES
(1, 1, '2026-02-22 19:49:38', 'ppsa', 'ppsa', 'Subyektif', 'Obyektif', 'Assesment', 'Planning', '2025-12-12 12:12:00', 1, 1),
(2, 1, '2026-02-22 20:06:14', 'dr.insan', 'dr.insan', 'okkas', 'ello', 'asas', 'asa', '2026-12-12 16:16:00', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunjungan`
--

CREATE TABLE `kunjungan` (
  `id_kunjungan` int(100) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `norm` varchar(100) NOT NULL,
  `tgl_kunjungan` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kunjungan`
--

INSERT INTO `kunjungan` (`id_kunjungan`, `id_ruangan`, `norm`, `tgl_kunjungan`) VALUES
(1, 1, '1280065', '2026-02-22 19:08:46'),
(2, 1, '1280065', '2026-02-22 00:00:00'),
(3, 1, '1280065', '2026-02-21 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `norm` varchar(100) NOT NULL,
  `nama_pasien` varchar(200) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`norm`, `nama_pasien`, `tgl_lahir`, `jenis_kelamin`) VALUES
('1280065', 'insan hakiki', '2002-04-12', 1),
('3', 'ridho', '2022-12-12', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`) VALUES
(1, 'poli umum');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cppt`
--
ALTER TABLE `cppt`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`id_kunjungan`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`norm`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cppt`
--
ALTER TABLE `cppt`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `id_kunjungan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
