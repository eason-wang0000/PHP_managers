-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 05 月 13 日 06:59
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `gdmec`
--
CREATE DATABASE `gdmec` DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci;
USE `gdmec`;

-- --------------------------------------------------------

--
-- 表的结构 `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userName` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `account`
--

INSERT INTO `account` (`id`, `userName`, `password`, `status`) VALUES
(4, 'eee', '637a81ed8e8217bb01c15c67c39b43b0ab4e20f1', 1);

-- --------------------------------------------------------

--
-- 表的结构 `score`
--

CREATE TABLE IF NOT EXISTS `score` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `studentId` varchar(8) NOT NULL,
  `term` char(11) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `mark` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `score`
--

INSERT INTO `score` (`id`, `studentId`, `term`, `subject`, `mark`) VALUES
(1, '07120803', '2012-2013-1', 'php', 66),
(2, '07120802', '2012-2013-1', 'php', 74),
(3, '07120801', '2012-2013-1', 'php', 34);

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `studentId` varchar(8) NOT NULL,
  `name` varchar(20) NOT NULL,
  `className` varchar(20) NOT NULL,
  `birthday` date NOT NULL,
  `sex` char(1) NOT NULL DEFAULT '男',
  `nation` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`id`, `studentId`, `name`, `className`, `birthday`, `sex`, `nation`) VALUES
(1, '07140501', '张三', '软件1405', '1992-09-16', '男', '汉族'),
(3, '07140603', '李四', '软件1406', '2013-04-22', '男', '汉'),
(10, '07140612', 'gggg', '软件1408', '2015-05-14', '男', '汉'),
(11, '07150733', 'adfssaf', 'sfdgsdfg', '2016-05-17', '女', '维吾尔族');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
