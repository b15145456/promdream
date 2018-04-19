-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-04-19 18:22:08
-- 伺服器版本: 10.1.13-MariaDB
-- PHP 版本： 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `promdream`
--

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
(1, 0, '範例圖片', '範例1', '#範例', 'promdream/uploadfile/MO7A8589_副本');

-- --------------------------------------------------------

--
-- 資料表結構 `photoscene`
--

CREATE TABLE `photoscene` (
  `ID` int(11) NOT NULL COMMENT '資料ID',
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `cost` int(11) NOT NULL,
  `網址` text COLLATE utf8_unicode_ci NOT NULL,
  `eval` int(11) NOT NULL COMMENT '1~5',
  `position` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='工作室與場景資訊';

--
-- 資料表的匯出資料 `photoscene`
--

INSERT INTO `photoscene` (`ID`, `name`, `type`, `cost`, `網址`, `eval`, `position`) VALUES
(1, '2.5D', '歐風', 400, 'http://25ddstudio.weebly.com/', 5, '高雄市'),
(2, 'Imagepark', '歐風', 400, 'https://www.facebook.com/ImageParkStudio/', 3, '701 台南市 (28.39 km)東區崇學路135巷12號'),
(3, 'Cos派對攝影基地 Cosparty Studio', '白棚', 200, 'https://www.facebook.com/CospartyStudio/', 4, '807 高雄市三民區義華路287巷4-4號5樓');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `photoID` (`photoID`);

--
-- 資料表索引 `photoscene`
--
ALTER TABLE `photoscene`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
