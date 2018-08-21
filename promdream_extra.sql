
--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `coserregister`
--
ALTER TABLE `coserregister`
  ADD PRIMARY KEY (`電話`);

--
-- 資料表索引 `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`photoID`),
  ADD UNIQUE KEY `photoID` (`photoID`);

--
-- 資料表索引 `photoscene`
--
ALTER TABLE `photoscene`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);
