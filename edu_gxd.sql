-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 27, 2016 at 02:05 AM
-- Server version: 5.5.31
-- PHP Version: 5.5.37

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `edu_gxd`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) NOT NULL,
  `alias` varchar(512) NOT NULL,
  `description` text,
  `image` text,
  `order` int(11) NOT NULL,
  `status` enum('inactive','active') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `alias`, `description`, `image`, `order`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Quản lý dự án', 'quan-ly-du-an', '<p>C&aacute;c kh&oacute;a học li&ecirc;n quan đến Quản l&yacute; dự &aacute;n x&acirc;y dựng</p>\r\n', '', 1, 'active', '2016-07-04 10:26:21', '2016-07-04 10:47:26', NULL),
(2, 'Quản lý chi phí', 'quan-ly-chi-phi', '<p>C&aacute;c kh&oacute;a học về quản l&yacute; chi ph&iacute;: Định gi&aacute; x&acirc;y dựng, Dự to&aacute;n X&acirc;y dựng...</p>\r\n', NULL, 2, 'active', '2016-07-04 10:26:55', '2016-07-04 10:26:55', NULL),
(3, 'Quản lý chất lượng', 'quan-ly-chat-luong', '<p>C&aacute;c kh&oacute;a học li&ecirc;n quan đến quản l&yacute; chất lượng</p>\r\n', NULL, 3, 'active', '2016-07-04 10:27:17', '2016-07-04 10:27:17', NULL),
(4, 'Quản lý tiến độ', 'quan-ly-tien-do', '<p>C&aacute;c kh&oacute;a học li&ecirc;n quan đến Quản l&yacute; tiến độ: Ms Project, Excel quản l&yacute; tiến độ...</p>\r\n', '', 4, '', '2016-07-04 10:28:46', '2016-07-22 09:27:17', NULL),
(6, 'Cơ chế, pháp lý xây dựng', 'co-che-phap-ly-xay-dung', '<p>Nắm bắt về cơ chế, ph&aacute;p l&yacute; x&acirc;y dựng thường l&agrave; d&agrave;nh cho c&aacute;c c&aacute;n bộ, ứng vi&ecirc;n v&agrave;o c&aacute;c vị tr&iacute; quản l&yacute;&nbsp;cấp cao.</p>\r\n\r\n<p>Những người nắm bắt tốt cơ chế, ph&aacute;p l&yacute; thường rất cần.</p>\r\n', NULL, 5, '', '2016-07-06 02:21:48', '2016-07-22 07:42:44', NULL),
(7, 'Dự toán xây dựng', 'du-toan-xay-dung', '<p>C&aacute;c kh&oacute;a học về dự to&aacute;n x&acirc;y dựng c&ocirc;ng tr&igrave;nh, dự to&aacute;n g&oacute;i thầu. Tr&ecirc;n gi&aacute;c độ Tư vấn, Chủ đầu tư, c&aacute;c cơ quan chuy&ecirc;n m&ocirc;n về x&acirc;y dựng, thẩm định / thẩm tra, kiểm to&aacute;n, thanh tra...</p>\r\n', '', 6, 'active', '2016-07-06 02:23:18', '2016-07-07 08:23:07', NULL),
(8, 'Dự toán dự thầu, đấu thầu', 'du-toan-du-thau-dau-thau', '<p>C&aacute;c kh&oacute;a học lập dự to&aacute;n dự thầu, x&aacute;c định gi&aacute; thầu để đấu thầu: <strong>D&agrave;nh cho Nh&agrave; thầu</strong></p>\r\n', '', 7, '', '2016-07-06 02:25:11', '2016-07-22 01:13:03', NULL),
(9, 'Đo bóc khối lượng', 'do-boc-khoi-luong', '<p>C&aacute;c kh&oacute;a học li&ecirc;n quan đến đo b&oacute;c khối lượng</p>\r\n', NULL, 8, '', '2016-07-06 02:30:34', '2016-07-22 01:12:02', NULL),
(10, 'Tin học xây dựng', 'tin-hoc-xay-dung', '<p>C&aacute;c phần mềm tin học ứng dụng trong x&acirc;y dựng, quản l&yacute; x&acirc;y dựng, kinh tế x&acirc;y dựng...</p>\r\n', '', 10, 'active', '2016-07-06 02:32:04', '2016-07-07 17:57:16', NULL),
(11, 'Kỹ năng mềm, thuyết trình', 'ky-nang-mem-thuyet-trinh', '<p>C&aacute;c kh&oacute;a học về kỹ năng mềm, thuyết tr&igrave;nh cần thiết đối với c&aacute;c kỹ sư x&acirc;y dựng, c&aacute;n bộ l&agrave;m trong c&aacute;c dự &aacute;n x&acirc;y dựng.</p>\r\n', NULL, 0, '', '2016-07-08 02:32:33', '2016-07-22 01:11:58', NULL),
(12, 'Phần mềm GXD', 'phan-mem-gxd', '<p><a href="http://giaxaydung.vn">C&ocirc;ng ty CP Gi&aacute; X&acirc;y Dựng - giaxaydung.vn</a>&nbsp;sau 9 năm th&agrave;nh lập v&agrave; ph&aacute;t triển, đ&atilde; nghi&ecirc;n cứu v&agrave; tạo ra hệ thống Phần mềm GXD nhằm&nbsp;hỗ trợ c&aacute;c kỹ sư&nbsp;trong c&aacute;c&nbsp;nghiệp vụ tư vấn&nbsp;x&acirc;y dựng c&ocirc;ng tr&igrave;nh.</p>\r\n\r\n<p>Ch&uacute;c mọi đồng nghiệp th&agrave;nh c&ocirc;ng với <a href="https://www.facebook.com/giaxaydungvideo/shop?rid=1745734995672811&amp;rt=6">Hệ thống Phần mềm GXD</a>!&nbsp;Th&acirc;n &aacute;i v&agrave; Quyết thắng!!!</p>\r\n', '4e244dc26dfc5724933a8a814ace3811.jpg', 0, 'active', '2016-07-09 03:25:45', '2016-07-22 07:51:37', NULL),
(13, 'Tiếng Anh chuyên ngành', 'tieng-anh-chuyen-nganh', '<p>Tiếng Anh chuy&ecirc;n ng&agrave;nh x&acirc;y dựng, quản l&yacute; dự &aacute;n, quản l&yacute; chi ph&iacute;, bản vẽ x&acirc;y dựng, b&oacute;c khối lượng, dự to&aacute;n</p>\r\n', '', 0, '', '2016-07-12 14:58:15', '2016-07-22 01:11:53', NULL),
(14, 'Thẩm định, thẩm tra', 'tham-dinh-tham-tra', '<p>Thẩm định, thẩm tra dự &aacute;n, thiết kế</p>\r\n', '', 0, '', '2016-07-17 15:47:21', '2016-07-22 01:13:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories_coures`
--

CREATE TABLE IF NOT EXISTS `categories_coures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `course_id` int(11) NOT NULL DEFAULT '0',
  `caption` text,
  `status` enum('inactive','active') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`category_id`,`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=88 ;

--
-- Dumping data for table `categories_coures`
--

INSERT INTO `categories_coures` (`id`, `category_id`, `course_id`, `caption`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 2, '', 'inactive', NULL, NULL, NULL),
(9, 2, 4, '', 'inactive', NULL, NULL, NULL),
(10, 1, 5, '', 'inactive', NULL, NULL, NULL),
(11, 2, 5, '', 'inactive', NULL, NULL, NULL),
(12, 7, 1, '', 'inactive', NULL, NULL, NULL),
(13, 7, 4, '', 'inactive', NULL, NULL, NULL),
(16, 1, 6, '', 'inactive', NULL, NULL, NULL),
(17, 6, 6, '', 'inactive', NULL, NULL, NULL),
(18, 2, 13, '', 'inactive', NULL, NULL, NULL),
(19, 7, 13, '', 'inactive', NULL, NULL, NULL),
(20, 8, 13, '', 'inactive', NULL, NULL, NULL),
(23, 10, 12, '', 'inactive', NULL, NULL, NULL),
(24, 2, 11, '', 'inactive', NULL, NULL, NULL),
(25, 6, 11, '', 'inactive', NULL, NULL, NULL),
(26, 1, 10, '', 'inactive', NULL, NULL, NULL),
(27, 3, 10, '', 'inactive', NULL, NULL, NULL),
(29, 1, 9, '', 'inactive', NULL, NULL, NULL),
(31, 1, 8, '', 'inactive', NULL, NULL, NULL),
(32, 2, 8, '', 'inactive', NULL, NULL, NULL),
(34, 1, 7, '', 'inactive', NULL, NULL, NULL),
(35, 2, 7, '', 'inactive', NULL, NULL, NULL),
(37, 2, 14, '', 'inactive', NULL, NULL, NULL),
(38, 7, 14, '', 'inactive', NULL, NULL, NULL),
(39, 10, 15, '', 'inactive', NULL, NULL, NULL),
(40, 10, 16, '', 'inactive', NULL, NULL, NULL),
(41, 10, 17, '', 'inactive', NULL, NULL, NULL),
(42, 10, 18, '', 'inactive', NULL, NULL, NULL),
(43, 7, 19, '', 'inactive', NULL, NULL, NULL),
(44, 8, 19, '', 'inactive', NULL, NULL, NULL),
(45, 12, 22, '', 'inactive', NULL, NULL, NULL),
(47, 12, 23, '', 'inactive', NULL, NULL, NULL),
(48, 1, 21, '', 'inactive', NULL, NULL, NULL),
(49, 3, 24, '', 'inactive', NULL, NULL, NULL),
(50, 3, 26, '', 'inactive', NULL, NULL, NULL),
(52, 13, 21, '', 'inactive', NULL, NULL, NULL),
(55, 1, 33, '', 'inactive', NULL, NULL, NULL),
(57, 13, 35, '', 'inactive', NULL, NULL, NULL),
(58, 2, 28, '', 'inactive', NULL, NULL, NULL),
(59, 1, 39, '', 'inactive', NULL, NULL, NULL),
(60, 3, 41, '', 'inactive', NULL, NULL, NULL),
(61, 4, 41, '', 'inactive', NULL, NULL, NULL),
(62, 3, 42, '', 'inactive', NULL, NULL, NULL),
(63, 4, 42, '', 'inactive', NULL, NULL, NULL),
(64, 3, 43, '', 'inactive', NULL, NULL, NULL),
(65, 4, 43, '', 'inactive', NULL, NULL, NULL),
(66, 3, 44, '', 'inactive', NULL, NULL, NULL),
(67, 4, 44, '', 'inactive', NULL, NULL, NULL),
(68, 3, 40, '', 'inactive', NULL, NULL, NULL),
(69, 4, 40, '', 'inactive', NULL, NULL, NULL),
(74, 14, 33, '', 'inactive', NULL, NULL, NULL),
(75, 1, 32, '', 'inactive', NULL, NULL, NULL),
(76, 14, 32, '', 'inactive', NULL, NULL, NULL),
(77, 1, 46, '', 'inactive', NULL, NULL, NULL),
(78, 10, 46, '', 'inactive', NULL, NULL, NULL),
(79, 7, 47, '', 'inactive', NULL, NULL, NULL),
(80, 3, 30, '', 'inactive', NULL, NULL, NULL),
(81, 2, 1, '', 'inactive', NULL, NULL, NULL),
(82, 2, 27, '', 'inactive', NULL, NULL, NULL),
(83, 12, 27, '', 'inactive', NULL, NULL, NULL),
(86, 2, 51, '', 'inactive', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE IF NOT EXISTS `certificates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `status` enum('inactive','active') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parrent_id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `type` enum('discuss','review') DEFAULT NULL,
  `comment` text NOT NULL,
  `status` enum('inactive','active') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `certificate_id` int(4) DEFAULT NULL,
  `name` varchar(512) NOT NULL,
  `alias` varchar(512) NOT NULL,
  `price` float NOT NULL,
  `sell_price` float NOT NULL,
  `feature` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `image` varchar(512) DEFAULT NULL,
  `video` varchar(1024) DEFAULT NULL,
  `video_link` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `video_type` enum('upload','link') NOT NULL DEFAULT 'link',
  `duration` int(11) NOT NULL,
  `description` text,
  `detail` text,
  `version` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `rate` float DEFAULT NULL,
  `learned` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `status` enum('inactive','active') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `author_id`, `certificate_id`, `name`, `alias`, `price`, `sell_price`, `feature`, `image`, `video`, `video_link`, `video_type`, `duration`, `description`, `detail`, `version`, `rate`, `learned`, `order`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, 'Đo bóc khối lượng lập dự toán', 'do-boc-khoi-luong-lap-du-toan', 1400000, 800000, 'active', '86bce14f5c0b5a7295b600e3d374f8da.jpg', '86bce14f5c0b5a7295b600e3d374f8da.mp4', 'https://www.youtube.com/watch?v=-ff3Yug5qsU', 'link', 1800, '<p><strong>Đo b&oacute;c khối lượng, lập dự to&aacute;n </strong>l&agrave; kh&oacute;a học rất hay tại C&ocirc;ng ty CP Gi&aacute; X&acirc;y Dựng.</p>\r\n', '<p><strong>Với kinh nghiệm đ&agrave;o tạo nhiều năm (từ năm 2007)</strong>&nbsp;gi&aacute;o tr&igrave;nh được li&ecirc;n tục nghi&ecirc;n cứu cập nhật, sửa đổi. Phương ph&aacute;p giảng dạy lu&ocirc;n được c&aacute;c giảng vi&ecirc;n nghi&ecirc;n cứu, cải tiến. C&aacute;ch diễn đạt, tr&igrave;nh b&agrave;y sao cho người học dễ hiểu, dễ l&agrave;m - hiểu s&acirc;u, b&agrave;i bản v&agrave; tận gốc vấn đề.</p>\r\n\r\n<p>- Nội dung đ&agrave;o tạo thực tế, &nbsp;thực h&agrave;nh theo&nbsp;chương tr&igrave;nh&nbsp;c&oacute; t&iacute;nh ứng dụng&nbsp;cao<br />\r\n- T&igrave;m hiểu về định mức, đơn gi&aacute;, c&aacute;ch tra định mức, tự lập đơn gi&aacute;<br />\r\n- T&igrave;m hiểu c&aacute;c phương ph&aacute;p lập dự to&aacute;n v&agrave; kỹ năng b&oacute;c t&aacute;ch khối lượng<br />\r\n- Thực h&agrave;nh lập dự to&aacute;n đơn giản tr&ecirc;n phần mềm Dự to&aacute;n gxd<br />\r\n- T&igrave;m hiểu c&aacute;c phương ph&aacute;p điều chỉnh dự to&aacute;n<br />\r\n- Hướng dẫn cụ thể c&aacute;ch x&aacute;c định chi ph&iacute; nh&acirc;n c&ocirc;ng<br />\r\n- Hướng dẫn cụ thể c&aacute;ch x&aacute;c định chi ph&iacute; m&aacute;y thi c&ocirc;ng<br />\r\n- Hướng dẫn cụ thể c&aacute;ch x&aacute;c định chi ph&iacute; Quản l&yacute; dự &aacute;n, chi ph&iacute; Tư vấn đầu tư<br />\r\n- Hướng dẫn cụ thể c&aacute;ch x&aacute;c định chi ph&iacute; thiết bị, chi ph&iacute; dự ph&ograve;ng, chi ph&iacute; kh&aacute;c.</p>\r\n', '<p>Version 1.0</p>\r\n\r\n<p>Kh&oacute;a học sẽ li&ecirc;n tục được nghi&ecirc;n cứu, cải tiến chất lượng, hiệu quả.</p>\r\n', NULL, NULL, NULL, 'active', '2016-07-04 07:46:02', '2016-07-22 09:42:48', NULL),
(2, 1, NULL, 'Quản lý xây dựng', 'quan-ly-xay-dung', 800000, 300000, 'active', 'e3ca136b2e9953c98e9a37f28bfd8acc.jpg', '', '', 'link', 0, '<p>Kh&oacute;a học n&agrave;y về Kinh tế v&agrave; quản l&yacute; x&acirc;y dựng rất hay</p>\r\n', '<p>Bạn sẽ được học về</p>\r\n\r\n<p>- Quản l&yacute; x&acirc;y dựng c&ocirc;ng tr&igrave;nh</p>\r\n\r\n<p>- Quản l&yacute; chi ph&iacute; đầu tư x&acirc;y dựng</p>\r\n\r\n<p>- Quản l&yacute; hợp đồng x&acirc;y dựng</p>\r\n', '', NULL, NULL, NULL, '', '2016-07-04 10:02:54', '2016-07-22 07:42:06', NULL),
(3, 1, NULL, 'Thử nghiệm khóa học', 'thu-nghiem-khoa-hoc', 500000, 400000, 'inactive', NULL, NULL, '', 'link', 30, '<p>Thử xem sao</p>\r\n', '<p>Th&ecirc;m kh&oacute;a học thử nghiệm.</p>\r\n', '', NULL, NULL, NULL, 'active', '2016-07-04 10:58:53', '2016-07-04 10:59:05', '2016-07-04 10:59:05'),
(4, 1, NULL, 'Đọc bản vẽ xây dựng', 'doc-ban-ve-xay-dung', 500000, 450000, 'active', '75b581c8dd2152e18a48d5a6f82b4c96.jpeg', '', 'https://www.youtube.com/watch?v=-ff3Yug5qsU', 'link', 300, '<p>Kh&oacute;a học đọc bản vẽ kỹ thuật x&acirc;y dựng</p>\r\n', '<h3><strong>C&ocirc;ng t&aacute;c khối lượng lu&ocirc;n xuy&ecirc;n suốt qu&aacute; tr&igrave;nh đầu tư x&acirc;y dựng. Mọi c&ocirc;ng đoạn đều cần biết về đọc bản vẽ.</strong></h3>\r\n\r\n<h3><strong>Bạn sẽ được GXD đ&agrave;o tạo b&agrave;i bản&nbsp;về đọc bản vẽ, b&oacute;c khối lượng.</strong></h3>\r\n\r\n<p><strong>C&aacute;c b&agrave;i học, c&aacute;c b&agrave;i tập được thiết kế c&ocirc;ng phu.</strong></p>\r\n', '<p>Version 1.0</p>\r\n\r\n<p>Kh&oacute;a học sẽ được n&acirc;ng cấp c&aacute;c version thường xuy&ecirc;n.</p>\r\n', NULL, NULL, NULL, '', '2016-07-05 22:32:17', '2016-07-22 09:31:08', NULL),
(5, 1, NULL, 'Khóa học Đấu thầu cơ bản', 'khoa-hoc-dau-thau-co-ban', 800000, 600000, 'active', 'e2b99fda95865c0db0dd266cbf989ce8.jpg', '', '', 'link', 3600, '<p>Kh&oacute;a học đấu thầu do c&ocirc; Thu giảng dạy</p>\r\n', '<p>Chuy&ecirc;n đ&agrave;o tạo về đấu thầu v&agrave; lựa chọn nh&agrave; thầu.</p>\r\n', '<p>Chuy&ecirc;n đề 1: Tổng quan về đấu thầu</p>\r\n\r\n<p>Chuy&ecirc;n đề 2: C&aacute;c h&igrave;nh thức lựa chọn nh&agrave; thầu, phương thức đấu thầu</p>\r\n\r\n<p>Chuy&ecirc;n đề 3: Hợp đồng</p>\r\n\r\n<p>Chuy&ecirc;n đề 4: Kế hoạch đầu thầu</p>\r\n\r\n<p>Chuy&ecirc;n đề 5: Sơ tuyển nh&agrave; thầu</p>\r\n\r\n<p>Chuy&ecirc;n đề 6: Quy tr&igrave;nh đấu thầu rộng r&atilde;i v&agrave; hạn chế đối với g&oacute;i thầu dịch vụ tư vấn</p>\r\n\r\n<p>Chuy&ecirc;n đề 7: Quy tr&igrave;nh đấu thầu rộng r&atilde;i v&agrave; hạn chế đối với g&oacute;i thầu mua sắm h&agrave;ng h&oacute;a, x&acirc;y lắp</p>\r\n\r\n<p>Chuy&ecirc;n đề 8: C&aacute;c h&igrave;nh thức lựa chọn nh&agrave; thầu kh&aacute;c</p>\r\n\r\n<p>Chuy&ecirc;n đề 9: C&aacute;c vấn đề kh&aacute;c li&ecirc;n quan</p>\r\n\r\n<p>Nội dung kh&aacute;c: Trao đổi, thảo luận</p>\r\n', NULL, NULL, NULL, '', '2016-07-05 22:41:56', '2016-07-22 07:42:00', NULL),
(6, 1, NULL, 'Pháp luật đầu tư xây dựng', 'phap-luat-dau-tu-xay-dung', 500000, 300000, 'active', 'b1e85a72e89651c9bb76496efc72171c.jpg', NULL, '', 'link', 3600, '<p>Giới thiệu tổng quan về hệ thống ph&aacute;p&nbsp;Luật X&acirc;y dựng, đầu tư x&acirc;y dựng hiện h&agrave;nh</p>\r\n', '<p>Kh&oacute;a học n&agrave;y gi&uacute;p bạn nắm bắt tổng quan:</p>\r\n\r\n<p>- Luật X&acirc;y dựng số 50/2014/QH13</p>\r\n\r\n<p>- C&aacute;c Nghị định li&ecirc;n quan đến c&aacute;c vấn đề lớn trong lĩnh vực x&acirc;y dựng như: Quản l&yacute; dự &aacute;n, Quản l&yacute; chi ph&iacute;, Quản l&yacute; đấu thầu, Quản l&yacute; hợp đồng, Quản l&yacute;&nbsp;chất lượng, Thanh quyết to&aacute;n...</p>\r\n\r\n<p>- Nghị định số 59/2015/NĐ-CP của Ch&iacute;nh phủ về quản l&yacute; dự &aacute;n</p>\r\n', '', NULL, NULL, NULL, '', '2016-07-06 02:50:19', '2016-07-22 07:41:52', NULL),
(7, 1, NULL, 'Quản lý chi phí Nghị định số 32/2015/NĐ-CP', 'quan-ly-chi-phi-nghi-dinh-so-322015nd-cp', 500000, 300000, 'active', 'e4fe87afa1105da9b4eab6f3f9512675.jpg', '', 'https://www.youtube.com/watch?v=DlifPG7ls0o', 'link', 3600, '<p>C&aacute;c b&agrave;i học gi&uacute;p nắm bắt nhanh&nbsp;Nghị định số 32/2015/NĐ-CP của Ch&iacute;nh phủ về quản l&yacute; chi ph&iacute;</p>\r\n', '<p>- Đối tượng, phạm vi &aacute;p dụng của Nghị định số 32/2015/NĐ-CP</p>\r\n\r\n<p>- C&aacute;c nguy&ecirc;n tắc quản l&yacute; chi ph&iacute; rất cần cho kỹ sư định gi&aacute; tư vấn lập v&agrave; quản l&yacute; chi ph&iacute;, chủ đầu tư</p>\r\n\r\n<p>- Kết cấu của Nghị định số 32/2015/NĐ-CP tư duy của cấp quản l&yacute;</p>\r\n\r\n<p>- C&aacute;c nội dung ch&iacute;nh của Nghị định số 32/2015/NĐ-CP m&agrave; người quản l&yacute; dự &aacute;n, quản l&yacute; chi ph&iacute; cần nắm bắt</p>\r\n\r\n<p>- C&aacute;c kiến thức hữu &iacute;ch cho Kỹ sư định gi&aacute;</p>\r\n', '<p>Version 1.0 kh&oacute;a học&nbsp;xuất bản&nbsp;ng&agrave;y 1/8/2015</p>\r\n', NULL, NULL, NULL, 'active', '2016-07-06 02:58:45', '2016-07-22 16:49:08', NULL),
(8, 1, NULL, 'Hợp đồng xây dựng Nghị định 37/2015/NĐ-CP', 'hop-dong-xay-dung-nghi-dinh-372015nd-cp', 500000, 199000, 'inactive', '0dd35b1aa9eb55259b16524113ca8930.jpg', '', 'https://youtu.be/Eig0vMA5zwk?list=PLW21vt8mSLveayh_LWIcyBquRufLbQ5Rb', 'link', 3600, '<p>Những điểm mới của Nghị định 37/2015/NĐ-CP so với 48/2010/NĐ-CP về hợp đồng x&acirc;y dựng</p>\r\n', '<p>- Những điểm mới của Nghị định 37/2015/NĐ-CP so với 48/2010/NĐ-CP về hợp đồng x&acirc;y dựng</p>\r\n\r\n<p>- Hợp đồng x&acirc;y dựng</p>\r\n\r\n<p>- Những điều cần ch&uacute; &yacute; khi soạn thảo hợp đồng x&acirc;y dựng</p>\r\n', '', NULL, NULL, NULL, 'active', '2016-07-06 03:09:19', '2016-07-22 09:17:16', NULL),
(9, 1, NULL, 'Quản lý dự án Nghị định số 59/2015/NĐ-CP', 'quan-ly-du-an-nghi-dinh-so-592015nd-cp', 800000, 299000, 'inactive', '61173b7318c058d496e5d95597893058.png', '', 'https://youtu.be/IbbzRNk7eys', 'link', 3600, '<p>Quản l&yacute; dự &aacute;n theo quy định&nbsp;của Nghị định số 59/2015/NĐ-CP</p>\r\n', '<p>- T&igrave;m hiểu v&agrave; nắm bắt&nbsp;về kết cấu của Nghị định số 59/2015/NĐ-CP</p>\r\n\r\n<p>- Ph&acirc;n t&iacute;ch, so s&aacute;nh những điểm mới của Nghị định số 59/2015/NĐ-CP so với 12/2009/NĐ-CP để hiểu r&otilde;</p>\r\n\r\n<p>- C&aacute;c v&iacute; dụ minh họa trong c&aacute;c b&agrave;i học, b&agrave;i giảng</p>\r\n\r\n<p>- Thực hiện c&aacute;c b&agrave;i trắc nghiệm t&igrave;nh huống&nbsp;để nắm chắc kiến thức</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', NULL, NULL, NULL, 'active', '2016-07-06 03:22:30', '2016-07-22 09:19:30', NULL),
(10, 1, NULL, 'Quản lý chất lượng Nghị định số 46/2015/NĐ-CP', 'quan-ly-chat-luong-nghi-dinh-so-462015nd-cp', 0, 0, 'active', '0955d905140a5b8f83b02faba97f8863.jpg', '', 'https://youtu.be/8ExFpuZPwH8?list=PLW21vt8mSLvdG6ZuoF0jKOOOz83YzVl_R', 'link', 75, '<p>Kh&oacute;a học gi&uacute;p bạn nắm bắt được tổng quan về&nbsp;Nghị định số 46/2015/NĐ-CP của Ch&iacute;nh phủ trong c&ocirc;ng t&aacute;c&nbsp;quản l&yacute; chất lượng c&ocirc;ng tr&igrave;nh x&acirc;y dựng</p>\r\n', '<p>- Gi&uacute;p bạn nắm bắt nhanh, h&igrave;nh dung dễ d&agrave;ng về kết cấu của&nbsp;Nghị định số 46/2015/NĐ-CP</p>\r\n\r\n<p>- Tr&igrave;nh b&agrave;y&nbsp;những điểm mới của Nghị định số 46/2015/NĐ-CP so với Nghị định số&nbsp;15/2013/NĐ-CP, c&aacute;c v&iacute; dụ minh họa, t&igrave;nh huống</p>\r\n\r\n<p>- Ph&acirc;n t&iacute;ch v&agrave; c&oacute; c&aacute;c v&iacute; dụ minh họa gi&uacute;p bạn th&ecirc;m nhiều kiến thức, kinh nghiệm&nbsp;gi&uacute;p bạn cập nhật &nbsp;Nghị định số 46/2015/NĐ-CP&nbsp;dễ d&agrave;ng thay v&igrave; phải đọc rất nhiều</p>\r\n\r\n<p>- L&agrave;m c&aacute;c b&agrave;i kiểm tra, b&agrave;i thi&nbsp;trắc nghiệm</p>\r\n\r\n<p>- Nhận chứng nhận thực h&agrave;nh - chứng nhận đ&atilde; ho&agrave;n th&agrave;nh kh&oacute;a học - đưa v&agrave;o hồ sơ năng lực, hồ sơ th&agrave;nh t&iacute;ch học tập của bạn</p>\r\n', '', NULL, NULL, NULL, 'active', '2016-07-06 03:40:25', '2016-07-25 03:39:37', NULL),
(11, 1, NULL, 'Thông tư số 08/2016/TT-BTC', 'thong-tu-so-082016tt-btc', 500000, 0, 'active', '45623f05016155588005d6da74252d94.jpg', NULL, '', 'link', 3600, '<p>Những điểm mới của Th&ocirc;ng tư số 08/2016/TT-BTC về thanh quyết to&aacute;n</p>\r\n', '<p>Kh&oacute;a học gi&uacute;p bạn:</p>\r\n\r\n<p>- Nắm bắt&nbsp;Th&ocirc;ng tư số 08/2016/TT-BTC về thanh quyết to&aacute;n</p>\r\n\r\n<p>- Hiểu về nghiệp vụ thanh to&aacute;n khối lượng ho&agrave;n th&agrave;nh</p>\r\n\r\n<p>- Biết hồ sơ thanh to&aacute;n gồm những g&igrave;, t&igrave;m hiểu bảng t&iacute;nh theo mẫu&nbsp;phụ lục 03a, phụ lục 04 của&nbsp;Th&ocirc;ng tư số 08/2016/TT-BTC</p>\r\n\r\n<p>- C&aacute;c chỉ ti&ecirc;u t&iacute;nh to&aacute;n&nbsp;phục vụ thanh to&aacute;n</p>\r\n\r\n<p>- X&aacute;c định gi&aacute; trị ho&agrave;n th&agrave;nh, quản l&yacute; gi&aacute; trị lũy kế giai đoạn</p>\r\n\r\n<p>- Quyết to&aacute;n hợp đồng</p>\r\n', '', NULL, NULL, NULL, '', '2016-07-06 04:33:25', '2016-07-22 07:41:41', NULL),
(12, 1, NULL, 'AutoCad, đọc bản vẽ và bóc khối lượng', 'autocad-doc-ban-ve-va-boc-khoi-luong', 600000, 399000, 'active', '1ca5fc7c33f9520791881559e6e19393.jpg', '', 'https://youtu.be/F-NNu1MnEl4?list=PLW21vt8mSLvcxmfO_mTTQhhFebzJhsPJT', 'link', 3600, '<p>Đọc bản vẽ,&nbsp;vẽ lại&nbsp;bằng AutoCad v&agrave;&nbsp;b&oacute;c khối lượng từ c&aacute;c bản vẽ đ&oacute; lu&ocirc;n</p>\r\n', '<p>- Bạn sẽ t&igrave;m hiểu v&agrave; đọc bản vẽ của 1 c&ocirc;ng tr&igrave;nh</p>\r\n\r\n<p>- D&ugrave;ng AutoCad vẽ lại c&aacute;c bản vẽ của&nbsp;c&ocirc;ng tr&igrave;nh đ&oacute; lu&ocirc;n</p>\r\n\r\n<p>- Luyện tập kiểm tra,&nbsp;b&oacute;c khối lượng từ&nbsp;bản vẽ vừa vẽ</p>\r\n\r\n<p>- Nhập số liệu v&agrave; <a href="http://phanmem.giaxaydung.vn/vi/dau-thau" target="_blank">phần mềm Đấu thầu GXD</a> thực h&agrave;nh t&iacute;nh khối lượng</p>\r\n', '<p>Version 1.0</p>\r\n\r\n<p>10 b&agrave;i học AutoCad, vẽ bản vẽ, đọc bản vẽ, b&oacute;c kiểm tra khối lượng</p>\r\n', NULL, NULL, NULL, 'active', '2016-07-06 08:30:44', '2016-07-22 11:03:49', NULL),
(13, 14, NULL, 'Định mức, đơn giá xây dựng', 'dinh-muc-don-gia-xay-dung', 200000, 150000, 'inactive', '2c8eb70c94da5c3081727644592cd744.jpg', NULL, '', 'link', 1200, '<p>Kh&oacute;a học t&igrave;m hiểu về định mức dự to&aacute;n, đơn gi&aacute; x&acirc;y dựng c&ocirc;ng tr&igrave;nh</p>\r\n', '<p>Nắm chắc c&aacute;c&nbsp;kh&aacute;i niệm&nbsp;về định mức dự to&aacute;n, đơn gi&aacute; x&acirc;y dựng c&ocirc;ng tr&igrave;nh</p>\r\n\r\n<p>Biết c&aacute;ch sử dụng,&nbsp;&aacute;p dụng, vận dụng&nbsp;định mức</p>\r\n\r\n<p>Biết c&aacute;ch chiết t&iacute;nh đơn gi&aacute; địa phương, đơn gi&aacute; c&ocirc;ng tr&igrave;nh</p>\r\n\r\n<p>Biết c&aacute;ch sử dụng đơn gi&aacute; để lập dự to&aacute;n</p>\r\n', '', NULL, NULL, NULL, 'active', '2016-07-06 08:33:27', '2016-07-07 03:26:11', NULL),
(14, 12, NULL, 'Lập dự toán chi phí xây dựng', 'lap-du-toan-chi-phi-xay-dung', 1000000, 0, 'active', '7e98abbed82f5971817901378e68820c.jpg', NULL, '', 'link', 1650, '<p>Lập dự to&aacute;n chi ph&iacute; x&acirc;y dựng trong dự to&aacute;n x&acirc;y dựng c&ocirc;ng tr&igrave;nh</p>\r\n', '<p>Chi ph&iacute; x&acirc;y dựng (Gxd) gồm: Chi ph&iacute; trực tiếp (T),&nbsp;Chi ph&iacute; chung (C), Thu nhập chịu thuế t&iacute;nh trước (TL), Thuế gi&aacute; trị gi&aacute; tăng (GTGT). Bạn sẽ t&igrave;m hiểu kỹ c&aacute;ch x&aacute;c định c&aacute;c chi ph&iacute; n&agrave;y.</p>\r\n\r\n<p>Sử dụng phần mềm Dự to&aacute;n GXD để thực h&agrave;nh t&iacute;nh to&aacute;n lu&ocirc;n.</p>\r\n\r\n<p>Ngo&agrave;i ra cũng c&oacute; b&agrave;i tập để thực h&agrave;nh t&iacute;nh to&aacute;n lu&ocirc;n HMC, chi ph&iacute; dự ph&ograve;ng ph&iacute;.</p>\r\n', '', NULL, NULL, NULL, 'active', '2016-07-06 08:53:22', '2016-07-06 08:53:22', NULL),
(15, 1, NULL, 'Excel chuyên ngành dự toán', 'excel-chuyen-nganh-du-toan', 600000, 400000, 'inactive', '043fb8a59b615a229977b2a2e058314d.jpg', NULL, '', 'link', 0, '<p>Kh&oacute;a học Excel chuy&ecirc;n ng&agrave;nh Kinh tế dự to&aacute;n, dự to&aacute;n c&ocirc;ng tr&igrave;nh</p>\r\n', '<p>Excel l&agrave; phần mềm đ&aacute;ng học nhất trong lĩnh vực x&acirc;y dựng c&ocirc;ng tr&igrave;nh. Excel l&agrave; phương tiện giao tiếp trong c&ocirc;ng t&aacute;c lập v&agrave; quản l&yacute; chi ph&iacute; giữa Chủ đầu tư &ndash; Tư vấn &ndash; Nh&agrave; thầu.<br />\r\n<br />\r\nC&ocirc;ng ty Gi&aacute; X&acirc;y Dựng tổ chức kh&oacute;a học &quot;Excel chuy&ecirc;n ng&agrave;nh Kinh tế dự to&aacute;n&quot;.<br />\r\n<strong>Nội dung</strong>: Tr&ecirc;n cơ sở c&aacute;c b&agrave;i tập l&agrave; c&aacute;c bảng t&iacute;nh dự to&aacute;n. Bạn thử tải 1 v&iacute; dụ file đ&iacute;nh k&egrave;m b&agrave;i n&agrave;y.<br />\r\n<br />\r\nNội dung kh&oacute;a học chưa từng c&oacute; tại Việt Nam, do Admin Ths Nguyễn Thế Anh thiết kế nội dung. Excel rất rộng, đ&acirc;y l&agrave; c&aacute;c kỹ thuật do Ths Nguyễn Thế Anh tự đ&uacute;c r&uacute;t từ kinh nghiệm 15 năm ứng dụng Excel trong c&ocirc;ng việc. Đảm bảo rất hay v&agrave; hiệu quả cho c&aacute;c bạn, hơn hẳn việc tự học, những điều kh&ocirc;ng tr&igrave;nh b&agrave;y trong s&aacute;ch vở n&agrave;o, chỉ c&oacute; thể ph&aacute;t hiện v&agrave; s&aacute;ng tạo từ c&ocirc;ng việc.<br />\r\n<a href="http://giaxaydung.vn/dang_ky_hoc.gxd" target="_blank"><strong>ĐĂNG K&Yacute; HỌC NGAY&nbsp;</strong></a><br />\r\n<strong>Đối tượng</strong>: D&agrave;nh cho bất kỳ ai muốn học tập kỹ năng sử dụng Excel từ cơ bản đến kỹ thuật đi&ecirc;u luyện, thủ thuật l&agrave;m việc nhanh, hiệu quả.<br />\r\nKh&oacute;a học được thiết kế d&agrave;nh cho c&aacute;c bạn:<br />\r\n- Lập dự to&aacute;n, chiết t&iacute;nh đơn gi&aacute;, tổng hợp, ch&ecirc;nh lệch, b&ugrave; trừ, điều chỉnh, gi&aacute; vữa<br />\r\n- L&agrave;m c&ocirc;ng việc lập v&agrave; quản l&yacute; chi ph&iacute; đầu tư x&acirc;y dựng c&ocirc;ng tr&igrave;nh như kỹ sư định gi&aacute;<br />\r\n- C&aacute;c học vi&ecirc;n trước khi tham gia kh&oacute;a học đo b&oacute;c khối lượng, lập dự to&aacute;n, sử dụng phần mềm Dự to&aacute;n GXD.<br />\r\n<br />\r\n<strong>Mục ti&ecirc;u</strong>: Học 1 được lợi 3:<br />\r\n1. C&aacute;c kiến thức từ cơ bản v&agrave; kỹ thuật Excel đi&ecirc;u luyện trong c&ocirc;ng việc<br />\r\n2. Kiến thức cơ bản, nền tảng về dự to&aacute;n c&ocirc;ng tr&igrave;nh<br />\r\n3. C&aacute;c kỹ năng, thủ thuật, thao t&aacute;c l&agrave;m c&ocirc;ng việc lập dự to&aacute;n chuy&ecirc;n nghiệp<br />\r\n<br />\r\n<strong>Giảng vi&ecirc;n</strong>: Admin Nguyễn Thế Anh, c&aacute;c kỹ sư của C&ocirc;ng ty Gi&aacute; X&acirc;y Dựng v&agrave; c&aacute;c kỹ sư giỏi được chọn từ c&aacute;c c&ocirc;ng ty tư vấn đang trực tiếp l&agrave;m việc.<br />\r\nĐịa điểm: 18 Nguyễn Ngọc Nại -Khương Mai- Thanh Xu&acirc;n - H&agrave; Nội&nbsp;<br />\r\nLi&ecirc;n hệ để biết th&ecirc;m chi tiết cụ thể Huyền Thanh 0985 099938&nbsp;<br />\r\nTổ chức li&ecirc;n tục v&agrave;o thứ 5 h&agrave;ng tuần&nbsp;</p>\r\n', '', NULL, NULL, NULL, '', '2016-07-07 03:40:05', '2016-07-22 07:41:36', NULL),
(16, 1, NULL, 'Excel phân tích hiệu quả dự án', 'excel-phan-tich-hieu-qua-du-an', 1000000, 0, 'inactive', '66ce298fe2125ded9dd7a17fb4099c0a.jpg', NULL, '', 'link', 0, '<p>Excel t&iacute;nh to&aacute;n, ph&acirc;n t&iacute;ch hiệu quả kinh tế, t&agrave;i ch&iacute;nh dự &aacute;n đầu tư</p>\r\n', '<p>Sử dụng Microsoft&nbsp;Excel để:</p>\r\n\r\n<p>- X&aacute;c định tổng mức đầu tư x&acirc;y dựng của dự &aacute;n</p>\r\n\r\n<p>- T&iacute;nh to&aacute;n c&aacute;c chỉ ti&ecirc;u đ&aacute;nh gi&aacute; hiệu quả dự &aacute;n</p>\r\n\r\n<p>- Ph&acirc;n t&iacute;ch hiệu quả kinh tế, t&agrave;i ch&iacute;nh dự &aacute;n đầu tư</p>\r\n', '', NULL, NULL, NULL, '', '2016-07-07 03:41:55', '2016-07-22 07:41:31', NULL),
(17, 1, NULL, 'Word trong văn phòng xây dựng', 'word-trong-van-phong-xay-dung', 300000, 200000, 'inactive', '446d1d47879650dfaca17fe4156fc2ab.jpg', NULL, '', 'link', 3600, '<p>C&aacute;c b&agrave;i học soạn thảo văn bản trong văn ph&ograve;ng x&acirc;y dựng: Tư vấn, Chủ đầu tư, Nh&agrave; thầu...</p>\r\n', '<p>- Soạn thảo đơn dự thầu, thư nh&agrave; thầu gửi chủ đầu tư</p>\r\n\r\n<p>- Tr&igrave;nh b&agrave;y 1 file biện ph&aacute;p thi c&ocirc;ng ho&agrave;n chỉnh</p>\r\n\r\n<p>- Tr&igrave;nh b&agrave;y 1 file hồ sơ thầu ho&agrave;n chỉnh</p>\r\n\r\n<p>- Tr&igrave;nh b&agrave;y lại 1 file Nghị định, Th&ocirc;ng tư ho&agrave;n chỉnh để nắm được style, phương thức tăng tốc</p>\r\n\r\n<p>- Hướng dẫn tr&igrave;nh b&agrave;y đồ &aacute;n, luận văn, luận &aacute;n c&aacute;ch khoa học nhất cho c&aacute;c bạn Sinh vi&ecirc;n, Học vi&ecirc;n cao học, Nghi&ecirc;n cứu sinh</p>\r\n', '', NULL, NULL, NULL, '', '2016-07-07 03:49:53', '2016-07-22 07:41:27', NULL),
(18, 1, NULL, 'PowerPoint thuyết trình xây dựng', 'powerpoint-thuyet-trinh-xay-dung', 300000, 200000, 'inactive', '83569b1434045aa3a89251cbae7477b3.jpg', NULL, '', 'link', 3600, '<p>C&aacute;c b&agrave;i học tr&igrave;nh b&agrave;y PowerPoint 1 c&ocirc;ng đ&ocirc;i việc t&igrave;m hiểu lu&ocirc;n về&nbsp;văn bản trong x&acirc;y dựng</p>\r\n', '<p>- Tr&igrave;nh b&agrave;y c&aacute;c slide li&ecirc;n quan đến Luật X&acirc;y dựng vừa nắm PowerPoint vừa nắm Luật</p>\r\n\r\n<p>- Tr&igrave;nh b&agrave;y c&aacute;c slide li&ecirc;n quan đến Nghị định Chi ph&iacute;, Hợp đồng, Chất lượng&nbsp;vừa nắm PowerPoint vừa nắm c&aacute;c nội dung ch&iacute;nh lu&ocirc;n</p>\r\n\r\n<p>- Tr&igrave;nh b&agrave;y c&aacute;c slide li&ecirc;n quan đến c&aacute;c th&ocirc;ng tư</p>\r\n\r\n<p>- C&aacute;c slide đẹp, nghệ thuật kh&aacute;c</p>\r\n\r\n<p>- Thủ thuật</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', NULL, NULL, NULL, '', '2016-07-07 03:52:05', '2016-07-22 07:41:24', NULL),
(19, 1, NULL, 'Phương pháp xác định giá ca máy', 'phuong-phap-xac-dinh-gia-ca-may', 300000, 0, 'inactive', 'd84adcc7108c53ff9f21c4d3450de03d.jpg', NULL, '', 'link', 0, '<p>Phương ph&aacute;p x&aacute;c định gi&aacute; ca m&aacute;y v&agrave; thiết bị thi c&ocirc;ng</p>\r\n', '<p>Phương ph&aacute;p x&aacute;c định gi&aacute; ca m&aacute;y v&agrave; thiết bị thi c&ocirc;ng</p>\r\n\r\n<p>C&aacute;c kh&aacute;i niệm về gi&aacute; ca m&aacute;y v&agrave; thiết bị thi c&ocirc;ng</p>\r\n\r\n<p>M&ocirc;n học hiểu về m&aacute;y v&agrave; thiết bị thi c&ocirc;ng x&acirc;y dựng. Chọn m&aacute;y đ&uacute;ng.</p>\r\n', '', NULL, NULL, NULL, '', '2016-07-07 10:54:54', '2016-07-22 07:41:16', NULL),
(20, 1, NULL, 'Thông tư số 03/2015/TT-BKHĐT về đấu thầu', 'thong-tu-so-032015tt-bkhdt-ve-dau-thau', 0, 0, 'inactive', 'baf24e34bfb45bb287d040695bc23771.jpg', '', '', 'link', 0, '<p>Nắm bắt c&aacute;c kiến thức cơ bản về đấu thầu x&acirc;y lắp</p>\r\n', '<p>Bạn hiểu&nbsp;Th&ocirc;ng tư số 03/2015/TT-BKHĐT về đấu thầu để l&agrave;m việc tốt hơn</p>\r\n\r\n<p>T&igrave;m hiểu&nbsp;phần mềm Đấu thầu GXD để lập hồ sơ mời thầu (lập hồ sơ mời thầu nh&eacute; bạn)</p>\r\n\r\n<p>T&igrave;m hiểu phần mềm Đấu thầu GXD để lập hồ sơ dự thầu</p>\r\n', '', NULL, NULL, NULL, '', '2016-07-08 03:09:44', '2016-07-22 07:41:12', NULL),
(21, 15, NULL, 'Quản lý dự án chuyên nghiệp', 'quan-ly-du-an-chuyen-nghiep', 0, 0, 'inactive', '738548a147c050a5a73b0722ac5fe2f3.jpg', '738548a147c050a5a73b0722ac5fe2f3.mp4', '', 'link', 0, '<p>PMP</p>\r\n', '<p>PMP</p>\r\n', '', NULL, NULL, NULL, 'active', '2016-07-08 09:04:04', '2016-07-15 23:49:24', NULL),
(22, 11, NULL, 'Xử lý tình huống khi sử dụng Phần mềm GXD', 'xu-ly-tinh-huong-khi-su-dung-phan-mem-gxd', 0, 0, 'active', '572cbfc81f695d2fb403b1d0884683d3.jpg', '', 'https://www.youtube.com/watch?v=GJwPZ072DZw&index=1', 'link', 117, '<p>Để học nghiệp vụ x&acirc;y dựng h&atilde;y li&ecirc;n hệ ngay Trần Linh GXD - 098.281.2793<br />\r\n- Đo b&oacute;c khối lượng - Lập dự to&aacute;n;<br />\r\n- Kỹ sư định gi&aacute;;<br />\r\n- Lập gi&aacute; dự thầu, thực h&agrave;nh phần mềm Đấu thầu GXD:<br />\r\n- Lập hồ sơ nghiệm thu, thực h&agrave;nh phần mềm QLCL GXD;<br />\r\n- Thanh to&aacute;n khối lượng ho&agrave;n th&agrave;nh, quyết to&aacute;n hợp đồng A-B, thực h&agrave;nh rhần mềm Thanh quyết to&aacute;n (rất hay)<br />\r\n- Quản l&yacute; dự &aacute;n...</p>\r\n', '<p>Trong qu&aacute; tr&igrave;nh c&agrave;i đặt v&agrave; sử dụng <em><strong>Phần mềm GXD</strong></em>. C&aacute;c bạn c&oacute; thể sẽ gặp v&agrave;i t&igrave;nh huống kh&oacute; khăn dẫn đến việc kh&ocirc;ng sử dụng được phần mềm, hoặc kh&ocirc;ng tận dụng được to&agrave;n bộ c&aacute;c t&iacute;nh năng vượt trội của <em><strong>Phần mềm GXD</strong></em>.</p>\r\n\r\n<p>Để gi&uacute;p kh&aacute;ch h&agrave;ng c&oacute; thể <strong>sử dụng được</strong> v&agrave; <strong>sử dụng tốt</strong>&nbsp;hệ thống&nbsp;phần mềm GXD. Ch&uacute;ng t&ocirc;i mang đến Kh&oacute;a học&nbsp;Hướng dẫn xử l&yacute; t&igrave;nh huống trong qu&aacute; tr&igrave;nh c&agrave;i đặt v&agrave; sử dụng Phần mềm GXD <strong>ho&agrave;n to&agrave;n miễn ph&iacute;.</strong></p>\r\n\r\n<p>C&ocirc;ng ty CP Gi&aacute; X&acirc;y Dựng sẽ li&ecirc;n tục cập nhật c&aacute;c trường hợp kh&oacute; khăn v&agrave; phương ph&aacute;p xử l&yacute;. Mong rằng hệ thống video hướng dẫn tr&ecirc;n sẽ hỗ trợ qu&yacute; kh&aacute;ch giải quyết được&nbsp;những kh&oacute; khăn kh&ocirc;ng thể tự xử l&yacute; trong qu&aacute; tr&igrave;nh c&agrave;i đặt v&agrave; sử dụng Phần mềm GXD.</p>\r\n\r\n<hr />\r\n<p><em><strong>Mọi thắc mắc xin li&ecirc;n hệ:</strong></em><br />\r\n<em><strong>C&ocirc;ng ty CP Gi&aacute; X&acirc;y Dựng</strong><br />\r\nSố 2a/55 Nguyễn Ngọc Nại, Thanh Xu&acirc;n, H&agrave; Nội.<br />\r\nHotline CSKH: 1900 0147 - 098 281 2793<br />\r\nEmail: Tranlinh@giaxaydung.com</em></p>\r\n', '', NULL, NULL, NULL, 'active', '2016-07-09 03:28:44', '2016-07-26 00:32:33', NULL),
(23, 11, NULL, 'Hướng dẫn sử dụng Phần mềm Dự toán GXD', 'huong-dan-su-dung-phan-mem-du-toan-gxd', 0, 0, 'active', '8e5d78cbe98e551390dfcec67a069a44.jpg', '', 'https://www.youtube.com/watch?v=GJwPZ072DZw&index=1', 'link', 1, '<p><strong>Dự to&aacute;n GXD</strong></p>\r\n\r\n<p>- Chạy trực tiếp tr&ecirc;n nền Excel, c&aacute;c c&ocirc;ng thức t&iacute;nh to&aacute;n li&ecirc;n kết trực</p>\r\n\r\n<p>tiếp, dễ d&agrave;ng kiểm tra</p>\r\n\r\n<p>- Lập, thẩm tra/thẩm định dự to&aacute;n x&acirc;y dựng c&ocirc;ng tr&igrave;nh, dự to&aacute;n g&oacute;i thầu</p>\r\n\r\n<p>theo Th&ocirc;ng tư số 06/2016/TT-BXD</p>\r\n\r\n<p>- Tra cứu đơn gi&aacute;, định mức thể hiện đầy đủ thuyết minh, hướng dẫn,</p>\r\n\r\n<p>th&agrave;nh phần c&ocirc;ng việc v&agrave; ghi ch&uacute;</p>\r\n\r\n<p>- T&iacute;nh to&aacute;n đơn gi&aacute; tổng hợp, lập dự to&aacute;n nhiều hạng mục</p>\r\n\r\n<p>- Tự động Tra gi&aacute; vật tư theo c&ocirc;ng bố gi&aacute; thị trường</p>\r\n\r\n<p>- Lập dự to&aacute;n chi ph&iacute; tư vấn v&agrave; tiến độ thực hiện c&ocirc;ng t&aacute;c tư vấn</p>\r\n\r\n<p>- Li&ecirc;n tục cập nhật nhanh ch&oacute;ng v&agrave; ch&iacute;nh x&aacute;c c&aacute;c văn bản hướng</p>\r\n\r\n<p>dẫn của Nh&agrave; nước</p>\r\n\r\n<p>- Xử l&yacute; c&ocirc;ng t&aacute;c tạm t&iacute;nh, vận dụng thuận tiện, tự tạo dữ liệu để kế thừa</p>\r\n\r\n<p>cho c&aacute;c c&ocirc;ng tr&igrave;nh sau.</p>\r\n', '<p><strong>LẬP DỰ TO&Aacute;N CHI PH&Iacute; X&Acirc;Y DỰNG &ndash; LẮP ĐẶT THIẾT BỊ</strong></p>\r\n\r\n<p><em><strong>1. Lập bảng Dự to&aacute;n &ndash; bảng Ti&ecirc;n lượng</strong></em></p>\r\n\r\n<p>- T&iacute;ch hợp bảng Dự to&aacute;n &ndash; bảng Ti&ecirc;n lượng 2 trong 1.</p>\r\n\r\n<p>- Tạo hạng mục, cập nhật hạng mục c&ocirc;ng tr&igrave;nh.</p>\r\n\r\n<p>- Tra cứu c&ocirc;ng việc bằng M&atilde; hiệu đơn gi&aacute; hoặc Từ kh&oacute;a nội dung c&ocirc;ng việc.</p>\r\n\r\n<p>- Hộp thoại tra cứu hiển thị đầy đủ đơn gi&aacute;, định mức hao ph&iacute; v&agrave; gi&aacute; vật tư. T&ugrave;y</p>\r\n\r\n<p>biến chỉnh sửa hao ph&iacute; định mức, đơn gi&aacute; vật tư từng c&ocirc;ng t&aacute;c.</p>\r\n\r\n<p>- C&aacute;c menu lệnh tr&ecirc;n thanh Ribbon kết hợp menu lệnh Chuột phải gi&uacute;p người sử</p>\r\n\r\n<p>dụng c&oacute; thể t&ugrave;y biến chỉnh sửa dễ d&agrave;ng.</p>\r\n\r\n<p><strong><em>2. Lập bảng Ph&acirc;n t&iacute;ch đơn gi&aacute; &ndash; bảng Ph&acirc;n t&iacute;ch vật tư</em></strong></p>\r\n\r\n<p>- T&iacute;ch hợp bảng Ph&acirc;n t&iacute;ch đơn gi&aacute; &ndash; bảng Ph&acirc;n t&iacute;ch vật tư 2 trong 1.</p>\r\n\r\n<p>- Tự động chiết t&iacute;nh đơn gi&aacute; ngay sau khi chọn m&atilde; hiệu.</p>\r\n\r\n<p>- T&ugrave;y biến chỉnh sửa c&ocirc;ng t&aacute;c bằng hộp thoại hoặc bằng thủ c&ocirc;ng.</p>\r\n\r\n<p>- Thể hiện đơn gi&aacute; đầy đủ v&agrave; đơn gi&aacute; kh&ocirc;ng đầy đủ theo nhu cầu sử dụng.</p>\r\n\r\n<p><strong><em>3. Lập bảng Đơn gi&aacute; tổng hợp</em></strong></p>\r\n\r\n<p>- Tra cứu c&ocirc;ng việc bằng M&atilde; hiệu đơn gi&aacute; hoặc Từ kh&oacute;a nội dung c&ocirc;ng việc</p>\r\n\r\n<p>tương tự như b&ecirc;n bảng Dự to&aacute;n.</p>\r\n\r\n<p>- T&ugrave;y biến chỉnh sửa hao ph&iacute; định mức, đơn gi&aacute; vật tư trong Hộp thoại tra cứu.</p>\r\n\r\n<p>- Lưu Đơn gi&aacute; tổng hợp v&agrave;o dữ liệu, gọi Đơn gi&aacute; tổng hợp sang bảng Dự to&aacute;n để</p>\r\n\r\n<p>sử dụng.</p>\r\n\r\n<p><strong><em>4. Lập bảng Tổng hợp vật tư &ndash; bảng Gi&aacute; vật tư</em></strong></p>\r\n\r\n<p>- T&iacute;ch hợp bảng Tổng hợp vật tư &ndash; bảng Gi&aacute; vật tư 2 trong 1.</p>\r\n\r\n<p>- Tổng hợp to&agrave;n bộ vật tư v&agrave; khối lượng từ bảng Ph&acirc;n t&iacute;ch đơn gi&aacute;/ Ph&acirc;n t&iacute;ch vật</p>\r\n\r\n<p>tư.</p>\r\n\r\n<p>- Lưu gi&aacute; vật tư đ&atilde; nhập, gọi lại gi&aacute; vật tư đ&atilde; lưu.</p>\r\n\r\n<p>- Tra cứu trực tiếp gi&aacute; vật tư từ C&ocirc;ng bố gi&aacute; của c&aacute;c địa phương v&agrave; từ B&aacute;o thị</p>\r\n\r\n<p>trường &ndash; gi&aacute; cả vật tư do Bộ C&ocirc;ng Thương ban h&agrave;nh.</p>\r\n\r\n<p><strong><em>5. Lập bảng Gi&aacute; vật liệu hiện trường</em></strong></p>\r\n\r\n<p>- Kết xuất tổng hợp t&iacute;nh gi&aacute; vật liệu hiện trường x&acirc;y lắp theo Th&ocirc;ng tư số</p>\r\n\r\n<p>06/2016/TT-BXD.</p>\r\n\r\n<p>- Tra cứu trực tiếp gi&aacute; vật tư từ C&ocirc;ng bố gi&aacute; của c&aacute;c địa phương v&agrave; từ B&aacute;o thị</p>\r\n\r\n<p>trường &ndash; gi&aacute; cả vật tư do Bộ C&ocirc;ng Thương ban h&agrave;nh (trường hợp gi&aacute; c&ocirc;ng bố</p>\r\n\r\n<p>chưa phải l&agrave; gi&aacute; đến hiện trường c&ocirc;ng tr&igrave;nh).</p>\r\n\r\n<p><strong><em>6. Lập bảng Đơn gi&aacute; nh&acirc;n c&ocirc;ng</em></strong></p>\r\n\r\n<p>- T&iacute;nh to&aacute;n, lập đơn gi&aacute; nh&acirc;n c&ocirc;ng theo hướng dẫn của Th&ocirc;ng tư 05/2016/TT &ndash;</p>\r\n\r\n<p>BXD v/v hướng dẫn x&aacute;c định đơn gi&aacute; nh&acirc;n c&ocirc;ng trong quản l&yacute; chi ph&iacute; đầu tư</p>\r\n\r\n<p>x&acirc;y dựng.</p>\r\n\r\n<p>- Đưa ra mức lương đầu v&agrave;o để t&iacute;nh đơn gi&aacute; nh&acirc;n c&ocirc;ng theo địa phương một</p>\r\n\r\n<p>c&aacute;ch tự động.</p>\r\n\r\n<p><strong><em>7. Lập bảng Gi&aacute; ca m&aacute;y</em></strong></p>\r\n\r\n<p>- T&iacute;nh to&aacute;n Gi&aacute; ca m&aacute;y theo hướng dẫn của Th&ocirc;ng tư 06/2016/TT &ndash; BXD.</p>\r\n\r\n<p>- T&ugrave;y biến điều chỉnh b&ugrave; trừ gi&aacute; ca m&aacute;y theo 3 phương ph&aacute;p.</p>\r\n\r\n<p>- Tự động cập nhật khi thay đổi gi&aacute; nhi&ecirc;n liệu đầu v&agrave;o.</p>\r\n\r\n<p><strong><em>8. Lập bảng chi ph&iacute; đ&agrave;o tạo &ndash; chuyển giao c&ocirc;ng nghệ/ bảng Dự to&aacute;n chi ph&iacute; mua</em></strong></p>\r\n\r\n<p><strong><em>sắm thiết bị (Phần thiết bị)</em></strong></p>\r\n\r\n<p>- Nhập, t&ugrave;y chỉnh c&aacute;c nội dung chi ph&iacute; trong bảng tổng hợp chi ph&iacute; đ&agrave;o tạo &ndash;</p>\r\n\r\n<p>chuyển giao c&ocirc;ng nghệ.</p>\r\n\r\n<p>- Tra cứu thiết bị bằng từ kh&oacute;a, gi&aacute; thiết bị được lấy trực tiếp từ B&aacute;o thị trường &ndash;</p>\r\n\r\n<p>gi&aacute; cả vật tư do Bộ C&ocirc;ng Thương ban h&agrave;nh v&agrave; từ c&aacute;c th&ocirc;ng b&aacute;o gi&aacute; của c&aacute;c</p>\r\n\r\n<p>doanh nghiệp.</p>\r\n\r\n<p><strong>LẬP DỰ TO&Aacute;N CHI PH&Iacute; QUẢN L&Yacute; DỰ &Aacute;N, CHI PH&Iacute; TƯ VẤN, CHI PH&Iacute;&nbsp;DỰ PH&Ograve;NG V&Agrave; CHI PH&Iacute; KH&Aacute;C</strong></p>\r\n\r\n<p>- T&iacute;nh chi ph&iacute; quản l&yacute; dự &aacute;n, chi ph&iacute; tư vấn đầu tư x&acirc;y dựng, chi ph&iacute; kh&aacute;c v&agrave; chi</p>\r\n\r\n<p>ph&iacute; dự ph&ograve;ng theo hướng dẫn của Th&ocirc;ng tư số 06/2016/TT &ndash; BXD của Bộ X&acirc;y</p>\r\n\r\n<p>dựng.</p>\r\n\r\n<p>- Nội suy c&aacute;c định mức tỷ lệ theo Dự thảo thay thế Quyết định 957/2009/QĐ &ndash;</p>\r\n\r\n<p>BXD về việc c&ocirc;ng bố định mức chi ph&iacute; Quản l&yacute; dự &aacute;n v&agrave; tư vấn đầu tư x&acirc;y</p>\r\n\r\n<p>dựng c&ocirc;ng tr&igrave;nh v&agrave; hướng dẫn của Th&ocirc;ng tư số 06/2016/TT &ndash; BXD của Bộ X&acirc;y</p>\r\n\r\n<p>Dựng.</p>\r\n\r\n<p><strong><em>1. T&iacute;nh chi ph&iacute; quản l&yacute; dự &aacute;n</em></strong></p>\r\n\r\n<p><strong><em>2. T&iacute;nh chi ph&iacute; tư vấn đầu tư x&acirc;y dựng</em></strong></p>\r\n\r\n<p>- Lập bảng tổng hợp chi ph&iacute; tư vấn. Tra cứu, gọi c&aacute;c khoản mục chi ph&iacute; thuộc chi</p>\r\n\r\n<p>ph&iacute; tư vấn ra để t&iacute;nh to&aacute;n.</p>\r\n\r\n<p>- Lập dự to&aacute;n Man &ndash; Month. Lập bảng chi ph&iacute; chuy&ecirc;n gia.</p>\r\n\r\n<p><strong><em>3. T&iacute;nh chi ph&iacute; kh&aacute;c</em></strong></p>\r\n\r\n<p>- Tra cứu, gọi c&aacute;c khoản mục chi ph&iacute; thuộc chi ph&iacute; kh&aacute;c ra để t&iacute;nh to&aacute;n.</p>\r\n\r\n<p>- Lập bảng k&ecirc; khai chi tiết c&aacute;c khoản mục chi ph&iacute; kh&aacute;c.</p>\r\n\r\n<p>- Lập bảng dự to&aacute;n chi ph&iacute; Hạng mục chung.</p>\r\n\r\n<p><strong><em>4. T&iacute;nh chi ph&iacute; dự ph&ograve;ng</em></strong></p>\r\n\r\n<p>- T&iacute;nh chi ph&iacute; dự ph&ograve;ng cho khối lượng c&ocirc;ng việc ph&aacute;t sinh.</p>\r\n\r\n<p>- T&iacute;nh chi ph&iacute; dự ph&ograve;ng cho yếu tố trượt gi&aacute;.</p>\r\n\r\n<p>- T&iacute;nh chi ph&iacute; dự ph&ograve;ng cho Dự to&aacute;n g&oacute;i thầu.</p>\r\n\r\n<p><strong>LẬP DỰ TO&Aacute;N G&Oacute;I THẦU X&Acirc;Y DỰNG</strong></p>\r\n\r\n<p>- Lập Dự to&aacute;n g&oacute;i thầu x&acirc;y dựng theo Dự thảo Th&ocirc;ng tư hướng dẫn Nghị định</p>\r\n\r\n<p>32/2015/NĐ &ndash; CP của Ch&iacute;nh phủ.</p>\r\n\r\n<p><strong><em>1. Lập Dự to&aacute;n g&oacute;i thầu thi c&ocirc;ng x&acirc;y dựng</em></strong></p>\r\n\r\n<p><strong><em>2. Lập Dự to&aacute;n g&oacute;i thầu mua sắm vật tư, thiết bị lắp đặt v&agrave;o c&ocirc;ng tr&igrave;nh</em></strong></p>\r\n\r\n<p><strong>THẨM ĐỊNH &ndash; THẨM TRA</strong></p>\r\n\r\n<p><strong><em>1. Kiểm tra tất cả c&aacute;c bảng t&iacute;nh v&agrave; đưa ra sự sai kh&aacute;c</em></strong></p>\r\n\r\n<p><strong><em>2. Tự động xuất ra b&aacute;o c&aacute;o thẩm định/ thẩm tra</em></strong></p>\r\n', '<p>Phi&ecirc;n bản Dự to&aacute;n GXD v10.3</p>\r\n', NULL, NULL, NULL, 'active', '2016-07-10 02:49:19', '2016-07-26 06:51:17', NULL),
(24, 1, NULL, 'Khóa học Tư vấn giám sát GXD', 'khoa-hoc-tu-van-giam-sat-gxd', 500000, 450000, 'inactive', 'd8726944f86855eab59cf38fcbe69613.jpg', '', '', 'link', 1600, '<p>C&aacute;c kiến thức trang bị cho gi&aacute;m s&aacute;t vi&ecirc;n thực hiện tư vấn gi&aacute;m s&aacute;t c&aacute;c c&ocirc;ng tr&igrave;nh x&acirc;y dựng</p>\r\n', '<p>- Tổng quan về Tư vấn gi&aacute;m s&aacute;t</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', NULL, NULL, NULL, '', '2016-07-11 09:48:12', '2016-07-22 07:41:04', NULL),
(25, 1, NULL, 'Khóa học Dự toán GXD', 'khoa-hoc-du-toan-gxd', 0, 0, 'inactive', 'a105f3802dcd561d915a5ff2ef62fc0c.jpg', '', 'https://youtu.be/GJwPZ072DZw?list=PLW21vt8mSLvfLa4Ook2FsS6sbAmOxx4b5', 'link', 0, '<p>C&aacute;c kiến thức cơ bản về dự to&aacute;n x&acirc;y dựng c&ocirc;ng tr&igrave;nh, thực h&agrave;nh phần mềm Dự to&aacute;n GXD</p>\r\n', '<p>Sử dụng phần mềm Dự to&aacute;n GXD lập hồ sơ dự to&aacute;n ho&agrave;n chỉnh</p>\r\n', '<p>Version 1.0 (sử dụng Dự to&aacute;n GXD 10.3)</p>\r\n', NULL, NULL, NULL, 'active', '2016-07-11 09:53:28', '2016-07-22 09:41:36', NULL),
(26, 1, NULL, 'Khóa học An toàn lao động', 'khoa-hoc-an-toan-lao-dong', 0, 0, 'inactive', 'd33c087045c85d9bb19f3b7d81a5b79e.jpg', '', '', 'link', 1600, '<p>C&aacute;c kiến thức cơ bản về an to&agrave;n lao động</p>\r\n', '<p>C&aacute;c kiến thức về An to&agrave;n lao động</p>\r\n', '', NULL, NULL, NULL, 'inactive', '2016-07-11 10:01:06', '2016-07-18 02:49:34', NULL),
(27, 1, NULL, 'Khóa học sử dụng phần mềm Đấu thầu GXD ', 'khoa-hoc-su-dung-phan-mem-dau-thau-gxd', 0, 0, 'inactive', '3713062733265258bdb6c49c33e07e28.png', '', 'https://youtu.be/0cYu3aVsS-g?list=PLW21vt8mSLvd4qqAQ8mayxs7P99ugF_WE', 'link', 0, '<p>Học l&agrave;m thầu thực sự, nghi&ecirc;n cứu hồ sơ mời thầu, l&agrave;m b&agrave;i thầu, đấu thầu, thắng thầu</p>\r\n', '<p>C&aacute;c b&agrave;i học: video, t&agrave;i liệu dạy bạn&nbsp;thực h&agrave;nh phần mềm Đấu thầu GXD.</p>\r\n\r\n<p>Hệ c&acirc;u hỏi thi trắc nghiệm kiến thức gi&uacute;p bạn củng cố v&agrave; n&acirc;ng tr&igrave;nh l&ecirc;n tầm cao.</p>\r\n', '<p>Version 1.0</p>\r\n\r\n<p>B&agrave;i học gồm c&aacute;c video sử dụng phần mềm Đấu thầu GXD 2016</p>\r\n', NULL, NULL, NULL, 'active', '2016-07-11 10:02:32', '2016-07-22 09:57:09', NULL),
(28, 1, NULL, 'Khóa học Thanh quyết toán GXD ', 'khoa-hoc-thanh-quyet-toan-gxd', 1000000, 500000, 'inactive', 'de23c5893c625026ad87c7ad59e15812.jpg', '', '', 'link', 3600, '<p>Lập hồ sơ thanh to&aacute;n gi&uacute;p chuyển tiền từ kho bạc về t&agrave;i khoản của c&ocirc;ng ty</p>\r\n', '<p>- C&aacute;c kiến thức, kh&aacute;i niệm về c&ocirc;ng t&aacute;c nghiệm thu, thanh to&aacute;n</p>\r\n\r\n<p>- Thực h&agrave;nh c&aacute;c b&agrave;i tập với số liệu thực tế bằng phần mềm Quyết to&aacute;n GXD</p>\r\n\r\n<p>- C&aacute;c t&igrave;nh huống thanh to&aacute;n với hợp đồng trọn g&oacute;i, hợp đồng theo đơn gi&aacute; điều chỉnh, hợp đồng theo đơn gi&aacute; ph&aacute;t sinh</p>\r\n\r\n<p>- C&aacute;c trường hợp ph&aacute;t sinh, điều chỉnh gi&aacute;</p>\r\n', '', NULL, NULL, NULL, '', '2016-07-11 10:13:51', '2016-07-22 07:40:54', NULL),
(29, 1, NULL, 'Khóa học Chỉ huy trưởng công trường', 'khoa-hoc-chi-huy-truong-cong-truong', 800000, 450000, 'inactive', NULL, NULL, '', 'link', 0, '<p>Kiến thức về chỉ huy trưởng c&ocirc;ng trường</p>\r\n', '<p>- Kiến thức cho c&aacute;c kỹ sư muốn phấn đấu l&agrave;m chỉ huy trưởng c&ocirc;ng trường</p>\r\n', '', NULL, NULL, NULL, 'inactive', '2016-07-11 10:17:13', '2016-07-11 10:17:13', NULL),
(30, 1, NULL, 'Lập hồ sơ chất lượng sử dụng phần mềm QLCL GXD', 'lap-ho-so-chat-luong-su-dung-phan-mem-qlcl-gxd', 1000000, 599000, 'inactive', '42cb3ffa52b656d8bdd28f0252b39301.jpg', '', 'https://www.youtube.com/watch?v=v730aDfjXCA', 'link', 0, '<p>Lập hồ sơ chất lượng sử dụng phần mềm Quản l&yacute; chất lượng&nbsp;GXD</p>\r\n', '<p>Lập hồ sơ chất lượng sử dụng phần mềm Quản l&yacute; chất lượng&nbsp;GXD</p>\r\n', '', NULL, NULL, NULL, 'active', '2016-07-12 17:05:57', '2016-07-22 09:34:28', NULL),
(31, 1, NULL, 'test course 1', 'test-course-1', 122222, 11111, 'active', '06a6e86cd94f5ddf82048e07a8e03367.jpg', '06a6e86cd94f5ddf82048e07a8e03367.mp4', '', 'link', 123, '<p>qwerqw</p>\r\n', '<p>qwerq</p>\r\n', '', NULL, NULL, NULL, 'active', '2016-07-13 02:51:36', '2016-07-14 16:35:14', '2016-07-14 16:35:14'),
(32, 1, NULL, 'Thẩm định dự toán', 'tham-dinh-du-toan', 300000, 0, 'inactive', 'c0f4573c68e65a4d838b978b4f1a8761.jpg', '', '', 'link', 0, '<p>Thẩm định / thẩm tra dự to&aacute;n c&ocirc;ng tr&igrave;nh, dự to&aacute;n c&aacute;c g&oacute;i thầu</p>\r\n', '<p>- Nội dung thẩm định / thẩm tra</p>\r\n\r\n<p>- Quy tr&igrave;nh thực hiện</p>\r\n\r\n<p>- Thực hiện chi tiết</p>\r\n', '', NULL, NULL, NULL, '', '2016-07-13 10:01:36', '2016-07-18 02:50:04', NULL),
(33, 1, NULL, 'Thẩm định thiết kế', 'tham-dinh-thiet-ke', 0, 0, 'inactive', 'd24702d03c7552c9b04bca18ecac0153.jpg', '', '', 'link', 0, '<p>Thẩm định thiết kế</p>\r\n', '', '', NULL, NULL, NULL, 'inactive', '2016-07-13 10:02:07', '2016-07-18 02:49:49', NULL),
(34, 1, NULL, 'Tiếng Anh quản lý dự án xây dựng', 'tieng-anh-quan-ly-du-an-xay-dung', 7000000, 399000, 'active', 'fb61678424eb57f3bf2fac9797cbac2d.png', '', 'https://youtu.be/IbbzRNk7eys', 'link', 0, '', '', '', NULL, NULL, NULL, 'active', '2016-07-13 10:02:26', '2016-07-22 09:31:51', NULL),
(35, 1, NULL, 'Tiếng Anh đọc bản vẽ xây dựng', 'tieng-anh-doc-ban-ve-xay-dung', 0, 0, 'inactive', '0f8247a2ab80542689dbcef677afaa39.jpg', '', '', 'link', 0, '', '', '', NULL, NULL, NULL, '', '2016-07-13 10:02:46', '2016-07-22 07:40:38', NULL),
(36, 1, NULL, 'Tiếng Anh dự toán, dự thầu', 'tieng-anh-du-toan-du-thau', 0, 0, 'inactive', NULL, NULL, '', 'link', 0, '', '', '', NULL, NULL, NULL, 'inactive', '2016-07-13 10:03:20', '2016-07-13 10:03:20', NULL),
(37, 1, NULL, 'Tiếng Anh trên công trường', 'tieng-anh-tren-cong-truong', 0, 0, 'inactive', '205518128582533fb6f81c8c64d610fd.png', '', '', 'link', 0, '', '', '', NULL, NULL, NULL, '', '2016-07-13 10:03:37', '2016-07-22 07:40:34', NULL),
(38, 1, NULL, 'Khóa học Lập hồ sơ hoàn công', 'khoa-hoc-lap-ho-so-hoan-cong', 0, 0, 'inactive', '7bad9251896e5f529c91a7edda832243.jpg', '', '', 'link', 45, NULL, '<p>Lập hồ sơ ho&agrave;n th&agrave;nh c&ocirc;ng tr&igrave;nh, nghiệm thu, b&agrave;n giao</p>\r\n', '<p>- Danh mục hồ sơ ho&agrave;n c&ocirc;ng</p>\r\n\r\n<p>- Nghiệm thu, thanh to&aacute;n</p>\r\n', NULL, NULL, NULL, '', '2016-07-14 16:40:34', '2016-07-22 07:40:31', NULL),
(39, 1, NULL, 'Chỉ huy trưởng công trường', 'chi-huy-truong-cong-truong', 0, 0, 'inactive', '0e7ed87419fa5c3185df639f9053f95c.jpg', '', '', 'link', 0, NULL, '<p>Kh&oacute;a học đ&agrave;o tạo&nbsp;chỉ huy trưởng c&ocirc;ng trường cấp chứng nhận online</p>\r\n', '<p>C&aacute;c nghiệp vụ cần c&oacute; cho kh&oacute;a chỉ huy trưởng c&ocirc;ng trường</p>\r\n', NULL, NULL, NULL, '', '2016-07-16 19:56:17', '2016-07-22 07:40:28', NULL),
(40, 1, NULL, 'Giám sát thi công xây dựng công trình dân dụng', 'giam-sat-thi-cong-xay-dung-cong-trinh-dan-dung', 0, 0, 'inactive', '7918bdaedd0a5735b17466f9c5ed4ded.jpg', '', '', 'link', 0, NULL, '', '', NULL, NULL, NULL, '', '2016-07-16 20:21:25', '2016-07-22 07:40:25', NULL),
(41, 1, NULL, 'Giám sát thi công xây dựng công trình giao thông', 'giam-sat-thi-cong-xay-dung-cong-trinh-giao-thong', 0, 0, 'inactive', '97a6f803701356dfb65ba9ce31a39206.jpg', '', '', 'link', 0, NULL, '', '', NULL, NULL, NULL, '', '2016-07-16 20:30:40', '2016-07-22 07:40:22', NULL),
(42, 1, NULL, 'Giám sát thi công xây dựng công trình thủy lợi, thủy điện', 'giam-sat-thi-cong-xay-dung-cong-trinh-thuy-loi-thuy-dien', 0, 0, 'inactive', '7437827ea4b85114b0c7108d166cc6c6.jpg', '', '', 'link', 0, NULL, '', '', NULL, NULL, NULL, '', '2016-07-16 20:31:13', '2016-07-22 07:40:17', NULL),
(43, 1, NULL, 'Giám sát thi công xây dựng công trình công nghiệp', 'giam-sat-thi-cong-xay-dung-cong-trinh-cong-nghiep', 0, 0, 'inactive', '73769f99430c5e4bb41f4184bca8c6b5.jpg', '', '', 'link', 0, NULL, '', '', NULL, NULL, NULL, '', '2016-07-16 20:31:47', '2016-07-22 07:40:16', NULL),
(44, 1, NULL, 'Giám sát thi công xây dựng công trình hạ tầng kỹ thuật', 'giam-sat-thi-cong-xay-dung-cong-trinh-ha-tang-ky-thuat', 0, 0, 'inactive', '093a120963c85e30bd72b1caab465d22.jpg', '', '', 'link', 0, NULL, '', '', NULL, NULL, NULL, '', '2016-07-16 20:32:09', '2016-07-22 07:40:14', NULL),
(45, 1, NULL, 'Test course', 'test-course', 56666, 5677, 'active', NULL, '/tmp/php8MebGf', 'https://www.youtube.com/watch?v=bzZ5AlI-IdE', 'link', 125, NULL, '<p>https://www.youtube.com/watch?v=bzZ5AlI-IdE</p>\r\n', '<p>https://www.youtube.com/watch?v=bzZ5AlI-IdE</p>\r\n', NULL, NULL, NULL, 'active', '2016-07-17 00:43:11', '2016-07-17 01:29:27', '2016-07-17 01:29:27'),
(46, 18, NULL, 'Microsoft Project quản lý tiến độ thi công', 'microsoft-project-quan-ly-tien-do-thi-cong', 0, 0, 'active', '7848cf66d41d54ae9bd645b523b240f7.jpg', '', 'https://www.youtube.com/watch?v=tKT6KkAxqD4', 'link', 0, NULL, '<h1>Thiết lập cho Windows để chạy tốt Microsoft Project v&agrave; c&aacute;c phần mềm GXD</h1>\r\n', '', NULL, NULL, NULL, 'active', '2016-07-17 17:29:09', '2016-07-22 21:44:43', NULL),
(47, 1, NULL, 'Khóa học lập dự toán công trình thủy lợi', 'khoa-hoc-lap-du-toan-cong-trinh-thuy-loi', 0, 0, 'inactive', '310e307fa9bd5180b0fea9aafddece05.jpg', '', '', 'link', 0, NULL, '', '', NULL, NULL, NULL, '', '2016-07-18 09:25:32', '2016-07-22 07:40:11', NULL),
(48, 1, NULL, '101 bài tập tình huống lập dự toán', '101-bai-tap-tinh-huong-lap-du-toan', 0, 0, 'inactive', NULL, '', '', 'link', 0, NULL, '<p>Khi đang dạy học t&ocirc;i&nbsp;chợt nảy ra &yacute; tưởng mở kho&aacute; online c&oacute; t&ecirc;n l&agrave;: <strong>101 b&agrave;i tập t&igrave;nh huống Lập dự to&aacute;n</strong>. Trong kh&oacute;a học n&agrave;y t&ocirc;i sẽ tr&igrave;nh b&agrave;y với c&aacute;c bạn:<br />\r\nC&aacute;c b&agrave;i tập&nbsp;t&igrave;nh huống chọn lọc về&nbsp;định mức, đơn gi&aacute;, hệ số, gi&aacute; vật liệu hiện trường...<br />\r\nTham gia kh&oacute;a học, giải xong c&aacute;c b&agrave;i tập n&agrave;y bạn c&oacute; 1 nền tảng kiến thức rất tốt&nbsp;lu&ocirc;n.</p>\r\n', '<p>Version 1</p>\r\n\r\n<p>20 b&agrave;i tập đầu ti&ecirc;n</p>\r\n', NULL, NULL, NULL, 'active', '2016-07-22 07:57:02', '2016-07-22 07:57:02', NULL),
(49, 1, NULL, '101 bài tập tình huống xác định giá thầu, đấu thầu', '101-bai-tap-tinh-huong-xac-dinh-gia-thau-dau-thau', 0, 0, 'inactive', NULL, '', '', 'link', 0, NULL, '<p>C&aacute;c b&agrave;i tập t&igrave;nh huống về t&iacute;nh to&aacute;n x&aacute;c định gi&aacute; thầu</p>\r\n\r\n<p>- Chiết t&iacute;nh đơn gi&aacute; ch&agrave;o thầu</p>\r\n\r\n<p>- Chỉnh sửa định mức nội bộ</p>\r\n\r\n<p>- Gi&aacute; tổng hợp ch&agrave;o thầu</p>\r\n\r\n<p>...</p>\r\n', '<p>Version 1</p>\r\n\r\n<p>20 b&agrave;i tập&nbsp;đầu ti&ecirc;n</p>\r\n', NULL, NULL, NULL, 'active', '2016-07-22 07:59:35', '2016-07-22 07:59:35', NULL),
(50, 4, NULL, 'Lập trình viên php', 'lap-trinh-vien-php', 0, 0, 'inactive', NULL, '', '', 'link', 0, NULL, '', '', NULL, NULL, NULL, 'active', '2016-07-22 11:28:55', '2016-07-23 05:50:47', '2016-07-23 05:50:47'),
(51, 1, NULL, 'Định giá xây dựng', 'dinh-gia-xay-dung', 0, 0, 'inactive', NULL, '', '', 'link', 0, NULL, '<p>Định gi&aacute; x&acirc;y dựng</p>\r\n', '', NULL, NULL, NULL, 'active', '2016-07-25 04:01:17', '2016-07-25 04:03:26', NULL);
INSERT INTO `courses` (`id`, `author_id`, `certificate_id`, `name`, `alias`, `price`, `sell_price`, `feature`, `image`, `video`, `video_link`, `video_type`, `duration`, `description`, `detail`, `version`, `rate`, `learned`, `order`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(52, 11, NULL, 'Xử lý các tình huống trong quá trình sử dụng Phần mềm GXD', 'xu-ly-cac-tinh-huong-trong-qua-trinh-su-dung-phan-mem-gxd', 0, 0, 'active', NULL, '', 'https://www.youtube.com/watch?v=GJwPZ072DZw&index=1', 'link', 1, NULL, '<p>Trong qu&aacute; tr&igrave;nh c&agrave;i đặt v&agrave; sử dụng <strong>Phần mềm GXD</strong>. C&aacute;c bạn c&oacute; thể sẽ gặp v&agrave;i t&igrave;nh huống kh&oacute; khăn dẫn đến việc kh&ocirc;ng sử dụng được phần mềm, hoặc kh&ocirc;ng tận dụng được to&agrave;n bộ c&aacute;c t&iacute;nh năng vượt trội của <strong>Phần mềm GXD</strong>.</p>\r\n\r\n<p>Để gi&uacute;p kh&aacute;ch h&agrave;ng c&oacute; thể sử dụng được v&agrave; sử dụng tốt <strong>hệ thống phần mềm GXD</strong>. Ch&uacute;ng t&ocirc;i mang đến Kh&oacute;a học Hướng dẫn xử l&yacute; t&igrave;nh huống trong qu&aacute; tr&igrave;nh c&agrave;i đặt v&agrave; sử dụng Phần mềm GXD ho&agrave;n to&agrave;n miễn ph&iacute;.</p>\r\n\r\n<p><em><strong>C&ocirc;ng ty CP Gi&aacute; X&acirc;y Dựng</strong></em> sẽ li&ecirc;n tục cập nhật c&aacute;c trường hợp kh&oacute; khăn v&agrave; phương ph&aacute;p xử l&yacute;. Mong rằng hệ thống video hướng dẫn tr&ecirc;n sẽ hỗ trợ qu&yacute; kh&aacute;ch giải quyết được những kh&oacute; khăn kh&ocirc;ng thể tự xử l&yacute; trong qu&aacute; tr&igrave;nh c&agrave;i đặt v&agrave; sử dụng <strong>Phần mềm GXD</strong>.</p>\r\n\r\n<hr />\r\n<p><em><strong>Mọi thắc mắc xin li&ecirc;n hệ:</strong></em><br />\r\n<em><strong>C&ocirc;ng ty CP Gi&aacute; X&acirc;y Dựng</strong><br />\r\nSố 2a/55 Nguyễn Ngọc Nại, Thanh Xu&acirc;n, H&agrave; Nội.<br />\r\nHotline CSKH: 1900 0147 - 098 281 2793<br />\r\nEmail: Tranlinh@giaxaydung.com</em></p>\r\n', '', NULL, NULL, NULL, 'active', '2016-07-25 23:53:47', '2016-07-26 00:12:18', '2016-07-26 00:12:18'),
(53, 13, NULL, 'Lập hồ sơ chất lượng bằng phần mềm QLCL GXD', 'lap-ho-so-chat-luong-bang-phan-mem-qlcl-gxd', 800000, 0, 'active', NULL, '', '', 'link', 0, NULL, '<p><strong>KH&Oacute;A HỌC LẬP HỒ SƠ CHẤT LƯỢNG SỬ DỤNG PHẦN MỀM QLCL GX</strong>D</p>\r\n\r\n<hr />\r\n<ul>\r\n	<li>\r\n	<h2><strong>NỘI DUNG KH&Oacute;A HỌC&nbsp;</strong></h2>\r\n	</li>\r\n</ul>\r\n\r\n<p>B&agrave;i 1:&nbsp;Quy định hiện h&agrave;nh về quản l&yacute; chất lượng c&ocirc;ng tr&igrave;nh x&acirc;y dựng</p>\r\n\r\n<p>B&agrave;i 2:&nbsp;Giới thiệu phần mềm Quản l&yacute; chất lượng GXD</p>\r\n\r\n<p>B&agrave;i 3:&nbsp;Chỉnh sửa nội dung cơ bản trong bi&ecirc;n bản nghiệm thu tr&ecirc;n phần mềm Quản l&yacute; chất lượng GXD</p>\r\n\r\n<p>B&agrave;i 4:&nbsp;Lập bi&ecirc;n bản nghiệm thu vật liệu, thiết bị, cấu kiện chế tạo sẵn trước khi đưa v&agrave;o sử dụng</p>\r\n\r\n<p>B&agrave;i 5:&nbsp;Chỉnh sửa bảng số liệu nghiệm thu v&agrave; dữ liệu nghiệm thu vật liệu</p>\r\n\r\n<p>B&agrave;i 6:&nbsp;Lập bi&ecirc;n bản nghiệm thu c&ocirc;ng việc x&acirc;y dựng</p>\r\n\r\n<p>B&agrave;i 7:&nbsp;Chỉnh sửa bảng biểu v&agrave; dữ liệu nghiệm thu c&ocirc;ng việc</p>\r\n\r\n<p>B&agrave;i 8:&nbsp;Nghiệm thu khối lượng, tr&igrave;nh b&agrave;y khối lượng trong bi&ecirc;n bản nghiệm thu c&ocirc;ng việc</p>\r\n\r\n<p>B&agrave;i 9:&nbsp;C&aacute;c tiện &iacute;ch tăng tốc c&ocirc;ng t&aacute;c lập hồ sơ nghiệm thu</p>\r\n\r\n<p>B&agrave;i 10:&nbsp;In ấn hồ sơ</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', NULL, NULL, NULL, 'active', '2016-07-26 00:52:41', '2016-07-26 01:00:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses_lessons`
--

CREATE TABLE IF NOT EXISTS `courses_lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `caption` text,
  `status` enum('inactive','active') DEFAULT NULL,
  `order` int(11) NOT NULL,
  `section_order` int(11) DEFAULT NULL,
  `be_shared` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=299 ;

--
-- Dumping data for table `courses_lessons`
--

INSERT INTO `courses_lessons` (`id`, `course_id`, `lesson_id`, `section_id`, `caption`, `status`, `order`, `section_order`, `be_shared`, `created_at`, `updated_at`, `deleted_at`) VALUES
(25, 21, 6, 38, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(33, 25, 14, 43, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(34, 1, 13, 2, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(35, 1, 14, 3, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(36, 30, 15, 53, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(37, 30, 16, 54, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(38, 30, 17, 55, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(40, 30, 19, 57, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(41, 30, 20, 57, NULL, NULL, 2, NULL, 0, NULL, NULL, NULL),
(42, 30, 22, 57, NULL, NULL, 3, NULL, 0, NULL, NULL, NULL),
(43, 30, 21, 57, NULL, NULL, 4, NULL, 0, NULL, NULL, NULL),
(44, 1, 7, 1, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(73, 30, 15, 108, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(74, 30, 16, 109, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(75, 30, 17, 110, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(77, 30, 19, 112, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(78, 30, 20, 112, NULL, NULL, 2, NULL, 0, NULL, NULL, NULL),
(79, 30, 22, 112, NULL, NULL, 3, NULL, 0, NULL, NULL, NULL),
(80, 30, 21, 112, NULL, NULL, 4, NULL, 0, NULL, NULL, NULL),
(84, 1, 7, 116, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(85, 1, 13, 117, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(87, 1, 14, 118, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(89, 1, 7, 124, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(90, 1, 13, 125, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(92, 1, 14, 126, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(94, 1, 7, 127, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(95, 1, 13, 128, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(97, 1, 14, 129, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(99, 1, 7, 130, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(100, 1, 13, 131, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(102, 1, 14, 132, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(107, 1, 14, 136, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(108, 1, 13, 137, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(118, 1, 14, 170, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(119, 1, 13, 171, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(122, 30, 15, 174, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(123, 30, 16, 175, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(124, 30, 17, 176, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(126, 30, 19, 178, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(127, 30, 20, 178, NULL, NULL, 2, NULL, 0, NULL, NULL, NULL),
(128, 30, 22, 178, NULL, NULL, 3, NULL, 0, NULL, NULL, NULL),
(129, 30, 21, 178, NULL, NULL, 4, NULL, 0, NULL, NULL, NULL),
(130, 25, 14, 179, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(131, 1, 14, 182, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(132, 1, 13, 183, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(135, 27, 37, 195, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(136, 27, 38, 195, NULL, NULL, 2, NULL, 0, NULL, NULL, NULL),
(165, 7, 31, 243, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(166, 7, 35, 247, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(285, 22, 50, 311, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(286, 22, 43, 311, NULL, NULL, 2, NULL, 0, NULL, NULL, NULL),
(287, 22, 44, 311, NULL, NULL, 3, NULL, 0, NULL, NULL, NULL),
(288, 22, 45, 311, NULL, NULL, 4, NULL, 0, NULL, NULL, NULL),
(289, 22, 52, 311, NULL, NULL, 5, NULL, 0, NULL, NULL, NULL),
(290, 22, 46, 312, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(291, 22, 47, 312, NULL, NULL, 2, NULL, 0, NULL, NULL, NULL),
(292, 22, 48, 312, NULL, NULL, 3, NULL, 0, NULL, NULL, NULL),
(293, 22, 49, 312, NULL, NULL, 4, NULL, 0, NULL, NULL, NULL),
(294, 22, 51, 312, NULL, NULL, 5, NULL, 0, NULL, NULL, NULL),
(295, 23, 53, 316, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL),
(296, 23, 54, 316, NULL, NULL, 2, NULL, 0, NULL, NULL, NULL),
(297, 23, 55, 316, NULL, NULL, 3, NULL, 0, NULL, NULL, NULL),
(298, 23, 56, 316, NULL, NULL, 4, NULL, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses_reviews`
--

CREATE TABLE IF NOT EXISTS `courses_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `comment_id` int(255) NOT NULL,
  `rate` int(11) NOT NULL,
  `status` enum('inactive','active') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE IF NOT EXISTS `exams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `lession_id` int(11) DEFAULT NULL,
  `factor` int(11) NOT NULL,
  `score` float NOT NULL,
  `status` enum('inactive','active') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `code`, `user_id`, `teacher_id`, `course_id`, `lession_id`, `factor`, `score`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 1, 1, 1, 2, 0, 0, 'active', '2016-07-05 13:36:37', '2016-07-05 13:36:37', NULL),
(2, 1, 1, 1, 1, 2, 0, 8.33333, 'active', '2016-07-06 06:25:19', '2016-07-06 06:25:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE IF NOT EXISTS `lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `alias` varchar(512) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `video_link` varchar(255) NOT NULL,
  `video_type` enum('upload','link') NOT NULL DEFAULT 'upload',
  `posts` text,
  `attach` text,
  `exams` tinyint(4) DEFAULT '0',
  `question_limit` int(11) DEFAULT NULL,
  `status` enum('inactive','active') NOT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `author_id`, `name`, `alias`, `video`, `video_link`, `video_type`, `posts`, `attach`, `exams`, `question_limit`, `status`, `order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 1, '[Bài 1] Xử lý tình huống thiếu thư viện Vcredist (Vissua C++)', '', 'ce15352b24d855ca9bc7b7cdc901d0d3.mp4', '', 'upload', '<p>Bước 1: Tắt ho&agrave;n to&agrave;n Microsoft Office</p>\r\n\r\n<p>Bước 2: V&agrave;o Control Panel/Uninstal (Add and Remove program)</p>\r\n\r\n<p>Bước 3: T&iacute;ch v&agrave;o Microsoft Office =&gt; chọn Change/Add and remove Features =&gt; Continue</p>\r\n\r\n<p>Bước 4: Chọn Run all from my Computer những mục sau: Access, Excel, Shared Features, Tools =&gt; Continue</p>\r\n', '0', 0, 0, 'active', 0, '2016-07-09 04:14:02', '2016-07-09 04:14:02', NULL),
(7, 1, '[Bài 1] Hướng dẫn cài đặt và kích hoạt Phần mềm Dự toán GXD 10', '', '326e31d9ff43590c89079016a9a3ac8a.mp4', '', 'upload', '<p>Bước 1: Tải bộ c&agrave;i đặt GXDSoft.exe tại Giaxaydung.vn hoặc tải trực tiếp trong B&agrave;i học</p>\r\n\r\n<p><img src="file:///C:\\Users\\ADMINI~1\\AppData\\Local\\Temp\\SNAGHTML272e60.PNG" style="height:814px; width:797px" /></p>\r\n\r\n<p>Bước 2: Chạy file c&agrave;i đặt GXDSoft.exe</p>\r\n\r\n<p>- Chọn Phần mềm:&nbsp;Dự to&aacute;n GXD</p>\r\n\r\n<p>- Chọn Phi&ecirc;n bản: Phi&ecirc;n bản&nbsp;mới nhất</p>\r\n\r\n<p>- Chọn loại Kh&oacute;a</p>\r\n\r\n<p>=&gt; Bấm C&agrave;i đặt</p>\r\n\r\n<p><img alt="" src="https://www.facebook.com/photo.php?fbid=1394886590526540&amp;set=gm.695927163904262&amp;type=3&amp;theater" /></p>\r\n\r\n<p>Bước 3: K&iacute;ch hoạt phần mềm</p>\r\n\r\n<p>1. Phi&ecirc;n bản kh&oacute;a cứng</p>\r\n\r\n<p>- Phần mềm tự động active khi cắm Kh&oacute;a cứng</p>\r\n\r\n<p>2. Phi&ecirc;n bản kh&oacute;a mềm</p>\r\n\r\n<p>- Nhập lại Email nếu đ&atilde; từng k&iacute;ch hoạt Phần mềm =&gt; X&aacute;c nhận</p>\r\n\r\n<p>- Đăng k&yacute; lần đầu =&gt; K&iacute;ch v&agrave;o n&uacute;t Đăng k&yacute; =&gt; 2. Bấm v&agrave;o đ&acirc;y để nhập m&atilde; k&iacute;ch hoạt =&gt; Nhập đầy đủ th&ocirc;ng tin c&ugrave;ng M&atilde; k&iacute;ch hoạt =&gt; Đăng k&yacute;</p>\r\n', '326e31d9ff43590c89079016a9a3ac8a.exe', 0, 0, 'active', 0, '2016-07-10 03:50:42', '2016-07-10 03:50:42', NULL),
(8, 1, '[Bài 2] Tự động khắc phục lỗi cài đặt phần mềm GXD', '', '1ebd1d9d76fc5dcaaa4f693a66117236.mp4', '', 'upload', '', '0', 0, 0, 'active', 0, '2016-07-10 05:18:58', '2016-07-10 05:18:58', NULL),
(9, 1, '[Bài 3] Chọn mẫu dự toán - Dự toán GXD 10', '', '0713123283175cd59189d94f5ff9c16a.mp4', '', 'upload', '', '0', 0, 0, 'active', 0, '2016-07-10 05:19:29', '2016-07-10 05:19:29', NULL),
(10, 1, '[Bài 4] Tải dữ liệu định mức, đơn giá, ghép các dữ liệu trong 1 file dự toán - Dự toán GXD 10', '', '9db7878637805ba195ddbb8f88a2e8c6.mp4', '', 'upload', '', '0', 1, 0, 'active', 0, '2016-07-10 05:20:22', '2016-07-10 05:20:22', NULL),
(11, 1, '[Bài 5] Hướng dẫn tra mã hiệu đơn giá, nhập diễn giải khối lượng - Dự toán GXD 10', '', '2b4666ea2dc95aefbc2e3a1dac9f980f.mp4', '', 'upload', '', '0', 0, 0, 'active', 0, '2016-07-10 08:57:28', '2016-07-10 08:57:28', NULL),
(13, 1, '[Bài 7] Tổng hợp vật tư bù trừ chênh lệch vật liệu, nhân công, máy - Dự toán GXD 10', '', 'cb6fdeefe13252fcbd12bf27d212b001.mp4', '', 'upload', '', '0', 0, 0, 'active', 0, '2016-07-10 08:58:51', '2016-07-10 08:58:51', NULL),
(14, 1, 'Bài 1 Các khái niệm về dự toán xây dựng công trình', '', '', 'https://www.youtube.com/watch?v=NOeTyKBfyyk', 'link', '<p>-&nbsp;Giới thiệu sơ đồ c&aacute;c giai đoạn thực hiện dự &aacute;n đầu tư v&agrave; sự h&igrave;nh th&agrave;nh chi ph&iacute; đầu tư x&acirc;y dựng c&ocirc;ng tr&igrave;nh qua c&aacute;c giai đoạn<br />\r\n-&nbsp;Dự to&aacute;n x&acirc;y dựng được x&aacute;c định&nbsp;ở giai đoạn n&agrave;o của dự &aacute;n<br />\r\n-&nbsp;Sơ lược c&aacute;c khoản mục chi ph&iacute; dự to&aacute;n x&acirc;y dựng c&ocirc;ng tr&igrave;nh<br />\r\n-&nbsp;Căn cứ ph&aacute;p l&yacute; để lập dự to&aacute;n<br />\r\n-&nbsp;C&aacute;c phương ph&aacute;p lập dự to&aacute;n x&acirc;y dựng c&ocirc;ng tr&igrave;nh<br />\r\n-&nbsp;T&igrave;m hiểu định mức, đơn gi&aacute;<br />\r\n-&nbsp;Thực h&agrave;nh x&aacute;c định định mức, đơn gi&aacute; bằng thủ c&ocirc;ng</p>\r\n', '', 1, 0, 'active', 0, '2016-07-11 10:30:23', '2016-07-22 08:53:14', NULL),
(15, 1, 'Quy định hiện hành về quản lý chất lượng công trình xây dựng', '', '', '', 'upload', '<p>C&aacute;c quy định hiện h&agrave;nh về quản l&yacute; chất lượng c&ocirc;ng tr&igrave;nh x&acirc;y dựng (Luật X&acirc;y dựng, Nghị định số 46/2015/NĐ-CP v&agrave; c&aacute;c Th&ocirc;ng tư hướng dẫn)</p>\r\n', '', 1, 0, 'active', 0, '2016-07-12 16:46:53', '2016-07-12 16:46:53', NULL),
(16, 1, 'Giới thiệu phần mềm Quản lý chất lượng GXD', '', '', '', 'upload', '<p>Giới thiệu phần mềm Quản l&yacute; chất lượng GXD</p>\r\n', '', 1, 0, 'active', 0, '2016-07-12 16:47:16', '2016-07-12 16:47:16', NULL),
(17, 1, 'Chỉnh sửa nội dung trong biên bản nghiệm thu trên phần mềm QLCL GXD', '', '', '', 'upload', '<p>Chỉnh sửa nội dung cơ bản trong bi&ecirc;n bản nghiệm thu tr&ecirc;n phần mềm Quản l&yacute; chất lượng GXD</p>\r\n', '', 1, 0, 'active', 0, '2016-07-12 16:47:56', '2016-07-12 16:47:56', NULL),
(19, 1, 'Chỉnh sửa bảng số liệu nghiệm thu và dữ liệu nghiệm thu vật liệu', '', '', '', 'upload', '<p>Hướng dẫn chỉnh sửa bảng số liệu nghiệm thu v&agrave; dữ liệu nghiệm thu vật liệu</p>\r\n', '', 1, 0, 'active', 0, '2016-07-12 16:50:13', '2016-07-12 16:50:13', NULL),
(20, 1, 'Chỉnh sửa bảng số liệu nghiệm thu và dữ liệu nghiệm thu công việc', '', '', '', 'upload', '<p>Hướng dẫn chỉnh sửa bảng số liệu nghiệm thu v&agrave; dữ liệu nghiệm thu c&ocirc;ng việc</p>\r\n\r\n<p>- V&iacute; dụ cụ thể thực h&agrave;nh&nbsp;chỉnh sửa bảng nội dung bi&ecirc;n bản nghiệm thu c&ocirc;ng việc<br />\r\n- V&iacute; dụ cụ thể thực h&agrave;nh chỉnh sửa dữ liệu nghiệm thu c&ocirc;ng việc</p>\r\n', '', 1, 0, 'active', 0, '2016-07-12 16:50:58', '2016-07-12 23:11:47', NULL),
(21, 1, 'Các tiện ích khác của phần mềm QLCL GXD', '', '', '', 'upload', '<p>C&aacute;c tiện &iacute;ch kh&aacute;c của phần mềm QLCL GXD</p>\r\n\r\n<p>- Tổng hợp danh mục hồ sơ<br />\r\n- Xuất số liệu ghi nhật k&yacute;<br />\r\n- In ấn hồ sơ</p>\r\n', '', 1, 0, 'active', 0, '2016-07-12 16:52:52', '2016-07-12 23:10:22', NULL),
(22, 1, 'Khối lượng công việc trong biên bản nghiệm thu', '', '', '', 'upload', '<p>- Tr&igrave;nh b&agrave;y&nbsp;khối lượng c&ocirc;ng việc trong bi&ecirc;n bản nghiệm thu</p>\r\n\r\n<p>- Tổng hợp khối lượng nghiệm thu theo giai đoạn</p>\r\n\r\n<p>- Nhập diễn giải khối lượng nghiệm thu</p>\r\n\r\n<p>- Nhập diễn giải khối lượng nghiệm thu</p>\r\n', '', 1, 0, 'active', 0, '2016-07-12 16:53:51', '2016-07-12 23:09:48', NULL),
(23, 1, 'Lập biên bản nghiệm thu công việc xây dựng', '', '', '', 'upload', '<p>- Quy tr&igrave;nh nghiệm thu c&ocirc;ng việc<br />\r\n- Hướng dẫn nhập số liệu nghiệm thu c&ocirc;ng việc tr&ecirc;n phần mềm</p>\r\n', '', 1, 0, 'active', 0, '2016-07-12 23:12:41', '2016-07-12 23:12:54', NULL),
(24, 1, 'Các quy định chung về hợp đồng trong hoạt động xây dựng', '', '', '', 'upload', '<p>T&igrave;m hiểu về hợp đồng x&acirc;y dựng</p>\r\n\r\n<p>Nghị định số 37/2015/NĐ-CP của Ch&iacute;nh phủ về&nbsp;Hợp đồng x&acirc;y dựng</p>\r\n\r\n<p>Th&ocirc;ng tư hướng dẫn 07/2016/TT-BXD,&nbsp;08/2016/TT-BXD,&nbsp;09/2016/TT-BXD</p>\r\n', '', 1, 0, 'active', 0, '2016-07-13 00:36:17', '2016-07-13 00:36:17', NULL),
(25, 1, 'Quy định về Thanh quyết toán hợp đồng xây dựng', '', '', '', 'upload', '<p>Th&ocirc;ng tư số 08/2016/TT-BTC của Bộ T&agrave;i ch&iacute;nh về thanh quyết to&aacute;n khối lượng ho&agrave;n th&agrave;nh, thanh quyết to&aacute;n hợp đồng</p>\r\n', '', 1, 0, 'active', 0, '2016-07-13 00:37:12', '2016-07-13 00:37:12', NULL),
(26, 1, 'Giới thiệu biểu Phụ lục 03a, Phụ lục 04 và các chỉ tiêu', '', '', '', 'upload', '<p>- &nbsp;T&igrave;m hiểu Phụ lục 03a thanh to&aacute;n khối lượng ho&agrave;n th&agrave;nh</p>\r\n\r\n<p>- T&igrave;m hiểu&nbsp;Phụ lục 04 thanh to&aacute;n khối lượng ph&aacute;t sinh</p>\r\n\r\n<p>- C&aacute;ch t&iacute;nh to&aacute;n c&aacute;c chỉ ti&ecirc;u</p>\r\n\r\n<p>- Nhập khối lượng ho&agrave;n th&agrave;nh</p>\r\n', '', 1, 0, 'active', 0, '2016-07-13 00:39:13', '2016-07-13 00:39:13', NULL),
(27, 1, 'Giới thiệu phần mềm Quyết toán GXD', '', '', '', 'upload', '<p>- C&agrave;i phần mềm Quyết to&aacute;n GXD</p>\r\n\r\n<p>- Giao diện, menu, một số lệnh ch&iacute;nh của Quyết to&aacute;n GXD</p>\r\n\r\n<p>- Nguy&ecirc;n tắc hoạt động</p>\r\n', '', 1, 0, 'active', 0, '2016-07-13 00:40:07', '2016-07-13 00:40:07', NULL),
(28, 1, 'Đưa số liệu biểu giá hợp đồng vào Quyết toán GXD và lập bảng thanh toán', '', '', '', 'upload', '<p>- Nhập số liệu từ biểu gi&aacute; hợp đồng v&agrave;o phần mềm Quyết to&aacute;n GXD v&agrave; sử dụng cho nhiều lần thanh to&aacute;n</p>\r\n\r\n<p>- Phục hồi số liệu biểu gi&aacute; hợp đồng</p>\r\n\r\n<p>- Sử dụng tiện &iacute;ch Nhập dữ liệu biểu gi&aacute; hợp đồng của phần mềm&nbsp;</p>\r\n', '', 1, 0, 'active', 0, '2016-07-13 00:41:59', '2016-07-13 00:41:59', NULL),
(29, 1, 'Xây dựng biểu giá hợp đồng từ danh mục công việc mời thầu', '', '', '', 'upload', '<p>- Quy tr&igrave;nh lập biểu gi&aacute; hợp đồng</p>\r\n\r\n<p>- Th&agrave;nh thạo c&aacute;c lệnh trong menu gi&aacute; dự thầu</p>\r\n', '', 1, 0, 'active', 0, '2016-07-13 00:43:09', '2016-07-13 00:43:09', NULL),
(30, 1, 'Hướng dẫn lập phụ lục thanh toán hợp đồng', '', '', '', 'upload', '<p>Lưu &yacute; trường hợp được điều chỉnh gi&aacute; hợp đồng</p>\r\n', '', 1, 0, 'active', 0, '2016-07-13 00:44:06', '2016-07-13 00:44:06', NULL),
(31, 1, 'Bài 1 Những quy định chung của Nghị định số 32/2015/NĐ-CP', '', '', '', 'upload', '<p>B&agrave;i học những quy định chung của Nghị định số 32/2015/NĐ-CP về quản l&yacute; chi ph&iacute; tr&igrave;nh b&agrave;y, ph&acirc;n t&iacute;ch v&agrave; c&oacute; c&aacute;c v&iacute; dụ rất hay về:</p>\r\n\r\n<p>- Đối tượng &aacute;p dụng</p>\r\n\r\n<p>- Phạm vi &aacute;p dụng</p>\r\n\r\n<p>- Nguy&ecirc;n tắc quản l&yacute; chi ph&iacute;</p>\r\n', '', 1, 0, 'active', 0, '2016-07-22 07:17:15', '2016-07-22 07:17:15', NULL),
(32, 1, 'Bài 2 Tổng mức đầu tư xây dựng', '', '', '', 'upload', '<p>B&agrave;i n&agrave;y tr&igrave;nh b&agrave;y về:</p>\r\n\r\n<p>- Kh&aacute;i niệm, vai tr&ograve;, thời điểm x&aacute;c định Tổng mức đầu tư x&acirc;y dựng</p>\r\n\r\n<p>- Nội dung của Tổng mức đầu tư x&acirc;y dựng</p>\r\n\r\n<p>- Phương ph&aacute;p x&aacute;c định Tổng mức đầu tư x&acirc;y dựng</p>\r\n\r\n<p>- Thẩm định, ph&ecirc; duyệt Tổng mức đầu tư x&acirc;y dựng</p>\r\n\r\n<p>- Điều chỉnh Tổng mức đầu tư x&acirc;y dựng</p>\r\n', '', 1, 0, 'active', 0, '2016-07-22 07:19:27', '2016-07-22 07:19:27', NULL),
(33, 1, 'Bài 3a Dự toán Xây dựng công trình', '', '', '', 'upload', '<p>B&agrave;i n&agrave;y gi&uacute;p bạn hiểu về:</p>\r\n\r\n<p>- Vai tr&ograve;, &yacute; nghĩa, thời điểm x&aacute;c định dự to&aacute;n x&acirc;y dựng</p>\r\n\r\n<p>- Nội dung dự to&aacute;n x&acirc;y dựng c&ocirc;ng tr&igrave;nh</p>\r\n\r\n<p>- Phương ph&aacute;p x&aacute;c định dự to&aacute;n x&acirc;y dựng c&ocirc;ng tr&igrave;nh</p>\r\n\r\n<p>- Thẩm định, ph&ecirc; duyệt dự to&aacute;n x&acirc;y dựng c&ocirc;ng tr&igrave;nh</p>\r\n\r\n<p>- Điều chỉnh dự to&aacute;n x&acirc;y dựng c&ocirc;ng tr&igrave;nh</p>\r\n', '', 1, 0, 'active', 0, '2016-07-22 07:22:35', '2016-07-22 07:22:35', NULL),
(34, 1, 'Bài 3b Dự toán gói thầu xây dựng', '', '', '', 'upload', '<p>B&agrave;i n&agrave;y gi&uacute;p bạn hiểu về:</p>\r\n\r\n<p>- Vai tr&ograve;, &yacute; nghĩa, thời điểm x&aacute;c định dự to&aacute;n g&oacute;i thầu&nbsp;x&acirc;y dựng</p>\r\n\r\n<p>- Quy định chung về dự to&aacute;n g&oacute;i thầu x&acirc;y dựng</p>\r\n\r\n<p>- Dự to&aacute;n g&oacute;i thầu thi c&ocirc;ng&nbsp;x&acirc;y dựng</p>\r\n\r\n<p>- Dự to&aacute;n g&oacute;i thầu mua sắm vật tư, thiết bị&nbsp;lắp đặt v&agrave;o c&ocirc;ng tr&igrave;nh</p>\r\n\r\n<p>- Dự to&aacute;n g&oacute;i thầu tư vấn đầu tư x&acirc;y dựng</p>\r\n\r\n<p>- Dự to&aacute;n g&oacute;i thầu hỗn hợp</p>\r\n', '', 1, 0, 'active', 0, '2016-07-22 07:25:14', '2016-07-22 07:25:14', NULL),
(35, 1, 'Bài 4a Định mức xây dựng', '', '', '', 'upload', '<p>- Kh&aacute;i niệm, vai tr&ograve; của định mức kinh tế - kỹ thuật</p>\r\n\r\n<p>- Kh&aacute;i niệm, vai tr&ograve; của định mức chi ph&iacute;</p>\r\n\r\n<p>- Quản l&yacute; định mức x&acirc;y dựng</p>\r\n', '', 1, 0, 'active', 0, '2016-07-22 07:26:53', '2016-07-22 07:26:53', NULL),
(36, 1, 'Bài 4b Giá xây dựng công trình', '', '', '', 'upload', '', '', 1, 0, 'active', 0, '2016-07-22 08:14:17', '2016-07-22 08:14:17', NULL),
(37, 1, 'Hướng dẫn cài đặt và kích hoạt Phần mềm Đấu thầu GXD', '', '', 'https://youtu.be/zh_GF0GySkg?list=PLW21vt8mSLvd4qqAQ8mayxs7P99ugF_WE', 'link', '<p>Video hướng dẫn bạn c&agrave;i,&nbsp;k&iacute;ch hoạt Phần mềm Đấu thầu GXD</p>\r\n', '', 1, 0, 'active', 0, '2016-07-22 10:27:34', '2016-07-22 10:27:34', NULL),
(38, 1, 'Hướng dẫn tải dữ liệu, ghép dữ liệu Phần mềm Đấu thầu GXD 2016', '', '', 'https://youtu.be/5FjlEJRXx38?list=PLW21vt8mSLvd4qqAQ8mayxs7P99ugF_WE', 'link', '<p>Video hướng dẫn tải dữ liệu, gh&eacute;p dữ liệu để lập gi&aacute; dự thầu c&aacute;c loại c&ocirc;ng tr&igrave;nh</p>\r\n', '', 1, 0, 'active', 0, '2016-07-22 10:28:40', '2016-07-22 10:28:40', NULL),
(39, 4, 'lession 1', '', '', '', 'upload', '', '', 1, 0, 'active', 0, '2016-07-22 11:28:01', '2016-07-22 11:28:01', NULL),
(40, 4, 'lession 2', '', '', '', 'upload', '', '', 1, 0, 'active', 0, '2016-07-22 11:28:14', '2016-07-22 11:28:14', NULL),
(41, 4, 'lession 3', '', '', '', 'upload', '', '', 1, 0, 'active', 0, '2016-07-22 11:28:21', '2016-07-22 11:28:21', NULL),
(42, 4, 'lession 4', '', '', '', 'upload', '', '', 1, 0, 'active', 0, '2016-07-22 11:28:30', '2016-07-22 11:28:30', NULL),
(43, 11, 'Bài 2. Xử lý tình huống Runtime Error 453 - Phần mềm GXD', '', '', 'https://www.youtube.com/watch?v=G0XiImRRd5o&index', 'link', '<p><em><strong>Bước 1.&nbsp;Tắt to&agrave;n bộ Phần mềm GXD (Excel)</strong></em></p>\r\n\r\n<p><em>Khuyến c&aacute;o:&nbsp;</em>Tắt bằng Task Manager</p>\r\n\r\n<p><strong><em>Bước 2. Kiểm tra Microsoft Office v&agrave;&nbsp;Visual C++</em></strong></p>\r\n\r\n<p><em>Start &gt; Control Panel &gt; Uninstals (Programs and Features)</em></p>\r\n\r\n<p>-&nbsp;Kiểm tra đầy&nbsp;c&aacute;c phi&ecirc;n bản Visual C++: 2005, 2008, 2010, 2012 (X86, x64)</p>\r\n\r\n<p>&nbsp; + Nếu thiếu: Sử dụng file Fixlib.exe trong Thư mục c&agrave;i đặt Phần mềm GXD (Sau khi c&agrave;i đặt) để bổ sung thư viện Visual C++.</p>\r\n\r\n<p>&nbsp; + Trường hợp nhiều thư viện C++ giống nhau chồng ch&eacute;o: Gỡ to&agrave;n bộ v&agrave; c&agrave;i đặt lại.</p>\r\n\r\n<p>- Kiểm tra Options khi c&agrave;i đặt Office</p>\r\n\r\n<p>&nbsp; + Trong hộp thoại Uninstall (Programs and Features), t&iacute;ch v&agrave;o Microsoft Office v&agrave; chọn <em>Change</em></p>\r\n\r\n<p><em>&nbsp; +&nbsp;</em>Chọn Add and remove Features &gt;&nbsp;<em>Run all from my computer</em>&nbsp;tất cả những mục cần thiết sau (phục vụ PM):<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Microsoft Access<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Microsoft Excel<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Office Shared Features<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;*&nbsp;Office Tools</p>\r\n\r\n<p><strong><em>Bước 3. C&agrave;i đặt lại Phần mềm GXD (Nếu cần)</em></strong></p>\r\n\r\n<p>- Gỡ ho&agrave;n to&agrave;n Phần mềm GXD</p>\r\n\r\n<p>- Sử dụng Bộ c&agrave;i <em><strong>GXDSoft</strong></em> để c&agrave;i đặt lại.</p>\r\n\r\n<p><a href="https://www.fshare.vn/file/KGAPI63KBJL2"><em><strong>K&iacute;ch v&agrave;o đ&acirc;y để tải bộ c&agrave;i đặt</strong></em></a></p>\r\n\r\n<hr />\r\n<p><em><strong>C&ocirc;ng ty CP Gi&aacute; X&acirc;y Dựng</strong><br />\r\nSố 2a/55 Nguyễn Ngọc Nại, Thanh Xu&acirc;n, H&agrave; Nội.<br />\r\nHotline CSKH: 1900 0147 - 098 281 2793<br />\r\nEmail: Tranlinh@giaxaydung.com</em></p>\r\n', '', 1, 0, 'active', 0, '2016-07-25 20:27:17', '2016-07-26 00:33:44', NULL),
(44, 11, 'Bài 3. Xử lý tình huống thiếu thư viện Vcredist (Vissua C++) - Phần mềm GXD', '', '', 'https://www.youtube.com/watch?v=dTCu6_d51RI&index', 'link', '<p><em><strong>Bước 1.&nbsp;Tắt to&agrave;n bộ Phần mềm GXD (Excel)</strong></em></p>\r\n\r\n<p><em>Khuyến c&aacute;o:&nbsp;</em>Tắt bằng Task Manager</p>\r\n\r\n<p><strong><em>Bước 2. Kiểm tra Microsoft Office v&agrave;&nbsp;Visual C++</em></strong></p>\r\n\r\n<p><em>Start &gt; Control Panel &gt; Uninstals (Programs and Features)</em></p>\r\n\r\n<p>-&nbsp;Kiểm tra đầy&nbsp;c&aacute;c phi&ecirc;n bản Visual C++: 2005, 2008, 2010, 2012 (X86, x64)</p>\r\n\r\n<p>&nbsp; + Nếu thiếu: Sử dụng file Fixlib.exe trong Thư mục c&agrave;i đặt Phần mềm GXD (Sau khi c&agrave;i đặt) để bổ sung thư viện Visual C++.</p>\r\n\r\n<p>&nbsp; + Trường hợp nhiều thư viện C++ giống nhau chồng ch&eacute;o: Gỡ to&agrave;n bộ v&agrave; c&agrave;i đặt lại.</p>\r\n\r\n<p>- Kiểm tra Options khi c&agrave;i đặt Office</p>\r\n\r\n<p>&nbsp; + Trong hộp thoại Uninstall (Programs and Features), t&iacute;ch v&agrave;o Microsoft Office v&agrave; chọn <em>Change</em></p>\r\n\r\n<p><em>&nbsp; +&nbsp;</em>Chọn Add and remove Features &gt;&nbsp;<em>Run all from my computer</em>&nbsp;tất cả những mục cần thiết sau (phục vụ PM):<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Microsoft Access<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Microsoft Excel<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Office Shared Features<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;*&nbsp;Office Tools</p>\r\n\r\n<p><strong><em>Bước 3. C&agrave;i đặt lại Phần mềm GXD (Nếu cần)</em></strong></p>\r\n\r\n<p>- Gỡ ho&agrave;n to&agrave;n Phần mềm GXD</p>\r\n\r\n<p>- Sử dụng Bộ c&agrave;i <em><strong>GXDSoft</strong></em> để c&agrave;i đặt lại.</p>\r\n\r\n<p><a href="https://www.fshare.vn/file/KGAPI63KBJL2"><em><strong>K&iacute;ch v&agrave;o đ&acirc;y để tải bộ c&agrave;i đặt</strong></em></a></p>\r\n\r\n<hr />\r\n<p><em><strong>C&ocirc;ng ty CP Gi&aacute; X&acirc;y Dựng</strong><br />\r\nSố 2a/55 Nguyễn Ngọc Nại, Thanh Xu&acirc;n, H&agrave; Nội.<br />\r\nHotline CSKH: 1900 0147 - 098 281 2793<br />\r\nEmail: Tranlinh@giaxaydung.com</em></p>\r\n', '/tmp/phpSvJlzu', 1, 0, 'active', 0, '2016-07-25 21:04:45', '2016-07-26 00:33:49', NULL),
(45, 11, 'Bài 4. Xử lý tình huống Runtime Error 53 - Phần mềm GXD', '', '', 'https://www.youtube.com/watch?v=qXYpkeZd03w&index', 'link', '<p><em><strong>Bước 1.&nbsp;Tắt to&agrave;n bộ Phần mềm GXD (Excel)</strong></em></p>\r\n\r\n<p><em>Khuyến c&aacute;o:&nbsp;</em>Tắt bằng Task Manager</p>\r\n\r\n<p><strong><em>Bước 2. Kiểm tra Microsoft Office v&agrave;&nbsp;Visual C++</em></strong></p>\r\n\r\n<p><em>Start &gt; Control Panel &gt; Uninstals (Programs and Features)</em></p>\r\n\r\n<p>-&nbsp;Kiểm tra đầy&nbsp;c&aacute;c phi&ecirc;n bản Visual C++: 2005, 2008, 2010, 2012 (X86, x64)</p>\r\n\r\n<p>&nbsp; + Nếu thiếu: Sử dụng file Fixlib.exe trong Thư mục c&agrave;i đặt Phần mềm GXD (Sau khi c&agrave;i đặt) để bổ sung thư viện Visual C++.</p>\r\n\r\n<p>&nbsp; + Trường hợp nhiều thư viện C++ giống nhau chồng ch&eacute;o: Gỡ to&agrave;n bộ v&agrave; c&agrave;i đặt lại.</p>\r\n\r\n<p>- Kiểm tra Options khi c&agrave;i đặt Office</p>\r\n\r\n<p>&nbsp; + Trong hộp thoại Uninstall (Programs and Features), t&iacute;ch v&agrave;o Microsoft Office v&agrave; chọn <em>Change</em></p>\r\n\r\n<p><em>&nbsp; +&nbsp;</em>Chọn Add and remove Features &gt;&nbsp;<em>Run all from my computer</em>&nbsp;tất cả những mục cần thiết sau (phục vụ PM):<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Microsoft Access<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Microsoft Excel<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Office Shared Features<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;*&nbsp;Office Tools</p>\r\n\r\n<p><strong><em>Bước 3. C&agrave;i đặt lại Phần mềm GXD (Nếu cần)</em></strong></p>\r\n\r\n<p>- Gỡ ho&agrave;n to&agrave;n Phần mềm GXD</p>\r\n\r\n<p>- Sử dụng Bộ c&agrave;i <em><strong>GXDSoft</strong></em> để c&agrave;i đặt lại.</p>\r\n\r\n<p><a href="https://www.fshare.vn/file/KGAPI63KBJL2"><em><strong>K&iacute;ch v&agrave;o đ&acirc;y để tải bộ c&agrave;i đặt</strong></em></a></p>\r\n\r\n<hr />\r\n<p><em><strong>C&ocirc;ng ty CP Gi&aacute; X&acirc;y Dựng</strong><br />\r\nSố 2a/55 Nguyễn Ngọc Nại, Thanh Xu&acirc;n, H&agrave; Nội.<br />\r\nHotline CSKH: 1900 0147 - 098 281 2793<br />\r\nEmail: Tranlinh@giaxaydung.com</em></p>\r\n', '/tmp/php3jbCN3', 1, 0, 'active', 0, '2016-07-25 21:10:03', '2016-07-26 00:33:55', NULL),
(46, 11, 'Bài 6. Xử lý tình huống không tải được dữ liệu Đơn giá - Phần mềm GXD', '', '', 'https://www.youtube.com/watch?v=8e8VZNtAxyc', 'link', '<p><em><strong>Bước 1.&nbsp;Tắt to&agrave;n bộ Phần mềm GXD (Excel)</strong></em></p>\r\n\r\n<p><em>Khuyến c&aacute;o:&nbsp;</em>Tắt bằng Task Manager</p>\r\n\r\n<p><strong><em>Bước 2. Kiểm tra Microsoft Office v&agrave;&nbsp;Visual C++</em></strong></p>\r\n\r\n<p><em>Start &gt; Control Panel &gt; Uninstals (Programs and Features)</em></p>\r\n\r\n<p>-&nbsp;Kiểm tra đầy&nbsp;c&aacute;c phi&ecirc;n bản Visual C++: 2005, 2008, 2010, 2012 (X86, x64)</p>\r\n\r\n<p>&nbsp; + Nếu thiếu: Sử dụng file Fixlib.exe trong Thư mục c&agrave;i đặt Phần mềm GXD (Sau khi c&agrave;i đặt) để bổ sung thư viện Visual C++.</p>\r\n\r\n<p>&nbsp; + Trường hợp nhiều thư viện C++ giống nhau chồng ch&eacute;o: Gỡ to&agrave;n bộ v&agrave; c&agrave;i đặt lại.</p>\r\n\r\n<p>- Kiểm tra Options khi c&agrave;i đặt Office</p>\r\n\r\n<p>&nbsp; + Trong hộp thoại Uninstall (Programs and Features), t&iacute;ch v&agrave;o Microsoft Office v&agrave; chọn <em>Change</em></p>\r\n\r\n<p><em>&nbsp; +&nbsp;</em>Chọn Add and remove Features &gt;&nbsp;<em>Run all from my computer</em>&nbsp;tất cả những mục cần thiết sau (phục vụ PM):<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Microsoft Access<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Microsoft Excel<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Office Shared Features<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;*&nbsp;Office Tools</p>\r\n\r\n<p><strong><em>Bước 3. C&agrave;i đặt lại Phần mềm GXD (Nếu cần)</em></strong></p>\r\n\r\n<p>- Gỡ ho&agrave;n to&agrave;n Phần mềm GXD</p>\r\n\r\n<p>- Sử dụng Bộ c&agrave;i <em><strong>GXDSoft</strong></em> để c&agrave;i đặt lại.</p>\r\n\r\n<p><a href="https://www.fshare.vn/file/KGAPI63KBJL2"><em><strong>K&iacute;ch v&agrave;o đ&acirc;y để tải bộ c&agrave;i đặt</strong></em></a></p>\r\n\r\n<p><em><strong>Bước 4. C&agrave;i đặt lại Internet Explorer (trường hợp đặc biệt)</strong></em></p>\r\n\r\n<p>- Tải bộ c&agrave;i đặt Internet Explorer (ph&ugrave; hợp với phi&ecirc;n bản Windows đang sử dụng) v&agrave; tiến h&agrave;nh c&agrave;i đặt lại Internet Explorer.</p>\r\n\r\n<hr />\r\n<p><em><strong>C&ocirc;ng ty CP Gi&aacute; X&acirc;y Dựng</strong><br />\r\nSố 2a/55 Nguyễn Ngọc Nại, Thanh Xu&acirc;n, H&agrave; Nội.<br />\r\nHotline CSKH: 1900 0147 - 098 281 2793<br />\r\nEmail: Tranlinh@giaxaydung.com</em></p>\r\n', '/tmp/phpz8ZkoR', 1, 0, 'active', 0, '2016-07-25 21:14:40', '2016-07-26 00:44:37', NULL),
(47, 11, 'Bài 7. Xử lý tình huống Lost VBA Project - Phần mềm GXD', '', '', 'https://www.youtube.com/watch?v=YP2Bu0Cj2Wk', 'link', '<p><em><strong>Bước 1.&nbsp;Tắt to&agrave;n bộ Phần mềm GXD (Excel)</strong></em></p>\r\n\r\n<p><em>Khuyến c&aacute;o:&nbsp;</em>Tắt bằng Task Manager</p>\r\n\r\n<p><strong><em>Bước 2. Kiểm tra Microsoft Office v&agrave;&nbsp;Visual C++</em></strong></p>\r\n\r\n<p><em>Start &gt; Control Panel &gt; Uninstals (Programs and Features)</em></p>\r\n\r\n<p>-&nbsp;Kiểm tra đầy&nbsp;c&aacute;c phi&ecirc;n bản Visual C++: 2005, 2008, 2010, 2012 (X86, x64)</p>\r\n\r\n<p>&nbsp; + Nếu thiếu: Sử dụng file Fixlib.exe trong Thư mục c&agrave;i đặt Phần mềm GXD (Sau khi c&agrave;i đặt) để bổ sung thư viện Visual C++.</p>\r\n\r\n<p>&nbsp; + Trường hợp nhiều thư viện C++ giống nhau chồng ch&eacute;o: Gỡ to&agrave;n bộ v&agrave; c&agrave;i đặt lại.</p>\r\n\r\n<p>- Kiểm tra Options khi c&agrave;i đặt Office</p>\r\n\r\n<p>&nbsp; + Trong hộp thoại Uninstall (Programs and Features), t&iacute;ch v&agrave;o Microsoft Office v&agrave; chọn <em>Change</em></p>\r\n\r\n<p><em>&nbsp; +&nbsp;</em>Chọn Add and remove Features &gt;&nbsp;<em>Run all from my computer</em>&nbsp;tất cả những mục cần thiết sau (phục vụ PM):<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Microsoft Access<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Microsoft Excel<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Office Shared Features<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;*&nbsp;Office Tools</p>\r\n\r\n<p><strong><em>Bước 3. C&agrave;i đặt lại Phần mềm GXD (Nếu cần)</em></strong></p>\r\n\r\n<p>- Gỡ ho&agrave;n to&agrave;n Phần mềm GXD</p>\r\n\r\n<p>- Sử dụng Bộ c&agrave;i <em><strong>GXDSoft</strong></em> để c&agrave;i đặt lại.</p>\r\n\r\n<p><a href="https://www.fshare.vn/file/KGAPI63KBJL2"><em><strong>K&iacute;ch v&agrave;o đ&acirc;y để tải bộ c&agrave;i đặt</strong></em></a></p>\r\n\r\n<hr />\r\n<p><em><strong>C&ocirc;ng ty CP Gi&aacute; X&acirc;y Dựng</strong><br />\r\nSố 2a/55 Nguyễn Ngọc Nại, Thanh Xu&acirc;n, H&agrave; Nội.<br />\r\nHotline CSKH: 1900 0147 - 098 281 2793<br />\r\nEmail: Tranlinh@giaxaydung.com</em></p>\r\n', '/tmp/phpq0vyz2', 1, 0, 'active', 0, '2016-07-25 21:17:56', '2016-07-26 00:44:40', NULL),
(48, 11, 'Bài 8. Xử lý lỗi liên kết bảng Tổng hợp vật tư - Phần mềm GXD', '', '', 'https://www.youtube.com/watch?v=hmY-9EoR1c4', 'link', '<p><em><strong>Bước 1.&nbsp;Kiểm tra bảng Tổng hợp vật tư</strong></em></p>\r\n\r\n<p><em>- T&igrave;m ki</em>ếm c&aacute;c c&ocirc;ng thức, c&aacute;c vật tư c&oacute; dấu hiệu lỗi (#REF!, #DIV/0!...)</p>\r\n\r\n<p><strong><em>Bước 2. Kiểm tra bảng Ph&acirc;n t&iacute;ch đơn gi&aacute; chi tiết</em></strong></p>\r\n\r\n<p>- Từ c&aacute;c c&ocirc;ng thức, vật tư c&oacute; dấu hiệu lỗi b&ecirc;n bảng Tổng hợp vật tư =&gt; T&igrave;m kiếm tiếp tục b&ecirc;n bảng Ph&acirc;n t&iacute;ch đơn gi&aacute; chi tiết.</p>\r\n\r\n<p>- Kiểm tra v&agrave; t&igrave;m ra nguy&ecirc;n nh&acirc;n dẫn đến lỗi =&gt; Xử l&yacute; triệt để.</p>\r\n\r\n<p><strong><em>Bước 3. Chạy lại bảng Tổng hợp vật tư</em></strong></p>\r\n\r\n<p>- X&oacute;a vật tư bị lỗi tại bảng Tổng hợp vật tư</p>\r\n\r\n<p>- Chạy lại bảng Tổng hợp vật tư (<em>Chi ph&iacute; x&acirc;y dựng &gt; 1. Tổng hợp vật tư)</em></p>\r\n\r\n<hr />\r\n<p><em><strong>C&ocirc;ng ty CP Gi&aacute; X&acirc;y Dựng</strong><br />\r\nSố 2a/55 Nguyễn Ngọc Nại, Thanh Xu&acirc;n, H&agrave; Nội.<br />\r\nHotline CSKH: 1900 0147 - 098 281 2793<br />\r\nEmail: Tranlinh@giaxaydung.com</em></p>\r\n', '/tmp/phpB1gWo8', 1, 0, 'active', 0, '2016-07-25 21:34:03', '2016-07-26 00:44:44', NULL),
(49, 11, 'Bài 9. Xử lý lỗi Excel Stop working | Lỗi bảng Đơn giá chi tiết - Phần mềm GXD8', '', '', 'https://www.youtube.com/watch?v=0rEf2GIYluc', 'link', '<p><em><strong><span class="marker">C&aacute;c phi&ecirc;n bản Dự to&aacute;n GXD 10 trở về trước</span></strong></em></p>\r\n\r\n<p><em><strong>Bước 1.&nbsp;Kiểm tra bảng Ph&acirc;n t&iacute;ch đơn gi&aacute; chi tiết</strong></em><br />\r\n<em>- T&igrave;m ki</em>ếm c&aacute;c c&ocirc;ng thức, c&aacute;c vật tư c&oacute; dấu hiệu lỗi:<br />\r\n&nbsp; + Hạng mục<br />\r\n&nbsp; + C&ocirc;ng t&aacute;c<br />\r\n&nbsp;&nbsp;+ Vật tư<br />\r\n&nbsp;&nbsp;+ C&aacute;c c&ocirc;ng thức<br />\r\n=&gt; Tiến h&agrave;nh x&oacute;a to&agrave;n bộ c&aacute;c dấu hiệu lỗi.</p>\r\n\r\n<p>- Kiểm tra&nbsp;<em>&quot;END&quot;&nbsp;</em>của bảng Ph&acirc;n t&iacute;ch đơn gi&aacute; chi tiết:<br />\r\n&nbsp;&nbsp;+ Unhide cột A. Kiểm tra sự tồn tại Comment &quot;END&quot; tại d&ograve;ng cuối bảng tại cột A.<br />\r\n&nbsp;&nbsp;+ Trường hợp kh&ocirc;ng tồn tại Comment &quot;END&quot;. T&iacute;ch chuột phải chọn Insert Comment &gt; Nhập &quot;END&quot; v&agrave;o trong hộp thoại Comment.</p>\r\n\r\n<p><strong><em>Bước 2. Kiểm tra bảng Dự to&aacute;n chi ph&iacute; x&acirc;y dựng</em></strong></p>\r\n\r\n<p>- Kiểm tra số thứ tự c&aacute;c c&ocirc;ng t&aacute;c:<br />\r\n&nbsp;&nbsp;+ Tại &ocirc; B1 (hoặc E1), bấm <em><strong>Ctrl + Q</strong></em> để đ&aacute;nh lại số thứ tự bảng Dự to&aacute;n.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em><strong><span class="marker">Phi&ecirc;n bản&nbsp;Dự to&aacute;n GXD v10.3 trở đi</span></strong></em></p>\r\n\r\n<p><strong><em>Bước 1. Kiểm tra bảng Dự to&aacute;n chi ph&iacute; x&acirc;y dựng</em></strong><br />\r\n- Kiểm tra lỗi số thứ tự v&agrave; Comment END<br />\r\n&nbsp;&nbsp;+ Tại &ocirc; B2 (hoặc E2), bấm <em><strong>Ctrl + Q</strong></em> để kiểm tra lỗi tại bảng Dự to&aacute;n<br />\r\n&nbsp;&nbsp;+ Tại &ocirc; B1 (hoặc E1), bấm <em><strong>Ctrl + Q</strong></em> để đ&aacute;nh lại số thứ tự bảng Dự to&aacute;n</p>\r\n\r\n<p><strong><em>Bước 2. Kiểm tra bảng Dự to&aacute;n chi ph&iacute; x&acirc;y dựng</em></strong><br />\r\n- Kiểm tra lỗi v&agrave; Comment END<br />\r\n&nbsp;&nbsp;+ Tại &ocirc; bất kỳ trong bản Ph&acirc;n t&iacute;ch đơn gi&aacute;, bấm&nbsp;<strong><em>Ctrl + Q&nbsp;</em></strong>&nbsp;để kiểm tra lỗi tại bảng Ph&acirc;n t&iacute;ch đơn gi&aacute; chi tiết.<br />\r\n&nbsp;&nbsp;+ Nếu tồn tại c&ocirc;ng t&aacute;c bị lỗi, tiến h&agrave;nh t&igrave;m kiếm v&agrave; xử l&yacute; theo hướng dẫn của Phần mềm.</p>\r\n\r\n<hr />\r\n<p><em><strong>C&ocirc;ng ty CP Gi&aacute; X&acirc;y Dựng</strong><br />\r\nSố 2a/55 Nguyễn Ngọc Nại, Thanh Xu&acirc;n, H&agrave; Nội.<br />\r\nHotline CSKH: 1900 0147 - 098 281 2793<br />\r\nEmail: Tranlinh@giaxaydung.com</em></p>\r\n', '/tmp/phpzI5dZS', 1, 0, 'active', 0, '2016-07-25 22:03:24', '2016-07-26 00:44:49', NULL),
(50, 11, 'Bài 1. Xử lý tình huống với file cài đặt Soft - Phần mềm GXD', '', '', 'https://www.youtube.com/watch?v=16mtH1WZnOM&index', 'link', '<p><strong><em>Bước 1.&nbsp;Kiểm tra kết nối với Tr&igrave;nh duyệt Internet Explorer (IE)</em></strong><br />\r\n- X&oacute;a lịch sử tr&igrave;nh duyệt:<br />\r\n&nbsp;&nbsp;+&nbsp;Mở tr&igrave;nh duyệt Internet Explorer &gt; (V&agrave;o Tools) &gt; Internet Options<br />\r\n&nbsp;&nbsp;+&nbsp;Delete History, cookies...</p>\r\n\r\n<p>- Kiểm tra kết nối Sever Gi&aacute; X&acirc;y Dựng:<br />\r\n&nbsp;&nbsp;+ Truy cập website giaxaydung.vn:&nbsp;Kiểm tra kết nối sever cho qu&aacute; tr&igrave;nh k&iacute;ch hoạt phần mềm, kiểm tra bản quyền khi tra m&atilde; hiệu đầu ti&ecirc;n.<br />\r\n&nbsp;&nbsp;+ Truy cập website dutoangxd.vn:&nbsp;Kiểm tra kết nối sever cho qu&aacute; tr&igrave;nh tải th&ocirc;ng tin GXDSoft, tải dữ liệu.</p>\r\n\r\n<p><strong><em>Bước 2.&nbsp;Kiểm tra kết nối với Phần mềm Antivirus</em></strong><br />\r\n- Trong một số trường hợp, c&aacute;c phần mềm Antivirus (BKv, Kaspersky, Avast, Avira,... sẽ chặn quyền truy cập mạng tới Sever Gi&aacute; X&acirc;y Dựng.<br />\r\n&nbsp;&nbsp;+ Mở phần mềm Antivirus, v&agrave;o c&agrave;i đặt tường lửa (hoặc danh s&aacute;ch ứng dụng tin tưởng) v&agrave; đưa c&aacute;c file của Phần mềm GXD (GXDSoft.exe, DutoanGXD.exe, SetupGXD.exe,...) v&agrave;o danh s&aacute;ch cho ph&eacute;p kết nối internet.<br />\r\n<em>* C&aacute;ch l&agrave;m vui l&ograve;ng t&igrave;m tr&ecirc;n Google hoặc trong c&aacute;c trang web của Phần mềm Antivirus đang sử dụng.</em></p>\r\n\r\n<p><strong><em>Bước 3. Tải lại bộ c&agrave;i đặt GXDSoft kh&aacute;c (nếu cần)</em></strong><br />\r\n- Giaxaydung.vn<br />\r\n- Dutoangxd.vn<br />\r\n<a href="https://www.fshare.vn/file/KGAPI63KBJL2"><em><strong>Hoặc k&iacute;ch v&agrave;o đ&acirc;y để tải bộ c&agrave;i đặt GXDSoft</strong></em></a></p>\r\n\r\n<hr />\r\n<p><em><strong>C&ocirc;ng ty CP Gi&aacute; X&acirc;y Dựng</strong><br />\r\nSố 2a/55 Nguyễn Ngọc Nại, Thanh Xu&acirc;n, H&agrave; Nội.<br />\r\nHotline CSKH: 1900 0147 - 098 281 2793<br />\r\nEmail: Tranlinh@giaxaydung.com</em></p>\r\n', '/tmp/phpZkTCjs', 1, 0, 'active', 0, '2016-07-26 00:31:41', '2016-07-26 00:33:38', NULL),
(51, 11, 'Bài 10. Xử lý lỗi vòng lặp Excel - Phần mềm GXD', '', '', 'https://www.youtube.com/watch?v=FMLZhTpCDx0', 'link', '<p><em><strong>Bước 1. T&igrave;m điểm dẫn đến lỗi v&ograve;ng lặp</strong></em><br />\r\n- V&agrave;o FORMULAS &gt; Error Checking &gt; Circular References =&gt; T&igrave;m tới điểm lỗi v&ograve;ng lặp</p>\r\n\r\n<p><em><strong>Bước 2. Chỉnh sửa nguy&ecirc;n nh&acirc;n dẫn đến lỗi v&ograve;ng lặp</strong></em><br />\r\n- Sau khi t&igrave;m được điểm lỗi v&ograve;ng lặp =&gt; Chỉnh sửa nguy&ecirc;n nh&acirc;n gốc dẫn đến lỗi.</p>\r\n', '', 1, 0, 'active', 0, '2016-07-26 00:42:13', '2016-07-26 00:44:54', NULL),
(52, 11, 'Bài 5. Xử lý tình huống "Not found check license" - Phần mềm GXD', '', '', 'https://www.youtube.com/watch?v=oTFzFms5jdQ&index', 'link', '<p><em><strong>Bước 1.&nbsp;Tắt to&agrave;n bộ Phần mềm GXD (Excel)</strong></em></p>\r\n\r\n<p><em>Khuyến c&aacute;o:&nbsp;</em>Tắt bằng Task Manager</p>\r\n\r\n<p><strong><em>Bước 2. Kiểm tra Microsoft Office v&agrave;&nbsp;Visual C++</em></strong></p>\r\n\r\n<p><em>Start &gt; Control Panel &gt; Uninstals (Programs and Features)</em></p>\r\n\r\n<p>-&nbsp;Kiểm tra đầy&nbsp;c&aacute;c phi&ecirc;n bản Visual C++: 2005, 2008, 2010, 2012 (X86, x64)</p>\r\n\r\n<p>&nbsp; + Nếu thiếu: Sử dụng file Fixlib.exe trong Thư mục c&agrave;i đặt Phần mềm GXD (Sau khi c&agrave;i đặt) để bổ sung thư viện Visual C++.</p>\r\n\r\n<p>&nbsp; + Trường hợp nhiều thư viện C++ giống nhau chồng ch&eacute;o: Gỡ to&agrave;n bộ v&agrave; c&agrave;i đặt lại.</p>\r\n\r\n<p>- Kiểm tra Options khi c&agrave;i đặt Office</p>\r\n\r\n<p>&nbsp; + Trong hộp thoại Uninstall (Programs and Features), t&iacute;ch v&agrave;o Microsoft Office v&agrave; chọn <em>Change</em></p>\r\n\r\n<p><em>&nbsp; +&nbsp;</em>Chọn Add and remove Features &gt;&nbsp;<em>Run all from my computer</em>&nbsp;tất cả những mục cần thiết sau (phục vụ PM):<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Microsoft Access<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Microsoft Excel<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Office Shared Features<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;*&nbsp;Office Tools</p>\r\n\r\n<p><strong><em>Bước 3. C&agrave;i đặt lại Phần mềm GXD (Nếu cần)</em></strong></p>\r\n\r\n<p>- Gỡ ho&agrave;n to&agrave;n Phần mềm GXD</p>\r\n\r\n<p>- Sử dụng Bộ c&agrave;i <em><strong>GXDSoft</strong></em> để c&agrave;i đặt lại.</p>\r\n\r\n<p><a href="https://www.fshare.vn/file/KGAPI63KBJL2"><em><strong>K&iacute;ch v&agrave;o đ&acirc;y để tải bộ c&agrave;i đặt</strong></em></a></p>\r\n\r\n<hr />\r\n<p><em><strong>C&ocirc;ng ty CP Gi&aacute; X&acirc;y Dựng</strong><br />\r\nSố 2a/55 Nguyễn Ngọc Nại, Thanh Xu&acirc;n, H&agrave; Nội.<br />\r\nHotline CSKH: 1900 0147 - 098 281 2793<br />\r\nEmail: Tranlinh@giaxaydung.com</em></p>\r\n', '', 1, 0, 'active', 0, '2016-07-26 00:44:06', '2016-07-26 00:44:06', NULL),
(53, 11, '[HDSD] Bài 1. Hướng dẫn cài đặt và kích hoạt Phần mềm Dự toán GXD 10', '', '', 'https://www.youtube.com/watch?v=v9oIo5DWBPY&index', 'link', '<p><em><strong>Bước 1: Tải bộ c&agrave;i đặt GXDSoft.exe tại:</strong></em><br />\r\n- <a href="http://giaxaydung.vn">Giaxaydung.vn</a><br />\r\n- <a href="http://dutoangxd.vn">Dutoangxd.vn</a><br />\r\n<a href="https://www.fshare.vn/file/KGAPI63KBJL2"><em><strong>Hoặc k&iacute;ch v&agrave;o đ&acirc;y để tải bộ c&agrave;i đặt GXDSoft</strong></em></a></p>\r\n\r\n<p><em><strong>Bước 2: Chạy file c&agrave;i đặt GXDSoft.exe</strong></em></p>\r\n\r\n<p>- Chọn Phần mềm:&nbsp;Dự to&aacute;n GXD</p>\r\n\r\n<p>- Chọn Phi&ecirc;n bản: Phi&ecirc;n bản&nbsp;mới nhất</p>\r\n\r\n<p>- Chọn loại Kh&oacute;a</p>\r\n\r\n<p>=&gt; Bấm C&agrave;i đặt</p>\r\n\r\n<p><em><strong>Bước 3: K&iacute;ch hoạt phần mềm</strong></em></p>\r\n\r\n<p>1. Phi&ecirc;n bản kh&oacute;a cứng</p>\r\n\r\n<p>- Phần mềm tự động active khi cắm Kh&oacute;a cứng</p>\r\n\r\n<p>2. Phi&ecirc;n bản kh&oacute;a mềm</p>\r\n\r\n<p>- Nhập lại Email nếu đ&atilde; từng k&iacute;ch hoạt Phần mềm =&gt; X&aacute;c nhận</p>\r\n\r\n<p>- Đăng k&yacute; lần đầu =&gt; K&iacute;ch v&agrave;o n&uacute;t Đăng k&yacute; =&gt; 2. Bấm v&agrave;o đ&acirc;y để nhập m&atilde; k&iacute;ch hoạt =&gt; Nhập đầy đủ th&ocirc;ng tin c&ugrave;ng M&atilde; k&iacute;ch hoạt =&gt; Đăng k&yacute;</p>\r\n', '/tmp/phpcARRih', 1, 0, 'active', 0, '2016-07-26 07:00:37', '2016-07-26 07:00:37', NULL),
(54, 11, '[HDSD] Bài 2. Chọn mẫu dự toán - Dự toán GXD 10', '', '', 'https://www.youtube.com/watch?v=mziZBv17fQ4', 'link', '<p>Mặc định phần mềm&nbsp;<em><strong>Dự to&aacute;n GXD 10</strong></em> đang lập dự to&aacute;n theo hướng dẫn của&nbsp;<em><strong>Nghị định số 32/2015/NĐ-CP</strong></em> v&agrave; <em><strong>Th&ocirc;ng tư số 06/2016/TT-BXD.</strong></em> D&ugrave;ng t&iacute;nh năng chọn mẫu n&agrave;y khi cần lập dự to&aacute;n theo c&aacute;c mẫu cũ như mẫu dự to&aacute;n x&acirc;y dựng c&ocirc;ng tr&igrave;nh theo <em><strong>Th&ocirc;ng tư số 04/2010/TT-BXD</strong></em> hoặc dự to&aacute;n khảo s&aacute;t theo <em><strong>Th&ocirc;ng tư số 17/2013/TT-BXD</strong></em>.</p>\r\n\r\n<p><em><strong>Thao t&aacute;c lệnh:</strong></em><br />\r\n- <em>Menu&nbsp;Hồ sơ &gt;&nbsp;Chọn mẫu dự to&aacute;n </em><br />\r\n=&gt; Hộp thoại chọn mẫu sẽ hiện ra. Mặc định đang để lập dự to&aacute;n theo mẫu DutoanGXD.xltm. Bấm v&agrave;o mẫu DutoanGXDTT04_2010.xltm hoặc DutoanKS-TT17_2013.xltm cho ph&ugrave; hợp với dự to&aacute;n cần lập =&gt;&nbsp;Đồng &yacute; để kết th&uacute;c qu&aacute; tr&igrave;nh chọn mẫu. Từ lần mở phần mềm tiếp theo sẽ chạy theo mẫu vừa chọn. Nếu muốn chọn mẫu kh&aacute;c thao t&aacute;c tương tự.</p>\r\n', '', 1, 0, 'active', 0, '2016-07-26 07:08:51', '2016-07-26 07:08:51', NULL),
(55, 11, '[HDSD] Bài 3. Cơ sở dữ liệu - Dự toán GXD', '', '', 'https://www.youtube.com/watch?v=Ld5Hs8WTVl4', 'link', '<p>Cơ sở dữ liệu của phần mềm l&agrave; c&aacute;c tập Định mức, Đơn gi&aacute;, Gi&aacute; vật tư được c&ocirc;ng bố đ&atilde; được số h&oacute;a.</p>\r\n\r\n<p><em><strong>1. Nạp cơ sở dữ liệu v&agrave;o phần mềm<br />\r\nThao t&aacute;c lệnh:</strong></em><br />\r\n- <em>Menu Hồ Sơ/ Chọn cơ sở dữ liệu</em> (ph&iacute;m tắt <em>Ctrl + Shift +D</em>)<br />\r\n=&gt; Hộp thoại <em>Chọn cơ sở dữ liệu</em> hiện ra, khi k&iacute;ch chọn v&agrave;o c&aacute;c bộ CSDL sẽ thấy th&ecirc;m c&aacute;c th&ocirc;ng tin về bộ CSDL đang chọn. Trường hợp gộp nhiều file cơ sở dữ liệu, t&iacute;ch chọn để k&iacute;ch hoạt c&aacute;c file dữ liệu bạn muốn sử dụng đồng thời trong một bộ. Bấm Đồng &yacute; để ho&agrave;n th&agrave;nh chọn cơ sở dữ liệu.</p>\r\n\r\n<p><em><strong>2. Tải cơ sở dữ liệu</strong></em><br />\r\n- Nếu bộ dữ liệu đơn gi&aacute; địa phương chưa c&oacute; trong thư mục dữ liệu, bấm v&agrave;o Tải dữ liệu khi m&aacute;y c&oacute; kết nối Internet.<br />\r\n=&gt; Hộp thoại <em>Danh s&aacute;ch dữ liệu</em> hiện ra.&nbsp;Trong hộp thoại Danh s&aacute;ch dữ liệu k&iacute;ch v&agrave;o t&ecirc;n bộ dữ liệu địa phương v&agrave; bấm v&agrave;o n&uacute;t Tải về, bạn chờ một ch&uacute;t dữ liệu sẽ tải về m&aacute;y t&iacute;nh để bạn sử dụng.</p>\r\n\r\n<p><strong><em>3. Gh&eacute;p cơ sở dữ liệu</em></strong><br />\r\n- Để sử dụng nhiều file dữ liệu trong c&ugrave;ng một bộ. Tiến h&agrave;nh tải đầy đủ c&aacute;c dữ liệu cần sử dụng về m&aacute;y.<br />\r\nBước 1. V&agrave;o thư mục Dữ liệu (thường nằm trong thư mục <em><strong>C:\\Du toan GXD</strong></em>)<br />\r\nBước 2. Lựa chọn c&aacute;c file dữ liệu cần gh&eacute;p =&gt; Copy v&agrave; Paste chung v&agrave;o một bộ dữ liệu<br />\r\n=&gt; Trong hộp thoại&nbsp;<em>Chọn cơ sở dữ liệu,&nbsp;</em>t&iacute;ch v&agrave;o bộ dữ liệu chung =&gt; thao t&aacute;c tiếp tục theo hướng dẫn&nbsp;<em>Nạp cơ sở dữ liệu v&agrave;o phần mềm</em> ở tr&ecirc;n.</p>\r\n', '', 1, 0, 'active', 0, '2016-07-26 07:23:06', '2016-07-26 07:23:21', NULL),
(56, 11, '[HDSD] Bài 4. Hướng dẫn tra mã hiệu đơn giá, nhập diễn giải khối lượng - Dự toán GXD 10', '', '', 'https://www.youtube.com/watch?v=yBexrfK2OOI', 'link', '<p><em><strong>1. Tra m&atilde; hiệu đơn gi&aacute;</strong></em><br />\r\nĐể tra m&atilde; hiệu đơn gi&aacute; trong bảng Dự to&aacute;n chi ph&iacute; x&acirc;y dựng (sheet Dự to&aacute;n XD)<br />\r\n- C&aacute;ch 1.&nbsp;Nhập đầy đủ&nbsp;m&atilde; hiệu trực tiếp v&agrave;o một &ocirc; trong cột m&atilde; hiệu đơn gi&aacute;.<br />\r\n- C&aacute;ch 2.&nbsp;Nhập một phần m&atilde; hiệu&nbsp;hoặc nhập từ kh&oacute;a c&oacute; trong t&ecirc;n c&ocirc;ng việc để t&igrave;m kiếm.</p>\r\n\r\n<p>Một số kinh nghiệm khi tra m&atilde; hiệu bằng từ kh&oacute;a:&nbsp;<br />\r\n- N&ecirc;n tra bằng những từ hoặc cụm từ ngắn gọn thể hiện được quy c&aacute;ch của c&ocirc;ng việc hoặc đặc th&ugrave; của ri&ecirc;ng c&ocirc;ng t&aacute;c đ&oacute;,&nbsp;sử dụng dấu (+) hoặc dấu &quot;c&aacute;ch&quot; để kết hợp c&aacute;c từ kh&oacute;a.<br />\r\n<em>V&iacute; dụ:</em> <em>B&ecirc; t&ocirc;ng m&oacute;ng rộng 2m, đ&aacute; 1x2 m&aacute;c 250</em> c&oacute; thể g&otilde; từ kh&oacute;a &ldquo;t&ocirc;ng m&oacute;ng 250&rdquo;. C&ocirc;ng t&aacute;c <em>B&ecirc; t&ocirc;ng tấm chớp m&aacute;c 200</em> chỉ cần g&otilde; &ldquo;chớp 200&rdquo;. C&ocirc;ng t&aacute;c <em>B&ecirc; t&ocirc;ng gạch vỡ m&aacute;c 50</em> chỉ cần g&otilde; chữ &ldquo;vỡ&rdquo; hoặc &ldquo;vỡ 50&rdquo;.<br />\r\n- Khi tra m&atilde; hiệu cần dựa v&agrave;o quy c&aacute;ch c&ocirc;ng việc.<br />\r\n- Tra một m&atilde; hiệu c&oacute; thể nh&igrave;n gi&aacute; trị đơn gi&aacute; trong hộp thoại t&igrave;m kiếm để biết c&ocirc;ng việc đ&oacute; c&oacute; vật liệu, nh&acirc;n c&ocirc;ng v&agrave; m&aacute;y hay kh&ocirc;ng (thi c&ocirc;ng thủ c&ocirc;ng hoặc bằng m&aacute;y).<br />\r\n- Nhiều c&ocirc;ng t&aacute;c t&ecirc;n kh&ocirc;ng c&oacute; trong định mức c&oacute; thể phải vận dụng. C&ocirc;ng t&aacute;c tạm t&iacute;nh kh&ocirc;ng c&oacute; trong bộ định mức hiện h&agrave;nh được đ&aacute;nh m&atilde; TT, TT1&divide;TT9.&nbsp;Để tr&aacute;nh nhầm c&aacute;c m&atilde; hiệu c&oacute; t&ecirc;n gần giống nhau h&atilde;y dựa v&agrave;o quy c&aacute;ch c&ocirc;ng việc v&agrave; sự sẵn c&oacute; của c&aacute;c m&atilde; hiệu.<br />\r\n-&nbsp;Tại hộp thoại tra cứu đơn gi&aacute;, bạn c&oacute; thể t&ugrave;y &yacute; chỉnh sửa định mức c&ocirc;ng t&aacute;c trước khi gọi ra. Hoặc c&oacute; thể lưu lại c&ocirc;ng t&aacute;c đ&atilde; chỉnh sửa để sử dụng cho những lần sau.</p>\r\n\r\n<p><strong><em>Lưu &yacute;:</em></strong> Chi tiết vữa kh&ocirc;ng thể sửa được hao ph&iacute;. Khi tra m&atilde; hiệu bạn cũng c&oacute; thể xem được ngay thuyết minh của c&ocirc;ng việc đ&oacute; m&agrave; kh&ocirc;ng phải mở cuốn định mức x&acirc;y dựng ra xem nữa.</p>\r\n\r\n<p><em><strong>2. Nhập diễn giải khối lượng</strong><br />\r\nC&aacute;ch 1.&nbsp;Nhập số liệu diễn giải để t&iacute;nh khối lượng dưới t&ecirc;n c&ocirc;ng t&aacute;c tại bảng Dự to&aacute;n: </em><br />\r\n- Nhập c&aacute;c số liệu với c&aacute;c dấu cộng (+), trừ (-), nh&acirc;n (x) hoặc (*), chia (/) sau đ&oacute; nhấn ENTER, phần mềm sẽ tự hiển thị kết quả.</p>\r\n\r\n<p><em>C&aacute;ch 2.&nbsp;Nhập diễn giải khối lượng (d&agrave;i x rộng x cao) tại bảng Ti&ecirc;n lượng:</em><br />\r\n<em>- Menu Tiện &iacute;ch &gt; Hiện/ ẩn &gt; Bảng Ti&ecirc;n lượng<br />\r\n-&nbsp;</em>Phải nhập&nbsp;<em>Số bộ phận giống nhau </em>để k&iacute;ch hoạt c&ocirc;ng thức.</p>\r\n\r\n<p><em><strong>Lưu &yacute;:</strong></em><br />\r\n- Nhập diễn giải khối lượng tại d&ograve;ng dưới t&ecirc;n c&ocirc;ng t&aacute;c<br />\r\n- Với ph&eacute;p t&iacute;nh diễn giải c&oacute; k&yacute; hiệu cấu kiện chứa con số sau c&ugrave;ng để số đ&oacute; kh&ocirc;ng tham gia v&agrave;o ph&eacute;p t&iacute;nh bạn nhập dấu hai chấm (:) v&agrave; dấu c&aacute;ch (khoảng trắng tạo ra bằng ph&iacute;m Space) hoặc chỉ cần dấu c&aacute;ch hoặc dấu chấm (.) sau c&ugrave;ng.<br />\r\n- Chỉ sử dụng 1 trong 2 c&aacute;ch nhập diễn giải khối lượng.</p>\r\n', '', 1, 0, 'active', 0, '2016-07-26 07:50:34', '2016-07-26 07:59:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text CHARACTER SET utf8 NOT NULL,
  `question_image` text,
  `answes` text CHARACTER SET utf8 NOT NULL,
  `type` enum('checkbox','fill','image','radio') DEFAULT 'radio',
  `type_lession` text,
  `type_course` text,
  `status` enum('inactive','active') NOT NULL,
  `author_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `question_image`, `answes`, `type`, `type_lession`, `type_course`, `status`, `author_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, '<p>Gi&aacute; trị dự to&aacute;n c&ocirc;ng tr&igrave;nh đ&oacute;ng vai tr&ograve;?</p>\r\n', NULL, '{"1":{"name":"L\\u00e0 c\\u01a1 s\\u1edf \\u0111\\u1ec3 x\\u00e1c \\u0111\\u1ecbnh gi\\u00e1 g\\u00f3i th\\u1ea7u, gi\\u00e1 x\\u00e2y d\\u1ef1ng c\\u00f4ng tr\\u00ecnh","percent":100,"image":""},"2":{"name":"L\\u00e0 c\\u01a1 s\\u1edf \\u0111\\u1ec3 x\\u00e1c \\u0111\\u1ecbnh gi\\u00e1 d\\u1ef1 th\\u1ea7u, gi\\u00e1 th\\u00e0nh x\\u00e2y d\\u1ef1ng c\\u00f4ng tr\\u00ecnh","percent":5,"image":""},"3":{"name":"L\\u00e0 c\\u01a1 s\\u1edf \\u0111\\u1ec3 nh\\u00e0 th\\u1ea7u so s\\u00e1nh v\\u1edbi gi\\u00e1 d\\u1ef1 th\\u1ea7u c\\u1ee7a m\\u00ecnh","percent":5,"image":""},"4":{"name":"L\\u00e0 c\\u01a1 s\\u1edf \\u0111\\u1ec3 ch\\u1ee7 \\u0111\\u1ea7u t\\u01b0 b\\u00e1n c\\u00f4ng tr\\u00ecnh cho c\\u00e1c nh\\u00e0 \\u0111\\u1ea7u t\\u01b0","percent":5,"image":""}}', 'radio', '5', '1', 'active', 1, '2016-07-08 04:32:43', '2016-07-08 04:32:43', NULL),
(5, '<p>Trường hợp c&aacute;c phương &aacute;n thiết kế x&acirc;y dựng đều hay v&agrave; tốt th&igrave; dự to&aacute;n c&oacute; thể đ&oacute;ng vai tr&ograve;?</p>\r\n', NULL, '{"1":{"name":"D\\u00f9ng \\u0111\\u1ec3 l\\u1ef1a ch\\u1ecdn ph\\u01b0\\u01a1ng \\u00e1n thi\\u1ebft k\\u1ebf x\\u00e2y d\\u1ef1ng","percent":100,"image":""},"2":{"name":"D\\u00f9ng \\u0111\\u1ec3 ph\\u00ea ph\\u00e1n, \\u0111\\u1ea3 k\\u00edch m\\u1ed9t ph\\u01b0\\u01a1ng \\u00e1n n\\u00e0o \\u0111\\u00f3","percent":5,"image":""},"3":{"name":"Ra quy\\u1ebft \\u0111\\u1ecbnh ph\\u00ea duy\\u1ec7t ph\\u01b0\\u01a1ng \\u00e1n thi\\u1ebft k\\u1ebf x\\u00e2y d\\u1ef1ng","percent":5,"image":""},"4":{"name":"T\\u00ednh t\\u1ea5t c\\u1ea3 d\\u1ef1 to\\u00e1n cho c\\u00e1c ph\\u01b0\\u01a1ng \\u00e1n t\\u1ed1t \\u0111\\u00f3 \\u0111\\u1ec3 c\\u00e2n","percent":5,"image":""}}', 'radio', '5', '4', 'active', 1, '2016-07-08 04:35:12', '2016-07-09 08:35:22', NULL),
(6, '<p>Nội dung n&agrave;o sau đ&acirc;y kh&ocirc;ng đ&uacute;ng với nội dung lập dự to&aacute;n x&acirc;y dựng c&ocirc;ng tr&igrave;nh?</p>\r\n', NULL, '{"1":{"name":"\\u0110\\u01b0\\u1ee3c t\\u00ednh to\\u00e1n v\\u00e0 x\\u00e1c \\u0111\\u1ecbnh theo c\\u00f4ng tr\\u00ecnh c\\u1ee5 th\\u1ec3, tr\\u00ean c\\u01a1 s\\u1edf  kh\\u1ed1i l\\u01b0\\u1ee3ng c\\u00e1c c\\u00f4ng vi\\u1ec7c, thi\\u1ebft k\\u1ebf k\\u1ef9 thu\\u1eadt ho\\u1eb7c thi\\u1ebft k\\u1ebf b\\u1ea3n v\\u1ebd thi c\\u00f4ng v\\u00e0 h\\u1ec7 th\\u1ed1ng \\u0111\\u1ecbnh m\\u1ee9c x\\u00e2y d\\u1ef1ng, gi\\u00e1 x\\u00e2y d\\u1ef1ng c\\u00f4ng tr\\u00ecnh","percent":5,"image":""},"2":{"name":"L\\u00e0 c\\u01a1 s\\u1edf \\u0111\\u1ec3 x\\u00e1c \\u0111\\u1ecbnh gi\\u00e1 g\\u00f3i th\\u1ea7u, gi\\u00e1 x\\u00e2y d\\u1ef1ng c\\u00f4ng tr\\u00ecnh, l\\u00e0 c\\u0103n c\\u1ee9 \\u0111\\u1ec3 \\u0111\\u00e0m ph\\u00e1n, k\\u00fd k\\u1ebft h\\u1ee3p \\u0111\\u1ed3ng, thanh to\\u00e1n v\\u1edbi nh\\u00e0 th\\u1ea7u trong tr\\u01b0\\u1eddng h\\u1ee3p ch\\u1ec9 \\u0111\\u1ecbnh th\\u1ea7u","percent":5,"image":""},"3":{"name":"","percent":5,"image":""},"4":{"name":"L\\u00e0 m\\u1ed9t trong nh\\u1eefng c\\u01a1 s\\u1edf \\u0111\\u1ec3 \\u0111\\u00e1nh gi\\u00e1 hi\\u1ec7u qu\\u1ea3 kinh t\\u1ebf v\\u00e0 l\\u1ef1a ch\\u1ecdn ph\\u01b0\\u01a1ng \\u00e1n \\u0111\\u1ea7u t\\u01b0; l\\u00e0 c\\u01a1 s\\u1edf \\u0111\\u1ec3 ch\\u1ee7 \\u0111\\u1ea7u t\\u01b0 l\\u1eadp k\\u1ebf ho\\u1ea1ch v\\u00e0 qu\\u1ea3n l\\u00fd v\\u1ed1n khi th\\u1ef1c hi\\u1ec7n \\u0111\\u1ea7u t\\u01b0 x\\u00e2y d\\u1ef1ng c\\u00f4ng tr\\u00ecnh","percent":100,"image":""}}', 'radio', '5', '4', 'active', 1, '2016-07-08 04:54:15', '2016-07-09 08:35:28', NULL),
(7, '<p>Chi ph&iacute; dự ph&ograve;ng trong dự to&aacute;n x&acirc;y dựng c&ocirc;ng tr&igrave;nh được x&aacute;c định bằng c&aacute;c yếu tố n&agrave;o?</p>\r\n', NULL, '{"1":{"name":"D\\u1ef1 ph\\u00f2ng chi ph\\u00ed cho y\\u1ebfu t\\u1ed1 kh\\u1ed1i l\\u01b0\\u1ee3ng c\\u00f4ng vi\\u1ec7c ph\\u00e1t sinh v\\u00e0 d\\u1ef1 ph\\u00f2ng chi ph\\u00ed cho y\\u1ebfu t\\u1ed1 thay \\u0111\\u1ed5i ph\\u01b0\\u01a1ng th\\u1ee9c qu\\u1ea3n l\\u00fd d\\u1ef1 \\u00e1n","percent":5,"image":""},"2":{"name":"D\\u1ef1 ph\\u00f2ng chi ph\\u00ed cho y\\u1ebfu t\\u1ed1 kh\\u1ed1i l\\u01b0\\u1ee3ng c\\u00f4ng vi\\u1ec7c ph\\u00e1t sinh v\\u00e0 d\\u1ef1 ph\\u00f2ng chi ph\\u00ed cho y\\u1ebfu t\\u1ed1 tr\\u01b0\\u1ee3t gi\\u00e1","percent":100,"image":""},"3":{"name":"D\\u1ef1 ph\\u00f2ng chi ph\\u00ed cho y\\u1ebfu t\\u1ed1 thay \\u0111\\u1ed5i ph\\u01b0\\u01a1ng th\\u1ee9c qu\\u1ea3n l\\u00fd d\\u1ef1 \\u00e1n v\\u00e0 d\\u1ef1 ph\\u00f2ng chi ph\\u00ed cho y\\u1ebfu t\\u1ed1 tr\\u01b0\\u1ee3t gi\\u00e1","percent":5,"image":""},"4":{"name":"","percent":5,"image":""}}', 'radio', '5', '4', 'active', 1, '2016-07-08 04:54:50', '2016-07-08 04:54:50', NULL),
(8, '<p>Chi ph&iacute; chung (C) &nbsp;trong chi ph&iacute; x&acirc;y dựng hoặc lắp đặt thiết bị được t&iacute;nh theo tỷ lệ % của chi ph&iacute; n&agrave;o?</p>\r\n', NULL, '{"1":{"name":"Chi ph\\u00ed nh\\u00e2n c\\u00f4ng","percent":5,"image":""},"2":{"name":"Chi ph\\u00ed tr\\u1ef1c ti\\u1ebfp","percent":5,"image":""},"3":{"name":"Chi ph\\u00ed x\\u00e2y d\\u1ef1ng trong t\\u1ed5ng m\\u1ee9c \\u0111\\u1ea7u t\\u01b0 \\u0111\\u01b0\\u1ee3c duy\\u1ec7t","percent":5,"image":""},"4":{"name":"T\\u00f9y lo\\u1ea1i c\\u00f4ng tr\\u00ecnh m\\u00e0 ch\\u1ecdn c\\u00f4ng th\\u1ee9c x\\u00e1c \\u0111\\u1ecbnh v\\u00e0 \\u0111\\u1ecbnh m\\u1ee9c t\\u1ef7 l\\u1ec7 chi ph\\u00ed chung tr\\u00ean chi ph\\u00ed nh\\u00e2n c\\u00f4ng hay chi ph\\u00ed tr\\u1ef1c ti\\u1ebfp cho ph\\u00f9 h\\u1ee3p","percent":100,"image":""}}', 'radio', '5', '4', 'active', 1, '2016-07-08 04:58:46', '2016-07-08 04:58:46', NULL),
(9, '<p>The project that you are in charge has been successfully completed. The last of the deliverables have been formally accepted by the client. You had several contractors with whom contracts were prepared. With the project done you decide to communicate the completion details and closure of contracts. Which is the best form of communication?</p>\r\n', NULL, '{"1":{"name":"Formal written","percent":100,"image":""},"2":{"name":"Formal verbal","percent":5,"image":""},"3":{"name":"Informal verbal","percent":5,"image":""},"4":{"name":"Informal written","percent":5,"image":""}}', 'radio', '', '21', 'active', 1, '2016-07-08 09:06:29', '2016-07-08 09:06:29', NULL),
(10, '<p>Your company has bagged a number of government contracts dealing with setting up infrastructure. This includes setting up roads and bridges. This is a very big and prestigious project so your company would like to ensure everything is planned well in advance. You are the project manager of this project. Considering its importance - you and your team come up with a list of risks. One of the subject matter experts indicates that during the months of July and August the construction work of the bridge across the river would need to stop on account of past history of flooding of the river. You agree with the expert and plan the schedule accordingly. What strategy did you just apply ?</p>\r\n', NULL, '{"1":{"name":"Accept","percent":5,"image":""},"2":{"name":"Exploit","percent":5,"image":""},"3":{"name":"Mitigate","percent":100,"image":""},"4":{"name":"Transfer","percent":5,"image":""}}', 'radio', '', '21', 'active', 1, '2016-07-09 07:30:27', '2016-07-09 07:30:27', NULL),
(11, '<p>Phần mềm Dự to&aacute;n GXD 10 hiện tại c&aacute;c bảng biểu t&iacute;nh to&aacute;n (sheet) được x&acirc;y dựng dựa tr&ecirc;n Nghị định n&agrave;o?</p>\r\n', NULL, '{"1":{"name":"Ngh\\u1ecb \\u0111\\u1ecbnh s\\u1ed1 32\\/2015\\/N\\u0110-CP ng\\u00e0y 25\\/03\\/2015 c\\u1ee7a Ch\\u00ednh ph\\u1ee7 v\\u1ec1 qu\\u1ea3n l\\u00fd chi ph\\u00ed \\u0111\\u1ea7u t\\u01b0 x\\u00e2y d\\u1ef1ng","percent":100,"image":""},"2":{"name":"Ngh\\u1ecb \\u0111\\u1ecbnh s\\u1ed1 46\\/2015\\/N\\u0110-CP ng\\u00e0y 12\\/05\\/2015 c\\u1ee7a Ch\\u00ednh ph\\u1ee7 v\\u1ec1 qu\\u1ea3n l\\u00fd ch\\u1ea5t l\\u01b0\\u1ee3ng v\\u00e0 b\\u1ea3o tr\\u00ec c\\u00f4ng tr\\u00ecnh","percent":5,"image":""},"3":{"name":"Ngh\\u1ecb \\u0111\\u1ecbnh 37\\/2015\\/N\\u0110-CP ng\\u00e0y 22\\/04\\/2015 c\\u1ee7a Ch\\u00ednh ph\\u1ee7 v\\u1ec1 quy \\u0111\\u1ecbnh chi ti\\u1ebft v\\u1ec1 h\\u1ee3p \\u0111\\u1ed3ng x\\u00e2y d\\u1ef1ng","percent":5,"image":""},"4":{"name":"","percent":5,"image":""}}', 'radio', '13', '23', 'active', 1, '2016-07-10 09:03:27', '2016-07-10 09:03:27', NULL),
(12, '<p>Drake is in charge of a project that deals with laying out a lavish 18 hole golf course. The project work is in progress. He also has a number of contractors working on the project. Being an experienced manager Drake knows that communication is key to success of the project. He has identified 10 stakeholders with whom he needs to communicate.&nbsp;<br />\r\nDue to some internal and external organizational changes at the client end three new stakeholders have been added with whom he needs to communicate with now. Drake also had to reduce one of the contractors. How many communication channels does he have now?</p>\r\n', NULL, '{"1":{"name":"45","percent":5,"image":""},"2":{"name":"78","percent":100,"image":""},"3":{"name":"55","percent":5,"image":""},"4":{"name":"66","percent":5,"image":""}}', 'radio', '', '21', 'active', 1, '2016-07-10 11:54:20', '2016-07-10 11:54:20', NULL),
(13, '<p>You are responsible for managing a project that deals with laying out a freeway connecting two major port cities. Progress on the project has been smooth and you and your team are very confident on completing the project well within the stipulated timelines. On reviewing you see that the project has also run below the budget resulting in savings.&nbsp;<br />\r\nYou decide to add an extra feature of reflector strips on the road every mile. You do a quick calculation and are satisfied that neither budget nor schedule will slip. You feel that by adding these extra features you could also bag some future projects as well. This is an example of</p>\r\n', NULL, '{"1":{"name":"Scope Creep","percent":5,"image":""},"2":{"name":"Gold Plating","percent":100,"image":""},"3":{"name":"Integrated Change Control","percent":5,"image":""},"4":{"name":"Fast Tracking","percent":5,"image":""}}', 'radio', '', '21', 'active', 1, '2016-07-10 11:56:13', '2016-07-10 11:56:13', NULL),
(14, '<p>You head the engineering department in your company. Lately you have observed that certain deliveries are missing the schedule. On closer scrutiny you observe this to be occurring with a specific team member.&nbsp;<br />\r\nYou decide to discuss it out with the team member. Initially the team member is reluctant to discuss but finally opens up and indicates that the cause of the delays is often different instructions coming in from you as well as the project manager.<br />\r\nShe indicates that at&nbsp;such times she is confused related to whose instructions to follow, thereby causing delays. What kind of an Organizational structure is this most likely to be ?</p>\r\n', NULL, '{"1":{"name":"Functional","percent":5,"image":""},"2":{"name":"Projectized","percent":5,"image":""},"3":{"name":"Weak Matrix","percent":5,"image":""},"4":{"name":"Balanced Matrix","percent":100,"image":""}}', 'radio', '', '21', 'active', 1, '2016-07-15 07:32:11', '2016-07-15 07:32:11', NULL),
(17, 'You and and your team have just created a schedule network diagram.You have come up with the estimates and have defined the durations and subsequently have identified the Critical Path.You now decide to do a ''Backward Pass'' through the Schedule Network Diagram - what would you be calculating ?', NULL, '{"1":{"name":"The Early Start and Early Finish for each activity","percent":5,"image":""},"2":{"name":"The Late Start and Late Finish for each activity","percent":100,"image":""},"3":{"name":"The duration of the critical path","percent":5,"image":""},"4":{"name":"The duration of the critical path","percent":5,"image":""}}', 'radio', '', '21', 'active', 1, '2016-07-22 10:24:29', '2016-07-22 10:24:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `label` varchar(512) CHARACTER SET latin1 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `label`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', '', NULL, NULL, NULL),
(2, 'sale', NULL, NULL, NULL, NULL),
(3, 'sale_lead', NULL, NULL, NULL, NULL),
(4, 'teacher_internal', NULL, NULL, NULL, NULL),
(5, 'teacher_external', NULL, NULL, NULL, NULL),
(6, 'staff', NULL, NULL, NULL, NULL),
(7, 'user', NULL, NULL, NULL, NULL),
(8, 'user_mode', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=317 ;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `course_id`, `name`, `created_at`, `updated_at`) VALUES
(6, 3, 'Bài số 1', '2016-07-04 10:58:53', '2016-07-04 10:58:53'),
(7, 3, 'Bài số 2', '2016-07-04 10:58:53', '2016-07-04 10:58:53'),
(12, 5, 'Chuyên đề 1: Tổng quan về đấu thầu', '2016-07-05 22:41:56', '2016-07-17 16:08:53'),
(13, 5, 'Chuyên đề 2: Các hình thức lựa chọn nhà thầu, phương thức đấu thầu', '2016-07-05 22:41:56', '2016-07-17 16:08:53'),
(14, 6, 'Các điểm mới của Luật Xây dựng số 50', '2016-07-06 02:50:19', '2016-07-06 02:50:19'),
(15, 6, 'Nghị định số 59/2015/NĐ-CP', '2016-07-06 02:50:19', '2016-07-06 02:50:19'),
(16, 6, 'Nghị định số 46/2015/NĐ-CP', '2016-07-06 02:50:19', '2016-07-06 02:50:19'),
(24, 11, '', '2016-07-06 04:33:25', '2016-07-06 04:33:25'),
(28, 13, 'Định mức dự toán', '2016-07-06 08:33:27', '2016-07-06 08:33:27'),
(29, 13, 'Đơn giá xây dựng công trình', '2016-07-06 08:33:27', '2016-07-06 08:33:27'),
(30, 14, 'Bài 1', '2016-07-06 08:53:22', '2016-07-06 08:53:22'),
(31, 14, 'Bài 2', '2016-07-06 08:53:22', '2016-07-06 08:53:22'),
(32, 15, '', '2016-07-07 03:40:05', '2016-07-07 03:40:05'),
(33, 16, 'Phần 1', '2016-07-07 03:41:55', '2016-07-07 03:41:55'),
(34, 17, '', '2016-07-07 03:49:53', '2016-07-07 03:49:53'),
(35, 18, '', '2016-07-07 03:52:05', '2016-07-07 03:52:05'),
(36, 19, '', '2016-07-07 10:54:54', '2016-07-07 10:54:54'),
(37, 20, '', '2016-07-08 03:09:44', '2016-07-08 03:09:44'),
(38, 21, 'section 1', '2016-07-08 09:04:04', '2016-07-09 09:54:29'),
(42, 24, '', '2016-07-11 09:48:12', '2016-07-11 09:48:12'),
(44, 26, '', '2016-07-11 10:01:06', '2016-07-11 10:01:06'),
(46, 28, 'Chuyên đề 1 Hợp đồng trong hoạt động xây dựng', '2016-07-11 10:13:51', '2016-07-14 23:38:29'),
(47, 29, '', '2016-07-11 10:17:13', '2016-07-11 10:17:13'),
(58, 31, 'section 1', '2016-07-13 02:51:36', '2016-07-13 02:51:36'),
(59, 31, 'section 2', '2016-07-13 02:51:36', '2016-07-13 02:51:36'),
(60, 32, '', '2016-07-13 10:01:36', '2016-07-13 10:01:36'),
(61, 33, '', '2016-07-13 10:02:07', '2016-07-13 10:02:07'),
(63, 35, '', '2016-07-13 10:02:46', '2016-07-13 10:02:46'),
(64, 36, '', '2016-07-13 10:03:20', '2016-07-13 10:03:20'),
(65, 37, '', '2016-07-13 10:03:37', '2016-07-13 10:03:37'),
(66, 38, '', '2016-07-14 16:40:34', '2016-07-14 16:40:34'),
(67, 28, 'Chuyên đề 2 Quy định về thanh quyết toán hợp đồng xây dựng', '2016-07-14 23:38:29', '2016-07-14 23:38:29'),
(68, 28, 'Chuyên đề 10 Các tiện ích, thủ thuật, in ấn hồ sơ', '2016-07-14 23:38:29', '2016-07-14 23:38:29'),
(69, 28, 'Chuyên đề 3 thử', '2016-07-16 09:54:10', '2016-07-16 09:54:10'),
(70, 28, 'Chuyên đề 5 thử', '2016-07-16 09:54:10', '2016-07-16 09:54:10'),
(76, 39, 'Chuyên đề 1', '2016-07-16 19:56:17', '2016-07-16 19:56:17'),
(77, 40, '', '2016-07-16 20:21:25', '2016-07-16 20:21:25'),
(78, 41, '', '2016-07-16 20:30:40', '2016-07-16 20:30:40'),
(79, 42, '', '2016-07-16 20:31:13', '2016-07-16 20:31:13'),
(80, 43, '', '2016-07-16 20:31:47', '2016-07-16 20:31:47'),
(81, 44, '', '2016-07-16 20:32:09', '2016-07-16 20:32:09'),
(82, 45, 's1', '2016-07-17 00:43:11', '2016-07-17 00:43:11'),
(83, 45, 's2', '2016-07-17 00:43:11', '2016-07-17 00:43:11'),
(84, 45, 's5', '2016-07-17 00:43:11', '2016-07-17 00:43:11'),
(85, 45, 's4', '2016-07-17 00:44:16', '2016-07-17 00:44:16'),
(86, 5, 'Chuyên đề 3: Hợp đồng', '2016-07-17 16:08:53', '2016-07-17 16:08:53'),
(87, 5, 'Chuyên đề 9: Các vấn đề khác liên quan', '2016-07-17 16:08:53', '2016-07-17 16:08:53'),
(89, 47, '', '2016-07-18 09:25:32', '2016-07-18 09:25:32'),
(90, 2, 'Chương 1', '2016-07-22 02:02:45', '2016-07-22 02:02:45'),
(91, 2, 'Chương 2', '2016-07-22 02:02:45', '2016-07-22 02:02:45'),
(92, 2, 'Chuyên đề 3', '2016-07-22 02:02:45', '2016-07-22 02:02:45'),
(121, 48, '', '2016-07-22 08:27:42', '2016-07-22 08:27:42'),
(148, 4, 'Chuyên đề 1', '2016-07-22 09:14:37', '2016-07-22 09:14:37'),
(149, 4, 'Chuyên đề 2', '2016-07-22 09:14:37', '2016-07-22 09:14:37'),
(150, 4, 'Chuyên đề 4', '2016-07-22 09:14:37', '2016-07-22 09:14:37'),
(156, 8, 'Tổng quan', '2016-07-22 09:17:16', '2016-07-22 09:17:16'),
(157, 8, 'Những điểm mới', '2016-07-22 09:17:16', '2016-07-22 09:17:16'),
(159, 9, '', '2016-07-22 09:19:30', '2016-07-22 09:19:30'),
(173, 34, '', '2016-07-22 09:31:51', '2016-07-22 09:31:51'),
(174, 30, 'Bài 1 Quy định hiện hành về QLCL công trình xây dựng', '2016-07-22 09:34:28', '2016-07-22 09:34:28'),
(175, 30, 'Bài 2 Giới thiệu phần mềm QLCL GXD', '2016-07-22 09:34:28', '2016-07-22 09:34:28'),
(176, 30, 'Bài 3 Thực hành chỉnh sửa nội dung biên bản', '2016-07-22 09:34:28', '2016-07-22 09:34:28'),
(177, 30, 'Bài 4 Lập biên bản nghiệm thu vật liệu, thiết bị, cấu kiện', '2016-07-22 09:34:28', '2016-07-22 09:34:28'),
(178, 30, 'Bài 9 Các tiện ích khác của phần mềm QLCL GXD', '2016-07-22 09:34:28', '2016-07-22 09:34:28'),
(179, 25, 'Chuyên đề 1 Các khái niệm nền tảng', '2016-07-22 09:41:36', '2016-07-22 09:41:36'),
(180, 25, 'Chuyên đề 2 một vài kiến thức Excel', '2016-07-22 09:41:36', '2016-07-22 09:41:36'),
(181, 25, 'Chuyên đề 10 ôn tập và kiểm tra cuối khóa', '2016-07-22 09:41:36', '2016-07-22 09:41:36'),
(182, 1, 'Section 1', '2016-07-22 09:42:48', '2016-07-22 09:42:48'),
(183, 1, 'Section 2', '2016-07-22 09:42:48', '2016-07-22 09:42:48'),
(184, 1, 'Section 3', '2016-07-22 09:42:48', '2016-07-22 09:42:48'),
(195, 27, 'Cài đặt phần mềm, tải dữ liệu, ghép dữ liệu', '2016-07-22 10:33:34', '2016-07-22 10:33:34'),
(196, 12, 'Đọc bản vẽ', '2016-07-22 11:03:49', '2016-07-22 11:03:49'),
(197, 12, 'Thực hành AutoCad', '2016-07-22 11:03:49', '2016-07-22 11:03:49'),
(198, 12, 'Bóc khối lượng', '2016-07-22 11:03:49', '2016-07-22 11:03:49'),
(199, 12, 'Tính khối lượng với Đấu thầu GXD', '2016-07-22 11:03:49', '2016-07-22 11:03:49'),
(243, 7, 'Những quy định chung', '2016-07-22 16:49:09', '2016-07-22 16:49:09'),
(244, 7, 'Chi phí quản lý dự án và tư vấn đầu tư xây dựng', '2016-07-22 16:49:09', '2016-07-22 16:49:09'),
(245, 7, 'Thanh toán, quyết toán vốn đầu tư xây dựng công trình', '2016-07-22 16:49:09', '2016-07-22 16:49:09'),
(246, 7, 'Quyền và nghĩa vụ của các chủ thể trong quản lý chi phí đầu tư xây dựng', '2016-07-22 16:49:09', '2016-07-22 16:49:09'),
(247, 7, 'Định mức, giá xây dựng công trình và chỉ số giá xây dựng', '2016-07-22 16:49:09', '2016-07-22 16:49:09'),
(248, 46, '', '2016-07-22 21:44:43', '2016-07-22 21:44:43'),
(280, 49, '', '2016-07-25 03:02:44', '2016-07-25 03:02:44'),
(282, 10, '', '2016-07-25 03:39:37', '2016-07-25 03:39:37'),
(288, 51, '', '2016-07-25 04:03:26', '2016-07-25 04:03:26'),
(305, 52, 'Xử lý tình huống trong quá trình cài đặt', '2016-07-26 00:00:42', '2016-07-26 00:00:42'),
(306, 52, 'Xử lý tình huống trong quá trình sử dụng', '2016-07-26 00:00:42', '2016-07-26 00:00:42'),
(311, 22, 'Xử lý lỗi trong quá trình cài đặt', '2016-07-26 00:45:47', '2016-07-26 00:45:47'),
(312, 22, 'Xử lý lỗi trong quá trình sử dụng', '2016-07-26 00:45:47', '2016-07-26 00:45:47'),
(315, 53, '', '2016-07-26 01:00:14', '2016-07-26 01:00:14'),
(316, 23, 'Thao tác khởi đầu cơ bản', '2016-07-26 08:00:56', '2016-07-26 08:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `card` varchar(32) DEFAULT NULL,
  `telephone` varchar(32) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `name` varchar(512) DEFAULT NULL,
  `address` text,
  `birthday` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `gender` enum('other','female','male') DEFAULT 'other',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` text,
  `provider` enum('google','facebook','web') NOT NULL DEFAULT 'web',
  `confirmed` tinyint(4) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(255) NOT NULL,
  `avatar` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `password`, `email`, `card`, `telephone`, `first_name`, `last_name`, `name`, `address`, `birthday`, `gender`, `status`, `remember_token`, `provider`, `confirmed`, `confirmation_code`, `avatar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'anhnt', '$2y$10$zy/2E2j4yge0/37TpMIN5OlgrjXJCCTY1W3chjGkdJvbOozLZO.oq', 'huonglm09@gmail.com', '123456789', '0979650659', NULL, NULL, 'Nguyễn Thế Anh', '', '2016-07-25 10:05:48', 'other', 1, 'rHx6VgAcPM3HDY0uGMetWELrXE3k0sbZSnPYXJ3C0GMf55t4ULD4tSjJLdvX', 'web', 1, 'Dnv51Z', 'backend/upload/images/avatars/origins/90402-teacher.png', NULL, '2016-07-25 03:05:48', NULL),
(2, 1, 'admin', '$2y$10$hgAAXYBpzXnSWbqQzWfZpuoVpmfm4og/XdNeDU4fhkHSPsS4a4gOe', 'thuchm92@gmail.com', '12345678', '0989558154', NULL, NULL, 'ha thuc', 'cau giay', '2016-07-22 08:13:59', 'male', 1, 'mRna2SC5RFpiWay60OyYbws1nDz8cGJkNQdySLn4v8eEaljB16mVXgsVXizK', 'web', 1, 'CugEEz', NULL, '2016-06-29 01:40:49', '2016-07-22 01:13:59', NULL),
(3, 1, 'nguyentheanh', '$2y$10$T9Ii78i518Qw7e4dqavsIeCxDcqTsFScgtQNwj30qpqFIkj7C6bQy', 'theanh@gxd.vn', '123456', '0975398111', NULL, NULL, 'Nguyễn Thế Anh', 'Số 2a/55, Nguyễn Ngọc Nại, Khương Mai, Thanh Xuân, Hà Nội', '2016-07-12 00:34:16', 'male', 1, '0Hn6BPm67IvqFxaDdIHwROTLuDSYZ7edDCmw0swFgagI9UW8pDULJr6Hzoam', 'web', 1, 'bXYIAI', 'backend/upload/images/avatars/origins/68900-200x200.jpg', '2016-07-04 10:56:02', '2016-07-12 00:34:16', NULL),
(4, 3, 'hoangdv', '$2y$10$hgAAXYBpzXnSWbqQzWfZpuoVpmfm4og/XdNeDU4fhkHSPsS4a4gOe', 'hoangdv1112@gmail.com', '56431231', '0948121190', NULL, NULL, 'Hoang Doan', 'Ha Noi', '2016-07-23 12:51:05', 'other', 1, 'Tq4pYq0rSlA8Thjr7ota6fTBOknBCWYDT5Q5xVYHDBw8fl2wnby6GThgRvGg', 'web', 1, '3uKpIi', 'backend/upload/images/avatars/origins/52857-Default-avatar.jpg', '2016-07-05 00:58:24', '2016-07-23 05:51:05', NULL),
(5, 1, 'thucha', '$2y$10$hgAAXYBpzXnSWbqQzWfZpuoVpmfm4og/XdNeDU4fhkHSPsS4a4gOe', 'thieugia9210@gmail.com', '123456789', '0989558154', NULL, NULL, 'ha thuc', 'cau giay', '2016-07-22 08:29:52', 'male', 1, NULL, 'web', 1, 'cQt6i3', NULL, '2016-07-05 02:33:25', '2016-07-05 02:33:25', NULL),
(11, 4, 'Tranlinh_GXD', '$2y$10$2UlG.M0DTgh4rWzOiBQOkOnUi.YUe5HR9EwHBkAFOABo7I7CpMdii', 'linh.ktxd2406@gmail.com', 'No.6989', '0982812793', NULL, NULL, 'Trần Hoàng Linh', 'Hà Nội', '2016-07-22 08:44:16', 'male', 1, 'DkXmmfx3GfsWXbUmEqtuVL7dVMZS60GfnlqrxaSDWlATjdw1gccnwkqlXuCJ', 'web', 1, 'mCEA6y', 'backend/upload/images/avatars/origins/48517-rsz_1rsz_61.jpg', '2016-07-16 08:12:42', '2016-07-22 01:44:16', NULL),
(12, 4, 'thangpham', '$2y$10$hgAAXYBpzXnSWbqQzWfZpuoVpmfm4og/XdNeDU4fhkHSPsS4a4gOe', 'thangpham@gmail.com', '123456789', '', NULL, NULL, 'Phạm Văn Thắng', '', '2016-07-22 09:01:38', 'male', 1, 'sGpMztqn3ccBziSmTjnuzVqYjyCOXYl1OqL0h9EpkbhcoJ1lxs9mGWmZyOGo', 'web', 1, 'Zpb1CP', 'backend/upload/images/avatars/origins/11516-pham-thang.jpg', '2016-07-16 08:22:35', '2016-07-22 02:01:38', NULL),
(13, 4, 'Thanh Tùng', '$2y$10$xbT3xZIbLraYOvIi9Uat5eYBelV02pjY01jvsHg2jMpVGOwsoteSq', 'thanhtung@gmail.com', '123456789', '096 006 2628', NULL, NULL, 'Nguyễn Thanh Tùng', '124 - Nguyễn Ngọc Nại, Thanh Xuân, Hà Nội', '2016-07-22 16:02:30', 'male', 1, '8FStYTJAOuE0LYC7emi5koQupE2SW4cTqdv6qMutghcD5bRPfKkCxYrjbDsd', 'web', 1, '3eibO7', 'backend/upload/images/avatars/origins/83642-13709587_483637141847075_355286104_o.png', '2016-07-16 08:24:51', '2016-07-22 09:02:30', NULL),
(14, 4, 'minhduc', '$2y$10$pwY9AeQnPjC6Z.346AXBZ.5UDdwm.nOBP9TBbJWkPE1k4XkEdVc8i', 'minhduc@giaxaydung.com', '12345678', '0983039791', NULL, NULL, 'Dương Minh Đức', '', '2016-07-24 01:08:16', 'male', 1, 'v44ha5F5CMZLfTsxFF3csuJTvrqB5ZqiAm99NdGVrXKgjLjfhPPLUmzHsd4V', 'web', 1, 'j74p3R', 'backend/upload/images/avatars/origins/37420-anh-cac-thay.jpg', '2016-07-16 08:26:13', '2016-07-23 18:08:16', NULL),
(15, 4, 'hollyjoe', '$2y$10$ztf5oZrzxzQBv8/YVQqLGe6Db.n5e5E/vvLlpOlVOWfcBEAkRTfGG', 'hollyjoe@gmail.com', '123456789', '', NULL, NULL, 'Nguyễn Thảo Anh', '', '2016-07-22 16:07:42', 'female', 1, NULL, 'web', 1, 'iBNgoI', 'backend/upload/images/avatars/origins/35168-dai-su-thanh-thien-GXD-Du-toan-GXD.jpg', '2016-07-16 08:27:54', '2016-07-22 09:07:42', NULL),
(16, 2, 'Hoàng Nguyên Thành', '$2y$10$QF77TWG/0gV2NI8B20Thq.WXXG8GJySI0.wGj7df7Qj/jpzRC2vUm', 'nguyenthanh@gxd.vn', '123346', '0979876228', NULL, NULL, '', '', '2016-07-22 23:54:31', 'other', 1, 'mb4EFzHHef8ykcC8RLLqrXqpxrl317uG6L4VCrf8PMDZn8GOWj6euchwoQvL', 'web', 1, 'VJ0PgR', NULL, '2016-07-17 18:02:44', '2016-07-22 16:54:31', NULL),
(17, 2, 'leogxd', '$2y$10$/cm9Tf84St7rs07E5zshVe5Q/vEvtrBJ/SUR2otPiJzqbipLh8Sf.', 'tienthanh@giaxaydung.com', NULL, '0978508551', NULL, NULL, NULL, NULL, '2016-07-24 07:19:31', 'other', 1, NULL, 'web', 0, 'uXhmWT', NULL, '2016-07-18 04:19:04', '2016-07-24 00:19:31', NULL),
(18, 7, 'kieumanhtu', '$2y$10$s6CGJZxCBLcu0sJ0sx60LutmQdUpqwPFWS6SN34UDTXZsilM2d55S', 'mr.kieumanhtu@gmail.com', '12345678', '0989904508', NULL, NULL, 'Kiều Mạnh Tú', '', '2016-07-23 04:42:15', 'male', 1, '1Ye1MG2gOdm7UuCxzoWQt5akkG79rMVc4hDTdODznPqI9munosQdgXGs4mYF', 'web', 1, 'q4Ylno', 'backend/upload/images/avatars/origins/98480-1.jpg', '2016-07-22 01:39:08', '2016-07-22 21:42:15', NULL),
(19, 2, 'Nguyễn Linh Chi', '$2y$10$8zMTX.6yXT8EhuCtrec9uuWiUm5gB.8ltfT4QFBSS4kLgn1T9S0wq', 'linhchi@gxd.vn', NULL, '0963799736', NULL, NULL, NULL, NULL, '2016-07-22 08:42:04', 'other', 1, 'wIDQ5cYCYzqo1916YH0Eh6j5KOOnNa7ibzxQI2leUt1y5ydvqKPsujLkOHV2', 'web', 1, 'K6ypYe', NULL, '2016-07-22 01:41:02', '2016-07-22 01:42:04', NULL),
(20, 7, 'nguyenthothanh', '$2y$10$FN.uaY/OT1Q/XcD4GlBO2uuNMunRDqeX5/t/MXzaU2F3Ddw6q/kzO', 'thanhcdbbk49@gmail.com', '123456', '0973703891', NULL, NULL, '', '', '2016-07-22 23:36:02', 'other', 1, '6AfIGmN8w640uMulXcrJMproZMrwTry4bIR1gKGJkSXIZj53Tl7bNTSI7tz8', 'web', 1, 'yyTrWk', NULL, '2016-07-22 02:38:19', '2016-07-22 16:36:02', NULL),
(21, 2, 'trancongdanhqn93', '$2y$10$RiKaqerZmj6jJfYE4J8R6OcFITb2eL80RCPCibzLaYd5SwmaAnkjK', 'gv.trancongdanh@gmail.com', NULL, '1679224007', NULL, NULL, NULL, NULL, '2016-07-22 09:54:43', 'other', 1, 'cCCrPDYuylLsw8VSDHE6A4Ig0LaqXBIEVk41t3nrkfQKolrjWBGMdML79hcU', 'web', 1, '7l8MyU', NULL, '2016-07-22 02:52:08', '2016-07-22 02:54:43', NULL),
(22, 2, 'phandunggxd', '$2y$10$3DsUcCn67YwkCBL.lIrcA.35kgQ8fvykKzZhJ4ciNU5BFDd98oPNm', 'phandung@giaxaydung.com', NULL, '0983829311', NULL, NULL, NULL, NULL, '2016-07-22 10:38:53', 'other', 1, 'mhCQ7SwpTPQoumtMA0Xrkrg6FyTPt74QQQBF77WvxFNBg6zjmiIw7LWuhZN3', 'web', 1, 'GEimeB', NULL, '2016-07-22 03:32:59', '2016-07-22 03:38:53', NULL),
(23, 2, 'datnguyen609', '$2y$10$qYOF4UW6TTazFMq3l6h0WenypyIEY3ENniJLEJx7EHt1.wom2e0SG', 'datnguyen609@gmail.com', NULL, '1646996609', NULL, NULL, NULL, NULL, '2016-07-22 13:29:02', 'other', 1, 'Jnp6fmapqkYaYNTHXPc2dk8KwdLFJkIbP4UlIIJ18VxQ2JW8Uqpn3yAOG4iY', 'web', 1, 'rxytVb', NULL, '2016-07-22 06:27:47', '2016-07-22 06:29:02', NULL),
(24, 2, 'cuongmh', '$2y$10$FO0/ncnEilMYRJ2ZHp0DjO1nMbSF1d4iPE09ae97r7xZSRo3iQoHi', 'hungcuong2911@gmail.com', NULL, '0973982416', NULL, NULL, NULL, NULL, '2016-07-24 07:19:29', 'other', 1, NULL, 'web', 0, 'n9F9X4', NULL, '2016-07-22 09:01:19', '2016-07-24 00:19:29', NULL),
(25, 2, 'haik58cde', '$2y$10$aSpvy7qNjjeKPapw2gzyMOnt5z9oe86D.CJpEejQH9EDsFHqSwk4u', 'haik58cde@gmail.com', NULL, '0968965911', NULL, NULL, NULL, NULL, '2016-07-24 07:19:26', 'other', 1, NULL, 'web', 0, 'z5UNXp', NULL, '2016-07-22 09:12:44', '2016-07-24 00:19:26', NULL),
(26, 2, 'trantheanh', '$2y$10$78VG8ggd2J37.q0IFqwe2.dEr3LJ5Aw8l8L1V5KkEYcbehxxtPDCG', 'theanh451986@gmail.com', NULL, '0972040586', NULL, NULL, NULL, NULL, '2016-07-24 02:51:19', 'other', 1, NULL, 'web', 1, 'Tlj4A6', NULL, '2016-07-22 09:18:18', '2016-07-23 19:51:19', NULL),
(27, 2, 'Trần Bùi Quốc Cường', '$2y$10$fiOWh.6RX7wAtLBIOLtRruN0u6VsuJKA3nWPm8UPTNFBkG..rGI5a', 'tranbuiquoccuong@gmail.com', NULL, '0972352494', NULL, NULL, NULL, NULL, '2016-07-22 16:19:32', 'other', 1, 'sJ16lPuKaaZB3r2TLq71kNskV2HObKCYaBPFLEiBakH2n3bADi8ym5C1eNTs', 'web', 1, '1YV2JY', NULL, '2016-07-22 09:18:51', '2016-07-22 09:19:32', NULL),
(28, 2, 'Kyhoang', '$2y$10$YTEgCe0HoTqijG6PmZtmoOWY0yc/x5ESSPqJuhgwgLLLX8devO9YC', 'caokyhoang@gmail.com', NULL, '0977941329', NULL, NULL, NULL, NULL, '2016-07-23 04:22:43', 'other', 1, 'JuCj0mGPyIhKdtV2Lw0Ym5zhgqXbEy6wv7ZbN8MRsZEpST0tzwGNwR1V5gFR', 'web', 1, 'CsL81c', NULL, '2016-07-22 09:21:20', '2016-07-22 21:22:43', NULL),
(29, 2, 'tienphongpc', '$2y$10$ViWaZTG13v8sn5GFDvqy0.kSxTZo.GPvWUbTdWwpkGEzigAxdGDw2', 'tienphongpc@gmail.com', NULL, '0888514186', NULL, NULL, NULL, NULL, '2016-07-22 16:29:19', 'other', 1, 'khQqtear2RR9u5GdxDlugjY2IGlAZGuaH7Aqb7OKkMzjMhV22vsnOYkvEOcZ', 'web', 1, 'vJQjGI', NULL, '2016-07-22 09:27:16', '2016-07-22 09:29:19', NULL),
(30, 2, 'kysulongbk', '$2y$10$WozNbMvanKtX/kWEdrEPCuLthlvv/mNKIEaYwPVSetrmI3kPgAc6G', 'kysulongbk@gmail.com', NULL, '0977628281', NULL, NULL, NULL, NULL, '2016-07-22 17:31:08', 'other', 1, 'yIp3lZLBIvQCXLwcSXAfDT07HUHhzjKn4EATY1vtHlU985XOlEJa0fOq8pD7', 'web', 1, 'j69rG9', NULL, '2016-07-22 09:34:52', '2016-07-22 10:31:08', NULL),
(31, 2, 'hungvo', '$2y$10$qaaMo5R8eINMv1qvYhvOFeCqL/NWBJKCr.ulTCkA7ere/SgzvjkW.', 'vohung1818@gmail.com', NULL, '0977408292', NULL, NULL, NULL, NULL, '2016-07-22 16:40:06', 'other', 1, 'zxm5UtVgoQtqrJZCdK58YNqUujUKTo3rGRp1YEwSKG8F2fsEy9xEnDFRCEGT', 'web', 1, '1cchvs', NULL, '2016-07-22 09:38:08', '2016-07-22 09:40:06', NULL),
(32, 2, 'Dovanthanh', '$2y$10$OAGyljB/9aGCLyBIJ2LLBe.laofiOgcBcgRlPZ.WUw6HIiUf/r86G', 'dv.thanhdhxd56@gmail.com', NULL, '0971363262', NULL, NULL, NULL, NULL, '2016-07-23 06:52:50', 'other', 1, '5HWvxKRwUmlV76oGrb1Tqa38gGfYN0bDuaSVPDvUlDmw0pHaOxE7Oqs58DcH', 'web', 1, 'ExNE43', NULL, '2016-07-22 09:41:28', '2016-07-22 23:52:50', NULL),
(33, 2, 'Giangdt288', '$2y$10$StOqnSI2fiC0WJm8VJWtPOhSvxJdzCZf59AoORXITuQoL9Mach23y', 'Giangdt288@gmail.com', NULL, '0982329499', NULL, NULL, NULL, NULL, '2016-07-22 16:47:02', 'other', 1, 'EjbIrgz3Hx1u3FOtuy69lVL0fP7tV9AekyFUMJkHeJJuZc4FA7VtYOPTl0yF', 'web', 1, 'ruWKqg', NULL, '2016-07-22 09:45:12', '2016-07-22 09:47:02', NULL),
(34, 2, 'Vân Vân', '$2y$10$JPByQIoKxhPzKKh9wPm71eejMvuyczJS6iNYWKsFg/Ci0Wt0DR0xi', 'gxdvan@gmail.com', NULL, '0949746300', NULL, NULL, NULL, NULL, '2016-07-22 17:05:47', 'other', 1, '9Eutevt6Q0jkU3PVHCAW2c2hgl6tdUVQOiPqMfhh9Z95c784FqGkzH3ZvrHg', 'web', 1, 'GCpiEp', NULL, '2016-07-22 10:00:02', '2016-07-22 10:05:47', NULL),
(35, 2, '22885', '$2y$10$4Z5fAOYWzKgIcXoPSzQ0AOq2fmWm2JL09OeL8aP5NncC2ZpUa1lgO', 'hoanglam228@gmail.com', NULL, '0935600936', NULL, NULL, NULL, NULL, '2016-07-23 00:04:37', 'other', 1, 'NkVe2V5PFOO2VxRSnVeyNxrEipSiuyW7I1PVNtQT31topnQC430snGgMiITU', 'web', 1, 'ALULvE', NULL, '2016-07-22 16:58:07', '2016-07-22 17:04:37', NULL),
(36, 2, 'Anh Tiep pro', '$2y$10$s20ySRC6ZaCuxsZENRDdYO.UN0g.dSfGO719SO9NrBdG4S6i1xMUy', 'nguyenanhtiep1202@gmail.com', NULL, '0963001291', NULL, NULL, NULL, NULL, '2016-07-23 00:29:46', 'other', 1, 'FtpeoWozS2Ykn9vAYCoBpjG0uM1R7zzTTFGKChYrBrBpQqlAy5bkTGNJgNfx', 'web', 1, '9KUnX8', NULL, '2016-07-22 17:28:41', '2016-07-22 17:29:46', NULL),
(37, 2, 'Playmaker', '$2y$10$LRhYVaGXBuW938x5B4swQe84mqGj.cjBcKo/CeUoUzevrdt/3NUpy', 'playmaker559@gmail.com', NULL, '0972429559', NULL, NULL, NULL, NULL, '2016-07-23 01:24:18', 'other', 1, 'ebTP20YubdricGCHSeec8xw5IkBw5ZAGD5zCGpl477GJqdhwo6ycw2diDESt', 'web', 1, 'yfguaD', NULL, '2016-07-22 18:23:02', '2016-07-22 18:24:18', NULL),
(38, 2, 'Công Thanh', '$2y$10$Oq1wYt1W/HwTEblcsxcjceeqIXI/IbuB90VXKqQ46ShvkqxQ73yt.', 'Congthanh1991dhxd@gmail.com', NULL, '0986200163', NULL, NULL, NULL, NULL, '2016-07-23 02:22:55', 'other', 1, NULL, 'web', 1, 'tVfWtC', NULL, '2016-07-22 19:17:59', '2016-07-22 19:22:55', NULL),
(39, 2, 'Nguyễn Công Thanh', '$2y$10$IjCWtA.Cq6Xr0SM6mbwRtuZLe8Vc4TLZ7FvaSLfYsZ9eVm6CR8CgC', 'phusuonggio@gmail.com', NULL, '0986200163', NULL, NULL, NULL, NULL, NULL, 'other', 0, NULL, 'web', 0, 'eXkVXh', NULL, '2016-07-22 19:21:58', '2016-07-22 19:21:58', NULL),
(40, 2, 'anngonma', '$2y$10$rdeH9eelQOpOZrA7cEJgCOAcurnwitV/IXQusMhdcei37Rql7P4Fi', 'anngonma@gmail.com', NULL, '0167288723', NULL, NULL, NULL, NULL, '2016-07-23 11:53:55', 'other', 1, '9rQBJjI6haVe4bVRnhp5R8fhlBC35WdC2ry1SeTy9xUGPGVNkkhi64CicuMG', 'web', 1, 'nUVK6b', NULL, '2016-07-22 20:08:42', '2016-07-23 04:53:55', NULL),
(41, 2, 'kehustd', '$2y$10$zGZYnhweam1NnrPgj6PVWOVz/tU/On9415Po1go41EmfAe3.T2Tau', 'madaybeoicu@yahoo.com', NULL, '0904149316', NULL, NULL, NULL, NULL, NULL, 'other', 0, NULL, 'web', 0, 'fBIvbG', NULL, '2016-07-22 21:32:41', '2016-07-22 21:32:41', NULL),
(42, 2, 'namgiangduy89', '$2y$10$PhSL0d5KRNW4Hkgk2W81f.34t5tLOQlh22tjBFghUii.LzOgpd69O', 'nguyenduynhat.qn@gmail.com', NULL, '0911367222', NULL, NULL, NULL, NULL, '2016-07-23 04:45:40', 'other', 1, '3mn6636hWvjOaVEig8ZLGJVpWfLKXOVTMjF3Dtz4tyUxr499uQNDUEoiUSdr', 'web', 1, 'DWpf45', NULL, '2016-07-22 21:43:59', '2016-07-22 21:45:40', NULL),
(43, 2, 'nguyenkienxd', '$2y$10$m91n7q9UUDrW7MqSMegCoOxzAbqTFwYzjRzFl.sKAit7SNNIU.Ysu', 'trungkientdc@gmail.com', NULL, '0982277836', NULL, NULL, NULL, NULL, '2016-07-23 06:13:25', 'other', 1, 'nx2j6wOCX38XuBv09TjJX3Xo2Hp4CWBUgEpCae69K2vLeoJ6qlByVNkVDx1n', 'web', 1, '2fIG8V', NULL, '2016-07-22 23:12:15', '2016-07-22 23:13:25', NULL),
(44, 2, 'trinhthanh', '$2y$10$LVuaeVpoKteotGH56.QlpuGjwXMN1kKrUQCZTwD/AEhbCEOP8lXe2', 'trinhthanhktxd@gmail.com', NULL, '0978097169', NULL, NULL, NULL, NULL, '2016-07-24 04:10:54', 'other', 1, 'M1IBoj9HaLajNNsppVtdkzrGEimjUieawKT0yduDoB4EyupL1uuJzWK3QWGT', 'web', 1, 'GkoGtO', NULL, '2016-07-23 00:36:58', '2016-07-23 21:10:53', NULL),
(45, 2, 'Le Ngoc Toan', '$2y$10$PAd/agIVpDCEinjcklxncuY5br7/7jBL8/UebjoqTXphxZFjlotGO', 'ngoctoan.cdtt@gmail.com', NULL, '0983151710', NULL, NULL, NULL, NULL, '2016-07-23 07:55:30', 'other', 1, 'HB1FNOXA7lavkSHpv1AHFsfuXQZhPenm7O69oxVoF9IxBVYacYDUWlOyPfjc', 'web', 1, 'h08P89', NULL, '2016-07-23 00:54:33', '2016-07-23 00:55:30', NULL),
(46, 2, 'nguyenchinam', '$2y$10$c0ZNddpFKpdutNq.Zb/HJuA39uKViV1QoEB2IOaOAe6gWYYZV8TRa', 'nam56xf@gmail.com', NULL, '0902190222', NULL, NULL, NULL, NULL, '2016-07-23 07:55:54', 'other', 1, 'Ulke1Ac0CMa73fsrPUp6UppdyPUdnUeEanL58LmBs6oW5mVtGxexirgmUtXs', 'web', 1, 'fDMUO0', NULL, '2016-07-23 00:54:36', '2016-07-23 00:55:54', NULL),
(47, 2, 'dovanviet', '$2y$10$fYlPq4abgup0ABxbQGCuCeXw9hatVVla4o8/A228Vgo.t/hdlUnVW', 'doviet.ksxd@gmail.com', NULL, '0961173368', NULL, NULL, NULL, NULL, '2016-07-23 08:09:24', 'other', 1, '3zRTm9o75r2aki1Vy5nKlOHcNCmwYQ0clalVopVttBfTLS5PaGtzMGJAdVgE', 'web', 1, 'g6MO1g', NULL, '2016-07-23 01:08:21', '2016-07-23 01:09:24', NULL),
(48, 2, 'nguyenhien1982', '$2y$10$vt70ldZ4VYgUd99zooaaPOm/EVg.vUC0mWm9xEdx.om7YA9sqVooe', 'honghien2502@gmail.com', NULL, '0918251186', NULL, NULL, NULL, NULL, '2016-07-23 09:16:26', 'other', 1, '9761LoKLiDh9oKgn2Y7J1PJHETCCxYwdzqt9t8kG6WJMSzrpFvkB2YsSkihi', 'web', 1, 'hGUSad', NULL, '2016-07-23 02:14:41', '2016-07-23 02:16:26', NULL),
(49, 2, 'mrtien0499', '$2y$10$U7Whh56WCjor5SOrNg2WtuYPYjLiqNLcU4oqlbDKycyud7qiT7RxC', 'mrtien0499@gmail.com', NULL, '0961192325', NULL, NULL, NULL, NULL, '2016-07-23 13:37:11', 'other', 1, 'YKru7QHr9FpXRcImDxDLfUahNEVtnLonZWheDjdtnhC0YDmDAFD2vFJan8tu', 'web', 1, 'iVnFbo', NULL, '2016-07-23 06:32:46', '2016-07-23 06:37:11', NULL),
(50, 2, 'painttc', '$2y$10$aZ4oiYRyu/Hrnf2RRdzc.OpZA6q5ElcpIbymFv.uMfGyrXv6N1V/u', 'danganhtuan1908@gmail.com', NULL, '0944560368', NULL, NULL, NULL, NULL, '2016-07-24 01:34:20', 'other', 1, 'fr04dXZ3ehOcH4Kb7Tki9WNMxd1KpW4VP06pw5j37PIcZFs4hc1q5KlhpOG7', 'web', 1, 'Jvhd5T', NULL, '2016-07-23 18:33:12', '2016-07-23 18:34:20', NULL),
(51, 2, 'cuong.vp.nuce', '$2y$10$miLg/q.vnwLPYO4wHrqE.e2oIdTcC71ndscPjv/5IfQrb0j9IkohC', 'cuong.vp.nuce@gmail.com', NULL, '0987399237', NULL, NULL, NULL, NULL, '2016-07-24 02:10:53', 'other', 1, 'gkKqNo1GI1OZGKpTXAPf41HsFpiGpJhCWwK3ocGF5N9riaaBydhFRj0KQhxc', 'web', 1, 'e4yYom', NULL, '2016-07-23 19:10:11', '2016-07-23 19:10:53', NULL),
(52, 2, 'Mokatori Vo', '$2y$10$blpOa/W42A3PnDtYcOZgSuLuXJjCisKRnFSEm8WFOFIEM6g4GGPte', 'vooanh32bkdn@gmail.com', NULL, '1656874814', NULL, NULL, NULL, NULL, '2016-07-24 02:50:24', 'other', 1, '0RpRDqTPoN23HEbts2DEomyIYSyXriEQB5IC6mGEENcUEMBoC0u7Eri9fKFB', 'web', 1, 'xZ3Ue1', NULL, '2016-07-23 19:45:43', '2016-07-23 19:50:24', NULL),
(53, 2, 'Vo Oanh', '$2y$10$PuXoqy/90A2ItnDwLAk0n.6eNLJEjEtzbwZQuFpiJpXGajiHpwWp2', 'vooanh3295@gmail.com', NULL, '1656874814', NULL, NULL, NULL, NULL, NULL, 'other', 0, NULL, 'web', 0, 'tUd5k3', NULL, '2016-07-23 19:48:45', '2016-07-23 19:48:45', NULL),
(54, 2, 'Daicapmu', '$2y$10$H0mLEaycbRq9/aFDVwfaxOW3eCiFzsrjfRKzVYcvqa5TqM7/6mGYG', 'daicapmu45@gmail.com', NULL, '0913668923', NULL, NULL, NULL, NULL, '2016-07-24 02:50:25', 'other', 1, 'QD2vtLrYC3P5NBcFTQHkmNPcZlMmzOMdwtE55b4aI6b6fpMdzFXarkbD8jA3', 'web', 1, 'NqtmCm', NULL, '2016-07-23 19:48:46', '2016-07-23 19:50:25', NULL),
(55, 2, 'thuyctxd27', '$2y$10$/Pk.KLjBT0ThHCbVlLcCRuVhwT/jgD6sOqmN4AMmpXKf2vzuPkGju', 'hatang27@gmail.com', NULL, '0949702037', NULL, NULL, NULL, NULL, '2016-07-24 03:36:41', 'other', 1, 'qWuufhWphKiBI3bBdnly1MXZj2v0tYz6lHO9i4fZymN76HjbmC4aQDESdReN', 'web', 1, 'n7Syho', NULL, '2016-07-23 19:53:43', '2016-07-23 20:36:41', NULL),
(56, 2, 'hoanghakx', '$2y$10$4EafbwAElcCHd3MdulPcMeZoY3.kD3zwACHT0LKKgOnbMtUKOcLqC', 'tranvantuan3014@gmail.com', NULL, '0987180287', NULL, NULL, NULL, NULL, NULL, 'other', 0, NULL, 'web', 0, '3U76j1', NULL, '2016-07-23 20:10:44', '2016-07-23 20:10:44', NULL),
(57, 2, 'Hongle', '$2y$10$1zAArPY9NtGHEBk1sNIBLutCflOdwpkrUplQXWR8DcgM0pMmAnCpq', 'honglemc@gmail.com', NULL, '0963631658', NULL, NULL, NULL, NULL, '2016-07-24 06:33:12', 'other', 1, 'NVPqQT52RW5sCGhT7gpOGYxbdjx8skLE9dKTStSMfGi3yYb6TaEj2lURAvu1', 'web', 1, '5vpGly', NULL, '2016-07-23 23:29:21', '2016-07-23 23:33:12', NULL),
(58, 2, 'Minh Điền', '$2y$10$d2XDWpVjP9kAq0Pzicsi4Oodq/vk8eIOJVtEfMOXjFofOEozU47Hu', 'nobita87_timxuka9x@yahoo.com', NULL, '0972756463', NULL, NULL, NULL, NULL, NULL, 'other', 0, NULL, 'web', 0, 'gNibRt', NULL, '2016-07-24 08:38:49', '2016-07-24 08:38:49', NULL),
(59, 2, 'Vy Sứt', '$2y$10$u.h5u59aKWI8rFv7GsN23epz6Vb7Jqj/4A7Uvpy07GawE/sioGA1e', 'nguyenvy.ftu@gmail.com', NULL, '0936312989', NULL, NULL, NULL, NULL, '2016-07-25 01:58:09', 'other', 1, '7m3xLRXy62Aiq1WoLQFNRUqrrCmviATOJesaPm9OUqwKR8DKPhRdVjuqJ8Dp', 'web', 1, 'OIsCe0', NULL, '2016-07-24 09:59:07', '2016-07-24 18:58:09', NULL),
(60, 2, 'baqluc', '$2y$10$J9tCGUBaMrYEVehFxOuzMe36tfN.zNZfZ/0Y8wve4gwFB2N.kArku', 'baqluc@gmail.com', NULL, '0917495386', NULL, NULL, NULL, NULL, '2016-07-25 08:17:39', 'other', 1, 'AUY23gR0NoX3SaI4F02bKfMGpZlcIvTxedEzE0Dh8fsf5XlMpCEQuzRE1CxH', 'web', 1, 'uiW0Dw', NULL, '2016-07-25 01:15:17', '2016-07-25 01:17:39', NULL),
(61, 2, 'viethuy', '$2y$10$t.iQT3ey/bnZW/w74yHdEeIqUoNc3YwYQnAsm5xjvY3l3w6YtnWVO', 'viethuyutc@gmail.com', NULL, '0978862973', NULL, NULL, NULL, NULL, '2016-07-25 09:57:13', 'other', 1, 'Sn22HKKmGNqTSn32oYeF3PDRVYJjWRhSMmW9W0FsHsvVNkqLDD3sBWtN5gGo', 'web', 1, 'e1k5u1', NULL, '2016-07-25 02:56:26', '2016-07-25 02:57:13', NULL),
(62, 2, 'duchanh1992', '$2y$10$/6sNiAyxDMbKXdJpmxCwGurpH/MyDXsnNP2wocu8cPfqW1g6FPw72', 'duchanhktxd@gmail.com', NULL, '0978610192', NULL, NULL, NULL, NULL, '2016-07-25 11:01:57', 'other', 1, 'UIXowbdR6uy8A7zM3QxpDMFwTDYEbwAqly5L3sRUQFQKj9jYYQrd3RLreAfa', 'web', 1, 'zdUp1L', NULL, '2016-07-25 04:01:27', '2016-07-25 04:01:57', NULL),
(63, 2, 'thutra08', '$2y$10$W0Bdx3LRtdz8hQ/hAeZlA.5g.0aWP4YdmUibm.Pyl1SbsPzaRqhe.', 'thutra08cpa@gmail.com', NULL, '0982465147', NULL, NULL, NULL, NULL, '2016-07-26 01:30:52', 'other', 1, NULL, 'web', 1, 'UhSmZk', NULL, '2016-07-25 07:46:03', '2016-07-25 18:30:52', NULL),
(64, 2, 'chanhbem', '$2y$10$qdmjT209/ifZJQxj2MNexeC4TaSa5E3szcosE8C78fJAMO482.NuK', 'ngoquatchanh@gmail.com', NULL, '0943710693', NULL, NULL, NULL, NULL, '2016-07-25 16:25:13', 'other', 1, 'NBX2TdorxdGBBim2VMBOpMZX1E1ZIEsbbr34iGFO5bpJTq3zE6bZit0iKn8H', 'web', 1, 'y5c0m8', NULL, '2016-07-25 09:23:05', '2016-07-25 09:25:13', NULL),
(65, 2, 'Nguyễn Thanh Ngân', '$2y$10$JAm1ZpzXrzrtJAlH2UE42uJrI/UGHKq9oZYW1nO2u4a3YcAf.OVZm', 'nguyenthanhngan.gt@gmail.com', NULL, '0983663135', NULL, NULL, NULL, NULL, NULL, 'other', 0, NULL, 'web', 0, '0522k8', NULL, '2016-07-25 19:10:30', '2016-07-25 19:10:30', NULL),
(66, 2, 'ngotienmanh', '$2y$10$v4Uhl1gBvh/pcC.6O6AlNuAlSIjdv1K3uX9ccRKoieQBxIyj5M00S', 'manhnt23@wru.vn', NULL, '0963080794', NULL, NULL, NULL, NULL, '2016-07-26 03:14:12', 'other', 1, 'gMiGibf8EIUn0ntkugaqWeW5nyMH1Zny1RNlJYgUmSQbsnoIa3IAVxdfySII', 'web', 1, '0JXSy1', NULL, '2016-07-25 20:10:20', '2016-07-25 20:14:12', NULL),
(67, 2, 'darlingpham@gmail.com', '$2y$10$EMoRH6PK23oVdOhk76AVIOhlLt3HoYrjminRa.yjbwri76sQQTUqW', 'darlingpham@gmail.com', NULL, '0944772118', NULL, NULL, NULL, NULL, '2016-07-26 04:03:24', 'other', 1, NULL, 'web', 1, 'o2FF0i', NULL, '2016-07-25 21:02:20', '2016-07-25 21:03:24', NULL),
(68, 2, 'Pham Nghia', '$2y$10$ftB.lpPwA.2LL62pssqLv.ftShiJ8APxqWoIXs1428S8uFVvykCDa', 'phamthainghiacb3@gmail.com', NULL, '0937985686', NULL, NULL, NULL, NULL, '2016-07-26 08:46:50', 'other', 1, 'RvtG5aLNfzdw37yLEsnFHWEdZUFQdPnibQQmHFKjScUtunTstw1FQWyFljJv', 'web', 1, 'tXXLIl', NULL, '2016-07-26 01:45:13', '2016-07-26 01:46:50', NULL),
(69, 2, 'huytl1984', '$2y$10$TqQZR5MnLDit4HG/R5d/I.3JISStbd8Ju7/fnDvHsxKsGiJ2upk6i', 'duchuy8000@gmail.com', NULL, '0907855936', NULL, NULL, NULL, NULL, '2016-07-26 10:11:10', 'other', 1, 'i6TYDqxbsG2aoH1V6LgDnZpN28VL8ARsgwnO6LwzATh4YZPUXn7kMdFPgoai', 'web', 1, 'XFrKv9', NULL, '2016-07-26 03:09:37', '2016-07-26 03:11:10', NULL),
(70, 2, 'khietnt', '$2y$10$MHTKRmjmtmxOtOcezTH/MODtlGkJS7oaCPrSTrIK7DKMAfTQKbIZq', 'asco@asco.vn', NULL, '0964225555', NULL, NULL, NULL, NULL, NULL, 'other', 0, NULL, 'web', 0, 'YZsLp5', NULL, '2016-07-26 08:45:19', '2016-07-26 08:45:19', NULL),
(71, 2, 'Phamtuyenkx1', '$2y$10$4U.iww5dqyhna0Xz5wmTre6opG4LM8o2xGmlwWOQyVXMs/k/VWzXC', 'Phamtuyenkx1@gmail.com', NULL, '0965483231', NULL, NULL, NULL, NULL, '2016-07-26 15:53:30', 'other', 1, 'UeChgqf8tlpjx88e01tQEESIQvWiWHmg0I2ErsPbCv99ZfLPVqmI90uLCRnX', 'web', 1, 'qedCNs', NULL, '2016-07-26 08:52:12', '2016-07-26 08:53:30', NULL),
(72, 2, 'khanhlacson', '$2y$10$8mDbK3J1cPgvuDi.aIiewO5Q6c1Ebdm7x8LgQIp0QYg2/8UihCXtG', 'khanhlacson@gmail.com', NULL, '0978944668', NULL, NULL, NULL, NULL, '2016-07-27 00:55:22', 'other', 1, 'l8O3Yt5EkqeQ586tKHsmqaMinZOkzuatOjTLDoXPVY4bJF49Hi6DUSwy3RJC', 'web', 1, 'FWpR1S', NULL, '2016-07-26 17:53:24', '2016-07-26 17:55:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_lessons`
--

CREATE TABLE IF NOT EXISTS `users_lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `child_id` int(11) DEFAULT NULL,
  `allow_share` tinyint(4) DEFAULT NULL,
  `note` text,
  `status` enum('inactive','active') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users_lessons`
--

INSERT INTO `users_lessons` (`id`, `user_id`, `lesson_id`, `child_id`, `allow_share`, `note`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 2, 1, '', 'active', NULL, NULL, NULL),
(2, 1, 2, 2, 1, '', 'active', NULL, NULL, NULL),
(3, 11, 3, 4, 1, '', 'active', NULL, NULL, NULL),
(4, 11, 3, 5, 1, '', 'active', NULL, NULL, NULL),
(6, 1, 10, 11, 1, '', 'active', NULL, NULL, NULL),
(7, 1, 6, 11, 1, '', 'active', NULL, NULL, NULL),
(8, 1, 7, 11, 1, '', 'active', NULL, NULL, NULL),
(9, 1, 8, 11, 1, '', 'active', NULL, NULL, NULL),
(10, 1, 9, 11, 1, '', 'active', NULL, NULL, NULL),
(11, 1, 11, 11, 1, '', 'active', NULL, NULL, NULL),
(12, 1, 13, 11, 1, '', 'active', NULL, NULL, NULL),
(13, 11, 43, 1, 1, '', 'active', NULL, NULL, NULL),
(14, 11, 43, 3, 1, '', 'active', NULL, NULL, NULL),
(15, 11, 43, 12, 1, '', 'active', NULL, NULL, NULL),
(16, 11, 43, 14, 1, '', 'active', NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
