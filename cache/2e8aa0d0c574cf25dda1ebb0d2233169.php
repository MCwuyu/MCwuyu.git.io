<?php if (!defined('CORE_PATH')) exit();?><!DOCTYPE html>
<html>
    
    <head>
       <meta charset="UTF-8">
        	<title><?php echo webConf('web_name') ?></title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
	<meta name="author" content="留恋风,2581047041@qq.com"> 
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo Tpl_style ?>/style/css/font.css">
	<link rel="stylesheet" href="<?php echo Tpl_style ?>/style/css/xadmin.css?v=1">
	<link rel="stylesheet" href="<?php echo Tpl_style ?>/style/css/style.css">
    <script type="text/javascript" src="<?php echo Tpl_style ?>/style/js/jquery.min.js"></script>
    <script src="<?php echo Tpl_style ?>/style/lib/layui/layui.js?v=123" charset="utf-8"></script>
	<script type="text/javascript" src="<?php echo Tpl_style ?>/style/js/xadmin.js"></script>
	
	<?php  
	
	switch($webconf['admintpl']){
		case 'tpl':
		echo '<script type="text/javascript" src="'.Tpl_style.'/style/js/target_page.js"></script>';
		break;
		case 'default':
		echo '<script type="text/javascript" src="'.Tpl_style.'/style/js/target_window.js"></script>';
		break;
	}
	
	
	 ?>

		<style>
		.layui-form-item .layui-input-inline {
			width: 210px;
		}
		</style>
    </head>
    
    <body>
	 <div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>首页</cite></a>
              <a><cite>系统扩展</cite></a>
              <a><cite>模块管理</cite></a>
              <a><cite>字段管理</cite></a>
			  <a><cite>修改字段</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="iconfont" style="line-height:30px">&#xe6aa;</i></a>
        </div>
        <div class="x-body">
            <form class="layui-form layui-form-pane" >
			<input type="hidden" name="go" value="1" />
			<input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
			<input type="hidden" name="molds" value="<?php echo $data['molds'] ?>" />
			
			
			<div class="layui-tab">
			  <ul class="layui-tab-title">
				<li class="layui-this">基本信息</li>
				<?php if($data['molds']=='level'){ ?>
				<li>角色绑定</li>
				<?php }else{ ?>
				<li>栏目绑定</li>
				<?php } ?>
				
			  </ul>
			  <div class="layui-tab-content">
				<div class="layui-tab-item layui-show">
				 <div class="layui-form-item">
                    <label for="fieldname" class="layui-form-label">
                        <span class="x-red">*</span>字段名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="fieldname" value="<?php echo $data['fieldname'] ?>"  name="fieldname" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>
					<div class="layui-form-mid layui-word-aux" >
					  简短的名称
				    </div>
                </div>
				
				 <div class="layui-form-item">
                    <label for="field" class="layui-form-label">
                        <span class="x-red">*</span>字段标识
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="field"  value="<?php echo $data['field'] ?>" name="field" 
                        autocomplete="off" required="" lay-verify="required" class="layui-input">
                    </div>
					<div class="layui-form-mid layui-word-aux" >
					  只能英文字母[或者后面+数字]，必须含有英文字母，小写字母，简短
				    </div>
                </div>
				<div class="layui-form-item" pane>
                    <label for="fieldtxt" class="layui-form-label">
                        <span class="x-red">*</span>字段类型
                    </label>
                    <div class="layui-input-block">
					  <table class="layui-table">
						<tbody>
						  <tr>
							<td>选择</div></td>
							<td>类型</div></td>
							<td>长度</div></td>
							<td>内容</div></td>
							<td>说明</td>
						
						  </tr>
						  <tr>
							<td><input type="radio" name="fieldtype" <?php if($data['fieldtype']==1){ ?> checked <?php } ?> value="1" /></div></td>
							<td>字符串<br/>varchar</div></td>
							<td><input type="text" class="layui-input" name="fieldlong_1" value="<?php if($data['fieldtype']==1){ ?><?php echo $data['fieldlong'] ?><?php }else{ ?>255<?php } ?>" ></div></td>
							<td>无</div></td>
							<td>简短的一句话录入内容，价格小数也是这个属性</td>
						  </tr>
						  <tr>
							<td><input type="radio" name="fieldtype" <?php if($data['fieldtype']==2){ ?> checked <?php } ?> value="2" /></div></td>
							<td>字符串<br/>varchar</div></td>
							<td><input type="text" class="layui-input" name="fieldlong_2"  value="<?php if($data['fieldtype']==2){ ?><?php echo $data['fieldlong'] ?><?php }else{ ?>500<?php } ?>"></div></td>
							<td>无</div></td>
							<td>内容简短，需要文本框录入</td>
						  </tr>
						  <tr>
							<td><input type="radio" name="fieldtype" <?php if($data['fieldtype']==3){ ?> checked <?php } ?> value="3" /></div></td>
							<td>字符串<br/>txt</div></td>
							<td>不限</div></td>
							<td>无</div></td>
							<td>内容很多，需要编辑器录入</td>
						   </tr>
						   <tr>
							<td><input type="radio" name="fieldtype" <?php if($data['fieldtype']==4){ ?> checked <?php } ?> value="4" /></div></td>
							<td>数字<br/>int</div></td>
							<td><input type="text" class="layui-input" name="fieldlong_4"  value="<?php if($data['fieldtype']==4){ ?><?php echo $data['fieldlong'] ?><?php }else{ ?>11<?php } ?>"></div></td>
							<td>无</div></td>
							<td>只能填写数字，长度不能超过11位</td>
						   </tr>
						   <tr>
							<td><input type="radio" name="fieldtype" <?php if($data['fieldtype']==14){ ?> checked <?php } ?> value="14" /></div></td>
							<td>小数<br/>decimal</div></td>
							<td><input type="text" class="layui-input" name="fieldlong_14" value="<?php if($data['fieldtype']==14){ ?><?php echo $data['fieldlong'] ?><?php }else{ ?>10,2<?php } ?>"></div></td>
							<td><input type="text" class="layui-input" name="body_14" value="<?php if($data['fieldtype']==14){ ?><?php echo $data['body'] ?><?php }else{ ?>0.00<?php } ?>"></div></div></td>
							<td>金钱，小数等，保留2位</td>
						   </tr>
						    <tr>
							<td><input type="radio" name="fieldtype" <?php if($data['fieldtype']==11){ ?> checked <?php } ?> value="11" /></div></td>
							<td>时间<br/>int</div></td>
							<td><input type="text" class="layui-input" name="fieldlong_11"  value="<?php if($data['fieldtype']==11){ ?><?php echo $data['fieldlong'] ?><?php }else{ ?>11<?php } ?>"></div></td>
							<td>无</div></td>
							<td>只能填写数字，长度不能超过11位</td>
						   </tr>
						   <tr>
							<td><input type="radio" name="fieldtype" <?php if($data['fieldtype']==5){ ?> checked <?php } ?> value="5" /></div></td>
							<td>单图片<br/>varchar</div></td>
							<td><input type="text" class="layui-input" name="fieldlong_5" value="<?php if($data['fieldtype']==5){ ?><?php echo $data['fieldlong'] ?><?php }else{ ?>255<?php } ?>"></div></td>
							<td>无</div></td>
							<td>一张图片</td>
						   </tr>
						   <tr>
							<td><input type="radio" name="fieldtype" <?php if($data['fieldtype']==6){ ?> checked <?php } ?> value="6" /></div></td>
							<td>多图片<br/>text</div></td>
							<td>不限</div></td>
							<td>无</div></td>
							<td>多个图片</td>
						   </tr>
						   <tr>
							<td><input type="radio" name="fieldtype" <?php if($data['fieldtype']==7){ ?> checked <?php } ?> value="7" /></div></td>
							<td>单选<br/>varchar</div></td>
							<td><input type="text" class="layui-input" name="fieldlong_7" value="<?php if($data['fieldtype']==7){ ?><?php echo $data['fieldlong'] ?><?php }else{ ?>500<?php } ?>"></div></td>
							<td><textarea placeholder="选项1=值1,选项2=值2"  name="body_7" class="layui-textarea"><?php if($data['fieldtype']==7){ ?><?php echo $data['body'] ?><?php }else{ ?><?php } ?></textarea></div></td>
							<td>单项选择，select类型，如：选项1=值1,选项2=值2</td>
						   </tr>
						   <tr>
							<td><input type="radio" name="fieldtype" <?php if($data['fieldtype']==12){ ?> checked <?php } ?> value="12" /></div></td>
							<td>单选<br/>varchar</div></td>
							<td><input type="text" class="layui-input" name="fieldlong_12" value="<?php if($data['fieldtype']==12){ ?><?php echo $data['fieldlong'] ?><?php }else{ ?>500<?php } ?>"></div></td>
							<td><textarea placeholder="选项1=值1,选项2=值2"  name="body_12" class="layui-textarea"><?php if($data['fieldtype']==12){ ?><?php echo $data['body'] ?><?php }else{ ?><?php } ?></textarea></div></td>
							<td>单项选择，radio类型，如：选项1=值1,选项2=值2</td>
						   </tr>
						   <tr>
							<td><input type="radio" name="fieldtype" <?php if($data['fieldtype']==8){ ?> checked <?php } ?> value="8" /></div></td>
							<td>多选<br/>varchar</div></td>
							<td><input type="text" class="layui-input" name="fieldlong_8" value="<?php if($data['fieldtype']==8){ ?><?php echo $data['fieldlong'] ?><?php }else{ ?>500<?php } ?>"></div></td>
							<td><textarea placeholder="选项1=值1,选项2=值2"  name="body_8" class="layui-textarea"><?php if($data['fieldtype']==8){ ?><?php echo $data['body'] ?><?php }else{ ?><?php } ?></textarea></div></td>
							<td>多项选择，如：选项1=值1,选项2=值2</td>
						   </tr>
						   <tr>
							<td><input type="radio" name="fieldtype" <?php if($data['fieldtype']==9){ ?> checked <?php } ?>  value="9" /></div></td>
							<td>单附件<br/>varchar</div></td>
							<td><input type="text" class="layui-input" name="fieldlong_9" value="<?php if($data['fieldtype']==9){ ?><?php echo $data['fieldlong'] ?><?php }else{ ?>255<?php } ?>"></div></td>
							<td>无</div></td>
							<td>一个附件，图片除外</td>
						   </tr>
						   <tr>
							<td><input type="radio" name="fieldtype" <?php if($data['fieldtype']==10){ ?> checked <?php } ?>  value="10" /></div></td>
							<td>多附件<br/>text</div></td>
							<td>不限</div></td>
							<td>无</div></td>
							<td>多个附件，图片除外</td>
						   </tr>
						    <tr>
							<td><input type="radio" name="fieldtype" <?php if($data['fieldtype']==13){ ?> checked <?php } ?> value="13" /></div></td>
							<td>关联模块<br/>int</div></td>
							<td><input type="text" class="layui-input" name="fieldlong_13" value="<?php if($data['fieldtype']==13){ ?><?php echo $data['fieldlong'] ?><?php }else{ ?>2<?php } ?>"></div></td>
							<td>
							<?php if($data['fieldtype']==13){ ?>
							<?php   $vdata = explode(',',$data['body'])  ?>
							<select name="molds_select">
							<?php
		$v_table ='molds';
		$v_w=' 1=1 ';
		$v_order=' id desc ';
		$v_fields=null;
		$v_limit=null;
			if($jzcache){
				$cachestr = md5($v_table.$v_w.$v_order.$v_fields.$v_limit);
				$cachedata = getCache($cachestr);
				if(!$cachedata){
					$v_data = M($v_table)->findAll($v_w,$v_order,$v_fields,$v_limit);
					setCache($cachestr,$v_data,$jzcachetime);
				}
			}else{
				$v_data = M($v_table)->findAll($v_w,$v_order,$v_fields,$v_limit);
			}$v_n=0;foreach($v_data as $v_key=> $v){
			$v_n++;
			if(!array_key_exists('url',$v)){
				
				if($v_table=='classtype'){
					$v['url'] = $classtypedata[$v['id']]['url'];
				}else if($v_table=='message'){
					$v['url'] = U('message/details',['id'=>$v['id']]);
				}else{
					$v['url'] = gourl($v,$v['htmlurl']);
				}
				
			}
			?>
							<option <?php if($vdata[0]==$v['id']){ ?>selected<?php } ?>  value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
							<?php } ?>
							</select>
							<input type="text" placeholder="列表显示字段" class="layui-input" name="molds_list_field" value="<?php echo $vdata[1] ?>">
							<?php }else{ ?>
							<select name="molds_select">
							<?php
		$v_table ='molds';
		$v_w=' 1=1 ';
		$v_order=' id desc ';
		$v_fields=null;
		$v_limit=null;
			if($jzcache){
				$cachestr = md5($v_table.$v_w.$v_order.$v_fields.$v_limit);
				$cachedata = getCache($cachestr);
				if(!$cachedata){
					$v_data = M($v_table)->findAll($v_w,$v_order,$v_fields,$v_limit);
					setCache($cachestr,$v_data,$jzcachetime);
				}
			}else{
				$v_data = M($v_table)->findAll($v_w,$v_order,$v_fields,$v_limit);
			}$v_n=0;foreach($v_data as $v_key=> $v){
			$v_n++;
			if(!array_key_exists('url',$v)){
				
				if($v_table=='classtype'){
					$v['url'] = $classtypedata[$v['id']]['url'];
				}else if($v_table=='message'){
					$v['url'] = U('message/details',['id'=>$v['id']]);
				}else{
					$v['url'] = gourl($v,$v['htmlurl']);
				}
				
			}
			?>
							<option  value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
							<?php } ?>
							</select>
							<input type="text" placeholder="列表显示字段" class="layui-input" name="molds_list_field" value="">
							<?php } ?>
							
							</div></td>
							<td>关联模块内容ID</td>
						   </tr>
						    <tr>
							<td><input type="radio" name="fieldtype" <?php if($data['fieldtype']==15){ ?> checked <?php } ?> value="15" /></div></td>
							<td>多行录入<br/>txt</div></td>
							<td>不限</div></td>
							<td>无</div></td>
							<td>可以在页面动态新增内容输入框</td>
						   </tr>
						   
						</tbody>
					  </table>
				    </div>
                </div>
				<div class="layui-form-item">
                    <label for="vdata" class="layui-form-label">
                        <span class="x-red">*</span>默认值
                    </label>
                    <div class="layui-input-inline" style="width:200px;">
                        <input type="text" id="vdata" value="<?php echo $data['vdata'] ?>"   name="vdata" 
                        autocomplete="off"  class="layui-input">
                    </div>
					<div class="layui-form-mid layui-word-aux" >
					  默认字段值，不填默认int类型的值是0，string类型的值是null。多选参数的值是两边带【,】，如【,1,】表示值为1
				    </div>
                </div>
				<div class="layui-form-item">
                    <label for="tips" class="layui-form-label">
                        <span class="x-red">*</span>字段提示
                    </label>
                    <div class="layui-input-inline" style="width:500px;">
                        <input type="text" id="tips" value="<?php echo $data['tips'] ?>"   name="tips" 
                        autocomplete="off"  class="layui-input">
                    </div>
					<div class="layui-form-mid layui-word-aux" >
					  用于填写时的提示信息，50字以内
				    </div>
                </div>
				<div class="layui-form-item">
                    <label for="orders" class="layui-form-label">
                        <span class="x-red"></span>排序
                    </label>
                    <div class="layui-input-inline">
                        <input type="number" id="orders" value="<?php echo $data['orders'] ?>" name="orders" 
                        autocomplete="off" class="layui-input">
                    </div>
					<div class="layui-form-mid layui-word-aux">
					  数字越大越靠前
					</div>
					
                </div>
				<div class="layui-form-item" pane>
                    <label for="ismust" class="layui-form-label">
                        <span class="x-red"></span>是否必填
                    </label>
                    <div class="layui-input-inline">
                        <input type="radio" name="ismust" value="0" title="非必填" <?php if($data['ismust']==0){ ?>checked<?php } ?>>
						<input type="radio" name="ismust" value="1" title="必填" <?php if($data['ismust']==1){ ?>checked<?php } ?>>
                    </div>
					 
					
                </div>
				<div class="layui-form-item" pane>
                    <label for="isshow" class="layui-form-label">
                        <span class="x-red"></span>前台显示
                    </label>
                    <div class="layui-input-inline">
                        <input type="radio" name="isshow" value="0" title="不显示" <?php if($data['isshow']==0){ ?>checked<?php } ?>>
						<input type="radio" name="isshow" value="1" title="显示" <?php if($data['isshow']==1){ ?>checked<?php } ?>>
                    </div>
					 
					
                </div>
                <div class="layui-form-item" pane>
                    <label for="isadmin" class="layui-form-label">
                        <span class="x-red"></span>后台显示
                    </label>
                    <div class="layui-input-inline">
                        <input type="radio" name="isadmin" value="0" title="不显示" <?php if($data['isadmin']==0){ ?>checked<?php } ?>>
						<input type="radio" name="isadmin" value="1" title="显示" <?php if($data['isadmin']==1){ ?>checked<?php } ?>>
                    </div>
					 
					
                </div>
				<div class="layui-form-item" pane>
                    <label for="issearch" class="layui-form-label">
                        <span class="x-red"></span>后台搜索
                    </label>
                    <div class="layui-input-inline">
						<input type="radio" name="issearch" value="1" title="显示" <?php if($data['issearch']==1){ ?>checked<?php } ?>>
						<input type="radio" name="issearch" value="0" title="不显示" <?php if($data['issearch']==0){ ?>checked<?php } ?>>
						
                    </div>
					<div class="layui-form-mid layui-word-aux">
					  仅用于后台列表头部带有该字段搜索
					</div> 
					
                </div>
				<div class="layui-form-item" pane>
                    <label for="islist" class="layui-form-label">
                        <span class="x-red"></span>列表中显示
                    </label>
                    <div class="layui-input-inline">
						<input type="radio" name="islist" value="1" title="显示"  <?php if($data['islist']==1){ ?>checked<?php } ?>>
						<input type="radio" name="islist" value="0" title="不显示" <?php if($data['islist']==0){ ?>checked<?php } ?>>
                    </div>
					<div class="layui-form-mid layui-word-aux">
					  仅用于后台列表显示该字段
					</div> 
					
                </div>
				<div class="layui-form-item">
                    <label for="format" class="layui-form-label">
                        <span class="x-red"></span>显示格式化
                    </label>
                    <div class="layui-input-inline">
						<select name="format" lay-filter="format" id="format" >
						<option value="">不做处理</option>
						<?php $v_n=0;foreach( format_fields() as $k=>$v){ $v_n++; ?>
						<option value="<?php echo $k ?>" <?php if($data['format']==$k){ ?> selected <?php } ?>><?php echo $v ?></option>
						<?php } ?>
					   
					   </select>
                    </div>
					<div class="layui-form-mid layui-word-aux">
					  仅用于后台列表显示该字段内容处理
					</div>
                </div>
				<div class="layui-form-item" pane>
                    <label for="isajax" class="layui-form-label">
                        <span class="x-red"></span>ajax可访问
                    </label>
                    <div class="layui-input-inline">
                        <input type="radio" name="isajax" value="0" title="不能" <?php if($data['isajax']==0){ ?>checked<?php } ?>>
						<input type="radio" name="isajax" value="1" title="能" <?php if($data['isajax']==1){ ?>checked<?php } ?>>
                    </div>
					<div class="layui-form-mid layui-word-aux">
					  由于本系统对json数据封装，限制访问可以提高安全性
					</div> 
					
                </div>
				
				</div>
				<div class="layui-tab-item">
				 <?php if($data['molds']=='level'){ ?>
				<table class="layui-table layui-form">
					<thead>
					  <tr>
						<th width="20">
						  <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
						</th>
						
						<th>角色名</th>
						
					</thead>
					<tbody class="x-cate">
					<?php   
					
					if($admin['gid']!=1){
					$levelgroup = M('level_group')->findAll('id!=1');
					}else{
					$levelgroup = M('level_group')->findAll();
					}
					$levelgroup = set_class_haschild($levelgroup);
					$levelgroup = getTree($levelgroup);
					
					
					 ?>
					 <?php $v_n=0;foreach( $levelgroup as $v){ $v_n++;?>
					  <tr cate-id="<?php echo $v['id'] ?>" fid="<?php echo $v['pid'] ?>" >
						<td>
						  <div class="layui-unselect layui-form-checkbox <?php if(strpos($data['tids'],','.$v['id'].',')!==false){ ?> layui-form-checked <?php } ?>" lay-skin="primary" data-id='<?php echo $v['id'] ?>'><i class="layui-icon">&#xe605;</i></div>
						</td>
						
						<td>
						  <?php echo str_repeat('&nbsp;&nbsp;&nbsp;',$v['level']) ?>
						  <?php if($v['haschild']){ ?>
						  <i class="layui-icon x-show" status='false'>&#xe625;</i>
						  <?php }else{ ?>
						  <?php if($v['level']){ ?>|——<?php } ?>
						  <?php } ?>
						  <?php echo $v['name'] ?>
						</td>
						
					  </tr>
					 <?php } ?>
					 
					 
					</tbody>
				  </table>
				<?php }else{ ?>
				 <table class="layui-table layui-form">
					<thead>
					  <tr>
						<th width="20">
						  <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
						</th>
						
						<th>栏目名</th>
						
					</thead>
					<tbody class="x-cate">
					
					<?php $v_n=0;foreach( $classtypes as $v){ $v_n++;?>
					<?php if($v['molds']==$data['molds']  || $data['molds']=='classtype'){ ?>
					  <tr cate-id="<?php echo $v['id'] ?>" fid="<?php echo $v['pid'] ?>" >
						<td>
						  <div class="layui-unselect layui-form-checkbox <?php if(strpos($data['tids'],','.$v['id'].',')!==false){ ?> layui-form-checked <?php } ?>" lay-skin="primary" data-id='<?php echo $v['id'] ?>'><i class="layui-icon">&#xe605;</i></div>
						</td>
						
						<td>
						  <?php echo str_repeat('&nbsp;&nbsp;&nbsp;',$v['level']) ?>
						  <?php if($v['haschild']){ ?>
						  <i class="layui-icon x-show" status='false'>&#xe625;</i>
						  <?php }else{ ?>
						  <?php if($v['level']){ ?>|——<?php } ?>
						  <?php } ?>
						  <?php echo $v['classname'] ?>
						</td>
						
					  </tr>
					<?php } ?>
					<?php } ?>
					 
					</tbody>
				  </table>
				
				<?php } ?>
				</div>
				
			  </div>
			</div>
			
			
			
               
				
				
                <div class="layui-form-item" style="text-align:center;">
                    
                     <button  class="layui-btn" lay-filter="save" lay-submit="">
                        保存
                    </button>
                </div>
            </form>
        </div>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
      
        <script>
            layui.use(['laydate','form','layer','upload'], function(){
                $ = layui.jquery;
              var form = layui.form
              ,layer = layui.layer;
			  laydate = layui.laydate;
			
			  
			    //监听提交
              form.on('submit(save)', function(data){
                var tids = tableCheck.getData().join(',');
				if(tids==''){
					//layer.alert('请选择绑定栏目！', {icon: 5});
					//return false;
					tids = 0;
				}
				data.field.tids = tids;
				
                //发异步，把数据提交给php
				$.post("<?php echo U('Fields/editFields') ?>",data.field,function(r){
				//console.log(r);return false;
					var r = JSON.parse(r);
					if(r.code==0){
						layer.msg(r.msg, {icon: 6,time: 2000},function () {
							// 获得frame索引
							<?php if($webconf['admintpl']=='tpl'){ ?>
							window.location.href="<?php echo U('Fields/index',['molds'=>$data['molds']]) ?>";
							<?php }else{ ?>
							parent.layer.close();
							parent.location.reload();
							<?php } ?>
							
						});
						
						 
					}else{
						layer.alert(r.msg, {icon: 5});
					}
				});
				
               
                return false;
              });
            

           
              
              
            });
        </script>
      
    </body>

</html>