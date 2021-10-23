-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 23, 2021 lúc 05:33 AM
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
  `user_code` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inf_ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_user_inf`
--

CREATE TABLE `db_user_inf` (
  `ID` int(10) UNSIGNED NOT NULL,
  `User_FullName` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_Position` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_Phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_id` int(10) UNSIGNED DEFAULT NULL
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
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD KEY `inf_ID` (`inf_ID`);

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
  MODIFY `office_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `db_users`
--
ALTER TABLE `db_users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `db_user_inf`
--
ALTER TABLE `db_user_inf`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `db_offices`
--
ALTER TABLE `db_offices`
  ADD CONSTRAINT `db_offices_ibfk_1` FOREIGN KEY (`office_parent`) REFERENCES `db_offices` (`office_id`);

--
-- Các ràng buộc cho bảng `db_users`
--
ALTER TABLE `db_users`
  ADD CONSTRAINT `db_users_ibfk_1` FOREIGN KEY (`inf_ID`) REFERENCES `db_user_inf` (`ID`);

--
-- Các ràng buộc cho bảng `db_user_inf`
--
ALTER TABLE `db_user_inf`
  ADD CONSTRAINT `db_user_inf_ibfk_1` FOREIGN KEY (`office_id`) REFERENCES `db_offices` (`office_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
