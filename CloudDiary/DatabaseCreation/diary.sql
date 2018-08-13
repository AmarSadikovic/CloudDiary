-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 15 okt 2017 kl 12:34
-- Serverversion: 10.1.26-MariaDB
-- PHP-version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `diary`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `message` varchar(750) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `post`
--

INSERT INTO `post` (`id`, `title`, `message`, `users_id`) VALUES
(19, 'Test for handin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tristique malesuada risus. Nam commodo, ipsum sed varius finibus, felis metus tristique odio, vitae tempus quam tortor non massa. Maecenas vel augue et metus vestibulum dapibus eu ac nisi. Suspendisse ultrices erat ornare nisi rutrum, vitae scelerisque ante blandit. Maecenas ut neque lectus. Phasellus commodo erat quis mauris egestas blandit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent ipsum tortor, faucibus nec elit in, dictum venenatis felis.', 51);

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `mail`, `password`, `active`) VALUES
(51, 'amar.sadikovic@hotmail.com', '123', 1);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
