-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2025 at 12:31 AM
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
-- Database: `nexus`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `ID_categorie` int(11) NOT NULL,
  `categorie_naam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`ID_categorie`, `categorie_naam`) VALUES
(1, 'Vrouwen'),
(2, 'Mannen'),
(3, 'Kinderen');

-- --------------------------------------------------------

--
-- Table structure for table `klanten`
--

CREATE TABLE `klanten` (
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
-- Table structure for table `product`
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
-- Dumping data for table `product`
--

INSERT INTO `product` (`IDproduct`, `IDleverancier`, `ID_categorie`, `naam_product`, `prijs_product`, `afbeelding_product`) VALUES
(1, 201, 2, 'Zwart sportshirt ', 15, 'product1.jpg'),
(2, 201, 2, 'Unisex trainingsbroek', 5, 'product4.jpg'),
(3, 201, 2, 'Hoodie sportstijl', 20, 'product2.jpg'),
(4, 203, 2, 'Zwarte sportschoenen', 10, 'product3.jpg'),
(5, 204, 2, 'Fitness hoodie unisex', 25, 'product6.jpg'),
(6, 205, 2, 'Joggingbroek - Heren', 5, 'product7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `voornaam`, `achternaam`, `email`, `telefoonnummer`, `adres`, `postcode`, `woonplaats`, `wachtwoord`, `registratiedatum`) VALUES
(2, 'saied', 'faraa', 'saied@gmail.com', '099999', '58', '2982AN', '', '$2y$10$RuQYYRPDw0eEtvNNARRBxe7FWglQVwHpzQEGSv6E6e0.djEQ.Hif2', '2025-04-06 19:51:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`ID_categorie`);

--
-- Indexes for table `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`IDproduct`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klanten`
--
ALTER TABLE `klanten`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `IDproduct` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
