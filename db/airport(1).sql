-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2018 at 06:49 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airport`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `airlines`
--

CREATE TABLE `airlines` (
  `id` int(11) NOT NULL,
  `airl_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airlines`
--

INSERT INTO `airlines` (`id`, `airl_name`) VALUES
(1, 'hello'),
(3, 'mandaliya airlines'),
(4, 'patel airlines'),
(5, 'dhadhal airlines'),
(6, 'air india airlines'),
(7, 'jet india airlines'),
(8, 'indigo'),
(9, 'jet airways '),
(10, 'dhorajiya airlines'),
(11, 'vaghasiya airlines'),
(12, 'qatar airways'),
(13, 'british airways'),
(14, 'emirated');

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `id` int(11) NOT NULL,
  `air_name` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`id`, `air_name`, `city`, `state`, `country`) VALUES
(2, 'bhautik international airport', 'delhi', 'delhi', 'india'),
(4, 'Yash Int.', 'Abu dhabi', 'Dubai', 'UAE'),
(5, 'ashish inte. airport', 'pune', 'maharashtra', 'india'),
(7, 'mohit international airport', 'dublin', 'dublin', 'irenland'),
(8, 'virallouisville inte. airport', 'louisville', 'kentaucky', 'united state'),
(9, 'chandigadh international airport', 'chandigadh', 'chandigadh', 'india'),
(10, 'chochin internactional airportch', 'chochin', 'kerala', 'India'),
(11, 'franfurt airport', 'franfurt', 'hesse', 'germany'),
(12, 'tampa international airport', 'tampa', 'florida', 'united states'),
(13, 'viral international airport', 'rajkot', 'gujarat', 'india'),
(14, 'san francisco international airport', 'san francisco', 'california', 'united states');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `emp_name` varchar(200) NOT NULL,
  `emp_phone_no` varchar(15) NOT NULL,
  `emp_address` varchar(400) NOT NULL,
  `emp_age` int(11) NOT NULL,
  `emp_salary` int(11) NOT NULL,
  `emp_job_type` varchar(200) NOT NULL,
  `air_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp_name`, `emp_phone_no`, `emp_address`, `emp_age`, `emp_salary`, `emp_job_type`, `air_name`) VALUES
(7, 'viral', '9874563215', 'qaszddhrukel,m', 22, 45000, 'Traffic Monitor', 'san'),
(8, 'hardik', '7896541235', 'qwereuoyjdhdh', 25, 42000, 'Airport Authority', 'san'),
(9, 'maheshvar', '8475963213', 'qhyexnkdlejd', 22, 47998, 'Administrative Support', 'viral'),
(10, 'dhruvi', '9652314879', 'asfdhfkjfkiekdk', 20, 39000, 'Traffic Monitor', 'tampa'),
(11, 'dhruvika', '8523697413', 'asdgfhjfoeijdjdj', 22, 35000, 'Engineer', 'franfurt'),
(12, 'jeel', '9856321478', 'ahshdkdljdljdlisjls', 20, 42000, 'Airport Authority', 'chochin'),
(13, 'parth', '9632541784', 'asgfdhfkfklld', 40, 42000, 'Administrative Support', 'chandigadh'),
(14, 'jainil', '7896325415', 'ajjsojosjojihsiosh', 55, 80000, 'Engineer', 'virallouisville'),
(15, 'urvish', '7412589635', 'asdfhjklhhhju', 56, 52600, 'Traffic Monitor', 'bhautik'),
(28, 'milan', '7894561234', 'asdfgh zsdfghjk', 45, 45000, 'Traffic Monitor', 'virallouisville');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `id` int(11) NOT NULL,
  `flight_name` varchar(200) NOT NULL,
  `airl_name` varchar(200) NOT NULL,
  `airport_name` varchar(200) NOT NULL,
  `source` varchar(200) NOT NULL,
  `destination` varchar(200) NOT NULL,
  `arrival` varchar(200) NOT NULL,
  `depature` varchar(200) NOT NULL,
  `duration` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`id`, `flight_name`, `airl_name`, `airport_name`, `source`, `destination`, `arrival`, `depature`, `duration`, `status`) VALUES
(15, 'emirated-101', 'emirated', 'emirated', 'Abu', 'delhi', '16:53', '17:06', '23:33', 'On Time');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `pass_name` varchar(200) NOT NULL,
  `pass_address` varchar(200) NOT NULL,
  `pass_age` int(10) NOT NULL,
  `ticket_no` varchar(10) NOT NULL,
  `ticket_type` varchar(200) NOT NULL,
  `pass_mo_no` varchar(20) NOT NULL,
  `flight_name` varchar(200) NOT NULL,
  `pass_email` varchar(200) NOT NULL,
  `ticket_price` int(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `pass_name`, `pass_address`, `pass_age`, `ticket_no`, `ticket_type`, `pass_mo_no`, `flight_name`, `pass_email`, `ticket_price`, `date`) VALUES
(1, 'mandaliya bhautik', 'gsuhgjkshkjsgdkjgkjahkloshdlkhdkldh', 19, 't-101', 'economy', '9632587415', 'a-106', 'bhautik@gmail.com', 2300, '2018-10-01'),
(2, 'viral khant', 'assdfgrtgdtgegdgge', 20, 't-102', 'economy', '8521479639', 'm-102', 'bhahugugbb@gmail.com', 12000, '2018-10-02'),
(3, 'hardik vaghasiya', 'kshfliashflkasfjkasjdasjdsajdksncklsajfklsn', 22, 't-103', 'business', '7532148962', 'air-740', 'bhsfbajsfsdhfildshflikdslk@gmail.com', 12000, '2018-10-01'),
(4, 'mayur vakadiya', 'cknslkfsdlkfsdligklsdgnd', 25, 't-104', 'business', '7852146395', 'jet-106', 'cklsdjfildhfisah@hotmail.com', 13000, '2018-08-22'),
(5, 'parmar paritosh', 'cklzshfkjahfikahflkashfklsafhklskS', 20, 't-105', 'economy', '9637414562', 'qatar-158', 'shkjashfasuhciashd@yahoo.in', 20000, '2018-10-07'),
(6, 'nilesh vadhel', 'jkbgkjgkjgkhjkh', 25, 't-106', 'business', '8521239514', 'jet-410', 'bbhjsbggdisahfolhf@yahoo.com', 42000, '2018-10-05'),
(7, 'ashik patel', 'dfvxdgdfhghgdhd', 26, 't-107', 'economy', '7413691232', 'b-106', 'bhjcsabjchbsahch@gmail.com', 12000, '2018-10-11'),
(8, 'jayraj mehta', 'dvdsgsrsfafagsd3533e', 30, 't-108', 'business', '9637414528', 'british-111', 'egdrjfgjhsdh@yahoo.in', 7000, '2018-10-15'),
(9, 'niyat  bhanderi', 'asgsfhfssg', 30, 't-109', 'business', '8521236549', 'british-145', 'dknfldihglsfjdsklj@hotmail.com', 12000, '2018-10-15'),
(10, 'jayant nair', 'sfsdgdsvzczsfvsdbd5654', 35, 't-110', 'economy', '7532146982', 'indigo-103', 'dvdvsdfbfdh@gmail.com', 25000, '2018-10-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `airlines`
--
ALTER TABLE `airlines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `air_name` (`air_name`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_no` (`ticket_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `airlines`
--
ALTER TABLE `airlines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `airport`
--
ALTER TABLE `airport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
