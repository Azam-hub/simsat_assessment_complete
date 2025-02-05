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
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int NOT NULL,
  `correct_option` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `other_options` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `question_id` int NOT NULL,
  `created_at` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `updated_at` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `correct_option`, `other_options`, `question_id`, `created_at`, `updated_at`) VALUES
(1, 'Hyper Text Markup Language', '[\"Home Tool Markup Language\",\"Hyperlinks Text Mark Language\",\"Hyperlinks and Text Markup Language\"]', 1, '2024-08-01 20:00:26', '2024-08-01 20:00:26'),
(2, '<style>', '[\"<css>\",\"<script>\",\"<link>\"]', 2, '2024-08-01 20:01:06', '2024-08-01 20:01:06'),
(3, 'style', '[\"font\",\"styles\",\"class\"]', 3, '2024-08-01 20:01:45', '2024-08-01 20:01:45'),
(4, 'background-color', '[\"color\",\"bgcolor\",\"background\"]', 4, '2024-08-01 20:02:31', '2024-08-01 20:02:31'),
(5, '/* this is a comment */', '[\"\\/\\/ this is a comment\",\"<!-- this is a comment -->\",\"this is a comment\"]', 5, '2024-08-01 20:03:21', '2024-08-01 20:03:21'),
(6, 'font-family', '[\"font-weight\",\"font-style\",\"font-size\"]', 6, '2024-08-01 20:03:43', '2024-08-01 20:03:43'),
(7, '<ul>', '[\"<ol>\",\"<li>\",\"<list>\"]', 7, '2024-08-01 20:04:06', '2024-08-01 20:04:06'),
(8, '<a href=\"http://www.example.com\">Example</a>', '[\"<link href=\\\"http:\\/\\/www.example.com\\\">Example<\\/link>\",\"<a url=\\\"http:\\/\\/www.example.com\\\">Example<\\/a>\",\"<url href=\\\"http:\\/\\/www.example.com\\\">Example<\\/url>\"]', 8, '2024-08-01 20:04:32', '2024-08-01 20:04:32'),
(9, '<table>', '[\"<tbl>\",\"<t>\",\"<tb>\"]', 9, '2024-08-01 20:05:07', '2024-08-01 20:05:18'),
(10, 'font-size', '[\"font-style\",\"text-size\",\"text-style\"]', 10, '2024-08-01 20:05:57', '2024-08-01 20:05:57'),
(11, '<input type=\"checkbox\">', '[\"<checkbox>\",\"<check>\",\"<input type=\\\"check\\\">\"]', 11, '2024-08-01 20:07:01', '2024-08-01 20:07:01'),
(12, '<select>', '[\"<list>\",\"<dropdown>\",\"<ul>\"]', 12, '2024-08-01 20:07:32', '2024-08-01 20:07:32'),
(13, 'font-weight', '[\"font-style\",\"text-decoration\",\"text-transform\"]', 13, '2024-08-01 20:08:09', '2024-08-01 20:08:09'),
(14, '<ol>', '[\"<ul>\",\"<list>\",\"<numlist>\"]', 14, '2024-08-01 20:08:35', '2024-08-01 20:08:35'),
(15, 'alt', '[\"title\",\"src\",\"longdesc\"]', 15, '2024-08-01 20:09:01', '2024-08-01 20:09:01'),
(16, 'Adobe Illustrator', '[\"Adobe Photoshop\",\"CorelDRAW\",\"GIMP\"]', 16, '2024-08-01 20:20:48', '2024-08-01 20:20:48'),
(17, 'Red, Green, Blue', '[\"Red, Green, Black\",\"Red, Gray, Blue\",\"Red, Gold, Blue\"]', 17, '2024-08-01 20:21:24', '2024-08-01 20:21:24'),
(18, 'TIFF', '[\"JPEG\",\"PNG\",\"GIF\"]', 18, '2024-08-01 20:21:45', '2024-08-01 20:21:45'),
(19, 'Home', '[\"Insert\",\"Design\",\"Layout\"]', 19, '2024-08-01 20:22:15', '2024-08-01 20:22:15'),
(20, 'Ctrl + B', '[\"Ctrl + I\",\"Ctrl + U\",\"Ctrl + O\"]', 20, '2024-08-01 20:22:45', '2024-08-01 20:22:45'),
(21, 'Show/Hide', '[\"Word Count\",\"Track Changes\",\"Find and Replace\"]', 21, '2024-08-01 20:23:15', '2024-08-01 20:23:15'),
(22, 'Dots Per Inch', '[\"Depth Per Image\",\"Design Per Inch\",\"Dots Per Image\"]', 22, '2024-08-01 20:24:02', '2024-08-01 20:24:02'),
(23, 'CMYK', '[\"RGB\",\"HSL\",\"HEX\"]', 23, '2024-08-01 20:26:31', '2024-08-01 20:26:31'),
(24, 'To ensure that the design extends beyond the trim edge', '[\"To add color to the edges\",\"To highlight important areas\",\"To create a border\"]', 24, '2024-08-01 20:27:02', '2024-08-01 20:27:02'),
(25, 'Eyedropper Tool', '[\"Move Tool\",\"Magic Wand Tool\",\"Brush Tool\"]', 25, '2024-08-01 20:27:27', '2024-08-01 20:27:27'),
(26, 'Arial', '[\"Times New Roman\",\"Georgia\",\"Garamond\"]', 26, '2024-08-01 20:27:58', '2024-08-01 20:27:58'),
(27, 'The space between characters', '[\"The space between lines of text\",\"The thickness of a font\",\"The style of a font\"]', 27, '2024-08-01 20:28:21', '2024-08-01 20:28:21'),
(28, 'PNG', '[\"JPEG\",\"BMP\",\"GIF\"]', 28, '2024-08-01 20:28:53', '2024-08-01 20:28:53'),
(29, 'Adobe Photoshop', '[\"Adobe Illustrator\",\"CorelDRAW\",\"InDesign\"]', 29, '2024-08-01 20:33:21', '2024-08-01 20:33:21'),
(30, 'Photoshop Document', '[\"Photo Style Document\",\"Portable Style Document\",\"Photoshop Design\"]', 30, '2024-08-01 20:33:51', '2024-08-01 20:33:51'),
(31, 'Balance', '[\"Contrast\",\"Proximity\",\"Repetition\"]', 31, '2024-08-01 20:34:18', '2024-08-01 20:34:18'),
(32, 'GIF', '[\"PNG\",\"JPEG\",\"SVG\"]', 32, '2024-08-01 20:35:15', '2024-08-01 20:35:15'),
(33, 'SUM()', '[\"TOTAL()\",\"ADD()\",\"COUNT()\"]', 33, '2024-08-01 20:38:38', '2024-08-01 20:38:38'),
(34, '=', '[\"#\",\"@\",\"&\"]', 34, '2024-08-01 20:39:03', '2024-08-01 20:39:03'),
(35, 'Insert', '[\"Home\",\"Page Layout\",\"Data\"]', 35, '2024-08-01 20:39:39', '2024-08-01 20:39:39'),
(36, 'Normal', '[\"Slide Sorter\",\"Slide Show\",\"Reading\"]', 36, '2024-08-01 20:40:59', '2024-08-01 20:40:59'),
(37, 'Ctrl + M', '[\"Ctrl + N\",\"Ctrl + S\",\"Ctrl + O\"]', 37, '2024-08-01 20:41:22', '2024-08-01 20:41:22'),
(38, 'Slide Master', '[\"Slide Sorter\",\"Slide Layout\",\"Slide Design\"]', 38, '2024-08-01 20:41:44', '2024-08-01 20:41:44'),
(39, 'Local Area Network', '[\"Large Area Network\",\"Light Area Network\",\"Long Area Network\"]', 39, '2024-08-01 20:42:09', '2024-08-01 20:42:09'),
(40, 'Router', '[\"Hub\",\"Switch\",\"Modem\"]', 40, '2024-08-01 20:42:37', '2024-08-01 20:42:37'),
(41, 'POP3', '[\"HTTP\",\"FTP\",\"SMTP\"]', 41, '2024-08-01 20:43:11', '2024-08-01 20:43:11'),
(42, 'Artificial Intelligence', '[\"Artificial Illustration\",\"Automatic Imaging\",\"Advanced Illustration\"]', 42, '2024-08-01 20:46:53', '2024-08-01 20:46:53'),
(43, 'DeepArt', '[\"Adobe Photoshop\",\"Adobe Illustrator\",\"CorelDRAW\"]', 43, '2024-08-01 20:47:29', '2024-08-01 20:47:29'),
(44, 'DALL-E', '[\"DeepDream\",\"StyleGAN\",\"Prisma\"]', 44, '2024-08-01 20:47:56', '2024-08-01 20:47:56'),
(45, 'Generative Adversarial Networks (GANs)', '[\"Supervised Learning\",\"Reinforcement Learning\",\"Clustering\"]', 45, '2024-08-01 20:48:51', '2024-08-01 20:48:51'),
(46, 'Neural Style Transfer', '[\"Image Classification\",\"Object Detection\",\"Semantic Segmentation\"]', 46, '2024-08-01 20:49:15', '2024-08-01 20:49:15'),
(47, 'Automated and faster creation of designs', '[\"Increased manual effort\",\"Limited creativity\",\"Higher cost\"]', 47, '2024-08-01 20:49:43', '2024-08-01 20:49:43'),
(48, 's', '[\"w\",\"s\",\"s\"]', 48, '2024-08-18 03:15:12', '2024-08-18 03:15:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
