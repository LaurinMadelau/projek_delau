-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jul 2022 pada 19.24
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
-- Database: `projek_delau`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_valo` int(11) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `id_user`, `id_valo`, `nickname`, `pembayaran`) VALUES
(10, 10, 7, 'jett', 'ada'),
(11, 10, 4, '3131', '3131'),
(12, 6, 2, 'delau', '31'),
(15, 6, 1, 'DELAU', 'Bank Mandiri'),
(16, 6, 1, 'delau', 'Bank Mandiri'),
(17, 6, 1, 'delau', 'Bank Mandiri'),
(18, 6, 1, 'delau', 'Bank Mandiri'),
(19, 6, 1, 'jett', '31'),
(21, 6, 2, 'delau', 'DANA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `role`) VALUES
(6, 'Laurin Madelau', 'laurinmadelau@gmail.com', '$2y$10$zObnmjynD7jDrCW6edxYCuJCJZDYUugcA7bvC5u/l3xmps32Y3p2C', 'User'),
(7, 'Admin', 'admin@gmail.com', '$2y$10$OTJtNSn9Tad33Q1T19hVJuBlMYDxuHjTEGPVI/i5tCn1Q02QPFWBC', 'Admin'),
(10, 'jett', 'jett@gmail.com', '$2y$10$h/Sshp47QV5NTq8iACeBIO8okp2GNrYfdOOpbPhySblCSm6BlFqpW', 'User'),
(11, 'brim', 'brim@gmail.com', '$2y$10$O34XP39EpfZo9qD42I9PruyzZcPwp2..K1WIXdcp.RR2vmXdF2t2W', 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `valorant`
--

CREATE TABLE `valorant` (
  `id` int(11) NOT NULL,
  `points` int(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `gambar` varchar(100) DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `valorant`
--

INSERT INTO `valorant` (`id`, `points`, `harga`, `gambar`) VALUES
(1, 100014, 500001, 'GettyImages-569191285-56a7984e5f9b58b7d0ebfbca.jpg'),
(2, 1, 500000, 'default.jpg'),
(3, 31, 13, 'default.jpg'),
(4, 42069, 42, 'default.jpg'),
(7, 17500, 100000, 'valorantpoints.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`id_user`),
  ADD KEY `valo` (`id_valo`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `valorant`
--
ALTER TABLE `valorant`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `valorant`
--
ALTER TABLE `valorant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `valo` FOREIGN KEY (`id_valo`) REFERENCES `valorant` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
