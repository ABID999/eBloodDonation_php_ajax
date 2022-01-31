-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2019 at 04:12 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eblooddonation`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_requests`
--

CREATE TABLE `blood_requests` (
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `relation` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `bgroup` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `date` date NOT NULL,
  `hospital_name` varchar(255) NOT NULL,
  `hospital_adress` varchar(255) NOT NULL,
  `division` varchar(100) NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_requests`
--

INSERT INTO `blood_requests` (`user_name`, `user_email`, `patient_name`, `relation`, `description`, `bgroup`, `quantity`, `date`, `hospital_name`, `hospital_adress`, `division`, `id`) VALUES
('abid@gmail.com', 'abid', 'sakib', 'bro', 'lorem ipsum', 'A+', 1, '2012-12-12', 'dmc', 'chakharpool', 'dhaka', 1),
('abid@gmail.com', 'abid', 'sakib', 'bro', 'lorem ipsum', 'A+', 1, '2012-12-12', 'dmc', 'chakharpool', 'dhaka', 2),
('abid@gmail.com', 'abid', 'sakib', 'bro', 'lorem ipsum', 'A+', 1, '2012-12-12', 'dmc', 'chakharpool', 'dhaka', 3),
('', 'abidislam49@gmail.com', 'Md Nirob', 'Cousin', 'Dengue', 'AB+', 2, '2019-08-05', 'DMC', '', 'Dhaka', 4),
('Ajijul Hakim Abid', 'abidislam49@gmail.com', 'Md Nirob', 'Cousin', 'Dengue', 'AB+', 2, '2019-08-05', 'DMC', 'Chankharpool', 'Dhaka', 5),
('Ajijul Hakim Abid', 'abidislam49@gmail.com', 'Md Nirob', 'Cousin', 'Dengue', 'AB+', 2, '2019-08-05', 'DMC', 'Chankharpool', 'Dhaka', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `bgroup` varchar(55) NOT NULL,
  `division` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `total_donation` int(50) DEFAULT NULL,
  `ldod` date DEFAULT NULL,
  `picture` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`email`, `name`, `dob`, `bgroup`, `division`, `phone`, `password`, `total_donation`, `ldod`, `picture`) VALUES
('abidislam49@gmail.com', 'Ajijul Hakim Abid', '2019-08-16', 'A+', 'Dhaka', '01521431487', '1234', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_requests`
--
ALTER TABLE `blood_requests`
  ADD PRIMARY KEY (`id`,`user_email`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_requests`
--
ALTER TABLE `blood_requests`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
