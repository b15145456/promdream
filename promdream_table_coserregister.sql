
-- --------------------------------------------------------

--
-- 資料表結構 `coserregister`
--

CREATE TABLE `coserregister` (
  `ID` int(11) NOT NULL,
  `名字` text COLLATE utf8_unicode_ci NOT NULL,
  `暱稱` text COLLATE utf8_unicode_ci NOT NULL,
  `密碼` text COLLATE utf8_unicode_ci NOT NULL,
  `性別` text COLLATE utf8_unicode_ci NOT NULL,
  `信箱` text COLLATE utf8_unicode_ci NOT NULL,
  `電話` int(11) NOT NULL,
  `地址` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `coserregister`
--

INSERT INTO `coserregister` (`ID`, `名字`, `暱稱`, `密碼`, `性別`, `信箱`, `電話`, `地址`) VALUES
(1, '郭欣榮', '音琴', 'z1x2c34', '男', 'johnny5610j67k601@gmail.com', 909993631, '新北市新莊區裕誠路1926號3F'),
(2, '可愛考肥腸', 'ㄩㄋ', '123456', '女', '123@yahoo.com.tw', 987654321, '臺南市中西區哈哈哈哈哈哈');
