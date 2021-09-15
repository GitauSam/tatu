-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2021 at 03:32 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tatu`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `number` int(15) NOT NULL,
  `pickup` varchar(200) NOT NULL,
  `destination` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `name`, `number`, `pickup`, `destination`, `date`, `time`, `level`) VALUES
(1, 'kim', 789234576, 'juja', '0', '2021-07-21', '17:08:00', ''),
(2, 'jac', 98712340, 'juja', '0', '2021-07-21', '18:10:00', ''),
(3, 'hashi', 2345678, 'nasra', '0', '2021-07-22', '17:06:00', ''),
(4, 'Tabby Karuga', 703271678, 'K.Road', 'nairobi', '2021-08-27', '06:00:00', ''),
(5, 'toni', 567890345, 'juja', 'nairobi', '2021-08-17', '19:14:00', ''),
(6, 'jack daniel', 967345032, 'kasa', 'nairobi', '2021-08-17', '20:32:00', ''),
(7, 'tory', 980451234, 'kasa', 'nairobi', '2021-08-17', '21:38:00', 'business'),
(8, 'rere', 8, 'ngara', 'nairobi', '2021-09-13', '12:34:00', 'economy'),
(9, 'james', 89730966, 'leki', 'nairobi', '2021-09-13', '17:35:00', 'standard'),
(10, 'tim', 674536901, 'mombasa', 'nairobi', '2021-09-13', '19:27:00', 'standard'),
(11, 'tim', 674536901, 'mombasa', 'nairobi', '2021-09-13', '19:27:00', 'standard'),
(12, 'sue', 712345678, 'ngara', 'nairobi', '1999-09-01', '07:00:00', 'standard');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'tonytullah', 'tonytullah76a@gmail.com', '$2y$10$kVt'),
(2, 'tabby', 'tabby@gmailcom', '$2y$10$uU7'),
(3, 'hashi', 'hashi@gmail.com', '$2y$10$/IZ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
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
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
