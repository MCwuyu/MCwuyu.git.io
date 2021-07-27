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
              <a><cite>模块管理</cite></a>
              <a><cite>字段管理</cite></a>
              
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="iconfont" style="line-height:30px">&#xe6aa;</i></a>
        </div>
        <div class="x-body">
        <div class="layui-card">
			<div class="layui-card-body">
			<xblock>
		    <form class="layui-form " method="get" id="myform"> 
			   <div class="layui-input-inline" >
			   <select class="layui-btn-sm" id="change_tid" lay-search=""  lay-filter="change_tid" >
			   <option value="0">批量绑定栏目</option>
			   <?php $v_n=0;foreach( $classtypetree as $v){ $v_n++;?>
			   <?php if($molds['biaoshi']==$v['molds']){ ?>
			   <option   value="<?php echo $v['id'] ?>"><?php echo str_repeat('--', $v['level']) ?><?php echo $v['classname'] ?></option>
			   <?php } ?>
			   <?php } ?>
			   </select>
			   </div>
			   <?php if(checkAction('Fields/addFields')){ ?>	
			   <a class="layui-btn layui-btn-sm" onclick="x_admin_show('<?php echo $molds['name'] ?>-新增字段','<?php echo U('Fields/addFields',array('molds'=>$molds['biaoshi'])) ?>')">新增字段</a>
			   <?php } ?>
		    </form>	
			
	        <span class="x-right" style="line-height:40px">共有数据：<?php echo $sum ?> 条</span>
		  </xblock>
            <table class="layui-table">
                <thead>
                    <tr>
                        
                        <th>
                            ID
                        </th>
						<th>
						  <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
						</th>
						<th>
                            排序
                        </th>
                        <th>
                            字段名称
                        </th>
						<th>
                            字段标识
                        </th>
						<th>
                            是否必填
                        </th>
						<th>
                            前台显示
                        </th>
						<th>
                            后台列表
                        </th>
						<th>
                            默认值
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
						<div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="<?php echo $v['id'] ?>"><i class="layui-icon">&#xe605;</i></div>
						</td>
                        <td>
                            <input data-id="<?php echo $v['id'] ?>" class="layui-input orderchange" type="number" name="orders" value="<?php echo $v['orders'] ?>">
                        </td>
                        <td>
                            <?php echo $v['fieldname'] ?>
                        </td>
						
						 <td>
                           <?php echo $v['field'] ?>
                        </td>
						 <td>
                            <?php if($v['ismust']==0){ ?>
							
							<span class="layui-badge layui-bg-gray">非必填</span>
							<?php }else{ ?>
							<span class="layui-badge">必填项</span>
							<?php } ?>
              
                        </td>
						 <td>
                            <?php if($v['isshow']==0){ ?>
							<span class="layui-badge layui-bg-gray">不显示</span>
							<?php }else{ ?>
							<span class="layui-badge layui-bg-green">显示</span>
							<?php } ?>
              
                        </td>
						 <td>
                            <?php if($v['islist']==0){ ?>
							<span class="layui-badge layui-bg-gray">不显示</span>
							<?php }else{ ?>
							<span class="layui-badge layui-bg-green">显示</span>
							<?php } ?>
              
                        </td>
						<td><?php echo $v['vdata'] ?></td>
					
                        <td class="td-manage">
                        <?php if(checkAction('Fields/editFields')){ ?>	
							 <a class="layui-btn layui-btn layui-btn-xs"  onClick="x_admin_show('编辑','<?php echo U('Fields/editFields',array('id'=>$v['id'])) ?>')" >编辑</a>
						<?php } ?>	 
						<?php if(checkAction('Fields/deleteFields')){ ?>	
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
	   $(document).ready(function(){
			
	   
	   });
	   
	    layui.use(['laydate','element','table','form','laypage','layer'], function(){
                $ = layui.jquery;//jquery
             var  laydate = layui.laydate;//日期插件
             var  lement = layui.element;//面包导航
             var  layer = layui.layer;//弹出层
			 var  form = layui.form;
			 var  table = layui.table;
			
              form.on('select(change_tid)', function(data){
			  
			  	var datax = tableCheck.getData();
				if(datax==''){
					alert('请选择对象！');return false;
				}
				$.post("<?php echo U('changeTid') ?>",{data:datax.join(','),tid:data.value},function(r){
						if(r.code==0){
							layer.msg(r.msg,{icon: 1,time:1000});
						}else{
							layer.msg(r.msg,{icon: 5,time:1000});
						}
				},'json')
			  
				  console.log(datax); 
				  console.log(data.elem); //得到select原始DOM对象
				  console.log(data.value); //得到被选中的值
				  console.log(data.othis); //得到美化后的DOM对象
				});
							 
              
            });
		 /*删除*/
            function molds_del(obj,id){
                layer.confirm('确认要删除吗？删除的同时将删除对应的表内容！',function(index){
				
					$.get("<?php echo U('deleteFields') ?>?id="+id,{},function(s){
						
							var r = JSON.parse(s);
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
			
			$(document).ready(function(){
			$(".orderchange").bind('input propertychange',function(){
				if($(this).val()!=''){
					var orders = $(this).val();
					var id = $(this).attr('data-id');
					$.get("<?php echo U('changeOrders') ?>",{id:id,orders:orders},function(r){
							if(r.code==0){
								window.location.reload();
							}else{
								
								layer.msg(r.msg,{icon: 5,time:1000});
							}
					},'json')
					
				}
			
			})
		
		})	
			
			
       </script>
    </body>
</html>