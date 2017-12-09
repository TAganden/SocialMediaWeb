-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2017 at 10:35 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_media`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `accepted` (IN `id` VARCHAR(50), IN `ruid` VARCHAR(50))  MODIFIES SQL DATA
DELETE FROM `requests` WHERE `requests`.`uid` = id AND `requests`.`ruid` = ruid$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `blocked`
--

CREATE TABLE `blocked` (
  `uid` varchar(50) NOT NULL,
  `bid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blocked`
--

INSERT INTO `blocked` (`uid`, `bid`) VALUES
('sahr2397', 'maha'),
('vardh', 'rash');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `mid` int(10) NOT NULL,
  `cuid` varchar(50) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`mid`, `cuid`, `comment`) VALUES
(4, '', 'hi'),
(4, 'sahr2397', 'hiiiiiiiiiiiiiiiiiiiiiii'),
(4, 'sahr2397', 'hehehe'),
(13, 'sahr2397', 'wow'),
(13, 'sahr2397', 'nice'),
(12, 'sahr2397', 'good cookie'),
(27, 'vardh', 'nice'),
(4, 'vardh', 'nice'),
(27, 'vardh', 'rgf'),
(28, 'vardh', 'asdfg'),
(32, 'shreyas1234', 'nice'),
(28, 'shreyas1234', 'nice'),
(27, 'nats', 'yay'),
(28, 'nats', 'wqdjbE'),
(32, 'nats', 'ai');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `uid` varchar(50) NOT NULL,
  `fid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`uid`, `fid`) VALUES
('shsu', 'nats'),
('nats', 'shsu'),
('vardh', 'sahr2397'),
('sahr2397', 'vardh'),
('nats', 'vardh'),
('vardh', 'nats'),
('shreyas1234', 'nats'),
('nats', 'shreyas1234'),
('shreyas1234', 'sahr2397'),
('sahr2397', 'shreyas1234'),
('shreyas1234', 'vardh'),
('vardh', 'shreyas1234');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `mid` int(11) NOT NULL,
  `uid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`mid`, `uid`) VALUES
(4, 'sahr2397'),
(4, 'vardh'),
(7, 'nats'),
(12, 'sahr2397'),
(13, 'sahr2397'),
(13, 'vardh'),
(14, 'sahr2397'),
(14, 'vardh'),
(15, 'sahr2397'),
(17, 'nats'),
(17, 'sahr2397'),
(17, 'shsu'),
(21, 'nats'),
(21, 'sahr2397'),
(21, 'shsu'),
(27, 'vardh'),
(28, 'vardh'),
(31, 'iamdead'),
(31, 'sahr2397'),
(32, 'vardh'),
(28, 'shsu'),
(27, 'shsu'),
(32, 'sahr2397'),
(33, 'sahr2397'),
(32, 'nats'),
(28, 'nats'),
(27, 'nats');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `mid` int(11) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `caption` text NOT NULL,
  `file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`mid`, `uid`, `type`, `timestamp`, `caption`, `file`) VALUES
(4, 'sahr2397', 'image/jpeg', '2017-11-01 18:28:22', 'temporary Caption', 'WMNH2OF.jpg'),
(12, 'sahr2397', 'image/jpeg', '2017-11-10 07:59:05', '', 'cookie.jpg'),
(14, 'sahr2397', 'image/jpeg', '2017-11-11 05:53:26', 'Game of thrones.', 'got.jpg'),
(22, 'maha', 'image/jpeg', '2017-11-13 23:44:02', 'A guitar.', 'maxresdefault.jpg'),
(27, 'nats', 'image/jpeg', '2017-11-14 08:24:10', 'My beautiful self Potriat [FRAMED]', 'nattu.jpg'),
(28, 'nats', 'image/png', '2017-11-14 08:24:44', 'My bestie :)', 'Screenshot_2017-08-20-08-02-26-930_com.instagram.android.png'),
(31, 'iamdead', 'image/png', '2017-11-14 10:44:17', 'hello\r\n', 'Screenshot_2017-08-20-08-02-26-930_com.instagram.android.png'),
(32, 'vardh', 'image/jpeg', '2017-11-17 02:14:35', 'a guitar.', 'maxresdefault.jpg'),
(36, 'sahr2397', 'image/jpeg', '2017-11-20 03:21:37', 'A beautiful day at the Farm.', 'thK6YKM08Y.jpg'),
(38, 'shreyas1234', 'image/jpeg', '2017-11-20 03:38:23', 'Vang gogh\'s Starry night', 'Van_Gogh-Starry_Night-Best-KensFavorites-com-CMP80.jpg'),
(39, 'shreyas1234', 'image/jpeg', '2017-11-20 03:39:43', 'Beach days :)', 'Beach frisbee.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `no_of_requests`
--

CREATE TABLE `no_of_requests` (
  `uid` varchar(50) NOT NULL,
  `no` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `no_of_requests`
--

INSERT INTO `no_of_requests` (`uid`, `no`) VALUES
('sahr2397', 1),
('vardh', 0),
('dhva', 1),
('shreyas1234', 0),
('nats', 0),
('shsu', 0),
('maha', 0),
('dhva', 0),
('dv', 0),
('qwe', 0),
('sahr2397', 1),
('iamdead', 0),
('rash', 0),
('rashi123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `uid` varchar(50) NOT NULL,
  `ruid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`uid`, `ruid`) VALUES
('dhva', 'maha'),
('sahr2397', 'nats');

--
-- Triggers `requests`
--
DELIMITER $$
CREATE TRIGGER `add` AFTER INSERT ON `requests` FOR EACH ROW BEGIN
update no_of_requests set no=no+1 WHERE uid=NEW.uid;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `reduce` AFTER DELETE ON `requests` FOR EACH ROW BEGIN
update no_of_requests set no=no-1||no=0 WHERE uid=OLD.uid;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` varchar(50) NOT NULL,
  `uname` varchar(200) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dp` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `pwd`, `status`, `email`, `dp`) VALUES
('iamdead', 'osama bin ladin', 'ca4569819227a964961d0cbe8842a9e3', 'private', 'obamagm@911.com', NULL),
('nats', 'Natasha', '63a9f0ea7bb98050796b649e85481845', 'private', 'nattu@gmail.com', 'New Doc 2017-11-11.jpg'),
('rash', 'Rashmi', '63a9f0ea7bb98050796b649e85481845', 'private', 'rash@gmail.com', NULL),
('rashi123', 'Rashi Shukla', '63a9f0ea7bb98050796b649e85481845', 'Private', 'rashi@gmail.com', NULL),
('sahr2397', 'Sahana R', '0cd3ccc5465130730c0f1c46f58e94aa', 'private', 'sahr15is@cmrit.ac.in', NULL),
('shreyas1234', 'Shreyas', 'ebc8102d30a6ee283dcad94c40463cc4', 'private', 'shnd15is@cmrit.ac.in', '5909dc85921c6624c90890fc.jpg'),
('shsu', 'Sharanya', '63a9f0ea7bb98050796b649e85481845', 'private', 'shsu15is@cmrit.ac.in', NULL),
('vardh', 'Vardhini B', '63a9f0ea7bb98050796b649e85481845', 'private', 'vanb@cmrit.ac.in', 'Screenshot_2017-08-20-08-02-26-930_com.instagram.android.png');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `add_on` BEFORE INSERT ON `user` FOR EACH ROW BEGIN
INSERT INTO no_of_requests values (NEW.uid,0);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del` AFTER DELETE ON `user` FOR EACH ROW BEGIN
DELETE FROM no_of_requests where uid=OLD.uid;
DELETE FROM friends where uid=OLD.uid;
DELETE FROM blocked where uid=OLD.uid;
DELETE FROM media where uid=OLD.uid;
DELETE FROM activities where uid=OLD.uid;
DELETE FROM likes where uid=OLD.uid;
DELETE FROM comment WHERE cuid=OLD.uid;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blocked`
--
ALTER TABLE `blocked`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`uid`,`ruid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
