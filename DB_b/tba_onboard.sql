-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 09:24 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tba_onboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_report`
--

CREATE TABLE `access_report` (
  `id` int(11) NOT NULL,
  `uname` text NOT NULL,
  `pass` text NOT NULL,
  `page` text NOT NULL,
  `date_time` text NOT NULL,
  `ip` text NOT NULL,
  `success` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_report`
--

INSERT INTO `access_report` (`id`, `uname`, `pass`, `page`, `date_time`, `ip`, `success`) VALUES
(1, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-09 13:56:53', '192.168.1.108', 'YES'),
(2, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-09 13:58:23', '192.168.1.108', 'YES'),
(3, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-09 15:00:18', '192.168.1.108', 'YES'),
(4, 'b@gmail.com', 'admmin', 'tba_onboard_admin', '2022-03-09 15:21:24', '192.168.1.108', 'NO'),
(5, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-09 15:21:40', '192.168.1.108', 'YES'),
(6, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-09 15:22:49', '192.168.1.108', 'YES'),
(7, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-09 15:23:28', '192.168.1.108', 'YES'),
(8, 'a@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-09 15:23:40', '192.168.1.108', 'NO'),
(9, 'a@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-09 15:24:46', '192.168.1.108', 'NO'),
(10, 'a@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-09 15:25:12', '192.168.1.108', 'NO'),
(11, 'a@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-09 15:25:59', '192.168.1.108', 'NO'),
(12, 'a@gmail.com', 'adminnn', 'tba_onboard_admin', '2022-03-09 15:26:34', '192.168.1.108', 'NO'),
(13, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-09 15:26:42', '192.168.1.108', 'YES'),
(14, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-09 15:27:10', '192.168.1.108', 'YES'),
(15, 'b@gmail.com', 'adminddd', 'tba_onboard_admin', '2022-03-09 15:27:13', '192.168.1.108', 'NO'),
(16, 's@dmail.com', 'erewrwrw', 'tba_onboard_admin', '2022-03-09 15:27:29', '192.168.1.108', 'NO'),
(17, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-09 15:32:29', '192.168.1.108', 'YES'),
(18, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-09 15:36:08', '192.168.1.108', 'YES'),
(19, 'c@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-09 15:40:55', '192.168.1.108', 'NO'),
(20, 'c@gmail.com', 'client', 'tba_onboard_admin', '2022-03-09 15:41:04', '192.168.1.108', 'NO'),
(21, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-09 15:41:10', '192.168.1.108', 'YES'),
(22, 'b@gmailo.com', 'admin', 'tba_onboard_admin', '2022-03-09 15:49:44', '192.168.1.108', 'NO'),
(23, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-09 15:49:53', '192.168.1.108', 'YES'),
(24, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-09 15:59:01', '192.168.1.108', 'YES'),
(25, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-09 15:59:23', '192.168.1.108', 'YES'),
(26, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-09 16:06:46', '192.168.1.108', 'YES'),
(27, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-09 16:43:17', '192.168.1.108', 'YES'),
(28, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-09 16:50:58', '192.168.1.108', 'YES'),
(29, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-09 17:05:05', '192.168.1.108', 'YES'),
(30, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-10 10:44:37', '192.168.1.108', 'YES'),
(31, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-10 11:59:20', '192.168.1.108', 'YES'),
(32, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-10 12:03:18', '192.168.1.108', 'YES'),
(33, 'cc@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-10 13:18:44', '192.168.1.108', 'NO'),
(34, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-10 13:18:51', '192.168.1.108', 'YES'),
(35, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-10 13:19:16', '192.168.1.108', 'YES'),
(36, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-10 16:16:53', '::1', 'YES'),
(37, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-10 18:32:47', '::1', 'YES'),
(38, 'cc@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-10 18:33:38', '::1', 'NO'),
(39, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-10 18:33:48', '::1', 'YES'),
(40, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-10 18:34:35', '::1', 'YES'),
(41, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-10 18:39:44', '::1', 'YES'),
(42, 'b@gmail.com', 'client', 'tba_onboard_admin', '2022-03-10 18:40:01', '::1', 'NO'),
(43, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-10 18:40:07', '::1', 'YES'),
(44, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-11 10:56:34', '::1', 'YES'),
(45, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-12 09:23:46', '::1', 'YES'),
(46, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-12 17:23:13', '::1', 'YES'),
(47, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-14 10:57:52', '192.168.1.108', 'YES'),
(48, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-14 12:21:57', '192.168.1.108', 'YES'),
(49, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-15 10:31:39', '192.168.1.108', 'YES'),
(50, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-15 13:44:02', '192.168.1.108', 'YES'),
(51, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-15 13:45:58', '192.168.1.108', 'YES'),
(52, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-15 16:57:23', '192.168.1.108', 'YES'),
(53, 'c@gmail.com', 'client', 'tba_onboard_admin', '2022-03-15 19:25:38', '192.168.1.108', 'NO'),
(54, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-15 19:25:44', '192.168.1.108', 'YES'),
(55, 'cc@gmail.com', 'pavi@123', 'tba_onboard_admin', '2022-03-16 10:31:11', '192.168.1.108', 'NO'),
(56, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-16 10:31:17', '192.168.1.108', 'YES'),
(57, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-16 10:32:42', '192.168.1.108', 'YES'),
(58, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-16 13:28:02', '192.168.1.108', 'YES'),
(59, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-16 16:29:04', '192.168.1.108', 'YES'),
(60, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-16 17:15:19', '192.168.1.108', 'YES'),
(61, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-16 17:16:51', '192.168.1.108', 'YES'),
(62, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-17 11:15:09', '192.168.1.108', 'YES'),
(63, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-17 12:39:21', '::1', 'YES'),
(64, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-18 10:42:31', '192.168.1.108', 'YES'),
(65, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-19 10:35:26', '192.168.1.108', 'YES'),
(66, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-19 13:07:52', '192.168.1.108', 'YES'),
(67, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-19 13:08:10', '192.168.1.108', 'YES'),
(68, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-19 18:22:03', '192.168.1.108', 'YES'),
(69, 'b@gmail.com', 'admi ', 'tba_onboard_admin', '2022-03-21 10:54:17', '192.168.1.108', 'NO'),
(70, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-21 10:54:22', '192.168.1.108', 'YES'),
(71, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-21 15:16:13', '192.168.1.108', 'YES'),
(72, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-21 18:47:45', '192.168.1.108', 'YES'),
(73, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-21 18:49:03', '192.168.1.108', 'YES'),
(74, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-22 10:27:50', '192.168.1.108', 'YES'),
(75, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-22 15:56:44', '192.168.1.108', 'YES'),
(76, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-22 17:18:00', '192.168.1.108', 'YES'),
(77, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-23 10:33:40', '192.168.1.108', 'YES'),
(78, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-24 09:45:21', '192.168.1.108', 'YES'),
(79, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-24 10:54:25', '192.168.1.108', 'YES'),
(80, 'c@gmail.com', 'client', 'tba_onboard_admin', '2022-03-24 15:08:17', '192.168.1.108', 'NO'),
(81, 'c@gmail.com', 'client1', 'tba_onboard_admin', '2022-03-24 15:10:59', '192.168.1.108', 'YES'),
(82, 'c@gmail.com', 'client1', 'tba_onboard_admin', '2022-03-24 15:18:57', '192.168.1.108', 'YES'),
(83, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-24 19:19:44', '192.168.1.108', 'YES'),
(84, 'c@gmail.com', 'client1', 'tba_onboard_admin', '2022-03-25 10:41:26', '192.168.1.108', 'YES'),
(85, 'c@gmail.com', 'client1', 'tba_onboard_admin', '2022-03-26 11:46:11', '192.168.1.108', 'YES'),
(86, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-26 18:25:05', '192.168.1.108', 'YES'),
(87, 'c@gmail.com', 'client1', 'tba_onboard_admin', '2022-03-26 18:26:18', '192.168.1.108', 'YES'),
(88, 'c@gmail.com', 'client1', 'tba_onboard_admin', '2022-03-26 18:31:38', '192.168.1.108', 'YES'),
(89, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-28 10:42:33', '192.168.1.108', 'YES'),
(90, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-29 09:14:34', '192.168.1.108', 'YES'),
(91, 'c@gmail.com', 'client1', 'tba_onboard_admin', '2022-03-29 11:30:46', '192.168.1.108', 'YES'),
(92, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-29 11:31:10', '192.168.1.108', 'YES'),
(93, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-29 11:37:32', '192.168.1.108', 'YES'),
(94, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-29 12:06:40', '192.168.1.108', 'YES'),
(95, 'c@gmail.com', 'client1', 'tba_onboard_admin', '2022-03-29 13:29:24', '192.168.1.108', 'YES'),
(96, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-31 10:41:05', '192.168.1.108', 'YES'),
(97, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-31 11:43:26', '192.168.1.108', 'YES'),
(98, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-03-31 13:24:04', '::1', 'YES'),
(99, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-03-31 14:17:08', '127.0.0.1', 'YES'),
(100, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-04-01 10:31:26', '192.168.1.108', 'YES'),
(101, 'cc@gmail.com', 'clienyt1', 'tba_onboard_admin', '2022-04-01 11:00:49', '192.168.1.108', 'NO'),
(102, 'cc@gmail.com', 'clienyt1', 'tba_onboard_admin', '2022-04-01 11:00:50', '192.168.1.108', 'NO'),
(103, 'cc@gmail.com', 'client1', 'tba_onboard_admin', '2022-04-01 11:00:56', '192.168.1.108', 'NO'),
(104, 'c@gmail.com', 'client1', 'tba_onboard_admin', '2022-04-01 11:01:01', '192.168.1.108', 'YES'),
(105, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-04-01 13:24:05', '::1', 'YES'),
(106, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-04-01 13:57:42', '::1', 'YES'),
(107, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-04-01 19:34:42', '::1', 'YES'),
(108, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-04-02 09:18:33', '::1', 'YES'),
(109, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-04-02 11:47:07', '::1', 'YES'),
(110, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-04-02 13:46:57', '::1', 'YES'),
(111, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-04-02 14:03:37', '::1', 'YES'),
(112, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-04-02 14:04:06', '::1', 'YES'),
(113, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-04-04 10:32:16', '192.168.1.108', 'YES'),
(114, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-04-04 10:44:30', '::1', 'YES'),
(115, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-04-04 11:56:03', '::1', 'YES'),
(116, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-04-04 17:12:32', '192.168.29.191', 'YES'),
(117, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-04-05 10:27:07', '::1', 'YES'),
(118, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-04-06 10:23:29', '::1', 'YES'),
(119, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-04-06 17:40:18', '::1', 'YES'),
(120, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-04-06 17:41:47', '::1', 'YES'),
(121, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-04-06 17:45:09', '::1', 'YES'),
(122, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-04-07 10:24:26', '::1', 'YES'),
(123, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-04-07 11:03:03', '::1', 'YES'),
(124, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-04-07 11:03:13', '::1', 'YES'),
(125, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-04-07 15:44:47', '::1', 'YES'),
(126, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-04-08 11:57:44', '::1', 'YES'),
(127, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-04-19 10:49:04', '::1', 'YES'),
(128, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-04-19 10:49:13', '::1', 'YES'),
(129, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-05-16 19:10:07', '::1', 'YES'),
(130, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-05-16 19:10:36', '127.0.0.1', 'YES'),
(131, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-05-16 19:32:21', '::1', 'YES'),
(132, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-05-16 19:32:36', '::1', 'YES'),
(133, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-05-18 16:23:20', '::1', 'YES'),
(134, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-05-18 16:39:27', '::1', 'YES'),
(135, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-05-18 16:40:29', '::1', 'YES'),
(136, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-05-19 11:30:16', '::1', 'YES'),
(137, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-05-20 10:26:52', '::1', 'YES'),
(138, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-05-20 14:38:00', '::1', 'YES'),
(139, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-05-20 14:45:38', '::1', 'YES'),
(140, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-05-20 18:18:40', '::1', 'YES'),
(141, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-05-20 18:22:38', '127.0.0.1', 'YES'),
(142, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-05-20 18:58:44', '::1', 'YES'),
(143, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-05-23 11:55:33', '::1', 'YES'),
(144, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-05-24 10:40:36', '::1', 'YES'),
(145, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-05-24 11:06:31', '::1', 'YES'),
(146, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-05-25 10:35:06', '::1', 'YES'),
(147, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-05-25 12:31:17', '::1', 'YES'),
(148, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-05-25 15:39:35', '127.0.0.1', 'YES'),
(149, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-05-25 18:15:14', '::1', 'YES'),
(150, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-05-25 19:10:27', '::1', 'YES'),
(151, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-05-25 22:18:12', '::1', 'YES'),
(152, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-05-26 22:48:25', '::1', 'YES'),
(153, 'c@gmail.com', 'client1', 'tba_onboard_admin', '2022-05-27 01:54:34', '::1', 'YES'),
(154, 'c@gmail.com', 'client1', 'tba_onboard_admin', '2022-05-27 01:54:35', '::1', 'YES'),
(155, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-05-27 01:59:22', '::1', 'YES'),
(156, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-05-28 10:38:18', '::1', 'YES'),
(157, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-05-28 10:41:08', '127.0.0.1', 'YES'),
(158, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-05-28 13:16:01', '127.0.0.1', 'YES'),
(159, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-05-28 23:10:59', '::1', 'YES'),
(160, 'cc@gmail.com', 'client', 'tba_onboard_admin', '2022-05-28 23:32:38', '::1', 'YES'),
(161, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-05-30 22:52:08', '::1', 'YES'),
(162, 'b@gmail.com', 'admin', 'tba_onboard_admin', '2022-05-30 22:52:09', '::1', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `chat_bot`
--

CREATE TABLE `chat_bot` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `sender_msg` text NOT NULL,
  `sent_at` datetime NOT NULL,
  `replay_by` int(11) NOT NULL,
  `replay_msg` text NOT NULL,
  `replay_at` datetime NOT NULL,
  `sent_ip` varchar(55) NOT NULL,
  `replay_ip` varchar(55) NOT NULL,
  `is_active` int(11) NOT NULL,
  `is_viewed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_bot`
--

INSERT INTO `chat_bot` (`id`, `sender_id`, `sender_msg`, `sent_at`, `replay_by`, `replay_msg`, `replay_at`, `sent_ip`, `replay_ip`, `is_active`, `is_viewed`) VALUES
(1, 2, 'Hai,,this is me from erode.!!', '2022-03-19 16:56:10', 1, 'Hello!!Welcome to TBA', '2022-03-19 17:11:58', '', '', 0, 0),
(2, 2, 'erwwrw', '2022-03-19 17:00:27', 1, 'setting', '0000-00-00 00:00:00', '', '', 0, 0),
(3, 2, 'rgterte', '2022-03-19 17:01:24', 0, '', '0000-00-00 00:00:00', '', '', 0, 0),
(4, 4, 'trrrtr', '2022-04-01 12:12:59', 0, '', '0000-00-00 00:00:00', '192.168.1.108', '', 0, 0),
(5, 4, 'trrrtr', '2022-04-01 12:13:00', 0, '', '0000-00-00 00:00:00', '192.168.1.108', '', 0, 0),
(6, 4, 'trrrtr', '2022-04-01 12:13:01', 0, '', '0000-00-00 00:00:00', '192.168.1.108', '', 0, 0),
(7, 4, 'trrrtr', '2022-04-01 12:13:01', 0, '', '0000-00-00 00:00:00', '192.168.1.108', '', 0, 0),
(8, 4, 'trrrtr', '2022-04-01 12:13:01', 0, '', '0000-00-00 00:00:00', '192.168.1.108', '', 0, 0),
(9, 4, 'trrrtr', '2022-04-01 12:13:01', 0, '', '0000-00-00 00:00:00', '192.168.1.108', '', 0, 0),
(10, 4, 'trrrtr', '2022-04-01 12:13:01', 0, '', '0000-00-00 00:00:00', '192.168.1.108', '', 0, 0),
(11, 4, 'trrrtr', '2022-04-01 12:13:03', 0, '', '0000-00-00 00:00:00', '192.168.1.108', '', 0, 0),
(12, 4, 'trrrtr', '2022-04-01 12:13:03', 0, '', '0000-00-00 00:00:00', '192.168.1.108', '', 0, 0),
(13, 4, 'trrrtr', '2022-04-01 12:13:05', 0, '', '0000-00-00 00:00:00', '192.168.1.108', '', 0, 0),
(14, 4, 'er54', '2022-04-01 12:14:48', 0, '', '0000-00-00 00:00:00', '192.168.1.108', '', 0, 0),
(15, 4, 'er54', '2022-04-01 12:14:49', 0, '', '0000-00-00 00:00:00', '192.168.1.108', '', 0, 0),
(16, 4, '342', '2022-04-01 12:15:05', 0, '', '0000-00-00 00:00:00', '192.168.1.108', '', 0, 0),
(17, 2, 'rff', '2022-05-16 19:14:28', 0, '', '0000-00-00 00:00:00', '::1', '', 0, 0),
(18, 2, 'rff', '2022-05-16 19:14:29', 0, '', '0000-00-00 00:00:00', '::1', '', 0, 0),
(19, 2, 'rff', '2022-05-16 19:14:31', 0, '', '0000-00-00 00:00:00', '::1', '', 0, 0),
(20, 2, 'rff', '2022-05-16 19:14:32', 0, '', '0000-00-00 00:00:00', '::1', '', 0, 0),
(21, 2, 'rff', '2022-05-16 19:14:32', 0, '', '0000-00-00 00:00:00', '::1', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `dist_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(55) NOT NULL,
  `country_code` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `dist_id` int(11) NOT NULL,
  `dist_name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `service_id` int(11) NOT NULL,
  `order_id` text NOT NULL,
  `amount` int(11) NOT NULL,
  `residence_country` text NOT NULL,
  `txn_id` text NOT NULL,
  `txn_amt` text NOT NULL,
  `paymentmode` text NOT NULL,
  `currency` text NOT NULL,
  `txn_date` text NOT NULL,
  `status` text NOT NULL,
  `mc_fee` int(11) NOT NULL,
  `protection_eligibility` text NOT NULL,
  `payment_fee` text NOT NULL,
  `handling_amount` text NOT NULL,
  `shipping` text NOT NULL,
  `payment_gross` float NOT NULL,
  `receiver_id` text NOT NULL,
  `notify_version` text NOT NULL,
  `verify_sign` text NOT NULL,
  `ts_id` text NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `payer_id` varchar(255) NOT NULL,
  `payer_status` varchar(255) NOT NULL,
  `first_name` varchar(55) NOT NULL,
  `last_name` varchar(55) NOT NULL,
  `address_name` varchar(55) NOT NULL,
  `address_street` text NOT NULL,
  `address_city` varchar(55) NOT NULL,
  `address_country_code` varchar(55) NOT NULL,
  `inv_url` text NOT NULL,
  `cby` text NOT NULL,
  `cdate` datetime NOT NULL,
  `cip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `client_id`, `phonenumber`, `service_id`, `order_id`, `amount`, `residence_country`, `txn_id`, `txn_amt`, `paymentmode`, `currency`, `txn_date`, `status`, `mc_fee`, `protection_eligibility`, `payment_fee`, `handling_amount`, `shipping`, `payment_gross`, `receiver_id`, `notify_version`, `verify_sign`, `ts_id`, `payer_email`, `payer_id`, `payer_status`, `first_name`, `last_name`, `address_name`, `address_street`, `address_city`, `address_country_code`, `inv_url`, `cby`, `cdate`, `cip`) VALUES
(1, 2, '8778787878', 6, 'tba_onboard0624c2c98076c6', 1, 'IS', '1J674000P5653241H', '1.00', 'instant', 'USD', '2022-04-05T11:48:22Z', 'Completed', 1, 'ELIGIBLE', '0.54', '0.00', '0.00', 1, 'KJGPZC6ZRW8NS', 'UNVERSIONED', 'AXm4GX-dg4fCYd-yxyhgXRHdv4QVAaNNSHhWSdfw2TOY50H7OeQSsYz8', '6', 'pavithra.r@roundrockabaschool.onmicrosoft.com', 'JVCQE8Q9CMAH6', 'Completed', 'Pavithra', 'Rajendran', 'Pavithra Rajendran', '142/4, 2nd floor Perundurai road, Opp to Sakthi mahal, Erode', 'Erode', 'IS', '', 'pavi_client', '2022-04-05 17:18:40', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` int(11) NOT NULL,
  `sd_id` int(11) NOT NULL,
  `pay_id` varchar(55) NOT NULL,
  `amount` int(11) NOT NULL,
  `currency` varchar(55) NOT NULL,
  `status` varchar(55) NOT NULL,
  `order_id` varchar(55) NOT NULL,
  `invoice_id` varchar(55) NOT NULL,
  `international` int(11) NOT NULL,
  `method` varchar(55) NOT NULL,
  `amount_refunded` int(11) NOT NULL,
  `amount_transferred` int(11) NOT NULL,
  `refund_status` text NOT NULL,
  `captured` varchar(55) NOT NULL,
  `description` text NOT NULL,
  `card_id` text NOT NULL,
  `card` text NOT NULL,
  `bank` text NOT NULL,
  `wallet` text NOT NULL,
  `vpa` text NOT NULL,
  `email` text NOT NULL,
  `contact` text NOT NULL,
  `notes` text NOT NULL,
  `fee` text NOT NULL,
  `tax` text NOT NULL,
  `error_code` text NOT NULL,
  `error_description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `card_type` text NOT NULL,
  `card_network` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pay_details`
--

CREATE TABLE `pay_details` (
  `id` int(2) NOT NULL,
  `userid` int(11) NOT NULL,
  `service_type` int(11) NOT NULL,
  `sevice_type_id` int(11) NOT NULL,
  `planid` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `inv_prefix` text NOT NULL,
  `inv_no` text NOT NULL,
  `order_id` text NOT NULL,
  `TXN_AMOUNT` float NOT NULL,
  `TXN_DATE` text NOT NULL,
  `TXN_ID` text NOT NULL,
  `TXN_STATUS` varchar(100) NOT NULL,
  `adid` int(11) NOT NULL,
  `amount` float NOT NULL,
  `actual_amount` float NOT NULL,
  `gst_amount` float NOT NULL,
  `total_amount` float NOT NULL,
  `gst_percent` float NOT NULL,
  `validity` int(11) NOT NULL,
  `is_follow` int(11) NOT NULL,
  `follow_reason` text NOT NULL,
  `invoice_path` varchar(250) NOT NULL,
  `cby` mediumtext NOT NULL,
  `cdate` datetime NOT NULL,
  `cip` mediumtext NOT NULL,
  `mby` mediumtext NOT NULL,
  `mdate` mediumtext NOT NULL,
  `mip` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pay_details`
--

INSERT INTO `pay_details` (`id`, `userid`, `service_type`, `sevice_type_id`, `planid`, `start_date`, `end_date`, `inv_prefix`, `inv_no`, `order_id`, `TXN_AMOUNT`, `TXN_DATE`, `TXN_ID`, `TXN_STATUS`, `adid`, `amount`, `actual_amount`, `gst_amount`, `total_amount`, `gst_percent`, `validity`, `is_follow`, `follow_reason`, `invoice_path`, `cby`, `cdate`, `cip`, `mby`, `mdate`, `mip`) VALUES
(1, 7, 4, 1, 15, '2020-03-16', '2020-03-12', '', '', '', 0, '2020-03-16', '', 'TXN_SUCCESS', 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '2020-03-16 11:42:06', '', '', '', ''),
(2, 20, 1, 3, 3, '2020-03-16', '2020-03-23', '', '', '', 0, '2020-03-16', '', 'TXN_SUCCESS', 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '2020-03-16 11:49:42', '', '', '', ''),
(3, 21, 1, 4, 3, '2020-03-10', '2020-03-12', '', '', '', 0, '2020-03-16', '', 'TXN_SUCCESS', 0, 0, 0, 0, 0, 0, 0, 0, '', 'CALENDAR_115_2020-03-08', '', '2020-03-16 12:13:07', '', '', '', ''),
(4, 21, 1, 5, 3, '2020-03-16', '2020-03-23', '', '', '', 0, '2020-03-16', '', 'TXN_SUCCESS', 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '2020-03-16 12:44:51', '', '', '', ''),
(5, 20, 3, 2, 9, '2020-03-16', '2020-03-12', '', '', '', 0, '2020-03-16', '', 'TXN_SUCCESS', 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '2020-03-16 02:15:25', '', '', '', ''),
(6, 9, 1, 1, 3, '2020-03-16', '2020-03-23', '', '', '', 0, '2020-03-16', '', 'TXN_SUCCESS', 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '2020-03-16 02:17:45', '', '', '', ''),
(7, 20, 2, 2, 8, '2020-03-16', '2020-03-23', '', '', '', 0, '2020-03-16', '', 'TXN_SUCCESS', 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '2020-03-16 02:20:10', '', '', '', ''),
(8, 21, 1, 4, 3, '2020-03-12', '2020-03-23', '', '', '', 0, '2020-03-16', '', 'TXN_SUCCESS', 0, 0, 0, 0, 0, 0, 0, 0, '', 'CALENDAR_13_2020-02-21', '', '2020-03-16 12:13:07', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers_details`
--

CREATE TABLE `subscribers_details` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `tba_service_id` int(11) NOT NULL,
  `subscribed_date` datetime NOT NULL,
  `service_status` varchar(55) NOT NULL,
  `service_process_status` varchar(25) NOT NULL,
  `payment_status` varchar(55) NOT NULL,
  `is_request` int(11) NOT NULL COMMENT '2-req,1-subscribed,3-approved,4-assigned,5-progress,6-deployed,7-under_review,8-closed',
  `requested_date` datetime NOT NULL,
  `payment_date` date NOT NULL,
  `payment_id` int(11) NOT NULL,
  `delivery_url` text NOT NULL,
  `clients_remarks` text NOT NULL,
  `clients_doc` text NOT NULL,
  `clients_expected date` date NOT NULL,
  `service_approved_by` varchar(55) NOT NULL,
  `service_approved_date` datetime(6) NOT NULL,
  `service_delivered_date` datetime(6) NOT NULL,
  `cdate` datetime(6) NOT NULL,
  `cip` text NOT NULL,
  `cby` varchar(55) NOT NULL,
  `mdate` datetime(6) NOT NULL,
  `mby` varchar(5) NOT NULL,
  `mip` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribers_details`
--

INSERT INTO `subscribers_details` (`id`, `client_id`, `tba_service_id`, `subscribed_date`, `service_status`, `service_process_status`, `payment_status`, `is_request`, `requested_date`, `payment_date`, `payment_id`, `delivery_url`, `clients_remarks`, `clients_doc`, `clients_expected date`, `service_approved_by`, `service_approved_date`, `service_delivered_date`, `cdate`, `cip`, `cby`, `mdate`, `mby`, `mip`) VALUES
(1, 2, 6, '2022-04-05 17:18:19', ' subscribed', 'subscribed', 'Completed', 1, '0000-00-00 00:00:00', '2022-04-05', 1, '', '', '', '0000-00-00', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '2022-04-05 17:18:19.000000', '::1', 'pavi_client', '2022-04-05 17:18:40.000000', 'pavi_', '::1'),
(2, 2, 5, '2022-04-05 19:04:05', 'subscribed', 'subscribed', 'not paid', 1, '0000-00-00 00:00:00', '0000-00-00', 0, '', '', '', '0000-00-00', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '2022-04-05 19:04:05.000000', '::1', 'pavi_client', '2022-05-25 15:39:47.000000', 'pavi_', '127.0.0.1'),
(3, 2, 2, '0000-00-00 00:00:00', 'requested', 'Approved', 'not paid', 3, '2022-04-06 17:41:30', '0000-00-00', 0, '', '', '', '0000-00-00', 'pavi', '2022-05-23 12:01:17.000000', '0000-00-00 00:00:00.000000', '2022-04-06 17:41:30.000000', '::1', 'pavi_client', '2022-04-19 10:49:30.000000', 'pavi_', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `tba_announcement`
--

CREATE TABLE `tba_announcement` (
  `id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8mb4 NOT NULL,
  `description` text CHARACTER SET utf8mb4 NOT NULL,
  `remark` text CHARACTER SET utf8mb4 NOT NULL,
  `to_whom` text CHARACTER SET utf8mb4 NOT NULL,
  `live_date` varchar(11) NOT NULL,
  `last_date_type` int(11) NOT NULL,
  `last_date` text DEFAULT NULL,
  `is_active` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL,
  `cdate` datetime(6) NOT NULL,
  `cby` varchar(55) NOT NULL,
  `cip` varchar(55) NOT NULL,
  `mdate` datetime(6) NOT NULL,
  `mby` varchar(55) NOT NULL,
  `mip` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tba_announcement`
--

INSERT INTO `tba_announcement` (`id`, `title`, `description`, `remark`, `to_whom`, `live_date`, `last_date_type`, `last_date`, `is_active`, `is_delete`, `cdate`, `cby`, `cip`, `mdate`, `mby`, `mip`) VALUES
(1, 'dwrdew', '<p>oguglogol ugkgkgkjgk kjggj,</p>\n', 'rwerwe', '1,2', '2022-05-25', 1, '2022-05-29', 0, 0, '2022-05-25 22:52:55.000000', 'pavi', '::1', '2022-05-26 01:23:50.000000', 'pavi', '::1'),
(2, 'rerere', '<p>tugkgkgitwiueqwe</p>\n\n<p>weqwewqeq</p>\n', 'rererere', '1', '2022-05-26', 1, '2022-05-28', 0, 0, '2022-05-25 23:25:45.000000', 'pavi', '::1', '0000-00-00 00:00:00.000000', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tba_announcement_status`
--

CREATE TABLE `tba_announcement_status` (
  `id` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL,
  `is_viewed` int(11) NOT NULL,
  `viewed_time` datetime NOT NULL,
  `is_ack` int(11) NOT NULL,
  `ack_by` varchar(50) NOT NULL,
  `ack_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tba_deliverables`
--

CREATE TABLE `tba_deliverables` (
  `id` int(6) NOT NULL,
  `tba_category_id` int(11) NOT NULL,
  `features_id` int(11) NOT NULL,
  `deliverable` text NOT NULL,
  `position` int(11) NOT NULL,
  `is_delete` int(6) NOT NULL,
  `cip` varchar(150) NOT NULL,
  `cby` varchar(50) NOT NULL,
  `cdate` datetime(6) NOT NULL,
  `mip` varchar(50) NOT NULL,
  `mby` varchar(50) NOT NULL,
  `mdate` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tba_deliverables`
--

INSERT INTO `tba_deliverables` (`id`, `tba_category_id`, `features_id`, `deliverable`, `position`, `is_delete`, `cip`, `cby`, `cdate`, `mip`, `mby`, `mdate`) VALUES
(1, 1, 1, 'test-1', 0, 0, '', '', '0000-00-00 00:00:00.000000', '', '', '0000-00-00 00:00:00.000000'),
(2, 1, 2, 'Free call+sms', 0, 0, '', '', '0000-00-00 00:00:00.000000', '', '', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tba_features`
--

CREATE TABLE `tba_features` (
  `id` int(11) NOT NULL,
  `features` text NOT NULL,
  `position` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL,
  `cdate` datetime(6) NOT NULL,
  `cby` varchar(50) NOT NULL,
  `cip` varchar(50) NOT NULL,
  `mdate` datetime(6) NOT NULL,
  `mby` varchar(50) NOT NULL,
  `mip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tba_features`
--

INSERT INTO `tba_features` (`id`, `features`, `position`, `is_delete`, `cdate`, `cby`, `cip`, `mdate`, `mby`, `mip`) VALUES
(1, 'SEO Feature', 7, 0, '0000-00-00 00:00:00.000000', '', '', '0000-00-00 00:00:00.000000', '', ''),
(2, 'Telemarketing', 1, 0, '0000-00-00 00:00:00.000000', '', '', '0000-00-00 00:00:00.000000', '', ''),
(3, 'test-1', 2, 0, '0000-00-00 00:00:00.000000', '', '', '0000-00-00 00:00:00.000000', '', ''),
(4, 'test-2', 3, 0, '0000-00-00 00:00:00.000000', '', '', '0000-00-00 00:00:00.000000', '', ''),
(5, 'test-3', 4, 0, '0000-00-00 00:00:00.000000', '', '', '0000-00-00 00:00:00.000000', '', ''),
(6, 'test-4', 5, 0, '0000-00-00 00:00:00.000000', '', '', '0000-00-00 00:00:00.000000', '', ''),
(7, 'test-5', 6, 0, '0000-00-00 00:00:00.000000', '', '', '0000-00-00 00:00:00.000000', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tba_pack_details`
--

CREATE TABLE `tba_pack_details` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `pack_name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `validity_count` int(11) NOT NULL,
  `pack_for` varchar(15) NOT NULL,
  `features` text NOT NULL,
  `deliverables` text NOT NULL,
  `is_active` int(5) NOT NULL,
  `is_delete` int(5) NOT NULL,
  `cdate` datetime NOT NULL,
  `cip` int(25) NOT NULL,
  `cby` int(25) NOT NULL,
  `mdate` datetime NOT NULL,
  `mip` varchar(25) NOT NULL,
  `mby` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tba_pack_details`
--

INSERT INTO `tba_pack_details` (`id`, `service_id`, `pack_name`, `price`, `currency`, `validity_count`, `pack_for`, `features`, `deliverables`, `is_active`, `is_delete`, `cdate`, `cip`, `cby`, `mdate`, `mip`, `mby`) VALUES
(1, 0, 'pack - 1', 0, 'AUD', 5, '', 'Testing', '', 0, 0, '2022-05-20 16:25:09', 0, 0, '0000-00-00 00:00:00', '', ''),
(2, 0, 'pack - 12', 0, 'CNY', 5, '', 'rrr', '', 0, 0, '2022-05-20 17:47:57', 0, 0, '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tba_services`
--

CREATE TABLE `tba_services` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `tba_service_category` int(6) NOT NULL,
  `tba_service_type` int(6) NOT NULL,
  `description` text NOT NULL,
  `price` int(6) NOT NULL COMMENT '1-fixed_amt,2_custom',
  `price_amt` int(6) NOT NULL,
  `remarks` text NOT NULL,
  `url` varchar(154) NOT NULL,
  `inst` text NOT NULL,
  `is_active` int(11) NOT NULL,
  `cdate` datetime NOT NULL,
  `cby` varchar(250) NOT NULL,
  `cip` varchar(55) NOT NULL,
  `mdate` varchar(55) NOT NULL,
  `mip` varchar(55) NOT NULL,
  `mby` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tba_services`
--

INSERT INTO `tba_services` (`id`, `title`, `tba_service_category`, `tba_service_type`, `description`, `price`, `price_amt`, `remarks`, `url`, `inst`, `is_active`, `cdate`, `cby`, `cip`, `mdate`, `mip`, `mby`) VALUES
(1, 'title - 12', 2, 9, '<p>Pavi</p>\r\n', 2, 0, 'test -21', 'https://www.empowertherapy.com/contact-us', 'gallery/images/client landing page - theme 3 overall layout.jpg', 0, '2022-03-11 13:08:15', 'pavi', '::1', '2022-03-14 11:50:39', '192.168.1.108', 'pavi'),
(2, 'dgtrgert', 1, 1, '<p><strong>rt6454564564</strong></p>\r\n', 2, 0, 'eryreyryry', 'https://www.empowertherapy.com/speech-therapy.php', 'gallery/images/141114client landing page - theme 1 overall layout.jpg', 0, '2022-03-11 17:37:51', 'pavi', '::1', '', '', ''),
(3, 'CKEditor - JSFiddle - Code Playground', 2, 8, '<h2><strong>Remarks<a href=\"https://riptutorial.com/ckeditor#remarks\">#</a></strong></h2>\r\n\r\n<p>CKEditor is a JavaScript based WYSIWYG editor created for use within web pages. It is open source and plugin based making it both customizable and extensible.</p>\r\n\r\n<p>The CKEditor website can be found in&nbsp;<a href=\"http://www.ckeditor.com/\" rel=\"nofollow noreferrer\" target=\"_blank\">http://www.ckeditor.com</a>&nbsp;and the source code of the library is&nbsp;<a href=\"https://github.com/ckeditor\" rel=\"nofollow noreferrer\" target=\"_blank\">available on github</a>.</p>\r\n\r\n<p>The official documentation of CKEditor can be found at&nbsp;<a href=\"http://docs.cksource.com/Main_Page\" rel=\"nofollow noreferrer\" target=\"_blank\">http://docs.cksource.com/Main_Page</a></p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p><strong>Versions<a href=\"https://riptutorial.com/ckeditor#versions\">#</a></strong></p>\r\n', 2, 0, 'Test your JavaScript, CSS, HTML or CoffeeScript online with JSFiddle code editor.', 'http://jsfiddle.net/indiana/5uegnc0p/', 'gallery/images/453532web layout.jpg', 0, '2022-03-12 09:33:33', 'pavi', '::1', '', '', ''),
(4, 'title -23', 3, 13, '<p><em>I made a simple editing for to edit data in mysql, everything works fine except when I want to edit an input file type image it doesn&#39;t work, it doesn&#39;t give an error message it just doesn&#39;t edit anything and when I remove the input file type image it works. and by editing an image I mean entering a new image the will replace the old image.</em></p>\r\n', 2, 0, 'by editing an image I mean entering a new image the will replace the old image.', 'https://stackoverflow.com/questions/18207155/editing-image-by-using-input-file-type', 'gallery/images/client landing page - theme 3 overall layout.jpg', 0, '2022-03-12 17:43:42', 'pavi', '::1', '', '', ''),
(5, 'title - 1', 2, 9, '<p><strong>Pavi</strong></p>\r\n', 1, 1, 'test -21', 'https://www.empowertherapy.com/contact-us', 'gallery/images/client landing page - theme 3 overall layout.jpg', 0, '2022-03-12 17:44:58', 'pavi', '::1', '', '', ''),
(6, 'Bootstrap toggle doesn\'t display well when added dynamically', 2, 9, '<p>I was facing the same issue using bootstrap-toggle. Then after debugging, I understood the behaviour and handled it.</p>\r\n\r\n<p>If the checkbox is not in the dom when page loads, then we need to initialize the toggler when the checkbox is available to the dom and also any listener methods.</p>\r\n\r\n<p>if you are doing an ajax call then in the success method you can add the following in the end.</p>\r\n\r\n<pre>\r\n<code>$(&quot;[data-toggle=&#39;toggle&#39;]&quot;).bootstrapToggle(&#39;destroy&#39;)                 \r\n$(&quot;[data-toggle=&#39;toggle&#39;]&quot;).bootstrapToggle();\r\n</code></pre>\r\n\r\n<p>sometimes it may take time to add to the dom and your code gets run before checkbox getting added to the dom, you can wrap the above code in a javascript timer</p>\r\n\r\n<pre>\r\n<code>     setTimeout( () =&gt; {\r\n                    $(&quot;[data-toggle=&#39;toggle&#39;]&quot;).bootstrapToggle(&#39;destroy&#39;)                 \r\n                    $(&quot;[data-toggle=&#39;toggle&#39;]&quot;).bootstrapToggle();\r\n                    $(&quot;.checkbox&quot;).change(function() {\r\n                      console.log(&quot;toggled&quot;);\r\n                       });\r\n                    }, 100 );\r\n</code></pre>\r\n', 1, 1, 'Asked 6 years, 8 months ago\r\nModified 2 years, 10 months ago\r\nViewed 5k times\r\n', 'https://stackoverflow.com/questions/30977713/bootstrap-toggle-doesnt-display-well-when-added-dynamically', 'gallery/images/web layout.jpg', 0, '2022-03-15 13:45:28', 'pavi', '192.168.1.108', '', '', ''),
(7, 'testing-21', 7, 19, '<p>rr</p>\r\n', 1, 1, 'rrrr', 'https://www.empowertherapy.com/speech-therapy.php', 'gallery/images/digital_marketing_icon.png', 0, '2022-03-26 18:25:51', 'pavi', '192.168.1.108', '', '', ''),
(8, 'Website with SEO', 10, 24, '<p>TEsting&nbsp;</p>\r\n', 1, 50, 'REmarks for this service', 'https://www.empowertherapy.com/about.php', 'gallery/images/git_wrk_flow.jpg', 0, '2022-05-20 18:17:08', 'pavi', '::1', '', '', ''),
(9, 'website with seo 1', 10, 24, '<p>rtr</p>\r\n', 1, 5, 'rter', 'http://localhost/tbaonboardingtool/tba_services.php', 'gallery/images/gitbranch.png', 0, '2022-05-20 18:23:29', 'pavi', '127.0.0.1', '', '', ''),
(10, 'website with seo 2', 10, 24, '<p>trr</p>\r\n', 1, 45, 'ry6r', 'http://localhost/tbaonboardingtool/add_tba_services.php', 'gallery/images/gitbranch.png', 0, '2022-05-20 18:24:05', 'pavi', '127.0.0.1', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tba_service_category`
--

CREATE TABLE `tba_service_category` (
  `id` int(11) NOT NULL,
  `category` varchar(55) NOT NULL,
  `is_active` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tba_service_category`
--

INSERT INTO `tba_service_category` (`id`, `category`, `is_active`, `is_delete`, `position`) VALUES
(1, 'Digital Marketing', 0, 0, 3),
(2, 'Graphic Design', 0, 0, 4),
(3, 'Web Development', 0, 0, 2),
(4, 'new', 1, 0, 4),
(5, 'Graphic D3sign', 1, 0, 5),
(6, 'Graphic tytr', 1, 0, 6),
(7, 'Featured Services', 0, 0, 5),
(8, 'Digital assets', 0, 0, 6),
(9, 'Digital Transformation', 0, 0, 7),
(10, 'Combo services', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tba_service_type`
--

CREATE TABLE `tba_service_type` (
  `id` int(11) NOT NULL,
  `tba_category_id` int(11) NOT NULL,
  `type` varchar(55) NOT NULL,
  `thumbnail_img` text NOT NULL,
  `is_active` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tba_service_type`
--

INSERT INTO `tba_service_type` (`id`, `tba_category_id`, `type`, `thumbnail_img`, `is_active`, `is_delete`, `position`) VALUES
(1, 1, 'Search Engine Optimization (SEO)', '', 0, 0, 2),
(2, 1, 'Pay Per Click Management', '', 0, 0, 3),
(3, 1, 'Social Media Marketing', '', 0, 0, 4),
(4, 1, 'Email Marketing', '', 0, 0, 1),
(5, 1, 'Mobile Marketing', '', 0, 0, 5),
(6, 1, 'Content Marketing', '', 0, 0, 6),
(7, 1, 'Influencer Marketing', '', 0, 0, 7),
(8, 2, 'Logo Design', '', 0, 0, 8),
(9, 2, 'UI / UX', '', 0, 0, 9),
(10, 2, 'Branding', '', 0, 0, 10),
(11, 3, 'Website Development', '', 0, 0, 11),
(12, 3, 'Wordpress Development', '', 0, 0, 12),
(13, 3, 'Ecommerce Website Development', '', 0, 0, 13),
(14, 3, 'App Development', '', 0, 0, 14),
(15, 3, 'Web Hosting Development', '', 0, 0, 15),
(16, 1, 'rdyrt', '', 1, 0, 16),
(17, 7, 'Web starter', '', 0, 0, 17),
(18, 7, 'Web pro', '', 0, 0, 18),
(19, 7, 'Web Beta', '', 0, 0, 19),
(20, 7, 'Web + SEO', '', 0, 0, 20),
(22, 7, 'Web marketing', '', 0, 0, 21),
(23, 7, 'Content Partner', '', 0, 0, 22),
(24, 10, 'web + seo', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `team_name` varchar(55) NOT NULL,
  `team_members` text NOT NULL,
  `is_active` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `cdate` datetime NOT NULL,
  `cby` varchar(55) NOT NULL,
  `cip` text NOT NULL,
  `mip` text NOT NULL,
  `mby` varchar(55) NOT NULL,
  `mdate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `team_name`, `team_members`, `is_active`, `is_delete`, `position`, `cdate`, `cby`, `cip`, `mip`, `mby`, `mdate`) VALUES
(1, 'Web', '1,2,4', 0, 0, 1, '2022-05-26 07:30:30', '', '', '::1', 'pavi', '2022-05-26 12:32:20'),
(2, 'admin', '1', 1, 0, 2, '2022-05-26 07:30:30', '', '', '::1', 'pavi', '2022-05-26 12:32:58'),
(3, 'App', '2', 0, 0, 3, '2022-05-26 07:31:32', '', '', '::1', 'pavi', '2022-05-26 12:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `usergroup`
--

CREATE TABLE `usergroup` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `access_per` text NOT NULL,
  `modify_per` mediumtext NOT NULL,
  `is_active` int(11) NOT NULL,
  `cby` mediumtext NOT NULL,
  `cdate` datetime NOT NULL,
  `cip` mediumtext NOT NULL,
  `mby` mediumtext NOT NULL,
  `mdate` mediumtext NOT NULL,
  `mip` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usergroup`
--

INSERT INTO `usergroup` (`id`, `name`, `access_per`, `modify_per`, `is_active`, `cby`, `cdate`, `cip`, `mby`, `mdate`, `mip`) VALUES
(1, 'Admin', '1,7,39,18,19,38,29,28,8,5,27,6,25,11,17,15,16,26,14,20,21,23,24,2,4,3', '', 0, 'pavithra', '2022-10-01 10:59:22', '::1', 'pavi', '2022-05-28 13:25:16', '127.0.0.1'),
(2, 'Client', '1,8,9,10,11,12,13,14,17,20,21', '', 0, 'admin', '2022-10-15 11:50:17', '::1', '|admin|admin|admin|admin|admin', '|2022-10-15-14:26:56|2022-10-15-14:28:37|2022-10-15-16:40:45|2022-10-15-16:43:43|2022-04-28-19:52:34', '|::1|::1|::1|::1|106.197.38.231');

-- --------------------------------------------------------

--
-- Table structure for table `usermodules`
--

CREATE TABLE `usermodules` (
  `id` int(11) NOT NULL,
  `mname` varchar(55) NOT NULL,
  `parent` int(11) NOT NULL,
  `url` varchar(55) NOT NULL,
  `submenu` int(11) NOT NULL,
  `icons` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `cby` mediumtext NOT NULL,
  `cdate` mediumtext NOT NULL,
  `cip` mediumtext NOT NULL,
  `mby` mediumtext NOT NULL,
  `mdate` mediumtext NOT NULL,
  `mip` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usermodules`
--

INSERT INTO `usermodules` (`id`, `mname`, `parent`, `url`, `submenu`, `icons`, `status`, `position`, `is_active`, `cby`, `cdate`, `cip`, `mby`, `mdate`, `mip`) VALUES
(1, 'Dashboard', 0, 'dashboard.php', 0, 'md-dashboard', 0, 1, 0, 'pavithra', '2022-10-01 10:59:10', '::1', '|admin|admin|admin', '|2022-10-01-11:12:31|2022-10-01-11:15:21|2022-10-01-11:16:34', '|::1|::1|::1'),
(2, 'User Management', 0, '', 0, 'md-account-circle', 0, 10, 0, 'admin', '2022-10-01 11:27:04', '::1', '|admin', '|2022-11-27-15:14:47', '|103.70.188.34'),
(3, 'User Group', 2, 'user_group.php', 1, '', 0, 23, 0, 'admin', '2022-10-01 11:27:38', '::1', '|admin', '|2022-10-01-16:53:03', '|::1'),
(4, 'User Modules', 2, 'user_management.php', 1, '', 0, 22, 0, 'admin', '2022-10-01 11:28:12', '::1', 'pavi', '2022-03-28 14:26:10', '192.168.1.108'),
(5, 'Admin', 0, '', 0, 'md-account-box', 0, 4, 0, 'admin', '2022-10-01 12:31:41', '::1', '', '', ''),
(6, 'Add Employee', 5, 'users.php', 1, '', 0, 4, 0, 'admin', '2022-10-01 12:38:54', '::1', 'pavi', '2022-03-29 10:03:18', '192.168.1.108'),
(7, 'Master', 0, '', 0, 'md-account-child', 0, 3, 0, 'admin', '2022-10-01 12:45:47', '::1', '', '', ''),
(8, 'Myprofile', 0, 'myprofile.php', 0, 'md-account-circle', 0, 3, 1, 'admin', '2022-10-01 12:53:51', '::1', '|admin', '|2022-10-15-14:52:10', '|::1'),
(9, 'Account Summary', 0, 'account_summary.php', 0, 'md-account-circle', 0, 5, 0, 'pavithra', '2022-10-01 10:59:10', '192.168.1.108/', 'pavi', '', '192.168.1.108/'),
(10, 'My Services', 0, 'myservice.php', 0, 'md-account-circle', 0, 6, 0, 'pavithra', '2022-03-09', '192.168.1.108/', 'pavi', '', '192.168.1.108/'),
(11, 'TBA Service', 0, '', 0, 'md-account-circle', 0, 7, 0, 'pavithra', '2022-03-09', '192.168.1.108/', 'pavi', '2022-03-09', '192.168.1.108/'),
(12, 'Subscriptions', 0, 'subscriptions.php', 0, 'md-account-circle', 0, 10, 0, 'pavithra', '2022-03-09', '192.168.1.108/', 'pavi', '2022-03-09', '192.168.1.108/'),
(13, 'Payment', 0, 'payment.php', 0, 'md-account-circle', 0, 10, 0, 'pavithra', '2022-03-09', 'http://192.168.1.108/', 'pavi', '', 'http://192.168.1.108/'),
(14, 'Supports', 0, '', 0, 'md-account-circle', 0, 8, 0, 'pavithra', '2022-03-06', 'http://192.168.1.108/', 'pavi', '2022-03-09', 'http://192.168.1.108/'),
(15, 'Add New Service', 11, 'add_tba_services.php', 1, 'md-account-circle', 0, 4, 0, 'Pavithra', '2022-03-09', '192.168.1.108', 'Pavi', '222-03-06', '192.168.1.108'),
(16, 'Update Our Service', 11, 'list_tba_service.php', 1, 'md-account-circle', 0, 5, 0, 'pavi', '2022-06-03', '192.168.1.108', 'pavi', '2022-03-06', '\r\n192.168.1.108'),
(17, 'Recent Services', 11, 'tba_services.php', 1, 'md-account-circle', 0, 3, 0, 'pavi', '2022-03-06', '192.168.1.108', '', '2022-03-06', '192.168.1.108'),
(18, 'New Service Category', 7, 'add_tba_service_category.php', 1, '', 0, 6, 0, 'Pavithra', '2022-03-15', '', 'pavi', '2022-05-20 22:58:15', '::1'),
(19, 'New Service Type', 7, 'add_tba_service_type.php', 1, '', 0, 7, 0, 'Pavithra', '2022-03-15', '', 'pavi', '2022-05-20 22:58:48', '::1'),
(20, 'Request Message', 14, 'supports_msgs.php?req_m=Request', 1, 'md-account-circle', 0, 17, 0, 'Admin', '2022-03-19', '192.168.1.108', '', '', ''),
(21, 'Responsed Messages', 14, 'supports_msgs.php?req_m=Response', 1, 'md-account-circle', 0, 18, 0, 'Pavithra', '2022-3-19', '192.168.1.108', '', '', ''),
(23, 'Ticket System', 0, '', 0, '', 0, 9, 0, 'pavi', '2022-03-29 10:38:24', '192.168.1.108', '', '', ''),
(24, 'Assign Ticket', 23, 'assign_ticket.php', 1, '', 0, 21, 0, 'pavi', '2022-03-29 10:57:34', '192.168.1.108', 'pavi', '2022-03-29 10:58:25', '192.168.1.108'),
(25, 'Employee List', 5, 'list_emp.php', 1, '', 0, 5, 0, 'pavi', '2022-03-29 11:04:25', '192.168.1.108', '', '', ''),
(26, 'Requested Services', 11, 'requested_services.php', 1, 'md-account-circle', 0, 6, 0, 'Pavi', '02-04-2022', '', '', '', ''),
(27, 'Announcement', 5, 'announcement.php', 1, '', 0, 3, 0, 'pavi', '2022-05-19 11:32:24', '::1', '', '', ''),
(28, 'New Pack', 7, 'add_m_pack.php', 1, '', 0, 10, 0, 'pavi', '2022-05-20 10:47:20', '::1', '', '', ''),
(29, 'Add Service Deliverables', 7, 'add_m_deliverables.php', 1, '', 0, 9, 0, 'pavi', '2022-05-20 23:08:33', '::1', '', '', ''),
(38, 'New Service Features', 7, 'add_m_features.php', 1, '', 0, 8, 0, 'pavi', '2022-05-20 23:13:05', '::1', '', '', ''),
(39, 'New Team', 7, 'add_m_team.php', 1, '', 0, 0, 0, 'pavi', '2022-05-20 23:51:05', '::1', '', '', ''),
(40, 'ddd', 0, 'a.php', 0, '', 0, 2, 0, 'pavi', '2022-05-28 13:23:49', '127.0.0.1', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ecode` text NOT NULL,
  `fid` text NOT NULL,
  `name` text NOT NULL,
  `designation` text NOT NULL,
  `dob` text NOT NULL,
  `gender` text NOT NULL,
  `bg` text NOT NULL,
  `fhname` text NOT NULL,
  `cemail` text NOT NULL,
  `pemail` text NOT NULL,
  `mobile1` text NOT NULL,
  `mobile2` text NOT NULL,
  `pincode` text NOT NULL,
  `city` text NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `qual` text NOT NULL,
  `inst` text NOT NULL,
  `kyc_doc_1` text NOT NULL,
  `kyc_doc_2` text NOT NULL,
  `kyc_doc_3` text NOT NULL,
  `kyc_doc_4` text NOT NULL,
  `foldername` text NOT NULL,
  `dg_sign_1` text NOT NULL,
  `dg_sign_2` text NOT NULL,
  `dg_sign_3` text NOT NULL,
  `dg_sign_4` text NOT NULL,
  `up_img_sign_1` text NOT NULL,
  `up_img_sign_2` text NOT NULL,
  `up_img_sign_3` text NOT NULL,
  `up_img_sign_4` text NOT NULL,
  `cdate` datetime NOT NULL,
  `team` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `ugroup` int(11) NOT NULL,
  `cip` text NOT NULL,
  `mdate` datetime NOT NULL,
  `mip` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `old_password` text NOT NULL,
  `is_active` int(11) NOT NULL,
  `cby` text NOT NULL,
  `mby` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ecode`, `fid`, `name`, `designation`, `dob`, `gender`, `bg`, `fhname`, `cemail`, `pemail`, `mobile1`, `mobile2`, `pincode`, `city`, `address1`, `address2`, `qual`, `inst`, `kyc_doc_1`, `kyc_doc_2`, `kyc_doc_3`, `kyc_doc_4`, `foldername`, `dg_sign_1`, `dg_sign_2`, `dg_sign_3`, `dg_sign_4`, `up_img_sign_1`, `up_img_sign_2`, `up_img_sign_3`, `up_img_sign_4`, `cdate`, `team`, `role`, `ugroup`, `cip`, `mdate`, `mip`, `username`, `password`, `old_password`, `is_active`, `cby`, `mby`) VALUES
(1, '1001', '', 'pavi', 'web', '13, Mar 2022', 'female', 'AB+', 'der', 'a@gmail.com', 'b@gmail.com', '7878787878', '8787878787', '', '', 'yuttyytuytyu', 'tuytytuytu', '', 'gallery/client_profile/admin_img.jpg', '', '', '', '', 'assets/profiles', '', '', '', '', '', '', '', '', '2022-03-08 15:47:29', 'content developer', 'tl,member,supporter', 1, '192.168.1.108', '0000-00-00 00:00:00', '', 'admin', 'admin', '', 0, '', ''),
(2, '1002', '', 'pavi_client', 'web', '09, Mar 2022', 'male', 'B+', 'R', 'c@gmail.com', 'cc@gmail.com', '8778787878', '8778787878', '-', '-', 'D/O 13 Erode', 'reterte', '', '', '', '', '', '', 'assets/profiles', 'gallery/client_kyc_files/doc_1/signature_1/userid_2_dg_sign_1-62928be4598a1.png', '', '', '', 'gallery/client_kyc_files/doc_1/signature_1/userid_2_sign1-53792-git_wrk_flow.jpg', '0', '0', '0', '2022-03-09 15:39:42', 'web designing', 'member', 2, '192.168.1.108', '2022-05-29 02:23:56', '::1', 'client', 'client', '', 0, '', 'pavi_client'),
(4, '1004', '', 'pavi', '', '01, Jan 2000', 'female', '', '', '', 'c@gmail.com', '7454545454', '', '', '', 'Namakkal', 'Namakkal', '', 'gallery/client_profile/pikachu.jpg', '', '', '', '', 'assets/profiles', '', '', '', '', '', '', '', '', '2022-03-24 14:29:18', '', 'client', 2, '192.168.1.108', '0000-00-00 00:00:00', '', 'client1', 'client1', '', 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_report`
--
ALTER TABLE `access_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_bot`
--
ALTER TABLE `chat_bot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`dist_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_details`
--
ALTER TABLE `pay_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `subscribers_details`
--
ALTER TABLE `subscribers_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tba_announcement`
--
ALTER TABLE `tba_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tba_announcement_status`
--
ALTER TABLE `tba_announcement_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tba_deliverables`
--
ALTER TABLE `tba_deliverables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tba_features`
--
ALTER TABLE `tba_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tba_pack_details`
--
ALTER TABLE `tba_pack_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tba_services`
--
ALTER TABLE `tba_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tba_service_category`
--
ALTER TABLE `tba_service_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tba_service_type`
--
ALTER TABLE `tba_service_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usergroup`
--
ALTER TABLE `usergroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usermodules`
--
ALTER TABLE `usermodules`
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
-- AUTO_INCREMENT for table `access_report`
--
ALTER TABLE `access_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `chat_bot`
--
ALTER TABLE `chat_bot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `dist_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_details`
--
ALTER TABLE `pay_details`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers_details`
--
ALTER TABLE `subscribers_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tba_announcement`
--
ALTER TABLE `tba_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tba_announcement_status`
--
ALTER TABLE `tba_announcement_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tba_deliverables`
--
ALTER TABLE `tba_deliverables`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tba_features`
--
ALTER TABLE `tba_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tba_pack_details`
--
ALTER TABLE `tba_pack_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tba_services`
--
ALTER TABLE `tba_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tba_service_category`
--
ALTER TABLE `tba_service_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tba_service_type`
--
ALTER TABLE `tba_service_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usergroup`
--
ALTER TABLE `usergroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usermodules`
--
ALTER TABLE `usermodules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
