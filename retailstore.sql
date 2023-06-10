-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 10:35 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `retailstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cus_id` int(10) UNSIGNED NOT NULL,
  `cus_name` varchar(255) NOT NULL,
  `cus_phone` varchar(255) NOT NULL,
  `cus_addr` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inputs`
--

CREATE TABLE `inputs` (
  `ip_id` int(10) UNSIGNED NOT NULL,
  `ip_bill` varchar(255) NOT NULL,
  `ip_vat` double(8,2) NOT NULL,
  `ip_dateinput` date NOT NULL,
  `ip_datecreate` date NOT NULL,
  `ip_status` int(11) NOT NULL DEFAULT 0,
  `sp_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inputs`
--

INSERT INTO `inputs` (`ip_id`, `ip_bill`, `ip_vat`, `ip_dateinput`, `ip_datecreate`, `ip_status`, `sp_id`, `created_at`, `updated_at`) VALUES
(1, 'HD0004', 0.10, '2023-06-20', '2023-06-14', 1, 2, NULL, '2023-06-09 23:45:31'),
(2, 'HD0002', 0.50, '2023-06-22', '2023-06-24', 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `input_details`
--

CREATE TABLE `input_details` (
  `dt_id` int(10) UNSIGNED NOT NULL,
  `dt_quatity` int(11) NOT NULL,
  `dt_unit` varchar(255) NOT NULL,
  `dt_lotnumber` varchar(255) NOT NULL,
  `dt_expried` date NOT NULL,
  `dt_vat` double(8,2) NOT NULL,
  `dt_inputprice` double(8,2) NOT NULL,
  `dt_saleprice` double(8,2) NOT NULL,
  `prd_id` int(10) UNSIGNED NOT NULL,
  `ip_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `input_details`
--

INSERT INTO `input_details` (`dt_id`, `dt_quatity`, `dt_unit`, `dt_lotnumber`, `dt_expried`, `dt_vat`, `dt_inputprice`, `dt_saleprice`, `prd_id`, `ip_id`, `created_at`, `updated_at`) VALUES
(5, 12, 'Lốc', 'SL-009', '2023-06-15', 234567.00, 123456.00, 345678.00, 3, 1, '2023-06-10 01:19:23', '2023-06-10 01:19:23'),
(9, 10, 'Lon', 'SL-991', '2023-06-12', 1200.00, 123455.00, 345000.00, 2, 1, '2023-06-10 01:31:21', '2023-06-10 01:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `iv_id` int(10) UNSIGNED NOT NULL,
  `prd_id` int(10) UNSIGNED NOT NULL,
  `dt_id` int(10) UNSIGNED NOT NULL,
  `sdt_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_05_25_080011_create_products_table', 1),
(4, '2023_05_25_080145_create_suppliers_table', 1),
(5, '2023_05_25_080200_create_customers_table', 1),
(6, '2023_05_25_080217_create_inputs_table', 1),
(7, '2023_05_25_080229_create_input_details_table', 1),
(8, '2023_05_25_080246_create_sales_table', 1),
(9, '2023_05_25_080254_create_sale_details_table', 1),
(10, '2023_05_25_080311_create_inventories_table', 1);

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
  `prd_id` int(10) UNSIGNED NOT NULL,
  `prd_name` varchar(255) NOT NULL,
  `prd_unit` varchar(255) NOT NULL,
  `prd_inputprice` double(8,2) NOT NULL,
  `prd_saleprice` double(8,2) NOT NULL,
  `prd_desc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prd_id`, `prd_name`, `prd_unit`, `prd_inputprice`, `prd_saleprice`, `prd_desc`, `created_at`, `updated_at`) VALUES
(2, 'Bánh Oreo', 'Kg', 12000.00, 34000.00, 'rtyuio', '2023-06-09 23:22:46', '2023-06-09 23:22:46'),
(3, 'Olong', 'Lốc', 134000.00, 45000.00, '987654', '2023-06-10 00:56:42', '2023-06-10 00:58:54');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sl_id` int(10) UNSIGNED NOT NULL,
  `sl_vat` double(8,2) NOT NULL,
  `sl_note` varchar(255) NOT NULL,
  `sl_datecreate` datetime NOT NULL,
  `sl_status` varchar(255) NOT NULL,
  `cus_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_details`
--

CREATE TABLE `sale_details` (
  `sdt_id` int(10) UNSIGNED NOT NULL,
  `sdt_quantity` int(11) NOT NULL,
  `sdt_prdprice` double(8,2) NOT NULL,
  `sdt_totalprice` double(8,2) NOT NULL,
  `sdt_lotnumber` int(11) NOT NULL,
  `sdt_expiry` date NOT NULL,
  `sl_id` int(10) UNSIGNED NOT NULL,
  `prd_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `sp_id` int(10) UNSIGNED NOT NULL,
  `sp_name` varchar(255) NOT NULL,
  `sp_contact` varchar(255) NOT NULL,
  `sp_phone` varchar(255) NOT NULL,
  `sp_addr` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`sp_id`, `sp_name`, `sp_contact`, `sp_phone`, `sp_addr`, `created_at`, `updated_at`) VALUES
(1, 'Công ty cổ phần Mondelez Kinh Đô Việt Nam', 'Nguyen Hop Thoi', '0987654123', 'rrrrrrrr', '2023-06-09 20:11:21', '2023-06-09 20:11:21'),
(2, 'Nabisco', 'Tran Thi B', '1234567890', 'rrrrrrr', '2023-06-09 20:11:31', '2023-06-09 20:11:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `gender`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Nhom 4', 'Nữ', 'nhom4@gmail.com', '$2y$10$riAE2/kT1N4Ktp5NTVbqYuNknFuYj6EvkaBLYv/B9S5gjFm3Yfbu6', '2023-06-09 20:09:36', '2023-06-09 20:09:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cus_id`),
  ADD UNIQUE KEY `customers_cus_phone_unique` (`cus_phone`);

--
-- Indexes for table `inputs`
--
ALTER TABLE `inputs`
  ADD PRIMARY KEY (`ip_id`),
  ADD KEY `inputs_sp_id_foreign` (`sp_id`);

--
-- Indexes for table `input_details`
--
ALTER TABLE `input_details`
  ADD PRIMARY KEY (`dt_id`),
  ADD KEY `input_details_prd_id_foreign` (`prd_id`),
  ADD KEY `input_details_ip_id_foreign` (`ip_id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`iv_id`),
  ADD KEY `inventories_prd_id_foreign` (`prd_id`),
  ADD KEY `inventories_dt_id_foreign` (`dt_id`),
  ADD KEY `inventories_sdt_id_foreign` (`sdt_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`prd_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sl_id`),
  ADD KEY `sales_cus_id_foreign` (`cus_id`);

--
-- Indexes for table `sale_details`
--
ALTER TABLE `sale_details`
  ADD PRIMARY KEY (`sdt_id`),
  ADD KEY `sale_details_sl_id_foreign` (`sl_id`),
  ADD KEY `sale_details_prd_id_foreign` (`prd_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cus_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inputs`
--
ALTER TABLE `inputs`
  MODIFY `ip_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `input_details`
--
ALTER TABLE `input_details`
  MODIFY `dt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `iv_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sl_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_details`
--
ALTER TABLE `sale_details`
  MODIFY `sdt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `sp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inputs`
--
ALTER TABLE `inputs`
  ADD CONSTRAINT `inputs_sp_id_foreign` FOREIGN KEY (`sp_id`) REFERENCES `suppliers` (`sp_id`) ON DELETE CASCADE;

--
-- Constraints for table `input_details`
--
ALTER TABLE `input_details`
  ADD CONSTRAINT `input_details_ip_id_foreign` FOREIGN KEY (`ip_id`) REFERENCES `inputs` (`ip_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `input_details_prd_id_foreign` FOREIGN KEY (`prd_id`) REFERENCES `products` (`prd_id`) ON DELETE CASCADE;

--
-- Constraints for table `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `inventories_dt_id_foreign` FOREIGN KEY (`dt_id`) REFERENCES `input_details` (`dt_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inventories_prd_id_foreign` FOREIGN KEY (`prd_id`) REFERENCES `products` (`prd_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inventories_sdt_id_foreign` FOREIGN KEY (`sdt_id`) REFERENCES `sale_details` (`sdt_id`) ON DELETE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_cus_id_foreign` FOREIGN KEY (`cus_id`) REFERENCES `customers` (`cus_id`) ON DELETE CASCADE;

--
-- Constraints for table `sale_details`
--
ALTER TABLE `sale_details`
  ADD CONSTRAINT `sale_details_prd_id_foreign` FOREIGN KEY (`prd_id`) REFERENCES `products` (`prd_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sale_details_sl_id_foreign` FOREIGN KEY (`sl_id`) REFERENCES `sales` (`sl_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
