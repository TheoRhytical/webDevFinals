-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2021 at 11:17 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `Fname` varchar(32) NOT NULL,
  `Mname` varchar(24) NOT NULL,
  `Lname` varchar(24) NOT NULL,
  `ContactNum` int(11) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Username` varchar(64) NOT NULL,
  `Passwords` varchar(64) NOT NULL,
  `DateofBirth` date NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `Fname`, `Mname`, `Lname`, `ContactNum`, `Email`, `Username`, `Passwords`, `DateofBirth`, `status`) VALUES
(1, 'Admin', 'Terminal', 'Admin', 1234567890, 'sample.admin01@example.com', 'SampleAdmin01', '$2y$10$UrCkRbIRzjYeVN1fr8ts0.XYyhIu4d62QbgXhaZ8uVH2rYxBbHkn6', '0000-00-00', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `Fname` varchar(32) NOT NULL,
  `Mname` varchar(24) NOT NULL,
  `Lname` varchar(24) NOT NULL,
  `ContactNum` int(11) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Username` varchar(64) NOT NULL,
  `Passwords` varchar(64) NOT NULL,
  `DateofBirth` date NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `Fname`, `Mname`, `Lname`, `ContactNum`, `Email`, `Username`, `Passwords`, `DateofBirth`, `status`) VALUES
(1, 'Sample', 'User', 'Thingey', 1234567890, 'sample.tester01@example.com', 'SampleTester01', '$2y$10$UrCkRbIRzjYeVN1fr8ts0.XYyhIu4d62QbgXhaZ8uVH2rYxBbHkn6', '2021-05-31', 'ACTIVE'),
(2, 'John', 'M', 'Doe', 912345678, 'johndoe@email.com', 'JohnDoe123', '$2y$10$oyDUHfIIXwHHpTB97p8zi.lwSgG8vyUzcd2rXTjTRKnUlSkx0mVze', '2021-05-01', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driverID` int(11) NOT NULL,
  `LicenseNum` varchar(24) NOT NULL,
  `Fname` varchar(32) NOT NULL,
  `Mname` varchar(24) NOT NULL,
  `Lname` varchar(24) NOT NULL,
  `ContactNum` int(11) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Username` varchar(64) NOT NULL,
  `Passwords` varchar(64) NOT NULL,
  `DateofBirth` date NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driverID`, `LicenseNum`, `Fname`, `Mname`, `Lname`, `ContactNum`, `Email`, `Username`, `Passwords`, `DateofBirth`, `status`) VALUES
(1, 'N03-12-123456', 'Sample', 'Vhire', 'Driver', 1234567890, 'sample.driver01@example.com', 'SampleDriver01', '$2y$10$UrCkRbIRzjYeVN1fr8ts0.XYyhIu4d62QbgXhaZ8uVH2rYxBbHkn6', '0000-00-00', 'ACTIVE'),
(2, 'ABC1234', 'Kathleen Iza', 'M', 'Monzales', 912345678, 'monzalesiza@gmail.com', 'KathleenIza123', '$2y$10$kCT8p07JwWEXT2dFs.aHKOMxsFjIcpSe2yLmPx1Eww3EbSVjVXY46', '2021-05-14', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `tripID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `AmountDue` float NOT NULL,
  `Status` enum('PENDING','CONFIRMED','CANCELLED') NOT NULL,
  `QRLink` varchar(72) NOT NULL,
  `orderCreationDT` timestamp NOT NULL DEFAULT current_timestamp(),
  `statusChangeDT` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `routeID` char(9) NOT NULL,
  `O_termID` char(4) NOT NULL,
  `D_termID` char(4) NOT NULL,
  `Fare` float NOT NULL,
  `Trip Duration` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`routeID`, `O_termID`, `D_termID`, `Fare`, `Trip Duration`) VALUES
('AYLA-CLNK', 'AYLA', 'CLNK', 100, '00:45:00'),
('AYLA-SMSC', 'AYLA', 'SMSC', 100, '00:45:00'),
('CLNK-AYLA', 'CLNK', 'AYLA', 100, '00:45:00'),
('CLNK-SMCC', 'CLNK', 'SMCC', 100, '00:45:00'),
('SMCC-CLNK', 'SMCC', 'CLNK', 100, '00:45:00'),
('SMCC-SMSC', 'SMCC', 'SMSC', 100, '00:45:00'),
('SMSC-AYLA', 'SMSC', 'AYLA', 100, '00:45:00'),
('SMSC-SMCC', 'SMSC', 'SMCC', 100, '00:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `terminal`
--

CREATE TABLE `terminal` (
  `terminalID` char(4) NOT NULL,
  `adminID` int(11) NOT NULL,
  `Location Name` varchar(128) NOT NULL,
  `City` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `terminal`
--

INSERT INTO `terminal` (`terminalID`, `adminID`, `Location Name`, `City`) VALUES
('AYLA', 1, 'Ayala Center Cebu', 'Cebu City'),
('CLNK', 4, 'Cebu City Link Terminal', 'Cebu City'),
('SMCC', 2, 'SM City Cebu', 'Cebu City'),
('SMSC', 3, 'SM Seaside City', 'Cebu City');

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

CREATE TABLE `trip` (
  `tripID` int(11) NOT NULL,
  `vehicleID` int(11) NOT NULL,
  `routeID` char(9) NOT NULL,
  `FreeSeats` int(11) NOT NULL,
  `ETD` time NOT NULL,
  `ETA` time NOT NULL,
  `Status` enum('OPEN','CLOSED','DEPARTED','ARRIVED') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`tripID`, `vehicleID`, `routeID`, `FreeSeats`, `ETD`, `ETA`, `Status`) VALUES
(10, 1, 'AYLA-CLNK', 16, '08:00:00', '08:45:00', 'OPEN'),
(11, 1, 'CLNK-AYLA', 16, '08:45:00', '09:30:00', 'OPEN'),
(20, 2, 'CLNK-SMCC', 16, '08:00:00', '08:45:00', 'OPEN'),
(21, 2, 'SMCC-CLNK', 16, '08:45:00', '09:30:00', 'OPEN'),
(30, 3, 'SMCC-SMSC', 16, '08:00:00', '08:45:00', 'OPEN'),
(31, 3, 'SMSC-SMCC', 16, '08:45:00', '09:30:00', 'OPEN');

-- --------------------------------------------------------

--
-- Table structure for table `vhire`
--

CREATE TABLE `vhire` (
  `vehicleID` int(11) NOT NULL,
  `driverID` int(20) NOT NULL,
  `PlateNum` varchar(16) NOT NULL,
  `Brand` varchar(32) NOT NULL,
  `Model` varchar(32) NOT NULL,
  `Color` varchar(20) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `Weight` float NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vhire`
--

INSERT INTO `vhire` (`vehicleID`, `driverID`, `PlateNum`, `Brand`, `Model`, `Color`, `Capacity`, `Weight`, `status`) VALUES
(1, 2, 'ABC1234', 'Toyota', 'Avanza', '#ff0000', 1, 1, 'ACTIVE'),
(2, 2, 'ABC1234', 'Toyota', 'Innova', '#FFFFFF', 16, 24.5, 'ACTIVE'),
(3, 1, 'ANZ9874', 'Izuzu', 'Ambot', '#000000', 14, 25.3, 'ACTIVE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`),
  ADD UNIQUE KEY `customerID` (`customerID`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driverID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `customerFK` (`customerID`),
  ADD KEY `tripFK` (`tripID`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`routeID`),
  ADD KEY `Destination_FK` (`D_termID`),
  ADD KEY `Origin_FK` (`O_termID`);

--
-- Indexes for table `terminal`
--
ALTER TABLE `terminal`
  ADD PRIMARY KEY (`terminalID`);

--
-- Indexes for table `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`tripID`),
  ADD KEY `routeFK` (`routeID`);

--
-- Indexes for table `vhire`
--
ALTER TABLE `vhire`
  ADD PRIMARY KEY (`vehicleID`),
  ADD KEY `driverFK` (`driverID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driverID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `tripID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `vhire`
--
ALTER TABLE `vhire`
  MODIFY `vehicleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `customerFK` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tripFK` FOREIGN KEY (`tripID`) REFERENCES `trip` (`tripID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `route`
--
ALTER TABLE `route`
  ADD CONSTRAINT `Destination_FK` FOREIGN KEY (`D_termID`) REFERENCES `terminal` (`terminalID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Origin_FK` FOREIGN KEY (`O_termID`) REFERENCES `terminal` (`terminalID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trip`
--
ALTER TABLE `trip`
  ADD CONSTRAINT `routeFK` FOREIGN KEY (`routeID`) REFERENCES `route` (`routeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vhire`
--
ALTER TABLE `vhire`
  ADD CONSTRAINT `driverFK` FOREIGN KEY (`driverID`) REFERENCES `driver` (`driverID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
