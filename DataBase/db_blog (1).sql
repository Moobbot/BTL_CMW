-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 04, 2021 lúc 04:57 PM
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
-- Cấu trúc bảng cho bảng `db_doc`
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
-- Đang đổ dữ liệu cho bảng `db_doc`
--

INSERT INTO `db_doc` (`doc_ID`, `doc_name`, `doc_link`, `date_sub`, `status`, `teach_learn_id`) VALUES
(15, 'Test1', 'https://www.facebook.com/', '2021-11-01', 'Thử nghiệm 1', 1),
(16, 'Test2', 'http://localhost/phpmyadmin/index.php', '2021-11-01', 'Thử nghiệm 2', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_note`
--

CREATE TABLE `db_note` (
  `note_id` int(10) UNSIGNED NOT NULL,
  `note_mes` varchar(5000) DEFAULT NULL,
  `teach_learn_id` int(10) UNSIGNED NOT NULL,
  `node_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `db_note`
--

INSERT INTO `db_note` (`note_id`, `note_mes`, `teach_learn_id`, `node_date`) VALUES
(2, 'Xin chào', 1, '2021-11-03'),
(3, 'Đi đi', 2, '2021-11-03');

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
-- Cấu trúc bảng cho bảng `db_subjects`
--

CREATE TABLE `db_subjects` (
  `sub_id` int(10) UNSIGNED NOT NULL,
  `sub_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `db_subjects`
--

INSERT INTO `db_subjects` (`sub_id`, `sub_name`) VALUES
(1, 'Công nghệ web'),
(2, 'Mạng máy tính'),
(3, 'Lập trình nâng cao'),
(10, 'Giải tích 1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_teach_learn`
--

CREATE TABLE `db_teach_learn` (
  `teach_learn_id` int(10) UNSIGNED NOT NULL,
  `user_id_inf` int(10) UNSIGNED NOT NULL,
  `sub_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `db_teach_learn`
--

INSERT INTO `db_teach_learn` (`teach_learn_id`, `user_id_inf`, `sub_id`) VALUES
(1, 30, 1),
(2, 30, 10);

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
  `user_level` int(1) DEFAULT 0,
  `user_code` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_users`
--

INSERT INTO `db_users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_regis_date`, `user_status`, `user_level`, `user_code`) VALUES
(30, 'abc', 'abc@gmail.com', '$2y$10$YvDo31xFwimk/Wvj54DOROcBzvXKyRNhmwDPx4UA6W9635HCH/Un.', '2021-11-01 08:28:07', 1, 1, '58b68ab05d41ce01c94336ae441d7b73'),
(31, 'Sinhvien', 'abcd@gmail.com', '$2y$10$U8k3a101QxJIeEMUI9826OOpdFqeoYDSIUn8w73UNT9VqNp1WqGWm', '2021-11-01 08:28:07', 1, 2, '58b68ab05d41ce01c94336ae441d7b73'),
(33, 'abc1', 'abc1@gmail.com', '$2y$10$YvDo31xFwimk/Wvj54DOROcBzvXKyRNhmwDPx4UA6W9635HCH/Un.', '2021-11-01 08:28:07', 1, 1, '58b68ab05d41ce01c94336ae441d7b73'),
(34, 'abc2', 'abc2@gmail.com', '$2y$10$YvDo31xFwimk/Wvj54DOROcBzvXKyRNhmwDPx4UA6W9635HCH/Un.', '2021-11-01 08:28:07', 1, 1, '58b68ab05d41ce01c94336ae441d7b73'),
(35, 'abc3', 'abc3@gmail.com', '$2y$10$YvDo31xFwimk/Wvj54DOROcBzvXKyRNhmwDPx4UA6W9635HCH/Un.', '2021-11-01 08:28:07', 1, 1, '58b68ab05d41ce01c94336ae441d7b73'),
(36, '123124234234', 'conlonkien@gmail.com', '$2y$10$1hJMmpT/ycV9prtlCNu2b.6r07rmC0.TRL6fHRAo1j0aWsw4eT/.6', '2021-11-03 22:08:06', 0, 1, 'c948cd1eeea7182a960b0be9ceac384f'),
(37, '1412343241231421312344', 'dungngunua45@gmail.com', '$2y$10$prKEBPaKXeGvJodsITyx/Oqra/xXqIT1NHH4dAiC334XXAzUim6UO', '2021-11-04 13:36:54', 0, 1, '48a4997862ece943424390a00768c375'),
(38, 'duonghehhe', 'phamquangduong542001@gmail.com', '$2y$10$kUP/PBxCDcBT1KNjHHK5DO.dXJV12X1gtGvmj7yIgkuqubDGJ.zmO', '2021-11-04 19:34:55', 1, 0, '9a9a7e9011d6add8bce86be87f09619d');

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
-- Đang đổ dữ liệu cho bảng `db_user_inf`
--

INSERT INTO `db_user_inf` (`ID`, `User_FullName`, `User_Position`, `User_Phone`, `office_id`) VALUES
(30, 'abc', 'hello\r\n', '123', 1),
(31, 'abcd', 'hellod\r\n', '1233', 1),
(33, 'abc1', 'hello\r\n', '123', 1),
(34, 'abc2', 'hello\r\n', '123', 1),
(35, 'abc3', 'hello\r\n', '123', 1),
(36, 'Kiên cute', 'Giảng Viên', '0867856505', 1),
(37, 'nguyễn minh hiếu', 'Giảng Viên', '0867856505', 1),
(38, 'Phạm Quang Dương', 'Sinh Viên', '01666249530', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `review_table`
--

INSERT INTO `review_table` (`review_id`, `user_name`, `user_rating`, `user_review`, `datetime`) VALUES
(6, 'John Smith', 4, 'Nice Product, Value for money', 1621935691),
(7, 'Peter Parker', 5, 'Nice Product with Good Feature.', 1621939888),
(8, 'Donna Hubber', 1, 'Worst Product, lost my money.', 1621940010),
(9, 'phamquangduong', 5, '12134132', 1635994260),
(10, 'phamquangduong', 5, 'Nice', 1635994269),
(11, 'phamquangduong', 4, 'Nice', 1636006649),
(12, 'phamquangduong', 4, '123214', 1636030693),
(13, 'phamquangduong', 3, '123', 1636037764);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) DEFAULT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_sender_name` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`) VALUES
(30, 0, '  THầy đẹp trai quá\r\n', 'Phạm Dương', '2021-11-03 09:18:15'),
(31, 30, 'Ừ cảm ơn em', 'Thầy', '2021-11-03 09:18:26'),
(32, 31, 'em cũng cảm ơn thầy\r\n', 'DƯơng', '2021-11-03 09:18:40'),
(33, 0, 'Bài hay quá', 'Phạm Dương', '2021-11-03 09:19:16'),
(34, 0, '  324321', 'Phạm Dương', '2021-11-03 10:03:26'),
(35, 0, '  1423', 'Phạm Dương', '2021-11-04 00:34:54'),
(36, 0, '1234123412341234123', 'Phạm Dương', '2021-11-04 00:35:00'),
(37, 0, '  321423412', 'Phạm Dương', '2021-11-04 09:38:36'),
(38, 0, '12341234', 'Phạm Quang Dương', '2021-11-04 09:38:41'),
(39, 0, 'aaaaaaaaaaaaaaaaaaa', 'Phạm Dương', '2021-11-04 09:38:47'),
(40, 0, '  r1241231234', 'Phạm Dương', '2021-11-04 09:42:58'),
(41, 0, '  r1241231234', 'Phạm Dương', '2021-11-04 09:42:58');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `db_doc`
--
ALTER TABLE `db_doc`
  ADD PRIMARY KEY (`doc_ID`),
  ADD KEY `teach_learn_id` (`teach_learn_id`);

--
-- Chỉ mục cho bảng `db_note`
--
ALTER TABLE `db_note`
  ADD PRIMARY KEY (`note_id`),
  ADD KEY `teach_learn_id` (`teach_learn_id`);

--
-- Chỉ mục cho bảng `db_offices`
--
ALTER TABLE `db_offices`
  ADD PRIMARY KEY (`office_id`),
  ADD KEY `office_parent` (`office_parent`);

--
-- Chỉ mục cho bảng `db_subjects`
--
ALTER TABLE `db_subjects`
  ADD PRIMARY KEY (`sub_id`);

--
-- Chỉ mục cho bảng `db_teach_learn`
--
ALTER TABLE `db_teach_learn`
  ADD PRIMARY KEY (`teach_learn_id`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `user_id` (`user_id_inf`);

--
-- Chỉ mục cho bảng `db_users`
--
ALTER TABLE `db_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD UNIQUE KEY `user_name_2` (`user_name`,`user_email`);

--
-- Chỉ mục cho bảng `db_user_inf`
--
ALTER TABLE `db_user_inf`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `office_id` (`office_id`);

--
-- Chỉ mục cho bảng `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Chỉ mục cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `db_doc`
--
ALTER TABLE `db_doc`
  MODIFY `doc_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `db_note`
--
ALTER TABLE `db_note`
  MODIFY `note_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `db_offices`
--
ALTER TABLE `db_offices`
  MODIFY `office_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `db_subjects`
--
ALTER TABLE `db_subjects`
  MODIFY `sub_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `db_teach_learn`
--
ALTER TABLE `db_teach_learn`
  MODIFY `teach_learn_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `db_users`
--
ALTER TABLE `db_users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `db_doc`
--
ALTER TABLE `db_doc`
  ADD CONSTRAINT `db_doc_ibfk_1` FOREIGN KEY (`teach_learn_id`) REFERENCES `db_teach_learn` (`teach_learn_id`);

--
-- Các ràng buộc cho bảng `db_note`
--
ALTER TABLE `db_note`
  ADD CONSTRAINT `db_note_ibfk_1` FOREIGN KEY (`teach_learn_id`) REFERENCES `db_teach_learn` (`teach_learn_id`);

--
-- Các ràng buộc cho bảng `db_offices`
--
ALTER TABLE `db_offices`
  ADD CONSTRAINT `db_offices_ibfk_1` FOREIGN KEY (`office_parent`) REFERENCES `db_offices` (`office_id`);

--
-- Các ràng buộc cho bảng `db_teach_learn`
--
ALTER TABLE `db_teach_learn`
  ADD CONSTRAINT `db_teach_learn_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `db_subjects` (`sub_id`),
  ADD CONSTRAINT `db_teach_learn_ibfk_2` FOREIGN KEY (`user_id_inf`) REFERENCES `db_user_inf` (`ID`);

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
