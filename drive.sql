-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 01 Des 2019 pada 11.08
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drive`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `file`
--

CREATE TABLE `file` (
  `id_file` int(5) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_type` varchar(255) DEFAULT NULL,
  `file_size` float DEFAULT NULL,
  `upload_time` datetime DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `id_folder` int(5) DEFAULT NULL,
  `share` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `file`
--

INSERT INTO `file` (`id_file`, `file_name`, `file_type`, `file_size`, `upload_time`, `location`, `email`, `id_folder`, `share`) VALUES
(21, 'desc-obat1.png', '.png', 36.77, '2019-11-17 21:14:24', './rahul@gmail.com/', 'rahul@gmail.com', NULL, 0),
(23, 'Rahul-Bin-Subagio_123180033_N.docx', '.docx', 441.69, '2019-11-18 22:27:15', './rahul@gmail.com/', 'rahul@gmail.com', 4, 0),
(25, 'tugas-basis-data.pdf', '.pdf', 239.98, '2019-11-19 23:09:25', './rahul@gmail.com/', 'rahul@gmail.com', 4, 0),
(26, 'main.html', '.html', 0.67, '2019-11-19 23:10:52', './rahul@gmail.com/', 'rahul@gmail.com', 4, 0),
(28, 'bootstrap-4_3_1-dist.zip', '.zip', 696.9, '2019-11-19 23:17:25', './rahul@gmail.com/', 'rahul@gmail.com', 4, 0),
(33, 'Screenshot_from_2019-11-21_00-08-06.png', '.png', 162.68, '2019-11-21 14:12:07', './auliyaa@gmail.com/', 'auliyaa@gmail.com', 12, 0),
(35, 'Screenshot_from_2019-11-21_00-08-061.png', '.png', 162.68, '2019-11-22 22:55:03', './rahul@gmail.com/', 'rahul@gmail.com', 4, 0),
(36, 'Desain_dan_Analisis_Perancangan_Desain.docx', '.docx', 398.4, '2019-11-23 20:35:40', './rahul@gmail.com/', 'rahul@gmail.com', 4, 0),
(40, '3.png', '.png', 98.81, '2019-11-26 13:29:58', './rahul@gmail.com/Komputasi Numerik/', 'rahul@gmail.com', 14, 0),
(41, '5.png', '.png', 71.79, '2019-11-26 14:17:24', './rahul@gmail.com/Komputasi Numerik/', 'rahul@gmail.com', 14, 0),
(45, '5.png', '.png', 71.79, '2019-11-26 14:40:25', './rahul@gmail.com/', 'rahul@gmail.com', 4, 0),
(46, 'Desain_dan_Analisis_Perancangan_Desain.docx', '.docx', 398.4, '2019-11-26 14:45:54', './rahul@gmail.com/Komputasi Numerik/', 'rahul@gmail.com', 14, 0),
(47, 'Desain_dan_Analisis_Perancangan_Desain1.docx', '.docx', 398.4, '2019-11-26 14:46:13', './rahul@gmail.com/', 'rahul@gmail.com', 4, 0),
(49, '2_-_Faktor_Manusia.pptx', '.pptx', 737.47, '2019-11-26 15:40:20', './rara@gmail.com/', 'rara@gmail.com', 5, 0),
(50, '6_-_Ergonomi.pptx', '.pptx', 2010.27, '2019-11-26 15:44:29', './rara@gmail.com/apa aja', 'rara@gmail.com', 21, 0),
(55, 'LatresBasdat(N)_123180033.docx', '.docx', 377.84, '2019-12-01 01:39:20', './rahul@gmail.com/Pemrograman Web/', 'rahul@gmail.com', 16, 0),
(58, '10.png', '.png', 31.17, '2019-12-01 01:44:40', './rahul@gmail.com/', 'rahul@gmail.com', 4, 0),
(59, '7.png', '.png', 44.58, '2019-12-01 01:47:05', './rahul@gmail.com/', 'rahul@gmail.com', 4, 0),
(60, 'ERD_KLINIK_UPN.png', '.png', 129.47, '2019-12-01 02:03:16', './rahul@gmail.com/Basis Data/', 'rahul@gmail.com', 17, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `folder`
--

CREATE TABLE `folder` (
  `id_folder` int(5) NOT NULL,
  `folder_name` varchar(255) DEFAULT NULL,
  `make_time` datetime DEFAULT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `folder`
--

INSERT INTO `folder` (`id_folder`, `folder_name`, `make_time`, `path`) VALUES
(4, 'rahul@gmail.com', '2019-11-17 20:42:32', ''),
(5, 'rara@gmail.com', '2019-11-18 08:49:54', ''),
(6, 'ruru@gmail.com', '2019-11-18 08:51:17', ''),
(10, 'rere@gmail.com', '2019-11-18 09:19:24', ''),
(11, 'riri@gmail.com', '2019-11-18 09:24:18', ''),
(12, 'auliyaa@gmail.com', '2019-11-21 14:11:15', ''),
(13, 'coba', '2019-11-23 00:28:40', ''),
(14, 'Komputasi Numerik', '2019-11-23 00:38:05', 'rahul@gmail.com'),
(16, 'Pemrograman Web', '2019-11-23 20:27:51', 'rahul@gmail.com'),
(17, 'Basis Data', '2019-11-23 20:42:06', 'rahul@gmail.com'),
(21, 'apa aja', '2019-11-26 14:06:12', 'rara@gmail.com'),
(23, 'coba lagi', '2019-11-26 14:07:48', 'rara@gmail.com'),
(25, 'Sistem Digital', '2019-12-01 02:02:31', 'rahul@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `email` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`email`, `name`, `password`) VALUES
('auliyaa@gmail.com', 'auliyaa', '$2y$10$f8uF1JBMu/I8.brgaAnRF.wW6ySVa4sVygiP4UBul3eFXiD.Opf7O'),
('rahul@gmail.com', 'rahul', '$2y$10$Tvs8jA7Lo/Bb3Nj6cEV3oOVDgQEXzpVvCZLKvrcCCWrAEb6oWC/pS'),
('rara@gmail.com', 'rara', '$2y$10$.kUqIInYk3beAXWIUwl2eO5WZ34J.tDgd/j3d.usgD.0WIMRysMIO'),
('rere@gmail.com', 'rere', '$2y$10$1rOGIaZAL1aZFQUleIZAO.axBbCOMmUrtI4lptM6WZtYcFSQ8UU6u'),
('riri@gmail.com', 'riri', '$2y$10$Z7t1gZhol8YnSVJNJCsWyOfh.7Nj1BYoOjDNsQrC6wq4WqPADW1zK'),
('ruru@gmail.com', 'ruru', '$2y$10$Vw1Endo.TVknlOy1kUhLUeDYIoan.0zmMEj7PEOF8PsC8Sb2FpU/K');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `fkemail` (`email`),
  ADD KEY `fkfolder` (`id_folder`);

--
-- Indeks untuk tabel `folder`
--
ALTER TABLE `folder`
  ADD PRIMARY KEY (`id_folder`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `file`
--
ALTER TABLE `file`
  MODIFY `id_file` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `folder`
--
ALTER TABLE `folder`
  MODIFY `id_folder` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `fkemail` FOREIGN KEY (`email`) REFERENCES `member` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkfolder` FOREIGN KEY (`id_folder`) REFERENCES `folder` (`id_folder`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
