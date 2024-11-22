-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2024 at 09:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `photo_studio`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_attemp`
--

CREATE TABLE `login_attemp` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photographers`
--

CREATE TABLE `photographers` (
  `id` int(11) NOT NULL,
  `guid` char(36) NOT NULL,
  `img_path` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `patronymic` varchar(45) DEFAULT NULL,
  `biography` varchar(255) NOT NULL,
  `birth_year` int(11) NOT NULL,
  `id_photo_type` int(11) NOT NULL,
  `is_deprecated` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `photographers`
--

INSERT INTO `photographers` (`id`, `guid`, `img_path`, `surname`, `name`, `patronymic`, `biography`, `birth_year`, `id_photo_type`, `is_deprecated`) VALUES
(30, 'bfcb836e-9494-11ef-a5d7-c84d44202d30', 'gromova.jpg', 'Громова', 'Анастасия', 'Владимировна', 'Работает в компании с 2018 года, и за это время осчастливила немало людей отличными фотографиями.', 2000, 1, 0),
(31, 'bfcb8503-9494-11ef-a5d7-c84d44202d30', 'karpov.jpg', 'Карпов', 'Дмитрий', 'Анатольевич', 'Работает в компании с 2014 года, сделал за это время тысячи отличных фотографий и не планирует останавливаться', 1990, 2, 0),
(32, 'bfcb8524-9494-11ef-a5d7-c84d44202d30', 'kapustina.jpg', 'Капустина', 'Елена', '', 'Молодой, но от того не менее талантливый сотрудник, работает с начала 2024 года.', 2006, 3, 0),
(33, 'bfcb853e-9494-11ef-a5d7-c84d44202d30', 'batunin.jpg', 'Батунин', 'Николай', 'Николаевич', 'Работает в компании с 2016 года, зарекомендовал себя как первоклассный фотограф.', 1995, 1, 0),
(34, 'bfcb8554-9494-11ef-a5d7-c84d44202d30', 'parker.jpg', 'Паркер', 'Питер', NULL, 'Работает с 1980 года, стал для наших клиентов не просто фотографом, а настоящим героем.', 1980, 2, 0),
(35, 'bfcb8568-9494-11ef-a5d7-c84d44202d30', 'merkulova.jpg', 'Меркулова', 'Алиса', 'Станиславовна', 'Работает в компании с 2017 года, никто не сделает фото на визу чем она', 1998, 3, 0),
(36, 'bfcb857d-9494-11ef-a5d7-c84d44202d30', 'gerasimov.jpg', 'Герасимов', 'Юрий', 'Вадимович', 'Работает в компании с 2015 года, профессионал с опытом, который сделает вам лучшее фото на паспорт.', 1993, 1, 0),
(37, 'bfcb8592-9494-11ef-a5d7-c84d44202d30', 'ivanov.jpg', 'Иванов', 'Дмитрий', 'Владимирович', 'Работает с 2016 года. Собирает в кабинет целые очереди.', 1992, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `photo_types`
--

CREATE TABLE `photo_types` (
  `id` int(11) NOT NULL,
  `type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `photo_types`
--

INSERT INTO `photo_types` (`id`, `type`) VALUES
(1, 'Фото на паспорт'),
(2, ' Фото на загранпаспорт'),
(3, ' Фото на визу'),
(4, ' Фото на шенген'),
(5, ' Фото на гринкарту');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `interests` text NOT NULL,
  `blood_type` int(11) NOT NULL,
  `factor` varchar(1) NOT NULL,
  `vk` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sault` varchar(255) NOT NULL,
  `block_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `full_name`, `birth_date`, `gender`, `interests`, `blood_type`, `factor`, `vk`, `password`, `sault`, `block_time`) VALUES
(10, 'sanjok2505@gmail.com', 'Глухов Александр Владимирович', '2004-05-25', 'male', 'Программирование', 1, '+', 'https://vk.com/alexandrtrs', '$2y$10$CNM0p6A.kn2Q2GtTwv9.T.susKn3AiaR9IcD4IwUbSK/wUHIhrORu', '6190fcec6af64ff', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_attemp`
--
ALTER TABLE `login_attemp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `photographers`
--
ALTER TABLE `photographers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guid` (`guid`),
  ADD KEY `id_photo_type` (`id_photo_type`);

--
-- Indexes for table `photo_types`
--
ALTER TABLE `photo_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_attemp`
--
ALTER TABLE `login_attemp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `photographers`
--
ALTER TABLE `photographers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `photo_types`
--
ALTER TABLE `photo_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login_attemp`
--
ALTER TABLE `login_attemp`
  ADD CONSTRAINT `login_attemp_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `photographers`
--
ALTER TABLE `photographers`
  ADD CONSTRAINT `photographers_ibfk_1` FOREIGN KEY (`id_photo_type`) REFERENCES `photo_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
