-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 13, 2024 lúc 09:36 AM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Cơ sở dữ liệu: `circlek`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time_in` datetime NOT NULL,
  `time_out` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `attendance`
--

INSERT INTO `attendance` (`id`, `employee_id`, `name`, `status`, `time_in`, `time_out`) VALUES
(1, 1, NULL, 'Đã ra', '2024-10-07 01:44:36', '2024-10-07 01:44:43'),
(2, 1, NULL, 'Đã ra', '2024-10-07 07:28:47', '2024-10-07 07:35:22'),
(3, 1, NULL, 'Đã ra', '2024-10-07 07:35:14', '2024-10-07 07:35:22'),
(4, 1, NULL, 'Đã ra', '2024-10-07 07:36:27', '2024-10-07 14:40:42'),
(5, 1, NULL, 'Đã ra', '2024-10-07 07:36:56', '2024-10-07 14:40:42'),
(6, 1, NULL, 'Đã ra', '2024-10-07 07:37:03', '2024-10-07 14:40:42'),
(7, 1, NULL, 'Đã ra', '2024-10-07 07:37:12', '2024-10-07 14:40:42'),
(8, 1, NULL, 'Đã ra', '2024-10-07 07:37:46', '2024-10-07 14:40:42'),
(9, 1, NULL, 'Đã ra', '2024-10-07 07:37:55', '2024-10-07 14:40:42'),
(10, 1, NULL, 'Đã ra', '2024-10-07 07:38:20', '2024-10-07 14:40:42'),
(11, 1, NULL, 'Đã ra', '2024-10-07 12:34:22', '2024-10-07 14:40:42'),
(12, 1, NULL, 'Đã ra', '2024-10-07 12:35:27', '2024-10-07 14:40:42'),
(13, 1, NULL, 'Đã ra', '2024-10-07 12:35:44', '2024-10-07 14:40:42'),
(14, 1, NULL, 'Đã ra', '2024-10-07 12:35:53', '2024-10-07 14:40:42'),
(15, 1, NULL, 'Đã ra', '2024-10-07 12:36:01', '2024-10-07 14:40:42'),
(16, 1, NULL, 'Đã ra', '2024-10-07 14:39:20', '2024-10-07 14:40:42'),
(17, 1, NULL, 'Đã ra', '2024-10-07 14:40:29', '2024-10-07 14:40:42'),
(18, 1, NULL, 'Đã ra', '2024-10-11 21:38:44', '2024-10-11 22:29:46'),
(19, 1, NULL, 'Đã ra', '2024-10-11 22:22:33', '2024-10-11 22:29:46'),
(20, 1, NULL, 'Đã ra', '2024-10-11 22:26:11', '2024-10-11 22:29:46'),
(21, 1, NULL, 'Đã ra', '2024-10-11 22:28:13', '2024-10-11 22:29:46'),
(22, 1, NULL, 'Đã vào', '2024-10-11 22:30:06', NULL),
(23, 1, NULL, 'Đã vào', '2024-10-11 22:32:46', NULL),
(24, 1, NULL, 'Đã vào', '2024-10-11 22:44:07', NULL),
(25, 2, 'Minh', 'Đã ra', '2024-10-01 08:00:00', '2024-10-01 17:00:00'),
(26, 2, 'Minh', 'Đã ra', '2024-10-02 08:00:00', '2024-10-02 17:00:00'),
(27, 2, NULL, 'Đã ra', '2024-09-24 08:00:00', '2024-09-24 17:00:00'),
(28, 4, 'Ti?n', 'Đã ra', '2024-11-07 08:02:00', '2024-11-07 18:00:00'),
(29, 4, 'tien', 'Đã ra', '2024-11-08 08:00:00', '2024-11-08 16:00:00'),
(30, 4, NULL, 'Đã ra', '2024-11-09 08:00:00', '2024-11-09 17:00:00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
