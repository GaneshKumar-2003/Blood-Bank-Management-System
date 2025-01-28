-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2023 at 10:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloodbankcamp`
--

CREATE TABLE `bloodbankcamp` (
  `cid` int(100) NOT NULL,
  `Name of the Association` varchar(100) NOT NULL,
  `Email ID` varchar(50) NOT NULL,
  `phone no` int(10) NOT NULL,
  `District` varchar(20) NOT NULL,
  `State` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `venue` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bloodbankcamp`
--

INSERT INTO `bloodbankcamp` (`cid`, `Name of the Association`, `Email ID`, `phone no`, `District`, `State`, `date`, `venue`, `time`) VALUES
(10, 'Rotoract club', 'rotor@gmail.com', 2147483647, 'Chennai', 'Tamil Nadu', '2023-10-23', 'Marina Beach', '10a.m - 5p.m.'),
(11, 'Social club', 'socio@gmail.com', 2147483647, 'Chennai', 'Tamil Nadu', '2023-10-31', 'race course', '10am-12pm');

-- --------------------------------------------------------

--
-- Table structure for table `bloodinfo`
--

CREATE TABLE `bloodinfo` (
  `bid` int(11) NOT NULL,
  `hid` int(11) NOT NULL,
  `bg` varchar(10) NOT NULL,
  `Available` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bloodinfo`
--

INSERT INTO `bloodinfo` (`bid`, `hid`, `bg`, `Available`) VALUES
(1, 2, 'O-', 'Available'),
(2, 2, 'A+', 'Not Available'),
(3, 3, 'O+', 'Available'),
(4, 6, 'AB-', 'Available'),
(5, 3, 'AB-', 'Available'),
(6, 4, 'B-', 'Available'),
(7, 4, 'AB+', 'Not Available'),
(8, 5, 'O-', 'Available'),
(9, 5, 'B+', 'Not Available'),
(10, 6, 'A-', 'Available'),
(11, 6, 'B-', 'Available'),
(12, 2, 'A+', 'Available'),
(13, 2, 'B+', 'Available'),
(14, 2, 'O+', 'Available'),
(15, 2, 'A-', 'Available'),
(16, 2, 'AB+', 'Available'),
(17, 2, 'O-', 'Not Available'),
(18, 3, 'A+', 'Available'),
(19, 3, 'A-', 'Available'),
(20, 3, 'B+', 'Available'),
(21, 3, 'B-', 'Not Available'),
(22, 3, 'O+', 'Available'),
(23, 3, 'O-', 'Available'),
(24, 4, 'A+', 'Available'),
(25, 4, 'A-', 'Not Available'),
(26, 4, 'B+', 'Available'),
(27, 4, 'O+', 'Not Available'),
(28, 4, 'O-', 'Not Available'),
(29, 5, 'AB+', 'Available'),
(31, 6, 'A+', 'Available'),
(32, 6, 'A-', 'Not Available'),
(33, 6, 'B+', 'Available'),
(34, 6, 'B-', 'Not Available'),
(35, 5, 'O+', 'Available'),
(36, 5, 'O-', 'Not Available');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Age` int(4) NOT NULL,
  `Aadhar No` varchar(16) NOT NULL,
  `Email ID` varchar(20) NOT NULL,
  `District` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Blood Group` varchar(5) NOT NULL,
  `phone no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`id`, `username`, `password`, `Name`, `Age`, `Aadhar No`, `Email ID`, `District`, `State`, `Blood Group`, `phone no`) VALUES
(6, 'Abilash', 'Abilash1234#', 'Abilash A', 19, '2345 3453 3454', 'a.abilash1403@gmail.', 'Chennai', 'Tamil Nadu', 'O+', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `hid` int(11) NOT NULL,
  `hname` varchar(100) NOT NULL,
  `hemail` varchar(100) NOT NULL,
  `hpassword` varchar(100) NOT NULL,
  `hphone` varchar(100) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `hcity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`hid`, `hname`, `hemail`, `hpassword`, `hphone`, `Location`, `hcity`) VALUES
(2, 'Sathyabama Hospital', 'health@sisthospital.com', 'Sist@123', '04424502645', 'https://maps.app.goo.gl/oPsBiXPf2bMeNVS56', 'Chennai'),
(3, 'Apollo Multi Speciality Hospital', 'Apollocares@apollohospitals.com', 'Apollo@123', '914428290200', 'https://maps.app.goo.gl/UxieL4UL5gcAaex37', 'Chennai'),
(4, 'General Hospital \r\nblood bank', 'health@gh.com', 'gh@bloodbank', '9846374735', 'https://maps.app.goo.gl/KJoH16LTBU3oKfHG9', 'Chennai'),
(5, 'VijayKumar Hospital', 'health@vijaykumar.com', 'Vijaykumar@3425', '9335825825', 'https://maps.app.goo.gl/oxcgumFQiSJDWG287', 'Coimbatore'),
(6, 'Ganga Hospital', 'lifecare@gangahospital.com', 'Ganga@64', '914462855324', 'https://maps.app.goo.gl/hyrpjerNSow9MTveA', 'Coimbatore');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bloodbankcamp`
--
ALTER TABLE `bloodbankcamp`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `bloodinfo`
--
ALTER TABLE `bloodinfo`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `hid` (`hid`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`hid`),
  ADD UNIQUE KEY `hemail` (`hemail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bloodbankcamp`
--
ALTER TABLE `bloodbankcamp`
  MODIFY `cid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bloodinfo`
--
ALTER TABLE `bloodinfo`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bloodinfo`
--
ALTER TABLE `bloodinfo`
  ADD CONSTRAINT `bloodinfo_ibfk_1` FOREIGN KEY (`hid`) REFERENCES `hospitals` (`hid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
