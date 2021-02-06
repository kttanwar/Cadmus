-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 09:43 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cadmus_personal`
--
CREATE DATABASE IF NOT EXISTS `cadmus_personal` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cadmus_personal`;
-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `post_id` int(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `comment` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `username`, `comment`) VALUES
(1, 2, 1, 'Radhika Nigam', 'Insightful Blog'),
(2, 1, 1, 'Konark Tanwar', 'VERY GOOD POST'),
(3, 1, 1, 'Konark Tanwar', 'VERY INFORMATIVE'),
(4, 1, 1, 'Konark Tanwar', 'Good Post');

-- --------------------------------------------------------

--
-- Table structure for table `dislikes`
--

CREATE TABLE `dislikes` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `post_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dislikes`
--

INSERT INTO `dislikes` (`id`, `user_id`, `post_id`) VALUES
(1, 2, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `post_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 1),
(4, 1, 2),
(5, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `blog` varchar(5000) NOT NULL,
  `category` varchar(100) NOT NULL,
  `featuredimage` varchar(300) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `blog`, `category`, `featuredimage`, `user_id`) VALUES
(1, 'Paytm: How Does a Startup earn money', 'Paytm or “Payment Through Mobile” is India’s largest payment, commerce, and e-wallet enterprise. It started in 2010 and is a brand of the parent company One97 Communications.com founded by Vijay Shekhar Sharma. It was launched as an online mobile recharge website and went on to transform its business model to a virtual and marketplace bank model. The company stands today as one of India’s largest online mobile service that includes banking services, marketplace, mobile payments, bill payments, and recharge. It has so far provided services to over 100 million users. Its diversification has garnered significant notoriety and become exemplary for many in the online payment industry. One of its more noteworthy achievements is in its collaboration with the Chinese e-commerce giant Alibaba who provided them with huge amounts of funding. Apart from being a pioneer of the cashback\r\nbusiness model, the company has been praised for its initiation as a startup company to a large corporation in a short span of time.\r\nThe Paytm Revenue Models come in two forms.\r\nPaytm makes commissions from the customer transactions through their usage of its platform. Escrow Accounts from where it generates its revenue. Owing to the absence of its underlying capital, it offers customers no interest. As of 2018, Paytm has accumulated 3,314.8 crore INR in revenue. Paytm Wallet is one of Paytm’s most effective services that form a link between the bank and the retailers. This semi-closed wallet enables you to pay your bills, pay for your tickets or pay anybody for that matter. Paytm wallet apart from its earnings, as authorized by the RBI, has the benefit of receiving interest in a consumer store, just like any other Payment Gateways. When you store a certain amount of money in your Paytm wallet, it will then save that money in another bank from which it will earn interest at some point. It is the Paytm wallet’s main function.\r\nFor example, imagine if you make a payment of 1000 rupees to a seller and the seller makes 10 transactions to gain 10,000 rupees. If the payment of that amount is made through the Paytm wallet, the Paytm wallet will take a share of about 1% from the total amount so technically; the seller will receive about 9715 rupees.\r\nSince its inception in 2010, Paytm’s initial purpose was to provide online mobile recharging services. Its function to generate revenue was always simplistic. Paytm ‘s service standards are as exemplary and efficient as those of other telecom service providers ranging from Vodafone to Telecom. The services are without faults and provide comfort to their customers. Currently, Paytm gains a commission of 2-3% per recharge. It is because Paytm, owing to its\r\nencouragement to its customer to continue recharging through their platform, has stronger power in bargaining than other vendors. That’s why the commission that it acquires is that high. This commission from its recharge service serves as its revenue.', 'Technology', 'http://localhost/cadmus_personal/assets/featuredimages/paytm.png', 1),
(2, 'Swiggy:The Food Delivery Goto for India', 'For all the foodies, what more could you ask for than having your favorite food from your favorite restaurant, delivered within 30 minutes, anywhere you are! And in this fast-paced world, who would even prefer to go out to a restaurant, wait in the traffic, and then wait some more at the restaurant before the food is served? A squad of 3 friends, Nandan Reddy, Rahul Jaimini, and Sriharsha Majety, perhaps knew these issues faced by every food-lover all too well. So, what did they do? They came up with their amazing all-new Swiggy app! An on-demand food ordering and delivery platform where you can order your favorite food from your favorite restaurant(s), and get it delivered within 30 minutes – all with just a tap! You can also track your order to know how long it will take to get delivered. These three entrepreneurs spotted a huge gap in the online food ordering and delivery industry of India. The next thing they did was to embrace the opportunity with open arms, and they filled the gap by launching Swiggy. The business model canvas of Swiggy is based on a hyperlocal on-demand food delivery business operation. Working as a bridge between restaurants and customers, Swiggy utilizes an innovative technology platform that works as a single point of contact. To get a definitive answer, we need to analyze Swiggy’s Revenue Model. As it’s expanding its business strategy and operations day by day, the revenue streams of Swiggy are also considerably increasing. There are mainly 6 revenue streams at present through which Swiggy makes money:\r\n1. Delivery charges\r\nThe first type of revenue stream Swiggy obtained is from its customers. A nominal delivery fee of Rs. 20 to Rs. 40 is charged from customers on orders below a threshold value of Rs. 250. Swiggy raises the charges during high order demands or unusual weather conditions.\r\n\r\n2. Commissions\r\nSwiggy acquires another major part of the revenue stream from commissions. It collects commissions from restaurants to generate sales leads and to deliver their food items through Swiggy’s fleet. Restaurants have to pay 15% to 25% on every order placed from Swiggy’s website.\r\n\r\n3. Advertising\r\nSwiggy earns advertising revenue in the following ways: Banner Promotions – Swiggy promotes and displays ads of various restaurants on its app. Restaurants, related to different regions, receive greater visibility via banner promotion and pay price for the displayed page.\r\nPriority listing of restaurants – Swiggy charges restaurants premium rates to give them priority in the list of available restaurants. A restaurant has to pay high if it wants to be displayed higher on the list.   \r\n4. Swiggy Access\r\nAn entirely new idea based on the cloud kitchen concept, Swiggy came up with its Swiggy Access facility. It provides ready-to-use kitchen spaces to its restaurant partners in those areas where they don’t operate. With the aim of bringing food nearer to its customers, Swiggy enables restaurants to set up their kitchens in new locations and let the food delivered to them at the fastest speed. Expecting around 25% of revenues in 2 years, Swiggy expands its cloud kitchen model to include 30 restaurants onboard with 36 kitchens to four new cities.     \r\n5. Swiggy Super\r\nSwiggy has launched a membership program called ‘Swiggy Super’ for customers. This program offers unlimited free delivery on all orders above ₹99. After subscribing to this program, customers don’t have to pay surge pricing during excessive demands.\r\n6. Swiggy Go\r\nAnother revenue stream for Swiggy is a concierge service Swiggy Go that was launched in 2019 to offer instant pick & drop service. Through Swiggy Go, the company earns by helping customers to send, pick, and drop anything to and from different locations anywhere across the city.\r\n7. Affiliate Income Swiggy earns revenue by partnering with various financial institutions like Citibank, HSBC, and ICICI Bank. This affiliate income is a new yet successful revenue stream where both parties benefit. It also allows customers to receive several credit card offers from those financial companies.', 'Technology', 'http://localhost/cadmus_personal/assets/featuredimages/swiggy.png', 1),
(5, 'Scientific Inventions and Discoveries: 2020', 'So, what did they do? They came up with their amazing all-new Swiggy app! An on-demand food ordering and delivery platform where you can order your favorite food from your favorite restaurant(s), and get it delivered within 30 minutes – all with just a tap! You can also track your order to know how long it will take to get delivered. These three entrepreneurs spotted a huge gap in the online food ordering and delivery industry of India. The next thing they did was to embrace the opportunity with open arms, and they filled the gap by launching Swiggy. The business model canvas of Swiggy is based on a hyperlocal on-demand food delivery business operation. Working as a bridge between restaurants and customers, Swiggy utilizes an innovative technology platform that works as a single point of contact. To get a definitive answer, we need to analyze Swiggy’s Revenue Model. As it’s expanding its business strategy and operations day by day, the revenue streams of Swiggy are also considerably increasing.', 'Technology', 'http://localhost/cadmus_personal/assets/featuredimages/science_discovery.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(100) NOT NULL,
  `profession` varchar(100) NOT NULL,
  `profile_pic` varchar(200) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `profession`, `profile_pic`, `user_id`) VALUES
(1, 'Full Stack Developer', 'http://localhost/cadmus_personal/assets/uploads/konark.jpg', 1),
(2, 'Python Developer', 'http://localhost/cadmus_personal/assets/uploads/radhika.jpg', 2),
(6, 'java', 'http://localhost/cadmus_personal/assets/uploads/profile_pic.png', 6),
(7, 'Vice President', 'http://localhost/cadmus_personal/assets/uploads/frank.jpg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'Konark Tanwar', 'kttanwar135@gmail.com', '9673f9efc4a080bbe66a932260b5a5b2a647976b', 1),
(2, 'Radhika Nigam', 'radhika.nigam@gmail.com', '34d2b67464505bf5d66dba4b5458bef72af1910a', 0),
(6, 'Siddhant Gupta', 'siddhant.gupta@gmail.com', 'a92337ea13879e88ca5fb2350630dbdb9c45f297', 0),
(7, 'Frank Underwood', 'frank.underwood@gmail.com', '86a8c2da8527a1c6978bdca6d7986fe14ae147fe', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dislikes`
--
ALTER TABLE `dislikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dislikes`
--
ALTER TABLE `dislikes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
