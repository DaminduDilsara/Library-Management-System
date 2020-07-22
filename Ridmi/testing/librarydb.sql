-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2020 at 06:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librarydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `ISBN` char(17) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Subtitle` varchar(255) DEFAULT NULL,
  `Author` varchar(255) NOT NULL,
  `Editor` varchar(255) DEFAULT NULL,
  `Publisher` varchar(255) NOT NULL,
  `AccessNo` varchar(20) NOT NULL,
  `TypeNo` varchar(20) NOT NULL,
  `Section` varchar(50) NOT NULL,
  `PublishedPlace` varchar(100) DEFAULT NULL,
  `PublishedDate` date DEFAULT NULL,
  `NumberOfPages` int(11) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Dimentions` varchar(20) DEFAULT NULL,
  `CD_Include` tinyint(1) DEFAULT NULL,
  `Available` tinyint(1) NOT NULL,
  `Reserved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ISBN`, `Title`, `Subtitle`, `Author`, `Editor`, `Publisher`, `AccessNo`, `TypeNo`, `Section`, `PublishedPlace`, `PublishedDate`, `NumberOfPages`, `Price`, `Dimentions`, `CD_Include`, `Available`, `Reserved`) VALUES
('978-3-16-142210-0', 'Harry Potter', 'And the Deathly Hallows', 'J. K. Rowlings', 'Rowlings', 'Rowlings', '2556', '11', 'Fictions', 'United State', '2013-11-05', 800, 2500, '20*12', 0, 1, 0),
('978-3-16-148410-0', 'Harry Potter', 'And The Half-Blood Prince', 'J. K. Rowlings', 'Rowlings', 'Rowlings', '2555', '11', 'Fictions', 'United Kingdom', '2014-08-03', 600, 2100, '20*12', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `creations`
--

CREATE TABLE `creations` (
  `CreationID` char(6) NOT NULL,
  `MembershipNo` char(10) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Creation` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `DonationID` char(6) NOT NULL,
  `NameOfDonator` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Telephone` char(10) NOT NULL,
  `DonationType` varchar(100) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`DonationID`, `NameOfDonator`, `Address`, `Email`, `Telephone`, `DonationType`, `Description`, `Date`) VALUES
('000001', 'Uthpala Nethmini', 'Thihagoda, Matara', 'uthpala@gmail.com', '5555555555', 'Books', 'Books worth of 100000 Rs', '2020-04-08'),
('000002', 'Charitha Sewwandi', 'Mada para, walgama', 'charitha@gmail.com', '1111111111', 'Money', '500000 RS', '2020-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` varchar(10) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Birthday` date NOT NULL,
  `School` varchar(255) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Telephone` char(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `MembershipDate` date DEFAULT NULL,
  `Deposite` int(11) DEFAULT NULL,
  `ReceiptNo` varchar(10) DEFAULT NULL,
  `ExpirationDate` date NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- Error reading data for table librarydb.members: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `librarydb`.`members`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `newspapers`
--

CREATE TABLE `newspapers` (
  `NewspaperID` char(5) NOT NULL,
  `NewspaperName` varchar(100) NOT NULL,
  `TimePeriod` int(11) NOT NULL,
  `Available` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newspapers`
--

INSERT INTO `newspapers` (`NewspaperID`, `NewspaperName`, `TimePeriod`, `Available`) VALUES
('00001', 'Lankadeepa', 1, 0),
('00002', 'Diwatina', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` char(6) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Post` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `Name`, `Username`, `Password`, `Post`) VALUES
('000001', 'Ridmi sameera', 'sameera@1', '123456', 'Assistant'),
('000002', 'Charitha Sewwandi', 'Charitha@1', '1123456789', 'Librarian');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `membershipNo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `createdate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`membershipNo`, `email`, `password`, `createdate`) VALUES
('12', 'a@gh', '0cc175b9c0f1b6a831c399e269772661', ''),
('12', 'a@gh', '0cc175b9c0f1b6a831c399e269772661', ''),
('13', 'q', '7694f4a66316e53c8cdd9d9954bd611d', ''),
('13', 'q', '7694f4a66316e53c8cdd9d9954bd611d', ''),
('14', 'sd@ff', 'f1290186a5d0b1ceab27f4e77c0c5d68', ''),
('14', 'sd@ff', 'f1290186a5d0b1ceab27f4e77c0c5d68', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `creations`
--
ALTER TABLE `creations`
  ADD PRIMARY KEY (`CreationID`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`DonationID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newspapers`
--
ALTER TABLE `newspapers`
  ADD PRIMARY KEY (`NewspaperID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
