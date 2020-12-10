-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2018 at 09:56 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electricity_bill_managment_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `meter_no` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `used_unit` int(11) NOT NULL,
  `bill` int(11) NOT NULL,
  `last_date` varchar(20) NOT NULL,
  `bill_with_fine` int(11) NOT NULL,
  `due_date` varchar(20) NOT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`meter_no`, `month`, `used_unit`, `bill`, `last_date`, `bill_with_fine`, `due_date`, `status`) VALUES
('432534', 'january', 7, 0, '', 0, '', 'Online'),
('6767', 'janu', 786, 54, '2018-10-23', 897, '2018-10-17', 'Online'),
('6767', 'januj', 7, 56, '2018-10-09', 765, '2018-10-09', 'Online'),
('432534', 'uujg4byju', 867, 756, '', 0, '', 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `officer_info`
--

CREATE TABLE `officer_info` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officer_info`
--

INSERT INTO `officer_info` (`username`, `password`) VALUES
('amsa', '1234'),
('zabed', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `meter_type` varchar(20) NOT NULL,
  `meter_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`firstname`, `lastname`, `email`, `contact_no`, `meter_type`, `meter_no`) VALUES
('amsa', 'amin', 'fgtr43tg4gv4@gmail.com', '0023351', 'prepaid', '432534'),
('zabed', 'hjdssa', 'da', '675', 'postpaid', '6767');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
