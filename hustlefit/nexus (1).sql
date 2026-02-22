-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 22 feb 2026 om 20:49
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nexus`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestelling`
--

CREATE TABLE `bestelling` (
  `ID-bestelling` int(100) NOT NULL,
  `ID-klant` int(100) NOT NULL,
  `ID-product` int(100) NOT NULL,
  `aantal` int(100) NOT NULL,
  `datum` varchar(255) NOT NULL,
  `prijs` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categorie`
--

CREATE TABLE `categorie` (
  `ID_categorie` int(11) NOT NULL,
  `categorie_naam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `categorie`
--

INSERT INTO `categorie` (`ID_categorie`, `categorie_naam`) VALUES
(1, 'Vrouwenn'),
(2, 'Mannen'),
(3, 'Kinderen'),
(5, 'transgender');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categoriee`
--

CREATE TABLE `categoriee` (
  `ID_categorie` int(11) NOT NULL,
  `categorie_naam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `categoriee`
--

INSERT INTO `categoriee` (`ID_categorie`, `categorie_naam`) VALUES
(1, 'Vrouwen'),
(2, 'Mannen'),
(3, 'Kinderen');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE `klanten` (
  `ID-klant` int(255) NOT NULL,
  `Naam-Klant` varchar(100) NOT NULL,
  `Adres` varchar(100) NOT NULL,
  `Mail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klantenn`
--

CREATE TABLE `klantenn` (
  `id` int(255) NOT NULL,
  `voornaam` varchar(100) NOT NULL,
  `achternaam` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefoonnummer` varchar(100) DEFAULT NULL,
  `adres` varchar(255) DEFAULT NULL,
  `postcode` varchar(100) DEFAULT NULL,
  `woonplaats` varchar(100) DEFAULT NULL,
  `registratiedatum` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `leverancier`
--

CREATE TABLE `leverancier` (
  `ID` int(11) NOT NULL,
  `naam` varchar(100) NOT NULL,
  `land` varchar(50) NOT NULL,
  `omschrijving` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `leverancier`
--

INSERT INTO `leverancier` (`ID`, `naam`, `land`, `omschrijving`) VALUES
(1, 'Nike', 'Verenigde Staten', 'Wereldwijde leverancier van sportkleding en -schoenen'),
(2, 'Adidas', 'Duitsland', 'Bekend om sportkleding, schoenen en accessoires'),
(3, 'Zara', 'Spanje', 'Populaire modeketen met trendy kleding'),
(4, 'H&M', 'Zweden', 'Internationale retailer voor betaalbare mode'),
(5, 'Levi\'s', 'Verenigde Staten', 'Iconisch merk bekend om jeans en denimkleding'),
(6, 'Gucci', 'Italië', 'Luxe modemerk voor designer kleding en accessoires'),
(7, 'Puma', 'Duitsland', 'Fabrikant van sportkleding, -schoenen en -accessoires'),
(8, 'The North Face', 'Verenigde Staten', 'Bekend om outdoor- en sportkleding'),
(9, 'Tommy Hilfiger', 'Verenigde Staten', 'Modieus merk voor klassieke Amerikaanse stijl'),
(10, 'Versace', 'Italië', 'Luxe modehuis met extravagante ontwerpen'),
(11, 'Supreme', 'Verenigde Staten', 'Streetwear merk bekend om limited-edition releases'),
(12, 'Tommy Hilfiger', 'Verenigde Staten', 'Klassiek Amerikaans merk met preppy kleding'),
(13, 'Versace', 'Italië', 'Luxe modehuis met iconische prints en designs'),
(14, 'Stone Island', 'Italië', 'Innovatief merk voor technische sportkleding'),
(15, 'New Balance', 'Verenigde Staten', 'Bekend om hoogwaardige sportschoenen en -kleding'),
(16, 'Diesel', 'Italië', 'Denimmerk met stoere, rebelse uitstraling'),
(17, 'Ralph Lauren', 'Verenigde Staten', 'Iconisch voor zijn polo’s en elegante casual wear'),
(18, 'Fila', 'Zuid-Korea', 'Sportmerk met retro designs en sportieve kleding'),
(19, 'Kenzo', 'Frankrijk', 'Modehuis dat oosterse en westerse stijlen combineert'),
(20, 'Champion', 'Verenigde Staten', 'Sportmerk dat bekendstaat om zijn sweaters en hoodies'),
(21, 'Balenciaga', 'Spanje', 'High-end modehuis bekend om avant-garde ontwerpen'),
(22, 'Patagonia', 'Verenigde Staten', 'Duurzaam merk voor outdoor kleding en accessoires'),
(23, 'Moncler', 'Italië', 'Luxe merk voor winterkleding en jassen'),
(24, 'ASICS', 'Japan', 'Sportmerk gespecialiseerd in hardloopschoenen en -kleding'),
(25, 'Under Armour', 'Verenigde Staten', 'Innovatief sportmerk voor prestatiegerichte kleding'),
(26, 'Celine', 'Frankrijk', 'Luxe modehuis met minimalistische ontwerpen'),
(27, 'Armani', 'Italië', 'Elegant modemerk voor luxe pakken en casual wear'),
(28, 'Lacoste', 'Frankrijk', 'Sportief chique merk bekend om polo’s en casual kleding'),
(29, 'Everlane', 'Verenigde Staten', 'Modern merk met focus op duurzame, transparante mode'),
(30, 'Dr. Martens', 'Verenigd Koninkrijk', 'Iconisch schoenenmerk bekend om stoere boots');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `IDproduct` int(5) NOT NULL,
  `IDleverancier` int(5) NOT NULL,
  `ID_categorie` int(5) NOT NULL,
  `naam_product` varchar(50) NOT NULL,
  `prijs_product` int(50) NOT NULL,
  `afbeelding_product` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`IDproduct`, `IDleverancier`, `ID_categorie`, `naam_product`, `prijs_product`, `afbeelding_product`) VALUES
(1, 201, 2, 'Zwart sportshirt ', 15, 'product1.jpg'),
(2, 201, 2, 'Unisex trainingsbroek', 5, 'product4.jpg'),
(3, 201, 2, 'Hoodie sportstijl', 20, 'product2.jpg'),
(4, 203, 2, 'Zwarte sportschoenen', 10, 'product3.jpg'),
(5, 204, 2, 'Fitness hoodie unisex', 25, 'product6.jpg'),
(6, 205, 2, 'Zwart korte broek', 5, 'product8.jpg'),
(7, 206, 1, 'zwarte schoenen', 40, 'product9.jpg'),
(8, 207, 3, 'kids shirt', 6, 'product10.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `productt`
--

CREATE TABLE `productt` (
  `IDproduct` int(5) NOT NULL,
  `IDleverancier` int(5) NOT NULL,
  `ID_categorie` int(5) NOT NULL,
  `naam_product` varchar(50) NOT NULL,
  `prijs_product` int(50) NOT NULL,
  `afbeelding_product` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `productt`
--

INSERT INTO `productt` (`IDproduct`, `IDleverancier`, `ID_categorie`, `naam_product`, `prijs_product`, `afbeelding_product`) VALUES
(1, 201, 2, 'Zwart sportshirt ', 15, 'product1.jpg'),
(2, 201, 2, 'Unisex trainingsbroek', 5, 'product4.jpg'),
(3, 201, 2, 'Hoodie sportstijl', 20, 'product2.jpg'),
(4, 203, 2, 'Zwarte sportschoenen', 10, 'product3.jpg'),
(5, 204, 2, 'Fitness hoodie unisex', 25, 'product6.jpg'),
(6, 205, 2, 'Joggingbroek - Heren', 5, 'product7.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `userss`
--

CREATE TABLE `userss` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(100) NOT NULL,
  `achternaam` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefoonnummer` varchar(100) DEFAULT NULL,
  `adres` varchar(255) DEFAULT NULL,
  `postcode` varchar(100) DEFAULT NULL,
  `woonplaats` varchar(100) DEFAULT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `registratiedatum` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `userss`
--

INSERT INTO `userss` (`id`, `voornaam`, `achternaam`, `email`, `telefoonnummer`, `adres`, `postcode`, `woonplaats`, `wachtwoord`, `registratiedatum`) VALUES
(2, 'saied', 'faraa', 'saied@gmail.com', '099999', '58', '2982AN', '', '$2y$10$RuQYYRPDw0eEtvNNARRBxe7FWglQVwHpzQEGSv6E6e0.djEQ.Hif2', '2025-04-06 19:51:28');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestelling`
--
ALTER TABLE `bestelling`
  ADD PRIMARY KEY (`ID-bestelling`);

--
-- Indexen voor tabel `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`ID_categorie`);

--
-- Indexen voor tabel `categoriee`
--
ALTER TABLE `categoriee`
  ADD PRIMARY KEY (`ID_categorie`);

--
-- Indexen voor tabel `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`ID-klant`);

--
-- Indexen voor tabel `klantenn`
--
ALTER TABLE `klantenn`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `leverancier`
--
ALTER TABLE `leverancier`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`IDproduct`);

--
-- Indexen voor tabel `productt`
--
ALTER TABLE `productt`
  ADD PRIMARY KEY (`IDproduct`);

--
-- Indexen voor tabel `userss`
--
ALTER TABLE `userss`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bestelling`
--
ALTER TABLE `bestelling`
  MODIFY `ID-bestelling` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `categorie`
--
ALTER TABLE `categorie`
  MODIFY `ID_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `klanten`
--
ALTER TABLE `klanten`
  MODIFY `ID-klant` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `klantenn`
--
ALTER TABLE `klantenn`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `leverancier`
--
ALTER TABLE `leverancier`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `IDproduct` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT voor een tabel `productt`
--
ALTER TABLE `productt`
  MODIFY `IDproduct` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT voor een tabel `userss`
--
ALTER TABLE `userss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
