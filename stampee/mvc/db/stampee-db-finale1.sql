-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 27, 2024 at 05:03 PM
-- Server version: 8.3.0
-- PHP Version: 8.3.6

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stampee-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `enchere`
--

DROP TABLE IF EXISTS `enchere`;
CREATE TABLE IF NOT EXISTS `enchere` (
  `idEnchere` int NOT NULL AUTO_INCREMENT,
  `Periode_d_activite` date DEFAULT NULL,
  `prix_plancher` decimal(10,2) DEFAULT NULL,
  `timbre_idTimbre` int DEFAULT NULL,
  `coup_de_coeur_du_lord` tinyint DEFAULT NULL,
  `estimation` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`idEnchere`),
  KEY `Timbre_idTimbre` (`timbre_idTimbre`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `enchere`
--

INSERT INTO `enchere` (`idEnchere`, `Periode_d_activite`, `prix_plancher`, `timbre_idTimbre`, `coup_de_coeur_du_lord`, `estimation`) VALUES
(1, '2024-09-30', 120.36, 17, NULL, 250.00),
(2, '2025-01-01', 1000.00, 19, NULL, 3000.00),
(7, '2024-10-04', 8000.00, 23, NULL, 10000.00);

-- --------------------------------------------------------

--
-- Table structure for table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE IF NOT EXISTS `favoris` (
  `idFavoris` int NOT NULL,
  PRIMARY KEY (`idFavoris`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `idImage` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `timbre_idTimbre` int DEFAULT NULL,
  PRIMARY KEY (`idImage`),
  KEY `timbre_idTimbre` (`timbre_idTimbre`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`idImage`, `nom`, `timbre_idTimbre`) VALUES
(2, 'e4Hk3P0RuCls56W', 12),
(3, 'Ba2zf1ZRYXxybHe', 17),
(4, 'BuKWU7kqvJrHdQm', 18),
(5, 'dg0ZC4FH5T8IshS', 19),
(6, 'iHgpkGu78XvLI5Q', 20),
(8, 'PkU03HtOInl7C4m', 22),
(9, 'j1zL7DwvBdIn65p', 23),
(10, 'lhIjH46fbg7itM1', 24),
(11, 'Bsb23UALSvjItgo', 24);

-- --------------------------------------------------------

--
-- Table structure for table `mises`
--

DROP TABLE IF EXISTS `mises`;
CREATE TABLE IF NOT EXISTS `mises` (
  `idMises` int NOT NULL AUTO_INCREMENT,
  `utilisateur_idUtilisateur` int DEFAULT NULL,
  `montant` decimal(10,2) NOT NULL,
  `enchere_idEnchere` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idMises`),
  KEY `fk_mises_enchere` (`enchere_idEnchere`),
  KEY `fk_utilisateur` (`utilisateur_idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mises`
--

INSERT INTO `mises` (`idMises`, `utilisateur_idUtilisateur`, `montant`, `enchere_idEnchere`, `created_at`, `updated_at`) VALUES
(1, 12, 1150.00, 2, '2024-09-26 22:44:32', '2024-09-26 18:44:32'),
(2, 14, 1250.00, 2, '2024-09-27 15:43:10', '2024-09-27 11:43:10'),
(3, 2, 150.36, 1, '2024-09-27 16:53:09', '2024-09-27 12:53:09');

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

DROP TABLE IF EXISTS `privilege`;
CREATE TABLE IF NOT EXISTS `privilege` (
  `idPrivilege` int NOT NULL AUTO_INCREMENT,
  `privilege` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idPrivilege`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`idPrivilege`, `privilege`) VALUES
(1, 'Membre'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `timbre`
--

DROP TABLE IF EXISTS `timbre`;
CREATE TABLE IF NOT EXISTS `timbre` (
  `idTimbre` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date_de_creation` date DEFAULT NULL,
  `couleur` varchar(45) DEFAULT NULL,
  `pays_d_origine` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `etat` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dimensions` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `certifie` tinyint DEFAULT NULL,
  `tirage` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `idUtilisateur` int NOT NULL,
  PRIMARY KEY (`idTimbre`),
  KEY `idUtilisateur_fk` (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `timbre`
--

INSERT INTO `timbre` (`idTimbre`, `nom`, `date_de_creation`, `couleur`, `pays_d_origine`, `etat`, `dimensions`, `certifie`, `tirage`, `description`, `created_at`, `idUtilisateur`) VALUES
(17, 'Great Great Britain', '2024-09-06', 'Multicolor', 'Great Britain', 'New', '100X100', 1, '100000', 'Nouveau', '2024-09-25 12:20:29', 12),
(19, 'London', '2017-02-09', 'Multicolor', 'England', 'New', '250x250', 1, '250', 'The united kingdoms', '2024-09-25 12:52:20', 2),
(23, 'La dame', '2024-09-27', 'blue/beige', 'France', 'Usé', '100X100', 1, '14', 'Un timbre rare de la collection du Lord.', '2024-09-27 15:56:46', 14);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `name` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `numero_de_telephone` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `privilege_idprivilege` int DEFAULT NULL,
  PRIMARY KEY (`idUtilisateur`),
  KEY `Privilege_idPrivilege` (`privilege_idprivilege`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `username`, `name`, `email`, `password`, `numero_de_telephone`, `privilege_idprivilege`) VALUES
(2, 'John_Doe22', 'John Doe', 'john@example.com', '$2y$10$ezQkcNOAouQXim4fZ8D3juxNgcbdUka9toJFVC.K6560.HLszZ456', '123-456-7890', 1),
(10, 'JonD', 'Jon Dwayne', 'jond@test.ca', '$2y$10$lbEeoLAW0D0OdFTzIrE/YOyA9YaCABNzt0ri7ZYbA28Tjrh/Qdja2', '438-555-5555', 1),
(11, 'Petertest', 'Peter', 'peter@test.ca', '$2y$10$tBniH3cunGlp9yNAXJgF3ekEQ2pejdDK/n6OyhkMK6bc5zdibI3/W', '438-555-5555', 1),
(12, 'JaneTest', 'Jane', 'jane@gmail.com', '$2y$10$QGmU9OCnGwsqP178gJ6dj.yN8sCVpEi./PLLbA2hdiNHdfnpUKezG', '437-555-5555', 1),
(14, 'LordStamp', 'LordStampee', 'lordstamp@test.uk', '$2y$10$V1b2Zd6Ls9Tv0Qe/uT2nw.Lt5l97XiAEDnkvNYDFuhfLequrkA3N2', '123-555-4444', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mises`
--
ALTER TABLE `mises`
  ADD CONSTRAINT `fk_mises_enchere` FOREIGN KEY (`enchere_idEnchere`) REFERENCES `enchere` (`idEnchere`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_utilisateur` FOREIGN KEY (`utilisateur_idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timbre`
--
ALTER TABLE `timbre`
  ADD CONSTRAINT `fk_id_utilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
