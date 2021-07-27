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
              <a><cite>分组管理</cite></a>
              <a><cite>权限列表</cite></a>
              
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="iconfont" style="line-height:30px">&#xe6aa;</i></a>
        </div>
        <div class="x-body">
          
		<div class="layui-card">
			<div class="layui-card-body">
			
			<xblock>
			<form class="layui-form" action="">
			  <?php if(checkAction('Member/addrulers')){ ?>
			  <a class="layui-btn layui-btn-sm" onclick="x_admin_show('添加权限','<?php echo U('Member/addrulers') ?>')">添加权限</a>
			  <?php } ?>
			  <?php if($webconf['isopenhomepower']==0){ ?><a class="layui-btn layui-btn-sm">温馨提示：前台权限已关闭，设置权限不会生效。</a><?php }else{ ?><a class="layui-btn layui-btn-sm layui-btn-danger">温馨提示：前台权限已开启，权限设置将直接影响前台访问，请谨慎操作！</a><?php } ?>
			  <div class="layui-input-inline" style="float: right;">
				  <input type="checkbox" value="1" name="switch" lay-filter="type"  lay-text="展开|折叠" checked lay-skin="switch">
				
			  </div>
			</form>
		    </xblock>
            <table class="layui-table">
                <thead>
                    <tr>
                        
                        <th>
                            ID
                        </th>
                       
                        <th>
                            功能
                        </th>
						
						<th>
                            控制器/方法
                        </th>
						
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody class="x-cate">
		<?php $v_n=0;foreach( $lists as $v){ $v_n++;?>
          <tr cate-id="<?php echo $v['id'] ?>" fid="<?php echo $v['pid'] ?>" >
            
			
            <td><?php echo $v['id'] ?></td>
            <td>
			  <?php echo str_repeat('&nbsp;&nbsp;&nbsp;',$v['level']) ?>
			  <?php if($v['haschild']){ ?>
			  <i class="layui-icon x-show" status='false'>&#xe625;</i>
			  <?php }else{ ?>
			  <?php if($v['level']){ ?>|——<?php } ?>
			  <?php } ?>
			  <?php echo $v['name'] ?>
            </td>
			<td><?php echo $v['action'] ?></td>
			
            <td class="td-manage">
			 <?php if(checkAction('Member/editrulers')){ ?>
              <a class="layui-btn layui-btn layui-btn-xs"  onclick="x_admin_show('编辑','<?php echo U('Member/editrulers',array('id'=>$v['id'])) ?>')" >编辑</a>
			 <?php } ?>
			  <?php if(checkAction('Member/addrulers')){ ?>
				<?php if($v['pid']==0){ ?>
				<a class="layui-btn layui-btn-warm layui-btn-xs"  onclick="x_admin_show('添加子功能','<?php echo U('Member/addrulers',array('pid'=>$v['id'])) ?>')" >添加子功能</a>
				<?php } ?>
			  <?php } ?>
			  <?php if(checkAction('Member/deleterulers')){ ?>
              <a class="layui-btn-danger layui-btn layui-btn-xs"  onclick="ruler_del(this,'<?php echo $v['id'] ?>')" href="javascript:;" >删除</a>
			  <?php } ?>
            </td>
          </tr>
		 <?php } ?>
         
        </tbody>
            </table>
			
			
			</div>
		</div>  
		  
         
            
        </div>
     
       <script>
	  
	   
	    layui.use(['laydate','form','element','laypage','layer'], function(){
                $ = layui.jquery;//jquery
              laydate = layui.laydate;//日期插件
              lement = layui.element;//面包导航
            //  laypage = layui.laypage;//分页
              layer = layui.layer;//弹出层
			  form = layui.form;
             
              form.on('select(tid)', function(data){
					
					$("#myform").submit();
				
			 });
             form.on('switch(type)', function(data){
				if(!data.elem.checked){
					$(".x-cate tr").each(function(){
						if($(this).attr('fid')!=0){
							$(this).css('display','none');
						}
					});
					$(".x-show").attr('status','true').html('&#xe623;');
				}else{
					
					$(".x-cate tr").each(function(){
						if($(this).attr('fid')!=0){
							$(this).css('display','table-row');
						}
					});
					$(".x-show").attr('status','false').html('&#xe625;');
				}
			});  
              
            });
		 /*删除*/
            function ruler_del(obj,id){
                layer.confirm('确认要删除吗？',function(index){
				
					$.get("<?php echo APP_URL ?>/Member/deleterulers/id/"+id,{},function(r){
							var r = JSON.parse(r);
							if(r.code==0){
							 //发异步删除数据
								$(obj).parents("tr").remove();
								
								layer.msg(r.msg,{icon: 1,time:1000});
								window.location.reload();
								
							}else{
								
								layer.msg(r.msg,{icon: 5,time:1000});
							}
					})
					
				
                   
                });
            }
			
			
			
       </script>
    </body>
</html>