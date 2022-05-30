-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2022 at 04:29 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tba_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `tba_users`
--

CREATE TABLE `tba_users` (
  `id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `personal_mobile` varchar(20) NOT NULL,
  `old_password` text NOT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_role` varchar(50) NOT NULL,
  `user_team` int(11) NOT NULL,
  `ugroup` int(11) NOT NULL,
  `otp` int(6) NOT NULL,
  `otp_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tba_users`
--

INSERT INTO `tba_users` (`id`, `user_name`, `mobile_number`, `personal_mobile`, `old_password`, `password`, `role`, `user_id`, `user_role`, `user_team`, `ugroup`, `otp`, `otp_date`) VALUES
(1, 'admin', '7878787878', '8787878787', '', 'admin', 'tl,member,supporter', 1, 'tl,member,supporter', 0, 0, 0, '0000-00-00 00:00:00'),
(2, 'client', '8778787878', '8778787878', '', 'client', 'member', 2, 'member', 0, 0, 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tba_users`
--
ALTER TABLE `tba_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tba_users`
--
ALTER TABLE `tba_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
