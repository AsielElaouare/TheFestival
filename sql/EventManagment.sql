-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Mar 10, 2025 at 08:16 PM
-- Server version: 11.5.2-MariaDB-ubu2404
-- PHP Version: 8.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `EventManagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `ACCESS_PASS`
--

CREATE TABLE `ACCESS_PASS` (
  `pass_id` int(11) NOT NULL,
  `validity_period` int(11) NOT NULL,
  `music_ticket_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ARTIST`
--

CREATE TABLE `ARTIST` (
  `artist_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `ARTIST`
--

INSERT INTO `ARTIST` (`artist_id`, `name`, `genre`) VALUES
(1, 'Nicky Romero', 'dance'),
(2, 'Afrojack', 'dance'),
(3, 'Tiesto', 'dance'),
(4, 'Hardwell', 'dance'),
(5, 'Gare du Nord ', 'jazz'),
(6, 'Evolve', 'jazz'),
(7, 'Gumbo Kings', 'jazz');

-- --------------------------------------------------------

--
-- Table structure for table `LOCATION`
--

CREATE TABLE `LOCATION` (
  `location_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address_name` varchar(255) NOT NULL,
  `postal_code` varchar(7) NOT NULL,
  `street_name` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `LOCATION`
--

INSERT INTO `LOCATION` (`location_id`, `address`, `address_name`, `postal_code`, `street_name`, `city`) VALUES
(1, '', 'Lichtfabriek', '2031 TC', 'Energieplein 73', 'Haarlem'),
(2, '', 'Slachthuis', '2033 KK', 'Rockplein 6', 'Haarlem'),
(3, '', 'Jopenkerk', '2011 WD', 'Gedempte Voldersgracht 2', 'Haarlem'),
(4, '', 'Main Hall, Patronaat', '2013 DN', 'Zijlsingel 2', 'Haarlem'),
(5, '', 'Bravo Church', '2011 RD', 'Grote Markt 22', ' Haarlem');

-- --------------------------------------------------------

--
-- Table structure for table `MUSIC_TICKET`
--

CREATE TABLE `MUSIC_TICKET` (
  `music_ticket_id` int(11) NOT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `qr_code` varchar(200) NOT NULL,
  `show_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `MUSIC_TICKET`
--

INSERT INTO `MUSIC_TICKET` (`music_ticket_id`, `ticket_id`, `qr_code`, `show_id`) VALUES
(109, 136, '/app/Helper/../storage/qr_codes/qr_67cc35ac373f6.png', 1),
(110, 137, '/app/Helper/../storage/qr_codes/qr_67cc35ac3b6ac.png', 1),
(111, 138, '/app/Helper/../storage/qr_codes/qr_67cc70faa18df.png', 2),
(112, 139, '/app/Helper/../storage/qr_codes/qr_67cc70faa6155.png', 2),
(113, 141, '/app/Helper/../storage/qr_codes/qr_67cc71ff93fc2.png', 2),
(114, 142, '/app/Helper/../storage/qr_codes/qr_67cc71ff9799e.png', 2),
(115, 144, '/app/Helper/../storage/qr_codes/qr_67cc722a0f3b0.png', 2),
(116, 145, '/app/Helper/../storage/qr_codes/qr_67cc722a12eba.png', 2),
(117, 146, '/app/Helper/../storage/qr_codes/qr_67cec8e7f024f.png', 1),
(118, 147, '/app/Helper/../storage/qr_codes/qr_67cec8e800f22.png', 1),
(119, 148, '/app/Helper/../storage/qr_codes/qr_67cedbedb8ea1.png', 1),
(120, 149, '/app/Helper/../storage/qr_codes/qr_67cedbedbd75b.png', 1),
(121, 150, '/app/Helper/../storage/qr_codes/qr_67cedbedc14ed.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ORDER`
--

CREATE TABLE `ORDER` (
  `order_id` int(11) NOT NULL,
  `order_date` datetime DEFAULT current_timestamp(),
  `total_amount` decimal(10,2) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `ORDER`
--

INSERT INTO `ORDER` (`order_id`, `order_date`, `total_amount`, `user_id`) VALUES
(60, '2025-03-08 11:26:07', 17.50, 4),
(61, '2025-03-08 11:27:35', 17.50, 4),
(62, '2025-03-08 11:27:38', 17.50, 4),
(63, '2025-03-08 11:27:49', 17.50, 4),
(64, '2025-03-08 11:28:12', 17.50, 4),
(65, '2025-03-08 11:28:18', 17.50, 4),
(66, '2025-03-08 11:29:15', 17.50, 4),
(67, '2025-03-08 11:31:08', 17.50, 4),
(68, '2025-03-08 11:31:40', 17.50, 4),
(69, '2025-03-08 11:34:19', 17.50, 4),
(70, '2025-03-08 11:34:27', 17.50, 4),
(71, '2025-03-08 11:40:56', 17.50, 4),
(72, '2025-03-08 11:41:45', 17.50, 4),
(73, '2025-03-08 11:45:17', 17.50, 4),
(74, '2025-03-08 11:47:12', 17.50, 4),
(75, '2025-03-08 11:57:20', 17.50, 4),
(76, '2025-03-08 11:58:22', 17.50, 4),
(77, '2025-03-08 12:00:50', 17.50, 4),
(78, '2025-03-08 12:02:16', 17.50, 4),
(79, '2025-03-08 12:09:59', 17.50, 4),
(80, '2025-03-08 12:18:52', 150.00, 4),
(81, '2025-03-08 16:31:54', 120.00, 12),
(82, '2025-03-08 16:36:15', 137.50, 12),
(83, '2025-03-08 16:36:58', 137.50, 12),
(84, '2025-03-10 11:11:36', 150.00, 12),
(85, '2025-03-10 12:32:45', 225.00, 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `expires_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `expires_at`) VALUES
(1, 'test123@live.nl', 'd57a45e26fab87b6720e75ec4cddf506', '2025-03-03 02:23:49'),
(2, 'test123@live.nl', '4dd3654ac41f0b5089b587d4b6f6ed4e', '2025-03-03 02:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `RESERVATION`
--

CREATE TABLE `RESERVATION` (
  `reservation_id` int(11) NOT NULL,
  `reservation_date` datetime NOT NULL,
  `session_id` int(11) DEFAULT NULL,
  `price_adult` decimal(10,2) NOT NULL,
  `price_child` decimal(10,2) NOT NULL,
  `ticket_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `RESTAURANT`
--

CREATE TABLE `RESTAURANT` (
  `restaurant_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `RESTAURANT_GENRE`
--

CREATE TABLE `RESTAURANT_GENRE` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `RESTAURANT_GENRE_MAPPING`
--

CREATE TABLE `RESTAURANT_GENRE_MAPPING` (
  `restaurant_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `SESSION`
--

CREATE TABLE `SESSION` (
  `session_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `restaurant_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `SHOW`
--

CREATE TABLE `SHOW` (
  `show_id` int(11) NOT NULL,
  `show_name` varchar(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `available_spots` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `SHOW`
--

INSERT INTO `SHOW` (`show_id`, `show_name`, `start_date`, `price`, `location_id`, `available_spots`) VALUES
(1, 'Nicky Romero/Afrojack | Friday ticket', '2025-06-06 20:48:41', 75.00, 1, 300),
(2, 'Tiesto | Friday ticket', '2025-06-06 12:49:34', 60.00, 2, 300),
(3, 'Hardwell | Friday ticket', '2025-06-06 12:49:34', 60.00, 3, 300),
(4, 'Gumbo Kings| Thursday ticket', '2025-06-05 18:00:00', 15.00, 4, 100),
(5, 'Evolve | Thursday ticket', '2025-06-05 13:04:40', 15.00, 4, 100),
(6, 'Gare du Nord | Saturday ticket', '2025-06-07 13:05:11', 15.00, 4, 90);

-- --------------------------------------------------------

--
-- Table structure for table `SHOW_ARTIST`
--

CREATE TABLE `SHOW_ARTIST` (
  `show_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `SHOW_ARTIST`
--

INSERT INTO `SHOW_ARTIST` (`show_id`, `artist_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(3, 4),
(6, 5),
(5, 6),
(4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `TICKET`
--

CREATE TABLE `TICKET` (
  `ticket_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `TICKET`
--

INSERT INTO `TICKET` (`ticket_id`, `order_id`) VALUES
(116, 60),
(117, 61),
(118, 62),
(119, 63),
(120, 64),
(121, 65),
(122, 66),
(123, 67),
(124, 68),
(125, 69),
(126, 70),
(127, 71),
(128, 72),
(129, 73),
(130, 74),
(131, 75),
(132, 76),
(133, 77),
(134, 78),
(135, 79),
(136, 80),
(137, 80),
(138, 81),
(139, 81),
(140, 82),
(141, 82),
(142, 82),
(143, 83),
(144, 83),
(145, 83),
(146, 84),
(147, 84),
(148, 85),
(149, 85),
(150, 85);

-- --------------------------------------------------------

--
-- Table structure for table `TOUR`
--

CREATE TABLE `TOUR` (
  `tour_id` int(11) NOT NULL,
  `tour_name` varchar(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `location_id` int(11) NOT NULL,
  `available_spots` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `TOUR`
--

INSERT INTO `TOUR` (`tour_id`, `tour_name`, `start_date`, `end_date`, `price`, `location_id`, `available_spots`) VALUES
(1, '10:00 | Thursday ticket', '2025-06-05 10:00:00', '2025-06-05 13:00:00', 17.50, 5, 100);

-- --------------------------------------------------------

--
-- Table structure for table `TOUR_GUIDE`
--

CREATE TABLE `TOUR_GUIDE` (
  `guide_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_info` varchar(255) NOT NULL,
  `tour_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `TOUR_GUIDE`
--

INSERT INTO `TOUR_GUIDE` (`guide_id`, `name`, `contact_info`, `tour_id`) VALUES
(1, 'Thijs', '+3104340422', 1);

-- --------------------------------------------------------

--
-- Table structure for table `TOUR_LANGUAGE`
--

CREATE TABLE `TOUR_LANGUAGE` (
  `id` int(11) NOT NULL,
  `language` varchar(11) NOT NULL,
  `tour_guide_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `TOUR_LANGUAGE`
--

INSERT INTO `TOUR_LANGUAGE` (`id`, `language`, `tour_guide_id`, `tour_id`) VALUES
(1, 'dutch', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `TOUR_TICKET`
--

CREATE TABLE `TOUR_TICKET` (
  `tour_ticket_id` int(11) NOT NULL,
  `tour_id` int(11) DEFAULT NULL,
  `qr_code` varchar(255) NOT NULL,
  `ticket_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `TOUR_TICKET`
--

INSERT INTO `TOUR_TICKET` (`tour_ticket_id`, `tour_id`, `qr_code`, `ticket_id`) VALUES
(5, 1, '/app/Helper/../storage/qr_codes/qr_67cc294f4b116.png', 116),
(6, 1, '/app/Helper/../storage/qr_codes/qr_67cc29a7d7ff8.png', 117),
(7, 1, '/app/Helper/../storage/qr_codes/qr_67cc29aa19c78.png', 118),
(8, 1, '/app/Helper/../storage/qr_codes/qr_67cc29b5c93dc.png', 119),
(9, 1, '/app/Helper/../storage/qr_codes/qr_67cc29cc0a99a.png', 120),
(10, 1, '/app/Helper/../storage/qr_codes/qr_67cc29d24af3d.png', 121),
(11, 1, '/app/Helper/../storage/qr_codes/qr_67cc2a0b2a666.png', 122),
(12, 1, '/app/Helper/../storage/qr_codes/qr_67cc2a7cc9236.png', 123),
(13, 1, '/app/Helper/../storage/qr_codes/qr_67cc2a9c7b282.png', 124),
(14, 1, '/app/Helper/../storage/qr_codes/qr_67cc2b3b26c48.png', 125),
(15, 1, '/app/Helper/../storage/qr_codes/qr_67cc2b43d2010.png', 126),
(16, 1, '/app/Helper/../storage/qr_codes/qr_67cc2cc8eea9d.png', 127),
(17, 1, '/app/Helper/../storage/qr_codes/qr_67cc2cf97a4a1.png', 128),
(18, 1, '/app/Helper/../storage/qr_codes/qr_67cc2dcda41b8.png', 129),
(19, 1, '/app/Helper/../storage/qr_codes/qr_67cc2e40931a2.png', 130),
(20, 1, '/app/Helper/../storage/qr_codes/qr_67cc30a02e167.png', 131),
(21, 1, '/app/Helper/../storage/qr_codes/qr_67cc30deb0d89.png', 132),
(22, 1, '/app/Helper/../storage/qr_codes/qr_67cc3172c3942.png', 133),
(23, 1, '/app/Helper/../storage/qr_codes/qr_67cc31c8587f8.png', 134),
(24, 1, '/app/Helper/../storage/qr_codes/qr_67cc339794fd5.png', 135),
(25, 1, '/app/Helper/../storage/qr_codes/qr_67cc71ff8e6e5.png', 140),
(26, 1, '/app/Helper/../storage/qr_codes/qr_67cc722a09e29.png', 143);

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

CREATE TABLE `USER` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `pass_hash` varchar(255) NOT NULL,
  `role` enum('admin','customer') NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`user_id`, `name`, `email`, `phone_number`, `pass_hash`, `role`, `registration_date`) VALUES
(4, 'Asiel', 'admin@example.com', '1234567890', '713bfda78870bf9d1b261f565286f85e97ee614efe5f0faf7c34e7ca4f65baca', 'admin', '2025-03-05 03:49:29'),
(5, 'Sofian', 'customer@example.com', '0987654321', '2cbe8f5ad512aa4440bd46dc0a598d1a3164f491254bc65c85d655897c356634', 'customer', '2025-03-05 03:49:29'),
(6, 'Berk', 'test123@live.nl', '0612345678', '$2y$12$S/w9eWab/rX/dzWXQ9qm3eqXHWT.Hh.obylHXc9MXKXFWOJsIbctO', 'customer', '2025-03-05 03:49:29'),
(7, 'adam', 'adam@live.nl', '06012345678', '$2y$12$sDjyxZgZKLTlaYhQ5bin6ufBPwl2uNZkvhk2WpoCOa8/8xoWAC6K2', 'customer', '2025-03-05 03:49:29'),
(8, 'testuser', 'testuser@live.nl', '123456789', '$2y$12$5puA79p6y91E19oU6qhZ2.43q2jRXvuGrIwOcHLJ8dgvH6rTk/zBe', 'customer', '2025-03-05 03:49:29'),
(9, 'customer1', 'customer1@live.nl', '6123456789', '$2y$12$JTA5K2J76hZHwSlbQTKjKew42M1OUoW28JrGBhibmDC0sFzfe/xZq', 'customer', '2025-03-05 03:49:29'),
(11, 'Test Admin', 'admin@test.com', '06131417191', '$2y$12$kaPGv8UJ7y7Q1HWxScwIQeJLYs3/FaolaR8Zfnp1nXvlSocxgNYQC', 'admin', '2025-03-05 03:49:29'),
(12, 'Asiel Elaouare', 'elaasiel@gmail.com', '+31 0625187218', '$2y$12$tvddAcwqu9sa/WqvPpS9ku2br8GOdECqYcubgtaMzyS7GwPpBtfGi', 'customer', '2025-03-08 13:47:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ACCESS_PASS`
--
ALTER TABLE `ACCESS_PASS`
  ADD PRIMARY KEY (`pass_id`),
  ADD KEY `music_ticket_id` (`music_ticket_id`);

--
-- Indexes for table `ARTIST`
--
ALTER TABLE `ARTIST`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `LOCATION`
--
ALTER TABLE `LOCATION`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `MUSIC_TICKET`
--
ALTER TABLE `MUSIC_TICKET`
  ADD PRIMARY KEY (`music_ticket_id`),
  ADD KEY `ticket_id` (`ticket_id`),
  ADD KEY `show_id` (`show_id`);

--
-- Indexes for table `ORDER`
--
ALTER TABLE `ORDER`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `RESERVATION`
--
ALTER TABLE `RESERVATION`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `ticket_id` (`ticket_id`),
  ADD KEY `session_id` (`session_id`);

--
-- Indexes for table `RESTAURANT`
--
ALTER TABLE `RESTAURANT`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- Indexes for table `RESTAURANT_GENRE`
--
ALTER TABLE `RESTAURANT_GENRE`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `RESTAURANT_GENRE_MAPPING`
--
ALTER TABLE `RESTAURANT_GENRE_MAPPING`
  ADD PRIMARY KEY (`restaurant_id`,`genre_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Indexes for table `SESSION`
--
ALTER TABLE `SESSION`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `SHOW`
--
ALTER TABLE `SHOW`
  ADD PRIMARY KEY (`show_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `SHOW_ARTIST`
--
ALTER TABLE `SHOW_ARTIST`
  ADD PRIMARY KEY (`show_id`,`artist_id`),
  ADD KEY `artist_id` (`artist_id`);

--
-- Indexes for table `TICKET`
--
ALTER TABLE `TICKET`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `TOUR`
--
ALTER TABLE `TOUR`
  ADD PRIMARY KEY (`tour_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `TOUR_GUIDE`
--
ALTER TABLE `TOUR_GUIDE`
  ADD PRIMARY KEY (`guide_id`),
  ADD KEY `tour_id` (`tour_id`);

--
-- Indexes for table `TOUR_LANGUAGE`
--
ALTER TABLE `TOUR_LANGUAGE`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tour_guide_id` (`tour_guide_id`),
  ADD KEY `tour_id` (`tour_id`);

--
-- Indexes for table `TOUR_TICKET`
--
ALTER TABLE `TOUR_TICKET`
  ADD PRIMARY KEY (`tour_ticket_id`),
  ADD UNIQUE KEY `qr_code` (`qr_code`),
  ADD KEY `tour_id` (`tour_id`),
  ADD KEY `ticket_id` (`ticket_id`);

--
-- Indexes for table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ACCESS_PASS`
--
ALTER TABLE `ACCESS_PASS`
  MODIFY `pass_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ARTIST`
--
ALTER TABLE `ARTIST`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `LOCATION`
--
ALTER TABLE `LOCATION`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `MUSIC_TICKET`
--
ALTER TABLE `MUSIC_TICKET`
  MODIFY `music_ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `ORDER`
--
ALTER TABLE `ORDER`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `RESERVATION`
--
ALTER TABLE `RESERVATION`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `RESTAURANT`
--
ALTER TABLE `RESTAURANT`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `RESTAURANT_GENRE`
--
ALTER TABLE `RESTAURANT_GENRE`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `SESSION`
--
ALTER TABLE `SESSION`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `SHOW`
--
ALTER TABLE `SHOW`
  MODIFY `show_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `TICKET`
--
ALTER TABLE `TICKET`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `TOUR`
--
ALTER TABLE `TOUR`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `TOUR_GUIDE`
--
ALTER TABLE `TOUR_GUIDE`
  MODIFY `guide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `TOUR_LANGUAGE`
--
ALTER TABLE `TOUR_LANGUAGE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `TOUR_TICKET`
--
ALTER TABLE `TOUR_TICKET`
  MODIFY `tour_ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `USER`
--
ALTER TABLE `USER`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ACCESS_PASS`
--
ALTER TABLE `ACCESS_PASS`
  ADD CONSTRAINT `ACCESS_PASS_ibfk_1` FOREIGN KEY (`music_ticket_id`) REFERENCES `MUSIC_TICKET` (`music_ticket_id`) ON DELETE CASCADE;

--
-- Constraints for table `MUSIC_TICKET`
--
ALTER TABLE `MUSIC_TICKET`
  ADD CONSTRAINT `MUSIC_TICKET_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `TICKET` (`ticket_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `MUSIC_TICKET_ibfk_2` FOREIGN KEY (`show_id`) REFERENCES `SHOW` (`show_id`);

--
-- Constraints for table `ORDER`
--
ALTER TABLE `ORDER`
  ADD CONSTRAINT `ORDER_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `USER` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `RESERVATION`
--
ALTER TABLE `RESERVATION`
  ADD CONSTRAINT `RESERVATION_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `TICKET` (`ticket_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `RESERVATION_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `SESSION` (`session_id`) ON DELETE CASCADE;

--
-- Constraints for table `RESTAURANT_GENRE_MAPPING`
--
ALTER TABLE `RESTAURANT_GENRE_MAPPING`
  ADD CONSTRAINT `RESTAURANT_GENRE_MAPPING_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `RESTAURANT` (`restaurant_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `RESTAURANT_GENRE_MAPPING_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `RESTAURANT_GENRE` (`genre_id`) ON DELETE CASCADE;

--
-- Constraints for table `SESSION`
--
ALTER TABLE `SESSION`
  ADD CONSTRAINT `SESSION_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `RESTAURANT` (`restaurant_id`) ON DELETE CASCADE;

--
-- Constraints for table `SHOW`
--
ALTER TABLE `SHOW`
  ADD CONSTRAINT `SHOW_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `LOCATION` (`location_id`) ON DELETE CASCADE;

--
-- Constraints for table `SHOW_ARTIST`
--
ALTER TABLE `SHOW_ARTIST`
  ADD CONSTRAINT `SHOW_ARTIST_ibfk_1` FOREIGN KEY (`show_id`) REFERENCES `SHOW` (`show_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `SHOW_ARTIST_ibfk_2` FOREIGN KEY (`artist_id`) REFERENCES `ARTIST` (`artist_id`) ON DELETE CASCADE;

--
-- Constraints for table `TICKET`
--
ALTER TABLE `TICKET`
  ADD CONSTRAINT `TICKET_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `ORDER` (`order_id`) ON DELETE CASCADE;

--
-- Constraints for table `TOUR`
--
ALTER TABLE `TOUR`
  ADD CONSTRAINT `TOUR_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `LOCATION` (`location_id`);

--
-- Constraints for table `TOUR_GUIDE`
--
ALTER TABLE `TOUR_GUIDE`
  ADD CONSTRAINT `TOUR_GUIDE_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `TOUR` (`tour_id`);

--
-- Constraints for table `TOUR_LANGUAGE`
--
ALTER TABLE `TOUR_LANGUAGE`
  ADD CONSTRAINT `TOUR_LANGUAGE_ibfk_1` FOREIGN KEY (`tour_guide_id`) REFERENCES `TOUR_GUIDE` (`guide_id`),
  ADD CONSTRAINT `TOUR_LANGUAGE_ibfk_2` FOREIGN KEY (`tour_id`) REFERENCES `TOUR` (`tour_id`);

--
-- Constraints for table `TOUR_TICKET`
--
ALTER TABLE `TOUR_TICKET`
  ADD CONSTRAINT `TOUR_TICKET_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `TOUR` (`tour_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `TOUR_TICKET_ibfk_2` FOREIGN KEY (`ticket_id`) REFERENCES `TICKET` (`ticket_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
