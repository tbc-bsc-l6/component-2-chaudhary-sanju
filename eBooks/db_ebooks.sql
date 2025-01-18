-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2025 at 09:36 AM
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
-- Database: `db_ebooks`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `status` enum('active','inActive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `bio`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Rebecca Behrens', 'Rebecca Behrens is the author of three critically acclaimed middle-grade novels that explore famous historical figures and fascinating places', 'active', '2025-01-05 23:11:54', '2025-01-05 23:11:54'),
(5, 'Benny D', 'Benny Dc is the author of three critically acclaimed middle-grade novels that explore famous historical figures and fascinating places', 'active', '2025-01-05 23:41:50', '2025-01-05 23:41:50'),
(6, 'Jamie Oliver', 'Jamie Oliver is the author of three critically acclaimed middle-grade novels that explore famous historical figures and fascinating places', 'active', '2025-01-05 23:43:53', '2025-01-05 23:43:53'),
(7, 'Kate Harris', 'Kate Harris is the author of three critically acclaimed middle-grade novels that explore famous historical figures and fascinating places', 'active', '2025-01-05 23:46:37', '2025-01-05 23:46:37');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `qty`, `created_at`, `updated_at`) VALUES
(12, 1, 6, 1, '2025-01-08 03:35:42', '2025-01-13 01:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('active','inActive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Adventure', 'Adventure books transport readers into thrilling scenarios filled with excitement, challenges, and exploration. They often feature journeys to unknown lands, daring rescues, survival against the odds, or quests for treasure.', 'active', '2025-01-05 23:07:31', '2025-01-05 23:07:31'),
(9, 'Classics', 'Classic literature comprises works that have stood the test of time due to their universal themes, profound insights, exceptional writing, and cultural impact. These books often explore timeless human experiences, emotions, and societal issues, making them relevant across generations.', 'active', '2025-01-05 23:08:21', '2025-01-05 23:08:21'),
(10, 'Poetry', 'Poetry distills emotions, thoughts, and ideas into powerful and evocative language. It allows readers to connect deeply with universal experiences, offering inspiration, solace, or introspection in just a few words.', 'active', '2025-01-05 23:09:02', '2025-01-05 23:09:02');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '0001_01_01_000000_create_users_table', 1),
(5, '0001_01_01_000001_create_cache_table', 1),
(6, '0001_01_01_000002_create_jobs_table', 1),
(7, '2025_01_04_140235_create_categories_table', 2),
(8, '2025_01_05_074852_create_authors_table', 3),
(9, '2025_01_05_081427_create_products_table', 4),
(10, '2025_01_07_062719_create_carts_table', 5),
(11, '2025_01_07_073656_create_orders_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `status` enum('pending','confirm') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `qty`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 1, 'confirm', '2025-01-07 02:12:36', '2025-01-07 02:12:36'),
(2, 1, 9, 1, 'confirm', '2025-01-07 02:12:36', '2025-01-13 02:05:03'),
(3, 1, 8, 1, 'confirm', '2025-01-07 02:12:36', '2025-01-13 02:05:05'),
(4, 1, 7, 1, 'confirm', '2025-01-07 02:12:36', '2025-01-13 02:05:06'),
(5, 1, 6, 1, 'confirm', '2025-01-07 02:15:01', '2025-01-13 02:05:07');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `published_at` date NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `author_id`, `category_id`, `description`, `img`, `published_at`, `price`, `featured`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Alone in the woods', 4, 8, 'Alone in the Woods is a mystery and thriller film about an insurance broker who moves to a historic house in the New England woods to pursue his passion for nature photography. However, he soon discovers that he is not alone in the house and is being haunted by an entity that is trying to capture his soul.', '1736139490.jpg', '2022-10-04', 45.00, 1, 'active', '2025-01-05 23:13:10', '2025-01-05 23:13:10'),
(7, 'The Adventurous Kids', 5, 8, 'Adventure Kid is an erotic manga series written and illustrated by Toshio Maeda.', '1736141277.jpg', '2004-02-10', 19.00, 1, 'active', '2025-01-05 23:42:57', '2025-01-05 23:42:57'),
(8, 'Billy and the Giant Adventure', 6, 8, 'One pinch of adventure, a dash of friendship, a sprinkle of mystery and a HUGE spoonful of magic . . . Jamie Oliver, bestselling author and internationally renowned chef, delivers the perfect recipe for a page-turning children\'s fiction debut!', '1736141474.jpg', '2012-01-03', 25.00, 0, 'active', '2025-01-05 23:45:21', '2025-01-16 02:21:13'),
(9, 'Lands of Lost Borders: A Journey on the Silk Road', 7, 8, 'As a teenager, Kate Harris realized that the career she most craved--that of a generalist explorer, equal parts swashbuckler and philosopher--had gone extinct. From her small-town home in Ontario, it seemed as if Marco Polo, Magellan and their like had long ago mapped the whole earth. So she vowed to become a scientist and go to Mars.', '1736141590.jpg', '2018-06-06', 12.00, 1, 'active', '2025-01-05 23:48:10', '2025-01-05 23:48:10'),
(10, 'The Sun and Her Flowers', 7, 10, 'A vibrant and transcendent journey about growth and healing. Ancestry and honoring one’s roots. Expatriation and rising up to find a home within yourself. Divided into five chapters and illustrated by Kaur, the sun and her flowers is a journey of wilting, falling, rooting, rising, and blooming. A celebration of love in all its forms. this is the recipe of life said my mother as she held me in her arms as i wept think of those flowers you plant in the garden each year they will teach you that people too must wilt fall root rise in order to bloom', '1737014060.jpeg', '2017-06-13', 47.00, 1, 'active', '2025-01-16 02:09:20', '2025-01-16 02:21:18'),
(11, 'I Don\'t Love You Any More', 6, 10, 'Dear reader, I hope this book feels like a warm hug to you. I wrote this book for the ones who feel everything too deeply. You\'re right, I wrote this book for you. This book was meant to find you if you\'ve ever loved someone who didn\'t love you back, if you\'ve ever over-invested in the wrong people or if you have a hard time letting go. I Don\'t Love You Anymore is a book that\'ll feel like home to you. I promise it\'ll hold you gently on your worst days. Love', '1737014269.jpeg', '2024-02-05', 64.00, 0, 'active', '2025-01-16 02:12:49', '2025-01-16 02:12:49'),
(12, 'Classic Tales of Christmas', 5, 9, 'This collection features more than 20 stories and poems celebrating Christmas, including works from esteemed authors such as Charles Dickens, Louisa May Alcott, and Hans Christian Andersen. With favorites such as O. Henry’s “The Gift of the Magi” and L. Frank Baum’s The Life and Adventures of Santa Claus, this elegant leather-bound volume will hold a special place on your bookshelf, sure to be enjoyed during the Christmas season, or at any time of the year.', '1737014371.jpeg', '2019-01-29', 16.50, 0, 'active', '2025-01-16 02:14:31', '2025-01-16 02:14:31'),
(13, 'Iliad', 4, 9, 'The Iliad is one of two major ancient Greek epic poems attributed to Homer. It is one of the oldest extant works of literature still widely read by modern audiences. As with the Odyssey, the poem is divided into 24 books and was written in dactylic hexameter.', '1737014467.jpeg', '2019-01-29', 78.00, 0, 'active', '2025-01-16 02:16:07', '2025-01-16 02:16:07'),
(14, 'Home Body', 6, 10, 'Embraces growth, and in home body, she walks readers through a reflective and intimate journey visiting the past, the present, and the potential of the self. home body is a collection of raw, honest conversations with oneself - reminding readers to fill up on love, acceptance, community, family, and embrace change. illustrated by the author, themes of nature and nurture, light and dark, rest here.\r\n\r\ni dive into the well of my body\r\nand end up in another world\r\neverything i need\r\nalready exists in me\r\nthere’s no need\r\nto look anywhere else', '1737014896.jpeg', '2019-09-15', 35.00, 1, 'active', '2025-01-16 02:23:16', '2025-01-16 02:23:16'),
(15, 'Save Me An Orange', 5, 10, 'In her debut poetry collection, Hayley gives voice to the roots of struggle and pain growing up, as well as the love and pursuit of self-acceptance that were fundamental in her own choice to live', '1737014956.jpeg', '2018-01-30', 45.00, 0, 'active', '2025-01-16 02:24:16', '2025-01-16 02:24:16'),
(16, 'Little Women', 7, 9, 'Little Women is a coming-of-age novel written by American novelist Louisa May Alcott, originally published in two volumes, in 1868 and 1869. The story follows the lives of the four March sisters—Meg, Jo, Beth, and Amy—and details their passage from childhood to womanhood', '1737015036.jpeg', '2013-01-29', 74.00, 0, 'active', '2025-01-16 02:25:36', '2025-01-16 02:25:36');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('s5zK8aVDR0NxoVAeDnTbfqdjqhcC0QcZkDQzmRPc', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibDd6QVE5ZjZDc2wyVnFMckdwQXVBeHJRQWk3UlZBaFpJUVdTZm9iTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1737102834);

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
  `role` enum('customer','admin') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sanju Chaudhary', 'sashin.chaudhary5@gmail.com', NULL, '$2y$12$L4e32ttjHL5R9aoCnQELFuyh8ExtdKsDDtjoEgtM.C7jyBI/9fEtK', 'customer', NULL, '2025-01-04 02:59:27', '2025-01-04 02:59:27'),
(2, 'Sanju Chaudhary', 'sashin.chaudhary6@gmail.com', NULL, '$2y$12$L4e32ttjHL5R9aoCnQELFuyh8ExtdKsDDtjoEgtM.C7jyBI/9fEtK', 'admin', NULL, '2025-01-04 03:04:24', '2025-01-05 11:07:57'),
(4, 'Test 1', 'test@test.com', NULL, '$2y$12$ys8ZAH82Rhb8UZGUKOpIHOvt8DRZzorRdqI9SxGcgDZPo5NLoZ/Dm', 'customer', NULL, '2025-01-05 10:14:41', '2025-01-05 10:15:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_author_id_foreign` (`author_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
