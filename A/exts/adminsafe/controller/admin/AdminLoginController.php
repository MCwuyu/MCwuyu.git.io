<?php

// +----------------------------------------------------------------------
// | JiZhiCMS { 极致CMS，给您极致的建站体验 }  
// +----------------------------------------------------------------------
// | Copyright (c) 2018-2099 http://www.jizhicms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 留恋风 <2581047041@qq.com>
// +----------------------------------------------------------------------
// | Date：2019/09/06
// +----------------------------------------------------------------------


namespace A\plugins;

use A\c\CommonController;
use FrPHP\lib\Controller;

class AdminLoginController extends Controller
{
	

	function checklogin(){
		
		$config = M('plugins')->getField(['filepath'=>'adminsafe'],'config');
		$adminsafe = json_decode($config,1);
		//检测是否存在adminsafe安全秘钥
		if($adminsafe['password']){
			if(!isset($_SESSION['adminsafe'])){
				$exp = substr(REQUEST_URI,strlen(APP_URL));
				//获取链接是否存在安全秘钥
				if($exp=='?'.$adminsafe['password']){
					$_SESSION['adminsafe'] = $adminsafe['password'];
					header('location:'.get_domain().APP_URL);exit;
				}else{
					echo '<h1>'.$adminsafe['msg'].'</h1>';
					exit;
				}
				
				
			}else{
				
				if($adminsafe['password']!=$_SESSION['adminsafe']){
					echo '<h1>'.$adminsafe['msg'].'</h1>';
					exit;
				}
			}
		}
		
		
	}
	
}