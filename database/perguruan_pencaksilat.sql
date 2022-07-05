-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2022 pada 16.37
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
(1014, 'Saiful', 'Laki-laki', 'Cikarang', 'Orange'),
(1015, 'Sintia Siska', 'Perempuan', 'JL Elang Raya III', 'Biru'),
(1016, 'Rizky Riza', 'Laki-laki', 'JL Mahakaryamu', 'Biru'),
(1017, 'Vincent', 'Laki-laki', 'JL Mahakarya Satu', 'Biru'),
(1018, 'Saifudin', 'Laki-laki', 'JL Pemuda Pancasila', 'Biru');

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
(1107, 'Petamburan RPTRA', 'Sarah Kartika Ningrum', 0),
(1108, 'Rawa Bunga', 'Eka Santika Putri', 0),
(1109, 'SMPN 67 Jakarta Selatan', 'Sri Dahlia', 0),
(1110, 'Al - Falah', 'Rifqih Rizqullah', 0);

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
(1401, 'Rabu', 1201, 1101),
(1408, 'Jumat, dan Sabtu', 1216, 1107),
(1409, 'Jumat, dan Sabtu', 1207, 1103),
(1410, 'Jumat, dan Sabtu', 1212, 1104),
(1411, 'Rabu, dan Jumat', 1217, 1109);

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
(1311, '2022-06-15', 50000, 'Sudah Membayar', 1001),
(1314, '2022-07-04', 50000, 'Sudah Membayar', 1015),
(1315, '2022-07-04', 50000, 'Sudah Membayar', 1016),
(1316, '2022-07-04', 50000, 'Sudah Membayar', 1017),
(1317, '2022-07-04', 50000, 'Sudah Membayar', 1018);

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
(1206, 'Dimas Prayoga', '2004-02-13', 'Laki-laki', 'Merah'),
(1207, 'Adi Kurnia Salam', '2003-11-17', 'Laki-laki', 'Merah'),
(1208, 'Evelyn Efriliani', '2005-04-15', 'Perempuan', 'Biru'),
(1209, 'Medina Dwi Hamid', '2005-02-07', 'Perempuan', 'Biru'),
(1210, 'Mochammad Zidan Alfiandy', '2003-07-20', 'Laki-laki', 'Merah'),
(1211, 'Muhammad Rizal Alfarizi', '2004-09-02', 'Laki-laki', 'Merah'),
(1212, 'Muhammad Akbar Asya', '2003-11-12', 'Laki-laki', 'Merah'),
(1213, 'Nailah Labibah', '2005-08-08', 'Perempuan', 'Merah'),
(1214, 'Nazla Shofana Monri', '2004-03-07', 'Perempuan', 'Merah'),
(1215, 'Rizki Muhammad Ridwan', '2003-05-06', 'Laki-laki', 'Merah'),
(1216, 'Sarah Hartika Ningrum', '2002-06-12', 'Perempuan', 'Merah'),
(1217, 'Sri Dahlia', '2002-09-13', 'Perempuan', 'Merah'),
(1218, 'Yasha Hidayah', '2005-03-13', 'Perempuan', 'Merah'),
(1219, 'Zakiyah Annisa Bahtiar', '2005-02-21', 'Perempuan', 'Merah');

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
  MODIFY `ID_anggota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1019;

--
-- AUTO_INCREMENT untuk tabel `dt_cabang`
--
ALTER TABLE `dt_cabang`
  MODIFY `ID_cabang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1111;

--
-- AUTO_INCREMENT untuk tabel `dt_jadwal_latihan`
--
ALTER TABLE `dt_jadwal_latihan`
  MODIFY `ID_latihan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1412;

--
-- AUTO_INCREMENT untuk tabel `dt_keuangan`
--
ALTER TABLE `dt_keuangan`
  MODIFY `ID_keuangan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1318;

--
-- AUTO_INCREMENT untuk tabel `dt_pelatih`
--
ALTER TABLE `dt_pelatih`
  MODIFY `ID_pelatih` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1220;

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
