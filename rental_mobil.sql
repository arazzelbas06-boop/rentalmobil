-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2026 at 09:05 AM
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
-- Database: `rental_mobil`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sewa_mobil` (IN `p_id_user` INT, IN `p_id_mobil` INT, IN `p_jumlah` INT)   BEGIN

   INSERT INTO penyewaan(
       id_user,
       id_mobil,
       jumlah_sewa,
       tanggal_sewa
   )
   VALUES(
       p_id_user,
       p_id_mobil,
       p_jumlah,
       CURDATE()
   );

   UPDATE mobil
   SET jumlah = jumlah - p_jumlah
   WHERE id_mobil = p_id_mobil;

END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `status_mobil` (`jumlah` INT) RETURNS VARCHAR(20) CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN

   DECLARE hasil VARCHAR(20);

   IF jumlah <= 0 THEN
       SET hasil = 'Tidak Tersedia';
   ELSE
       SET hasil = 'Tersedia';
   END IF;

   RETURN hasil;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `nama_mobil` varchar(100) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `kondisi` varchar(50) DEFAULT NULL,
  `harga_sewa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `nama_mobil`, `jumlah`, `kondisi`, `harga_sewa`) VALUES
(16, 'Honda Brio', 4, 'Baik', 250000),
(17, 'Toyota Innova', 3, 'Baik', 450000),
(18, 'Mitsubishi Pajero', 2, 'Sangat Baik', 800000),
(22, 'Lamborghini', 1, 'Sangat Baik', 10000000),
(23, 'Toyota Avanza', 3, 'Sangat Baik', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `penyewaan`
--

CREATE TABLE `penyewaan` (
  `id_sewa` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_mobil` int(11) DEFAULT NULL,
  `jumlah_sewa` int(11) DEFAULT NULL,
  `tanggal_sewa` date DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Dipinjam',
  `tanggal_kembali` date DEFAULT NULL,
  `denda` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penyewaan`
--

INSERT INTO `penyewaan` (`id_sewa`, `id_user`, `id_mobil`, `jumlah_sewa`, `tanggal_sewa`, `status`, `tanggal_kembali`, `denda`) VALUES
(1, 2, 1, 2, '2026-05-15', 'Dikembalikan', '2026-05-20', 100000),
(2, 2, 15, 1, '2026-05-20', 'Dikembalikan', '2026-05-20', 0),
(3, 2, 16, 2, '2026-05-20', 'Dikembalikan', '2026-05-20', 0),
(4, 2, 17, 2, '2026-05-20', 'Dikembalikan', '2026-05-20', 0),
(5, 2, 16, 1, '2026-05-20', 'Dikembalikan', '2026-05-20', 0),
(6, 2, 22, 1, '2026-05-20', 'Dikembalikan', '2026-05-20', 0),
(7, 2, 22, 1, '2026-05-20', 'Dikembalikan', '2026-05-20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` enum('admin','penyewa') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `role`) VALUES
(1, 'Admin', 'admin', '123', 'admin'),
(2, 'Budi', 'budi', '123', 'penyewa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`id_sewa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `penyewaan`
--
ALTER TABLE `penyewaan`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
