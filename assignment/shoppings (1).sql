-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 07, 2021 lúc 11:42 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoppings`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id_bl` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `noi_dung` varchar(255) NOT NULL,
  `thoi_gian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`id_bl`, `id_user`, `id_sp`, `noi_dung`, `thoi_gian`) VALUES
(39, 20, 59, 'abc', '2021-06-21'),
(40, 20, 46, 'doankaka', '2021-06-21'),
(41, 20, 46, 'doankaka', '2021-06-21'),
(42, 20, 43, 'abd', '2021-06-21'),
(43, 20, 43, 'abd', '2021-06-21'),
(44, 20, 55, 'fffffffffff', '2021-06-21'),
(45, 20, 55, 'gggggggggg', '2021-06-21'),
(46, 20, 55, 'aaaaaaaaaaaaaa', '2021-06-21'),
(47, 20, 47, 'abcd\r\n', '2021-06-21'),
(48, 20, 42, 'abc', '2021-06-22'),
(49, 20, 42, 'ddn\r\n', '2021-06-22'),
(50, 20, 42, 'kkk', '2021-06-22'),
(51, 20, 42, 'aaaaa', '2021-06-22'),
(52, 23, 55, 'âmmammam\r\n', '2021-06-22'),
(53, 20, 54, 'aa', '2021-09-22'),
(54, 20, 54, 'đẹp', '2021-09-22'),
(55, 20, 42, 'a2', '2021-09-22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id_dm` int(11) NOT NULL,
  `ten_dm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danh_muc`
--

INSERT INTO `danh_muc` (`id_dm`, `ten_dm`) VALUES
(24, 'Đồng Hồ Nam'),
(25, 'Đồng Hồ Nữ'),
(26, 'Đồng Hồ Đôi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `info`
--

CREATE TABLE `info` (
  `logo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `footer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id_sp` int(11) NOT NULL,
  `id_dm` int(11) NOT NULL,
  `ten_sp` varchar(255) NOT NULL,
  `anh_sp` text NOT NULL,
  `gia_sp` float NOT NULL,
  `id_th` int(11) NOT NULL,
  `giam_gia` int(3) NOT NULL,
  `mo_ta` varchar(1000) NOT NULL,
  `bao_hanh` varchar(30) NOT NULL,
  `luot_xem` int(11) NOT NULL,
  `trang_thai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id_sp`, `id_dm`, `ten_sp`, `anh_sp`, `gia_sp`, `id_th`, `giam_gia`, `mo_ta`, `bao_hanh`, `luot_xem`, `trang_thai`) VALUES
(42, 24, 'ĐỒNG HỒ NAM CHÍNH HÃNG AOUKE AK10-5', '../img/dong-ho-aouke-AK10-avt-5.png', 3000000, 22, 50, '<p>Nh&atilde;n hiệu&nbsp;Aouke</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;AK10-5</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nam</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Quartz ( Chạy pin )</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;38 mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;7 mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;D&acirc;y da cao cấp</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire Crystal</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;3 ATM</p>\r\n\r\n<p>Bảo h&agrave;nh&nbsp;24 th&aacute;ng</p>\r\n', '6', 92, 4),
(43, 24, 'ĐỒNG HỒ NAM CHÍNH HÃNG AOUKE AK08-3', ' ../img/dong-ho-aouke-AK08-avt-3.jpg', 5150000, 22, 10, '<p>Nh&atilde;n hiệu&nbsp;Aouke</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;AK08-3</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nam</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Automatic (M&aacute;y Cơ)</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;42 mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;11,5 mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;D&acirc;y da cao cấp</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire Crystal</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;5 ATM</p>\r\n', '6', 15, 3),
(44, 24, 'ĐỒNG HỒ NAM CHÍNH HÃNG AOUKE AK03-1', ' ../img/dong-ho-aouke-AK03-avt-1.jpg', 6750000, 22, 0, '<p>Nh&atilde;n hiệu&nbsp;Aouke</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;AK03-1</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nam</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Automatic (M&aacute;y Cơ)</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;40,5 mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;9,5 mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;D&acirc;y da cao cấp</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire Crystal</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;5 ATM</p>\r\n', '6', 10, 5),
(45, 24, 'ĐỒNG HỒ NAM CHÍNH HÃNG BORMAN BM3739-5', ' ../img/dong-ho-borman-bm3739-5-avt.jpg', 5250000, 23, 10, '<p>Nh&atilde;n hiệu&nbsp;Borman</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;BM3739-5</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nam</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Automatic (M&aacute;y Cơ)</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;42 mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;12 mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;5 ATM</p>\r\n', '6', 10, 5),
(46, 24, 'ĐỒNG HỒ NAM CHÍNH HÃNG BORMAN BM3869-1', ' ../img/dong-ho-borman-bm3869-1-avt.jpg', 4750000, 23, 15, '<p>Nh&atilde;n hiệu&nbsp;Borman</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;BM3869-1</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nam</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Automatic (M&aacute;y Cơ)</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;41 mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;11 mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;D&acirc;y da cao cấp</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;5 ATM</p>\r\n', '12', 24, 10),
(47, 24, 'ĐỒNG HỒ NAM CHÍNH HÃNG BORMAN BM3541-4', ' ../img/dong-ho-borman-bm3541-4-avt.jpg', 5750000, 23, 10, '<p>Nh&atilde;n hiệu&nbsp;Borman</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;BM3541-4</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nam</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Automatic (M&aacute;y Cơ)</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;41,5 mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;11 mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;D&acirc;y da cao cấp</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;5 ATM</p>\r\n', '12', 15, 6),
(48, 25, 'ĐỒNG HỒ NỮ CHÍNH HÃNG LOBINNI NO.026-2', ' ../img/lobinni_no-026-2_avt.png', 3550000, 24, 5, '<p>Nh&atilde;n hiệu&nbsp;Lobinni</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;No.026-2</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nữ</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Automatic (M&aacute;y Cơ)</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;36mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;10mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;D&acirc;y da cao cấp</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;5ATM</p>\r\n', '6', 11, 12),
(49, 25, 'ĐỒNG HỒ NỮ CHÍNH HÃNG LOBINNI NO.2002-4', ' ../img/dong-ho-lobinni-no-2002-4-avt.jpg', 4550000, 24, 5, '<p>Nh&atilde;n hiệu&nbsp;Lobinni</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;No.2002-4</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nữ</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Automatic (M&aacute;y Cơ)</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;36 mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;11 mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;D&acirc;y da cao cấp</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;5 ATM</p>\r\n', '6', 9, 10),
(50, 25, 'ĐỒNG HỒ NỮ CHÍNH HÃNG LOBINNI NO.2007-2', ' ../img/LOBINNI_L2007-2_(4).jpg', 4950000, 24, 0, '<p>Nh&atilde;n hiệu&nbsp;Lobinni</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;No.2007-2</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nữ</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Automatic (M&aacute;y Cơ)</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;34 mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;10 mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire Crystal</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;5 ATM</p>\r\n', '6', 9, 10),
(51, 25, 'ĐỒNG HỒ NỮ CHÍNH HÃNG TEINTOP T8629-4', ' ../img/591d4bdbN831c884d.jpg', 2600000, 25, 6, '<p>Nh&atilde;n hiệu&nbsp;Teintop</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;T8629-4</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nữ</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Automatic (M&aacute;y Cơ)</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;28mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;11 mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire Crystal</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;3 ATM</p>\r\n', '12', 10, 8),
(52, 25, 'ĐỒNG HỒ NỮ CHÍNH HÃNG TEINTOP T7005-3', ' ../img/dong-ho-teintop-t7005-3-avt.jpg', 2750000, 25, 6, '<p>Nh&atilde;n hiệu&nbsp;Teintop</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;T7005-3</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nữ</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Automatic (M&aacute;y Cơ)</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;32 mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;12 mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire Crystal</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;3 ATM</p>\r\n', '6', 9, 12),
(53, 25, 'ĐỒNG HỒ NỮ CHÍNH HÃNG TEINTOP T7018-5', ' ../img/dong-ho-nu-teintop-t7018-5-avt.jpg', 1950000, 25, 0, '<p>Nh&atilde;n hiệu&nbsp;Teintop</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;T7018-5</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nữ</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Quartz ( Chạy pin )</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;34x23 mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;5 mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;D&acirc;y da cao cấp</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;3 ATM</p>\r\n', '6', 9, 12),
(54, 26, 'ĐỒNG HỒ ĐÔI CHÍNH HÃNG TEINTOP T8629-5', ' ../img/T8629_6_dong_ho_doi.jpg', 4950000, 25, 10, '<p>Nh&atilde;n hiệu&nbsp;Teintop</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;T8629-5</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nam - Nữ</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Automatic (M&aacute;y Cơ)</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;40 &amp; 28mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;11 mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;3 ATM</p>\r\n', '6', 23, 12),
(55, 26, 'ĐỒNG HỒ ĐÔI CHÍNH HÃNG LOBINNI NO.5016-5', ' ../img/lobinni_5016.jpg', 11500000, 24, 15, '<p>Nh&atilde;n hiệu&nbsp;Lobinni</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;No.5016-5</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nam - Nữ</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Automatic (M&aacute;y Cơ)</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;41 &amp; 34mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;9 &amp; 8mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;D&acirc;y da cao cấp</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;5 ATM</p>\r\n', '6', 30, 15),
(56, 26, 'ĐỒNG HỒ ĐÔI CHÍNH HÃNG TEINTOP T7004-16', ' ../img/dong-ho-doi-teintop-t7004-16-avt.jpg', 2950000, 25, 0, '<p>Nh&atilde;n hiệu&nbsp;Teintop</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;T7004-16</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nam - Nữ</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Quartz ( Chạy pin )</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;41 mm - 27 mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;6 mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;D&acirc;y vải</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire Crystal</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;3 ATM</p>\r\n', '6', 9, 15),
(57, 26, 'ĐỒNG HỒ ĐÔI CHÍNH HÃNG LOBINNI NO.3001-1', ' ../img/lobinni_no-3001_avt.jpg', 4450000, 24, 0, '<p>Nh&atilde;n hiệu&nbsp;Lobinni</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;No.3001-1</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nam - Nữ</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Quartz (Chạy pin)</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;40x30mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;7mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;D&acirc;y da cao cấp</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;3 ATM</p>\r\n', '6', 9, 13),
(58, 26, 'ĐỒNG HỒ ĐÔI CHÍNH HÃNG LOBINNI NO.1651-4', ' ../img/lobinni_no-1651-5_avt1.jpg', 5650000, 24, 0, '<p>Nh&atilde;n hiệu&nbsp;Lobinni</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;No.1651-4</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nam - Nữ</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Quartz (Chạy pin)</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;40 &amp; 28mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;7 &amp; 6mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316l</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;3 ATM</p>\r\n', '6', 9, 5),
(59, 26, 'aaaaaaaaaaa', ' ../img/dong-ho-aouke-AK14-avt-2.jpg', 3880000, 22, 0, '<p>Nh&atilde;n hiệu&nbsp;Aouke</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;AK14-2</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nam - Nữ</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Quartz ( Chạy pin )</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;40mm - 30mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;7 mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire Crystal</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;3 ATM</p>\r\n', '12', 13, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id_slide` int(11) NOT NULL,
  `ten_slide` varchar(50) NOT NULL,
  `anh_slide` text NOT NULL,
  `link_slide` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id_slide`, `ten_slide`, `anh_slide`, `link_slide`) VALUES
(7, 'a3', '../img/omega-banner.jpg', ' https://kenh14.vn/ '),
(15, 'a4', '../img/shop-OMEGA-banner.jpg', '        https://baomoi.com/        '),
(18, 'aca', '../img/crazysales_com_au_watch_banner_by_keiravanhell_d3h9bzq-fullview.jpg', 'https://www.youtube.com/');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuong_hieu`
--

CREATE TABLE `thuong_hieu` (
  `id_th` int(11) NOT NULL,
  `ten_th` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thuong_hieu`
--

INSERT INTO `thuong_hieu` (`id_th`, `ten_th`) VALUES
(22, 'Aouke'),
(23, 'Borman'),
(24, 'Lobinni'),
(25, 'Teintop');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `account` varchar(40) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `avatar` text NOT NULL,
  `roles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `account`, `passwd`, `name`, `email`, `avatar`, `roles`) VALUES
(20, 'admin', '$2y$10$dL1yCYfyMLUJTGgvaW6J2.mRC1wlL1beEjVo7KWSBlrMUbcNuDdiC', 'hothichhuy', 'huyhtph07087@fpt.edu.vn', 'logo.jpg', 1),
(21, 'hothichhhuy', '$2y$10$u4AbX8se2gm1CXwm.wXHg.we1wC.B.3DXXyDRra53MdkIeiAiPp7y', 'hothichhuy', 'hothichhuy12@gmail.com', '591d4bdbN831c884d.jpg', 0),
(22, 'abcd', '$2y$10$r70rgOb62DMpuXCR4RoiIOEDiO5uQff4OzYl95pfEbosrwm6bxCZa', 'Doan Le', 'admin@gmail.com', 'ZmL2FbH.jpg', 0),
(23, 'maimai', '$2y$10$u4AbX8se2gm1CXwm.wXHg.we1wC.B.3DXXyDRra53MdkIeiAiPp7y', 'maimai', 'admin@gmail.com', 'avatar.jpg', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id_bl`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id_dm`),
  ADD UNIQUE KEY `ten_dm` (`ten_dm`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id_sp`),
  ADD UNIQUE KEY `ten_sp` (`ten_sp`),
  ADD KEY `id_dm` (`id_dm`),
  ADD KEY `id_th` (`id_th`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_slide`),
  ADD UNIQUE KEY `ten_slide` (`ten_slide`);

--
-- Chỉ mục cho bảng `thuong_hieu`
--
ALTER TABLE `thuong_hieu`
  ADD PRIMARY KEY (`id_th`),
  ADD UNIQUE KEY `ten_th` (`ten_th`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `account` (`account`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id_dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `thuong_hieu`
--
ALTER TABLE `thuong_hieu`
  MODIFY `id_th` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `binh_luan_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `san_pham` (`id_sp`);

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`id_dm`) REFERENCES `danh_muc` (`id_dm`),
  ADD CONSTRAINT `san_pham_ibfk_2` FOREIGN KEY (`id_th`) REFERENCES `thuong_hieu` (`id_th`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
