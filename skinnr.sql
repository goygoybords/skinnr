-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 15, 2015 at 09:05 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skinnr`
--

-- --------------------------------------------------------

--
-- Table structure for table `cash_invoice`
--

CREATE TABLE IF NOT EXISTS `cash_invoice` (
  `ci_no` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ci_date` date NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `vat_sales` decimal(8,2) NOT NULL,
  `vat` decimal(8,2) NOT NULL,
  `prepared_by` int(11) NOT NULL,
  `received_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `record_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`ci_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cash_invoice`
--

INSERT INTO `cash_invoice` (`ci_no`, `ci_date`, `customer_id`, `total`, `vat_sales`, `vat`, `prepared_by`, `received_by`, `record_status`) VALUES
(1, '2015-11-12', 2, '1750.00', '1540.00', '210.00', 1, 'Kevin', 1),
(2, '2015-11-12', 1, '597.50', '525.80', '71.70', 1, 'Test', 1),
(3, '2015-11-12', 3, '3950.00', '3476.00', '474.00', 1, 'Joyce', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cash_invoice_detail`
--

CREATE TABLE IF NOT EXISTS `cash_invoice_detail` (
  `cid_no` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ci_no` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `unit_price` decimal(8,2) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `record_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`cid_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cash_invoice_detail`
--

INSERT INTO `cash_invoice_detail` (`cid_no`, `ci_no`, `product_id`, `quantity`, `unit_price`, `amount`, `record_status`) VALUES
(1, 1, 4, '2.00', '875.00', '1750.00', 1),
(2, 2, 2, '2.00', '220.00', '440.00', 1),
(3, 2, 1, '10.00', '15.75', '157.50', 1),
(4, 3, 2, '10.00', '220.00', '2200.00', 1),
(5, 3, 4, '2.00', '875.00', '1750.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `charge_invoice`
--

CREATE TABLE IF NOT EXISTS `charge_invoice` (
  `ch_no` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ch_date` datetime NOT NULL,
  `customer_id` int(11) NOT NULL,
  `ch_duedate` datetime NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `vat_sales` decimal(8,2) NOT NULL,
  `vat` decimal(8,2) NOT NULL,
  `prepared_by` int(11) NOT NULL,
  `received_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `balance` decimal(8,2) NOT NULL,
  `record_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`ch_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `charge_invoice_detail`
--

CREATE TABLE IF NOT EXISTS `charge_invoice_detail` (
  `chd_no` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `unit_price` decimal(8,2) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `record_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`chd_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `credit_limit` decimal(8,2) NOT NULL,
  `credit_balance` decimal(8,2) NOT NULL,
  `last_ci_no` int(11) NOT NULL,
  `last_ch_no` int(11) NOT NULL,
  `record_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `address`, `contact_person`, `contact_number`, `credit_limit`, `credit_balance`, `last_ci_no`, `last_ch_no`, `record_status`) VALUES
(1, 'Cash', '', '', '', '0.00', '0.00', 0, 0, 1),
(2, 'Kevin', 'Mabolo', 'Kevin', '09232525162', '10500.75', '0.00', 0, 0, 1),
(3, 'Prime 88 Travel Inc.', 'Mandaue City', 'Hiro Takahasi', '09232525122', '10000.00', '0.00', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employee_username_unique` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `username`, `password`, `name`, `position`, `remember_token`, `status`) VALUES
(1, 'admin123', '$2y$10$Pc8y4rC5DuhlEug7SkneVOqi.W.Gk27LRSCEFbv2MurxSoA.xp6QW', 'FlashPark Inc.', 'CEO', 'K4xacqotFeNabcTw0kpf9DXrKA9WGqAW5DJvhYJDReWrDmN1RekuulR8QNsz', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_100000_create_password_resets_table', 1),
('2015_11_05_021536_Product', 1),
('2015_11_05_022523_Customer', 1),
('2015_11_05_041543_CashInvoice', 1),
('2015_11_05_045637_ChargeInvoice', 1),
('2015_11_05_050058_CashInvoiceDetail', 1),
('2015_11_05_050407_ChargeInvoiceDetail', 1),
('2015_11_05_060311_Employee', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_username_index` (`username`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unit_of_measurement` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `unit_price` decimal(8,2) NOT NULL,
  `quantity_on_hand` decimal(8,2) NOT NULL,
  `last_ci_no` int(11) NOT NULL,
  `last_ch_no` int(11) NOT NULL,
  `record_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `description`, `category`, `unit_of_measurement`, `unit_price`, `quantity_on_hand`, `last_ci_no`, `last_ch_no`, `record_status`) VALUES
(1, 'Trapal', 'Panapton', 'Roll', '15.75', '50.00', 0, 0, 1),
(2, 'Jade Chair', 'Furniture', 'Each', '220.00', '100.00', 0, 0, 1),
(3, 'Computer Chair', 'Furniture', 'Each', '350.00', '100.00', 0, 0, 1),
(4, 'Sofa Chair', 'Furniture', 'Each', '875.00', '100.00', 0, 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
