-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2024 at 07:47 AM
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
-- Database: `scholarsphere`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookchaptersbyfaculty`
--

CREATE TABLE `bookchaptersbyfaculty` (
  `user_id` int(100) NOT NULL,
  `University` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Faculty` varchar(100) NOT NULL,
  `Employee ID` int(100) NOT NULL,
  `other Author` varchar(100) NOT NULL,
  `Co-author` varchar(100) NOT NULL,
  `booktitle` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `pubdate` DATE NOT NULL,
  `pubyear` int(4) NOT NULL,
  `volume` int(10) NOT NULL,
  `pagefrom` int(11) NOT NULL,
  `pageto` int(11) NOT NULL,
  `scopus` enum('y','n') NOT NULL,
  `listedin` varchar(100) NOT NULL,
  `wos` enum('y','n') NOT NULL,
  `peer` enum('y','n') NOT NULL,
  `issn` int(100) NOT NULL,
  `isbn` int(100) NOT NULL,
  `pubname` varchar(100) NOT NULL,
  `affltn` varchar(100) NOT NULL,
  `corrauthor` varchar(100) NOT NULL,
  `citind` int(11) NOT NULL,
  `nocit` int(11) NOT NULL,
  `evdupload` varchar(100) NOT NULL,
  `othrinfo` varchar(100) NOT NULL,
  `ref` varchar(100) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookchaptersbyfaculty`
--

INSERT INTO `bookchaptersbyfaculty` (`user_id`, `University`, `Department`, `Faculty`, `Employee ID`, `other Author`, `Co-author`, `booktitle`, `region`, `pubdate`, `pubyear`, `volume`, `pagefrom`, `pageto`, `scopus`, `listedin`, `wos`, `peer`, `issn`, `isbn`, `pubname`, `affltn`, `corrauthor`, `citind`, `nocit`, `evdupload`, `othrinfo`, `ref`, `status`) VALUES
(2, '0', '0', '0', 12, '0', '0', '0', '0', 2024, 1988, 0, 0, 0, '', '0', '', '', 3456, 3456, '0', '0', '0', 0, 0, '0', '0', '0', 1),
(3, '0', '0', '0', 12, '0', '0', '0', '0', 2024, 1988, 12, 12, 56, '', '0', '', '', 3456, 3456, '0', '0', '0', 198, 4, '0', '0', '0', 1),
(4, 'Amity', 'BTech', 'Teacher', 12, 'JK Rowling', 'Jane Austin', 'Goblet Of Fire', 'International', 2024, 1988, 0, 12, 56, 'n', 'ICI', '', '', 3456, 3456, 'JK Rowling', 'ICSE', 'Jane Austin', 198, 4, '', '', '', 1),
(6, '', '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0, 0, '', '', '', 0, 0, '', '', '', 1),
(7, 'cc', 'cc', 'cc', 33, 'cc', 'cc', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0, 0, '', '', '', 0, 0, '', '', '', 1),
(8, 'Amity University Patna', 'ASET', 'Preetish Ranjan', 27170, 'Preetish Ranjan', 'Ramandeep5', 'Socio-Technical Attack Approximation Based on Structural Virality of Information in Social Networks', '', 0, 0, 0, 0, 0, '', 'UGC', '', '', 0, 0, '', '', '', 0, 0, '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `booksbyfaculty`
--

CREATE TABLE `booksbyfaculty` (
  `user_id` int(100) NOT NULL,
  `University` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Faculty` varchar(100) NOT NULL,
  `Employee ID` int(100) NOT NULL,
  `other Author` varchar(100) NOT NULL,
  `Co-author` varchar(100) NOT NULL,
  `booktitle` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `pubdate` DATE NOT NULL,
  `pubyear` int(100) NOT NULL,
  `volume` varchar(100) NOT NULL,
  `pagefrom` int(100) NOT NULL,
  `pageto` int(100) NOT NULL,
  `scopus` enum('y','n') NOT NULL,
  `listedin` varchar(100) NOT NULL,
  `wos` enum('y','n') NOT NULL,
  `peer` enum('y','n') NOT NULL,
  `issn` int(100) NOT NULL,
  `isbn` int(100) NOT NULL,
  `pubname` varchar(100) NOT NULL,
  `affltn` varchar(100) NOT NULL,
  `corrauthor` varchar(100) NOT NULL,
  `citind` int(100) NOT NULL,
  `nocit` int(100) NOT NULL,
  `evdupload` varchar(100) NOT NULL,
  `othrinfo` varchar(100) NOT NULL,
  `ref` varchar(100) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booksbyfaculty`
--

INSERT INTO `booksbyfaculty` (`user_id`, `University`, `Department`, `Faculty`, `Employee ID`, `other Author`, `Co-author`, `booktitle`, `region`, `pubdate`, `pubyear`, `volume`, `pagefrom`, `pageto`, `scopus`, `listedin`, `wos`, `peer`, `issn`, `isbn`, `pubname`, `affltn`, `corrauthor`, `citind`, `nocit`, `evdupload`, `othrinfo`, `ref`, `status`) VALUES
(1, 'Amity', 'BTech', 'ert', 12, '', 'Harry Potter', 'Goblet Of Fire', 'PubMed', 2024, 1988, '', 0, 0, '', '', '', '', 3456, 3456, '', '', '', 0, 0, '', '', 'reference', 1),
(2, 'Amity', 'BTech', 'Teacher', 12, '1234', 'Harry Potter', 'Goblet Of Fire', 'International', 2024, 1988, '12', 12, 45, 'n', 'PubMed', '', '', 3456, 3456, 'JK Rowling', 'ICSE', 'Jane Austin', 198, 8, '', 'no info', 'reference', 0),
(3, 'Amity', 'BTech', 'Teacher', 12, 'JK Rowling', 'Jane Austin', 'Goblet Of Fire', 'International', 2024, 1988, '12', 23, 56, 'y', 'PubMed', 'n', 'y', 3456, 3456, 'JK Rowling', 'ICSE', 'Jane Austin', 198, 8, 'uploads/English_india.pdf', 'no info', 'reference', 1),
(4, 'Amity', 'BTech', 'Teacher', 12, 'JK Rowling', 'Jane Austin', 'Goblet Of Fire', 'International', 2024, 1988, '12', 12, 56, 'y', 'PubMed', 'n', 'y', 3456, 3456, 'JK Rowling', 'ICSE', 'Jane Austin', 198, 7, 'uploads/English_india.pdf', 'no info', 'reference', 1),
(5, 'Amity', 'BTech', 'Teacher', 12, 'JK Rowling', 'Harry Potter', 'Goblet Of Fire', 'International', 2024, 1988, '12', 12, 45, 'y', 'PubMed', 'n', 'y', 3456, 3456, 'JK Rowling', 'ICSE', 'Jane Austin', 198, 8, 'uploads/English_india.pdf', 'no info', 'reference', 1),
(9, 'Amity University', 'BTech dodo', 'Teacherpp', 1288, 'JK Rowlingpp', '', 'Goblet Of Firepp', 'International', 2024, 1988, '12', 12, 45, 'n', 'PubMed', '', '', 3456, 3456, 'JK Rowling', 'ICSE', 'Jane Austin', 198, 8, '', '', 'reference', 1),
(10, 'Amity University', 'Btech', 'shilpa', 12, '', '', '', '', 0, 0, '', 0, 0, '', '', '', '', 0, 0, '', '', '', 0, 0, 'uploads/', '', '', 1),
(11, 'amity', 'pp', 'pp', 0, 'pppnn', 'pp', 'pp', 'international', 0, 0, '66', 66, 69, 'y', 'others', 'y', 'y', 0, 0, 'pp', 'pp', 'pp', 0, 0, 'uploads/', 'pp', 'pp', 1),
(12, 'Amity University Patna', 'ASET', 'Preetish Ranjan', 27170, 'Preetish Ranjan', 'Mayank2', 'AI in Cyber Security', '', 0, 0, '', 0, 0, '', '', '', '', 0, 0, '', '', '', 0, 0, '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `papersbyfaculty`
--

CREATE TABLE `papersbyfaculty` (
  `user_id` int(100) NOT NULL,
  `University` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Faculty` varchar(100) NOT NULL,
  `Employee ID` int(100) NOT NULL,
  `other Author` varchar(100) NOT NULL,
  `Co-author` varchar(100) NOT NULL,
  `booktitle` varchar(100) NOT NULL,
  `journalname` varchar(100) NOT NULL,
  `conferenceName` varchar(100) NOT NULL,
  `conferencePaper` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `pubdate` DATE NOT NULL,
  `pubyear` int(100) NOT NULL,
  `volume` int(100) NOT NULL,
  `pagefrom` int(100) NOT NULL,
  `pageto` int(100) NOT NULL,
  `scopus` enum('y','n') NOT NULL,
  `listedin` varchar(100) NOT NULL,
  `wos` enum('y','n') NOT NULL,
  `peer` enum('y','n') NOT NULL,
  `issn` int(100) NOT NULL,
  `isbn` int(100) NOT NULL,
  `pubname` varchar(100) NOT NULL,
  `affltn` varchar(100) NOT NULL,
  `corrauthor` varchar(100) NOT NULL,
  `citind` int(100) NOT NULL,
  `nocit` int(100) NOT NULL,
  `evdupload` varchar(100) NOT NULL,
  `othrinfo` varchar(100) NOT NULL,
  `ref` varchar(100) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `papersbyfaculty`
--

INSERT INTO `papersbyfaculty` (`user_id`, `University`, `Department`, `Faculty`, `Employee ID`, `other Author`, `Co-author`, `booktitle`, `journalname`, `conferenceName`, `conferencePaper`, `region`, `pubdate`, `pubyear`, `volume`, `pagefrom`, `pageto`, `scopus`, `listedin`, `wos`, `peer`, `issn`, `isbn`, `pubname`, `affltn`, `corrauthor`, `citind`, `nocit`, `evdupload`, `othrinfo`, `ref`, `status`) VALUES
(1, 'Amity', 'BTech', 'Teacher', 12, 'JK Rowling', 'Jane Austin', 'Goblet Of Fire', 'Goblet of Fire', 'Artificial Intelligence', 'ML', '0', 2024, 1988, 12, 12, 56, 'n', 'PubMed', 'y', 'y', 3456, 3456, 'JK Rowling', 'ICSE', 'Jane Austin', 198, 2, 'uploads/English_india.pdf', 'no info', 'reference', 1),
(2, 'Amity', 'BTech', 'Teacher', 12, 'JK Rowling', 'Harry Potter', 'Goblet Of Fire', 'Goblet of Fire', 'Artificial Intelligence', 'ML', 'International', 2024, 1988, 12, 12, 56, 'y', 'PubMed', 'n', 'n', 3456, 3456, 'JK Rowling', 'ICSE', 'Jane Austin', 198, 7, 'uploads/English_india.pdf', 'no info', 'reference', 1),
(3, 'Amity paper', 'BTechpaper', 'Teacher paper', 12, 'JK Rowling paper', 'Harry Potter paper', 'Goblet Of Fire paper', 'Goblet of Fire paper', 'mk', 'mk', 'International', 2024, 1988, 0, 12, 56, '', 'PubMed', '', '', 3456, 3456, 'JK Rowling', 'ICSE', 'Jane Austin', 0, 7, '', '', '', 1),
(4, 'pp', 'pp', 'pp', 22, 'pp', 'pp', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0, 0, '', '', '', 0, 0, '', '', '', 1),
(5, 'nnnnn', 'nn', 'nn', 0, 'nn', 'nn', 'nn', 'nn', 'nnn', 'nn', 'international', 2024, 9999, 99, 99, 99, '', 'others', '', '', 0, 0, 'nn', 'nn', 'nn', 99, 99, 'uploads/', 'nn', 'nn', 0),
(6, 'Amity University Patna', 'ASET', 'Preetish Ranjan', 27170, 'Preetish Ranjan', 'Amar2', 'Cyber Security', 'Multimedia Tools and Applications', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0, 0, '', '', '', 0, 0, '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registerinfo`
--

CREATE TABLE `registerinfo` (
  `emp_id` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `university` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `avatar_filename` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registerinfo`
--

INSERT INTO `registerinfo` (`emp_id`, `email`, `user_name`, `password`, `university`, `department`, `avatar_filename`) VALUES
('078', 'amannew@gmail.com', 'aman', '99', 'amity', 'BBA', 'amangdgfest.jpg'),
('1', 'abhijit@ptn.amity.edu', 'Admin', 'admin', 'Amity University Patna', 'All', 'Screenshot 2023-06-12 120154.png'),
('12', 'shilpa.sinha3107@gmail.com', 'shilpa', 'abc', 'Amity University', 'Btech', 'back_arrow.png'),
('123', 'test@gmail.com', 'test', 'ttttt', 'test', 'test', '2023-02-27 193522.jpg'),
('27170', 'pranjan@ptn.amity.edu', 'Preetish Ranjan', '12345678', 'Amity University Patna', 'ASET', 'Image0306.jpg'),
('27466', 'ssingh3@ptn.amity.edu', 'Shilpi', 'Beauty@0407', 'Amity University Patna', 'ASET', 'IMG-20200507-WA0003.jpg'),
('311072', 'rkumar2@ptn.amity.edu', 'Ritesh Kumar ', 'Rite@9021', 'Amity University Patna ', 'ARC', '1000029180.jpg'),
('7', 'aman.choudhary9834@gmail.com', 'amanchoudhary77433', 'aabbcc', 'amity', 'btech', 'IMG_20240329_230812.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `researchpapersbyfaculty`
--

CREATE TABLE `researchpapersbyfaculty` (
  `user_id` int(100) NOT NULL,
  `University` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Faculty` varchar(100) NOT NULL,
  `Employee ID` int(100) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `Co-author` varchar(100) NOT NULL,
  `papertitle` varchar(100) NOT NULL,
  `journalname` varchar(100) NOT NULL,
  `article` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `pubdate` DATE NOT NULL,
  `pubyear` int(100) NOT NULL,
  `volume` int(100) NOT NULL,
  `pagefrom` int(100) NOT NULL,
  `pageto` int(100) NOT NULL,
  `impact` varchar(100) NOT NULL,
  `scopus` enum('y','n') NOT NULL,
  `listedin` varchar(100) NOT NULL,
  `wos` enum('y','n') NOT NULL,
  `peer` enum('y','n') NOT NULL,
  `issn` int(100) NOT NULL,
  `isbn` int(100) NOT NULL,
  `pubname` varchar(100) NOT NULL,
  `affltn` varchar(100) NOT NULL,
  `corrauthor` varchar(100) NOT NULL,
  `citind` int(100) NOT NULL,
  `nocit` int(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `evdupload` varchar(100) NOT NULL,
  `othrinfo` varchar(100) NOT NULL,
  `ref` varchar(100) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `researchpapersbyfaculty`
--

INSERT INTO `researchpapersbyfaculty` (`user_id`, `University`, `Department`, `Faculty`, `Employee ID`, `Author`, `Co-author`, `papertitle`, `journalname`, `article`, `region`, `pubdate`, `pubyear`, `volume`, `pagefrom`, `pageto`, `impact`, `scopus`, `listedin`, `wos`, `peer`, `issn`, `isbn`, `pubname`, `affltn`, `corrauthor`, `citind`, `nocit`, `link`, `evdupload`, `othrinfo`, `ref`, `status`) VALUES
(2, '', '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', '', 0, 0, '', '', '', 0, 0, '45', '', '', '', 1),
(5, 'nnnnn', 'nn', 'nn', 0, 'nn', 'nnn', 'nnn', 'nnn', 'nnn', 'national', 2024, 99, 99, 99, 99, '', 'n', 'others', '', '', 0, 0, 'nn', 'nn', 'nn', 99, 99, '', 'uploads/', 'nn', 'nn', 1),
(8, 'Amity University', 'Btech', 'shilpa', 12, 'shilpa', 'Jane Austin', 'ML', 'framework', '', '', 0, 0, 0, 0, 0, '', '', '', '', '', 0, 0, '', '', '', 0, 0, '', 'uploads/', '', '', 1),
(12, 'Amity University Patna', 'ASET', 'Preetish Ranjan', 27170, 'Preetish Ranjan', 'Mayank9', 'A trustworthy model of recommender system using hyper-tuned restricted boltzmann machine', 'International Journal of System Assurance Engineering and Management', '', '', 0, 0, 0, 0, 0, '', '', '', '', '', 0, 0, '', '', '', 0, 0, '', '', '', '', 1),
(13, 'Amity University Patna', 'ASET', 'Preetish Ranjan', 27170, 'Preetish Ranjan', 'Kishor Sir10', 'A survey on trustworthy model of recommender system', 'Recent Patents on Engineering', '', '', 0, 0, 0, 0, 0, '', '', '', '', '', 0, 0, '', '', '', 0, 0, '', '', '', '', 1),
(14, 'Amity University Patna', 'ASET', 'Preetish Ranjan', 27170, 'Preetish Ranjan', 'Amar', 'Improving Fault Detection Rate using Similarity-based Test Case Prioritization in Regression Testing', 'Recent Patents on Engineering', '', '', 0, 0, 0, 0, 0, '', '', '', '', '', 0, 0, '', '', '', 0, 0, '', 'uploads/', '', '', 1),
(15, 'Amity University Patna', 'ASET', 'Preetish Ranjan', 27170, 'Preetish Ranjan', 'Abhisek', 'Social Network Analysis', 'IJCSA', '', '', 0, 0, 0, 0, 0, '', '', '', '', '', 0, 0, '', '', '', 0, 0, '', 'uploads/', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookchaptersbyfaculty`
--
ALTER TABLE `bookchaptersbyfaculty`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `booksbyfaculty`
--
ALTER TABLE `booksbyfaculty`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `papersbyfaculty`
--
ALTER TABLE `papersbyfaculty`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `registerinfo`
--
ALTER TABLE `registerinfo`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `researchpapersbyfaculty`
--
ALTER TABLE `researchpapersbyfaculty`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookchaptersbyfaculty`
--
ALTER TABLE `bookchaptersbyfaculty`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `booksbyfaculty`
--
ALTER TABLE `booksbyfaculty`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `papersbyfaculty`
--
ALTER TABLE `papersbyfaculty`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `researchpapersbyfaculty`
--
ALTER TABLE `researchpapersbyfaculty`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
