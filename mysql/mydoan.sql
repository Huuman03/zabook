-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 27, 2024 lúc 11:49 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mydoan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baiviet`
--

CREATE TABLE `baiviet` (
  `idbv` int(10) NOT NULL,
  `idtk` int(10) NOT NULL,
  `noidung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `baiviet` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `baiviet`
--

INSERT INTO `baiviet` (`idbv`, `idtk`, `noidung`, `baiviet`, `time`) VALUES
(47, 1, 'Lan căng thẳng', '1-1-hinh-nen-may-tinh-chill-win-10-4.jpg', '0000-00-00'),
(53, 58, 'Khương điềm tĩnh', '1-1-hinh-nen-may-tinh-chill-win-10-4.jpg', '08:17 27-04-2024'),
(56, 59, 'e moi choi', '8638617.jpg', '11:03  27-04-2024');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `idbl` int(11) NOT NULL,
  `idbv` varchar(255) NOT NULL,
  `idng` varchar(255) NOT NULL,
  `ndbl` varchar(255) NOT NULL,
  `timebl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`idbl`, `idbv`, `idng`, `ndbl`, `timebl`) VALUES
(19, '56', '59', 'sadsad', '11:11 27-04-2024'),
(20, '53', '59', 'ssssss', '11:12 27-04-2024'),
(21, '47', '59', 'xcxbvc', '11:15 27-04-2024'),
(22, '47', '59', 'hjhhh', '11:16 27-04-2024'),
(23, '53', '59', 'sada', '11:17 27-04-2024'),
(24, '56', '59', 'ddd', '11:17 27-04-2024'),
(25, '56', '59', 'd', '11:17 27-04-2024'),
(26, '47', '59', 'd', '11:17 27-04-2024'),
(27, '56', '59', '123', '11:24 27-04-2024'),
(28, '53', '1', 'aasdsa', '11:33 27-04-2024');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `inbox`
--

CREATE TABLE `inbox` (
  `idtn` int(55) NOT NULL,
  `idng` int(55) NOT NULL,
  `idnn` int(55) NOT NULL,
  `ndtn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `inbox`
--

INSERT INTO `inbox` (`idtn`, `idng`, `idnn`, `ndtn`) VALUES
(47, 58, 1, 'Ok a chào e'),
(48, 1, 58, 'Chào e'),
(49, 59, 58, 'hyhy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(50) NOT NULL,
  `taikhoan` varchar(99) NOT NULL,
  `matkhau` varchar(99) NOT NULL,
  `sdt` varchar(99) NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` varchar(99) NOT NULL,
  `avatar` varchar(99) NOT NULL,
  `ten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `taikhoan`, `matkhau`, `sdt`, `ngaysinh`, `gioitinh`, `avatar`, `ten`) VALUES
(1, 'admin', 'admin2003', '0866177516', '2003-10-24', 'Nam', 'manpho.jpg', 'Hữu Mẫn'),
(58, 'huuman', '1', '1', '2024-04-04', 'Nam', 'c1245a2cc752c85f51d51e3d0e4cf7bc.jpg', 'Moi'),
(59, 'bonbon', '2', '2', '2024-04-03', 'Nam', 'Hình nền Anime 4k 3840x2160 đẹp chất lừ - Hà Nội Spirit Of Place.jfif', 'Boon bon');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`idbv`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`idbl`);

--
-- Chỉ mục cho bảng `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`idtn`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `idbv` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `idbl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `inbox`
--
ALTER TABLE `inbox`
  MODIFY `idtn` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
