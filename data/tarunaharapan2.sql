-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 22, 2017 at 11:58 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tarunaharapan2`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `bio` text NOT NULL,
  `id_jenis_kelamin` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `create_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `alamat`, `photo`, `bio`, `id_jenis_kelamin`, `email`, `tanggal_lahir`, `create_at`) VALUES
(1, 'Admin', 'Bandung', NULL, 'Aku Adalah Dia', 1, 'Fauzan98@gmail.com', '2017-09-10', 0),
(84, 'Muhammad Fauzan Noor Azhar', 'j', NULL, 'I\'m Programmer', 1, 'fauzanno98@gmail.com', '2017-09-21', 1505571668),
(93, 'operator', '', NULL, '', 1, '', '0000-00-00', 1505831408);

-- --------------------------------------------------------

--
-- Table structure for table `angkatan`
--

CREATE TABLE `angkatan` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angkatan`
--

INSERT INTO `angkatan` (`id`, `tahun`) VALUES
(15, 2011),
(16, 2012),
(17, 2013),
(18, 2014),
(19, 2015),
(20, 2016),
(21, 2017),
(22, 2018);

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `id_status_artikel` int(11) NOT NULL DEFAULT '1',
  `id_tag_artikel` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `populer` int(11) DEFAULT NULL,
  `create_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `create_at` int(11) NOT NULL,
  `update_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `id_status_artikel`, `id_tag_artikel`, `judul`, `isi`, `slug`, `gambar`, `populer`, `create_by`, `update_by`, `create_at`, `update_at`) VALUES
(76, 2, 4, 'Artikel Keempat', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. do eiusmod tempor incididunt ut labore et dolore magna aliqua.&nbsp;do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.&nbsp;</p>\r\n', 'artikel-keempat', 'photo31525848255.jpg', 24, 81, 81, 1505583434, 1505924306),
(78, 2, 2, 'Bagaimana Cara Membuat Artikel Dengan Baik 2', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. do eiusmod tempor incididunt ut labore et dolore magna aliqua.&nbsp;do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.&nbsp;</p>\r\n', 'asdasdasd', 'photo11525848100.png', 246, 81, 70, 1505584875, 1505988423),
(80, 2, 1, 'Artikel Tentang Penebangan Pohon Pohon Pohon', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. do eiusmod tempor incididunt ut labore et dolore magna aliqua.&nbsp;do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore&nbsp;</p>\r\n', 'artikel-tentang-penebangan-pohon', '', 26, 81, 0, 1505652451, 1505919257),
(81, 2, 2, 'Bagaimana Cara Membuat Artikel Dengan Baik', '<p>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. do eiusmod tempor incididunt ut labore et dolore magna aliqua.&nbsp;do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n', 'artikel-tidak-jelas', 'a1533807886.jpeg', 3, 70, 0, 1505918686, 1505924314),
(82, 2, 2, 'Bagaimana Cara Membuat Artikel Dengan Baik 3', '<p>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. do eiusmod tempor incididunt ut labore et dolore magna aliqua.&nbsp;do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n', 'bagaimana-cara-membuat-artikel-dengan-baik-3', 'cover11533808063.jpeg', 2, 70, 0, 1505918863, 1506003488),
(83, 2, 2, 'Artikel Yang Memiliki Judul Yang Sangat Panjang', '<p>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. do eiusmod tempor incididunt ut labore et dolore magna aliqua.&nbsp;do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n', 'artikel-yang-memiliki-judul-yang-sangat-panjang', 'c1533808148.jpeg', 1, 70, 0, 1505918948, 1506004449),
(84, 3, 2, 'Bagaimana Cara Membuat Aplikasi', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'bagaimana-cara-membuat-aplikasi', 'Screenshot from 2017-08-27 00-00-511536467662.png', NULL, 81, 0, 1505986462, 1505986511);

-- --------------------------------------------------------

--
-- Table structure for table `eskul`
--

CREATE TABLE `eskul` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `urutan` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `create_at` int(11) DEFAULT NULL,
  `update_at` int(11) DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eskul`
--

INSERT INTO `eskul` (`id`, `nama`, `urutan`, `gambar`, `create_at`, `update_at`, `create_by`, `keterangan`, `slug`) VALUES
(1, 'Taekwondo', 1, 'photo11525829346.png', 1505629063, 1505629746, 70, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'taekwondo'),
(2, 'Marching Band', 5, 'photo21525829366.png', 1505629676, 1505633456, 70, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'marching-band'),
(3, 'Osis', 2, 'photo41525829390.jpg', 1505629790, 1505630463, 70, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'osis'),
(4, 'Pramuka', 4, 'photo41525829413.jpg', 1505629813, 1505629813, 70, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'pramuka');

-- --------------------------------------------------------

--
-- Table structure for table `galeri_artikel`
--

CREATE TABLE `galeri_artikel` (
  `id` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama`, `nip`, `alamat`, `id_mapel`, `photo`) VALUES
(1, 'Meylani', '123.123.123', 'Ciptaharja', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id`, `nama`) VALUES
(1, 'Laki - Laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama`, `logo`) VALUES
(1, 'Rekayasa Perangkat Lunak', ''),
(2, 'Akutansi', ''),
(3, 'Pemasaran', ''),
(4, 'Teknik Kendaraan Ringan', ''),
(5, 'Teknik Sepeda Motor', '');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan_angkatan`
--

CREATE TABLE `jurusan_angkatan` (
  `id` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_angkatan` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `create_by` varchar(255) NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `create_at` int(11) NOT NULL,
  `update_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan_angkatan`
--

INSERT INTO `jurusan_angkatan` (`id`, `id_jurusan`, `id_angkatan`, `slug`, `create_by`, `update_by`, `create_at`, `update_at`) VALUES
(14, 1, 18, 'rekayasa-perangkat-lunak', 'admin', 'admin', 1505840894, 1505990797),
(15, 2, 17, 'akutansi', 'admin', 'admin', 1505842042, 1505842042),
(16, 2, 20, 'akutansi', 'admin', 'admin', 1505842303, 1505842303),
(17, 3, 19, 'pemasaran', 'admin', 'admin', 1505842382, 1505842382),
(18, 1, 16, 'rekayasa-perangkat-lunak', 'admin', 'admin', 1505926060, 1505926060),
(19, 1, 17, 'rekayasa-perangkat-lunak-2013', 'admin', 'admin', 1505990846, 1505990846);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `nama`) VALUES
(1, 'Matematika'),
(2, 'Bahasa Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan`
--

CREATE TABLE `pemeriksaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tambah` varchar(255) NOT NULL,
  `pembaruan` varchar(255) NOT NULL,
  `hapus` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`id`, `nama`, `tambah`, `pembaruan`, `hapus`, `tanggal`) VALUES
(110, 'admin', 'Menambahkan User operator2', '', '', '2017-09-21 21:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(11) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `posisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `nama`, `posisi`) VALUES
(1, 'Bergabung Bersama Taruna Harapan 1 Cipatat ', 1),
(2, 'Menjadi Siswa Yang Berprestasi Bersama Taruna Harapan', 3),
(3, 'Raihlah Mimpimu Bersama Taruna Harapan', 5),
(4, 'Lorem Ipsum Dolor Sit Amet ', 2),
(5, 'Lorem Ipsum Dolor Sit Amet ', 4),
(6, 'Lorem Ipsum Dolor Sit Amet ', 6),
(7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', 7),
(8, 'Berita Sekolah', 8),
(9, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', 9),
(10, 'Informasi Sekolah', 10),
(11, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', 11),
(12, 'Artikel Pengetahuan', 12),
(13, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', 13),
(14, 'Perekapan Data Sekolah', 14),
(15, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', 15),
(16, 'Informasi Sekolah', 16),
(17, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, ', 17),
(18, 'Raihlah Masa Depan mu', 18);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `rating` float DEFAULT NULL,
  `ip_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `id_artikel`, `rating`, `ip_user`) VALUES
(1, 38, 4, '123'),
(2, 38, 4, NULL),
(3, 38, 5, NULL),
(4, 38, 2, NULL),
(5, 38, 5, NULL),
(6, 38, 1, NULL),
(7, 38, 3, NULL),
(8, 38, 5, NULL),
(9, 38, 3, NULL),
(10, 38, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nama`) VALUES
(1, 'Admin'),
(2, 'Operator'),
(3, 'Anggota\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `id_jenis_kelamin` int(11) NOT NULL,
  `id_jurusan_angkatan` int(11) NOT NULL,
  `create_by` varchar(255) NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `create_at` int(11) NOT NULL,
  `update_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `nisn`, `alamat`, `photo`, `tanggal_lahir`, `status`, `id_jenis_kelamin`, `id_jurusan_angkatan`, `create_by`, `update_by`, `create_at`, `update_at`) VALUES
(67, 'Muhammad Fauzan Noor Azhar', '123123', 'Bandung', '', '1998-12-09', 2, 1, 14, 'admin', 'admin', 1505842617, 1505842617),
(68, 'Lorem Ipusm Dolor ', '1232131', 'Jakarta', '', '2017-09-03', 1, 2, 16, 'admin', 'admin', 1505842646, 1505842646),
(69, 'Fauzi', '12312', 'Jakarta', '', '2017-09-01', 1, 1, 17, 'admin', 'admin', 1505842709, 1505842709),
(70, 'Lorem Ipusm Dolor Amet', '13123', 'Alamat', '', '2017-09-01', 2, 1, 15, 'admin', 'admin', 1505885879, 1505885879),
(71, 'Nama Siswa Contoh', '1231', 'ahsbd', '', '2017-09-07', 1, 1, 17, 'admin', 'admin', 1505926004, 1505926004),
(72, 'Nama Siswa ', '1233', 'sdsadasd', '', '2017-09-19', 2, 2, 18, 'admin', 'admin', 1505926079, 1505926079);

-- --------------------------------------------------------

--
-- Table structure for table `status_artikel`
--

CREATE TABLE `status_artikel` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_artikel`
--

INSERT INTO `status_artikel` (`id`, `nama`) VALUES
(1, 'Proses'),
(2, 'Diterima'),
(3, 'Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `tag_artikel`
--

CREATE TABLE `tag_artikel` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag_artikel`
--

INSERT INTO `tag_artikel` (`id`, `nama`, `slug`) VALUES
(1, 'Informasi', 'informasi'),
(2, 'Teknologi', 'teknologi'),
(3, 'Jurusan', 'jurusan'),
(4, 'Umum', 'umum'),
(5, 'Kegiatan', 'kegiatan'),
(6, 'Tips', 'tips'),
(7, 'Ekstrakulikuler', 'ekstrakulikuler'),
(8, 'Lainnya', 'lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `tentang`
--

CREATE TABLE `tentang` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `create_by` varchar(255) NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `create_at` int(11) NOT NULL,
  `update_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tentang`
--

INSERT INTO `tentang` (`id`, `nama`, `isi`, `gambar`, `create_by`, `update_by`, `create_at`, `update_at`) VALUES
(14, 'Tentang', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'cover21533810927.png', 'Noor', 'admin', 1501863156, 1505922805),
(15, 'Visi', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut&nbsp;</p>\r\n', 'cover11533811780.jpeg', 'admin', 'admin', 1505922580, 1505922815),
(16, 'Misi', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut&nbsp;</p>\r\n', 'c1533811799.jpeg', 'admin', 'admin', 1505922599, 1505922828);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `model` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `nama_anggota` int(11) DEFAULT NULL,
  `create_at` int(11) NOT NULL,
  `update_at` int(11) NOT NULL,
  `last_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `model`, `status`, `id_role`, `nama_anggota`, `create_at`, `update_at`, `last_login`) VALUES
(70, 'admin', '$2y$13$IG4.SNf6dR33mi.gdXfKiu1rbgEKLH.mlZQ6ivHg.AGd9q0zSo1wm', 'Admin', 1, 1, 1, 1505549902, 0, 1505996404),
(81, 'noor', '$2y$13$w7yZL4QBriIsfs4XBvDTZexOwWyEXy5V6iONRU3ViFQgmgPG7QbLG', 'Anggota', 1, 3, 84, 1505571669, 0, 1505987783),
(89, 'operator', '$2y$13$mIBIEqSx2nLtozVGwsdNFeqE2jlhvwt81C877OPwYmY31zvSBwAua', 'Operator', 1, 2, 93, 1505831408, 0, 1506003814);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jenis_kelamin` (`id_jenis_kelamin`);

--
-- Indexes for table `angkatan`
--
ALTER TABLE `angkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_status_artikel` (`id_status_artikel`),
  ADD KEY `update_by` (`update_by`,`create_at`),
  ADD KEY `artikel_ibfk_2` (`create_by`),
  ADD KEY `id_tag_artikel` (`id_tag_artikel`);

--
-- Indexes for table `eskul`
--
ALTER TABLE `eskul`
  ADD PRIMARY KEY (`id`),
  ADD KEY `create_by` (`create_by`);

--
-- Indexes for table `galeri_artikel`
--
ALTER TABLE `galeri_artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_artikel` (`id_artikel`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan_angkatan`
--
ALTER TABLE `jurusan_angkatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_angkatan` (`id_angkatan`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_artikel` (`id_artikel`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jurusan_angkatan` (`id_jurusan_angkatan`),
  ADD KEY `id_jenis_kelamin` (`id_jenis_kelamin`);

--
-- Indexes for table `status_artikel`
--
ALTER TABLE `status_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_artikel`
--
ALTER TABLE `tag_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tentang`
--
ALTER TABLE `tentang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `nama_anggota` (`nama_anggota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `angkatan`
--
ALTER TABLE `angkatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `eskul`
--
ALTER TABLE `eskul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `galeri_artikel`
--
ALTER TABLE `galeri_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jurusan_angkatan`
--
ALTER TABLE `jurusan_angkatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `status_artikel`
--
ALTER TABLE `status_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tag_artikel`
--
ALTER TABLE `tag_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tentang`
--
ALTER TABLE `tentang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`id_jenis_kelamin`) REFERENCES `jenis_kelamin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id_status_artikel`) REFERENCES `status_artikel` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `artikel_ibfk_2` FOREIGN KEY (`create_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `artikel_ibfk_3` FOREIGN KEY (`id_tag_artikel`) REFERENCES `tag_artikel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eskul`
--
ALTER TABLE `eskul`
  ADD CONSTRAINT `eskul_ibfk_1` FOREIGN KEY (`create_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `galeri_artikel`
--
ALTER TABLE `galeri_artikel`
  ADD CONSTRAINT `galeri_artikel_ibfk_1` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jurusan_angkatan`
--
ALTER TABLE `jurusan_angkatan`
  ADD CONSTRAINT `jurusan_angkatan_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jurusan_angkatan_ibfk_2` FOREIGN KEY (`id_angkatan`) REFERENCES `angkatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_jurusan_angkatan`) REFERENCES `jurusan_angkatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_jenis_kelamin`) REFERENCES `jenis_kelamin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`nama_anggota`) REFERENCES `anggota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
