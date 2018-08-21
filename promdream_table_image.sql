
-- --------------------------------------------------------

--
-- 資料表結構 `image`
--

CREATE TABLE `image` (
  `userID` int(11) NOT NULL,
  `photoID` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `imageinfo` text CHARACTER SET utf8 NOT NULL,
  `hashtag` text CHARACTER SET utf8 NOT NULL,
  `ptposition` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `image`
--

INSERT INTO `image` (`userID`, `photoID`, `name`, `imageinfo`, `hashtag`, `ptposition`) VALUES
(1, 0, '範例圖片', '範例1', '#範例', 'promdream/uploadfile/MO7A8589_副本'),
(5, 6, '33', '戀與', '33', ''),
(3, 7, '郭欣榮', 'withㄩㄋ', '戀與製作人', ''),
(3, 8, '', '', '', ''),
(3, 9, '', '', '', '');
