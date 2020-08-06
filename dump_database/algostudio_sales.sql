-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 06 Agu 2020 pada 10.06
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `algostudio`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id`, `data`, `status`) VALUES
(8, '2019-07-28 21:41:42', 0),
(9, '2019-07-28 22:23:42', 0),
(10, '2019-07-28 23:52:10', 0),
(11, '2019-07-28 23:52:15', 0),
(12, '2019-07-28 23:52:19', 0),
(13, '2019-07-29 00:59:07', 0),
(14, '2019-07-29 00:59:34', 1),
(15, '2019-07-29 00:59:41', 1),
(16, '2019-07-29 01:48:39', 0),
(17, '2020-08-06 12:41:03', 1),
(18, '2020-08-06 13:08:23', 1),
(19, '2020-08-06 13:10:42', 1),
(20, '2020-08-06 13:11:02', 1),
(21, '2020-08-06 13:12:11', 1),
(22, '2020-08-06 13:13:44', 1),
(23, '2020-08-06 13:13:49', 1),
(24, '2020-08-06 14:34:16', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `sku` varchar(45) NOT NULL,
  `nome` varchar(90) NOT NULL,
  `descricao` longtext,
  `preco` decimal(10,2) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `sku`, `nome`, `descricao`, `preco`, `status`) VALUES
(15, '001', 'Lenovo 1', '', '21.00', '1'),
(16, '002', 'Lenovo 2', '', '13.90', '1'),
(17, '003', 'Lenovo 3', '', '17.23', '1'),
(18, '004', 'Lenovo 4', '', '5.15', '1'),
(19, '005', 'Lenovo 5', '', '12.00', '0'),
(20, '005', 'Lenovo 5', '', '32.00', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_order`
--

CREATE TABLE `product_order` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qtd` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `product_order`
--

INSERT INTO `product_order` (`id`, `order_id`, `product_id`, `product_qtd`) VALUES
(2, 8, 4, 2),
(3, 8, 5, 1),
(4, 9, 12, 2),
(5, 9, 13, 1),
(6, 9, 14, 1),
(7, 10, 12, 1),
(8, 10, 13, 1),
(9, 10, 14, 1),
(10, 11, 12, 1),
(11, 12, 14, 1),
(12, 13, 15, 1),
(13, 14, 15, 2),
(14, 14, 16, 3),
(15, 14, 17, 3),
(16, 14, 18, 1),
(17, 15, 15, 1),
(18, 15, 18, 1),
(19, 16, 19, 1),
(20, 17, 15, 5),
(21, 23, 16, 1),
(22, 24, 16, 2),
(23, 24, 17, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_po_idx` (`order_id`),
  ADD KEY `product_po_idx` (`product_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `order_po` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_po` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
