-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2020 at 07:02 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `larastock`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2019_09_24_154930_create_products_table', 1),
(13, '2019_09_28_175108_create_transactions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `quantity`, `rate`, `user_id`, `image`) VALUES
(1, 'Huawei P30 Pro', 'Product details of Huawei P30 Pro [ 8 GB RAM, 256 GB ROM ] 6.47 Inches Screen', 40, 100000, 1, 'Huawei P30_1570435758.jpg'),
(2, 'Samsung Galaxy Note 9 Plus', 'Product details of Samsung Mobile Galaxy S9 Plus 64GB', 20, 85000, 1, 'Samsung Galaxy Note 9_1570435926.jpg'),
(3, 'Huawei Nova 5T', 'Product details of Huawei Nova 5T [ 8 GB RAM, 128 GB ROM ] 6.26 inches Display, 48MP Quad Camera, 22.5 watt Fast Charging', 30, 50000, 2, 'Huawei Nova 5T_1570436039.jpg'),
(4, 'Iphone XS Max', 'SuperRetina HD display\r\n6.5‑inch (diagonal) all‑screen OLED Multi‑Touch display\r\nHDR display\r\n2436‑by-1125‑pixel resolution at 458 ppi\r\n1,000,000:1 contrast ratio (typical)\r\nA12 Bionic chip\r\nNext-generation Neural Engine\r\nDual 12MP wide-angle and telephoto cameras\r\nWide-angle: ƒ/1.8 aperture\r\nTelephoto: ƒ/2.4 aperture\r\n2x optical zoom; digital zoom up to 10x\r\nPortrait mode with advanced bokeh and Depth Control\r\nPortrait Lighting with five effects (Natural, Studio, Contour, Stage, Stage Mono)\r\nDual optical image stabilization\r\nSix‑element lens\r\nQuad-LED True Tone flash with Slow Sync\r\nPanorama (up to 63MP)\r\nSapphire crystal lens cover\r\nBackside illumination sensor\r\nHybrid IR filter\r\nAutofocus with FocusPixels\r\nTap to focus with FocusPixels\r\nSmart HDR for photos\r\nWide color capture for photos and LivePhotos\r\nLocal tone mapping\r\nAdvanced red-eye correction\r\nExposure control\r\nAuto image stabilization\r\nBurst mode\r\nTimer mode\r\nPhoto geotagging\r\nImage formats captured: HEIF and JPEG\r\n4K video recording at 24 fps, 30 fps, or 60 fps\r\n1080p HD video recording at 30 fps or 60 fps\r\n720p HD video recording at 30 fps\r\nExtended dynamic range for video up to 30 fps\r\nOptical image stabilization for video\r\n2x optical zoom; digital zoom up to 6x\r\nQuad-LED True Toneflash\r\nSlo‑mo video support for 1080p at 120 fps or 240 fps\r\nTime‑lapse video with stabilization\r\nCinematic videostabilization (1080p and 720p)\r\nContinuous autofocus video\r\nTake 8MP still photos while recording 4K video\r\nPlayback zoom\r\nVideo geotagging\r\nVideo formats recorded: HEVC and H.264\r\nStereo recording\r\n7MP camera\r\nƒ/2.2 aperture\r\nPortrait mode with advanced bokeh and Depth Control\r\nPortraitLighting with five effects (Natural, Studio, Contour, Stage, Stage Mono)\r\nAnimoji and Memoji\r\n1080p HD video recording at 30 fps or 60 fps\r\nSmart HDR for photos\r\nExtended dynamic range for video at 30 fps\r\nCinematic videostabilization (1080p and 720p)\r\nWide color capture for photos and LivePhotos\r\nRetinaFlash\r\nBackside illumination sensor\r\nAuto image stabilization\r\nBurst mode\r\nExposure control\r\nTimer mode\r\nEnabled by True Depth camera for facial recognition', 10, 150000, 2, 'Iphone XS_1570436121.jpg'),
(5, 'Samsung Note 10+', 'Product details of Samsung Galaxy Note 10+ N975F 12GB/256GB', 25, 125000, 2, 'Samsung Galaxy Note 10_1570436221.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('purchase','sale') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `from`, `type`, `created_at`, `updated_at`, `quantity`, `rate`, `user_id`, `product_id`) VALUES
(1, 'Huawei', 'purchase', '2019-10-07 02:33:02', '2019-10-07 02:34:11', 50, 115000, 2, 1),
(2, 'Samsung', 'purchase', '2019-10-07 02:33:50', '2019-10-07 02:34:57', 35, 85000, 2, 2),
(3, 'Huawei', 'purchase', '2019-10-07 02:35:47', '2019-10-07 02:35:47', 30, 50000, 2, 3),
(4, 'Iphone', 'purchase', '2019-10-07 02:36:23', '2019-10-07 02:36:23', 20, 150000, 2, 4),
(5, 'Samsung', 'purchase', '2019-10-07 02:37:07', '2019-10-07 02:37:07', 25, 125000, 2, 5),
(6, 'Gp Store', 'sale', '2019-10-07 02:40:22', '2019-10-07 02:40:22', 20, 130000, 2, 1),
(7, 'Relectornix', 'sale', '2019-10-07 02:41:11', '2019-10-07 02:41:11', 15, 100000, 2, 2),
(8, 'iMax', 'sale', '2019-10-07 02:41:43', '2019-10-07 02:41:43', 10, 160000, 2, 4),
(9, 'dfsdf', 'purchase', '2019-11-02 03:40:30', '2019-11-02 03:40:30', 10, 100000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `created_at`, `updated_at`) VALUES
(1, 'lara', 'larastock@gmail.com', '9878945612', '$2y$10$Akr6BN4zAF3wxv5mmZEj0ueLlCVTaBYlOdhyQpHnI9KLbD3n7/kbK', '2019-10-07 02:12:47', '2019-10-07 02:12:47'),
(2, 'jac', 'jac@g', '9878945612', '$2y$10$6VK0Ns2y/tKmcxp9IivLBeYYKATyZJldZlm2YTk.BZ4xiE5am.4g6', '2019-10-07 02:27:44', '2019-10-07 02:27:44');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_product_id_foreign` (`product_id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
