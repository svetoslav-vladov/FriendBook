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
(50, 'test', '2018-04-09 10:00:59', NULL, 16, 5),
(51, 'zaza', '2018-04-09 15:49:52', NULL, 16, 4),
(52, 'aaa', '2018-04-09 15:50:00', NULL, 16, 4),
(53, 'd', '2018-04-09 17:04:36', NULL, 21, 4),
(54, 'asd', '2018-04-09 17:04:38', NULL, 21, 4),
(55, 'ds', '2018-04-09 17:05:04', NULL, 20, 4),
(56, 'ds', '2018-04-09 17:05:47', NULL, 19, 4),
(57, 'ds', '2018-04-09 17:06:54', NULL, 22, 4),
(58, 'dd', '2018-04-09 17:07:53', NULL, 23, 4),
(59, 'dss', '2018-04-09 17:08:38', NULL, 24, 4),
(60, 'zzzz', '2018-04-09 17:08:48', NULL, 24, 4),
(61, 'test', '2018-04-09 17:09:16', NULL, 25, 4),
(62, 'ds', '2018-04-09 17:19:27', NULL, 26, 4),
(63, 'sad', '2018-04-09 17:19:32', NULL, 26, 4),
(64, 'probwam', '2018-04-09 17:22:04', NULL, 27, 4),
(65, 'blabla', '2018-04-09 17:22:14', NULL, 27, 4),
(66, 'komentar ot brata', '2018-04-09 17:45:35', NULL, 27, 9),
(67, 'zaaa', '2018-04-09 17:45:43', NULL, 27, 9),
(68, 'www', '2018-04-09 17:47:35', NULL, 26, 9),
(69, 'aaa', '2018-04-09 17:47:44', NULL, 26, 9),
(70, 'www', '2018-04-09 17:49:10', NULL, 21, 9),
(71, 'wwww', '2018-04-09 19:09:01', NULL, 28, 9),
(72, 'www', '2018-04-09 19:09:17', NULL, 27, 9),
(73, 'wa', '2018-04-09 19:10:37', NULL, 28, 9),
(74, 'www', '2018-04-09 19:23:48', NULL, 29, 9),
(75, 'ww', '2018-04-09 19:24:10', NULL, 29, 9),
(76, 'bb', '2018-04-10 00:24:21', NULL, 30, 4),
(77, 'Браво само така', '2018-04-10 06:47:42', NULL, 31, 13),
(78, 'браво.. успех', '2018-04-10 08:40:12', NULL, 33, 4);

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

--
-- Схема на данните от таблица `friends`
--

INSERT INTO `friends` (`user_id`, `friend_id`) VALUES
(4, 5),
(4, 7),
(4, 8),
(4, 9),
(5, 4),
(5, 11);

-- --------------------------------------------------------

--
-- Структура на таблица `friend_requests`
--

CREATE TABLE `friend_requests` (
  `requested_user_id` int(11) NOT NULL,
  `status_requested` int(11) NOT NULL,
  `accepted_user_id` int(11) NOT NULL,
  `status_accepted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `friend_requests`
--

INSERT INTO `friend_requests` (`requested_user_id`, `status_requested`, `accepted_user_id`, `status_accepted`) VALUES
(11, 1, 6, 0),
(11, 1, 7, 0),
(11, 1, 8, 0),
(11, 1, 4, 0),
(5, 1, 4, 0),
(5, 1, 11, 0),
(13, 1, 5, 0);

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
(16, 5),
(16, 4),
(15, 4),
(19, 4),
(27, 4),
(22, 4),
(15, 9),
(19, 9),
(20, 9),
(21, 9),
(22, 9),
(23, 9),
(16, 9),
(29, 4),
(29, 11),
(28, 11),
(31, 13),
(30, 4),
(33, 4),
(28, 4);

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
(16, 'asd', '2018-04-07 15:19:34', NULL, 5),
(19, 'Ð·Ð·Ð·Ð·', '2018-04-09 16:32:52', NULL, 4),
(20, 'Ñ‚ÐµÑÑ‚', '2018-04-09 16:35:59', NULL, 4),
(21, 'Ð´ÑÐ°Ð´Ð°ÑÐ´', '2018-04-09 16:39:36', NULL, 4),
(22, 'zz', '2018-04-09 17:06:49', NULL, 4),
(23, 'za', '2018-04-09 17:07:47', NULL, 4),
(24, 'www.abv.bg', '2018-04-09 17:08:32', NULL, 4),
(25, 'probwam broq na komentarite', '2018-04-09 17:09:02', NULL, 4),
(26, 'ds', '2018-04-09 17:14:59', NULL, 4),
(27, 'www', '2018-04-09 17:19:53', NULL, 4),
(28, 'bbbb', '2018-04-09 18:49:38', NULL, 9),
(29, 'zaza', '2018-04-09 19:23:40', NULL, 9),
(30, 'wwwww', '2018-04-09 20:39:29', NULL, 11),
(31, 'асд', '2018-04-10 06:25:34', NULL, 5),
(32, 'Здравейте на всички, вече съм в социалната мрежа!', '2018-04-10 06:51:33', NULL, 13),
(33, 'Ремонтирам компютри!!!', '2018-04-10 07:44:43', NULL, 13);

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
(4, 'eray', 'myumyun', 'eray@abv.bg', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2018-04-10 08:40:48', 'male', '2018-03-15', '', '../uploads/users/1523349648-4.png', '../uploads/default_cover.jpg', NULL, 'Erchoooo', NULL, 0, '', ''),
(5, 'Svetoslav', 'V. Vladov', 'komara_@abv.bg', 'f10e2821bbbea527ea02200352313bc059445190', '2018-04-10 09:01:00', 'male', '1988-12-22', 'Deep inlove :D', '../uploads/users/1523342002-5.jpg', '../uploads/users/1523350860-5.jpg', NULL, 'Komara', NULL, 0, '', ''),
(6, 'asd', 'asd', 'asd1@abv.bg', 'f10e2821bbbea527ea02200352313bc059445190', '2018-03-28 14:53:33', 'female', '0002-02-22', NULL, '../uploads/female_default_picture.png', '../uploads/default_cover.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'test1', 'test1', 'test1@abv.bg', 'f10e2821bbbea527ea02200352313bc059445190', '2018-03-29 12:16:28', 'female', '0002-02-12', NULL, '../uploads/female_default_picture.png', '../uploads/default_cover.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Dimitar', 'Bogoslovov', 'bogi@abv.bg', 'f10e2821bbbea527ea02200352313bc059445190', '2018-03-31 12:57:57', 'male', '0002-02-22', NULL, '../uploads/male_default_picture.png', '../uploads/default_cover.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Guray', 'Myumyun', 'email@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2018-04-09 18:05:43', 'male', '2018-04-17', '', '../uploads/male_default_picture.png', '../uploads/default_cover.jpg', NULL, 'GMMM', NULL, 0, '', ''),
(11, 'test', 'test', 'test@abv.bg', 'f10e2821bbbea527ea02200352313bc059445190', '2018-04-10 06:31:32', 'female', '2018-04-13', '', '../uploads/users/1523341836-11.jpg', '../uploads/users/1523341892-11.jpg', NULL, 'Розалинда', NULL, 0, '', ''),
(12, 'new', 'new', 'new@abv.bg', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2018-04-09 20:29:25', 'female', '2018-04-25', NULL, '../uploads/female_default_picture.png', '../uploads/default_cover.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Ivan', 'Petrov', 'teros@abv.bg', 'f10e2821bbbea527ea02200352313bc059445190', '2018-04-10 07:45:15', 'male', '0022-02-22', '', '../uploads/users/1523342422-13.jpg', '../uploads/users/1523346255-13.jpg', NULL, 'Vancho Computers', NULL, 0, '', '');

-- --------------------------------------------------------

--
-- Структура на таблица `user_photos`
--

CREATE TABLE `user_photos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `img_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `user_photos`
--

INSERT INTO `user_photos` (`id`, `user_id`, `img_url`) VALUES
(3, 5, '../uploads/users/photos/1523351836-5.jpg'),
(4, 5, '../uploads/users/photos/1523352303-5.jpg'),
(5, 5, '../uploads/users/photos/1523352423-5.jpg'),
(6, 5, '../uploads/users/photos/1523352969-5.jpg'),
(7, 5, '../uploads/users/photos/1523353189-5.jpg');

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
-- Indexes for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD KEY `requested_friend_fk_idx` (`requested_user_id`),
  ADD KEY `accepted_friend_fk_idx` (`accepted_user_id`);

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
-- Indexes for table `user_photos`
--
ALTER TABLE `user_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk_idx` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user_photos`
--
ALTER TABLE `user_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
-- Ограничения за таблица `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD CONSTRAINT `accepted_friend_fk` FOREIGN KEY (`accepted_user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `requested_friend_fk` FOREIGN KEY (`requested_user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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

--
-- Ограничения за таблица `user_photos`
--
ALTER TABLE `user_photos`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
