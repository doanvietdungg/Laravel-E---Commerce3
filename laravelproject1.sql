-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 16, 2021 lúc 08:33 AM
-- Phiên bản máy phục vụ: 10.4.16-MariaDB
-- Phiên bản PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravelproject1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(35, 'Fashion', 'fashion', '2021-05-03 04:04:58', '2021-05-03 04:04:58'),
(36, 'asdasd', 'asdasd', '2021-05-03 18:37:59', '2021-05-03 18:37:59'),
(37, 'xcxcvx', 'xcxcvx', '2021-05-10 22:05:14', '2021-05-10 22:05:14'),
(38, 'xcxcvxxcv', 'xcxcvxxcv', '2021-05-10 22:05:17', '2021-05-10 22:05:17'),
(39, 'xcxcvxxcvsrfw', 'xcxcvxxcvsrfw', '2021-05-10 22:05:19', '2021-05-10 22:05:19'),
(40, 'xcxcvxxcvsrfwwerwer', 'xcxcvxxcvsrfwwerwer', '2021-05-10 22:05:21', '2021-05-10 22:05:21'),
(41, 'xcxcvxxcvsrfwwerwerewr', 'xcxcvxxcvsrfwwerwerewr', '2021-05-10 22:05:25', '2021-05-10 22:05:25'),
(42, 'xcxcvxxcvsrfwwerwerewrwer', 'xcxcvxxcvsrfwwerwerewrwer', '2021-05-10 22:05:27', '2021-05-10 22:05:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(3, 'sadsada', 3, 34, '2021-06-11 07:04:10', '2021-06-11 07:04:10'),
(4, 'sdfsdfdsfs', 3, 34, '2021-06-11 07:27:56', '2021-06-11 07:27:56'),
(5, 'uhjkj', 3, 34, '2021-06-11 07:42:57', '2021-06-11 07:42:57'),
(6, 'adsad', 3, 34, '2021-06-11 08:31:05', '2021-06-11 08:31:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('fixed','percent') COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` decimal(8,2) NOT NULL,
  `cart_value` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expiry_date` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `value`, `cart_value`, `created_at`, `updated_at`, `expiry_date`) VALUES
(3, 'off100', 'fixed', '100.00', '1000.00', '2021-05-23 09:06:49', '2021-05-23 09:06:49', '2021-05-04'),
(4, 'off50', 'fixed', '100.00', '1000.00', '2021-05-23 09:07:01', '2021-05-23 09:07:01', '2021-05-24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `home_categories`
--

CREATE TABLE `home_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sel_categories` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_product` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `home_categories`
--

INSERT INTO `home_categories` (`id`, `sel_categories`, `no_of_product`, `created_at`, `updated_at`) VALUES
(1, '35,36,38,39,40', 6, '2020-04-30 14:05:18', '2021-05-10 23:08:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2021_04_24_045301_create_sessions_table', 1),
(13, '2021_04_27_141738_create_categories_table', 2),
(14, '2021_04_27_141757_create_brands_table', 2),
(15, '2021_04_27_141539_create_products_table', 3),
(16, '2021_04_28_084507_create_products_table', 4),
(17, '2021_04_30_041218_create_categories_table', 5),
(18, '2021_04_30_041244_create_products_table', 6),
(19, '2021_05_05_130216_create_slides_table', 7),
(20, '2021_05_11_021141_create_home_categories_table', 8),
(21, '2021_05_12_012152_create_sales_table', 9),
(22, '2021_05_22_144522_create_coupons_table', 10),
(23, '2021_05_24_074355_add_expiry_date_to_coupon', 11),
(24, '2021_05_26_003235_create_orders_table', 12),
(25, '2021_05_26_004529_create_order_items_table', 12),
(26, '2021_05_26_010416_create_shippings_table', 13),
(27, '2021_05_26_011403_create_transactions_table', 14),
(28, '2021_06_08_162958_update__user', 15),
(29, '2021_06_09_084059_add_fb_id_column_in_users_table', 16),
(30, '2021_06_11_042807_create_comments_table', 17),
(31, '2018_06_30_113500_create_comments_table', 18),
(32, '2021_06_11_092756_create_comments_table', 19),
(33, '2021_08_15_173905_create_shoppingcart_table', 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `tax` decimal(8,2) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ordered','delivered','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ordered',
  `is_shipping_different` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `subtotal`, `discount`, `tax`, `total`, `first_name`, `last_name`, `mobile`, `email`, `line1`, `line2`, `city`, `province`, `country`, `zip_code`, `status`, `is_shipping_different`, `created_at`, `updated_at`) VALUES
(49, 3, '131.00', '0.00', '27.51', '158.51', 'Dung', 'Doan', '+84866063426', 'doanvietdung0103@gmail.com', '+84866063426', '+84866063426', 'Ha Noi', '+84866063426', 'Vietnam', '10000', 'ordered', 0, '2021-05-31 09:28:25', '2021-05-31 09:28:25'),
(50, 3, '131.00', '0.00', '27.51', '158.51', 'Dung', 'Doan', '+84866063426', 'doanvietdung0103@gmail.com', '+84866063426', '+84866063426', 'Ha Noi', '+84866063426', 'Vietnam', '10000', 'ordered', 0, '2021-05-31 10:12:06', '2021-05-31 10:12:06'),
(54, 3, '1035.00', '0.00', '217.35', '1252.35', 'Dung', 'Doan', '+84866063426', 'doanvietdung0103@gmail.com', '0866063426', '0866063426', 'Ha Noi', '+84866063426', 'Vietnam', '10000', 'ordered', 1, '2021-06-04 00:17:37', '2021-06-04 00:17:37'),
(61, 3, '131.00', '0.00', '27.51', '158.51', 'Dung', 'Doan', '+84866063426', 'doanvietdung0103@gmail.com', '+84866063426', '+84866063426', 'Ha Noi', '+84866063426', 'Vietnam', '10000', 'ordered', 0, '2021-07-17 00:18:09', '2021-07-17 00:18:09'),
(62, 3, '131.00', '0.00', '27.51', '158.51', 'Dung', 'Doan', '+84866063426', 'doanvietdung0103@gmail.com', '+84866063426', '0866063426', 'Ha Noi', '+84866063426', 'Vietnam', '10000', 'ordered', 0, '2021-07-17 00:23:46', '2021-07-17 00:23:46'),
(63, 3, '131.00', '0.00', '27.51', '158.51', 'Dung', 'Doan', '+84866063426', 'doanvietdung0103@gmail.com', '+84866063426', '0866063426', 'Ha Noi', '+84866063426', 'Vietnam', '10000', 'ordered', 0, '2021-07-17 00:24:35', '2021-07-17 00:24:35'),
(64, 3, '131.00', '0.00', '27.51', '158.51', 'Dung', 'Doan', '+84866063426', 'doanvietdung0103@gmail.com', '+84866063426', '0866063426', 'Ha Noi', '+84866063426', 'Vietnam', '10000', 'ordered', 0, '2021-07-17 00:24:59', '2021-07-17 00:24:59'),
(65, 3, '131.00', '0.00', '27.51', '158.51', 'Dung', 'Doan', '+84866063426', 'doanvietdung0103@gmail.com', '0866063426', '+84866063426', 'Ha Noi', '+84866063426', 'Vietnam', '10000', 'ordered', 0, '2021-07-17 00:26:38', '2021-07-17 00:26:38'),
(66, 4, '131.00', '0.00', '27.51', '158.51', 'Dung', 'Doan', '0866063426', 'doanvietdung0103@gmail.com', '+84866063426', '+84866063426', 'Hà Đông', '0866063426', 'Vietnam', '10000', 'ordered', 0, '2021-07-17 00:28:27', '2021-07-17 00:28:27'),
(67, 4, '131.00', '0.00', '27.51', '158.51', 'Dung', 'Doan', '+84866063426', 'doanvietdung0103@gmail.com', '0866063426', '+84866063426', 'Ha Noi', '+84866063426', 'Vietnam', '10000', 'ordered', 0, '2021-07-17 00:31:40', '2021-07-17 00:31:40'),
(68, 35, '131.00', '0.00', '27.51', '158.51', 'Dung', 'Doan', '0866063426', 'doanvietdung0103@gmail.com', '+84866063426', '+84866063426', 'Hà Đông', '0866063426', 'Vietnam', '10000', 'ordered', 0, '2021-07-22 16:20:49', '2021-07-22 16:20:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `order_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(41, 34, 49, '131.00', 1, '2021-05-31 09:28:25', '2021-05-31 09:28:25'),
(42, 34, 50, '131.00', 1, '2021-05-31 10:12:06', '2021-05-31 10:12:06'),
(46, 36, 54, '345.00', 3, '2021-06-04 00:17:37', '2021-06-04 00:17:37'),
(54, 34, 61, '131.00', 1, '2021-07-17 00:18:09', '2021-07-17 00:18:09'),
(55, 34, 62, '131.00', 1, '2021-07-17 00:23:46', '2021-07-17 00:23:46'),
(56, 34, 63, '131.00', 1, '2021-07-17 00:24:35', '2021-07-17 00:24:35'),
(57, 34, 64, '131.00', 1, '2021-07-17 00:24:59', '2021-07-17 00:24:59'),
(58, 34, 65, '131.00', 1, '2021-07-17 00:26:38', '2021-07-17 00:26:38'),
(59, 34, 66, '131.00', 1, '2021-07-17 00:28:27', '2021-07-17 00:28:27'),
(60, 34, 67, '131.00', 1, '2021-07-17 00:31:40', '2021-07-17 00:31:40'),
(61, 34, 68, '131.00', 1, '2021-07-22 16:20:49', '2021-07-22 16:20:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `regular_price` decimal(8,2) NOT NULL,
  `sale_price` decimal(8,2) DEFAULT NULL,
  `SKU` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_status` enum('instock','outofstock') COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `quanity` int(10) UNSIGNED NOT NULL DEFAULT 10,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `short_description`, `descriptions`, `regular_price`, `sale_price`, `SKU`, `stock_status`, `featured`, `quanity`, `image`, `images`, `category_id`, `created_at`, `updated_at`) VALUES
(31, 'sfdsfsd', 'sfdsfsd', 'sfdsfsd', 'sfdsfsd', '1500.00', '213.00', 'asd', 'instock', 0, 123, '1620117138.png', NULL, 36, '2021-05-04 01:32:18', '2021-05-04 01:32:18'),
(32, 'cvcvb', 'cvcvb', 'cvcvb', 'cvcvb', '1232.00', '123.00', '123123', 'instock', 0, 123, '1620773460.png', NULL, 39, '2021-05-11 15:51:00', '2021-05-11 15:51:00'),
(34, 'dfgd', 'dfgd', 'dfgd', 'dfgd', '131.00', '4.00', '12321', 'instock', 0, 8, '1620773577.png', NULL, 41, '2021-05-11 15:52:57', '2021-05-11 15:52:57'),
(35, 'asdadsa', 'asdadsa', 'asdadsa', 'asdadsa', '324.00', '23.00', '23432', 'instock', 0, 234, '1620778852.png', NULL, 35, '2021-05-11 17:20:52', '2021-05-11 17:20:52'),
(36, 'fgdfg', 'fgdfg', 'fgdfg', 'fgdfg', '345.00', NULL, '34', 'instock', 0, 4, '1620779700.png', NULL, 36, '2021-05-11 17:35:00', '2021-05-11 17:35:00'),
(37, 'gfg', 'gfg', '<p><strong>sđsfsfsd:</strong>sdfsfs</p>\n<h2>sdfdsfdsf:shdfs</h2>', '<p><strong>sđsfsfsd:</strong>sdfsfs</p>\n<h2>sdfdsfdsf:shdfs</h2>', '123.00', '23.00', '23', 'instock', 0, 123, '1621010621.jpg', NULL, 36, '2021-05-14 09:43:41', '2021-05-14 09:43:41'),
(39, 'wewefsdfsdf', 'wewefsdfsdf', '<p>sddsfdsfdsf</p>', '<p>sdfdsfsdfdsf</p>', '43.00', '4.00', 'sdfc', 'instock', 0, 324, '1624642510.png', ',16246425100.png,16246425101.png,16246425102.png', 35, '2021-06-25 10:35:10', '2021-06-25 10:35:10'),
(40, 'dcvxcv', 'dcvxcv', '<p>xcvcxv</p>', '<p>xcvcxv</p>', '24.00', '4.00', 'sf', 'instock', 0, 234, '1624644408.jpg', ',16246444080.jpg,16246444081.jpg,16246444082.jpg,16246444083.jpg,16246444084.jpg,16246444085.jpg', 41, '2021-06-25 11:06:48', '2021-06-25 11:06:48'),
(41, 'XDFGDFG', 'xdfgdfg', '<p>DFGFDGFDG</p>', '<p>DFFDGFDGFDG</p>', '234.00', '43.00', 'ƯEFR', 'instock', 0, 324, '1624644579.jpg', ',16246445790.jpg,16246445791.jpg,16246445792.jpg,16246445793.jpg,16246445794.jpg,16246445795.jpg,16246445796.jpg,16246445797.jpg,16246445798.jpg', 41, '2021-06-25 11:09:39', '2021-06-25 11:09:39'),
(42, 'hjk', 'hjk', '<p>hkhjk</p>', '<p>hjkj</p>', '57.00', '6.00', 'ghj', 'instock', 0, 65, '1625106062.jpg', ',16251060620.jpg,16251060621.png,16251060622.png,16251060623.png,16251060624.jpg,16251060625.jpg,16251060626.jpg,16251060627.jpg,16251060628.png,16251060629.png,162510606210.png,162510606211.jpg', 40, '2021-06-30 19:21:02', '2021-06-30 19:21:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sake_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sales`
--

INSERT INTO `sales` (`id`, `sake_date`, `status`, `created_at`, `updated_at`) VALUES
(2, '2021-06-28 10:15:43', 0, NULL, '2021-05-11 22:43:26'),
(3, '2021-05-12 10:15:43', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('sxE2saSoImRBNQOOEZR1YYjCb6ZK9ccRJFVEksEz', 36, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiNmVnNklXdFdmV2hpaVkyTVBDS096UHpTc0FyU3RJQ0hkcTkyVGRMNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM2O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkbm82U3R5cWJxeDFZTGdDVm9GQ1MxdUxyWk5rNnZBR2VOcm1NMW9JR2pBaTNpUVVGLi5JUE8iO3M6NDoiY2FydCI7YToyOntzOjQ6ImNhcnQiO086Mjk6IklsbHVtaW5hdGVcU3VwcG9ydFxDb2xsZWN0aW9uIjoxOntzOjg6IgAqAGl0ZW1zIjthOjE6e3M6MzI6ImJkMzNlNGUyNGE5NDQ0ZDgzMWRmODI4NWY0YzE1ZTMwIjtPOjMyOiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbSI6OTp7czo1OiJyb3dJZCI7czozMjoiYmQzM2U0ZTI0YTk0NDRkODMxZGY4Mjg1ZjRjMTVlMzAiO3M6MjoiaWQiO2k6MzU7czozOiJxdHkiO2k6MTtzOjQ6Im5hbWUiO3M6NzoiYXNkYWRzYSI7czo1OiJwcmljZSI7ZDozMjQ7czo3OiJvcHRpb25zIjtPOjM5OiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbU9wdGlvbnMiOjE6e3M6ODoiACoAaXRlbXMiO2E6MDp7fX1zOjQ5OiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AYXNzb2NpYXRlZE1vZGVsIjtzOjE4OiJBcHBcTW9kZWxzXFByb2R1Y3QiO3M6NDE6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQB0YXhSYXRlIjtpOjIxO3M6NDE6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBpc1NhdmVkIjtiOjA7fX19czo4OiJ3aXNobGlzdCI7TzoyOToiSWxsdW1pbmF0ZVxTdXBwb3J0XENvbGxlY3Rpb24iOjE6e3M6ODoiACoAaXRlbXMiO2E6Mjp7czozMjoiMWQzYmY5ODZjMTA5ZDQ0M2YxNjFiYjM5NjI0OTEyODIiO086MzI6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtIjo5OntzOjU6InJvd0lkIjtzOjMyOiIxZDNiZjk4NmMxMDlkNDQzZjE2MWJiMzk2MjQ5MTI4MiI7czoyOiJpZCI7aTozNDtzOjM6InF0eSI7aToxO3M6NDoibmFtZSI7czo0OiJkZmdkIjtzOjU6InByaWNlIjtkOjEzMTtzOjc6Im9wdGlvbnMiO086Mzk6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtT3B0aW9ucyI6MTp7czo4OiIAKgBpdGVtcyI7YTowOnt9fXM6NDk6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBhc3NvY2lhdGVkTW9kZWwiO3M6MTg6IkFwcFxNb2RlbHNcUHJvZHVjdCI7czo0MToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAHRheFJhdGUiO2k6MjE7czo0MToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGlzU2F2ZWQiO2I6MDt9czozMjoiYmQzM2U0ZTI0YTk0NDRkODMxZGY4Mjg1ZjRjMTVlMzAiO086MzI6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtIjo5OntzOjU6InJvd0lkIjtzOjMyOiJiZDMzZTRlMjRhOTQ0NGQ4MzFkZjgyODVmNGMxNWUzMCI7czoyOiJpZCI7aTozNTtzOjM6InF0eSI7aToxO3M6NDoibmFtZSI7czo3OiJhc2RhZHNhIjtzOjU6InByaWNlIjtkOjMyNDtzOjc6Im9wdGlvbnMiO086Mzk6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtT3B0aW9ucyI6MTp7czo4OiIAKgBpdGVtcyI7YTowOnt9fXM6NDk6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBhc3NvY2lhdGVkTW9kZWwiO3M6MTg6IkFwcFxNb2RlbHNcUHJvZHVjdCI7czo0MToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAHRheFJhdGUiO2k6MjE7czo0MToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGlzU2F2ZWQiO2I6MDt9fX19fQ==', 1629052340);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shippings`
--

INSERT INTO `shippings` (`id`, `order_id`, `first_name`, `last_name`, `mobile`, `email`, `line1`, `line2`, `city`, `province`, `country`, `zip_code`, `created_at`, `updated_at`) VALUES
(10, 54, 'Dung', 'Doan', '+84866063426', 'doanvietdung0103@gmail.com', '0866063426', '+84866063426', 'Ha Noi', '+84866063426', 'Vietnam', '10000', '2021-06-04 00:17:37', '2021-06-04 00:17:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shoppingcart`
--

INSERT INTO `shoppingcart` (`identifier`, `instance`, `content`, `created_at`, `updated_at`) VALUES
('dskinmyheart@gmail.com', 'cart', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:1:{s:32:\"bd33e4e24a9444d831df8285f4c15e30\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"bd33e4e24a9444d831df8285f4c15e30\";s:2:\"id\";i:35;s:3:\"qty\";i:1;s:4:\"name\";s:7:\"asdadsa\";s:5:\"price\";d:324;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:0:{}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}}', '2021-08-15 11:32:08', NULL),
('dskinmyheart@gmail.com', 'wishlist', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:2:{s:32:\"1d3bf986c109d443f161bb3962491282\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"1d3bf986c109d443f161bb3962491282\";s:2:\"id\";i:34;s:3:\"qty\";i:1;s:4:\"name\";s:4:\"dfgd\";s:5:\"price\";d:131;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:0:{}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}s:32:\"bd33e4e24a9444d831df8285f4c15e30\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"bd33e4e24a9444d831df8285f4c15e30\";s:2:\"id\";i:35;s:3:\"qty\";i:1;s:4:\"name\";s:7:\"asdadsa\";s:5:\"price\";d:324;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:0:{}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}}', '2021-08-15 11:32:08', NULL),
('tn499430@gmail.com', 'cart', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2021-08-15 11:07:37', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `title`, `subtitle`, `price`, `link`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'asdsad', 'asdsad', '2323', 'adsadsadas', '1620305596.png', 'active', '2021-05-06 05:53:16', '2021-05-06 05:53:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `mode` enum('ship_cod','Card','Paypal') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approve','declined','refunded') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transactions`
--

INSERT INTO `transactions` (`id`, `order_id`, `user_id`, `mode`, `status`, `created_at`, `updated_at`) VALUES
(6, 49, 3, 'Card', 'approve', '2021-05-31 09:28:28', '2021-05-31 09:28:28'),
(7, 50, 3, 'Card', 'approve', '2021-05-31 10:12:09', '2021-05-31 10:12:09'),
(8, 54, 3, 'ship_cod', 'pending', '2021-06-04 00:17:37', '2021-06-04 00:17:37'),
(15, 61, 3, 'ship_cod', 'pending', '2021-07-17 00:18:09', '2021-07-17 00:18:09'),
(16, 64, 3, 'Card', 'approve', '2021-07-17 00:25:02', '2021-07-17 00:25:02'),
(17, 65, 3, 'Card', 'approve', '2021-07-17 00:26:41', '2021-07-17 00:26:41'),
(18, 66, 4, 'Card', 'approve', '2021-07-17 00:28:30', '2021-07-17 00:28:30'),
(19, 67, 4, 'Card', 'approve', '2021-07-17 00:31:43', '2021-07-17 00:31:43'),
(20, 68, 35, 'Card', 'approve', '2021-07-22 16:20:52', '2021-07-22 16:20:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USR' COMMENT 'ADM for Admin and USR for User or customer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date NOT NULL DEFAULT curdate(),
  `fb_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `utype`, `created_at`, `updated_at`, `address`, `image`, `birthday`, `fb_id`) VALUES
(3, 'adminsdf', 'admin@gmail.com', NULL, '$2y$10$JeaPErE4shJrA6KJedPqN.5wwiVNlZcXnFR73qO4VGHDApjaVvowS', NULL, NULL, NULL, NULL, NULL, 'ADM', '2021-04-26 12:26:19', '2021-06-08 11:09:01', 'sdfsdfds', '1623175741.jpg', '2021-06-29', NULL),
(4, 'user', 'user@gmail.com', NULL, '$2y$10$FslzCmmVB1fn9hx4zI.9.eWmorvPbARL5FfAxQ1NH1bhSVO5woBse', NULL, NULL, NULL, NULL, NULL, 'ADM', '2021-04-26 12:27:14', '2021-04-26 12:27:14', '', '', '2021-06-08', NULL),
(13, 'Dung Doan', 'doanvietdung012@gmail.com', NULL, '$2y$10$HLw1KllQ3KMucViNZKz9S./.Popz3RVRkMpilRJPNQqnGtulH68mK', NULL, NULL, NULL, NULL, NULL, 'USR', '2021-07-13 02:44:34', '2021-07-13 02:44:34', NULL, NULL, '2021-07-13', NULL),
(14, 'Dung Doan', 'tn499430@gmail.com', NULL, '$2y$10$P0t1/IM.aMmrRAu4fcg94Ogq8Q0mallvbGLyuP0/9qABnhrcn3qIi', NULL, NULL, NULL, NULL, NULL, 'USR', '2021-07-13 09:05:02', '2021-07-13 09:05:02', NULL, NULL, '2021-07-13', NULL),
(15, 'Dung Doan', 'doanvietdung009@gmail.com', NULL, '$2y$10$NWuUuoSc7Tp7FIwwU2HzcOlvM6IrlncS15FxMn2c4UkpMsoOl7w/W', NULL, NULL, NULL, NULL, NULL, 'USR', '2021-07-20 21:33:11', '2021-07-20 21:33:11', NULL, NULL, '2021-07-21', NULL),
(16, 'Dung Doan', 'userxcv@gmail.com', NULL, '$2y$10$cnT8qaa.xmyx6uRKZYkxPO6Bh4ug1o3OY3upofmDHChmCnhxlYH4C', NULL, NULL, NULL, NULL, NULL, 'USR', '2021-07-20 21:35:32', '2021-07-20 21:35:32', NULL, NULL, '2021-07-21', NULL),
(17, 'sdfdsfsdfdsf', 'usersdfs@gmail.com', NULL, '$2y$10$JAvWjlQfjOol3SQDfffxCeRU/mMt6I0SMg127LClveY91ukek0Nu.', NULL, NULL, NULL, NULL, NULL, 'USR', '2021-07-20 21:42:52', '2021-07-20 21:42:52', NULL, NULL, '2021-07-21', NULL),
(18, 'Dung Doan', 'doanviesdfdsftdung0103@gmail.com', NULL, '$2y$10$fYhYFV5SOed1mSnutUl72.yDaQA/0s1SeDPLo.vEZD5W/YTh8e.P.', NULL, NULL, NULL, NULL, NULL, 'USR', '2021-07-20 21:58:27', '2021-07-20 21:58:27', NULL, NULL, '2021-07-21', NULL),
(19, 'Dung Doan', 'dskinmyheasdfrt@gmail.com', NULL, '$2y$10$6m8ywv4Sqj8P5wHcmFnggefKwHNUKZVbGG4uTLzznB0eTn0vzI4ue', NULL, NULL, NULL, NULL, NULL, 'USR', '2021-07-20 22:40:47', '2021-07-20 22:40:47', NULL, NULL, '2021-07-21', NULL),
(20, 'doan viet dung', 'ussdasdsaer@gmail.com', NULL, '$2y$10$rGhWXuuYMH.7MGWrFUweZehK.eiMCyohCsxAIu40hOcN1zmfQqLIy', NULL, NULL, NULL, NULL, NULL, 'USR', '2021-07-20 22:56:48', '2021-07-20 22:56:48', NULL, NULL, '2021-07-21', NULL),
(21, 'Dung Doan', 'dskinsdfsdmyheart@gmail.com', NULL, '$2y$10$laLfx0/2ZUu8gehKqdBk9OalKwpsOLrlSpOErf9/xqeJPrYeUYWcm', NULL, NULL, NULL, NULL, NULL, 'USR', '2021-07-20 22:57:44', '2021-07-20 22:57:44', NULL, NULL, '2021-07-21', NULL),
(22, 'Dung Doan', 'ussdfdsfsdsdr@gmail.com', NULL, '$2y$10$kxb.QichXKm1PHgxdquAs.aZ7dgSJCqh/IAaCNlRoqUARJsLXyiAC', NULL, NULL, NULL, NULL, NULL, 'USR', '2021-07-20 23:01:27', '2021-07-20 23:01:27', NULL, NULL, '2021-07-21', NULL),
(23, 'Dung Doan', 'doanvizxcxzcxzetdung0103@gmail.com', NULL, '$2y$10$x7MeOYhiOLejrmGlNv1FZO8nq9XD/YWrUg7/myxUj4TFpA/il7SAu', NULL, NULL, NULL, NULL, NULL, 'USR', '2021-07-20 23:03:58', '2021-07-20 23:03:58', NULL, NULL, '2021-07-21', NULL),
(24, 'Dung Doan', 'userfdg@gmail.com', NULL, '$2y$10$HzeabCo7fPSUde8RKjA3eeZuscfp1AKfrNlS3QNpXV1ssKAFKQ9qK', NULL, NULL, NULL, NULL, NULL, 'USR', '2021-07-20 23:19:15', '2021-07-20 23:19:15', NULL, NULL, '2021-07-21', NULL),
(25, 'Dung Doan', 'us1er@gmail.com', NULL, '$2y$10$6z1cngk9d7wDOvdkoFh0yOTDJI2tzbDQh.l1K8knlfw75dpDGVIsC', NULL, NULL, NULL, NULL, NULL, 'USR', '2021-07-20 23:21:52', '2021-07-20 23:21:52', NULL, NULL, '2021-07-21', NULL),
(26, 'Dung Doan', 'uaAser@gmail.com', NULL, '$2y$10$Y5pEKg7y3pR7kTnv8zHNAOkq6NZZQ2fNQLASFaQRmd7vqkt4apfBC', NULL, NULL, NULL, NULL, NULL, 'USR', '2021-07-20 23:26:17', '2021-07-20 23:26:17', NULL, NULL, '2021-07-21', NULL),
(27, 'Dung Doan', 'doanviASaSetdung0103@gmail.com', NULL, '$2y$10$JByYWyfJwFvuhVT81926hefs08nYbs0.OxwoBYtlYxlF6Z7FMX0/a', NULL, NULL, NULL, NULL, NULL, 'USR', '2021-07-20 23:29:53', '2021-07-20 23:29:53', NULL, NULL, '2021-07-21', NULL),
(28, 'Dung Doan', 'doanvietducvbcvbng0103@gmail.com', NULL, '$2y$10$CfKbLbEoWa0mIbq9x9KovO84ZBm4LEay1uZD0jvoZGKieaCaBrk4O', NULL, NULL, NULL, NULL, NULL, 'USR', '2021-07-20 23:41:49', '2021-07-20 23:41:49', NULL, NULL, '2021-07-21', NULL),
(29, 'Dung Doan', 'doanvietsddsfsddung0103@gmail.com', NULL, '$2y$10$bqrpZPTCTK5mnAcHSqCizOZoakdwqzcBPszVd9wt6HGMWKIXobJ5.', NULL, NULL, NULL, NULL, NULL, 'USR', '2021-07-20 23:44:02', '2021-07-20 23:44:02', NULL, NULL, '2021-07-21', NULL),
(30, 'Dung Doan', 'doanvietdung0010@gmail.com', NULL, '$2y$10$wIPaHBwwDms2pTXQPwKB/eYrYinGC6.d7EuElTW/wyDtxe2Vi0f/W', NULL, NULL, NULL, NULL, NULL, 'USR', '2021-07-20 23:45:29', '2021-07-20 23:45:29', NULL, NULL, '2021-07-21', NULL),
(31, 'Dung Doan', 'doanvietdung01dsf03@gmail.com', NULL, '$2y$10$Q7MmKULrzI9dSrIDLPqzYuZ4wA9fFVfxDtu.RUqqOenNr38V4K8vq', NULL, NULL, NULL, NULL, NULL, 'USR', '2021-07-20 23:57:54', '2021-07-20 23:57:54', NULL, NULL, '2021-07-21', NULL),
(32, 'Dung Doan', 'doanvietdung0sdfs103@gmail.com', NULL, '$2y$10$96g6lC2BlM7X1tF0pWOxQeRMcX8.AySWrj7/FYWx4fIERo/GdLdta', NULL, NULL, NULL, NULL, NULL, 'USR', '2021-07-21 00:02:56', '2021-07-21 00:02:56', NULL, NULL, '2021-07-21', NULL),
(33, 'Dung Doan', 'doanviezfcsztdung0103@gmail.com', NULL, '$2y$10$S0.Xn0Lus9ifU/o02BiykOSIvdn/AxI.aAD55yamlaIahAcbrks2W', NULL, NULL, NULL, NULL, NULL, 'USR', '2021-07-22 15:34:35', '2021-07-22 15:34:35', NULL, NULL, '2021-07-23', NULL),
(34, 'Dung Doan', 'dskinmycvbdheart@gmail.com', NULL, '$2y$10$gLpMF/bSxiRxvaHajG6tj.mcoj2ki2GJ.j0xmoxp/Pw4TuTGFd44y', NULL, NULL, NULL, NULL, NULL, 'USR', '2021-07-22 15:35:55', '2021-07-22 15:35:55', NULL, NULL, '2021-07-23', NULL),
(35, 'Dung Doan', 'ussdfsfer@gmail.com', NULL, '$2y$10$VUkqkt4QabzJ1gRz8D1ljOT5TnyGkvZdJQ4Uy/eKGWPz.bforgsBG', NULL, NULL, NULL, NULL, NULL, 'USR', '2021-07-22 15:37:39', '2021-07-22 15:37:39', NULL, NULL, '2021-07-23', NULL),
(36, 'Dung Doan', 'dskinmyheart@gmail.com', '2021-07-22 16:32:23', '$2y$10$no6Styqbqx1YLgCVoFCS1uLrZNk6vAGeNrmM1oIGjAi3iQUF..IPO', NULL, NULL, NULL, NULL, NULL, 'USR', '2021-07-22 16:31:45', '2021-08-15 11:09:31', NULL, '1629050971.jpg', '2021-07-23', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `home_categories`
--
ALTER TABLE `home_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shippings_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_order_id_foreign` (`order_id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `home_categories`
--
ALTER TABLE `home_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `shippings`
--
ALTER TABLE `shippings`
  ADD CONSTRAINT `shippings_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
