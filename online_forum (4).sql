-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2026 at 07:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_register`
--

CREATE TABLE `activity_register` (
  `id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `student_id` int(100) NOT NULL,
  `unit_type` varchar(100) NOT NULL,
  `activity_title` varchar(100) NOT NULL,
  `activity_description` varchar(100) NOT NULL,
  `activity_date` varchar(100) NOT NULL,
  `hours_spent` varchar(100) NOT NULL,
  `certificate_path` varchar(100) NOT NULL,
  `verified_by` varchar(100) NOT NULL,
  `verified_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_register`
--

INSERT INTO `activity_register` (`id`, `activity_id`, `student_id`, `unit_type`, `activity_title`, `activity_description`, `activity_date`, `hours_spent`, `certificate_path`, `verified_by`, `verified_at`) VALUES
(11, 0, 1, 'Employee', '1', '1', '2026-01-22', '1 to 5', '1', '1', '2026-01-2212:52:57'),
(12, 0, 1, 'Employee', '1', '1', '2026-01-22', '1 to 5', '1', '1', '2026-01-2212:53:04'),
(13, 111111, 111111, 'Employee', '1', '1', '2026-01-22', '1 to 5', '1', '1', '2026-01-2212:54:35'),
(14, 465687, 879798, 'Employee', '879', '98', '2026-01-26', '1 to 5', '8o087', '0789', '2026-01-2607:47:10'),
(15, 768759, 765697, 'Employee', 'yij', 'bmbv', '2026-01-26', '1 to 5', 'bm', 'bmn', '2026-01-2608:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `application_approval`
--

CREATE TABLE `application_approval` (
  `approval_id` int(100) NOT NULL,
  `application_id` int(100) NOT NULL,
  `approved_by` varchar(100) NOT NULL,
  `approval_status` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `approved_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application_approval`
--

INSERT INTO `application_approval` (`approval_id`, `application_id`, `approved_by`, `approval_status`, `remarks`, `approved_at`) VALUES
(0, 1, '1', '1', '1', '1'),
(1, 1, '0', '0', '2', '2026'),
(3, 1, '0', '0', '0', '2026'),
(4, 1, 'dsf', 'yes', 'fh', '2026-01-1211:37:45'),
(5, 11, '1', 'yes', '16', '2026-01-2212:54:54'),
(444444, 0, 'fg', 'yes', 'fg', '2026-01-2607:40:32');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(100) NOT NULL,
  `student_id` int(100) NOT NULL,
  `unit_type` varchar(100) NOT NULL,
  `feedback_type` varchar(100) NOT NULL,
  `rating` varchar(100) NOT NULL,
  `comments` varchar(100) NOT NULL,
  `submitted_at` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `student_id`, `unit_type`, `feedback_type`, `rating`, `comments`, `submitted_at`, `id`) VALUES
(465768, 197798, 'Employee', 'jgfj', 'gjgf', 'gj', '2026-01-2508:48:44', 16),
(465769, 465769, 'Employee', 'jgfj', 'gjgf', 'gj', '2026-01-2608:06:09', 17);

-- --------------------------------------------------------

--
-- Table structure for table `login_users`
--

CREATE TABLE `login_users` (
  `user_id` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `last_login` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_users`
--

INSERT INTO `login_users` (`user_id`, `username`, `password`, `user_type`, `status`, `last_login`, `created_at`, `id`) VALUES
('111111', 'abi', '123', 'Student', 'Yes', '2026-01-2412:45:00', '2026-01-2412:45:00', 10),
('111112', 'abi', '123', 'Employee', 'Yes', '2026-01-2507:18:59', '2026-01-2507:18:59', 11),
('444444', 'abi', '123', 'Student', 'Yes', '2026-01-2507:32:35', '2026-01-2507:32:35', 12),
('444445', 'abi', '123', 'Employee', 'Yes', '2026-01-2508:02:07', '2026-01-2508:02:07', 13),
('444446', 'abi', '123', 'Employee', 'Yes', '2026-01-2508:22:01', '2026-01-2508:22:01', 14);

-- --------------------------------------------------------

--
-- Table structure for table `ncc_requirements`
--

CREATE TABLE `ncc_requirements` (
  `req_id` varchar(100) NOT NULL,
  `height` varchar(100) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `medical_fitness_status` varchar(100) NOT NULL,
  `sports_participation` varchar(100) NOT NULL,
  `drill_experience` varchar(100) NOT NULL,
  `certificates` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ncc_requirements`
--

INSERT INTO `ncc_requirements` (`req_id`, `height`, `weight`, `medical_fitness_status`, `sports_participation`, `drill_experience`, `certificates`, `remarks`) VALUES
('111111', '2', '3', '3', '4', '5', '5', '6'),
('435665', '3', '4', '24', '3', 'f', '', 'fg');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `user_id` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `notification_type` varchar(100) NOT NULL,
  `is_read` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `notification_id` varchar(10) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`user_id`, `title`, `message`, `notification_type`, `is_read`, `created_at`, `notification_id`, `id`) VALUES
('111111', '1', '1', '1', '1', '1', '1', 6),
('111112', 'd', 'saf', 'f', 'd', '2026-01-2508:04:12', 'df', 9),
('111113', 'yu', 'jmhg', 'kjj', 'jkk', '2026-01-2608:06:21', 'lkl', 10);

-- --------------------------------------------------------

--
-- Table structure for table `nss_requirements`
--

CREATE TABLE `nss_requirements` (
  `req_id` varchar(100) NOT NULL,
  `social_service_interest` varchar(100) NOT NULL,
  `previous_volunteer_experience` varchar(100) NOT NULL,
  `communication_skills` varchar(100) NOT NULL,
  `leadership_skills` varchar(100) NOT NULL,
  `availability_for_camps` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nss_requirements`
--

INSERT INTO `nss_requirements` (`req_id`, `social_service_interest`, `previous_volunteer_experience`, `communication_skills`, `leadership_skills`, `availability_for_camps`, `remarks`, `id`) VALUES
('1', '2', '2', '3', '3', '3', '4', 1),
('11', '1', '1', '1', '1', '1', '1', 2),
('11', '1', '1', '1', '1', '1', '1', 3),
('111111', '2', 'e', '4', '4', '4', '4', 4),
('111112', 'e', 'e', 'e', 'e', 'e', 'e', 5),
('111113', 'jhlj', 'jlj', '.lj', 'j', 'jh.', 'jh.,', 6);

-- --------------------------------------------------------

--
-- Table structure for table `student_registration`
--

CREATE TABLE `student_registration` (
  `id` int(11) NOT NULL,
  `student_id` int(100) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dob` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `year_of_study` varchar(100) NOT NULL,
  `roll_no` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `blood_group` varchar(100) NOT NULL,
  `skillsinterested_unit` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_registration`
--

INSERT INTO `student_registration` (`id`, `student_id`, `student_name`, `gender`, `dob`, `email`, `mobile`, `department`, `year_of_study`, `roll_no`, `address`, `blood_group`, `skillsinterested_unit`, `created_at`) VALUES
(1300001, 100000, '1', 'Male', 2026, '1@gmail.com', '5555555555', 'weqwe', 'I year', '', 'dfsdfsdf', 'AB=', 'werwer', '2026-01-2413:31:58');

-- --------------------------------------------------------

--
-- Table structure for table `unit_application_form`
--

CREATE TABLE `unit_application_form` (
  `student_id` varchar(100) NOT NULL,
  `unit_type` varchar(100) NOT NULL,
  `requirement_id` varchar(100) NOT NULL,
  `motivation_statement` varchar(100) NOT NULL,
  `supporting_documents` varchar(100) NOT NULL,
  `application_date` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unit_application_form`
--

INSERT INTO `unit_application_form` (`student_id`, `unit_type`, `requirement_id`, `motivation_statement`, `supporting_documents`, `application_date`, `status`, `id`, `application_id`) VALUES
('111111', 'Employee', '14', '15', 't', '2026-01-22', '1', 7, 1),
('76', 'Employee', '14', '15', '16', '2026-01-25', '1', 8, 276768),
('76', 'Employee', '14', '15', '16', '2026-01-25', '1', 9, 276769);

-- --------------------------------------------------------

--
-- Table structure for table `unit_events`
--

CREATE TABLE `unit_events` (
  `unit_type` varchar(100) NOT NULL,
  `event_title` varchar(100) NOT NULL,
  `event_description` varchar(100) NOT NULL,
  `event_date` varchar(100) NOT NULL,
  `event_time` varchar(100) NOT NULL,
  `venue` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unit_events`
--

INSERT INTO `unit_events` (`unit_type`, `event_title`, `event_description`, `event_date`, `event_time`, `venue`, `created_by`, `id`, `event_id`) VALUES
('Employee', '13', '14', '15', '12:41:42', '17', 'f', 8, 111111),
('754', '75', '76', '67', '6756', '676', '8565', 9, 243246);

-- --------------------------------------------------------

--
-- Table structure for table `yrc_requirements`
--

CREATE TABLE `yrc_requirements` (
  `id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL,
  `blood_donation_interest` varchar(100) NOT NULL,
  `first_aid_knowledge` varchar(100) NOT NULL,
  `volunteer_experience` varchar(100) NOT NULL,
  `health_awareness_interest` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `yrc_requirements`
--

INSERT INTO `yrc_requirements` (`id`, `req_id`, `blood_donation_interest`, `first_aid_knowledge`, `volunteer_experience`, `health_awareness_interest`, `remarks`) VALUES
(5, 153464, '75', '76', '76', '67', '76');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_register`
--
ALTER TABLE `activity_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_approval`
--
ALTER TABLE `application_approval`
  ADD PRIMARY KEY (`approval_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_users`
--
ALTER TABLE `login_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ncc_requirements`
--
ALTER TABLE `ncc_requirements`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nss_requirements`
--
ALTER TABLE `nss_requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_registration`
--
ALTER TABLE `student_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_application_form`
--
ALTER TABLE `unit_application_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_events`
--
ALTER TABLE `unit_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yrc_requirements`
--
ALTER TABLE `yrc_requirements`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_register`
--
ALTER TABLE `activity_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `login_users`
--
ALTER TABLE `login_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nss_requirements`
--
ALTER TABLE `nss_requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_registration`
--
ALTER TABLE `student_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1300002;

--
-- AUTO_INCREMENT for table `unit_application_form`
--
ALTER TABLE `unit_application_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `unit_events`
--
ALTER TABLE `unit_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `yrc_requirements`
--
ALTER TABLE `yrc_requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
