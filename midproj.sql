-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2015-11-17 05:53:40
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
  `c_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `property`
--

CREATE TABLE IF NOT EXISTS `property` (
  `p_id` int(5) NOT NULL,
  `p_pic` varchar(100) NOT NULL,
  `p_number` varchar(50) NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `p_category` int(5) NOT NULL,
  `p_note` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `record`
--

CREATE TABLE IF NOT EXISTS `record` (
  `r_id` int(5) NOT NULL,
  `p_id` int(5) NOT NULL,
  `r_date` varchar(10) NOT NULL,
  `r_now` varchar(10) NOT NULL,
  `r_before` varchar(10) NOT NULL
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
  `p_name` varchar(20) NOT NULL,
  `p_category` int(20) NOT NULL,
  `p_note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(5) NOT NULL,
  `u_number` int(15) NOT NULL,
  `u_name` varchar(10) NOT NULL,
  `u_grade` varchar(5) NOT NULL,
  `u_phone` varchar(15) NOT NULL,
  `u_mail` varchar(50) NOT NULL,
  `u_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- 資料表索引 `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`p_id`);

--
-- 資料表索引 `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`r_id`);

--
-- 資料表索引 `trash`
--
ALTER TABLE `trash`
  ADD PRIMARY KEY (`t_id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `property`
--
ALTER TABLE `property`
  MODIFY `p_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `record`
--
ALTER TABLE `record`
  MODIFY `r_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `trash`
--
ALTER TABLE `trash`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(5) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
