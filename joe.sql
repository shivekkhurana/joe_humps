-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: sql301.xtreemhost.com
-- Generation Time: Dec 03, 2012 at 10:16 PM
-- Server version: 5.5.27-28.0
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `xth_5414237_humpss`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE IF NOT EXISTS `auth` (
  `sessionId` varchar(36) NOT NULL,
  `userId` varchar(6) NOT NULL,
  `email` varchar(46) NOT NULL,
  `password` varchar(36) NOT NULL,
  `realName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `sessionId` (`sessionId`,`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`sessionId`, `userId`, `email`, `password`, `realName`) VALUES
('e0b7598', '3c1387', 'shivekk@gmail.com', 'lovebulls', 'shivek khurana'),
('', '068ed6', 'shivekkhurana@gmail.com', 'lovebulls', NULL),
('ff40112', '0e1c15', 'check@check2.com', 'lovebulls', NULL),
('', 'e64216', 'shivekk@gmaisl.com', 'lovebulls', NULL),
('2c95f46', 'b2a456', 'jatinbhatt60@yahoo.in', 'usethebedandfuck', NULL),
('8be9f3a', '083750', 'shivekk@hotmail.com', 'lovebulls', NULL),
('6d7fd69', '286d7f', 'shivekkhufrana@gmail.com', 'f', NULL),
('a609ca1', '4940bf', 'the6.6wall_petrcech@yahoo.com', 'jatin', NULL),
('', '28563c', 'shivekk@ymail.com', 'lovebulls', 'xfcxcv'),
('dee9c64', 'f285f5', 'hel@hel.com', 'lovebulls', NULL),
('ff2e204', '278c1f', 'a@b.com', 'qwerty', NULL),
('', '81bf5c', 'shivegfdkk@gmail.com', '1234', NULL),
('', '67bb85', 'sarthak@gmail.com', 'abcd', 'Sarthak Khurana');

-- --------------------------------------------------------

--
-- Table structure for table `exporter`
--

CREATE TABLE IF NOT EXISTS `exporter` (
  `siteId` varchar(20) NOT NULL,
  `meterId` varchar(20) NOT NULL,
  `indicatorId` varchar(20) NOT NULL,
  KEY `siteId` (`siteId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `main`
--

CREATE TABLE IF NOT EXISTS `main` (
  `siteId` varchar(7) NOT NULL,
  `userId` varchar(6) NOT NULL,
  `siteName` varchar(50) NOT NULL,
  `siteUrl` varchar(100) NOT NULL,
  `likes` int(255) NOT NULL,
  `dislikes` int(255) NOT NULL,
  `theme` varchar(500) NOT NULL COMMENT 'background, foreground, link, text, message',
  PRIMARY KEY (`siteId`),
  UNIQUE KEY `siteName` (`siteName`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main`
--

INSERT INTO `main` (`siteId`, `userId`, `siteName`, `siteUrl`, `likes`, `dislikes`, `theme`) VALUES
('8ffb0f9', 'f285f5', 'sssds', 'http://fsfsf.net', 0, 0, '#F7F7F7,did you like it ?,likes :'),
('760aca0', '068ed6', 'dgf', 'http://fd.com', 0, 0, '#F7F7F7,#CCCECF,#4D61A3,#3665FF,#6E6E6E,are you happy ?,happiness levels :'),
('3045a56', '', 'fs', 'http://fd', 0, 0, '#F7F7F7,did you like it ?,likes :'),
('a9663a8', '3c1387', 'Google', 'http://www.google.com', 0, 0, '#F7F7F7,did you like it ?,likes :'),
('9fb4950', 'e64216', 'hello ', 'http://dg.com', 1, 0, '#F7F7F7,did you like it ?,likes :');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
