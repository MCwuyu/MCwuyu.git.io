<?php

// +----------------------------------------------------------------------
// | JiZhiCMS { 极致CMS，给您极致的建站体验 }  
// +----------------------------------------------------------------------
// | Copyright (c) 2018-2099 http://www.jizhicms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 留恋风 <2581047041@qq.com>
// +----------------------------------------------------------------------
// | Date：2019/01-2019/02
// +----------------------------------------------------------------------

namespace A\plugins;

use FrPHP\lib\Controller;

class JzuploadsController extends Controller
{
	function _init(){
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

	  
	  $this->admin = $_SESSION['admin'];
	  
	  $webconf = webConf();
	  $template = get_template();
	  $this->webconf = $webconf;
	  $this->template = $template;
	  $this->tpl = Tpl_style.$template.'/';
	  $customconf = get_custom();
	  $this->customconf = $customconf;
	  $this->classtypetree =  get_classtype_tree();
	  $classtypedata = (isMobile() && $webconf['iswap']==1)?classTypeDataMobile():classTypeData();
	  foreach($classtypedata as $k=>$v){
		$classtypedata[$k]['children'] = get_children($v,$classtypedata);
	  }
	  $this->classtypedata = $classtypedata;

	  if($_SESSION['admin']['isadmin']!=1){
			$tids = $_SESSION['admin']['tids'];
			foreach ($this->classtypetree as $k => $v) {
				if($v['pid']==0){
					if(strpos($_SESSION['admin']['tids'],','.$v['id'].',')!==false){
						$children = get_children($v,$this->classtypetree,5);
						foreach($children as $vv){
							if(strpos($_SESSION['admin']['tids'],','.$vv['id'].',')===false){
								$tids .= ','.$vv['id'].',';
							}
						}
					}
				}
				
			}
			
		}else{
			$tids = '0';
		}
		$this->tids = $tids;
    
    }
	
	function uploads(){
		if ($_FILES["file"]["error"] > 0){
		  $data['error'] =  "Error: " . $_FILES["file"]["error"];
		  $data['code'] = 1000;
		}else{
		  // echo "Upload: " . $_FILES["file"]["name"] . "<br />";
		  // echo "Type: " . $_FILES["file"]["type"] . "<br />";
		  // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
		  // echo "Stored in: " . $_FILES["file"]["tmp_name"];
		  $pix = explode('.',$_FILES['file']['name']);
		  $pix = end($pix);
		  
		  
		    $fileType = $this->webconf['fileType'];
			if(strpos($fileType,strtolower($pix))===false){
				$data['error'] =  "Error: 文件类型不允许上传！";
				$data['code'] = 1002;
				JsonReturn($data);
			}
			$fileSize = (int)webConf('fileSize');
			if($fileSize!=0 && ($_FILES["file"]["size"]/1024)>$fileSize){
				$data['error'] =  "Error: 文件大小超过网站内部限制！";
				$data['code'] = 1003;
				JsonReturn($data);
			}
		  if(isset($this->webconf['admin_save_path'])){
			  //替换日期事件
				$t = time();
				$d = explode('-', date("Y-y-m-d-H-i-s"));
				$format = $this->webconf['admin_save_path'];
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
					$admin_save_path = $format;
					
				}else{
					$admin_save_path = 'Public/Admin';
				}
				
				
		  }else{
			 $admin_save_path = 'Public/Admin';
		  }
		  $filename =  $admin_save_path.'/'.date('Ymd').rand(1000,9999).'.'.$pix;
		  $filename_x =  $admin_save_path.'/'.date('Ymd').rand(1000,9999).'.'.$pix;
		  
			if(move_uploaded_file($_FILES["file"]['tmp_name'],$filename)){
			
				if( (strtolower($pix)=='png' && $this->webconf['ispngcompress']==1) || strtolower($pix)=='jpg' || strtolower($pix)=='jpeg'){
					$imagequlity = (int)$this->webconf['imagequlity'];
					if($imagequlity!=100){
						$image = new \compressimage($filename);
    					$image->percent = 1;
						$image->ispngcompress = $this->webconf['ispngcompress'];
    					$image->quality = $imagequlity=='' ? 75 : $imagequlity;
    					$image->openImage();
    					$image->thumpImage();
    					//$image->showImage();
    					unlink($filename);
    					$image->saveImage($filename_x);
    					$filename = $filename_x;
					}
				   
				}
				
				if( (strtolower($pix)=='png' || strtolower($pix)=='jpg' || strtolower($pix)=='jpeg') && $this->webconf['iswatermark']==1 && $this->webconf['watermark_file']!='' && !empty($this->webconf['watermark_file'])){
					if(file_exists(APP_PATH.$this->webconf['watermark_file'])){
						watermark($filename,APP_PATH.$this->webconf['watermark_file'],$this->webconf['watermark_t'],$this->webconf['watermark_tm']);
					}
					
				}
				$data['url'] = $filename;
				$data['code'] = 0;
				$filesize = round(filesize(APP_PATH.$filename)/1024,2);
				
				
				
			}else{
				$data['error'] =  "Error: 请检查目录[Public/Admin]写入权限";
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
				
				break;
			}
			
			if(strpos($litpic,'http')!==false || strpos($litpic,'ftp')!==false){
				
			}else{
				$litpic = '/'.$litpic;
				
			}
			
				M('pictures')->add(['litpic'=>$litpic,'addtime'=>time(),'userid'=>$_SESSION['admin']['id'],'size'=>$filesize,'filetype'=>strtolower($pix),'tid'=>$this->frparam('tid',0,0),'molds'=>$this->frparam('molds',1,null)]);
			$data['url'] =  $litpic;
		}else if($data['code']==0){
			$data['url'] = '/'.$data['url'];
				M('pictures')->add(['litpic'=>'/'.$filename,'addtime'=>time(),'userid'=>$_SESSION['admin']['id'],'size'=>$filesize,'filetype'=>strtolower($pix),'tid'=>$this->frparam('tid',0,0),'molds'=>$this->frparam('molds',1,null)]);
		}
		  JsonReturn($data);
		  
	}
	
	
	
	

}