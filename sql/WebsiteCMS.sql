CREATE DATABASE IF NOT EXISTS WebsiteCMS;
USE WebsiteCMS;

-- MEDIA table
CREATE TABLE `MEDIA` (
  `media_id` int(11) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `MEDIA`
--

INSERT INTO `MEDIA` (`media_id`, `url`) VALUES
(1, 'https://denuk.nl/wp-content/uploads/2022/05/IMG-20220513-WA0003.jpg');

-- PAGE table
CREATE TABLE PAGE (
    page_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO `PAGE` (`page_id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'home', 'home', '2025-03-22 09:40:14', '2025-03-22 16:24:33'),
(2, 'jazz', 'jazz', '2025-03-22 09:40:14', '2025-03-22 16:24:40'),
(3, 'artist', 'jazz/wouter', '2025-03-22 09:40:14', '2025-03-22 16:24:40'),
(4, 'artist', 'jazz/ntjam', '2025-03-22 09:40:14', '2025-03-22 16:24:40');


-- SECTION table
CREATE TABLE SECTION (
    section_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    page_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (page_id) REFERENCES PAGE(page_id) ON DELETE CASCADE
);



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
(12, 'ThirdSection', '', 3, '2025-03-22 09:54:25', '2025-03-22 09:54:25');


-- CONTENTBLOCK table
CREATE TABLE `CONTENTBLOCK` (
  `contentblock_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `section_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;


INSERT INTO `CONTENTBLOCK` (`contentblock_id`, `title`, `content`, `section_id`, `created_at`, `updated_at`) VALUES
(1, 'Festival Overview', '<p>dsadasdas</p>', 2, '2025-03-22 09:54:49', '2025-03-24 18:22:53'),
(2, 'Welcome Message', '<p>dsadasdasdasdsadas</p>', 2, '2025-03-22 09:55:05', '2025-03-24 18:22:44'),
(3, 'Festival Route', '<p>Join our world</p>', 3, '2025-03-22 09:55:05', '2025-03-24 19:26:08'),
(4, 'Call to action', '<p>Buy your tickets</p>', 4, '2025-03-22 09:55:05', '2025-03-24 19:26:08'),
(5, 'FirstJazzSection', '<p>Yo this is jazz event</p>', 6, '2025-03-22 09:55:05', '2025-03-24 17:17:42'),
(6, 'SecondJazzSection', '<p>Testing</p>', 7, '2025-03-22 09:55:05', '2025-03-25 15:29:34'),
(7, 'ThirdJazzSection', '', 8, '2025-03-22 09:55:05', '2025-03-25 15:29:34'),
(8, 'FourthJazzSection', 'Schedule', 9, '2025-03-22 09:55:05', '2025-03-22 16:14:16'),
(9, 'last section', '<p>jddn</p>', 5, '2025-03-22 16:38:01', '2025-03-24 19:26:08'),
(10, 'FirstSection', '<p><img src=\"../uploads/1742852725_fist.png\" alt=\"\" width=\"75\" height=\"105\">JAJADSJKFDFDS</p>', 10, '2025-03-22 16:38:01', '2025-03-24 21:46:32'),
(11, 'SecondSection', '<p>asiel</p>', 11, '2025-03-22 16:38:01', '2025-03-24 20:40:20'),
(12, 'ThirdSection', '<p>Asiel</p>', 12, '2025-03-22 16:38:01', '2025-03-24 20:40:20'),
(13, 'imgBlock', '<p><img class=\"w-75 \" src=\"../uploads/1742852784_Screenshot 2024-01-27 124757.png\" alt=\"\" width=\"1363\" height=\"769\"></p>', 10, '2025-03-24 21:43:01', '2025-03-24 21:46:32');

-- MEDIA_CONTENTBLOCK table (for the "holds" relationship)
CREATE TABLE `MEDIA_CONTENTBLOCK` (
  `media_id` int(11) NOT NULL,
  `contentblock_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

INSERT INTO `MEDIA_CONTENTBLOCK` (`media_id`, `contentblock_id`) VALUES
(1, 13);
