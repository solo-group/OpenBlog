-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2019 at 10:23 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `openblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `cat_id` int(11) NOT NULL,
  `cat_po` int(11) NOT NULL DEFAULT '0',
  `cat_name` varchar(200) NOT NULL,
  `cat_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cat_who` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `com_for` varchar(250) NOT NULL,
  `com_who` varchar(150) NOT NULL,
  `com_content` varchar(300) NOT NULL,
  `com_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(250) NOT NULL,
  `post_slug` varchar(250) NOT NULL,
  `post_author` varchar(200) NOT NULL,
  `post_content` text NOT NULL,
  `post_thumb` varchar(300) NOT NULL,
  `post_cat` varchar(100) NOT NULL,
  `post_tags` varchar(350) NOT NULL,
  `post_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_comment` int(11) NOT NULL DEFAULT '0',
  `post_view` int(11) NOT NULL DEFAULT '0',
  `post_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sitedetails`
--

CREATE TABLE `sitedetails` (
  `d_id` int(1) NOT NULL,
  `site_name` varchar(100) NOT NULL,
  `site_tagline` varchar(150) NOT NULL,
  `site_des` varchar(250) NOT NULL,
  `site_logo` varchar(250) DEFAULT NULL,
  `site_favicon` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sitedetails`
--

INSERT INTO `sitedetails` (`d_id`, `site_name`, `site_tagline`, `site_des`, `site_logo`, `site_favicon`) VALUES
(1, 'OpenBlog', 'An Open Source Blog Application', 'Welcome to my OpenBlog .It is an open source blog application .', NULL, 'favicon.ico');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `link_id` int(11) NOT NULL,
  `link_name` varchar(150) NOT NULL,
  `url` varchar(250) NOT NULL,
  `link_icon` varchar(250) NOT NULL,
  `link_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `userName` varchar(150) NOT NULL,
  `userImg` varchar(250) NOT NULL DEFAULT 'noAvatar.jpg',
  `fullName` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `passWord` varchar(100) NOT NULL,
  `userPosition` varchar(50) NOT NULL,
  `resOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `birthDate` varchar(150) DEFAULT NULL,
  `gender` varchar(50) DEFAULT 'unset',
  `lastSeen` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `act_id` int(11) NOT NULL,
  `acc_for` varchar(100) NOT NULL,
  `acc_message` varchar(250) NOT NULL,
  `acc_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `acc_viewed` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `v_id` int(11) NOT NULL,
  `date` varchar(250) NOT NULL,
  `unique_visit` int(11) NOT NULL DEFAULT '0',
  `page_view` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `sitedetails`
--
ALTER TABLE `sitedetails`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`link_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`act_id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sitedetails`
--
ALTER TABLE `sitedetails`
  MODIFY `d_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
