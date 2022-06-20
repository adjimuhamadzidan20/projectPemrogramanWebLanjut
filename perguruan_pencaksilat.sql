-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jun 2022 pada 06.40
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perguruan_pencaksilat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_anggota`
--

CREATE TABLE `dt_anggota` (
  `ID_anggota` int(10) NOT NULL,
  `Nama_lengkap` varchar(100) NOT NULL,
  `Jenis_kelamin` varchar(15) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Sabuk` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dt_anggota`
--

INSERT INTO `dt_anggota` (`ID_anggota`, `Nama_lengkap`, `Jenis_kelamin`, `Alamat`, `Sabuk`) VALUES
(1001, 'Evelyn Efriliani', 'Perempuan', 'Jakarta Selatan', 'Biru'),
(1002, 'Adji Muhamad Zidan', 'Laki-laki', 'Kota Bekasi', 'Coklat'),
(1005, 'Abdul Said', 'Laki-laki', 'Kota Bekasi', 'Biru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_cabang`
--

CREATE TABLE `dt_cabang` (
  `ID_cabang` int(10) NOT NULL,
  `Nama_cabang` varchar(100) NOT NULL,
  `Penanggung_jawab` varchar(100) NOT NULL,
  `Jumlah_anggota` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dt_cabang`
--

INSERT INTO `dt_cabang` (`ID_cabang`, `Nama_cabang`, `Penanggung_jawab`, `Jumlah_anggota`) VALUES
(1101, 'Petamburan RW. 1', 'Rizki Muhammad Ridwan', 0),
(1103, 'Matraman', 'Adi Kurnia Salam', 0),
(1104, 'Padel', 'Muhammad Akbar Asya', 0),
(1105, 'Rawa Bunga', 'Eka Santika Putri', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_jadwal_latihan`
--

CREATE TABLE `dt_jadwal_latihan` (
  `ID_latihan` int(10) NOT NULL,
  `Hari` varchar(20) NOT NULL,
  `ID_pelatih` int(10) NOT NULL,
  `ID_cabang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dt_jadwal_latihan`
--

INSERT INTO `dt_jadwal_latihan` (`ID_latihan`, `Hari`, `ID_pelatih`, `ID_cabang`) VALUES
(1401, 'Rabu', 1201, 1101);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_keuangan`
--

CREATE TABLE `dt_keuangan` (
  `ID_keuangan` int(10) NOT NULL,
  `Tanggal_Pembayaran` varchar(20) NOT NULL,
  `Nominal` int(100) NOT NULL,
  `Keterangan` varchar(100) NOT NULL,
  `ID_anggota` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dt_keuangan`
--

INSERT INTO `dt_keuangan` (`ID_keuangan`, `Tanggal_Pembayaran`, `Nominal`, `Keterangan`, `ID_anggota`) VALUES
(1301, '2022-06-15', 50000, 'Sudah Membayar', 1002),
(1308, '2022-06-15', 50000, 'Sudah Membayar', 1005),
(1311, '2022-06-15', 50000, 'Sudah Membayar', 1001);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_pelatih`
--

CREATE TABLE `dt_pelatih` (
  `ID_pelatih` int(10) NOT NULL,
  `Nama_pelatih` varchar(100) NOT NULL,
  `Tanggal_lahir` varchar(20) NOT NULL,
  `Jenis_kelamin` varchar(15) NOT NULL,
  `Sabuk` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dt_pelatih`
--

INSERT INTO `dt_pelatih` (`ID_pelatih`, `Nama_pelatih`, `Tanggal_lahir`, `Jenis_kelamin`, `Sabuk`) VALUES
(1201, 'Abdullah Dzaki', '21 Juli 2005', 'Laki-laki', 'Merah'),
(1203, 'Dimas Prayoga', '2004-02-13', 'laki-laki', 'Merah');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dt_anggota`
--
ALTER TABLE `dt_anggota`
  ADD PRIMARY KEY (`ID_anggota`);

--
-- Indeks untuk tabel `dt_cabang`
--
ALTER TABLE `dt_cabang`
  ADD PRIMARY KEY (`ID_cabang`);

--
-- Indeks untuk tabel `dt_jadwal_latihan`
--
ALTER TABLE `dt_jadwal_latihan`
  ADD PRIMARY KEY (`ID_latihan`),
  ADD KEY `ID_pelatih` (`ID_pelatih`),
  ADD KEY `ID_cabang` (`ID_cabang`);

--
-- Indeks untuk tabel `dt_keuangan`
--
ALTER TABLE `dt_keuangan`
  ADD PRIMARY KEY (`ID_keuangan`),
  ADD KEY `ID_anggota` (`ID_anggota`);

--
-- Indeks untuk tabel `dt_pelatih`
--
ALTER TABLE `dt_pelatih`
  ADD PRIMARY KEY (`ID_pelatih`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dt_anggota`
--
ALTER TABLE `dt_anggota`
  MODIFY `ID_anggota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1013;

--
-- AUTO_INCREMENT untuk tabel `dt_cabang`
--
ALTER TABLE `dt_cabang`
  MODIFY `ID_cabang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1107;

--
-- AUTO_INCREMENT untuk tabel `dt_jadwal_latihan`
--
ALTER TABLE `dt_jadwal_latihan`
  MODIFY `ID_latihan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1406;

--
-- AUTO_INCREMENT untuk tabel `dt_keuangan`
--
ALTER TABLE `dt_keuangan`
  MODIFY `ID_keuangan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1313;

--
-- AUTO_INCREMENT untuk tabel `dt_pelatih`
--
ALTER TABLE `dt_pelatih`
  MODIFY `ID_pelatih` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1205;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dt_jadwal_latihan`
--
ALTER TABLE `dt_jadwal_latihan`
  ADD CONSTRAINT `dt_jadwal_latihan_ibfk_1` FOREIGN KEY (`ID_pelatih`) REFERENCES `dt_pelatih` (`ID_pelatih`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dt_jadwal_latihan_ibfk_2` FOREIGN KEY (`ID_cabang`) REFERENCES `dt_cabang` (`ID_cabang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dt_keuangan`
--
ALTER TABLE `dt_keuangan`
  ADD CONSTRAINT `dt_keuangan_ibfk_1` FOREIGN KEY (`ID_anggota`) REFERENCES `dt_anggota` (`ID_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
