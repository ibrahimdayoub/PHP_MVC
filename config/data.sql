-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2022 at 12:45 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- 
-- Database: `ibrahimdayoub`
--

CREATE DATABASE ibrahimdayoub;

-- --------------------------------------------------------

--
-- Table structure for table `wisdoms`
--

CREATE TABLE `wisdoms` (
  `id` int(11) NOT NULL,
  `wisdom_text` varchar(255) NOT NULL,
  `wisdom_on` varchar(255) NOT NULL,
  `wisdom_from` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wisdoms`
--

INSERT INTO `wisdoms` (`id`, `wisdom_text`, `wisdom_on`, `wisdom_from`) VALUES
(168, 'Ibrahim Ali Dayoub', 'Ibrahim Ali Dayoub', 'Ibrahim Ali Dayoub'),
(169, 'Hello World ', 'Hello World ', 'Hello World ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wisdoms`
--
ALTER TABLE `wisdoms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wisdoms`
--
ALTER TABLE `wisdoms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
