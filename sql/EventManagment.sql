-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Mar 04, 2025 at 07:53 PM
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
  `address_name` varchar(255) NOT NULL,
  `postal_code` varchar(7) NOT NULL,
  `street_name` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `LOCATION`
--

INSERT INTO `LOCATION` (`location_id`, `address_name`, `postal_code`, `street_name`, `city`) VALUES
(1, 'Lichtfabriek', '2031 TC', 'Energieplein 73', 'Haarlem'),
(2, 'Slachthuis', '2033 KK', 'Rockplein 6', 'Haarlem'),
(3, 'Jopenkerk', '2011 WD', 'Gedempte Voldersgracht 2', 'Haarlem'),
(4, 'Main Hall, Patronaat', '2013 DN', 'Zijlsingel 2', 'Haarlem'),
(5, 'Bravo Church\r\n\r\n', '2011 RD', 'Grote Markt 22', ' Haarlem');

-- --------------------------------------------------------

--
-- Table structure for table `MUSIC_TICKET`
--

CREATE TABLE `MUSIC_TICKET` (
  `music_ticket_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `ticket_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

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
  `role` enum('admin','customer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

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
  ADD KEY `ticket_id` (`ticket_id`);

--
-- Indexes for table `ORDER`
--
ALTER TABLE `ORDER`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `music_ticket_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ORDER`
--
ALTER TABLE `ORDER`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `tour_ticket_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `USER`
--
ALTER TABLE `USER`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `MUSIC_TICKET_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `TICKET` (`ticket_id`) ON DELETE CASCADE;

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
