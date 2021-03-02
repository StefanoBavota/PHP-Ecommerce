-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 02, 2021 alle 17:26
-- Versione del server: 10.4.14-MariaDB
-- Versione PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpecommerce`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `cap` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `address`
--

INSERT INTO `address` (`id`, `user_id`, `street`, `city`, `cap`) VALUES
(3, 1, 'Strada Colle Renazzo, 25', 'Pescara', '65129'),
(5, 9, 'stradaa', 'Pescara', '65129'),
(6, 19, 'Strada Colle Renazzo, 26', 'Pescara', '65129');

-- --------------------------------------------------------

--
-- Struttura della tabella `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `msg` text CHARACTER SET latin1 NOT NULL,
  `user_id` int(11) NOT NULL,
  `contact_us_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `answer`
--

INSERT INTO `answer` (`id`, `msg`, `user_id`, `contact_us_id`) VALUES
(7, 'come va?', 9, 1),
(9, 'ciaooooooo', 1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(4, 'Adidas'),
(5, 'Puma');

-- --------------------------------------------------------

--
-- Struttura della tabella `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `client_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `cart`
--

INSERT INTO `cart` (`id`, `client_id`) VALUES
(7, 'a0fa6219f8fd3450e262'),
(8, '686aa2fd20aca3044325'),
(9, '138cba89c1e750cea768'),
(10, '02aa083b8440b80a1996'),
(14, '8db3c9fc0b663fc0f02c'),
(15, '2a5325f03a0abc06cf57'),
(17, '09f08f2a0efe0d092bc1'),
(34, '67d89177b58c9d1695ac'),
(35, '7e301645a35e6dca28ad'),
(37, 'bbe848d9033ca98b7a06'),
(38, 'a539752ad1f91190456d'),
(56, '6bb9b3a54297af8aa17d');

-- --------------------------------------------------------

--
-- Struttura della tabella `cart_item`
--

CREATE TABLE `cart_item` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `cart_item`
--

INSERT INTO `cart_item` (`id`, `cart_id`, `product_id`, `quantity`) VALUES
(47, 9, 2, 3),
(48, 9, 11, 2),
(49, 10, 11, 1),
(50, 10, 1, 1),
(55, 14, 11, 3),
(57, 14, 2, 1),
(58, 15, 11, 1),
(79, 34, 11, 1),
(103, 56, 11, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Categoria 1'),
(2, 'Categoria 2'),
(5, 'Categoria 3'),
(6, 'Categoria 4');

-- --------------------------------------------------------

--
-- Struttura della tabella `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `msg` text CHARACTER SET latin1 NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `contact_us`
--

INSERT INTO `contact_us` (`id`, `nome`, `cognome`, `email`, `msg`, `user_id`) VALUES
(2, 'stefano', 'bavota', 'lol@gmail.it', 'asdgfgadfgadgfag', 9),
(5, 'Stefano', 'Bavota', 'cristianobombardo@hotmail.it', 'asfasdfadfsagdga', 1),
(6, 'Stefano', 'Bavota', 'test3@test.com', 'adsfagdaggafdgadgfghsfghdfghjdj', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `text` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `faq`
--

INSERT INTO `faq` (`id`, `title`, `text`) VALUES
(5, 'FAQ-3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales nibh a tempus dignissim. Donec aliquam mi vitae tellus varius, at lacinia erat porta. Quisque vel turpis luctus, dapibus mi sit amet, laoreet augue. Donec feugiat, lacus at rutrum luctus, erat tellus ultrices nisl, eu pretium risus massa at ante. Nulla turpis metus, ultrices nec dui vel, lacinia varius tortor. Ut ac sem eget massa dapibus ornare. Duis a tempus ex, vel rhoncus elit. Ut vulputate dignissim est, id fermentum quam porttitor sed.'),
(6, 'FAQ-4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales nibh a tempus dignissim. Donec aliquam mi vitae tellus varius, at lacinia erat porta. Quisque vel turpis luctus, dapibus mi sit amet, laoreet augue. Donec feugiat, lacus at rutrum luctus, erat tellus ultrices nisl, eu pretium risus massa at ante. Nulla turpis metus, ultrices nec dui vel, lacinia varius tortor. Ut ac sem eget massa dapibus ornare. Duis a tempus ex, vel rhoncus elit. Ut vulputate dignissim est, id fermentum quam porttitor sed.'),
(7, 'FAQ-5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales nibh a tempus dignissim. Donec aliquam mi vitae tellus varius, at lacinia erat porta. Quisque vel turpis luctus, dapibus mi sit amet, laoreet augue. Donec feugiat, lacus at rutrum luctus, erat tellus ultrices nisl, eu pretium risus massa at ante. Nulla turpis metus, ultrices nec dui vel, lacinia varius tortor. Ut ac sem eget massa dapibus ornare. Duis a tempus ex, vel rhoncus elit. Ut vulputate dignissim est, id fermentum quam porttitor sed.');

-- --------------------------------------------------------

--
-- Struttura della tabella `merchants`
--

CREATE TABLE `merchants` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `merchants`
--

INSERT INTO `merchants` (`id`, `name`) VALUES
(4, 'Prova 2'),
(5, 'Prova 3'),
(6, 'Prova 4');

-- --------------------------------------------------------

--
-- Struttura della tabella `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(1, 'test10@test.com'),
(2, 'test9@test.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `payment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `created_at`, `updated_at`, `status`, `payment_id`) VALUES
(64, 1, '2021-02-20 21:09:01', NULL, 'pending', NULL),
(65, 1, '2021-02-20 21:10:53', NULL, 'pending', NULL),
(66, 1, '2021-02-20 21:10:55', NULL, 'pending', NULL),
(67, 1, '2021-02-20 21:11:49', NULL, 'pending', NULL),
(68, 1, '2021-02-20 21:12:29', NULL, 'pending', NULL),
(69, 1, '2021-02-20 21:14:28', NULL, 'pending', NULL),
(70, 1, '2021-02-20 21:14:31', NULL, 'pending', NULL),
(71, 1, '2021-02-20 21:15:35', NULL, 'pending', NULL),
(72, 1, '2021-02-20 21:15:37', NULL, 'pending', NULL),
(73, 1, '2021-02-20 21:15:38', NULL, 'pending', NULL),
(74, 1, '2021-02-20 21:17:19', NULL, 'pending', NULL),
(75, 1, '2021-02-20 21:17:32', NULL, 'pending', NULL),
(76, 1, '2021-02-22 20:24:07', NULL, 'pending', NULL),
(77, 9, '2021-02-23 09:52:16', NULL, 'pending', NULL),
(78, 9, '2021-02-23 09:53:57', NULL, 'pending', NULL),
(79, 9, '2021-02-23 09:56:48', NULL, 'pending', NULL),
(80, 9, '2021-02-23 10:05:33', NULL, 'pending', NULL),
(81, 9, '2021-02-23 10:05:54', NULL, 'pending', NULL),
(82, 19, '2021-02-23 11:04:15', NULL, 'pending', NULL),
(83, 19, '2021-02-23 11:07:34', NULL, 'pending', NULL),
(84, 19, '2021-02-23 11:07:59', NULL, 'pending', NULL),
(85, 19, '2021-02-23 11:08:35', NULL, 'pending', NULL),
(86, 19, '2021-02-23 11:11:32', NULL, 'pending', NULL),
(87, 19, '2021-02-23 11:13:51', NULL, 'pending', NULL),
(88, 19, '2021-02-23 11:18:04', NULL, 'pending', NULL),
(89, 19, '2021-02-23 11:19:14', NULL, 'pending', NULL),
(90, 19, '2021-02-23 11:20:31', NULL, 'pending', NULL),
(91, 19, '2021-02-23 11:21:34', NULL, 'pending', NULL),
(92, 1, '2021-02-23 18:31:57', NULL, 'pending', NULL),
(93, 1, '2021-02-26 22:10:21', NULL, 'pending', NULL),
(94, 9, '2021-03-02 14:38:43', NULL, 'pending', NULL),
(95, 9, '2021-03-02 14:39:33', NULL, 'pending', NULL),
(96, 9, '2021-03-02 14:44:01', NULL, 'pending', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(15, 64, 2, 1),
(16, 64, 11, 1),
(18, 65, 2, 1),
(19, 65, 11, 1),
(21, 66, 2, 1),
(22, 66, 11, 1),
(24, 74, 2, 1),
(25, 75, 2, 1),
(26, 76, 1, 1),
(27, 76, 2, 1),
(28, 76, 11, 1),
(29, 76, 15, 1),
(30, 77, 2, 1),
(31, 78, 2, 1),
(32, 79, 2, 1),
(33, 80, 2, 1),
(34, 81, 1, 1),
(35, 82, 11, 1),
(36, 83, 11, 1),
(37, 84, 2, 1),
(38, 85, 1, 1),
(39, 86, 16, 1),
(40, 87, 11, 1),
(41, 88, 11, 1),
(42, 89, 2, 1),
(43, 90, 11, 1),
(44, 91, 11, 1),
(45, 92, 2, 1),
(46, 93, 11, 1),
(47, 94, 2, 1),
(48, 95, 1, 1),
(49, 96, 11, 1),
(50, 96, 2, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `payment`
--

INSERT INTO `payment` (`id`, `type`) VALUES
(3, 'Maestro'),
(4, 'Postepay'),
(5, 'Bonifico');

-- --------------------------------------------------------

--
-- Struttura della tabella `points`
--

CREATE TABLE `points` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `points`
--

INSERT INTO `points` (`id`, `user_id`, `total`) VALUES
(1, 9, 30),
(2, 19, 5),
(3, 2, 0),
(5, 11, 0),
(6, 12, 0),
(7, 1, 10);

-- --------------------------------------------------------

--
-- Struttura della tabella `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `merchant_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `product`
--

INSERT INTO `product` (`id`, `image`, `name`, `description`, `price`, `category_id`, `brand_id`, `merchant_id`) VALUES
(1, 'https://images.vestiairecollective.com/cdn-cgi/image/w=1000,q=80,f=auto,/produit/11487631-1_1.jpg', 'Prodotto 1', 'Questo è il prodotto 1', '5.99', 1, 4, 5),
(2, 'https://images-na.ssl-images-amazon.com/images/I/7109j3QXFxL._UY625_.jpg', 'Prodotto 2', 'Questo è il prodotto 2', '19.95', 1, 5, 6),
(11, 'https://static.nike.com/a/images/t_prod_ss/w_960,c_limit,f_auto/ti61nslwh35whirn9drr/womens-air-jordan-i-twist-release-date.jpg', 'Air Jordan', 'Air Jordan nere e bianche', '100.00', 2, NULL, NULL),
(15, 'https://www.hypeclothinga.com/wp-content/uploads/2020/03/Nike-Air-Jordan-1-High-Retro-Court-Pruple-White-2020-Limited-Edition-555088-500-Hype-Clothinga--600x600.png', 'Jordan Purple', 'Purple', '150.00', 1, NULL, NULL),
(16, 'https://images.vestiairecollective.com/cdn-cgi/image/w=500,h=undefined,q=80,f=auto,/produit/11400683-1_2.jpg', 'yeeze', 'yeezy costosissime', '700.00', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Cognome` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`id`, `Nome`, `Cognome`, `email`, `password`, `user_type_id`) VALUES
(1, 'Stefano', 'Bavota', 'admin@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(2, 'Matteo ', 'Del Papa', 'regular@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2),
(9, 'Luca', 'Evangelista', 'test2@test.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2),
(11, 'Stefano', 'Bavota', 'test6@test.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2),
(12, 'Stefano', 'Bavota', 'test5@test.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2),
(19, 'Stefano', 'Bavota', 'test7@test.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `user_type`
--

INSERT INTO `user_type` (`id`, `name`) VALUES
(1, 'Administrator'),
(2, 'Regular');

-- --------------------------------------------------------

--
-- Struttura della tabella `wish_list`
--

CREATE TABLE `wish_list` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `wish_list`
--

INSERT INTO `wish_list` (`id`, `product_id`, `user_id`) VALUES
(28, 15, 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indici per le tabelle `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `answer_ibfk_2` (`contact_us_id`);

--
-- Indici per le tabelle `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_item_ibfk_1` (`cart_id`),
  ADD KEY `cart_item_ibfk_2` (`product_id`);

--
-- Indici per le tabelle `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indici per le tabelle `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `merchants`
--
ALTER TABLE `merchants`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_id` (`payment_id`),
  ADD KEY `orders_ibfk_1` (`user_id`);

--
-- Indici per le tabelle `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indici per le tabelle `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indici per le tabelle `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `merchant_id` (`merchant_id`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type_id` (`user_type_id`);

--
-- Indici per le tabelle `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `wish_list`
--
ALTER TABLE `wish_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_product` (`product_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT per la tabella `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT per la tabella `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `merchants`
--
ALTER TABLE `merchants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT per la tabella `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT per la tabella `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `points`
--
ALTER TABLE `points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT per la tabella `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`contact_us_id`) REFERENCES `contact_us` (`user_id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `cart_item_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `contact_us`
--
ALTER TABLE `contact_us`
  ADD CONSTRAINT `contact_us_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `points`
--
ALTER TABLE `points`
  ADD CONSTRAINT `points_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`merchant_id`) REFERENCES `merchants` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id`);

--
-- Limiti per la tabella `wish_list`
--
ALTER TABLE `wish_list`
  ADD CONSTRAINT `wish_list_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wish_list_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
