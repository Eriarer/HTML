-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2023 at 04:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `05-hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `Num_Hab` int(11) NOT NULL,
  `Nom_paciente` char(150) NOT NULL,
  `diagnostico` text NOT NULL,
  `Nom_Medico` char(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`Num_Hab`, `Nom_paciente`, `diagnostico`, `Nom_Medico`) VALUES
(1, 'Eri Melgoza de la Torre', 'Dolor de cabeza', 'Carlitos'),
(2, 'Paciente2', 'Diagnostico2', 'Medico2'),
(3, 'Paciente3', 'Diagnostico3', 'Medico3'),
(4, 'Paciente4', 'Diagnostico4', 'Medico4'),
(5, 'Paciente5', 'Diagnostico5', 'Medico5'),
(6, 'Paciente6', 'Diagnostico6', 'Medico6'),
(7, 'Paciente7', 'Diagnostico7', 'Medico7'),
(8, 'Paciente8', 'Diagnostico8', 'Medico8'),
(9, 'Paciente9', 'Diagnostico9', 'Medico9'),
(10, 'Paciente10', 'Diagnostico10', 'Medico10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`Num_Hab`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
