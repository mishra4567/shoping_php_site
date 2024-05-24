-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 05:53 PM
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
(31, 'cat4', 0, 0);

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
(1, 6, 'marishda', 'marishda', 721449, 'COD', 510, 'success', 4, '2024-05-22 06:52:04', '', '', ''),
(2, 6, 'marishda', 'marishda', 721449, 'payU', 2400, 'pending', 1, '2024-05-23 11:25:51', '', '', ''),
(3, 6, 'marishda', 'marishda', 721449, 'payU', 1600, 'pending', 1, '2024-05-23 11:27:40', '', '', ''),
(4, 6, 'marishda', 'marishda', 721449, 'payU', 0, 'pending', 1, '2024-05-23 05:32:47', '', '', ''),
(5, 6, 'marishda', 'marishda', 721449, 'payU', 10, 'pending', 1, '2024-05-24 08:06:54', '', '', ''),
(6, 3, 'marishda', 'marishda', 721449, 'payU', 410, 'pending', 1, '2024-05-24 08:09:53', '', '', ''),
(7, 6, 'marishda', 'marishda', 721449, 'COD', 10, 'success', 1, '2024-05-24 08:15:20', '', '', '');

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
(1, 1, 12, 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(2, 1, 13, 1, 400, '0000-00-00 00:00:00', 0, 0, 0, 0),
(3, 1, 14, 1, 10, '0000-00-00 00:00:00', 0, 0, 0, 0),
(4, 2, 13, 6, 400, '0000-00-00 00:00:00', 0, 0, 0, 0),
(5, 3, 13, 4, 400, '0000-00-00 00:00:00', 0, 0, 0, 0),
(6, 4, 10, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0),
(7, 5, 14, 1, 10, '0000-00-00 00:00:00', 0, 0, 0, 0),
(8, 6, 13, 1, 400, '0000-00-00 00:00:00', 0, 0, 0, 0),
(9, 6, 14, 1, 10, '0000-00-00 00:00:00', 0, 0, 0, 0),
(10, 7, 14, 1, 10, '0000-00-00 00:00:00', 0, 0, 0, 0);

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
  `meta_title` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `name`, `mrp`, `price`, `qty`, `image`, `short_desc`, `description`, `meta_desc`, `status`, `meta_keyword`, `tex`, `meta_title`) VALUES
(10, 25, 'Chair', 0, 0, 0, '3164110649_chair.jpg', '', '', '', 1, '', 0, ''),
(11, 25, 'Pritam Mishra', 30.3, 25.9, 10, '2759923974_chair.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem\n\nLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in', 1, 'Product Tags:\r\n\r\nFashion,\r\nAccessories,\r\nWomen,\r\nMen,\r\nKid,', 10, 'Formfitting clothing is all about a sweet spot. That elusive place where an item is tight but not clingy, sexy but not cloying, cool but not over the top. Alexandra Alvarez’s label, Alix, hits that mark with its range of comfortable, minimal, and neutral-hued bodysuits.'),
(12, 26, 'pritam', 123, 100, 2, '8955449591_1 (1).png', '', '', '', 1, '', 23, ''),
(13, 26, 'admin', 456, 400, 1, '7574481302_5.jpg', '', '', '', 1, '', 5, ''),
(14, 27, 'test', 789, 10, 5, '6885539183_2 (2).jpg', '', '', '', 1, '', 6, '');

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
(1, 'pritam', 'a@gmail.com', '123456', '9609379300', '2024-05-01 23:59:28'),
(3, 'admin', 'mishrapritam831@gmail.com', '646464', '56464646', '2024-05-20 06:42:19'),
(4, 'admin', 'e@gmail.com', '454545', '5454545', '2024-05-20 06:44:29'),
(5, 'admin', 'a@gmail.com1234', '54545', '46464654654', '2024-05-20 06:41:58'),
(6, 'admin', 'z@gmail.com', '54545', '46464654654', '2024-05-20 06:42:52'),
(7, 'admin', 'y@gmail.com', '789456', '786645787', '2024-05-20 06:59:37');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
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
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
