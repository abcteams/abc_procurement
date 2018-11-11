-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2018 at 06:26 AM
-- Server version: 5.7.20
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `procurement`
--

-- --------------------------------------------------------

--
-- Table structure for table `boq`
--

CREATE TABLE `boq` (
  `id` int(10) UNSIGNED NOT NULL,
  `work_zone_id` int(11) NOT NULL,
  `sub_work_zone_id` int(11) NOT NULL,
  `sub_gml_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `inquiry_is_created` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `boq`
--

INSERT INTO `boq` (`id`, `work_zone_id`, `sub_work_zone_id`, `sub_gml_id`, `status`, `inquiry_is_created`) VALUES
(4, 1, 0, 2, 3, 1),
(5, 2, 0, 4, 3, 1),
(6, 2, 0, 3, 3, 1),
(8, 2, 0, 4, 3, 0),
(9, 3, 0, 4, 3, 0),
(10, 4, 0, 4, 3, 1),
(11, 4, 0, 3, 3, 1),
(12, 4, 0, 7, 3, 0),
(13, 9, 0, 7, 3, 0),
(14, 8, 0, 9, 3, 1),
(15, 16, 0, 4, 3, 1),
(16, 20, 0, 7, 3, 1),
(17, 19, 0, 4, 3, 1),
(18, 6, 0, 4, 3, 1),
(19, 20, 0, 9, 3, 1),
(20, 20, 0, 4, 3, 1),
(21, 20, 0, 7, 3, 0),
(22, 21, 0, 10, 3, 1),
(23, 21, 0, 11, 3, 1),
(24, 21, 0, 10, 3, 1),
(25, 22, 0, 10, 3, 1),
(26, 23, 0, 10, 3, 1),
(27, 23, 0, 11, 3, 1),
(28, 24, 0, 11, 3, 1),
(29, 25, 0, 10, 3, 1),
(30, 25, 0, 10, 3, 1),
(31, 26, 0, 11, 3, 1),
(32, 26, 0, 1, 2, 1),
(33, 26, 0, 11, 3, 1),
(34, 26, 0, 10, 1, 0),
(35, 22, 0, 1, 2, 1),
(36, 26, 0, 12, 1, 0),
(37, 12, 0, 9, 3, 1),
(38, 5, 0, 10, 3, 1),
(39, 4, 0, 10, 1, 0),
(40, 5, 0, 10, 3, 1),
(41, 5, 0, 10, 3, 1),
(42, 5, 0, 12, 1, 0),
(43, 8, 62, 10, 1, 0),
(48, 9, 64, 10, 3, 1),
(47, 9, 63, 1, 2, 0),
(46, 9, 63, 10, 3, 1),
(49, 9, 64, 9, 4, 1),
(50, 9, 65, 10, 3, 1),
(51, 5, 23, 10, 3, 1),
(52, 5, 66, 10, 3, 1),
(53, 3, 22, 10, 2, 0),
(54, 3, 21, 10, 2, 0),
(55, 3, 20, 10, 2, 0),
(56, 2, 8, 10, 3, 1),
(57, 2, 2, 10, 3, 1),
(58, 9, 65, 4, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `boq_accessories`
--

CREATE TABLE `boq_accessories` (
  `id` int(11) NOT NULL,
  `sub_boq_id` int(11) NOT NULL,
  `description` mediumtext NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `model` varchar(150) DEFAULT NULL,
  `rest_quantity` int(11) NOT NULL DEFAULT '0',
  `rate` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boq_accessories`
--

INSERT INTO `boq_accessories` (`id`, `sub_boq_id`, `description`, `quantity`, `model`, `rest_quantity`, `rate`) VALUES
(2, 33, 'fsf', 4, 'vfdsdg', 0, 0),
(3, 33, 'new accessory', 4, 'fre32', 0, 0),
(4, 36, 'cameras', 23, 'canon', 12, 300),
(5, 36, 'ilpo', 32, 'ewq', 12, 100),
(6, 39, 'cameras', 40, 'canon', 30, 100),
(7, 39, 'mrabet', 100, 'sonic', 90, 30),
(8, 37, 'anything', 20, 'fasdfa', 10, 3.5),
(9, 40, 'tr', 4, NULL, 0, 0),
(10, 43, '7', 7, NULL, 0, 0),
(11, 43, '8', 8, NULL, 0, 0),
(12, 70, 'cameras', 50, NULL, 0, 0),
(13, 70, 'anything', 50, NULL, 0, 0),
(14, 69, 'lamps', 20, NULL, 0, 0),
(15, 66, 'fsda', 10, NULL, 0, 0),
(16, 71, 'cameras', 12, NULL, 0, 0),
(17, 71, 'anything', 4, NULL, 0, 0),
(18, 72, 'lamp', 10, NULL, 0, 0),
(19, 73, 'lamps', 100, NULL, 0, 0),
(20, 75, 'cameras', 10, NULL, 0, 0),
(21, 75, 'lamps', 10, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `boq_status`
--

CREATE TABLE `boq_status` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boq_status`
--

INSERT INTO `boq_status` (`id`, `status`) VALUES
(1, 'Add Materials & Quantity'),
(2, 'Ready to be procured'),
(3, 'Currently under procurement'),
(4, 'Ready to order');

-- --------------------------------------------------------

--
-- Table structure for table `boq_sub_materials`
--

CREATE TABLE `boq_sub_materials` (
  `id` int(10) UNSIGNED NOT NULL,
  `boq_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `quantity_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `budgetory_price` double(8,2) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `rest_quantity` int(11) NOT NULL DEFAULT '0',
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` double NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `boq_sub_materials`
--

INSERT INTO `boq_sub_materials` (`id`, `boq_id`, `quantity`, `quantity_unit`, `budgetory_price`, `size`, `size_unit`, `description`, `rest_quantity`, `model`, `rate`) VALUES
(2, 4, 24, 'Piece', 423.00, '213', 'cm', 'fsd', 0, NULL, 0),
(3, 6, 20, 'Piece', 45.00, '56', 'cm', 'derf', 0, NULL, 0),
(4, 6, 23, 'Piece', 23423.00, '67', 'cm', 'ettr5e', 0, 'canon', 0),
(5, 5, 20, 'Piece', 20.00, '20', 'cm', 'fasdf', 0, 'ewq', 0),
(7, 8, 20, 'Piece', 200.00, '50', 'cm', 'fads', 0, NULL, 0),
(8, 9, 21, 'Piece', 32.00, 'er', 'cm', '3', 0, NULL, 0),
(9, 10, 5, 'Piece', 5.00, '5', 'cm', '5', 0, NULL, 0),
(10, 10, 21, 'Piece', 321.00, '23 d', 'cm', 'fasdfas', 0, NULL, 0),
(11, 9, 23, 'Piece', 213.00, 'das', 'cm', 'eqw', 0, NULL, 0),
(12, 9, 23, 'Piece', 123.00, '321', 'cm', '312', 0, NULL, 0),
(13, 9, 12, 'PiecePiece', 21.00, '21', 'cm', '12', 0, NULL, 0),
(14, 11, 20, 'Piece', 10.00, '10', 'cm', '10', 0, NULL, 0),
(15, 11, 100, 'peice', 5000.00, '20', 'cm', 'fdsafads', 0, NULL, 0),
(16, 13, 34, 'piece', 34.00, '4', 'inch', '4sadf', 0, NULL, 0),
(17, 13, 23, 'meter', 23.00, '32', 'inch', '123', 0, NULL, 0),
(18, 14, 20, 'piece', 15000.00, '15', 'inch', 'adsfasd', 0, NULL, 0),
(19, 14, 25, 'piece', 4000.00, '30', 'inch', 'rffra', 0, NULL, 0),
(20, 15, 12, 'piece', 500.00, '50', 'inch', 'anything', 0, NULL, 0),
(21, 16, 500, 'piece', 15000.00, '23', 'inch', 'fasf', 0, NULL, 0),
(22, 16, 1500, 'piece', 5432.00, '20', 'inch', 'fasd', 0, NULL, 0),
(23, 16, 4577, 'meter', 4235.00, '4523', 'inch', 'sgfdgs', 0, NULL, 0),
(24, 16, 12434, 'piece', 3123.00, '312', 'inch', 'fsdfa', 0, NULL, 0),
(25, 17, 2, 'piece', 123.00, '2', 'mm', 'fasdffasd', 0, NULL, 0),
(26, 18, 100, 'piece', 500.00, '20', 'mm', 'anythinh', 0, NULL, 0),
(27, 18, 21, 'meter', 144.00, '14', 'set', 'this is the final price', 0, NULL, 0),
(28, 19, 1500, 'piece', 1450.00, '20', 'inch', 'fa', 0, NULL, 0),
(29, 20, 34, 'piece', 456.00, '23', 'mm', 'ghggg', 0, NULL, 0),
(30, 21, 50, 'meter', 235.00, '20', 'set', 'qrwerqw', 0, NULL, 0),
(31, 23, 100, 'piece', 1000.00, '23', 'inch', NULL, 0, NULL, 0),
(32, 23, 50, 'piece', 200.00, '40', 'inch', 'an', 0, NULL, 0),
(33, 24, 34, 'piece', 400.00, '54', 'inch', 'fdghgfh', 0, NULL, 0),
(34, 24, 20, 'metersquare', 654.00, '15', 'ls', 'hgjh', 0, NULL, 0),
(35, 25, 20, 'meter', 2000.00, '12', 'inch', 'fsd', 12, 'gfd5', 1500),
(36, 25, 32, 'piece', 1000.00, '13', 'mm', 'fds', 12, 'ed23', 7000),
(37, 26, 30, 'piece', 500.00, '12', 'mm', 'fas', 30, 'gfd5', 3.7),
(38, 26, 500, 'meter', 500.00, '40', 'metersquare', 'fdsa', 300, 'rwe', 1.5),
(39, 26, 50, 'piece', 500.00, '2', 'inch', 'gsdfg', 50, 'eqwe', 0.5),
(40, 27, 100, 'piece', 4000.00, '12', 'inch', 'rreewr rew', 0, NULL, 0),
(41, 28, 3, 'piece', 3.00, '3', 'mm', '3', 0, NULL, 0),
(42, 22, 12, 'piece', 500.00, '10', 'mm', 'fasdfasdf asdf asd', 0, NULL, 0),
(43, 29, 7, 'piece', 7.00, '7', 'mm', '7', 0, NULL, 0),
(44, 29, 6, 'piece', 6.00, '6', 'inch', '6', 0, NULL, 0),
(45, 30, 65, 'piece', 100.00, '12', 'inch', 'hgjgjh', 0, 'anything', 1),
(46, 30, 12, 'piece', 100.00, '54', 'inch', 'fasdfa', 0, NULL, 0),
(47, 31, 12, 'piece', 4000.00, '100', 'set', 'dasfsd', 1, NULL, 0),
(48, 32, 14, 'piece', 44.00, '14', 'mm', 'fads', 0, NULL, 0),
(49, 33, 67, 'piece', 54.00, '15', 'inch', 'gfs', 3, 'gfd5', 12),
(50, 34, 2, 'meter', 2.00, '20', 'set', '2', 0, NULL, 0),
(51, 35, 21, 'No\'s', 21.00, '21', 'mm', 'asdfa', 0, NULL, 0),
(52, 37, 3, NULL, 3.00, '3', NULL, '3', 0, NULL, 0),
(53, 36, 3, 'Meter', 4.00, '3', 'Ls', '4AFSD', 0, NULL, 0),
(54, 38, 12, NULL, 50.00, '12', NULL, 'fsdfaf', 0, NULL, 0),
(55, 40, 2, 'Meter', 26.00, '12', 'Inch', 'sdasfd', 0, NULL, 0),
(56, 41, 2, NULL, 800.00, '12', NULL, 'fsadf', 0, NULL, 0),
(57, 41, 3, NULL, 15.00, '12', NULL, 'asdf', 0, NULL, 0),
(58, 46, 2, 'Meter', 10.00, '5', 'mm', 'first item', 0, NULL, 0),
(59, 46, 6, 'Meter', 192.00, '12', 'mm', 'fasdfasd asdf', 0, NULL, 0),
(60, 48, 65, 'Ls', 2795.00, '54', 'mm', 'gsfddg sdfg sdf g', 0, NULL, 0),
(61, 47, 5, 'Ls', 50.00, '12', 'mm', 'asdf', 0, NULL, 0),
(62, 49, 15, NULL, 750.00, '12', NULL, 'jhjkh', 0, NULL, 0),
(63, 50, 20, 'Meter', 2000.00, '5', 'mm', 'bvbnv vbnb', 0, NULL, 0),
(64, 50, 55, 'Ls', 11000.00, '54', 'mm', 'kkkkk', 0, NULL, 0),
(65, 51, 12, 'Meter', 120.00, '12', 'mm', 'dfasfa', 0, NULL, 0),
(66, 51, 12, 'Meter', 960.00, '30', 'mm', 'sdfa fdsaf asd', 0, NULL, 0),
(67, 51, 90, 'Meter', 3600.00, '50', 'Set', 'fdadsfads  safdda', 0, NULL, 0),
(68, 52, 60, 'Meter', 2400.00, '50', 'mm', 'daf asdfas', 0, NULL, 0),
(69, 52, 50, 'Meter', 1150.00, '12', 'mm', 'erqw rwer', 0, NULL, 0),
(70, 52, 45, 'Meter', 3915.00, '30', 'mm', 'jdg hdfh dfhdf', 0, NULL, 0),
(71, 53, 50, 'Meter', 5000.00, '12', 'mm', 'dasdf asdf  fsda', 0, NULL, 0),
(72, 53, 67, 'No\'s', 804.00, '30', 'Inch', 'asdf asdf asd', 0, NULL, 0),
(73, 54, 6, 'No\'s', 300.00, '30', 'Inch', 'dsaf asdfa', 0, NULL, 0),
(74, 55, 5, 'No\'s', 50.00, '30', 'Inch', 'fdsaf asdf asd', 0, NULL, 0),
(75, 56, 2, 'No\'s', 40.00, '2', 'Inch', 'tttttttt', 0, NULL, 0),
(76, 57, 2, 'No\'s', 200.00, '2', 'Inch', 'fasdfa sf', 0, NULL, 0),
(77, 58, 2, 'No\'s', 4.00, '23', 'Set', '2', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `boq_id` int(11) NOT NULL,
  `delivery_date` datetime NOT NULL,
  `order_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `manger_approved` int(11) NOT NULL,
  `warehouse_approved` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1- ready 2-manger approve 3-warehouse approve 4- tecnical approve 5- procurement approve 6-commercial approve 7-supplier approve',
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_type` int(11) NOT NULL COMMENT 'type 1 material , type 2 accessory'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `user_id`, `item_id`, `item_type`) VALUES
(1, 2, 42, 1),
(2, 2, 42, 1),
(3, 2, 42, 1),
(4, 2, 42, 1),
(5, 2, 42, 1),
(6, 2, 35, 1),
(7, 2, 36, 1),
(8, 2, 4, 2),
(9, 2, 5, 2),
(10, 2, 35, 1),
(11, 2, 36, 1),
(12, 2, 35, 1),
(13, 2, 35, 1),
(14, 2, 35, 1),
(15, 2, 35, 1),
(16, 2, 36, 1),
(17, 2, 4, 2),
(18, 2, 35, 1),
(19, 2, 36, 1),
(20, 2, 4, 2),
(21, 2, 35, 1),
(22, 2, 36, 1),
(23, 2, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cc_emails`
--

CREATE TABLE `cc_emails` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cc_emails`
--

INSERT INTO `cc_emails` (`id`, `user_id`, `email`) VALUES
(10, 10, 'samerx@abc-gcc.com'),
(11, 10, 'ffff@fdsdf.com'),
(12, 0, 'miqdad.mohammad@abc-gcc.com'),
(14, 13, 'miqdad.mohammad@abc-gcc.com'),
(15, 13, 'ahmadqw@gmail.com'),
(16, 15, 'abuabdallah@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `nicename`, `phonecode`) VALUES
(1, 'Afghanistan', 93),
(2, 'Albania', 355),
(3, 'Algeria', 213),
(4, 'American Samoa', 1684),
(5, 'Andorra', 376),
(6, 'Angola', 244),
(7, 'Anguilla', 1264),
(8, 'Antarctica', 0),
(9, 'Antigua and Barbuda', 1268),
(10, 'Argentina', 54),
(11, 'Armenia', 374),
(12, 'Aruba', 297),
(13, 'Australia', 61),
(14, 'Austria', 43),
(15, 'Azerbaijan', 994),
(16, 'Bahamas', 1242),
(17, 'Bahrain', 973),
(18, 'Bangladesh', 880),
(19, 'Barbados', 1246),
(20, 'Belarus', 375),
(21, 'Belgium', 32),
(22, 'Belize', 501),
(23, 'Benin', 229),
(24, 'Bermuda', 1441),
(25, 'Bhutan', 975),
(26, 'Bolivia', 591),
(27, 'Bosnia and Herzegovina', 387),
(28, 'Botswana', 267),
(29, 'Bouvet Island', 0),
(30, 'Brazil', 55),
(31, 'British Indian Ocean Territory', 246),
(32, 'Brunei Darussalam', 673),
(33, 'Bulgaria', 359),
(34, 'Burkina Faso', 226),
(35, 'Burundi', 257),
(36, 'Cambodia', 855),
(37, 'Cameroon', 237),
(38, 'Canada', 1),
(39, 'Cape Verde', 238),
(40, 'Cayman Islands', 1345),
(41, 'Central African Republic', 236),
(42, 'Chad', 235),
(43, 'Chile', 56),
(44, 'China', 86),
(45, 'Christmas Island', 61),
(46, 'Cocos (Keeling) Islands', 672),
(47, 'Colombia', 57),
(48, 'Comoros', 269),
(49, 'Congo', 242),
(50, 'Congo, the Democratic Republic of the', 242),
(51, 'Cook Islands', 682),
(52, 'Costa Rica', 506),
(53, 'Cote D\'Ivoire', 225),
(54, 'Croatia', 385),
(55, 'Cuba', 53),
(56, 'Cyprus', 357),
(57, 'Czech Republic', 420),
(58, 'Denmark', 45),
(59, 'Djibouti', 253),
(60, 'Dominica', 1767),
(61, 'Dominican Republic', 1809),
(62, 'Ecuador', 593),
(63, 'Egypt', 20),
(64, 'El Salvador', 503),
(65, 'Equatorial Guinea', 240),
(66, 'Eritrea', 291),
(67, 'Estonia', 372),
(68, 'Ethiopia', 251),
(69, 'Falkland Islands (Malvinas)', 500),
(70, 'Faroe Islands', 298),
(71, 'Fiji', 679),
(72, 'Finland', 358),
(73, 'France', 33),
(74, 'French Guiana', 594),
(75, 'French Polynesia', 689),
(76, 'French Southern Territories', 0),
(77, 'Gabon', 241),
(78, 'Gambia', 220),
(79, 'Georgia', 995),
(80, 'Germany', 49),
(81, 'Ghana', 233),
(82, 'Gibraltar', 350),
(83, 'Greece', 30),
(84, 'Greenland', 299),
(85, 'Grenada', 1473),
(86, 'Guadeloupe', 590),
(87, 'Guam', 1671),
(88, 'Guatemala', 502),
(89, 'Guinea', 224),
(90, 'Guinea-Bissau', 245),
(91, 'Guyana', 592),
(92, 'Haiti', 509),
(93, 'Heard Island and Mcdonald Islands', 0),
(94, 'Holy See (Vatican City State)', 39),
(95, 'Honduras', 504),
(96, 'Hong Kong', 852),
(97, 'Hungary', 36),
(98, 'Iceland', 354),
(99, 'India', 91),
(100, 'Indonesia', 62),
(101, 'Iran, Islamic Republic of', 98),
(102, 'Iraq', 964),
(103, 'Ireland', 353),
(104, 'Israel', 972),
(105, 'Italy', 39),
(106, 'Jamaica', 1876),
(107, 'Japan', 81),
(108, 'Jordan', 962),
(109, 'Kazakhstan', 7),
(110, 'Kenya', 254),
(111, 'Kiribati', 686),
(112, 'Korea, Democratic People\'s Republic of', 850),
(113, 'Korea, Republic of', 82),
(114, 'Kuwait', 965),
(115, 'Kyrgyzstan', 996),
(116, 'Lao People\'s Democratic Republic', 856),
(117, 'Latvia', 371),
(118, 'Lebanon', 961),
(119, 'Lesotho', 266),
(120, 'Liberia', 231),
(121, 'Libyan Arab Jamahiriya', 218),
(122, 'Liechtenstein', 423),
(123, 'Lithuania', 370),
(124, 'Luxembourg', 352),
(125, 'Macao', 853),
(126, 'Macedonia, the Former Yugoslav Republic of', 389),
(127, 'Madagascar', 261),
(128, 'Malawi', 265),
(129, 'Malaysia', 60),
(130, 'Maldives', 960),
(131, 'Mali', 223),
(132, 'Malta', 356),
(133, 'Marshall Islands', 692),
(134, 'Martinique', 596),
(135, 'Mauritania', 222),
(136, 'Mauritius', 230),
(137, 'Mayotte', 269),
(138, 'Mexico', 52),
(139, 'Micronesia, Federated States of', 691),
(140, 'Moldova, Republic of', 373),
(141, 'Monaco', 377),
(142, 'Mongolia', 976),
(143, 'Montserrat', 1664),
(144, 'Morocco', 212),
(145, 'Mozambique', 258),
(146, 'Myanmar', 95),
(147, 'Namibia', 264),
(148, 'Nauru', 674),
(149, 'Nepal', 977),
(150, 'Netherlands', 31),
(151, 'Netherlands Antilles', 599),
(152, 'New Caledonia', 687),
(153, 'New Zealand', 64),
(154, 'Nicaragua', 505),
(155, 'Niger', 227),
(156, 'Nigeria', 234),
(157, 'Niue', 683),
(158, 'Norfolk Island', 672),
(159, 'Northern Mariana Islands', 1670),
(160, 'Norway', 47),
(161, 'Oman', 968),
(162, 'Pakistan', 92),
(163, 'Palau', 680),
(164, 'Palestinian Territory, Occupied', 970),
(165, 'Panama', 507),
(166, 'Papua New Guinea', 675),
(167, 'Paraguay', 595),
(168, 'Peru', 51),
(169, 'Philippines', 63),
(170, 'Pitcairn', 0),
(171, 'Poland', 48),
(172, 'Portugal', 351),
(173, 'Puerto Rico', 1787),
(174, 'Qatar', 974),
(175, 'Reunion', 262),
(176, 'Romania', 40),
(177, 'Russian Federation', 70),
(178, 'Rwanda', 250),
(179, 'Saint Helena', 290),
(180, 'Saint Kitts and Nevis', 1869),
(181, 'Saint Lucia', 1758),
(182, 'Saint Pierre and Miquelon', 508),
(183, 'Saint Vincent and the Grenadines', 1784),
(184, 'Samoa', 684),
(185, 'San Marino', 378),
(186, 'Sao Tome and Principe', 239),
(187, 'Saudi Arabia', 966),
(188, 'Senegal', 221),
(189, 'Serbia and Montenegro', 381),
(190, 'Seychelles', 248),
(191, 'Sierra Leone', 232),
(192, 'Singapore', 65),
(193, 'Slovakia', 421),
(194, 'Slovenia', 386),
(195, 'Solomon Islands', 677),
(196, 'Somalia', 252),
(197, 'South Africa', 27),
(198, 'South Georgia and the South Sandwich Islands', 0),
(199, 'Spain', 34),
(200, 'Sri Lanka', 94),
(201, 'Sudan', 249),
(202, 'Suriname', 597),
(203, 'Svalbard and Jan Mayen', 47),
(204, 'Swaziland', 268),
(205, 'Sweden', 46),
(206, 'Switzerland', 41),
(207, 'Syrian Arab Republic', 963),
(208, 'Taiwan, Province of China', 886),
(209, 'Tajikistan', 992),
(210, 'Tanzania, United Republic of', 255),
(211, 'Thailand', 66),
(212, 'Timor-Leste', 670),
(213, 'Togo', 228),
(214, 'Tokelau', 690),
(215, 'Tonga', 676),
(216, 'Trinidad and Tobago', 1868),
(217, 'Tunisia', 216),
(218, 'Turkey', 90),
(219, 'Turkmenistan', 7370),
(220, 'Turks and Caicos Islands', 1649),
(221, 'Tuvalu', 688),
(222, 'Uganda', 256),
(223, 'Ukraine', 380),
(224, 'United Arab Emirates', 971),
(225, 'United Kingdom', 44),
(226, 'United States', 1),
(227, 'United States Minor Outlying Islands', 1),
(228, 'Uruguay', 598),
(229, 'Uzbekistan', 998),
(230, 'Vanuatu', 678),
(231, 'Venezuela', 58),
(232, 'Viet Nam', 84),
(233, 'Virgin Islands, British', 1284),
(234, 'Virgin Islands, U.s.', 1340),
(235, 'Wallis and Futuna', 681),
(236, 'Western Sahara', 212),
(237, 'Yemen', 967),
(238, 'Zambia', 260),
(239, 'Zimbabwe', 263);

-- --------------------------------------------------------

--
-- Table structure for table `decline_replay`
--

CREATE TABLE `decline_replay` (
  `id` int(11) NOT NULL,
  `decline_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` mediumtext NOT NULL,
  `date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `decline_replay`
--

INSERT INTO `decline_replay` (`id`, `decline_id`, `subject`, `body`, `date`) VALUES
(1, 2, 'test', 'fsadf', NULL),
(2, 2, 'replay x', 'xxxxxxxxxxxx', NULL),
(3, 2, 'replay x', 'xxxxxxxxxxxx', NULL),
(4, 3, 'fsd', 'afsdfsadf', '2018-10-08 06:31:13'),
(5, 4, 'test', 'dasf asdf as', '2018-11-03 03:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `gml`
--

CREATE TABLE `gml` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_approved` int(11) NOT NULL DEFAULT '1',
  `is_approved2` int(11) NOT NULL DEFAULT '1',
  `is_approved3` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gml`
--

INSERT INTO `gml` (`id`, `title`, `description`, `remember_token`, `is_approved`, `is_approved2`, `is_approved3`, `created_at`) VALUES
(1, 'meqdad', NULL, NULL, 1, 1, 1, '2018-10-30 10:38:39'),
(2, 'Pipes', 'this material for pips', NULL, 1, 1, 1, '2018-10-30 10:38:39'),
(3, 'afsdf', 'asdf', NULL, 1, 1, 1, '2018-10-30 10:38:39'),
(4, 'hussein', 'ff', NULL, 1, 1, 1, '2018-10-30 10:38:39'),
(5, 'HVAC', 'i dont know whats mean', NULL, 1, 1, 1, '2018-10-30 10:38:39'),
(6, 'General Items', NULL, NULL, 1, 1, 1, '2018-10-30 10:38:39'),
(7, 'test', 'rdsfa', NULL, 1, 1, 1, '2018-10-30 10:38:39'),
(8, 'wq', 'asdf dsf a', NULL, 1, 1, 1, '2018-10-30 10:38:39'),
(9, 'al horya school', 'test', NULL, 1, 1, 1, '2018-10-30 10:38:39'),
(10, 'test school', 'sssss', NULL, 1, 1, 1, '2018-10-30 10:50:11'),
(11, 'test', 'sdafasdf', NULL, 1, 1, 1, '2018-10-30 10:50:07'),
(12, 'test school', 'xxxxxx', NULL, 1, 1, 1, '2018-10-30 10:50:05'),
(13, 'new school', 'dddd', NULL, 1, 1, 1, '2018-10-30 12:15:56');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_extend`
--

CREATE TABLE `inquiry_extend` (
  `id` int(11) NOT NULL,
  `inq_id` int(11) NOT NULL,
  `days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `material_inquiry`
--

CREATE TABLE `material_inquiry` (
  `id` int(10) UNSIGNED NOT NULL,
  `work_zone_id` int(11) NOT NULL,
  `sub_gml_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `close_date` date NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT '0',
  `is_closed` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material_inquiry`
--

INSERT INTO `material_inquiry` (`id`, `work_zone_id`, `sub_gml_id`, `date`, `close_date`, `description`, `is_approved`, `is_closed`) VALUES
(1, 4, 0, '2018-02-10', '2018-03-03', 'fsdfadsf adsf a', 1, 1),
(2, 6, 0, '2018-01-18', '2018-02-08', 'this is the pips inquiry', 1, 1),
(3, 5, 0, '2018-01-10', '2018-01-16', 'fasdfsad', 1, 1),
(4, 10, 0, '2018-01-31', '2018-02-10', 'dfa asdf asdf', 1, 1),
(5, 11, 0, '2018-01-31', '2018-02-09', 'anything', 1, 1),
(6, 14, 0, '2018-03-01', '2018-03-10', 'ereee', 1, 1),
(7, 15, 0, '2018-03-08', '2018-03-10', 'fasdf asdf asdf', 1, 1),
(8, 16, 0, '2018-03-08', '2018-03-10', 'fasdfasd', 1, 1),
(9, 17, 0, '2018-03-14', '2018-03-30', 'fasdf asdf asd', 1, 1),
(10, 18, 0, '2018-03-28', '2018-03-31', 'fdsa fasdf', 1, 1),
(11, 20, 0, '2018-04-01', '2018-04-07', 'hhhhhhhhhh', 1, 1),
(26, 26, 0, '2018-04-26', '2018-05-01', '', 1, 1),
(25, 26, 0, '2018-04-26', '2018-05-01', '', 1, 1),
(24, 25, 0, '2018-05-04', '2018-05-25', 'rewrwe', 1, 1),
(23, 24, 0, '2018-04-25', '2018-05-25', 'yte bf bbf', 1, 1),
(22, 23, 0, '2018-04-05', '2018-04-07', 'anything', 1, 1),
(21, 19, 0, '2018-03-06', '2018-03-28', '', 0, 1),
(27, 27, 0, '2018-04-26', '2018-04-27', '', 1, 1),
(28, 28, 0, '2018-04-10', '2018-04-24', '', 1, 1),
(29, 28, 0, '2018-04-10', '2018-04-24', '', 1, 1),
(30, 22, 0, '2018-05-01', '2018-05-23', '', 1, 1),
(31, 29, 0, '2018-05-01', '2018-05-06', '', 1, 1),
(32, 30, 0, '2018-05-08', '2018-05-16', '', 1, 1),
(33, 31, 0, '2018-05-31', '2018-06-07', '', 1, 1),
(34, 32, 0, '2018-06-07', '2018-06-09', 'fasdf asdf asdf', 0, 1),
(35, 33, 0, '2018-05-23', '2018-06-09', 'gsfdgsdf sdfg', 1, 1),
(36, 35, 0, '2018-06-27', '2018-07-05', 'afsdf adsf sd', 1, 1),
(37, 37, 0, '2017-11-12', '2018-04-30', '', 1, 1),
(38, 38, 0, '2018-10-26', '2018-10-27', 'test', 1, 1),
(39, 40, 0, '2018-10-16', '2018-11-09', 'adsfasdf f a', 0, 1),
(40, 40, 0, '2018-10-16', '2018-11-09', 'adsfasdf f a', 0, 1),
(41, 41, 0, '2018-10-16', '2018-10-26', 'dAD asd DD', 0, 1),
(42, 9, 10, '2018-10-27', '2018-11-10', 'first test x', 1, 1),
(44, 5, 10, '2018-10-30', '2018-11-10', 'yyyyyyy', 1, 1),
(45, 9, 9, '2018-10-30', '2018-11-10', 'sddfasdf asdf a', 1, 1),
(46, 2, 10, '2018-11-01', '2018-12-08', 'xxxxxxxxxxx', 1, 1),
(47, 9, 4, '2018-11-03', '2018-12-08', 'fasdf asd fas', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `material_inquiry_materials`
--

CREATE TABLE `material_inquiry_materials` (
  `id` int(11) NOT NULL,
  `work_zone_id` int(11) NOT NULL,
  `sub_gml_id` int(11) NOT NULL,
  `description` mediumtext NOT NULL,
  `quantity` int(11) NOT NULL,
  `quantity_unit` varchar(255) DEFAULT NULL,
  `size` int(11) NOT NULL,
  `size_unit` varchar(255) DEFAULT NULL,
  `budgetory_price` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_inquiry_materials`
--

INSERT INTO `material_inquiry_materials` (`id`, `work_zone_id`, `sub_gml_id`, `description`, `quantity`, `quantity_unit`, `size`, `size_unit`, `budgetory_price`, `status`) VALUES
(76, 9, 10, 'fasdfasd asdf', 6, 'Meter', 12, 'mm', 192, 3),
(80, 9, 10, 'first item', 22, 'Meter', 5, 'mm', 2010, 3),
(81, 9, 10, 'gsfddg sdfg sdf g', 120, 'Ls', 54, 'mm', 13795, 3),
(118, 5, 10, 'fsda', 10, '', 0, '', 0, 3),
(119, 5, 10, 'fdadsfads  safdda', 90, 'Meter', 50, 'Set', 3600, 3),
(120, 5, 10, 'daf asdfas', 60, 'Meter', 50, 'mm', 2400, 3),
(122, 5, 10, 'lamps', 20, '', 0, '', 0, 3),
(124, 5, 10, 'cameras', 50, '', 0, '', 0, 3),
(125, 5, 10, 'anything', 50, '', 0, '', 0, 3),
(126, 5, 10, 'dfasfa', 62, 'Meter', 12, 'mm', 1270, 3),
(127, 5, 10, 'sdfa fdsaf asd', 57, 'Meter', 30, 'mm', 4875, 3),
(129, 9, 1, 'asdf', 5, 'Ls', 12, 'mm', 50, 2),
(130, 9, 9, 'jhjkh', 15, NULL, 12, NULL, 750, 4),
(134, 3, 10, 'dasdf asdf  fsda', 50, 'Meter', 12, 'mm', 5000, 2),
(135, 3, 10, 'cameras', 12, '', 0, '', 0, 2),
(136, 3, 10, 'anything', 4, '', 0, '', 0, 2),
(139, 3, 10, 'lamps', 110, '', 0, '', 0, 2),
(140, 3, 10, 'fdsaf asdf asd', 78, 'No\'s', 30, 'Inch', 1154, 2),
(143, 2, 10, 'cameras', 10, '', 0, '', 0, 3),
(144, 2, 10, 'lamps', 10, '', 0, '', 0, 3),
(145, 2, 10, 'fasdfa sf', 4, 'No\'s', 2, 'Inch', 240, 3),
(146, 9, 4, '2', 2, 'No\'s', 23, 'Set', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `material_inquiry_suppliers`
--

CREATE TABLE `material_inquiry_suppliers` (
  `id` int(11) NOT NULL,
  `material_inquiry_id` int(11) NOT NULL,
  `suppliers_list` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_inquiry_suppliers`
--

INSERT INTO `material_inquiry_suppliers` (`id`, `material_inquiry_id`, `suppliers_list`) VALUES
(1, 40, '["10", "14", "16"]'),
(2, 41, '["16", "17"]'),
(3, 42, '["10", "14", "16", "17"]'),
(4, 43, '["6"]'),
(5, 44, '["10"]'),
(6, 45, '["10"]'),
(7, 46, '["10"]'),
(8, 47, '["10"]');

-- --------------------------------------------------------

--
-- Table structure for table `material_requisition`
--

CREATE TABLE `material_requisition` (
  `id` int(10) UNSIGNED NOT NULL,
  `boq_id` int(11) NOT NULL,
  `delivery_date` date NOT NULL,
  `complete_date` date NOT NULL,
  `order_date` date DEFAULT NULL,
  `is_approved` int(11) NOT NULL DEFAULT '0',
  `is_checked_out` int(11) NOT NULL DEFAULT '0',
  `supplier_approved` int(11) NOT NULL DEFAULT '0',
  `is_approved_req` int(11) NOT NULL DEFAULT '0',
  `is_approved_lpo` int(11) NOT NULL DEFAULT '0',
  `is_awaiting` int(11) NOT NULL DEFAULT '0',
  `is_delivered` int(11) NOT NULL DEFAULT '0',
  `freight` float NOT NULL DEFAULT '0',
  `discount` float NOT NULL DEFAULT '0',
  `proposal_id` int(11) DEFAULT '0',
  `site_in_charge` int(11) NOT NULL DEFAULT '0',
  `job_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material_requisition`
--

INSERT INTO `material_requisition` (`id`, `boq_id`, `delivery_date`, `complete_date`, `order_date`, `is_approved`, `is_checked_out`, `supplier_approved`, `is_approved_req`, `is_approved_lpo`, `is_awaiting`, `is_delivered`, `freight`, `discount`, `proposal_id`, `site_in_charge`, `job_no`, `order_number`) VALUES
(1, 24, '2018-05-01', '2018-05-05', NULL, 1, 1, 1, 1, 1, 1, 0, 0, 0, NULL, 0, NULL, NULL),
(2, 33, '2018-05-23', '2018-05-31', NULL, 1, 1, 1, 1, 1, 1, 0, 0, 0, NULL, 0, NULL, NULL),
(10, 33, '2018-01-31', '2017-10-30', NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL),
(4, 33, '2018-06-06', '2018-06-09', NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL),
(5, 33, '2018-05-09', '2018-06-08', NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL),
(6, 31, '2018-06-08', '2018-06-09', NULL, 1, 1, 1, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL),
(7, 33, '2018-06-01', '2018-06-09', NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL),
(8, 25, '2018-06-07', '2018-06-09', NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL),
(9, 25, '2018-06-06', '2018-06-08', NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL),
(11, 25, '2018-06-26', '2018-07-06', '2018-06-21', 1, 1, 0, 0, 0, 0, 0, 0, 0, 18, 2, 'Do1', '	P46/09R1'),
(12, 26, '2018-06-29', '2018-07-07', NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, 19, 9, NULL, NULL),
(13, 33, '2018-06-20', '2018-06-30', NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, 26, 9, 'do1', NULL),
(14, 19, '2018-05-02', '2018-05-05', NULL, 1, 0, 0, 0, 0, 0, 0, 0, 0, 13, 8, '3', NULL),
(15, 25, '2018-10-20', '2018-11-02', '2018-07-07', 1, 0, 0, 0, 0, 0, 0, 0, 0, 18, 2, 'Do1', 'Do1011'),
(16, 25, '2018-05-02', '2018-07-27', '2018-07-11', 1, 1, 0, 0, 0, 0, 0, 0, 0, 18, 2, 'do1', 'Do1011'),
(17, 33, '2018-07-24', '2018-08-04', '2018-07-12', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(18, 24, '2018-07-17', '2018-08-04', '2018-07-14', 1, 0, 0, 0, 0, 0, 0, 0, 0, 17, 2, 'Do1', 'Do1011'),
(19, 25, '2018-08-08', '2018-08-09', '2018-07-17', 1, 1, 0, 0, 0, 0, 0, 0, 0, 18, 9, 'do1', 'P43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_10_18_072929_create_gml_table', 1),
(2, '2017_10_18_074611_create_sub_gml_table', 2),
(3, '2017_10_21_121027_create_work_zone_table', 3),
(4, '2017_10_22_071426_create_screens_table', 4),
(5, '2017_10_22_071445_create_rules_table', 4),
(6, '2017_10_23_062511_create_sub_work_zone_table', 5),
(7, '2017_10_24_074554_create_boq_table', 6),
(8, '2017_10_24_075818_create_boqs_table', 7),
(9, '2017_10_24_142159_create_boq_sub_materials_table', 7),
(10, '2017_10_25_120457_create_material_inquiry_table', 8),
(11, '2017_10_28_094746_create_material_inquiries_table', 9),
(12, '2017_10_29_100522_create_supplier_materials_table', 9),
(13, '2017_10_31_133518_create_supplier_proposal_table', 10),
(14, '2017_10_31_133600_create_supplier_proposal_details_table', 10),
(15, '2017_11_02_171944_create_supplier_agreement_table', 11),
(16, '2017_11_03_170218_create_scl_table', 12),
(17, '2017_11_03_170344_create_sub_scl_table', 12),
(18, '2017_11_04_105433_create_scr_table', 13),
(19, '2017_11_04_105558_create_scr_sub_category_table', 13),
(20, '2017_11_05_100637_create_subcontractor_request_table', 14),
(21, '2017_11_05_103700_create_subcontractor_proposal_table', 14),
(22, '2017_11_05_104315_create_subcontractor_agreement_table', 14),
(23, '2017_11_06_054716_create_subcontractor_category_table', 15),
(24, '2017_11_06_054813_create_subcontractor_proposal_details_table', 15),
(25, '2017_11_08_071313_create_users_general_info_table', 16),
(26, '2017_11_08_071342_create_users_work_info_table', 16),
(27, '2017_11_11_071619_create_positions_table', 17),
(28, '2017_11_11_121724_create_position_rules_table', 18),
(29, '2017_11_14_090649_create_material_requisition_table', 19),
(30, '2018_02_12_092902_create_notifications_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `description`, `link`) VALUES
(1, 'New Sub GMLtest', 'there is a new sub genral material list wating to approval to see it plaeas folow the link below .', 'http://127.0.0.1:8000/gml/pendingSub'),
(2, 'New Sub GMLtest', 'there is a new sub genral material list wating to approval to see it plaeas folow the link below .', 'http://127.0.0.1:8000/gml/pendingSub'),
(3, 'New Sub GMLtest', 'there is a new sub genral material list wating to approval to see it plaeas folow the link below .', 'http://127.0.0.1:8000/gml/pendingSub'),
(4, 'New Sub GMLtest98', 'there is a new sub genral material list wating for approval , to check it folow the link below .', 'http://127.0.0.1:8000/gml/pendingSub'),
(5, 'New Inquiry ready', 'there is a new Inquiry Ready to Inquire', 'http://127.0.0.1:8000/boq/showsubboq41'),
(6, 'New Sub GMLfasd', 'there is a new sub genral material list wating for approval , to check it folow the link below .', 'http://127.0.0.1:8000/gml/pendingSub'),
(7, 'New Sub GMLsecond item', 'there is a new sub genral material list wating for approval , to check it folow the link below .', 'http://127.0.0.1:8000/gml/pendingSub'),
(8, 'New Inquiry ready', 'there is a new Inquiry Ready to Inquire', 'http://127.0.0.1:8000/boq/showsubboq46'),
(9, 'New Inquiry ready', 'there is a new Inquiry Ready to Inquire', 'http://127.0.0.1:8000/boq/showsubboq48'),
(10, 'New Inquiry ready', 'there is a new Inquiry Ready to Inquire', 'http://127.0.0.1:8000/boq/showsubboq47'),
(11, 'New Inquiry ready', 'there is a new Inquiry Ready to Inquire', 'http://127.0.0.1:8000/boq/showsubboq49'),
(12, 'New Inquiry ready', 'there is a new Inquiry Ready to Inquire', 'http://127.0.0.1:8000/boq/showsubboq50'),
(13, 'New Inquiry ready', 'there is a new Inquiry Ready to Inquire', 'http://127.0.0.1:8000/boq/showsubboq51'),
(14, 'New Inquiry ready', 'there is a new Inquiry Ready to Inquire', 'http://127.0.0.1:8000/boq/showsubboq52'),
(15, 'New GML', 'A new general material list is waiting for Your approval', 'http://127.0.0.1:8000/gml/pendingGml'),
(16, 'GML', 'A material  waiting for approval', 'http://127.0.0.1:8000/gml/pendingGml'),
(17, 'GML', 'A material  waiting for approval', 'http://127.0.0.1:8000/gml/pendingGml'),
(18, 'GML', 'A material  waiting for approval', 'http://127.0.0.1:8000/gml/pendingGml'),
(19, 'GML', 'A material  is approved', 'http://127.0.0.1:8000/gml/pendingGml'),
(20, 'GML', 'A material  is approved', 'http://127.0.0.1:8000/gml/pendingGml'),
(21, 'GML', 'A material  is approved', 'http://127.0.0.1:8000/gml/pendingGml'),
(22, 'New Sub GML 22222', 'A new sub general material list is waiting for approval', 'http://127.0.0.1:8000/gml/pendingSub'),
(23, 'Sub GML ', 'A sub general material list is waiting for approval', 'http://127.0.0.1:8000/gml/pendingSub'),
(24, 'Sub GML ', 'A sub general material list is waiting for approval', 'http://127.0.0.1:8000/gml/pendingSub'),
(25, 'Sub GML ', 'A sub general material list is approved', 'http://127.0.0.1:8000/gml/pendingSub'),
(26, 'New GML', 'A new general material list is waiting for Your approval', 'http://127.0.0.1:8000/gml/pendingGml'),
(27, 'GML', 'A material  waiting for approval', 'http://127.0.0.1:8000/gml/pendingGml'),
(28, 'GML', 'A material  waiting for approval', 'http://127.0.0.1:8000/gml/pendingGml'),
(29, 'GML', 'A material  is approved', 'http://127.0.0.1:8000/gml/pendingGml'),
(30, 'New Sub GML xsdsa', 'A new sub general material list is waiting for approval', 'http://127.0.0.1:8000/gml/pendingSub'),
(31, 'Sub GML ', 'A sub general material list is waiting for approval', 'http://127.0.0.1:8000/gml/pendingSub'),
(32, 'Sub GML ', 'A sub general material list is waiting for approval', 'http://127.0.0.1:8000/gml/pendingSub'),
(33, 'Sub GML ', 'A sub general material list is approved', 'http://127.0.0.1:8000/gml/pendingSub'),
(34, 'New Inquiry ready', 'there is a new Inquiry Ready to Inquire', 'http://127.0.0.1:8000/boq/showsubboq53'),
(35, 'New Inquiry ready', 'there is a new Inquiry Ready to Inquire', 'http://127.0.0.1:8000/boq/showsubboq54'),
(36, 'New Inquiry ready', 'there is a new Inquiry Ready to Inquire', 'http://127.0.0.1:8000/boq/showsubboq55'),
(37, 'New Inquiry ready', 'there is a new Inquiry Ready to Inquire', 'http://127.0.0.1:8000/boq/showsubboq57'),
(38, 'New Inquiry ready', 'there is a new Inquiry Ready to Inquire', 'http://127.0.0.1:8000/boq/showsubboq56'),
(39, 'New Inquiry ready', 'there is a new Inquiry Ready to Inquire', 'http://127.0.0.1:8000/boq/showsubboq58'),
(40, 'Inquiry ready to approve', 'There is a new Inquiry Ready to Approve', 'http://127.0.0.1:8000/materialinquiry/pending'),
(41, 'Supplier Declined', 'A supplier declined the order', 'http://127.0.0.1:8000/materialinquiry/decline/47'),
(42, 'Supplier Accepted', 'A supplier accepted the order', 'http://127.0.0.1:8000/materialinquiry/suplierProposal/47'),
(43, 'New Proposal waiting for Approval', 'New Proposal is waiting for commercial manager approval', 'http://127.0.0.1:8000/materialinquiry/pendingtoclose'),
(44, 'Proposal waiting for Approval', 'New Proposal is waiting for operations manager approval', 'http://127.0.0.1:8000/materialinquiry/pendingtoclose'),
(45, 'Proposal Approved', 'New Proposal is approved', 'http://127.0.0.1:8000/materialinquiry/closed'),
(46, 'Supplier Declined', 'A supplier declined the agreement', 'http://127.0.0.1:8000/supplier/showDecline/23'),
(47, 'Supplier Accepted Agreement', 'A supplier accepted the agreement', 'http://127.0.0.1:8000/materialinquiry/showAccepted');

-- --------------------------------------------------------

--
-- Table structure for table `notification_users`
--

CREATE TABLE `notification_users` (
  `id` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_read` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_users`
--

INSERT INTO `notification_users` (`id`, `notification_id`, `user_id`, `is_read`, `created_at`) VALUES
(1, 1, 3, 1, '2018-10-30 10:39:25'),
(2, 1, 2, 1, '2018-10-30 10:39:25'),
(3, 2, 3, 0, '2018-10-30 10:39:25'),
(4, 2, 2, 1, '2018-10-31 07:35:36'),
(5, 3, 3, 0, '2018-10-30 10:39:25'),
(6, 3, 2, 1, '2018-10-31 07:35:36'),
(7, 4, 3, 0, '2018-10-30 10:39:25'),
(8, 4, 2, 1, '2018-10-31 07:35:36'),
(9, 5, 2, 1, '2018-10-31 07:35:36'),
(10, 6, 2, 1, '2018-10-31 07:35:36'),
(11, 6, 3, 0, '2018-10-30 10:39:25'),
(12, 7, 2, 1, '2018-10-31 07:35:37'),
(13, 7, 3, 0, '2018-10-30 10:39:25'),
(14, 8, 2, 1, '2018-10-31 07:35:37'),
(15, 9, 2, 1, '2018-10-31 07:35:37'),
(16, 10, 2, 1, '2018-10-31 07:35:45'),
(17, 11, 2, 1, '2018-10-31 07:35:45'),
(18, 12, 2, 1, '2018-10-31 07:35:45'),
(19, 13, 2, 1, '2018-10-31 07:35:45'),
(20, 14, 2, 1, '2018-10-31 07:35:45'),
(21, 15, 2, 1, '2018-10-30 10:47:08'),
(22, 15, 3, 0, '2018-10-30 10:46:52'),
(23, 16, 2, 1, '2018-10-31 07:35:36'),
(24, 16, 3, 0, '2018-10-30 10:47:18'),
(25, 17, 2, 1, '2018-10-31 07:35:35'),
(26, 17, 3, 0, '2018-10-30 10:50:02'),
(27, 18, 2, 1, '2018-10-31 07:35:35'),
(28, 19, 2, 1, '2018-10-31 07:35:35'),
(29, 20, 2, 1, '2018-10-31 07:35:35'),
(30, 21, 2, 1, '2018-10-30 10:50:14'),
(31, 22, 2, 1, '2018-10-30 10:50:28'),
(32, 22, 3, 0, '2018-10-30 10:50:24'),
(33, 23, 2, 1, '2018-10-31 07:35:35'),
(34, 23, 3, 0, '2018-10-30 10:50:30'),
(35, 24, 2, 1, '2018-10-31 07:35:35'),
(36, 25, 2, 1, '2018-10-31 07:35:35'),
(37, 26, 2, 1, '2018-10-30 12:15:44'),
(38, 26, 3, 0, '2018-10-30 12:15:40'),
(39, 27, 2, 1, '2018-10-30 12:15:51'),
(40, 27, 3, 0, '2018-10-30 12:15:48'),
(41, 28, 2, 1, '2018-10-31 07:33:42'),
(42, 29, 2, 1, '2018-10-31 07:33:42'),
(43, 30, 2, 1, '2018-10-30 12:16:10'),
(44, 30, 3, 0, '2018-10-30 12:16:08'),
(45, 31, 2, 1, '2018-10-30 12:16:14'),
(46, 31, 3, 0, '2018-10-30 12:16:12'),
(47, 32, 2, 1, '2018-10-31 07:33:42'),
(48, 33, 2, 1, '2018-10-31 07:33:42'),
(49, 34, 2, 1, '2018-10-31 07:33:42'),
(50, 35, 2, 1, '2018-10-31 07:33:42'),
(51, 36, 2, 1, '2018-10-31 07:33:42'),
(52, 37, 2, 0, '2018-11-01 10:21:40'),
(53, 37, 19, 0, '2018-11-01 10:21:40'),
(54, 38, 2, 0, '2018-11-01 10:21:43'),
(55, 38, 19, 0, '2018-11-01 10:21:43'),
(56, 39, 2, 0, '2018-11-03 07:03:10'),
(57, 39, 19, 0, '2018-11-03 07:03:10'),
(58, 40, 2, 1, '2018-11-03 07:03:36'),
(59, 40, 19, 0, '2018-11-03 07:03:28'),
(60, 41, 2, 1, '2018-11-03 07:06:10'),
(61, 41, 19, 0, '2018-11-03 07:06:04'),
(62, 42, 2, 0, '2018-11-03 07:06:49'),
(63, 42, 19, 0, '2018-11-03 07:06:49'),
(64, 44, 2, 0, '2018-11-03 07:10:56'),
(65, 45, 2, 0, '2018-11-03 07:10:58'),
(66, 46, 2, 1, '2018-11-03 07:15:05'),
(67, 47, 2, 0, '2018-11-03 07:20:18');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `title`) VALUES
(1, 'fasd'),
(2, 'QS Engineer'),
(3, 'new position'),
(4, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `position_rules`
--

CREATE TABLE `position_rules` (
  `id` int(10) UNSIGNED NOT NULL,
  `position_id` int(11) NOT NULL,
  `screen_id` int(11) NOT NULL,
  `can_show` int(11) NOT NULL,
  `can_edit` int(11) NOT NULL,
  `can_approve` int(11) NOT NULL,
  `can_approve2` int(11) NOT NULL DEFAULT '0',
  `can_approve3` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `position_rules`
--

INSERT INTO `position_rules` (`id`, `position_id`, `screen_id`, `can_show`, `can_edit`, `can_approve`, `can_approve2`, `can_approve3`) VALUES
(1, 1, 1, 1, 1, 1, 0, 0),
(2, 1, 2, 0, 0, 0, 0, 0),
(3, 1, 3, 0, 0, 0, 0, 0),
(4, 1, 4, 0, 0, 0, 0, 0),
(5, 1, 5, 0, 0, 0, 0, 0),
(6, 1, 6, 0, 0, 0, 0, 0),
(7, 1, 7, 0, 0, 0, 0, 0),
(8, 1, 8, 0, 0, 0, 0, 0),
(9, 1, 9, 0, 0, 0, 0, 0),
(10, 1, 10, 0, 0, 0, 0, 0),
(11, 2, 1, 0, 1, 0, 0, 0),
(12, 2, 2, 0, 0, 0, 0, 0),
(13, 2, 3, 0, 0, 0, 0, 0),
(14, 2, 4, 1, 1, 0, 0, 0),
(15, 2, 5, 1, 1, 0, 0, 0),
(16, 2, 6, 1, 1, 0, 0, 0),
(17, 2, 7, 0, 0, 0, 0, 0),
(18, 2, 8, 0, 0, 0, 0, 0),
(19, 2, 9, 1, 1, 1, 0, 0),
(20, 2, 10, 1, 1, 1, 1, 0),
(21, 3, 1, 1, 1, 1, 0, 0),
(22, 3, 2, 1, 1, 1, 0, 0),
(23, 3, 3, 0, 0, 0, 0, 0),
(24, 3, 4, 0, 0, 0, 0, 0),
(25, 3, 5, 0, 0, 0, 0, 0),
(26, 3, 6, 0, 0, 0, 0, 0),
(27, 3, 7, 0, 0, 0, 0, 0),
(28, 3, 8, 0, 0, 0, 0, 0),
(29, 3, 9, 0, 0, 0, 0, 0),
(30, 3, 10, 0, 0, 0, 0, 0),
(31, 4, 1, 1, 1, 1, 0, 0),
(32, 4, 2, 1, 1, 1, 0, 0),
(33, 4, 3, 1, 1, 1, 0, 0),
(34, 4, 4, 1, 1, 1, 0, 0),
(35, 4, 5, 1, 1, 1, 0, 0),
(36, 4, 6, 1, 1, 1, 0, 0),
(37, 4, 7, 1, 0, 1, 0, 0),
(38, 4, 8, 1, 0, 1, 0, 0),
(39, 4, 9, 1, 1, 1, 0, 0),
(40, 4, 10, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `proposal_reply`
--

CREATE TABLE `proposal_reply` (
  `id` int(11) NOT NULL,
  `proposal_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` mediumtext NOT NULL,
  `date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proposal_reply`
--

INSERT INTO `proposal_reply` (`id`, `proposal_id`, `subject`, `body`, `date`) VALUES
(1, 29, 'test', 'this is just for test', '2018-10-30 07:35:15');

-- --------------------------------------------------------

--
-- Table structure for table `requisition_accessory`
--

CREATE TABLE `requisition_accessory` (
  `id` int(11) NOT NULL,
  `requisition_id` int(11) NOT NULL,
  `sub_material_id` int(11) NOT NULL,
  `accsessory_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requisition_accessory`
--

INSERT INTO `requisition_accessory` (`id`, `requisition_id`, `sub_material_id`, `accsessory_id`, `quantity`) VALUES
(1, 1, 36, 4, 10),
(2, 1, 36, 5, 10),
(3, 8, 36, 4, 12),
(4, 9, 36, 4, 4),
(5, 9, 36, 5, 5),
(6, 11, 36, 4, 12),
(7, 11, 36, 5, 12),
(8, 12, 37, 8, 20),
(9, 12, 37, 8, 10),
(10, 12, 39, 6, 30),
(11, 12, 39, 7, 90),
(12, 12, 39, 6, 30),
(13, 12, 39, 7, 90),
(14, 15, 36, 4, 4),
(15, 16, 36, 4, 2),
(16, 18, 33, 2, 6),
(17, 18, 33, 3, 6),
(18, 19, 36, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `requisition_materials`
--

CREATE TABLE `requisition_materials` (
  `id` int(11) NOT NULL,
  `requisition_id` int(11) NOT NULL,
  `sub_material_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requisition_materials`
--

INSERT INTO `requisition_materials` (`id`, `requisition_id`, `sub_material_id`, `quantity`) VALUES
(1, 1, 35, 10),
(2, 1, 36, 10),
(3, 2, 49, 10),
(5, 4, 49, 10),
(6, 5, 49, 10),
(7, 6, 47, 1),
(8, 7, 49, 15),
(9, 9, 35, 2),
(10, 9, 36, 3),
(11, 10, 49, 3),
(12, 11, 35, 12),
(13, 11, 36, 12),
(14, 12, 37, 20),
(15, 12, 37, 30),
(16, 12, 38, 100),
(17, 12, 38, 300),
(18, 12, 39, 40),
(19, 12, 39, 50),
(20, 13, 49, 3),
(21, 14, 28, 2),
(22, 15, 35, 3),
(23, 15, 36, 4),
(24, 16, 36, 1),
(25, 17, 49, 4),
(26, 18, 34, 6),
(27, 18, 33, 6),
(28, 19, 36, 2);

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `screen_id` int(11) NOT NULL,
  `can_show` int(11) NOT NULL,
  `can_edit` int(11) NOT NULL,
  `can_approve` int(11) NOT NULL,
  `can_approve2` int(11) NOT NULL DEFAULT '0',
  `can_approve3` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `user_id`, `screen_id`, `can_show`, `can_edit`, `can_approve`, `can_approve2`, `can_approve3`) VALUES
(1, 2, 1, 1, 1, 1, 1, 1),
(2, 2, 2, 1, 1, 1, 0, 0),
(3, 2, 3, 1, 1, 0, 0, 0),
(4, 2, 4, 1, 1, 1, 0, 0),
(5, 2, 5, 1, 1, 1, 1, 1),
(6, 2, 6, 1, 1, 1, 0, 0),
(7, 2, 9, 1, 1, 1, 0, 0),
(8, 2, 10, 1, 1, 1, 1, 0),
(9, 2, 11, 0, 0, 0, 0, 0),
(10, 2, 8, 1, 0, 1, 1, 0),
(11, 2, 7, 1, 0, 1, 1, 0),
(12, 2, 12, 1, 1, 0, 0, 0),
(13, 2, 13, 1, 1, 0, 0, 0),
(14, 2, 14, 1, 1, 0, 0, 0),
(15, 5, 1, 0, 0, 0, 0, 0),
(16, 5, 2, 0, 0, 0, 0, 0),
(17, 5, 3, 0, 0, 0, 0, 0),
(18, 5, 4, 0, 0, 0, 0, 0),
(19, 5, 5, 0, 0, 0, 0, 0),
(20, 5, 6, 0, 0, 0, 0, 0),
(21, 5, 7, 0, 0, 0, 0, 0),
(22, 5, 8, 0, 0, 0, 0, 0),
(23, 5, 9, 0, 0, 0, 0, 0),
(24, 5, 10, 0, 0, 0, 0, 0),
(25, 4, 1, 0, 0, 0, 0, 0),
(26, 4, 2, 0, 0, 0, 0, 0),
(27, 4, 3, 0, 0, 0, 0, 0),
(28, 4, 4, 0, 0, 0, 0, 0),
(29, 4, 5, 0, 0, 0, 0, 0),
(30, 4, 6, 0, 0, 0, 0, 0),
(31, 4, 7, 0, 0, 0, 0, 0),
(32, 4, 8, 0, 0, 0, 0, 0),
(33, 4, 9, 0, 0, 0, 0, 0),
(34, 4, 10, 0, 0, 0, 0, 0),
(35, 4, 11, 0, 0, 0, 0, 0),
(36, 4, 12, 0, 0, 0, 0, 0),
(37, 4, 13, 0, 0, 0, 0, 0),
(38, 4, 14, 0, 0, 0, 0, 0),
(39, 8, 1, 0, 0, 0, 0, 0),
(40, 8, 2, 0, 0, 0, 0, 0),
(41, 8, 3, 0, 0, 0, 0, 0),
(42, 8, 4, 0, 0, 0, 0, 0),
(43, 8, 5, 0, 0, 0, 0, 0),
(44, 8, 6, 0, 0, 0, 0, 0),
(45, 8, 7, 0, 0, 0, 0, 0),
(46, 8, 8, 0, 0, 0, 0, 0),
(47, 8, 9, 0, 0, 0, 0, 0),
(48, 8, 10, 0, 0, 0, 0, 0),
(49, 9, 1, 0, 1, 0, 0, 0),
(50, 9, 2, 1, 0, 0, 0, 0),
(51, 9, 3, 0, 0, 0, 0, 0),
(52, 9, 4, 1, 0, 0, 0, 0),
(53, 9, 5, 0, 0, 0, 0, 0),
(54, 9, 6, 0, 0, 0, 0, 0),
(55, 9, 7, 0, 0, 0, 0, 0),
(56, 9, 8, 0, 0, 0, 0, 0),
(57, 9, 9, 1, 1, 1, 0, 0),
(58, 9, 10, 1, 1, 1, 1, 0),
(59, 9, 11, 0, 0, 0, 0, 0),
(60, 9, 12, 0, 0, 0, 0, 0),
(61, 9, 13, 0, 0, 0, 0, 0),
(62, 9, 14, 0, 0, 0, 0, 0),
(63, 5, 11, 0, 0, 0, 0, 0),
(64, 5, 12, 0, 0, 0, 0, 0),
(65, 5, 13, 0, 0, 0, 0, 0),
(66, 5, 14, 0, 0, 0, 0, 0),
(67, 8, 11, 0, 0, 0, 0, 0),
(68, 8, 12, 0, 0, 0, 0, 0),
(69, 8, 13, 0, 0, 0, 0, 0),
(70, 8, 14, 0, 0, 0, 0, 0),
(71, 3, 1, 1, 1, 1, 0, 0),
(72, 3, 2, 1, 1, 1, 0, 0),
(73, 3, 3, 0, 0, 0, 0, 0),
(74, 3, 4, 0, 0, 0, 0, 0),
(75, 3, 5, 0, 0, 0, 0, 0),
(76, 3, 6, 0, 0, 0, 0, 0),
(77, 3, 9, 0, 0, 0, 0, 0),
(78, 3, 10, 0, 0, 0, 0, 0),
(79, 3, 11, 0, 0, 0, 0, 0),
(80, 3, 8, 0, 0, 0, 0, 0),
(81, 3, 7, 0, 0, 0, 0, 0),
(82, 3, 12, 0, 0, 0, 0, 0),
(83, 3, 13, 0, 0, 0, 0, 0),
(84, 3, 14, 0, 0, 0, 0, 0),
(85, 19, 1, 1, 1, 1, 1, 1),
(86, 19, 2, 1, 1, 1, 0, 0),
(87, 19, 3, 1, 1, 0, 0, 0),
(88, 19, 4, 1, 1, 1, 0, 0),
(89, 19, 5, 1, 1, 1, 0, 0),
(90, 19, 6, 1, 1, 1, 0, 0),
(91, 19, 7, 1, 0, 1, 1, 0),
(92, 19, 8, 1, 0, 1, 1, 0),
(93, 19, 9, 1, 1, 1, 0, 0),
(94, 19, 10, 1, 1, 1, 1, 0),
(95, 19, 11, 0, 0, 0, 0, 0),
(96, 19, 12, 1, 1, 0, 0, 0),
(97, 19, 13, 1, 1, 0, 0, 0),
(98, 19, 14, 1, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `scl`
--

CREATE TABLE `scl` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scl`
--

INSERT INTO `scl` (`id`, `title`, `description`) VALUES
(1, 'asdf', 'ewfads'),
(2, 'jkkljkjk', 'jlkjkljopi poi lklk;lk');

-- --------------------------------------------------------

--
-- Table structure for table `scr`
--

CREATE TABLE `scr` (
  `id` int(10) UNSIGNED NOT NULL,
  `sub_work_zone_id` int(11) NOT NULL,
  `sub_scl_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `request_is_created` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scr`
--

INSERT INTO `scr` (`id`, `sub_work_zone_id`, `sub_scl_id`, `status`, `request_is_created`) VALUES
(2, 26, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `screens`
--

CREATE TABLE `screens` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `screens`
--

INSERT INTO `screens` (`id`, `name`) VALUES
(1, 'GML'),
(2, 'Work Zone'),
(3, 'Scl'),
(4, 'Boq'),
(5, 'Material inquiry'),
(6, 'Subcontractor Request'),
(7, 'Supplier'),
(8, 'Subcontractor'),
(9, 'Material Requisition'),
(10, 'Material Requisition'),
(11, 'Material Requisition'),
(12, 'Users'),
(13, 'Rules'),
(14, 'Positions');

-- --------------------------------------------------------

--
-- Table structure for table `scr_sub_category`
--

CREATE TABLE `scr_sub_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `scr_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `budgetory_price` double NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_scope` mediumtext COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scr_sub_category`
--

INSERT INTO `scr_sub_category` (`id`, `scr_id`, `quantity`, `budgetory_price`, `description`, `work_scope`) VALUES
(5, 2, 2, 2, '2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcontractor_agreement`
--

CREATE TABLE `subcontractor_agreement` (
  `id` int(10) UNSIGNED NOT NULL,
  `subcontractor_id` int(11) NOT NULL,
  `sub_scl_id` int(11) NOT NULL,
  `proposal_id` int(11) NOT NULL,
  `final_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_terms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_agreement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approve_date` date NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT '0',
  `is_subcontractor_accepted` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcontractor_category`
--

CREATE TABLE `subcontractor_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `subcontractor_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcontractor_decline`
--

CREATE TABLE `subcontractor_decline` (
  `id` int(11) NOT NULL,
  `subcontractor_id` int(11) NOT NULL,
  `subcontractor_request_id` int(11) NOT NULL,
  `decline_reason` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subcontractor_proposal`
--

CREATE TABLE `subcontractor_proposal` (
  `id` int(10) UNSIGNED NOT NULL,
  `subcontractor_id` int(11) NOT NULL,
  `scr_id` int(11) NOT NULL,
  `subcontractor_request_id` int(11) NOT NULL,
  `proposal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consider` int(11) NOT NULL DEFAULT '0',
  `is_accepted` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcontractor_proposal_details`
--

CREATE TABLE `subcontractor_proposal_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `proposal_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcontractor_request`
--

CREATE TABLE `subcontractor_request` (
  `id` int(10) UNSIGNED NOT NULL,
  `scr_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `close_date` date NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT '0',
  `is_closed` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_gml`
--

CREATE TABLE `sub_gml` (
  `id` int(10) UNSIGNED NOT NULL,
  `gml_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_approved` int(11) NOT NULL,
  `is_approved2` int(11) NOT NULL DEFAULT '1',
  `is_approved3` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_gml`
--

INSERT INTO `sub_gml` (`id`, `gml_id`, `title`, `description`, `remember_token`, `is_approved`, `is_approved2`, `is_approved3`, `created_at`) VALUES
(1, 1, 'meqdad22', 'jkhjk', NULL, 1, 1, 1, '2018-10-30 10:38:57'),
(2, 1, 'fgjhg', NULL, NULL, 1, 1, 1, '2018-10-30 10:38:57'),
(3, 2, 'pips 60', 'aklsdjf fds', NULL, 1, 1, 1, '2018-10-30 10:38:57'),
(4, 2, 'pips 50', 'fsdaf', NULL, 1, 1, 1, '2018-10-30 10:38:57'),
(7, 3, 'fasdfa asdf', 'fadsfa asdf asd', NULL, 1, 1, 1, '2018-10-30 10:38:57'),
(9, 4, 'ahmad', 'ccc', NULL, 1, 1, 1, '2018-10-30 10:38:57'),
(10, 5, 'pips', NULL, NULL, 1, 1, 1, '2018-10-30 10:38:57'),
(11, 5, 'chillers', NULL, NULL, 1, 1, 1, '2018-10-30 10:38:57'),
(12, 6, 'general material', 'ddd', NULL, 1, 1, 1, '2018-10-30 10:38:57'),
(13, 6, 'test', 'fff', NULL, 1, 1, 1, '2018-10-30 10:38:57'),
(14, 6, 'test', 'fff', NULL, 1, 1, 1, '2018-10-30 10:38:57'),
(15, 6, 'test', 'fff', NULL, 1, 1, 1, '2018-10-30 10:38:57'),
(16, 9, 'fasd', 'fasdfads', NULL, 1, 1, 1, '2018-10-30 10:38:57'),
(17, 9, 'second item', 'yyyyyyyyyyyy', NULL, 1, 1, 1, '2018-10-30 10:38:57'),
(18, 12, '22222', 'sss', NULL, 1, 1, 1, '2018-10-30 10:50:40'),
(19, 13, 'xsdsa', 'dsad', NULL, 1, 1, 1, '2018-10-30 12:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `sub_scl`
--

CREATE TABLE `sub_scl` (
  `id` int(10) UNSIGNED NOT NULL,
  `scl_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `is_approved` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_scl`
--

INSERT INTO `sub_scl` (`id`, `scl_id`, `title`, `description`, `is_approved`) VALUES
(1, 1, 'meqdad', 'fasdfasd', 1),
(4, 2, 'ffff', 'ffff', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_work_zone`
--

CREATE TABLE `sub_work_zone` (
  `id` int(10) UNSIGNED NOT NULL,
  `work_zone_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_work_zone`
--

INSERT INTO `sub_work_zone` (`id`, `work_zone_id`, `title`) VALUES
(1, 1, 'xxxxx'),
(2, 2, 'ajman school'),
(3, 1, 'test test'),
(4, 2, 'fasdfadsfasd'),
(5, 2, 'fasd'),
(6, 2, 'al horya school'),
(7, 2, 'shhhhh'),
(8, 2, 'cccv'),
(9, 3, 'sad'),
(10, 3, 'x'),
(11, 3, 's'),
(12, 3, 'q'),
(13, 3, 'e'),
(14, 3, 'qw'),
(15, 3, 'wq'),
(16, 3, 'ewq'),
(17, 3, 'rew'),
(18, 3, 'rwe'),
(19, 3, 're'),
(20, 3, 're'),
(21, 3, 'first floor'),
(22, 3, 'scound floor'),
(23, 5, 'first Floor'),
(24, 5, 'fff'),
(25, 5, 'test7'),
(26, 5, 'test'),
(27, 4, 'ddddddd'),
(28, 4, 'ddas'),
(29, 4, 'test'),
(30, 4, 'test'),
(31, 4, 't'),
(32, 4, 'gf'),
(33, 4, 'f'),
(34, 4, 'ss'),
(35, 4, 'ww'),
(36, 4, 'wq'),
(37, 4, 'wq'),
(38, 4, 'wq'),
(39, 4, 'wq'),
(40, 4, 'wq'),
(41, 4, 'wq'),
(42, 4, 'ff'),
(43, 4, 'gsdf'),
(44, 4, 'dsa'),
(45, 4, 'dsa'),
(46, 4, 'fsdaf'),
(47, 4, '12'),
(48, 4, 'dSA'),
(49, 4, 'dSA'),
(50, 4, 'dSA'),
(51, 4, 'dadsf'),
(52, 4, 'fsdg'),
(53, 4, 'gsdf'),
(54, 4, 'gsdf'),
(55, 4, 'das'),
(56, 4, 'fa'),
(57, 4, 'rw'),
(58, 4, 'dsf'),
(59, 4, 'dsf'),
(60, 4, 'das'),
(61, 4, 'fasd'),
(62, 8, 'first floor'),
(63, 9, 'first floor'),
(64, 9, 'second floor'),
(65, 9, 'thered floor'),
(66, 5, 'basment');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_agreement`
--

CREATE TABLE `supplier_agreement` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `sub_gml_id` int(11) NOT NULL,
  `work_zone_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `proposal_id` int(11) NOT NULL,
  `quotation_ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_terms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `all_materials` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submital_requisted` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copies_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_approved` int(11) NOT NULL DEFAULT '0',
  `is_supplier_accepted` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier_agreement`
--

INSERT INTO `supplier_agreement` (`id`, `supplier_id`, `sub_gml_id`, `work_zone_id`, `proposal_id`, `quotation_ref`, `payment_terms`, `supplier_code`, `all_materials`, `submital_requisted`, `copies_number`, `is_approved`, `is_supplier_accepted`) VALUES
(1, 10, 3, '0', 1, 'ds21', 'fkajhf', 'klsdjg43214', NULL, 'Hard Copy', '0', 1, 1),
(2, 10, 4, '0', 2, '321e', 'fasdf', 'fsdfas', NULL, 'Hard Copy', '0', 1, 1),
(3, 6, 3, '0', 4, 'e21', 'fsdaf', 'rew23', NULL, 'Hard Copy', '0', 1, 1),
(4, 10, 9, '0', 13, '31ew', 'asdf', '4', 'All Materials', 'Hard Copy', '0', 1, 1),
(11, 10, 10, '0', 17, '124XV', '20 days', 're23', 'All Materials', 'Hard Copy', '3', 1, 1),
(12, 10, 10, '0', 18, '21', '5days', '423ew', 'All Materials', 'Hard Copy', '3', 1, 1),
(10, 10, 11, '0', 16, 'de12', '4', 'fd2', 'All Materials', 'Soft Copy', '4', 1, 1),
(13, 10, 10, '0', 19, '23', '4 days', '34dfas', '0', 'Softcopy', '5', 1, 1),
(14, 10, 11, '0', 20, '54', 'y', 'rt5', '0', 'hardcopy', '3', 1, 1),
(15, 10, 11, '0', 21, '3', '3', '3', '0', 'Softcopy', '0', 1, 1),
(16, 10, 10, '0', 22, '3de', 'asdf', 'fer2', '0', 'hardcopy', '4', 1, 1),
(17, 10, 10, '0', 23, '124XV', '3', '21332', '0', 'hardcopy', '6', 1, 1),
(18, 10, 10, '0', 24, '124XV', '3', '21332', '0', 'Softcopy', '12', 1, 1),
(19, 10, 11, '0', 25, '34', '3', 'e3', 'Some Materials', 'Softcopy', '5', 1, 1),
(20, 10, 11, '0', 26, '124XV', '3', '3e4', 'All Materials', 'Hard Copy', '3', 1, 1),
(21, 6, 9, '0', 27, '124XV', '3', '21332', 'All Materials', 'Softcopy', '3', 1, 1),
(22, 10, 9, '9', 29, '124XV', '3', '21332', 'All Materials', 'Soft Copy', '1', 1, 1),
(23, 10, 4, '9', 32, '124XV', '3', '21332', 'All Materials', 'Soft Copy', '1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_agreement_decline`
--

CREATE TABLE `supplier_agreement_decline` (
  `id` int(11) NOT NULL,
  `agreement_id` int(11) NOT NULL,
  `reason` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_agreement_decline`
--

INSERT INTO `supplier_agreement_decline` (`id`, `agreement_id`, `reason`) VALUES
(1, 3, 'das asd sad qwad adf asdfasd fasd'),
(2, 22, 'i dont want to accept this agreement'),
(3, 23, 'fasdf afasd fasd');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_decline`
--

CREATE TABLE `supplier_decline` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `material_inquiry_id` int(11) NOT NULL,
  `decline_reason` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_decline`
--

INSERT INTO `supplier_decline` (`id`, `supplier_id`, `material_inquiry_id`, `decline_reason`) VALUES
(1, 10, 7, 'fdsfas dfa sdf as'),
(2, 10, 38, 'this is not okay i want more specific things'),
(3, 10, 38, 'test decline 2'),
(4, 10, 47, 'dddddddddddd'),
(5, 10, 47, 'dddddddddddd');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_materials`
--

CREATE TABLE `supplier_materials` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `submaterila_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier_materials`
--

INSERT INTO `supplier_materials` (`id`, `supplier_id`, `submaterila_id`) VALUES
(1, 10, 4),
(2, 10, 3),
(12, 6, 3),
(14, 6, 9),
(11, 6, 4),
(13, 6, 1),
(8, 6, 2),
(15, 6, 7),
(21, 10, 10),
(17, 10, 11),
(18, 13, 9),
(20, 10, 9),
(22, 15, 12),
(23, 15, 13),
(24, 15, 14),
(25, 15, 15),
(26, 17, 10),
(27, 17, 11),
(28, 16, 10),
(29, 16, 11),
(30, 14, 10),
(31, 14, 11);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_proposal`
--

CREATE TABLE `supplier_proposal` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `boq_id` int(11) NOT NULL,
  `material_inquiry_id` int(11) NOT NULL,
  `proposal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compliance` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_period` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `consider` int(11) NOT NULL DEFAULT '0',
  `is_accepted` int(11) NOT NULL DEFAULT '0',
  `is_approved` int(11) NOT NULL DEFAULT '0',
  `is_approved2` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier_proposal`
--

INSERT INTO `supplier_proposal` (`id`, `supplier_id`, `boq_id`, `material_inquiry_id`, `proposal`, `total_price`, `compliance`, `delivery_period`, `contact_person`, `email`, `consider`, `is_accepted`, `is_approved`, `is_approved2`) VALUES
(1, 10, 6, 2, 'this is zen proposal', '', '', '', '', '', 1, 1, 1, 1),
(2, 10, 5, 3, 'fasdfadsf afsdf', '', '', '', '', '', 1, 1, 1, 1),
(3, 6, 10, 4, 'tre erwtwer er', '', '', '', '', '', 1, 1, 1, 1),
(4, 6, 11, 5, 'fghfg jjjj  fjh j', '', '', '', '', '', 1, 1, 1, 1),
(5, 6, 14, 6, 'trte', '', '', '', '', '', 1, 1, 1, 1),
(6, 10, 15, 7, '', '15000', '', '23days', 'ahmad', 'ahmad@abc-gcc.com', 1, 0, 1, 1),
(7, 10, 15, 7, '', '15000', '', '23days', 'ahmad', 'ahmad@abc-gcc.com', 0, 0, 1, 1),
(8, 10, 15, 7, '', '234.2', '', '1das', 'dsa', 'abo.ateleh@gmail.com', 1, 1, 1, 1),
(9, 10, 15, 7, '', '0.0', 'Full', 'ds', 'ds', 'abo.ateleh@gmail.com', 0, 0, 1, 1),
(10, 10, 17, 9, '', '500', 'Partial', '2', 'ahmad', 'abo.ateleh@gmail.com', 1, 1, 1, 1),
(11, 10, 20, 11, '', '666', 'Full', '75', 'ahmad', 'abo.ateleh@gmail.com', 1, 1, 1, 1),
(13, 10, 19, 21, '', '0.0', 'Full', '12', 'd', 'ahmad@abc-gcc.com', 1, 1, 1, 1),
(14, 10, 23, 22, '', '5000', 'Full', '20', 'Ahmad', 'ahmad@abc-gcc.com', 0, 0, 1, 1),
(15, 10, 23, 22, '', '5000', 'Full', '20', 'Ahmad', 'ahmad@abc-gcc.com', 0, 0, 1, 1),
(16, 10, 23, 22, '', '5000', 'Full', '20', 'Ahmad', 'ahmad@abc-gcc.com', 1, 1, 1, 1),
(17, 10, 24, 23, '', '1500', 'Full', '12 days', 'ahmad', 'abo.ateleh@gmail.com', 1, 1, 1, 1),
(18, 10, 25, 24, '', '300', 'Full', '12 days', 'ahmad', 'abo.ateleh@gmail.com', 1, 1, 1, 1),
(19, 10, 26, 26, '', '100', 'Partial', '4', 'ahmad', 'ahmad@abc-gcc.com', 1, 1, 1, 1),
(20, 10, 27, 27, '', '900', 'Full', '6', 'yy', 'fsdf@das.com', 1, 1, 1, 1),
(21, 10, 28, 29, '', '0.0', 'Full', '3', 'e', 'abo.ateleh@gmail.com', 1, 1, 1, 1),
(22, 10, 22, 30, '', '0.0', 'Partial', '3 days', 'ahmad', 'abo.ateleh@gmail.com', 1, 1, 1, 1),
(23, 10, 29, 31, '', '67', 'Full', '3', 'ahmad', 'abo.ateleh@gmail.com', 1, 1, 1, 1),
(24, 10, 30, 32, '', '100', 'Full', '3', 'ahmad', 'abo.ateleh@gmail.com', 1, 1, 1, 1),
(25, 10, 31, 33, '', '200', 'Full', '3', 'ahmad', 'fsdf@das.com', 1, 1, 1, 1),
(26, 10, 33, 35, '', '500', 'Full', '3', 'ahmad', 'abo.ateleh@gmail.com', 1, 1, 1, 1),
(27, 6, 37, 37, '', '45444', 'Full', '3', 'ahmad', 'abo.ateleh@gmail.com', 1, 1, 1, 1),
(28, 10, 0, 44, '', '500', 'Full', '3', NULL, NULL, 1, 1, 1, 1),
(29, 10, 0, 45, '', '500', 'Full', '12', 'ahmad', 'abo.ateleh@gmail.com', 1, 1, 1, 1),
(30, 10, 0, 42, '', '500', 'Full', '3 days', NULL, NULL, 1, 1, 1, 1),
(31, 10, 0, 46, '', '500', 'Full', '3 days', 'ahmad', NULL, 1, 1, 1, 1),
(32, 10, 0, 47, '', '500', 'Full', '3 days', NULL, NULL, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_proposal_details`
--

CREATE TABLE `supplier_proposal_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `propsal_id` int(11) NOT NULL,
  `sub_materials_id` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier_proposal_details`
--

INSERT INTO `supplier_proposal_details` (`id`, `propsal_id`, `sub_materials_id`, `price`, `model_number`, `description`) VALUES
(1, 1, 3, '200', '432erw', '534tervt esr ts t'),
(2, 1, 4, '500', '534rewr', 'ertsertset ert et ert'),
(3, 2, 5, '50', 'df213', 'sdafasd'),
(4, 3, 9, '500', 'df3424', 'gfsd sdfg sfg'),
(5, 3, 10, '2500', 'wer234', 'sdfg er tsdfgsdf re'),
(6, 4, 14, '765', '756', '7nju'),
(7, 4, 15, '56756', '7657', 'dh'),
(8, 5, 18, '4500', '231', '234gfe'),
(9, 5, 19, '6000', NULL, 'terwt');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` int(11) NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT '0',
  `is_approved2` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `user_type`, `is_approved`, `is_approved2`) VALUES
(3, 'miqdad', 'mekdad_da@yahoo.com', '$2y$10$6dzAmQrk1btSz9pONN9HlOb/7LJCx9853hJjXTJfZ4MTVMq/oagvC', 'kW6ywqgccdlBsKHRhucsxjTQ0Q0pnK4brZqvRAJq', '2017-12-27 02:01:31', '2018-09-09 01:54:13', 1, 1, 1),
(2, 'miqdad abu ateleh', 'abo.ateleh@gmail.com', '$2y$10$rAWeO62hA2OSMKXf2uvl/eKnoHbSHQF59AGAnqrdYw6T/pJ3rYslC', '3wwZe30yVAUOsZ4iivn1Izmje01djplG59uz1P40TomxKOzXjotFcbP01ZFe', '2017-12-25 20:00:00', '2018-01-02 08:19:26', 1, 1, 1),
(4, 'hussein shareef', 'husseinshareef1@yahoo.com', '$2y$10$CZnjaeNzsfudvbp/ICYJFesbAcoGfOKFIVfOVevnuUyqmQxiSnIaC', 'j1mi4AWP9MGy4y4jQK2R2Q6hT4StWL3NKssvGabH', '2017-12-27 02:02:37', '2018-01-02 03:54:14', 1, 1, 1),
(5, 'ali saleem', 'ali@abc-gcc.com', '$2y$10$iYZ//CX6kVyXlpmm3kASMervl1p8jPnff1XrPX.AnzGy0A.hhNrU2', 'lJ5RFLzFPD6KQa8ZY6TqzYvzPhwez61mgbZ8dXHA', '2017-12-27 02:03:41', '2017-12-27 02:03:41', 1, 1, 1),
(6, 'hussein shareef', 'husseinshareef1@gmail.com', '$2y$10$jOyrqmLREQhFErIFGdIxReSlfsFfN1e679ZWjQMRO6Ea8Pta1iLTa', '7RKODTvHwBJ3YIKYriQBsrg0vCRuDQ7V30NI07hr5Y2krJu9p0FQb8roSV0w', '2017-12-28 02:36:59', '2017-12-28 02:36:59', 2, 1, 1),
(7, 'ali mosa', 'ali_ahmad@gmail.com', '$2y$10$6RixHeW9uWGRbTLvuyWiIO6C4/IZBWJ48d3hfIkW596KBrSjERUUm', 'XOs4e119LPZuJ5FOYjO5Tcgi5ismPApi8oKYG9rjkOfNDzbVZ0BGOpIxA0CA', '2017-12-28 03:06:04', '2017-12-28 03:06:04', 3, 1, 1),
(8, 'fasd', 'fajen@abc-gcc.com', '$2y$10$OJKYYd0WqIS2OlmC9PRdSOlK6SevZ5XJRORomAtcd78mvxH50rAV6', 'j1mi4AWP9MGy4y4jQK2R2Q6hT4StWL3NKssvGabH', '2018-01-02 03:57:41', '2018-01-02 03:58:27', 1, 1, 1),
(9, 'qen samer', 'gen@abc-gcc.com', '$2y$10$MKnhpkPIC1HHZPNfPNSl6.1YYsrYsLpX0xW3ZXUNdzZgEDOn55..W', '2hnMMWCE9WYjBJmpspYQKWWzC0OoWF5XbwhVAgOteFtzZCAkIozSBAtJch9P', '2018-01-09 04:13:22', '2018-01-09 04:13:22', 1, 1, 1),
(10, 'miqdad mohammad', 'miqdad.mohammad@abc-gcc.com', '$2y$10$rAWeO62hA2OSMKXf2uvl/eKnoHbSHQF59AGAnqrdYw6T/pJ3rYslC', 'hFGt0cBypg36MYRBjFE9dWz3hnsmURHtcF2EsAf9c3sGyePPr1EloYxAN3t8', '2018-01-09 04:30:37', '2018-01-09 04:30:37', 2, 1, 1),
(13, 'abu abdallah', 'h.alkhateeb@gmail.com', '$2y$10$7FchuvrzDnIvN6QexebEr.y2kkRvmhyMBuaFg.LBscR4Iw8WwHeVa', NULL, '2018-09-17 06:25:12', '2018-09-17 06:25:12', 2, 1, 1),
(14, 'fasdfa', 'fsdf@das.com', '$2y$10$ZPlHibK0hQHMHo/ub23.fOafxNZTdHZUQhd9IHXJCk8pxWOSy1qdG', NULL, '2018-09-18 03:48:07', '2018-09-18 03:48:07', 2, 1, 1),
(15, 'omar', 'omarx12@gmail.com', '$2y$10$wTXaSqCXGiK.WVDx2Dkssed9mdG3fLxUApcXMHSJ//mSq7Ii3LRxm', NULL, '2018-09-22 08:28:04', '2018-09-22 08:28:04', 2, 1, 1),
(16, 'xsx', 'fsdfsxx@das.com', '$2y$10$6CDBSXZDuitK9oykGvqe2u64.dFhhfZXmjwkqjTIt3LOEoETdrfAW', NULL, '2018-10-11 05:47:04', '2018-10-11 05:47:04', 2, 1, 1),
(17, 'sssssss', 'umerxxx@abc-gcc.com', '$2y$10$4g2FPcJs4M6V2IwrEq/4FezC38KwVvLdrhDDaErb66NKTV4aG4KLi', NULL, '2018-10-11 05:48:04', '2018-10-11 05:48:04', 2, 1, 1),
(18, 'qqqqqqq', 'qqqq@q.com', '$2y$10$e0Y3fIBPBFA6T5fgV6tLpOgHq077vAccOgo1v7rlus2qpBvu60wyS', NULL, '2018-10-17 07:03:39', '2018-10-17 07:03:39', 2, 1, 1),
(19, 'User', 'user@abc-gcc.com', '$2y$10$SQ7n7Q2sQzq4KMbHFObaxO6rcXNAQleMjsUomTvfpPEdFQsw4Gmme', 'VcC1MDETpe0OEWY4zRy9dlAygX2Sv2h9DjFdau3O', '2018-10-31 04:53:17', '2018-10-31 04:53:17', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_details`
--

CREATE TABLE `users_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `phone_number2` varchar(255) DEFAULT NULL,
  `country` int(11) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_details`
--

INSERT INTO `users_details` (`id`, `user_id`, `company_name`, `phone_number`, `phone_number2`, `country`, `address`) VALUES
(1, 6, 'ABC', '00971529777915', '543231', 224, 'Ajman , Al bustan'),
(2, 7, 'Menarits', '0962785024249', NULL, 224, 'souq al thahab'),
(3, 10, 'zen company', '052152454554', '140546465', 224, 'fasdfasd'),
(5, 13, 'hammar', '213123213', NULL, 164, 'anythng'),
(6, 14, 'fasd', '42314241234123', NULL, 2, 'adsf'),
(7, 15, 'omar company', '054525456', NULL, 169, 'ssss'),
(8, 16, 'ABC', '3123', '12312', 2, 'dfsa'),
(9, 17, 'sssss', '2312412432', '32412342134123', 2, 'ssssss'),
(10, 18, 'qqqq', '3212312', NULL, 2, 'qqqq');

-- --------------------------------------------------------

--
-- Table structure for table `users_general_info`
--

CREATE TABLE `users_general_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `country` int(25) NOT NULL,
  `material_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_general_info`
--

INSERT INTO `users_general_info` (`id`, `user_id`, `age`, `country`, `material_status`, `address`, `phone_number`, `gender`) VALUES
(1, 3, 27, 108, 'single', 'fads', '2314534', 'mail'),
(2, 5, 32, 224, 'single', 'fasd', '324523', 'mail'),
(3, 8, 32, 1, 'single', 'fsd', '234143432', 'femail'),
(4, 2, 20, 224, 'single', 'fasdfa', '0527999715', 'mail'),
(5, 9, 45, 224, 'single', 'asdf', '0527999715', 'mail'),
(6, 19, 20, 224, 'single', NULL, NULL, 'mail');

-- --------------------------------------------------------

--
-- Table structure for table `users_work_info`
--

CREATE TABLE `users_work_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_work_info`
--

INSERT INTO `users_work_info` (`id`, `user_id`, `position_id`) VALUES
(1, 3, 0),
(2, 5, 1),
(3, 8, 1),
(4, 9, 2),
(5, 19, 4);

-- --------------------------------------------------------

--
-- Table structure for table `work_zone`
--

CREATE TABLE `work_zone` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_zone`
--

INSERT INTO `work_zone` (`id`, `title`, `location`) VALUES
(1, 'xxxxxxxxxxxxxxxxxx', 's'),
(2, 'schools', 'w'),
(3, 'mPower', 'e'),
(4, 'meqdad', '3'),
(5, 'dubai Land', 'dubai , mohammad ben rashed street'),
(9, 'al horya school', 'amman ,jordan');

-- --------------------------------------------------------

--
-- Table structure for table `work_zone_rules`
--

CREATE TABLE `work_zone_rules` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `work_zone_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_zone_rules`
--

INSERT INTO `work_zone_rules` (`id`, `user_id`, `work_zone_id`) VALUES
(17, 9, 3),
(18, 9, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boq`
--
ALTER TABLE `boq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boq_accessories`
--
ALTER TABLE `boq_accessories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boq_status`
--
ALTER TABLE `boq_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boq_sub_materials`
--
ALTER TABLE `boq_sub_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cc_emails`
--
ALTER TABLE `cc_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `decline_replay`
--
ALTER TABLE `decline_replay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gml`
--
ALTER TABLE `gml`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiry_extend`
--
ALTER TABLE `inquiry_extend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_inquiry`
--
ALTER TABLE `material_inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_inquiry_materials`
--
ALTER TABLE `material_inquiry_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_inquiry_suppliers`
--
ALTER TABLE `material_inquiry_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_requisition`
--
ALTER TABLE `material_requisition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_users`
--
ALTER TABLE `notification_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position_rules`
--
ALTER TABLE `position_rules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `position_id` (`position_id`,`screen_id`);

--
-- Indexes for table `proposal_reply`
--
ALTER TABLE `proposal_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requisition_accessory`
--
ALTER TABLE `requisition_accessory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requisition_materials`
--
ALTER TABLE `requisition_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`screen_id`);

--
-- Indexes for table `scl`
--
ALTER TABLE `scl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scr`
--
ALTER TABLE `scr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `screens`
--
ALTER TABLE `screens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scr_sub_category`
--
ALTER TABLE `scr_sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcontractor_agreement`
--
ALTER TABLE `subcontractor_agreement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcontractor_category`
--
ALTER TABLE `subcontractor_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcontractor_decline`
--
ALTER TABLE `subcontractor_decline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcontractor_proposal`
--
ALTER TABLE `subcontractor_proposal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcontractor_proposal_details`
--
ALTER TABLE `subcontractor_proposal_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcontractor_request`
--
ALTER TABLE `subcontractor_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_gml`
--
ALTER TABLE `sub_gml`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_scl`
--
ALTER TABLE `sub_scl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_work_zone`
--
ALTER TABLE `sub_work_zone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_agreement`
--
ALTER TABLE `supplier_agreement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_agreement_decline`
--
ALTER TABLE `supplier_agreement_decline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_decline`
--
ALTER TABLE `supplier_decline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_materials`
--
ALTER TABLE `supplier_materials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `supplier_id` (`supplier_id`,`submaterila_id`);

--
-- Indexes for table `supplier_proposal`
--
ALTER TABLE `supplier_proposal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_proposal_details`
--
ALTER TABLE `supplier_proposal_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_details`
--
ALTER TABLE `users_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_general_info`
--
ALTER TABLE `users_general_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_work_info`
--
ALTER TABLE `users_work_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_zone`
--
ALTER TABLE `work_zone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_zone_rules`
--
ALTER TABLE `work_zone_rules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boq`
--
ALTER TABLE `boq`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `boq_accessories`
--
ALTER TABLE `boq_accessories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `boq_status`
--
ALTER TABLE `boq_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `boq_sub_materials`
--
ALTER TABLE `boq_sub_materials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `cc_emails`
--
ALTER TABLE `cc_emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;
--
-- AUTO_INCREMENT for table `decline_replay`
--
ALTER TABLE `decline_replay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `gml`
--
ALTER TABLE `gml`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `inquiry_extend`
--
ALTER TABLE `inquiry_extend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `material_inquiry`
--
ALTER TABLE `material_inquiry`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `material_inquiry_materials`
--
ALTER TABLE `material_inquiry_materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
--
-- AUTO_INCREMENT for table `material_inquiry_suppliers`
--
ALTER TABLE `material_inquiry_suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `material_requisition`
--
ALTER TABLE `material_requisition`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `notification_users`
--
ALTER TABLE `notification_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `position_rules`
--
ALTER TABLE `position_rules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `proposal_reply`
--
ALTER TABLE `proposal_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `requisition_accessory`
--
ALTER TABLE `requisition_accessory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `requisition_materials`
--
ALTER TABLE `requisition_materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `scl`
--
ALTER TABLE `scl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `scr`
--
ALTER TABLE `scr`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `screens`
--
ALTER TABLE `screens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `scr_sub_category`
--
ALTER TABLE `scr_sub_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `subcontractor_agreement`
--
ALTER TABLE `subcontractor_agreement`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subcontractor_category`
--
ALTER TABLE `subcontractor_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subcontractor_decline`
--
ALTER TABLE `subcontractor_decline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subcontractor_proposal`
--
ALTER TABLE `subcontractor_proposal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subcontractor_proposal_details`
--
ALTER TABLE `subcontractor_proposal_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subcontractor_request`
--
ALTER TABLE `subcontractor_request`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sub_gml`
--
ALTER TABLE `sub_gml`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `sub_scl`
--
ALTER TABLE `sub_scl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sub_work_zone`
--
ALTER TABLE `sub_work_zone`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `supplier_agreement`
--
ALTER TABLE `supplier_agreement`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `supplier_agreement_decline`
--
ALTER TABLE `supplier_agreement_decline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `supplier_decline`
--
ALTER TABLE `supplier_decline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `supplier_materials`
--
ALTER TABLE `supplier_materials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `supplier_proposal`
--
ALTER TABLE `supplier_proposal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `supplier_proposal_details`
--
ALTER TABLE `supplier_proposal_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users_details`
--
ALTER TABLE `users_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users_general_info`
--
ALTER TABLE `users_general_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users_work_info`
--
ALTER TABLE `users_work_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `work_zone`
--
ALTER TABLE `work_zone`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `work_zone_rules`
--
ALTER TABLE `work_zone_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
