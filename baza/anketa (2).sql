-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2020 at 05:37 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anketa`
--

-- --------------------------------------------------------

--
-- Table structure for table `anketa`
--

CREATE TABLE `anketa` (
  `korisnicko_ime` varchar(255) NOT NULL,
  `tip` varchar(50) NOT NULL,
  `koriscenje` varchar(100) NOT NULL,
  `os` varchar(50) NOT NULL,
  `iskustvo` varchar(50) NOT NULL,
  `cpu` varchar(50) NOT NULL,
  `ram` varchar(50) NOT NULL,
  `gpu` varchar(50) NOT NULL,
  `vreme` varchar(50) NOT NULL,
  `igre` varchar(50) NOT NULL,
  `popravka` varchar(50) NOT NULL,
  `napomena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anketa`
--

INSERT INTO `anketa` (`korisnicko_ime`, `tip`, `koriscenje`, `os`, `iskustvo`, `cpu`, `ram`, `gpu`, `vreme`, `igre`, `popravka`, `napomena`) VALUES
('asdf', 'Laptop,Desktop,Tablet', 'Za posao,Gaming,Slusanje muzike,Drustvene mreze,Surfvoanje po internetu', 'Windows,Linux,Mac', '2-5 godina', 'Intel', '8 GB', 'Nvidia,Intel', '3-4 casa', 'Ne', 'Popravljam neke sitnice', 'napomena neka'),
('samed', 'Desktop', 'Gaming,Surfvoanje po internetu', 'Windows,Linux', '2-5 godina', 'Intel', '8 GB', 'AMD', '2-3 casa', 'Da', 'Popravljam neke sitnice', 'napomena napomena napomena'),
('test', 'Tablet', 'Gaming,Surfvoanje po internetu', 'Linux,Mac', 'Do 2 godine', 'AMD', '16 GB', 'Intel', '5 casova ili vise', 'Da', 'Resavam sve probleme sam', ''),
('test2', 'Laptop', 'Za posao', 'Linux', '2-5 godina', 'AMD', '4 GB', 'AMD', '5 casova ili vise', 'Ne', 'Nosim ga u servis', ''),
('zijadin', 'Laptop', 'Surfvoanje po internetu', 'Windows', '2-5 godina', 'AMD', '8 GB', 'AMD', '2-3 casa', 'Da', 'Nosim ga u servis', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anketa`
--
ALTER TABLE `anketa`
  ADD PRIMARY KEY (`korisnicko_ime`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
