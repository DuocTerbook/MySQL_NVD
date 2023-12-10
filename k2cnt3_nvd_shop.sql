-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 10, 2023 lúc 06:11 AM
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
-- Cơ sở dữ liệu: `k2cnt3_nvd_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `MALH` char(10) NOT NULL,
  `TENLH` varchar(50) NOT NULL,
  `SODIENTHOAI` char(10) NOT NULL,
  `TRANGTHAI` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lienhe`
--

INSERT INTO `lienhe` (`MALH`, `TENLH`, `SODIENTHOAI`, `TRANGTHAI`) VALUES
('01', 'trung văn tuấn', '0954729361', 1),
('03', 'lương thế vĩnh', '0336490740', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MASP` int(11) NOT NULL,
  `TENSP` text NOT NULL,
  `SOLUONG` char(10) NOT NULL,
  `GIAMUA` float NOT NULL,
  `GIABAN` float NOT NULL,
  `ANH` varchar(100) NOT NULL,
  `TRANGTHAI` tinyint(4) NOT NULL,
  `MASHOP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MASP`, `TENSP`, `SOLUONG`, `GIAMUA`, `GIABAN`, `ANH`, `TRANGTHAI`, `MASHOP`) VALUES
(1, 'GUCCI', '24', 456934, 3049500, 'Abc.jpg', 1, 1),
(2, 'PARDA', '37', 341000, 5839200, 'texa.jpg', 1, 1),
(3, 'GK', '21', 336774, 3515760, 'man.jpg', 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop`
--

CREATE TABLE `shop` (
  `MASHOP` int(11) NOT NULL,
  `TENSHOP` varchar(50) NOT NULL,
  `TRANGTHAI` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `shop`
--

INSERT INTO `shop` (`MASHOP`, `TENSHOP`, `TRANGTHAI`) VALUES
(1, 'Kính mắt', 1),
(2, 'Kính 4d', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `IDTV` int(10) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `MATKHAU` varchar(100) NOT NULL,
  `QUYENTRUYCAP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`IDTV`, `EMAIL`, `MATKHAU`, `QUYENTRUYCAP`) VALUES
(1, 'kimdinh@gmail.com', 'kimdinh.edu', 2),
(2, 'trungtuan@yamool.com', 'trungtuan23', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vanchuyen`
--

CREATE TABLE `vanchuyen` (
  `MAVC` char(10) NOT NULL,
  `TENVC` varchar(50) NOT NULL,
  `THOIGIAN` date NOT NULL,
  `TRANGTHAI` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vanchuyen`
--

INSERT INTO `vanchuyen` (`MAVC`, `TENVC`, `THOIGIAN`, `TRANGTHAI`) VALUES
('B235633', 'GUCCI', '2023-12-20', 1),
('C934555', 'PARDA', '2023-08-21', 2),
('G3515342', 'GK', '2023-09-12', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`MALH`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MASP`);

--
-- Chỉ mục cho bảng `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`MASHOP`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`IDTV`);

--
-- Chỉ mục cho bảng `vanchuyen`
--
ALTER TABLE `vanchuyen`
  ADD PRIMARY KEY (`MAVC`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
