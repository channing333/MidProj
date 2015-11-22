-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2015-11-22 21:57:46
-- 伺服器版本: 5.6.26
-- PHP 版本： 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `midproj`
--

-- --------------------------------------------------------

--
-- 資料表結構 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `c_id` int(5) NOT NULL,
  `c_name` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `category`
--

INSERT INTO `category` (`c_id`, `c_name`) VALUES
(1, '電腦'),
(2, '平板'),
(3, '手機'),
(4, '醫療器材');

-- --------------------------------------------------------

--
-- 資料表結構 `lab`
--

CREATE TABLE IF NOT EXISTS `lab` (
  `l_id` int(11) NOT NULL,
  `l_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `lab`
--

INSERT INTO `lab` (`l_id`, `l_name`) VALUES
(1, '鄭伯壎實驗室'),
(2, '陳立偉實驗室');

-- --------------------------------------------------------

--
-- 資料表結構 `property`
--

CREATE TABLE IF NOT EXISTS `property` (
  `p_id` int(10) NOT NULL,
  `p_pic` varchar(100) NOT NULL,
  `p_number` varchar(50) NOT NULL,
  `p_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `c_id` int(11) NOT NULL,
  `p_note` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `l_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `property`
--

INSERT INTO `property` (`p_id`, `p_pic`, `p_number`, `p_name`, `c_id`, `p_note`, `l_id`) VALUES
(7, 'IMAG1192.jpg', '4240', '02:28', 1, '無', 1),
(8, 'IMAG1192.jpg', '000', '02:47', 1, '測試', 1),
(9, 'IMAG1159.jpg', '1111111111', '02:57', 2, '測試\r\n', 2);

-- --------------------------------------------------------

--
-- 資料表結構 `record`
--

CREATE TABLE IF NOT EXISTS `record` (
  `r_datelend` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `r_datereturn` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `r_nowkeeper` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `r_beforekeeper` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `u_number` int(10) NOT NULL,
  `p_number` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `trash`
--

CREATE TABLE IF NOT EXISTS `trash` (
  `t_id` int(5) NOT NULL,
  `p_id` int(5) NOT NULL,
  `p_pic` varchar(50) NOT NULL,
  `p_number` varchar(50) NOT NULL,
  `p_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `p_category` int(20) NOT NULL,
  `p_note` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_number` int(15) NOT NULL,
  `u_name` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_grade` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_phone` varchar(15) CHARACTER SET latin1 NOT NULL,
  `u_mail` varchar(50) CHARACTER SET latin1 NOT NULL,
  `u_password` varchar(20) CHARACTER SET latin1 NOT NULL,
  `u_manager` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`u_number`, `u_name`, `u_grade`, `u_phone`, `u_mail`, `u_password`, `u_manager`) VALUES
(41021247, '陳彥廷', '軟工一', '0910111111', 'cccccc', '123', ''),
(410175002, '呂聆煒', '軟工四', '0910610827', 'channinglulingwei@gmail.com', '123', '');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- 資料表索引 `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`l_id`,`l_name`);

--
-- 資料表索引 `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`p_id`);

--
-- 資料表索引 `trash`
--
ALTER TABLE `trash`
  ADD PRIMARY KEY (`t_id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_number`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- 使用資料表 AUTO_INCREMENT `lab`
--
ALTER TABLE `lab`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `property`
--
ALTER TABLE `property`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- 使用資料表 AUTO_INCREMENT `trash`
--
ALTER TABLE `trash`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
