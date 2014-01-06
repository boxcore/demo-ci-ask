--  7808问答站数据库设计
--  表前缀： WD_*/

-- 主机: 192.168.15.2
-- 生成日期: 2014 年 01 月 06 日 01:20
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `xinwenda`
--
CREATE DATABASE IF NOT EXISTS `xinwenda` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `xinwenda`;

--------------------------------------------------------

--
-- 表的结构 `xwd_nav`
--

CREATE TABLE IF NOT EXISTS `xwd_nav` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '导航ID',
  `name` char(50) NOT NULL COMMENT '导航名',
  `title` char(255) NOT NULL COMMENT '导航描述',
  `url` char(255) NOT NULL COMMENT '导航链接',
  `target` tinyint(1) NOT NULL DEFAULT '0' COMMENT '打开方式',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '类型',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态  0：不显示，1：显示',
  `sort` tinyint(3) NOT NULL COMMENT '排序 值大者排前面',
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `xwd_user`
--

CREATE TABLE IF NOT EXISTS `xwd_user` (
  `uid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(18) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `email` varchar(40) NOT NULL COMMENT '邮件',
  `avatar` varchar(100) NOT NULL COMMENT '头像',
  `groupid` tinyint(3) unsigned NOT NULL DEFAULT '7' COMMENT '用户组',
  `credits` int(10) NOT NULL DEFAULT '0' COMMENT '',
  `regip` char(15) NOT NULL COMMENT '注册IP',
  `regtime` int(10) NOT NULL DEFAULT '0' COMMENT '注册时间',
  `lastlogin` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登陆时间',
  `gender` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '性别',
  `birthday` date NOT NULL COMMENT '生日',
  `phone` varchar(30) NOT NULL COMMENT '手机号',
  `qq` varchar(15) NOT NULL COMMENT '', 
  `msn` varchar(40) NOT NULL COMMENT '',
  `signature` mediumtext NOT NULL COMMENT '签名',
  `access_token` varchar(50) DEFAULT NULL COMMENT '',
  `questions` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '密保问题id',
  `answers` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '密保答案id',
  `adopts` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '采用答案次数',
  `isnotify` tinyint(1) unsigned NOT NULL DEFAULT '7',
  `expert` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否过期',
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`uid`),
  KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
