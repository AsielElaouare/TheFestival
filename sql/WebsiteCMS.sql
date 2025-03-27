-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Mar 27, 2025 at 09:23 AM
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
-- Database: `WebsiteCMS`
--

-- --------------------------------------------------------

--
-- Table structure for table `CONTENTBLOCK`
--

CREATE TABLE `CONTENTBLOCK` (
  `contentblock_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `section_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `CONTENTBLOCK`
--

INSERT INTO `CONTENTBLOCK` (`contentblock_id`, `title`, `content`, `section_id`, `created_at`, `updated_at`) VALUES
(1, 'Festival Overview', 'Ddmd dnkss d', 2, '2025-03-22 09:54:49', '2025-03-27 08:49:23'),
(2, 'Welcome Message', 'Testing Testing ', 2, '2025-03-22 09:55:05', '2025-03-27 08:49:23'),
(3, 'Festival Route', 'Join our world', 3, '2025-03-22 09:55:05', '2025-03-27 08:49:23'),
(4, 'Call to action', 'Buy your tickets', 4, '2025-03-22 09:55:05', '2025-03-27 08:49:23'),
(5, 'FirstJazzSection', '<p>Yo this is jazz event</p>', 6, '2025-03-22 09:55:05', '2025-03-24 17:17:42'),
(6, 'SecondJazzSection', '<p>Testing</p>', 7, '2025-03-22 09:55:05', '2025-03-25 15:29:34'),
(7, 'ThirdJazzSection', '', 8, '2025-03-22 09:55:05', '2025-03-25 15:29:34'),
(8, 'FourthJazzSection', 'Schedule', 9, '2025-03-22 09:55:05', '2025-03-22 16:14:16'),
(9, 'last section', 'jddn', 5, '2025-03-22 16:38:01', '2025-03-27 08:49:23'),
(10, 'FirstSection', '<p><img src=\"../uploads/1742852725_fist.png\" alt=\"\" width=\"75\" height=\"105\">JAJADSJKFDFDS</p>', 10, '2025-03-22 16:38:01', '2025-03-24 21:46:32'),
(11, 'SecondSection', '<p>asiel</p>', 11, '2025-03-22 16:38:01', '2025-03-24 20:40:20'),
(12, 'ThirdSection', '<p>Asiel</p>', 12, '2025-03-22 16:38:01', '2025-03-24 20:40:20'),
(13, 'imgBlock', '/uploads/1742852784_Screenshot 2024-01-27 124757.png', 10, '2025-03-24 21:43:01', '2025-03-24 21:46:32'),
(14, 'ArtsNr1CardJazzImg', '/uploads/jazz_pictures/garedunord.svg', 13, '2025-03-24 21:43:01', '2025-03-24 21:46:32'),
(15, 'ArtsNr1JazzCardBody', 'Garedunord', 13, '2025-03-24 21:43:01', '2025-03-24 21:46:32'),
(16, 'ArtsNr2CardJazzImg', '/uploads/jazz_pictures/karsu.svg', 13, '2025-03-24 21:43:01', '2025-03-24 21:46:32'),
(17, 'ArtsNr2JazzCardBody', 'Karsu', 13, '2025-03-24 21:43:01', '2025-03-24 21:46:32'),
(18, 'ArtsNr3CardJazzImg', '/uploads/jazz_pictures/ruis.svg', 13, '2025-03-24 21:43:01', '2025-03-24 21:46:32'),
(19, 'ArtsNr3JazzCardBody', 'Ruis', 13, '2025-03-24 21:43:01', '2025-03-24 21:46:32'),
(20, 'ArtsNr4CardJazzImg', '/uploads/jazz_pictures/wickedjazz.svg', 13, '2025-03-24 21:43:01', '2025-03-24 21:46:32'),
(21, 'ArtsNr4JazzCardBody', 'WickedJazz', 13, '2025-03-24 21:43:01', '2025-03-24 21:46:32'),
(22, 'JazzHeaderImg', '/uploads/jazz_pictures/haarlemJazz_vector.svg', 14, '2025-03-24 21:43:01', '2025-03-24 21:46:32'),
(23, 'FirstSection', '<p><img src=\"../uploads/1742852725_fist.png\" alt=\"\" width=\"75\" height=\"105\">JAJADSJKFDFDS</p>', 10, '2025-03-22 16:38:01', '2025-03-24 21:46:32'),
(24, 'SecondSection', '<p>asiel</p>', 15, '2025-03-22 16:38:01', '2025-03-24 20:40:20'),
(25, 'ThirdSection', '<p>Asiel</p>', 15, '2025-03-22 16:38:01', '2025-03-24 20:40:20'),
(26, 'imgBlock', '/uploads/1742852784_Screenshot 2024-01-27 124757.png', 15, '2025-03-24 21:43:01', '2025-03-24 21:46:32'),
(26, 'headerDanceContent', '/uploads/martingarrixfirst.jpg', 16, '2025-03-27 09:16:27', '2025-03-27 09:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `MEDIA`
--

CREATE TABLE `MEDIA` (
  `media_id` int(11) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `MEDIA`
--

INSERT INTO `MEDIA` (`media_id`, `url`) VALUES
(1, 'https://denuk.nl/wp-content/uploads/2022/05/IMG-20220513-WA0003.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `MEDIA_CONTENTBLOCK`
--

CREATE TABLE `MEDIA_CONTENTBLOCK` (
  `media_id` int(11) NOT NULL,
  `contentblock_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `MEDIA_CONTENTBLOCK`
--

INSERT INTO `MEDIA_CONTENTBLOCK` (`media_id`, `contentblock_id`) VALUES
(1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `PAGE`
--

CREATE TABLE `PAGE` (
  `page_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `PAGE`
--

INSERT INTO `PAGE` (`page_id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'home', 'home', '2025-03-22 09:40:14', '2025-03-22 16:24:33'),
(2, 'jazz', 'jazz', '2025-03-22 09:40:14', '2025-03-22 16:24:40'),
(3, 'artist', 'jazz/wouter', '2025-03-22 09:40:14', '2025-03-22 16:24:40'),
(4, 'artist', 'jazz/ntjam', '2025-03-22 09:40:14', '2025-03-22 16:24:40'),
(5, 'dance', 'dance', '2025-03-27 09:13:19', '2025-03-27 09:13:19');

-- --------------------------------------------------------

--
-- Table structure for table `SECTION`
--

CREATE TABLE `SECTION` (
  `section_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `page_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `SECTION`
--

INSERT INTO `SECTION` (`section_id`, `name`, `description`, `page_id`, `created_at`, `updated_at`) VALUES
(2, 'Festival Introduction', '', 1, '2025-03-22 09:54:25', '2025-03-22 09:54:25'),
(3, 'Festival Route', '', 1, '2025-03-22 09:54:25', '2025-03-22 09:54:25'),
(4, 'Call to action', '', 1, '2025-03-22 09:54:25', '2025-03-22 09:54:25'),
(5, 'last section', '', 1, '2025-03-22 09:54:25', '2025-03-22 09:54:25'),
(6, 'FirstJazzSection', '', 2, '2025-03-22 09:54:25', '2025-03-22 09:54:25'),
(7, 'SecondJazzSection', '', 2, '2025-03-22 09:54:25', '2025-03-22 09:54:25'),
(8, 'ThirdazzSection', '', 2, '2025-03-22 09:54:25', '2025-03-22 09:54:25'),
(9, 'FourthJazzSection', '', 2, '2025-03-22 09:54:25', '2025-03-22 09:54:25'),
(10, 'FirstSection', '', 3, '2025-03-22 09:54:25', '2025-03-22 09:54:25'),
(11, 'SecondSection', '', 3, '2025-03-22 09:54:25', '2025-03-22 09:54:25'),
(12, 'ThirdSection', '', 3, '2025-03-22 09:54:25', '2025-03-22 09:54:25'),
(13, 'JazzArtistsSection', '', 2, '2025-03-22 09:54:25', '2025-03-22 09:54:25'),
(14, 'JazzHeader', '', 2, '2025-03-22 09:54:25', '2025-03-22 09:54:25'),
(15, 'Artist2', '', 4, '2025-03-22 09:54:25', '2025-03-22 09:54:25'),
(16, 'headerDance', NULL, 5, '2025-03-27 09:14:27', '2025-03-27 09:14:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `PAGE`
--
ALTER TABLE `PAGE`
  ADD PRIMARY KEY (`page_id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `SECTION`
--
ALTER TABLE `SECTION`
  ADD PRIMARY KEY (`section_id`),
  ADD KEY `page_id` (`page_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `PAGE`
--
ALTER TABLE `PAGE`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `SECTION`
--
ALTER TABLE `SECTION`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `SECTION`
--
ALTER TABLE `SECTION`
  ADD CONSTRAINT `SECTION_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `PAGE` (`page_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
