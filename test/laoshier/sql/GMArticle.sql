--
-- MySQL database dump
-- Created by DbManage class, Power By GMA. 
-- http://goodtext.org/ 
--
-- 主机: localhost
-- 生成日期: 2014 年  03 月 18 日 01:33
-- MySQL版本: 5.5.34-log
-- PHP 版本: 5.3.27

--
-- 数据库: `goodtext_1606`
--

-- -------------------------------------------------------

--
-- 表的结构g_article
--

DROP TABLE IF EXISTS `g_article`;
CREATE TABLE `g_article` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT,
  `g_cid` int(11) DEFAULT NULL,
  `g_title` varchar(255) DEFAULT NULL,
  `g_tag` varchar(255) DEFAULT NULL,
  `g_des` varchar(1000) DEFAULT NULL,
  `g_content` text,
  `g_author` varchar(100) DEFAULT NULL,
  `g_imgurl` varchar(128) NOT NULL,
  `g_time` datetime NOT NULL,
  `g_guid` int(11) DEFAULT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 g_article
--

INSERT INTO `g_article` VALUES('1','1','好文本移动网站文章管理系统（GMArticle）简介','GMArticle,好文本移动网站文章管理系统','随着智能手机等移动设备的普及，移动网站建设正渐趋重要。移动浏览器已经可以处理一个普通网站，每天都有非常多的人使用移动浏览器在网上冲浪。那么，现在我们应该开始考虑建设一个移动网站。\r\n好文本移动网站文章管理系统（GMArticle）是 好文本网 开发的一套专业的移动文章管理系统。','<a href=\\\"http://goodtext.org/\\\">好文本网</a><span> 好文本移动网站文章管理系统（GMArticle）简介</span><br /><br /><span>随着智能手机等移动设备的普及，移动网站建设正渐趋重要。移动浏览器已经可以处理一个普通网站，每天都有非常多的人使用移动浏览器在网上冲浪。那么，现在我们应该开始考虑建设一个移动网站。</span><br /><br /><span>好文本移动网站文章管理系统（GMArticle）是 </span><a href=\\\"http://goodtext.org/\\\">好文本网</a><span> 开发的一套专业的移动文章管理系统。</span><br /><br /><span>如何才能快速建设一个用户体验优良的移动网站呢？</span><br /><br /><span>好文本移动网站文章管理系统 是一套专为建设移动网站而设计的文章管理系统，能帮助您解决移动网站建设的难题。</span><br /><br /><span>好文本移动网站文章管理系统（GMArticle）基于PHP，使用Mysql存储，采用了GTPHP框架开发</span><br /><br /><span>GMArticle前端与后台应用跨终端适配，偏重移动设备的用户体验，可以在PC和移动设备上很好的访问。</span><br /><br /><span>好文本移动网站文章管理系统（GMArticle）能干什么？</span><br /><br /><span>能建设一个以新闻和文章为主的网站向用户展示文字或图片 适合移动设备阅读。</span><br /><br /><span>好文本移动网站文章管理系统（GMArticle）特色：</span><br /><br /><span>1、后台登陆检测是手机登陆还是电脑登陆。</span><br /><br /><span>2、系统信息环境检测</span><br /><br /><span>3、后台操作日志，记录后台用户信息和操作。</span><br /><br /><span>3、分类添加、删除、修改操作。</span><br /><br /><span>4、文章添加、删除、修改操作。</span><br /><br /><span>5、后台管理员添加、删除、修改操作。</span><br /><br /><span>6、自定义系统设置项管理，可以自由增加、删除设置项目。</span><br /><br /><span>7、自定义信息项管理，可以设置一些制定义信息项目。</span><br /><br /><span>8、电脑版登陆可以使用在线编辑器等插件。 </span><span style=\\\"line-height:1.5;\\\">好文本移动网站文章管理系统 GMArticle 官方网站地址：www.goodtext.org</span><span> </span><span style=\\\"line-height:1.5;\\\">现在建设一个移动体验比较好的专为移动设备而建设的网站非常重要</span><span> 移动界面的用户体验本质上与PC是不同的</span><br /><br /><span>移动网站的使用非常简单，用户不需要搜索，下载甚至安装任何东西。他们只需要访问你的站点。对于用户和公司/组织来说，毫不费力就能上手。</span><br /><br /><span>必须弄清楚移动网站和移动应用程序之间的差异</span><br /><br /><span>很多人都混淆了移动应用程序和移动网站的概念。两者之间的区别是显而易见的，用户和app的交互与用户和website的交互是不同的。应用程序需要下载到用户手机里，程序安装在用户设备上，并且可以连接联机服务器。移动网站不需要下载也不用安装在用户设备上。它通过浏览器输入访问站点的URL来进行访问。</span>','goodtext.org','','2014-03-18 08:24:17','0');
--
-- 表的结构g_class
--

DROP TABLE IF EXISTS `g_class`;
CREATE TABLE `g_class` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT,
  `g_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 g_class
--

INSERT INTO `g_class` VALUES('1','测试分类');
--
-- 表的结构g_config
--

DROP TABLE IF EXISTS `g_config`;
CREATE TABLE `g_config` (
  `g_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `g_confign` varchar(300) NOT NULL,
  `g_configv` varchar(300) NOT NULL,
  `g_configi` varchar(300) NOT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 g_config
--

INSERT INTO `g_config` VALUES('1','网站名称','好文本移动应用网','网站名称');
INSERT INTO `g_config` VALUES('2','网站关键字','移动应用观察，移动应用资讯，移动应用新闻，iPhone免费应用排行，Android免费应用排行，iPhone免费游戏排行Android免费游戏排行','网站关键字');
INSERT INTO `g_config` VALUES('3','网站简介','专注观察移动互联网科技，帮您了解移动应用最新新闻资讯。','网站简介');
--
-- 表的结构g_info
--

DROP TABLE IF EXISTS `g_info`;
CREATE TABLE `g_info` (
  `g_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `g_name` varchar(100) NOT NULL,
  `g_text` varchar(3000) NOT NULL,
  `g_type` int(1) NOT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 g_info
--

INSERT INTO `g_info` VALUES('1','定义信息1','内容','0');
--
-- 表的结构g_log
--

DROP TABLE IF EXISTS `g_log`;
CREATE TABLE `g_log` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT,
  `g_message` varchar(1000) DEFAULT NULL,
  `g_type` varchar(100) DEFAULT NULL,
  `g_username` varchar(100) DEFAULT NULL,
  `g_ip` varchar(16) DEFAULT NULL,
  `g_agent` varchar(1000) DEFAULT NULL,
  `g_language` varchar(100) DEFAULT NULL,
  `g_time` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 g_log
--

--
-- 表的结构g_upload
--

DROP TABLE IF EXISTS `g_upload`;
CREATE TABLE `g_upload` (
  `g_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `g_url` varchar(128) NOT NULL,
  `g_time` datetime NOT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 g_upload
--

--
-- 表的结构g_user
--

DROP TABLE IF EXISTS `g_user`;
CREATE TABLE `g_user` (
  `g_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `g_username` varchar(40) NOT NULL,
  `g_password` varchar(40) NOT NULL,
  `g_nickname` varchar(40) NOT NULL,
  `g_email` varchar(40) NOT NULL,
  `g_regdate` varchar(40) NOT NULL,
  `g_regip` varchar(40) NOT NULL,
  `g_last_login_time` varchar(40) NOT NULL,
  `g_last_login_ip` varchar(40) NOT NULL,
  `g_login_count` int(10) NOT NULL,
  `g_remark` varchar(255) NOT NULL,
  `authaction` text NOT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 g_user
--

INSERT INTO `g_user` VALUES('1','admin','bab4233796e57397abed34554e88cf27','goodtext.org','Email@goodtext.org','','','','','1','http://goodtext.org/','');
