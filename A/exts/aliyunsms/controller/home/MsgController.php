<?php

// +----------------------------------------------------------------------
// | JiZhiCMS { 极致CMS，给您极致的建站体验 }  
// +----------------------------------------------------------------------
// | Copyright (c) 2018-2099 http://www.jizhicms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 留恋风 <2581047041@qq.com>
// +----------------------------------------------------------------------
// | Date：2019/11/24
// +----------------------------------------------------------------------


namespace Home\plugins;

use Home\c\CommonController;
use FrPHP\Extend\Page;
use FrPHP\Extend\ArrayPage;


class MsgController extends CommonController
{
	
	function _init(){
		parent::_init();
		$w['filepath'] = 'aliyunsms';
		$w['isopen'] = 1;
		$res = M('plugins')->find($w);
		if(!$res){
			JsonReturn(['code'=>1,'msg'=>'短信插件未开启！']);
		}
		$res['config'] = json_decode($res['config'],1);
		$this->plugin = $res;
		require_once  APP_PATH.'aliysms/api_demo/SmsDemo.php';
		\SmsDemo::setdata($res['config']['AccessKeyId'],$res['config']['accessKeySecret'],$res['config']['SignName'],$res['config']['templatecode']);
		
	
		
	}
	
	function index(){
		
		$yzmname = $this->frparam('codename',1);
		$yzm = $this->frparam('yzm',1);
		if(!$yzm || md5(md5($yzm))!=$_SESSION[$yzmname]){
			
			JsonReturn(['code'=>1,'msg'=>'验证码错误！']);
		}
		
		$tel = $this->frparam('tel',1);
		if(preg_match("/^(13[0-9]|14[579]|15[0-3,5-9]|16[6]|17[0135678]|18[0-9]|19[89])\\d{8}$/",$tel)){  
		     
		}else{  
		  JsonReturn(['code'=>1,'msg'=>'手机号格式错误！']);
		}
		
		
		$code = rand(100000,999999);
		$_SESSION['tel_code'] = $code;
		$response = \SmsDemo::sendSms($tel,$code);
		//echo "发送短信(sendSms)接口返回的结果:\n";
		//print_r($response);
		if($response->Code=='OK'){
			JsonReturn(['code'=>0,'msg'=>'发送成功！']);
			
		}else{
			JsonReturn(['code'=>1,'msg'=>$response->Message]);
		}
		
		
		
		
	}
	

	
	
	
}