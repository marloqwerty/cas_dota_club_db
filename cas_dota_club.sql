-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 02:47 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cas_dota_club`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--


DROP DATABASE cas_dota_club;

CREATE DATABASE cas_dota_club;
USE cas_dota_club;

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`) VALUES
(1, 'AB English Language'),
(2, 'AB Communication'),
(3, 'BA Sociology'),
(4, 'BS Biology'),
(5, 'BS Computer Science'),
(6, 'BSIT'),
(7, 'BS Math'),
(8, 'BS Meteorology');

-- --------------------------------------------------------

--
-- Table structure for table `main_position`
--

CREATE TABLE `main_position` (
  `main_position_id` int(11) NOT NULL,
  `main_position_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_position`
--

INSERT INTO `main_position` (`main_position_id`, `main_position_name`) VALUES
(1, 'Carry'),
(2, 'Ganker, Solo'),
(3, 'Offlaner'),
(4, 'Jungler'),
(5, 'Support');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(100) NOT NULL,
  `member_name` varchar(100) NOT NULL,
  `course_id` int(22) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `ign` varchar(100) NOT NULL,
  `main_position_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `member_name`, `course_id`, `email_address`, `ign`, `main_position_id`) VALUES
(37, 'Jerome Marlo Robredo', 1, 'robredojerome@gmail.com', 'tsuwo', 1),
(39, 'Faustino Tadeo', 5, 'faustinoTadeo@gmall.com', 'agressiveDestroyer', 4),
(40, 'Augusto Tolentino', 1, 'augustTolentino@gmole.com', 'September', 2),
(41, 'Alejandro Aguinaldo', 1, 'alejandro@gmall.com', 'sniper002', 1),
(42, 'Pedrito Bautista', 3, 'peter_juan@gmol.com', 'SaintPeter', 5),
(56, 'Jenshin Kawaki', 8, 'jenshinkawaki@ymail.com', 'nabyyss', 1),
(57, 'Natan Santos', 5, 'natestos@ymail.com', 'cheetos', 3),
(58, 'Christian Victor', 7, 'cthevictor@ymail.com', 'victor', 4),
(59, 'Tanjiro Castillo', 1, 'tcastillo@ymail.com', 'Hachi', 5),
(60, 'Prince Ramirez', 5, 'princeram@ymail.com', 'Delete', 2),
(61, 'Inoske Tamikaze', 6, 'inoskekaze@ymail.com', 'Fazey', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `main_position`
--
ALTER TABLE `main_position`
  ADD PRIMARY KEY (`main_position_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `members_ibfk_1` (`main_position_id`),
  ADD KEY `course_id` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `main_position`
--
ALTER TABLE `main_position`
  MODIFY `main_position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`main_position_id`) REFERENCES `main_position` (`main_position_id`),
  ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
