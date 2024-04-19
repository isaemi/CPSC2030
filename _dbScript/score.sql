-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2024 at 07:52 AM
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
-- Database: `project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `score_id` int(11) NOT NULL,
  `gamename` varchar(20) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`score_id`, `gamename`, `uname`, `score`) VALUES
(1, 'Berry Adventures!', 'Serhii', 183),
(2, 'Whac-A-Mole', 'Saemi', 8),
(3, 'Hangman', 'John', 6),
(4, 'Hangman', 'Martin', 2),
(5, 'Berry Adventures!', 'Haemi', 37),
(6, 'Berry Adventures!', 'Jongsu', 26),
(7, 'Berry Adventures!', 'Darvey', 57),
(9, 'Berry Adventures!', 'Max', 38),
(10, 'Berry Adventures!', 'Matt', 134),
(11, 'Whac-A-Mole', 'Luc', 21),
(12, 'Whac-A-Mole', 'Sam', 17),
(13, 'Whac-A-Mole', 'James', 16),
(14, 'Whac-A-Mole', 'Brent', 13),
(15, 'Hangman', 'Dino', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`score_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `score_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
