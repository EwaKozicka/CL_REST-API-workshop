-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~xenial.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 23 Mar 2017, 13:49
-- Wersja serwera: 5.7.17-0ubuntu0.16.04.1
-- Wersja PHP: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `library`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Book`
--

CREATE TABLE `Book` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `Book`
--

INSERT INTO `Book` (`id`, `name`, `author`, `description`) VALUES
(3, 'Rok 1984', 'George Orwell', 'Futurystyczna antyutopia o licznych podtekstach politycznych, napisana i opublikowana w roku 1949. Autor napisał ją pod wpływem kontaktu z praktyczną stroną systemu stalinowskiego, do jakiego po raz pierwszy doszło w Hiszpanii w 1936 roku (w czasie wojny domowej), gdzie pojechał jako dziennikarz i sympatyk strony republikańskiej.'),
(9, 'Mistrz i Małgorzata', 'Michaił Bułhakow', 'Do dzisiaj i śmiech, i łzy towarzyszą lekturze „Mistrza i Małgorzaty”. Bułhakow opisał świat współczesny szyderczo i bez litości, nie pozostawiając czytelnikom szczególnej nadziei; na pociechę zostawił obietnicę, że „rękopisy nie płoną”, że człowiek jest, a może raczej bywa – dobry. Nawet szatan w „Mistrzu i Małgorzacie” okazuje się w końcu przyzwoitym facetem.'),
(20, 'Zły', 'Leopold Tyrmand', 'Książka – legenda. Najpoczytniejszy kryminał napisany w czasach PRL-u. A tak naprawdę niezwykle inteligentnie opis Polski Ludowej, przebrany w strój ni to kryminału, ni to romansu, ni to westernu.'),
(51, 'Futu.re', 'Dmitry Glukhovsky', 'Już za naszego życia zostaną dokonane odkrycia, które pozwolę ludziom pozostać wiecznie młodym. Nie będzie już śmierci. Nasze dzieci nigdy nie umrą.\nWitaj w przyszłości. W świecie zamieszkałym przez wiecznie młodych, doskonale zdrowych, szczęśliwych ludzi. '),
(55, 'Gra w klasy', 'Julio Cortazar', '\"Gra w klasy\" to książka szczególna: można ją czytać w nieskończoność, odkrywając coraz to inne konteksty, układając za każdym razem nowe warianty zakończenia poszczególnych wątków, zmieniając kolejność rozdziałów i stron. Ta książka przypomina zabawę w klocki, kiedy z małych sześcianów powstaje pałac albo most - możliwości są nieograniczone.');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `Book`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `Book`
--
ALTER TABLE `Book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
