-- Status:9:136:MP_0:xinwenda:php:1.24.4::5.5.31-log:1:::utf8:EXTINFO
--
-- TABLE-INFO
-- TABLE|xwd_answer|19|65536||InnoDB
-- TABLE|xwd_category|65|32768||InnoDB
-- TABLE|xwd_configs|14|32768||InnoDB
-- TABLE|xwd_flink|3|16384||InnoDB
-- TABLE|xwd_nav|2|16384||InnoDB
-- TABLE|xwd_question|8|32768||InnoDB
-- TABLE|xwd_sessions|6|32768||InnoDB
-- TABLE|xwd_user|14|81920||InnoDB
-- TABLE|xwd_usergroup|5|16384||InnoDB
-- EOF TABLE-INFO
--
-- Dump by MySQLDumper 1.24.4 (http://mysqldumper.net)
/*!40101 SET NAMES 'utf8' */;
SET FOREIGN_KEY_CHECKS=0;
-- Dump created: 2014-02-07 01:37

--
-- Create Table `xwd_answer`
--

DROP TABLE IF EXISTS `xwd_answer`;
CREATE TABLE `xwd_answer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `qid` int(10) unsigned NOT NULL DEFAULT '0',
  `content` mediumtext NOT NULL,
  `comment` tinytext,
  `author` varchar(15) NOT NULL DEFAULT '',
  `authorid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned DEFAULT '1',
  `tag` text,
  `support` int(10) DEFAULT '0',
  `against` int(10) DEFAULT '0',
  `time` int(10) unsigned DEFAULT NULL COMMENT '回答时间',
  `adopttime` int(10) unsigned DEFAULT '0' COMMENT '采纳时间',
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `qid` (`qid`),
  KEY `authorid` (`authorid`),
  KEY `time` (`time`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Data for Table `xwd_answer`
--

/*!40000 ALTER TABLE `xwd_answer` DISABLE KEYS */;
INSERT INTO `xwd_answer` (`id`,`qid`,`content`,`comment`,`author`,`authorid`,`status`,`tag`,`support`,`against`,`time`,`adopttime`,`created_time`) VALUES ('1','1','测试数据内容','评论','黄春泽','1','1','餐饮,小吃','5','0','4294967295','4294967295','0000-00-00 00:00:00');
INSERT INTO `xwd_answer` (`id`,`qid`,`content`,`comment`,`author`,`authorid`,`status`,`tag`,`support`,`against`,`time`,`adopttime`,`created_time`) VALUES ('2','1','测试数据内容','评论','黄春泽','1','1','餐饮,小吃','2','0','4294967295','4294967295','0000-00-00 00:00:00');
INSERT INTO `xwd_answer` (`id`,`qid`,`content`,`comment`,`author`,`authorid`,`status`,`tag`,`support`,`against`,`time`,`adopttime`,`created_time`) VALUES ('3','1','11111111111111111',NULL,'张三','1','1',NULL,'0','0','1389773926','0','2014-01-15 16:18:46');
INSERT INTO `xwd_answer` (`id`,`qid`,`content`,`comment`,`author`,`authorid`,`status`,`tag`,`support`,`against`,`time`,`adopttime`,`created_time`) VALUES ('4','1','张三测试',NULL,'张三','1','1',NULL,'0','0','1389774051','0','2014-01-15 16:20:51');
INSERT INTO `xwd_answer` (`id`,`qid`,`content`,`comment`,`author`,`authorid`,`status`,`tag`,`support`,`against`,`time`,`adopttime`,`created_time`) VALUES ('5','1','<p>\n	555555555555555555555555555555\n</p>',NULL,'张三','1','1',NULL,'0','0','1389779291','0','2014-01-15 17:48:11');
INSERT INTO `xwd_answer` (`id`,`qid`,`content`,`comment`,`author`,`authorid`,`status`,`tag`,`support`,`against`,`time`,`adopttime`,`created_time`) VALUES ('6','1','测试 插入一条 回答数加一',NULL,'张三','1','1',NULL,'0','0','1389836821','0','2014-01-16 09:47:01');
INSERT INTO `xwd_answer` (`id`,`qid`,`content`,`comment`,`author`,`authorid`,`status`,`tag`,`support`,`against`,`time`,`adopttime`,`created_time`) VALUES ('7','3','灌水',NULL,'张三','1','1',NULL,'0','0','1389838550','0','2014-01-16 10:15:50');
INSERT INTO `xwd_answer` (`id`,`qid`,`content`,`comment`,`author`,`authorid`,`status`,`tag`,`support`,`against`,`time`,`adopttime`,`created_time`) VALUES ('8','6','<span style=\"font-family:SimSun;font-size:14px;line-height:26px;\">&nbsp;雅戈尔服饰是首届浙江省十大品牌创新先锋</span>',NULL,'张三','1','1',NULL,'0','0','1389838583','0','2014-01-16 10:16:23');
INSERT INTO `xwd_answer` (`id`,`qid`,`content`,`comment`,`author`,`authorid`,`status`,`tag`,`support`,`against`,`time`,`adopttime`,`created_time`) VALUES ('9','6','<span style=\"font-family:SimSun;font-size:14px;line-height:26px;\">中国品牌研究院评为行业标志品牌</span>',NULL,'张三','1','1',NULL,'0','0','1389838592','0','2014-01-16 10:16:32');
INSERT INTO `xwd_answer` (`id`,`qid`,`content`,`comment`,`author`,`authorid`,`status`,`tag`,`support`,`against`,`time`,`adopttime`,`created_time`) VALUES ('10','3','111111111111111',NULL,'张三','1','1',NULL,'0','0','1390182904','0','2014-01-20 09:55:04');
INSERT INTO `xwd_answer` (`id`,`qid`,`content`,`comment`,`author`,`authorid`,`status`,`tag`,`support`,`against`,`time`,`adopttime`,`created_time`) VALUES ('11','3','111111111111111',NULL,'张三','1','1',NULL,'0','0','1390182937','0','2014-01-20 09:55:37');
INSERT INTO `xwd_answer` (`id`,`qid`,`content`,`comment`,`author`,`authorid`,`status`,`tag`,`support`,`against`,`time`,`adopttime`,`created_time`) VALUES ('12','3','111111111111111',NULL,'张三','1','1',NULL,'0','0','1390182938','0','2014-01-20 09:55:38');
INSERT INTO `xwd_answer` (`id`,`qid`,`content`,`comment`,`author`,`authorid`,`status`,`tag`,`support`,`against`,`time`,`adopttime`,`created_time`) VALUES ('13','3','是打算打算的',NULL,'张三','1','1',NULL,'0','0','1390183045','0','2014-01-20 09:57:25');
INSERT INTO `xwd_answer` (`id`,`qid`,`content`,`comment`,`author`,`authorid`,`status`,`tag`,`support`,`against`,`time`,`adopttime`,`created_time`) VALUES ('14','3','是打算打算的',NULL,'张三','1','1',NULL,'0','0','1390183046','0','2014-01-20 09:57:26');
INSERT INTO `xwd_answer` (`id`,`qid`,`content`,`comment`,`author`,`authorid`,`status`,`tag`,`support`,`against`,`time`,`adopttime`,`created_time`) VALUES ('15','3','的发生大发',NULL,'张三','1','1',NULL,'0','0','1390183076','0','2014-01-20 09:57:56');
INSERT INTO `xwd_answer` (`id`,`qid`,`content`,`comment`,`author`,`authorid`,`status`,`tag`,`support`,`against`,`time`,`adopttime`,`created_time`) VALUES ('16','3','爱妃是多发',NULL,'张三','1','1',NULL,'0','0','1390183099','0','2014-01-20 09:58:19');
INSERT INTO `xwd_answer` (`id`,`qid`,`content`,`comment`,`author`,`authorid`,`status`,`tag`,`support`,`against`,`time`,`adopttime`,`created_time`) VALUES ('17','3','但是我还是达到该发的',NULL,'张三','1','1',NULL,'0','0','1390183124','0','2014-01-20 09:58:44');
INSERT INTO `xwd_answer` (`id`,`qid`,`content`,`comment`,`author`,`authorid`,`status`,`tag`,`support`,`against`,`time`,`adopttime`,`created_time`) VALUES ('18','2','111111111111111111111',NULL,'张三','1','1',NULL,'0','0','1390184067','0','2014-01-20 10:14:27');
INSERT INTO `xwd_answer` (`id`,`qid`,`content`,`comment`,`author`,`authorid`,`status`,`tag`,`support`,`against`,`time`,`adopttime`,`created_time`) VALUES ('19','2','333333333333333333333333',NULL,'张三','1','1',NULL,'0','0','1390184699','0','2014-01-20 10:24:59');
/*!40000 ALTER TABLE `xwd_answer` ENABLE KEYS */;


--
-- Create Table `xwd_category`
--

DROP TABLE IF EXISTS `xwd_category`;
CREATE TABLE `xwd_category` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `name` char(30) NOT NULL COMMENT '分类名称',
  `mark` char(30) NOT NULL COMMENT '分类标记',
  `pid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父级分类',
  `grade` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sort` tinyint(3) NOT NULL DEFAULT '0' COMMENT '排序 值大的排前面',
  `highlight` tinyint(2) DEFAULT '0' COMMENT '是否高亮0否1是',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mark` (`mark`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8;

--
-- Data for Table `xwd_category`
--

/*!40000 ALTER TABLE `xwd_category` DISABLE KEYS */;
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('2','服饰鞋包','fushixiebao','0','1','0','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('3','餐饮美食','canyinyule','0','1','1','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('4','美容养生','meirongyangsheng','0','1','4','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('5','机械环保','jixiehuanbao','0','1','8','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('6','清洗设备','qingxishebei','5','2','0','1');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('7','净水器','jingshuiqi','5','2','2','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('8','轮胎','luntai','96','2','2','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('9','网络创业','wangluochuangye','0','1','6','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('10','母婴用品','muyingyongpin','0','1','3','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('11','婴儿用品','yingeryongpin','10','2','2','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('12','家居建材','jiajijiancai','0','1','7','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('13','妈妈用品','mamayongpin','10','2','3','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('14','奶粉','naifen','10','2','1','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('15','其它项目','qitaxiangmu','0','1','10','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('16','娱乐','yulewanju','15','2','0','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('17','开店指导','kaidianzhidao','15','2','1','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('22','火锅','huoguojiameng','3','2','1','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('24','小吃','xiaochi','3','2','6','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('25','快餐','kuaicanjiameng','3','2','3','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('26','烧烤','shaokao','3','2','2','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('27','冰淇淋','bingqilinjiameng','3','2','9','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('28','奶茶','naicha','3','2','8','1');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('30','女装','nvzhuang','2','2','1','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('31','童装','tongzhuangjiameng','2','2','2','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('32','男装','nanzhuang','2','2','0','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('33','休闲服饰','xiuxianfushi','2','2','8','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('34','内衣','nayi','2','2','4','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('35','饰品','shipin','58','2','0','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('36','鞋包','xiebao','2','2','5','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('38','化妆品','huazhuangpin','4','2','0','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('39','视力保健','shilibaojian','4','2','5','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('40','瘦身减肥','shoushenjianfei','4','2','2','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('41','养生','yangsheng','4','2','4','1');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('43','卤味','luwei','3','2','5','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('44','美容美甲','meirongmeijia','4','2','1','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('45','SPA','SPA','4','2','3','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('47','环保','huanbao','5','2','0','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('52','汽车养护','qicheyanghu','96','2','0','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('56','教育培训','jiaoyupeixun','0','1','5','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('57','学生用品','xueshengyongpin','58','2','4','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('58','饰品玩具','shipinwanju','0','1','2','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('59','网上开店','wangdian','9','2','3','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('60','安全代理','anquandaili','9','2','4','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('61','自助建站','zizhujianzhan','9','2','5','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('62','机器设备','jiqishebei','5','2','6','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('63','儿童早教','ertongzaojiao','56','2','7','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('64','数码电子','shumadianzi','9','2','8','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('65','装饰','zhuangshi','12','2','0','1');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('66','地板','diban','12','2','1','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('67','墙艺','qiangyi','12','2','2','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('68','家具','jiaju','12','2','3','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('69','床上用品','chuangshangyongpin','12','2','4','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('70','母婴店','muyingdian','10','2','0','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('78','动漫','dongman','58','2','3','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('80','咖啡店','kafeidian','3','2','10','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('85','兼职打工','jianzhidagong','15','2','0','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('86','大学生创业','daxueshengchuangye','15','2','0','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('87','传统美食','chuantongmeishi','3','2','0','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('90','玩偶','wanou','58','2','1','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('91','玩具','wanju','58','2','2','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('93','语言培训','yuyanpeixun','56','2','0','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('94','职业教育','zhiyejiaoyu','56','2','1','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('96','汽车服务','qichefuwu','0','1','9','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('98','汽车装饰','qichezhuangshi','96','2','1','0');
INSERT INTO `xwd_category` (`id`,`name`,`mark`,`pid`,`grade`,`sort`,`highlight`) VALUES ('110','名酒','mingjiu','3','2','0','0');
/*!40000 ALTER TABLE `xwd_category` ENABLE KEYS */;


--
-- Create Table `xwd_configs`
--

DROP TABLE IF EXISTS `xwd_configs`;
CREATE TABLE `xwd_configs` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `key` varchar(30) NOT NULL COMMENT '配置属性',
  `value` text NOT NULL COMMENT '配置值',
  `type` enum('string','int','float','bool','array') NOT NULL DEFAULT 'string',
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='网站配置文件';

--
-- Data for Table `xwd_configs`
--

/*!40000 ALTER TABLE `xwd_configs` DISABLE KEYS */;
INSERT INTO `xwd_configs` (`id`,`key`,`value`,`type`,`created_time`) VALUES ('1','site_doname','http://www.7808.com/','string','0000-00-00 00:00:00');
INSERT INTO `xwd_configs` (`id`,`key`,`value`,`type`,`created_time`) VALUES ('2','site_name','中国招商加盟网','string','0000-00-00 00:00:00');
INSERT INTO `xwd_configs` (`id`,`key`,`value`,`type`,`created_time`) VALUES ('3','site_title','网站的标题','string','0000-00-00 00:00:00');
INSERT INTO `xwd_configs` (`id`,`key`,`value`,`type`,`created_time`) VALUES ('4','site_keywords','关键字','string','0000-00-00 00:00:00');
INSERT INTO `xwd_configs` (`id`,`key`,`value`,`type`,`created_time`) VALUES ('5','site_description','描述','string','0000-00-00 00:00:00');
INSERT INTO `xwd_configs` (`id`,`key`,`value`,`type`,`created_time`) VALUES ('6','mobile','158222222','string','0000-00-00 00:00:00');
INSERT INTO `xwd_configs` (`id`,`key`,`value`,`type`,`created_time`) VALUES ('7','email','7808@7808.com','string','0000-00-00 00:00:00');
INSERT INTO `xwd_configs` (`id`,`key`,`value`,`type`,`created_time`) VALUES ('8','weibo','http://weibo.com/7808','string','0000-00-00 00:00:00');
INSERT INTO `xwd_configs` (`id`,`key`,`value`,`type`,`created_time`) VALUES ('9','qq','55822336','string','0000-00-00 00:00:00');
INSERT INTO `xwd_configs` (`id`,`key`,`value`,`type`,`created_time`) VALUES ('10','addr','重庆市区','string','0000-00-00 00:00:00');
INSERT INTO `xwd_configs` (`id`,`key`,`value`,`type`,`created_time`) VALUES ('11','is_closed','1','bool','0000-00-00 00:00:00');
INSERT INTO `xwd_configs` (`id`,`key`,`value`,`type`,`created_time`) VALUES ('12','beian','fafagf','string','0000-00-00 00:00:00');
INSERT INTO `xwd_configs` (`id`,`key`,`value`,`type`,`created_time`) VALUES ('13','code','asdfadf','string','0000-00-00 00:00:00');
INSERT INTO `xwd_configs` (`id`,`key`,`value`,`type`,`created_time`) VALUES ('14','admin_page_num','10','int','2014-01-14 16:44:15');
/*!40000 ALTER TABLE `xwd_configs` ENABLE KEYS */;


--
-- Create Table `xwd_flink`
--

DROP TABLE IF EXISTS `xwd_flink`;
CREATE TABLE `xwd_flink` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT COMMENT '友情链接ID',
  `name` varchar(60) NOT NULL COMMENT '链接名称',
  `link` varchar(120) NOT NULL COMMENT '链接地址',
  `mark` varchar(12) NOT NULL COMMENT '所属标记组',
  `img` varchar(250) NOT NULL COMMENT '链接图片',
  `is_show` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '是否显示。 1显示，0不显示',
  `sort` tinyint(2) unsigned NOT NULL DEFAULT '10' COMMENT '排序，默认排序是10，值大排前',
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='友情链接表';

--
-- Data for Table `xwd_flink`
--

/*!40000 ALTER TABLE `xwd_flink` DISABLE KEYS */;
INSERT INTO `xwd_flink` (`id`,`name`,`link`,`mark`,`img`,`is_show`,`sort`,`created_time`) VALUES ('1','百度','http://www.baidu.com','index','','1','10','2014-01-08 15:04:03');
INSERT INTO `xwd_flink` (`id`,`name`,`link`,`mark`,`img`,`is_show`,`sort`,`created_time`) VALUES ('2','Google','http://www.google.cn/','index','','1','10','2014-01-08 15:04:18');
INSERT INTO `xwd_flink` (`id`,`name`,`link`,`mark`,`img`,`is_show`,`sort`,`created_time`) VALUES ('3','淘宝','http://www.taobao.com','index','','1','10','2014-01-08 15:04:37');
/*!40000 ALTER TABLE `xwd_flink` ENABLE KEYS */;


--
-- Create Table `xwd_nav`
--

DROP TABLE IF EXISTS `xwd_nav`;
CREATE TABLE `xwd_nav` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Data for Table `xwd_nav`
--

/*!40000 ALTER TABLE `xwd_nav` DISABLE KEYS */;
INSERT INTO `xwd_nav` (`id`,`name`,`title`,`url`,`target`,`type`,`status`,`sort`,`created_time`) VALUES ('1','乡村基','乡村基快餐店','http://www.7808.com/ask_admin/','0','0','0','0','2014-01-07 10:18:45');
INSERT INTO `xwd_nav` (`id`,`name`,`title`,`url`,`target`,`type`,`status`,`sort`,`created_time`) VALUES ('2','乡村基','乡村基快餐店','http://www.7808.com/ask_admin/','0','0','0','1','2014-01-07 10:19:04');
/*!40000 ALTER TABLE `xwd_nav` ENABLE KEYS */;


--
-- Create Table `xwd_question`
--

DROP TABLE IF EXISTS `xwd_question`;
CREATE TABLE `xwd_question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '问题ID',
  `province_id` int(11) DEFAULT NULL COMMENT '省级Id',
  `city_id` int(11) DEFAULT NULL COMMENT '市级Id',
  `region_id` int(11) DEFAULT NULL COMMENT '区级Id',
  `sort_id` int(10) DEFAULT NULL COMMENT '大类Id',
  `sub_id` int(10) DEFAULT NULL COMMENT '小类Id',
  `title` char(50) NOT NULL,
  `description` text NOT NULL,
  `author_id` mediumint(8) unsigned DEFAULT NULL,
  `author` char(15) DEFAULT NULL COMMENT '作者',
  `answer_num` int(11) DEFAULT '0' COMMENT '回答数',
  `preview_num` int(11) DEFAULT '0' COMMENT '浏览数',
  `answer_id` int(10) DEFAULT NULL,
  `answer_name` char(32) DEFAULT NULL COMMENT '回答人名称',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1正2标准答案3删除',
  `create` int(11) NOT NULL COMMENT '创建时间',
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `authorid` (`author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Data for Table `xwd_question`
--

/*!40000 ALTER TABLE `xwd_question` DISABLE KEYS */;
INSERT INTO `xwd_question` (`id`,`province_id`,`city_id`,`region_id`,`sort_id`,`sub_id`,`title`,`description`,`author_id`,`author`,`answer_num`,`preview_num`,`answer_id`,`answer_name`,`status`,`create`,`created_time`) VALUES ('1',NULL,NULL,NULL,'2','32','佐纳利男装 男人穿衣新选择','<span style=\"font-family:SimSun;font-size:14px;line-height:26px;\">优秀的品牌，有着巨大的发展潜力，佐纳利男装是经过众多设计师精心设计而成，走在潮流前沿，成为行业的风向标。目前公司正在面向全国招商，本着互利共赢的原则，诚邀加盟商。总部承诺帮助加盟商创业，不断扩大营销范围，获得利润。</span>','11','张三','6','23',NULL,NULL,'1','1389753147','2014-01-20 10:00:12');
INSERT INTO `xwd_question` (`id`,`province_id`,`city_id`,`region_id`,`sort_id`,`sub_id`,`title`,`description`,`author_id`,`author`,`answer_num`,`preview_num`,`answer_id`,`answer_name`,`status`,`create`,`created_time`) VALUES ('2',NULL,NULL,NULL,'2','32','优品优男男装 关爱男性着装','<span style=\"font-family:SimSun;font-size:14px;line-height:26px;\">爱美还是女人的专利吗?当然不是。男人也开始加入了爱美的行业，“男人也要对自己好些”，“关爱男性”风潮迭起，男性消费水涨船高。但现在99%的人都在经营女人和小孩的服装，99%的男装市场则被人遗忘。优品优男品牌男装特惠把握消费浪潮，既没有大牌的价格昂贵，也没有杂牌的不上不下，经营的品牌男装均以超低价特惠销售，男人有“面子”不用费“银子”，消费势头如火如荼!</span>','11','张三','2','31',NULL,NULL,'1','1389753220','2014-01-20 10:25:01');
INSERT INTO `xwd_question` (`id`,`province_id`,`city_id`,`region_id`,`sort_id`,`sub_id`,`title`,`description`,`author_id`,`author`,`answer_num`,`preview_num`,`answer_id`,`answer_name`,`status`,`create`,`created_time`) VALUES ('3',NULL,NULL,NULL,'2','32','男士皮具生活馆加盟 奥格维登','<span style=\"font-family:SimSun;font-size:14px;line-height:26px;\">奥格维登男士皮具生活馆的全线产品均有知名设计师，根据当前时尚流行趋势，结合人们的消费特点而精心设计。大师们别出心裁的将生活中的灵感提炼成独具匠心的时尚元素，设计出一系列独一无二深受消费者欢迎的产品。</span>','11','张三','9','12',NULL,NULL,'1','1389753254','2014-01-20 09:58:54');
INSERT INTO `xwd_question` (`id`,`province_id`,`city_id`,`region_id`,`sort_id`,`sub_id`,`title`,`description`,`author_id`,`author`,`answer_num`,`preview_num`,`answer_id`,`answer_name`,`status`,`create`,`created_time`) VALUES ('4',NULL,NULL,NULL,'2','32','男装名品汇 百帝汇男装','<span style=\"font-family:SimSun;font-size:14px;line-height:26px;\">“</span><a href=\"http://www.7808.cn/xiangmu/baidihui\" target=\"_blank\"><strong>百帝汇</strong></a><span style=\"font-family:SimSun;font-size:14px;line-height:26px;\">·男装特惠馆”集合商务休闲与时尚休闲名品于一体，覆盖男士服装、服饰所需。随品牌气质不同展现多元风格，沉稳、儒雅、干练、精明，款款新潮，款款畅销，款款超值!从正装西装、风衣、外套、T恤衫、衬衣、针织衫、裤装大产品到各式包类、各式鞋类、领带、帽子等小物件应有尽有。</span>','11','张三','0','4',NULL,NULL,'1','1389753287','2014-01-18 15:44:37');
INSERT INTO `xwd_question` (`id`,`province_id`,`city_id`,`region_id`,`sort_id`,`sub_id`,`title`,`description`,`author_id`,`author`,`answer_num`,`preview_num`,`answer_id`,`answer_name`,`status`,`create`,`created_time`) VALUES ('5',NULL,NULL,NULL,'2','32','技术出精品 庄吉服饰','<span style=\"font-family:SimSun;font-size:14px;line-height:26px;\">男人都要穿西服，什么样的西服能穿出一个男人的品味呢?庄吉服饰弘扬服饰文化，追求时尚品味 争创中国名牌，增强顾客满意，庄吉服饰彰显男人的魅力，引领时尚潮流。</span>','11','张三','0','3',NULL,NULL,'1','1389753322','2014-02-07 09:28:31');
INSERT INTO `xwd_question` (`id`,`province_id`,`city_id`,`region_id`,`sort_id`,`sub_id`,`title`,`description`,`author_id`,`author`,`answer_num`,`preview_num`,`answer_id`,`answer_name`,`status`,`create`,`created_time`) VALUES ('6',NULL,NULL,NULL,'2','32','雅戈尔服饰 专业男装产品','<span style=\"font-family:SimSun;font-size:14px;line-height:26px;\">雅戈尔服饰连续10年稳居中国服装行业销售和利润总额双百强排行榜首位，被评为最受消费者喜爱品牌。雅戈尔服饰是首届浙江省十大品牌创新先锋之一，被中国品牌研究院评为行业标志品牌。</span>','11','张三','2','6',NULL,NULL,'1','1389753374','2014-01-17 17:27:07');
INSERT INTO `xwd_question` (`id`,`province_id`,`city_id`,`region_id`,`sort_id`,`sub_id`,`title`,`description`,`author_id`,`author`,`answer_num`,`preview_num`,`answer_id`,`answer_name`,`status`,`create`,`created_time`) VALUES ('7',NULL,NULL,NULL,'2','32','1111111111111111111111','333333333333333333','11','张三','0','4',NULL,NULL,'1','1389779438','2014-01-18 10:59:41');
INSERT INTO `xwd_question` (`id`,`province_id`,`city_id`,`region_id`,`sort_id`,`sub_id`,`title`,`description`,`author_id`,`author`,`answer_num`,`preview_num`,`answer_id`,`answer_name`,`status`,`create`,`created_time`) VALUES ('8',NULL,NULL,NULL,'0','0','11111111111','11111111111111','11','张三','0','2',NULL,NULL,'1','1389844481','2014-02-07 09:28:57');
/*!40000 ALTER TABLE `xwd_question` ENABLE KEYS */;


--
-- Create Table `xwd_sessions`
--

DROP TABLE IF EXISTS `xwd_sessions`;
CREATE TABLE `xwd_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0' COMMENT 'session ID',
  `ip_address` varchar(45) NOT NULL DEFAULT '0' COMMENT '客户端IP',
  `user_agent` varchar(120) NOT NULL COMMENT '客户端标识',
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登陆时间',
  `user_data` text NOT NULL COMMENT '用户session相关数据',
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='SESSION数据表';

--
-- Data for Table `xwd_sessions`
--

/*!40000 ALTER TABLE `xwd_sessions` DISABLE KEYS */;
INSERT INTO `xwd_sessions` (`session_id`,`ip_address`,`user_agent`,`last_activity`,`user_data`) VALUES ('12072c9d282ab615fb1ede8fab4e0dbe','192.168.15.7','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1712.4 Safari/537.36','1391737037','');
INSERT INTO `xwd_sessions` (`session_id`,`ip_address`,`user_agent`,`last_activity`,`user_data`) VALUES ('3902c7628eb9d73f4cb75e5c9631ad4b','192.168.15.7','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1712.4 Safari/537.36','1391736459','');
INSERT INTO `xwd_sessions` (`session_id`,`ip_address`,`user_agent`,`last_activity`,`user_data`) VALUES ('c6a419cf74e6702c6d42dcad73936731','192.168.15.7','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1712.4 Safari/537.36','1391734993','');
INSERT INTO `xwd_sessions` (`session_id`,`ip_address`,`user_agent`,`last_activity`,`user_data`) VALUES ('d2e0db075eaec2b5b841457b9e4f8a99','192.168.15.4','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/32.0.1700.76 Safari/537.36','1391736850','');
INSERT INTO `xwd_sessions` (`session_id`,`ip_address`,`user_agent`,`last_activity`,`user_data`) VALUES ('e92ce090da78dd5c5084794b5f8ff8e1','192.168.15.4','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/32.0.1700.76 Safari/537.36','1391736853','');
INSERT INTO `xwd_sessions` (`session_id`,`ip_address`,`user_agent`,`last_activity`,`user_data`) VALUES ('ff4eb335e82e32fe1b86d9cc6e74dcdc','192.168.15.4','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/32.0.1700.76 Safari/537.36','1391736871','');
/*!40000 ALTER TABLE `xwd_sessions` ENABLE KEYS */;


--
-- Create Table `xwd_user`
--

DROP TABLE IF EXISTS `xwd_user`;
CREATE TABLE `xwd_user` (
  `uid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` char(18) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `nick_name` varchar(128) DEFAULT '网友' COMMENT '昵称',
  `email` varchar(40) DEFAULT NULL COMMENT '邮件',
  `avatar` varchar(100) DEFAULT NULL COMMENT '头像',
  `groupid` tinyint(3) unsigned DEFAULT '4' COMMENT '用户组',
  `credits` int(10) DEFAULT '0' COMMENT '积分',
  `regip` char(15) DEFAULT NULL COMMENT '注册IP',
  `regtime` int(10) NOT NULL DEFAULT '0' COMMENT '注册时间',
  `lastlogin` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登陆时间',
  `gender` tinyint(1) unsigned DEFAULT '0' COMMENT '性别 0男1女2保密',
  `birthday` date DEFAULT NULL COMMENT '生日',
  `phone` varchar(30) DEFAULT NULL COMMENT '手机号',
  `qq` varchar(15) DEFAULT NULL,
  `signature` mediumtext COMMENT '签名',
  `access_token` varchar(50) DEFAULT NULL,
  `questions` int(10) unsigned DEFAULT '0' COMMENT '密保问题id',
  `answers` int(10) unsigned DEFAULT '0' COMMENT '密保答案id',
  `adopts` int(10) unsigned DEFAULT '0' COMMENT '采用答案次数',
  `isnotify` tinyint(1) unsigned DEFAULT '7',
  `status` tinyint(2) DEFAULT '1' COMMENT '是否过期: 1正常；2：禁止',
  `created_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username_2` (`username`),
  UNIQUE KEY `email_2` (`email`),
  KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Data for Table `xwd_user`
--

/*!40000 ALTER TABLE `xwd_user` DISABLE KEYS */;
INSERT INTO `xwd_user` (`uid`,`username`,`password`,`nick_name`,`email`,`avatar`,`groupid`,`credits`,`regip`,`regtime`,`lastlogin`,`gender`,`birthday`,`phone`,`qq`,`signature`,`access_token`,`questions`,`answers`,`adopts`,`isnotify`,`status`,`created_time`) VALUES ('1','admin','7fef6171469e80d32c0559f88b377245','网友','admin@7808.com','','1','0','','0','0','0','0000-00-00','','','',NULL,'0','0','0','7','0','2014-01-09 09:40:18');
INSERT INTO `xwd_user` (`uid`,`username`,`password`,`nick_name`,`email`,`avatar`,`groupid`,`credits`,`regip`,`regtime`,`lastlogin`,`gender`,`birthday`,`phone`,`qq`,`signature`,`access_token`,`questions`,`answers`,`adopts`,`isnotify`,`status`,`created_time`) VALUES ('2','edit','7fef6171469e80d32c0559f88b377245','网友',NULL,NULL,'4','0',NULL,'0','0','0',NULL,NULL,NULL,NULL,NULL,'0','0','0','7','0','2014-01-11 09:56:13');
INSERT INTO `xwd_user` (`uid`,`username`,`password`,`nick_name`,`email`,`avatar`,`groupid`,`credits`,`regip`,`regtime`,`lastlogin`,`gender`,`birthday`,`phone`,`qq`,`signature`,`access_token`,`questions`,`answers`,`adopts`,`isnotify`,`status`,`created_time`) VALUES ('3','vip11','7fef6171469e80d32c0559f88b377245','网友',NULL,NULL,'4','0',NULL,'0','0','0',NULL,NULL,NULL,NULL,NULL,'0','0','0','7','0','2014-01-11 09:56:32');
INSERT INTO `xwd_user` (`uid`,`username`,`password`,`nick_name`,`email`,`avatar`,`groupid`,`credits`,`regip`,`regtime`,`lastlogin`,`gender`,`birthday`,`phone`,`qq`,`signature`,`access_token`,`questions`,`answers`,`adopts`,`isnotify`,`status`,`created_time`) VALUES ('8','1111111111','e11170b8cbd2d74102651cb967fa28e5','网友',NULL,NULL,'4','0',NULL,'1389334382','1389334382','0',NULL,NULL,NULL,NULL,NULL,'0','0','0','7','0','2014-01-10 14:13:02');
INSERT INTO `xwd_user` (`uid`,`username`,`password`,`nick_name`,`email`,`avatar`,`groupid`,`credits`,`regip`,`regtime`,`lastlogin`,`gender`,`birthday`,`phone`,`qq`,`signature`,`access_token`,`questions`,`answers`,`adopts`,`isnotify`,`status`,`created_time`) VALUES ('9','111111','4c6dad240a32bd4f20bf322a9c912180','网友',NULL,NULL,'4','0',NULL,'1389346432','1389346432','0',NULL,NULL,NULL,NULL,NULL,'0','0','0','7','0','2014-01-10 17:33:52');
INSERT INTO `xwd_user` (`uid`,`username`,`password`,`nick_name`,`email`,`avatar`,`groupid`,`credits`,`regip`,`regtime`,`lastlogin`,`gender`,`birthday`,`phone`,`qq`,`signature`,`access_token`,`questions`,`answers`,`adopts`,`isnotify`,`status`,`created_time`) VALUES ('10','222222','e3ceb5881a0a1fdaad01296d7554868d','网友',NULL,NULL,'4','0',NULL,'1389401371','1389401371','0',NULL,NULL,NULL,NULL,NULL,'0','0','0','7','0','2014-01-11 08:49:31');
INSERT INTO `xwd_user` (`uid`,`username`,`password`,`nick_name`,`email`,`avatar`,`groupid`,`credits`,`regip`,`regtime`,`lastlogin`,`gender`,`birthday`,`phone`,`qq`,`signature`,`access_token`,`questions`,`answers`,`adopts`,`isnotify`,`status`,`created_time`) VALUES ('14','abanet','7fef6171469e80d32c0559f88b377245','网友','a@b.c',NULL,'4','0',NULL,'1389577902','0','0',NULL,NULL,NULL,NULL,NULL,'0','0','0','7','0','2014-01-13 09:51:42');
INSERT INTO `xwd_user` (`uid`,`username`,`password`,`nick_name`,`email`,`avatar`,`groupid`,`credits`,`regip`,`regtime`,`lastlogin`,`gender`,`birthday`,`phone`,`qq`,`signature`,`access_token`,`questions`,`answers`,`adopts`,`isnotify`,`status`,`created_time`) VALUES ('22','abanet3','f1debb149195b8b227ceaf9a2fc40129','网友','3b@b.c',NULL,'3','0',NULL,'1389596146','0','0',NULL,NULL,NULL,NULL,NULL,'0','0','0','7','0','2014-01-13 14:55:46');
INSERT INTO `xwd_user` (`uid`,`username`,`password`,`nick_name`,`email`,`avatar`,`groupid`,`credits`,`regip`,`regtime`,`lastlogin`,`gender`,`birthday`,`phone`,`qq`,`signature`,`access_token`,`questions`,`answers`,`adopts`,`isnotify`,`status`,`created_time`) VALUES ('23','uer111','1d27f44183cbf30bcfc6e42a1a8dce2e','网友','uer111@uer111.cc',NULL,'4','0',NULL,'1389596337','0','0',NULL,NULL,NULL,NULL,NULL,'0','0','0','7','0','2014-01-13 14:58:57');
INSERT INTO `xwd_user` (`uid`,`username`,`password`,`nick_name`,`email`,`avatar`,`groupid`,`credits`,`regip`,`regtime`,`lastlogin`,`gender`,`birthday`,`phone`,`qq`,`signature`,`access_token`,`questions`,`answers`,`adopts`,`isnotify`,`status`,`created_time`) VALUES ('24','user222','0fe4305f97b115279f779548b7c68657','网友','user222@user222.cc',NULL,'4','0',NULL,'1389596483','0','0',NULL,NULL,NULL,NULL,NULL,'0','0','0','7','0','2014-01-13 15:01:23');
INSERT INTO `xwd_user` (`uid`,`username`,`password`,`nick_name`,`email`,`avatar`,`groupid`,`credits`,`regip`,`regtime`,`lastlogin`,`gender`,`birthday`,`phone`,`qq`,`signature`,`access_token`,`questions`,`answers`,`adopts`,`isnotify`,`status`,`created_time`) VALUES ('28','thunje','df97b19def9823be9fd510692e3d2c5d','网友','thunje@qq.com',NULL,'4','0',NULL,'1389764371','0','0',NULL,NULL,NULL,NULL,NULL,'0','0','0','7','1','2014-01-15 13:39:31');
INSERT INTO `xwd_user` (`uid`,`username`,`password`,`nick_name`,`email`,`avatar`,`groupid`,`credits`,`regip`,`regtime`,`lastlogin`,`gender`,`birthday`,`phone`,`qq`,`signature`,`access_token`,`questions`,`answers`,`adopts`,`isnotify`,`status`,`created_time`) VALUES ('31','admin1','e00cf25ad42683b3df678c61f42c6bda','网友','admin1@admin1.n',NULL,'1','0',NULL,'1389774722','0','0',NULL,NULL,NULL,NULL,NULL,'0','0','0','7','1','2014-01-15 16:32:02');
INSERT INTO `xwd_user` (`uid`,`username`,`password`,`nick_name`,`email`,`avatar`,`groupid`,`credits`,`regip`,`regtime`,`lastlogin`,`gender`,`birthday`,`phone`,`qq`,`signature`,`access_token`,`questions`,`answers`,`adopts`,`isnotify`,`status`,`created_time`) VALUES ('39','448055122@qq.com','e10adc3949ba59abbe56e057f20f883e','张三',NULL,NULL,'4','0',NULL,'1389937273','1389937273','0',NULL,NULL,NULL,NULL,NULL,'0','0','0','7','1','2014-01-17 13:41:13');
INSERT INTO `xwd_user` (`uid`,`username`,`password`,`nick_name`,`email`,`avatar`,`groupid`,`credits`,`regip`,`regtime`,`lastlogin`,`gender`,`birthday`,`phone`,`qq`,`signature`,`access_token`,`questions`,`answers`,`adopts`,`isnotify`,`status`,`created_time`) VALUES ('40','pengzhiquan','e10adc3949ba59abbe56e057f20f883e','张三',NULL,NULL,'4','0',NULL,'1389938740','1389938740','0',NULL,NULL,NULL,NULL,NULL,'0','0','0','7','1','2014-01-17 14:05:40');
/*!40000 ALTER TABLE `xwd_user` ENABLE KEYS */;


--
-- Create Table `xwd_usergroup`
--

DROP TABLE IF EXISTS `xwd_usergroup`;
CREATE TABLE `xwd_usergroup` (
  `groupid` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户组ID',
  `groupmark` char(30) NOT NULL DEFAULT 'user' COMMENT '用户组标识',
  `grouptitle` char(30) NOT NULL DEFAULT '' COMMENT '用户组名',
  `grouptype` tinyint(1) NOT NULL DEFAULT '2' COMMENT '用户组类型',
  `creditslower` int(10) NOT NULL COMMENT '所属组最低积分',
  `creditshigher` int(10) NOT NULL DEFAULT '0' COMMENT '所属组最高积分',
  `regulars` text NOT NULL COMMENT '权限管理',
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`groupid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='用户组表';

--
-- Data for Table `xwd_usergroup`
--

/*!40000 ALTER TABLE `xwd_usergroup` DISABLE KEYS */;
INSERT INTO `xwd_usergroup` (`groupid`,`groupmark`,`grouptitle`,`grouptype`,`creditslower`,`creditshigher`,`regulars`,`created_time`) VALUES ('1','admin','管理员','0','0','0','','0000-00-00 00:00:00');
INSERT INTO `xwd_usergroup` (`groupid`,`groupmark`,`grouptitle`,`grouptype`,`creditslower`,`creditshigher`,`regulars`,`created_time`) VALUES ('2','edit','编辑','0','0','0','','0000-00-00 00:00:00');
INSERT INTO `xwd_usergroup` (`groupid`,`groupmark`,`grouptitle`,`grouptype`,`creditslower`,`creditshigher`,`regulars`,`created_time`) VALUES ('3','vip','高级用户','0','0','0','','0000-00-00 00:00:00');
INSERT INTO `xwd_usergroup` (`groupid`,`groupmark`,`grouptitle`,`grouptype`,`creditslower`,`creditshigher`,`regulars`,`created_time`) VALUES ('4','user','普通用户','0','0','0','','0000-00-00 00:00:00');
INSERT INTO `xwd_usergroup` (`groupid`,`groupmark`,`grouptitle`,`grouptype`,`creditslower`,`creditshigher`,`regulars`,`created_time`) VALUES ('5','guest','游客','0','0','0','','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `xwd_usergroup` ENABLE KEYS */;

SET FOREIGN_KEY_CHECKS=1;
-- EOB

