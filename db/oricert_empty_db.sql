-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2019 at 06:38 PM
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
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_o`
--
ALTER TABLE `user_o`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_u`
--
ALTER TABLE `user_u`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
