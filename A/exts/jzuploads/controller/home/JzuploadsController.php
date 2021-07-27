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

namespace Home\plugins;

use FrPHP\lib\Controller;

class JzuploadsController extends Controller
{
	function _init(){

		$webconf = webConf();
		$template = get_template();
		$this->webconf = $webconf;
		$this->template = $template;
		
		if($this->webconf['closeweb']){
			$this->close();
		}
		
		if(isset($_SESSION['terminal'])){
			$classtypedata = $_SESSION['terminal']=='mobile' ? classTypeDataMobile() : classTypeData();
		}else{
			$classtypedata = (isMobile() && $webconf['iswap']==1)?classTypeDataMobile():classTypeData();
		}
		$this->classtypetree = $classtypedata;
		foreach($classtypedata as $k=>$v){
			$classtypedata[$k]['children'] = get_children($v,$classtypedata);
		}
		$this->classtypedata = $classtypedata;
		$this->common = Tpl_style.'common/';
		$this->tpl = Tpl_style.$template.'/';
		$this->frpage = $this->frparam('page',0,1);
		$customconf = get_custom();
		$this->customconf = $customconf;
		if(isset($_SESSION['member'])){
			$this->islogin = true;
			$this->member = $_SESSION['member'];
			if($this->webconf['isopenhomepower']==1){
				if(strpos($_SESSION['member']['paction'],','.APP_CONTROLLER.',')!==false){
				   
				}else{
					$action = APP_CONTROLLER.'/'.APP_ACTION;
					if(strpos($_SESSION['member']['paction'],','.$action.',')==false){
						$ac = M('Power')->find(array('action'=>$action));
						
						if($this->frparam('ajax')){
							JsonReturn(['code'=>1,'msg'=>'您没有【'.$ac['name'].'】的权限！','url'=>U('Home/index')]);
						}
						Error('您没有【'.$ac['name'].'】的权限！',U('Home/index'));
					}
				}
			   
			  
			}
			
			
		}else{
			$this->islogin = false;
		}
		
		
    
    }
	
	function close(){
		if(file_exists(APP_PATH.'static/common/close.html')){
			$this->display('@'.APP_PATH.'static/common/close.html');
			exit;
		}else{
			echo $this->webconf['closetip'];exit;
		}
	}
	
	
	function uploads(){
		$file = $this->frparam('filename',1);
		if(!$file){
			$file = 'file';
		}
		if ($_FILES[$file]["error"] > 0){
		  $data['error'] =  "Error: 上传错误！";
		  $data['code'] = 1000;
		}else{
		  // echo "Upload: " . $_FILES["file"]["name"] . "<br />";
		  // echo "Type: " . $_FILES["file"]["type"] . "<br />";
		  // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
		  // echo "Stored in: " . $_FILES["file"]["tmp_name"];
		  $pix = explode('.',$_FILES[$file]['name']);
		  $pix = end($pix);
		  //检测是否允许前台上传文件
		  if(!$this->webconf['isopenhomeupload']){
			  $data['error'] =  "Error: 已关闭前台上传文件功能";
			  $data['code'] = 1004;
			  JsonReturn($data);
		  }
		 
			$fileType = webConf('fileType');
			if(strpos($fileType,strtolower($pix))===false){
				$data['error'] =  "Error: 文件类型不允许上传！";
				$data['code'] = 1002;
				JsonReturn($data);
			}
			$fileSize = (int)webConf('fileSize');
			if($fileSize!=0 && ($_FILES[$file]["size"]/1024)>$fileSize){
				$data['error'] =  "Error: 文件大小超过网站内部限制！";
				$data['code'] = 1003;
				JsonReturn($data);
			}
		  	if(isset($this->webconf['home_save_path'])){
			  //替换日期事件
				$t = time();
				$d = explode('-', date("Y-y-m-d-H-i-s"));
				$format = $this->webconf['home_save_path'];
				$format = str_replace("{yyyy}", $d[0], $format);
				$format = str_replace("{yy}", $d[1], $format);
				$format = str_replace("{mm}", $d[2], $format);
				$format = str_replace("{dd}", $d[3], $format);
				$format = str_replace("{hh}", $d[4], $format);
				$format = str_replace("{ii}", $d[5], $format);
				$format = str_replace("{ss}", $d[6], $format);
				$format = str_replace("{time}", $t, $format);
				if($format!=''){
					//检查文件是否存在
					if(strpos($format,'/')!==false && !file_exists(APP_PATH.$format)){
						$path = explode('/',$format);
						$path1 = APP_PATH;
						foreach($path as $v){
							if($path1==APP_PATH){
								if(!file_exists($path1.$v)){
									mkdir($path1.$v,0777);
								}
								$path1.=$v;
							}else{
								if(!file_exists($path1.'/'.$v)){
									mkdir($path1.'/'.$v,0777);
								}
								$path1.='/'.$v;
							}
						}
					}else if(!file_exists(APP_PATH.$format)){
						mkdir(APP_PATH.$format,0777);
					}
					$home_save_path = $format;
					
				}else{
					$home_save_path = 'Public/Home';
				}
				
				
			  }else{
				 $home_save_path = 'Public/Home';
			  }
			 
		  
		    $filename =  $home_save_path.'/'.date('Ymd').rand(1000,9999).'.'.$pix;
		  
			if(move_uploaded_file($_FILES[$file]['tmp_name'],$filename)){
				$data['url'] = $filename;
				$data['code'] = 0;
				if(isset($_SESSION['member'])){
					$userid = $_SESSION['member']['id'];
				}else{
					$userid = 0;
				}
				$filesize = round(filesize(APP_PATH.$filename)/1024,2);
				
				
			}else{
				$data['error'] =  "Error: 请检查目录[Public/Home]写入权限";
				$data['code'] = 1001;
				  
			} 

			  
		  
		  }
		  
		  
		//进程存储处理
		$plugins = M('plugins')->find(['filepath'=>'jzuploads','isopen'=>1]);
		if($data['code']==0 && $plugins){
			
			$config = json_decode($plugins['config'],1);
			
			extendFile('/uploads');
			$pic = $data['url'];
			switch($config['save_type']){
				case 1:
				$litpic = $pic;
				break;
				case 2:
				$litpic = $config['upload']['remoteurl'].$pic;
				break;
				case 3:
				$litpic = (new \Alibaba())->save($pic,$config);
				break;
				case 4:
				$litpic = (new \Ftp())->save($pic,$config);
				break;
				case 5:
				$litpic = (new \Qiniu())->save($pic,$config);
				break;
				case 6:
				$litpic = (new \Uomg())->save($pic,$config);
				break;
				case 7:
				$litpic = (new \Upyun())->save($pic,$config);
				break;
				case 8:
				$litpic = (new \Weibo())->save($pic,$config);
				break;
				default:
				$litpic = $pic;
				break;
			}

		    
			if(strpos($litpic,'http')!==false || strpos($litpic,'ftp')!==false){
				
			}else{
				$litpic = '/'.$litpic;
				
			}
			
			M('pictures')->add(['litpic'=>$litpic,'addtime'=>time(),'userid'=>$userid,'size'=>$filesize,'tid'=>$this->frparam('tid',0,0),'filetype'=>strtolower($pix),'molds'=>$this->frparam('molds',1,null),'path'=>'Home']);
			$data['url'] =  $litpic;
		}else if($data['code']==0){
			$data['url'] = '/'.$data['url'];
			M('pictures')->add(['litpic'=>'/'.$filename,'addtime'=>time(),'userid'=>$userid,'size'=>$filesize,'tid'=>$this->frparam('tid',0,0),'filetype'=>strtolower($pix),'molds'=>$this->frparam('molds',1,null),'path'=>'Home']);
		}
		JsonReturn($data);
		  
	}
	
	
	
	

}