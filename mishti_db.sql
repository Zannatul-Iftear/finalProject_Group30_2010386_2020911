-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2023 at 05:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mishti_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cartID` int(12) NOT NULL,
  `userID` int(12) NOT NULL,
  `productID` int(12) NOT NULL,
  `quantity` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedbackID` int(12) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feedbackID`, `firstName`, `lastName`, `email`, `phone`, `message`) VALUES
(1, 'Md Zannatul', 'Iftear', 'user@user', '01974149095', 'Hello World'),
(2, 'Md Zannatul', 'Iftear', 'zannatul.iftear@gmail.com', '01974149095', 'Hello World'),
(3, 'kuddus', 'catto', 'admin@admin', '01987654321', 'Dog is a cat world'),
(4, 'Md Zannatul', 'catto', 'user@user', '', 'd'),
(5, 'Md Zannatul', 'Iftear', 'zannatul.iftear@gmail.com', '01987654321', 'Hello World!');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(12) NOT NULL,
  `userID` int(12) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `total` int(30) NOT NULL,
  `paystatus` varchar(30) NOT NULL DEFAULT 'Pending',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `userID`, `userName`, `address`, `phone`, `quantity`, `total`, `paystatus`, `date`) VALUES
(20, 8, 'Sanzar Adnan Alam', 'Independent University, Bangladesh', '01974149095', 4, 1470, 'Completed', '2023-09-01 21:37:34'),
(21, 8, 'Subrata Kumar Dey', '350 Road 10', '01974149095', 1, 350, 'Completed', '2023-09-01 21:38:36'),
(22, 8, 'zim', 'House 357 Road 9 ', '01624866369', 6, 3000, 'Pending', '2023-09-01 21:39:27'),
(23, 4, 'Admin', 'Admin', '01974149095', 3, 350, 'Pending', '2023-09-01 21:43:07');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(12) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `name`, `price`, `image`) VALUES
(10, 'Roshogolla', 350, 'productImgRoshogolla.png'),
(11, 'Kala Jaam', 500, 'productImgKalajaam.png'),
(12, 'Laddu', 420, 'productImgLaddu.png'),
(13, 'Chchana', 280, 'productImgChchana.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(12) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `name`, `email`, `password`, `type`) VALUES
(4, 'admin', 'admin@admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(8, 'SKD', 'SKD@iub.edu.bd', '9ced8232dcf80b7b652bd1b5baa9adec', 'user'),
(9, 'user', 'user@user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `wrappers`
--

CREATE TABLE `wrappers` (
  `wrapperID` int(12) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `wrappers`
--

INSERT INTO `wrappers` (`wrapperID`, `image`) VALUES
(5, 'wrappingPaper3.png'),
(6, 'wrappingPaper4.png'),
(9, 'wrappingPaper2.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedbackID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `wrappers`
--
ALTER TABLE `wrappers`
  ADD PRIMARY KEY (`wrapperID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cartID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedbackID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wrappers`
--
ALTER TABLE `wrappers`
  MODIFY `wrapperID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
