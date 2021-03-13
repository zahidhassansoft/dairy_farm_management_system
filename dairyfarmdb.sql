-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2021 at 08:05 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dairyfarmdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal_types`
--

CREATE TABLE `animal_types` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(5) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animal_types`
--

INSERT INTO `animal_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Brahman', '1', '2021-01-08 00:03:44', '2021-01-08 00:03:44'),
(2, 'Friesian', '1', '2021-01-08 00:04:24', '2021-01-08 00:04:24'),
(3, 'Holstein', '1', '2021-01-08 00:04:32', '2021-01-08 00:04:32'),
(4, 'Holstein Friesian', '1', '2021-01-08 00:04:54', '2021-01-08 00:04:54'),
(5, 'Jersey', '1', '2021-01-08 00:05:08', '2021-01-08 00:05:08'),
(7, 'Sahiwal', '1', '2021-01-08 00:06:16', '2021-01-08 00:06:16');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Black & White', '2021-01-07 23:55:24', '2021-02-10 11:29:40'),
(2, 'Red', '2021-01-07 23:55:37', '2021-01-07 23:55:37'),
(3, 'Blue', '2021-01-07 23:55:48', '2021-01-07 23:55:48'),
(5, 'Purple', '2021-01-07 23:57:30', '2021-01-07 23:57:30'),
(6, 'Black', '2021-01-07 23:57:36', '2021-01-07 23:57:36'),
(8, 'Gray', '2021-01-11 13:22:58', '2021-01-11 13:22:58'),
(9, 'White', '2021-02-10 11:30:54', '2021-02-10 11:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `cows`
--

CREATE TABLE `cows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `animal_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` datetime DEFAULT NULL,
  `animal_age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age_month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `animal_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pregnant_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `previous_no_of_pregnant` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_pregnant_aprrox_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `milk_per_day_ltr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buy_from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buy_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buy_date` date NOT NULL,
  `stall_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `previous_vaccine` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cows`
--

INSERT INTO `cows` (`id`, `animal_id`, `date_of_birth`, `animal_age`, `age_month`, `weight`, `height`, `gender`, `color`, `animal_type`, `pregnant_status`, `previous_no_of_pregnant`, `next_pregnant_aprrox_time`, `milk_per_day_ltr`, `buy_from`, `buy_price`, `buy_date`, `stall_no`, `previous_vaccine`, `note`, `image`, `Status`, `created_at`, `updated_at`) VALUES
(1, 'C-0001', '2009-01-01 00:00:00', '4399', NULL, '120', '40', 'Female', '7', '3', 'Not Pregnant', '1', '01/30/2021', '25', 'Canada', '40000', '2020-11-07', '4', 'Yes', 'asdfasdf', 'public/frontend/cows/1689071677638234.jpg', 'Sale', '2021-01-16 19:11:17', '2021-01-16 19:27:59'),
(2, 'C-0002', '2020-12-27 00:00:00', '22', 'asdf', '120', '40', 'Female', '2', '2', 'Pregnant', '1', '01/05/2021', '10', 'Uganda', '40000', '2020-12-27', '3', 'Yes', '21', 'public/frontend/cows/1689245840619108.jpg', 'Sale', '2021-01-18 17:19:32', '2021-01-18 17:19:32'),
(4, 'C-0004', '2009-01-01 00:00:00', '4406.75', NULL, '120', '40', 'Female', '2', '2', 'Pregnant', 'N/A', 'N/A', 'N/A', 'Uganda', '40000', '2020-12-27', '3', 'Yes', '21', 'public/frontend/cows/1689792421091531.jpg', 'Available', '2021-01-18 17:19:33', '2021-01-24 18:07:12'),
(5, 'C-0005', '2018-09-18 00:00:00', '855', 'asdf', '142', '68', 'Male', '2', '2', 'Not Pregnant', NULL, NULL, NULL, 'USA', '150000', '2020-12-11', '1', 'Yes', 'New Collection from USA', 'public/frontend/cows/1689408016077115.jpg', 'Sale', '2021-01-20 12:17:14', '2021-01-20 12:17:14'),
(6, 'C-0006', '2019-03-21 00:00:00', '671', 'asdf', '118', '62', 'Male', '6', '4', 'Not Pregnant', NULL, NULL, NULL, 'Canada', '115000', '2021-01-01', '2', 'Yes', 'New Collection from Canada', 'public/frontend/cows/1689408150850245.jpg', 'Available', '2021-01-20 12:19:23', '2021-01-20 12:19:23'),
(7, 'C-0007', '2017-12-11 00:00:00', '1136', 'asdf', '128', '59', 'Female', '8', '1', 'Pregnant', '1', '08/28/2021', NULL, 'New Zealand', '140000', '2020-12-17', '3', 'Yes', 'New Collection from New Zealand', 'public/frontend/cows/1689408343397398.jpg', 'Sale', '2021-01-20 12:22:27', '2021-01-20 12:22:27'),
(8, 'C-0008', '2016-07-25 00:00:00', '1640', 'asdf', '140', '65', 'Female', '6', '6', 'Pregnant', '2', '10/28/2021', '45', 'Australia', '155000', '2021-01-02', '3', 'Yes', 'New Collection from Australia', 'public/frontend/cows/1689408496995412.png', 'Available', '2021-01-20 12:24:53', '2021-01-20 12:24:53'),
(9, 'C-0009', '2019-07-13 00:00:00', '557', 'asdf', '92', '55', 'Female', '2', '1', 'Not Pregnant', NULL, NULL, NULL, 'Bangladesh', '78000', '2020-12-18', '1', 'Yes', 'This is Local Cow', 'public/frontend/cows/1689408603294123.jpg', 'Available', '2021-01-20 12:26:34', '2021-01-20 12:26:34'),
(10, 'C-0010', '2021-01-20 18:28:31', NULL, NULL, '102', '59', 'Male', '8', '5', 'Not Pregnant', NULL, NULL, NULL, 'Bangladesh', '120000', '2020-11-20', '2', 'Yes', 'New Collection from Local Market', 'public/frontend/cows/1689408725852215.jpg', 'Available', '2021-01-20 12:28:31', '2021-01-20 12:28:31'),
(11, 'C-0011', '2014-07-03 00:00:00', '2393', 'asdf', '170', '72', 'Female', '6', '7', 'Pregnant', '3', '09/13/2021', '60', 'New Zealand', '230000', '2020-07-13', '3', 'Yes', 'Collect from New Zealand', 'public/frontend/cows/1689408863763390.jpg', 'Available', '2021-01-20 12:30:43', '2021-01-20 12:30:43'),
(13, 'C-0013', '2009-01-01 00:00:00', '4406', 'asdf', '120', '45', 'Male', '8', '6', 'N/A', 'N/A', 'N/A', 'N/A', 'New Zealand', '120000', '2019-07-08', '1', 'No', 'asdfasdf', 'public/frontend/cows/1689791517036450.jpg', 'Available', '2021-01-24 17:52:49', '2021-01-24 17:52:49'),
(14, 'C-0014', '2021-02-10 17:17:56', NULL, NULL, '120', '59', 'Male', '8', '1', 'N/A', 'N/A', 'N/A', 'N/A', 'UK', '120000', '2021-02-10', '2', 'Yes', 'New added', 'public/frontend/cows/1691306821593560.jpg', 'Available', '2021-02-10 11:17:56', '2021-02-10 11:17:56'),
(15, 'C-0015', '2012-01-05 00:00:00', '3340', 'asdf', '240', '37', 'Female', '1', '1', 'N/A', NULL, '11/05/2021', '45', 'Rajshahi', '120000', '2021-02-26', '1', 'No', NULL, 'public/frontend/cows/1692780285661971.jpg', 'Available', '2021-02-26 17:38:01', '2021-02-26 17:38:01'),
(16, 'C-0016', '2016-08-29 00:00:00', '1642', 'asdf', NULL, '40', 'Male', '1', '4', 'Not Pregnant', 'N/A', 'N/A', 'N/A', 'Thakurgaon', '130000', '2021-02-26', '5', 'No', NULL, 'public/frontend/cows/1692780364756287.jpg', 'Available', '2021-02-26 17:39:17', '2021-02-26 17:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `cows_feed`
--

CREATE TABLE `cows_feed` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stall_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cow_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `note` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cows_feed`
--

INSERT INTO `cows_feed` (`id`, `stall_no`, `cow_no`, `date`, `note`, `created_at`, `updated_at`) VALUES
(1, '3', 'C-0002', '2021-02-10', 'Feeding Time Set', '2021-01-21 21:43:54', '2021-02-10 10:51:29'),
(2, '4', 'C-0001', '2021-01-20', 'this section for note', '2021-01-21 21:46:02', '2021-01-23 16:05:17'),
(3, '5', 'CC-0006', '2021-01-24', 'Cow Calf Feed', '2021-01-25 11:38:53', '2021-01-25 11:45:37'),
(5, '5', 'CC-0008', '2021-02-26', 'this is cow-calf feed', '2021-01-25 11:51:17', '2021-02-25 17:00:59'),
(8, '5', 'CC-0005', '2021-02-26', 'asdasdf', '2021-02-09 15:49:17', '2021-02-25 17:00:30'),
(10, '1', 'C-0005', '2021-01-02', 'asf', '2021-02-09 16:16:57', '2021-02-09 16:16:57'),
(11, '1', 'C-0005', '2021-02-26', 'a', '2021-02-25 16:57:21', '2021-02-25 17:00:11'),
(12, '4', 'C-0001', '2021-02-26', 'asdf', '2021-02-25 16:58:14', '2021-02-25 16:59:54');

-- --------------------------------------------------------

--
-- Table structure for table `cow_calfs`
--

CREATE TABLE `cow_calfs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `animal_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` datetime DEFAULT NULL,
  `mother_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `animal_age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age_month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `animal_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buy_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buy_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buy_date` date DEFAULT NULL,
  `stall_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `previous_vaccine` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cow_calfs`
--

INSERT INTO `cow_calfs` (`id`, `animal_id`, `date_of_birth`, `mother_id`, `animal_age`, `age_month`, `weight`, `height`, `gender`, `color`, `animal_type`, `buy_from`, `buy_price`, `buy_date`, `stall_no`, `previous_vaccine`, `note`, `Status`, `user_name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'CC-0001', '2020-12-01 00:00:00', '1', '47', NULL, '20', '20', 'Female', '6', '1', NULL, '0', '2020-12-01', '4', 'No', 'asdfasdf', 'Sale', 'Md Zahidul Islam', 'public/frontend/cows/1689072474379555.jpg', '2021-01-16 19:23:57', '2021-01-16 19:27:43'),
(2, 'CC-0002', '2021-01-20 18:35:26', '2', NULL, NULL, '52', '43', 'Male', '2', '7', 'USA', '60000', '2021-01-20', '4', 'Yes', 'New Calf Collection from USA', 'Available', 'rokibul', 'public/frontend/cows/1689409160265490.jpg', '2021-01-20 12:35:26', '2021-01-20 12:35:26'),
(3, 'CC-0003', '2020-02-05 00:00:00', '1', '350', NULL, '75', '52', 'Male', '8', '5', 'Canada', '85000', '2021-01-09', '4', 'Yes', 'Collect from Canada', 'Available', 'rokibul', 'public/frontend/cows/1689409529113954.jpg', '2021-01-20 12:41:17', '2021-01-20 12:41:17'),
(4, 'CC-0004', '2021-01-20 00:00:00', '9', NULL, NULL, '75', '55', 'Male', '2', '2', 'Bangladesh', '80000', '2020-11-13', '1', 'No', 'Collect from Local Market', 'Sale', 'Md Zahidul Islam', 'public/frontend/cows/1689409625393924.webp', '2021-01-20 12:42:49', '2021-01-24 19:34:45'),
(5, 'CC-0005', '2020-06-03 00:00:00', '2', '231', NULL, '45', '40', 'Female', '6', '4', NULL, NULL, '2021-01-20', '5', 'No', 'Farm Calf New Born', 'Available', 'rokibul', 'public/frontend/cows/1689409997121680.jpg', '2021-01-20 12:48:44', '2021-01-20 12:48:44'),
(6, 'CC-0006', '2021-01-02 00:00:00', '7', '18', NULL, '38', '35', 'Male', '2', '6', NULL, NULL, '2021-01-20', '5', 'No', 'New Born', 'Available', 'Md Zahidul Islam', 'public/frontend/cows/1689410048218159.jpg', '2021-01-20 12:49:32', '2021-01-24 19:34:33'),
(8, 'CC-0008', '2020-07-01 00:00:00', 'Buy', '208', NULL, '120', '100', 'Female', '6', '4', 'Dhaka', '39500', '2021-01-06', '5', 'No', 'asdfasdf', 'Sale', 'Md Zahidul Islam', 'public/frontend/cows/1689796262055336.jpg', '2021-01-24 18:59:21', '2021-01-24 19:09:34'),
(9, 'CC-0009', '2021-01-01 00:00:00', '1', '25', NULL, '20', '25', 'Male', '2', '3', 'N/A', 'N/A', '2021-01-26', '4', 'No', 'naaasdf', 'Sale', 'Md Zahidul Islam', 'public/frontend/cows/1689885722497778.jpg', '2021-01-25 18:50:11', '2021-01-25 18:50:11'),
(10, 'CC-0010', '2020-11-04 00:00:00', '2', '98', NULL, '40', '35', 'Female', '2', '4', 'N/A', 'N/A', '2021-02-10', '4', 'No', 'New Member of our Farm', 'Available', 'Md. Rokibul Islam', 'public/frontend/cows/1691306946553597.jpg', '2021-02-10 11:19:56', '2021-02-10 11:19:56'),
(11, 'CC-0011', '2020-03-13 00:00:00', '2', '350', NULL, '45', '30', 'Male', '5', '5', 'N/A', 'N/A', '2021-02-26', '3', 'No', NULL, 'Available', 'Md Zahidul Islam', 'public/frontend/cows/1692780430301476.jpg', '2021-02-26 17:40:19', '2021-02-26 17:40:19');

-- --------------------------------------------------------

--
-- Table structure for table `cow_images`
--

CREATE TABLE `cow_images` (
  `id` bigint(20) NOT NULL,
  `referance_no` varchar(20) DEFAULT NULL,
  `animal_id` varchar(50) NOT NULL,
  `stall_no` varchar(20) NOT NULL,
  `input_from` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `images` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cow_sales`
--

CREATE TABLE `cow_sales` (
  `id` bigint(20) NOT NULL,
  `invoice_no` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `RefNo` varchar(20) DEFAULT NULL,
  `RefDate` date DEFAULT current_timestamp(),
  `customer_name` varchar(200) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `customer_email` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  `animal_type` varchar(5) NOT NULL,
  `animal_id` varchar(20) NOT NULL,
  `stall_no` varchar(20) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `sale_price` double NOT NULL,
  `paid_amount` double NOT NULL,
  `due_amount` double NOT NULL,
  `come_from` varchar(20) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cow_sales`
--

INSERT INTO `cow_sales` (`id`, `invoice_no`, `date`, `RefNo`, `RefDate`, `customer_name`, `customer_phone`, `customer_email`, `address`, `note`, `animal_type`, `animal_id`, `stall_no`, `image`, `sale_price`, `paid_amount`, `due_amount`, `come_from`, `user`, `created_at`, `updated_at`) VALUES
(1, '210123001', '2021-01-23', NULL, NULL, 'Md Zahid Hassan', '01774439535', 'zahid@gmail.com', 'Rajshahi', 'debona', '2', 'CC-0001', '4', NULL, 45000, 10000, 35000, 'Sales', 'Md Zahidul Islam', '2021-01-23 17:22:09', '2021-01-23 17:39:28'),
(2, '210123001', '2021-01-23', '0001', '2021-01-24', 'Md Zahid Hassan', '01774439535', 'zahid@gmail.com', 'Rajshahi', 'na', '-', '-', '-', NULL, 0, 7000, 23000, 'Due Coll', 'Md Zahidul Islam', '2021-01-23 18:13:27', '2021-01-23 18:23:56'),
(3, '210125002', '2021-01-25', NULL, NULL, 'Md. Rokibul Islam', '01515151525', 'rokibul@gmail.com', 'Dhaka', 'this is new customer', '1', 'C-0001', '4', NULL, 150000, 50000, 100000, 'Sales', 'Md. Rokibul Islam', '2021-01-24 18:34:58', '2021-01-25 12:45:23'),
(4, '210125003', '2021-01-25', NULL, NULL, 'Md Jibon Tori', '01774439535', 'jibon@gmail.com', 'Sirajganj', NULL, '2', 'CC-0004', '1', NULL, 32700, 2700, 30000, 'Sales', 'Md Zahidul Islam', '2021-01-24 19:36:21', '2021-01-24 19:36:21'),
(5, '210125002', '2021-01-25', '0001', '2021-01-25', 'Md. Rokibul Islam', '01515151525', 'rokibul@gmail.com', 'Dhaka', 'Payment not clear', '-', '-', '-', NULL, 0, 20000, 80000, 'Due Coll', 'Md. Rokibul Islam', '2021-01-25 12:47:17', '2021-01-25 12:47:17'),
(6, '210123001', '2021-01-23', '0002', '2021-02-03', 'Md Zahid Hassan', '01774439535', 'zahid@gmail.com', 'Rajshahi', NULL, '-', '-', '-', NULL, 0, 5000, 23000, 'Due Coll', 'Md Zahidul Islam', '2021-02-02 18:10:16', '2021-02-02 18:10:16'),
(7, '210123001', '2021-01-23', '0003', '2021-02-10', 'Md Zahid Hassan', '01774439535', 'zahid@gmail.com', 'Rajshahi', 'N/A', '-', '-', '-', NULL, 0, 10000, 13000, 'Due Coll', 'Md Zahidul Islam', '2021-02-09 19:02:47', '2021-02-09 19:02:47'),
(8, '210210004', '2021-02-10', NULL, NULL, 'Shamim Mahmud', '010720005200', 'shamim.mahmud@yahoo.com', 'Chattagram', 'New Customer', '2', 'CC-0009', '4', NULL, 75000, 25000, 50000, 'Sales', 'Md. Rokibul Islam', '2021-02-10 11:07:57', '2021-02-10 11:07:57'),
(9, '210210004', '2021-02-10', '0001', '2021-02-10', 'Shamim Mahmud', '010720005200', 'shamim.mahmud@yahoo.com', 'Chattagram', 'Dues Clear', '-', '-', '-', NULL, 0, 50000, 0, 'Due Coll', 'Md. Rokibul Islam', '2021-02-10 11:09:47', '2021-02-10 11:09:47'),
(10, '210210005', '2021-02-10', NULL, NULL, 'Md Nai Khan', '01613987515', 'naikhan@gmail.com', 'Sirajganj', 'nonotoe', '1', 'C-0007', '3', NULL, 120000, 100000, 20000, 'Sales', 'Md Zahidul Islam', '2021-02-10 16:51:28', '2021-02-10 16:51:28'),
(11, '210221006', '2021-02-21', NULL, NULL, 'Md Rahim Shekh', '01798657485', 'rahim@gmail.com', 'Noakhali', NULL, '1', 'C-0002', '3', NULL, 150000, 50000, 100000, 'Sales', 'Md Zahidul Islam', '2021-02-21 16:40:07', '2021-02-21 16:40:07'),
(12, '210125002', '2021-02-21', '0001', '2021-02-21', 'Md. Rokibul Islam', '01515151525', 'rokibul@gmail.com', 'Dhaka', NULL, '-', '-', '-', NULL, 0, 80000, 0, 'Due Coll', 'Md Zahidul Islam', '2021-02-21 16:40:36', '2021-02-21 16:40:36'),
(13, '210226007', '2021-02-26', NULL, '2021-02-26', 'Md Jashim Uddin', '01571698534', 'jashimuddin@gmail.com', 'Khulna', NULL, '2', 'CC-0008', '5', NULL, 70000, 50000, 20000, 'Sales', 'Md Zahidul Islam', '2021-02-26 17:23:32', '2021-02-26 17:23:32'),
(14, '210123001', '2021-02-26', '0001', '2021-02-26', 'Md Zahid Hassan', '01774439535', 'zahid@gmail.com', 'Rajshahi', 'nai', '-', '-', '-', NULL, 0, 13000, 0, 'Due Coll', 'Md Zahidul Islam', '2021-02-26 17:25:38', '2021-02-26 17:25:38'),
(15, '210210005', '2021-02-26', '0002', '2021-02-26', 'Md Nai Khan', '01613987515', 'naikhan@gmail.com', 'Sirajganj', NULL, '-', '-', '-', NULL, 0, 20000, 0, 'Due Coll', 'Md Zahidul Islam', '2021-02-26 17:25:52', '2021-02-26 17:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `details`, `created_at`, `updated_at`) VALUES
(2, 'Managing Director', 'Managing Director', '2021-01-08 08:41:40', '2021-01-08 10:27:49'),
(3, 'Executive', 'Office Executive', '2021-01-08 08:42:17', '2021-01-11 13:23:35'),
(4, 'Chairman', 'This is highest Designation of our Organization', '2021-02-10 11:25:24', '2021-02-10 11:25:24'),
(5, 'CEO', 'Chief Executive Officer', '2021-02-10 11:26:12', '2021-02-10 11:26:12'),
(6, 'HR', 'Human Resource Department', '2021-02-10 11:27:02', '2021-02-10 11:27:02'),
(7, 'Operator', 'Operate all Entry level works', '2021-02-10 11:28:50', '2021-02-10 11:28:50');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary`
--

CREATE TABLE `employee_salary` (
  `id` bigint(20) NOT NULL,
  `employeeId` varchar(20) DEFAULT NULL,
  `payment_no` varchar(20) NOT NULL,
  `payment_date` date DEFAULT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(10) NOT NULL,
  `employee_name` varchar(50) NOT NULL,
  `monthly_salary` double NOT NULL,
  `note` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_salary`
--

INSERT INTO `employee_salary` (`id`, `employeeId`, `payment_no`, `payment_date`, `month`, `year`, `employee_name`, `monthly_salary`, `note`, `created_at`, `updated_at`) VALUES
(3, '21010009', 'S2101000', '2020-11-07', 'September', '2020', '8', 19500, 'sdaf', '2021-01-10 20:09:06', '2021-01-11 14:58:48'),
(4, '21010002', '2101003', '2021-01-16', 'January', '2020', '13', 20000, '10asdf', '2021-01-10 20:30:21', '2021-01-16 11:33:46'),
(5, '21010012', '2101004', '2021-01-11', 'February', '2020', '6', 10000, '21', '2021-01-10 20:35:42', '2021-01-10 20:35:42'),
(7, '21010013', '2101006', '2021-01-13', 'January', '2020', '10', 5000, 'For the Month of January-2021', '2021-01-10 20:40:10', '2021-01-13 12:04:37'),
(8, '21010014', '2101007', '2021-01-25', 'January', '2021', '16', 15000, 'Salary Advance Paid for the month of January-2021', '2021-01-25 11:04:53', '2021-01-25 11:04:53'),
(9, '21010015', '2101008', '2021-01-10', 'December', '2020', '16', 15000, 'has;dklf', '2021-01-26 17:12:11', '2021-01-26 17:12:11'),
(10, NULL, '2102009', '2021-02-04', 'January', '2021', '1', 19500, 'For Employee salary Purpose', '2021-02-07 16:28:01', '2021-02-07 16:28:01'),
(11, NULL, '2102010', '2021-02-05', 'January', '2021', '2', 10, 'Debona', '2021-02-07 16:28:47', '2021-02-07 16:28:47'),
(12, NULL, '2102011', '2021-02-10', 'January', '2021', '17', 30000, 'For the Month of January 2021', '2021-02-10 09:50:23', '2021-02-10 09:50:23'),
(13, '21020017', '2102012', '0000-00-00', 'January', '2021', '18', 45000, 'asdf', '2021-02-10 17:48:20', '2021-02-10 17:48:20'),
(14, '21020016', '2102013', '2021-02-10', 'January', '2021', '17', 30000, 'asdfasdf', '2021-02-10 17:50:01', '2021-02-10 17:50:01'),
(15, '21010000', '2102014', '2021-02-26', 'January', '2021', '1', 19500, '19500', '2021-02-26 17:44:48', '2021-02-26 17:44:48'),
(16, '21010003', '2102015', '2021-02-26', 'January', '2021', '3', 19500, '19500', '2021-02-26 17:45:15', '2021-02-26 17:45:15'),
(17, '21010005', '2102016', '2021-02-26', 'January', '2021', '6', 10000, '10000', '2021-02-26 17:45:34', '2021-02-26 17:45:34'),
(18, '21010012', '2102017', '2021-02-26', 'January', '2021', '13', 20000, '20000', '2021-02-26 17:45:50', '2021-02-26 17:45:50'),
(19, '21010013', '2102018', '2021-02-26', 'January', '2021', '14', 18000, '18000', '2021-02-26 17:46:07', '2021-02-26 17:46:07'),
(20, '21020018', '2102019', '2021-02-26', 'January', '2021', '19', 10000, '10000', '2021-02-26 17:46:41', '2021-02-26 17:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) NOT NULL,
  `invoice_no` varchar(15) NOT NULL,
  `invoice_date` date NOT NULL DEFAULT current_timestamp(),
  `purpose` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `details` text DEFAULT NULL,
  `total_amount` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `invoice_no`, `invoice_date`, `purpose`, `date`, `details`, `total_amount`, `created_at`, `updated_at`) VALUES
(2, 'E-003', '2021-01-10', '2', '2021-01-04', 'Mobile Bill', 500, '2021-01-09 19:40:06', '2021-01-18 17:17:23'),
(3, 'E-003', '2021-01-11', '1', '2021-01-07', 'For the month of January 2021', 5000, '2021-01-10 18:30:25', '2021-01-15 11:57:01'),
(4, 'E-003', '2021-01-13', '4', '2021-01-13', 'For the Month of January 2021', 10000, '2021-01-13 13:11:34', '2021-01-24 17:19:37'),
(6, 'E-004', '2021-01-15', '2', '2021-09-02', 'For the month of December 2021', 1000, '2021-01-15 12:06:27', '2021-01-15 12:06:38'),
(8, 'E-004', '2021-01-15', '3', '2021-01-12', 'asdfasdfasdfsadfsadf', 2000, '2021-01-15 12:08:57', '2021-01-15 12:08:57'),
(9, 'E-004', '2021-01-15', '2', '2021-01-14', 'for the month of Janunary 2021', 1000, '2021-01-15 12:10:22', '2021-01-15 12:10:22'),
(10, 'E-010', '2021-02-03', '1', '2021-02-18', 'For Md. Zahidul Islam', 15000, '2021-02-02 18:12:42', '2021-02-02 18:12:42'),
(11, 'E-011', '2021-02-10', '1', '2021-02-21', 'For the month of januray', 15000, '2021-02-09 19:15:26', '2021-02-21 16:41:26'),
(12, 'E-012', '2021-02-10', '2', '2021-02-10', 'asdfasdfsdf', 2000, '2021-02-09 19:19:46', '2021-02-09 19:24:07'),
(13, 'E-013', '2021-02-10', '3', '2021-05-02', 'nai', 1500, '2021-02-09 19:25:28', '2021-02-09 19:25:28'),
(14, 'E-014', '2021-02-10', '4', '2021-02-10', 'For the month of December -2020', 2000, '2021-02-10 16:49:18', '2021-02-10 16:49:18'),
(15, 'E-015', '2021-02-21', '4', '2021-02-21', 'asdf', 1500, '2021-02-21 16:42:19', '2021-02-21 16:42:19'),
(16, 'E-016', '2021-02-21', '3', '2021-02-21', 'sadsdas', 15000, '2021-02-21 16:43:27', '2021-02-21 16:43:27'),
(17, 'E-017', '2021-02-26', '2', '2021-02-26', 'For the month of February 2021', 10000, '2021-02-26 17:28:39', '2021-02-26 17:28:39'),
(18, 'E-018', '2021-02-26', '3', '2021-02-26', NULL, 2000, '2021-02-26 17:29:29', '2021-02-26 17:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `expens_purposes`
--

CREATE TABLE `expens_purposes` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expens_purposes`
--

INSERT INTO `expens_purposes` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Salary', '1', '2021-01-09 19:37:47', '2021-01-09 19:37:47'),
(2, 'Moblie Bill', '1', '2021-01-09 19:38:43', '2021-01-09 19:38:43'),
(3, 'Entertainment', '1', '2021-01-13 13:12:51', '2021-01-15 12:39:52'),
(4, 'Internet Bill', '1', '2021-01-15 12:12:19', '2021-01-15 12:12:19'),
(6, 'Conveyence Bill', '1', '2021-02-25 17:30:31', '2021-02-25 17:30:31');

-- --------------------------------------------------------

--
-- Table structure for table `feed_ledger`
--

CREATE TABLE `feed_ledger` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `feedId` bigint(20) UNSIGNED NOT NULL,
  `food_item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedingTime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feed_ledger`
--

INSERT INTO `feed_ledger` (`id`, `feedId`, `food_item`, `item_quantity`, `unit`, `feedingTime`, `created_at`, `updated_at`) VALUES
(4, 2, 'salt', '10', 'kg', '10', '2021-01-21 21:46:02', '2021-01-21 21:46:02'),
(5, 2, 'water', '10', 'kg', '10', '2021-01-21 21:46:02', '2021-01-21 21:46:02'),
(6, 2, 'grass', '10', 'ltr', '10', '2021-01-21 21:46:03', '2021-01-21 21:46:03'),
(7, 3, 'grass', '3', 'kg', '2', '2021-01-25 11:38:53', '2021-02-09 15:48:41'),
(8, 3, 'salt', '32', 'gm', '23', '2021-01-25 11:38:53', '2021-02-09 15:50:05'),
(42, 10, 'grass', '3', 'kg', '2', '2021-02-09 16:16:57', '2021-02-09 16:16:57'),
(43, 10, 'salt', '121', 'gm', '1', '2021-02-09 16:16:58', '2021-02-09 16:16:58'),
(44, 10, 'water', '12', 'ltr', '3', '2021-02-09 16:16:58', '2021-02-09 16:16:58'),
(45, 1, 'grass', '3', 'kg', '09.00 AM', '2021-02-10 10:51:29', '2021-02-10 10:51:29'),
(46, 1, 'salt', '50', 'gm', '09.00 AM', '2021-02-10 10:51:29', '2021-02-10 10:51:29'),
(47, 1, 'water', '2', 'ltr', '09.30 AM', '2021-02-10 10:51:29', '2021-02-10 10:51:29'),
(53, 12, 'grass', '20', 'kg', '5', '2021-02-25 16:59:54', '2021-02-25 16:59:54'),
(54, 12, 'salt', '300', 'gm', '3.00 PM', '2021-02-25 16:59:54', '2021-02-25 16:59:54'),
(55, 12, 'water', '7', 'ltr', '4.00 PM', '2021-02-25 16:59:54', '2021-02-25 16:59:54'),
(56, 11, 'water', '5', 'ltr', '11', '2021-02-25 17:00:11', '2021-02-25 17:00:11'),
(57, 11, 'salt', '250', 'gm', '10', '2021-02-25 17:00:11', '2021-02-25 17:00:11'),
(58, 11, 'grass', '5', 'kg', '10', '2021-02-25 17:00:11', '2021-02-25 17:00:11'),
(59, 8, 'grass', '2', 'kg', '2', '2021-02-25 17:00:30', '2021-02-25 17:00:30'),
(60, 5, 'grass', '2', 'kg', '10', '2021-02-25 17:00:59', '2021-02-25 17:00:59'),
(61, 5, 'salt', '30', 'gm', '10', '2021-02-25 17:00:59', '2021-02-25 17:00:59'),
(62, 5, 'water', '1', 'ltr', '10', '2021-02-25 17:00:59', '2021-02-25 17:00:59');

-- --------------------------------------------------------

--
-- Table structure for table `food_items`
--

CREATE TABLE `food_items` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_items`
--

INSERT INTO `food_items` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Water', '1', '2021-01-08 00:11:25', '2021-01-08 00:11:25'),
(3, 'Salt', '1', '2021-01-08 00:11:31', '2021-01-08 00:11:31'),
(4, 'Grass', '1', '2021-01-08 00:11:48', '2021-01-08 00:11:48');

-- --------------------------------------------------------

--
-- Table structure for table `food_units`
--

CREATE TABLE `food_units` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_units`
--

INSERT INTO `food_units` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Liter', '1', '2021-01-08 00:08:30', '2021-01-08 00:08:30'),
(4, 'Kg', '1', '2021-01-08 00:09:38', '2021-01-08 00:09:38'),
(5, 'Gram', '1', '2021-01-08 00:10:31', '2021-01-08 00:10:31');

-- --------------------------------------------------------

--
-- Table structure for table `manage_cow_pregnancy`
--

CREATE TABLE `manage_cow_pregnancy` (
  `id` bigint(20) NOT NULL,
  `stall_no` varchar(50) NOT NULL,
  `animal_id` varchar(50) NOT NULL,
  `pregnancy_type` varchar(20) NOT NULL,
  `semen_type` varchar(50) NOT NULL,
  `semen_push_date` date NOT NULL,
  `pregnancy_start_date` date NOT NULL,
  `semen_cost` double NOT NULL,
  `other_cost` double NOT NULL,
  `note` varchar(500) NOT NULL,
  `approximate_dalivery_date` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manage_cow_pregnancy`
--

INSERT INTO `manage_cow_pregnancy` (`id`, `stall_no`, `animal_id`, `pregnancy_type`, `semen_type`, `semen_push_date`, `pregnancy_start_date`, `semen_cost`, `other_cost`, `note`, `approximate_dalivery_date`, `created_at`, `updated_at`) VALUES
(2, '1', 'C-0009', 'By Collected Semen', '2', '2020-12-02', '2020-12-01', 2000, 1000, 'It is one of the best cow in this firm', '2021-11-09', '2021-01-09 19:20:09', '2021-02-01 19:00:41'),
(4, '2', 'C-0009', 'Automatic', '3', '2020-11-07', '2020-11-15', 1500, 500, 'You have to seen all time', '2021-08-26', '2021-01-13 17:46:34', '2021-01-13 17:46:34'),
(5, '3', 'C-0004', 'Automatic', '3', '2020-01-12', '2021-01-01', 2000, 1000, 'kjugbevr', '2021-12-10', '2021-02-01 18:21:03', '2021-02-01 18:25:53'),
(6, '1', 'C-0009', 'Automatic', '3', '2020-10-31', '2020-10-31', 2000, 1000, 'asdf', '2021-11-08', '2021-02-01 18:22:45', '2021-02-09 18:28:31');

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
(4, '2020_08_31_124815_create_tbl_menus_table', 1),
(7, '2020_08_31_151826_create_tbl_menu_accesses_table', 2),
(8, '2020_09_02_123246_create_sliders_table', 3),
(9, '2020_09_03_164129_create_bed_information_table', 4),
(11, '2020_09_03_164258_create_chart_of_accs_table', 5),
(12, '2020_09_03_163418_create_clinical_charts_table', 6),
(14, '2020_09_03_164213_create_dr_infos_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `milkparlors`
--

CREATE TABLE `milkparlors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `collected_from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `collected_date` date DEFAULT NULL,
  `stall_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `animal_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `liter` double NOT NULL,
  `price_liter` double NOT NULL,
  `total_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `milkparlors`
--

INSERT INTO `milkparlors` (`id`, `account_no`, `collected_from`, `collected_date`, `stall_no`, `animal_id`, `liter`, `price_liter`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 'C21010000', 'Md Rokibul Islam', '2021-01-01', '1', 'C-0009', 50, 40, 2000, '2021-01-20 20:36:28', '2021-01-29 21:02:11'),
(2, 'C21010001', 'Md Rokibul Islam', '2021-01-01', '1', 'C-0012', 20, 40, 800, '2021-01-20 20:36:47', '2021-01-20 20:36:47'),
(3, 'C21010002', 'Md Abul Bashar', '2021-01-01', '3', 'C-0002', 10, 40, 400, '2021-01-20 20:37:02', '2021-01-20 20:37:02'),
(4, 'C21010003', 'Md Abul Bashar', '2021-01-04', '4', 'C-0001', 20, 40, 800, '2021-01-21 18:06:16', '2021-01-21 18:06:16'),
(5, 'C21010004', 'Milon', '2021-01-24', '3', 'C-0011', 20, 45, 900, '2021-01-25 11:08:53', '2021-01-25 11:08:53'),
(6, 'C21010005', 'Md Ziaul Hoque', '2021-01-20', '3', 'C-0007', 30, 40, 1200, '2021-01-28 18:03:38', '2021-01-28 18:03:38'),
(7, 'C21010006', 'Md Ziaul Hoque', '2021-01-20', '3', 'C-0002', 20, 40, 800, '2021-01-28 18:04:05', '2021-01-28 18:04:05'),
(8, 'C21010007', 'Md Ziaul Hoque', '2021-01-20', '3', 'C-0011', 15, 40, 600, '2021-01-28 18:04:26', '2021-01-28 18:04:26'),
(9, 'C21010008', 'Janina', '2021-01-21', '1', 'C-0009', 20, 40, 800, '2021-01-28 18:31:54', '2021-01-28 18:31:54'),
(10, 'C21010009', 'Md Ziaul Hoque', '2021-01-22', '1', 'C-0009', 20, 40, 800, '2021-01-29 20:45:26', '2021-01-29 20:45:26'),
(11, 'C21010010', 'Md Ziaul Hoque', '2021-01-21', '1', 'C-0012', 15, 40, 600, '2021-01-29 20:45:41', '2021-01-29 20:45:41'),
(12, 'C21020011', 'Md Zohir Rayhan', '2021-02-03', '1', 'C-0009', 20, 40, 800, '2021-02-02 18:26:50', '2021-02-02 18:26:50'),
(13, 'C21020012', 'Md Robiul Chowdhury', '2021-02-06', '1', 'C-0009', 35, 37, 1295, '2021-02-05 18:09:12', '2021-02-05 18:09:12'),
(14, 'C21020013', 'Md Ziaul Hoque', '2021-02-06', '3', 'C-0011', 15, 39, 585, '2021-02-05 19:22:32', '2021-02-05 19:22:32'),
(15, 'C21020014', 'Md Robiul Chowdhury', '2021-02-06', '3', 'C-0011', 12, 36, 432, '2021-02-05 20:08:34', '2021-02-05 20:08:34'),
(16, 'C21020015', 'Hassan', '2021-02-10', '1', 'C-0009', 40, 55, 2200, '2021-02-10 09:52:20', '2021-02-10 09:52:20'),
(17, 'C21020016', 'Md Rohim Uddin', '2021-02-21', '1', 'C-0009', 15, 45, 675, '2021-02-21 16:36:35', '2021-02-21 16:36:35'),
(18, 'C21020017', 'Md Rohim Uddin', '2021-02-21', '3', 'C-0002', 10, 45, 450, '2021-02-21 16:36:56', '2021-02-21 16:36:56'),
(19, 'C21020018', 'Md Rohim Uddin', '2021-02-21', '3', 'C-0004', 20, 45, 900, '2021-02-21 16:37:13', '2021-02-21 16:37:13'),
(20, 'C21020019', 'Md Rohim Uddin', '2021-02-26', '1', 'C-0009', 15, 50, 750, '2021-02-25 16:39:32', '2021-02-25 16:39:32'),
(21, 'C21020020', 'Md Rohim Uddin', '2021-02-26', '3', 'C-0002', 20, 50, 1000, '2021-02-25 16:39:59', '2021-02-25 16:39:59'),
(22, 'C21020021', 'Md Rohim Uddin', '2021-02-26', '3', 'C-0004', 17, 50, 850, '2021-02-25 16:40:17', '2021-02-25 16:40:17'),
(23, 'C21020022', 'Md Rohim Uddin', '2021-02-26', '3', 'C-0007', 10, 50, 500, '2021-02-25 16:40:38', '2021-02-25 16:40:38');

-- --------------------------------------------------------

--
-- Table structure for table `milk_ledger`
--

CREATE TABLE `milk_ledger` (
  `id` bigint(20) NOT NULL,
  `mpId` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `account_no` varchar(20) DEFAULT NULL,
  `referance_no` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `litre_collect` double NOT NULL,
  `litre_sale` double NOT NULL,
  `price_collect` double NOT NULL,
  `price_sale` double NOT NULL,
  `come_from` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `milk_ledger`
--

INSERT INTO `milk_ledger` (`id`, `mpId`, `date`, `account_no`, `referance_no`, `name`, `litre_collect`, `litre_sale`, `price_collect`, `price_sale`, `come_from`, `created_at`, `updated_at`) VALUES
(2, 2, '2021-02-05', '21010001', 'C21010001', 'Md Rokibul Islam', 20, 0, 40, 0, 'Collected', '2021-01-20 20:36:47', NULL),
(3, 3, '2021-02-05', '21010002', 'C21010002', 'Md Abul Bashar', 10, 0, 40, 0, 'Collected', '2021-01-20 20:37:02', NULL),
(4, NULL, '2021-02-05', '21010000', 'S21010001', 'Md Zahid Hassan', 0, 5, 0, 40, 'Sales', '2021-01-20 20:39:16', NULL),
(5, NULL, '2021-02-05', '21010000', 'S21010005', 'Md Zahid Hassan', 0, 5, 0, 40, 'Sales', '2021-01-20 20:48:48', NULL),
(6, NULL, '2021-02-05', '21010001', 'S21010007', 'Md Zahid Hassan', 0, 3, 0, 40, 'Sales', '2021-01-20 20:49:42', NULL),
(7, 4, '2021-02-05', '21010003', 'C21010003', 'Md Abul Bashar', 20, 0, 40, 0, 'Collected', '2021-01-21 18:06:16', NULL),
(8, 5, '2021-02-05', '21010004', 'C21010004', 'Milon', 20, 0, 45, 0, 'Collected', '2021-01-25 11:08:53', NULL),
(9, NULL, '2021-02-05', '21010004', 'S21010010', 'Tarikul Islam', 0, 10, 0, 45, 'Sales', '2021-01-25 11:11:21', NULL),
(10, NULL, '2021-02-05', '21010000', 'S21010012', 'Md Ziaul Hoque', 0, 20, 0, 40, 'Sales', '2021-01-26 20:20:09', NULL),
(11, 6, '2021-02-05', '21010005', 'C21010005', 'Md Ziaul Hoque', 30, 0, 40, 0, 'Collected', '2021-01-28 18:03:38', NULL),
(12, 7, '2021-02-05', '21010006', 'C21010006', 'Md Ziaul Hoque', 20, 0, 40, 0, 'Collected', '2021-01-28 18:04:05', NULL),
(13, 8, '2021-02-05', '21010007', 'C21010007', 'Md Ziaul Hoque', 15, 0, 40, 0, 'Collected', '2021-01-28 18:04:26', NULL),
(14, NULL, '2021-02-05', '21010000', 'S21010013', 'Md Zakir Hossain', 0, 20, 0, 40, 'Sales', '2021-01-28 18:06:02', NULL),
(17, 9, '2021-02-05', '21010008', 'C21010008', 'Janina', 20, 0, 40, 0, 'Collected', '2021-01-28 18:31:54', NULL),
(18, 10, '2021-02-05', '21010009', 'C21010009', 'Md Ziaul Hoque', 20, 0, 40, 0, 'Collected', '2021-01-29 20:45:26', NULL),
(19, 11, '2021-02-05', '21010010', 'C21010010', 'Md Ziaul Hoque', 15, 0, 40, 0, 'Collected', '2021-01-29 20:45:41', NULL),
(22, 1, '2021-02-05', '21010000', 'C21010000', 'Md Rokibul Islam', 50, 0, 40, 0, 'Collected', '2021-01-29 21:02:11', NULL),
(23, NULL, '2021-02-05', '21010001', 'S21010024', 'Md Nurul Islam', 0, 17, 0, 40, 'Sales', '2021-01-29 21:27:50', NULL),
(24, NULL, '2021-02-05', '21010002', 'S21010029', 'Md Salim', 0, 5, 0, 40, 'Sales', '2021-01-31 15:54:33', NULL),
(25, NULL, '2021-02-05', '21010002', 'S21010030', 'Md Rakib', 0, 10, 0, 40, 'Sales', '2021-01-31 16:07:21', NULL),
(26, 12, '2021-02-05', '21020011', 'C21020011', 'Md Zohir Rayhan', 20, 0, 40, 0, 'Collected', '2021-02-02 18:26:50', NULL),
(27, NULL, '2021-02-05', '21010003', 'S21020031', 'Md Nojrul Islam', 0, 10, 0, 40, 'Sales', '2021-02-02 18:34:06', NULL),
(28, 13, '2021-02-06', '21020012', 'C21020012', 'Md Robiul Chowdhury', 35, 0, 37, 0, 'Collected', '2021-02-05 18:09:12', NULL),
(29, NULL, '2021-02-06', '21010003', 'S21020032', 'Md. Monahar Badshah', 0, 10, 0, 40, 'Sales', '2021-02-05 18:26:35', NULL),
(30, 14, '2021-02-06', '21020013', 'C21020013', 'Md Ziaul Hoque', 15, 0, 39, 0, 'Collected', '2021-02-05 19:22:32', NULL),
(31, NULL, '2021-02-06', '21010004', 'S21020033', 'Md Robullah Chowdhury', 0, 7, 0, 45, 'Sales', '2021-02-05 19:23:41', NULL),
(33, NULL, '2021-02-06', '21010004', 'S21020035', 'Md Zahid Hassan', 0, 3, 0, 45, 'Sales', '2021-02-05 19:41:39', NULL),
(34, 15, '2021-02-06', '21020014', 'C21020014', 'Md Robiul Chowdhury', 12, 0, 36, 0, 'Collected', '2021-02-05 20:08:34', NULL),
(35, NULL, '2021-02-06', '21010005', 'S21020038', 'Md Zahid Hassan', 0, 13, 0, 40, 'Sales', '2021-02-05 20:09:38', NULL),
(36, 16, '2021-02-10', '21020015', 'C21020015', 'Hassan', 40, 0, 55, 0, 'Collected', '2021-02-10 09:52:20', NULL),
(37, NULL, '2021-02-10', '21010006', 'S21020040', 'ROKIBUL ISLAM', 0, 20, 0, 40, 'Sales', '2021-02-10 10:04:22', NULL),
(38, 17, '2021-02-21', '21020016', 'C21020016', 'Md Rohim Uddin', 15, 0, 45, 0, 'Collected', '2021-02-21 16:36:35', NULL),
(39, 18, '2021-02-21', '21020017', 'C21020017', 'Md Rohim Uddin', 10, 0, 45, 0, 'Collected', '2021-02-21 16:36:56', NULL),
(40, 19, '2021-02-21', '21020018', 'C21020018', 'Md Rohim Uddin', 20, 0, 45, 0, 'Collected', '2021-02-21 16:37:13', NULL),
(41, NULL, '2021-02-21', '21010005', 'S21020042', 'Md Masud Rana', 0, 17, 0, 40, 'Sales', '2021-02-21 16:37:54', NULL),
(42, NULL, '2021-02-21', '21010007', 'S21020043', 'Md Karim Ali', 0, 15, 0, 40, 'Sales', '2021-02-21 16:38:32', NULL),
(43, 20, '2021-02-26', '21020019', 'C21020019', 'Md Rohim Uddin', 15, 0, 50, 0, 'Collected', '2021-02-25 16:39:32', NULL),
(44, 21, '2021-02-26', '21020020', 'C21020020', 'Md Rohim Uddin', 20, 0, 50, 0, 'Collected', '2021-02-25 16:39:59', NULL),
(45, 22, '2021-02-26', '21020021', 'C21020021', 'Md Rohim Uddin', 17, 0, 50, 0, 'Collected', '2021-02-25 16:40:17', NULL),
(46, 23, '2021-02-26', '21020022', 'C21020022', 'Md Rohim Uddin', 10, 0, 50, 0, 'Collected', '2021-02-25 16:40:38', NULL),
(47, NULL, '2021-02-26', '21010008', 'S21020047', 'Md Masud Rana', 0, 20, 0, 40, 'Sales', '2021-02-25 16:47:41', NULL),
(48, NULL, '2021-02-26', '21010009', 'S21020048', 'Md Karim Ali', 0, 20, 0, 40, 'Sales', '2021-02-25 16:48:33', NULL),
(49, NULL, '2021-02-26', '21010010', 'S21020049', 'Md Sujon Mia', 0, 15, 0, 40, 'Sales', '2021-02-25 16:51:01', NULL),
(50, NULL, '2021-02-26', '21020011', 'S21020054', 'Md Rahim', 0, 10, 0, 40, 'Sales', '2021-02-26 17:21:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `monitoring_services`
--

CREATE TABLE `monitoring_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monitoring_services`
--

INSERT INTO `monitoring_services` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Monitoring', '2021-01-08 00:13:10', '2021-01-08 00:13:10'),
(2, 'Weekly Tika', '2021-01-08 00:14:50', '2021-01-08 00:14:50'),
(3, 'Monthly Tika', '2021-01-08 00:15:03', '2021-01-08 00:15:03'),
(4, 'Half Yearly', '2021-01-11 13:51:47', '2021-01-11 13:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `monitor_ledger`
--

CREATE TABLE `monitor_ledger` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `monitorId` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `result` varchar(50) NOT NULL,
  `time` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monitor_ledger`
--

INSERT INTO `monitor_ledger` (`id`, `monitorId`, `service_name`, `result`, `time`, `created_at`, `updated_at`) VALUES
(1, 1, 'Monitoring', 'Done', '11.30', '2021-01-22 16:52:42', '2021-01-22 16:52:42'),
(2, 1, 'Weekly Tika', 'Done', '05.00 PM', '2021-01-22 16:52:42', '2021-02-01 17:58:22'),
(3, 2, 'Monitoring', 'Done', '15', '2021-02-01 17:50:34', '2021-02-09 18:13:50'),
(4, 2, 'Weekly Tika', 'Done', '05.00 PM', '2021-02-01 17:50:34', '2021-02-01 17:50:34'),
(5, 3, 'Monitoring', 'Done', '10', '2021-02-09 17:58:31', '2021-02-09 17:58:31'),
(6, 3, 'Weekly Tika', 'Done', '10', '2021-02-09 17:58:31', '2021-02-09 17:58:31'),
(7, 4, 'Weekly Tika', 'Yes', '02.00 PM', '2021-02-10 11:01:02', '2021-02-10 11:01:02'),
(8, 4, 'Monthly Tika', 'Yes', '02.00 PM', '2021-02-10 11:01:02', '2021-02-10 11:01:02'),
(9, 4, 'Half Yearly', 'No', '02.00 PM', '2021-02-10 11:01:02', '2021-02-10 11:01:02'),
(10, 5, 'Monitoring', 'Done', '10.00 AM', '2021-02-25 17:06:49', '2021-02-25 17:06:49'),
(11, 6, 'Monitoring', 'Done', '11.00 AM', '2021-02-25 17:07:24', '2021-02-25 17:07:24');

-- --------------------------------------------------------

--
-- Table structure for table `passworddetails`
--

CREATE TABLE `passworddetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departmentName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actionName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controllerName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iconName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `passworddetails`
--

INSERT INTO `passworddetails` (`id`, `userName`, `password`, `departmentName`, `actionName`, `controllerName`, `pno`, `iconName`, `created_at`, `updated_at`) VALUES
(1, 'Zahid', '12345', NULL, NULL, NULL, '1', NULL, NULL, NULL),
(2, 'Zahidul', '123456', NULL, NULL, NULL, '1', NULL, NULL, NULL),
(3, 'Milton', '123', NULL, NULL, NULL, '1', NULL, NULL, NULL),
(4, 'Zahidul', '1234', NULL, NULL, NULL, '1', NULL, NULL, NULL),
(5, 'Ziaul', '12345', NULL, NULL, NULL, '1', NULL, NULL, NULL),
(6, 'Bashar', '123', NULL, NULL, NULL, '1', NULL, NULL, NULL),
(7, 'Rokibul', '123', NULL, NULL, NULL, '1', NULL, NULL, NULL);

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
-- Table structure for table `routine_monitor`
--

CREATE TABLE `routine_monitor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stall_no` varchar(50) NOT NULL,
  `animal_id` varchar(50) NOT NULL,
  `weight` double DEFAULT NULL,
  `height` double DEFAULT NULL,
  `milk_per_day` double DEFAULT NULL,
  `monitoring_date` date NOT NULL,
  `note` varchar(500) DEFAULT NULL,
  `reporter` varchar(50) DEFAULT NULL,
  `image` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `routine_monitor`
--

INSERT INTO `routine_monitor` (`id`, `stall_no`, `animal_id`, `weight`, `height`, `milk_per_day`, `monitoring_date`, `note`, `reporter`, `image`, `created_at`, `updated_at`) VALUES
(1, '1', 'C-0005', 120, 50, 10, '2021-01-01', 'asdfsdf', 'Md Zahidul Islam', 'N/A', '2021-01-22 16:52:42', '2021-01-22 16:52:42'),
(2, '5', 'CC-0005', 45, 45, NULL, '2021-01-02', 'rear', 'Md Zahidul Islam', 'frontend/images/monitor1690516641236034.jpg', '2021-02-01 17:50:34', '2021-02-01 17:58:22'),
(3, '1', 'C-0009', 120, 46, 12, '2021-01-02', 'nai', 'Md Zahidul Islam', 'frontend/images/monitor1691242390384360.jfif', '2021-02-09 17:58:31', '2021-02-09 18:13:50'),
(4, '5', 'CC-0006', 52, 52, NULL, '2021-10-02', 'Good Condition', 'Md. Rokibul Islam', 'N/A', '2021-02-10 11:01:01', '2021-02-10 11:01:01'),
(5, '1', 'C-0009', 120, 47, NULL, '0000-00-00', NULL, 'Md Zahidul Islam', 'N/A', '2021-02-25 17:06:49', '2021-02-25 17:06:49'),
(6, '2', 'C-0006', 112, 47, NULL, '0000-00-00', NULL, 'Md Zahidul Islam', 'N/A', '2021-02-25 17:07:24', '2021-02-25 17:07:24');

-- --------------------------------------------------------

--
-- Table structure for table `salemilk`
--

CREATE TABLE `salemilk` (
  `id` bigint(20) NOT NULL,
  `InvoiceNo` varchar(20) DEFAULT NULL,
  `InvoiceDate` date DEFAULT current_timestamp(),
  `AccNo` varchar(50) NOT NULL,
  `RefNo` varchar(20) DEFAULT NULL,
  `RefDate` date DEFAULT current_timestamp(),
  `Name` varchar(50) NOT NULL,
  `MobileNo` varchar(20) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Address` varchar(500) DEFAULT NULL,
  `Litre` double NOT NULL,
  `PriceLitre` double NOT NULL,
  `Total` double NOT NULL,
  `Paid` double NOT NULL,
  `Due` double NOT NULL,
  `come_from` varchar(20) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salemilk`
--

INSERT INTO `salemilk` (`id`, `InvoiceNo`, `InvoiceDate`, `AccNo`, `RefNo`, `RefDate`, `Name`, `MobileNo`, `Email`, `Address`, `Litre`, `PriceLitre`, `Total`, `Paid`, `Due`, `come_from`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'S21010001', '2021-01-02', '21010000', NULL, NULL, 'Md Zahid Hassan', '01518304961', 'zahidulislam0173@gmail.com', 'oppps', 5, 40, 200, 100, 100, NULL, NULL, '2021-01-20 20:39:16', NULL),
(6, 'S21010005', '2021-01-03', '21010000', NULL, NULL, 'Md Zahid Hassan', '01518304961', 'zahidulislam0173@gmail.com', 'ads', 5, 40, 200, 50, 150, NULL, NULL, '2021-01-20 20:48:48', NULL),
(7, 'S21010007', '2021-01-01', '21010001', '0007', '0000-00-00', 'Md Zahid Hassan', '01518304961', 'zahidulislam0173@gmail.com', NULL, 3, 40, 120, 100, 20, NULL, NULL, '2021-01-20 20:49:42', NULL),
(10, 'S21010010', '2021-01-24', '21010004', NULL, '0000-00-00', 'Tarikul Islam', '01500000000', 'tarikul@gmail.com', 'Gazipur', 10, 45, 450, 300, 150, NULL, NULL, '2021-01-25 11:11:21', NULL),
(12, 'S21010012', '2020-12-25', '21010000', '0012', '0000-00-00', 'Md Ziaul Hoque', '01758693625', 'ziaul@gmail.com', 'asdfas', 20, 40, 800, 50, 750, NULL, NULL, '2021-01-26 20:20:09', NULL),
(13, 'S21010013', '2021-01-21', '21010000', NULL, '0000-00-00', 'Md Zakir Hossain', '01774453535', 'zakir@gmail.com', NULL, 20, 40, 800, 300, 500, NULL, NULL, '2021-01-28 18:06:02', NULL),
(19, 'S21010001', '2021-01-02', '21010008', '0017', '2021-01-30', 'Md Zahid Hassan', '01518304961', 'zahidulislam0173@gmail.com', 'oppps', 0, 0, 0, 50, 0, 'Due Coll', NULL, '2021-01-29 18:17:47', '2021-01-29 19:20:11'),
(20, 'S21010005', '2021-01-03', '21010009', '0018', '2021-01-30', 'Md Zahid Hassan', '01518304961', 'zahidulislam0173@gmail.com', 'ads', 0, 0, 0, 30, 0, 'Due Coll', NULL, '2021-01-29 18:20:41', '2021-01-29 18:20:41'),
(21, 'S21010007', '2021-01-01', '21010010', '0019', '2021-01-30', 'Md Zahid Hassan', '01518304961', 'zahidulislam0173@gmail.com', NULL, 0, 0, 0, 20, 0, 'Due Coll', NULL, '2021-01-29 18:23:05', '2021-01-29 18:23:05'),
(23, 'S21010001', '2021-01-02', '21010011', '0020', '2021-01-30', 'Md Zahid Hassan', '01518304961', 'zahidulislam0173@gmail.com', 'oppps', 0, 0, 0, 50, 0, 'Due Coll', NULL, '2021-01-29 19:26:33', '2021-01-29 19:26:33'),
(24, 'S21010024', '2021-01-20', '21010001', '0024', '0000-00-00', 'Md Nurul Islam', '1587478596', 'nurul@gmail.com', NULL, 17, 40, 680, 500, 180, NULL, NULL, '2021-01-29 21:27:50', NULL),
(28, 'S21010005', '2021-01-03', '21010012', '0025', '2021-01-31', 'Md Zahid Hassan', '01518304961', 'zahidulislam0173@gmail.com', 'ads', 0, 0, 0, 120, 0, 'Due Coll', NULL, '2021-01-31 14:45:25', '2021-01-31 14:45:25'),
(29, 'S21010029', '2021-01-23', '21010002', '0029', '0000-00-00', 'Md Salim', '01512326595', 'salim@gmail.com', 'Nai', 5, 40, 200, 50, 150, NULL, NULL, '2021-01-31 15:54:32', NULL),
(30, 'S21010030', '2021-01-25', '21010002', '0030', '0000-00-00', 'Md Rakib', '01554484751', 'rakib@gmail.com', 'Address', 10, 40, 400, 50, 350, 'Sales', NULL, '2021-01-31 16:07:21', NULL),
(31, 'S21020031', '2021-02-03', '21010003', '0031', '0000-00-00', 'Md Nojrul Islam', '01679326584', 'nojrul@gmail.com', 'Nai', 10, 40, 400, 300, 100, 'Sales', NULL, '2021-02-02 18:34:06', NULL),
(32, 'S21020032', '2021-02-06', '21010003', '0032', '2021-02-06', 'Md. Monahar Badshah', '01518965874', 'monaharbadshah@gmail.com', 'It is a matter of joy that there is no qualification doctor in our country', 10, 40, 400, 200, 200, 'Sales', NULL, '2021-02-05 18:26:35', NULL),
(33, 'S21020033', '2021-02-06', '21010004', '0033', '2021-02-06', 'Md Robullah Chowdhury', '01314152426', 'robiullahchowdhury@gmail.com', NULL, 7, 45, 315, 15, 300, 'Sales', NULL, '2021-02-05 19:23:41', NULL),
(34, 'S21010010', '2021-01-24', '21010013', '0034', '2021-02-09', 'Tarikul Islam', '01500000000', 'tarikul@gmail.com', 'Gazipur', 0, 0, 0, 150, 0, 'Due Coll', 'N/A', '2021-02-05 19:24:49', '2021-02-09 15:14:21'),
(36, 'S21020035', '2021-02-06', '21010004', '0035', '2021-02-06', 'Md Zahid Hassan', '01774439535', 'zahidulislam0173@gmail.com', NULL, 3, 45, 135, 100, 35, 'Sales', NULL, '2021-02-05 19:41:39', NULL),
(37, 'S21010012', '2020-12-25', '21010014', '0036', '2021-02-09', 'Md Ziaul Hoque', '01758693625', 'ziaul@gmail.com', 'asdfas', 0, 0, 0, 250, 500, 'Due Coll', NULL, '2021-02-05 20:00:47', '2021-02-09 15:13:44'),
(38, 'S21020038', '2021-02-06', '21010005', '0038', '2021-02-06', 'Md Zahid Hassan', '01512326595', 'zahidhasan0173@gmail.com', NULL, 13, 40, 520, 20, 500, 'Sales', NULL, '2021-02-05 20:09:38', NULL),
(39, 'S21020035', '2021-02-06', '21010015', '0039', '2021-02-06', 'Md Zahid Hassan', '01774439535', 'zahidulislam0173@gmail.com', NULL, 0, 0, 0, 35, 0, 'Due Coll', NULL, '2021-02-05 20:10:13', '2021-02-05 20:10:13'),
(40, 'S21020040', '2021-02-10', '21010006', '0040', '2021-02-10', 'ROKIBUL ISLAM', '01707598070', 'rokibulislam@gmail.com', 'Khilgaon', 20, 40, 800, 500, 300, 'Sales', NULL, '2021-02-10 10:04:22', NULL),
(41, 'S21020040', '2021-02-10', '21010016', '0041', '2021-02-10', 'ROKIBUL ISLAM', '01707598070', 'rokibulislam@gmail.com', 'Khilgaon', 0, 0, 0, 200, 100, 'Due Coll', 'Due 100', '2021-02-10 10:10:26', '2021-02-10 10:10:26'),
(42, 'S21020042', '2021-02-21', '21010005', '0042', '2021-02-21', 'Md Masud Rana', '01689316482', 'masudrana@gmail.com', NULL, 17, 40, 680, 500, 180, 'Sales', NULL, '2021-02-21 16:37:53', NULL),
(43, 'S21020043', '2021-02-21', '21010007', '0043', '2021-02-21', 'Md Karim Ali', '01369852452', 'karim@gmail.com', NULL, 15, 40, 600, 500, 100, 'Sales', NULL, '2021-02-21 16:38:32', NULL),
(44, 'S21010012', '2020-12-25', '21010017', '0044', '2021-02-21', 'Md Ziaul Hoque', '01758693625', 'ziaul@gmail.com', 'asdfas', 0, 0, 0, 500, 0, 'Due Coll', NULL, '2021-02-21 16:50:28', '2021-02-21 16:50:28'),
(45, 'S21010013', '2021-01-21', '21010018', '0045', '2021-02-21', 'Md Zakir Hossain', '01774453535', 'zakir@gmail.com', NULL, 0, 0, 0, 500, 0, 'Due Coll', NULL, '2021-02-21 16:50:41', '2021-02-21 16:50:41'),
(46, 'S21010024', '2021-01-20', '21010019', '0046', '2021-02-21', 'Md Nurul Islam', '1587478596', 'nurul@gmail.com', NULL, 0, 0, 0, 180, 0, 'Due Coll', NULL, '2021-02-21 16:50:54', '2021-02-21 16:50:54'),
(47, 'S21020047', '2021-02-26', '21010008', '0047', '2021-02-26', 'Md Masud Rana', '01689316482', 'masudrana@gmail.com', NULL, 20, 40, 800, 300, 500, 'Sales', NULL, '2021-02-25 16:47:41', NULL),
(48, 'S21020048', '2021-02-26', '21010009', '0048', '2021-02-26', 'Md Karim Ali', '01369852452', 'karim@gmail.com', 'af', 20, 40, 800, 500, 300, 'Sales', NULL, '2021-02-25 16:48:33', NULL),
(49, 'S21020049', '2021-02-26', '21010010', '0049', '2021-02-26', 'Md Sujon Mia', '01365987485', 'sujon@gmail.com', 'asdf', 15, 40, 600, 300, 300, 'Sales', NULL, '2021-02-25 16:51:01', NULL),
(50, 'S21010029', '2021-01-23', '21010020', '0050', '2021-02-26', 'Md Salim', '01512326595', 'salim@gmail.com', 'Nai', 0, 0, 0, 150, 0, 'Due Coll', NULL, '2021-02-26 16:52:45', '2021-02-26 16:52:45'),
(51, 'S21010030', '2021-01-25', '21010021', '0051', '2021-02-26', 'Md Rakib', '01554484751', 'rakib@gmail.com', 'Address', 0, 0, 0, 350, 0, 'Due Coll', NULL, '2021-02-26 16:52:57', '2021-02-26 16:52:57'),
(52, 'S21020031', '2021-02-03', '21010022', '0052', '2021-02-26', 'Md Nojrul Islam', '01679326584', 'nojrul@gmail.com', 'Nai', 0, 0, 0, 100, 0, 'Due Coll', 'nai', '2021-02-26 16:53:14', '2021-02-26 16:53:14'),
(53, 'S21020032', '2021-02-06', '21010023', '0053', '2021-02-26', 'Md. Monahar Badshah', '01518965874', 'monaharbadshah@gmail.com', 'It is a matter of joy that there is no qualification doctor in our country', 0, 0, 0, 200, 0, 'Due Coll', NULL, '2021-02-26 16:53:26', '2021-02-26 16:53:26'),
(54, 'S21020054', '2021-02-26', '21020011', '0054', '2021-02-26', 'Md Rahim', '0164989652', 'rahim@gmail.com', NULL, 10, 40, 400, 400, 0, 'Sales', NULL, '2021-02-26 17:21:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `page_link`, `valid`, `created_at`, `updated_at`) VALUES
(1, 'Hospital Bed', 'uploads/slider/-1599030691-hospital.jpg', '#', 1, '2020-09-02 06:54:37', '2020-09-02 07:11:31'),
(2, 'Medical', 'uploads/slider/-1599030707-medical.jpg', '#', 1, '2020-09-02 07:11:47', '2020-09-02 07:11:47'),
(3, 'Medical Services', 'uploads/slider/-1599030729-medical2.jpg', '#', 1, '2020-09-02 07:12:09', '2020-09-02 07:12:09');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employeeId` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `present_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parmanent_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` double NOT NULL,
  `joining_date` date NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `employeeId`, `name`, `email`, `phone_number`, `nid`, `gender`, `designation`, `user_type`, `present_address`, `parmanent_address`, `salary`, `joining_date`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '21010000', 'Rokibul Islam', 'rokibul.islam@gmail.com', '01679323388', '8571454', 'Male', 'Managing Director', 'Admin', 'Dhanmondi kalabagan Dhaka Bangladesh.', 'Dhanmondi kalabagan Dhaka Bangladesh.', 19500, '2020-08-05', 'public/frontend/staffimages/1690153656998585.jpg', 1, '2021-01-08 00:21:17', '2021-01-28 17:49:08'),
(2, '21010002', 'Md Zahid Hassan', 'zahidulislam0173@gmail.com', '01679323388', '5465768', 'Male', 'Managing Director', 'Admin', 'asdfasdfasdf', 'asfasdfasasfd', 10, '2020-12-28', 'public/frontend/staffimages/1688524449447422.jpg', 1, '2021-01-08 11:10:27', '2021-01-28 17:54:14'),
(3, '21010003', 'Md Zahid Hassan', 'zahidulislam0173@gmail.com', '01679323388', '4345345', NULL, 'HR', 'Accountant', 'Naipur', 'Horicandrapur', 19500, '2021-01-05', 'public/frontend/staffimages/1688524216939725.jpg', 1, '2021-01-08 11:12:38', '2021-01-10 18:09:38'),
(6, '21010005', 'Md Ziaul Hoque', 'ziaul@gmail.com', '01749301845', '54879635', NULL, 'Managing Director', 'Accountant', 'Nai kano', 'Debo', 10000, '2020-09-01', 'frontend/staffimages/1688339856762820.png', 1, '2021-01-08 11:19:18', '2021-01-08 11:19:18'),
(8, '20142040', 'Md Zahid Hassan', 'zahidulislam0173@gmail.com', '01679323388', '4345345', NULL, 'HR', 'Accountant', 'asdf', 'asdf', 19500, '2021-01-05', 'public/frontend/staffimages/1688523974995129.jpg', 1, '2021-01-10 17:49:26', '2021-01-10 18:05:47'),
(10, '21010009', 'ROKIBUL ISLAM', 'rokibul.islam@gmail.com', '01707598070', '376100000000', NULL, 'Executive', 'Executive', 'Dhaka', 'Dhaka', 5000, '2020-12-01', 'public/frontend/staffimages/1688676888639640.jpg', 1, '2021-01-12 10:36:17', '2021-01-12 10:36:17'),
(13, '21010012', 'Abul Bashar', 'abul@bashar.com', '01732862101', '88972323133355', NULL, 'Executive', 'Executive', 'Dhaka', 'Rajshahi', 20000, '2020-05-07', 'public/frontend/staffimages/1689042578130713.jpg', 1, '2021-01-16 11:28:12', '2021-01-16 11:28:46'),
(14, '21010013', 'Shifat Jahan', 'shifat.jahan@gmail.com', '01012288332', '0188552200143', NULL, 'HR', 'Admin', 'Dhaka, Bangladesh', 'Dhaka, Bangladesh', 18000, '2020-12-11', 'public/frontend/staffimages/1689410253428536.png', 1, '2021-01-20 12:52:48', '2021-01-20 12:52:48'),
(15, '21010014', 'ROKIBUL ISLAM', 'sat.rokibulislam@gmail.com', '01707598070', '37613926573', NULL, 'Managing Director', 'Admin', 'Dhanmondi, Dhaka', 'Dhaka, Bangladesh', 20000, '2020-11-01', 'public/frontend/staffimages/1689410338306039.png', 1, '2021-01-20 12:54:09', '2021-01-20 12:54:09'),
(16, '21010015', 'Md Tarikul Islam', 'tarikul@gmail.com', '0176793265', '9874563219', 'Male', 'HR', 'Admin', 'Gazipur', 'Gazipur', 15000, '2020-01-01', 'public/frontend/staffimages/1689856239061191.jpg', 1, '2021-01-22 18:19:40', '2021-01-25 11:01:33'),
(17, '21020016', 'Shamim Mahmud', 'shamim.mahmud@yahoo.com', '01000000000', '020020020000250', 'Male', 'HR', 'Admin', 'Dhanmondi', 'Dhaka', 30000, '2021-01-01', 'public/frontend/staffimages/1691301186983499.jpg', 1, '2021-02-10 09:48:23', '2021-02-10 09:48:23'),
(18, '21020017', 'Jibon Tori', 'jibontori@gmail.com', '01516123698', '9865868574', 'Male', 'Managing Director', 'Accountant', 'Uttara', 'Noakhali', 45000, '0000-00-00', 'public/frontend/staffimages/1691330384908009.jpg', 1, '2021-02-10 17:32:28', '2021-02-10 17:32:28'),
(19, '21020018', 'Md Masud Rana', 'masudrana@gmail.com', '01679329865', '9836298751', 'Male', 'Executive', 'Operator', NULL, NULL, 10000, '0000-00-00', 'public/frontend/staffimages/1692323396517175.jpg', 1, '2021-02-21 16:35:58', '2021-02-21 16:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `stalls`
--

CREATE TABLE `stalls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stall_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_availity` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stalls`
--

INSERT INTO `stalls` (`id`, `stall_no`, `details`, `max_availity`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Stall-01', 'Best', 4, '1', '2021-01-08 00:29:01', '2021-01-08 00:29:01'),
(2, 'Stall-02', 'Good', 10, '1', '2021-01-08 00:26:25', '2021-01-09 20:23:55'),
(3, 'Stall-03', 'Average', 10, '1', '2021-01-08 00:26:33', '2021-01-08 00:26:33'),
(4, 'Stall-04', 'Best', 4, '1', '2021-01-08 00:26:47', '2021-01-08 00:27:02'),
(5, 'Stall-05', 'Average', 10, '1', '2021-01-08 00:28:36', '2021-01-11 12:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `stall_ledger`
--

CREATE TABLE `stall_ledger` (
  `id` bigint(20) NOT NULL,
  `animal_id` varchar(50) NOT NULL,
  `stall_no` varchar(50) NOT NULL,
  `come_from` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `user` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stall_ledger`
--

INSERT INTO `stall_ledger` (`id`, `animal_id`, `stall_no`, `come_from`, `status`, `user`, `created_at`, `updated_at`) VALUES
(1, 'C-0001', '4', 'Cow Calf Entry', 'Sale', 'Md Zahidul Islam', '2021-01-16 19:11:17', NULL),
(2, 'CC-0001', '4', 'Cow Calf Entry', 'Sale', 'zahid', '2021-01-16 19:23:57', NULL),
(3, 'C-0002', '3', 'Cow Entry', 'Sale', 'Md Zahidul Islam', '2021-01-18 17:19:32', NULL),
(4, 'C-0003', '3', 'Cow Entry', 'Available', 'Md Zahidul Islam', '2021-01-18 17:19:32', NULL),
(5, 'C-0004', '3', 'Cow Entry', 'Available', 'Md Zahidul Islam', '2021-01-18 17:19:33', NULL),
(6, 'C-0005', '1', 'Cow Entry', 'Sale', 'Md. Rokibul Islam', '2021-01-20 12:17:14', NULL),
(7, 'C-0006', '2', 'Cow Entry', 'Available', 'Md. Rokibul Islam', '2021-01-20 12:19:23', NULL),
(8, 'C-0007', '3', 'Cow Entry', 'Sale', 'Md. Rokibul Islam', '2021-01-20 12:22:26', NULL),
(9, 'C-0008', '3', 'Cow Entry', 'Available', 'Md. Rokibul Islam', '2021-01-20 12:24:53', NULL),
(10, 'C-0009', '1', 'Cow Entry', 'Available', 'Md. Rokibul Islam', '2021-01-20 12:26:34', NULL),
(11, 'C-0010', '2', 'Cow Entry', 'Available', 'Md. Rokibul Islam', '2021-01-20 12:28:31', NULL),
(12, 'C-0011', '3', 'Cow Entry', 'Available', 'Md. Rokibul Islam', '2021-01-20 12:30:43', NULL),
(13, 'CC-0002', '4', 'Cow Calf Entry', 'Available', 'rokibul', '2021-01-20 12:35:08', NULL),
(14, 'CC-0002', '4', 'Cow Calf Entry', 'Available', 'rokibul', '2021-01-20 12:35:26', NULL),
(15, 'CC-0003', '4', 'Cow Calf Entry', 'Available', 'rokibul', '2021-01-20 12:41:17', NULL),
(16, 'CC-0004', '1', 'Cow Calf Entry', 'Sale', 'Md Zahidul Islam', '2021-01-20 12:42:49', NULL),
(17, 'CC-0005', '5', 'Cow Calf Entry', 'Available', 'rokibul', '2021-01-20 12:48:44', NULL),
(18, 'CC-0006', '5', 'Cow Calf Entry', 'Available', 'Md Zahidul Islam', '2021-01-20 12:49:32', NULL),
(20, 'C-0013', '1', 'Cow Entry', 'Available', 'Md Zahidul Islam', '2021-01-24 17:52:49', NULL),
(22, 'CC-0008', '5', 'Cow Calf Entry', 'Sale', 'zahid', '2021-01-24 18:59:21', NULL),
(23, 'CC-0009', '4', 'Cow Calf Entry', 'Sale', 'Md Zahidul Islam', '2021-01-25 18:50:11', NULL),
(24, 'C-0014', '2', 'Cow Entry', 'Available', 'Md. Rokibul Islam', '2021-02-10 11:17:56', NULL),
(25, 'CC-0010', '4', 'Cow Calf Entry', 'Available', 'Md. Rokibul Islam', '2021-02-10 11:19:56', NULL),
(26, 'C-0015', '1', 'Cow Entry', 'Available', 'Md Zahidul Islam', '2021-02-26 17:38:01', NULL),
(27, 'C-0016', '5', 'Cow Entry', 'Available', 'Md Zahidul Islam', '2021-02-26 17:39:17', NULL),
(28, 'CC-0011', '3', 'Cow Calf Entry', 'Available', 'Md Zahidul Islam', '2021-02-26 17:40:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) NOT NULL,
  `supplier_name` varchar(100) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `company_name`, `phone_number`, `email`, `address`, `status`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Rokibul Islam', 'Rokibul', '01679323388', 'rokibul@islam.com', 'dhaka', '1', 'public/frontend/images/supplier/1688593905259990.jpg', '2021-01-11 12:37:18', '2021-01-11 12:37:48'),
(4, 'md. rokibul islam', 'Islam Group', '01707598070', 'sat.rokibulislam@gmail.com', 'Dhanmondi', '1', 'public/frontend/images/supplier/1688777585483996.jpg', '2021-01-13 13:16:35', '2021-01-13 13:16:49'),
(5, 'Abul Bashar', 'Bashar Group', '0121545223112', 'abul.bashar@gmail.com', 'Dhaka, Bangladesh', '1', 'public/frontend/images/supplier/1688876119521752.png', '2021-01-14 15:22:58', '2021-01-14 15:22:58'),
(6, 'Shifat Jahan', 'shifat', '01679323388', 'shifat.jahan@gmail.com', 'Dinajpur', '1', 'public/frontend/images/supplier/1688958673578913.jpg', '2021-01-14 15:23:32', '2021-01-15 13:15:08'),
(7, 'Md Ziaul Hoque', 'C.A Trading Corporation', '01679323388', 'zahidulislam0173@gmail.com', 'asdfsadfasdf', '1', 'public/frontend/images/supplier/1689789563351815.jpg', '2021-01-15 13:46:07', '2021-01-24 17:21:46'),
(8, 'Ashraful Islam', 'Islam Group', '01201501456', 'arshraful@islam.com', 'Rajshahi, Bangladesh', '1', 'public/frontend/images/supplier/1689410590939018.png', '2021-01-20 12:58:10', '2021-01-20 12:58:10'),
(9, 'Md Hannan Mia', 'Continental Cow Service', '01679329865', 'hannan@gmail.com', 'Biral Kuthi', '1', 'public/frontend/images/supplier/1692780121813386.jpg', '2021-02-26 17:35:25', '2021-02-26 17:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menus`
--

CREATE TABLE `tbl_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_bangla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `is_parent` tinyint(4) NOT NULL DEFAULT 0,
  `parent_id` tinyint(4) NOT NULL,
  `child_status` tinyint(4) NOT NULL DEFAULT 0,
  `menu_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valid` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_menus`
--

INSERT INTO `tbl_menus` (`id`, `name`, `name_bangla`, `route`, `is_parent`, `parent_id`, `child_status`, `menu_icon`, `valid`, `created_at`, `updated_at`) VALUES
(1, 'Human Resource', 'মানব সম্পদ', 'javascript:;', 0, 0, 1, 'fa fa-user-o', 1, NULL, NULL),
(2, 'Add Staff', 'কর্মী যোগ', 'staff/create', 1, 1, 0, 'fa-angle-double-right', 1, NULL, NULL),
(3, 'User', 'ব্যবহারকারী', 'users', 0, 0, 0, 'fa fa-user', 1, NULL, NULL),
(4, 'Staff List', 'কর্মীর তালিকা', 'staff', 1, 1, 0, 'fa-angle-double-right', 1, NULL, NULL),
(5, 'aaaaaaaaaa', 'aaaaaaaaaaa', 'aaaaaaaaa', 0, 0, 0, 'fa-angle-double-right', 1, NULL, NULL),
(6, 'Employee Salary', 'কর্মচারীর বেতন', 'employeesalary/create', 1, 1, 0, 'fa-angle-double-right', 1, NULL, NULL),
(7, 'Milk Parlor', 'দুধের পার্লার', 'javascript:;', 0, 0, 1, 'fa fa-tint', 1, NULL, NULL),
(8, 'Collect Milk', 'দুধ দহন', 'milkparlor', 1, 7, 0, 'fa-angle-double-right', 1, NULL, NULL),
(9, 'Sale Milk', 'দুধ বিক্রি', 'salemilk', 1, 7, 0, 'fa-angle-double-right', 1, NULL, NULL),
(10, 'Sale Due Collection', 'ডিউ কালেকশন', 'milksaleduecoll/create', 1, 7, 0, 'fa-angle-double-right', 1, NULL, NULL),
(11, 'Cows Feed', 'গরুর খাদ্য', 'cowsfeedcreate', 0, 0, 1, 'fa fa-cutlery', 1, NULL, NULL),
(13, 'Cow Monitor', 'গরু নিরীক্ষণ', 'javascript:;', 0, 0, 1, 'fa fa-tv', 1, NULL, NULL),
(14, 'Routine Monitor', 'রুটিন পর্যবেক্ষণ', 'routinemonitor/create', 1, 13, 0, 'fa-angle-double-right', 1, NULL, NULL),
(15, 'Animal Pregnancy', 'প্রাণীর গর্ভাবস্থায়', 'managecowpregnancy', 1, 13, 0, 'fa-angle-double-right', 1, NULL, NULL),
(16, 'Cow Sale', 'গরু বিক্রি', 'javascript:;', 0, 0, 1, 'fa fa-money', 1, NULL, NULL),
(18, 'Sale', 'বিক্রয়ের তালিকা', 'cowsale/create', 1, 16, 0, 'fa-angle-double-right', 1, NULL, NULL),
(19, 'Due collections', 'ডিউ কালেকশন', 'cowsaleduecoll/create', 1, 16, 0, 'fa-angle-double-right', 1, NULL, NULL),
(20, 'Farm Expenses', 'প্রতিষ্ঠানের খরচ', 'javascript:;', 0, 0, 1, 'fa fa-money', 1, NULL, NULL),
(21, 'Expense', 'খরচের তালিকা', 'expense/create', 1, 20, 0, 'fa-angle-double-right', 1, NULL, NULL),
(22, 'Expense Purpose', 'খরচের উদ্দেশ্য', 'expensepurpose', 1, 20, 0, 'fa-angle-double-right', 1, NULL, NULL),
(23, 'Suppliers', 'সরবরাহকারী', 'supplier/create', 0, 0, 0, 'fa fa-users', 1, NULL, NULL),
(24, 'Manage Cow', 'গরু পরিচালনা', 'dimuna', 0, 0, 1, 'fa fa-paw', 1, NULL, NULL),
(25, 'Manage Cow Calf', 'গরুর বাচ্চা পরিচালনা', 'cowcalf/create', 0, 0, 1, 'fa fa-paw', 1, NULL, NULL),
(26, 'Manage Stall', 'ম্যানেজ পরিচালনা', 'stall', 0, 0, 1, 'fa-home', 1, NULL, NULL),
(27, 'Catalog', 'ক্যাটালগ', 'javascript:;', 0, 0, 1, 'fa fa-th', 1, NULL, NULL),
(28, 'User Type', 'ব্যবহারকারীর ধরন', 'usertype', 1, 27, 0, 'fa-angle-double-right', 1, NULL, NULL),
(33, 'Reports', 'প্রতিবেদন', 'javascript:;', 0, 0, 1, 'fa fa-bar-chart', 1, NULL, NULL),
(36, 'Designation', 'পদবী', 'designation', 1, 27, 0, 'fa-angle-double-right', 1, NULL, NULL),
(37, 'Colors', 'রং', 'colors', 1, 27, 0, 'fa-angle-double-right', 1, NULL, NULL),
(38, 'Animal Types', 'প্রাণীর প্রকারভেদ', 'animaltype', 1, 27, 0, 'fa-angle-double-right', 1, NULL, NULL),
(39, 'Food Unit', 'খাদ্যের একক', 'foodunit', 1, 27, 0, 'fa-angle-double-right', 1, NULL, NULL),
(40, 'Food Item', 'খাবারের মেনু', 'fooditem', 1, 27, 0, 'fa-angle-double-right', 1, NULL, NULL),
(41, 'Monitoring Service', 'পর্যবেক্ষণ', 'monitoringservice', 1, 27, 0, 'fa-angle-double-right', 1, NULL, NULL),
(42, 'Office Expense Report', 'খরচের প্রতিবেদন', 'expensereport', 1, 33, 0, 'fa-angle-double-right', 1, NULL, NULL),
(43, 'Employee Salary Report', 'কর্মচারীর বেতনের প্রতিবেদন', 'employeesalaryreport', 1, 33, 0, 'fa-angle-double-right', 1, NULL, NULL),
(45, 'Milk Collect Report', 'দুধ সংগ্রহের প্রতিবেদন', 'milkcollectreport', 1, 33, 0, 'fa-angle-double-right', 1, NULL, NULL),
(46, 'Milk Sale Report', 'দুধ বিক্রয়ের প্রতিবেদন', 'milksalereport', 1, 33, 0, 'fa-angle-double-right', 1, NULL, NULL),
(47, 'Cow Sale Report', 'গরু বিক্রয়ের প্রতিবেদন', 'cowsalereport', 1, 33, 0, 'fa-angle-double-right', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_accesses`
--

CREATE TABLE `tbl_menu_accesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `quick_menu` tinyint(4) NOT NULL DEFAULT 0,
  `quick_menu_sl` tinyint(4) NOT NULL DEFAULT 0,
  `parent_menu` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_menu_accesses`
--

INSERT INTO `tbl_menu_accesses` (`id`, `user_id`, `menu_id`, `quick_menu`, `quick_menu_sl`, `parent_menu`, `created_at`, `updated_at`) VALUES
(1393, 16, 7, 0, 0, 7, '2021-02-03 16:37:49', '2021-02-03 16:37:49'),
(1394, 16, 8, 0, 0, 7, '2021-02-03 16:37:49', '2021-02-03 16:37:49'),
(1395, 16, 9, 0, 0, 7, '2021-02-03 16:37:49', '2021-02-03 16:37:49'),
(1396, 16, 10, 0, 0, 7, '2021-02-03 16:37:49', '2021-02-03 16:37:49'),
(1397, 16, 11, 0, 0, 11, '2021-02-03 16:37:49', '2021-02-03 16:37:49'),
(1398, 16, 13, 0, 0, 13, '2021-02-03 16:37:49', '2021-02-03 16:37:49'),
(1399, 16, 14, 0, 0, 13, '2021-02-03 16:37:49', '2021-02-03 16:37:49'),
(1400, 16, 15, 0, 0, 13, '2021-02-03 16:37:49', '2021-02-03 16:37:49'),
(1401, 16, 16, 0, 0, 16, '2021-02-03 16:37:49', '2021-02-03 16:37:49'),
(1402, 16, 18, 0, 0, 16, '2021-02-03 16:37:49', '2021-02-03 16:37:49'),
(1403, 16, 19, 0, 0, 16, '2021-02-03 16:37:49', '2021-02-03 16:37:49'),
(1404, 16, 20, 0, 0, 20, '2021-02-03 16:37:49', '2021-02-03 16:37:49'),
(1405, 16, 21, 0, 0, 20, '2021-02-03 16:37:49', '2021-02-03 16:37:49'),
(1406, 16, 22, 0, 0, 20, '2021-02-03 16:37:49', '2021-02-03 16:37:49'),
(1407, 16, 23, 0, 0, 23, '2021-02-03 16:37:49', '2021-02-03 16:37:49'),
(1408, 16, 24, 0, 0, 24, '2021-02-03 16:37:49', '2021-02-03 16:37:49'),
(1409, 16, 25, 0, 0, 25, '2021-02-03 16:37:49', '2021-02-03 16:37:49'),
(1410, 16, 26, 0, 0, 26, '2021-02-03 16:37:49', '2021-02-03 16:37:49'),
(1411, 16, 27, 0, 0, 27, '2021-02-03 16:37:49', '2021-02-03 16:37:49'),
(1412, 16, 28, 0, 0, 27, '2021-02-03 16:37:49', '2021-02-03 16:37:49'),
(1413, 16, 36, 0, 0, 27, '2021-02-03 16:37:49', '2021-02-03 16:37:49'),
(1414, 16, 37, 0, 0, 27, '2021-02-03 16:37:49', '2021-02-03 16:37:49'),
(1415, 16, 38, 0, 0, 27, '2021-02-03 16:37:49', '2021-02-03 16:37:49'),
(1416, 16, 39, 0, 0, 27, '2021-02-03 16:37:49', '2021-02-03 16:37:49'),
(1417, 16, 40, 0, 0, 27, '2021-02-03 16:37:49', '2021-02-03 16:37:49'),
(1418, 16, 41, 0, 0, 27, '2021-02-03 16:37:49', '2021-02-03 16:37:49'),
(1419, 19, 7, 0, 0, 7, '2021-02-03 16:40:49', '2021-02-03 16:40:49'),
(1420, 19, 8, 0, 0, 7, '2021-02-03 16:40:49', '2021-02-03 16:40:49'),
(1421, 19, 9, 0, 0, 7, '2021-02-03 16:40:49', '2021-02-03 16:40:49'),
(1422, 19, 10, 0, 0, 7, '2021-02-03 16:40:49', '2021-02-03 16:40:49'),
(1423, 19, 13, 0, 0, 13, '2021-02-03 16:40:49', '2021-02-03 16:40:49'),
(1424, 19, 14, 0, 0, 13, '2021-02-03 16:40:49', '2021-02-03 16:40:49'),
(1425, 19, 15, 0, 0, 13, '2021-02-03 16:40:49', '2021-02-03 16:40:49'),
(1426, 19, 16, 0, 0, 16, '2021-02-03 16:40:49', '2021-02-03 16:40:49'),
(1427, 19, 18, 0, 0, 16, '2021-02-03 16:40:49', '2021-02-03 16:40:49'),
(1428, 19, 19, 0, 0, 16, '2021-02-03 16:40:49', '2021-02-03 16:40:49'),
(1429, 19, 20, 0, 0, 20, '2021-02-03 16:40:49', '2021-02-03 16:40:49'),
(1430, 19, 21, 0, 0, 20, '2021-02-03 16:40:49', '2021-02-03 16:40:49'),
(1431, 19, 22, 0, 0, 20, '2021-02-03 16:40:50', '2021-02-03 16:40:50'),
(1432, 19, 23, 0, 0, 23, '2021-02-03 16:40:50', '2021-02-03 16:40:50'),
(1433, 19, 24, 0, 0, 24, '2021-02-03 16:40:50', '2021-02-03 16:40:50'),
(1434, 19, 25, 0, 0, 25, '2021-02-03 16:40:50', '2021-02-03 16:40:50'),
(1435, 19, 33, 0, 0, 33, '2021-02-03 16:40:50', '2021-02-03 16:40:50'),
(1436, 19, 42, 0, 0, 33, '2021-02-03 16:40:50', '2021-02-03 16:40:50'),
(1437, 19, 43, 0, 0, 33, '2021-02-03 16:40:50', '2021-02-03 16:40:50'),
(1438, 19, 45, 0, 0, 33, '2021-02-03 16:40:50', '2021-02-03 16:40:50'),
(1439, 19, 46, 0, 0, 33, '2021-02-03 16:40:50', '2021-02-03 16:40:50'),
(1440, 19, 47, 0, 0, 33, '2021-02-03 16:40:50', '2021-02-03 16:40:50'),
(1441, 1, 1, 0, 0, 1, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1442, 1, 2, 0, 0, 1, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1443, 1, 4, 0, 0, 1, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1444, 1, 6, 0, 0, 1, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1445, 1, 3, 0, 0, 3, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1446, 1, 7, 0, 0, 7, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1447, 1, 8, 0, 0, 7, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1448, 1, 9, 0, 0, 7, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1449, 1, 10, 0, 0, 7, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1450, 1, 11, 0, 0, 11, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1451, 1, 13, 0, 0, 13, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1452, 1, 14, 0, 0, 13, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1453, 1, 15, 0, 0, 13, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1454, 1, 16, 0, 0, 16, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1455, 1, 18, 0, 0, 16, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1456, 1, 19, 0, 0, 16, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1457, 1, 20, 0, 0, 20, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1458, 1, 21, 0, 0, 20, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1459, 1, 22, 0, 0, 20, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1460, 1, 23, 0, 0, 23, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1461, 1, 24, 0, 0, 24, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1462, 1, 25, 0, 0, 25, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1463, 1, 26, 0, 0, 26, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1464, 1, 27, 0, 0, 27, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1465, 1, 28, 0, 0, 27, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1466, 1, 36, 0, 0, 27, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1467, 1, 37, 0, 0, 27, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1468, 1, 38, 0, 0, 27, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1469, 1, 39, 0, 0, 27, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1470, 1, 40, 0, 0, 27, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1471, 1, 41, 0, 0, 27, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1472, 1, 33, 0, 0, 33, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1473, 1, 42, 0, 0, 33, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1474, 1, 43, 0, 0, 33, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1475, 1, 45, 0, 0, 33, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1476, 1, 46, 0, 0, 33, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1477, 1, 47, 0, 0, 33, '2021-02-10 09:24:46', '2021-02-10 09:24:46'),
(1694, 15, 1, 0, 0, 1, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1695, 15, 2, 0, 0, 1, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1696, 15, 6, 0, 0, 1, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1697, 15, 3, 0, 0, 3, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1698, 15, 7, 0, 0, 7, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1699, 15, 8, 0, 0, 7, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1700, 15, 9, 0, 0, 7, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1701, 15, 10, 0, 0, 7, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1702, 15, 11, 0, 0, 11, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1703, 15, 13, 0, 0, 13, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1704, 15, 14, 0, 0, 13, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1705, 15, 15, 0, 0, 13, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1706, 15, 16, 0, 0, 16, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1707, 15, 18, 0, 0, 16, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1708, 15, 19, 0, 0, 16, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1709, 15, 20, 0, 0, 20, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1710, 15, 21, 0, 0, 20, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1711, 15, 22, 0, 0, 20, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1712, 15, 23, 0, 0, 23, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1713, 15, 24, 0, 0, 24, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1714, 15, 25, 0, 0, 25, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1715, 15, 26, 0, 0, 26, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1716, 15, 27, 0, 0, 27, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1717, 15, 28, 0, 0, 27, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1718, 15, 36, 0, 0, 27, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1719, 15, 37, 0, 0, 27, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1720, 15, 38, 0, 0, 27, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1721, 15, 39, 0, 0, 27, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1722, 15, 40, 0, 0, 27, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1723, 15, 41, 0, 0, 27, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1724, 15, 33, 0, 0, 33, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1725, 15, 42, 0, 0, 33, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1726, 15, 43, 0, 0, 33, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1727, 15, 45, 0, 0, 33, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1728, 15, 46, 0, 0, 33, '2021-02-26 17:27:48', '2021-02-26 17:27:48'),
(1729, 15, 47, 0, 0, 33, '2021-02-26 17:27:48', '2021-02-26 17:27:48');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trDate` datetime NOT NULL,
  `VRType` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `narration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subTrNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contraCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logDetails` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donerId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donationDuration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donertype` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postingFrom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `trNo`, `trDate`, `VRType`, `acCode`, `acName`, `refNo`, `narration`, `debit`, `credit`, `subTrNo`, `contraCode`, `valid`, `userName`, `logDetails`, `donerId`, `donationDuration`, `donertype`, `remarks`, `postingFrom`, `created_at`, `updated_at`) VALUES
(1, '20120000', '2020-12-22 00:00:00', 'CV', '2106010001', 'Receive Against Donation', '001', 'Receive With Thanks From Md Zahid Hassan ( 0000 ) Aganinst HalfYearly', '0', '100', '20120001', '2102010001', '1', 'Md Zahid Hassan', 'Md Zahid Hassan 2020-Dec-22 05:37:36', '1', 'HalfYearly', 'General', 'N/A', 'Monery Receipt', '2020-12-21 23:37:37', '2020-12-21 23:37:37'),
(2, '20120000', '2020-12-22 00:00:00', 'CV', '2106010001', 'Receive Against Donation', '001', 'Receive With Thanks From Md Zahid Hassan ( 0000 ) Aganinst HalfYearly', '100', '0', '20120001', '2102010001', '1', 'Md Zahid Hassan', 'Md Zahid Hassan 2020-Dec-22 05:37:36', '1', 'HalfYearly', 'General', 'N/A', 'Monery Receipt', '2020-12-21 23:37:37', '2020-12-21 23:37:37'),
(3, '20120002', '2020-12-22 00:00:00', 'CV', '1010101011', 'Net Bill', '01', 'for net bill From 2020-Dec-22 05:40:06', '100', '0', '20120003', '2100000001', '1', 'Admin', '0002', '1', '', '', 'N/A', 'Transaction', '2020-12-21 23:40:06', '2020-12-21 23:40:06'),
(4, '20120002', '2020-12-22 00:00:00', 'CV', '1010101011', 'Net Bill', '01', 'for net bill From 2020-Dec-22 05:40:06', '0', '100', '20120003', '2100000001', '1', 'Admin', '0002', '1', '', '', 'N/A', 'Transaction', '2020-12-21 23:40:06', '2020-12-21 23:40:06'),
(5, '20120002', '2020-12-22 00:00:00', 'CV', '1231231231', 'Phone Bill', '01', 'for phone bill From 2020-Dec-22 05:40:06', '100', '0', '20120003', '2100000001', '1', 'Admin', '0002', '1', '', '', 'N/A', 'Transaction', '2020-12-21 23:40:06', '2020-12-21 23:40:06'),
(6, '20120002', '2020-12-22 00:00:00', 'CV', '1231231231', 'Phone Bill', '01', 'for phone bill From 2020-Dec-22 05:40:06', '0', '100', '20120003', '2100000001', '1', 'Admin', '0002', '1', '', '', 'N/A', 'Transaction', '2020-12-21 23:40:06', '2020-12-21 23:40:06'),
(7, '20120006', '2020-12-22 00:00:00', 'CV', '1010101011', 'Net Bill', '01', 'asfasdf From 2020-Dec-22 06:55:58', '100', '0', '20120007', '2100000001', '1', 'Admin', '0002', '1', '', '', 'N/A', 'Transaction', '2020-12-22 00:55:59', '2020-12-22 00:55:59'),
(8, '20120006', '2020-12-22 00:00:00', 'CV', '1010101011', 'Net Bill', '01', 'asfasdf From 2020-Dec-22 06:55:58', '0', '100', '20120007', '2100000001', '1', 'Admin', '0002', '1', '', '', 'N/A', 'Transaction', '2020-12-22 00:55:59', '2020-12-22 00:55:59'),
(9, '20120007', '2020-12-23 00:00:00', 'CV', '1010101011', 'Net Bill', '1234', 'asdfsadfsdf From 2020-Dec-23 11:11:44', '1000', '0', '20120008', '2100000001', '1', 'Admin', '0002', '1', '', '', 'N/A', 'Transaction', '2020-12-23 05:11:45', '2020-12-23 05:11:45'),
(10, '20120007', '2020-12-23 00:00:00', 'CV', '1010101011', 'Net Bill', '1234', 'asdfsadfsdf From 2020-Dec-23 11:11:44', '0', '1000', '20120008', '2100000001', '1', 'Admin', '0002', '1', '', '', 'N/A', 'Transaction', '2020-12-23 05:11:45', '2020-12-23 05:11:45'),
(11, '20120008', '2020-12-23 00:00:00', 'CV', '2100000001', 'Cash in hand', '01', 'asdfasdf From 2020-Dec-23 11:15:44', '50', '0', '20120009', '2100000001', '1', 'Admin', '0002', '1', '', '', 'N/A', 'Transaction', '2020-12-23 05:15:45', '2020-12-23 05:15:45'),
(12, '20120008', '2020-12-23 00:00:00', 'CV', '2100000001', 'Cash in hand', '01', 'asdfasdf From 2020-Dec-23 11:15:44', '0', '50', '20120009', '2100000001', '1', 'Admin', '0002', '1', '', '', 'N/A', 'Transaction', '2020-12-23 05:15:45', '2020-12-23 05:15:45'),
(13, '20120008', '2020-12-23 00:00:00', 'CV', '1010101011', 'Net Bill', '01', 'asdras From 2020-Dec-23 11:15:44', '10', '0', '20120009', '2100000001', '1', 'Admin', '0002', '1', '', '', 'N/A', 'Transaction', '2020-12-23 05:15:45', '2020-12-23 05:15:45'),
(14, '20120008', '2020-12-23 00:00:00', 'CV', '1010101011', 'Net Bill', '01', 'asdras From 2020-Dec-23 11:15:44', '0', '10', '20120009', '2100000001', '1', 'Admin', '0002', '1', '', '', 'N/A', 'Transaction', '2020-12-23 05:15:45', '2020-12-23 05:15:45'),
(15, '20120014', '2020-12-29 00:00:00', 'CV', '2106010001', 'Receive Against Donation', '001', 'Receive With Thanks From Md Ziaul Hoque ( 20120005 ) Aganinst Monthly', '0', '500', '20120015', '2102010001', '1', 'Md Ziaul Hoque', 'Md Ziaul Hoque 2020-Dec-29 04:57:12', '1', 'Monthly', 'General', 'N/A', 'Monery Receipt', '2020-12-28 22:57:12', '2020-12-28 22:57:12'),
(16, '20120014', '2020-12-29 00:00:00', 'CV', '2106010001', 'Receive Against Donation', '001', 'Receive With Thanks From Md Ziaul Hoque ( 20120005 ) Aganinst Monthly', '500', '0', '20120015', '2102010001', '1', 'Md Ziaul Hoque', 'Md Ziaul Hoque 2020-Dec-29 04:57:12', '1', 'Monthly', 'General', 'N/A', 'Monery Receipt', '2020-12-28 22:57:12', '2020-12-28 22:57:12'),
(17, '20120016', '2020-12-29 00:00:00', 'CV', '2106010001', 'Receive Against Donation', '001', 'Receive With Thanks From Md Zahid Hassan ( 20120004 ) Aganinst HalfYearly', '0', '53.5', '20120017', '2102010001', '1', 'Md Zahid Hassan', 'Md Zahid Hassan 2020-Dec-29 11:03:19', '1', 'HalfYearly', 'Khadem', 'N/A', 'Monery Receipt', '2020-12-29 05:03:20', '2020-12-29 05:03:20'),
(18, '20120016', '2020-12-29 00:00:00', 'CV', '2106010001', 'Receive Against Donation', '001', 'Receive With Thanks From Md Zahid Hassan ( 20120004 ) Aganinst HalfYearly', '53.5', '0', '20120017', '2102010001', '1', 'Md Zahid Hassan', 'Md Zahid Hassan 2020-Dec-29 11:03:19', '1', 'HalfYearly', 'Khadem', 'N/A', 'Monery Receipt', '2020-12-29 05:03:20', '2020-12-29 05:03:20'),
(19, '20120018', '2020-12-29 00:00:00', 'CV', '2106010001', 'Receive Against Donation', '001', 'Receive With Thanks From Md Rokibul Islam ( 20120007 ) Aganinst Quaterly', '0', '5000', '20120019', '2102010001', '1', 'Md Rokibul Islam', 'Md Rokibul Islam 2020-Dec-29 11:15:42', '1', 'Quaterly', 'Khadem', 'N/A', 'Monery Receipt', '2020-12-29 05:15:42', '2020-12-29 05:15:42'),
(20, '20120018', '2020-12-29 00:00:00', 'CV', '2106010001', 'Receive Against Donation', '001', 'Receive With Thanks From Md Rokibul Islam ( 20120007 ) Aganinst Quaterly', '5000', '0', '20120019', '2102010001', '1', 'Md Rokibul Islam', 'Md Rokibul Islam 2020-Dec-29 11:15:42', '1', 'Quaterly', 'Khadem', 'N/A', 'Monery Receipt', '2020-12-29 05:15:42', '2020-12-29 05:15:42'),
(21, '20120019', '2020-12-29 00:00:00', 'CV', '2100000001', 'Cash in hand', '01', 'asdf From 2020-Dec-29 11:31:17', '50', '0', '20120020', '2100000001', '1', 'Admin', '0002', '1', '', '', 'asdfasdf', 'Transaction', '2020-12-29 05:31:17', '2020-12-29 05:31:17'),
(22, '20120019', '2020-12-29 00:00:00', 'CV', '2100000001', 'Cash in hand', '01', 'asdf From 2020-Dec-29 11:31:17', '0', '50', '20120020', '2100000001', '1', 'Admin', '0002', '1', '', '', 'asdfasdf', 'Transaction', '2020-12-29 05:31:17', '2020-12-29 05:31:17'),
(23, '20120020', '2020-12-29 00:00:00', 'CV', '1231231231', 'Phone Bill', '503', 'phone no. 01774439535 for the month december From 2020-Dec-29 12:02:09', '700', '0', '20120021', '2100000001', '1', 'Admin', '02', '1', '', '', 'Paid by cash', 'Transaction', '2020-12-29 06:02:09', '2020-12-29 06:02:09'),
(24, '20120020', '2020-12-29 00:00:00', 'CV', '1231231231', 'Phone Bill', '503', 'phone no. 01774439535 for the month december From 2020-Dec-29 12:02:09', '0', '700', '20120021', '2100000001', '1', 'Admin', '02', '1', '', '', 'Paid by cash', 'Transaction', '2020-12-29 06:02:09', '2020-12-29 06:02:09'),
(25, '20120020', '2020-12-29 00:00:00', 'CV', '1010101011', 'Net Bill', '503', 'for the month january 2020 From 2020-Dec-29 12:02:09', '1000', '0', '20120021', '2100000001', '1', 'Admin', '0002', '1', '', '', 'Paid by cash', 'Transaction', '2020-12-29 06:02:09', '2020-12-29 06:02:09'),
(26, '20120020', '2020-12-29 00:00:00', 'CV', '1010101011', 'Net Bill', '503', 'for the month january 2020 From 2020-Dec-29 12:02:09', '0', '1000', '20120021', '2100000001', '1', 'Admin', '0002', '1', '', '', 'Paid by cash', 'Transaction', '2020-12-29 06:02:09', '2020-12-29 06:02:09'),
(27, '20120021', '2020-12-29 00:00:00', 'BV', '2100000001', 'Cash in hand', '506', 'with draw from bank From 2020-Dec-29 12:05:39', '10000', '0', '20120022', '1000000001', '1', 'Admin', '02', '1', '', '', 'Manual Adjust', 'Transaction', '2020-12-29 06:05:39', '2020-12-29 06:05:39'),
(28, '20120021', '2020-12-29 00:00:00', 'BV', '2100000001', 'Cash in hand', '506', 'with draw from bank From 2020-Dec-29 12:05:39', '0', '10000', '20120022', '1000000001', '1', 'Admin', '02', '1', '', '', 'Manual Adjust', 'Transaction', '2020-12-29 06:05:39', '2020-12-29 06:05:39'),
(29, '20120021', '2020-12-29 00:00:00', 'BV', '1231231231', 'Phone Bill', '506', 'for the month january From 2020-Dec-29 12:05:39', '1000', '0', '20120022', '1000000001', '1', 'Admin', '0002', '1', '', '', 'Manual Adjust', 'Transaction', '2020-12-29 06:05:39', '2020-12-29 06:05:39'),
(30, '20120021', '2020-12-29 00:00:00', 'BV', '1231231231', 'Phone Bill', '506', 'for the month january From 2020-Dec-29 12:05:39', '0', '1000', '20120022', '1000000001', '1', 'Admin', '0002', '1', '', '', 'Manual Adjust', 'Transaction', '2020-12-29 06:05:39', '2020-12-29 06:05:39'),
(31, '20120030', '2020-12-30 00:00:00', 'CV', '2106010001', 'Receive Against Donation', '010', 'Receive With Thanks From Md Zahid Hassan ( 20120004 ) Aganinst HalfYearly', '0', '1000', '20120031', '2102010001', '1', 'Md Zahid Hassan', 'Md Zahid Hassan 2020-Dec-30 14:33:02', '1', 'HalfYearly', 'Khadem', 'N/A', 'Monery Receipt', '2020-12-30 08:33:02', '2020-12-30 08:33:02'),
(32, '20120030', '2020-12-30 00:00:00', 'CV', '2106010001', 'Receive Against Donation', '010', 'Receive With Thanks From Md Zahid Hassan ( 20120004 ) Aganinst HalfYearly', '1000', '0', '20120031', '2102010001', '1', 'Md Zahid Hassan', 'Md Zahid Hassan 2020-Dec-30 14:33:02', '1', 'HalfYearly', 'Khadem', 'N/A', 'Monery Receipt', '2020-12-30 08:33:02', '2020-12-30 08:33:02'),
(33, '20120031', '2020-12-30 00:00:00', 'CV', '1010101011', 'Net Bill', '012', 'For the month of July From 2020-Dec-30 14:58:38', '1000', '0', '20120032', '2100000001', '1', 'Admin', '02', '1', '', '', 'nai', 'Transaction', '2020-12-30 08:58:38', '2020-12-30 08:58:38'),
(34, '20120031', '2020-12-30 00:00:00', 'CV', '1010101011', 'Net Bill', '012', 'For the month of July From 2020-Dec-30 14:58:38', '0', '1000', '20120032', '2100000001', '1', 'Admin', '02', '1', '', '', 'nai', 'Transaction', '2020-12-30 08:58:38', '2020-12-30 08:58:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` datetime NOT NULL DEFAULT current_timestamp(),
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valid` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `email_verified_at`, `password`, `last_login`, `designation`, `valid`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'rokibul', 'Md. Rokibul Islam', 'rokibul.islam@gmail.com', NULL, '$2y$10$SFLOK2P9JS2Albpi2cl4vufRlmRSLBxRhBULi9AQ/HJIYw32aQHMK', '2021-02-10 17:54:05', 'Admin', 1, NULL, '2020-08-31 08:19:29', '2021-02-10 11:54:05'),
(15, 'zahid', 'Md Zahidul Islam', 'zahidulislam016@gmail.com', NULL, '$2y$10$WasdsqaES0.lxZCo4Dr.OeCcSGInzPI5085bGX1zi0vk24U.XLI/q', '2021-02-26 01:04:06', 'Admin', 1, NULL, '2020-12-30 07:46:26', '2021-02-25 19:04:06'),
(16, 'bashar', 'Md Abul Bashar', 'abulbashar@gmail.com', NULL, '$2y$10$zdqCM73qhr7tqOijiSy/AOfnDnKY/K4YHB1M5eFNVIEjgEZS1fO1O', '2021-02-03 22:37:49', 'Operator', 1, NULL, '2021-02-03 16:37:49', '2021-02-03 16:37:49'),
(19, 'Shifat', 'Mst. Shifat Jahan', 'shifat@gmail.com', NULL, '$2y$10$eDDpfWAbnYE0Ge/XEXW7au7dEGw1SoYYIchqOhR1OjHjYKTDsPhgS', '2021-02-03 22:40:49', 'Accounts', 1, NULL, '2021-02-03 16:40:49', '2021-02-03 16:40:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '1', '2021-01-08 09:54:19', '2021-01-08 09:54:19'),
(2, 'Accountant', '1', '2021-01-08 09:54:33', '2021-01-08 09:58:04'),
(4, 'HRD', '1', '2021-01-08 09:59:42', '2021-02-10 11:23:31'),
(5, 'Operator', '1', '2021-01-12 12:39:19', '2021-01-12 12:39:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal_types`
--
ALTER TABLE `animal_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cows`
--
ALTER TABLE `cows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cows_feed`
--
ALTER TABLE `cows_feed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cow_calfs`
--
ALTER TABLE `cow_calfs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cow_images`
--
ALTER TABLE `cow_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cow_sales`
--
ALTER TABLE `cow_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_salary`
--
ALTER TABLE `employee_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expens_purposes`
--
ALTER TABLE `expens_purposes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feed_ledger`
--
ALTER TABLE `feed_ledger`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedId` (`feedId`);

--
-- Indexes for table `food_items`
--
ALTER TABLE `food_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_units`
--
ALTER TABLE `food_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_cow_pregnancy`
--
ALTER TABLE `manage_cow_pregnancy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `milkparlors`
--
ALTER TABLE `milkparlors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `milk_ledger`
--
ALTER TABLE `milk_ledger`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mpId` (`mpId`);

--
-- Indexes for table `monitoring_services`
--
ALTER TABLE `monitoring_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monitor_ledger`
--
ALTER TABLE `monitor_ledger`
  ADD PRIMARY KEY (`id`),
  ADD KEY `monitorId` (`monitorId`);

--
-- Indexes for table `passworddetails`
--
ALTER TABLE `passworddetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `routine_monitor`
--
ALTER TABLE `routine_monitor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salemilk`
--
ALTER TABLE `salemilk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stalls`
--
ALTER TABLE `stalls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stall_ledger`
--
ALTER TABLE `stall_ledger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menus`
--
ALTER TABLE `tbl_menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_menus_name_unique` (`name`);

--
-- Indexes for table `tbl_menu_accesses`
--
ALTER TABLE `tbl_menu_accesses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_menu_accesses_user_id_foreign` (`user_id`),
  ADD KEY `tbl_menu_accesses_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal_types`
--
ALTER TABLE `animal_types`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cows`
--
ALTER TABLE `cows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cows_feed`
--
ALTER TABLE `cows_feed`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cow_calfs`
--
ALTER TABLE `cow_calfs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cow_images`
--
ALTER TABLE `cow_images`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cow_sales`
--
ALTER TABLE `cow_sales`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee_salary`
--
ALTER TABLE `employee_salary`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `expens_purposes`
--
ALTER TABLE `expens_purposes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feed_ledger`
--
ALTER TABLE `feed_ledger`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `food_items`
--
ALTER TABLE `food_items`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `food_units`
--
ALTER TABLE `food_units`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `manage_cow_pregnancy`
--
ALTER TABLE `manage_cow_pregnancy`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `milkparlors`
--
ALTER TABLE `milkparlors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `milk_ledger`
--
ALTER TABLE `milk_ledger`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `monitoring_services`
--
ALTER TABLE `monitoring_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `monitor_ledger`
--
ALTER TABLE `monitor_ledger`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `passworddetails`
--
ALTER TABLE `passworddetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `routine_monitor`
--
ALTER TABLE `routine_monitor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `salemilk`
--
ALTER TABLE `salemilk`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `stalls`
--
ALTER TABLE `stalls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stall_ledger`
--
ALTER TABLE `stall_ledger`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_menus`
--
ALTER TABLE `tbl_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_menu_accesses`
--
ALTER TABLE `tbl_menu_accesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1730;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feed_ledger`
--
ALTER TABLE `feed_ledger`
  ADD CONSTRAINT `feed_ledger_ibfk_1` FOREIGN KEY (`feedId`) REFERENCES `cows_feed` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `milk_ledger`
--
ALTER TABLE `milk_ledger`
  ADD CONSTRAINT `FK_myKey` FOREIGN KEY (`mpId`) REFERENCES `milkparlors` (`id`);

--
-- Constraints for table `monitor_ledger`
--
ALTER TABLE `monitor_ledger`
  ADD CONSTRAINT `monitor_ledger_ibfk_1` FOREIGN KEY (`monitorId`) REFERENCES `routine_monitor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_menu_accesses`
--
ALTER TABLE `tbl_menu_accesses`
  ADD CONSTRAINT `tbl_menu_accesses_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `tbl_menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_menu_accesses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
