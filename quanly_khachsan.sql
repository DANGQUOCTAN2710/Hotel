-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th5 17, 2024 lúc 04:28 AM
-- Phiên bản máy phục vụ: 5.7.25
-- Phiên bản PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanly_khachsan`
--
CREATE DATABASE IF NOT EXISTS `quanly_khachsan` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `quanly_khachsan`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE `khachhang` (
  `MaKH` int(10) NOT NULL,
  `HoVaTen` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NamSinh` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` tinyint(1) NOT NULL,
  `CCCD` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `SoDienThoai` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `MaDV` int(11) DEFAULT NULL,
  `MaPhong` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `HoVaTen`, `NamSinh`, `GioiTinh`, `CCCD`, `SoDienThoai`, `MaDV`, `MaPhong`) VALUES
(3, 'Đặng Quốc Tấn', '1956', 0, '089203017615', '1', 1, 'VIP001'),
(4, 'Hùng', '2003', 1, '1', '1', 1, 'VIP001'),
(5, 'Thái Văn Khang', '2003', 1, '2', '2', 1, 'VIP001'),
(9, 'Hùng', '1972', 0, '12345', '999999999', 1, 'VIP001'),
(10, 'Đặng Quốc Tấn', '1976', 0, '36246', '368', 1, 'VIP001'),
(12, 'Đặng Quốc Tấn', '2003', 1, '089203017615', '0916703651', 1, 'VIP001');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

DROP TABLE IF EXISTS `phong`;
CREATE TABLE `phong` (
  `idPhong` int(11) NOT NULL,
  `MaPhong` varchar(6) NOT NULL,
  `LoaiPhong` varchar(6) DEFAULT NULL,
  `SoGiuong` int(11) DEFAULT NULL,
  `TrangThai` varchar(10) NOT NULL DEFAULT 'Trống',
  `GiaPhong` int(11) DEFAULT NULL,
  `ThietBi` varchar(16) DEFAULT NULL,
  `HinhAnh` varchar(200) DEFAULT NULL,
  `LanDat` int(11) NOT NULL DEFAULT '0',
  `SucChua` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`idPhong`, `MaPhong`, `LoaiPhong`, `SoGiuong`, `TrangThai`, `GiaPhong`, `ThietBi`, `HinhAnh`, `LanDat`, `SucChua`) VALUES
(4, 'VIP001', 'Vip', 6, 'Trống', 1200000, 'Có máy lạnh', 'img/ks4.jpg', 2, 12),
(5, 'VIP002', 'NVip', 1, 'Trống', 1250000, 'Không máy lạnh', 'img/ks3.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dichvu`
--

DROP TABLE IF EXISTS `tbl_dichvu`;
CREATE TABLE `tbl_dichvu` (
  `MaDV` int(11) NOT NULL,
  `TenDichVu` varchar(200) NOT NULL,
  `GiaDichVu` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_dichvu`
--

INSERT INTO `tbl_dichvu` (`MaDV`, `TenDichVu`, `GiaDichVu`) VALUES
(1, 'Dọn phòng', '200000'),
(2, 'Spa', '200000'),
(3, 'Fitness', '150000'),
(4, 'Giặt đồ', '50000'),
(5, 'Nhà hàng', '350000'),
(6, 'Quầy bar', '220000'),
(7, 'Hội họp, văn phòng', '520000'),
(8, 'Đưa đón', '50000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hoadon`
--

DROP TABLE IF EXISTS `tbl_hoadon`;
CREATE TABLE `tbl_hoadon` (
  `MaHD` int(11) NOT NULL,
  `MaPhong` varchar(6) NOT NULL,
  `MaDV` int(11) NOT NULL,
  `MaKH` int(11) NOT NULL,
  `MaNV` int(11) NOT NULL,
  `TongTien` int(11) NOT NULL,
  `TenKhachHang` varchar(50) NOT NULL,
  `TenNhanVien` varchar(200) NOT NULL,
  `TenDichVu` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nhanvien`
--

DROP TABLE IF EXISTS `tbl_nhanvien`;
CREATE TABLE `tbl_nhanvien` (
  `idNhanVien` int(11) NOT NULL,
  `HoVaTen` varchar(200) NOT NULL,
  `SoDienThoai` varchar(11) NOT NULL,
  `CCCD` varchar(13) NOT NULL,
  `TenDangNhap` varchar(200) NOT NULL,
  `MatKhau` varchar(200) NOT NULL,
  `QuyenHan` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_nhanvien`
--

INSERT INTO `tbl_nhanvien` (`idNhanVien`, `HoVaTen`, `SoDienThoai`, `CCCD`, `TenDangNhap`, `MatKhau`, `QuyenHan`) VALUES
(6, 'Đặng Quốc Tấn', '0916703651', '089203017615', 'dqtan', 'c4ca4238a0b923820dcc509a6f75849b', 1),
(10, 'Võ Lâm Hùng', '0937979999', '089203017679', 'vlhunggg', 'c4ca4238a0b923820dcc509a6f75849b', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`MaPhong`),
  ADD UNIQUE KEY `idPhong` (`idPhong`);

--
-- Chỉ mục cho bảng `tbl_dichvu`
--
ALTER TABLE `tbl_dichvu`
  ADD PRIMARY KEY (`MaDV`);

--
-- Chỉ mục cho bảng `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  ADD PRIMARY KEY (`MaHD`);

--
-- Chỉ mục cho bảng `tbl_nhanvien`
--
ALTER TABLE `tbl_nhanvien`
  ADD UNIQUE KEY `idNhanVien` (`idNhanVien`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKH` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `phong`
--
ALTER TABLE `phong`
  MODIFY `idPhong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_dichvu`
--
ALTER TABLE `tbl_dichvu`
  MODIFY `MaDV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_nhanvien`
--
ALTER TABLE `tbl_nhanvien`
  MODIFY `idNhanVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
