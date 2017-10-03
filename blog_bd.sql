-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Окт 03 2017 г., 17:39
-- Версия сервера: 5.7.13
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog_bd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `preview` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `text` text NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id`, `author`, `title`, `preview`, `image`, `text`, `category_id`, `date`, `views`) VALUES
(1, 'kovel', 'Adventures_title1', '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>', '../saves/images/map.jpg', '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi dolorem doloribus hic laborum magni non praesentium quas quidem velit voluptatum?</div>', 2, '2017-08-29 20:06:00', 265),
(3, 'hhgh', 'IT_hghgh', '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>', '../saves/images/map.jpg', '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi dolorem doloribus hic laborum magni non praesentium quas quidem velit voluptatum?</div>', 1, '2017-08-29 20:10:00', 305),
(4, 'kovel', 'IT', '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>', '../saves/images/map.jpg', '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi dolorem doloribus hic laborum magni non praesentium quas quidem velit voluptatum?</div>', 1, '2017-08-30 04:00:00', 1),
(5, 'kovel', 'Adventures', '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>', '../saves/images/map.jpg', '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi dolorem doloribus hic laborum magni non praesentium quas quidem velit voluptatum?</div>', 2, '2017-08-30 03:00:00', 2),
(12, 'kovel', 'webdesign_3', '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>', '../saves/images/note.jpg', '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi dolorem doloribus hic laborum magni non praesentium quas quidem velit voluptatum?</div>', 3, '2017-08-30 08:10:00', 7),
(13, 'fggf', 'fhfgh', 'fghf', '../saves/images/note.jpg', 'fghfgh', 2, '2017-09-13 01:06:57', 0),
(14, 'admin', 'sfsss', 'asfsgsg', '../saves/images/20170913025304note.jpg', '&lt;p&gt;ddddddddddddddddddddddddddddd&lt;/p&gt;\r\n', 1, '2017-09-13 02:53:04', 5),
(16, 'admin', 'sfsss', 'bbbbbbbbbbbb', '../saves/images/20170913141838OowMBcTwqzw.jpg', '&lt;p&gt;ffffffffffffffffffffffffff&lt;/p&gt;', 1, '2017-09-13 14:18:38', 1),
(17, 'admin', 'drop-shadow()', 'ddddddddd', '../saves/images/20170913142438mvbPJXkwAxk.jpg', '&lt;p&gt;ccccccccccc&lt;/p&gt;', 1, '2017-09-13 14:24:38', 1),
(18, 'admin', 'mmm', 'dgfdgdf', '../saves/images/20170913142922Oleksandr_Magnum.png', '&lt;p&gt;fdgdfgdgdf&lt;/p&gt;', 1, '2017-09-13 14:29:22', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `articles_categories`
--

CREATE TABLE `articles_categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles_categories`
--

INSERT INTO `articles_categories` (`id`, `title`) VALUES
(1, 'IT Technologies'),
(2, 'Adventures'),
(3, 'Webdesign');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `author` varchar(100) DEFAULT NULL,
  `nickname` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `pubdate` datetime NOT NULL,
  `articles_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `author`, `nickname`, `email`, `text`, `pubdate`, `articles_id`, `user_id`) VALUES
(1, 'kovel', 'magnum', 'mag@gmail.com', '<div>Lorem 1</div>', '2017-09-01 02:00:00', 2, 0),
(2, 'zorb', 'mars', 'zorb@gmail.com', '<div>Lorem 2</div>', '2017-09-01 03:00:00', 3, 0),
(3, 'cobi', 'bro', 'cobi@gmail.com', '<div>Lorem 3</div>', '2017-09-01 04:00:00', 3, 0),
(4, 'zack', 'snaider', 'zack@gmail.com', '<div>Lorem 4 dfosdihdsoighdshdsighodihgoidshgiosdhgiodshgoidshgoidhgoidsgosdgnosdghdsogihdogihdsoghdosighoidshgoidsgosidgondivsidgsodighodsivdsoivjdsiojdsoijoidsiodbosidoidhgoidvjiosviodsgigoisdgdsivsdoigdig</div>', '2017-09-01 04:00:00', 1, 0),
(5, 'zack', 'snaider', 'zack@gmail.com', '<div>Lorem 5 dfosdihdsoighdshdsighodihgoidshgiosdhgiodshgoidshgoidhgoidsgosdgnosdghdsogihdogihdsoghdosighoidshgoidsgosidgondivsidgsodighodsivdsoivjdsiojdsoijoidsiodbosidoidhgoidvjiosviodsgigoisdgdsivsdoigdig</div>', '2017-09-05 04:00:00', 1, 0),
(6, 'vovk', 'vovk74', 'vovk74@mail.com', 'I am vovk74)))) ha ha!!', '2017-09-06 23:47:29', 3, 0),
(9, 'dfdfd', 'dfdfd7', 'dfdfd7@mail.com', 'I am dfdfd7', '2017-09-07 00:16:05', 3, 0),
(13, 'test1', 'test1', 'test1@i.ua', 'test1', '2017-09-07 00:58:34', 3, 0),
(15, 'test2', 'test2', 'test2@i.ua', 'test2', '2017-09-07 01:01:31', 3, 0),
(64, 'sdvdvd', 'dsfds', 'fdsf@dfghd', 'TEST 3', '2017-09-20 15:12:54', 3, 0),
(81, 'qwerty5', 'jgjhg', 'qwerty5@qwerty5', 'gjhgjghjgh', '2017-10-02 12:16:47', 1, 20),
(82, 'qwerty5', 'ghjghj', 'qwerty5@qwerty5', 'ghjghjghj', '2017-10-02 12:16:57', 1, 20),
(83, 'qwerty5', 'hjgjh', 'qwerty5@qwerty5', 'jjjjjjjjj', '2017-10-02 12:17:05', 1, 20),
(84, 'qwerty5', 'hjhj', 'qwerty5@qwerty5', 'jjjjjjjjjjjhhhhhhh', '2017-10-02 12:17:10', 1, 20),
(85, 'qwerty5', 'gjghj', 'qwerty5@qwerty5', 'ddddddd', '2017-10-02 12:17:18', 1, 20);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` varchar(11) NOT NULL DEFAULT '0',
  `ban` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `admin`, `ban`) VALUES
(20, 'qwerty5', 'qwerty5@gmail.com', '9b151156022bcd30afec03dfc8d73b25', '0', 0),
(21, 'admin001', 'admin001@gmail.com', '5583413443164b56500def9a533c7c70', '1', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `articles_categories`
--
ALTER TABLE `articles_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблицы `articles_categories`
--
ALTER TABLE `articles_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
