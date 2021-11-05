-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2021 at 07:18 AM
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
  `doc_link` varchar(1000) NOT NULL,
  `date_sub` date NOT NULL DEFAULT current_timestamp(),
  `status` text DEFAULT NULL,
  `teach_learn_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_doc`
--

INSERT INTO `db_doc` (`doc_ID`, `doc_name`, `doc_link`, `date_sub`, `status`, `teach_learn_id`) VALUES
(21, 'Helloword', 'https://vi.wikipedia.org/wiki/Hello_World_(phim)', '2021-11-05', NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `db_note`
--

CREATE TABLE `db_note` (
  `note_id` int(10) UNSIGNED NOT NULL,
  `note_mes` text DEFAULT NULL,
  `teach_learn_id` int(10) UNSIGNED NOT NULL,
  `node_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_note`
--

INSERT INTO `db_note` (`note_id`, `note_mes`, `teach_learn_id`, `node_date`) VALUES
(11, 'Hello word', 5, '2021-11-05');

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
(4, 51, 2),
(5, 31, 2),
(6, 31, 1);

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
(30, 'admin', 'abc@gmail.com', '$2y$10$YvDo31xFwimk/Wvj54DOROcBzvXKyRNhmwDPx4UA6W9635HCH/Un.', '2021-11-01 08:28:07', 1, 0, '58b68ab05d41ce01c94336ae441d7b73'),
(31, 'Sinhvien', 'abcd@gmail.com', '$2y$10$U8k3a101QxJIeEMUI9826OOpdFqeoYDSIUn8w73UNT9VqNp1WqGWm', '2021-11-01 08:28:07', 1, 2, '58b68ab05d41ce01c94336ae441d7b73'),
(51, 'SinhvienA', 'ngotamcv01@gmail.com', '$2y$10$lp3/rGkmXq.hsEwC4Sgp3.yT2lvr/xl1CjqxgLBmRN9OJhkDuCGqu', '2021-11-05 11:41:52', 1, 2, '09dc9e7bb496425042c455c3528db2d4');

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
(30, 'Tên admin', 'admin\n', '123', 1),
(31, 'Sinh viên', 'Sinh viên', '1233', 1),
(51, 'Ngô Đức Tâm', 'Sinh Viên', '0766366726', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) DEFAULT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_sender_name` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`) VALUES
(74, 0, '  a', 'Ngô Đức Tâm', '2021-11-04 23:15:45'),
(75, 0, '  a', 'BTL_CNW', '2021-11-04 23:17:50'),
(76, 0, '  ádfghj', 'Ngô Đức Tâm', '2021-11-04 23:21:16'),
(77, 76, 'asdfg\r\n', 'd', '2021-11-04 23:21:30'),
(78, 0, '  ấ', 's', '2021-11-04 23:23:36'),
(79, 75, '  a', 's', '2021-11-04 23:41:42'),
(80, 74, '  ad', 'da', '2021-11-04 23:42:36');

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
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_doc`
--
ALTER TABLE `db_doc`
  MODIFY `doc_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `db_note`
--
ALTER TABLE `db_note`
  MODIFY `note_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `teach_learn_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `db_users`
--
ALTER TABLE `db_users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

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
