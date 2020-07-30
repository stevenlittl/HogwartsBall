-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2020 at 11:14 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hogwartsball`
--

-- --------------------------------------------------------

--
-- Table structure for table `globals`
--

CREATE TABLE `globals` (
  `global` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `globals`
--

INSERT INTO `globals` (`global`, `value`, `id`) VALUES
('adminPassword', '$2y$10$vcqDCajigf3MJLzlLv3AVu1cInhIRbz/AEg8vtHegdG3AQA5113gi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticketsales`
--

CREATE TABLE `ticketsales` (
  `ID` int(11) NOT NULL,
  `fname` varchar(14) DEFAULT NULL,
  `lname` varchar(13) DEFAULT NULL,
  `streetName` varchar(100) DEFAULT NULL,
  `suburb` varchar(20) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `paid` tinyint(1) DEFAULT NULL,
  `atDoorPickup` tinyint(1) DEFAULT NULL,
  `ticketAmount` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticketsales`
--

INSERT INTO `ticketsales` (`ID`, `fname`, `lname`, `streetName`, `suburb`, `city`, `paid`, `atDoorPickup`, `ticketAmount`, `email`) VALUES
(1, 'Nathan', 'Gentle', '261 Main Street', 'Shirley', 'Christchurch', 1, 1, 10, 'GentleN@Hogwarts.school.nz'),
(2, 'Natasha', 'Stokes', '227 Knapdale Road', 'Papanui', 'Christchurch', 0, 1, 2, 'StokesN@Hogwarts.school.nz'),
(3, 'Patience', 'Wallace', '30 Carteret Street', 'Casebrook', 'Christchurch', 1, 1, 2, 'WallaceP@Hogwarts.school.nz'),
(4, 'Samuel', 'Sharp', '33 Eccles Street', 'Kaiapoi', 'Christchurch', 1, 1, 4, 'SharpS@Hogwarts.school.nz'),
(5, 'Jessica', 'Orlowski', '14 Willis Street', 'Papanui', 'Christchurch', 0, 1, 2, 'OrlowskiJ@Hogwarts.school.nz'),
(6, 'Scarlett', 'Irving', '11 Green Street', 'Redwood', 'Christchurch', 1, 0, 8, 'IrvingS@Hogwarts.school.nz'),
(7, 'Alica', 'Kennedy', '16 Main Street', 'Redwood', 'Christchurch', 1, 1, 10, 'KennedyA@Hogwarts.school.nz'),
(8, 'Paige', 'Hiri', '107 Coutts Road', 'Papanui', 'Christchurch', 0, 0, 2, 'HiriP@Hogwarts.school.nz'),
(9, 'Mya', 'Qasevakatini', '22 Scott Street', 'Casebrook', 'Christchurch', 1, 1, 2, 'QasevakatiniM@Hogwarts.school.nz'),
(10, 'Dhana', 'Musalov', '72 Broughton Street', 'Kaiapoi', 'Christchurch', 1, 1, 4, 'MusalovD@Hogwarts.school.nz'),
(11, 'Rueban', 'Gardyne', '12 Oxford Street', 'Papanui', 'Christchurch', 1, 1, 2, 'GardyneR@Hogwarts.school.nz'),
(12, 'Braden', 'Gee', '7 Lewis Street', 'Redwood', 'Christchurch', 0, 1, 8, 'GeeB@Hogwarts.school.nz'),
(13, 'Jet', 'Woodward', '17 Irving Street', 'Redwood', 'Christchurch', 1, 1, 10, 'WoodwardJ@Hogwarts.school.nz'),
(14, 'Joel', 'Koppert', '713 Kee Road', 'Papanui', 'Christchurch', 1, 1, 2, 'KoppertJ@Hogwarts.school.nz'),
(15, 'Mykel', 'King', '203 Charteris Bush Road', 'Casebrook', 'Christchurch', 0, 1, 2, 'KingM@Hogwarts.school.nz'),
(16, 'Michael', 'Connorton', '16 Dale Crescent', 'Kaiapoi', 'Christchurch', 1, 0, 4, 'ConnortonM@Hogwarts.school.nz'),
(17, 'Karna', 'Crawford', '376 Hillfoot Road', 'Papanui', 'Christchurch', 0, 1, 2, 'CrawfordK@Hogwarts.school.nz'),
(18, 'Zach', 'McGregor', '246 Clutha River Rd', 'Redwood', 'Christchurch', 0, 0, 8, 'McGregorZ@Hogwarts.school.nz'),
(19, 'Alex', 'McKenzie', '1535 Glencoe Highway', 'Redwood', 'Christchurch', 1, 1, 10, 'McKenzieA@Hogwarts.school.nz'),
(20, 'Kayleigh', 'Herrera Rojas', '11 Avon Street', 'Papanui', 'Christchurch', 1, 1, 2, 'Herrera RojasK@Hogwarts.school.nz'),
(21, 'Eligh', 'McKee', '4 Johnston Street', 'Casebrook', 'Christchurch', 1, 1, 2, 'McKeeE@Hogwarts.school.nz'),
(22, 'Casey', 'Williams', '114 Hokonui Drive', 'Kaiapoi', 'Christchurch', 0, 1, 4, 'WilliamsC@Hogwarts.school.nz'),
(23, 'Tom', 'Hurley', '47 Joseph Street', 'Papanui', 'Christchurch', 1, 1, 2, 'HurleyT@Hogwarts.school.nz'),
(24, 'Finley Pierson', 'Robin', '10 Stuart Street', 'Redwood', 'Christchurch', 1, 1, 8, 'RobinF@Hogwarts.school.nz'),
(25, 'Max', 'Stanton', '137 Cameron Road', 'Redwood', 'Christchurch', 0, 1, 10, 'StantonM@Hogwarts.school.nz'),
(26, 'Harrison', 'Phillips', '8a William Street', 'Papanui', 'Christchurch', 1, 0, 2, 'PhillipsH@Hogwarts.school.nz'),
(27, 'Anahera', 'McFadzien', '107 Coutts Road', 'Casebrook', 'Christchurch', 1, 1, 2, 'McFadzienA@Hogwarts.school.nz'),
(28, 'Alistair', 'Chadha', '68 Broughton Street', 'Kaiapoi', 'Christchurch', 1, 0, 4, 'ChadhaA@Hogwarts.school.nz'),
(29, 'Jordan', 'Musalov', '384 Dodds Road', 'Papanui', 'Christchurch', 1, 1, 2, 'MusalovJ@Hogwarts.school.nz'),
(30, 'Jesse', 'Bedwell', '220 Reaby Road', 'Redwood', 'Christchurch', 1, 1, 8, 'BedwellJ@Hogwarts.school.nz'),
(31, 'Sage', 'Dodd', '309 Waikaka Road', 'Redwood', 'Christchurch', 1, 1, 12, 'DoddS@Hogwarts.school.nz'),
(47, 'sdaf', 'asdf', 'sadf', 'asfd', 'sdf', NULL, 0, 4, 'sdafsadf@g.com'),
(48, 'sdaf', 'asdf', 'sadf', 'asfd', 'sdf', NULL, 0, 4, 'sdafsadf@g.com'),
(49, 'sdaf', 'asdf', 'sadf', 'asfd', 'sdf', NULL, 0, 4, 'sdafsadf@g.com'),
(50, 'sdaf', 'asdf', 'sadf', 'asfd', 'sdf', NULL, 0, 4, 'sdafsadf@g.com'),
(51, 'dsfsdadsdsfsda', 'ddsfsdadsdsfs', 'sda', 'sadf', 'sdaf', NULL, 0, 5, 'dsfsdadsdsfsdadsdsfsdadsdsfsdadsdsfsdadsdsfsdadsds'),
(52, 'dsfsdadsdsfsda', 'ddsfsdadsdsfs', 'sda', 'sadf', 'sdaf', NULL, 0, 5, 'dsfsdadsdsfsdadsdsfsdadsdsfsdadsdsfsdadsdsfsdadsds'),
(53, 'adadadadadadad', 'sdaf', 'sadf', 'sadf', 'asdf', 1, 0, 4, 'sdaf@g.com'),
(54, 'adadadadadadad', 'sdaf', 'sadf', 'sadf', 'asdf', 1, 0, 4, 'sdaf@g.com'),
(55, 'dfsdsd', 'fasd', 'sadf', 'asdf', 'sdaf', NULL, 0, 5, 'sdf@gmail.com'),
(56, 'dsf', 'sdaf', 'sdaf', 'sadf', 'sadf', NULL, 0, 5, 'sadf@gmail.com'),
(57, 'Steven', 'Little', 'sdaf', 'sadf', 'sdaf', 1, 0, 3, '1@gmail.com'),
(58, 'sdaf', 'sd', 'sadf', 'sdf', 'sadf', NULL, 0, 4, 'sadf@gm.com'),
(59, 'sdaf', 'sd', 'sadf', 'sdf', 'sadf', NULL, 0, 4, 'sadf@gm.com'),
(60, 'sdaf', 'sd', 'sadf', 'sdf', 'sadf', NULL, 0, 4, 'sadf@gm.com'),
(61, 'sdaf', 'sd', 'sadf', 'sdf', 'sadf', NULL, 0, 4, 'sadf@gm.com'),
(62, 'sdaf', 'sd', 'sadf', 'sdf', 'sadf', NULL, 0, 4, 'sadf@gm.com'),
(63, 'sdaf', 'sd', 'sadf', 'sdf', 'sadf', NULL, 0, 4, 'sadf@gm.com'),
(64, 'sdaf', 'sd', 'sadf', 'sdf', 'sadf', NULL, 0, 4, 'sadf@gm.com'),
(65, 'sdfs', 'asdf', 'sdf', 'sdf', 'sdafs', NULL, 0, 5, 's@gmail.com'),
(66, 'asdf', 'sdaf', 'dsf', 'sadfas', 'sadf', 1, 0, 1, 'asdf@g.com'),
(67, 'asdf', 'sdaf', 'dsf', 'sadf', 'sadf', NULL, 0, 1, 'g@g.com'),
(68, 'hhjkh', 'kj', 'khkj', 'hkjh', 'hkj', NULL, 0, 3, 'hj@gmail.com'),
(69, 'sdf', 'sdf', 'sdfd', 'sdf', 'saddf', NULL, 0, 4, 'sadf@g.com'),
(70, 'sdf', 'sdf', 'sdfd', 'sdf', 'saddf', NULL, 0, 4, 'sadf@g.com'),
(71, 'Steven', 'Little', 'here', 'here', 'here', 1, 0, 1, 'hello@gmail.com'),
(72, 'sadf', 'asdf', 'sdf', 'sadf', 'asdf', NULL, 0, 1, 'sdaf@gmail.com'),
(73, 'Steven', 'Little', 'dsf', 'sdf', 'asdf', NULL, 0, 2, 'glueh18@gmail.com'),
(74, '; Drop', 'f', 'ffds', 'sdfas', 'aadf', 1, 0, 30, 'f@gmail.com'),
(75, 'Loro', 'Di', 'here', 'Papanui', 'Chirstchurch', NULL, 0, 8, 'l@gmail.comn'),
(76, 'aaaaaaaaaaaaaa', 'aaaaaaaaaaaaa', 'HERE', 'adfsdsadf', 'sdf', 0, 0, 30, 'g@g.com'),
(77, 'Hello', 'f', 'Not Here', 'sdf', 'Chi', NULL, 0, 4, '17littles@student.stbedes.school.nz'),
(78, 'Steven', 'Little', 'Here', 'here', 'Here', NULL, 0, 5, 'glueh18@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `globals`
--
ALTER TABLE `globals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticketsales`
--
ALTER TABLE `ticketsales`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `globals`
--
ALTER TABLE `globals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticketsales`
--
ALTER TABLE `ticketsales`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
