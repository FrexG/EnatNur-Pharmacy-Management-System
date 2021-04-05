-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 13, 2020 at 05:39 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.0.25-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inatnur_schema`
--

-- --------------------------------------------------------
-- DATA BASE CREATION
	CREATE DATABASE inatnur_schema;
	USE inatnur_schema;

-- Table structure for table `ACCOUNTS`
--

CREATE TABLE `ACCOUNTS` (
  `USER_ID` mediumint(8) UNSIGNED NOT NULL,
  `ROLE_ID` mediumint(6) UNSIGNED NOT NULL,
  `User_Name` varchar(30) NOT NULL,
  `PSWD` mediumint(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ACCOUNTS`
--

INSERT INTO `ACCOUNTS` (`USER_ID`, `ROLE_ID`, `User_Name`, `PSWD`) VALUES
(1, 0, 'Hirut', 12345),
(2, 1, 'Selam', 12345),
(3, 1, 'Henok', 12345);

-- --------------------------------------------------------

--
-- Table structure for table `DRUGS`
--

CREATE TABLE `DRUGS` (
  `Drug_ID` int(11) NOT NULL,
  `Drug_Type` varchar(60) DEFAULT NULL,
  `Drug_Name` varchar(60) DEFAULT NULL,
  `Unit` varchar(10) DEFAULT NULL,
  `Ind_Price` decimal(8,3) NOT NULL DEFAULT '1.000',
  `ExpireDate` date DEFAULT '2020-11-25'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `DRUGS`
--

INSERT INTO `DRUGS` (`Drug_ID`, `Drug_Type`, `Drug_Name`, `Unit`, `Ind_Price`, `ExpireDate`) VALUES
(0, 'Drug', 'Ibuprofen', 'Some_Unit', '1.500', '2021-10-15'),
(1, 'Drug', 'Oxygen', 'Some_Unit', '1.500', '2021-10-15'),
(2, 'Drug', 'Gabapentin', 'Some_Unit', '1.500', '2021-10-15'),
(3, 'Drug', 'Amoxicillin', 'Some_Unit', '1.500', '2021-10-15'),
(4, 'Drug', 'Allergy Relief', 'Some_Unit', '1.500', '2021-10-15'),
(5, 'Drug', 'Losartan Potassium', 'Some_Unit', '1.500', '2021-10-15'),
(6, 'Drug', 'Omeprazole', 'Some_Unit', '1.500', '2021-10-15'),
(7, 'Drug', 'Hand Sanitizer', 'Some_Unit', '1.500', '2021-10-15'),
(8, 'Drug', 'Hydrochlorothiazide', 'Some_Unit', '1.500', '2021-10-15'),
(9, 'Drug', 'Fluoxetine', 'Some_Unit', '1.500', '2021-10-15'),
(10, 'Drug', 'Methocarbamol', 'Some_Unit', '1.500', '2021-10-15'),
(11, 'Drug', 'Ranitidine', 'Some_Unit', '1.500', '2021-10-15'),
(12, 'Drug', 'Metformin Hydrochloride', 'Some_Unit', '1.500', '2021-10-15'),
(13, 'Drug', 'Metoprolol Tartrate', 'Some_Unit', '1.500', '2021-10-15'),
(14, 'Drug', 'Metronidazole', 'Some_Unit', '1.500', '2021-10-15'),
(15, 'Drug', 'Cyclobenzaprine Hydrochloride', 'Some_Unit', '1.500', '2021-10-15'),
(16, 'Drug', 'Prednisone', 'Some_Unit', '1.500', '2021-10-15'),
(17, 'Drug', 'Potassium Chloride', 'Some_Unit', '1.500', '2021-10-15'),
(18, 'Drug', 'Atenolol', 'Some_Unit', '1.500', '2021-10-15'),
(19, 'Drug', 'Ondansetron', 'Some_Unit', '1.500', '2021-10-15'),
(20, 'Drug', 'Levetiracetam', 'Some_Unit', '1.500', '2021-10-15'),
(21, 'Drug', 'Acyclovir', 'Some_Unit', '1.500', '2021-10-15'),
(22, 'Drug', 'Doxycycline Hyclate', 'Some_Unit', '1.500', '2021-10-15'),
(23, 'Drug', 'Acetaminophen', 'Some_Unit', '1.500', '2021-10-15'),
(24, 'Drug', 'Furosemide', 'Some_Unit', '1.500', '2021-10-15'),
(25, 'Drug', 'Lorazepam', 'Some_Unit', '1.500', '2021-10-15'),
(26, 'Drug', 'Cephalexin', 'Some_Unit', '1.500', '2021-10-15'),
(27, 'Drug', 'Glipizide', 'Some_Unit', '1.500', '2021-10-15'),
(28, 'Drug', 'Levofloxacin', 'Some_Unit', '1.500', '2021-10-15'),
(29, 'Drug', 'Aspirin', 'Some_Unit', '1.500', '2021-10-15'),
(30, 'Drug', 'Ciprofloxacin', 'Some_Unit', '1.500', '2021-10-15'),
(31, 'Drug', 'Azithromycin', 'Some_Unit', '1.500', '2021-10-15'),
(32, 'Drug', 'Amoxicillin and Clavulanate Potassium', 'Some_Unit', '1.500', '2021-10-15'),
(33, 'Drug', 'Famotidine', 'Some_Unit', '1.500', '2021-10-15'),
(34, 'Drug', 'Bupropion Hydrochloride', 'Some_Unit', '1.500', '2021-10-15'),
(35, 'Drug', 'Atorvastatin Calcium', 'Some_Unit', '1.500', '2021-10-15'),
(36, 'Drug', 'Naproxen', 'Some_Unit', '1.500', '2021-10-15'),
(37, 'Drug', 'Naproxen Sodium', 'Some_Unit', '1.500', '2021-10-15'),
(38, 'Drug', 'Pantoprazole Sodium', 'Some_Unit', '1.500', '2021-10-15'),
(39, 'Drug', 'ATORVASTATIN CALCIUM', 'Some_Unit', '1.500', '2021-10-15'),
(40, 'Drug', 'Alprazolam', 'Some_Unit', '1.500', '2021-10-15'),
(41, 'Drug', 'Lisinopril', 'Some_Unit', '1.500', '2021-10-15'),
(42, 'Drug', 'Sulfamethoxazole and Trimethoprim', 'Some_Unit', '1.500', '2021-10-15'),
(43, 'Drug', 'Levothyroxine Sodium', 'Some_Unit', '1.500', '2021-10-15'),
(44, 'Drug', 'Lidocaine', 'Some_Unit', '1.500', '2021-10-15'),
(45, 'Drug', 'Clonazepam', 'Some_Unit', '1.500', '2021-10-15'),
(46, 'Drug', 'Carvedilol', 'Some_Unit', '1.500', '2021-10-15'),
(47, 'Drug', 'Diazepam', 'Some_Unit', '1.500', '2021-10-15'),
(48, 'Drug', 'Promethazine Hydrochloride', 'Some_Unit', '1.500', '2021-10-15'),
(49, 'Drug', 'Diclofenac Sodium', 'Some_Unit', '1.500', '2021-10-15'),
(50, 'Drug', 'Cetirizine Hydrochloride', 'Some_Unit', '1.500', '2021-10-15'),
(51, 'Drug', 'Hydrocortisone', 'Some_Unit', '1.500', '2021-10-15'),
(52, 'Drug', 'Topiramate', 'Some_Unit', '1.500', '2021-10-15'),
(53, 'Drug', 'Stool Softener', 'Some_Unit', '1.500', '2021-10-15'),
(54, 'Drug', 'Amlodipine Besylate', 'Some_Unit', '1.500', '2021-10-15'),
(55, 'Drug', 'Buspirone Hydrochloride', 'Some_Unit', '1.500', '2021-10-15'),
(56, 'Drug', 'Triamcinolone Acetonide', 'Some_Unit', '1.500', '2021-10-15'),
(57, 'Drug', 'Fenofibrate', 'Some_Unit', '1.500', '2021-10-15'),
(58, 'Drug', 'Propranolol Hydrochloride', 'Some_Unit', '1.500', '2021-10-15'),
(59, 'Drug', 'Hydrocodone Bitartrate and Acetaminophen', 'Some_Unit', '1.500', '2021-10-15'),
(60, 'Drug', 'Nitrogen', 'Some_Unit', '1.500', '2021-10-15'),
(61, 'Drug', 'Phentermine Hydrochloride', 'Some_Unit', '1.500', '2021-10-15'),
(62, 'Drug', 'Sertraline Hydrochloride', 'Some_Unit', '1.500', '2021-10-15'),
(63, 'Drug', 'Allopurinol', 'Some_Unit', '1.500', '2021-10-15'),
(64, 'Drug', 'OXYGEN', 'Some_Unit', '1.500', '2021-10-15'),
(65, 'Drug', 'Paroxetine', 'Some_Unit', '1.500', '2021-10-15'),
(66, 'Drug', 'Sildenafil', 'Some_Unit', '1.500', '2021-10-15'),
(67, 'Drug', 'Loratadine', 'Some_Unit', '1.500', '2021-10-15'),
(68, 'Drug', 'Mirtazapine', 'Some_Unit', '1.500', '2021-10-15'),
(69, 'Drug', 'Trazodone Hydrochloride', 'Some_Unit', '1.500', '2021-10-15'),
(70, 'Drug', 'Fluticasone Propionate', 'Some_Unit', '1.500', '2021-10-15'),
(71, 'Drug', 'Ketorolac Tromethamine', 'Some_Unit', '1.500', '2021-10-15'),
(72, 'Drug', 'Penicillin V Potassium', 'Some_Unit', '1.500', '2021-10-15'),
(73, 'Drug', 'Hydroxyzine Hydrochloride', 'Some_Unit', '1.500', '2021-10-15'),
(74, 'Drug', 'Olanzapine', 'Some_Unit', '1.500', '2021-10-15'),
(75, 'Drug', 'Divalproex Sodium', 'Some_Unit', '1.500', '2021-10-15'),
(76, 'Drug', 'Spironolactone', 'Some_Unit', '1.500', '2021-10-15'),
(77, 'Drug', 'GABAPENTIN', 'Some_Unit', '1.500', '2021-10-15'),
(78, 'Drug', 'Warfarin Sodium', 'Some_Unit', '1.500', '2021-10-15'),
(79, 'Drug', 'LISINOPRIL', 'Some_Unit', '1.500', '2021-10-15'),
(80, 'Drug', 'Nicotine', 'Some_Unit', '1.500', '2021-10-15'),
(81, 'Drug', 'Clobetasol Propionate', 'Some_Unit', '1.500', '2021-10-15'),
(82, 'Drug', 'Glimepiride', 'Some_Unit', '1.500', '2021-10-15'),
(83, 'Drug', 'Nifedipine', 'Some_Unit', '1.500', '2021-10-15'),
(84, 'Drug', 'Hydralazine Hydrochloride', 'Some_Unit', '1.500', '2021-10-15'),
(85, 'Drug', 'Indomethacin', 'Some_Unit', '1.500', '2021-10-15'),
(86, 'Drug', 'Nystatin', 'Some_Unit', '1.500', '2021-10-15'),
(87, 'Drug', 'Diltiazem Hydrochloride', 'Some_Unit', '1.500', '2021-10-15'),
(88, 'Drug', 'Etodolac', 'Some_Unit', '1.500', '2021-10-15'),
(89, 'Drug', 'Dicyclomine Hydrochloride', 'Some_Unit', '1.500', '2021-10-15'),
(90, 'Drug', 'Lamotrigine', 'Some_Unit', '1.500', '2021-10-15'),
(91, 'Drug', 'Losartan Potassium and Hydrochlorothiazide', 'Some_Unit', '1.500', '2021-10-15'),
(92, 'Drug', 'Lovastatin', 'Some_Unit', '1.500', '2021-10-15'),
(93, 'Drug', 'Finasteride', 'Some_Unit', '1.500', '2021-10-15'),
(94, 'Drug', 'benzonatate', 'Some_Unit', '1.500', '2021-10-15'),
(95, 'Drug', 'Aripiprazole', 'Some_Unit', '1.500', '2021-10-15'),
(96, 'Drug', 'Baclofen', 'Some_Unit', '1.500', '2021-10-15'),
(97, 'Drug', 'Cefdinir', 'Some_Unit', '1.500', '2021-10-15'),
(98, 'Drug', 'Fluconazole', 'Some_Unit', '1.500', '2021-10-15'),
(99, 'Drug', 'Fluocinonide', 'Some_Unit', '1.500', '2021-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `SELLS`
--

CREATE TABLE `SELLS` (
  `SELL_ID` int(11) NOT NULL,
  `DRUG_ID` int(11) NOT NULL,
  `QUANTITY` mediumint(9) NOT NULL,
  `TOTAL_PRICE` decimal(8,3) NOT NULL,
  `USER_ID` mediumint(8) UNSIGNED NOT NULL,
  `SELL_DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SELLS`
--

INSERT INTO `SELLS` (`SELL_ID`, `DRUG_ID`, `QUANTITY`, `TOTAL_PRICE`, `USER_ID`, `SELL_DATE`) VALUES
(14, 56, 2, '3.000', 2, '2020-02-11'),
(15, 14, 2, '3.000', 2, '2020-02-11'),
(16, 15, 10, '15.000', 2, '2020-02-11'),
(17, 36, 15, '22.500', 3, '2020-02-11'),
(18, 56, 2, '3.000', 3, '2020-02-11'),
(19, 14, 2, '3.000', 2, '2020-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `STOCK`
--

CREATE TABLE `STOCK` (
  `Stock_ID` int(11) NOT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `STOCK`
--

INSERT INTO `STOCK` (`Stock_ID`, `Quantity`) VALUES
(0, 360),
(1, 244),
(2, 205),
(3, 183),
(4, 142),
(5, 119),
(6, 118),
(7, 117),
(8, 115),
(9, 114),
(10, 112),
(11, 111),
(12, 108),
(13, 108),
(14, 94),
(15, 97),
(16, 107),
(17, 106),
(18, 105),
(19, 105),
(20, 103),
(21, 102),
(22, 102),
(23, 97),
(24, 101),
(25, 101),
(26, 98),
(27, 98),
(28, 98),
(29, 97),
(30, 97),
(31, 96),
(32, 88),
(33, 93),
(34, 92),
(35, 91),
(36, 76),
(37, 90),
(38, 90),
(39, 89),
(40, 87),
(41, 85),
(42, 83),
(43, 84),
(44, 84),
(45, 81),
(46, 79),
(47, 79),
(48, 79),
(49, 77),
(50, 76),
(51, 75),
(52, 70),
(53, 73),
(54, 72),
(55, 60),
(56, 58),
(57, 71),
(58, 66),
(59, 70),
(60, 70),
(61, 70),
(62, 70),
(63, 68),
(64, 68),
(65, 68),
(66, 68),
(67, 67),
(68, 67),
(69, 67),
(70, 65),
(71, 65),
(72, 65),
(73, 64),
(74, 64),
(75, 63),
(76, 63),
(77, 62),
(78, 55),
(79, 61),
(80, 61),
(81, 60),
(82, 60),
(83, 60),
(84, 58),
(85, 58),
(86, 58),
(87, 56),
(88, 56),
(89, 50),
(90, 55),
(91, 55),
(92, 55),
(93, 54),
(94, 54),
(95, 53),
(96, 53),
(97, 53),
(98, 53),
(99, 53),
(100, 51);

-- --------------------------------------------------------

--
-- Table structure for table `TO_BE_PAID`
--

CREATE TABLE `TO_BE_PAID` (
  `ID` int(11) NOT NULL,
  `Drug_ID` int(11) NOT NULL,
  `User_ID` mediumint(8) UNSIGNED NOT NULL,
  `Sell_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ACCOUNTS`
--
ALTER TABLE `ACCOUNTS`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Indexes for table `DRUGS`
--
ALTER TABLE `DRUGS`
  ADD PRIMARY KEY (`Drug_ID`);

--
-- Indexes for table `SELLS`
--
ALTER TABLE `SELLS`
  ADD PRIMARY KEY (`SELL_ID`),
  ADD KEY `SELLS_IBFK_2` (`USER_ID`),
  ADD KEY `SELLS_IBFK_3` (`DRUG_ID`);

--
-- Indexes for table `STOCK`
--
ALTER TABLE `STOCK`
  ADD PRIMARY KEY (`Stock_ID`);

--
-- Indexes for table `TO_BE_PAID`
--
ALTER TABLE `TO_BE_PAID`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Drug_ID` (`Drug_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `SELLS`
--
ALTER TABLE `SELLS`
  MODIFY `SELL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `TO_BE_PAID`
--
ALTER TABLE `TO_BE_PAID`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `SELLS`
--
ALTER TABLE `SELLS`
  ADD CONSTRAINT `SELLS_IBFK_2` FOREIGN KEY (`USER_ID`) REFERENCES `ACCOUNTS` (`USER_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `SELLS_IBFK_3` FOREIGN KEY (`DRUG_ID`) REFERENCES `DRUGS` (`Drug_ID`) ON DELETE CASCADE;

--
-- Constraints for table `TO_BE_PAID`
--
ALTER TABLE `TO_BE_PAID`
  ADD CONSTRAINT `TO_BE_PAID_ibfk_1` FOREIGN KEY (`Drug_ID`) REFERENCES `DRUGS` (`Drug_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `TO_BE_PAID_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `ACCOUNTS` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
