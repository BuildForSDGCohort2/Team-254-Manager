-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2020 at 03:54 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filemanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatroom`
--

CREATE TABLE `chatroom` (
  `id` int(100) NOT NULL,
  `forum_id` int(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `user` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `id` int(100) NOT NULL,
  `userid` int(100) NOT NULL,
  `main_path` varchar(100) NOT NULL,
  `downloaded` varchar(100) NOT NULL,
  `zipe_path` varchar(100) NOT NULL,
  `date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`id`, `userid`, `main_path`, `downloaded`, `zipe_path`, `date`) VALUES
(1, 1, 'directories/-162084625/RealBrand/', 'RealBrand', 'downloads/RealBrand_9792460.zip', '2020-08-02 20:23:17.000000'),
(2, 2, 'directories/509054397/try/', 'try', 'downloads/try_3183910.zip', '2020-08-04 15:25:23.000000'),
(3, 2, 'directories/509054397/try/', 'try', 'downloads/try_5555499.zip', '2020-08-04 15:26:34.000000'),
(4, 1, 'directories/-162084625/RealBrand/server/', 'server', 'downloads/server_9571700.zip', '2020-08-04 15:28:09.000000'),
(5, 2, 'directories/509054397/try/', 'try', 'downloads/try_6078616.zip', '2020-08-04 15:28:48.000000'),
(6, 2, 'directories/509054397/try/', 'try', 'downloads/try_3986411.zip', '2020-08-04 15:30:19.000000'),
(7, 2, 'directories/509054397/try/', 'try', 'downloads/try_1843504.zip', '2020-08-04 15:31:23.000000'),
(8, 2, 'directories/509054397/try/RealBrand/', 'RealBrand', 'downloads/RealBrand_9873529.zip', '2020-08-04 15:32:29.000000'),
(9, 1, 'directories/-162084625/RealBrand/client/', 'client', 'downloads/client_3982978.zip', '2020-08-10 20:39:00.000000'),
(10, 1, 'directories/-162084625/RealBrand/client/', 'client', 'downloads/client_3049235.zip', '2020-08-10 20:39:09.000000'),
(11, 1, 'directories/-162084625/RealBrand/', 'RealBrand', 'downloads/RealBrand_6366186.zip', '2020-08-10 20:39:52.000000'),
(12, 1, 'directories/-162084625/RealBrand/', 'RealBrand', 'downloads/RealBrand_9574340.zip', '2020-08-10 20:40:03.000000');

-- --------------------------------------------------------

--
-- Table structure for table `filelogs`
--

CREATE TABLE `filelogs` (
  `id` int(100) NOT NULL,
  `userid` int(100) NOT NULL,
  `Modified` varchar(100) NOT NULL,
  `date` datetime(6) NOT NULL,
  `mainPath` varchar(100) NOT NULL,
  `newParh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filelogs`
--

INSERT INTO `filelogs` (`id`, `userid`, `Modified`, `date`, `mainPath`, `newParh`) VALUES
(1, 1, 'ReadMe.txt', '2020-08-02 17:40:58.000000', 'directories/-162084625/RealBrand(blog system)/ReadMe.txt', 'OldFiles/164008420ReadMe.txt');

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` int(100) NOT NULL,
  `forum_id` int(100) NOT NULL,
  `userid` int(100) NOT NULL,
  `directory` varchar(100) NOT NULL,
  `admin` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id`, `forum_id`, `userid`, `directory`, `admin`, `name`) VALUES
(1, 93702043, 1, 'project/-162084625/Realbrand', '1', 'Realbrand');

-- --------------------------------------------------------

--
-- Table structure for table `userfiles`
--

CREATE TABLE `userfiles` (
  `userid` int(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `date` datetime(6) NOT NULL,
  `KEY_ID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userfiles`
--

INSERT INTO `userfiles` (`userid`, `title`, `path`, `date`, `KEY_ID`) VALUES
(1, 'RealBrand(blog system)', 'directories/-162084625/RealBrand(blog system)', '2020-08-02 17:39:40.000000', ''),
(1, 'RealBrand', 'directories/-162084625/RealBrand', '2020-08-02 20:04:10.000000', ''),
(2, 'try', 'directories/509054397/try', '2020-08-04 15:15:27.000000', ''),
(1, 'Realbrand', 'project/-162084625/Realbrand', '2020-08-10 20:42:09.000000', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `KEY_ID` varchar(100) NOT NULL,
  `directories` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `KEY_ID`, `directories`) VALUES
(1, 'Airo tony', 'airotony8@gmail.com', '3K+pBWR1RIYYgF2tkAQnCJzdKdWLY4thkEA0QtPxDUI=', '22445315', '-162084625'),
(2, 'james', 'james@gmail.com', 'jVo4pCVRKNLt2F1S20dzZyAVeLW6pbMqn7ntB+PNO4E=', '26749881', '509054397');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatroom`
--
ALTER TABLE `chatroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filelogs`
--
ALTER TABLE `filelogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
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
-- AUTO_INCREMENT for table `chatroom`
--
ALTER TABLE `chatroom`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `filelogs`
--
ALTER TABLE `filelogs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
