-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2017 at 11:45 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petrol-pump`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `id` int(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `address` text NOT NULL,
  `car_company` varchar(100) DEFAULT NULL,
  `car_model` varchar(100) DEFAULT NULL,
  `car_number` varchar(100) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`id`, `first_name`, `last_name`, `dob`, `mobile_number`, `email`, `address`, `car_company`, `car_model`, `car_number`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Vishal', 'Nagpure', '1990-11-17', '7276574438', 'vish.nagpure@gmail.com', 'yeola', 'Tata', 'Md2478', 'MH01BE2014', '2017-11-29', '2017-11-29', NULL),
(2, 'Sampat', 'Jadhav', '1976-11-11', '7276574438', 'jsampat76@gmail.com', '', 'Toyta', 'JG24756', 'MH05BS2006', '2017-11-29', '2017-11-30', NULL),
(3, 'Tanaya', 'Lahore', '2017-11-16', '9587765452', 'demo@example.com', '', 'TATA', 'AS5502', 'MH02BE2017', '2017-11-29', '2017-11-30', '2017-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(2) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `role_type` varchar(50) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `role_type`, `created_date`) VALUES
(1, 'administrator', 'admin', '2017-11-01'),
(2, 'Manager', 'manager', '2017-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(5) DEFAULT NULL,
  `pic` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `pic`, `remember_token`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Vishal Nagpure', 'vish.nagpure@gmail.com', '$2y$10$vh3qkSQqhsAa7qDnP998jupmTA9fg0DdhcZmNzxd6SDvhqCLLjGhC', 1, '', 'xQoqQCV884XxbLhjk4Hzo3BTivC4HosCiIpKilFUPsImOPTX10uvoLkiE1Uc', 1, '2017-11-28 05:38:38', '2017-11-29 18:30:00', NULL),
(3, 'Tanaya', 'tanya@gmail.com', '$2y$10$h1O3m89aP2T2k.6p6OWreOYII9sRGI9vvSzYI1VkXmpWxrBSbiccS', 2, NULL, 'hOuKFoam4NlAvePWwbK9mXPeveykwws7lNooQrafwyKr1W4sDVCLEQxSMeKf', 1, '2017-11-30 02:59:03', '2017-11-30 05:21:13', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
