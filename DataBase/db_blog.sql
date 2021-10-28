-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2021 lúc 04:34 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_blog`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_offices`
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
-- Đang đổ dữ liệu cho bảng `db_offices`
--

INSERT INTO `db_offices` (`office_id`, `office_name`, `office_phone`, `office_email`, `office_website`, `office_address`, `office_parent`) VALUES
(1, 'Khoa CNTT', '0243555666', '0243555666', 'cntt.tlu.edu.vn', 'Nhà C1 - Trường ĐHTL', NULL),
(2, 'Khoa Kinh tế', '0243555777', 'kinhte@tlu.edu.vn', 'kinhte.tlu.edu.vn\r\n', 'Nhà B1 - Trường ĐHTL', NULL),
(3, 'Bộ môn HTTT', '0243555888', 'httt@tlu.edu.vn', NULL, 'Phòng 201 - Nhà C1 - Trường ĐHTL', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_users`
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

--
-- Đang đổ dữ liệu cho bảng `db_users`
--

INSERT INTO `db_users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_regis_date`, `user_status`, `user_level`, `user_code`) VALUES
<<<<<<< HEAD
(19, 'thuyduong', 'nguyenthuyduong542001@gmail.com', '$2y$10$r/XRsf/8kAJ/a9MKo0doMeaIUwpjGvIomEul37J737a4AmUoBQBLW', '2021-10-27 15:08:42', 0, 0, 'a9f03c0f1e757a946d1c3f31f1b90636'),
(20, 'Ngô Đức Tâm', '123@gmail.com', '$2y$10$cMPyQnPegdF7kXommXUaK.egvFBDmPnWR3EAgEnNtihZ1mssuyZ3.', '2021-10-27 21:50:02', 0, 0, '166baecfa4ada65a7cdb2e02952e0f48'),
(21, 'ngoductam', '234@gmail.com', '$2y$10$pyLBEz7FKAEx5iJcvWR5ludGdMd3BAy4p2IGNug1bT43Ro9Je.xfu', '2021-10-27 21:51:21', 0, 0, '5181754278ea5a0855a8fdc5a6e35288');
=======
(19, 'thuyduong', 'nguyenthuyduong542001@gmail.com', '$2y$10$r/XRsf/8kAJ/a9MKo0doMeaIUwpjGvIomEul37J737a4AmUoBQBLW', '2021-10-27 15:08:42', 0, 0, 'a9f03c0f1e757a946d1c3f31f1b90636');
>>>>>>> 1248c401932b035e9ed9a1b51840e508e45b669e

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_user_inf`
--

CREATE TABLE `db_user_inf` (
  `ID` int(10) UNSIGNED NOT NULL,
  `User_FullName` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_Position` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_Phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_id` int(10) UNSIGNED DEFAULT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `db_offices`
--
ALTER TABLE `db_offices`
  ADD PRIMARY KEY (`office_id`),
  ADD KEY `office_parent` (`office_parent`);

--
-- Chỉ mục cho bảng `db_users`
--
ALTER TABLE `db_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Chỉ mục cho bảng `db_user_inf`
--
ALTER TABLE `db_user_inf`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `office_id` (`office_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `db_offices`
--
ALTER TABLE `db_offices`
  MODIFY `office_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `db_users`
--
ALTER TABLE `db_users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `db_user_inf`
--
ALTER TABLE `db_user_inf`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `db_offices`
--
ALTER TABLE `db_offices`
  ADD CONSTRAINT `db_offices_ibfk_1` FOREIGN KEY (`office_parent`) REFERENCES `db_offices` (`office_id`);

--
-- Các ràng buộc cho bảng `db_user_inf`
--
ALTER TABLE `db_user_inf`
  ADD CONSTRAINT `db_user_inf_ibfk_1` FOREIGN KEY (`office_id`) REFERENCES `db_offices` (`office_id`),
  ADD CONSTRAINT `db_user_inf_ibfk_2` FOREIGN KEY (`ID`) REFERENCES `db_users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;