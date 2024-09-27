-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 12:12 AM
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
-- Database: `prigovaralica`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `ime` varchar(35) NOT NULL,
  `prezime` varchar(35) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `lozinka` varchar(35) NOT NULL,
  `uloga` varchar(10) NOT NULL,
  `spol` char(1) NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `prezime`, `username`, `email`, `lozinka`, `uloga`, `spol`, `birthday`) VALUES
(1, 'Kristijan', 'Danilović', 'kdanilovic', 'kdanilovic.de@gmail.com', 'admin811', 'admin', 'M', '2002-11-08'),
(2, 'Martin', 'Marijanović', 'martin_marijanovic', 'martin.marijanovic@gmail.com', '123', 'user', 'M', '2023-01-25'),
(3, 'Željka', 'Babić', 'ljepa_zeljka', 'zeljka@hotmail.com', '123', 'user', 'Z', '2023-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `objave`
--

CREATE TABLE `objave` (
  `id` int(11) NOT NULL,
  `naslov` int(60) NOT NULL,
  `opis` varchar(300) NOT NULL,
  `slika` varchar(200) NOT NULL,
  `autor` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `objave`
--
ALTER TABLE `objave`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
