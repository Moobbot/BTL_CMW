-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2021 at 10:04 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_teach_learn`
--
ALTER TABLE `db_teach_learn`
  ADD PRIMARY KEY (`teach_learn_id`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `user_id` (`user_id_inf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_teach_learn`
--
ALTER TABLE `db_teach_learn`
  MODIFY `teach_learn_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `db_teach_learn`
--
ALTER TABLE `db_teach_learn`
  ADD CONSTRAINT `db_teach_learn_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `db_subjects` (`sub_id`),
  ADD CONSTRAINT `db_teach_learn_ibfk_2` FOREIGN KEY (`user_id_inf`) REFERENCES `db_user_inf` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
