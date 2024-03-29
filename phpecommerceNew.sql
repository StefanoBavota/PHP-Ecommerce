-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 03, 2021 alle 22:10
-- Versione del server: 10.4.14-MariaDB
-- Versione PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE Database phpecommerce;
use phpecommerce;

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
(7, 20, 'indirizzo 1', 'Pescara', '1234'),
(8, 21, 'indirizzo 2', 'Pescara', '1234'),
(9, 22, 'indirizzo 4', 'Pescara', '1234'),
(10, 23, 'indirizzo 5', 'Pescara', '1234'),
(11, 24, 'indirizzo 6', 'Pescara', '1234'),
(12, 25, 'indirizzo 7', 'Pescara', '1234'),
(13, 26, 'indirizzo 8', 'Pescara', '1234'),
(14, 27, 'indirizzo 8', 'Pescara', '1234');

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
(10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lacinia vel ante eu iaculis. Fusce consequat, est in fermentum dictum, dui erat efficitur est, et hendrerit tortor justo ac mi. Sed semper congue dictum. Nam rhoncus neque orci. In ut sodales erat. Aenean volutpat in purus a mattis. Nam pretium semper lacus, sed eleifend nulla pharetra et. Praesent finibus varius diam sit amet aliquet. Curabitur dolor mauris, placerat eget ornare sit amet, semper sit amet leo. Fusce dolor metus, feugiat vel tempus eu, imperdiet a orci. Integer dolor libero, faucibus et efficitur vel, vestibulum ac magna.', 1, 9),
(11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lacinia vel ante eu iaculis. Fusce consequat, est in fermentum dictum, dui erat efficitur est, et hendrerit tortor justo ac mi. Sed semper congue dictum. Nam rhoncus neque orci. In ut sodales erat. Aenean volutpat in purus a mattis. Nam pretium semper lacus, sed eleifend nulla pharetra et. Praesent finibus varius diam sit amet aliquet. Curabitur dolor mauris, placerat eget ornare sit amet, semper sit amet leo. Fusce dolor metus, feugiat vel tempus eu, imperdiet a orci. Integer dolor libero, faucibus et efficitur vel, vestibulum ac magna.', 1, 20),
(12, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lacinia vel ante eu iaculis. Fusce consequat, est in fermentum dictum, dui erat efficitur est, et hendrerit tortor justo ac mi. Sed semper congue dictum. Nam rhoncus neque orci. In ut sodales erat. Aenean volutpat in purus a mattis. Nam pretium semper lacus, sed eleifend nulla pharetra et. Praesent finibus varius diam sit amet aliquet. Curabitur dolor mauris, placerat eget ornare sit amet, semper sit amet leo. Fusce dolor metus, feugiat vel tempus eu, imperdiet a orci. Integer dolor libero, faucibus et efficitur vel, vestibulum ac magna.', 1, 21);

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
(5, 'Puma'),
(6, 'Karl Kani'),
(7, 'Nike'),
(8, 'Vans'),
(9, 'Off-White');

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
(56, '6bb9b3a54297af8aa17d'),
(57, '9a9d6535a5415e3dfa58'),
(67, 'ac68f9fed768347ae282'),
(68, '9fb3c387ced9a3d91219'),
(69, '5623f457abf154017238'),
(70, 'f181a75fa663fb87f3a2'),
(71, '99e3f9dcd72b37f2e082'),
(72, 'f1142d1730a9bc6c6575'),
(73, 'a3517d7cb4d8d30c7574'),
(74, '133bea3fc0a59cc555d4');

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
(104, 56, 33, 1),
(105, 57, 30, 1),
(106, 57, 35, 1),
(119, 67, 33, 1),
(120, 68, 30, 1),
(122, 69, 31, 1),
(123, 72, 32, 1);

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
(1, 'Uomo'),
(2, 'Donna');

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
(9, 'Luca', 'Evangelista', 'test2@test.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lacinia vel ante eu iaculis. Fusce consequat, est in fermentum dictum, dui erat efficitur est, et hendrerit tortor justo ac mi. Sed semper congue dictum. Nam rhoncus neque orci. In ut sodales erat. Aenean volutpat in purus a mattis. Nam pretium semper lacus, sed eleifend nulla pharetra et. Praesent finibus varius diam sit amet aliquet. Curabitur dolor mauris, placerat eget ornare sit amet, semper sit amet leo. Fusce dolor metus, feugiat vel tempus eu, imperdiet a orci. Integer dolor libero, faucibus et efficitur vel, vestibulum ac magna.', 9),
(10, 'Paolo ', 'Rossi', 'tes1@test.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lacinia vel ante eu iaculis. Fusce consequat, est in fermentum dictum, dui erat efficitur est, et hendrerit tortor justo ac mi. Sed semper congue dictum. Nam rhoncus neque orci. In ut sodales erat. Aenean volutpat in purus a mattis. Nam pretium semper lacus, sed eleifend nulla pharetra et. Praesent finibus varius diam sit amet aliquet. Curabitur dolor mauris, placerat eget ornare sit amet, semper sit amet leo. Fusce dolor metus, feugiat vel tempus eu, imperdiet a orci. Integer dolor libero, faucibus et efficitur vel, vestibulum ac magna.', 20),
(11, 'Luca', 'Rossi', 'tes2@test.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lacinia vel ante eu iaculis. Fusce consequat, est in fermentum dictum, dui erat efficitur est, et hendrerit tortor justo ac mi. Sed semper congue dictum. Nam rhoncus neque orci. In ut sodales erat. Aenean volutpat in purus a mattis. Nam pretium semper lacus, sed eleifend nulla pharetra et. Praesent finibus varius diam sit amet aliquet. Curabitur dolor mauris, placerat eget ornare sit amet, semper sit amet leo. Fusce dolor metus, feugiat vel tempus eu, imperdiet a orci. Integer dolor libero, faucibus et efficitur vel, vestibulum ac magna.', 21);

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
(2, 'test9@test.com'),
(3, 'tes1@test.com'),
(4, 'tes3@test.com'),
(5, 'tes5@test.com'),
(6, 'tes6@test.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `created_at`, `updated_at`, `status`) VALUES
(97, 1, '2021-03-02 21:02:41', NULL, 'pending'),
(98, 1, '2021-03-02 21:28:33', NULL, 'pending'),
(99, 9, '2021-03-02 22:51:15', NULL, 'pending'),
(100, 9, '2021-03-02 22:53:44', NULL, 'pending'),
(101, 9, '2021-03-02 22:56:10', NULL, 'pending'),
(102, 9, '2021-03-02 22:57:37', NULL, 'pending'),
(103, 9, '2021-03-02 22:57:48', NULL, 'pending'),
(104, 9, '2021-03-02 23:01:56', NULL, 'pending'),
(105, 9, '2021-03-02 23:13:02', NULL, 'pending');

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
(52, 97, 32, 1),
(53, 97, 33, 6),
(55, 98, 31, 1),
(56, 99, 30, 1),
(57, 100, 30, 1),
(58, 101, 31, 1),
(59, 102, 31, 1),
(60, 103, 32, 1),
(61, 104, 31, 1),
(62, 105, 32, 1);

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
(1, 9, 20),
(7, 1, 20),
(8, 20, 0),
(9, 21, 0),
(10, 22, 0),
(11, 23, 0),
(12, 24, 0),
(13, 25, 0),
(14, 26, 0),
(15, 27, 0);

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
  `merchant_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `product`
--

INSERT INTO `product` (`id`, `image`, `name`, `description`, `price`, `category_id`, `brand_id`, `merchant_id`, `size_id`) VALUES
(30, 'https://www.snipes.it/dw/image/v2/BDCB_PRD/on/demandware.static/-/Sites-snse-master-eu/default/dwd48480da/1861494_P.jpg?sw=780&amp;sh=780&amp;sm=fit&amp;sfrm=png', '89 TT Sneaker', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lacinia vel ante eu iaculis. Fusce consequat, est in fermentum dictum, dui erat efficitur est, et hendrerit tortor justo ac mi. Sed semper congue dictum. Nam rhoncus neque orci. In ut sodales erat. Aenean volutpat in purus a mattis.', '99.99', 1, 6, 4, 1),
(31, 'https://www.snipes.it/dw/image/v2/BDCB_PRD/on/demandware.static/-/Sites-snse-master-eu/default/dwba306804/1883852_P.jpg?sw=780&amp;sh=780&amp;sm=fit&amp;sfrm=png', 'Air Max 2090', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lacinia vel ante eu iaculis. Fusce consequat, est in fermentum dictum, dui erat efficitur est, et hendrerit tortor justo ac mi. Sed semper congue dictum. Nam rhoncus neque orci. In ut sodales erat. Aenean volutpat in purus a mattis.', '149.99', 1, 7, 4, 2),
(32, 'https://www.snipes.it/dw/image/v2/BDCB_PRD/on/demandware.static/-/Sites-snse-master-eu/default/dw25e9a39c/1883945_P.jpg?sw=780&amp;sh=780&amp;sm=fit&amp;sfrm=png', 'WMNS Zoom ‘92', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lacinia vel ante eu iaculis. Fusce consequat, est in fermentum dictum, dui erat efficitur est, et hendrerit tortor justo ac mi. Sed semper congue dictum. Nam rhoncus neque orci. In ut sodales erat. Aenean volutpat in purus a mattis.', '149.99', 2, 7, 5, 3),
(33, 'https://www.snipes.it/dw/image/v2/BDCB_PRD/on/demandware.static/-/Sites-snse-master-eu/default/dwc21bc798/1887314_P.jpg?sw=780&amp;sh=780&amp;sm=fit&amp;sfrm=png', 'Ultraboost 4.0 DNA Laufschuh', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lacinia vel ante eu iaculis. Fusce consequat, est in fermentum dictum, dui erat efficitur est, et hendrerit tortor justo ac mi. Sed semper congue dictum. Nam rhoncus neque orci. In ut sodales erat. Aenean volutpat in purus a mattis.', '159.99', 1, 4, 5, 3),
(34, 'https://www.snipes.it/dw/image/v2/BDCB_PRD/on/demandware.static/-/Sites-snse-master-eu/default/dw282d0e34/1899854_P.jpg?sw=780&amp;sh=780&amp;sm=fit&amp;sfrm=png', 'Air Force 1 Shadow', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lacinia vel ante eu iaculis. Fusce consequat, est in fermentum dictum, dui erat efficitur est, et hendrerit tortor justo ac mi. Sed semper congue dictum. Nam rhoncus neque orci. In ut sodales erat. Aenean volutpat in purus a mattis.', '109.99', 2, 7, 5, 4),
(35, 'https://www.snipes.it/dw/image/v2/BDCB_PRD/on/demandware.static/-/Sites-snse-master-eu/default/dw97418c62/1899827_P.jpg?sw=780&amp;sh=780&amp;sm=fit&amp;sfrm=png', 'WMNS Air Vapormax', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lacinia vel ante eu iaculis. Fusce consequat, est in fermentum dictum, dui erat efficitur est, et hendrerit tortor justo ac mi. Sed semper congue dictum. Nam rhoncus neque orci. In ut sodales erat. Aenean volutpat in purus a mattis.', '224.99', 2, 7, 6, 4),
(36, 'https://www.snipes.it/dw/image/v2/BDCB_PRD/on/demandware.static/-/Sites-snse-master-eu/default/dwfd0aff66/1689396_P.jpg?sw=780&amp;sh=780&amp;sm=fit&amp;sfrm=png', 'UY Old Skool', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lacinia vel ante eu iaculis. Fusce consequat, est in fermentum dictum, dui erat efficitur est, et hendrerit tortor justo ac mi. Sed semper congue dictum. Nam rhoncus neque orci. In ut sodales erat. Aenean volutpat in purus a mattis.', '49.99', 1, 8, 6, 1),
(37, 'https://www.snipes.it/dw/image/v2/BDCB_PRD/on/demandware.static/-/Sites-snse-master-eu/default/dwc37713d7/1906536_P.jpg?sw=780&amp;sh=780&amp;sm=fit&amp;sfrm=png', 'UA Super ComfyCush Era', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lacinia vel ante eu iaculis. Fusce consequat, est in fermentum dictum, dui erat efficitur est, et hendrerit tortor justo ac mi. Sed semper congue dictum. Nam rhoncus neque orci. In ut sodales erat. Aenean volutpat in purus a mattis.', '99.99', 2, 8, 6, 1),
(38, 'https://www.snipes.it/dw/image/v2/BDCB_PRD/on/demandware.static/-/Sites-snse-master-eu/default/dwd43d2133/1899770_P.jpg?sw=780&amp;sh=780&amp;sm=fit&amp;sfrm=png', 'Nike Air Max Zephyr', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lacinia vel ante eu iaculis. Fusce consequat, est in fermentum dictum, dui erat efficitur est, et hendrerit tortor justo ac mi. Sed semper congue dictum. Nam rhoncus neque orci. In ut sodales erat. Aenean volutpat in purus a mattis.', '179.99', 2, 7, 6, 4),
(39, 'https://www.snipes.it/dw/image/v2/BDCB_PRD/on/demandware.static/-/Sites-snse-master-eu/default/dw66d14991/1892610_P.jpg?sw=780&amp;sh=780&amp;sm=fit&amp;sfrm=png', 'Suede Classic XXI', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lacinia vel ante eu iaculis. Fusce consequat, est in fermentum dictum, dui erat efficitur est, et hendrerit tortor justo ac mi. Sed semper congue dictum. Nam rhoncus neque orci. In ut sodales erat. Aenean volutpat in purus a mattis.', '79.99', 1, 5, 5, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `shoe_size`
--

CREATE TABLE `shoe_size` (
  `id` int(11) NOT NULL,
  `size` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `shoe_size`
--

INSERT INTO `shoe_size` (`id`, `size`) VALUES
(1, '40,41,42,43'),
(2, '35,36,37,38'),
(3, '35,36,37,38,39'),
(4, '40.5,41,41.5,42,42.5');

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
(9, 'Luca', 'Evangelista', 'test2@test.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2),
(20, 'Paolo', 'Rossi', 'tes1@test.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2),
(21, 'Luca', 'Rossi', 'tes2@test.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2),
(22, 'Mario', 'Rossi', 'tes3@test.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2),
(23, 'Fabio', 'Rossi', 'tes4@test.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2),
(24, 'Marco', 'Rossi', 'tes5@test.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2),
(25, 'Matteo', 'Rossi', 'tes6@test.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2),
(26, 'Samuel', 'Rossi', 'tes7@test.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2),
(27, 'Lorenzo', 'Rossi', 'tes8@test.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2);

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
(33, 30, 9),
(30, 32, 1);

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
  ADD KEY `orders_ibfk_1` (`user_id`);

--
-- Indici per le tabelle `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

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
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `merchant_id` (`merchant_id`),
  ADD KEY `product_ibfk_1` (`category_id`),
  ADD KEY `product_ibfk_4` (`size_id`);

--
-- Indici per le tabelle `shoe_size`
--
ALTER TABLE `shoe_size`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT per la tabella `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT per la tabella `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT per la tabella `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT per la tabella `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la tabella `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `merchants`
--
ALTER TABLE `merchants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT per la tabella `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT per la tabella `points`
--
ALTER TABLE `points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT per la tabella `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT per la tabella `shoe_size`
--
ALTER TABLE `shoe_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT per la tabella `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`merchant_id`) REFERENCES `merchants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`size_id`) REFERENCES `shoe_size` (`id`) ON DELETE CASCADE;

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
