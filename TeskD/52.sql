-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-01-18 08:48:15
-- 伺服器版本： 10.4.27-MariaDB
-- PHP 版本： 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `52`
--

-- --------------------------------------------------------

--
-- 資料表結構 `comment`
--

CREATE TABLE `comment` (
  `id` text NOT NULL,
  `user` text NOT NULL,
  `content` text NOT NULL,
  `updated_at` text NOT NULL,
  `created_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `image`
--

CREATE TABLE `image` (
  `id` int(5) NOT NULL,
  `url` text NOT NULL,
  `width` text NOT NULL,
  `height` text NOT NULL,
  `created_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `image`
--

INSERT INTO `image` (`id`, `url`, `width`, `height`, `created_at`) VALUES
(14, 'Include/Image/1.jpg', '280', '255', '06:43:28 2023/01/18'),
(15, 'Include/Image/2.jpg', '259', '194', '06:43:28 2023/01/18'),
(16, 'Include/Image/3.png', '225', '225', '06:43:28 2023/01/18'),
(17, 'Include/Image/4.jpg', '224', '225', '06:43:28 2023/01/18'),
(18, 'Include/Image/5.png', '259', '194', '06:43:28 2023/01/18');

-- --------------------------------------------------------

--
-- 資料表結構 `post`
--

CREATE TABLE `post` (
  `id` int(5) NOT NULL,
  `author` text NOT NULL,
  `images` text DEFAULT NULL,
  `like_count` text NOT NULL,
  `content` text NOT NULL,
  `type` text NOT NULL,
  `tags` text NOT NULL,
  `location_name` text NOT NULL,
  `liked` tinyint(1) NOT NULL DEFAULT 0,
  `updated_at` text NOT NULL,
  `created_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `post`
--

INSERT INTO `post` (`id`, `author`, `images`, `like_count`, `content`, `type`, `tags`, `location_name`, `liked`, `updated_at`, `created_at`) VALUES
(9, 'admin', 'Include/Image/1.jpg,Include/Image/2.jpg,Include/Image/3.png,Include/Image/4.jpg,Include/Image/5.png,', '0', 'aaaaaaaaaaaaaaaaaaa', 'public', 'aa bb', 'fsdfsdfffe', 1, '', '06:43:28 2023/01/18'),
(10, 'admin', 'Include/Image/1.jpg,Include/Image/2.jpg,Include/Image/3.png,Include/Image/4.jpg,Include/Image/5.png,', '0', 'sddfsdffefef', 'public', 'aa bb', 'aaaa', 1, '', '06:43:44 2023/01/18');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `email` text NOT NULL,
  `nickname` text NOT NULL,
  `password` text NOT NULL,
  `profile_image` text DEFAULT NULL,
  `type` text NOT NULL,
  `access_token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `email`, `nickname`, `password`, `profile_image`, `type`, `access_token`) VALUES
(4, 'admin@web.tw', 'admin', 'adminpass', NULL, 'ADMIN', ''),
(5, 'user@web.tw', 'user', 'userpass', NULL, 'USER', ''),
(19, 'grasonjas@gmail.com', 'gggg', 'ffffffffffffffff', 'Include/Image/1.jpg', 'USER', 'd0e20afaf50a7760b3efe741f1f3127305d2f0dfd854c811f50b4dfbe860379e'),
(20, 'grasonyang@gmail.com', 'efeffeffwef', 'ssssssssssss', 'Include/Image/5.png', 'USER', '');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postimage` (`images`(1024));

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userimage` (`profile_image`(1024));

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `image`
--
ALTER TABLE `image`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `post`
--
ALTER TABLE `post`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
