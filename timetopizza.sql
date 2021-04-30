-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 30 2021 г., 18:24
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `timetopizza`
--

-- --------------------------------------------------------

--
-- Структура таблицы `drinks`
--

CREATE TABLE `drinks` (
  `id` int(8) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(8) NOT NULL,
  `image` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `drinks`
--

INSERT INTO `drinks` (`id`, `name`, `price`, `image`) VALUES
(1, 'Coca Cola', 25, 'images\\drinks\\coca.jpg'),
(2, 'Fanta', 25, 'images\\drinks\\fanta.jpg'),
(3, '7 Up', 25, 'images\\drinks\\sevenup.jpg'),
(4, 'Pepsi', 25, 'images\\drinks\\pepsi.jpg'),
(5, 'Mirinda', 25, 'images\\drinks\\mirinda.jpg'),
(7, 'Sandora apple', 35, 'images\\drinks\\sandora-apple.jpg'),
(8, 'Sandora grapes', 35, 'images\\drinks\\sandora-grapes.jpg'),
(9, 'Sandora mix', 35, 'images\\drinks\\sandora-mix.jpg'),
(10, 'Sandora orange', 35, 'images\\drinks\\sandora-orange.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `pizza`
--

CREATE TABLE `pizza` (
  `id` int(11) NOT NULL,
  `name` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredients` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pizza`
--

INSERT INTO `pizza` (`id`, `name`, `ingredients`, `weight`, `price`, `image`) VALUES
(1, 'Classic', 'Tomato sauce, mozzarella cheese, appetizing salami with juicy ham, ripe tomatoes, mushrooms   ', 550, 210, 'images\\pizza_cards\\classic.jpg'),
(2, 'Margarita', 'Tomato sauce, mozzarella cheese and ripe tomatoes', 550, 150, 'images\\pizza_cards\\margarita.png'),
(3, 'Four Seasons', 'Tomato sauce, mozzarella cheese, mushrooms, salami, dorblyu cheese', 550, 175, 'images\\pizza_cards\\pitstsa-chetyre-sezona.png'),
(4, 'Vegetarian', 'Tomato sauce, mozzarella cheese, mushrooms, sweet peppers, sweet corn, onions, olives and fresh herbs', 590, 180, 'images\\pizza_cards\\vegetarianskaya.png'),
(5, 'Munich', 'Mustard sauce, mozzarella cheese, salami,\r\npickled onions, hunting sausages, smoked chicken fillet, some greens and spicy garlic oil.', 560, 190, 'images\\pizza_cards\\myunhenskaya.jpg'),
(6, 'Hawaiian', 'Tomato sauce, mozzarella cheese, sweet corn,\r\nsmoked chicken fillet in combination with tropical pineapple.', 550, 200, 'images\\pizza_cards\\gavayskaya.png'),
(7, 'Pepperoni', 'Tomato sauce, mozzarella cheese combined with hot pepperoni sausage', 500, 200, 'images\\pizza_cards\\pepperoni.jpg'),
(8, 'Americano', 'Mustard sauce, mozzarella cheese, mushrooms,\r\nripe tomatoes, hunting sausages, french fries, fresh parsley', 650, 210, 'images\\pizza_cards\\pitstsa-amerikano.jpg'),
(9, 'Bavarian', 'Mustard and tomato sauce, mozzarella cheese, hunting sausages,\r\nhomemade sausages, pickles and parsley', 540, 200, 'images\\pizza_cards\\bavarsky.jpg'),
(10, 'Barbecue', 'Barbecue sauce, mozzarella cheese, mushrooms, onions,\r\ncrispy bacon, pork and fresh parsley', 550, 200, 'images\\pizza_cards\\barbekyu.jpg'),
(11, 'Tartarino', 'Cream sauce, mozzarella cheese, mushrooms, sweet pepper,\r\ntender chicken fillet, fine feta cheese, smoked chicken fillet, fresh herbs', 580, 210, 'images\\pizza_cards\\tartarino.png'),
(12, 'Four cheeses', 'Cream sauce, mozzarella cheese, dor blue cheese, feta cheese and parmesan cheese', 550, 230, 'images\\pizza_cards\\chetyre-syra.png'),
(13, 'Marine', 'Basil sauce, mozzarella cheese, seafood mix,\r\nlemon, fresh herbs.', 570, 300, 'images\\pizza_cards\\morskaya.jpg'),
(14, 'Philadelphia', 'Tomato sauce, mozzarella cheese, salmon, cream cheese, black sesame', 540, 280, 'images\\pizza_cards\\filadelfiya.png'),
(15, 'Carbonara', 'Mustard sauce and carbonara sauce, mozzarella cheese, bacon,\r\nham, onion and parmesan cheese', 560, 210, 'images\\pizza_cards\\karbonara.png');

-- --------------------------------------------------------

--
-- Структура таблицы `pizzaorders`
--

CREATE TABLE `pizzaorders` (
  `id` int(8) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sum` int(8) NOT NULL,
  `order` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery` tinyint(1) NOT NULL DEFAULT 0,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cooked` tinyint(1) DEFAULT 0,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `clientId` int(11) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pizzaorders`
--

INSERT INTO `pizzaorders` (`id`, `name`, `phone`, `sum`, `order`, `delivery`, `address`, `cooked`, `completed`, `clientId`, `date`) VALUES
(68, 'Yaroslav', '3809326944XX', 150, 'Margarita*1, ', 0, NULL, 0, 0, 1, '2030-04-21'),
(69, 'Yaroslav', '3809326944XX', 255, 'Vegetarian*1, Coca Cola*3, ', 0, NULL, 1, 1, 1, '2030-04-21');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `phone`, `gender`, `status`) VALUES
(1, 'yaroslavdoma@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Yaroslav', '3809326944XX', 'Male', 'Admin'),
(2, 'ann@gmail.com', '202cb962ac59075b964b07152d234b70', 'Anna', '38093265356XX', 'Female', 'Client'),
(3, 'ivan@gmail.com', '2c42e5cf1cdbafea04ed267018ef1511', 'Ivan', '', 'Male', 'Deliveryman'),
(4, 'julia@gmail.com', 'c2e285cb33cecdbeb83d2189e983a8c0', 'Julia', '987654321', 'Female', 'Cook'),
(5, 'anastasiya@gmail.com', '202cb962ac59075b964b07152d234b70', 'Anastasiya', '', 'Female', 'Client'),
(6, 'oleg@gmail.com', '045b9e4d8b96dce053950297a8a39665', 'Oleg', '', 'Male', 'Client'),
(7, 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Denis', '', 'Male', 'Client');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pizzaorders`
--
ALTER TABLE `pizzaorders`
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
-- AUTO_INCREMENT для таблицы `drinks`
--
ALTER TABLE `drinks`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `pizza`
--
ALTER TABLE `pizza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `pizzaorders`
--
ALTER TABLE `pizzaorders`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
