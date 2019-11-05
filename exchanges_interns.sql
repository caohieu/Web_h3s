-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2019 at 02:54 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exchanges_interns`
--

-- --------------------------------------------------------

--
-- Table structure for table `intern_ability_dictionary`
--

CREATE TABLE `intern_ability_dictionary` (
  `id` int(11) NOT NULL,
  `ability_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aibility_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ability_note` varchar(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `intern_student_ability`
--

CREATE TABLE `intern_student_ability` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `ability_id` int(11) NOT NULL,
  `ability_rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `intern_organization_profile`
--

CREATE TABLE `intern_organization_profile` (
  `id` int(11) NOT NULL,
  `organization_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `employee_count` int(11) NOT NULL,
  `gross_revenue` int(11) NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `home_page` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tax_number` int(11) NOT NULL COMMENT 'Use to login'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `intern_organization_requests`
--

CREATE TABLE `intern_organization_requests` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `subject` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `date_submitted` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `intern_organization_request_abilities`
--

CREATE TABLE `intern_organization_request_abilities` (
  `id` int(11) NOT NULL,
  `organization_request_id` int(11) NOT NULL,
  `ability_id` int(11) NOT NULL,
  `ability_required` int(11) NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `intern_organization_request_assignment`
--

CREATE TABLE `intern_organization_request_assignment` (
  `id` int(11) NOT NULL,
  `organization_request_id` int(11) COLLATE utf8_unicode_ci NOT NULL,
  `student_id` int(11) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `intern_students`
--

CREATE TABLE `intern_students` (
  `id` int(11) NOT NULL,
  `student_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Use to login',
  `first_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sur_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `join_date` date NOT NULL,
  `class_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `intern_student_register`
--

CREATE TABLE `intern_student_register` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `submit_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `intern_teachers`
--

CREATE TABLE `intern_teachers` (
  `id` int(11) NOT NULL,
  `teacher_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Use to login',
  `full_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `intern_ability_dictionary`
--
ALTER TABLE `intern_ability_dictionary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intern_ability_profile`
--
ALTER TABLE `intern_student_ability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intern_organization_profile`
--
ALTER TABLE `intern_organization_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intern_organization_requests`
--
ALTER TABLE `intern_organization_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intern_organization_request_abilities`
--
ALTER TABLE `intern_organization_request_abilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intern_organization_request_assignment`
--
ALTER TABLE `intern_organization_request_assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intern_students`
--
ALTER TABLE `intern_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intern_student_register`
--
ALTER TABLE `intern_student_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intern_teachers`
--
ALTER TABLE `intern_teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `intern_ability_dictionary`
--
ALTER TABLE `intern_ability_dictionary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `intern_ability_profile`
--
ALTER TABLE `intern_student_ability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `intern_organization_profile`
--
ALTER TABLE `intern_organization_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `intern_organization_requests`
--
ALTER TABLE `intern_organization_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `intern_organization_request_abilities`
--
ALTER TABLE `intern_organization_request_abilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `intern_organization_request_assignment`
--
ALTER TABLE `intern_organization_request_assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `intern_students`
--
ALTER TABLE `intern_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `intern_student_register`
--
ALTER TABLE `intern_student_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `intern_teachers`
--
ALTER TABLE `intern_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `intern_organization_requests`
  ADD CONSTRAINT fk_organization_id 
  FOREIGN KEY (`organization_id`) REFERENCES intern_organization_profile(`id`);

ALTER TABLE `intern_student_ability`
  ADD CONSTRAINT fk_student_id_1
  FOREIGN KEY (`student_id`) REFERENCES intern_students(`id`);

ALTER TABLE `intern_student_ability`
  ADD CONSTRAINT fk_abiliti_id_1
  FOREIGN KEY (`ability_id`) REFERENCES intern_ability_dictionary(`id`);

ALTER TABLE `intern_organization_request_abilities`
  ADD CONSTRAINT fk_organization_request_id_1
  FOREIGN KEY (`organization_request_id`) REFERENCES intern_organization_request_assignment(`id`);

ALTER TABLE `intern_organization_request_abilities`
  ADD CONSTRAINT fk_ability_id_2
  FOREIGN KEY (`ability_id`) REFERENCES intern_ability_dictionary(`id`);

ALTER TABLE `intern_organization_request_assignment`
  ADD CONSTRAINT fk_organization_request_id_2
  FOREIGN KEY (`organization_request_id`) REFERENCES intern_organization_requests(`id`);

ALTER TABLE `intern_organization_request_assignment`
  ADD CONSTRAINT fk_student_id_2
  FOREIGN KEY (`student_id`) REFERENCES intern_students(`id`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
