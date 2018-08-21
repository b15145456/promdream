
-- --------------------------------------------------------

--
-- 資料表結構 `scenecomment`
--

CREATE TABLE `scenecomment` (
  `ID` int(11) NOT NULL,
  `暱稱` text COLLATE utf8_unicode_ci NOT NULL,
  `棚名` text COLLATE utf8_unicode_ci NOT NULL,
  `評論` text COLLATE utf8_unicode_ci NOT NULL,
  `評論評價` int(11) NOT NULL,
  `photo1` text COLLATE utf8_unicode_ci NOT NULL,
  `photo2` text COLLATE utf8_unicode_ci NOT NULL,
  `photo3` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `scenecomment`
--

INSERT INTO `scenecomment` (`ID`, `暱稱`, `棚名`, `評論`, `評論評價`, `photo1`, `photo2`, `photo3`) VALUES
(1, '音琴', '2.5D', '上次去拍過個人覺得是還不錯拍的景點上次去拍過個人覺得是還不錯拍的景上次去拍過個人覺得是還不錯拍的景上次去拍過個人覺得是還不錯拍的景上次去拍過個人覺得是還不錯拍的景上次去拍過個人覺得是還不錯拍的景...\r\n', 5, 'background-img/2017-11-11 小手+一槍WCC_9715直樹.jpg', 'background-img/2017-11-11 小手+一槍WCC_9718直樹.jpg', 'background-img/2017-11-11 小手+一槍WCC_9636直樹.jpg');
