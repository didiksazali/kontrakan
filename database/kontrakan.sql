-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2017 at 04:21 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kontrakan`
--
CREATE DATABASE IF NOT EXISTS `kontrakan` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kontrakan`;

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE IF NOT EXISTS `kamar` (
  `kode_kamar` varchar(5) NOT NULL,
  `nama_kamar` varchar(35) NOT NULL,
  `tarif_normal` int(10) NOT NULL,
  `tarif_khusus` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`kode_kamar`, `nama_kamar`, `tarif_normal`, `tarif_khusus`) VALUES
('KMP1', 'Kamar Pria Kelas 1', 30000, 20000),
('KMP2', 'Kamar Pria Kelas 2', 27000, 18000),
('KMW1', 'Kamar Wanita Kelas 1', 32000, 28000),
('KMW2', 'Kamar Wanita Kelas 2', 29000, 26000);

-- --------------------------------------------------------

--
-- Table structure for table `orang`
--

CREATE TABLE IF NOT EXISTS `orang` (
`id_orang` int(11) NOT NULL,
  `nama_orang` varchar(35) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `orang`
--

INSERT INTO `orang` (`id_orang`, `nama_orang`, `jenis_kelamin`) VALUES
(6, 'Didik Sazali', 'Laki-laki'),
(7, 'Ratna Yulia', 'Perempuan'),
(14, 'Ardi S', 'Laki-laki'),
(15, 'Novella', 'Perempuan'),
(19, 'Sunaryo', 'Laki-laki');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
`id_transaksi` int(11) NOT NULL,
  `id_orang` int(11) NOT NULL,
  `kode_kamar` varchar(5) NOT NULL,
  `lama_inap` int(11) NOT NULL,
  `fasilitas_tambahan` varchar(80) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_orang`, `kode_kamar`, `lama_inap`, `fasilitas_tambahan`) VALUES
(1, 6, 'KMP1', 10, 'Lemari, Kursi, Kipas Angin'),
(2, 7, 'KMW1', 12, 'Lemari'),
(10, 14, 'KMP1', 5, 'Kipas Angin'),
(14, 15, 'KMW2', 3, 'Lemari, Kursi, Kipas Angin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
 ADD PRIMARY KEY (`kode_kamar`), ADD KEY `kode_kamar` (`kode_kamar`);

--
-- Indexes for table `orang`
--
ALTER TABLE `orang`
 ADD PRIMARY KEY (`id_orang`), ADD KEY `id_jenis_kelamin_2` (`jenis_kelamin`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
 ADD PRIMARY KEY (`id_transaksi`), ADD KEY `id_orang` (`id_orang`), ADD KEY `kode_kamar` (`kode_kamar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orang`
--
ALTER TABLE `orang`
MODIFY `id_orang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_orang`) REFERENCES `orang` (`id_orang`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`kode_kamar`) REFERENCES `kamar` (`kode_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
