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

-- ==================================================================================================
-- *************************     DATA      **********************************************************
-- ==================================================================================================

INSERT INTO `Client` (`ClientId`,`Name`, `Phone`, `ShippingAddress`, `email`, `birthDate`) VALUES
(40,	'Micaela',	'661-407-6212',	'37995 Schmeler Springs',	'Berry93@hotmail.com',	NULL),
(41,	'Micaela',	'661-407-6212',	'37995 Schmeler Springs',	'Berry93@hotmail.com',	NULL),
(42,	'Stephania',	'529-372-9695',	'5721 Auer Row',	'Marion4@hotmail.com',	NULL),
(43,	'Stephania',	'529-372-9695',	'5721 Auer Row',	'Marion4@hotmail.com',	NULL),
(44,	'Lela',	'889-762-0482',	'66609 Runolfsson Crossroad',	'Wyman1@yahoo.com',	NULL),
(45,	'Lela',	'889-762-0482',	'66609 Runolfsson Crossroad',	'Wyman1@yahoo.com',	NULL),
(46,	'Kurtis',	'537-689-7590',	'351 Mosciski Ranch',	'Margarett80@hotmail.com',	NULL),
(47,	'Kurtis',	'537-689-7590',	'351 Mosciski Ranch',	'Margarett80@hotmail.com',	NULL),
(48,	'Maribel',	'867-760-7280',	'621 Eldon Burgs',	'Elda95@gmail.com',	NULL),
(49,	'Buster',	'592-932-4488',	'04976 Johnathon Ranch',	'Houston.VonRueden21@yahoo.com',	NULL),
(50,	'Brock',	'470-235-0573',	'6961 Jacinto Mountains',	'Oda76@hotmail.com',	NULL),
(51,	'Olen',	'350-744-3957',	'8147 Brekke Pike',	'Cole3@yahoo.com',	NULL),
(52,	'Ezra',	'441-316-7369',	'072 Rosemarie Skyway',	'Kristina62@hotmail.com',	NULL),
(53,	'Jonathan',	'530-811-0746',	'45306 Gutkowski Terrace',	'Etha_Osinski48@yahoo.com',	NULL),
(54,	'Deion',	'549-451-7077',	'77536 Vance Route',	'Tony_Harber60@gmail.com',	NULL),
(55,	'Ardith',	'830-542-3371',	'742 Terrill Ways',	'Yadira82@gmail.com',	NULL),
(56,	'Gus',	'914-905-3155',	'34412 Hellen Stravenue',	'Mallory70@yahoo.com',	NULL),
(57,	'Lora',	'804-395-5053',	'1652 Kunze Alley',	'Daphnee4@yahoo.com',	NULL),
(58,	'Felix',	'815-320-7833',	'206 Mac Junction',	'Quentin_Greenholt@yahoo.com',	NULL),
(59,	'Myrtice',	'871-705-6263',	'6901 Schaden Lane',	'Wayne_Lynch42@hotmail.com',	NULL),
(60,	'Irwin',	'369-854-7074',	'78593 Lorenza Street',	'Audie29@gmail.com',	NULL),
(61,	'Delaney',	'951-598-7399',	'9253 Marielle Junctions',	'Delaney.Heathcote89@yahoo.com',	NULL),
(62,	'Mara',	'401-247-2625',	'70736 Collins Forges',	'Hilda.Upton@hotmail.com',	NULL),
(63,	'Vickie',	'778-467-3242',	'3639 Cortney Tunnel',	'Annette_Beatty18@hotmail.com',	NULL),
(64,	'Alek',	'586-489-5146',	'95026 Alba Stream',	'Donato88@yahoo.com',	NULL)
ON DUPLICATE KEY
UPDATE `ClientId` = VALUES
(`ClientId`), `Name` = VALUES
(`Name`), `Phone` = VALUES
(`Phone`), `ShippingAddress` = VALUES
(`ShippingAddress`), `email` = VALUES
(`email`), `birthDate` = VALUES
(`birthDate`);

INSERT INTO `Movie` (`MovieId`,`Title`, `LaunchDate`, `TotalCopies`, `AvaliableCopies`) VALUES
(1,	'Sharknado',	'2013-07-11 00:00:00',	10,	4),
(2,	'Harry Potter and the Prisoner of Azkaban',	'2004-10-01 00:00:00',	20,	18),
(3,	'Harry Potter and the Goblet of Fire',	'2005-01-01 00:00:00',	40,	13),
(4,	'Harry Potter and the Order of the Phoenix',	'2007-01-05 00:00:00',	50,	16),
(5,	'Harry Potter and the Half-Blood Prince',	'2009-12-31 00:00:00',	20,	0)
ON DUPLICATE KEY
UPDATE `MovieId` = VALUES
(`MovieId`), `Title` = VALUES
(`Title`), `LaunchDate` = VALUES
(`LaunchDate`), `TotalCopies` = VALUES
(`TotalCopies`), `AvaliableCopies` = VALUES
(`AvaliableCopies`);

INSERT INTO `Rental` (`RentailId`,`MovieId`, `ClientId`, `StartDate`, `NumberOfDaysRented`, `Price`) VALUES
(1,	1,	50,	'2021-07-25 00:00:00',	7,	33.5),
(2,	1,	51,	'2021-07-25 00:00:00',	7,	35.2857),
(3,	1,	52,	'2021-07-25 00:00:00',	7,	37.6667),
(4,	1,	53,	'2021-07-25 00:00:00',	7,	41),
(5,	1,	54,	'2021-07-25 00:00:00',	7,	46),
(6,	1,	55,	'2021-07-25 00:00:00',	7,	54.3333),
(7,	1,	56,	'2021-07-25 00:00:00',	7,	71),
(8,	1,	57,	'2021-07-25 00:00:00',	7,	121),
(9,	4,	58,	'2021-07-26 00:00:00',	7,	46),
(10,	4,	59,	'2021-07-26 00:00:00',	7,	47.3158),
(11,	4,	60,	'2021-07-26 00:00:00',	7,	48.7778),
(12,	2,	61,	'2021-07-26 00:00:00',	7,	31),
(13,	2,	62,	'2021-07-26 00:00:00',	7,	31.5263),
(14,	1,	63,	'2021-07-26 00:00:00',	7,	41),
(15,	4,	64,	'2021-07-26 00:00:00',	7,	50.4118)
ON DUPLICATE KEY
UPDATE `RentailId` = VALUES
(`RentailId`), `MovieId` = VALUES
(`MovieId`), `ClientId` = VALUES
(`ClientId`), `StartDate` = VALUES
(`StartDate`), `NumberOfDaysRented` = VALUES
(`NumberOfDaysRented`), `Price` = VALUES
(`Price`);

-- 2021-07-26 16:38:21
