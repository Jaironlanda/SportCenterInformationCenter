-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2020 at 11:31 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scis`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BOOKING_ID` int(11) NOT NULL,
  `CUST_ID` int(11) NOT NULL,
  `COURT_ID` int(11) NOT NULL,
  `PYMT_ID` int(11) NOT NULL,
  `BOOKING_DESC` tinytext DEFAULT NULL,
  `START_DATETIME` date NOT NULL,
  `END_DATETIME` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`BOOKING_ID`, `CUST_ID`, `COURT_ID`, `PYMT_ID`, `BOOKING_DESC`, `START_DATETIME`, `END_DATETIME`) VALUES
(1, 1, 1, 1, 'VIP member from korea', '2019-12-25', '2019-12-31'),
(2, 2, 11, 2, 'VolleyBall player', '2019-12-18', '2019-12-26'),
(3, 1, 2, 3, 'Test', '2019-12-19', '2019-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `court`
--

CREATE TABLE `court` (
  `COURT_ID` int(11) NOT NULL,
  `COURT_NAME` tinytext NOT NULL,
  `SPORT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `court`
--

INSERT INTO `court` (`COURT_ID`, `COURT_NAME`, `SPORT_ID`) VALUES
(1, 'Stadium Old Trafford', 1),
(2, 'Stadium Stamford Brige', 1),
(3, 'Stadium Camp Nou', 1),
(4, 'Stadium Santiago Bernabeu', 1),
(5, 'Stadium Wembley', 1),
(6, 'Olympia Badminton Arena', 2),
(7, 'Yayasan Badminton Court', 2),
(8, 'Cheras Badminton Arena', 2),
(9, 'World Cup ', 3),
(10, 'Davis Stadio', 3),
(11, 'Nizam\'s Volleyball Arena', 3),
(12, 'Virtua Tennis Court', 4),
(13, 'Echizen Tennis Court', 4),
(14, 'Rioma Tennis Court', 4),
(15, 'Prince Court', 4),
(16, 'Yayasan', 5),
(17, 'Piste', 5),
(18, 'HYFA', 7),
(19, 'Stadio @ Rooftop', 7),
(20, 'Uber Sport', 7),
(21, 'Orto', 7),
(22, 'Futsal Arena Yishun', 7),
(23, 'Premier Pitch', 7),
(24, 'Kuroko Basket', 8),
(25, 'Damai Basketball Court', 8),
(26, 'Mawas Basketball Court', 8),
(27, 'Taman Sempelang Basetball', 8),
(28, 'Eden Park', 9),
(29, 'Suncorp Stadium', 9),
(30, 'Newlands Stadium', 9),
(31, 'Twickenham', 9),
(37, 'Krieg', 10),
(38, 'Goodman Softball Complex', 10),
(39, 'Smith Softball Complex', 10),
(40, 'UTD Softball Field', 10),
(41, 'Summit Softball Complex', 10);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CUST_ID` int(11) NOT NULL,
  `CUST_NAME` varchar(31) NOT NULL,
  `CUST_IC` varchar(12) NOT NULL,
  `CUST_PHONE` varchar(11) DEFAULT NULL,
  `CUST_ADDRESS` tinytext DEFAULT NULL,
  `CUST_EMAIL` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUST_ID`, `CUST_NAME`, `CUST_IC`, `CUST_PHONE`, `CUST_ADDRESS`, `CUST_EMAIL`) VALUES
(1, 'Jairon Landa', '951205125321', '0196078873', 'Kampung Bundung', 'jaironlanda@gmail.com'),
(2, 'Nizam Anak Jitai', '951205125555', '0196078222', 'Jalan UMS, 88400, Kota Kinabalu, Sabah', 'falcon812311@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PYMT_ID` int(11) NOT NULL,
  `PYMT_AMOUNT` double NOT NULL,
  `PYMT_TYPE_ID` int(11) NOT NULL,
  `PYMT_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PYMT_ID`, `PYMT_AMOUNT`, `PYMT_TYPE_ID`, `PYMT_DATE`) VALUES
(1, 700, 1, '2019-12-15'),
(2, 900, 2, '2019-12-15'),
(3, 1300, 1, '2019-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `pymt_type`
--

CREATE TABLE `pymt_type` (
  `PYMT_TYPE_ID` int(11) NOT NULL,
  `PYMT_TYPE_NAME` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pymt_type`
--

INSERT INTO `pymt_type` (`PYMT_TYPE_ID`, `PYMT_TYPE_NAME`) VALUES
(1, 'Offline'),
(2, 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE `sport` (
  `SPORT_ID` int(11) NOT NULL,
  `SPORT_NAME` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`SPORT_ID`, `SPORT_NAME`) VALUES
(1, 'Football'),
(2, 'Badminton'),
(3, 'Volleyball'),
(4, 'Tennis'),
(5, 'Fencing'),
(6, 'Fencing'),
(7, 'Futsal'),
(8, 'Basketball'),
(9, 'Rugby'),
(10, 'Softball');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BOOKING_ID`),
  ADD UNIQUE KEY `BOOKING_ID` (`BOOKING_ID`),
  ADD KEY `CUST_ID` (`CUST_ID`),
  ADD KEY `COURT_ID` (`COURT_ID`),
  ADD KEY `PYMT_ID` (`PYMT_ID`);

--
-- Indexes for table `court`
--
ALTER TABLE `court`
  ADD PRIMARY KEY (`COURT_ID`),
  ADD UNIQUE KEY `COURT_ID` (`COURT_ID`),
  ADD KEY `SPORT_ID` (`SPORT_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUST_ID`),
  ADD UNIQUE KEY `CUST_ID` (`CUST_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PYMT_ID`),
  ADD UNIQUE KEY `PYMT_ID` (`PYMT_ID`),
  ADD KEY `PYMT_TYPE` (`PYMT_TYPE_ID`);

--
-- Indexes for table `pymt_type`
--
ALTER TABLE `pymt_type`
  ADD PRIMARY KEY (`PYMT_TYPE_ID`),
  ADD UNIQUE KEY `PYMT_TYPE_ID` (`PYMT_TYPE_ID`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`SPORT_ID`),
  ADD UNIQUE KEY `SPORT_ID` (`SPORT_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BOOKING_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `court`
--
ALTER TABLE `court`
  MODIFY `COURT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CUST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PYMT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pymt_type`
--
ALTER TABLE `pymt_type`
  MODIFY `PYMT_TYPE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sport`
--
ALTER TABLE `sport`
  MODIFY `SPORT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`CUST_ID`) REFERENCES `customer` (`CUST_ID`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`COURT_ID`) REFERENCES `court` (`COURT_ID`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`PYMT_ID`) REFERENCES `payment` (`PYMT_ID`);

--
-- Constraints for table `court`
--
ALTER TABLE `court`
  ADD CONSTRAINT `court_ibfk_1` FOREIGN KEY (`SPORT_ID`) REFERENCES `sport` (`SPORT_ID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`PYMT_TYPE_ID`) REFERENCES `pymt_type` (`PYMT_TYPE_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
