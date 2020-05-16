-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2019 at 10:50 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oricert`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(500) NOT NULL,
  `c_programme` varchar(500) NOT NULL,
  `c_institution` varchar(500) NOT NULL,
  `c_serial_no` varchar(500) NOT NULL,
  `c_reg_no` varchar(500) NOT NULL,
  `c_class` varchar(500) NOT NULL,
  `c_gender` varchar(255) NOT NULL,
  `c_grad_year` varchar(255) NOT NULL,
  `c_image_name` varchar(500) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`c_id`, `c_name`, `c_programme`, `c_institution`, `c_serial_no`, `c_reg_no`, `c_class`, `c_gender`, `c_grad_year`, `c_image_name`, `date_added`) VALUES
(1, 'John Doe', 'Msc Masters', '1', '5555545', '353453', 'First class', 'Male', '2010', 'john_doe_msc_masters_certificate_5555545.jpg', '2019-04-18 20:41:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_o`
--

CREATE TABLE `user_o` (
  `o_id` int(11) NOT NULL,
  `o_name` varchar(255) NOT NULL,
  `o_email` varchar(255) NOT NULL,
  `o_password` varchar(255) NOT NULL,
  `o_website` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_o`
--

INSERT INTO `user_o` (`o_id`, `o_name`, `o_email`, `o_password`, `o_website`, `date_added`) VALUES
(1, 'Eniola Osabiya', 'eosabiya@gmail.com', '9f1814ab87687a05806d8d69f3769de6', 'https://eniolaosabiya.com', '2019-04-18 18:13:58'),
(2, 'Kunle Alimi', 'kunleali@gmail.com', '9f1814ab87687a05806d8d69f3769de6', '', '2019-04-18 18:15:03'),
(3, 'Alimi Ademo', 'alimi@gmail.com', '9f1814ab87687a05806d8d69f3769de6', 'https://eniolaosabiya.com', '2019-04-18 20:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `user_u`
--

CREATE TABLE `user_u` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(500) NOT NULL,
  `u_type` varchar(255) NOT NULL,
  `u_status` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_website` varchar(255) NOT NULL,
  `u_est_date` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_u`
--

INSERT INTO `user_u` (`u_id`, `u_name`, `u_type`, `u_status`, `u_email`, `u_password`, `u_website`, `u_est_date`, `date_added`) VALUES
(1, 'Federal College of Education', 'College Of Eduction', 'Federal', 'fcetakoka@yahoo.com', '9f1814ab87687a05806d8d69f3769de6', 'https://www.fcetakoka.org', '1967', '2019-04-18 17:14:57'),
(2, 'Havard Wilson College of Education', 'College Of Eduction', 'Private', 'provost@havardwilsoncollege.com', '9f1814ab87687a05806d8d69f3769de6', 'http://havardwilsoncollege.com', '1993', '2019-04-18 17:16:56'),
(3, 'Air Force Institute of Technology', 'Polytechnic', 'Federal', 'registrar@afit.edu.ng', '9f1814ab87687a05806d8d69f3769de6', 'http://www.afit.edu.ng', '1976', '2019-04-18 17:18:42'),
(4, 'Bolmor Polytechnic', 'Polytechnic', 'Private', 'bolmorpolytechnic@yahoo.com', '9f1814ab87687a05806d8d69f3769de6', 'http://www.bpi.edu.nd', '1993', '2019-04-18 17:20:08'),
(5, 'Crescent University', 'Polytechnic', 'Private', 'info@crescent-university.edu.ng', '9f1814ab87687a05806d8d69f3769de6', 'http://www.crescent-university.edu.ng', '1982', '2019-04-18 17:21:32'),
(6, 'Caleb University', 'University', 'Private', 'info@calebuniversity.edu.ng', '9f1814ab87687a05806d8d69f3769de6', 'http://calebuniversity.edu.ng', '1984', '2019-04-18 17:23:09'),
(7, 'Babcock University', 'University', 'Private', 'babcock@infoweb.abs.net', '9f1814ab87687a05806d8d69f3769de6', 'http://infoweb.abs.net', '1969', '2019-04-18 17:25:03'),
(8, 'Bowen University', 'University', 'Private', 'info@bowenuniversityeduc.org', '9f1814ab87687a05806d8d69f3769de6', 'http://www.bowenuniversity_edu.org', '1987', '2019-04-18 17:26:44'),
(9, 'Covenant University', 'University', 'Private', 'registrar@covenantuniversity.org', '9f1814ab87687a05806d8d69f3769de6', 'http://covenantuniversity.org', '1982', '2019-04-18 17:27:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `user_o`
--
ALTER TABLE `user_o`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `user_u`
--
ALTER TABLE `user_u`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_o`
--
ALTER TABLE `user_o`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_u`
--
ALTER TABLE `user_u`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
