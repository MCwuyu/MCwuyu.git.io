<?php

// +----------------------------------------------------------------------
// | JiZhiCMS { 极致CMS，给您极致的建站体验 }  
// +----------------------------------------------------------------------
// | Copyright (c) 2018-2099 http://www.jizhicms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 留恋风 <2581047041@qq.com>
// +----------------------------------------------------------------------
// | Date：2019/08
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
		//移动文件到根目录
		$dir = APP_PATH.APP_HOME.'/exts/filemanage/fileManage';
		if(!file_exists(APP_PATH.'fileManage')){
			mkdir(APP_PATH.'fileManage',0777);
		}
		$from = $dir;
		$to = APP_PATH.'fileManage';
		$this->removeFile($from,$to);
		
		
		return true;
		
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
	
	
	//卸载程序,对新增字段、表等进行删除SQL操作，或者其他操作
	public function uninstall(){
		//下面是删除test表的SQL操作
		if(is_dir(APP_PATH.'fileManage')){
			if($handle = opendir(APP_PATH.'fileManage')){

			  while (false !== ($file = readdir($handle))){
				 if($file!='.' && $file!='..'){
					
					unlink(APP_PATH.'fileManage/'.$file);
				 }
			  }
			  closedir($handle);
			}
		}
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
		$this->config = json_decode($plugins['config'],1);
		
		$this->display($this->tpl.'plugins-body.html');
	}
	
	//获取插件内提交的数据处理
	public function setconfigdata($data){
		
		
		$w['password'] = format_param($data['password'],1);
		
		
		//不允许设置123456
		if($w['password']=='123456'){
			JsonReturn(['code'=>1,'msg'=>'密码不允许设置成123456！']);
		}
		//更改密码文件
		//删除123456.txt
		$r = file_put_contents(APP_PATH.'fileManage/'.$w['password'].'.txt',1);
		if(!$r){
			JsonReturn(['code'=>1,'msg'=>'没有创建文件权限！']);
		}
		M('plugins')->update(['id'=>$data['id']],['config'=>json_encode($w,JSON_UNESCAPED_UNICODE)]);
		
		JsonReturn(['code'=>0,'msg'=>'设置成功！']);
	}
	
}




