-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2025 at 01:08 PM
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
-- Database: `thewellness`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `date_of_activity` date NOT NULL,
  `regis_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `date_of_activity`, `regis_date`) VALUES
(1488, 'สอนช้อปปิ้งออนไลน์ด้วยแอป Shopee', '2025-01-15', '2025-01-15 19:07:29'),
(2894, 'เพ้นท์แก้วเซรามิค', '2025-01-15', '2025-01-15 19:07:46'),
(3582, 'บอร์ดเกมรถไฟ', '2025-01-15', '2025-01-15 19:07:49'),
(3860, 'เพ้นท์แก้วเซรามิค', '2025-01-15', '2025-01-15 19:07:19'),
(4914, 'จัดทริปง่ายๆ ด้วย google Map', '2025-01-15', '2025-01-15 19:07:25'),
(5054, 'คลาสเรียนอูคูเลเล่', '2025-01-15', '2025-01-15 19:07:59'),
(7398, 'บอร์ดเกมรถไฟ', '2025-01-15', '2025-01-15 19:07:22'),
(7723, 'เต้นแอโรบิค', '2025-01-15', '2025-01-15 19:07:41'),
(8514, 'จัดทริปง่ายๆ ด้วย google Map', '2025-01-15', '2025-01-15 19:07:52'),
(8774, 'สอนช้อปปิ้งออนไลน์ด้วยแอป Shopee', '2025-01-15', '2025-01-15 19:07:55'),
(8803, 'คลาสเรียนอูคูเลเล่', '2025-01-15', '2025-01-15 19:07:32'),
(9694, 'เต้นแอโรบิค', '2025-01-15', '2025-01-15 19:07:07');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `register_date` datetime NOT NULL,
  `make_payment` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `user_id`, `course_id`, `course_name`, `register_date`, `make_payment`) VALUES
(1, 1, 9694, 'เต้นแอโรบิค', '2025-01-15 19:07:07', 0),
(2, 1, 3860, 'เพ้นท์แก้วเซรามิค', '2025-01-15 19:07:19', 0),
(3, 1, 7398, 'บอร์ดเกมรถไฟ', '2025-01-15 19:07:22', 0),
(4, 1, 4914, 'จัดทริปง่ายๆ ด้วย google Map', '2025-01-15 19:07:25', 0),
(5, 1, 1488, 'สอนช้อปปิ้งออนไลน์ด้วยแอป Shopee', '2025-01-15 19:07:29', 0),
(6, 1, 8803, 'คลาสเรียนอูคูเลเล่', '2025-01-15 19:07:32', 0),
(7, 2, 7723, 'เต้นแอโรบิค', '2025-01-15 19:07:41', 0),
(8, 2, 2894, 'เพ้นท์แก้วเซรามิค', '2025-01-15 19:07:46', 0),
(9, 2, 3582, 'บอร์ดเกมรถไฟ', '2025-01-15 19:07:49', 0),
(10, 2, 8514, 'จัดทริปง่ายๆ ด้วย google Map', '2025-01-15 19:07:52', 0),
(11, 2, 8774, 'สอนช้อปปิ้งออนไลน์ด้วยแอป Shopee', '2025-01-15 19:07:55', 0),
(12, 2, 5054, 'คลาสเรียนอูคูเลเล่', '2025-01-15 19:07:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `age` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `activity` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `gender`, `age`, `phone`, `password`, `activity`, `status`, `role`, `created_at`) VALUES
(1, 'test1@gmail.com', 'test1', 'Test One', 'male', 111, '1111111111', '$2y$10$grwr8twBaUMe8YL1Etz5Fe4CDq/BFYlzb9h.8glU3u4YsoBvTpW2G', 'Health', '', '', '2025-01-11 18:26:20'),
(2, 'test2@gmail.com', 'test2', 'Test two', 'male', 111, '9999999999', '$2y$10$mTP.75y97TdLHyoLRCUlOutBHMGkWCp4A5W/ojizNjSz0npfaCGOi', 'Health', '', '', '2025-01-12 11:19:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9875;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `registration_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `registration_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
