-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2021 at 06:45 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clientmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Feedback_no` int(10) UNSIGNED NOT NULL,
  `CompanyName` varchar(200) NOT NULL,
  `Issue` varchar(50) NOT NULL,
  `Submitted_date` date DEFAULT NULL,
  `Feedback_details` varchar(50) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `From` varchar(20) NOT NULL,
  `Role` varchar(30) NOT NULL,
  `Response` varchar(100) NOT NULL,
  `Response_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `invoiceID` int(10) UNSIGNED NOT NULL,
  `ID` int(10) NOT NULL,
  `due_date` date NOT NULL,
  `product_details` varchar(200) NOT NULL,
  `unit_hours` int(20) DEFAULT NULL,
  `product_quantity` date NOT NULL,
  `product_cost` decimal(20,2) NOT NULL,
  `product_amount` decimal(20,2) NOT NULL,
  `product_sub` decimal(20,2) NOT NULL,
  `product_tax` decimal(20,2) NOT NULL,
  `product_discount` decimal(20,2) NOT NULL,
  `product_total` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_view`
--

CREATE TABLE `invoice_view` (
  `invoiceID` int(6) UNSIGNED NOT NULL,
  `date_received` date NOT NULL,
  `due_date` date NOT NULL,
  `invoice_amount` decimal(20,2) NOT NULL,
  `invoice_status` varchar(20) NOT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_method` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE `tblaccount` (
  `AccountID` varchar(7) NOT NULL,
  `Picture` varchar(150) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Phone` int(20) NOT NULL,
  `Status` varchar(8) NOT NULL DEFAULT 'Active',
  `Race` varchar(15) NOT NULL,
  `Nationality` varchar(20) NOT NULL,
  `Age` int(2) NOT NULL,
  `PassportNo` varchar(20) NOT NULL,
  `Visa_Status` varchar(5) NOT NULL,
  `Medical_checkUp` varchar(150) NOT NULL,
  `Passport_Copy` varchar(150) NOT NULL,
  `WorkingPermitDueDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`AccountID`, `Picture`, `Name`, `Password`, `Phone`, `Status`, `Race`, `Country`, `Age`, `Gender`, `PassportNo.`, `Visa Status`, `Medical check-up`, `Passport Copy`, `WorkingPermitDueDate`) VALUES
('GU002', 'guard.jpg', 'Mohammad Muthu', '123', 122523654, 'Active', 'Bangali', 'Bangladesh', 25, 'Male', 'A12345678', 'D3', 'medical.jpg', 'passport.jpg', '2024-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 8979555562, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2019-10-21 07:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `tblclient`
--

CREATE TABLE `tblclient` (
  `client_id` int(10) NOT NULL,
  `AccountID` int(10) DEFAULT NULL,
  `ContactName` varchar(120) DEFAULT NULL,
  `CompanyName` varchar(120) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `City` varchar(120) DEFAULT NULL,
  `State` varchar(120) DEFAULT NULL,
  `ZipCode` int(10) DEFAULT NULL,
  `Workphnumber` bigint(10) DEFAULT NULL,
  `Cellphnumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblclient`
--

INSERT INTO `tblclient` (`client_id`, `AccountID`, `ContactName`, `CompanyName`, `Address`, `City`, `State`, `ZipCode`, `Workphnumber`, `Cellphnumber`, `Email`, `Password`, `CreationDate`) VALUES
(1, 900370752, 'Sanjay Malhotra', 'ABC Private Limited', 'ABC Private Limited\r\nB-150,Okhla New Delhi', 'New Delhi', 'Delhi/NCR', 1100096, 8888888888, 4354354354, 'abc@gmail.com', '202cb962ac59075b964b07152d234b70', '2019-10-22 04:40:11'),
(2, 884010538, 'Sidharth Sukla', 'Infosys Pvt Ltd', 'Infosys Pvt Ltd\r\nC-123, Sector 15 Noida ', 'Noida', 'NCR', 1321121, 4454545454, 7787878787, 'infosys@gmail.com', '202cb962ac59075b964b07152d234b70', '2019-10-22 05:24:39'),
(3, 809338201, 'Naveen Singh', 'ghj pvt ltd', 'ghj pvt ltd\r\ng-127 Delhi', 'New Delhi', 'Delhi/NCR', 1100096, 4464654665, 4654654646, 'ghj@gmail.com', '202cb962ac59075b964b07152d234b70', '2019-10-22 05:26:50'),
(4, 639974991, 'Abir Rajwansh', 'KML PVT LTD', 'KML PVT LTD\r\nh-224 sector 62, Noida(NCR)', 'Noida', 'Delhi/NCR', 5465456, 5523235656, 8985652332, 'kml@gmail.com', '202cb962ac59075b964b07152d234b70', '2019-10-22 05:29:59'),
(5, 602410634, 'Kundan Shah', 'JK Enterprises', 'JK Enterprises\r\nH-120,Shivala Varanasi', 'Varanasi', 'UP', 221001, 1213465464, 1645489799, 'jk@gmail.com', '202cb962ac59075b964b07152d234b70', '2019-10-23 10:42:52'),
(6, 426546224, 'Anuj Kumar', 'PHPGurukul Programming Blog', 'New Delhi', 'New Delhi', 'Delhi', 110001, 9354778033, 9354778033, 'phpgurukulofficial@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2019-11-27 16:00:24'),
(7, 967927403, 'eqw', '12', '12', '12', 'eqw', 2222, 23123, 12331, 'sanjay1@hotmail.com', 'aa78c3db4fc4a1a343183d6113ec46ba', '2021-04-13 07:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(120) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About Us', 'bghjgjhg', NULL, NULL, '2019-10-24 07:54:52'),
(2, 'contactus', 'Contact Us', 'D-204, Hole Town South West,Delhi-110096,India', 'info@gmail.com', 8529631237, '2019-10-24 07:56:56');

-- --------------------------------------------------------

--
-- Table structure for table `tblservicedetail`
--

CREATE TABLE `tblservicedetail` (
  `ServiceID` varchar(10) NOT NULL,
  `ServiceDetail_ID` varchar(10) NOT NULL,
  `Guard_Day` int(2) NOT NULL,
  `Guard_Hour` int(2) NOT NULL,
  `Guard_Month` int(2) NOT NULL,
  `Hour` int(11) NOT NULL,
  `Day` int(3) NOT NULL,
  `Month` int(3) NOT NULL,
  `Discount_Code` varchar(20) NOT NULL,
  `Price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblservicedetail`
--

INSERT INTO `tblservicedetail` (`ServiceID`, `ServiceDetail_ID`, `Guard_Day`, `Guard_Hour`, `Guard_Month`, `Hour`, `Day`, `Month`, `Discount_Code`, `Price`) VALUES
('S001', 'SD001', 1, 0, 1, 6, 0, 1, '', '6800');

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

CREATE TABLE `tblservices` (
  `ServiceID` varchar(10) NOT NULL,
  `CompanyName` varchar(200) DEFAULT NULL,
  `ClientName` varchar(30) DEFAULT NULL,
  `Email` varchar(30) NOT NULL,
  `Phone` int(15) NOT NULL,
  `ServiceDetail_ID` varchar(10) NOT NULL,
  `Remark` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Postcode` int(6) NOT NULL,
  `State` varchar(20) NOT NULL,
  `CreateDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`ServiceID`, `CompanyName`, `ClientName`, `Email`, `Phone`, `ServiceDetail_ID`, `Remark`, `Address`, `Postcode`, `State`, `CreateDate`, `Status`) VALUES
('S001', 'Consolsys sdn bhd', 'Mr.Ahmad', 'ahmad@consolsys.com', 1124522369, 'SD001', '', '52,Jalan Wangsa', 53300, 'Kuala Lumpur', '2021-04-16 08:44:37', 'Assigned');

-- --------------------------------------------------------

--
-- Table structure for table `tblstaff`
--

CREATE TABLE `tblstaff` (
  `StaffID` varchar(9) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Phone` int(15) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Address` varchar(20) NOT NULL,
  `State` varchar(20) NOT NULL,
  `Postcode` int(5) NOT NULL,
  `Nationality` varchar(20) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Department` varchar(20) NOT NULL,
  `Position` varchar(20) NOT NULL,
  `Level` varchar(4) NOT NULL,
  `Salary` int(10) NOT NULL,
  `Joined date` date NOT NULL,
  `Visa status` varchar(3) NOT NULL,
  `Picture` varchar(100) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Age` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblvisitor`
--

CREATE TABLE `tblvisitor` (
  `VisitorID` varchar(10) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Phone` int(20) NOT NULL,
  `IC` int(15) NOT NULL,
  `DateVisited` date NOT NULL DEFAULT current_timestamp(),
  `WalkInTime` time NOT NULL DEFAULT current_timestamp(),
  `WalkOutTime` time NOT NULL,
  `TotalVisitTime` varchar(15) NOT NULL,
  `VisitUnit` varchar(10) NOT NULL,
  `VisitMethod` varchar(20) NOT NULL,
  `Remark` varchar(100) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Feedback_no`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`invoiceID`);

--
-- Indexes for table `invoice_view`
--
ALTER TABLE `invoice_view`
  ADD PRIMARY KEY (`invoiceID`);

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`AccountID`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblclient`
--
ALTER TABLE `tblclient`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblservicedetail`
--
ALTER TABLE `tblservicedetail`
  ADD PRIMARY KEY (`ServiceID`);

--
-- Indexes for table `tblservices`
--
ALTER TABLE `tblservices`
  ADD PRIMARY KEY (`ServiceID`);

--
-- Indexes for table `tblstaff`
--
ALTER TABLE `tblstaff`
  ADD PRIMARY KEY (`StaffID`);

--
-- Indexes for table `tblvisitor`
--
ALTER TABLE `tblvisitor`
  ADD PRIMARY KEY (`VisitorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Feedback_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `invoiceID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_view`
--
ALTER TABLE `invoice_view`
  MODIFY `invoiceID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblclient`
--
ALTER TABLE `tblclient`
  MODIFY `client_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`invoiceID`) REFERENCES `invoice_view` (`invoiceID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
