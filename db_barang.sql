-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2024 at 03:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga` char(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_klasifikasi` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `foto_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `stok`, `id_klasifikasi`, `created_at`, `updated_at`, `foto_barang`) VALUES
(1, 'Macbook M2 Pro 2023 16/512GB', '20.000', 1, 1, '2024-07-07 05:13:33', '2024-07-07 05:13:33', 'images/0hcgVDYYcXfgLMVYLFphCQTn0RiQM0E249hqmqPx.jpg'),
(2, 'Infinix Note 30', '1.800', 50, 2, '2024-07-07 05:14:10', '2024-07-07 05:14:10', 'images/KdV6vxFuqRfslvVXji93Ud3iAdrN0dL7VVfMQGNs.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `id_klasifikasi` bigint(20) UNSIGNED NOT NULL,
  `nama_klasifikasi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `klasifikasi`
--

INSERT INTO `klasifikasi` (`id_klasifikasi`, `nama_klasifikasi`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', '2024-07-07 05:11:32', '2024-07-07 05:11:32'),
(2, 'HandPhone', '2024-07-07 05:11:52', '2024-07-07 05:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '2024_07_04_044905_klasifikasi', 1),
(3, '2024_07_04_044906_barang', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `NIP` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `nama_panggilan` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `ttl` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `Foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `NIP`, `nama_lengkap`, `nama_panggilan`, `job`, `jenis_kelamin`, `ttl`, `alamat`, `no_telepon`, `Foto`, `created_at`, `updated_at`) VALUES
(1, 'farids9@gmail.com', '$2y$10$9.Qx3in7wl1LCmvMbiUSd.IrWrA8Ittn23MP6F8tG2l8TcdMiSGNO', 1109062101, 'Farid Annas', 'Farid', 'Developer', 'Pria', 'Bandung/1 Januari 2000', 'Kp. Pisang, No. 82, Bandung', '099216352', 'img/imag.png', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `barang_id_klasifikasi_foreign` (`id_klasifikasi`);

--
-- Indexes for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  MODIFY `id_klasifikasi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_id_klasifikasi_foreign` FOREIGN KEY (`id_klasifikasi`) REFERENCES `klasifikasi` (`id_klasifikasi`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
