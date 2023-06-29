-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 29, 2023 lúc 08:48 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `book_haven`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `ID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `images_book` varchar(200) NOT NULL,
  `Discount` decimal(10,2) DEFAULT 0.00,
  `CreatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`ID`, `Title`, `Author`, `Description`, `Price`, `CategoryID`, `images_book`, `Discount`, `CreatedAt`) VALUES
(24, 'Cây Cam Ngọt Của Tôi', 'José Mauro de Vasconcelos', 'Cây Cam Ngọt Của Tôi', '81000.00', 22, '', '0.00', '0000-00-00 00:00:00'),
(25, 'Nhà Giả Kim (Tái Bản 2020)', 'Paulo Coelho', 'Nhà Giả Kim (Tái Bản 2020)', '60000.00', 22, '', '25000.00', '0000-00-00 00:00:00'),
(26, 'Tôi Là Bêtô (Tái Bản 2018)', 'Nguyễn Nhật Ánh', 'Tôi Là Bêtô (Tái Bản 2018)', '68000.00', 22, '', '0.00', '0000-00-00 00:00:00'),
(28, 'Bước Chậm Lại Giữa Thế Gian Vội Vã', 'Hae Min', 'Bước Chậm Lại Giữa Thế Gian Vội Vã', '68000.00', 22, '', '0.00', '0000-00-00 00:00:00'),
(29, 'Totto-Chan Bên Cửa Sổ (Tái Bản 2019)', 'Kuroyanagi Tetsuko', 'Totto-Chan Bên Cửa Sổ (Tái Bản 2019)', '79000.00', 22, '', '40000.00', '0000-00-00 00:00:00'),
(30, 'Chiến Binh Cầu Vồng (Tái Bản 2020)', 'Andrea Hirata', 'Chiến Binh Cầu Vồng (Tái Bản 2020)', '87000.00', 22, '', '0.00', '0000-00-00 00:00:00'),
(31, 'Một Lít Nước Mắt (Tái Bản 2019)', 'Kito Aya', 'Một Lít Nước Mắt (Tái Bản 2019)', '68000.00', 22, '', '60000.00', '0000-00-00 00:00:00'),
(32, 'Thất Tịch Không Mưa (Tái Bản 2017)', 'Lâu Vũ Tình', 'Thất Tịch Không Mưa (Tái Bản 2017)', '60000.00', 26, '', '20000.00', '0000-00-00 00:00:00'),
(33, 'Khoa Học Trong Chạy Bộ - Khám Phá Giới Hạn', 'Steve Magness', 'Khoa Học Trong Chạy Bộ - Khám Phá Giới Hạn', '238000.00', 25, '', '30000.00', '0000-00-00 00:00:00'),
(34, 'Kinh Doanh Dựa Trên Thành Viên', 'John Warrillow', 'Kinh Doanh Dựa Trên Thành Viên', '101000.00', 29, '', '40000.00', '0000-00-00 00:00:00'),
(35, 'Hành Trang Lập Trình - Những Kỹ Năng Lập Trình', 'Vũ Công Tấn Tài', 'Hành Trang Lập Trình - Những Kỹ Năng Lập Trình', '152000.00', 30, '', '30000.00', '0000-00-00 00:00:00'),
(36, 'Sách Đắc Nhân Tâm( khổ lớn)', 'Dale Carnegie', 'Sách Đắc Nhân Tâm( khổ lớn)', '86000.00', 26, '', '10000.00', '0000-00-00 00:00:00'),
(37, 'Thao Túng Tâm Lý - Nhận Diện, Thức Tỉnh', 'Shannon Thomas, LCSW', 'Thao Túng Tâm Lý - Nhận Diện, Thức Tỉnh', '126000.00', 26, '', '30000.00', '0000-00-00 00:00:00'),
(38, 'Cho Và Nhận - Bài Học Cuộc Đời', 'Lê Doãn Hợp', 'Cho Và Nhận - Bài Học Cuộc Đời', '102000.00', 26, '', '22000.00', '0000-00-00 00:00:00'),
(42, 'Giết Con Chim Nhại (Tái Bản 2019)', 'Harper Lee', 'Giết Con Chim Nhại (Tái Bản 2019)', '96000.00', 26, '', '0.00', '2023-06-28 15:01:58'),
(43, 'Ông Già Và Biển Cả (Tái Bản 2018)', 'Ernest Hemingway', 'Ông Già Và Biển Cả (Tái Bản 2018)', '31000.00', 26, '', '0.00', '2023-06-28 15:02:52'),
(44, 'Suối Nguồn (Tái Bản 2018)', 'Ayn Rand', 'Suối Nguồn (Tái Bản 2018)', '284000.00', 26, '', '0.00', '2023-06-28 15:03:34'),
(45, 'Cho Tôi Xin Một Vé Đi Tuổi Thơ', 'Nguyễn Nhật Ánh', 'Cho Tôi Xin Một Vé Đi Tuổi Thơ', '64000.00', 22, '', '0.00', '2023-06-28 15:16:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books_images`
--

CREATE TABLE `books_images` (
  `ID` int(11) NOT NULL,
  `BookID` int(11) NOT NULL,
  `ImageURL` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `books_images`
--

INSERT INTO `books_images` (`ID`, `BookID`, `ImageURL`) VALUES
(61, 24, '../uploads/tt1.jpg'),
(62, 25, '../uploads/tt2.jpg'),
(63, 26, '../uploads/tt3.jpg'),
(65, 28, '../uploads/tt5.jpg'),
(66, 29, '../uploads/tt6.jpg'),
(67, 30, '../uploads/tt7.jpg'),
(68, 31, '../uploads/tt8.jpg'),
(69, 32, '../uploads/tl1.jpg'),
(70, 33, '../uploads/kh1.jpg'),
(71, 34, '../uploads/kd1.jpg'),
(72, 35, '../uploads/hd1.jpg'),
(73, 36, '../uploads/DacNhanTamBM.png'),
(74, 37, '../uploads/tl2.jpg'),
(75, 38, '../uploads/tl3.jpg'),
(79, 42, '../uploads/vh.jpg'),
(80, 43, '../uploads/vh1.jpg'),
(81, 44, '../uploads/vh2.jpg'),
(82, 45, '../uploads/tt4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `imageCaterogy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`ID`, `Name`, `imageCaterogy`) VALUES
(22, 'Tiểu thuyết', ''),
(25, 'Khoa học và công nghệ', ''),
(26, 'Tâm lý học phát triển cá nhân', ''),
(29, 'Kinh doan và quản lý', ''),
(30, 'Hướng dẫn và tự học', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `OrderDate` date DEFAULT NULL,
  `TotalPrice` decimal(10,2) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `CustomerName` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`ID`, `UserID`, `OrderDate`, `TotalPrice`, `Status`, `CustomerName`, `Address`, `Phone`, `Email`) VALUES
(2, 2, NULL, '35000.00', 'Pending', 'a a', 'b', '1111111111', 'ntgiang01012023@gmail.com'),
(3, 2, NULL, '35000.00', 'Pending', 'a a', 'b', '1111111111', 'ntgiang01012023@gmail.com'),
(4, 2, NULL, '0.00', 'Pending', 'a a', 'b', '1111111111', 'ntgiang01012023@gmail.com'),
(5, 2, NULL, '103000.00', 'Pending', '2 2', 'b', '1111111111', 'ntgiang01012023@gmail.com'),
(6, 2, NULL, '35000.00', 'Pending', 'a a', '1', '1111111111', 'ntgiang01012023@gmail.com'),
(7, 2, NULL, '35000.00', 'Pending', 'a a', '1', '0', 'ntgiang01012023@gmail.com'),
(8, 2, NULL, '35000.00', 'Pending', 'a a', 'b', '1111111111', 'ntgiang01012023@gmail.com'),
(9, 2, NULL, '35000.00', 'Pending', 'a a', 'b', '1111111111', 'ntgiang01012023@gmail.com'),
(10, 2, NULL, '35000.00', 'Pending', 'Nguyễn Giang', 'Cần Thơ', '09999999999', 'ntgiang01012023@gmail.com'),
(11, 2, NULL, '103000.00', 'Pending', 'Nguyễn Giang', 'Cần Thơ', '09999999999', 'ntgiang01012023@gmail.com'),
(12, 2, NULL, '138000.00', 'Pending', 'Nguyễn Giang', 'Cần Thơ', '09999999999', 'ntgiang01012023@gmail.com'),
(13, 2, NULL, '138000.00', 'Pending', 'Nguyễn Giang', 'Cần Thơ', '09999999999', 'ntgiang01012023@gmail.com'),
(14, 2, NULL, '68000.00', 'Pending', 'Nguyễn Giang', 'Cần Thơ', '09999999999', 'ntgiang01012023@gmail.com'),
(15, 2, NULL, '0.00', 'Pending', 'Nguyễn Giang', 'Cần Thơ', '09999999999', 'ntgiang01012023@gmail.com'),
(16, 2, NULL, '35000.00', 'Pending', 'Nguyễn Giang', 'Cần Thơ', '09999999999', 'ntgiang01012023@gmail.com'),
(17, 2, NULL, '350000.00', 'Pending', 'Nguyễn Giang', 'Cần Thơ', '09999999999', 'ntgiang01012023@gmail.com'),
(18, 2, NULL, '35000.00', 'Pending', 'Nguyễn Giang', 'Cần Thơ', '09999999999', 'ntgiang01012023@gmail.com'),
(19, 2, NULL, '35000.00', 'Pending', 'Nguyễn Giang', 'Cần Thơ', '09999999999', 'ntgiang01012023@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `ID` int(11) NOT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `BookID` int(11) DEFAULT NULL,
  `BookTitle` varchar(255) NOT NULL,
  `BookPrice` decimal(10,2) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`ID`, `OrderID`, `BookID`, `BookTitle`, `BookPrice`, `Quantity`) VALUES
(1, 3, 25, 'Nhà Giả Kim (Tái Bản 2020)', '35000.00', 1),
(2, 5, 25, 'Nhà Giả Kim (Tái Bản 2020)', '35000.00', 1),
(3, 5, 28, 'Bước Chậm Lại Giữa Thế Gian Vội Vã', '68000.00', 1),
(4, 6, 25, 'Nhà Giả Kim (Tái Bản 2020)', '35000.00', 1),
(5, 7, 25, 'Nhà Giả Kim (Tái Bản 2020)', '35000.00', 1),
(6, 8, 25, 'Nhà Giả Kim (Tái Bản 2020)', '35000.00', 1),
(7, 9, 25, 'Nhà Giả Kim (Tái Bản 2020)', '35000.00', 1),
(8, 10, 25, 'Nhà Giả Kim (Tái Bản 2020)', '35000.00', 1),
(9, 11, 25, 'Nhà Giả Kim (Tái Bản 2020)', '35000.00', 1),
(10, 12, 25, 'Nhà Giả Kim (Tái Bản 2020)', '35000.00', 2),
(11, 13, 25, 'Nhà Giả Kim (Tái Bản 2020)', '35000.00', 2),
(13, 14, 26, 'Tôi Là Bêtô (Tái Bản 2018)', '68000.00', 1),
(14, 16, 25, 'Nhà Giả Kim (Tái Bản 2020)', '35000.00', 1),
(15, 17, 25, 'Nhà Giả Kim (Tái Bản 2020)', '35000.00', 10),
(16, 18, 25, 'Nhà Giả Kim (Tái Bản 2020)', '35000.00', 1),
(17, 19, 25, 'Nhà Giả Kim (Tái Bản 2020)', '35000.00', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `PaymentDate` date DEFAULT NULL,
  `TotalAmount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `purchasehistory`
--

CREATE TABLE `purchasehistory` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `BookID` int(11) DEFAULT NULL,
  `PurchaseDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `Role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`ID`, `Username`, `Password`, `Email`, `FullName`, `Address`, `PhoneNumber`, `Role`) VALUES
(1, 'admin', '123', '', '', '', '', 'admin'),
(2, 'giang', 'giang1123', 'ntgiang01012023@gmail.com', '', '', '', 'user'),
(3, 'maymay', '123', 'may@gmaul.com', '', '', '', 'user'),
(4, 'giang1', '123', 'giang1@gmail.com', '', '', '', 'user');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_category` (`CategoryID`);

--
-- Chỉ mục cho bảng `books_images`
--
ALTER TABLE `books_images`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `BookID` (`BookID`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `BookID` (`BookID`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Chỉ mục cho bảng `purchasehistory`
--
ALTER TABLE `purchasehistory`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `BookID` (`BookID`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `books`
--
ALTER TABLE `books`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `books_images`
--
ALTER TABLE `books_images`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `purchasehistory`
--
ALTER TABLE `purchasehistory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`ID`);

--
-- Các ràng buộc cho bảng `books_images`
--
ALTER TABLE `books_images`
  ADD CONSTRAINT `books_images_ibfk_1` FOREIGN KEY (`BookID`) REFERENCES `books` (`ID`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`);

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`ID`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`BookID`) REFERENCES `books` (`ID`);

--
-- Các ràng buộc cho bảng `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`ID`);

--
-- Các ràng buộc cho bảng `purchasehistory`
--
ALTER TABLE `purchasehistory`
  ADD CONSTRAINT `purchasehistory_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `purchasehistory_ibfk_2` FOREIGN KEY (`BookID`) REFERENCES `books` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
