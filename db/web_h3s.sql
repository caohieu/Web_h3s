-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th1 01, 2020 lúc 03:11 PM
-- Phiên bản máy phục vụ: 5.7.26
-- Phiên bản PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ltweb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `intern_abilities_dictionary`
--

DROP TABLE IF EXISTS `intern_abilities_dictionary`;
CREATE TABLE IF NOT EXISTS `intern_abilities_dictionary` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Định danh bản ghi',
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên năng lực',
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Loại năng lực',
  `note` varchar(5) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mức đánh giá',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `intern_abilities_dictionary`
--

INSERT INTO `intern_abilities_dictionary` (`id`, `name`, `type`, `note`) VALUES
(1, 'PHP', 'Ngôn ngữ lập trình', '10'),
(2, 'Java', 'Ngôn ngữ lập trình', '10'),
(3, 'HTML', 'Ngôn ngữ lập trình', '10'),
(4, 'CSS', 'Ngôn ngữ lập trình', '10'),
(5, 'JavaScript', 'Ngôn ngữ lập trình', '10'),
(6, 'C/C++', 'Ngôn ngữ lập trình', '10'),
(7, 'Python', 'Ngôn ngữ lập trình', '10'),
(8, 'MySQL', 'Hệ quản trị CSDL', '10'),
(9, 'NodeJS', 'Ngôn ngữ lập trình', '10'),
(10, 'Cấu trúc dữ liệu', 'Môn học CNTT', '10'),
(11, 'Trí tuệ nhân tạo', 'Môn học CNTT', '10'),
(12, 'Thiết kế đánh giá thuật toán', 'Môn học CNTT', '10'),
(13, 'Giải tích', 'Môn học cơ bản', '10'),
(14, 'Mạng máy tính', 'Môn học CNTT', '10'),
(15, 'Lập trình hướng đối tượng', 'Môn học CNTT', '10'),
(16, 'TOEFL', 'Chứng chỉ ngoại ngữ', '10'),
(17, 'TOEIC', 'Chứng chỉ ngoại ngữ', '990'),
(18, 'IELTS', 'Chứng chỉ ngoại ngữ', '9');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `intern_organizations`
--

DROP TABLE IF EXISTS `intern_organizations`;
CREATE TABLE IF NOT EXISTS `intern_organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Định danh bản ghi',
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mã doanh nghiệp - Mã số thuế (Dùng để đăng nhập)',
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên tổ chức/doanh nghiệp',
  `number_of_employees` int(11) NOT NULL COMMENT 'Tổng số nhân viên',
  `gross_revenue` int(11) NOT NULL COMMENT 'Doanh thu tổng (mỗi năm)',
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Địa chỉ trụ sở',
  `website` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Địa chỉ web',
  PRIMARY KEY (`id`),
  UNIQUE KEY `organization_code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `intern_organizations`
--

INSERT INTO `intern_organizations` (`id`, `code`, `password`, `name`, `number_of_employees`, `gross_revenue`, `address`, `website`) VALUES
(1, '001', 'dc5c7986daef50c1e02ab09b442ee34f', 'FPT', 1000, 1000000, '', ''),
(2, '002', '93dd4de5cddba2c733c65f233097f05a', 'VTC', 1000, 1000000, '', ''),
(3, '003', 'e88a49bccde359f0cabb40db83ba6080', 'VNG', 1000, 1000000, '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `intern_organization_requests`
--

DROP TABLE IF EXISTS `intern_organization_requests`;
CREATE TABLE IF NOT EXISTS `intern_organization_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Định danh bản ghi',
  `organization_id` int(11) NOT NULL COMMENT 'Định danh tổ chức đăng tuyển',
  `position` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Vị trí tuyển dụng',
  `short_description` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mô tả công việc',
  `amount` int(11) NOT NULL COMMENT 'Số lượng người cần tuyển',
  `status` int(1) NOT NULL COMMENT 'Trạng thái',
  `created_at` datetime NOT NULL COMMENT 'Ngày đăng',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `intern_organization_requests`
--

INSERT INTO `intern_organization_requests` (`id`, `organization_id`, `position`, `short_description`, `amount`, `status`, `created_at`) VALUES
(1, 1, 'Dev PHP', 'Dev PHP', 3, 3000, '2019-11-04 00:00:00'),
(2, 2, 'Dev Java', 'Dev Java', 2, 3000, '2019-11-04 00:00:00'),
(3, 1, 'Dev C/C++', 'Dev C/C++', 5, 1000, '2019-11-04 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `intern_organization_request_abilities`
--

DROP TABLE IF EXISTS `intern_organization_request_abilities`;
CREATE TABLE IF NOT EXISTS `intern_organization_request_abilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Định danh bản ghi',
  `organization_request_id` int(11) NOT NULL COMMENT 'Mã phiếu yêu cầu',
  `ability_id` int(11) NOT NULL COMMENT 'Định danh năng lực',
  `ability_rate_required` int(11) NOT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Ghi chú',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `intern_organization_request_abilities`
--

INSERT INTO `intern_organization_request_abilities` (`id`, `organization_request_id`, `ability_id`, `ability_rate_required`, `note`) VALUES
(1, 1, 1, 10, NULL),
(2, 2, 2, 10, NULL),
(3, 3, 6, 10, NULL),
(4, 1, 2, 10, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `intern_organization_request_assignments`
--

DROP TABLE IF EXISTS `intern_organization_request_assignments`;
CREATE TABLE IF NOT EXISTS `intern_organization_request_assignments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Định danh bản ghi',
  `organization_request_id` int(11) NOT NULL COMMENT 'Định danh phiếu yêu cầu',
  `student_id` int(11) NOT NULL COMMENT 'Định danh sinh viên',
  `start_date` date NOT NULL COMMENT 'Ngày bắt đầu thực tập',
  `end_date` date NOT NULL COMMENT 'Ngày kết thúc thực tập',
  `status` int(11) NOT NULL COMMENT 'Trạng thái thực hiện',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `intern_organization_request_assignments`
--

INSERT INTO `intern_organization_request_assignments` (`id`, `organization_request_id`, `student_id`, `start_date`, `end_date`, `status`, `created_at`) VALUES
(1, 1, 1, '2019-11-10', '2019-11-30', 2, '2019-11-04 00:00:00'),
(2, 2, 1, '2019-11-10', '2019-11-30', 0, '2019-11-04 00:00:00'),
(3, 3, 2, '2019-11-10', '2019-11-30', 1, '2019-11-04 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `intern_students`
--

DROP TABLE IF EXISTS `intern_students`;
CREATE TABLE IF NOT EXISTS `intern_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Định danh bản ghi',
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mã sinh viên (Dùng để đăng nhập)',
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên',
  `sur_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên đệm',
  `last_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Họ',
  `gender` varchar(3) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Giới tính',
  `date_of_birth` date NOT NULL COMMENT 'Ngày tháng năm sinh',
  `join_date` date NOT NULL COMMENT 'Năm vào học',
  `class_name` varchar(8) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Khoá',
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `intern_students`
--

INSERT INTO `intern_students` (`id`, `code`, `password`, `first_name`, `sur_name`, `last_name`, `gender`, `date_of_birth`, `join_date`, `class_name`) VALUES
(1, '001', 'dc5c7986daef50c1e02ab09b442ee34f', 'A', 'Văn', 'Nguyễn', 'Nam', '1998-01-01', '2016-01-01', 'K61A3'),
(2, '002', '93dd4de5cddba2c733c65f233097f05a', 'B', 'Thị', 'Phạm', 'Nữ', '1998-01-01', '2016-01-01', 'K61A3'),
(3, '003', 'e88a49bccde359f0cabb40db83ba6080', 'C', 'Quốc', 'Trần', 'Nam', '1998-01-01', '2016-01-01', 'K61A3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `intern_student_abilities`
--

DROP TABLE IF EXISTS `intern_student_abilities`;
CREATE TABLE IF NOT EXISTS `intern_student_abilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Định danh bản ghi',
  `student_id` int(11) NOT NULL COMMENT 'Định danh sinh viên',
  `ability_id` int(11) NOT NULL COMMENT 'Định danh năng lực',
  `ability_rate` int(11) NOT NULL COMMENT 'Mức đánh giá năng lực',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `intern_student_abilities`
--

INSERT INTO `intern_student_abilities` (`id`, `student_id`, `ability_id`, `ability_rate`) VALUES
(1, 1, 1, 10),
(2, 2, 2, 10),
(3, 3, 3, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `intern_student_registers`
--

DROP TABLE IF EXISTS `intern_student_registers`;
CREATE TABLE IF NOT EXISTS `intern_student_registers` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Định danh bản ghi',
  `student_id` int(11) NOT NULL COMMENT 'Định danh sinh viên',
  `request_id` int(11) NOT NULL COMMENT 'Định danh phiếu yêu cầu',
  `status` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL COMMENT 'Ngày đăng kí',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `intern_student_registers`
--

INSERT INTO `intern_student_registers` (`id`, `student_id`, `request_id`, `status`, `created_at`) VALUES
(1, 1, 2, 1, '2019-11-04 00:00:00'),
(2, 2, 2, 1, '2019-11-04 00:00:00'),
(3, 3, 3, 1, '2019-11-04 00:00:00'),
(4, 1, 1, 0, '2019-12-23 03:38:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `intern_teachers`
--

DROP TABLE IF EXISTS `intern_teachers`;
CREATE TABLE IF NOT EXISTS `intern_teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Định danh bản ghi',
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mã số giáo viên (Dùng để đăng nhập)',
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên giáo viên',
  `gender` varchar(3) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Giới tính',
  `date_of_birth` date NOT NULL COMMENT 'Ngày tháng năm sinh',
  PRIMARY KEY (`id`),
  UNIQUE KEY `teacher_code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `intern_teachers`
--

INSERT INTO `intern_teachers` (`id`, `code`, `password`, `full_name`, `gender`, `date_of_birth`) VALUES
(1, '001', 'dc5c7986daef50c1e02ab09b442ee34f', 'Nguyễn Thị A', 'Nữ', '1980-01-01'),
(2, '002', '93dd4de5cddba2c733c65f233097f05a', 'Vũ Tiến B', 'Nam', '1980-01-01'),
(3, '003', 'e88a49bccde359f0cabb40db83ba6080', 'Đỗ Trung C', 'Nam', '1980-01-01');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
