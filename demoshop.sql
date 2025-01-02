-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 04, 2024 at 06:10 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demoshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_category` varchar(125) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name_category`) VALUES
(9, 'Tôm'),
(10, 'Cá'),
(11, 'Cua'),
(12, 'Mực'),
(13, 'Ngao, sò, Ngán, Ốc, Hến vv...');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(17, 'trung nguyễn', 'nguyentrung1@gmail.com', 'Nên có nhiều mặt hàng hơn!! đa dạng chủng loại hơn.\r\nNếu không có nguồn hàng, Liên hệ: 0988722334', '2024-12-03 00:11:17'),
(19, 'Trung Trần', 'Trantrung4@gmail.com', 'ahihi', '2024-12-03 02:06:07'),
(20, 'trung nguyễn', 'nguyentrung1@gmail.com', 'AHAHA', '2024-12-03 11:04:11');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(12, 'Hải sản quý hiếm đang cạn kiệt', 'Các loại hải sản quý như tôm hùm, cá ngừ đại dương, hay hàu đang đối mặt với nguy cơ tuyệt chủng do khai thác quá mức và biến đổi khí hậu. Nhiều chuyên gia cảnh báo rằng nếu không có biện pháp bảo vệ kịp thời, những loài này có thể biến mất trong tương lai gần, ảnh hưởng đến ngành công nghiệp hải sản và sinh thái biển.', '2024-12-03 10:33:01', '2024-12-04 10:03:15'),
(10, 'Tại sao hải sản được xem là nguồn dinh dưỡng vàng cho sức khỏe?', 'Gần đây, nhiều cơ sở chế biến và bán hải sản đã bị phát hiện sử dụng hải sản không rõ nguồn gốc, tiềm ẩn nguy cơ bị ô nhiễm từ hóa chất, kháng sinh, hoặc các chất độc hại. Chuyên gia khuyến cáo người tiêu dùng cần phải chọn mua hải sản từ các nguồn uy tín để bảo vệ sức khỏe.', '2024-12-03 09:14:48', '2024-12-03 10:38:39'),
(11, 'Cảnh báo: Ăn hải sản không rõ nguồn gốc có thể gây hại cho sức khỏe!', 'Gần đây, nhiều cơ sở chế biến và bán hải sản đã bị phát hiện sử dụng hải sản không rõ nguồn gốc, tiềm ẩn nguy cơ bị ô nhiễm từ hóa chất, kháng sinh, hoặc các chất độc hại. Chuyên gia khuyến cáo người tiêu dùng cần phải chọn mua hải sản từ các nguồn uy tín để bảo vệ sức khỏe.', '2024-12-03 10:12:30', '2024-12-03 10:38:16');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(125) NOT NULL,
  `telephone` varchar(11) NOT NULL,
  `address` varchar(500) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `telephone`, `address`, `status`, `total`, `date`) VALUES
(1, 'trung nguyễn', '1231243124', 'ádsadsadasdsad', '0', 2183330, '2024-12-03'),
(2, '123', '123', '123', '0', 960000, '2024-12-04'),
(3, 'giau nhat quang ninh', '12312312312', '12312313', '0', 4010000, '2024-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `amount`) VALUES
(1, 1, 18, 850000, 1),
(2, 1, 17, 1333330, 1),
(3, 2, 16, 320000, 3),
(4, 3, 12, 350000, 4),
(5, 3, 14, 390000, 4),
(6, 3, 10, 350000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `sale` float NOT NULL,
  `image` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(2000) NOT NULL,
  `amount` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `discount_price` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `price`, `sale`, `image`, `date`, `description`, `amount`, `view`, `discount_price`) VALUES
(10, 9, 'Tôm Sú hổ Phú Quốc', 350000, 20, 'tom-su-phu-quoc.jpg', '2024-11-30', '<p>T&ocirc;m s&uacute; hổ hay c&ograve;n gọi l&agrave; t&ocirc;m s&uacute; cọp l&agrave; loại t&ocirc;m s&uacute; biển&nbsp; được đ&aacute;nh bắt ngo&agrave;i biển khơi v&ugrave;ng biển Ph&uacute; Quốc. Mỗi k&yacute; t&ocirc;m s&uacute; hổ chỉ c&oacute; từ 4 đến 6 con. H&agrave;ng n&agrave;y hiện nay rất hiếm c&oacute; v&agrave; đặc biệt.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://haisanquangninh.vn/wp-content/uploads/2021/09/Tom-su-sieu-to-khong-lo-co-gia-hon-trieu-dong-mot-kg-hut-khach-Ha-thanh-4-1589206030-233-width487height650.jpeg\" /></p>\r\n\r\n<p>Thịt t&ocirc;m chắc, ngọt, đậm đ&agrave; vị biển&rdquo; l&agrave; những g&igrave; c&oacute; thể mi&ecirc;u tả về hương vị của&nbsp;<strong>T&ocirc;m s&uacute; Ph&uacute; Quốc</strong>. T&ocirc;m s&uacute; Ph&uacute; Quốc được ngư d&acirc;n đ&aacute;nh bắt tự nhi&ecirc;n, cấp đ&ocirc;ng s&acirc;u chuyển về H&agrave; Nội theo đường h&agrave;ng kh&ocirc;ng n&ecirc;n chất lượng t&ocirc;m lu&ocirc;n tươi khi đến tay kh&aacute;ch h&agrave;ng.&nbsp;<strong>T&ocirc;m s&uacute;</strong>&nbsp;mắt to, đen l&aacute;y tinh anh, đầu kh&ocirc;ng đen, kh&ocirc;ng bị long, kh&ocirc;ng chảy nước v&agrave; đặc biệt phần đầu rất nhiều gạch b&eacute;o.</p>\r\n\r\n<p><img src=\"https://haisanquangninh.vn/wp-content/uploads/2021/09/tom_su_cu_phu_quoc_tuoi_ngon-600x800.jpg\" /></p>\r\n', 94, 0, NULL),
(11, 9, 'Tôm Hùm Bông', 1800000, 5, 'tom-hum-bong.jpg', '2024-11-30', '<p>T&ocirc;m h&ugrave;m b&ocirc;ng&nbsp;c&oacute; k&iacute;ch thước lớn (chiều d&agrave;i phổ biến 30 &ndash; 35 cm, c&oacute; thể l&ecirc;n tới 50 cm), trọng lượng trung b&igrave;nh 1.5 &ndash; 1.8 kg (c&oacute; thể đạt đến 4 &ndash; 4.5 kg/con). &hellip; Thịt&nbsp;t&ocirc;m h&ugrave;m b&ocirc;ng&nbsp;thuộc h&agrave;ng ngon nhất, dai chắc, rất ngọt, c&oacute; gi&aacute; trị dinh dưỡng cao, nhiều canxi, omega 3, gi&uacute;p ph&ograve;ng ngừa cao huyết &aacute;p, tim mạch.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://haisanquangninh.vn/wp-content/uploads/2021/09/IMG_9405-800x533.jpg\" /></p>\r\n\r\n<p>T&ocirc;m sinh trưởng chủ yếu ở những v&ugrave;ng biển ấm, b&igrave;nh lặng, nước trong sạch ở điều kiện khắt khe. Hiện nay, việc khai th&aacute;c v&agrave; nu&ocirc;i t&ocirc;m h&ugrave;m b&ocirc;ng đ&oacute;ng vai tr&ograve; quan trọng trong nền kinh tế ở v&ugrave;ng ven biển của nhiều quốc gia. Ở Việt Nam lo&agrave;i t&ocirc;m n&agrave;y c&oacute; nhiều nhất ở Nha Trang v&agrave; B&igrave;nh Thuận hoặc tại những khu vực c&oacute; nhiệt độ nước ấm.</p>\r\n\r\n<p><img src=\"https://haisanquangninh.vn/wp-content/uploads/2021/09/tom-hum-bong-800x450.jpg\" /></p>\r\n\r\n<p>T&ocirc;m h&ugrave;m b&ocirc;ng được xếp v&agrave;o danh s&aacute;ch những tinh hoa ẩm thực cao cấp với gi&aacute; trị dinh dưỡng cao v&agrave; hương vị tuyệt hảo. Tuy nhi&ecirc;n kh&ocirc;ng phải ai cũng c&oacute; cơ hội được thưởng thức loại hải sản qu&yacute; n&agrave;y.</p>\r\n', 30, 0, NULL),
(12, 12, 'Mực ống tươi', 350000, 5, 'Muc-ong.jpg', '2024-11-30', '<p><strong>Mực ống</strong>&nbsp;l&agrave; loại ngon nhất trong họ h&agrave;ng nh&agrave; mực. Mực l&agrave; thực phẩm chứa nhiều dưỡng chất, c&oacute; thể chế biến th&agrave;nh những m&oacute;n ăn ngon miệng. Trong ăn uống, ngo&agrave;i việc chọn m&oacute;n ăn ngon, dễ chế biến th&igrave; bạn cũng n&ecirc;n ch&uacute; &yacute; đến những lợi &iacute;ch sức khỏe m&agrave; m&oacute;n ăn sẽ mang lại.<strong>Mực ống</strong>&nbsp;sau khi đang bắt l&ecirc;n t&agrave;u được cấp đ&ocirc;ng ngay v&agrave; mang v&agrave;o bờ . V&igrave; vậy từng con mực lu&ocirc;n tươi v&agrave; vẫn giữ m&agrave;u đẹp . Từng sớ thịt săn chắc , d&agrave;y cơm ăn ngọt v&agrave; b&eacute;o</p>\r\n\r\n<p><img src=\"https://haisanquangninh.vn/wp-content/uploads/2021/11/muc-ong-3.jpg\" /></p>\r\n\r\n<p><em>Mực ống&nbsp;</em>l&agrave; loại hải sản c&oacute; th&acirc;n cuộn tr&ograve;n (h&igrave;nh ống), hơi d&agrave;i, m&igrave;nh mỏng thường d&ugrave;ng l&agrave;m nguy&ecirc;n liệu cho nhiều m&oacute;n ăn ngon. M&oacute;n mực ống nhỏ đang được nhiều người ưa th&iacute;ch.&nbsp;</p>\r\n\r\n<p><img src=\"https://haisanquangninh.vn/wp-content/uploads/2021/11/muc-ly-son-600x800.jpg\" /></p>\r\n\r\n<p>Gợi &yacute; một v&agrave;i m&oacute;n ngon &rdquo;kinh điển&rdquo; từ mực ống tươi ngon :&nbsp;</p>\r\n\r\n<p>Mực hấp đơn giản dễ l&agrave;m tại nh&agrave;.<strong>&nbsp;</strong></p>\r\n\r\n<p><img src=\"https://haisanquangninh.vn/wp-content/uploads/2021/11/139183-muc-ong-hap-660x440-1.jpg\" /></p>\r\n\r\n<p>Mực chi&ecirc;n gi&ograve;n thơm lừng đổi gi&oacute; cho cả gia đ&igrave;nh.</p>\r\n\r\n<p><img src=\"https://haisanquangninh.vn/wp-content/uploads/2021/11/2-cach-lam-muc-chien-gion-muc-chien-xu-thom-ngon-gion-dai-xin-nhu-nha-hang-6.jpg\" /></p>\r\n\r\n<p>Mực ram mặn d&ugrave;ng chung với cơm si&ecirc;u ngon.</p>\r\n\r\n<p><img src=\"https://haisanquangninh.vn/wp-content/uploads/2021/11/huong-dan-cach-lam-muc-rim-nuoc-mam-cuc-hap-dan2.png\" /></p>\r\n', 12, 0, NULL),
(13, 12, 'Chả Mực', 450000, 10, 'mat-truoc-goi-cha-muc-VIP-1.jpg', '2024-11-30', '<p>Chả mực l&agrave; m&oacute;n ăn đặc sản của v&ugrave;ng đất Hạ Long được l&agrave;m từ nguy&ecirc;n liệu ch&iacute;nh l&agrave; thịt mực gi&atilde; hoặc xay nhuyễn, tạo h&igrave;nh b&aacute;nh tr&ograve;n rồi chi&ecirc;n ch&iacute;n. Chả mực được biết đến như l&agrave; một đặc sản nổi tiếng nhất của v&ugrave;ng đất Hạ Long, thường được người d&acirc;n mua về l&agrave;m qu&agrave;. Chả mực được rất nhiều qu&yacute; kh&aacute;ch h&agrave;ng ưa chuộng bởi chả mực ngon, bảo quản l&acirc;u v&agrave; c&oacute; quy tr&igrave;nh thực hiện rất tỉ mỉ v&agrave; k&igrave; c&ocirc;ng.</p>\r\n\r\n<p><img src=\"https://haisanquangninh.vn/wp-content/uploads/2021/09/CHA-MUC-GIA-TAY-500x500-1.jpg\" /></p>\r\n\r\n<p>Chả mực gi&atilde; tay&nbsp;&ndash; m&oacute;n ăn đặc sản của Quảng Ninh được l&agrave;m từ mực tươi, đặc biệt l&agrave; mực mai. Kh&ocirc;ng những thế, mực mai phải được đ&aacute;nh bắt trong v&ugrave;ng Vịnh Hạ Long mới cho ra m&oacute;n chả mực c&oacute; vị ngọt thơm đặc trưng của nơi n&agrave;y. Đ&acirc;y l&agrave; điều l&agrave;m n&ecirc;n t&ecirc;n gọi của m&oacute;n chả mực gi&atilde; tay Quảng Ninh cũng như khiến m&oacute;n ăn n&agrave;y c&oacute; hương vị thật sự kh&aacute;c biệt.</p>\r\n\r\n<p>Chả mực c&oacute; rất nhiều chất dinh dưỡng. Trong 100g ăn được của mực tươi c&oacute; đến 60,1g đạm v&agrave; chỉ 4,5g chất b&eacute;o. Ngo&agrave;i ra mực c&oacute; chứa một số chất kho&aacute;ng vi lượng rất qu&yacute; như sắt, kẽm, mangan&hellip; v&agrave; cả testosterone tự nhi&ecirc;n c&oacute; chức năng tăng cường sinh lực nam giới. Chả mực c&oacute; t&aacute;c dụng bồi bổ l&agrave;m tăng sức khoẻ, tăng tr&iacute; lực, đặc biệt c&oacute; chứa c&aacute;c peptid c&oacute; t&aacute;c dụng chống độc v&agrave; chất ph&oacute;ng xạ, kh&ocirc;ng chỉ tốt cho sức khỏe m&agrave; c&ograve;n ngăn ngừa được nhiều bệnh. Nếu bạn thắc mắc kh&ocirc;ng biết mua chả mực ở đ&acirc;u ngon, hấp dẫn. Li&ecirc;n hệ ngay Hải Sản Quảng Ninh để được hỗ trợ nh&eacute;</p>\r\n', 1000, 0, NULL),
(14, 12, 'Mực Trứng', 390000, 5, 'mưc nháy.jpg', '2024-11-30', '<p>Mực trứng l&agrave; loại mực b&ecirc;n trong chứa to&agrave;n trứng, được đ&aacute;nh bắt trong m&ugrave;a sinh sản. Số lượng con mực c&oacute; trứng thường từ 80% &ndash; 90%. Mực trứng k&iacute;ch thước nhỏ, d&agrave;i 9 &ndash; 12cm, đỏ m&agrave;u c&aacute;nh gi&aacute;n. Đ&acirc;y l&agrave; sản phẩm theo chuy&ecirc;n gia đ&aacute;nh gi&aacute; rất gi&agrave;u dinh dưỡng. Đối với gia đ&igrave;nh, mực trứng đứng đầu trong danh s&aacute;ch sản phẩm ưa chuộng nhờ vị ngon, ngọt độc đ&aacute;o. N&oacute; c&ograve;n được d&ugrave;ng l&agrave; qu&agrave; biếu sang trọng, thiết thực trong dịp lễ, Tết.</p>\r\n', 42, 0, NULL),
(15, 10, 'Cá Thu', 320000, 10, 'ca-thu-cat-khuc-dong-lanh-2-haisandakmil-1.jpg', '2024-11-30', '<p>C&aacute; Thu l&agrave; một lo&agrave;i c&aacute; biển thuộc họ c&aacute; thu ngừ. C&aacute; thu l&agrave; d&ograve;ng c&aacute; thương phẩm c&oacute; gi&aacute; trị kinh tế cao v&agrave; l&agrave; nguồn dinh dưỡng tuyệt vời đối với sức khỏe của con người. C&aacute; thu c&oacute; th&acirc;n h&igrave;nh thu&ocirc;n d&agrave;i, tr&ograve;n h&igrave;nh oval ở phần th&acirc;n tr&ecirc;n v&agrave; c&oacute; xu hướng thu dẹt dần về ph&iacute;a đu&ocirc;i. Đặc điểm n&agrave;y của c&aacute; thu giống với đặc điểm của d&ograve;ng c&aacute; ngừ đại dương.&nbsp;</p>\r\n\r\n<p><img src=\"https://haisanquangninh.vn/wp-content/uploads/2021/10/ca-thu1.jpg\" /></p>\r\n\r\n<p>C&aacute; thu l&agrave; d&ograve;ng c&aacute; c&oacute; k&iacute;ch thước lớn v&agrave; d&ograve;ng c&aacute; thu c&aacute;i sẽ c&oacute; k&iacute;ch thước lớn hơn c&aacute; thu đực. C&aacute; thu c&aacute;i khi trưởng th&agrave;nh thường c&oacute; chiều d&agrave;i l&ecirc;n đến 80cm v&agrave; c&acirc;n nặng dao động từ 5 &ndash; 10kg (c&oacute; d&ograve;ng c&aacute; thu lớn c&oacute; thể l&ecirc;n đến 45kg</p>\r\n\r\n<p>C&aacute; thu l&agrave; loại c&aacute; ưu vận động, lại được sống trong v&ugrave;ng biển trong l&agrave;nh của Đảo Ngọc, thịt c&aacute; nổi tiếng ngọt, thơm, dai, chắc v&agrave; rất bổ dưỡng, hơn thế nữa c&aacute; thu c&oacute; chứa nhiều dầu &nbsp;omega-3 c&oacute; t&aacute;c dụng rất lớn trong việc ngăn chặn sự h&igrave;nh th&agrave;nh chất prostaglasdins c&oacute; li&ecirc;n quan đến những cơn đau khi h&agrave;nh kinh, c&oacute; khả năng ngăn chặn sự ph&aacute;t triển của tế b&agrave;o ung thư v&uacute; .&nbsp;</p>\r\n', 25, 0, NULL),
(16, 10, 'Cá hồi Sapa', 320000, 5, 'ca-hoi-5-1-600x600-3.jpg', '2024-11-30', '<p><strong>C&aacute; hồi sapa&nbsp;</strong>được nu&ocirc;i ở v&ugrave;ng kh&iacute; hậu lạnh Sapa, ch&uacute;ng ng&agrave;y c&agrave;ng được y&ecirc;u th&iacute;ch bởi thớ thịt dai săn chắc. Tại Sapa kh&iacute; hậu lạnh gần với điều kiện sống tự nhi&ecirc;n của c&aacute; hồi nhập ngoại, v&igrave; vậy về độ ngon v&agrave; gi&aacute; trị dinh dưỡng th&igrave; c&aacute; hồi Sapa kh&ocirc;ng k&eacute;m cạnh g&igrave; so với c&aacute;c loại c&aacute; hồi nhập khẩu kh&aacute;c.&nbsp;</p>\r\n\r\n<p><img src=\"https://haisanquangninh.vn/wp-content/uploads/2021/11/ca-hoi-sapa-03_75146-2.jpg\" /></p>\r\n\r\n<p>C&aacute; hồi l&agrave; loại c&aacute; thuộc hộ Salmon. Ch&uacute;ng thường sống ở dọc c&aacute;c bờ biển tại Th&aacute;i B&igrave;nh Dương v&agrave; Bắc Đại T&acirc;y Dương. Khi sinh sản ch&uacute;ng vượt th&aacute;c bơi ngược về s&ocirc;ng về đầu nguồn để sinh con để đảm bảo m&ocirc;i trường tốt nhất để đẻ trứng v&agrave; để cho c&aacute; hồi con lớn l&ecirc;n. Ch&uacute;ng c&oacute; nhiều gi&aacute; trị dinh dưỡng. Ở Việt Nam cũng c&oacute; c&aacute; hồi sapa ăn ngon kh&ocirc;ng k&eacute;m cạnh g&igrave; so với c&aacute; hồi nauy. Bạn c&oacute; thể dễ d&agrave;ng thưởng thức v&agrave; mua ch&uacute;ng hơn so với việc mua c&aacute;c c&aacute; hồi nhập ngoại kh&aacute;c.<br />\r\nSở dĩ gọi l&agrave; c&aacute; hồi sapa bởi ch&uacute;ng được nu&ocirc;i ở Sapa. Nơi đ&acirc;y kh&iacute; hậu m&aacute;t mẻ, c&oacute; m&ugrave;a đ&ocirc;ng lạnh rất th&iacute;ch hợp để nu&ocirc;i c&aacute; hợp. Thực tế cho thấy c&aacute; hồi nu&ocirc;i ở Sapa nh&igrave;n chung kh&aacute; được ưa chuộng tại thị trường Việt Nam. Những con c&aacute; hồi sapa sống ở v&ugrave;ng nước lạnh, chủ yếu l&agrave; nước từ tr&ecirc;n n&uacute;i xuống, nước n&agrave;y vừa lạnh lại vừa tinh khiết đảm bảo một m&ocirc;i trường sống tốt nhất cho c&aacute;.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 93, 0, NULL),
(17, 11, 'Chân Cua Hoàng Đế', 1333330, 9, 'Chan-cua-Kingcrab2-1.jpg', '2024-11-30', '<p><a href=\"https://hieuhaisan.com/chan-cua-hoang-de.html\" title=\"chân cua hoàng đế\">Ch&acirc;n cua Ho&agrave;ng đế</a>&nbsp;(ch&acirc;n King crab) được t&aacute;ch ra từ cua ho&agrave;ng đế nguy&ecirc;n con. Loại cua n&agrave;y rất hiếm v&agrave; kh&oacute; đ&aacute;nh bắt, người ta thường đ&aacute;nh bắt ch&uacute;ng ở những v&ugrave;ng c&oacute; nhiều b&atilde;o biển. Cua ho&agrave;ng đế c&oacute; k&iacute;ch thước lớn hơn rất nhiều so với c&aacute;c loại cua biển, sở hữu những cặp ch&acirc;n d&agrave;i, thịt nhiều, thớ thịt mềm v&agrave; đầy quyến rũ n&ecirc;n Cua Ho&agrave;ng Đế nổi tiếng l&agrave; đẳng cấp nhất thế giới lo&agrave;i cua</p>\r\n\r\n<p><img src=\"https://haisanquangninh.vn/wp-content/uploads/2021/09/chan-cua-king-crab-4-800x800.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n', 10, 0, NULL),
(18, 11, 'Cua Gạch Cà Mau', 850000, 20, 'cua-gach.jpg', '2024-11-30', '<p>Cua gạch l&agrave; cua c&aacute;i trưởng th&agrave;nh, ch&uacute;ng chứa đầy gạch ở hai b&ecirc;n mai cua v&agrave; trứng cua nằm gọn v&agrave;o giữa yếm. Thời kỳ sinh sản của cua gạch ch&iacute;nh l&agrave; l&uacute;c con cua chắc thịt v&agrave; ngon nhất, v&igrave; c&aacute;c chất dinh dưỡng được t&iacute;ch trữ đủ cho c&aacute;c hoạt động sinh sản. Thịt cua gạch vừa ngon, lại vừa chắc, thơm, b&eacute;o v&agrave; nhiều gi&aacute; trị dinh dưỡng.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 99, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(191) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `fullname`, `image`, `role`) VALUES
(6, 'admin1', 'quan1@gmail.com', '2024-11-30 01:12:43', '123456', 'Tô Quân', '', '0'),
(7, 'dinhhuy', 'Huyhuy@gmail.com', '2024-11-28 14:16:12', '123456', 'Lê Đình Huy', 'user.jpg', '1'),
(8, 'hihihaha', 'you@gmail.com', '2024-12-03 07:12:51', '123456', 'nguoidung1', '', '1'),
(22, 'nguyentrung1', 'nguyentrung1@gmail.com', '2024-12-01 15:34:04', '123456', 'Nguyễn Văn Trung1', 'user.jpg', '1');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
