-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2022 at 10:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slatkakuca2021`
--

-- --------------------------------------------------------

--
-- Table structure for table `dodaci`
--

CREATE TABLE `dodaci` (
  `id` int(2) UNSIGNED NOT NULL,
  `dodatak` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dodaci`
--

INSERT INTO `dodaci` (`id`, `dodatak`) VALUES
(1, 'Nutela'),
(2, 'Višnja'),
(3, 'Plazma'),
(4, 'Kokos'),
(5, 'Čoko mrvice'),
(6, 'Twix');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `kor_ime` varchar(45) COLLATE utf8_bin NOT NULL,
  `lozinka` varchar(45) COLLATE utf8_bin NOT NULL,
  `ime` varchar(45) COLLATE utf8_bin NOT NULL,
  `prezime` varchar(45) COLLATE utf8_bin NOT NULL,
  `tip` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`kor_ime`, `lozinka`, `ime`, `prezime`, `tip`) VALUES
('mika', 'mika123', 'Mika', 'Mikic', 'radnik'),
('pera', 'pera123', 'Petar', 'Petrovic', 'kupac'),
('zika', 'zika123', 'Zika', 'Zikic', 'kupac');

-- --------------------------------------------------------

--
-- Table structure for table `narudzbine`
--

CREATE TABLE `narudzbine` (
  `idN` int(11) NOT NULL,
  `kupac` varchar(45) COLLATE utf8_bin NOT NULL,
  `ponuda` int(11) NOT NULL,
  `datum` date NOT NULL,
  `status` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `narudzbine`
--

INSERT INTO `narudzbine` (`idN`, `kupac`, `ponuda`, `datum`, `status`) VALUES
(1, 'pera', 2, '2021-02-10', 'Prihvaceno'),
(2, 'zika', 1, '2021-02-16', 'Neobradjeno'),
(3, 'pera', 2, '2021-02-10', 'Prihvaceno'),
(4, 'pera', 2, '2021-02-10', 'Prihvaceno'),
(5, 'zika', 1, '2021-02-16', 'Neobradjeno'),
(6, 'zika', 1, '2021-02-16', 'Neobradjeno');

-- --------------------------------------------------------

--
-- Table structure for table `ponude`
--

CREATE TABLE `ponude` (
  `idP` int(11) NOT NULL,
  `naziv` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ponude`
--

INSERT INTO `ponude` (`idP`, `naziv`) VALUES
(1, 'Srednja krofna sa nutelom'),
(2, 'Mala krofna sa twixom'),
(3, 'Velika krofna sa plazmom i kokosom');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dodaci`
--
ALTER TABLE `dodaci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`kor_ime`);

--
-- Indexes for table `narudzbine`
--
ALTER TABLE `narudzbine`
  ADD PRIMARY KEY (`idN`),
  ADD KEY `kupci` (`kupac`),
  ADD KEY `ponude` (`ponuda`);

--
-- Indexes for table `ponude`
--
ALTER TABLE `ponude`
  ADD PRIMARY KEY (`idP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dodaci`
--
ALTER TABLE `dodaci`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `narudzbine`
--
ALTER TABLE `narudzbine`
  MODIFY `idN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `narudzbine`
--
ALTER TABLE `narudzbine`
  ADD CONSTRAINT `kupci` FOREIGN KEY (`kupac`) REFERENCES `korisnici` (`kor_ime`),
  ADD CONSTRAINT `ponude` FOREIGN KEY (`ponuda`) REFERENCES `ponude` (`idP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
