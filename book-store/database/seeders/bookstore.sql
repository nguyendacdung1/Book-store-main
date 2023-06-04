-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2023 at 05:55 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'default-avatar.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `description`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Nhật Ánh', 'Except sint occaecat cupidatat non proident, sunt culpa qui officia deserunt mollit.', 'nguyen-nhat-anh.png', NULL, NULL),
(2, 'Trang Hạ', 'Except sint occaecat cupidatat non proident, sunt culpa qui officia deserunt mollit.', 'trang-ha.jpg', NULL, NULL),
(3, 'Nguyễn Phong Việt', 'Except sint occaecat cupidatat non proident, sunt culpa qui officia deserunt mollit.', 'phong-viet.jpg', NULL, NULL),
(4, 'Anh Khang', 'Except sint occaecat cupidatat non proident, sunt culpa qui officia deserunt mollit.', 'anh-khang.jpg', NULL, NULL),
(5, 'Nguyễn Ngọc Thạch', '', 'default-avatar.png', NULL, NULL),
(6, 'Hamlet Trương', '', 'default-avatar.png', NULL, NULL),
(7, 'Iris Cao', '', 'default-avatar.png', NULL, NULL),
(8, 'Sơn Paris', '', 'default-avatar.png', NULL, NULL),
(9, 'Dương Thụy', '', 'default-avatar.png', NULL, NULL),
(10, 'Rosie Nguyễn', '', 'default-avatar.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_11_144731_create_authors_table', 1),
(6, '2022_09_11_145438_create_products_table', 1),
(7, '2022_09_11_155359_create_product_categories_table', 1),
(8, '2022_09_11_222710_create_product_comments_table', 1),
(9, '2022_09_14_024050_create_user_addresses_table', 1),
(10, '2022_09_14_024545_create_orders_table', 1),
(11, '2022_09_14_025035_create_order_details_table', 1),
(12, '2022_09_22_011425_create_user_cart_table', 1),
(13, '2022_09_30_200806_create_search_history_table', 1),
(14, '2022_10_05_115346_create_product_images', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_address_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `nxb` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `height` double DEFAULT NULL,
  `width` double DEFAULT NULL,
  `pages` int(11) DEFAULT NULL,
  `pub_year` varchar(255) DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `price` double NOT NULL DEFAULT 0,
  `discount` double NOT NULL DEFAULT 0,
  `featured` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `author_id`, `product_category_id`, `nxb`, `name`, `description`, `content`, `type`, `weight`, `height`, `width`, `pages`, `pub_year`, `qty`, `price`, `discount`, `featured`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'NXB Đại Học Sư Phạm', 'Ngữ Pháp Tiếng Hàn Cơ Bản', '', '', 1, 27, 45, 20, 200, '2021', 20, 3, 1, 1, NULL, NULL),
(2, 1, 5, 'NXB Tổng Hợp TP.HCM', 'Từ Điển Lào – Việt', '', '', 1, 27, 45, 20, 200, '2021', 20, 4, 1, 1, NULL, NULL),
(3, 1, 5, 'NXB Thanh Niên', 'Tự Học Tiếng Anh Hiệu Quả', '', '', 1, 27, 45, 20, 200, '2021', 20, 2.5, 1, 1, NULL, NULL),
(4, 1, 5, 'NXB Thanh Niên', '3000 Từ Vựng Tiếng Anh Thông Dụng Nhất', '', '', 1, 27, 45, 20, 200, '2021', 20, 3, 1, 1, NULL, NULL),
(5, 1, 5, 'NXB Thời Đại', '360 Động Từ Bất Quy Tắc Đầy Đủ', '', '', 1, 27, 45, 20, 200, '2021', 20, 2, 1, 1, NULL, NULL),
(6, 1, 8, 'NXB Đại Học Quốc Gia Hà Nội', 'Giải Bài Tập Đại Số 10', '', '', 1, 27, 45, 20, 200, '2021', 20, 4.2, 1, 1, NULL, NULL),
(7, 1, 8, 'NXB Đại Học Quốc Gia Hà Nội', 'Giải Bài Tập Hình Học 10 (Nâng Cao)', '', '', 1, 27, 45, 20, 200, '2021', 20, 3.9, 1, 1, NULL, NULL),
(8, 1, 8, 'NXB Đại Học Quốc Gia Hà Nội', 'Giải Bài Tập Vật Lý 10 (Cơ Bản)', '', '', 1, 27, 45, 20, 200, '2021', 20, 3.9, 1, 1, NULL, NULL),
(9, 1, 8, 'NXB Đại Học Quốc Gia Hà Nội', 'Giải Bài Tập Vật Lý 10 (Nâng Cao)', '', '', 1, 27, 45, 20, 200, '2021', 20, 2.9, 1, 1, NULL, NULL),
(10, 1, 8, 'NXB Đại Học Quốc Gia Hà Nội', 'Những Bài Làm Văn Tiêu Biểu 10', '', '', 1, 27, 45, 20, 200, '2021', 20, 2.5, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Cookery', NULL, NULL),
(2, 'Annals', NULL, NULL),
(3, 'Skill', NULL, NULL),
(4, 'Literary', NULL, NULL),
(5, 'Language', NULL, NULL),
(6, 'Technology', NULL, NULL),
(7, 'Marketing', NULL, NULL),
(8, 'Reference', NULL, NULL),
(9, 'Comic', NULL, NULL),
(10, 'Health', NULL, NULL),
(11, 'Culture', NULL, NULL),
(12, 'Textbook', NULL, NULL),
(13, 'Detective', NULL, NULL),
(14, 'Love', NULL, NULL),
(15, 'Jokes', NULL, NULL),
(16, 'Philosophy', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_comments`
--

CREATE TABLE `product_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `messages` varchar(255) NOT NULL,
  `rating` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `path`, `created_at`, `updated_at`) VALUES
(1, 1, 'npthcb_0.png', NULL, NULL),
(2, 1, 'npthcb_1.png', NULL, NULL),
(3, 1, 'npthcb_2.png', NULL, NULL),
(4, 1, 'npthcb_3.png', NULL, NULL),
(5, 1, 'npthcb_4.png', NULL, NULL),
(6, 1, 'npthcb_5.png', NULL, NULL),
(7, 2, 'tdlv_0.png', NULL, NULL),
(8, 2, 'tdlv_1.png', NULL, NULL),
(9, 2, 'tdlv_2.png', NULL, NULL),
(10, 2, 'tdlv_3.png', NULL, NULL),
(11, 2, 'tdlv_4.png', NULL, NULL),
(12, 2, 'tdlv_5.png', NULL, NULL),
(13, 3, 'thtahq_0.png', NULL, NULL),
(14, 3, 'thtahq_1.png', NULL, NULL),
(15, 3, 'thtahq_2.png', NULL, NULL),
(16, 3, 'thtahq_3.png', NULL, NULL),
(17, 3, 'thtahq_4.png', NULL, NULL),
(18, 3, 'thtahq_5.png', NULL, NULL),
(19, 4, '3000-tu-vung-tieng-anh-thong-dung-nhat_0.png', NULL, NULL),
(20, 4, '3000-tu-vung-tieng-anh-thong-dung-nhat_1.png', NULL, NULL),
(21, 4, '3000-tu-vung-tieng-anh-thong-dung-nhat_2.png', NULL, NULL),
(22, 4, '3000-tu-vung-tieng-anh-thong-dung-nhat_3.png', NULL, NULL),
(23, 4, '3000-tu-vung-tieng-anh-thong-dung-nhat_4.png', NULL, NULL),
(24, 4, '3000-tu-vung-tieng-anh-thong-dung-nhat_5.png', NULL, NULL),
(25, 5, '360-dong-tu-bat-quy-tac-day-du_0.png', NULL, NULL),
(26, 5, '360-dong-tu-bat-quy-tac-day-du_1.png', NULL, NULL),
(27, 5, '360-dong-tu-bat-quy-tac-day-du_2.png', NULL, NULL),
(28, 5, '360-dong-tu-bat-quy-tac-day-du_3.png', NULL, NULL),
(29, 5, '360-dong-tu-bat-quy-tac-day-du_4.png', NULL, NULL),
(30, 5, '360-dong-tu-bat-quy-tac-day-du_5.png', NULL, NULL),
(31, 6, 'ds10_0.png', NULL, NULL),
(32, 6, 'ds10_1.png', NULL, NULL),
(33, 6, 'ds10_2.png', NULL, NULL),
(34, 6, 'ds10_3.png', NULL, NULL),
(35, 6, 'ds10_4.png', NULL, NULL),
(36, 6, 'ds10_5.png', NULL, NULL),
(37, 7, 'gbthh_0.png', NULL, NULL),
(38, 7, 'ds10_1.png', NULL, NULL),
(39, 7, 'ds10_2.png', NULL, NULL),
(40, 7, 'ds10_3.png', NULL, NULL),
(41, 7, 'ds10_4.png', NULL, NULL),
(42, 7, 'ds10_5.png', NULL, NULL),
(43, 8, 'gbtvl_0.png', NULL, NULL),
(44, 8, 'ds10_1.png', NULL, NULL),
(45, 8, 'ds10_2.png', NULL, NULL),
(46, 8, 'ds10_3.png', NULL, NULL),
(47, 8, 'ds10_4.png', NULL, NULL),
(48, 8, 'ds10_5.png', NULL, NULL),
(49, 9, 'gbtvl_0.png', NULL, NULL),
(50, 9, 'ds10_1.png', NULL, NULL),
(51, 9, 'ds10_2.png', NULL, NULL),
(52, 9, 'ds10_3.png', NULL, NULL),
(53, 9, 'ds10_4.png', NULL, NULL),
(54, 9, 'ds10_5.png', NULL, NULL),
(55, 10, 'htng_0.png', NULL, NULL),
(56, 10, 'ds10_1.png', NULL, NULL),
(57, 10, 'ds10_2.png', NULL, NULL),
(58, 10, 'ds10_3.png', NULL, NULL),
(59, 10, 'ds10_4.png', NULL, NULL),
(60, 10, 'ds10_5.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `search_history`
--

CREATE TABLE `search_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `search` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `avatar`, `level`, `description`, `created_at`, `updated_at`) VALUES
(1, 'CodeLean', 'CodeLean@gmail.com', NULL, '$2y$10$.V.TxBezJ0YsbLoIRb/Sd.0ZVAmR4zrDwNt1O72coNnrm7leWES.K', NULL, NULL, 1, NULL, NULL, NULL),
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$soX3cDzudAdD/.EAHUU4ieXmviBZkcpQA6uPgTJkrx6qFv4iEMoDK', NULL, NULL, 1, NULL, NULL, NULL),
(3, 'Shane Lynch', 'ShaneLynch@gmail.com', NULL, '$2y$10$P0pCfgCYyzrDyEZ7Sis93.SZ4nCqOmqDW0.EsWrslz4GkmztXUNR.', NULL, 'avatar-0.png', 2, 'Aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum bore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud amodo', NULL, NULL),
(4, 'Brandon Kelley', 'BrandonKelley@gmail.com', NULL, '$2y$10$SKu5TBE41e8NxcXnel45U.sqSnAEiTHsl9U9KijODTMhwoyJLjOoq', NULL, 'avatar-1.png', 2, NULL, NULL, NULL),
(5, 'Roy Banks', 'RoyBanks@gmail.com', NULL, '$2y$10$dgedKbEW2QhbfPENpUSDTOBJ7hGMDgFBd02FXdrVQaujh00oeUCI2', NULL, 'avatar-2.png', 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `default` int(11) NOT NULL DEFAULT 0,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL DEFAULT 'Việt Nam',
  `city` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `ward` varchar(255) NOT NULL,
  `describe` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `price` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search_history`
--
ALTER TABLE `search_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `search_history`
--
ALTER TABLE `search_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_cart`
--
ALTER TABLE `user_cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
