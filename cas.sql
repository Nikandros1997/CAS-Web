-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2016 at 12:27 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cas`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `name` varchar(35) NOT NULL,
  `surname` varchar(35) NOT NULL,
  `birth` date NOT NULL,
  `gender` varchar(7) NOT NULL,
  `country` varchar(15) NOT NULL,
  `area` varchar(20) NOT NULL,
  `address` varchar(40) NOT NULL,
  `addressnumber` int(11) NOT NULL,
  `administrator` int(11) NOT NULL,
  `entranceyear` year(4) NOT NULL,
  `loginallowance` int(11) NOT NULL,
  `advisor` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `pass`, `name`, `surname`, `birth`, `gender`, `country`, `area`, `address`, `addressnumber`, `administrator`, `entranceyear`, `loginallowance`, `advisor`) VALUES
(3, 'Nikandros0', '1234', 'Nikandros', 'Mavroudakis', '1997-06-09', 'Male', 'Greece', 'Agioi Anargiroi', 'Nikolaou Plastira', 56, 0, 2016, 1, 'Nikandros1'),
(5, 'Nikandros1', '1234', 'Winman', 'Blackakis', '2016-05-02', 'Male', 'Greece', 'Athens', 'El. Venizelou', 121, 1, 2016, 1, ''),
(6, 'Nikandros2', '1234', 'Nikandros', 'Mavroudakis', '1997-06-09', 'Male', 'Greece', 'Agioi Anargiroi', 'Nikolaou Plastira', 56, 1, 2016, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `deadlines`
--

CREATE TABLE `deadlines` (
  `id` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `comments` varchar(1000) DEFAULT NULL,
  `creativity` int(11) NOT NULL,
  `action` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `responsibleadvisor` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deadlines`
--

INSERT INTO `deadlines` (`id`, `deadline`, `comments`, `creativity`, `action`, `service`, `responsibleadvisor`) VALUES
(83, '2016-06-09', 'Do it!', 4, 4, 4, 'Nikandros1');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `approval` tinyint(1) NOT NULL,
  `comments` varchar(5000) NOT NULL,
  `subdate` date DEFAULT NULL,
  `id_record` int(11) NOT NULL,
  `writtenby` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `approval`, `comments`, `subdate`, `id_record`, `writtenby`) VALUES
(31, 0, 'sf,cjs,sfc', '2016-05-23', 37, 'Nikandros1');

-- --------------------------------------------------------

--
-- Table structure for table `generalinfo`
--

CREATE TABLE `generalinfo` (
  `username` varchar(20) NOT NULL,
  `creativity` int(11) NOT NULL,
  `actions` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `comments` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `deadline_id` int(10) NOT NULL,
  `username` varchar(15) NOT NULL,
  `day` date NOT NULL,
  `type` varchar(12) NOT NULL,
  `name` varchar(30) NOT NULL,
  `hours` int(11) NOT NULL,
  `taskundertaken` varchar(5000) NOT NULL,
  `reflection` varchar(5000) NOT NULL,
  `a` int(11) NOT NULL,
  `b` int(11) NOT NULL,
  `c` int(11) NOT NULL,
  `d` int(11) NOT NULL,
  `e` int(11) NOT NULL,
  `f` int(11) NOT NULL,
  `g` int(11) NOT NULL,
  `h` int(11) NOT NULL,
  `submitted` int(11) NOT NULL,
  `edit` int(2) NOT NULL,
  `image` varchar(200) NOT NULL,
  `longi` double(10,0) NOT NULL,
  `lat` double(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `deadline_id`, `username`, `day`, `type`, `name`, `hours`, `taskundertaken`, `reflection`, `a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`, `submitted`, `edit`, `image`, `longi`, `lat`) VALUES
(36, 83, 'Nikandros0', '2016-04-01', 'Service', '', 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, ' ', 0, 51),
(37, 83, 'Nikandros0', '2016-04-01', 'Creativity', 'Presentation', 5, 'evwdfvdfsvsdv sdv sd ', 'dsv df dsf s', 0, 0, 0, 1, 0, 1, 0, 0, 1, 1, ' http://localhost/cas/uploads/mess.jpg', 0, 51),
(38, 83, 'Nikandros0', '2016-04-01', 'Creativity', 'Computer Science', 5, '<script>alert(''Hello advisor! I just hacked you!'')</script>', '<script>alert(''Do not worry! It''s me again!'')</script>', 1, 0, 1, 0, 0, 0, 0, 0, 1, 0, ' ', 0, 52),
(39, 83, 'Nikandros0', '2016-04-01', 'Creativity', 'asd', 0, '<img src="http://localhost/cas/proj-images/inClass.jpg">', 'asdf', 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, ' ', 0, 52);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`,`username`);

--
-- Indexes for table `deadlines`
--
ALTER TABLE `deadlines`
  ADD PRIMARY KEY (`id`,`deadline`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_record` (`id_record`);

--
-- Indexes for table `generalinfo`
--
ALTER TABLE `generalinfo`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deadline_id` (`deadline_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `deadlines`
--
ALTER TABLE `deadlines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`id_record`) REFERENCES `records` (`id`);

--
-- Constraints for table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `records_ibfk_1` FOREIGN KEY (`deadline_id`) REFERENCES `deadlines` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
