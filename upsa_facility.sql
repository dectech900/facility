-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 15, 2023 at 02:11 PM
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
  `city` varchar(80) NOT NULL,
  `facility` varchar(100) NOT NULL,
  `ref_name` varchar(100) NOT NULL,
  `ref_phone` varchar(50) NOT NULL,
  `ref_relationship` varchar(255) NOT NULL,
  `time_slot_1` varchar(255) NOT NULL,
  `time_slot_2` varchar(255) NOT NULL,
  `time_slot_3` varchar(255) NOT NULL,
  `booking_attendees` int(11) NOT NULL,
  `booking_court` varchar(255) NOT NULL,
  `booking_time` varchar(255) NOT NULL,
  `declaration1` varchar(10) NOT NULL DEFAULT '0',
  `declaration2` varchar(10) NOT NULL,
  `declaration3` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `uid`, `firstname`, `lastname`, `email`, `phone`, `city`, `facility`, `ref_name`, `ref_phone`, `ref_relationship`, `time_slot_1`, `time_slot_2`, `time_slot_3`, `booking_attendees`, `booking_court`, `booking_time`, `declaration1`, `declaration2`, `declaration3`, `created_at`, `updated_at`) VALUES
(3, 1, 'Agyapong', 'Derrick', 'dectechbusiness900@gmail.com', '0242226290', '0242226290', 'Badminton Courts', 'Agyapong Derrick', '0242226290', 'Brother', '9/10/2021 12:00pm - 1:00pm', '9/10/2021 1:00pm - 2:00pm', '9/10/2021 12:00pm - 2:00pm', 100, '5', '2023-02-16  2023-02-18', 'on', 'on', 'on', '2023-02-02 19:21:02', '2023-02-02 19:21:02');

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
(3, 'Mavis Osei', 'guest@gmail.com', '00002323239', '22222', 'guest', 'GUEST', '2023-02-02 23:27:16', '2023-02-02 23:27:16');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
