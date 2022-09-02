-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 09:23 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `Number` int(11) NOT NULL,
  `FirstName` varchar(40) NOT NULL,
  `FatherName` varchar(40) NOT NULL,
  `S_ID` int(11) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `class` varchar(15) DEFAULT NULL,
  `BookName` varchar(40) NOT NULL,
  `Date` date DEFAULT NULL,
  `Deadline` date DEFAULT NULL,
  `Return_book` varchar(10) DEFAULT 'Yes',
  `Date_expired` varchar(10) DEFAULT NULL,
  `black_list` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`Number`, `FirstName`, `FatherName`, `S_ID`, `Email`, `phone`, `class`, `BookName`, `Date`, `Deadline`, `Return_book`, `Date_expired`, `black_list`) VALUES
(2, 'Ali', 'Akbar', 5, 'ali@gmail.com', 796546723, '3', 'java', '2021-02-21', '2021-02-27', 'Yes', 'Returned', NULL),
(3, 'Ahmad', 'Ali', 25, 'ahmad@gmail.com', 783456523, '4', 'ccna', '2021-02-22', '2021-02-28', 'No', 'Expired', 'black'),
(4, 'Ali Ahmad', 'Naim Khan', 35, 'Ali@gmail.com', 78879787, '12', 'CSS', '2021-03-01', '2021-03-03', 'No', 'Expired', 'black'),
(5, 'Walid', 'Khan', 333, 'wlid@gmail.com', 879879, '12', '3', '2021-02-01', '2021-03-03', 'No', 'Expired', 'black'),
(6, 'Hassan', 'Hussaini', 9781, 'hassanhosaini1212@gmail.com', 729003233, '5', 'network', '2021-03-03', '2021-03-04', 'No', 'Expired', 'black');

-- --------------------------------------------------------

--
-- Table structure for table `list_books`
--

CREATE TABLE `list_books` (
  `Number` int(11) NOT NULL,
  `Book_Name` varchar(100) NOT NULL,
  `ID` varchar(50) DEFAULT NULL,
  `Author` varchar(70) NOT NULL,
  `Edition` varchar(60) NOT NULL,
  `Print_year` varchar(60) NOT NULL,
  `Department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_books`
--

INSERT INTO `list_books` (`Number`, `Book_Name`, `ID`, `Author`, `Edition`, `Print_year`, `Department`) VALUES
(21, 'java', '008', 'ali', '8', '2015', 'software'),
(23, 'CCNA', '33', 'Ahmad', '6', '2017', 'network'),
(24, 'Top Down approuch', '12', 'Aziz', '8', '2019', 'network'),
(25, 'PHP', '5', 'Ahmad', '7', '2019', 'software'),
(26, 'The Art of computer programming', '15009', 'Donald E. Knuth', '4', '2009', 'software'),
(27, 'Software Architecture in practice', '15003', 'Len Bass', '2', '2008', 'software');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `U_ID` int(11) NOT NULL,
  `UserName` varchar(60) NOT NULL,
  `Password` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`U_ID`, `UserName`, `Password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `returnbook`
--

CREATE TABLE `returnbook` (
  `Number` int(11) NOT NULL,
  `S_ID` int(11) DEFAULT NULL,
  `Return_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returnbook`
--

INSERT INTO `returnbook` (`Number`, `S_ID`, `Return_Date`) VALUES
(4, 25, '2021-03-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`S_ID`),
  ADD UNIQUE KEY `Number` (`Number`);

--
-- Indexes for table `list_books`
--
ALTER TABLE `list_books`
  ADD PRIMARY KEY (`Number`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`U_ID`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Indexes for table `returnbook`
--
ALTER TABLE `returnbook`
  ADD PRIMARY KEY (`Number`),
  ADD KEY `S_ID` (`S_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `Number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `list_books`
--
ALTER TABLE `list_books`
  MODIFY `Number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `U_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `returnbook`
--
ALTER TABLE `returnbook`
  MODIFY `Number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `returnbook`
--
ALTER TABLE `returnbook`
  ADD CONSTRAINT `returnbook_ibfk_1` FOREIGN KEY (`S_ID`) REFERENCES `info` (`S_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
