-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th3 20, 2022 lúc 08:10 AM
-- Phiên bản máy phục vụ: 5.7.33
-- Phiên bản PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quan_ly_chi_tieu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `data_expense`
--

CREATE TABLE `data_expense` (
  `id_expense` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title_expense` varchar(150) NOT NULL,
  `price_expense` int(11) NOT NULL,
  `description_expense` text,
  `created_at_expense` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `data_expense`
--

INSERT INTO `data_expense` (`id_expense`, `id_user`, `title_expense`, `price_expense`, `description_expense`, `created_at_expense`) VALUES
(3, 6, 'Gói hàng shoppe khá đẹp', 120000, 'hàng mua cho Hạnh', '2022-02-14'),
(5, 6, 'Hàng tiki chuẩn quá', 120000, 'Chi là test chưa lưu\r\n', '2022-03-12'),
(9, 6, 'Đi tam đảo', 122000, '', '2022-03-15'),
(10, 6, 'đồ ăn tối', 10000, 'công \r\n', '2022-03-15'),
(12, 6, 'Đồ ăn trưa', 20000, '', '2022-03-16'),
(13, 6, 'đồ ăn tối', 35000, 'anh tối width frend\r\n', '2022-03-16'),
(15, 6, 'Đồ ăn sáng', 20002, '', '2022-03-16'),
(16, 6, 'Đồ đi chơi', 20000, '', '2022-03-16'),
(17, 6, 'đi xe bus', 20000, '', '2022-03-16'),
(20, 6, 'Ăn sáng', 20000, '', '2022-03-16'),
(26, 6, 'Đi tam đảo ngắm mây', 200000, '', '2022-03-16'),
(27, 6, 'đồ ăn tối', 200000, '', '2022-03-20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `data_revenue`
--

CREATE TABLE `data_revenue` (
  `id_revenue` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title_revenue` varchar(150) NOT NULL,
  `price_revenue` int(11) NOT NULL,
  `description_revenue` text NOT NULL,
  `created_at_revenue` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `data_revenue`
--

INSERT INTO `data_revenue` (`id_revenue`, `id_user`, `title_revenue`, `price_revenue`, `description_revenue`, `created_at_revenue`) VALUES
(1, 6, 'đi phượt', 500000, 'test\n', '2022-03-16'),
(2, 6, 'đi đòi nợ', 200000, '', '2022-03-16'),
(3, 6, 'Đi tam đảo', 123123, '', '2022-03-16'),
(9, 6, 'Cơ chế phân tầng', 20000, '', '2022-03-16'),
(10, 6, 'Tiền lương hưu', 250000, '', '2022-03-20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `token`) VALUES
(6, 'cong pham', 'congphamtienthanh@gmail.com', '$2y$10$9tVJzRi9YAuNpN9ICFguHOApS4zPlKupMQ6sCk2a26q8B94zVO0l.', '57246e622e13e550365742b4b39237487e72e3971b54e8182fca'),
(8, 'cong pham', 'congj2school@gmail.com', '$2y$10$zOlnCG3n07F45T/.F1Tjye8Iv84/8BnKfe8ExRUuSSJ29u1YVU..e', '18ce676c97725b6909f278ab7c700eda3a4be0812bd4a4775e5b');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `data_expense`
--
ALTER TABLE `data_expense`
  ADD PRIMARY KEY (`id_expense`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `data_revenue`
--
ALTER TABLE `data_revenue`
  ADD PRIMARY KEY (`id_revenue`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `data_expense`
--
ALTER TABLE `data_expense`
  MODIFY `id_expense` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `data_revenue`
--
ALTER TABLE `data_revenue`
  MODIFY `id_revenue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `data_expense`
--
ALTER TABLE `data_expense`
  ADD CONSTRAINT `data_expense_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `data_revenue`
--
ALTER TABLE `data_revenue`
  ADD CONSTRAINT `data_revenue_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
