<?php

// +----------------------------------------------------------------------
// | JiZhiCMS { 极致CMS，给您极致的建站体验 }  
// +----------------------------------------------------------------------
// | Copyright (c) 2018-2099 http://www.jizhicms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 留恋风 <2581047041@qq.com>
// +----------------------------------------------------------------------
// | Date：2020/01
// +----------------------------------------------------------------------

namespace A\exts;

use FrPHP\lib\Controller;
use FrPHP\Extend\Page;
class PluginsController extends Controller {
	
	
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
		//下面是新增test表的SQL操作
		$dir = APP_PATH.APP_HOME.'/exts/jzdesign/file';
		$from = $dir.'/';
		$to = APP_PATH.APP_HOME.'/t/tpl/';
		$this->removeFile($from,$to);
		$sql = '';
		$tables = $this->getTableData();
		if(defined('DB_TYPE') && DB_TYPE=='sqlite'){
			if(!in_array(DB_PREFIX.'tpl',$tables)){
				$sql.="CREATE TABLE `".DB_PREFIX."tpl` (
					  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
					  `name` varchar(255) DEFAULT NULL,
					  `field` varchar(255) DEFAULT NULL
					);";
				
			}
			if(!in_array(DB_PREFIX.'tplfields',$tables)){
				$sql.="CREATE TABLE `".DB_PREFIX."tplfields` (
					  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
					  `pid` int(11) NOT NULL DEFAULT '0',
					  `title` varchar(255) DEFAULT NULL,
					  `field` varchar(255) DEFAULT NULL,
					  `tid` int(11) NOT NULL DEFAULT '0',
					  `num` int(11) NOT NULL DEFAULT '0',
					  `orders` tinyint(1) NOT NULL DEFAULT '1',
					  `fieldtype` int(11) NOT NULL DEFAULT '0',
					  `data` text DEFAULT NULL,
					  `sdata` text DEFAULT NULL,
					  `addtime` int(11) NOT NULL DEFAULT '0'
					) ;";
				
			}
		}else{
			if(!in_array(DB_PREFIX.'tpl',$tables)){
				$sql.="CREATE TABLE `".DB_PREFIX."tpl` (
					  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
					  `name` varchar(255) DEFAULT NULL,
					  `field` varchar(255) DEFAULT NULL,
					  PRIMARY KEY (`id`)
					) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
				
			}
			if(!in_array(DB_PREFIX.'tplfields',$tables)){
				$sql.="CREATE TABLE `".DB_PREFIX."tplfields` (
					  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
					  `pid` int(11) NOT NULL DEFAULT '0',
					  `title` varchar(255) DEFAULT NULL,
					  `field` varchar(255) DEFAULT NULL,
					  `tid` int(11) NOT NULL DEFAULT '0',
					  `num` int(11) NOT NULL DEFAULT '0',
					  `orders` tinyint(1) NOT NULL DEFAULT '1',
					  `fieldtype` int(11) NOT NULL DEFAULT '0',
					  `data` text DEFAULT NULL,
					  `sdata` text DEFAULT NULL,
					  `addtime` int(11) NOT NULL DEFAULT '0',
					  PRIMARY KEY (`id`)
					) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
				
			}
		}
		
	
		if($sql!=''){
			M()->runSql($sql);
		}
		
		if(!M('ruler')->find(['fc'=>'Tempviewer'])){
			$w = [];
			$w['name'] = '模板助手';
			$w['fc'] = 'Tempviewer';
			$w['sys'] = 0;
			$w['isdesktop'] = 0;
			$r = M('ruler')->add($w);
			if($r){
				$w = [];
				$w['pid'] = $r;
				$w['name'] = '区块列表';
				$w['fc'] = 'Tempviewer/index';
				$w['sys'] = 0;
				$w['isdesktop'] = 1;
				$n1 = M('ruler')->add($w);
				$w['name'] = '模板设计';
				$w['fc'] = 'Tempviewer/viewtpl';
				$w['isdesktop'] = 1;
				$n2 = M('ruler')->add($w);
				$w['name'] = '新增区块';
				$w['fc'] = 'Tempviewer/addtpl';
				$w['isdesktop'] = 0;
				M('ruler')->add($w);
				$w['name'] = '修改区块';
				$w['fc'] = 'Tempviewer/edittpl';
				$w['isdesktop'] = 0;
				M('ruler')->add($w);
				$w['name'] = '删除区块';
				$w['fc'] = 'Tempviewer/deltpl';
				$w['isdesktop'] = 0;
				M('ruler')->add($w);
				$w['name'] = '批量删除区块';
				$w['fc'] = 'Tempviewer/delall';
				$w['isdesktop'] = 0;
				M('ruler')->add($w);
				
				
				//写入左侧导航栏
				$desktop = M('Layout')->find(array('gid'=>$_SESSION['admin']['gid']));
				if(!$desktop){
					$desktop = M('Layout')->find(array('isdefault'=>1));
				}
				$left_layout = json_decode($desktop['left_layout'],1);
				$left_layout[]=[
					"name" => "模板助手",
					"icon" => '&amp;#xe87f;',
					"nav" => array($n1,$n2)
				];
				$left_layout = json_encode($left_layout,JSON_UNESCAPED_UNICODE);
				M('layout')->update(['id'=>$desktop['id']],['left_layout'=>$left_layout]);
			}
		}
		
		
		return true;
		
	}
	
	//卸载程序,对新增字段、表等进行删除SQL操作，或者其他操作
	public function uninstall(){
		$r = M('ruler')->find(['fc'=>'Tempviewer']);
		if($r){
			M('ruler')->delete(['id'=>$r['id']]);
			M('ruler')->delete(['pid'=>$r['id']]);
		}
		// $sql = 'DROP TABLE '.DB_PREFIX.'tplfields;DROP TABLE '.DB_PREFIX.'tpl;';
		// M()->runSql($sql);
		return true;
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
		//批量转移文件
	private function removeFile($from,$to){
		//移动后台插件控制器
		$sourcefile = $from;
		$target = $to;
		if(is_dir($sourcefile) && is_dir($target)){
			if (false != ($handle = opendir ( $sourcefile ))) {
				
				while ( false !== ($file = readdir ( $handle )) ) {
					//去掉"“.”、“..”以及带“.xxx”后缀的文件
					if ($file != "." && $file != ".." && !is_dir($sourcefile.'/'.$file) ) {
						$fs = $sourcefile.'/'.$file;
						$ft = $target.'/'.$file;
						 //备份源文件以防更新覆盖
						if(file_exists($sourcefile.'/back/'.$file)){
							copy($ft,  $sourcefile.'/back/'.$file);
						}
						
						$r = $this->file2dir($fs,$ft);
						if(!$r){
							JsonReturn(array('code'=>1,'msg'=>'文件转移失败！sourcefile:'.$fs.' targetfile:'.$ft));
						}
					}
				}
				//关闭句柄
				closedir ( $handle );
			}
		
		}
				
	}
	
	// 原目录，复制到的目录
	function recurse_copy($src,$dst) {  
	 
		$dir = opendir($src);
		@mkdir($dst);
		while(false !== ( $file = readdir($dir)) ) {
			if (( $file != '.' ) && ( $file != '..' )) {
				if ( is_dir($src . '/' . $file) ) {
					$this->recurse_copy($src . '/' . $file,$dst . '/' . $file);
				}
				else {
					copy($src . '/' . $file,$dst . '/' . $file);
				}
			}
		}
		closedir($dir);
	}
	//复制文件并转移
	function file2dir($sourcefile, $filename){
		 if( !file_exists($sourcefile)){
			 return false;
		 }
		 //$filename = basename($sourcefile);
		
		 return copy($sourcefile,  $filename);
	}
	
	//安装页面介绍,操作说明
	public function desc(){
		
		$this->display($this->tpl.'plugins-description.html');
	}
	
	//配置文件,插件相关账号密码等操作
	public  function setconf($plugins){
		//将插件赋值到模板中
		$this->plugins = $plugins;
		$this->config = json_decode($plugins['config'],1);
		
		$this->display($this->tpl.'plugins-body.html');
	}
	
	//获取插件内提交的数据处理
	public function setconfigdata($data){
		
		M('plugins')->update(['id'=>$data['id']],['config'=>json_encode($data,JSON_UNESCAPED_UNICODE)]);
		setCache('hook',null);//清空hook缓存
		
		JsonReturn(['code'=>0,'msg'=>'设置成功！']);
	}
	
}




