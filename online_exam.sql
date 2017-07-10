-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2017 at 02:14 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `email` varchar(50) NOT NULL,
  `sid` int(6) NOT NULL,
  `qid` int(6) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`email`, `name`, `gender`, `password`) VALUES
('a@b.com', 'kd', 'male', '123'),
('a@b.com1', 'kd1', 'male1', '1234'),
('a@b.com2', 'kd1', 'male1', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` int(6) NOT NULL,
  `sid` int(6) NOT NULL,
  `question` varchar(255) NOT NULL,
  `op1` varchar(255) NOT NULL,
  `op2` varchar(255) NOT NULL,
  `op3` varchar(255) NOT NULL,
  `op4` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `sid`, `question`, `op1`, `op2`, `op3`, `op4`, `answer`) VALUES
(1, 4, 'Awebpage displays a picture. What??? ??tag ?????was used to display that picture?', 'picture', 'image', 'img', 'src', 'img'),
(2, 4, '<b> tag makes the enclosed text bold. What is other tag to make text bold?', '<dar>', '<black>', '<strong>', '<emp>', '<strong>');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sid` int(6) NOT NULL,
  `sName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sid`, `sName`) VALUES
(1, 'programming'),
(2, 'database'),
(3, 'oops'),
(4, 'html');

-- --------------------------------------------------------

--
-- Table structure for table `test_score`
--

CREATE TABLE `test_score` (
  `tid` int(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sid` int(6) NOT NULL,
  `exam_date` date NOT NULL,
  `totalMarks` int(6) NOT NULL,
  `marksObtained` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_score`
--

INSERT INTO `test_score` (`tid`, `email`, `sid`, `exam_date`, `totalMarks`, `marksObtained`) VALUES
(1, 'a@b.com', 4, '2017-07-07', 2, 0),
(2, 'a@b.com', 4, '2017-07-07', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`sid`,`qid`),
  ADD KEY `email` (`email`),
  ADD KEY `qid` (`qid`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qid`,`sid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `test_score`
--
ALTER TABLE `test_score`
  ADD PRIMARY KEY (`tid`,`email`,`sid`),
  ADD KEY `email` (`email`),
  ADD KEY `sid` (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `test_score`
--
ALTER TABLE `test_score`
  MODIFY `tid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`email`) REFERENCES `candidate` (`email`),
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `subject` (`sid`),
  ADD CONSTRAINT `answers_ibfk_3` FOREIGN KEY (`qid`) REFERENCES `questions` (`qid`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `subject` (`sid`);

--
-- Constraints for table `test_score`
--
ALTER TABLE `test_score`
  ADD CONSTRAINT `test_score_ibfk_1` FOREIGN KEY (`email`) REFERENCES `candidate` (`email`),
  ADD CONSTRAINT `test_score_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `subject` (`sid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
