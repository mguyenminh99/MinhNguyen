-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2020 at 09:50 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT 'Tên danh mục',
  `type` tinyint(3) DEFAULT 0 COMMENT 'Loại danh mục: 0 - Product, 1 - News',
  `avatar` varchar(100) DEFAULT NULL COMMENT 'Tên file ảnh danh mục',
  `description` text DEFAULT NULL COMMENT 'Mô tả chi tiết cho danh mục',
  `status` tinyint(3) DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo danh mục',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `type`, `avatar`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Snake', 0, '', '', 0, '2020-08-26 14:44:54', NULL),
(2, 'Python', 0, '', '', 0, '2020-08-26 14:45:02', NULL),
(3, 'Tortoise', 0, '', '', 0, '2020-08-26 14:45:25', NULL),
(4, 'Monitor', 0, '', '', 0, '2020-08-26 14:45:36', NULL),
(5, 'Feeder', 0, '', '', 0, '2020-08-26 14:46:28', NULL),
(6, 'Cages', 0, '', '', 0, '2020-08-26 14:46:36', NULL),
(7, 'Leopard  Gecko', 0, '', '', 0, '2020-08-26 14:48:13', NULL),
(8, 'Bearded Dragon', 0, '', '', 0, '2020-08-26 14:48:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'minh', '123', '123', '\r\n45456'),
(2, 'minh', 'minh', 'test', 'test1');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(11) NOT NULL,
  `key_word` text DEFAULT NULL,
  `discount_num` int(11) DEFAULT NULL,
  `begin_sale` date DEFAULT NULL,
  `end_sale` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `key_word`, `discount_num`, `begin_sale`, `end_sale`) VALUES
(6, 'TEST2020', 20, '2020-10-07', '2020-10-14');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `star` tinyint(4) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `product_id`, `star`, `comment`, `created_at`) VALUES
(32, 4, 31, 3, 'best', '2020-10-05 08:27:42'),
(33, 4, 28, 4, 'abc', '2020-10-05 08:27:42'),
(34, 2, 28, 5, 'test', '2020-10-05 10:04:32'),
(35, 4, 29, 4, 'bestt', '2020-10-05 10:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL COMMENT 'Id của danh mục mà tin tức thuộc về, là khóa ngoại liên kết với bảng categories',
  `title` varchar(100) NOT NULL COMMENT 'Tiêu đề tin tức',
  `summary` text DEFAULT NULL COMMENT 'Mô tả ngắn cho tin tức',
  `avatar` varchar(100) DEFAULT NULL COMMENT 'Tên file ảnh tin tức',
  `content` text DEFAULT NULL COMMENT 'Mô tả chi tiết cho sản phẩm',
  `status` tinyint(3) DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `seo_title` varchar(100) DEFAULT NULL COMMENT 'Từ khóa seo cho title',
  `seo_description` varchar(100) DEFAULT NULL COMMENT 'Từ khóa seo cho phần mô tả',
  `seo_keywords` varchar(100) DEFAULT NULL COMMENT 'Các từ khóa seo',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `category_id`, `title`, `summary`, `avatar`, `content`, `status`, `seo_title`, `seo_description`, `seo_keywords`, `created_at`, `updated_at`) VALUES
(3, 6, 'Bể nuôi rùa cạn cần những gì', 'Nuôi rùa cạn hay bất kỳ loài thú cưng nào bạn cũng cần chuẩn bị một chuồng nuôi với kích thước phù hợp, phụ kiện đầy đủ thì pet của bạn mới có thể phát triển khỏe mạnh, không bị bệnh tật và có một cuộc sống hạnh phúc.', '1602279100-news-be-chuyen-dung-danh-cho-rua-can.jpg', '<h3><strong>Vậy bể nu&ocirc;i r&ugrave;a cạn cần chuẩn bị những g&igrave;?</strong></h3>\r\n\r\n<ul>\r\n	<li>Trước khi mua r&ugrave;a cạn từ shop về nu&ocirc;i bạn cần chuẩn bị một bể nu&ocirc;i r&ugrave;a cạn c&oacute; k&iacute;ch thước gấp 5 lần k&iacute;ch thước của ch&uacute; r&ugrave;a cạn bạn chuẩn bị mua. V&iacute; dụ với k&iacute;ch thước của ch&uacute; r&ugrave;a cạn 5cm th&igrave; bạn cần setup một bể nu&ocirc;i r&ugrave;a k&iacute;ch thước 50cm l&agrave; đủ hoặc rộng hơn th&igrave; c&agrave;ng tốt. Chiều cao của bể nu&ocirc;i r&ugrave;a cạn n&ecirc;n gấp 2 lần k&iacute;ch thước của r&ugrave;a để tr&aacute;nh t&iacute;nh trạng r&ugrave;a leo ra ngo&agrave;i. Bể nu&ocirc;i r&ugrave;a cạn bạn c&oacute; thể lựa chọn th&ugrave;ng giấy, bể k&iacute;nh, hộp nhựa hoặc x&acirc;y nh&agrave; cho r&ugrave;a cạn bằng xi măng v&agrave; c&oacute; tường bao cũng được nhưng lưu &yacute; tất cả chuồng nu&ocirc;i r&ugrave;a cạn đều phải tho&aacute;ng kh&iacute; v&agrave; lưu th&ocirc;ng kh&ocirc;ng kh&iacute; tốt. Nếu c&oacute; điều kiện v&agrave; muốn nu&ocirc;i r&ugrave;a cảnh để trang tr&iacute; cho ph&ograve;ng kh&aacute;ch trong nh&agrave; m&igrave;nh khuy&ecirc;n c&aacute;c bạn n&ecirc;n chọn bể k&iacute;nh.</li>\r\n	<li>Bể nu&ocirc;i r&ugrave;a cạn n&ecirc;n c&oacute; nắp đậy b&ecirc;n tr&ecirc;n để tr&aacute;nh c&aacute;c nguy hiểm từ b&ecirc;n ngo&agrave;i l&agrave;m tổn thương đến r&ugrave;a.</li>\r\n	<li>Bề nu&ocirc;i r&ugrave;a cạn bạn n&ecirc;n setup hệ thống đ&egrave;n UVB/UVA v&agrave; đ&egrave;n sưởi, đ&egrave;n chiếu s&aacute;ng. Th&ocirc;ng thường đ&egrave;n UVB d&agrave;nh cho r&ugrave;a cạn thường sẽ l&agrave; loại <a href=\"https://vietpetgarden.net/den-uvb-crawlmiracle-5-0-va-10-0-13w/\"><strong>UVB 5.0</strong></a>.</li>\r\n	<li>Khu vực phơi nắng cho r&ugrave;a cạn. Khu vực n&agrave;y n&ecirc;n thiết kế một tảng đ&aacute; hoặc kh&uacute;c gỗ đặt dưới đ&egrave;n UVB để r&ugrave;a leo l&ecirc;n phơi nắng. Lưu &yacute; tảng đ&aacute; hay kh&uacute;c gỗ phải c&oacute; đường để r&ugrave;a leo l&ecirc;n v&agrave; khu vực phơi nắng phải rộng r&atilde;i, thoải m&aacute;i.</li>\r\n	<li>Cần chuẩn bị b&aacute;t ăn, b&aacute;t uống nước, hồ nước nhỏ kh&ocirc;ng s&acirc;u qu&aacute; cơ thể của r&ugrave;a cạn.</li>\r\n	<li>Chuồng nu&ocirc;i r&ugrave;a n&ecirc;n c&oacute; th&ecirc;m l&oacute;t n&ecirc;n chuy&ecirc;n dụng d&agrave;nh cho r&ugrave;a cạn.</li>\r\n	<li>Hang ch&uacute; ẩn cho r&ugrave;a cạn.</li>\r\n	<li>C&acirc;y xanh để tạo t&iacute;nh thẩm mỹ v&agrave; m&ocirc;i trường sống gần gũi với thi&ecirc;n nhi&ecirc;n cho r&ugrave;a.</li>\r\n	<li>Bể nu&ocirc;i r&ugrave;a n&ecirc;n lắp th&ecirc;m nhiệt kế để đo độ ẩm v&agrave; nhiệt độ m&ocirc;i trường sống của r&ugrave;a từ đ&oacute; c&oacute; hướng điều chỉnh hợp l&yacute; ph&ugrave; hợp với d&ograve;ng r&ugrave;a cạn m&agrave; m&igrave;nh đang nu&ocirc;i.</li>\r\n</ul>\r\n\r\n<p>Khi nu&ocirc;i r&ugrave;a cạn c&aacute;c bạn n&ecirc;n setup bể nu&ocirc;i r&ugrave;a theo c&aacute;c mục m&agrave; m&igrave;nh đ&atilde; kể tr&ecirc;n l&agrave; đ&atilde; chuẩn rồi n&oacute; bao gồm đầy đủ c&aacute;c phụ kiện cần thiết nhất cho r&ugrave;a. Nhưng mọi người n&ecirc;n lưu &yacute; với mỗi loại r&ugrave;a cạn sẽ cần một m&ocirc;i trường sống với mức nhiệt độ v&agrave; độ ẩm kh&aacute;c nhau v&igrave; vậy mọi người cần ch&uacute; &yacute; đến yếu tố n&agrave;y khi setup m&ocirc;i trường sống của r&ugrave;a.</p>\r\n', 0, NULL, NULL, NULL, '2020-10-09 20:45:36', '2020-10-10 04:31:41'),
(4, 3, 'Nuôi rùa sao Ấn Độ ở Việt Nam có khó không?', 'Nuôi rùa sao Ấn Độ ở Việt Nam có khó không?', '1602276606-news-rua-sao-an-do-nhung-dieu-it-ai-biet-anh-suckhoecuocsong.vn.jpg', '<h2>Điều kiện sống của r&ugrave;a sao Ấn Độ</h2>\r\n\r\n<p>Trước khi quyết định nu&ocirc;i r&ugrave;a sao Ấn Độ. Đa số mọi người đều phải t&igrave;m hiểu qua th&ocirc;ng tin về lo&agrave;i <a href=\"https://www.petmart.vn/chuyen-muc/bo-sat\">b&ograve; s&aacute;t</a> n&agrave;y để biết đặc điểm cũng như tập t&iacute;nh sinh sống của ch&uacute;ng. Để xem c&oacute; th&iacute;ch hợp với kh&iacute; hậu của Việt Nam hay kh&ocirc;ng. R&ugrave;a Sao kh&ocirc;ng phải l&agrave; lo&agrave;i b&ograve; s&aacute;t bản ngữ ở nước ta. M&agrave; ch&uacute;ng c&oacute; nguồn gốc từ v&ugrave;ng kh&ocirc; cằn, c&acirc;y bụi của Ấn Độ v&agrave; Sri Lanka. Điều kiện sống l&yacute; tưởng của r&ugrave;a l&agrave; nơi kh&ocirc; n&oacute;ng, kh&ocirc;ng kh&iacute; c&oacute; độ ẩm cao. V&agrave; đặc biệt phải c&oacute; t&aacute;n l&aacute; c&acirc;y.</p>\r\n\r\n<p>Trong khi đ&oacute;, Việt Nam l&agrave; đất nước c&oacute; kh&iacute; hậu nhiệt đới ẩm gi&oacute; m&ugrave;a, thời tiết thay đổi thất thường, nền nhiệt l&uacute;c cao, l&uacute;c thấp, v&agrave; kh&ocirc;. Đ&acirc;y kh&ocirc;ng phải l&agrave; điều kiện l&yacute; tưởng cho sự ph&aacute;t triển v&agrave; sinh trưởng của r&ugrave;a. V&igrave; lẽ đ&oacute;, nếu nu&ocirc;i r&ugrave;a sao ở điều kiện tự nhi&ecirc;n của Việt Nam l&agrave; điều kh&ocirc;ng hề dễ d&agrave;ng. Chỉ cần c&aacute;c bạn tu&acirc;n thủ hướng dẫn, tư liệu m&agrave; Pop Pet <a href=\"https://poppetshop.vn/shop/\">Shop</a> cung cấp sẽ nu&ocirc;i th&agrave;nh c&ocirc;ng lo&agrave;i n&agrave;y.</p>\r\n\r\n<h2>Điều kiện sống của r&ugrave;a sao Ấn Độ</h2>\r\n\r\n<p>Trước khi quyết định nu&ocirc;i r&ugrave;a sao Ấn Độ. Đa số mọi người đều phải t&igrave;m hiểu qua th&ocirc;ng tin về lo&agrave;i <a href=\"https://www.petmart.vn/chuyen-muc/bo-sat\">b&ograve; s&aacute;t</a> n&agrave;y để biết đặc điểm cũng như tập t&iacute;nh sinh sống của ch&uacute;ng. Để xem c&oacute; th&iacute;ch hợp với kh&iacute; hậu của Việt Nam hay kh&ocirc;ng. R&ugrave;a Sao kh&ocirc;ng phải l&agrave; lo&agrave;i b&ograve; s&aacute;t bản ngữ ở nước ta. M&agrave; ch&uacute;ng c&oacute; nguồn gốc từ v&ugrave;ng kh&ocirc; cằn, c&acirc;y bụi của Ấn Độ v&agrave; Sri Lanka. Điều kiện sống l&yacute; tưởng của r&ugrave;a l&agrave; nơi kh&ocirc; n&oacute;ng, kh&ocirc;ng kh&iacute; c&oacute; độ ẩm cao. V&agrave; đặc biệt phải c&oacute; t&aacute;n l&aacute; c&acirc;y.</p>\r\n\r\n<p>Trong khi đ&oacute;, Việt Nam l&agrave; đất nước c&oacute; kh&iacute; hậu nhiệt đới ẩm gi&oacute; m&ugrave;a, thời tiết thay đổi thất thường, nền nhiệt l&uacute;c cao, l&uacute;c thấp, v&agrave; kh&ocirc;. Đ&acirc;y kh&ocirc;ng phải l&agrave; điều kiện l&yacute; tưởng cho sự ph&aacute;t triển v&agrave; sinh trưởng của r&ugrave;a. V&igrave; lẽ đ&oacute;, nếu nu&ocirc;i r&ugrave;a sao ở điều kiện tự nhi&ecirc;n của Việt Nam l&agrave; điều kh&ocirc;ng hề dễ d&agrave;ng</p>\r\n', 0, NULL, NULL, NULL, '2020-10-09 20:50:06', NULL),
(5, 4, 'Kỳ Đà Tegu Argentina – Chăm Sóc Đúng Cách', 'Kỳ Đà Tegu Argentina là loài động vật ăn tạp. Sống trong các khu rừng nhiệt đới, vùng hoang mạc và bán sa mạc ở phía đông Nam Mỹ. Đây là loài có trí thông minh cao bất thường trong bò sát. Nó đã được quan sát và ghi nhận thường xuyên tìm kiếm tình cảm của con người (giống như một con chó).', '1602279033-news-tegu-9.jpg', '<p><strong>Tuổi thọ của Tegu </strong>từ&nbsp;12 đến 20 năm.</p>\r\n\r\n<p><strong>Thức ăn của Tegu&nbsp;</strong></p>\r\n\r\n<p>C&oacute; thể cung cấp từ những quả trứng, g&agrave; con, giun, s&acirc;u dế hoặc đ&ocirc;i khi l&agrave; một ch&uacute; chuột con. Cần sử dụng gắp thức ăn để tr&aacute;nh việc hiểu lầm giữa ng&oacute;n tay người chơi v&agrave; thức ăn.</p>\r\n\r\n<p>C&aacute;c nghi&ecirc;n cứu của tegu trong m&ocirc;i trường sống tự nhi&ecirc;n của ch&uacute;ng đ&atilde; cho thấy chế độ ăn uống bao gồm khoảng 30-66% l&agrave; tr&aacute;i c&acirc;y, 15-40% động vật kh&ocirc;ng xương sống, v&agrave; 20-28% động vật c&oacute; xương sống. Chế độ ăn của c&aacute; thể tegu non l&agrave; khoảng 48% động vật kh&ocirc;ng xương sống, 22% tr&aacute;i c&acirc;y v&agrave; 16% động vật c&oacute; xương sống.</p>\r\n\r\n<p><strong>H&agrave;nh vi ngủ đ&ocirc;ng của Tegu</strong>&nbsp;được thấy khi nhiệt độ hạ xuống dưới 20 độ. Cho d&ugrave; bạn c&oacute; muốn hay kh&ocirc;ng th&igrave; Tegu sẽ ngủ y&ecirc;n, kh&ocirc;ng ăn uống v&agrave; thường ẩn n&aacute;u trong suốt thời gian đ&oacute;. M&ugrave;a đ&ocirc;ng ở miền bắc cũng kh&ocirc;ng đ&aacute;ng lo ngại bởi chỉ cần sử dụng đ&egrave;n sưởi trong thời gian n&agrave;y.</p>\r\n\r\n<p><strong>Hoạt động của Tegu v&agrave;o ban ng&agrave;y</strong>. Nơi m&agrave; người chơi cung cấp cho ch&uacute;ng một m&ocirc;i trường th&iacute;ch hợp. Bao gồm: một khu vực chiếu sưởi, một khu vực m&aacute;t, đĩa thức ăn ri&ecirc;ng, nước uống sạch v&agrave; hang tr&uacute;. Khuyến kh&iacute;ch sử dụng đồng hồ đo nhiệt ẩm để x&aacute;c định r&otilde; từng v&ugrave;ng nhiệt.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>K&iacute;ch thước Tegu</h2>\r\n\r\n<p>Con đực trưởng th&agrave;nh ph&aacute;t triển lớn hơn so với con c&aacute;i. Khoảng 1m20.</p>\r\n\r\n<h2>&Aacute;nh s&aacute;ng v&agrave; Nhiệt độ của kỳ đ&agrave; Tegu</h2>\r\n\r\n<p>Một b&oacute;ng sưởi cao duy nhất c&oacute; thể l&agrave;m cho m&ocirc;i trường bốc ch&aacute;y kh&ocirc; h&eacute;o. &Aacute;nh s&aacute;ng cụm chia l&agrave; 2 b&oacute;ng sưởi c&ocirc;ng suất nhỏ l&agrave; c&aacute;ch tốt nhất để đạt được một khu vực an to&agrave;n cho Tegu. Nhiệt độ được đo ch&iacute;nh x&aacute;c bởi <a href=\"https://poppetshop.vn/shop/dong-ho-nhiet-am-repti-zoo-cho-bo-sat/\"><strong>Đồng Hồ Nhiệt Ẩm Kế</strong></a> c&oacute; b&aacute;n tại <a href=\"https://poppetshop.vn/shop/\">Shop</a>. Tegu chỉ ti&ecirc;u h&oacute;a tốt thức ăn ở mức nhiệt độ 35 40 độ. Tr&ecirc;n 40 độ kh&ocirc;ng được khuyến kh&iacute;ch khi nu&ocirc;i trong m&ocirc;i trường nhỏ, tegu sẽ mất nước v&agrave; suy kiệt sức khỏe.</p>\r\n\r\n<p><strong><a href=\"https://poppetshop.vn/shop/den-uvb-mat-troi-bo-sat-hang-hongyi-boshi/\">Một b&oacute;ng đ&egrave;n UVA UVB</a></strong> trong chuồng nu&ocirc;i l&agrave; điều cần thiết để hấp thụ sản sinh Vitamin D3. Bởi 2 tia gi&uacute;p cho Tegu c&oacute; thể bắt mồi ch&iacute;nh x&aacute;c, nhận thức được thức ăn v&agrave; ngay cả ch&iacute;nh bạn t&igrave;nh của ch&uacute;ng. (Kh&ocirc;ng sử dụng những b&oacute;ng đ&egrave;n kh&ocirc;ng c&oacute; tia UVA UVB như dạng sợi t&oacute;c rạng đ&ocirc;ng).</p>\r\n\r\n<p><strong>L&oacute;t nền khử m&ugrave;i ph&acirc;n cho Tegu</strong></p>\r\n\r\n<p><strong><a href=\"https://poppetshop.vn/shop/lot-nen-vo-thong-cho-bo-sat/\">L&oacute;t nền vỏ th&ocirc;ng khử nhựa độc do shop cung cấp</a></strong> c&oacute; t&aacute;c dụng khử m&ugrave;i ph&acirc;n trong chuồng nu&ocirc;i. L&oacute;t nền gi&uacute;p giữ ẩm ở khu vực hang tr&uacute;, Tegu sẽ kh&ocirc;ng bị bệnh mất nước trong cơ thể v&agrave; lột x&aacute;c dễ d&agrave;ng hơn. Kể cả con vật liếm phải cũng kh&ocirc;ng lo bởi đ&atilde; qua xử l&yacute; của c&ocirc;ng ty Repti Zoo. Đ&atilde; c&oacute; nhiều trường hợp sử dụng c&aacute;t x&acirc;y dựng nhưng Shop kh&ocirc;ng khuyến kh&iacute;ch bởi loại c&aacute;t n&agrave;y g&acirc;y ra bệnh tắc ruột.</p>\r\n', 0, NULL, NULL, NULL, '2020-10-09 21:00:50', '2020-10-10 04:30:33');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'Id của user trong trường hợp đã login và đặt hàng, là khóa ngoại liên kết với bảng users',
  `fullname` varchar(100) DEFAULT NULL COMMENT 'Tên khách hàng',
  `address` varchar(100) DEFAULT NULL COMMENT 'Địa chỉ khách hàng',
  `mobile` int(11) DEFAULT NULL COMMENT 'SĐT khách hàng',
  `email` varchar(100) DEFAULT NULL COMMENT 'Email khách hàng',
  `note` text DEFAULT NULL COMMENT 'Ghi chú từ khách hàng',
  `price_total` int(11) DEFAULT NULL COMMENT 'Tổng giá trị đơn hàng',
  `payment_status` tinyint(2) DEFAULT NULL COMMENT 'Trạng thái đơn hàng: 0 - Chưa thành toán, 1 - Đã thành toán',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo đơn',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fullname`, `address`, `mobile`, `email`, `note`, `price_total`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Minh123 123', 'abcacb', 904898001, 'minh@gmail.com', '', 3005000, 0, '2020-09-15 06:22:36', '2020-10-10 16:42:02'),
(2, NULL, 'Minh123 123', 'abcacb', 904898001, 'minh@gmail.com', '', 3005000, 0, '2020-09-15 09:09:20', NULL),
(3, NULL, 'Minh123 123', 'abcacb', 904898001, 'minh@gmail.com', '', 12000, 1, '2020-09-25 11:34:23', NULL),
(4, NULL, 'Minh123 123', 'abcacb', 904898001, 'minh@gmail.com', '', 12000, 0, '2020-09-25 12:37:12', NULL),
(5, NULL, 'Minh123 123', 'abcacb', 904898001, 'minh@gmail.com', '', 24700000, 1, '2020-09-30 05:35:13', NULL),
(6, NULL, 'Minh123 123', 'abcacb', 904898001, 'minh@gmail.com', '', 1600000, 1, '2020-10-07 08:28:00', NULL),
(7, NULL, 'Minh123 123', 'abcacb', 904898001, 'minh@gmail.com', '', 6500000, 1, '2020-10-07 08:36:49', NULL),
(8, NULL, 'Minh123 123', 'abcacb', 904898001, 'minh@gmail.com', '', 3900000, 1, '2020-10-07 08:43:55', NULL),
(9, NULL, 'Minh123 123', 'abcacb', 904898001, 'minh@gmail.com', '', 8100000, 1, '2020-10-07 09:08:44', NULL),
(10, NULL, 'Minh123 123', 'abcacb', 904898001, 'minh@gmail.com', '', 18700000, 1, '2020-10-07 09:10:48', NULL),
(11, NULL, 'Minh123 123', 'abcacb', 904898001, 'minh@gmail.com', '', 5150000, 1, '2020-10-07 09:32:46', NULL),
(12, NULL, 'Minh123 123', 'abcacb', 904898001, 'minh@gmail.com', '', 4700000, 1, '2020-10-07 09:41:15', NULL),
(13, NULL, 'Minh123 123', 'abcacb', 904898001, 'minh@gmail.com', '', 1280000, 1, '2020-10-08 05:00:14', NULL),
(14, NULL, 'Minh123 123', 'abcacb', 904898001, 'minh@gmail.com', '', 11680000, 1, '2020-10-08 05:05:24', NULL),
(15, NULL, 'Minh123 123', 'abcacb', 904898001, 'minh@gmail.com', '', 15300000, 1, '2020-10-10 00:50:19', NULL),
(16, NULL, 'Hương', 'abc', 123, 'mguyenminh99@gmail.com', '', 13200000, 0, '2020-10-10 10:27:32', NULL),
(17, NULL, ' Lộc', 'flc', 321456, 'mguyenminh99@gmail.com', '', 14300000, 0, '2020-10-10 10:30:11', NULL),
(18, NULL, ' minh', 'abc', 904898001, 'mguyenminh99@gmail.com', '', 9500000, 0, '2020-10-11 19:18:30', NULL),
(19, 4, ' minh', 'abc', 904898001, 'mguyenminh99@gmail.com', '', 5000000, 0, '2020-10-11 19:23:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) DEFAULT NULL COMMENT 'Id của order tương ứng, là khóa ngoại liên kết với bảng orders',
  `product_id` int(11) DEFAULT NULL COMMENT 'Id của product tương ứng, là khóa ngoại liên kết với bảng products',
  `quantity` int(11) DEFAULT NULL COMMENT 'Số sản phẩm đã đặt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `quantity`) VALUES
(1, 16, 1),
(1, 19, 1),
(2, 16, 1),
(2, 19, 1),
(3, 20, 1),
(3, 19, 1),
(3, 18, 1),
(3, 21, 1),
(4, 20, 1),
(4, 19, 1),
(4, 18, 1),
(4, 21, 1),
(5, 16, 1),
(5, 32, 1),
(5, 31, 1),
(5, 29, 2),
(5, 30, 1),
(5, 26, 1),
(5, 28, 1),
(6, 32, 1),
(7, 31, 1),
(8, 27, 2),
(8, 30, 1),
(9, 31, 1),
(9, 32, 1),
(10, 16, 1),
(10, 32, 1),
(10, 31, 1),
(10, 28, 1),
(10, 29, 1),
(11, 23, 1),
(11, 24, 1),
(11, 25, 1),
(11, 22, 1),
(12, 27, 1),
(12, 26, 1),
(12, 30, 1),
(13, 32, 1),
(14, 31, 1),
(14, 32, 1),
(14, 28, 1),
(15, 32, 1),
(15, 31, 1),
(15, 27, 1),
(15, 28, 1),
(16, 29, 1),
(16, 6, 1),
(16, 8, 1),
(16, 2, 1),
(17, 4, 1),
(17, 5, 1),
(17, 1, 1),
(17, 9, 1),
(17, 13, 1),
(18, 8, 1),
(18, 6, 1),
(19, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL COMMENT 'Id của danh mục mà sản phẩm thuộc về, là khóa ngoại liên kết với bảng categories',
  `title` varchar(100) DEFAULT NULL COMMENT 'Tên sản phẩm',
  `avatar` varchar(100) DEFAULT NULL COMMENT 'Tên file ảnh sản phẩm',
  `price` int(11) DEFAULT NULL COMMENT 'Giá sản phẩm',
  `sale` int(3) NOT NULL COMMENT 'Giảm giá',
  `amount` int(11) DEFAULT NULL COMMENT 'Số lượng sản phẩm trong kho',
  `summary` varchar(100) DEFAULT NULL COMMENT 'Mô tả ngắn cho sản phẩm',
  `content` text DEFAULT NULL COMMENT 'Mô tả chi tiết cho sản phẩm',
  `status` tinyint(3) DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `seo_title` varchar(100) DEFAULT NULL COMMENT 'Từ khóa seo cho title',
  `seo_description` varchar(100) DEFAULT NULL COMMENT 'Từ khóa seo cho phần mô tả',
  `seo_keywords` varchar(100) DEFAULT NULL COMMENT 'Các từ khóa seo',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `title`, `avatar`, `price`, `sale`, `amount`, `summary`, `content`, `status`, `seo_title`, `seo_description`, `seo_keywords`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hognose Snake', '1598453550-product-hognoseSnake.jpg', 3500000, 0, 3, 'Hognose snake - Rắn mũi hếch : ', '<p><strong>-&nbsp;</strong>Hognose sở hữu 1 v&ugrave;ng ph&acirc;n bố cực rộng, ch&uacute;ng nằm rải r&aacute;c suốt từ&nbsp;Nam Canada qua trung t&acirc;m Hoa Kỳ, bao gồm Arizona, New Mexico, Texas v&agrave; k&eacute;o d&agrave;i sang tận ph&iacute;a bắc Mexico</p>\r\n\r\n<p>- Nhiệt độ n&ecirc;n được cung cấp v&agrave; đảm bảo để duy tr&igrave; trạng th&aacute;i tốt nhất cho ch&uacute; rắn của bạn, với 1 chuồng nu&ocirc;i ti&ecirc;u chuẩn, h&atilde;y setup 1 tấm sưởi&nbsp;<a href=\"http://vietpetgarden.com/phu-kien-bo-tro-2-1-261177.html\">Heat Pad&nbsp;</a>&nbsp;v&agrave; 1 đ&egrave;n cung cấp &aacute;nh s&aacute;ng, nhiệt độ th&iacute;ch hợp tại điểm sưởi cần phải đạt 32 độ C v&agrave; c&aacute;c điểm m&aacute;t c&ograve;n lại trong chuồng phải đạt 21 độ C. khi cung cấp &aacute;nh s&aacute;ng, h&atilde;y đảm bảo 14-16h 1 ng&agrave;y v&agrave;o c&aacute;c ng&agrave;y m&ugrave;a xu&acirc;n v&agrave; m&ugrave;a h&egrave;, với m&ugrave;a thu v&agrave; m&ugrave;a đ&ocirc;ng, cho ch&uacute;ng khoảng 10h 1 ng&agrave;y l&agrave; đủ. C&aacute;c loại&nbsp;<a href=\"http://vietpetgarden.com/den-chuyen-dung-danh-cho-bo-sat-2-1-261019.html\">đ&egrave;n sưởi chuy&ecirc;n dụng</a>&nbsp;n&ecirc;n được ưu ti&ecirc;n do &aacute;nh s&aacute;ng từ ch&uacute;ng an to&agrave;n đối với b&ograve; s&aacute;t v&agrave; tr&aacute;nh c&aacute;c hiện tượng hỏng mắt - mắt k&eacute;m do tia s&aacute;ng kh&ocirc;ng chuẩn từ c&aacute;c đ&egrave;n chiếu s&aacute;ng th&ocirc;ng thường.<br />\r\n- Hognose trong tự nhi&ecirc;n c&oacute; 1 khẩu phần ăn đa dạng bao gồm nhiều loại động vật gặm nhấm nhỏ , trứng c&aacute;c lo&agrave;i l&agrave;m tổ tr&ecirc;n mặt đất, tuy nhi&ecirc;n trong m&ocirc;i trường nu&ocirc;i nhốt, hognose sẵn s&agrave;ng ăn chuột nhỏ v&agrave; pinky, ch&uacute;ng chấp nhận thực đơn n&agrave;y mỗi tuần 1-2 lần, nếu cho ăn chuột to, h&atilde;y nhớ l&agrave;m chết chuột trước khi cho ăn, tr&aacute;nh chuột l&agrave;m bị thương rắn. trong chuồng n&ecirc;n c&oacute; th&ecirc;m khay nước nhỏ, gi&uacute;p rắn c&oacute; thể uống nước li&ecirc;n tục m&agrave; kh&ocirc;ng bị kh&aacute;t. C&ugrave;ng với đ&oacute;, 1 chất l&oacute;t chuồng tốt cũng l&agrave; điều bắt buộc,<a href=\"http://vietpetgarden.com/lot-nen-chuyen-dung-cho-bo-sat-canh-2-1-261022.html\">&nbsp;Aspen bedding</a>&nbsp;l&agrave; lựa chọn h&agrave;ng đầu cho trăn rắn, với nhiều đặc t&iacute;nh ph&ugrave; hợp v&agrave; dễ dọn dẹp.</p>\r\n', 1, NULL, NULL, NULL, '2020-08-26 14:52:30', NULL),
(2, 1, 'Mexican black kingsnake', '1598453881-product-black-king.jpg', 5000000, 0, 2, 'Rắn Vua Mexican Black King Snake (Không Độc)', '<p>- Rắn vua mexican black king snake l&agrave; lo&agrave;i rắn kh&ocirc;ng độc nhưng mang h&igrave;nh h&agrave;i m&agrave;u sắc của 1 chiến binh. Thực tế ch&uacute;ng đến từ Hoa Kỳ. K&iacute;ch thước lo&agrave;i n&agrave;y kh&ocirc;ng khiến ta hoảng sợ.</p>\r\n\r\n<p>-&nbsp;Ch&uacute;ng c&oacute; k&iacute;ch thước rất l&yacute; tưởng. V&ograve;ng bụng = 2/3 cổ tay người trưởng th&agrave;nh. Chiều d&agrave;i của n&oacute; cực kỳ hấp dẫn. Khiến cho ai cũng c&oacute; thể nu&ocirc;i được. Chỉ từ 1m20 đến 1m50 m&agrave; th&ocirc;i. Tr&ecirc;n ảnh l&agrave; ch&uacute; rắn MBK 4 năm tuổi. Ch&uacute;ng đến từ sa mạc Sonora v&agrave; Sinaloa, Mexico, ph&iacute;a đ&ocirc;ng nam Arizona ở Hoa Kỳ.</p>\r\n\r\n<p>- Giống như hầu hết c&aacute;c d&ograve;ng rắn vua kh&aacute;c. MBK ngo&agrave;i tự nhi&ecirc;n đều th&iacute;ch những con mồi thon d&agrave;i, c&oacute; cơ quan sinh dục như chuột, chim, thằn lằn v&agrave; rắn nhỏ kh&aacute;c. Nhưng ở m&ocirc;i trường nh&acirc;n tạo, MBK chỉ được cho ăn chuột bạch. Bởi thức ăn hoang d&atilde; l&agrave; tr&ugrave;m k&yacute; sinh khiến cho ch&uacute; rắn vua black king sẽ bị bệnh. Biểu hiện l&agrave; những vết nổi tr&ecirc;n da của MBK.</p>\r\n\r\n<p>- Về phần cho ăn. Đầu ti&ecirc;n ch&uacute;ng cắn con mồi, sau đ&oacute; quấn v&agrave;i cuộn d&acirc;y quanh n&oacute; v&agrave; co thắt lại cho đến khi n&oacute; bị ngừng tim hoặc ngừng thở. Rồi bắt đầu nuốt phần đầu con mồi. Ch&uacute;ng kh&ocirc;ng c&oacute; độc v&agrave; kh&ocirc;ng l&agrave;m hại tới con người.</p>\r\n', 1, NULL, NULL, NULL, '2020-08-26 14:58:01', NULL),
(3, 1, 'Corn Snake', '1598454469-product-corn-snake.jpg', 900000, 0, 5, 'Rắn ngô - Corn Snake', '<p>-&nbsp;Rắn ng&ocirc;&nbsp;&nbsp;thanh mảnh với chiều d&agrave;i 24-72 inches (61-182 cm). Ch&uacute;ng thường m&agrave;u cam hoặc m&agrave;u v&agrave;ng n&acirc;u, đen v&agrave; c&oacute; mảng m&agrave;u đỏ xuống giữa lưng. Tr&ecirc;n bụng được lu&acirc;n phi&ecirc;n bằng c&aacute;c hoa văn m&agrave;u đen v&agrave; trắng, giống như một b&agrave;n cờ vua.</p>\r\n\r\n<p>-&nbsp;T&iacute;nh t&igrave;nh:Rắn ng&ocirc;<a href=\"http://vietpetgarden.com/corn-snake-1.html\">&nbsp;</a>rất hiền v&agrave; ngoan ngo&atilde;n, dễ thuần h&oacute;a. Ch&uacute;ng rất t&ograve; m&ograve; mọi thứ xung quanh v&agrave; hoạt động t&iacute;ch cực để &quot;t&igrave;m hiểu&quot;. V&igrave; vậy bạn sẽ rất th&iacute;ch th&uacute; khi xem ch&uacute;ng b&ograve; quanh hồ để xem mọi thứ.<strong>&nbsp;Corn Snake</strong>&nbsp;rất &iacute;t khi cắn, v&agrave; rất an to&agrave;n cho trẻ em.</p>\r\n\r\n<p>-&nbsp;Để&nbsp;chăm s&oacute;c cho&nbsp;<strong>rắn ng&ocirc;&nbsp;Corn Snake</strong>, bạn kh&ocirc;ng cần phải&nbsp;tốn nhiều thời gian m&agrave; vẫn đ&aacute;p ứng đủ mọi nhu cầu của n&oacute;. Mỗi bữa ăn( ăn pinky or chuột l&ocirc;ng&nbsp;khi lớn )&nbsp;của&nbsp;<strong>Corn Snake</strong>&nbsp;c&aacute;ch nhau 5 đến 14 ng&agrave;y t&ugrave;y theo từng size. Bạn c&oacute; thể l&agrave;m vệ sinh tổng qu&aacute;t chuồng nu&ocirc;i của ch&uacute;ng v&agrave;i tuần 1 lần, nhưng nhớ dọn ph&acirc;n thường xuy&ecirc;n nh&eacute;.</p>\r\n\r\n<p>- N&ecirc;n thay ch&eacute;n nước cho ch&uacute;ng hằng hoặc 2 ng&agrave;y 1 lần nếu bạn ko c&oacute; thời gian.<strong>&nbsp;Rắn Corn Snake</strong>&nbsp;l&agrave; 1 lo&agrave;i khỏe mạnh v&agrave; &iacute;t khi bị bệnh. C&aacute;c bệnh về hệ ti&ecirc;u h&oacute;a hoặc lột x&aacute;c c&oacute; vấn đề l&agrave; hiếm khi gặp ( Chỉ gặp khi mội trường nu&ocirc;i ko tốt v&agrave; nguồn thức ăn ko sạch sẽ) .</p>\r\n\r\n<p>- Tuổi thọ Corn<strong>&nbsp;Snake&nbsp;</strong>trung b&igrave;nh sống khoảng 10 mấy năm, thời gian n&agrave;y đủ để bạn c&oacute; thế chuyển từ con n&iacute;t sang người lớn, v&agrave; người lớn sang &ocirc;ng gi&agrave;.</p>\r\n', 1, NULL, NULL, NULL, '2020-08-26 15:07:49', NULL),
(4, 1, 'Milk Snake', '1598454962-product-mikeS.jpg', 3500000, 0, 2, 'Rắn Sữa Nelson Milk Snake', '<p><strong>- Apricot milk snake</strong>&nbsp;hay c&ograve;n c&oacute; t&ecirc;n gọi th&ocirc;ng thường l&agrave;<strong>&nbsp;rắn sữa</strong>&nbsp;, Apricot c&oacute; m&agrave;u sắc tuyệt vời giữa 3 m&agrave;u n&ocirc;̉i b&acirc;̣t. Mùa sắc sặc sỡ của loài&nbsp;<strong>rắn sữa milk snake</strong>&nbsp;&nbsp;vừa tạo cảm giác bắt mắt thích thú và cũng là đ&ecirc;̉ bảo v&ecirc;̣ chúng, vì các nhà khoa học đã chứng minh&nbsp;màu sắc này gi&ocirc;́ng với màu sắc của loài rắn đ&ocirc;̣c đ&ecirc;̉ khi&ecirc;́n kẻ thù sợ hãi. Ch&uacute;ng l&agrave; lo&agrave;i rắn sặc sỡ v&agrave; kh&ocirc;ng hề c&oacute; nọc độc, hiện đang được ưa chuộng tại nhiều quốc gia như một sinh vật cảnh độc đ&aacute;o.</p>\r\n\r\n<p>-&nbsp;Với t&iacute;nh c&aacute;ch hiền l&agrave;nh, kh&ocirc;ng có nọc đ&ocirc;̣c, sạch sẽ&nbsp;v&agrave; cũng ko chiếm qu&aacute; nhiều diện t&iacute;ch cũng như thời gian của chủ nh&acirc;n . N&oacute; thực sự l&agrave; 1 th&uacute; cưng tuyệt vời cho những ai y&ecirc;u các loài&nbsp;<strong>bò sát cảnh</strong>&nbsp;&quot; đ&ocirc;̣c - lạ&quot;.&nbsp;</p>\r\n\r\n<p>Thức ăn chủ y&ecirc;́u cho&nbsp;<strong>rắn sữa milk snake</strong>&nbsp;này là chu&ocirc;̣t, &ecirc;́ch nhái, thằn lằn... rắn non thì ăn các loại c&ocirc;n trùng, &ocirc;́c s&ecirc;n, chu&ocirc;̣t nhỏ , d&ecirc;́...</p>\r\n', 1, NULL, NULL, NULL, '2020-08-26 15:16:02', NULL),
(5, 2, 'Ball Python', '1598455224-product-ball-python.jpg', 1500000, 0, 6, 'Trăn Bóng Ball Normal', '<p>-&nbsp;Trăn b&oacute;ng normal nguy&ecirc;n bản kh&ocirc;ng lai tạp c&oacute; m&agrave;u sắc cơ bản. D&ograve;ng normal ball python l&agrave; d&ograve;ng d&agrave;nh cho người mới bắt đầu tập chơi trăn cảnh. Bởi đ&acirc;y l&agrave; d&ograve;ng cơ bản n&ecirc;n c&oacute; gi&aacute; thấp nhất.</p>\r\n\r\n<p>-&nbsp;C&acirc;n nặng tối đa 1 con khoảng 2kg v&agrave; d&agrave;i 1m20. Được rất nhiều bạn trẻ, đủ độ tuổi tham gia buổi SHOW n&agrave;y.</p>\r\n\r\n<p>-&nbsp;K&iacute;ch thước trưởng th&agrave;nh Ball: 1m20 ăn được chim sẻ.&nbsp;T&iacute;nh c&aacute;ch: BALL hiền l&agrave;nh.&nbsp;Dịch bệnh: Ball &iacute;t hơn v&igrave; sinh sản nh&acirc;n tạo, trăn đất nhiều ve ch&eacute;t. Nu&ocirc;i rồi sẽ thấy r&otilde;.Thức ăn: Ball ăn chuột bạch dễ kiếm v&agrave; sạch hơn. Đọc th&ecirc;m về chuột bạch</p>\r\n\r\n<p>-&nbsp;</p>\r\n', 1, NULL, NULL, NULL, '2020-08-26 15:20:24', NULL),
(6, 2, 'Red Tail Boa', '1598455824-product-redtail.jpg', 3000000, 0, 3, 'Red Tail Boa - Trăn cảnh lớn', '<p>- The&nbsp;<strong>Boa constrictor</strong>, c&ograve;n được gọi l&agrave;&nbsp;<strong>Boa đu&ocirc;i đỏ</strong>&nbsp;hay&nbsp;<strong>Boa chung</strong>, l&agrave; một lo&agrave;i răn&nbsp;lớn, kh&ocirc;ng độc, nặng, thường được giữ lại v&agrave; nu&ocirc;i trong điều kiện nu&ocirc;i nhốt.&nbsp;Boa constrictor l&agrave; một th&agrave;nh vi&ecirc;n của họ Boidae, được t&igrave;m thấy ở v&ugrave;ng nhiệt đới Nam Mỹ, cũng như một số đảo ở v&ugrave;ng&nbsp;<a href=\"https://en.wikipedia.org/wiki/Caribbean\">b</a>iển Caribe. Một yếu của bộ sưu tập tư nh&acirc;n v&agrave; hiển thị c&ocirc;ng cộng, mẫu m&agrave;u của n&oacute; l&agrave; rất biến nhưng đặc biệt.</p>\r\n\r\n<p>-&nbsp;&nbsp;Vết cắn của ch&uacute;ng c&oacute; thể g&acirc;y đau đớn, đặc biệt l&agrave; từ c&aacute;c lo&agrave;i rắn lớn, nhưng hiếm khi nguy hiểm cho con người.&nbsp;Con mồi của ch&uacute;ng bao gồm nhiều lo&agrave;i động vật c&oacute; v&uacute; v&agrave; chim nhỏ c&oacute; k&iacute;ch thước trung b&igrave;nh.&nbsp;phần lớn chế độ ăn uống của ch&uacute;ng bao gồm c&aacute;c lo&agrave;i gặm nhấm, nhưng thằn lằn lớn v&agrave; động vật c&oacute; v&uacute; lớn như lo&agrave;i ocelot&nbsp;cũng được b&aacute;o c&aacute;o l&agrave; đ&atilde; được ti&ecirc;u thụ.&nbsp;c&aacute;c lo&agrave;i trăn trẻ ăn chuột nhỏ, chim, dơi, thằn lằn&nbsp;v&agrave; động vật lưỡng cư. &nbsp;Tuổi thọ của ch&uacute;ng c&oacute; thể l&ecirc;n tới&nbsp;20 đến 30 năm.</p>\r\n', 1, NULL, NULL, NULL, '2020-08-26 15:30:24', NULL),
(8, 2, 'White Lipped Python', '1598456464-product-white-lipped.jpeg', 6500000, 0, 1, 'White Lipped Python - Trăn miệng trắng', '<p>-&nbsp;Ch&uacute;ng thường xuất hiện ở đảo quốc New Guinea v&agrave; một v&agrave;i h&ograve;n đảo xung quanh, hoặc đảo Biak miền Đ&ocirc;ng Indonesia.</p>\r\n\r\n<p>-&nbsp;K&iacute;ch thước của ch&uacute;ng kh&ocirc;ng cố định, n&oacute; thay đổi giữa c&aacute;c lo&agrave;i trong c&aacute;c m&ocirc;i trường sống kh&aacute;c nhau, v&iacute; dụ lo&agrave;i ở ph&iacute;a Nam c&oacute; độ d&agrave;i c&oacute; thể l&ecirc;n tới 3 met, th&igrave; lo&agrave;i ở ph&iacute;a Bắc lại chỉ đạt tới độ d&agrave;i trung b&igrave;nh khoảng 2.13 met.</p>\r\n\r\n<p>-&nbsp;Trăn miệng trắng thường ngủ ng&agrave;y v&agrave; chỉ bắt đầu đi săn v&agrave;o l&uacute;c ho&agrave;ng h&ocirc;n. Kh&ocirc;ng giống c&aacute;c lo&agrave;i trăn kh&aacute;c chờ đợi để tập k&iacute;ch, trăn miệng trắng lại chủ động t&igrave;m kiếm v&agrave; tấn c&ocirc;ng con mồi của ch&uacute;ng.</p>\r\n\r\n<p>-&nbsp;M&agrave;u sắc của ch&uacute;ng thực ra cũng kh&ocirc;ng cố định, ch&uacute;ng hoặc c&oacute; m&agrave;u n&acirc;u nhạt v&agrave; t&iacute;m loang v&agrave;ng nhạt ở mặt dưới, hay m&agrave;u x&aacute;m đen v&agrave; xanh dương loang x&aacute;m ở phần bụng. Ngoại trừ lo&agrave;i trăn miệng trắng sống ở ph&iacute;a Bắc c&oacute; một v&agrave;i vết đốm ở phần sau mắt th&igrave; ch&uacute;ng ho&agrave;n to&agrave;n kh&ocirc;ng c&oacute; một khu&ocirc;n mẫu n&agrave;o.</p>\r\n\r\n<p>-&nbsp;Khi ch&uacute;ng trưởng th&agrave;nh, da của ch&uacute;ng sẽ c&oacute; m&agrave;u &aacute;nh kim rất đẹp dưới &aacute;nh mặt trời, điều n&agrave;y tương tự với lo&agrave;i trăn cầu vồng Nam Mỹ ở Brazil.</p>\r\n', 1, NULL, NULL, NULL, '2020-08-26 15:41:04', NULL),
(9, 2, 'Green Tree Python', '1598456873-product-pythongreen.jpg', 4000000, 0, 2, 'Trăn cây Green Tree Python', '<p>-&nbsp;Trăn c&acirc;y xanh được biết đến như 1 trong số c&aacute;c ng&ocirc;i sao trong giới b&ograve; s&aacute;t cảnh, n&oacute;i về ngoại h&igrave;nh, ch&uacute;ng c&oacute; một vẻ đẹp kh&oacute; cưỡng lại, với m&agrave;u sắc thay đổi theo từng thời điểm của sự ph&aacute;t triển, từ nhỏ tới lớn, m&agrave;u sắc được chuyển đổi từ v&agrave;ng hoặc n&acirc;u đỏ, n&acirc;u đen. Khi bạn được sở hữu một ch&uacute; Trăn C&acirc;y Xanh, điều đ&oacute; đồng nghĩa với việc đ&atilde; được tiếp cận với 1 trong số c&aacute;c lo&agrave;i trăn th&uacute; vị nhất thế giới, k&iacute;ch thước kh&aacute; nhỏ gọn, m&agrave;u sắc đẹp, cơ thể với những đường cong tuyệt mỹ đem lại cho người nh&igrave;n cảm gi&aacute;c cuốn h&uacute;t kh&oacute; tả&hellip;</p>\r\n\r\n<p>-&nbsp;Chăm s&oacute;c Trăn C&acirc;y đ&ocirc;i khi l&agrave; 1 canh bạc h&ecirc;n xui m&agrave; bạn kh&ocirc;ng bao giờ thua, đ&ocirc;i khi ch&uacute;ng sẽ giữ lại m&agrave;u sắc l&uacute;c nhỏ, điều đ&oacute; l&agrave;m ch&uacute;ng trở l&ecirc;n đặc biệt, gi&aacute; trị cũng tăng gấp v&agrave;i chục lần</p>\r\n\r\n<p>-&nbsp;Chu kỳ ăn của đa số trăn rắn l&agrave; khoảng 5-6 ng&agrave;y 1 lần, v&agrave; Trăn c&acirc;y cũng kh&ocirc;ng phải ngoại lệ, về cơ bản, qu&aacute; tr&igrave;nh trao đổi chất chậm c&ugrave;ng với tần suất hoạt động chậm khiến ch&uacute;ng kh&ocirc;ng qu&aacute; cần thức ăn li&ecirc;n tục, cho ăn li&ecirc;n tục c&oacute; thể dẫn đến c&aacute;c biến chứng nguy hiểm như n&ocirc;n ọe do đầy bụng hoặc b&eacute;o ph&igrave; do dư thừa năng lượng. ch&iacute;nh v&igrave; vậy h&atilde;y c&acirc;n đối khẩu phần ăn hợp l&yacute;, điều đ&oacute; gi&uacute;p ch&uacute; Trăn C&acirc;y của bạn c&oacute; được 1 body dễ thương v&agrave; tr&aacute;nh được c&aacute;c bệnh thường gặp do ăn nhiều!!</p>\r\n\r\n<p>-&nbsp;</p>\r\n\r\n<p>Green tree python vốn dĩ kh&ocirc;ng dữ tợn như nhiều người vẫn lầm tưởng, c&aacute;ch chơi với ch&uacute;ng kh&aacute; đơn giản, miễn l&agrave; bạn kh&ocirc;ng l&agrave;m n&oacute; nổi giận hoặc stress. h&atilde;y từ từ tiếp cận v&agrave; kh&ocirc;ng được ph&eacute;p l&agrave;m n&oacute; giật m&igrave;nh, sau đ&acirc;y l&agrave; 1 v&agrave;i lưu &yacute; nhỏ khi chơi với Green Tree Python :</p>\r\n\r\n<p>- Kh&ocirc;ng bao giờ được nhử trăn nếu bạn kh&ocirc;ng muốn n&oacute; bất ngờ tấn c&ocirc;ng lại bạn!</p>\r\n\r\n<p>- Chuồng nu&ocirc;i n&ecirc;n được thiết kế l&agrave; bể k&iacute;nh lắp lưới, gi&uacute;p tho&aacute;t ẩm hoặc bổ sung ẩm tốt hơn</p>\r\n\r\n<p>- Khi trăn ngoảnh mặt v&agrave;o cửa k&iacute;nh th&igrave; d&ugrave;ng panh - kẹp đưa chuột đến trước mặt(nhiều trường hợp phải l&agrave;m chết chuột trước khi cho ăn v&igrave; chuột c&oacute; thể l&agrave;m trăn của bạn giật m&igrave;nh, sợ ko muốn ăn nữa, trường hợp n&agrave;y rất &iacute;t khi xảy ra với trăn c&acirc;y ), c&ograve;n nếu trăn ngoảnh mặt v&agrave;o trong th&igrave; th&ocirc;i nh&eacute; đừng chạm v&agrave;o em n&oacute; , cứ vứt con chuột l&ecirc;n c&agrave;nh c&acirc;y em n&oacute; đang nằm l&agrave; được</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1, NULL, NULL, NULL, '2020-08-26 15:47:53', NULL),
(10, 3, 'Sulcata  Tortoise', '1598457046-product-sultaca.jpg', 1500000, 0, 3, 'Rùa Vàng Châu Phi - Sulcata Tortoise', '<p><strong>- L&agrave; lo&agrave;i r&ugrave;a lớn thứ 3 tr&ecirc;n thế giới , R&ugrave;a n&uacute;i v&agrave;ng Ch&acirc;u Phi ( Sulcata Tortoise ) c&oacute; k&iacute;ch thước tối đa l&ecirc;n đến 80cm khi đạt đổ tuổi trưởng th&agrave;nh . Rất th&ocirc;ng minh&nbsp;</strong><br />\r\n- R&ugrave;a Sulcata con c&oacute; chiều d&agrave;i từ 3,2-5cm (chiều d&agrave;i mai). Tốc độ tăng trưởng của r&ugrave;a Sulcata biến đổi hơn bất kỳ c&aacute;c loại r&ugrave;a n&agrave;o kh&aacute;c. Một con r&ugrave;a d&agrave;i 25 cm c&oacute; thể mới 3 tuổi nhưng cũng c&oacute; thể ch&uacute;ng đ&atilde; được 10 năm tuổi. Nhiều con Sulcata trưởng th&agrave;nh c&oacute; thể nặng hơn 45kg..&nbsp;</p>\r\n\r\n<p>-&nbsp;R&ugrave;a Sulcata rất ph&agrave;m ăn, hiếm khi n&agrave;o ch&uacute;ng từ chối một bữa ăn. Với những con r&ugrave;a trưởng th&agrave;nh, chế độ ăn uống chủ yếu nhất l&agrave; cỏ v&agrave; l&aacute; kh&aacute;c nhau, tương tự như chế độ ăn trong tự nhi&ecirc;n của ch&uacute;ng. Ch&uacute;ng sẽ ăn bất k&igrave; c&aacute;c loại cỏ, l&aacute; d&acirc;u, l&aacute; nho, c&acirc;u d&acirc;m bụt v&agrave; hoa. Với k&iacute;ch thước lớn, hầu hết những con trưởng th&agrave;nh đều ăn cỏ kh&ocirc;, những con b&eacute; hoặc đang ph&aacute;t triển c&oacute; thế kh&oacute; ăn cỏ kh&ocirc; v&agrave; h&agrave;m của ch&uacute;ng chưa đủ khỏe. Những ch&uacute; r&ugrave;a nhỏ n&ecirc;n ăn đầy đủ c&aacute;c loại rau dinh dưỡng lớn nhu : Rau muống - cải ngọt - b&iacute; đỏ &nbsp;để c&aacute;c b&eacute; ph&aacute;t triển tốt nhất</p>\r\n\r\n<p>- Để c&oacute; sức khỏe tốt nhất cho r&ugrave;a Sulcata của bạn, n&ecirc;n cho ch&uacute;ng phơi với &aacute;nh s&aacute;ng mặt trời, giữ đ&ocirc;i mắt ch&uacute;ng lu&ocirc;n sạch sẽ, hoặc bạn mua ch&uacute;ng ở những nơi uy t&iacute;n v&agrave; đảm bảo. Những con r&ugrave;a c&oacute; thể gặp những bệnh phổ biến ở c&aacute;c lo&agrave;i b&ograve; s&aacute;t, tuy nhi&ecirc;n bệnh nhiễm tr&ugrave;ng đường h&ocirc; hấp l&agrave; phổ biến nhất ở ch&uacute;ng. N&ecirc;n tắm nước ấm h&agrave;ng ng&agrave;y</p>\r\n', 1, NULL, NULL, NULL, '2020-08-26 15:50:46', NULL),
(11, 3, 'Indian Star Tortoise', '1598457410-product-indian-star.jpg', 4500000, 0, 1, 'Rùa sao Ấn Độ - Indian Star Tortoise', '<p>-&nbsp;Ở k&iacute;ch thước trưởng th&agrave;nh l&agrave; 3 4 năm ch&uacute;ng sẽ đạt được k&iacute;ch thước khoảng 10 12cm. Ở k&iacute;ch thước tối đa của n&oacute; con c&aacute;i đạt ~18cm, con đực chỉ khoảng 13cm. Ri&ecirc;ng ph&acirc;n v&ugrave;ng Sri Lanca th&igrave; r&ugrave;a sao Sri Lanca lại đạt ~25cm (con c&aacute;i), con đực khoảng 20cm. T&iacute;nh k&iacute;ch thước r&ugrave;a sao bằng c&aacute;ch do dưới yếm.&nbsp;Ch&uacute;ng mới nở c&oacute; k&iacute;ch thước 3cm. Một năm tuổi đạt 6cm. Ba năm tuổi đạt 9cm. T&aacute;m năm tuổi đạt k&iacute;ch thước tối đa của n&oacute;. Ở ảnh tr&ecirc;n l&agrave; loại 8 th&aacute;ng tuổi, rất l&agrave; cứng c&aacute;p (tầm ~5cm).</p>\r\n\r\n<p>- Thức ăn chủ yếu của r&ugrave;a sao Ấn Độ l&agrave; rau củ quả n&ecirc;n rất dễ nu&ocirc;i, kh&ocirc;ng cần tốn qu&aacute; nhiều thời gian, rất ph&ugrave; hợp cho người c&oacute; &iacute;t thời gian m&agrave; vẫn muốn c&oacute; 1 ch&uacute; pet đẹp</p>\r\n', 1, NULL, NULL, NULL, '2020-08-26 15:56:50', NULL),
(12, 3, 'Leopard Tortoise', '1598457608-product-leopard-tortoise.jpg', 3000000, 0, 2, 'Rùa Da Báo - Leopard tortoise', '<p>-&nbsp;R&ugrave;a Da B&aacute;o - Leopard tortoise&nbsp;c&oacute; t&ecirc;n thường gọi l&agrave;&nbsp;Leopard tortoise, t&ecirc;n khoa học l&agrave;&nbsp;Stigmochelys pardalis.</p>\r\n\r\n<p>- Size: Chiều d&agrave;i cơ thể của con trưởng th&agrave;nh trung b&igrave;nh l&agrave; 46cm v&agrave; nặng 18kg, khi lớn hết cỡ mai của ch&uacute;ng sẽ đạt tới 61cm, <strong>Tuổi thọ:</strong>&nbsp;C&oacute; thể l&ecirc;n đến 100 năm.</p>\r\n\r\n<p>-&nbsp;Thức ăn:Rau quả c&aacute;c loại, tuy nhi&ecirc;n m&oacute;n kho&aacute;i khẩu của ch&uacute;ng trong tự nhi&ecirc;n l&agrave; l&aacute; v&agrave; tr&aacute;i của lo&agrave;i xương rồng prickly pear v&agrave; c&aacute;c loại c&acirc;y thuộc họ c&acirc;y nha đam v&agrave; c&acirc;y kế. Trong m&ocirc;i trường nu&ocirc;i nhốt thực đơn tốt nhất cho ch&uacute;ng l&agrave; c&aacute;c loại rau l&aacute; xanh đậm như cải xoăn, c&acirc;y cải (c&acirc;y m&agrave; người ta thu họach củ cải chứ ko phải bắp cải nh&eacute;) v&agrave; l&aacute; nho. Tuyệt đối kh&ocirc;ng n&ecirc;n cho ăn tr&aacute;i c&acirc;y, c&oacute; thể bổ sung canxi để mai r&ugrave;a giữ độ bền.</p>\r\n\r\n<p>-&nbsp;Nu&ocirc;i nhốt: Leopard tortoise cần 1 khu vực sinh sống rộng r&atilde;i v&agrave; nếu như m&ocirc;i trường th&iacute;ch hợp th&igrave; tốt nhất n&ecirc;n nu&ocirc;i ch&uacute;ng ngo&agrave;i trời. Leopard tortoise l&agrave; lo&agrave;i sống ri&ecirc;ng lẻ n&ecirc;n nếu nu&ocirc;i chung tốt nhất c&aacute;c b&eacute; n&ecirc;n l&agrave;m 1 khu vực rộng r&atilde;i c&oacute; nhiều nơi tr&uacute; ẩn, điều m&agrave; c&aacute;c b&eacute; n&ecirc;n n&eacute; đi l&agrave; nu&ocirc;i chung c&aacute;c con đực, v&igrave; bản năng tranh gi&agrave;nh l&atilde;nh thổ v&agrave;&nbsp;gi&agrave;nh con c&aacute;i của ch&uacute;ng.</p>\r\n', 1, NULL, NULL, NULL, '2020-08-26 16:00:08', NULL),
(13, 4, 'Savannah Monitor', '1598458751-product-savannah.jpg', 1800000, 0, 5, 'Kỳ đà Savannah monitor', '<p>-&nbsp;Kỳ đ&agrave;&nbsp;Savannah monitor&nbsp;l&agrave; lo&agrave;i b&ograve; s&aacute;t ăn c&ocirc;n tr&ugrave;ng v&agrave; thịt . Nhưng ch&uacute;ng lại c&oacute; 1 vẻ ngo&agrave;i v&ocirc; c&ugrave;ng đ&aacute;ng y&ecirc;u v&agrave; ngốc nghếch . L&agrave; 1 trong những d&ograve;ng b&ograve; s&aacute;t được người chơi ưa chuộng&nbsp;</p>\r\n\r\n<p>-&nbsp;&nbsp;Kỳ đ&agrave; Savannah monitor được t&igrave;m thấy ở thảo nguy&ecirc;n, hoang mạc v&agrave; đồng cỏ của trung t&acirc;m Nam Phi. Ch&uacute;ng l&agrave; những thợ săn mồi tuyệt hảo v&agrave;o ban ng&agrave;y với những con mồi l&agrave; c&ocirc;n tr&ugrave;ng, chim, trứng, những lo&agrave;i gặm nhấm v&agrave; cả những lo&agrave;i b&ograve; s&aacute;t kh&aacute;c&hellip;</p>\r\n\r\n<p>-&nbsp;Tổng chiều d&agrave;i khi max size l&agrave; 2,5-3 feet ( Khoảng 80-90cm ) . V&agrave; c&oacute; những c&aacute; thể c&oacute; thể b&eacute; hơn hoặc lớn&nbsp;hơn . Th&ecirc;m nữa l&agrave; da của Kỳ đ&agrave; Savannah monitor rất d&agrave;y&hellip;</p>\r\n\r\n<p>Với sự chăm s&oacute;c ho&agrave;n hảo từ những người chủ tốt :X Savan c&oacute; thể sống tr&ecirc;n 15 năm. Trung b&igrave;nh cũng phải sống được tầm 15-20 năm.&nbsp;</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;D&ugrave; sống ở m&ocirc;i trường hoang mạc, v&agrave; c&aacute;c v&ugrave;ng thảo nguy&ecirc;n kh&ocirc; cằn ở nam phi, nhưng savannah monitor lại cần kh&aacute; nhiều nước v&agrave; th&iacute;ch ng&acirc;m m&igrave;nh trong c&aacute;c khay nước lớn nhằm cung cấp độ ẩm cho bề mặt da. N&ecirc;n duy tr&igrave; độ ẩm trong chuồng khoảng 50 - 60% ở điểm m&aacute;t trong chuồng ( c&oacute; thể bỏ qua độ ẩm tại điểm sưởi ) bạn cũng n&ecirc;n cung cấp th&ecirc;m 1 hang tr&uacute; hoặc sử dụng c&aacute;c loại l&oacute;t nền chuy&ecirc;n dụng c&oacute; thể đ&agrave;o bới, tuy nhi&ecirc;n ở Việt Nam thường kh&ocirc;ng c&oacute; điều kiện setup đủ độ d&agrave;y cho l&oacute;t để savannah đ&agrave;o bới tạo hang, ch&iacute;nh v&igrave; vậy hang tr&uacute; b&ograve; s&aacute;t được ph&aacute;t triển, với độ ẩm trong hang, n&ecirc;n duy tr&igrave; khoảng 70% để gi&uacute;p th&uacute; cưng của bạn cảm thấy thoải mấi với m&ocirc;i trường sống nh&acirc;n tạo.</p>\r\n\r\n<p>-&nbsp;Savan baby th&igrave; n&ecirc;n cho ăn super worm, wax worm, gi&aacute;n, dế ( c&aacute;c loại c&ocirc;n tr&ugrave;ng nhỏ ) . Tr&aacute;nh cho ăn chuột v&igrave; ch&uacute;ng rất nhiều chất b&eacute;o m&agrave; lại rất ngh&egrave;o n&agrave;n chất dinh dưỡng để cho c&aacute;c e ph&aacute;t triển b&igrave;nh thường.&nbsp;Khi size khoảng 50-60 th&igrave; c&oacute; thể cho ăn chuột. Tối đa l&agrave; 1-2 con 1 tuần.&nbsp;Với những con trưởng th&agrave;nh th&igrave; n&ecirc;n cho ăn nhiều c&ocirc;n tr&ugrave;ng như dế to, meal worm, gi&aacute;n khổng lồ malagagy. Thi thoảng h&atilde;y bổ sung ch&uacute;t thịt g&agrave; với trứng, đ&acirc;y l&agrave; 1 số loại thức ăn ch&iacute;nh của savan. Đừng q&ecirc;n bổ sung canxi v&agrave; vitamin thường xuy&ecirc;n để c&aacute;c b&eacute; ph&aacute;t triển b&igrave;nh thường nhất.</p>\r\n', 1, NULL, NULL, NULL, '2020-08-26 16:19:11', NULL),
(14, 4, 'Argentine Black and White Tegus', '1598458932-product-tengu.jpg', 6500000, 0, 4, 'Vốn thuộc dòng họ một chi bò sát lớn, Tegu Argentina được phân bố chủ yếu tại các nước Nam Mỹ, nơi c', '<p>-&nbsp;<strong>K&iacute;ch cỡ Tegu:&nbsp;</strong>Tegu Argentina trưởng th&agrave;nh c&oacute; thể đạt k&iacute;ch thước 150cm v&agrave; khoảng 7kg . Một con tegu trưởng th&agrave;nh c&oacute; thể d&agrave;i đến 1,5m, nặng h&agrave;ng chục kg.</p>\r\n\r\n<p><strong>-&nbsp;Tuổi thọ</strong>&nbsp;: Khoảng 20 năm</p>\r\n\r\n<p><strong>- Tập t&iacute;nh</strong>: Tegu Argentina l&agrave; lo&agrave;i sống ban ng&agrave;y . Nhiệt độ tại điểm sưởi th&iacute;ch hợp với tegu nhỏ l&agrave; 45 độ C , v&agrave; đối với 1 ch&uacute; Tegu trưởng th&agrave;nh c&oacute; thể đạt l&ecirc;n đến 50 độ C . Cần b&oacute;ng UVA sưởi v&agrave; UVB 5.0.&nbsp; Đ&atilde; c&oacute; những &yacute; kiến tr&aacute;i chiều về việc tổng hợp Vitamin D3 của Tegu . Lo&agrave;i ăn thịt c&oacute; khả năng tự tổng hợp D3 ch&uacute;ng cần.</p>\r\n\r\n<p>-&nbsp;<strong>Thức ăn:</strong>&nbsp;Tegu Argentina vốn l&agrave; những con vật rất ph&agrave;m ăn v&agrave; ăn kh&aacute; tạp, từ c&aacute;c loại&nbsp;thịt cho tới&nbsp;rau, củ quả v&agrave; giỏi leo tr&egrave;o.&nbsp;<br />\r\nNếu kh&ocirc;ng được gần gũi với con người thường xuy&ecirc;n, tegu c&oacute; thể sẽ trở n&ecirc;n kh&aacute; hung dữ. Với những điều th&uacute; vị từ Tegu Argentina th&igrave; ch&uacute;ng đ&atilde; tạo n&ecirc;n cơn sốt v&agrave; được kh&aacute; nhiều người t&igrave;m kiếm, đặt mua về l&agrave;m cảnh trong nh&agrave;.</p>\r\n', 1, NULL, NULL, NULL, '2020-08-26 16:22:12', NULL),
(15, 4, 'Black Throat Monitor', '1598463058-product-black-throat-monitor-2.jpg', 10000000, 0, 2, 'Black Throat Monitor - Kỳ Đà Cổ Đen', '<p>- Kỳ Đ&agrave; Cổ Đen Black Throat Monitor l&agrave; một lo&agrave;i kỳ đ&agrave; lớn c&oacute; t&iacute;nh kh&iacute; hiền l&agrave;nh n&ecirc;n được nhiều người y&ecirc;u th&iacute;ch nu&ocirc;i kỳ đ&agrave; cảnh&nbsp;chọn l&agrave;m lo&agrave;i th&uacute; cưng nu&ocirc;i trong nh&agrave;.</p>\r\n\r\n<p>-&nbsp;<strong>K&iacute;ch thước:</strong>&nbsp;2m1 khi ở tuổi trưởng th&agrave;nh v&agrave; được chăm s&oacute;c tốt. Con được sẽ lớn hơn con c&aacute;i 1 ch&uacute;t.</p>\r\n\r\n<p><strong>- C&acirc;n nặng:</strong>&nbsp;27kg</p>\r\n\r\n<p><strong>- Nguồn gốc:</strong>&nbsp;Lo&agrave;i kỳ đ&agrave; n&agrave;y c&oacute; nguồn gốc từ&nbsp;Tanzania một quốc gia ở v&ugrave;ng Đ&ocirc;ng Phi.</p>\r\n\r\n<p><strong>- Đặc điểm:</strong>&nbsp;Ch&uacute;ng c&oacute; một chiếc cổ d&agrave;i, đu&ocirc;i khỏe mạnh, ch&acirc;n tay v&agrave; m&oacute;ng vuốt ph&aacute;t triển tốt. Kỳ đ&agrave; cổ đen ch&uacute;ng c&oacute; c&aacute;i họng v&agrave; miệng lồi ra b&ecirc;n ngo&agrave;i, lưỡi chẻ m&agrave;u hồng hoặc m&agrave;u xanh. Vảy c&oacute; m&agrave;u n&acirc;u x&aacute;m c&oacute; đốm v&agrave;ng hoặc trắng.</p>\r\n\r\n<p><strong>- M&ocirc;i trường s&iacute;nh sống:</strong>&nbsp;Ch&uacute;ng sống tại c&aacute;c khu vực thảo nguy&ecirc;n, khu vực cận xa mạc, rừng nhiệt đới v&agrave; rừng rậm.</p>\r\n\r\n<p><strong>- Chế độ ăn uống:</strong>&nbsp;Ch&uacute;ng l&agrave; lo&agrave;i động vật ăn thịt n&ecirc;n khi nu&ocirc;i nhốt bạn c&oacute; thể cho ch&uacute;ng ăn chuột, rắn, thằn lằn, c&aacute;, chim, gi&aacute;n, trứng, c&ocirc;n tr&ugrave;ng.</p>\r\n\r\n<p><strong>- Nhiệt độ &amp; &aacute;nh s&aacute;ng:</strong>&nbsp;Giống như c&aacute;c lo&agrave;i kỳ đ&agrave; kh&aacute;c th&igrave;&nbsp;Kỳ Đ&agrave; Cổ Đen Black Throat Monitor sống trong m&ocirc;i trường nu&ocirc;i nhốt cũng cần c&oacute; đ&egrave;n sưởi v&agrave; đ&egrave;n UVB để gi&uacute;p ch&uacute;ng hấp thụ chất dinh dưỡng.</p>\r\n', 1, NULL, NULL, NULL, '2020-08-26 17:30:58', NULL),
(16, 4, 'Nile Monitor', '1598463317-product-nile.jpg', 3000000, 30, 2, '', '<p>- Trong tự nhi&ecirc;n, Nile monitor kh&aacute; dữ dằn v&agrave; c&oacute; cuộc sống kh&eacute;p k&iacute;n, tuy nhi&ecirc;n n&oacute; sẽ l&agrave; người bạn tuyệt vời nếu được chăm s&oacute;c v&agrave; nu&ocirc;i dưỡng trong m&ocirc;i trường nh&acirc;n tạo, yếu tố cốt l&otilde;i l&agrave; thuần h&oacute;a được con qu&aacute;i vật n&agrave;y</p>\r\n\r\n<p>-&nbsp;&nbsp;Nile monitor ph&acirc;n bố khắp v&ugrave;ng hạ Sahara , dọc miền đ&ocirc;ng v&agrave; bắc phi, ch&uacute;ng sống gần nước v&agrave; hầu như kh&ocirc;ng bao giờ bạn thấy ch&uacute;ng đi qu&aacute; xa nguồn nước.</p>\r\n\r\n<p>-&nbsp;Nile Monitor l&agrave; lo&agrave;i kỳ đ&agrave; c&oacute; k&iacute;ch thước lớn nhất lục địa ch&acirc;u phi, những con thằn lằn n&agrave;y l&agrave; lo&agrave;i bơi lội tuyệt vời, ch&uacute;ng c&oacute; khả năng n&iacute;n thở h&agrave;ng giờ dưới nước, ch&uacute;ng kh&aacute; th&iacute;ch nước, v&igrave; vậy, h&atilde;y đảm bảo cung cấp 1 m&aacute;ng nước với chiều d&agrave;i đủ cho ch&uacute;ng ng&acirc;m m&igrave;nh ho&agrave;n to&agrave;n. Nile monitor l&agrave; lo&agrave;i c&oacute; phạm vi ph&acirc;n bố kh&aacute; rộng, ch&uacute;ng sinh sống v&agrave; ph&aacute;t triển dọc xuy&ecirc;n suốt miền đ&ocirc;ng v&agrave; bắc phi.</p>\r\n\r\n<p>-&nbsp;Khẩu phần ăn của Nile cũng n&ecirc;n được ch&uacute; &yacute;, do đa số c&aacute;c lo&agrave;i kỳ đ&agrave; đều kh&ocirc;ng thể sống khỏe mạnh với c&aacute;c loại thịt từ động vật c&oacute; v&uacute; lớn ( lợn , b&ograve; &hellip; ) n&ecirc;n h&atilde;y cung cấp đa dạng thức ăn, l&uacute;c nhỏ n&ecirc;n l&agrave; s&acirc;u, dế, c&aacute; nhỏ, tới khi đủ k&iacute;ch thước h&atilde;y chuyển sang g&agrave;, c&aacute; lớn hoặc chim ch&oacute;c c&aacute;c loại, ưu ti&ecirc;n c&aacute; v&agrave; c&aacute;c lo&agrave;i lưỡng cư. Tuy nhi&ecirc;n trong đa số lưỡng cư đều c&oacute; k&yacute; sinh v&agrave; c&aacute;c loại s&aacute;n n&ecirc;n h&atilde;y ch&uacute; &yacute; mỗi v&agrave;i th&aacute;ng 1 lần tẩy k&yacute; sinh tr&ugrave;ng. Nile monitor cũng như mọi loại b&ograve; s&aacute;t kh&aacute;c, ch&uacute;ng kh&ocirc;ng c&oacute; th&acirc;n nhiệt ổn định n&ecirc;n vẫn cần nhiệt độ b&ecirc;n ngo&agrave;i m&ocirc;i trường, cụ thể, trong chuồng nu&ocirc;i cần c&oacute; 1 điểm sưởi v&agrave; điểm m&aacute;t l&agrave; phần c&ograve;n lại của chuồng nu&ocirc;i, nơi đ&egrave;n sưởi kh&ocirc;ng chiếu tới, điểm sưởi của Nile cần đạt khoảng 35 độ C v&agrave; điểm m&aacute;t nhất n&ecirc;n duy tr&igrave; trong khoảng 28 độ C. Do l&agrave; lo&agrave;i k&iacute;ch thước lớn, ch&uacute;ng cần nhiều đ&egrave;n sưởi c&ocirc;ng suất nhỏ khi trưởng th&agrave;nh, thay v&igrave; 1 đ&egrave;n sưởi c&ocirc;ng suất cao. điều n&agrave;y tr&aacute;nh cho pet t&igrave;nh trạng bỏng da do nhiệt độ đ&egrave;n sưởi qu&aacute; n&oacute;ng.</p>\r\n', 1, NULL, NULL, NULL, '2020-08-26 17:35:17', '2020-09-20 12:45:15'),
(17, 5, 'Repcal Tortoise Food – Thức ăn khô dành cho rùa cạn', '1598463565-product-Repcal-Tortoise-Food.jpg', 0, 0, 20, '', '<p>- Thực phẩm Rep-Cal Tortoise Food được c&aacute;c chuy&ecirc;n gia nu&ocirc;i&nbsp; r&ugrave;a cảnh đ&aacute;nh gi&aacute; l&agrave; một sản phẩm chất lượng cung cấp thực vật tự nhi&ecirc;n v&agrave; tr&aacute;i c&acirc;y d&agrave;nh cho r&ugrave;a trong c&ugrave;ng 1 loại thức ăn.</p>\r\n\r\n<ul>\r\n	<li>100% dinh dưỡng h&agrave;ng ng&agrave;y ho&agrave;n chỉnh với tr&aacute;i c&acirc;y cho Tortoises</li>\r\n	<li>Được bổ sung vitamin v&agrave; kho&aacute;ng chất như canxi v&agrave; Vitamin D3</li>\r\n	<li>Được thử nghiệm th&agrave;nh c&ocirc;ng cho những con r&ugrave;a cạn đ&atilde; được nghi&ecirc;n cứu.</li>\r\n</ul>\r\n\r\n<p>- C<strong>ho r&ugrave;a ăn v&agrave;o mỗi buổi s&aacute;ng:</strong>&nbsp;Cho r&ugrave;a ăn một lượng thức ăn cần thiết m&agrave; r&ugrave;a của bạn cần mỗi ng&agrave;y v&agrave;o buổi s&aacute;ng. N&ecirc;n cho thức ăn v&agrave;o c&aacute;c b&aacute;t ăn đ&atilde; được rửa sạch sẽ. Kh&ocirc;ng để thức ăn ở b&aacute;t ăn qu&aacute; s&acirc;u như vậy r&ugrave;a kh&ocirc;ng thể với cổ tới được. Nếu thức ăn trong b&aacute;t ăn c&ograve;n thừa sau mỗi buổi s&aacute;ng n&ecirc;n rọn sạch thức ăn thừa đi.</p>\r\n\r\n<p>-&nbsp;<strong>C&oacute; thể ng&acirc;m thức ăn&nbsp;Rep-Cal Tortoise Food v&agrave;o nước</strong>&nbsp;trước khi cho r&ugrave;a ăn tầm 2 &ndash; 5 ph&uacute;t. C&oacute; nhiều con r&ugrave;a cạn th&iacute;ch ăn c&aacute;c thực phẩm đồ kh&ocirc; được l&agrave;m mềm bằng việc ng&acirc;m nước hơn. N&ecirc;n bạn c&oacute; thể &aacute;p dụng mẹo nhỏ n&agrave;y để cung cấp th&ecirc;m một loại thức ăn mới l&agrave; d&agrave;nh cho ch&uacute; r&ugrave;a cạn của bạn.</p>\r\n\r\n<p>-&nbsp;</p>\r\n', 1, NULL, NULL, NULL, '2020-08-26 17:39:25', NULL),
(18, 5, 'Gián Dubia', '1598463765-product-dubia.jpg', 1000, 0, 1000, '', '<p>Đ&acirc;y l&agrave; loại thức ăn si&ecirc;u bổ dưỡng. Gấp 3 4 lần h&agrave;m lượng dinh dưỡng với s&acirc;u dế. Gi&aacute;n loại to Pop&nbsp;<a href=\"https://poppetshop.vn/shop/\">Shop</a>&nbsp;sẽ cung cấp mặt h&agrave;ng n&agrave;y trong thời gian sớm nhất trong thời gian tới.</p>\r\n', 1, NULL, NULL, NULL, '2020-08-26 17:42:45', NULL),
(19, 5, 'Chuột bạch Pinky cho bò sát trăn rắn cỡ nhỏ', '1598464008-product-pinky-mice-2.jpg', 5000, 0, 1000, '', '', 1, NULL, NULL, NULL, '2020-08-26 17:46:48', NULL),
(20, 5, 'Chuột bạch size Fuzzy nhỏ cho trăn rắn mới lớn', '1598464107-product-gg_micefr.jpg', 6000, 20, 0, '', '', 1, NULL, NULL, NULL, '2020-08-26 17:48:27', NULL),
(21, 5, 'Chuột bạch size lớn cho bò sát trăn rắn lớn', '1598464210-product-ratcol.jpg', 0, 0, 0, '', '', 1, NULL, NULL, NULL, '2020-08-26 17:50:10', NULL),
(22, 5, 'Canxi Calcium + D3 Exoterra dành cho bò sát cảnh', '1598464707-product-Canxi-Calcium-D3-Exoterra.jpg', 150000, 0, 30, '', '<p>- Vitamin D3 l&agrave; nguồn dinh dưỡng cần thiết với b&ograve; s&aacute;t cảnh v&igrave; ch&uacute;ng gi&uacute;p vật nu&ocirc;i hấp thụ canxi cần thiết m&agrave; kh&ocirc;ng cần &aacute;nh s&aacute;ng mặt trời tự nhi&ecirc;n.</p>\r\n\r\n<p>-&nbsp;<strong>T&aacute;c dụng của sản phẩm&nbsp;Exo Terra Calcium + D&nbsp;3&nbsp;Powder Supplement</strong></p>\r\n\r\n<ul>\r\n	<li>Gi&uacute;p b&ograve; s&aacute;t cảnh trao đổi chất hấp thụ canxi th&iacute;ch hợp</li>\r\n	<li>Cung cấp Phospho</li>\r\n	<li>Cung cấp Vitamin D3</li>\r\n</ul>\r\n', 1, NULL, NULL, NULL, '2020-08-26 17:58:27', NULL),
(23, 7, 'Super Snow Leopard Gecko', '1598496759-product-lg1.jpg', 1500000, 0, 3, '', '', 1, NULL, NULL, NULL, '2020-08-27 02:52:39', NULL),
(24, 7, 'Bell Albino Leopard Gecko', '1598496870-product-lg2.jpg', 2000000, 0, 5, '', '', 1, NULL, NULL, NULL, '2020-08-27 02:54:30', NULL),
(25, 7, 'Snow Bell Enigma Tangerine Leopard Gecko', '1598497004-product-lg3.jpg', 1500000, 0, 3, '', '', 1, NULL, NULL, NULL, '2020-08-27 02:56:44', NULL),
(26, 7, 'Sunglow Leopard Gecko', '1598497105-product-lg4.jpg', 1500000, 0, 4, '', '', 1, NULL, NULL, NULL, '2020-08-27 02:58:25', NULL),
(27, 7, 'Normal Leopard Gecko', '1598497188-product-lg5.jpg', 700000, 0, 5, '', '', 1, NULL, NULL, NULL, '2020-08-27 02:59:48', NULL),
(28, 8, 'Red Bearded Dragon', '1598497511-product-bd1.jpg', 6500000, 0, 3, '', '', 1, NULL, NULL, NULL, '2020-08-27 03:05:11', NULL),
(29, 8, 'Orange Bearded Dragon', '1598497594-product-bd2.jpg', 2000000, 0, 3, '', '', 1, NULL, NULL, NULL, '2020-08-27 03:06:34', NULL),
(30, 8, 'Yellow Bearded Dragon', '1598497660-product-bd3.jpg', 2500000, 0, 3, '', '', 1, NULL, NULL, NULL, '2020-08-27 03:07:40', NULL),
(31, 8, 'White Bearded Dragon', '1598497718-product-bd4.jpg', 6500000, 0, 3, '', '', 1, NULL, NULL, NULL, '2020-08-27 03:08:38', NULL),
(32, 6, 'Cage1', '1600579784-product-cage1.jpg', 2000000, 20, 3, '', '', 1, NULL, NULL, NULL, '2020-09-20 05:29:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `phone` int(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `jobs` varchar(100) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `status` bit(1) DEFAULT b'0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 3 COMMENT '1-suprer admin  2-admin  3-nomal user '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `phone`, `address`, `email`, `avatar`, `jobs`, `last_login`, `facebook`, `status`, `created_at`, `updated_at`, `role`) VALUES
(1, 'test1', '550248', 'Nguyễn ', 'Minh', 123456, 'abcabc', 'mguyen@gmail.com', '1598857934-user-black-king.jpg', 'it', NULL, NULL, b'0', '2020-08-26 14:32:09', NULL, 3),
(2, '202cb962ac59075b964b07152d234b70', '550248', 'Minh', '123', 904898001, 'abcacb', 'minh@gmail.com', '1599545549-user-instagram-img-04.jpg', 'abc', NULL, NULL, b'0', '2020-08-31 07:54:30', NULL, 1),
(3, 't1', '550248', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, b'0', '2020-08-31 11:47:53', NULL, 3),
(4, 'admin', '202cb962ac59075b964b07152d234b70', '', '', 904898001, '', 'mguyenminh99@gmail.com', '1601206255-user-119526727_1529626813895172_2206431524272928832_n.jpg', '', NULL, NULL, b'0', '2020-09-27 11:10:24', NULL, 1),
(5, 'admin2', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, 'mguyenminh99@gmail.com', NULL, NULL, NULL, NULL, b'0', '2020-10-10 10:23:06', NULL, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Foreign key` (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_categories` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `Foreign key` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
