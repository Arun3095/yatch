-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2020 at 12:59 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yatch`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `ID` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `slug` varchar(255) CHARACTER SET latin1 NOT NULL,
  `description` longtext CHARACTER SET latin1 NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created_by` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` tinyint(4) NOT NULL,
  `LocalIP` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`ID`, `title`, `slug`, `description`, `image`, `created_by`, `status`, `LocalIP`, `created_at`, `updated_at`) VALUES
(1, 'Fishing', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'fishing.jpg', '1', 1, '::1', '2020-04-07 06:24:26', '2020-04-24 07:41:11'),
(2, 'Celebration', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'celebration.jpg', '1', 1, '::1', '2020-04-23 07:18:03', '2020-04-24 08:21:09'),
(3, 'Day Charters', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'day-charters.jpg', '1', 1, '::1', '2020-04-24 07:42:40', '2020-04-24 08:21:13'),
(4, 'Water Sports', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'water-sports.jpg', '1', 1, '::1', '2020-04-24 07:43:13', '2020-04-24 08:21:17');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `ID` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `slug` varchar(255) CHARACTER SET latin1 NOT NULL,
  `description` longtext CHARACTER SET latin1 NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created_by` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1 = Active & 0 = Inactive',
  `LocalIP` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`ID`, `title`, `slug`, `description`, `image`, `created_by`, `status`, `LocalIP`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum has been the industry\'s standard', '', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,\"\"\"\"\"', 'blog1.jpg', '1', 1, '::1', '2020-04-04 11:10:54', '2020-04-22 10:56:07'),
(2, 'Why & Why People Says', '', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,\"\"\"', 'blog2.jpg', '1', 1, '::1', '2020-04-04 11:17:20', '2020-04-14 11:02:26'),
(3, 'This Why Says Always Yes', '', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'tour-img2.jpg', '1', 1, '::1', '2020-04-06 11:34:06', '2020-04-06 11:34:06');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `slug` varchar(255) CHARACTER SET latin1 NOT NULL,
  `description` longtext CHARACTER SET latin1 NOT NULL,
  `short_description` mediumtext CHARACTER SET latin1 NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` varchar(255) CHARACTER SET latin1 NOT NULL,
  `LocalIP` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `title`, `slug`, `description`, `short_description`, `image`, `status`, `created_by`, `LocalIP`, `created_at`, `updated_at`) VALUES
(1, 'Croatia', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Croatia.jpg', 1, '1', '::1', '2020-04-07 10:24:46', '2020-04-14 09:28:47'),
(2, 'Islands', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Islands.jpg', 1, '1', '::1', '2020-04-07 10:32:05', '2020-04-14 09:28:12'),
(3, 'Italy', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Italy.jpg', 1, '1', '::1', '2020-04-07 10:32:45', '2020-04-14 09:29:33'),
(4, 'Ibiza', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Ibiza.jpg', 1, '1', '::1', '2020-04-07 10:33:43', '2020-04-14 09:31:11'),
(5, 'Cannes', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Cannes.jpg', 1, '1', '::1', '2020-04-07 10:34:35', '2020-04-14 09:31:34'),
(6, 'Greece', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Greece.jpg', 1, '1', '::1', '2020-04-07 10:35:19', '2020-04-14 09:31:58'),
(7, 'Bahamas', '', 'Lorem Ipsum is simply dummy text of the printing and industry', 'Lorem Ipsum is simply dummy text of the printing and industry', 'Bahamas.jpg', 1, '1', '::1', '2020-04-07 10:36:00', '2020-04-14 09:32:19'),
(8, 'Islands', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Islands2.jpg', 1, '1', '::1', '2020-04-07 10:37:29', '2020-04-14 09:32:52'),
(9, 'Zadar', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Zadar.jpg', 1, '1', '::1', '2020-04-07 10:38:15', '2020-04-14 09:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `subject` mediumtext CHARACTER SET latin1 NOT NULL,
  `message` longtext CHARACTER SET latin1 NOT NULL,
  `status` tinyint(4) NOT NULL,
  `LocalIp` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `mobile` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `ID` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `slug` varchar(255) CHARACTER SET latin1 NOT NULL,
  `short_description` mediumtext CHARACTER SET latin1 NOT NULL,
  `description` longtext CHARACTER SET latin1 NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` varchar(255) CHARACTER SET latin1 NOT NULL,
  `LocalIP` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`ID`, `title`, `slug`, `short_description`, `description`, `image`, `status`, `created_by`, `LocalIP`, `created_at`, `updated_at`) VALUES
(1, 'Boat Packages', '', '& Whater Expriance', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'banner-img.jpg', 1, '1', '::1', '2020-04-08 08:23:35', '2020-04-14 11:05:09'),
(2, 'Boat Packages', '', '& Whater Expriance', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.	', 'banner-img1.jpg', 1, '1', '::1', '2020-04-08 09:20:44', '2020-04-14 11:52:07');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `ID` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `slug` varchar(255) CHARACTER SET latin1 NOT NULL,
  `designation` varchar(255) CHARACTER SET latin1 NOT NULL,
  `description` longtext CHARACTER SET latin1 NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created_by` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1 = Active & 0 = Inactive',
  `LocalIP` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`ID`, `title`, `name`, `slug`, `designation`, `description`, `image`, `created_by`, `status`, `LocalIP`, `created_at`, `updated_at`) VALUES
(7, 'What People Says', 'Sam', '', 'Project Manager in Italy', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,\"\"\"\"', 'card-profile1-square.jpg', 'Admin', 1, '::1', '2020-04-04 06:55:48', '2020-04-14 11:10:27'),
(10, 'Why You Choose Us', 'Maria', '', 'General Manager In Usa', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\"', 'avatar.jpg', 'Admin', 1, '::1', '2020-04-06 08:38:02', '2020-04-14 10:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `tour_packages`
--

CREATE TABLE `tour_packages` (
  `ID` int(11) NOT NULL,
  `category_id` varchar(255) CHARACTER SET latin1 NOT NULL,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `slug` varchar(255) CHARACTER SET latin1 NOT NULL,
  `description` longtext CHARACTER SET latin1 NOT NULL,
  `short_description` mediumtext CHARACTER SET latin1 NOT NULL,
  `base_price` double(9,2) NOT NULL,
  `deal_price` double(9,2) NOT NULL,
  `off_price` varchar(255) CHARACTER SET latin1 NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` varchar(255) CHARACTER SET latin1 NOT NULL,
  `LocalIP` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tour_packages`
--

INSERT INTO `tour_packages` (`ID`, `category_id`, `title`, `slug`, `description`, `short_description`, `base_price`, `deal_price`, `off_price`, `image`, `status`, `created_by`, `LocalIP`, `created_at`, `updated_at`) VALUES
(1, '1', 'Hannce 444', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '  Lorem Ipsum is simply dummy', 2920.00, 1200.00, '', 'golf-tours-packages-image2.jpg', 1, '1', '::1', '2020-04-07 09:04:49', '2020-04-22 12:43:59'),
(2, '1', 'Hannce 444', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '  Lorem Ipsum is simply dummy', 1190.00, 890.00, '', 'golf-tours-packages-image11.jpg', 1, '1', '::1', '2020-04-07 09:50:48', '2020-04-22 12:44:09'),
(3, '1', 'Hannce 444', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', ' Lorem Ipsum is simply dummy', 90.00, 70.00, '', 'golf-tours-packages-image3.jpg', 1, '1', '::1', '2020-04-07 09:53:40', '2020-04-22 12:44:21'),
(4, '1', 'Hannce 444', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Book the trip of your life', 0.00, 0.00, '', 'golf-tours-packages-image21.jpg', 1, '1', '::1', '2020-04-07 09:56:05', '2020-04-22 12:44:28'),
(5, '1', 'Hannce 444', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', ' Lorem Ipsum is simply dummy', 0.00, 0.00, '', 'golf-tours-packages-image31.jpg', 1, '1', '::1', '2020-04-07 09:57:09', '2020-04-22 12:44:32'),
(8, '2', 'Day-Charters', '', ' Lorem Ipsum is simply dummy', ' Lorem Ipsum is simply dummy', 0.00, 0.00, '', 'Party-Charters.jpg', 0, '1', '::1', '2020-04-07 11:56:54', '2020-04-14 09:42:28'),
(9, '2', 'Party charties', '', ' Lorem Ipsum is simply dummy', ' Lorem Ipsum is simply dummy', 100.00, 80.00, '', 'Party-Charters1.jpg', 1, '1', '::1', '2020-04-07 11:57:38', '2020-04-22 11:05:46'),
(10, '5', 'Private-Boats-Tours', '', ' Lorem Ipsum is simply dummy', ' Lorem Ipsum is simply dummy', 0.00, 0.00, '', 'Private-Boats-Tours.jpg', 1, '1', '::1', '2020-04-07 11:58:33', '2020-04-14 09:43:17'),
(11, '5', 'Fishing-Charters', '', ' Lorem Ipsum is simply dummy ', ' Lorem Ipsum is simply dummy', 0.00, 0.00, '', 'Fishing-Charters.jpg', 1, '1', '::1', '2020-04-07 11:59:07', '2020-04-14 09:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `transports`
--

CREATE TABLE `transports` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `slug` varchar(255) CHARACTER SET latin1 NOT NULL,
  `type` int(11) NOT NULL,
  `description` longtext CHARACTER SET latin1 NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` varchar(255) CHARACTER SET latin1 NOT NULL,
  `LocalIP` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transports`
--

INSERT INTO `transports` (`ID`, `name`, `slug`, `type`, `description`, `image`, `status`, `created_by`, `LocalIP`, `created_at`, `updated_at`) VALUES
(3, 'Caicco 100 Magellano', '', 0, 'Need For 5 9 days\"', 'boat1.jpg', 1, '1', '::1', '2020-04-04 10:11:20', '2020-04-24 08:59:29'),
(4, 'Catamaran Ohana', '', 0, 'For Two Wheeler For Two Persons\"\"', 'boat2.jpg', 1, '1', '::1', '2020-04-04 10:30:11', '2020-04-24 09:00:14'),
(5, 'Riva 42 Superamerica', '', 0, 'Riva 42 Superamerica', 'boat3.jpg', 1, '1', '::1', '2020-04-24 09:00:43', '2020-04-24 09:00:43'),
(6, 'Caicco 100 Magellano', '', 0, 'Caicco 100 Magellano', 'boat4.jpg', 1, '1', '::1', '2020-04-24 09:01:05', '2020-04-24 09:01:05'),
(7, 'Catamaran Ohana', '', 0, 'Catamaran Ohana', 'boat5.jpg', 1, '1', '::1', '2020-04-24 09:01:59', '2020-04-24 09:01:59'),
(8, 'Riva 42 Superamerica', '', 0, 'Riva 42 Superamerica\r\n', 'boat6.jpg', 1, '1', '::1', '2020-04-24 09:02:18', '2020-04-24 09:02:18'),
(9, 'Caicco 100 Magellano', '', 0, 'Caicco 100 Magellano\r\n', 'boat7.jpg', 1, '1', '::1', '2020-04-24 09:03:12', '2020-04-24 09:03:12'),
(10, 'Catamaran Ohana', '', 0, 'Catamaran Ohana\r\n', 'boat8.jpg', 1, '1', '::1', '2020-04-24 09:03:32', '2020-04-24 09:03:32'),
(11, 'Riva 42 Superamerica', '', 0, 'Riva 42 Superamerica\r\n', 'boat9.jpg', 1, '1', '::1', '2020-04-24 09:03:53', '2020-04-24 09:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `roles` tinyint(4) NOT NULL COMMENT '1 = Admin & 0 = User',
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `first_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `contact_no` varchar(255) CHARACTER SET latin1 NOT NULL,
  `address` mediumtext CHARACTER SET latin1 NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1 = Active & 0 = Disactive',
  `created_by` varchar(255) CHARACTER SET latin1 NOT NULL,
  `LocalIP` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `roles`, `name`, `first_name`, `last_name`, `email`, `password`, `contact_no`, `address`, `image`, `status`, `created_by`, `LocalIP`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'yatch', 'Yatch', 'admin@yatch.com', '$1$ppHp1R30$58Mj7KRsoof6u2VmjrxrS0', '7530888707', 'Vijay nagar Ballabgarh Faridabad Haryana ', 'user-img.jpg', 1, '', 0, '2020-03-30 08:30:37', '2020-04-04 19:44:02'),
(11, 0, 'Rohan', 'Rohan', 'Mehra', 'Rohan@gmail.com', '', '7530888070', 'H. no -343, Bheel Wara, Kolkata West Bengal , India', 'goa-beach-tour.jpg', 1, 'Admin', 0, '2020-04-03 09:11:27', '2020-04-03 09:11:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tour_packages`
--
ALTER TABLE `tour_packages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `transports`
--
ALTER TABLE `transports`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tour_packages`
--
ALTER TABLE `tour_packages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transports`
--
ALTER TABLE `transports`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
