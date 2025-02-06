-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 06, 2025 at 01:52 PM
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
-- Database: `simsat_assessment`
--
CREATE DATABASE IF NOT EXISTS `simsat_assessment` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `simsat_assessment`;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `questions_to_ask` int NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `questions_to_ask`, `is_deleted`, `created_at`) VALUES
(1, 'PCIT', 10, 0, '2025-02-05 04:24:25'),
(2, 'Web development', 11, 0, '2025-02-05 04:24:32'),
(3, 'Graphics Designing', 10, 0, '2025-02-05 04:24:37');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int NOT NULL,
  `question` text NOT NULL,
  `correct_option` text NOT NULL,
  `other_options` text NOT NULL,
  `course_id` int NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `correct_option`, `other_options`, `course_id`, `is_deleted`, `created_at`) VALUES
(1, 'What does HTML stand for?', 'Hyper Text Markup Language', '[\"Home Tool Markup Language\",\"Hyperlinks Text Mark Language\",\"Hyperlinks and Text Markup Language\"]', 2, 0, '2025-02-05 04:32:40'),
(2, 'Which HTML tag is used to define an internal style sheet?', '<style>', '[\"<css>\",\"<script>\",\"<link>\"]', 2, 0, '2025-02-05 04:32:40'),
(3, 'Which HTML attribute is used to define inline styles?', 'style', '[\"font\",\"styles\",\"class\"]', 2, 0, '2025-02-05 04:32:40'),
(4, 'Which CSS property is used to change the background color?', 'background-color', '[\"color\",\"bgcolor\",\"background\"]', 2, 0, '2025-02-05 04:32:40'),
(5, 'How do you insert a comment in a CSS file?', '/* this is a comment */', '[\"\\/\\/ this is a comment\",\"<!-- this is a comment -->\",\"this is a comment\"]', 2, 0, '2025-02-05 04:32:40'),
(6, 'Which property is used to change the font of an element?', 'font-family', '[\"font-weight\",\"font-style\",\"font-size\"]', 2, 0, '2025-02-05 04:32:40'),
(7, 'Which HTML tag is used to define an unordered list?', '<ul>', '[\"<ol>\",\"<li>\",\"<list>\"]', 2, 0, '2025-02-05 04:32:40'),
(8, 'How do you create a link in HTML?', '<a href=\"http://www.example.com\">Example</a>', '[\"<link href=\\\"http:\\/\\/www.example.com\\\">Example<\\/link>\",\"<a url=\\\"http:\\/\\/www.example.com\\\">Example<\\/a>\",\"<url href=\\\"http:\\/\\/www.example.com\\\">Example<\\/url>\"]', 2, 0, '2025-02-05 04:32:40'),
(9, 'Which HTML tag is used to define a table?', '<table>', '[\"<tbl>\",\"<t>\",\"<tb>\"]', 2, 0, '2025-02-05 04:32:40'),
(10, 'Which CSS property controls the text size?', 'font-size', '[\"font-style\",\"text-size\",\"text-style\"]', 2, 0, '2025-02-05 04:32:40'),
(11, 'Which tag is used to create a checkbox in HTML?', '<input type=\"checkbox\">', '[\"<checkbox>\",\"<check>\",\"<input type=\\\"check\\\">\"]', 2, 0, '2025-02-05 04:32:40'),
(12, 'Which tag is used to create a drop-down list in HTML?', '<select>', '[\"<list>\",\"<dropdown>\",\"<ul>\"]', 2, 0, '2025-02-05 04:32:40'),
(13, 'Which CSS property is used to make text bold?', 'font-weight', '[\"font-style\",\"text-decoration\",\"text-transform\"]', 2, 0, '2025-02-05 04:32:40'),
(14, 'How do you create a numbered list in HTML?', '<ol>', '[\"<ul>\",\"<list>\",\"<numlist>\"]', 2, 0, '2025-02-05 04:32:40'),
(15, 'Which HTML attribute specifies an alternate text for an image, if the image cannot be displayed?', 'alt', '[\"title\",\"src\",\"longdesc\"]', 2, 0, '2025-02-05 04:32:40'),
(16, 'Which tool is commonly used for creating vector graphics?', 'Adobe Illustrator', '[\"Adobe Photoshop\",\"CorelDRAW\",\"GIMP\"]', 3, 0, '2025-02-05 04:32:40'),
(17, 'What does RGB stand for in graphic design?', 'Red, Green, Blue', '[\"Red, Green, Black\",\"Red, Gray, Blue\",\"Red, Gold, Blue\"]', 3, 0, '2025-02-05 04:32:40'),
(18, 'Which file format is typically used for high-quality print graphics?', 'TIFF', '[\"JPEG\",\"PNG\",\"GIF\"]', 3, 0, '2025-02-05 04:32:40'),
(19, 'Which tab on the Ribbon do you use to change the font size?', 'Home', '[\"Insert\",\"Design\",\"Layout\"]', 1, 0, '2025-02-05 04:32:40'),
(20, 'How do you make text bold in Microsoft Word?', 'Ctrl + B', '[\"Ctrl + I\",\"Ctrl + U\",\"Ctrl + O\"]', 1, 0, '2025-02-05 04:32:40'),
(21, 'Which feature allows you to see hidden formatting symbols?', 'Show/Hide', '[\"Word Count\",\"Track Changes\",\"Find and Replace\"]', 1, 0, '2025-02-05 04:32:40'),
(22, 'What does DPI stand for?', 'Dots Per Inch', '[\"Depth Per Image\",\"Design Per Inch\",\"Dots Per Image\"]', 3, 0, '2025-02-05 04:32:40'),
(23, 'Which color model is used for print design?', 'CMYK', '[\"RGB\",\"HSL\",\"HEX\"]', 3, 0, '2025-02-05 04:32:40'),
(24, 'What is the purpose of a ‘bleed’ in printing?', 'To ensure that the design extends beyond the trim edge', '[\"To add color to the edges\",\"To highlight important areas\",\"To create a border\"]', 3, 0, '2025-02-05 04:32:40'),
(25, 'Which tool is used to select colors in Adobe Photoshop?', 'Eyedropper Tool', '[\"Move Tool\",\"Magic Wand Tool\",\"Brush Tool\"]', 3, 0, '2025-02-05 04:32:40'),
(26, 'Which of these is a commonly used sans-serif font?', 'Arial', '[\"Times New Roman\",\"Georgia\",\"Garamond\"]', 3, 0, '2025-02-05 04:32:40'),
(27, 'What does the term ‘kerning’ refer to?', 'The space between characters', '[\"The space between lines of text\",\"The thickness of a font\",\"The style of a font\"]', 3, 0, '2025-02-05 04:32:40'),
(28, 'Which file format is best for preserving the quality of a logo with a transparent background?', 'PNG', '[\"JPEG\",\"BMP\",\"GIF\"]', 3, 0, '2025-02-05 04:32:40'),
(29, 'Which software is primarily used for photo editing?', 'Adobe Photoshop', '[\"Adobe Illustrator\",\"CorelDRAW\",\"InDesign\"]', 3, 0, '2025-02-05 04:32:40'),
(30, 'What does the acronym PSD stand for?', 'Photoshop Document', '[\"Photo Style Document\",\"Portable Style Document\",\"Photoshop Design\"]', 3, 0, '2025-02-05 04:32:40'),
(31, 'Which design principle focuses on the arrangement of elements to create a sense of stability?', 'Balance', '[\"Contrast\",\"Proximity\",\"Repetition\"]', 3, 0, '2025-02-05 04:32:40'),
(32, 'Which file format is commonly used for web graphics that require animation?', 'GIF', '[\"PNG\",\"JPEG\",\"SVG\"]', 3, 0, '2025-02-05 04:32:40'),
(33, 'Which function is used to calculate the sum of a range of cells in Excel?', 'SUM()', '[\"TOTAL()\",\"ADD()\",\"COUNT()\"]', 1, 0, '2025-02-05 04:32:40'),
(34, 'How do you start a formula in Excel?', '=', '[\"#\",\"@\",\"&\"]', 1, 0, '2025-02-05 04:32:40'),
(35, 'Which tab contains the option to create a chart in Excel?', 'Insert', '[\"Home\",\"Page Layout\",\"Data\"]', 1, 0, '2025-02-05 04:32:40'),
(36, 'Which view is used to edit the content of individual slides?', 'Normal', '[\"Slide Sorter\",\"Slide Show\",\"Reading\"]', 1, 0, '2025-02-05 04:32:40'),
(37, 'How do you add a new slide in PowerPoint?', 'Ctrl + M', '[\"Ctrl + N\",\"Ctrl + S\",\"Ctrl + O\"]', 1, 0, '2025-02-05 04:32:40'),
(38, 'Which feature allows you to apply consistent formatting to all slides in a presentation?', 'Slide Master', '[\"Slide Sorter\",\"Slide Layout\",\"Slide Design\"]', 1, 0, '2025-02-05 04:32:40'),
(39, 'What does LAN stand for?', 'Local Area Network', '[\"Large Area Network\",\"Light Area Network\",\"Long Area Network\"]', 1, 0, '2025-02-05 04:32:40'),
(40, 'Which device is used to connect multiple networks together?', 'Router', '[\"Hub\",\"Switch\",\"Modem\"]', 1, 0, '2025-02-05 04:32:40'),
(41, 'What protocol is used to receive emails?', 'POP3', '[\"HTTP\",\"FTP\",\"SMTP\"]', 1, 0, '2025-02-05 04:32:40'),
(42, 'What does AI stand for in the context of graphics?', 'Artificial Intelligence', '[\"Artificial Illustration\",\"Automatic Imaging\",\"Advanced Illustration\"]', 4, 0, '2025-02-05 04:32:40'),
(43, 'Which software is widely used for creating AI-generated graphics?', 'DeepArt', '[\"Adobe Photoshop\",\"Adobe Illustrator\",\"CorelDRAW\"]', 4, 0, '2025-02-05 04:32:40'),
(44, 'Which AI tool is known for turning text descriptions into images?', 'DALL-E', '[\"DeepDream\",\"StyleGAN\",\"Prisma\"]', 4, 0, '2025-02-05 04:32:40'),
(45, 'What technique allows AI to generate new images by learning from a dataset of images?', 'Generative Adversarial Networks (GANs)', '[\"Supervised Learning\",\"Reinforcement Learning\",\"Clustering\"]', 4, 0, '2025-02-05 04:32:40'),
(46, 'Which AI technique is used to add artistic styles to images?', 'Neural Style Transfer', '[\"Image Classification\",\"Object Detection\",\"Semantic Segmentation\"]', 4, 0, '2025-02-05 04:32:40'),
(47, 'What is a primary benefit of using AI in graphic design?', 'Automated and faster creation of designs', '[\"Increased manual effort\",\"Limited creativity\",\"Higher cost\"]', 4, 0, '2025-02-05 04:32:40'),
(48, 'wed', 's', '[\"w\",\"s\",\"s\"]', 5, 0, '2025-02-05 04:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `gr` varchar(50) NOT NULL,
  `timing` varchar(50) NOT NULL,
  `course_id` int NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `number_of_correct` int NOT NULL,
  `number_of_wrong` int NOT NULL,
  `number_of_skipped` int NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `name`, `father_name`, `gr`, `timing`, `course_id`, `teacher`, `number_of_correct`, `number_of_wrong`, `number_of_skipped`, `is_deleted`, `created_at`) VALUES
(1, 'Muhammad Azam', 'Ashraf', '14555', '11-12', 3, 'qwqw', 3, 7, 0, 0, '2025-02-06 03:31:32'),
(2, 'Muhammad Azam', 'Ashraf', '121212', '12-13', 2, 'qazz', 8, 3, 0, 0, '2025-02-06 04:20:35'),
(3, 'Muhammad Azam', 'Ashraf', '121212', '12-13', 2, 'qazz', 8, 1, 2, 0, '2025-02-06 04:24:42'),
(4, 'Legend Azam', 'As', '9999', '20-21', 1, 'asasasas', 1, 7, 2, 0, '2025-02-06 04:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(500) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_deleted`, `created_at`) VALUES
(1, 'Muhammad Azams', 'azam78454@gmail.com', '$2y$10$64QZ6VCUKWMnKyw1WVyqWurPCtJWPiKpRVyQt0xGX//zjpKFwdlYS', 0, '2025-02-02 05:37:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
