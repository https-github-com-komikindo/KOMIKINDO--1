-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 07:43 AM
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
-- Database: `pa_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', '', '$2y$10$LoX98CMcT7MRC0AkRO3ILOUdai5WlgIv/RCDEo8qSX17hSiFI/o5W');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(50) NOT NULL,
  `gmbr_judul` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `sinopsis` varchar(1200) NOT NULL,
  `eps` varchar(255) NOT NULL,
  `link_eps` varchar(255) NOT NULL,
  `produser` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `tgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `gmbr_judul`, `judul`, `sinopsis`, `eps`, `link_eps`, `produser`, `rating`, `tgl`) VALUES
(33, '1-attack of titan.jpg', 'Shingeki No Kyojin', 'Manga Shingeki no Kyojin yang dibuat oleh komikus bernama Isayama Hajime ini bercerita tentang Beberapa ratus tahun yang lalu, manusia hampir dimusnahkan oleh para Titan. Titans biasanya bertingkat beberapa, tampaknya tidak memiliki kecerdasan, melahap manusia dan, yang terburuk, tampaknya melakukannya untuk kesenangan daripada sebagai sumber makanan. Sebagian kecil umat manusia bertahan dengan menembok diri di kota yang dilindungi oleh tembok yang sangat tinggi, bahkan lebih tinggi dari Titan yang terbesar. Flash ke depan hingga saat ini dan distrik selatan Shinganshina belum pernah melihat Titan selama lebih dari 100 tahun. Remaja laki-laki Eren dan saudara perempuan angkatnya Mikasa menyaksikan sesuatu yang mengerikan ketika salah satu tembok distrik luar dirusak oleh Titan setinggi 60 meter (196,85 kaki) yang menyebabkan tembok pecah. Saat Titans yang lebih kecil membanjiri kota, kedua anak itu menyaksikan dengan ngeri peristiwa tragis yang mengikutinya, saat Titans melahap orang tanpa mengetahui. Eren bersumpah bahwa dia akan memusnahkan setiap Titan dan membalas dendam untuk seluruh umat manusia.', '138.1', 'https://komikindo.id/shingeki-no-kyojin-chapter-138-1/', 'Isayama & Hajime', '9.1', '2022-11-14 14:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `isi` varchar(255) NOT NULL,
  `waktu` date NOT NULL,
  `id_judul` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `nama`, `isi`, `waktu`, `id_judul`) VALUES
(17, 'jnakjdnkjsd', 'asdn fkasdf', '2022-11-13', 29),
(18, 'yosua', 'wey', '2022-11-13', 29),
(19, '', 'haolo', '2022-11-13', 30),
(20, 'Wina', 'Ahhh Kawainee', '2022-11-14', 32);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(3, 'said', '', '$2y$10$bE09yCZv6Zd7dzIrJ209t.bcJr6t8bAk9vq5i68xXXy6m3Un3IgfC'),
(4, 'yosua', '', '$2y$10$On8KxCm6UumPa/4/C79JnOS6N5OwCs.FmHSgMHZ3TAPQYklROBOSO'),
(5, 'novi', '', '$2y$10$lV2RzK55vM9KWOwuhv013uV1JW2Hol9QRIcOj5Q5sbD6j12y7aPpG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
