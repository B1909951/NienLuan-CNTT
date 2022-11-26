-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2022 at 09:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `level` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `avatar`, `email`, `phone`, `password`, `created_at`, `updated_at`, `level`) VALUES
(1, 'Root', 'c8f106714e378a69d32682.jpg', 'admin@gmail.com', '0965918874', 'admin@gmail.com', '2022-09-08', '2022-09-10', 0),
(12, 'Hà Chánh Nam', 'c8f106714e378a69d32654.jpg', 'hachanhnam10@gmail.com', '0965918874', 'chanhnam9', '2022-09-10', '2022-09-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `count` int(10) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cart_id`, `customer_id`, `product_id`, `count`, `created_at`, `updated_at`) VALUES
(43, 10, 38, 1, '2022-11-19', '2022-11-19'),
(44, 10, 35, 1, '2022-11-19', '2022-11-19'),
(45, 10, 37, 2, '2022-11-19', '2022-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `show` int(1) NOT NULL DEFAULT 1,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `desc`, `show`, `created_at`, `updated_at`) VALUES
(12, 'Manga', 'Truyện tranh nhật bản', 1, '2022-11-19', '2022-11-19'),
(13, 'Manhua', 'Truyện tranh Trung Quốc', 1, '2022-11-19', '2022-11-19'),
(14, 'Manhwa', 'Truyện tranh Hàn Quốc', 1, '2022-11-19', '2022-11-19'),
(15, 'Tiểu thuyết', 'Thể loại truyện chữ có ít hình ảnh minh họa', 2, '2022-11-19', '2022-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(10) UNSIGNED DEFAULT 0,
  `status` int(1) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `code`, `value`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Khong', 0, 1, NULL, NULL),
(5, '20thang11', 20, 2, '2022-11-19', '2022-11-19'),
(6, 'Noel', 25, 1, '2022-11-19', '2022-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `email`, `phone`, `password`, `created_at`, `updated_at`, `address`, `status`) VALUES
(10, '1', '1@gmail.com', '1', '1', '2022-11-19', '2022-11-19', 'Cần Thơ', 1),
(11, '2', '2@gmail.com', '2', '2', '2022-11-19', '2022-11-19', '123', 1),
(12, 'Hà Chánh Nam', 'hachanhnamb1909951@gmail.com', '0965918874', 'chanhnam9', '2022-11-27', '2022-11-27', 'ĐH Cần Thơ, KTX A', 2);

-- --------------------------------------------------------

--
-- Table structure for table `details_orders`
--

CREATE TABLE `details_orders` (
  `details_order_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `count` int(20) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `details_orders`
--

INSERT INTO `details_orders` (`details_order_id`, `customer_id`, `product_id`, `order_id`, `count`, `created_at`, `updated_at`) VALUES
(33, 10, 36, 54, 30, '2022-11-19', '2022-11-19'),
(34, 11, 36, 55, 1, '2022-11-19', '2022-11-19'),
(35, 11, 37, 55, 1, '2022-11-19', '2022-11-19'),
(36, 11, 30, 56, 1, '2022-11-19', '2022-11-19'),
(37, 11, 36, 57, 1, '2022-11-19', '2022-11-19'),
(38, 11, 37, 57, 1, '2022-11-19', '2022-11-19'),
(39, 12, 36, 58, 1, '2022-11-27', '2022-11-27'),
(40, 12, 36, 59, 2, '2022-11-27', '2022-11-27'),
(41, 12, 34, 60, 1, '2022-11-27', '2022-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `show` int(1) NOT NULL DEFAULT 1,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `desc`, `show`, `created_at`, `updated_at`) VALUES
(16, 'Học đường', 'Xoay quanh cuộc sống học đường', 1, '2022-11-19', '2022-11-19'),
(17, 'Kinh dị', 'Dành cho người trên 18 tuổi', 2, '2022-11-19', '2022-11-27'),
(18, 'Siêu nhiên', 'Những siêu năng lực không xuất hiện trong thực tế', 1, '2022-11-19', '2022-11-19'),
(19, 'Hài hước', 'Vui nhộn và hài hước, mang đến tiếng cười cho đọc giả', 1, '2022-11-19', '2022-11-19'),
(20, 'Tình cảm', 'Câu chuyện về tình yêu đôi lứa', 1, '2022-11-19', '2022-11-19');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notif_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notif_id`, `customer_id`, `admin_id`, `message`, `status`, `created_at`, `updated_at`) VALUES
(25, 10, 12, 'Đơn hàng có mã 54 của bạn đang được vận chuyển', 1, '2022-11-19', '2022-11-19'),
(26, 10, 12, 'Đơn hàng có mã 54 của bạn đã được ký nhận', 1, '2022-11-19', '2022-11-19'),
(27, 11, 12, 'Đơn hàng có mã 55 của bạn đang được vận chuyển', 1, '2022-11-19', '2022-11-19'),
(28, 11, 12, 'Đơn hàng có mã 56 của bạn đang được vận chuyển', 1, '2022-11-19', '2022-11-19'),
(29, 11, 12, 'Đơn hàng có mã 55 của bạn đã bị hủy', 1, '2022-11-19', '2022-11-19'),
(30, 11, 12, 'Đơn hàng có mã 56 của bạn đã được ký nhận', 1, '2022-11-19', '2022-11-19'),
(31, 12, 12, 'Đơn hàng có mã 59 của bạn đang được vận chuyển', 1, '2022-11-27', '2022-11-27'),
(32, 12, 12, 'Đơn hàng có mã 58 của bạn đang được vận chuyển', 1, '2022-11-27', '2022-11-27'),
(33, 12, 12, 'Đơn hàng có mã 58 của bạn đã được ký nhận', 1, '2022-11-27', '2022-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `coupon_id` int(10) UNSIGNED NOT NULL,
  `sub_total` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `coupon_id`, `sub_total`, `total`, `type`, `address`, `status`, `created_at`, `updated_at`) VALUES
(54, 10, 6, 1800000, 1350000, 'Chuyển khoản', 'Cần Thơ', 2, '2022-11-19', '2022-11-19'),
(55, 11, 1, 128000, 128000, '1', '123', 4, '2022-11-19', '2022-11-19'),
(56, 11, 1, 55000, 55000, '1', '123', 2, '2022-11-19', '2022-11-19'),
(57, 11, 1, 128000, 128000, '1', '123', 0, '2022-11-19', '2022-11-19'),
(58, 12, 1, 60000, 60000, '1', '1', 2, '2022-11-27', '2022-11-27'),
(59, 12, 6, 120000, 90000, '1', 'ĐH Cần Thơ, KTX A', 1, '2022-11-27', '2022-11-27'),
(60, 12, 1, 20000, 20000, '1', 'ĐH Cần Thơ, KTX A', 0, '2022-11-27', '2022-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_id` int(10) UNSIGNED DEFAULT NULL,
  `price` int(11) NOT NULL,
  `desc` text NOT NULL,
  `detail` text NOT NULL,
  `star` int(10) UNSIGNED NOT NULL DEFAULT 5,
  `view` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `show` int(1) NOT NULL DEFAULT 1,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `cate_id`, `price`, `desc`, `detail`, `star`, `view`, `show`, `created_at`, `updated_at`) VALUES
(30, 'Cô Bạn Tôi Thầm Thích Lại Quên Mang Kính Rồi - Tập 4', 'co-ban-toi-tham-thich-lai-quen-mang-kinh-roi---tap-41961.jpg', 12, 55000, 'Cô bạn tôi thầm thích lại quên mang kính rồi! phải làm sao đây', 'Nhà xuất bản Kim Đồng', 5, 2, 1, '2022-11-19', '2022-11-19'),
(31, 'Thanh Gươm Diệt Quỷ', 'tieu-thuyet-chuyen-the---thanh-guom-diet-quy---cau-chuyen-ve-tinh-anh-em-va-doi-diet-quy-obi7466.jpg', 12, 80000, 'Kể về câu chuyện về hành trình đi diệt quỷ và giải thoát em gái khỏi lời nguyền quỷ của Tanjiro', 'Nhà xuất bản Kim Đồng', 5, 1, 1, '2022-11-19', '2022-11-19'),
(32, 'Thị trấn vắng mình tôi', 'thi-tran-vang-minh-toi_bia-14468.jpg', 15, 25000, 'Tôi đang ở đâu thế này, mọi người đã đi đâu hết rồi!', 'Nhà xuất bản kim đồng', 5, 1, 1, '2022-11-19', '2022-11-19'),
(33, 'Tanaka Lúc Nào Cũng Vật Vờ - Tập 3', 'tanaka-luc-nao-cung-vat-vo---tap-38781.jpg', 12, 48000, 'Câu chuyện về cậu bạn Tanaka lúc nào cũng vật vờ', 'Nhà xuất bản Kim Đồng', 5, 1, 1, '2022-11-19', '2022-11-19'),
(34, 'Tôi thăng cấp 1 mình', '9791191363029_126.jpg', 14, 20000, 'Tôi thăng cấp 1 mình', 'Nhà xuất bản Trẻ', 3, 4, 1, '2022-11-19', '2022-11-27'),
(35, '5cm/s', 'image_195509_1_408214.jpg', 15, 50000, '“Vận tốc rơi của hoa anh đào đấy. Năm centimet trên giây.”', 'Nhà xuất bản Trẻ', 5, 2, 1, '2022-11-19', '2022-11-19'),
(36, 'Cô Bạn Tôi Thầm Thích Lại Quên Mang Kính Rồi - Tập 5', 'co-ban-toi-tham-thich-lai-quen-mang-kinh-roi---tap-51251.jpg', 12, 60000, 'Cô bạn tôi thầm thích lại quên mang kính rồi! Phải làm sao đây', 'Nhà xuất bản Kim Đồng', 5, 7, 1, '2022-11-19', '2022-11-27'),
(37, 'Cậu ma nhà xí HaNaKo', 'cau-ma-nha-xi-hanako---tap-05743.jpg', 15, 68000, 'Hài hước', 'Nhà xuất bản trẻ', 5, 4, 1, '2022-11-19', '2022-11-27'),
(38, 'Tôi, Em Và Cuốn Tiểu Thuyết Còn Dang Dở', 't_i_-em-v_-cu_n-ti_u-thuy_t-c_n-dang-d_6434.jpg', 15, 39000, '“Tôi muốn kể lại câu chuyện hay nhất của mình thay vì để cho những ký ức ấy cứ thế mất đi.”', 'Nhà xuất bản Trẻ', 5, 2, 1, '2022-11-19', '2022-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `product_genres`
--

CREATE TABLE `product_genres` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `genre_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_genres`
--

INSERT INTO `product_genres` (`id`, `product_id`, `genre_id`, `name`, `created_at`, `updated_at`) VALUES
(132, 30, 16, 'Học đường', '2022-11-19', '2022-11-19'),
(133, 30, 19, 'Hài hước', '2022-11-19', '2022-11-19'),
(134, 30, 20, 'Tình cảm', '2022-11-19', '2022-11-19'),
(135, 31, 17, 'Kinh dị', '2022-11-19', '2022-11-19'),
(136, 31, 18, 'Siêu nhiên', '2022-11-19', '2022-11-19'),
(137, 31, 19, 'Hài hước', '2022-11-19', '2022-11-19'),
(138, 31, 20, 'Tình cảm', '2022-11-19', '2022-11-19'),
(139, 32, 16, 'Học đường', '2022-11-19', '2022-11-19'),
(140, 32, 18, 'Siêu nhiên', '2022-11-19', '2022-11-19'),
(141, 32, 20, 'Tình cảm', '2022-11-19', '2022-11-19'),
(142, 33, 16, 'Học đường', '2022-11-19', '2022-11-19'),
(143, 33, 19, 'Hài hước', '2022-11-19', '2022-11-19'),
(144, 34, 17, 'Kinh dị', '2022-11-19', '2022-11-19'),
(145, 34, 18, 'Siêu nhiên', '2022-11-19', '2022-11-19'),
(146, 34, 20, 'Tình cảm', '2022-11-19', '2022-11-19'),
(147, 35, 16, 'Học đường', '2022-11-19', '2022-11-19'),
(148, 35, 20, 'Tình cảm', '2022-11-19', '2022-11-19'),
(152, 36, 16, 'Học đường', '2022-11-19', '2022-11-19'),
(153, 36, 19, 'Hài hước', '2022-11-19', '2022-11-19'),
(154, 36, 20, 'Tình cảm', '2022-11-19', '2022-11-19'),
(155, 37, 16, 'Học đường', '2022-11-19', '2022-11-19'),
(156, 37, 18, 'Siêu nhiên', '2022-11-19', '2022-11-19'),
(157, 37, 19, 'Hài hước', '2022-11-19', '2022-11-19'),
(158, 37, 20, 'Tình cảm', '2022-11-19', '2022-11-19'),
(159, 38, 18, 'Siêu nhiên', '2022-11-19', '2022-11-19'),
(160, 38, 20, 'Tình cảm', '2022-11-19', '2022-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `rate_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(1) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`rate_id`, `customer_id`, `comment`, `rating`, `created_at`, `updated_at`, `product_id`, `status`) VALUES
(15, 12, 'Sản phẩm được duyệt và vận chuyển nhanh chóng, chất lượng sản phẩm rất tốt, cảm ơn shop!', 5, '2022-11-27', '2022-11-27', 36, 2),
(16, 12, 'Hay lắm', 3, '2022-11-27', '2022-11-27', 34, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `customer_id` (`customer_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `details_orders`
--
ALTER TABLE `details_orders`
  ADD PRIMARY KEY (`details_order_id`),
  ADD KEY `customer_id` (`customer_id`,`product_id`,`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notif_id`),
  ADD KEY `customer_id` (`customer_id`,`admin_id`),
  ADD KEY `notifications_ibfk_1` (`admin_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`,`coupon_id`),
  ADD KEY `orders_ibfk_2` (`coupon_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cate_id` (`cate_id`);

--
-- Indexes for table `product_genres`
--
ALTER TABLE `product_genres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`,`genre_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`rate_id`),
  ADD KEY `customer_id` (`customer_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `details_orders`
--
ALTER TABLE `details_orders`
  MODIFY `details_order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notif_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `product_genres`
--
ALTER TABLE `product_genres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `rate_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `details_orders`
--
ALTER TABLE `details_orders`
  ADD CONSTRAINT `details_orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `details_orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `details_orders_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`coupon_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_genres`
--
ALTER TABLE `product_genres`
  ADD CONSTRAINT `product_genres_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_genres_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `rates_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rates_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
