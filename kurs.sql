-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2023 at 01:14 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kurs`
--

-- --------------------------------------------------------

--
-- Table structure for table `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL,
  `site_baslik` varchar(300) NOT NULL,
  `site_aciklama` varchar(500) NOT NULL,
  `site_sahibi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `site_baslik`, `site_aciklama`, `site_sahibi`) VALUES
(1, 'Sipariş', 'Siparis Takip Scripti', 'Taner Aşkar');

-- --------------------------------------------------------

--
-- Table structure for table `kullanici`
--

CREATE TABLE `kullanici` (
  `kul_id` int(11) NOT NULL,
  `kul_isim` varchar(200) NOT NULL,
  `kul_mail` varchar(300) NOT NULL,
  `kul_sifre` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kullanici`
--

INSERT INTO `kullanici` (`kul_id`, `kul_isim`, `kul_mail`, `kul_sifre`) VALUES
(1, 'Taner', 'tanerr.ask@gmail.com', 123);

-- --------------------------------------------------------

--
-- Table structure for table `proje`
--

CREATE TABLE `proje` (
  `proje_id` int(11) NOT NULL,
  `proje_baslik` varchar(250) NOT NULL,
  `proje_teslim_tarihi` date NOT NULL,
  `proje_aciliyet` varchar(50) NOT NULL,
  `proje_durum` varchar(50) NOT NULL,
  `proje_detay` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proje`
--

INSERT INTO `proje` (`proje_id`, `proje_baslik`, `proje_teslim_tarihi`, `proje_aciliyet`, `proje_durum`, `proje_detay`) VALUES
(13, 'örnek proje 3', '2022-11-04', 'Acelesi Yok', 'Bitti', ''),
(14, 'örnek proje 2', '2022-10-28', 'Acil', 'Yeni Başladı', ''),
(15, 'örnek proje 1', '2022-10-28', 'Normal', 'Devam Ediyor', ''),
(33, 'örnek proje 4', '2022-11-10', 'Normal', 'Yeni Başladı', ''),
(34, 'örnek proje 5', '2022-11-11', 'Acelesi Yok', 'Bitti', '<p>&ouml;rnek proje 5</p>\r\n'),
(35, 'örnek proje 6', '2022-11-10', 'Acil', 'Yeni Başladı', '<p>&ouml;rnek proje 6</p>\r\n'),
(116, 'debme', '2023-01-15', 'Acelesi Yok', 'Yeni Başladı', '<p>fsaf</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `siparis`
--

CREATE TABLE `siparis` (
  `sip_id` int(11) NOT NULL,
  `musteri_isim` varchar(200) NOT NULL,
  `musteri_mail` varchar(300) NOT NULL,
  `musteri_telefon` bigint(20) NOT NULL,
  `sip_baslik` varchar(400) NOT NULL,
  `sip_teslim_tarihi` date NOT NULL,
  `sip_aciliyet` varchar(50) NOT NULL,
  `sip_durum` varchar(100) NOT NULL,
  `sip_detay` varchar(2000) NOT NULL,
  `sip_ucret` bigint(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `siparis`
--

INSERT INTO `siparis` (`sip_id`, `musteri_isim`, `musteri_mail`, `musteri_telefon`, `sip_baslik`, `sip_teslim_tarihi`, `sip_aciliyet`, `sip_durum`, `sip_detay`, `sip_ucret`) VALUES
(7, 'müşteri 1', 'müsteri mail', 1111111, 'örnek sipariş 1', '2022-11-10', 'Acil', 'Yeni Başladı', '<p>&ouml;rnek sipariş 1</p>\r\n', 100),
(8, 'müşteri 2', 'müsteri mail', 2222222, 'örnek sipariş 2', '2022-11-17', 'Acelesi Yok', 'Devam Ediyor', '<p>&ouml;rnek sipariş 2</p>\r\n', 222),
(9, 'müşteri 3', 'müsteri mail', 3333, 'örnek sipariş 3', '2022-11-10', 'Acil', 'Bitti', '<p>&ouml;rnek sipariş3</p>\r\n', 33),
(10, 'müşteri 4', 'müsteri mail', 4444, 'örnek sipariş 4', '2022-11-17', 'Normal', 'Yeni Başladı', '<p>&ouml;rnek sipariş 4</p>\r\n', 44),
(11, 'müşteri 5', 'müsteri mail', 5555, 'örnek sipariş 5', '2022-11-10', 'Acil', 'Yeni Başladı', '<p>&ouml;rnek sipariş 5</p>\r\n', 555);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kul_id`);

--
-- Indexes for table `proje`
--
ALTER TABLE `proje`
  ADD PRIMARY KEY (`proje_id`);

--
-- Indexes for table `siparis`
--
ALTER TABLE `siparis`
  ADD PRIMARY KEY (`sip_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `proje`
--
ALTER TABLE `proje`
  MODIFY `proje_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `siparis`
--
ALTER TABLE `siparis`
  MODIFY `sip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
