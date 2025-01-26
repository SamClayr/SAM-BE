-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2025 at 09:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olympinoy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `athletes`
--

CREATE TABLE `athletes` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `achievement` text NOT NULL,
  `sport` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `medal` varchar(50) NOT NULL,
  `olympics` varchar(50) NOT NULL,
  `records` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `athletes`
--

INSERT INTO `athletes` (`id`, `image`, `name`, `short_description`, `achievement`, `sport`, `category`, `medal`, `olympics`, `records`) VALUES
(1, 'hidilyndiaz.jpg', 'Hidilyn Diaz', 'Gold Medalist - Weightlifting', 'Hidilyn Diaz made history by winning the Philippines\' first-ever Olympic gold medal in the women\'s 55kg weightlifting competition at the 2020 Tokyo Olympics.', 'Weightlifting', 'Women\'s 55kg', 'Gold', 'Tokyo 2020', 'Olympic Record: 127kg, Total Lift: 224kg'),
(12, 'carlosyulo.avif', 'Carlos Yulo', 'Gold Medalist - Gymnastics', 'Carlos Yulo became the first Filipino gymnast to win a gold medal in the World Artistic Gymnastics Championships.', 'Gymnastics', 'Men\'s Artistic', 'Gold', 'World Championships 2019', 'Floor Exercise Champion'),
(13, 'onyok.jpg', 'Mansueto \"Onyok\" Velasco', 'Silver Medalist - Boxing', 'Onyok Velasco won silver in the light flyweight division at the 1996 Atlanta Olympics.', 'Boxing', 'Light Flyweight', 'Silver', 'Atlanta 1996', 'Olympic Silver Medalist'),
(14, 'anthonyvillanueva.webp', 'Anthony Villanueva', 'Silver Medalist - Boxing', 'Anthony Villanueva won silver in the featherweight boxing division at the 1964 Tokyo Olympics.', 'Boxing', 'Featherweight', 'Silver', 'Tokyo 1964', 'Olympic Silver Medalist'),
(15, 'Teofilo-Ydlefonso.jpg', 'Teófilo Yldefonso', 'Bronze Medalist - Swimming', 'Teófilo Yldefonso won bronze in the men\'s 200m breaststroke event at the 1928 and 1932 Olympics.', 'Swimming', '200m Breaststroke', 'Bronze', 'Amsterdam 1928, Los Angeles 1932', 'First Filipino Olympic Medalist'),
(16, 'jose-villanueva.webp', 'José Villanueva', 'Bronze Medalist - Boxing', 'José Villanueva won bronze in the bantamweight boxing division at the 1932 Los Angeles Olympics.', 'Boxing', 'Bantamweight', 'Bronze', 'Los Angeles 1932', 'Olympic Bronze Medalist'),
(17, 'Simeon_Toribio.jpg', 'Simeon Toribio', 'Bronze Medalist - Athletics', 'Simeon Toribio secured bronze in the men\'s high jump event at the 1932 Los Angeles Olympics.', 'Athletics', 'High Jump', 'Bronze', 'Los Angeles 1932', 'Olympic Bronze Medalist'),
(18, 'miguel_white.jpg', 'Miguel White', 'Bronze Medalist - Athletics', 'Miguel White won bronze in the men\'s 400m hurdles event at the 1936 Berlin Olympics.', 'Athletics', '400m Hurdles', 'Bronze', 'Berlin 1936', 'Olympic Bronze Medalist'),
(19, 'roel-velasco.png', 'Roel Velasco', 'Bronze Medalist - Boxing', 'Roel Velasco won bronze in the light flyweight division at the 1992 Barcelona Olympics.', 'Boxing', 'Light Flyweight', 'Bronze', 'Barcelona 1992', 'Olympic Bronze Medalist');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `message`) VALUES
(1, 'Test', 'test@email.com', 'This Filipino athletes are the best!'),
(2, 'Sam', 'sammilby@gmail.com', 'Ang popogi ng mga athletes.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'user_ako', 'user@gmail.com', 'user123'),
(4, 'testing', 'testing@gmail.com', 'testing123'),
(5, 'sam', 'sammilby@gmail.com', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `athletes`
--
ALTER TABLE `athletes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `athletes`
--
ALTER TABLE `athletes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
