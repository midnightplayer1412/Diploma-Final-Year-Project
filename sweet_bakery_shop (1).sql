-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 08:26 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sweet_bakery_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_email`, `admin_password`) VALUES
(1, 'Admin1', 'admin1@gmail.com', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(255) NOT NULL,
  `customer_fname` varchar(255) NOT NULL,
  `customer_lname` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL DEFAULT '',
  `customer_city` varchar(255) NOT NULL DEFAULT '',
  `customer_state` varchar(255) NOT NULL DEFAULT '',
  `customer_postcode` char(10) NOT NULL DEFAULT '',
  `customer_email` varchar(50) NOT NULL,
  `customer_contact_no` varchar(14) NOT NULL,
  `customer_password` char(20) NOT NULL,
  `customer_status` varchar(255) DEFAULT NULL,
  `customer_profile_image` varchar(255) NOT NULL DEFAULT 'http://ssl.gstatic.com/accounts/ui/avatar_2x.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL DEFAULT 1,
  `delivery_address` varchar(255) NOT NULL,
  `delivery_city` varchar(255) NOT NULL,
  `delivery_state` varchar(255) NOT NULL,
  `delivery_postcode` char(10) NOT NULL,
  `customer_contact_no` varchar(14) NOT NULL,
  `delivery_date` date NOT NULL,
  `delivery_time` time NOT NULL,
  `remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `employee_fname` varchar(255) NOT NULL,
  `employee_lname` varchar(255) NOT NULL,
  `employee_address` varchar(255) NOT NULL,
  `employee_city` varchar(255) NOT NULL DEFAULT '',
  `employee_state` varchar(255) NOT NULL DEFAULT '',
  `employee_postcode` varchar(255) NOT NULL DEFAULT '',
  `employee_email` varchar(50) NOT NULL,
  `employee_contact_no` char(14) NOT NULL,
  `employee_password` char(20) NOT NULL,
  `employee_position_title` char(50) DEFAULT 'STAFF',
  `employee_salary` decimal(10,2) NOT NULL DEFAULT 1200.00,
  `employee_status` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_fname`, `employee_lname`, `employee_address`, `employee_city`, `employee_state`, `employee_postcode`, `employee_email`, `employee_contact_no`, `employee_password`, `employee_position_title`, `employee_salary`, `employee_status`) VALUES
(1, 'Tester', 'Default Employee', 'Default Address', 'Default City', 'Default State', 'Default Postcode', 'employeedefault@gmail.com', '011-0000 0000', 'employee1', 'DELIVERY MAN', '1200.00', 'ACTIVE'),
(5, 'bin Che Kamaruddin Takiudin', 'Muhammed Hj Nuwair', 'Lot 6, Jln 8/35G, Kuala Besut,  Darul Iman', ' Bandar Jasa', 'Terengganu', '24000', 'syid.redzuan@gmail.com', '+6012-700 0523', 'e4c09873', 'DELIVERY MAN', '1200.00', 'ACTIVE'),
(6, 'G.', 'Zabrina', '2-4, Jalan Dewan Bahasa 1L, Seri Amanjaya,', 'Air Itam', 'Penang', '10442', 'fernandez.syazryana@hotmail.com', '+6088-03 1707', 'f73a5dd3', 'STAFF', '1200.00', 'ACTIVE'),
(7, 'Lian Huo', 'Mok', '6, Jalan Perdana 8, SS85, Banting', 'Darul Ehsan', 'Selangor', '45926', 'rozi.nicole@gmail.com', '+604-237 1099', '0ea53e86', 'DELIVERY MAN', '1200.00', 'ACTIVE'),
(8, 'bin Khirulrezal', 'Mohammed Hj Muhaimi', '42, Jln Masjid, Seksyen 69O', 'Setiawangsa', 'WP Kuala Lumpur', '50265', 'mavin.yow@looi.biz', '+6011-1595 364', 'c2e5e8e0', 'STAFF', '1200.00', 'ACTIVE'),
(9, 'binti Syed Adnan', 'Sabrina', '67, Jln Mohana Chandran 7, Taman Flora', 'Malacca', 'Pekan Asahan', '77849', 'svelappan@ratnam.com', '+6015-541 0201', 'ed5a1b3c', 'MANAGER', '1200.00', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_total` int(11) NOT NULL DEFAULT 0,
  `total_price` decimal(10,2) NOT NULL,
  `order_status` varchar(50) NOT NULL DEFAULT 'PENDING',
  `delivery_date` date NOT NULL,
  `notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_method` char(50) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_description` varchar(255) DEFAULT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_status` char(255) NOT NULL DEFAULT 'AVAILABLE',
  `product_image` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `product_price`, `product_category_id`, `product_status`, `product_image`) VALUES
(10, 'Basque Burnt Cheesecake', 'The ultimate cheesecake with extra creamy interior and caramelized exterior for a bittersweet note', '13.50', 1, 'AVAILABLE', 'assets/img/product/burnt cheesecake.jpg'),
(11, 'Red Velvet', 'The most incredible soft and buttery cake with a velvety texture and perfect balance of cream cheese frosting', '13.00', 1, 'AVAILABLE', 'assets/img/product/Redvelvet.jpg'),
(12, 'Strawberry Shortcake', 'Moist vanilla cake layers filled with stabilized whipped cream and fresh strawberries', '13.00', 1, 'AVAILABLE', 'assets/img/product/strawberry shortcake.jpg'),
(13, 'Classic Chocolate Cake', 'It’s a classic for a reason. The two-layer fluffy cake with creamy Belgian coverture chocolate', '13.00', 1, 'AVAILABLE', 'assets/img/product/classic choco cake.jpg'),
(14, 'Swirl Red Bean', 'Fluffy homemade swirl bread dough filled with sweet red bean paste', '2.50', 2, 'AVAILABLE', 'assets/img/product/Swirl red bean.jpg'),
(15, 'Jalapeno Cheese Bagel', 'Delicious bagels topped with full of cheddar and jalapeno pepper for an extra kick', '8.00', 2, 'AVAILABLE', 'assets/img/product/Jalapeno cheese bagels.jpg'),
(16, 'Coffee Bun', 'A Mexican bun with coffee topping and heavenly butter filling that gives way to soft bread underneath', '1.50', 2, 'AVAILABLE', 'assets/img/product/Coffeebun.jpg'),
(17, 'Sausage Roll', 'Light and soft bread stuffed with sausage meat. Perfect snack for the day!', '2.00', 2, 'AVAILABLE', 'assets/img/product/sausagerolls.jpg'),
(18, 'Potato Honey Bun', 'Super great texture and squishy golden-brown potato bun that is definitely one of the kid’s favourites!', '6.00', 2, 'AVAILABLE', 'assets/img/product/Potato honeybun.jpg'),
(19, 'Chocolate Chip Cookies', 'The ultra thick and chewy chocolate chip cookies are made with melted butter', '3.00', 3, 'AVAILABLE', 'assets/img/product/Choc chip cookies.jpg'),
(20, 'Double Chocolate Chunk With Nuts', 'A double dose of fudgy cookies loaded with chocolate chunk, macadamia nuts and sprinkles of salt', '3.00', 3, 'AVAILABLE', 'assets/img/product/Double choco.jpg'),
(21, 'Oatmeal Raisin cookies', 'Crispy around the edges, packed with wholesome \r\noat flavour and a perfect amount of raisins', '3.00', 3, 'AVAILABLE', 'assets/img/product/Oatmeal raisin cookies.jpg'),
(23, 'New Test Product', 'Test', '1.00', 1, 'AVAILABLE', 'assets/img/product/2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `product_category_id` int(11) NOT NULL,
  `product_category_name` char(50) NOT NULL,
  `product_category_image` varchar(255) NOT NULL,
  `product_category_status` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`product_category_id`, `product_category_name`, `product_category_image`, `product_category_status`) VALUES
(1, 'Cake', 'assets/img/category/cake-front.jpg', 'AVAILABLE'),
(2, 'Bread', 'assets/img/category/bread-front.jpg', 'AVAILABLE'),
(3, 'Cookie', 'assets/img/category/cookie-front.jpg', 'AVAILABLE'),
(4, 'Dessert', 'assets/img/2.jpg', 'NOT AVAILABLE'),
(7, 'Donut', 'assets/img/category/cake-front.jpg', 'NOT AVAILABLE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_category_id` (`product_category_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `delivery_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `delivery_ibfk_3` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`product_category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
