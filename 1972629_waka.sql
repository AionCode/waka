-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2017 at 05:54 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waka`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `ime_m` varchar(25) COLLATE utf8_bin NOT NULL,
  `prezime_m` varchar(25) COLLATE utf8_bin NOT NULL,
  `email_m` varchar(50) COLLATE utf8_bin NOT NULL,
  `lozinka_m` varchar(20) COLLATE utf8_bin NOT NULL,
  `id_ocena` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `ime_m`, `prezime_m`, `email_m`, `lozinka_m`, `id_ocena`) VALUES
(1, 'Aleksandar', 'Stojanovic', 'astojanovic84@gmail.com', 'lozinka1', 1),
(2, 'Milica', 'Ristic', 'milicaristic@gmail.com', 'lozinka2', 2),
(3, 'Dragan', 'Petrovic', 'draganpet22@gmail.com', 'lozinka3', 3),
(4, 'Milos', 'Banovic', 'milosbanovic76@gmail.com', 'lozinka4', 4);

-- --------------------------------------------------------

--
-- Table structure for table `nalog`
--

CREATE TABLE `nalog` (
  `id_nalog` int(11) NOT NULL,
  `korisnicko_ime` varchar(20) COLLATE utf8_bin NOT NULL,
  `vrsta_naloga` varchar(20) COLLATE utf8_bin NOT NULL,
  `datum_registracije` datetime(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `nalog`
--

INSERT INTO `nalog` (`id_nalog`, `korisnicko_ime`, `vrsta_naloga`, `datum_registracije`) VALUES
(1, 'aca88', 'premium', '2015-09-22 08:10:00.000000'),
(2, 'duck9', 'normal', '2016-08-24 16:27:12.000000'),
(3, 'mob16', 'normal', '2016-08-31 05:09:22.000000'),
(4, 'lala54', 'premium', '2017-02-06 20:23:07.000000');

-- --------------------------------------------------------

--
-- Table structure for table `ocena`
--

CREATE TABLE `ocena` (
  `id_ocena` int(11) NOT NULL,
  `ocena_o` varchar(20) COLLATE utf8_bin NOT NULL,
  `komentar` varchar(100) COLLATE utf8_bin NOT NULL,
  `verzija` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ocena`
--

INSERT INTO `ocena` (`id_ocena`, `ocena_o`, `komentar`, `verzija`) VALUES
(1, 'Prosecno', 'Nije losa aplikacija/program, ima po koji bug.', 'V.01'),
(2, 'Dobro', 'Odlicno radi, veoma sam zadovoljan sa Waka aplikacijom. Ovako nesto mi je bas bilo potrebno', 'V.03'),
(3, 'Lose', 'Previse je komplikovana za koriscenje, pored lepog izgleda ne vidim razliku od vibera.', 'V.02'),
(4, 'Dobro', 'Dobar program, zadovoljan sam, nastavicu da ga koristim.', 'V.03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `nalog`
--
ALTER TABLE `nalog`
  ADD PRIMARY KEY (`id_nalog`);

--
-- Indexes for table `ocena`
--
ALTER TABLE `ocena`
  ADD PRIMARY KEY (`id_ocena`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `nalog`
--
ALTER TABLE `nalog`
  MODIFY `id_nalog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ocena`
--
ALTER TABLE `ocena`
  MODIFY `id_ocena` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
