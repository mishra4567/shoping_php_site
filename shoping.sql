-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2024 at 01:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(111) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(111) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `status`, `pid`) VALUES
(25, 'chair', 1, 0),
(26, 'pritam', 1, 0),
(27, 'jnvhv', 1, 0),
(28, 'cat1', 0, 0),
(29, 'cat2', 0, 0),
(30, 'cat3', 0, 0),
(31, 'cat4', 0, 0),
(32, 'shirt', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobail` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobail`, `comment`, `added_on`) VALUES
(1, 'pritam', 'pritam@gmail.com', '9609379300', 'Test Query', '2024-05-01 00:09:10'),
(2, 'pritam', 'pritam@gmail.com', '9609379300', 'Test Query', '2024-05-01 00:09:10'),
(3, 'Pritam Mishra', 'a@gmail.com', '6745645', 'ughjbjh', '2024-05-18 08:27:50'),
(4, 'Pritam Mishra', 'mishrapritam831@gmail.com', '656533', 'gfvghvmhn', '2024-05-19 06:35:22'),
(5, 'admin', 'mishrapritam831@gmail.com', '64645645645', 'ytdftyfdjhgf', '2024-05-19 06:38:39');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(111) NOT NULL,
  `user_id` int(255) NOT NULL,
  `address` varchar(555) NOT NULL,
  `city` varchar(555) NOT NULL,
  `pincode` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `total_price` float NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `order_status` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `txnid` varchar(50) NOT NULL,
  `milhpayid` varchar(50) NOT NULL,
  `payu_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `address`, `city`, `pincode`, `payment_type`, `total_price`, `payment_status`, `order_status`, `added_on`, `txnid`, `milhpayid`, `payu_status`) VALUES
(1, 6, 'marishda', 'marishda', 721449, 'payU', 30002, 'pending', 1, '2024-05-25 07:40:31', '', '', ''),
(2, 6, 'Haldia,East Medinipur,West Bengal - 721635, Haldia,East Medinipur,West Bengal - 721635', 'Haldia', 721635, 'payU', 2882, 'pending', 1, '2024-06-11 01:40:26', '', '', ''),
(3, 9, 'kalkata, kalkata', 'kalkata', 700001, 'COD', 3599, 'success', 1, '2024-06-15 05:36:00', '', '', ''),
(4, 13, 'asdgdfh', 'wefdastf', 645632, 'payU', 3599, 'pending', 1, '2024-06-18 02:23:00', '', '', ''),
(5, 13, 'asdgdfh', 'wefdastf', 645632, 'COD', 10251, 'success', 1, '2024-06-18 04:44:49', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `added_on` datetime NOT NULL,
  `hgfvgh` int(11) NOT NULL,
  `yjtfhg` int(11) NOT NULL,
  `uyfgh` int(11) NOT NULL,
  `hjgfhh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `price`, `added_on`, `hgfvgh`, `yjtfhg`, `uyfgh`, `hjgfhh`) VALUES
(1, 1, 5, 4, 7313, '0000-00-00 00:00:00', 0, 0, 0, 0),
(2, 1, 3, 5, 60, '0000-00-00 00:00:00', 0, 0, 0, 0),
(3, 1, 2, 5, 90, '0000-00-00 00:00:00', 0, 0, 0, 0),
(4, 2, 7, 1, 3, '0000-00-00 00:00:00', 0, 0, 0, 0),
(5, 2, 4, 1, 2879, '0000-00-00 00:00:00', 0, 0, 0, 0),
(6, 3, 6, 1, 3599, '0000-00-00 00:00:00', 0, 0, 0, 0),
(7, 4, 6, 1, 3599, '0000-00-00 00:00:00', 0, 0, 0, 0),
(8, 5, 7, 1, 3, '0000-00-00 00:00:00', 0, 0, 0, 0),
(9, 5, 5, 1, 7313, '0000-00-00 00:00:00', 0, 0, 0, 0),
(10, 5, 4, 1, 2879, '0000-00-00 00:00:00', 0, 0, 0, 0),
(11, 5, 1, 1, 56, '0000-00-00 00:00:00', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Canceled'),
(4, 'Complete'),
(5, 'Shipped');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(111) NOT NULL,
  `categories_id` int(111) NOT NULL,
  `sub_categories_id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `qty` int(111) NOT NULL,
  `image` varchar(300) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `tex` int(11) NOT NULL,
  `meta_title` varchar(2000) NOT NULL,
  `best_seller` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `sub_categories_id`, `name`, `mrp`, `price`, `qty`, `image`, `short_desc`, `description`, `meta_desc`, `status`, `meta_keyword`, `tex`, `meta_title`, `best_seller`) VALUES
(1, 25, 0, 'test', 568, 56, 10, '6892576093_1.jpg', 'Armchair: A chair with supports for the arms, providing additional comfort.\r\nDining Chair: Often simpler in design, these are used around a dining table and may or may not have armrests.', 'A chair is a piece of furniture designed to provide a comfortable seating arrangement for one person. Its primary components typically include a seat, backrest, armrests, and legs. Chairs can vary significantly in design, materials, and functionality, serving different purposes in various settings such as homes, offices, and public spaces.', 'My Chear', 1, 'Chear69', 10, 'Chear', 1),
(2, 25, 4, 'Chair', 895, 90, 10, '2453624696_1.png', 'Office Chair: Designed for use at a desk, these chairs often have wheels, adjustable height, and ergonomic features to support long periods of sitting.\r\nRecliner: A chair that can tilt back, often with a footrest that extends, offering a more relaxed seating position.\r\nRocking Chair: Mounted on curved bands (rockers) that allow it to rock back and forth.', 'Chairs can be made from a variety of materials, including wood, metal, plastic, and upholstery. The choice of material affects the chair\'s durability, weight, and aesthetic appeal. Wooden chairs are classic and sturdy, metal chairs are often sleek and modern, while plastic chairs are lightweight and versatile. Upholstered chairs offer added comfort with cushioning and fabric or leather covers.', '', 1, '', 20, '', 0),
(3, 26, 0, 'admin', 632, 60, 10, '1927891373_2.jpg', 'Rocking Chair: Mounted on curved bands (rockers) that allow it to rock back and forth.', 'Modern chair design often emphasizes ergonomics to promote good posture and reduce strain on the body. Features such as lumbar support, adjustable height, and contoured seats help in maintaining comfort, especially during prolonged use. Ergonomically designed chairs are particularly important in office environments to enhance productivity and well-being.', '', 1, '', 10, '', 0),
(4, 25, 0, 'MAHARAJA Omega for Home, Office', 4499, 2879, 12, '2246527865_2.png', 'MAHARAJA Omega for Home, Office | Comfortable | Arm Rest | Bearing Capacity up to 200Kg Plastic Outdoor Chair  (Brown, Set of 4, Pre-assembled)', 'These plastic chairs are a wonderful addition to any home. Featuring a stylish design with an ergonomic seat back, these chairs are perfect for any hosting event. With the added benefit of being stackable, these chairs are ideal to bring out for any event where you need extra seating.', '', 1, '', 25, '', 0),
(5, 25, 0, 'Wakefit Safari Fabric Office Executive Chair', 13299, 7313, 56, '2567909880_3.jpg', 'Wakefit Safari Fabric Office Executive Chair  (Black, Grey, Optional Installation Available)', 'Our Safari high back office chairs online come with a synchro tilt mechanism that provides coordinated movement of the seat and back to support change of posture for comfortable working throughout the day. The ergonomic backrest of these office chairs online reduces stress on your spine and lower back while the adjustable lumbar support and arms helps you check your posture. The Wakefit Safari high back office chairs online have a mesh headrest which can protect you from annoying neck and shoulder area aches that have become a common occupational hazard. They also have a wide spider base for stability and durability.', 'This is a Chear', 1, 'chear45', 5465, 'Chear', 1),
(6, 26, 5, 'CELLBELL Desire C104 Mid Back', 9999, 3599, 56, '8179220578_4.jpg', 'CELLBELL Desire C104 Mid Back Comfortable Fabric Office Executive Chair  (Red, Optional Installation Available)', '1) Ergonomic Sitting Position : C104 Chair provides you best in class sitting postures for extra comfort. 2) Seat and Base : 2 inch Thick Foam Cushion Padded Seat for your long hours comfort | Pneumatic Hydraulic with 4 inch seat height adjustment | Breathable contoured Mesh Back Fabric | Chair comes with Sturdy Metal Base for extra strength. 3) Lumbar Adjustments : Lumbar adjustments can be pushed upward, down for better supports to the back. It also features locking back support lever adjustment, if you wish to relax or stretch legs! 4) Arm-rest : Padded Arm-rest. 5) Height Suitability : 5 ft to 6 ft. 6) Weight Capacity : 105 Kgs. 7) BIFMA Certified. 8) Warranty : 12 Months Warranty against Manufacturing Defects.', '', 1, '', 565, '', 0),
(7, 27, 0, 'GREEN SOUL Seoul-X Mid Back Ergonomic', 5980, 3, 56, '4124329009_5.jpg', 'GREEN SOUL Seoul-X Mid Back Ergonomic|Home,WFH|Moulded Foam|Extra Comfort Fabric Office Adjustable Arm Chair  (Black, Optional Installation Available)', 'Introducing the Green Soul Seoul-X Mid Back Ergonomic Office Chair. With its premium fabric upholstery on the chair back and seat, this chair offers a touch of luxury to your workspace. The wide molded foam chair seat provides exceptional comfort and support throughout the day. The chair frame is made of solid wood, ensuring long-lasting durability. Equipped with fixed PP armrests, this chair offers added support to your arms and shoulders. The push back mechanism allows the chair back to rock between 90-120 degrees, giving you the flexibility to find your preferred angle for relaxation or focused work. The Class 3 gas lift ensures smooth height adjustment, while the heavy-duty metal wheelbase and 50mm nylon dual castor wheels provide stability and effortless mobility on various floor surfaces. The Seoul-X chair has a weight holding capacity of 90 kgs, . It comes with a 15 Months warranty, giving you peace of mind. The chair is designed for easy assembly with the included DIY kit.', '', 1, '', 89, '', 0),
(16, 25, 4, 'u65ytehdgfdc', 565654, 6565, 1111, '3679708304_651584201_Floral-Embroidered-Polo-T-shirt.jpg', '', '', '', 0, '', 0, '', 1),
(17, 27, 1, 'awrsedtfghyj', 565654, 6565, 1111, '7803170230_309027777_Floral-Print-Polo-T-shirt.jpg', '', '', '', 0, '', 0, '', 1),
(18, 32, 7, 'tshirt', 5654640, 545, 78, '7047017461_931830512__8-(1)-E5x-104831-NJD.jpg', '', '', '', 0, '', 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `sub_categories` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `categories_id`, `sub_categories`, `status`) VALUES
(1, 27, 'mobail', 1),
(2, 25, 'uyfhgcv', 1),
(3, 26, 'uyfghcv', 1),
(4, 25, 'ytfhgvbn', 1),
(5, 26, 'uryfujgfigh', 1),
(6, 27, '6rutfhtghdgfdc', 1),
(7, 32, 'Tshirt', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobail` varchar(15) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobail`, `added_on`) VALUES
(1, 'pritam', 'a@gmail.com', '123456', '', '2024-05-01 23:59:28'),
(4, 'admin', 'e@gmail.com', '454545', '5454545', '2024-05-20 06:44:29'),
(5, 'admin', 'a@gmail.com1234', '54545', '46464654654', '2024-05-20 06:41:58'),
(6, 'admin', 'z@gmail.com', '54545', '46464654654', '2024-05-20 06:42:52'),
(7, 'admin', 'y@gmail.com', '789456', '786645787', '2024-05-20 06:59:37'),
(13, '', 'gyhfvghfcvyttfyghfvgh@gmail.com', '789456', '9609379300', '2024-06-16 06:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `added_on`) VALUES
(27, 9, 5, '2024-06-15 05:35:32'),
(32, 13, 6, '2024-06-18 04:45:16'),
(33, 13, 5, '2024-06-18 04:45:18'),
(34, 13, 4, '2024-06-18 04:45:19'),
(35, 13, 1, '2024-06-18 04:45:24'),
(36, 3, 6, '2024-06-18 04:49:43'),
(37, 3, 5, '2024-06-18 04:49:45'),
(38, 3, 1, '2024-06-18 04:49:47'),
(39, 3, 4, '2024-06-18 04:49:48'),
(40, 13, 6, '2024-06-18 08:24:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
