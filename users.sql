-- phpMyAdmin SQL Dump
-- version 4.6.6deb4+deb9u1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Сен 24 2020 г., 23:43
-- Версия сервера: 5.6.49
-- Версия PHP: 7.0.33-0+deb9u9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pdo-test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `userName` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `active_hex` varchar(32) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `userName`, `password`, `salt`, `active_hex`, `status`) VALUES
(2, 'mail@dd', 'Gtyy', '62f6d3a46232fc6de6e25e9b022ac89a', 'e601e72a', '66ec203f056a392337defbfe171a5b91', 0),
(10, 'vasya@mail.com', 'Vasya', 'b0c1385d7ec7798f1814b8373668ccf3', 'a1a28499', 'fde4f32e59b99ec04dbd10251fe06eba', 0),
(12, 'daha@ee', 'dash', '5800fc97bd5e6a6950f60bd8872fa142', 'd6ead191', 'bd7c506ad75ad6e098d1e2703c64bc5f', 0),
(9, 'fhsdj@ff', 'assya', 'ee7ce8b334193bf3ff80eaa418491c7b', '3ef6b2a8', '35f8ccd5edaa1abb1cce8acda65d531e', 0),
(11, 'dasha@ee', 'dasha', '80f3621feb7120bafffa9402c27f5a91', '64e108e6', '9e3b01428283e830d717783978b70fa7', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
