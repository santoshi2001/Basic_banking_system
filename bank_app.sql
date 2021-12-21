-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 05:43 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email_id`, `balance`) VALUES
(1, 'santoshi', 'santoshi123@gmail.com', 16000),
(2, 'vaishnavi', 'vaishu11@gmail.com', 13000),
(3, 'Dipika', 'dipika123@gmail.com', 6000),
(4, 'Aatharv', 'Aatharv43@gmail.com', 30000),
(5, 'Madhuri', 'madhu123@gmail.com', 4000),
(6, 'vikram', 'vikram44@gmail.com', 2000),
(7, 'Manoj', 'manoj@gmail.com', 2000),
(8, 'Pavan', 'pavan123@gmail.com', 1000),
(9, 'Radhika', 'radhika78@gmail.com', 80000),
(10, 'Manish', 'manish@gmail.com', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `Sr_No` int(11) NOT NULL,
  `Sender` varchar(20) NOT NULL,
  `Receiver` varchar(30) NOT NULL,
  `balance` int(11) NOT NULL,
  `DateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`Sr_No`, `Sender`, `Receiver`, `balance`, `DateTime`) VALUES
(1, 'vaishnavi', 'santoshi', 2000, '2021-12-18 14:11:41'),
(3, 'Madhuri', 'Aatharv', 1000, '2021-12-18 16:04:09'),
(4, 'santoshi', 'Dipika', 2000, '2021-12-18 18:16:24'),
(5, 'Aatharv', 'santoshi', 1000, '2021-12-18 18:37:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`Sr_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `Sr_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
