-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2024 at 11:58 PM
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
-- Database: `crud-product`
--
CREATE DATABASE IF NOT EXISTS `crud-product` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `crud-product`;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` VALUES(1, 'Eletronico', '2024-08-24 13:58:01', '2024-08-24 13:58:01');
INSERT INTO `categories` VALUES(2, 'Brinquedo para criança até 2 anos', '2024-08-24 17:16:54', '2024-08-24 17:19:56');
INSERT INTO `categories` VALUES(3, 'Roupas', '2024-08-24 17:17:15', '2024-08-24 17:17:15');
INSERT INTO `categories` VALUES(4, 'Móveis', '2024-08-24 17:17:21', '2024-08-24 17:17:21');
INSERT INTO `categories` VALUES(5, 'Brinquedo para criança até 6 anos', '2024-08-24 17:17:26', '2024-08-24 17:31:31');
INSERT INTO `categories` VALUES(6, 'Ferramentas', '2024-08-24 17:30:50', '2024-08-24 17:30:50');
INSERT INTO `categories` VALUES(99, 'Inexistente', '2024-08-24 17:57:16', '2024-08-24 17:57:16');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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

INSERT INTO `migrations` VALUES(1, '0001_01_01_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES(2, '0001_01_01_000001_create_cache_table', 1);
INSERT INTO `migrations` VALUES(3, '0001_01_01_000002_create_jobs_table', 1);
INSERT INTO `migrations` VALUES(4, '2024_08_23_232656_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES(5, '2024_08_23_234257_create_posts_table', 1);
INSERT INTO `migrations` VALUES(6, '2024_08_24_122407_create_categories_table', 2);
INSERT INTO `migrations` VALUES(8, '2024_08_23_122407_create_categories_table', 3);
INSERT INTO `migrations` VALUES(9, '2024_08_24_122245_create_products_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` VALUES(1, 'App\\Models\\User', 1, 'Test', '8a468608d39413af88f48ca8771f95f785ade7e7c2d1f9d23554b841c7d42c5c', '[\"*\"]', NULL, NULL, '2024-08-24 13:14:04', '2024-08-24 13:14:04');
INSERT INTO `personal_access_tokens` VALUES(5, 'App\\Models\\User', 3, 'Test3', '2c8e7d2355eb887b5029a43581bd587a83aad9881e0f4a416f3502bb610ce572', '[\"*\"]', NULL, NULL, '2024-08-24 16:11:14', '2024-08-24 16:11:14');
INSERT INTO `personal_access_tokens` VALUES(6, 'App\\Models\\User', 4, 'Test4', '4485fa9302cd5c18e2eee6059a5957f805de4556bfe3c2b5a03a00ab46a89685', '[\"*\"]', NULL, NULL, '2024-08-24 16:16:36', '2024-08-24 16:16:36');
INSERT INTO `personal_access_tokens` VALUES(7, 'App\\Models\\User', 5, 'Test5', 'a2c2262304a6acc4acf34528237de3a1aa101ec8e688e9523b844a75e50158aa', '[\"*\"]', NULL, NULL, '2024-08-25 15:20:14', '2024-08-25 15:20:14');
INSERT INTO `personal_access_tokens` VALUES(8, 'App\\Models\\User', 1, 'Test', '161b3c7cfa0de5fed45387f0aa2900336870d357d6a7344cbf990f518e83eea5', '[\"*\"]', NULL, NULL, '2024-08-25 19:14:20', '2024-08-25 19:14:20');
INSERT INTO `personal_access_tokens` VALUES(9, 'App\\Models\\User', 1, 'Test', '0e59542685be70a463f213c6c8642252341d17c2e24653d8d4f8b4587dd03dc6', '[\"*\"]', NULL, NULL, '2024-08-25 19:21:09', '2024-08-25 19:21:09');
INSERT INTO `personal_access_tokens` VALUES(10, 'App\\Models\\User', 1, 'Test', '91b4b5bc02cc34ccd1c2b34b42a43ba34e745cc59e09670b55e42d67fbf69a28', '[\"*\"]', NULL, NULL, '2024-08-25 19:42:09', '2024-08-25 19:42:09');
INSERT INTO `personal_access_tokens` VALUES(11, 'App\\Models\\User', 1, 'Test', '473a73216b22f989876fde88859037c6986a60ead7d0d98448e038b13bd9dd47', '[\"*\"]', NULL, NULL, '2024-08-25 19:42:18', '2024-08-25 19:42:18');
INSERT INTO `personal_access_tokens` VALUES(12, 'App\\Models\\User', 1, 'Test', 'bb30ad34a4e315007d07793eee943ad3cb27a08072d75d5e9489966faa35842a', '[\"*\"]', NULL, NULL, '2024-08-25 19:49:13', '2024-08-25 19:49:13');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` VALUES(1, 'Post1', 'Este é o post do body', '2024-08-23 23:27:04', '2024-08-23 23:27:04');
INSERT INTO `posts` VALUES(3, 'Post2', 'Este é o post do body', '2024-08-23 23:30:29', '2024-08-23 23:30:29');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `data_de_validade` date NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` VALUES(1, 'TV', 'TV 50 polegadas', 1299.99, '2050-08-24', NULL, 1, '2024-08-24 14:02:18', '2024-08-24 14:02:18');
INSERT INTO `products` VALUES(2, 'TV 39', 'TV 39 polegadas com Home', 1299.99, '2050-08-24', NULL, 1, '2024-08-24 16:38:04', '2024-08-24 17:07:44');
INSERT INTO `products` VALUES(3, 'TV 40', 'TV 40 polegadas', 1299.99, '2050-08-24', NULL, 1, '2024-08-24 16:38:14', '2024-08-24 16:38:14');
INSERT INTO `products` VALUES(5, 'Smartphone', 'Smartphone de última geração com 128GB', 1999.99, '2024-10-15', NULL, 1, '2024-08-26 15:49:03', '2024-08-26 15:49:03');
INSERT INTO `products` VALUES(6, 'Notebook', 'Notebook ultrafino com 16GB RAM', 3500.00, '2024-11-20', 'images/notebook.jpeg', 2, '2024-08-26 20:24:37', '2024-08-26 20:24:37');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(1, 'Test', 'test1@test.com', NULL, '$2y$12$//PG.sGNpGz4UIT1oK6JaO7QgzMzLROYa4q1n0ekEWXgOoD4Lk7cK', NULL, '2024-08-24 13:14:04', '2024-08-24 13:14:04');
INSERT INTO `users` VALUES(2, 'Test2', 'test2@test.com', NULL, '$2y$12$y9/aQoZNeF4o2xYKw/876uqbbGJLaXdEGsD3SZf36w9u7NWroE1Tm', NULL, '2024-08-24 15:33:13', '2024-08-24 15:33:13');
INSERT INTO `users` VALUES(3, 'Test3', 'test3@test.com', NULL, '$2y$12$1AuAR6NQTqVLpIHvtGAYq.NFNPa5HawOv7jbU878l2JycyPqOMgDi', NULL, '2024-08-24 16:11:14', '2024-08-24 16:11:14');
INSERT INTO `users` VALUES(4, 'Test4', 'test4@test.com', NULL, '$2y$12$g/9RbHhq4n1jClMfTwVSaOaQRDh2DrawiWCrIMm2.vWaSsrB3BURi', NULL, '2024-08-24 16:16:36', '2024-08-24 16:16:36');
INSERT INTO `users` VALUES(5, 'Test5', 'test5@test.com', NULL, '$2y$12$QAssxyxQnVmIlmGhIDupv.bqSz7kvMC2ZIvWZYuOhQg/mXWW06jkW', NULL, '2024-08-25 15:20:14', '2024-08-25 15:20:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_categoria_id_foreign` (`categoria_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
