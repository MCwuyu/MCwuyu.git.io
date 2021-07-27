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

  </head>
  
  <body>
	<div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>首页</cite></a>
              <a><cite>用户管理</cite></a>
             
			 <a><cite>分组管理</cite></a>
			 <a><cite>分组修改</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="iconfont" style="line-height:30px">&#xe6aa;</i></a>
    </div>
    <div class="x-body">
		<div class="layui-card">
		<div class="layui-card-body">
        <form  method="post" class="layui-form layui-form-pane">
			<input type="hidden" name="go" value="1" />
			<input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        分组名
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="name" name="name" value="<?php echo $data['name'] ?>" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
				
				
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">
                        拥有权限 <span class="x-red">选中主模块，则默认子模块也选中。如果只需要子模块权限，请不要选中主模块</span>
                    </label>
                    <table  class="layui-table layui-input-block">
                        <tbody>
							<tr>
								<th>
                                   主模块
                                </th>
                                <th>
                                   子模块
                                </div>
                                </th>
                            </tr>
						<?php $v_n=0;foreach( $ruler_top as $v){ $v_n++;?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="ruler[]" lay-skin="primary" value="<?php echo $v['action'] ?>" title="<?php echo $v['name'] ?>" <?php if(strpos($data["paction"],','.$v["action"].',')!==false){ ?>checked<?php } ?>>
                                </td>
                                <td>
                                    <div class="layui-input-block">
									<?php if(isset($ruler_children[$v['id']])){ ?>
									<?php $vv_n=0;foreach( $ruler_children[$v['id']] as $vv){ $vv_n++;?>
                                        <input name="ruler[]" lay-skin="primary" type="checkbox" title="<?php echo $vv['name'] ?>" value="<?php echo $vv['action'] ?>" <?php if(strpos($data["paction"],','.$vv["action"].',')!==false){ ?>checked<?php } ?>> 
									<?php } ?>
									<?php } ?>
                                        
                                    </div>
                                </td>
                            </tr>
						<?php } ?>
                           
                        </tbody>
                    </table>
                </div>
				<div class="layui-form-item">
                    <label for="discount_type" class="layui-form-label">
                        <span class="x-red"></span>折扣类型
                    </label>
                    <div class="layui-input-inline">
						<select name="discount_type" lay-filter="discount_type" id="discount_type" >
						<option <?php if($data['discount_type']==0){ ?>selected<?php } ?> value="0">无折扣</option>
					    <option <?php if($data['discount_type']==1){ ?>selected<?php } ?> value="1">现金折扣</option>
					    <option <?php if($data['discount_type']==2){ ?>selected<?php } ?> value="2">百分比折扣</option>
					    </select>
                    </div>
                </div>
				<div class="layui-form-item">
                    <label for="discount" class="layui-form-label">
                        折扣金额
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" value="<?php echo $data['discount'] ?>" id="discount" name="discount" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>
					<div class="layui-form-mid layui-word-aux">
					  百分比折扣请填写0.01-1之间的小数(如5折,填0.5)，无折扣时，该参数设置无效
					</div>
                </div>
				
                <div class="layui-form-item layui-form-text">
                    <label for="description" class="layui-form-label">
                        描述
                    </label>
                    <div class="layui-input-block">
                        <textarea placeholder="请输入内容" id="description" name="description" class="layui-textarea"><?php echo $data['description'] ?></textarea>
                    </div>
                </div>
				<div class="layui-form-item" pane>
                    <label for="isagree" class="layui-form-label">
                        <span class="x-red"></span>登录状态
                    </label>
                    <div class="layui-input-block">
                        <input type="radio" name="isagree" value="0" title="封禁" <?php if($data['isagree']==0){ ?>checked<?php } ?>>
						<input type="radio" name="isagree" value="1" title="正常" <?php if($data['isagree']==1){ ?>checked<?php } ?>>
						
                    </div>
					
					
                </div>
				
                <div class="layui-form-item" style="text-align:center"> 
                <button class="layui-btn" lay-submit="" lay-filter="save">修改</button>
              </div>
            </form>
			</div>
			</div>
    </div>
    <script>
        layui.use(['form','layer'], function(){
            $ = layui.jquery;
          var form = layui.form
          ,layer = layui.layer;
        
          

          //监听提交
          form.on('submit(save)', function(data){
            $.post("<?php echo U('Member/groupedit') ?>",data.field,function(r){
				var r = JSON.parse(r);
				if(r.code==0){
					 layer.msg(r.msg, {icon: 6,time: 2000},function () {
						// 获得frame索引
						<?php if($webconf['admintpl']=='tpl'){ ?>
						 window.location.href="<?php echo U('Member/membergroup') ?>";
						<?php }else{ ?>
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