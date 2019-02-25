-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3305
-- Время создания: Фев 25 2019 г., 17:38
-- Версия сервера: 5.7.16
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gallery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `feedback`) VALUES
(4, 'Олег', 'Сообщение'),
(11, 'Андрей', 'Отзыв');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback-item`
--

CREATE TABLE `feedback-item` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `feedback` text NOT NULL,
  `item-id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback-item`
--

INSERT INTO `feedback-item` (`id`, `name`, `feedback`, `item-id`) VALUES
(1, 'Василий', 'Очень хороший товар!', 3),
(2, 'Пётр', 'Ну такое...', 5),
(3, 'Кирилл', 'А мне понравилось...', 5),
(4, 'Анна', 'Нормуль', 2),
(9, 'Я', 'Вызывайте кракена!!!', 21),
(10, '1', '2', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `idx` int(11) NOT NULL,
  `filename` text NOT NULL,
  `likes` int(11) NOT NULL,
  `describes` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`idx`, `filename`, `likes`, `describes`, `price`) VALUES
(1, '01.jpg', 59, 'Космический мусор', 1240),
(2, '02.jpg', 25, 'Две луны на горизонте', 1100),
(3, '03.jpg', 16, 'Зеленая звезда', 990),
(4, '04.jpg', 13, 'Руины на фоне луны', 920),
(5, '05.jpg', 9, 'Антропология Ктулху', 1070),
(6, '06.jpg', 7, 'Ледяное солнце', 1200),
(7, '07.jpg', 7, 'Горная долина', 1190),
(8, '08.jpg', 8, 'Средневековая цитадель', 1210),
(9, '09.jpg', 9, 'Красный парусник', 1130),
(10, '10.jpg', 8, 'Норвежские фьорды', 1290),
(11, '11.jpg', 14, 'Космос, ты просто космос', 750),
(12, '12.jpg', 11, 'Зодиак', 730),
(13, '13.jpg', 67, 'Мост через жизнь', 810),
(14, '14.jpg', 7, 'Великая китайская стена', 900),
(15, '15.jpg', 7, 'Понурый эйфель', 780),
(20, '14169178489408.jpg', 12, 'конфуций', 120),
(21, '8.jpg', 1, '321', 11),
(22, 'eiWRTDEpT70.jpg', 0, 'Дети', 1500);

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
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback-item`
--
ALTER TABLE `feedback-item`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`idx`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `feedback-item`
--
ALTER TABLE `feedback-item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
