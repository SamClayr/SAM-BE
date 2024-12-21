-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2024 at 11:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `corememories`
--

-- --------------------------------------------------------

--
-- Table structure for table `islandcontents`
--

CREATE TABLE `islandcontents` (
  `islandContentID` int(4) NOT NULL,
  `islandOfPersonalityID` int(4) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `content` varchar(300) NOT NULL,
  `color` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `islandcontents`
--

INSERT INTO `islandcontents` (`islandContentID`, `islandOfPersonalityID`, `image`, `content`, `color`) VALUES
(1, 1, 'img/fam1.jpg', 'A complete Christmas family Photo', '#FAD02C'),
(2, 1, 'img/fam2.jpg', 'Outing photo with the family.', '#FAD02C'),
(3, 1, 'img/fam3.jpg', 'The beautiful Hundred Islands with the Fam!', '#FAD02C'),
(4, 2, 'img/ccore2.jpg', 'Refreshing mind therapy', '#6495ED'),
(5, 2, 'img/ccore3.jpg', 'Imagining life in a picnic', '#6495ED'),
(6, 2, 'img/ccore1.jpg', 'Nature and relaxing mind therapy', '#6495ED'),
(7, 3, 'img/gala0.jpg', ' My favorite photo with my loml.', '#E35D5D'),
(8, 3, 'img/gala3.jpg', 'Me and my sisters going flight photo going back to ph!', '#E35D5D'),
(9, 3, 'img/gala4.jpg', 'With my sisters in Vietnam!', '#E35D5D'),
(10, 4, 'img/cat1.jpg', 'My super kulit curious kitty wais.', '#9ACD32'),
(11, 4, 'img/cat2.jpg', 'The grumpiest yet sweetest Luna cat', '#9ACD32'),
(12, 4, 'img/cat4.jpg', 'New year photo with the grumpiest! lol!', '#9ACD32');

-- --------------------------------------------------------

--
-- Table structure for table `islandsofpersonality`
--

CREATE TABLE `islandsofpersonality` (
  `islandOfPersonalityID` int(4) NOT NULL,
  `name` varchar(40) NOT NULL,
  `shortDescription` varchar(300) DEFAULT NULL,
  `longDescription` varchar(900) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `islandsofpersonality`
--

INSERT INTO `islandsofpersonality` (`islandOfPersonalityID`, `name`, `shortDescription`, `longDescription`, `color`, `image`, `status`) VALUES
(1, 'Family Island', 'Memories Family Collection', 'This island stores my memories with my family all about our get togethers, events and occasions this will always be special and important to me.', '#FAD02C', 'img/fam3.jpg', 'active'),
(2, 'Cottagecore  Island', 'Cottagecore Therapeutic collection', 'This island is about one of the part of my deepest thoughts, Cottagecore has always been my therapy it clears my mind and refreshes my soul.', '#6495ED', 'img/core3.jpg', 'active'),
(3, 'Gala Island', 'Romanticizing life', 'This island is my collection of memories of my dates, travel, shopping and all about my happy gala.', '#E35D5D', 'img/gala0.jpg', 'active'),
(4, 'Cat Island', 'My cat core collection', 'This island is dedicated to my cat. As a die hard cat lover . I love my cats so much and ever since so they will always have a special place in me. ', '#9ACD32', 'img/cat4.jpg', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `islandcontents`
--
ALTER TABLE `islandcontents`
  ADD PRIMARY KEY (`islandContentID`);

--
-- Indexes for table `islandsofpersonality`
--
ALTER TABLE `islandsofpersonality`
  ADD PRIMARY KEY (`islandOfPersonalityID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `islandcontents`
--
ALTER TABLE `islandcontents`
  MODIFY `islandContentID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `islandsofpersonality`
--
ALTER TABLE `islandsofpersonality`
  MODIFY `islandOfPersonalityID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
