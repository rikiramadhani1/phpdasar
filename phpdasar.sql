-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 01, 2020 at 05:24 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `katalog_buku`
--

CREATE TABLE `katalog_buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `tahun_terbit` int(4) DEFAULT NULL,
  `penerbit` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `katalog_buku`
--

INSERT INTO `katalog_buku` (`id`, `judul`, `kategori`, `pengarang`, `tahun_terbit`, `penerbit`, `gambar`) VALUES
(1, 'C++ dan penerapannya', 'Pemrograman', 'Riki Ramadhani', 2005, 'Riki Corp', 'cpp.jpg'),
(5, 'Pemrograman Database dengan Delphi7 Menggunakan Access ADO', 'Pemrograman', 'Abdul Kadir', 2004, 'Andi', 'delphi7.jpg'),
(14, '100 Tokoh', 'Sejarah', 'Alwi', 2020, 'PT. Alwi', 'tokoh.jpg'),
(17, 'detektif riki', 'Komik', 'Riki', 2020, 'Riki Corp', ''),
(18, 'asd', 'awd', 'asasd', 2010, 'asd', '5e03500c62619.jpg'),
(19, 'sadasas', 'ASDAS', 'asd', 0, 'asd', ''),
(20, 'asdasd', 'asdd', 'sdff', 0, 'sdf', ''),
(21, 'ini', 'apa', 'yaaa', 2010, 'ini yaaa', '5e0c18fe0e5bb.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'riki', '$2y$10$GOi0E55re1192ixm/YUxHOXq6yby9KxUTUnwq3.JXBSVNfICq5bae'),
(2, 'ramadhani', '$2y$10$mezDQ7iwN8tYojP8BxHnK.chDMKohn7oPmFQnFbiMlBI.RjcRYhMS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `katalog_buku`
--
ALTER TABLE `katalog_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `katalog_buku`
--
ALTER TABLE `katalog_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
