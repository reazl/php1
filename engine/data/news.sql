-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 11 2019 г., 21:39
-- Версия сервера: 5.7.23
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `news`
--

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `prev` text NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `category`, `prev`, `text`) VALUES
(1, 1, 'Вице-премьер Италии призвал бороться против антироссийских санкций', 'Глава движения Пять звезд, министр экономического развития, труда и социальной политики Италии Луиджи Ди Майо\r\n© AFP 2019 / Alberto Pizzolo\r\nМОСКВА, 10 фев — РИА Новости. Правительство Италии намерено добиться пересмотра антироссийских санкций, заявил вице-премьер и министр экономического развития страны Луиджи Ди Майо. Об этом сообщило информационное агентство ANSA.\r\nДи Майо подчеркнул, что санкционный режим в отношении Москвы наносит значительный ущерб итальянскому бизнесу. По его словам, если компании несут огромные потери из-за антироссийских ограничений, то санкционную политику надо пересмотреть.'),
(2, 1, 'В России оценили призыв посла США к Германии увеличить расходы на оборону', 'Покровский собор (храм Василия Блаженного) и площадь Васильевский спуск \r\n© РИА Новости / Григорий Сысоев\r\nМОСКВА, 10 фев — РИА Новости. В обеих палатах парламента отреагировали на заявление посла США в Германии Ричарда Греннела о том, что \"Россия стоит на пороге\".\r\nТаким образом американский дипломат \"аргументировал\" необходимость увеличить расходы Берлина на оборону НАТО с полутора процентов до двух к 2024 году.');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
