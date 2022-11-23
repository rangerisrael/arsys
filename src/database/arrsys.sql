-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 09:22 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arrsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `name`) VALUES
(1, 'Regular Curricular Activities'),
(2, 'Class Based Programs'),
(3, 'Institutional Activities'),
(4, 'Student Initiated Activities'),
(5, 'Unit Based Activities');

-- --------------------------------------------------------

--
-- Table structure for table `department_office`
--

CREATE TABLE `department_office` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_office`
--

INSERT INTO `department_office` (`id`, `name`) VALUES
(6, 'AGRICULTURE'),
(2, 'BIT'),
(3, 'EDUCATION'),
(5, 'ENGINEER'),
(9, 'FISHERIES'),
(8, 'FORESTRY'),
(4, 'HRM'),
(1, 'IT'),
(7, 'LAW');

-- --------------------------------------------------------

--
-- Table structure for table `facilities_type`
--

CREATE TABLE `facilities_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `capacity` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facilities_type`
--

INSERT INTO `facilities_type` (`id`, `name`, `photo`, `capacity`, `location`) VALUES
(1, 'GYMNASIUM', '', '', ''),
(2, 'CONVENTIONAL', '', '', ''),
(3, 'ACCREDITATION HALL', '', '', ''),
(4, 'AVR', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `motorpool_type`
--

CREATE TABLE `motorpool_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `plate_number` varchar(50) NOT NULL,
  `fuel` varchar(50) NOT NULL,
  `gear` varchar(20) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `motorpool_type`
--

INSERT INTO `motorpool_type` (`id`, `name`, `plate_number`, `fuel`, `gear`, `photo`) VALUES
(1, 'COUSTER', 'ASD5534543', 'diesel', 'automatic', ''),
(2, 'FORTUNER', 'DAEW43454', 'diesel', 'manual', ''),
(3, 'MUX', 'QWEDDA54', 'gasoline', 'manual', ''),
(4, 'COMMUTER', 'ASDASDYUT5', 'diesel', 'manual', ''),
(5, 'APV', 'BGRTU543', 'diesel', 'manual', ''),
(6, 'ERTIGA', 'BFTJERTR64', 'gasoline', 'automatic', ''),
(7, 'HILUX', 'NDFGERTRT45', 'diesel', 'automatic', '');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_facilities`
--

CREATE TABLE `reservation_facilities` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `reservation_type_id` int(11) DEFAULT NULL,
  `facilities_type_id` int(11) DEFAULT NULL,
  `date_filling` varchar(255) NOT NULL,
  `date_return` varchar(11) NOT NULL,
  `borrowing` varchar(255) NOT NULL,
  `assigned_person` varchar(255) NOT NULL,
  `assigned_contact_number` varchar(11) NOT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `activity_name` varchar(255) NOT NULL,
  `brief_description` varchar(255) NOT NULL,
  `number_participant` varchar(255) NOT NULL,
  `target_day_use` varchar(255) NOT NULL,
  `scan_file` varchar(255) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation_facilities`
--

INSERT INTO `reservation_facilities` (`id`, `transaction_id`, `reservation_type_id`, `facilities_type_id`, `date_filling`, `date_return`, `borrowing`, `assigned_person`, `assigned_contact_number`, `activity_id`, `activity_name`, `brief_description`, `number_participant`, `target_day_use`, `scan_file`, `status_id`, `user_id`) VALUES
(1, 'arsys6379fe1914b717.77450814', 1, 3, '2022-11-22', '2022-11-22', 'individual', 'Calendaciion', '09454534543', 1, 'Test', 'test', '23', '18:14:25', 'null', 1, 8),
(4, 'arsys637dfff79fe842.30758726', 1, 1, '2022-11-22', '2022-11-23', 'official', '', '09', 1, '', '', '', '19:11:35', 'null', 2, 11),
(5, 'arsys637e00085ca108.84765533', 1, 1, '2022-11-22', '2022-11-23', 'official', '', '09', 1, '', '', '', '19:11', 'null', 2, 11),
(6, 'arsys637e001268f697.75834799', 1, 1, '2022-11-22', '2022-11-23', 'official', '', '09', 1, '', '', '', '19:11', 'null', 2, 11),
(7, 'arsys637e4570638231.17969322', 1, 1, '2022-11-24', '2022-11-24', 'official', 'Jaime Jacoba', '09123425643', 1, 'Test', 'test', '2', '00:05', 'null', 2, 11),
(8, 'arsys637e4d70e9bf73.95222174', 1, 1, '2022-11-24', '2022-11-25', 'official', 'Tester', '09071234567', 1, 'Test', 'test', '2', '00:42', 'null', 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_motorpool`
--

CREATE TABLE `reservation_motorpool` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `reservation_type_id` int(11) DEFAULT NULL,
  `motorpool_type_id` int(11) DEFAULT NULL,
  `date_filling` varchar(255) NOT NULL,
  `borrowing_office` varchar(255) NOT NULL,
  `date_return` varchar(11) NOT NULL,
  `assigned_person` varchar(255) NOT NULL,
  `assigned_contact_number` varchar(11) NOT NULL,
  `reason_travel_id` int(11) DEFAULT NULL,
  `number_participant` varchar(255) NOT NULL,
  `target_day_use` varchar(255) NOT NULL,
  `scan_file` varchar(255) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation_motorpool`
--

INSERT INTO `reservation_motorpool` (`id`, `transaction_id`, `reservation_type_id`, `motorpool_type_id`, `date_filling`, `borrowing_office`, `date_return`, `assigned_person`, `assigned_contact_number`, `reason_travel_id`, `number_participant`, `target_day_use`, `scan_file`, `status_id`, `user_id`) VALUES
(1, 'arsys6379febaba11e2.23031519', 2, 1, '2022-11-22', 'official', '2022-11-22', 'test', '09234234234', 2, '43', '18:17:16', 'motorpool_scan_file_-box.PNG', 3, 8),
(2, 'arsys637a38586425a4.00062941', 2, 5, '2022-11-25', 'individual', '2022-11-26', 'test', '09343242342', 3, '34', '22:22:59', 'motorpool_scan_file_-banner.png', 2, 11),
(3, 'arsys637d29d9e872a4.24807559', 2, 2, '2022-11-22', 'individual', '2022-11-23', 'test', '09324234234', 2, '23', '03:58', 'motorpool_scan_file_-users.png', 3, 11),
(4, 'arsys637e45a7489f18.20836262', 2, 4, '2022-11-24', 'individual', '2022-11-25', 'tester', '09071617004', 2, '2', '00:09', 'motorpool_scan_file_-front.jpg', 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_status`
--

CREATE TABLE `reservation_status` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation_status`
--

INSERT INTO `reservation_status` (`id`, `name`) VALUES
(1, 'approve'),
(3, 'decline'),
(2, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_type`
--

CREATE TABLE `reservation_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation_type`
--

INSERT INTO `reservation_type` (`id`, `name`) VALUES
(1, 'facilities'),
(2, 'motorpool');

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reset_password`
--

INSERT INTO `reset_password` (`id`, `token`, `date`, `user_id`) VALUES
(44, '$2y$10$YbHnHiEdi4VJ7ubE.nSHVuabmxi8sJfhI4lvK/J6b22ZB8K8dddGm', '11/19/2022', 8),
(45, '$2y$10$N7jy1tanK5.K9IbMvqT.z.8xnm21GsApuRJ5S/8PkCqiQPpTat1RC', '11/19/2022', 8),
(46, '$2y$10$MPwUcURv3wKr6CRVahTYYOGRh/hkln3GsSQ.GwKbaRQQKhwVE.o0e', '11/19/2022', 8),
(47, '$2y$10$yq4sN50L3rxYYcw2b0gvWertAXAGDEkMEsJbqZ3D2FUN3Hiu8UZRC', '11/19/2022', 8);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `travel_reason`
--

CREATE TABLE `travel_reason` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travel_reason`
--

INSERT INTO `travel_reason` (`id`, `name`) VALUES
(1, 'Reason 1'),
(2, 'Reason 3'),
(3, 'Reason 3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `id_number` varchar(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `phone_number` varchar(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `date_updated` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `photo`, `id_number`, `department_id`, `phone_number`, `gender`, `password`, `role_id`, `date_created`, `date_updated`) VALUES
(8, 'dev.me', 'dev.me28@gmail.com', NULL, 'Tst234234', 1, '9071212342', 'MALE', '$2y$10$9.YrCyrD8RK7SJsLiKWZ0eOifvfXHcLTl7qp1u2bFphgSYHXxm98m', 1, '2022-11-19', '2022-11-19'),
(10, 'Berio Apilado', 'testme@gmail.com', NULL, 'dasd31232', 1, '09345435435', 'MALE', '$2y$10$rRWr8vs2RY.cF8uRSxEcfe/N/tbVnokrz4.gBLbBy45pCHc3T1hD6', 1, '2022-11-19', '2022-11-19'),
(11, 'Open', 'opencorp.vn.com@gmail.com', NULL, 'ASCOT1234', 1, '09071534567', 'MALE', '$2y$10$VtI6Bmdj4gIkYBVuzfdjE.ZJmuZRA3GT3d/twRe0SbxYCOBxIuEHS', 2, '2022-11-19', '2022-11-19'),
(13, 'Tester Me', 'xxxberio@gmail.com', NULL, 'Ascot123', 4, '09071617005', 'MALE', '$2y$10$mZOZqz3oP6VResFhlTWGOefR5hjJpraNIY4VX8UkF3wbt/tyb8Ymm', 2, '2022-11-24', '2022-11-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_office`
--
ALTER TABLE `department_office`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `facilities_type`
--
ALTER TABLE `facilities_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motorpool_type`
--
ALTER TABLE `motorpool_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation_facilities`
--
ALTER TABLE `reservation_facilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_type_id` (`reservation_type_id`),
  ADD KEY `facilities_type_id` (`facilities_type_id`),
  ADD KEY `activity_id` (`activity_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reservation_motorpool`
--
ALTER TABLE `reservation_motorpool`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `date_return` (`date_return`),
  ADD KEY `reservation_type_id` (`reservation_type_id`),
  ADD KEY `motorpool_type_id` (`motorpool_type_id`),
  ADD KEY `reason_travel_id` (`reason_travel_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reservation_status`
--
ALTER TABLE `reservation_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `status_update` (`name`);

--
-- Indexes for table `reservation_type`
--
ALTER TABLE `reservation_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `travel_reason`
--
ALTER TABLE `travel_reason`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id_number` (`id_number`),
  ADD UNIQUE KEY `password` (`password`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `department_office`
--
ALTER TABLE `department_office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `facilities_type`
--
ALTER TABLE `facilities_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `motorpool_type`
--
ALTER TABLE `motorpool_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reservation_facilities`
--
ALTER TABLE `reservation_facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reservation_motorpool`
--
ALTER TABLE `reservation_motorpool`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reservation_status`
--
ALTER TABLE `reservation_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservation_type`
--
ALTER TABLE `reservation_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reset_password`
--
ALTER TABLE `reset_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `travel_reason`
--
ALTER TABLE `travel_reason`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation_facilities`
--
ALTER TABLE `reservation_facilities`
  ADD CONSTRAINT `reservation_facilities_ibfk_1` FOREIGN KEY (`reservation_type_id`) REFERENCES `reservation_type` (`id`),
  ADD CONSTRAINT `reservation_facilities_ibfk_2` FOREIGN KEY (`facilities_type_id`) REFERENCES `facilities_type` (`id`),
  ADD CONSTRAINT `reservation_facilities_ibfk_3` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`),
  ADD CONSTRAINT `reservation_facilities_ibfk_4` FOREIGN KEY (`status_id`) REFERENCES `reservation_status` (`id`),
  ADD CONSTRAINT `reservation_facilities_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reservation_motorpool`
--
ALTER TABLE `reservation_motorpool`
  ADD CONSTRAINT `reservation_motorpool_ibfk_1` FOREIGN KEY (`reservation_type_id`) REFERENCES `reservation_type` (`id`),
  ADD CONSTRAINT `reservation_motorpool_ibfk_2` FOREIGN KEY (`motorpool_type_id`) REFERENCES `motorpool_type` (`id`),
  ADD CONSTRAINT `reservation_motorpool_ibfk_3` FOREIGN KEY (`reason_travel_id`) REFERENCES `travel_reason` (`id`),
  ADD CONSTRAINT `reservation_motorpool_ibfk_4` FOREIGN KEY (`status_id`) REFERENCES `reservation_status` (`id`),
  ADD CONSTRAINT `reservation_motorpool_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD CONSTRAINT `reset_password_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department_office` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
