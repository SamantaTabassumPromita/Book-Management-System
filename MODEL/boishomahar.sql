-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2019 at 02:21 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boishomahar`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ISBN` varchar(13) NOT NULL,
  `std_id` int(8) NOT NULL,
  `Bname` varchar(255) NOT NULL,
  `auth1` varchar(255) NOT NULL,
  `auth2` varchar(255) NOT NULL,
  `edition` int(3) NOT NULL,
  `bdept` varchar(3) DEFAULT NULL,
  `course` varchar(6) DEFAULT NULL,
  `org_price` int(65) NOT NULL,
  `type` varchar(20) NOT NULL,
  `quality` varchar(255) NOT NULL,
  `Bimage` varchar(500) NOT NULL,
  `dsc` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ISBN`, `std_id`, `Bname`, `auth1`, `auth2`, `edition`, `bdept`, `course`, `org_price`, `type`, `quality`, `Bimage`, `dsc`) VALUES
('1234567891011', 18101503, 'database', 'asda', 'asdasd', 8, 'CSE', 'CSE370', 154, 'Academic', 'Blueprint', 'images/9780201708578-us.jpg', 'moja hocche lorem moja hocche lorem\r\nmoja hocche lorem moja hocche lorem\r\nmoja hocche lorem moja hocche lorem moja hocche lorem moja hocche lorem\r\n'),
('5897451254789', 18101672, 'discrete math', 'asdaw', 'awdaw', 8, 'CSE', 'CSE230', 154, 'Academic', 'Blueprint', 'images/9781439812808.jpg', ''),
('7893214568426', 18101672, 'lord of the ring', 'adaw', 'asdaw', 9, 'ARC', '', 154, 'Dictionary', '1', 'images/lord of the ring.jpg', ''),
('7894563214569', 17201132, 'Naruto-shipuden', 'qwerty', 'asdf', 2, 'ARC', '', 255, 'Thriller', 'Blueprint', 'images/818OBi6oJNL.jpg', 'khub mozza\r\nkhub tast'),
('7896541236512', 17201132, 'asdawe', 'vrsgh', 'dhr', 2, 'Nul', '', 54, 'Science fiction', 'B&W', 'images/fm..jpg', ''),
('8523697412365', 18101503, 'asdawd', 'asdaw', '', 2, 'ARC', '', 154, 'Thriller', 'B&W', 'images/boune.jpg', ''),
('8523697412568', 18101503, 'Bourne Identity', 'asdaw', 'ad', 2, 'ARC', '', 154, 'literature', 'B&W', 'images/boune.jpg', ''),
('8523697412569', 18101503, 'some book to tesr', 'asdaw', 'awesad', 3, 'ARC', '', 154, 'Science fiction', 'Blueprint', 'images/cviking.jpg', ''),
('8523697412584', 18101503, 'another book for sale', 'asdw2', 'asda2', 3, 'Non', '', 256, 'Science fiction', 'B&W', 'images/9780201708578-us.jpg', ''),
('8527413698521', 18101672, 'mermaid', 'asdaw', 'asdawd', 8, 'ARC', '', 154, 'Western', '2', 'images/images.jpg', ''),
('8974561235321', 18101672, 'discrete math', 'asdawd', 'afwaea', 8, 'CSE', 'CSE230', 156, 'Academic', 'Blueprint', 'images/9781439812808.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `exchange_with`
--

CREATE TABLE `exchange_with` (
  `exISBN` varchar(13) NOT NULL,
  `std_id5` int(8) NOT NULL,
  `exBname` varchar(255) NOT NULL,
  `edition` int(2) NOT NULL,
  `auth1` varchar(255) NOT NULL,
  `stat` tinyint(1) NOT NULL DEFAULT 0,
  `req_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exchange_with`
--

INSERT INTO `exchange_with` (`exISBN`, `std_id5`, `exBname`, `edition`, `auth1`, `stat`, `req_id`) VALUES
('7894546123256', 18101672, 'exchng me', 9, 'asdawf', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `for_exchange`
--

CREATE TABLE `for_exchange` (
  `ISBN` varchar(13) NOT NULL,
  `std_id2` int(8) NOT NULL,
  `stat` varchar(10) NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offered`
--

CREATE TABLE `offered` (
  `ISBN` varchar(13) NOT NULL,
  `std_id3` int(8) NOT NULL,
  `exISBN` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offered`
--

INSERT INTO `offered` (`ISBN`, `std_id3`, `exISBN`) VALUES
('7896541236512', 17201132, '7412365478987'),
('7893214568426', 18101672, '7538694128526'),
('8527413698521', 18101672, '7894546123256');

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `ISBN` varchar(13) NOT NULL,
  `std_id1` int(8) NOT NULL,
  `reff_price` int(6) NOT NULL,
  `stat` tinyint(1) NOT NULL DEFAULT 0,
  `req_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`ISBN`, `std_id1`, `reff_price`, `stat`, `req_id`) VALUES
('7894563214569', 17201132, 155, 1, 18101503);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(8) NOT NULL,
  `F_name` varchar(255) NOT NULL,
  `L_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `mobile` int(11) NOT NULL,
  `dept` varchar(3) NOT NULL,
  `street` varchar(65) NOT NULL,
  `city` varchar(65) NOT NULL,
  `postcode` varchar(5) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `F_name`, `L_name`, `email`, `pass`, `gender`, `mobile`, `dept`, `street`, `city`, `postcode`, `image`) VALUES
(17201132, 'Samanta', 'promita', 'some@email', '258', 'Female', 2147483647, 'CSE', '23', 'dhaka', '166', 'images/Hinata.jpg'),
(18101503, 'Hasin', 'IshraK', 'ishrakw94@gmail.com', '1234', 'Male', 1747057685, 'CSE', '01', 'dhaka', '1217', 'images/xlr8-01.png'),
(18101672, 'Rawha', 'Chowdhury', 'some@afeawd', '5678', 'Male', 2147483647, 'CSE', '2', 'dhaka', '1217', 'images/FMNC1782_3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wish`
--

CREATE TABLE `wish` (
  `ISBN` varchar(13) NOT NULL,
  `std_id4` int(8) NOT NULL,
  `wbname` varchar(255) NOT NULL,
  `wedition` int(3) NOT NULL,
  `wtype` varchar(20) NOT NULL,
  `wdept` varchar(3) NOT NULL,
  `wcourse` varchar(6) NOT NULL,
  `wfauth` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ISBN`,`std_id`),
  ADD KEY `book_ibfk_1` (`std_id`);

--
-- Indexes for table `exchange_with`
--
ALTER TABLE `exchange_with`
  ADD PRIMARY KEY (`exISBN`,`std_id5`),
  ADD KEY `exchange_with_ibfk_2` (`std_id5`),
  ADD KEY `req_id` (`req_id`);

--
-- Indexes for table `for_exchange`
--
ALTER TABLE `for_exchange`
  ADD PRIMARY KEY (`ISBN`,`std_id2`),
  ADD KEY `std_id2` (`std_id2`);

--
-- Indexes for table `offered`
--
ALTER TABLE `offered`
  ADD PRIMARY KEY (`ISBN`,`std_id3`),
  ADD KEY `offered_ibfk_2` (`std_id3`),
  ADD KEY `exISBN` (`exISBN`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`ISBN`,`std_id1`),
  ADD KEY `sell_ibfk_2` (`std_id1`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`);

--
-- Indexes for table `wish`
--
ALTER TABLE `wish`
  ADD PRIMARY KEY (`ISBN`,`std_id4`),
  ADD KEY `std_id4` (`std_id4`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exchange_with`
--
ALTER TABLE `exchange_with`
  ADD CONSTRAINT `exchange_with_ibfk_2` FOREIGN KEY (`std_id5`) REFERENCES `offered` (`std_id3`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `for_exchange`
--
ALTER TABLE `for_exchange`
  ADD CONSTRAINT `for_exchange_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `for_exchange_ibfk_2` FOREIGN KEY (`std_id2`) REFERENCES `book` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offered`
--
ALTER TABLE `offered`
  ADD CONSTRAINT `offered_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`),
  ADD CONSTRAINT `offered_ibfk_2` FOREIGN KEY (`std_id3`) REFERENCES `book` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sell`
--
ALTER TABLE `sell`
  ADD CONSTRAINT `sell_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`),
  ADD CONSTRAINT `sell_ibfk_2` FOREIGN KEY (`std_id1`) REFERENCES `book` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wish`
--
ALTER TABLE `wish`
  ADD CONSTRAINT `wish_ibfk_2` FOREIGN KEY (`std_id4`) REFERENCES `book` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
