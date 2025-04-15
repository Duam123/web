-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2024 at 12:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perfume_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `product_price` int(10) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_qty` int(11) DEFAULT 1,
  `total_price` varchar(100) DEFAULT NULL,
  `pcate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `pmode` varchar(50) NOT NULL,
  `products` text NOT NULL,
  `amount_paid` varchar(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `pmode`, `products`, `amount_paid`, `order_date`) VALUES
(1, 'Muzaffar Hussain', 'muzaffarhussain0055@gmail.com', '03408584075', 'Room No 56, Sachal Hostel, Mehran University Of Engineering And Technology Jamshore, Sindh', 'cod', 'YS(1), HIGH DESERT(5), ELYSIUM(1)', '38850', '2024-11-02 22:44:57'),
(2, 'Nazeer Abbas', 'nazeer391@gmail.com', '03109434858', 'Sachal Hostel , Room No 72, Mehran University Jamshoro, Sindh', 'cod', 'YS(1)', '9000', '2024-11-02 22:46:16'),
(3, 'Muzaffar ', 'muzaffarhuss@gmail.com', '03121844075', 'Room No 56, Sachal Hostel, Mehran University Of Engineering And Technology Jamshore, Sindh', 'cod', 'HIGH DESERT(1), ELYSIUM(1)', '12650', '2024-11-02 22:51:34'),
(5, 'Nazeer Abbas', 'nazee@gmail.com', '03109434858', 'Sachal Hostel , Room No 56, Mehran University Jamshoro, Sindh', 'cod', 'YS(1), HIGH DESERT(1)', '13300', '2024-11-02 23:11:14'),
(6, 'Muzaffar Hussain', 'muzaffarhussain0055@gmail.com', '03121844075', 'Room No 56, Sachal Hostel , Mehran University Jamshoro, Sindh', 'cod', 'YS(1), HIGH DESERT(3)', '21900', '2024-11-02 23:36:36'),
(7, 'Abbas', 'naz@gmail.com', '03109434858', 'Sachal Hostel , Room No 56, Mehran University Jamshoro, Sindh', 'cod', 'HIGH DESERT - men (Qty: 1), ELYSIUM - men (Qty: 1)', '12650', '2024-11-02 23:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `description`, `price`, `cover_image`, `category`) VALUES
(1, 'YS', 'YS is a chypre fruity fragrance for men. The top notes of this perfume are Bergamot, Pineapple, Apple and Black Currant, while the middle notes are Patchouli, Moroccan Jasmine, Birch and Rose.', 9000.00, 'images/men-perfume1.jpg', 'men'),
(2, 'TOMFORD', 'TOMFORD a richer rendition of the original Catch 22, retains fruity top notes like bergamot, pineapple, apple, and black currant while intensifying the smoky middle notes of patchouli, Moroccan jasmine, birch, and rose.', 5500.00, 'images/men-perume2.jpeg', 'men'),
(3, 'HIGH DESERT', 'Created especially for classy men, Soch showcases a blend of zesty, citrusy, and warm fragrances with a touch of spice. Inspired by the Baloch spirit, the fragrance creates a barrier of irresistible aroma around the wearer.', 4300.00, 'images/men-perfume5.jpeg', 'men'),
(4, 'ELYSIUM', 'ELYSIUM has accords of citrus, sweet, coconut, and vanilla, creating a well-composed fragrance.', 8350.00, 'images/men-perfume4.JPEG', 'men');

INSERT INTO `product` (`product_id`, `product_name`, `description`, `price`, `cover_image`, `category`) VALUES
(5, 'SEXOTIC', 'Sexotic is an unisex parfum from the Aromatic Aquatic olfactory family, created by perfumer Alessandro Gualtieri in 2019.', 9999.00, 'images/unisex 1.jpg', 'unisex'),
(6, 'ELYSIUM', 'Elysium is a luxurious fusion fragrance that masterfully blends opulence with decadence. It opens with the rich warmth of saffron and the velvety allure of rose, leading into a heart of exotic oud and dark, gourmet chocolate.', 4599.00, 'images/unisex 2.jpeg', 'unisex'),
(7, 'CK ONE', 'CK One for unisex is a fresh, floral, oriental fragrance. It includes notes of white musk, water lily, and magnolia, creating a unique floral aroma. Recommended for evening wear.', 6999.00, 'images/unisex 3.jpg', 'unisex'),
(8, 'OUD AYAAN', 'Oud Ayaan is a fragrance that masterfully blends opulence with decadence. This unique scent opens with the rich warmth of saffron and the velvety allure of rose, leading into a heart of exotic oud and dark, gourmet chocolate.', 7199.00, 'images/unisex 4.jpg', 'unisex'),
(9, 'YOU & I', 'You & I is composed of well-balanced accords including citrus, sweet, coconut, and vanilla.', 4899.00, 'images/unisex 5.jpg', 'unisex');

INSERT INTO `product` (`product_id`, `product_name`, `description`, `price`, `cover_image`, `category`) VALUES
(11, 'ROSE GOLDEA BLOSSOM DELIGHT', 'Rose Goldea Blossom Delight for women, emitting warm, elegant, confident, and charming scents. Its sweet and woody fragrance leaves a deep impression. Ingredients.', 2600.00, 'images/women 1.JPEG', 'women'),
(12, 'L’ INTERDIT GIVENCHY', 'L’ Interdit Givenchy is a modish masterpiece of floral notes. It gives a delicate feminine gaze yet leaves a subtle and exquisite scented trail. Radiates gentle freshness with its pink juice.', 10000.00, 'images/women 2.JPEG', 'women'),
(13, 'CHANCE CHANEL', 'Chance Chanel Pour Femme reflects the persona and charisma of a woman who is determined and self-reliant. The baby pink juice exudes delicacy with the freshness of lemon, bergamot, green apple, and patchouli notes.', 5600.00, 'images/women 3.JPEG', 'women'),
(14, 'PURE POISON', 'Pure Poison is a modish masterpiece of floral notes. It gives a delicate feminine gaze and leaves a subtle and exquisite scented trail. Radiates gentle freshness with its pink juice.', 4999.00, 'images/women 4.JPEG', 'women'),
(15, 'ELIE SAAB', 'Elie Saab is a modish masterpiece of floral notes. It gives a delicate feminine gaze and leaves a subtle and exquisite scented trail. Radiates gentle freshness with its pink juice.', 2899.00, 'images/women 5.JPEG', 'women');

-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
