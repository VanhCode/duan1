-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 25, 2023 lúc 07:34 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vanh-store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `amount`, `size`, `color`, `create_at`) VALUES
(209, 37, 123, 1, 'XL', 'Áo sọc trắng', '2023-12-02 15:13:05'),
(228, 30, 122, 2, 'XL', 'Trắng', '2023-12-06 05:08:47'),
(229, 30, 129, 1, 'S', 'Hồng nhạt', '2023-12-06 05:10:21'),
(235, 41, 156, 1, 'orversize', '7 sắc màu', '2023-12-08 07:18:12'),
(239, 43, 134, 1, 'L', 'Đen', '2023-12-08 08:20:45'),
(240, 43, 125, 1, 'XL', 'vàng nhạt', '2023-12-08 08:20:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `image_cate` varchar(255) DEFAULT NULL,
  `status_category` varchar(20) NOT NULL DEFAULT 'show'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `image_cate`, `status_category`) VALUES
(24, 'Thời Trang Nam', '1699283410thn.png', 'show'),
(25, 'Thời Trang Nữ', '1699283430thn2.png', 'show'),
(26, 'Giày & Dép', '1699283488g1.jfif', 'show'),
(27, 'Áo Khoác', '1699283609ak.jfif', 'show'),
(28, 'Phụ Kiện & Thời Trang', '1699283643pk.png', 'show'),
(29, 'Mẫu Áo Mới Nhất', '1699283700a4.jpg', 'show'),
(30, 'Mẫu Quần Mới Nhất', '1699283741q3.jpg', 'show');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `product_id`, `content`, `create_at`) VALUES
(1, 23, 133, 'Chất lượng tốt', '2023-11-16 16:10:33'),
(2, 23, 133, 'Tôi nhận đc hàng chất lượng tốt lắm', '2023-11-16 16:33:07'),
(8, 30, 159, 'Chất lượng', '2023-11-26 04:33:09'),
(14, 30, 159, 'Chất lượng', '2023-11-26 07:35:31'),
(15, 30, 159, 'Ok lắm', '2023-11-26 07:41:34'),
(16, 30, 159, 'h', '2023-11-26 07:42:27'),
(17, 30, 159, 'g', '2023-11-26 07:44:49'),
(18, 30, 159, 'Ok lắm', '2023-11-26 07:51:26'),
(19, 30, 158, 'gg', '2023-11-26 08:08:22'),
(20, 30, 122, 'Chất lượng', '2023-11-26 09:17:23'),
(21, 30, 122, 'Ok lắm', '2023-11-26 09:17:33'),
(22, 30, 128, 'Đẹp lắm', '2023-11-26 13:41:19'),
(23, 30, 134, 'Chất lượng', '2023-11-29 04:09:42'),
(24, 30, 131, 'Chất lượng', '2023-12-03 07:58:58'),
(25, 30, 131, 'Ok lắm', '2023-12-03 11:14:25'),
(26, 30, 131, 'g', '2023-12-03 14:46:02'),
(27, 30, 157, 'Ok lắm', '2023-12-05 17:02:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ma_don_hang` varchar(11) NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `receiver_phone` varchar(255) NOT NULL,
  `receiver_address` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  `payment_status` varchar(100) NOT NULL DEFAULT 'unpaid',
  `payment_method` varchar(100) DEFAULT NULL,
  `voucher` int(50) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `ma_don_hang`, `receiver_name`, `receiver_phone`, `receiver_address`, `status`, `payment_status`, `payment_method`, `voucher`, `create_at`) VALUES
(150, 30, 'KY7M3LOJ', 'admin  ', '0356720081', 'Đan Phượng', 'pending', 'unpaid', 'tienmat', -15000, '2023-12-02 15:30:40'),
(151, 30, '46QQK9JB', 'admin  ', '0356720081', 'Hà nội', 'pending', 'paid', 'tienmat', 0, '2023-12-03 03:06:50'),
(152, 30, 'ASTHBWF4', 'admin  ', '0356720081', 'Hà nội', 'pending', 'paid', 'tienmat', -100000, '2023-12-04 07:26:34'),
(153, 30, '72GV243Q', 'admin ', 'tranvanh2k4@gmail.com', 'Hà nội', 'pending', 'paid', 'VNPAY', 0, '2023-12-04 16:44:57'),
(154, 30, 'SQLNGBH6', 'admin ', '0969621079', 'Đan Phượng', 'pending', 'paid', 'VNPAY', -15000, '2023-12-04 16:26:25'),
(155, 40, 'IRW0LXI2', 'vanhh trann', '0969621079', 'Số nhà 14, Thôn 5, xã Thượng Mỗ, Huyện Đan Phượng, Hà Nội', 'pending', 'unpaid', 'tienmat', 0, '2023-12-05 05:13:49'),
(156, 40, 'FD7UXNV6', 'vanhh trann', '0969621079', 'Số nhà 14, Thôn 5, xã Thượng Mỗ, Huyện Đan Phượng, Hà Nội', 'completed', 'paid', 'VNPAY', 0, '2023-12-05 05:25:07'),
(157, 40, 'JHBM78CO', 'vanhh trann', '0969621079', 'Số nhà 14, Thôn 5, xã Thượng Mỗ, Huyện Đan Phượng, Hà Nội', 'completed', 'paid', 'tienmat', 0, '2023-12-05 05:27:37'),
(158, 41, '932S58WF', 'ĐÀO ĐỨC HIỆP', '0961619038', '14 ngõ 75 đường phú diễn', 'canceled', 'unpaid', 'tienmat', 0, '2023-12-07 17:18:54'),
(159, 41, 'GETLB06V', 'ĐÀO ĐỨC HIỆP', '0961619038', '14 ngõ 75 đường phú diễn', 'canceled', 'unpaid', 'tienmat', 0, '2023-12-07 17:15:00'),
(160, 41, 'UPPDDDWC', 'ĐÀO ĐỨC HIỆP', 'hiepdepzai2508@gmail.com', '14 ngõ 75 đường phú diễn', 'pending', 'unpaid', 'tienmat', 0, '2023-12-07 17:15:43'),
(161, 41, '', '', '', '', 'pending', 'unpaid', 'tienmat', 0, '2023-12-07 17:18:18'),
(162, 41, 'QWKGE4Q2', 'ĐÀO ĐỨC HIỆP', '0961619038', '14 ngõ 75 đường phú diễn', 'canceled', 'unpaid', 'tienmat', 0, '2023-12-07 17:18:57'),
(163, 41, 'BVBR047Q', 'ĐÀO ĐỨC HIỆP', '0961619038', '14 ngõ 75 đường phú diễn', 'pending', 'unpaid', 'tienmat', 0, '2023-12-07 17:37:13'),
(164, 41, '0H7RC4VK', 'duy nguyen', '0968607305', 'P. Vĩnh Phúc, hà nội', 'pending', 'unpaid', 'tienmat', -100000, '2023-12-08 07:40:50'),
(165, 43, 'T88ELCVV', 'Linh Nguyen', '0968607305', 'vinh phuc', 'pending', 'paid', 'VNPAY', -30000, '2023-12-08 08:21:43'),
(166, 45, 'ZHEL7BLV', 'duy nguyen', '0968607305', 'P. Vĩnh Phúc, hà nội', 'pending', 'paid', 'VNPAY', 0, '2023-12-08 08:22:31'),
(167, 45, 'O8HSU2BD', 'duy nguyen', '0968607305', 'P. Vĩnh Phúc, hà nội', 'completed', 'paid', 'tienmat', 0, '2023-12-08 08:22:50'),
(168, 45, 'LQ2QYO0K', 'duy nguyen', '0968607305', 'P. Vĩnh Phúc, hà nội', 'canceled', 'unpaid', 'tienmat', 0, '2023-12-08 08:24:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`order_detail_id`, `order_id`, `product_id`, `amount`, `size`, `color`, `price`) VALUES
(180, 150, 126, 1, 'XL', 'Nâu', 239000),
(181, 150, 124, 1, 'M', 'Đen', 169000),
(182, 151, 131, 1, 'L', 'Hồng', 535000),
(183, 152, 144, 1, '36', 'trắng', 65000),
(184, 152, 136, 1, '36', 'Đen', 470000),
(185, 152, 125, 3, 'XL', 'vàng nhạt', 179000),
(186, 153, 134, 1, 'M', 'Đen', 130000),
(187, 154, 139, 1, 'M', 'Trắng', 179000),
(188, 155, 128, 1, 'M', 'Hồng', 269000),
(189, 156, 133, 1, 'L', 'trắng', 149000),
(190, 157, 132, 1, 'M', 'Đen', 180000),
(191, 158, 128, 1, 'S', 'Hồng', 269000),
(192, 159, 151, 1, 'L', 'Nâu', 69000),
(193, 160, 131, 1, 'M', 'Đen', 535000),
(194, 162, 158, 1, 'orversize', 'trắng', 87000),
(195, 163, 128, 1, 'M', 'Hồng', 269000),
(196, 164, 122, 6, 'L', 'Trắng', 229000),
(197, 165, 125, 1, 'XL', 'vàng nhạt', 179000),
(198, 165, 134, 1, 'L', 'Đen', 130000),
(199, 166, 124, 1, 'S', 'Đen', 169000),
(200, 166, 160, 1, 'L', 'Nâu', 100000),
(201, 167, 124, 1, 'S', 'Đen', 169000),
(202, 167, 160, 1, 'L', 'Nâu', 100000),
(203, 168, 164, 1, 'L', 'Trắng Xanh', 59000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` double(10,2) NOT NULL,
  `sale` double(10,2) DEFAULT NULL,
  `images` text DEFAULT NULL,
  `search_count` int(11) NOT NULL DEFAULT 0,
  `product_gender` varchar(20) DEFAULT NULL,
  `description` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `sale`, `images`, `search_count`, `product_gender`, `description`, `create_at`, `category_id`) VALUES
(122, 'Áo Thun Nam Cổ Xẻ V Tay Ngắn - FAN013 - FANBOU', 249000.00, 229000.00, '1699325658vn-11134207-7qukw-lhsy401krsn53a.jpg,1699325658vn-11134207-7qukw-ljf1s03uy0i403_tn.jpg,1699325658vn-11134207-7qukw-ljf1s03v0tn0c6_tn.jpg', 14, 'Nam', '“Một vài lý do để chọn chúng tôi ”\r\n\r\n🌸Chúng tôi đã chuẩn bị một phiếu giảm giá bất ngờ cho bạn, bạn có thể tự nhận hoặc trò chuyện riêng với bộ phận chăm sóc khách hàng của chúng tôi để nhận hàng🌸\r\n\r\n🧸Đó là một trải nghiệm thú vị từ khi nhìn thấy sản phẩm đến khi nhận sản phẩm, bạn sẽ thích shop của tôi🎁\r\n\r\n————————————————\r\n\r\n🎁Shop mình sẽ có số lượng lớn hàng mới lên kệ hàng tuần\r\n\r\n🎁Theo dõi cửa hàng của tôi để nhận phiếu giảm giá\r\n\r\n————————————————\r\n\r\n✨Mỗi sản phẩm của chúng tôi được mô tả chi tiết\r\n\r\n✨Thích hợp cho mọi lứa tuổi\r\n\r\n✨Phần trên được thiết kế vừa vặn với đôi chân của bạn, hỗ trợ tác động và trọng lượng của người mặc.\r\n\r\n✨Thiết kế đế dưới có thể bám dính tốt trên mọi bề mặt.\r\n\r\n✨Dễ dàng làm sạch và nhanh khô\r\n\r\n✨Có thể mặc bất cứ lúc nào\r\n\r\n————————————————\r\n\r\n🌴Chất lượng sản phẩm được đảm bảo và sẽ được kiểm tra trước khi xuất xưởng.\r\n\r\n🌴Mọi thắc mắc vui lòng tham khảo cửa hàng.\r\n\r\n🌴Sản phẩm có xuất xứ từ Trung Quốc và sẽ mất một thời gian để vận chuyển.\r\n\r\n🌴Nếu bạn cần sản phẩm của chúng tôi, vui lòng thêm chúng vào giỏ hàng của bạn, cảm ơn bạn rất nhiều.\r\n\r\n💌[Rất quan trọng, rất quan trọng]💌\r\n\r\n🎀Vui lòng kiểm tra xem số điện thoại và địa chỉ của bạn có chính xác không trước khi nhấp vào đơn đặt hàng.\r\n\r\n🎀Sản phẩm của chúng tôi là thương hiệu mới.\r\n\r\n🎀Chúng tôi nhấn mạnh chất lượng và giá cả thấp!\r\n\r\n🎀Sau khi nhận được gói hàng, nếu bạn hài lòng với mặt hàng, xin vui lòng cho nó một 5 sao⭐⭐⭐⭐⭐ Đánh giá và chào mừng bạn đến thăm chúng tôi một lần nữa😘😘', '2023-11-08 14:21:43', 24),
(123, 'Áo Thun Tay Ngắn Cổ Tròn Kẻ Sọc Thiết Kế Trẻ Trung Cho Nam', 120000.00, 100000.00, '1699325956sg-11134201-7qvcw-lfvzw8zgqpna64_tn.jpg,1699325956sg-11134201-7qvee-lfvzw9kjugow6d.jpg', 8, 'Nam', '⚡ THÔNG TIN SẢN PHẨM\r\n\r\n- Chất liệu: Vải 100% cotton 2 chiều cao cấp\r\n\r\n- Màu sắc: trắng, đen, xanh coban\r\n\r\n- Form áo: oversize\r\n\r\n- Thiết kế: logo in nổi silicon tệp màu áo\r\n\r\n- Phong cách Unisex phù hợp cho cả nam và nữ.\r\n\r\n- Áo Devotus là form rộng mặc thoải mái các bạn không cần up size trừ trường hợp thích mặc rộng.\r\n\r\n- Những trường hợp có thân hình đặt biệt thì inbox cho shop chiều cao và cân nặng để tư vấn size phù hợp nhé!', '2023-11-08 14:21:43', 24),
(124, 'Áo Thun Tay Ngắn Cổ Tròn Form Rộng In Họa Tiết Phong Cách Hip Hop Thời Trang Mùa Hè Dành Cho Nam Siz', 189000.00, 169000.00, '16993262592320d421c21af9f7ceee0e2bf5a250fa_tn.jpg', 8, 'Nam', '“Một vài lý do để chọn chúng tôi ”\r\n\r\n🌸Chúng tôi đã chuẩn bị một phiếu giảm giá bất ngờ cho bạn, bạn có thể tự nhận hoặc trò chuyện riêng với bộ phận chăm sóc khách hàng của chúng tôi để nhận hàng🌸\r\n\r\n🧸Đó là một trải nghiệm thú vị từ khi nhìn thấy sản phẩm đến khi nhận sản phẩm, bạn sẽ thích shop của tôi🎁\r\n\r\n————————————————\r\n\r\n🎁Shop mình sẽ có số lượng lớn hàng mới lên kệ hàng tuần\r\n\r\n🎁Theo dõi cửa hàng của tôi để nhận phiếu giảm giá\r\n\r\n————————————————\r\n\r\n✨Mỗi sản phẩm của chúng tôi được mô tả chi tiết\r\n\r\n✨Thích hợp cho mọi lứa tuổi\r\n\r\n✨Phần trên được thiết kế vừa vặn với đôi chân của bạn, hỗ trợ tác động và trọng lượng của người mặc.\r\n\r\n✨Thiết kế đế dưới có thể bám dính tốt trên mọi bề mặt.\r\n\r\n✨Dễ dàng làm sạch và nhanh khô\r\n\r\n✨Có thể mặc bất cứ lúc nào\r\n\r\n————————————————\r\n\r\n🌴Chất lượng sản phẩm được đảm bảo và sẽ được kiểm tra trước khi xuất xưởng.\r\n\r\n🌴Mọi thắc mắc vui lòng tham khảo cửa hàng.\r\n\r\n🌴Sản phẩm có xuất xứ từ Trung Quốc và sẽ mất một thời gian để vận chuyển.\r\n\r\n🌴Nếu bạn cần sản phẩm của chúng tôi, vui lòng thêm chúng vào giỏ hàng của bạn, cảm ơn bạn rất nhiều.\r\n\r\n💌[Rất quan trọng, rất quan trọng]💌\r\n\r\n🎀Vui lòng kiểm tra xem số điện thoại và địa chỉ của bạn có chính xác không trước khi nhấp vào đơn đặt hàng.\r\n\r\n🎀Sản phẩm của chúng tôi là thương hiệu mới.\r\n\r\n🎀Chúng tôi nhấn mạnh chất lượng và giá cả thấp!\r\n\r\n🎀Sau khi nhận được gói hàng, nếu bạn hài lòng với mặt hàng, xin vui lòng cho nó một 5 sao⭐⭐⭐⭐⭐ Đánh giá và chào mừng bạn đến thăm chúng tôi một lần nữa😘😘', '2023-11-08 14:21:43', 24),
(125, 'Áo Thun Cotton Ngắn Tay Cổ Tròn Thời Trang Hip Hop Cho Nam', 199000.00, 179000.00, '1699326466cn-11134207-7qukw-ljmifc3l4r6l65_tn.jpg,1699326466cn-11134207-7qukw-ljmifc3vgzjob4_tn.jpg', 8, 'Nam', '⚡ THÔNG TIN SẢN PHẨM\r\n\r\n- Chất liệu: Vải 100% cotton 2 chiều cao cấp\r\n\r\n- Màu sắc: trắng, đen, xanh coban\r\n\r\n- Form áo: oversize\r\n\r\n- Thiết kế: logo in nổi silicon tệp màu áo\r\n\r\n- Phong cách Unisex phù hợp cho cả nam và nữ.\r\n\r\n- Áo Devotus là form rộng mặc thoải mái các bạn không cần up size trừ trường hợp thích mặc rộng.\r\n\r\n- Những trường hợp có thân hình đặt biệt thì inbox cho shop chiều cao và cân nặng để tư vấn size phù hợp nhé!', '2023-11-08 14:21:43', 24),
(126, 'Áo Len Dài Tay Màu Trơn Thời Trang Nam Tính', 259000.00, 239000.00, '1699326650sg-11134201-7qvcv-ljf0u1gtxndba2_tn.jpg,1699326650sg-11134201-7qvd3-lj97i4wpqqkt3c_tn.jpg', 9, 'Nam', '🌈 Chào mừng đến với cửa hàng của chúng tôi.\r\n\r\n\r\n\r\n  🌈 Theo dõi cửa hàng để nhận phiếu giảm giá ”◕‿◕｡\r\n\r\n\r\n\r\n  🌈 Nếu bạn hài lòng với sản phẩm và dịch vụ của chúng tôi Lời khen ngợi năm sao\r\n\r\n\r\n\r\n  🚚 Sản phẩm đến từ Trung Quốc và mất một thời gian để vận chuyển\r\n\r\n\r\n\r\n  💕 Phải mặc! Phổ biến vào năm 2023!\r\n\r\n\r\n\r\n  💕Được làm bằng chất liệu cao cấp, đủ bền để bạn mặc hàng ngày!\r\n\r\n\r\n\r\n  💕 Thật thoải mái Chất liệu vải mềm mại, hình dáng đẹp, chất lượng tốt.\r\n\r\n\r\n\r\n  💕 Thiết kế đẹp, sang trọng, độc đáo.\r\n\r\n\r\n\r\n  💕 Nó là một món quà tốt cho người yêu của bạn hoặc chính bạn.\r\n\r\n\r\n\r\n  ❣️ Chất lượng và giá cả như thế này không thể tìm thấy ở bất kỳ nơi nào khác, rất đáng đồng tiền. ️\r\n\r\n\r\n\r\n  ❣️Do các thiết bị hiển thị và chiếu sáng khác nhau, hình ảnh có thể không phản ánh màu sắc thực tế của tất cả các sản phẩm. Cảm ơn bạn đã thông cảm ❣️\r\n\r\n\r\n\r\n  ❣️ Đánh giá 1 hoặc 2 sao không có lý do / hình minh họa. hoặc đặt điều gì đó không đúng sự thật làm hỏng danh tiếng của shop shop sẽ không giúp gì cả vì bạn được coi là đang vào vì lợi ích của Shop, đặc biệt cảm ơn quý khách hàng đã có nhu cầu vui lòng đặt hàng hoặc yêu cầu thêm thông tin tin tin nhé ️\r\n\r\n\r\n', '2023-11-08 14:21:43', 24),
(127, 'Sét thời trang nữ mặc đi chơi chất cotton lạnh cổ vest chéo nút tay ngắn', 132000.00, 112000.00, '1699327011sg-11134201-23020-gqqusrm1acnv5a_tn.jpg,1699327011sg-11134201-23020-k04swsm1acnv7d_tn.jpg,1699327011sg-11134201-23020-mk7w5pm1acnv80_tn.jpg', 3, 'Nữ', '“Một vài lý do để chọn chúng tôi ”\r\n\r\n🌸Chúng tôi đã chuẩn bị một phiếu giảm giá bất ngờ cho bạn, bạn có thể tự nhận hoặc trò chuyện riêng với bộ phận chăm sóc khách hàng của chúng tôi để nhận hàng🌸\r\n\r\n🧸Đó là một trải nghiệm thú vị từ khi nhìn thấy sản phẩm đến khi nhận sản phẩm, bạn sẽ thích shop của tôi🎁\r\n\r\n————————————————\r\n\r\n🎁Shop mình sẽ có số lượng lớn hàng mới lên kệ hàng tuần\r\n\r\n🎁Theo dõi cửa hàng của tôi để nhận phiếu giảm giá\r\n\r\n————————————————\r\n\r\n✨Mỗi sản phẩm của chúng tôi được mô tả chi tiết\r\n\r\n✨Thích hợp cho mọi lứa tuổi\r\n\r\n✨Phần trên được thiết kế vừa vặn với đôi chân của bạn, hỗ trợ tác động và trọng lượng của người mặc.\r\n\r\n✨Thiết kế đế dưới có thể bám dính tốt trên mọi bề mặt.\r\n\r\n✨Dễ dàng làm sạch và nhanh khô\r\n\r\n✨Có thể mặc bất cứ lúc nào\r\n\r\n————————————————\r\n\r\n🌴Chất lượng sản phẩm được đảm bảo và sẽ được kiểm tra trước khi xuất xưởng.\r\n\r\n🌴Mọi thắc mắc vui lòng tham khảo cửa hàng.\r\n\r\n🌴Sản phẩm có xuất xứ từ Trung Quốc và sẽ mất một thời gian để vận chuyển.\r\n\r\n🌴Nếu bạn cần sản phẩm của chúng tôi, vui lòng thêm chúng vào giỏ hàng của bạn, cảm ơn bạn rất nhiều.\r\n\r\n💌[Rất quan trọng, rất quan trọng]💌\r\n\r\n🎀Vui lòng kiểm tra xem số điện thoại và địa chỉ của bạn có chính xác không trước khi nhấp vào đơn đặt hàng.\r\n\r\n🎀Sản phẩm của chúng tôi là thương hiệu mới.\r\n\r\n🎀Chúng tôi nhấn mạnh chất lượng và giá cả thấp!\r\n\r\n🎀Sau khi nhận được gói hàng, nếu bạn hài lòng với mặt hàng, xin vui lòng cho nó một 5 sao⭐⭐⭐⭐⭐ Đánh giá và chào mừng bạn đến thăm chúng tôi một lần nữa😘😘', '2023-11-08 14:21:43', 25),
(128, '[SET02-hàng loại 1 CÓ SIZE] Set áo sơ mi dài tay kèm quần ống suông phong cách công sở dành cho nữ', 289000.00, 269000.00, '1699327184vn-11134207-7qukw-lipf6y6l39qkc3_tn.jpg,1699327201vn-11134207-7qukw-lipf6y6l8w0c66_tn.jpg', 7, 'Nữ', '“Một vài lý do để chọn chúng tôi ”\r\n\r\n🌸Chúng tôi đã chuẩn bị một phiếu giảm giá bất ngờ cho bạn, bạn có thể tự nhận hoặc trò chuyện riêng với bộ phận chăm sóc khách hàng của chúng tôi để nhận hàng🌸\r\n\r\n🧸Đó là một trải nghiệm thú vị từ khi nhìn thấy sản phẩm đến khi nhận sản phẩm, bạn sẽ thích shop của tôi🎁\r\n\r\n————————————————\r\n\r\n🎁Shop mình sẽ có số lượng lớn hàng mới lên kệ hàng tuần\r\n\r\n🎁Theo dõi cửa hàng của tôi để nhận phiếu giảm giá\r\n\r\n————————————————\r\n\r\n✨Mỗi sản phẩm của chúng tôi được mô tả chi tiết\r\n\r\n✨Thích hợp cho mọi lứa tuổi\r\n\r\n✨Phần trên được thiết kế vừa vặn với đôi chân của bạn, hỗ trợ tác động và trọng lượng của người mặc.\r\n\r\n✨Thiết kế đế dưới có thể bám dính tốt trên mọi bề mặt.\r\n\r\n✨Dễ dàng làm sạch và nhanh khô\r\n\r\n✨Có thể mặc bất cứ lúc nào\r\n\r\n————————————————\r\n\r\n🌴Chất lượng sản phẩm được đảm bảo và sẽ được kiểm tra trước khi xuất xưởng.\r\n\r\n🌴Mọi thắc mắc vui lòng tham khảo cửa hàng.\r\n\r\n🌴Sản phẩm có xuất xứ từ Trung Quốc và sẽ mất một thời gian để vận chuyển.\r\n\r\n🌴Nếu bạn cần sản phẩm của chúng tôi, vui lòng thêm chúng vào giỏ hàng của bạn, cảm ơn bạn rất nhiều.\r\n\r\n💌[Rất quan trọng, rất quan trọng]💌\r\n\r\n🎀Vui lòng kiểm tra xem số điện thoại và địa chỉ của bạn có chính xác không trước khi nhấp vào đơn đặt hàng.\r\n\r\n🎀Sản phẩm của chúng tôi là thương hiệu mới.\r\n\r\n🎀Chúng tôi nhấn mạnh chất lượng và giá cả thấp!\r\n\r\n🎀Sau khi nhận được gói hàng, nếu bạn hài lòng với mặt hàng, xin vui lòng cho nó một 5 sao⭐⭐⭐⭐⭐ Đánh giá và chào mừng bạn đến thăm chúng tôi một lần nữa😘😘', '2023-11-08 14:21:43', 25),
(129, 'Set Áo Tay Be Tay Phồng Khuy Ngọc Mix Chân Váy Midi Dài Hàng 2 Lớp Có Ảnh Thật Kèm Video', 175000.00, 155000.00, '1699327362vn-11134207-7qukw-lh4caz49fktuc4_tn.jpg,1699327362vn-11134207-7qukw-lh4caz491j5ee6.jpg', 6, 'Nữ', '⚡ THÔNG TIN SẢN PHẨM\r\n\r\n- Chất liệu: Vải 100% cotton 2 chiều cao cấp\r\n\r\n- Màu sắc: trắng, đen, xanh coban\r\n\r\n- Form áo: oversize\r\n\r\n- Thiết kế: logo in nổi silicon tệp màu áo\r\n\r\n- Phong cách Unisex phù hợp cho cả nam và nữ.\r\n\r\n- Áo Devotus là form rộng mặc thoải mái các bạn không cần up size trừ trường hợp thích mặc rộng.\r\n\r\n- Những trường hợp có thân hình đặt biệt thì inbox cho shop chiều cao và cân nặng để tư vấn size phù hợp nhé!', '2023-11-08 14:21:43', 25),
(130, 'ÁO BLAZER NỮ 2 LỚP HÀN QUỐC, ÁO VEST DẠ KẺ KHOÁC NGOÀI CHẤT ĐẸP CÓ SIZE', 320000.00, 300000.00, '1699327660f0787bf10e6e4c4fe90a03f895db9f30_tn.jpg,1699327660sg-11134201-23020-mk7w5pm1acnv80_tn.jpg', 7, 'Nữ', '“Một vài lý do để chọn chúng tôi ”\r\n\r\n🌸Chúng tôi đã chuẩn bị một phiếu giảm giá bất ngờ cho bạn, bạn có thể tự nhận hoặc trò chuyện riêng với bộ phận chăm sóc khách hàng của chúng tôi để nhận hàng🌸\r\n\r\n🧸Đó là một trải nghiệm thú vị từ khi nhìn thấy sản phẩm đến khi nhận sản phẩm, bạn sẽ thích shop của tôi🎁\r\n\r\n————————————————\r\n\r\n🎁Shop mình sẽ có số lượng lớn hàng mới lên kệ hàng tuần\r\n\r\n🎁Theo dõi cửa hàng của tôi để nhận phiếu giảm giá\r\n\r\n————————————————\r\n\r\n✨Mỗi sản phẩm của chúng tôi được mô tả chi tiết\r\n\r\n✨Thích hợp cho mọi lứa tuổi\r\n\r\n✨Phần trên được thiết kế vừa vặn với đôi chân của bạn, hỗ trợ tác động và trọng lượng của người mặc.\r\n\r\n✨Thiết kế đế dưới có thể bám dính tốt trên mọi bề mặt.\r\n\r\n✨Dễ dàng làm sạch và nhanh khô\r\n\r\n✨Có thể mặc bất cứ lúc nào\r\n\r\n————————————————\r\n\r\n🌴Chất lượng sản phẩm được đảm bảo và sẽ được kiểm tra trước khi xuất xưởng.\r\n\r\n🌴Mọi thắc mắc vui lòng tham khảo cửa hàng.\r\n\r\n🌴Sản phẩm có xuất xứ từ Trung Quốc và sẽ mất một thời gian để vận chuyển.\r\n\r\n🌴Nếu bạn cần sản phẩm của chúng tôi, vui lòng thêm chúng vào giỏ hàng của bạn, cảm ơn bạn rất nhiều.\r\n\r\n💌[Rất quan trọng, rất quan trọng]💌\r\n\r\n🎀Vui lòng kiểm tra xem số điện thoại và địa chỉ của bạn có chính xác không trước khi nhấp vào đơn đặt hàng.\r\n\r\n🎀Sản phẩm của chúng tôi là thương hiệu mới.\r\n\r\n🎀Chúng tôi nhấn mạnh chất lượng và giá cả thấp!\r\n\r\n🎀Sau khi nhận được gói hàng, nếu bạn hài lòng với mặt hàng, xin vui lòng cho nó một 5 sao⭐⭐⭐⭐⭐ Đánh giá và chào mừng bạn đến thăm chúng tôi một lần nữa😘😘', '2023-11-08 14:21:43', 25),
(131, ' Sét váy nữ 3 món,áo thun mix chân váy xếp li kèm áo gân xẻ tà,phong cách trẻ tr', 555000.00, 535000.00, '16993278329565a9ea9924270a1b1272e48f03dff6_tn.jpg,1699327832sg-11134201-22100-0qwr5pupqiiv81_tn.jpg,1699327832sg-11134201-22100-idbsupupqiiv0f_tn.jpg', 9, 'Nữ', '✔️ 1. CHẤT LIỆU SẢN PHẨM: Áo Hoodie nam nữ FORTUNATE APT Unisex Áo khoác hoodie nỉ bông From rộng Mũ to 2 lớp dây rút bản đôi mới nhất\r\n\r\n- Áo chất nỉ bông cotton loại tốt nên áo về lúc đầu sẽ dính lông ở mặt trong\r\n\r\n- Dây rút bản đôi mẫu mới nhất của năm năm tạo điểm nhấn cho chiếc áo\r\n\r\n-Mũ to 2 lớp vải dày dặn \r\n\r\n❤️ Mặc đôi mặc nhóm cực đẹp\r\n\r\n 🔰Đường may chuẩn chỉnh, tỉ mỉ, chắc chắn. - Mặc ở nhà, mặc đi chơi hoặc khi vận động thể thao. Phù hợp khi mix đồ với nhiều loại.  \r\n\r\n🔰Thiết kế hiện đại, đơn giản, trẻ trung, năng động. Dễ phối đồ.    \r\n\r\n⚜️ THÔNG SỐ CHỌN SIZE:\r\n\r\nsize M: <1m60, < 50kg / dài 68cm, rộng 51cm, \r\n\r\nSize L: < 1m72, <60 kg / dài 70cm, rộng 53cm, \r\n\r\nsize XL: >1m72, <70kg / dài 72cm, rộng 56cm,  ( lưu ý Trên 70 cân Không mặc vừa xin vùi lòng đừng đặt nếu trên 70 cân)\r\n\r\n(Bảng trên chỉ mang tính chất tham khảo, chọn mặc fom vừa vặn thoải mái, lên xuống size tuỳ theo sở thích ăn mặc của bạn) \r\n\r\n🔰Hoàn tiền 100% nếu sản phẩm lỗi, nhầm hoặc không giống với mô tả.  \r\n\r\n🔰Đổi hàng khi size không vừa (vui lòng nhắn tin riêng cho shop).  \r\n\r\n🔰Giao hàng toàn quốc, thanh toán khi nhận hàng. \r\n\r\n🔰Hỗ trợ đổi trả theo quy định của Shopee.  \r\n\r\n✔️ 3. HƯỚNG DẪN BẢO QUẢN:\r\n\r\n- Lần đầu nhận áo, bạn xả với nước mát rồi phơi khô nhé\r\n\r\n- Phân loại màu quần áo và giặt riêng các sản phẩm khác màu\r\n\r\n- Lộn mặt trái sản phẩm khi giặt\r\n\r\n- Hòa bột giặt nhẹ/ nước giặt nhẹ với nước rồi mới cho quần áo vào giặt\r\n\r\n- Tuyệt đối không đổ trực tiếp bột giặt/ nước giặt/ nước xả lên quần áo => sẽ khiến quần áo bị mất màu liền\r\n\r\n- Không dùng CHẤT TẨY/bột giặt tỏa nhiệt để giặt\r\n\r\n- Không sử dụng nước nóng để giặt đồ\r\n\r\n- Không ngâm quần áo với nước xả vải quá 15 phút. (Sản phẩm mới nên được giặt bằng nước thường trong 2-3 lần đầu sử dụng ạ)\r\n\r\n- Phơi dưới nắng nhẹ, hạn chế tiếp xúc trực tiếp dưới ánh mặt trời', '2023-11-08 14:21:43', 25),
(132, ' Áo khoác Hoodie Nam Hoodie Basic Unisex Nỉ From Rộng', 200000.00, 180000.00, '1699328174vn-11134207-7r98o-llue4iroiy8vbb_tn.jpg,1699328174vn-11134207-7r98o-llue4iron5y7d8_tn.jpg,1699328174vn-11134207-7r98o-llue4iropz330e_tn.jpg,1699328174vn-11134207-7r98o-llue4irou6sfd5_tn.jpg', 7, 'Áo khoác', '✔️ 1. CHẤT LIỆU SẢN PHẨM: Áo Hoodie nam nữ FORTUNATE APT Unisex Áo khoác hoodie nỉ bông From rộng Mũ to 2 lớp dây rút bản đôi mới nhất\r\n\r\n- Áo chất nỉ bông cotton loại tốt nên áo về lúc đầu sẽ dính lông ở mặt trong\r\n\r\n- Dây rút bản đôi mẫu mới nhất của năm năm tạo điểm nhấn cho chiếc áo\r\n\r\n-Mũ to 2 lớp vải dày dặn \r\n\r\n❤️ Mặc đôi mặc nhóm cực đẹp\r\n\r\n 🔰Đường may chuẩn chỉnh, tỉ mỉ, chắc chắn. - Mặc ở nhà, mặc đi chơi hoặc khi vận động thể thao. Phù hợp khi mix đồ với nhiều loại.  \r\n\r\n🔰Thiết kế hiện đại, đơn giản, trẻ trung, năng động. Dễ phối đồ.    \r\n\r\n⚜️ THÔNG SỐ CHỌN SIZE:\r\n\r\nsize M: <1m60, < 50kg / dài 68cm, rộng 51cm, \r\n\r\nSize L: < 1m72, <60 kg / dài 70cm, rộng 53cm, \r\n\r\nsize XL: >1m72, <70kg / dài 72cm, rộng 56cm,  ( lưu ý Trên 70 cân Không mặc vừa xin vùi lòng đừng đặt nếu trên 70 cân)\r\n\r\n(Bảng trên chỉ mang tính chất tham khảo, chọn mặc fom vừa vặn thoải mái, lên xuống size tuỳ theo sở thích ăn mặc của bạn) \r\n\r\n🔰Hoàn tiền 100% nếu sản phẩm lỗi, nhầm hoặc không giống với mô tả.  \r\n\r\n🔰Đổi hàng khi size không vừa (vui lòng nhắn tin riêng cho shop).  \r\n\r\n🔰Giao hàng toàn quốc, thanh toán khi nhận hàng. \r\n\r\n🔰Hỗ trợ đổi trả theo quy định của Shopee.  \r\n\r\n✔️ 3. HƯỚNG DẪN BẢO QUẢN:\r\n\r\n- Lần đầu nhận áo, bạn xả với nước mát rồi phơi khô nhé\r\n\r\n- Phân loại màu quần áo và giặt riêng các sản phẩm khác màu\r\n\r\n- Lộn mặt trái sản phẩm khi giặt\r\n\r\n- Hòa bột giặt nhẹ/ nước giặt nhẹ với nước rồi mới cho quần áo vào giặt\r\n\r\n- Tuyệt đối không đổ trực tiếp bột giặt/ nước giặt/ nước xả lên quần áo => sẽ khiến quần áo bị mất màu liền\r\n\r\n- Không dùng CHẤT TẨY/bột giặt tỏa nhiệt để giặt\r\n\r\n- Không sử dụng nước nóng để giặt đồ\r\n\r\n- Không ngâm quần áo với nước xả vải quá 15 phút. (Sản phẩm mới nên được giặt bằng nước thường trong 2-3 lần đầu sử dụng ạ)\r\n\r\n- Phơi dưới nắng nhẹ, hạn chế tiếp xúc trực tiếp dưới ánh mặt trời', '2023-11-08 14:21:43', 27),
(133, 'Áo Khoác jean nam nữ Unisex  Avocado, áo khoác jacket nam bò form rộng màu Xanh Đen xám trắng', 169000.00, 149000.00, '1699328409vn-11134201-7r98o-lkkjloni8q221b_tn.jpg,1699328409vn-11134207-7r98o-ll1xghkcq47f8a_tn.jpg,1699328409vn-11134207-7r98o-lm474qm93owv25_tn.jpg', 15, 'Áo khoác', '⚡ THÔNG TIN SẢN PHẨM\r\n\r\n- Chất liệu: Vải 100% cotton 2 chiều cao cấp\r\n\r\n- Màu sắc: trắng, đen, xanh coban\r\n\r\n- Form áo: oversize\r\n\r\n- Thiết kế: logo in nổi silicon tệp màu áo\r\n\r\n- Phong cách Unisex phù hợp cho cả nam và nữ.\r\n\r\n- Áo Devotus là form rộng mặc thoải mái các bạn không cần up size trừ trường hợp thích mặc rộng.\r\n\r\n- Những trường hợp có thân hình đặt biệt thì inbox cho shop chiều cao và cân nặng để tư vấn size phù hợp nhé!', '2023-11-08 14:21:43', 24),
(134, 'Áo Khoác Thể Thao Adidas Logo Thêu Chất Nỉ 2 Lớp Dày Dặn Cao Cấp', 150000.00, 130000.00, '1699328554vn-11134207-7r98o-llwcxuhfzwf398_tn.jpg', 6, 'Áo khoác', '✔️ 1. CHẤT LIỆU SẢN PHẨM: Áo Hoodie nam nữ FORTUNATE APT Unisex Áo khoác hoodie nỉ bông From rộng Mũ to 2 lớp dây rút bản đôi mới nhất\r\n\r\n- Áo chất nỉ bông cotton loại tốt nên áo về lúc đầu sẽ dính lông ở mặt trong\r\n\r\n- Dây rút bản đôi mẫu mới nhất của năm năm tạo điểm nhấn cho chiếc áo\r\n\r\n-Mũ to 2 lớp vải dày dặn \r\n\r\n❤️ Mặc đôi mặc nhóm cực đẹp\r\n\r\n 🔰Đường may chuẩn chỉnh, tỉ mỉ, chắc chắn. - Mặc ở nhà, mặc đi chơi hoặc khi vận động thể thao. Phù hợp khi mix đồ với nhiều loại.  \r\n\r\n🔰Thiết kế hiện đại, đơn giản, trẻ trung, năng động. Dễ phối đồ.    \r\n\r\n⚜️ THÔNG SỐ CHỌN SIZE:\r\n\r\nsize M: <1m60, < 50kg / dài 68cm, rộng 51cm, \r\n\r\nSize L: < 1m72, <60 kg / dài 70cm, rộng 53cm, \r\n\r\nsize XL: >1m72, <70kg / dài 72cm, rộng 56cm,  ( lưu ý Trên 70 cân Không mặc vừa xin vùi lòng đừng đặt nếu trên 70 cân)\r\n\r\n(Bảng trên chỉ mang tính chất tham khảo, chọn mặc fom vừa vặn thoải mái, lên xuống size tuỳ theo sở thích ăn mặc của bạn) \r\n\r\n🔰Hoàn tiền 100% nếu sản phẩm lỗi, nhầm hoặc không giống với mô tả.  \r\n\r\n🔰Đổi hàng khi size không vừa (vui lòng nhắn tin riêng cho shop).  \r\n\r\n🔰Giao hàng toàn quốc, thanh toán khi nhận hàng. \r\n\r\n🔰Hỗ trợ đổi trả theo quy định của Shopee.  \r\n\r\n✔️ 3. HƯỚNG DẪN BẢO QUẢN:\r\n\r\n- Lần đầu nhận áo, bạn xả với nước mát rồi phơi khô nhé\r\n\r\n- Phân loại màu quần áo và giặt riêng các sản phẩm khác màu\r\n\r\n- Lộn mặt trái sản phẩm khi giặt\r\n\r\n- Hòa bột giặt nhẹ/ nước giặt nhẹ với nước rồi mới cho quần áo vào giặt\r\n\r\n- Tuyệt đối không đổ trực tiếp bột giặt/ nước giặt/ nước xả lên quần áo => sẽ khiến quần áo bị mất màu liền\r\n\r\n- Không dùng CHẤT TẨY/bột giặt tỏa nhiệt để giặt\r\n\r\n- Không sử dụng nước nóng để giặt đồ\r\n\r\n- Không ngâm quần áo với nước xả vải quá 15 phút. (Sản phẩm mới nên được giặt bằng nước thường trong 2-3 lần đầu sử dụng ạ)\r\n\r\n- Phơi dưới nắng nhẹ, hạn chế tiếp xúc trực tiếp dưới ánh mặt trời', '2023-11-08 14:21:43', 27),
(135, 'XẢ KHO SIÊU RẺ Giày thể thao nữ đế độn 5p SO STO Full trắng Cao Cấp', 99000.00, 79000.00, '1699328760vn-11134201-7r98o-lkut4jf21cjvff.jpg', 10, 'Giày', '“Một vài lý do để chọn chúng tôi ”\r\n\r\n🌸Chúng tôi đã chuẩn bị một phiếu giảm giá bất ngờ cho bạn, bạn có thể tự nhận hoặc trò chuyện riêng với bộ phận chăm sóc khách hàng của chúng tôi để nhận hàng🌸\r\n\r\n🧸Đó là một trải nghiệm thú vị từ khi nhìn thấy sản phẩm đến khi nhận sản phẩm, bạn sẽ thích shop của tôi🎁\r\n\r\n————————————————\r\n\r\n🎁Shop mình sẽ có số lượng lớn hàng mới lên kệ hàng tuần\r\n\r\n🎁Theo dõi cửa hàng của tôi để nhận phiếu giảm giá\r\n\r\n————————————————\r\n\r\n✨Mỗi sản phẩm của chúng tôi được mô tả chi tiết\r\n\r\n✨Thích hợp cho mọi lứa tuổi\r\n\r\n✨Phần trên được thiết kế vừa vặn với đôi chân của bạn, hỗ trợ tác động và trọng lượng của người mặc.\r\n\r\n✨Thiết kế đế dưới có thể bám dính tốt trên mọi bề mặt.\r\n\r\n✨Dễ dàng làm sạch và nhanh khô\r\n\r\n✨Có thể mặc bất cứ lúc nào\r\n\r\n————————————————\r\n\r\n🌴Chất lượng sản phẩm được đảm bảo và sẽ được kiểm tra trước khi xuất xưởng.\r\n\r\n🌴Mọi thắc mắc vui lòng tham khảo cửa hàng.\r\n\r\n🌴Sản phẩm có xuất xứ từ Trung Quốc và sẽ mất một thời gian để vận chuyển.\r\n\r\n🌴Nếu bạn cần sản phẩm của chúng tôi, vui lòng thêm chúng vào giỏ hàng của bạn, cảm ơn bạn rất nhiều.\r\n\r\n💌[Rất quan trọng, rất quan trọng]💌\r\n\r\n🎀Vui lòng kiểm tra xem số điện thoại và địa chỉ của bạn có chính xác không trước khi nhấp vào đơn đặt hàng.\r\n\r\n🎀Sản phẩm của chúng tôi là thương hiệu mới.\r\n\r\n🎀Chúng tôi nhấn mạnh chất lượng và giá cả thấp!\r\n\r\n🎀Sau khi nhận được gói hàng, nếu bạn hài lòng với mặt hàng, xin vui lòng cho nó một 5 sao⭐⭐⭐⭐⭐ Đánh giá và chào mừng bạn đến thăm chúng tôi một lần nữa😘😘', '2023-11-08 14:21:43', 26),
(136, 'Giầy thể thao nữ cao cấp SOY NÂU TÂY đế độn tăng chiều cao 7cm răng cưa chống mài mòn', 490000.00, 470000.00, '1699328889th-11134201-23020-jf8go11mwknv60_tn.jpg', 10, 'Giày', '“Một vài lý do để chọn chúng tôi ”\r\n\r\n🌸Chúng tôi đã chuẩn bị một phiếu giảm giá bất ngờ cho bạn, bạn có thể tự nhận hoặc trò chuyện riêng với bộ phận chăm sóc khách hàng của chúng tôi để nhận hàng🌸\r\n\r\n🧸Đó là một trải nghiệm thú vị từ khi nhìn thấy sản phẩm đến khi nhận sản phẩm, bạn sẽ thích shop của tôi🎁\r\n\r\n————————————————\r\n\r\n🎁Shop mình sẽ có số lượng lớn hàng mới lên kệ hàng tuần\r\n\r\n🎁Theo dõi cửa hàng của tôi để nhận phiếu giảm giá\r\n\r\n————————————————\r\n\r\n✨Mỗi sản phẩm của chúng tôi được mô tả chi tiết\r\n\r\n✨Thích hợp cho mọi lứa tuổi\r\n\r\n✨Phần trên được thiết kế vừa vặn với đôi chân của bạn, hỗ trợ tác động và trọng lượng của người mặc.\r\n\r\n✨Thiết kế đế dưới có thể bám dính tốt trên mọi bề mặt.\r\n\r\n✨Dễ dàng làm sạch và nhanh khô\r\n\r\n✨Có thể mặc bất cứ lúc nào\r\n\r\n————————————————\r\n\r\n🌴Chất lượng sản phẩm được đảm bảo và sẽ được kiểm tra trước khi xuất xưởng.\r\n\r\n🌴Mọi thắc mắc vui lòng tham khảo cửa hàng.\r\n\r\n🌴Sản phẩm có xuất xứ từ Trung Quốc và sẽ mất một thời gian để vận chuyển.\r\n\r\n🌴Nếu bạn cần sản phẩm của chúng tôi, vui lòng thêm chúng vào giỏ hàng của bạn, cảm ơn bạn rất nhiều.\r\n\r\n💌[Rất quan trọng, rất quan trọng]💌\r\n\r\n🎀Vui lòng kiểm tra xem số điện thoại và địa chỉ của bạn có chính xác không trước khi nhấp vào đơn đặt hàng.\r\n\r\n🎀Sản phẩm của chúng tôi là thương hiệu mới.\r\n\r\n🎀Chúng tôi nhấn mạnh chất lượng và giá cả thấp!\r\n\r\n🎀Sau khi nhận được gói hàng, nếu bạn hài lòng với mặt hàng, xin vui lòng cho nó một 5 sao⭐⭐⭐⭐⭐ Đánh giá và chào mừng bạn đến thăm chúng tôi một lần nữa😘😘', '2023-11-08 14:21:43', 26),
(137, 'có hàng sẵn giày nữ thể thao nữ giày Đáy mềm dày thoải mái và thoáng khí Giày Chạy Bộ-AA0204', 159000.00, 139000.00, '1699329028sg-11134201-7qvg7-lf6oibyyymprf3_tn.jpg', 10, 'Giày', '“Một vài lý do để chọn chúng tôi ”\r\n\r\n🌸Chúng tôi đã chuẩn bị một phiếu giảm giá bất ngờ cho bạn, bạn có thể tự nhận hoặc trò chuyện riêng với bộ phận chăm sóc khách hàng của chúng tôi để nhận hàng🌸\r\n\r\n🧸Đó là một trải nghiệm thú vị từ khi nhìn thấy sản phẩm đến khi nhận sản phẩm, bạn sẽ thích shop của tôi🎁\r\n\r\n————————————————\r\n\r\n🎁Shop mình sẽ có số lượng lớn hàng mới lên kệ hàng tuần\r\n\r\n🎁Theo dõi cửa hàng của tôi để nhận phiếu giảm giá\r\n\r\n————————————————\r\n\r\n✨Mỗi sản phẩm của chúng tôi được mô tả chi tiết\r\n\r\n✨Thích hợp cho mọi lứa tuổi\r\n\r\n✨Phần trên được thiết kế vừa vặn với đôi chân của bạn, hỗ trợ tác động và trọng lượng của người mặc.\r\n\r\n✨Thiết kế đế dưới có thể bám dính tốt trên mọi bề mặt.\r\n\r\n✨Dễ dàng làm sạch và nhanh khô\r\n\r\n✨Có thể mặc bất cứ lúc nào\r\n\r\n————————————————\r\n\r\n🌴Chất lượng sản phẩm được đảm bảo và sẽ được kiểm tra trước khi xuất xưởng.\r\n\r\n🌴Mọi thắc mắc vui lòng tham khảo cửa hàng.\r\n\r\n🌴Sản phẩm có xuất xứ từ Trung Quốc và sẽ mất một thời gian để vận chuyển.\r\n\r\n🌴Nếu bạn cần sản phẩm của chúng tôi, vui lòng thêm chúng vào giỏ hàng của bạn, cảm ơn bạn rất nhiều.\r\n\r\n💌[Rất quan trọng, rất quan trọng]💌\r\n\r\n🎀Vui lòng kiểm tra xem số điện thoại và địa chỉ của bạn có chính xác không trước khi nhấp vào đơn đặt hàng.\r\n\r\n🎀Sản phẩm của chúng tôi là thương hiệu mới.\r\n\r\n🎀Chúng tôi nhấn mạnh chất lượng và giá cả thấp!\r\n\r\n🎀Sau khi nhận được gói hàng, nếu bạn hài lòng với mặt hàng, xin vui lòng cho nó một 5 sao⭐⭐⭐⭐⭐ Đánh giá và chào mừng bạn đến thăm chúng tôi một lần nữa😘😘', '2023-11-08 14:21:43', 26),
(138, 'Giày Nike_ AF1 LV Xám Nam Nữ, Giày Air Force 1 Louis Vuitton Xám Bản Cao Cấp Hót Trend 2023,Hàng Ful', 630000.00, 610000.00, '1699329197vn-11134207-7r98o-lngsmmb89wx990.jpg', 16, 'Giày', '“Một vài lý do để chọn chúng tôi ”\r\n\r\n🌸Chúng tôi đã chuẩn bị một phiếu giảm giá bất ngờ cho bạn, bạn có thể tự nhận hoặc trò chuyện riêng với bộ phận chăm sóc khách hàng của chúng tôi để nhận hàng🌸\r\n\r\n🧸Đó là một trải nghiệm thú vị từ khi nhìn thấy sản phẩm đến khi nhận sản phẩm, bạn sẽ thích shop của tôi🎁\r\n\r\n————————————————\r\n\r\n🎁Shop mình sẽ có số lượng lớn hàng mới lên kệ hàng tuần\r\n\r\n🎁Theo dõi cửa hàng của tôi để nhận phiếu giảm giá\r\n\r\n————————————————\r\n\r\n✨Mỗi sản phẩm của chúng tôi được mô tả chi tiết\r\n\r\n✨Thích hợp cho mọi lứa tuổi\r\n\r\n✨Phần trên được thiết kế vừa vặn với đôi chân của bạn, hỗ trợ tác động và trọng lượng của người mặc.\r\n\r\n✨Thiết kế đế dưới có thể bám dính tốt trên mọi bề mặt.\r\n\r\n✨Dễ dàng làm sạch và nhanh khô\r\n\r\n✨Có thể mặc bất cứ lúc nào\r\n\r\n————————————————\r\n\r\n🌴Chất lượng sản phẩm được đảm bảo và sẽ được kiểm tra trước khi xuất xưởng.\r\n\r\n🌴Mọi thắc mắc vui lòng tham khảo cửa hàng.\r\n\r\n🌴Sản phẩm có xuất xứ từ Trung Quốc và sẽ mất một thời gian để vận chuyển.\r\n\r\n🌴Nếu bạn cần sản phẩm của chúng tôi, vui lòng thêm chúng vào giỏ hàng của bạn, cảm ơn bạn rất nhiều.\r\n\r\n💌[Rất quan trọng, rất quan trọng]💌\r\n\r\n🎀Vui lòng kiểm tra xem số điện thoại và địa chỉ của bạn có chính xác không trước khi nhấp vào đơn đặt hàng.\r\n\r\n🎀Sản phẩm của chúng tôi là thương hiệu mới.\r\n\r\n🎀Chúng tôi nhấn mạnh chất lượng và giá cả thấp!\r\n\r\n🎀Sau khi nhận được gói hàng, nếu bạn hài lòng với mặt hàng, xin vui lòng cho nó một 5 sao⭐⭐⭐⭐⭐ Đánh giá và chào mừng bạn đến thăm chúng tôi một lần nữa😘😘', '2023-11-08 14:21:43', 26),
(139, 'Áo Len Sọc Chó', 199000.00, 179000.00, '1699370092z4808971951582_4a6526f24c033c4d1274c067bdb7e15c.jpg', 8, 'Nam', '⚡ THÔNG TIN SẢN PHẨM\r\n\r\n- Chất liệu: Vải 100% cotton 2 chiều cao cấp\r\n\r\n- Màu sắc: trắng, đen, xanh coban\r\n\r\n- Form áo: oversize\r\n\r\n- Thiết kế: logo in nổi silicon tệp màu áo\r\n\r\n- Phong cách Unisex phù hợp cho cả nam và nữ.\r\n\r\n- Áo Devotus là form rộng mặc thoải mái các bạn không cần up size trừ trường hợp thích mặc rộng.\r\n\r\n- Những trường hợp có thân hình đặt biệt thì inbox cho shop chiều cao và cân nặng để tư vấn size phù hợp nhé!', '2023-11-08 14:21:43', 24),
(141, 'Áo len mùa đông', 290000.00, 270000.00, '1699428598z4808968394308_cfad08347f5686fa540a641697cf7dfc.jpg,1699428598z4808968399337_19657994b0670eed5e04312efea293c7.jpg,1699428598z4808968399352_fb680e6b762717f3261b2ff7c8528ad6.jpg,1699428598z4808968400086_a02fee60b3419c03ca5b1c8de33856c8.jpg,1699428598z4808968400179_9be882889f08c9d1be5ed9148110a761.jpg,1699428598z4808968400214_33854ed6ed91ad72f92304aa1c7141d3.jpg', 4, 'Nam', '✔️ 1. CHẤT LIỆU SẢN PHẨM: Áo Hoodie nam nữ FORTUNATE APT Unisex Áo khoác hoodie nỉ bông From rộng Mũ to 2 lớp dây rút bản đôi mới nhất\r\n\r\n- Áo chất nỉ bông cotton loại tốt nên áo về lúc đầu sẽ dính lông ở mặt trong\r\n\r\n- Dây rút bản đôi mẫu mới nhất của năm năm tạo điểm nhấn cho chiếc áo\r\n\r\n-Mũ to 2 lớp vải dày dặn \r\n\r\n❤️ Mặc đôi mặc nhóm cực đẹp\r\n\r\n 🔰Đường may chuẩn chỉnh, tỉ mỉ, chắc chắn. - Mặc ở nhà, mặc đi chơi hoặc khi vận động thể thao. Phù hợp khi mix đồ với nhiều loại.  \r\n\r\n🔰Thiết kế hiện đại, đơn giản, trẻ trung, năng động. Dễ phối đồ.    \r\n\r\n⚜️ THÔNG SỐ CHỌN SIZE:\r\n\r\nsize M: <1m60, < 50kg / dài 68cm, rộng 51cm, \r\n\r\nSize L: < 1m72, <60 kg / dài 70cm, rộng 53cm, \r\n\r\nsize XL: >1m72, <70kg / dài 72cm, rộng 56cm,  ( lưu ý Trên 70 cân Không mặc vừa xin vùi lòng đừng đặt nếu trên 70 cân)\r\n\r\n(Bảng trên chỉ mang tính chất tham khảo, chọn mặc fom vừa vặn thoải mái, lên xuống size tuỳ theo sở thích ăn mặc của bạn) \r\n\r\n🔰Hoàn tiền 100% nếu sản phẩm lỗi, nhầm hoặc không giống với mô tả.  \r\n\r\n🔰Đổi hàng khi size không vừa (vui lòng nhắn tin riêng cho shop).  \r\n\r\n🔰Giao hàng toàn quốc, thanh toán khi nhận hàng. \r\n\r\n🔰Hỗ trợ đổi trả theo quy định của Shopee.  \r\n\r\n✔️ 3. HƯỚNG DẪN BẢO QUẢN:\r\n\r\n- Lần đầu nhận áo, bạn xả với nước mát rồi phơi khô nhé\r\n\r\n- Phân loại màu quần áo và giặt riêng các sản phẩm khác màu\r\n\r\n- Lộn mặt trái sản phẩm khi giặt\r\n\r\n- Hòa bột giặt nhẹ/ nước giặt nhẹ với nước rồi mới cho quần áo vào giặt\r\n\r\n- Tuyệt đối không đổ trực tiếp bột giặt/ nước giặt/ nước xả lên quần áo => sẽ khiến quần áo bị mất màu liền\r\n\r\n- Không dùng CHẤT TẨY/bột giặt tỏa nhiệt để giặt\r\n\r\n- Không sử dụng nước nóng để giặt đồ\r\n\r\n- Không ngâm quần áo với nước xả vải quá 15 phút. (Sản phẩm mới nên được giặt bằng nước thường trong 2-3 lần đầu sử dụng ạ)\r\n\r\n- Phơi dưới nắng nhẹ, hạn chế tiếp xúc trực tiếp dưới ánh mặt trời', '2023-11-08 14:21:43', 27),
(142, 'Dép Lê Quai Ngang Essentials Nữ Nam Phong Cách Thời Trang Hàng Chuẩn Loại 1 CSD026', 139000.00, 119000.00, '1699456324cad454084ef65486121e31291992effa_tn.jpg,1699456324ffef71e631103d67e8b18f444de20994_tn.jpg,1699456324vn-11134207-7r98o-ln89vn7fyz3n47_tn.jpg', 2, 'Dép', '🌈 Chào mừng đến với cửa hàng của chúng tôi.\r\n\r\n\r\n\r\n  🌈 Theo dõi cửa hàng để nhận phiếu giảm giá ”◕‿◕｡\r\n\r\n\r\n\r\n  🌈 Nếu bạn hài lòng với sản phẩm và dịch vụ của chúng tôi Lời khen ngợi năm sao\r\n\r\n\r\n\r\n  🚚 Sản phẩm đến từ Trung Quốc và mất một thời gian để vận chuyển\r\n\r\n\r\n\r\n  💕 Phải mặc! Phổ biến vào năm 2023!\r\n\r\n\r\n\r\n  💕Được làm bằng chất liệu cao cấp, đủ bền để bạn mặc hàng ngày!\r\n\r\n\r\n\r\n  💕 Thật thoải mái Chất liệu vải mềm mại, hình dáng đẹp, chất lượng tốt.\r\n\r\n\r\n\r\n  💕 Thiết kế đẹp, sang trọng, độc đáo.\r\n\r\n\r\n\r\n  💕 Nó là một món quà tốt cho người yêu của bạn hoặc chính bạn.\r\n\r\n\r\n\r\n  ❣️ Chất lượng và giá cả như thế này không thể tìm thấy ở bất kỳ nơi nào khác, rất đáng đồng tiền. ️\r\n\r\n\r\n\r\n  ❣️Do các thiết bị hiển thị và chiếu sáng khác nhau, hình ảnh có thể không phản ánh màu sắc thực tế của tất cả các sản phẩm. Cảm ơn bạn đã thông cảm ❣️\r\n\r\n\r\n\r\n  ❣️ Đánh giá 1 hoặc 2 sao không có lý do / hình minh họa. hoặc đặt điều gì đó không đúng sự thật làm hỏng danh tiếng của shop shop sẽ không giúp gì cả vì bạn được coi là đang vào vì lợi ích của Shop, đặc biệt cảm ơn quý khách hàng đã có nhu cầu vui lòng đặt hàng hoặc yêu cầu thêm thông tin tin tin nhé ️\r\n\r\n\r\n', '2023-11-08 15:12:04', 26),
(143, 'Dép 3LENCIAGA UNISEX quai ngang cao cấp cho bạn trẻ sành điệu, chống trơn trượt siêu HOT HIT', 62000.00, 42000.00, '1699456477vn-11134207-7r98o-lmh19xzbr6xrf7_tn.jpg', 4, 'Dép', '🌈 Chào mừng đến với cửa hàng của chúng tôi.\r\n\r\n\r\n\r\n  🌈 Theo dõi cửa hàng để nhận phiếu giảm giá ”◕‿◕｡\r\n\r\n\r\n\r\n  🌈 Nếu bạn hài lòng với sản phẩm và dịch vụ của chúng tôi Lời khen ngợi năm sao\r\n\r\n\r\n\r\n  🚚 Sản phẩm đến từ Trung Quốc và mất một thời gian để vận chuyển\r\n\r\n\r\n\r\n  💕 Phải mặc! Phổ biến vào năm 2023!\r\n\r\n\r\n\r\n  💕Được làm bằng chất liệu cao cấp, đủ bền để bạn mặc hàng ngày!\r\n\r\n\r\n\r\n  💕 Thật thoải mái Chất liệu vải mềm mại, hình dáng đẹp, chất lượng tốt.\r\n\r\n\r\n\r\n  💕 Thiết kế đẹp, sang trọng, độc đáo.\r\n\r\n\r\n\r\n  💕 Nó là một món quà tốt cho người yêu của bạn hoặc chính bạn.\r\n\r\n\r\n\r\n  ❣️ Chất lượng và giá cả như thế này không thể tìm thấy ở bất kỳ nơi nào khác, rất đáng đồng tiền. ️\r\n\r\n\r\n\r\n  ❣️Do các thiết bị hiển thị và chiếu sáng khác nhau, hình ảnh có thể không phản ánh màu sắc thực tế của tất cả các sản phẩm. Cảm ơn bạn đã thông cảm ❣️\r\n\r\n\r\n\r\n  ❣️ Đánh giá 1 hoặc 2 sao không có lý do / hình minh họa. hoặc đặt điều gì đó không đúng sự thật làm hỏng danh tiếng của shop shop sẽ không giúp gì cả vì bạn được coi là đang vào vì lợi ích của Shop, đặc biệt cảm ơn quý khách hàng đã có nhu cầu vui lòng đặt hàng hoặc yêu cầu thêm thông tin tin tin nhé ️\r\n\r\n\r\n', '2023-11-08 15:14:37', 26),
(144, 'GUDETUXăng đan Đế Dày Thời Trang Dành Cho Nam Dép crocs Chống Trượt In Họa Tiết Hoạt Hình Thời Trang', 85000.00, 65000.00, '1699456726cn-11134207-7r98o-lmr28z0aal2aef_tn.jpg,1699456726sg-11134201-7qvdd-lkevqj4ovu0wcf_tn.jpg,1699456726sg-11134201-7rbmq-lmfj81ssbsrec1_tn.jpg', 2, 'Dép', '🌈 Chào mừng đến với cửa hàng của chúng tôi.\r\n\r\n\r\n\r\n  🌈 Theo dõi cửa hàng để nhận phiếu giảm giá ”◕‿◕｡\r\n\r\n\r\n\r\n  🌈 Nếu bạn hài lòng với sản phẩm và dịch vụ của chúng tôi Lời khen ngợi năm sao\r\n\r\n\r\n\r\n  🚚 Sản phẩm đến từ Trung Quốc và mất một thời gian để vận chuyển\r\n\r\n\r\n\r\n  💕 Phải mặc! Phổ biến vào năm 2023!\r\n\r\n\r\n\r\n  💕Được làm bằng chất liệu cao cấp, đủ bền để bạn mặc hàng ngày!\r\n\r\n\r\n\r\n  💕 Thật thoải mái Chất liệu vải mềm mại, hình dáng đẹp, chất lượng tốt.\r\n\r\n\r\n\r\n  💕 Thiết kế đẹp, sang trọng, độc đáo.\r\n\r\n\r\n\r\n  💕 Nó là một món quà tốt cho người yêu của bạn hoặc chính bạn.\r\n\r\n\r\n\r\n  ❣️ Chất lượng và giá cả như thế này không thể tìm thấy ở bất kỳ nơi nào khác, rất đáng đồng tiền. ️\r\n\r\n\r\n\r\n  ❣️Do các thiết bị hiển thị và chiếu sáng khác nhau, hình ảnh có thể không phản ánh màu sắc thực tế của tất cả các sản phẩm. Cảm ơn bạn đã thông cảm ❣️\r\n\r\n\r\n\r\n  ❣️ Đánh giá 1 hoặc 2 sao không có lý do / hình minh họa. hoặc đặt điều gì đó không đúng sự thật làm hỏng danh tiếng của shop shop sẽ không giúp gì cả vì bạn được coi là đang vào vì lợi ích của Shop, đặc biệt cảm ơn quý khách hàng đã có nhu cầu vui lòng đặt hàng hoặc yêu cầu thêm thông tin tin tin nhé ️\r\n\r\n\r\n', '2023-11-08 15:18:46', 26),
(145, 'Dép lông đi trong nhà, dép bông nữ thời trang thu đông hottrend', 79000.00, 59000.00, '1699456981vn-11134207-7r98o-llybilwwhnmn75_tn.jpg,1699456981vn-11134207-7r98o-llybilwx5jhb2a_tn.jpg,1699456981vn-11134207-7r98o-lmu7krlbs0yn8b_tn.jpg', 2, 'Dép', '🌈 Chào mừng đến với cửa hàng của chúng tôi.\r\n\r\n\r\n\r\n  🌈 Theo dõi cửa hàng để nhận phiếu giảm giá ”◕‿◕｡\r\n\r\n\r\n\r\n  🌈 Nếu bạn hài lòng với sản phẩm và dịch vụ của chúng tôi Lời khen ngợi năm sao\r\n\r\n\r\n\r\n  🚚 Sản phẩm đến từ Trung Quốc và mất một thời gian để vận chuyển\r\n\r\n\r\n\r\n  💕 Phải mặc! Phổ biến vào năm 2023!\r\n\r\n\r\n\r\n  💕Được làm bằng chất liệu cao cấp, đủ bền để bạn mặc hàng ngày!\r\n\r\n\r\n\r\n  💕 Thật thoải mái Chất liệu vải mềm mại, hình dáng đẹp, chất lượng tốt.\r\n\r\n\r\n\r\n  💕 Thiết kế đẹp, sang trọng, độc đáo.\r\n\r\n\r\n\r\n  💕 Nó là một món quà tốt cho người yêu của bạn hoặc chính bạn.\r\n\r\n\r\n\r\n  ❣️ Chất lượng và giá cả như thế này không thể tìm thấy ở bất kỳ nơi nào khác, rất đáng đồng tiền. ️\r\n\r\n\r\n\r\n  ❣️Do các thiết bị hiển thị và chiếu sáng khác nhau, hình ảnh có thể không phản ánh màu sắc thực tế của tất cả các sản phẩm. Cảm ơn bạn đã thông cảm ❣️\r\n\r\n\r\n\r\n  ❣️ Đánh giá 1 hoặc 2 sao không có lý do / hình minh họa. hoặc đặt điều gì đó không đúng sự thật làm hỏng danh tiếng của shop shop sẽ không giúp gì cả vì bạn được coi là đang vào vì lợi ích của Shop, đặc biệt cảm ơn quý khách hàng đã có nhu cầu vui lòng đặt hàng hoặc yêu cầu thêm thông tin tin tin nhé ️\r\n\r\n\r\n', '2023-11-08 15:23:01', 26),
(147, 'Set yếm caro nâu xám đan eo sau kèm áo sơ mi trắng viền ren', 249000.00, 229000.00, '1699458545cb4362f54d9f3b5bb1ab4c86a4c4cc88_tn.jpg,1699458545eae5d35f28848fc5dd3f88b77931ba74_tn.jpg,1699458545sg-11134201-22120-1y2flqin5klve1_tn.jpg,1699458545sg-11134201-22120-wr9e6qin5klv89_tn.jpg', 4, 'Áo mới nhất', '✔️ 1. CHẤT LIỆU SẢN PHẨM: Áo Hoodie nam nữ FORTUNATE APT Unisex Áo khoác hoodie nỉ bông From rộng Mũ to 2 lớp dây rút bản đôi mới nhất\r\n\r\n- Áo chất nỉ bông cotton loại tốt nên áo về lúc đầu sẽ dính lông ở mặt trong\r\n\r\n- Dây rút bản đôi mẫu mới nhất của năm năm tạo điểm nhấn cho chiếc áo\r\n\r\n-Mũ to 2 lớp vải dày dặn \r\n\r\n❤️ Mặc đôi mặc nhóm cực đẹp\r\n\r\n 🔰Đường may chuẩn chỉnh, tỉ mỉ, chắc chắn. - Mặc ở nhà, mặc đi chơi hoặc khi vận động thể thao. Phù hợp khi mix đồ với nhiều loại.  \r\n\r\n🔰Thiết kế hiện đại, đơn giản, trẻ trung, năng động. Dễ phối đồ.    \r\n\r\n⚜️ THÔNG SỐ CHỌN SIZE:\r\n\r\nsize M: <1m60, < 50kg / dài 68cm, rộng 51cm, \r\n\r\nSize L: < 1m72, <60 kg / dài 70cm, rộng 53cm, \r\n\r\nsize XL: >1m72, <70kg / dài 72cm, rộng 56cm,  ( lưu ý Trên 70 cân Không mặc vừa xin vùi lòng đừng đặt nếu trên 70 cân)\r\n\r\n(Bảng trên chỉ mang tính chất tham khảo, chọn mặc fom vừa vặn thoải mái, lên xuống size tuỳ theo sở thích ăn mặc của bạn) \r\n\r\n🔰Hoàn tiền 100% nếu sản phẩm lỗi, nhầm hoặc không giống với mô tả.  \r\n\r\n🔰Đổi hàng khi size không vừa (vui lòng nhắn tin riêng cho shop).  \r\n\r\n🔰Giao hàng toàn quốc, thanh toán khi nhận hàng. \r\n\r\n🔰Hỗ trợ đổi trả theo quy định của Shopee.  \r\n\r\n✔️ 3. HƯỚNG DẪN BẢO QUẢN:\r\n\r\n- Lần đầu nhận áo, bạn xả với nước mát rồi phơi khô nhé\r\n\r\n- Phân loại màu quần áo và giặt riêng các sản phẩm khác màu\r\n\r\n- Lộn mặt trái sản phẩm khi giặt\r\n\r\n- Hòa bột giặt nhẹ/ nước giặt nhẹ với nước rồi mới cho quần áo vào giặt\r\n\r\n- Tuyệt đối không đổ trực tiếp bột giặt/ nước giặt/ nước xả lên quần áo => sẽ khiến quần áo bị mất màu liền\r\n\r\n- Không dùng CHẤT TẨY/bột giặt tỏa nhiệt để giặt\r\n\r\n- Không sử dụng nước nóng để giặt đồ\r\n\r\n- Không ngâm quần áo với nước xả vải quá 15 phút. (Sản phẩm mới nên được giặt bằng nước thường trong 2-3 lần đầu sử dụng ạ)\r\n\r\n- Phơi dưới nắng nhẹ, hạn chế tiếp xúc trực tiếp dưới ánh mặt trời', '2023-11-08 15:49:05', 29),
(148, 'Set bộ 3 món vest kèm lót thời trang nữ chất tuyết mưa cổ vest ngắn tay đính nút quần dài lưng nút ố', 145000.00, 125000.00, '1699458763vn-11134207-7r98o-ll7apyqlnk5kdc.jpg,1699458763vn-11134207-7r98o-ll7apyqlqdag2f_tn.jpg,1699458763vn-11134207-7r98o-ll7apyqlrruw16_tn.jpg', 2, 'Áo mới nhất', '✔️ 1. CHẤT LIỆU SẢN PHẨM: Áo Hoodie nam nữ FORTUNATE APT Unisex Áo khoác hoodie nỉ bông From rộng Mũ to 2 lớp dây rút bản đôi mới nhất\r\n\r\n- Áo chất nỉ bông cotton loại tốt nên áo về lúc đầu sẽ dính lông ở mặt trong\r\n\r\n- Dây rút bản đôi mẫu mới nhất của năm năm tạo điểm nhấn cho chiếc áo\r\n\r\n-Mũ to 2 lớp vải dày dặn \r\n\r\n❤️ Mặc đôi mặc nhóm cực đẹp\r\n\r\n 🔰Đường may chuẩn chỉnh, tỉ mỉ, chắc chắn. - Mặc ở nhà, mặc đi chơi hoặc khi vận động thể thao. Phù hợp khi mix đồ với nhiều loại.  \r\n\r\n🔰Thiết kế hiện đại, đơn giản, trẻ trung, năng động. Dễ phối đồ.    \r\n\r\n⚜️ THÔNG SỐ CHỌN SIZE:\r\n\r\nsize M: <1m60, < 50kg / dài 68cm, rộng 51cm, \r\n\r\nSize L: < 1m72, <60 kg / dài 70cm, rộng 53cm, \r\n\r\nsize XL: >1m72, <70kg / dài 72cm, rộng 56cm,  ( lưu ý Trên 70 cân Không mặc vừa xin vùi lòng đừng đặt nếu trên 70 cân)\r\n\r\n(Bảng trên chỉ mang tính chất tham khảo, chọn mặc fom vừa vặn thoải mái, lên xuống size tuỳ theo sở thích ăn mặc của bạn) \r\n\r\n🔰Hoàn tiền 100% nếu sản phẩm lỗi, nhầm hoặc không giống với mô tả.  \r\n\r\n🔰Đổi hàng khi size không vừa (vui lòng nhắn tin riêng cho shop).  \r\n\r\n🔰Giao hàng toàn quốc, thanh toán khi nhận hàng. \r\n\r\n🔰Hỗ trợ đổi trả theo quy định của Shopee.  \r\n\r\n✔️ 3. HƯỚNG DẪN BẢO QUẢN:\r\n\r\n- Lần đầu nhận áo, bạn xả với nước mát rồi phơi khô nhé\r\n\r\n- Phân loại màu quần áo và giặt riêng các sản phẩm khác màu\r\n\r\n- Lộn mặt trái sản phẩm khi giặt\r\n\r\n- Hòa bột giặt nhẹ/ nước giặt nhẹ với nước rồi mới cho quần áo vào giặt\r\n\r\n- Tuyệt đối không đổ trực tiếp bột giặt/ nước giặt/ nước xả lên quần áo => sẽ khiến quần áo bị mất màu liền\r\n\r\n- Không dùng CHẤT TẨY/bột giặt tỏa nhiệt để giặt\r\n\r\n- Không sử dụng nước nóng để giặt đồ\r\n\r\n- Không ngâm quần áo với nước xả vải quá 15 phút. (Sản phẩm mới nên được giặt bằng nước thường trong 2-3 lần đầu sử dụng ạ)\r\n\r\n- Phơi dưới nắng nhẹ, hạn chế tiếp xúc trực tiếp dưới ánh mặt trời', '2023-11-08 15:52:43', 29),
(149, '[RẺ VÔ ĐỊCH] Áo polo tay lỡ unisex samsam4896--CÁC MÃ ÁO POLO PHÔNG THUN HOT 2023', 89000.00, 69000.00, '1699458927vn-11134207-7qukw-leweifw6oajbc5_tn.jpg,1699458927vn-11134207-7qukw-leweifw6poy293_tn.jpg,1699458927vn-11134207-7qukw-leweifw6pp3rfd_tn.jpg', 4, 'Áo mới nhất', '✔️ 1. CHẤT LIỆU SẢN PHẨM: Áo Hoodie nam nữ FORTUNATE APT Unisex Áo khoác hoodie nỉ bông From rộng Mũ to 2 lớp dây rút bản đôi mới nhất\r\n\r\n- Áo chất nỉ bông cotton loại tốt nên áo về lúc đầu sẽ dính lông ở mặt trong\r\n\r\n- Dây rút bản đôi mẫu mới nhất của năm năm tạo điểm nhấn cho chiếc áo\r\n\r\n-Mũ to 2 lớp vải dày dặn \r\n\r\n❤️ Mặc đôi mặc nhóm cực đẹp\r\n\r\n 🔰Đường may chuẩn chỉnh, tỉ mỉ, chắc chắn. - Mặc ở nhà, mặc đi chơi hoặc khi vận động thể thao. Phù hợp khi mix đồ với nhiều loại.  \r\n\r\n🔰Thiết kế hiện đại, đơn giản, trẻ trung, năng động. Dễ phối đồ.    \r\n\r\n⚜️ THÔNG SỐ CHỌN SIZE:\r\n\r\nsize M: <1m60, < 50kg / dài 68cm, rộng 51cm, \r\n\r\nSize L: < 1m72, <60 kg / dài 70cm, rộng 53cm, \r\n\r\nsize XL: >1m72, <70kg / dài 72cm, rộng 56cm,  ( lưu ý Trên 70 cân Không mặc vừa xin vùi lòng đừng đặt nếu trên 70 cân)\r\n\r\n(Bảng trên chỉ mang tính chất tham khảo, chọn mặc fom vừa vặn thoải mái, lên xuống size tuỳ theo sở thích ăn mặc của bạn) \r\n\r\n🔰Hoàn tiền 100% nếu sản phẩm lỗi, nhầm hoặc không giống với mô tả.  \r\n\r\n🔰Đổi hàng khi size không vừa (vui lòng nhắn tin riêng cho shop).  \r\n\r\n🔰Giao hàng toàn quốc, thanh toán khi nhận hàng. \r\n\r\n🔰Hỗ trợ đổi trả theo quy định của Shopee.  \r\n\r\n✔️ 3. HƯỚNG DẪN BẢO QUẢN:\r\n\r\n- Lần đầu nhận áo, bạn xả với nước mát rồi phơi khô nhé\r\n\r\n- Phân loại màu quần áo và giặt riêng các sản phẩm khác màu\r\n\r\n- Lộn mặt trái sản phẩm khi giặt\r\n\r\n- Hòa bột giặt nhẹ/ nước giặt nhẹ với nước rồi mới cho quần áo vào giặt\r\n\r\n- Tuyệt đối không đổ trực tiếp bột giặt/ nước giặt/ nước xả lên quần áo => sẽ khiến quần áo bị mất màu liền\r\n\r\n- Không dùng CHẤT TẨY/bột giặt tỏa nhiệt để giặt\r\n\r\n- Không sử dụng nước nóng để giặt đồ\r\n\r\n- Không ngâm quần áo với nước xả vải quá 15 phút. (Sản phẩm mới nên được giặt bằng nước thường trong 2-3 lần đầu sử dụng ạ)\r\n\r\n- Phơi dưới nắng nhẹ, hạn chế tiếp xúc trực tiếp dưới ánh mặt trời', '2023-11-08 15:55:27', 29),
(150, 'Quần Yếm Eo Cao Dáng Rộng Dây Rút Màu Xanh Lá Thời Trang Mùa Hè Cho Nữ', 110000.00, 90000.00, '1699459118cn-11134207-7qukw-lkgk74471gom45_tn.jpg,1699459118sg-11134201-7qvcq-lkgjqjrnluh629_tn.jpg,1699459118sg-11134201-7qvds-lkgjqjnhrxx573_tn.jpg', 4, 'Quần mới nhất', '✔️ QUẦN JEANS BAGGY  DÁNG ỐNG SUÔNG NAM CAO CẤP\r\n\r\n- Có phải bạn đang muốn tìm cho mình một chiếc quần jean baggy cao cấp mang style hàn quốc? May mắn là bạn đã tìm thấy chúng tôi.\r\n\r\n-  Chiếc quần jean baggy dành cho  nam này cửa hàng chúng tôi bán khoảng 600 chiếc mỗi tháng.Đã bán hơn 6.000 chiếc chỉ tính riêng trên hệ thống của Shopee Việt Nam, chưa kể đến những kênh bán khác!\r\n\r\n-  Bạn cũng sẽ là một trong số những người sẽ sở hữu chiếc quần jean baggy mang phong cách hàn quốc này.Bởi vì đây là một chiếc quần jean mà cực kỳ dễ phối đồ từ áo thun, hoodie, áo khoác..cho đến các loại sneakers, boots..\r\n\r\n\r\n\r\n✔️ TẠI SAO NÊN CHỌN MUA QUẦN JEANS BAGGY NAM, TẠI TF4.0\r\n\r\n- CHẤT LƯỢNG: Chất vải jean CHÍNH PHẨM gồm 95% cotton ( thấm hút, vải mềm) và 5% spandex ( độ co dãn).\r\n\r\n- GIÁ CẢ : Chúng tôi trực tiếp sản xuất với số lượng lớn. Nên so với các quần cùng chất lượng giá cả của chiếc quần jean baggy thì giá tốt nhất cho bạn hiện tại.\r\n\r\n\r\n\r\n✔️ Thông Tin Sản Phẩm:\r\n\r\n- Kiểu Dáng: quần jean baggy dành cho nam \r\n\r\n- Mầu Sắc: Xanh Sky, Đen- Chất liệu:  jean cao cấp, ko phai mầu\r\n\r\n- Số lượng : hàng đủ size , xuất khẩu- gồm có đủ  size: từ size 27 ( 42kg) -> size 36 (90kg).(FILE ẢNH GỐC TRÊN)', '2023-11-08 15:58:38', 30),
(151, 'Ucnl Quần Dài Ống Rộng Phong Cách Hàn Quốc Dành Cho Nam', 89000.00, 69000.00, '1699459267cn-11134207-7r98o-lkz1abyixbcd6f_tn.jpg,1699459267cn-11134211-7r98o-lm49ldwwsjs290_tn.jpg', 2, 'Quần mới nhất', '- Có phải bạn đang muốn tìm cho mình một chiếc quần jean baggy cao cấp mang style hàn quốc? May mắn là bạn đã tìm thấy chúng tôi.\r\n\r\n-  Chiếc quần jean baggy dành cho  nam này cửa hàng chúng tôi bán khoảng 600 chiếc mỗi tháng.Đã bán hơn 6.000 chiếc chỉ tính riêng trên hệ thống của Shopee Việt Nam, chưa kể đến những kênh bán khác!\r\n\r\n-  Bạn cũng sẽ là một trong số những người sẽ sở hữu chiếc quần jean baggy mang phong cách hàn quốc này.Bởi vì đây là một chiếc quần jean mà cực kỳ dễ phối đồ từ áo thun, hoodie, áo khoác..cho đến các loại sneakers, boots..', '2023-11-08 16:01:07', 30),
(152, 'Quần dài ống rộng SATUR dây rút gấu mặc 2 kiểu ống suông và jogger siêu hot,Thời trang độc lạ dành c', 107000.00, 87000.00, '16994594384159fb0b6ff826c4532a186ece892743_tn.jpg,16994594389095964be94a5069ba5851a4c9f74867_tn.jpg,1699459438c6b638b5d811015a312fba465acd8898_tn.jpg', 2, 'Quần mới nhất', '- Có phải bạn đang muốn tìm cho mình một chiếc quần jean baggy cao cấp mang style hàn quốc? May mắn là bạn đã tìm thấy chúng tôi.\r\n\r\n-  Chiếc quần jean baggy dành cho  nam này cửa hàng chúng tôi bán khoảng 600 chiếc mỗi tháng.Đã bán hơn 6.000 chiếc chỉ tính riêng trên hệ thống của Shopee Việt Nam, chưa kể đến những kênh bán khác!\r\n\r\n-  Bạn cũng sẽ là một trong số những người sẽ sở hữu chiếc quần jean baggy mang phong cách hàn quốc này.Bởi vì đây là một chiếc quần jean mà cực kỳ dễ phối đồ từ áo thun, hoodie, áo khoác..cho đến các loại sneakers, boots..', '2023-11-08 16:03:58', 30),
(153, 'Quần Jean nam, quần bò nam Khoá Gối ống rộng 4 mùa nam nữ unisex 2 ứng dụng bigsize form rộng', 249000.00, 229000.00, '16994595741e2b96d95db319e847562d113f8569d1_tn (1).jpg,16994595741e2b96d95db319e847562d113f8569d1_tn.jpg,16994595743ddd8c04d18393a0de1f6a7f3093e65c_tn.jpg', 2, 'Quần mới nhất', '- Có phải bạn đang muốn tìm cho mình một chiếc quần jean baggy cao cấp mang style hàn quốc? May mắn là bạn đã tìm thấy chúng tôi.\r\n\r\n-  Chiếc quần jean baggy dành cho  nam này cửa hàng chúng tôi bán khoảng 600 chiếc mỗi tháng.Đã bán hơn 6.000 chiếc chỉ tính riêng trên hệ thống của Shopee Việt Nam, chưa kể đến những kênh bán khác!\r\n\r\n-  Bạn cũng sẽ là một trong số những người sẽ sở hữu chiếc quần jean baggy mang phong cách hàn quốc này.Bởi vì đây là một chiếc quần jean mà cực kỳ dễ phối đồ từ áo thun, hoodie, áo khoác..cho đến các loại sneakers, boots..', '2023-11-08 16:06:14', 30),
(154, 'Áo thun from rộng nam nữ APT Unisex áo phông kiểu dáng Unisex chất liệu cotton khô 100% in hình Con ', 249000.00, 229000.00, '1699459802vn-11134207-7qukw-leweifw6pp3rfd_tn.jpg,1699459802vn-11134207-7r98o-ll0yszadh77vf2_tn.jpg,1699459802vn-11134207-7r98o-ll0yszadlex738_tn.jpg', 4, 'Áo mới nhất', 'Thương hiệu: IELGY\r\n\r\nKích thước: M, Rộng vai: 56,5 cm, Ngực: 110 cm, Chiều dài tay: 53,5 cm, Chiều dài: 68 cm\r\n\r\nKích thước: L, Rộng vai: 58,5 cm, Ngực: 114 cm, Chiều dài tay: 54,5 cm, Chiều dài: 70 cm\r\n\r\nKích thước: XL, Rộng vai: 60,5 cm, Ngực: 118 cm, Chiều dài tay: 55,5 cm, Chiều dài: 72 cm\r\n\r\nKích thước: XXL, Rộng vai: 62,5 cm, Ngực: 122 cm, Chiều dài tay: 56,5 cm, Chiều dài: 74 cm\r\n\r\nKích thước: 3XL, Chiều rộng vai: 64,5 cm, Ngực: 126 cm, Chiều dài tay: 57,5 cm, Chiều dài: 76 cm\r\n\r\nKích thước: 4XL, Chiều rộng vai: 66,5 cm, Ngực: 130 cm, Chiều dài tay: 58,5 cm, Chiều dài: 78 cm\r\n\r\n\r\n\r\nPhong cách: giải trí\r\n\r\nLoại phiên bản: Loose\r\n\r\nLoại cổ áo: Cổ tròn\r\n\r\nThành phần vải chính: sợi polyester\r\n\r\nCảnh áp dụng: Hàng ngày', '2023-11-08 16:10:02', 29),
(155, 'Đồng Hồ Điện Tử Đeo Tay Kỹ Thuật Số Thời Trang Cho Bé', 270000.00, 250000.00, '16994599719d5bb89b52566940d4f18c404a236ce3_tn.jpg,1699459971a36ef5881074023aff68577f2fbaf8ed_tn (1).jpg,1699459971a36ef5881074023aff68577f2fbaf8ed_tn.jpg', 2, 'phụ kiện', 'Xem phòng ngừa chống thấm nước:\r\n\r\n1.Có thể đeo đồng hồ bơi, sâu 30 mét.\r\n\r\n2.Khi độ ẩm được gắn vào đồng hồ, Vui lòng không sử dụng nút.\r\n\r\n3.Không chạm vào chất lỏng ăn mòn\r\n\r\n4.Không chạm vào nước nóng, vòng cao su chống thấm nước có thể nở ra và co lại bằng nhiệt, Ảnh hưởng đến thời gian sử dụng của đồng hồ.\r\n\r\nChuyển động: Quartz đồng hồ chuyển động\r\n\r\nChất liệu vỏ: Thép không gỉ\r\n\r\nDây đồng hồ: Dây đeo bằng thép không gỉ / Dây da\r\n\r\nChống thấm nước: 30-50 mét không thấm nước (có thể bơi lội)\r\n\r\nGương đồng hồ: Kính cường lực khoáng\r\n\r\nĐường kính đồng hồ: 44mm\r\n\r\nTrọng lượng đồng hồ: 164g\r\n\r\nĐộ dày đồng hồ: 12mm\r\n\r\nChiều dài đồng hồ: 24cm\r\n\r\nChiều rộng dây đeo đồng hồ: 22mm\r\n\r\nHồ sơ đồng tên #Dong ho #Kim nam #Hồ điện tử tử #Dây đeo nam #Dây da nam #Hồ bơi thể thao #Hồ sơ đồng hồ nữ', '2023-11-08 16:12:51', 28);
INSERT INTO `products` (`product_id`, `product_name`, `price`, `sale`, `images`, `search_count`, `product_gender`, `description`, `create_at`, `category_id`) VALUES
(156, 'Đồng Hồ Điện Tử Dạ Quang Chống Thấm Nước Phiên Bản Thể Thao Hàn Quốc One Piece Cho Nam Sinh Tiểu Học', 100000.00, 80000.00, '1699460122sg-11134201-22110-11ip70w43wjv04_tn.jpg,1699460122sg-11134201-22110-5443u2w43wjvd0_tn.jpg,1699460122sg-11134201-22110-mpo7rbw43wjv1c_tn.jpg', 4, 'phụ kiện', 'Xem phòng ngừa chống thấm nước:\r\n\r\n1.Có thể đeo đồng hồ bơi, sâu 30 mét.\r\n\r\n2.Khi độ ẩm được gắn vào đồng hồ, Vui lòng không sử dụng nút.\r\n\r\n3.Không chạm vào chất lỏng ăn mòn\r\n\r\n4.Không chạm vào nước nóng, vòng cao su chống thấm nước có thể nở ra và co lại bằng nhiệt, Ảnh hưởng đến thời gian sử dụng của đồng hồ.\r\n\r\nChuyển động: Quartz đồng hồ chuyển động\r\n\r\nChất liệu vỏ: Thép không gỉ\r\n\r\nDây đồng hồ: Dây đeo bằng thép không gỉ / Dây da\r\n\r\nChống thấm nước: 30-50 mét không thấm nước (có thể bơi lội)\r\n\r\nGương đồng hồ: Kính cường lực khoáng\r\n\r\nĐường kính đồng hồ: 44mm\r\n\r\nTrọng lượng đồng hồ: 164g\r\n\r\nĐộ dày đồng hồ: 12mm\r\n\r\nChiều dài đồng hồ: 24cm\r\n\r\nChiều rộng dây đeo đồng hồ: 22mm\r\n\r\nHồ sơ đồng tên #Dong ho #Kim nam #Hồ điện tử tử #Dây đeo nam #Dây da nam #Hồ bơi thể thao #Hồ sơ đồng hồ nữ', '2023-11-08 16:15:22', 28),
(157, 'Đồng Hồ Thông Minh Vitog Y68 Chống Nước Hỗ Trợ Theo Dõi Sức Khỏe Kèm Phụ Kiện Chất Lượng Cao', 400000.00, 380000.00, '16994606198f779d69101e56a32d357ddc3ac0e067_tn.jpg,169946061971f75a507111053c02ffe494768fc598_tn.jpg,1699460619768dcd52524ee8015f2eb96d2ada7070_tn.jpg', 4, 'phụ kiện', '-Chất liệu mặt: viền thép\r\n\r\n\r\n\r\n-Chất liệu dây đeo: Silicon\r\n\r\n\r\n\r\n-Kích thước: 44 x 38 x 10.9mm\r\n\r\n\r\n\r\n-Bluetooth: 5.2\r\n\r\n\r\n-Dung lượng pin: 280mAh\r\n\r\n\r\n\r\n-Cách sạc: Sạc từ tính\r\n\r\n-Chế độ cảm ứng: Cảm ứng hoàn toàn\r\n\r\n\r\n\r\n-App: hiwatchpro\r\n\r\n\r\n\r\nCHỨC NĂNG:\r\n\r\n-Kết nối với điện thoại: thông báo đồng bộ (lời nhắc cuộc gọi đến, tin nhắn, v.v.), nhạc bluetooth, v.v.\r\n\r\n\r\n\r\n-Thời tiết, nâng cổ tay sáng màn hình, báo thức, đồng hồ bấm giờ, báo thức\r\n\r\n\r\n\r\n-Các chức năng khác: Trình theo dõi thể dục hỗ trợ theo dõi nhịp tim, huyết áp, oxy trong máu, điều khiển âm nhạc, theo dõi giấc ngủ, nhắc nhở ít vận động.\r\n\r\n-Hệ thống hỗ trợ: iOS 9.0 / Android 5.0 trở lên\r\n\r\n\r\n\r\n-Hỗ trợ tiếng việt\r\n\r\n-Fullbox: hộp đựng, dây sạc, dây đeo đồng hồ, sách hdsd, mặt đồng hồ', '2023-11-08 16:23:39', 28),
(158, 'Đồng hồ nữ chính hãng dây thép không gỉ bền đẹp thời trang cao cấp kèm hộp D-ZINER NT58', 107000.00, 87000.00, '16994608718cc9719ac726e81ce0d99701df19b152_tn.jpg,1699460871f6ecdfb7076685c35ea8f3c5d575f6f4_tn.jpg', 4, 'phụ kiện', 'Xem phòng ngừa chống thấm nước:\r\n\r\n1.Có thể đeo đồng hồ bơi, sâu 30 mét.\r\n\r\n2.Khi độ ẩm được gắn vào đồng hồ, Vui lòng không sử dụng nút.\r\n\r\n3.Không chạm vào chất lỏng ăn mòn\r\n\r\n4.Không chạm vào nước nóng, vòng cao su chống thấm nước có thể nở ra và co lại bằng nhiệt, Ảnh hưởng đến thời gian sử dụng của đồng hồ.\r\n\r\nChuyển động: Quartz đồng hồ chuyển động\r\n\r\nChất liệu vỏ: Thép không gỉ\r\n\r\nDây đồng hồ: Dây đeo bằng thép không gỉ / Dây da\r\n\r\nChống thấm nước: 30-50 mét không thấm nước (có thể bơi lội)\r\n\r\nGương đồng hồ: Kính cường lực khoáng\r\n\r\nĐường kính đồng hồ: 44mm\r\n\r\nTrọng lượng đồng hồ: 164g\r\n\r\nĐộ dày đồng hồ: 12mm\r\n\r\nChiều dài đồng hồ: 24cm\r\n\r\nChiều rộng dây đeo đồng hồ: 22mm\r\n\r\nHồ sơ đồng tên #Dong ho #Kim nam #Hồ điện tử tử #Dây đeo nam #Dây da nam #Hồ bơi thể thao #Hồ sơ đồng hồ nữ', '2023-11-08 16:27:51', 28),
(159, 'Đồng hồ thông minh LIGE đo nhịp tim huyết áp chăm sóc sức khỏe đa năng thời trang 2021 dành cho nam', 899000.00, 879000.00, '16994609788ce8f4c2ef38d58e8657462100c726d7_tn.jpg,16994609788dbe1b96e7dfce2619d7c7d46aac0ad4_tn.jpg,1699460978c4c8f007c828139a74a08736e04aacaa_tn.jpg', 2, 'phụ kiện', 'Xem phòng ngừa chống thấm nước:\r\n\r\n1.Có thể đeo đồng hồ bơi, sâu 30 mét.\r\n\r\n2.Khi độ ẩm được gắn vào đồng hồ, Vui lòng không sử dụng nút.\r\n\r\n3.Không chạm vào chất lỏng ăn mòn\r\n\r\n4.Không chạm vào nước nóng, vòng cao su chống thấm nước có thể nở ra và co lại bằng nhiệt, Ảnh hưởng đến thời gian sử dụng của đồng hồ.\r\n\r\nChuyển động: Quartz đồng hồ chuyển động\r\n\r\nChất liệu vỏ: Thép không gỉ\r\n\r\nDây đồng hồ: Dây đeo bằng thép không gỉ / Dây da\r\n\r\nChống thấm nước: 30-50 mét không thấm nước (có thể bơi lội)\r\n\r\nGương đồng hồ: Kính cường lực khoáng\r\n\r\nĐường kính đồng hồ: 44mm\r\n\r\nTrọng lượng đồng hồ: 164g\r\n\r\nĐộ dày đồng hồ: 12mm\r\n\r\nChiều dài đồng hồ: 24cm\r\n\r\nChiều rộng dây đeo đồng hồ: 22mm\r\n\r\n#Hồ sơ đồng tên #Dong ho #Kim nam #Hồ điện tử tử #Dây đeo nam #Dây da nam #Hồ bơi thể thao #Hồ sơ đồng hồ nữ', '2023-11-08 16:29:38', 28),
(160, 'Hanlu Áo Khoác Phao Có Mũ Trùm Dày Dặn Giữ Ấm Đa Năng Chất Lượng Cao Thường Ngày Cho Nam', 107000.00, 100000.00, '1701963192cn-11134207-7r98o-lm4epun2qjhe12_tn.jpg,1701963192cn-11134211-7r98o-lm4jxvriwlk21d_tn.jpg,1701963542cn-11134211-7r98o-lm4jxvriwlk21d_tn.jpg', 0, 'áo', 'Sản phẩm của chúng tôi là thương hiệu mới 100%.\r\nHy vọng sẽ mang lại cho bạn trải nghiệm mua sắm tốt nhất.\r\nDo góc chiếu sáng khác nhau, hình ảnh có thể không phản ánh đầy đủ màu sắc thực tế của sản phẩm, cảm ơn bạn đã thông cảm\r\nNếu bạn có một cái gì đó bạn thích, vui lòng thêm nó vào giỏ hàng.\r\nNếu bạn hài lòng với sản phẩm của chúng tôi, chúng tôi mong được khen ngợi năm sao của bạn.\r\nMong đợi chuyến thăm tiếp theo của bạn', '2023-12-07 15:33:12', 27),
(161, 'Áo Khoác cotton Có Nón Dày Dặn Giữ Ấm Phong Cách Hàn Quốc Chất Lượng Cao Cho Nam', 249000.00, 200000.00, '1701967196sg-11134201-7rbm5-lmik8zjw6ct69b_tn.jpg,1701967196sg-11134201-7rbma-lmik8yr1dzgw30_tn.jpg,1701967196sg-11134201-7rbn5-lmik8zylku8z18_tn.jpg,1701967210sg-11134201-7rbl8-lmik919ho7mx74_tn.jpg', 0, 'Áo khoác', '💚Khi bạn đặt hàng, nó sẽ được chuyển trong vòng 10 ngày, và toàn bộ gói hàng sẽ được giao cho bạn\r\n\r\n💚Cửa hàng của chúng tôi là kích thước tiêu chuẩn, nếu bạn muốn có một sự vừa vặn hơn, vui lòng mua một kích thước lên.\r\n\r\n💚Mọi thắc mắc về việc mua hàng vui lòng liên hệ với chúng tôi, chúng tôi sẽ giải đáp thỏa đáng nhất cho bạn\r\n\r\n💚Sản phẩm của chúng tôi là thương hiệu mới 100%.\r\n\r\n💚Hy vọng sẽ mang lại cho bạn trải nghiệm mua sắm tốt nhất.\r\n\r\n💚Do góc chiếu sáng khác nhau, hình ảnh có thể không phản ánh đầy đủ màu sắc thực tế của sản phẩm, cảm ơn bạn đã thông cảm\r\n\r\n===============================\r\n\r\n🌼Nếu bạn có một cái gì đó bạn thích, vui lòng thêm nó vào giỏ hàng.\r\n\r\n🌼Nếu bạn hài lòng với sản phẩm của chúng tôi, chúng tôi mong được khen ngợi năm sao của bạn.\r\n\r\n🌼Mong chuyến thăm tiếp theo của bạn', '2023-12-07 16:39:56', 27),
(162, 'Bộ quần áo thể thao nam nữ vải poly cá sấu thoáng mát thấm hút mồ hôi cao cấp phối túi họa tiết Bảo ', 302000.00, 150000.00, '1701967546vn-11134207-7qukw-leylvfb04l8qe1_tn.jpg,1701967546vn-11134207-7qukw-leylvfb05zt6a2_tn.jpg,1701967546vn-11134207-7qukw-leylvfb036oa23_tn.jpg', 0, 'Nam', '- Thiết kế trẻ trung cá tính cực kỳ sang trọng và lịch sự giễ dàng tạo ấn tượng ở cái nhìn đầu tiên giúp bạn thêm phần tự tin thể hiện cá tính\r\n\r\n\r\n\r\n- Sản phẩm được shop sản xuất gia công tỷ phú thẩm mỹ đảm bảo chất lượng - đường may kỹ chắc chắn dáng chuẩn dễ mặc không kén dáng\r\n\r\n\r\n\r\n- Màu sắc đa dạng , cá tính , nổi bật , rất giễ phối đồ , rất cuốn hút khi mặc đi chơi hay đi làm\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nRỒI DẪN CHỌN SIZE : *** ( lưu ý : bảng size chỉ mang tính chất tham khảo các bạn hãy để lại 1 tin nhắn để shop được tư vấn kỹ hơn nhé !!! )\r\n\r\n\r\n\r\n\r\n\r\nsize M : dưới 1m68 < 55kg\r\n\r\n\r\n\r\nsize L : từ 1m65 đến 1m73 dưới 60kg\r\n\r\n\r\n\r\nsize XL : từ 1m73 - 1m76 dưới 70kg\r\n\r\n\r\n\r\n\r\n\r\nSHOP hỗ trợ đổi size , đổi màu , đổi mẫu  nếu sản phẩm bạn mặc không vừa , không giống mẫu , sai mẫu ... không vừa ý ạ\r\n\r\n\r\n\r\n\r\n\r\nTên DẪN BẢO QUẢN :\r\n\r\n\r\n\r\nVải thun co giãn pha thêm trong vải cá sấu poly kém bền với nhiệt vì vậy không nên giặt chúng trong nước nóng trên 40 độ C hay phơi ngoài trời nắng gạt vì sẽ làm vải xơ cứng, vải bạc màu.\r\n\r\n\r\n\r\nVải poly ít nhăn không cần phải may, nếu cần may thì nên điều chỉnh nhiệt độ xuống dưới 180 độ C để tránh làm vải mất độ đàn hồi do quá nóng.\r\n\r\n\r\n\r\nKhông nên sử dụng chất tẩy rửa mạnh, phân loại đồ màu đậm với màu nhạt khi giặt để tránh lem màu và nên lộn trái áo khi phơi để bảo vệ màu và hình trên áo.\r\n\r\n🔰🔰🔰  HƯỚNG DẪN CÁCH ĐẶT HÀNG:     \r\n\r\n\r\n\r\n     *KHÔNG GỬI THEO GHI CHÚ** \r\n\r\n\r\n\r\n\r\n\r\n✔ Cách chọn size: Shop có bảng size mẫu. Bạn NÊN INBOX, cung cấp chiều cao, cân nặng để SHOP TƯ VẤN SIZE \r\n\r\n\r\n\r\n✔ Mã sản phẩm đã có trong ảnh \r\n\r\n\r\n\r\n✔ Cách đặt hàng: Nếu bạn muốn mua 2 sản phẩm khác nhau hoặc 2 size khác nhau, để được freeship \r\n\r\n\r\n\r\n-	Bạn chọn từng sản phẩm rồi thêm vào giỏ hàng \r\n\r\n\r\n\r\n-	Khi giỏ hàng đã có đầy đủ các sản phẩm cần mua, bạn mới tiến hành ấn nút “\r\n\r\n\r\n\r\n🔰🔰🔰  **CAM KẾT VỀ ĐỔI TRẢ VÀ BẢO HÀNH\r\n\r\n\r\n\r\nSản phẩm cam kết đúng như mô tả, shop cam kết mang đến cho khách hàng sản phẩm chất lượng và giá cả hợp lý\r\n\r\n\r\n\r\n- Áo được kiểm tra trước khi gói hàng tránh giao nhầm lẫn cho khách\r\n\r\n\r\n\r\n- Hoàn lại tiền cho khách nếu sản phẩm không đúng như mô tả\r\n\r\n\r\n\r\n- Giao hàng nhanh nhất sau khi có đơn. Giao hàng trên toàn quốc, thanh toán khi nhận hàng\r\n\r\n\r\n\r\n- Đổi trả đúng theo quy định của shopee\r\n\r\n\r\n\r\n--------------------------------------------------------------------------------------------------------------------------------\r\n\r\n\r\n\r\nQuy định bảo hành, đổi trả đối với sản phẩm \r\n\r\n\r\n\r\n- Đổi trả theo đúng quy định của shopee\r\n\r\n\r\n\r\n- Điều kiện áp dụng (trong vòng 07 ngày kể từ khi nhận sản phẩm)\r\n\r\n\r\n\r\n- Hàng hoá vẫn còn mới, không bị hỏng hóc và giặt tẩy\r\n\r\n\r\n\r\n- Hàng hóa hư hỏng do lỗi vận chuyển hoặc do nhà sản xuất. \r\n\r\n\r\n\r\n- Hàng không đúng kiểu dáng mà khách hàng đã đặt \r\n\r\n\r\n\r\n- Không đủ bộ, số lượng mà khách hàng đã đặt \r\n\r\n\r\n\r\n', '2023-12-07 16:45:46', 24),
(163, 'Bộ Quần Áo Ngắn Tay In Chữ Thời Trang Chất Lượng Cao Cho Nam', 400000.00, 299000.00, '1701967949sg-11134201-7qvda-liliif84grepb9_tn.jpg,1701967949sg-11134201-7qvdz-lil2wr5m36z1d7_tn.jpg,1701967949sg-11134201-7qves-lil2ws04vy3z0d_tn.jpg,1701967949sg-11134201-7qvfd-lil2wqrqni0nb0_tn.jpg', 0, 'Nam', '- Thiết kế trẻ trung cá tính cực kỳ sang trọng và lịch sự giễ dàng tạo ấn tượng ở cái nhìn đầu tiên giúp bạn thêm phần tự tin thể hiện cá tính\r\n\r\n\r\n\r\n- Sản phẩm được shop sản xuất gia công tỷ phú thẩm mỹ đảm bảo chất lượng - đường may kỹ chắc chắn dáng chuẩn dễ mặc không kén dáng\r\n\r\n\r\n\r\n- Màu sắc đa dạng , cá tính , nổi bật , rất giễ phối đồ , rất cuốn hút khi mặc đi chơi hay đi làm\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nRỒI DẪN CHỌN SIZE : *** ( lưu ý : bảng size chỉ mang tính chất tham khảo các bạn hãy để lại 1 tin nhắn để shop được tư vấn kỹ hơn nhé !!! )\r\n\r\n\r\n\r\n\r\n\r\nsize M : dưới 1m68 < 55kg\r\n\r\n\r\n\r\nsize L : từ 1m65 đến 1m73 dưới 60kg\r\n\r\n\r\n\r\nsize XL : từ 1m73 - 1m76 dưới 70kg\r\n\r\n\r\n\r\n\r\n\r\nSHOP hỗ trợ đổi size , đổi màu , đổi mẫu  nếu sản phẩm bạn mặc không vừa , không giống mẫu , sai mẫu ... không vừa ý ạ\r\n\r\n\r\n\r\n\r\n\r\nTên DẪN BẢO QUẢN :\r\n\r\n\r\n\r\nVải thun co giãn pha thêm trong vải cá sấu poly kém bền với nhiệt vì vậy không nên giặt chúng trong nước nóng trên 40 độ C hay phơi ngoài trời nắng gạt vì sẽ làm vải xơ cứng, vải bạc màu.\r\n\r\n\r\n\r\nVải poly ít nhăn không cần phải may, nếu cần may thì nên điều chỉnh nhiệt độ xuống dưới 180 độ C để tránh làm vải mất độ đàn hồi do quá nóng.\r\n\r\n\r\n\r\nKhông nên sử dụng chất tẩy rửa mạnh, phân loại đồ màu đậm với màu nhạt khi giặt để tránh lem màu và nên lộn trái áo khi phơi để bảo vệ màu và hình trên áo.\r\n\r\n🔰🔰🔰  HƯỚNG DẪN CÁCH ĐẶT HÀNG:     \r\n\r\n\r\n\r\n     *KHÔNG GỬI THEO GHI CHÚ** \r\n\r\n\r\n\r\n\r\n\r\n✔ Cách chọn size: Shop có bảng size mẫu. Bạn NÊN INBOX, cung cấp chiều cao, cân nặng để SHOP TƯ VẤN SIZE \r\n\r\n\r\n\r\n✔ Mã sản phẩm đã có trong ảnh \r\n\r\n\r\n\r\n✔ Cách đặt hàng: Nếu bạn muốn mua 2 sản phẩm khác nhau hoặc 2 size khác nhau, để được freeship \r\n\r\n\r\n\r\n-	Bạn chọn từng sản phẩm rồi thêm vào giỏ hàng \r\n\r\n\r\n\r\n-	Khi giỏ hàng đã có đầy đủ các sản phẩm cần mua, bạn mới tiến hành ấn nút “\r\n\r\n\r\n\r\n🔰🔰🔰  **CAM KẾT VỀ ĐỔI TRẢ VÀ BẢO HÀNH\r\n\r\n\r\n\r\nSản phẩm cam kết đúng như mô tả, shop cam kết mang đến cho khách hàng sản phẩm chất lượng và giá cả hợp lý\r\n\r\n\r\n\r\n- Áo được kiểm tra trước khi gói hàng tránh giao nhầm lẫn cho khách\r\n\r\n\r\n\r\n- Hoàn lại tiền cho khách nếu sản phẩm không đúng như mô tả\r\n\r\n\r\n\r\n- Giao hàng nhanh nhất sau khi có đơn. Giao hàng trên toàn quốc, thanh toán khi nhận hàng\r\n\r\n\r\n\r\n- Đổi trả đúng theo quy định của shopee\r\n\r\n\r\n\r\n--------------------------------------------------------------------------------------------------------------------------------\r\n\r\n\r\n\r\nQuy định bảo hành, đổi trả đối với sản phẩm \r\n\r\n\r\n\r\n- Đổi trả theo đúng quy định của shopee\r\n\r\n\r\n\r\n- Điều kiện áp dụng (trong vòng 07 ngày kể từ khi nhận sản phẩm)\r\n\r\n\r\n\r\n- Hàng hoá vẫn còn mới, không bị hỏng hóc và giặt tẩy\r\n\r\n\r\n\r\n- Hàng hóa hư hỏng do lỗi vận chuyển hoặc do nhà sản xuất. \r\n\r\n\r\n\r\n- Hàng không đúng kiểu dáng mà khách hàng đã đặt \r\n\r\n\r\n\r\n- Không đủ bộ, số lượng mà khách hàng đã đặt \r\n\r\n\r\n\r\n', '2023-12-07 16:52:29', 24),
(164, 'Bộ Quần Áo Nam AVIANO Dài Tay, Bộ Thể Thao Nam Chất Nỉ Tổ Ong 4 Màu', 89000.00, 59000.00, '1701968203vn-11134207-7r98o-lmo5lmvo3f1b12_tn.jpg,1701968203vn-11134207-7r98o-lmo5lmvo4tlr08_tn.jpg,1701968217sg-11134201-7rbl8-lmik919ho7mx74_tn.jpg', 0, 'Nam', 'Bộ Quần Áo Nam AVIANO Dài Tay, Bộ Thể Thao Nam Chất Nỉ Tổ Ong 4 Màu', '2023-12-07 16:56:43', 24),
(165, 'Giày Thể Thao Giả Da Thời Trang Năng Động Dành Cho Nữ', 400000.00, 199000.00, '1701968592sg-11134201-7qvcu-li1k49uuwt2h2b_tn.jpg,1701968592sg-11134201-7qvd0-li1k47om3b22b5_tn.jpg,1701968592sg-11134201-7qvfc-li1k48kss8329d_tn.jpg', 0, 'Giày', 'Thời gian giao hàng dự kiến cho sản phẩm này là từ 7-9 ngày\r\n\r\n\r\n\r\nLoại hoạ tiết: Màu trơn\r\n\r\nKiểu gót: Gót nêm\r\n\r\nChất liệu lớp lót bên trong: Vải\r\n\r\nDành cho các môn thể thao: Thông dụng\r\n\r\nMàu sắc: Đỏ, đen, tím, hồng, xám\r\n\r\nDanh mục sản phẩm: Giày thể thao lười\r\n\r\nChiều cao thân trên: Thấp\r\n\r\nChiều cao gót: Gót thấp (1-3cm)\r\n\r\nHình dạng gót giày: Gót nêm\r\n\r\nSize: 36, 37, 38, 39, 40, 41\r\n\r\nQuy trình sản xuất đế giày: Giày đúc phun\r\n\r\nĐộ sâu miệng giày: Miệng nông (Dưới 7cm)\r\n\r\nChất liệu đế: Nhựa\r\n\r\nChất liệu và công nghệ: Dệt bay\r\n\r\nChi tiết phong cách: Miệng nhẹ, Kết hợp màu sắc\r\n\r\nPhong cách: Thường ngày\r\n\r\nCách mang: Xỏ vào bàn chân\r\n\r\nChất liệu đế: Loại dệt\r\n\r\nDịp sử dụng thích hợp: Đi chơi\r\n\r\nHình dạng mũi giày: Mũi tròn\r\n\r\nChất liệu mặt trên: Lưới\r\n\r\nPhong cách: Xỏ vào bàn chân\r\n\r\nThích hợp cho: Nữ\r\n\r\nĐộ tuổi sử dụng thích hợp: Người lớn\r\n\r\nChức năng: Thoáng khí\r\n\r\nMùa sử dụng thích hợp: Mùa hè, Mùa xuân, Mùa thu\r\n\r\nPhong cách: Đi chơi', '2023-12-07 17:03:12', 26),
(166, 'Giày thể thao IELGY mềm mại thoáng khí sành điệu thời trang dành cho nữ', 399000.00, 250000.00, '170196877967d21d0631fd964ca7c9ec7751d33e37_tn.jpg,1701968779a941506dfe81fad5990188c08c219033_tn.jpg,1701968779c05b38ea9619dc832a149fcf4c39df8b_tn.jpg', 0, 'Giày', 'Thời gian giao hàng dự kiến cho sản phẩm này là từ 7-9 ngày\r\n\r\n\r\n\r\nLoại hoạ tiết: Màu trơn\r\n\r\nKiểu gót: Gót nêm\r\n\r\nChất liệu lớp lót bên trong: Vải\r\n\r\nDành cho các môn thể thao: Thông dụng\r\n\r\nMàu sắc: Đỏ, đen, tím, hồng, xám\r\n\r\nDanh mục sản phẩm: Giày thể thao lười\r\n\r\nChiều cao thân trên: Thấp\r\n\r\nChiều cao gót: Gót thấp (1-3cm)\r\n\r\nHình dạng gót giày: Gót nêm\r\n\r\nSize: 36, 37, 38, 39, 40, 41\r\n\r\nQuy trình sản xuất đế giày: Giày đúc phun\r\n\r\nĐộ sâu miệng giày: Miệng nông (Dưới 7cm)\r\n\r\nChất liệu đế: Nhựa\r\n\r\nChất liệu và công nghệ: Dệt bay\r\n\r\nChi tiết phong cách: Miệng nhẹ, Kết hợp màu sắc\r\n\r\nPhong cách: Thường ngày\r\n\r\nCách mang: Xỏ vào bàn chân\r\n\r\nChất liệu đế: Loại dệt\r\n\r\nDịp sử dụng thích hợp: Đi chơi\r\n\r\nHình dạng mũi giày: Mũi tròn\r\n\r\nChất liệu mặt trên: Lưới\r\n\r\nPhong cách: Xỏ vào bàn chân\r\n\r\nThích hợp cho: Nữ\r\n\r\nĐộ tuổi sử dụng thích hợp: Người lớn\r\n\r\nChức năng: Thoáng khí\r\n\r\nMùa sử dụng thích hợp: Mùa hè, Mùa xuân, Mùa thu\r\n\r\nPhong cách: Đi chơi', '2023-12-07 17:06:19', 26);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `todolist`
--

CREATE TABLE `todolist` (
  `todolist_id` int(11) NOT NULL,
  `content` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'not-completed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `todolist`
--

INSERT INTO `todolist` (`todolist_id`, `content`, `status`) VALUES
(2, 'Bán 100 đơn hàng', 'completed'),
(3, '', 'not-completed');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `date` date NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `user_image`, `password`, `phone`, `date`, `address`, `gender`, `role`) VALUES
(23, 'Trần', 'Việt Anh', '0969621079', '1700209006t.jpg', '$2y$10$fD1QlC9oO9ctnW72mkcn8u0WtSermLnsV1FTw51lhxgBEO3ED57Rm', '0969621079', '2023-11-16', 'Hà nội', 'Nam', 0),
(30, 'admin', '', 'admin@gmail.com', '17018383221701005255nam.png', '$2y$10$fD1QlC9oO9ctnW72mkcn8u0WtSermLnsV1FTw51lhxgBEO3ED57Rm', '', '2023-12-22', 'Hà nội', 'Nam', 1),
(35, 'Trần', 'Vanh', 'v@gmail.com', 'nam.png', '$2y$10$fD1QlC9oO9ctnW72mkcn8u0WtSermLnsV1FTw51lhxgBEO3ED57Rm', 'v@gmail.com', '2023-11-29', NULL, 'Nam', 0),
(36, 'nguyen', 'huyen', 'nguyenthi@gmail.com', 'nu.jpg', '$2y$10$fD1QlC9oO9ctnW72mkcn8u0WtSermLnsV1FTw51lhxgBEO3ED57Rm', 'nguyenthi@gmail.com', '2023-11-22', NULL, 'Nữ', 0),
(37, 'Trần', 'Việt Anh', 'tranvanh2k4@gmail.com', 'nam.png', '$2y$10$fD1QlC9oO9ctnW72mkcn8u0WtSermLnsV1FTw51lhxgBEO3ED57Rm', 'tranvanh2k4@gmail.com', '2023-11-23', NULL, 'Nam', 0),
(38, 'vanh', 'tran', 'k@gmail.com', 'nam.png', '$2y$10$fD1QlC9oO9ctnW72mkcn8u0WtSermLnsV1FTw51lhxgBEO3ED57Rm', 'k@gmail.com', '2023-11-29', NULL, 'Nam', 0),
(39, 'Trần', 'ádas', 'vd@gmail.com', 'nam.png', '$2y$10$fD1QlC9oO9ctnW72mkcn8u0WtSermLnsV1FTw51lhxgBEO3ED57Rm', 'vd@gmail.com', '2023-11-30', NULL, 'Nam', 0),
(40, 'vanh', 'tran', 'vanhtran@gmail.com', '1701743959z4897646583672_11bfd6eb78c799e135078d16b7fc42df.jpg', '$2y$10$fD1QlC9oO9ctnW72mkcn8u0WtSermLnsV1FTw51lhxgBEO3ED57Rm', '0969621079', '2004-06-28', 'Số nhà 14, Thôn 5, xã Thượng Mỗ, Huyện Đan Phượng, Hà Nội', 'Nam', 0),
(41, 'ĐÀO ĐỨC', 'HIỆP', '0961619038', '1701968941hinh-nen-may-tinh-fantasy-4k-blogchiasekienthuc.com-1.png', '$2y$10$z1zygES3MbznHKAlWLSy2.oC6uALtyyob3uIHsOLEiGFAVGu3q/r.', '0961619038', '2023-12-07', '', 'Nam', 1),
(42, 'ĐÀO ĐỨC', 'HIỆP', '0988836681', '1701963636cb4362f54d9f3b5bb1ab4c86a4c4cc88_tn.jpg', '$2y$10$SuoD791UepaeNF6DC56gBeWv6XigwYadbg5F.cFEl/ITfLWMgfij.', '0988836681', '2023-12-07', '', 'Nữ', 0),
(43, 'admin', '', 'duynnz1901@gmail.com', '17020214671701005255nam.png', '$2y$10$G6T2ZmJCDkRf.sUUdVEASOAYWnH2edE3HrbYSdcLTqAjjgCGvolly', '0968607305', '0000-00-00', '', 'Nam', 1),
(44, 'duynnz', 'nguyen', 'duynnz2812@gmail.com', 'Admin (2).jpg', '$2y$10$tf3oyArI/Qgk..2LOXlXxeRneZDnGEH6qXI.piQlNzLOiJf8ujXTu', '0968607305', '0000-00-00', NULL, 'Nam', 0),
(45, 'vah', 'tran', 'vanh@gmail.com', 'nam.png', '$2y$10$Kj0ssmDL2z2fOTNW74B3kO73UCJZeorhPqHAvoezYAKQHP0IpSG/W', 'vanh@gmail.com', '2023-12-21', NULL, 'Nam', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_voucher`
--

CREATE TABLE `user_voucher` (
  `user_id` int(11) NOT NULL,
  `voucher_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_voucher`
--

INSERT INTO `user_voucher` (`user_id`, `voucher_id`, `product_id`) VALUES
(23, 36, 129),
(30, 36, 129),
(35, 36, 129),
(36, 36, 129),
(37, 36, 129),
(38, 36, 129),
(39, 36, 129),
(40, 36, 129),
(23, 37, NULL),
(30, 37, NULL),
(35, 37, NULL),
(36, 37, NULL),
(37, 37, NULL),
(38, 37, NULL),
(39, 37, NULL),
(40, 37, NULL),
(41, 37, NULL),
(42, 37, NULL),
(43, 37, NULL),
(41, 36, NULL),
(42, 36, NULL),
(43, 36, NULL),
(23, 38, NULL),
(30, 38, NULL),
(35, 38, NULL),
(36, 38, NULL),
(37, 38, NULL),
(38, 38, NULL),
(39, 38, NULL),
(40, 38, NULL),
(41, 38, NULL),
(42, 38, NULL),
(43, 38, NULL),
(23, 39, NULL),
(30, 39, NULL),
(35, 39, NULL),
(36, 39, NULL),
(37, 39, NULL),
(38, 39, NULL),
(39, 39, NULL),
(40, 39, NULL),
(41, 39, NULL),
(42, 39, NULL),
(43, 39, NULL),
(23, 40, NULL),
(30, 40, NULL),
(35, 40, NULL),
(36, 40, NULL),
(37, 40, NULL),
(38, 40, NULL),
(39, 40, NULL),
(40, 40, NULL),
(41, 40, NULL),
(42, 40, NULL),
(43, 40, NULL),
(44, 40, NULL),
(45, 40, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `variants`
--

CREATE TABLE `variants` (
  `variant_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color` varchar(100) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `amount` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `variants`
--

INSERT INTO `variants` (`variant_id`, `product_id`, `color`, `size`, `amount`) VALUES
(96, 122, 'Trắng', 'M', 60),
(97, 122, 'trắng', 'L', 80),
(98, 122, 'trắng', 'XL', 100),
(99, 123, 'Áo sọc trắng', 'M', 90),
(100, 123, 'Áo sọc trắng', 'L', 180),
(101, 123, 'Áo sọc trắng', 'XL', 50),
(102, 124, 'Đen', 'S', 30),
(103, 124, 'Đen', 'M', 100),
(104, 124, 'Đen', 'L', 40),
(105, 124, 'Đen', 'XL', 70),
(106, 124, 'Đen', 'XXL', 80),
(107, 125, 'Đen', 'M', 90),
(108, 125, 'Đen', 'L', 60),
(109, 125, 'Đen', 'XL', 100),
(110, 125, 'Đen', 'XXL', 130),
(111, 126, 'Đen', 'M', 90),
(112, 126, 'Đen', 'L', 20),
(113, 126, 'Đen', 'XL', 103),
(115, 127, 'Đen', 's', 60),
(116, 127, 'Đen', 'M', 700),
(117, 127, 'Đen', 'L', 30),
(118, 127, 'Đen', 'XL', 73),
(119, 128, 'Hồng', 'S', 60),
(120, 128, 'Hồng', 'M', 243),
(121, 128, 'Hồng', 'L', 354),
(122, 128, 'Hồng', 'XL', 482),
(123, 129, 'Hồng nhạt', 'S', 60),
(124, 129, 'Hồng nhạt', 'M', 70),
(125, 129, 'Hồng nhạt', 'L', 83),
(126, 129, 'Hồng nhạt', 'Xl', 30),
(127, 129, 'trắng', 'M', 30),
(128, 129, 'trắng', 'L', 90),
(129, 129, 'trắng', 'XL', 634),
(130, 130, 'Đen', 'M', 50),
(131, 130, 'Đen', 'L', 60),
(132, 130, 'Đen', 'XL', 622),
(133, 130, 'Nâu', 'S', 344),
(134, 130, 'Nâu', 'M', 30),
(135, 130, 'Nâu', 'L', 90),
(136, 130, 'Nâu', 'XL', 902),
(137, 131, 'Đen', 'S', 722),
(138, 131, 'Đen', 'M', 83),
(139, 131, 'Đen', 'L', 903),
(140, 131, 'Hồng', 'M', 322),
(141, 131, 'Hồng', 'L', 503),
(142, 131, 'Hồng', 'XL', 2443),
(143, 131, 'Hồng', '2XL', 0),
(144, 132, 'Đen', 'M', 722),
(145, 132, 'Đen', 'L', 502),
(146, 132, 'Đen', 'XL', 8332),
(147, 132, 'Vàng', 'M', 60),
(148, 132, 'vàng', 'L', 722),
(149, 132, 'vàng', 'XL', 30),
(150, 132, 'vàng', 'XXL', 243),
(151, 132, 'Xám', 'S', 832),
(152, 132, 'Xám', 'M', 303),
(153, 132, 'xám', 'L', 603),
(154, 132, 'xám', 'XL', 343),
(155, 133, 'Đen', 'M', 833),
(156, 133, 'Đen', 'L', 303),
(157, 133, 'Đen', 'XL', 501),
(158, 133, 'trắng', 'S', 9043),
(159, 133, 'trắng', 'M', 332),
(160, 133, 'trắng', 'L', 5033),
(161, 133, 'trắng', 'XL', 213),
(162, 133, 'trắng', '2XL', 21323),
(163, 133, 'Xanh', 'M', 302),
(164, 133, 'Xanh', 'L', 60),
(165, 133, 'Xanh', 'XL', 2322),
(166, 134, 'Đen', 'M', 722),
(167, 134, 'Đen', 'L', 90),
(168, 134, 'Đen', 'XL', 50),
(169, 135, 'trắng', '29', 83),
(170, 135, 'trắng', '35', 83),
(171, 135, 'trắng', '40', 30),
(172, 135, 'trắng', '41', 4343),
(173, 135, 'trắng', '42', 232),
(174, 136, 'Đen', '36', 23223),
(175, 136, 'Đen', '37', 324),
(176, 136, 'Đen', '38', 222),
(177, 136, 'Đen', '39', 50),
(178, 137, 'Nâu', '35', 302),
(179, 137, 'Nâu', '36', 341),
(180, 137, 'Nâu', '37', 833),
(181, 137, 'Nâu', '38', 445),
(182, 137, 'Nâu', '39', 90),
(183, 137, 'Nâu', '40', 30),
(184, 138, 'trắng', '36', 832),
(185, 138, 'trắng', '37', 343),
(186, 138, 'trắng', '38', 3341),
(187, 138, 'trắng', '39', 722),
(188, 138, 'trắng', '40', 90),
(189, 138, 'trắng', '41', 302),
(190, 138, 'trắng', '42', 305),
(191, 138, 'trắng', '43', 60),
(192, 139, 'Trắng', 'S', 20),
(193, 139, 'Trắng', 'M', 26),
(194, 139, 'Đen', 'S', 44),
(195, 139, 'Đen', 'M', 52),
(196, 139, 'Đen', 'XXL', 44),
(198, 141, 'Đen', 'S', 20),
(199, 141, 'Đen', 'M', 34),
(200, 141, 'Đen', 'Xl', 11),
(201, 127, 'Nâu', 'M', 904),
(202, 127, 'Nâu', 'L', 304),
(203, 127, 'Nâu', 'XL', 833),
(204, 127, 'Hồng', 'S', 835),
(205, 127, 'Hồng', 'M', 544),
(206, 127, 'Hồng', 'L', 305),
(207, 127, 'Hồng', 'XL', 222),
(208, 126, 'Đen', '2XL', 30222),
(209, 126, 'Nâu', 'M', 302),
(210, 126, 'Nâu', 'L', 90),
(211, 126, 'Nâu', 'XL', 601),
(212, 125, 'vàng nhạt', 'M', 301),
(213, 125, 'vàng nhạt', 'L', 66),
(214, 125, 'vàng nhạt', 'XL', 833),
(215, 123, 'Áo sọc xanh trắng', 'M', 30),
(216, 123, 'Áo sọc xanh trắng', 'L', 831),
(217, 123, 'Áo sọc xanh trắng', '2XL', 90),
(218, 122, 'Đen', 'M', 722),
(219, 122, 'Đen', 'L', 83),
(220, 122, 'Đen', 'XL', 833),
(221, 142, 'Đen', '35', 83),
(222, 142, 'Đen', '36', 301),
(223, 142, 'Đen', '37', 901),
(224, 142, 'Đen', '38', 3022),
(225, 142, 'Đen', '39', 22),
(226, 142, 'Đen', '40', 90),
(227, 142, 'Đen', '41', 303),
(228, 143, 'trắng đen', '36', 30),
(229, 143, 'trắng đen', '37', 3022),
(230, 143, 'trắng đen', '38', 722),
(231, 143, 'trắng đen', '39', 304),
(232, 143, 'trắng đen', '40', 90),
(233, 144, 'trắng', '36', 90),
(234, 144, 'trắng', '37', 83),
(235, 144, 'trắng', '38', 8332),
(236, 144, 'trắng', '39', 30),
(237, 144, 'vàng nhạt', '40', 836),
(238, 144, 'vàng nhạt', '41', 444),
(239, 144, 'vàng nhạt', '42', 99),
(240, 145, 'Đen', '36', 83),
(241, 145, 'Đen', '37', 831),
(242, 145, 'Đen', '38', 902),
(243, 145, 'Đen', '39', 30),
(244, 145, 'Đen', '40', 11),
(245, 145, 'trắng', '37', 601),
(246, 145, 'trắng', '38', 60),
(247, 145, 'trắng', '39', 55),
(248, 145, 'trắng', '40', 455),
(249, 145, 'trắng', '41', 233),
(250, 145, 'vàng', '38', 304),
(251, 145, 'vàng', '39', 999),
(252, 145, 'vàng', '40', 55),
(254, 147, 'Nâu', 'M', 30),
(255, 147, 'Nâu', 'L', 601),
(256, 147, 'Nâu', 'XL', 722),
(257, 147, 'xám', 'S', 90),
(258, 147, 'xám', 'M', 60),
(259, 147, 'xám', 'L', 301),
(260, 148, 'Đen', 'S', 90),
(261, 148, 'Đen', 'M', 60),
(262, 148, 'Đen', 'L', 30),
(263, 148, 'Hồng', 'M', 902),
(264, 148, 'Hồng', 'L', 831),
(265, 148, 'Hồng', 'XL', 30),
(266, 148, 'Nâu', 'M', 223),
(267, 148, 'Nâu', 'L', 344),
(268, 148, 'Nâu', 'XL', 6666),
(269, 148, 'Nâu', '2XL', 4432),
(270, 149, 'trắng', 's', 83),
(271, 149, 'trắng', 'M', 90),
(272, 149, 'trắng', 'L', 45),
(273, 149, 'Đen', 'M', 8344),
(274, 149, 'Đen', 'L', 112),
(275, 149, 'Đen', 'XL', 887),
(276, 149, 'Nâu', 'M', 30),
(277, 149, 'Nâu', 'L', 112),
(278, 149, 'Nâu', '2XL', 323),
(279, 150, 'Xanh', '28', 60),
(280, 150, 'Xanh', '29', 90),
(281, 150, 'Xanh', '30', 602),
(282, 150, 'Xanh', '31', 83),
(283, 150, 'Xanh', '32', 233),
(284, 151, 'Nâu', 'M', 30),
(285, 151, 'Nâu', 'L', 677),
(286, 151, 'Nâu', 'XL', 303),
(287, 151, 'trắng', 'S', 344),
(288, 151, 'trắng', 'M', 545),
(289, 151, 'trắng', 'L', 4455),
(290, 151, 'trắng', '2XL', 60),
(291, 151, 'trắng', '3XL', 30333),
(292, 152, 'trắng', 'S', 722),
(293, 152, 'trắng', 'M', 88),
(294, 152, 'trắng', 'L', 97),
(295, 152, 'trắng', 'XL', 2332),
(296, 152, 'Đen', 'S', 60),
(297, 152, 'Đen', 'M', 111),
(298, 152, 'Đen', 'L', 434),
(299, 153, 'Đen', 'S', 90),
(300, 153, 'Đen', 'M', 60),
(301, 153, 'Đen', 'L', 222),
(302, 153, 'Đen', 'XL', 323),
(303, 154, 'Nâu', 'M', 60),
(304, 154, 'Nâu', 'L', 302),
(305, 154, 'Nâu', 'XL', 22),
(306, 154, 'Xanh', 'S', 60),
(307, 154, 'Xanh', 'M', 434),
(308, 154, 'Xanh', 'L', 4656),
(309, 154, 'trắng', 'M', 83),
(310, 154, 'trắng', 'L', 722),
(311, 154, 'trắng', '2XL', 434),
(312, 155, 'Đen', 'orversize', 90),
(313, 155, 'trắng', 'orversize', 83),
(314, 155, 'Xanh', 'orversize', 722),
(315, 155, 'Hồng', 'orversize', 83),
(316, 156, 'Đen', 'orversize', 83),
(317, 156, 'Đỏ', 'orversize', 833),
(318, 156, '7 sắc màu', 'orversize', 444),
(319, 157, 'Đen', 'orversize', 4554),
(320, 158, 'trắng', 'orversize', 722),
(321, 159, 'Đen', 'orversize', 83),
(322, 160, 'Nâu', 'M', 60),
(323, 160, 'Nâu', 'L', 6023),
(324, 160, 'Nâu', 'XL', 32),
(325, 160, 'trắng', 'S', 3023),
(326, 160, 'trắng', 'M', 722),
(327, 160, 'trắng', 'L', 434),
(328, 160, 'Đen', 'M', 303),
(329, 160, 'Đen', 'L', 343),
(330, 160, 'Đen', '2XL', 222),
(331, 161, 'trắng', 'M', 301),
(332, 161, 'trắng', 'L', 212),
(333, 161, 'trắng', 'XL', 333),
(334, 161, 'Xanh', 'S', 434),
(335, 161, 'xanh', 'M', 344),
(336, 161, 'xanh', 'L', 455),
(337, 161, 'Hồng', '2XL', 54),
(338, 161, 'Hồng', '3XL', 45),
(339, 161, 'Hồng', '4xL', 4434),
(340, 162, 'Đen', 'M', 30),
(341, 162, 'Đen', 'L', 722),
(342, 162, 'Đen', 'XL', 72),
(343, 162, 'Đen', '2XL', 434),
(344, 162, 'Xanh', 'S', 232),
(345, 162, 'xanh', 'M', 346),
(346, 162, 'xanh', 'L', 545),
(347, 162, 'xanh rêu', '2XL', 222),
(348, 162, 'xanh rêu', '3XL', 43),
(349, 162, 'xanh rêu', '4XL', 333),
(350, 163, 'Trắng Xanh', 'S', 22),
(351, 164, 'Trắng Xanh', 'M', 334),
(352, 164, 'Trắng Xanh', 'L', 22),
(353, 164, 'Trắng Xanh', 'XL', 44),
(354, 164, 'Trắng nâu', 'S', 3434),
(355, 164, 'Trắng nâu', 'M', 223),
(356, 164, 'Trắng nâu', 'L', 677),
(357, 164, 'Trắng nâu', 'XL', 887),
(358, 164, 'Trắng nâu', '2XL', 4554),
(359, 165, 'trắng', '35', 221),
(360, 165, 'trắng', '36', 333),
(361, 165, 'trắng', '37', 333),
(362, 165, 'trắng', '38', 333),
(363, 165, 'Nâu', '40', 221),
(364, 165, 'Nâu', '41', 5656),
(365, 165, 'Nâu', '42', 33),
(366, 165, 'Nâu', '43', 444),
(367, 165, 'Đỏ', '44', 4343),
(368, 165, 'Đỏ', '35', 222),
(369, 165, 'Đỏ', '36', 333),
(370, 166, 'Đen ', '35', 722),
(371, 166, 'Đen', '36', 711),
(372, 166, 'Đen', '37', 443),
(373, 166, 'Hồng', '40', 1122),
(374, 166, 'Hồng', '41', 44),
(375, 166, 'Hồng', '42', 34),
(376, 166, 'Nâu', '33', 434),
(377, 166, 'Nâu', '39', 4343),
(378, 166, 'Nâu', '33', 45),
(379, 163, 'Trắng Xanh', 'M', 90),
(380, 163, 'Trắng Xanh', 'L', 30),
(381, 163, 'Trắng Xanh', 'XL', 83),
(382, 163, 'Đen', 'S', 722),
(383, 163, 'Đen', 'M', 33),
(384, 163, 'Đen', 'L', 33),
(385, 163, 'Đen', 'XXL', 321);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher`
--

CREATE TABLE `voucher` (
  `voucher_id` int(11) NOT NULL,
  `content_voucher` varchar(255) NOT NULL,
  `del_price` int(10) NOT NULL DEFAULT 0,
  `del_percent` int(10) NOT NULL DEFAULT 0,
  `from_price` int(10) NOT NULL DEFAULT 0,
  `to_price` int(10) NOT NULL DEFAULT 99999999,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `voucher`
--

INSERT INTO `voucher` (`voucher_id`, `content_voucher`, `del_price`, `del_percent`, `from_price`, `to_price`, `start_date`, `end_date`) VALUES
(36, 'Giảm giá 15k cho sản phẩm', 15000, 0, 0, 999999999, '2023-12-05 16:24:00', '2024-01-05 16:24:00'),
(37, 'Giảm tối đa 30k', 30000, 0, 0, 999999999, '2023-12-06 12:11:00', '2024-01-06 12:11:00'),
(38, 'Giảm giá 100k cho đơn từ 1 m trở lên', 100000, 0, 1000000, 999999999, '2023-12-08 14:21:00', '2023-12-14 14:21:00'),
(39, 'giảm 10k cho mọi đơn hàng', 10000, 0, 0, 999999999, '2023-11-29 14:36:00', '2023-12-06 14:37:00'),
(40, 'Giảm giá 20k', 20000, 0, 0, 999999999, '2023-12-08 15:20:00', '2023-12-20 15:20:00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `todolist`
--
ALTER TABLE `todolist`
  ADD PRIMARY KEY (`todolist_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `user_voucher`
--
ALTER TABLE `user_voucher`
  ADD KEY `user_voucher_ibfk_1` (`user_id`),
  ADD KEY `user_voucher_ibfk_2` (`voucher_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`variant_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`voucher_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT cho bảng `todolist`
--
ALTER TABLE `todolist`
  MODIFY `todolist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `variants`
--
ALTER TABLE `variants`
  MODIFY `variant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=386;

--
-- AUTO_INCREMENT cho bảng `voucher`
--
ALTER TABLE `voucher`
  MODIFY `voucher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `user_voucher`
--
ALTER TABLE `user_voucher`
  ADD CONSTRAINT `user_voucher_ibfk_1` FOREIGN KEY (`voucher_id`) REFERENCES `voucher` (`voucher_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_voucher_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_voucher_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `variants`
--
ALTER TABLE `variants`
  ADD CONSTRAINT `variants_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
