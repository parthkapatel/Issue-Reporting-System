-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2021 at 02:44 PM
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
-- Database: `society_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `issue_reports`
--

CREATE TABLE `issue_reports` (
  `id` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `flat` varchar(5) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'open',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_reports`
--

INSERT INTO `issue_reports` (`id`, `email`, `name`, `contact`, `flat`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'parth@gmail.com', 'Parth KaPatel', '9924104072', '304', 'How Can I Teach with This Tool?', ',nm,nm,nm,nb,', 'open', '2021-03-09 12:02:12', '2021-03-09 12:02:12'),
(2, 'raj@gmail.com', 'Raj Desai', '9924104072', '304', 'Top 5 blogs for students by students', 'nhnghmngm', 'progress', '2021-03-09 12:31:42', '2021-03-09 13:38:00'),
(3, 'tanvi@gmail.com', 'Tanvi Patel', '1234569870', '212', 'Don’t Change What Works', 'bvnvbnvnvncvnn', 'open', '2021-03-09 12:56:11', '2021-03-09 12:56:11'),
(4, 'tanvi@gmail.com', 'Tanvi Patel', '1234569870', '212', 'What Does it Mean to Recalculate?', 'mbnmbnmnbmbmbmy', 'open', '2021-03-09 12:56:23', '2021-03-09 12:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `flat_number` varchar(5) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `contact`, `flat_number`, `address`, `email`, `password`) VALUES
(5, 'Parth', 'KaPatel', '9924104072', '304', 'Bharatkunj', 'parth@gmail.com', '$2y$10$/ovvsmuS3xnz.ZC2Vy34y.ANdvcCmVwb47cYnqFGaDCSvA2xlDszm'),
(6, 'Jay', 'Lad', '1234567890', '102', 'surat', 'jay@gmail.com', '$2y$10$szNGl.5jE.Cz0p45bAAwlONvv7J63uBpSzOq3MUDucR/EcJL2DbLG'),
(7, 'Raj', 'Desai', '9876543210', '201', 'surat', 'raj@gmail.com', '$2y$10$2GXEfXHuK9ekAuHsJ6ftgu2sUeg69XU1mZmYTRAiaEUgr7TZQu5n6'),
(19, 'Tanvi', 'Patel', '1234569870', '212', 'Nadiad', 'tanvi@gmail.com', '$2y$10$2FAt7MD3hTFviB4.jWedpeLew7hiddk.QM052MfjUy3eO/cZ8tjW2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `issue_reports`
--
ALTER TABLE `issue_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `issue_reports`
--
ALTER TABLE `issue_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `issue_reports`
--
ALTER TABLE `issue_reports`
  ADD CONSTRAINT `issue_reports_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
