
-- --------------------------------------------------------

--
-- 資料表結構 `photoscene`
--

CREATE TABLE `photoscene` (
  `ID` int(11) NOT NULL COMMENT '資料ID',
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `cost` text COLLATE utf8_unicode_ci NOT NULL,
  `網址` text COLLATE utf8_unicode_ci NOT NULL,
  `eval` int(11) NOT NULL COMMENT '1~5',
  `position` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='工作室與場景資訊';

--
-- 資料表的匯出資料 `photoscene`
--

INSERT INTO `photoscene` (`ID`, `name`, `type`, `cost`, `網址`, `eval`, `position`) VALUES
(1, '2.5D', '歐風', '400', 'http://25ddstudio.weebly.com/', 5, '高雄市'),
(2, 'Imagepark', '歐風', '900', 'https://www.facebook.com/ImageParkStudio/', 3, '701 台南市 (28.39 km)東區崇學路135巷12號'),
(3, 'Cos派對攝影基地 Cosparty Studio', '白棚', '200', 'https://www.facebook.com/CospartyStudio/', 4, '807 高雄市三民區義華路287巷4-4號5樓'),
(6, 'Miruna攝影棚_白棚', '白棚', '500~1000', 'http://www.mirunaa.com/index.html', 0, '100台北市中正區大埔街21巷1-2號');
