-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 07, 2023 at 01:25 AM
-- Server version: 10.3.39-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `armsccom_rentalcar`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_requests`
--

CREATE TABLE `borrowed_requests` (
  `id` int(11) NOT NULL,
  `total_addon` int(11) NOT NULL,
  `addons` varchar(220) DEFAULT NULL,
  `granttotal` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `Vattax` varchar(250) DEFAULT NULL,
  `code` varchar(200) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `car_id` int(11) DEFAULT NULL,
  `pick_up_date` varchar(100) DEFAULT NULL,
  `drop_off_date` varchar(100) DEFAULT NULL,
  `pick_up_location` varchar(200) DEFAULT NULL,
  `drop_off_location` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrowed_requests`
--

INSERT INTO `borrowed_requests` (`id`, `total_addon`, `addons`, `granttotal`, `total`, `Vattax`, `code`, `user_id`, `car_id`, `pick_up_date`, `drop_off_date`, `pick_up_location`, `drop_off_location`, `status`, `created_at`, `updated_at`) VALUES
(85, 2, '[\"8\",\"9\"]', 1839, 1751, '87.55', 'null', 90, 4, '07/15/2023 23:28:00', '07/16/2023 23:28:00', 'The Centaurus Mall Islamabad', 'Wild Venture Water Park and Resort Gadap Karachi', 1, '2023-08-14 23:29:56', '2023-08-14 23:31:09'),
(86, 0, '[]', 571, 544, '27.2', 'null', 99, 4, '08/12/2023 12:38:00', '08/13/2023 12:38:00', 'Bangladesh', 'BurJuman', 0, '2023-09-11 12:40:52', '2023-09-11 12:40:52'),
(87, 0, '[]', 7564, 7204, '360.2', 'null', 110, 4, 'undefined', 'undefined', 'Okinawa', 'Okinawa', 0, '2023-09-26 00:58:56', '2023-09-26 00:58:56'),
(88, 0, '[]', 7564, 7204, '360.2', 'null', 110, 4, 'undefined', 'undefined', 'Okinawa', 'Okinawa', 0, '2023-09-26 00:59:03', '2023-09-26 00:59:03'),
(89, 1, '[\"10\"]', 1758, 1674, '83.7', 'null', 110, 4, '09/27/2023 01:15:00', '09/30/2023 01:15:00', '6g', 'Târgu Mureș', 0, '2023-09-26 01:19:19', '2023-09-26 01:19:19'),
(90, 1, '[\"10\"]', 3506, 3339, '166.95', 'null', 110, 4, '09/23/2023 01:27:00', '09/29/2023 01:27:00', 'ok', 'ok', 0, '2023-09-26 01:27:53', '2023-09-26 01:27:53');

-- --------------------------------------------------------

--
-- Table structure for table `cancelation_requests`
--

CREATE TABLE `cancelation_requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `car_id` int(11) DEFAULT NULL,
  `percentage` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `approve` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `order_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cancelation_requests`
--

INSERT INTO `cancelation_requests` (`id`, `user_id`, `car_id`, `percentage`, `amount`, `approve`, `created_at`, `updated_at`, `order_id`) VALUES
(19, 90, 1, NULL, 721, 1, '2023-08-14 23:30:41', '2023-08-14 23:33:28', 'ORD-20230814#26'),
(20, 102, 1, NULL, 721, 1, '2023-09-10 23:13:21', '2023-09-10 23:14:32', 'ORD-20230907#28'),
(21, 102, 1, NULL, 721, 1, '2023-09-10 23:14:16', '2023-09-10 23:14:32', 'ORD-20230907#28'),
(22, 110, 3, NULL, 5958, 1, '2023-09-26 00:59:51', '2023-09-26 01:34:30', 'ORD-20230926#34'),
(23, 110, 3, NULL, 5958, 1, '2023-09-26 01:02:19', '2023-09-26 01:34:30', 'ORD-20230926#34'),
(24, 110, 3, NULL, 5958, 1, '2023-09-26 01:19:31', '2023-09-26 01:34:30', 'ORD-20230926#34'),
(25, 110, 2, NULL, 2962, 1, '2023-09-26 01:35:00', '2023-09-26 01:36:07', 'ORD-20230926#35'),
(26, 110, 2, NULL, 2962, 1, '2023-09-26 01:35:36', '2023-09-26 01:36:07', 'ORD-20230926#35'),
(27, 85, 1, NULL, 3124, 1, '2023-09-27 06:19:46', '2023-09-27 06:20:36', 'ORD-20230817#27'),
(28, 85, 1, NULL, 3124, 0, '2023-09-27 06:21:25', '2023-09-27 06:21:25', 'ORD-20230817#27'),
(29, 85, 1, NULL, 3124, 0, '2023-09-27 06:21:57', '2023-09-27 06:21:57', 'ORD-20230817#27'),
(30, 110, 1, NULL, -80, 1, '2023-09-27 23:59:27', '2023-09-27 23:59:48', 'ORD-20230927#36');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `car_rent_price` int(11) NOT NULL,
  `discount` int(11) DEFAULT 0,
  `after_discount` int(11) DEFAULT 0,
  `vehicle_type` varchar(100) DEFAULT NULL,
  `is_borrowed` int(11) DEFAULT NULL,
  `car_rent_type` varchar(150) NOT NULL,
  `car_name` varchar(255) NOT NULL,
  `car_images` varchar(255) DEFAULT NULL,
  `car_brand` varchar(255) DEFAULT NULL,
  `car_make` varchar(255) DEFAULT NULL,
  `car_model` varchar(255) DEFAULT NULL,
  `car_vin` varchar(255) DEFAULT NULL,
  `model_year` varchar(255) DEFAULT NULL,
  `product_type` varchar(150) DEFAULT NULL,
  `body` varchar(200) DEFAULT NULL,
  `series` varchar(200) DEFAULT NULL,
  `drive` varchar(100) DEFAULT NULL,
  `fuel_type_primary` varchar(120) DEFAULT NULL,
  `manufacturer` varchar(225) DEFAULT NULL,
  `no_of_doors` varchar(150) DEFAULT NULL,
  `no_of_seats` varchar(200) DEFAULT NULL,
  `max_trunk_capacity` varchar(200) DEFAULT NULL,
  `abs` varchar(50) DEFAULT 'yes',
  `car_description` text DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `car_registration_no` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `car_rent_price`, `discount`, `after_discount`, `vehicle_type`, `is_borrowed`, `car_rent_type`, `car_name`, `car_images`, `car_brand`, `car_make`, `car_model`, `car_vin`, `model_year`, `product_type`, `body`, `series`, `drive`, `fuel_type_primary`, `manufacturer`, `no_of_doors`, `no_of_seats`, `max_trunk_capacity`, `abs`, `car_description`, `status`, `created_at`, `updated_at`, `car_registration_no`) VALUES
(1, 801, 10, 80, 'Sedan', 0, 'day', 'Ford', '[\"1691279026.png\",\"1691279026.png\"]', 'Honda', 'Ford', 'Explorer', '1FMCU24X4NUD21099', '2023', 'Car', 'Sport Utility Vehicle (SUV)/Multi Purpose Vehicle (MPV)', 'XL', '4x4 - Four-wheel drive', 'Gasoline', 'Ford Motor Co', '2', '9', '65', 'yes', '<p>nice car</p><p>asdadasdsadad</p>', 1, '2023-06-09 19:25:23', '2023-09-15 07:46:28', 'F12465'),
(2, 750, 5, 38, 'SUV', 0, 'day', 'Honda1', '[]', 'Honda', 'Honda', 'Legend', 'JH4KA4650LC000937', '1990', 'Car', 'Sedan/Saloon', 'Legend I (HS,KA)', 'Front-wheel drive', 'Gasoline', 'Honda Motor Co Ltd', '4', '5', '1200', 'yes', '<p>cool</p>', 1, '2023-06-09 20:24:28', '2023-06-09 20:31:01', 'GHE555'),
(3, 600, 7, 42, 'SUV', 0, 'day', 'Lexus', '[\"1690318762.png\",\"1690318763.png\",\"1690318763.png\",\"1690318763.png\",\"1690318763.png\"]', 'Honda', 'Lexus', 'RX 350', 'JTJZB1BA8A2400307', '2009', 'Car', 'Sport Utility Vehicle (SUV)/Multi Purpose Vehicle (MPV)', 'GGL10L/GGL15L/GYL10L/GYL15L', '4x2', 'Gasoline', 'Toyota Motor Corp', '5', '5', '98', 'yes', '<p>yh</p>', 1, '2023-06-09 20:48:11', '2023-07-26 01:59:23', 'GHD322'),
(4, 555, 2, 11, 'Sedan', 1, 'day', 'Volvo', '[\"1686325921.webp\"]', 'Honda', 'Volvo', 'C30', 'YV1672MK9D2304784', '2013', 'Car', 'Hatchback/Liftback/Notchback', 'C30 (facelift 2010)', 'Front-wheel drive', 'Gasoline', 'Volvo Car Corporation', '3', '4', '98', 'no', '<p>hghgh</p>', 1, '2023-06-09 20:52:01', '2023-08-14 23:29:21', 'HGT344');

-- --------------------------------------------------------

--
-- Table structure for table `car_addons`
--

CREATE TABLE `car_addons` (
  `id` int(11) NOT NULL,
  `addon_name` varchar(200) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `rent_price` int(11) DEFAULT NULL,
  `buying_price` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(5) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_addons`
--

INSERT INTO `car_addons` (`id`, `addon_name`, `stock`, `rent_price`, `buying_price`, `description`, `created_at`, `updated_at`, `status`) VALUES
(8, 'Bilal', 5, 1200, 1000, '<p>This is best</p>', '2023-06-18 19:50:12', '2023-09-26 01:17:07', 0),
(9, 'Soft Drinks', 600, 7, 5, '<p>Child Cold drink</p>', '2023-07-20 02:18:33', '2023-07-20 02:19:03', 1),
(10, 'Portable chairs', 1150, 20, 100, '<p>ABC</p>', '2023-09-26 01:15:23', '2023-09-26 01:33:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `car_brands`
--

CREATE TABLE `car_brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_brands`
--

INSERT INTO `car_brands` (`id`, `brand_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Honda', 1, '2023-06-09 19:12:10', '2023-06-09 19:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `car_orders`
--

CREATE TABLE `car_orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(150) DEFAULT NULL,
  `car_id` int(11) DEFAULT NULL,
  `comment_box` text DEFAULT NULL,
  `car_brand` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `addon_id` varchar(250) DEFAULT NULL,
  `car_img` varchar(100) DEFAULT NULL,
  `coupon_name` varchar(200) DEFAULT NULL,
  `coupon_amt` varchar(200) DEFAULT NULL,
  `stripe_id` varchar(200) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `payment_type` varchar(100) DEFAULT NULL,
  `pick_up_date` varchar(100) DEFAULT NULL,
  `drop_off_date` varchar(100) DEFAULT NULL,
  `pickup_location` varchar(200) DEFAULT NULL,
  `dropoff_location` varchar(100) DEFAULT NULL,
  `is_confirmed` int(11) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'pending',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_orders`
--

INSERT INTO `car_orders` (`id`, `order_id`, `car_id`, `comment_box`, `car_brand`, `user_id`, `addon_id`, `car_img`, `coupon_name`, `coupon_amt`, `stripe_id`, `payment_id`, `payment_type`, `pick_up_date`, `drop_off_date`, `pickup_location`, `dropoff_location`, `is_confirmed`, `status`, `created_at`, `updated_at`) VALUES
(25, 'ORD-20230814#1', 1, NULL, 'Honda', 90, '[\"8\",\"9\"]', '1691279026.png', 'null', 'null', 'tok_1Nf5TwLzX8Wo4jkEYkKr6Xtv', 25, 'cod', '07/15/2023 23:21:00', '07/16/2023 23:21:00', 'Kareem Block Market', 'Karachi Cantt Railway Station', 0, 'pending', '2023-08-14 23:27:16', '2023-08-14 23:27:16'),
(26, 'ORD-20230814#26', 1, NULL, 'Honda', 90, '[]', '1691279026.png', 'null', 'null', 'tok_1Nf5VCLzX8Wo4jkEb3stQ23c', 26, 'online', '07/15/2023 23:27:00', '07/16/2023 23:27:00', 'Emporium Mall', 'Railway Station Lahore', 1, 'Canceled', '2023-08-14 23:28:34', '2023-08-14 23:33:28'),
(27, 'ORD-20230817#27', 1, NULL, 'Honda', 85, '[]', '1691279026.png', 'null', 'null', 'tok_1NgA2JLzX8Wo4jkEy0ZwRg35', 27, 'online', '08/24/2023 18:30:00', '08/20/2023 18:30:00', 'Dubai Mall', 'Dubai Hills Mall', 1, 'Canceled', '2023-08-17 22:31:11', '2023-09-27 06:20:36'),
(28, 'ORD-20230907#28', 1, NULL, 'Honda', 102, '[]', '1691279026.png', 'null', 'null', 'tok_1NnivaLzX8Wo4jkEzSJkmS5s', 28, 'online', 'undefined', 'undefined', 'Karachi', 'Lahore', 1, 'Canceled', '2023-09-07 19:11:31', '2023-09-10 23:13:59'),
(29, 'ORD-20230907#29', 1, NULL, 'Honda', 102, '[]', '1691279026.png', 'null', 'null', 'tok_1NnixhLzX8Wo4jkE9EkQm6q6', 29, 'online', '09/07/2023 17:12:00', '09/08/2023 15:12:00', 'Dubai International Airport', 'Dubai International Airport', 1, 'confirmed', '2023-09-07 19:13:41', '2023-09-07 19:13:41'),
(30, 'ORD-20230910#30', 1, NULL, 'Honda', 102, '[]', '1691279026.png', 'null', 'null', 'tok_1Nos7aLzX8Wo4jkE9QWqzgdS', 30, 'online', '09/15/2023 19:11:00', '09/17/2023 19:11:00', 'Dubai', 'Dubai Mall', 1, 'confirmed', '2023-09-10 23:12:39', '2023-09-10 23:12:39'),
(31, 'ORD-20230910#31', 1, NULL, 'Honda', 71, '[\"9\"]', '1691279026.png', 'null', 'null', 'tok_1Nos7xLzX8Wo4jkERuaDh3ej', 31, 'cod', 'undefined', 'undefined', 'Karachi', 'Islamabad', 0, 'pending', '2023-09-10 23:13:01', '2023-09-10 23:13:01'),
(32, 'ORD-20230910#32', 2, NULL, 'Honda', 102, '[]', 'undefined', 'null', 'null', 'tok_1NosBELzX8Wo4jkEQh5ZY41t', 32, 'cod', '09/27/2023 19:15:00', '09/30/2023 19:15:00', 'Dubai Hills Mall', 'Dubai International Airport', 0, 'pending', '2023-09-10 23:16:24', '2023-09-10 23:16:24'),
(33, 'ORD-20230911#33', 1, NULL, 'Honda', 104, '[]', '1691279026.png', 'null', 'null', 'tok_1NotIhLzX8Wo4jkE3As6Aw9u', 33, 'cod', '09/21/2023 00:20:00', '09/29/2023 00:21:00', 'Downtown Dubai', 'Dubai Marina Mall', 0, 'pending', '2023-09-11 00:28:12', '2023-09-11 00:28:12'),
(34, 'ORD-20230926#34', 3, NULL, 'Honda', 110, '[]', '1690318762.png', 'null', 'null', 'tok_1NuKrKLzX8Wo4jkEVu2dmDXs', 34, 'cod', '09/27/2023 00:52:00', '10/07/2023 00:52:00', 'Burj Khalifa', 'Oman', 0, 'Canceled', '2023-09-26 00:54:27', '2023-09-26 01:34:30'),
(35, 'ORD-20230926#35', 2, NULL, 'Honda', 110, '[]', 'undefined', 'null', 'null', 'tok_1NuL3ALzX8Wo4jkE1muR6WVu', 35, 'cod', '09/23/2023 01:02:00', '09/30/2023 01:02:00', 'ok', 'ok', 0, 'Canceled', '2023-09-26 01:06:40', '2023-09-26 01:35:21'),
(36, 'ORD-20230927#36', 1, NULL, 'Honda', 110, '[]', '1691279026.png', 'null', 'null', 'tok_1Nv2wrLzX8Wo4jkEIVPpdHFr', 36, 'cod', '09/30/2023 23:58:00', '09/30/2023 23:58:00', 'ok', 'ok', 0, 'Canceled', '2023-09-27 23:59:06', '2023-09-27 23:59:48');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `coupon_name` varchar(200) DEFAULT NULL,
  `coupon_type` varchar(200) DEFAULT NULL,
  `coupon_amt` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `offer_name` varchar(200) NOT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  `offer_discount` varchar(11) DEFAULT NULL,
  `discount_code` varchar(100) DEFAULT NULL,
  `discription` text NOT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_payments`
--

CREATE TABLE `order_payments` (
  `id` int(11) NOT NULL,
  `car_order_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `Vattax` varchar(250) DEFAULT NULL,
  `received_amount` int(11) DEFAULT NULL,
  `is_confirmed` int(11) DEFAULT NULL,
  `payment_type` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_payments`
--

INSERT INTO `order_payments` (`id`, `car_order_id`, `user_id`, `amount`, `Vattax`, `received_amount`, `is_confirmed`, `payment_type`, `created_at`, `updated_at`) VALUES
(25, 25, 90, 1928, NULL, 386, 0, 'cod', '2023-08-14 23:27:16', '2023-08-14 23:27:16'),
(26, 26, 90, 721, NULL, 721, 1, 'online', '2023-08-14 23:28:34', '2023-08-14 23:28:34'),
(27, 27, 85, 3124, NULL, 3124, 1, 'online', '2023-08-17 22:31:11', '2023-08-17 22:31:11'),
(28, 28, 102, 721, NULL, 721, 1, 'online', '2023-09-07 19:11:31', '2023-09-07 19:11:31'),
(29, 29, 102, -80, NULL, -80, 1, 'online', '2023-09-07 19:13:41', '2023-09-07 19:13:41'),
(30, 30, 102, 1522, NULL, 1522, 1, 'online', '2023-09-10 23:12:39', '2023-09-10 23:12:39'),
(31, 31, 71, 9539, NULL, 1908, 0, 'cod', '2023-09-10 23:13:01', '2023-09-10 23:13:01'),
(32, 32, 102, 2212, NULL, 442, 0, 'cod', '2023-09-10 23:16:24', '2023-09-10 23:16:24'),
(33, 33, 104, 6328, NULL, 1266, 0, 'cod', '2023-09-11 00:28:12', '2023-09-11 00:28:12'),
(34, 34, 110, 5958, NULL, 1192, 0, 'cod', '2023-09-26 00:54:27', '2023-09-26 00:54:27'),
(35, 35, 110, 2962, NULL, 592, 0, 'cod', '2023-09-26 01:06:40', '2023-09-26 01:06:40'),
(36, 36, 110, -80, NULL, -16, 0, 'cod', '2023-09-27 23:59:06', '2023-09-27 23:59:06');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(9, 'softwebpak2@gmail.com', 'H6nBb9nkj65RvZEE4c76uUTDW8CgH7DQsqRSBdwS', '2023-05-04 20:42:37');

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

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 41, 'ahmexbilal@gmail.com', '536f09fa1d1430b96f0f05cfe4814648ba32d3424ea3034ddfe6b2a6987a195a', '[\"*\"]', NULL, NULL, '2023-05-03 00:14:30', '2023-05-03 00:14:30'),
(2, 'App\\Models\\User', 41, 'ahmexbilal@gmail.com', '2bb870ea4ebacc73773c0bb67d7038158d960d643909920be4039434084636cb', '[\"*\"]', NULL, NULL, '2023-05-03 22:27:30', '2023-05-03 22:27:30'),
(3, 'App\\Models\\User', 43, 'alisaanjhe444@gmail.com', 'e4e438ed9632723be64d4d036972da0eb7f3abb6db6818fa08c82231574943a4', '[\"*\"]', NULL, NULL, '2023-05-04 20:44:09', '2023-05-04 20:44:09'),
(4, 'App\\Models\\User', 43, 'alisaanjhe444@gmail.com', 'd1b641bf43278f3def5da2e095faf1c3c5482879b3e001270f46ac6f4593dd89', '[\"*\"]', NULL, NULL, '2023-05-04 21:00:06', '2023-05-04 21:00:06'),
(5, 'App\\Models\\User', 43, 'alisaanjhe444@gmail.com', 'c3a456721680c13c9264889e2eed2938e8cd9c9393e0ff88a973ae86a9d3f338', '[\"*\"]', NULL, NULL, '2023-05-04 21:26:18', '2023-05-04 21:26:18'),
(6, 'App\\Models\\User', 43, 'alisaanjhe444@gmail.com', '630d1695c1e2834e8be33ab13dc5f34973289b50c12ad665c5f4f689dabb3c42', '[\"*\"]', NULL, NULL, '2023-05-04 22:00:43', '2023-05-04 22:00:43'),
(7, 'App\\Models\\User', 43, 'alisaanjhe444@gmail.com', 'a3cb62bd349548ee9ead0f3fefdcc5a4d356d7debb81eb77225667738b936fcb', '[\"*\"]', NULL, NULL, '2023-05-04 22:21:17', '2023-05-04 22:21:17'),
(8, 'App\\Models\\User', 43, 'alisaanjhe444@gmail.com', 'aed5335dc0e6b2c976b9247c72f5c979f34ed23d5c09eea7be19d43aeb592c06', '[\"*\"]', NULL, NULL, '2023-05-04 22:32:04', '2023-05-04 22:32:04'),
(9, 'App\\Models\\User', 49, 'mobic37585@jobbrett.com', 'b7c98607f3766372d0770052446ab78c71bd4e91ce1ec61124ce2a6b85008146', '[\"*\"]', NULL, NULL, '2023-05-05 19:48:16', '2023-05-05 19:48:16'),
(10, 'App\\Models\\User', 49, 'mobic37585@jobbrett.com', '506cff211bd951a091c6874d376607adc19602108378a936cdcbd9deff3de875', '[\"*\"]', NULL, NULL, '2023-05-05 20:00:07', '2023-05-05 20:00:07'),
(11, 'App\\Models\\User', 49, 'mobic37585@jobbrett.com', '22d6b8af46937b1f547467f6200a28b8662b3fce7d91a292b19895bae14bfde4', '[\"*\"]', NULL, NULL, '2023-05-05 20:20:26', '2023-05-05 20:20:26'),
(12, 'App\\Models\\User', 43, 'alisaanjhe444@gmail.com', 'b7c06ccf79f363e0847694219f159634faa7e1ca2a779a18ddaa3d16b308b89c', '[\"*\"]', NULL, NULL, '2023-05-05 20:32:10', '2023-05-05 20:32:10'),
(13, 'App\\Models\\User', 43, 'alisaanjhe444@gmail.com', 'd977945ff571015f91b90e113ab586615ac4fccbc42f7a69eb89cd541cd764a8', '[\"*\"]', NULL, NULL, '2023-05-05 20:44:21', '2023-05-05 20:44:21'),
(14, 'App\\Models\\User', 43, 'alisaanjhe444@gmail.com', 'ce7fac63b09355f02d81fbc6bab8d7777604c82d609f2ff461063e1b6a365959', '[\"*\"]', NULL, NULL, '2023-05-05 20:56:56', '2023-05-05 20:56:56'),
(15, 'App\\Models\\User', 43, 'alisaanjhe444@gmail.com', '730ec357919841d2e2c251b84173d9351bc8784f1ab969b01e9001d314cf1c12', '[\"*\"]', NULL, NULL, '2023-05-05 22:16:10', '2023-05-05 22:16:10'),
(16, 'App\\Models\\User', 43, 'alisaanjhe444@gmail.com', '82c967c3213ebcce8366d74cab2cdd69438539f5d7d9e3803a4f363b23e2649d', '[\"*\"]', NULL, NULL, '2023-05-05 23:34:58', '2023-05-05 23:34:58'),
(17, 'App\\Models\\User', 43, 'alisaanjhe444@gmail.com', 'aa8bdc78cc0796446b4ec26fd088c0303fbf880102608b3b967a07ea3aee087f', '[\"*\"]', NULL, NULL, '2023-05-06 00:17:40', '2023-05-06 00:17:40'),
(18, 'App\\Models\\User', 51, 'fahey25656@soombo.com', '790f5fd4bda2e6617cd2e7f2905165c5acf714441a3d174f36aaf6db48b01e75', '[\"*\"]', NULL, NULL, '2023-05-06 17:45:00', '2023-05-06 17:45:00'),
(19, 'App\\Models\\User', 52, 'fahey25656@soombo.com', '9254a7f9a5fda6913f421e7f9c9ea9a8eb3bc72a4a166301db7db26d43ed76ce', '[\"*\"]', NULL, NULL, '2023-05-06 17:55:58', '2023-05-06 17:55:58'),
(20, 'App\\Models\\User', 21, 'yafaia9@gmail.com', '3bf6e85247da472487b902ea461094dc8e328f0ceaa9c4f0cec7f75360d13dd5', '[\"*\"]', NULL, NULL, '2023-05-06 18:02:26', '2023-05-06 18:02:26'),
(21, 'App\\Models\\User', 21, 'yafaia9@gmail.com', 'dad42727804af9f5b4f3b960f56c931e18475e7f949404c34b046f65a9c14e9e', '[\"*\"]', NULL, NULL, '2023-05-06 18:06:38', '2023-05-06 18:06:38'),
(22, 'App\\Models\\User', 52, 'fahey25656@soombo.com', '1af03650996b4b4289755443000766b7922afc6632fb01aea4c8f8116c0ca8b7', '[\"*\"]', NULL, NULL, '2023-05-06 18:10:51', '2023-05-06 18:10:51'),
(23, 'App\\Models\\User', 52, 'fahey25656@soombo.com', 'd470658dac98d17c741095dda6035eebf920fa0edf0fb1cf52d06e1edc43d7e1', '[\"*\"]', NULL, NULL, '2023-05-06 19:07:30', '2023-05-06 19:07:30'),
(24, 'App\\Models\\User', 53, 'dahelo9293@soombo.com', '8659fd89f27e38d7a00045e1147a1a88ead171c903a5a51e11a40f019731abc1', '[\"*\"]', NULL, NULL, '2023-05-06 20:44:27', '2023-05-06 20:44:27'),
(25, 'App\\Models\\User', 53, 'dahelo9293@soombo.com', 'bbc4f57fe2fe1db3b838df143c9e9f370005c5201dd78d8d5ff307097217676c', '[\"*\"]', NULL, NULL, '2023-05-06 21:04:16', '2023-05-06 21:04:16'),
(26, 'App\\Models\\User', 53, 'dahelo9293@soombo.com', '2cdf1ada203e5b590b311632cad0db8bd59afced3424342ac94c579d02546eed', '[\"*\"]', NULL, NULL, '2023-05-06 22:31:44', '2023-05-06 22:31:44'),
(27, 'App\\Models\\User', 53, 'dahelo9293@soombo.com', '2eb1b4ac83df16f82ca1e6b34b6721eec2e92fefd2feaf3d4d786d8b55269565', '[\"*\"]', NULL, NULL, '2023-05-06 22:44:52', '2023-05-06 22:44:52'),
(28, 'App\\Models\\User', 53, 'dahelo9293@soombo.com', '4432f84b048186c65bdcdee7e43708a4a1aec3eebd2cb516a8af5d43a6cabacd', '[\"*\"]', NULL, NULL, '2023-05-06 23:17:29', '2023-05-06 23:17:29'),
(29, 'App\\Models\\User', 54, 'yasehi3870@pixiil.com', 'abfc804b1b242bf73b1f25e6488c84d012026d6a394701c1d55b747626efe83a', '[\"*\"]', NULL, NULL, '2023-05-06 23:23:32', '2023-05-06 23:23:32'),
(30, 'App\\Models\\User', 54, 'yasehi3870@pixiil.com', '5c39a1043fd309be55004869c0520e5f4b045830e3674b70604613a697dca7b7', '[\"*\"]', NULL, NULL, '2023-05-06 23:24:34', '2023-05-06 23:24:34'),
(31, 'App\\Models\\User', 54, 'yasehi3870@pixiil.com', 'dac6f64e6e64b74d8330e0eb245cb5899082bcd8857738f7405887640241d6c5', '[\"*\"]', NULL, NULL, '2023-05-06 23:28:11', '2023-05-06 23:28:11'),
(32, 'App\\Models\\User', 54, 'yasehi3870@pixiil.com', 'c815370fe0a793cf9bd407fe9e61a6a2e084c9318590d83a92567b5f10da8e45', '[\"*\"]', NULL, NULL, '2023-05-06 23:42:15', '2023-05-06 23:42:15'),
(33, 'App\\Models\\User', 53, 'dahelo9293@soombo.com', 'b0ab0225486dcef21c94e5d54e39083b6bf2c9878174b61e82bfc98a9e8efb7f', '[\"*\"]', NULL, NULL, '2023-05-06 23:50:13', '2023-05-06 23:50:13'),
(34, 'App\\Models\\User', 53, 'dahelo9293@soombo.com', 'b7da686f6b6b172c179120c0a16dd3bc91eb084f64b4d472f787b6bda703893d', '[\"*\"]', NULL, NULL, '2023-05-08 17:53:07', '2023-05-08 17:53:07'),
(35, 'App\\Models\\User', 53, 'dahelo9293@soombo.com', '28219586336e9860019e26b25d31638c44e93b4ddfb55355a40acfe806e7261e', '[\"*\"]', NULL, NULL, '2023-05-08 18:07:59', '2023-05-08 18:07:59'),
(36, 'App\\Models\\User', 53, 'dahelo9293@soombo.com', '5edf84ad4f59f5c8397d480b445ee0caac6f91cea345e866a2385dc4585ce5a4', '[\"*\"]', NULL, NULL, '2023-05-11 00:10:18', '2023-05-11 00:10:18'),
(37, 'App\\Models\\User', 53, 'dahelo9293@soombo.com', '39fc98c94347dc43867bb51d6b2abd9f0098efa709fd340ff0d087d7c98c8bbf', '[\"*\"]', NULL, NULL, '2023-05-11 00:20:52', '2023-05-11 00:20:52'),
(38, 'App\\Models\\User', 53, 'dahelo9293@soombo.com', 'd0edf51d7e7e1bb4a18e7260e63e4d26a32ff6df7da998c1e3ad662bee7bfae9', '[\"*\"]', NULL, NULL, '2023-05-11 00:41:21', '2023-05-11 00:41:21'),
(39, 'App\\Models\\User', 53, 'dahelo9293@soombo.com', '1dd121a93d6201fb2b9b9f1b0462f938bee8f0a839a534f81995e766cec978d8', '[\"*\"]', NULL, NULL, '2023-05-11 00:44:35', '2023-05-11 00:44:35'),
(40, 'App\\Models\\User', 53, 'dahelo9293@soombo.com', '11226ba3b485e9f6b1305e57348481915444479bfc214564c7389d80cc60af85', '[\"*\"]', NULL, NULL, '2023-05-11 00:46:44', '2023-05-11 00:46:44'),
(41, 'App\\Models\\User', 21, 'yafaia9@gmail.com', 'ffc13df8cb3fd44eb1248362b9d8e2f4cb176c084078b49738ed98ef5a22b9ef', '[\"*\"]', NULL, NULL, '2023-05-13 16:12:52', '2023-05-13 16:12:52'),
(42, 'App\\Models\\User', 55, 'kaleg36833@appxapi.com', '7dcf410ccab9b2dd473e173b69af52f97c0eade5f6633ce35e2c04103c6e6919', '[\"*\"]', NULL, NULL, '2023-05-20 01:49:59', '2023-05-20 01:49:59'),
(43, 'App\\Models\\User', 55, 'kaleg36833@appxapi.com', 'd0c2e4242d36070b3a473218b899212d4091aa00949c7d3898192e62fdaf520f', '[\"*\"]', NULL, NULL, '2023-05-20 01:58:57', '2023-05-20 01:58:57'),
(44, 'App\\Models\\User', 55, 'kaleg36833@appxapi.com', 'c84a8fb2b524c380fbb2a64d184fc1f32fe0fee40d3a13822b47425c260b4e5e', '[\"*\"]', NULL, NULL, '2023-05-20 02:03:10', '2023-05-20 02:03:10'),
(45, 'App\\Models\\User', 55, 'kaleg36833@appxapi.com', '440ad325675e81050e836715d36bf57c60acd680f7556539661bdac042de2adc', '[\"*\"]', NULL, NULL, '2023-05-20 02:03:24', '2023-05-20 02:03:24'),
(46, 'App\\Models\\User', 57, 'farixot501@aicogz.com', '2fb295da641beaa719fc3d5fb7d40d2f9f55df9aeb6d321343a94a1c67869749', '[\"*\"]', NULL, NULL, '2023-05-20 21:52:30', '2023-05-20 21:52:30'),
(47, 'App\\Models\\User', 57, 'farixot501@aicogz.com', '1b19d9e9d5d1b4373583949d0d6651e937ad2f1ccced54d7edd4699698cedc48', '[\"*\"]', NULL, NULL, '2023-05-20 21:54:14', '2023-05-20 21:54:14'),
(48, 'App\\Models\\User', 58, 'pafok88141@aicogz.com', 'd48dec623756d6bd3c106aacdc7ddd3a4a1096d23179da41e8ae1515406f0a2e', '[\"*\"]', NULL, NULL, '2023-05-20 21:59:05', '2023-05-20 21:59:05'),
(49, 'App\\Models\\User', 58, 'pafok88141@aicogz.com', 'ba583846f540813398413a1679a574dfe1ca9377ba1f6868d3b30a4c4ef42910', '[\"*\"]', NULL, NULL, '2023-05-20 22:51:51', '2023-05-20 22:51:51'),
(50, 'App\\Models\\User', 41, 'ahmexbilal@gmail.com', 'c97aea3a267d0f51b87949a6bdcfb12ea4ce72acfec94b706d59bb9e63fffc4f', '[\"*\"]', NULL, NULL, '2023-05-20 22:58:27', '2023-05-20 22:58:27'),
(51, 'App\\Models\\User', 41, 'ahmexbilal@gmail.com', '951e9af1da7aef52b19032a459c58adf2aea02fa34833da3203321e06c9e86a6', '[\"*\"]', NULL, NULL, '2023-05-20 23:00:12', '2023-05-20 23:00:12'),
(52, 'App\\Models\\User', 59, 'herom63356@carpetra.com', '8227b2225819825be74509258713552febeba8d4d7db64c8abd82e80bebe8729', '[\"*\"]', NULL, NULL, '2023-05-21 13:15:57', '2023-05-21 13:15:57'),
(53, 'App\\Models\\User', 59, 'herom63356@carpetra.com', 'a0a18aa20dc920f85e6b7d12f93c6ee665996357f7296fd65a8280fa8ef5a651', '[\"*\"]', NULL, NULL, '2023-05-21 13:37:50', '2023-05-21 13:37:50'),
(54, 'App\\Models\\User', 59, 'herom63356@carpetra.com', 'dd334c7fe4b212c7c5778dd43d0a8968a954142ec7add1ab70bea924cfb7e244', '[\"*\"]', NULL, NULL, '2023-05-21 13:38:06', '2023-05-21 13:38:06'),
(55, 'App\\Models\\User', 21, 'yafaia9@gmail.com', '645206c79c99411d938f57f7e057bb172f151f3c343e7da3c694e5716b4cbeb4', '[\"*\"]', NULL, NULL, '2023-05-21 14:07:38', '2023-05-21 14:07:38'),
(56, 'App\\Models\\User', 59, 'herom63356@carpetra.com', '1463bae6425467fcf3ae62c02ec21cbaa63d90a1cc5bed8221439689548184bf', '[\"*\"]', NULL, NULL, '2023-05-21 16:42:24', '2023-05-21 16:42:24'),
(57, 'App\\Models\\User', 59, 'herom63356@carpetra.com', '3843b0a215f7e48bd9ea626006a38259f2cb87f06598a8979876f5505819433d', '[\"*\"]', NULL, NULL, '2023-05-21 17:23:35', '2023-05-21 17:23:35'),
(58, 'App\\Models\\User', 59, 'herom63356@carpetra.com', 'dbd12652e3f9d1d3dd732df678e39b0a7d38abcd7006ea70e6716038f5e7938a', '[\"*\"]', NULL, NULL, '2023-05-21 17:57:43', '2023-05-21 17:57:43'),
(59, 'App\\Models\\User', 21, 'yafaia9@gmail.com', 'e108f9c3f84810913cafe879894b3b792d2557bd9971203cb814e176112b9a49', '[\"*\"]', NULL, NULL, '2023-05-21 23:47:21', '2023-05-21 23:47:21'),
(60, 'App\\Models\\User', 21, 'yafaia9@gmail.com', 'ceda6e97a4a99946e0ad92f1675b5bf733bd8a822f6b32ad0a7c43b43ed3f292', '[\"*\"]', NULL, NULL, '2023-05-22 01:05:24', '2023-05-22 01:05:24'),
(61, 'App\\Models\\User', 21, 'yafaia9@gmail.com', '73563d0e68bacf0db3c16061db22e320b012fcaafdab117f54ea1764f4136414', '[\"*\"]', NULL, NULL, '2023-05-22 01:17:52', '2023-05-22 01:17:52'),
(62, 'App\\Models\\User', 21, 'yafaia9@gmail.com', 'da9ca3d9d67fb45998aabdcf168cfea4163c07be29d5aa6f9cc3a9653648342d', '[\"*\"]', NULL, NULL, '2023-05-22 01:18:18', '2023-05-22 01:18:18'),
(63, 'App\\Models\\User', 21, 'yafaia9@gmail.com', 'b8584ee6a127c20a589c89481c4873969c3f5e02b30b7d2218bfed8fbbaf4a38', '[\"*\"]', NULL, NULL, '2023-05-22 01:38:07', '2023-05-22 01:38:07'),
(64, 'App\\Models\\User', 21, 'yafaia9@gmail.com', '662c1e118a004149889bdc411cbae99a54d23bcf1c173daf00fb1e2e5ffeb89e', '[\"*\"]', NULL, NULL, '2023-05-22 01:48:33', '2023-05-22 01:48:33'),
(65, 'App\\Models\\User', 21, 'yafaia9@gmail.com', '00c60d3aaa66628090bb36b2496ad3b5bcde59efdb323df35258284de8481b32', '[\"*\"]', NULL, NULL, '2023-05-22 02:04:58', '2023-05-22 02:04:58'),
(66, 'App\\Models\\User', 21, 'yafaia9@gmail.com', '2e3952797d850d0bd7f59af8af3ca106d5412cdbe15114d25b5f0f1248d3200a', '[\"*\"]', NULL, NULL, '2023-05-22 02:15:14', '2023-05-22 02:15:14'),
(67, 'App\\Models\\User', 21, 'yafaia9@gmail.com', '506c2fb87d927f5b0a5c624de9b76c0b45fd92f7981c33142e4a2174df4f095a', '[\"*\"]', NULL, NULL, '2023-05-22 02:28:39', '2023-05-22 02:28:39'),
(68, 'App\\Models\\User', 21, 'yafaia9@gmail.com', '3fec054fa03bf7f04309f5e1ae89362c60ef75844ca045df79908b4c1fc09505', '[\"*\"]', NULL, NULL, '2023-05-22 02:50:45', '2023-05-22 02:50:45'),
(69, 'App\\Models\\User', 21, 'yafaia9@gmail.com', '094ba8c2d952257580210211dbf504130fcf2257a3e852331de355139f19ab03', '[\"*\"]', NULL, NULL, '2023-05-22 03:00:48', '2023-05-22 03:00:48'),
(70, 'App\\Models\\User', 43, 'alisaanjhe444@gmail.com', 'cbe2190dba6c4033e79b303a109d9d6d8bdfb7a13f4b1252cf42471720b65da4', '[\"*\"]', NULL, NULL, '2023-05-22 15:41:48', '2023-05-22 15:41:48'),
(71, 'App\\Models\\User', 43, 'alisaanjhe444@gmail.com', '5afbafc75e88452dac27ca6760fe7522ac4ec26d8ca7c2f872c087a36ade292e', '[\"*\"]', NULL, NULL, '2023-05-22 16:02:17', '2023-05-22 16:02:17'),
(72, 'App\\Models\\User', 43, 'alisaanjhe444@gmail.com', '42104b2755b59c777c94027c9518bdc9742214f83bedb73c4413cb82c1c6b966', '[\"*\"]', NULL, NULL, '2023-05-22 16:03:47', '2023-05-22 16:03:47'),
(73, 'App\\Models\\User', 43, 'alisaanjhe444@gmail.com', '0e7bdd8a3abd75e26dbce36882960909604aebda5466a9b775fffd6982d9d319', '[\"*\"]', NULL, NULL, '2023-05-22 16:17:15', '2023-05-22 16:17:15'),
(74, 'App\\Models\\User', 21, 'yafaia9@gmail.com', 'dac8ceaa00bbc577b07b5237353d4ec80a30e01a2fb8522e43b54f386feffa36', '[\"*\"]', NULL, NULL, '2023-05-23 00:22:45', '2023-05-23 00:22:45'),
(75, 'App\\Models\\User', 21, 'yafaia9@gmail.com', '6769559a9853c0f17284e1a6a9b5eeeb19e78cf4b5544eff87b49780abb41f59', '[\"*\"]', NULL, NULL, '2023-05-23 00:53:49', '2023-05-23 00:53:49'),
(76, 'App\\Models\\User', 21, 'yafaia9@gmail.com', '41bb7b1d9e0bd71dbc447e4f09431621a42e9b3360700ff0ed855242ff7b0a1d', '[\"*\"]', NULL, NULL, '2023-05-23 02:47:17', '2023-05-23 02:47:17'),
(77, 'App\\Models\\User', 67, 'abdullahyafai077@gmail.com', '4dadbfd0e097520db4fc55c5df478a7161ac1139f90bfb94b1c1af88df6b1c3c', '[\"*\"]', NULL, NULL, '2023-05-23 03:05:52', '2023-05-23 03:05:52'),
(78, 'App\\Models\\User', 67, 'abdullahyafai077@gmail.com', 'f8e2c9710ab2240fb5ce1aac4911dcf68d11fbf5ba834b9e58d5c7fee1ba74e8', '[\"*\"]', NULL, NULL, '2023-05-23 03:07:20', '2023-05-23 03:07:20'),
(79, 'App\\Models\\User', 67, 'abdullahyafai077@gmail.com', 'a4f54dcead922eb407938d90136c5319066e32343554fc7fd50a9184ff47b620', '[\"*\"]', NULL, NULL, '2023-05-23 23:40:51', '2023-05-23 23:40:51'),
(80, 'App\\Models\\User', 67, 'abdullahyafai077@gmail.com', '0bf3f68041359129c578824894efe0e0e413863afad4e1981e8b54b96349749d', '[\"*\"]', NULL, NULL, '2023-05-24 00:39:01', '2023-05-24 00:39:01'),
(81, 'App\\Models\\User', 69, 'ozairfaisalgp@gmail.com', '186dde75d7643b943c71a34c5ddd6756a8c39d6ae697806776e34c0b4d761416', '[\"*\"]', NULL, NULL, '2023-06-09 19:34:40', '2023-06-09 19:34:40'),
(82, 'App\\Models\\User', 69, 'ozairfaisalgp@gmail.com', '23361d5fb3b3d95b117d106525c32c1644e0dd7bb2a14059268002b049b8cff9', '[\"*\"]', NULL, NULL, '2023-06-09 19:51:29', '2023-06-09 19:51:29'),
(83, 'App\\Models\\User', 69, 'ozairfaisalgp@gmail.com', 'e43b9a0bd314cb2664e72b2ec14be6df3d2df7ca8d68f5f01317e1d496bb2adb', '[\"*\"]', NULL, NULL, '2023-06-09 20:01:55', '2023-06-09 20:01:55'),
(84, 'App\\Models\\User', 69, 'ozairfaisalgp@gmail.com', '473e909c675915a7909fb49e6b7f432e00c4e1aabe24d93aa8085309c5cfa87b', '[\"*\"]', NULL, NULL, '2023-06-09 20:03:34', '2023-06-09 20:03:34'),
(85, 'App\\Models\\User', 70, 'osmanfaisalp@hotmail.com', '1d3461ee2555f2c76eda698bc68b77fcecacd8d3b760b0b1a8eb6da8cdf3f8bf', '[\"*\"]', NULL, NULL, '2023-06-09 20:19:33', '2023-06-09 20:19:33'),
(86, 'App\\Models\\User', 70, 'osmanfaisalp@hotmail.com', '59bf1239762774c779bd8ac6fe04e24a72c15f6657406e2e9843933aa2821735', '[\"*\"]', NULL, NULL, '2023-06-09 20:20:04', '2023-06-09 20:20:04'),
(87, 'App\\Models\\User', 70, 'osmanfaisalp@hotmail.com', '4c683cc933646a6a72fc15f29ec04e3c88d7e56eb131e4225ce7ecfe2fda3aa4', '[\"*\"]', NULL, NULL, '2023-06-09 20:52:14', '2023-06-09 20:52:14'),
(88, 'App\\Models\\User', 71, 'alisaanjhe444@gmail.com', '110cfd906f0e3410e9a1190e8377e7a6871c0048d72d857d9e841388c0a46618', '[\"*\"]', NULL, NULL, '2023-06-12 15:14:10', '2023-06-12 15:14:10'),
(89, 'App\\Models\\User', 71, 'alisaanjhe444@gmail.com', '6beceacf7e6ba9e27391e6402e43581fa8440d42c4b1e999a5e0ac1a99690c97', '[\"*\"]', NULL, NULL, '2023-06-12 15:41:21', '2023-06-12 15:41:21'),
(90, 'App\\Models\\User', 71, 'alisaanjhe444@gmail.com', 'd57189a974cc51d1a1b80767c9a443880ecc11990a6a578ded1b5279457f58a4', '[\"*\"]', NULL, NULL, '2023-06-12 16:04:30', '2023-06-12 16:04:30'),
(91, 'App\\Models\\User', 71, 'alisaanjhe444@gmail.com', '71d5f3987e1135cfad9edb2bf059f2501ed9f02207df1c2bb3e1f8878e733060', '[\"*\"]', NULL, NULL, '2023-06-13 11:21:32', '2023-06-13 11:21:32'),
(92, 'App\\Models\\User', 71, 'alisaanjhe444@gmail.com', '816723e913d76041dd9bc5df669c1757ee5d91626eb99c696bb958a56d495928', '[\"*\"]', NULL, NULL, '2023-06-13 11:33:49', '2023-06-13 11:33:49'),
(93, 'App\\Models\\User', 71, 'alisaanjhe444@gmail.com', 'c1a78308c4abe1109f8e3c48430854503619e1f9795a45fe4a7f4078e7f699f4', '[\"*\"]', NULL, NULL, '2023-06-16 02:31:10', '2023-06-16 02:31:10'),
(94, 'App\\Models\\User', 72, 'abc@gmail.com', '8bf3ac5b9d4c00d90c82216f8a3caa191ce1ec61f244c2938a259a5f1883880f', '[\"*\"]', NULL, NULL, '2023-06-17 00:12:36', '2023-06-17 00:12:36'),
(95, 'App\\Models\\User', 71, 'alisaanjhe444@gmail.com', '157d4a39c3dcbfd2d7a3cc319e8ada4268eda26ee3a58f90b1e2489646f5f2a0', '[\"*\"]', NULL, NULL, '2023-06-17 02:40:27', '2023-06-17 02:40:27'),
(96, 'App\\Models\\User', 73, 'abdullahyafai077@gmail.com', 'a0f7df1a22611353585cf001e50aa2b8fa81237e6ff03079fdb0cba10a4ef35d', '[\"*\"]', NULL, NULL, '2023-06-18 15:15:52', '2023-06-18 15:15:52'),
(97, 'App\\Models\\User', 73, 'abdullahyafai077@gmail.com', '1bfca6db114aa8092326097589b864b1fdae281d8216a5475f2548d269f05b9a', '[\"*\"]', NULL, NULL, '2023-06-18 17:36:07', '2023-06-18 17:36:07'),
(98, 'App\\Models\\User', 73, 'abdullahyafai077@gmail.com', '27da47fdb62073d7bcf27ec8ecccb53007f304fade91753ecca58b22b2ddbb65', '[\"*\"]', NULL, NULL, '2023-06-18 17:47:19', '2023-06-18 17:47:19'),
(99, 'App\\Models\\User', 72, 'abc@gmail.com', '799746815203ffada6c4a7b5ed7d720711a5f0dbc63a2af5c2049663344802b3', '[\"*\"]', NULL, NULL, '2023-06-18 18:13:23', '2023-06-18 18:13:23'),
(100, 'App\\Models\\User', 72, 'abc@gmail.com', '3f755a5fee13be32eac4cbdaffe19a1df08a55f7772c8ac7c3d616ddad1aa891', '[\"*\"]', NULL, NULL, '2023-06-18 20:10:26', '2023-06-18 20:10:26'),
(101, 'App\\Models\\User', 73, 'abdullahyafai077@gmail.com', 'a8ded7f321d6e3aaf45dfa59f4a0d992160cf45ad77e23948a51258aa2c7d6f1', '[\"*\"]', NULL, NULL, '2023-06-18 20:39:37', '2023-06-18 20:39:37'),
(102, 'App\\Models\\User', 73, 'abdullahyafai077@gmail.com', '205a87f2ed981ae5fcdd8aebe54db41edd984a1c0a6992ed67d925932209d38c', '[\"*\"]', NULL, NULL, '2023-06-18 20:52:54', '2023-06-18 20:52:54'),
(103, 'App\\Models\\User', 73, 'abdullahyafai077@gmail.com', '80e4745c38702df75930630a8c79f5f7490f7baed3ec6f5007c8be496ff83036', '[\"*\"]', NULL, NULL, '2023-06-18 21:18:16', '2023-06-18 21:18:16'),
(104, 'App\\Models\\User', 73, 'abdullahyafai077@gmail.com', 'd2f8c8c32a4580691326849c601c792d6d7ba3813b150ea4c810a53110536e77', '[\"*\"]', NULL, NULL, '2023-06-18 21:29:25', '2023-06-18 21:29:25'),
(105, 'App\\Models\\User', 71, 'alisaanjhe444@gmail.com', 'a81eb29d2ce7c05ccf8a7c801188be673f0102c85805a55db2662f209891f0b8', '[\"*\"]', NULL, NULL, '2023-06-19 15:13:48', '2023-06-19 15:13:48'),
(106, 'App\\Models\\User', 73, 'abdullahyafai077@gmail.com', '311b6560a2860e9841e685925f390becc6cfd21469405b487b82ae304f11bfe6', '[\"*\"]', NULL, NULL, '2023-06-19 18:29:11', '2023-06-19 18:29:11'),
(107, 'App\\Models\\User', 72, 'abc@gmail.com', 'a8b24dc5f0b013479fe726b11507bf2b21b959fa83d2811d00c7edb364003e0f', '[\"*\"]', NULL, NULL, '2023-06-19 20:32:21', '2023-06-19 20:32:21'),
(108, 'App\\Models\\User', 71, 'alisaanjhe444@gmail.com', '969d39b7180980a78dd05b20870c2708f9daf335bd810e47795b93d399f1938d', '[\"*\"]', NULL, NULL, '2023-06-20 00:01:00', '2023-06-20 00:01:00'),
(109, 'App\\Models\\User', 71, 'alisaanjhe444@gmail.com', '0f9afc92d182aa0aeffa17d5a6d4e60138d7264e8371993b66d0ef6b2dce0c82', '[\"*\"]', NULL, NULL, '2023-06-20 00:01:28', '2023-06-20 00:01:28'),
(110, 'App\\Models\\User', 71, 'alisaanjhe444@gmail.com', 'e03cebdb314d442e9f402492ab1eaa109b9028ec54c75048b9a4c1ef6806e304', '[\"*\"]', NULL, NULL, '2023-06-20 11:24:35', '2023-06-20 11:24:35'),
(111, 'App\\Models\\User', 71, 'alisaanjhe444@gmail.com', 'a96cdef2b6235597bb8e9864ffd8dd9795b1edc8c2eaba00f678def8da9c5eec', '[\"*\"]', NULL, NULL, '2023-06-20 12:06:40', '2023-06-20 12:06:40'),
(112, 'App\\Models\\User', 74, 'osmanpoonawala@hotmail.com', 'fb05e5547fdbaa52570efa2ab54a3fa2667366bdb47ffec1a6f461d7f871fe0c', '[\"*\"]', NULL, NULL, '2023-07-07 23:26:26', '2023-07-07 23:26:26'),
(113, 'App\\Models\\User', 70, 'osmanfaisalp@hotmail.com', '2d20200a8ae887f42fda41e408b1a3d166b55bd8ebc2e311a056e17ef8dc19cb', '[\"*\"]', NULL, NULL, '2023-07-07 23:29:20', '2023-07-07 23:29:20'),
(114, 'App\\Models\\User', 75, 'osmanfaisalgp@gmail.com', 'b2e1eccf72438e9fdbef23717b90542c827642fb63fa7e1b0a491f720dcccdea', '[\"*\"]', NULL, NULL, '2023-07-07 23:31:41', '2023-07-07 23:31:41'),
(115, 'App\\Models\\User', 75, 'osmanfaisalgp@gmail.com', 'a30d3b0f6d689ebd9237d7fc02e38ff9190293d288a1548e6cacaa43ccc8047a', '[\"*\"]', NULL, NULL, '2023-07-07 23:46:04', '2023-07-07 23:46:04'),
(116, 'App\\Models\\User', 76, 'jolopi5250@niback.com', '1174df060abd8d768ad5c8e97f49711eaf2b19618e4774c41ae96af9c2aadd21', '[\"*\"]', NULL, NULL, '2023-07-10 23:22:27', '2023-07-10 23:22:27'),
(117, 'App\\Models\\User', 78, 'rrno2s@ezztt.com', '80d2ee0f26ffab59de057af28de2147078b22e4641320f1d588cb16fab464355', '[\"*\"]', NULL, NULL, '2023-07-10 23:34:31', '2023-07-10 23:34:31'),
(118, 'App\\Models\\User', 78, 'rrno2s@ezztt.com', '1a22994c381cf8c28abe00f9a696e6fe4f0b18f83cdf8d2dcb256dd752973dca', '[\"*\"]', NULL, NULL, '2023-07-10 23:53:15', '2023-07-10 23:53:15'),
(119, 'App\\Models\\User', 80, 'anusiqbal33@gmail.com', '238923dae255392e3de3d12775e3a8fcc1ee4374221eac3b129b2b805fd0cb13', '[\"*\"]', NULL, NULL, '2023-07-20 02:02:03', '2023-07-20 02:02:03'),
(120, 'App\\Models\\User', 80, 'anusiqbal33@gmail.com', '4b34bbe5d89c5553ba4e0de2f0f013ac25d5104c1faea21850c75220f15d66be', '[\"*\"]', NULL, NULL, '2023-07-20 02:12:51', '2023-07-20 02:12:51'),
(121, 'App\\Models\\User', 80, 'anusiqbal33@gmail.com', 'df6d12c25410aa0d9a9801286d39345c7a58d1bb92bdd2ca42fbd572ebf7f83a', '[\"*\"]', NULL, NULL, '2023-07-21 09:23:19', '2023-07-21 09:23:19'),
(122, 'App\\Models\\User', 80, 'anusiqbal33@gmail.com', '67444eb57821bc8c27d235c16b6feb55d1194906299a40e6a32bb6295ef7b1e1', '[\"*\"]', NULL, NULL, '2023-07-21 09:49:08', '2023-07-21 09:49:08'),
(123, 'App\\Models\\User', 80, 'anusiqbal33@gmail.com', '1d07db9380a3abc7680f0519b676dd7a28c104868c151feff0c5190daaaaf2ef', '[\"*\"]', NULL, NULL, '2023-07-21 10:31:41', '2023-07-21 10:31:41'),
(124, 'App\\Models\\User', 80, 'anusiqbal33@gmail.com', 'ba2cb6cde17a68a8615afb1521d730f36f30b76d7e5a003d282dfe76081e8a61', '[\"*\"]', NULL, NULL, '2023-07-21 11:09:20', '2023-07-21 11:09:20'),
(125, 'App\\Models\\User', 81, 'courierin1@gmail.com', '373be0e37b84a064a4128390fda2cdd5e908180ae6fd7915dfe36d13a66d9b1c', '[\"*\"]', NULL, NULL, '2023-07-21 11:39:35', '2023-07-21 11:39:35'),
(126, 'App\\Models\\User', 80, 'anusiqbal33@gmail.com', '51de6f5ffc63af510100adb005c040022736d12173d3b97f99c4793a25f6e9c1', '[\"*\"]', NULL, NULL, '2023-07-22 12:41:46', '2023-07-22 12:41:46'),
(127, 'App\\Models\\User', 82, 'courierin1@gmail.com', '239f35be5fcd0418861fed609a4fd1a8c42231270bb58d85504304a572f3dd8b', '[\"*\"]', NULL, NULL, '2023-07-22 12:44:24', '2023-07-22 12:44:24'),
(128, 'App\\Models\\User', 84, 'courierin1@gmail.com', 'bcfb0791837181f88d494fd25a27acad27d1b6d1b3feecca6e69106782d65f8c', '[\"*\"]', NULL, NULL, '2023-07-22 14:38:04', '2023-07-22 14:38:04'),
(129, 'App\\Models\\User', 80, 'anusiqbal33@gmail.com', 'b857239af4d51c7e038c13af01b22e84aea469b5ab3dc72625caf8013aa9b2d0', '[\"*\"]', NULL, NULL, '2023-07-22 14:56:55', '2023-07-22 14:56:55'),
(130, 'App\\Models\\User', 80, 'anusiqbal33@gmail.com', 'f0d53a2f2cd651f68d02625ddf685f7f45acc58ef17fa5eb1746f19f02336555', '[\"*\"]', NULL, NULL, '2023-07-22 15:33:23', '2023-07-22 15:33:23'),
(131, 'App\\Models\\User', 80, 'anusiqbal33@gmail.com', '3337026cddded769f7edb0d7087d5c3e485eb977311c061ae07d97f5ad61bab5', '[\"*\"]', NULL, NULL, '2023-07-22 15:55:02', '2023-07-22 15:55:02'),
(132, 'App\\Models\\User', 80, 'anusiqbal33@gmail.com', 'c022a493508ce2e32aa232f059d3652254071eb04fa7e5618dfe8534044adbf7', '[\"*\"]', NULL, NULL, '2023-07-22 16:30:14', '2023-07-22 16:30:14'),
(133, 'App\\Models\\User', 80, 'anusiqbal33@gmail.com', '366ece1bee5f413aa0a8bb42bb38c7cfc491c1173c1a7dc60ea572f19836a0cc', '[\"*\"]', NULL, NULL, '2023-07-22 17:02:50', '2023-07-22 17:02:50'),
(134, 'App\\Models\\User', 80, 'anusiqbal33@gmail.com', '72968f7eadf8a1e1ee96eba379c8111f2195465aee3b01229b850054e2c0f393', '[\"*\"]', NULL, NULL, '2023-07-23 03:31:39', '2023-07-23 03:31:39'),
(135, 'App\\Models\\User', 84, 'courierin1@gmail.com', '8ce9c837710a00a933149fd4bf016d6b533e3261aa4be8622c8922d3005c8127', '[\"*\"]', NULL, NULL, '2023-07-26 01:49:55', '2023-07-26 01:49:55'),
(136, 'App\\Models\\User', 80, 'anusiqbal33@gmail.com', '14c38aeba6ad18e6414f2858acf5bfd24de2578a0d053f4a0d9723bc173be64a', '[\"*\"]', NULL, NULL, '2023-07-26 02:06:04', '2023-07-26 02:06:04'),
(137, 'App\\Models\\User', 80, 'anusiqbal33@gmail.com', 'c01bbb0c086c99041e1bf470adf71189fcfe74145172cb6e9df5aa17e2606679', '[\"*\"]', NULL, NULL, '2023-08-02 06:59:25', '2023-08-02 06:59:25'),
(138, 'App\\Models\\User', 80, 'anusiqbal33@gmail.com', '2101f27fb7d211cfaaa60140910d136cf4f9a108191d20c7b0c720d51dcfa1f8', '[\"*\"]', NULL, NULL, '2023-08-02 08:01:27', '2023-08-02 08:01:27'),
(139, 'App\\Models\\User', 80, 'anusiqbal33@gmail.com', 'dc91b6670dcb3dba018e9603359ca0b8ba94f040784de6c95abfe83542bd8ee9', '[\"*\"]', NULL, NULL, '2023-08-06 04:23:58', '2023-08-06 04:23:58'),
(140, 'App\\Models\\User', 80, 'anusiqbal33@gmail.com', 'b0f1bca203cf21f43f88ade9652f7eae1825353bb833070d922f147dad2c5e34', '[\"*\"]', NULL, NULL, '2023-08-07 02:12:37', '2023-08-07 02:12:37'),
(141, 'App\\Models\\User', 80, 'anusiqbal33@gmail.com', 'f9c989bd9340b2014e9fccdd5b12d13a15341536c8903f1411239b9710d5c475', '[\"*\"]', NULL, NULL, '2023-08-13 02:02:32', '2023-08-13 02:02:32'),
(142, 'App\\Models\\User', 80, 'anusiqbal33@gmail.com', '76289e2e62aca598e2da85508cc430a82f578e597bb2e09dee037652a45fdf0a', '[\"*\"]', NULL, NULL, '2023-08-13 02:05:33', '2023-08-13 02:05:33'),
(143, 'App\\Models\\User', 80, 'anusiqbal33@gmail.com', '61cfffff4daa26ec2fa8b22e6428055f3c950a690647d49c7ffae6db0f635391', '[\"*\"]', NULL, NULL, '2023-08-13 02:22:13', '2023-08-13 02:22:13'),
(144, 'App\\Models\\User', 80, 'anusiqbal33@gmail.com', '072d01e5b046ef44d0628d10d86e2b994dc8fee405187ddb43b5f095a25f6c40', '[\"*\"]', NULL, NULL, '2023-08-13 02:53:36', '2023-08-13 02:53:36'),
(145, 'App\\Models\\User', 85, 'pibef59288@weishu8.com', '77080975409c080c6b8aa2ac5a32a05d6fc6ba67d5344bfab701bc3a5f34c883', '[\"*\"]', NULL, NULL, '2023-08-14 02:56:35', '2023-08-14 02:56:35'),
(146, 'App\\Models\\User', 86, 'vefopi2425@vreaa.com', '58271c6093896e5e9d4cbcafc18f1bdc92b442232d230945bca7f7ca2e1742f0', '[\"*\"]', NULL, NULL, '2023-08-14 03:02:18', '2023-08-14 03:02:18'),
(147, 'App\\Models\\User', 86, 'vefopi2425@vreaa.com', '58c5523b2679e97fc6d5389d47a20b26267f4a4387c8ba251c7b0a2a171740ff', '[\"*\"]', NULL, NULL, '2023-08-14 03:04:09', '2023-08-14 03:04:09'),
(148, 'App\\Models\\User', 86, 'vefopi2425@vreaa.com', 'e18b2499f03568397f7263acd1341b6e5668c7b54522ec61b5293b5d6fb54263', '[\"*\"]', NULL, NULL, '2023-08-14 03:06:13', '2023-08-14 03:06:13'),
(149, 'App\\Models\\User', 87, 'courierin1@gmail.com', '0b45f9323951f8b1fbe12aa6314f229e54351c6277d04c663db4144cd87407f4', '[\"*\"]', NULL, NULL, '2023-08-14 14:28:00', '2023-08-14 14:28:00'),
(150, 'App\\Models\\User', 87, 'courierin1@gmail.com', '8104c0fa4e30c111a9c81ab0d3e29155d857e4a0debdb263e8e5eae7b4114ca7', '[\"*\"]', NULL, NULL, '2023-08-14 14:55:55', '2023-08-14 14:55:55'),
(151, 'App\\Models\\User', 71, 'alisaanjhe444@gmail.com', '76acd11789b9d9b0c71eb91e95e79b9751da884f4759c754f939c71badf9c4c4', '[\"*\"]', NULL, NULL, '2023-08-14 15:05:07', '2023-08-14 15:05:07'),
(152, 'App\\Models\\User', 88, 'courierin1@gmail.com', '1a73a10138fd0c4c738bf70d3615d4ef7adff951ca4ec63f58e68ff3bbbfef82', '[\"*\"]', NULL, NULL, '2023-08-14 15:39:31', '2023-08-14 15:39:31'),
(153, 'App\\Models\\User', 90, 'anusiqbal33@gmail.com', 'da20a9b0f64a525554006e32324bd261b496dc01298b054b14276c416365ffdf', '[\"*\"]', NULL, NULL, '2023-08-14 23:21:47', '2023-08-14 23:21:47'),
(154, 'App\\Models\\User', 71, 'alisaanjhe444@gmail.com', 'b4a3e8b9f5ff3661ab1156cdda82bc0ebac32193bae61f69df986618b4291275', '[\"*\"]', NULL, NULL, '2023-08-15 12:55:56', '2023-08-15 12:55:56'),
(155, 'App\\Models\\User', 85, 'pibef59288@weishu8.com', '09ae5630b713b62e0b7f418c3c3f8922d58dfd856014184c504bb406c2177540', '[\"*\"]', NULL, NULL, '2023-08-17 22:23:39', '2023-08-17 22:23:39'),
(156, 'App\\Models\\User', 85, 'pibef59288@weishu8.com', '178ab373bf0b5504631a2dfdad2685e6e87a4493f4845814ea398f664a9b1255', '[\"*\"]', NULL, NULL, '2023-08-17 22:33:58', '2023-08-17 22:33:58'),
(157, 'App\\Models\\User', 85, 'pibef59288@weishu8.com', '4726d0418edc022dcc4057cc5168f25b2c181a7648af970aba6a4e82755ae1b5', '[\"*\"]', NULL, NULL, '2023-08-20 20:45:34', '2023-08-20 20:45:34'),
(158, 'App\\Models\\User', 100, 'kajoweb556@cwtaa.com', '084278c84da884d6849e703cd7bbded573d892d9d4115b4fc4ad1209360945d9', '[\"*\"]', NULL, NULL, '2023-08-22 23:29:40', '2023-08-22 23:29:40'),
(159, 'App\\Models\\User', 102, 'onaibfaisalp@live.com', '875374873acfb4148fcb9e1700a8060441d760184d9bf74be617e4c0eaa1dc9d', '[\"*\"]', NULL, NULL, '2023-09-07 16:58:18', '2023-09-07 16:58:18'),
(160, 'App\\Models\\User', 102, 'onaibfaisalp@live.com', '7f38fc1310f1bf63a7a167dd047967e94699fb33dd589f7329c7afeb7906d5aa', '[\"*\"]', NULL, NULL, '2023-09-07 17:05:57', '2023-09-07 17:05:57'),
(161, 'App\\Models\\User', 102, 'onaibfaisalp@live.com', '46d2f43fe461e62656f53d37abb9339f5493d7af05322e76b8907a726a76e441', '[\"*\"]', NULL, NULL, '2023-09-07 18:12:08', '2023-09-07 18:12:08'),
(162, 'App\\Models\\User', 102, 'onaibfaisalp@live.com', 'f83b89b92798608853ee4b82132f7072e12e568737571d508c048c6b8f3ce241', '[\"*\"]', NULL, NULL, '2023-09-07 19:02:09', '2023-09-07 19:02:09'),
(163, 'App\\Models\\User', 102, 'onaibfaisalp@live.com', '78a85b651404a28a253875b8f3837b863aae2dd0935c6c1d97fd954d961ba25d', '[\"*\"]', NULL, NULL, '2023-09-07 19:12:19', '2023-09-07 19:12:19'),
(164, 'App\\Models\\User', 102, 'onaibfaisalp@live.com', '40bc2f9914f5680dee654626bea5e0311ef37c08aa71cb4b3cbd4e223ec0a68a', '[\"*\"]', NULL, NULL, '2023-09-07 19:44:32', '2023-09-07 19:44:32'),
(165, 'App\\Models\\User', 102, 'onaibfaisalp@live.com', '8c64c14d48ea2ddf877adf4d1c7ff37675b947544ed19fc2145ead881cfce12b', '[\"*\"]', NULL, NULL, '2023-09-10 23:05:02', '2023-09-10 23:05:02'),
(166, 'App\\Models\\User', 71, 'alisaanjhe444@gmail.com', '7b0e981e52178bd8eb93b287d9162bfff0f61e52c86d464a39c27740897233c8', '[\"*\"]', NULL, NULL, '2023-09-10 23:10:59', '2023-09-10 23:10:59'),
(167, 'App\\Models\\User', 103, 'difadif831@nickolis.com', '886b5c139705565c98f821ea5a94bf29c5124308fd6d7c707bf0875f6eda9e90', '[\"*\"]', NULL, NULL, '2023-09-10 23:53:40', '2023-09-10 23:53:40'),
(168, 'App\\Models\\User', 103, 'difadif831@nickolis.com', 'fbb26c8f55180b42be4eb117c1de9d3cadfb9b7b122df5efce66d8e8391af7ad', '[\"*\"]', NULL, NULL, '2023-09-10 23:55:12', '2023-09-10 23:55:12'),
(169, 'App\\Models\\User', 103, 'difadif831@nickolis.com', 'bada5db6609b9d0e8db14f0b4b9067fc3bf46f693af167724df22e7eea262c95', '[\"*\"]', NULL, NULL, '2023-09-10 23:56:58', '2023-09-10 23:56:58'),
(170, 'App\\Models\\User', 104, 'berari1251@docwl.com', '3b6198b30c9e1c775c84851400293050c9d4bbd3c9f5987460fe901e70078561', '[\"*\"]', NULL, NULL, '2023-09-11 00:02:50', '2023-09-11 00:02:50'),
(171, 'App\\Models\\User', 104, 'berari1251@docwl.com', '3463fe728e45f4cc514d04e637ef62b32ed685ad75550ef5e377f94c33f8bc9c', '[\"*\"]', NULL, NULL, '2023-09-11 00:13:06', '2023-09-11 00:13:06'),
(172, 'App\\Models\\User', 102, 'onaibfaisalp@live.com', 'b9d64194e31bfc5a0ccedd1b9b93e30da31f1af36893f03b03693755723b0617', '[\"*\"]', NULL, NULL, '2023-09-11 00:20:21', '2023-09-11 00:20:21'),
(173, 'App\\Models\\User', 104, 'berari1251@docwl.com', '2d0161ff6a891ba95abe39eceddc26ed78ef1baf04fefd18fb2dda6315db648f', '[\"*\"]', NULL, NULL, '2023-09-11 00:33:30', '2023-09-11 00:33:30'),
(174, 'App\\Models\\User', 90, 'anusiqbal33@gmail.com', 'dcfc10ebe6348f2f053595263c44ed625831dec5e9296734b82138a0401d5a67', '[\"*\"]', NULL, NULL, '2023-09-11 11:23:58', '2023-09-11 11:23:58'),
(175, 'App\\Models\\User', 90, 'anusiqbal33@gmail.com', '169c15febd7eb7488f0868bb57f327f0e594b5af2d55df35c956b5139c9729ea', '[\"*\"]', NULL, NULL, '2023-09-11 12:16:53', '2023-09-11 12:16:53'),
(176, 'App\\Models\\User', 99, 'courierin1@gmail.com', '0513486d26228954b75f55bd0e7a96dd1d15f6a19fdb0fd728df145cf0e50947', '[\"*\"]', NULL, NULL, '2023-09-11 12:30:31', '2023-09-11 12:30:31'),
(177, 'App\\Models\\User', 99, 'courierin1@gmail.com', '294e24114b993bff09a73957073dd3390fd5e175976369540f75255a92cb34cc', '[\"*\"]', NULL, NULL, '2023-09-11 12:34:30', '2023-09-11 12:34:30'),
(178, 'App\\Models\\User', 99, 'courierin1@gmail.com', '10eba7bc55c1184aa4df16e20399a64c559ef7fcfa7af52a6a2f0d693cf29dda', '[\"*\"]', NULL, NULL, '2023-09-11 13:06:29', '2023-09-11 13:06:29'),
(179, 'App\\Models\\User', 99, 'courierin1@gmail.com', '1337f7534e44511cd4e4d88248eeec98b27c1d4aa0a55e9d4499f49351fde44b', '[\"*\"]', NULL, NULL, '2023-09-11 13:10:28', '2023-09-11 13:10:28'),
(180, 'App\\Models\\User', 106, 'courierin1@gmail.com', '4778203cd7a0cb254d343a61a406dbccc664b877e6ebc2ccce8f42c4a3897d6a', '[\"*\"]', NULL, NULL, '2023-09-14 08:08:46', '2023-09-14 08:08:46'),
(181, 'App\\Models\\User', 71, 'alisaanjhe444@gmail.com', '48af60a3b8b9d50abe873185c233a9d749f25164ca7ffdfa6f42478d905c6780', '[\"*\"]', NULL, NULL, '2023-09-15 11:21:14', '2023-09-15 11:21:14'),
(182, 'App\\Models\\User', 102, 'onaibfaisalp@live.com', 'd45c15c73c4bb7d8d10573f20b76b641dc98056c6941fc3bf1918d4f51f72716', '[\"*\"]', NULL, NULL, '2023-09-18 16:17:31', '2023-09-18 16:17:31'),
(183, 'App\\Models\\User', 102, 'onaibfaisalp@live.com', '32afbfda26cd4806649dc650165cd6e21441b69011f2b82917e064ad442132fa', '[\"*\"]', NULL, NULL, '2023-09-18 18:13:23', '2023-09-18 18:13:23'),
(184, 'App\\Models\\User', 102, 'onaibfaisalp@live.com', 'a45261499ac7106e7b83e322610fd1764f77fb75698ef1021585dedee59dc282', '[\"*\"]', NULL, NULL, '2023-09-18 18:15:16', '2023-09-18 18:15:16'),
(185, 'App\\Models\\User', 90, 'anusiqbal33@gmail.com', '54a8c77f7f0c129bda3037e83d3c3607008f6f1c6533d868bd0437e872d8c620', '[\"*\"]', NULL, NULL, '2023-09-20 13:13:33', '2023-09-20 13:13:33'),
(186, 'App\\Models\\User', 90, 'anusiqbal33@gmail.com', '9d4f5c5d72ba155bcb420a459394b4c59bf952957224d502505d9717771ad352', '[\"*\"]', NULL, NULL, '2023-09-20 13:29:40', '2023-09-20 13:29:40'),
(187, 'App\\Models\\User', 71, 'alisaanjhe444@gmail.com', '6a569329bfc67f9508a06501bca263fa62c7b7dc4278aa49e88c78dafd7b189a', '[\"*\"]', NULL, NULL, '2023-09-25 23:23:30', '2023-09-25 23:23:30'),
(188, 'App\\Models\\User', 71, 'alisaanjhe444@gmail.com', 'f70ee68d93c804c93c530ecfd98ae0b3b85ab4f3f527eab345742d6079b2e12c', '[\"*\"]', NULL, NULL, '2023-09-26 00:24:41', '2023-09-26 00:24:41'),
(189, 'App\\Models\\User', 71, 'alisaanjhe444@gmail.com', '5551b2fe509ca3bf5de542af840efb62703f281d8a6c63d84d4ef42e9284c72d', '[\"*\"]', NULL, NULL, '2023-09-26 00:30:36', '2023-09-26 00:30:36'),
(190, 'App\\Models\\User', 71, 'alisaanjhe444@gmail.com', '4a970c49df67f784366f83c78a554d99c2c366e2f44ecfdfcd5617fbac64bf51', '[\"*\"]', NULL, NULL, '2023-09-26 00:35:05', '2023-09-26 00:35:05'),
(191, 'App\\Models\\User', 71, 'alisaanjhe444@gmail.com', 'eb6baf019138027257bbf8272cdd7423c467dfb3970ab2d4d70f643ff0bebd78', '[\"*\"]', NULL, NULL, '2023-09-26 00:47:07', '2023-09-26 00:47:07'),
(192, 'App\\Models\\User', 110, 'gicohos237@cdeter.com', '61c107e098f5525e490de7767b9e606e34f8a130a4feef9d73f1859701e373dc', '[\"*\"]', NULL, NULL, '2023-09-26 00:51:27', '2023-09-26 00:51:27'),
(193, 'App\\Models\\User', 110, 'gicohos237@cdeter.com', 'c4a7b5a810209d34ad2053cb03c2e3e7713a246b40c040ab44c518b20115823f', '[\"*\"]', NULL, NULL, '2023-09-26 01:02:03', '2023-09-26 01:02:03'),
(194, 'App\\Models\\User', 110, 'gicohos237@cdeter.com', 'f4857e31f0a7c1a222bbd9ee9e2fc47c39e050ab314ff00f79d7b527834894ef', '[\"*\"]', NULL, NULL, '2023-09-26 01:19:10', '2023-09-26 01:19:10'),
(195, 'App\\Models\\User', 110, 'gicohos237@cdeter.com', '325eec5d098ce403b16383e71a75e92bfe3796602fbf34ef44f21f6215d770f3', '[\"*\"]', NULL, NULL, '2023-09-26 01:34:48', '2023-09-26 01:34:48'),
(196, 'App\\Models\\User', 110, 'gicohos237@cdeter.com', '203665aacaf64cc7bf29b3c2e29407c3ab609d1ee8ec7be1220647883114802f', '[\"*\"]', NULL, NULL, '2023-09-27 23:57:49', '2023-09-27 23:57:49');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `car_id`, `rating`, `message`, `created_at`, `updated_at`) VALUES
(1, 71, 4, 3, 'ok ok', '2023-06-20 00:06:52', '2023-06-20 00:06:52');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `type`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'Vat', 'Vat', '5', NULL, '2023-06-09 19:57:43');

-- --------------------------------------------------------

--
-- Table structure for table `used_coupons`
--

CREATE TABLE `used_coupons` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coupon_name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated__at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `used_coupons`
--

INSERT INTO `used_coupons` (`id`, `user_id`, `coupon_name`, `created_at`, `updated__at`) VALUES
(1, 10, 'bilal', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_no` varchar(50) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `licence_no` varchar(100) DEFAULT NULL,
  `emirates_id` varchar(100) DEFAULT NULL,
  `visa_copy` varchar(100) DEFAULT NULL,
  `passport_copy` varchar(100) DEFAULT NULL,
  `emirates_back` varchar(222) DEFAULT NULL,
  `emirates_front` varchar(222) DEFAULT NULL,
  `international_d_licence_front` varchar(100) DEFAULT NULL,
  `international_d_licence_back` varchar(150) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `user_type` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_verified` int(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `local_d_licence_front` varchar(222) DEFAULT NULL,
  `local_d_licence_back` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `contact_no`, `country`, `city`, `licence_no`, `emirates_id`, `visa_copy`, `passport_copy`, `emirates_back`, `emirates_front`, `international_d_licence_front`, `international_d_licence_back`, `type`, `user_type`, `email`, `email_verified_at`, `is_verified`, `password`, `remember_token`, `created_at`, `updated_at`, `local_d_licence_front`, `local_d_licence_back`) VALUES
(4, 'Prince', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', 'admin@gmail.com', '2023-02-21 00:31:41', 1, '$2a$12$vNUPE9r/cuOyvbYz0SiucekK92qSabaJ6agXzj6DosQafigINPOKK', 'aVSMJe3aXGfY1OIN5mtwJqndhHNzVA2L63aYqxZEv0xSsyZRcI4GWn2WxWLx', '2023-02-21 00:31:41', '2023-02-21 00:31:41', NULL, NULL),
(68, 'oz test', '', '', '', NULL, '1234', NULL, NULL, NULL, NULL, NULL, NULL, 'local', 'User', 'anusiq23bal33@gmail.com', '2023-02-21 00:31:41', 1, '$2a$12$vNUPE9r/cuOyvbYz0SiucekK92qSabaJ6agXzj6DosQafigINPOKK$2a$12$vNUPE9r/cuOyvbYz0SiucekK92qSabaJ6agXzj6DosQafigINPOKK$2a$12$vNUPE9r/cuOyvbYz0SiucekK92qSabaJ6agXzj6DosQafigINPOKK', 'UUjjLXCyT6WegpDug0IsYVo1LGuLLOGvdH0x2rnr', '2023-06-09 19:08:31', '2023-06-09 19:08:32', NULL, NULL),
(69, 'oz1 test', '', '', '', NULL, '6433456', NULL, NULL, NULL, NULL, NULL, NULL, 'local', 'User', 'ozairfaisalgp@gmail.com', '2023-06-09 19:33:40', 1, '$2a$12$vNUPE9r/cuOyvbYz0SiucekK92qSabaJ6agXzj6DosQafigINPOKK', ' ', '2023-06-09 19:33:09', '2023-06-09 19:33:40', NULL, NULL),
(70, 'pz2 test', '', '', '', NULL, NULL, 'uploads/users/1686323875.1-3.jpg', 'uploads/users/1686323876.403121-2023-mercedes-benz-s-class.jpg', NULL, NULL, 'uploads/users/1686323875.Group 1.png', 'uploads/users/1686323876.icon-instagram-2.png', 'international', 'User', 'osmanfaisalp@hotmail.com', '2023-06-09 20:19:03', 1, '$2a$12$vNUPE9r/cuOyvbYz0SiucekK92qSabaJ6agXzj6DosQafigINPOKK', ' ', '2023-06-09 20:17:56', '2023-06-09 20:19:03', NULL, NULL),
(71, 'Muhammad Ali', '+92331351351', 'Pakistan', 'karachiqwerqerqwer', NULL, 'tahir', NULL, NULL, NULL, NULL, NULL, NULL, 'local', 'User', 'alisaanjhe444@gmail.com', '2023-06-12 15:14:02', 1, '$2y$10$GIRj6GzJmsAYueQyws7yiOdGwsCqt5jbfFIgyHMZwgml7Irx2e/Fa', ' ', '2023-06-12 15:13:26', '2023-09-26 00:33:59', NULL, NULL),
(72, 'bilal ahmed', '', '', '', NULL, '51515', NULL, NULL, NULL, NULL, NULL, NULL, 'local', 'User', 'abc@gmail.com', NULL, 1, '$2a$12$vNUPE9r/cuOyvbYz0SiucekK92qSabaJ6agXzj6DosQafigINPOKK', 'z6J3wxp8BFLJCHzfUzFuZOESbrraGHNFB4oxYyOa', '2023-06-17 00:09:05', '2023-06-17 00:09:06', NULL, NULL),
(73, 'Abdullah Yafai', '', '', '', NULL, '1234567', NULL, NULL, NULL, NULL, NULL, NULL, 'local', 'User', 'abdullahyafai077@gmail.com', '2023-06-18 15:15:33', 1, '$2a$12$vNUPE9r/cuOyvbYz0SiucekK92qSabaJ6agXzj6DosQafigINPOKK', ' ', '2023-06-18 14:56:11', '2023-06-18 15:15:33', NULL, NULL),
(74, 'Osman Faisal', '', '', '', NULL, NULL, 'uploads/users/1688754240.WhatsApp Image 2023-05-22 at 11.40.13.jpeg', 'uploads/users/1688754240.WhatsApp Image 2023-05-22 at 11.40.13.jpeg', NULL, NULL, 'uploads/users/1688754240.WhatsApp Image 2023-05-22 at 11.40.13.jpeg', 'uploads/users/1688754240.WhatsApp Image 2023-05-22 at 11.40.13.jpeg', 'international', 'User', 'osmanpoonawala@hotmail.com', '2023-07-07 23:26:22', 1, '$2a$12$vNUPE9r/cuOyvbYz0SiucekK92qSabaJ6agXzj6DosQafigINPOKK', ' ', '2023-07-07 23:24:00', '2023-07-07 23:26:22', NULL, NULL),
(75, 'Osman Faisal New', '', '', '', NULL, '12344', NULL, NULL, NULL, NULL, NULL, NULL, 'local', 'User', 'osmanfaisalgp@gmail.com', '2023-07-07 23:31:26', 1, '$2a$12$vNUPE9r/cuOyvbYz0SiucekK92qSabaJ6agXzj6DosQafigINPOKK', ' ', '2023-07-07 23:31:10', '2023-07-07 23:31:26', NULL, NULL),
(76, 'Osman Faisal', '', '', '', NULL, NULL, 'uploads/users/1689013313.WhatsApp Image 2023-05-22 at 11.40.13.jpeg', 'uploads/users/1689013313.WhatsApp Image 2023-05-22 at 11.40.13.jpeg', NULL, NULL, 'uploads/users/1689013313.WhatsApp Image 2023-05-22 at 11.40.13.jpeg', 'uploads/users/1689013313.WhatsApp Image 2023-05-22 at 11.40.13.jpeg', 'international', 'User', 'jolopi5250@niback.com', '2023-07-10 23:22:19', 1, '$2a$12$vNUPE9r/cuOyvbYz0SiucekK92qSabaJ6agXzj6DosQafigINPOKK', ' ', '2023-07-10 23:21:54', '2023-07-10 23:22:19', NULL, NULL),
(77, 'Osman Faisal Monday', '', '', '', NULL, '123333', NULL, NULL, NULL, NULL, NULL, NULL, 'local', 'User', 'gexicij335@nasskar.com', NULL, NULL, '$2a$12$vNUPE9r/cuOyvbYz0SiucekK92qSabaJ6agXzj6DosQafigINPOKK', 'bwaAXGKYWAgwI4sbHFGnE9EWCeVu2uoD4QoYh30w', '2023-07-10 23:32:11', '2023-07-10 23:32:11', NULL, NULL),
(78, 'Osman Faisal 10 July', '', '', '', NULL, '86766', NULL, NULL, NULL, NULL, NULL, NULL, 'local', 'User', 'rrno2s@ezztt.com', '2023-07-10 23:34:24', 1, '$2a$12$vNUPE9r/cuOyvbYz0SiucekK92qSabaJ6agXzj6DosQafigINPOKK', ' ', '2023-07-10 23:34:12', '2023-07-10 23:34:24', NULL, NULL),
(79, 'Sean Hull', '', '', '', NULL, NULL, 'uploads/users/1689616743.Angeladocs.pptx', 'uploads/users/1689616745.241b422b-3b29-4e8c-b33e-6fece7469875.pptx', NULL, NULL, 'uploads/users/1689616743.Angeladocs (1).pptx', 'uploads/users/1689616744.a4bcfba8-f8dd-4b8f-901a-72888e68d0f2.docx', 'international', 'User', 'gocam@mailinator.com', NULL, NULL, '$2a$12$vNUPE9r/cuOyvbYz0SiucekK92qSabaJ6agXzj6DosQafigINPOKK', 'lnEAAbd51nFGEMKMZmcu6kZNcdK7cztAZzhARaC5', '2023-07-17 22:59:05', '2023-07-17 22:59:06', NULL, NULL),
(85, 'Osman 17 Aug Faisal', '', '', '', NULL, '12334', NULL, NULL, NULL, NULL, 'uploads/users/1691963763.PHOTO-2023-08-06-19-02-31.jpg', 'uploads/users/1691963763.PHOTO-2023-08-06-19-02-31.jpg', 'local', 'User', 'pibef59288@weishu8.com', '2023-08-14 02:56:26', 1, '$2y$10$zcjo8QtYj8mWtTTyQv2CqeC5YY6b45e4SkhICJSIZBy3CVHAfAyTO', ' ', '2023-08-14 02:56:03', '2023-09-20 13:23:20', NULL, NULL),
(86, 'New Osman Faisal', '', '', '', NULL, NULL, 'uploads/users/1691964096.PHOTO-2023-08-06-19-02-31.jpg', 'uploads/users/1691964096.PHOTO-2023-08-06-19-02-31.jpg', NULL, NULL, 'uploads/users/1691964096.PHOTO-2023-08-06-19-02-31.jpg', 'uploads/users/1691964096.PHOTO-2023-08-06-19-02-31.jpg', 'international', 'User', 'vefopi2425@vreaa.com', '2023-08-14 03:01:59', 1, '$2y$10$7Hoe.rv.jIFSJ.xe22agOeaf5pYp9E.wo8oOjd22panBphr0/6sDu', ' ', '2023-08-14 03:01:36', '2023-08-14 03:01:59', NULL, NULL),
(89, 'Prince .', '', '', '', NULL, NULL, 'uploads/users/1692037013.download.jpeg', 'uploads/users/1692037013.download (1).jpeg', NULL, NULL, 'uploads/users/1692037013.download (2).jpeg', 'uploads/users/1692037013.download (3).jpeg', 'international', 'User', 'anusiqbal33232@gnmail.com', NULL, NULL, '$2y$10$5A1DOF.rC8.nE2tnLmrkm.ymTdMAZmf9tuH0ia/6SKbmlkuCJ14.q', 'D85zmIhAZatRhKmiCp3SdtUqqiEDdmaEpxD5hAjV', '2023-08-14 23:16:53', '2023-08-14 23:16:54', NULL, NULL),
(90, 'Prince sasasas', '+1 6847846168', 'AmericanSamoa', '23232', NULL, 'null', 'uploads/users/1692037184.download.jpeg', 'uploads/users/1692037184.download (1).jpeg', NULL, NULL, 'uploads/users/1692037184.download (2).jpeg', 'uploads/users/1692037184.download (3).jpeg', 'international', 'User', 'anusiqbal33@gmail.com', '2023-08-14 23:19:59', 1, '$2y$10$Rs0HjqkWpfdTTchGvyORWe.QNkFGT8.fUKppOBdybmVFa5W5r0vbG', ' ', '2023-08-14 23:19:44', '2023-09-20 13:30:21', NULL, NULL),
(91, 'Osman 17 August', '', '', '', NULL, NULL, 'uploads/users/1692292876.PHOTO-2023-08-06-19-02-31.jpg', 'uploads/users/1692292877.PHOTO-2023-08-06-19-02-31.jpg', NULL, NULL, 'uploads/users/1692292876.PHOTO-2023-08-06-19-02-31.jpg', 'uploads/users/1692292877.PHOTO-2023-08-06-19-02-31.jpg', 'international', 'User', 'bakile4680@dusyum.com', NULL, NULL, '$2y$10$Rq6SE3UfSNOCnUwEaUZqceNQdFwQzXjGOrd7ewTPkFcKY6GvRRAUa', 'vKFFPTyhj72Bg9NfQTvhvesn03iw1F5uhvEenaD7', '2023-08-17 22:21:17', '2023-08-17 22:21:17', NULL, NULL),
(100, 'Osman 22 Aug Faisal', '', '', '', NULL, NULL, 'uploads/users/1692728956.PHOTO-2023-08-06-19-04-19.jpg', 'uploads/users/1692728956.PHOTO-2023-08-06-19-04-19.jpg', NULL, NULL, 'uploads/users/1692728956.PHOTO-2023-08-06-19-03-02.jpg', 'uploads/users/1692728956.PHOTO-2023-08-06-19-03-34.jpg', 'international', 'User', 'kajoweb556@cwtaa.com', '2023-08-22 23:29:36', 1, '$2y$10$PLwulxFWnu0QTiuIuim2DOaw9pAU2GAYzF0/jBH7lrLaIdRhWbmEi', '', '2023-08-22 23:29:16', '2023-08-22 23:29:36', NULL, NULL),
(101, 'tom riddle', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'uploads/users/1694086294.01 B.png', 'uploads/users/1694086294.01 B.png', 'local', 'User', 'tomriddle@tom', NULL, NULL, '$2y$10$rRr8gJx/ERagOaOoSujPiu33xO6rqvyfDEW1G9I0QyJtAWI34Ei5G', '9BynScwHlyrLr7SSdbsLljQpYPA3zqGilxnmNaB0', '2023-09-07 16:31:34', '2023-09-07 16:31:35', NULL, NULL),
(102, 'Onaib Faisal TEST', '', '', '', NULL, 'null', 'uploads/users/1694087850.Group 39493 (1).png', 'uploads/users/1694087850.Group 39493 (1).png', NULL, NULL, 'uploads/users/1694087850.Group 39495.png', 'uploads/users/1694087850.Group 39495.svg', 'international', 'User', 'onaibfaisalp@live.com', '2023-09-07 16:58:00', 1, '$2y$10$Dnex3Bw7YEzG67XtVz7DMOZVDiu5AMbaqshZ4Xkv3/PmZVHYUCXY2', '', '2023-09-07 16:57:30', '2023-09-18 18:14:17', NULL, NULL),
(103, 'osman naveed', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'uploads/users/1694371966.WhatsApp Image 2023-09-07 at 9.27.55 PM.jpeg', 'uploads/users/1694371966.WhatsApp Image 2023-09-06 at 11.01.25 PM.jpeg', 'local', 'User', 'difadif831@nickolis.com', '2023-09-10 23:53:21', 1, '$2y$10$yNhAWQriJvOwwbvsFwGcJeIdMcBIZ/OoQRyexuoyivpNpIyR0J7GS', '', '2023-09-10 23:52:46', '2023-09-10 23:53:21', NULL, NULL),
(104, 'Muhammad Naveed', '', '', '', NULL, 'null', 'uploads/users/1694372469.WhatsApp Image 2023-09-07 at 9.27.55 PM.jpeg', 'uploads/users/1694372469.WhatsApp Image 2023-09-07 at 9.27.55 PM.jpeg', NULL, NULL, 'uploads/users/1694372469.WhatsApp Image 2023-09-07 at 9.27.55 PM.jpeg', 'uploads/users/1694372469.WhatsApp Image 2023-09-07 at 9.27.55 PM.jpeg', 'international', 'User', 'berari1251@docwl.com', '2023-09-11 00:01:40', 1, '$2y$10$ZjR.GUeuDmEfb78s6wEJC.OdlB1YvJRtu0PIHKmteNAdUvD66FlfS', '', '2023-09-11 00:01:09', '2023-09-11 00:07:07', NULL, NULL),
(109, 'Ina Gilliam', '', '', '', NULL, 'Deserunt ipsum sed m', NULL, NULL, 'uploads/users/emirates_back_1695190019.smart-school.png', 'uploads/users/emirates_front1695190019.smart-school.png', 'uploads/users/international_d_licence_front1695190019.smart-school.png', 'uploads/users/international_d_licence_back1695190019.smart-school.png', 'local', 'User', 'cape@mailinator.com', NULL, NULL, '$2y$10$Ci4hAM95T90NmGZx9C6Kj.Gjb.iSsc830.KoNfOdvr4635D8pqGh.', '4qH9UGX7nXVFqJiLPQ7biDv1lBnINtKkGkWP30aV', '2023-09-20 11:06:59', '2023-09-20 11:07:00', NULL, NULL),
(110, 'naveed osman', '+97123423534534', 'United Arab Emirates', 'lahore', NULL, 'alisaanjhe444@gmail.com', NULL, NULL, 'uploads/users/emirates_back_1695671446.ec784245ed8d42acc774f658fd88c508.jpg', 'uploads/users/emirates_front1695671446.ec784245ed8d42acc774f658fd88c508.jpg', 'uploads/users/1695674679.water add1 .jpg', 'uploads/users/1695674679.water add1 .jpg', 'local', 'User', 'gicohos237@cdeter.com', '2023-09-26 00:51:13', 1, '$2y$10$lVUa1JN9ENxQ6DHhh4QsjuRLc6yiyfzqZgHurv7H6ro7joUNXRdOm', '', '2023-09-26 00:50:46', '2023-09-26 01:44:39', 'uploads/users/local_d_licence_front1695674679.water add1 .jpg', 'uploads/users/local_d_licence_back1695674679.water add1 .jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrowed_requests`
--
ALTER TABLE `borrowed_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cancelation_requests`
--
ALTER TABLE `cancelation_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_addons`
--
ALTER TABLE `car_addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_brands`
--
ALTER TABLE `car_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_orders`
--
ALTER TABLE `car_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
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
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_payments`
--
ALTER TABLE `order_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `used_coupons`
--
ALTER TABLE `used_coupons`
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
-- AUTO_INCREMENT for table `borrowed_requests`
--
ALTER TABLE `borrowed_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `cancelation_requests`
--
ALTER TABLE `cancelation_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `car_addons`
--
ALTER TABLE `car_addons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `car_brands`
--
ALTER TABLE `car_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `car_orders`
--
ALTER TABLE `car_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_payments`
--
ALTER TABLE `order_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `used_coupons`
--
ALTER TABLE `used_coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
