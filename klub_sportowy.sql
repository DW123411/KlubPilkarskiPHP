-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Lis 2018, 23:40
-- Wersja serwera: 10.1.31-MariaDB
-- Wersja PHP: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `klub_sportowy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klub`
--

CREATE TABLE `klub` (
  `id` int(11) NOT NULL,
  `Siedziba` varchar(70) COLLATE utf8_polish_ci NOT NULL,
  `Nazwa` varchar(90) COLLATE utf8_polish_ci NOT NULL,
  `Opis` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `IdT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `klub`
--

INSERT INTO `klub` (`id`, `Siedziba`, `Nazwa`, `Opis`, `IdT`) VALUES
(1, 'Kobylin', 'Piast Kobylin', NULL, 1),
(2, 'Krotoszyn', 'Astra Krotoszyn', '', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mecz`
--

CREATE TABLE `mecz` (
  `id` int(11) NOT NULL,
  `IdS` int(11) NOT NULL,
  `Data` datetime NOT NULL,
  `IdStadion` int(11) NOT NULL,
  `IdKlubGospodarze` int(11) NOT NULL,
  `IdKlubGoscie` int(11) NOT NULL,
  `BramkiGospodarze` int(11) NOT NULL,
  `BramkiGoscie` int(11) NOT NULL,
  `PunktyGospodarze` int(11) NOT NULL,
  `PunktyGoscie` int(11) NOT NULL,
  `Opis` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `IdSedzia` int(11) NOT NULL,
  `Kibice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `mecz`
--

INSERT INTO `mecz` (`id`, `IdS`, `Data`, `IdStadion`, `IdKlubGospodarze`, `IdKlubGoscie`, `BramkiGospodarze`, `BramkiGoscie`, `PunktyGospodarze`, `PunktyGoscie`, `Opis`, `IdSedzia`, `Kibice`) VALUES
(1, 1, '2018-11-27 12:00:00', 1, 1, 2, 3, 1, 3, 0, NULL, 1, 1000);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sedzia`
--

CREATE TABLE `sedzia` (
  `id` int(11) NOT NULL,
  `Imie` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `sedzia`
--

INSERT INTO `sedzia` (`id`, `Imie`, `Nazwisko`) VALUES
(1, 'Jan', 'Kowalski');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sezon`
--

CREATE TABLE `sezon` (
  `id` int(11) NOT NULL,
  `RokOd` int(11) NOT NULL,
  `RokDo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `sezon`
--

INSERT INTO `sezon` (`id`, `RokOd`, `RokDo`) VALUES
(1, 2017, 2018);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stadion`
--

CREATE TABLE `stadion` (
  `id` int(11) NOT NULL,
  `Nazwa` varchar(90) COLLATE utf8_polish_ci NOT NULL,
  `Miejscowosc` varchar(70) COLLATE utf8_polish_ci NOT NULL,
  `Pojemnosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `stadion`
--

INSERT INTO `stadion` (`id`, `Nazwa`, `Miejscowosc`, `Pojemnosc`) VALUES
(1, 'Stadion Miejski', 'Kobylin', 3000);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trener`
--

CREATE TABLE `trener` (
  `id` int(11) NOT NULL,
  `Imie` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `trener`
--

INSERT INTO `trener` (`id`, `Imie`, `Nazwisko`) VALUES
(1, 'Adam', 'Kowalski'),
(3, 'Sergiusz', 'Adamiak');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zawodnik`
--

CREATE TABLE `zawodnik` (
  `id` int(11) NOT NULL,
  `Imie` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `IdK` int(11) NOT NULL,
  `Opis` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `zawodnik`
--

INSERT INTO `zawodnik` (`id`, `Imie`, `Nazwisko`, `IdK`, `Opis`) VALUES
(1, 'Mauro', 'Icardi', 1, 'Napastnik'),
(2, 'Adam', 'Kowalski', 2, 'Pomocnik');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zawodnikmecz`
--

CREATE TABLE `zawodnikmecz` (
  `id` int(11) NOT NULL,
  `IdM` int(11) NOT NULL,
  `IdZ` int(11) NOT NULL,
  `Pozycja` varchar(3) COLLATE utf8_polish_ci NOT NULL,
  `MinutyOd` int(11) NOT NULL,
  `MinutyDo` int(11) NOT NULL,
  `Bramki` int(11) NOT NULL,
  `Asysty` int(11) NOT NULL,
  `KartkiZolte` int(11) NOT NULL,
  `KartkiCzerwone` int(11) NOT NULL,
  `PodaniaUdane` int(11) NOT NULL,
  `PodaniaNieudane` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `zawodnikmecz`
--

INSERT INTO `zawodnikmecz` (`id`, `IdM`, `IdZ`, `Pozycja`, `MinutyOd`, `MinutyDo`, `Bramki`, `Asysty`, `KartkiZolte`, `KartkiCzerwone`, `PodaniaUdane`, `PodaniaNieudane`) VALUES
(1, 1, 1, 'N', 1, 90, 2, 0, 1, 0, 20, 10);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klub`
--
ALTER TABLE `klub`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Klub_Trener` (`IdT`);

--
-- Indeksy dla tabeli `mecz`
--
ALTER TABLE `mecz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Mecz_Sezon` (`IdS`),
  ADD KEY `FK_Mecz_Stadion` (`IdStadion`),
  ADD KEY `FK_Mecz_KlubGosp` (`IdKlubGospodarze`),
  ADD KEY `FK_Mecz_KlubGosc` (`IdKlubGoscie`),
  ADD KEY `FK_Mecz_Sedzia` (`IdSedzia`);

--
-- Indeksy dla tabeli `sedzia`
--
ALTER TABLE `sedzia`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `sezon`
--
ALTER TABLE `sezon`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `stadion`
--
ALTER TABLE `stadion`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `trener`
--
ALTER TABLE `trener`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zawodnik`
--
ALTER TABLE `zawodnik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Zawodnik_Klub` (`IdK`);

--
-- Indeksy dla tabeli `zawodnikmecz`
--
ALTER TABLE `zawodnikmecz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ZawodnikMecz_Mecz` (`IdM`),
  ADD KEY `FK_ZawodnikMecz_Zawodnik` (`IdZ`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `klub`
--
ALTER TABLE `klub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `mecz`
--
ALTER TABLE `mecz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `sedzia`
--
ALTER TABLE `sedzia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `sezon`
--
ALTER TABLE `sezon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `stadion`
--
ALTER TABLE `stadion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `trener`
--
ALTER TABLE `trener`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `zawodnik`
--
ALTER TABLE `zawodnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `zawodnikmecz`
--
ALTER TABLE `zawodnikmecz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `klub`
--
ALTER TABLE `klub`
  ADD CONSTRAINT `FK_Klub_Trener` FOREIGN KEY (`IdT`) REFERENCES `trener` (`id`);

--
-- Ograniczenia dla tabeli `mecz`
--
ALTER TABLE `mecz`
  ADD CONSTRAINT `FK_Mecz_KlubGosc` FOREIGN KEY (`IdKlubGoscie`) REFERENCES `klub` (`id`),
  ADD CONSTRAINT `FK_Mecz_KlubGosp` FOREIGN KEY (`IdKlubGospodarze`) REFERENCES `klub` (`id`),
  ADD CONSTRAINT `FK_Mecz_Sedzia` FOREIGN KEY (`IdSedzia`) REFERENCES `sedzia` (`id`),
  ADD CONSTRAINT `FK_Mecz_Sezon` FOREIGN KEY (`IdS`) REFERENCES `sezon` (`id`),
  ADD CONSTRAINT `FK_Mecz_Stadion` FOREIGN KEY (`IdStadion`) REFERENCES `stadion` (`id`);

--
-- Ograniczenia dla tabeli `zawodnik`
--
ALTER TABLE `zawodnik`
  ADD CONSTRAINT `FK_Zawodnik_Klub` FOREIGN KEY (`IdK`) REFERENCES `klub` (`id`);

--
-- Ograniczenia dla tabeli `zawodnikmecz`
--
ALTER TABLE `zawodnikmecz`
  ADD CONSTRAINT `FK_ZawodnikMecz_Mecz` FOREIGN KEY (`IdM`) REFERENCES `mecz` (`id`),
  ADD CONSTRAINT `FK_ZawodnikMecz_Zawodnik` FOREIGN KEY (`IdZ`) REFERENCES `zawodnik` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
