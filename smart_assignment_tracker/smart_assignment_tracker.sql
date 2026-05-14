-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2026 at 09:56 PM
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
-- Database: `smart_assignment_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `assignment_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `deadline` date NOT NULL,
  `priority` enum('high','medium','low') DEFAULT 'medium',
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignment_id`, `title`, `subject`, `deadline`, `priority`, `user_id`) VALUES
(1, 'Database requirement gathering', 'Final Project', '2026-05-25', 'high', 1),
(3, 'AI Chatbot Implementation', 'Artificial Intelligence', '2026-05-18', 'medium', 1),
(4, 'UI/UX Prototype Design', 'Human Computer Interaction', '2026-05-20', 'low', 1),
(5, 'Research Paper Submission', 'Research Methodology', '2026-05-22', 'medium', 1),
(6, 'art gallery design sketching', 'architecture', '2026-05-22', 'medium', 3),
(7, 'install xampp', 'dbms', '2026-05-13', 'low', 8),
(9, 'delete unwanted php files', 'web development', '2026-05-13', 'low', 1),
(10, 'final presentation', 'database', '2026-05-14', 'high', 1),
(12, 'nothing', 'no sub', '2026-05-15', 'high', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `reminder_id` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reminder`
--

INSERT INTO `reminder` (`reminder_id`, `time`, `message`) VALUES
(1, '2026-05-24 08:00:00', 'Final project deadline tomorrow! ❤️ Submit before 11:59 PM'),
(2, '2026-05-11 08:00:00', 'Database Normalization assignment due tomorrow 📚'),
(3, '2026-05-17 08:00:00', 'AI Chatbot assignment due in 24 hours 🌟'),
(4, '2026-05-19 08:00:00', 'UI/UX Prototype due tomorrow - You got this! 🙌🏼'),
(5, '2026-05-21 08:00:00', 'Research paper submission deadline tomorrow 📄');

-- --------------------------------------------------------

--
-- Table structure for table `stress`
--

CREATE TABLE `stress` (
  `stress_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `level` enum('high','medium','low') NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stress`
--

INSERT INTO `stress` (`stress_id`, `date`, `level`, `user_id`) VALUES
(1, '2026-05-01', 'high', NULL),
(2, '2026-05-05', 'medium', NULL),
(3, '2026-05-10', 'low', NULL),
(4, '2026-05-12', 'high', NULL),
(5, '2026-05-15', 'medium', NULL),
(6, '2026-05-12', 'medium', 1),
(7, '2026-05-12', 'medium', 1),
(8, '2026-05-12', 'medium', 1),
(9, '2026-05-12', 'medium', 1),
(10, '2026-05-12', 'low', 1),
(11, '2026-05-12', 'low', 1),
(12, '2026-05-12', 'high', 1),
(13, '2026-05-12', 'high', 1),
(14, '2026-05-12', 'low', 1),
(15, '2026-05-12', 'high', 1),
(16, '2026-05-12', 'high', 1),
(17, '2026-05-12', 'high', 1),
(18, '2026-05-12', 'high', 1),
(19, '2026-05-12', 'high', 1),
(20, '2026-05-13', 'high', 1),
(21, '2026-05-13', 'high', 1),
(22, '2026-05-13', 'high', 1),
(23, '2026-05-13', 'high', 1),
(24, '2026-05-13', 'high', 1),
(25, '2026-05-13', 'medium', 1),
(26, '2026-05-13', 'medium', 1),
(27, '2026-05-13', 'high', 1),
(28, '2026-05-13', 'low', 1),
(29, '2026-05-13', 'high', 1),
(30, '2026-05-13', 'high', 1),
(31, '2026-05-13', 'medium', 1),
(32, '2026-05-13', 'medium', 1),
(33, '2026-05-13', 'high', 1),
(34, '2026-05-13', 'medium', 1),
(35, '2026-05-13', 'high', 1),
(36, '2026-05-13', 'low', 1),
(37, '2026-05-13', 'medium', 1),
(38, '2026-05-13', 'medium', 1),
(39, '2026-05-14', 'medium', 1),
(40, '2026-05-14', 'high', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subtask`
--

CREATE TABLE `subtask` (
  `subtask_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `time_limit` varchar(50) DEFAULT NULL,
  `assignment_id` int(11) DEFAULT NULL,
  `is_completed` tinyint(4) DEFAULT 0,
  `due_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subtask`
--

INSERT INTO `subtask` (`subtask_id`, `name`, `time_limit`, `assignment_id`, `is_completed`, `due_date`) VALUES
(1, 'Design database schema', '3 days', NULL, 0, NULL),
(2, 'Implement AI reminder logic', '5 days', NULL, 0, NULL),
(3, 'Create frontend dashboard', '4 days', NULL, 0, NULL),
(4, 'Write project documentation', '2 days', NULL, 0, NULL),
(5, 'Prepare final presentation', '2 days', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('student','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `role`) VALUES
(1, 'H. A. T. Dilmini', 'dilmini@student.edu', 'pass_dilmini123', 'student'),
(2, 'P. Leinojhan', 'leinojhan@student.edu', 'pass_leinojhan123', 'student'),
(3, 'W. P. M. H. I. Wijesooriya', 'wijesooriya@student.edu', 'pass_wijesooriya123', 'student'),
(4, 'P. A. S. S. Wijerathna', 'wijerathna@student.edu', 'pass_wijerathna123', 'student'),
(5, 'Prof. Kamal Perera', 'kamal@admin.edu', 'admin_pass123', 'admin'),
(7, 'mandira', 'mandira@gmail.com', '123456', 'student'),
(8, 'kawini perera', 'kperera@gmail.com', 'perera123', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`reminder_id`);

--
-- Indexes for table `stress`
--
ALTER TABLE `stress`
  ADD PRIMARY KEY (`stress_id`);

--
-- Indexes for table `subtask`
--
ALTER TABLE `subtask`
  ADD PRIMARY KEY (`subtask_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `reminder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stress`
--
ALTER TABLE `stress`
  MODIFY `stress_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `subtask`
--
ALTER TABLE `subtask`
  MODIFY `subtask_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
