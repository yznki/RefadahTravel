-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 06, 2022 at 01:30 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `refadahWebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `customerID` int(11) NOT NULL,
  `selectedpackageID` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(150) NOT NULL,
  `reason` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `reason`) VALUES
(1, 'Yazan', 'yzn@gmail.com', 'Testing\r\n'),
(2, 'Yazan', 'adwnlkdaw@iojdwaoijadwoijwda.com', ''),
(3, 'awd', 'dwa@gmail.com', 'Im testing.');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) DEFAULT NULL,
  `emailAddress` varchar(150) DEFAULT NULL,
  `userPassword` varchar(20) DEFAULT NULL,
  `userImage` varchar(255) DEFAULT 'images/user.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `lname`, `emailAddress`, `userPassword`, `userImage`) VALUES
(1, 'Yazan', 'Kiswani', 'yznpsd@gmail.com', 'Kiswan12!', NULL),
(2, 'Muath', 'Nazzal', 'muath.nazzal@hotmail.com', 'Kiswan12!', NULL),
(3, 'Yazan', 'Kiswani', 'yzn@gmail.com', 'Kiswan12!', 'images/yazan.jpg'),
(4, 'dwadwadwa', 'awdaw', 'dwa@gmail.com', 'Kiswan12!', NULL),
(5, 'Testing', 'Testing', 'testing@gmail.com', 'testing123', NULL),
(6, 'Ziad', 'Kulaghasi', 'ziziq8@gmail.com', 'Abc123123', NULL),
(7, 'John', 'Doe', 'johndoe@gmail.com', 'Kiswan12!', NULL),
(8, 'Ziad', 'Kulaghasi', 'zizi@gmail.com', 'Avc123123', 'images/user.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `customer_packages`
--

CREATE TABLE `customer_packages` (
  `customerID` int(11) NOT NULL,
  `selectedpackageID` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_packages`
--

INSERT INTO `customer_packages` (`customerID`, `selectedpackageID`) VALUES
(1, 'TR138'),
(1, 'US516'),
(2, 'TR698'),
(3, 'TR489'),
(3, 'UK124'),
(3, 'US516'),
(5, 'TR698'),
(8, 'MV942'),
(8, 'TR077');

-- --------------------------------------------------------

--
-- Stand-in structure for view `customer_package_info`
-- (See below for the actual view)
--
CREATE TABLE `customer_package_info` (
`ID` int(11)
,`First_Name` varchar(25)
,`Last_Name` varchar(25)
,`Email` varchar(150)
,`PackageID` char(5)
,`City` varchar(20)
,`Country` varchar(20)
,`Departure_Date` date
,`Image` varchar(255)
,`UserImage2` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `packageID` char(5) NOT NULL,
  `cityName` varchar(20) NOT NULL,
  `countryName` varchar(20) NOT NULL,
  `departureDate` date NOT NULL,
  `returnDate` date NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `imageURL` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`packageID`, `cityName`, `countryName`, `departureDate`, `returnDate`, `price`, `imageURL`, `description`) VALUES
('MV942', 'Coral Reef', 'Maldives', '2022-11-21', '2022-11-26', '950.00', 'images/maldives.jpeg', 'A 7 day trip to the maldives. Enjoy the amazing weather and clear beach at Coral Reef. A trip you will never forget.'),
('TR077', 'Trabzon', 'Turkey', '2022-12-25', '2022-10-30', '500.00', 'images/trabzon.jpeg', 'A 10 day trip to trabzon.'),
('TR138', 'Trabzon', 'Turkey', '2022-10-21', '2022-10-26', '450.00', 'images/trabzon.jpeg', 'A 4 day trip to trabzon!'),
('TR319', 'Antalya', 'Turkey', '2022-12-20', '2022-12-25', '550.00', 'images/antalya.jpeg', 'A 6 day trip to Antalya.'),
('TR489', 'Istanbul', 'Turkey', '2022-10-13', '2022-10-20', '550.00', 'images/turkey.jpeg', 'A 5 day trip to turkey!'),
('TR698', 'Antalya', 'Turkey', '2022-10-15', '2022-10-25', '650.00', 'images/antalya.jpeg', 'An 8-day trip to Antalya!'),
('TR897', 'Istanbul', 'Turkey', '2022-12-11', '2022-12-20', '650.00', 'images/turkey.jpeg', 'A 7 day trip to Istanbul!'),
('UK124', 'London', 'United Kingdom', '2022-10-15', '2022-10-22', '749.99', 'images/london.jpeg', 'A 5 day trip to London!'),
('US516', 'New York', 'United States', '2022-11-05', '2022-11-10', '650.00', 'images/newyork.jpeg', 'A 4 day trip to new york!');

-- --------------------------------------------------------

--
-- Structure for view `customer_package_info`
--
DROP TABLE IF EXISTS `customer_package_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `refadahwebsite`.`customer_package_info`  AS SELECT `c`.`id` AS `ID`, `c`.`fname` AS `First_Name`, `c`.`lname` AS `Last_Name`, `c`.`emailAddress` AS `Email`, `p`.`packageID` AS `PackageID`, `p`.`cityName` AS `City`, `p`.`countryName` AS `Country`, `p`.`departureDate` AS `Departure_Date`, `p`.`imageURL` AS `Image`, `c`.`userImage` AS `UserImage2` FROM ((`refadahwebsite`.`customer_packages` `cp` join `refadahwebsite`.`customer` `c` on(`c`.`id` = `cp`.`customerID`)) join `refadahwebsite`.`package` `p` on(`p`.`packageID` = `cp`.`selectedpackageID`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`customerID`,`selectedpackageID`),
  ADD KEY `cart_fk2` (`selectedpackageID`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emailAddress` (`emailAddress`);

--
-- Indexes for table `customer_packages`
--
ALTER TABLE `customer_packages`
  ADD PRIMARY KEY (`customerID`,`selectedpackageID`),
  ADD KEY `cp_fk2` (`selectedpackageID`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`packageID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_fk1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_fk2` FOREIGN KEY (`selectedpackageID`) REFERENCES `package` (`packageID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_packages`
--
ALTER TABLE `customer_packages`
  ADD CONSTRAINT `cp_fk1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cp_fk2` FOREIGN KEY (`selectedpackageID`) REFERENCES `package` (`packageID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
