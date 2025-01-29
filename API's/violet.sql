-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2025 at 08:47 PM
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
-- Database: `violet`
--

-- --------------------------------------------------------

--
-- Table structure for table `bottles`
--

CREATE TABLE `bottles` (
  `bottle_id` int(11) NOT NULL,
  `bottle_name` varchar(100) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_available` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bottles`
--

INSERT INTO `bottles` (`bottle_id`, `bottle_name`, `cost`, `quantity`, `created_at`, `updated_at`, `is_available`) VALUES
(1, 'Normal 100 ML', 0.25, 8, '2024-12-13 19:22:26', '2024-12-13 20:02:21', 1),
(2, 'luxury 100 ML bottle', 1.35, 2, '2025-01-19 20:59:13', '2025-01-19 20:59:13', 1),
(3, 'luxury 50 ML bottle', 1.25, 3, '2025-01-19 20:59:30', '2025-01-19 20:59:30', 1),
(4, 'Bobo 30 ML bootle', 0.15, 51, '2025-01-19 21:00:10', '2025-01-19 21:00:10', 1),
(5, 'Tester 10 ML Bottle', 0.15, 54, '2025-01-19 21:00:28', '2025-01-19 21:00:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `material_id` int(11) NOT NULL,
  `material_name` varchar(100) NOT NULL,
  `cost_per_ml` decimal(10,2) NOT NULL,
  `quantity_in_ml` decimal(10,2) NOT NULL,
  `is_available` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oils`
--

CREATE TABLE `oils` (
  `oil_id` int(11) NOT NULL,
  `oil_name` varchar(100) NOT NULL,
  `cost_per_ml` decimal(10,2) NOT NULL,
  `quantity_in_ml` decimal(10,2) NOT NULL,
  `is_available` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oils`
--

INSERT INTO `oils` (`oil_id`, `oil_name`, `cost_per_ml`, `quantity_in_ml`, `is_available`, `created_at`, `updated_at`) VALUES
(1, 'Dior Suvage', 0.06, 30.00, 1, '2024-10-19 16:01:27', '2024-10-24 14:57:51'),
(2, 'Silver Sent', 0.06, 50.00, 1, '2024-10-24 17:15:50', '2024-12-18 08:49:29'),
(3, 'Gentleman Givenchy', 0.06, 50.00, 1, '2024-12-18 08:46:35', '2024-12-18 08:48:59'),
(4, 'Dior Homme Intense', 0.06, 50.00, 1, '2024-12-18 08:46:47', '2024-12-18 08:49:20'),
(5, 'Black Orchid', 0.06, 50.00, 1, '2024-12-18 08:50:21', '2024-12-18 08:50:21'),
(6, 'Althaïr de Marly', 0.06, 50.00, 1, '2024-12-18 08:50:50', '2024-12-18 08:50:50'),
(7, 'Le Male Elixir', 0.06, 50.00, 1, '2024-12-18 08:55:26', '2024-12-18 08:55:26'),
(8, 'Angels\' Share By Kilian', 0.06, 70.00, 1, '2024-12-18 08:57:27', '2024-12-18 08:57:27'),
(9, 'Khamrah Lattafa', 0.06, 50.00, 1, '2024-12-18 08:57:48', '2024-12-18 08:57:48'),
(10, 'Hudson Valley', 0.06, 50.00, 1, '2024-12-18 08:59:09', '2024-12-18 08:59:09'),
(11, 'Hudson Valley Gissah', 0.06, 50.00, 1, '2024-12-18 09:05:00', '2024-12-18 09:05:00'),
(12, 'Imperial Valley Gissah', 0.06, 50.00, 1, '2024-12-18 09:05:37', '2024-12-18 09:05:37'),
(13, 'You Amber Giorgio Armani', 0.12, 30.00, 1, '2024-12-18 09:06:53', '2024-12-18 09:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','completed','shipped') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `size` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_at_purchase` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_size_list` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `product_description` longtext DEFAULT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_gender` varchar(25) DEFAULT NULL,
  `Product_image_path` varchar(255) NOT NULL,
  `quantity_sold` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_size_list`, `product_description`, `product_price`, `product_gender`, `Product_image_path`, `quantity_sold`, `is_active`) VALUES
(1, 'بديل عطر ديور هوم انتنس Dior Home Intense', '{\"10ml\":\"1\",\"30ml\":\"3\",\"50ml\":\"5\",\"100ml\":\"8\"}', NULL, '8', 'male', '/uploads/بديل عطر ديور هوم انتنس.png', '0', 0),
(2, 'بديل عطر الثائر Althaïr Parfums de Marly', '{\"10ml\":\"1\",\"30ml\":\"3\",\"50ml\":\"5\",\"100ml\":\"8\"}', NULL, '8', 'male', '/uploads/بديل عطر الثائر Althaïr Parfums de Marly.png', '0', 0),
(3, 'بديل عطر توم فورد بلاك اوركيد Black Orchid', '{\"10ml\":\"1\",\"30ml\":\"3\",\"50ml\":\"5\",\"100ml\":\"8\"}', NULL, '8', 'unisex', '/uploads/بديل عطر توم فورد بلاك اوركيد Black Orchid.png', '0', 0),
(4, 'بديل عطر قصة امبريال فالي Imperial Valley', '{\"10ml\":\"1\",\"30ml\":\"3\",\"50ml\":\"5\",\"100ml\":\"8\"}', NULL, '8', 'unisex', '/uploads/بديل عطر قصة امبريال فالي Imperial Valley.png', '0', 1),
(5, 'بديل عطر ارمني سترونجر وذ يوو عنبر Stronger With You Amber', '{\"10ml\":\"3\",\"30ml\":\"6\",\"50ml\":\"10\",\"100ml\":\"16\"}', NULL, '16', 'male', '/uploads/بديل عطر ارمني سترونجر وذ يوو عنبر Stronger With You Amber.png', '0', 1),
(6, 'بديل عطر سلفر سنت Silver Scent', '{\"10ml\":\"1\",\"30ml\":\"3\",\"50ml\":\"5\",\"100ml\":\"8\"}', NULL, '8', 'male', '/uploads/بديل عطر سلفر سنت Silver Scent.png', '0', 0),
(7, 'بديل عطر خمرة من لطافة Khamrah Lattafa', '{\"10ml\":\"1\",\"30ml\":\"3\",\"50ml\":\"5\",\"100ml\":\"8\"}', NULL, '8', 'unisex', '/uploads/بديل عطر خمرة من لطافة Khamrah Lattafa.png', '0', 0),
(8, 'بديل عطر انجل شير Angels Share', '{\"10ml\":\"1\",\"30ml\":\"3\",\"50ml\":\"5\",\"100ml\":\"8\"}', NULL, '8', 'unisex', '/uploads/بديل عطر انجل شير Angels Share.png', '0', 0),
(9, 'بديل عطر ليميل ليه بارفوم Le Male Le Parfum ', '{\"10ml\":\"1\",\"30ml\":\"3\",\"50ml\":\"5\",\"100ml\":\"8\"}', NULL, '8', 'male', '/uploads/بديل عطر ليميل ليه بارفوم Le Male Le Parfum .png', '0', 1),
(10, 'بديل عطر جيفينشي جنتل مان Gentleman Eau de Parfum Reserve Privée Givenchy', '{\"10ml\":\"1\",\"30ml\":\"3\",\"50ml\":\"5\",\"100ml\":\"8\"}', NULL, '8', 'male', '/uploads/بديل عطر جيفينشي جنتل مان Gentleman Eau de Parfum Reserve Privée Givenchy.png', '0', 0),
(11, 'بديل عطر ليميل الكسير Le Male Elixir', '{\"10ml\":\"1\",\"30ml\":\"3\",\"50ml\":\"5\",\"100ml\":\"8\"}', NULL, '8', 'male', '/uploads/بديل عطر ليميل الكسير Le Male Elixir.png', '0', 0),
(12, 'بديل عطر لاكوست الأبيض White Lacoste', '{\"10ml\":\"1\",\"30ml\":\"3\",\"50ml\":\"5\",\"100ml\":\"8\"}', NULL, '8', 'male', '/uploads/بديل عطر لاكوست الأبيض White Lacoste.png', '0', 0),
(13, 'بديل عطر 212 للرجال', '{\"10ml\":\"1\",\"30ml\":\"3\",\"50ml\":\"5\",\"100ml\":\"8\"}', NULL, '8', 'male', '/uploads/بديل عطر 212 للرجال.png', '0', 1),
(14, 'بديل عطر دنهل ديزاير Dunhill Desire', '{\"10ml\":\"1\",\"30ml\":\"3\",\"50ml\":\"5\",\"100ml\":\"8\"}', NULL, '8', 'male', '/uploads/بديل عطر دنهل ديزاير Dunhill Desire.png', '0', 1),
(15, 'بديل عطر اكوا دي جيو Acqua di Gio', '{\"10ml\":\"1\",\"30ml\":\"3\",\"50ml\":\"5\",\"100ml\":\"8\"}', NULL, '8', 'male', '/uploads/بديل عطر اكوا دي جيو Acqua di Gio.png', '0', 0),
(16, 'بديل عطر جوتشي جلتي Guilty Pour Homme Gucci', '{\"10ml\":\"1\",\"30ml\":\"3\",\"50ml\":\"5\",\"100ml\":\"8\"}', NULL, '8', 'male', '/uploads/بديل عطر جوتشي جلتي Guilty Pour Homme Gucci.png', '0', 0),
(17, 'بديل عطر بربري هيرو Hero Burberry', '{\"10ml\":\"1\",\"30ml\":\"3\",\"50ml\":\"5\",\"100ml\":\"8\"}', NULL, '8', 'male', '/uploads/بديل عطر بربري هيرو Hero Burberry.png', '0', 0),
(18, 'بديل عطر توم فورد توباكو فانيلا Tobacco Vanille Tom Ford', '{\"10ml\":\"1\",\"30ml\":\"3\",\"50ml\":\"5\",\"100ml\":\"8\"}', '<p class=\"ql-align-right\">Tobacco Vanille Tom Ford عطر شرقي - حار للجنسين.</p><p class=\"ql-align-right\">Tobacco Vanille صدر عام 2007. </p><p class=\"ql-align-right\">Olivier Gillotin قام بتوقيع هذا العطر.</p><p class=\"ql-align-right\"><strong style=\"color: rgb(153, 51, 255);\">افتتاحية العطر :</strong><span style=\"color: rgb(153, 51, 255);\"> </span> أوراق التبغ و رائحه التوابل</p><p class=\"ql-align-right\"><strong style=\"color: rgb(153, 51, 255);\">قلب العطر : </strong> الفانيليا, الكاكاو, حبوب التونكا و زهر التبغ</p><p class=\"ql-align-right\"> <strong style=\"color: rgb(153, 51, 255);\">قاعدة العطر : </strong>تتكون من الفواكه المجففة و الأخشاب</p>', '8', 'unisex', '/uploads/بديل عطر توم فورد توباكو فانيلا Tobacco Vanille Tom Ford.png', '0', 1),
(19, 'بديل عطر ارماني سترونجر وذ يوو ليذير Stronger With You Leather', '{\"10ml\":\"2\",\"30ml\":\"5\",\"50ml\":\"8\",\"100ml\":\"12\"}', 'undefined', '12', 'male', '/uploads/بديل عطر ارماني سترونجر وذ يوو ليذير Stronger With You Leather.png', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `oil_id` int(11) DEFAULT NULL,
  `bottle_id` int(11) DEFAULT NULL,
  `oil_cost` decimal(10,2) NOT NULL,
  `bottle_cost` decimal(10,2) NOT NULL,
  `material_cost` decimal(10,2) NOT NULL,
  `base_cost_price` decimal(10,2) GENERATED ALWAYS AS (`oil_cost` + `bottle_cost` + `material_cost`) STORED,
  `sale_price` decimal(10,2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `final_cost_price` decimal(10,2) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_available` tinyint(4) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `review_text` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('admin','customer') DEFAULT 'customer',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bottles`
--
ALTER TABLE `bottles`
  ADD PRIMARY KEY (`bottle_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `oils`
--
ALTER TABLE `oils`
  ADD PRIMARY KEY (`oil_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `oil_id` (`oil_id`),
  ADD KEY `bottle_id` (`bottle_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bottles`
--
ALTER TABLE `bottles`
  MODIFY `bottle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oils`
--
ALTER TABLE `oils`
  MODIFY `oil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`oil_id`) REFERENCES `oils` (`oil_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`bottle_id`) REFERENCES `bottles` (`bottle_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
