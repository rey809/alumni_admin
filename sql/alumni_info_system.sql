-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2016 at 04:56 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alumni_info_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE IF NOT EXISTS `activities` (
  `activities_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `details` text NOT NULL,
  `date` varchar(30) NOT NULL,
  `time` varchar(30) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE IF NOT EXISTS `alumni` (
  `alumni_id` int(11) NOT NULL,
  `id_no_one` varchar(30) NOT NULL,
  `id_no_two` varchar(30) NOT NULL,
  `id_no_three` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `suffix` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `bday` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `scholar` varchar(30) NOT NULL,
  `company` varchar(50) NOT NULL,
  `work_position` varchar(50) NOT NULL,
  `date_hired` varchar(30) NOT NULL,
  `rank` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`alumni_id`, `id_no_one`, `id_no_two`, `id_no_three`, `username`, `password`, `fname`, `mname`, `lname`, `suffix`, `course`, `bday`, `gender`, `email`, `contact_number`, `address`, `scholar`, `company`, `work_position`, `date_hired`, `rank`) VALUES
(1, 'AC12', '3456', '7890', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'AC13', '1234', '5678', 'rrr', '4124bc0a9335c27f086f24ba207a4912', 'adasd', 'adasd', 'asdasd', 'glyphicon-list-alt', 'glyphicon-list-alt', '2016-12-06', 'Male', 'rey.onekrsadas@gmail.com', '123123', 'asdasdasd', 'glyphicon-list-alt', 'asdasd', 'adasd', '2016-12-29', 'Member'),
(3, 'AC16', '1234', '5678', 'reybb', '4124bc0a9335c27f086f24ba207a4912', 'ff', 'ff', 'ff', 'glyphicon-list-alt', 'glyphicon-list-alt', '2016-12-12', 'Male', 'rey.obejerorr@gmail.com', '123123', 'sadsadasd', 'glyphicon-list-alt', 'dsadasdasd', 'asdasdasd', '2016-12-14', 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `alumni_batch`
--

CREATE TABLE IF NOT EXISTS `alumni_batch` (
  `alumni_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni_batch`
--

INSERT INTO `alumni_batch` (`alumni_id`, `batch_id`) VALUES
(2, 1),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `alumni_directory`
--

CREATE TABLE IF NOT EXISTS `alumni_directory` (
  `alumni_id` int(11) NOT NULL,
  `directory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni_directory`
--

INSERT INTO `alumni_directory` (`alumni_id`, `directory_id`) VALUES
(2, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE IF NOT EXISTS `announcement` (
  `announcement_id` int(11) NOT NULL,
  `personnel_id` int(11) NOT NULL,
  `alumni_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `details` text NOT NULL,
  `date` varchar(30) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE IF NOT EXISTS `batch` (
  `batch_id` int(11) NOT NULL,
  `year` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `year`) VALUES
(1, '2000'),
(2, '1995'),
(3, '2004'),
(4, '2006'),
(5, '5000'),
(6, '7000'),
(7, '9999'),
(8, '3434'),
(9, '4567'),
(10, '4765');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL,
  `activities_id` int(11) NOT NULL,
  `announcement_id` int(11) NOT NULL,
  `personnel_id` int(11) NOT NULL,
  `alumni_id` int(11) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `directory`
--

CREATE TABLE IF NOT EXISTS `directory` (
  `directory_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `directory`
--

INSERT INTO `directory` (`directory_id`, `name`) VALUES
(1, 'CECS'),
(2, 'CBA');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `image_id` int(11) NOT NULL,
  `caption` text NOT NULL,
  `name` varchar(200) NOT NULL,
  `time` varchar(30) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `caption`, `name`, `time`, `date`) VALUES
(1, 'qweqwe', 'rey-962.jpg', '', '2016/12/26'),
(2, 'adasdgg', 'alumni-310.jpg', '12:41:50pm', '2016/12/26'),
(3, 'adasdgg', 'alumni-330.jpg', '12:41:50pm', '2016/12/26');

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE IF NOT EXISTS `personnel` (
  `personnel_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `contact_number` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`personnel_id`, `username`, `password`, `fname`, `mname`, `lname`, `email`, `address`, `contact_number`) VALUES
(1, 'admin', '12345', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`activities_id`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`alumni_id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `directory`
--
ALTER TABLE `directory`
  ADD PRIMARY KEY (`directory_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`personnel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `activities_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `alumni_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `directory`
--
ALTER TABLE `directory`
  MODIFY `directory_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `personnel_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
