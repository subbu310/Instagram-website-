
-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2020 at 10:08 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutorial_instagram`
--

-- --------------------------------------------------------

--
-- Table structure for table `multiple_post`
--

CREATE TABLE `multiple_post` (
  `post_id` int(11) NOT NULL,
  `user_id` varchar(150) NOT NULL,
  `post_url` varchar(250) NOT NULL,
  `desc` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `multiple_post`
--

INSERT INTO `multiple_post` (`post_id`, `user_id`, `post_url`, `desc`, `date`) VALUES
(1, '1', 'http://localhost/instagram_tutorials/posts/Chrysanthemum.jpg', 'nice..nature', '2020-06-29 05:58:08'),
(2, '1', 'http://localhost/instagram_tutorials/posts/Desert.jpg', 'nice..nature', '2020-06-29 05:58:08'),
(3, '1', 'http://localhost/instagram_tutorials/posts/Desert.jpg', 'nice looks..', '2020-06-30 03:23:34'),
(4, '1', 'http://localhost/instagram_tutorials/posts/Hydrangeas.jpg', 'nice looks..', '2020-06-30 03:23:34'),
(5, '1', 'http://localhost/instagram_tutorials/posts/Hydrangeas.jpg', 'nice nature to watch', '2020-06-30 03:29:29'),
(6, '1', 'http://localhost/instagram_tutorials/posts/Jellyfish.jpg', 'nice nature to watch', '2020-06-30 03:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` varchar(150) NOT NULL,
  `post_url` varchar(250) NOT NULL,
  `desc` varchar(250) NOT NULL,
  `type` varchar(150) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post_url`, `desc`, `type`, `date`) VALUES
(1, '1', '', 'nice..nature', 'multiple', '2020-06-29 05:58:08'),
(2, '1', 'http://localhost/instagram_tutorials/posts/Jellyfish.jpg', 'jelly fish..', 'single', '2020-06-29 05:59:20'),
(11, '1', 'http://localhost/instagram_tutorials/posts/Hydrangeas.jpg', 'supper looking..', 'single', '2020-06-30 03:22:23'),
(12, '1', '', 'nice looks..', 'multiple', '2020-06-30 03:23:34'),
(13, '1', '', 'nice nature to watch', 'multiple', '2020-06-30 03:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `user_image` varchar(250) NOT NULL,
  `website` varchar(150) NOT NULL,
  `bio` varchar(250) NOT NULL,
  `phonenumber` varchar(150) NOT NULL,
  `gender` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fullname`, `username`, `user_image`, `website`, `bio`, `phonenumber`, `gender`, `email`, `password`, `date`) VALUES
(1, 'virat', 'virat_virat', 'http://localhost/instagram_tutorials/profile_photo/69.jpg', 'www.cricket.com', 'am right hand batsman', '+919487589', 'male', 'virat@gmail.com', '12345', '2020-05-30 03:54:44'),
(2, 'dhoni', 'dhoni_dhoni', '', '', '', '0', '', 'dhoni@yahoo.com', '12345', '2020-05-30 03:57:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `multiple_post`
--
ALTER TABLE `multiple_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `multiple_post`
--
ALTER TABLE `multiple_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
