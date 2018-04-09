-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `friendbook`
--

-- --------------------------------------------------------

--
-- Структура на таблица `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `edited_date` datetime DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `comments`
--

INSERT INTO `comments` (`id`, `description`, `comment_date`, `edited_date`, `post_id`, `owner_id`) VALUES
(36, 'добре си постнал, сега ще лайкна', '2018-04-06 09:32:45', NULL, 15, 5),
(37, 'a', '2018-04-07 09:39:09', NULL, 15, 5),
(38, 'dsadsa', '2018-04-07 17:43:02', NULL, 15, 4),
(39, 'daswqe', '2018-04-07 17:43:06', NULL, 15, 4),
(40, 'dsa', '2018-04-07 17:43:17', NULL, 16, 4),
(41, 'dsawq', '2018-04-07 17:43:19', NULL, 16, 4),
(42, 'dasqwe', '2018-04-07 17:43:25', NULL, 16, 4),
(43, 'daskjsad ajkshdas kajdsh akjashddaskjsad ajkshdas kajdsh akjashddaskjsad ajkshdas kajdsh akjashddaskjsad ajkshdas kajdsh akjashddaskjsad ajkshdas kajdsh akjashddaskjsad ajkshdas kajdsh akjashddaskjsad ajkshdas kajdsh akjashddaskjsad ajkshdas kajdsh akjash', '2018-04-07 17:43:35', NULL, 16, 4),
(44, 'dobre', '2018-04-07 23:10:33', NULL, 16, 5),
(45, 'testing', '2018-04-07 23:51:16', NULL, 16, 5),
(46, 'ами тествам коментарите', '2018-04-08 02:34:14', NULL, 16, 5),
(47, 'brao mn dobre', '2018-04-08 14:08:53', NULL, 16, 4),
(48, 'sssa', '2018-04-08 14:09:11', NULL, 16, 4),
(49, 'das', '2018-04-08 14:09:18', NULL, 16, 4),
(50, 'test', '2018-04-09 10:00:59', NULL, 16, 5);

-- --------------------------------------------------------

--
-- Структура на таблица `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура на таблица `friends`
--

CREATE TABLE `friends` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `likes`
--

CREATE TABLE `likes` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `likes`
--

INSERT INTO `likes` (`post_id`, `user_id`) VALUES
(15, 4),
(16, 5);

-- --------------------------------------------------------

--
-- Структура на таблица `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `edit_date` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `posts`
--

INSERT INTO `posts` (`id`, `description`, `create_date`, `edit_date`, `user_id`) VALUES
(15, 'поствам да видим кво ще се случи', '2018-04-06 09:31:17', NULL, 4),
(16, 'asd', '2018-04-07 15:19:34', NULL, 5);

-- --------------------------------------------------------

--
-- Структура на таблица `post_images`
--

CREATE TABLE `post_images` (
  `post_id` int(11) NOT NULL,
  `image_url` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `gender` varchar(45) NOT NULL,
  `birthday` date NOT NULL,
  `relation_status` varchar(30) DEFAULT NULL,
  `profile_pic` varchar(200) NOT NULL,
  `profile_cover` varchar(200) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `display_name` varchar(45) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `mobile_number` int(11) DEFAULT NULL,
  `www` varchar(100) DEFAULT NULL,
  `skype` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `reg_date`, `gender`, `birthday`, `relation_status`, `profile_pic`, `profile_cover`, `description`, `display_name`, `country_id`, `mobile_number`, `www`, `skype`) VALUES
(4, 'eray', 'myumyun', 'eray@abv.bg', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2018-04-07 09:28:37', 'male', '2018-03-15', NULL, '../uploads/male_default_picture.png', '../uploads/default_cover.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Komara', 'Komarov', 'komara_@abv.bg', 'f10e2821bbbea527ea02200352313bc059445190', '2018-04-09 14:19:11', 'male', '1988-12-22', '', '../uploads/male_default_picture.png', '../uploads/default_cover.jpg', NULL, '', NULL, 0, '', ''),
(6, 'asd', 'asd', 'asd1@abv.bg', 'f10e2821bbbea527ea02200352313bc059445190', '2018-03-28 14:53:33', 'female', '0002-02-22', NULL, '../uploads/female_default_picture.png', '../uploads/default_cover.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'test1', 'test1', 'test1@abv.bg', 'f10e2821bbbea527ea02200352313bc059445190', '2018-03-29 12:16:28', 'female', '0002-02-12', NULL, '../uploads/female_default_picture.png', '../uploads/default_cover.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Dimitar', 'Bogoslovov', 'bogi@abv.bg', 'f10e2821bbbea527ea02200352313bc059445190', '2018-03-31 12:57:57', 'male', '0002-02-22', NULL, '../uploads/male_default_picture.png', '../uploads/default_cover.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Guray', 'Myumyun', 'email@gmail.com', '4e079d0555e5a2b460969c789d3ad968a795921f', '2018-04-06 09:34:41', 'male', '2018-04-17', NULL, '../uploads/male_default_picture.png', '../uploads/default_cover.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(10, NULL, NULL, '', '', '2018-04-08 16:43:03', '', '0000-00-00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commented_post_fk_idx` (`post_id`),
  ADD KEY `commented_owner_fk_idx` (`owner_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `country_name_UNIQUE` (`country_name`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`user_id`,`friend_id`),
  ADD KEY `user_friends_fk_idx` (`friend_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD KEY `liked_post_fk_idx` (`post_id`),
  ADD KEY `user_like_fk_idx` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_post_fk_idx` (`user_id`);

--
-- Indexes for table `post_images`
--
ALTER TABLE `post_images`
  ADD KEY `image_to_post_idx` (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `country_id_fk_idx` (`country_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `commented_owner_fk` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `commented_post_fk` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения за таблица `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `user_be_friend_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_friends_fk` FOREIGN KEY (`friend_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения за таблица `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `liked_post_fk` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_like_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения за таблица `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `user_post_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения за таблица `post_images`
--
ALTER TABLE `post_images`
  ADD CONSTRAINT `image_to_post` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения за таблица `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `country_id_fk` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
