-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 31 Jan 2023 pada 07.26
-- Versi server: 8.0.31
-- Versi PHP: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_mobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

DROP TABLE IF EXISTS `akun`;
CREATE TABLE IF NOT EXISTS `akun` (
  `id_akun` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id_akun`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `username`, `password`, `foto`) VALUES
(6, 'Isyaau Akhsanil Khakim', 'isyaau', '$2y$10$0mItsf56eh/5670WC0GQgOVbQpYDIlNaHU.rYqPLMHtJIHvZkPzMq', '1675148698_e7393539996ac621e7a8.jpg'),
(5, 'Administrator', 'admin', '$2y$10$PVPrHhLTTUTk6APlzscvY.YpSp5AA0I7AWP06XkOKGDwiV.DKz5dq', 'default-akun.png'),
(10, 'Alfia', 'alfia', '$2y$10$Kmhq2sDP9Rxv.guzHx34quCufKT8FXmCDlYjl.QlBiuvQdEv1nYem', 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_bayar`
--

DROP TABLE IF EXISTS `jenis_bayar`;
CREATE TABLE IF NOT EXISTS `jenis_bayar` (
  `id_jenisbayar` int NOT NULL AUTO_INCREMENT,
  `jenis_bayar` varchar(255) NOT NULL,
  PRIMARY KEY (`id_jenisbayar`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `jenis_bayar`
--

INSERT INTO `jenis_bayar` (`id_jenisbayar`, `jenis_bayar`) VALUES
(1, 'Kredit'),
(6, 'Cash');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merk`
--

DROP TABLE IF EXISTS `merk`;
CREATE TABLE IF NOT EXISTS `merk` (
  `id_merk` int NOT NULL AUTO_INCREMENT,
  `nama_merk` varchar(255) NOT NULL,
  PRIMARY KEY (`id_merk`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `merk`
--

INSERT INTO `merk` (`id_merk`, `nama_merk`) VALUES
(10, 'BMW'),
(7, 'Honda'),
(11, 'Ferari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

DROP TABLE IF EXISTS `mobil`;
CREATE TABLE IF NOT EXISTS `mobil` (
  `id_mobil` int NOT NULL AUTO_INCREMENT,
  `id_merk` int NOT NULL,
  `nama_mobil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `warna` varchar(255) NOT NULL,
  `jumlah_kursi` int NOT NULL,
  `no_polisi` varchar(255) NOT NULL,
  `tahun_beli` int NOT NULL,
  `gambar` varchar(255) NOT NULL,
  PRIMARY KEY (`id_mobil`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `id_merk`, `nama_mobil`, `warna`, `jumlah_kursi`, `no_polisi`, `tahun_beli`, `gambar`) VALUES
(10, 7, 'Supra', 'Merah', 5, 'dgfdg', 356, '1674967323_30cc953b5f9b074d48a3.jpg'),
(9, 7, 'Vario', 'Merah', 5, 'dgfdg', 356, '1674910010_6fb31d777d812559cb4b.jpg'),
(8, 7, 'Jass', 'Merah', 7, 'AE 8768 HJ', 2020, 'default-mobil.jpeg'),
(11, 7, 'Vario', 'Merah', 5, 'dgfdg', 356, '1674923110_b7ea06e7e97978eb61f0.jpg'),
(17, 7, 'Civic', 'Merah', 4, 'AE 4565 JL', 2023, '1675093161_abe43b3fa5e74516abcf.jpg'),
(14, 7, 'Yamaha', 'Merah', 5, 'dgfdg', 356, '1674923138_1d882432020d3fc54371.jpg'),
(16, 7, 'Corolla', 'Merah', 2, 'AE 5747 JL', 2022, '1675092439_1f73e36134424cabaef7.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesan`
--

DROP TABLE IF EXISTS `pemesan`;
CREATE TABLE IF NOT EXISTS `pemesan` (
  `id_pemesan` int NOT NULL AUTO_INCREMENT,
  `nama_pemesan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pemesan`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pemesan`
--

INSERT INTO `pemesan` (`id_pemesan`, `nama_pemesan`, `alamat`, `jenis_kelamin`, `foto`) VALUES
(13, 'Eka Namira', 'Desa Sembung Kerangjati Kab Ngawi', 'Perempuan', '1675093204_a9c59234cae4cf7fd6a0.jpg'),
(16, 'Mita Kurniasari', 'Ngawi', 'Perempuan', 'default-pemesan.jpg'),
(14, 'Alfia Anggriani', 'Jalan Balerejo Balerejo Madiun', 'Perempuan', '1675149443_fd45f9d1ac76b828fa1d.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perjalanan`
--

DROP TABLE IF EXISTS `perjalanan`;
CREATE TABLE IF NOT EXISTS `perjalanan` (
  `id_perjalanan` int NOT NULL AUTO_INCREMENT,
  `asal` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `jarak` int NOT NULL,
  PRIMARY KEY (`id_perjalanan`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `perjalanan`
--

INSERT INTO `perjalanan` (`id_perjalanan`, `asal`, `tujuan`, `jarak`) VALUES
(1, 'Ngawi', 'Magetan', 30),
(5, 'Madiun', 'Semarang', 110);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

DROP TABLE IF EXISTS `pesanan`;
CREATE TABLE IF NOT EXISTS `pesanan` (
  `id_pesanan` int NOT NULL AUTO_INCREMENT,
  `harga` varchar(255) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `id_pemesan` int NOT NULL,
  `id_mobil` int NOT NULL,
  `id_perjalanan` int NOT NULL,
  `id_jenisbayar` int NOT NULL,
  PRIMARY KEY (`id_pesanan`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `harga`, `tgl_pinjam`, `tgl_kembali`, `id_pemesan`, `id_mobil`, `id_perjalanan`, `id_jenisbayar`) VALUES
(4, '646', '2023-01-02', '2023-01-11', 12, 8, 1, 1),
(3, '45353', '2023-01-17', '2023-01-11', 12, 8, 1, 2),
(11, '900000', '2023-01-16', '2023-01-28', 14, 17, 5, 6),
(9, '400000', '2023-01-10', '2023-02-03', 14, 17, 6, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_password` varchar(200) DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `foto`, `user_created_at`) VALUES
(1, 'M Fikri', 'sdvdfb@gmail.com', '$2y$10$D1S2/ARNuxEYXN3IaWt8Eurl3RLDEqYEtmF/IYx//SazhMc8rZqeO', '', '2020-09-26 06:33:25'),
(2, 'M Fikri', 'sdvdfb2@gmail.com', '$2y$10$LITUhs0rOrIWyzutxxSLdeJgXvaRKk5yTCAcFm7dElyEJFdk8BnMq', '', '2020-09-26 06:34:50'),
(3, 'M Fikri', 'mfikri@gmail.com', '$2y$10$0UiB.yR1kkOU1.wU6oLiOeyFogUd9sHFdP4QZS.uce7n1s7BJzjia', '', '2020-09-29 12:35:44'),
(4, 'Isyaau Akhsanil', 'isyaau@gmail.com', '$2y$10$p5fSF7L2KEFCAkUQJq0Dnem3A.RPQHnYa8kc0qkIQ4YryPMHHvzTW', '', '2023-01-19 17:17:01'),
(6, 'Isyaau Akhsanil Khakim', 'isak.akhsanil@gmail.com', '$2y$10$AkpI6zOLm91YeKPXrA.LguVM1NXZ9.9GglrCack9QwKDaGsOVhItq', '', '2023-01-21 23:38:45');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
