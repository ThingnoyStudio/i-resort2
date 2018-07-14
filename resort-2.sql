-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2018 at 10:28 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

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
(3, '333', 'สามแยก', 'หนองลอ', 'บ้านโข่ง', 'อุดรธานี', '41000', NULL),
(4, '333', 'สามแยก', 'หนองลอ', 'บ้านโข่ง', 'อุดรธานี', '41000', NULL),
(5, '333', 'สามแยก', '', 'บ้านโข่ง', 'อุดรธานี', '41000', NULL),
(6, '333', 'สามแยก', '', '', '', '', NULL),
(7, '232', 'สามแยก', 'หนองลอ', '', '', '', '12'),
(8, '1', 'สามแยก', 'หนองลอ', '', '', '', '14');

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
('member', 16, 1531321123);

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
(5, '2018-07-01', '5', '6', NULL, '3', '2018-07-11', '2018-07-11', '2', '', '8970', NULL, '07', '2018', 'จอง'),
(6, '2018-07-01', '4', '6', NULL, '3', '2018-07-03', '0000-00-00', '2', NULL, '7470', NULL, '07', '2018', 'จอง'),
(11, '2018-07-03 22:19:51', '3', '6', NULL, '1', '2018-07-20', '2018-07-21', '3', NULL, '1490', NULL, '07', '2018', 'จอง'),
(12, '2018-07-03 22:19:52', '3', '6', NULL, '1', '2018-07-20', '2018-07-21', '3', NULL, '1490', NULL, '07', '2018', 'จอง'),
(13, '2018-07-03 22:25:15', '1', '6', NULL, '1', '2018-08-26', '2018-08-27', '3', NULL, '1490', NULL, '07', '2018', 'จอง'),
(15, '2018-07-04 00:17:02', '3', '6', NULL, '1', '2018-08-12', '2018-08-13', '2', NULL, '1490', NULL, '07', '2018', 'จอง'),
(16, '2018-07-04 00:21:30', '5', '6', NULL, '1', '2018-08-23', '2018-08-24', '2', NULL, '2990', NULL, '07', '2018', 'จอง'),
(17, '2018-07-04 00:28:30', '5', '6', NULL, '1', '2018-08-24', '2018-08-25', '2', NULL, '2990', NULL, '07', '2018', 'จอง'),
(18, '2018-08-04 00:29:54', '3', '6', NULL, '1', '2018-08-17', '2018-08-18', '2', NULL, '1490', NULL, '08', '2018', 'จอง'),
(19, '2018-07-06 00:00:25', '2', '11', NULL, '1', '2018-07-19', '2018-07-20', '2', NULL, '1990', NULL, '07', '2018', 'จอง'),
(20, '2018-07-06 01:24:51', '2', '11', NULL, '1', '2018-08-19', '2018-08-20', '2', NULL, '1990', NULL, '07', '2018', 'จอง'),
(21, '2018-07-06 01:53:09', '2', '11', NULL, '1', '2018-08-27', '2018-08-28', '2', NULL, '1990', NULL, '07', '2018', 'จอง'),
(23, '2018-07-14 00:32:09', '3', '13', NULL, '1', '2018-07-14', '2018-07-15', '2', NULL, '1500', NULL, '07', '2018', 'จอง'),
(24, '2018-07-14 10:49:20', '2', '13', NULL, '1', '2018-09-06', '2018-09-07', '5', NULL, '2000', NULL, '07', '2018', 'จอง'),
(25, '2018-07-14 10:49:48', '3', '6', NULL, '1', '2018-09-07', '2018-09-08', '5', NULL, '1500', NULL, '07', '2018', 'เช็คอิน');

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
(2, 'ส้มตำ', '34', 'DSC_8155.jpg');

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
(1, 1, 1, NULL),
(2, 2, 1, NULL),
(3, 2, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Oid` int(11) NOT NULL COMMENT 'รหัส',
  `Odate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'วันที่',
  `Optotal` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'ราคารวม',
  `Pid` int(11) DEFAULT NULL COMMENT 'การชำระเงิน',
  `Bid` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'การจอง'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Oid`, `Odate`, `Optotal`, `Pid`, `Bid`) VALUES
(1, '2018-06-14', '500', 1, NULL),
(2, '2018-07-02 20:57:40', '170', 2, NULL);

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
(3, 'รอการยืนยัน'),
(4, 'ชำระผ่านธนาคาร'),
(5, 'เงินสด');

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
(1, 'อกดอดกอกดอกดอกดเเเ', '2018-06-14', '2018-07-15', 50, 'images.jpg', NULL),
(4, 'nfgnfgnfgnfg', '2018-06-21', '2018-07-09', 10, 'hjh.jpg', '2018-06-21 - 2018-07-09'),
(12, 'bgebdgbd', '2018-07-01', '2018-07-04', 10, '462cc737-ee9f-4457-ad06-3a826ab245b3.jpg', '2018-07-01 - 2018-07-04'),
(13, 'rgbgrbrgbrgb', '2018-08-30', '2018-08-31', 10, '462cc737-ee9f-4457-ad06-3a826ab245b3.jpg', '2018-08-30 - 2018-08-31');

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
(3, 'ดอกไม้', '3', '1500', 'เกเ้เด้ดเ้กด้กดเหเพเ้เพ้้ะำะ', 'ghnhgng.jpg', 4, 2),
(4, 'ดอกไม้บาน', '4', '2500', 'เ้ท้่ทเ่้ท่้ท้่ทเ่ทเ่', 'hjh.jpg', 2, 2),
(5, 'ดอกไม้บานมาก', '5', '3000', 'เืเืเ้ื้ื้พื้ดืbbnngfnjnhjmg', 'images.jpg', 2, 3);

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
(3, 'กำลังจะเข้าพัก'),
(4, 'เข้าพักแล้ว'),
(5, 'พร้อมเข้าพัก'),
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
('5se2grkvpbc0c5n2gaa11em8k1', 1531217904, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a31303b5f5f72657475726e55726c7c733a33383a22687474703a2f2f6c6f63616c686f73742f692d7265736f7274322f726f6f6d2f696e64657832223b),
('d7glnnv2d6c7c0nqehcvb613ff', 1531551521, 0x5f5f666c6173687c613a303a7b7d5f5f72657475726e55726c7c733a31393a222f692d7265736f7274322f6261636b656e642f223b),
('joqb1hd5o8t0gbosmcnkidvsmo', 1531158908, 0x5f5f666c6173687c613a303a7b7d),
('r045q140i12gvqikgc5et1ptjg', 1531412921, 0x5f5f666c6173687c613a303a7b7d),
('ree2d21ovg6nvt93fr52cdlffj', 1531499289, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a31303b5f5f72657475726e55726c7c733a34353a22687474703a2f2f6c6f63616c686f73742f692d7265736f7274322f726f6f6d2f696e6465785f636f756e746572223b),
('uh882dbg88brno4dikit67j16r', 1531558318, 0x5f5f666c6173687c613a303a7b7d5f5f72657475726e55726c7c733a33373a22687474703a2f2f6c6f63616c686f73742f692d7265736f7274322f736974652f696e646578223b5f5f69647c693a363b);

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
(1, NULL, 'PAY-71N9855027700134DLMY645I', '6f6d6c31d140b10ab680e89fc9299917', NULL, '-', '-', 1),
(2, NULL, 'PAY-0G728514K42626150LMY7PQQ', '9729a91b44a5bdd41b63d6303f55f20d', NULL, '-', '-', 1),
(3, NULL, 'PAY-94S408624W724454XLMY7RTQ', '08b99e7e2eff3f41993137867fa3e471', 1, '2018-06-26T08:28:41Z', '2018-06-26T08:28:38Z', 1),
(4, NULL, 'PAY-0U571297A9412020JLMY7S3Y', 'ba6b3448a038783a56752579f76656c7', 1, '2018-06-26T08:30:27Z', '2018-06-26T08:30:25Z', 2),
(5, NULL, 'PAY-9CL42794VL681762ULM3RLWQ', '44c5079b0d52b1ded9c3f059316e71f2', NULL, '-', '-', 2),
(6, 6, 'PAY-4HT74175BK695763PLM3RM5I', 'e85d80ec8e8abdbb0b861a6b76281a85', 1, '2018-06-30T05:35:45Z', '2018-06-30T05:35:42Z', 2),
(7, 6, 'PAY-80C54419FP4850507LM3ROJQ', '18aa585eb37eac5e1dbf7ec8ba570995', 1, '2018-06-30T05:38:06Z', '2018-06-30T05:38:04Z', 3),
(8, 6, 'PAY-14L38079A3554974JLM3RPEY', '1c2db7d56f6898115e4b1339af4f66fa', 1, '2018-06-30T05:39:55Z', '2018-06-30T05:39:53Z', 1),
(9, 6, 'PAY-1MX20344VK408870BLM3RPVA', '4fe4bcfa8ed70eb49de53e34ead00173', 1, '2018-06-30T05:41:03Z', '2018-06-30T05:41:01Z', 1),
(10, 6, 'PAY-6CX13853XK256915ELM3RXGQ', '0c5029fa4b0885067191ff5f1efbade5', 1, '2018-06-30T05:58:03Z', '2018-06-30T05:58:01Z', 2),
(11, 6, 'PAY-54040941WT717153RLM3RY5Q', 'c238a8cbdc959fb3c20c46a23f82e1da', 1, '2018-06-30T06:01:13Z', '2018-06-30T06:01:11Z', 1),
(12, 6, 'PAY-4WN13477UD739403XLM3R5SY', '5db390a572da0a1a9684f56b3077a6ff', 1, '2018-06-30T06:10:46Z', '2018-06-30T06:10:44Z', 1),
(13, 6, 'PAY-1NJ86967XX685841TLM3SM5Q', 'f72db9ebcb71b2d68e7c605004751901', NULL, '-', '-', 2),
(14, 6, 'PAY-0BW89566J8461361YLM3SOIA', 'ff0142588922b268a9f5ab4634ea3ffb', 1, '2018-06-30T06:46:40Z', '2018-06-30T06:46:37Z', 2),
(15, 6, 'PAY-519341306V363711MLM3TG4Y', 'a5bee5a7346366e750bc3d3d0d445988', NULL, '-', '-', 2),
(16, 6, 'PAY-13W564903K618315HLM3VPHA', 'f6f92aaf55d4699a2b0c05800c4544f3', 1, '2018-06-30T10:15:40Z', '2018-06-30T10:15:38Z', 2),
(17, 6, 'PAY-82W41512A1058500GLM3VR4A', '88450886d35a02334d889d6c3828f890', 1, '2018-06-30T10:19:30Z', '2018-06-30T10:19:28Z', 1),
(18, 6, 'PAY-14R91639WR5302115LM3VUCQ', 'ea432e1827e8aa324196768fcf2765c0', 1, '2018-06-30T10:24:19Z', '2018-06-30T10:24:16Z', 2),
(19, 6, 'PAY-4GF98375AD730420PLM3VVHA', '9e5f34d669fd6569f416dcf462f823af', 1, '2018-06-30T10:26:30Z', '2018-06-30T10:26:27Z', 2),
(20, 6, 'PAY-64922153MP986863ULM3WD6Q', '89bd0f1c858c62f7ac4017a7c49240c7', 1, '2018-06-30T10:58:20Z', '2018-06-30T10:58:13Z', 2),
(21, 6, 'PAY-8YS81115NC809722VLM3WF4I', '722b1934b6ae745513fd3a549ed19ccb', 1, '2018-06-30T11:03:05Z', '2018-06-30T11:03:02Z', 2),
(22, 6, 'PAY-6KT148060R4517919LM3YEUI', '9a9edb77e18d9a9d8b7a29e844fca7a0', 1, '2018-06-30T13:16:49Z', '2018-06-30T13:16:46Z', 1),
(23, 6, 'PAY-5TX50533W4070333TLM3YHMA', '43e87cd6d5055c25f1990e0d926fd01f', 1, '2018-06-30T13:21:21Z', '2018-06-30T13:21:19Z', 2),
(24, 6, 'PAY-07C51901W6435680BLM3YI2I', '4884b5719561dff452d588e6cadbe43d', 1, '2018-06-30T13:24:37Z', '2018-06-30T13:24:35Z', 5),
(25, 6, 'PAY-3LU10777B6363545GLM4DYJI', '33d41d708040c6d817a7caf680e977ad', 1, '2018-07-01T02:28:52Z', '2018-07-01T02:28:49Z', 1),
(26, 6, 'PAY-2DK48217JN9633053LM4DZEA', 'd0b951c4818d56b3d2ef741be8f9cd89', 1, '2018-07-01T02:30:04Z', '2018-07-01T02:30:01Z', 3),
(27, 6, 'PAY-8Y624591AV323554XLM4EHOA', '89364512d988d9101c612ae9d9200c06', 1, '2018-07-01T03:01:18Z', '2018-07-01T03:01:14Z', 5),
(28, 6, 'PAY-4KT80269AP212780NLM4GX5Q', '8572633f4642edf6b673adcdeb01c6c9', 1, '2018-07-01T05:52:41Z', '2018-07-01T05:52:37Z', 4),
(29, 6, 'PAY-37C14474S30342715LM5C24A', '79173fa1a643c60e7ae2f3d2e2edbbf5', 1, '2018-07-02T13:50:48Z', '2018-07-02T13:50:45Z', 2),
(30, 6, 'PAY-6JK77387LV472551YLM5C6VA', '2b08ae61248fae258b05a9def4d67bf2', 1, '2018-07-02T13:58:26Z', '2018-07-02T13:58:22Z', 2),
(31, 6, 'PAY-96801417Y73228941LM527EA', 'a5903b86425051bee0d50ffb4de2b462', NULL, '-', '-', 3),
(32, 6, 'PAY-53U37789WE736874MLM53BGY', '04ca3317dc0440883a81f05b07f121cf', NULL, '-', '-', 5),
(33, 6, 'PAY-5YF5146938187591LLM53EQA', 'e82a4aa4352c49a7ffe27b82c6ec36a8', NULL, '-', '-', 5),
(34, 6, 'PAY-1SE40535M4413754PLM53FEY', 'a258667a10cc96d9af3437f282dd9c02', 1, '2018-07-03T17:30:54Z', '2018-07-03T17:30:50Z', 3),
(35, 11, 'PAY-9V956413HE9945013LM7E5JQ', 'ccdebda65712da70f02d43d21fd85354', 1, '2018-07-05T17:04:06Z', '2018-07-05T17:04:02Z', 2),
(36, 11, 'PAY-6PR1762004740714WLM7GE4I', '39ba258299e1102eef344a7bb7747ca2', NULL, '-', '-', 2),
(37, 11, 'PAY-1M6583161T890153NLM7GSEY', '2b66b0ad27d0dc8faef6da4c5cf84580', NULL, '-', '-', 2),
(38, 11, 'PAY-5A665872UC2795209LNANMDY', 'cef75a3be6052b878c895e8a50912df6', 1, '2018-07-07T15:07:57Z', '2018-07-07T15:07:54Z', 3),
(39, 13, 'PAY-9TP57409AP540005BLNEOEGQ', 'dfbd89bd2495a2ecf54e5c5ebfd8defa', NULL, '-', '-', 3);

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
(11, 'fff', 'ffff@ff.com', '$2y$13$cVoRwc9YXzKczYtBp4VVHuVVjOeJ3yKexHS3v5xl6BBt5zisPD496', 10, 'B5xtERC1qvWJjGtIpwExh0M4eGTsUhsh', NULL, NULL, 1530809974, 1530809974),
(12, 'aaa', 'admiddn@gmail.com', '$2y$13$ZQjVr79CRlUVvJQ0zVFjuu3QND2hZLXileNfag1s1Sq8VrI1tTQyy', 10, 'hCKiucHlNwmyGDArgxc0_VsPepP3kxKK', NULL, NULL, 1531319159, 1531319159),
(13, 'adda', 'add@gmail.com', '$2y$13$uvC2tLiGJIgXDytZci3Qce8P.kmkOzks.VzqVEvPYJqX/N5snOX1i', 10, 'mgG8ewH4dVd4n2dQw7edJQBcHKhrsBJ6', NULL, NULL, 1531320784, 1531320784),
(14, 'sss', 'asssdd@gmail.coms', '$2y$13$nQEc84He2qN0wtShbuMu1er/G8VqfT0WugKrIBGMR1TXaJFY9pXee', 10, 'RWfwo7w43p0YhAOYIwfr1xkMgLUOrSh7', NULL, NULL, 1531320953, 1531320953),
(15, 'ssss', 'assssdd@gmail.coms', '$2y$13$LLjJgRXzGQ/D7XtBwrMxEevjF2Rg4bbntNzhwPRBpLz7e4BuzwnDC', 10, 'MkGVvxYU4C8J4MfPAPz9MwcTyjp4Tzee', NULL, NULL, 1531321025, 1531321025),
(16, 'fsa', 'dfa@ff.com', '$2y$13$gp1YB4mYJBbJBnwNkIpWv.bVF/i6pbckZS/3TGoel6PFC4h1oXjWy', 10, '4Z5SYMdRkm5vmZSSrEBJ5q6rz6EGbKp5', NULL, NULL, 1531321123, 1531321123);

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
(7, 'ใจดี', 'โคตรๆ', 'f@gmail.com', '0814586952', 'tim_80x80.png', 1, 4, 7),
(8, 'po', 'po', 'po15@gmail.com', '02457787545', 'อูจิน1.jpg', 1, 2, 8),
(9, 'การ', 'เงิน', 'dd@gmail.com', '0254875368', 'DSC_8155.jpg', 1, 6, 9),
(10, 'TingnoyChannel', 'รับ', 'boyskypart@gmail.com', '0254879652', 'DSC_8155.jpg', 2, 3, 10),
(11, 'กดเ้', 'sdfsd', '', '', NULL, NULL, 5, 11),
(12, 'sssss', 'ssssss', 'admiddn@gmail.com', '342342434', 'Koala.jpg', 7, 1, 12),
(13, 'sd', 'dd', 'add@gmail.com', '3333333333', 'Penguins.jpg', 3, 1, NULL),
(14, 'sdfs', 'sdf', 'asssdd@gmail.coms', '2323232323', 'Jellyfish.jpg', 8, 1, NULL),
(15, 'ssssss', 'ss', 'assssdd@gmail.coms', '', 'Tulips.jpg', 5, 1, NULL),
(16, 'wwww', 'www', 'dfa@ff.com', '', 'Koala.jpg', 6, 1, NULL);

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
  MODIFY `ADid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `Bid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `Fid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=4;
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
  MODIFY `ODid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Oid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PMid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `Pid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=14;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดี', AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
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
