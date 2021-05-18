-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2021 at 05:43 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `make_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_by` int(11) DEFAULT 0,
  `created_on` timestamp NULL DEFAULT current_timestamp(),
  `modified_by` int(11) DEFAULT 0,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `make_id`, `status`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 1, 2, 1, 1, '2021-05-17 21:13:52', 0, NULL),
(3, 2, 1, 0, 2, '2021-05-17 21:35:48', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `make`
--

CREATE TABLE `make` (
  `make_id` int(11) NOT NULL,
  `make_name` varchar(150) NOT NULL,
  `model_id` int(11) NOT NULL,
  `processor_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_by` int(11) DEFAULT 0,
  `cretaed_on` timestamp NULL DEFAULT current_timestamp(),
  `modified_by` int(11) DEFAULT 0,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `make`
--

INSERT INTO `make` (`make_id`, `make_name`, `model_id`, `processor_id`, `status`, `created_by`, `cretaed_on`, `modified_by`, `modified_on`) VALUES
(1, 'ss', 1, 1, 1, 1, '2021-05-17 19:45:52', 0, NULL),
(2, 'ssaaaa', 1, 3, 1, 1, '2021-05-17 19:46:04', 1, '2021-05-17 23:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `model_id` int(11) NOT NULL,
  `model_name` varchar(150) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT 0,
  `created_on` timestamp NULL DEFAULT current_timestamp(),
  `modified_by` int(11) DEFAULT 0,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`model_id`, `model_name`, `status`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 'Test', 1, 1, '2021-05-17 19:08:38', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `processor`
--

CREATE TABLE `processor` (
  `processor_id` int(11) NOT NULL,
  `processor_name` varchar(150) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_on` timestamp NULL DEFAULT current_timestamp(),
  `modified_by` int(11) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `processor`
--

INSERT INTO `processor` (`processor_id`, `processor_name`, `status`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 'test', 1, 1, '2021-05-17 18:24:16', NULL, NULL),
(3, 'RRs', 0, 1, '2021-05-17 18:58:35', 1, '2021-05-17 21:05:14');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` int(11) DEFAULT 0,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `status`, `created_by`, `created_on`) VALUES
(1, 'Admin', 1, 0, '2021-05-17 15:23:59'),
(2, 'User', 1, 0, '2021-05-17 15:23:59');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `last_login_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT 0,
  `created_on` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT 0,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `role_id`, `user_name`, `password`, `last_login_time`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 'Narasimha', 'Admin', 1, 'narasimhameesala@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2021-05-17 15:07:07', 0, NULL, 0, NULL),
(2, 'User', 'User', 2, 'narasimhameesala7799@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2021-05-17 17:52:33', 0, NULL, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `make`
--
ALTER TABLE `make`
  ADD PRIMARY KEY (`make_id`),
  ADD KEY `fk_model` (`model_id`),
  ADD KEY `fk_processor` (`processor_id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`model_id`);

--
-- Indexes for table `processor`
--
ALTER TABLE `processor`
  ADD PRIMARY KEY (`processor_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `make`
--
ALTER TABLE `make`
  MODIFY `make_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `processor`
--
ALTER TABLE `processor`
  MODIFY `processor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `make`
--
ALTER TABLE `make`
  ADD CONSTRAINT `fk_model` FOREIGN KEY (`model_id`) REFERENCES `model` (`model_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_processor` FOREIGN KEY (`processor_id`) REFERENCES `processor` (`processor_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
