-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 03:33 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendidikan`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `id_guru` int(20) NOT NULL,
  `DateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama`, `kode`, `id_guru`, `DateTime`) VALUES
(3, 'Test', 'c12e', 1, '2023-06-25 00:14:04'),
(4, 'MTK', '2056', 7, '2023-06-25 03:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `kelasuser`
--

CREATE TABLE `kelasuser` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kodekelas` varchar(100) NOT NULL,
  `DateTime` varchar(20) NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelasuser`
--

INSERT INTO `kelasuser` (`id`, `id_user`, `kodekelas`, `DateTime`) VALUES
(6, 3, 'c12e', '2023-06-25 01:11:57'),
(7, 8, '2056', '2023-06-25 03:16:28');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_tugas`, `id_user`, `nilai`) VALUES
(6, 1, 1, 100),
(7, 1, 8, 50);

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `id_tugas` varchar(10) NOT NULL,
  `soal` text NOT NULL,
  `a` varchar(60) NOT NULL,
  `b` varchar(60) NOT NULL,
  `c` varchar(60) NOT NULL,
  `d` varchar(60) NOT NULL,
  `jwb_benar` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `id_tugas`, `soal`, `a`, `b`, `c`, `d`, `jwb_benar`) VALUES
(12, '1', '1+1=', '2', '3', '4', '5', 'a'),
(13, '1', '2+2', '5', '4', '2', '1', 'b'),
(14, '3', '1+1=', '2', '3', '4', '5', 'a'),
(15, '3', '2+2', '5', '4', '2', '1', 'b'),
(16, '5', '1+1=', '2', '3', '4', '1', 'a'),
(17, '6', '1+1=', '2', '3', '4', '1', 'a'),
(18, '7', '1+1=', '2', '3', '4', '1', 'a'),
(19, '8', '1+1=', '2', '3', '4', '1', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `id_kelas` int(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `deadline` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Belum Upload',
  `DateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `id_kelas`, `judul`, `deskripsi`, `deadline`, `status`, `DateTime`) VALUES
(1, 2, 'aaa', 'aaa', '2023-06-30', 'Uploaded', '2023-06-24 11:09:36'),
(3, 2, 'ss', 'sdsadsdasd', '2023-06-21', 'Uploaded', '2023-06-24 15:28:03'),
(8, 4, 'Perkalian', 'kerjakan dengan jujur dan teliti', '2023-06-30', 'Uploaded', '2023-06-25 03:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `Username`, `Password`, `Role`) VALUES
(1, 'a', '$2y$10$B36CV0U5Yjrjk3bWJCP4yuzy..LaaRPLE/wNLW7fKvjhOeYSwdETu', 'guru'),
(3, 'k', '$2y$10$ihP0S3967bYYVfG8rVAwnO.fiFmO6fM7ARqF662jW4XQ1nvuW0ETy', 'murid'),
(6, 's', '$2y$10$AKvgNRmAR9BxsWGbRhnJY.W/F4Ru9fBu2rSwE6locainW8Qp07mtu', 'murid'),
(7, 'guru', '$2y$10$45luSIrJwzgUmEuBEEgRV.cn5cEMXg4tfNaNTQyr/zmQvfweO8xj6', 'guru'),
(8, 'murid', '$2y$10$xWpVYqSGls6W2ThvKpxE5.Ai6r51FcLMYOL4OG3zsZr6NfCMKDULu', 'murid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kelasuser`
--
ALTER TABLE `kelasuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelasuser`
--
ALTER TABLE `kelasuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
