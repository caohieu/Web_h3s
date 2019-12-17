-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 17, 2019 lúc 09:03 AM
-- Phiên bản máy phục vụ: 5.7.21
-- Phiên bản PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `intern_ability_dictionary`
--

DROP TABLE IF EXISTS `intern_ability_dictionary`;
CREATE TABLE IF NOT EXISTS `intern_ability_dictionary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ability_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aibility_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ability_note` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `intern_ability_dictionary`
--

INSERT INTO `intern_ability_dictionary` (`id`, `ability_name`, `aibility_type`, `ability_note`) VALUES
(123, 'Java', 'lap trinh', '10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `intern_organization_profile`
--

DROP TABLE IF EXISTS `intern_organization_profile`;
CREATE TABLE IF NOT EXISTS `intern_organization_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `employee_count` int(11) NOT NULL,
  `gross_revenue` int(11) NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `home_page` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tax_number` int(11) NOT NULL COMMENT 'Use to login',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1244 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `intern_organization_profile`
--

INSERT INTO `intern_organization_profile` (`id`, `organization_name`, `employee_count`, `gross_revenue`, `address`, `home_page`, `tax_number`) VALUES
(123, 'h3d', 123, 123, 'sadsa', 'dasd', 1234),
(234, 'fpt', 222, 23, 'ewqwewqw', 'qewqwe', 223),
(1243, 'h3d', 123, 123, 'sadsa', 'dasd', 12345);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `intern_organization_requests`
--

DROP TABLE IF EXISTS `intern_organization_requests`;
CREATE TABLE IF NOT EXISTS `intern_organization_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `subject` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `date_submitted` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_organization_id` (`organization_id`)
) ENGINE=InnoDB AUTO_INCREMENT=457 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `intern_organization_requests`
--

INSERT INTO `intern_organization_requests` (`id`, `organization_id`, `subject`, `short_description`, `amount`, `date_submitted`, `status`) VALUES
(6, 234, 'k', 'Gioi', '7', '2019-01-01 00:00:00', 1),
(123, 1243, 'sadsa', 'dsasa', '5', '2019-11-12 00:00:00', 1),
(132, 123, 'ewqew', 'qwewqewq', '5', '2019-11-13 00:00:00', 0),
(222, 234, 'sadds', '12321', '5', '2019-11-13 00:00:00', 4),
(234, 1243, 'wqeqweqw', 'weqewq', '5', '2019-11-13 00:00:00', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `intern_organization_request_abilities`
--

DROP TABLE IF EXISTS `intern_organization_request_abilities`;
CREATE TABLE IF NOT EXISTS `intern_organization_request_abilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_request_id` int(11) NOT NULL,
  `ability_id` int(11) NOT NULL,
  `ability_required` int(11) NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_organization_request_id_1` (`organization_request_id`),
  KEY `fk_ability_id_2` (`ability_id`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `intern_organization_request_abilities`
--

INSERT INTO `intern_organization_request_abilities` (`id`, `organization_request_id`, `ability_id`, `ability_required`, `note`) VALUES
(123, 123, 123, 5, 'ko co gi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `intern_organization_request_assignment`
--

DROP TABLE IF EXISTS `intern_organization_request_assignment`;
CREATE TABLE IF NOT EXISTS `intern_organization_request_assignment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_request_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `create_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_organization_request_id_2` (`organization_request_id`),
  KEY `fk_student_id_2` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `intern_organization_request_assignment`
--

INSERT INTO `intern_organization_request_assignment` (`id`, `organization_request_id`, `student_id`, `start_date`, `end_date`, `status`, `create_date`) VALUES
(7, 123, 123, '2019-01-02', '2020-02-02', 2, '2019-12-02'),
(11, 123, 123, '2019-12-02', '2019-12-02', 0, '2019-12-02'),
(12, 6, 123, '2019-12-02', '2019-12-02', 0, '2019-12-02'),
(123, 123, 123, '2018-11-05', '2018-11-05', 2, '2019-11-05'),
(124, 123, 123, '2019-11-05', '2019-11-04', 2, '2019-11-05'),
(125, 222, 123, '2019-11-05', '2019-11-05', 0, '2019-11-05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `intern_students`
--

DROP TABLE IF EXISTS `intern_students`;
CREATE TABLE IF NOT EXISTS `intern_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Use to login',
  `first_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sur_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `join_date` date NOT NULL,
  `class_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `intern_students`
--

INSERT INTO `intern_students` (`id`, `student_code`, `first_name`, `sur_name`, `last_name`, `date_of_birth`, `join_date`, `class_name`) VALUES
(123, 'hus16001784', 'cao', 'tho', 'hieu', '2019-11-05', '2019-11-06', 'k61');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `intern_student_ability`
--

DROP TABLE IF EXISTS `intern_student_ability`;
CREATE TABLE IF NOT EXISTS `intern_student_ability` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `ability_id` int(11) NOT NULL,
  `ability_rate` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_id_1` (`student_id`),
  KEY `fk_abiliti_id_1` (`ability_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `intern_student_register`
--

DROP TABLE IF EXISTS `intern_student_register`;
CREATE TABLE IF NOT EXISTS `intern_student_register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `submit_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `intern_teachers`
--

DROP TABLE IF EXISTS `intern_teachers`;
CREATE TABLE IF NOT EXISTS `intern_teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Use to login',
  `full_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `intern_teachers`
--

INSERT INTO `intern_teachers` (`id`, `teacher_code`, `full_name`, `sex`) VALUES
(1, '001', 'lan anh', 'tin');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `intern_organization_requests`
--
ALTER TABLE `intern_organization_requests`
  ADD CONSTRAINT `fk_organization_id` FOREIGN KEY (`organization_id`) REFERENCES `intern_organization_profile` (`id`);

--
-- Các ràng buộc cho bảng `intern_organization_request_abilities`
--
ALTER TABLE `intern_organization_request_abilities`
  ADD CONSTRAINT `fk_ability_id_2` FOREIGN KEY (`ability_id`) REFERENCES `intern_ability_dictionary` (`id`),
  ADD CONSTRAINT `fk_organization_request_id_1` FOREIGN KEY (`organization_request_id`) REFERENCES `intern_organization_request_assignment` (`id`);

--
-- Các ràng buộc cho bảng `intern_organization_request_assignment`
--
ALTER TABLE `intern_organization_request_assignment`
  ADD CONSTRAINT `fk_organization_request_id_2` FOREIGN KEY (`organization_request_id`) REFERENCES `intern_organization_requests` (`id`),
  ADD CONSTRAINT `fk_student_id_2` FOREIGN KEY (`student_id`) REFERENCES `intern_students` (`id`);

--
-- Các ràng buộc cho bảng `intern_student_ability`
--
ALTER TABLE `intern_student_ability`
  ADD CONSTRAINT `fk_abiliti_id_1` FOREIGN KEY (`ability_id`) REFERENCES `intern_ability_dictionary` (`id`),
  ADD CONSTRAINT `fk_student_id_1` FOREIGN KEY (`student_id`) REFERENCES `intern_students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
