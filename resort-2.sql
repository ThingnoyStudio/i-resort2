-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2018 at 05:13 AM
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
  `ADzipcode` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'รหัสไปรษณี'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`ADid`, `ADnumber`, `ADhome`, `ADsubdistrict`, `ADdistrict`, `ADprovince`, `ADzipcode`) VALUES
(1, '111', 'ghghg', 'bfghgfhg', 'gbfgfg', 'fgbfgbfg', '14242');

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
('member', 8, 1529289544);

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
  `Bdatein` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'วันที่เช็คอิน',
  `Bdateout` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'วันที่เช็คเอ้า',
  `Pid` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'การชำระเงิน'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

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
('m150104_153617_create_article_table', 1528887304);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `Nid` int(11) NOT NULL COMMENT 'รหัส',
  `Ntopic` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'หัวข้อ',
  `Ndes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'รายละเอียด',
  `Nimg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'รูปภาพ'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`Nid`, `Ntopic`, `Ndes`, `Nimg`) VALUES
(1, 'ลด 20 %', 'ลด 20 % ในวันที่ 14 /6 /61', 'sidebar-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `ODid` int(11) NOT NULL COMMENT 'รหัส',
  `Fid` int(11) DEFAULT NULL COMMENT 'รหัสอาหาร',
  `Oid` int(11) DEFAULT NULL COMMENT 'รหัสออเดอร์'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Oid` int(11) NOT NULL COMMENT 'รหัส',
  `Odate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'วันที่',
  `Optotal` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'ราคารวม',
  `Pid` int(11) DEFAULT NULL COMMENT 'การชำระเงิน'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PMid` int(11) NOT NULL COMMENT 'รหัส',
  `PMname` text COLLATE utf16_unicode_ci COMMENT 'ประเภทการชำระเงิน'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `Pid` int(11) NOT NULL COMMENT 'รหัส',
  `Pname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'ชื่อโปรโมชั่น',
  `Pdatestart` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'วันที่เริ่ม',
  `Pdateend` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'วันที่สิ้นสุด',
  `Pdistant` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'ส่วนลด',
  `Ping` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'รูปภาพ'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

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
(1, 'สวิท', '1', '1500', 'jghmhmnghnhg', 'download.jpg', 1, NULL),
(2, 'ไม่สวิท', '2', '2000', 'เ้เ่เ้่เ้่เ้่ด้เ่tjhjfgjdjd', 'hgnghnghng.jpg', 1, NULL),
(3, 'ดอกไม้', '3', '1500', 'เกเ้เด้ดเ้กด้กดเหเพเ้เพ้้ะำะ', 'ghnhgng.jpg', 1, NULL),
(4, 'ดอกไม้บาน', '4', '2500', 'เ้ท้่ทเ่้ท่้ท้่ทเ่ทเ่', 'hjh.jpg', 1, NULL),
(5, 'ดอกไม้บานมาก', '5', '3000', 'เืเืเ้ื้ื้พื้ดืbbnngfnjnhjmg', 'images.jpg', 1, NULL);

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
(3, 'กำลังเข้าพัก'),
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
('0qgkulmaieitufg3b4ajj8nic7', 1529288901, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a313b),
('817bue2nh4psf1nh9i9u133jfu', 1529292859, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a313b),
('9v3j3t9duivnbio90p1000fgba', 1529292925, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a383b);

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
(7, 'bb', 'b@gmail.com', '$2y$13$92j9Hq4UgQHApEHNwmVJqu5YpZGZjqiTkXTPxJLZLGj5fL4Htjn7u', 10, 'ySYbb4xSByryo9Itkf3DeLLb1XfCVrmW', NULL, NULL, 1529243816, 1529243816),
(8, 'po', 'po@gmail.com', '$2y$13$aNtPpyjsrAGkLxuiNEZLJ.GP80NNrPQWkCUfLVd7KUT8pvG/gnnge', 10, 'uKQV6HsB8Tu2lpkodJQ50ttJfnlJkAEo', NULL, NULL, 1529289544, 1529289544);

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
(1, 'nopparut', 'yasataro', 'noppakit15@gmail.com', '0821034148', 'man.png', 1, 1, NULL),
(6, 'อัยการ', 'อัย', 'jfjfgj@gmail.com', '025785963', 'marc.jpg', NULL, 2, 6),
(7, 'ใจดี', 'โคตรๆ', 'f@gmail.com', '0814586952', 'tim_80x80.png', NULL, 6, 7),
(8, 'po', 'po', 'po15@gmail.com', '02457787545', 'อูจิน1.jpg', NULL, 5, 8);

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
  ADD PRIMARY KEY (`Uid`);

--
-- Indexes for table `userstatus`
--
ALTER TABLE `userstatus`
  ADD PRIMARY KEY (`USid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `ADid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `Bid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส';
--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `Fid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส';
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `Nid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `ODid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส';
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Oid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส';
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PMid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส';
--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `Pid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส';
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
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `userstatus`
--
ALTER TABLE `userstatus`
  MODIFY `USid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=7;
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
