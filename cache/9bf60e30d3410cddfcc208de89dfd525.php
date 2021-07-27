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
        <a href="/">首页</a>
        <a >会员管理</a>
        <a><cite>会员分组</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="iconfont" style="line-height:30px">&#xe6aa;</i></a>
    </div>
    <div class="x-body">
      
	  	<div class="layui-card">
			<div class="layui-card-body">
			 <xblock>
       <?php if(checkAction('Member/groupadd')){ ?>
        <a class="layui-btn layui-btn-sm" onclick="x_admin_show('添加分组','<?php echo U('Member/groupadd') ?>')">添加分组</a>
	   <?php } ?>
         <?php if($webconf['isopenhomepower']==0){ ?><a class="layui-btn layui-btn-sm">温馨提示：前台权限已关闭，设置权限不会生效。</a><?php }else{ ?><a class="layui-btn layui-btn-sm layui-btn-danger">温馨提示：前台权限已开启，权限设置将直接影响前台访问，请谨慎操作！</a><?php } ?>
      </xblock>
      <table class="layui-table layui-form">
        <thead>
          <tr>
           
            <th>ID</th>
			<th width="50">排序</th>
            <th>分组名</th>
            <th>描述</th>
            <th>状态</th>
            <th>操作</th>
        </thead>
        <tbody class="x-cate">
		
		<?php $v_n=0;foreach( $lists as $v){ $v_n++;?>
          <tr cate-id="<?php echo $v['id'] ?>" fid="<?php echo $v['pid'] ?>" >
            <td><?php echo $v['id'] ?></td>
			<td><input type="text" class="layui-input x-sort"  name="order" value="<?php echo $v['orders'] ?>"></td>
            <td>
			  <?php echo str_repeat('&nbsp;&nbsp;&nbsp;',$v['level']) ?>
			  <?php if($v['haschild']){ ?>
			  <i class="layui-icon x-show" status='false'>&#xe625;</i>
			  <?php }else{ ?>
			  <?php if($v['level']){ ?>|——<?php } ?>
			  <?php } ?>
			  <?php echo $v['name'] ?>
            </td>
			 <td><?php echo $v['description'] ?></td>
			 <td class="td-status">
			 <?php if(checkAction('Member/change_group_status')){ ?>
             <input type="checkbox" value="<?php echo $v['id'] ?>" name="switch" lay-filter="status"   lay-text="正常|封禁"  lay-skin="switch" <?php if($v['isagree']==1){ ?>checked<?php } ?>>
			 <?php }else{ ?>
				<?php if($v['isagree']==1){ ?>
				<span class="layui-badge layui-bg-green">正常</span>
				<?php }else{ ?>
				<span class="layui-badge">封禁</span>
				<?php } ?>
			 <?php } ?>
			 </td>
			
           
            <td class="td-manage">
			 <?php if(checkAction('Member/groupedit')){ ?>
              <a class="layui-btn layui-btn layui-btn-xs"  onclick="x_admin_show('编辑','<?php echo U('Member/groupedit',array('id'=>$v['id'])) ?>')" >编辑</a>
			 <?php } ?>
			 <?php if(checkAction('Member/group_del')){ ?>
              <a class="layui-btn-danger layui-btn layui-btn-xs"  onclick="member_del(this,'<?php echo $v['id'] ?>')" href="javascript:;" >删除</a>
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
      layui.use(['laydate','form'], function(){
        var laydate = layui.laydate;
        var form = layui.form;
       
		form.on('switch(status)', function (data) {
			$.post("<?php echo U('change_group_status') ?>",{id:data.elem.value},function(r){ });
		});
      });

    $(document).ready(function(){
		$(".x-sort").change(function(){
			//alert($(this).val());
			var id = $(this).parent().parent().attr('cate-id');
			var order = $(this).val();
		
			$.post("<?php echo U('Member/editOrders') ?>",{id:id,orders:order},function(r){
				window.location.reload();
			});
		
		})
	});

      /*用户-删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
			  
			  $.post("<?php echo U('group_del') ?>",{id:id},function(r){
					var r = JSON.parse(r);
					if(r.code==0){
						$(obj).parents("tr").remove();
						layer.msg('已删除!',{icon:1,time:1000});
					}else{
						layer.msg(r.msg,{icon:5,time:1000});
					}
				 
			  });
			  
             
          });
      }



    </script>
   
  </body>

</html>