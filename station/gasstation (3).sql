-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2023 at 08:49 PM
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
-- Database: `gasstation`
--

-- --------------------------------------------------------

--
-- Table structure for table `pumpe`
--

CREATE TABLE `pumpe` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL,
  `benzin95_cijena` varchar(255) NOT NULL,
  `benzin98_cijena` varchar(255) NOT NULL,
  `dizel_cijena` varchar(255) NOT NULL,
  `plin_cijena` varchar(255) NOT NULL,
  `broj_radnika` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pumpe`
--

INSERT INTO `pumpe` (`id`, `naziv`, `benzin95_cijena`, `benzin98_cijena`, `dizel_cijena`, `plin_cijena`, `broj_radnika`) VALUES
(1, 'Hifa', '2.00 KM', '2.00 KM', '2333 KM', '1.00', 2),
(3, 'Guber', '2,5 KM', '2,43 KM', '2,33 KM', '1,36 KM', 2),
(4, 'Nis', '2,52 KM', '2,35 KM', '2,65 KM', '1,33 KM', 2);

-- --------------------------------------------------------

--
-- Table structure for table `radnici`
--

CREATE TABLE `radnici` (
  `id` int(11) UNSIGNED NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sifra` char(60) NOT NULL,
  `naziv_pumpe` varchar(100) NOT NULL,
  `godine_staza` varchar(10) NOT NULL,
  `plata` varchar(25) NOT NULL,
  `dani_godisnjeg` varchar(255) NOT NULL,
  `odobreno` tinyint(1) NOT NULL DEFAULT 0,
  `kreirano` timestamp NOT NULL DEFAULT current_timestamp(),
  `obnovljeno` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` varchar(20) NOT NULL DEFAULT 'radnik'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `radnici`
--

INSERT INTO `radnici` (`id`, `ime`, `prezime`, `email`, `sifra`, `naziv_pumpe`, `godine_staza`, `plata`, `dani_godisnjeg`, `odobreno`, `kreirano`, `obnovljeno`, `role`) VALUES
(1, 'John', 'Doe', 'johndoe@example.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'ABC', '5', '2500', '20', 1, '2023-04-09 14:34:13', '2023-04-09 14:34:13', 'radnik'),
(2, 'Admin', 'Admin', 'admin@rocketmail.com', '12345', 'Centrala', '', '', '', 1, '2023-03-30 20:57:28', '2023-04-04 20:08:41', 'admin'),
(4, 'Natasa', 'Tomic', 'nata@gmail.com', '$2y$10$IWDBFKX3BkKWSCf28X.BWOjyfTziHREYNP33y7YAMf43E5DiWPjUq', 'Hifa Petrol', '', '', '', 1, '2023-04-05 17:55:20', '2023-04-05 18:10:23', 'admin'),
(5, 'Dragan', 'Vujic', 'draganvujic29@gmail.com', '', 'Hifa', '30', '3000', '160', 1, '2023-04-05 19:54:20', '2023-04-09 14:59:57', 'radnik'),
(6, 'Steven', 'Gerrard', 'gerrard@gmail.com', '$2y$10$nPEZg8LvXQiYcVCoBHf9kuKCaUfGoOHTt2NKWLY.fCDEMMLweHL1q', 'Hifa', '22', '1000 KM', '23', 1, '2023-04-05 19:57:03', '2023-04-09 12:25:49', 'radnik'),
(7, 'suba', 'subic', 'suba@gmail.com', '123', 'Hifa', '32', '1400 KM', '3', 1, '2023-04-05 20:08:12', '2023-04-09 14:59:45', 'radnik'),
(8, 'Pablo', 'Escobar', 'don@gmail.com', '$2y$10$BunXCnJE107BVuVm8RM1fenQ/I.8/vKchEhGfFynlpwnIlD0M73ri', 'Nis', '33', '34', '32', 1, '2023-04-06 16:36:00', '2023-04-09 14:59:33', 'radnik'),
(9, 'Katarina', 'Matic', 'valkira95@hotmail.com', '$2y$10$pD4KxuT0eNV/A1qS1VnXKuHv4XtOE1fbMd3ifUpGHoFWdzrUKAAuy', 'Guber', '2', '1500 KM', '32', 1, '2023-04-06 17:04:50', '2023-04-09 14:41:41', 'radnik'),
(10, 'Pablito', 'Pablo', 'pablo@gmail.com', '123', 'Hifa', '22', '1300 KM', '12', 1, '2023-04-06 17:17:48', '2023-04-09 14:40:37', 'radnik'),
(11, 'Nevena', 'Vukic', 'nevena@gmail.com', '111', 'Guber', '6', '900 KM', '22', 1, '2023-04-09 09:31:06', '2023-04-09 14:40:23', 'radnik'),
(12, 'Sonja', 'Katic', 'sonja@gmail.com', '$2y$10$ZC6YXmNfV6snOiDlgXYphuIDJY5Qvi4ECuWZL3P0yjLhIJSgxvJ82', 'Guber', '3', '2900', '22', 1, '2023-04-09 14:36:03', '2023-04-09 14:40:08', 'radnik'),
(13, 'Petar', 'Mrkonjic', 'pero@gmail.com', '$2y$10$G/g2oZ2uv6EkrL/B6P2oBOmy35I3CfB7xz96zE03Kq90g3uaviomm', 'Guber', '', '', '', 1, '2023-04-09 15:14:45', '2023-04-09 15:15:18', 'radnik'),
(14, 'Bogdan', 'Bogdanovic', 'bole123@gmail.com', '$2y$10$xHEIaRwwnyoh/q6dAvmaLe/lIGYQVSE6ix/sEcjF63no5awenXyVG', 'Guber', '', '', '', 0, '2023-04-09 17:14:10', '2023-04-09 17:14:10', 'radnik'),
(15, 'Nikola', 'Bogdanovic', 'nikson@gmail.com', '$2y$10$iA8.mFSQvknHMshe2aPd9.dI3l4uQ0essTRcwshL2kC2Lkm7RNKde', 'Guber', '', '', '', 0, '2023-04-09 17:14:56', '2023-04-09 17:14:56', 'radnik'),
(16, 'Sava', 'Savanovic', 'sava@gmail.com', '$2y$10$eY0uCJjgiR2wpzsNkVzUhOkPUU71KZpmt.QBl0cV4NoolzNV2k4RK', 'Hifa', '22', '900 KM', '22', 1, '2023-04-09 17:15:33', '2023-04-09 17:35:21', 'radnik'),
(17, 'Jovana', 'Jugovic', 'jugo@gmail.com', '$2y$10$6vnB5GwitqlpDzFOgCKGAe9YPW/IrYseBzX2Niazt4nomz0Idiwpq', 'Guber', '11', '1300 KM', '12', -1, '2023-04-09 17:18:06', '2023-04-09 17:35:41', 'radnik'),
(18, 'Jovana', 'Jotanovic', 'jota@gmail.com', '$2y$10$G6QPTANWE6gpwOUaOMHPt.2LnzphEbaVkGnbOCB7FHzCRQzwzRSuG', 'Guber', '', '', '', 0, '2023-04-09 17:18:44', '2023-04-09 17:18:44', 'radnik'),
(19, 'Bozidar', 'Sikanjic', 'bozo@gmail.com', '$2y$10$UCSE98Qh.Pz2/z/RoS7L0OIz1EtC0JvoOUI5sPJAZDuGxT9tmTwNO', 'Hifa', '', '', '', 0, '2023-04-09 17:34:43', '2023-04-09 17:34:43', 'radnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pumpe`
--
ALTER TABLE `pumpe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `radnici`
--
ALTER TABLE `radnici`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pumpe`
--
ALTER TABLE `pumpe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `radnici`
--
ALTER TABLE `radnici`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
