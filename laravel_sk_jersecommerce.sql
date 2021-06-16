-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2021 at 12:46 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_sk_jersecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `liga`
--

CREATE TABLE `liga` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `negara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `liga`
--

INSERT INTO `liga` (`id`, `nama`, `negara`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Bundes Liga', 'Jerman', 'bundesliga.png', NULL, NULL),
(2, 'Premier League', 'Inggris', 'premierleague.png', NULL, NULL),
(3, 'La Liga', 'Spanyol', 'laliga.png', NULL, NULL),
(4, 'Serie A', 'Itali', 'seriea.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_08_22_040711_create_liga_table', 1),
(5, '2020_08_22_040837_create_products_table', 1),
(7, '2020_08_22_042802_create_pesanan_detail_table', 2),
(8, '2020_08_22_042235_create_pesanan_user_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_detail`
--

CREATE TABLE `pesanan_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `nameset` tinyint(1) NOT NULL DEFAULT 0,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `pesanan_user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan_detail`
--

INSERT INTO `pesanan_detail` (`id`, `jumlah_pesanan`, `total_harga`, `nameset`, `nama`, `nomor`, `product_id`, `pesanan_user_id`, `created_at`, `updated_at`) VALUES
(10, 1, 120000, 0, NULL, NULL, 12, 5, '2020-08-30 19:56:10', '2020-08-30 19:56:10'),
(12, 1, 170000, 1, 'Yoni Widhi', '33', 3, 7, '2020-08-30 21:03:47', '2020-08-30 21:03:47'),
(13, 1, 170000, 1, 'Yoni Widhi', '33', 1, 7, '2020-09-01 17:42:32', '2020-09-01 17:42:32'),
(15, 2, 240000, 0, NULL, NULL, 7, 7, '2020-09-01 17:44:45', '2020-09-01 17:44:45'),
(17, 1, 120000, 0, NULL, NULL, 2, 8, '2020-10-03 20:06:26', '2020-10-03 20:06:26'),
(18, 1, 120000, 0, NULL, NULL, 7, 9, '2020-10-03 20:42:51', '2020-10-03 20:42:51'),
(19, 1, 120000, 0, NULL, NULL, 12, 9, '2020-10-03 20:42:58', '2020-10-03 20:42:58'),
(20, 1, 170000, 1, 'User', '15', 6, 10, '2020-10-03 20:44:58', '2020-10-03 20:44:58'),
(21, 1, 170000, 1, 'User', '33', 1, 11, '2020-11-09 18:58:19', '2020-11-09 18:58:19'),
(22, 3, 360000, 0, NULL, NULL, 3, 12, '2020-11-09 19:08:52', '2020-11-09 19:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_user`
--

CREATE TABLE `pesanan_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_pemesanan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_harga` int(11) NOT NULL,
  `kode_unik` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan_user`
--

INSERT INTO `pesanan_user` (`id`, `kode_pemesanan`, `status`, `total_harga`, `kode_unik`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 'JC3108205', '1', 120000, 794, 1, '2020-08-30 19:56:10', '2020-08-30 20:56:44'),
(7, 'JC3108207', '0', 580000, 736, 1, '2020-08-30 21:03:47', '2020-09-02 22:05:27'),
(8, 'JC0410208', '2', 120000, 757, 2, '2020-10-03 20:06:25', '2020-10-03 20:38:45'),
(9, 'JC0410209', '2', 240000, 747, 3, '2020-10-03 20:42:51', '2020-10-03 20:43:30'),
(10, 'JC04102010', '1', 170000, 645, 3, '2020-10-03 20:44:58', '2020-10-03 20:45:18'),
(11, 'JC10112011', '2', 170000, 303, 2, '2020-11-09 18:58:19', '2020-11-09 19:06:35'),
(12, 'JC10112012', '0', 360000, 270, 2, '2020-11-09 19:08:51', '2020-11-09 19:08:51');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL DEFAULT 120000,
  `harga_nameset` int(11) NOT NULL DEFAULT 50000,
  `is_ready` tinyint(1) NOT NULL DEFAULT 1,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Replica Best Quality',
  `berat` double(8,2) NOT NULL DEFAULT 0.50,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `liga_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nama`, `harga`, `harga_nameset`, `is_ready`, `jenis`, `berat`, `gambar`, `liga_id`, `created_at`, `updated_at`) VALUES
(1, 'CHELSEA', 120000, 50000, 1, 'Replica Best Quality', 0.50, 'chelsea.png', 2, NULL, '2020-11-13 19:41:54'),
(2, 'LEICESTER CITY HOME 2018-2019', 120000, 50000, 1, 'Replica Best Quality', 0.50, 'leicester.png', 2, NULL, NULL),
(3, 'MAN. UNITED AWAY 2018-2019', 120000, 50000, 1, 'Replica Best Quality', 0.50, 'mu.png', 2, NULL, NULL),
(4, 'LIVERPOOL AWAY 2018-2019', 120000, 50000, 1, 'Replica Best Quality', 0.50, 'liverpool.png', 2, NULL, NULL),
(5, 'TOTTENHAM 3RD 2018-2019', 120000, 50000, 1, 'Replica Best Quality', 0.50, 'tottenham.png', 2, NULL, NULL),
(6, 'DORTMUND AWAY 2018-2019', 120000, 50000, 1, 'Replica Best Quality', 0.50, 'dortmund.png', 1, NULL, NULL),
(7, 'BAYERN MUNCHEN 3RD 2018 2019', 120000, 50000, 1, 'Replica Best Quality', 0.50, 'munchen.png', 1, NULL, NULL),
(8, 'JUVENTUS AWAY 2018-2019', 120000, 50000, 0, 'Replica Best Quality', 0.50, 'juve.png', 4, NULL, NULL),
(9, 'AS ROMA HOME 2018-2019', 120000, 50000, 1, 'Replica Best Quality', 0.50, 'asroma.png', 4, NULL, NULL),
(10, 'AC MILAN HOME 2018 2019', 120000, 50000, 1, 'Replica Best Quality', 0.50, 'acmilan.png', 4, NULL, NULL),
(11, 'LAZIO HOME 2018-2019', 120000, 50000, 1, 'Replica Best Quality', 0.50, 'lazio.png', 4, NULL, NULL),
(12, 'REAL MADRID 3RD 2018-2019', 120000, 50000, 1, 'Replica Best Quality', 0.50, 'madrid.png', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `alamat`, `no_hp`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Yoni Widhi', 'admin', 'admin@admin.com', NULL, 'Jl. Santuy Poll No. 35', '081234567890', '$2y$10$PxpEUXV0Ua8QR2tAsG//2OSSWcedsE76keMp0Zmlxh3DFel/2/U8K', NULL, '2020-08-21 22:43:31', '2020-08-30 20:56:44'),
(2, 'User1', 'user', 'user@user.com', NULL, 'Alamat Ini lahh woy', '1023912312', '$2y$10$oyYi5B8xTPXx/a2YeCxc3e82s9b8Xdx/9Q1KJ71Bl1ICOW5Ar84IO', NULL, '2020-08-30 21:59:23', '2020-11-09 18:59:10'),
(3, 'User2', 'user', 'user2@user.com', NULL, 'Disini woi ea', '081234567890', '$2y$10$jqZUUQBMrJm7XQxw/BsRQOaWWi6UH64tuNHOJi20dO9tdzhaEqrAy', NULL, '2020-09-26 09:57:39', '2020-10-03 20:45:18'),
(4, 'User3', 'user', 'user3@user.com', NULL, 'Disana sini situ lo', '129344', '$2y$10$H590/etlC2bM3A660RJ45.q/sM0K2ZQoTP.BKVYV2mKV9.L8GJCXy', NULL, '2020-09-26 10:00:12', '2020-09-26 23:07:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `liga`
--
ALTER TABLE `liga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan_user`
--
ALTER TABLE `pesanan_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `liga`
--
ALTER TABLE `liga`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pesanan_user`
--
ALTER TABLE `pesanan_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
