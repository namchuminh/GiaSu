-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2024 at 01:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `giasu`
--

-- --------------------------------------------------------

--
-- Table structure for table `bomon`
--

CREATE TABLE `bomon` (
  `MaBoMon` int(11) NOT NULL,
  `TenBoMon` varchar(255) NOT NULL,
  `MaLopHoc` int(11) NOT NULL,
  `DuongDan` text NOT NULL,
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bomon`
--

INSERT INTO `bomon` (`MaBoMon`, `TenBoMon`, `MaLopHoc`, `DuongDan`, `TrangThai`) VALUES
(1, 'Toán Lớp 1', 2, 'toan-lop-1', 1),
(2, 'Tập Làm Văn', 2, 'tap-lam-van', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cauhinh`
--

CREATE TABLE `cauhinh` (
  `TenWebsite` varchar(255) NOT NULL,
  `MoTaWeb` text NOT NULL,
  `Logo` text NOT NULL,
  `DiaChi` text NOT NULL,
  `Email` varchar(255) NOT NULL,
  `SoDienThoai` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giasu`
--

CREATE TABLE `giasu` (
  `MaGiaSu` int(11) NOT NULL,
  `HoTen` varchar(255) NOT NULL,
  `DiaChi` text NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` int(11) NOT NULL DEFAULT 1,
  `ChucVu` int(11) NOT NULL,
  `ChuyenNganh` text NOT NULL,
  `NamTotNghiep` int(4) NOT NULL,
  `SoDienThoai` varchar(11) NOT NULL,
  `Email` text NOT NULL,
  `TaiKhoan` varchar(255) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `LuongToiThieu` varchar(255) NOT NULL,
  `AnhCCCDMatTruoc` text NOT NULL,
  `AnhCCCDMatSau` text NOT NULL,
  `AnhThe` text NOT NULL,
  `AnhBangCapSinhVien` text NOT NULL,
  `SoBuoiDay` int(11) NOT NULL DEFAULT 1,
  `TenTruong` text NOT NULL,
  `MaTinhThanh` int(11) NOT NULL,
  `TrangThai` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giasu`
--

INSERT INTO `giasu` (`MaGiaSu`, `HoTen`, `DiaChi`, `NgaySinh`, `GioiTinh`, `ChucVu`, `ChuyenNganh`, `NamTotNghiep`, `SoDienThoai`, `Email`, `TaiKhoan`, `MatKhau`, `LuongToiThieu`, `AnhCCCDMatTruoc`, `AnhCCCDMatSau`, `AnhThe`, `AnhBangCapSinhVien`, `SoBuoiDay`, `TenTruong`, `MaTinhThanh`, `TrangThai`) VALUES
(1, 'Chu Minh Nam', 'Tầng 2, Tòa ABC, Quận XYZ1', '2024-03-20', 1, 0, 'Công Nghệ Thông Tin', 2025, '0379962045', 'chuminhnamma@gmail.com', 'nguyenvana', '20ca70c7c8f494c7bd1d54ad23d40cde', '150000', 'http://localhost/GiaSu/uploads/z4617362745335_4456bfd0f397a69bb165e385ba8916cb.jpg', 'http://localhost/GiaSu/uploads/z4715420620636_a651b1c9e26bfe2afafbd9e7ce3836e0.jpg', 'http://localhost/GiaSu/uploads/z4617362741623_98c0302df70bfe02dd581fa8a0e35aa6.jpg', 'http://localhost/GiaSu/uploads/z4617362745335_4456bfd0f397a69bb165e385ba8916cb1.jpg', 1, 'Công Nghiệp Hà Nội', 2, 1),
(2, 'Chu Minh Nam', 'Tầng 2, Tòa ABC, Quận XYZ1', '2024-03-20', 1, 0, 'Tài Chính Ngân Hàng', 2025, '0999999999', 'giasu@gmail.com', 'chuminhnam', '206dcce3f82cf8981d316e7900dc8e06', '1500000', 'http://localhost/GiaSu/uploads/z4715420620636_a651b1c9e26bfe2afafbd9e7ce3836e0.jpg', 'http://localhost/GiaSu/uploads/z4715420620636_a651b1c9e26bfe2afafbd9e7ce3836e01.jpg', 'http://localhost/GiaSu/uploads/z4617362764788_9dae16f7c421e020eeb4418f62eeb52e1.jpg', 'http://localhost/GiaSu/uploads/z4715420620636_a651b1c9e26bfe2afafbd9e7ce3836e02.jpg', 1, 'Công Nghiệp Hà Nội', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `giasu_bomon`
--

CREATE TABLE `giasu_bomon` (
  `MaGiaSu` int(11) NOT NULL,
  `MaBoMon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giasu_bomon`
--

INSERT INTO `giasu_bomon` (`MaGiaSu`, `MaBoMon`) VALUES
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `giasu_lopgiasu`
--

CREATE TABLE `giasu_lopgiasu` (
  `MaNhanLop` int(11) NOT NULL,
  `MaGiaSu` int(11) NOT NULL,
  `MaLopGiaSu` int(11) NOT NULL,
  `NgayDangKy` datetime NOT NULL DEFAULT current_timestamp(),
  `YeuCauThem` text NOT NULL,
  `HinhThucNhan` int(11) NOT NULL DEFAULT 1,
  `ThanhToan` int(11) NOT NULL DEFAULT 0,
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giasu_lophoc`
--

CREATE TABLE `giasu_lophoc` (
  `MaGiaSu` int(11) NOT NULL,
  `MaLopHoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giasu_lophoc`
--

INSERT INTO `giasu_lophoc` (`MaGiaSu`, `MaLopHoc`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `giasu_quanhuyen`
--

CREATE TABLE `giasu_quanhuyen` (
  `MaGiaSu` int(11) NOT NULL,
  `MaQuanHuyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `MaLienHe` int(11) NOT NULL,
  `TieuDe` text NOT NULL,
  `TenKhachHang` text NOT NULL,
  `NoiDung` text NOT NULL,
  `ThoiGian` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lopgiasu`
--

CREATE TABLE `lopgiasu` (
  `MaLopGiaSu` int(11) NOT NULL,
  `MaTinhThanh` int(11) NOT NULL,
  `MaQuanHuyen` int(11) NOT NULL,
  `MaLopHoc` int(11) NOT NULL,
  `MaBoMon` int(11) NOT NULL,
  `DiaChi` text NOT NULL,
  `NgayBatDau` date NOT NULL,
  `MucLuong` int(11) NOT NULL,
  `MucPhi` int(11) NOT NULL,
  `YeuCauGioiTinh` int(11) NOT NULL DEFAULT 1,
  `SoBuoi` int(11) NOT NULL,
  `ThoiGianDay` int(11) NOT NULL,
  `HinhThuc` int(11) NOT NULL DEFAULT 1,
  `SoDienThoai` varchar(11) NOT NULL,
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lophoc`
--

CREATE TABLE `lophoc` (
  `MaLopHoc` int(11) NOT NULL,
  `TenLopHoc` varchar(255) NOT NULL,
  `DuongDan` text NOT NULL,
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lophoc`
--

INSERT INTO `lophoc` (`MaLopHoc`, `TenLopHoc`, `DuongDan`, `TrangThai`) VALUES
(1, 'Lớp 3', 'lop-3', 1),
(2, 'Lớp 1', 'lop-1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNhanVien` int(11) NOT NULL,
  `HoTen` varchar(255) NOT NULL,
  `TaiKhoan` varchar(255) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `SoDienThoai` varchar(11) NOT NULL,
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MaNhanVien`, `HoTen`, `TaiKhoan`, `MatKhau`, `Email`, `SoDienThoai`, `TrangThai`) VALUES
(1, 'Nguyễn Văn An', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'nguyenvana@gmail.com', '0999888999', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quanhuyen`
--

CREATE TABLE `quanhuyen` (
  `MaQuanHuyen` int(11) NOT NULL,
  `MaTinhThanh` int(11) NOT NULL,
  `TenQuanHuyen` varchar(255) NOT NULL,
  `DuongDan` text NOT NULL,
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quanhuyen`
--

INSERT INTO `quanhuyen` (`MaQuanHuyen`, `MaTinhThanh`, `TenQuanHuyen`, `DuongDan`, `TrangThai`) VALUES
(1, 2, 'Từ Sơn', 'tu-son', 1),
(2, 1, 'Huyện Ba Vì', 'huyen-ba-vi', 1),
(3, 1, 'Huyện Đan Phượng', 'huyen-dan-phuong', 1),
(4, 1, 'Huyện Hoài Đức', 'huyen-hoai-duc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tinhthanh`
--

CREATE TABLE `tinhthanh` (
  `MaTinhThanh` int(11) NOT NULL,
  `TenTinhThanh` varchar(255) NOT NULL,
  `DuongDan` text NOT NULL,
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tinhthanh`
--

INSERT INTO `tinhthanh` (`MaTinhThanh`, `TenTinhThanh`, `DuongDan`, `TrangThai`) VALUES
(1, 'Hà Nội', 'ha-noi', 1),
(2, 'Bắc Ninh', 'bac-ninh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `MaTinTuc` int(11) NOT NULL,
  `TieuDe` varchar(500) NOT NULL,
  `NoiDung` text NOT NULL,
  `DuongDan` text NOT NULL,
  `The` text NOT NULL,
  `MaNhanVien` int(11) NOT NULL,
  `HinhAnh` text NOT NULL,
  `ThoiGian` datetime NOT NULL DEFAULT current_timestamp(),
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bomon`
--
ALTER TABLE `bomon`
  ADD PRIMARY KEY (`MaBoMon`);

--
-- Indexes for table `giasu`
--
ALTER TABLE `giasu`
  ADD PRIMARY KEY (`MaGiaSu`);

--
-- Indexes for table `giasu_bomon`
--
ALTER TABLE `giasu_bomon`
  ADD PRIMARY KEY (`MaGiaSu`,`MaBoMon`);

--
-- Indexes for table `giasu_lopgiasu`
--
ALTER TABLE `giasu_lopgiasu`
  ADD PRIMARY KEY (`MaNhanLop`);

--
-- Indexes for table `giasu_lophoc`
--
ALTER TABLE `giasu_lophoc`
  ADD PRIMARY KEY (`MaGiaSu`,`MaLopHoc`);

--
-- Indexes for table `giasu_quanhuyen`
--
ALTER TABLE `giasu_quanhuyen`
  ADD PRIMARY KEY (`MaGiaSu`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`MaLienHe`);

--
-- Indexes for table `lopgiasu`
--
ALTER TABLE `lopgiasu`
  ADD PRIMARY KEY (`MaLopGiaSu`);

--
-- Indexes for table `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`MaLopHoc`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNhanVien`);

--
-- Indexes for table `quanhuyen`
--
ALTER TABLE `quanhuyen`
  ADD PRIMARY KEY (`MaQuanHuyen`);

--
-- Indexes for table `tinhthanh`
--
ALTER TABLE `tinhthanh`
  ADD PRIMARY KEY (`MaTinhThanh`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`MaTinTuc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bomon`
--
ALTER TABLE `bomon`
  MODIFY `MaBoMon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `giasu`
--
ALTER TABLE `giasu`
  MODIFY `MaGiaSu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `giasu_lopgiasu`
--
ALTER TABLE `giasu_lopgiasu`
  MODIFY `MaNhanLop` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `MaLienHe` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lopgiasu`
--
ALTER TABLE `lopgiasu`
  MODIFY `MaLopGiaSu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lophoc`
--
ALTER TABLE `lophoc`
  MODIFY `MaLopHoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNhanVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quanhuyen`
--
ALTER TABLE `quanhuyen`
  MODIFY `MaQuanHuyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tinhthanh`
--
ALTER TABLE `tinhthanh`
  MODIFY `MaTinhThanh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `MaTinTuc` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
