-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2015 at 08:09 PM
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
  `email` varchar(255) NOT NULL,
  `admin_pic` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `admin_name`, `password`, `email`, `admin_pic`) VALUES
(8, 'Admin', 'asd', 'admin@yahoo.com', '11014756_1078440538840395_5693062974855461622_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(25) NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `name`, `message`) VALUES
(26, 'sheikh', 'try'),
(27, 'sheikh', 'please'),
(28, 'sheikh', 'blah blah'),
(29, 'sheikh', 'order'),
(30, 'sheikh', 'ok now its good..'),
(31, 'sheikh', 'hello again..'),
(32, 'shakeel mureed', 'hello'),
(33, 'jawad', '???'),
(34, 'junni', 'junni is here too'),
(35, '', 'workin..huh??'),
(36, 'sheikh', 'ok'),
(37, 'sheikh', 'hey ya'),
(38, 'sheikh', 'shukrr'),
(39, 'sheikh', '??'),
(40, 'sheikh', 'do me a favour'),
(41, 'sheikh', 'ok'),
(42, 'sheikh', 'no>>??'),
(43, 'sheikh', 'ahaaan'),
(44, 'sheikh', 'asd'),
(45, 'sheikh', 'asd'),
(46, 'sheikh', 'o0k then'),
(47, 'sheikh', '??'),
(48, 'sheikh', 'now??'),
(49, 'sheikh', 'no?'),
(50, 'sheikh', 'still no?'),
(51, 'sheikh', 'asd'),
(52, 'sheikh', '?'),
(53, 'sheikh', '??'),
(54, '', ''),
(55, 'sheikh', 'shukr'),
(56, 'sheikh', 'thats also fine btw'),
(57, 'sheikh', 'whats done is done'),
(58, 'sheikh', 'updated there to??'),
(59, '', 'this msg'),
(60, 'sheikh', 'hie jawad'),
(61, 'jawad', 'hi mashhood'),
(63, 'bruce', 'now?'),
(64, 'bruce', 'im your new user'),
(65, 'bruce', 'im the new boss here'),
(66, 'Admin 1', 'erwer??'),
(67, 'sheikh', 'hello'),
(68, 'sheikh', 'abc'),
(69, 'sheikh', 'working naa??'),
(70, 'Mashhood Ali', 'hello'),
(71, 'Admin', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `daily_diary`
--

CREATE TABLE IF NOT EXISTS `daily_diary` (
  `diary_id` int(25) NOT NULL,
  `user_id` int(25) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_diary`
--

INSERT INTO `daily_diary` (`diary_id`, `user_id`, `title`, `date`, `content`) VALUES
(1, 41, 'Diary Sheikh', '9th Oct,2015', 'THJis is my diary           ');

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE IF NOT EXISTS `fields` (
  `field_id` int(25) NOT NULL,
  `user_id` int(25) NOT NULL,
  `workspace_id` int(25) NOT NULL,
  `field_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`field_id`, `user_id`, `workspace_id`, `field_name`) VALUES
(5, 41, 3, 'one'),
(6, 41, 3, 'two'),
(7, 41, 3, 'three'),
(8, 41, 3, 'four'),
(9, 41, 3, 'five'),
(10, 41, 3, 'six'),
(11, 41, 3, 'seven'),
(12, 41, 3, 'eight'),
(13, 41, 3, 'nine'),
(14, 41, 4, 'Bugati'),
(15, 41, 4, 'Ferrari'),
(16, 41, 4, 'Paghani'),
(17, 41, 4, 'Ford'),
(18, 41, 4, 'Mercedez'),
(19, 41, 4, 'Toyota');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fields_data`
--

INSERT INTO `fields_data` (`field_data_id`, `field_id`, `post_id`, `field_data`, `user_id`) VALUES
(4, 6, 2, '222', 41),
(5, 7, 2, '3', 41),
(6, 8, 2, '4', 41),
(7, 9, 2, '5', 41),
(8, 10, 2, '6', 41),
(9, 11, 2, '7', 41),
(10, 12, 2, '8', 41),
(11, 13, 2, '9', 41),
(12, 14, 3, 'Expensive', 41),
(13, 15, 3, 'Ver', 41),
(14, 16, 3, 'model n0 8', 41),
(15, 17, 3, 'White', 41),
(16, 18, 3, 'Black', 41),
(17, 19, 3, 'Altis', 41);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `user_id` int(25) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `cell_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_pic` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `user_name`, `cell_no`, `email`, `user_pic`, `password`) VALUES
(41, 'Mashhood Ali', '09765431267', 'mashhood@gmail.com', '1377075_464430483671968_2030513885_n.jpg', 'sheikh'),
(42, 'New USer123', '09809898785', 'sheikh@gmail.coom', '11133811_712239165568868_2680157857054691228_n.jpg', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(25) NOT NULL,
  `user_id` int(25) NOT NULL,
  `workspace_id` int(25) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `workspace_id`, `title`) VALUES
(2, 41, 3, 'Post Nine'),
(3, 41, 4, 'Cars POst name');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `workspace_name`
--

CREATE TABLE IF NOT EXISTS `workspace_name` (
  `workspace_id` int(25) NOT NULL,
  `workspace_name` varchar(255) NOT NULL,
  `user_id` int(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workspace_name`
--

INSERT INTO `workspace_name` (`workspace_id`, `workspace_name`, `user_id`) VALUES
(3, 'Drinks', 41),
(4, 'Cars', 41);

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
-- Indexes for table `daily_diary`
--
ALTER TABLE `daily_diary`
  ADD PRIMARY KEY (`diary_id`);

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
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `daily_diary`
--
ALTER TABLE `daily_diary`
  MODIFY `diary_id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `field_id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `fields_data`
--
ALTER TABLE `fields_data`
  MODIFY `field_data_id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `suspend`
--
ALTER TABLE `suspend`
  MODIFY `suspend_id` int(25) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `workspace_name`
--
ALTER TABLE `workspace_name`
  MODIFY `workspace_id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
