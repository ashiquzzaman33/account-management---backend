-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2016 at 03:59 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `account_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_type` bigint(20) unsigned NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `accounts_name_unique` (`name`),
  UNIQUE KEY `accounts_name_parent_description_unique` (`name`,`parent`,`description`),
  KEY `accounts_parent_foreign` (`parent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=58 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `account_type`, `parent`, `description`) VALUES
(1, 'Root', 1, 1, 'Root account table'),
(2, 'assets', 1, 1, 'Root account table'),
(3, 'owners equity', 1, 1, 'Root account table'),
(4, 'liability', 1, 1, 'Root account table'),
(5, 'revenues', 1, 1, 'Root account table'),
(6, 'expense', 1, 1, 'Root account table'),
(7, 'non current asset', 1, 2, 'Root account table'),
(8, 'current asset', 1, 2, 'Root account table'),
(9, 'property, plant and equipment - Office', 1, 7, 'Root account table'),
(10, 'property, plant and equipment - Factory', 1, 7, 'Root account table'),
(11, 'investment', 1, 7, 'Root account table'),
(12, 'other non current asset', 1, 7, 'Root account table'),
(13, 'inventory - raw materials', 1, 8, 'Root account table'),
(14, 'inventory - electrical goods', 1, 8, 'Root account table'),
(15, 'loan and advance', 1, 8, 'Root account table'),
(16, 'advance income tax', 1, 8, 'Root account table'),
(17, 'margine account', 1, 8, 'Root account table'),
(18, 'preliminary expenses', 1, 8, 'Root account table'),
(19, 'inventory - others', 1, 8, 'Root account table'),
(20, 'security deposit', 1, 8, 'Root account table'),
(21, 'account receivable', 1, 8, 'Root account table'),
(22, 'bank', 1, 8, 'Root account table'),
(23, 'cash in hand', 1, 8, 'Root account table'),
(24, 'goods in transits', 1, 8, 'Root account table'),
(25, 'interest receivable', 1, 8, 'Root account table'),
(26, 'others receivable', 1, 8, 'Root account table'),
(27, 'others current asset', 1, 8, 'Root account table'),
(28, 'capital', 1, 3, 'Root account table'),
(29, 'drawing', 1, 3, 'Root account table'),
(30, 'long term liability', 1, 4, 'Root account table'),
(31, 'long term loan', 1, 30, 'Root account table'),
(32, 'other long term liability', 1, 30, 'Root account table'),
(33, 'current liability', 1, 4, 'Root account table'),
(34, 'account payable', 1, 33, 'Root account table'),
(35, 'other creditors', 1, 33, 'Root account table'),
(36, 'short term loan', 1, 33, 'Root account table'),
(37, 'interest payable', 1, 33, 'Root account table'),
(38, 'non-operating income', 1, 5, 'Root account table'),
(39, 'operating income', 1, 5, 'Root account table'),
(40, 'capital gain', 1, 5, 'Root account table'),
(41, 'direct expense', 1, 6, 'Root account table'),
(42, 'direct materials', 1, 41, 'Root account table'),
(43, 'direct labour', 1, 41, 'Root account table'),
(44, 'direct expenses', 1, 41, 'Root account table'),
(45, 'indirect expense', 1, 6, 'Root account table'),
(46, 'indirect material', 1, 45, 'Root account table'),
(47, 'indirect labor', 1, 45, 'Root account table'),
(48, 'indirect expenses', 1, 45, 'Root account table'),
(49, 'other expense', 1, 6, 'Root account table'),
(50, 'financial expenses', 1, 49, 'Root account table'),
(51, 'prior period adjustment', 1, 49, 'Root account table'),
(52, 'work-in-proces consumed', 1, 49, 'Root account table'),
(53, 'income tax', 1, 49, 'Root account table'),
(54, 'dep. on property, plant & equipment - office', 1, 49, 'Root account table'),
(55, 'selling expenses', 1, 49, 'Root account table'),
(56, 'administrative expenses', 1, 49, 'Root account table'),
(57, 'distribution expenses', 1, 49, 'Root account table');

-- --------------------------------------------------------

--
-- Table structure for table `account_types`
--

CREATE TABLE IF NOT EXISTS `account_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `account_types`
--

INSERT INTO `account_types` (`id`, `type_name`, `details`) VALUES
(1, 'None', 'Only Used for initilization.');

-- --------------------------------------------------------

--
-- Table structure for table `all_childs`
--

CREATE TABLE IF NOT EXISTS `all_childs` (
  `parent` bigint(20) unsigned NOT NULL,
  `children` bigint(20) unsigned NOT NULL,
  KEY `all_childs_parent_foreign` (`parent`),
  KEY `all_childs_children_foreign` (`children`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `all_childs`
--

INSERT INTO `all_childs` (`parent`, `children`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(2, 7),
(2, 8),
(7, 9),
(2, 9),
(7, 10),
(2, 10),
(7, 11),
(2, 11),
(7, 12),
(2, 12),
(8, 13),
(2, 13),
(8, 14),
(2, 14),
(8, 15),
(2, 15),
(8, 16),
(2, 16),
(8, 17),
(2, 17),
(8, 18),
(2, 18),
(8, 19),
(2, 19),
(8, 20),
(2, 20),
(8, 21),
(2, 21),
(8, 22),
(2, 22),
(8, 23),
(2, 23),
(8, 24),
(2, 24),
(8, 25),
(2, 25),
(8, 26),
(2, 26),
(8, 27),
(2, 27),
(3, 28),
(3, 29),
(4, 30),
(30, 31),
(4, 31),
(30, 32),
(4, 32),
(4, 33),
(33, 34),
(4, 34),
(33, 35),
(4, 35),
(33, 36),
(4, 36),
(33, 37),
(4, 37),
(5, 38),
(5, 39),
(5, 40),
(6, 41),
(41, 42),
(6, 42),
(41, 43),
(6, 43),
(41, 44),
(6, 44),
(6, 45),
(45, 46),
(6, 46),
(45, 47),
(6, 47),
(45, 48),
(6, 48),
(6, 49),
(49, 50),
(6, 50),
(49, 51),
(6, 51),
(49, 52),
(6, 52),
(49, 53),
(6, 53),
(49, 54),
(6, 54),
(49, 55),
(6, 55),
(49, 56),
(6, 56),
(49, 57),
(6, 57);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` decimal(15,5) NOT NULL DEFAULT '0.00000',
  `unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `purchase_price` decimal(15,5) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `childrens`
--

CREATE TABLE IF NOT EXISTS `childrens` (
  `parent` bigint(20) unsigned NOT NULL,
  `children` bigint(20) unsigned NOT NULL,
  KEY `childrens_parent_foreign` (`parent`),
  KEY `childrens_children_foreign` (`children`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `childrens`
--

INSERT INTO `childrens` (`parent`, `children`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(2, 7),
(2, 8),
(7, 9),
(7, 10),
(7, 11),
(7, 12),
(8, 13),
(8, 14),
(8, 15),
(8, 16),
(8, 17),
(8, 18),
(8, 19),
(8, 20),
(8, 21),
(8, 22),
(8, 23),
(8, 24),
(8, 25),
(8, 26),
(8, 27),
(3, 28),
(3, 29),
(4, 30),
(30, 31),
(30, 32),
(4, 33),
(33, 34),
(33, 35),
(33, 36),
(33, 37),
(5, 38),
(5, 39),
(5, 40),
(6, 41),
(41, 42),
(41, 43),
(41, 44),
(6, 45),
(45, 46),
(45, 47),
(45, 48),
(6, 49),
(49, 50),
(49, 51),
(49, 52),
(49, 53),
(49, 54),
(49, 55),
(49, 56),
(49, 57);

-- --------------------------------------------------------

--
-- Table structure for table `cnfs`
--

CREATE TABLE IF NOT EXISTS `cnfs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `party_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `party_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cnfs_location_id_foreign` (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_orders`
--

CREATE TABLE IF NOT EXISTS `delivery_orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `customer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `goods` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `word` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `place` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trak` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `deposit_voucher`
--

CREATE TABLE IF NOT EXISTS `deposit_voucher` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `via` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bank_ac` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `branch` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `word` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `expense_voucher_id` bigint(20) unsigned NOT NULL,
  `expense_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(15,5) NOT NULL DEFAULT '0.00000',
  PRIMARY KEY (`id`),
  KEY `expenses_expense_voucher_id_foreign` (`expense_voucher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `expense_vouchers`
--

CREATE TABLE IF NOT EXISTS `expense_vouchers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `location` bigint(20) NOT NULL,
  `receivers_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receivers_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `via` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `via_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `in_word` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` float(8,2) NOT NULL,
  `expenses` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `general_accounts`
--

CREATE TABLE IF NOT EXISTS `general_accounts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `voucher_id` bigint(20) unsigned NOT NULL,
  `account_id` bigint(20) unsigned NOT NULL,
  `against_account_id` bigint(20) unsigned NOT NULL,
  `dr` decimal(20,5) NOT NULL,
  `cr` decimal(20,5) NOT NULL,
  `balance` decimal(20,5) NOT NULL,
  `remark` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `general_accounts_voucher_id_foreign` (`voucher_id`),
  KEY `general_accounts_account_id_foreign` (`account_id`),
  KEY `general_accounts_against_account_id_foreign` (`against_account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=60 ;

--
-- Dumping data for table `general_accounts`
--

INSERT INTO `general_accounts` (`id`, `voucher_id`, `account_id`, `against_account_id`, `dr`, `cr`, `balance`, `remark`) VALUES
(1, 1, 1, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of Root'),
(2, 1, 2, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of assets'),
(3, 1, 3, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of owners equity'),
(4, 1, 4, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of liability'),
(5, 1, 5, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of revenues'),
(6, 1, 6, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of expense'),
(7, 1, 7, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of non current asset'),
(8, 1, 8, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of current asset'),
(9, 1, 9, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of property, plant and equipment - Office'),
(10, 1, 10, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of property, plant and equipment - Factory'),
(11, 1, 11, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of investment'),
(12, 1, 12, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of other non current asset'),
(13, 1, 13, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of inventory - raw materials'),
(14, 1, 14, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of inventory - electrical goods'),
(15, 1, 15, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of loan and advance'),
(16, 1, 16, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of advance income tax'),
(17, 1, 17, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of margine account'),
(18, 1, 18, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of preliminary expenses'),
(19, 1, 19, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of inventory - others'),
(20, 1, 20, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of security deposit'),
(21, 1, 21, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of account receivable'),
(22, 1, 22, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of bank'),
(23, 1, 23, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of cash in hand'),
(24, 1, 24, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of goods in transits'),
(25, 1, 25, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of interest receivable'),
(26, 1, 26, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of others receivable'),
(27, 1, 27, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of others current asset'),
(28, 1, 28, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of capital'),
(29, 1, 29, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of drawing'),
(30, 1, 30, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of long term liability'),
(31, 1, 31, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of long term loan'),
(32, 1, 32, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of other long term liability'),
(33, 1, 33, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of current liability'),
(34, 1, 34, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of account payable'),
(35, 1, 35, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of other creditors'),
(36, 1, 36, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of short term loan'),
(37, 1, 37, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of interest payable'),
(38, 1, 38, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of non-operating income'),
(39, 1, 39, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of operating income'),
(40, 1, 40, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of capital gain'),
(41, 1, 41, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of direct expense'),
(42, 1, 42, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of direct materials'),
(43, 1, 43, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of direct labour'),
(44, 1, 44, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of direct expenses'),
(45, 1, 45, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of indirect expense'),
(46, 1, 46, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of indirect material'),
(47, 1, 47, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of indirect labor'),
(48, 1, 48, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of indirect expenses'),
(49, 1, 49, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of other expense'),
(50, 1, 50, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of financial expenses'),
(51, 1, 51, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of prior period adjustment'),
(52, 1, 52, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of work-in-proces consumed'),
(53, 1, 53, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of income tax'),
(54, 1, 54, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of dep. on property, plant & equipment - office'),
(55, 1, 55, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of selling expenses'),
(56, 1, 56, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of administrative expenses'),
(57, 1, 57, 1, '0.00000', '0.00000', '0.00000', 'Used to keep Opening balance of distribution expenses'),
(58, 2, 55, 52, '5000.00000', '0.00000', '5000.00000', ''),
(59, 2, 52, 55, '0.00000', '5000.00000', '-5000.00000', '');

-- --------------------------------------------------------

--
-- Table structure for table `godowns`
--

CREATE TABLE IF NOT EXISTS `godowns` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `godowns_location_foreign` (`location`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE IF NOT EXISTS `inventories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `godown_id` bigint(20) unsigned NOT NULL,
  `quantity` decimal(15,5) NOT NULL DEFAULT '0.00000',
  `purchase_price` decimal(15,5) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `inventories_product_id_foreign` (`product_id`),
  KEY `inventories_godown_id_foreign` (`godown_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lcs`
--

CREATE TABLE IF NOT EXISTS `lcs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `lc_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `party_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `party_bank_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `party_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `our_bank_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lc_amount` decimal(15,5) NOT NULL DEFAULT '0.00000',
  `initialing_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `starting_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dimilish_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lc_meta`
--

CREATE TABLE IF NOT EXISTS `lc_meta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `lc_id` int(11) NOT NULL,
  `dollar` decimal(15,2) NOT NULL,
  `rate` decimal(15,2) NOT NULL,
  `bd_amount` decimal(15,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locations_name_details_unique` (`name`,`details`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `details`) VALUES
(2, 'khulna', 'asdas'),
(1, 'None', 'Only Used for initilization.');

-- --------------------------------------------------------

--
-- Table structure for table `metadata`
--

CREATE TABLE IF NOT EXISTS `metadata` (
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
('2015_04_11_211722_create_categories_table', 1),
('2015_05_18_185755_create_locations_table', 1),
('2015_05_18_185839_create_metadata_table', 1),
('2015_05_30_044834_create_account_types', 1),
('2015_05_30_045019_create_voucher_types', 1),
('2015_05_30_050622_create_accounts_table', 1),
('2015_05_30_050702_create_childrens_table', 1),
('2015_06_05_124742_create_godowns_table', 1),
('2015_06_05_124844_create_inventories_table', 1),
('2015_06_25_142952_create_expense_voucher_table', 1),
('2015_06_25_143021_create_deposit_voucher_table', 1),
('2015_06_25_143136_create_project_table', 1),
('2015_06_25_151318_create_expenses_table', 1),
('2015_06_27_092936_create_cnf_table', 1),
('2015_06_27_095102_create_lc_table', 1),
('2015_06_27_165324_create_all_childs_table', 1),
('2015_06_28_113459_create_vouchers_table', 1),
('2015_06_28_113745_create_general_accounts_table', 1),
('2015_06_29_093512_create_parties_table', 1),
('2015_07_01_202743_create_settings_table', 1),
('2015_07_02_171441_create_products_table', 1),
('2015_07_02_194954_create_stockLedgers_table', 1),
('2015_07_13_204640_create_users_table', 1),
('2015_09_13_072640_create_delivery_orders_table', 1),
('2015_12_12_194438_create_lc_meta_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parties`
--

CREATE TABLE IF NOT EXISTS `parties` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `parties_name_address_unique` (`name`,`address`),
  KEY `parties_account_id_foreign` (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_qty` float(8,2) NOT NULL,
  `s_qty` float(8,2) NOT NULL,
  `last_p_rate` double(15,4) NOT NULL,
  `last_s_rate` double(15,4) NOT NULL,
  `avg_p_rate` double(15,4) NOT NULL,
  `avg_s_rate` double(15,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `investment` decimal(15,5) NOT NULL DEFAULT '0.00000',
  `related_party` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `starting_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `operation_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dimilish_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location_id` bigint(20) unsigned NOT NULL,
  `alarm` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `projects_name_unique` (`name`),
  KEY `projects_location_id_foreign` (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`) VALUES
(1, 'default_background', '#222'),
(2, 'default_font', '#fff'),
(3, 'background', '#222'),
(4, 'font', '#fff');

-- --------------------------------------------------------

--
-- Table structure for table `stockledgers`
--

CREATE TABLE IF NOT EXISTS `stockledgers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `voucher_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` float(8,2) NOT NULL,
  `rate` double(15,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `inventory` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `lc` int(11) NOT NULL,
  `cnf` int(11) NOT NULL,
  `deposit_voucher` int(11) NOT NULL,
  `expense_voucher` int(11) NOT NULL,
  `sell` int(11) NOT NULL,
  `purchase` int(11) NOT NULL,
  `party_create` int(11) NOT NULL,
  `ledger_create` int(11) NOT NULL,
  `voucher` int(11) NOT NULL,
  `bank` int(11) NOT NULL,
  `inventory_report` int(11) NOT NULL,
  `trial_balance` int(11) NOT NULL,
  `balance_sheet` int(11) NOT NULL,
  `financial_statement` int(11) NOT NULL,
  `database_maintanance` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `inventory`, `project`, `lc`, `cnf`, `deposit_voucher`, `expense_voucher`, `sell`, `purchase`, `party_create`, `ledger_create`, `voucher`, `bank`, `inventory_report`, `trial_balance`, `balance_sheet`, `financial_statement`, `database_maintanance`) VALUES
(1, 'admin', 'admin', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE IF NOT EXISTS `vouchers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `location_id` bigint(20) unsigned NOT NULL,
  `narration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_or_cnf_or_lc` bigint(20) NOT NULL DEFAULT '0',
  `voucher_type` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vouchers_voucher_type_foreign` (`voucher_type`),
  KEY `vouchers_location_id_foreign` (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `date`, `location_id`, `narration`, `project_or_cnf_or_lc`, `voucher_type`) VALUES
(1, '2016-02-02 08:24:51', 1, 'First Voucher used in initial database creation', 0, 1),
(2, '2016-02-11 18:00:00', 2, 'test narration', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `voucher_types`
--

CREATE TABLE IF NOT EXISTS `voucher_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `voucher_types`
--

INSERT INTO `voucher_types` (`id`, `type_name`, `details`) VALUES
(1, 'None', 'Only Used for initilization.');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `all_childs`
--
ALTER TABLE `all_childs`
  ADD CONSTRAINT `all_childs_children_foreign` FOREIGN KEY (`children`) REFERENCES `accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `all_childs_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `childrens`
--
ALTER TABLE `childrens`
  ADD CONSTRAINT `childrens_children_foreign` FOREIGN KEY (`children`) REFERENCES `accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `childrens_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cnfs`
--
ALTER TABLE `cnfs`
  ADD CONSTRAINT `cnfs_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_expense_voucher_id_foreign` FOREIGN KEY (`expense_voucher_id`) REFERENCES `expense_vouchers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `general_accounts`
--
ALTER TABLE `general_accounts`
  ADD CONSTRAINT `general_accounts_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `general_accounts_against_account_id_foreign` FOREIGN KEY (`against_account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `general_accounts_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `godowns`
--
ALTER TABLE `godowns`
  ADD CONSTRAINT `godowns_location_foreign` FOREIGN KEY (`location`) REFERENCES `locations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `inventories_godown_id_foreign` FOREIGN KEY (`godown_id`) REFERENCES `godowns` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inventories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `parties`
--
ALTER TABLE `parties`
  ADD CONSTRAINT `parties_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD CONSTRAINT `vouchers_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vouchers_voucher_type_foreign` FOREIGN KEY (`voucher_type`) REFERENCES `voucher_types` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
