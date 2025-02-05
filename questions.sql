-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 04, 2025 at 10:55 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simsat_project_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int NOT NULL,
  `question` varchar(700) COLLATE utf8mb4_general_ci NOT NULL,
  `course_id` int NOT NULL,
  `is_deleted` int NOT NULL,
  `created_at` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `updated_at` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `course_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'What does HTML stand for?', 2, 0, '2024-08-01 20:00:26', '2024-08-01 20:00:26'),
(2, 'Which HTML tag is used to define an internal style sheet?', 2, 0, '2024-08-01 20:01:06', '2024-08-01 20:01:06'),
(3, 'Which HTML attribute is used to define inline styles?', 2, 0, '2024-08-01 20:01:45', '2024-08-01 20:01:45'),
(4, 'Which CSS property is used to change the background color?', 2, 0, '2024-08-01 20:02:31', '2024-08-01 20:02:31'),
(5, 'How do you insert a comment in a CSS file?', 2, 0, '2024-08-01 20:03:21', '2024-08-01 20:03:21'),
(6, 'Which property is used to change the font of an element?', 2, 0, '2024-08-01 20:03:43', '2024-08-01 20:03:43'),
(7, 'Which HTML tag is used to define an unordered list?', 2, 0, '2024-08-01 20:04:06', '2024-08-01 20:04:06'),
(8, 'How do you create a link in HTML?', 2, 0, '2024-08-01 20:04:32', '2024-08-01 20:04:32'),
(9, 'Which HTML tag is used to define a table?', 2, 0, '2024-08-01 20:05:07', '2024-08-01 20:05:07'),
(10, 'Which CSS property controls the text size?', 2, 0, '2024-08-01 20:05:57', '2024-08-01 20:05:57'),
(11, 'Which tag is used to create a checkbox in HTML?', 2, 0, '2024-08-01 20:07:01', '2024-08-01 20:07:01'),
(12, 'Which tag is used to create a drop-down list in HTML?', 2, 0, '2024-08-01 20:07:32', '2024-08-01 20:07:32'),
(13, 'Which CSS property is used to make text bold?', 2, 0, '2024-08-01 20:08:09', '2024-08-01 20:08:09'),
(14, 'How do you create a numbered list in HTML?', 2, 0, '2024-08-01 20:08:35', '2024-08-01 20:08:35'),
(15, 'Which HTML attribute specifies an alternate text for an image, if the image cannot be displayed?', 2, 1, '2024-08-01 20:09:01', '2024-09-01 00:38:38'),
(16, 'Which tool is commonly used for creating vector graphics?', 3, 0, '2024-08-01 20:20:48', '2024-08-01 20:20:48'),
(17, 'What does RGB stand for in graphic design?', 3, 0, '2024-08-01 20:21:24', '2024-08-01 20:21:24'),
(18, 'Which file format is typically used for high-quality print graphics?', 3, 0, '2024-08-01 20:21:45', '2024-08-01 20:21:45'),
(19, 'Which tab on the Ribbon do you use to change the font size?', 1, 0, '2024-08-01 20:22:15', '2024-08-01 20:22:15'),
(20, 'How do you make text bold in Microsoft Word?', 1, 0, '2024-08-01 20:22:45', '2024-08-01 20:22:45'),
(21, 'Which feature allows you to see hidden formatting symbols?', 1, 0, '2024-08-01 20:23:15', '2024-08-01 20:23:15'),
(22, 'What does DPI stand for?', 3, 0, '2024-08-01 20:24:02', '2024-08-01 20:24:02'),
(23, 'Which color model is used for print design?', 3, 0, '2024-08-01 20:26:31', '2024-08-01 20:26:31'),
(24, 'What is the purpose of a ‘bleed’ in printing?', 3, 0, '2024-08-01 20:27:02', '2024-08-01 20:27:02'),
(25, 'Which tool is used to select colors in Adobe Photoshop?', 3, 0, '2024-08-01 20:27:27', '2024-08-01 20:27:27'),
(26, 'Which of these is a commonly used sans-serif font?', 3, 0, '2024-08-01 20:27:58', '2024-08-01 20:27:58'),
(27, 'What does the term ‘kerning’ refer to?', 3, 0, '2024-08-01 20:28:21', '2024-08-01 20:28:21'),
(28, 'Which file format is best for preserving the quality of a logo with a transparent background?', 3, 0, '2024-08-01 20:28:53', '2024-08-01 20:28:53'),
(29, 'Which software is primarily used for photo editing?', 3, 0, '2024-08-01 20:33:21', '2024-08-01 20:33:21'),
(30, 'What does the acronym PSD stand for?', 3, 0, '2024-08-01 20:33:51', '2024-08-01 20:33:51'),
(31, 'Which design principle focuses on the arrangement of elements to create a sense of stability?', 3, 0, '2024-08-01 20:34:18', '2024-08-01 20:34:18'),
(32, 'Which file format is commonly used for web graphics that require animation?', 3, 0, '2024-08-01 20:35:15', '2024-08-01 20:35:15'),
(33, 'Which function is used to calculate the sum of a range of cells in Excel?', 1, 0, '2024-08-01 20:38:38', '2024-08-01 20:38:38'),
(34, 'How do you start a formula in Excel?', 1, 0, '2024-08-01 20:39:03', '2024-08-01 20:39:03'),
(35, 'Which tab contains the option to create a chart in Excel?', 1, 0, '2024-08-01 20:39:39', '2024-08-01 20:39:39'),
(36, 'Which view is used to edit the content of individual slides?', 1, 0, '2024-08-01 20:40:59', '2024-08-01 20:40:59'),
(37, 'How do you add a new slide in PowerPoint?', 1, 0, '2024-08-01 20:41:22', '2024-08-01 20:41:22'),
(38, 'Which feature allows you to apply consistent formatting to all slides in a presentation?', 1, 0, '2024-08-01 20:41:44', '2024-08-01 20:41:44'),
(39, 'What does LAN stand for?', 1, 0, '2024-08-01 20:42:09', '2024-08-01 20:42:09'),
(40, 'Which device is used to connect multiple networks together?', 1, 0, '2024-08-01 20:42:37', '2024-08-01 20:42:37'),
(41, 'What protocol is used to receive emails?', 1, 0, '2024-08-01 20:43:11', '2024-08-01 20:43:11'),
(42, 'What does AI stand for in the context of graphics?', 4, 0, '2024-08-01 20:46:53', '2024-08-01 20:46:53'),
(43, 'Which software is widely used for creating AI-generated graphics?', 4, 0, '2024-08-01 20:47:29', '2024-08-01 20:47:29'),
(44, 'Which AI tool is known for turning text descriptions into images?', 4, 0, '2024-08-01 20:47:56', '2024-08-01 20:47:56'),
(45, 'What technique allows AI to generate new images by learning from a dataset of images?', 4, 0, '2024-08-01 20:48:51', '2024-08-01 20:48:51'),
(46, 'Which AI technique is used to add artistic styles to images?', 4, 0, '2024-08-01 20:49:15', '2024-08-01 20:49:15'),
(47, 'What is a primary benefit of using AI in graphic design?', 4, 0, '2024-08-01 20:49:43', '2024-08-01 20:49:43'),
(48, 'wed', 5, 0, '2024-08-18 03:15:12', '2024-08-18 03:15:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
