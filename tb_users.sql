-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 29 Mar 2023 pada 05.44
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
-- Database: `e_arsip`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

DROP TABLE IF EXISTS `tb_users`;
CREATE TABLE IF NOT EXISTS `tb_users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `no_induk` varchar(255) NOT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` bigint NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `nama`, `no_induk`, `kelas`, `alamat`, `no_hp`, `email`, `username`, `password`, `role`, `foto`, `created_at`, `updated_at`) VALUES
(2, 'dsfsffsdfsfdsf', '34234432523', 'sfrdsfsfsdfsfds', 'ssdrfsfsfsdfsfsfds', 3242323523452, 'sdfsdsfdsfsfdsfsfdsf', 'administrator', '$2y$10$8DuaXyk0AZZtrK8b337mdexT/6hVnoMokMErmv6PiDpQLgzBrYB8G', 3, 'default.jpg', '2023-03-29 03:27:35', '2023-03-29 03:27:35'),
(3, 'dgfsfgfdg', 'fdsfgffsdg', 'dfsgfdg', 'sdfsfsfdgsgfdsdg', 453535345, 'sdffgsddfsd', 'admin2', '$2y$10$rPbzUwU8ILSzAFjcu4NC3.m5qnkKEb0shcDSqQtOD3LhqJSZrxRVW', 2, 'default.jpg', '2023-03-29 05:02:55', '2023-03-29 05:02:55');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
