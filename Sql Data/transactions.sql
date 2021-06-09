-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Bulan Mei 2019 pada 12.30
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `catatan` varchar(256) NOT NULL,
  `tipe` varchar(256) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `username`, `catatan`, `tipe`, `jumlah`, `tanggal`) VALUES
(1, 'vinic2017', 'Gajian', 'pemasukan', 1000000, '2019-05-20 17:06:58'),
(2, 'vinic2017', 'Uang Listrik', 'pengeluaran', 2000000, '2019-05-20 17:07:12'),
(3, 'snoopy2019', 'Gajian', 'pemasukan', 2500000, '2019-05-20 17:07:34'),
(5, 'vinic2017', 'test1', 'pengeluaran', 500000, '2019-05-15 17:06:52'),
(6, 'vinic2017', 'test2', 'pengeluaran', 20000, '2019-05-15 17:08:52'),
(7, 'vinic2017', 'Bonus', 'pemasukan', 1500000, '2019-05-20 17:46:49'),
(8, 'vinic2017', 'Rejeki', 'pemasukan', 200000, '2019-05-20 17:47:13'),
(9, 'vinic2017', 'Gajian', 'pemasukan', 10000000, '2019-04-20 17:07:14'),
(10, 'vinic2017', 'Listrik', 'pengeluaran', 1000000, '2019-04-20 17:08:14'),
(11, 'vinic2017', 'Air', 'pengeluaran', 4000000, '2019-04-20 17:09:14'),
(12, 'vinic2017', 'Internet', 'pengeluaran', 700000, '2019-04-22 17:07:14'),
(13, 'vinic2017', 'Bonus', 'pemasukan', 1000000, '2019-04-23 15:07:14'),
(14, 'vinic2017', 'Makan', 'pengeluaran', 2000000, '2019-04-23 17:07:14'),
(15, 'vinic2017', 'Gajian', 'pemasukan', 10000000, '2019-03-20 17:07:14'),
(16, 'vinic2017', 'Listrik', 'pengeluaran', 1200000, '2019-03-20 17:08:14'),
(17, 'vinic2017', 'Air', 'pengeluaran', 5000000, '2019-03-20 17:09:14'),
(18, 'vinic2017', 'Internet', 'pengeluaran', 700000, '2019-03-22 17:07:14'),
(19, 'vinic2017', 'Makan', 'pengeluaran', 2500000, '2019-03-23 17:07:14'),
(20, 'vinic2017', 'test', 'pengeluaran', 50000, '2019-05-28 12:23:06');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
