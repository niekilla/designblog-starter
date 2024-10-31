-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Okt 2024 pada 15.53
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_blog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `upload_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `view_count` int(11) DEFAULT 0,
  `status` enum('Draft','Published','Rejected') DEFAULT 'Draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `articles`
--

INSERT INTO `articles` (`article_id`, `user_id`, `category_id`, `title`, `content`, `image`, `created_at`, `updated_at`, `upload_time`, `view_count`, `status`) VALUES
(1, 1, 1, 'Kecerdasan Buatan (AI)', 'Digunakan dalam asisten virtual seperti Siri dan Google Assistant ', '1.jpg\r\n', '2024-10-31 13:54:34', '2024-10-31 13:55:09', '2024-10-31 13:54:34', 0, 'Draft'),
(2, 1, 1, 'Internet of Things (IoT)', 'Perangkat seperti smart thermostat dan lampu pintar yang dapat diatur melalui smartphone.', '2.jpg', '2024-10-31 13:55:45', '2024-10-31 13:56:36', '2024-10-31 13:55:45', 0, 'Draft'),
(3, 1, 1, 'Virtual Reality (VR)', 'Digunakan dalam game dan simulasi pelatihan untuk memberikan pengalaman imersif.', '3.jpg', '2024-10-31 13:56:14', '2024-10-31 13:56:45', '2024-10-31 13:56:14', 0, 'Draft'),
(4, 1, 2, 'Minimalisme: Hidup Lebih Bermakna dengan Sedikit Barang', 'Minimalisme mengajarkan kita untuk fokus pada hal-hal yang benar-benar penting, mengurangi kepemilikan barang, dan meningkatkan kualitas hidup.', '4.jpg', '2024-10-31 13:57:31', '2024-10-31 13:58:54', '2024-10-31 13:57:31', 0, 'Draft'),
(5, 1, 2, 'Meditasi: Kunci untuk Kesehatan Mental yang Lebih Baik', 'Meditasi membantu mengurangi stres dan meningkatkan fokus', '5.jpg', '2024-10-31 13:57:59', '2024-10-31 14:26:06', '2024-10-31 13:57:59', 1, 'Draft'),
(6, 1, 2, 'Hobi Kreatif: Manfaat Menyalurkan Energi Positif', 'Mengembangkan hobi seperti melukis, menulis, atau berkebun', '6.jpg', '2024-10-31 13:58:29', '2024-10-31 13:59:12', '2024-10-31 13:58:29', 0, 'Draft'),
(7, 1, 1, 'Cloud Computing', 'Layanan seperti Google Drive dan Dropbox yang memungkinkan penyimpanan dan kolaborasi data secara online.', '7.jpg', '2024-10-31 13:59:59', '2024-10-31 14:01:10', '2024-10-31 13:59:59', 3, 'Draft'),
(8, 1, 2, 'Digital Detox: Pentingnya Mengurangi Waktu Layar', 'Mengurangi penggunaan gadget dapat membantu meningkatkan produktivitas', '8.jpg', '2024-10-31 14:00:21', '2024-10-31 14:30:03', '2024-10-31 14:00:21', 3, 'Draft');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(2, 'Lifestyle'),
(1, 'Technology');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_users` varchar(50) NOT NULL,
  `role` enum('Admin','Author','Editor','Redaktur') DEFAULT 'Author',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `nama_users`, `role`, `created_at`) VALUES
(1, 'kiki', 'kiki@gmail.com', '123', 'Tifanie', 'Admin', '2024-10-31 06:34:19');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
