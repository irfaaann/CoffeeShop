-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2023 at 05:32 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ytest`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `cust_name` varchar(255) DEFAULT NULL,
  `itembought` varchar(255) DEFAULT NULL,
  `itemsbought` int(11) DEFAULT NULL,
  `total_bill` int(11) DEFAULT NULL,
  `cust_note` varchar(255) DEFAULT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cust_id`, `cust_name`, `itembought`, `itemsbought`, `total_bill`, `cust_note`, `order_date`) VALUES
(17, 2, 'sss', 'Caramel Macchiato', 1, 295, 'No note', '2022-04-24 18:40:08'),
(22, 9, 'newguy', 'Cappuccino', 3, 780, 'sda', '2022-04-28 16:32:19'),
(24, 2, 'sss', 'Cafe Latte', 5, 1175, 'make it best', '2022-04-28 16:35:52'),
(25, 2, 'sss', 'Cappuccino', 5, 1300, 'make it 🔥', '2022-04-28 16:36:55'),
(30, 10, 'Test User', 'Cafe Latte', 4, 940, 'affw', '2022-05-01 17:17:26'),
(36, 11, 'uzair', 'Cafe Latte', 1, 235, 'hey', '2023-08-03 18:55:11'),
(37, 11, 'uzair', 'Espresso', 2, 598, 'hi', '2023-08-04 13:04:01');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `pdesc` varchar(255) NOT NULL,
  `image_url` varchar(384) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `pname`, `price`, `pdesc`, `image_url`) VALUES
(3, 'Espresso', 299, 'The espresso, also known as a short black, is approximately 1 oz. of highly concentrated coffee. Although simple in appearance.', 'espresso.png'),
(4, 'Caramel Macchiato', 295, 'The word macchiato means mark or stain. This is in reference to the mark that steamed milk leaves on the surface of the espresso as it is dashed into the drink.', 'macchiato.png'),
(5, 'Cappuccino', 260, 'This creamy coffee drink is usually consumed at breakfast time.It is usually associated with indulgence and comfort because of its thick foam layer.', 'cappuccino.png'),
(6, 'Cafe Latte', 235, 'Cafe lattes are considered an introductory coffee drink since the acidity and bitterness of coffee are cut by the amount of milk in the beverage.', 'cafelatte.png'),
(7, 'Caffe Mocha', 270, 'The mocha is considered a coffee and hot chocolate hybrid. The chocolate powder or syrup gives it a rich and creamy flavor and cuts the acidity of the espresso.', 'cafemocha.png'),
(8, 'Iced Coffee', 200, 'Iced coffees become very popular in the summertime in the United States. The recipes do have some variance, with some locations choosing to interchange milk with water in the recipe. ', 'icedcoffee.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `email`) VALUES
(11, 'uzair', 'uzair', 'uzair', 'uzairbagwan@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
