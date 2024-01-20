-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2024 at 09:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `engkps`
--

-- --------------------------------------------------------

--
-- Table structure for table `classtime`
--

CREATE TABLE `classtime` (
  `classTimeId` int(11) NOT NULL,
  `periodTime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseId` int(11) NOT NULL,
  `departmentId` int(11) NOT NULL,
  `nameCourseTh` varchar(150) NOT NULL,
  `nameCourseUse` varchar(50) NOT NULL,
  `planCourse` varchar(50) NOT NULL,
  `nameCourseEng` varchar(150) NOT NULL,
  `nameFullDegreeTh` varchar(150) NOT NULL,
  `nameFullDegreeEng` varchar(150) NOT NULL,
  `nameInitialsDegreeTh` varchar(100) NOT NULL,
  `nameInitialsDegreeEng` varchar(100) NOT NULL,
  `couseStartYear` int(11) NOT NULL,
  `couseEndYear` int(11) NOT NULL,
  `totalCredit` int(11) NOT NULL,
  `generalSubjectCredit` int(11) NOT NULL,
  `specificSubjectCredit` int(11) NOT NULL,
  `freeSubjectCredit` int(11) NOT NULL,
  `coreSubjectCredit` int(11) NOT NULL,
  `spacailSubjectCredit` int(11) NOT NULL,
  `selectSubjectCredit` int(11) NOT NULL,
  `happySubjectCredit` int(11) NOT NULL,
  `entrepreneurshipSubjectCredit` int(11) NOT NULL,
  `languageSubjectCredit` int(11) NOT NULL,
  `peopleSubjectCredit` int(11) NOT NULL,
  `aestheticsSubjectCredit` int(11) NOT NULL,
  `internshipHours` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseId`, `departmentId`, `nameCourseTh`, `nameCourseUse`, `planCourse`, `nameCourseEng`, `nameFullDegreeTh`, `nameFullDegreeEng`, `nameInitialsDegreeTh`, `nameInitialsDegreeEng`, `couseStartYear`, `couseEndYear`, `totalCredit`, `generalSubjectCredit`, `specificSubjectCredit`, `freeSubjectCredit`, `coreSubjectCredit`, `spacailSubjectCredit`, `selectSubjectCredit`, `happySubjectCredit`, `entrepreneurshipSubjectCredit`, `languageSubjectCredit`, `peopleSubjectCredit`, `aestheticsSubjectCredit`, `internshipHours`) VALUES
(1, 1, 'หลักสูตรวิศวกรรมศาสตรบัณฑิต สาขาวิชาวิศวกรรมคอมพิวเตอร์', 'วศ.คอม 60', 'ไม่สหกิจ', 'Bachelor of Engineering Program in Computer Engineering', 'วิศวกรรมศาสตรบัณฑิต (วิศวกรรมคอมพิวเตอร์)', 'Bachelor of Engineering (Computer Engineering)', 'วศ.บ. (วิศวกรรมคอมพิวเตอร์)', 'B.Eng. (Computer Engineering)', 2560, 2564, 140, 30, 104, 6, 30, 55, 19, 5, 6, 13, 3, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coursecredit`
--

CREATE TABLE `coursecredit` (
  `courseCreditId` int(11) NOT NULL,
  `departmentId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `creditProject` int(11) NOT NULL,
  `creditIntern` int(11) NOT NULL,
  `deleted` int(11) DEFAULT NULL,
  `creditCondition` int(11) NOT NULL,
  `projectCondition` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coursecreditsubjectgroup`
--

CREATE TABLE `coursecreditsubjectgroup` (
  `coursecreditcourseCreditSubjectGroupGeneralSubjectId` int(11) NOT NULL,
  `subjectGroupId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `creditSubject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `coursecreditsubjectgroup`
--

INSERT INTO `coursecreditsubjectgroup` (`coursecreditcourseCreditSubjectGroupGeneralSubjectId`, `subjectGroupId`, `courseId`, `creditSubject`) VALUES
(1, 1, 1, 5),
(2, 2, 1, 6),
(3, 3, 1, 13),
(4, 4, 1, 3),
(5, 5, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `courselist`
--

CREATE TABLE `courselist` (
  `courseListId` int(11) NOT NULL,
  `courseName` varchar(20) NOT NULL,
  `coursePlan` varchar(20) NOT NULL,
  `studyYear` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `subjectCode` varchar(150) DEFAULT NULL,
  `credit` int(11) NOT NULL,
  `subjectGroup` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courselist`
--

INSERT INTO `courselist` (`courseListId`, `courseName`, `coursePlan`, `studyYear`, `term`, `subjectCode`, `credit`, `subjectGroup`) VALUES
(114, 'วศ.คอม 60', 'ไม่สหกิจ', 1, 1, '01417167', 3, 'วิชาแกน'),
(115, 'วศ.คอม 60', 'ไม่สหกิจ', 1, 1, '01420111', 3, 'วิชาแกน'),
(116, 'วศ.คอม 60', 'ไม่สหกิจ', 1, 1, '01420113', 1, 'วิชาแกน'),
(117, 'วศ.คอม 60', 'ไม่สหกิจ', 1, 1, '01999111', 2, 'กลุ่มสาระพลเมืองไทยและพลเมืองโลก'),
(118, 'วศ.คอม 60', 'ไม่สหกิจ', 1, 1, '02204171', 3, 'วิชาแกน'),
(119, 'วศ.คอม 60', 'ไม่สหกิจ', 1, 1, '02999144', 1, 'กลุ่มสาระพลเมืองไทยและพลเมืองโลก'),
(120, 'วศ.คอม 60', 'ไม่สหกิจ', 1, 1, '01355***', 3, 'กลุ่มสาระภาษากับการสื่อสาร'),
(121, 'วศ.คอม 60', 'ไม่สหกิจ', 1, 1, '01999021', 3, 'กลุ่มสาระภาษากับการสื่อสาร'),
(122, 'วศ.คอม 60', 'ไม่สหกิจ', 1, 2, '01417168', 3, 'วิชาแกน'),
(123, 'วศ.คอม 60', 'ไม่สหกิจ', 1, 2, '01420112', 3, 'วิชาแกน'),
(124, 'วศ.คอม 60', 'ไม่สหกิจ', 1, 2, '01420114', 1, 'วิชาแกน'),
(125, 'วศ.คอม 60', 'ไม่สหกิจ', 1, 2, '02204111', 3, 'วิชาเฉพาะด้าน'),
(126, 'วศ.คอม 60', 'ไม่สหกิจ', 1, 2, '02204121', 3, 'วิชาเฉพาะด้าน'),
(127, 'วศ.คอม 60', 'ไม่สหกิจ', 1, 2, '02204122', 1, 'วิชาเฉพาะด้าน'),
(128, 'วศ.คอม 60', 'ไม่สหกิจ', 1, 2, '02204172', 1, 'วิชาเฉพาะด้าน'),
(129, 'วศ.คอม 60', 'ไม่สหกิจ', 1, 2, '01175***', 1, 'กลุ่มสาระอยู่ดีมีสุข'),
(130, 'วศ.คอม 60', 'ไม่สหกิจ', 1, 2, '01007101/01240011/01244101/01255101/01350102/ \n01387102/01401201/01418105/01420201/01999034/ \n01999035/02708102/02728102/02999037/03600012/03654111', 3, 'กลุ่มสาระสุนทรียศาสตร์'),
(131, 'วศ.คอม 60', 'ไม่สหกิจ', 2, 1, '01403114', 1, 'วิชาแกน'),
(132, 'วศ.คอม 60', 'ไม่สหกิจ', 2, 1, '01403117	', 3, 'วิชาแกน'),
(133, 'วศ.คอม 60', 'ไม่สหกิจ', 2, 1, '01417267', 3, 'วิชาแกน'),
(134, 'วศ.คอม 60', 'ไม่สหกิจ', 2, 1, '02204221', 3, 'วิชาเฉพาะด้าน'),
(135, 'วศ.คอม 60', 'ไม่สหกิจ', 2, 1, '02204231', 3, 'วิชาเฉพาะด้าน'),
(136, 'วศ.คอม 60', 'ไม่สหกิจ', 2, 1, '02204271', 1, 'วิชาเฉพาะด้าน'),
(137, 'วศ.คอม 60', 'ไม่สหกิจ', 2, 1, '01355***', 3, 'กลุ่มสาระภาษากับการสื่อสาร'),
(138, 'วศ.คอม 60', 'ไม่สหกิจ', 2, 1, '********', 1, 'กลุ่มสาระอยู่ดีมีสุข'),
(139, 'วศ.คอม 60', 'ไม่สหกิจ', 2, 2, '01208111', 3, 'วิชาแกน'),
(140, 'วศ.คอม 60', 'ไม่สหกิจ', 2, 2, '02204222', 1, 'วิชาเฉพาะด้าน'),
(141, 'วศ.คอม 60', 'ไม่สหกิจ', 2, 2, '02204223', 3, 'วิชาเฉพาะด้าน'),
(142, 'วศ.คอม 60', 'ไม่สหกิจ', 2, 2, '02204232', 3, 'วิชาเฉพาะด้าน'),
(143, 'วศ.คอม 60', 'ไม่สหกิจ', 2, 2, '02204241', 3, 'วิชาเฉพาะด้าน'),
(144, 'วศ.คอม 60', 'ไม่สหกิจ', 2, 2, '02204272', 1, 'วิชาเฉพาะด้าน'),
(145, 'วศ.คอม 60', 'ไม่สหกิจ', 2, 2, '02204281', 3, 'วิชาเฉพาะด้าน'),
(146, 'วศ.คอม 60', 'ไม่สหกิจ', 2, 2, '********', 3, 'กลุ่มสาระอยู่ดีมีสุข'),
(147, 'วศ.คอม 60', 'ไม่สหกิจ', 3, 1, '02204224', 1, 'วิชาเฉพาะด้าน'),
(148, 'วศ.คอม 60', 'ไม่สหกิจ', 3, 1, '02204311', 3, 'วิชาเฉพาะด้าน'),
(149, 'วศ.คอม 60', 'ไม่สหกิจ', 3, 1, '02204321', 3, 'วิชาเฉพาะด้าน'),
(150, 'วศ.คอม 60', 'ไม่สหกิจ', 3, 1, '02204351', 3, 'วิชาเฉพาะด้าน'),
(151, 'วศ.คอม 60', 'ไม่สหกิจ', 3, 1, '02204361', 3, 'วิชาเฉพาะด้าน'),
(152, 'วศ.คอม 60', 'ไม่สหกิจ', 3, 1, '02204381', 1, 'วิชาเฉพาะด้าน'),
(153, 'วศ.คอม 60', 'ไม่สหกิจ', 3, 1, '01355***', 3, 'กลุ่มสาระภาษากับการสื่อสาร'),
(154, 'วศ.คอม 60', 'ไม่สหกิจ', 3, 1, '01005101/01101101/01131111/01177141/01200101/\n01387105/01390104/01418102/01453103/01999041/01999043', 3, 'กลุ่มสาระศาสตร์แห่งผู้ประกอบการ'),
(155, 'วศ.คอม 60', 'ไม่สหกิจ', 3, 2, '02204341', 3, 'วิชาเฉพาะด้าน'),
(156, 'วศ.คอม 60', 'ไม่สหกิจ', 3, 2, '02204371', 3, 'วิชาเฉพาะด้าน'),
(157, 'วศ.คอม 60', 'ไม่สหกิจ', 3, 2, '02204372', 3, 'วิชาเฉพาะด้าน'),
(158, 'วศ.คอม 60', 'ไม่สหกิจ', 3, 2, '02204497', 1, 'วิชาเฉพาะด้าน'),
(159, 'วศ.คอม 60', 'ไม่สหกิจ', 3, 2, '02206111', 3, 'วิชาแกน'),
(160, 'วศ.คอม 60', 'ไม่สหกิจ', 3, 2, '01999112/02714101/02721121/03600014/03757123', 3, 'กลุ่มสาระศาสตร์แห่งผู้ประกอบการ'),
(161, 'วศ.คอม 60', 'ไม่สหกิจ', 3, 2, '022044**', 3, 'วิชาเลือก'),
(162, 'วศ.คอม 60', 'ไม่สหกิจ', 4, 1, '02204495', 2, 'วิชาเลือก'),
(163, 'วศ.คอม 60', 'ไม่สหกิจ', 4, 1, '01371111/01418104,111/01999013/01999023/02729102/03600013/03752111', 1, 'สาระภาษากับการสื่อสาร'),
(164, 'วศ.คอม 60', 'ไม่สหกิจ', 4, 1, '022044**', 3, 'วิชาเลือก'),
(165, 'วศ.คอม 60', 'ไม่สหกิจ', 4, 1, '022044**', 3, 'วิชาเลือก'),
(166, 'วศ.คอม 60', 'ไม่สหกิจ', 4, 1, '********', 3, 'วิชาเลือกเสรี'),
(167, 'วศ.คอม 60', 'ไม่สหกิจ', 4, 2, '02204499', 3, 'วิชาเลือก'),
(168, 'วศ.คอม 60', 'ไม่สหกิจ', 4, 2, '022044**', 3, 'วิชาเลือก'),
(169, 'วศ.คอม 60', 'ไม่สหกิจ', 4, 2, '022044**', 3, 'วิชาเลือก'),
(170, 'วศ.คอม 60', 'ไม่สหกิจ', 4, 2, '********', 3, 'วิชาเลือกเสรี'),
(171, 'วศ.คอม 60', 'สหกิจ', 1, 1, '01417167', 3, 'วิชาแกน'),
(172, 'วศ.คอม 60', 'สหกิจ', 1, 1, '01420111', 3, 'วิชาแกน'),
(173, 'วศ.คอม 60', 'สหกิจ', 1, 1, '01420113', 1, 'วิชาแกน'),
(174, 'วศ.คอม 60', 'สหกิจ', 1, 1, '01999111', 2, 'กลุ่มสาระพลเมืองไทยและพลเมืองโลก'),
(175, 'วศ.คอม 60', 'สหกิจ', 1, 1, '02204171', 3, 'วิชาแกน'),
(176, 'วศ.คอม 60', 'สหกิจ', 1, 1, '02999144', 1, 'กลุ่มสาระพลเมืองไทยและพลเมืองโลก'),
(177, 'วศ.คอม 60', 'สหกิจ', 1, 1, '01355***', 3, 'กลุ่มสาระภาษากับการสื่อสาร'),
(178, 'วศ.คอม 60', 'สหกิจ', 1, 1, '01999021', 3, 'กลุ่มสาระภาษากับการสื่อสาร'),
(179, 'วศ.คอม 60', 'สหกิจ', 1, 2, '01417168', 3, 'วิชาแกน'),
(180, 'วศ.คอม 60', 'สหกิจ', 1, 2, '01420112', 3, 'วิชาแกน'),
(181, 'วศ.คอม 60', 'สหกิจ', 1, 2, '01420114', 1, 'วิชาแกน'),
(182, 'วศ.คอม 60', 'สหกิจ', 1, 2, '02204111', 3, 'วิชาเฉพาะด้าน'),
(183, 'วศ.คอม 60', 'สหกิจ', 1, 2, '02204121', 3, 'วิชาเฉพาะด้าน'),
(184, 'วศ.คอม 60', 'สหกิจ', 1, 2, '02204122', 1, 'วิชาเฉพาะด้าน'),
(185, 'วศ.คอม 60', 'สหกิจ', 1, 2, '02204172', 1, 'วิชาเฉพาะด้าน'),
(186, 'วศ.คอม 60', 'สหกิจ', 1, 2, '01175***', 1, 'กลุ่มสาระอยู่ดีมีสุข'),
(187, 'วศ.คอม 60', 'สหกิจ', 1, 2, '01007101/01240011/01244101/01255101/01350102/ \n01387102/01401201/01418105/01420201/01999034/ \n01999035/02708102/02728102/02999037/03600012/03654111', 3, 'กลุ่มสาระสุนทรียศาสตร์'),
(188, 'วศ.คอม 60', 'สหกิจ', 2, 1, '01403114', 1, 'วิชาแกน'),
(189, 'วศ.คอม 60', 'สหกิจ', 2, 1, '01403117	', 3, 'วิชาแกน'),
(190, 'วศ.คอม 60', 'สหกิจ', 2, 1, '01417267', 3, 'วิชาแกน'),
(191, 'วศ.คอม 60', 'สหกิจ', 2, 1, '02204221', 3, 'วิชาเฉพาะด้าน'),
(192, 'วศ.คอม 60', 'สหกิจ', 2, 1, '02204231', 3, 'วิชาเฉพาะด้าน'),
(193, 'วศ.คอม 60', 'สหกิจ', 2, 1, '02204271', 1, 'วิชาเฉพาะด้าน'),
(194, 'วศ.คอม 60', 'สหกิจ', 2, 1, '01355***', 3, 'กลุ่มสาระภาษากับการสื่อสาร'),
(195, 'วศ.คอม 60', 'สหกิจ', 2, 1, '********', 1, 'กลุ่มสาระอยู่ดีมีสุข'),
(196, 'วศ.คอม 60', 'สหกิจ', 2, 2, '01208111', 3, 'วิชาแกน'),
(197, 'วศ.คอม 60', 'สหกิจ', 2, 2, '02204222', 1, 'วิชาเฉพาะด้าน'),
(198, 'วศ.คอม 60', 'สหกิจ', 2, 2, '02204223', 3, 'วิชาเฉพาะด้าน'),
(199, 'วศ.คอม 60', 'สหกิจ', 2, 2, '02204232', 3, 'วิชาเฉพาะด้าน'),
(200, 'วศ.คอม 60', 'สหกิจ', 2, 2, '02204241', 3, 'วิชาเฉพาะด้าน'),
(201, 'วศ.คอม 60', 'สหกิจ', 2, 2, '02204272', 1, 'วิชาเฉพาะด้าน'),
(202, 'วศ.คอม 60', 'สหกิจ', 2, 2, '02204281', 3, 'วิชาเฉพาะด้าน'),
(203, 'วศ.คอม 60', 'สหกิจ', 2, 2, '********', 3, 'กลุ่มสาระอยู่ดีมีสุข'),
(204, 'วศ.คอม 60', 'สหกิจ', 3, 1, '02204224', 1, 'วิชาเฉพาะด้าน'),
(205, 'วศ.คอม 60', 'สหกิจ', 3, 1, '02204311', 3, 'วิชาเฉพาะด้าน'),
(206, 'วศ.คอม 60', 'สหกิจ', 3, 1, '02204321', 3, 'วิชาเฉพาะด้าน'),
(207, 'วศ.คอม 60', 'สหกิจ', 3, 1, '02204351', 3, 'วิชาเฉพาะด้าน'),
(208, 'วศ.คอม 60', 'สหกิจ', 3, 1, '02204361', 3, 'วิชาเฉพาะด้าน'),
(209, 'วศ.คอม 60', 'สหกิจ', 3, 1, '02204381', 1, 'วิชาเฉพาะด้าน'),
(210, 'วศ.คอม 60', 'สหกิจ', 3, 1, '01355***', 3, 'กลุ่มสาระภาษากับการสื่อสาร'),
(211, 'วศ.คอม 60', 'สหกิจ', 3, 1, '01005101/01101101/01131111/01177141/01200101/\n01387105/01390104/01418102/01453103/01999041/01999043', 3, 'กลุ่มสาระศาสตร์แห่งผู้ประกอบการ'),
(212, 'วศ.คอม 60', 'สหกิจ', 3, 2, '02204341', 3, 'วิชาเฉพาะด้าน'),
(213, 'วศ.คอม 60', 'สหกิจ', 3, 2, '02204371', 3, 'วิชาเฉพาะด้าน'),
(214, 'วศ.คอม 60', 'สหกิจ', 3, 2, '02204372', 3, 'วิชาเฉพาะด้าน'),
(215, 'วศ.คอม 60', 'สหกิจ', 3, 2, '02204497', 1, 'วิชาเฉพาะด้าน'),
(216, 'วศ.คอม 60', 'สหกิจ', 3, 2, '02206111', 3, 'วิชาแกน'),
(217, 'วศ.คอม 60', 'สหกิจ', 3, 2, '01999112/02714101/02721121/03600014/03757123', 3, 'กลุ่มสาระศาสตร์แห่งผู้ประกอบการ'),
(218, 'วศ.คอม 60', 'สหกิจ', 3, 2, '022044**', 3, 'วิชาเลือก'),
(219, 'วศ.คอม 60', 'สหกิจ', 4, 1, '02204390', 1, 'วิชาเลือก'),
(220, 'วศ.คอม 60', 'สหกิจ', 4, 1, '01371111/01418104,111/01999013/01999023/02729102/03600013/03752111', 1, 'สาระภาษากับการสื่อสาร'),
(221, 'วศ.คอม 60', 'สหกิจ', 4, 1, '022044**', 3, 'วิชาเลือก'),
(222, 'วศ.คอม 60', 'สหกิจ', 4, 1, '022044**', 3, 'วิชาเลือก'),
(223, 'วศ.คอม 60', 'สหกิจ', 4, 1, '022044**', 3, 'วิชาเลือก'),
(224, 'วศ.คอม 60', 'สหกิจ', 4, 1, '********', 3, 'วิชาเลือกเสรี'),
(225, 'วศ.คอม 60', 'สหกิจ', 4, 1, '********', 3, 'วิชาเลือกเสรี'),
(226, 'วศ.คอม 60', 'สหกิจ', 4, 2, '02204490', 3, 'วิชาเลือก');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentId` int(11) NOT NULL,
  `departmentCode` varchar(10) NOT NULL,
  `departmentName` varchar(30) NOT NULL,
  `departmentInitials` varchar(20) NOT NULL,
  `campus` varchar(20) DEFAULT NULL,
  `faculty` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentId`, `departmentCode`, `departmentName`, `departmentInitials`, `campus`, `faculty`) VALUES
(1, 'E29', 'วิศวกรรมคอมพิวเตอร์', 'วศ.คอม', 'กำแพงแสน', 'วิศวกรรมศาสตร์ กำแพงแสน');

-- --------------------------------------------------------

--
-- Table structure for table `fact_regis`
--

CREATE TABLE `fact_regis` (
  `regisId` int(11) NOT NULL,
  `studentId` varchar(10) NOT NULL,
  `subjectId` int(11) NOT NULL,
  `roomId` int(11) DEFAULT NULL,
  `semesterId` int(11) NOT NULL,
  `secLecture` int(11) NOT NULL,
  `secLab` int(11) DEFAULT NULL,
  `gradeCharacter` varchar(2) DEFAULT NULL,
  `gradeNumber` float DEFAULT NULL,
  `typeRegisId` int(11) NOT NULL,
  `classTimeLecture` varchar(10) DEFAULT NULL,
  `classTimeLab` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fact_regis`
--

INSERT INTO `fact_regis` (`regisId`, `studentId`, `subjectId`, `roomId`, `semesterId`, `secLecture`, `secLab`, `gradeCharacter`, `gradeNumber`, `typeRegisId`, `classTimeLecture`, `classTimeLab`) VALUES
(478, '6320500611', 181, 1, 70, 709, 0, 'B', 3, 1, 'บ่าย', 'ไม่มี'),
(479, '6320500611', 182, 1, 70, 700, 0, 'B', 3, 1, 'เย็น', 'ไม่มี'),
(480, '6320500611', 183, 1, 70, 701, 0, 'C+', 2.5, 1, 'เช้า', 'ไม่มี'),
(481, '6320500611', 184, 1, 70, 730, 0, 'A', 4, 1, 'ไม่มี', 'เช้า'),
(482, '6320500611', 185, 1, 70, 702, 0, 'B+', 3.5, 1, 'บ่าย', 'ไม่มี'),
(483, '6320500611', 186, 2, 70, 717, 0, 'A', 4, 1, 'เย็น', 'ไม่มี'),
(484, '6320500611', 187, 3, 70, 700, 711, 'A', 4, 1, 'เช้า', 'เช้า'),
(485, '6320500611', 188, 4, 70, 731, 0, 'A', 4, 1, 'บ่าย', 'ไม่มี'),
(486, '6320500654', 181, 1, 70, 709, 0, 'B', 3, 1, 'บ่าย', 'ไม่มี'),
(487, '6320500654', 182, 1, 70, 700, 0, 'W', 0, 1, 'เย็น', 'ไม่มี'),
(488, '6320500654', 183, 1, 70, 701, 0, 'C', 2, 1, 'เช้า', 'ไม่มี'),
(489, '6320500654', 184, 1, 70, 730, 0, 'A', 4, 1, 'ไม่มี', 'เช้า'),
(490, '6320500654', 185, 1, 70, 702, 0, 'C+', 2.5, 1, 'บ่าย', 'ไม่มี'),
(491, '6320500654', 186, 2, 70, 717, 0, 'A', 4, 1, 'เย็น', 'ไม่มี'),
(492, '6320500654', 187, 3, 70, 700, 711, 'D+', 1.5, 1, 'เช้า', 'เช้า'),
(493, '6320500654', 188, 4, 70, 731, 0, 'A', 4, 1, 'บ่าย', 'ไม่มี'),
(494, '6320500611', 189, 5, 71, 0, 711, 'A', 4, 1, 'ไม่มี', 'เช้า'),
(495, '6320500611', 190, 6, 71, 703, 0, 'B+', 3.5, 1, 'เช้า', 'ไม่มี'),
(496, '6320500611', 191, 7, 71, 702, 0, 'B+', 3.5, 1, 'บ่าย', 'ไม่มี'),
(497, '6320500611', 192, 8, 71, 700, 0, 'B', 3, 1, 'เช้า', 'ไม่มี'),
(498, '6320500611', 193, 1, 71, 0, 715, 'A', 4, 1, 'ไม่มี', 'บ่าย'),
(499, '6320500611', 194, 9, 71, 700, 0, 'C+', 2.5, 1, 'บ่าย', 'ไม่มี'),
(500, '6320500611', 195, 9, 71, 700, 0, 'B+', 3.5, 1, 'เช้า', 'ไม่มี'),
(501, '6320500611', 196, 10, 71, 0, 712, 'A', 4, 1, 'ไม่มี', 'เช้า'),
(502, '6320500611', 197, 11, 71, 0, 712, 'A', 4, 1, 'ไม่มี', 'บ่าย'),
(503, '6320500611', 198, 7, 71, 702, 0, 'A', 4, 1, 'เช้า', 'ไม่มี'),
(504, '6320500654', 239, 20, 71, 0, 711, 'A', 4, 1, 'ไม่มี', 'เช้า'),
(505, '6320500654', 190, 6, 71, 703, 0, 'B+', 3.5, 1, 'เช้า', 'ไม่มี'),
(506, '6320500654', 192, 8, 71, 700, 0, 'B', 3, 1, 'เช้า', 'ไม่มี'),
(507, '6320500654', 193, 1, 71, 0, 715, 'A', 4, 1, 'ไม่มี', 'บ่าย'),
(508, '6320500654', 194, 9, 71, 700, 0, 'D', 1, 1, 'บ่าย', 'ไม่มี'),
(509, '6320500654', 195, 9, 71, 700, 0, 'B+', 3.5, 1, 'เช้า', 'ไม่มี'),
(510, '6320500654', 196, 10, 71, 0, 712, 'B+', 3.5, 1, 'ไม่มี', 'เช้า'),
(511, '6320500654', 197, 11, 71, 0, 712, 'D+', 1.5, 1, 'ไม่มี', 'บ่าย'),
(512, '6320500654', 198, 7, 71, 702, 0, 'A', 4, 1, 'เช้า', 'ไม่มี'),
(513, '6320500611', 207, 1, 72, 700, 0, 'B+', 3.5, 1, 'เช้า', 'ไม่มี'),
(514, '6320500611', 208, 1, 72, 700, 0, 'A', 4, 1, 'ไม่มี', 'ไม่มี'),
(515, '6320500654', 207, 1, 72, 700, 0, 'C+', 2.5, 1, 'เช้า', 'ไม่มี'),
(516, '6320500654', 208, 1, 72, 700, 0, 'A', 4, 1, 'ไม่มี', 'ไม่มี'),
(517, '6320500611', 199, 1, 73, 0, 711, 'A', 4, 1, 'ไม่มี', 'เช้า'),
(518, '6320500611', 200, 1, 73, 701, 0, 'B', 3, 1, 'เช้า', 'ไม่มี'),
(519, '6320500611', 201, 1, 73, 0, 719, 'A', 4, 1, 'ไม่มี', 'บ่าย'),
(520, '6320500611', 202, 1, 73, 700, 0, 'A', 4, 1, 'บ่าย', 'ไม่มี'),
(521, '6320500611', 203, 1, 73, 703, 0, 'A', 4, 1, 'ไม่มี', 'ไม่มี'),
(522, '6320500611', 204, 1, 73, 700, 0, 'B+', 3.5, 1, 'เช้า', 'ไม่มี'),
(523, '6320500611', 205, 1, 73, 700, 0, 'A', 4, 1, 'เช้า', 'ไม่มี'),
(524, '6320500611', 206, 1, 73, 700, 711, 'A', 4, 1, 'เช้า', 'บ่าย'),
(525, '6320500654', 199, 1, 73, 0, 711, 'A', 4, 1, 'ไม่มี', 'เช้า'),
(526, '6320500654', 200, 1, 73, 701, 0, 'C+', 2.5, 1, 'เช้า', 'ไม่มี'),
(527, '6320500654', 201, 1, 73, 0, 719, 'A', 4, 1, 'ไม่มี', 'บ่าย'),
(528, '6320500654', 182, 1, 73, 700, 0, 'B', 3, 1, 'บ่าย', 'ไม่มี'),
(529, '6320500654', 203, 1, 73, 703, 0, 'B+', 3.5, 1, 'ไม่มี', 'ไม่มี'),
(530, '6320500654', 204, 1, 73, 700, 0, 'W', 0, 1, 'เช้า', 'ไม่มี'),
(531, '6320500654', 205, 1, 73, 700, 0, 'D+', 1.5, 1, 'เช้า', 'ไม่มี'),
(532, '6320500654', 206, 1, 73, 700, 711, 'D+', 1.5, 1, 'เช้า', 'บ่าย'),
(533, '6320500611', 209, 1, 74, 701, 712, 'B+', 3.5, 1, 'เย็น', 'ไม่มี'),
(534, '6320500611', 210, 1, 74, 701, 0, 'A', 4, 1, 'เช้า', 'ไม่มี'),
(535, '6320500611', 211, 1, 74, 0, 712, 'A', 4, 1, 'ไม่มี', 'บ่าย'),
(536, '6320500611', 212, 1, 74, 700, 0, 'B+', 3.5, 1, 'บ่าย', 'ไม่มี'),
(537, '6320500611', 213, 1, 74, 700, 0, 'A', 4, 1, 'เช้า', 'ไม่มี'),
(538, '6320500611', 214, 1, 74, 700, 0, 'B+', 3.5, 1, 'เช้า', 'ไม่มี'),
(539, '6320500611', 215, 1, 74, 0, 711, 'A', 4, 1, 'ไม่มี', 'ไม่มี'),
(540, '6320500611', 216, 1, 74, 700, 0, 'B', 3, 1, 'บ่าย', 'ไม่มี'),
(541, '6320500654', 209, 1, 74, 701, 712, 'B', 3, 1, 'เย็น', 'ไม่มี'),
(542, '6320500654', 210, 1, 74, 701, 0, 'A', 4, 1, 'เช้า', 'ไม่มี'),
(543, '6320500654', 213, 1, 74, 700, 0, 'D+', 1.5, 1, 'เช้า', 'ไม่มี'),
(544, '6320500654', 214, 1, 74, 700, 0, 'C+', 2.5, 1, 'เช้า', 'ไม่มี'),
(545, '6320500654', 215, 1, 74, 0, 711, 'A', 4, 1, 'ไม่มี', 'ไม่มี'),
(546, '6320500654', 216, 1, 74, 700, 0, 'C+', 2.5, 1, 'บ่าย', 'ไม่มี'),
(547, '6320500654', 231, 1, 75, 700, 0, 'A', 4, 1, 'เช้า', 'ไม่มี'),
(548, '6320500611', 217, 10, 76, 0, 711, 'B+', 3.5, 1, 'ไม่มี', 'เช้า'),
(549, '6320500611', 218, 12, 76, 700, 0, 'B+', 3.5, 1, 'เช้า', 'ไม่มี'),
(550, '6320500611', 219, 13, 76, 700, 0, 'B+', 3.5, 1, 'เช้า', 'ไม่มี'),
(551, '6320500611', 220, 12, 76, 700, 0, 'C+', 2.5, 1, 'เช้า', 'ไม่มี'),
(552, '6320500611', 221, 9, 76, 700, 0, 'A', 4, 1, 'บ่าย', 'ไม่มี'),
(553, '6320500611', 222, 11, 76, 0, 712, 'A', 4, 1, 'ไม่มี', 'บ่าย'),
(554, '6320500611', 223, 1, 76, 700, 711, 'A', 4, 1, 'ไม่มี', 'ไม่มี'),
(555, '6320500654', 204, 9, 76, 700, 0, 'D+', 1.5, 1, 'เย็น', 'ไม่มี'),
(556, '6320500654', 219, 13, 76, 700, 0, 'C+', 2.5, 1, 'เช้า', 'ไม่มี'),
(557, '6320500654', 220, 12, 76, 700, 0, 'D', 1, 1, 'เช้า', 'ไม่มี'),
(558, '6320500654', 221, 9, 76, 700, 0, 'D+', 1.5, 1, 'บ่าย', 'ไม่มี'),
(559, '6320500654', 222, 11, 76, 0, 712, 'C+', 2.5, 1, 'ไม่มี', 'บ่าย'),
(560, '6320500654', 223, 1, 76, 700, 711, 'A', 4, 1, 'ไม่มี', 'ไม่มี'),
(561, '6320500611', 224, 14, 77, 700, 712, 'A', 4, 1, 'เช้า', 'บ่าย'),
(562, '6320500611', 225, 4, 77, 700, 0, 'A', 4, 1, 'เช้า', 'ไม่มี'),
(563, '6320500611', 226, 15, 77, 700, 0, 'A', 4, 1, 'เช้า', 'ไม่มี'),
(564, '6320500611', 227, 11, 77, 700, 0, 'A', 4, 1, 'บ่าย', 'ไม่มี'),
(565, '6320500611', 228, 10, 77, 700, 0, 'C+', 2.5, 1, 'เย็น', 'ไม่มี'),
(566, '6320500611', 229, 16, 77, 700, 0, 'A', 4, 1, 'เย็น', 'ไม่มี'),
(567, '6320500611', 230, 15, 77, 701, 0, 'B', 3, 1, 'เช้า', 'ไม่มี'),
(568, '6320500611', 231, 8, 77, 701, 0, 'A', 4, 1, 'เช้า', 'ไม่มี'),
(569, '6320500654', 244, 21, 77, 700, 0, 'F', 0, 1, 'บ่าย', 'ไม่มี'),
(570, '6320500654', 211, 22, 77, 0, 712, 'C', 2, 1, 'ไม่มี', 'บ่าย'),
(571, '6320500654', 212, 9, 77, 700, 0, 'F', 0, 1, 'บ่าย', 'ไม่มี'),
(572, '6320500654', 224, 14, 77, 700, 711, 'C', 2, 1, 'เช้า', 'เช้า'),
(573, '6320500654', 225, 4, 77, 700, 0, 'C', 2, 1, 'เช้า', 'ไม่มี'),
(574, '6320500654', 226, 15, 77, 700, 0, 'C+', 2.5, 1, 'เช้า', 'ไม่มี'),
(575, '6320500654', 228, 10, 77, 700, 0, 'C', 2, 1, 'เย็น', 'ไม่มี'),
(576, '6320500654', 230, 15, 77, 701, 0, 'D+', 1.5, 1, 'เช้า', 'ไม่มี'),
(577, '6320500654', 244, 23, 78, 700, 0, 'D+', 1.5, 1, 'เช้า', 'ไม่มี'),
(578, '6320500611', 232, 17, 79, 702, 0, 'B+', 3.5, 1, 'บ่าย', 'ไม่มี'),
(579, '6320500611', 234, 16, 79, 700, 0, 'A', 4, 1, 'เช้า', 'ไม่มี'),
(580, '6320500611', 235, 16, 79, 700, 0, 'A', 4, 1, 'บ่าย', 'ไม่มี'),
(581, '6320500611', 236, 16, 79, 700, 0, 'A', 4, 1, 'เย็น', 'ไม่มี'),
(582, '6320500654', 243, 19, 79, 700, 0, 'D', 1, 1, 'บ่าย', 'ไม่มี'),
(583, '6320500654', 232, 17, 79, 702, 0, 'C', 2, 1, 'บ่าย', 'ไม่มี'),
(584, '6320500654', 218, 17, 79, 700, 0, 'F', 0, 1, 'เช้า', 'ไม่มี'),
(585, '6320500654', 234, 16, 79, 700, 0, 'D+', 1.5, 1, 'เช้า', 'ไม่มี'),
(586, '6320500654', 242, 16, 79, 700, 0, 'D+', 1.5, 1, 'บ่าย', 'ไม่มี'),
(587, '6320500654', 236, 16, 79, 700, 0, 'B+', 3.5, 1, 'เย็น', 'ไม่มี');

-- --------------------------------------------------------

--
-- Table structure for table `fact_student`
--

CREATE TABLE `fact_student` (
  `studentId` varchar(10) NOT NULL,
  `schoolId` int(11) NOT NULL,
  `studentStatusId` int(11) NOT NULL,
  `departmentId` int(11) NOT NULL,
  `programId` int(11) NOT NULL,
  `teacherId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `tcasId` int(11) NOT NULL,
  `tcasYear` int(11) NOT NULL,
  `studyGeneretion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fact_student`
--

INSERT INTO `fact_student` (`studentId`, `schoolId`, `studentStatusId`, `departmentId`, `programId`, `teacherId`, `courseId`, `tcasId`, `tcasYear`, `studyGeneretion`) VALUES
('6320500611', 1, 1, 1, 1, 1, 1, 1, 2563, 63),
('6320500654', 1, 1, 1, 1, 1, 1, 1, 2563, 63);

-- --------------------------------------------------------

--
-- Table structure for table `fact_term_summary`
--

CREATE TABLE `fact_term_summary` (
  `termSummaryId` int(11) NOT NULL,
  `studentId` varchar(10) NOT NULL,
  `studentStatusId` int(11) NOT NULL,
  `creditTerm` int(11) NOT NULL,
  `gpaTerm` float NOT NULL,
  `gpaAll` float NOT NULL,
  `creditAll` int(11) NOT NULL,
  `studyYear` int(11) NOT NULL,
  `studyTerm` int(11) NOT NULL,
  `planStatus` varchar(15) NOT NULL,
  `generalSubjectCredit` int(11) DEFAULT NULL,
  `specificSubjectCredit` int(11) DEFAULT NULL,
  `freeSubjectCredit` int(11) DEFAULT NULL,
  `selectSubjectCredit` int(11) DEFAULT NULL,
  `generalSubjectCreditAll` int(11) DEFAULT NULL,
  `specificSubjectCreditAll` int(11) DEFAULT NULL,
  `freeSubjectCreditAll` int(11) DEFAULT NULL,
  `selectSubjectCreditAll` int(11) DEFAULT NULL,
  `gpaStatusId` int(11) NOT NULL,
  `gpaxStatusId` int(11) NOT NULL,
  `semesterId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fact_term_summary`
--

INSERT INTO `fact_term_summary` (`termSummaryId`, `studentId`, `studentStatusId`, `creditTerm`, `gpaTerm`, `gpaAll`, `creditAll`, `studyYear`, `studyTerm`, `planStatus`, `generalSubjectCredit`, `specificSubjectCredit`, `freeSubjectCredit`, `selectSubjectCredit`, `generalSubjectCreditAll`, `specificSubjectCreditAll`, `freeSubjectCreditAll`, `selectSubjectCreditAll`, `gpaStatusId`, `gpaxStatusId`, `semesterId`) VALUES
(56, '6320500611', 1, 19, 3.368, 3.368, 19, 1, 1, 'ตามแผน', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 70),
(57, '6320500654', 1, 19, 2.263, 2.263, 19, 1, 1, 'ไม่ตามแผน', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 70),
(58, '6320500611', 1, 22, 3.454, 3.414, 41, 1, 2, 'ตามแผน', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 71),
(59, '6320500654', 1, 19, 3.052, 2.657, 38, 1, 2, 'ไม่ตามแผน', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 71),
(60, '6320500611', 1, 6, 3.75, 3.457, 47, 2, 3, 'ตามแผน', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 72),
(61, '6320500654', 1, 6, 3.25, 2.738, 44, 2, 3, 'ไม่ตามแผน', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 72),
(62, '6320500611', 1, 20, 3.775, 3.552, 67, 2, 1, 'ตามแผน', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 73),
(63, '6320500654', 1, 20, 2.2, 2.57, 64, 2, 1, 'ไม่ตามแผน', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 73),
(64, '6320500611', 1, 18, 3.583, 3.558, 85, 2, 2, 'ตามแผน', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 74),
(65, '6320500654', 1, 14, 2.607, 2.576, 78, 2, 2, 'ไม่ตามแผน', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 74),
(66, '6320500654', 1, 3, 4, 2.629, 81, 3, 3, 'ไม่ตามแผน', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 75),
(67, '6320500611', 1, 17, 3.529, 3.553, 102, 3, 1, 'ตามแผน', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 76),
(68, '6320500654', 1, 16, 2.125, 2.546, 97, 3, 1, 'ไม่ตามแผน', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 76),
(69, '6320500611', 1, 22, 3.659, 3.572, 124, 3, 2, 'ไม่ตามแผน', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 77),
(70, '6320500654', 1, 22, 1.454, 2.344, 119, 3, 2, 'ไม่ตามแผน', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 77),
(71, '6320500654', 1, 3, 1.5, 2.323, 122, 4, 3, 'ไม่ตามแผน', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 78),
(72, '6320500611', 1, 11, 3.863, 3.596, 135, 4, 1, 'ตามแผน', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 79),
(73, '6320500654', 1, 17, 1.47, 2.219, 139, 4, 1, 'ไม่ตามแผน', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 79);

-- --------------------------------------------------------

--
-- Table structure for table `gpastatus`
--

CREATE TABLE `gpastatus` (
  `gpaStatusId` int(11) NOT NULL,
  `gpaStatusName` varchar(20) NOT NULL,
  `gpaMinInStatus` float NOT NULL,
  `gpaMaxStatus` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gpastatus`
--

INSERT INTO `gpastatus` (`gpaStatusId`, `gpaStatusName`, `gpaMinInStatus`, `gpaMaxStatus`) VALUES
(1, 'red', 0, 1.74999),
(2, 'orange', 1.75, 1.9999),
(3, 'green', 2, 3.2499),
(4, 'blue', 3.25, 4);

-- --------------------------------------------------------

--
-- Table structure for table `gpaxstatus`
--

CREATE TABLE `gpaxstatus` (
  `gpaxStatusId` int(11) NOT NULL,
  `gpaxStatusName` varchar(50) NOT NULL,
  `gpaxStatusMin` float NOT NULL,
  `gpaxStatusMax` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gpaxstatus`
--

INSERT INTO `gpaxstatus` (`gpaxStatusId`, `gpaxStatusName`, `gpaxStatusMin`, `gpaxStatusMax`) VALUES
(1, 'เกียรตินิยม', 3.25, 4),
(2, 'ปกติ', 1.76, 3.24),
(3, 'รอพินิจ', 1.51, 1.75),
(4, 'โปรต่ำ', 0, 1.5);

-- --------------------------------------------------------

--
-- Table structure for table `presubject`
--

CREATE TABLE `presubject` (
  `preSubjectId` int(11) NOT NULL,
  `subjectId` int(11) NOT NULL,
  `previousSubjectId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `programId` int(11) NOT NULL,
  `langProgram` varchar(20) NOT NULL,
  `nameProgram` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`programId`, `langProgram`, `nameProgram`) VALUES
(1, 'ภาษาไทย', 'ปกติ');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `provinceId` int(11) NOT NULL,
  `provinceName` varchar(50) NOT NULL,
  `regionId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`provinceId`, `provinceName`, `regionId`) VALUES
(1, 'กาญจนบุรี', 1);

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `regionId` int(11) NOT NULL,
  `regionName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`regionId`, `regionName`) VALUES
(1, 'ภาคกลาง'),
(2, 'ภาคใต้');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleId` int(11) NOT NULL,
  `roleNameTh` varchar(30) NOT NULL,
  `roleNameEng` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleId`, `roleNameTh`, `roleNameEng`) VALUES
(1, 'อาจารย์', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomId` int(11) NOT NULL,
  `roomName` varchar(10) NOT NULL,
  `building` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomId`, `roomName`, `building`) VALUES
(1, 'online', NULL),
(2, 'E6219', NULL),
(3, 'E9401', NULL),
(4, 'E9402', NULL),
(5, 'GYM 2', NULL),
(6, 'LH4-306', NULL),
(7, 'LH2-303', NULL),
(8, 'LH3-302', NULL),
(9, 'E9502', NULL),
(10, 'E8405', NULL),
(11, 'E8404', NULL),
(12, 'E4301', NULL),
(13, 'E4403', NULL),
(14, 'E6221', NULL),
(15, 'E9501', NULL),
(16, 'E8403', NULL),
(17, 'LH4-104', NULL),
(19, 'LH4-302', NULL),
(20, 'G COURT', NULL),
(21, 'LH4-101', NULL),
(22, 'E8406', NULL),
(23, 'LH3-304', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `schoolId` int(11) NOT NULL,
  `schoolName` varchar(150) NOT NULL,
  `provinceId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`schoolId`, `schoolName`, `provinceId`) VALUES
(1, 'โรงเรียนเฉลิมพระเกียรติ สมเด็จพระศรีนครินทร์ กาญจนบุรี', 1);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semesterId` int(11) NOT NULL,
  `semesterYear` int(11) NOT NULL,
  `semesterPart` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semesterId`, `semesterYear`, `semesterPart`) VALUES
(70, 2563, 'ภาคต้น'),
(71, 2563, 'ภาคปลาย'),
(72, 2564, 'ภาคฤดูร้อน'),
(73, 2564, 'ภาคต้น'),
(74, 2564, 'ภาคปลาย'),
(75, 2565, 'ภาคฤดูร้อน'),
(76, 2565, 'ภาคต้น'),
(77, 2565, 'ภาคปลาย'),
(78, 2566, 'ภาคฤดูร้อน'),
(79, 2566, 'ภาคต้น');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentId` varchar(10) NOT NULL,
  `studentUsername` varchar(11) DEFAULT NULL,
  `personId` varchar(13) DEFAULT NULL,
  `fisrtNameTh` varchar(50) NOT NULL,
  `lastNameTh` varchar(50) NOT NULL,
  `fisrtNameEng` varchar(50) NOT NULL,
  `lastNameEng` varchar(50) NOT NULL,
  `genderTh` enum('ชาย','หญิง') NOT NULL,
  `genderEng` enum('Male','Female') NOT NULL,
  `titleTh` enum('นาย','นางสาว','นาง') NOT NULL,
  `titleEng` enum('Mr.','Mrs.','Miss') NOT NULL,
  `tell` varchar(10) NOT NULL,
  `parentTell` varchar(10) DEFAULT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentId`, `studentUsername`, `personId`, `fisrtNameTh`, `lastNameTh`, `fisrtNameEng`, `lastNameEng`, `genderTh`, `genderEng`, `titleTh`, `titleEng`, `tell`, `parentTell`, `email`) VALUES
('6320500611', 'b6320500611', '1719900570113', 'ภานุวัฒน์', 'จั่นจินดา', 'Panuwat', 'Janjinda', 'ชาย', 'Male', 'นาย', 'Mr.', '0887598985', '0972079637', 'panuwat.janj@ku.th'),
('6320500654', 'b6320500654', NULL, 'ศุภชัย', 'สุขสมัย', 'Supachai', 'Suksamai', 'ชาย', 'Male', 'นาย', 'Mr.', '0887598985', '0972079637', 'supachai.suk@ku.th');

-- --------------------------------------------------------

--
-- Table structure for table `studentstatus`
--

CREATE TABLE `studentstatus` (
  `studentStatusId` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `studentstatus`
--

INSERT INTO `studentstatus` (`studentStatusId`, `status`) VALUES
(1, 'กำลังศึกษา'),
(2, 'จบการศึกษา'),
(3, 'พ้นสภาพนิสิต');

-- --------------------------------------------------------

--
-- Table structure for table `subcredit`
--

CREATE TABLE `subcredit` (
  `subCreditId` int(11) NOT NULL,
  `subjectId` int(11) NOT NULL,
  `lectureCredit` int(11) NOT NULL,
  `labCredit` int(11) NOT NULL,
  `lectureHours` int(11) NOT NULL,
  `labHours` int(11) NOT NULL,
  `bySelfHours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectId` int(11) NOT NULL,
  `subjectCode` varchar(20) NOT NULL,
  `subjectCourse` int(11) NOT NULL,
  `nameSubjectThai` varchar(100) NOT NULL,
  `nameSubjectEng` varchar(100) NOT NULL,
  `credit` int(11) NOT NULL,
  `subjectTypeId` int(11) NOT NULL,
  `subjectGroupId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectId`, `subjectCode`, `subjectCourse`, `nameSubjectThai`, `nameSubjectEng`, `credit`, `subjectTypeId`, `subjectGroupId`) VALUES
(181, '01355101', 59, 'ภาษาอังกฤษในชีวิตประจำวัน', 'English for Everyday Life', 3, 1, 3),
(182, '01417167', 60, 'คณิตศาสตร์วิศวกรรม I', 'Engineering Mathematics I', 3, 1, 12),
(183, '01420111', 56, 'ฟิสิกส์ทั่วไป I', 'General Physics I', 3, 1, 12),
(184, '01420113', 56, 'ปฏิบัติการฟิสิกส์ I', 'Laboratory in Physics I', 1, 2, 12),
(185, '01999021', 59, 'ภาษาไทยเพื่อการสื่อสาร', 'Thai Language for Communication', 3, 1, 3),
(186, '01999111', 59, 'ศาสตร์แห่งแผ่นดิน', 'Knowledge of the Land', 2, 1, 4),
(187, '02204171', 60, 'การเขียนโปรแกรมเชิงโครงสร้าง', 'Structured Programming', 3, 4, 12),
(188, '02999144', 59, 'ทักษะชีวิตการเป็นนิสิตมหาวิทยาลัย', 'Life Skill for Undergraduate Student', 1, 1, 4),
(189, '01175121', 59, 'บาสเกตบอลเพื่อสุขภาพ', 'Basketball for Health', 1, 2, 1),
(190, '01355102', 59, 'ภาษาอังกฤษในมหาวิทยาลัย', 'English for University Life', 3, 1, 3),
(191, '01417168', 60, 'คณิตศาสตร์วิศวกรรม II', 'Engineering Mathematics II', 3, 1, 12),
(192, '01420112', 56, 'ฟิสิกส์ทั่วไป II', 'General Physics II', 3, 1, 12),
(193, '01420114', 56, 'ปฏิบัติการฟิสิกส์ II', 'Laboratory in Physics II', 1, 2, 12),
(194, '02204111', 60, 'วิยุตคณิต', 'Discrete Mathematics', 3, 1, 13),
(195, '02204121', 60, 'หลักมูลดิจิทัล', 'Digital Fundamentals', 3, 1, 13),
(196, '02204122', 60, 'ปฏิบัติการหลักมูลดิจิทัล', 'Digital Fundamentals Laboratory', 1, 2, 13),
(197, '02204172', 60, 'การฝึกปฏิบัติทางการเขียนโปรแกรมและทักษะการแก้ปัญหา', 'Practicum in Programming and Problem Solving Skills', 1, 2, 13),
(198, '02708102', 59, 'วรรณกรรมกับวิทยาศาสตร์', 'Literature and Science', 3, 1, 5),
(199, '01175112', 64, 'แบดมินตันเพื่อสุขภาพ', 'Badminton for Health', 1, 2, 1),
(200, '01355103', 64, 'ภาษาอังกฤษเพื่อโอกาสในการทำงาน', 'English for Job Opportunities', 3, 1, 3),
(201, '01403114', 60, 'ปฏิบัติการหลักมูลเคมีทั่วไป', 'Laboratory in Fundamentals of General Chemistry', 1, 2, 12),
(202, '01417267', 60, 'คณิตศาสตร์วิศวกรรม III', 'Engineering Mathematics III', 3, 1, 12),
(203, '01999213', 64, 'สิ่งแวดล้อม เทคโนโลยี และชีวิต', 'Environment, Technology and Life', 3, 1, 1),
(204, '02204221', 60, 'วิศวกรรมไฟฟ้าสำหรับวิศวกรคอมพิวเตอร์', 'Electrical Engineering for Computer Engineer', 3, 1, 13),
(205, '02204231', 60, 'โครงสร้างข้อมูลและขั้นตอนวิธี I', 'Data Structures and Algorithms I', 3, 1, 13),
(206, '02204271', 60, 'การเขียนโปรแกรมเชิงวัตถุ', 'Object-Oriented Programming', 3, 4, 13),
(207, '01403117', 60, 'หลักมูลเคมีทั่วไป', 'Fundamentals of General Chemistry', 3, 1, 12),
(208, '03751111', 59, 'มนุษย์กับสิ่งแวดล้อม', 'Man and Environment', 3, 1, 4),
(209, '01208111', 60, 'การเขียนแบบวิศวกรรม', 'Engineering Drawing', 3, 4, 12),
(210, '01371111', 64, 'สื่อสารสนเทศเพื่อการเรียนรู้', 'Information Media for Learning', 1, 1, 3),
(211, '02204222', 60, 'ปฏิบัติการวิศวกรรมไฟฟ้าสำหรับวิศวกรคอมพิวเตอร์', 'Electrical Engineering for Computer Engineer Laboratory', 1, 2, 13),
(212, '02204223', 60, 'หลักมูลอิเล็กทรอนิกส์', 'Electronics Fundamentals', 3, 1, 13),
(213, '02204232', 60, 'โครงสร้างข้อมูลและขั้นตอนวิธี II', 'Data Structures and Algorithms II', 3, 1, 13),
(214, '02204241', 60, 'สถาปัตยกรรมคอมพิวเตอร์', 'Computer Architecture', 3, 1, 13),
(215, '02204272', 60, 'ค่ายพัฒนาซอฟต์แวร์', 'Software Development Camp', 1, 2, 13),
(216, '02204281', 60, 'การสื่อสารข้อมูลและระบบเครือข่ายคอมพิวเตอร์', 'Data Communications and Computer Network Systems', 3, 1, 13),
(217, '02204224', 60, 'ปฏิบัติการหลักมูลอิเล็กทรอนิกส์', 'Electronics Fundamentals Laboratory', 1, 2, 13),
(218, '02204311', 60, 'ความน่าจะเป็นและสถิติสำหรับวิศวกรคอมพิวเตอร์', 'Probability and Statistics for Computer Engineers', 3, 1, 13),
(219, '02204321', 60, 'สัญญาณและระบบ', 'Signals and Systems', 3, 1, 13),
(220, '02204351', 60, 'วิศวกรรมระบบปฏิบัติการ', 'Operating Systems Engineering', 3, 1, 13),
(221, '02204361', 60, 'การจัดการระบบฐานข้อมูล', 'Database Systems Management', 3, 1, 13),
(222, '02204381', 60, 'ปฏิบัติการสื่อสารข้อมูลและระบบเครือข่ายคอมพิวเตอร์', 'Data Communications and Computer Network Systems Laboratory', 1, 2, 13),
(223, '02738473', 61, 'การประยุกต์คอมพิวเตอร์ทางวิทยาศาสตร์ชีวภาพ', 'Computer Application in Biological Science', 3, 4, 14),
(224, '02204341', 60, 'ระบบฝังตัว', 'Embedded System', 3, 4, 13),
(225, '02204371', 60, 'วิศวกรรมซอฟต์แวร์', 'Software Engineering', 3, 1, 13),
(226, '02204372', 60, 'การบริหารจัดการเทคโนโลยีสารสนเทศ', 'Management of Information Technology', 3, 1, 13),
(227, '02204451', 60, 'สถาปัตยกรรมเชิงบริการ', 'Service Oriented Architectures', 3, 1, 11),
(228, '02204472', 60, 'การพัฒนาโมบายแอปพลิเคชัน', 'Mobile Application Development', 3, 1, 11),
(229, '02204497', 60, 'สัมมนา', 'Seminar', 1, 1, 13),
(230, '02206111', 65, 'วัสดุวิศวกรรม', 'Engineering Material', 3, 1, 12),
(231, '02714101', 64, 'การคิดเชิงวิพากษ์และการแก้ปัญหา', 'Critical Thinking and Problem Solving', 3, 1, 2),
(232, '01999041', 64, 'เศรษฐศาสตร์เพื่อการดำเนินชีวิตที่ดี', 'Economics For Better Living', 3, 1, 2),
(233, '02204390', 60, 'การเตรียมความพร้อมสหกิจศึกษา', 'Cooperative Education Preparation', 1, 1, 11),
(234, '02204433', 60, 'การรู้จำรูปแบบ', 'Pattern Recognition', 3, 1, 11),
(235, '02204452', 60, 'ระบบความปลอดภัยของข้อมูล', 'Data Security System', 3, 1, 11),
(236, '02204495', 60, 'โครงงานวิศวกรรมคอมพิวเตอร์ I', 'Computer Engineering Project I', 2, 1, 11),
(237, '02204461', 60, 'คลังข้อมูลและการทำเหมืองข้อมูล', 'Data Warehouse and Data Mining', 3, 1, 11),
(238, '02204499', 60, 'โครงงานวิศวกรรมคอมพิวเตอร์ II', 'Computer Engineering Project II', 2, 1, 11),
(239, '01175163', 59, 'กอล์ฟเพื่อสุขภาพ', 'Golf for Health', 1, 2, 1),
(240, '01175143', 64, 'การเต้นลีลาศเพื่อสุขภาพ', 'Social Dance for Health', 1, 2, 1),
(241, '01387101', 64, 'ศิลปะการอยู่ร่วมกับผู้อื่น', 'The Art of Living with Others', 3, 1, 1),
(242, '02204481', 60, 'การออกแบบโครงข่ายคอมพิวเตอร์', 'Computer Network Design', 3, 1, 11),
(243, '01417267', 65, 'คณิตศาสตร์วิศวกรรม III', 'Engineering Mathematics III', 3, 1, 12),
(244, '01417168', 65, 'คณิตศาสตร์วิศวกรรม II', 'Engineering Mathematics II', 3, 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `subjectcategory`
--

CREATE TABLE `subjectcategory` (
  `subjectCategoryId` int(11) NOT NULL,
  `subjectCategoryName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subjectcategory`
--

INSERT INTO `subjectcategory` (`subjectCategoryId`, `subjectCategoryName`) VALUES
(1, 'หมวดวิชาศึกษาทั่วไป'),
(2, 'หมวดวิชาเฉพาะ'),
(3, 'หมวดวิชาเลือกเสรี'),
(4, 'หมวดการฝึกงาน');

-- --------------------------------------------------------

--
-- Table structure for table `subjectdepartment`
--

CREATE TABLE `subjectdepartment` (
  `subjectDepartmentId` int(11) NOT NULL,
  `subjectId` int(11) NOT NULL,
  `departmentCode` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjectgroup`
--

CREATE TABLE `subjectgroup` (
  `subjectGroupId` int(11) NOT NULL,
  `subjectCategoryId` int(11) DEFAULT NULL,
  `subjectGroup` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subjectgroup`
--

INSERT INTO `subjectgroup` (`subjectGroupId`, `subjectCategoryId`, `subjectGroup`) VALUES
(1, 1, 'กลุ่มสาระอยู่ดีมีสุข'),
(2, 1, 'กลุ่มสาระศาสตร์แห่งผู้ประกอบการ'),
(3, 1, 'กลุ่มสาระภาษากับการสื่อสาร'),
(4, 1, 'กลุ่มสาระพลเมืองไทยและพลเมืองโลก'),
(5, 1, 'กลุ่มสาระสุนทรียศาสตร์'),
(6, 2, 'กลุ่มฮาร์ดแวร์และสถาปัตยกรรมคอมพิวเตอร์'),
(7, 2, 'กลุ่มโครงสร้างพื้นฐานของระบบ'),
(8, 2, 'กลุ่มเทคโนโลยีและวิธีการทางซอฟแวร์'),
(9, 2, 'กลุ่มเทคโนโลยีเพื่องานประยุกต์'),
(10, 2, 'กลุ่มการค้นคว้าอิสระ'),
(11, 2, 'วิชาเลือก'),
(12, 2, 'วิชาแกน'),
(13, 2, 'วิชาเฉพาะด้าน'),
(14, 1, 'วิชาเลือกเสรี'),
(15, 2, 'สหกิจศึกษา');

-- --------------------------------------------------------

--
-- Table structure for table `subjecttype`
--

CREATE TABLE `subjecttype` (
  `subjectTypeId` int(11) NOT NULL,
  `nameSubjectType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subjecttype`
--

INSERT INTO `subjecttype` (`subjectTypeId`, `nameSubjectType`) VALUES
(1, 'บรรยาย'),
(2, 'ปฏิบัติ'),
(3, 'สหกิจ'),
(4, 'บรรยาย + ปฏิบัติ');

-- --------------------------------------------------------

--
-- Table structure for table `tcas`
--

CREATE TABLE `tcas` (
  `tcasId` int(11) NOT NULL,
  `tcasRound` int(11) NOT NULL,
  `tcasName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tcas`
--

INSERT INTO `tcas` (`tcasId`, `tcasRound`, `tcasName`) VALUES
(1, 1, NULL),
(2, 2, NULL),
(3, 3, NULL),
(4, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacherId` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `teacherCode` varchar(10) DEFAULT NULL,
  `fisrtNameTh` varchar(50) NOT NULL,
  `titleTecherTh` varchar(10) NOT NULL,
  `lastNameTh` varchar(50) NOT NULL,
  `fisrtNameEng` varchar(50) NOT NULL,
  `lastNameEng` varchar(50) NOT NULL,
  `departmentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacherId`, `username`, `teacherCode`, `fisrtNameTh`, `titleTecherTh`, `lastNameTh`, `fisrtNameEng`, `lastNameEng`, `departmentId`) VALUES
(1, 'fengtps', NULL, 'ฐิติพงษ์', 'รศ.ดร.', 'สถิรเมธีกุล', '-', '-', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacherrole`
--

CREATE TABLE `teacherrole` (
  `teacherroleId` int(11) NOT NULL,
  `teacherId` int(11) NOT NULL,
  `roleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacherrole`
--

INSERT INTO `teacherrole` (`teacherroleId`, `teacherId`, `roleId`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `typeregis`
--

CREATE TABLE `typeregis` (
  `typeRegisId` int(11) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `typeregis`
--

INSERT INTO `typeregis` (`typeRegisId`, `type`) VALUES
(1, 'Credit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classtime`
--
ALTER TABLE `classtime`
  ADD PRIMARY KEY (`classTimeId`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseId`),
  ADD KEY `departmentId` (`departmentId`);

--
-- Indexes for table `coursecredit`
--
ALTER TABLE `coursecredit`
  ADD PRIMARY KEY (`courseCreditId`),
  ADD KEY `departmentId` (`departmentId`),
  ADD KEY `courseId` (`courseId`);

--
-- Indexes for table `coursecreditsubjectgroup`
--
ALTER TABLE `coursecreditsubjectgroup`
  ADD PRIMARY KEY (`coursecreditcourseCreditSubjectGroupGeneralSubjectId`),
  ADD KEY `subjectGroupId` (`subjectGroupId`),
  ADD KEY `courseId` (`courseId`);

--
-- Indexes for table `courselist`
--
ALTER TABLE `courselist`
  ADD PRIMARY KEY (`courseListId`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentId`);

--
-- Indexes for table `fact_regis`
--
ALTER TABLE `fact_regis`
  ADD PRIMARY KEY (`regisId`),
  ADD KEY `typeRegisId` (`typeRegisId`),
  ADD KEY `semesterId` (`semesterId`),
  ADD KEY `roomId` (`roomId`),
  ADD KEY `subjectId` (`subjectId`),
  ADD KEY `studentId` (`studentId`);

--
-- Indexes for table `fact_student`
--
ALTER TABLE `fact_student`
  ADD PRIMARY KEY (`studentId`,`schoolId`,`studentStatusId`,`departmentId`,`programId`,`teacherId`,`courseId`,`tcasId`),
  ADD KEY `schoolId` (`schoolId`),
  ADD KEY `studentStatusId` (`studentStatusId`),
  ADD KEY `programId` (`programId`),
  ADD KEY `tcasId` (`tcasId`),
  ADD KEY `departmentId` (`departmentId`),
  ADD KEY `teacherId` (`teacherId`),
  ADD KEY `courseId` (`courseId`);

--
-- Indexes for table `fact_term_summary`
--
ALTER TABLE `fact_term_summary`
  ADD PRIMARY KEY (`termSummaryId`),
  ADD KEY `studentId` (`studentId`),
  ADD KEY `studentStatusId` (`studentStatusId`),
  ADD KEY `gpaStatusId` (`gpaStatusId`),
  ADD KEY `semeterId` (`semesterId`),
  ADD KEY `gpaxStatusId` (`gpaxStatusId`);

--
-- Indexes for table `gpastatus`
--
ALTER TABLE `gpastatus`
  ADD PRIMARY KEY (`gpaStatusId`);

--
-- Indexes for table `gpaxstatus`
--
ALTER TABLE `gpaxstatus`
  ADD PRIMARY KEY (`gpaxStatusId`);

--
-- Indexes for table `presubject`
--
ALTER TABLE `presubject`
  ADD PRIMARY KEY (`preSubjectId`),
  ADD KEY `previousSubjectId` (`previousSubjectId`,`subjectId`),
  ADD KEY `subjectId` (`subjectId`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`programId`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`provinceId`),
  ADD KEY `regionId` (`regionId`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`regionId`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomId`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`schoolId`),
  ADD KEY `provinceId` (`provinceId`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semesterId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentId`);

--
-- Indexes for table `studentstatus`
--
ALTER TABLE `studentstatus`
  ADD PRIMARY KEY (`studentStatusId`);

--
-- Indexes for table `subcredit`
--
ALTER TABLE `subcredit`
  ADD PRIMARY KEY (`subCreditId`),
  ADD KEY `subjectId` (`subjectId`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectId`),
  ADD KEY `subjectGroupId` (`subjectGroupId`),
  ADD KEY `subjectTypeId` (`subjectTypeId`);

--
-- Indexes for table `subjectcategory`
--
ALTER TABLE `subjectcategory`
  ADD PRIMARY KEY (`subjectCategoryId`);

--
-- Indexes for table `subjectdepartment`
--
ALTER TABLE `subjectdepartment`
  ADD PRIMARY KEY (`subjectDepartmentId`),
  ADD KEY `subjectId` (`subjectId`);

--
-- Indexes for table `subjectgroup`
--
ALTER TABLE `subjectgroup`
  ADD PRIMARY KEY (`subjectGroupId`),
  ADD KEY `subjectCategoryId` (`subjectCategoryId`);

--
-- Indexes for table `subjecttype`
--
ALTER TABLE `subjecttype`
  ADD PRIMARY KEY (`subjectTypeId`);

--
-- Indexes for table `tcas`
--
ALTER TABLE `tcas`
  ADD PRIMARY KEY (`tcasId`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacherId`),
  ADD KEY `teacherId` (`teacherId`,`teacherCode`),
  ADD KEY `departmentId` (`departmentId`);

--
-- Indexes for table `teacherrole`
--
ALTER TABLE `teacherrole`
  ADD PRIMARY KEY (`teacherroleId`),
  ADD KEY `teacherId` (`teacherId`),
  ADD KEY `roleId` (`roleId`);

--
-- Indexes for table `typeregis`
--
ALTER TABLE `typeregis`
  ADD PRIMARY KEY (`typeRegisId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classtime`
--
ALTER TABLE `classtime`
  MODIFY `classTimeId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coursecredit`
--
ALTER TABLE `coursecredit`
  MODIFY `courseCreditId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coursecreditsubjectgroup`
--
ALTER TABLE `coursecreditsubjectgroup`
  MODIFY `coursecreditcourseCreditSubjectGroupGeneralSubjectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courselist`
--
ALTER TABLE `courselist`
  MODIFY `courseListId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fact_regis`
--
ALTER TABLE `fact_regis`
  MODIFY `regisId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=588;

--
-- AUTO_INCREMENT for table `fact_term_summary`
--
ALTER TABLE `fact_term_summary`
  MODIFY `termSummaryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `gpastatus`
--
ALTER TABLE `gpastatus`
  MODIFY `gpaStatusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gpaxstatus`
--
ALTER TABLE `gpaxstatus`
  MODIFY `gpaxStatusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `presubject`
--
ALTER TABLE `presubject`
  MODIFY `preSubjectId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `programId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `provinceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `regionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `roomId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `schoolId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semesterId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `subcredit`
--
ALTER TABLE `subcredit`
  MODIFY `subCreditId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subjectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `subjectcategory`
--
ALTER TABLE `subjectcategory`
  MODIFY `subjectCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subjectdepartment`
--
ALTER TABLE `subjectdepartment`
  MODIFY `subjectDepartmentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjectgroup`
--
ALTER TABLE `subjectgroup`
  MODIFY `subjectGroupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subjecttype`
--
ALTER TABLE `subjecttype`
  MODIFY `subjectTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tcas`
--
ALTER TABLE `tcas`
  MODIFY `tcasId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacherrole`
--
ALTER TABLE `teacherrole`
  MODIFY `teacherroleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `typeregis`
--
ALTER TABLE `typeregis`
  MODIFY `typeRegisId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`departmentId`) REFERENCES `department` (`departmentId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coursecredit`
--
ALTER TABLE `coursecredit`
  ADD CONSTRAINT `coursecredit_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `course` (`courseId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `coursecredit_ibfk_2` FOREIGN KEY (`departmentId`) REFERENCES `department` (`departmentId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coursecreditsubjectgroup`
--
ALTER TABLE `coursecreditsubjectgroup`
  ADD CONSTRAINT `coursecreditsubjectgroup_ibfk_1` FOREIGN KEY (`subjectGroupId`) REFERENCES `subjectgroup` (`subjectGroupId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `coursecreditsubjectgroup_ibfk_2` FOREIGN KEY (`courseId`) REFERENCES `course` (`courseId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fact_regis`
--
ALTER TABLE `fact_regis`
  ADD CONSTRAINT `fact_regis_ibfk_1` FOREIGN KEY (`typeRegisId`) REFERENCES `typeregis` (`typeRegisId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_regis_ibfk_2` FOREIGN KEY (`semesterId`) REFERENCES `semester` (`semesterId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_regis_ibfk_3` FOREIGN KEY (`roomId`) REFERENCES `room` (`roomId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_regis_ibfk_4` FOREIGN KEY (`subjectId`) REFERENCES `subject` (`subjectId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_regis_ibfk_8` FOREIGN KEY (`studentId`) REFERENCES `student` (`studentId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fact_student`
--
ALTER TABLE `fact_student`
  ADD CONSTRAINT `fact_student_ibfk_1` FOREIGN KEY (`schoolId`) REFERENCES `school` (`schoolId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_student_ibfk_2` FOREIGN KEY (`studentStatusId`) REFERENCES `studentstatus` (`studentStatusId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_student_ibfk_3` FOREIGN KEY (`programId`) REFERENCES `program` (`programId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_student_ibfk_4` FOREIGN KEY (`tcasId`) REFERENCES `tcas` (`tcasId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_student_ibfk_6` FOREIGN KEY (`departmentId`) REFERENCES `department` (`departmentId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_student_ibfk_7` FOREIGN KEY (`teacherId`) REFERENCES `teacher` (`teacherId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_student_ibfk_8` FOREIGN KEY (`courseId`) REFERENCES `course` (`courseId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_student_ibfk_9` FOREIGN KEY (`studentId`) REFERENCES `student` (`studentId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fact_term_summary`
--
ALTER TABLE `fact_term_summary`
  ADD CONSTRAINT `fact_term_summary_ibfk_1` FOREIGN KEY (`gpaStatusId`) REFERENCES `gpastatus` (`gpaStatusId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_term_summary_ibfk_3` FOREIGN KEY (`studentStatusId`) REFERENCES `studentstatus` (`studentStatusId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_term_summary_ibfk_4` FOREIGN KEY (`semesterId`) REFERENCES `semester` (`semesterId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_term_summary_ibfk_5` FOREIGN KEY (`studentId`) REFERENCES `student` (`studentId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_term_summary_ibfk_6` FOREIGN KEY (`gpaxStatusId`) REFERENCES `gpaxstatus` (`gpaxStatusId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `presubject`
--
ALTER TABLE `presubject`
  ADD CONSTRAINT `presubject_ibfk_1` FOREIGN KEY (`subjectId`) REFERENCES `subject` (`subjectId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `presubject_ibfk_2` FOREIGN KEY (`previousSubjectId`) REFERENCES `subject` (`subjectId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `province`
--
ALTER TABLE `province`
  ADD CONSTRAINT `province_ibfk_1` FOREIGN KEY (`regionId`) REFERENCES `region` (`regionId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `school`
--
ALTER TABLE `school`
  ADD CONSTRAINT `school_ibfk_1` FOREIGN KEY (`provinceId`) REFERENCES `province` (`provinceId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcredit`
--
ALTER TABLE `subcredit`
  ADD CONSTRAINT `subcredit_ibfk_1` FOREIGN KEY (`subjectId`) REFERENCES `subject` (`subjectId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`subjectGroupId`) REFERENCES `subjectgroup` (`subjectGroupId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_ibfk_2` FOREIGN KEY (`subjectTypeId`) REFERENCES `subjecttype` (`subjectTypeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjectdepartment`
--
ALTER TABLE `subjectdepartment`
  ADD CONSTRAINT `subjectdepartment_ibfk_1` FOREIGN KEY (`subjectId`) REFERENCES `subject` (`subjectId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjectgroup`
--
ALTER TABLE `subjectgroup`
  ADD CONSTRAINT `subjectgroup_ibfk_1` FOREIGN KEY (`subjectCategoryId`) REFERENCES `subjectcategory` (`subjectCategoryId`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`departmentId`) REFERENCES `department` (`departmentId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacherrole`
--
ALTER TABLE `teacherrole`
  ADD CONSTRAINT `teacherrole_ibfk_1` FOREIGN KEY (`teacherId`) REFERENCES `teacher` (`teacherId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacherrole_ibfk_2` FOREIGN KEY (`roleId`) REFERENCES `role` (`roleId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
