-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2023 at 11:33 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `upsa_facility`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `facility` varchar(100) NOT NULL,
  `facilityPrice` varchar(100) NOT NULL,
  `number_of_days` int(200) NOT NULL,
  `total_price` varchar(200) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(244) NOT NULL,
  `declaration1` varchar(10) NOT NULL DEFAULT '0',
  `declaration2` varchar(10) NOT NULL,
  `declaration3` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `uid`, `firstname`, `lastname`, `email`, `phone`, `facility`, `facilityPrice`, `number_of_days`, `total_price`, `start_date`, `end_date`, `declaration1`, `declaration2`, `declaration3`, `created_at`, `updated_at`) VALUES
(3, 1, 'Agyapong', 'Derrick', 'dectechbusiness900@gmail.com', '0242226290', 'Badminton Courts', '', 0, '', '2023-02-16  2023-02-18', '', 'on', 'on', 'on', '2023-02-02 19:21:02', '2023-02-02 19:21:02'),
(4, 1, 'Derrick', 'Agyapong', 'dectech900@gmail.com', '+233242226290', 'Main Auditorium', '', 0, '', '2023-04-16  2023-04-26', '', 'on', 'on', 'on', '2023-04-16 21:47:41', '2023-04-16 21:47:41'),
(5, 1, 'Derrick', 'Agyapong', 'dectech900@gmail.com', '+233242226290', 'Main Auditorium', '', 0, '', '2023-04-16  2023-04-26', '', 'on', 'on', 'on', '2023-04-16 21:48:12', '2023-04-16 21:48:12'),
(6, 1, 'Derrick', 'Agyapong', 'dectech900@gmail.com', '+233242226290', 'LBC Auditorium', '500', 2, '1,000.00', '2023-04-16  2023-04-18', '', 'on', 'on', 'on', '2023-04-16 23:17:42', '2023-04-16 23:17:42'),
(7, 1, 'Derrick', 'Agyapong', 'dectech900@gmail.com', '+233242226290', 'LBC Auditorium', '500', 2, '1,000.00', '2023-04-16  2023-04-18', '', 'on', 'on', 'on', '2023-04-16 23:17:58', '2023-04-16 23:17:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('STUDENT','ADMIN','GUEST','') NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `student_id`, `password`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 'Kwasi Philip', 'philip@upsamail.com', '0243434232', '10062855', 'student', 'STUDENT', '2023-01-27 16:57:44', '2023-01-27 16:57:44'),
(2, 'Bosompem Julius', 'admin@gmail.com', '02323423433', '11111', 'admin', 'ADMIN', '2023-02-02 23:27:16', '2023-02-02 23:27:16'),
(3, 'Mavis Osei', 'guest@gmail.com', '00002323239', '22222', 'guest', 'GUEST', '2023-02-02 23:27:16', '2023-02-02 23:27:16'),
(5, 'Guest', 'dectech900@gmail.com', '', '', '', 'GUEST', '2023-03-15 22:35:19', '2023-03-15 22:35:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
