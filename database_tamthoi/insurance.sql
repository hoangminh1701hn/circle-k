-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 18, 2024 at 02:16 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `circlek`
--

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `id` int(11) NOT NULL auto_increment,
  `taikhoan` int(11) NOT NULL,
  `insurance_type` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date default NULL,
  `coverage_amount` decimal(10,2) default NULL,
  `notes` varchar(255) default NULL,
  `thang` varchar(255) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_id_tk` (`taikhoan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `insurance`
--

INSERT INTO `insurance` (`id`, `taikhoan`, `insurance_type`, `start_date`, `end_date`, `coverage_amount`, `notes`, `thang`) VALUES
(5, 1, 'Bảo hiểm y tế', '2024-11-01', '2024-11-30', '20803.41', 'da dong', NULL),
(8, 2, 'Bảo hiểm xã hội', '2024-11-11', '2025-11-11', '50000.00', 'ko', NULL),
(9, 1, 'Bảo hiểm xã hội', '2024-11-01', '2024-11-30', '138689.40', 'chua dong', NULL),
(10, 2, 'Bảo hiểm y tế', '2024-11-28', '2024-11-30', '197.72', '?a sua roi', NULL),
(12, 2, 'Báº£o hiá»ƒm tai náº¡n lao Ä‘á»™ng', '2024-11-22', '2024-11-30', '131.81', 'hoang minh them moi', NULL);
