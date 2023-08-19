-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2022 at 09:59 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `country` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password_hash`, `email`, `date_of_birth`, `gender`, `country`, `created_at`, `updated_at`) VALUES
(9, 'trytry', '$2y$10$RLP0OVyeZyDLrJw1eIwLUeVXvkhtpVSbreyhB6TnZ8oqLZ.3dfeoq', 'faiz@mail.com', '2022-08-28', 'male', 'Korea', '2022-08-28 04:50:49', '2022-08-28 04:50:49'),
(10, 'syafiq', '$2y$10$XUrbbDXFimsccx5NLwSsoOpjsjwObJc0xCM/H7niTO2jPfwU9GXdq', 'sqafiqizzuddin@gmail.com', '1999-08-25', 'male', 'Brunei Darussalam', '2022-08-28 07:14:36', '2022-08-28 07:14:36'),
(11, 'jcole', '$2y$10$p/PIBIt7UjYILXPqshaeLu.avs54foTAVg72YTDXtD8WzWXhEuPbK', 'jcole@gmail.com', '2022-08-28', 'female', 'Belarus', '2022-08-28 07:32:24', '2022-08-31 02:48:58'),
(12, 'admin', '$2y$10$j.Kq3/n/m5Z9Mlsvj1G3Fe462pD0.4VWRMJqoq8XNnkL805PoAYoC', 'admin@gmail.com', '2022-08-27', 'male', 'Belize', '2022-08-30 12:27:54', '2022-08-31 02:52:58'),
(13, 'faiz', '$2y$10$ECKeJQulqaNvaR2SVgfJD./wIxru6HoHomZn.rqS7vfrqPO3pAygG', 'faiz12@mail.com', '2022-08-19', 'male', 'Brunei Darussalam', '2022-08-31 02:57:38', '2022-08-31 02:57:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
