-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 07, 2022 at 10:11 PM
-- Server version: 10.5.16-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freedmr_talkgroups`
--

-- --------------------------------------------------------

--
-- Table structure for table `SERVERS`
--

CREATE TABLE `SERVERS` (
  `serverid` smallint(6) NOT NULL,
  `mcc` smallint(6) NOT NULL,
  `name` text NOT NULL,
  `website` text NOT NULL DEFAULT '#',
  `dashboard` text NOT NULL DEFAULT '#',
  `dashboard2` text NOT NULL DEFAULT '#',
  `telegram` text NOT NULL DEFAULT '#',
  `socials` text NOT NULL DEFAULT '#'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TALKGROUPS`
--

CREATE TABLE `TALKGROUPS` (
  `TALKGROUP` int(11) DEFAULT NULL,
  `NAME` mediumtext DEFAULT NULL,
  `BRIDGES` mediumtext DEFAULT NULL,
  `COUNTRY` mediumtext DEFAULT NULL,
  `MCC` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `USERS`
--

CREATE TABLE `USERS` (
  `id` tinyint(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `mcc` smallint(6) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `SERVERS`
--
ALTER TABLE `SERVERS`
  ADD UNIQUE KEY `serverid` (`serverid`);

--
-- Indexes for table `TALKGROUPS`
--
ALTER TABLE `TALKGROUPS`
  ADD UNIQUE KEY `TALKGROUP` (`TALKGROUP`);

--
-- Indexes for table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `USERS`
--
ALTER TABLE `USERS`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
