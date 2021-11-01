-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2021 at 01:30 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_doc`
--

CREATE TABLE `db_doc` (
  `doc_ID` int(10) UNSIGNED NOT NULL,
  `doc_name` varchar(100) NOT NULL,
  `doc_link` varchar(100) NOT NULL,
  `date_sub` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10000) DEFAULT NULL,
  `teach_learn_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_doc`
--

INSERT INTO `db_doc` (`doc_ID`, `doc_name`, `doc_link`, `date_sub`, `status`, `teach_learn_id`) VALUES
(15, 'Test1', 'https://www.facebook.com/', '2021-11-01', 'Thử nghiệm 1', 1),
(16, 'Test2', 'http://localhost/phpmyadmin/index.php', '2021-11-01', 'Thử nghiệm 2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_note`
--

CREATE TABLE `db_note` (
  `note_id` int(10) UNSIGNED NOT NULL,
  `note_mes` varchar(5000) DEFAULT NULL,
  `teach_learn_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_note`
--

INSERT INTO `db_note` (`note_id`, `note_mes`, `teach_learn_id`) VALUES
(1, 'Ngày thi 6/11/2021\r\n7h thi.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_offices`
--

CREATE TABLE `db_offices` (
  `office_id` int(10) UNSIGNED NOT NULL,
  `office_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_website` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_parent` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `db_offices`
--

INSERT INTO `db_offices` (`office_id`, `office_name`, `office_phone`, `office_email`, `office_website`, `office_address`, `office_parent`) VALUES
(1, 'Khoa CNTT', '0243555666', '0243555666', 'cntt.tlu.edu.vn', 'Nhà C1 - Trường ĐHTL', NULL),
(2, 'Khoa Kinh tế', '0243555777', 'kinhte@tlu.edu.vn', 'kinhte.tlu.edu.vn\r\n', 'Nhà B1 - Trường ĐHTL', NULL),
(3, 'Bộ môn HTTT', '0243555888', 'httt@tlu.edu.vn', NULL, 'Phòng 201 - Nhà C1 - Trường ĐHTL', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_subjects`
--

CREATE TABLE `db_subjects` (
  `sub_id` int(10) UNSIGNED NOT NULL,
  `sub_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_subjects`
--

INSERT INTO `db_subjects` (`sub_id`, `sub_name`) VALUES
(1, 'Công nghệ web'),
(2, 'Mạng máy tính'),
(3, 'Lập trình nâng cao'),
(10, 'Giải tích 1');

-- --------------------------------------------------------

--
-- Table structure for table `db_teach_learn`
--

CREATE TABLE `db_teach_learn` (
  `teach_learn_id` int(10) UNSIGNED NOT NULL,
  `user_id_inf` int(10) UNSIGNED NOT NULL,
  `sub_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_teach_learn`
--

INSERT INTO `db_teach_learn` (`teach_learn_id`, `user_id_inf`, `sub_id`) VALUES
(1, 30, 1),
(2, 30, 10);

-- --------------------------------------------------------

--
-- Table structure for table `db_users`
--

CREATE TABLE `db_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_pass` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_regis_date` datetime DEFAULT current_timestamp(),
  `user_status` tinyint(1) DEFAULT 0,
  `user_level` int(1) DEFAULT 0,
  `user_code` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `db_users`
--

INSERT INTO `db_users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_regis_date`, `user_status`, `user_level`, `user_code`) VALUES
(30, 'abc', 'abc@gmail.com', '$2y$10$YvDo31xFwimk/Wvj54DOROcBzvXKyRNhmwDPx4UA6W9635HCH/Un.', '2021-11-01 08:28:07', 1, 1, '58b68ab05d41ce01c94336ae441d7b73'),
(31, 'Sinhvien', 'abcd@gmail.com', '$2y$10$YvDo31xFwimk/Wvj54DOROcBzvXKyRNhmwDPx4UA6W9635HCH/Un.', '2021-11-01 08:28:07', 1, 2, '58b68ab05d41ce01c94336ae441d7b73');

-- --------------------------------------------------------

--
-- Table structure for table `db_user_inf`
--

CREATE TABLE `db_user_inf` (
  `ID` int(10) UNSIGNED NOT NULL,
  `User_FullName` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_Position` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_Phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `db_user_inf`
--

INSERT INTO `db_user_inf` (`ID`, `User_FullName`, `User_Position`, `User_Phone`, `office_id`) VALUES
(30, 'abc', 'hello\r\n', '123', 1),
(31, 'abcd', 'hellod\r\n', '1233', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_doc`
--
ALTER TABLE `db_doc`
  ADD PRIMARY KEY (`doc_ID`),
  ADD KEY `teach_learn_id` (`teach_learn_id`);

--
-- Indexes for table `db_note`
--
ALTER TABLE `db_note`
  ADD PRIMARY KEY (`note_id`),
  ADD KEY `teach_learn_id` (`teach_learn_id`);

--
-- Indexes for table `db_offices`
--
ALTER TABLE `db_offices`
  ADD PRIMARY KEY (`office_id`),
  ADD KEY `office_parent` (`office_parent`);

--
-- Indexes for table `db_subjects`
--
ALTER TABLE `db_subjects`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `db_teach_learn`
--
ALTER TABLE `db_teach_learn`
  ADD PRIMARY KEY (`teach_learn_id`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `user_id` (`user_id_inf`);

--
-- Indexes for table `db_users`
--
ALTER TABLE `db_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD UNIQUE KEY `user_name_2` (`user_name`,`user_email`);

--
-- Indexes for table `db_user_inf`
--
ALTER TABLE `db_user_inf`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `office_id` (`office_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_doc`
--
ALTER TABLE `db_doc`
  MODIFY `doc_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `db_note`
--
ALTER TABLE `db_note`
  MODIFY `note_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_offices`
--
ALTER TABLE `db_offices`
  MODIFY `office_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `db_subjects`
--
ALTER TABLE `db_subjects`
  MODIFY `sub_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `db_teach_learn`
--
ALTER TABLE `db_teach_learn`
  MODIFY `teach_learn_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `db_users`
--
ALTER TABLE `db_users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `db_user_inf`
--
ALTER TABLE `db_user_inf`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `db_doc`
--
ALTER TABLE `db_doc`
  ADD CONSTRAINT `db_doc_ibfk_1` FOREIGN KEY (`teach_learn_id`) REFERENCES `db_teach_learn` (`teach_learn_id`);

--
-- Constraints for table `db_note`
--
ALTER TABLE `db_note`
  ADD CONSTRAINT `db_note_ibfk_1` FOREIGN KEY (`teach_learn_id`) REFERENCES `db_teach_learn` (`teach_learn_id`);

--
-- Constraints for table `db_offices`
--
ALTER TABLE `db_offices`
  ADD CONSTRAINT `db_offices_ibfk_1` FOREIGN KEY (`office_parent`) REFERENCES `db_offices` (`office_id`);

--
-- Constraints for table `db_teach_learn`
--
ALTER TABLE `db_teach_learn`
  ADD CONSTRAINT `db_teach_learn_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `db_subjects` (`sub_id`),
  ADD CONSTRAINT `db_teach_learn_ibfk_2` FOREIGN KEY (`user_id_inf`) REFERENCES `db_user_inf` (`ID`);

--
-- Constraints for table `db_user_inf`
--
ALTER TABLE `db_user_inf`
  ADD CONSTRAINT `db_user_inf_ibfk_1` FOREIGN KEY (`office_id`) REFERENCES `db_offices` (`office_id`),
  ADD CONSTRAINT `db_user_inf_ibfk_2` FOREIGN KEY (`ID`) REFERENCES `db_users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
