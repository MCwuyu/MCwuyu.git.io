<?php

// +----------------------------------------------------------------------
// | JiZhiCMS { 极致CMS，给您极致的建站体验 }  
// +----------------------------------------------------------------------
// | Copyright (c) 2018-2099 http://www.jizhicms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 留恋风 <2581047041@qq.com>
// +----------------------------------------------------------------------
// | Date：2020/12
// +----------------------------------------------------------------------


namespace A\plugins;

use A\c\CommonController;
use FrPHP\lib\Controller;
use FrPHP\Extend\Page;
class TempviewerController extends CommonController
{
	
	function index(){
		
		
		if($this->frparam('ajax')){
			$page = new Page('tpl');
			$sql = ' 1=1 ';
			if($this->frparam('title',1)){
				$sql.=" and (name like '%".$this->frparam('title',1)."%' or field like '%".$this->frparam('title',1)."%') ";
			}
			$data = $page->where($sql)->orderby('id asc')->limit($this->frparam('limit',0,10))->page($this->frparam('page',0,1))->go();
			$pages = $page->pageList();
			$ajaxdata = [];
			foreach($data as $k=>$v){
				
				$v['edit_url'] = U('tempviewer/edittpl',array('id'=>$v['id']));
				$ajaxdata[]=$v;
			}
			$this->pages = $pages;
			
			$this->sum = $page->sum;
			
			JsonReturn(['code'=>0,'data'=>$ajaxdata,'count'=>$page->sum]);
			
		}
		
		$this->display('tpl-list');
	}

	function addtpl(){
		if($this->frparam('ajax')){
			$fields = $this->frparam('field',2);
			$fields_title = $this->frparam('field_title',2);
			$fields_type = $this->frparam('field_type',2);
			if(!$this->frparam('name',1)){
				JsonReturn(['code'=>1,'msg'=>'请填写区块名称！']);
			}
			if(!$this->frparam('fieldname',1)){
				JsonReturn(['code'=>1,'msg'=>'请填写区块标识！']);
			}
			if(M('tpl')->find(['field'=>$this->frparam('fieldname',1)])){
				JsonReturn(['code'=>1,'msg'=>'区块标识已存在！']);
			}
			$r = M('tpl')->add(['name'=>$this->frparam('name',1),'field'=>$this->frparam('fieldname',1)]);
			if(!$r){
				JsonReturn(['code'=>1,'msg'=>'新增区块失败，请重试！']);
			}
			
			
			foreach($fields as $k=>$v){
				$field = $v;
				if($v){
					$w = [];
					$w['pid'] = $r;
					$w['field'] = $v;
					$w['title'] = $fields_title[$k];
					$w['fieldtype'] = $fields_type[$k];
					$f = 'field_'.$v.'_sdata';
					$ff = 'field_value_'.$v;
					$w['data'] = $this->frparam($ff,1);
					$w['addtime'] = time();	
					switch($w['fieldtype']){
						case 1:
						$w['tid'] = $w['data'];
						break;
						case 3:
						case 5:
						case 6:
						case 10:
						
						break;
						case 2:
						$fff = 'field_tid_'.$v;
						$ffff = 'field_orders_'.$v;
						$fffff = 'field_num_'.$v;
						$w['tid'] = $this->frparam($fff,1);
						$w['orders'] = $this->frparam($ffff,1);
						$w['num'] = $this->frparam($fffff,1);
						
						break;
						case 4:
						case 11:
						$f = $v.'_urls';
						$fs = $v.'_des';
						$fdata = $this->frparam($f,2);
						$fsdata = $this->frparam($fs,2);
						if($fdata){
							$pics = [];
							 foreach($fdata as $kk=>$vv){
								$t = $fsdata[$kk] ? $fsdata[$kk] : ' ';
								$pics[$kk] = $vv.'|'.$t;
							 }
							$w['data'] = implode('||',$pics);
						}else{
							$w['data'] = '';
						}
						
						break;
						case 7:
						$w['data'] = $this->frparam($ff,4);
						break;
						case 8:
						$w['sdata'] = $this->frparam($f,1);
						break;
						case 9:
						$w['sdata'] = $this->frparam($f,1);
						$w['data'] = implode('||',$this->frparam($ff,2));
						break;
					}
					
					
					M('tplfields')->add($w);
					
					setCache('tpldata',null);
					
				}
			}
			JsonReturn(['code'=>0,'msg'=>'创建成功，继续创建~','url'=>U('tempviewer/addtpl')]);
			
		}
		
		$this->display('addtpl');
	}
	
	function edittpl(){
		$this->isview = $this->frparam('viewtpl',1);
		$id = $this->frparam('id');
		$data = M('tpl')->find(['id'=>$id]);
		if($id && $data){
			if($this->frparam('ajax')){
				$list = M('tplfields')->findAll(['pid'=>$id]);
				$fields = $this->frparam('field',2);
				$fields_title = $this->frparam('field_title',2);
				$fields_type = $this->frparam('field_type',2);
				
				if(!$this->frparam('name',1)){
					JsonReturn(['code'=>1,'msg'=>'请填写区块名称！']);
				}
				if(!$this->frparam('fieldname',1)){
					JsonReturn(['code'=>1,'msg'=>'请填写区块标识！']);
				}
				$r = M('tpl')->find(['field'=>$this->frparam('fieldname',1)]);
				if($r && $r['id']!=$id){
					JsonReturn(['code'=>1,'msg'=>'区块标识重复！']);
				}
				M('tpl')->update(['id'=>$id],['name'=>$this->frparam('name',1),'field'=>$this->frparam('fieldname',1)]);
				
				$old = [];
				foreach($list as $v){
					if(in_array($v['field'],$fields)){
						$old[]=$v['field'];
						$ky = array_keys($fields,$v['field']);
						$k = $ky[0];
						$w = [];
						
						$w['title'] = $fields_title[$k];
						$w['fieldtype'] = $fields_type[$k];
						$field = $v['field'];
						
						$f = 'field_'.$field.'_sdata';
						$ff = 'field_value_'.$field;
						$w['data'] = $this->frparam($ff,1);
						switch($w['fieldtype']){
							case 1:
							$w['tid'] = $w['data'];
							break;
							case 3:
							case 5:
							case 6:
							case 10:
							
							break;
							case 2:
							$fff = 'field_tid_'.$field;
							$ffff = 'field_orders_'.$field;
							$fffff = 'field_num_'.$field;
							$w['tid'] = $this->frparam($fff,1);
							$w['orders'] = $this->frparam($ffff,1);
							$w['num'] = $this->frparam($fffff,1);
							
							break;
							case 4:
							case 11:
							$f = $field.'_urls';
							$fs = $field.'_des';
							$fdata = $this->frparam($f,2);
							$fsdata = $this->frparam($fs,2);
							if($fdata){
								$pics = [];
								 foreach($fdata as $kk=>$vv){
									$t = $fsdata[$kk] ? $fsdata[$kk] : ' ';
									$pics[$kk] = $vv.'|'.$t;
								 }
								$w['data'] = implode('||',$pics);
							}else{
								$w['data'] = '';
							}
							
							break;
							case 7:
							$w['data'] = $this->frparam($ff,4);
							break;
							case 8:
							$w['sdata'] = $this->frparam($f,1);
							break;
							case 9:
							$w['sdata'] = $this->frparam($f,1);
							$w['data'] = implode('||',$this->frparam($ff,2));
							break;
						}
						
						
						
						M('tplfields')->update(['id'=>$v['id']],$w);
						
						
					}else{
						M('tplfields')->delete(['id'=>$v['id']]);
					}
					
					
				}
				
				foreach($fields as $v){
					if(!in_array($v,$old) && $v){
						$ky = array_keys($fields,$v);
						$k = $ky[0];
						$w = [];
						$w['pid'] = $id;
						$w['field'] = $v;
						$w['title'] = $fields_title[$k];
						$w['fieldtype'] = $fields_type[$k];
						
						$f = 'field_'.$v.'_sdata';
						$ff = 'field_value_'.$v;
						$w['data'] = $this->frparam($ff,1);
						$w['addtime'] = time();	
						switch($w['fieldtype']){
							case 1:
							$w['tid'] = $w['data'];
							break;
							case 3:
							case 5:
							case 6:
							case 10:
							
							break;
							case 2:
							$fff = 'field_tid_'.$v;
							$ffff = 'field_orders_'.$v;
							$fffff = 'field_num_'.$v;
							$w['tid'] = $this->frparam($fff,1);
							$w['orders'] = $this->frparam($ffff,1);
							$w['num'] = $this->frparam($fffff,1);
							
							break;
							case 4:
							case 11:
							$f = $v.'_urls';
							$fs = $v.'_des';
							$fdata = $this->frparam($f,2);
							$fsdata = $this->frparam($fs,2);
							if($fdata){
								$pics = [];
								 foreach($fdata as $kk=>$vv){
									$t = $fsdata[$kk] ? $fsdata[$kk] : ' ';
									$pics[$kk] = $vv.'|'.$t;
								 }
								$w['data'] = implode('||',$pics);
							}else{
								$w['data'] = '';
							}
							
							break;
							case 7:
							$w['data'] = $this->frparam($ff,4);
							break;
							case 8:
							$w['sdata'] = $this->frparam($f,1);
							break;
							case 9:
							$w['sdata'] = $this->frparam($f,1);
							$w['data'] = implode('||',$this->frparam($ff,2));
							break;
						}
							
							
						
						
						M('tplfields')->add($w);
					}
				}
				setCache('tpldata',null);
				JsonReturn(['code'=>0,'msg'=>'更新成功！']);
			}
			$this->data = $data;
			$this->display('edittpl');
			
			
		}else{
			if($this->frparam('ajax')){
				JsonReturn(['code'=>1,'msg'=>'链接错误']);
			}else{
				Error('链接错误');
			}
			
			
		}
		
	}
	
	function deltpl(){
		
		$id = $this->frparam('id');
		$data = M('tpl')->find(['id'=>$id]);
		if($id && $data){
			M('tpl')->delete(['id'=>$id]);
			M('tplfields')->delete(['pid'=>$id]);
			setCache('tpldata',null);
			JsonReturn(['code'=>0,'msg'=>'操作成功！']);
		}else{
			JsonReturn(['code'=>1,'msg'=>'链接错误！']);
		}
		
	}
	
	function viewtpl(){
		$this->display('viewtpl');
	}

	function delall(){
		$data = $this->frparam('data',1);
		if($data!=''){
			if(M('tpl')->delete('id in('.$data.')')){
				M('tplfields')->delete(" pid in(".$data.") ");
				setCache('tpldata',null);
				JsonReturn(array('code'=>0,'msg'=>'批量删除成功！'));
				
			}else{
				JsonReturn(array('code'=>1,'msg'=>'批量操作失败！'));
			}
		}
	}
	
	
	
}