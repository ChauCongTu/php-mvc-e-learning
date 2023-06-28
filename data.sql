-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 28, 2023 lúc 06:00 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `elearning`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `created_at`) VALUES
(1, 'Thông báo diễn đàn', '2023-06-13 14:11:30'),
(2, 'Hỏi đáp - thắc mắc', '2023-06-13 14:11:30'),
(3, 'Ngữ pháp tiếng Anh', '2023-06-13 14:11:30'),
(4, 'Kỹ năng đọc &#38; từ vựng tiếng Anh', '2023-06-13 14:11:30'),
(5, 'Kỹ năng nghe nói', '2023-06-13 14:11:30'),
(6, 'Kỹ năng Viết', '2023-06-13 14:11:30'),
(7, 'Góc dịch thuật', '2023-06-13 14:11:30'),
(8, 'Kinh nghiệm học tiếng Anh', '2023-06-13 14:11:30'),
(9, 'Đề thi cuối học kỳ', '2023-06-13 14:11:30'),
(10, 'Luyện thi THPT Quốc Gia', '2023-06-13 14:11:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `likes_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `user_name`, `post_id`, `content`, `created_at`, `updated_at`, `likes_count`) VALUES
(6, 1, 'Châu Quế Nhơn', 1, 'Bài viết rất hay', '2023-05-30 10:17:06', '2023-06-25 10:52:06', 0),
(7, 1, 'Châu Quế Nhơn', 1, 'Bình luận 2 được chỉnh sửa', '2023-05-30 10:56:58', '2023-05-30 11:07:54', 0),
(9, 1, 'Châu Quế Nhơn', 9, 'Về ngữ pháp, đây là dạng đảo ngữ để nhấn mạnh khi đặt Here/ There ở đầu câu: Here/ There + động từ + chủ từ (danh từ).&#13;&#10;Nếu chủ từ là đại từ thì Here/ There + chủ từ + động từ.&#13;&#10;E.g. Here comes the bus!&#13;&#10;Here he comes!', '2023-06-07 10:28:12', '2023-06-07 10:28:12', 0),
(10, 3, 'Lê Văn Đỗ Kỳ', 10, 'Cảm ơn bạn, chia sẻ rất hữu ích', '2023-06-07 10:44:44', '2023-06-07 10:44:44', 0),
(11, 1, 'Châu Quế Nhơn', 13, 'Cảm ơn về chia sẻ', '2023-06-07 11:41:31', '2023-06-07 11:41:31', 0),
(13, 6, 'Lionel Messi', 1, 'Bài viết rất hữu ích, cảm ơn lần 1 ', '2023-06-21 12:02:53', '2023-06-21 12:03:57', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` bit(1) DEFAULT b'0',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `content`, `status`, `created_at`) VALUES
(2, 'Châu Công Tử', 'nhonchau.180502@gmail.com', 'tôi muốn apply vào role Content Manager, tôi muốn giúp đỡ các bạn nhiều hơn.', b'1', '2023-06-28 08:44:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exams`
--

CREATE TABLE `exams` (
  `exam_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `size` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `exams`
--

INSERT INTO `exams` (`exam_id`, `grade`, `title`, `created_at`, `size`, `time`) VALUES
(13, 10, 'Đề thi tiếng Anh 10 #U1', '2023-06-04 04:46:13', 10, 15),
(14, 10, 'Đề thi cuối kỳ tiếng Anh 10 #1', '2023-06-04 10:18:31', 40, 45),
(15, 10, 'Đề thi cuối kỳ tiếng Anh 10 #2', '2023-06-04 10:59:08', 40, 45);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `grammars`
--

CREATE TABLE `grammars` (
  `grammar_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `example` text NOT NULL,
  `define` varchar(255) NOT NULL,
  `sign` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `grammars`
--

INSERT INTO `grammars` (`grammar_id`, `lesson_id`, `title`, `content`, `example`, `define`, `sign`) VALUES
(1, 1, 'Thì hiện tại đơn', '<p>Khẳng định: S + V (thêm \"s/es\" đối với chủ ngữ số ít ở ngôi thứ 3) + O</p><p>Phủ định: S + do/does not + V + O</p><p>Nghi vấn: Do/Does + S + V + O?</p>', '<p>- I love pizza. (Tôi thích pizza)<br>- They usually go to the gym in the morning. (Họ thường đi tập thể dục vào buổi sáng)<br>- The sun rises in the east. (Mặt trời mọc ở phía đông)<br>&nbsp;</p>', '<p>Thì hiện tại đơn được sử dụng để diễn tả sự việc cố định, hiển nhiên trong hiện tại, hoặc sự thật khách quan. Thường được sử dụng trong các miêu tả chung về hành động hoặc sự kiện.</p>', '<p>- Thường sử dụng để diễn tả sự thật hiển nhiên, hiện tại.<br>- Sử dụng các trạng từ chỉ tần suất (always, never, seldom, rarely, often, usually).<br>- Sử dụng các trạng từ chỉ thời gian (every day, every week, every month, etc.).</p>'),
(2, 1, 'Thì hiện tại tiếp diễn', '<p>Khẳng định: S + am/is/are + V-ing + O</p>\r\n<p>Phủ định: S + am/is/are not + V-ing + O</p>\r\n<p>Nghi vấn: Am/Is/Are + S + V-ing + O</p>', '- I am currently writing an email. (Tôi đang viết một email)<br/>\r\n- She is always studying hard for exams. (Cô ấy luôn học chăm chỉ để chuẩn bị cho kỳ thi)<br/>\r\n- We are planning to go on a trip next week. (Chúng tôi đang lên kế hoạch để đi du lịch vào tuần tới)', 'Thì hiện tại tiếp diễn thường được sử dụng để diễn tả hành động đang diễn ra tại thời điểm nói hoặc các hành động đang được tiếp diễn trong thời gian gần đây.', '- Thông tin mô tả hành động đang diễn ra tại thời điểm nói.<br/>\r\n- Sử dụng các trạng từ chỉ tần suất (always, constantly) để diễn tả hành động lặp đi lặp lại.<br/>\r\n- Sử dụng để miêu tả hành động đã được lên kế hoạch và sẽ được thực hiện trong khoảng thờ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lessons`
--

CREATE TABLE `lessons` (
  `lesson_id` int(11) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `grade` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lessons`
--

INSERT INTO `lessons` (`lesson_id`, `thumb`, `title`, `content`, `created_by`, `created_at`, `grade`, `updated_at`) VALUES
(1, 'unit-1-grade-10.jpg', 'Unit 1: Family Life', '<h3><strong>I. B&agrave;i tập th&igrave; hiện tại đơn</strong></h3>\r\n\r\n<p><strong>1.&nbsp;Chia c&aacute;c động từ trong ngoặc dưới dạng đ&uacute;ng ở th&igrave; hiện tại đơn.</strong></p>\r\n\r\n<p>1. Linh (work) ________ in a hospital.</p>\r\n\r\n<p>2. Cat (like) ________ fish.</p>\r\n\r\n<p>3. Myan (live)________ in California.</p>\r\n\r\n<p>4. It (rain)________ almost every afternoon in French.</p>\r\n\r\n<p>5. My son (fry)________ eggs for breakfast everyday.</p>\r\n\r\n<p>6. The museum (close)________ at 8 pm.</p>\r\n\r\n<p>7. He (try)________ hard in class, but I (not think) ________ he&#39;ll pass.</p>\r\n\r\n<p>8. My sister is so smart that she (pass)________ every exam without even trying.</p>\r\n\r\n<p>9. Your life (be)_____ so boring. You just (watch)________ TV everyday.</p>\r\n\r\n<p>10. His girlfriend (write)________ to him two times a week.</p>\r\n\r\n<p>11. You (speak) ________ English?</p>\r\n\r\n<p>12. She (not live) ________ in Ho Chi Minh city.</p>\r\n\r\n<p><strong>2.&nbsp;Điền v&agrave;o chỗ trống dạng đ&uacute;ng của động từ tobe</strong></p>\r\n\r\n<p>1. His cat __________small.</p>\r\n\r\n<p>2. Linh ________ a student.</p>\r\n\r\n<p>3. They _________ready to get a pet.</p>\r\n\r\n<p>4. My life _____ so boring. I just watch TV every night.</p>\r\n\r\n<p>5. Her husband________from China. She _______from Viet Nam.</p>\r\n\r\n<p>6. They ____________ (not/be) late.</p>\r\n\r\n<p>7. I and my sister (be)________ good friends.</p>\r\n\r\n<p>8. ___________ (she/be) a doctor?</p>\r\n\r\n<p>9. Her sister(be) _________ 9 years old.</p>\r\n\r\n<p>10.&nbsp;Max and Lan (be)__________my cats.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>II. B&agrave;i tập th&igrave; hiện tại tiếp diễn</strong></h3>\r\n\r\n<p><strong>1.&nbsp;Ho&agrave;n th&agrave;nh những c&acirc;u dưới đ&acirc;y.</strong></p>\r\n\r\n<p>1. It (get) ___________ dark. Shall I turn on the light?</p>\r\n\r\n<p>2. You (make) _________ a lot of noise. Could you be quieter? I (try) __________ to concentrate.</p>\r\n\r\n<p>3. Sue (stay) ____________ at home today.</p>\r\n\r\n<p>4. John and Ed (cycle) ___________ now.</p>\r\n\r\n<p>5. She (not watch) _____________ TV.</p>\r\n\r\n<p>6. I (read) ______________ an interesting book.</p>\r\n\r\n<p>7. The cat (play) __________ with the ball.</p>\r\n\r\n<p>8. The cat (chase) _____________ the mouse.</p>\r\n\r\n<p>9. The students (not be) ____________ in class at present.</p>\r\n\r\n<p>10. They haven&rsquo;t got anywhere to live at the moment. They (live) __________ with friends until they find somewhere.</p>\r\n\r\n<p><strong>2.&nbsp;Đặt c&acirc;u hỏi với những từ cho sẵn</strong></p>\r\n\r\n<p>1. Collin/ work/ this week?</p>\r\n\r\n<p>_______________________________________</p>\r\n\r\n<p>2. what/ you/ do?</p>\r\n\r\n<p>_______________________________________</p>\r\n\r\n<p>3. Jel/ drink/ tea/ now?</p>\r\n\r\n<p>_______________________________________</p>\r\n\r\n<p>4. Why/ you/ look/ at/ me/ like that?</p>\r\n\r\n<p>_______________________________________</p>\r\n', '1', '2023-05-28 11:04:01', 10, '2023-06-28 09:41:11'),
(2, 'unit-2-humans-and-the-enviroment.png', 'Unit 2: Humans and The Enviroment', '', '1', '2023-05-28 11:08:31', 10, '2023-06-17 08:17:53'),
(3, 'unit-3-music.png', 'Unit 3: Music', '', '1', '2023-05-28 11:08:31', 10, '2023-06-17 08:18:54'),
(4, 'unit-4-for-a-better-community.png', 'Unit 4: For a better community', '', '1', '2023-05-28 11:08:31', 10, '2023-06-17 08:20:47'),
(5, 'unit-5-inventions.png', 'Unit 5: Inventions', '', '1', '2023-05-28 11:08:31', 10, '2023-06-17 08:20:57'),
(6, 'unit-6-gender-equality.png', 'Unit 6: Gender equality', '', '1', '2023-05-28 11:08:31', 10, '2023-06-17 08:33:53'),
(7, 'unit-7-vietnamese-and-international-organisations.png', 'Unit 7: Vietnamese and international organisations', '', '1', '2023-05-28 11:08:31', 10, '2023-06-17 08:43:55'),
(8, 'unit-8-new-way-to-learn.png', 'Unit 8: New way to Learn', '', '1', '2023-05-28 11:08:31', 10, '2023-06-17 08:39:57'),
(9, 'unit-9-protecting-the-enviroment.png', 'Unit 9: Protecting the Enviroment', '', '1', '2023-05-28 11:08:31', 10, '2023-06-17 08:42:09'),
(10, 'unit-10-ecotourism.png', 'Unit 10: Ecotourism', '', '1', '2023-05-28 11:08:31', 10, '2023-06-17 08:41:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lesson_saved`
--

CREATE TABLE `lesson_saved` (
  `saved_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `lesson_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lesson_saved`
--

INSERT INTO `lesson_saved` (`saved_id`, `user_id`, `lesson_id`, `created_at`) VALUES
(5, 1, 4, '2023-06-26 10:34:28'),
(6, 1, 10, '2023-06-26 10:34:32'),
(8, 2, 1, '2023-06-26 10:45:43'),
(9, 2, 3, '2023-06-26 10:50:56'),
(10, 2, 4, '2023-06-26 10:51:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `view` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `category_id`, `title`, `content`, `created_at`, `updated_at`, `view`) VALUES
(1, 1, 3, 'Cách tra từ điển Anh - Việt đúng cách và hiệu quả', '<p>Một trong những c&ocirc;ng cụ kh&ocirc;ng thể thiếu trong việc hỗ trợ người Việt trong qu&aacute; tr&igrave;nh học Tiếng Anh đ&oacute; ch&iacute;nh l&agrave; từ điển. Với từ điển, ta c&oacute; thể dễ d&agrave;ng tra cứu được nghĩa của từ cần tra v&ocirc; c&ugrave;ng nhanh v&agrave; ch&iacute;nh x&aacute;c. Nhưng c&oacute; phải từ điển chỉ d&ugrave;ng để tra mỗi từ vựng hay kh&ocirc;ng? Nếu biết c&aacute;ch sử dụng từ điển th&ocirc;ng minh v&agrave; hiệu quả th&igrave; người học sẽ c&oacute; thể học được th&ecirc;m những th&ocirc;ng tin th&uacute; vị kh&aacute;c cũng như c&aacute;c ngữ ph&aacute;p bổ &iacute;ch trong qu&aacute; tr&igrave;nh học Tiếng Anh đấy. H&ocirc;m nay, h&atilde;y c&ugrave;ng&nbsp;t&igrave;m hiểu&nbsp;đ&uacute;ng c&aacute;ch nh&eacute;!<br />\r\n&nbsp;</p>\r\n\r\n<p>]<img alt=\"\" src=\"https://lh4.googleusercontent.com/GeKKJhWq15fcGqRQnv7VTXvKE6w4Cu1AP0juS-Kj2X061A6J_V3jkT_UWuGyb6FUhg8Z8LRSHZx-Q8KXIyQndl0JnX0v0YD5rJwc4sbUzZT1gG_3Otj_zJvnClWaUv-QjuLGiDIJUlOecNGNudoS0jE4-gJCsvrOzftXhVzEWit4NoWeuIDNyRMy1g\" /></p>\r\n\r\n<p><strong>1. Lựa chọn đ&uacute;ng loại từ điển</strong><br />\r\n<br />\r\nTrước khi đến với c&aacute;ch tra từ điển Anh Việt đ&uacute;ng c&aacute;ch, c&aacute;c bạn phải biết chọn đ&uacute;ng loại từ điển để sử dụng trước. Kh&ocirc;ng phải từ điển n&agrave;o cũng c&oacute; nội dung v&agrave; chất lượng giống nhau n&ecirc;n c&aacute;c bạn phải t&igrave;m hiểu thật kỹ trước khi sử dụng bất kỳ loại từ điển n&agrave;o tr&ecirc;n thị trường. Tiếng Anh Tốt sẽ chia sẻ đến c&aacute;c bạn 5 loại từ điển ch&iacute;nh phổ biến nhất b&ecirc;n cạnh c&aacute;c từ điển chuy&ecirc;n ng&agrave;nh ngay b&acirc;y giờ nh&eacute;.<br />\r\n<br />\r\n<strong>a. Oxford Anh - Việt</strong><br />\r\n&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://lh5.googleusercontent.com/uGYXg112SM75YrZfv0a2LzrWNWVwC_P5nsWT-fLCAbd-Ls2Kc6ck28YCT_tEK0S2VyK-npJcMDtkb4ap82wxwBJcwOXmT_3i6MkDdNQflvHDJSxrlCdYuTSc8_Ynr9eBzW5NfRcnP_6AtJDMUSpkUKJ6Fd-KHZQaSeuXL6bboi8KcfQI1hsFpxiZtg\" /></p>\r\n\r\n<p>Nếu lượng từ vựng Tiếng Anh của bạn chưa thực sự tốt, hoặc bạn l&agrave; người mất gốc cần bắt đầu học lại từ đầu th&igrave; đ&acirc;y ch&iacute;nh l&agrave; từ điển l&yacute; tưởng d&agrave;nh cho bạn. Để c&oacute; thể dịch quyển từ điển một c&aacute;ch dễ hiểu v&agrave; ch&iacute;nh x&aacute;c nhất, nh&agrave; xuất bản của Oxford đ&atilde; kết hợp v&agrave; l&agrave;m việc với nhiều nh&agrave; ng&ocirc;n ngữ học người Việt Nam n&ecirc;n bạn ho&agrave;n to&agrave;n c&oacute; thể y&ecirc;n t&acirc;m về mặt nội dung.<br />\r\n<br />\r\n<strong>b. Oxford Wordpower 4th Dictionary</strong><br />\r\n&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://lh6.googleusercontent.com/cZYVo6w3QdJllUCDMy4Vi72Zdkdm0yVxhEGzjWqgG8qjfZYJhwSoCPBAhqNGxxV_FvtoeltbREPCgw9c--uYyWV4eB6-OOydQRY11xwY-uK3Ls-NYpLFyNjk2ODUqjWTUm8TaSemtigMn8K5EuEOBM5D0-YAPR10LMVH8P7v75V0529jJXc9FaTtmg\" /></p>\r\n\r\n<p>Được đ&aacute;nh gi&aacute; l&agrave; quyển từ điển đồ sộ nhất trong c&aacute;c ấn phẩm từ điển của nh&agrave; xuất bản Oxford, người học Tiếng Anh c&oacute; lẽ sẽ v&ocirc; c&ugrave;ng h&agrave;i l&ograve;ng với việc được n&acirc;ng cấp từ vựng một c&aacute;ch chi tiết, r&otilde; r&agrave;ng nhất. Kh&ocirc;ng chỉ đơn thuần l&agrave; n&ecirc;u nghĩa của từ, nh&agrave; xuất bản c&ograve;n giải th&iacute;ch &yacute; nghĩa của từng từ vựng cặn kẽ v&agrave; tỉ mỉ khiến quyển từ điển n&agrave;y lu&ocirc;n được đ&ocirc;ng đảo người học Tiếng Anh săn đ&oacute;n.<br />\r\n<br />\r\n<strong>c. Oxford Learner&rsquo;s Thesaurus Dictionary</strong><br />\r\n<br />\r\n<img alt=\"\" src=\"https://lh5.googleusercontent.com/FLav2K86HJKE1yQSOWqOHHygQKGgw2-btHq1dAdVENiXtrmInKxYNXD3IfhZtUf7gDNsZk1ugGTqp4BPrsjWPlgvQgU5ELu6WTH7PoZF4iPz_jzsQHAyrJn-jXe28dbCwV2YILtuyaaJl7cQPsmZ0Yb03THgHMKnzZdHjOM-VBVdb2ZpLLGJXKcplA\" /><br />\r\nNếu bạn đang t&igrave;m kiếm một quyển từ điển để tra cứu từ đồng nghĩa v&agrave; tr&aacute;i nghĩa th&igrave; đ&acirc;y ch&iacute;nh l&agrave; sự lựa chọn v&ocirc; c&ugrave;ng đ&uacute;ng đắn. Quyển từ điển n&agrave;y kh&ocirc;ng những gi&uacute;p bạn ph&acirc;n biệt c&aacute;c từ đồng nghĩa qua c&aacute;c v&iacute; dụ minh họa cụ thể m&agrave; c&ograve;n gi&uacute;p bạn biết được c&aacute;ch sử dụng c&aacute;c từ đồng nghĩa đ&oacute; trong những ngữ cảnh n&agrave;o nữa đấy.<br />\r\n<br />\r\n<strong>d. Oxford Learner&rsquo;s Pocket Dictionary</strong><br />\r\n&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://lh5.googleusercontent.com/K6-X0q9NRYGRCpAfgPYDWpmhfdz1NVVZQpRO0oOhTX-VT6E7sEhyaIrUqi6OtM5tsFWvkZOhEB0qbuH7VyjkzE8o8-q-XvRT7YJegLLW0V_eQ2dNxpZzKf4yAFSSBaU7KtvyBgjohZycfKWTeDQVvevZ8IMf93hTgoYDxvGC5l0vRICKeGXhRwLDEg\" /></p>\r\n\r\n<p>Với mục đ&iacute;ch mang đến sự thuận tiện nhưng vẫn đảm bảo độ ch&iacute;nh x&aacute;c với người d&ugrave;ng, quyển từ điển n&agrave;y c&oacute; hơn 100.000 từ vựng với c&aacute;c &yacute; nghĩa th&ocirc;ng dụng nhất. Bạn ho&agrave;n to&agrave;n c&oacute; thể mang theo ở bất kỳ l&uacute;c n&agrave;o v&agrave; tra cứu từ m&agrave; bạn bắt gặp ở bất cứ nơi n&agrave;o.<br />\r\n<br />\r\n<strong>e. Oxford Collocations Dictionary</strong><br />\r\n<br />\r\n<img alt=\"\" src=\"https://lh6.googleusercontent.com/S8PDpaKJrpvmmjp4BrVx_T8RgNNP48q3BApvKWRlikYSGfXdaB1FRPvcqylaU3VIPBIdG3R-HuBG9Zz9EXlEMG_6OtcswlHAFet7ye4BOXtWp_0d7rHyxMqQy9R857Vrvp_OjzIDHX1On7DHyy3R62Rm9Fe5iI867mJwtWvF9N_ubKpJnb3mgSNqBg\" /><br />\r\nQuyển từ điển n&agrave;y ra đời d&agrave;nh cho c&aacute;c bạn c&oacute; &yacute; định &ocirc;n thi c&aacute;c kỳ thi TOEIC/TOEFL/IELTS, bạn c&oacute; thể học được những từ hoặc cụm từ giống người bản ngữ v&agrave; sử dụng ch&uacute;ng được hay hơn v&agrave; tự nhi&ecirc;n hơn.<br />\r\n<br />\r\n<strong>2. Hiểu được c&aacute;c k&yacute; tự viết tắt trong từ điển</strong><br />\r\n<br />\r\nNếu kh&ocirc;ng hiểu được c&aacute;c từ viết tắt trong từ điển th&igrave; c&ocirc;ng dụng của việc tra cứu từ điển đ&atilde; giảm hiệu quả một nửa rồi. Vậy n&ecirc;n c&aacute;c bạn nhất định phải ghi nhớ v&agrave; biết được &yacute; nghĩa của c&aacute;c từ viết tắt trong từ điển nh&eacute;.<br />\r\n&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://lh6.googleusercontent.com/6ysEOHka_-lwjwLIkzJnFdcKcsBxWNsxwSJU2BfKjzGMYIQHMmTHmBTQCFvokvdKfd40kzenSkh1oszqMg0lIyCHO-M4JTOqV1oqwvLzoS8ppGTy9PGpMlMwC7bu_5Dqq94o3P1esylBa3BLx5VXCEESjYVQpro-1cEEtMWjOs7FnkbDoUOjE69frw\" /></p>\r\n\r\n<p><strong>3. Kh&ocirc;ng qu&ecirc;n học c&aacute;ch ph&aacute;t &acirc;m</strong><br />\r\n<br />\r\nĐa số người d&ugrave;ng từ điển thường chỉ tra nghĩa của từ vựng m&agrave; &iacute;t ch&uacute; &yacute; đến việc tra cả c&aacute;ch ph&aacute;t &acirc;m của từ đ&oacute;. Ngo&agrave;i việc hiểu nghĩa th&igrave; việc ph&aacute;t &acirc;m được từ đ&oacute; đ&uacute;ng cũng v&ocirc; c&ugrave;ng quan trọng n&ecirc;n c&aacute;c bạn h&atilde;y cố gắng nh&igrave;n v&agrave;o phần m&ocirc; tả c&aacute;ch ph&aacute;t &acirc;m sau 2 dấu &ldquo;/&rdquo; v&agrave; x&aacute;c định trọng &acirc;m cũng như c&aacute;ch ph&aacute;t &acirc;m của từ nh&eacute;.<br />\r\n<br />\r\n<strong>4. C&aacute;ch tra từ điển Anh Việt nhanh v&agrave; hiệu quả</strong><br />\r\n<br />\r\nCuối c&ugrave;ng l&agrave; mục đ&iacute;ch ch&iacute;nh của b&agrave;i viết ng&agrave;y h&ocirc;m nay. C&aacute;c bạn h&atilde;y c&ugrave;ng l&agrave;m theo c&aacute;c gợi &yacute; sau để c&oacute; thể &aacute;p dụng được c&aacute;ch tra từ điển Anh Việt đ&uacute;ng c&aacute;ch nh&eacute;.<br />\r\n<br />\r\n<strong>a. Tra theo bảng chữ c&aacute;i alphabet</strong><br />\r\n<br />\r\nChắc hẳn c&aacute;ch tra từ n&agrave;y ai cũng đ&atilde; biết v&agrave; nằm l&ograve;ng rồi. Quyển từ điển n&agrave;o cũng được thiết kế theo bố cục thứ tự từ A &rarr; Z n&ecirc;n c&aacute;c bạn c&oacute; thể tiết kiệm được thời gian tra từ bằng c&aacute;ch d&ugrave;ng giấy note v&agrave; d&aacute;n v&agrave;o từng chữ c&aacute;i bắt đầu c&aacute;c từ vựng đ&oacute;. &Agrave;, h&atilde;y đảm bảo rằng bạn thuộc cả bảng chữ c&aacute;i nữa th&igrave; việc tra từ cũng sẽ dễ d&agrave;ng hơn rất nhiều đấy.<br />\r\n<br />\r\n<strong>b. Để &yacute; giới hạn từ của mặt giấy đ&oacute;.</strong><br />\r\n<br />\r\nGiới hạn từ l&agrave; hai từ được hiển thị ở g&oacute;c tr&ecirc;n c&aacute;c trang, những từ n&agrave;y sẽ gi&uacute;p bạn nắm r&otilde; được loại từ c&oacute; trong trang đ&oacute; v&agrave; t&igrave;m kiếm từ nhanh hơn.<br />\r\n&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://lh6.googleusercontent.com/J_rPirxVS2zA8x3IP-LgGMYNB8oS4ffULWpNHEyAB6x1IfWsAjV4UuAz8bNwceWIu1kctmr4-Zw9HmDPRsk0Slf2DDESht39-3md8MXHMlwrKnECbfJ08wmwq8YJ62FFCWC8ChZDS1hvQk6SxqV8i1GYVd7zv1i27EK59zrnX_jkq1aywB-uUA4BZw\" /></p>\r\n\r\n<p><strong>c. Đọc nghĩa thật kỹ</strong><br />\r\n<br />\r\nSau khi đ&atilde; ho&agrave;n th&agrave;nh c&aacute;c bước tr&ecirc;n, c&ocirc;ng đoạn cuối c&ugrave;ng của c&aacute;c bạn ch&iacute;nh l&agrave; đọc hiểu nghĩa của từ c&aacute;c bạn vừa tra. Gợi &yacute; nho nhỏ l&agrave; nếu c&aacute;c bạn sử dụng th&ecirc;m từ điển Anh-Anh sẽ gi&uacute;p c&aacute;c bạn tư duy về nghĩa của từ vựng tốt hơn rất nhiều so với việc chỉ đọc nghĩa tiếng Việt cho sẵn ở từ điển Anh - Việt đấy.<br />\r\n<br />\r\n<strong>5. Lời Kết</strong><br />\r\n<br />\r\nVậy l&agrave;&nbsp;ch&uacute;ng m&igrave;nh&nbsp;đ&atilde; chia sẻ xong đến c&aacute;c bạn c&aacute;ch tra từ điển Anh Việt để phục vụ c&ocirc;ng việc học Tiếng Anh của c&aacute;c bạn trở n&ecirc;n dễ d&agrave;ng v&agrave; nhanh ch&oacute;ng hơn. Nếu thấy b&agrave;i viết của ch&uacute;ng m&igrave;nh hữu &iacute;ch cho việc học của c&aacute;c bạn, đừng qu&ecirc;n để lại comment ph&iacute;a dưới v&agrave; chia sẻ b&agrave;i viết n&agrave;y đến mọi người xung quanh nh&eacute;! Ch&uacute;c c&aacute;c bạn học Tiếng Anh thật tốt!</p>\r\n', '2023-05-28 13:25:42', '2023-06-24 12:45:42', 0),
(5, 1, 3, 'Mẹo sau để có cách học ngữ pháp Tiếng Anh chuẩn', '<p>So với c&aacute;c đoạn hội thoại Tiếng Anh giao tiếp đầy th&uacute; vị, học ngữ ph&aacute;p Tiếng Anh đ&ocirc;i khi sẽ khiến bạn nh&agrave;m ch&aacute;n v&agrave; dễ d&agrave;ng bỏ cuộc. Tuy vậy, ngữ ph&aacute;p mang vai tr&ograve; v&ocirc; c&ugrave;ng quan trọng để gi&uacute;p bạn th&agrave;nh thạo Tiếng Anh một c&aacute;ch to&agrave;n diện ở c&aacute;c kỹ năng như viết, đọc hiểu v&agrave; giao tiếp Tiếng Anh thật ch&iacute;nh x&aacute;c. Vậy l&agrave;m thế n&agrave;o để c&oacute; c&aacute;ch học ngữ ph&aacute;p Tiếng Anh chuẩn, &ldquo;bỏ t&uacute;i&rdquo; ngay 13 mẹo sau đ&acirc;y!<br />\r\n<strong>1. Ghi nhớ 3 quy tắc viết hoa cơ bản</strong><br />\r\nBạn đang nghĩ&nbsp;quy tắc viết hoa Tiếng Anh&nbsp;c&oacute; phải qu&aacute; đơn giản để phải lưu &yacute;? Thực tế, c&aacute;ch học ngữ ph&aacute;p Tiếng Anh chuẩn lu&ocirc;n phải bắt đầu với những kiến thức nền tảng v&agrave; viết hoa sai cũng đồng nghĩa với việc ngữ ph&aacute;p của bạn vẫn chưa thực sự ho&agrave;n hảo. Viết hoa đ&uacute;ng sẽ khiến cho b&agrave;i viết của bạn nh&igrave;n được thuận mắt v&agrave; gọn g&agrave;ng, điều n&agrave;y c&ograve;n thể hiện sự chuy&ecirc;n nghiệp khi bạn phải viết c&aacute;c văn bản d&ugrave;ng cho mục đ&iacute;ch kinh doanh hay nghi&ecirc;n cứu học thuật. Ba quy tắc viết hoa căn bản bạn cần ghi nhớ đ&oacute; l&agrave;:<br />\r\n&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Chữ c&aacute;i đầu của từ ở một d&ograve;ng v&agrave; sau dấu chấm c&acirc;u.</li>\r\n	<li>Danh từ chỉ t&ecirc;n ri&ecirc;ng như Microsoft, Disney, thứ trong ng&agrave;y v&agrave; th&aacute;ng trong năm như Monday, Tuesday, December&hellip;</li>\r\n	<li>Danh hiệu v&agrave; viết tắt c&aacute;c danh hiệu như Mr., Mrs., Ms., Miss, Doctor (Dr.), President&hellip;</li>\r\n</ul>\r\n\r\n<p><br />\r\n<br />\r\n<strong>2. Đừng qu&ecirc;n c&aacute;ch sử dụng của I v&agrave; Me</strong><br />\r\nH&atilde;y thử xem bạn c&oacute; thể đo&aacute;n c&acirc;u n&agrave;o sau đ&acirc;y sai?<br />\r\n<br />\r\n<br />\r\nJames and I started school last week.<br />\r\n<br />\r\n<br />\r\nJames and me started school last week.<br />\r\n<br />\r\n<br />\r\nC&acirc;u trả lời đ&uacute;ng l&agrave; v&iacute; dụ đầu ti&ecirc;n. Ở hai mẫu c&acirc;u n&agrave;y, c&aacute;ch sử dụng I v&agrave; me thường dễ g&acirc;y nhầm lẫn cho những người học Tiếng Anh. Theo ngữ ph&aacute;p Tiếng Anh chuẩn, I v&agrave; me c&oacute; chức năng kh&aacute;c nhau v&agrave; kh&ocirc;ng thể sử dụng tương tự như nhau trong một c&acirc;u, với I l&agrave; chủ ngữ v&agrave; me ở vị tr&iacute; t&acirc;n ngữ.<br />\r\n<br />\r\n<br />\r\n<strong>3. Ph&acirc;n biệt Your v&agrave; You&rsquo;re</strong><br />\r\nSử dụng sai your v&agrave; you&rsquo;re c&oacute; lẽ l&agrave; lỗi thường gặp nhất nếu như bạn chưa c&oacute;&nbsp;<a href=\"https://www.twinkl.com.vn/blog/phan-hai-cach-hoc-ngu-phap-tieng-anh-chuan\" target=\"_blank\">c&aacute;ch học ngữ ph&aacute;p Tiếng Anh chuẩn</a>&nbsp;bởi v&igrave; trong khi giao tiếp, những người mới bắt đầu sẽ kh&oacute; nhận ra sự kh&aacute;c nhau. Your l&agrave; từ sở hữu của đại từ you, v&iacute; dụ như:<br />\r\n<br />\r\n<br />\r\nYour meal is ready. (M&oacute;n ăn của bạn đ&atilde; sẵn s&agrave;ng.)<br />\r\n<br />\r\n<br />\r\nYour friends are really nice! (Bạn của bạn thực sự rất tốt!)<br />\r\n<br />\r\n<br />\r\nTrong khi đ&oacute;, you&rsquo;re l&agrave; c&aacute;ch viết tắt của you are v&agrave; are l&agrave; một động từ dạng to-be mang nghĩa &ldquo;l&agrave;&rdquo;:<br />\r\n<br />\r\n<br />\r\nYou&rsquo;re a very good student! (Bạn l&agrave; một học sinh rất giỏi!)<br />\r\n<br />\r\n<br />\r\nBạn sẽ bắt gặp những người học Tiếng Anh hay nhầm lẫn giữa your v&agrave; you&rsquo;re chẳng hạn như viết your wrong thay v&igrave; you&rsquo;re wrong mới l&agrave; cấu tr&uacute;c đ&uacute;ng.<br />\r\n<br />\r\n<strong>4. Đừng nhầm lẫn Their, They&rsquo;re v&agrave; There</strong><br />\r\nMột trường hợp dễ g&acirc;y nhầm lẫn kh&aacute;c giữa đại từ, sở hữu v&agrave; trạng từ. Tương tự như tr&ecirc;n, their l&agrave; dạng sở hữu của they, v&agrave; they&rsquo;re l&agrave; viết tắt của they are.<br />\r\n<br />\r\n<br />\r\nTheir cats were very naughty. (Đ&aacute;m m&egrave;o của họ rất nghịch ngợm).<br />\r\n<br />\r\n<br />\r\nThey&rsquo;re my new neighbours. (Họ l&agrave; những người h&agrave;ng x&oacute;m mới của t&ocirc;i.)<br />\r\n<br />\r\n<br />\r\nThere l&agrave; một trạng từ chỉ nơi chốn hoặc &aacute;m chỉ đồ vật. V&iacute; dụ:<br />\r\n<br />\r\n<br />\r\nYour bags are over there, on the bench. (Mấy c&aacute;i t&uacute;i của bạn ở kia, tr&ecirc;n chiếc ghế d&agrave;i ấy).<br />\r\n<br />\r\n<br />\r\nWhen she got there, he already left. (Khi c&ocirc; ấy đến đ&oacute;, anh ta đ&atilde; rời đi rồi).<br />\r\n<br />\r\n<br />\r\n<strong>5. Lưu &yacute; sự kh&aacute;c nhau giữa Must v&agrave; Have to</strong><br />\r\nĐộng từ khuyết thiếu trong Tiếng Anh được sử dụng trong c&aacute;c ngữ cảnh chỉ khả năng hoặc điều bắt buộc v&agrave; c&aacute;c động từ khuyết thiếu thường gặp đ&oacute; l&agrave; can, may, must, will v&agrave; shall. Must mang &yacute; nghĩa chỉ sử cần thiết phải l&agrave;m hay bắt buộc phải thực hiện điều g&igrave; đ&oacute;.<br />\r\n<br />\r\n<br />\r\nI must take the bus every day at 7 a.m. (T&ocirc;i buộc phải bắt chuyến xe bu&yacute;t h&agrave;ng ng&agrave;y l&uacute;c 7 giờ s&aacute;ng.)<br />\r\n<br />\r\n<br />\r\nShe must know that this is not allowed. (C&ocirc; ấy phải biết l&agrave; điều n&agrave;y kh&ocirc;ng được cho ph&eacute;p).<br />\r\n<br />\r\n<br />\r\nTuy nhi&ecirc;n, have to cũng c&oacute; nghĩa l&agrave; phải l&agrave;m điều g&igrave; đ&oacute;, chẳng hạn như I have to take the bus every day. Vậy đ&acirc;u l&agrave; điểm kh&aacute;c biệt?<br />\r\n<br />\r\n<br />\r\nMust thường được d&ugrave;ng trong ngữ cảnh để chỉ một sự bắt buộc dựa tr&ecirc;n quan điểm c&aacute; nh&acirc;n, c&ograve;n have to l&agrave; được sử dụng khi điều bạn phải l&agrave;m l&agrave; chịu t&aacute;c động từ b&ecirc;n ngo&agrave;i. Tức l&agrave;, nếu bạn n&oacute;i I must do homework th&igrave; nghĩa l&agrave; bản th&acirc;n bạn nghĩ bạn buộc phải l&agrave;m b&agrave;i tập, c&ograve;n nếu d&ugrave;ng I have to do homework, điều n&agrave;y l&agrave; mang nghĩa bạn phải l&agrave;m v&igrave; c&ocirc; gi&aacute;o y&ecirc;u cầu hay cha mẹ y&ecirc;u cầu.<br />\r\n<strong>6. Ph&acirc;n biệt giữa Make v&agrave; Do</strong><br />\r\nNhiều người bắt đầu học Tiếng Anh sẽ cảm thấy kh&oacute; khăn khi ph&acirc;n biệt c&aacute;ch sử dụng của make v&agrave; do v&igrave; kh&ocirc;ng c&oacute; một quy luận cụ thể n&agrave;o. Trong nhiều trường hợp, make được d&ugrave;ng với nghĩa tạo ra, x&acirc;y dựng n&ecirc;n, tạo n&ecirc;n điều g&igrave; đ&oacute;:<br />\r\n<br />\r\n<br />\r\nShe makes dinner for her family. (C&ocirc; ấy l&agrave;m bữa tối cho gia đ&igrave;nh.)<br />\r\n<br />\r\n<br />\r\nI have made this cake for you. (T&ocirc;i đ&atilde; l&agrave;m m&oacute;n b&aacute;nh n&agrave;y cho bạn.)<br />\r\n<br />\r\n<br />\r\nMặt kh&aacute;c, do thường được sử dụng như một động từ với một h&agrave;nh động hay hoạt động theo sau.<br />\r\n<br />\r\n<br />\r\nI like to do some morning exercises before going to work. (T&ocirc;i th&iacute;ch tập v&agrave;i b&agrave;i thể dục trước khi đi l&agrave;m.)<br />\r\n<br />\r\n<br />\r\nLet&rsquo;s do some sport today! (H&atilde;y chơi thể thao ng&agrave;y h&ocirc;m nay).<br />\r\n<br />\r\n<br />\r\nV&igrave; kh&ocirc;ng c&oacute; quy luật cụ thể, n&ecirc;n c&aacute;ch học ngữ ph&aacute;p Tiếng Anh chuẩn nhất sẽ l&agrave; đặt hai động từ make v&agrave; do trong một cụm từ được sắp xếp c&ugrave;ng nhau v&agrave; mang &yacute; nghĩa cố định, chẳng hạn như, make an appoinment (đặt một cuộc hẹn), do housework (l&agrave;m việc nh&agrave;)&hellip; Theo đ&oacute;, bạn c&oacute; thể học nhanh nhớ l&acirc;u v&agrave; dễ d&agrave;ng &aacute;p dụng v&agrave;o t&igrave;nh huống giao tiếp thực tế hay c&aacute;c b&agrave;i viết Tiếng Anh một c&aacute;ch th&agrave;nh thạo hơn.</p>\r\n', '2023-05-30 08:00:23', '2023-05-30 09:08:39', 0),
(7, 1, 3, 'Những lời chúc hay bằng tiếng Anh (có lời dịch)', '<p>+Mọi thứ lại bắt đầu khi năm mới đang đến. Ch&uacute;c bạn năm mới đầy hạnh ph&uacute;c v&agrave; những th&aacute;ng đầy triển vọng v&agrave; hạnh ph&uacute;c nhất.<br />\r\n<br />\r\nEverything starts a new with the new year coming. May your new year be filled with the happinest things and yuor days with the bringtest promise.<br />\r\n<br />\r\n+ Hy vọng tấm thiệp n&agrave;y sẽ chuyển đến những lời ch&uacute;c ch&acirc;n th&agrave;nh của t&ocirc;i đến với bạn. Bạn sẽ tr&agrave;n đầy hạnh ph&uacute;c trong tương lai.<br />\r\n<br />\r\nHoping this card bring your my sinceve greetings. you will be blessed through the coming year in fullest measure.<br />\r\n<br />\r\n+Anh l&agrave; huấn luyện vi&ecirc;n em y&ecirc;u qu&yacute; nhất. Em gửi anh lời ch&uacute;c mừng nh&acirc;n ng&agrave;y &quot; Lễ T&igrave;nh Nh&acirc;n &quot;.<br />\r\n<br />\r\nYou one my favourite in structor. I send you a Valentine greeting.<br />\r\n<br />\r\n+ Ch&uacute;c bạn năm mới vui vẻ v&agrave; ph&aacute;t t&agrave;i.<br />\r\n<br />\r\nHave a happy and profitable year.<br />\r\n<br />\r\n+ Gửi đến bạn những lời ch&uacute;c hạnh ph&uacute;c trong ng&agrave;y lễ Gi&aacute;ng Sinh v&agrave; năm mới.<br />\r\n<br />\r\nBringing your good wishes of happiness this Chritmas and on the coming year.<br />\r\n<br />\r\n+ Mọi việc lại bắt đầu tốt đẹp. Ch&uacute;c bạn th&agrave;nh c&ocirc;ng trong năm mới. Những lời ch&uacute;c ch&acirc;n th&agrave;nh của t&ocirc;i đến với cuộc sống huy ho&agrave;ng của bạn.<br />\r\n<br />\r\nThis is another good beginning. May you be richly blessed with a succesfull new year. May my sincere blessing suround spendid travel of you life.<br />\r\n<br />\r\n+ Nồng nhiệt ch&uacute;c mừng th&agrave;nh c&ocirc;ng lớn của bạn l&agrave; đ&atilde; ho&agrave;n th&agrave;nh kho&aacute; nghi&ecirc;n cứu sinh v&agrave; đạt được bằng Thạc Sĩ.<br />\r\n<br />\r\nHearty felications on your completing the post-graduate course acquiring the degree of Master of Sinse.<br />\r\n<br />\r\n+ Ch&uacute;ng t&ocirc;i ch&uacute;c mừng hai bạn nh&acirc;n ng&agrave;y đ&iacute;nh h&ocirc;n của c&aacute;c bạn. Hy vọng rằng c&aacute;c bạn đạt được những g&igrave; hằng mong muốn trong cuộc sống chung.<br />\r\n<br />\r\nBest wishes from us both on your engagement. We hope you will have everything you wish for in life together.<br />\r\n<br />\r\n+ Lời ch&uacute;c mừng tận đ&aacute;y l&ograve;ng nh&acirc;n dịp lễ th&agrave;nh h&ocirc;n của bạn.<br />\r\n<br />\r\nSincere congragulation from the botton of my heart on your marrige.<br />\r\n<br />\r\n+ Gởi đến bạn m&oacute;n qu&agrave; n&agrave;y với cả tấm l&ograve;ng v&agrave; một lời ch&uacute;c bạn sẽ hạnh ph&uacute;c tr&agrave;n đầy. Những điều hạnh ph&uacute;c nhất lu&ocirc;n đến với bạn.<br />\r\n<br />\r\nSending you this present with my heart and with that you&#39;ll be happy in fullest measure. May the happinest things alway happen to you.<br />\r\n<br />\r\n+ Cho ph&eacute;p t&ocirc;i ch&uacute;c mừng bạn nh&acirc;n dịp năm mới đến v&agrave; xin gửi đến bạn những lời ch&uacute;c tốt đẹp: dồi d&agrave;o sức khỏe v&agrave; thịnh vượng.<br />\r\n<br />\r\nAllow me to congragulation you on arrival of the new year and to extend to you all my good wishes for your perfect health and lasting prosperity.<br />\r\n<br />\r\n+ T&ocirc;i nhiệt th&agrave;nh ch&uacute;c mừng hạnh ph&uacute;c cuộc h&ocirc;n nh&acirc;n của bạn. Mong rằng sự kết hợp n&agrave;y sẽ mang lại hạnh ph&uacute;c m&atilde;i m&atilde;i cho gia đ&igrave;nh mới của bạn.<br />\r\n<br />\r\nI congragulation you wholeheratedly on your blessful marriage. May the significant bond fruit everlasting felicity on your new family.<br />\r\n<br />\r\n+ Cho t&ocirc;i gửi lời ch&uacute;c mừng ch&acirc;n th&agrave;nh nhất của t&ocirc;i nh&acirc;n dịp bạn c&oacute; th&ecirc;m một cậu con trai. C&oacute; thể tượng tưởng cậu b&eacute; em lại niềm vui cho bạn v&agrave; gia đ&igrave;nh bạn biết bao.<br />\r\n<br />\r\nLet me offer you my sincerest congragulation upon the arrival of your son. I can well imagine the joy which it must affod yourself and your family.<br />\r\n<br />\r\n+ T&ocirc;i tin tưởng rằng cuộc h&ocirc;n nh&acirc;n của bạn sẽ l&agrave; nguồn vui v&agrave; hạnh ph&uacute;c cho cả hai người. H&atilde;y nhận m&oacute;n q&ugrave;a nhỏ n&agrave;y với lời ch&uacute;c mừng của t&ocirc;i trong lễ cưới đầu hạnh ph&uacute;c cuả bạn.<br />\r\n<br />\r\nI trust that your marrige will be a source of blessing and happiness of your both, please accept this little present with my congragu;ations upon your happy wedding.<br />\r\n<br />\r\n+ Trong đời ch&uacute;ng ta gặp nhau để rồi cuối c&ugrave;ng n&oacute;i hai tiếng &quot; chia tay &quot;. Ch&uacute;c t&igrave;nh bạn của ch&uacute;ng ta m&atilde;i m&atilde;i vượt qua thờii gian v&agrave; kh&ocirc;ng gian.<br />\r\n<br />\r\nWe met get together to know each other but say &quot; good-bye&quot; at last in such a crowded world. May our friendship grow more dear inspite of time and space.<br />\r\n<br />\r\n+ Gửi người th&acirc;n nhất trong ng&agrave;y lễ Gi&aacute;ng Sinh vui vẻ n&agrave;y.<br />\r\n<br />\r\nTo my dearrest love on this is your Christmas.<br />\r\n<br />\r\n+ Anh kh&ocirc;ng nghĩ rằng anh c&oacute; thể c&oacute; hạnh ph&uacute;c thực sự cho đến ng&agrave;y anh gặp em. Ch&uacute;c em &quot; Ng&agrave;y T&igrave;nh Nh&acirc;n &quot; hạnh ph&uacute;c.<br />\r\n<br />\r\nI didn&#39;t think that I could ever trust happiness. The I met you. Happy Valentine&#39;s Day dear.<br />\r\n<br />\r\n+ Ch&uacute;c em : Ng&agrave;y T&igrave;nh Nh&acirc;n &quot; hạnh ph&uacute;c. H&atilde;y theo đuổi c&ocirc;ng việc tốt đẹp của em!<br />\r\n<br />\r\nWishing you a happy Valentine&#39;s Day. Keep up the good work !<br />\r\n<br />\r\n+ Trong &quot; Ng&agrave;y T&igrave;nh Y&ecirc;u &quot; n&agrave;y cũng như mọi ng&agrave;y kh&aacute;c, tất cả những g&igrave; t&ocirc;i c&oacute; l&agrave; t&igrave;nh y&ecirc;u d&agrave;nh cho em.<br />\r\n<br />\r\nOn this Valentine&#39;s day, just like every day, all I have is love for you.<br />\r\n<br />\r\n+ Mong rằng năm mới sẽ mang sự b&igrave;nh y&ecirc;n v&agrave; ph&aacute;t đạt đến cho bạn.<br />\r\n<br />\r\nI hope that the coming year bring you peace and prosperity.<br />\r\n<br />\r\n+ D&ugrave; kh&ocirc;ng gian c&oacute; ph&acirc;n c&aacute;ch ch&uacute;ng ta v&agrave; thời gian c&oacute; tr&ocirc;i đi mỗi ng&agrave;y, t&ocirc;i vẫn giữ trong tim sự quan t&acirc;m v&agrave; những lời ch&uacute;c tốt đẹp cho em.<br />\r\n<br />\r\nThough distance separates us and time keeps us going on our own way, through each and every day I will hold in my heart the caring and blessing for you and never let you go.<br />\r\n<br />\r\n+Gửi đến em những lời ch&uacute;c tốt đẹp nhất, ngọt ng&agrave;o như những b&ocirc;ng hoa n&agrave;y, v&igrave; em đ&atilde; c&ugrave;ng anh đi đến tận c&ugrave;ng thế giới. Ch&uacute;c sinh nhật hạnh ph&uacute;c.<br />\r\n<br />\r\nSend you my beautiful blessing that is as sweet as a flower to be your companion till the and of the world. Happy birthday to you.<br />\r\n<br />\r\n+ Trong ng&agrave;y sinh nhật tốt đẹp n&agrave;y, ch&uacute;c bạn những ng&agrave;y thực sự hạnh ph&uacute;c ở trong tầm tay của bạn. V&agrave; những ước mơ rực rỡ nhất đều c&oacute; thể thực hiện được.<br />\r\n<br />\r\nOn such a day like your birthday, may you be in arm with a truly happy day bringing fulfillment of your favorite hope your brightest promise.<br />\r\n<br />\r\n+ H&atilde;y để những lời ch&uacute;c s&acirc;u lắng của t&ocirc;i lu&ocirc;n ở b&ecirc;n cạnh cuộc s&ocirc;ng tuyệt vời của bạn. t&ocirc;i hy vọng trong năm tới bạn lu&ocirc;n khỏe mạnh v&agrave; thuận buồm xu&ocirc;i g&iacute;o trong c&ocirc;ng việc. Sinh nhật vui vẻ.<br />\r\n<br />\r\nLet my deep blessing always. Surround magnificent travel of your life. I hope in years to come you will hane a good health and plain sailing.<br />\r\nHappy birthday.<br />\r\n<br />\r\n+ T&ocirc;i ch&uacute;c bạn t&igrave;ng y&ecirc;u v&agrave; hạnh ph&uacute;c nh&acirc;n dịp sinh nhật của bạn.<br />\r\n<br />\r\nI want to wish you love and happiness on your birthday.<br />\r\n<br />\r\n+ Ước g&igrave; em c&oacute; thể b&agrave;y tỏ l&ograve;ng biết ơn của em đối với thầy, thầy k&iacute;nh mến của em, nhưng thật kh&oacute; n&oacute;i n&ecirc;n lời. Em mong rằng tấm thiệp n&agrave;y sẽ b&agrave;y tỏ phần n&agrave;o sự biết ơn s&acirc;u sắc từ đ&aacute;y l&ograve;ng em.<br />\r\n<br />\r\nI wish I knew some way to let you know the gratitude.<br />\r\nI fell for you my dear teacher but jusrt can&#39;t say.<br />\r\nSo I hope this little card will show, at least, in part the Warmest appeciation that is come from the botton of my heart.<br />\r\n<br />\r\n+ Ch&uacute;ng ta quen nhau đ&atilde; l&acirc;u. Tấm thiệp n&agrave;y để biết rằng em lu&ocirc;n ở trong suy nghĩ của t&ocirc;i.<br />\r\n<br />\r\nIt&#39;s been so long since we have gotton together. Here is a little card to let you know that you&#39;re in our thoughts often.<br />\r\n<br />\r\n+ C&agrave;ng ở xa em c&agrave;ng nghĩ nhiều về thầy. Những lời thầy dạy bảo v&agrave; sự biết ơn của em l&agrave; v&ocirc; c&ugrave;ng. Ch&uacute;c thầy mạnh khỏe, b&igrave;nh an v&agrave; hạnh ph&uacute;c.<br />\r\n<br />\r\nThe further I am away from you the more I am thinking of you.<br />\r\nThere is no end to your instruction<br />\r\nThere is no end to my gratitude.<br />\r\nWish you health, peaceful and happy.<br />\r\n<br />\r\n+ Bạn mến,<br />\r\nMột Gi&aacute;ng Sinh vui vẻ v&agrave; năm mới hạnh ph&uacute;c đến với bạn .<br />\r\nT&ocirc;i v&agrave; gia đ&igrave;nh t&ocirc;i xin gửi lời ch&uacute;c tốt đẹp đến gia đ&igrave;nh bạn.<br />\r\nCầu mong gia đ&igrave;nh bạn khỏe mạnh trong m&ugrave;a nghĩ lễ.<br />\r\nV&agrave; mong mỗi năm t&igrave;nh th&acirc;n của ch&uacute;ng ta c&agrave;ng gắn b&oacute;.<br />\r\n<br />\r\nDear,<br />\r\nA Merry Christmas and a happy New Year to you ! Allow me to offer you Season&#39;s Greeting on the advent of what will surely be a bringt and prosperous New Year, I trust that you and your family are enjoying this holiday Season in execllent health.<br />\r\nMy family, who are well and happy, join me my good wishes. May every year unite our hearts more closly.<br />\r\n<br />\r\n+ Mẹ y&ecirc;u dấu<br />\r\nCon xin gởi những lời ch&uacute;c tốt đẹp nh&acirc;n sinh nhật của mẹ. Con ước g&igrave; m&igrave;nh c&oacute; thể c&oacute; mặt ở đấy chia vui c&ugrave;ng mẹ nhưng con kh&ocirc;ng thể. Con gởi c&ugrave;ng m&oacute;n q&ugrave;a nhỏ n&agrave;y l&agrave; t&igrave;nh y&ecirc;u v&agrave; l&ograve;ng th&agrave;nh k&iacute;nh mến của con. Con hy vọng mẹ sẽ th&iacute;ch m&oacute;n q&ugrave;a đ&oacute;. h&atilde;y giữ g&igrave;n sức khoẻ.<br />\r\nCon trai của mẹ<br />\r\n<br />\r\nDear Mom,<br />\r\nWarm wishes on your birthday, I wish that I could be there to celebrate it with you, but that is impossible. I send along my love and affection. I&#39;m also sending a little gift. I hope you like it. Take care !<br />\r\nYour son.<br />\r\n<br />\r\n+ Cuộc hứa h&ocirc;n của ch&aacute;u l&agrave; một tin trong đại ! C&ocirc; v&agrave; ch&uacute; lẩm cẩm n&agrave;y xin gởi đến cho cả hai ch&aacute;u những lời ch&uacute;c tốt đẹp nhất. Ch&uacute;c cho cả hai ch&aacute;u được hưởng mọi hạnh ph&uacute;c v&agrave; th&agrave;nh đạt trong cuộc sống chung đ&ocirc;i.<br />\r\n<br />\r\nWhat great news about your engage ment ! Best wishes to you both from a doting aunt and uncle.May you enjoy every happiness ang success in your life together.<br />\r\n<br />\r\n+ Xin ch&uacute;c mừng hai bạn nh&acirc;n lễ kỷ niệm hai mươi lăm năm ng&agrave;y hai bạn kết h&ocirc;n. Hai bạn đ&atilde; hưởng nhiều năm tuyệt vời như thế b&ecirc;n nhau. T&ocirc;i chỉ c&oacute; thể ch&uacute;c bạn hưởng th&ecirc;m nhiều năm tương tự trong thời gian tới. Ch&uacute;c ng&agrave;y kỉ niện hạnh Ph&uacute;c.<br />\r\n<br />\r\nCongragulation on your twenty-fifth wedding anniversary ! You have had so many woderful years togethers. I can only wish you more of same ahead. Happy anniversary.<br />\r\n<br />\r\n+ Cầu cho sự Gi&aacute;ng Sinh của đấng Cứu Thế trong thời gian n&agrave;y đem lại cho c&aacute;c bạn hạnh ph&uacute;c v&agrave; sức khỏe trong suốt năm tới.<br />\r\n<br />\r\nMay this time of our savior&#39;s birth bring you joy good helth throughout the coming year.<br />\r\n<br />\r\n+ Đ&acirc;y chỉ l&agrave; l&aacute; thư ngắn để t&ocirc;i ch&uacute;c hai bạn một lễ Hanukkah cực kỳ vui vẻ v&agrave; một năm hạnh ph&uacute;c, an khang, thịnh vựơng. Ch&uacute;ng ta đang chờ đ&oacute;n những thời kỳ tốt đẹp hơn. Cầu cho năm sắp tời đ&acirc;y l&agrave; năm đẹp nhất từ trước tới nay.<br />\r\n<br />\r\nJust a note to say I wish you both a very Happy Hanukkah and a happy helthy, prosperous New Year. We are looking forward to better times. May this coming year be the best one ever.<br />\r\n<br />\r\n+ Trong khi năm 2000.. đang nhanh ch&oacute;ng đến gần, ch&uacute;ng t&ocirc;i ch&uacute;c cho hai bạn những điều tốt đẹp nhất v&agrave; một năm mới cực kỳ hạnh ph&uacute;c.Cầu mong cho năm nay mang lại sức khỏe, thịnh vượng, v&agrave; an b&igrave;nh cho tất cả ch&uacute;ng ta.<br />\r\n<br />\r\nWith 2000..fast approaching, we wish you both all the best and a very Happy New Year. May this year bring helth, prosperity, and peace to us all.<br />\r\n<br />\r\n+ M&igrave;nh viết thư n&agrave;y ch&uacute;c mừng ng&agrave;y kỉ niệm đ&aacute;m cưới bạc của hai bạn. M&igrave;nh ch&uacute;c hai bạn thật nhiều, thật nhiều năm hạnh ph&uacute;c.<br />\r\n<br />\r\nI write to congragulate you on your silver wedding anniversary. I wish you many, many more years of wedded bliss.<br />\r\n<br />\r\n+ Ch&uacute;c bạn khỏe v&agrave; hạnh ph&uacute;c trong năm mới.<br />\r\n<br />\r\nWishing you helth and happiness in the year to come.<br />\r\n<br />\r\n+ Ch&uacute;c cho con đường anh đi lu&ocirc;n rộng th&ecirc;nh thang. Anh c&oacute; đầy niềm tin v&agrave; nghị lực để c&oacute; điều m&igrave;nh mong muốn.<br />\r\n<br />\r\nWishing your path is very spacious, you will have full engergy and confident to get desireble things.<br />\r\n<br />\r\n+ Mẹ y&ecirc;u ! Sinh nhật của mẹ con ch&uacute;c mẹ mạnh khỏe v&agrave; những may mắn, hạnh ph&uacute;c nhất sẽ đến với mẹ trong cuộc đời.<br />\r\n<br />\r\nMun ! on occasion of your birthday, wishing you a good helth and lucky, the most happiness will come to mum your life.<br />\r\n<br />\r\n+ Anh y&ecirc;u ! Sinh nhật anh em ch&uacute;c anh gặt h&aacute;i nhiều th&agrave;nh c&ocirc;ng. Mong anh m&atilde;i y&ecirc;u em như ng&agrave;y đầu v&agrave; lu&ocirc;n ở b&ecirc;n em.<br />\r\n<br />\r\nDarling ! on occasion of you birthday, wishing you success more. Hoping that you will love me forever same as the first time and you are always besides me.<br />\r\n<br />\r\n+ Mừng sinh nhật c&ocirc; ch&uacute;ng em ch&uacute;c c&ocirc; lu&ocirc;n tươi trẻ mạnh khỏe v&agrave; hạnh ph&uacute;c. M&atilde;i m&atilde;i l&agrave; người ch&uacute;ng em y&ecirc;u q&uacute;i.<br />\r\n<br />\r\nCongragulation your birthday, we wish you young and nice forever and happiness. You are teacher that we love and respect.<br />\r\n<br />\r\n+ Nh&acirc;n dịp sinh nhật lần thứ 20 của em, ch&uacute;c em lu&ocirc;n tươi khỏe, trẻ đẹp. Cầu mong những g&igrave; may mắn nhất, tốt đẹp nhất v&agrave; hạnh ph&uacute;c nhất sẽ đến với em trong tuổi mới.<br />\r\n<br />\r\nOn occasion of your 20th birthday, wishing you happy and beatiful, young.The best wishes to you with the most lucky, the best and most happiness will come to you in new age.<br />\r\n<br />\r\n+ Nh&acirc;n dịp năm mới em xin ch&uacute;c gia đ&igrave;nh anh chị một năm mới thật hạnh ph&uacute;c, vạn sự như &yacute; !<br />\r\n<br />\r\nOn occasion of new year, wishing your family the most happiness in new year Everything is the best !<br />\r\n<br />\r\n+ Ch&uacute;c em một sinh nhật xa nh&agrave; nhưng vẫn hạnh ph&uacute;c. h&atilde;y cố gắng hướng tới tương lai.<br />\r\n<br />\r\nWishing you birthday far from house byt still happy. Try to see to future.<br />\r\n<br />\r\n+ Nh&acirc;n ng&agrave;y Ch&uacute;a ra đời anh ch&uacute;c em v&agrave; gia đ&igrave;nh tận hưởng một m&ugrave;a Gi&aacute;ng sinh vui vẻ.<br />\r\n<br />\r\nOn occasion God&#39;s birthday, I wish you and your family a Merry and happy Christmas.<br />\r\n<br />\r\n+ Nh&acirc;n dịp năm mới ! Em xin ch&uacute;c anh chị một năm mới thật hạnh ph&uacute;c. An khang thịnh vượng.<br />\r\n<br />\r\nOn occasion of new year, wishing your family the most happyness in new year. Everything is OK.<br />\r\n<br />\r\n+ Ch&uacute;c em một sinh nhật thật nhiều &yacute; nghĩa v&agrave; hạnh ph&uacute;c. Cầu mong mọi điều may mắn sẽ đến với em.<br />\r\n<br />\r\nWishing you a happy birthday. Praying you luckily.<br />\r\n<br />\r\n+ Tặng phẩm n&agrave;y ri&ecirc;ng n&oacute; chẳng c&oacute; &yacute; nghĩa g&igrave; cả, nhưng m&agrave; kỉ niệm ở đ&acirc;y l&agrave; anh gởi cho em tất cả những t&igrave;nh cảm tha thiết nhất. Sinh nhật vui vẻ.<br />\r\n<br />\r\nThis present is not valuable itself, but it is a souvenir heroto, it brings all most my warm sentiment. happy birthday to you.<br />\r\n<br />\r\n+ Nh&agrave; ngh&egrave;o, em chỉ tặng c&aacute;c thầy c&ocirc; dẫn dắt em đi con đường đ&uacute;ng đắn hai m&oacute;m qu&agrave; nhỏ nhưng &yacute; nghĩa lớn: thật nhiều điểm 10 đỏ ch&oacute;i, tấm thiệp đơn sơ c&ugrave;ng lời ch&uacute;c c&aacute;c thầy c&ocirc; mạnh khỏe, gặt h&aacute;i đợc nhiều th&agrave;nh c&ocirc;ng. Em hy vọng c&aacute;c thầy c&ocirc; sẽ h&agrave;i l&ograve;ng với hai m&oacute;n qu&agrave; em d&acirc;ng tặng với ấm l&ograve;ng th&agrave;nh k&iacute;nh.<br />\r\n<br />\r\nBeacause of poor, I only present teachers who have instructed me step on properway. Two present have great mean: more brilliant score 10, simple card with you healthy, get more achievement. I hope that you will pleasant for two presents which I present to you my respectful.<br />\r\n<br />\r\n+ Thầy ơi ! kh&ocirc;ng phải chỉ c&oacute; ng&agrave;y 20-11 con mới nhớ đến thầy. M&agrave; đối với con, ng&agrave;y n&agrave;o cũng đều l&agrave; 20-11.Con k&iacute;nh ch&uacute;c tthầy m&atilde;i vui tươi hạnh ph&uacute;c v&agrave; h&atilde;nh diện b&ecirc;n những học sinh lu&ocirc;n l&agrave; con ngoan tr&ograve; giỏi của m&igrave;nh.<br />\r\n<br />\r\nTeachers ! it is not November 20 I remember you. To me, every days is November 20. I wish you mey, happy forever and you are proudof with your students who are always your good and excellence children.<br />\r\n<br />\r\n+ Xin cảm tạ thầy c&ocirc; - l&agrave; thầy c&ocirc; của ch&uacute;ng em, đ&atilde; cho ch&uacute;ng em một lời n&oacute;i, h&igrave;nh ảnh &yacute; tưởng để ch&uacute;ng em x&acirc;y đắp cuộc đời.<br />\r\n<br />\r\nThanksgiving: You are teachers of us, you give us voice images, thought so that we build to our life.<br />\r\n<br />\r\n+Ng&agrave;y l&agrave;nh, năm mới, ch&aacute;u y&ecirc;u qu&yacute; ! bằng tất cả tấm l&ograve;ng m&igrave;nh c&ocirc; ch&uacute;c ch&aacute;u được tăng tiến trong t&igrave;nh thương, trong lẽ phải v&agrave; nhiều sức khỏe. Đ&oacute; l&agrave; t&agrave;i sản qu&yacute; gi&aacute; nhất.<br />\r\n<br />\r\nNice day, new year, my dears ! By all my heart, I wish you will improve in love, in common sense and more helthy. May be these are most valuable properties.<br />\r\n<br />\r\n+ Nh&acirc;n ng&agrave;y nh&agrave; gi&aacute;o Việt Nam 20-11. K&iacute;nh ch&uacute;c thầy c&ocirc; v&agrave; gia đ&igrave;nh được dồi d&agrave;o sức khỏe, hạnh ph&uacute;c lu&ocirc;n th&agrave;nh đạt trong cuộc sống.<br />\r\n<br />\r\nOn occasion of Vietnam Teacher&#39;s Day. wishing you and your family a good health, happiness and success in your life.<br />\r\n<br />\r\n+ K&iacute;nh ch&uacute;c cho &ocirc;ng b&agrave; một ng&agrave;y lễ tạ ơn vui vẻ. Ch&aacute;u chỉ mong l&agrave; ch&aacute;u c&oacute; mặt ở đ&oacute; với hao &ocirc;ng b&agrave;. Ch&aacute;u nhớ rất nhiều đến những thời gian hạnh ph&uacute;c tại nh&agrave; của &ocirc;ng b&agrave; v&agrave;o ng&agrave;y tạ ơn.<br />\r\nCh&aacute;u gởi lời ch&agrave;o đến tất cả họ h&agrave;ng v&agrave; xin &ocirc;ng b&agrave; &ocirc;m h&ocirc;n gi&uacute;p ch&aacute;u đứa ch&aacute;u g&aacute;i mới nhất của ch&aacute;u.<br />\r\nMong mọi người c&oacute; một ng&agrave;y tuyẽt vời.<br />\r\n<br />\r\nWishing Grandfaher a merry on Thanksgiving Day. I only hope that will be herewith grandfather. I memory very much about happy time at grandfather&#39;s house on Thanksgiving Day.<br />\r\nI send greeting to allmy relatives and hope that Grandfather will embrace and kiss my newest niece.<br />\r\nHave a wonderful Day.<br />\r\n<br />\r\n+ Nh&acirc;n dịp năm mới t&ocirc;i ch&uacute;c c&aacute;c ng&agrave;i gặp được nhiều sự may mắn v&agrave; hạnh ph&uacute;c.<br />\r\n<br />\r\nOn occasion of New Year, wishing you happiness and lucky.<br />\r\n<br />\r\n+ Nh&acirc;n dịp năm mới t&ocirc;i k&iacute;nh ch&uacute;c to&agrave;n thể gia đ&igrave;nh bạn một năm mới gặp được nhiều may mắn v&agrave; hạnh ph&uacute;c.<br />\r\n<br />\r\nOn occasion of New Year, wishing all your family happiness and lucky.</p>\r\n', '2023-05-30 14:20:34', '2023-05-30 14:20:34', 0),
(8, 3, 2, 'Bạn nào có một đoạn tự giới thiệu về bản thân bằng Tiếng Anh', '<p>Bạn n&agrave;o c&oacute; một đoạn tự giới thiệu về bản th&acirc;n bằng Tiếng Anh ko&gt;? M&igrave;nh đang cần mong c&aacute;c bạn gi&uacute;p đợ</p>\r\n', '2023-06-07 10:26:31', '2023-06-07 10:26:31', 0),
(9, 3, 2, 'xin ai biết giải thích giúp em điểm ngữ pháp này với ạ! em xin chân thành cảm ơn mọi', '<p>There comes God&#39;s Lamb.</p>\r\n', '2023-06-07 10:27:35', '2023-06-07 10:27:35', 0),
(10, 2, 8, 'Bộ phim giúp bạn học tiếng Anh qua phim hiệu quả', '<p>Những bộ phim gi&uacute;p bạn học tiếng Anh qua phim hiệu quả</p>\r\n\r\n<p><br />\r\n<strong>-&nbsp;ADVENTURE TIME:</strong></p>\r\n\r\n<p>Adventure Time l&agrave; một series&nbsp;phim hoạt h&igrave;nh tiếng Anh&nbsp;đ&igrave;nh đ&aacute;m của đ&agrave;i Cartoon Network bắt đầu ph&aacute;t s&oacute;ng từ năm 2010. Một series phim hoạt h&igrave;nh vui nhộn, ho&agrave;nh tr&aacute;ng v&agrave; đầy m&agrave;u sắc d&agrave;nh cho những bạn ưu th&iacute;ch thể loại n&agrave;y.Series l&agrave; hơn 300 chuyến phi&ecirc;u lưu d&agrave;i 11 ph&uacute;t, ph&aacute;t trong 9 m&ugrave;a, c&oacute; rất nhiều c&aacute;ch n&oacute;i hay v&agrave; c&aacute;c cụm từ th&ocirc;ng dụng trong giao tiếp h&agrave;ng ng&agrave;y, c&aacute;ch n&oacute;i kh&aacute; chậm ph&ugrave; hợp với c&aacute;c bạn mới bắt đầu. Bộ phim kể về những cuộc phi&ecirc;u lưu trong một thế giới hậu khải huyền của cậu b&eacute; Finn v&agrave; một ch&uacute; ch&oacute; c&oacute; ph&eacute;p thuật t&ecirc;n Jake, cũng đồng thời l&agrave; anh nu&ocirc;i/bạn th&acirc;n của cậu.Đ&acirc;y đ&uacute;ng l&agrave; một phim hoạt h&igrave;nh, nhưng lại kh&ocirc;ng ho&agrave;n to&agrave;n l&agrave; loại phim &ldquo;kh&ocirc;ng cần d&ugrave;ng đến n&atilde;o&rdquo; d&agrave;nh cho trẻ con. C&oacute; nhiều đoạn phim n&oacute;i đến những chủ đề phức tạp v&agrave; c&oacute; &yacute; nghĩa lớn được ẩn dụ trong những c&acirc;u chuyện tưởng như phức tạp, ngo&agrave;i ra cũng c&oacute; nhiều những tr&iacute;ch đoạn m&agrave; những kh&aacute;n giả nhỏ tuổi sẽ kh&ocirc;ng thể hiểu hết được.<br />\r\n-&nbsp;<strong>EXTRA ENGLISH:</strong></p>\r\n\r\n<p><strong>&nbsp;</strong>Đ&acirc;y là b&ocirc;̣ phim tuyệt vời d&agrave;nh cho những bạn mới bắt đầu gi&uacute;p cải thiện rất lớn kỹ năng nghe v&agrave;&nbsp;tự học ph&aacute;t &acirc;m tiếng Anh&nbsp;với c&aacute;ch n&oacute;i chậm, ch&iacute;nh x&aacute;c v&agrave; ph&aacute;t &acirc;m rất chuẩn của hầu hết c&aacute;c diễn vi&ecirc;n trong phim.Extra English gồm có 30 t&acirc;̣p, mỗi tập kh&ocirc;ng qu&aacute; 30 ph&uacute;t, sẽ kh&ocirc;ng g&acirc;y cảm gi&aacute;c mệt mỏi cho người mới bắt đầu v&igrave; phải tiếp x&uacute;c qu&aacute; nhiều th&ocirc;ng tin mới trong một khoảng thời gian d&agrave;i. B&ecirc;n cạnh đ&oacute;, nội dung h&agrave;i hước, mang t&iacute;nh giải tr&iacute; cao, c&aacute;ch diễn đạt trực quan, sinh động l&agrave; một động lực lớn cho người học. Bộ phim xoay quanh cu&ocirc;̣c s&ocirc;́ng của Nick, Bridget, Annie v&agrave; Hector.Hector là m&ocirc;̣t người mới chuyển từ Argentina đ&ecirc;́n Anh Qu&ocirc;́c v&agrave; có v&ocirc;́n ti&ecirc;́ng Anh r&acirc;́t &ldquo;khi&ecirc;m t&ocirc;́n&rdquo;, anh phải tìm những người bạn bản xứ đ&ecirc;̉ cải thi&ecirc;̣n khả năng ngoại ngữ của mình. Ch&iacute;nh v&igrave; vậy, 3 người bạn đ&atilde; rất vất vả để dạy Hector học tiếng Anh. Do hoàn cảnh của Hector trong Extra English c&oacute; nhiều điểm tương đ&ocirc;̀ng với khán giả. Những người cũng đang v&acirc;̣t l&ocirc;̣n với ti&ecirc;́ng Anh n&ecirc;n người xem có th&ecirc;̉ hi&ecirc;̉u được hoàn toàn n&ocirc;̣i dung của c&acirc;u chuy&ecirc;̣n. Mỗi tập l&agrave; một c&acirc;u chuyện kh&aacute;c nhau, kh&ocirc;ng li&ecirc;n quan qu&aacute; nhiều đến c&aacute;c tập trước, gồm rất nhiều c&aacute;c từ ngữ v&agrave; c&acirc;u sử dụng trong giao tiếp h&agrave;ng ng&agrave;y. Đ&acirc;y được coi l&agrave; c&aacute;ch học tiếng Anh qua phim truyền cảm hứng cho những người mới học tr&ecirc;n to&agrave;n thế giới.<br />\r\n-&nbsp;<strong>F.R.I.E.N.D.S:&nbsp;</strong></p>\r\n\r\n<p>Đ&acirc;y cũng l&agrave; một bộ phim d&agrave;nh cho những bạn mới bắt đầu học tiếng Anh qua phim. Tuy nhi&ecirc;n sẽ ở tr&igrave;nh độ cao hơn một ch&uacute;t so với Extra English. Bộ phim được sử dụng hầu hết ở c&aacute;c trung t&acirc;m tiếng Anh tr&ecirc;n nước Mỹ, một c&ocirc;ng cụ tuyệt vời để cải thiện kỹ năng nghe n&oacute;i v&agrave; phản xạ ng&ocirc;n ngữ.Friends l&agrave; một trong những h&agrave;i kịch t&igrave;nh huống nổi tiếng của truyền h&igrave;nh Mỹ, kể về cuộc sống của 6 người bạn sinh sống tại khu Greenwich Village của New York.Một điều đặc biệt l&agrave; bộ phim mang lại cho kh&aacute;n giả một c&aacute;i nh&igrave;n cực k&igrave; ch&iacute;nh x&aacute;c v&agrave; ch&acirc;n thật về x&atilde; hội Mỹ, về phong c&aacute;ch sống, c&aacute;ch tư duy v&agrave; ứng xử của người Mỹ.<br />\r\n-&nbsp;<strong>FORREST GUMP:&nbsp;</strong>Ra đời v&agrave;o năm 1994,&nbsp;Forrest Gump đạt được những th&agrave;nh c&ocirc;ng rực rỡ khi gi&agrave;nh được ba giải Quả cầu v&agrave;ng v&agrave; s&aacute;u giải Oscar danh gi&aacute;.Bộ phim kể về cuộc đời của một người c&oacute; chỉ số IQ 75 t&ecirc;n Forrest Gump, song h&agrave;nh l&agrave; một giai đoạn lịch sử đầy biến động của nước Mỹ. Trong khi chờ chuyến xe bus, nh&acirc;n vật ch&iacute;nh kể lại những c&acirc;u chuyện m&agrave; m&igrave;nh đ&atilde; trải qua với những người lạ với sự ng&ocirc; ngh&ecirc; v&agrave; th&agrave;nh thực. Cuộc đời cậu l&agrave; một đầy rẫy những thăng trầm, những sự kiện kh&ocirc;ng ngờ tới, nhưng Forrest cứ vậy m&agrave; đi qua ch&uacute;ng một c&aacute;ch nhẹ nh&agrave;ng. Cậu kh&ocirc;ng hề t&iacute;nh to&aacute;n, ph&acirc;n t&iacute;ch hay kỳ vọng bất kỳ điều g&igrave; v&agrave;o cuộc đời. Điều đặc biệt l&agrave; bằng ch&iacute;nh sự ng&acirc;y thơ trong s&aacute;ng đ&oacute; đ&atilde; gi&uacute;p Forrest kh&ocirc;ng những vượt qua được những biến cố trong cuộc đời m&agrave; c&ograve;n gi&uacute;p rất nhiều những người kh&aacute;c vươn l&ecirc;n trong cuộc sống. Bộ phim mang tới &yacute; nghĩa to lớn về l&ograve;ng trắc ẩn giữa người với người, sự sẻ chia v&agrave; gi&uacute;p đỡ lẫn nhau trong khổ đau. Nh&acirc;n vật ch&iacute;nh trong phim do gặp vấn đề về t&acirc;m l&yacute; n&ecirc;n ph&aacute;t &acirc;m tiếng Anh v&ocirc; c&ugrave;ng chậm r&atilde;i, ng&ocirc;n ngữ được sử dụng phim rất đơn giản v&agrave; dễ hiểu. Đ&acirc;y l&agrave; bộ phim kinh điển của nước Mỹ, cung cấp cho người xem nhiều điểm đặc biệt về văn h&oacute;a v&agrave; lịch sử quốc gia n&agrave;y.</p>\r\n', '2023-06-07 10:37:50', '2023-06-07 10:37:50', 0),
(11, 2, 8, 'Khởi động Học tiếng Anh qua phim ảnh - Giải thích các thuật ngữ trong các bộ phim', '<p>Như c&aacute;c bạn đ&atilde; biết, phim ảnh/ &acirc;m nhạc l&agrave; một trong những nguồn t&agrave;i liệu rất hữu &iacute;ch trong qu&aacute; tr&igrave;nh học tiếng Anh.<br />\r\n<br />\r\nTuy nhi&ecirc;n, đối với người mới học, việc hiểu những ngữ cảnh, mẫu c&acirc;u trong phim đ&ocirc;i khi rất kh&oacute; khăn, v&iacute; dụ với c&aacute;c th&agrave;nh ngữ của người nước ngo&agrave;i, nếu chỉ đơn thuần nghe hiểu từ th&igrave; kh&ocirc;ng thể nắm bắt được &yacute; nghĩa của c&acirc;u thoại. Qua &quot;qu&aacute; tr&igrave;nh&quot; xem đi xem lại c&aacute;c bộ phim, bản th&acirc;n m&igrave;nh cũng &quot;v&ocirc; t&igrave;nh&quot; nghe được những th&agrave;nh ngữ, mẫu c&acirc;u m&agrave; trước đ&acirc;y m&igrave;nh xem qua m&agrave; kh&ocirc;ng hiểu/ kh&ocirc;ng nhận ra. Ngo&agrave;i ra, việc t&aacute;ch c&acirc;u thoại ra khỏi ngữ cảnh v&agrave; dịch ri&ecirc;ng cũng khiến người học gặp kh&oacute; khăn trong việc hiểu cũng như &aacute;p dụng c&aacute;c mẫu c&acirc;u sau n&agrave;y.<br />\r\n<br />\r\nDo đ&oacute; m&igrave;nh c&oacute; &yacute; định khởi động 1 dự &aacute;n nho nhỏ nhằm nhặt ra những lời thoại chứa th&agrave;nh ngữ, tục ngữ trong c&aacute;c bộ phim chỉ định, để người học c&oacute; thể ghi nhớ cũng như hiểu hơn nội dung c&aacute;c bộ phim.<br />\r\n<br />\r\nDự &aacute;n 1: How I met your mother season 1.<br />\r\n<br />\r\n<strong>1. H&igrave;nh thức tham gia:</strong><br />\r\n- C&aacute;c bạn xem phim v&agrave; nhặt ra c&aacute;c nội dung m&agrave; bản th&acirc;n cho rằng mới/kh&oacute; đối với người mới học, đi k&egrave;m đ&oacute; l&agrave; lời giải th&iacute;ch bằng tiếng Việt.<br />\r\n- Ti&ecirc;u đề email: [Tienganh.com.vn] &lt;T&ecirc;n series&gt;&lt;Số season&gt; - EP&lt;Số tập&gt;<br />\r\nVD: [Tienganh.com.vn] HIMYM1 - EP1<br />\r\n- Nội dung email:<br />\r\n&lt;Nội dung&gt; - &lt;Lời giải th&iacute;ch&gt; - &lt;Thời điểm xuất hiện trong phim&gt;<br />\r\nVD:<br />\r\n&quot;I am on fire today&quot; - &Yacute; n&oacute;i nh&acirc;n vật đang rất th&agrave;nh c&ocirc;ng/ may mắn trong 1 việc n&agrave;o đ&oacute; trong 1 khoảng thời gian ngắn. Trong phim, nh&acirc;n vật Sheldon kh&ocirc;ng thể ph&acirc;n biệt được lời khen thật v&agrave; lời n&oacute;i mỉa mai, nhưng trong v&ograve;ng 1 buổi s&aacute;ng nh&acirc;n vật n&agrave;y đ&atilde; ph&aacute;t hiện ra 3 t&igrave;nh huống người kh&aacute;c mỉa mai m&igrave;nh li&ecirc;n tục. - The Big Bang Theory, Season xx, Ep xx, ph&uacute;t thứ xx.<br />\r\n<br />\r\n<strong>2. Thời gian:</strong><br />\r\n08/10/2016 - 22/10/2016. C&aacute;c bạn c&oacute; thể gửi email trước.<br />\r\n<br />\r\n<strong>3. Th&ocirc;ng tin li&ecirc;n hệ tham gia dự &aacute;n:</strong><br />\r\n<a href=\"mailto:tunglxx226@gmail.com\">tunglxx226@gmail.com</a><br />\r\n<br />\r\nRất mong nhận được sự ủng hộ của c&aacute;c bạn v&agrave; đưa box Speaking trở lại&nbsp;<img alt=\"\" src=\"http://www.tienganh.com.vn/images/smilies/smile.png\" /></p>\r\n', '2023-06-07 10:38:21', '2023-06-07 10:38:21', 0);
INSERT INTO `posts` (`post_id`, `user_id`, `category_id`, `title`, `content`, `created_at`, `updated_at`, `view`) VALUES
(12, 4, 5, 'Luyện phát âm Anh-Mỹ chuẩn với American Accent Training bản PDF+audio chất lượng nhất', '<p><strong>1/ Tổng quan s&aacute;ch American Accent Training</strong><br />\r\nT&ecirc;n s&aacute;ch American Accent Training<br />\r\nNh&agrave; xuất bản NXB Barron&rsquo;s<br />\r\nT&aacute;c giả Ann Cook<br />\r\nBand điểm ph&ugrave; hợp để học Những bạn c&oacute; tr&igrave;nh độ từ Intermediate trở l&ecirc;n<br />\r\nBộ s&aacute;ch American Accent Training giới thiệu v&agrave; giải th&iacute;ch cho người học những kh&aacute;i niệm căn bản để g&oacute;p phần v&agrave;o việc luyện n&oacute;i tiếng Anh giọng Mỹ. Đi k&egrave;m theo đ&oacute; l&agrave; c&aacute;c b&agrave;i tập (được viết trong s&aacute;ch v&agrave; đọc trong CD song song) về c&aacute;c nguy&ecirc;n tắc ph&aacute;t &acirc;m, c&aacute;ch nhấn &acirc;m, ngữ điệu từ cấp độ cơ bản (chữ c&aacute;i, từ, cụm từ, c&acirc;u) đến n&acirc;ng cao (đoạn văn, b&agrave;i văn).<br />\r\n<br />\r\nNgo&agrave;i ra, s&aacute;ch c&ograve;n cung cấp th&ecirc;m Nationality Guides, t&aacute;c giả sẽ chỉ ra c&aacute;c lỗi sai v&agrave; hướng dẫn khắc phục cho người học đến từ c&aacute;c quốc gia kh&aacute;c nhau như: Nhật Bản, Trung Quốc, T&acirc;y Ban Nha, Nga, Ấn Độ, Ph&aacute;p, H&agrave;n Quốc, Ph&aacute;p.<br />\r\n<br />\r\n<strong><em>Học ph&aacute;t &acirc;m cũng kh&ocirc;ng qu&ecirc;n cần trau dồi từ vựng h&agrave;ng ng&agrave;y, xem ngay&nbsp;<a href=\"https://patadovietnam.edu.vn/blog/vocab-grammar/10-website-hoc-tu-vung-online/\" target=\"_blank\">10 website học từ vựng tiếng anh online miễn ph&iacute; Anh tốt nhất</a></em><br />\r\n<br />\r\n<img alt=\"\" src=\"https://patadovietnam.edu.vn/wp-content/uploads/2021/04/american-accent-training-patado.jpg\" /><br />\r\n<br />\r\n<em>Tổng quan s&aacute;ch American Accent Training<br />\r\n<br />\r\n<em>Ưu điểm:</em></em></strong><br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong><em><em>80% nội dung s&aacute;ch l&agrave; b&agrave;i tập thực h&agrave;nh.</em></em></strong></li>\r\n	<li><strong><em><em>C&oacute; rất nhiều b&agrave;i tập như điền v&agrave;o chỗ trống, t&igrave;m phi&ecirc;n &acirc;m, đ&aacute;nh dấu trọng &acirc;m,&hellip;. gi&uacute;p bạn ph&acirc;n biệt tốt c&aacute;c &acirc;m, đọc đ&uacute;ng trọng &acirc;m, đ&uacute;ng ngữ điệu v&agrave; phản xạ nhanh hơn.</em></em></strong></li>\r\n	<li><strong><em><em>Những l&yacute; thuyết ph&aacute;t &acirc;m cũng được giải th&iacute;ch bằng b&agrave;i tập nghe v&agrave; lặp lại.</em></em></strong></li>\r\n	<li><strong><em><em>Đi k&egrave;m theo đ&oacute; l&agrave; bộ đĩa CD sẽ gi&uacute;p bạn ho&agrave;n to&agrave;n chủ động trong việc học, kh&ocirc;ng phụ thuộc v&agrave;o gi&aacute;o vi&ecirc;n.</em></em></strong></li>\r\n</ul>\r\n\r\n<p><br />\r\n<strong><em><em><em>Nhược điểm:</em></em></em></strong><br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong><em><em><em>S&aacute;ch American Accent Training lại thiếu h&igrave;nh ảnh minh họa.</em></em></em></strong></li>\r\n	<li><strong><em><em><em>Tất cả c&aacute;c chương to&agrave;n l&agrave; chữ, trừ c&aacute;c sơ đồ hướng dẫn ph&aacute;t &acirc;m th&igrave; kh&ocirc;ng c&oacute; bất kỳ h&igrave;nh ảnh n&agrave;o cả n&ecirc;n rất dễ nh&agrave;m ch&aacute;n.</em></em></em></strong></li>\r\n</ul>\r\n\r\n<p><br />\r\n<strong><em><em><em><strong><em>Luyện tập ph&aacute;t &acirc;m nhiều hơn với cuốn&nbsp;<a href=\"https://patadovietnam.edu.vn/blog/sach-luyen-thi-ielts/tron-bo-sach-pronunciation-in-use/\" target=\"_blank\">Pronunciation in use</a></em><br />\r\n<br />\r\n<strong>2/ Hướng dẫn sử dụng s&aacute;ch American Accent Training</strong></strong></em></em></em></strong><br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong><em><em><em><strong>Tự học tiếng Anh qua American Accent Training</strong></em></em></em></strong></li>\r\n</ul>\r\n\r\n<p><br />\r\n<strong><em><em><em><strong>Bạn kh&ocirc;ng cần c&oacute; gi&aacute;o vi&ecirc;n hướng dẫn cũng c&oacute; thể sử dụng s&aacute;ch American Accent Training. Nội dung kh&ocirc;ng qu&aacute; phức tạp, mọi b&agrave;i tập đ&atilde; c&oacute; CD hướng dẫn, bạn chỉ cần đọc v&agrave; chỉnh sửa theo.</strong></em></em></em></strong><br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong><em><em><em><strong>Kết hợp ghi ch&eacute;p v&agrave; thu &acirc;m</strong></em></em></em></strong></li>\r\n</ul>\r\n\r\n<p><br />\r\n<strong><em><em><em><strong>Ghi ch&eacute;p gi&uacute;p bạn l&agrave;m quen với k&iacute; tự phi&ecirc;n &acirc;m, gi&uacute;p bạn đọc được nhiều từ kh&aacute;c ngo&agrave;i nội trung trong s&aacute;ch. Mỗi khi l&agrave;m b&agrave;i tập, bạn n&ecirc;n ghi &acirc;m lại để nghe v&agrave; chỉnh sửa. Qua c&aacute;c đoạn ghi &acirc;m, bạn cũng c&oacute; thể nhận ra sự tiến bộ của m&igrave;nh.</strong></em></em></em></strong><br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong><em><em><em><strong>Kết hợp từ điển</strong></em></em></em></strong></li>\r\n</ul>\r\n\r\n<p><br />\r\n<strong><em><em><em><strong>Nội dung s&aacute;ch bao gồm rất nhiều danh s&aacute;ch từ vựng bạn c&oacute; thể t&iacute;ch luỹ. V&igrave; s&aacute;ch ho&agrave;n to&agrave;n kh&ocirc;ng giải nghĩa, h&atilde;y kết hợp với từ điển để học từ hiệu quả hơn.<br />\r\n<br />\r\n<strong><em>Xem ngay&nbsp;<a href=\"https://patadovietnam.edu.vn/blog/tin-tuc-tieng-anh/ielts-speaking-band-descriptors/\" target=\"_blank\">IELTS Speaking Band Descriptors</a>&nbsp;để hiểu r&otilde; những điều cần biết để tr&aacute;nh mất điểm v&agrave; c&aacute;c ti&ecirc;u ch&iacute; chấm điểm của kĩ năng IELTS Speaking.</em><br />\r\n<br />\r\n<strong>3/ Tải s&aacute;ch&nbsp;<strong>American Accent Training</strong></strong><br />\r\n<br />\r\n<strong><strong>C&Aacute;C BẠN TẢI S&Aacute;CH&nbsp;<a href=\"https://patadovietnam.edu.vn/blog/sach-luyen-thi-ielts/american-accent-training/\" target=\"_blank\">TẠI Đ&Acirc;Y</a></strong></strong></strong></strong></em></em></em></strong></p>\r\n', '2023-06-07 11:15:07', '2023-06-07 11:15:07', 0),
(13, 4, 5, ' 3 quy tắc “bất di bất dịch” nhất định phải nhớ để phát âm đuôi ed chuẩn', '<p><em>Ph&aacute;t &acirc;m đu&ocirc;i ed kh&ocirc;ng chỉ cần trong giao tiếp tiếng Anh m&agrave; cực kỳ cần thiết nếu bạn muốn ho&agrave;n th&agrave;nh tốt 100% c&aacute;c b&agrave;i kiểm tra năng lực ngoại ngữ. Muốn học c&aacute;ch ph&aacute;t &acirc;m đu&ocirc;i ed đơn giản m&agrave; hiệu quả, xem ngay 3 quy tắc &ldquo;bất di bất dịch&rdquo; k&egrave;m mẹo ghi nhớ c&oacute; một kh&ocirc;ng hai dưới đ&acirc;y nh&eacute;!</em><br />\r\n&nbsp;</p>\r\n\r\n<p><em><em><a href=\"https://patadovietnam.edu.vn/blog/tieng-anh-giao-tiep/bi-kip-phat-am-tieng-anh-chuan/\" target=\"_blank\">B&iacute; k&iacute;p ph&aacute;t &acirc;m tiếng Anh chuẩn như người bản xứ</a></em><br />\r\n<em><a href=\"https://patadovietnam.edu.vn/blog/tieng-anh-giao-tiep/ending-sounds-tieng-anh/\" target=\"_blank\"><em>L&agrave;m sao để bật ending sounds đ&uacute;ng chuẩn &ndash; tự nhi&ecirc;n?</em></a></em></em></p>\r\n\r\n<p><em><em><em>I. Quy tắc ph&aacute;t &acirc;m đu&ocirc;i ed trong tiếng Anh<br />\r\nĐu&ocirc;i _ed thường xuất hiện khi chia động từ ở&nbsp;<a href=\"https://patadovietnam.edu.vn/blog/chinh-phuc-thi-qua-khu-don/\" target=\"_blank\"><em>th&igrave; qu&aacute; khứ đơn</em></a><em>&nbsp;hoặc động từ dạng ph&acirc;n từ hai. Ngo&agrave;i ra, cũng c&oacute; một số&nbsp;<em>t&iacute;nh từ</em><em>&nbsp;c&oacute; đu&ocirc;i _ed bạn cần lưu &yacute;, v&iacute; dụ:&nbsp;<em>interested, bored, naked&hellip;. D&ugrave; thuộc nh&oacute;m từ loại tiếng Anh n&agrave;o, c&aacute;ch đọc đu&ocirc;i ed cũng cần tuần thủ 3 quy tắc chuẩn dưới đ&acirc;y:<br />\r\n<br />\r\n<em><img alt=\"\" src=\"https://patadovietnam.edu.vn/wp-content/uploads/2020/09/phat-am-duoi-ed_patado12.png\" /></em></em></em></em></em></em></em><br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<p><em><em><em><em><em><em><em><em>Tự tin chinh phục&nbsp;<a href=\"https://patadovietnam.edu.vn/blog/vocab-grammar/5-tu-loai-quan-trong-trong-tieng-anh/\" target=\"_blank\"><em>5 từ loại quan trọng trong tiếng Anh&nbsp;</em></a><em><em>chỉ với v&agrave;i c&aacute;ch đơn giản.</em></em></em></em></em></em></em></em></em></em></p>\r\n\r\n<p><em><em><em><em><em><em><em><em><em><em>1. Đu&ocirc;i _ed được ph&aacute;t ph&aacute;t &acirc;m /id/<br />\r\nVới những từ vựng kết th&uacute;c bằng đu&ocirc;i /t/ hay /d/ khi th&ecirc;m đu&ocirc;i _ed ta đọc l&agrave; /id/.<br />\r\n<br />\r\nV&iacute; dụ:<br />\r\n<br />\r\nWanted /ˈwɑːntɪd/: muốn<br />\r\n<br />\r\ninvited / invaitid/: mời<br />\r\n<br />\r\ninterested /intərəstid/ : th&iacute;ch th&uacute;<br />\r\n<br />\r\n2. Đu&ocirc;i _ed được ph&aacute;t &acirc;m /t/<br />\r\nNhững từ vựng kết th&uacute;c bằng những &acirc;m v&ocirc; thanh bao gồm: /s/, /ʃ/ ~ sh, /tʃ/ ~ ch, /k/, /f/ ~ gh, /p/ khi th&ecirc;m _ed ta đọc th&agrave;nh /t/<br />\r\n<br />\r\nV&iacute; dụ:<br />\r\n<br />\r\nlooked: /lu:kt/: nh&igrave;n<br />\r\nlaughed: /l&aelig;ft/: cười<br />\r\n<br />\r\nmissed: /mist/: nhớ, nhỡ<br />\r\n<br />\r\nwatched: /wa:t&int;t/: xem<br />\r\n<br />\r\nbrushed: /brə&int;t/: đ&aacute;nh, chải<br />\r\n<br />\r\n*Note: &Acirc;m v&ocirc; thanh l&agrave; những &acirc;m khi ch&uacute;ng ta đọc kh&ocirc;ng l&agrave;m rung thanh quản. H&atilde;y đặt tay l&ecirc;n cố họng m&igrave;nh v&agrave; thử đọc c&aacute;c &acirc;m tr&ecirc;n, bạn sẽ thấy &acirc;m ho&agrave;n to&agrave;n được ph&aacute;t ra từ miệng.<br />\r\n<br />\r\n<em><img alt=\"\" src=\"https://patadovietnam.edu.vn/wp-content/uploads/2020/09/phat-am-duoi-ed_patado1-min.png\" /></em></em></em></em></em></em></em></em></em></em></em><br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<p><em><em><em><em><em><em><em><em><em><em><em><em>Kh&aacute;m ph&aacute; chi tiết&nbsp;<a href=\"https://patadovietnam.edu.vn/blog/vocab-grammar/bang-phien-am-ipa/\" target=\"_blank\"><em>bảng IPA &ndash; B&iacute; k&iacute;p ph&aacute;t &acirc;m tiếng Anh đ&uacute;ng chuẩn</em></a></em></em></em></em></em></em></em></em></em></em></em></em></p>\r\n\r\n<p><em><em><em><em><em><em><em><em><em><em><em><em><em>3. Đu&ocirc;i _ed được ph&aacute;t &acirc;m /d/<br />\r\nNgoại trừ c&aacute;c từ vựng thuộc nh&oacute;m hai quy tắc tr&ecirc;n, tất cả những trường hợp c&ograve;n lại khi c&oacute; đu&ocirc;i _ed ta đều đọc th&agrave;nh /d/.<br />\r\n<br />\r\nV&iacute; dụ:<br />\r\n<br />\r\nloved: /lәvd/: y&ecirc;u th&iacute;ch<br />\r\n<br />\r\nscreamed: /skrimd/: la h&eacute;t<br />\r\n<br />\r\nopened: /oupәnd/: mở<br />\r\n<br />\r\nshared: /&int;&epsilon;rd/: chia sẻ<br />\r\n<br />\r\nhugged: /hәgd/: &ocirc;m<br />\r\n<br />\r\nII. Mẹo ghi nhớ c&aacute;ch ph&aacute;t &acirc;m đu&ocirc;i _ed hiệu quả<br />\r\nXem b&agrave;i viết chi tiết v&agrave; đầy đủ&nbsp;<a href=\"https://patadovietnam.edu.vn/blog/vocab-grammar/phat-am-duoi-ed-3-quy-tac/\" target=\"_blank\">tại đ&acirc;y</a></em></em></em></em></em></em></em></em></em></em></em></em></em></p>\r\n', '2023-06-07 11:15:41', '2023-06-07 11:15:41', 0),
(14, 4, 7, 'Tổng Hợp Định Nghĩa Các Loại Động Từ Trong Tiếng Anh Cần Nhớ', '<p><strong><em><a href=\"https://patadovietnam.edu.vn/blog/vocab-grammar/5-tu-loai-quan-trong-trong-tieng-anh/\" target=\"_blank\">Từ loại trong tiếng Anh từ A đến Z</a></em><br />\r\n<br />\r\n<em><a href=\"https://patadovietnam.edu.vn/blog/vocab-grammar/su-hoa-hop-giua-chu-ngu-va-dong-tu/\" target=\"_blank\">10 ph&uacute;t nắm to&agrave;n bộ kiến thức về sự ho&agrave; hợp giữa chủ ngữ v&agrave; động từ tiếng Anh</a></em></strong><br />\r\n<br />\r\n<strong><img alt=\"\" src=\"https://patadovietnam.edu.vn/wp-content/uploads/2020/09/dong-tu-patado.jpg\" /></strong><br />\r\n<strong>1. Động từ trong tiếng Anh chỉ thể chất (Physical verbs)</strong><br />\r\nĐộng từ thể chất l&agrave; một trong những dạng động từ quan trọng trong ngữ ph&aacute;p tiếng Anh. Động từ thể chất l&agrave; những từ m&ocirc; tả h&agrave;nh động nhất định, cụ thể của một người hay vật n&agrave;o đ&oacute;. H&agrave;nh động ấy l&agrave; những chuyển động của cơ thể người v&agrave; vật. Động từ thể chất.<br />\r\n<br />\r\nVD:<br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Bo is running around the lake.&nbsp;<em>(Bo đang chạy xung quanh hồ)</em></li>\r\n	<li>The dog sits on the sofa.&nbsp;<em>(Ch&uacute; ch&oacute; ngồi tr&ecirc;n ghế sofa)</em></li>\r\n</ul>\r\n\r\n<p><br />\r\n<br />\r\n<strong>2. Động từ chỉ trạng th&aacute;i (Stative verbs)</strong><br />\r\nĐộng từ trong tiếng Anh chỉ trạng th&aacute;i l&agrave; những động từ c&oacute; &yacute; nghĩa chỉ c&aacute;c gi&aacute;c quan của con người. Chẳng hạn như suy nghĩ, cảm x&uacute;c, sự tồn tại, nhận thức, trạng th&aacute;i, sự sở hữu, quan điểm&hellip;<br />\r\n<br />\r\nVD:<br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<ul>\r\n	<li>This dish tastes delicious.&nbsp;<em>(M&oacute;n n&agrave;y vị rất ngon)</em></li>\r\n	<li>Mr John seems like a nice guy.&nbsp;<em>(John tr&ocirc;ng giống một ch&agrave;ng trai tốt)</em></li>\r\n</ul>\r\n\r\n<p><br />\r\n<em>Patado đ&atilde; tổng hợp gi&uacute;p bạn một số tips để<a href=\"https://patadovietnam.edu.vn/blog/chinh-phuc-thi-qua-khu-don/\" target=\"_blank\">&nbsp;Chinh phục th&igrave; qu&aacute; khứ đơn một c&aacute;ch dễ d&agrave;ng</a><br />\r\n<br />\r\n<strong>3. Động từ chỉ hoạt động nhận thức (Mental verbs)</strong><br />\r\nĐộng từ chỉ hoạt động nhận thức đề cập đến trạng th&aacute;i nhận thức (giải quyết c&aacute;c vấn đề logic) trong đ&oacute; c&aacute;c h&agrave;nh động chủ yếu l&agrave; h&agrave;nh động trừu tượng. C&aacute;c động từ tinh thần c&oacute; &yacute; nghĩa li&ecirc;n quan đến c&aacute;c kh&aacute;i niệm như kh&aacute;m ph&aacute;, hiểu biết, suy nghĩ hoặc lập kế hoạch.<br />\r\n<br />\r\nVD:</em><br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<ul>\r\n	<li><em>She knows what you want.&nbsp;<em>(C&ocirc; ấy hiểu những g&igrave; bạn muốn)</em></em></li>\r\n	<li><em>I recognized Tom in the crowd.&nbsp;<em>(T&ocirc;i nhận ra Tom giữa đ&aacute;m đ&ocirc;ng)</em></em></li>\r\n	<li><em>Do you understand the lesson today?&nbsp;<em>(Bạn c&oacute; hiểu b&agrave;i học h&ocirc;m nay kh&ocirc;ng?)</em></em></li>\r\n</ul>\r\n\r\n<p><br />\r\n<em><em>Bổ sung th&ecirc;m<a href=\"https://patadovietnam.edu.vn/blog/vocab-grammar/cum-dong-tu-tieng-anh-thong-dung-nhat/\" target=\"_blank\">&nbsp;70 cụm động từ tiếng Anh th&ocirc;ng dụng hay gặp</a>&nbsp;để tự tin giao tiếp tiếng Anh hơn.<br />\r\n<br />\r\n<strong>4. Động từ h&agrave;nh động (Action verb)</strong><br />\r\nĐộng từ h&agrave;nh động, c&ograve;n được gọi l&agrave; động từ động (dynamic verbs) c&oacute; thể n&oacute;i l&agrave; loại động từ phổ biến v&agrave; th&ocirc;ng dụng nhất trong tiếng Anh. Đ&acirc;y l&agrave; những động từ thể hiện, biểu thị một h&agrave;nh động n&agrave;o đ&oacute; về thể chất hoặc tinh thần (physical or mental). N&oacute; thường được d&ugrave;ng để giải th&iacute;ch, diễn giải những sự việc đang được nhắc đến đ&atilde; hoặc đang l&agrave;m g&igrave;.<br />\r\n<br />\r\nMột số động từ h&agrave;nh động phổ biến l&agrave;: Agree (đồng &yacute;), Arrive (đến), Ask (hỏi), Bake (nướng), Bring (mang theo), Build (x&acirc;y dựng), Buy (mua), Give (cho), Go (đi), Help (gi&uacute;p đỡ), Jump (nhảy l&ecirc;n), Kick (đ&aacute;), Laugh (cười lớn), Leave (rời khỏi), Lift (n&acirc;ng l&ecirc;n), Make (l&agrave;m),&hellip;<br />\r\n<br />\r\nVD:</em></em><br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<ul>\r\n	<li><em><em>John visited his parents yesterday.&nbsp;<em>(John đến thăm bố mẹ anh ấy h&ocirc;m qua)</em></em></em></li>\r\n	<li><em><em>We ate dinner then walked around the park.<em>&nbsp;(Ch&uacute;ng t&ocirc;i ăn tối rồi đi dạo quanh c&ocirc;ng vi&ecirc;n)</em></em></em></li>\r\n	<li><em><em>The lightning struck the tree.&nbsp;<em>(S&eacute;t đ&aacute;nh c&aacute;i c&acirc;y)</em></em></em></li>\r\n</ul>\r\n\r\n<p><br />\r\n<em><em><em>Bạn c&ograve;n đang mơ hồ về c&aacute;ch sắp xếp t&iacute;nh từ trong c&acirc;u cho đ&uacute;ng? Xem ngay&nbsp;<a href=\"https://patadovietnam.edu.vn/blog/vocab-grammar/cach-hoc-va-ghi-nho-trat-tu-tinh-tu/\" target=\"_blank\">Trật tự của t&iacute;nh từ tiếng Anh trong c&acirc;u</a><br />\r\n<br />\r\n<strong>5. Ngoại động từ (Transitive verbs)</strong><br />\r\nNgoại động từ l&agrave; những động từ diễn tả một h&agrave;nh động t&aacute;c động đến một người hoặc một vật n&agrave;o kh&aacute;c. Người hoặc vật chịu sự t&aacute;c động của h&agrave;nh động được gọi l&agrave; t&acirc;n ngữ theo sau. Ngoại động từ lu&ocirc;n c&oacute; t&acirc;n ngữ đi sau. C&oacute; c&aacute;c ngoại động từ sau:</em></em></em><br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<ul>\r\n	<li><em><em><em>Ngoại động từ đơn: l&agrave; từ chỉ c&oacute; một t&acirc;n ngữ theo sau.</em></em></em></li>\r\n</ul>\r\n\r\n<p><br />\r\n<em><em><em>VD: I am writing a assignment.<em>&nbsp;(T&ocirc;i đang viết b&agrave;i luận)</em></em></em></em><br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<ul>\r\n	<li><em><em><em><em>Ngoại động từ k&eacute;p: l&agrave; những động từ c&oacute; hai t&acirc;n ngữ trở l&ecirc;n</em></em></em></em></li>\r\n</ul>\r\n\r\n<p><br />\r\n<em><em><em><em>VD: He give me a nice dress.&nbsp;<em>(Anh ấy đưa cho t&ocirc;i một chiếc v&aacute;y đẹp.)<br />\r\n<br />\r\n<br />\r\n<strong>6. Nội động từ (Intransitive verbs)</strong><br />\r\nNội động từ l&agrave; những động từ m&agrave; bản th&acirc;n n&oacute; đ&atilde; n&oacute;i r&otilde; &yacute; nghĩa trong c&acirc;u, kh&ocirc;ng cần phải t&aacute;c động l&ecirc;n một người hay một vật n&agrave;o. Cũng ch&iacute;nh v&igrave; l&yacute; do đ&oacute; m&agrave; nội động từ sẽ kh&ocirc;ng c&oacute; t&acirc;n ngữ đi k&egrave;m v&agrave; kh&ocirc;ng d&ugrave;ng ở thể bị động. Nội động từ diễn tả những h&agrave;nh động nội tại của chủ thể: người hoặc vật thực hiện h&agrave;nh động. Nội động từ thường đứng ngay sau chủ ngữ v&agrave; nếu kh&ocirc;ng c&oacute; trạng từ th&igrave; nội động từ đứng ở cuối c&acirc;u.<br />\r\n<br />\r\nVD:</em></em></em></em></em><br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<ul>\r\n	<li><em><em><em><em><em>The sun rises in West&nbsp;<em>(Mặt trời mọc đằng Đ&ocirc;ng)</em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em>He goes to work by bus everyday.&nbsp;<em>(Anh ấy đi l&agrave;m bằng xe bu&yacute;t h&agrave;ng ng&agrave;y)</em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em>I visited my grandparents yesterday.&nbsp;<em>(T&ocirc;i đến thăm &ocirc;ng b&agrave; h&ocirc;m qua)</em></em></em></em></em></em></li>\r\n</ul>\r\n\r\n<p><br />\r\n<em><em><em><em><em><em>Bạn c&ograve;n lăn tăn về động từ bất quy tắc qu&aacute; nhiều? Xem ngay<a href=\"https://patadovietnam.edu.vn/blog/vocab-grammar/bang-dong-tu-bat-quy-tac/\" target=\"_blank\">&nbsp;Tổng hợp 360 động từ bất quy tắc trong tiếng anh</a>&nbsp;v&agrave; mẹo học.<br />\r\n<br />\r\n<strong>7. Trợ động từ (Auxiliary verbs)</strong><br />\r\nTheo ngữ ph&aacute;p tiếng Anh th&igrave; trợ động từ l&agrave; c&aacute;c động từ gi&uacute;p biến thể một động từ ch&iacute;nh như: have, has, do, does, did, shall, should, will, would, can, be,&hellip; Trợ động từ trong tiếng Anh d&ugrave;ng để bổ sung nghĩa cho động từ ch&iacute;nh. Trợ động từ c&oacute; thể bổ sung về t&iacute;nh chất, mức độ, khả năng, h&igrave;nh th&aacute;i,&hellip; của h&agrave;nh động. Do vậy trợ động từ kh&ocirc;ng thể thay thế cho c&aacute;c động từ ch&iacute;nh (phải lu&ocirc;n c&oacute; động từ ch&iacute;nh đi k&egrave;m) cũng như kh&ocirc;ng được d&ugrave;ng c&ugrave;ng với c&aacute;c loại trợ động từ kh&aacute;c c&ugrave;ng loại.<br />\r\n<br />\r\n<img alt=\"\" src=\"https://patadovietnam.edu.vn/wp-content/uploads/2020/09/dong-tu-tieng-anh-9.jpg\" /><br />\r\n<br />\r\n<strong><em>Trợ động từ ch&iacute;nh (Principal auxiliary verbs)</em></strong><br />\r\nHay c&ograve;n gọi l&agrave; trợ động từ cơ bản, bao gồm c&aacute;c động từ be, have, do được d&ugrave;ng với động từ kh&aacute;c để chỉ th&igrave;, thể v&agrave; d&ugrave;ng để th&agrave;nh lập c&acirc;u hỏi hoặc c&acirc;u phủ định.<br />\r\n<br />\r\nVD:</em></em></em></em></em></em><br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<ul>\r\n	<li><em><em><em><em><em><em>The children are playing football in the yard (Bọn trẻ đang chơi đ&aacute; b&oacute;ng trong s&acirc;n)</em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em>I have learnt English for 5 years. (T&ocirc;i đ&atilde; học tiếng Anh 5 năm)</em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em>Do you go to school by car? (Bạn đi học bằng xe &ocirc; t&ocirc; &agrave;?)</em></em></em></em></em></em></li>\r\n</ul>\r\n\r\n<p><br />\r\n<em><em><em><em><em><em><em>Để giao tiếp tốt th&igrave; cần ph&aacute;t &acirc;m chuẩn,&nbsp;<a href=\"https://patadovietnam.edu.vn/blog/vocab-grammar/phat-am-duoi-s-es-3-quy-tac/\" target=\"_blank\">C&aacute;ch ph&aacute;t &acirc;m s/es trong tiếng Anh</a>&nbsp;l&agrave; một phần rất quan trọng nh&eacute;.<br />\r\n<br />\r\n<strong><em>Trợ động từ t&igrave;nh th&aacute;i (Modal auxiliary verbs)</em></strong><br />\r\nHay c&ograve;n gọi l&agrave; trợ động từ khuyết thiếu , được d&ugrave;ng trước h&igrave;nh thức nguy&ecirc;n thể (bare-infinitive) của động từ kh&aacute;c để chỉ khả năng, sự chắc chắn, sự cho ph&eacute;p, nghĩa vụ,&hellip;<br />\r\n<br />\r\nTa c&oacute; c&aacute;c trợ động từ t&igrave;nh th&aacute;i sau: Can (c&oacute; thể), could (c&oacute; thể), may (c&oacute; lẽ), should (n&ecirc;n), must (phải), have to (phải),&hellip;<br />\r\n<br />\r\nVD:</em></em></em></em></em></em></em><br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<ul>\r\n	<li><em><em><em><em><em><em><em>You should study harder (Bạn n&ecirc;n học chăm hơn)</em></em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em><em>She have to come back home before 12 A.M (C&ocirc; ấy phải về nh&agrave; trước 12 giờ)</em></em></em></em></em></em></em></li>\r\n</ul>\r\n\r\n<p><br />\r\n<br />\r\n<em><em><em><em><em><em><em><strong><a href=\"https://patadovietnam.edu.vn/blog/vocab-grammar/phan-loai-dong-tu-tieng-anh/\" target=\"_blank\">C&Aacute;C BẠN C&Oacute; THỂ XEM TH&Ecirc;M CHI TIẾT TẠI Đ&Acirc;Y</a></strong></em></em></em></em></em></em></em></p>\r\n', '2023-06-07 11:18:04', '2023-06-07 11:18:04', 0),
(15, 4, 10, 'Bài Tập Về Danh Từ Trong Tiếng Anh Hay Nhất (có Đáp Án)', '<p><strong><em><a href=\"https://patadovietnam.edu.vn/blog/vocab-grammar/bang-dong-tu-bat-quy-tac/\" target=\"_blank\">Bảng 360 động từ bất quy tắc trong tiếng Anh</a></em><br />\r\n<br />\r\n<em><a href=\"https://patadovietnam.edu.vn/blog/vocab-grammar/dai-tu-trong-tieng-anh/\" target=\"_blank\">Đại từ trong tiếng anh</a></em><br />\r\n<br />\r\n<em><a href=\"https://patadovietnam.edu.vn/blog/vocab-grammar/cau-truc-cau-tieng-anh/\" target=\"_blank\">C&aacute;c cấu tr&uacute;c c&acirc;u trong tiếng Anh</a></em></strong><br />\r\n<br />\r\n<strong><img alt=\"\" src=\"https://patadovietnam.edu.vn/wp-content/uploads/2021/03/bai-tap-danh-tu-patado.jpg\" /></strong><br />\r\n<br />\r\n<strong><a href=\"https://patadovietnam.edu.vn/blog/vocab-grammar/danh-tu-tieng-anh/\" target=\"_blank\">Danh từ tiếng Anh</a>&nbsp;(Noun) l&agrave; một trong&nbsp;<a href=\"https://patadovietnam.edu.vn/blog/vocab-grammar/tu-loai/\" target=\"_blank\">9 từ loại trong tiếng Anh</a>.</strong><br />\r\n<strong>&Ocirc;N TẬP LẠI KIẾN THỨC TRƯỚC KHI L&Agrave;M B&Agrave;I TẬP,&nbsp;<a href=\"https://patadovietnam.edu.vn/blog/vocab-grammar/bai-tap-danh-tu/\" target=\"_blank\">THỰC H&Agrave;NH TH&Ecirc;M B&Agrave;I TẬP TẠI Đ&Acirc;Y</a></strong><br />\r\n<strong>B&agrave;i 1: Viết dạng danh từ số nhiều từ những danh từ số &iacute;t cho trước dưới đ&acirc;y:</strong><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li>cat</li>\r\n	<li>dog</li>\r\n	<li>house</li>\r\n	<li>potato</li>\r\n	<li>tomato</li>\r\n	<li>class</li>\r\n	<li>box</li>\r\n	<li>watch</li>\r\n	<li>bush</li>\r\n	<li>kilo</li>\r\n	<li>photo</li>\r\n	<li>piano</li>\r\n	<li>country</li>\r\n	<li>baby</li>\r\n	<li>fly</li>\r\n	<li>day</li>\r\n	<li>boy</li>\r\n	<li>leaf</li>\r\n	<li>loaf</li>\r\n	<li>man</li>\r\n	<li>foot</li>\r\n	<li>mouse</li>\r\n	<li>child</li>\r\n	<li>sheep</li>\r\n	<li>hero</li>\r\n</ol>\r\n\r\n<p><br />\r\n<br />\r\nĐ&Aacute;P &Aacute;N<br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li>cats</li>\r\n	<li>dogs</li>\r\n	<li>houses</li>\r\n	<li>potatoes</li>\r\n	<li>tomatoes</li>\r\n	<li>classes</li>\r\n	<li>boxes</li>\r\n	<li>watches</li>\r\n	<li>bushes</li>\r\n	<li>kilos</li>\r\n	<li>photos</li>\r\n	<li>pianos</li>\r\n	<li>countries</li>\r\n	<li>babies</li>\r\n	<li>flies</li>\r\n	<li>days</li>\r\n	<li>boys</li>\r\n	<li>leaves</li>\r\n	<li>loaves</li>\r\n	<li>men</li>\r\n	<li>feet</li>\r\n	<li>mice</li>\r\n	<li>children</li>\r\n	<li>sheep</li>\r\n	<li>heroes</li>\r\n</ol>\r\n\r\n<p><br />\r\n<em><strong>Bạn c&oacute; nhầm lẫn&nbsp;<a href=\"https://patadovietnam.edu.vn/blog/vocab-grammar/danh-dong-tu-tieng-anh/\" target=\"_blank\">danh động từ&nbsp;</a>với danh từ? T&igrave;m hiểu ngay.</strong><br />\r\n<br />\r\n<strong>B&agrave;i 2: Chọn danh từ dưới dạng số &iacute;t hoặc số nhiều sao cho ph&ugrave; hợp cho những c&acirc;u dưới đ&acirc;y:</strong></em><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>There are a lot of beautiful _____.</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>trees</em></li>\r\n	<li><em>tree</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>There are two _____ in the shop.</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>women</em></li>\r\n	<li><em>woman</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>Do you wear _____?</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>glasses</em></li>\r\n	<li><em>glass</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>I don&rsquo;t like _____. I&rsquo;m afraid of them.</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>mice</em></li>\r\n	<li><em>mouse</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>I need a new pair of _____.</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>jean</em></li>\r\n	<li><em>jeans</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>He is married and has two _____.</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>child</em></li>\r\n	<li><em>children</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>There was a woman in the car with two _____.</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>man</em></li>\r\n	<li><em>men</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>How many _____ do you have in your bag?</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>keys</em></li>\r\n	<li><em>key</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>I like your ______. Where did you buy it?</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>trousers</em></li>\r\n	<li><em>trouser</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>He put on his _____ and went to bed.</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>pyjama</em></li>\r\n	<li><em>pyjamas</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>These _____ aren&rsquo;t very sharp.</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>scissor</em></li>\r\n	<li><em>scissors</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>There are three windows in the ______.</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>house</em></li>\r\n	<li><em>houses</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>My father has a new _____.</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>jobs</em></li>\r\n	<li><em>job</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>I have four ______.</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>dictionary</em></li>\r\n	<li><em>dictionaries</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>Most of my friends are _____.</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>student</em></li>\r\n	<li><em>students</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>There is one _____ on the floor.</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>mouse</em></li>\r\n	<li><em>mice</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>We have _____.</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>car</em></li>\r\n	<li><em>cars</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>They are riding their _____.</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>bicycle</em></li>\r\n	<li><em>bicycles</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>There are three _____ on my desk.</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>books</em></li>\r\n	<li><em>book</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>I have two _____.</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>babies</em></li>\r\n	<li><em>baby</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>We arrived here two _____ ago.</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>day</em></li>\r\n	<li><em>days</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>There are only _____ at our school.</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>boy</em></li>\r\n	<li><em>boys</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>You are too old to play with _____.</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>toys</em></li>\r\n	<li><em>toy</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>Where is your _____?</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>toys</em></li>\r\n	<li><em>toy</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>_____ and gentleman, I&rsquo;d like to invite you.</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>Lady</em></li>\r\n	<li><em>Ladies</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>______ are stronger than girls.</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>Boys</em></li>\r\n	<li><em>Boy</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>She is a real _____.</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>ladies</em></li>\r\n	<li><em>lady</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>What _____ is it today?</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>days</em></li>\r\n	<li><em>day</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>There is a _____ on the cake.</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>fly</em></li>\r\n	<li><em>flies</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>How are your _____ today?</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em>babies</em></li>\r\n	<li><em>baby</em></li>\r\n</ol>\r\n\r\n<p><br />\r\n<em><em>Bạn c&ograve;n mơ hồ về&nbsp;<a href=\"https://patadovietnam.edu.vn/blog/vocab-grammar/su-hoa-hop-giua-chu-ngu-va-dong-tu/\" target=\"_blank\">sự h&ograve;a hợp giữa động từ với chủ ngữ v&agrave; động từ</a>? C&ugrave;ng t&igrave;m hiểu ngay nh&eacute;.<br />\r\n<br />\r\nĐ&Aacute;P &Aacute;N</em></em><br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em><em>trees</em></em></li>\r\n	<li><em><em>women</em></em></li>\r\n	<li><em><em>glasses</em></em></li>\r\n	<li><em><em>mice</em></em></li>\r\n	<li><em><em>jeans</em></em></li>\r\n	<li><em><em>children</em></em></li>\r\n	<li><em><em>men</em></em></li>\r\n	<li><em><em>keys</em></em></li>\r\n	<li><em><em>trousers</em></em></li>\r\n	<li><em><em>pyjama</em></em></li>\r\n	<li><em><em>scissors</em></em></li>\r\n	<li><em><em>house</em></em></li>\r\n	<li><em><em>job</em></em></li>\r\n	<li><em><em>dictionaries</em></em></li>\r\n	<li><em><em>student</em></em></li>\r\n	<li><em><em>mouse</em></em></li>\r\n	<li><em><em>cars</em></em></li>\r\n	<li><em><em>bicycles</em></em></li>\r\n	<li><em><em>books</em></em></li>\r\n	<li><em><em>babies</em></em></li>\r\n	<li><em><em>days</em></em></li>\r\n	<li><em><em>boy</em></em></li>\r\n	<li><em><em>toy</em></em></li>\r\n	<li><em><em>toys</em></em></li>\r\n	<li><em><em>ladies</em></em></li>\r\n	<li><em><em>boys</em></em></li>\r\n	<li><em><em>lady</em></em></li>\r\n	<li><em><em>day</em></em></li>\r\n	<li><em><em>fly</em></em></li>\r\n	<li><em><em>baby</em></em></li>\r\n</ol>\r\n\r\n<p><br />\r\n<br />\r\n<em><em><em>Patado bật m&iacute;&nbsp;<a href=\"https://patadovietnam.edu.vn/blog/vocab-grammar/3-tips-lam-bai-tap-trang-tu-tieng-anh/\" target=\"_blank\">một số mẹo nhỏ xử l&yacute; nhanh gọn b&agrave;i t&acirc;p trạng từ.</a><br />\r\n<br />\r\n<br />\r\n<strong>B&agrave;i tập về danh từ đếm được v&agrave; danh từ kh&ocirc;ng đếm được</strong><br />\r\n<strong>B&agrave;i 1: Lựa chọn những danh từ dưới đ&acirc;y v&agrave;o nh&oacute;m danh từ đếm được hoặc kh&ocirc;ng đếm được:</strong></em></em></em><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em><em><em>apple</em></em></em></li>\r\n	<li><em><em><em>bread</em></em></em></li>\r\n	<li><em><em><em>boy</em></em></em></li>\r\n	<li><em><em><em>cup</em></em></em></li>\r\n	<li><em><em><em>computer</em></em></em></li>\r\n	<li><em><em><em>money</em></em></em></li>\r\n	<li><em><em><em>table</em></em></em></li>\r\n	<li><em><em><em>milk</em></em></em></li>\r\n	<li><em><em><em>pen</em></em></em></li>\r\n	<li><em><em><em>water</em></em></em></li>\r\n	<li><em><em><em>car</em></em></em></li>\r\n	<li><em><em><em>chair</em></em></em></li>\r\n	<li><em><em><em>flour</em></em></em></li>\r\n	<li><em><em><em>bicycle</em></em></em></li>\r\n	<li><em><em><em>cheese</em></em></em></li>\r\n	<li><em><em><em>grass</em></em></em></li>\r\n	<li><em><em><em>person</em></em></em></li>\r\n	<li><em><em><em>hand</em></em></em></li>\r\n	<li><em><em><em>coffee</em></em></em></li>\r\n	<li><em><em><em>tooth</em></em></em></li>\r\n	<li><em><em><em>bus</em></em></em></li>\r\n	<li><em><em><em>butter</em></em></em></li>\r\n	<li><em><em><em>house</em></em></em></li>\r\n	<li><em><em><em>book</em></em></em></li>\r\n	<li><em><em><em>information</em></em></em></li>\r\n	<li><em><em><em>news</em></em></em></li>\r\n	<li><em><em><em>sugar</em></em></em></li>\r\n	<li><em><em><em>tree</em></em></em></li>\r\n	<li><em><em><em>wine</em></em></em></li>\r\n	<li><em><em><em>potato</em></em></em></li>\r\n</ol>\r\n\r\n<p><br />\r\n<br />\r\n<em><em><em><em>Bổ sung ngay&nbsp;<a href=\"https://patadovietnam.edu.vn/blog/vocab-grammar/cum-dong-tu-tieng-anh-thong-dung-nhat/\" target=\"_blank\">70 cụm động từ tiếng Anh</a>&nbsp;để giao tiếp tiếng Anh tr&ocirc;i chảy hơn.<br />\r\n<br />\r\n<br />\r\nĐ&Aacute;P &Aacute;N</em></em></em></em><br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<ul>\r\n	<li><em><em><em><em>Danh từ đếm được: apple (quả t&aacute;o), boy (con trai), cup (c&aacute;i cốc), computer (m&aacute;y t&iacute;nh), table (b&agrave;n), pen (b&uacute;t), car (xe &ocirc; t&ocirc;), chair (ghế), bicycle (xe đạp), person (người), hand (tay), tooth (răng), bus (xe bu&yacute;t), house (nh&agrave;), book (s&aacute;ch), tree (c&acirc;y), potato (khoai t&acirc;y).</em></em></em></em></li>\r\n	<li><em><em><em><em>Danh từ kh&ocirc;ng đếm được: bread (b&aacute;nh m&igrave;), money (tiền), milk (sữa), water (nước), flour (bột), cheese (ph&ocirc; mai), grass (cỏ), coffee (c&agrave; ph&ecirc;), butter (bơ), information (th&ocirc;ng tin), news (tin tức), sugar (đường), wine (rượu).</em></em></em></em></li>\r\n</ul>\r\n\r\n<p><br />\r\n<br />\r\n<em><em><em><em><strong>B&agrave;i 2: Lựa chọn danh từ ph&ugrave; hợp để điền v&agrave;o những c&acirc;u dưới đ&acirc;y</strong></em></em></em></em><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em><em><em><em>I must buy _______ for breakfast.</em></em></em></em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em><em><em><em>some bread</em></em></em></em></li>\r\n	<li><em><em><em><em>a bread</em></em></em></em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em><em><em><em>It&rsquo;s very difficult to find a ______ at the moment.</em></em></em></em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em><em><em><em>work</em></em></em></em></li>\r\n	<li><em><em><em><em>job</em></em></em></em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em><em><em><em>She gave me some good _______.</em></em></em></em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em><em><em><em>advice</em></em></em></em></li>\r\n	<li><em><em><em><em>advices</em></em></em></em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em><em><em><em>I&rsquo;m sorry for being late. I had ______ with my car this morning.</em></em></em></em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em><em><em><em>trouble</em></em></em></em></li>\r\n	<li><em><em><em><em>troubles</em></em></em></em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em><em><em><em>The apartment is empty. They haven&rsquo;t got any _______ yet.</em></em></em></em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em><em><em><em>furniture</em></em></em></em></li>\r\n	<li><em><em><em><em>furnitures</em></em></em></em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em><em><em><em>I want to write some letters. I need _______.</em></em></em></em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em><em><em><em>a writing paper</em></em></em></em></li>\r\n	<li><em><em><em><em>some writing paper</em></em></em></em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em><em><em><em>We had _________ when we were in Greece.</em></em></em></em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em><em><em><em>very good weather</em></em></em></em></li>\r\n	<li><em><em><em><em>a very good weather</em></em></em></em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em><em><em><em>When the fire started, there was _______.</em></em></em></em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em><em><em><em>a complete chaos</em></em></em></em></li>\r\n	<li><em><em><em><em>complete chaos</em></em></em></em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em><em><em><em>I want something to read. I&rsquo;m going to buy _______.</em></em></em></em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em><em><em><em>some paper</em></em></em></em></li>\r\n	<li><em><em><em><em>a paper</em></em></em></em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em><em><em><em>Bad news _______ make anybody happy.</em></em></em></em></li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em><em><em><em>don&rsquo;t</em></em></em></em></li>\r\n	<li><em><em><em><em>doesn&rsquo;t</em></em></em></em></li>\r\n</ol>\r\n\r\n<p><br />\r\n<br />\r\n<em><em><em><em><em>Patado chia sẻ đến bạn&nbsp;<a href=\"https://patadovietnam.edu.vn/blog/vocab-grammar/80-cau-truc-cau-tieng-anh/\" target=\"_blank\">80 cấu tr&uacute;c c&acirc;u th&ocirc;ng dụng trong tiếng Anh</a>&nbsp;đầy đủ v&agrave; chi tiết.<br />\r\n<br />\r\n<br />\r\nĐ&Aacute;P &Aacute;N</em></em></em></em></em><br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em><em><em><em><em>some bread</em></em></em></em></em></li>\r\n	<li><em><em><em><em><em>job</em></em></em></em></em></li>\r\n	<li><em><em><em><em><em>advice</em></em></em></em></em></li>\r\n	<li><em><em><em><em><em>trouble</em></em></em></em></em></li>\r\n	<li><em><em><em><em><em>furniture</em></em></em></em></em></li>\r\n	<li><em><em><em><em><em>some writing paper</em></em></em></em></em></li>\r\n	<li><em><em><em><em><em>very good weather</em></em></em></em></em></li>\r\n	<li><em><em><em><em><em>a complete chaos</em></em></em></em></em></li>\r\n	<li><em><em><em><em><em>some paper</em></em></em></em></em></li>\r\n	<li><em><em><em><em><em>doesn&rsquo;t</em></em></em></em></em></li>\r\n</ol>\r\n\r\n<p><br />\r\n<em><em><em><em><em><strong>B&agrave;i 3: Điền những từ cho trước v&agrave;o những c&acirc;u b&ecirc;n dưới sao cho th&iacute;ch hợp:</strong><br />\r\n<em>advice, jam, meat, oil, rice, tennis, chocolate, lemonade, milk, tea</em></em></em></em></em></em><br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<ul>\r\n	<li><em><em><em><em><em><em>a piece of ___</em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em>a bar of ___</em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em>a cup of ___</em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em>a bottle of ___</em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em>a barrel of ___</em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em>a game of ___</em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em>a packet of ___</em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em>a glass of ___</em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em>a slice of ___</em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em>a jar of ___</em></em></em></em></em></em></li>\r\n</ul>\r\n\r\n<p><br />\r\n<em><em><em><em><em><em>Đ&Aacute;P &Aacute;N</em></em></em></em></em></em><br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<ul>\r\n	<li><em><em><em><em><em><em>a piece of advice</em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em>a bar of chocolate</em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em>a cup of tea</em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em>a bottle of lemonade</em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em>a barrel of oil</em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em>a game of tennis</em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em>a packet of rice</em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em>a glass of milk</em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em>a slice of meat</em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em>a jar of jam</em></em></em></em></em></em></li>\r\n</ul>\r\n\r\n<p><br />\r\n<em><em><em><em><em><em><em>C&ugrave;ng Patado kh&aacute;m ph&aacute; chi tiết&nbsp;<a href=\"https://patadovietnam.edu.vn/blog/vocab-grammar/bang-phien-am-ipa/\" target=\"_blank\"><em>bảng IPA &ndash; B&iacute; k&iacute;p ph&aacute;t &acirc;m tiếng Anh đ&uacute;ng chuẩn</em></a><br />\r\n<br />\r\n<br />\r\n<strong>B&agrave;i tập về danh từ cụ thể v&agrave; danh từ trừu tượng</strong><br />\r\n<strong>B&agrave;i 1: T&igrave;m danh từ cụ thể v&agrave; danh từ trừu tượng trong những c&acirc;u dưới đ&acirc;y</strong></em></em></em></em></em></em></em><br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em><em><em><em><em><em><em>The principal asked all the students to think about the importance of friendship.</em></em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em><em>I wore a beautiful dress to the concert.</em></em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em><em>I respected the honesty my friend showed.</em></em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em><em>Can you believe that woman&rsquo;s brilliance?</em></em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em><em>We have a lot of hope for the future.</em></em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em><em>The men had much bravery on the battlefield</em></em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em><em>The boy was rewarded for his intelligence.</em></em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em><em>Fear made the child tremble.</em></em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em><em>She thought that happiness was the most important thing in life.</em></em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em><em>Mr. Long showes his creativity on this project.</em></em></em></em></em></em></em></li>\r\n</ol>\r\n\r\n<p><br />\r\n<em><em><em><em><em><em><em>Đ&Aacute;P &Aacute;N</em></em></em></em></em></em></em><br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em><em><em><em><em><em><em>Danh từ cụ thể: principal (hiệu trưởng), students (học sinh). Danh từ trừu tượng: importance (tầm quan trọng), friendship (t&igrave;nh bạn).</em></em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em><em>Danh từ cụ thể: dress (v&aacute;y), concert (buổi ca nhạc).</em></em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em><em>Danh từ trừu tượng: honesty (sự thật th&agrave;).</em></em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em><em>Danh từ trừu tượng: brilliance (sự th&ocirc;ng minh).</em></em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em><em>Danh từ trừu tượng: hope (sự hy vọng).</em></em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em><em>Danh từ cụ thể: battlefield (s&agrave;n đấu) Danh từ trừu tượng: bravery (sự dũng cảm).</em></em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em><em>Danh từ cụ thể: child (đứa trẻ). Danh từ trừu tượng: intelligence (sự th&ocirc;ng minh).</em></em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em><em>Danh từ cụ thể: award (giải thưởng). Danh từ trừu tượng: courage (sự dũng cảm).</em></em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em><em>Danh từ trừu tượng: happiness (sự hạnh ph&uacute;c).</em></em></em></em></em></em></em></li>\r\n	<li><em><em><em><em><em><em><em>Danh từ cụ thể: project (dự &aacute;n). Danh từ trừu tượng: creativity (sự s&aacute;ng tạo).</em></em></em></em></em></em></em></li>\r\n</ol>\r\n', '2023-06-07 11:25:25', '2023-06-07 11:25:25', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `numb` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `answer_1` varchar(255) NOT NULL,
  `answer_2` varchar(255) NOT NULL,
  `answer_3` varchar(255) NOT NULL,
  `answer_4` varchar(255) NOT NULL,
  `correct_answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `questions`
--

INSERT INTO `questions` (`question_id`, `exam_id`, `numb`, `content`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `correct_answer`) VALUES
(23, 13, 1, 'My wife handles most of the chores around house. She is a_____________.', 'homemaker', 'employer', 'breadwinner', 'assistant', 1),
(24, 13, 2, 'They have just bought a new house with a huge amount of money, therefore, there is a _________ on them. They have to work hard to earn money to pay the bank.', 'physical strength', 'financial burden', 'household chore', 'positive atmosphere', 3),
(25, 13, 3, 'Women whose husbands do not contribute to the household chores are more_______to illness.', 'critical', 'vulnerable', 'responsible', 'positive', 2),
(26, 13, 4, 'Men who share housework_________to have better relationships with his wives.', 'earn', 'divorce', 'tend', 'create', 1),
(27, 13, 5, 'Why ____ you always ____ over spilt milk? I am tired of what you say.', 'are - crying', 'do – cry', 'do - drink', 'are - drink', 2),
(28, 13, 6, 'I suppose as we live in a very rural area, we are lucky that a train service actually …… here.', 'takes', 'works', 'functions', 'operates', 1),
(29, 13, 7, 'He …… trying to pass his driving test but fails every time.', 'keeps', 'kept', 'is keeping ', 'had kept', 2),
(30, 13, 8, 'My mother is not _________________ because we are eating out today.', 'watering the houseplants', 'doing the laundry', 'doing the cooking', 'folding the clothes', 1),
(31, 13, 9, 'If parents behave well, they will__________a good example for their children.', 'do', 'take', 'set', 'buy', 4),
(32, 13, 10, '_______are food and other goods sold at a shop or a supermarket.', 'Benefits', 'Burdens', 'Chores', 'Groceries', 3),
(33, 14, 1, 'Choose the word which has a different stress pattern from that of the others.', 'energy', 'finally', 'hospital', 'denial', 3),
(34, 14, 2, 'Choose the word which has a different stress pattern from that of the others.', 'beautiful', 'consumption', 'offensive', 'aquatic', 3),
(35, 14, 3, 'Choose the word which has a different stress pattern from that of the others.', 'organize', 'picturesque', 'engineer', 'afternoon', 2),
(36, 14, 4, 'Choose the word which has a different stress pattern from that of the others.', 'article', 'chemical', 'etiquette', 'Japanese', 4),
(37, 14, 5, 'Choose the word which has a different stress pattern from that of the others.', 'employee', 'committee', 'referee', 'absentee', 3),
(38, 14, 6, 'Choose the word which has a different stress pattern from that of the others.', 'pesticide', 'habitat', 'important', 'adventure', 3),
(39, 14, 7, 'Choose the word which has a different stress pattern from that of the others.', 'confusion', 'degraded', 'editor', 'pollutant', 3),
(40, 14, 8, 'Choose the word which has a different stress pattern from that of the others.', 'dangerous', 'harmony', 'natural', 'mountaineer', 4),
(41, 14, 9, 'Choose the word which has a different stress pattern from that of the others.', 'animal', 'destruction', 'unfriendly', 'solution', 3),
(42, 14, 10, 'Choose the word which has a different stress pattern from that of the others.', 'government', 'understand', 'mystery', 'tropical', 2),
(43, 14, 11, 'There is a ...................... water because it hasn’t rained for a long time.  A. short', 'shortage', 'short', 'shortest', 'shorter', 1),
(44, 14, 12, 'One of the aims of Greenpeace is to .................... of the environmental problems facing our planet.', 'take responsibility', 'arouse interest', 'raise concern', 'raise awareness', 4),
(45, 14, 13, 'The creation of nature reserves will help to ensure the .................. of many endangered species', 'extinction', 'survival', 'elimination', 'disappearance', 2),
(46, 14, 14, '____________ are very anxious about the falling rhino population.', 'Environmentalists', 'Conservationists', 'Naturalists', 'Environmental activities', 3),
(47, 14, 15, 'Earth day was started by John McConnell in 1970 as a way to make people .............. the problems of the environment.', 'attention to', 'responsible with', 'aware of', 'attentive to', 3),
(48, 14, 16, 'The heavily polluted water near the factory .................. the safety of the local people.', 'endangers', 'preserves', 'contaminates', 'is threatened', 1),
(49, 14, 17, 'The huge oil slick is moving slowly towards Ireland, and several miles of coastline are under ....................', 'threat', 'stake', 'pressure', 'damage', 1),
(50, 14, 18, 'Tornadoes are very dangerous because there is ................., and people do not have much time to find a safe place', 'small warning', 'a lot of warning', 'little warning', 'few warning', 3),
(51, 14, 19, 'We admire Lucy for her intelligence, cheerful disposition and ................', 'honest', 'honestly', 'honesty', 'honested', 2),
(52, 14, 20, 'Several ..................... are known to cause cancer to develop.', 'chemist', 'chemistry', 'chemical', 'chemicals', 4),
(53, 14, 21, '“Thank you so much for your support” - ...........................................', 'Welcome! It’s very nice of you', 'Well done', 'There is nothing I can do about it', 'It&#39; s my pleasure', 1),
(54, 14, 22, 'Farmers can enrich the soil by using ......................', 'fertile', 'fertility', 'fertilizers', 'fertilize', 3),
(55, 14, 23, 'Sugar is the ....................... of healthy teeth.', 'destruction', 'destructively', 'destroying', 'destroyer', 1),
(56, 14, 24, 'The river has been polluted with toxic waste from ..................... factories.', 'local', 'locate', 'locally', 'locality', 1),
(57, 14, 25, 'Why aren’t you coming with us ? - ................................', 'That’s why I don’t like going out', 'I have too much assignments to do. I’m sorry', 'I was very tired. That’s why', 'I don’t agree. I’m afraid', 2),
(58, 14, 26, 'Hello, Jim. I didn’t expect to see you today. Sonia said you .................. ill.', 'are', 'were', 'was', 'should be', 2),
(59, 14, 27, 'The man .................... that he had done this before and that he had some experience in the field.', 'told', 'said me', 'talked', 'said', 1),
(60, 14, 28, 'A nuclear reactor releases radiation which is .......... ..... to the environment.', 'dangerous', 'endangered', 'in danger', 'danger', 1),
(61, 14, 29, 'Human ................. have not shown their intention to live in harmony with the nature.', 'race', 'beings', 'being', 'kind', 2),
(62, 14, 30, 'The poor people in the city ................... terrible suffering as a result of disaster.', 'have experienced', 'had experienced', 'experience', 'have been experienced', 1),
(63, 14, 31, 'Jack asked me ____.', 'where do you come from?', 'where I came from', 'where I come from ', 'where did I come from?', 3),
(64, 14, 32, 'The last time I saw Linda, she looked very relaxed. She explained she&#39;d been on holiday the ____ week.', 'ago', 'following', 'next', 'previous', 4),
(65, 14, 33, 'The doctor ____ him to take more exercise.', 'told', 'tell', 'have told', 'are telling', 1),
(66, 14, 34, 'The builders have ____ that everything will be ready on time.', 'promised', 'promise', 'promises', 'promising', 1),
(67, 14, 35, 'I rang my friend in Australia yesterday, and she said it ____ raining there.', 'is', 'were', 'has been', 'was', 4),
(68, 14, 36, 'She asked me ____ I liked pop music.', 'when', 'what', 'if', 'x', 3),
(69, 14, 37, 'The doctor ____ him to take more exercise.', 'told', 'tell', 'have told', 'are telling', 1),
(70, 14, 38, 'I wanted to know ____ return home.', 'when would she ', 'when will she ', 'when she will ', 'when she would', 4),
(71, 14, 39, 'Claire told me that her father ____ a race horse.', 'owns', 'owned', 'owing', 'A and B', 2),
(72, 14, 40, 'What did that man say ____?', 'at you', 'for you', 'to you', 'you', 3),
(73, 15, 1, 'Choose the word which has a different stress pattern from that of the others.', 'alert', 'alter', 'altar', 'album', 3),
(74, 15, 2, 'Choose the word which has a different stress pattern from that of the others.', 'ancestor', 'article', 'assignment', 'additive', 2),
(75, 15, 3, 'Choose the word which has a different stress pattern from that of the others.', 'decent', 'descent', 'detect', 'debase', 3),
(76, 15, 4, 'Choose the word which has a different stress pattern from that of the others.', 'venture', 'magpie', 'object', 'fortune', 2),
(77, 15, 5, 'Choose the word which has a different stress pattern from that of the others.', 'deplete', 'balloon', 'arrange', 'impact', 3),
(78, 15, 6, 'Choose the word which has a different stress pattern from that of the others.', 'prefer', 'present', 'prepare', 'pretend', 2),
(79, 15, 7, 'Choose the word which has a different stress pattern from that of the others.', 'react', 'remain', 'rebel', 'refuse', 2),
(80, 15, 8, 'Choose the word which has a different stress pattern from that of the others.', 'image', 'immigrate', 'imitate', 'import', 2),
(81, 15, 9, 'Choose the word which has a different stress pattern from that of the others.', 'percent', 'perfect', 'perform', 'perhaps', 4),
(82, 15, 10, 'Choose the word which has a different stress pattern from that of the others.', 'confident', 'concern', 'contrast', 'constant', 3),
(83, 15, 11, 'The club has members from many different cultural .......................', 'nations', 'features', 'manners', 'backgrounds', 4),
(84, 15, 12, 'It is a .......................... belief that broken mirrors will bring bad luck.', 'usual', 'normal', 'similar', 'common', 4),
(85, 15, 13, 'Thank you. That was ...................... very nice lunch.', 'a', 'an', 'the', 'x', 1),
(86, 15, 14, 'Halley was excited to be his friend’s .................... in his wedding.', 'close man', 'closest man', 'best man', 'better man', 3),
(87, 15, 15, 'Get off the bus .............................. it stops.', 'so quick as', 'so fast as', 'so soon as', 'as soon as', 4),
(88, 15, 16, 'After ....................... lunch, we went for a walk by ..................... sea.', 'the/the', 'x/x', 'x/the', 'the/x', 1),
(89, 15, 17, 'The French language lost its official ...................., And English became the speech not only of the common people but of courts and parliament as well.', 'pretigious', 'prestige', 'fame', 'famous', 2),
(90, 15, 18, 'I never listen to ................. radio. In fact I haven’t got .............. radio.', 'a/a', 'a/the', 'the/the', 'the/a', 2),
(91, 15, 19, 'Today, fathers are taking .................... role in caring for children and helping out around the house.', 'a more active', 'more active', 'the more active', 'as active', 1),
(92, 15, 20, 'We live at ......................third house from the church.', 'the', 'a', 'an ', 'x', 1),
(93, 15, 21, 'Throughout the world there are different (1)_________ for people to greet each other. In much of the world, a handshake is the common form of welcoming and greeting someone.', 'means', 'ways', 'methods', 'techniques', 2),
(94, 15, 22, 'It can be a very (2)_________ surprise if you expect to shake hands and get a kiss or a hug instead.', 'huge', 'large', 'big', 'great', 4),
(95, 15, 23, 'At times, it is difficult to tell what sort of greeting (3)_________ is followed.', 'habit', 'routine', 'custom', 'tradition', 0),
(96, 15, 24, 'In some places people just smile, look at (4) _________ face and say nothing.', 'each other', 'the others', 'theirs', 'the other&#39;s', 4),
(97, 15, 25, 'Most people in the world are tolerant of, visitors and don’t mind what travelers do that seems wrong as long as the visitors are (5) _________ . ', 'sincere', 'truthful', 'faithful', 'hopeful', 1),
(98, 15, 26, 'A correction pen is used for ____ your writing mistakes.', 'cover', 'covered', 'covering', 'to cover', 3),
(99, 15, 27, 'It&#39;s no good ____ him the truth now.', 'not to tell', 'tell', 'telling', 'to tell', 4),
(100, 15, 28, 'It&#39;s important ____ too much about your failure.', 'not to worry', 'not worry', 'not worry to', 'don&#39;t worry', 1),
(101, 15, 29, 'Don’t forget ____ your homework before coming to class.', 'doing', 'having done', 'to be done', 'to do', 4),
(102, 15, 30, 'Did you remember ____ Mr. Green my message?', 'be given', 'giving', 'have given', 'to give', 4),
(103, 15, 31, 'printing ____ complex tools and components.', 'is used for produce', 'is used to produce', 'uses for producing', 'uses to produce', 2),
(104, 15, 32, 'She was old enough ____ up her own mind.', 'made', 'make', 'making', 'to make', 4),
(105, 15, 33, 'My computer is used for ____ music and video.', 'having played', 'play', 'playing', 'to play', 3),
(106, 15, 34, 'My father uses a calculator to ____.', 'be calculated', 'being calculated', 'calculate', 'calculating', 3),
(107, 15, 35, 'Facebook is used ____ among the young.', 'communicate', 'communicating', 'to communicate', 'to communicating', 3),
(108, 15, 36, 'She ____ volleyball at high school but she didn’t like it.', 'has played', 'played', 'was playing', 'has been playinh', 2),
(109, 15, 37, 'The first actual robot ____ invented in 1961.', 'was', 'has been', 'used to', 'were', 1),
(110, 15, 38, 'The magnetic compass was first used to determine the correct _________ by the Chinese.', 'way', 'road', 'path', 'direction', 4),
(111, 15, 39, 'Never ____ off till tomorrow what you can do today.', 'put', 'set', 'do', 'turn', 1),
(112, 15, 40, 'You must lend me the money for the trip. ____, I won&#39;t be able to go.', 'Consequently', 'Nevertheless', 'Otherwise', 'Although', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `reported_user_id` int(11) NOT NULL,
  `is_handled` bit(1) DEFAULT b'0',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `report`
--

INSERT INTO `report` (`report_id`, `title`, `type`, `content`, `user_id`, `reported_user_id`, `is_handled`, `created_at`) VALUES
(5, 'thằng này hack', 1, '', 3, 2, b'1', '2023-06-28 08:28:00'),
(6, 'Thằng này hack', 4, '', 2, 1, b'1', '2023-06-28 08:49:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `test_results`
--

CREATE TABLE `test_results` (
  `result_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `score` float NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `test_results`
--

INSERT INTO `test_results` (`result_id`, `user_id`, `user_name`, `exam_id`, `score`, `created_at`) VALUES
(1, 1, 'Châu Quế Nhơn', 13, 10, '2023-06-04 08:09:47'),
(10, 1, 'Châu Quế Nhơn', 15, 8.2, '2023-06-07 10:21:00'),
(11, 1, 'Châu Quế Nhơn', 14, 10, '2023-06-10 08:38:47'),
(17, 2, 'Hoàng Vĩnh Phút', 14, 9, '2023-06-10 09:22:22'),
(20, 2, 'Hoàng Vĩnh Phúc', 13, 7, '2023-06-27 11:51:42'),
(21, 2, 'Hoàng Vĩnh Phúc', 14, 6, '2023-06-27 12:08:50'),
(28, 2, 'Hoàng Vĩnh Phúc', 15, 0, '2023-06-28 03:43:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL DEFAULT 0,
  `phone_number` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL DEFAULT ' ',
  `description` text DEFAULT NULL,
  `birthday` date NOT NULL,
  `avatar` varchar(255) DEFAULT '0.png',
  `role` int(11) DEFAULT 0,
  `active` bit(1) DEFAULT b'0',
  `create_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `password`, `email`, `gender`, `phone_number`, `address`, `link`, `description`, `birthday`, `avatar`, `role`, `active`, `create_at`) VALUES
(1, 'Châu Quế Nhơn', 'admin', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'cnhon5496@gmail.com', 0, '0848611127', 'Kv. Nghiễm Hòa, P. Nhơn Hòa, Tx. An Nhơn, Tỉnh Bình Định', '', '', '2002-05-18', '1.png', 3, b'1', '2023-05-16 17:00:00'),
(2, 'Hoàng Vĩnh Phúc', 'cnhon5496', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Quenhon2002@gmail.com', 0, '0848611127', 'Lê Quý Đôn, Nhơn Hòa, An Nhơn, Bình Định', ' https://facebook.com/xoxvp', 'Poy lạnk lùnq', '2002-04-14', '2.jpg', 0, b'1', '2023-06-05 10:25:04'),
(3, 'Lê Văn Đỗ Kỳ', 'kimmich', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'admin@chaucongtu.site', 0, '0129482754', 'Barcelona, Spain', ' ', 'I am a Polish footballer known for his remarkable success on both the domestic and international stage. Playing as a striker for Bayern Munich and the Poland national team, my impressive trophy collection includes the Bundesliga, German Cup, UEFA Champions League, and FIFA Club World Cup. He is a multiple-time Bundesliga top scorer, winner of the UEFA European Championship Golden Boot, and a key player for the Polish national team. With my impressive technical skills, lightning-fast pace, and remarkable goal-scoring ability, I am universally recognized as one of the greatest footballers in the world.', '1989-06-06', '3.png', 1, b'1', '2023-06-07 10:23:04'),
(4, 'Julian Nagalsmann', 'na1988', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'nagelsmann@gmail.com', 0, '0128481775', 'Munich, Germany', ' ', 'Julian Nagelsmann is a highly regarded German football manager, currently leading RB Leipzig with an innovative style of play and an impressive record of success. He is known for his tactical acumen and focus on the development of young talent. Despite his young age, Nagelsmann is seen as a future star in the world of football management.', '1988-02-10', '4.png', 3, b'0', '2023-06-11 11:12:01'),
(5, 'Cristiano Ronaldo', 'ronaldo', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'ronaldo@gmail.com', 0, '0848611127', 'Al Nassr, Saudi Araba', ' https://ronaldo.com', '', '1984-02-05', '5.jpg', 2, b'0', '2023-06-21 11:41:08'),
(6, 'Lionel Messi', 'messi', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'messi@gmail.com', 0, '', '', ' ', NULL, '0000-00-00', '6.jpeg', 0, b'0', '2023-06-21 12:00:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vocabulary`
--

CREATE TABLE `vocabulary` (
  `vocab_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `word` varchar(255) NOT NULL,
  `spelling` varchar(255) NOT NULL,
  `meaning` varchar(255) NOT NULL,
  `example` text NOT NULL,
  `synonyms` varchar(255) DEFAULT NULL,
  `antonyms` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vocabulary`
--

INSERT INTO `vocabulary` (`vocab_id`, `lesson_id`, `word`, `spelling`, `meaning`, `example`, `synonyms`, `antonyms`) VALUES
(39, 1, 'benefit', '/ˈbenɪfɪt/ (n)', 'lợi ích', 'example', NULL, NULL),
(40, 1, 'breadwinner', '/ˈbredwɪnə(r)/ (n)', 'người trụ cột đi làm nuôi cả gia đình', 'example', NULL, NULL),
(41, 1, 'chore', '/tʃɔː(r)/ (n)', 'công việc vặt trong nhà, việc nhà', 'example', NULL, NULL),
(42, 1, 'contribute', '/kənˈtrɪbjuːt/ (v)', 'đóng góp', 'example', NULL, NULL),
(43, 1, 'critical', '/ˈkrɪtɪkl/ (a)', 'hay phê phán, chỉ trích; khó tính', 'example', NULL, NULL),
(44, 1, 'enormous', '/ɪˈnɔːməs/ (a)', 'to lớn, khổng lồ', 'example', NULL, NULL),
(45, 1, 'equally shared parenting', '/ˈiːkwəli - ʃeə(r)d - ˈpeərəntɪŋ/ (np)', 'chia sẻ đều công việc nội trợ và chăm sóc con cái', 'example', NULL, NULL),
(46, 1, 'extended family', '/ɪkˈstendɪd - ˈfæməli/ (np)', 'gia đình lớn gồm nhiều thế hệ chung sống', 'example', NULL, NULL),
(47, 1, '(household) finances', '/ˈhaʊshəʊld - ˈfaɪnæns/ (np)', 'tài chính, tiền nong (của gia đình)', 'example', NULL, NULL),
(48, 1, 'financial burden', '/faɪˈnænʃl - ˈbɜːdn/ (np)', 'gánh nặng về tài chính, tiền bạc', 'example', NULL, NULL),
(49, 1, 'gender convergence', '/\'dʒendə(r) - kənˈvɜːdʒəns/(np)', 'các giới tính trở nên có nhiều điểm chung', 'example', NULL, NULL),
(50, 1, 'grocery', '/ˈɡrəʊsəri/ (n)', 'thực phẩm và tạp hóa', 'example', NULL, NULL),
(51, 1, 'heavy lifting', '/ˌhevi ˈlɪftɪŋ/ (np)', 'mang vác nặng', 'example', NULL, NULL),
(52, 1, 'homemaker', '/ˈhəʊmmeɪkə(r)/ (n)', 'người nội trợ', 'example', NULL, NULL),
(53, 1, 'iron', '/ˈaɪən/ (v)', 'là/ ủi (quần áo)', 'example', NULL, NULL),
(54, 1, 'Laundry', '/ˈlɔːndri/ (n)', 'quần áo, đồ giặt là/ ủi', 'example', NULL, NULL),
(55, 1, 'Lay (the table for meals)', '/leɪ/', 'dọn cơm', 'example', NULL, NULL),
(56, 1, 'nuclear family', '/ˌnjuːkliə ˈfæməli/ (np)', 'gia đình nhỏ chỉ gồm có bố mẹ và con cái chung sống', 'example', NULL, NULL),
(57, 1, 'nurture', '/ˈnɜːtʃə(r)/ (v)', 'nuôi dưỡng', 'example', NULL, NULL),
(58, 1, 'responsibility', '/rɪˌspɒnsəˈbɪləti/ (n)', 'trách nhiệm', 'example', NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`exam_id`);

--
-- Chỉ mục cho bảng `grammars`
--
ALTER TABLE `grammars`
  ADD PRIMARY KEY (`grammar_id`),
  ADD KEY `lesson_id` (`lesson_id`);

--
-- Chỉ mục cho bảng `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`lesson_id`);

--
-- Chỉ mục cho bảng `lesson_saved`
--
ALTER TABLE `lesson_saved`
  ADD PRIMARY KEY (`saved_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `lesson_id` (`lesson_id`);

--
-- Chỉ mục cho bảng `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `comment_id` (`comment_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `exam_id` (`exam_id`);

--
-- Chỉ mục cho bảng `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `reported_user_id` (`reported_user_id`);

--
-- Chỉ mục cho bảng `test_results`
--
ALTER TABLE `test_results`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `test_results_ibfk_2` (`exam_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `vocabulary`
--
ALTER TABLE `vocabulary`
  ADD PRIMARY KEY (`vocab_id`),
  ADD KEY `lesson_id` (`lesson_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `grammars`
--
ALTER TABLE `grammars`
  MODIFY `grammar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `lessons`
--
ALTER TABLE `lessons`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `lesson_saved`
--
ALTER TABLE `lesson_saved`
  MODIFY `saved_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT cho bảng `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `test_results`
--
ALTER TABLE `test_results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `vocabulary`
--
ALTER TABLE `vocabulary`
  MODIFY `vocab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Các ràng buộc cho bảng `grammars`
--
ALTER TABLE `grammars`
  ADD CONSTRAINT `grammars_ibfk_1` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`lesson_id`);

--
-- Các ràng buộc cho bảng `lesson_saved`
--
ALTER TABLE `lesson_saved`
  ADD CONSTRAINT `lesson_saved_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `lesson_saved_ibfk_2` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`lesson_id`);

--
-- Các ràng buộc cho bảng `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`comment_id`);

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Các ràng buộc cho bảng `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`exam_id`);

--
-- Các ràng buộc cho bảng `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`reported_user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `test_results`
--
ALTER TABLE `test_results`
  ADD CONSTRAINT `test_results_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `test_results_ibfk_2` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`exam_id`);

--
-- Các ràng buộc cho bảng `vocabulary`
--
ALTER TABLE `vocabulary`
  ADD CONSTRAINT `vocabulary_ibfk_1` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`lesson_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
