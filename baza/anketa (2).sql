-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2020 at 02:15 PM
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
  `napomena` varchar(255) NOT NULL,
  `sumnjiv` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anketa`
--

INSERT INTO `anketa` (`korisnicko_ime`, `tip`, `koriscenje`, `os`, `iskustvo`, `cpu`, `ram`, `gpu`, `vreme`, `igre`, `popravka`, `napomena`, `sumnjiv`) VALUES
('asdf', 'Laptop,Desktop,Tablet', 'Za posao,Gaming,Slusanje muzike,Drustvene mreze,Surfvoanje po internetu', 'Windows,Linux,Mac', '2-5 godina', 'Intel', '8 GB', 'Nvidia,Intel', '3-4 casa', 'Ne', 'Popravljam neke sitnice', 'napomena neka', 0),
('asdf2', 'Laptop', 'Za posao', 'Windows', 'Do 2 godine', 'Intel', '4 GB', 'Nvidia', '1 cas ili manje', 'Da', 'Nosim ga u servis', '', 0),
('samed', 'Laptop', 'Za posao', 'Windows', 'Do 2 godine', 'Intel', '4 GB', 'Nvidia', '1 cas ili manje', 'Da', 'Nosim ga u servis', '', 1),
('test', 'Tablet', 'Gaming,Surfvoanje po internetu', 'Linux,Mac', 'Do 2 godine', 'AMD', '16 GB', 'Intel', '5 casova ili vise', 'Da', 'Resavam sve probleme sam', '', 0),
('test2', 'Laptop', 'Za posao', 'Linux', '2-5 godina', 'AMD', '4 GB', 'AMD', '5 casova ili vise', 'Ne', 'Nosim ga u servis', '', 0),
('zijadin', 'Laptop', 'Surfvoanje po internetu', 'Windows', '2-5 godina', 'AMD', '8 GB', 'AMD', '2-3 casa', 'Da', 'Nosim ga u servis', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnicko_ime` varchar(255) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lozinka` varchar(64) NOT NULL,
  `adresa` varchar(50) DEFAULT NULL,
  `jmbg` varchar(15) DEFAULT NULL,
  `telefon` varchar(20) NOT NULL,
  `tip_korisnika` enum('korisnik','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnicko_ime`, `ime`, `prezime`, `email`, `lozinka`, `adresa`, `jmbg`, `telefon`, `tip_korisnika`) VALUES
('asdf', 'asdf', 'asdf', 'asdf@asdf.com', 'f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b', '', '', '', 'korisnik'),
('asdf2', 'asd', 'asd', 'asdfdfe@asdf', 'f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b', '', '', '', 'korisnik'),
('ninoslav', 'ninoslav', 'ninoslav', 'ninoslav@gmail.com', '3c684eba1fc943de60597ec51763ccab5672d32b671757f1429820318aeeeb86', '', '', '', 'korisnik'),
('samed', 'Samed', 'Bejtovic', 'samed@gmail.com', '0851f9cb7ed5c951298d9387b06985bf8fd15f98b4e700c81cc4adeddcd8c2cd', '', NULL, '', 'admin'),
('test', 'test', 'test', 'test@test', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'test', 'test', 'test', 'korisnik'),
('test2', 'test2', 'test2', 'test2@text.test', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', '', '', '', 'korisnik'),
('zijadin', 'zijadin', 'zijadin', 'zijadin@gmail.com', '8034d841fcead643d3f84587612f7f464e2f52437bbfd72a8e096e17b5ab6b3c', '', '', '', 'korisnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anketa`
--
ALTER TABLE `anketa`
  ADD PRIMARY KEY (`korisnicko_ime`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnicko_ime`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
