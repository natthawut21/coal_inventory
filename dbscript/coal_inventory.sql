-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2016 at 11:57 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coal_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(25) NOT NULL,
  `remarks` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`, `remarks`) VALUES
(1, 'โกดัง 1', 'โกดัง วัตถุดิบ'),
(2, 'โกดัง 2', 'โกดัง วัตถุดิบ'),
(3, 'โกดัง 3', 'โกดัง สินค้าแปรรูป'),
(4, 'โกดัง 4', 'โกดัง สินค้าแปรรูป'),
(5, 'โกดัง 5', 'โกดัง สินค้าแปรรูป');

-- --------------------------------------------------------

--
-- Table structure for table `mgnt_user`
--

CREATE TABLE `mgnt_user` (
  `uid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pwd` varchar(150) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `position` varchar(30) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

--
-- Dumping data for table `mgnt_user`
--

INSERT INTO `mgnt_user` (`uid`, `username`, `pwd`, `fullname`, `position`, `create_date`) VALUES
(1, 'user1', 'user1', 'User 1', 'RAWMAT_ADMIN', '2016-09-19 00:00:00'),
(2, 'user2', 'user2', 'User 2', 'RAWMAT_ADMIN', '2016-09-19 00:00:00'),
(3, 'user3', 'user3', 'User 3', 'PRODUCTION_ADMIN', '2016-09-19 00:00:00'),
(4, 'Guest', '', '', 'TEST_USER', '2016-09-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `production_document_detail`
--

CREATE TABLE `production_document_detail` (
  `p_id` int(11) NOT NULL,
  `ph_id` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `TM_PCT` decimal(5,2) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `unit_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `status_code` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

--
-- Dumping data for table `production_document_detail`
--

INSERT INTO `production_document_detail` (`p_id`, `ph_id`, `prod_id`, `TM_PCT`, `amount`, `unit_id`, `location_id`, `status_code`) VALUES
(9, 4, 2, '2.10', '250.00', 1, 2, ''),
(10, 4, 3, '2.10', '250.00', 1, 2, ''),
(11, 4, 4, '2.10', '500.00', 1, 2, ''),
(12, 4, 5, '2.10', '500.00', 1, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `production_document_header`
--

CREATE TABLE `production_document_header` (
  `ph_id` int(11) NOT NULL,
  `document_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `document_no` varchar(25) DEFAULT NULL,
  `remarks` varchar(250) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `create_by_uid` int(11) NOT NULL,
  `modify_date` datetime NOT NULL,
  `modify_by_uid` int(11) NOT NULL,
  `document_status` varchar(5) DEFAULT NULL,
  `status_code` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

--
-- Dumping data for table `production_document_header`
--

INSERT INTO `production_document_header` (`ph_id`, `document_date`, `document_no`, `remarks`, `create_date`, `create_by_uid`, `modify_date`, `modify_by_uid`, `document_status`, `status_code`) VALUES
(4, '2016-12-22 00:00:00', 'PRD-001', 'ผลิต 1500', '2016-12-22 23:21:25', 4, '2016-12-22 23:21:25', 4, '1', 'PRD-ADD');

-- --------------------------------------------------------

--
-- Table structure for table `product_code`
--

CREATE TABLE `product_code` (
  `prod_id` int(11) NOT NULL,
  `prod_type_id` int(11) NOT NULL,
  `sub_product_type_id` int(11) DEFAULT NULL,
  `prod_code_TH` varchar(50) NOT NULL,
  `prod_code_EN` varchar(50) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by_uid` int(11) NOT NULL,
  `modify_date` datetime DEFAULT NULL,
  `modify_by_uid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

--
-- Dumping data for table `product_code`
--

INSERT INTO `product_code` (`prod_id`, `prod_type_id`, `sub_product_type_id`, `prod_code_TH`, `prod_code_EN`, `balance`, `create_date`, `create_by_uid`, `modify_date`, `modify_by_uid`) VALUES
(1, 1, -1, 'ถ่านหินประเภท 1 / 4,200 KCal', 'Raw material', '3250.00', '2016-09-19 00:00:00', 1, '2016-12-22 23:24:40', 4),
(2, 2, 1, 'Size # 1(ถ่านหินประเภท 1 / 4,200 KCal)', 'Size # 1', '100.00', '2016-09-19 00:00:00', 3, '2016-12-22 23:24:41', 4),
(3, 2, 1, 'Size # 2(ถ่านหินประเภท 1 / 4,200 KCal)', 'Size # 2', '50.00', '2016-09-19 00:00:00', 1, '2016-12-22 23:24:41', 4),
(4, 2, 1, 'Size # 3(ถ่านหินประเภท 1 / 4,200 KCal)', 'Size # 3', '50.00', '2016-09-19 00:00:00', 1, '2016-12-22 23:24:41', 4),
(5, 2, 1, 'Size # 4(ถ่านหินประเภท 1 / 4,200 KCal)', 'Size # 4', '50.00', '2016-09-19 00:00:00', 1, '2016-12-22 23:24:41', 4),
(6, 1, -1, 'ถ่านหินประเภท 2 / 6,000 KCal', 'Raw material', '5100.00', '2016-09-19 00:00:00', 1, '2016-12-22 23:17:33', 4),
(7, 1, -1, 'ถ่านหินประเภท 3 / 5,000 KCal', 'Raw material', '5200.00', '2016-09-19 00:00:00', 1, '2016-12-22 23:17:33', 4),
(8, 2, 6, 'Size # 1 (ถ่านหินประเภท 2 / 6,000 KCal)', 'Size # 1', '0.00', '2016-09-19 00:00:00', 3, '2016-12-12 00:53:39', 4),
(9, 2, 6, 'Size # 2 (ถ่านหินประเภท 2 / 6,000 KCal)', 'Size # 2', '0.00', '2016-09-19 00:00:00', 1, '2016-12-12 00:53:39', 4),
(10, 2, 6, 'Size # 3 (ถ่านหินประเภท 2 / 6,000 KCal)', 'Size # 3', '0.00', '2016-09-19 00:00:00', 1, '2016-12-12 00:53:39', 4),
(11, 2, 6, 'Size # 4 (ถ่านหินประเภท 2 / 6,000 KCal)', 'Size # 4', '0.00', '2016-09-19 00:00:00', 1, '2016-12-12 00:53:39', 4),
(12, 2, 7, 'Size # 1 (ถ่านหินประเภท 3 / 5,000 KCal)', 'Size # 1', '0.00', '2016-09-19 00:00:00', 3, '2016-09-26 23:35:19', 4),
(13, 2, 7, 'Size # 2 (ถ่านหินประเภท 3 / 5,000 KCal)', 'Size # 2', '0.00', '2016-09-19 00:00:00', 1, '2016-10-03 00:26:20', 4),
(14, 2, 7, 'Size # 3 (ถ่านหินประเภท 3 / 5,000 KCal)', 'Size # 3', '0.00', '2016-09-19 00:00:00', 1, '2016-10-03 00:25:37', 4),
(15, 2, 7, 'Size # 4 (ถ่านหินประเภท 3 / 5,000 KCal)', 'Size # 4', '0.00', '2016-09-19 00:00:00', 1, '2016-09-26 23:33:30', 4);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `prod_type_id` int(11) NOT NULL,
  `prod_type_code` varchar(20) NOT NULL,
  `prod_type_code_TH` varchar(25) CHARACTER SET tis620 COLLATE tis620_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`prod_type_id`, `prod_type_code`, `prod_type_code_TH`) VALUES
(1, 'RAW_MATERIAL', 'วัตถุดิบ'),
(2, 'FINISHED_GOODS', 'สินค้าสำเร็จรูป');

-- --------------------------------------------------------

--
-- Table structure for table `receive_rawmat_document_detail`
--

CREATE TABLE `receive_rawmat_document_detail` (
  `r_id` int(11) NOT NULL,
  `rh_id` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `TM_PCT` decimal(5,2) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `unit_id` int(11) DEFAULT '1',
  `location_id` int(11) NOT NULL,
  `status_code` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

--
-- Dumping data for table `receive_rawmat_document_detail`
--

INSERT INTO `receive_rawmat_document_detail` (`r_id`, `rh_id`, `prod_id`, `TM_PCT`, `amount`, `unit_id`, `location_id`, `status_code`) VALUES
(33, 24, 1, '2.10', '5000.00', 1, 1, ''),
(34, 24, 6, '2.20', '5100.00', 1, 1, ''),
(35, 24, 7, '2.30', '5200.00', 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `receive_rawmat_document_header`
--

CREATE TABLE `receive_rawmat_document_header` (
  `rh_id` int(11) NOT NULL,
  `document_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `document_no` varchar(25) DEFAULT NULL,
  `remarks` varchar(250) DEFAULT NULL,
  `status_code` varchar(10) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `create_by_uid` int(11) DEFAULT NULL,
  `modify_date` datetime NOT NULL,
  `modify_by_uid` int(11) NOT NULL,
  `document_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

--
-- Dumping data for table `receive_rawmat_document_header`
--

INSERT INTO `receive_rawmat_document_header` (`rh_id`, `document_date`, `document_no`, `remarks`, `status_code`, `create_date`, `create_by_uid`, `modify_date`, `modify_by_uid`, `document_status`) VALUES
(24, '2016-12-21 00:00:00', 'RAW-001', 'รับวัตถุดิบ 15,300', 'RM-ADD', '2016-12-22 23:17:33', 4, '2016-12-22 23:17:33', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sell_document_detail`
--

CREATE TABLE `sell_document_detail` (
  `s_id` int(11) NOT NULL,
  `sh_id` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `TM_PCT` decimal(5,2) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `unit_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `status_code` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

--
-- Dumping data for table `sell_document_detail`
--

INSERT INTO `sell_document_detail` (`s_id`, `sh_id`, `prod_id`, `TM_PCT`, `amount`, `unit_id`, `location_id`, `status_code`) VALUES
(26, 15, 1, '2.10', '250.00', 1, 1, ''),
(27, 15, 2, '2.10', '150.00', 1, 2, ''),
(28, 15, 3, '2.10', '200.00', 1, 2, ''),
(29, 15, 4, '2.10', '450.00', 1, 2, ''),
(30, 15, 5, '2.10', '450.00', 1, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `sell_document_header`
--

CREATE TABLE `sell_document_header` (
  `sh_id` int(11) NOT NULL,
  `document_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `document_no` varchar(25) DEFAULT NULL,
  `remarks` varchar(250) DEFAULT NULL,
  `status_code` varchar(5) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `create_by_uid` int(11) NOT NULL,
  `modify_date` datetime NOT NULL,
  `modify_by_uid` int(11) NOT NULL,
  `document_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

--
-- Dumping data for table `sell_document_header`
--

INSERT INTO `sell_document_header` (`sh_id`, `document_date`, `document_no`, `remarks`, `status_code`, `create_date`, `create_by_uid`, `modify_date`, `modify_by_uid`, `document_status`) VALUES
(15, '2016-12-22 00:00:00', 'SEL-001', 'ขายของ 1500', 'PRD-S', '2016-12-22 23:24:40', 4, '2016-12-22 23:24:40', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tx_log`
--

CREATE TABLE `tx_log` (
  `tx_log_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `tx_type_id` int(11) NOT NULL,
  `tx_create_time` datetime DEFAULT NULL,
  `location_id` int(11) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `TM_PCT` decimal(5,2) NOT NULL,
  `prior_balance` decimal(15,2) DEFAULT NULL,
  `balance` decimal(15,2) DEFAULT NULL,
  `remarks` varchar(250) CHARACTER SET tis620 COLLATE tis620_bin DEFAULT NULL,
  `unit_id` int(11) NOT NULL,
  `tx_log_time` datetime NOT NULL,
  `uid` int(11) NOT NULL,
  `document_no` varchar(25) DEFAULT NULL,
  `status_remark` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

--
-- Dumping data for table `tx_log`
--

INSERT INTO `tx_log` (`tx_log_id`, `prod_id`, `tx_type_id`, `tx_create_time`, `location_id`, `amount`, `TM_PCT`, `prior_balance`, `balance`, `remarks`, `unit_id`, `tx_log_time`, `uid`, `document_no`, `status_remark`) VALUES
(92, 1, 1, '2016-12-21 00:00:00', 1, '5000.00', '2.10', '0.00', '5000.00', 'HEADER_ID=24', 1, '2016-12-22 23:17:33', 4, NULL, NULL),
(93, 6, 1, '2016-12-21 00:00:00', 1, '5100.00', '2.20', '0.00', '5100.00', 'HEADER_ID=24', 1, '2016-12-22 23:17:33', 4, NULL, NULL),
(94, 7, 1, '2016-12-21 00:00:00', 1, '5200.00', '2.30', '0.00', '5200.00', 'HEADER_ID=24', 1, '2016-12-22 23:17:33', 4, NULL, NULL),
(95, 1, 2, '2016-12-21 00:00:00', 1, '1500.00', '2.10', '5000.00', '3500.00', 'HEADER_ID=28', 1, '2016-12-22 23:18:33', 4, NULL, NULL),
(96, 2, 3, '2016-12-22 00:00:00', 2, '250.00', '2.10', '0.00', '250.00', 'HEADER_ID=4', 1, '2016-12-22 23:21:25', 4, NULL, NULL),
(97, 3, 3, '2016-12-22 00:00:00', 2, '250.00', '2.10', '0.00', '250.00', 'HEADER_ID=4', 1, '2016-12-22 23:21:25', 4, NULL, NULL),
(98, 4, 3, '2016-12-22 00:00:00', 2, '500.00', '2.10', '0.00', '500.00', 'HEADER_ID=4', 1, '2016-12-22 23:21:26', 4, NULL, NULL),
(99, 5, 3, '2016-12-22 00:00:00', 2, '500.00', '2.10', '0.00', '500.00', 'HEADER_ID=4', 1, '2016-12-22 23:21:26', 4, NULL, NULL),
(100, 1, 4, '2016-12-22 00:00:00', 1, '250.00', '0.00', '3500.00', '3250.00', 'HEADER_ID=26', 1, '2016-12-22 23:24:40', 4, NULL, NULL),
(101, 2, 4, '2016-12-22 00:00:00', 2, '150.00', '0.00', '250.00', '100.00', 'HEADER_ID=27', 1, '2016-12-22 23:24:40', 4, NULL, NULL),
(102, 3, 4, '2016-12-22 00:00:00', 2, '200.00', '0.00', '250.00', '50.00', 'HEADER_ID=28', 1, '2016-12-22 23:24:41', 4, NULL, NULL),
(103, 4, 4, '2016-12-22 00:00:00', 2, '450.00', '0.00', '500.00', '50.00', 'HEADER_ID=29', 1, '2016-12-22 23:24:41', 4, NULL, NULL),
(104, 5, 4, '2016-12-22 00:00:00', 2, '450.00', '0.00', '500.00', '50.00', 'HEADER_ID=30', 1, '2016-12-22 23:24:41', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tx_type`
--

CREATE TABLE `tx_type` (
  `tx_type_id` int(11) NOT NULL,
  `tx_code` varchar(25) NOT NULL,
  `tx_code_TH` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

--
-- Dumping data for table `tx_type`
--

INSERT INTO `tx_type` (`tx_type_id`, `tx_code`, `tx_code_TH`) VALUES
(1, 'ADD_RAW_MATERIAL', 'รับวัตถุดิบ'),
(2, 'WITHDRAW_RAW_MATERIAL', 'เบิกวัตถุดิบ'),
(3, 'ADD_FINISHED_GOODS', 'ผลิตสินค้าแปรรูป'),
(4, 'SELL_FINISHED_GOODS', 'ขายสินค้าแปรรูป');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(11) NOT NULL,
  `unit_code` varchar(15) NOT NULL,
  `kg_mux` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_code`, `kg_mux`) VALUES
(1, 'Tons', '1000.00'),
(2, 'Kg.', '1.00');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_document_detail`
--

CREATE TABLE `withdraw_document_detail` (
  `w_id` int(11) NOT NULL,
  `wh_id` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `TM_PCT` decimal(5,2) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `unit_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `status_code` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

--
-- Dumping data for table `withdraw_document_detail`
--

INSERT INTO `withdraw_document_detail` (`w_id`, `wh_id`, `prod_id`, `TM_PCT`, `amount`, `unit_id`, `location_id`, `status_code`) VALUES
(27, 28, 1, '2.10', '1500.00', 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_document_header`
--

CREATE TABLE `withdraw_document_header` (
  `wh_id` int(11) NOT NULL,
  `document_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `document_no` varchar(25) DEFAULT NULL,
  `remarks` varchar(250) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `create_by_uid` int(11) NOT NULL,
  `modify_date` datetime NOT NULL,
  `modify_by_uid` int(11) NOT NULL,
  `document_status` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

--
-- Dumping data for table `withdraw_document_header`
--

INSERT INTO `withdraw_document_header` (`wh_id`, `document_date`, `document_no`, `remarks`, `create_date`, `create_by_uid`, `modify_date`, `modify_by_uid`, `document_status`) VALUES
(28, '2016-12-21 00:00:00', 'WIT-001', 'เบิกแปรรูป 1500', '2016-12-22 23:18:33', 4, '2016-12-22 23:18:33', 4, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `mgnt_user`
--
ALTER TABLE `mgnt_user`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `production_document_detail`
--
ALTER TABLE `production_document_detail`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `production_document_header`
--
ALTER TABLE `production_document_header`
  ADD PRIMARY KEY (`ph_id`);

--
-- Indexes for table `product_code`
--
ALTER TABLE `product_code`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`prod_type_id`);

--
-- Indexes for table `receive_rawmat_document_detail`
--
ALTER TABLE `receive_rawmat_document_detail`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `r_id` (`r_id`);

--
-- Indexes for table `receive_rawmat_document_header`
--
ALTER TABLE `receive_rawmat_document_header`
  ADD PRIMARY KEY (`rh_id`),
  ADD KEY `rh_id` (`rh_id`);

--
-- Indexes for table `sell_document_detail`
--
ALTER TABLE `sell_document_detail`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `sell_document_header`
--
ALTER TABLE `sell_document_header`
  ADD PRIMARY KEY (`sh_id`);

--
-- Indexes for table `tx_log`
--
ALTER TABLE `tx_log`
  ADD PRIMARY KEY (`tx_log_id`);

--
-- Indexes for table `tx_type`
--
ALTER TABLE `tx_type`
  ADD PRIMARY KEY (`tx_type_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `withdraw_document_detail`
--
ALTER TABLE `withdraw_document_detail`
  ADD PRIMARY KEY (`w_id`);

--
-- Indexes for table `withdraw_document_header`
--
ALTER TABLE `withdraw_document_header`
  ADD PRIMARY KEY (`wh_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mgnt_user`
--
ALTER TABLE `mgnt_user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `production_document_detail`
--
ALTER TABLE `production_document_detail`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `production_document_header`
--
ALTER TABLE `production_document_header`
  MODIFY `ph_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product_code`
--
ALTER TABLE `product_code`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `prod_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `receive_rawmat_document_detail`
--
ALTER TABLE `receive_rawmat_document_detail`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `receive_rawmat_document_header`
--
ALTER TABLE `receive_rawmat_document_header`
  MODIFY `rh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `sell_document_detail`
--
ALTER TABLE `sell_document_detail`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `sell_document_header`
--
ALTER TABLE `sell_document_header`
  MODIFY `sh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tx_log`
--
ALTER TABLE `tx_log`
  MODIFY `tx_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `tx_type`
--
ALTER TABLE `tx_type`
  MODIFY `tx_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `withdraw_document_detail`
--
ALTER TABLE `withdraw_document_detail`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `withdraw_document_header`
--
ALTER TABLE `withdraw_document_header`
  MODIFY `wh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
