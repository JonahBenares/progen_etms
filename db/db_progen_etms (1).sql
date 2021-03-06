-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2021 at 07:46 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Furniture, Fixtures and Equipment');

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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `damage_series`
--

INSERT INTO `damage_series` (`ds_id`, `damage_prefix`, `series`) VALUES
(1, 'BCD-2019-04', 1001),
(3, '-2019-05', 1001),
(4, '-2019-01', 1001),
(5, 'BCD-2019-01', 1002),
(6, 'BCD-2019-08', 1001),
(7, 'BCD-2019-07', 1001),
(8, 'BCD-2019-08', 1003),
(9, 'BCD-2019-08', 1004),
(10, 'BCD-2019-08', 1005),
(11, '-2019-08', 1006),
(12, 'BCD-2019-10', 1001),
(13, 'CENPRI-B-2019', 11),
(14, 'CENPRI-B-2019', 11),
(15, 'CENPRI-S-2019', 11),
(16, 'CENPRI-B-2019', 12),
(17, 'CENPRI-B-2019', 12),
(18, 'CENPRI-B-2020', 1),
(21, 'CENPRI-B-2020-01', 1007),
(29, 'NA-2020-01', 1008),
(30, 'NA-2020-02', 1001),
(31, 'CENPRI-B-2020-03', 1001),
(32, 'CENPRI-B-2020-03', 1002),
(33, 'CENPRI-B-2020-06', 1001),
(34, 'CENPRI-B-2020-07', 1001),
(35, 'CENPRI-B-2020-07', 1002),
(36, 'CENPRI-B-2020-07', 1003),
(37, 'CENPRI-B-2020-09', 1001),
(38, 'CENPRI-B-2020-11', 1001),
(39, 'CENPRI-B-2020-11', 1002),
(40, 'CENPRI-B-2020-11', 1003),
(41, 'CENPRI-B-2020-11', 1004),
(42, 'CENPRI-B-2020-11', 1005),
(43, 'CENPRI-B-2020-11', 1006),
(44, 'CENPRI-B-2020-11', 1007);

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
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `employee_name`, `department`, `location_id`, `aaf_no`, `acf_no`, `position`, `contact_no`, `email`, `type`, `status`) VALUES
(1, 'Ma. Milagros Arana', 'Management', 1, 'CENPRI-B-1005', NULL, 'General Manager', '0917-5924080', '', 1, 0),
(2, 'Rhea Arsenio Subade', 'Trading', 1, 'CENPRI-B-1021', NULL, 'Trader', '0920-6398529', '', 1, 0),
(3, 'Jonah Faye Benares', 'IT Department', 1, 'CENPRI-B-1038', NULL, 'Software Development Supervisor', '0932-4515369', '', 1, 0),
(4, 'Kervic Biñas', 'Purchasing', 1, 'CENPRI-B-1067', NULL, 'Procurement Assistant', '0930-2357794', '', 1, 0),
(5, 'Joemarie Calibjo', 'Admin', 1, 'CENPRI-B-1037', NULL, 'Service Vehicle Driver', '0950-2900419', '', 1, 0),
(6, 'Maylen Cabaylo', 'Purchasing', 1, 'CENPRI-B-1010', NULL, 'Purchasing Officer', '09099491894/09234597487', '', 1, 0),
(7, 'Rey  Carbaquil', 'Admin', 1, 'CENPRI-B-1020', NULL, 'Service Vehicle Driver', '0912 5905319', '', 1, 0),
(8, 'Cristy Cesar', 'Accounting', 1, 'CENPRI-B-1014', NULL, 'Accounting Associate', '0916-3961389', '', 1, 0),
(9, 'Gretchen Danoy', 'Accounting', 1, 'CENPRI-B-1031', NULL, 'Accounting Supervisor', '0922-4386979', '', 1, 1),
(10, 'Merry Michelle Dato', 'Special Projects', 2, 'CENPRI-S-1018', NULL, 'Projects and Asset Management Assistant', '0920-5205418', '', 1, 0),
(11, 'Joemar De Los Santos', 'Trading', 1, 'CENPRI-B-1036', NULL, 'Lead Trader', '0923-4187139', '', 1, 0),
(12, 'Imelda Espera', 'Accounting / Finance', 1, 'CENPRI-B-1034', NULL, 'A/P & Credit Supervisor', '0918-6760758', '', 1, 0),
(13, 'Elaisa Jane Febrio', 'HR/Admin', 1, 'CENPRI-B-1018', NULL, 'HR Assistant', '0917-9941917', '', 1, 0),
(14, 'Jason Flor', 'IT Department', 1, 'CENPRI-B-1035', NULL, 'Software Development Assistant', '0939-6488141', '', 1, 0),
(15, 'Zara Joy Gabales', 'EMG-Billing', 1, 'CENPRI-B-1029', NULL, 'Billing Assistant', '0939-1159164', '', 1, 0),
(16, 'Relsie Gallo', '0', 1, 'CENPRI-B-1019', NULL, '0', '0', '', 1, 0),
(17, 'Celina Marie Grabillo', 'EMG-Billing', 1, 'CENPRI-B-1009', NULL, 'Billing & Settlement Officer', '0907-4494479', '', 1, 0),
(18, 'Nazario Shyde Jr. Ibañez', 'Trading', 1, 'CENPRI-B-1016', NULL, 'Trader', '0922-3271576', '', 1, 1),
(19, 'Gebby Jalandoni', 'Accounting', 1, 'CENPRI-B-1023', NULL, 'Accounting Assistant', '0909-9579077', '', 1, 0),
(20, 'Caesariane Jo', 'Trading', 1, 'CENPRI-B-1006', NULL, 'Trader', '0927-8212228', '', 1, 0),
(21, 'Lloyd Jamero', 'IT Department', 2, 'CENPRI-S-1006', NULL, 'IT Specialist', '0908-7636105', '', 1, 1),
(22, 'Annavi Lacambra', 'Accounting', 1, 'CENPRI-B-1003', NULL, 'Corporate Accountant', '0932-3649978', '', 1, 0),
(23, 'Ma. Erika Oquiana', 'Trading', 1, 'CENPRI-B-1004', NULL, 'Trader', '0912-4746470/09773640452', '', 1, 0),
(24, 'Charmaine Rei Plaza', 'Trading', 1, 'CENPRI-B-1011', NULL, 'Energy Market Analyst', '0948-9285185', '', 1, 0),
(25, 'Cresilda Mae Ramirez', 'Accounting', 1, 'CENPRI-B-1013', NULL, 'Internal Auditor', '0977-8215247', '', 1, 0),
(26, 'Melanie Rocha', 'Admin', 1, 'CENPRI-B-1012', NULL, 'Utility', '0910-4526879', '', 1, 0),
(27, 'Zyndyryn Rosales', 'Finance', 1, 'CENPRI-B-1030', NULL, 'Finance Supervisor', '0932-8737196', '', 1, 0),
(28, 'Genie Saludo', 'HR/Admin', 1, 'CENPRI-B-1024', NULL, 'HR Assistant', '09272257127/09454569188', '', 1, 1),
(29, 'Daisy Jane Sanchez', 'Trading', 1, 'CENPRI-B-1015', NULL, 'EMG Manager / WESM Compliance Officer', '0932-8773754', '', 1, 1),
(30, 'Rosemarie Sarroza', 'Trading', 1, 'CENPRI-B-1022', NULL, 'Trader', '0917-9512950', '', 1, 0),
(31, 'Stephine David Severino', 'IT Department', 1, 'CENPRI-B-1026', NULL, 'Software Development Assistant', '0977-7106914', '', 1, 0),
(32, 'Henry Sia', 'Engineering Dept.', 1, 'CENPRI-B-1033', NULL, 'Grid Integration Manager', '9177996939', '', 1, 0),
(33, 'Syndey Sinoro', 'HR/Admin', 1, 'CENPRI-B-1027', NULL, 'HR Supervisor', '0923-2802343', '', 1, 0),
(34, 'Marianita Tabilla', 'Finance', 1, 'CENPRI-B-1007', NULL, 'Finance Assistant', '0917-7793318', '', 1, 0),
(35, 'Krystal Gayle Tagalog', 'HR/Admin', 1, 'CENPRI-B-1070', NULL, 'Payroll Assistant', '0946-3348559', '', 1, 0),
(36, 'Hennelen Tanan', 'IT Department', 1, 'CENPRI-B-1032', NULL, 'IT Encoder ', '0945-5743745', '', 1, 0),
(37, 'Teresa Tan', 'Contracts & Compliance', 1, 'CENPRI-B-1028', NULL, 'Contracts & Compliance Asst.', '0923-6828813', '', 1, 1),
(38, 'Dary Mae Villas', 'Trading', 1, 'CENPRI-B-1017', NULL, 'Trader', '0930-7871989', '', 1, 0),
(39, 'Marlon Adorio', 'Electrical & Instrumentation', 2, 'CENPRI-S-1013', NULL, 'E & IC Technician', '0912-5896720', '', 1, 0),
(40, 'John Ezequiel Alejandro', 'Operations', 2, 'CENPRI-S-1058', NULL, 'Auxiliary Operator ', '0916-5321090', '', 1, 0),
(41, 'Carlito Alevio', 'Mechanical Maintenance', 2, 'CENPRI-S-1011', NULL, 'Plant Mechanic', '0926-8161359', '', 1, 0),
(42, 'Regina Alova', 'Trading', 2, 'CENPRI-S-1026', NULL, 'Operations Analyst', '09235607021 / 09485342153', '', 1, 0),
(43, 'Rebecca Alunan ', 'Trading', 2, 'CENPRI-S-1032', NULL, 'Performance Monitoring Supervisor', '0906-3425996', '', 1, 0),
(44, 'Fleur de Liz Ambong', 'Fuel Management', 2, 'CENPRI-S-1035', NULL, 'Fuel Management Asst.', '0909-4620177', '', 1, 0),
(45, 'Beverly  Ampog', 'Operations', 2, 'CENPRI-S-1009', NULL, 'Operations Analyst', '0995-3634548', '', 1, 0),
(46, 'Genaro Angulo', 'Electrical & Instrumentation', 2, 'CENPRI-S-1039', NULL, 'Electrical Supervisor', '09196745918', '', 1, 0),
(47, 'Rey Argawanon', 'Electrical & Instrumentation', 2, 'CENPRI-S-1030', NULL, 'Power Delivery & Technical Manager', '0917-8653566', '', 1, 0),
(48, 'Alona Arroyo', 'Operations', 2, 'CENPRI-S-1004', NULL, 'Operations Planner', '0919-3725318', '', 1, 0),
(49, 'Joemillan Baculio', 'Operations', 2, 'CENPRI-S-1056', NULL, 'Auxiliary Operator', '0906-8802652', '', 1, 0),
(50, 'Rashelle Joy Bating', 'Special Projects', 2, 'CENPRI-S-1023', NULL, 'Projects Coordinator Assistant', '0910-1980348', '', 1, 0),
(51, 'Gener Bawar', 'Machine Shop and Reconditioning', 2, 'CENPRI-S-1041', NULL, 'Machine Shop & Reconditioning Supervisor', '0920-2128998', '', 1, 0),
(52, 'Ruel Beato', 'Mechanical Maintenance', 2, 'CENPRI-S-1040', NULL, 'Plant Mechanic', '0939-2369794', '', 1, 0),
(53, 'Mary Grace Bugna', 'Accounting', 2, 'CENPRI-S-1014', NULL, 'Asset Management Asst.', '0930-7765706', '', 1, 0),
(54, 'Vency Cababat', 'Electrical & Instrumentation', 2, 'CENPRI-S-1048', NULL, ' E&IC Technician', '09267932911 / 09265638526', '', 1, 0),
(55, 'Rusty Canama', 'Mechanical Maintenance', 2, 'CENPRI-S-1042', NULL, 'Plant Mechanic', '0949-1547358', '', 1, 0),
(56, 'Exequil Corino', 'Operations', 2, 'CENPRI-S-1029', NULL, 'Engine Room Operator', '0920-6995646', '', 1, 0),
(57, 'Juanito Dagupan', 'Operations', 2, 'CENPRI-S-1060', NULL, 'Operation Shift Supervisor', '0918-6438993', '', 1, 0),
(58, 'Julyn May Divinagracia', 'HR/Admin', 2, 'CENPRI-S-1062', NULL, 'Admin Assistant', '0930-1553296/0916-6984461', '', 1, 0),
(59, 'Melfa Duis', 'Purchasing', 2, 'CENPRI-S-1016', NULL, 'Purchasing Assistant', '0927-4597157', '', 1, 0),
(60, 'Jerson Factolerin', 'HR/Admin', 2, 'CENPRI-S-1054', NULL, 'Utility', '0932-5420679', '', 1, 0),
(61, 'Julius Fernandez', 'Operations', 2, 'CENPRI-S-1061', NULL, 'Auxiliary Operator', '0918-2685507', '', 1, 0),
(62, 'Luisito Fortuno', 'Operations', 2, 'CENPRI-S-1007', NULL, 'Auxiliary Operator', '0908-3317408', '', 1, 0),
(63, 'Donna Gellada', 'Warehouse', 2, 'CENPRI-S-1025', NULL, 'Parts Inventory  Assistant', '0916-2779697', 'donna7.cenpri@gmail.com', 1, 0),
(64, 'Felipe, III Globert', 'Warehouse', 2, 'CENPRI-S-1034', NULL, 'Warehouse Assistant', '0948-7024664', '', 1, 0),
(65, 'Mikko Golvio', 'Electrical & Instrumentation', 2, 'CENPRI-S-1019', NULL, 'E&IC Technician', '0930-9363013', '', 1, 0),
(66, 'Eric Jabiniar', 'Management', 2, 'CENPRI-S-1028', NULL, 'Plant Director', '0917-8607244', '', 1, 0),
(67, 'Jushkyle Jambongana', 'IT Department', 2, 'CENPRI-S-1063', NULL, 'IT Assistant', '0912-3867454', '', 1, 0),
(68, 'Bobby  Jardiniano', 'HR/Admin', 2, 'CENPRI-S-1010', NULL, 'Service Vehicle Driver', '0933-3388374', '', 1, 0),
(69, 'Stephen Jardinico', 'Warehouse', 2, 'CENPRI-S-1046', NULL, 'Warehouse Assistant', '0912 922 1944', '', 1, 0),
(70, 'Joey Labanon', 'Operations', 2, 'CENPRI-S-1057', NULL, 'Auxiliary Operator Trainee', '0910-5787327', '', 1, 0),
(71, 'Roan Renz Liao', 'Warehouse', 2, 'CENPRI-S-1033', NULL, 'Parts Engineer', '0925-4887286', '', 1, 0),
(72, 'Gino Lovico', 'Machine Shop and Reconditioning', 2, 'CENPRI-S-1045', NULL, 'Foreman (Machine Shop & Recon)', '0999-8143307', '', 1, 0),
(73, 'Ricky Madeja', 'Admin', 2, 'CENPRI-S-1031', NULL, 'Safety Officer', '0918-6268028', '', 1, 0),
(74, 'Danilo Maglinte', 'Operations', 2, 'CENPRI-S-1020', NULL, 'Engine Room Operator', '0935-4046632', '', 1, 0),
(75, 'Alex Manilla Jr.', 'Fuel Management', 2, 'CENPRI-S-1001', NULL, 'Fuel Tender', '0999-7353561', '', 1, 0),
(76, 'Concordio Matuod', 'Electrical Department', 2, 'CENPRI-S-1015', NULL, 'Project Consultant', '0915-326-1829', '', 1, 0),
(77, 'Genielyne Mondejar', 'Admin', 2, 'CENPRI-S-1044', NULL, 'Pollution Control Officer  ', '0912-5356230', '', 1, 0),
(78, 'Francis Montero', 'Mechanical Maintenance', 2, 'CENPRI-S-1037', NULL, 'Plant Mechanic', '0918-2063492', '', 1, 0),
(79, 'Andro Ortega', 'Operations', 2, 'CENPRI-S-1005', NULL, 'Shift Supervisor Trainee', '0932-2400663', '', 1, 0),
(80, 'Joselito Panes', 'Mechanical Maintenance', 2, 'CENPRI-S-1059', NULL, 'Plant Mechanic', '0929-2629467', '', 1, 0),
(81, 'Nonito Pocong', 'Operations', 2, 'CENPRI-S-1021', NULL, 'Control Room Operator', '0933-6159620', '', 1, 0),
(82, 'Mario Dante Purisima', 'Operations', 2, 'CENPRI-S-1012', NULL, 'Shift Supervisor Trainee', '0927-1687549', '', 1, 0),
(83, 'Romeo Quiocson Jr.', 'Special Projects', 2, 'CENPRI-S-1036', NULL, 'Technical Assistant', '0927-6537369', '', 1, 0),
(84, 'Lawrence Vincent Roiles', 'Electrical & Instrumentation', 2, 'CENPRI-S-1002', NULL, 'E&IC Technician', '0936-6568781', '', 1, 0),
(85, 'Roy Sabit', 'Operations', 2, 'CENPRI-S-1038', NULL, 'Control Room Operator', '0947-9916563', '', 1, 0),
(86, 'Robert Sabando', 'Special Projects', 2, 'CENPRI-S-1053', NULL, 'Project Consultant', '0927-741-1950', '', 1, 0),
(87, 'Godfrey Stephen Samano', 'Operations', 2, 'CENPRI-S-1047', NULL, 'O&M Superintendent', '0908-6094932', '', 1, 0),
(88, 'Kennah Sasamoto', 'Testing Group', 2, 'CENPRI-S-1065', NULL, 'Test  Engineer', '0977-7842536', '', 1, 0),
(89, 'Iris Sixto', 'Admin', 2, 'CENPRI-S-1051', NULL, 'Site Facilities Supervisor', '0948-2732052', '', 1, 0),
(90, 'Kelwin Sarcauga', 'Operations', 2, 'CENPRI-S-1064', NULL, 'Engine Room Operator Trainee', '0932-1253131', '', 1, 0),
(91, 'Ranie Tabanao', '0', 2, 'CENPRI-S-1022', NULL, '0', '0', '', 1, 0),
(92, 'Alexander Tagarda', 'Operations', 2, 'CENPRI-S-1003', NULL, 'Control Room Operator', '0936-2138490', '', 1, 0),
(93, 'Ariel Tandoy', 'Warehouse', 2, 'CENPRI-S-1008', NULL, 'Driver', '0915-9555253', '', 1, 0),
(94, 'Ryan Tignero', 'Operations', 2, 'CENPRI-S-1043', NULL, 'Shift Supervisor Trainee', '0927-2885847', '', 1, 0),
(95, 'Elmer Torrijos', 'Mechanical Maintenance', 2, 'CENPRI-S-1027', NULL, 'Mechanical Maintenance Supervisor / Equipment & Parts Engr.', '0999 677 8341', '', 1, 0),
(96, 'Democrito Urnopia', 'Mechanical Maintenance', 2, 'CENPRI-S-1024', NULL, 'Plant Mechanic', '0930-8736393', '', 1, 0),
(97, 'Jobelle Villarias', 'Admin', 2, 'CENPRI-S-1055', NULL, 'Company Nurse', '0917-1595665', '', 1, 0),
(98, 'Melinda Aquino', 'Accounting', 2, 'CENPRI-S-1017', NULL, 'Accounting Assistant/ Bookkeeper', '0949-3005-813', '', 1, 0),
(99, 'Irish Dawn Torres', 'Admin', 2, 'CENPRI-S-1052', NULL, 'Site Admin Officer', '0932-8657926', '', 1, 0),
(100, 'Vincent Jed Depasupil', 'Operations', 2, 'CENPRI-S-1049', NULL, 'Auxiliary Operator', '', '', 1, 0),
(101, 'William Soltes', '', 2, 'CENPRI-S-1050', NULL, '', '', '', 1, 0),
(115, 'Silena Jomiller', 'Admin Department', 1, 'CENPRI-B-1025', NULL, 'Field Research Associate', NULL, NULL, 1, 0),
(118, 'Carlos Antonio Leonardia', 'Renewable Energy Department', 1, 'CENPRI-B-1008', NULL, 'Senior Project Engineer', NULL, NULL, 1, 0),
(119, 'Liza Marie Tasic', 'Shoppers Guide', 1, 'CENPRI-B-1002', NULL, '', NULL, NULL, 1, 0),
(120, 'Adrian Nemes', 'Shoppers Guide', 1, 'CENPRI-B-1001', NULL, '', NULL, NULL, 1, 0),
(121, 'IT Department', NULL, 1, 'CENPRI-B-1039', NULL, NULL, NULL, NULL, 2, 0),
(122, 'EMG-Billing', NULL, 1, 'CENPRI-B-1040', NULL, NULL, NULL, NULL, 2, 0),
(123, 'Board Room', NULL, 1, 'CENPRI-B-1041', NULL, NULL, NULL, NULL, 2, 0),
(124, 'Ladi Bacong', 'Shoppers Guide', 1, 'CENPRI-B-1042', NULL, '', NULL, NULL, 1, 0),
(125, 'Angelika Caballero', 'Shoppers Guide', 1, 'CENPRI-B-1043', NULL, '', NULL, NULL, 1, 1),
(126, 'Accounting Department', NULL, 1, 'CENPRI-B-1044', NULL, NULL, NULL, NULL, 2, 0),
(127, 'HR Department', NULL, 1, 'CENPRI-B-1045', NULL, NULL, NULL, NULL, 2, 0),
(128, 'Prency Francisco', 'HR/Admin', 1, 'CENPRI-B-1046', NULL, 'Admin Assistant Trainee', NULL, NULL, 1, 0),
(129, 'Rose Brenette Gaudite', 'Admin', 1, 'CENPRI-B-1047', NULL, '', NULL, NULL, 1, 0),
(130, 'Trading Department', NULL, 1, 'CENPRI-B-1048', NULL, NULL, NULL, NULL, 2, 0),
(131, 'Rowena Ricarse', 'Trading Department', 1, 'CENPRI-B-1049', NULL, '', NULL, NULL, 1, 1),
(132, 'Glenn Paul Toledo', 'IT Department', 1, 'CENPRI-B-1050', NULL, 'IT Encoder', NULL, NULL, 1, 0),
(133, 'Aileen Tamano', 'HR/Admin', 1, 'CENPRI-B-1051', NULL, '', NULL, NULL, 1, 0),
(134, 'Ivy Aizpuro', 'Finance', 1, 'CENPRI-B-1052', NULL, 'Finance Assistant', NULL, NULL, 1, 0),
(135, 'Purchasing Department', NULL, 1, 'CENPRI-B-1053', NULL, NULL, NULL, NULL, 2, 0),
(136, 'Engineering', NULL, 1, 'CENPRI-B-1054', NULL, NULL, NULL, NULL, 2, 0),
(137, 'Joshua Rey Diocson', 'Yooreka', 1, 'CENPRI-B-1055', NULL, '', NULL, NULL, 1, 0),
(138, 'Butch C. Dujenio', 'Shoppers Guide', 1, 'CENPRI-B-1056', NULL, 'Field Researcher Associate', NULL, NULL, 1, 0),
(139, 'Ladylyn Salavante', 'Finance', 1, 'CENPRI-B-1057', NULL, 'Finance Assistant', NULL, NULL, 1, 0),
(140, 'Crizeal Precious Claire Hilado', 'Renewable Energy Department', 1, 'CENPRI-B-1058', NULL, 'Renewable Energy Project Assistant', NULL, NULL, 1, 0),
(141, 'Sherny Mago', 'Accounting', 1, 'CENPRI-B-1059', NULL, 'Bookeeping Assistant', NULL, NULL, 1, 0),
(142, 'Ruth Jan Destacamento', 'Accounting', 1, 'CENPRI-B-1060', NULL, 'Internal Auditor', NULL, NULL, 1, 0),
(143, 'Julius Pangilinan', 'Electrical', 2, 'CENPRI-S-1066', NULL, 'Senior Test Engineer', NULL, NULL, 1, 0),
(144, 'Nelson Abas', 'Electrical', 2, 'CENPRI-S-1067', NULL, 'Generator Specialist', NULL, NULL, 1, 0),
(145, 'Dinah Estoria', 'Trading', 1, 'CENPRI-B-1061', NULL, 'Trader Trainee', NULL, NULL, 1, 0),
(146, 'Analyn Sulig', 'HR/Admin', 2, 'CENPRI-S-1068', NULL, 'Safety and Security Assistant Trainee', NULL, NULL, 1, 0),
(147, 'Babylyn Providencia', 'Contract and Compliance', 1, 'CENPRI-B-1062', NULL, 'Contract and Compliance Trainee', NULL, NULL, 1, 0),
(148, 'Donna Tolentino', 'Trading', 1, 'CENPRI-B-1063', NULL, 'Trader Trainee', NULL, NULL, 1, 0),
(149, 'Alma Lucerna', '', 1, 'CENPRI-B-1064', NULL, '', NULL, NULL, 1, 0),
(150, 'Beatrice Faye Lee', 'ShoppersGuide', 1, 'CENPRI-B-1065', NULL, 'Marketing Assistant', NULL, NULL, 1, 0),
(151, 'Heziel Aplaon', 'Accounting', 1, 'CENPRI-B-1066', NULL, 'Accounting Assistant', NULL, NULL, 1, 0),
(152, 'Ana Marie Mangubat', 'Engineering/ Renewable Energy', 1, 'CENPRI-B-1068', NULL, 'Research Engineer', NULL, NULL, 1, 1),
(153, 'John Lendre Sucaldito', 'Yoorekka', 1, 'CENPRI-B-1069', NULL, 'Video Editor', NULL, NULL, 1, 0),
(154, 'Alma Bella Redocto Gabitoya', 'HR/Admin', 1, 'CENPRI-B-1071', NULL, 'HR Assistant', NULL, NULL, 1, 0),
(155, 'Ryan Oliver Acosido Bricia', 'Trading', 1, 'CENPRI-B-1072', NULL, 'Trader', NULL, NULL, 1, 0),
(156, 'Jordan Yap', 'Accounting / Finance', 1, 'CENPRI-B-1073', NULL, 'Internal Auditor', NULL, NULL, 1, 0),
(157, 'Marcia Fuentes', 'Accounting', 1, 'CENPRI-B-1074', NULL, '', NULL, NULL, 1, 0),
(158, 'Admin', NULL, 1, 'CENPRI-B-1075', NULL, NULL, NULL, NULL, 2, 0),
(159, 'Rochelle Medina', 'HR', 1, 'CENPRI-B-1076', NULL, 'HR Assistant t', NULL, NULL, 1, 0),
(160, 'Progen Purchasing', NULL, 1, 'CENPRI-B-1077', NULL, NULL, NULL, NULL, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_inclusion`
--

CREATE TABLE IF NOT EXISTS `employee_inclusion` (
`ei_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `child_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_inclusion`
--

INSERT INTO `employee_inclusion` (`ei_id`, `parent_id`, `child_id`) VALUES
(1, 121, 36),
(2, 121, 3),
(3, 121, 14),
(4, 121, 31),
(5, 122, 15),
(6, 122, 17),
(7, 127, 0),
(8, 127, 35),
(9, 127, 33),
(10, 127, 13),
(11, 130, 11),
(12, 130, 2),
(13, 130, 18),
(14, 130, 24),
(15, 130, 38),
(16, 130, 30),
(17, 123, 33),
(19, 135, 6),
(20, 136, 118),
(21, 136, 149),
(22, 136, 140),
(23, 126, 151),
(24, 126, 8),
(25, 126, 142),
(26, 126, 12),
(27, 126, 19),
(28, 126, 22),
(29, 126, 141),
(31, 127, 154),
(32, 121, 132),
(33, 130, 155),
(34, 130, 145),
(35, 130, 20),
(36, 130, 23),
(37, 130, 148),
(38, 135, 128),
(39, 127, 159),
(40, 160, 4);

-- --------------------------------------------------------

--
-- Table structure for table `employee_series`
--

CREATE TABLE IF NOT EXISTS `employee_series` (
`empser_id` int(11) NOT NULL,
  `aaf_prefix` varchar(100) DEFAULT NULL,
  `series` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_series`
--

INSERT INTO `employee_series` (`empser_id`, `aaf_prefix`, `series`) VALUES
(1, 'CENPRI-S', 1001),
(2, 'CENPRI-B', 1001),
(3, 'CENPRI-S', 1002),
(4, 'CENPRI-S', 1003),
(5, 'CENPRI-B', 1002),
(6, 'CENPRI-S', 1004),
(7, 'CENPRI-S', 1005),
(8, 'CENPRI-S', 1006),
(9, 'CENPRI-B', 1003),
(10, 'CENPRI-S', 1007),
(11, 'CENPRI-S', 1008),
(12, 'CENPRI-B', 1004),
(13, 'CENPRI-S', 1009),
(14, 'CENPRI-B', 1005),
(15, 'CENPRI-S', 1010),
(16, 'CENPRI-B', 1006),
(17, 'CENPRI-B', 1007),
(18, 'CENPRI-S', 1011),
(19, 'CENPRI-S', 1012),
(20, 'CENPRI-B', 1008),
(21, 'CENPRI-S', 1013),
(22, 'CENPRI-S', 1014),
(23, 'CENPRI-B', 1009),
(24, 'CENPRI-B', 1010),
(25, 'CENPRI-B', 1011),
(26, 'CENPRI-B', 1012),
(27, 'CENPRI-S', 1015),
(28, 'CENPRI-S', 1016),
(29, 'CENPRI-B', 1013),
(30, 'CENPRI-S', 1017),
(31, 'CENPRI-B', 1014),
(32, 'CENPRI-S', 1018),
(33, 'CENPRI-B', 1015),
(34, 'CENPRI-S', 1019),
(35, 'CENPRI-B', 1016),
(36, 'CENPRI-S', 1020),
(37, 'CENPRI-S', 1021),
(38, 'CENPRI-S', 1022),
(39, 'CENPRI-S', 1023),
(40, 'CENPRI-B', 1017),
(41, 'CENPRI-S', 1024),
(42, 'CENPRI-S', 1024),
(43, 'CENPRI-S', 1025),
(44, 'CENPRI-S', 1026),
(45, 'CENPRI-B', 1018),
(46, 'CENPRI-S', 1027),
(47, 'CENPRI-B', 1019),
(48, 'CENPRI-S', 1028),
(49, 'CENPRI-B', 1020),
(50, 'CENPRI-S', 1029),
(51, 'CENPRI-S', 1030),
(52, 'CENPRI-B', 1021),
(53, 'CENPRI-S', 1031),
(54, 'CENPRI-S', 1032),
(55, 'CENPRI-S', 1033),
(56, 'CENPRI-S', 1034),
(57, 'CENPRI-S', 1034),
(58, 'CENPRI-S', 1035),
(59, 'CENPRI-S', 1036),
(60, 'CENPRI-S', 1037),
(61, 'CENPRI-B', 1022),
(62, 'CENPRI-B', 1023),
(63, 'CENPRI-S', 1038),
(64, 'CENPRI-S', 1039),
(65, 'CENPRI-S', 1040),
(66, 'CENPRI-S', 1041),
(67, 'CENPRI-S', 1042),
(68, 'CENPRI-B', 1024),
(69, 'CENPRI-S', 1043),
(70, 'CENPRI-S', 1044),
(71, 'CENPRI-B', 1025),
(72, 'CENPRI-S', 1045),
(73, 'CENPRI-S', 1046),
(74, 'CENPRI-S', 1047),
(75, 'CENPRI-B', 1026),
(76, 'CENPRI-B', 1027),
(77, 'CENPRI-B', 1028),
(78, 'CENPRI-S', 1048),
(79, 'CENPRI-S', 1049),
(80, 'CENPRI-S', 1050),
(81, 'CENPRI-B', 1029),
(82, 'CENPRI-B', 1030),
(83, 'CENPRI-B', 1031),
(84, 'CENPRI-B', 1032),
(85, 'CENPRI-B', 1033),
(86, 'CENPRI-B', 1034),
(87, 'CENPRI-S', 1051),
(88, 'CENPRI-S', 1051),
(89, 'CENPRI-S', 1052),
(90, 'CENPRI-S', 1053),
(91, 'CENPRI-B', 1035),
(92, 'CENPRI-S', 1054),
(93, 'CENPRI-S', 1055),
(94, 'CENPRI-B', 1036),
(95, 'CENPRI-B', 1037),
(96, 'CENPRI-S', 1056),
(97, 'CENPRI-S', 1057),
(98, 'CENPRI-S', 1058),
(99, 'CENPRI-B', 1038),
(100, 'CENPRI-S', 1059),
(101, 'CENPRI-S', 1060),
(102, 'CENPRI-S', 1061),
(103, 'CENPRI-S', 1062),
(104, 'CENPRI-S', 1063),
(105, 'CENPRI-S', 1064),
(106, 'CENPRI-S', 1065),
(107, 'CENPRI-B', 1039),
(108, 'CENPRI-B', 1040),
(109, 'CENPRI-B', 1041),
(110, 'CENPRI-B', 1042),
(111, 'CENPRI-B', 1043),
(112, 'CENPRI-B', 1044),
(113, 'CENPRI-B', 1045),
(114, 'CENPRI-B', 1046),
(115, 'CENPRI-B', 1047),
(116, 'CENPRI-B', 1048),
(117, 'CENPRI-B', 1049),
(118, 'CENPRI-B', 1050),
(119, 'CENPRI-B', 1051),
(120, 'CENPRI-B', 1052),
(121, 'CENPRI-B', 1053),
(122, 'CENPRI-B', 1052),
(123, 'CENPRI-B', 1054),
(124, 'CENPRI-B', 1025),
(125, 'CENPRI-B', 1055),
(126, 'CENPRI-B', 1056),
(127, 'CENPRI-B', 1057),
(128, 'CENPRI-B', 1008),
(129, 'CENPRI-B', 1058),
(130, 'CENPRI-B', 1059),
(131, 'CENPRI-B', 1060),
(132, 'CENPRI-B', 1060),
(133, 'CENPRI-B', 1059),
(134, 'CENPRI-B', 1058),
(135, 'CENPRI-S', 1066),
(136, 'CENPRI-S', 1067),
(137, 'CENPRI-S', 1066),
(138, 'CENPRI-B', 1061),
(139, 'CENPRI-S', 1068),
(140, 'CENPRI-B', 1062),
(141, 'CENPRI-B', 1063),
(142, 'CENPRI-B', 1064),
(143, 'CENPRI-B', 1065),
(144, 'CENPRI-B', 1066),
(145, 'CENPRI-B', 1067),
(146, 'CENPRI-B', 1068),
(147, 'CENPRI-B', 1016),
(148, 'CENPRI-B', 1069),
(149, 'CENPRI-B', 1068),
(150, 'CENPRI-B', 1070),
(151, 'CENPRI-B', 1031),
(152, 'CENPRI-S', 1006),
(153, 'CENPRI-B', 1024),
(154, 'CENPRI-B', 1015),
(155, 'CENPRI-B', 1028),
(156, 'CENPRI-B', 1043),
(157, 'CENPRI-B', 1068),
(158, 'CENPRI-B', 1071),
(159, 'CENPRI-B', 1062),
(160, 'CENPRI-B', 1049),
(161, 'CENPRI-B', 1072),
(162, 'CENPRI-B', 1058),
(163, 'CENPRI-B', 1021),
(164, 'CENPRI-B', 1073),
(165, 'CENPRI-B', 1074),
(166, 'CENPRI-B', 1075),
(167, 'CENPRI-B', 1073),
(168, 'CENPRI-B', 1076),
(169, 'CENPRI-B', 1077);

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
  `location_id` int(11) NOT NULL DEFAULT '0',
  `date_transfer` varchar(20) DEFAULT NULL,
  `transfer_series` varchar(100) DEFAULT NULL
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`, `location_prefix`) VALUES
(1, 'Bacolod', 'CENPRI-B'),
(2, 'Bago', 'CENPRI-S');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `placement`
--

INSERT INTO `placement` (`placement_id`, `placement_name`) VALUES
(1, 'CEMPCO Office'),
(2, 'HR/admin Area'),
(3, 'IT Area'),
(4, 'Billing Area'),
(5, 'Finance Area'),
(6, 'Purchasing Area'),
(7, 'Trading Area');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcat_id`, `category_id`, `subcat_name`, `subcat_prefix`, `location`, `subcat_desc`) VALUES
(1, 1, 'Transportation Equipment', 'FFE-TRA', 'BCD', 'Vehicles (Innova, Crosswind, Pickup, Fortuner, etc), Forklift, Boomtruck.'),
(2, 1, 'Communication Equipment', 'FFE-COM', 'BCD', 'Radio Handset, Radio Power Supply, Radio Repeater, Radio Antenna, Microphone with Cord for ICOM Motorola Radius'),
(3, 1, 'Office Furnitures', 'FFE-FUR', 'BCD', 'Office Chair, Office Table, Book Shelves, Filing Cabinets, Computer Table, Conference Table and Chairs, Table Top Glass, Cubicle, Office Partitions, Office Drawers'),
(4, 1, 'Office Equipment', 'FFE-EQU', 'BCD', 'Cellphones, Telephones, Printers, Scanners, Fax Machine, Overhead Projector,  Projector Screen, Photocopier, Hard Disk, USB, External Hard Drive, Recorder, Safety Vault, Standby Generator, Digital and Video Camera, Audio System for the Board Room, Microphone w/ Speaker,  Telephone System (PABX), Air Conditioning Unit, CCTV Camera, IP/Surveillance Camera, Industrial Fan, Air Cooler, Ceiling Fan, Electric Fan, Exhaust Fan, Television'),
(5, 1, 'Personal Protective Equipment', 'FFE-PPE', 'BCD', 'Hard Hat, Electrical Gloves, Goggles, Harness, Safety Shoes, Boots, Chemical Mask, Welding Mask'),
(6, 1, 'Safety & Security Equipment', 'FFE-SSE', 'BCD', 'Data Cabinet, Fire Extinguisher, Eye Wash and Face Shower, Emergency Light, Flash Light, Alarms, Caution Board, Warning Triangle or Cone, Biometric, Automatic Lock Door (Door Access),  Fire Hose,  Illuminated Fire Exit Sign'),
(7, 1, 'Appliance', 'FFE-APP', 'BCD', 'Gas Stove, Refrigirator,  CD/DVD Player, Blender & Juicers, Coffee Maker,  Rice Cooker, Toaster, Electric Airpot, Electric Kettle, Electric Stove, Electric/Gas Oven, Food Warmer/Steamer, Gas Stove, Microwave Oven, Water Dispenser, Dryer, Flat Iron, Hair Dryer, Steam Iron, Vacuum Cleaner, Washing Machine,'),
(8, 1, 'Staffhouse Furnitures and Supplies', 'FFE-STA', 'BCD', 'Dining Table and Chairs, Sofa, Beds, Clothes Cabinet, Mattress, Pillows, Pillow Case, Bed Sheets, Blanket'),
(9, 1, 'Housewares', 'FFE-HOU', 'BCD', 'Bowl, Cups and Saucers, Drinking Glass, Mug, Pitcher, Plate, Spoon and Fork, Food Keeper, Dipper, Pail, Trash Bin'),
(10, 1, 'Medical Equipment', 'FFE-MED', 'BCD', 'Glucometer, ( Glucose Meter, One Touch Ultra 2 ), Digital Blood Pressure Apparatus, Aneroid Blood Pressure Apparatus, Stechoscope, Weighing Scale, First Aid Equipment, Oxygen for First Aid'),
(11, 1, 'Computer Equipment', 'FFE- COMP', 'BCD', 'Routers, PCs, Laptops, UPS, Wifi Adapter'),
(12, 1, 'Office Supplies', 'FFE- SUP', 'BCD', 'Staplers, Calculators, Punchers, Scissor, Tape Dispenser, Filing Tray, Document Keeper, Clip Board, Binders, Books,');

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
-- Table structure for table `transfer_series`
--

CREATE TABLE IF NOT EXISTS `transfer_series` (
`transfer_id` int(11) NOT NULL,
  `prefix` varchar(100) DEFAULT NULL,
  `series` int(11) NOT NULL
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `username`, `password`, `usertype`) VALUES
(1, 'Mary Grace Bugna', 'marygrace', 'bugnagrace', 1),
(2, 'Merry Michelle Dato', 'merrymichelle', 'merrymichelle', 0),
(3, 'Renz Liao', 'renzliao', 'renzliao', 0),
(4, 'Aileen Tamaño', 'aileent', 'aileent', 0),
(5, 'itadmin', 'itadmin', 'itadmin', 1);

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
-- Indexes for table `transfer_series`
--
ALTER TABLE `transfer_series`
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
MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
MODIFY `ds_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=161;
--
-- AUTO_INCREMENT for table `employee_inclusion`
--
ALTER TABLE `employee_inclusion`
MODIFY `ei_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `employee_series`
--
ALTER TABLE `employee_series`
MODIFY `empser_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=170;
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
MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
MODIFY `placement_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
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
MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
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
-- AUTO_INCREMENT for table `transfer_series`
--
ALTER TABLE `transfer_series`
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
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
