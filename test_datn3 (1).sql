-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 13, 2025 lúc 02:56 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test_datn3`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tieu_de` varchar(255) NOT NULL,
  `mo_ta` text DEFAULT NULL,
  `anh` varchar(255) DEFAULT NULL,
  `loai` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `ngay_bat_dau` datetime DEFAULT NULL,
  `ngay_ket_thuc` datetime DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`id`, `tieu_de`, `mo_ta`, `anh`, `loai`, `link`, `ngay_bat_dau`, `ngay_ket_thuc`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Banner 1', 'Banner mô tả', 'banners/ZiVN7Ke0sJm9MDwWuy61ZU5SjHIXAdNZqf3HWGEw.jpg', 'main', 'http://127.0.0.1:8000/contact', '2025-01-11 18:26:00', '2025-01-13 18:26:00', 1, '2025-01-12 04:27:16', '2025-01-12 06:21:34'),
(2, 'Banner 2', 'Pipip', 'banners/gGZ7vDb8eHnwsHO6iBzGKpLj0BReIgnFb5pMJNix.jpg', 'main', 'https://www.facebook.com/', '2025-01-06 18:41:00', '2025-01-22 18:41:00', 1, '2025-01-12 04:41:32', '2025-01-12 06:21:19'),
(3, 'Minh', '1111', 'banners/NIQetbvK6X3gZD3fzfW2yOFqZ7JjXLB5G3xZW5wl.jpg', 'sale', 'https://www.facebook.com/', '2024-12-31 18:42:00', '2025-02-01 18:42:00', 1, '2025-01-12 04:42:36', '2025-01-12 06:22:51'),
(4, 'Banner 1', 'kfhskjdf', 'banners/lKUY9ZLu9FipONS1Oy9s3mWnd0ReS7jYuqL0vvMq.jpg', 'sale', 'https://example.com/banner1', '2025-01-07 18:44:00', '2025-01-22 18:44:00', 1, '2025-01-12 04:45:01', '2025-01-12 06:22:38'),
(5, 'uỏuower', 'AKLHKAHD', 'banners/78QkRY69y8teSnsx9AUQ8DS79KMPvGXaxmrHE4AC.jpg', 'product', 'https://www.facebook.com/', '2025-01-07 18:55:00', '2025-01-20 18:55:00', 1, '2025-01-12 04:55:33', '2025-01-12 06:24:06'),
(6, 'ƯEQEQ', 'QSQ', 'banners/cJWNbf5Nktj4cGsL4rHhzWt6Ip67XxpbjQMBrKM2.jpg', 'product', 'https://www.facebook.com/', '2025-01-07 18:55:00', '2025-01-22 18:56:00', 1, '2025-01-12 04:56:12', '2025-01-12 06:23:56'),
(7, 'Minh', 'Mô tả banner 1', 'banners/oBV7g8Xjwm5KvJJbswkBC5d2r6mIK7ciVw115mUM.jpg', 'product', 'https://example.com/banner1', '2025-01-07 18:56:00', '2025-01-14 18:56:00', 1, '2025-01-12 04:56:36', '2025-01-12 06:23:42'),
(8, 'Minh', '23434', 'banners/fQoDmiFKyOCilbAGSz0OgcVXELFNsqVG1zlyE0vt.jpg', 'main', 'https://www.facebook.com/', '2025-01-12 20:21:00', '2025-01-15 20:21:00', 1, '2025-01-12 06:21:56', '2025-01-12 06:21:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bien_the_san_pham`
--

CREATE TABLE `bien_the_san_pham` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `san_pham_id` bigint(20) UNSIGNED NOT NULL,
  `dung_luong` varchar(255) DEFAULT NULL,
  `mau_sac` varchar(255) DEFAULT NULL,
  `anh` varchar(255) DEFAULT NULL,
  `so_luong` int(11) NOT NULL DEFAULT 0,
  `gia` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bien_the_san_pham`
--

INSERT INTO `bien_the_san_pham` (`id`, `san_pham_id`, `dung_luong`, `mau_sac`, `anh`, `so_luong`, `gia`, `created_at`, `updated_at`) VALUES
(1, 1, '7GB', 'Xanh', 'variants/m7E1VSsV1Mj98mF1h8fxcFgMrfbxGboJf367kXiB.jpg', 39, 929788.00, '2025-01-12 00:57:54', '2025-01-12 08:07:02'),
(2, 1, '6GB', 'Đen', 'variants/NuanpWUzhqI1rSrzUMkJv6ikra90EjVXNoo6HV40.jpg', 61, 346158.00, '2025-01-12 00:57:54', '2025-01-12 08:07:02'),
(3, 2, '5GB', 'Xanh', 'variants/Zc2Z3j4PUOj3OYDkN5RDKaaejSYcXLfrdSi2qAEG.jpg', 71, 244259.00, '2025-01-12 00:57:54', '2025-01-12 08:06:43'),
(4, 2, '3GB', 'Đen', 'variants/sIZz4dpYZBOeCqbEcE13uxoTkUymJCNtxwgKg8io.jpg', 57, 303963.00, '2025-01-12 00:57:54', '2025-01-12 08:06:43'),
(5, 3, '10GB', 'Xanh', 'variants/1ydsAapeslRA4l4lmUnDq0HHf70MdRTSPDxfPmWY.jpg', 94, 178993.00, '2025-01-12 00:57:54', '2025-01-12 08:06:21'),
(6, 3, '8GB', 'Đen', 'variants/9inFuLDTarwyiPS9Kh1lq4xJIl13HQrtoSk1BD7h.jpg', 86, 111148.00, '2025-01-12 00:57:54', '2025-01-12 08:06:21'),
(7, 4, '8GB', 'Đen', 'variants/D23qYUjzwsnD2xi1AhlL3BdtboRMxIS8IFKUH42r.jpg', 37, 305020.00, '2025-01-12 00:57:54', '2025-01-12 08:05:57'),
(8, 4, '6GB', 'Xanh', 'variants/9l0pjWnrnl30RQ0IHMzcmm5q3MwaVHXx6nIubewF.jpg', 76, 226715.00, '2025-01-12 00:57:54', '2025-01-12 08:05:57'),
(9, 5, '10GB', 'Xanh', 'variants/b0s1ZIb7S9kBQc5Ay9Z5jzRYYKE87AYVVNwshECu.jpg', 73, 153125.00, '2025-01-12 00:57:54', '2025-01-12 08:05:25'),
(10, 5, '2GB', 'Xanh', 'variants/qCyEakkZrTs1t7Fw3S43WctMY4fGRxp9U0JN6Rgf.jpg', 87, 943558.00, '2025-01-12 00:57:54', '2025-01-12 08:05:25'),
(11, 6, '2GB', 'Vàng', 'variants/Y5p83RW1g6PvyqleuSwQTaySAcDaYLZbPWOyzFLg.jpg', 28, 966726.00, '2025-01-12 00:57:54', '2025-01-12 08:05:03'),
(12, 6, '1GB', 'Đen', 'variants/MJF0MW7OjkJ3HKwqw91W17oj1CUPwuZkxiZAMs5v.jpg', 14, 337781.00, '2025-01-12 00:57:54', '2025-01-12 08:05:03'),
(13, 7, '4GB', 'Đen', 'variants/ZRHk5mziIU0cdUyn5iKyswVd5ul0vK3dG8HrIIhK.jpg', 70, 356744.00, '2025-01-12 00:57:54', '2025-01-12 08:04:42'),
(14, 7, '7GB', 'Đen', 'variants/h9aS6p6OWqSUwtSIYQAVMyKZmwXirHFv3OX5IVZq.jpg', 28, 668613.00, '2025-01-12 00:57:54', '2025-01-12 08:04:42'),
(15, 8, '7GB', 'Đen', 'variants/qIS1uKXHKAgyI3U2SIs1f2wJmuHl9UGTrJI4rdIN.jpg', 68, 187380.00, '2025-01-12 00:57:54', '2025-01-12 08:04:12'),
(16, 8, '2GB', 'Đỏ', 'variants/VfKntJ1gljusD1suTPex0Ys7zFOMB86Bma647Mbj.jpg', 100, 640447.00, '2025-01-12 00:57:54', '2025-01-12 08:04:12'),
(17, 9, '1GB', 'Vàng', 'variants/QYpvHoWovVBbWRgXWbhPQm7uYM7m4sZ7DlodOUCb.jpg', 24, 226888.00, '2025-01-12 00:57:54', '2025-01-12 08:03:52'),
(18, 9, '10GB', 'Vàng', 'variants/hChjxGWu24Xu4G5n8CulTxr9efsyke8N7NjixEnU.jpg', 22, 885155.00, '2025-01-12 00:57:54', '2025-01-12 08:03:52'),
(19, 10, '4GB', 'Xanh', 'variants/TfLBeP7sB1IKCrRQHeheBWluX8rXvyrfhXQTyKpE.jpg', 54, 662079.00, '2025-01-12 00:57:54', '2025-01-12 08:03:27'),
(20, 10, '1GB', 'Xanh', 'variants/nBUs1gPFQdyCOP1tVp69z602qdeGaa3zse9dIR01.jpg', 13, 530706.00, '2025-01-12 00:57:54', '2025-01-12 08:03:27'),
(21, 11, '1GB', 'Đen', 'variants/z4RjiLQBWUU5XGTQY4M2Xt4ev26bvfVwU7p1KTD2.jpg', 48, 812365.00, '2025-01-12 00:57:54', '2025-01-12 08:02:58'),
(22, 11, '9GB', 'Vàng', 'variants/UyqAV97gB8MnCOA1QW7ys753lxEoPYQWMim9BI6R.jpg', 30, 186944.00, '2025-01-12 00:57:54', '2025-01-12 08:02:58'),
(23, 12, '1GB', 'Vàng', 'variants/Hpv7A3hl9ZE9Kmw2gCG3JYIQuJR9EAkAZ54h3bYP.jpg', 97, 226267.00, '2025-01-12 00:57:54', '2025-01-12 08:01:58'),
(24, 12, '2GB', 'Vàng', 'variants/Ifo32A6tJRpetJ8h02NzlSfkEfRBd3nsaaiu38zE.jpg', 48, 450168.00, '2025-01-12 00:57:54', '2025-01-12 08:01:58'),
(25, 13, '8GB', 'Xanh', 'variants/urxvNV8bJIdHQpHh2zZ3inylzaA1Z4A17PAUai8l.jpg', 23, 771117.00, '2025-01-12 00:57:54', '2025-01-12 08:01:23'),
(26, 13, '3GB', 'Đen', 'variants/SK2xJtXkhmkuWVBEVcnKftUx3x7nVUZVsVlYQgo6.jpg', 83, 492629.00, '2025-01-12 00:57:54', '2025-01-12 08:01:23'),
(27, 14, '10GB', 'Vàng', 'variants/mPPIv7fluhLDyp84brlRKnoGBNYelRvVuMgpqNYQ.jpg', 45, 676054.00, '2025-01-12 00:57:54', '2025-01-12 08:01:02'),
(28, 14, '10GB', 'Đen', 'variants/vgN2KL9ES6Q7aKLExeLFv9XBUrp97Ypttgjk5ivl.jpg', 68, 395801.00, '2025-01-12 00:57:54', '2025-01-12 08:01:02'),
(29, 15, '5GB', 'Đen', NULL, 46, 411987.00, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(30, 15, '9GB', 'Đỏ', NULL, 32, 925310.00, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(31, 16, '6GB', 'Đen', 'variants/IxL2g0LHZbNEuNnkxM5Da6Sj3e0mgSF7RsvolGUB.jpg', 61, 557176.00, '2025-01-12 00:57:54', '2025-01-12 08:00:37'),
(32, 16, '6GB', 'Vàng', 'variants/1njc9N2qnYDBjOK9kG4Jd311WVVqdDW4g8Eu5Hsb.jpg', 16, 117778.00, '2025-01-12 00:57:54', '2025-01-12 08:00:37'),
(33, 17, '2GB', 'Đen', 'variants/B3Xeab6RE9cnAaEPQcZBXHI088TCaSEX0LD6nQh8.jpg', 72, 358511.00, '2025-01-12 00:57:54', '2025-01-12 08:00:13'),
(34, 17, '7GB', 'Đỏ', 'variants/ZIWEtidv6SEJRzC89Y7V7Y4bmfkb1Ju4uy2rpMj7.jpg', 35, 396899.00, '2025-01-12 00:57:54', '2025-01-12 08:00:13'),
(35, 18, '9GB', 'Đen', 'variants/yXAuuerSUXkJGzwmpKauIHKoj3dynETaMHYBaarm.jpg', 81, 964872.00, '2025-01-12 00:57:54', '2025-01-12 07:59:23'),
(36, 18, '8GB', 'Vàng', 'variants/EIqrfl18RKuScgTsrdi1tG6woldX2cERKqK5v1V5.jpg', 77, 456099.00, '2025-01-12 00:57:54', '2025-01-12 07:59:23'),
(37, 19, '4GB', 'Đỏ', 'variants/G2qikUOfdlvVvLByXuC69pU0g6VVpyhxmxmB4N5J.jpg', 62, 388358.00, '2025-01-12 00:57:54', '2025-01-12 07:58:57'),
(38, 19, '4GB', 'Xanh', 'variants/Gc0faCLR0F3MrkucK0mvTtgeMEf1VwHKubgKclqj.jpg', 62, 306461.00, '2025-01-12 00:57:54', '2025-01-12 07:58:57'),
(39, 20, '100MB', 'Đỏ', 'variants/QVtw5yQnrwpFxv7nLF5jB9VEYdX3zoWRc30VIyTi.jpg', 20, 100000.00, '2025-01-12 07:58:23', '2025-01-12 07:58:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `san_pham_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `noi_dung` text NOT NULL,
  `sao` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`id`, `san_pham_id`, `user_id`, `noi_dung`, `sao`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '12345', 5, '2025-01-12 01:24:32', '2025-01-12 01:24:32'),
(2, 1, 1, '12345', 5, '2025-01-12 01:25:21', '2025-01-12 01:25:21'),
(3, 1, 1, '12345', 5, '2025-01-12 01:25:45', '2025-01-12 01:25:45'),
(4, 1, 1, '12345', 5, '2025-01-12 01:26:10', '2025-01-12 01:26:10'),
(5, 1, 1, '1234', 3, '2025-01-12 01:26:58', '2025-01-12 01:26:58'),
(6, 2, 1, 'Minh', 4, '2025-01-12 01:44:12', '2025-01-12 01:44:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `san_pham_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `so_luong` int(11) NOT NULL,
  `mau_sac` varchar(255) NOT NULL,
  `dung_luong` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `san_pham_id`, `user_id`, `so_luong`, `mau_sac`, `dung_luong`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 'Đen', '3GB', '2025-01-12 01:49:27', '2025-01-12 01:49:27'),
(2, 1, 1, 1, 'Đen', '6GB', '2025-01-12 05:48:00', '2025-01-12 05:48:00'),
(4, 1, 1, 12, 'Đen', '6GB', '2025-01-12 08:21:51', '2025-01-12 08:21:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `don_hang_id` bigint(20) UNSIGNED NOT NULL,
  `product_variant_id` bigint(20) UNSIGNED NOT NULL,
  `ten_san_pham` varchar(255) NOT NULL,
  `ma_san_pham` varchar(255) NOT NULL,
  `anh_san_pham` varchar(255) NOT NULL,
  `don_gia` double NOT NULL,
  `gia_khuyen_mai` varchar(255) NOT NULL,
  `dung_luong` varchar(255) NOT NULL,
  `mau_sac` varchar(255) NOT NULL,
  `so_luong` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_hangs`
--

INSERT INTO `chi_tiet_don_hangs` (`id`, `don_hang_id`, `product_variant_id`, `ten_san_pham`, `ma_san_pham`, `anh_san_pham`, `don_gia`, `gia_khuyen_mai`, `dung_luong`, `mau_sac`, `so_luong`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'Sản phẩm 1', 'SP001', '', 481000, '225000', '142GB', 'Đen', 7, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(2, 1, 15, 'Sản phẩm 1', 'SP001', '', 432000, '109000', '413GB', 'Vàng', 10, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(3, 2, 6, 'Sản phẩm 2', 'SP002', '', 167000, '248000', '403GB', 'Vàng', 5, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(4, 2, 4, 'Sản phẩm 2', 'SP002', '', 162000, '252000', '138GB', 'Vàng', 5, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(5, 3, 11, 'Sản phẩm 3', 'SP003', '', 135000, '143000', '186GB', 'Vàng', 2, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(6, 3, 9, 'Sản phẩm 3', 'SP003', '', 248000, '352000', '111GB', 'Đỏ', 7, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(7, 4, 20, 'Sản phẩm 4', 'SP004', '', 425000, '323000', '501GB', 'Xanh', 7, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(8, 4, 6, 'Sản phẩm 4', 'SP004', '', 155000, '323000', '438GB', 'Đỏ', 7, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(9, 5, 1, 'Sản phẩm 5', 'SP005', '', 134000, '347000', '296GB', 'Đen', 4, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(10, 5, 4, 'Sản phẩm 5', 'SP005', '', 369000, '293000', '321GB', 'Xanh', 2, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(11, 6, 0, 'Sản phẩm 6', 'SP006', '', 262000, '337000', '265GB', 'Đỏ', 7, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(12, 6, 13, 'Sản phẩm 6', 'SP006', '', 277000, '278000', '128GB', 'Vàng', 6, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(13, 7, 8, 'Sản phẩm 7', 'SP007', '', 360000, '239000', '123GB', 'Vàng', 5, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(14, 7, 15, 'Sản phẩm 7', 'SP007', '', 366000, '246000', '169GB', 'Đen', 5, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(15, 8, 12, 'Sản phẩm 8', 'SP008', '', 355000, '345000', '340GB', 'Xanh', 4, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(16, 8, 16, 'Sản phẩm 8', 'SP008', '', 204000, '99000', '492GB', 'Xanh', 6, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(17, 9, 15, 'Sản phẩm 9', 'SP009', '', 495000, '184000', '480GB', 'Xanh', 5, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(18, 9, 15, 'Sản phẩm 9', 'SP009', '', 243000, '317000', '324GB', 'Xanh', 8, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(19, 10, 19, 'Sản phẩm 10', 'SP010', '', 492000, '334000', '480GB', 'Xanh', 6, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(20, 10, 5, 'Sản phẩm 10', 'SP010', '', 187000, '273000', '345GB', 'Đen', 8, '2025-01-12 00:57:54', '2025-01-12 00:57:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('percentage','fixed') NOT NULL,
  `value` double NOT NULL,
  `expiration_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `type`, `value`, `expiration_date`, `created_at`, `updated_at`) VALUES
(1, 'MINH', 'percentage', 10, '2025-01-13 07:59:00', '2025-01-12 00:59:26', '2025-01-12 00:59:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `ten_danh_muc` varchar(255) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_mucs`
--

INSERT INTO `danh_mucs` (`id`, `hinh_anh`, `ten_danh_muc`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, '', 'Điện thoại', 1, '2025-01-12 00:57:54', '2025-01-12 06:48:06'),
(2, '', 'Máy tính', 1, '2025-01-12 00:57:54', '2025-01-12 06:48:13'),
(3, '', 'Phụ Kiện Điện Thoại', 1, '2025-01-12 00:57:54', '2025-01-12 06:48:26'),
(4, '', 'Flycam', 1, '2025-01-12 00:57:54', '2025-01-12 06:52:43'),
(5, '', 'TV', 1, '2025-01-12 00:57:54', '2025-01-12 06:52:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_don_hang` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ten_nguoi_nhan` varchar(255) NOT NULL,
  `email_nguoi_nhan` varchar(255) NOT NULL,
  `so_dien_thoai_nguoi_nhan` double NOT NULL,
  `dia_chi_nguoi_nhan` varchar(255) NOT NULL,
  `ghi_chu` text DEFAULT NULL,
  `coupon` varchar(255) DEFAULT NULL,
  `trang_thai_don_hang` varchar(255) NOT NULL DEFAULT 'cho_xac_nhan',
  `trang_thai_thanh_toan` varchar(255) NOT NULL DEFAULT 'chua_thanh_toan',
  `phuong_thuc_thanh_toan` varchar(255) NOT NULL DEFAULT 'COD',
  `tien_hang` double NOT NULL,
  `tien_khuyen_mai` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tien_ship` double NOT NULL,
  `tong_tien` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `ma_don_hang`, `user_id`, `ten_nguoi_nhan`, `email_nguoi_nhan`, `so_dien_thoai_nguoi_nhan`, `dia_chi_nguoi_nhan`, `ghi_chu`, `coupon`, `trang_thai_don_hang`, `trang_thai_thanh_toan`, `phuong_thuc_thanh_toan`, `tien_hang`, `tien_khuyen_mai`, `tien_ship`, `tong_tien`, `created_at`, `updated_at`) VALUES
(1, 'DHBME7WQ', 1, 'Merritt Marquardt', 'adriel36@kunze.com', 9649666923, '36936 Viva Greens\nNaderborough, ID 22656', 'Earum veritatis quibusdam iusto id.', NULL, 'dang_chuan_bi', 'chua_thanh_toan', 'COD', 862307, 41247.00, 47362, 868422, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(2, 'DHSXAM7U', 1, 'Dr. Chad Rempel Sr.', 'johnston.ford@hotmail.com', 6936999697, '51250 Konopelski Summit\nRaeshire, MN 88526', 'Esse cumque qui dolore adipisci culpa sequi.', NULL, 'dang_chuan_bi', 'chua_thanh_toan', 'COD', 144792, 60668.00, 20511, 104635, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(3, 'DHXQHCJG', 1, 'Ms. Sunny Hoeger V', 'clair.reynolds@yahoo.com', 2791111217, '7175 Labadie Neck Apt. 591\nPort Opheliaborough, UT 56979', 'Ab eum eos sunt et nisi enim nesciunt.', NULL, 'dang_chuan_bi', 'chua_thanh_toan', 'COD', 708142, 53769.00, 34802, 689175, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(4, 'DHEFCIRV', 1, 'Tiara Block', 'alyson00@marquardt.com', 3522273004, '6182 Annamarie Mountain Apt. 124\nGradybury, NC 75049', 'Vel aut voluptas et velit et non ea nostrum.', NULL, 'dang_chuan_bi', 'chua_thanh_toan', 'COD', 764393, 311917.00, 35690, 488166, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(5, 'DHQVMGXG', 1, 'Sophia Kuhlman DVM', 'yconroy@pouros.org', 9967646507, '9699 Isidro Cliffs\nRowehaven, VT 77106-3169', 'Totam molestiae id aliquid maxime culpa veniam fuga.', NULL, 'dang_chuan_bi', 'chua_thanh_toan', 'COD', 347208, 102499.00, 38823, 283532, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(6, 'DHLEM1QT', 1, 'Jasmin Wunsch', 'satterfield.russell@feest.com', 3593738811, '7079 Kariane Springs\nScottiebury, WY 98914-2529', 'Vitae quisquam est consequuntur ducimus itaque.', NULL, 'dang_chuan_bi', 'chua_thanh_toan', 'COD', 764711, 217773.00, 26018, 572956, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(7, 'DHNWJ28K', 1, 'Elvis Kunde', 'quitzon.abraham@lubowitz.com', 2952321179, '510 Reese Isle Apt. 235\nWest Judd, RI 85359-6055', 'Consequatur sapiente odio quibusdam aut.', NULL, 'dang_chuan_bi', 'chua_thanh_toan', 'COD', 802892, 111062.00, 28941, 720771, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(8, 'DHAAGBD3', 1, 'Ernestina Rau', 'schulist.terrell@yahoo.com', 333779107, '85289 Jacobi Points Apt. 268\nDejafurt, OH 31699', 'Quia quisquam et at temporibus et et quo nemo.', NULL, 'dang_chuan_bi', 'chua_thanh_toan', 'COD', 158883, 35309.00, 44878, 168452, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(9, 'DH5QKP9H', 1, 'Millie Kirlin MD', 'bradley79@yahoo.com', 1370473564, '31573 Zackary Stream Suite 500\nLake Jovany, CA 54654-2819', 'Sequi nihil aut nostrum qui.', NULL, 'dang_chuan_bi', 'chua_thanh_toan', 'COD', 500767, 137005.00, 40368, 404130, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(10, 'DHCECXC0', 1, 'Miss Abbigail Abshire DVM', 'antonietta36@gmail.com', 8673627287, '30261 Kreiger Drives Suite 303\nBoscoland, ID 85302-8867', 'Dolorem ut officiis inventore ut iusto quis ut.', NULL, 'dang_chuan_bi', 'chua_thanh_toan', 'COD', 732212, 219721.00, 31260, 543751, '2025-01-12 00:57:54', '2025-01-12 00:57:54'),
(11, 'ORD-1-1736686091', 1, 'Tamia Jacobson', 'admin@gmail.com', 2560489854, '828 Beau FortNorth Fordshire, GA 39691', NULL, NULL, 'cho_xac_nhan', 'chua_thanh_toan', 'COD', 437885, 0.00, 20000, 20000, '2025-01-12 05:48:11', '2025-01-12 05:48:11'),
(12, 'ORD-1-1736686102', 1, 'Tamia Jacobson', 'admin@gmail.com', 2560489854, '828 Beau FortNorth Fordshire, GA 39691', 'ádadasd', NULL, 'cho_xac_nhan', 'chua_thanh_toan', 'COD', 437885, 0.00, 20000, 20000, '2025-01-12 05:48:22', '2025-01-12 05:48:22'),
(13, 'ORD-1-1736686138', 1, 'Tamia Jacobson', 'admin@gmail.com', 2560489854, '828 Beau FortNorth Fordshire, GA 39691', 'sadadasdasdasd', NULL, 'cho_xac_nhan', 'chua_thanh_toan', 'COD', 437885, 0.00, 20000, 20000, '2025-01-12 05:48:58', '2025-01-12 05:48:58'),
(14, 'ORD-1-1736686206', 1, 'Tamia Jacobson', 'admin@gmail.com', 2560489854, '828 Beau FortNorth Fordshire, GA 39691', NULL, NULL, 'cho_xac_nhan', 'chua_thanh_toan', 'COD', 437885, 0.00, 20000, 20000, '2025-01-12 05:50:06', '2025-01-12 05:50:06'),
(15, 'ORD-1-1736686346', 1, 'Tamia Jacobson', 'admin@gmail.com', 2560489854, '828 Beau FortNorth Fordshire, GA 39691', NULL, NULL, 'cho_xac_nhan', 'chua_thanh_toan', 'COD', 437885, 0.00, 20000, 20000, '2025-01-12 05:52:26', '2025-01-12 05:52:26'),
(18, 'ORD-1-1736687597', 1, 'Tamia Jacobson', 'admin@gmail.com', 2560489854, '828 Beau FortNorth Fordshire, GA 39691', NULL, NULL, 'cho_xac_nhan', 'chua_thanh_toan', 'COD', 437885, 0.00, 20000, 457885, '2025-01-12 06:13:17', '2025-01-12 06:13:17'),
(19, 'ORD-1-1736688390', 1, 'Tamia Jacobson', 'admin@gmail.com', 2560489854, '828 Beau FortNorth Fordshire, GA 39691', NULL, NULL, 'cho_xac_nhan', 'chua_thanh_toan', 'COD', 437885, 0.00, 20000, 457885, '2025-01-12 06:26:30', '2025-01-12 06:26:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hangs`
--

CREATE TABLE `hangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_hang` varchar(255) NOT NULL,
  `mo_ta` text DEFAULT NULL,
  `danh_muc_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hangs`
--

INSERT INTO `hangs` (`id`, `ten_hang`, `mo_ta`, `danh_muc_id`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', NULL, 1, '2025-01-12 00:57:54', '2025-01-12 07:01:16'),
(2, 'DELL', NULL, 2, '2025-01-12 00:57:54', '2025-01-12 07:01:33'),
(3, 'HP', NULL, 2, '2025-01-12 00:57:54', '2025-01-12 06:54:28'),
(4, 'Samsung', NULL, 3, '2025-01-12 00:57:54', '2025-01-12 06:54:14'),
(5, 'Apple', NULL, 2, '2025-01-12 00:57:54', '2025-01-12 07:01:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinh_anh_san_phams`
--

CREATE TABLE `hinh_anh_san_phams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `san_pham_id` bigint(20) UNSIGNED NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hinh_anh_san_phams`
--

INSERT INTO `hinh_anh_san_phams` (`id`, `san_pham_id`, `hinh_anh`, `created_at`, `updated_at`) VALUES
(1, 20, 'hinh_anh_san_phams/FyPIOQc1ehCbK0cMoC5C9ihz3PCDEHAZKw8YPogM.jpg', '2025-01-12 07:58:23', '2025-01-12 07:58:23'),
(2, 20, 'hinh_anh_san_phams/aEji4z0PnuvGDaaztFZRq9KR2iuXcUlr7RGNceHI.jpg', '2025-01-12 07:58:23', '2025-01-12 07:58:23'),
(3, 20, 'hinh_anh_san_phams/x07UtaXDkWh6T5cRb45pnFSqgXPml7LEFYYO0RO6.jpg', '2025-01-12 07:58:23', '2025-01-12 07:58:23'),
(4, 20, 'hinh_anh_san_phams/jtVJmv9UneDCP1O4fgR2O0jyzoZXn3n9PD3hlkzX.jpg', '2025-01-12 07:58:23', '2025-01-12 07:58:23'),
(5, 20, 'hinh_anh_san_phams/cNpnhTFpf55tlIHPIr3RjUKmviMSiTW4vARkMOVE.jpg', '2025-01-12 07:58:23', '2025-01-12 07:58:23'),
(6, 19, 'hinh_anh_san_phams/9ZOmhxO1nqhXHsuxFvfzhVpizLwKyj8BRdUlj3pz.jpg', '2025-01-12 07:58:57', '2025-01-12 07:58:57'),
(7, 19, 'hinh_anh_san_phams/AmGbV23SH84lRZ3zMFV9DDuvwy1DLUw1yH6Upn1D.jpg', '2025-01-12 07:58:57', '2025-01-12 07:58:57'),
(8, 19, 'hinh_anh_san_phams/TNznRXkTbb6NiTAQ1qoa7FvBhoePIo7SwDePgFPS.jpg', '2025-01-12 07:58:57', '2025-01-12 07:58:57'),
(9, 19, 'hinh_anh_san_phams/WVrtcdE4AxCdQn218e4iMdrQKgomLHCWT0rsrgR2.jpg', '2025-01-12 07:58:57', '2025-01-12 07:58:57'),
(10, 19, 'hinh_anh_san_phams/jp6palvwFsziGhYtPDQYnfbwsW1qiJn7wFDQAnol.jpg', '2025-01-12 07:58:57', '2025-01-12 07:58:57'),
(11, 18, 'hinh_anh_san_phams/f4jIziK4GA8ZizqLJL9V3pEugPEzzuBcxDmdy6zK.jpg', '2025-01-12 07:59:23', '2025-01-12 07:59:23'),
(12, 18, 'hinh_anh_san_phams/XT3EXwezlwmRsRpj2Za3usu8ryhXie8Ty61eQtLz.jpg', '2025-01-12 07:59:23', '2025-01-12 07:59:23'),
(13, 18, 'hinh_anh_san_phams/2AzAvoiRGeU6qYd8mP5UNqPjcGVK8jdjjvQmzRQV.jpg', '2025-01-12 07:59:23', '2025-01-12 07:59:23'),
(14, 18, 'hinh_anh_san_phams/TuPqzrt0V9EAKovgPRiMfGZTzMsgRXL37mlxvWO0.jpg', '2025-01-12 07:59:23', '2025-01-12 07:59:23'),
(15, 18, 'hinh_anh_san_phams/yZ3f9epsZVG8RqA7zSFPmh7thKic8k6G3vngSRB9.jpg', '2025-01-12 07:59:23', '2025-01-12 07:59:23'),
(16, 18, 'hinh_anh_san_phams/Z2naAK6KQSHNiNGYUXqYt2Pyf9qqFD0n3nTlPGgo.jpg', '2025-01-12 07:59:23', '2025-01-12 07:59:23'),
(17, 17, 'hinh_anh_san_phams/KTRNUzibZ5Q9eiSwUs06nFhOx00zn5J7fCx5JRcZ.jpg', '2025-01-12 08:00:13', '2025-01-12 08:00:13'),
(18, 17, 'hinh_anh_san_phams/7ZZouvV99Y9sSGYU2HrScHeNGBfkcRxZrvG0J5h5.jpg', '2025-01-12 08:00:13', '2025-01-12 08:00:13'),
(19, 17, 'hinh_anh_san_phams/mSsfhuslXGjQDioExi19XHs5f2fPlrZ0gRccXMqQ.jpg', '2025-01-12 08:00:13', '2025-01-12 08:00:13'),
(20, 17, 'hinh_anh_san_phams/pzDsgrQ1QtCOXS4VhFXiLGIv0flR13dPYXh7IDPm.jpg', '2025-01-12 08:00:13', '2025-01-12 08:00:13'),
(21, 17, 'hinh_anh_san_phams/UlG0NHV1Ky5KJQIJK5Y0g39llAdVUqBG4AcpZZAA.jpg', '2025-01-12 08:00:13', '2025-01-12 08:00:13'),
(22, 16, 'hinh_anh_san_phams/9e1hAsmQVmIXiD1O9HQT9Owu6bQ7x9ZxhMZq9CGB.jpg', '2025-01-12 08:00:37', '2025-01-12 08:00:37'),
(23, 16, 'hinh_anh_san_phams/Kloh2tGNSBmpgvCYh6ohqXeSAqg1VI9ejdT7MYwy.jpg', '2025-01-12 08:00:37', '2025-01-12 08:00:37'),
(24, 16, 'hinh_anh_san_phams/LZ2w5U3NDhRKDu5UOrh1Yg5h353XGrInSFUPdZuy.jpg', '2025-01-12 08:00:37', '2025-01-12 08:00:37'),
(25, 16, 'hinh_anh_san_phams/3sRjdOonMiF0rTf6uWMhxhx8XmqNsir5LCGzHeDv.jpg', '2025-01-12 08:00:37', '2025-01-12 08:00:37'),
(26, 16, 'hinh_anh_san_phams/pbH6ukPA3Syc4dYAFtPoLFWuVT7LiaUl2aoTJg26.jpg', '2025-01-12 08:00:37', '2025-01-12 08:00:37'),
(27, 16, 'hinh_anh_san_phams/aW9tb0OoIDp7UjOQJswXdB2uiFuzYerFNroEBmtp.jpg', '2025-01-12 08:00:37', '2025-01-12 08:00:37'),
(28, 16, 'hinh_anh_san_phams/6HighcNL9Us6Lhgto7OKyoUGJZ1lw83tB0CG4AX7.jpg', '2025-01-12 08:00:37', '2025-01-12 08:00:37'),
(29, 14, 'hinh_anh_san_phams/x2Ue6vYl1sK8tUgRCJIUnlzqugv9FIl3kMStFHPZ.jpg', '2025-01-12 08:01:02', '2025-01-12 08:01:02'),
(30, 14, 'hinh_anh_san_phams/5S7KptJEepnPhN9dCTdjnJ4WNyT0vzgC1N0x9vtI.jpg', '2025-01-12 08:01:02', '2025-01-12 08:01:02'),
(31, 14, 'hinh_anh_san_phams/ZQLGyLbPDUNAtazPDmAYKEL14b1cgjcL7zEcreZl.jpg', '2025-01-12 08:01:02', '2025-01-12 08:01:02'),
(32, 14, 'hinh_anh_san_phams/wMGlop8DYllDbMjYquju93j5lB6A1x7CSHV5Pzd2.jpg', '2025-01-12 08:01:02', '2025-01-12 08:01:02'),
(33, 14, 'hinh_anh_san_phams/NmjMPwmrarVvRPPADWd1O9L0XP0iwFAL3j2DUtg4.jpg', '2025-01-12 08:01:02', '2025-01-12 08:01:02'),
(34, 14, 'hinh_anh_san_phams/rs9VyNDvV3S38cc7su4ONav84dVGymAbeO4Jk9Cq.jpg', '2025-01-12 08:01:02', '2025-01-12 08:01:02'),
(35, 13, 'hinh_anh_san_phams/3T9Rnxc7XY9hbAjmqo5xF3YUsM0JF1DFmHt7VOHn.jpg', '2025-01-12 08:01:23', '2025-01-12 08:01:23'),
(36, 13, 'hinh_anh_san_phams/2n0RMGdJqGgpT6aPu2WsZURNB8J6UFDjXK7T0IqL.jpg', '2025-01-12 08:01:23', '2025-01-12 08:01:23'),
(37, 13, 'hinh_anh_san_phams/kKJCtjOw9qvsZkRWGUOmLumy2aKZ4vcT6GQYTgsu.jpg', '2025-01-12 08:01:23', '2025-01-12 08:01:23'),
(38, 13, 'hinh_anh_san_phams/GfbxjzDwbv92814vRtPPIzSbsWjhdmuXjbbxU0pM.jpg', '2025-01-12 08:01:23', '2025-01-12 08:01:23'),
(39, 13, 'hinh_anh_san_phams/ysERRsJUBaHwzGTR0dKxIvjYwkBgEmeaZA6CXHOZ.jpg', '2025-01-12 08:01:23', '2025-01-12 08:01:23'),
(40, 12, 'hinh_anh_san_phams/nQ6PHdNDaSDDf96Vm3L0lGAIcTIIP0thoyENkwll.jpg', '2025-01-12 08:01:58', '2025-01-12 08:01:58'),
(41, 12, 'hinh_anh_san_phams/IjTlM4vSVAlkqfVE5ksX3syYQK8Rn6ad2cy1QCuh.jpg', '2025-01-12 08:01:58', '2025-01-12 08:01:58'),
(42, 12, 'hinh_anh_san_phams/CDgw0F3GeTuKBcxrQZUq0vnV0KBtp4Q6R8wix6Gb.jpg', '2025-01-12 08:01:58', '2025-01-12 08:01:58'),
(43, 12, 'hinh_anh_san_phams/viS7kWdaCZPj6VWbzrso1Qjq2ATZ2WGgoY8cnwpK.jpg', '2025-01-12 08:01:58', '2025-01-12 08:01:58'),
(44, 12, 'hinh_anh_san_phams/X5QsyjvzQk3neMHf1FqfepMBLVM8CrfbZT8HB6Wl.jpg', '2025-01-12 08:01:58', '2025-01-12 08:01:58'),
(45, 12, 'hinh_anh_san_phams/MwvmC9tYYRhcDrfX50ygVj9hKktxd1l2kYYGScyn.jpg', '2025-01-12 08:01:58', '2025-01-12 08:01:58'),
(46, 12, 'hinh_anh_san_phams/aklR92gyCDTVMorXipkrUoPRtgslUWBKTT9mnR0s.jpg', '2025-01-12 08:01:58', '2025-01-12 08:01:58'),
(47, 12, 'hinh_anh_san_phams/yuAODpCf6zfZomJcmVsMpxXyL2s98a8wDXa9nIxW.jpg', '2025-01-12 08:01:58', '2025-01-12 08:01:58'),
(48, 11, 'hinh_anh_san_phams/xzbltyI7corkyVhuVbw8ApslBJZVryzMZmF1oobg.jpg', '2025-01-12 08:02:58', '2025-01-12 08:02:58'),
(49, 11, 'hinh_anh_san_phams/9LK8eiRHicOOeVY3Qu60YAmb09kUIfpK5A8fT2cH.jpg', '2025-01-12 08:02:58', '2025-01-12 08:02:58'),
(50, 11, 'hinh_anh_san_phams/Pt5EYEfeX7BEuIaUqWOnast1V7uKWDbdh0nIDFr7.jpg', '2025-01-12 08:02:58', '2025-01-12 08:02:58'),
(51, 11, 'hinh_anh_san_phams/aSP0dgE0pVOb1mitWpE8EunkHGkD4Ihn9jDxzYYs.jpg', '2025-01-12 08:02:58', '2025-01-12 08:02:58'),
(52, 11, 'hinh_anh_san_phams/Jqe7J3VmfKPpSaM6CgbZM4jBSqgAudvDG3O9WIla.jpg', '2025-01-12 08:02:58', '2025-01-12 08:02:58'),
(53, 10, 'hinh_anh_san_phams/LAMNpuG0C1qlPuifi2MjxAF3f9stHOORkGUVWvdg.jpg', '2025-01-12 08:03:27', '2025-01-12 08:03:27'),
(54, 10, 'hinh_anh_san_phams/yyF9h1DAjKFwmwX2SgiDXpwTzqFnsgxpcpeFDqL0.jpg', '2025-01-12 08:03:27', '2025-01-12 08:03:27'),
(55, 10, 'hinh_anh_san_phams/mZBcBMaAAJF57MhrLvHrABn8la6QnnBXovWh8gD2.jpg', '2025-01-12 08:03:27', '2025-01-12 08:03:27'),
(56, 10, 'hinh_anh_san_phams/yTeYWPFksToPRs3Ica5qjA0yyYWtKPG8AbGvNDz3.jpg', '2025-01-12 08:03:27', '2025-01-12 08:03:27'),
(57, 10, 'hinh_anh_san_phams/1LqAkpCJk4UwoQiM64Sh4zmXA9YPRZBfLI5ztw7X.jpg', '2025-01-12 08:03:27', '2025-01-12 08:03:27'),
(58, 9, 'hinh_anh_san_phams/rzJNmIzZk2MrFGpYYMFgSvAPOSLMPImh5bHJwGu5.jpg', '2025-01-12 08:03:52', '2025-01-12 08:03:52'),
(59, 9, 'hinh_anh_san_phams/quqfXeZnWN9mofarRP88jAkL5kTuDPhV2VKejJ6d.jpg', '2025-01-12 08:03:52', '2025-01-12 08:03:52'),
(60, 9, 'hinh_anh_san_phams/vGlxiyTC7DEjigZ5SPPN8DiSwYcPcTO1c2Tu1sJ7.jpg', '2025-01-12 08:03:52', '2025-01-12 08:03:52'),
(61, 9, 'hinh_anh_san_phams/oaJBJTxlfydzyXbOujQQannLD2Qb8Hoc9lsBfSMA.jpg', '2025-01-12 08:03:52', '2025-01-12 08:03:52'),
(62, 8, 'hinh_anh_san_phams/h1Vl2RsSIvIwuykY00WUm4NWluaJd688NHOlm2JT.jpg', '2025-01-12 08:04:12', '2025-01-12 08:04:12'),
(63, 8, 'hinh_anh_san_phams/mnYPlmjvGyEixZLQNEQSfBpP0Ttho9m4XSzmTAmD.jpg', '2025-01-12 08:04:12', '2025-01-12 08:04:12'),
(64, 8, 'hinh_anh_san_phams/8FD1G6XWkQsflYWj2LiAfQ4tpd8uslal93UH4mrI.jpg', '2025-01-12 08:04:12', '2025-01-12 08:04:12'),
(65, 8, 'hinh_anh_san_phams/YbSDREzgIRRnGX36V1BsiXSacTNYTlZIKdLlUeZR.jpg', '2025-01-12 08:04:12', '2025-01-12 08:04:12'),
(66, 8, 'hinh_anh_san_phams/IdqrwdAlQ9n00Vrj4oJa73GFObQvYVSvHZ8HMk01.jpg', '2025-01-12 08:04:12', '2025-01-12 08:04:12'),
(67, 7, 'hinh_anh_san_phams/6sHEAL8ZjiCJXJqxcivmeWcEGcGSDC0FR45qasRm.jpg', '2025-01-12 08:04:42', '2025-01-12 08:04:42'),
(68, 7, 'hinh_anh_san_phams/dKqXYW7A6MHNIMrYZyy2njBaXroZlf04VxN8gDkN.jpg', '2025-01-12 08:04:42', '2025-01-12 08:04:42'),
(69, 7, 'hinh_anh_san_phams/NOg9Bj9wfe26dQwY5NOsZts2Bs6ravstX25lhaSU.jpg', '2025-01-12 08:04:42', '2025-01-12 08:04:42'),
(70, 7, 'hinh_anh_san_phams/lntre7YN82PBzRwcVyN4zaNEsRJCmAkSPRwJ1myH.jpg', '2025-01-12 08:04:42', '2025-01-12 08:04:42'),
(71, 7, 'hinh_anh_san_phams/Ppyf4jBaHRFne0RUCurCulLvCjhmCJG8dtqY3enF.jpg', '2025-01-12 08:04:42', '2025-01-12 08:04:42'),
(72, 6, 'hinh_anh_san_phams/aKgH9fg5JwH5iGWEymbR06Cn5a5nSGYwcC9qlYkm.jpg', '2025-01-12 08:05:03', '2025-01-12 08:05:03'),
(73, 6, 'hinh_anh_san_phams/RF72mwm9k2c3nSG7JMeSEBPKaKxNPqZjOHBNhn5F.jpg', '2025-01-12 08:05:03', '2025-01-12 08:05:03'),
(74, 6, 'hinh_anh_san_phams/7VgqheaEpOkO4gJ2AD0AJaBXMBmzpD3Kry6YioTK.jpg', '2025-01-12 08:05:03', '2025-01-12 08:05:03'),
(75, 6, 'hinh_anh_san_phams/ycPTVm8mtlT3Wqe8iMwfPjyfmPIJ4G3FOi79jJiV.jpg', '2025-01-12 08:05:03', '2025-01-12 08:05:03'),
(76, 6, 'hinh_anh_san_phams/SWiKzK0KP3ULPHrqyeQv0SoMJJRpny32V3mFt4yp.jpg', '2025-01-12 08:05:03', '2025-01-12 08:05:03'),
(77, 5, 'hinh_anh_san_phams/CszZoP5er0G8hwWnnPz2nORDdg8tipUAPLJ2VhG6.jpg', '2025-01-12 08:05:25', '2025-01-12 08:05:25'),
(78, 5, 'hinh_anh_san_phams/539JJi7cYEm4Kvsw6bP0dE0Pm2x8MbnpBnaehzYZ.jpg', '2025-01-12 08:05:25', '2025-01-12 08:05:25'),
(79, 5, 'hinh_anh_san_phams/xEXGTz1BuQFxYnmrtRlPgtnJmM6V9MhqahAoYU03.jpg', '2025-01-12 08:05:25', '2025-01-12 08:05:25'),
(80, 5, 'hinh_anh_san_phams/6uYTwnnLZgzuvdBuTw49sizaWyN4sYtDHyX6XnUj.jpg', '2025-01-12 08:05:25', '2025-01-12 08:05:25'),
(81, 5, 'hinh_anh_san_phams/0NBI9yrBmuTndmT362Ll4XybxnQLxbRZLSd0yKOw.jpg', '2025-01-12 08:05:25', '2025-01-12 08:05:25'),
(82, 4, 'hinh_anh_san_phams/lp2XkuTrJSPVEuVM43qZm1iafK0zfnfAzo9Auu7d.jpg', '2025-01-12 08:05:57', '2025-01-12 08:05:57'),
(83, 4, 'hinh_anh_san_phams/bN03LMgi852piZfFIikAlpt1gPBVTWQBlQghuFk4.jpg', '2025-01-12 08:05:57', '2025-01-12 08:05:57'),
(84, 4, 'hinh_anh_san_phams/r01UtR4eX6DB06gDsePW25t88489q0avPQVAkEDC.jpg', '2025-01-12 08:05:57', '2025-01-12 08:05:57'),
(85, 4, 'hinh_anh_san_phams/a9qtckTFjxTFSmn6apjzyhXWrbJlT8CHRlycfZm7.jpg', '2025-01-12 08:05:57', '2025-01-12 08:05:57'),
(86, 4, 'hinh_anh_san_phams/tZ7mCUXpBbLNn7sp8lXeDIjAgni1wI5RdtiF7iNk.jpg', '2025-01-12 08:05:57', '2025-01-12 08:05:57'),
(87, 4, 'hinh_anh_san_phams/d0yxy3xjVgx1i4R6VCcr2AeSckwpICWJngYTbIMz.jpg', '2025-01-12 08:05:57', '2025-01-12 08:05:57'),
(88, 4, 'hinh_anh_san_phams/95MsLTlF4gxS6XYAw1T8dcGmqpx2gkGHlxHzRPH1.jpg', '2025-01-12 08:05:57', '2025-01-12 08:05:57'),
(89, 3, 'hinh_anh_san_phams/5EfKVWxJPdCdxQorYiPvQwSAZLeSqF4twgUC6B1K.jpg', '2025-01-12 08:06:21', '2025-01-12 08:06:21'),
(90, 3, 'hinh_anh_san_phams/Xv7EhRyfyyt5JAjhJYAl7yimuNpREirdgrby6xnb.jpg', '2025-01-12 08:06:21', '2025-01-12 08:06:21'),
(91, 3, 'hinh_anh_san_phams/EVS1pN2FLdCaBz3qWIaGdLvSwykOILY3CcfFkjUm.jpg', '2025-01-12 08:06:21', '2025-01-12 08:06:21'),
(92, 3, 'hinh_anh_san_phams/w1EE69YlldXcD9DRJ0aKpw8a12IMCFAcOyGHI5ld.jpg', '2025-01-12 08:06:21', '2025-01-12 08:06:21'),
(93, 3, 'hinh_anh_san_phams/DumSLZlVvBKYvGmjuWkOtjBJhKm8YgT5gmebkqkz.jpg', '2025-01-12 08:06:21', '2025-01-12 08:06:21'),
(94, 2, 'hinh_anh_san_phams/24c5YR8ErYrgck2geWqj31UX0blRVUMS55XQwuDE.jpg', '2025-01-12 08:06:43', '2025-01-12 08:06:43'),
(95, 2, 'hinh_anh_san_phams/78MtWx6n7YwTtWvrl0sg38fdK8iUXV7AsSYJoRB1.jpg', '2025-01-12 08:06:43', '2025-01-12 08:06:43'),
(96, 2, 'hinh_anh_san_phams/fNaJ1pjXKvrt0PnveKnviRbCwFMqNFOlqA4t6nkE.jpg', '2025-01-12 08:06:43', '2025-01-12 08:06:43'),
(97, 2, 'hinh_anh_san_phams/zpjZ8eZAmelC4f6KYe0ip4fHIyUR518qFdIwO6ek.jpg', '2025-01-12 08:06:43', '2025-01-12 08:06:43'),
(98, 2, 'hinh_anh_san_phams/vunNGHjo64pOsCkW83JuIWphw9r3FJdnRqOOsH9V.jpg', '2025-01-12 08:06:43', '2025-01-12 08:06:43'),
(99, 1, 'hinh_anh_san_phams/kFPDYfrNKObgbLV3cr18PHdxX2g7r1dU0J2R1Y27.jpg', '2025-01-12 08:07:02', '2025-01-12 08:07:02'),
(100, 1, 'hinh_anh_san_phams/K5ZkqXPjxgtsDmPrDSkN0Jj6QuYas5zSt7niAGHQ.jpg', '2025-01-12 08:07:02', '2025-01-12 08:07:02'),
(101, 1, 'hinh_anh_san_phams/ONzMM78glEihMPvo4bpDZo36Pe7UP5QFX4Bd3zuQ.jpg', '2025-01-12 08:07:02', '2025-01-12 08:07:02'),
(102, 1, 'hinh_anh_san_phams/2Ji3v5IHN13WSOAn9gvzUuEumnqhA5KBTs3nOZHk.jpg', '2025-01-12 08:07:02', '2025-01-12 08:07:02'),
(103, 1, 'hinh_anh_san_phams/LvvQa77ZIJ7yLsrMv3Bdn87Q3YjtYcFJ3xwSEcCI.jpg', '2025-01-12 08:07:02', '2025-01-12 08:07:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lien_hes`
--

CREATE TABLE `lien_hes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_lien_he` varchar(255) NOT NULL,
  `ten_khach_hang` varchar(255) NOT NULL,
  `email_khach_hang` varchar(255) NOT NULL,
  `chu_de` varchar(255) DEFAULT NULL,
  `noi_dung` text NOT NULL,
  `is_respond` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lien_hes`
--

INSERT INTO `lien_hes` (`id`, `ma_lien_he`, `ten_khach_hang`, `email_khach_hang`, `chu_de`, `noi_dung`, `is_respond`, `created_at`, `updated_at`) VALUES
(1, 'LH-12012025-001', '1342424', 'minh33490@gmail.com', 'werewr', 'ewrewrewr', 1, '2025-01-12 02:44:32', '2025-01-12 02:44:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(17, '2014_10_12_100000_create_password_resets_table', 1),
(18, '2019_08_19_000000_create_failed_jobs_table', 1),
(19, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(20, '2024_07_20_070909_create_danh_mucs_table', 1),
(21, '2024_07_20_072726_create_hangs_table', 1),
(22, '2024_07_20_073057_create_san_phams_table', 1),
(23, '2024_07_20_082909_create_hinh_anh_san_phams_table', 1),
(24, '2024_08_05_095837_create_jobs_table', 1),
(25, '2024_11_06_075317_create_thong_tin_trang_webs_table', 1),
(26, '2024_11_12_172219_create_banners_table', 1),
(27, '2024_11_14_174949_create_lien_hes_table', 1),
(28, '2024_11_15_143459_create_phan_hois_table', 1),
(29, '2024_11_17_133844_create_coupons_table', 1),
(30, '2024_12_24_074225_create_bien_the_san_pham_table', 1),
(31, '2024_12_25_073914_create_don_hangs_table', 1),
(32, '2024_12_25_073951_create_chi_tiet_don_hangs_table', 1),
(33, '2025_01_08_100224_create_binh_luan_table', 1),
(34, '2025_01_09_014215_create_cart_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phan_hois`
--

CREATE TABLE `phan_hois` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lien_he_id` bigint(20) UNSIGNED NOT NULL,
  `nguoi_phan_hoi` varchar(255) NOT NULL,
  `noi_dung` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phan_hois`
--

INSERT INTO `phan_hois` (`id`, `lien_he_id`, `nguoi_phan_hoi`, `noi_dung`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tamia Jacobson', 'sd,fnskjdfkjsdfdsfsdf', '2025-01-12 02:44:47', '2025-01-12 02:44:47'),
(2, 1, 'Tamia Jacobson', 'adfknakjdfhdaskjfhsdkjfhskdfjsdkjfhskdjfhdskj', '2025-01-12 02:52:56', '2025-01-12 02:52:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_phams`
--

CREATE TABLE `san_phams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_san_pham` varchar(255) NOT NULL,
  `ten_san_pham` varchar(255) NOT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `gia_san_pham` double NOT NULL,
  `gia_khuyen_mai` double DEFAULT NULL,
  `mo_ta_ngan` varchar(255) DEFAULT NULL,
  `noi_dung` varchar(255) DEFAULT NULL,
  `so_luong` int(11) NOT NULL,
  `luot_xem` int(11) NOT NULL DEFAULT 0,
  `danh_gia_trung_binh` double DEFAULT 0,
  `ngay_dang_ban` datetime NOT NULL,
  `so_luong_da_ban` int(11) DEFAULT 0,
  `danh_muc_id` bigint(20) UNSIGNED NOT NULL,
  `hang_id` bigint(20) UNSIGNED NOT NULL,
  `trang_thai` varchar(255) DEFAULT NULL,
  `is_type` tinyint(1) NOT NULL DEFAULT 1,
  `is_new` tinyint(1) NOT NULL DEFAULT 1,
  `is_hot` tinyint(1) NOT NULL DEFAULT 1,
  `is_hot_deal` tinyint(1) NOT NULL DEFAULT 1,
  `is_show_home` tinyint(1) NOT NULL DEFAULT 1,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_phams`
--

INSERT INTO `san_phams` (`id`, `ma_san_pham`, `ten_san_pham`, `hinh_anh`, `gia_san_pham`, `gia_khuyen_mai`, `mo_ta_ngan`, `noi_dung`, `so_luong`, `luot_xem`, `danh_gia_trung_binh`, `ngay_dang_ban`, `so_luong_da_ban`, `danh_muc_id`, `hang_id`, `trang_thai`, `is_type`, `is_new`, `is_hot`, `is_hot_deal`, `is_show_home`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'ĐT-12700355', 'excepturi possimus aperiam', 'sanphams/C6jHnBbqiZaUSkpGOQZAiqg4xCBRQHBQWzyBhBp0.jpg', 402402, 140227, 'Nihil sit.', 'Velit sint et pariatur autem.', 10, 667, 4.6, '2025-01-09 04:40:00', 0, 1, 2, 'da_len_lich', 2, 0, 0, 0, 1, 0, '2025-01-12 00:57:54', '2025-01-12 08:07:02'),
(2, 'PKĐT-12965197', 'aut sequi quaerat', 'sanphams/re15Wv98xI5CKcCKcuUNfNz5KDlAcJbmoUA0OptQ.jpg', 393026, 297658, 'Non perferendis.', 'Unde error corporis ratione. Est molestias dolores voluptatum sunt dolorem consectetur sunt.', 94, 863, 4, '2025-01-10 02:20:00', 0, 3, 1, 'da_len_lich', 0, 1, 0, 0, 0, 0, '2025-01-12 00:57:54', '2025-01-12 08:06:43'),
(3, 'F-12805294', 'necessitatibus odit iure', 'sanphams/AzRmWBxU6bs421hu1z3vjOuvNAvYpYs5BPZ8iXpx.jpg', 502835, 847271, 'Voluptates vero.', 'Ipsam non repudiandae rerum. Atque iure aspernatur libero voluptatum at.', 34, 801, 0, '2025-01-08 06:53:00', 0, 4, 2, 'da_len_lich', 1, 0, 1, 1, 0, 1, '2025-01-12 00:57:54', '2025-01-12 08:06:21'),
(4, 'MT-12118505', 'totam aliquam placeat', 'sanphams/giTCVx3POErhaJxTHIICotWN6nfy0KGXBMNmFXA0.jpg', 651347, 140508, 'Totam consequatur est.', 'Rerum rem repellat minima porro.', 24, 70, 0, '2025-01-10 20:34:00', 0, 2, 2, 'da_len_lich', 1, 1, 0, 0, 0, 0, '2025-01-12 00:57:54', '2025-01-12 08:05:57'),
(5, 'PKĐT-12489435', 'totam qui maiores', 'sanphams/TfefzUdNPaMi6rf0NAFT5PjJD4EDbPvexLwGQtTz.jpg', 507417, 267192, 'Est id eius.', 'Neque eos enim eum voluptatum. Qui repellendus tempora voluptas explicabo et.', 55, 45, 0, '2025-01-06 13:57:00', 0, 3, 4, 'da_len_lich', 2, 1, 1, 1, 0, 1, '2025-01-12 00:57:54', '2025-01-12 08:05:25'),
(6, 'F-12796487', 'repellat tempore eveniet', 'sanphams/SQ8JzAjFH1bT3ABaDRByb6tN3g9T9q1prSTOYj2K.jpg', 788384, 727484, 'Maiores cum.', 'Velit voluptas aspernatur est placeat. Distinctio sed odit sed nulla minima impedit.', 19, 329, 0, '2025-01-07 03:35:00', 0, 4, 4, 'da_len_lich', 0, 0, 0, 0, 1, 1, '2025-01-12 00:57:54', '2025-01-12 08:05:03'),
(7, 'MT-12811201', 'blanditiis atque corporis', 'sanphams/bdVtZhC0UROMHHY8bhJNmIbMeeTG63rf4M5J91Xn.jpg', 151249, 809806, 'Assumenda corrupti.', 'Provident rem facilis in qui ut.', 23, 364, 0, '2025-01-10 23:51:00', 0, 2, 2, 'da_len_lich', 1, 1, 0, 1, 1, 1, '2025-01-12 00:57:54', '2025-01-12 08:04:42'),
(8, 'MT-12559201', 'velit eveniet voluptatem', 'sanphams/V8oyCVyQ1Z4B1xmDvUCc28uX78xkTADfEh4auuWV.jpg', 606489, 895061, 'Ut vel.', 'At nesciunt nemo sed minus.', 11, 639, 0, '2025-01-07 14:58:00', 0, 2, 3, 'da_len_lich', 2, 0, 0, 1, 0, 1, '2025-01-12 00:57:54', '2025-01-12 08:04:12'),
(9, 'PKĐT-12699349', 'hic voluptates culpa', 'sanphams/9I9vJ9K3P7aJtwnf1eOSVsGUvhtcrQyu3ejf9tek.jpg', 460316, 552928, 'Ut aut doloremque.', 'Est dolorem quia cumque iure dolore placeat vero qui.', 78, 118, 0, '2025-01-01 19:22:00', 0, 3, 2, 'da_len_lich', 0, 0, 0, 1, 0, 1, '2025-01-12 00:57:54', '2025-01-12 08:03:52'),
(10, 'ĐT-12437567', 'ut facere sint', 'sanphams/Rowx1GW4qhei59lxQwtGq8nwoIioJdatI2X5Kgbw.jpg', 365661, 120422, 'Eius voluptas voluptate.', 'Est vitae dolore numquam aut odio tenetur aut. Et quo tempore iure corporis fuga ut.', 31, 722, 0, '2025-01-05 10:45:00', 0, 1, 2, 'da_len_lich', 0, 1, 1, 1, 1, 0, '2025-01-12 00:57:54', '2025-01-12 08:03:27'),
(11, 'F-12244941', 'est distinctio deleniti', 'sanphams/t2hkQRRlqwAsB2bPu17V1jvux6RYG7s0G2zrAMqN.jpg', 425951, 415077, 'Qui repellat beatae.', 'Qui aut et sit voluptatem maiores ullam repellat. Eum culpa recusandae atque et atque nihil deleniti.', 75, 106, 0, '2025-01-02 04:26:00', 0, 4, 4, 'da_len_lich', 1, 0, 0, 0, 0, 0, '2025-01-12 00:57:54', '2025-01-12 08:02:58'),
(12, 'ĐT-12318153', 'quasi qui ut', 'sanphams/ap20an9pOnpT6ROTpM4WrcHmwFj7K9uLEXiewMsw.jpg', 363974, 357922, 'Necessitatibus deleniti.', 'Reiciendis tenetur nam sint saepe.', 58, 319, 0, '2025-01-09 07:54:00', 0, 1, 1, 'da_len_lich', 2, 1, 0, 1, 1, 0, '2025-01-12 00:57:54', '2025-01-12 08:01:58'),
(13, 'ĐT-12123874', 'facere nesciunt similique', 'sanphams/1qrqlqKhOd9HfyobesjoGQbqmLlDkG6Hnu7cpVxl.jpg', 884248, 607074, 'Dolorem vel corporis.', 'Aliquid qui nemo ipsam dignissimos. Molestiae sit et excepturi quos.', 53, 787, 0, '2025-01-01 16:21:00', 0, 1, 1, 'da_len_lich', 0, 0, 1, 1, 1, 1, '2025-01-12 00:57:54', '2025-01-12 08:01:23'),
(14, 'ĐT-12331597', 'veniam quidem molestias', 'sanphams/ENILShY0JcShv1saxghc4SakQFd9Zb7ywHxZAk7v.jpg', 770648, 759040, 'Porro animi et.', 'Laborum voluptatem libero numquam temporibus. Soluta et aut cum dolores enim in recusandae.', 15, 514, 0, '2025-01-02 13:18:00', 0, 1, 4, 'da_len_lich', 1, 1, 1, 1, 0, 1, '2025-01-12 00:57:54', '2025-01-12 08:01:02'),
(15, 'IA-12941420', 'dolorem doloremque aperiam', 'sanphams/WjMauSA5j41K6oapnSk5tMrSrYmUh8s6LgBBdhvs.jpg', 757094, 535871, 'Qui eum.', 'Dolor vel at inventore quas eveniet aperiam assumenda. Assumenda aut et quia voluptas autem et pariatur maxime.', 96, 449, 0, '2025-01-05 04:44:00', 0, 4, 3, 'da_len_lich', 0, 0, 1, 0, 0, 0, '2025-01-12 00:57:54', '2025-01-12 06:16:32'),
(16, 'PKĐT-12618323', 'quis sapiente est', 'sanphams/cO0aihutac7NotV1N6YQDV1nMDDXXIK9QHTWJazM.jpg', 502392, 214381, 'Blanditiis quisquam.', 'Et praesentium dolorem facere culpa laborum. Quod quo est commodi labore.', 88, 66, 0, '2025-01-02 07:05:00', 0, 3, 3, 'da_len_lich', 2, 0, 1, 0, 1, 1, '2025-01-12 00:57:54', '2025-01-12 08:00:37'),
(17, 'PKĐT-12780479', 'enim officia ab', 'sanphams/53zNv1vZTD1cVEFHmRTIXqSd7gtiiTSiuukf3LWD.jpg', 259946, 715769, 'Deleniti quam.', 'Impedit eum quo et modi quidem.', 15, 438, 0, '2025-01-07 09:33:00', 0, 3, 1, 'da_len_lich', 2, 1, 0, 1, 1, 0, '2025-01-12 00:57:54', '2025-01-12 08:00:13'),
(18, 'PKĐT-12408673', 'cum ut voluptas', 'sanphams/8MSGkku9vinkQQH1buf7Gnhw7EALzNS2ctNo7LkW.jpg', 869503, 106747, 'Rerum minima excepturi.', 'Ipsa et architecto aliquid dolorem dolorum nihil.', 63, 884, 0, '2025-01-08 04:34:00', 0, 3, 4, 'da_len_lich', 2, 1, 0, 0, 1, 0, '2025-01-12 00:57:54', '2025-01-12 07:59:23'),
(19, 'ĐT-12130466', 'amet velit nam', 'sanphams/BvnEJLsjvIefWep1AtvimU66dYVNI54UyKAHPFQA.jpg', 462770, 545114, 'Eligendi at.', 'Molestiae veniam culpa quia sed.', 51, 670, 0, '2025-01-05 07:09:00', 0, 1, 3, 'da_len_lich', 1, 1, 1, 0, 1, 0, '2025-01-12 00:57:54', '2025-01-12 07:58:57'),
(20, 'ĐT-12648077', 'eos accusamus voluptatem', 'sanphams/E6q2e6dqanELDPW3OmxNckhUOqBYmM6ku1RXSGJZ.jpg', 786703, 410307, 'Fugiat quisquam perspiciatis.', 'Consequatur dolore quis sed dolores maiores velit esse. Est sapiente veritatis accusantium illo harum corrupti.', 46, 426, 0, '2025-01-05 09:17:00', 0, 1, 4, 'da_len_lich', 2, 0, 1, 0, 1, 0, '2025-01-12 00:57:54', '2025-01-12 07:58:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_tin_trang_webs`
--

CREATE TABLE `thong_tin_trang_webs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tieu_de` varchar(255) DEFAULT NULL,
  `mo_ta` text DEFAULT NULL,
  `so_dien_thoai` varchar(255) DEFAULT NULL,
  `email_ho_tro` varchar(255) DEFAULT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `anh` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Admin','User') NOT NULL DEFAULT 'User',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `anh`, `phone`, `email`, `address`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tamia Jacobson', NULL, '02560489854', 'admin@gmail.com', '828 Beau Fort\nNorth Fordshire, GA 39691', NULL, '12345678', 'Admin', NULL, '2025-01-12 00:57:54', '2025-01-12 00:57:54');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bien_the_san_pham`
--
ALTER TABLE `bien_the_san_pham`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_variant_unique` (`san_pham_id`,`dung_luong`,`mau_sac`);

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `binh_luan_san_pham_id_foreign` (`san_pham_id`),
  ADD KEY `binh_luan_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_san_pham_id_foreign` (`san_pham_id`),
  ADD KEY `cart_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chi_tiet_don_hangs_don_hang_id_foreign` (`don_hang_id`),
  ADD KEY `chi_tiet_don_hangs_product_variant_id_foreign` (`product_variant_id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_name_unique` (`name`);

--
-- Chỉ mục cho bảng `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `don_hangs_ma_don_hang_unique` (`ma_don_hang`),
  ADD KEY `don_hangs_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `hangs`
--
ALTER TABLE `hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hangs_danh_muc_id_foreign` (`danh_muc_id`);

--
-- Chỉ mục cho bảng `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hinh_anh_san_phams_san_pham_id_foreign` (`san_pham_id`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `lien_hes`
--
ALTER TABLE `lien_hes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lien_hes_ma_lien_he_unique` (`ma_lien_he`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `phan_hois`
--
ALTER TABLE `phan_hois`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phan_hois_lien_he_id_foreign` (`lien_he_id`);

--
-- Chỉ mục cho bảng `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `san_phams_ma_san_pham_unique` (`ma_san_pham`),
  ADD KEY `san_phams_danh_muc_id_foreign` (`danh_muc_id`),
  ADD KEY `san_phams_hang_id_foreign` (`hang_id`);

--
-- Chỉ mục cho bảng `thong_tin_trang_webs`
--
ALTER TABLE `thong_tin_trang_webs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `bien_the_san_pham`
--
ALTER TABLE `bien_the_san_pham`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hangs`
--
ALTER TABLE `hangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lien_hes`
--
ALTER TABLE `lien_hes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phan_hois`
--
ALTER TABLE `phan_hois`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `thong_tin_trang_webs`
--
ALTER TABLE `thong_tin_trang_webs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bien_the_san_pham`
--
ALTER TABLE `bien_the_san_pham`
  ADD CONSTRAINT `bien_the_san_pham_san_pham_id_foreign` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`);

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_san_pham_id_foreign` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `binh_luan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_san_pham_id_foreign` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD CONSTRAINT `chi_tiet_don_hangs_don_hang_id_foreign` FOREIGN KEY (`don_hang_id`) REFERENCES `don_hangs` (`id`),
  ADD CONSTRAINT `chi_tiet_don_hangs_product_variant_id_foreign` FOREIGN KEY (`product_variant_id`) REFERENCES `bien_the_san_pham` (`id`);

--
-- Các ràng buộc cho bảng `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD CONSTRAINT `don_hangs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `hangs`
--
ALTER TABLE `hangs`
  ADD CONSTRAINT `hangs_danh_muc_id_foreign` FOREIGN KEY (`danh_muc_id`) REFERENCES `danh_mucs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  ADD CONSTRAINT `hinh_anh_san_phams_san_pham_id_foreign` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`);

--
-- Các ràng buộc cho bảng `phan_hois`
--
ALTER TABLE `phan_hois`
  ADD CONSTRAINT `phan_hois_lien_he_id_foreign` FOREIGN KEY (`lien_he_id`) REFERENCES `lien_hes` (`id`);

--
-- Các ràng buộc cho bảng `san_phams`
--
ALTER TABLE `san_phams`
  ADD CONSTRAINT `san_phams_danh_muc_id_foreign` FOREIGN KEY (`danh_muc_id`) REFERENCES `danh_mucs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `san_phams_hang_id_foreign` FOREIGN KEY (`hang_id`) REFERENCES `hangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
