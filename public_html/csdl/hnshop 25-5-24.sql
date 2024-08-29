-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 25, 2024 lúc 03:12 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hnshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `adminId` int(10) UNSIGNED NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'Hieu', 'hieusnguyen0709@gmail.com', 'HieuRose', '123456', 0),
(2, 'Khoa', 'nguyentrandangkhoa1504@gmail.com', 'Khoa', '123456', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zipcode` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `city`, `country`, `zipcode`, `phone`, `email`, `password`, `status`, `created_date`) VALUES
(9, 'Hiếu', '108/08 duong so 5', 'HCM', 'Việt Nam', '700000', '0365549764', 'hieus99@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '2024-04-29 13:51:30'),
(8, 'Hưng', '108/08 duong so 5', 'HCM', 'Việt Nam', '700000', '0365549764', 'hieusnguyen070999@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '2024-04-29 13:51:30'),
(7, 'Yashashi', '108/08 duong so 5', 'HCM', 'Việt Nam', '700000', '0365549764', 'hieusnguyen07091999@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '2024-04-29 13:51:30'),
(6, 'Deaths', '108/08 duong so 5', 'HCM', 'Việt Nam', '07091999', '0365549764', 'hieusnguyen0709@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '2024-04-29 13:51:30'),
(10, 'Garden', '108/08 duong so 5', 'HCM', 'Việt Nam', '700000', '0365549764', '123@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2024-04-29 13:51:30'),
(11, 'Hùng', '108/08 duong so 5', 'HCM', 'Việt Nam', '700000', '0365549764', 'nmh99@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '2024-04-29 13:51:30'),
(12, 'Khoa', '19/104 Hà Huy Tập', 'TP.HCM', 'Việt Nam', '700000', '0365549764', 'hieuhieu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '2024-04-29 13:51:30'),
(13, 'Hiếu Rose', '108/08 duong so 5', 'HCM', 'Việt Nam', '700000', '0365549764', 'nmh9999@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '2024-04-29 13:51:30'),
(14, 'Nguyễn Công Minh', '108/08 Nguyễn Văn Bảo', 'TP.HCM', 'Việt Nam', '700000', '0365549764', 'hieunguyen79@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '2024-04-29 13:51:30'),
(19, 'Tam', '02 Nguyễn Văn Bảo', 'TP.HCM', 'Việt Nam', '700000', '01659334515', '123456@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '2024-04-29 13:51:30'),
(20, 'Như', '108/08 duong so 5', 'HCM', 'Việt Nam', '700000', '0365549764', '12345@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '2024-04-29 13:51:30'),
(22, 'Lệ Tam', '108/08 duong so 5', 'HCM', 'Việt Nam', '700000', '0365549764', 'hieuminh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '2024-04-29 13:51:30'),
(26, 'Đình Đình', '108/08 duong so 5', 'HCM', 'Việt Nam', '700000', '0365549764', 'demo111@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '2024-04-29 13:51:30'),
(27, 'Lê Thị Hiền', '108/08 duong so 5', 'HCM', 'Việt Nam', '700000', '0365549764', 'accdemo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '2024-04-29 13:51:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_cart`
--

CREATE TABLE `customer_cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_order`
--

CREATE TABLE `customer_order` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `qrcode` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer_order`
--

INSERT INTO `customer_order` (`id`, `productId`, `productName`, `customer_id`, `quantity`, `price`, `image`, `status`, `date_order`, `qrcode`) VALUES
(208, 52, 'Đàn ông sao Hỏa, đàn bà sao Kim', 7, 1, '100000', '3d821839a3.jpg', 2, '2024-05-24 17:07:22', '1526526066'),
(205, 42, 'Đắc Nhân Tâm', 7, 1, '120000', 'b061175cc8.jpg', 2, '2024-05-24 17:07:22', '739734275'),
(207, 73, 'Nhảy Nhảy Nhảy', 7, 1, '169000', '354a2ef959.jpg', 2, '2024-05-24 17:07:22', '2115283407'),
(206, 53, 'Yêu em từ cái nhìn đầu tiên ', 7, 1, '140000', '274960d0d9.jpg', 2, '2024-05-24 17:07:22', '417308036'),
(204, 55, 'Bí quyết trường thọ ', 7, 1, '80000', '26b195ae1f.jpg', 0, '2024-05-24 17:07:22', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_wishlist`
--

CREATE TABLE `customer_wishlist` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`productId`, `productName`, `catId`, `brandId`, `product_desc`, `type`, `price`, `quantity`, `image`) VALUES
(64, 'Doraemon Tập 1 - Chú khủng long của Nobita', 25, 16, '<p>Truyện d&agrave;i&nbsp;</p>', 0, '49000', 17, '0ee4d89ced.jpg'),
(65, 'Doraemon Tap.2 - Nobita và lịch sử khai phá vũ trụ', 25, 16, '<p>truyen dai</p>', 0, '50000', 46, '30e3b6f82b.jpg'),
(66, 'Doraemon Tập 24 - Nobita Ở Vương Quốc Chó Mèo', 25, 16, '<p>truyen dai</p>', 0, '47000', 48, '4e0faad01f.jpg'),
(67, 'Thám Tử Lừng Danh Conan - Tập 1', 25, 16, '<p>tham tu</p>', 0, '30000', 12, '9d37b1115f.jpg'),
(68, 'Thám Tử Lừng Danh Conan - Tập 2', 25, 16, '<p>tham tu</p>', 0, '31000', 78, '34daca0226.jpg'),
(69, 'Doraemon Tập 18 - Nobita du hành biển phương nam', 25, 16, '<p>truyen dai</p>', 0, '52000', 45, 'f85e5eb199.jpg'),
(70, 'Thanh xuân 18×2: Lữ trình hướng về em', 12, 12, '<p>t&igrave;nh y&ecirc;u&nbsp;</p>', 0, '199000', 45, '24dacefa92.jpg'),
(71, 'Combo 2 Tập: Hãy Nhắm Mắt Khi Anh Đến', 12, 12, '<p>tinh cam</p>', 0, '211000', 45, '92e9a345ca.jpg'),
(72, 'Kế Hoạch \"Cưa\" Lại Bạn Gái', 12, 13, '<p>tinh cam</p>', 0, '69000', 12, '8beb8b3c13.jpg'),
(73, 'Nhảy Nhảy Nhảy', 12, 13, '<p>tinh cam</p>', 0, '169000', 19, '354a2ef959.jpg'),
(37, 'Tâm Trí Chữa Lành Cơ Thể Như Thế Nào', 26, 13, '<p><span><span><span><span><span>Khai ph&aacute; sức mạnh chữa l&agrave;nh kỳ diệu của t&acirc;m thức đối với cơ thể</span></span></span></span></span></p>\r\n<p><span><span><span><span><span><em>&ldquo;T&acirc;m tr&iacute; chữa l&agrave;nh cơ thể như thế n&agrave;o?&rdquo; của Jo Marchant l&agrave; một trong những cuốn s&aacute;ch b&aacute;n chạy nhất của New York Times v&agrave; lọt v&agrave;o danh mục chọn lọc cho giải thưởng s&aacute;ch Khoa học của Royal Society.&nbsp;</em></span></span></span></span></span></p>\r\n<div id=\"videoPopupMenu\" style=\"display: none;\">&nbsp;</div>', 1, '203000', 499, '905c39bb01.jpg'),
(52, 'Đàn ông sao Hỏa, đàn bà sao Kim', 12, 15, '<p><span>Quyển s&aacute;ch được đ&aacute;nh gi&aacute; l&agrave; kim chỉ nam gi&uacute;p người đọc thấu hiểu hơn nửa kia của m&igrave;nh cũng như t&igrave;m được c&aacute;ch giải quyết những vấn đề c&ograve;n tồn đọng trong một mối quan hệ.</span></p>', 0, '100000', 19, '3d821839a3.jpg'),
(53, 'Yêu em từ cái nhìn đầu tiên ', 12, 12, '<p>Tiểu thuyết l&atilde;ng mạng Trung Quốc</p>', 0, '140000', 19, '274960d0d9.jpg'),
(54, 'Cô gái năm ấy chúng ta cùng theo đuổi', 12, 12, '<p>Chuyện t&igrave;nh thời học sinh ng&acirc;y thơ, ch&acirc;n th&agrave;nh nhưng cũng đầy nuối tiếc của họ sẽ mang đọc giả về với những ng&agrave;y th&aacute;ng hồn nhi&ecirc;n nhất của cuộc đời, cảm nhận s&acirc;u sắc hơn t&igrave;nh y&ecirc;u, c&oacute; hạnh ph&uacute;c v&agrave; cũng c&oacute; nhiều lưu luyến.</p>', 0, '99000', 499, '38445e4ea8.jpg'),
(59, 'Cuộc Chiến Không Dây', 11, 12, '<h1 class=\"Title__TitledStyled-sc-c64ni5-0 iXccQY\">Thế Giới Trước Sự Thống Trị Của Trung Quốc Đối Với Mạng Di Động 5G</h1>', 0, '149000', 20, '7b50273bed.png'),
(60, 'Châu Nhuận Phát - Đại Hiệp Hồng Kông', 11, 12, '<p>hanh dong</p>', 0, '139000', 15, '11d7e0f50b.jpg'),
(61, 'Cuộc Chiến Sinh Tồn', 11, 13, '<p>cuộc chiến</p>', 0, '99000', 45, '304b6011d1.jpg'),
(62, ' Tham Vọng Vĩ Đại - 6 Nguyên Tắc Điều Hướng Tham Vọng', 11, 15, '<p>tham vọng con người</p>', 0, '189000', 10, 'd99ffd9e79.jpg'),
(63, 'Học Từ Hành Động', 11, 13, '<p>hanh dong</p>', 0, '128000', 499, 'c5bfa476e3.jpg'),
(41, 'Nhà giả Kim', 19, 17, 'hành trình đặc biệt của cuốn sách khi có thể làm rung động tâm hồn của hàng trăm triệu người khắp thế giới, trở thành một trong những cuốn sách bán chạy nhất của nhân loại, giúp thức tỉnh cuộc đời người đọc.', 0, '200000', 100, 'b53e2d3fd0.jpg'),
(42, 'Đắc Nhân Tâm', 19, 15, 'Quyển sách đưa ra các lời khuyên về cách thức cư xử và giao tiếp với mọi người để đạt được thành công trong cuộc sống', 0, '120000', 19, 'b061175cc8.jpg'),
(43, 'cách nghĩ để thành công - Napoleon hill', 19, 15, '<p><span>C&aacute;ch nghĩ để th&agrave;nh c&ocirc;ng l&agrave; một trong những cuốn s&aacute;ch b&aacute;n chạy nhất mọi thời đại.</span></p>\r\n<p><span> Đ&atilde; hơn 60 triệu bản được ph&aacute;t h&agrave;nh với gần trăm ng&ocirc;n ngữ tr&ecirc;n to&agrave;n thế giới v&agrave; được c&ocirc;ng nhận l&agrave; cuốn s&aacute;ch tạo ra nhiều triệu ph&uacute; hơn, một cuốn s&aacute;ch truyền cảm hứng th&agrave;nh c&ocirc;ng nhiều hơn bất cứ cuốn s&aacute;ch kinh doanh n&agrave;o trong lịch sử.</span></p>', 0, '200000', 50, '5ee7add2f3.jpg'),
(44, 'Cà phê cùng Tony', 19, 13, 'tâm sự cùng Tony\r\n', 0, '150000', 499, '8d2cfb42b2.jpg'),
(57, 'Y Học Dinh Dưỡng - Những Điều Bác Sĩ Không Nói Với Bạn', 26, 13, '<p>Y học&nbsp;</p>', 0, '200000', 15, '1eba0ae777.jpg'),
(58, 'Dám Hành Động', 11, 13, '<p>tư duy bản th&acirc;n</p>', 0, '99000', 41, 'eac5211285.png'),
(46, '7 Thói quen để thành đạt', 19, 15, 'Gieo suy nghĩ, gặt hành động; Gieo hành động, gặt thói quen; Gieo thói quen, gặt tính cách; Gieo tính cách, gặt số phận. May mắn thay, con người lại mạnh mẽ hơn thói quen và do đó chúng ta có thể thay đổi được thói quen.', 1, '180000', 48, '12a794256a.jpg'),
(47, 'Clean Coder: A Code of Conduct for Professional Programmers', 27, 15, 'học code ', 1, '200000', 30, '236670f0af.jpg'),
(55, 'Bí quyết trường thọ ', 26, 16, '<p>Tuổi thọ của người Nhật&nbsp;</p>', 0, '80000', 19, '26b195ae1f.jpg'),
(56, 'Đừng Ốm - Bí Quyết Sống Khỏe Trong Thế Giới Đầy Rẫy Mầm Bệnh', 26, 13, '<p>Sức khỏe bản th&acirc;n&nbsp;</p>', 0, '150000', 10, '3aa445b34f.jpg'),
(48, 'Code Complete', 27, 15, '<p>Code Complete: A Practical Handbook of Software Construction được nhận x&eacute;t l&agrave; cuốn s&aacute;ch kinh điển v&agrave; rất cần cho những ai đang theo đuổi ng&agrave;nh IT. Kh&ocirc;ng chỉ đơn thuần l&agrave; một cuốn s&aacute;ch hội tụ về c&aacute;c kỹ năng lập tr&igrave;nh m&agrave; c&ograve;n gi&uacute;p c&aacute;c developer thay đổi th&aacute;i độ, tư duy của bản th&acirc;n để cho ra đời những phần mềm hay, c&oacute; gi&aacute; trị.</p>', 1, '300000', 19, '4bb7f9be92.jpg'),
(49, 'The Art of Architectural Daylighting', 27, 15, '<p>Nghệ thuật của kiến tr&uacute;c chiếu s&aacute;ng tự nhi&ecirc;n.</p>', 0, '400000', 30, 'b21c8e6cce.jpg'),
(50, 'Thỏ Bảy Màu Và Những Người Nghĩ Nó Là Bạn', 25, 13, 'Truyện tranh thế hệ mới ', 0, '70000', 50, 'e814cffc3f.jpg'),
(51, 'Cậu Bé Bút Chì -Tập 11 - Cu Shin Và Trải Nghiệm Trượt Tuyết', 25, 16, '<p>Trải nghiệm trượt tuyết c&ugrave;ng shin</p>', 0, '50000', 100, 'ed938234e4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_brand`
--

CREATE TABLE `product_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_brand`
--

INSERT INTO `product_brand` (`brandId`, `brandName`) VALUES
(14, 'Hàn Quốc'),
(13, 'Việt Nam'),
(8, 'Samsung'),
(15, 'Mỹ'),
(12, 'Trung Quốc'),
(16, 'Nhật Bản'),
(17, 'Bồ Đào Nha ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_category`
--

CREATE TABLE `product_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_category`
--

INSERT INTO `product_category` (`catId`, `catName`) VALUES
(9, 'Sports'),
(26, 'Health'),
(11, 'Action'),
(12, 'Romantic'),
(19, 'Novel'),
(25, 'Comic'),
(27, 'Tài liệu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_comment`
--

CREATE TABLE `product_comment` (
  `comment_id` int(11) NOT NULL,
  `name_comment` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_comment`
--

INSERT INTO `product_comment` (`comment_id`, `name_comment`, `comment`, `product_id`) VALUES
(2, 'Hieu', 'San pham dep lam', 19),
(3, 'Hieu', 'San pham nay rat dep', 18);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_warehouse`
--

CREATE TABLE `product_warehouse` (
  `id_warehouse` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `sl_nhap` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sl_ngaynhap` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `sliderId` int(11) NOT NULL,
  `sliderName` varchar(255) NOT NULL,
  `slider_image` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`sliderId`, `sliderName`, `slider_image`, `type`) VALUES
(12, 'Slider 4', '0b79f8c7c0.jpg', 1),
(13, 'Slider 3', '9a1378d749.jpg', 1),
(10, 'Slider 2', 'da3f490670.jpg', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer_cart`
--
ALTER TABLE `customer_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Chỉ mục cho bảng `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer_wishlist`
--
ALTER TABLE `customer_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Chỉ mục cho bảng `product_brand`
--
ALTER TABLE `product_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Chỉ mục cho bảng `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`catId`);

--
-- Chỉ mục cho bảng `product_comment`
--
ALTER TABLE `product_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `product_warehouse`
--
ALTER TABLE `product_warehouse`
  ADD PRIMARY KEY (`id_warehouse`);

--
-- Chỉ mục cho bảng `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`sliderId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `customer_cart`
--
ALTER TABLE `customer_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=369;

--
-- AUTO_INCREMENT cho bảng `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT cho bảng `customer_wishlist`
--
ALTER TABLE `customer_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `product_brand`
--
ALTER TABLE `product_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `product_category`
--
ALTER TABLE `product_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `product_comment`
--
ALTER TABLE `product_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `product_warehouse`
--
ALTER TABLE `product_warehouse`
  MODIFY `id_warehouse` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `sliderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
