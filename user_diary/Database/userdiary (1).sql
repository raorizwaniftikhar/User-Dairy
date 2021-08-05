-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2015 at 01:59 PM
-- Server version: 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userdiary`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(25) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `admin_name`, `password`, `email`) VALUES
(1, 'Admin 1', 'admin', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(25) NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `name`, `message`) VALUES
(1, 'sheikh', ''),
(2, 'sheikh', 'do work'),
(3, 'sheikh', 'work plzzz'),
(4, 'sheikh', 'ok'),
(5, 'sheikh', 'asd'),
(6, 'sheikh', 'Thank'),
(7, 'sheikh', 'let me'),
(8, 'sheikh', 'hmm'),
(9, 'sheikh', 'firefox'),
(10, 'sheikh', 'hey yaa'),
(11, 'sheikh', 'ok'),
(12, 'sheikh', 'clear'),
(13, 'sheikh', 'erase'),
(14, 'sheikh', 'seeya'),
(15, 'sheikh', 'it worked'),
(16, 'sheikh', 'pls work'),
(17, 'sheikh', 'ughhh'),
(18, '', 'yessssssss :)'),
(19, 'sheikh', 'lets see'),
(20, 'sheikh', 'ok then'),
(21, 'sheikh', 'try'),
(22, 'sheikh', 'wahhh'),
(23, 'sheikh', 'again try'),
(24, 'sheikh', 'ahaaaannn'),
(25, 'sheikh', 'welcome back'),
(26, 'sheikh', 'try'),
(27, 'sheikh', 'please'),
(28, 'sheikh', 'blah blah'),
(29, 'sheikh', 'order'),
(30, 'sheikh', 'ok now its good..'),
(31, 'sheikh', 'hello again..'),
(32, 'shakeel mureed', 'hello'),
(33, 'jawad', '???');

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE IF NOT EXISTS `fields` (
  `field_id` int(25) NOT NULL,
  `user_id` int(25) NOT NULL,
  `workspace_id` int(25) NOT NULL,
  `field_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`field_id`, `user_id`, `workspace_id`, `field_name`) VALUES
(66, 22, 26, 'Wall'),
(67, 22, 26, 'Wrist'),
(68, 22, 27, 'Coke'),
(69, 22, 27, 'Pepsi');

-- --------------------------------------------------------

--
-- Table structure for table `fields_data`
--

CREATE TABLE IF NOT EXISTS `fields_data` (
  `field_data_id` int(25) NOT NULL,
  `field_id` int(25) NOT NULL,
  `post_id` int(25) NOT NULL,
  `field_data` varchar(255) NOT NULL,
  `user_id` int(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fields_data`
--

INSERT INTO `fields_data` (`field_data_id`, `field_id`, `post_id`, `field_data`, `user_id`) VALUES
(1, 66, 1, 'Rs 100,000', 22),
(2, 67, 1, 'Rs 4,000', 22);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `user_id` int(25) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `cell_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `user_name`, `cell_no`, `email`, `password`) VALUES
(22, 'sheikh', '03078800401', 'sheikh@mail.com', 'asd'),
(24, 'jawad', '0308654237', 'jawad@jawad.com', '123'),
(25, 'junni', '12365890', 'junni@junni.com', 'zxc');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(25) NOT NULL,
  `user_id` int(25) NOT NULL,
  `workspace_id` int(25) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `workspace_id`, `title`) VALUES
(1, 22, 26, 'Prices');

-- --------------------------------------------------------

--
-- Table structure for table `suspend`
--

CREATE TABLE IF NOT EXISTS `suspend` (
  `suspend_id` int(25) NOT NULL,
  `user_id` int(25) NOT NULL,
  `username` varchar(255) NOT NULL,
  `suspended_date` varchar(255) NOT NULL,
  `expiration_date` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suspend`
--

INSERT INTO `suspend` (`suspend_id`, `user_id`, `username`, `suspended_date`, `expiration_date`) VALUES
(2, 25, 'junni', 'Monday24th,August,2015', ''),
(3, 25, 'junni', '', '31-08-2015'),
(4, 25, 'junni', '24-08-2015<br>', '31-08-2015');

-- --------------------------------------------------------

--
-- Table structure for table `workspace_name`
--

CREATE TABLE IF NOT EXISTS `workspace_name` (
  `workspace_id` int(25) NOT NULL,
  `workspace_name` varchar(255) NOT NULL,
  `user_id` int(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workspace_name`
--

INSERT INTO `workspace_name` (`workspace_id`, `workspace_name`, `user_id`) VALUES
(26, 'Clock', 22),
(27, 'Drinks', 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`field_id`);

--
-- Indexes for table `fields_data`
--
ALTER TABLE `fields_data`
  ADD PRIMARY KEY (`field_data_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `suspend`
--
ALTER TABLE `suspend`
  ADD PRIMARY KEY (`suspend_id`);

--
-- Indexes for table `workspace_name`
--
ALTER TABLE `workspace_name`
  ADD PRIMARY KEY (`workspace_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `field_id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `fields_data`
--
ALTER TABLE `fields_data`
  MODIFY `field_data_id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `suspend`
--
ALTER TABLE `suspend`
  MODIFY `suspend_id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `workspace_name`
--
ALTER TABLE `workspace_name`
  MODIFY `workspace_id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
