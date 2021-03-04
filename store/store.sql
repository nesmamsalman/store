-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2021 at 08:30 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `productgroup_id` int(11) NOT NULL,
  `title_en` varchar(191) NOT NULL,
  `title_ar` varchar(191) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` varchar(300) NOT NULL DEFAULT '',
  `sort` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `productgroup_id`, `title_en`, `title_ar`, `image`, `status`, `sort`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 1, 'fgdgrdgreddddd', 'لبلبdsgf', 'https://images.ctfassets.net/hrltx12pl8hq/7yQR5uJhwEkRfjwMFJ7bUK/dc52a0913e8ff8b5c276177890eb0129/offset_comp_772626-opt.jpg?fit=fill&w=800&h=300', 'Not Active', 8, '2021-03-03 17:15:48', '2021-03-03 17:15:48', '2021-03-03 17:15:48'),
(10, 3, ' mnk', 'لبلب', 'https://filedn.com/ltOdFv1aqz1YIFhf4gTY8D7/ingus-info/BLOGS/Photography-stocks3/stock-photography-slider.jpg', 'Not Active', 1, '2021-03-03 19:01:40', '2021-03-03 19:01:40', '2021-03-03 19:01:40');

-- --------------------------------------------------------

--
-- Table structure for table `cartitems`
--

CREATE TABLE `cartitems` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cartitems`
--

INSERT INTO `cartitems` (`id`, `item_id`, `orders_id`, `price`, `quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 14, 7, 5245, 12245, '2021-03-04 18:45:47', '2021-03-04 18:45:47', '2021-03-04 18:45:47');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name_en` varchar(300) NOT NULL,
  `name_ar` varchar(300) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT '',
  `sort` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_en`, `name_ar`, `status`, `sort`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'GFH', 'مقاهي', 'Active', 1, '2021-03-03 14:54:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `homesections`
--

CREATE TABLE `homesections` (
  `id` int(11) NOT NULL,
  `title_en` varchar(300) NOT NULL,
  `title_ar` varchar(300) NOT NULL,
  `sectiongroup_id` int(11) NOT NULL,
  `sectiontype_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `homesections`
--

INSERT INTO `homesections` (`id`, `title_en`, `title_ar`, `sectiongroup_id`, `sectiontype_id`, `sort`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, ' mnkfff', 'لبلبfff', 1, 3, 2, 'Not Active', '2021-03-04 09:11:23', '2021-03-04 09:11:23', '2021-03-04 09:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `title_en` varchar(300) NOT NULL,
  `title_ar` varchar(300) NOT NULL,
  `description_en` varchar(300) NOT NULL,
  `description_ar` varchar(300) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` varchar(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `thumnailimage_url` varchar(233) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT '',
  `sort` int(13) NOT NULL,
  `video_url` varchar(122) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `title_en`, `title_ar`, `description_en`, `description_ar`, `price`, `discount`, `quantity`, `category_id`, `thumnailimage_url`, `status`, `sort`, `video_url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(14, 'sefrgg', 'svfs', 'fdvfd', 'drg', 10, '10', 10, 1, 'wefr', 'activ', 1, 'rgrg', '2021-03-04 06:22:54', NULL, NULL),
(15, 'sef', 'svfs', 'fdvfd', 'drg', 10, '10', 10, 1, 'wefr', 'activ', 1, 'rgrg', '2021-03-03 15:29:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items_images_main`
--

CREATE TABLE `items_images_main` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `image` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items_images_main`
--

INSERT INTO `items_images_main` (`id`, `item_id`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 15, 'IMG-20210114-WA0007.jpg', '2021-03-03 15:36:32', '2021-03-03 15:36:18', '2021-03-03 15:36:18'),
(2, 15, 'IMG-20210114-WA0005.jpg', '2021-03-03 16:58:53', '2021-03-03 16:58:53', '2021-03-03 16:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status_id` int(11) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `customer_mobile` int(50) NOT NULL,
  `address` varchar(191) NOT NULL,
  `city` varchar(100) NOT NULL,
  `total` int(100) NOT NULL,
  `payment_type_id` int(11) NOT NULL,
  `payment_status_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date`, `status_id`, `customer_name`, `customer_mobile`, `address`, `city`, `total`, `payment_type_id`, `payment_status_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, '0000-00-00', 1, '2gyjfjjhv55', 22222, 'gaza5', 'gaza5', 12225, 3, 1, '2021-03-04 13:00:28', '2021-03-04 13:00:28', '2021-03-04 13:00:28'),
(9, '5555-05-05', 1, 'gr', 258963, 'gaza', 'gaza', 122, 3, 3, '2021-03-04 13:29:59', '2021-03-04 13:29:59', '2021-03-04 13:29:59');

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE `orderstatus` (
  `id` int(11) NOT NULL,
  `title_en` varchar(300) NOT NULL,
  `title_ar` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` (`id`, `title_en`, `title_ar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ffff', 'eeeef', '2021-03-04 10:34:07', '2021-03-04 10:34:07', '2021-03-04 10:34:07'),
(2, 'eeee', 'eeee', '2021-03-04 10:34:26', '2021-03-04 10:34:26', '2021-03-04 10:34:26');

-- --------------------------------------------------------

--
-- Table structure for table `pagesmanagemet`
--

CREATE TABLE `pagesmanagemet` (
  `id` int(11) NOT NULL,
  `title_en` varchar(300) NOT NULL,
  `title_ar` varchar(300) NOT NULL,
  `description_en` varchar(300) NOT NULL,
  `description_ar` varchar(300) NOT NULL,
  `sort` int(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pagesmanagemet`
--

INSERT INTO `pagesmanagemet` (`id`, `title_en`, `title_ar`, `description_en`, `description_ar`, `sort`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, ' mnkff', 'لبلبfff', 'dfbgbgdbdffffff', 'fddfbdfbffff', 2, 'Not Active', '2021-03-04 10:22:09', '2021-03-04 10:00:12', '2021-03-04 10:00:12'),
(3, 'rrrrrr', 'لبلبrr', 'rrrrrrrrrrrrrrrrrrrr', 'rrrrrrrrrrrrrrr', 2, 'Not Active', '2021-03-04 10:10:13', '2021-03-04 10:10:13', '2021-03-04 10:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `paymentstatus`
--

CREATE TABLE `paymentstatus` (
  `id` int(11) NOT NULL,
  `title_en` varchar(300) NOT NULL,
  `title_ar` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymentstatus`
--

INSERT INTO `paymentstatus` (`id`, `title_en`, `title_ar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, ' mnkrrr', 'لبلبrrr', '2021-03-04 10:45:45', '2021-03-04 10:45:45', '2021-03-04 10:45:45'),
(3, 's;fskopjvfpo', 'منسبهىمنىري', '2021-03-04 12:27:41', '2021-03-04 12:27:41', '2021-03-04 12:27:41');

-- --------------------------------------------------------

--
-- Table structure for table `paymenttype`
--

CREATE TABLE `paymenttype` (
  `id` int(11) NOT NULL,
  `title_en` varchar(300) NOT NULL,
  `title_ar` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymenttype`
--

INSERT INTO `paymenttype` (`id`, `title_en`, `title_ar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, ' mnkee', 'لبلبee', '2021-03-04 10:54:53', '2021-03-04 12:54:53', '2021-03-04 10:54:53'),
(3, 'drgdg', 'grrdg', '2021-03-04 12:28:34', '2021-03-04 14:28:34', '2021-03-04 12:28:34');

-- --------------------------------------------------------

--
-- Table structure for table `productgroup`
--

CREATE TABLE `productgroup` (
  `id` int(11) NOT NULL,
  `title_en` varchar(300) NOT NULL,
  `title_ar` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productgroup`
--

INSERT INTO `productgroup` (`id`, `title_en`, `title_ar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'GFHgregvdf', 'مقاهيwefrgsef', '2021-03-03 15:41:35', '2021-03-03 15:41:35', '2021-03-03 15:41:35'),
(3, 'GFH', 'hgkkghk', '2021-03-03 16:06:45', '2021-03-03 16:06:45', '2021-03-03 16:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `productsgroupsitems`
--

CREATE TABLE `productsgroupsitems` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `productgroup_id` int(11) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productsgroupsitems`
--

INSERT INTO `productsgroupsitems` (`id`, `item_id`, `productgroup_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 15, 1, 'Not Active', '2021-03-04 05:56:37', '2021-03-04 05:56:37', '2021-03-04 05:56:37'),
(3, 14, 1, 'Not Active', '2021-03-04 06:25:49', '2021-03-04 06:25:49', '2021-03-04 06:25:49');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'nems', 'eng.nesma.salman@gmail.com', 123, '2021-03-03 14:49:22', '2021-03-03 14:49:22', '2021-03-03 14:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `sectiongroup`
--

CREATE TABLE `sectiongroup` (
  `id` int(11) NOT NULL,
  `title_en` varchar(300) NOT NULL,
  `title_ar` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sectiongroup`
--

INSERT INTO `sectiongroup` (`id`, `title_en`, `title_ar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, ' mnk', 'سنتبلارسنيبرنزى', '2021-03-04 08:18:07', '2021-03-04 08:18:07', '2021-03-04 08:18:07'),
(3, ' mnkfff', 'ربيربيربي', '2021-03-04 08:22:12', '2021-03-04 08:22:12', '2021-03-04 08:22:12'),
(4, ' mnk', 'لبلب', '2021-03-04 10:30:36', '2021-03-04 10:30:36', '2021-03-04 10:30:36');

-- --------------------------------------------------------

--
-- Table structure for table `sectiontype`
--

CREATE TABLE `sectiontype` (
  `id` int(11) NOT NULL,
  `title_en` varchar(300) NOT NULL,
  `title_ar` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sectiontype`
--

INSERT INTO `sectiontype` (`id`, `title_en`, `title_ar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'nhffsgnferf', 'سويزefewf', '2021-03-04 08:08:40', '2021-03-04 08:08:40', '2021-03-04 08:08:40'),
(4, 'rrrrrrr', 'rrrrr', '2021-03-04 12:28:01', '2021-03-04 12:28:01', '2021-03-04 12:28:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productgroup_id` (`productgroup_id`);

--
-- Indexes for table `cartitems`
--
ALTER TABLE `cartitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `orders_id` (`orders_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homesections`
--
ALTER TABLE `homesections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sectiontype_id` (`sectiontype_id`),
  ADD KEY `sectiongroup_id` (`sectiongroup_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `items_images_main`
--
ALTER TABLE `items_images_main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `payment_type_id` (`payment_type_id`),
  ADD KEY `payment_status_id` (`payment_status_id`);

--
-- Indexes for table `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagesmanagemet`
--
ALTER TABLE `pagesmanagemet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentstatus`
--
ALTER TABLE `paymentstatus`
  ADD KEY `id` (`id`);

--
-- Indexes for table `paymenttype`
--
ALTER TABLE `paymenttype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productgroup`
--
ALTER TABLE `productgroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productsgroupsitems`
--
ALTER TABLE `productsgroupsitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `productgroup_id` (`productgroup_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sectiongroup`
--
ALTER TABLE `sectiongroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sectiontype`
--
ALTER TABLE `sectiontype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cartitems`
--
ALTER TABLE `cartitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homesections`
--
ALTER TABLE `homesections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `items_images_main`
--
ALTER TABLE `items_images_main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orderstatus`
--
ALTER TABLE `orderstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pagesmanagemet`
--
ALTER TABLE `pagesmanagemet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paymentstatus`
--
ALTER TABLE `paymentstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paymenttype`
--
ALTER TABLE `paymenttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `productgroup`
--
ALTER TABLE `productgroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `productsgroupsitems`
--
ALTER TABLE `productsgroupsitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sectiongroup`
--
ALTER TABLE `sectiongroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sectiontype`
--
ALTER TABLE `sectiontype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `homesections`
--
ALTER TABLE `homesections`
  ADD CONSTRAINT `homesections_ibfk_1` FOREIGN KEY (`sectiongroup_id`) REFERENCES `sectiongroup` (`id`),
  ADD CONSTRAINT `homesections_ibfk_2` FOREIGN KEY (`sectiontype_id`) REFERENCES `sectiontype` (`id`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`payment_status_id`) REFERENCES `paymentstatus` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`payment_type_id`) REFERENCES `paymenttype` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `orderstatus` (`id`);

--
-- Constraints for table `productsgroupsitems`
--
ALTER TABLE `productsgroupsitems`
  ADD CONSTRAINT `productsgroupsitems_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `productsgroupsitems_ibfk_2` FOREIGN KEY (`productgroup_id`) REFERENCES `productgroup` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
