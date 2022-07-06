-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 21, 2022 lúc 09:18 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `petmark`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(5, 'admin', 'admin@gmail.com', '96e79218965eb72c92a549dd5a330112', NULL, NULL),
(6, 'danh ha', 'ha2@gmail.com', '96e79218965eb72c92a549dd5a330112', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_role`
--

CREATE TABLE `admin_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_role`
--

INSERT INTO `admin_role` (`id`, `admin_id`, `role_id`, `created_at`, `updated_at`) VALUES
(244, 5, 1, NULL, NULL),
(245, 5, 2, NULL, NULL),
(246, 5, 3, NULL, NULL),
(247, 5, 4, NULL, NULL),
(248, 5, 5, NULL, NULL),
(249, 5, 6, NULL, NULL),
(250, 5, 7, NULL, NULL),
(251, 5, 8, NULL, NULL),
(252, 5, 9, NULL, NULL),
(253, 5, 10, NULL, NULL),
(254, 5, 11, NULL, NULL),
(255, 5, 12, NULL, NULL),
(256, 5, 13, NULL, NULL),
(257, 5, 14, NULL, NULL),
(258, 5, 15, NULL, NULL),
(259, 5, 16, NULL, NULL),
(260, 5, 17, NULL, NULL),
(261, 5, 18, NULL, NULL),
(262, 5, 19, NULL, NULL),
(263, 5, 20, NULL, NULL),
(264, 5, 21, NULL, NULL),
(265, 5, 22, NULL, NULL),
(266, 5, 23, NULL, NULL),
(267, 5, 24, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `category_parent` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `keywords`, `level`, `status`, `category_parent`, `created_at`, `updated_at`) VALUES
(4, 'Chó cảnh', 'cho-canh0814', 'Chó cảnh', NULL, 1, 0, NULL, NULL),
(5, 'thức ăn, dinh dưỡng', 'thức ăn, dinh dưỡng', 'thức ăn, dinh dưỡng', NULL, 1, 4, NULL, NULL),
(8, 'Pate & Nước sốt', 'pate-nuoc-sot1310', 'Pate & Nước sốt', NULL, 1, 5, NULL, NULL),
(9, 'Mèo Cảnh', 'meo-canh', 'Mèo Cảnh', NULL, 1, 0, NULL, NULL),
(10, 'Thức ăn, Dinh dưỡng', 'thuc-an-dinh-duong', 'Thức ăn, Dinh dưỡng', NULL, 1, 9, NULL, NULL),
(11, 'Thức ăn hạt khô', 'thuc-an-hat-kho', 'Thức ăn hạt khô', NULL, 1, 10, NULL, NULL),
(12, 'Súp thưởng ăn liền', 'sup-thuong-an-lien', 'Súp thưởng ăn liền', NULL, 1, 5, NULL, NULL),
(13, 'Vitamin & Dinh dưỡng', 'vitamin-dinh-duong', 'Vitamin & Dinh dưỡng', NULL, 1, 5, NULL, NULL),
(14, 'Vệ sinh, Chăm Sóc', 've-sinh-cham-soc', 'Vệ sinh, Chăm Sóc', NULL, 1, 4, NULL, NULL),
(15, 'Tã bỉm & Tấm lót vệ sinh', 'ta-bim-tam-lot-ve-sinh', 'Tã bỉm & Tấm lót vệ sinh', NULL, 1, 14, NULL, NULL),
(16, 'Sữa tắm & Xịt dưỡng', 'sua-tam-xit-duong', 'Sữa tắm & Xịt dưỡng', NULL, 1, 14, NULL, NULL),
(17, 'Đồ dùng, Phụ kiện', 'do-dung-phu-kien', 'Đồ dùng, Phụ kiện', NULL, 1, 4, NULL, NULL),
(18, 'Quần áo & Mũ nón', 'quan-ao-mu-non', 'Quần áo & Mũ nón', NULL, 1, 17, NULL, NULL),
(19, 'Vòng cổ & Dây dắt', 'vong-co-day-dat', 'Vòng cổ & Dây dắt', NULL, 1, 17, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_post`
--

CREATE TABLE `category_post` (
  `id` int(11) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category_post`
--

INSERT INTO `category_post` (`id`, `slug`, `keywords`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'cho', 'Chó', 'Chó', 1, '2022-05-11 14:16:17', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `delivery`
--

CREATE TABLE `delivery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `delivery`
--

INSERT INTO `delivery` (`id`, `city`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Thành phố Hà Nội', 40000, NULL, NULL),
(2, 'Thành phố Hồ Chí Minh', 60000, NULL, NULL),
(4, 'Tỉnh Bắc Kạn', 40000, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gallery`
--

INSERT INTO `gallery` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(63, 'banh-thuong-cho-cho-vi-ca-jerhigh-fish-stick-400x4001651728602.webp', 17, NULL, NULL),
(64, 'pate-cho-cho-vi-ga-rau-cu-va-sun-lon-inaba-chicken-vegetables-pig-cartilage1-400x4001651729082.webp', 18, NULL, NULL),
(65, 'pate-cho-cho-vi-thit-bo-iris-one-care-beef100g-400x4001651739636.webp', 19, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_03_24_062701_create_table_social', 1),
(4, '2022_03_27_035738_create_table_product', 1),
(5, '2022_03_30_081219_create_table_star_rating', 1),
(6, '2022_03_30_083240_create_table_gallery', 1),
(7, '2022_04_05_064944_create_table_admin', 1),
(8, '2022_04_05_065249_create_table_role', 1),
(9, '2022_04_05_065447_create_table_admin_role', 1),
(10, '2022_04_05_065754_create_table_order', 1),
(11, '2022_04_05_070131_create_table_order_detail', 1),
(12, '2022_04_05_071222_create_table_delivery', 1),
(13, '2022_04_05_073140_create_table_category', 1),
(14, '2022_04_05_073751_category_product', 1),
(15, '2022_04_05_080842_create_table_web_detail', 1),
(16, '2022_04_09_151908_create_table_ship', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `user_id`, `status`, `payment_type`, `created_at`, `updated_at`) VALUES
(22, 7, 2, 'Trả tiền mặt', '2022-05-10', '2022-05-21'),
(23, 7, 2, 'Trả tiền mặt', '2022-05-21', '2022-05-21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(23, 22, 19, 1, 55000, '2022-05-10', '2022-05-10'),
(24, 23, 18, 4, 35000, '2022-05-21', '2022-05-21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id` int(11) UNSIGNED NOT NULL,
  `category_post_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `auth_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id`, `category_post_id`, `name`, `image`, `slug`, `keywords`, `content`, `status`, `created_at`, `updated_at`, `auth_name`) VALUES
(2, 2, 'Giống chó Alaskan Malamute: khổng lồ liệu giá có rẻ?', 'images1652282604.jpg', 'giong-cho-alaskan-malamute-khong-lo-lieu-gia-co-re1441523', 'Giống chó Alaskan Malamute: khổng lồ liệu giá có rẻ?', '<h2>Giới thiệu về ch&oacute; Alaskan Malamute</h2>\r\n\r\n<p><a href=\"https://www.petmart.vn/giong-cho-alaskan-malamute-khong-lo-lieu-gia-co-re\">Ch&oacute; Alaskan Malamute&nbsp;</a>&nbsp;thường được gọi tắt l&agrave; ch&oacute; Alaska, l&agrave; một giống ch&oacute; k&eacute;o xe cổ xưa tại Alaska. T&ecirc;n của ch&uacute;ng được đặt theo t&ecirc;n bộ tộc Mahlemut, một bộ tộc Eskimo sống du mục. Ch&oacute; Alaska c&oacute; th&acirc;n h&igrave;nh cao lớn, khung xương chắc khỏe. Nhờ khả năng th&iacute;ch nghi v&agrave; sức bền cực tốt, ch&uacute;ng đ&atilde; được sử dụng để l&agrave;m ch&oacute; k&eacute;o xe.</p>\r\n\r\n<p>Alaskan trưởng th&agrave;nh c&oacute; t&iacute;nh c&aacute;ch kh&aacute; trầm tĩnh, th&acirc;n thiện v&agrave; trung th&agrave;nh với chủ ch&acirc;n. Ch&uacute;ng &iacute;t khi sủa bậy v&agrave; y&ecirc;u sạch sẽ, kh&ocirc;ng c&oacute; m&ugrave;i h&ocirc;i đặc trưng như nhiều giống ch&oacute; kh&aacute;c.</p>\r\n\r\n<p>Ch&oacute; Alaska c&oacute; khả năng x&aacute;c định phương hướng rất tốt, th&iacute;ch vận động ngo&agrave;i trời. Khứu gi&aacute;c của ch&uacute;ng rất nhạy b&eacute;n, th&iacute;ch hợp để l&agrave;m ch&oacute; giữ nh&agrave; hoặc lao động. Tuy nhi&ecirc;n, ch&uacute;ng cũng rất hiếu động, th&iacute;ch tự do v&agrave; &iacute;t tập trung hơn c&aacute;c giống ch&oacute; nghiệp vụ, v&igrave; thế cần c&oacute; người chủ nhiều kinh nghiệm để huấn luyện.</p>\r\n\r\n<p><img alt=\"\" src=\"/petmark/public/update/images/images/avt-cute.jpg\" style=\"height:575px; width:575px\" /></p>', 1, '2022-05-11 15:27:06', NULL, 'nghia');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_price` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sale` int(11) DEFAULT NULL,
  `sell` int(11) NOT NULL DEFAULT 0,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `keywords`, `cost_price`, `price`, `quantity`, `sale`, `sell`, `content`, `status`, `created_at`, `updated_at`, `category_id`) VALUES
(17, 'Bánh thưởng cho chó vị bánh quy JERHIGH Cookie', 'banh-thuong-cho-cho-vi-banh-quy-jerhigh-cookie2211623', 'Bánh thưởng cho chó vị bánh quy JERHIGH Cookie', 40000, 55000, 100, NULL, 0, 'Mô tả\r\nBánh thưởng cho chó vị bánh quy JERHIGH  Cookie mang lại nguồn năng lượng cho tất cả các giống chó.\r\n\r\nLợi ích chính\r\nBánh thưởng cho chó vị bánh quy JERHIGH Cookie là món ăn nhẹ có thể mang lại rất nhiều lợi ích. Phù hợp với các hoạt động của cún cưng với việc duy trì năng lượng thiết yếu. Thịt gà mang tới nguồn Protein cao cấp giúp phát triển cơ bắp và hồi phục các mô. Đặc biệt là nhanh chóng hồi phục các tổn thương bên trong. Vitamin D3 giúp xương và răng chắc khỏe. Vitamin B1, B5, B6 là những dưỡng chất thiết yếu cho các chức năng của não. Kích thích não hoạt động nhanh nhạy và có những phản xạ linh hoạt hơn trong huấn luyện. Vitamin B1 giúp tăng cường hoạt động trao đổi chất. Hỗ trợ tiêu hóa và đẩy nhanh quá trình trao đổi chất.\r\n\r\nBánh thưởng cho chó JERHIGH Cookie được đóng gói túi khóa 70g vô cùng tiện dụng. Rất tiện cho việc sử dụng và mang theo. JERHIGH Cookie không cần bảo quản lạnh mà vẫn giữ được hượng vị thơm ngon. Để mang lại hiệu quả tốt nhất, bạn nên đặt cạnh thức ăn của thú cưng một bát nước uống.\r\n\r\nThành phần dinh dưỡng\r\nBánh thưởng cho chó vị bánh quy JERHIGH Cookie là phần thưởng xứng đáng dành tặng cho thú cưng. Sản phẩm cung cấp nhiều chất dinh dưỡng từ thịt gà. Các thành phần nguyên liệu khác bao gồm: bột mì, nước, glycerine, đường, chất ổn định, vị thịt, muối, chất bảo quản, vitamin E, chất tạo màu tự nhiên. Tất cả đều được xử lý và sản xuất trong môi trường an toàn. Đảm bảo vệ sinh và chất lượng sản phẩm bởi sự giám sát của các chuyên gia.', 1, '2022-05-07 08:29:41', NULL, '4, 5, 8'),
(18, 'Pate cho chó vị gà, rau củ và sụn lợn INABA Chicken, Vegetables & Pig Cartilage', 'pate-cho-cho-vi-ga-rau-cu-va-sun-lon-inaba-chicken-vegetables-pig-cartilage19', 'Pate cho chó vị gà, rau củ và sụn lợn INABA Chicken, Vegetables & Pig Cartilage', 20000, 35000, 96, NULL, 4, 'Mô tả\r\nPate cho chó vị gà, rau củ và sụn lợn INABA  Chicken, Vegetables & Pig Cartilage dạng hộp đôi. Sản phẩm thức ăn ướt phù hợp với nhu cầu dinh dưỡng dành cho chó có thể tự ăn riêng hoặc trộn cùng với bữa ăn hàng ngày. Không chứa chất bảo quản.\r\n\r\nThành phần dinh dưỡng\r\nThịt ức gà 11%, gan gà, sụn lợn 3%, rau xanh, cà rốt, bí ngô, chiết xuất men đậu tây, collagen cá, tinh bột, men gạo đỏ… cùng các thành phần phụ gia khác. Với thành phần chiết xuất trà xanh giúp làm giảm mùi hôi phân và nước tiểu của chó.\r\nHướng dẫn sử dụng\r\nCho chó ăn khoảng 2 hộp / 1 ngày, hoặc điều chỉnh tăng lên theo tùy mức độ hoạt động và thể trạng của chó. Xem ngày sản xuất ở mặt sau của bao bì. Bảo quản trong tủ lạnh sau khi mở. Nên hâm ấm trước khi sử dụng.', 1, '2022-05-07 08:29:29', NULL, '4, 5, 8'),
(19, 'Pate cho chó vị thịt bò IRIS One Care Beef', 'pate-cho-cho-vi-thit-bo-iris-one-care-beef12112062318', 'Pate cho chó vị thịt bò IRIS One Care Beef', 40000, 55000, 1, NULL, 1, 'Mô tả\r\nPate cho chó vị thịt bò IRIS  One Care Beef là sản phẩm dành cho tất cả giống chó. Với thành phần hoàn toàn từ tự nhiên và thịt bò.\r\n\r\nLợi ích chính\r\nĐặc biệt với công thức chế biến riêng tạo nên khẩu phần ăn ngon miệng cho thú cưng.\r\nBổ sung Protein đảm bảo một sức khỏe toàn diện hơn.\r\nTạo nên cảm giác thèm ăn cho cún cưng.\r\nPate cho chó vị thịt bò IRIS One Care Beef làm hài lòng cả những chú chó kén ăn nhất.\r\nThành phần dinh dưỡng\r\nPate cho chó vị thịt bò IRIS One Care Beef bao gồm các thành phần như thịt gà, thịt bò, cà rốt, đậu hà lan, gạo.', 1, '2022-05-21 07:11:46', NULL, '4, 5, 8');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'thêm phí vận chuyển', NULL, NULL),
(2, 'sửa phí vận chuyển', NULL, NULL),
(3, 'xóa phí vận chuyển', NULL, NULL),
(4, 'xem phí vận chuyển', NULL, NULL),
(5, 'thêm sản phẩm', NULL, NULL),
(6, 'sửa sản phẩm', NULL, NULL),
(7, 'xóa sản phẩm', NULL, NULL),
(8, 'xem sản phẩm', NULL, NULL),
(9, 'thêm danh mục', NULL, NULL),
(10, 'sửa danh mục', NULL, NULL),
(11, 'xóa danh mục', NULL, NULL),
(12, 'xem danh mục', NULL, NULL),
(13, 'xem đơn hàng', NULL, NULL),
(14, 'sửa đơn hàng', NULL, NULL),
(15, 'xóa đơn hàng', NULL, NULL),
(16, 'xem chi tiết đơn hàng', NULL, NULL),
(17, 'xem thông tin khách hàng', NULL, NULL),
(18, 'xem báo cáo thống kê', NULL, NULL),
(19, 'quản lý thông tin website', NULL, NULL),
(20, 'xem nhân viên', NULL, NULL),
(21, 'xóa nhân viên', NULL, NULL),
(22, 'sửa nhân viên', NULL, NULL),
(23, 'phân quyền', NULL, NULL),
(24, 'thêm nhân viên', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ship`
--

CREATE TABLE `ship` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ship`
--

INSERT INTO `ship` (`id`, `order_id`, `name`, `phone`, `note`, `city`, `price`, `address`, `created_at`, `updated_at`) VALUES
(14, 22, 'danh ha', '322342444', NULL, 'Thành phố Hà Nội', 40000, 'a10', NULL, NULL),
(15, 23, 'danh ha', '32234244', NULL, 'Thành phố Hà Nội', 40000, '222222', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_tinhthanhpho`
--

CREATE TABLE `tbl_tinhthanhpho` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `tbl_tinhthanhpho`
--

INSERT INTO `tbl_tinhthanhpho` (`id`, `name`, `type`) VALUES
(1, 'Thành phố Hà Nội', 'Thành phố Trung ương'),
(2, 'Tỉnh Hà Giang', 'Tỉnh'),
(4, 'Tỉnh Cao Bằng', 'Tỉnh'),
(6, 'Tỉnh Bắc Kạn', 'Tỉnh'),
(8, 'Tỉnh Tuyên Quang', 'Tỉnh'),
(10, 'Tỉnh Lào Cai', 'Tỉnh'),
(11, 'Tỉnh Điện Biên', 'Tỉnh'),
(12, 'Tỉnh Lai Châu', 'Tỉnh'),
(14, 'Tỉnh Sơn La', 'Tỉnh'),
(15, 'Tỉnh Yên Bái', 'Tỉnh'),
(17, 'Tỉnh Hoà Bình', 'Tỉnh'),
(19, 'Tỉnh Thái Nguyên', 'Tỉnh'),
(20, 'Tỉnh Lạng Sơn', 'Tỉnh'),
(22, 'Tỉnh Quảng Ninh', 'Tỉnh'),
(24, 'Tỉnh Bắc Giang', 'Tỉnh'),
(25, 'Tỉnh Phú Thọ', 'Tỉnh'),
(26, 'Tỉnh Vĩnh Phúc', 'Tỉnh'),
(27, 'Tỉnh Bắc Ninh', 'Tỉnh'),
(30, 'Tỉnh Hải Dương', 'Tỉnh'),
(31, 'Thành phố Hải Phòng', 'Thành phố Trung ương'),
(33, 'Tỉnh Hưng Yên', 'Tỉnh'),
(34, 'Tỉnh Thái Bình', 'Tỉnh'),
(35, 'Tỉnh Hà Nam', 'Tỉnh'),
(36, 'Tỉnh Nam Định', 'Tỉnh'),
(37, 'Tỉnh Ninh Bình', 'Tỉnh'),
(38, 'Tỉnh Thanh Hóa', 'Tỉnh'),
(40, 'Tỉnh Nghệ An', 'Tỉnh'),
(42, 'Tỉnh Hà Tĩnh', 'Tỉnh'),
(44, 'Tỉnh Quảng Bình', 'Tỉnh'),
(45, 'Tỉnh Quảng Trị', 'Tỉnh'),
(46, 'Tỉnh Thừa Thiên Huế', 'Tỉnh'),
(48, 'Thành phố Đà Nẵng', 'Thành phố Trung ương'),
(49, 'Tỉnh Quảng Nam', 'Tỉnh'),
(51, 'Tỉnh Quảng Ngãi', 'Tỉnh'),
(52, 'Tỉnh Bình Định', 'Tỉnh'),
(54, 'Tỉnh Phú Yên', 'Tỉnh'),
(56, 'Tỉnh Khánh Hòa', 'Tỉnh'),
(58, 'Tỉnh Ninh Thuận', 'Tỉnh'),
(60, 'Tỉnh Bình Thuận', 'Tỉnh'),
(62, 'Tỉnh Kon Tum', 'Tỉnh'),
(64, 'Tỉnh Gia Lai', 'Tỉnh'),
(66, 'Tỉnh Đắk Lắk', 'Tỉnh'),
(67, 'Tỉnh Đắk Nông', 'Tỉnh'),
(68, 'Tỉnh Lâm Đồng', 'Tỉnh'),
(70, 'Tỉnh Bình Phước', 'Tỉnh'),
(72, 'Tỉnh Tây Ninh', 'Tỉnh'),
(74, 'Tỉnh Bình Dương', 'Tỉnh'),
(75, 'Tỉnh Đồng Nai', 'Tỉnh'),
(77, 'Tỉnh Bà Rịa - Vũng Tàu', 'Tỉnh'),
(79, 'Thành phố Hồ Chí Minh', 'Thành phố Trung ương'),
(80, 'Tỉnh Long An', 'Tỉnh'),
(82, 'Tỉnh Tiền Giang', 'Tỉnh'),
(83, 'Tỉnh Bến Tre', 'Tỉnh'),
(84, 'Tỉnh Trà Vinh', 'Tỉnh'),
(86, 'Tỉnh Vĩnh Long', 'Tỉnh'),
(87, 'Tỉnh Đồng Tháp', 'Tỉnh'),
(89, 'Tỉnh An Giang', 'Tỉnh'),
(91, 'Tỉnh Kiên Giang', 'Tỉnh'),
(92, 'Thành phố Cần Thơ', 'Thành phố Trung ương'),
(93, 'Tỉnh Hậu Giang', 'Tỉnh'),
(94, 'Tỉnh Sóc Trăng', 'Tỉnh'),
(95, 'Tỉnh Bạc Liêu', 'Tỉnh'),
(96, 'Tỉnh Cà Mau', 'Tỉnh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `money_spent` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `order`, `money_spent`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Tuấn Nghĩa', 'tuannghia1406@gmail.com', NULL, '', NULL, 4, 34849995, '2022-04-10 21:13:46', '2022-05-06 19:03:10'),
(7, 'ha', 'ha@gmail.com', NULL, '96e79218965eb72c92a549dd5a330112', NULL, 5, 360000, '2022-05-10 01:07:33', '2022-05-21 00:15:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `web_detail`
--

CREATE TABLE `web_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fan_page` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `web_detail`
--

INSERT INTO `web_detail` (`id`, `name`, `logo`, `keywords`, `address`, `email`, `phone`, `fan_page`, `created_at`, `updated_at`) VALUES
(1, 'Shoppy', 'hinh-nen-vit-avatar-anh-vit-cute-ngoc-nghech-11650106332.jpg', NULL, 'Nam Định', 'admin@gmail.com', '097-893-1719', NULL, NULL, '2022-04-17 03:27:31');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_role_admin_id_foreign` (`admin_id`),
  ADD KEY `admin_role_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_detail_order_id_foreign` (`order_id`),
  ADD KEY `order_detail_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_post_id` (`category_post_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ship`
--
ALTER TABLE `ship`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ship_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `tbl_tinhthanhpho`
--
ALTER TABLE `tbl_tinhthanhpho`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `web_detail`
--
ALTER TABLE `web_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `admin_role`
--
ALTER TABLE `admin_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `category_post`
--
ALTER TABLE `category_post`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `ship`
--
ALTER TABLE `ship`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `web_detail`
--
ALTER TABLE `web_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admin_role`
--
ALTER TABLE `admin_role`
  ADD CONSTRAINT `admin_role_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`category_post_id`) REFERENCES `category_post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `ship`
--
ALTER TABLE `ship`
  ADD CONSTRAINT `ship_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
