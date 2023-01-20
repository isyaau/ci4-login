-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 20 Jan 2023 pada 03.41
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
-- Database: `login_db`
--

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
  `user_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_created_at`) VALUES
(1, 'M Fikri', 'sdvdfb@gmail.com', '$2y$10$D1S2/ARNuxEYXN3IaWt8Eurl3RLDEqYEtmF/IYx//SazhMc8rZqeO', '2020-09-26 06:33:25'),
(2, 'M Fikri', 'sdvdfb2@gmail.com', '$2y$10$LITUhs0rOrIWyzutxxSLdeJgXvaRKk5yTCAcFm7dElyEJFdk8BnMq', '2020-09-26 06:34:50'),
(3, 'M Fikri', 'mfikri@gmail.com', '$2y$10$0UiB.yR1kkOU1.wU6oLiOeyFogUd9sHFdP4QZS.uce7n1s7BJzjia', '2020-09-29 12:35:44'),
(4, 'Isyaau Akhsanil', 'isyaau@gmail.com', '$2y$10$p5fSF7L2KEFCAkUQJq0Dnem3A.RPQHnYa8kc0qkIQ4YryPMHHvzTW', '2023-01-19 17:17:01');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
