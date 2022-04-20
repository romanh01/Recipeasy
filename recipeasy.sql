-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2022 at 05:19 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipeasy`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `recipe_id` int(64) NOT NULL,
  `recipe_name` varchar(32) NOT NULL,
  `recipe_desc` varchar(512) NOT NULL,
  `recipe_steps` varchar(512) NOT NULL,
  `recipe_rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`recipe_id`, `recipe_name`, `recipe_desc`, `recipe_steps`, `recipe_rating`) VALUES
(2, 'Fried Egg', 'A fried egg is an egg which has been cracked and fried in a pan', 'Heat the Oil in a frying pan, gently break the egg in half and cook it for about 5 min, Sprinkle the egg with cooking oil and salt and place the fried on a plate, serve immediately', 75),
(3, 'Banana Bread', 'Type of bread made from mashed bananas. Often a moist, sweet, cake-like quick bread', 'Heat the oven to 180C fan, butter a 2lb loaf tin and line the base and sides with baking parchment, Cream 140g softened butter and 140g caster sugar until light and fluffy - then slowly add 2 beaten large eggs with 140g of flour, Fold the remaining flour - 1 tps baking powder and 2 mashed bananas, Por the mixture into the prepared tin and bake for 70 min, Cool in tin for 10 min - then remove wire rack, Mix 50g icing sugar with 2-3 tsp water to make a runny icing, Drizzle the icing across the top of the cake', 80),
(8, 'basmati rice', 'itsss rice', 'boil it and eat it ', 75);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(32) NOT NULL,
  `user_email` varchar(32) NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `user_pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_name`, `user_pass`) VALUES
(10, 'roman@gmail.com', 'roman', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`recipe_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recipe_id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
