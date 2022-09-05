-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2022 at 09:25 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furnish`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(30) NOT NULL,
  `a_password` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_password`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `quantity` int(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Living Room Furniture'),
(2, 'Dining & Kitchen Furniture'),
(3, 'Bedroom Furniture'),
(4, 'Study & Office Furniture');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contactus_id` int(11) NOT NULL,
  `cnt_name` varchar(30) NOT NULL,
  `email` varchar(125) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contactus_id`, `cnt_name`, `email`, `subject`, `message`) VALUES
(1, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `uname`, `email`, `password`, `contact`, `address`, `city`, `date`) VALUES
(1, 'Dipesh', 'umraniyadipeshk@gmail.com', '202cb962ac59075b964b07152d234b70', '9979882672', 'Bhuj\r\nSukhpar nava vas main road', 'Bhuj', '2022-03-14 11:23:37'),
(2, 'abc', 'abc@gmail.com', '202cb962ac59075b964b07152d234b70', '9898989899', '	Netaji rd', 'Ahemdabad', '2022-03-15 04:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `order_details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `transaction_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`order_details_id`, `order_id`, `cust_id`, `p_id`, `price`, `quantity`, `date`, `transaction_id`) VALUES
(1, 0, 1, 5, 59900, 1, '2022-03-14 13:03:28', '6bd99cf032a446b192b1473e74ebba81'),
(3, 0, 2, 1, 16999, 1, '2022-03-15 05:10:12', '1674f38432634e8e938d41d5f6d1c67a');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `scategory_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `p_name` varchar(60) NOT NULL,
  `short_name` varchar(30) NOT NULL,
  `p_price` float NOT NULL,
  `p_quantity` int(11) NOT NULL,
  `p_image` varchar(1024) NOT NULL,
  `p_colour` varchar(50) NOT NULL,
  `p_description` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `category_id`, `scategory_id`, `supplier_id`, `p_name`, `short_name`, `p_price`, `p_quantity`, `p_image`, `p_colour`, `p_description`, `date`) VALUES
(1, 0, 1, 0, 'Elle Velvet Three Seater Sofa', 'Sofa', 16999, 10, 'sofa3.jpg1647258632.jpg', ' Mint', 'Elastic Seat Belt Webbing + Nozag Spring with High Density Foam for enhanced seating comfort 20-28 Kg/m3 density foam for superior seating experience', '2022-03-15 05:43:53'),
(3, 0, 1, 0, 'Paula Fabric Three Seater Sofa', 'Sofa', 26667, 10, 'sofa2.jpg1647259037.jpg', ' Dark Brown', 'The rounded Bulllnose seat cushion is ergonomically designed to provide support to legs while sitting', '2022-03-15 05:44:01'),
(4, 0, 2, 0, 'Garcia Plus Fabric Small Left Hand Side Lounger', 'Lounger Sofa', 56995, 10, 'lounges1.png1647259363.png', 'Grey', 'Frame construction in seasoned & treated Pine Wood for durability & product longevity 50-76.2MM Elastic Seat Belt webbing used along with 20-28 Kg/M3 Foam for a comfortable seating experience', '2022-03-15 05:46:49'),
(5, 0, 2, 0, 'Marigold Fabric Small Left Hand Lounger', 'Sofa Fabric Lounger', 59900, 10, 'lounges2.png1647259678.png', 'Brown', '200 GSM Wonderfill + 15 Dinier (Recron + Foam) used for a softer seating experience', '2022-03-15 05:49:22'),
(7, 0, 3, 0, 'Dewsbury Solid Wood Chair Set of 2', 'chair', 41300, 10, 'dinningchair2.png1647260217.png', 'Beige', 'Frame construction is seasoned and treated with solid wood in a characteristic Walnut finish. Chair frame is made in box seat construction with suede upholstered seat.', '2022-03-15 05:44:31'),
(8, 0, 7, 0, 'Aurora Engineered Wood 3 door wardrobe', 'Cupboard', 59929, 5, 'cupboard1.png1647260491.png', 'Walnut', '3 door wardrobe comes with lockable doors, 2 hanger rods, Shelfs, 2 internal drawer & Locker. Compartmentalized drawer for jewellery.', '2022-03-15 05:50:40'),
(9, 0, 6, 0, 'Aurora Engineered Wood Queen bed', 'Bed', 53000, 10, 'bed1.png1647260678.png', 'Walnut', 'Geometric pattern on headboard for aesthetic look. Compartmentalized storing option with hydraulic lift & front Drawer for easy usage.', '2022-03-15 05:47:41');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `slider_title` varchar(30) NOT NULL,
  `slider_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slider_title`, `slider_image`) VALUES
(5, 'Latest Furniture', 'front-dining.jpg1646980520.jpg'),
(6, 'Latest Bed Furniture', 'Casa-Bed.jpg1646980851.jpg'),
(7, 'Latest Sofa Furniture', 'front-william.jpg1646980900.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `scategory_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `scategory_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`scategory_id`, `category_id`, `scategory_name`) VALUES
(1, 1, 'Sofas'),
(2, 1, 'Loungers'),
(3, 2, 'Dinning Chairs'),
(4, 2, 'Dinning Tables'),
(5, 2, 'Dinning Benches'),
(6, 3, 'Beds'),
(7, 3, 'Wardrobes'),
(8, 3, 'Dressing Tables'),
(9, 4, 'Study Tables'),
(10, 4, 'Office Storage'),
(11, 4, 'Study Chiars'),
(12, 4, 'Office Chairs');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `sup_name` varchar(60) NOT NULL,
  `sup_email` varchar(60) NOT NULL,
  `sup_contact` varchar(20) NOT NULL,
  `sup_address` varchar(255) NOT NULL,
  `sup_city` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `sup_name`, `sup_email`, `sup_contact`, `sup_address`, `sup_city`) VALUES
(1, 'Jagdish Bhai', 'jagdish09@gmail.com', '9988776655', 'GT Road ,near hanuman dairy', 'Mandvi');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `txn_id` varchar(100) NOT NULL,
  `payment_id` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `amount` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `cust_id`, `txn_id`, `payment_id`, `status`, `amount`, `date`) VALUES
(1, 1, 'MOJO2314B05A29329166', '6bd99cf032a446b192b1473e74ebba81', 'Credit', 59900, '2022-03-14 13:03:28'),
(3, 2, 'MOJO2315105A71679153', '1674f38432634e8e938d41d5f6d1c67a', 'Credit', 16999, '2022-03-15 05:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contactus_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `scategory_id` (`scategory_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`scategory_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `wishlist_ibfk_1` (`cust_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contactus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `scategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`scategory_id`) REFERENCES `sub_category` (`scategory_id`);

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
