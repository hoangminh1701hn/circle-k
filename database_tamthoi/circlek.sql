-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 23, 2024 lúc 07:57 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

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
(27, 2, NULL, 'Đã ra', '2024-09-24 08:00:00', '2024-09-24 17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attendance_history`
--

CREATE TABLE `attendance_history` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `time_in` datetime DEFAULT NULL,
  `time_out` datetime DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `record_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `attendance_history`
--

INSERT INTO `attendance_history` (`id`, `employee_id`, `name`, `time_in`, `time_out`, `status`, `record_time`) VALUES
(1, 1, NULL, '2024-10-07 01:44:36', NULL, 'vào', '2024-10-06 18:44:36'),
(2, 1, NULL, NULL, '2024-10-07 01:44:43', 'ra', '2024-10-06 18:44:43'),
(3, 1, NULL, '2024-10-07 07:28:47', NULL, 'vào', '2024-10-07 00:28:47'),
(4, 1, NULL, '2024-10-07 07:35:14', NULL, 'vào', '2024-10-07 00:35:14'),
(5, 1, NULL, NULL, '2024-10-07 07:35:22', 'ra', '2024-10-07 00:35:22'),
(6, 1, NULL, '2024-10-07 07:36:27', NULL, 'vào', '2024-10-07 00:36:27'),
(7, 1, NULL, '2024-10-07 07:36:56', NULL, 'vào', '2024-10-07 00:36:56'),
(8, 1, NULL, '2024-10-07 07:37:03', NULL, 'vào', '2024-10-07 00:37:03'),
(9, 1, NULL, '2024-10-07 07:37:12', NULL, 'vào', '2024-10-07 00:37:12'),
(10, 1, NULL, '2024-10-07 07:37:46', NULL, 'vào', '2024-10-07 00:37:46'),
(11, 1, NULL, '2024-10-07 07:37:55', NULL, 'vào', '2024-10-07 00:37:55'),
(12, 1, NULL, '2024-10-07 07:38:20', NULL, 'vào', '2024-10-07 00:38:20'),
(13, 1, NULL, '2024-10-07 12:34:22', NULL, 'vào', '2024-10-07 05:34:22'),
(14, 1, NULL, '2024-10-07 12:35:27', NULL, 'vào', '2024-10-07 05:35:27'),
(15, 1, NULL, '2024-10-07 12:35:44', NULL, 'vào', '2024-10-07 05:35:44'),
(16, 1, NULL, '2024-10-07 12:35:53', NULL, 'vào', '2024-10-07 05:35:53'),
(17, 1, NULL, '2024-10-07 12:36:01', NULL, 'vào', '2024-10-07 05:36:01'),
(18, 1, NULL, '2024-10-07 14:39:20', NULL, 'vào', '2024-10-07 07:39:20'),
(19, 1, NULL, '2024-10-07 14:40:29', NULL, 'vào', '2024-10-07 07:40:29'),
(20, 1, NULL, NULL, '2024-10-07 14:40:42', 'ra', '2024-10-07 07:40:42'),
(26, 1, NULL, '2024-10-11 22:30:06', NULL, 'vào', '2024-10-11 15:30:06'),
(27, 1, NULL, '2024-10-11 22:32:46', NULL, 'vào', '2024-10-11 15:32:46'),
(28, 1, NULL, '2024-10-11 22:44:07', NULL, 'vào', '2024-10-11 15:44:07'),
(29, 1, NULL, '2024-10-01 08:00:00', '2024-10-16 17:00:00', NULL, '2024-10-16 07:16:08'),
(30, 1, 'Minh', '2024-10-01 08:00:00', NULL, 'vào', '2024-10-16 07:17:15'),
(31, 2, 'Minh', '2024-10-01 08:00:00', NULL, 'vào', '2024-10-16 07:17:58'),
(32, 2, 'Minh', NULL, '2024-10-16 17:00:00', 'Ra', '2024-10-16 07:18:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luong`
--

CREATE TABLE `luong` (
  `id_luong` int(11) UNSIGNED NOT NULL,
  `taikhoan` int(11) NOT NULL,
  `luongTheoGio` int(255) NOT NULL,
  `soGioLam` int(255) NOT NULL,
  `phuCap` int(255) NOT NULL,
  `thuong` int(255) NOT NULL,
  `phat` int(255) NOT NULL,
  `thang` int(2) NOT NULL,
  `luongThucNhan` int(255) NOT NULL,
  `ngayThanhToan` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `luong`
--

INSERT INTO `luong` (`id_luong`, `taikhoan`, `luongTheoGio`, `soGioLam`, `phuCap`, `thuong`, `phat`, `thang`, `luongThucNhan`, `ngayThanhToan`) VALUES
(1, 2, 25, 32, 500, 200, 100, 10, 1475, '2024-10-21 03:04:04'),
(3, 2, 111, 123, 1, 1111, 111, 10, 13181, '2024-10-21 03:04:10'),
(7, 2, 25, 18, 12, 12, 1, 10, 425, '2024-10-21 03:04:11'),
(9, 2, 26, 18, 300, 100, 200, 10, 601, '2024-10-23 17:42:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nghiphep`
--

CREATE TABLE `nghiphep` (
  `id_np` int(10) UNSIGNED NOT NULL,
  `nhanVien` int(10) NOT NULL,
  `lyDo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tuNgay` date NOT NULL,
  `denNgay` date NOT NULL,
  `ngayXinPhep` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trangThai` enum('DangXuLy','Duyet','TuChoi','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DangXuLy'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nghiphep`
--

INSERT INTO `nghiphep` (`id_np`, `nhanVien`, `lyDo`, `tuNgay`, `denNgay`, `ngayXinPhep`, `trangThai`) VALUES
(1, 2, 'Bị Bệnh', '2024-10-16', '2024-10-17', '2024-10-13 00:00:00', 'Duyet'),
(2, 1, 'Đi du lịch', '2024-10-15', '2024-10-17', '2024-10-19 13:00:00', 'TuChoi'),
(3, 1, 'Đám tang', '2024-10-28', '2024-10-30', '2024-10-23 11:38:26', 'TuChoi'),
(13, 2, 'Thử', '2024-10-24', '2024-10-25', '2024-10-23 15:53:50', 'Duyet'),
(14, 3, 'Xe Hư', '2024-10-16', '2024-10-16', '2024-10-24 00:27:06', 'DangXuLy'),
(15, 4, 'Người thân bệnh ', '2024-10-26', '2024-10-27', '2024-10-24 00:27:32', 'DangXuLy'),
(16, 5, 'Ốm', '2024-10-25', '2024-10-25', '2024-10-24 00:30:54', 'DangXuLy'),
(17, 6, 'Đám cưới bản thân', '2024-10-26', '2024-10-27', '2024-10-24 00:31:24', 'DangXuLy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id_tk` int(11) UNSIGNED NOT NULL,
  `hoTen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sdt` char(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diaChi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioiTinh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matKhau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('NhanVien','CuaHangTruong','','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NhanVien',
  `hinhDaiDien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngayTao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id_tk`, `hoTen`, `Sdt`, `diaChi`, `gioiTinh`, `email`, `matKhau`, `role`, `hinhDaiDien`, `ngayTao`) VALUES
(1, 'Lương Trung Nguyên', '1', '11', 'Nữ', 'm1inh@gmail.com', '6c14da109e294d1e8155be8aa4b1ce8e', 'CuaHangTruong', '', '2024-10-16 18:01:48'),
(2, 'Nguyễn Hoàng Minh', '0342579471', 'Vĩnh Long', 'Nam', 'minh@gmail.com', '202cb962ac59075b964b07152d234b70', 'CuaHangTruong', '', '2024-10-16 07:21:33'),
(3, 'Trần Hữu Minh', '222223', '2223', 'Nam', 'minh21@gmail.com', '202cb962ac59075b964b07152d234b70', 'NhanVien', '', '2024-10-21 02:06:42'),
(4, 'Huỳnh Quốc Tiến', '02312365741', 'Vĩnh Long', 'Nam', 't@gmail.com', 'e358efa489f58062f10dd7316b65649e', 'NhanVien', '', '2024-10-21 02:12:43'),
(5, 'Trần Văn A', '085467123', 'Phú Nhuận', 'Nam', 'A@gmail.com', '202cb962ac59075b964b07152d234b70', 'NhanVien', '', '2024-10-23 17:29:09'),
(6, 'Nguyễn Thị B', '076458813', 'Phú Yên', 'Nữ', 'B@gmail.com', '202cb962ac59075b964b07152d234b70', 'NhanVien', '', '2024-10-23 17:30:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `face_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `face_id`, `name`, `image_path`, `created_at`) VALUES
(41, '1', 'Nguyen', 'dataset/User.1.1.jpg', '2024-10-07 07:34:37'),
(42, '1', 'Nguyen', 'dataset/User.1.2.jpg', '2024-10-07 07:34:37'),
(43, '1', 'Nguyen', 'dataset/User.1.3.jpg', '2024-10-07 07:34:37'),
(44, '1', 'Nguyen', 'dataset/User.1.4.jpg', '2024-10-07 07:34:37'),
(45, '1', 'Nguyen', 'dataset/User.1.5.jpg', '2024-10-07 07:34:38'),
(46, '1', 'Nguyen', 'dataset/User.1.6.jpg', '2024-10-07 07:34:38'),
(47, '1', 'Nguyen', 'dataset/User.1.7.jpg', '2024-10-07 07:34:38'),
(48, '1', 'Nguyen', 'dataset/User.1.8.jpg', '2024-10-07 07:34:40'),
(49, '1', 'Nguyen', 'dataset/User.1.9.jpg', '2024-10-07 07:34:40'),
(50, '1', 'Nguyen', 'dataset/User.1.10.jpg', '2024-10-07 07:34:41'),
(51, '1', 'Nguyen', 'dataset/User.1.11.jpg', '2024-10-07 07:34:41'),
(52, '1', 'Nguyen', 'dataset/User.1.12.jpg', '2024-10-07 07:34:41'),
(53, '1', 'Nguyen', 'dataset/User.1.13.jpg', '2024-10-07 07:34:41'),
(54, '1', 'Nguyen', 'dataset/User.1.14.jpg', '2024-10-07 07:34:41'),
(55, '1', 'Nguyen', 'dataset/User.1.15.jpg', '2024-10-07 07:34:42'),
(56, '1', 'Nguyen', 'dataset/User.1.16.jpg', '2024-10-07 07:34:42'),
(57, '1', 'Nguyen', 'dataset/User.1.17.jpg', '2024-10-07 07:34:42'),
(58, '1', 'Nguyen', 'dataset/User.1.18.jpg', '2024-10-07 07:34:43'),
(59, '1', 'Nguyen', 'dataset/User.1.19.jpg', '2024-10-07 07:34:43'),
(60, '1', 'Nguyen', 'dataset/User.1.20.jpg', '2024-10-07 07:34:44'),
(61, '2', 'Minh', 'dataset/User.2.1.jpg', '2024-10-07 07:37:52'),
(62, '2', 'Minh', 'dataset/User.2.2.jpg', '2024-10-07 07:37:53'),
(63, '2', 'Minh', 'dataset/User.2.3.jpg', '2024-10-07 07:37:53'),
(64, '2', 'Minh', 'dataset/User.2.4.jpg', '2024-10-07 07:37:53'),
(65, '2', 'Minh', 'dataset/User.2.5.jpg', '2024-10-07 07:37:53'),
(66, '2', 'Minh', 'dataset/User.2.6.jpg', '2024-10-07 07:37:54'),
(67, '2', 'Minh', 'dataset/User.2.7.jpg', '2024-10-07 07:37:54'),
(68, '2', 'Minh', 'dataset/User.2.8.jpg', '2024-10-07 07:37:54'),
(69, '2', 'Minh', 'dataset/User.2.9.jpg', '2024-10-07 07:37:54'),
(70, '2', 'Minh', 'dataset/User.2.10.jpg', '2024-10-07 07:37:54'),
(71, '2', 'Minh', 'dataset/User.2.11.jpg', '2024-10-07 07:37:55'),
(72, '2', 'Minh', 'dataset/User.2.12.jpg', '2024-10-07 07:37:55'),
(73, '2', 'Minh', 'dataset/User.2.13.jpg', '2024-10-07 07:37:55'),
(74, '2', 'Minh', 'dataset/User.2.14.jpg', '2024-10-07 07:37:56'),
(75, '2', 'Minh', 'dataset/User.2.15.jpg', '2024-10-07 07:37:56'),
(76, '2', 'Minh', 'dataset/User.2.16.jpg', '2024-10-07 07:37:56'),
(77, '2', 'Minh', 'dataset/User.2.17.jpg', '2024-10-07 07:37:56'),
(78, '2', 'Minh', 'dataset/User.2.18.jpg', '2024-10-07 07:37:56'),
(79, '2', 'Minh', 'dataset/User.2.19.jpg', '2024-10-07 07:37:57'),
(80, '2', 'Minh', 'dataset/User.2.20.jpg', '2024-10-07 07:37:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `working_regulations`
--

CREATE TABLE `working_regulations` (
  `id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `shift_rules` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `overtime_policy` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `leave_policy` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `sick_leave_policy` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `holiday_policy` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `working_regulations`
--

INSERT INTO `working_regulations` (`id`, `start_time`, `end_time`, `shift_rules`, `overtime_policy`, `leave_policy`, `sick_leave_policy`, `holiday_policy`) VALUES
(5, '08:00:00', '23:00:00', 'lam', 'haha', 'hihi', 'hehe', 'huhu');

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
-- Chỉ mục cho bảng `attendance_history`
--
ALTER TABLE `attendance_history`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `luong`
--
ALTER TABLE `luong`
  ADD PRIMARY KEY (`id_luong`),
  ADD KEY `taikhoan` (`taikhoan`);

--
-- Chỉ mục cho bảng `nghiphep`
--
ALTER TABLE `nghiphep`
  ADD PRIMARY KEY (`id_np`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id_tk`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `working_regulations`
--
ALTER TABLE `working_regulations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `attendance_history`
--
ALTER TABLE `attendance_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `luong`
--
ALTER TABLE `luong`
  MODIFY `id_luong` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `nghiphep`
--
ALTER TABLE `nghiphep`
  MODIFY `id_np` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_tk` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `working_regulations`
--
ALTER TABLE `working_regulations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
