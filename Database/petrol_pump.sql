-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2024 at 02:02 PM
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
-- Database: `petrol_pump`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(550) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `delete_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `photo`, `delete_status`) VALUES
(1, 'iovation', '6512b27504bd2.png', 0),
(2, 'Humanetics', '6512b29162e86.png', 0),
(3, 'Amara', '6513d1ca70d7e.png', 0),
(4, 'hexa', '6513d206f2327.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(200) NOT NULL,
  `brandName` varchar(255) DEFAULT NULL,
  `customerEmail` varchar(255) DEFAULT NULL,
  `customerPhone` varchar(20) DEFAULT NULL,
  `customerAddress` varchar(255) DEFAULT NULL,
  `brandStatus` varchar(50) DEFAULT NULL,
  `delete_status` tinyint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `brandName`, `customerEmail`, `customerPhone`, `customerAddress`, `brandStatus`, `delete_status`) VALUES
(2, 'Rahul Sharma', 'rahul@example.com', '+91-9876543210', '123, ABC Street, Mumbai, Maharashtra', 'Active', 0),
(3, 'Priya Patel', 'priya@example.com', '+91-8765432109', '456, XYZ Road, Delhi, Delhi', 'Active', 0),
(4, 'Amit Singh', 'amit@example.com', '+91-7654321098', '789, LMN Avenue, Bangalore, Karnataka', 'Active', 0),
(5, 'Neha Gupta', 'neha@example.com', '+91-6543210987', '321, PQR Lane, Hyderabad, Telangana', 'Active', 0),
(6, 'Sandeep Verma', 'sandeep@example.com', '+91-5432109876', '654, GHI Street, Chennai, Tamil Nadu', 'Active', 0),
(7, 'Anjali Reddy', 'anjali@example.com', '+91-4321098765', '987, DEF Road, Kolkata, West Bengal', 'Active', 0),
(8, 'Rajesh Kumar', 'rajesh@example.com', '+91-3210987654', '741, JKL Avenue, Pune, Maharashtra', 'Active', 0),
(9, 'Sneha Pandey', 'sneha@example.com', '+91-2109876543', '852, OPQ Lane, Ahmedabad, Gujarat', 'Active', 0),
(10, 'Aakash Jain', 'aakash@example.com', '+91-1098765432', '963, RST Street, Surat, Gujarat', 'Active', 0),
(11, 'Pooja Desai', 'pooja@example.com', '+91-0987654321', '159, UVW Road, Jaipur, Rajasthan', 'Active', 0),
(12, 'Vikram Sharma', 'vikram@example.com', '+91-9876543210', '357, KLM Avenue, Lucknow, Uttar Pradesh', 'Active', 0),
(13, 'Shreya Singh', 'shreya@example.com', '+91-8765432109', '753, EFG Lane, Kanpur, Uttar Pradesh', 'Active', 0),
(14, 'Amita Tiwari', 'amita@example.com', '+91-7654321098', '258, MNO Street, Nagpur, Maharashtra', 'Active', 0),
(15, 'Kunal Kapoor', 'kunal@example.com', '+91-6543210987', '852, STU Road, Indore, Madhya Pradesh', 'Active', 0),
(16, 'Divya Mehra', 'divya@example.com', '+91-5432109876', '951, HIJ Avenue, Bhopal, Madhya Pradesh', 'Active', 0),
(19, 'Naman Patil', 'naman@gmail.com', '7979797979', 'Rane Nagar, Pune', 'Active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `emailsetting`
--

CREATE TABLE `emailsetting` (
  `id` int(10) NOT NULL,
  `encryption` varchar(255) NOT NULL,
  `host` varchar(255) NOT NULL,
  `port` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `delete_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fuel_category`
--

CREATE TABLE `fuel_category` (
  `id` int(200) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fuel_category`
--

INSERT INTO `fuel_category` (`id`, `name`, `delete_status`) VALUES
(1, 'Petrol', 0),
(2, 'Diesel', 0),
(3, 'LPG', 0),
(4, 'CNG', 0),
(5, 'Aviation Fuel', 0),
(6, 'Kerosene', 0),
(7, 'Biofuel', 0),
(8, 'Hydrogen', 0),
(9, 'Electricity', 0),
(10, 'Natural Gas', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fuel_tbl`
--

CREATE TABLE `fuel_tbl` (
  `id` int(200) NOT NULL,
  `fuelName` varchar(255) DEFAULT NULL,
  `openning_stock` decimal(10,2) DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `bno` varchar(50) DEFAULT NULL,
  `expdate` date DEFAULT NULL,
  `formula` varchar(255) DEFAULT NULL,
  `supplierName` varchar(255) DEFAULT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fuel_tbl`
--

INSERT INTO `fuel_tbl` (`id`, `fuelName`, `openning_stock`, `rate`, `unit_price`, `bno`, `expdate`, `formula`, `supplierName`, `categoryName`, `delete_status`) VALUES
(1, 'Petrol', 347.00, 65.00, 60.00, '25', '2024-05-18', '', '1', '1', 0),
(2, 'Diesel', 171.00, 63.00, 58.00, '65', '2024-05-17', '', '2', '2', 0),
(3, 'CNG', 155.00, 68.00, 58.00, '26', '2024-05-24', '', '3', '4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `mobileno` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL,
  `delete_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `username`, `mobileno`, `image`, `delete_status`) VALUES
(1, 'mayuri.infospace@gmail.com', 'aa7f019c326413d5b8bcad4314228bcd33ef557f5d81c7cc977f7728156f4357', 'Sevak Petroleum ', '8070807080', '3.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `manage_web`
--

CREATE TABLE `manage_web` (
  `id` int(10) NOT NULL,
  `photo1` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `photos` varchar(255) NOT NULL,
  `sitekey` varchar(255) NOT NULL,
  `secretkey` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_web`
--

INSERT INTO `manage_web` (`id`, `photo1`, `title`, `photos`, `sitekey`, `secretkey`) VALUES
(1, '65d1d414d6166.png', 'FuelFlow lite - Developed by Mayuri K.', '65d1d444addef.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `heading` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `shortcontent` varchar(500) NOT NULL,
  `content` longtext NOT NULL,
  `photo` varchar(150) NOT NULL,
  `banner` varchar(150) NOT NULL,
  `metatitle` varchar(50) NOT NULL,
  `metadescription` varchar(500) NOT NULL,
  `keywords` varchar(500) NOT NULL,
  `robots` varchar(550) NOT NULL,
  `delete_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `heading`, `slug`, `shortcontent`, `content`, `photo`, `banner`, `metatitle`, `metadescription`, `keywords`, `robots`, `delete_status`) VALUES
(1, 'SIRE Ship Inspections', '', 'Commissioned by oil companies that are members of the Oil Companies International Marine Forum (OCIMF), our SIRE inspections provide up-to-date', '<p>Commissioned by oil companies that are members of the Oil Companies International Marine Forum (OCIMF), our SIRE inspections provide up-to-date<br />&nbsp;</p><p>&lt;h2&gt;Service Description&lt;/h2&gt;<br />&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;p&gt;At Leo Marine Inspections Pvt Ltd, we take great pride in our specialization in CDI Ship Inspections, a service meticulously crafted for chemical a', 'serv-3.jpg', 'serv-3.jpg', 'Leo Marine Inspections Pvt Ltd - Your Global Partn', 'Unlock the potential of your maritime operations with Leo Marine Inspections Pvt Ltd. We specialize in maritime and tanker consultancy and inspection services, ensuring safety, compliance, and environmental responsibility. Contact us today for comprehensive solutions and global expertise.', 'Leo Marine Inspections Pvt Ltd, Maritime Excellence, Maritime Consultancy, Tanker Inspection, Safety Compliance, Environmental Responsibility, Global Expertise', 'index, follow', 0),
(2, 'Safety for Gulf Express Oil Tanker', '', 'In collaboration with Gulf Express Shipping, we conducted a comprehensive safety assessment for their oil tanker, resulting in improved safety measures and regulatory compliance', '<p>Service Description</p><p>At Leo Marine Inspections Pvt Ltd, we take great pride in our specialization in CDI Ship Inspections, a service meticulously crafted for chemical and gas tankers. These inspections are integral to the intricate world of maritime logistics, playing an indispensable role in guaranteeing the safe and fully compliant transport of chemical and gas cargoes across the vast expanse of our oceans.</p><p>Navigating the complexities of chemical and gas transport at sea demands a level of expertise and precision that is second to none. CDI Ship Inspections are specifically designed to meet this demand, providing a framework that prioritizes safety, compliance, and environmental responsibility</p><p>Our team of seasoned inspectors boasts a deep understanding of the intricate requirements and exacting standards set forth by the Chemical Distribution Institute (CDI). Their expertise forms the bedrock of every inspection, ensuring a meticulous evaluation of your vessel.</p><p>CDI Ship Inspections are indispensable for the continual adherence to industry regulations and safety benchmarks. Our meticulous inspections assist you in maintaining unwavering compliance, substantially reducing the risk of untoward incidents.</p><p>Key Features and Benefits</p><ul><li>Industry Expertise</li><li>Compliance Assurance</li><li>Risk Mitigation</li><li>Continuous Improvement</li></ul>', 'serv-4.jpg', '3.jpg', 'Leo Marine Inspections Pvt Ltd - Your Global Partn', 'Unlock the potential of your maritime operations with Leo Marine Inspections Pvt Ltd. We specialize in maritime and tanker consultancy and inspection services, ensuring safety, compliance, and environmental responsibility. Contact us today for comprehensive solutions and global expertise.', 'Leo Marine Inspections Pvt Ltd, Maritime Excellence, Maritime Consultancy, Tanker Inspection, Safety Compliance, Environmental Responsibility, Global Expertise', 'index, follow', 0),
(3, 'Compliance for North Star Chemical Carrier', '', 'Working closely with North Star Chemicals, we ensured environmental compliance for their chemical carrier, aligning it with sustainability guidelines', '<p>Service Description</p><p>At Leo Marine Inspections Pvt Ltd, we take great pride in our specialization in CDI Ship Inspections, a service meticulously crafted for chemical and gas tankers. These inspections are integral to the intricate world of maritime logistics, playing an indispensable role in guaranteeing the safe and fully compliant transport of chemical and gas cargoes across the vast expanse of our oceans.</p><p>Navigating the complexities of chemical and gas transport at sea demands a level of expertise and precision that is second to none. CDI Ship Inspections are specifically designed to meet this demand, providing a framework that prioritizes safety, compliance, and environmental responsibility</p><p>Our team of seasoned inspectors boasts a deep understanding of the intricate requirements and exacting standards set forth by the Chemical Distribution Institute (CDI). Their expertise forms the bedrock of every inspection, ensuring a meticulous evaluation of your vessel.</p><p>CDI Ship Inspections are indispensable for the continual adherence to industry regulations and safety benchmarks. Our meticulous inspections assist you in maintaining unwavering compliance, substantially reducing the risk of untoward incidents.</p><p>Key Features and Benefits</p><ul><li>Industry Expertise</li><li>Compliance Assurance</li><li>Risk Mitigation</li><li>Continuous Improvement</li></ul>', '2.jpg', '4.jpg', 'Leo Marine Inspections Pvt Ltd - Your Global Partn', 'Unlock the potential of your maritime operations with Leo Marine Inspections Pvt Ltd. We specialize in maritime and tanker consultancy and inspection services, ensuring safety, compliance, and environmental responsibility. Contact us today for comprehensive solutions and global expertise.', 'Leo Marine Inspections Pvt Ltd, Maritime Excellence, Maritime Consultancy, Tanker Inspection, Safety Compliance, Environmental Responsibility, Global Expertise', 'index, follow', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quot_inv_items`
--

CREATE TABLE `quot_inv_items` (
  `id` int(100) NOT NULL,
  `quot_id` int(50) NOT NULL,
  `inv_id` int(50) NOT NULL,
  `product_id` int(50) NOT NULL,
  `p_group_name` varchar(150) DEFAULT NULL,
  `quantity` varchar(10) NOT NULL,
  `rate` double(10,2) NOT NULL,
  `gst` double(10,2) NOT NULL,
  `tax_amount` double(10,2) NOT NULL,
  `taxable_amount` double(10,2) NOT NULL,
  `sale_price` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL,
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quot_inv_items`
--

INSERT INTO `quot_inv_items` (`id`, `quot_id`, `inv_id`, `product_id`, `p_group_name`, `quantity`, `rate`, `gst`, `tax_amount`, `taxable_amount`, `sale_price`, `total`, `delete_status`) VALUES
(1, 0, 1, 1, NULL, '50', 60.00, 0.00, 0.00, 0.00, 0.00, 3000.00, 0),
(2, 0, 1, 2, NULL, '43', 58.00, 0.00, 0.00, 0.00, 0.00, 2494.00, 0),
(4, 0, 2, 3, NULL, '25', 58.00, 0.00, 0.00, 0.00, 0.00, 1450.00, 0),
(5, 0, 2, 2, NULL, '32', 58.00, 0.00, 0.00, 0.00, 0.00, 1856.00, 0),
(7, 0, 3, 1, NULL, '3', 60.00, 0.00, 0.00, 0.00, 0.00, 180.00, 0),
(8, 0, 3, 2, NULL, '4', 58.00, 0.00, 0.00, 0.00, 0.00, 232.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(10) NOT NULL,
  `heading` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `shortcontent` varchar(500) NOT NULL,
  `content` longtext NOT NULL,
  `photo` varchar(150) NOT NULL,
  `banner` varchar(150) NOT NULL,
  `metatitle` varchar(50) NOT NULL,
  `metadescription` varchar(500) NOT NULL,
  `keywords` varchar(500) NOT NULL,
  `robots` varchar(550) NOT NULL,
  `delete_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `heading`, `slug`, `shortcontent`, `content`, `photo`, `banner`, `metatitle`, `metadescription`, `keywords`, `robots`, `delete_status`) VALUES
(1, 'CDI  inspection ', '', 'The CDI is an inspection regime primarily designed for chemical and gas tankers, and the completed report provides a score for the inspected vessel. A higher score indicates a vessel compliant with industry standards. ', '<p>The CDI is an inspection regime primarily designed for chemical and gas tankers, and the completed report provides a score for the inspected vessel. A higher score indicates a vessel compliant with industry standards.&nbsp;</p><p>&nbsp;</p>', '652695cb0b184.png', '652696644afc2.png', 'Leo Marine Inspections Pvt Ltd - Your Global Partn', 'Unlock the potential of your maritime operations with Leo Marine Inspections Pvt Ltd. We specialize in maritime and tanker consultancy and inspection services, ensuring safety, compliance, and environmental responsibility. Contact us today for comprehensive solutions and global expertise.', 'Risk assessment services, Inspection services, Client satisfaction, Safety, inspection firm\r\n', 'Risk assessment services, Inspection services, Client satisfaction, Safety, inspection firm\r\n', 1),
(2, 'CDI Ship Inspections', '', 'Our specialized inspections for chemical and gas tankers are designed to assess and improve vessel compliance with industry standards Detailed reports ', '<p><strong>Service Description</strong></p><p>At Leo Marine Inspections Pvt Ltd, we take great pride in our specialization in CDI Ship Inspections, a service meticulously crafted for chemical and gas tankers. These inspections are integral to the intricate world of maritime logistics, playing an indispensable role in guaranteeing the safe and fully compliant transport of chemical and gas cargoes across the vast expanse of our oceans.</p><p>Navigating the complexities of chemical and gas transport at sea demands a level of expertise and precision that is second to none. CDI Ship Inspections are specifically designed to meet this demand, providing a framework that prioritizes safety, compliance, and environmental responsibility</p><p>Our team of seasoned inspectors boasts a deep understanding of the intricate requirements and exacting standards set forth by the Chemical Distribution Institute (CDI). Their expertise forms the bedrock of every inspection, ensuring a meticulous evaluation of your vessel.</p><p>CDI Ship Inspections are indispensable for the continual adherence to industry regulations and safety benchmarks. Our meticulous inspections assist you in maintaining unwavering compliance, substantially reducing the risk of untoward incidents.</p><p><strong>Key Features and Benefits</strong></p><ul><li>Industry Expertise</li><li>Compliance Assurance</li><li>Risk Mitigation</li><li>Continuous Improvement</li></ul><p>&quot;</p>', 'serv-2.jpg', 'why-1.jpg', 'Leo Marine Inspections Pvt Ltd - Your Global Partn', 'Unlock the potential of your maritime operations with Leo Marine Inspections Pvt Ltd. We specialize in maritime and tanker consultancy and inspection services, ensuring safety, compliance, and environmental responsibility. Contact us today for comprehensive solutions and global expertise.', 'Leo Marine Inspections Pvt Ltd, Maritime Excellence, Maritime Consultancy, Tanker Inspection, Safety Compliance, Environmental Responsibility, Global Expertise', 'index, follow', 1),
(3, 'OCIMF', '', 'OCIMF - SIRE inspections are commissioned by oil companies that are members of the OCIMF (Oil Companies International Marine Forum), Reports of such inspections are maintained on the OCIMF database for members to access, providing them up to date inspection status of the vessel', '<p><strong>OCIMF - SIRE inspections are commissioned by oil companies that are members of the OCIMF (Oil Companies International Marine Forum), Reports of such inspections are maintained on the OCIMF database for members to access, providing them up to date inspection status of the vessel</strong></p>', '6526964eb7e04.jpg', '6526964eb843a.jpg', 'Leo Marine Inspections Pvt Ltd - Your Global Partn', 'Unlock the potential of your maritime operations with Leo Marine Inspections Pvt Ltd. We specialize in maritime and tanker consultancy and inspection services, ensuring safety, compliance, and environmental responsibility. Contact us today for comprehensive solutions and global expertise.', 'Risk assessment services, Inspection services, Client satisfaction, Safety, inspection firm', 'Risk assessment services, Inspection services, Client satisfaction, Safety, inspection firm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(10) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `heading` varchar(300) NOT NULL,
  `short_text` varchar(300) NOT NULL,
  `delete_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `photo`, `heading`, `short_text`, `delete_status`) VALUES
(1, '6512b961193ac.jpg', 'Safe And Reliable solution', 'WELCOME TO LEO MARINE', 0),
(2, '6512c08a9ec77.jpg', 'Integrity Safety And Commitment', 'CHOOSE LEO MARINE', 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(200) NOT NULL,
  `brandName` varchar(255) DEFAULT NULL,
  `supplierEmail` varchar(255) DEFAULT NULL,
  `supplierPhone` varchar(20) DEFAULT NULL,
  `supplierAddress` varchar(255) DEFAULT NULL,
  `brandStatus` varchar(50) DEFAULT NULL,
  `delete_status` tinyint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `brandName`, `supplierEmail`, `supplierPhone`, `supplierAddress`, `brandStatus`, `delete_status`) VALUES
(1, 'Indian Oil Corporation', 'ioc@example.com', '+91-1234567890', '123 ABC Street, Mumbai, India', 'Active', 0),
(2, 'Bharat Petroleum Corporation Limited', 'bpcl@example.com', '9090909090', ' 456 XYZ Road, New Delhi, India', 'Active', 0),
(3, 'Hindustan Petroleum Corporation Limited', 'hpcl@example.com', '+91-9998887776', '789 PQR Avenue, Bangalore, India', 'Active', 0),
(4, 'Reliance Petroleum', 'reliance@example.com', '+91-8887776665', '101 EFG Lane, Chennai, India', 'Active', 0),
(5, 'Essar Oil', 'essar@example.com', '+91-7776665554', '222 HIJ Colony, Kolkata, India', 'Active', 0),
(6, 'Shell India', 'shell@example.com', '+91-6665554443', '333 LMN Street, Hyderabad, India', 'Active', 0),
(7, 'GAIL (India) Limited', 'gail@example.com', '+91-5554443332', '444 OPQ Road, Pune, India', 'Active', 0),
(8, 'Gas Authority of India Limited', 'gailimited@example.com', '+91-4443332221', '555 RST Avenue, Ahmedabad, India', 'Active', 0),
(9, 'Indian Petrochemicals Corporation Limited', 'ipcl@example.com', '+91-3332221110', '666 UVW Lane, Jaipur, India', 'Active', 0),
(10, 'Oil and Natural Gas Corporation', 'ongc@example.com', '+91-2221110009', '777 XYZ Street, Lucknow, India', 'Active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `id` int(100) NOT NULL,
  `build_date` date NOT NULL,
  `customer_id` varchar(200) NOT NULL,
  `customerPhone` varchar(150) NOT NULL,
  `customerAddress` longtext NOT NULL,
  `customerEmail` varchar(100) NOT NULL,
  `representative_id` int(50) NOT NULL,
  `inv_no` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0:not invoice,1:invoice',
  `subtotal` double(10,2) NOT NULL,
  `discount` double(10,2) NOT NULL,
  `final_total` double(10,2) NOT NULL,
  `delete_status` tinyint(4) NOT NULL,
  `currentdatetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_date` date DEFAULT NULL,
  `gst_rate` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`id`, `build_date`, `customer_id`, `customerPhone`, `customerAddress`, `customerEmail`, `representative_id`, `inv_no`, `status`, `subtotal`, `discount`, `final_total`, `delete_status`, `currentdatetime`, `created_date`, `gst_rate`) VALUES
(2, '2024-02-15', '3', '8765432109', '456, XYZ Road, Delhi, Delhi', 'priya@example.com', 0, 'INV-0002', 0, 3306.00, 4.00, 3306.00, 0, '2024-02-15 05:03:04', '2024-02-15', 5.00),
(3, '2024-02-18', '19', '7979797979', 'Rane Nagar, Pune', 'naman@gmail.com', 0, 'INV-0003', 0, 412.00, 0.00, 412.00, 0, '2024-02-18 10:42:50', '2024-02-18', 0.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emailsetting`
--
ALTER TABLE `emailsetting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuel_category`
--
ALTER TABLE `fuel_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuel_tbl`
--
ALTER TABLE `fuel_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_web`
--
ALTER TABLE `manage_web`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quot_inv_items`
--
ALTER TABLE `quot_inv_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `emailsetting`
--
ALTER TABLE `emailsetting`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fuel_category`
--
ALTER TABLE `fuel_category`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `fuel_tbl`
--
ALTER TABLE `fuel_tbl`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `manage_web`
--
ALTER TABLE `manage_web`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quot_inv_items`
--
ALTER TABLE `quot_inv_items`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
