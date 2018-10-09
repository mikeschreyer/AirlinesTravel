-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 09, 2018 at 05:12 PM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `AirlinesTravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

CREATE TABLE IF NOT EXISTS `airports` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`id`, `name`, `city`, `address`, `created`, `modified`) VALUES
(1, 'Montreal', 'Montreal', 'Aéroport international Pierre-Elliott-Trudeau de Montréal,', '2018-09-24 16:20:17', '2018-09-24 16:35:56'),
(2, 'Roma', 'Rome', 'Via dell'' Aeroporto di Fiumicino, 00054 Fiumicino RM, Italie', '2018-09-24 16:37:49', '2018-09-24 16:38:02');

-- --------------------------------------------------------

--
-- Table structure for table `airports_files`
--

CREATE TABLE IF NOT EXISTS `airports_files` (
  `id` int(11) NOT NULL,
  `airport_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `airports_tags`
--

CREATE TABLE IF NOT EXISTS `airports_tags` (
  `airport_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Active, 0 = Inactive'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `path`, `created`, `modified`, `status`) VALUES
(3, '2-jpg-tiger-hrc-siberie_21253111.jpg', 'Files/', '2018-09-27 13:12:11', '2018-09-27 13:12:11', 1),
(4, 'img_lights.jpg', 'Files/', '2018-09-27 13:25:50', '2018-09-27 13:25:50', 1),
(5, 'img_lights.jpg', 'Files/', '2018-09-27 13:26:03', '2018-09-27 13:26:03', 1),
(6, 'penda.jpg', 'Files/', '2018-09-27 13:26:19', '2018-09-27 13:26:19', 1),
(7, 'paysage_sable.jpg', 'Files/', '2018-10-04 13:21:42', '2018-10-04 13:21:42', 1),
(8, 'iamge_bleue.jpg', 'Files/', '2018-10-09 16:47:52', '2018-10-09 16:47:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE IF NOT EXISTS `flights` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `passenger_id` int(11) NOT NULL,
  `airport_id` int(11) NOT NULL,
  `depart` datetime NOT NULL,
  `arrival` datetime NOT NULL,
  `date_reservation` datetime NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`id`, `user_id`, `passenger_id`, `airport_id`, `depart`, `arrival`, `date_reservation`, `created`, `modified`) VALUES
(1, 1, 1, 1, '2018-09-27 14:18:00', '2018-09-27 14:18:00', '2018-09-27 14:18:00', 18, 10);

-- --------------------------------------------------------

--
-- Table structure for table `flights_tags`
--

CREATE TABLE IF NOT EXISTS `flights_tags` (
  `flight_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `i18n`
--

CREATE TABLE IF NOT EXISTS `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `i18n`
--

INSERT INTO `i18n` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(1, 'en_US', 'Articles', 6, 'title', 'Admin''s article'),
(2, 'en_US', 'Articles', 6, 'body', 'Admin''s new article to translate'),
(3, 'en_US', 'Tags', 4, 'title', 'English tag'),
(4, 'en_US', 'Tags', 1, 'title', 'Learning'),
(5, 'en_US', 'Tags', 2, 'title', 'global'),
(6, 'en_US', 'Tags', 3, 'title', 'health'),
(7, 'en_US', 'Articles', 1, 'title', 'First Post'),
(8, 'en_US', 'Articles', 1, 'body', 'This is the first post'),
(9, 'fr_CA', 'Airports', 1, 'city', 'Montréal'),
(10, 'it_IT', 'Airports', 2, 'city', 'Roma');

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE IF NOT EXISTS `passengers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`id`, `name`, `slug`, `phone`, `address`, `email`, `created`, `modified`) VALUES
(1, 'Michel', 'michel', '5147756994', '1660 bld souvenir', 'mschreyer@gmail.com', '2018-09-05 13:51:46', '2018-09-05 13:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modifief` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `created`, `modified`) VALUES
(1, 'michelschreyer18@gmail.com', '$2y$10$lGT5hZvjOn/sQfJe3SJ8AONWoy8.Rw6aS5v503r4A8u5gvyDxAZNi', 'admin', '2018-09-19 15:02:58', '2018-09-19 15:02:58'),
(2, 'admin@admin.ca', '$2y$10$Lv3qU9bA/Arfvih42BRxBOqoa1jRAM41JxH8sE3cFoMZYvU3loo0y', 'admin', '2018-09-19 15:03:16', '2018-09-19 15:03:16'),
(3, 'test@test.ca', '$2y$10$EP9SyDTgH6WtKEoBFp0WBemBXB5Fig6o9yesVW2RaAtPEbBtYu5aG', '', '2018-09-24 16:41:09', '2018-09-24 16:41:09'),
(4, 'michel.schreyer21@gmail.com', '$2y$10$rGQTsoJchkHvXpu9O/Zt4.kNr3iKtFotbwJ7FkE.G14xfWwKBuP8e', '', '2018-09-27 13:42:40', '2018-09-27 13:42:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airports`
--
ALTER TABLE `airports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `airports_files`
--
ALTER TABLE `airports_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_id` (`file_id`),
  ADD KEY `airport_id` (`airport_id`);

--
-- Indexes for table `airports_tags`
--
ALTER TABLE `airports_tags`
  ADD PRIMARY KEY (`airport_id`,`tag_id`),
  ADD KEY `fk_tags` (`tag_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `passenger_id` (`passenger_id`),
  ADD UNIQUE KEY `airport_id` (`airport_id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`),
  ADD UNIQUE KEY `user_id_5` (`user_id`,`passenger_id`,`airport_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_3` (`user_id`),
  ADD KEY `passenger_id_2` (`passenger_id`),
  ADD KEY `user_id_4` (`user_id`),
  ADD KEY `passenger_id_3` (`passenger_id`),
  ADD KEY `user_id_6` (`user_id`,`passenger_id`,`airport_id`);

--
-- Indexes for table `flights_tags`
--
ALTER TABLE `flights_tags`
  ADD PRIMARY KEY (`flight_id`,`tag_id`),
  ADD KEY `flight_id` (`flight_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `I18N_FIELD` (`model`,`foreign_key`,`field`);

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT for table `airports`
--
ALTER TABLE `airports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `airports_files`
--
ALTER TABLE `airports_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `passengers`
--
ALTER TABLE `passengers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `airports_files`
--
ALTER TABLE `airports_files`
  ADD CONSTRAINT `airports_files_ibfk_1` FOREIGN KEY (`airport_id`) REFERENCES `airports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `airports_files_ibfk_2` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `airports_tags`
--
ALTER TABLE `airports_tags`
  ADD CONSTRAINT `fk_airport` FOREIGN KEY (`airport_id`) REFERENCES `airports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tags` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flights`
--
ALTER TABLE `flights`
  ADD CONSTRAINT `flights_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flights_ibfk_2` FOREIGN KEY (`passenger_id`) REFERENCES `passengers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flights_ibfk_3` FOREIGN KEY (`airport_id`) REFERENCES `airports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flights_tags`
--
ALTER TABLE `flights_tags`
  ADD CONSTRAINT `flights_tags_ibfk_1` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flights_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
