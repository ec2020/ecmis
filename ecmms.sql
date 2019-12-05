-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 05, 2019 at 05:25 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecmms`
--

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

DROP TABLE IF EXISTS `complain`;
CREATE TABLE IF NOT EXISTS `complain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_title` varchar(250) NOT NULL,
  `emp_description` text NOT NULL,
  `emp_location` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_tbl`
--

DROP TABLE IF EXISTS `employee_tbl`;
CREATE TABLE IF NOT EXISTS `employee_tbl` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(150) NOT NULL,
  `emp_designation` varchar(100) NOT NULL,
  `emp_dept` varchar(50) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_pw` varchar(255) NOT NULL,
  `emp_user_type` varchar(50) NOT NULL,
  `emp_entered_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `emp_entered_user` int(11) NOT NULL,
  PRIMARY KEY (`emp_id`),
  UNIQUE KEY `emp_user_email` (`user_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_tbl`
--

INSERT INTO `employee_tbl` (`emp_id`, `emp_name`, `emp_designation`, `emp_dept`, `user_name`, `user_pw`, `emp_user_type`, `emp_entered_date`, `emp_entered_user`) VALUES
(25000, 'ADMIN. Silva', 'Administrator', 'ADMIN', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'ADMIN', '2019-06-20 04:14:34', 2500),
(2, 'CG. Silva', 'Commissioner General', 'EC', '2', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'CG', '2019-06-26 09:24:55', 25000),
(3, 'CC. Silva', 'Cheif Clark', 'IT', '3', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'CC', '2019-06-26 09:40:10', 25000),
(4, 'HD. Silva', 'Head of Department', 'IT', '4', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'HD', '2019-06-26 09:42:33', 25000),
(5, 'HM. Silva', 'Head of Maintenance', 'Admin', '5', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'HM', '2019-06-26 09:47:05', 25000),
(6, 'TO. Silva', 'Technical Officer', 'Admin', '6', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'TO', '2019-06-26 09:50:29', 25000),
(7, 'Staff Officer', 'SF', 'IT', '7', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'SF', '2019-12-04 09:58:50', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `log_tbl`
--

DROP TABLE IF EXISTS `log_tbl`;
CREATE TABLE IF NOT EXISTS `log_tbl` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_detail` text NOT NULL,
  `log_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2321 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_tbl`
--

INSERT INTO `log_tbl` (`log_id`, `log_detail`, `log_timestamp`) VALUES
(2253, 'Login-id-2 ', '2019-12-03 06:05:57'),
(2254, 'Login-id-25000 ', '2019-12-03 06:09:17'),
(2255, 'logout-id-25000', '2019-12-03 06:44:49'),
(2256, 'Login-id-2 ', '2019-12-03 06:44:56'),
(2257, 'logout-id-2', '2019-12-03 06:45:14'),
(2258, 'Login-id-3 ', '2019-12-03 06:45:22'),
(2259, 'logout-id-3', '2019-12-03 06:45:27'),
(2260, 'Login-id-4 ', '2019-12-03 06:45:33'),
(2261, 'Login-id-25000 ', '2019-12-03 12:21:16'),
(2262, 'logout-id-25000', '2019-12-03 12:21:25'),
(2263, 'Login-id-2 ', '2019-12-03 12:21:39'),
(2264, 'Login-id-2 ', '2019-12-03 12:32:38'),
(2265, 'Login-id-2 ', '2019-12-03 12:33:02'),
(2266, 'Login-id-2 ', '2019-12-03 12:33:05'),
(2267, 'Login-id-2 ', '2019-12-03 12:33:32'),
(2268, 'Login-id-2 ', '2019-12-03 12:33:36'),
(2269, 'logout-id-2', '2019-12-03 12:33:55'),
(2270, 'Login-id-25000 ', '2019-12-03 12:34:03'),
(2271, 'Login-id-25000 ', '2019-12-03 12:34:32'),
(2272, 'Login-id-25000 ', '2019-12-03 12:34:57'),
(2273, 'Login-id-25000 ', '2019-12-03 12:47:54'),
(2274, 'Login-id-25000 ', '2019-12-03 12:48:09'),
(2275, 'logout-id-25000', '2019-12-03 12:57:28'),
(2276, 'Login-id-3 ', '2019-12-03 12:57:36'),
(2277, 'Login-id-25000 ', '2019-12-04 04:37:21'),
(2278, 'logout-id-25000', '2019-12-04 04:37:30'),
(2279, 'Login-id-2 ', '2019-12-04 04:37:39'),
(2280, 'logout-id-2', '2019-12-04 04:38:05'),
(2281, 'Login-id-2 ', '2019-12-04 04:45:32'),
(2282, 'logout-id-2', '2019-12-04 04:45:46'),
(2283, 'Login-id-3 ', '2019-12-04 04:46:11'),
(2284, 'logout-id-3', '2019-12-04 04:46:18'),
(2285, 'Login-id-4 ', '2019-12-04 04:46:27'),
(2286, 'logout-id-4', '2019-12-04 04:46:44'),
(2287, 'Login-id-5 ', '2019-12-04 04:46:55'),
(2288, 'logout-id-5', '2019-12-04 04:47:19'),
(2289, 'Login-id-6 ', '2019-12-04 04:47:26'),
(2290, 'logout-id-6', '2019-12-04 04:56:44'),
(2291, 'Login-id-3 ', '2019-12-04 04:56:55'),
(2292, 'logout-id-3', '2019-12-04 06:14:02'),
(2293, 'Login-id-2 ', '2019-12-04 06:14:08'),
(2294, 'logout-id-2', '2019-12-04 06:14:17'),
(2295, 'Login-id-3 ', '2019-12-04 06:14:23'),
(2296, 'logout-id-3', '2019-12-04 06:14:34'),
(2297, 'Login-id-4 ', '2019-12-04 06:14:42'),
(2298, 'Login-id-4 ', '2019-12-04 06:14:59'),
(2299, 'Login-id-4 ', '2019-12-04 06:16:48'),
(2300, 'logout-id-4', '2019-12-04 06:19:47'),
(2301, 'Login-id-25000 ', '2019-12-04 06:20:04'),
(2302, 'logout-id-25000', '2019-12-04 06:26:26'),
(2303, 'Login-id-3 ', '2019-12-04 06:26:39'),
(2304, 'logout-id-3', '2019-12-04 08:00:24'),
(2305, 'Login-id-4 ', '2019-12-04 08:00:33'),
(2306, 'logout-id-4', '2019-12-04 09:54:39'),
(2307, 'Login-id-7 ', '2019-12-04 09:59:11'),
(2308, 'Login-id-7 ', '2019-12-04 10:00:46'),
(2309, 'Login-id-7 ', '2019-12-04 10:02:03'),
(2310, 'logout-id-7', '2019-12-04 11:45:46'),
(2311, 'Login-id-25000 ', '2019-12-04 11:45:55'),
(2312, 'logout-id-25000', '2019-12-04 11:46:24'),
(2313, 'Login-id-7 ', '2019-12-04 11:46:32'),
(2314, 'logout-id-7', '2019-12-04 12:06:08'),
(2315, 'Login-id-25000 ', '2019-12-04 12:06:17'),
(2316, 'Login-id-3 ', '2019-12-05 04:32:38'),
(2317, 'logout-id-3', '2019-12-05 04:33:10'),
(2318, 'Login-id-5 ', '2019-12-05 04:34:06'),
(2319, 'Login-id-5 ', '2019-12-05 04:54:00'),
(2320, 'Login-id-5 ', '2019-12-05 04:57:16');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
