<?php

// +----------------------------------------------------------------------
// | JiZhiCMS { 极致CMS，给您极致的建站体验 }  
// +----------------------------------------------------------------------
// | Copyright (c) 2018-2099 http://www.jizhicms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 留恋风 <2581047041@qq.com>
// +----------------------------------------------------------------------
// | Date：2020/05/05
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
		//注册到hook里面
		$w['module'] = 'A';
//所在的模块
		$w['namespace'] = 'A';
//hook所在的空间命名(v1.6.4已废弃)
		$w['controller'] = 'Common';
//hook所在的控制器名（缩写）
		$w['action'] = 'uploads';
//hook所在的方法
		$w['all_action'] = 0;//是否该控制器所有方法都执行此hook
		$w['hook_namespace'] = 'A';

//插件控制器所在的空间命名(v1.6.4已废弃)
		$w['hook_controller'] = 'Jzuploads';
//插件控制器名
		$w['hook_action'] = 'uploads';
//插件所执行的方法
		$w['plugins_name'] = 'jzuploads';//插件文件夹
		$w['addtime'] = time();
		M('hook')->add($w);
		
		$w['module'] = 'Home';
//所在的模块
		$w['namespace'] = 'Home';
//hook所在的空间命名(v1.6.4已废弃)
		$w['controller'] = 'Common';
//hook所在的控制器名（缩写）
		$w['action'] = 'uploads';
//hook所在的方法
		$w['all_action'] = 0;//是否该控制器所有方法都执行此hook
		$w['hook_namespace'] = 'Home';

//插件控制器所在的空间命名(v1.6.4已废弃)
		$w['hook_controller'] = 'Jzuploads';
//插件控制器名
		$w['hook_action'] = 'uploads';
//插件所执行的方法
		$w['plugins_name'] = 'jzuploads';//插件文件夹
		$w['addtime'] = time();
		M('hook')->add($w);
		setCache('hook',null);
		
		$dir = APP_PATH.'A/exts/jzuploads/file';
		//移动文件
		//检查源码版本
		if(defined('DB_TYPE')){
			//sqlite
			if(file_exists(APP_PATH.'static/common/user/uedit/php/Uploader.class.php')){
				copy(APP_PATH.'static/common/user/uedit/php/Uploader.class.php',$dir.'/sqlite/back/Uploader.class.php');
				copy($dir.'/sqlite/Uploader.class.php',APP_PATH.'static/common/user/uedit/php/Uploader.class.php');
			}
			
			
		}else{
			//mysql
			if(file_exists(APP_PATH.'static/common/user/uedit/php/Uploader.class.php')){
				copy(APP_PATH.'static/common/user/uedit/php/Uploader.class.php',$dir.'/mysql/back/Uploader.class.php');
				copy($dir.'/mysql/Uploader.class.php',APP_PATH.'static/common/user/uedit/php/Uploader.class.php');
			}
			
		}
		
		
		return true;
		
	}
	
	//卸载程序,对新增字段、表等进行删除SQL操作，或者其他操作
	public function uninstall(){
		//下面是删除test表的SQL操作
		M('hook')->delete(['plugins_name'=>'jzuploads']);
		//转移文件
		if(defined('DB_TYPE')){
			copy($dir.'/sqlite/back/Uploader.class.php',APP_PATH.'static/common/user/uedit/php/Uploader.class.php');
		}else{
			copy($dir.'/mysql/back/Uploader.class.php',APP_PATH.'static/common/user/uedit/php/Uploader.class.php');
		}
		
		
		setCache('hook',null);
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
		//清空旧插件数据
		if(!is_array($config['ids']) && strpos($config['ids'],'|')!==false){
			$config['ids'] = '';
			M('plugins')->update(['id'=>$plugins['id']],['config'=>json_encode($config,JSON_UNESCAPED_UNICODE)]);
		}
		
		$this->config = $config;
		$this->display($this->tpl.'plugins-body.html');
	}
	
	//获取插件内提交的数据处理
	public function setconfigdata($data){
		$config = [];
		$config = $data;
		
		M('plugins')->update(['id'=>$data['id']],['config'=>json_encode($config,JSON_UNESCAPED_UNICODE)]);
		JsonReturn(['code'=>0,'msg'=>'设置成功！']);
	}
	
}




