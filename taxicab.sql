-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2023 at 03:50 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taxicab`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `levenshtein` (`s1` VARCHAR(255), `s2` VARCHAR(255)) RETURNS INT(11)  BEGIN
  DECLARE s1_len, s2_len, i, j, c, c_temp, cost INT;
  DECLARE s1_char CHAR;
  DECLARE cv0, cv1 VARBINARY(256);

  SET s1_len = CHAR_LENGTH(s1),
      s2_len = CHAR_LENGTH(s2),
      cv1 = 0x00,
      j = 1,
      i = 1,
      c = 0;

  IF s1 = s2 THEN
    RETURN 0;
  ELSEIF s1_len = 0 THEN
    RETURN s2_len;
  ELSEIF s2_len = 0 THEN
    RETURN s1_len;
  ELSE
    WHILE j <= s2_len DO
      SET cv1 = CONCAT(cv1, UNHEX(HEX(j))),
          j = j + 1;
    END WHILE;

    WHILE i <= s1_len DO
      SET s1_char = SUBSTRING(s1, i, 1),
          c = i,
          cv0 = UNHEX(HEX(i)),
          j = 1;

      WHILE j <= s2_len DO
        SET c = c + 1,
            cost = IF(s1_char = SUBSTRING(s2, j, 1), 0, 1);

        SET c_temp = CONV(HEX(SUBSTRING(cv1, j, 1)), 16, 10) + cost;

        IF c > c_temp THEN
          SET c = c_temp;
        END IF;

        SET cv0 = CONCAT(cv0, UNHEX(HEX(c))),
            j = j + 1;
      END WHILE;

      SET cv1 = cv0,
          i = i + 1;
    END WHILE;
  END IF;

  RETURN c;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `firstname`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '$2y$10$.irYntb9CtsxiIdauojb1e8JiLGQGruday2uzB1O4rNr.rpZPPrDi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cars` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `cars`, `type_id`, `created_at`, `updated_at`) VALUES
(1, 'Maruti Swift', 1, NULL, NULL),
(2, 'Totoya Liva\r\n', 1, NULL, NULL),
(3, 'Swift Dzire', 2, NULL, NULL),
(4, 'Hyundai Xcent', 2, NULL, NULL),
(5, 'Toyota Etios', 2, NULL, NULL),
(6, 'Maruti Ertiga', 3, NULL, NULL),
(7, 'Mahindra Marazzo', 3, NULL, NULL),
(8, 'Toyota Innova', 3, NULL, NULL),
(9, 'Verna', 2, '2023-09-04 05:03:32', '2023-09-04 05:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `cartypes`
--

CREATE TABLE `cartypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `seats` varchar(20) NOT NULL,
  `luggage` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cartypes`
--

INSERT INTO `cartypes` (`id`, `type`, `seats`, `luggage`, `created_at`, `updated_at`) VALUES
(1, 'HATCHBACK', '4', '2', NULL, NULL),
(2, 'SEDAN', '4', '3', NULL, NULL),
(3, 'SUV', '6', '3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`, `created_at`, `updated_at`) VALUES
(3, 'Surat', '2023-09-05 07:30:39', '2023-09-05 07:30:39'),
(4, 'Ahmedabad', '2023-09-05 07:30:39', '2023-09-05 07:30:39'),
(5, 'Bombay', '2023-09-05 07:36:30', '2023-09-05 07:36:30'),
(6, 'Baroda', '2023-09-05 07:36:30', '2023-09-05 07:36:30'),
(7, 'Bardoli', '2023-09-05 23:45:34', '2023-09-05 23:45:34'),
(8, 'Navsari', '2023-09-05 23:58:13', '2023-09-05 23:58:13');

-- --------------------------------------------------------

--
-- Table structure for table `city_logs`
--

CREATE TABLE `city_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` varchar(255) NOT NULL,
  `to` varchar(255) NOT NULL,
  `suv` varchar(11) NOT NULL,
  `sedan` varchar(11) NOT NULL,
  `hatchback` varchar(11) NOT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city_logs`
--

INSERT INTO `city_logs` (`id`, `from`, `to`, `suv`, `sedan`, `hatchback`, `amount`, `created_at`, `updated_at`) VALUES
(2, '3', 'Ahmedabad', '900', '800', '700', NULL, NULL, NULL),
(3, '4', 'Surat', '900', '800', '700', NULL, NULL, NULL),
(4, '5', 'Baroda', '200', '100', '300', NULL, NULL, NULL),
(5, '6', 'Bombay', '200', '100', '300', NULL, NULL, NULL),
(6, '3', 'Bombay', '900', '800', '300', NULL, NULL, NULL),
(7, '3', 'Baroda', '200', '100', '50', NULL, NULL, NULL),
(8, '5', 'Surat', '20', '10', '300', NULL, NULL, NULL),
(9, '6', 'Surat', '200', '100', '50', NULL, NULL, NULL),
(10, '3', 'Navsari', '900', '800', '300', NULL, NULL, NULL),
(11, '3', 'Bardoli', '900', '800', '700', NULL, NULL, NULL),
(12, '8', 'Surat', '900', '800', '300', NULL, NULL, NULL),
(13, '7', 'Surat', '900', '800', '700', NULL, NULL, NULL);

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
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `pickup_address` varchar(50) DEFAULT NULL,
  `drop_address` varchar(50) DEFAULT NULL,
  `pickup_time` varchar(10) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `inq_id` varchar(20) DEFAULT NULL,
  `pickup_ct` varchar(25) DEFAULT NULL,
  `drop_ct` varchar(40) DEFAULT NULL,
  `car_type` varchar(11) DEFAULT NULL,
  `base_fare` varchar(50) DEFAULT NULL,
  `paid` int(11) NOT NULL DEFAULT 0,
  `total_amt` varchar(20) DEFAULT NULL,
  `amt_paid` varchar(25) DEFAULT NULL,
  `amt_pending` varchar(25) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `name`, `email`, `mobile`, `pickup_address`, `drop_address`, `pickup_time`, `date`, `inq_id`, `pickup_ct`, `drop_ct`, `car_type`, `base_fare`, `paid`, `total_amt`, `amt_paid`, `amt_pending`, `created_at`, `updated_at`) VALUES
(1, 'asd', 'v@gmail.com', '1234567890', 'juhapura', 'station', '18:30', '2023-09-16', '75928541', 'Surat', 'Bardoli', '3', '900', 1, '900', '225', '675', '2023-09-06 07:25:25', '2023-09-06 07:31:29'),
(2, 'cvbcv', 'n@gmail.com', '1234567890', 'fdg', 'rete', '22:36', '2023-09-27', '62508067', 'Ahmedabad', 'Surat', '2', '800', 1, '800', '800', '0', '2023-09-06 07:33:50', '2023-09-06 07:36:27'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '42439840', 'Surat', 'Bardoli', '3', '900', 0, NULL, NULL, NULL, '2023-09-06 07:37:31', '2023-09-06 07:37:36'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98200213', 'Surat', 'Bardoli', NULL, NULL, 0, NULL, NULL, NULL, '2023-09-06 07:40:30', '2023-09-06 07:40:30'),
(5, 'user1', 'r@gmail.com', '9316071733', NULL, NULL, NULL, NULL, '74936510', 'Surat', 'Bombay', NULL, NULL, 0, NULL, NULL, NULL, '2023-09-06 07:40:51', '2023-09-06 07:40:51'),
(6, 'user1', 'r@gmail.com', '9316071733', 'juhapura', 'rete', '18:44', '2023-09-19', '43010851', 'Ahmedabad', 'Surat', '2', '800', 1, '800', '200', '600', '2023-09-06 07:41:05', '2023-09-06 07:42:11'),
(7, 'user1', 'r@gmail.com', '9316071733', NULL, NULL, NULL, NULL, '68274962', 'Surat', 'Navsari', NULL, NULL, 0, NULL, NULL, NULL, '2023-09-06 07:42:28', '2023-09-06 07:42:28'),
(8, 'user1', 'r@gmail.com', '9316071733', NULL, NULL, NULL, NULL, '32794275', 'Bombay', 'Surat', '3', '20', 0, NULL, NULL, NULL, '2023-09-06 07:42:33', '2023-09-06 07:43:31'),
(9, 'Nomaan', 'nb@gmail.com', '1234567890', 'juhapura', 'station', '21:45', '2023-09-14', '10623171', 'Surat', 'Ahmedabad', '2', '800', 1, '800', '200', '600', '2023-09-06 07:44:05', '2023-09-06 07:46:28'),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '75730910', 'Ahmedabad', 'Surat', '1', '700', 0, NULL, NULL, NULL, '2023-09-06 07:47:41', '2023-09-06 07:48:14'),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '14191413', 'Ahmedabad', 'Surat', NULL, NULL, 0, NULL, NULL, NULL, '2023-09-06 07:48:56', '2023-09-06 07:48:56'),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85481720', 'Bombay', 'Surat', '3', '20', 0, NULL, NULL, NULL, '2023-09-06 07:49:06', '2023-09-06 07:49:08'),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '57981553', 'Bombay', 'Baroda', NULL, NULL, 0, NULL, NULL, NULL, '2023-09-06 07:49:22', '2023-09-06 07:49:22'),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '96042898', 'Surat', 'Baroda', NULL, NULL, 0, NULL, NULL, NULL, '2023-09-06 07:49:29', '2023-09-06 07:49:29'),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15513342', 'Surat', 'Bombay', NULL, NULL, 0, NULL, NULL, NULL, '2023-09-06 07:49:31', '2023-09-06 07:49:31'),
(16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '44023596', 'Surat', 'Ahmedabad', NULL, NULL, 0, NULL, NULL, NULL, '2023-09-06 07:49:35', '2023-09-06 07:49:35'),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '72742715', 'Surat', 'Navsari', NULL, NULL, 0, NULL, NULL, NULL, '2023-09-06 07:49:46', '2023-09-06 07:49:46'),
(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '35363830', 'Surat', 'Ahmedabad', NULL, NULL, 0, NULL, NULL, NULL, '2023-09-06 07:59:46', '2023-09-06 07:59:46'),
(19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '90589796', 'Surat', 'Ahmedabad', NULL, NULL, 0, NULL, NULL, NULL, '2023-09-06 08:00:19', '2023-09-06 08:00:19'),
(20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '99190918', 'Surat', 'Bombay', '1', '300', 0, NULL, NULL, NULL, '2023-09-06 08:03:58', '2023-09-06 08:04:02'),
(21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3787972', 'Navsari', 'Surat', NULL, NULL, 0, NULL, NULL, NULL, '2023-09-06 08:13:46', '2023-09-06 08:13:46'),
(22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '78730366', 'Surat', 'Bombay', NULL, NULL, 0, NULL, NULL, NULL, '2023-09-06 08:13:50', '2023-09-06 08:13:50'),
(23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98274299', 'Surat', 'Navsari', NULL, NULL, 0, NULL, NULL, NULL, '2023-09-06 08:14:04', '2023-09-06 08:14:04'),
(24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '71343738', 'Ahmedabad', 'Surat', NULL, NULL, 0, NULL, NULL, NULL, '2023-09-06 08:14:15', '2023-09-06 08:14:15'),
(25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5806917', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-09-06 08:14:44', '2023-09-06 08:14:44');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_28_113152_create_cities_table', 1),
(6, '2023_08_28_123925_create_inquiries_table', 2),
(7, '2023_08_28_140019_create_cartypes_table', 3),
(8, '2023_08_28_140050_create_cars_table', 4),
(9, '2023_09_04_063041_create_admins_table', 5),
(10, '2023_09_04_110925_create_users_table', 6),
(11, '2023_09_04_133928_create_city_logs_table', 7);

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `number`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'user1', '9316071733', 'r@gmail.com', '$2y$10$yaShxvU61pnxctSjBGkLOO.XiEkxbMi0RsVIr5vQsBXwOsf34/VLK', NULL, NULL),
(2, 'fd', '1234567890', 'u@u.com', '$2y$10$TNusEhc24odP1jusuZbsAOxWJukmTnxj45bf4Sl9pxdCgQxzMAzMS', '2023-09-05 00:01:53', '2023-09-05 00:01:53'),
(5, 'b', '1111100000', 'b@b.com', '$2y$10$Amw/uMCk2ii0/AGGJFUM2eARMcZ8AQ.QJy9C6rjCXGjth8Uie2CMK', '2023-09-05 04:48:43', '2023-09-05 04:48:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cartypes`
--
ALTER TABLE `cartypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_logs`
--
ALTER TABLE `city_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cartypes`
--
ALTER TABLE `cartypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `city_logs`
--
ALTER TABLE `city_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
