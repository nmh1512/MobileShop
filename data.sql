-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 22, 2022 lúc 08:27 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `datn_mobile`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) UNSIGNED NOT NULL,
  `name_admin` varchar(255) NOT NULL,
  `gioi_tinh` int(11) DEFAULT 0,
  `ngay_sinh` date NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `sdt_admin` int(11) NOT NULL,
  `email_admin` varchar(255) NOT NULL,
  `user_admin` varchar(255) NOT NULL,
  `pass_admin` varchar(255) NOT NULL,
  `level` int(30) NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `name_admin`, `gioi_tinh`, `ngay_sinh`, `dia_chi`, `sdt_admin`, `email_admin`, `user_admin`, `pass_admin`, `level`, `ngay_tao`) VALUES
(1, 'Hùng', 0, '1999-12-15', 'Hà Nội', 356897701, 'k175520214021@tnut.edu.vn', 'hungadmin', 'e10adc3949ba59abbe56e057f20f883e', 0, '2021-12-30 06:29:05'),
(6, 'Nguyễn A', 1, '2000-04-15', 'Hà Nội', 969336112, 'abc@gmail.com', 'abc1504', 'f5bb0c8de146c67b44babbf4e6584cc0', 4, '2022-01-19 10:00:09'),
(7, 'Lê C', 0, '1997-08-07', 'Hà Nội', 358794444, 'qwe@yahoo.com', 'zzz123', 'f5bb0c8de146c67b44babbf4e6584cc0', 1, '2022-01-19 14:10:04'),
(8, 'Nguyễn V', 1, '2001-09-12', 'Hà Nội', 364231062, 'xyz@gmail.com', 'vvv123', 'f5bb0c8de146c67b44babbf4e6584cc0', 2, '2022-01-19 14:20:01'),
(9, 'Đặng M', 0, '2001-12-09', 'Phú Thọ', 365608785, 'mmm@gmail.com', 'mmm123', 'f5bb0c8de146c67b44babbf4e6584cc0', 3, '2022-01-19 14:21:12'),
(10, 'Trần D', 0, '1998-05-18', 'California', 386567772, 'tiger@gmail.com', 'tiger1', 'f5bb0c8de146c67b44babbf4e6584cc0', 2, '2022-01-19 14:23:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_anhsanpham`
--

CREATE TABLE `tb_anhsanpham` (
  `id_sanphamanh` int(11) NOT NULL,
  `id_sanpham` int(11) UNSIGNED NOT NULL,
  `anh_sanpham` varchar(255) NOT NULL,
  `ngay_them` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_anhsanpham`
--

INSERT INTO `tb_anhsanpham` (`id_sanphamanh`, `id_sanpham`, `anh_sanpham`, `ngay_them`) VALUES
(59, 131, '7a906de69d.jpg', '2021-12-30 06:29:28'),
(60, 131, '7a906de69d4.jpg', '2021-12-30 06:29:28'),
(61, 131, '7a906de69d40.jpg', '2021-12-30 06:29:28'),
(62, 132, 'f0aeae962f.jpg', '2021-12-30 06:29:28'),
(63, 132, 'f0aeae962fc.jpg', '2021-12-30 06:29:28'),
(64, 132, 'f0aeae962fc3.jpg', '2021-12-30 06:29:28'),
(67, 134, '5f8eb8b149.jpg', '2021-12-31 18:52:16'),
(68, 134, '5f8eb8b1499.jpg', '2021-12-31 18:52:16'),
(69, 135, '2068fe9a2a.jpg', '2022-01-01 15:04:01'),
(70, 135, '2068fe9a2ad.jpg', '2022-01-01 15:04:01'),
(74, 138, '626765703b.jpg', '2022-01-03 10:09:24'),
(75, 138, '626765703bc.jpg', '2022-01-03 10:09:24'),
(85, 160, 'e93edaab975.jpg', '2022-01-11 13:36:03'),
(86, 160, 'e93edaab9750.jpg', '2022-01-11 13:36:03'),
(87, 161, '54251553aa0.jpg', '2022-01-11 13:46:48'),
(88, 161, '54251553aa0f.jpg', '2022-01-11 13:46:48'),
(89, 161, '54251553aa0fe.jpg', '2022-01-11 13:46:48'),
(90, 162, '41175056627.jpg', '2022-01-11 13:52:13'),
(91, 162, '411750566270.jpg', '2022-01-11 13:52:13'),
(92, 162, '411750566270f.jpg', '2022-01-11 13:52:13'),
(93, 163, 'f3299f789ee.jpg', '2022-01-11 14:00:59'),
(94, 163, 'f3299f789eee.jpg', '2022-01-11 14:00:59'),
(95, 163, 'f3299f789eee1.jpg', '2022-01-11 14:00:59'),
(96, 163, 'f3299f789eee16.jpg', '2022-01-11 14:00:59'),
(97, 164, 'deef0034d53.jpg', '2022-01-11 14:05:38'),
(98, 164, 'deef0034d538.jpg', '2022-01-11 14:05:38'),
(99, 165, '58480d97cd2.jpg', '2022-01-11 14:15:45'),
(100, 165, 'ceaddbaa8518.jpg', '2022-01-11 14:15:46'),
(101, 166, '41322571387.jpg', '2022-01-11 14:20:27'),
(102, 166, '413225713871.jpg', '2022-01-11 14:20:27'),
(103, 167, '744a9cd8cf6.jpg', '2022-01-11 14:28:36'),
(104, 167, '744a9cd8cf68.jpg', '2022-01-11 14:28:36'),
(105, 168, '495a184d7eb.jpg', '2022-01-11 14:33:44'),
(106, 168, 'b9f22473ceae.jpg', '2022-01-11 14:33:44'),
(107, 168, 'b9f22473ceae9.jpg', '2022-01-11 14:33:44'),
(108, 168, 'b9f22473ceae90.jpg', '2022-01-11 14:33:44'),
(109, 169, 'e2500514157.jpg', '2022-01-11 14:45:02'),
(110, 169, '933ab82612c9.jpg', '2022-01-11 14:45:03'),
(111, 169, '933ab82612c99.jpg', '2022-01-11 14:45:03'),
(112, 169, '933ab82612c992.jpg', '2022-01-11 14:45:03'),
(113, 170, '7fb9b562192.jpg', '2022-01-11 15:02:02'),
(114, 170, '7fb9b562192d.jpg', '2022-01-11 15:02:02'),
(115, 171, '281ad37a1af.jpg', '2022-01-11 15:08:32'),
(116, 171, '281ad37a1af3.jpg', '2022-01-11 15:08:32'),
(119, 173, 'bd97db7095a.jpg', '2022-01-11 15:33:22'),
(120, 173, 'bd97db7095a4.jpg', '2022-01-11 15:33:22'),
(121, 174, '809c2c6d9f7.jpg', '2022-01-12 03:53:49'),
(122, 174, '809c2c6d9f75.jpg', '2022-01-12 03:53:49'),
(123, 174, '809c2c6d9f75f.jpg', '2022-01-12 03:53:49'),
(124, 175, '756040776ef.jpg', '2022-01-12 04:10:31'),
(125, 175, '756040776ef3.jpg', '2022-01-12 04:10:31'),
(126, 175, '1526d9825dc98.jpg', '2022-01-12 04:10:32'),
(127, 175, '1526d9825dc989.jpg', '2022-01-12 04:10:32'),
(128, 176, '9f0def2d14b.jpg', '2022-01-12 04:16:29'),
(129, 177, '70b579ff497.jpg', '2022-01-12 04:20:11'),
(130, 177, '70b579ff4974.jpg', '2022-01-12 04:20:11'),
(131, 178, 'b36cc166a07.jpg', '2022-01-12 04:26:17'),
(132, 178, 'b36cc166a07c.jpg', '2022-01-12 04:26:17'),
(133, 179, '6e34fae8390.jpg', '2022-01-12 06:14:21'),
(134, 179, '6e34fae8390f.jpg', '2022-01-12 06:14:21'),
(135, 180, '78787bd9638.jpg', '2022-01-12 06:48:13'),
(136, 180, '78787bd9638e.jpg', '2022-01-12 06:48:14'),
(137, 180, '3d6c6f73203f4.jpg', '2022-01-12 06:48:14'),
(138, 180, '3d6c6f73203f46.jpg', '2022-01-12 06:48:14'),
(139, 180, '4b9b74def33278d.jpg', '2022-01-12 06:48:15'),
(140, 181, 'dd99c26388f.jpg', '2022-01-12 06:54:26'),
(141, 182, 'e2e9aeed49e.jpg', '2022-01-12 06:59:35'),
(142, 182, 'e2e9aeed49e8.jpg', '2022-01-12 06:59:35'),
(143, 183, '002d837a012.jpg', '2022-01-12 07:03:13'),
(144, 183, 'e75699d9780c.jpg', '2022-01-12 07:03:14'),
(145, 184, 'f27f9c7b0c2.jpg', '2022-01-12 07:06:35'),
(146, 184, 'f27f9c7b0c2f.jpg', '2022-01-12 07:06:35'),
(147, 185, 'ccc2121ae7a.jpg', '2022-01-12 07:09:39'),
(148, 187, '87a5e455a95.jpg', '2022-01-12 07:14:34'),
(149, 187, '87a5e455a956.jpg', '2022-01-12 07:14:34'),
(150, 187, '87a5e455a9565.jpg', '2022-01-12 07:14:34'),
(151, 188, 'a674ff833c0.jpg', '2022-01-12 08:03:31'),
(152, 188, 'a674ff833c0a.jpg', '2022-01-12 08:03:31'),
(153, 189, '3e9b7684fd8.jpg', '2022-01-12 08:08:11'),
(154, 189, '3e9b7684fd88.jpg', '2022-01-12 08:08:11'),
(155, 189, '3e9b7684fd886.jpg', '2022-01-12 08:08:11'),
(156, 189, '3e9b7684fd8866.jpg', '2022-01-12 08:08:11'),
(157, 190, '455b5cb942f.jpg', '2022-01-12 08:11:07'),
(158, 191, 'd2c86273f2e.jpg', '2022-01-12 08:17:38'),
(159, 191, 'd2c86273f2eb.jpg', '2022-01-12 08:17:38'),
(160, 191, 'd2c86273f2ebe.jpg', '2022-01-12 08:17:38'),
(161, 191, 'd2c86273f2ebe8.jpg', '2022-01-12 08:17:38'),
(162, 192, 'e1cbadb133a.jpg', '2022-01-12 08:24:37'),
(163, 192, 'e1cbadb133a9.jpg', '2022-01-12 08:24:37'),
(164, 193, 'efdcf67729f.jpg', '2022-01-12 08:28:29'),
(165, 193, 'efdcf67729f6.jpg', '2022-01-12 08:28:29'),
(166, 194, '0a7985ac693.jpg', '2022-01-12 08:33:26'),
(167, 194, '0a7985ac6937.jpg', '2022-01-12 08:33:26'),
(168, 194, '0a7985ac69378.jpg', '2022-01-12 08:33:26'),
(169, 195, '6c909247160.jpg', '2022-01-12 08:38:32'),
(170, 195, '6c9092471607.jpg', '2022-01-12 08:38:32'),
(171, 196, '398f91e3d3c.jpg', '2022-01-12 08:42:31'),
(172, 196, '398f91e3d3cc.jpg', '2022-01-12 08:42:31'),
(173, 197, 'b1ba3f728b0.jpg', '2022-01-12 08:47:32'),
(174, 197, 'b1ba3f728b06.jpg', '2022-01-12 08:47:32'),
(175, 197, 'b1ba3f728b066.jpg', '2022-01-12 08:47:32'),
(176, 197, 'b1ba3f728b0660.jpg', '2022-01-12 08:47:32'),
(177, 198, 'd42d349aa53.jpg', '2022-01-12 08:52:29'),
(178, 198, 'd42d349aa533.jpg', '2022-01-12 08:52:29'),
(179, 198, 'd42d349aa533e.jpg', '2022-01-12 08:52:29'),
(180, 199, 'ceb2fa43f68.jpg', '2022-01-12 09:15:00'),
(181, 199, 'ceb2fa43f683.jpg', '2022-01-12 09:15:00'),
(182, 200, '8be46bac61b.jpg', '2022-01-12 09:18:40'),
(183, 200, 'b12cf7fbe4dd.jpg', '2022-01-12 09:18:41'),
(184, 201, '66584829619.jpg', '2022-01-12 09:24:21'),
(185, 201, '66584829619a.jpg', '2022-01-12 09:24:21'),
(186, 201, '91d1f8417e95e.jpg', '2022-01-12 09:24:22'),
(187, 202, '0bd9e90af57.jpeg', '2022-01-12 09:43:46'),
(188, 202, '0bd9e90af57c.jpg', '2022-01-12 09:43:46'),
(189, 203, '23e310ad0b5.jpg', '2022-01-12 10:05:01'),
(190, 203, '23e310ad0b57.jpg', '2022-01-12 10:05:01'),
(193, 205, 'cf3c2f9da98.jpg', '2022-01-12 10:25:42'),
(194, 205, 'cf3c2f9da98c.jpg', '2022-01-12 10:25:42'),
(195, 206, '150a6dda23e.jpg', '2022-01-12 10:28:04'),
(196, 206, '150a6dda23ea.jpg', '2022-01-12 10:28:04'),
(197, 206, '150a6dda23eab.jpg', '2022-01-12 10:28:04'),
(198, 207, '462d2a5c26c.jpg', '2022-01-12 10:32:11'),
(199, 207, '462d2a5c26c9.jpg', '2022-01-12 10:32:11'),
(200, 208, 'bed5aca57db.jpg', '2022-01-12 10:39:34'),
(201, 208, 'bed5aca57dbb.jpg', '2022-01-12 10:39:34'),
(202, 209, 'ca2e19aaa89.jpg', '2022-01-12 10:44:29'),
(203, 209, 'ca2e19aaa89f.jpg', '2022-01-12 10:44:29'),
(204, 210, 'fb81a7c87eb.jpg', '2022-01-12 10:56:31'),
(205, 210, 'fb81a7c87ebc.jpg', '2022-01-12 10:56:31'),
(206, 210, 'fb81a7c87ebca.jpg', '2022-01-12 10:56:31'),
(207, 211, 'c282e5b84fd.jpg', '2022-01-12 11:10:31'),
(208, 211, 'c282e5b84fdc.jpg', '2022-01-12 11:10:31'),
(209, 212, '3ab7a5f692d.jpg', '2022-01-12 13:08:37'),
(210, 212, 'a9ae0af5f4a2.jpg', '2022-01-12 13:08:38'),
(211, 213, 'a68068e683a.jpg', '2022-01-12 13:14:56'),
(212, 213, 'a68068e683a6.jpg', '2022-01-12 13:14:56'),
(213, 213, '72baa878533bf.jpg', '2022-01-12 13:14:57'),
(214, 213, '72baa878533bfc.jpg', '2022-01-12 13:14:57'),
(215, 214, 'c3cf9420e02.jpg', '2022-01-12 13:19:00'),
(216, 214, 'c3cf9420e029.jpg', '2022-01-12 13:19:00'),
(217, 214, 'c3cf9420e029b.jpg', '2022-01-12 13:19:00'),
(218, 215, '61942a8d0ed.jpg', '2022-01-12 13:23:39'),
(219, 215, '61942a8d0ed1.jpg', '2022-01-12 13:23:39'),
(220, 215, '61942a8d0ed1d.jpg', '2022-01-12 13:23:39'),
(221, 216, '946aa7a64a4.jpg', '2022-01-12 13:27:58'),
(222, 216, '946aa7a64a48.jpg', '2022-01-12 13:27:58'),
(223, 217, '9b0973e02c8.jpg', '2022-01-12 13:37:00'),
(224, 217, '6780648e0727.jpg', '2022-01-12 13:37:01'),
(225, 217, '7eed93a7e25a1.jpg', '2022-01-12 13:37:04'),
(226, 217, '39ba18972f3702.jpg', '2022-01-12 13:37:05'),
(227, 217, '39ba18972f37027.jpg', '2022-01-12 13:37:05'),
(228, 218, '9b3bd7b8cee.jpg', '2022-01-12 13:46:52'),
(229, 218, '9b3bd7b8cee5.jpg', '2022-01-12 13:46:52'),
(230, 218, '9b3bd7b8cee5d.jpg', '2022-01-12 13:46:52'),
(231, 218, '9b3bd7b8cee5da.jpg', '2022-01-12 13:46:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_color`
--

CREATE TABLE `tb_color` (
  `id_color` int(11) UNSIGNED NOT NULL,
  `ten_color` varchar(255) NOT NULL,
  `ngay_them` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_color`
--

INSERT INTO `tb_color` (`id_color`, `ten_color`, `ngay_them`) VALUES
(1, 'Đỏ', '2021-12-30 06:29:50'),
(6, 'Đen', '2021-12-30 06:29:50'),
(12, 'Trắng', '2021-12-30 06:29:50'),
(14, 'Xanh', '2021-12-30 06:29:50'),
(18, 'Vàng', '2021-12-30 06:29:50'),
(19, 'Xám', '2021-12-30 06:29:50'),
(20, 'Tím', '2021-12-30 06:29:50'),
(33, 'Hồng', '2021-12-30 06:29:50'),
(34, 'Nâu', '2021-12-30 06:29:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_color_sanpham`
--

CREATE TABLE `tb_color_sanpham` (
  `id_color_sanpham` int(11) NOT NULL,
  `id_sanpham` int(11) UNSIGNED NOT NULL,
  `id_color` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_color_sanpham`
--

INSERT INTO `tb_color_sanpham` (`id_color_sanpham`, `id_sanpham`, `id_color`) VALUES
(51, 131, 6),
(52, 131, 33),
(56, 132, 1),
(53, 132, 6),
(55, 132, 12),
(54, 132, 14),
(60, 134, 6),
(59, 134, 14),
(61, 135, 6),
(62, 135, 12),
(66, 138, 1),
(67, 138, 6),
(81, 160, 14),
(80, 160, 18),
(79, 160, 19),
(82, 161, 12),
(84, 161, 14),
(83, 161, 19),
(88, 162, 6),
(87, 162, 12),
(85, 162, 14),
(86, 162, 20),
(89, 163, 1),
(91, 163, 6),
(92, 163, 12),
(90, 163, 20),
(94, 164, 6),
(93, 164, 14),
(95, 165, 6),
(96, 165, 12),
(98, 166, 6),
(97, 166, 14),
(100, 167, 6),
(99, 167, 12),
(103, 168, 6),
(102, 168, 12),
(104, 168, 14),
(101, 168, 33),
(108, 169, 12),
(106, 169, 14),
(107, 169, 18),
(105, 169, 19),
(109, 170, 6),
(110, 171, 6),
(111, 171, 14),
(115, 173, 1),
(114, 173, 6),
(117, 174, 6),
(116, 174, 12),
(118, 174, 20),
(120, 175, 6),
(119, 175, 12),
(122, 175, 14),
(121, 175, 20),
(123, 176, 1),
(125, 177, 6),
(124, 177, 12),
(127, 178, 6),
(126, 178, 14),
(129, 179, 6),
(128, 179, 12),
(131, 180, 1),
(132, 180, 6),
(133, 180, 12),
(130, 180, 14),
(134, 180, 33),
(135, 181, 6),
(136, 182, 12),
(138, 183, 14),
(137, 183, 18),
(140, 184, 14),
(139, 184, 19),
(141, 185, 6),
(144, 187, 12),
(142, 187, 14),
(143, 187, 19),
(146, 188, 6),
(145, 188, 12),
(149, 189, 6),
(150, 189, 12),
(148, 189, 14),
(147, 189, 20),
(151, 190, 6),
(154, 191, 12),
(155, 191, 14),
(152, 191, 18),
(153, 191, 19),
(157, 192, 6),
(156, 192, 12),
(159, 193, 6),
(158, 193, 12),
(160, 194, 14),
(161, 194, 18),
(162, 194, 19),
(164, 195, 6),
(163, 195, 14),
(166, 196, 6),
(165, 196, 12),
(169, 197, 1),
(168, 197, 6),
(170, 197, 12),
(167, 197, 20),
(173, 198, 14),
(171, 198, 18),
(172, 198, 19),
(175, 199, 6),
(174, 199, 14),
(176, 200, 12),
(177, 200, 14),
(180, 201, 6),
(179, 201, 12),
(178, 201, 14),
(181, 202, 12),
(182, 202, 19),
(183, 203, 19),
(185, 205, 19),
(186, 206, 14),
(187, 207, 14),
(188, 208, 12),
(189, 208, 19),
(191, 209, 12),
(190, 209, 19),
(194, 210, 6),
(192, 210, 14),
(193, 210, 18),
(195, 211, 14),
(196, 211, 19),
(197, 212, 12),
(198, 212, 19),
(199, 213, 12),
(200, 213, 14),
(201, 213, 19),
(202, 213, 33),
(204, 214, 12),
(203, 214, 20),
(205, 214, 33),
(206, 215, 12),
(207, 215, 18),
(208, 215, 19),
(209, 216, 12),
(210, 216, 19),
(213, 217, 1),
(211, 217, 6),
(212, 217, 12),
(214, 217, 14),
(215, 217, 20),
(217, 218, 12),
(216, 218, 14),
(218, 218, 18),
(219, 218, 19);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_danhmuc`
--

CREATE TABLE `tb_danhmuc` (
  `id_danhmuc` int(11) UNSIGNED NOT NULL,
  `ten_danhmuc` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `url_cat` varchar(255) NOT NULL,
  `ngay_them` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_danhmuc`
--

INSERT INTO `tb_danhmuc` (`id_danhmuc`, `ten_danhmuc`, `icon`, `url_cat`, `ngay_them`) VALUES
(73, 'Điện thoại', '<i class=\"fa-solid fa-mobile-button\"></i>', 'dien-thoai', '2021-12-30 06:30:14'),
(74, 'Máy tính bảng', '<i class=\"fa-solid fa-tablet-button\"></i>', 'may-tinh-bang', '2021-12-30 06:30:14'),
(75, 'Phụ kiện', '<i class=\"fa-solid fa-headphones-simple\"></i>', 'phu-kien', '2021-12-30 06:30:14'),
(76, 'Máy cũ giá rẻ', '<i class=\"fa-solid fa-mobile-button\"></i>', 'may-cu-gia-re', '2021-12-30 06:30:14'),
(92, 'Tin tức', '<i class=\"fa-solid fa-newspaper\"></i>', 'tin-tuc', '2022-01-14 14:00:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_donhang`
--

CREATE TABLE `tb_donhang` (
  `id` int(11) NOT NULL,
  `id_donhang` int(11) UNSIGNED NOT NULL,
  `id_sanpham` int(11) UNSIGNED NOT NULL,
  `ten_sanpham` varchar(255) NOT NULL,
  `mau_sanpham` varchar(255) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `hinhanh_sanpham` varchar(255) NOT NULL,
  `giaban` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_donhang`
--

INSERT INTO `tb_donhang` (`id`, `id_donhang`, `id_sanpham`, `ten_sanpham`, `mau_sanpham`, `so_luong`, `hinhanh_sanpham`, `giaban`) VALUES
(143, 101, 171, 'OPPO Find X3 Pro 5G', 'Đen', 2, '71c5c3f7d0.jpg', '38980000'),
(144, 102, 169, 'iPhone 12 Pro Max 128GB ', 'Vàng', 2, 'e250051415.jpg', '65980000'),
(145, 103, 169, 'iPhone 12 Pro Max 128GB ', 'Xám', 1, 'e250051415.jpg', '32990000'),
(146, 103, 205, 'Huawei MatePad 11', 'Xám', 1, 'cf3c2f9da9.jpg', '12990000'),
(147, 104, 210, 'Samsung Galaxy Tab S7', 'Đen', 1, 'b735362ba3.jpg', '18990000'),
(148, 104, 214, 'iPad mini 6 WiFi Cellular 64GB', 'Hồng', 1, '0a7ad689e1.jpg', '20990000'),
(149, 105, 181, 'OPPO Reno5 Marvel', 'Đen', 2, 'dd99c26388.jpg', '19380000'),
(150, 105, 196, 'OPPO A95', 'Trắng', 1, '398f91e3d3.jpg', '6990000'),
(151, 106, 135, 'Samsung Galaxy Z Fold3 5G 512GB', 'Trắng', 1, '92ab4814af.jpg', '44990000'),
(152, 106, 202, 'iPad Pro M1 12.9 inch WiFi Cellular', 'Xám', 1, '0bd9e90af5.jpg', '35690000'),
(153, 107, 160, 'iPhone 13 Pro Max 128GB', 'Vàng', 2, 'e93edaab97.jpg', '67980000'),
(154, 108, 175, 'Samsung Galaxy Z Flip3 5G 128GB', 'Đen', 1, '756040776e.jpg', '24990000'),
(155, 109, 163, 'iPhone 11 64GB', 'Tím', 1, 'f3299f789e.jpg', '14990000'),
(156, 110, 166, 'Samsung Galaxy Tab S7 FE WiFi', 'Đen', 1, '4132257138.jpg', '12990000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_giohang`
--

CREATE TABLE `tb_giohang` (
  `id_cart` int(11) UNSIGNED NOT NULL,
  `id_sanpham` int(11) UNSIGNED NOT NULL,
  `s_id` varchar(255) NOT NULL,
  `ten_sanpham` varchar(255) NOT NULL,
  `mau_sanpham` varchar(255) NOT NULL,
  `giaban` varchar(255) NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh_sanpham` varchar(255) NOT NULL,
  `customer_id` int(11) UNSIGNED DEFAULT NULL,
  `guest` varchar(255) NOT NULL,
  `ngay_them` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_giohang`
--

INSERT INTO `tb_giohang` (`id_cart`, `id_sanpham`, `s_id`, `ten_sanpham`, `mau_sanpham`, `giaban`, `soluong`, `hinhanh_sanpham`, `customer_id`, `guest`, `ngay_them`) VALUES
(299, 196, 'esiu2hq695ecne69b9g28lfhcr', 'OPPO A95', 'Trắng', '6990000', 1, '398f91e3d3.jpg', 0, 'esiu2hq695ecne69b9g28lfhcr', '2022-01-20 09:09:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_group_phanquyen`
--

CREATE TABLE `tb_group_phanquyen` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_group_phanquyen`
--

INSERT INTO `tb_group_phanquyen` (`id`, `name`, `position`, `created_time`, `update_time`) VALUES
(1, 'Danh mục', 1, '2022-01-19 01:23:12', '2022-01-19 01:23:12'),
(2, 'Sản phẩm', 3, '2022-01-19 01:23:12', '2022-01-19 01:23:32'),
(3, 'Loại sản phẩm', 2, '2022-01-19 01:24:45', '2022-01-19 01:24:45'),
(4, 'Khách hàng', 4, '2022-01-19 01:24:45', '2022-01-19 01:24:45'),
(5, 'Đơn hàng', 5, '2022-01-19 01:25:12', '2022-01-19 01:25:12'),
(6, 'Tin tức', 6, '2022-01-19 01:25:12', '2022-01-19 01:25:12'),
(7, 'Nhân viên', 7, '2022-01-19 01:25:25', '2022-01-19 01:25:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_loaisanpham`
--

CREATE TABLE `tb_loaisanpham` (
  `id_loaisanpham` int(11) UNSIGNED NOT NULL,
  `id_danhmuc` int(11) UNSIGNED NOT NULL,
  `ten_loaisanpham` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `url_brand` varchar(255) NOT NULL,
  `ngay_them` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_loaisanpham`
--

INSERT INTO `tb_loaisanpham` (`id_loaisanpham`, `id_danhmuc`, `ten_loaisanpham`, `logo`, `url_brand`, `ngay_them`) VALUES
(23, 73, 'Apple', 'dc628575ad.png', 'apple-iphone', '2021-12-30 06:28:26'),
(24, 73, 'Samsung', '0c8ad9ae9c.png', 'samsung', '2021-12-30 06:28:26'),
(27, 73, 'Xiaomi', '9055f60048.png', 'xiaomi', '2021-12-30 06:28:26'),
(28, 73, 'OPPO', '33d60b4e33.jpg', 'oppo', '2021-12-30 06:28:26'),
(35, 73, 'Vivo', 'c34ded5c66.jpg', 'vivo', '2021-12-30 06:28:26'),
(36, 73, 'Nokia', '6f1552065f.jpg', 'nokia', '2021-12-30 06:28:26'),
(37, 73, 'realme', '0bca0b3d58.png', 'realme', '2021-12-30 06:28:26'),
(38, 74, 'Ipad', '1d91b1a223.jpg', 'apple-ipad', '2021-12-30 06:28:26'),
(39, 74, 'Samsung', '1dd80ee8e6.png', 'samsung', '2021-12-30 06:28:26'),
(41, 74, 'Huawei', '14aacccbac.jpg', 'huawei', '2021-12-30 06:28:26'),
(42, 74, 'Xiaomi', 'd69b167855.png', 'xiaomi', '2021-12-30 06:28:26'),
(45, 75, 'Tai nghe', '', 'tai-nghe', '2021-12-30 06:28:26'),
(46, 75, 'Cáp, sạc ', '', 'cap-sac', '2021-12-30 06:28:26'),
(47, 75, 'Ốp lưng', '', 'op-lung', '2021-12-30 06:28:26'),
(49, 75, 'Sạc dự phòng', '', 'sac-du-phong', '2021-12-30 06:28:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_phanquyen`
--

CREATE TABLE `tb_phanquyen` (
  `id_phanquyen` int(11) UNSIGNED NOT NULL,
  `id_group` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url_match` varchar(255) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_phanquyen`
--

INSERT INTO `tb_phanquyen` (`id_phanquyen`, `id_group`, `name`, `url_match`, `created_time`, `update_time`) VALUES
(1, 1, 'Quản lý danh mục', 'categories?$', '2022-01-19 01:36:38', '2022-01-19 01:36:38'),
(2, 3, 'Quản lý loại sản phẩm', 'brands?$', '2022-01-19 01:36:38', '2022-01-19 01:36:38'),
(3, 2, 'Xem danh sách sản phẩm', 'products?$', '2022-01-19 02:31:46', '2022-01-19 02:50:53'),
(4, 2, 'Thêm sản phẩm', 'product-add?$', '2022-01-19 02:32:24', '2022-01-19 09:38:41'),
(5, 2, 'Sửa sản phẩm', 'edit-product\\?id_sanpham=\\d+$', '2022-01-19 02:33:25', '2022-01-19 02:33:25'),
(6, 2, 'Xóa sản phẩm', 'products\\?id_sanpham=\\d+$', '2022-01-19 02:33:53', '2022-01-19 02:40:08'),
(7, 4, 'Quản lý khách hàng', 'customers?$', '2022-01-19 02:34:28', '2022-01-19 02:40:12'),
(8, 5, 'Quản lý đơn hàng', 'orders?$', '2022-01-19 02:35:09', '2022-01-19 02:40:16'),
(9, 6, 'Quản lý bài viết', 'news?$', '2022-01-19 02:35:42', '2022-01-19 02:40:22'),
(10, 7, 'Quản lý nhân viên', 'members?$', '2022-01-19 02:36:04', '2022-01-19 02:40:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_phanquyen_nhanvien`
--

CREATE TABLE `tb_phanquyen_nhanvien` (
  `id` int(11) NOT NULL,
  `id_member` int(11) UNSIGNED NOT NULL,
  `id_phanquyen` int(11) UNSIGNED NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `upadte_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_phanquyen_nhanvien`
--

INSERT INTO `tb_phanquyen_nhanvien` (`id`, `id_member`, `id_phanquyen`, `created_time`, `upadte_time`) VALUES
(1, 1, 1, '2022-01-19 01:50:30', '2022-01-19 01:50:30'),
(2, 1, 3, '2022-01-19 02:37:27', '2022-01-19 02:37:27'),
(3, 1, 4, '2022-01-19 02:37:27', '2022-01-19 02:37:27'),
(4, 1, 5, '2022-01-19 02:37:46', '2022-01-19 02:37:46'),
(5, 1, 6, '2022-01-19 02:37:46', '2022-01-19 02:37:46'),
(6, 1, 7, '2022-01-19 02:38:04', '2022-01-19 02:38:04'),
(7, 1, 8, '2022-01-19 02:38:04', '2022-01-19 02:38:04'),
(8, 1, 9, '2022-01-19 02:38:21', '2022-01-19 02:38:21'),
(9, 1, 10, '2022-01-19 02:38:21', '2022-01-19 02:38:21'),
(76, 1, 2, '2022-01-19 07:37:50', '2022-01-19 07:37:50'),
(80, 6, 9, '2022-01-19 10:00:17', '2022-01-19 10:00:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_sanpham`
--

CREATE TABLE `tb_sanpham` (
  `id_sanpham` int(11) UNSIGNED NOT NULL,
  `ma_sanpham` varchar(255) NOT NULL,
  `ten_sanpham` varchar(255) NOT NULL,
  `id_danhmuc` int(11) UNSIGNED NOT NULL,
  `id_loaisanpham` int(11) UNSIGNED NOT NULL,
  `soluong_nhap` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `mota_sanpham` text NOT NULL,
  `type_sanpham` int(11) NOT NULL,
  `giaban` int(255) NOT NULL,
  `giagoc` int(255) NOT NULL,
  `ncc` varchar(255) NOT NULL,
  `hinhanh_sanpham` varchar(255) NOT NULL,
  `manhinh` varchar(255) NOT NULL,
  `hedieuhanh` varchar(255) NOT NULL,
  `cam_sau` varchar(255) NOT NULL,
  `cam_truoc` varchar(255) NOT NULL,
  `chip` varchar(255) NOT NULL,
  `ram` varchar(10) NOT NULL,
  `rom` varchar(10) NOT NULL,
  `sim` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `sac` varchar(255) NOT NULL,
  `url_product` varchar(255) NOT NULL,
  `ngay_them` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_sanpham`
--

INSERT INTO `tb_sanpham` (`id_sanpham`, `ma_sanpham`, `ten_sanpham`, `id_danhmuc`, `id_loaisanpham`, `soluong_nhap`, `soluong`, `mota_sanpham`, `type_sanpham`, `giaban`, `giagoc`, `ncc`, `hinhanh_sanpham`, `manhinh`, `hedieuhanh`, `cam_sau`, `cam_truoc`, `chip`, `ram`, `rom`, `sim`, `pin`, `sac`, `url_product`, `ngay_them`) VALUES
(131, 'SP0001', 'Vivo V23e', 73, 35, 100, 97, '<p>Vivo V23e&nbsp;- sản phẩm tầm trung được đầu tư lớn về khả năng selfie c&ugrave;ng ngoại h&igrave;nh mỏng nhẹ, b&ecirc;n cạnh thiết kế vu&ocirc;ng vức theo xu hướng hiện tại th&igrave; V23e c&ograve;n c&oacute; hiệu năng tốt v&agrave; một vi&ecirc;n pin c&oacute; khả năng sạc cực nhanh.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/vivo-v23e-5.jpg\" style=\"height:414px; width:740px\" /></p>\r\n\r\n<p>Vivo V23e c&oacute; thiết kế mỏng nhẹ, hiệu năng mạnh mẽ c&ugrave;ng với cụm camera nhiều t&iacute;nh năng, nếu bạn đang c&oacute; nhu cầu n&acirc;ng cấp sản phẩm th&igrave; đ&acirc;y l&agrave; một chiếc điện thoại kh&ocirc;ng n&ecirc;n bỏ qua.</p>\r\n', 1, 8490000, 7300000, '', 'a7d9733f85.jpg', 'AMOLED, 6.44', 'Android 11', 'Chính 64 MP & Phụ 8 MP, 2 MP', '50 MP', 'MediaTek Helio G96 8 nhân', ' 8 GB', '128 GB', '2 Nano SIM (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '4050 mAh', '44 W', 'vivo-v23e', '2022-01-05 16:07:31'),
(132, 'SP0002', 'iPhone 13 128GB', 73, 23, 100, 100, '<p>Trong khi sức hút đ&ecirc;́n từ b&ocirc;̣ 4 phi&ecirc;n bản&nbsp;iPhone 12&nbsp;v&acirc;̃n chưa ngu&ocirc;̣i đi, th&igrave;&nbsp;Apple&nbsp;đ&atilde; mang đến cho người d&ugrave;ng một si&ecirc;u phẩm mới iPhone 13 -&nbsp;điện thoại&nbsp;c&oacute; nhiều cải tiến th&uacute; vị sẽ mang lại những trải nghiệm hấp dẫn nhất cho người d&ugrave;ng.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/iphone-13-7.jpg\" style=\"height:414px; width:740px\" />Với những n&acirc;ng cấp v&agrave; cải tiến mạnh mẽ về hiệu năng, camera đa chức năng, m&igrave;nh nghĩ rằng iPhone 13 sẽ l&agrave; một chiếc điện thoại cao cấp rất đ&aacute;ng được đầu tư v&agrave; sử dụng.</p>\r\n', 1, 24490000, 23000000, '', 'a824aff520.jpg', 'OLED, 6.1', 'iOS 15', '2 camera 12 MP', '12 MP', ' Apple A15 Bionic', '4 GB', ' 128 GB', ' 1 Nano SIM & 1 eSIM, Hỗ trợ 5G', '3240 mAh', '20 W', 'iphone-13-128gb', '2022-01-06 09:38:20'),
(134, 'SP0003', 'Vivo Y33s', 73, 35, 100, 95, '<p>Y33s&nbsp;mẫu&nbsp;điện thoại th&ocirc;ng minh&nbsp;với những ưu điểm đ&aacute;ng mơ ước cho một smartphone tầm trung. Chiếc điện thoại đến từ h&atilde;ng&nbsp;Vivo&nbsp;g&acirc;y ấn tượng với thiết kế m&agrave;n h&igrave;nh giọt nước tr&agrave;n viền, cụm 3 camera ấn tượng, cấu h&igrave;nh ổn định v&agrave; được b&aacute;n với mức gi&aacute; v&ocirc; c&ugrave;ng phải chăng.</p>\r\n\r\n<h3><img alt=\"\" src=\"/ckfinder/userfiles/files/2-2-800x450.jpg\" style=\"height:416px; width:740px\" /></h3>\r\n\r\n<p>Trong tầm gi&aacute; smartphone tầm trung, c&oacute; thể n&oacute;i Vivo Y33s l&agrave; thiết bị điện thoại th&ocirc;ng minh rất đ&aacute;ng để bạn xuất tiền sở hữu khi được trang bị thiết kế hiện đại, cấu h&igrave;nh vượt trội, camera ấn tượng, hứa hẹn sẽ đem lại trải nghiệm tuyệt vời cho người d&ugrave;ng.</p>\r\n', 1, 6690000, 6400000, 'ABC', '010d87980e.jpg', 'IPS LCD, 6.58', 'Android 11', 'Chính 50 MP & Phụ 2 MP, 2 MP', '16 MP', 'MediaTek Helio G80', 'MediaTek H', '128 GB', '2 Nano SIM (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '5000 mAh', '18 W', 'vivo-y33s', '2022-01-05 16:06:10'),
(135, 'SP0004', 'Samsung Galaxy Z Fold3 5G 512GB', 73, 24, 100, 96, '<p>Galaxy Z Fold3 5G&nbsp;đ&aacute;nh dấu bước tiến mới của&nbsp;Samsung&nbsp;trong ph&acirc;n kh&uacute;c&nbsp;điện thoại&nbsp;gập cao cấp khi được cải tiến về độ bền c&ugrave;ng những n&acirc;ng cấp đ&aacute;ng gi&aacute; về cấu h&igrave;nh hiệu năng, hứa hẹn sẽ mang đến trải nghiệm sử dụng đột ph&aacute; cho người d&ugrave;ng.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/samsung-galaxy-z-fold3-5g-512gb-060921-102514.jpg\" style=\"height:414px; width:740px\" /></p>\r\n\r\n<p>Galaxy Z Fold 3 mang trong m&igrave;nh một cấu h&igrave;nh &quot;đụng n&oacute;c&quot; trong thế giới&nbsp;Android&nbsp;hiện nay, kết hợp với m&agrave;n h&igrave;nh 120 Hz v&agrave; b&uacute;t S-Pen thần th&aacute;nh c&oacute; thể n&oacute;i đ&acirc;y sẽ l&agrave; thiết bị c&ocirc;ng nghệ phục vụ cho c&ocirc;ng việc hay giải tr&iacute; rất đ&aacute;ng để sở hữu.</p>\r\n', 1, 44990000, 44000000, 'ABC', '92ab4814af.jpg', 'Dynamic AMOLED 2X, Chính 7.6', 'Android 11', '3 camera 12 MP', '10 MP & 4 MP', 'Snapdragon 888', '12 GB', '512 GB', '2 Nano SIM + 1 eSIM, Hỗ trợ 5G', '4400 mAh', '25 W', 'samsung-galaxy-z-fold3-5g-512gb', '2022-01-05 15:47:32'),
(138, 'SP0005', 'Ốp lưng iPhone 13 Silicon OSMIA', 75, 47, 100, 99, '<p>Đặc điểm nổi bật</p>\r\n\r\n<ul>\r\n	<li>Thiết kế đơn giản với m&agrave;u đỏ trẻ trung, nổi bật.</li>\r\n	<li>D&ugrave;ng tr&ecirc;n <strong>iPhone 13</strong>, &ocirc;m s&aacute;t chống trầy, giảm lực va chạm, bảo vệ th&acirc;n m&aacute;y.</li>\r\n	<li>Chất liệu <strong>silicon </strong>đ&agrave;n hồi tốt, độ bền cao, d&ugrave;ng th&aacute;o lắp dễ d&agrave;ng tr&ecirc;n m&aacute;y.</li>\r\n	<li>Cắt kho&eacute;t tỉ mỉ, kh&ocirc;ng giảm độ nhạy c&aacute;c n&uacute;t nhấn v&agrave; cổng kết nối tr&ecirc;n cạnh viền.</li>\r\n</ul>\r\n', 0, 70000, 0, 'ABC', '18a6f46bf3.jpg', '', '', '', '', '', '', '', '', '', '', 'op-lung-iphone-13-silicon-osmia', '2022-01-03 10:10:32'),
(160, 'SP0006', 'iPhone 13 Pro Max 128GB', 73, 23, 100, 90, '<p>iPhone 13 Pro Max 256GB&nbsp;- si&ecirc;u phẩm mang tr&ecirc;n m&igrave;nh bộ vi xử l&yacute; Apple A15 Bionic h&agrave;ng đầu, m&agrave;n h&igrave;nh Super Retina XDR 120 Hz, cụm camera khẩu độ f/1.5 cực lớn, tất cả sẽ mang lại cho bạn những trải nghiệm tuyệt vời chưa từng c&oacute;.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/iphone-13-pro-max.jpg\" style=\"height:472px; width:740px\" />Với iPhone 13 Pro Max, Apple đ&atilde; đem tới cho người d&ugrave;ng một tuyệt phẩm đỉnh cao c&ocirc;ng nghệ với những n&acirc;ng cấp mạnh mẽ về thiết kế, cấu h&igrave;nh v&agrave; hiệu năng, đặc biệt l&agrave; cụm camera đẳng cấp bổ sung c&aacute;c t&iacute;nh năng mới kh&ocirc;ng thể bỏ lỡ.&nbsp;</p>\r\n', 1, 33990000, 33000000, 'ABC', 'e93edaab97.jpg', 'OLED, 6.7', 'iOS 15', '3 camera 12 MP', '12 MP', 'Apple A15 Bionic', '6 GB', '256 GB', ' 1 Nano SIM & 1 eSIM, Hỗ trợ 5G', '4352 mAh', '20 W', 'iphone-13-promax-256gb', '2022-01-11 13:36:03'),
(161, 'SP0007', 'Xiaomi 11T 5G 128GB', 73, 27, 100, 98, '<p>Xiaomi 11T&nbsp;đầy nổi bật với thiết kế v&ocirc; c&ugrave;ng trẻ trung, m&agrave;n h&igrave;nh AMOLED, bộ 3 camera sắc n&eacute;t v&agrave; vi&ecirc;n pin lớn đ&acirc;y sẽ l&agrave; mẫu&nbsp;smartphone&nbsp;của&nbsp;Xiaomi&nbsp;thỏa m&atilde;n mọi nhu cầu giải tr&iacute;, l&agrave;m việc v&agrave; l&agrave; niềm đam m&ecirc; s&aacute;ng tạo của bạn.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/xiaomi-11t-11.jpg\" style=\"height:508px; width:740px\" />Với thiết kế cao cấp, sử dụng m&agrave;n h&igrave;nh AMOLED, hiệu năng năng đầy mạnh mẽ v&agrave; dung lượng pin lớn cũng như khả năng sạc nhanh 67 W. Xiaomi 11T được dự đo&aacute;n sẽ l&agrave; một t&acirc;n binh &quot;khủng long&quot; trong d&ograve;ng&nbsp;điện thoại Android,&nbsp;sẵn s&agrave;ng c&ugrave;ng bạn kh&aacute;m ph&aacute; mọi thứ.&nbsp;</p>\r\n', 1, 10990000, 10000000, 'ABC', '5253bf0086.jpg', 'AMOLED, 6.67\", Full HD+', 'Android 11', 'Chính 108 MP & Phụ 8 MP, 5 MP', '16 MP', 'MediaTek Dimensity 1200', '8 GB', ' 128 GB', ' 2 Nano SIM, Hỗ trợ 5G', '5000 mAh', '67 W', 'xiaomi-11t', '2022-01-11 13:46:47'),
(162, 'SP0008', 'Samsung Galaxy A52s 5G', 73, 24, 100, 96, '<p>Samsung&nbsp;đ&atilde; ch&iacute;nh thức giới thiệu chiếc điện thoại&nbsp;Galaxy A52s 5G&nbsp;đến người d&ugrave;ng, đ&acirc;y&nbsp;phi&ecirc;n bản n&acirc;ng cấp của&nbsp;Galaxy A52 5G&nbsp;ra mắt c&aacute;ch đ&acirc;y kh&ocirc;ng l&acirc;u, với ngoại h&igrave;nh kh&ocirc;ng đổi nhưng được n&acirc;ng cấp đ&aacute;ng kể về th&ocirc;ng số cấu h&igrave;nh b&ecirc;n trong.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/samsung-galaxy-a52s-5g-11.jpg\" style=\"height:414px; width:740px\" />C&oacute; thể n&oacute;i, Samsung Galaxy A52s 5G kh&ocirc;ng chỉ được thừa hưởng thiết kế tinh tế v&agrave; ấn tượng của phi&ecirc;n bản đi trước m&agrave; ch&uacute;ng c&ograve;n được n&acirc;ng cấp kh&aacute; nhiều về trang bị v&agrave; t&iacute;nh năng. Chắc chắn đ&acirc;y sẽ l&agrave; chiếc smartphone mang đến cho người d&ugrave;ng những trải nghiệm th&uacute; vị kh&oacute; qu&ecirc;n.</p>\r\n', 0, 10990000, 10000000, 'ABC', 'f7ab9d7cdd.jpg', 'Super AMOLED, 6.5\", Full HD+', 'Android 11', 'Chính 64 MP & Phụ 12 MP, 5 MP, 5 MP', '32 MP', 'Snapdragon 778G 5G 8 nhân', '8 GB', ' 128 GB', '2 Nano SIM, Hỗ trợ 5G', '4500 mAh', '25 W', 'samsung-galaxy-a52s', '2022-01-11 13:52:12'),
(163, 'SP0009', 'iPhone 11 64GB', 73, 23, 50, 45, '<p>Apple đ&atilde; ch&iacute;nh thức tr&igrave;nh l&agrave;ng bộ 3 si&ecirc;u phẩm iPhone 11, trong đ&oacute; phi&ecirc;n bản&nbsp;iPhone 11 64GB&nbsp;c&oacute; mức gi&aacute; rẻ nhất nhưng vẫn được n&acirc;ng cấp mạnh mẽ như&nbsp;iPhone Xr&nbsp;ra mắt&nbsp;trước đ&oacute;.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/iphone-113-1.jpg\" style=\"height:493px; width:740px\" /></p>\r\n\r\n<p>iPhone 11 tự tin sẽ l&agrave; một đối thủ đ&aacute;ng gờm với những chiếc flagship đến từ c&aacute;c h&atilde;ng Android đang c&oacute; mặt tr&ecirc;n thị trường.</p>\r\n', 1, 14990000, 13000000, 'ABC', 'f3299f789e.jpg', 'IPS LCD, 6.1, \"Liquid Retina', 'iOS 15', '2 camera 12 MP', '12 MP', 'Apple A13 Bionic', '4 GB', ' 64 GB', '1 Nano SIM & 1 eSIM, Hỗ trợ 4G', '3110 mAh', '18 W', 'iphone-11', '2022-01-11 14:00:59'),
(164, 'SP00010', 'Realme C21Y 4GB', 73, 37, 100, 98, '<p>Realme C21Y&nbsp;chiếc&nbsp;điện thoại&nbsp;với thiết kế đẹp mắt, tinh tế hướng đến đối tượng người d&ugrave;ng phổ th&ocirc;ng đang t&igrave;m kiếm một sản phẩm với cấu h&igrave;nh tốt, đầy đủ t&iacute;nh năng hấp dẫn v&agrave; đặc biệt l&agrave; pin khủng cho một ng&agrave;y l&agrave;m việc sử dụng l&acirc;u d&agrave;i.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/realme-c21y-007.jpg\" style=\"height:493px; width:740px\" /></p>\r\n\r\n<p>Với hiệu năng ổn định mượt m&agrave;, thiết kế độc đ&aacute;o c&ugrave;ng cụm camera hiện đại với rất nhiều t&iacute;nh năng hấp dẫn, Realme C21Y l&agrave; lựa chọn tốt với những người muốn t&igrave;m kiếm một chiếc smartphone gi&aacute; rẻ, m&agrave;n h&igrave;nh lớn v&agrave; c&oacute; thời gian pin thoải m&aacute;i để d&ugrave;ng v&agrave;i ng&agrave;y mới cần sạc.</p>\r\n', 0, 4290000, 3500000, 'ABC', 'deef0034d5.jpg', 'IPS LCD, 6.5\", HD+', ' Android 11', 'Chính 13 MP & Phụ 2 MP, 2 MP', '5 MP', 'Spreadtrum T610 8 nhân', '4 GB', ' 64 GB', ' 2 Nano SIM, Hỗ trợ 4G', ' 5000 mAh', '10 W', 'realme-c21y', '2022-01-11 14:05:38'),
(165, 'SP00011', 'OPPO Reno6 Z 5G', 73, 28, 100, 100, '<p>Reno6 Z 5G&nbsp;đến từ nh&agrave;&nbsp;OPPO&nbsp;với h&agrave;ng loạt sự n&acirc;ng cấp v&agrave; cải tiến kh&ocirc;ng chỉ ngoại h&igrave;nh b&ecirc;n ngo&agrave;i m&agrave; c&ograve;n sức mạnh b&ecirc;n trong. Đặc biệt, chiếc&nbsp;điện thoại&nbsp;được h&atilde;ng đ&aacute;nh gi&aacute; &ldquo;chuy&ecirc;n gia ch&acirc;n dung bắt trọn mọi cảm x&uacute;c ch&acirc;n thật nhất&rdquo;, đ&acirc;y chắc chắn sẽ l&agrave; một &ldquo;si&ecirc;u phẩm&quot; m&agrave; bạn kh&ocirc;ng thể bỏ qua.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/reno6-z-5g-20.jpg\" style=\"height:414px; width:740px\" />Reno6 Z 5G với thiết kế tinh tế, cụm camera với nhiều t&iacute;nh năng chuy&ecirc;n nghiệp, hiệu năng ổn định, phần mềm được tối ưu ho&aacute; th&ocirc;ng minh. Đ&acirc;y kh&ocirc;ng chỉ l&agrave; một sản phẩm m&agrave; n&oacute; c&ograve;n l&agrave; người bạn đồng h&agrave;nh l&acirc;u d&agrave;i, hỗ trợ bạn tạo ra những cảm x&uacute;c thăng hoa trong những khoảnh khắc đ&aacute;ng nhớ.</p>\r\n', 1, 9490000, 8500000, 'ABC', '58480d97cd.jpg', 'AMOLED, 6.43\", Full HD+', 'Android 11', 'Chính 64 MP & Phụ 8 MP, 2 MP', '32 MP', ' MediaTek Dimensity 800U 5G', ' 8 GB', '128 GB', '2 Nano SIM, Hỗ trợ 5G', '4310 mAh', '30 W', 'oppo-reno6-z-5g', '2022-01-11 14:15:45'),
(166, 'SP00012', 'Samsung Galaxy Tab S7 FE WiFi', 74, 39, 100, 99, '<p>Samsung Galaxy Tab S7 FE WiFi&nbsp;- được&nbsp;Samsung&nbsp;cho ra mắt với v&ocirc; v&agrave;n t&iacute;nh năng c&ugrave;ng nhiều ưu điểm nổi bật so hơn với c&aacute;c đối thủ trong tầm gi&aacute;,&nbsp;tablet&nbsp;hỗ trợ b&uacute;t S Pen nhằm phục vụ c&aacute;c c&ocirc;ng việc của bạn trở n&ecirc;n dễ d&agrave;ng hay hiệu suất mạnh mẽ tr&ecirc;n một con chip gaming đến từ nh&agrave; Qualcomm, khiến n&oacute; trở th&agrave;nh một sự lựa chọn kh&ocirc;ng thể bỏ qua đối với người d&ugrave;ng.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/samsung-galaxy-tab-s7-fe-wifi1.jpg\" style=\"height:414px; width:740px\" /></p>\r\n\r\n<p>Với hiệu năng mạnh mẽ được trang bị hay kiểu d&aacute;ng thiết thiết v&ocirc; c&ugrave;ng sang trọng tr&ecirc;n Samsung Galaxy Tab S7 FE WiFi, khiến đ&acirc;y thực sự l&agrave; một lựa chọn kh&ocirc;ng thể bỏ qua trong ph&acirc;n kh&uacute;c Tablet tầm trung cận cao cấp, ngo&agrave;i ra hỗ trợ b&uacute;t S Pen gi&uacute;p cho những ai thường xuy&ecirc;n thực hiện c&aacute;c c&ocirc;ng việc chuẩn bị nội dung đồ họa trong một khoảng thời gian d&agrave;i với vi&ecirc;n pin khủng 10.090 mAh.</p>\r\n', 1, 12990000, 11000000, 'ABC', '4132257138.jpg', '12.4\", TFT LCD', ' Android 11', '8 MP', ' 5 MP', ' Snapdragon 778G 8 nhân', ' 4 GB', '64 GB', '', '10090 mAh', '45 W', 'samsung-galaxy-tab-s7-fe-wifi', '2022-01-11 14:20:27'),
(167, 'SP00013', 'Samsung Galaxy S21 FE 5G', 73, 24, 100, 100, '<h2>Đặc điểm nổi bật</h2>\r\n\r\n<ul>\r\n	<li>C&oacute; nhiều sắc m&agrave;u thời thượng ph&ugrave; hợp mọi phong c&aacute;ch.</li>\r\n	<li>M&agrave;n h&igrave;nh Full HD+ được bảo vệ bởi K&iacute;nh cường lực Gorilla Glass Victus.</li>\r\n	<li>Bộ camera chuy&ecirc;n nghiệp đến 12 MP, mang lại chất lượng ảnh chuẩn Studio.</li>\r\n	<li>Sử dụng vi xử l&yacute; Exynos 2100 h&agrave;ng đầu của Samsung.</li>\r\n	<li>Hỗ trợ c&ocirc;ng nghệ kết nối 5G hiện đại.</li>\r\n	<li>Pin 4500 mAh bền bỉ hỗ trợ sạc nhanh 25 W</li>\r\n</ul>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/samsung-galaxy-s21-fe-4.jpg\" style=\"height:493px; width:740px\" /></p>\r\n', 1, 16990000, 15000000, 'ABC', '744a9cd8cf.jpg', 'Dynamic AMOLED 2X, 6.4\", Full HD+', 'Android 12', 'Chính 12 MP & Phụ 12 MP, 8 MP', '32 MP', 'Exynos 2100', '8 GB', '128 GB', '2 Nano SIM, Hỗ trợ 5G', '4500 mAh', '25 W', 'samsung-galaxy-s21-fe', '2022-01-11 14:28:36'),
(168, 'SP00014', 'Xiaomi 11 Lite 5G NE', 73, 27, 100, 100, '<p>Xiaomi 11 Lite 5G NE&nbsp;một phi&ecirc;n bản c&oacute; ngoại h&igrave;nh rất giống với&nbsp;Mi 11 Lite&nbsp;được ra mắt trước đ&acirc;y. Chiếc&nbsp;smartphone&nbsp;n&agrave;y của&nbsp;Xiaomi&nbsp;mang trong m&igrave;nh một hiệu năng ổn định, thiết kế sang trọng v&agrave; m&agrave;n h&igrave;nh lớn đ&aacute;p ứng tốt c&aacute;c t&aacute;c vụ hằng ng&agrave;y của bạn một c&aacute;ch dễ d&agrave;ng.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/xiaomi-11-lite-5g-ne-4.jpg\" style=\"height:414px; width:740px\" /></p>\r\n', 1, 9490000, 8300000, 'ABC', '495a184d7e.jpg', 'AMOLED, 6.55\", Full HD+', 'Android 11', 'Chính 64 MP & Phụ 8 MP, 5 MP', '20 MP', 'Snapdragon 778G 5G 8 nhân', '8 GB', '128 GB', '2 Nano SIM (SIM 2 chung khe thẻ nhớ), Hỗ trợ 5G', '4250 mAh', '33 W', 'xiaomi-11-lite-5g-ne', '2022-01-11 14:33:43'),
(169, 'SP00015', 'iPhone 12 Pro Max 128GB ', 73, 23, 100, 95, '<p>iPhone 12 Pro Max 128 GB&nbsp;một si&ecirc;u phẩm&nbsp;smartphone&nbsp;đến từ&nbsp;Apple. M&aacute;y c&oacute; một hiệu năng ho&agrave;n to&agrave;n mạnh mẽ đ&aacute;p ứng tốt nhiều nhu cầu đến từ người d&ugrave;ng v&agrave; mang trong m&igrave;nh một thiết kế đầy vu&ocirc;ng vức, sang trọng.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/iphone-12-pro-max-2-1.jpg\" style=\"height:493px; width:740px\" />C&oacute; thể thấy, iPhone 12 Pro Max 128 GB l&agrave; mẫu smartphone cao cấp đầy mạnh mẽ sở hữu cho m&igrave;nh những ưu điểm nổi trội về camera hay cả hiệu năng mạnh mẽ. Hứa hẹn đ&acirc;y sẽ l&agrave; mẫu sản phẩm mang tới trải nghiệm tốt đến người d&ugrave;ng.</p>\r\n', 1, 32990000, 31000000, 'ABC', 'e250051415.jpg', 'OLED, 6.7', 'iOS 15', '3 camera 12 MP', '12 MP', 'Apple A14 Bionic', '6 GB', '128 GB', '1 Nano SIM & 1 eSIM, Hỗ trợ 5G', '3687 mAh', '20 W', 'iphone-12-pro-max', '2022-01-11 14:45:02'),
(170, 'SP00016', 'Samsung Galaxy Z Fold2 5G', 73, 24, 100, 100, '<p>Galaxy Z Fold 2&nbsp;l&agrave; t&ecirc;n gọi ch&iacute;nh thức của&nbsp;điện thoại&nbsp;m&agrave;n h&igrave;nh gập cao cấp của&nbsp;Samsung.&nbsp;Với nhiều n&acirc;ng cấp ti&ecirc;n phong về thiết kế, hiệu năng v&agrave; camera, hứa hẹn đ&acirc;y sẽ l&agrave; một si&ecirc;u phẩm th&agrave;nh c&ocirc;ng tiếp theo đến từ &ldquo;&ocirc;ng tr&ugrave;m&rdquo; sản xuất điện thoại lớn nhất thế giới.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/samsung-galaxy-z-fold-2-302920-012942.jpg\" style=\"height:493px; width:740px\" />Galaxy Fold Z 2 kh&ocirc;ng chỉ đơn thuần l&agrave; một chiếc flagship, m&agrave; l&agrave; lời khẳng định vị thế đứng đầu của của Samsung. Khắc phục nhiều nhược điểm tr&ecirc;n thế hệ cũ k&egrave;m nhiều n&acirc;ng cấp đ&aacute;ng gi&aacute;, gi&uacute;p cho Galaxy Z Fold 2 sẽ c&ograve;n l&agrave; c&aacute;i t&ecirc;n được giới c&ocirc;ng nghệ săn đ&oacute;n trong thời gian sắp tới.</p>\r\n', 1, 30000000, 29000000, 'ABC', '7fb9b56219.jpg', 'Chính: Dynamic AMOLED 2X, Phụ: Super AMOLED, Chính 7.59\" & Phụ 6.23\", Full HD+', 'Android 10', '3 camera 12 MP', 'Trong 10 MP & Ngoài 10 MP', 'Snapdragon 865+', '12 GB', '256 GB', '1 Nano SIM & 1 eSIM, Hỗ trợ 5G', '4500 mAh', '25 W', 'samsung-galaxy-z-fold-2', '2022-01-11 15:02:02'),
(171, 'SP00017', 'OPPO Find X3 Pro 5G', 73, 28, 100, 98, '<p>OPPO&nbsp;đ&atilde; l&agrave;m khuynh đảo thị trường&nbsp;smartphone&nbsp;khi cho ra đời chiếc điện thoại&nbsp;OPPO Find X3 Pro 5G. Đ&acirc;y l&agrave; một sản phẩm c&oacute; thiết kế độc đ&aacute;o, sở hữu cụm camera khủng, cấu h&igrave;nh thuộc top đầu trong thế giới Android.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/oppo-find-x3-pro-5g-002.jpg\" style=\"height:493px; width:740px\" /></p>\r\n\r\n<p>OPPO lần n&agrave;y đ&atilde; cho ra mắt một sản phẩm cao cấp cả về kiểu d&aacute;ng ấn tượng lẫn hiệu năng tuyệt vời. OPPO Find X3 Pro 5G hứa hẹn đưa t&ecirc;n tuổi OPPO đến nhiều người d&ugrave;ng với thiết kế độc đ&aacute;o, đậm chất ri&ecirc;ng v&agrave; chất lượng phần mềm mạnh mẽ.</p>\r\n', 1, 19490000, 18500000, 'ABC', '71c5c3f7d0.jpg', 'AMOLED, 6.7', 'Android 11', 'Chính 50 MP & Phụ 50 MP, 13 MP, 3 MP', '32 MP', 'Snapdragon 888', '12 GB', '256 GB', '2 Nano SIM, Hỗ trợ 5G', '4500 mAh', '65 W', 'oppo-find-x3-pro', '2022-01-11 15:08:31'),
(173, 'SP00018', 'iPhone XR 64GB', 73, 23, 100, 100, '<p>L&agrave; chiếc&nbsp;điện thoại iPhone&nbsp;c&oacute; mức gi&aacute; dễ chịu, ph&ugrave; hợp với nhiều kh&aacute;ch h&agrave;ng hơn,&nbsp;iPhone Xr&nbsp;vẫn được ưu &aacute;i trang bị chip Apple A12 mạnh mẽ, m&agrave;n h&igrave;nh tai thỏ c&ugrave;ng khả năng kh&aacute;ng nước kh&aacute;ng bụi</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/iphone-xr-tgdd-3.jpg\" style=\"height:493px; width:740px\" /></p>\r\n', 0, 14990000, 14000000, 'ABC', 'bd97db7095.jpg', 'IPS LCD, 6.1, ', 'iOS 15', '12 MP', '7 MP', 'Apple A12 Bionic', '3 GB', ' 64 GB', '1 Nano SIM & 1 eSIM, Hỗ trợ 4G', '2942 mAh', '15 W', 'iphone-xr-64gb', '2022-01-11 15:33:22'),
(174, 'SP00019', 'Samsung Galaxy S21+ 5G', 73, 24, 100, 97, '<p>Ẩn đằng sau thiết kế tuyệt t&aacute;c của si&ecirc;u phẩm&nbsp;Galaxy S21 5G&nbsp;l&agrave; cả một kỳ quan c&ocirc;ng nghệ, m&agrave; ở đ&oacute; bạn c&oacute; thể trải nghiệm hiệu năng mạnh mẽ nhất, những c&ocirc;ng nghệ ti&ecirc;n phong, dẫn đầu tr&agrave;o lưu với cụm camera đỉnh cao đến từ&nbsp;Samsung.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/samsung-galaxy-s21-plus-253321-113347.jpg\" style=\"height:493px; width:740px\" />Với loạt c&ocirc;ng nghệ đỉnh cao, Samsung Galaxy S21+ một lần nữa định nghĩa lại đẳng cấp si&ecirc;u phẩm. Chiếc smartphone cao cấp n&agrave;y sẽ ho&agrave;n hảo để bạn kh&aacute;m ph&aacute; trong những chuyến đi, tăng hiệu suất l&agrave;m việc v&agrave; tận hưởng thế giới giải tr&iacute; đỉnh cao với hiệu năng mạnh mẽ trong tầm tay.</p>\r\n', 1, 20990000, 19500000, 'ABC', '809c2c6d9f.jpg', 'Dynamic AMOLED 2X, 6.7\", Full HD+', 'Android 11', 'Chính 12 MP & Phụ 64 MP, 12 MP', '10 MP', 'Exynos 2100', '8 GB', '128 GB', '2 Nano SIM hoặc 1 Nano SIM + 1 eSIM, Hỗ trợ 5G', '4800 mAh', '25 W', 'samsung-galaxy-s21-plus', '2022-01-12 03:53:49'),
(175, 'SP00020', 'Samsung Galaxy Z Flip3 5G 128GB', 73, 24, 100, 99, '<p>Trong sự kiện Galaxy Unpacked hồi 11/8,&nbsp;Samsung&nbsp;đ&atilde; ch&iacute;nh thức tr&igrave;nh l&agrave;ng mẫu&nbsp;điện thoại m&agrave;n h&igrave;nh gập&nbsp;thế hệ mới mang t&ecirc;n&nbsp;Galaxy Z Flip3 5G 128GB. Đ&acirc;y l&agrave; một si&ecirc;u phẩm với m&agrave;n h&igrave;nh gập dạng vỏ s&ograve; c&ugrave;ng nhiều điểm cải tiến v&agrave; th&ocirc;ng số ấn tượng, sản phẩm chắc chắn sẽ thu h&uacute;t được rất nhiều sự quan t&acirc;m của người d&ugrave;ng, đặc biệt l&agrave; ph&aacute;i nữ.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/samsung-galaxy-z-flip-3-5.jpg\" style=\"height:414px; width:740px\" />C&oacute; thể thấy Samsung đ&atilde; tạo ra cỗ m&aacute;y thực sự hữu &iacute;ch trong sử dụng thường ng&agrave;y, chứ kh&ocirc;ng chỉ để cho đẹp, cho ấn tượng nữa. Chắc chắn sẽ mang lại tầm đẳng cấp cho người sở hữu v&agrave; n&oacute; c&ograve;n c&oacute; thể đ&aacute;p ứng những nhu cầu kh&oacute; nhất tr&ecirc;n chiếc smartphone.</p>\r\n', 1, 24990000, 23000000, 'ABC', '756040776e.jpg', 'Dynamic AMOLED 2X, Chính 6.7\" & Phụ 1.9\", Full HD+', 'Android 11', '2 camera 12 MP', '10 MP', 'Snapdragon 888', '8 GB', ' 128 GB', '1 Nano SIM & 1 eSIM, Hỗ trợ 5G', '3300 mAh', '15 W', 'samsung-galaxy-z-flip-3', '2022-01-12 04:10:31'),
(176, 'SP00021', 'iPhone SE 128GB (2020)', 73, 23, 100, 100, '<p>iPhone SE 2020&nbsp;khi được cho ra mắt đ&atilde; l&agrave;m thỏa m&atilde;n triệu t&iacute;n đồ T&aacute;o khuyết. M&aacute;y sở hữu thiết kế si&ecirc;u nhỏ gọn như&nbsp;iPhone 8, chip A13 Bionic cho hiệu năng khủng như&nbsp;iPhone 11, nhưng iPhone SE 2020 lại c&oacute; một mức gi&aacute; tốt đến bất ngờ.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/iphone-se-128gb-20206.jpg\" style=\"height:493px; width:740px\" />iPhone SE 2020 l&agrave; chiếc&nbsp;điện thoại chơi game&nbsp;tốt khi mang trong m&igrave;nh một cấu h&igrave;nh mạnh mẽ cũng như những t&iacute;nh năng mới nhất của nh&agrave; T&aacute;o. iPhone SE 2020 mang đến cho bạn sự trải nghiệm ho&agrave;n hảo với mức gi&aacute; kh&ocirc;ng thể hấp dẫn hơn.</p>\r\n', 0, 13490000, 12000000, 'ABC', '9f0def2d14.jpg', 'IPS LCD, 4.7\"', 'iOS 15', '12 MP', '7 MP', 'Apple A13 Bionic', '3 GB', '128 GB', '1 Nano SIM & 1 eSIM, Hỗ trợ 4G', '1821 mAh', '18 W', 'iphone-se-2020', '2022-01-12 04:16:29'),
(177, 'SP00022', 'Xiaomi Mi 10T Pro 5G', 73, 27, 100, 100, '<p>Mi 10T Pro 5G&nbsp;mẫu&nbsp;smartphone&nbsp;cao cấp của&nbsp;Xiaomi&nbsp;trong năm 2020 cuối c&ugrave;ng cũng được tr&igrave;nh l&agrave;ng với loạt những th&ocirc;ng số g&acirc;y &ldquo;cho&aacute;ng ngợp&rdquo;: M&agrave;n h&igrave;nh tần số qu&eacute;t 144 Hz, vi xử l&yacute; Snapdragon 865 v&agrave; cụm camera khủng 108 MP k&egrave;m theo đ&oacute; l&agrave; một mức gi&aacute; dễ chịu cho người d&ugrave;ng.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/xiaomi-mi-10t-pro-142420-032426.jpg\" style=\"height:493px; width:740px\" /></p>\r\n\r\n<p>Xiaomi 10T Pro c&oacute; thể được xem l&agrave; mẫu smartphone cao cấp nhất của Xiaomi trong nằm 2020. Trong ph&acirc;n kh&uacute;c cận cao cấp&nbsp;đ&acirc;y&nbsp;l&agrave; một lựa chọn đ&aacute;ng đầu tư, người d&ugrave;ng vẫn sẽ c&oacute; cấu h&igrave;nh mạnh mẽ, mạng 5G, camera 108 MP c&ugrave;ng h&agrave;ng loạt t&iacute;nh năng hấp dẫn đ&acirc;y l&agrave; điều kh&ocirc;ng phải smartphone n&agrave;o cũng đ&aacute;p ứng được.</p>\r\n', 0, 12990000, 11000000, 'ABC', '70b579ff49.jpg', 'IPS LCD6.67\", Full HD+', 'Android 10', 'Chính 108 MP & Phụ 13 MP, 5 MP', '20 MP', 'Snapdragon 865', '8 GB', '256 GB', '2 Nano SIM, Hỗ trợ 5G', '5000 mAh', '33 W', 'xiaomi-mi-10t-pro', '2022-01-12 04:20:11'),
(178, 'SP00023', 'Vivo X70 Pro 5G', 73, 35, 100, 100, '<p><img alt=\"\" src=\"/ckfinder/userfiles/files/vivo-x70-pro-150921-093353.jpg\" style=\"height:414px; width:740px\" />Vivo X70 Pro thực sự l&agrave; một sản phẩm rất đ&aacute;ng tiền trong tầm gi&aacute; khi sở hữu thiết kế sang trọng, cấu h&igrave;nh ngon c&ugrave;ng cụm 4 camera ấn tượng, smartphone n&agrave;y hứa hẹn sẽ dễ d&agrave;ng chinh phục nhiều đối tượng người d&ugrave;ng đặc biệt l&agrave; những ai đam m&ecirc; chụp ảnh.</p>\r\n', 0, 18990000, 17500000, 'ABC', 'b36cc166a0.jpg', 'AMOLED, 6.56\", Full HD+', 'Android 11', 'Chính 50 MP & Phụ 12 MP, 12 MP, 8 MP', '32 MP', 'MediaTek Dimensity 1200', '12 GB', '256 GB', '2 Nano SIM, Hỗ trợ 5G', '4450 mAh', '44 W', 'vivo-x70-pro', '2022-01-12 04:26:17'),
(179, 'SP00024', 'OPPO Reno6 5G', 73, 28, 100, 100, '<p>Sau khi ra mắt&nbsp;OPPO Reno5&nbsp;chưa l&acirc;u th&igrave;&nbsp;OPPO&nbsp;lại cho ra mẫu&nbsp;smartphone&nbsp;mới mang t&ecirc;n&nbsp;OPPO Reno6&nbsp;với h&agrave;ng loạt cải tiến mới về ngoại h&igrave;nh b&ecirc;n ngo&agrave;i lẫn hiệu năng b&ecirc;n trong, mang đến trải nghiệm vượt bật cho người d&ugrave;ng.&#39;<img alt=\"\" src=\"/ckfinder/userfiles/files/oppo-reno6-2.jpg\" style=\"height:493px; width:740px\" />Chỉ với gi&aacute; tầm trung bạn đ&atilde; c&oacute; trong tay một chiếc điện thoại c&ugrave;ng nhiều t&iacute;nh năng hấp dẫn, đ&aacute;p ứng c&aacute;c nhu cầu kh&aacute;c nhau, hứa hẹn sẽ l&agrave; mẫu Smartphone ph&ugrave; hợp với nhiều người tin d&ugrave;ng.</p>\r\n', 0, 12990000, 11500000, 'ABC', '6e34fae839.jpg', 'AMOLED, 6.43\", Full HD+', 'Android 11', 'Chính 64 MP & Phụ 8 MP, 2 MP', '32 MP', 'MediaTek Dimensity 900 5G', '8 GB', '128 GB', '2 Nano SIM, Hỗ trợ 5G', '4300 mAh', '65 W', 'oppo-reno6', '2022-01-12 06:14:21'),
(180, 'SP00025', 'iPhone 13 mini 128GB', 73, 23, 100, 98, '<p>iPhone 13 mini&nbsp;được&nbsp;Apple&nbsp;ra mắt với h&agrave;ng loạt n&acirc;ng cấp về cấu h&igrave;nh v&agrave; c&aacute;c t&iacute;nh năng hữu &iacute;ch, lại c&oacute; thiết kế vừa vặn. Chiếc&nbsp;điện thoại&nbsp;n&agrave;y hứa hẹn l&agrave; một thiết bị ho&agrave;n hảo hướng tới những kh&aacute;ch h&agrave;ng th&iacute;ch sự nhỏ gọn nhưng vẫn giữ được sự mạnh mẽ b&ecirc;n trong.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/iphone-13-mini-6.jpg\" style=\"height:414px; width:740px\" />iPhone 13 mini c&oacute; một ngoại h&igrave;nh v&ocirc; c&ugrave;ng nhỏ gọn nhưng mang trong m&igrave;nh một hiệu năng rất mạnh mẽ c&ugrave;ng nhiều t&iacute;nh năng mới hữu &iacute;ch. Bạn l&agrave; người y&ecirc;u th&iacute;ch sự nhỏ gọn v&agrave; muốn c&oacute; một hiệu năng mạnh th&igrave; đ&acirc;y sẽ l&agrave; thiết bị ho&agrave;n to&agrave;n ph&ugrave; hợp d&agrave;nh cho bạn.</p>\r\n', 1, 19290000, 18000000, 'ABC', '78787bd963.jpg', 'OLED, 5.4\", Super Retina XDR', 'iOS 15', '2 camera 12 MP', '12 MP', 'Apple A15 Bionic', '4 GB', '128 GB', '1 Nano SIM & 1 eSIM, Hỗ trợ 5G', '2438 mAh', '20 W', 'iphone-13-mini', '2022-01-12 06:48:13'),
(181, 'SP00026', 'OPPO Reno5 Marvel', 73, 28, 100, 96, '<p>OPPO&nbsp;cho ra mắt một phi&ecirc;n bản giới hạn mới&nbsp;OPPO Reno5 Marvel, về hiệu năng cấu h&igrave;nh b&ecirc;n trong m&aacute;y ho&agrave;n to&agrave;n tương tự so với&nbsp;Reno5, nhưng về kiểu d&aacute;ng b&ecirc;n ngo&agrave;i m&aacute;y c&oacute; phần kh&aacute;c biệt với thiết kế t&ugrave;y chỉnh với mặt lưng c&oacute; logo Marvel, logo Avengers ho&agrave;n to&agrave;n mới lạ.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/oppo-reno5-marvel-4g-001.jpg\" style=\"height:493px; width:740px\" />Thiết kế mới mang phong c&aacute;ch thể thao c&aacute; t&iacute;nh, c&ugrave;ng một hiệu năng gaming đỉnh cao chắc chắn sẽ l&agrave;m h&agrave;i l&ograve;ng đến c&aacute;c bạn game thủ. Khả năng chụp ảnh chất lượng c&ugrave;ng c&ocirc;ng nghệ sạc nhanh sẽ g&oacute;p phần n&acirc;ng cao th&ecirc;m sự trải nghiệm cho bạn.</p>\r\n', 1, 9690000, 8900000, 'ABC', 'dd99c26388.jpg', 'AMOLED, 6.43\", Full HD+', 'Android 11', 'Chính 64 MP & Phụ 8 MP, 2 MP, 2 MP', '44 MP', 'Snapdragon 720G', '8 GB', '128 GB', '2 Nano SIM, Hỗ trợ 4G', '4310 mAh', '50 W', 'oppo-reno5-marvel', '2022-01-12 06:54:26'),
(182, 'SP00027', 'Xiaomi 11 Lite 5G NE Trắng Swarovski', 73, 27, 100, 100, '<p>B&ecirc;n cạnh c&aacute;c phi&ecirc;n bản m&agrave;u cơ bản,&nbsp;Xiaomi&nbsp;c&ograve;n kết hợp với một thương hiệu chuy&ecirc;n l&agrave;m về pha l&ecirc;, đ&aacute; qu&yacute; h&agrave;ng đầu để mang tới&nbsp;Xiaomi 11 Lite 5G NE Trắng Swarovski&nbsp;cực chất mang vẻ đẹp thời trang h&agrave;ng đầu trong thế giới&nbsp;smartphone, c&ugrave;ng với đ&oacute; l&agrave; sức mạnh vượt trội, kết nối 5G si&ecirc;u tốc độ cho bạn thoải m&aacute;i trải nghiệm kh&ocirc;ng giới hạn.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/xiaomi-11-lite-5g-ne-trang-swarovski-051121-101438.jpg\" style=\"height:414px; width:740px\" />Xiaomi 11 Lite 5G NE Trắng Swarovski l&agrave; phi&ecirc;n bản đ&aacute;ng gi&aacute; với thiết kế ho&agrave;n hảo, cấu h&igrave;nh v&agrave; hiệu năng cực tốt trong mức gi&aacute; để bạn c&oacute; thể thoải m&aacute;i trải nghiệm hay d&agrave;nh tặng cho người th&acirc;n trong gia đ&igrave;nh.</p>\r\n', 0, 9490000, 8600000, 'ABC', 'e2e9aeed49.jpg', 'AMOLED, 6.55\", Full HD+', 'Android 11', 'Chính 64 MP & Phụ 8 MP, 5 MP', '20 MP', 'Snapdragon 778G 5G 8 nhân', '8 GB', '128 GB', '2 Nano SIM (SIM 2 chung khe thẻ nhớ), Hỗ trợ 5G', '4250 mAh', '33 W', 'xiaomi-11-lite-5g-ne-trang-swarovski', '2022-01-12 06:59:35'),
(183, 'SP00028', 'Nokia C20', 73, 36, 100, 100, '<p>Nokia C20&nbsp;sở hữu thiết kế v&agrave; cấu h&igrave;nh được tối giản nhưng vẫn c&oacute; đầy đủ t&iacute;nh năng giải tr&iacute; đa phương tiện của&nbsp;smartphone&nbsp;th&ocirc;ng thường. Với một mức gi&aacute; si&ecirc;u hấp dẫn l&agrave; người d&ugrave;ng phổ th&ocirc;ng đ&atilde; c&oacute; trong tay mẫu điện thoại&nbsp;gi&aacute; rẻ đến từ&nbsp;Nokia.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/nokia-c20-001.jpg\" style=\"height:493px; width:740px\" />Với những t&iacute;nh năng cơ bản nhất, Nokia C20 l&agrave; mẫu điện thoại c&oacute; mức gi&aacute; tốt dễ d&agrave;ng tiếp cận đến nhiều đối tượng người d&ugrave;ng đặc biệt l&agrave; những ai y&ecirc;u th&iacute;ch sự bền bỉ v&agrave; ổn định đến từ thương hiệu điện thoại l&acirc;u đời, đ&aacute;ng tin cậy như Nokia.</p>\r\n', 0, 2490000, 2000000, 'ABC', '002d837a01.jpg', 'IPS LCD, 6.5\", HD+', 'Android 11 (Go Edition)', '5 MP', '5 MP', 'Spreadtrum SC9863A', '2 GB', '32 GB', '2 Nano SIM, Hỗ trợ 4G', '2950 mAh', '5 W', 'nokia-c20', '2022-01-12 07:03:13'),
(184, 'SP00029', 'Xiaomi Redmi 9A', 73, 27, 100, 100, '<p>Redmi 9A&nbsp;l&agrave; chiếc&nbsp;smartphone&nbsp;đến từ&nbsp;Xiaomi&nbsp;hướng tới nh&oacute;m kh&aacute;ch h&agrave;ng đang t&igrave;m kiếm cho m&igrave;nh một sản phẩm với cấu h&igrave;nh tốt gi&aacute; th&agrave;nh phải chăng, cũng như được trang bị đầy đủ c&aacute;c t&iacute;nh năng ấn tượng.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/xiaomi-redmi-9a-142320-102358.jpg\" style=\"height:493px; width:740px\" />Với những ưu điểm kể tr&ecirc;n, c&oacute; thể n&oacute;i Xiaomi Redmi 9A l&agrave; chiếc smartphone gi&aacute; rẻ, nhưng được t&iacute;ch hợp cả tấn t&iacute;nh năng, với m&agrave;n h&igrave;nh lớn, dung lượng pin lớn v&agrave; chip xử l&yacute; mới nhất của MediaTek, một thiết bị đ&aacute;ng để c&acirc;n nhắc lựa chọn sử dụng cho người th&acirc;n v&agrave; gia đ&igrave;nh.&nbsp;</p>\r\n', 0, 2490000, 2000000, 'ABC', '3c433dc0d0.jpg', 'IPS LCD, 6.53\", HD+', 'Android 10', '13 MP', '5 MP', 'MediaTek Helio G25', '2 GB', '32 GB', '2 Nano SIM, Hỗ trợ 4G', '5000 mAh', '10 W', 'xiaomi-redmi-9a', '2022-01-12 07:06:34'),
(185, 'SP00030', 'Samsung Galaxy A03', 73, 24, 100, 100, '<h3>Đặc điểm nổi bật</h3>\r\n\r\n<ul>\r\n	<li>M&agrave;n h&igrave;nh lớn 6.5 inch HD+ hiển thị h&igrave;nh ảnh sống động, sắc n&eacute;t.</li>\r\n	<li>Thiết kế tối giản nhưng nổi bật nhờ hoa văn đan ch&eacute;o mảnh nhẹ.</li>\r\n	<li>Camera sau 48 MP&nbsp;cho chất lượng h&igrave;nh ảnh vẫn r&otilde; n&eacute;t khi ph&oacute;ng to.</li>\r\n	<li>Camera x&oacute;a ph&ocirc;ng 2 MP l&agrave;m nổi bật chủ thể hơn trong từng bức ảnh.</li>\r\n	<li>Camera trước 5 MP trang bị sẵn nhiều bộ lọc tự động cho ảnh selfie đẹp ho&agrave;n hảo.</li>\r\n	<li>H&ograve;a m&igrave;nh v&agrave;o kh&ocirc;ng gian &acirc;m nhạc khi kết nối tai nghe với c&ocirc;ng nghệ &acirc;m thanh Dolby Atmos.</li>\r\n	<li>Dung lượng pin lớn 5000 mAh cho thời gian trải nghiệm l&acirc;u hơn.</li>\r\n</ul>\r\n', 0, 2990000, 2300000, 'ABC', 'ccc2121ae7.jpg', 'PLS LCD, 6.5\", HD+', 'Android 11', 'Chính 48 MP & Phụ 2 MP', '5 MP', 'Unisoc T606 8 nhân', '3 GB', '32 GB', '2 Nano SIM, Hỗ trợ 4G', '5000 mAh', '7.75 W', 'samsung-galaxy-a03', '2022-01-12 07:09:39'),
(187, 'SP00032', 'Xiaomi Redmi 10', 73, 27, 100, 100, '<p>Xiaomi&nbsp;ch&iacute;nh thức tr&igrave;nh l&agrave;ng&nbsp;Redmi 10 (4GB/64GB), chiếc&nbsp;điện thoại&nbsp;h&agrave;i h&ograve;a giữa phong c&aacute;ch thiết kế sang trọng, hiệu năng mạnh mẽ với vi xử l&yacute; Helio G88, m&agrave;n h&igrave;nh giải tr&iacute; 90 Hz mượt m&agrave; c&ugrave;ng hệ thống 4 camera chất lượng. Sản phẩm được đ&aacute;nh gi&aacute; l&agrave; chiến binh mới đầy tiềm năng trong ph&acirc;n kh&uacute;c thị trường smartphone.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/xiaomi-redmi-10-001.jpg\" style=\"height:414px; width:740px\" />C&oacute; thể n&oacute;i Xiaomi Redmi 10 rất ph&ugrave; hợp cho nhiều đối tượng người d&ugrave;ng, đặc biệt l&agrave; những ai đang t&igrave;m kiếm một sản phẩm c&oacute; hiệu năng mạnh mẽ, hỗ trợ đầy đủ c&aacute;c t&iacute;nh năng hiện đại cho khả năng xử l&yacute; mượt m&agrave; c&ugrave;ng thời lượng pin lớn.</p>\r\n', 0, 3990000, 3200000, 'ABC', '87a5e455a9.jpg', 'IPS LCD, 6.5\", HD+', 'Android 11', 'Chính 50 MP & Phụ 8 MP, 2 MP, 2 MP', '8 MP', 'MediaTek Helio G88 8 nhân', '4 GB', '64 GB', '2 Nano SIM, Hỗ trợ 4G', '5000 mAh', '18 W', 'xiaomi-redmi-10', '2022-01-12 07:14:34'),
(188, 'SP00033', 'Realme 8', 73, 37, 100, 100, '<p>Điện thoại&nbsp;Realme 8&nbsp;được ra mắt nằm trong ph&acirc;n kh&uacute;c tầm trung, c&oacute; thiết kế đẹp mắt đặc trưng của&nbsp;Realme,&nbsp;smartphone&nbsp;trang bị hiệu năng b&ecirc;n trong đầy mạnh mẽ v&agrave; c&oacute; dung lượng pin tương đối lớn.<img alt=\"\" src=\"/ckfinder/userfiles/files/realme-8-001.jpg\" style=\"height:493px; width:740px\" />Realme 8 đang sở hữu c&aacute;c th&ocirc;ng số kỹ thuật hấp dẫn, vẻ ngo&agrave;i năng động của một chiếc smartphone hiện đại, Realme 8 lại v&ocirc; c&ugrave;ng ph&ugrave; hợp với t&uacute;i tiền chắc chắn sẽ l&agrave;m lay động biết bao nhi&ecirc;u người d&ugrave;ng.&nbsp;</p>\r\n', 0, 7290000, 6500000, 'ABC', 'a674ff833c.jpg', 'Super AMOLED, 6.4\", Full HD+', 'Android 11', 'Chính 64 MP & Phụ 8 MP, 2 MP, 2 MP', '16 MP', 'MediaTek Helio G95', '8 GB', '128 GB', '2 Nano SIM, Hỗ trợ 4G', '5000 mAh', '30 W', 'realme-8', '2022-01-12 08:03:31'),
(189, 'SP00034', 'Samsung Galaxy A32', 73, 24, 100, 100, '<p>Samsung Galaxy A32 4G&nbsp;l&agrave; chiếc điện thoại&nbsp;thuộc ph&acirc;n khúc t&acirc;̀m trung nhưng sở hữu nhiều ưu điểm vượt trội về màn hình lớn sắc n&eacute;t, bộ bốn camera 64 MP cùng vi xử lý hi&ecirc;̣u năng cao v&agrave; được b&aacute;n ra với mức gi&aacute; v&ocirc; c&ugrave;ng tốt.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/samsung-galaxy-a32-4g-002.jpg\" style=\"height:493px; width:740px\" />Với những ưu điểm vượt trội về thiết kế sang trọng, cụm camera chất lượng ho&agrave;n hảo, m&agrave;n h&igrave;nh sắc n&eacute;t đi k&egrave;m hiệu năng tốt v&agrave; c&oacute; mức gi&aacute; v&ocirc; c&ugrave;ng hấp dẫn, đ&acirc;y hứa hẹn sẽ l&agrave; smartphone ph&ugrave; hợp với đa dạng người ti&ecirc;u d&ugrave;ng.</p>\r\n', 0, 6490000, 5800000, 'ABC', '3e9b7684fd.jpg', 'Super AMOLED, 6.4\", Full HD+', 'Android 11', 'Chính 64 MP & Phụ 8 MP, 5MP, 5MP', '20 MP', 'MediaTek Helio G80', '6 GB', '128 GB', '2 Nano SIM, Hỗ trợ 4G', '5000 mAh', '15 W', 'samsung-galaxy-a32-4g', '2022-01-12 08:08:11'),
(190, 'SP00035', 'Nokia G10', 73, 36, 100, 100, '<p>Nokia G10&nbsp;c&ugrave;ng với&nbsp;Nokia G20&nbsp;l&agrave; bộ đ&ocirc;i&nbsp;smartphone&nbsp;đầu ti&ecirc;n thuộc d&ograve;ng G-series của&nbsp;Nokia, người d&ugrave;ng sẽ trải nghiệm l&acirc;u d&agrave;i với dung lượng pin lớn, thiết kế thời trang v&agrave; hoạt động tr&ecirc;n hệ điều h&agrave;nh&nbsp;Android&nbsp;11 nguy&ecirc;n bản, tối ưu sự mượt m&agrave; v&agrave; hỗ trợ cập nhật đến 3 năm.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/nokia-g10-24.jpg\" style=\"height:414px; width:740px\" />Nokia G10 l&agrave; một mẫu điện thoại c&oacute; mức gi&aacute; hợp l&yacute; d&agrave;nh cho người d&ugrave;ng phổ th&ocirc;ng. Đ&acirc;y chắc hẳn sẽ l&agrave; lựa chọn ph&ugrave; hợp cho người lớn tuổi, người mới sử dụng smartphone hay người cần thời lượng pin cực tr&acirc;u để giữ li&ecirc;n lạc v&agrave; giải tr&iacute; thả ga.</p>\r\n', 0, 3690000, 3000000, 'ABC', '455b5cb942.jpg', 'TFT LCD, 6.5, \"HD+', 'Android 11', 'Chính 13 MP & Phụ 2 MP, 2 MP', '8 MP', 'MediaTek Helio G25', '4 GB', ' 64 GB', '2 Nano SIM, Hỗ trợ 4G', '5050 mAh', '10 W', 'nokia-g10', '2022-01-12 08:11:07'),
(191, 'SP00036', 'iPhone 12 Pro 128GB', 73, 23, 100, 92, '<p>iPhone 12 Pro - &quot;Si&ecirc;u ph&acirc;̉m c&ocirc;ng nghệ&quot; với nhiều n&acirc;ng c&acirc;́p mạnh mẽ về thiết kế, cấu h&igrave;nh và hi&ecirc;̣u năng, khẳng định đẳng c&acirc;́p thời thượng tr&ecirc;n thị trường smartphone cao cấp</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/iphone-12-pro-10-1.jpg\" style=\"height:493px; width:740px\" />iPhone 12 Pro xứng đ&aacute;ng l&agrave; một si&ecirc;u phẩm mới với lượng trang bị v&agrave; t&iacute;nh năng c&oacute; tr&ecirc;n m&igrave;nh, hứa hẹn đ&acirc;y sẽ l&agrave; mẫu sản phẩm sẽ l&agrave;m mưa l&agrave;m gi&oacute; trong thị trường smartphone hiện nay.</p>\r\n', 1, 26590000, 25000000, 'ABC', 'd2c86273f2.jpg', 'OLED, 6.1\", Super Retina XDR', 'iOS 15', '3 camera 12 MP', '12 MP', 'Apple A14 Bionic', '6 GB', '128 GB', '1 Nano SIM & 1 eSIM, Hỗ trợ 5G', '2815 mAh', '20 W', 'iphone-12-pro', '2022-01-12 08:17:38'),
(192, 'SP00037', 'Samsung Galaxy S21 Ultra 5G 128GB', 73, 24, 100, 100, '<p>Sự đẳng cấp được&nbsp;Samsung&nbsp;gửi gắm th&ocirc;ng qua chiếc&nbsp;&nbsp;Galaxy S21 Ultra 5G với h&agrave;ng loạt sự n&acirc;ng cấp v&agrave; cải tiến kh&ocirc;ng chỉ ngoại h&igrave;nh b&ecirc;n ngo&agrave;i m&agrave; c&ograve;n sức mạnh b&ecirc;n trong, hứa hẹn đ&aacute;p ứng trọn vẹn nhu cầu ng&agrave;y c&agrave;ng cao của người d&ugrave;ng.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/samsung-galaxy-s21-ultra-5g-16.jpg\" style=\"height:493px; width:740px\" />Samsung Galaxy S21 Ultra 5G c&oacute; thể được coi l&agrave; v&iacute; dụ ti&ecirc;u biểu cho sự ph&aacute; c&aacute;ch trong thế giới Android đầu năm nay mang lại cho người d&ugrave;ng những trải nghiệm chưa từng c&oacute; tr&ecirc;n chiếc smartphone n&agrave;y.</p>\r\n', 1, 25990000, 24990000, 'ABC', 'e1cbadb133.jpg', 'Dynamic AMOLED 2X, 6.8\", Quad HD+ (2K+)', 'Android 11', 'Chính 108 MP & Phụ 12 MP, 10 MP, 10 MP', '40 MP', 'Exynos 2100', '12 GB', '128 GB', '2 Nano SIM hoặc 1 Nano SIM + 1 eSIMHỗ trợ 5G', '5000 mAh', '25 W', 'samsung-galaxy-s21-ultra', '2022-01-12 08:24:37'),
(193, 'SP00038', 'OPPO Reno4 Pro', 73, 28, 100, 100, '<p>OPPO&nbsp;ch&iacute;nh thức tr&igrave;nh l&agrave;ng chiếc&nbsp;smartphone&nbsp;c&oacute; t&ecirc;n&nbsp;OPPO Reno4 Pro. M&aacute;y trang bị cấu h&igrave;nh v&ocirc; c&ugrave;ng cao cấp với vi xử l&yacute; chip Snapdragon 720G, bộ 4 camera đến 48 MP ấn tượng, c&ugrave;ng c&ocirc;ng nghệ sạc si&ecirc;u nhanh 65 W nhưng được b&aacute;n với mức gi&aacute; v&ocirc; ưu đ&atilde;i, dễ tiếp cận.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/oppo-reno4-pro9.jpg\" style=\"height:493px; width:740px\" />Với ưu điểm cấu h&igrave;nh được trang bị gồm: chip Snapdragon 720G, camera si&ecirc;u n&eacute;t chống rung si&ecirc;u ấn tượng, sạc nhanh 65W si&ecirc;u tốc c&ugrave;ng m&agrave;n h&igrave;nh tr&agrave;n viền 90 Hz si&ecirc;u n&eacute;t,&hellip; c&oacute; thể n&oacute;i chiếc điện thoại OPPO Reno4 Pro quả thực l&agrave; si&ecirc;u phẩm c&ocirc;ng nghệ khiến người d&ugrave;ng phải lưu t&acirc;m.</p>\r\n', 0, 10490000, 9500000, 'ABC', 'efdcf67729.jpg', 'AMOLED, 6.5\", Full HD+', 'Android 10', 'Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP', '32 MP', 'Snapdragon 720G', '8 GB', '256 GB', '2 Nano SIM, Hỗ trợ 4G', '4000 mAh', '65 W', 'oppo-reno4-pro', '2022-01-12 08:28:29'),
(194, 'SP00039', 'Samsung Galaxy Note 20', 73, 24, 100, 100, '<p><img alt=\"\" src=\"/ckfinder/userfiles/files/samsung-galaxy-note-20-235720-125702.jpg\" style=\"height:493px; width:740px\" />Samsung Note 20 l&agrave; một trong những si&ecirc;u phẩm đ&aacute;ng sở hữu nhất trong năm 2020 với thiết kế thu h&uacute;t ở cụm camera độc đ&aacute;o, m&agrave;u sắc mới lạ, m&agrave;n h&igrave;nh si&ecirc;u tr&agrave;n viền c&ugrave;ng với những t&iacute;nh năng tiện &iacute;ch n&acirc;ng cấp của b&uacute;t S Pen.</p>\r\n', 0, 14990000, 13000000, 'ABC', '01ecd3838d.jpg', 'Super AMOLED Plus, 6.7\", Full HD+', 'Android 10', 'Chính 12 MP & Phụ 64 MP, 12 MP', '10 MP', 'Exynos 990', '8 GB', '256 GB', '2 Nano SIM hoặc 1 Nano SIM + 1 eSIMHỗ trợ 4G', '4300 mAh', '25 W', 'samsung-galaxy-note-20', '2022-01-12 08:33:25'),
(195, 'SP00040', 'Realme 9i', 73, 37, 100, 98, '<p>Realme 9i&nbsp;ra mắt với thiết kế cực kỳ b&oacute;ng bẩy, sang trọng, trang bị con chip&nbsp;Snapdragon 680 8 nh&acirc;n mạnh mẽ, bộ&nbsp;3 camera sau chụp h&igrave;nh sắc n&eacute;t, hỗ trợ sạc nhanh&nbsp;33 W v&agrave; nhiều t&iacute;nh năng hấp dẫn, rất đ&aacute;ng chờ mong.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/realme-9i-281221-030928.jpg\" style=\"height:414px; width:740px\" />Chiếc điện thoại tầm trung thuộc d&ograve;ng&nbsp;series 9 của nh&agrave;&nbsp;Realme&nbsp;n&agrave;y thật đ&aacute;ng kinh ngạc bạn nhỉ, nếu sức mạnh từ những con số v&agrave; h&igrave;nh ảnh của em ấy qu&aacute; quyến rũ với bạn, h&atilde;y mạnh tay tậu 1 em để trải nghiệm, đảm bảo y&ecirc;u ngay khi cầm nh&eacute;.</p>\r\n', 1, 6490000, 5000000, 'ABC', '6c90924716.jpg', 'IPS LCD, 6.6\", HD+', ' Android 11', 'Chính 50 MP & Phụ 2 MP, 2 MP', '16 MP', 'Snapdragon 680 8 nhân', '6 GB', '128 GB', '2 Nano SIM, Hỗ trợ 4G', '5000 mAh', '33 W', 'realme-9i', '2022-01-12 08:38:32'),
(196, 'SP00041', 'OPPO A95', 73, 28, 100, 94, '<p>B&ecirc;n cạnh phi&ecirc;n bản 5G, OPPO&nbsp;c&ograve;n bổ sung phi&ecirc;n bản OPPO A95 với gi&aacute; th&agrave;nh phải chăng tập trung v&agrave;o thiết kế năng động, sạc nhanh v&agrave; hiệu năng đa nhiệm ấn tượng sẽ gi&uacute;p cho cuộc sống của bạn th&ecirc;m phần hấp dẫn, ngập tr&agrave;n niềm vui.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/oppo-a95-4g-191121-095654.jpg\" style=\"height:414px; width:740px\" />OPPO A95 l&agrave; chiếc điện thoại th&ocirc;ng minh c&oacute; cấu h&igrave;nh mạnh, thời lượng pin đủ d&ugrave;ng trọn ng&agrave;y, chất lượng ảnh chụp l&agrave; kh&aacute; tốt v&agrave; cũng l&agrave; cỗ m&aacute;y chiến game gi&uacute;p bạn thư gi&atilde;n rất hiệu quả.</p>\r\n', 1, 6990000, 5500000, 'ABC', '398f91e3d3.jpg', 'AMOLED, 6.43\", Full HD+', 'Android 11', 'Chính 48 MP & Phụ 2 MP, 2 MP', '16 MP', 'Snapdragon 662', '8 GB', '128 GB', '2 Nano SIM, Hỗ trợ 4G', '5000 mAh', '33 W', 'oppo-a95-4g', '2022-01-12 08:42:31'),
(197, 'SP00042', 'iPhone 12 mini 64GB', 73, 23, 100, 93, '<p>iPhone 12 mini tuy l&agrave; phi&ecirc;n bản thấp nhất trong bộ 4 iPhone 12 series, nhưng vẫn sở hữu những ưu điểm vượt trội về k&iacute;ch thước nhỏ gọn, tiện lợi, hiệu năng đỉnh cao, t&iacute;nh năng sạc nhanh c&ugrave;ng bộ camera chất lượng cao.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/iphone-12-mini-055121-085143.jpg\" style=\"height:493px; width:740px\" />iPhone 12 phi&ecirc;n bản mini l&agrave; một trong những phi&ecirc;n bản điện thoại si&ecirc;u phẩm của Apple với nhiều đột ph&aacute; về c&ocirc;ng nghệ cũng như hiệu năng hứa hẹn sẽ l&agrave; mẫu điện thoại th&agrave;nh c&ocirc;ng nhất của Apple trong năm 2020.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 0, 18990000, 17500000, 'ABC', 'b1ba3f728b.jpg', 'OLED, 5.4\", Super Retina XDR', 'iOS 15', '2 camera 12 MP', '12 MP', 'Apple A14 Bionic', '4 GB', ' 64 GB', '1 Nano SIM & 1 eSIM, Hỗ trợ 5G', '2227 mAh', '20 W', 'iphone-12-mini', '2022-01-12 08:47:32'),
(198, 'SP00043', 'Xiaomi Redmi Note 10 Pro', 73, 27, 100, 100, '<p>Kế thừa v&agrave; n&acirc;ng cấp từ thế hệ trước, Xiaomi đ&atilde; cho ra mắt Xiaomi Redmi Note 10 Pro (8GB/128GB) sở hữu một thiết kế cao cấp, sang trọng b&ecirc;n cạnh cấu h&igrave;nh v&ocirc; c&ugrave;ng mạnh mẽ, hứa hẹn mang đến sự cạnh tranh lớn trong ph&acirc;n kh&uacute;c smartphone tầm trung.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/xiaomi-redmi-note-10-pro-8gb-001.jpg\" style=\"height:493px; width:740px\" />Xiaomi Redmi Note 10 Pro sở hữu những t&iacute;nh năng v&ocirc; c&ugrave;ng hấp dẫn của một chiếc điện thoại cao cấp trong một mức gi&aacute; tầm trung như: Pin tốt sạc pin nhanh, vi xử l&yacute; tốc độ, m&agrave;n h&igrave;nh v&agrave; camera cho chất lượng h&igrave;nh ảnh xuất sắc,... hứa hẹn sẽ b&ugrave;ng nổ trở th&agrave;nh một trong những smartphone tầm trung đ&aacute;ng ch&uacute; &yacute; nhất nửa đầu năm 2021.</p>\r\n', 0, 7490000, 6500000, 'ABC', 'd42d349aa5.jpg', 'AMOLED, 6.67\", Full HD+', 'Android 11', 'Chính 108 MP & Phụ 8 MP, 5 MP, 2 MP', '16 MP', 'Snapdragon 732G', '8 GB', '128 GB', '2 Nano SIM, Hỗ trợ 4G', '5020 mAh', '33 W', 'xiaomi-redmi-note-10-pro', '2022-01-12 08:52:29'),
(199, 'SP00044', 'Vivo Y72 5G', 73, 35, 100, 100, '<p>Vivo Y72 5G mẫu smartphone 5G của Vivo, m&aacute;y sở hữu một m&agrave;n h&igrave;nh lớn, hiệu năng mạnh mẽ, cụm 3 camera sắc n&eacute;t v&agrave; thời lượng pin ấn tượng, m&aacute;y đ&aacute;p ứng tốt hầu hết nhu cầu sử dụng m&agrave; người d&ugrave;ng cần.<img alt=\"\" src=\"/ckfinder/userfiles/files/vivo-y72-5g-007.jpg\" style=\"height:493px; width:740px\" />Vivo Y72 5G l&agrave; chiếc điện thoại to&agrave;n diện về thiết kế, cấu h&igrave;nh v&agrave; camera ph&ugrave; hợp với những người y&ecirc;u c&ocirc;ng nghệ c&oacute; nhu cầu chơi game đồ họa cao v&agrave; y&ecirc;u th&iacute;ch chụp ảnh.</p>\r\n', 0, 7990000, 6600000, 'ABC', 'ceb2fa43f6.jpg', 'IPS LCD, 6.58\", HD+', 'Android 11', 'Chính 64 MP & Phụ 8 MP, 2 MP', '16 MP', 'MediaTek Dimensity 700', '8 GB', '128 GB', '2 Nano SIM (SIM 2 chung khe thẻ nhớ)Hỗ trợ 5G', '5000 mAh', '18 W', 'vivo-y72-5g', '2022-01-12 09:15:00'),
(200, 'SP00045', 'Realme 6', 73, 37, 100, 100, '<p>Realme 6 l&agrave; chiếc điện thoại gi&aacute; tốt, nhưng mang trong m&igrave;nh nhiều t&iacute;nh năng hiện đại như cụm 4 camera chụp ảnh &quot;chất&quot;, m&agrave;n h&igrave;nh si&ecirc;u mượt 90 Hz c&ugrave;ng hiệu năng ổn định.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/realme-6-tgdd3-1.jpg\" style=\"height:493px; width:740px\" /></p>\r\n', 0, 5990000, 5000000, 'ABC', '0deefd95ca.jpg', 'IPS LCD, 6.5\", HD+', 'Android 10', 'Chính 64 MP & Phụ 8 MP, 2 MP, 2 MP', '16 MP', 'MediaTek Helio G90T', '4 GB', '128 GB', '2 Nano SIM, Hỗ trợ 4G', '4300 mAh', '30 W', 'realme-6', '2022-01-12 09:18:38'),
(201, 'SP00046', 'Samsung Galaxy A12 4GB (2021)', 73, 24, 100, 100, '<p>Galaxy A12 2021 chiếc điện thoại th&ocirc;ng minh gi&aacute; rẻ đến từ thương hiệu Samsung, n&oacute; sở hữu một cấu h&igrave;nh ổn định c&ugrave;ng với vi&ecirc;n pin dung lượng lớn 5000 mAh đ&aacute;p ứng đa dạng nhu cầu sử dụng của người ti&ecirc;u d&ugrave;ng.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/samsung-galaxy-a12-2021-2.jpg\" style=\"height:414px; width:740px\" />Samsung Galaxy A12 (2021) chắc chắn l&agrave; chiếc smartphone gi&aacute; rẻ mang đến cho người d&ugrave;ng những trải nghiệm th&uacute; vị với vi&ecirc;n pin 5000 mAh, m&agrave;n h&igrave;nh 6.5 inch v&agrave; chip Exynos 850 8 nh&acirc;n c&oacute; khả năng xử l&yacute; mượt m&agrave; mọi t&aacute;c vụ thường nhật.</p>\r\n', 0, 4290000, 3500000, 'ABC', '6658482961.jpg', 'PLS LCD, 6.5\", HD+', 'Android 11', 'Chính 48 MP & Phụ 5 MP, 2 MP, 2 MP', '8 MP', 'Exynos 850', '4 GB', '128 GB', '2 Nano SIM, Hỗ trợ 4G', '5000 mAh', '15 W', 'samsung-galaxy-a12-2021', '2022-01-12 09:24:21');
INSERT INTO `tb_sanpham` (`id_sanpham`, `ma_sanpham`, `ten_sanpham`, `id_danhmuc`, `id_loaisanpham`, `soluong_nhap`, `soluong`, `mota_sanpham`, `type_sanpham`, `giaban`, `giagoc`, `ncc`, `hinhanh_sanpham`, `manhinh`, `hedieuhanh`, `cam_sau`, `cam_truoc`, `chip`, `ram`, `rom`, `sim`, `pin`, `sac`, `url_product`, `ngay_them`) VALUES
(202, 'SP00047', 'iPad Pro M1 12.9 inch WiFi Cellular', 74, 38, 100, 99, '<p>Bạn c&oacute; đang mong chờ những sản phẩm chất lượng đến từ Apple? Sau h&agrave;ng loạt c&aacute;c sản phẩm đ&igrave;nh đ&aacute;m như iPhone 12 series th&igrave; h&atilde;ng đ&atilde; tung ra chiếc iPad Pro M1 12.9 inch Wifi Cellular 128GB (2021) trang bị những t&iacute;nh năng ng&agrave;y c&agrave;ng vượt trội v&agrave; thời thượng.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/ipad-pro-m1-129-inch-01.jpg\" style=\"height:493px; width:740px\" />iPad Pro M1 12.9 inch Wifi Cellular 128GB (2021) sẽ l&agrave; một chiếc m&aacute;y t&iacute;nh bảng mạnh mẽ, tiện dụng v&agrave; gi&uacute;p &iacute;ch cho người d&ugrave;ng trong nhiều hoạt động nhất c&oacute; thể. Bạn c&oacute; thể học online, xem phim, thiết kế đồ họa, chơi game,... tr&ecirc;n một m&agrave;n h&igrave;nh rộng thoải m&aacute;i hơn rất nhiều so với smartphone th&ocirc;ng thường.</p>\r\n', 1, 35690000, 34000000, 'AAA', '0bd9e90af5.jpg', '12.9\", Liquid Retina XDR mini-LED LCD', 'iPadOS 15', 'Chính 12 MP & Phụ 10 MP, TOF 3D LiDAR', '12 MP', 'Apple M1 8 nhân', '8 GB', '128 GB', '1 Nano SIM hoặc 1 eSIM, Hỗ trợ 5G', '40.88 Wh (~ 10.835 mAh)', '20 W', 'ipad-pro-m1-129-inch-wifi-cellular', '2022-01-12 09:43:46'),
(203, 'SP00048', 'Huawei MatePad 128GB', 74, 41, 100, 100, '<p>Sở hữu thiết kế cao cấp, giải tr&iacute; b&ugrave;ng nổ với m&agrave;n h&igrave;nh si&ecirc;u lớn v&agrave; d&agrave;n &acirc;m thanh v&ograve;m 4 loa cực kỳ sống động, được t&ugrave;y chọn bộ nhớ trong si&ecirc;u khủng 128 GB, m&aacute;y t&iacute;nh bảng Huawei MatePad sẽ l&agrave; một lựa chọn ho&agrave;n hảo cho mọi nhu cầu của bạn d&ugrave; c&ocirc;ng việc hay vui chơi.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/huawei-matepad-128gb-001.jpg\" style=\"height:493px; width:740px\" />Những g&igrave; Huawei MatePad mang đến l&agrave; vượt ngo&agrave;i mong đợi so với gi&aacute; b&aacute;n, một thiết bị đ&aacute;p ứng tốt nhu cầu của người d&ugrave;ng. Chiếc tablet n&agrave;y d&agrave;nh cho những ai thường xuy&ecirc;n x&ecirc; dịch, l&agrave;m c&aacute;c c&ocirc;ng việc s&aacute;ng tạo đang cần t&igrave;m một thiết bị gọn nhẹ c&oacute; thể mang đi v&agrave; sẵn s&agrave;ng sử dụng bất cứ l&uacute;c n&agrave;o.</p>\r\n', 0, 7790000, 7000000, 'AAA', '23e310ad0b.jpg', '10.4\", IPS LCD', 'Android 10 (Không có Google)', '8 MP', '8 MP', 'Kirin 820 8 nhân', '4 GB', '128 GB', '', '7250 mAh', '22.5 W', 'huawei-matepad-128gb', '2022-01-12 10:05:01'),
(205, 'SP00049', 'Huawei MatePad 11', 74, 41, 100, 99, '<p>MatePad 11 - chiếc m&aacute;y t&iacute;nh bảng đến từ nh&agrave; Huawei với lối thiết kế tối giản nhưng vẫn to&aacute;t l&ecirc;n vẻ sang trọng, sở hữu trong m&igrave;nh cấu h&igrave;nh mạnh mẽ, m&agrave;n h&igrave;nh lớn c&ugrave;ng một vi&ecirc;n pin tr&acirc;u c&oacute; thể đ&aacute;p ứng được hầu hết c&aacute;c t&aacute;c vụ l&agrave;m việc, học tập hay giải tr&iacute;.<img alt=\"\" src=\"/ckfinder/userfiles/files/huawei-matepad-11-3.jpg\" style=\"height:414px; width:740px\" /></p>\r\n\r\n<p>Với m&agrave;n h&igrave;nh lớn, cấu h&igrave;nh mạnh mẽ MatePad 11 l&agrave; chiếc m&aacute;y t&iacute;nh bảng đ&aacute;p ứng tốt hầu hết nhu cầu bạn cần ở một thiết bị di động, c&ugrave;ng mức gi&aacute; tốt ch&iacute;nh l&agrave; yếu tố được nhiều người tin tưởng v&agrave; chọn lựa l&agrave;m c&aacute;c c&ocirc;ng việc s&aacute;ng tạo hay d&ugrave;ng để giải tr&iacute; với trọng lượng gọn nhẹ c&oacute; thể mang đi, sẵn s&agrave;ng sử dụng bất cứ l&uacute;c n&agrave;o.</p>\r\n', 1, 12990000, 11500000, 'AAA', 'cf3c2f9da9.jpg', '10.9\", IPS LCD', 'HarmonyOS 2.0', '13 MP', '8 MP', 'Snapdragon 865 8 nhân', '6 GB', '128 GB', '', '7250 mAh', '18 W', 'huawei-matepad-11', '2022-01-12 10:25:42'),
(206, 'SP00050', 'Huawei MatePad T10s', 74, 41, 100, 100, '<p>Chiếc m&aacute;y t&iacute;nh bảng của Huawei, Huawei MatePad T10s được nhiều người ưa chuộng khi sở hữu thiết kế tinh tế với m&agrave;n h&igrave;nh lớn c&ugrave;ng bộ vi xử l&yacute; 8 nh&acirc;n mở ra một thế giới giải tr&iacute; mượt m&agrave;, sống động qua từng khung h&igrave;nh, l&agrave; một sự lựa chọn l&yacute; tưởng trong tầm gi&aacute; m&agrave; bất kỳ ai cũng kh&ocirc;ng n&ecirc;n bỏ lỡ.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/huawei-matepad-t10s-4gb-6.jpg\" style=\"height:493px; width:740px\" />MatePad T10s l&agrave; chiếc m&aacute;y t&iacute;nh bảng l&agrave;m ra để h&agrave;i l&ograve;ng tất cả mọi người từ học sinh, nh&acirc;n vi&ecirc;n văn ph&ograve;ng, trẻ em, người lớn tuổi đều sẽ y&ecirc;u th&iacute;ch mỗi l&uacute;c sử dụng khi&nbsp;đ&aacute;p ứng tốt mọi nhu cầu ở một chiếc m&aacute;y t&iacute;nh bảng từ giải tr&iacute; cho đến c&ocirc;ng việc m&agrave; bạn cần&nbsp;nhưng chỉ sở hữu&nbsp;một mức gi&aacute; phải chăng dễ tiếp cận.</p>\r\n', 0, 5990000, 4500000, 'AAA', '73bca66c35.jpg', '', '', '', '', '', '', '', '', '', '', 'huawei-matepad-t10s', '2022-01-12 10:28:03'),
(207, 'SP00051', 'Huawei MatePad T10', 74, 41, 100, 100, '<p>Huawei MatePad T10 l&agrave; một chiếc m&aacute;y t&iacute;nh bảng c&oacute; hiệu năng mạnh mẽ, m&agrave;n h&igrave;nh lớn, đa năng với c&aacute;c t&iacute;nh năng bảo vệ người d&ugrave;ng, một lựa chọn th&uacute; vị với những người muốn t&igrave;m kiếm một chiếc m&aacute;y t&iacute;nh bảng gi&aacute; mềm d&agrave;nh cho gia đ&igrave;nh.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/huawei-matepad-t101.jpg\" style=\"height:493px; width:740px\" />Huawei MatePad T10 l&agrave; m&aacute;y t&iacute;nh bảng c&oacute; thiết kế gọn g&agrave;ng v&agrave; được ho&agrave;n thiện chỉn chu, hiệu năng tốt, thời lượng pin ấn tượng v&agrave; gi&aacute; mềm phải chằng, hỗ trợ đầy đủ c&aacute;c t&iacute;nh năng cho mọi gia đ&igrave;nh.</p>\r\n', 0, 4990000, 3500000, 'AAA', '462d2a5c26.jpg', '', '', '', '', '', '', '', '', '', '', 'huawei-matepad-t10', '2022-01-12 10:32:11'),
(208, 'SP00052', 'Xiaomi Pad 5 128GB', 74, 42, 100, 100, '<p>Xiaomi&nbsp;đ&atilde; mang d&ograve;ng&nbsp;m&aacute;y t&iacute;nh bảng&nbsp;quay trở lại sau một thời gian d&agrave;i vắng b&oacute;ng bằng việc ra mắt&nbsp;Xiaomi Pad 5. Sản phẩm n&agrave;y được trang bị một thiết kế hiện đại c&ugrave;ng h&agrave;ng loạt n&acirc;ng cấp về cấu h&igrave;nh v&agrave; c&aacute;c t&iacute;nh năng hữu &iacute;ch.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/xiaomi-pad-5-21.jpg\" style=\"height:414px; width:740px\" />Với những đột ph&aacute; trong thiết kế, cấu h&igrave;nh v&agrave; hiệu năng cực kỳ mạnh mẽ. Xiaomi Pad 5 l&agrave; một si&ecirc;u phẩm rất đ&aacute;ng để mua, chắc chắn sẽ l&agrave;m h&agrave;i l&ograve;ng bất kỳ c&aacute;c kh&aacute;ch h&agrave;ng kh&oacute; t&iacute;nh nhất.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1, 8990000, 8000000, 'AAA', 'ca91608b25.jpg', '11\", IPS LCD', 'Android 11', '13 MP', '8 MP', 'Snapdragon 860 8 nhân', '6 GB', '128 GB', '', '8720 mAh', '33 W', 'xiaomi-pad-5', '2022-01-12 10:39:33'),
(209, 'SP00053', 'Xiaomi Pad 5 256GB', 74, 42, 100, 100, '<p>Xiaomi cho ra mắt Xiaomi Pad 5 256GB, chiếc m&aacute;y t&iacute;nh bảng c&oacute; thiết kế mỏng nhẹ, thời trang c&ugrave;ng cấu h&igrave;nh h&agrave;ng đầu đ&aacute;p ứng hết c&aacute;c nhu cầu của bạn, d&ugrave; l&agrave; học tập, giải tr&iacute; hay l&agrave;m việc đều trở n&ecirc;n v&ocirc; c&ugrave;ng trơn tru.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/xiaomi-pad-5-21.jpg\" style=\"height:414px; width:740px\" />Với thiết kế sang trọng, ngoại h&igrave;nh bắt mắt c&ugrave;ng hiệu năng cao, Xiaomi Pad 5 được đ&aacute;nh gi&aacute; l&agrave; một trong những mẫu m&aacute;y t&iacute;nh bảng Android h&agrave;ng đầu ở thời điểm hiện tại. C&ugrave;ng một mức gi&aacute; v&ocirc; c&ugrave;ng hấp dẫn, sản phẩm n&agrave;y đ&aacute;p ứng đủ nhu cầu sử dụng l&agrave; việc giải tr&iacute; hay gaming của mọi đối tượng người d&ugrave;ng, hứa hẹn sẽ l&agrave; cơn sốt trong thời gian sắp tới.</p>\r\n', 1, 10490000, 9500000, 'AAA', 'ca2e19aaa8.jpg', '11', 'Android 11', '13 MP', '8 MP', 'Snapdragon 860 8 nhân', '6 GB', '256 GB', '', '8720 mAh', '33 W', 'xiaomi-pad-5-256gb', '2022-01-12 10:44:29'),
(210, 'SP00054', 'Samsung Galaxy Tab S7', 74, 39, 100, 99, '<p>Samsung Galaxy Tab S7 chiếc m&aacute;y t&iacute;nh bảng c&oacute; thiết kế tuyệt đẹp, m&agrave;n h&igrave;nh 120 Hz si&ecirc;u mượt, camera k&eacute;p ấn tượng, b&uacute;t S Pen c&ugrave;ng một hiệu năng mạnh mẽ thuộc top đầu thị trường m&aacute;y t&iacute;nh bảng Android.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/samsung-galaxy-tab-s7-800x533.jpg\" style=\"height:493px; width:740px\" />Galaxy Tab S7 thực sự l&agrave; một đối thủ đ&aacute;ng gờm tr&ecirc;n thị trường m&aacute;y t&iacute;nh bảng hiện tại. Chiếc m&aacute;y t&iacute;nh bảng n&agrave;y sở hữu m&agrave;n h&igrave;nh tuyệt đẹp với tốc độ l&agrave;m mới 120Hz si&ecirc;u mượt, thời lượng pin tốt c&ugrave;ng những cải tiến b&uacute;t S Pen v&agrave; hiệu năng si&ecirc;u khủng, mang lại năng suất l&agrave;m việc v&agrave; giải tr&iacute; cao hơn. Nếu bạn đ&atilde; quen thuộc sử dụng c&aacute;c m&aacute;y t&iacute;nh bảng Android th&igrave; Galaxy Tab S7 trong năm 2020 l&agrave; chiếc m&aacute;y kh&ocirc;ng thể bỏ qua.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1, 18990000, 18000000, 'AAA', 'b735362ba3.jpg', '11\", LTPS IPS LCD', 'Android 10', 'Chính 13 MP & Phụ 5 MP', '8 MP', 'Snapdragon 865+', '6 GB', '128 GB', '1 Nano SIM (chung thẻ nhớ)', '8000 mAh', '45 W', 'samsung-galaxy-tab-s7', '2022-01-12 10:56:30'),
(211, 'SP00055', 'Samsung Galaxy Tab S6 Lite', 74, 39, 100, 100, '<p>Sau th&agrave;nh c&ocirc;ng của Galaxy Tab S6, Samsung tiếp tục chinh phục người d&ugrave;ng với Galaxy Tab S6 Lite c&oacute; ph&acirc;n kh&uacute;c gi&aacute; rẻ hơn. Thiết bị vẫn hỗ trợ b&uacute;t S Pen thần th&aacute;nh, thiết kế kim loại cao cấp v&agrave; m&agrave;n h&igrave;nh, &acirc;m thanh giải tr&iacute; đỉnh cao.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/samsung-galaxy-tab-s6-lite4-1.jpg\" style=\"height:493px; width:740px\" />Thiết bị dễ d&agrave;ng đ&aacute;p ứng tốt nhu cầu sử dụng xem phim, lướt web hay chơi c&aacute;c tựa game phổ biến tr&ecirc;n di động như Call of Duty hay Gunny...</p>\r\n\r\n<p>Ngo&agrave;i ra Tab S6 Lite cũng hỗ trợ SIM nghe gọi như một chiếc smartphone thực thụ v&agrave; khả năng kết nối 4G nhanh ch&oacute;ng.</p>\r\n', 1, 9900000, 9000000, 'AAA', 'd1e39e5cda.jpg', '10.4\", IPS LCD', 'Android 10', '8 MP', '5 MP', 'Exynos 9611', '4 GB', '64 GB', '1 Nano SIM', '7040 mAh', '10 W', 'samsung-galaxy-tab-s6-lite', '2022-01-12 11:10:30'),
(212, 'SP00056', 'iPad Pro M1 11 inch WiFi Cellular 128GB (2021)', 74, 38, 100, 100, '<p>iPad Pro M1 11 inch Wifi Cellular 128GB (2021) sở hữu hiệu năng mạnh mẽ bậc nhất cho mọi trải nghiệm b&ugrave;ng nổ. Chiếc m&aacute;y t&iacute;nh bảng hội tụ đầy đủ những c&ocirc;ng nghệ h&agrave;ng đầu của Apple, mang đến nhiều cảm hứng s&aacute;ng tạo v&agrave; biến mọi &yacute; tưởng của bạn trở th&agrave;nh hiện thực.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/ipad-pro-m1-11-inch-01.jpg\" style=\"height:493px; width:740px\" />Nhờ được trang bị vi xử l&yacute; M1 cực khủng v&agrave; m&agrave;n h&igrave;nh hiển thị h&agrave;ng đầu, iPad Pro M1 11 inch WiFi Cellular 128GB (2021) mang đến những trải nghiệm vượt trội, đ&aacute;p ứng tốt cho nhu cầu giải tr&iacute; lẫn những c&ocirc;ng việc ở mức độ chuy&ecirc;n nghiệp hơn cho người d&ugrave;ng.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1, 28490000, 27000000, 'AAA', '3ab7a5f692.jpg', '11\", Liquid Retina', 'iPadOS 15', 'Chính 12 MP & Phụ 10 MP, TOF 3D LiDAR', '12 MP', 'Apple M1 8 nhân', '8 GB', '128 GB', '1 Nano SIM hoặc 1 eSIM, Hỗ trợ 5G', '28.65 Wh (~ 7538 mAh)', '20 W', 'ipad-pro-m1-11-inch-wifi-cellular-128gb-2021', '2022-01-12 13:08:37'),
(213, 'SP00057', 'iPad Air 4 Wifi Cellular 64GB (2020)', 74, 38, 100, 100, '<p>Trong sự kiện Time Flies, Apple đ&atilde; giới thiệu đến người d&ugrave;ng chiếc iPad Air 4 Wifi Cellular 64GB (2020) với thiết kế tương tự iPad Pro, ngoại h&igrave;nh của Air 4 đ&atilde; được l&agrave;m mới so với thế hệ iPad Air 3, cấu h&igrave;nh được n&acirc;ng cấp mạnh mẽ c&ugrave;ng với nhiều cải tiến đ&aacute;ng gi&aacute;.<img alt=\"\" src=\"/ckfinder/userfiles/files/ipad-air-4-wifi-cellular-64gb-2020-233320-043332.jpg\" style=\"height:493px; width:740px\" />Sự ra mắt v&agrave; cải tiến của iPad Air 4 giống như một phi&ecirc;n bản thu nhỏ của iPad Pro, nhờ đ&oacute;, những người y&ecirc;u th&iacute;ch thiết kế, t&iacute;nh năng tiện lợi của iPad Pro nay lại c&oacute; th&ecirc;m một lựa chọn kh&aacute;c gi&aacute; mềm hơn ch&iacute;nh l&agrave; iPad Air 4.</p>\r\n', 1, 29900000, 21000000, 'AAA', 'a68068e683.jpg', '10.9\", Liquid Retina', 'iPadOS 15', '12 MP', '7 MP', 'Apple A14 Bionic', '4 GB', '64 GB', '1 Nano SIM & 1 eSIM, Hỗ trợ 4G', '28.65 Wh (~ 7600 mAh)', '20 W', 'ipad-air-4-wifi-cellular-64gb-2020', '2022-01-12 13:14:56'),
(214, 'SP00058', 'iPad mini 6 WiFi Cellular 64GB', 74, 38, 100, 99, '<p>iPad mini 6 WiFi Cellular 64GB đ&aacute;nh dấu sự trở lại mạnh mẽ của Apple tr&ecirc;n d&ograve;ng sản phẩm iPad mini, thiết bị mới được người d&ugrave;ng y&ecirc;u th&iacute;ch bởi thiết kế trẻ trung, hiệu suất đỉnh cao với con chip A15 Bionic v&agrave; hỗ trợ b&uacute;t cảm ứng Apple Pencil 2 tiện lợi.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/ipad-mini-6-wifi-cellular-64gb-4.jpg\" style=\"height:414px; width:740px\" />iPad mini 6 thực sự l&agrave; một sản phẩm hội tụ đầy đủ c&aacute;c t&iacute;nh năng của một chiếc m&aacute;y t&iacute;nh bảng h&agrave;ng đầu hiện nay. V&agrave; nếu bạn đang c&oacute; nhu cầu mua cho m&igrave;nh một chiếc m&aacute;y t&iacute;nh bảng iPad nhỏ gọn để phục vụ cho nhu cầu sử dụng l&agrave;m việc online th&igrave; iPad mini 6 sẽ l&agrave; sự lựa chọn ho&agrave;n hảo cho bạn v&agrave;o thời điểm n&agrave;y.</p>\r\n', 1, 20990000, 20000000, 'AAA', '0a7ad689e1.jpg', '8.3\", LED-backlit IPS LCD', 'iPadOS 15', '12 MP', '12 MP', 'Apple A15 Bionic', '4 GB', '64 GB', '1 Nano SIM & 1 eSIM, Hỗ trợ 5G', '19.3 Wh', '20 W', 'ipad-mini-6-wifi-cellular-64gb', '2022-01-12 13:18:59'),
(215, 'SP00059', 'iPad mini 7.9 inch Wifi Cellular 64GB (2019)', 74, 38, 100, 100, '<p>iPad mini 7.9 inch Wifi Cellular 64GB (2019) đ&aacute;nh dấu sự trở lại mạnh mẽ của Apple trong ph&acirc;n kh&uacute;c m&aacute;y t&iacute;nh bảng nhỏ gọn, c&oacute; thể dễ d&agrave;ng mang theo b&ecirc;n m&igrave;nh.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/ipad-mini-79-inch-wifi-cellular-64gb-2019-092120-032128.jpg\" style=\"height:493px; width:740px\" /></p>\r\n\r\n<p>Nhờ việc tối ưu h&oacute;a hiệu quả n&ecirc;n việc để thiết bị qua đ&ecirc;m cũng sẽ kh&ocirc;ng khiến bạn tốn qu&aacute; nhiều dung lượng pin.</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute; m&aacute;y vẫn giữ lại cho ch&uacute;ng ta jack cắm tai nghe 3.5mm quen thuộc gi&uacute;p bạn dễ d&agrave;ng vừa c&oacute; thể nghe nhạc v&agrave; vừa c&oacute; thể sạc pin.</p>\r\n', 0, 15990000, 15000000, 'AAA', '30a914d7f4.jpg', '7.9\", LED-backlit IPS LCD', 'iPadOS 15', '8 MP', '7 MP', 'Apple A12 Bionic', '3 GB', '64 GB', '1 Nano SIM & 1 eSIM, Hỗ trợ 4G', '19.1 Wh (~ 5124 mAh)', '10 W', 'ipad-mini-79-inch-wifi-cellular-64gb-2019', '2022-01-12 13:23:38'),
(216, 'SP00060', 'iPad 9 WiFi Cellular 64GB', 74, 38, 100, 100, '<p>Sau th&agrave;nh c&ocirc;ng của iPad 8 th&igrave; Apple đ&atilde; tung ra chiếc iPad 9 WiFi Cellular 64GB với những trang bị ng&agrave;y c&agrave;ng vượt trội v&agrave; phong c&aacute;ch thiết kế đậm chất iPad 10.2 Series, đ&acirc;y sẽ l&agrave; mẫu m&aacute;y t&iacute;nh bảng đ&aacute;ng c&acirc;n nhắc trong ph&acirc;n kh&uacute;c gi&aacute;.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/ipad-9-wifi-cellular-64gb-10.jpg\" style=\"height:414px; width:740px\" />iPad 9 WiFi Cellular 64GB sẽ l&agrave; một chiếc m&aacute;y t&iacute;nh bảng mạnh mẽ, thiết kế sang trọng c&ugrave;ng nhiều t&iacute;nh năng tiện dụng hỗ trợ bạn trong nhiều hoạt động. Bạn c&oacute; thể d&ugrave;ng n&oacute; để học online, xem phim, thiết kế đồ họa,...&nbsp;</p>\r\n', 0, 14990000, 14000000, 'AAA', '9914c4a623.jpg', '10.2\", Retina IPS LCD', 'iPadOS 15', '8 MP', '12 MP', 'Apple A13 Bionic 6 nhân', '3 GB', '64 GB', '1 Nano SIM & 1 eSIM, Hỗ trợ 4G', '32.4 Wh (~ 8600 mAh)', '20 W', 'ipad-9-wifi-cellular-64gb', '2022-01-12 13:27:57'),
(217, 'SP00061', 'iPhone 12 64GB', 73, 23, 100, 100, '<p>Trong những th&aacute;ng cuối năm 2020, Apple đ&atilde; ch&iacute;nh thức giới thiệu đến người d&ugrave;ng cũng như iFan thế hệ iPhone 12 series mới với h&agrave;ng loạt t&iacute;nh năng bứt ph&aacute;, thiết kế được lột x&aacute;c ho&agrave;n to&agrave;n, hiệu năng đầy mạnh mẽ v&agrave; một trong số đ&oacute; ch&iacute;nh l&agrave; iPhone 12 64GB.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/iphone-12-13.jpg\" style=\"height:493px; width:740px\" />Sự lột x&aacute;c đầy mạnh mẽ lần n&agrave;y của Apple kh&ocirc;ng chỉ g&acirc;y bất ngờ đến người d&ugrave;ng m&agrave; c&ograve;n đ&aacute;nh dấu một kỷ nguy&ecirc;n mới trong nền ph&aacute;t triển smartphone Apple. V&agrave; đ&acirc;y cũng được xem l&agrave; một trong những bộ series iPhone m&agrave; Apple đặt nhiều t&acirc;m huyết, mục đ&iacute;ch v&agrave; đầy t&iacute;nh năng mạnh mẽ chưa từng thấy.</p>\r\n', 0, 19390000, 18000000, 'ABC', '54fceb4536.jpg', 'OLED, 6.1', 'iOS 15', '2 camera 12 MP', '12 MP', 'Apple A14 Bionic', '4 GB', '64 GB', '1 Nano SIM & 1 eSIM, Hỗ trợ 5G', '2815 mAh', '20 W', 'iphone-12', '2022-01-12 13:36:58'),
(218, 'SP00062', 'iPhone 13 Pro 128GB', 73, 23, 100, 98, '<p>Mỗi lần ra mắt phi&ecirc;n bản mới l&agrave; mỗi lần iPhone chiếm s&oacute;ng tr&ecirc;n khắp c&aacute;c mặt trận v&agrave; lần n&agrave;y c&aacute;i t&ecirc;n khiến v&ocirc; số người &quot;sục s&ocirc;i&quot; l&agrave; iPhone 13 Pro, chiếc điện thoại th&ocirc;ng minh vẫn giữ nguy&ecirc;n thiết kế cao cấp, cụm 3 camera được n&acirc;ng cấp, cấu h&igrave;nh mạnh mẽ c&ugrave;ng thời lượng pin lớn ấn tượng.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/iphone-13-pro-6.jpg\" style=\"height:472px; width:740px\" /></p>\r\n\r\n<p>Dung lượng pin tr&ecirc;n iPhone lu&ocirc;n thấp hơn khi so với c&aacute;c d&ograve;ng m&aacute;y Android nhưng việc trang bị chipset mới c&ugrave;ng sự tối ưu ho&aacute; của hệ điều h&agrave;nh sẽ đảm bảo thời lượng sử dụng kh&ocirc;ng hề thua k&eacute;m tr&ecirc;n sản phẩm Android, thậm ch&iacute; c&ograve;n c&oacute; thể vượt trội hơn.&nbsp;</p>\r\n\r\n<p>iPhone 13 Pro với thiết kế cứng c&aacute;p, sang trọng c&ugrave;ng khả năng nhiếp ảnh ấn tượng, sẽ l&agrave; một sản phẩm phục vụ tốt c&aacute;c nhu cầu của bạn cũng như l&agrave; một m&oacute;n đồ thời trang hiện đại.</p>\r\n', 1, 30990000, 29500000, 'ABC', 'd8cce097bc.jpg', 'OLED, 6.1\", Super Retina XDR', 'iOS 15', '3 camera 12 MP', '12 MP', 'Apple A15 Bionic', '6 GB', '128 GB', '1 Nano SIM & 1 eSIM, Hỗ trợ 5G', '3095 mAh', '20 W', 'iphone-13-pro', '2022-01-12 13:46:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_thongke`
--

CREATE TABLE `tb_thongke` (
  `id` int(11) NOT NULL,
  `id_donhang` int(11) UNSIGNED NOT NULL,
  `ngay_hoan_thanh` timestamp NOT NULL DEFAULT current_timestamp(),
  `doanh_thu` int(255) NOT NULL,
  `loi_nhuan` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_thongke`
--

INSERT INTO `tb_thongke` (`id`, `id_donhang`, `ngay_hoan_thanh`, `doanh_thu`, `loi_nhuan`) VALUES
(30, 101, '2022-01-18 07:03:17', 38980000, 1980000),
(31, 102, '2022-01-18 07:04:56', 65980000, 3980000),
(32, 103, '2022-01-18 07:12:17', 45980000, 3480000),
(33, 104, '2022-01-18 07:17:28', 39980000, 1980000),
(34, 106, '2022-01-18 07:33:48', 80680000, 2680000),
(35, 108, '2022-01-19 10:24:21', 24990000, 1990000),
(36, 110, '2022-01-22 02:50:47', 12990000, 1990000),
(37, 107, '2022-01-22 02:57:37', 67980000, 1980000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_thongtin_donhang`
--

CREATE TABLE `tb_thongtin_donhang` (
  `id` int(11) UNSIGNED NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `ma_donhang` varchar(255) NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `sdt` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tinh_thanhpho` varchar(255) NOT NULL,
  `quan_huyen` varchar(255) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `ghichu` varchar(255) NOT NULL,
  `pt_thanhtoan` varchar(255) NOT NULL,
  `ngay_dat` timestamp NOT NULL DEFAULT current_timestamp(),
  `trangthai` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_thongtin_donhang`
--

INSERT INTO `tb_thongtin_donhang` (`id`, `customer_id`, `ma_donhang`, `ho_ten`, `sdt`, `email`, `tinh_thanhpho`, `quan_huyen`, `dia_chi`, `ghichu`, `pt_thanhtoan`, `ngay_dat`, `trangthai`) VALUES
(101, 1, '#1181202', 'abc', '0356897701', 'asda@1123', 'Hà Nội', 'Huyện Ba Vì', '144', '', 'Thanh toán khi nhận hàng', '2022-01-18 07:02:40', 6),
(102, 28, '#guest181204', 'Hùng NM', '0364231062', 'hunghayho15@gmail.com', 'Hà Nội', 'Huyện Ba Vì', '6 ngõ 15', '', 'Thanh toán khi nhận hàng', '2022-01-18 07:04:19', 6),
(103, 30, '#guest181210', 'Hùng 1', '0356895555', 'hungnm72@fsoft.com', 'Thành phố Hồ Chí Minh', 'Quận 5', 'abc', '', 'Paypal', '2022-01-18 07:10:05', 6),
(104, 2, '#2181216', 'xyz', '0365608785', 'hung@123', 'Bình Thuận', 'Huyện Tánh Linh', '123123123', '', 'Paypal', '2022-01-18 07:16:52', 6),
(105, 2, '#2181219', 'xyz', '0365608785', 'hung@123', 'Bình Thuận', 'Huyện Tánh Linh', '123123123', '', 'Paypal', '2022-01-18 07:19:05', 1),
(106, 31, '#guest181233', 'Hùng 1', '0989280555', 'hunghayho15@gmail.com', 'Hải Phòng', 'Quận Ngô Quyền', 'abc', '', 'Thanh toán khi nhận hàng', '2022-01-18 07:33:21', 6),
(107, 32, '#guest191902', 'Thu Uyên', '0986592968', 'uyenconuong2000@gmail.com', 'Hà Nội', 'Huyện Ba Vì', 'Cụm 14 - Vân Sa 2', '', 'Thanh toán khi nhận hàng', '2022-01-19 02:02:02', 6),
(108, 33, '#33191523', 'Nguyễn B', '0987987987', 'abc@gmail.com', 'Vĩnh Phúc', 'Thành phố Vĩnh Yên', 'số 15 ngõ 7 ...', '', 'Thanh toán khi nhận hàng', '2022-01-19 10:23:56', 6),
(109, 34, '#guest201407', 'Hùng', '0365608785', 'hung15@gmail.com.vn', 'Thái Nguyên', 'Huyện Phổ Yên', 'KTX B', '', 'Paypal', '2022-01-20 09:07:50', 0),
(110, 28, '#guest2111046', 'Hùng NM', '0364231062', 'hunghayho15@gmail.com', 'Hà Nội', 'Huyện Ba Vì', '6 ngõ 15', '', 'Thanh toán khi nhận hàng', '2022-01-21 15:46:00', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_tintuc`
--

CREATE TABLE `tb_tintuc` (
  `id` int(11) NOT NULL,
  `tacgia` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `noidung` longtext NOT NULL,
  `url_tintuc` varchar(255) NOT NULL,
  `ngay_dang` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_tintuc`
--

INSERT INTO `tb_tintuc` (`id`, `tacgia`, `title`, `img`, `noidung`, `url_tintuc`, `ngay_dang`, `type`) VALUES
(1, 'Le Thu', 'Apple phát hành iOS 15.2.1 và iPadOS 15.2.1 để sửa lỗi quan trọng, cập nhật ngay nếu bạn cần!', '155d2269c5.jpeg', '<p>H&ocirc;m nay, Apple đ&atilde; ph&aacute;t h&agrave;nh&nbsp;iOS 15.2.1 v&agrave; iPadOS 15.2 để sửa một số lỗi m&agrave; người d&ugrave;ng ph&agrave;n n&agrave;n. Nếu c&oacute; nhu cầu, bạn c&oacute; thể n&acirc;ng cấp ngay ở phần c&agrave;i đặt.</p>\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/4aa37bb027-e1642040593408-696x365.jpeg\" style=\"height:533px; width:800\" /></p>\r\n<h2><strong>iOS 15.2.1 v&agrave; iPadOS 15.2.1 được tung ra để sửa lỗi quan trọng</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Đ&acirc;y l&agrave; một bản cập nhật nhỏ nh&agrave; T&aacute;o khuyết tung ra cho người d&ugrave;ng&nbsp;iPhone v&agrave; iPad sau khi iOS 15.2 ra mắt được khoảng 1 th&aacute;ng.</p>\r\n\r\n<p>Theo ghi ch&uacute; ph&aacute;t h&agrave;nh của Apple, iOS 15.2.1 v&agrave; iPadOS 15.2.1 đ&atilde; giải quyết được 1 số lỗi quan trọng về bảo mật. Đ&oacute; l&agrave; sự cố khiến Messages gửi qua iCloud Link kh&ocirc;ng tải được v&agrave; sửa lỗi ứng dụng CarPlay của b&ecirc;n thứ ba kh&ocirc;ng phản hồi với đầu v&agrave;o. Mặt kh&aacute;c, bản cập nhật mới cũng cải thiện hiệu năng tr&ecirc;n iPhone cũ để mang lại cho người d&ugrave;ng những trải nghiệm tốt hơn.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/apple-carplay-messages.jpeg\" style=\"height:450px; width:800px\" /></p>\r\n\r\n<p>Hiện tại, bản cập nhật iOS v&agrave; iPadOS 15.2.1 c&oacute; thể được tải xuống miễn ph&iacute; v&agrave; phần mềm c&oacute; sẵn tr&ecirc;n tất cả c&aacute;c thiết bị đủ điều kiện th&ocirc;ng qua ứng dụng C&agrave;i đặt. Để cập nhật phần mềm mới, bạn h&atilde;y truy cập tới<strong>&nbsp;C&agrave;i đặt -&gt;&nbsp;C&agrave;i đặt chung -&gt;&nbsp;Cập nhật phần mềm.</strong></p>\r\n\r\n<p>Ngo&agrave;i ra, iOS 15.3 cũng đang được Apple ph&aacute;t triển v&agrave; bổ sung th&ecirc;, những t&iacute;nh năng mới. Tuy nhi&ecirc;n, trước khi n&oacute; ra mắt, bạn c&oacute; thể cập nhật l&ecirc;n iOS 15.2.1 trước để sửa chữa những lỗi bảo mật.</p>\r\n', 'apple-phat-hanh-ios-15-2-1-va-ipados-15-2-1-de-sua-loi-quan-trong-cap-nhat-ngay-neu-ban-can', '2022-01-14 08:28:02', 0),
(2, 'Mai Finn', 'Không phải iPhone 14 Pro, iPhone 15 Pro mới được trang bị Face ID dưới màn hình', '9db63f7a7e.jpg', '<p>Tin đồn về việc iPhone 15 Pro mới được trang bị Face ID dưới m&agrave;n h&igrave;nh chứ kh&ocirc;ng phải iPhone 14 Pro như những đồn đo&aacute;n trước kia gần đ&acirc;y đ&atilde; thu h&uacute;t được nhiều sự ch&uacute; &yacute; từ cộng đồng iFan.</p>\r\n\r\n<h2><img alt=\"\" src=\"/ckfinder/userfiles/files/faceid-duoi-man-hinh-1-696x392.jpg\" style=\"height:533px; width:800px\" />iPhone 15 Pro sẽ được trang bị Face ID dưới m&agrave;n h&igrave;nh</h2>\r\n\r\n<p>Mới đ&acirc;y, Ross Young &ndash; nh&agrave; tư vấn ng&agrave;nh c&ocirc;ng nghiệp m&agrave;n h&igrave;nh cho biết rằng mẫu iPhone 14 Pro sẽ sở hữu 2 lỗ đục nằm ở cạnh tr&ecirc;n m&agrave;n h&igrave;nh với lỗ đục thứ 2 &ndash; nơi chứa Face ID sẽ c&oacute; thiết kế nhỏ hơn.</p>\r\n\r\n<p>Ở một b&agrave;i viết kh&aacute;c, Ross Young cũng tiết lộ rằng phần camera hồng ngoại sẽ kh&ocirc;ng được thiết kế xuống dưới m&agrave;n h&igrave;nh cho đến năm 2023 hoặc 2024. V&igrave; vậy, rất c&oacute; thể l&agrave; Face ID sẽ kh&ocirc;ng được đặt dưới m&agrave;n h&igrave;nh v&agrave; rất c&oacute; thể sẽ được trang bị cho iPhone 15 Pro hoặc iPhone 16 Pro. Trước đ&acirc;y, nh&agrave; ph&acirc;n t&iacute;ch Ming-Chi Kuo cũng từng đưa ra nhận định tương tự như vậy.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/faceid-duoi-man-hinh-2-696x391.jpg\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p>Với iPhone 14 Pro, đ&acirc;y sẽ l&agrave; một cải tiến lớn khi n&oacute; sẽ kh&ocirc;ng c&ograve;n sở hữu thiết kế notch quen thuộc như d&ograve;ng iPhone 13 nữa. H&atilde;y c&ugrave;ng đ&oacute;n chờ những si&ecirc;u phẩm mới n&agrave;y của Apple trong tương lai nh&eacute;!</p>\r\n', 'khong-phai-iphone-14-pro-iphone-15-pro-moi-duoc-trang-bi-face-id-duoi-man-hinh', '2022-01-14 13:08:44', 1),
(3, 'Ly Ly', 'Xiaomi MIX 5 trong concept mới nhất: Cụm camera siêu to khổng lồ tích hợp màn hình phụ phía sau', '5862461720.png', '<p>Sau nhiều năm tạm dừng, Xiaomi đ&atilde; tiếp tục giới thiệu d&ograve;ng Mi MIX thế hệ mới l&agrave; Mi MIX 4 v&agrave;o th&aacute;ng 8/2021. Giờ đ&acirc;y, những tin đồn v&agrave; concept của Xiaomi MIX 5 đ&atilde; bắt đầu xuất hiện.</p>\r\n\r\n<h2><img alt=\"\" src=\"/ckfinder/userfiles/files/concept-xiaomi-mix-5-1-696x393.png\" style=\"height:533px; width:800px\" /><strong>Concept Xiaomi MIX 5 mới nhất</strong></h2>\r\n\r\n<p>Một t&agrave;i khoản @HoiINDI tr&ecirc;n Twitter đ&atilde; chia sẻ h&igrave;nh ảnh concept tuyệt đẹp của Xiaomi MIX 5 cho thấy thiết kế, m&agrave;u sắc v&agrave; cụm camera ho&agrave;n to&agrave;n mới của sản phẩm. Theo đ&oacute;, chiếc smartphone n&agrave;y sẽ c&oacute; m&agrave;n h&igrave;nh tr&agrave;n viền cực đẹp.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/concept-xiaomi-mix-5-2.png\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p>Điểm đặc biệt nhất nằm ở camera ph&iacute;a sau với thiết kế h&igrave;nh tr&ograve;n si&ecirc;u to khổng lồ chiếm gần nửa mặt lưng. C&oacute; thể thấy hệ thống bốn camera c&ugrave;ng đ&egrave;n flash-LED xung quanh. Ngo&agrave;i ra, ph&iacute;a giữa của cụm camera c&ograve;n xuất hiện một m&agrave;n h&igrave;nh phụ kh&aacute; độc đ&aacute;o để hiển thị th&ocirc;ng b&aacute;o. Người d&ugrave;ng sẽ dễ d&agrave;ng xem c&aacute;c chi tiết cuộc gọi, tin nhắn cũng như một v&agrave;i th&ocirc;ng b&aacute;o kh&aacute;c th&ocirc;ng qua m&agrave;n h&igrave;nh phụ n&agrave;y.</p>\r\n\r\n<p>Chiếc Xiaomi MIX 4 trong concept c&ograve;n trang bị c&ocirc;ng nghệ camera selfie ẩn dưới m&agrave;n h&igrave;nh. Đ&acirc;y kh&ocirc;ng phải lần đầu ti&ecirc;n Xiaomi đưa c&ocirc;ng nghệ n&agrave;y l&ecirc;n điện thoại của m&igrave;nh. Chiếc Xiaomi Mi MIX 4 trước đ&oacute; cũng c&oacute; camera ẩn dưới m&agrave;n h&igrave;nh.</p>\r\n\r\n<p>H&igrave;nh ảnh concept của @HoilNDI gi&uacute;p ch&uacute;ng ta chi&ecirc;m ngưỡng cận cảnh thiết kế của Xiaomi MIX 5 đến từ tương lai.</p>\r\n', 'xiaomi-mix-5-trong-concept-moi-nhat-cum-camera-sieu-to-khong-lo-tich-hop-man-hinh-phu-phia-sau', '2022-01-14 13:33:03', 1),
(4, 'le Thu', 'Galaxy Z Flip3 5G sắp gặp “đối thủ đáng gờm” đến từ Motorola trên thị trường smartphone màn hình gập', '796f566f88.jpeg', '<p>C&aacute;ch đ&acirc;y kh&ocirc;ng l&acirc;u, gi&aacute;m đốc điều h&agrave;nh của Lenovo, Chen Jin đ&atilde; tiết lộ tr&ecirc;n Weibo rằng Motorola Razr thế hệ thứ ba đang được sản xuất. Giờ đ&acirc;y, th&ocirc;ng số kỹ thuật của sản phẩm m&agrave;n h&igrave;nh gập n&agrave;y đ&atilde; được r&ograve; rỉ tr&ecirc;n mạng.</p>\r\n\r\n<h2><img alt=\"\" src=\"/ckfinder/userfiles/files/razr-2020-a-696x348.jpeg\" style=\"height:533px; width:800px\" /></h2>\r\n\r\n<h2><strong>Motorola Razr 3 sẽ l&agrave; đối thủ của Samsung Galaxy ZFlip 3?</strong></h2>\r\n\r\n<p>Motorola Razr l&agrave; mẫu điện thoại th&ocirc;ng minh được lấy cảm hứng từ ch&iacute;nh d&ograve;ng sản phẩm nắp gập cổ điển của h&atilde;ng, được ra mắt lần đầu v&agrave;o 2019. Thời điểm đ&oacute;, Motorola Razr được trang bị chip Qualcomm Snapdragon 710. Sang đến phi&ecirc;n bản tiếp theo năm 2020, n&oacute; được n&acirc;ng cấp l&ecirc;n Snapdragon 765G nhưng kh&ocirc;ng để lại qu&aacute; nhiều ấn tượng. Thế nhưng, Motorola Razr 3 của 2022 được trang XDA Developers tiết lộ sẽ c&oacute; n&acirc;ng cấp đ&aacute;ng kể v&agrave; tốt hơn nhiều 2 thế hệ tiền nhiệm.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/motorola-razr-3-rumors-696x464.jpeg\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p>Theo b&aacute;o c&aacute;o r&ograve; rỉ, sản phẩm mới nh&agrave; Motorola sẽ được trang bị chipset h&agrave;ng đầu Snapdragon 8 Gen 1 v&agrave; chạy tr&ecirc;n hệ điều h&agrave;nh Android 12. Đ&acirc;y l&agrave; loại chip silicon mạnh nhất hiện nay của Qualcomm, đồng thời cũng l&agrave; một bước tiến lớn so với những thế hệ Motorola Razr trước đ&acirc;y. Ngo&agrave;i ra, chiếc smartphone m&agrave;n h&igrave;nh gập c&ograve;n đi k&egrave;m RAM 6, 8 hoặc 12GB v&agrave; bộ nhớ trong 128GB, 256GB hoặc 512GB.</p>\r\n\r\n<p>Kh&ocirc;ng những vậy, Motorola Razr 3 được cho l&agrave; sẽ hỗ trợ băng th&ocirc;ng si&ecirc;u rộng, đ&atilde; xuất hiện tr&ecirc;n c&aacute;c flagship như iPhone 13. Nếu những điều n&agrave;y l&agrave; ch&iacute;nh x&aacute;c th&igrave; n&oacute; c&oacute; thể sẽ trở th&agrave;nh đối thủ &ldquo;một ch&iacute;n một mười&rdquo; khi đặt l&ecirc;n b&agrave;n c&acirc;n với Galaxy Z Flip3 của Samsung.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'galaxy-z-flip3-5g-sap-gap-doi-thu-dang-gom-den-tu-motorola-tren-thi-truong-smartphone-man-hinh-gap', '2022-01-14 13:39:05', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_tk_khachhang`
--

CREATE TABLE `tb_tk_khachhang` (
  `id` int(11) UNSIGNED NOT NULL,
  `guest` int(255) NOT NULL,
  `taikhoan` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sdt` varchar(30) NOT NULL,
  `tinh_thanhpho` varchar(255) NOT NULL,
  `quan_huyen` varchar(255) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `ngay_dang_ky` timestamp NOT NULL DEFAULT current_timestamp(),
  `trang_thai` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_tk_khachhang`
--

INSERT INTO `tb_tk_khachhang` (`id`, `guest`, `taikhoan`, `matkhau`, `name`, `email`, `sdt`, `tinh_thanhpho`, `quan_huyen`, `dia_chi`, `ngay_dang_ky`, `trang_thai`) VALUES
(1, 0, 'hung151299', 'f5bb0c8de146c67b44babbf4e6584cc0', 'abc', 'asda@1123', '0356897701', 'Hà Nội', 'Huyện Ba Vì', '144', '2022-01-07 13:18:10', 0),
(2, 0, 'abc123123', 'f5bb0c8de146c67b44babbf4e6584cc0', 'xyz', 'hung@123', '036560878', 'Bình Thuận', 'Huyện Tánh Linh', '123123123', '2022-01-07 13:10:19', 1),
(27, 0, 'hung151299a', 'dba5bc218365924dc9c408740cae87af', 'Hùng NM', 'hunghayho15@gmail.com', '0364231062', 'Hà Nội', 'Huyện Ba Vì', '6 ngõ 15', '2022-01-17 10:32:46', 0),
(28, 364231062, '', '', 'Hùng NM', 'hunghayho15@gmail.com', '0364231062', 'Hà Nội', 'Huyện Ba Vì', '6 ngõ 15', '2022-01-17 10:39:15', 0),
(29, 356897701, '', '', 'Hùng NM', 'hunghayho15@gmail.com', '0356897701', 'Hà Nội', 'Quận Ba Đình', '6 ngõ 15, Vân Sa 2, Tản Hồng', '2022-01-17 18:06:09', 0),
(30, 356895555, '', '', 'Hùng 1', 'hungnm72@fsoft.com', '0356895555', 'Thành phố Hồ Chí Minh', 'Quận 5', 'abc', '2022-01-18 07:10:05', 0),
(31, 989280555, '', '', 'Hùng 1', 'hunghayho15@gmail.com', '0989280555', 'Hải Phòng', 'Quận Ngô Quyền', 'abc', '2022-01-18 07:33:20', 0),
(32, 986592968, '', '', 'Thu Uyên', 'uyenconuong2000@gmail.com', '0986592968', 'Hà Nội', 'Huyện Ba Vì', 'Cụm 14 - Vân Sa 2', '2022-01-19 02:02:02', 0),
(33, 0, 'xyz123', '25d55ad283aa400af464c76d713c07ad', 'Nguyễn B', 'abc@gmail.com', '0987987987', 'Vĩnh Phúc', 'Thành phố Vĩnh Yên', 'số 15 ngõ 7 ...', '2022-01-19 10:23:14', 1),
(34, 365608785, '', '', 'Hùng', 'hung15@gmail.com.vn', '0365608785', 'Thái Nguyên', 'Huyện Phổ Yên', 'KTX B', '2022-01-20 09:07:49', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tb_anhsanpham`
--
ALTER TABLE `tb_anhsanpham`
  ADD PRIMARY KEY (`id_sanphamanh`),
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- Chỉ mục cho bảng `tb_color`
--
ALTER TABLE `tb_color`
  ADD PRIMARY KEY (`id_color`),
  ADD UNIQUE KEY `ten_color` (`ten_color`);

--
-- Chỉ mục cho bảng `tb_color_sanpham`
--
ALTER TABLE `tb_color_sanpham`
  ADD PRIMARY KEY (`id_color_sanpham`),
  ADD KEY `id_sanpham` (`id_sanpham`,`id_color`),
  ADD KEY `id_color` (`id_color`);

--
-- Chỉ mục cho bảng `tb_danhmuc`
--
ALTER TABLE `tb_danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`),
  ADD UNIQUE KEY `ten_danhmuc` (`ten_danhmuc`);

--
-- Chỉ mục cho bảng `tb_donhang`
--
ALTER TABLE `tb_donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ma_donhang` (`id_sanpham`),
  ADD KEY `id_donhang` (`id_donhang`);

--
-- Chỉ mục cho bảng `tb_giohang`
--
ALTER TABLE `tb_giohang`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_sanpham` (`id_sanpham`,`customer_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `tb_group_phanquyen`
--
ALTER TABLE `tb_group_phanquyen`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_loaisanpham`
--
ALTER TABLE `tb_loaisanpham`
  ADD PRIMARY KEY (`id_loaisanpham`),
  ADD KEY `id_danhmuc` (`id_danhmuc`);

--
-- Chỉ mục cho bảng `tb_phanquyen`
--
ALTER TABLE `tb_phanquyen`
  ADD PRIMARY KEY (`id_phanquyen`),
  ADD KEY `id_group` (`id_group`);

--
-- Chỉ mục cho bảng `tb_phanquyen_nhanvien`
--
ALTER TABLE `tb_phanquyen_nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_member` (`id_member`,`id_phanquyen`),
  ADD KEY `id_phanquyen` (`id_phanquyen`);

--
-- Chỉ mục cho bảng `tb_sanpham`
--
ALTER TABLE `tb_sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD UNIQUE KEY `ten_sanpham` (`ten_sanpham`),
  ADD UNIQUE KEY `ma_sanpham` (`ma_sanpham`),
  ADD KEY `id_danhmuc` (`id_danhmuc`,`id_loaisanpham`),
  ADD KEY `id_loaisanpham` (`id_loaisanpham`),
  ADD KEY `ma_sanpham_2` (`ma_sanpham`,`ten_sanpham`);

--
-- Chỉ mục cho bảng `tb_thongke`
--
ALTER TABLE `tb_thongke`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_donhang` (`id_donhang`);

--
-- Chỉ mục cho bảng `tb_thongtin_donhang`
--
ALTER TABLE `tb_thongtin_donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `tb_tintuc`
--
ALTER TABLE `tb_tintuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_tk_khachhang`
--
ALTER TABLE `tb_tk_khachhang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tb_anhsanpham`
--
ALTER TABLE `tb_anhsanpham`
  MODIFY `id_sanphamanh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT cho bảng `tb_color`
--
ALTER TABLE `tb_color`
  MODIFY `id_color` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `tb_color_sanpham`
--
ALTER TABLE `tb_color_sanpham`
  MODIFY `id_color_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT cho bảng `tb_danhmuc`
--
ALTER TABLE `tb_danhmuc`
  MODIFY `id_danhmuc` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT cho bảng `tb_donhang`
--
ALTER TABLE `tb_donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT cho bảng `tb_giohang`
--
ALTER TABLE `tb_giohang`
  MODIFY `id_cart` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- AUTO_INCREMENT cho bảng `tb_group_phanquyen`
--
ALTER TABLE `tb_group_phanquyen`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tb_loaisanpham`
--
ALTER TABLE `tb_loaisanpham`
  MODIFY `id_loaisanpham` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT cho bảng `tb_phanquyen`
--
ALTER TABLE `tb_phanquyen`
  MODIFY `id_phanquyen` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tb_phanquyen_nhanvien`
--
ALTER TABLE `tb_phanquyen_nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `tb_sanpham`
--
ALTER TABLE `tb_sanpham`
  MODIFY `id_sanpham` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT cho bảng `tb_thongke`
--
ALTER TABLE `tb_thongke`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `tb_thongtin_donhang`
--
ALTER TABLE `tb_thongtin_donhang`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT cho bảng `tb_tintuc`
--
ALTER TABLE `tb_tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tb_tk_khachhang`
--
ALTER TABLE `tb_tk_khachhang`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tb_anhsanpham`
--
ALTER TABLE `tb_anhsanpham`
  ADD CONSTRAINT `tb_anhsanpham_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `tb_sanpham` (`id_sanpham`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tb_color_sanpham`
--
ALTER TABLE `tb_color_sanpham`
  ADD CONSTRAINT `tb_color_sanpham_ibfk_1` FOREIGN KEY (`id_color`) REFERENCES `tb_color` (`id_color`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_color_sanpham_ibfk_2` FOREIGN KEY (`id_sanpham`) REFERENCES `tb_sanpham` (`id_sanpham`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tb_donhang`
--
ALTER TABLE `tb_donhang`
  ADD CONSTRAINT `tb_donhang_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `tb_sanpham` (`id_sanpham`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_donhang_ibfk_2` FOREIGN KEY (`id_donhang`) REFERENCES `tb_thongtin_donhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tb_loaisanpham`
--
ALTER TABLE `tb_loaisanpham`
  ADD CONSTRAINT `tb_loaisanpham_ibfk_1` FOREIGN KEY (`id_danhmuc`) REFERENCES `tb_danhmuc` (`id_danhmuc`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
