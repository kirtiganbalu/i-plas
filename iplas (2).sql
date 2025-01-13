-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 07:29 PM
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
-- Database: `iplas`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `status`) VALUES
(1, 'admin', 'admin123', 'admin'),
(2, 'user', 'user123', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `id_student_attendance` int(11) NOT NULL,
  `id_stud_rec` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`id_student_attendance`, `id_stud_rec`, `created_date`, `created_time`) VALUES
(3, 1, '2024-02-17', '11:50:03'),
(4, 1, '2024-03-17', '11:50:42'),
(5, 2, '2024-03-17', '11:55:48'),
(6, 2, '2024-03-18', '11:45:11'),
(7, 2, '2024-03-19', '02:42:27'),
(8, 1, '2024-03-19', '02:42:40'),
(9, 1, '2024-03-19', '10:23:45'),
(10, 2, '2024-03-19', '10:43:46'),
(11, 5, '2024-03-21', '01:24:30'),
(12, 6, '2024-03-21', '01:24:40'),
(13, 2, '2024-03-21', '01:26:04'),
(14, 1, '2024-03-26', '10:54:04'),
(15, 23, '2024-03-26', '11:07:20'),
(16, 1, '2024-03-26', '12:55:14'),
(17, 2, '2024-03-26', '12:59:33'),
(18, 1, '2024-03-26', '01:04:18'),
(19, 2, '2024-03-26', '01:25:44'),
(20, 1, '2024-03-26', '03:39:20'),
(21, 3, '2024-03-28', '01:19:40'),
(22, 2, '2024-03-30', '11:32:38'),
(23, 3, '2024-03-30', '11:33:05'),
(24, 2, '2024-03-30', '11:33:47'),
(25, 2, '2024-03-30', '11:43:48'),
(26, 2, '2024-03-30', '11:47:06'),
(27, 2, '2024-03-31', '12:39:34'),
(28, 2, '2024-03-31', '02:03:14'),
(29, 2, '2024-03-31', '02:03:57'),
(30, 1, '2024-04-02', '03:16:45'),
(31, 1, '2024-04-03', '02:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `stud_rec`
--

CREATE TABLE `stud_rec` (
  `id` int(100) NOT NULL,
  `ic` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `category` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stud_rec`
--

INSERT INTO `stud_rec` (`id`, `ic`, `name`, `gender`, `department`, `category`) VALUES
(1, '030115110312', 'CHE WAN AIDA NURINA BINTI CHE WAN ZAINUDIN', 'FEMALE', 'JTMK', 'STUDENT'),
(2, '031225110078', 'NUR QHAIRUNNISA HUMAIRA BINTI AZMAN', 'FEMALE', 'JTMK', 'STUDENT'),
(3, '810417035159', 'WAN SALMIZI BIN WAN MAHMOOD', 'MALE', 'JTMK', 'STAFF'),
(4, '030221060398', 'SITI SUMAYYAH BINTI JAMALUDDIN', 'FEMALE', 'JTMK', 'STUDENT'),
(5, '030607110788', 'SITI ZAHARAH BIN AZMI', 'FEMALE', 'JKE', 'STUDENT'),
(6, '040507107781', 'AHMAD DANIAL BIN ASRI', 'MALE', 'JKA', 'STAFF'),
(7, '030518112534', 'NUR QISTINA HAFIFIE BINTI AZMAN', 'FEMALE', 'JKM', 'STUDENT');

-- --------------------------------------------------------

--
-- Table structure for table `tblasrama`
--

CREATE TABLE `tblasrama` (
  `nokp` int(100) NOT NULL,
  `nopend` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `jbtn` varchar(100) NOT NULL,
  `jantina` varchar(100) NOT NULL,
  `stsbilik` varchar(100) NOT NULL,
  `blok` varchar(100) NOT NULL,
  `paras` varchar(100) NOT NULL,
  `nobilik` varchar(100) NOT NULL,
  `sesisemasa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`id_student_attendance`);

--
-- Indexes for table `stud_rec`
--
ALTER TABLE `stud_rec`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `id_student_attendance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `stud_rec`
--
ALTER TABLE `stud_rec`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
