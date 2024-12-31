-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Des 2024 pada 14.23
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nrp` char(9) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nrp`, `email`, `jurusan`, `gambar`) VALUES
(1, 'Andrih Siryuh', '098759808', 'siryuh@gmail.com', 'Fisika', '676d31d3e498d.jpg'),
(2, 'Clock Humity', '45785678', 'Clock@gmail.com', 'Biologi', '676d329f81010.png'),
(3, 'Vektor Domain', '234323456', 'vektor@gmail.com', 'Teknik Kimia', '676d32afdb4f8.jpeg'),
(4, 'Radiasi Figma', '758493757', 'figma@gmail.com', 'Teknik Biologi', '676d32b7a1e77.jpg'),
(5, 'Excel Louis', '253679286', 'excel@gmail.com', 'Kedokteran', '676d32bf55a46.jpg'),
(6, 'Radian Armor', '667847220', 'armor@gmail.com', 'Matematika', '676d32cfc9ba2.jpeg'),
(7, 'Temperatur Bolz', '665930900', 'temperatur@gmail.com', 'Statistika', '676d32d7ee7df.jpeg'),
(8, 'Tiwi Hoisti', '098789354', 'tiwi@gmail.com', 'Ekomoni', '676d32e25391e.png'),
(9, 'Shety Flory', '233409814', 'shety@gmail.com', 'Kimia', '676d33060b061.png'),
(10, 'Sinus Time', '330098273', 'time@gmail.com', 'Fisika', '676d331d68d30.png'),
(17, '454398734', 'Dismop Ki', 'dismop@gmail.com', 'Aktuaria', '676d51d023240.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$tpt4XtJDnxY4C531qpL5KuU54xQwqeP/.Qi10UPPeSnbZpy3ntBbm'),
(3, 'andi', '$2y$10$NhkPOniVcKMTZzUUYwI85OqnjVcJG.gfIt6Nzk1Y3qo1yiXxGdite'),
(7, 'clockhumi', '$2y$10$fKjcvkqqu2BTNY6b9B7Vo.s1E.Bp/BMsUT20IRIZ9551XBLBAbexC');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
