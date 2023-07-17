-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2023 at 11:19 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helmesdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

CREATE TABLE `sectors` (
  `sector_id` int(11) NOT NULL,
  `sector_name` varchar(100) NOT NULL,
  `parent_sector_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sectors`
--

INSERT INTO `sectors` (`sector_id`, `sector_name`, `parent_sector_id`) VALUES
(1, 'Manufacturing', NULL),
(2, 'Service', NULL),
(3, 'Other', NULL),
(5, 'Printing', 1),
(6, 'Food and Beverage', 1),
(7, 'Textile and Clothing', 1),
(8, 'Wood', 1),
(9, 'Plastic and Rubber', 1),
(11, 'Metalworking', 1),
(12, 'Machinery', 1),
(13, 'Furniture', 1),
(18, 'Electronics and Optics', 1),
(19, 'Construction materials', 1),
(21, 'Transport and Logistics', 2),
(22, 'Tourism', 2),
(25, 'Business services', 2),
(28, 'Information Technology and Telecommunications', 2),
(29, 'Energy technology', 3),
(33, 'Environment', 3),
(35, 'Engineering', 2),
(37, 'Creative industries', 3),
(39, 'Milk &amp; dairy products', 6),
(40, 'Meat &amp; meat products', 6),
(42, 'Fish &amp; fish products', 6),
(43, 'Beverages', 6),
(44, 'Clothing', 7),
(45, 'Textile', 7),
(47, 'Wooden houses', 8),
(51, 'Wooden building materials', 8),
(53, 'Plastics welding and processing', 559),
(54, 'Packaging', 9),
(55, 'Blowing', 559),
(57, 'Moulding', 559),
(62, 'Forgings, Fasteners', 542),
(66, 'MIG, TIG, Aluminum welding', 542),
(67, 'Construction of metal structures', 11),
(69, 'Gas, Plasma, Laser cutting', 542),
(75, 'CNC-machining', 542),
(91, 'Machinery equipment/tools', 12),
(93, 'Metal structures', 12),
(94, 'Machinery components', 12),
(97, 'Maritime', 12),
(98, 'Kitchen', 13),
(99, 'Project furniture', 13),
(101, 'Living room', 13),
(111, 'Air', 21),
(112, 'Road', 21),
(113, 'Water', 21),
(114, 'Rail', 21),
(121, 'Software, Hardware', 28),
(122, 'Telecommunications', 28),
(141, 'Translation services', 2),
(145, 'Labelling and packaging printing', 5),
(148, 'Advertising', 5),
(150, 'Book/Periodicals printing', 5),
(224, 'Manufacture of machinery', 12),
(227, 'Repair and maintenance service', 12),
(230, 'Ship repair and conversion', 97),
(263, 'Houses and buildings', 11),
(267, 'Metal products', 11),
(269, 'Boat/Yacht building', 97),
(271, 'Aluminium and steel workboats', 97),
(337, 'Other (Wood)', 8),
(341, 'Outdoor', 13),
(342, 'Bakery &amp; confectionery products', 6),
(378, 'Sweets &amp; snack food', 6),
(385, 'Bedroom', 13),
(389, 'Bathroom/sauna', 13),
(390, 'Children’s room', 13),
(392, 'Office', 13),
(394, 'Other (Furniture)', 13),
(437, 'Other', 6),
(508, 'Other', 12),
(542, 'Metal works', 11),
(556, 'Plastic goods', 9),
(559, 'Plastic processing technology', 9),
(560, 'Plastic profiles', 9),
(576, 'Programming, Consultancy', 28),
(581, 'Data processing, Web portals, E-marketing', 28);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `agrees_to_terms` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `agrees_to_terms`) VALUES
(1, 'Peeter Urmas', 1),
(2, 'Matti Nykänen', 1),
(3, 'Kert Kalad', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_sectors`
--

CREATE TABLE `user_sectors` (
  `user_id` int(11) NOT NULL,
  `sector_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_sectors`
--

INSERT INTO `user_sectors` (`user_id`, `sector_id`) VALUES
(1, 2),
(1, 51),
(1, 91),
(1, 111),
(1, 145),
(1, 581),
(2, 37),
(2, 91),
(2, 101),
(2, 111),
(2, 581),
(3, 2),
(3, 3),
(3, 21),
(3, 25),
(3, 35),
(3, 581);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`sector_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_sectors`
--
ALTER TABLE `user_sectors`
  ADD PRIMARY KEY (`user_id`,`sector_id`),
  ADD KEY `sector_id` (`sector_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sectors`
--
ALTER TABLE `sectors`
  MODIFY `sector_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=582;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_sectors`
--
ALTER TABLE `user_sectors`
  ADD CONSTRAINT `user_sectors_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_sectors_ibfk_2` FOREIGN KEY (`sector_id`) REFERENCES `sectors` (`sector_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
