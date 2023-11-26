-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Nov 2023 pada 02.37
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbfebriani`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `pendidikan` varchar(10) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `hobby` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomer` varchar(20) NOT NULL,
  `foto` text NOT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `golongan_darah` varchar(5) DEFAULT NULL,
  `kewarganegaraan` varchar(50) DEFAULT NULL,
  `asal_sekolah` varchar(50) DEFAULT NULL,
  `tahun_masuk` varchar(4) DEFAULT NULL,
  `tahun_lulus` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jenis_kelamin`, `ttl`, `status`, `pendidikan`, `jurusan`, `hobby`, `email`, `nomer`, `foto`, `agama`, `golongan_darah`, `kewarganegaraan`, `asal_sekolah`, `tahun_masuk`, `tahun_lulus`) VALUES
('21552011244', 'febriani', 'perempuan', 'bandung 12 april 2002', 'mahasiswa', 's1', 'teknik informatika', 'belajar', 'febriani@gmail.com', '62788847343343', '1cbee7067dadd7fbe45665719736f958.jpg', 'islam', '0', 'indonesia', 'sma terkasih', '2018', '2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `email` varchar(59) NOT NULL,
  `password` varchar(59) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`email`, `password`) VALUES
('febriani@gmail.com', 'febriani123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
