-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Dec 22, 2019 at 01:43 PM
-- Server version: 5.7.24-log
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopnhap`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adminEmail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `adminUser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adminPass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'phu', 'laptop@gmail.com', 'shopAdmin', 'e10adc3949ba59abbe56e057f20f883e', 0),
(2, 'admin', 'admin@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 0),
(3, 'namka', 'kaka@gmail.com', 'kaka', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_binhluan`
--

CREATE TABLE `tbl_binhluan` (
  `binhluanId` int(11) NOT NULL,
  `tenbinhluan` varchar(255) NOT NULL,
  `binhluan` text NOT NULL,
  `productId` int(11) NOT NULL,
  `binhluan_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(4, 'Acer'),
(5, 'Lenovo'),
(6, 'HP'),
(7, 'Asus'),
(8, 'Dell');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `sId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `productId`, `sId`, `productName`, `price`, `quantity`, `image`) VALUES
(11, 50, '6ad079cd7583f922c7c1ba64367bb993', 'Laptop Asus Zenbook ', '20159000', 1, 'aadb680849.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(30, 'Core i5 8500U'),
(31, 'Core i5 7500H'),
(32, 'Core i7 6500HQ'),
(33, 'Core i5 8500Q'),
(34, 'Core i7 8700HQ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zipcode`, `phone`, `email`, `password`) VALUES
(10, 'Văn Nam', 'vtc, 18 tam trinh, hai bà trưng', 'Hà nội', 'VietNam', '10000', '0359458586', 'nam@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date_order` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `productId`, `productName`, `customer_id`, `quantity`, `price`, `image`, `status`, `date_order`) VALUES
(27, 60, 'Laptop HP Probook 450 G5', 10, 1, '19690000', 'ef56f76532.jpg', 2, '2019-12-22 17:31:41'),
(28, 50, 'Laptop Asus Zenbook ', 10, 1, '20159000', 'aadb680849.jpg', 3, '2019-12-22 17:39:20'),
(29, 50, 'Laptop Asus Zenbook ', 10, 5, '20159000', 'aadb680849.jpg', 4, '2019-12-22 17:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `product_code` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `productQuantity` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_soldout` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `product_remain` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `product_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `product_code`, `productQuantity`, `product_soldout`, `product_remain`, `catId`, `brandId`, `product_desc`, `type`, `price`, `image`) VALUES
(48, 'Laptop HP ENVY 13-AQ0026TU', 'ABC123', '100', '0', '100', 33, 8, '<p>CPU: Intel Core i5-8265U 1.6GHz up 3.9GHz 6MB</p>\r\n<p>M&agrave;n h&igrave;nh: 13.3\" FHD (1920 x 1080) IPS, BrightView Micro-Edge</p>\r\n<p>RAM: 8GB LPDDR3 2133MHz (Onboard)</p>\r\n<p>Đồ họa: Intel UHD Graphics 620</p>\r\n<p>Lưu trữ: 256GB PCIe NVMe M.2 SSD</p>\r\n<p>Hệ điều h&agrave;nh: Windows 10 Home</p>\r\n<p>Pin: 4 Cell 53WHr</p>', 0, '20510000', '6234a0f57c.jpg'),
(49, 'Laptop Asus Vivobook', 'ABC123', '20', '0', '20', 33, 7, '<p>Chip: Intel Core i5-8265U (1.60GHz Up to 3.90 GHz, 4Cores, 8Threads, 6MB Cache, FSB 4GT/s)</p>\r\n<p>RAM: 8GB DDR4 2400MHz + 1 slot RAM</p>\r\n<p>Ổ cứng: 512GB SSD M.2 PCIe</p>\r\n<p>Chipset đồ họa: Intel UHD Graphics 620</p>\r\n<p>M&agrave;n h&igrave;nh: 14-inch FHD (1920x1080) 60Hz Anti-Glare Panel with 45% NTSC, NanoEdge</p>\r\n<p>Hệ điều h&agrave;nh: Windows 10 bản quyền</p>\r\n<p>Pin: 2 Cells 37 Whrs</p>', 0, '15399000', 'cce3d77127.jpg'),
(50, 'Laptop Asus Zenbook ', 'ABC123', '100', '6', '100', 33, 7, '<p>Chip: Intel Core i5-8265U (1.60GHz Up to 3.90 GHz, 4Cores, 8Threads, 6MB Cache, FSB 4GT/s)</p>\r\n<p>RAM: 8GB LPDDR3-2133Mhz (Onboard)</p>\r\n<p>Ổ cứng: 256GB SSD M.2 PCIe</p>\r\n<p>Chipset đồ họa: Intel UHD Graphics 620</p>\r\n<p>M&agrave;n h&igrave;nh: 14 inch Full HD (1920 x 1080) NanoEdge, 100% sRGB, 178&deg; wide-view</p>\r\n<p>Hệ điều h&agrave;nh: Windows 10</p>\r\n<p>Pin: 3 Cells 50 Whrs</p>', 0, '20159000', 'aadb680849.jpg'),
(51, 'Laptop Asus ROG Zephyrus', 'ABC123', '20', '0', '50', 32, 7, '<p>CPU: Intel Core i7-9750H 2.6GHz up to 4.5GHz 12MB</p>\r\n<p>RAM: 16GB DDR4 2666MHz Onboard (1x SO-DIMM socket, up to 32GB SDRAM)</p>\r\n<p>&Ocirc;̉ cứng: 1TB SSD PCIE G3X4</p>\r\n<p>Card đồ họa: NVIDIA GeForce RTX 2070 8GB GDDR6</p>\r\n<p>M&agrave;n h&igrave;nh: 15.6\" FHD (1920 x 1080) IPS, 100% sRGB, 240Hz G-Sync, 3ms, 300nits, Pantone Validated, NanoEdge</p>\r\n<p>Cổng giao tiếp: 3x USB 3.1, 1x USB 3.1 Type-C with DisplayPort, HDMI, RJ-45</p>', 1, '57939000', 'd947dc9825.jpg'),
(52, 'Laptop Lenovo Ideapad', 'ABC123', '20', '0', '20', 30, 5, '<p>Chip: Intel Core i3-6006U Processor (3M Cache, 2.00 GHz)</p>\r\n<p>RAM: 4G DDR4 2133 MHz</p>\r\n<p>Ổ cứng: 500GB HDD 5400 rpm</p>\r\n<p>Chipset đồ họa: Intel HD Graphics 520</p>\r\n<p>M&agrave;n h&igrave;nh: 14 inch HD (1366 x 768) LED Backlit</p>\r\n<p>Hệ điều h&agrave;nh: Windows 10 Home</p>\r\n<p>Pin: 2 Cell</p>', 1, '10390000', 'fb7215120b.jpg'),
(53, 'Laptop Lenovo ThinkPad', 'ABC123', '20', '0', '20', 33, 5, '<p>CPU: Intel Core i5-8265U (1.60GHz Up to 3.90 GHz, 4Cores, 8Threads, 6MB Cache, FSB 4GT/s)</p>\r\n<p>M&agrave;n h&igrave;nh: 14-inch FHD (1920x1080), Anti-Glare</p>\r\n<p>RAM: 8GB DDR4 2400MHz, 2 slots, max 32GB</p>\r\n<p>Đồ họa: Intel UHD Graphics 620</p>\r\n<p>Lưu trữ: 256GB SSD M.2 PCle3x4</p>\r\n<p>Hệ điều h&agrave;nh: Free Dos</p>\r\n<p>Pin: 3-Cells 42Wh</p>', 1, '17789000', 'faf88f2fe6.jpg'),
(54, 'Laptop Acer Aspire 3', 'ABC123', '20', '0', '20', 31, 5, '<p>CPU: Intel Celeron N4000 (1.1 GHz - 2.6 GHz/4MB/2 nh&acirc;n, 2 lu&ocirc;̀ng)</p>\r\n<p>M&agrave;n h&igrave;nh: 15.6\" (1280 x 720), kh&ocirc;ng cảm ứng</p>\r\n<p>RAM: 1 x 4GB Onboard DDR4 2133MHz (1 Khe cắm, Hỗ trợ tối đa 8GB)</p>\r\n<p>Đồ họa: Intel UHD Graphics 600</p>\r\n<p>Lưu trữ: 256GB SSD M.2 NVMe /</p>\r\n<p>Hệ điều h&agrave;nh: Windows 10 Home 64-bit</p>\r\n<p>Pin: 2 cell 37 Wh, Khối lượng: 1.7 kg</p>', 1, '11659000', '416e3daa12.jpg'),
(55, 'Laptop Dell Inspiron 3480', 'ABC123', '40', '0', '40', 33, 8, '<p>CPU: Intel Core i5-8265U (1.6Ghz x 4) 3MB L3 cache</p>\r\n<p>RAM: 8GB, DDR4 2666 MHz</p>\r\n<p>Đĩa cứng: 256GB - SSD</p>\r\n<p>M&agrave;n h&igrave;nh: 14 inch HD (1366 x 768)</p>\r\n<p>Đồ họa: intel UHD 620</p>\r\n<p>HĐH: Win 10</p>', 1, '14640000', '33ba04e4d6.jpg'),
(56, 'Dell Inspiron 3580-70186847', 'ABC123', '20', '0', '20', 33, 8, '<p>M&atilde; sản phẩm / Model 70186847</p>\r\n<p>Bộ Vi Xử L&yacute; / CPU Intel Core i5-8265U 1.6GHz up to 3.9GHz 6MB</p>\r\n<p>Bộ Nhớ Trong / RAM 4GB DDR4 2666MHz (2x SO-DIMM socket, up to 16GB SDRAM)</p>\r\n<p>Ổ Cứng / HDD HDD 1TB 5400rpm</p>\r\n<p>M&agrave;n h&igrave;nh / LCD 15.6 FHD (1920 x 1080) Anti-Glare</p>\r\n<p>Chip Đồ Họa / VGA AMD Radeon 520 2GB GDDR5 + Intel UHD Graphics 620</p>\r\n<p>Kết Nối / Network 802.11 ac Wi-Fi</p>\r\n<p>Giao Tiếp Mở Rộng 2x USB 3.1 Gen 1 1x USB2.0 1x HDMI 1.4b 1x Khe kh&oacute;a Wedge-Shaped 1x Jack cắm điện 1 ổ đĩa quang 1x SD Media Card Reader (SD, SDHC, SDXC) 1x VGA 1x RJ45 1x Headphone/Microphone Jack</p>\r\n<p>Dung Lượng Pin 3 Cell 42WHr</p>\r\n<p>Hệ Điều H&agrave;nh / Operating System Win 10</p>\r\n<p>Trọng Lượng / Weight 2.2 kg</p>\r\n<p>M&agrave;u Sắc Silver</p>', 1, '13669000', '399a9a4706.jpg'),
(57, 'Laptop ASUS ZenBook ', 'ABC123', '100', '0', '100', 34, 7, '<p>CPU: Intel Core i5-10210U 1.6GHz up to 4.2GHz 6MB&nbsp;</p>\r\n<p>M&agrave;n h&igrave;nh: 14\" FHD (1920 x 1080) IPS, 72% NTSC, 100% sRGB</p>\r\n<p>RAM: 8GB LPDDR3 2133MHz</p>\r\n<p>Đồ họa: NVIDIA GeForce MX250 2GB GDDR5 + Intel UHD Graphics</p>\r\n<p>Lưu trữ: 512GB SSD M.2 PCIE G3X2</p>\r\n<p>Hệ điều h&agrave;nh: Windows 10 Home</p>\r\n<p>Pin: 4 Cells 70WHrs</p>', 1, '30000000', 'ab588dca08.jpg'),
(58, 'Laptop HP Pavilion 14-CE1014TU ', 'ABC123', '100', '0', '100', 30, 8, '<p>Hệ điều h&agrave;nh: Windows 10 Home SL</p>\r\n<p>Bộ vi xử l&yacute;: Intel Core i3-8145U (2.10Ghz upto 3.90GHz, 2Cores, 4Threads, 4MB Cache, FSB 4GT/s)</p>\r\n<p>M&agrave;n h&igrave;nh : 14.0-inch diagonal FHD IPS BrightView WLED-backlit (1920x1080)</p>\r\n<p>Đồ họa: Intel UHD Graphics 620</p>\r\n<p>Bộ nhớ Ram: 4GB DDR4 Bus 2400MHz</p>\r\n<p>Ổ đĩa cứng: 500GB HDD 5400rpm + 1 Slot SSD M.2</p>\r\n<p>Thời gian pin sử dụng: 3-Cell 41 Whr Li-ion</p>', 1, '11000000', 'e5dd890585.jpg'),
(59, 'Laptop Dell G5 Inspiron ', 'ABC123', '100', '0', '100', 34, 8, '<p>CPU Intel Core i7-9750H 2.6GHz upto 4.5GHz, 6Cores, 12Threads, 12MB cache</p>\r\n<p>RAM: 16GB DDR4 2666Mhz (2x8GB), 2 Slot, Max 32GB</p>\r\n<p>Ổ cứng: 512GB SSD M.2 PCIe NVMe</p>\r\n<p>Card VGA: NVIDIA GeForce RTX 2060 6GB GDDR6</p>\r\n<p>M&agrave;n h&igrave;nh: 15.6inch FHD (1920 x 1080) IPS 300-nits, Anti-Glare, LED Backlit Display with 144Hz</p>\r\n<p>Kết nối: Wifi 802.11 AC + Bluetooth4.2</p>\r\n<p>Pin: 4cells 60WHr</p>\r\n<p>Hệ điều h&agrave;nh: Windows 10 bản quyền</p>', 1, '41400000', 'f1ae5c92b1.jpg'),
(60, 'Laptop HP Probook 450 G5', 'ABC123', '100', '1', '99', 30, 5, '<p>CPU Intel Core i7-8550U 1.8GHz up to 4.0GHz 8MB</p>\r\n<p>RAM 8GB DDR4 2400MHz</p>\r\n<p>Đĩa cứng HDD 1TB 7200rpm, x1 slot SSD M.2 2280</p>\r\n<p>Card đồ họa NVIDIA GeForce GT 930MX 2GB + Intel UHD 620</p>\r\n<p>M&agrave;n h&igrave;nh 15.6 inch FHD (1920x1080) LED UWVA Anti-Glare</p>', 0, '19690000', 'ef56f76532.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `sliderId` int(11) NOT NULL,
  `sliderName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`sliderId`, `sliderName`, `slider_image`, `type`) VALUES
(12, 'baner', '53ef386eed.jpg', 1),
(13, 'baner 1', '8cb2abd9a9.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_support`
--

CREATE TABLE `tbl_support` (
  `supportId` int(11) NOT NULL,
  `supportName` varchar(255) NOT NULL,
  `supportEmail` varchar(150) NOT NULL,
  `supportPhone` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `support_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_support`
--

INSERT INTO `tbl_support` (`supportId`, `supportName`, `supportEmail`, `supportPhone`, `content`, `support_date`) VALUES
(3, 'Văn Nam', 'namkaka2412@gmail.com', '0359458586', 'Tôi muốn được tư vấn về sản phẩm ', '2019-12-16 14:11:06'),
(4, 'Văn Nam', 'namkaka2412@gmail.com', '0359458586', 'Tôi muốn được tư vấn về sản phẩm ', '2019-12-16 14:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warehouse`
--

CREATE TABLE `tbl_warehouse` (
  `id_warehouse` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `sl_nhap` varchar(50) NOT NULL,
  `ngaynhap` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_warehouse`
--

INSERT INTO `tbl_warehouse` (`id_warehouse`, `id_sanpham`, `sl_nhap`, `ngaynhap`) VALUES
(5, 50, '6', '2019-12-22 12:13:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`id`, `customer_id`, `productId`, `productName`, `price`, `image`) VALUES
(3, 10, 60, 'Laptop HP Probook 450 G5', '19690000', 'ef56f76532.jpg'),
(4, 10, 59, 'Laptop Dell G5 Inspiron ', '41400000', 'f1ae5c92b1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_binhluan`
--
ALTER TABLE `tbl_binhluan`
  ADD PRIMARY KEY (`binhluanId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`sliderId`);

--
-- Indexes for table `tbl_support`
--
ALTER TABLE `tbl_support`
  ADD PRIMARY KEY (`supportId`);

--
-- Indexes for table `tbl_warehouse`
--
ALTER TABLE `tbl_warehouse`
  ADD PRIMARY KEY (`id_warehouse`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_binhluan`
--
ALTER TABLE `tbl_binhluan`
  MODIFY `binhluanId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `sliderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_support`
--
ALTER TABLE `tbl_support`
  MODIFY `supportId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_warehouse`
--
ALTER TABLE `tbl_warehouse`
  MODIFY `id_warehouse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
