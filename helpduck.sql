-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sty 17, 2025 at 03:55 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpduck`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `userId` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `message`, `userId`, `date`) VALUES
(2, 'Test działania formularza', 7, '2024-12-21 14:37:56'),
(3, 'Druga wiadomość dla testu', 7, '2024-12-21 14:39:05');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logged_in_users`
--

CREATE TABLE `logged_in_users` (
  `sessionId` varchar(100) NOT NULL,
  `userId` int(11) NOT NULL,
  `lastUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `played_games`
--

CREATE TABLE `played_games` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `road` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `played_games`
--

INSERT INTO `played_games` (`id`, `level`, `road`, `userId`, `date`) VALUES
(4, 1, 6, 2, '2024-12-20 09:35:28'),
(5, 1, 3, 2, '2024-12-20 09:35:35'),
(6, 2, 2, 2, '2024-12-20 09:36:04'),
(7, 1, 4, 2, '2024-12-20 09:49:38'),
(8, 1, 5, 2, '2024-12-20 16:44:50'),
(9, 1, 3, 2, '2024-12-20 16:44:54'),
(10, 10, 5, 3, '2024-12-20 17:23:30'),
(11, 10, 5, 3, '2024-12-20 17:23:30'),
(12, 15, 5, 4, '2024-12-20 17:23:30'),
(13, 22, 5, 5, '2024-12-20 17:23:30'),
(14, 1, 2, 2, '2024-12-21 00:28:54'),
(15, 1, 2, 2, '2024-12-21 00:28:57'),
(16, 1, 3, 2, '2024-12-21 00:29:01'),
(17, 1, 2, 2, '2024-12-21 00:29:06'),
(18, 1, 3, 2, '2024-12-21 00:29:10'),
(19, 1, 2, 2, '2024-12-21 00:29:11'),
(20, 1, 3, 2, '2024-12-21 00:29:14'),
(21, 1, 2, 2, '2024-12-21 00:30:00'),
(22, 1, 2, 2, '2024-12-21 00:30:05'),
(23, 1, 2, 2, '2024-12-21 00:30:07'),
(24, 1, 2, 2, '2024-12-21 00:30:25'),
(25, 1, 7, 2, '2024-12-21 00:30:43'),
(26, 1, 2, 2, '2024-12-21 00:30:52'),
(27, 1, 3, 2, '2024-12-21 00:31:03'),
(28, 1, 4, 2, '2024-12-21 00:32:08'),
(29, 1, 3, 2, '2024-12-21 00:32:43'),
(30, 1, 5, 2, '2024-12-21 00:32:51'),
(31, 1, 8, 2, '2024-12-21 00:33:17'),
(32, 1, 6, 2, '2024-12-21 00:33:44'),
(33, 3, 6, 2, '2024-12-21 00:48:46'),
(34, 1, 2, 2, '2024-12-21 02:11:33'),
(35, 1, 5, 2, '2024-12-21 02:11:43'),
(36, 2, 4, 7, '2024-12-21 13:36:35'),
(37, 1, 7, 7, '2024-12-21 13:37:03'),
(38, 1, 2, 8, '2024-12-21 14:44:39'),
(39, 1, 2, 8, '2024-12-21 14:44:47'),
(40, 1, 3, 8, '2024-12-21 14:45:00'),
(41, 1, 2, 8, '2024-12-21 14:45:34'),
(42, 1, 4, 8, '2024-12-21 14:45:48'),
(43, 1, 5, 9, '2025-01-10 15:45:02'),
(44, 1, 1, 9, '2025-01-17 14:59:34'),
(45, 1, 1, 9, '2025-01-17 14:59:34'),
(46, 1, 1, 9, '2025-01-17 14:59:34'),
(47, 1, 1, 9, '2025-01-17 14:59:34'),
(48, 1, 1, 9, '2025-01-17 14:59:34'),
(49, 1, 1, 9, '2025-01-17 14:59:34'),
(50, 1, 1, 9, '2025-01-17 14:59:34'),
(51, 1, 1, 9, '2025-01-17 14:59:34'),
(52, 1, 1, 9, '2025-01-17 14:59:34'),
(53, 1, 1, 9, '2025-01-17 14:59:34'),
(54, 1, 1, 9, '2025-01-17 14:59:34'),
(55, 1, 1, 9, '2025-01-17 14:59:34'),
(56, 1, 1, 9, '2025-01-17 14:59:34'),
(57, 1, 1, 9, '2025-01-17 14:59:34'),
(58, 1, 1, 9, '2025-01-17 14:59:34'),
(59, 1, 1, 9, '2025-01-17 14:59:34'),
(60, 1, 1, 9, '2025-01-17 14:59:34'),
(61, 1, 1, 9, '2025-01-17 14:59:34'),
(62, 1, 1, 9, '2025-01-17 14:59:34'),
(63, 1, 1, 9, '2025-01-17 14:59:39'),
(64, 1, 1, 9, '2025-01-17 14:59:39'),
(65, 1, 1, 9, '2025-01-17 14:59:39'),
(66, 1, 1, 9, '2025-01-17 14:59:39'),
(67, 1, 1, 9, '2025-01-17 14:59:39'),
(68, 1, 1, 9, '2025-01-17 14:59:40'),
(69, 1, 1, 9, '2025-01-17 14:59:40'),
(70, 1, 1, 9, '2025-01-17 14:59:40'),
(71, 1, 1, 9, '2025-01-17 14:59:40'),
(72, 1, 1, 9, '2025-01-17 14:59:40'),
(73, 1, 1, 9, '2025-01-17 14:59:40'),
(74, 1, 1, 9, '2025-01-17 14:59:40'),
(75, 1, 1, 9, '2025-01-17 14:59:40'),
(76, 1, 1, 9, '2025-01-17 14:59:40'),
(77, 1, 1, 9, '2025-01-17 14:59:40'),
(78, 1, 1, 9, '2025-01-17 14:59:40'),
(79, 1, 1, 9, '2025-01-17 14:59:40'),
(80, 1, 1, 9, '2025-01-17 14:59:40'),
(81, 1, 1, 9, '2025-01-17 14:59:40'),
(82, 1, 1, 9, '2025-01-17 14:59:40'),
(83, 1, 1, 9, '2025-01-17 14:59:40'),
(84, 1, 1, 9, '2025-01-17 14:59:40'),
(85, 1, 1, 9, '2025-01-17 14:59:40'),
(86, 1, 1, 9, '2025-01-17 14:59:41'),
(87, 1, 1, 9, '2025-01-17 14:59:41'),
(88, 1, 1, 9, '2025-01-17 14:59:41'),
(89, 1, 1, 9, '2025-01-17 14:59:42'),
(90, 1, 1, 9, '2025-01-17 14:59:42'),
(91, 1, 1, 9, '2025-01-17 14:59:42'),
(92, 1, 1, 9, '2025-01-17 14:59:42'),
(93, 1, 1, 9, '2025-01-17 14:59:42'),
(94, 1, 1, 9, '2025-01-17 14:59:42'),
(95, 1, 1, 9, '2025-01-17 14:59:42'),
(96, 1, 1, 9, '2025-01-17 14:59:42'),
(97, 1, 1, 9, '2025-01-17 14:59:42'),
(98, 1, 1, 9, '2025-01-17 14:59:42'),
(99, 1, 1, 9, '2025-01-17 14:59:43'),
(100, 1, 1, 9, '2025-01-17 14:59:43'),
(101, 1, 1, 9, '2025-01-17 14:59:43'),
(102, 1, 1, 9, '2025-01-17 14:59:43'),
(103, 1, 1, 9, '2025-01-17 14:59:44'),
(104, 1, 1, 9, '2025-01-17 14:59:44'),
(105, 1, 1, 9, '2025-01-17 14:59:44'),
(106, 1, 1, 9, '2025-01-17 14:59:44'),
(107, 1, 1, 9, '2025-01-17 14:59:44'),
(108, 1, 1, 9, '2025-01-17 14:59:44'),
(109, 1, 1, 9, '2025-01-17 14:59:44'),
(110, 1, 1, 9, '2025-01-17 14:59:44'),
(111, 15, 2, 9, '2025-01-17 15:01:34'),
(112, 15, 2, 9, '2025-01-17 15:01:40'),
(113, 16, 2, 9, '2025-01-17 15:02:02'),
(114, 16, 2, 9, '2025-01-17 15:02:04'),
(115, 25, 2, 9, '2025-01-17 15:02:17'),
(116, 1, 2, 9, '2025-01-17 15:03:52'),
(117, 1, 2, 9, '2025-01-17 15:03:53'),
(118, 1, 2, 9, '2025-01-17 15:05:03'),
(119, 1, 5, 9, '2025-01-17 15:05:17');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `role`, `date`) VALUES
(2, 'Test', 'test@test.pl', '$2y$10$m6RcyfH7JJ2m8iJo4BQY9utOC0tlYxFi843ICzF4WAfb38iQaUxki', 1, '2024-12-20 09:34:56'),
(3, 'Test2', 'test@test.pl', '$2y$10$dnVqb7SPDFSy5R9FJsOmveblKqoQ48hEqhYqcm4s8Zr5eq/bQVDaC', 1, '2024-12-20 17:19:04'),
(4, 'Test54', 'test@test.pl', '$2y$10$ObNFDQQs15J5F6WZMjyrFOvLVnXsXy85z0hPXg8qIcQxV6KIEAMwq', 1, '2024-12-20 17:19:16'),
(5, 'Test543', 'test@test.pl', '$2y$10$E55D7CG5QrLleWj6aPSYw.A0Mc/K3RuYaG0VQIDlJHJSAP2tOx4Qe', 1, '2024-12-20 17:19:29'),
(6, 'Testowe', 'test@test.pl', '$2y$10$ldpYYjwn5YkFwNC1pJ67g.UNBSaAhOq8jAFQ2xGoAkI13PeIHQEbu', 1, '2024-12-20 17:19:45'),
(7, 'Test123', 'Test2@test.pl', '$2y$10$4gOBjxwJie.TuLXnRkZk3uQiw.XPq5nxEO7Z0Zhu1FtLtwVfwsNgy', 1, '2024-12-21 12:39:02'),
(8, 'Test4', 'test@test.pl', '$2y$10$mvkmBq9Am/UdaXsz2swOCu5l/ih1BggzWEYulN5TIQfX/uKxb5iCW', 1, '2024-12-21 14:42:31'),
(9, 'Test23', 'Test2@test.pl', '$2y$10$0SBByLlqV9nXoxgSwOorhO4hU7Jt.NZGBDgkEsjtg1O71jgS1oC/G', 1, '2025-01-10 15:16:25'),
(10, 'Test65', 'test@test.pl', '$2y$10$3v9bMNfRAyksrIqrO5Vve.6LNms9nmHwjCCyXKi8FZdeZEg/VC7Vm', 1, '2025-01-17 15:45:04'),
(11, 'Test66', 'test@test.pl', '$2y$10$UDNrkWSM1PA/5hRitGPbBugvtEAXNkD4lcDfHiGZgvKyyAw34J1QS', 1, '2025-01-17 15:46:37');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `logged_in_users`
--
ALTER TABLE `logged_in_users`
  ADD PRIMARY KEY (`sessionId`);

--
-- Indeksy dla tabeli `played_games`
--
ALTER TABLE `played_games`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `played_games`
--
ALTER TABLE `played_games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
