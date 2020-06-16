-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2019 at 08:43 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_record`
--

CREATE TABLE `academic_record` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ayr` int(4) NOT NULL,
  `sem` int(1) NOT NULL,
  `cti` varchar(255) NOT NULL,
  `ccd` varchar(10) NOT NULL,
  `cre` int(2) NOT NULL,
  `atd` int(3) NOT NULL,
  `cie` int(2) NOT NULL,
  `see` int(3) NOT NULL,
  `sem_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic_record`
--

INSERT INTO `academic_record` (`id`, `email`, `ayr`, `sem`, `cti`, `ccd`, `cre`, `atd`, `cie`, `see`, `sem_id`) VALUES
(112, 'saifur.cs17@bmsce.ac.in', 2018, 4, 'Linear Algebra', '15CS12DCLA', 4, 90, 49, 97, 29),
(113, 'saifur.cs17@bmsce.ac.in', 2018, 4, 'Operating Systems', '15CS12DCOS', 6, 93, 41, 84, 29),
(114, 'priyanka.cs18@bmsce.ac.in', 2018, 2, 'COA', '15CS12DCOA', 4, 87, 47, 75, 30),
(121, 'saifur.cs17@bmsce.ac.in', 2018, 5, 'DS', '1', 3, 2, 4, 5, 31),
(122, 'saifur.cs17@bmsce.ac.in', 2018, 5, 'COA', '2', 5, 4, 6, 4, 31),
(123, 'saifur.cs17@bmsce.ac.in', 2018, 3, 'Fluid Mechanics', '15ME3DCFME', 6, 90, 50, 100, 28),
(124, 'saifur.cs17@bmsce.ac.in', 2018, 3, 'SOM', '15ME3DCSOM', 6, 90, 50, 98, 28),
(129, 'rohan.cs17@bmsce.ac.in', 2018, 2, 'COA', '15CS12DCDS', 7, 58, 67, 98, 33),
(130, 'rohan.cs17@bmsce.ac.in', 2018, 2, 'WP', '15CS12DCWE', 4, 87, 68, 75, 33),
(131, 'rohan.cs17@bmsce.ac.in', 2018, 2, 'NEW', '15CS12DCNE', 2, 97, 67, 74, 33),
(135, 'saifur.cs17@bmsce.ac.in', 8, 2015, '154', '4', 6, 4, 7, 9, 34),
(139, 'saifur.cs17@bmsce.ac.in', 2014, 7, '154', '4', 6, 4, 7, 9, 32),
(140, 'saifur.cs17@bmsce.ac.in', 2050, 9, 'MAths', '1542145241', 4, 85, 48, 98, 35),
(141, 'saifur.cs17@bmsce.ac.in', 2050, 9, 'coa', '2514s54584', 3, 87, 42, 87, 35);

-- --------------------------------------------------------

--
-- Table structure for table `profile_proctor`
--

CREATE TABLE `profile_proctor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desig` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `off_addr` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `dept` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_proctor`
--

INSERT INTO `profile_proctor` (`id`, `name`, `desig`, `email`, `off_addr`, `phone`, `dept`) VALUES
(16, 'Saritha A N', 'Assistant Professor', 'saritha.cse@bmsce.ac.in', 'S - 403, 4th Floor, New Building, BMSCE', 9980186153, 'cs'),
(17, 'Pallavi G B', 'Assistant Professor', 'pallavi.cse@bmsce.ac.in', 'S - 412,  4th Floor, New Building, BMSCE', 9845786541, 'cs');

-- --------------------------------------------------------

--
-- Table structure for table `profile_student`
--

CREATE TABLE `profile_student` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `blood` enum('ap','an','bp','bn','op','on','abp','abn') NOT NULL,
  `phone` int(10) NOT NULL,
  `father` varchar(255) NOT NULL,
  `foccup` varchar(255) NOT NULL,
  `faddr` varchar(255) NOT NULL,
  `fphone` int(10) NOT NULL,
  `mother` varchar(255) NOT NULL,
  `moccup` varchar(255) NOT NULL,
  `maddr` varchar(255) NOT NULL,
  `mphone` int(10) NOT NULL,
  `guardian` varchar(255) NOT NULL,
  `goccup` varchar(255) NOT NULL,
  `gaddr` varchar(255) NOT NULL,
  `gphone` int(10) NOT NULL,
  `usn` varchar(255) NOT NULL,
  `proctor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_student`
--

INSERT INTO `profile_student` (`id`, `email`, `name`, `dob`, `blood`, `phone`, `father`, `foccup`, `faddr`, `fphone`, `mother`, `moccup`, `maddr`, `mphone`, `guardian`, `goccup`, `gaddr`, `gphone`, `usn`, `proctor`) VALUES
(11, 'saifur.cs17@bmsce.ac.in', 'Saifur Rahman', '25/07/1998', 'bp', 2147483647, 'A Rahman', 'Central Government Employee', 'Bangalore', 2147483647, 'R Shahin', 'Housewife', 'Bangalore', 2147483647, '', '', '', 0, '1BM16CS048', 'saritha.cse@bmsce.ac.in'),
(12, 'rohan.cs17@bmsce.ac.in', 'Rohan Mayya', '03/04/1999', 'ap', 2147483647, 'JP Mayya', 'Doctor', 'Bangalore', 2147483647, 'Shuba Mayya', 'Housewife', 'Bangalore', 2147483647, '-', '-', '-', 0, '1BM17CS077', 'saritha.cse@bmsce.ac.in'),
(13, 'priyanka.cs18@bmsce.ac.in', '', '', 'ap', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', 'pallavi.cse@bmsce.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `sem_record`
--

CREATE TABLE `sem_record` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sem` int(1) NOT NULL,
  `ayr` int(4) NOT NULL,
  `sent` enum('y','n') NOT NULL,
  `signed` enum('n','y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sem_record`
--

INSERT INTO `sem_record` (`id`, `email`, `sem`, `ayr`, `sent`, `signed`) VALUES
(28, 'saifur.cs17@bmsce.ac.in', 3, 2018, 'n', 'y'),
(29, 'saifur.cs17@bmsce.ac.in', 4, 2018, 'y', 'y'),
(30, 'priyanka.cs18@bmsce.ac.in', 2, 2018, 'n', 'n'),
(31, 'saifur.cs17@bmsce.ac.in', 5, 2018, 'y', 'y'),
(32, 'saifur.cs17@bmsce.ac.in', 7, 2018, 'n', 'y'),
(33, 'rohan.cs17@bmsce.ac.in', 2, 2018, 'y', 'y'),
(34, 'saifur.cs17@bmsce.ac.in', 2015, 8, 'y', 'n'),
(35, 'saifur.cs17@bmsce.ac.in', 9, 2050, 'y', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` enum('student','proctor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`) VALUES
(66, 's@s.com', '03c7c0ace395d80182db07ae2c30f034', 'student'),
(67, 'p@p.com', '83878c91171338902e0fe0fb97a8c47a', 'student'),
(68, 'saritha.cse@bmsce.ac.in', '202cb962ac59075b964b07152d234b70', 'proctor'),
(69, 'saifur.cs17@bmsce.ac.in', '202cb962ac59075b964b07152d234b70', 'student'),
(70, 'rohan.cs17@bmsce.ac.in', '202cb962ac59075b964b07152d234b70', 'student'),
(71, 'pallavi.cse@bmsce.ac.in', '202cb962ac59075b964b07152d234b70', 'proctor'),
(72, 'priyanka.cs18@bmsce.ac.in', '202cb962ac59075b964b07152d234b70', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_record`
--
ALTER TABLE `academic_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_proctor`
--
ALTER TABLE `profile_proctor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `profile_student`
--
ALTER TABLE `profile_student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `sem_record`
--
ALTER TABLE `sem_record`
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
-- AUTO_INCREMENT for table `academic_record`
--
ALTER TABLE `academic_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `profile_proctor`
--
ALTER TABLE `profile_proctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `profile_student`
--
ALTER TABLE `profile_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sem_record`
--
ALTER TABLE `sem_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
