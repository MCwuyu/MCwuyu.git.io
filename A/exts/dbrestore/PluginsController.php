<?php

// +----------------------------------------------------------------------
// | JiZhiCMS { 极致CMS，给您极致的建站体验 }  
// +----------------------------------------------------------------------
// | Copyright (c) 2018-2099 http://www.jizhicms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 留恋风 <2581047041@qq.com>
// +----------------------------------------------------------------------
// | Date：2020/10/28
// +----------------------------------------------------------------------

namespace A\exts;

use FrPHP\lib\Controller;
use FrPHP\Extend\Page;
class PluginsController extends Controller {
	private $tables = array();
	private $handler;
	private $config = array(
	  'host' => 'localhost',
	  'port' => 3306,
	  'user' => 'root',
	  'password' => 'root',
	  'database' => 'test',
	  'charset' => 'utf-8',
	  'target' => ''
	 );
	private $limit = 300;//每个备份文件存储的sql条数
	
	//自动执行
	public function _init(){
		/**
			继承系统默认配置
		
		**/
		
		//检查当前账户是否合乎操作
		if(!isset($_SESSION['admin']) || $_SESSION['admin']['id']==0){
			Redirect(U('Login/index'));
			
		}
 
	    if($_SESSION['admin']['isadmin']!=1){
			if(strpos($_SESSION['admin']['paction'],','.APP_CONTROLLER.',')!==false){
			   
			}else{
				$action = APP_CONTROLLER.'/'.APP_ACTION;
				if(strpos($_SESSION['admin']['paction'],','.$action.',')===false){
				   $ac = M('Ruler')->find(array('fc'=>$action));
				   if($this->frparam('ajax')){
					   
					   JsonReturn(['code'=>1,'msg'=>'您没有【'.$ac['name'].'】的权限！','url'=>U('Index/index')]);
				   }
				   Error('您没有【'.$ac['name'].'】的权限！',U('Index/index'));
				}
			}
		   
		  
		}
	  
	    $webconf = webConf();
	    $this->webconf = $webconf;
	    $customconf = get_custom();
	    $this->customconf = $customconf;
		
		//插件模板页目录
		
		$this->tpl = '@'.dirname(__FILE__).'/tpl/';
		
		/**
			在下面添加自定义操作
		**/
		
		
	}
	
	//执行SQL语句在此处处理,或者移动文件也可以在此处理
	public  function install(){
		
		//安装即用
		//检查源码版本
		if(defined('DB_TYPE') && DB_TYPE=='sqlite'){
			//sqlite
			$this->JZ_sqlite();
		}else{
			//mysql
			$this->JZ_mysql();
		}
		
		//更新配置
		setCache('webconfig',null);
		setCache('customconfig',null);
		setCache('classtypetree',null);
		setCache('classtype',null);
		setCache('mobileclasstype',null);
	
		return true;
		
	}
	
	private function JZ_sqlite(){
		//数据库表检测
		//article 
		$fields = $this->getTableFields('article');
		$sql = '';
		if(!in_array('target',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."article ADD target varchar(255) default NULL; ";
		}
		if(!in_array('ownurl',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."article ADD ownurl varchar(255) default NULL; ";
		}
		//检测旧v1.6.5版本可能问题
		$fields = $this->getTableFields('buylog');
		if(!in_array('molds',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."buylog ADD molds varchar(50) default NULL; ";
		}
		if(!in_array('aid',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."buylog ADD aid int(11) default 0; ";
		}
		if(!in_array('userid',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."buylog ADD userid int(11) default 0; ";
		}
		if(!in_array('buytype',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."buylog ADD buytype varchar(20) default NULL; ";
		}
		//classtype
		$fields = $this->getTableFields('classtype');
		if(!in_array('orderstype',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."classtype ADD orderstype int(4) default 0; ";
		}
		if(!in_array('ishome',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."classtype ADD ishome tinyint(1) default 1; ";
		}
		if(!in_array('seo_classname',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."classtype ADD seo_classname varchar(50) default NULL; ";
		}
		if(!in_array('isclose',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."classtype ADD isclose tinyint(1) default 0; ";
		}
		//comment
		$fields = $this->getTableFields('comment');
		if(!in_array('reply',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."comment ADD reply TEXT default NULL; ";
		}
		//fields
		$fields = $this->getTableFields('fields');
		if(!in_array('isajax',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."fields ADD isajax tinyint(1) default 1; ";
		}
		//page
		$fields = $this->getTableFields('page');
		if(!in_array('istop',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."page ADD istop tinyint(1) default 0; ";
		}
		if(!in_array('hits',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."page ADD hits int(11) default 0; ";
		}
		if(!in_array('addtime',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."page ADD addtime int(11) default 0; ";
		}
		//links
		$fields = $this->getTableFields('links');
		if(!in_array('molds',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."links ADD molds varchar(50) default 'links'; ";
		}
		if(!in_array('target',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."links ADD target varchar(255) default NULL; ";
		}
		if(!in_array('ownurl',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."links ADD ownurl varchar(255) default NULL; ";
		}
		if(!in_array('addtime',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."links ADD addtime int(11) default 0; ";
		}
		//message
		$fields = $this->getTableFields('message');
		if(!in_array('istop',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."message ADD istop tinyint(1) default 0; ";
		}
		if(!in_array('hits',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."message ADD hits int(11) default 0; ";
		}
		//molds
		$fields = $this->getTableFields('molds');
		if(!in_array('iscontrol',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."molds ADD iscontrol tinyint(1) default 0; ";
		}
		if(!in_array('ismust',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."molds ADD ismust tinyint(1) default 1; ";
		}
		if(!in_array('isclasstype',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."molds ADD isclasstype tinyint(1) default 1; ";
		}
		if(!in_array('isshowclass',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."molds ADD isshowclass tinyint(1) default 1; ";
		}
		if(!in_array('list_html',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."molds ADD list_html varchar(50) default 'list.html'; ";
		}
		if(!in_array('details_html',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."molds ADD details_html varchar(50) default 'details.html'; ";
		}
		//product
		$fields = $this->getTableFields('product');
		if(!in_array('molds',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."product ADD molds varchar(50) default 'product'; ";
		}
		if(!in_array('target',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."product ADD target varchar(255) default NULL; ";
		}
		if(!in_array('ownurl',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."product ADD ownurl varchar(255) default NULL; ";
		}
		//tags
		$fields = $this->getTableFields('tags');
		if(!in_array('molds',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."tags ADD molds varchar(50) default 'tags'; ";
		}
		if(!in_array('ownurl',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."tags ADD ownurl varchar(255) default NULL; ";
		}
		if(!in_array('addtime',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."tags ADD addtime int(11) default 0; ";
		}
		if(!in_array('member_id',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."tags ADD member_id int(11) default 0; ";
		}
		if(!in_array('tags',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."tags ADD tags varchar(255) default NULL; ";
		}
		//member
		$fields = $this->getTableFields('member');
		if(!in_array('pid',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."member ADD pid int(11) default 0; ";
		}
		//检查表是否存在
		$tables = $this->getTableData();
		if(!in_array(DB_PREFIX.'customurl',$tables)){
			$sql.="CREATE TABLE `".DB_PREFIX."customurl` (
				  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
				  `molds` varchar(50) DEFAULT NULL,
				  `url` varchar(255) DEFAULT NULL,
				  `tid` int(11) NOT NULL DEFAULT '0',
				  `aid` int(11) NOT NULL DEFAULT '0',
				  `addtime` int(11) NOT NULL DEFAULT '0'
				) ";
			
		}
		if(!in_array(DB_PREFIX.'link_type',$tables)){
			$sql.="CREATE TABLE `".DB_PREFIX."link_type` (
				  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
				  `name` varchar(50) DEFAULT NULL,
				  `addtime` int(11) NOT NULL DEFAULT '0'
				) ";
			
		}
		if(!in_array(DB_PREFIX.'menu',$tables)){
			$sql.="CREATE TABLE `".DB_PREFIX."menu` (
				  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
				  `name` varchar(255) DEFAULT NULL,
				  `nav` text DEFAULT NULL,
				  `isshow`tinyint(1) NOT NULL DEFAULT '1'
				) ";
		}
		if(!in_array(DB_PREFIX.'cachedata',$tables)){
			$sql.="CREATE TABLE `".DB_PREFIX."cachedata` (
				  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
				  `title` varchar(255) DEFAULT NULL,
				  `field` varchar(50) DEFAULT NULL,
				  `molds` varchar(50) DEFAULT NULL,
				  `tid` int(11) NOT NULL DEFAULT '0',
				  `isall`tinyint(1) NOT NULL DEFAULT '1',
				  `sqls` varchar(500) DEFAULT NULL,
				  `orders` varchar(255) DEFAULT NULL,
				  `limits`int(11) NOT NULL DEFAULT '10',
				  `times`int(11) NOT NULL DEFAULT '0'
				) ";
		}
		//执行SQL语句
		if($sql){
			$x = M()->runSql($sql);	
		}
		
		if(!M('ruler')->find(['fc'=>'Links'])){
			$w = [];
			$w['fc'] = 'Links';
			$w['name'] = '友情链接';
			$w['pid'] = 0;
			$w['sys'] = 1;
			$r = M('ruler')->add($w);
			$sql = " fc like '%Links%' and id!=".$r;
			M('ruler')->update($sql,['pid'=>$r]);
			
		}
		
		//更改某些数据设定
		M('molds')->update(['biaoshi'=>'links'],['isshowclass'=>0,'iscontrol'=>0,'ismust'=>0]);
		M('molds')->update(['biaoshi'=>'collect'],['isshowclass'=>0,'iscontrol'=>0,'ismust'=>0]);
		M('molds')->update(['biaoshi'=>'level'],['isshowclass'=>0,'iscontrol'=>0,'ismust'=>0]);
		M('molds')->update(['biaoshi'=>'tags'],['isshowclass'=>0,'iscontrol'=>0,'ismust'=>0]);
		M('molds')->update(['biaoshi'=>'comment'],['isshowclass'=>0,'iscontrol'=>0,'ismust'=>0]);
		M('molds')->update(['biaoshi'=>'member_group'],['isshowclass'=>0,'iscontrol'=>0,'ismust'=>0]);
		M('molds')->update(['biaoshi'=>'orders'],['isshowclass'=>0,'iscontrol'=>0,'ismust'=>0]);
		M('molds')->update(['biaoshi'=>'member'],['isshowclass'=>0,'iscontrol'=>0,'ismust'=>0]);
		
		//插入一些数据
		$sql='';
		if(!M('fields')->find(['molds'=>'links','field'=>'target'])){
			$sql .= "INSERT INTO `".DB_PREFIX."fields` (`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`) VALUES ('target','links','外链URL','默认为空，系统访问内容则直接跳转到此链接','1', NULL,'255',NULL,'0','0','0','0','0','0', NULL,NULL);";
		}
		if(!M('fields')->find(['molds'=>'links','field'=>'ownurl'])){
			$sql .= "INSERT INTO `".DB_PREFIX."fields` (`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`) VALUES ('ownurl','links','自定义URL','默认为空，自定义URL','1', NULL,'255',NULL,'0','0','0','0','0','0', NULL,NULL);";
		}
		if(!M('fields')->find(['molds'=>'tags','field'=>'ownurl'])){
			$sql .= "INSERT INTO `".DB_PREFIX."fields` (`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`) VALUES ('ownurl','tags','自定义URL','默认为空，自定义URL','1', NULL,'255',NULL,'0','0','0','0','0','0', NULL,NULL);";
		}
		if(!M('fields')->find(['molds'=>'links','field'=>'addtime'])){
			$sql .= "INSERT INTO `".DB_PREFIX."fields` (`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`) VALUES ('addtime','links','添加时间','系统自带','11', NULL,'11',NULL,'0','0','0','0','0','0', 'date_2','0');";
		}
		if(!M('fields')->find(['molds'=>'tags','field'=>'addtime'])){
			$sql .= "INSERT INTO `".DB_PREFIX."fields` (`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`) VALUES ('addtime','tags','添加时间','系统自带','11', NULL,'11',NULL,'0','0','0','0','0','0', 'date_2','0');";
		}
		//检查是否新增了其他扩展表
		$extmolds = M('molds')->findAll(" sys=0 and biaoshi!='links' and biaoshi!='tags' ");
		if($extmolds){
			foreach($extmolds as $v){
				if(!M('fields')->find(['molds'=>$v['biaoshi'],'field'=>'target'])){
					$sql .= "INSERT INTO `".DB_PREFIX."fields` (`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`) VALUES ('target','".$v['biaoshi']."','外链URL','默认为空，系统访问内容则直接跳转到此链接','1', NULL,'255',NULL,'0','0','0','0','0','0', NULL,NULL);";
				}
				if(!M('fields')->find(['molds'=>$v['biaoshi'],'field'=>'ownurl'])){
					$sql .= "INSERT INTO `".DB_PREFIX."fields` (`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`) VALUES ('ownurl','".$v['biaoshi']."','自定义URL','默认为空，自定义URL','1', NULL,'255',NULL,'0','0','0','0','0','0', NULL,NULL);";
				}
				if(!M('fields')->find(['molds'=>$v['biaoshi'],'field'=>'addtime'])){
					$sql .= "INSERT INTO `".DB_PREFIX."fields` (`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`) VALUES ('addtime','".$v['biaoshi']."','添加时间','系统自带','11', NULL,'11',NULL,'0','0','0','0','0','0', 'date_2','0');";
				}
				if(!M('fields')->find(['molds'=>$v['biaoshi'],'field'=>'istop'])){
					$sql .= "INSERT INTO `".DB_PREFIX."fields` (`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`) VALUES ('istop','".$v['biaoshi']."','是否置顶','系统自带','11', NULL,'2',NULL,'0','0','0','0','0','0', NULL,'0');";
				}
				if(!M('fields')->find(['molds'=>$v['biaoshi'],'field'=>'title'])){
					$sql .= "INSERT INTO `".DB_PREFIX."fields` (`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`) VALUES ('title','".$v['biaoshi']."','标题','50字以内','255', NULL,'1',NULL,'0','0','0','0','0','0', NULL,'0');";
					$sql.= "ALTER TABLE ".DB_PREFIX.$v['biaoshi']." ADD title varchar(255) default NULL; ";
				}
				if(!M('fields')->find(['molds'=>$v['biaoshi'],'field'=>'litpic'])){
					$sql .= "INSERT INTO `".DB_PREFIX."fields` (`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`) VALUES ('litpic','".$v['biaoshi']."','缩略图','上传图片','255', NULL,'5',NULL,'0','0','0','0','0','0', NULL,'0');";
					$sql.= "ALTER TABLE ".DB_PREFIX.$v['biaoshi']." ADD litpic varchar(255) default NULL; ";
				}
				if(!M('fields')->find(['molds'=>$v['biaoshi'],'field'=>'keywords'])){
					$sql .= "INSERT INTO `".DB_PREFIX."fields` (`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`) VALUES ('keywords','".$v['biaoshi']."','关键词','用英文逗号拼接','255', NULL,'1',NULL,'0','0','0','0','0','0', NULL,'0');";
					$sql.= "ALTER TABLE ".DB_PREFIX.$v['biaoshi']." ADD keywords varchar(255) default NULL; ";
				}
				if(!M('fields')->find(['molds'=>$v['biaoshi'],'field'=>'description'])){
					$sql .= "INSERT INTO `".DB_PREFIX."fields` (`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`) VALUES ('litpic','".$v['biaoshi']."','简介','200字以内','500', NULL,'2',NULL,'0','0','0','0','0','0', NULL,'0');";
					$sql.= "ALTER TABLE ".DB_PREFIX.$v['biaoshi']." ADD description varchar(500) default NULL; ";
				}
				
				
				$fields = $this->getTableFields($v['biaoshi']);
				if(!in_array('tags',$fields)){
					$sql.= "ALTER TABLE ".DB_PREFIX.$v['biaoshi']." ADD tags varchar(255) default NULL; ";
				}
			}
		}
		
		
		if(!M('sysconfig')->find(['field'=>'closeweb'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('closeweb','关闭网站', NULL,'0','0');";
		}
		if(!M('sysconfig')->find(['field'=>'closetip'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('closetip','关闭网站', NULL,'0','0');";
		}
		if(!M('sysconfig')->find(['field'=>'admin_save_path'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('admin_save_path','后台文件存储路径', '默认Public/Admin，存储路径相对于根目录，最后不能带斜杠[ / ]','0','Public/Admin');";
		}
		if(!M('sysconfig')->find(['field'=>'home_save_path'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('home_save_path','前台文件存储路径', '默认Public/Home，存储路径相对于根目录，最后不能带斜杠[ / ]','0','Public/Home');";
		}
		if(!M('sysconfig')->find(['field'=>'isajax'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('isajax','是否开启前台AJAX', '开启后AJAX，前台可以通过栏目链接+ajax=1获取JSON数据','0','1');";
		}
		if(!M('sysconfig')->find(['field'=>'isautositemap'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('isautositemap','自动生成sitemap', '开启后，前台访问每天会自动生成1次sitemap','0','1');";
		}
		
		
		if(!M('sysconfig')->find(['field'=>'invite_award_open'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('invite_award_open','是否开启邀请奖励', '开启邀请后则会奖励','0','0');";
		}
		if(!M('sysconfig')->find(['field'=>'invite_type'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('invite_type','邀请奖励类型', NULL,'0','jifen');";
		}
		if(!M('sysconfig')->find(['field'=>'invite_award'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('invite_award','邀请奖励数量', NULL,'0','0');";
		}
		if(!M('sysconfig')->find(['field'=>'web_phone'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('web_phone','联系手机', NULL,'0','0');";
		}
		if(!M('sysconfig')->find(['field'=>'web_weixin'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('web_weixin','站长微信', NULL,'1',NULL);";
		}
		if(!M('sysconfig')->find(['field'=>'ispicsdes'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('ispicsdes','开启多图描述', '开启后图集每张图可以添加描述，注意模板输出需要更改输出方式！(附件同理)','0','0');";
		}
		if(!M('sysconfig')->find(['field'=>'isregister'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('isregister','前台用户注册', '关闭前台注册后，前台无法进入注册页面','0','1');";
		}
		if(!M('sysconfig')->find(['field'=>'onlyinvite'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('onlyinvite','仅邀请码注册', '开启后，必须通过邀请链接才能注册！','0','0');";
		}
		
		if(!M('sysconfig')->find(['field'=>'search_words'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('search_words','前台搜索的字段', '可以设置搜索表中的相关字段进行模糊查询,多个字段可用|分割','0','title');";
		}
		if(!M('sysconfig')->find(['field'=>'closehomevercode'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('closehomevercode','前台验证码', '关闭后，登录注册不需要验证码','0','0');";
		}
		if(!M('sysconfig')->find(['field'=>'closeadminvercode'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('closeadminvercode','后台验证码', '关闭后，后台管理员登录不需要验证码','0','0');";
		}
		if(!M('sysconfig')->find(['field'=>'tag_table'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('tag_table','TAG包含模型', '在tag列表上查询的相关模型,多个模型标识可用|分割,如：article|product','0','article|product');";
		}
		
		if($sql){
			//执行SQL语句
			$x = M()->runSql($sql);
			
		}
		
		//更改某些数据设定
		M('ruler')->update(['fc'=>'Extmolds/index/molds/links'],['fc'=>'Links/index']);
		M('ruler')->update(['fc'=>'Extmolds/addmolds/molds/links'],['fc'=>'Links/addlinks']);
		M('ruler')->update(['fc'=>'Extmolds/editmolds/molds/links'],['fc'=>'Links/editlinks']);
		M('ruler')->update(['fc'=>'Extmolds/copymolds/molds/links'],['fc'=>'Links/copylinks']);
		M('ruler')->update(['fc'=>'Extmolds/deletemolds/molds/links'],['fc'=>'Links/deletelinks']);
		M('ruler')->update(['fc'=>'Extmolds/deleteAll/molds/links'],['fc'=>'Links/deleteAll']);
		M('ruler')->update(['fc'=>'Extmolds/changeType/molds/links'],['fc'=>'Links/changeType']);
		M('ruler')->update(['fc'=>'Extmolds/copyAll/molds/links'],['fc'=>'Links/copyAll']);
		M('ruler')->update(['fc'=>'Extmolds/editOrders/molds/links'],['fc'=>'Links/editOrders']);
		
		$adminlist = M('level_group')->findAll();
		foreach($adminlist as $v){
			$paction = str_replace([',Extmolds/index/molds/links,',',Extmolds/addmolds/molds/links,',',Extmolds/editmolds/molds/links,',',Extmolds/copymolds/molds/links,',',Extmolds/deletemolds/molds/links,',',Extmolds/deleteAll/molds/links,',',Extmolds/changeType/molds/links,',',Extmolds/copyAll/molds/links,',',Extmolds/editOrders/molds/links,'],[',Links/index,',',Links/addlinks,',',Links/editlinks,',',Links/copylinks,',',Links/deletelinks,',',Links/deleteAll,',',Links/changeType,',',Links/copyAll,',',Links/editOrders,'],$v['paction']);
			M('level_group')->update(array('id'=>$v['id']),['paction'=>$paction]);
			
		}
		//插入一些数据
		$sql='';
		if(!M('ruler')->find(['fc'=>'Links/linktype'])){
			$sql .= "INSERT INTO `".DB_PREFIX."ruler` (`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('友情链接分类列表','Links/linktype','77','1','1');";
		}
		if(!M('ruler')->find(['fc'=>'Links/linktypeadd'])){
			$sql .= "INSERT INTO `".DB_PREFIX."ruler` (`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('新增友情链接分类','Links/linktypeadd','77','1','1');";
		}
		if(!M('ruler')->find(['fc'=>'Links/linktypeedit'])){
			$sql .= "INSERT INTO `".DB_PREFIX."ruler` (`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('修改友情链接分类','Links/linktypeedit','77','1','1');";
		}
		if(!M('ruler')->find(['fc'=>'Links/linktypedelete'])){
			$sql .= "INSERT INTO `".DB_PREFIX."ruler` (`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('删除友情链接分类','Links/linktypedelete','77','1','1');";
		}
		if(!M('sysconfig')->find(['field'=>'release_table'])){
			$sql .= "INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('release_table','允许前台发布模块', '防止数据泄露,填写允许发布模块标识,留空表示不允许发布,多个表可用|分割','0','article|product');";
		}
		
		//权限增加
		if(!M('ruler')->find(['fc'=>'Classtype/changeClass'])){
			$sql.="INSERT INTO `".DB_PREFIX."ruler` (`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('批量修改栏目','Classtype/changeClass','41','0','1');";
		}
		if(!M('ruler')->find(['fc'=>'Index/menu'])){
			$sql.="INSERT INTO `".DB_PREFIX."ruler` (`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('导航设置','Index/menu','32','1','1');";
		}
		if(!M('ruler')->find(['fc'=>'Index/addmenu'])){
			$sql.="INSERT INTO `".DB_PREFIX."ruler` (`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('新增导航','Index/addmenu','32','0','1');";
		}
		if(!M('ruler')->find(['fc'=>'Index/editmenu'])){
			$sql.="INSERT INTO `".DB_PREFIX."ruler` (`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('修改导航','Index/editmenu','32','0','1');";
		}
		if(!M('ruler')->find(['fc'=>'Index/delmenu'])){
			$sql.="INSERT INTO `".DB_PREFIX."ruler` (`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('删除导航','Index/delmenu','32','0','1');";
		}
		if(!M('ruler')->find(['fc'=>'Sys/datacache'])){
			$sql.="INSERT INTO `".DB_PREFIX."ruler` (`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('碎片化','Sys/datacache','39','1','1');";
		}
		if(!M('ruler')->find(['fc'=>'Sys/addcache'])){
			$sql.="INSERT INTO `".DB_PREFIX."ruler` (`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('新增碎片','Sys/addcache','39','0','1');";
		}
		if(!M('ruler')->find(['fc'=>'Sys/editcache'])){
			$sql.="INSERT INTO `".DB_PREFIX."ruler` (`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('修改碎片','Sys/editcache','39','0','1');";
		}
		if(!M('ruler')->find(['fc'=>'Sys/delcache'])){
			$sql.="INSERT INTO `".DB_PREFIX."ruler` (`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('删除碎片','Sys/delcache','39','0','1');";
		}
		if(!M('ruler')->find(['fc'=>'Sys/viewcache'])){
			$sql.="INSERT INTO `".DB_PREFIX."ruler` (`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('预览SQL','Sys/viewcache','39','0','1');";
		}


		//执行SQL语句
		if($sql){
			$x = M()->runSql($sql);
		}
		
	}
	
	private function JZ_mysql(){
		//数据库表检测
		//article 
		$fields = $this->getTableFields('article');
		$sql = '';
		if(!in_array('target',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."article ADD target varchar(255) default NULL; ";
		}
		if(!in_array('ownurl',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."article ADD ownurl varchar(255) default NULL; ";
		}
		//检测旧v1.6.5版本可能问题
		$fields = $this->getTableFields('buylog');
		if(!in_array('molds',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."buylog ADD molds varchar(50) default NULL; ";
		}
		if(!in_array('aid',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."buylog ADD aid int(11) default 0; ";
		}
		if(!in_array('userid',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."buylog ADD userid int(11) default 0; ";
		}
		if(!in_array('buytype',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."buylog ADD buytype varchar(20) default NULL; ";
		}
		//classtype
		$fields = $this->getTableFields('classtype');
		if(!in_array('orderstype',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."classtype ADD orderstype int(4) default 0; ";
		}
		if(!in_array('ishome',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."classtype ADD ishome tinyint(1) default 1; ";
		}
		if(!in_array('seo_classname',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."classtype ADD seo_classname varchar(50) default NULL; ";
		}
		if(!in_array('isclose',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."classtype ADD isclose tinyint(1) default 0; ";
		}
		//comment
		$fields = $this->getTableFields('comment');
		if(!in_array('reply',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."comment ADD reply TEXT default NULL; ";
		}
		//fields
		$fields = $this->getTableFields('fields');
		if(!in_array('isajax',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."fields ADD isajax tinyint(1) default 1; ";
		}
		//page
		$fields = $this->getTableFields('page');
		if(!in_array('istop',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."page ADD istop tinyint(1) default 0; ";
		}
		if(!in_array('hits',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."page ADD hits int(11) default 0; ";
		}
		if(!in_array('addtime',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."page ADD addtime int(11) default 0; ";
		}
		//links
		$fields = $this->getTableFields('links');
		if(!in_array('molds',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."links ADD molds varchar(50) default 'links'; ";
		}
		if(!in_array('target',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."links ADD target varchar(255) default NULL; ";
		}
		if(!in_array('ownurl',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."links ADD ownurl varchar(255) default NULL; ";
		}
		if(!in_array('addtime',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."links ADD addtime int(11) default 0; ";
		}
		//message
		$fields = $this->getTableFields('message');
		if(!in_array('istop',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."message ADD istop tinyint(1) default 0; ";
		}
		if(!in_array('hits',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."message ADD hits int(11) default 0; ";
		}
		//molds
		$fields = $this->getTableFields('molds');
		if(!in_array('iscontrol',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."molds ADD iscontrol tinyint(1) default 0; ";
		}
		if(!in_array('ismust',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."molds ADD ismust tinyint(1) default 1; ";
		}
		if(!in_array('isclasstype',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."molds ADD isclasstype tinyint(1) default 1; ";
		}
		if(!in_array('isshowclass',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."molds ADD isshowclass tinyint(1) default 1; ";
		}
		if(!in_array('list_html',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."molds ADD list_html varchar(50) default 'list.html'; ";
		}
		if(!in_array('details_html',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."molds ADD details_html varchar(50) default 'details.html'; ";
		}
		//product
		$fields = $this->getTableFields('product');
		if(!in_array('molds',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."product ADD molds varchar(50) default 'product'; ";
		}
		if(!in_array('target',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."product ADD target varchar(255) default NULL; ";
		}
		if(!in_array('ownurl',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."product ADD ownurl varchar(255) default NULL; ";
		}
		//tags
		$fields = $this->getTableFields('tags');
		if(!in_array('molds',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."tags ADD molds varchar(50) default 'tags'; ";
		}
		if(!in_array('ownurl',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."tags ADD ownurl varchar(255) default NULL; ";
		}
		if(!in_array('addtime',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."tags ADD addtime int(11) default 0; ";
		}
		if(!in_array('member_id',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."tags ADD member_id int(11) default 0; ";
		}
		if(!in_array('tags',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."tags ADD tags varchar(255) default NULL; ";
		}
		//member
		$fields = $this->getTableFields('member');
		if(!in_array('pid',$fields)){
			$sql.= "ALTER TABLE ".DB_PREFIX."member ADD pid int(11) default 0; ";
		}
		//检查表是否存在
		$tables = $this->getTableData();
		if(!in_array(DB_PREFIX.'customurl',$tables)){
			$sql.="CREATE TABLE `".DB_PREFIX."customurl` (
				  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				  `molds` varchar(50) DEFAULT NULL,
				  `url` varchar(255) DEFAULT NULL,
				  `tid` int(11) NOT NULL DEFAULT '0',
				  `aid` int(11) NOT NULL DEFAULT '0',
				  `addtime` int(11) NOT NULL DEFAULT '0',
				  PRIMARY KEY (`id`)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
			
		}
		if(!in_array(DB_PREFIX.'link_type',$tables)){
			$sql.="CREATE TABLE `".DB_PREFIX."link_type` (
				  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				  `name` varchar(50) DEFAULT NULL,
				  `addtime` int(11) NOT NULL DEFAULT '0',
				  PRIMARY KEY (`id`)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
			
		}
		if(!in_array(DB_PREFIX.'menu',$tables)){
			$sql.="CREATE TABLE `".DB_PREFIX."menu` (
				  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				  `name` varchar(255) DEFAULT NULL,
				  `nav` text DEFAULT NULL,
				  `isshow`tinyint(1) NOT NULL DEFAULT '1',
				  PRIMARY KEY (`id`)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
		}
		if(!in_array(DB_PREFIX.'cachedata',$tables)){
			$sql.="CREATE TABLE `".DB_PREFIX."cachedata` (
				   `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				  `title` varchar(255) DEFAULT NULL,
				  `field` varchar(50) DEFAULT NULL,
				  `molds` varchar(50) DEFAULT NULL,
				  `tid` int(11) NOT NULL DEFAULT '0',
				  `isall`tinyint(1) NOT NULL DEFAULT '1',
				  `sqls` varchar(500) DEFAULT NULL,
				  `orders` varchar(255) DEFAULT NULL,
				  `limits`int(11) NOT NULL DEFAULT '10',
				  `times`int(11) NOT NULL DEFAULT '0',
				  PRIMARY KEY (`id`)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
		}
		//执行SQL语句
		if($sql){
			$x = M()->runSql($sql);	
		}
		
		if(!M('ruler')->find(['fc'=>'Links'])){
			$w = [];
			$w['fc'] = 'Links';
			$w['name'] = '友情链接';
			$w['pid'] = 0;
			$w['sys'] = 1;
			$r = M('ruler')->add($w);
			$sql = " fc like '%Links%' and id!=".$r;
			M('ruler')->update($sql,['pid'=>$r]);
			
		}
		
		//更改某些数据设定
		M('molds')->update(['biaoshi'=>'links'],['isshowclass'=>0,'iscontrol'=>0,'ismust'=>0]);
		M('molds')->update(['biaoshi'=>'collect'],['isshowclass'=>0,'iscontrol'=>0,'ismust'=>0]);
		M('molds')->update(['biaoshi'=>'level'],['isshowclass'=>0,'iscontrol'=>0,'ismust'=>0]);
		M('molds')->update(['biaoshi'=>'tags'],['isshowclass'=>0,'iscontrol'=>0,'ismust'=>0]);
		M('molds')->update(['biaoshi'=>'comment'],['isshowclass'=>0,'iscontrol'=>0,'ismust'=>0]);
		M('molds')->update(['biaoshi'=>'member_group'],['isshowclass'=>0,'iscontrol'=>0,'ismust'=>0]);
		M('molds')->update(['biaoshi'=>'orders'],['isshowclass'=>0,'iscontrol'=>0,'ismust'=>0]);
		M('molds')->update(['biaoshi'=>'member'],['isshowclass'=>0,'iscontrol'=>0,'ismust'=>0]);
		
		//插入一些数据
		$sql='';
		if(!M('fields')->find(['molds'=>'links','field'=>'target'])){
			$sql .= "INSERT INTO `".DB_PREFIX."fields` (`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`) VALUES ('target','links','外链URL','默认为空，系统访问内容则直接跳转到此链接','1', NULL,'255',NULL,'0','0','0','0','0','0', NULL,NULL);";
		}
		if(!M('fields')->find(['molds'=>'links','field'=>'ownurl'])){
			$sql .= "INSERT INTO `".DB_PREFIX."fields` (`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`) VALUES ('ownurl','links','自定义URL','默认为空，自定义URL','1', NULL,'255',NULL,'0','0','0','0','0','0', NULL,NULL);";
		}
		if(!M('fields')->find(['molds'=>'tags','field'=>'ownurl'])){
			$sql .= "INSERT INTO `".DB_PREFIX."fields` (`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`) VALUES ('ownurl','tags','自定义URL','默认为空，自定义URL','1', NULL,'255',NULL,'0','0','0','0','0','0', NULL,NULL);";
		}
		if(!M('fields')->find(['molds'=>'links','field'=>'addtime'])){
			$sql .= "INSERT INTO `".DB_PREFIX."fields` (`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`) VALUES ('addtime','links','添加时间','系统自带','11', NULL,'11',NULL,'0','0','0','0','0','0', 'date_2','0');";
		}
		if(!M('fields')->find(['molds'=>'tags','field'=>'addtime'])){
			$sql .= "INSERT INTO `".DB_PREFIX."fields` (`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`) VALUES ('addtime','tags','添加时间','系统自带','11', NULL,'11',NULL,'0','0','0','0','0','0', 'date_2','0');";
		}
		//检查是否新增了其他扩展表
		$extmolds = M('molds')->findAll(" sys=0 and biaoshi!='links' and biaoshi!='tags' ");
		if($extmolds){
			foreach($extmolds as $v){
				if(!M('fields')->find(['molds'=>$v['biaoshi'],'field'=>'target'])){
					$sql .= "INSERT INTO `".DB_PREFIX."fields` (`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`) VALUES ('target','".$v['biaoshi']."','外链URL','默认为空，系统访问内容则直接跳转到此链接','1', NULL,'255',NULL,'0','0','0','0','0','0', NULL,NULL);";
				}
				if(!M('fields')->find(['molds'=>$v['biaoshi'],'field'=>'ownurl'])){
					$sql .= "INSERT INTO `".DB_PREFIX."fields` (`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`) VALUES ('ownurl','".$v['biaoshi']."','自定义URL','默认为空，自定义URL','1', NULL,'255',NULL,'0','0','0','0','0','0', NULL,NULL);";
				}
				if(!M('fields')->find(['molds'=>$v['biaoshi'],'field'=>'addtime'])){
					$sql .= "INSERT INTO `".DB_PREFIX."fields` (`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`) VALUES ('addtime','".$v['biaoshi']."','添加时间','系统自带','11', NULL,'11',NULL,'0','0','0','0','0','0', 'date_2','0');";
				}
				if(!M('fields')->find(['molds'=>$v['biaoshi'],'field'=>'istop'])){
					$sql .= "INSERT INTO `".DB_PREFIX."fields` (`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`) VALUES ('istop','".$v['biaoshi']."','是否置顶','系统自带','11', NULL,'2',NULL,'0','0','0','0','0','0', NULL,'0');";
				}
				if(!M('fields')->find(['molds'=>$v['biaoshi'],'field'=>'title'])){
					$sql .= "INSERT INTO `".DB_PREFIX."fields` (`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`) VALUES ('title','".$v['biaoshi']."','标题','50字以内','255', NULL,'1',NULL,'0','0','0','0','0','0', NULL,'0');";
					$sql.= "ALTER TABLE ".DB_PREFIX.$v['biaoshi']." ADD title varchar(255) default NULL; ";
				}
				if(!M('fields')->find(['molds'=>$v['biaoshi'],'field'=>'litpic'])){
					$sql .= "INSERT INTO `".DB_PREFIX."fields` (`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`) VALUES ('litpic','".$v['biaoshi']."','缩略图','上传图片','255', NULL,'5',NULL,'0','0','0','0','0','0', NULL,'0');";
					$sql.= "ALTER TABLE ".DB_PREFIX.$v['biaoshi']." ADD litpic varchar(255) default NULL; ";
				}
				if(!M('fields')->find(['molds'=>$v['biaoshi'],'field'=>'keywords'])){
					$sql .= "INSERT INTO `".DB_PREFIX."fields` (`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`) VALUES ('keywords','".$v['biaoshi']."','关键词','用英文逗号拼接','255', NULL,'1',NULL,'0','0','0','0','0','0', NULL,'0');";
					$sql.= "ALTER TABLE ".DB_PREFIX.$v['biaoshi']." ADD keywords varchar(255) default NULL; ";
				}
				if(!M('fields')->find(['molds'=>$v['biaoshi'],'field'=>'description'])){
					$sql .= "INSERT INTO `".DB_PREFIX."fields` (`field`,`molds`,`fieldname`,`tips`,`fieldtype`,`tids`,`fieldlong`,`body`,`orders`,`ismust`,`isshow`,`isadmin`,`issearch`,`islist`,`format`,`vdata`) VALUES ('litpic','".$v['biaoshi']."','简介','200字以内','500', NULL,'2',NULL,'0','0','0','0','0','0', NULL,'0');";
					$sql.= "ALTER TABLE ".DB_PREFIX.$v['biaoshi']." ADD description varchar(500) default NULL; ";
				}
				
				$fields = $this->getTableFields($v['biaoshi']);
				if(!in_array('tags',$fields)){
					$sql.= "ALTER TABLE ".DB_PREFIX.$v['biaoshi']." ADD tags varchar(255) default NULL; ";
				}
			}
		}
		
		
		if(!M('sysconfig')->find(['field'=>'closeweb'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('closeweb','关闭网站', NULL,'0','0');";
		}
		if(!M('sysconfig')->find(['field'=>'closetip'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('closetip','关闭网站', NULL,'0','0');";
		}
		if(!M('sysconfig')->find(['field'=>'admin_save_path'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('admin_save_path','后台文件存储路径', '默认Public/Admin，存储路径相对于根目录，最后不能带斜杠[ / ]','0','Public/Admin');";
		}
		if(!M('sysconfig')->find(['field'=>'home_save_path'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('home_save_path','前台文件存储路径', '默认Public/Home，存储路径相对于根目录，最后不能带斜杠[ / ]','0','Public/Home');";
		}
		if(!M('sysconfig')->find(['field'=>'isajax'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('isajax','是否开启前台AJAX', '开启后AJAX，前台可以通过栏目链接+ajax=1获取JSON数据','0','1');";
		}
		if(!M('sysconfig')->find(['field'=>'isautositemap'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('isautositemap','自动生成sitemap', '开启后，前台访问每天会自动生成1次sitemap','0','1');";
		}
		
		
		if(!M('sysconfig')->find(['field'=>'invite_award_open'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('invite_award_open','是否开启邀请奖励', '开启邀请后则会奖励','0','0');";
		}
		if(!M('sysconfig')->find(['field'=>'invite_type'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('invite_type','邀请奖励类型', NULL,'0','jifen');";
		}
		if(!M('sysconfig')->find(['field'=>'invite_award'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('invite_award','邀请奖励数量', NULL,'0','0');";
		}
		if(!M('sysconfig')->find(['field'=>'web_phone'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('web_phone','联系手机', NULL,'0','0');";
		}
		if(!M('sysconfig')->find(['field'=>'web_weixin'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('web_weixin','站长微信', NULL,'1',NULL);";
		}
		if(!M('sysconfig')->find(['field'=>'ispicsdes'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('ispicsdes','开启多图描述', '开启后图集每张图可以添加描述，注意模板输出需要更改输出方式！(附件同理)','0','0');";
		}
		if(!M('sysconfig')->find(['field'=>'isregister'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('isregister','前台用户注册', '关闭前台注册后，前台无法进入注册页面','0','1');";
		}
		if(!M('sysconfig')->find(['field'=>'onlyinvite'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('onlyinvite','仅邀请码注册', '开启后，必须通过邀请链接才能注册！','0','0');";
		}
		
		if(!M('sysconfig')->find(['field'=>'search_words'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('search_words','前台搜索的字段', '可以设置搜索表中的相关字段进行模糊查询,多个字段可用|分割','0','title');";
		}
		if(!M('sysconfig')->find(['field'=>'closehomevercode'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('closehomevercode','前台验证码', '关闭后，登录注册不需要验证码','0','0');";
		}
		if(!M('sysconfig')->find(['field'=>'closeadminvercode'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('closeadminvercode','后台验证码', '关闭后，后台管理员登录不需要验证码','0','0');";
		}
		if(!M('sysconfig')->find(['field'=>'tag_table'])){
			$sql.="INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('tag_table','TAG包含模型', '在tag列表上查询的相关模型,多个模型标识可用|分割,如：article|product','0','article|product');";
		}
		
		if($sql){
			//执行SQL语句
			$x = M()->runSql($sql);
			
		}
		
		//更改某些数据设定
		M('ruler')->update(['fc'=>'Extmolds/index/molds/links'],['fc'=>'Links/index']);
		M('ruler')->update(['fc'=>'Extmolds/addmolds/molds/links'],['fc'=>'Links/addlinks']);
		M('ruler')->update(['fc'=>'Extmolds/editmolds/molds/links'],['fc'=>'Links/editlinks']);
		M('ruler')->update(['fc'=>'Extmolds/copymolds/molds/links'],['fc'=>'Links/copylinks']);
		M('ruler')->update(['fc'=>'Extmolds/deletemolds/molds/links'],['fc'=>'Links/deletelinks']);
		M('ruler')->update(['fc'=>'Extmolds/deleteAll/molds/links'],['fc'=>'Links/deleteAll']);
		M('ruler')->update(['fc'=>'Extmolds/changeType/molds/links'],['fc'=>'Links/changeType']);
		M('ruler')->update(['fc'=>'Extmolds/copyAll/molds/links'],['fc'=>'Links/copyAll']);
		M('ruler')->update(['fc'=>'Extmolds/editOrders/molds/links'],['fc'=>'Links/editOrders']);
		
		$adminlist = M('level_group')->findAll();
		foreach($adminlist as $v){
			$paction = str_replace([',Extmolds/index/molds/links,',',Extmolds/addmolds/molds/links,',',Extmolds/editmolds/molds/links,',',Extmolds/copymolds/molds/links,',',Extmolds/deletemolds/molds/links,',',Extmolds/deleteAll/molds/links,',',Extmolds/changeType/molds/links,',',Extmolds/copyAll/molds/links,',',Extmolds/editOrders/molds/links,'],[',Links/index,',',Links/addlinks,',',Links/editlinks,',',Links/copylinks,',',Links/deletelinks,',',Links/deleteAll,',',Links/changeType,',',Links/copyAll,',',Links/editOrders,'],$v['paction']);
			M('level_group')->update(array('id'=>$v['id']),['paction'=>$paction]);
			
		}
		//插入一些数据
		$sql='';
		if(!M('ruler')->find(['fc'=>'Links/linktype'])){
			$sql .= "INSERT INTO `".DB_PREFIX."ruler` (`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('友情链接分类列表','Links/linktype','77','1','1');";
		}
		if(!M('ruler')->find(['fc'=>'Links/linktypeadd'])){
			$sql .= "INSERT INTO `".DB_PREFIX."ruler` (`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('新增友情链接分类','Links/linktypeadd','77','1','1');";
		}
		if(!M('ruler')->find(['fc'=>'Links/linktypeedit'])){
			$sql .= "INSERT INTO `".DB_PREFIX."ruler` (`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('修改友情链接分类','Links/linktypeedit','77','1','1');";
		}
		if(!M('ruler')->find(['fc'=>'Links/linktypedelete'])){
			$sql .= "INSERT INTO `".DB_PREFIX."ruler` (`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('删除友情链接分类','Links/linktypedelete','77','1','1');";
		}
		if(!M('sysconfig')->find(['field'=>'release_table'])){
			$sql .= "INSERT INTO `".DB_PREFIX."sysconfig` (`field`,`title`,`tip`,`type`,`data`) VALUES ('release_table','允许前台发布模块', '防止数据泄露,填写允许发布模块标识,留空表示不允许发布,多个表可用|分割','0','article|product');";
		}
		
		//权限增加
		if(!M('ruler')->find(['fc'=>'Classtype/changeClass'])){
			$sql.="INSERT INTO `".DB_PREFIX."ruler` (`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('批量修改栏目','Classtype/changeClass','41','0','1');";
		}
		if(!M('ruler')->find(['fc'=>'Index/menu'])){
			$sql.="INSERT INTO `".DB_PREFIX."ruler` (`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('导航设置','Index/menu','32','1','1');";
		}
		if(!M('ruler')->find(['fc'=>'Index/addmenu'])){
			$sql.="INSERT INTO `".DB_PREFIX."ruler` (`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('新增导航','Index/addmenu','32','0','1');";
		}
		if(!M('ruler')->find(['fc'=>'Index/editmenu'])){
			$sql.="INSERT INTO `".DB_PREFIX."ruler` (`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('修改导航','Index/editmenu','32','0','1');";
		}
		if(!M('ruler')->find(['fc'=>'Index/delmenu'])){
			$sql.="INSERT INTO `".DB_PREFIX."ruler` (`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('删除导航','Index/delmenu','32','0','1');";
		}
		if(!M('ruler')->find(['fc'=>'Sys/datacache'])){
			$sql.="INSERT INTO `".DB_PREFIX."ruler` (`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('碎片化','Sys/datacache','39','1','1');";
		}
		if(!M('ruler')->find(['fc'=>'Sys/addcache'])){
			$sql.="INSERT INTO `".DB_PREFIX."ruler` (`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('新增碎片','Sys/addcache','39','0','1');";
		}
		if(!M('ruler')->find(['fc'=>'Sys/editcache'])){
			$sql.="INSERT INTO `".DB_PREFIX."ruler` (`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('修改碎片','Sys/editcache','39','0','1');";
		}
		if(!M('ruler')->find(['fc'=>'Sys/delcache'])){
			$sql.="INSERT INTO `".DB_PREFIX."ruler` (`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('删除碎片','Sys/delcache','39','0','1');";
		}
		if(!M('ruler')->find(['fc'=>'Sys/viewcache'])){
			$sql.="INSERT INTO `".DB_PREFIX."ruler` (`name`,`fc`,`pid`,`isdesktop`,`sys`) VALUES ('预览SQL','Sys/viewcache','39','0','1');";
		}


		//执行SQL语句
		if($sql){
			$x = M()->runSql($sql);
		}
	}
	
	//返回表字段
	private function getTableFields($table){
		if(defined('DB_TYPE') && DB_TYPE=='sqlite'){
			$sql = "pragma table_info(".DB_PREFIX.$table.")";
			
			$list = M()->findSql($sql);
			$fields = [];
			foreach($list as $v){
				$fields[]=$v['name'];
				
			}
		}else{
			$sql = 'SHOW COLUMNS FROM '.DB_PREFIX.$table;
			$list = M()->findSql($sql);
			$isgo = true;
			$fields = [];
			foreach($list as $v){
				$fields[]=$v['Field'];
				
			}
		}
		
		
		
		return $fields;
		
	}
	//返回数据库表
	private function getTableData(){
		if(defined('DB_TYPE') && DB_TYPE=='sqlite'){
			$sql = "select name from sqlite_master where type='table' order by name";
		}else{
			$sql = "SHOW TABLES";
		}
		
		
		$tables = M()->findSql($sql);
		$ttable = array();
		foreach($tables as $value){
			foreach($value as $vv){
				$ttable[] = $vv;
			}
			
		}
		return $ttable;
	}
	
	
	//卸载程序,对新增字段、表等进行删除SQL操作，或者其他操作
	public function uninstall(){
		//下面是删除test表的SQL操作
		
		return true;
	}
	
	//安装页面介绍,操作说明
	public function desc(){
		
		$this->display($this->tpl.'plugins-description.html');
	}
	
	//配置文件,插件相关账号密码等操作
	public  function setconf($plugins){
		//将插件赋值到模板中
		$this->plugins = $plugins;
		$config = json_decode($plugins['config'],1);
		
		
		$this->config = $config;
		$this->display($this->tpl.'plugins-body.html');
	}
	
	//获取插件内提交的数据处理
	public function setconfigdata($data){
		
		M('plugins')->update(['id'=>$data['id']],['config'=>json_encode($data,JSON_UNESCAPED_UNICODE)]);
		setCache('hook',null);//清空hook缓存
		JsonReturn(['code'=>0,'msg'=>'设置成功！']);
	}
	
}




