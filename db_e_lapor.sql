-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Des 2023 pada 04.27
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_e_lapor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `alamat_email` varchar(100) NOT NULL,
  `foto_profil` varchar(1000) NOT NULL,
  `role` tinytext NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `nomor_telepon`, `alamat_email`, `foto_profil`, `role`) VALUES
(2001, 'admin', 'admin', '', '', '', '', '1'),
(2003, 'admin2', 'admin2', '', '', '', '', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengaduan`
--

CREATE TABLE `tb_pengaduan` (
  `id_pengaduan` int(10) NOT NULL,
  `id_pengguna` int(10) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `file_bukti` varchar(1000) NOT NULL,
  `tanggal_pengaduan` datetime NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengaduan`
--

INSERT INTO `tb_pengaduan` (`id_pengaduan`, `id_pengguna`, `deskripsi`, `file_bukti`, `tanggal_pengaduan`, `status`) VALUES
(10, 1002, 'budi melaporkan', 'Honda Beat.jpeg', '2023-12-31 10:12:29', 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `alamat_email` varchar(100) NOT NULL,
  `foto_profil` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `username`, `password`, `nama_lengkap`, `nomor_telepon`, `alamat_email`, `foto_profil`) VALUES
(1001, 'alexander', 'alexander', 'alexander kurniawan', '08213456789', 'alexkurniawan@gmail.com', ''),
(1002, 'budi', 'budi', 'budi santoso', '08123456666', 'budisantoso@gmail.com', ''),
(1003, 'ani', 'ani', 'ani wijaya', '08123456789', 'aniwijaya@gmail.com', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tanggapan`
--

CREATE TABLE `tb_tanggapan` (
  `id_tanggapan` int(10) NOT NULL,
  `id_pengaduan` int(10) NOT NULL,
  `id_petugas` int(10) NOT NULL,
  `tanggapan` longtext NOT NULL,
  `tanggal_tanggapan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tanggapan`
--

INSERT INTO `tb_tanggapan` (`id_tanggapan`, `id_pengaduan`, `id_petugas`, `tanggapan`, `tanggal_tanggapan`) VALUES
(6, 10, 2001, 'admin menanggapi', '2023-12-31 10:18:37');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`,`password`);

--
-- Indeks untuk tabel `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `username` (`username`,`password`);

--
-- Indeks untuk tabel `tb_tanggapan`
--
ALTER TABLE `tb_tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2004;

--
-- AUTO_INCREMENT untuk tabel `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  MODIFY `id_pengaduan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- AUTO_INCREMENT untuk tabel `tb_tanggapan`
--
ALTER TABLE `tb_tanggapan`
  MODIFY `id_tanggapan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
