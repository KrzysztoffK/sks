-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sty 30, 2025 at 11:37 PM
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
-- Database: `sks`
--
CREATE DATABASE IF NOT EXISTS `sks` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE `sks`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zawodnicy`
--

CREATE TABLE `zawodnicy` (
  `id` int(11) NOT NULL,
  `imie` varchar(50) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `klasa` int(11) NOT NULL,
  `rokurodzenia` int(11) NOT NULL,
  `wzrost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `zawodnicy`
--

INSERT INTO `zawodnicy` (`id`, `imie`, `nazwisko`, `klasa`, `rokurodzenia`, `wzrost`) VALUES
(1, 'Jan', 'Kowalski', 3, 2006, 178),
(2, 'Anna', 'Nowak', 5, 2010, 165),
(3, 'Marek', 'Wiśniewski', 2, 2008, 180),
(4, 'Katarzyna', 'Wójcik', 4, 2007, 172),
(5, 'Tomasz', 'Kamiński', 6, 2009, 185),
(6, 'Agnieszka', 'Lewandowska', 7, 2012, 160),
(7, 'Piotr', 'Zieliński', 1, 2011, 170),
(8, 'Monika', 'Szymańska', 3, 2005, 168),
(9, 'Paweł', 'Woźniak', 8, 2013, 190),
(10, 'Joanna', 'Dąbrowska', 4, 2014, 162),
(11, 'Adam', 'Kaczmarek', 2, 2008, 175),
(12, 'Ewa', 'Mazur', 5, 2007, 169),
(13, 'Krzysztof', 'Krawczyk', 6, 2010, 182),
(14, 'Magdalena', 'Jankowska', 7, 2009, 163),
(15, 'Robert', 'Pawłowski', 1, 2006, 177),
(16, 'Beata', 'Kubiak', 8, 2015, 161),
(17, 'Mateusz', 'Piotrowski', 2, 2005, 184),
(18, 'Zofia', 'Michalska', 3, 2012, 158),
(19, 'Sebastian', 'Zalewski', 4, 2007, 176),
(20, 'Julia', 'Baran', 5, 2009, 171),
(21, 'Grzegorz', 'Adamski', 6, 2006, 186),
(22, 'Weronika', 'Górska', 7, 2013, 159),
(23, 'Damian', 'Chmielewski', 1, 2011, 180),
(24, 'Natalia', 'Król', 8, 2010, 166),
(25, 'Łukasz', 'Wilk', 3, 2008, 181),
(26, 'Aleksandra', 'Olszewska', 2, 2014, 157),
(27, 'Karol', 'Sikorski', 4, 2005, 178),
(28, 'Izabela', 'Jaworska', 5, 2012, 164),
(29, 'Marcin', 'Czarnecki', 6, 2006, 183),
(30, 'Karolina', 'Kopeć', 7, 2009, 167);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `zawodnicy`
--
ALTER TABLE `zawodnicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `zawodnicy`
--
ALTER TABLE `zawodnicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
