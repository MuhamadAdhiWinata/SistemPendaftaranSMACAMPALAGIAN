-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 29 Jun 2024 pada 09.30
-- Versi server: 10.5.20-MariaDB
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id22353485_proyek_sistem`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `level`) VALUES
(1, 'bintangnasution._', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(2, 'administrator', '202cb962ac59075b964b07152d234b70', 1),
(0, 'adhi', '81dc9bdb52d04dc20036dbd8313ed055', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kartupelajar`
--

CREATE TABLE `kartupelajar` (
  `ID` int(11) NOT NULL,
  `PendaftaranID` int(11) DEFAULT NULL,
  `FotoSiswa` blob DEFAULT NULL,
  `InformasiJurusan` varchar(100) DEFAULT NULL,
  `TanggalPendaftaran` date DEFAULT NULL,
  `TanggalMulaiSekolah` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugasppdb`
--

CREATE TABLE `petugasppdb` (
  `ID` int(11) NOT NULL,
  `Nama` varchar(100) DEFAULT NULL,
  `Jabatan` varchar(100) DEFAULT NULL,
  `NomorKontak` varchar(15) DEFAULT NULL,
  `JadwalKonsultasi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `petugasppdb`
--

INSERT INTO `petugasppdb` (`ID`, `Nama`, `Jabatan`, `NomorKontak`, `JadwalKonsultasi`) VALUES
(215610048, 'Bintang Nasution S.pd', 'Tata Usaha', '083127859696', '2024-04-22'),
(215610051, 'Rinaldi Rizqi Mulya S.kom', 'Guru', '085312341233', '2024-08-08'),
(215610052, 'Chairul Nur Insan S.Kom', 'Guru', '085263839291', '2024-05-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `seleksi`
--

CREATE TABLE `seleksi` (
  `ID` int(11) NOT NULL,
  `PendaftaranID` int(11) DEFAULT NULL,
  `KriteriaSeleksi` text DEFAULT NULL,
  `HasilSeleksi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `ID` int(11) NOT NULL,
  `Nama` varchar(100) DEFAULT NULL,
  `TempatLahir` varchar(100) DEFAULT NULL,
  `TanggalLahir` date DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `NomorTelepon` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `SekolahAsal` varchar(100) DEFAULT NULL,
  `NilaiRapor` float DEFAULT NULL,
  `DokumenIdentitas` varchar(100) DEFAULT NULL,
  `FotoSiswa` varchar(50) DEFAULT NULL,
  `PilihanJurusan` varchar(100) DEFAULT NULL,
  `is_accepted` enum('Diterima','Ditinjau','Ditolak','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`ID`, `Nama`, `TempatLahir`, `TanggalLahir`, `Alamat`, `NomorTelepon`, `Email`, `SekolahAsal`, `NilaiRapor`, `DokumenIdentitas`, `FotoSiswa`, `PilihanJurusan`, `is_accepted`) VALUES
(1010, 'Chairul Nur Insan', 'Kottar', '2002-12-20', 'Campalagian, Polewali Mandar', '085237294031', 'chairulnurinsan@gmail.com', 'SMP Negeri 2 Campalagian', 87, '../dokumen_identitas/', '../foto_siswa/Foto Formal.jpg', 'BINDO', 'Diterima'),
(215610048, 'Bintang', 'TanjungBalai', '2002-06-25', 'Jl. Bougenville', '083127859696', 'bintang.nasution@students.utdi.ac.id', 'SMP Negeri 1 TanjungBalai', 88, 'fileijazah.pdf', 'default.png', 'BINDO', 'Diterima'),
(215610059, 'Muhamad Adhi Winata', 'Jakarta Barat', '2002-06-01', 'Wonogiri, Jawa Tengah', '082146286812', 'muhamadadhiw@gmail.com', 'SMP NEGERI 1 JATISRONO', 80, '../dokumen_identitas/TRANSKIP semester3.pdf', '../foto_siswa/miow.jpg', 'MIPA', 'Ditinjau'),
(215610065, 'Rinaldi Rizqi Mulya', 'Bantul', '2002-02-02', 'Ndalem Rayswari no B4 Kasihan,Bantul,Yogyakarta', '085643591718', 'rizqimulyar@gmail.com', 'SMK N 1 Pangandaran', 90, '../dokumen_identitas/215610065_Rinaldi Rizqi Mulya_TugasKelompokPSIE.pdf', '../foto_siswa/IMG_1900..jpg', 'IPS', 'Ditinjau');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kartupelajar`
--
ALTER TABLE `kartupelajar`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `PendaftaranID` (`PendaftaranID`);

--
-- Indeks untuk tabel `petugasppdb`
--
ALTER TABLE `petugasppdb`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `seleksi`
--
ALTER TABLE `seleksi`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kartupelajar`
--
ALTER TABLE `kartupelajar`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `petugasppdb`
--
ALTER TABLE `petugasppdb`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215610053;

--
-- AUTO_INCREMENT untuk tabel `seleksi`
--
ALTER TABLE `seleksi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215610066;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
