-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2023 at 07:23 AM
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
-- Database: `cpct`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aname` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aname`, `password`) VALUES
('rahul@gmail.com', '1234567489'),
('admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `course_add`
--

CREATE TABLE `course_add` (
  `cno` int(20) NOT NULL,
  `cname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_add`
--

INSERT INTO `course_add` (`cno`, `cname`) VALUES
(1, 'SSC'),
(6, 'AG-3'),
(7, 'DBMS');

-- --------------------------------------------------------

--
-- Table structure for table `course_test`
--

CREATE TABLE `course_test` (
  `cno` int(20) NOT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_test`
--

INSERT INTO `course_test` (`cno`, `test_id`) VALUES
(1, 1),
(6, 1),
(7, 1),
(7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fno` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fno`, `fname`, `email`, `rating`, `comment`) VALUES
(1, 'harsh', 'harsh1@gmail.com', 'Very Good', 'harsh is '),
(2, 'rahul', 'rahulrajak@gmail.com', 'Very Good', 'this course is very good'),
(3, 'Parul Saxena', 'parul4@gmail.com', 'Very Good', 'Feedback is correctly submitted.');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `cno` int(20) NOT NULL,
  `test_id` int(11) NOT NULL,
  `qno` int(11) NOT NULL,
  `q_content` text NOT NULL,
  `answer_op` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`cno`, `test_id`, `qno`, `q_content`, `answer_op`) VALUES
(1, 1, 1, 'After interchanging the given two numbers and two signs what will be the values of equation (I) and (II) respectively? × and +, 3 and 9 I. 7 × 9 – 8 ÷ 2 + 3 II. 4 × 9 – 3 + 8 ÷ 2', 'B'),
(1, 1, 2, 'In a certain code language, &#039;BEHOLD’ is written as &#039;BDEHLO&#039; and &#039;INDEED&#039; is written as &#039;DDEEIN&#039;. How will &#039;COURSE&#039; be written in that language?', 'D'),
(1, 1, 3, 'Select the option that is related to the third word in the same way as the second word is related to the first word. (The words must be considered as meaningful English words and must not be related to each other based on the number of letters/number of consonants/vowels in the word.) Library : Books :: Museum : ?', 'B'),
(1, 1, 4, 'Which of the following numbers will replace the question mark (?) in the given series? 382, 322, 272, 232, 202, ?', 'C'),
(1, 1, 5, 'Select the correct combination of mathematical signs to replace the * signs and balance the given equation. 21 * 4 * 156 * 13 * 11 = 83', 'C'),
(6, 1, 1, 'Time is money', 'b'),
(6, 1, 2, 'Time is water', 'a'),
(6, 1, 3, 'Pranjal is Honousr', 'a'),
(6, 1, 4, 'Right or wronglkjl', 'd'),
(6, 1, 5, 'qwerrttyodkzjlvlzdkjg;dljdl;gkj', 'b'),
(7, 1, 1, 'Normalizatino', 'b'),
(7, 1, 2, 'RDBMS', 'b'),
(7, 1, 3, 'synchronization', 'c'),
(7, 1, 4, 'heellwo ', 'a'),
(7, 1, 5, 'qwert', 'd'),
(7, 2, 1, 'rhaul is the best person', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `q_option`
--

CREATE TABLE `q_option` (
  `cno` int(20) NOT NULL,
  `test_id` int(11) NOT NULL,
  `qno` int(11) NOT NULL,
  `op` varchar(255) NOT NULL,
  `op_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `q_option`
--

INSERT INTO `q_option` (`cno`, `test_id`, `qno`, `op`, `op_content`) VALUES
(1, 1, 1, 'a', '0, 1 '),
(1, 1, 1, 'b', ' –26, –29 '),
(1, 1, 1, 'c', '6, 0 '),
(1, 1, 1, 'd', '12, 13'),
(1, 1, 2, 'a', 'CEROSU '),
(1, 1, 2, 'b', 'CEORUS '),
(1, 1, 2, 'c', 'CEOSUR '),
(1, 1, 2, 'd', 'CEORSU'),
(1, 1, 3, 'a', 'Building'),
(1, 1, 3, 'b', 'Artefacts '),
(1, 1, 3, 'c', 'People '),
(1, 1, 3, 'd', 'Gallery'),
(1, 1, 4, 'a', '168'),
(1, 1, 4, 'b', '150'),
(1, 1, 4, 'c', '182'),
(1, 1, 4, 'd', '132'),
(1, 1, 5, 'a', '−, ÷, ×, + '),
(1, 1, 5, 'b', ' ×, +, ÷, − '),
(1, 1, 5, 'c', '×, −, ÷, + '),
(1, 1, 5, 'd', '+, ÷, −, ×'),
(6, 1, 1, 'a', 'weoiru'),
(6, 1, 1, 'b', 'sdflkadjsfl'),
(6, 1, 1, 'c', 'asdjfldksfj'),
(6, 1, 1, 'd', 'sdlfkjasdl;'),
(6, 1, 2, 'a', 'asjf;lasdk'),
(6, 1, 2, 'b', 'sdfdsf'),
(6, 1, 2, 'c', 'sdfd'),
(6, 1, 2, 'd', 'sdfdfs'),
(6, 1, 3, 'a', 'adsfr'),
(6, 1, 3, 'b', 'asdfdsf'),
(6, 1, 3, 'c', 'sdfdfer'),
(6, 1, 3, 'd', 'sdfdfwe'),
(6, 1, 4, 'a', 'rrie'),
(6, 1, 4, 'b', 'tty'),
(6, 1, 4, 'c', 'ppt'),
(6, 1, 4, 'd', 'pyter'),
(6, 1, 5, 'a', 'sdlfkdjs'),
(6, 1, 5, 'b', 'sdlfkjdsfk'),
(6, 1, 5, 'c', 'sdfre'),
(6, 1, 5, 'd', 'dvsd'),
(7, 1, 1, 'a', 'adsf'),
(7, 1, 1, 'b', 'wert'),
(7, 1, 1, 'c', 'terw'),
(7, 1, 1, 'd', 'opiuo'),
(7, 1, 2, 'a', 'iyoiuoiu'),
(7, 1, 2, 'b', 'cx,vnx,mn'),
(7, 1, 2, 'c', 'weoiueor'),
(7, 1, 2, 'd', 'vcxvxv'),
(7, 1, 3, 'a', 'poiuoi'),
(7, 1, 3, 'b', 'asdfdsf'),
(7, 1, 3, 'c', 'dfdew'),
(7, 1, 3, 'd', 'sdfdxcv'),
(7, 1, 4, 'a', ';sldkfjru'),
(7, 1, 4, 'b', 'dflkm,nx'),
(7, 1, 4, 'c', 'eroiwup'),
(7, 1, 4, 'd', 'xvccnn'),
(7, 1, 5, 'a', 'sdferew'),
(7, 1, 5, 'b', 'sdfvxcb'),
(7, 1, 5, 'c', 'xbbvcn'),
(7, 1, 5, 'd', 'cvbcvn'),
(7, 2, 1, 'a', 'right'),
(7, 2, 1, 'b', 'kjlk'),
(7, 2, 1, 'c', 'yhgb'),
(7, 2, 1, 'd', 'kjk');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `Sno` int(11) NOT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `gender` char(10) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(30) DEFAULT NULL,
  `cpass` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`Sno`, `fname`, `dob`, `phone`, `gender`, `email`, `pass`, `cpass`) VALUES
(0, 'AJAY', '2000-09-29', 6266832433, 'm', 'ajay@gmail.com', '123', '123'),
(2, 'harsh', '2001-01-01', 1234, 'm', 'harsh@gmail.com', '1234', '1234'),
(4, 'kartikey soni', '2001-01-01', 123456789, 'm', 'kartikey@gmail.com', 'kartikey', 'kartikey'),
(3, 'rahul', '2023-05-03', 123456, 'm', 'rahul@gmail.com', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `student_test`
--

CREATE TABLE `student_test` (
  `email` varchar(255) NOT NULL,
  `cno` int(20) NOT NULL,
  `test_id` int(11) NOT NULL,
  `qno` int(11) NOT NULL,
  `selected_op` varchar(255) NOT NULL,
  `time_stamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_test`
--

INSERT INTO `student_test` (`email`, `cno`, `test_id`, `qno`, `selected_op`, `time_stamp`) VALUES
('rahul@gmail.com', 1, 1, 1, 'c', '2023-07-06 10:51:04'),
('rahul@gmail.com', 1, 1, 2, 'b', '2023-07-06 10:51:04'),
('rahul@gmail.com', 1, 1, 3, 'b', '2023-07-06 10:51:04'),
('rahul@gmail.com', 1, 1, 4, 'b', '2023-07-06 10:51:04'),
('rahul@gmail.com', 1, 1, 5, 'b', '2023-07-06 10:51:04'),
('rahul@gmail.com', 7, 1, 1, 'c', '2023-07-06 10:51:18'),
('rahul@gmail.com', 7, 1, 2, 'b', '2023-07-06 10:51:18'),
('rahul@gmail.com', 7, 1, 3, 'b', '2023-07-06 10:51:18'),
('rahul@gmail.com', 7, 1, 4, 'b', '2023-07-06 10:51:18'),
('rahul@gmail.com', 7, 1, 5, 'b', '2023-07-06 10:51:18');

-- --------------------------------------------------------

--
-- Table structure for table `student_top_10`
--

CREATE TABLE `student_top_10` (
  `email` varchar(30) NOT NULL,
  `total_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_top_10`
--

INSERT INTO `student_top_10` (`email`, `total_score`) VALUES
('harsh1@gmail.com', 14),
('rahul@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `cno` int(20) NOT NULL,
  `test_id` int(11) NOT NULL,
  `qno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`cno`, `test_id`, `qno`) VALUES
(1, 1, 1),
(1, 1, 2),
(1, 1, 3),
(1, 1, 4),
(1, 1, 5),
(6, 1, 1),
(6, 1, 2),
(6, 1, 3),
(6, 1, 4),
(6, 1, 5),
(7, 1, 1),
(7, 1, 2),
(7, 1, 3),
(7, 1, 4),
(7, 1, 5),
(7, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_add`
--
ALTER TABLE `course_add`
  ADD PRIMARY KEY (`cno`);

--
-- Indexes for table `course_test`
--
ALTER TABLE `course_test`
  ADD PRIMARY KEY (`cno`,`test_id`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `cno` (`cno`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fno`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD KEY `fgfg` (`cno`,`test_id`),
  ADD KEY `tttt` (`qno`);

--
-- Indexes for table `q_option`
--
ALTER TABLE `q_option`
  ADD KEY `jhjkhj` (`cno`,`test_id`),
  ADD KEY `uu` (`qno`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `student_test`
--
ALTER TABLE `student_test`
  ADD KEY `student` (`email`),
  ADD KEY `testsss` (`cno`,`test_id`),
  ADD KEY `qno` (`qno`);

--
-- Indexes for table `student_top_10`
--
ALTER TABLE `student_top_10`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`cno`,`test_id`,`qno`),
  ADD KEY `cno` (`cno`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `qno` (`qno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_add`
--
ALTER TABLE `course_add`
  MODIFY `cno` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_test`
--
ALTER TABLE `course_test`
  ADD CONSTRAINT `qqqq` FOREIGN KEY (`cno`) REFERENCES `course_add` (`cno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fgfg` FOREIGN KEY (`cno`,`test_id`) REFERENCES `course_test` (`cno`, `test_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tttt` FOREIGN KEY (`qno`) REFERENCES `test` (`qno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `q_option`
--
ALTER TABLE `q_option`
  ADD CONSTRAINT `jhjkhj` FOREIGN KEY (`cno`,`test_id`) REFERENCES `course_test` (`cno`, `test_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uu` FOREIGN KEY (`qno`) REFERENCES `test` (`qno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_test`
--
ALTER TABLE `student_test`
  ADD CONSTRAINT `student` FOREIGN KEY (`email`) REFERENCES `registration` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_test_ibfk_1` FOREIGN KEY (`qno`) REFERENCES `test` (`qno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `testsss` FOREIGN KEY (`cno`,`test_id`) REFERENCES `course_test` (`cno`, `test_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `jhgj` FOREIGN KEY (`cno`,`test_id`) REFERENCES `course_test` (`cno`, `test_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
