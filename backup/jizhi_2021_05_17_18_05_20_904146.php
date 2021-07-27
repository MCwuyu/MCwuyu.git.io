<?php die();?>/*
MySQL Database Backup Tools
Server:127.0.0.1:3306
Database:jizhi
Data:2021-05-17 18:05:20
*/
SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for jz_article
-- ----------------------------
DROP TABLE IF EXISTS `jz_article`;
CREATE TABLE `jz_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `tid` int(11) NOT NULL DEFAULT '0',
  `molds` varchar(50) DEFAULT NULL,
  `htmlurl` varchar(50) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `userid` int(11) NOT NULL DEFAULT '0',
  `litpic` varchar(255) DEFAULT NULL,
  `body` text,
  `addtime` int(11) NOT NULL DEFAULT '0',
  `orders` int(4) NOT NULL DEFAULT '0',
  `hits` int(11) NOT NULL DEFAULT '0',
  `isshow` tinyint(1) NOT NULL DEFAULT '1',
  `comment_num` int(11) NOT NULL DEFAULT '0' COMMENT '评论数',
  `istop` varchar(2) NOT NULL DEFAULT '0' COMMENT '是否置顶',
  `ishot` varchar(2) NOT NULL DEFAULT '0' COMMENT '是否头条',
  `istuijian` varchar(2) NOT NULL DEFAULT '0' COMMENT '是否推荐',
  `tags` varchar(255) DEFAULT NULL,
  `member_id` int(11) NOT NULL DEFAULT '0',
  `target` varchar(255) DEFAULT NULL,
  `ownurl` varchar(255) DEFAULT NULL,
  `spurl` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `stock_num` int(11) DEFAULT '9999999',
  `fufei` varchar(255) DEFAULT NULL,
  `xiazmm` varchar(10) DEFAULT NULL,
  `jymm` varchar(255) DEFAULT NULL,
  `hyfz` int(3) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_buylog
-- ----------------------------
DROP TABLE IF EXISTS `jz_buylog`;
CREATE TABLE `jz_buylog` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(11) DEFAULT '0',
  `userid` int(11) DEFAULT '0',
  `orderno` varchar(255) DEFAULT NULL,
  `type` tinyint(1) DEFAULT '1',
  `buytype` varchar(20) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
  `molds` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `addtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_cachedata
-- ----------------------------
DROP TABLE IF EXISTS `jz_cachedata`;
CREATE TABLE `jz_cachedata` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `field` varchar(50) DEFAULT NULL,
  `molds` varchar(50) DEFAULT NULL,
  `tid` int(11) NOT NULL DEFAULT '0',
  `isall` tinyint(1) NOT NULL DEFAULT '1',
  `sqls` varchar(500) DEFAULT NULL,
  `orders` varchar(255) DEFAULT NULL,
  `limits` int(11) NOT NULL DEFAULT '10',
  `times` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_classtype
-- ----------------------------
DROP TABLE IF EXISTS `jz_classtype`;
CREATE TABLE `jz_classtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classname` varchar(50) DEFAULT NULL,
  `seo_classname` varchar(50) DEFAULT NULL,
  `molds` varchar(50) DEFAULT NULL,
  `litpic` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `body` text,
  `orders` int(4) NOT NULL DEFAULT '0',
  `orderstype` int(4) NOT NULL DEFAULT '0',
  `isshow` tinyint(1) NOT NULL DEFAULT '1',
  `iscover` tinyint(1) NOT NULL DEFAULT '0',
  `pid` int(11) NOT NULL DEFAULT '0',
  `gid` int(11) NOT NULL DEFAULT '0' COMMENT '访问分组设定，默认0不设定',
  `htmlurl` varchar(50) DEFAULT NULL COMMENT '栏目url命名',
  `lists_html` varchar(50) DEFAULT NULL COMMENT '栏目页HTML',
  `details_html` varchar(50) DEFAULT NULL COMMENT '详情页HTML',
  `lists_num` int(4) DEFAULT '0',
  `comment_num` int(11) NOT NULL DEFAULT '0',
  `gourl` varchar(255) DEFAULT NULL COMMENT '栏目外链',
  `ishome` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否会员发布显示',
  `isclose` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_collect
-- ----------------------------
DROP TABLE IF EXISTS `jz_collect`;
CREATE TABLE `jz_collect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL,
  `litpic` varchar(255) DEFAULT NULL,
  `w` varchar(10) NOT NULL DEFAULT '0',
  `h` varchar(10) NOT NULL DEFAULT '0',
  `orders` int(11) NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL DEFAULT '0',
  `isshow` tinyint(1) NOT NULL DEFAULT '1',
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_collect_type
-- ----------------------------
DROP TABLE IF EXISTS `jz_collect_type`;
CREATE TABLE `jz_collect_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_comment
-- ----------------------------
DROP TABLE IF EXISTS `jz_comment`;
CREATE TABLE `jz_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(4) NOT NULL DEFAULT '0' COMMENT '栏目tid',
  `aid` int(11) NOT NULL DEFAULT '0' COMMENT '文章id',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '回复帖子id',
  `zid` int(11) NOT NULL DEFAULT '0' COMMENT '主回复帖子，同一层楼内回复，规定主回复id',
  `body` text,
  `reply` text,
  `addtime` int(11) NOT NULL DEFAULT '0',
  `userid` int(11) NOT NULL DEFAULT '0' COMMENT '用户id，0表示游客',
  `likes` decimal(10,1) NOT NULL DEFAULT '0.0' COMMENT '喜欢，点赞',
  `isshow` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否删除，1未删除，0删除',
  `isread` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `tid` (`tid`),
  KEY `aid` (`aid`),
  KEY `pid` (`pid`),
  KEY `zid` (`zid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_customurl
-- ----------------------------
DROP TABLE IF EXISTS `jz_customurl`;
CREATE TABLE `jz_customurl` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `molds` varchar(50) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `tid` int(11) NOT NULL DEFAULT '0',
  `aid` int(11) NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_fields
-- ----------------------------
DROP TABLE IF EXISTS `jz_fields`;
CREATE TABLE `jz_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field` varchar(50) DEFAULT NULL,
  `molds` varchar(50) DEFAULT NULL,
  `fieldname` varchar(100) DEFAULT NULL,
  `tips` varchar(100) DEFAULT NULL,
  `fieldtype` tinyint(2) NOT NULL DEFAULT '1',
  `tids` text COMMENT '栏目tid',
  `fieldlong` varchar(50) DEFAULT NULL,
  `body` text,
  `orders` int(11) NOT NULL DEFAULT '1',
  `ismust` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1必须填写0不必',
  `isshow` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1前台显示0不显示',
  `isadmin` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1后台显示0不显示',
  `issearch` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1显示搜索，0不显示搜索',
  `islist` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否列表中显示',
  `format` varchar(50) DEFAULT NULL COMMENT '显示格式化',
  `vdata` varchar(50) DEFAULT NULL COMMENT '字段默认值',
  `isajax` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_hook
-- ----------------------------
DROP TABLE IF EXISTS `jz_hook`;
CREATE TABLE `jz_hook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(50) DEFAULT NULL COMMENT '模块，Home/A',
  `namespace` varchar(100) DEFAULT NULL COMMENT '控制器命名空间',
  `controller` varchar(50) DEFAULT NULL COMMENT '控制器',
  `action` varchar(255) DEFAULT NULL COMMENT '方法,可同时注册多个方法，逗号拼接',
  `hook_namespace` varchar(100) DEFAULT NULL COMMENT '钩子控制器所在的命名空间',
  `hook_controller` varchar(50) DEFAULT NULL COMMENT '钩子控制器',
  `hook_action` varchar(50) DEFAULT NULL COMMENT '钩子执行方法',
  `all_action` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否全局控制器',
  `orders` int(4) NOT NULL DEFAULT '0' COMMENT '排序，越大越靠前执行',
  `isopen` tinyint(1) NOT NULL DEFAULT '0' COMMENT '插件是否关闭，默认0关闭',
  `plugins_name` varchar(50) DEFAULT NULL COMMENT '关联插件名',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='插件钩子';
-- ----------------------------
-- Table structure for jz_layout
-- ----------------------------
DROP TABLE IF EXISTS `jz_layout`;
CREATE TABLE `jz_layout` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `top_layout` text,
  `left_layout` text,
  `gid` int(11) DEFAULT NULL,
  `ext` varchar(255) DEFAULT NULL,
  `sys` tinyint(1) NOT NULL DEFAULT '0',
  `isdefault` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1系统默认布局',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_level
-- ----------------------------
DROP TABLE IF EXISTS `jz_level`;
CREATE TABLE `jz_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `gid` int(4) NOT NULL DEFAULT '2',
  `email` varchar(50) DEFAULT NULL,
  `regtime` int(11) NOT NULL DEFAULT '0',
  `logintime` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_level_group
-- ----------------------------
DROP TABLE IF EXISTS `jz_level_group`;
CREATE TABLE `jz_level_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `isadmin` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否管理员，最高权限，无视控制器限制',
  `ischeck` tinyint(1) NOT NULL DEFAULT '0',
  `classcontrol` tinyint(1) NOT NULL DEFAULT '0',
  `paction` text COMMENT '动作参数，控制器/方法，如Admin/index',
  `tids` text,
  `isagree` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1允许登录0不允许',
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_link_type
-- ----------------------------
DROP TABLE IF EXISTS `jz_link_type`;
CREATE TABLE `jz_link_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_links
-- ----------------------------
DROP TABLE IF EXISTS `jz_links`;
CREATE TABLE `jz_links` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `molds` varchar(50) DEFAULT 'links',
  `url` varchar(255) DEFAULT NULL,
  `isshow` tinyint(1) DEFAULT '1',
  `tid` int(11) NOT NULL DEFAULT '0',
  `userid` int(11) NOT NULL DEFAULT '0',
  `htmlurl` varchar(50) DEFAULT NULL,
  `orders` int(11) NOT NULL DEFAULT '0',
  `member_id` int(11) NOT NULL DEFAULT '0',
  `target` varchar(255) DEFAULT NULL,
  `ownurl` varchar(255) DEFAULT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_member
-- ----------------------------
DROP TABLE IF EXISTS `jz_member`;
CREATE TABLE `jz_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `openid` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL COMMENT '记住密码或者忘记密码使用',
  `sex` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1男2女0未知',
  `gid` int(11) NOT NULL DEFAULT '1' COMMENT '分组ID',
  `litpic` varchar(255) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `jifen` decimal(10,2) NOT NULL DEFAULT '0.00',
  `likes` text COMMENT '喜欢/点赞的文章id,||tid-id||tid-id||',
  `collection` text COMMENT '收藏存储，||tid-id||tid-id||',
  `money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `regtime` int(11) NOT NULL DEFAULT '0',
  `logintime` int(11) NOT NULL DEFAULT '0',
  `isshow` tinyint(1) NOT NULL DEFAULT '1',
  `signature` varchar(255) DEFAULT NULL COMMENT '个性签名',
  `birthday` varchar(25) DEFAULT NULL COMMENT '生日：2020-01-01',
  `follow` text COMMENT '关注列表',
  `fans` int(11) NOT NULL DEFAULT '0' COMMENT '粉丝数',
  `ismsg` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否开启接收消息提醒',
  `iscomment` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否开启接收评论消息提醒',
  `iscollect` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否开启接收收藏消息提醒',
  `islikes` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否开启接收点赞消息提醒',
  `isat` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否开启接收@消息提醒',
  `isrechange` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否开启接收交易消息提醒',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '推荐用户ID',
  `qq_openid` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_member_group
-- ----------------------------
DROP TABLE IF EXISTS `jz_member_group`;
CREATE TABLE `jz_member_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT '分组名',
  `description` varchar(255) DEFAULT NULL COMMENT '分组简介',
  `paction` text COMMENT '权限',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '分组上级',
  `isagree` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否允许登录',
  `iscomment` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否允许评论',
  `ischeckmsg` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否需要审核评论',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `orders` int(11) NOT NULL DEFAULT '0',
  `discount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '折扣价，现金折扣或者百分比折扣',
  `discount_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0无折扣,1现金折扣,1百分比折扣',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='会员分组';
-- ----------------------------
-- Table structure for jz_menu
-- ----------------------------
DROP TABLE IF EXISTS `jz_menu`;
CREATE TABLE `jz_menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `nav` text,
  `isshow` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_message
-- ----------------------------
DROP TABLE IF EXISTS `jz_message`;
CREATE TABLE `jz_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `userid` int(11) NOT NULL DEFAULT '0',
  `tid` int(4) NOT NULL DEFAULT '0',
  `aid` int(11) NOT NULL DEFAULT '0',
  `user` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `body` text,
  `tel` varchar(50) DEFAULT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  `orders` int(4) NOT NULL DEFAULT '0',
  `email` varchar(255) DEFAULT NULL,
  `isshow` tinyint(1) NOT NULL DEFAULT '0',
  `istop` tinyint(1) NOT NULL DEFAULT '0',
  `hits` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_molds
-- ----------------------------
DROP TABLE IF EXISTS `jz_molds`;
CREATE TABLE `jz_molds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `biaoshi` varchar(50) DEFAULT NULL,
  `sys` tinyint(1) NOT NULL DEFAULT '0',
  `isopen` tinyint(1) NOT NULL DEFAULT '1',
  `iscontrol` tinyint(1) NOT NULL DEFAULT '0',
  `ismust` tinyint(1) NOT NULL DEFAULT '0',
  `isclasstype` tinyint(1) NOT NULL DEFAULT '1',
  `isshowclass` tinyint(1) DEFAULT '1',
  `list_html` varchar(50) DEFAULT 'list.html',
  `details_html` varchar(50) DEFAULT 'details.html',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_orders
-- ----------------------------
DROP TABLE IF EXISTS `jz_orders`;
CREATE TABLE `jz_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderno` varchar(255) DEFAULT NULL,
  `userid` int(11) NOT NULL DEFAULT '0',
  `paytype` varchar(20) DEFAULT NULL COMMENT '支付方式',
  `ptype` tinyint(1) DEFAULT '1' COMMENT '1商品购买2充值金额3充值积分',
  `tel` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `tid` int(11) NOT NULL DEFAULT '0',
  `price` varchar(200) DEFAULT NULL,
  `jifen` decimal(10,2) NOT NULL DEFAULT '0.00',
  `qianbao` decimal(10,2) NOT NULL DEFAULT '0.00',
  `body` text,
  `receive_username` varchar(50) DEFAULT NULL,
  `receive_tel` varchar(20) DEFAULT NULL,
  `receive_email` varchar(50) DEFAULT NULL,
  `receive_address` varchar(255) DEFAULT NULL,
  `ispay` tinyint(1) NOT NULL DEFAULT '0',
  `paytime` int(11) NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL DEFAULT '0',
  `send_time` int(11) NOT NULL DEFAULT '0' COMMENT '发货时间',
  `isshow` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1提交订单,2已支付,3超时,4已提交订单,5已发货,6已废弃失效,0删除订单',
  `discount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `yunfei` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_page
-- ----------------------------
DROP TABLE IF EXISTS `jz_page`;
CREATE TABLE `jz_page` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL DEFAULT '0',
  `htmlurl` varchar(50) DEFAULT NULL,
  `orders` int(11) NOT NULL DEFAULT '0',
  `member_id` int(11) NOT NULL DEFAULT '0',
  `isshow` tinyint(1) DEFAULT '1',
  `istop` tinyint(1) NOT NULL DEFAULT '0',
  `hits` int(11) NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_pictures
-- ----------------------------
DROP TABLE IF EXISTS `jz_pictures`;
CREATE TABLE `jz_pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL DEFAULT '0',
  `aid` int(11) NOT NULL DEFAULT '0',
  `molds` varchar(50) DEFAULT NULL,
  `path` varchar(20) DEFAULT 'Admin',
  `filetype` varchar(20) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `litpic` varchar(255) DEFAULT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  `userid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COMMENT='图片集';
-- ----------------------------
-- Table structure for jz_plugins
-- ----------------------------
DROP TABLE IF EXISTS `jz_plugins`;
CREATE TABLE `jz_plugins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `filepath` varchar(50) DEFAULT NULL COMMENT '插件文件名',
  `description` varchar(255) DEFAULT NULL,
  `version` decimal(2,1) NOT NULL DEFAULT '0.0',
  `author` varchar(50) DEFAULT NULL,
  `update_time` int(11) NOT NULL DEFAULT '0',
  `module` varchar(20) NOT NULL DEFAULT 'Home',
  `isopen` tinyint(1) NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL DEFAULT '0',
  `config` text COMMENT '配置',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_power
-- ----------------------------
DROP TABLE IF EXISTS `jz_power`;
CREATE TABLE `jz_power` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  `isagree` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否开放',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=utf8 COMMENT='用户权限表';
-- ----------------------------
-- Table structure for jz_product
-- ----------------------------
DROP TABLE IF EXISTS `jz_product`;
CREATE TABLE `jz_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `molds` varchar(50) DEFAULT 'product',
  `title` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `tid` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) NOT NULL DEFAULT '0',
  `htmlurl` varchar(50) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `litpic` varchar(255) DEFAULT NULL COMMENT '首图',
  `stock_num` int(11) NOT NULL DEFAULT '0' COMMENT '库存',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `pictures` text COMMENT '图集',
  `isshow` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1显示,0不显示',
  `comment_num` int(11) NOT NULL DEFAULT '0',
  `body` text COMMENT '内容',
  `userid` int(11) NOT NULL DEFAULT '0' COMMENT '录入管理员',
  `orders` int(11) NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `istop` varchar(2) NOT NULL DEFAULT '0' COMMENT '是否置顶',
  `ishot` varchar(2) NOT NULL DEFAULT '0' COMMENT '是否头条',
  `istuijian` varchar(2) NOT NULL DEFAULT '0' COMMENT '是否推荐',
  `tags` varchar(255) DEFAULT NULL,
  `member_id` int(11) NOT NULL DEFAULT '0',
  `target` varchar(255) DEFAULT NULL,
  `ownurl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品表';
-- ----------------------------
-- Table structure for jz_ruler
-- ----------------------------
DROP TABLE IF EXISTS `jz_ruler`;
CREATE TABLE `jz_ruler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `fc` varchar(50) DEFAULT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  `isdesktop` tinyint(1) NOT NULL DEFAULT '0',
  `sys` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1系统自带0不是系统自带',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=199 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_sysconfig
-- ----------------------------
DROP TABLE IF EXISTS `jz_sysconfig`;
CREATE TABLE `jz_sysconfig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field` varchar(50) DEFAULT NULL COMMENT '配置字段',
  `title` varchar(255) DEFAULT NULL COMMENT '配置名称',
  `tip` varchar(255) DEFAULT NULL COMMENT '字段填写提示',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '配置类型,0系统配置,1图片类型,2输入框,3简短文字',
  `data` text COMMENT '配置内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=119 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_tags
-- ----------------------------
DROP TABLE IF EXISTS `jz_tags`;
CREATE TABLE `jz_tags` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tid` int(11) DEFAULT '0',
  `orders` int(11) DEFAULT '0',
  `comment_num` int(11) DEFAULT '0',
  `molds` varchar(50) DEFAULT 'tags',
  `htmlurl` varchar(100) DEFAULT NULL,
  `keywords` varchar(50) DEFAULT NULL,
  `newname` varchar(50) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `num` int(4) DEFAULT '-1',
  `isshow` tinyint(1) DEFAULT '1',
  `target` varchar(50) DEFAULT '_blank',
  `number` int(11) DEFAULT '0',
  `member_id` int(11) DEFAULT '0',
  `ownurl` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for jz_task
-- ----------------------------
DROP TABLE IF EXISTS `jz_task`;
CREATE TABLE `jz_task` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tid` int(11) DEFAULT '0',
  `aid` int(11) DEFAULT '0',
  `userid` int(11) DEFAULT '0',
  `puserid` int(11) DEFAULT '0',
  `molds` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `body` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `isread` tinyint(1) DEFAULT '0',
  `isshow` tinyint(1) DEFAULT '1',
  `readtime` int(11) DEFAULT '0',
  `addtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for skycaiji_app
-- ----------------------------
DROP TABLE IF EXISTS `skycaiji_app`;
CREATE TABLE `skycaiji_app` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app` varchar(100) NOT NULL,
  `provider_id` int(11) NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL DEFAULT '0',
  `uptime` int(11) NOT NULL DEFAULT '0',
  `config` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for skycaiji_cache_backstage_task
-- ----------------------------
DROP TABLE IF EXISTS `skycaiji_cache_backstage_task`;
CREATE TABLE `skycaiji_cache_backstage_task` (
  `cname` varchar(32) NOT NULL,
  `ctype` tinyint(3) unsigned NOT NULL,
  `dateline` int(10) unsigned NOT NULL,
  `data` mediumblob NOT NULL,
  PRIMARY KEY (`cname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for skycaiji_cache_cont_url
-- ----------------------------
DROP TABLE IF EXISTS `skycaiji_cache_cont_url`;
CREATE TABLE `skycaiji_cache_cont_url` (
  `cname` varchar(32) NOT NULL,
  `ctype` tinyint(3) unsigned NOT NULL,
  `dateline` int(10) unsigned NOT NULL,
  `data` mediumblob NOT NULL,
  PRIMARY KEY (`cname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for skycaiji_cache_level_url
-- ----------------------------
DROP TABLE IF EXISTS `skycaiji_cache_level_url`;
CREATE TABLE `skycaiji_cache_level_url` (
  `cname` varchar(32) NOT NULL,
  `ctype` tinyint(3) unsigned NOT NULL,
  `dateline` int(10) unsigned NOT NULL,
  `data` mediumblob NOT NULL,
  PRIMARY KEY (`cname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for skycaiji_cache_login
-- ----------------------------
DROP TABLE IF EXISTS `skycaiji_cache_login`;
CREATE TABLE `skycaiji_cache_login` (
  `cname` varchar(32) NOT NULL,
  `ctype` tinyint(3) unsigned NOT NULL,
  `dateline` int(10) unsigned NOT NULL,
  `data` mediumblob NOT NULL,
  PRIMARY KEY (`cname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for skycaiji_cache_source_url
-- ----------------------------
DROP TABLE IF EXISTS `skycaiji_cache_source_url`;
CREATE TABLE `skycaiji_cache_source_url` (
  `cname` varchar(32) NOT NULL,
  `ctype` tinyint(3) unsigned NOT NULL,
  `dateline` int(10) unsigned NOT NULL,
  `data` mediumblob NOT NULL,
  PRIMARY KEY (`cname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for skycaiji_collected
-- ----------------------------
DROP TABLE IF EXISTS `skycaiji_collected`;
CREATE TABLE `skycaiji_collected` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(1000) NOT NULL DEFAULT '',
  `urlMd5` varchar(32) NOT NULL DEFAULT '',
  `release` varchar(10) NOT NULL DEFAULT '',
  `task_id` int(11) NOT NULL DEFAULT '0',
  `target` varchar(1000) NOT NULL DEFAULT '',
  `desc` varchar(1000) NOT NULL DEFAULT '',
  `error` varchar(1000) NOT NULL DEFAULT '',
  `addtime` int(11) NOT NULL DEFAULT '0',
  `titleMd5` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `ix_urlmd5` (`urlMd5`),
  KEY `ix_taskid` (`task_id`),
  KEY `ix_addtime` (`addtime`),
  KEY `ix_titlemd5` (`titleMd5`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for skycaiji_collector
-- ----------------------------
DROP TABLE IF EXISTS `skycaiji_collector`;
CREATE TABLE `skycaiji_collector` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  `module` varchar(10) NOT NULL DEFAULT '',
  `addtime` int(11) NOT NULL DEFAULT '0',
  `uptime` int(11) NOT NULL DEFAULT '0',
  `config` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for skycaiji_config
-- ----------------------------
DROP TABLE IF EXISTS `skycaiji_config`;
CREATE TABLE `skycaiji_config` (
  `cname` varchar(32) NOT NULL,
  `ctype` tinyint(3) unsigned NOT NULL,
  `dateline` int(10) unsigned NOT NULL,
  `data` mediumblob NOT NULL,
  PRIMARY KEY (`cname`),
  KEY `dateline` (`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for skycaiji_func_app
-- ----------------------------
DROP TABLE IF EXISTS `skycaiji_func_app`;
CREATE TABLE `skycaiji_func_app` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(20) NOT NULL DEFAULT '',
  `app` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `desc` text,
  `enable` tinyint(1) NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL DEFAULT '0',
  `uptime` int(11) NOT NULL DEFAULT '0',
  `provider_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ix_app` (`app`),
  UNIQUE KEY `module_app` (`module`,`app`),
  KEY `module_enable` (`module`,`enable`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for skycaiji_provider
-- ----------------------------
DROP TABLE IF EXISTS `skycaiji_provider`;
CREATE TABLE `skycaiji_provider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `domain` varchar(255) NOT NULL DEFAULT '',
  `enable` tinyint(4) NOT NULL DEFAULT '0',
  `sort` mediumint(9) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `domain` (`domain`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for skycaiji_proxy_ip
-- ----------------------------
DROP TABLE IF EXISTS `skycaiji_proxy_ip`;
CREATE TABLE `skycaiji_proxy_ip` (
  `ip` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL DEFAULT '',
  `pwd` varchar(100) NOT NULL DEFAULT '',
  `invalid` tinyint(4) NOT NULL DEFAULT '0',
  `failed` int(11) NOT NULL DEFAULT '0',
  `num` int(11) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0',
  `type` varchar(20) NOT NULL DEFAULT '',
  `addtime` int(11) NOT NULL DEFAULT '0',
  `no` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ip`),
  KEY `no` (`no`),
  KEY `addtime_no` (`addtime`,`no`),
  KEY `ix_num` (`num`),
  KEY `ix_time` (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for skycaiji_release
-- ----------------------------
DROP TABLE IF EXISTS `skycaiji_release`;
CREATE TABLE `skycaiji_release` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  `module` varchar(10) NOT NULL DEFAULT '',
  `addtime` int(11) NOT NULL DEFAULT '0',
  `config` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for skycaiji_release_app
-- ----------------------------
DROP TABLE IF EXISTS `skycaiji_release_app`;
CREATE TABLE `skycaiji_release_app` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(10) NOT NULL DEFAULT '',
  `app` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT '',
  `desc` text,
  `addtime` int(11) NOT NULL DEFAULT '0',
  `uptime` int(11) NOT NULL DEFAULT '0',
  `provider_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `module_app` (`module`,`app`),
  UNIQUE KEY `ix_app` (`app`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for skycaiji_rule
-- ----------------------------
DROP TABLE IF EXISTS `skycaiji_rule`;
CREATE TABLE `skycaiji_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(20) NOT NULL DEFAULT '',
  `module` varchar(20) NOT NULL DEFAULT '',
  `store_id` int(11) NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL DEFAULT '0',
  `uptime` int(11) NOT NULL DEFAULT '0',
  `provider_id` int(11) NOT NULL DEFAULT '0',
  `config` mediumtext,
  PRIMARY KEY (`id`),
  KEY `store_id` (`store_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for skycaiji_task
-- ----------------------------
DROP TABLE IF EXISTS `skycaiji_task`;
CREATE TABLE `skycaiji_task` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `tg_id` int(11) NOT NULL DEFAULT '0',
  `module` varchar(10) NOT NULL DEFAULT '',
  `auto` tinyint(4) NOT NULL DEFAULT '0',
  `sort` mediumint(9) NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL DEFAULT '0',
  `caijitime` int(11) NOT NULL DEFAULT '0',
  `config` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for skycaiji_taskgroup
-- ----------------------------
DROP TABLE IF EXISTS `skycaiji_taskgroup`;
CREATE TABLE `skycaiji_taskgroup` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `sort` mediumint(9) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for skycaiji_user
-- ----------------------------
DROP TABLE IF EXISTS `skycaiji_user`;
CREATE TABLE `skycaiji_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(50) NOT NULL DEFAULT '',
  `groupid` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '',
  `regtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for skycaiji_usergroup
-- ----------------------------
DROP TABLE IF EXISTS `skycaiji_usergroup`;
CREATE TABLE `skycaiji_usergroup` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `founder` tinyint(4) NOT NULL DEFAULT '0',
  `admin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of jz_article
-- ----------------------------
INSERT INTO `jz_article` (`id`,`title`,`tid`,`molds`,`htmlurl`,`keywords`,`description`,`seo_title`,`userid`,`litpic`,`body`,`addtime`,`orders`,`hits`,`isshow`,`comment_num`,`istop`,`ishot`,`istuijian`,`tags`,`member_id`,`target`,`ownurl`,`spurl`,`price`,`stock_num`,`fufei`,`xiazmm`,`jymm`,`hyfz`) VALUES ('40','P767A-JD京东三网话费直充系统/移动联通电信话费三网直充/三网话费直充系统','1','article','dm','P767A-JD京东三网话费直充系统/移动联通电信话费三网直充/三网话费直充系统','全新TP框架2.0版本PHP版本，非分享的java不能用的版本，需要的拿吧，现在还是正常可用的','P767A-JD京东三网话费直充系统/移动联通电信话费三网直充/三网话费直充系统','1','/static/upload/2021/05/16/202105161418.png','<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 20px;">系统特性:</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 20px;">①、移动，联通，电信话费使用微信H5/支付宝H5</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 20px;">②、移动话费/联通话费/电信话费额度支持1-任意额度（不得超过官网所支持的额度）</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 20px;">③、系统实测每分钟订单量订单1500单左右，根据所使用的服务器配置不同有所偏差</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 20px;">④、自动检测号码是否已经完成充值返回官方订单号凭证给供应商反馈充值状态</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 20px;">⑤、有独立的商户后台和供应商后台可供供应商或商户查询订单以及官网订单号使用</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 20px;">⑥、实时返回系统协议数据</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 20px;">⑥、分布式模块式运行,整体系统运行更稳定.</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 20px;">⑦、可进行慢充，可批量导入号码</span></p><p><img src="/static/upload/image/20210516/1621138971841056.png" style="" title="1621138971841056.png"/></p><p><img src="/static/upload/image/20210516/1621138973245314.png" style="" title="1621138973245314.png"/></p><p><img src="/static/upload/image/20210516/1621138971224669.png" style="" title="1621138971224669.png"/></p><p><img src="/static/upload/image/20210516/1621138971164227.png" style="" title="1621138971164227.png"/></p><p><img src="/static/upload/image/20210516/1621138971995638.png" style="" title="1621138971995638.png"/></p><p><img src="/static/upload/image/20210516/1621138971586403.png" style="" title="1621138971586403.png"/></p><p><img src="/static/upload/image/20210516/1621138972395361.png" style="" title="1621138972395361.png"/></p><p><img src="/static/upload/image/20210516/1621138972762750.png" style="" title="1621138972762750.png"/></p><p><br/></p>','1621137450','0','188','1','0','1','0','0',',JD京东三网话费直充系统/移动联通电信话费三网直充/三网话费直充系统,','0', NULL, NULL, NULL,'800.00','9999996','https://pan.baidu.com/s/1GhStXhGJV5tBz47xrFVyjg','x080','123','2');
INSERT INTO `jz_article` (`id`,`title`,`tid`,`molds`,`htmlurl`,`keywords`,`description`,`seo_title`,`userid`,`litpic`,`body`,`addtime`,`orders`,`hits`,`isshow`,`comment_num`,`istop`,`ishot`,`istuijian`,`tags`,`member_id`,`target`,`ownurl`,`spurl`,`price`,`stock_num`,`fufei`,`xiazmm`,`jymm`,`hyfz`) VALUES ('41','P789-5月火凤凰打赏系统/视频打赏/影视知识付费/全新升级版2.0版本/超级防封/服务器打包运营版','1','article','dm','P789-5月火凤凰打赏系统/视频打赏/影视知识付费/全新升级版2.0版本/超级防封/服务器打包运营版','界面整洁，ui全新设计 一改以往底层概念，让运营者更安全、更稳定、更方便，带包天包月包年，代理，以及多种支付系统','P789-5月火凤凰打赏系统/视频打赏/影视知识付费/全新升级版2.0版本/超级防封/服务器打包运营版','1','/static/upload/2021/05/16/202105167324.png','<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><br/></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><br data-filtered="filtered" style="box-sizing: border-box;"/></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 24px;">新系统特性：</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 24px;">1、功能、限制设定全部在后台搞定，完全不用改代码，就是不懂技术的人都能用；</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 24px;">2、超级防封，附带赠送防封插件，自动跳过已红域名；</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 24px;">3、系统自带包天、包周、包月，不用改代码，直接后台设置；</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 24px;">4、系统自带市面上常用的支付接口，一键配置，也可以增加新接口；</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 24px;">5、一键生成总推广链接，每次生成链接都不一样，防止短链被墙；</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 24px;">6、采用伪文件+参数加密等方式保护系统文件安全不被篡改</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 24px;">7、有安装教程文本，稍微懂点技术的都可自行安装。</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 24px;">ps：管理后台无法直接导入视频资源，需要在数据库添加！</span></p><p><img src="/static/upload/image/20210516/1621140007632922.png" style="" title="1621140007632922.png"/></p><p><img src="/static/upload/image/20210516/1621140007304643.png" style="" title="1621140007304643.png"/></p><p><img src="/static/upload/image/20210516/1621140006268760.png" style="" title="1621140006268760.png"/></p><p><img src="/static/upload/image/20210516/1621140007525344.png" style="" title="1621140007525344.png"/></p><p><img src="/static/upload/image/20210516/1621140007308071.png" style="" title="1621140007308071.png"/></p><p><img src="/static/upload/image/20210516/1621140007213833.png" style="" title="1621140007213833.png"/></p><p><img src="/static/upload/image/20210516/1621140007540219.png" style="" title="1621140007540219.png"/></p><p><img src="/static/upload/image/20210516/1621140007631307.png" style="" title="1621140007631307.png"/></p><p><br/></p>','1621139935','0','81','1','0','0','0','0',',5月火凤凰打赏系统/视频打赏/影视知识付费/全新升级版2.0版本/超级防封/服务器打包运营版,','0', NULL, NULL, NULL,'300.00','9999998', NULL, NULL, NULL,'2');
INSERT INTO `jz_article` (`id`,`title`,`tid`,`molds`,`htmlurl`,`keywords`,`description`,`seo_title`,`userid`,`litpic`,`body`,`addtime`,`orders`,`hits`,`isshow`,`comment_num`,`istop`,`ishot`,`istuijian`,`tags`,`member_id`,`target`,`ownurl`,`spurl`,`price`,`stock_num`,`fufei`,`xiazmm`,`jymm`,`hyfz`) VALUES ('42','P7631-运营版聚合支付系统/第三方四方支付系统/全开源完整无漏自用服务商运营版','1','article','dm','P7631-运营版聚合支付系统/第三方四方支付系统/全开源完整无漏自用服务商运营版','请不要拿网上那些泛滥的来比较，这个系统是别人运营专门修复的，全部开源没有任何加密和后门

本系统为服务商运营版，完整无错稳定抗压。系统可以直接对接三方挂牌支付服务...','P7631-运营版聚合支付系统/第三方四方支付系统/全开源完整无漏自用服务商运营版','1','/static/upload/2021/05/16/202105161084.png','<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px;">2021/3/25:&nbsp; 清理系统无效垃圾文件，以及所有数据表结构修复清理工作，</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px;">2021/4/5:&nbsp; 重新整理所有业务逻辑，完善对外收银台调用，</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px;">2021/4/10:&nbsp; 修复点卡对接通道，</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px;">2021/4/15:&nbsp; 修复商户后台以及代理后台页面排版错乱，</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px;">2021/4/20:&nbsp; 完善短信邮箱接口后台参数配置，</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px;">2021/4/28:&nbsp; 跟新后台接入信息服务商统一参数配置，</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px;">2021/5/1:&nbsp; 新增官方wx通道，包含：（扫码，H5，公众号），</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px;">2021/5/3:新增官方zbf通道（PC,H5通用）</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px;">2021/5/6:增加后台商户以及代理数据统计项（账目更清晰）增加商户费率配置说明以及商户后台自适应等等...细节优化</span></p><p><img src="/static/upload/image/20210516/1621141256470572.png" style="" title="1621141256470572.png"/></p><p><img src="/static/upload/image/20210516/1621141256898081.png" style="" title="1621141256898081.png"/></p><p><img src="/static/upload/image/20210516/1621141256332089.png" style="" title="1621141256332089.png"/></p><p><img src="/static/upload/image/20210516/1621141256972361.png" style="" title="1621141256972361.png"/></p><p><img src="/static/upload/image/20210516/1621141256773075.png" style="" title="1621141256773075.png"/></p><p><img src="/static/upload/image/20210516/1621141257493498.png" style="" title="1621141257493498.png"/></p><p><img src="/static/upload/image/20210516/1621141256482660.png" style="" title="1621141256482660.png"/></p><p><br/></p>','1621141163','0','41','1','0','0','0','0',',P7631-运营版聚合支付系统/第三方四方支付系统/全开源完整无漏自用服务商运营版,','0', NULL, NULL, NULL,'500.00','9999999','https://pan.baidu.com/s/12NUNjfPuxySQeB51UIEFjQ','34c0', NULL,'2');
INSERT INTO `jz_article` (`id`,`title`,`tid`,`molds`,`htmlurl`,`keywords`,`description`,`seo_title`,`userid`,`litpic`,`body`,`addtime`,`orders`,`hits`,`isshow`,`comment_num`,`istop`,`ishot`,`istuijian`,`tags`,`member_id`,`target`,`ownurl`,`spurl`,`price`,`stock_num`,`fufei`,`xiazmm`,`jymm`,`hyfz`) VALUES ('43','P790-全新飞飞cms影视系统/thinkphp框架影视系统/飞飞商业全能版V10.6源码/APP源码/29套模板','1','article','dm','P790-全新飞飞cms影视系统/thinkphp框架影视系统/飞飞商业全能版V10.6源码/APP源码/29套模板','全新飞飞cms商业全能版V10.6，源码开源,无加密,无域名限制,无后门（可以二次开发)
源码包含飞飞cms源码+PC/WAP/APP(H5)+付费系统+微信公众号+分销推广系统+站群系统+29套模板+原生APP源码','P790-全新飞飞cms影视系统/thinkphp框架影视系统/飞飞商业全能版V10.6源码/APP源码/29套模板','1','/static/upload/2021/05/16/202105166167.png','<p><span style="color: rgb(255, 0, 0); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 36px; background-color: rgb(255, 255, 255);">官方演示：</span><a href="http://tv.miaopon.com/" target="_blank" textvalue="http://tv.miaopon.com/" style="box-sizing: border-box; background-color: rgb(255, 255, 255); color: rgb(72, 73, 77); text-decoration-line: none; transition: all 0.3s ease 0s; cursor: pointer; font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 36px; white-space: normal;">http://tv.miaopon.com/</a></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">1.最大亮点本程序内核为thinkphp5.0开发而成，源码开源，代码无任何加密。</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">2.php环境支持要7.0以上</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">3.开发会员系统，丰富网站功能</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">4.开发影片付费观看功能（支持多种付费点播运营模式）</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">5.在线支付：微信.支付宝.卡密，码支付等）</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">6.程序支持用户推广分享系统（分三级）</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">7.播放器播放视频时支持前置广告，暂停广告等贴片广告（视频广告）</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">8.邮件发送通知系统</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">9.手机注册验证系统</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">10.支持QQ,微信登录</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">11.支持对接微信公众号功能</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">12.程序后台可以直接看到每天网站蜘蛛爬行统计情况（每天统计到，百度，谷歌，搜狗，好搜，神马，有道，雅虎等蜘蛛爬行的数据，功能强大哟）</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">14.支持域名防红功能</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">15.支持设置避免版权问题</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">16.支持试看功能，视频试看：可设置试看时间，可打包成app,更好做推广</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">17.密码：可单独对每个视频进行密码限制，输入密码即可打开</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">18.支持下载功能</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">19.积分：可对每部视频进行积分设置及消费制度</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">20.支持主动百度熊掌号推送功能</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">21,支持站群功能（功能强大哟)</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">22.支持一键采集，支持自动定时采集</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">23.模板支持两种字体，繁体/简体设置切换</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">24.模板后台直接上传网站LOGO,微信公众LOGO,打赏二维码LOGO</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">25.模板带有白昼/暗夜颜色切换功能</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">26.模板主题带有6中颜色，可以随意转换想要的颜色</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">27.广告功能可以开启会员隐藏广告</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">28.模板首页幻灯可设置&nbsp; 小图与大图模式两种模式切换</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">29.播放器：内嵌多种播放器，可轻松解析M3u8,MP4格式等视频，</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">30.播放器内可设置添加解析地址</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">31.VIP会员制度：可对会员进行权限是设置及时间限制</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">32.提现：积分可兑换现金并进行提现</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">33.卡密：后台可批量生成卡密，前台进行核销</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">34.采集：可以使用接口进行一键采集/自动采集，或者自己手写采集规则</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">35.程序后台一键添加广告功能</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">36.后台备份数据库打包功能</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">37.自动判断 手机访问调用手机版能</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">38.播放器自动支持播放下一集功能</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">39.后台可以随意SEO设置</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">40.后台可以随意添加上传视频</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">41.程序带有新闻资讯与专题模块功能</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><span style="box-sizing: border-box; font-size: 18px; color: rgb(255, 0, 0);">42.开放API采集接口</span></p><p><img src="/static/upload/image/20210516/1621141516325530.png" style="" title="1621141516325530.png"/></p><p><img src="/static/upload/image/20210516/1621141516560799.png" style="" title="1621141516560799.png"/></p><p><img src="/static/upload/image/20210516/1621141517842227.png" style="" title="1621141517842227.png"/></p><p><img src="/static/upload/image/20210516/1621141517556171.png" style="" title="1621141517556171.png"/></p><p><img src="/static/upload/image/20210516/1621141517845786.png" style="" title="1621141517845786.png"/></p><p><img src="/static/upload/image/20210516/1621141517937358.png" style="" title="1621141517937358.png"/></p><p><img src="/static/upload/image/20210516/1621141517825851.png" style="" title="1621141517825851.png"/></p><p><br/></p>','1621141340','0','71','1','0','0','0','0',',P790-全新飞飞cms影视系统/thinkphp框架影视系统/飞飞商业全能版V10.6源码/APP源码/29套模板,','0', NULL, NULL, NULL,'200.00','9999998','https://pan.baidu.com/s/1eCY0Qpc3xbbDV3zw8FvqWg','1epv', NULL,'2');
INSERT INTO `jz_article` (`id`,`title`,`tid`,`molds`,`htmlurl`,`keywords`,`description`,`seo_title`,`userid`,`litpic`,`body`,`addtime`,`orders`,`hits`,`isshow`,`comment_num`,`istop`,`ishot`,`istuijian`,`tags`,`member_id`,`target`,`ownurl`,`spurl`,`price`,`stock_num`,`fufei`,`xiazmm`,`jymm`,`hyfz`) VALUES ('44','全新直播系统+游戏系统/双后台服务器打包/完整原生安卓IOS双端','1','article','dm','全新直播系统+游戏系统/双后台服务器打包/完整原生安卓IOS双端','这是别人服务器打包，环境扩展截图，截图还算详细 双后台双数据库,前端原生安卓IOS双端，图片是别人截图的，由于源码太大了就没有做具体的测试，需要的拿吧','全新直播系统+游戏系统/双后台服务器打包/完整原生安卓IOS双端','1','/static/upload/2021/05/17/202105172884.png','<p><span style="color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 36px; background-color: rgb(255, 255, 255);">这是别人服务器打包，环境扩展截图，截图还算详细 双后台双数据库,前端原生安卓IOS双端，图片是别人截图的，由于源码太大了就没有做具体的测试，需要的拿吧</span></p><p><img src="/static/upload/image/20210517/1621236523127279.png" style="" title="1621236523127279.png"/></p><p><img src="/static/upload/image/20210517/1621236523920282.png" style="" title="1621236523920282.png"/></p><p><img src="/static/upload/image/20210517/1621236523986520.png" style="" title="1621236523986520.png"/></p><p><img src="/static/upload/image/20210517/1621236523127781.png" style="" title="1621236523127781.png"/></p><p><img src="/static/upload/image/20210517/1621236524738166.png" style="" title="1621236524738166.png"/></p><p><img src="/static/upload/image/20210517/1621236523855643.png" style="" title="1621236523855643.png"/></p><p><img src="/static/upload/image/20210517/1621236526734523.png" style="" title="1621236526734523.png"/></p><p><img src="/static/upload/image/20210517/1621236526245936.png" style="" title="1621236526245936.png"/></p><p><img src="/static/upload/image/20210517/1621236526561855.png" style="" title="1621236526561855.png"/></p><p><img src="/static/upload/image/20210517/1621236527611227.png" style="" title="1621236527611227.png"/></p><p><img src="/static/upload/image/20210517/1621236527683450.png" style="" title="1621236527683450.png"/></p><p><br/></p>','1621236402','0','3','1','0','0','0','0',',全新直播系统+游戏系统/双后台服务器打包/完整原生安卓IOS双端,','0', NULL, NULL, NULL,'0.00','9999999', NULL, NULL, NULL,'2');
-- ----------------------------
-- Records of jz_buylog
-- ----------------------------
INSERT INTO `jz_buylog` (`id`,`aid`,`userid`,`orderno`,`type`,`buytype`,`msg`,`molds`,`amount`,`money`,`addtime`) VALUES ('1','0','1','No20210321184600','3','jifen','登录奖励', NULL,'1.00','1.00','1616323560');
INSERT INTO `jz_buylog` (`id`,`aid`,`userid`,`orderno`,`type`,`buytype`,`msg`,`molds`,`amount`,`money`,`addtime`) VALUES ('2','10','1','No20210321184714','3','jifen','发布奖励','article','1.00','1.00','1616323634');
INSERT INTO `jz_buylog` (`id`,`aid`,`userid`,`orderno`,`type`,`buytype`,`msg`,`molds`,`amount`,`money`,`addtime`) VALUES ('3','0','1','No20210405221222','3','jifen','登录奖励', NULL,'1.00','1.00','1617631942');
INSERT INTO `jz_buylog` (`id`,`aid`,`userid`,`orderno`,`type`,`buytype`,`msg`,`molds`,`amount`,`money`,`addtime`) VALUES ('4','29','1','No20210405221243','3','jifen','发布奖励','article','1.00','1.00','1617631963');
INSERT INTO `jz_buylog` (`id`,`aid`,`userid`,`orderno`,`type`,`buytype`,`msg`,`molds`,`amount`,`money`,`addtime`) VALUES ('5','30','1','No20210405221308','3','jifen','发布奖励','article','1.00','1.00','1617631988');
INSERT INTO `jz_buylog` (`id`,`aid`,`userid`,`orderno`,`type`,`buytype`,`msg`,`molds`,`amount`,`money`,`addtime`) VALUES ('6','0','1','No20210406143151','3','jifen','登录奖励', NULL,'1.00','1.00','1617690711');
INSERT INTO `jz_buylog` (`id`,`aid`,`userid`,`orderno`,`type`,`buytype`,`msg`,`molds`,`amount`,`money`,`addtime`) VALUES ('7','0','1','No20210410233156','3','jifen','登录奖励', NULL,'1.00','1.00','1618068716');
INSERT INTO `jz_buylog` (`id`,`aid`,`userid`,`orderno`,`type`,`buytype`,`msg`,`molds`,`amount`,`money`,`addtime`) VALUES ('8','0','3','No20210516045201','3','jifen','登录奖励', NULL,'1.00','1.00','1621111921');
INSERT INTO `jz_buylog` (`id`,`aid`,`userid`,`orderno`,`type`,`buytype`,`msg`,`molds`,`amount`,`money`,`addtime`) VALUES ('9','0','3','No20210516061230','2','money','钱包支付', NULL,'0.01','0.01','1621116772');
INSERT INTO `jz_buylog` (`id`,`aid`,`userid`,`orderno`,`type`,`buytype`,`msg`,`molds`,`amount`,`money`,`addtime`) VALUES ('10','0','3','No20210516061230','2','money','钱包支付', NULL,'0.01','0.01','1621116800');
INSERT INTO `jz_buylog` (`id`,`aid`,`userid`,`orderno`,`type`,`buytype`,`msg`,`molds`,`amount`,`money`,`addtime`) VALUES ('11','0','3','No20210516061417','2','money','钱包支付', NULL,'0.01','0.01','1621116862');
INSERT INTO `jz_buylog` (`id`,`aid`,`userid`,`orderno`,`type`,`buytype`,`msg`,`molds`,`amount`,`money`,`addtime`) VALUES ('12','0','3','No20210516073200','2','money','钱包支付', NULL,'0.00','0.00','1621121522');
INSERT INTO `jz_buylog` (`id`,`aid`,`userid`,`orderno`,`type`,`buytype`,`msg`,`molds`,`amount`,`money`,`addtime`) VALUES ('13','0','3','No20210516084641','2','money','钱包支付', NULL,'0.00','0.00','1621126003');
INSERT INTO `jz_buylog` (`id`,`aid`,`userid`,`orderno`,`type`,`buytype`,`msg`,`molds`,`amount`,`money`,`addtime`) VALUES ('14','0','3','No20210516084949','2','money','钱包支付', NULL,'0.00','0.00','1621126191');
INSERT INTO `jz_buylog` (`id`,`aid`,`userid`,`orderno`,`type`,`buytype`,`msg`,`molds`,`amount`,`money`,`addtime`) VALUES ('15','0','3','No20210516120552','2','money','钱包支付', NULL,'800.00','800.00','1621137962');
INSERT INTO `jz_buylog` (`id`,`aid`,`userid`,`orderno`,`type`,`buytype`,`msg`,`molds`,`amount`,`money`,`addtime`) VALUES ('16','0','3','No20210516122855','2','money','钱包支付', NULL,'800.00','800.00','1621139336');
INSERT INTO `jz_buylog` (`id`,`aid`,`userid`,`orderno`,`type`,`buytype`,`msg`,`molds`,`amount`,`money`,`addtime`) VALUES ('17','0','3','No20210516125357','2','money','钱包支付', NULL,'1100.00','1100.00','1621140839');
INSERT INTO `jz_buylog` (`id`,`aid`,`userid`,`orderno`,`type`,`buytype`,`msg`,`molds`,`amount`,`money`,`addtime`) VALUES ('18','0','4','No20210517151257','3','jifen','登录奖励', NULL,'1.00','1.00','1621235577');
INSERT INTO `jz_buylog` (`id`,`aid`,`userid`,`orderno`,`type`,`buytype`,`msg`,`molds`,`amount`,`money`,`addtime`) VALUES ('19','0','3','No20210517163112','3','jifen','登录奖励', NULL,'1.00','1.00','1621240272');
INSERT INTO `jz_buylog` (`id`,`aid`,`userid`,`orderno`,`type`,`buytype`,`msg`,`molds`,`amount`,`money`,`addtime`) VALUES ('20','0','5','No20210517163215','3','jifen','登录奖励', NULL,'1.00','1.00','1621240335');
INSERT INTO `jz_buylog` (`id`,`aid`,`userid`,`orderno`,`type`,`buytype`,`msg`,`molds`,`amount`,`money`,`addtime`) VALUES ('21','0','6','No20210517163332','3','jifen','登录奖励', NULL,'1.00','1.00','1621240412');
-- ----------------------------
-- Records of jz_cachedata
-- ----------------------------
-- ----------------------------
-- Records of jz_classtype
-- ----------------------------
INSERT INTO `jz_classtype` (`id`,`classname`,`seo_classname`,`molds`,`litpic`,`description`,`keywords`,`body`,`orders`,`orderstype`,`isshow`,`iscover`,`pid`,`gid`,`htmlurl`,`lists_html`,`details_html`,`lists_num`,`comment_num`,`gourl`,`ishome`,`isclose`) VALUES ('1','源码分享','源码分享','article', NULL, NULL, NULL, NULL,'0','1','1','0','0','0','dm','wzlb','wz','10','0', NULL,'1','0');
INSERT INTO `jz_classtype` (`id`,`classname`,`seo_classname`,`molds`,`litpic`,`description`,`keywords`,`body`,`orders`,`orderstype`,`isshow`,`iscover`,`pid`,`gid`,`htmlurl`,`lists_html`,`details_html`,`lists_num`,`comment_num`,`gourl`,`ishome`,`isclose`) VALUES ('2','教程工具','教程工具','article', NULL, NULL, NULL, NULL,'0','1','1','0','0','0','sp','splb','shipin','10','0', NULL,'1','0');
INSERT INTO `jz_classtype` (`id`,`classname`,`seo_classname`,`molds`,`litpic`,`description`,`keywords`,`body`,`orders`,`orderstype`,`isshow`,`iscover`,`pid`,`gid`,`htmlurl`,`lists_html`,`details_html`,`lists_num`,`comment_num`,`gourl`,`ishome`,`isclose`) VALUES ('3','微信程序','微信程序','article', NULL, NULL, NULL, NULL,'0','1','1','0','0','0','sp11','ssplb','shipin','10','0', NULL,'1','0');
INSERT INTO `jz_classtype` (`id`,`classname`,`seo_classname`,`molds`,`litpic`,`description`,`keywords`,`body`,`orders`,`orderstype`,`isshow`,`iscover`,`pid`,`gid`,`htmlurl`,`lists_html`,`details_html`,`lists_num`,`comment_num`,`gourl`,`ishome`,`isclose`) VALUES ('5','投稿','投稿','page', NULL, NULL, NULL, NULL,'0','1','0','0','0','0','tg','tougao', NULL,'10','0', NULL,'1','0');
-- ----------------------------
-- Records of jz_collect
-- ----------------------------
INSERT INTO `jz_collect` (`id`,`title`,`description`,`tid`,`litpic`,`w`,`h`,`orders`,`addtime`,`isshow`,`url`) VALUES ('1','图片1', NULL,'1','http://p5.qhimg.com/bdr/__85/t018fee1916a0f0377a.jpg','0','0','0','1616327436','1', NULL);
INSERT INTO `jz_collect` (`id`,`title`,`description`,`tid`,`litpic`,`w`,`h`,`orders`,`addtime`,`isshow`,`url`) VALUES ('4','图片2', NULL,'1','http://p2.qhimg.com/bdr/__85/t01849be92864eccbdf.jpg','0','0','0','1616327890','1', NULL);
INSERT INTO `jz_collect` (`id`,`title`,`description`,`tid`,`litpic`,`w`,`h`,`orders`,`addtime`,`isshow`,`url`) VALUES ('5','图片三', NULL,'2','http://p3.qhimg.com/bdr/__85/t01f68507db7509ac77.jpg','0','0','0','1616328157','1', NULL);
INSERT INTO `jz_collect` (`id`,`title`,`description`,`tid`,`litpic`,`w`,`h`,`orders`,`addtime`,`isshow`,`url`) VALUES ('6','图片4', NULL,'2','http://p6.qhimg.com/bdr/__85/t010e6ff6ec250ae64b.jpg','0','0','0','1616328192','1', NULL);
INSERT INTO `jz_collect` (`id`,`title`,`description`,`tid`,`litpic`,`w`,`h`,`orders`,`addtime`,`isshow`,`url`) VALUES ('11','g', NULL,'3','http://p8.qhimg.com/bdr/__85/t019fdada747d0bff14.jpg','0','0','0','1616329069','1', NULL);
INSERT INTO `jz_collect` (`id`,`title`,`description`,`tid`,`litpic`,`w`,`h`,`orders`,`addtime`,`isshow`,`url`) VALUES ('9','广告', NULL,'4','http://browser9.qhimg.com/bdr/__85/t013b21a10a6929ccbc.jpg','0','0','0','1616328715','1', NULL);
-- ----------------------------
-- Records of jz_collect_type
-- ----------------------------
INSERT INTO `jz_collect_type` (`id`,`name`,`addtime`) VALUES ('1','首页','1616327429');
INSERT INTO `jz_collect_type` (`id`,`name`,`addtime`) VALUES ('2','首页侧栏','1616328133');
INSERT INTO `jz_collect_type` (`id`,`name`,`addtime`) VALUES ('3','首页文章上','1616328350');
INSERT INTO `jz_collect_type` (`id`,`name`,`addtime`) VALUES ('4','首页右边','1616328684');
-- ----------------------------
-- Records of jz_comment
-- ----------------------------
-- ----------------------------
-- Records of jz_customurl
-- ----------------------------
-- ----------------------------
-- Records of jz_fields
-- ----------------------------
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('1','url','links','链接', NULL,'1', NULL,'255', NULL,'0','1','1','1','0','1', NULL, NULL,'1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('2','title','links','链接名称', NULL,'1', NULL,'255', NULL,'0','1','1','1','1','1', NULL, NULL,'1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('3','email','message','联系邮箱', NULL,'1', NULL,'255', NULL,'0','0','1','1','1','1', NULL, NULL,'1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('4','keywords','tags','关键词','尽量简短，但不能重复','1', NULL,'50', NULL,'0','0','1','1','1','1', NULL, NULL,'1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('5','newname','tags','替换词','尽量简短，但不能重复，20字以内，可不填。','1', NULL,'50', NULL,'0','0','1','1','1','1', NULL, NULL,'1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('6','url','tags','内链','填写详细链接，带http','1', NULL,'255', NULL,'0','0','1','1','1','1', NULL, NULL,'1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('7','num','tags','替换次数','一篇文章内替换的次数，默认-1，全部替换','4', NULL,'4', NULL,'0','0','1','1','0','1', NULL,'-1','1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('8','target','tags','打开方式', NULL,'7', NULL,'50','新窗口=_blank,本窗口=_self','0','0','1','1','0','1', NULL,'_blank','1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('9','number','tags','标签数','无需填写，程序自动处理','4', NULL,'11', NULL,'0','0','1','1','0','1', NULL,'0','1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('10','member_id','article','发布用户','前台会员，无需填写','13', NULL,'11','3,username','0','0','0','0','0','0', NULL,'0','1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('11','member_id','product','发布用户','前台会员，无需填写','13', NULL,'11','3,username','0','0','0','0','0','0', NULL,'0','1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('12','member_id','links','发布用户','前台会员，无需填写','13', NULL,'11','3,username','0','0','0','0','0','0', NULL,'0','1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('13','target','links','外链URL','默认为空，系统访问内容则直接跳转到此链接','1', NULL,'255', NULL,'0','0','0','0','0','0', NULL, NULL,'1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('14','ownurl','links','自定义URL','默认为空，自定义URL','1', NULL,'255', NULL,'0','0','0','0','0','0', NULL, NULL,'1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('15','ownurl','tags','自定义URL','默认为空，自定义URL','1', NULL,'255', NULL,'0','0','0','0','0','0', NULL, NULL,'1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('16','addtime','links','添加时间','系统自带','11', NULL,'11', NULL,'0','0','0','0','0','0','date_2','0','1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('17','addtime','tags','添加时间','系统自带','11', NULL,'11', NULL,'0','0','0','0','0','0','date_2','0','1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('18','spurl','article','视频地址', NULL,'1',',1,2,3,','255', NULL,'2','0','1','1','0','1', NULL, NULL,'1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('19','price','article','价格', NULL,'14',',1,2,3,','10,2', NULL,'2','0','1','1','0','1', NULL, NULL,'1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('20','stock_num','article','库存', NULL,'4',',1,2,3,','11', NULL,'2','0','0','1','0','0', NULL,'9999999','1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('21','fufei','article','下载地址', NULL,'1',',1,2,3,','255', NULL,'2','0','1','1','0','0', NULL, NULL,'0');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('22','xiazmm','article','下载密码', NULL,'1',',1,2,3,','10', NULL,'2','0','1','1','0','0', NULL, NULL,'1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('23','jymm','article','解压密码', NULL,'1',',1,2,3,','255', NULL,'2','0','1','1','0','0', NULL, NULL,'1');
INSERT INTO `jz_fields` (`id`,`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`,`isajax`) VALUES ('24','hyfz','article','会员分组','这里设置的是会员分组,会员分组ID为1即填写1','4',',1,2,3,','3', NULL,'2','1','1','1','0','0', NULL,'2','0');
-- ----------------------------
-- Records of jz_hook
-- ----------------------------
INSERT INTO `jz_hook` (`id`,`module`,`namespace`,`controller`,`action`,`hook_namespace`,`hook_controller`,`hook_action`,`all_action`,`orders`,`isopen`,`plugins_name`,`addtime`) VALUES ('1','Home','Home','Home','jizhi','Home','Baidu','putweb','0','0','0','baiduseo','1617857710');
INSERT INTO `jz_hook` (`id`,`module`,`namespace`,`controller`,`action`,`hook_namespace`,`hook_controller`,`hook_action`,`all_action`,`orders`,`isopen`,`plugins_name`,`addtime`) VALUES ('2','A','A','Common','uploads','A','Image','uploads','1','0','1','imagethumbnail','1618324864');
-- ----------------------------
-- Records of jz_layout
-- ----------------------------
INSERT INTO `jz_layout` (`id`,`name`,`top_layout`,`left_layout`,`gid`,`ext`,`sys`,`isdefault`) VALUES ('1','系统默认','[]','[{"name":"内容管理","icon":"&amp;#xe6b4;","nav":["9","105"]},{"name":"栏目管理","icon":"&amp;#xe699;","nav":["42"]},{"name":"互动管理","icon":"&amp;#xe69b;","nav":["22","16"]},{"name":"SEO设置","icon":"&amp;#xe6b3;","nav":["147","95","153"]},{"name":"用户管理","icon":"&amp;#xe6b8;","nav":["2","118","123","54","49","66","129","177"]},{"name":"系统设置","icon":"&amp;#xe6ae;","nav":["40","70","190","83","89","114"]},{"name":"扩展管理","icon":"&amp;#xe6ce;","nav":["76","116","61","35","194","141","142","143","154","115"]}]','0','CMS默认配置，不可删除！','1','1');
INSERT INTO `jz_layout` (`id`,`name`,`top_layout`,`left_layout`,`gid`,`ext`,`sys`,`isdefault`) VALUES ('2','旧版桌面','[]','[{"name":"网站管理","icon":"&amp;#xe699;","nav":["42","9","95","83","147","22"]},{"name":"商品管理","icon":"&amp;#xe698;","nav":["105","129","2","118","123","16","177"]},{"name":"扩展管理","icon":"&amp;#xe6ce;","nav":["76","116","141","142","143","194","35","61","154","153"]},{"name":"系统设置","icon":"&amp;#xe6ae;","nav":["40","54","49","190","70","115","114","66"]}]','0','旧版本配置','0','0');
-- ----------------------------
-- Records of jz_level
-- ----------------------------
INSERT INTO `jz_level` (`id`,`name`,`pass`,`tel`,`gid`,`email`,`regtime`,`logintime`,`status`) VALUES ('1','admin','a07b6751d2d9fb3a3a8488a030c69ec6','13600136000','1','123456@qq.com','1621106470','1621236862','1');
-- ----------------------------
-- Records of jz_level_group
-- ----------------------------
INSERT INTO `jz_level_group` (`id`,`name`,`isadmin`,`ischeck`,`classcontrol`,`paction`,`tids`,`isagree`,`description`) VALUES ('1','超级管理员','1','0','0',',Fields,', NULL,'1', NULL);
-- ----------------------------
-- Records of jz_link_type
-- ----------------------------
INSERT INTO `jz_link_type` (`id`,`name`,`addtime`) VALUES ('1','首页','1617641532');
-- ----------------------------
-- Records of jz_links
-- ----------------------------
-- ----------------------------
-- Records of jz_member
-- ----------------------------
INSERT INTO `jz_member` (`id`,`username`,`openid`,`pass`,`token`,`sex`,`gid`,`litpic`,`tel`,`jifen`,`likes`,`collection`,`money`,`email`,`address`,`province`,`city`,`regtime`,`logintime`,`isshow`,`signature`,`birthday`,`follow`,`fans`,`ismsg`,`iscomment`,`iscollect`,`islikes`,`isat`,`isrechange`,`pid`,`qq_openid`) VALUES ('4','0iAi4w', NULL,'3936ed6725e3504054d427fa1a8b2bf3', NULL,'0','1', NULL,'17777777777','1.00', NULL, NULL,'0.00','17777777777@qq.com', NULL, NULL, NULL,'1621235574','1621235577','1', NULL, NULL, NULL,'0','1','1','1','1','1','1','0', NULL);
INSERT INTO `jz_member` (`id`,`username`,`openid`,`pass`,`token`,`sex`,`gid`,`litpic`,`tel`,`jifen`,`likes`,`collection`,`money`,`email`,`address`,`province`,`city`,`regtime`,`logintime`,`isshow`,`signature`,`birthday`,`follow`,`fans`,`ismsg`,`iscomment`,`iscollect`,`islikes`,`isat`,`isrechange`,`pid`,`qq_openid`) VALUES ('2','jzcustomer', NULL, NULL, NULL,'0','1', NULL, NULL,'0.00','||1-29||1-29||1-5||2-7||1-4||1-29||1-30||3-27||1-5||2-9||1-30||1-4||1-4||1-30||1-31||1-5||2-39||1-41||1-43||', NULL,'0.00', NULL, NULL, NULL, NULL,'0','0','1', NULL, NULL, NULL,'0','1','1','1','1','1','1','0', NULL);
INSERT INTO `jz_member` (`id`,`username`,`openid`,`pass`,`token`,`sex`,`gid`,`litpic`,`tel`,`jifen`,`likes`,`collection`,`money`,`email`,`address`,`province`,`city`,`regtime`,`logintime`,`isshow`,`signature`,`birthday`,`follow`,`fans`,`ismsg`,`iscomment`,`iscollect`,`islikes`,`isat`,`isrechange`,`pid`,`qq_openid`) VALUES ('3','苏七', NULL,'281ab141a12f67f5238719cd876ce96e', NULL,'0','1','/static/upload/2021/05/17/202105172215.png','13144466444','2.00', NULL, NULL,'5300.00','787490066@qq.com', NULL, NULL, NULL,'1621111916','1621240272','1', NULL, NULL, NULL,'0','1','1','1','1','1','1','0', NULL);
INSERT INTO `jz_member` (`id`,`username`,`openid`,`pass`,`token`,`sex`,`gid`,`litpic`,`tel`,`jifen`,`likes`,`collection`,`money`,`email`,`address`,`province`,`city`,`regtime`,`logintime`,`isshow`,`signature`,`birthday`,`follow`,`fans`,`ismsg`,`iscomment`,`iscollect`,`islikes`,`isat`,`isrechange`,`pid`,`qq_openid`) VALUES ('5','XMpuPk', NULL,'281ab141a12f67f5238719cd876ce96e', NULL,'0','1', NULL,'123456','1.00', NULL, NULL,'0.00','78749006@qq.com', NULL, NULL, NULL,'1621240191','1621242241','1', NULL, NULL, NULL,'0','1','1','1','1','1','1','0', NULL);
INSERT INTO `jz_member` (`id`,`username`,`openid`,`pass`,`token`,`sex`,`gid`,`litpic`,`tel`,`jifen`,`likes`,`collection`,`money`,`email`,`address`,`province`,`city`,`regtime`,`logintime`,`isshow`,`signature`,`birthday`,`follow`,`fans`,`ismsg`,`iscomment`,`iscollect`,`islikes`,`isat`,`isrechange`,`pid`,`qq_openid`) VALUES ('6','Esu7Uv', NULL,'8718a19eabec0174b7bc256254c336a5', NULL,'0','2', NULL,'1234567','9999.00', NULL, NULL,'0.00','1234567@qq.com', NULL, NULL, NULL,'1621240387','1621242311','1', NULL, NULL, NULL,'0','1','1','1','1','1','1','0', NULL);
-- ----------------------------
-- Records of jz_member_group
-- ----------------------------
INSERT INTO `jz_member_group` (`id`,`name`,`description`,`paction`,`pid`,`isagree`,`iscomment`,`ischeckmsg`,`addtime`,`orders`,`discount`,`discount_type`) VALUES ('1','注册会员','前台会员分组，最低等级分组',',Message,Comment,User,Order,Home,Common,','0','1','1','1','0','0','0.00','0');
INSERT INTO `jz_member_group` (`id`,`name`,`description`,`paction`,`pid`,`isagree`,`iscomment`,`ischeckmsg`,`addtime`,`orders`,`discount`,`discount_type`) VALUES ('2','永久会员','永久会员免费下载整站源码,整天不限量',',Common,Home,User,Login,Message,Message/index,Comment,Comment/index,Screen,Order,Mypay,Jzpay,Tags,Wechat,','0','1','1','1','0','0','0.00','0');
-- ----------------------------
-- Records of jz_menu
-- ----------------------------
-- ----------------------------
-- Records of jz_message
-- ----------------------------
-- ----------------------------
-- Records of jz_molds
-- ----------------------------
INSERT INTO `jz_molds` (`id`,`name`,`biaoshi`,`sys`,`isopen`,`iscontrol`,`ismust`,`isclasstype`,`isshowclass`,`list_html`,`details_html`) VALUES ('1','内容','article','1','1','1','1','1','1','article-list.html','article-details.html');
INSERT INTO `jz_molds` (`id`,`name`,`biaoshi`,`sys`,`isopen`,`iscontrol`,`ismust`,`isclasstype`,`isshowclass`,`list_html`,`details_html`) VALUES ('2','栏目','classtype','1','1','1','1','1','1','list.html','details.html');
INSERT INTO `jz_molds` (`id`,`name`,`biaoshi`,`sys`,`isopen`,`iscontrol`,`ismust`,`isclasstype`,`isshowclass`,`list_html`,`details_html`) VALUES ('3','会员','member','1','1','0','0','0','0','list.html','details.html');
INSERT INTO `jz_molds` (`id`,`name`,`biaoshi`,`sys`,`isopen`,`iscontrol`,`ismust`,`isclasstype`,`isshowclass`,`list_html`,`details_html`) VALUES ('4','订单','orders','1','1','0','0','0','0','list.html','details.html');
INSERT INTO `jz_molds` (`id`,`name`,`biaoshi`,`sys`,`isopen`,`iscontrol`,`ismust`,`isclasstype`,`isshowclass`,`list_html`,`details_html`) VALUES ('5','商品','product','1','1','1','1','1','1','list.html','details.html');
INSERT INTO `jz_molds` (`id`,`name`,`biaoshi`,`sys`,`isopen`,`iscontrol`,`ismust`,`isclasstype`,`isshowclass`,`list_html`,`details_html`) VALUES ('6','会员分组','member_group','1','1','0','0','1','0','list.html','details.html');
INSERT INTO `jz_molds` (`id`,`name`,`biaoshi`,`sys`,`isopen`,`iscontrol`,`ismust`,`isclasstype`,`isshowclass`,`list_html`,`details_html`) VALUES ('7','评论','comment','1','1','0','0','0','0','list.html','details.html');
INSERT INTO `jz_molds` (`id`,`name`,`biaoshi`,`sys`,`isopen`,`iscontrol`,`ismust`,`isclasstype`,`isshowclass`,`list_html`,`details_html`) VALUES ('8','留言','message','1','1','0','0','1','1','message.html','details.html');
INSERT INTO `jz_molds` (`id`,`name`,`biaoshi`,`sys`,`isopen`,`iscontrol`,`ismust`,`isclasstype`,`isshowclass`,`list_html`,`details_html`) VALUES ('9','轮播图','collect','1','1','0','0','0','0','list.html','details.html');
INSERT INTO `jz_molds` (`id`,`name`,`biaoshi`,`sys`,`isopen`,`iscontrol`,`ismust`,`isclasstype`,`isshowclass`,`list_html`,`details_html`) VALUES ('10','友情链接','links','1','1','0','0','0','0','list.html','details.html');
INSERT INTO `jz_molds` (`id`,`name`,`biaoshi`,`sys`,`isopen`,`iscontrol`,`ismust`,`isclasstype`,`isshowclass`,`list_html`,`details_html`) VALUES ('11','管理员','level','1','1','0','0','0','0','list.html','details.html');
INSERT INTO `jz_molds` (`id`,`name`,`biaoshi`,`sys`,`isopen`,`iscontrol`,`ismust`,`isclasstype`,`isshowclass`,`list_html`,`details_html`) VALUES ('12','TAG','tags','1','1','0','0','0','0','list.html','details.html');
INSERT INTO `jz_molds` (`id`,`name`,`biaoshi`,`sys`,`isopen`,`iscontrol`,`ismust`,`isclasstype`,`isshowclass`,`list_html`,`details_html`) VALUES ('13','单页','page','1','1','1','1','1','1','page.html','details.html');
-- ----------------------------
-- Records of jz_orders
-- ----------------------------
INSERT INTO `jz_orders` (`id`,`orderno`,`userid`,`paytype`,`ptype`,`tel`,`username`,`tid`,`price`,`jifen`,`qianbao`,`body`,`receive_username`,`receive_tel`,`receive_email`,`receive_address`,`ispay`,`paytime`,`addtime`,`send_time`,`isshow`,`discount`,`yunfei`) VALUES ('31','No20210517151315','4', NULL,'1','17777777777','0iAi4w','0','200','20000.00','200.00','||1-43-1-200.00||', NULL, NULL, NULL, NULL,'0','0','1621235595','0','1','0.00','0.00');
INSERT INTO `jz_orders` (`id`,`orderno`,`userid`,`paytype`,`ptype`,`tel`,`username`,`tid`,`price`,`jifen`,`qianbao`,`body`,`receive_username`,`receive_tel`,`receive_email`,`receive_address`,`ispay`,`paytime`,`addtime`,`send_time`,`isshow`,`discount`,`yunfei`) VALUES ('30','No20210516125357','3','钱包支付','1','13144466444','苏七','0','1100','110000.00','1100.00','||1-40-1-800.00||1-41-1-300.00||','苏七','13144466444','787490066@qq.com', NULL,'1','1621140839','1621140837','0','2','0.00','0.00');
INSERT INTO `jz_orders` (`id`,`orderno`,`userid`,`paytype`,`ptype`,`tel`,`username`,`tid`,`price`,`jifen`,`qianbao`,`body`,`receive_username`,`receive_tel`,`receive_email`,`receive_address`,`ispay`,`paytime`,`addtime`,`send_time`,`isshow`,`discount`,`yunfei`) VALUES ('26','No20210516084641','3','钱包支付','1','13144466444','苏七','0','0','0.00','0.00','||1-33-1-0.00||','苏七','13144466444','787490066@qq.com', NULL,'1','1621126003','1621126001','0','2','0.00','0.00');
INSERT INTO `jz_orders` (`id`,`orderno`,`userid`,`paytype`,`ptype`,`tel`,`username`,`tid`,`price`,`jifen`,`qianbao`,`body`,`receive_username`,`receive_tel`,`receive_email`,`receive_address`,`ispay`,`paytime`,`addtime`,`send_time`,`isshow`,`discount`,`yunfei`) VALUES ('24','No20210516061417','3','钱包支付','1','13144466444','kXwZW1','0','0.01','1.00','0.01','||2-37-1-0.01||','kXwZW1','13144466444','787490066@qq.com', NULL,'1','1621116862','1621116857','0','2','0.00','0.00');
INSERT INTO `jz_orders` (`id`,`orderno`,`userid`,`paytype`,`ptype`,`tel`,`username`,`tid`,`price`,`jifen`,`qianbao`,`body`,`receive_username`,`receive_tel`,`receive_email`,`receive_address`,`ispay`,`paytime`,`addtime`,`send_time`,`isshow`,`discount`,`yunfei`) VALUES ('25','No20210516073200','3','钱包支付','1','13144466444','苏七','0','0','0.00','0.00','||2-38-1-0.00||','苏七','13144466444','787490066@qq.com', NULL,'1','1621121522','1621121520','0','2','0.00','0.00');
-- ----------------------------
-- Records of jz_page
-- ----------------------------
-- ----------------------------
-- Records of jz_pictures
-- ----------------------------
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('26','0','0', NULL,'Home','png','41.7','/static/upload/2021/05/16/202105167101.png','1621139463','3');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('25','0','0', NULL,'Admin','png','171.42','/static/upload/image/20210516/1621138973245314.png','1621138973','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('24','0','0', NULL,'Admin','png','36.02','/static/upload/image/20210516/1621138972762750.png','1621138972','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('19','0','0', NULL,'Admin','png','116.65','/static/upload/image/20210516/1621138971224669.png','1621138971','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('20','0','0', NULL,'Admin','png','121.24','/static/upload/image/20210516/1621138971164227.png','1621138971','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('21','0','0', NULL,'Admin','png','87.87','/static/upload/image/20210516/1621138971995638.png','1621138971','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('22','0','0', NULL,'Admin','png','117.07','/static/upload/image/20210516/1621138971586403.png','1621138971','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('23','0','0', NULL,'Admin','png','122.29','/static/upload/image/20210516/1621138972395361.png','1621138972','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('16','0','0','sysconfig','Admin','png','7.79','/static/upload/2021/05/16/202105163917.png','1621126727','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('17','1','0','article','Admin','png','122.71','/static/upload/2021/05/16/202105161418.png','1621137466','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('18','0','0', NULL,'Admin','png','108.9','/static/upload/image/20210516/1621138971841056.png','1621138971','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('14','0','0', NULL,'Home','png','41.7','/static/upload/2021/05/16/202105161894.png','1621118947','3');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('15','0','0','sysconfig','Admin','png','7.68','/static/upload/2021/05/16/202105161070.png','1621124706','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('27','0','0', NULL,'Home','png','41.7','/static/upload/2021/05/16/202105166503.png','1621139467','3');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('28','0','0', NULL,'Admin','png','87.05','/static/upload/image/20210516/1621140006268760.png','1621140006','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('29','0','0', NULL,'Admin','png','129.08','/static/upload/image/20210516/1621140007632922.png','1621140007','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('30','0','0', NULL,'Admin','png','99.16','/static/upload/image/20210516/1621140007525344.png','1621140007','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('31','0','0', NULL,'Admin','png','436.78','/static/upload/image/20210516/1621140007304643.png','1621140007','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('32','0','0', NULL,'Admin','png','61.32','/static/upload/image/20210516/1621140007213833.png','1621140007','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('33','0','0', NULL,'Admin','png','138.89','/static/upload/image/20210516/1621140007308071.png','1621140007','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('34','0','0', NULL,'Admin','png','131.84','/static/upload/image/20210516/1621140007540219.png','1621140007','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('35','0','0', NULL,'Admin','png','67.96','/static/upload/image/20210516/1621140007631307.png','1621140007','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('36','2','0','article','Admin','png','78.74','/static/upload/2021/05/16/202105167324.png','1621140012','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('37','1','0','article','Admin','png','48.81','/static/upload/2021/05/16/202105161084.png','1621141228','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('38','0','0', NULL,'Admin','png','42.03','/static/upload/image/20210516/1621141256898081.png','1621141256','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('39','0','0', NULL,'Admin','png','25.38','/static/upload/image/20210516/1621141256470572.png','1621141256','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('40','0','0', NULL,'Admin','png','47.94','/static/upload/image/20210516/1621141256332089.png','1621141256','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('41','0','0', NULL,'Admin','png','52.66','/static/upload/image/20210516/1621141256972361.png','1621141256','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('42','0','0', NULL,'Admin','png','152.97','/static/upload/image/20210516/1621141256773075.png','1621141256','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('43','0','0', NULL,'Admin','png','105.97','/static/upload/image/20210516/1621141256482660.png','1621141256','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('44','0','0', NULL,'Admin','png','79.11','/static/upload/image/20210516/1621141257493498.png','1621141257','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('45','1','0','article','Admin','png','154.66','/static/upload/2021/05/16/202105166167.png','1621141506','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('46','0','0', NULL,'Admin','png','145.75','/static/upload/image/20210516/1621141516325530.png','1621141516','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('47','0','0', NULL,'Admin','png','68.31','/static/upload/image/20210516/1621141516560799.png','1621141516','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('48','0','0', NULL,'Admin','png','78.19','/static/upload/image/20210516/1621141517845786.png','1621141517','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('49','0','0', NULL,'Admin','png','789.5','/static/upload/image/20210516/1621141517842227.png','1621141517','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('50','0','0', NULL,'Admin','png','78.29','/static/upload/image/20210516/1621141517556171.png','1621141517','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('51','0','0', NULL,'Admin','png','77.04','/static/upload/image/20210516/1621141517937358.png','1621141517','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('52','0','0', NULL,'Admin','png','76.04','/static/upload/image/20210516/1621141517825851.png','1621141517','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('53','0','0', NULL,'Home','png','41.7','/static/upload/2021/05/17/202105172215.png','1621236340','3');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('54','0','0', NULL,'Home','png','41.7','/static/upload/2021/05/17/202105179808.png','1621236343','3');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('55','1','0','article','Admin','png','608.33','/static/upload/2021/05/17/202105172884.png','1621236492','1');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('56','0','0', NULL,'Admin','png','88.52','/static/upload/image/20210517/1621236523986520.png','1621236523','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('57','0','0', NULL,'Admin','png','66.88','/static/upload/image/20210517/1621236523127279.png','1621236523','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('58','0','0', NULL,'Admin','png','53.14','/static/upload/image/20210517/1621236523920282.png','1621236523','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('59','0','0', NULL,'Admin','png','51.65','/static/upload/image/20210517/1621236523855643.png','1621236523','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('60','0','0', NULL,'Admin','png','103.7','/static/upload/image/20210517/1621236523127781.png','1621236523','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('61','0','0', NULL,'Admin','png','534.97','/static/upload/image/20210517/1621236524738166.png','1621236524','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('62','0','0', NULL,'Admin','png','167.33','/static/upload/image/20210517/1621236526561855.png','1621236526','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('63','0','0', NULL,'Admin','png','602.6','/static/upload/image/20210517/1621236526245936.png','1621236526','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('64','0','0', NULL,'Admin','png','842.06','/static/upload/image/20210517/1621236526734523.png','1621236526','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('65','0','0', NULL,'Admin','png','128.83','/static/upload/image/20210517/1621236527683450.png','1621236527','0');
INSERT INTO `jz_pictures` (`id`,`tid`,`aid`,`molds`,`path`,`filetype`,`size`,`litpic`,`addtime`,`userid`) VALUES ('66','0','0', NULL,'Admin','png','670.43','/static/upload/image/20210517/1621236527611227.png','1621236527','0');
-- ----------------------------
-- Records of jz_plugins
-- ----------------------------
INSERT INTO `jz_plugins` (`id`,`name`,`filepath`,`description`,`version`,`author`,`update_time`,`module`,`isopen`,`addtime`,`config`) VALUES ('1','在线升级插件','jizhicmsupdate','实现极致CMS后台在线升级','4.4','留恋风2581047041@qq.com','1615219200','Admin','1','1616319106', NULL);
INSERT INTO `jz_plugins` (`id`,`name`,`filepath`,`description`,`version`,`author`,`update_time`,`module`,`isopen`,`addtime`,`config`) VALUES ('2','Skycaiji采集API接口','skycaiji','可以远程采集数据提交到网站数据库','1.4','留恋风2581047041@qq.com','1615132800','Home','1','1616319123', NULL);
INSERT INTO `jz_plugins` (`id`,`name`,`filepath`,`description`,`version`,`author`,`update_time`,`module`,`isopen`,`addtime`,`config`) VALUES ('3','火车头采集Web发布插件','webapi','使用该插件可以接入火车头采集软件进行Web在线发布','1.4','留恋风2581047041@qq.com','1615132800','Home','1','1616319128','{"id":"3","password":"2624633638"}');
INSERT INTO `jz_plugins` (`id`,`name`,`filepath`,`description`,`version`,`author`,`update_time`,`module`,`isopen`,`addtime`,`config`) VALUES ('4','QQ一键登录','qqlogin','实现QQ一键登录','1.4','留恋风2581047041@qq.com','1603814400','Home','1','1617785306','{"appid":"101942321","appsecret":"2334624ee5f4521f7c04384f714c8f9e"}');
INSERT INTO `jz_plugins` (`id`,`name`,`filepath`,`description`,`version`,`author`,`update_time`,`module`,`isopen`,`addtime`,`config`) VALUES ('5','百度SEO推送','baiduseo','百度站长文章链接推送，百度熊掌号文章链接推送，实现时、天、月频率自动推送','1.3','留恋风2581047041@qq.com','1586880000','Home','0','1617857710', NULL);
INSERT INTO `jz_plugins` (`id`,`name`,`filepath`,`description`,`version`,`author`,`update_time`,`module`,`isopen`,`addtime`,`config`) VALUES ('6','系统API接口','apidata','实现API数据查询','1.5','留恋风2581047041@qq.com','1611849600','Home','1','1618324838', NULL);
INSERT INTO `jz_plugins` (`id`,`name`,`filepath`,`description`,`version`,`author`,`update_time`,`module`,`isopen`,`addtime`,`config`) VALUES ('7','生成多种尺寸的缩略图','imagethumbnail','上传图片的同时生成大、中、小三种大小的图片','1.4','留恋风2581047041@qq.com','1596384000','Admin','1','1618324864', NULL);
-- ----------------------------
-- Records of jz_power
-- ----------------------------
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('1','Common','公共权限','0','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('2','Home','前台网站','0','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('3','User','个人中心','0','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('4','Login','会员登录','0','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('5','Message','站内留言','0','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('6','Comment','会员评论','0','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('7','Screen','网站筛选','0','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('8','Order','会员下单','0','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('9','Mypay','网站支付','0','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('10','Jzpay','极致支付','0','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('11','Tags','TAG标签','0','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('12','Wechat','微信模块','0','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('13','Common/vercode','验证码生成','1','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('14','Common/checklogin','检查是否登录','1','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('15','Common/multiuploads','多附件上传','1','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('16','Common/uploads','单附件上传','1','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('17','Common/qrcode','二维码生成','1','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('18','Common/get_fields','获取扩展信息','1','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('19','Common/jizhi','链接错误提示','1','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('20','Common/error','报错提示','1','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('21','Home/index','网站首页','2','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('22','Home/jizhi','网站内容','2','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('23','Home/auto_url','自定义链接','2','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('24','Home/jizhi_details','详情内容','2','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('25','Home/search','网站搜索','2','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('26','Home/searchAll','网站多模块搜索','2','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('27','Home/start_cache','开启网站缓存','2','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('28','Home/end_cache','输出缓存','2','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('29','User/checklogin','检查是否登录','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('30','User/index','个人中心首页','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('31','User/userinfo','会员资料','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('32','User/orders','订单记录','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('33','User/orderdetails','订单详情','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('34','User/payment','订单支付','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('35','User/orderdel','删除订单','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('36','User/changeimg','上传头像','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('37','User/comment','评论列表','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('38','User/commentdel','删除评论','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('39','User/likesAction','点赞文章','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('40','User/likes','点赞列表','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('41','User/likesdel','取消点赞','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('42','User/collectAction','收藏文章','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('43','User/collect','收藏列表','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('44','User/collectdel','删除收藏','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('45','User/cart','购物车','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('46','User/addcart','添加购物车','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('47','User/delcart','删除购物车','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('48','User/posts','发布管理','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('49','User/release','会员发布','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('50','User/del','删除发布','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('51','User/uploads','会员上传附件','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('52','User/jizhi','404提示','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('53','User/follow','关注用户','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('54','User/nofollow','取消关注','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('55','User/fans','粉丝列表','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('56','User/notify','消息提醒','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('57','User/notifyto','查看消息','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('58','User/notifydel','删除消息','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('59','User/active','公共主页','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('60','User/setmsg','消息提醒设置','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('61','User/getclass','获取栏目列表','2','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('62','User/wallet','用户钱包','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('63','User/buy','会员充值','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('64','User/buylist','充值列表','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('65','User/buydetails','交易详情','3','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('66','Login/index','登录首页','4','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('67','Login/register','注册页面','4','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('68','Login/forget','忘记密码','4','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('69','Login/nologin','未登录页面','4','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('70','Login/loginout','退出登录','4','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('71','Message/index','发送留言','5','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('72','Comment/index','发表评论','6','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('73','Screen/index','筛选列表','7','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('74','Order/create','创建订单','8','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('75','Order/pay','订单支付','8','1');
INSERT INTO `jz_power` (`id`,`action`,`name`,`pid`,`isagree`) VALUES ('76','Tags/index','TAG标签列表','11','1');
-- ----------------------------
-- Records of jz_product
-- ----------------------------
-- ----------------------------
-- Records of jz_ruler
-- ----------------------------
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('1','会员管理','Member','0','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('2','会员列表','Member/index','1','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('3','添加会员','Member/memberadd','1','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('4','修改会员','Member/memberedit','1','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('5','删除会员','Member/member_del','1','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('6','批量删除','Member/deleteAll','1','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('7','修改状态','Member/change_status','1','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('8','内容管理','Article','0','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('9','内容列表','Article/articlelist','8','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('10','添加内容','Article/addarticle','8','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('11','修改内容','Article/editarticle','8','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('12','删除内容','Article/deletearticle','8','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('13','批量删除','Article/deleteAll','8','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('14','复制内容','Article/copyarticle','8','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('15','评论管理','Comment','0','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('16','评论列表','Comment/commentlist','15','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('17','添加评论','Comment/addcomment','15','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('18','修改评论','Comment/editcomment','15','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('19','删除评论','Comment/deletecomment','15','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('20','批量删除','Comment/deleteAll','15','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('21','留言管理','Message','0','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('22','留言列表','Message/messagelist','21','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('23','修改留言','Message/editmessage','21','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('24','删除留言','Message/deletemessage','21','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('25','批量删除','Message/deleteAll','21','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('26','字段管理','Fields','0','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('27','字段列表','Fields/index','26','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('28','新增字段','Fields/addFields','26','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('29','修改字段','Fields/editFields','26','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('30','删除字段','Fields/deleteFields','26','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('31','获取字段','Fields/get_fields','26','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('32','基本功能','Index','0','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('33','系统界面','Index/index','32','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('34','后台首页','Index/welcome','32','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('35','数据库备份','Index/beifen','32','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('36','数据库备份','Index/backup','32','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('37','数据库还原','Index/huanyuan','32','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('38','数据库删除','Index/shanchu','32','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('39','系统设置','Sys','0','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('40','基本设置','Sys/index','39','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('41','栏目管理','Classtype','0','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('42','栏目列表','Classtype/index','41','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('43','新增栏目','Classtype/addclass','41','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('44','修改栏目','Classtype/editclass','41','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('45','删除栏目','Classtype/deleteclass','41','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('46','修改排序','Classtype/editClassOrders','41','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('47','栏目隐藏','Classtype/change_status','41','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('48','管理员管理','Admin','0','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('49','角色管理','Admin/group','48','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('50','新增角色','Admin/groupadd','48','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('51','修改角色','Admin/groupedit','48','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('52','删除角色','Admin/group_del','48','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('53','角色状态','Admin/change_group_status','48','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('54','管理员列表','Admin/adminlist','48','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('55','新增管理员','Admin/adminadd','48','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('56','修改管理员','Admin/adminedit','48','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('57','管理员状态','Admin/change_status','48','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('58','删除管理员','Admin/admindelete','48','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('59','个人信息','Index/details','32','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('60','模型管理','Molds','0','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('61','模型列表','Molds/index','60','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('62','新增模型','Molds/addMolds','60','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('63','修改模型','Molds/editMolds','60','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('64','删除模型','Molds/deleteMolds','60','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('65','权限管理','Rulers','0','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('66','权限列表','Rulers/index','65','1','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('67','新增权限','Rulers/addrulers','65','0','1');
INSERT INTO `jz_ruler` (`id`,`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('68','修改权限','Rulers/editrulers','65','0','1');
