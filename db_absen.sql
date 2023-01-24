-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2023 at 07:55 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absen`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `user_id` int(5) NOT NULL,
  `tgl` varchar(255) DEFAULT NULL,
  `jam_masuk` varchar(255) DEFAULT NULL,
  `jam_keluar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `user_id`, `tgl`, `jam_masuk`, `jam_keluar`) VALUES
(27, 920, '2023-01-20', '02:39:51', NULL),
(28, 101, '2023-01-19', '06:00:00', NULL),
(29, 930, '2023-01-20', '09:17:38', NULL),
(30, 101, '2023-017', '09:00:00', NULL),
(31, 101, '2023-01-20', '09:19:18', '09:19:45'),
(32, 101, '2023-01-21', '22:57:51', NULL),
(33, 920, '2023-01-21', '23:25:53', NULL),
(34, 103, '2023-01-22', '12:35:26', NULL),
(35, 101, '2023-01-22', '17:58:27', NULL),
(36, 102, '2023-01-22', '22:47:00', NULL),
(37, 101, '2023-01-23', '10:13:11', NULL),
(38, 101, '2023-01-24', '00:30:15', '00:30:19'),
(39, 102, '2023-01-24', '00:30:29', NULL),
(40, 103, '2023-01-24', '14:23:42', NULL),
(41, 103, '2023-01-25', '01:49:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dayoff`
--

CREATE TABLE `dayoff` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_date` varchar(10) NOT NULL,
  `end_date` varchar(10) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT '"Pending"'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dayoff`
--

INSERT INTO `dayoff` (`id`, `user_id`, `start_date`, `end_date`, `purpose`, `status`) VALUES
(42, 101, '2023-01-30', '2023-01-31', 'holiday', 'Rejected'),
(43, 102, '2023-01-30', '2023-01-31', 'holiday', 'Approved'),
(44, 103, '2023-01-30', '2023-01-31', 'wisuda', 'Approved'),
(45, 105, '2023-02-01', '2023-02-05', 'seminar', 'Pending'),
(46, 105, '2023-02-10', '2023-02-20', 'dinas luar', 'Pending'),
(47, 105, '2023-01-30', '2023-01-31', 'cuti', 'Approve'),
(48, 105, '2023-01-30', '2023-01-31', 'holiday', 'Approve'),
(49, 105, '2023-01-30', '2023-01-31', 'wisuda', 'Approve'),
(50, 101, '2023-01-30', '2023-01-31', 'wisuda', 'Rejected'),
(51, 101, '2023-01-30', '2023-01-31', 'wisuda', 'Approved'),
(52, 105, '2023-01-30', '2023-01-31', 'sakit', 'Approve'),
(53, 105, '2023-01-30', '2023-01-31', 'bolos', 'Approve'),
(54, 103, '2023-02-01', '2023-02-05', 'lebaran', 'Rejected'),
(55, 102, '2023-01-30', '2023-01-31', 'wisuda', 'Rejected'),
(56, 103, '2023-01-30', '2023-01-31', 'wisuda', 'Pending'),
(57, 102, '2023-01-30', '2023-01-31', 'imlek', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` int(8) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `password`, `nama_lengkap`, `role`) VALUES
(5, 920, 'admin123', 'joji', 'admin'),
(12, 930, 'admin123', 'irma yanti', 'admin'),
(27, 101, '123', 'galung', 'user'),
(31, 102, '123', 'ibnu soleh', 'user'),
(32, 103, '123', 'gatot kaca', 'personalia'),
(33, 105, '123', 'samsul', 'helper');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `dayoff`
--
ALTER TABLE `dayoff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `dayoff`
--
ALTER TABLE `dayoff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dayoff`
--
ALTER TABLE `dayoff`
  ADD CONSTRAINT `dayoff_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
