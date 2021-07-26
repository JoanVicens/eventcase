-- Adminer 4.8.1 MySQL 8.0.26 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE IF NOT EXISTS dvdRental;
USE dvdRental;

CREATE TABLE IF NOT EXISTS `Client` (
  `ClientId` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `ShippingAddress` varchar(100) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `birthDate` datetime DEFAULT NULL,
  PRIMARY KEY (`ClientId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE IF NOT EXISTS `Movie` (
  `MovieId` int NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `LaunchDate` datetime NOT NULL,
  `AvaliableCopies` int NOT NULL,
  PRIMARY KEY (`MovieId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;


CREATE TABLE IF NOT EXISTS `Rental` (
  `RentailId` int NOT NULL AUTO_INCREMENT,
  `MovieId` int NOT NULL,
  `ClientId` int NOT NULL,
  `StartDate` datetime NOT NULL,
  `NumberOfDaysRented` datetime NOT NULL,
  `Price` float NOT NULL,
  PRIMARY KEY (`RentailId`),
  KEY `MovieId` (`MovieId`),
  KEY `ClientId` (`ClientId`),
  CONSTRAINT `rental_ibfk_3` FOREIGN KEY (`MovieId`) REFERENCES `Movie` (`MovieId`),
  CONSTRAINT `rental_ibfk_4` FOREIGN KEY (`ClientId`) REFERENCES `Client` (`ClientId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- 2021-07-25 19:08:49
