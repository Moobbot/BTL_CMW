-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2021 at 06:02 PM
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
  `sub_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_doc`
--

INSERT INTO `db_doc` (`doc_ID`, `doc_name`, `doc_link`, `date_sub`, `status`, `sub_id`) VALUES
(5, 'Công nghệ web', 'https://vietcodedi.com/', '2021-10-31', 'Link trang học', 1),
(6, 'front end', 'https://roadmap.sh/frontend', '2021-10-31', 'Learn to become a modern frontend developer', 1),
(7, 'github', 'https://github.com/', '2021-10-31', 'dịch vụ cung cấp kho lưu trữ mã nguồn Git dựa trên nền web cho các dự án phát triển phần mềm. ', 1),
(8, 'backend', 'https://roadmap.sh/backend', '2021-10-31', 'Learn to become a modern backend developer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_notify`
--

CREATE TABLE `db_notify` (
  `id` int(10) NOT NULL,
  `Mes_content` varchar(5000) NOT NULL,
  `sub_id` int(10) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `sub_id` int(10) NOT NULL,
  `sub_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_subjects`
--

INSERT INTO `db_subjects` (`sub_id`, `sub_name`) VALUES
(1, 'Công nghệ web');

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
  `user_level` tinyint(1) DEFAULT 0,
  `user_code` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_user_inf`
--

CREATE TABLE `db_user_inf` (
  `ID` int(10) UNSIGNED NOT NULL,
  `User_FullName` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_Position` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_Phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_id` int(10) UNSIGNED DEFAULT NULL,
  `sub_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_doc`
--
ALTER TABLE `db_doc`
  ADD PRIMARY KEY (`doc_ID`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `db_notify`
--
ALTER TABLE `db_notify`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `user_id` (`user_id`);

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
  ADD KEY `office_id` (`office_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_doc`
--
ALTER TABLE `db_doc`
  MODIFY `doc_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `db_notify`
--
ALTER TABLE `db_notify`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_offices`
--
ALTER TABLE `db_offices`
  MODIFY `office_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `db_subjects`
--
ALTER TABLE `db_subjects`
  MODIFY `sub_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_users`
--
ALTER TABLE `db_users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `db_user_inf`
--
ALTER TABLE `db_user_inf`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `db_doc`
--
ALTER TABLE `db_doc`
  ADD CONSTRAINT `db_doc_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `db_subjects` (`sub_id`);

--
-- Constraints for table `db_notify`
--
ALTER TABLE `db_notify`
  ADD CONSTRAINT `db_notify_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `db_subjects` (`sub_id`),
  ADD CONSTRAINT `db_notify_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `db_users` (`user_id`);

--
-- Constraints for table `db_offices`
--
ALTER TABLE `db_offices`
  ADD CONSTRAINT `db_offices_ibfk_1` FOREIGN KEY (`office_parent`) REFERENCES `db_offices` (`office_id`);

--
-- Constraints for table `db_user_inf`
--
ALTER TABLE `db_user_inf`
  ADD CONSTRAINT `db_user_inf_ibfk_1` FOREIGN KEY (`office_id`) REFERENCES `db_offices` (`office_id`),
  ADD CONSTRAINT `db_user_inf_ibfk_2` FOREIGN KEY (`ID`) REFERENCES `db_users` (`user_id`),
  ADD CONSTRAINT `db_user_inf_ibfk_3` FOREIGN KEY (`sub_id`) REFERENCES `db_subjects` (`sub_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
