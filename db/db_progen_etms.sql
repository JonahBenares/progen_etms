-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2021 at 07:52 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_progen_etms`
--

-- --------------------------------------------------------

--
-- Table structure for table `acf_series`
--

CREATE TABLE IF NOT EXISTS `acf_series` (
`acf_id` int(11) NOT NULL,
  `acf_prefix` varchar(50) DEFAULT NULL,
  `series` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `asset_series`
--

CREATE TABLE IF NOT EXISTS `asset_series` (
`asset_id` int(11) NOT NULL,
  `subcat_prefix` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `series` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `atf_series`
--

CREATE TABLE IF NOT EXISTS `atf_series` (
`atf_id` int(11) NOT NULL,
  `atf_prefix` varchar(255) DEFAULT NULL,
  `series` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `borrow_details`
--

CREATE TABLE IF NOT EXISTS `borrow_details` (
`bd_id` int(11) NOT NULL,
  `bh_id` int(11) NOT NULL DEFAULT '0',
  `et_id` int(11) NOT NULL DEFAULT '0',
  `ed_id` int(11) NOT NULL DEFAULT '0',
  `qty` int(11) NOT NULL DEFAULT '0',
  `returned` int(11) NOT NULL DEFAULT '0',
  `returned_date` varchar(20) DEFAULT NULL,
  `returned_by` int(11) NOT NULL DEFAULT '0',
  `return_qty` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `borrow_head`
--

CREATE TABLE IF NOT EXISTS `borrow_head` (
`bh_id` int(11) NOT NULL,
  `borrowed_by` int(11) NOT NULL DEFAULT '0',
  `borrowed_date` varchar(20) DEFAULT NULL,
  `borrow_series` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT '0',
  `create_date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `borrow_series`
--

CREATE TABLE IF NOT EXISTS `borrow_series` (
`bseries_id` int(11) NOT NULL,
  `borrow_prefix` varchar(50) DEFAULT NULL,
  `series` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`category_id` int(11) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
`company_id` int(11) NOT NULL,
  `company_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`) VALUES
(1, 'CENPRI'),
(2, 'ENERGREEN');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
`currency_id` int(11) NOT NULL,
  `currency_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`currency_id`, `currency_name`) VALUES
(1, 'PHP'),
(2, 'USD');

-- --------------------------------------------------------

--
-- Table structure for table `damage_info`
--

CREATE TABLE IF NOT EXISTS `damage_info` (
`damage_id` int(11) NOT NULL,
  `incident_date` varchar(20) DEFAULT NULL,
  `etdr_no` varchar(50) DEFAULT NULL,
  `activity` text,
  `et_id` int(11) NOT NULL DEFAULT '0',
  `ed_id` int(11) NOT NULL DEFAULT '0',
  `damage_location` text,
  `accountability` varchar(100) DEFAULT NULL,
  `incident_description` text,
  `equip_damage` text,
  `recommendation` text,
  `submitted_by` int(11) NOT NULL DEFAULT '0',
  `checked_by` int(11) NOT NULL DEFAULT '0',
  `noted_by` int(11) NOT NULL DEFAULT '0',
  `create_date` varchar(20) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `receive_date` varchar(20) DEFAULT NULL,
  `po_si_no` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `damage_series`
--

CREATE TABLE IF NOT EXISTS `damage_series` (
`ds_id` int(11) NOT NULL,
  `damage_prefix` varchar(100) DEFAULT NULL,
  `series` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
`department_id` int(11) NOT NULL,
  `department_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
`employee_id` int(11) NOT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `location_id` int(11) NOT NULL DEFAULT '0',
  `aaf_no` varchar(100) DEFAULT NULL,
  `acf_no` varchar(50) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_inclusion`
--

CREATE TABLE IF NOT EXISTS `employee_inclusion` (
`ei_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `child_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_series`
--

CREATE TABLE IF NOT EXISTS `employee_series` (
`empser_id` int(11) NOT NULL,
  `aaf_prefix` varchar(100) DEFAULT NULL,
  `series` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `et_details`
--

CREATE TABLE IF NOT EXISTS `et_details` (
`ed_id` int(11) NOT NULL,
  `et_id` int(11) NOT NULL DEFAULT '0',
  `set_id` int(11) NOT NULL DEFAULT '0',
  `physical_condition` text,
  `rack_id` int(11) NOT NULL DEFAULT '0',
  `company_id` int(11) NOT NULL DEFAULT '0',
  `placement_id` int(11) NOT NULL DEFAULT '0',
  `serial_no` varchar(50) DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `unit_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `currency` varchar(50) DEFAULT NULL,
  `currency_id` int(11) NOT NULL DEFAULT '0',
  `acquisition_date` varchar(20) DEFAULT NULL,
  `date_issued` varchar(20) DEFAULT NULL,
  `remarks` text,
  `asset_control_no` varchar(50) DEFAULT NULL,
  `damage` int(11) NOT NULL DEFAULT '0',
  `lost` int(11) NOT NULL DEFAULT '0',
  `beyond_repair` int(11) NOT NULL DEFAULT '0',
  `borrowed` int(11) NOT NULL DEFAULT '0',
  `acquired_by` varchar(50) DEFAULT NULL,
  `picture1` varchar(255) DEFAULT NULL,
  `picture2` varchar(255) DEFAULT NULL,
  `picture3` varchar(255) DEFAULT NULL,
  `change_location` int(11) NOT NULL DEFAULT '0',
  `location_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `et_head`
--

CREATE TABLE IF NOT EXISTS `et_head` (
`et_id` int(11) NOT NULL,
  `accountability_id` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL DEFAULT '0',
  `subcat_id` int(11) NOT NULL DEFAULT '0',
  `create_date` varchar(100) DEFAULT NULL,
  `et_desc` varchar(255) DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `unit_id` int(11) NOT NULL DEFAULT '0',
  `department` varchar(50) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `save_temp` int(11) NOT NULL DEFAULT '0',
  `cancelled` int(11) NOT NULL DEFAULT '0',
  `cancel_reason` text,
  `cancelled_by` int(11) NOT NULL DEFAULT '0',
  `cancel_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `et_info`
--

CREATE TABLE IF NOT EXISTS `et_info` (
`et_id` int(11) NOT NULL,
  `accountability_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `model` varchar(100) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `serial_no` varchar(100) DEFAULT NULL,
  `acquisition_date` varchar(100) DEFAULT NULL,
  `create_date` varchar(100) DEFAULT NULL,
  `date_issued` varchar(100) DEFAULT NULL,
  `et_desc` varchar(255) DEFAULT NULL,
  `qty` decimal(10,2) NOT NULL DEFAULT '0.00',
  `unit_id` int(11) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `location_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `remarks` text,
  `damaged` int(11) DEFAULT '0',
  `damaged_remarks` text,
  `damaged_of_unit` text,
  `aaf_no` varchar(100) DEFAULT NULL,
  `asset_control_no` varchar(100) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `et_set`
--

CREATE TABLE IF NOT EXISTS `et_set` (
`set_id` int(11) NOT NULL,
  `set_name` varchar(50) DEFAULT NULL,
  `set_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `set_serial_no` varchar(100) DEFAULT NULL,
  `set_currency` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
`location_id` int(11) NOT NULL,
  `location_name` varchar(100) DEFAULT NULL,
  `location_prefix` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lost_items`
--

CREATE TABLE IF NOT EXISTS `lost_items` (
`lost_id` int(11) NOT NULL,
  `ed_id` int(11) NOT NULL DEFAULT '0',
  `lost_date` varchar(20) DEFAULT NULL,
  `employee_id` int(11) NOT NULL DEFAULT '0',
  `remarks` text,
  `replacement` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `physical_condition`
--

CREATE TABLE IF NOT EXISTS `physical_condition` (
`physical_id` int(11) NOT NULL,
  `condition_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `placement`
--

CREATE TABLE IF NOT EXISTS `placement` (
`placement_id` int(11) NOT NULL,
  `placement_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rack`
--

CREATE TABLE IF NOT EXISTS `rack` (
`rack_id` int(11) NOT NULL,
  `rack_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `repair_details`
--

CREATE TABLE IF NOT EXISTS `repair_details` (
`repair_id` int(11) NOT NULL,
  `ed_id` int(11) NOT NULL DEFAULT '0',
  `repair_date` varchar(20) DEFAULT NULL,
  `repair_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `jo_no` varchar(50) DEFAULT NULL,
  `supplier` varchar(100) DEFAULT NULL,
  `assessment` int(11) NOT NULL DEFAULT '0',
  `received_by` int(11) NOT NULL DEFAULT '0',
  `remarks` text,
  `create_date` varchar(20) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `saved` int(11) NOT NULL DEFAULT '0',
  `unsaved` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `returned_et`
--

CREATE TABLE IF NOT EXISTS `returned_et` (
`return_id` int(11) NOT NULL,
  `et_id` int(11) NOT NULL DEFAULT '0',
  `accountability_id` int(11) NOT NULL DEFAULT '0',
  `receive_by` int(11) NOT NULL DEFAULT '0',
  `quantity` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ars_no` varchar(255) DEFAULT NULL,
  `return_date` varchar(20) DEFAULT NULL,
  `date_issued` varchar(20) DEFAULT NULL,
  `create_date` varchar(100) DEFAULT NULL,
  `return_remarks` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `returned_series`
--

CREATE TABLE IF NOT EXISTS `returned_series` (
`series_id` int(11) NOT NULL,
  `prefix` varchar(100) DEFAULT NULL,
  `series` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `return_details`
--

CREATE TABLE IF NOT EXISTS `return_details` (
`rd_id` int(11) NOT NULL,
  `return_id` int(11) NOT NULL DEFAULT '0',
  `et_id` int(11) NOT NULL DEFAULT '0',
  `ed_id` int(11) NOT NULL DEFAULT '0',
  `date_issued` varchar(20) DEFAULT NULL,
  `return_remarks` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `return_head`
--

CREATE TABLE IF NOT EXISTS `return_head` (
`return_id` int(11) NOT NULL,
  `ars_no` varchar(255) DEFAULT NULL,
  `atf_no` varchar(255) DEFAULT NULL,
  `return_date` varchar(20) DEFAULT NULL,
  `accountability_id` int(11) NOT NULL DEFAULT '0',
  `received_by` int(11) NOT NULL DEFAULT '0',
  `return_remarks` text,
  `create_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
`subcat_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `subcat_name` varchar(100) DEFAULT NULL,
  `subcat_prefix` varchar(100) DEFAULT NULL,
  `location` varchar(11) DEFAULT NULL,
  `subcat_desc` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transfer_details`
--

CREATE TABLE IF NOT EXISTS `transfer_details` (
`td_id` int(11) NOT NULL,
  `transfer_id` int(11) NOT NULL DEFAULT '0',
  `et_id` int(11) NOT NULL DEFAULT '0',
  `ed_id` int(11) NOT NULL DEFAULT '0',
  `date_issued` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transfer_head`
--

CREATE TABLE IF NOT EXISTS `transfer_head` (
`transfer_id` int(11) NOT NULL,
  `accountability_id` int(11) NOT NULL DEFAULT '0',
  `transfer_to` int(11) NOT NULL DEFAULT '0',
  `transfer_date` varchar(20) DEFAULT NULL,
  `create_date` varchar(100) DEFAULT NULL,
  `transfer_remarks` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
`unit_id` int(11) NOT NULL,
  `unit_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_name`) VALUES
(1, 'pc/s'),
(2, 'unit/s'),
(3, 'set/s');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `usertype` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `username`, `password`, `usertype`) VALUES
(1, 'admin', 'admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acf_series`
--
ALTER TABLE `acf_series`
 ADD PRIMARY KEY (`acf_id`);

--
-- Indexes for table `asset_series`
--
ALTER TABLE `asset_series`
 ADD PRIMARY KEY (`asset_id`);

--
-- Indexes for table `atf_series`
--
ALTER TABLE `atf_series`
 ADD PRIMARY KEY (`atf_id`);

--
-- Indexes for table `borrow_details`
--
ALTER TABLE `borrow_details`
 ADD PRIMARY KEY (`bd_id`);

--
-- Indexes for table `borrow_head`
--
ALTER TABLE `borrow_head`
 ADD PRIMARY KEY (`bh_id`);

--
-- Indexes for table `borrow_series`
--
ALTER TABLE `borrow_series`
 ADD PRIMARY KEY (`bseries_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
 ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
 ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `damage_info`
--
ALTER TABLE `damage_info`
 ADD PRIMARY KEY (`damage_id`);

--
-- Indexes for table `damage_series`
--
ALTER TABLE `damage_series`
 ADD PRIMARY KEY (`ds_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
 ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
 ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employee_inclusion`
--
ALTER TABLE `employee_inclusion`
 ADD PRIMARY KEY (`ei_id`);

--
-- Indexes for table `employee_series`
--
ALTER TABLE `employee_series`
 ADD PRIMARY KEY (`empser_id`);

--
-- Indexes for table `et_details`
--
ALTER TABLE `et_details`
 ADD PRIMARY KEY (`ed_id`);

--
-- Indexes for table `et_head`
--
ALTER TABLE `et_head`
 ADD PRIMARY KEY (`et_id`);

--
-- Indexes for table `et_info`
--
ALTER TABLE `et_info`
 ADD PRIMARY KEY (`et_id`);

--
-- Indexes for table `et_set`
--
ALTER TABLE `et_set`
 ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
 ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `lost_items`
--
ALTER TABLE `lost_items`
 ADD PRIMARY KEY (`lost_id`);

--
-- Indexes for table `physical_condition`
--
ALTER TABLE `physical_condition`
 ADD PRIMARY KEY (`physical_id`);

--
-- Indexes for table `placement`
--
ALTER TABLE `placement`
 ADD PRIMARY KEY (`placement_id`);

--
-- Indexes for table `rack`
--
ALTER TABLE `rack`
 ADD PRIMARY KEY (`rack_id`);

--
-- Indexes for table `repair_details`
--
ALTER TABLE `repair_details`
 ADD PRIMARY KEY (`repair_id`);

--
-- Indexes for table `returned_et`
--
ALTER TABLE `returned_et`
 ADD PRIMARY KEY (`return_id`);

--
-- Indexes for table `returned_series`
--
ALTER TABLE `returned_series`
 ADD PRIMARY KEY (`series_id`);

--
-- Indexes for table `return_details`
--
ALTER TABLE `return_details`
 ADD PRIMARY KEY (`rd_id`);

--
-- Indexes for table `return_head`
--
ALTER TABLE `return_head`
 ADD PRIMARY KEY (`return_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
 ADD PRIMARY KEY (`subcat_id`);

--
-- Indexes for table `transfer_details`
--
ALTER TABLE `transfer_details`
 ADD PRIMARY KEY (`td_id`);

--
-- Indexes for table `transfer_head`
--
ALTER TABLE `transfer_head`
 ADD PRIMARY KEY (`transfer_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
 ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acf_series`
--
ALTER TABLE `acf_series`
MODIFY `acf_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `asset_series`
--
ALTER TABLE `asset_series`
MODIFY `asset_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `atf_series`
--
ALTER TABLE `atf_series`
MODIFY `atf_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `borrow_details`
--
ALTER TABLE `borrow_details`
MODIFY `bd_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `borrow_head`
--
ALTER TABLE `borrow_head`
MODIFY `bh_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `borrow_series`
--
ALTER TABLE `borrow_series`
MODIFY `bseries_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `damage_info`
--
ALTER TABLE `damage_info`
MODIFY `damage_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `damage_series`
--
ALTER TABLE `damage_series`
MODIFY `ds_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee_inclusion`
--
ALTER TABLE `employee_inclusion`
MODIFY `ei_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee_series`
--
ALTER TABLE `employee_series`
MODIFY `empser_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `et_details`
--
ALTER TABLE `et_details`
MODIFY `ed_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `et_head`
--
ALTER TABLE `et_head`
MODIFY `et_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `et_info`
--
ALTER TABLE `et_info`
MODIFY `et_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `et_set`
--
ALTER TABLE `et_set`
MODIFY `set_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lost_items`
--
ALTER TABLE `lost_items`
MODIFY `lost_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `physical_condition`
--
ALTER TABLE `physical_condition`
MODIFY `physical_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `placement`
--
ALTER TABLE `placement`
MODIFY `placement_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rack`
--
ALTER TABLE `rack`
MODIFY `rack_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `repair_details`
--
ALTER TABLE `repair_details`
MODIFY `repair_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `returned_et`
--
ALTER TABLE `returned_et`
MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `returned_series`
--
ALTER TABLE `returned_series`
MODIFY `series_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `return_details`
--
ALTER TABLE `return_details`
MODIFY `rd_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `return_head`
--
ALTER TABLE `return_head`
MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transfer_details`
--
ALTER TABLE `transfer_details`
MODIFY `td_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transfer_head`
--
ALTER TABLE `transfer_head`
MODIFY `transfer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
