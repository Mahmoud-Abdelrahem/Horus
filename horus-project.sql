-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 11:39 AM
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
-- Database: `horus-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `ruleID` int(11) NOT NULL,
  `image_name` text NOT NULL DEFAULT '/Horus/Admin/assets/img/software-engineer.png',
  `phone` int(11) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `linkedin` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `full_name`, `email`, `name`, `password`, `ruleID`, `image_name`, `phone`, `address`, `twitter`, `facebook`, `instagram`, `linkedin`) VALUES
(1, 'Mahmoud Abdelraheem', 'mohamed@gmail.com', 'admin', 'admin123', 1, 'testimonials-4.jpg', 1029401120, 'A108 Adam Street, New York, NY 535022', 'www.google.com', 'https://www.facebook.com/profile.php?id=100003639007766', 'https://instagram.com/#', 'https://www.linkedin.com/in/abdulrahman-nasser-31a59b241'),
(3, 'aboud nasser gad', 'aboudnaser20@gmail.com', 'admin_aboud', '12345678', 2, '2156459291958290014Picsart_22-06-12_02-51-53-209.jpg', 1014052604, 'Eygpt , Sohag , Akhmim ', '', '', '', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `admin_data`
-- (See below for the actual view)
--
CREATE TABLE `admin_data` (
`id` int(11)
,`full_name` varchar(50)
,`user_name` varchar(50)
,`email` varchar(50)
,`address` varchar(50)
,`phone` int(11)
,`password` text
,`description` text
);

-- --------------------------------------------------------

--
-- Table structure for table `admin_rule`
--

CREATE TABLE `admin_rule` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_rule`
--

INSERT INTO `admin_rule` (`id`, `description`) VALUES
(1, 'access all Application'),
(2, 'Manage The users only');

-- --------------------------------------------------------

--
-- Table structure for table `lang`
--

CREATE TABLE `lang` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL DEFAULT 'En'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lang`
--

INSERT INTO `lang` (`id`, `description`) VALUES
(1, 'Ar'),
(2, 'En');

-- --------------------------------------------------------

--
-- Table structure for table `main_directions`
--

CREATE TABLE `main_directions` (
  `id` int(11) NOT NULL,
  `bus_number` int(11) NOT NULL,
  `pickup` text NOT NULL,
  `destination` text NOT NULL,
  `start_time` time NOT NULL,
  `busID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_directions`
--

INSERT INTO `main_directions` (`id`, `bus_number`, `pickup`, `destination`, `start_time`, `busID`) VALUES
(1, 1, 'sohag', 'gerga', '06:30:00', 1),
(2, 2, 'sohag', 'gerga', '07:00:00', 1),
(3, 3, 'sohag', 'gerga', '07:30:00', 1),
(4, 4, 'sohag', 'gerga', '08:15:00', 1),
(5, 5, 'gerga', 'sohag', '06:30:00', 4),
(6, 6, 'gerga', 'sohag', '07:00:00', 4),
(7, 7, 'gerga', 'sohag', '07:30:00', 4),
(8, 8, 'gerga', 'sohag', '08:15:00', 4),
(9, 1, 'gerga', 'sohag', '08:45:00', 4),
(10, 2, 'gerga', 'sohag', '09:15:00', 4),
(11, 3, 'gerga', 'sohag', '10:00:00', 4),
(12, 4, 'gerga', 'sohag', '10:30:00', 4),
(13, 5, 'sohag', 'gerga', '08:45:00', 1),
(14, 6, 'sohag', 'gerga', '09:15:00', 1),
(15, 7, 'sohag', 'gerga', '10:00:00', 1),
(16, 8, 'sohag', 'gerga', '10:30:00', 1),
(17, 9, 'sohag', 'tahta', '06:45:00', 3),
(18, 10, 'sohag', 'tahta', '07:15:00', 3),
(19, 11, 'sohag', 'tahta', '07:45:00', 3),
(20, 12, 'sohag', 'tahta', '08:15:00', 3),
(21, 13, 'tahta', 'sohag', '06:45:00', 5),
(22, 14, 'tahta', 'sohag', '07:15:00', 5),
(23, 15, 'tahta', 'sohag', '07:45:00', 5),
(24, 16, 'tahta', 'sohag', '08:15:00', 5),
(25, 13, 'sohag', 'tahta', '08:45:00', 3),
(26, 14, 'sohag', 'tahta', '09:15:00', 3),
(27, 15, 'sohag', 'tahta', '09:45:00', 3),
(28, 16, 'sohag', 'tahta', '10:45:00', 3),
(29, 9, 'tahta', 'sohag', '08:45:00', 5),
(30, 10, 'tahta', 'sohag', '09:15:00', 5),
(31, 11, 'tahta', 'sohag', '09:45:00', 5),
(32, 12, 'tahta', 'sohag', '10:15:00', 5),
(33, 17, 'sohag', 'elmonshah', '06:30:00', 2),
(34, 18, 'sohag', 'elmonshah', '07:00:00', 2),
(35, 19, 'sohag', 'elmonshah', '07:30:00', 2),
(36, 20, 'sohag', 'elmonshah', '08:00:00', 2),
(37, 21, 'elmonshah', 'sohag', '06:30:00', 6),
(38, 22, 'elmonshah', 'sohag', '07:00:00', 6),
(39, 23, 'elmonshah', 'sohag', '07:30:00', 6),
(40, 24, 'elmonshah', 'sohag', '08:00:00', 6),
(41, 17, 'elmonshah', 'sohag', '08:30:00', 6),
(42, 18, 'elmonshah', 'sohag', '09:00:00', 6),
(43, 19, 'elmonshah', 'sohag', '09:30:00', 6),
(44, 20, 'elmonshah', 'sohag', '10:00:00', 6),
(45, 21, 'sohag', 'elmonshah', '08:30:00', 2),
(46, 22, 'sohag', 'elmonshah', '09:00:00', 2),
(47, 23, 'sohag', 'elmonshah', '09:30:00', 2),
(48, 24, 'sohag', 'elmonshah', '10:00:00', 2),
(57, 100, 'Sohag', 'Akhmim', '07:00:00', 17),
(58, 101, 'Sohag', 'Akhmim', '02:29:00', 17),
(59, 102, 'Sohag', 'Akhmim', '15:36:00', 17),
(60, 200, 'Sohag', 'tanta', '08:00:00', 18);

-- --------------------------------------------------------

--
-- Table structure for table `main_direction_1`
--

CREATE TABLE `main_direction_1` (
  `id` int(11) NOT NULL,
  `pick_location` text NOT NULL,
  `destination` text NOT NULL,
  `pick_ar` text NOT NULL,
  `destination_ar` text NOT NULL,
  `salary` int(11) NOT NULL,
  `salary_ar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_direction_1`
--

INSERT INTO `main_direction_1` (`id`, `pick_location`, `destination`, `pick_ar`, `destination_ar`, `salary`, `salary_ar`) VALUES
(1, 'sohag', 'gerga', 'سوهاج', 'جرجا', 15, '١٥'),
(2, 'sohag', 'elmonshah', 'سوهاج', 'المنشاة', 7, '٧'),
(3, 'sohag', 'tahta', 'سوهاج', 'طهطا', 12, '١٢'),
(4, 'gerga', 'sohag', 'جرجا', 'سوهاج', 15, '١٥'),
(5, 'tahta', 'sohag', 'طهطا', 'سوهاج', 12, '١٢'),
(6, 'elmonshah', 'sohag', 'المنشاة', ' سوهاج', 7, '٧'),
(17, 'Sohag', 'Akhmim', 'سوهاج', 'اخميم', 12, '١٢'),
(18, 'Sohag', 'tanta', 'سوهاج', 'طنطا', 12, '١٢');

-- --------------------------------------------------------

--
-- Table structure for table `mode`
--

CREATE TABLE `mode` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mode`
--

INSERT INTO `mode` (`id`, `description`) VALUES
(1, 'dark'),
(2, 'light');

-- --------------------------------------------------------

--
-- Stand-in structure for view `new_bus`
-- (See below for the actual view)
--
CREATE TABLE `new_bus` (
`id` int(11)
,`busID` int(11)
,`pick_location` text
,`destination` text
);

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `places` text NOT NULL,
  `places_ar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `places`, `places_ar`) VALUES
(1, 'sohag', 'سوهاج'),
(2, 'elmonshah', 'المنشاة'),
(3, 'gerga', 'جرجا'),
(4, 'tahta', 'طهطا'),
(5, 'tema', 'طما'),
(13, 'Akhmim', 'اخميم'),
(14, 'tanta', 'طنطا');

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL DEFAULT 'logedin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `description`) VALUES
(1, 'logedin'),
(2, 'notLogedin');

-- --------------------------------------------------------

--
-- Stand-in structure for view `search_bus`
-- (See below for the actual view)
--
CREATE TABLE `search_bus` (
`id` int(11)
,`bus_number` int(11)
,`pickup` text
,`destination` text
,`start_time` time
,`pickup_ar` text
,`destination_ar` text
,`salary` int(11)
,`salary_ar` text
);

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int(11) NOT NULL,
  `bus_check` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `pickup` varchar(30) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `bus_num` int(11) NOT NULL,
  `seat_booked` int(11) NOT NULL,
  `start_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `bus_check`, `user_name`, `pickup`, `destination`, `bus_num`, `seat_booked`, `start_time`) VALUES
(1, 28, 'mahmoud@gmail.com', 'sohag', 'tahta', 16, 11, '10:45:00'),
(2, 28, 'mahmoud@gmail.com', 'sohag', 'tahta', 16, 10, '10:45:00'),
(4, 21, 'aboudnaser20@gmail.com', 'tahta', 'sohag', 13, 3, '06:45:00'),
(5, 59, 'aboudnaser20@gmail.com', 'Sohag', 'Akhmim', 102, 4, '15:36:00'),
(6, 20, 'aboudnaser20@gmail.com', 'sohag', 'tahta', 12, 14, '08:15:00'),
(7, 6, 'alialaa55@gmail.com', 'gerga', 'sohag', 6, 2, '07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `seat_num`
--

CREATE TABLE `seat_num` (
  `id` int(11) NOT NULL,
  `seat_number` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seat_num`
--

INSERT INTO `seat_num` (`id`, `seat_number`) VALUES
(1, 'seat_1'),
(2, 'seat_2'),
(3, 'seat_3'),
(4, 'seat_4'),
(5, 'seat_5'),
(6, 'seat_6'),
(7, 'seat_7'),
(8, 'seat_8'),
(9, 'seat_9'),
(10, 'seat_10'),
(11, 'seat_11'),
(12, 'seat_12'),
(13, 'seat_13'),
(14, 'seat_14'),
(15, 'seat_15'),
(16, 'seat_16'),
(17, 'seat_17'),
(18, 'seat_18'),
(19, 'seat_19'),
(20, 'seat_20'),
(21, 'seat_21'),
(22, 'seat_22'),
(23, 'seat_23'),
(24, 'seat_24'),
(25, 'seat_25'),
(26, 'seat_26'),
(27, 'seat_27'),
(28, 'seat_28'),
(29, 'seat_29'),
(30, 'seat_30');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` float(10,2) NOT NULL,
  `item_price_currency` varchar(10) NOT NULL,
  `paid_amount` float(10,2) NOT NULL,
  `paid_amount_currency` varchar(10) NOT NULL,
  `txn_id` varchar(50) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `customer_name`, `customer_email`, `item_name`, `item_price`, `item_price_currency`, `paid_amount`, `paid_amount_currency`, `txn_id`, `payment_status`, `created`, `modified`) VALUES
(1, 'mahmoud', 'mahmoud@gmail.com', 'Ticket From sohag To tahta ', 1200.00, 'EGP', 1200.00, 'egp', 'pi_3NM9ySE0W0knjkX50Hw924Kk', 'succeeded', '2023-06-23 16:25:30', '2023-06-23 16:25:30'),
(2, 'ahmed', 'mahmoud@gmail.com', 'Ticket From sohag To tahta ', 1200.00, 'EGP', 1200.00, 'egp', 'pi_3NMA4JE0W0knjkX51vMIPwXk', 'succeeded', '2023-06-23 16:30:57', '2023-06-23 16:30:57'),
(3, 'ahmed', 'mahmoud@gmail.com', 'Ticket From Sohag To Akhmim ', 1200.00, 'EGP', 1200.00, 'egp', 'pi_3NMA8oE0W0knjkX51WGmWEsM', 'succeeded', '2023-06-23 16:35:34', '2023-06-23 16:35:34'),
(4, 'aboud', 'aboudnaser20@gmail.com', 'Ticket From tahta To sohag ', 1200.00, 'EGP', 1200.00, 'egp', 'pi_3NMGDIE0W0knjkX51InTKtJY', 'succeeded', '2023-06-23 23:04:48', '2023-06-23 23:04:48'),
(5, 'aboud', 'aboudnaser20@gmail.com', 'Ticket From Sohag To Akhmim ', 1200.00, 'EGP', 1200.00, 'egp', 'pi_3NMGcuE0W0knjkX51JNTGBv9', 'succeeded', '2023-06-23 23:31:22', '2023-06-23 23:31:22'),
(6, 'abdulrahman nasser', 'aboudnaser20@gmail.com', 'Ticket From sohag To tahta ', 1200.00, 'EGP', 1200.00, 'egp', 'pi_3NMLWTE0W0knjkX50SJggvE7', 'succeeded', '2023-06-24 04:45:59', '2023-06-24 04:45:59'),
(7, 'alaa', 'alialaa55@gmail.com', 'Ticket From gerga To sohag ', 1500.00, 'EGP', 1500.00, 'egp', 'pi_3NMLgBE0W0knjkX51ijZxzPi', 'succeeded', '2023-06-24 04:55:33', '2023-06-24 04:55:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `confirmpass` text NOT NULL,
  `langID` int(11) NOT NULL,
  `modeID` int(11) NOT NULL,
  `ruleID` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `confirmpass`, `langID`, `modeID`, `ruleID`) VALUES
(1, 'ahmed1515', 1014052604, 'ahmed15155@gmail.com', '12345678123', '12345678123', 2, 1, 1),
(2, 'aboud', 1154710314, 'aboudnaser20@gmail.com', 'A12345678', 'A12345678', 1, 1, 1),
(3, 'mariam', 1154710314, 'mariam15@gmail.com', '12345678', '12345678', 1, 1, 1),
(4, 'aboud', 115470314, 'ooomar@gmail.com', '12345678', '12345678', 1, 1, 1),
(5, 'hasnaa', 1064271213, '7asnaa2009@gmail.com', '12345678', '12345678', 1, 1, 1),
(6, 'aboud', 1014052604, 'ahmed@gmail.com', '12345678', '12345678', 1, 1, 1),
(7, 'mahmoud', 1014052604, 'mahmoud@gmail.com', '12345678', '12345678', 1, 1, 1),
(8, 'aboud', 1014052604, 'ahmed15@gmail.com', '12345678', '12345678', 1, 1, 1),
(9, 'alaa', 1117651236, 'alialaa55@gmail.com', '123123123', '123123123', 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure for view `admin_data`
--
DROP TABLE IF EXISTS `admin_data`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin_data`  AS SELECT `admins`.`id` AS `id`, `admins`.`full_name` AS `full_name`, `admins`.`name` AS `user_name`, `admins`.`email` AS `email`, `admins`.`address` AS `address`, `admins`.`phone` AS `phone`, `admins`.`password` AS `password`, `admin_rule`.`description` AS `description` FROM (`admins` join `admin_rule` on(`admins`.`ruleID` = `admin_rule`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `new_bus`
--
DROP TABLE IF EXISTS `new_bus`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `new_bus`  AS SELECT DISTINCT `main_direction_1`.`id` AS `id`, `main_directions`.`busID` AS `busID`, `main_direction_1`.`pick_location` AS `pick_location`, `main_direction_1`.`destination` AS `destination` FROM (`main_direction_1` left join `main_directions` on(`main_direction_1`.`id` is null or `main_direction_1`.`id` = `main_directions`.`busID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `search_bus`
--
DROP TABLE IF EXISTS `search_bus`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `search_bus`  AS SELECT `main_directions`.`id` AS `id`, `main_directions`.`bus_number` AS `bus_number`, `main_directions`.`pickup` AS `pickup`, `main_directions`.`destination` AS `destination`, `main_directions`.`start_time` AS `start_time`, `main_direction_1`.`pick_ar` AS `pickup_ar`, `main_direction_1`.`destination_ar` AS `destination_ar`, `main_direction_1`.`salary` AS `salary`, `main_direction_1`.`salary_ar` AS `salary_ar` FROM (`main_directions` join `main_direction_1` on(`main_directions`.`busID` = `main_direction_1`.`id`)) WHERE `main_directions`.`pickup` = `main_direction_1`.`pick_location` AND `main_directions`.`destination` = `main_direction_1`.`destination` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `ruleID` (`ruleID`);

--
-- Indexes for table `admin_rule`
--
ALTER TABLE `admin_rule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lang`
--
ALTER TABLE `lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_directions`
--
ALTER TABLE `main_directions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `busID` (`busID`);

--
-- Indexes for table `main_direction_1`
--
ALTER TABLE `main_direction_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mode`
--
ALTER TABLE `mode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seat_num`
--
ALTER TABLE `seat_num`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `email` (`email`) USING HASH,
  ADD KEY `langID` (`langID`),
  ADD KEY `modeID` (`modeID`),
  ADD KEY `ruleID` (`ruleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_rule`
--
ALTER TABLE `admin_rule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lang`
--
ALTER TABLE `lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `main_directions`
--
ALTER TABLE `main_directions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `main_direction_1`
--
ALTER TABLE `main_direction_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mode`
--
ALTER TABLE `mode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `seat_num`
--
ALTER TABLE `seat_num`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`ruleID`) REFERENCES `admin_rule` (`id`);

--
-- Constraints for table `main_directions`
--
ALTER TABLE `main_directions`
  ADD CONSTRAINT `main_directions_ibfk_1` FOREIGN KEY (`busID`) REFERENCES `main_direction_1` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`langID`) REFERENCES `lang` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`modeID`) REFERENCES `mode` (`id`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`ruleID`) REFERENCES `rules` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
