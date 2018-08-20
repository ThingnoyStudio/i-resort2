-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2018 at 07:27 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iresortdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `ADid` int(11) NOT NULL COMMENT 'รหัส',
  `ADnumber` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'บ้านเลขที่',
  `ADhome` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'หมู่บ้าน',
  `ADsubdistrict` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'ตำบล',
  `ADdistrict` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'อำเภอ',
  `ADprovince` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'จังหวัด',
  `ADzipcode` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'รหัสไปรษณี',
  `Uid` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`ADid`, `ADnumber`, `ADhome`, `ADsubdistrict`, `ADdistrict`, `ADprovince`, `ADzipcode`, `Uid`) VALUES
(1, '111', 'ghghg', 'bfghgfhg', 'gbfgfg', 'fgbfgbfg', '14242', '6'),
(2, '232', 'สามแยก', 'หนองลอ', 'บ้านโข่ง', 'อุดรธานี', '41000', '10'),
(3, '333', 'สามแยก', 'หนองลอ', 'บ้านโข่ง', 'อุดรธานี', '41000', '7'),
(4, '333', 'สามแยก', 'หนองลอ', 'บ้านโข่ง', 'อุดรธานี', '41000', '8'),
(6, '333', 'สามแยก', '', '', '', '', '9'),
(7, '888', 'โภชนาการ', 'ใจสพุง', 'สว่าง', 'สกลนคร', '47000', '12'),
(18, '999', 'สะพานใหม่', 'หนองลุง', 'กว่าง', 'บุรีรัมย์', '49000', '25'),
(19, '', '', '', '', '', '', '26'),
(20, NULL, NULL, NULL, NULL, NULL, NULL, '29'),
(21, NULL, NULL, NULL, NULL, NULL, NULL, '30');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('member', 3, 1528897906),
('member', 4, 1529219556),
('member', 5, 1529219885),
('member', 6, 1529220341),
('member', 7, 1529243816),
('member', 8, 1529289544),
('member', 9, 1529754130),
('member', 10, 1530529333),
('member', 11, 1530809975),
('member', 12, 1531319159),
('member', 13, 1531320784),
('member', 14, 1531320953),
('member', 15, 1531321026),
('member', 16, 1531321123),
('member', 17, 1531844672),
('member', 18, 1531845137),
('member', 19, 1531848769),
('member', 20, 1531849385),
('member', 21, 1531850029),
('member', 22, 1531850536),
('member', 23, 1531851685),
('member', 24, 1531851801),
('member', 25, 1531853651),
('member', 26, 1533061387),
('member', 27, 1533062078),
('member', 28, 1533062287),
('member', 29, 1533062391),
('member', 30, 1533062581);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'Administrator of this application', NULL, NULL, 1528897859, 1528897859),
('adminArticle', 2, 'Allows admin+ roles to manage articles', NULL, NULL, 1528897858, 1528897858),
('createArticle', 2, 'Allows editor+ roles to create articles', NULL, NULL, 1528897858, 1528897858),
('deleteArticle', 2, 'Allows admin+ roles to delete articles', NULL, NULL, 1528897858, 1528897858),
('editor', 1, 'Editor of this application', NULL, NULL, 1528897858, 1528897858),
('manageUsers', 2, 'Allows admin+ roles to manage users', NULL, NULL, 1528897858, 1528897858),
('member', 1, 'Registered users, members of this site', NULL, NULL, 1528897858, 1528897858),
('premium', 1, 'Premium members. They have more permissions than normal members', NULL, NULL, 1528897858, 1528897858),
('support', 1, 'Support staff', NULL, NULL, 1528897858, 1528897858),
('theCreator', 1, 'You!', NULL, NULL, 1528897859, 1528897859),
('updateArticle', 2, 'Allows editor+ roles to update articles', NULL, NULL, 1528897858, 1528897858),
('updateOwnArticle', 2, 'Update own article', 'isAuthor', NULL, 1528897858, 1528897858),
('usePremiumContent', 2, 'Allows premium+ roles to use premium content', NULL, NULL, 1528897858, 1528897858);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'deleteArticle'),
('admin', 'editor'),
('admin', 'manageUsers'),
('admin', 'updateArticle'),
('editor', 'adminArticle'),
('editor', 'createArticle'),
('editor', 'support'),
('editor', 'updateOwnArticle'),
('premium', 'usePremiumContent'),
('support', 'member'),
('support', 'premium'),
('theCreator', 'admin'),
('updateOwnArticle', 'updateArticle');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_rule`
--

INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
('isAuthor', 'O:28:\"common\\rbac\\rules\\AuthorRule\":3:{s:4:\"name\";s:8:\"isAuthor\";s:9:\"createdAt\";i:1528897857;s:9:\"updatedAt\";i:1528897857;}', 1528897857, 1528897857);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `Bid` int(11) NOT NULL COMMENT 'รหัส',
  `Bdate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'วันที่จอง',
  `Rid` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'หมายเลขห้อง',
  `Uid` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'ผู้ใช้งาน',
  `ADid` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'ที่อยู่',
  `Bnday` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'จำนวนวัน',
  `Bdatein` date DEFAULT NULL COMMENT 'วันที่เช็คอิน',
  `Bdateout` date DEFAULT NULL COMMENT 'วันที่เช็คเอ้า',
  `PMid` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'การชำระเงิน',
  `datebetween` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'ช่วงเวลาเข้าพัก',
  `Btotal` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'ราคาสุทธิ',
  `Bbil` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'ใบเสร็จ',
  `month` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'เดือน',
  `year` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'ปี',
  `Bstatus` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'สถานะการจอง'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`Bid`, `Bdate`, `Rid`, `Uid`, `ADid`, `Bnday`, `Bdatein`, `Bdateout`, `PMid`, `datebetween`, `Btotal`, `Bbil`, `month`, `year`, `Bstatus`) VALUES
(5, '2018-07-01', '5', '6', NULL, '3', '2018-07-11', '2018-07-11', '2', '', '8970', NULL, '07', '2018', 'เช็คเอาท์'),
(6, '2018-07-01', '4', '6', NULL, '3', '2018-07-03', '0000-00-00', '2', NULL, '7470', NULL, '07', '2018', 'จอง'),
(11, '2018-07-03 22:19:51', '3', '6', NULL, '1', '2018-07-20', '2018-07-21', '4', NULL, '1490', 'Jellyfish.jpg', '07', '2018', 'เช็คอิน'),
(12, '2018-07-03 22:19:52', '3', '6', NULL, '1', '2018-07-20', '2018-07-21', '4', NULL, '1490', 'Penguins.jpg', '07', '2018', 'เช็คอิน'),
(15, '2018-07-04 00:17:02', '3', '6', NULL, '1', '2018-08-12', '2018-08-13', '2', NULL, '1490', NULL, '07', '2018', 'จอง'),
(16, '2018-07-04 00:21:30', '5', '6', NULL, '1', '2018-08-23', '2018-08-24', '2', NULL, '2990', NULL, '07', '2018', 'จอง'),
(17, '2018-07-04 00:28:30', '5', '6', NULL, '1', '2018-08-24', '2018-08-25', '2', NULL, '2990', NULL, '07', '2018', 'จอง'),
(18, '2018-08-04 00:29:54', '3', '6', NULL, '1', '2018-08-17', '2018-08-18', '2', NULL, '1490', NULL, '08', '2018', 'จอง'),
(23, '2018-07-24 16:10:52', '5', '25', NULL, '2', '2018-07-26', '2018-07-28', '4', NULL, '6000', 'Penguins.jpg', '07', '2018', 'เช็คอิน'),
(27, '2018-07-25 12:11:27', '3', '25', NULL, '1', '2018-07-25', '2018-07-26', '2', NULL, '1500', NULL, '07', '2018', 'จอง'),
(28, '2018-07-25 12:40:02', '3', '25', NULL, '1', '2018-08-26', '2018-08-27', '4', NULL, '1500', 'Penguins.jpg', '07', '2018', 'จอง'),
(29, '2018-07-25 14:31:33', '3', '25', NULL, '1', '2018-08-30', '2018-08-31', '4', NULL, '1500', 'Tulips.jpg', '07', '2018', 'จอง'),
(30, '2018-07-25 14:38:15', '3', '9', NULL, '1', '2018-08-29', '2018-08-30', '3', NULL, '1500', NULL, '07', '2018', 'จอง'),
(31, '2018-07-25 14:55:54', '4', '25', NULL, '1', '2018-09-18', '2018-09-19', '4', NULL, '2500', 'Penguins.jpg', '07', '2018', 'จอง'),
(32, '2018-07-25 14:58:36', '5', '25', NULL, '1', '2018-08-14', '2018-08-15', '3', NULL, '3000', NULL, '07', '2018', 'รอยืนยัน'),
(33, '2018-07-25 14:59:41', '5', '25', NULL, '1', '2018-08-08', '2018-08-09', '3', NULL, '3000', NULL, '07', '2018', 'รอยืนยัน'),
(34, '2018-07-25 15:02:38', '5', '25', NULL, '1', '2018-07-30', '2018-07-31', '4', NULL, '3000', 'Tulips.jpg', '07', '2018', 'จอง'),
(35, '2018-07-25 23:43:14', '3', '25', NULL, '1', '2018-08-01', '2018-08-02', '2', NULL, '1170', NULL, '07', '2018', 'จอง'),
(36, '2018-07-26 15:49:36', '3', '25', NULL, '1', '2018-09-26', '2018-09-27', '2', NULL, '1170', NULL, '07', '2018', 'จอง'),
(37, '2018-07-26 15:53:41', '3', '25', NULL, '2', '2018-09-20', '2018-09-22', '2', NULL, '2340', NULL, '07', '2018', 'จอง'),
(38, '2018-07-31 00:58:33', '3', '25', NULL, '2', '2018-08-27', '2018-08-29', '6', NULL, '3000', 'Koala.jpg', '07', '2018', 'รอยืนยัน'),
(39, '2018-07-31 01:44:46', '3', '25', NULL, '1', '2018-08-22', '2018-08-23', '3', NULL, '1500', NULL, '07', '2018', 'รอยืนยัน'),
(40, '2018-07-31 01:59:29', '3', '25', NULL, '1', '2018-11-21', '2018-11-22', '3', NULL, '1500', NULL, '07', '2018', 'รอยืนยัน');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `Fid` int(11) NOT NULL COMMENT 'รหัส',
  `Fname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'ชื่ออาหาร',
  `Fprice` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'ราคา',
  `Fimg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'รูปภาพ'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`Fid`, `Fname`, `Fprice`, `Fimg`) VALUES
(1, 'ข้าวผัด', '30', '462cc737-ee9f-4457-ad06-3a826ab245b3.jpg'),
(2, 'ส้มตำ', '35', 'DSC_8155.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf16_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1528887297),
('m141022_115823_create_user_table', 1528887302),
('m141022_115912_create_rbac_tables', 1528887303),
('m141022_115922_create_session_table', 1528887303),
('m150104_153617_create_article_table', 1528887304),
('m180624_102337_create_transction_paypal', 1529836328);

-- --------------------------------------------------------

--
-- Table structure for table `month`
--

CREATE TABLE `month` (
  `Mid` int(11) NOT NULL,
  `Mname` text COLLATE utf8mb4_unicode_ci,
  `Mnum` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `month`
--

INSERT INTO `month` (`Mid`, `Mname`, `Mnum`) VALUES
(1, 'มกราคม', '01'),
(2, 'กุมภาพันธ์', '02'),
(3, 'มีนาคม', '03'),
(4, 'เมษายน', '04'),
(5, 'พฤษภาคม', '05'),
(6, 'มิถุนายน', '06'),
(7, 'กรกฎาคม', '07'),
(8, 'สิงหาคม', '08'),
(9, 'กันยายน', '09'),
(10, 'ตุลาคม', '10'),
(11, 'พฤศจิกายน', '11'),
(12, 'ธันวาคม', '12'),
(13, 'ไม่เลือกเดือน', '00');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `Nid` int(11) NOT NULL COMMENT 'รหัส',
  `Ntopic` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'หัวข้อ',
  `Ndes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'รายละเอียด',
  `Nimg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'รูปภาพ',
  `Nvdo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'วิดิโอ'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`Nid`, `Ntopic`, `Ndes`, `Nimg`, `Nvdo`) VALUES
(1, 'ลด 20 %', 'ลด 20 % ในวันที่ 14 /6 /61', '1000.jpg', 'https://www.youtube.com/embed/awtuTjNmYkI'),
(2, 'เทสวิดีโอ', 'dbbdbdfb', 'images.jpg', 'https://www.youtube.com/embed/awtuTjNmYkI');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `ODid` int(11) NOT NULL COMMENT 'รหัส',
  `Fid` int(11) DEFAULT NULL COMMENT 'รหัสอาหาร',
  `Oid` int(11) DEFAULT NULL COMMENT 'รหัสออเดอร์',
  `ODnum` int(11) DEFAULT NULL COMMENT 'จำนวน'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`ODid`, `Fid`, `Oid`, `ODnum`) VALUES
(3, 2, 2, 5),
(4, 2, 3, 2),
(5, 1, 4, 1),
(6, 1, 5, 2),
(7, 1, 6, 1),
(8, 2, 7, 1),
(9, 1, 8, 1),
(10, 2, 9, 2),
(11, 2, 10, 2),
(12, 2, 11, 2),
(13, 2, 12, 2),
(14, 1, 13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Oid` int(11) NOT NULL COMMENT 'รหัส',
  `Odate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'วันที่',
  `Optotal` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'ราคารวม',
  `Pid` int(11) DEFAULT NULL COMMENT 'การชำระเงิน',
  `Bid` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'ห้อง'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Oid`, `Odate`, `Optotal`, `Pid`, `Bid`) VALUES
(3, '2018-07-18 02:55:45', '70', 2, '0'),
(4, '2018-07-18 03:50:50', '30', 5, '1'),
(5, '2018-07-18 03:51:14', '60', 5, '0'),
(6, '2018-07-18 03:51:34', '30', 2, '4'),
(7, '2018-07-18 04:07:28', '35', 2, '0'),
(8, '2018-07-18 04:08:32', '30', 2, '5'),
(9, '2018-07-24 17:01:43', '70', 2, '3'),
(10, '2018-07-26 14:46:04', '70', 2, '2'),
(11, '2018-07-26 14:57:22', '70', 2, '2'),
(12, '2018-07-26 14:58:37', '70', 2, '2'),
(13, '2018-07-26 15:26:44', '60', 2, '4');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PMid` int(11) NOT NULL COMMENT 'รหัส',
  `PMname` text COLLATE utf16_unicode_ci COMMENT 'ประเภทการชำระเงิน'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PMid`, `PMname`) VALUES
(1, 'บัตรเครดิต/เดรบิต'),
(2, 'ชำระผ่าน paypal'),
(3, 'ยังไม่ชำระเงิน'),
(4, 'ชำระผ่านธนาคาร'),
(5, 'เงินสด'),
(6, 'รอยืนยัน');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `Pid` int(11) NOT NULL COMMENT 'รหัส',
  `Pname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'ชื่อโปรโมชั่น',
  `Pdatestart` text COLLATE utf16_unicode_ci COMMENT 'วันที่เริ่ม',
  `Pdateend` text COLLATE utf16_unicode_ci COMMENT 'วันที่สิ้นสุด',
  `Pdistant` int(11) DEFAULT NULL COMMENT 'ส่วนลด',
  `Pimg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'รูปภาพ',
  `kvdate1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`Pid`, `Pname`, `Pdatestart`, `Pdateend`, `Pdistant`, `Pimg`, `kvdate1`) VALUES
(1, 'sdfs', '2018-07-31', '2018-08-09', 34, 'Penguins.jpg', '31-07-2018 - 09-08-2018');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `Rid` int(11) NOT NULL COMMENT 'รหัส',
  `Rname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'ชื่อห้อง',
  `Rnumber` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'หมายเลขห้อง',
  `Rprice` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'ราคา',
  `Rdes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'รายละเอียด',
  `Rimg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'รูปภาพ',
  `RSid` int(11) DEFAULT NULL COMMENT 'รหัสสถานะห้อง',
  `RTid` int(11) DEFAULT NULL COMMENT 'ประเภทห้อง'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`Rid`, `Rname`, `Rnumber`, `Rprice`, `Rdes`, `Rimg`, `RSid`, `RTid`) VALUES
(1, 'สวิท', '1', '1500', 'jghmhmnghnhg', 'ghnhgng.jpg', 5, 1),
(2, 'ไม่สวิท', '2', '2000', 'เ้เ่เ้่เ้่เ้่ด้เ่tjhjfgjdjd', 'hgnghnghng.jpg', 2, 1),
(3, 'ดอกไม้', '3', '1500', 'เกเ้เด้ดเ้กด้กดเหเพเ้เพ้้ะำะ', 'ghnhgng.jpg', 6, 2),
(4, 'ดอกไม้บาน', '4', '2500', 'เ้ท้่ทเ่้ท่้ท้่ทเ่ทเ่', 'hjh.jpg', 6, 2),
(5, 'ดอกไม้บานมาก', '5', '3000', 'เืเืเ้ื้ื้พื้ดืbbnngfnjnhjmg', 'images.jpg', 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `roomstatus`
--

CREATE TABLE `roomstatus` (
  `RSid` int(11) NOT NULL COMMENT 'รหัส',
  `RSname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'สถานะห้อง'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `roomstatus`
--

INSERT INTO `roomstatus` (`RSid`, `RSname`) VALUES
(1, 'ว่าง'),
(2, 'จอง'),
(4, 'เข้าพักแล้ว'),
(6, 'ทำความสะอาด');

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `RTid` int(11) NOT NULL COMMENT 'รหัส',
  `RTname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'ชื่อประเภทห้อง'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`RTid`, `RTname`) VALUES
(1, 'ธรรมดา'),
(2, 'สวิท'),
(3, 'vip');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `expire` int(11) NOT NULL,
  `data` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `expire`, `data`) VALUES
('3a6i8ghhdcpo5hta1a1gn5anil', 1531908605, 0x5f5f666c6173687c613a303a7b7d5f5f72657475726e55726c7c733a31393a222f692d7265736f7274322f6261636b656e642f223b5f5f69647c693a313b),
('3m8mduqhalpqiumhmiv6brv93i', 1532667677, 0x5f5f666c6173687c613a303a7b7d5f5f72657475726e55726c7c733a31393a222f692d7265736f7274322f6261636b656e642f223b5f5f69647c693a313b),
('7g56o2jaq08ae581uv9p34fd99', 1531986080, 0x5f5f666c6173687c613a303a7b7d5f5f72657475726e55726c7c733a34383a22687474703a2f2f6c6f63616c686f73742f692d7265736f7274322f626f6f6b696e672f7265706f7274626f6f6b696e67223b5f5f69647c693a383b),
('7q486f4h031pcfbem0j9ksc7n4', 1532581569, 0x5f5f666c6173687c613a303a7b7d5f5f72657475726e55726c7c733a31393a222f692d7265736f7274322f6261636b656e642f223b),
('7qsdo48llu6qdcqp3cgthl2bth', 1533062793, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a31303b),
('7vht0b3it32q61l9mn8vpl6b3f', 1533062795, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a31303b),
('8d2anct4sf48hqsohs9ljmpq4l', 1532598746, 0x5f5f666c6173687c613a303a7b7d),
('b89vb2j81fur5ab1dkomhd9q5m', 1533064659, 0x5f5f666c6173687c613a303a7b7d),
('cq8skpdjgqtsdpqbf9o1pcfj65', 1532083010, 0x5f5f666c6173687c613a303a7b7d5f5f72657475726e55726c7c733a31393a222f692d7265736f7274322f6261636b656e642f223b5f5f69647c693a313b),
('e6qq1sj7k6avkn6e0t7jv6bael', 1532704334, 0x5f5f666c6173687c613a303a7b7d),
('ehnsh8rt5a855i4sgkt5n80dfc', 1534673718, 0x5f5f666c6173687c613a303a7b7d5f5f72657475726e55726c7c4e3b),
('fvm06clbjt7mhj3g53qq06e3r8', 1533062794, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a31303b),
('g68n3qp3skcbn6ntp63en7d39h', 1532082976, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a383b),
('h3tcnhpmi9nfppfcn2el3a7noi', 1533062795, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a31303b),
('h9mnuqvlopu0i7pi16ao6rt3st', 1533062797, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a31303b),
('kvsgh2ekalmm0ejlub5kef91o0', 1533062794, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a31303b),
('m0ac0oheqklg8nf3epalmbo3s2', 1532667597, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a32353b),
('m3o12cupumqgavlhmqcmiehtpg', 1533062796, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a31303b),
('mb8mdn9u0q9vv254v5hm7uhpkp', 1534786382, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a31303b),
('ola0ei5k0pq6uh4mmuo92tmrvg', 1533062796, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a31303b),
('ombv893m3kgttrmd9phnq7i9vk', 1533062794, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a31303b),
('qrm3uqi31e15tvhk3qrksa0r4f', 1531931029, 0x5f5f666c6173687c613a303a7b7d),
('ur9kqnpqo56cu96ii6417eabs6', 1532623084, 0x5f5f666c6173687c613a313a7b733a343a224f6f7073223b693a313b7d5f5f69647c693a32353b4f6f70737c613a323a7b733a343a22626f6479223b733a3138323a22e0b881e0b8a3e0b8b8e0b893e0b8b2e0b980e0b8a5e0b8b7e0b8ade0b881e0b8a0e0b8b2e0b89ee0b8aae0b8a5e0b8b4e0b89be0b881e0b8b2e0b8a3e0b88ae0b8b3e0b8a3e0b8b0e0b980e0b887e0b8b4e0b899e0b981e0b8a5e0b8b0e0b8ade0b8b1e0b89ee0b982e0b8abe0b8a5e0b89420e0b980e0b89ee0b8b7e0b988e0b8ade0b8a2e0b8b7e0b899e0b8a2e0b8b1e0b899e0b881e0b8b2e0b8a3e0b88ae0b8b3e0b8a3e0b8b0e0b980e0b887e0b8b4e0b89921223b733a343a2274797065223b733a373a227761726e696e67223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_paypal`
--

CREATE TABLE `transaction_paypal` (
  `id` int(11) NOT NULL COMMENT 'ไอดี',
  `user_id` int(11) DEFAULT NULL COMMENT 'รหัสลูกค้า',
  `payment_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'รหัสการจ่าย',
  `hash` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'แฮช',
  `complete` int(1) DEFAULT NULL COMMENT 'สถานะ',
  `create_time` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ทำรายการเมื่อ',
  `update_time` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'แก้ไขรายการเมื่อ',
  `product_id` int(11) DEFAULT NULL COMMENT 'รหัสสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_paypal`
--

INSERT INTO `transaction_paypal` (`id`, `user_id`, `payment_id`, `hash`, `complete`, `create_time`, `update_time`, `product_id`) VALUES
(50, 25, 'PAY-5TD85804HW725770PLNMXYPA', 'fda1748a2cce583649ddc6c93fcf9ea2', 1, '2018-07-26T07:47:15Z', '2018-07-26T07:47:12Z', 2),
(51, 25, 'PAY-2E825542AU431014XLNMX5YQ', '23be0ea8ac61b339d51d9b0d267f6759', 1, '2018-07-26T07:58:05Z', '2018-07-26T07:58:01Z', 2),
(52, 25, 'PAY-3K958103E01259505LNMX6LI', '33cebd924d9d5199c43f0d6055457eae', 1, '2018-07-26T07:59:27Z', '2018-07-26T07:59:24Z', 2),
(53, 25, 'PAY-1YE206565D540054RLNMYLRA', 'ff5945efba61aac94ce4575c1a6b0353', 1, '2018-07-26T08:27:51Z', '2018-07-26T08:27:48Z', 1),
(54, 25, 'PAY-2R6708828K886962TLNMYWIA', '90ce576892fe7fb1066e382f27d728a3', NULL, '-', '-', 3),
(55, 25, 'PAY-7FL99423X10306445LNMYYFI', '5921a641ad1b4af95a09f2f2e24eb021', 1, '2018-07-26T08:55:15Z', '2018-07-26T08:55:11Z', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_activation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `status`, `auth_key`, `password_reset_token`, `account_activation_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$13$MZJoKmYjk2DfmBofIbdiauvyShiGHFURgPVu.ohctQPKhvGSuVtje', 10, 'onhv0lO2GGyLv2zk7towuZd_FPkPJ28c', NULL, NULL, 1528887395, 1528887395),
(6, 'test225', 'jhkhj@gmail.com', '$2y$13$Q9R4EvP7Hty6MKRt2SocuexkrvG3Fop2RrEi/542mPzNhhpg3Znum', 10, 'G2EzBIi7_oUMriGcZsG9HtX--SQB3zzv', NULL, NULL, 1529220341, 1529220341),
(7, 'maid', 'b@gmail.com', '$2y$13$92j9Hq4UgQHApEHNwmVJqu5YpZGZjqiTkXTPxJLZLGj5fL4Htjn7u', 10, 'ySYbb4xSByryo9Itkf3DeLLb1XfCVrmW', NULL, NULL, 1529243816, 1531157188),
(8, 'boss', 'po@gmail.com', '$2y$13$aNtPpyjsrAGkLxuiNEZLJ.GP80NNrPQWkCUfLVd7KUT8pvG/gnnge', 10, 'uKQV6HsB8Tu2lpkodJQ50ttJfnlJkAEo', NULL, NULL, 1529289544, 1531157624),
(9, 'money', 'money@gmail.com', '$2y$13$3veArBszCd9qvGYiBvTcdubIMQkVgGnQWt292zn3iRhVJxaYai2Du', 10, 'FknxZPBRmRhDbXp8SJ6-KefIqJM3nkL2', NULL, NULL, 1529754130, 1529754130),
(10, 'counter', 'tonrub@gmail.com', '$2y$13$LXLxGRIHW.A4JX5HL0wwBOE59VJqN24QhdAOnErf62MM.41RReaiy', 10, '2PwHj-qKYWXxPGTirp4Lc_tv5YfC9xDm', NULL, NULL, 1530529333, 1531218374),
(12, 'food', 'admiddn@gmail.com', '$2y$13$ZQjVr79CRlUVvJQ0zVFjuu3QND2hZLXileNfag1s1Sq8VrI1tTQyy', 10, 'hCKiucHlNwmyGDArgxc0_VsPepP3kxKK', NULL, NULL, 1531319159, 1531853838),
(25, 'member', 'member@gmail.com', '$2y$13$f/RKtFYBUqsyRsDYqHgeIeuaGV6PW9d8602V79x/0NLfJMQs6Zoii', 10, '9yVBN04J23B2vYhrG5qA_HnJCuBnO6op', NULL, NULL, 1531853651, 1531853651),
(26, 'ddddd', 'ddd@sold.comddd', '$2y$13$yBP0LbizPqcKKeOK2qSnrOZrwnfVFw5Fvo0i1HK2wJzWMUJPUSoQm', 10, 'wYHF_FhEb8NQuoLNGCvvCD-FVaxxZJqg', NULL, NULL, 1533061387, 1533061387),
(27, 'nopparutj', 'boyskypart@gmail.comj', '$2y$13$cNG4XxeXK7P2T4w7RYXWruvzDCH07pXdA3QIq.7AcxjNVyBPNA.Z6', 10, 'Ekfbyiq5B69abI8jctV755RvZaEp1ZXc', NULL, NULL, 1533062078, 1533062078),
(28, 'nnn', 'boyskymmmpart@gmail.com', '$2y$13$OM6SPQnkYGoOnYBKbHlReO8aqjKUtI1YkX/q9aWBBHM2PESCqo3/a', 10, 'KkGnQUDZiA4itqHHigdGCxDCzqlcJGXL', NULL, NULL, 1533062287, 1533062287),
(29, 'mmm', 'dfgh@fgg.nn', '$2y$13$1H0d3wYoztUQoiwmV3Rtxumn5A78HZawmAxRbnlYEG4HEvQWNFN2m', 10, 'A_NViur7CLO6h8DnCLU3rsT3ioYyMDRQ', NULL, NULL, 1533062391, 1533062391),
(30, 'mk', 'mk@gg.nn', '$2y$13$5GaSNu37NPUB/hQ0ew5xo.luJ9vZM4i032YSV.3pAcHz8bIzSGBMi', 10, 'D3OnxB-GVL-u5jlYHLz0Iz3EkCN3414I', NULL, NULL, 1533062581, 1533062581);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Uid` int(11) NOT NULL,
  `Ufname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'ชื่อ',
  `Ulname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'นามสกุล',
  `Uemail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'อีเมล์',
  `Uphone` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'เบอร์โทร',
  `Uimg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'รูปภาพ',
  `ADid` int(11) DEFAULT NULL COMMENT 'รหัสที่อยู่',
  `USid` int(11) DEFAULT NULL COMMENT 'สถานะผู้ใช้งาน',
  `iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Uid`, `Ufname`, `Ulname`, `Uemail`, `Uphone`, `Uimg`, `ADid`, `USid`, `iduser`) VALUES
(6, 'อัยการ', 'อัย', 'noppakit15@gmail.com', '025785963', 'marc.jpg', 1, 1, 6),
(7, 'แม่บ้าน', 'โคตรๆ', 'f@gmail.com', '0814586952', 'tim_80x80.png', 3, 4, 7),
(8, 'boss', 'po', 'po15@gmail.com', '0872379837', 'อูจิน1.jpg', 4, 2, 8),
(9, 'การ', 'เงิน', 'dd@gmail.com', '0254875368', 'DSC_8155.jpg', 6, 6, 9),
(10, 'ต้อนรับ', 'รับ', 'boyskypart@gmail.com', '0254879652', 'DSC_8155.jpg', 2, 3, 10),
(12, 'โภชนาการ', 'โภชนาการ', 'admiddn@gmail.com', '342342434', 'Koala.jpg', 7, 5, 12),
(25, 'สมาชิก', 'สมาชิก', 'member@gmail.com', '0872287732', 'Koala.jpg', 18, 1, 25),
(26, '', '', 'ddd@sold.comddd', '', '', 19, 1, 26),
(29, NULL, NULL, 'dfgh@fgg.nn', NULL, '', 20, 1, 29),
(30, NULL, NULL, 'mk@gg.nn', NULL, '', 21, 1, 30);

-- --------------------------------------------------------

--
-- Table structure for table `userstatus`
--

CREATE TABLE `userstatus` (
  `USid` int(11) NOT NULL COMMENT 'รหัส',
  `USname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'ชื่อสถานะผู้ใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `userstatus`
--

INSERT INTO `userstatus` (`USid`, `USname`) VALUES
(1, 'สมาชิก'),
(2, 'ผู้บริหาร'),
(3, 'พนักงานต้อนรับ'),
(4, 'แม่บ้าน'),
(5, 'ฝ่ายโภชนาการ'),
(6, 'ฝ่ายการเงิน');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `Yid` int(11) NOT NULL,
  `Yname` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`ADid`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`Bid`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`Fid`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `month`
--
ALTER TABLE `month`
  ADD PRIMARY KEY (`Mid`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`Nid`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`ODid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Oid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PMid`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`Pid`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`Rid`);

--
-- Indexes for table `roomstatus`
--
ALTER TABLE `roomstatus`
  ADD PRIMARY KEY (`RSid`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`RTid`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_paypal`
--
ALTER TABLE `transaction_paypal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Uid`),
  ADD KEY `USid` (`USid`);

--
-- Indexes for table `userstatus`
--
ALTER TABLE `userstatus`
  ADD PRIMARY KEY (`USid`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`Yid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `ADid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `Bid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `Fid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `month`
--
ALTER TABLE `month`
  MODIFY `Mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `Nid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `ODid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Oid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PMid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `Pid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `Rid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roomstatus`
--
ALTER TABLE `roomstatus`
  MODIFY `RSid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `RTid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction_paypal`
--
ALTER TABLE `transaction_paypal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดี', AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `userstatus`
--
ALTER TABLE `userstatus`
  MODIFY `USid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `Yid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`USid`) REFERENCES `userstatus` (`USid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
