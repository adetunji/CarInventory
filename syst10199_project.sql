-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 07, 2014 at 09:15 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `syst10199_project`
--
CREATE DATABASE IF NOT EXISTS `syst10199_project` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `syst10199_project`;

-- --------------------------------------------------------

--
-- Table structure for table `car_inventory`
--

CREATE TABLE IF NOT EXISTS `car_inventory` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `make` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `year` int(4) NOT NULL,
  `is_new` tinyint(4) NOT NULL,
  `price` double NOT NULL,
  `mileage` int(11) NOT NULL,
  `drive_type` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `comments` text,
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `car_inventory`
--

INSERT INTO `car_inventory` (`make`, `model`, `year`, `is_new`, `price`, `mileage`, `drive_type`, `color`, `comments`) VALUES
('Honda', 'Accord', 2010, 1, 10000.99, 15, 'All Wheel Drive', 'Yellow', 'It is shiny'),
('Chevy', 'Volt', 2010, 1, 13000.99, 2000, 'Front Wheel Drive', 'Green', 'The car is in good shape'),
('BMW', '328i', 2010, 1, 39000, 0, 'All-Wheel Drive', 'Blue', 'The car is in good shape'),
('Nissan', 'Sentra', 2010, 1, 19000, 15000, 'Front Wheel Drive', 'White', 'The car is in good shape'),
('Kia', 'Rondo', 2010, 1, 14000.55, 17500, 'Front Wheel Drive', 'Black', 'RONDOOOO'),
('Mazda', 'CX5', 2010, 1, 14000.55, 30000, 'All-Wheel Drive', 'Red', 'The car is in good shape'),
('Hyundai', 'Elantra', 2010, 1, 14000.55, 0, 'Front Wheel Drive', 'Green', 'The car is in good shape'),
('Ford', 'Focus', 2010, 1, 14000.55, 20000, 'Front Wheel Drive', 'Blue', 'The car is in good shape'),
('Toyota', 'Prius', 2010, 0, 15000.95, 5000, 'Front Wheel Drive', 'Black', 'It''s as good as new.'),
('Nissan', 'Skyline R34', 2014, 1, 40000, 0, 'All-Wheel Drive', 'Red', 'Testing');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
