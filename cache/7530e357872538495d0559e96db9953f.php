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
              <a><cite>系统扩展</cite></a>
              <a><cite>模型管理</cite></a>
              
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="iconfont" style="line-height:30px">&#xe6aa;</i></a>
        </div>
        <div class="x-body">
        
		<div class="layui-card">
			<div class="layui-card-body">
			<xblock>
		   <?php if(checkAction('Molds/addMolds')){ ?>
		   <a class="layui-btn layui-btn-sm" onclick="x_admin_show('新增模型','<?php echo U('Molds/addMolds') ?>')">新增模型</a>
		   <?php } ?>
		   <span class="x-right" style="line-height:40px">共有数据：<?php echo $sum ?> 条</span>
		  </xblock>
            <table class="layui-table">
                <thead>
                    <tr>
                        
                        <th>
                            ID
                        </th>
                       
                        <th>
                            模型名称
                        </th>
						
						<th>
                            模型标识
                        </th>
						<th>
                            模型状态
                        </th>
						<th>
                            模型分类
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody id="x-link">
				  <?php $v_n=0;foreach( $lists as $v){ $v_n++;?>
                    <tr>
                     
                        <td>
                            <?php echo $v['id'] ?>
                        </td>
                        
                        <td>
                            <?php echo $v['name'] ?>
                        </td>
						
						<td>
                           <?php echo $v['biaoshi'] ?>
                        </td>
						 <td>
                            <?php if($v['isopen']==0){ ?>
                            <span class="layui-badge layui-bg-gray">已停用</span>
							<?php }else{ ?>
                            <span class="layui-badge layui-bg-green">已启用</span>
							<?php } ?>
              
                        </td>
						<td class="td-status" >
						<?php if($v['sys']==1){ ?><span class="layui-badge layui-bg-gray">系统</span><?php }else{ ?><span class="layui-badge layui-bg-orange">扩展</span><?php } ?>
						 </td>
					
                        <td class="td-manage">
                        
							<?php if(checkAction('Molds/editMolds')){ ?>
							 <a class="layui-btn layui-btn layui-btn-xs"  onClick="x_admin_show('编辑','<?php echo U('Molds/editMolds',array('id'=>$v['id'])) ?>')" >编辑</a>
							<?php } ?>
							<?php if(checkAction('Fields/index')){ ?>
							 <a class="layui-btn layui-btn-warm layui-btn-xs"  onClick="x_admin_show('<?php echo $v['name'] ?>-字段管理','<?php echo U('Fields/index',array('molds'=>$v['biaoshi'])) ?>')" >字段管理</a>
							<?php } ?>
							<?php if(checkAction('Molds/deleteMolds')){ ?>
							 <a class="layui-btn-danger layui-btn layui-btn-xs"  onClick="molds_del(this,'<?php echo $v['id'] ?>')" href="javascript:;" >删除</a>
							<?php } ?>
                        </td>
						
                    </tr>
					<?php } ?>
                </tbody>
            </table>
			
            <div class="page">
				<?php echo $pages ?>
			  </div>
			
			</div>
		</div>
          
        </div>
     
       <script>
	  
	    layui.use(['laydate','element','laypage','layer'], function(){
                $ = layui.jquery;//jquery
              laydate = layui.laydate;//日期插件
              lement = layui.element;//面包导航
            //  laypage = layui.laypage;//分页
              layer = layui.layer;//弹出层

              //以上模块根据需要引入
             
             
              
            });
		 /*删除*/
            function molds_del(obj,id){
                layer.confirm('确认要删除吗？删除的同时将删除对应的表！',function(index){
				
					$.get("<?php echo U('deleteMolds') ?>?id="+id,{},function(s){
						
							var r = JSON.parse(s);
							if(r.code==0){
							 //发异步删除数据
								layer.alert(r.msg, {icon: 1,time:1000},function () {
									$(obj).parents("tr").remove();
									window.location.reload();
									
								});
								
								
								
							}else{
								
								layer.msg(r.msg,{icon: 5,time:1000});
							}
					})
					
				
                   
                });
            }
			
			
			
			
       </script>
    </body>
</html>