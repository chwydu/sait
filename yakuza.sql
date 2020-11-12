-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 12 2020 г., 18:47
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yakuza`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `productId` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `orderId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `category`, `description`) VALUES
(1, 'Компьютеры', 'Что то из описания'),
(2, 'Процессоры', 'центральным вычислительным элементом любого компьютера, управляет всеми остальными его элементами. Современный микропроцессор — это прямоугольная пластинка из кристаллического кремния. На ее маленькой площади расположены схемы (транзисторы). Пластинка находится в керамическом или пластмассовом корпусе, к которому она подсоединяется посредством золотых проводков. Благодаря такой конструкции процессор легко и надежно подсоединяется к системной плате ПК.'),
(3, 'Graphic\'s card\'s', 'Устройство, преобразующее графический образ, хранящийся как содержимое памяти компьютера (или самого адаптера), в форму, пригодную для дальнейшего вывода на экран монитора. Первые мониторы, построенные на электронно-лучевых трубках, работали по телевизионному принципу сканирования экрана электронным лучом, и для отображения требовался видеосигнал, генерируемый видеокартой.');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `product` text DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `longDescription` text DEFAULT NULL,
  `img` text DEFAULT NULL,
  `available` tinyint(4) NOT NULL DEFAULT 1,
  `amount` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `product_id` int(11) UNSIGNED DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `product`, `category`, `description`, `longDescription`, `img`, `available`, `amount`, `price`, `product_id`, `user_id`) VALUES
(1, 'Cats are better than bullets', 1, 'Cats are better than bullets', 'Cats are better than bullets', 'https://cataas.com/cat\r\n', 1, 4534, 32423, NULL, NULL),
(2, 'Invasion v2.3', 1, 'Не выходи из комнаты, не совершай ошибку.', '', 'https://invasion-labs.ru/wp-content/uploads/2015/02/np01.png', 0, 34, 140000, NULL, NULL),
(3, 'Alien Predator', 1, '[gtx 1080, Core i7, 32gb, 1tb]', 'Сильный быстрый бла бла бла', 'https://www.klamas.ru/upload/iblock/b62/b6265cd61a28272686b66aeafe6f5c21.jpg', 1, 34, 2000, NULL, NULL),
(4, 'Intel Core i9 X-series[7900x]', 2, 'Для настольных компьютеров, обеспечивающие превосходную производительность с оптимальным балансом тактовой частоты, количества ядер и потоков. Получайте максимальное удовольствие от игр благодаря возможности увеличения тактовой частоты до 5,3 ГГц, 10 ядрам, 20 потокам обработки данных и обновленной поддержке средств связи и устройств с высокой пропускной способностью. Интегрированные функции, такие как технологии Intel® Hyperthreading и Intel® Thermal Velocity Boost, гарантируют потрясающий игровой процесс, а новые средства контроля оверклокинга дают дополнительную гибкость для точной настройки производительности.', '', 'https://a.allegroimg.com/s1440/064146/f7abfff14d91b79cec28a0e8e0c9', 0, 13, 5000, NULL, NULL),
(41, 'fsdfdsfsd', 1, 'dsadsaddasdas', NULL, NULL, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `admin`) VALUES
(3, 'skrillaghetto', 'sadsadsa@fasd.com', '$2y$10$VfhTDjwv0e4cyVBJKUys9OfMVohNIRPkt54CvvzINh9iaMAvL1dVK', 0),
(4, 'skrillaghetto2', 'sadsasdsa@fasd.com', '$2y$10$8nCoX5wuc7D7NAbG9lR3J.5WK5ZIgMZJuPxq4a7JNgNLj/Ghd1ile', 0),
(6, 'admin', '', '$2y$10$OuM5lglkONak6zwMSnhCnuW26.UUfeKLno8xZ3XEQpgkgqz..nuOS', 1),
(7, 'blabla', 'sergeykdhokhlov@sds.rsd', '$2y$10$23uFh7AmmWERNrmda48Uy.8TvnJBk/geOsDbkyuhT5CjM/uVfxHNO', 0),
(14, 'sdsadsa', 'sdsad@mail.co', '$2y$10$Mf9yenZE1DNao8kWY3CgdO0.icC8kfgrF5AmsuXRsd6nr4Yt.gJ2i', 0),
(15, 'Володя Анус', 'ssss@mail.sd', '$2y$10$RBGU9wmOFigbdQcJ3OVijO.r9srgPJotWE7zut9p5XhZQkuQo3Ehu', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat` (`category`),
  ADD KEY `index_foreignkey_products_product` (`product_id`),
  ADD KEY `index_foreignkey_products_user` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
