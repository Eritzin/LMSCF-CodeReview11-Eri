-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2020 at 04:09 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_erinagy_petadoption`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(20) NOT NULL,
  `category` varchar(20) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `zipcode` int(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `hobbies` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `age` int(100) DEFAULT NULL,
  `available_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `category`, `name`, `zipcode`, `city`, `address`, `image`, `description`, `hobbies`, `website`, `age`, `available_date`) VALUES
(1, 'small', 'Raby', 1110, 'Vienna', 'Lorystraße 87-85', 'https://previews.123rf.com/images/soultkd/soultkd1507/soultkd150700150/43360434-holland-lop-rabbit.jpg', 'Small and Friendly Holland Lop', '', 'https://www.petguide.com/breeds/rabbit/holland-lop/', 2, '2020-03-02'),
(2, 'small', 'BABE', 1180, 'Vienna', 'Kreuzg. 78', 'https://nicovideo.cdn.nimg.jp/thumbnails/25286345/25286345.L', 'Friendly pig! But lazy and eating all day.', 'Eating, Sleeping!', '', 3, '2020-03-04'),
(3, 'small', 'Inu', 1200, 'Vienna', 'Dresdner Str', 'https://images2.minutemediacdn.com/image/upload/c_crop,h_2788,w_4960,x_0,y_255/f_auto,q_auto,w_1100/v1554918537/shape/mentalfloss/istock-488657289.jpg', 'Clever dog!! He likes to run.', 'Run, eat, swim.', '', 4, '2020-02-04'),
(4, 'small', 'Ponta', 1090, 'Vienna', 'Kolingasse', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQIrIxhrNFpPlqQr3CqelyKdaGUAxkLl4abldFdNgpwdjhciMPL', 'Small, friendly and clever dog. He likes to go outside.', '', 'https://dogtime.com/dog-breeds/miniature-schnauzer', 2, '2020-03-08'),
(5, 'large', 'Uma', 1220, 'Vienna', 'Friedhofweg 2', 'https://www.cavalluna.com/wp-content/uploads/2018/07/Quarter-Horse.jpg', 'A beautiful horse. She is very friendly. It is easy to take care of her. ', 'Walking , running and eating.', NULL, NULL, NULL),
(6, 'small', 'Hamutaro', 1230, 'Vienna', 'Anton-Baumgartner-Straße 129', 'https://i.pinimg.com/474x/7e/77/db/7e77dbbeeebd31a96c17ef33af3ed315--paw-hamster.jpg', 'Cute and powerful hamstar. She is a bit shy.', NULL, 'https://animals.net/hamster/', NULL, NULL),
(7, 'small', 'neko', 1050, 'Vienna', 'Margaretenstraße 93', 'https://webcomicms.net/sites/default/files/clipart/173548/pictures-small-animals-173548-2878454.jpg', 'Super cute cat. She loves freedom.', NULL, 'https://www.msdvetmanual.com/cat-owners/description-and-physical-characteristics-of-cats/description-and-physical-characteristics-of-cats', NULL, NULL),
(8, 'senior', 'Kame', 1130, 'Vienna', 'Braunschweiggasse 17-3', 'https://storage.tenki.jp/storage/static-images/suppl/article/image/2/29/291/29112/1/large.jpg', 'Calm, friendly turtle. He is 50 years old. He knows everything.', 'sleeping, swiming, and eating', '', 50, '2019-06-02'),
(9, 'senior', 'KOI', 1170, 'Vienna', 'Dornbacher Str. 110-124', 'https://pbs.twimg.com/media/C62JNxeVwAAO1P0.jpg', 'Japanese beautiful carp. ', 'Swiming and catching small food.', '', 9, '2020-03-01'),
(10, 'senior', 'WAN', 1180, 'Vienna', 'Molnargasse 10', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQgefDhaHgxqf1IFRQ6tJghUaIIdkzWpHAgzLG5l9A3ZET4fA6_', '10 years old but clever and friendly dog. ', 'Running and playing with balls.', '', 10, '2020-03-01'),
(11, 'senior', 'Nyan', 1020, 'Vienna', 'Rustenschacherallee 10-18', 'https://www.animalfriends.co.uk/app/uploads/2014/08/26113034/OLD-CAT-small.jpg', '9 years old cat. She likes to go outside but comes back to home at night.', 'Walk around outside', '', 9, '2020-03-03'),
(12, 'large', 'Gao', 1130, 'Vienna', 'Schönbrunn', 'https://cdn.cnn.com/cnnnext/dam/assets/120404104411-exotic-pets-white-lion-family-horizontal-large-gallery.jpg', 'Huge but very calm Lion. ', 'Loves to eat meat and bite something', '', 5, '2020-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) DEFAULT NULL,
  `userEmail` varchar(60) DEFAULT NULL,
  `userPass` varchar(255) DEFAULT NULL,
  `status` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `status`) VALUES
(1, 'Eri Nagy', 'eri@gmail.com', '23e1bbf63d144030376113a33ffaa25fed6d33b460a86b85239ee24a0690fee5', 'user'),
(2, 'David Nagy', 'david@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
