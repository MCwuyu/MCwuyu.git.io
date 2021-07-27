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
              <a><cite><?php echo $molds['name'] ?>管理</cite></a>
              <a><cite><?php echo $molds['name'] ?>列表</cite></a>
              
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="iconfont" style="line-height:30px">&#xe6aa;</i></a>
        </div>
        <div class="x-body">
        
		<div class="layui-card">
		  <div class="layui-card-body">
		    <div class="layui-collapse">
		    <div class="layui-colla-item">
			<h2 class="layui-colla-title">搜索</h2>
				<div class="layui-colla-content">
				<div class="layui-row">
					<form class="layui-form layui-col-md12 x-so" method="get" id="myform">
					<div class="layui-input-inline">
					  <select name="isshow" lay-filter="isshow" class="layui-inline autosubmit">
					  <option value="">是否审核</option>
					   
					   <option <?php if($isshow==1){ ?> selected="selected" <?php } ?>value="1">已审</option>
					   <option <?php if($isshow==2){ ?> selected="selected" <?php } ?>value="2">未审</option>
					   <option <?php if($isshow==3){ ?> selected="selected" <?php } ?>value="3">退回</option>
					   
					
					  </select>
					</div>
					<div class="layui-input-inline">
					<select class="layui-inline" name="shuxing"   >
					   <option value="">选择推荐属性</option>
					   <option   value="1">置顶</option>
					   <option   value="2">热点</option>
					   <option   value="3">推荐</option>
					   </select>
					</div>
					<div class="layui-input-inline">
					  <select name="tid" lay-filter="tid" lay-search="" class="layui-inline autosubmit">
					  <option value="">请选择栏目</option>
					   <?php $v_n=0;foreach( $classtypes as $v){ $v_n++;?>
					   <?php if($v['molds']=='article'){ ?>
					   <option <?php if($tid==$v['id']){ ?> selected="selected" <?php } ?>value="<?php echo $v['id'] ?>"><?php echo str_repeat('--', $v['level']) ?><?php echo $v['classname'] ?></option>
					   <?php } ?>
					   <?php } ?>
					
					  </select>
					</div>
					
					  <input type="text" name="title" value="<?php echo $title ?>" placeholder="请输入标题" autocomplete="off" class="layui-input">
					  <?php echo $fields_search ?>
					  <a class="layui-btn"  lay-submit="" lay-filter="search">搜索</a>
					</form>
				</div>
				</div>
		    </div>
         </div> 
		
		
			<table class="layui-hide" lay-data="{id: 'jizhi_table'}" id="jizhi_table" lay-filter="jizhi_table"></table>
			<input id="select_data" type="hidden" value="" />
		  </div>
		</div>  
		
		
		<script type="text/html" id="rightbar">
		 <a class="layui-btn layui-btn-xs" lay-event="view">预览</a>
		 <?php if(checkAction('Article/editarticle')){ ?>
			<a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="edit">编辑</a>
		 <?php } ?>
		
			
		 <?php if(checkAction('Article/deletearticle')){ ?>	
			<a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="delete">删除</a>
		 <?php } ?>
		 <?php if(checkAction('Article/copyarticle')){ ?>	
			<a class="layui-btn layui-btn-xs layui-btn-warm" lay-event="copy">复制</a>
		 <?php } ?>	
		</script>
		<script type="text/html" id="toolbar">
		 <div class="layui-btn-container" style="font-size:15px;">
		
		 <?php if(checkAction('Article/deleteAll')){ ?>	
			   <a class="layui-btn layui-btn-danger layui-btn-sm" title="批量删除" onclick="delAll()">批量删除</a>
	     <?php } ?>
		 <?php if(checkAction('Article/copyAll')){ ?>	
			   <a class="layui-btn layui-btn-warm layui-btn-sm" title="批量复制" onclick="copyAll()">批量复制</a>
		 <?php } ?>
		 <?php if(checkAction('Article/addarticle')){ ?>
				<?php if($tid){ ?>
				<a class="layui-btn layui-btn-sm" title="新增" onclick="x_admin_show('新增<?php echo $molds['name'] ?>','<?php echo U('Article/addarticle',['tid'=>$tid]) ?>')">新增<?php echo $molds['name'] ?></a>
				<?php }else{ ?>
			   <a class="layui-btn layui-btn-sm" title="新增" onclick="x_admin_show('新增<?php echo $molds['name'] ?>','<?php echo U('Article/addarticle') ?>')">新增<?php echo $molds['name'] ?></a>
			   <?php } ?>
		 <?php } ?> 
		 <?php if(checkAction('Article/changeType')){ ?>	
			   <div class="layui-input-inline" style="margin-right: 10px;margin-bottom: 10px;">
			   <select class="" id="change_tid" lay-search=""  lay-filter="change_tid" >
			   <option value="0">批量修改栏目</option>
			   <?php $v_n=0;foreach( $classtypes as $v){ $v_n++;?>
			   <?php if($v['molds']=='article'){ ?>
			   <option   value="<?php echo $v['id'] ?>"><?php echo str_repeat('--', $v['level']) ?><?php echo $v['classname'] ?></option>
			   <?php } ?>
			   <?php } ?>
			   </select>
			   </div>
		 <?php } ?>
		 <?php if(checkAction('Article/changeAttribute')){ ?>	
			   <div class="layui-input-inline" style="margin-right: 10px;margin-bottom: 10px;">
			   <select class="" id="change_tuijian"  lay-filter="change_tuijian" >
			   <option value="0">修改推荐属性</option>
			   <option   value="1">置顶</option>
			   <option   value="2">热点</option>
			   <option   value="3">推荐</option>
			   </select>
			   </div>
		 <?php } ?>
		 <?php if(checkAction('Article/checkAll')){ ?>	
		  <div class="layui-input-inline" style="margin-right: 10px;margin-bottom: 10px;width:150px;">
			   <select class="" id="change_isshow"  lay-filter="change_isshow" >
			   <option value="0">批量审核</option>
			   <option   value="1">审核</option>
			   <option   value="2">未审</option>
			   <option   value="3">退回</option>
			  
			   </select>
			   </div>
		 <?php } ?>
		  
			
		 </div>
		</script>
		<script type="text/html" id="tuijian">
			{{#  if(d.istop ==1){ }}
			<span class="layui-badge layui-bg-black">顶</span>
			{{#  } }}
			{{#  if(d.ishot==1){ }}
		        <span class="layui-badge">热</span>
		    {{#  } }}
		    {{#  if(d.istuijian==1){ }}
		        <span class="layui-badge layui-bg-green">荐</span>
		    {{#  } }}
		</script>
		<script type="text/html" id="isshow">
			{{#  if(d.isshow ==1){ }}
			<span class="layui-badge layui-bg-green">已审</span>
		    {{#  } else if(d.isshow ==2){ }}
		    <span class="layui-badge layui-bg-black">退回</span>
		    {{#  } else{ }}
		    <span class="layui-badge">未审</span>
		    {{#  } }}
		</script>
	 	<script type="text/html" id="litpic">
			{{#  if(!d.litpic){ }}
			无
		    {{#  } else{ }}
		    <a href="{{d.litpic}}" target="_blank"><img src="{{d.litpic}}" width="100px" /></a>
		    {{#  } }}
		</script>
		<script>
	 
	   
	    layui.use(['laydate','form','element','laypage','layer','table'], function(){
                $ = layui.jquery;//jquery
              var laydate = layui.laydate;//日期插件
              var lement = layui.element;//面包导航
              var layer = layui.layer;//弹出层
			  var form = layui.form;
			  var table = layui.table;
			  
			  table.render({
				elem: '#jizhi_table'
				,height: 700
				,cellMinWidth: 80
				,url: window.location.href+'?ajax=1' //数据接口
				,page: true //开启分页
				,size:'lg'
				,count:100
				,toolbar:"#toolbar"
				,data:{}
				,page: { //支持传入 laypage 组件的所有参数（某些参数除外，如：jump/elem） - 详见文档
				  layout: ['limit', 'count', 'prev', 'page', 'next', 'skip'] //自定义分页布局
				  //,curr: 5 //设定初始在第 5 页
				  ,groups: 5 //只显示 1 个连续页码
				  ,first: true //显示首页
				  ,last: true //显示尾页
				  ,count:500
				  ,limit:10
				  ,first: '首页' //不显示首页
				  ,last: '尾页' //不显示尾页
				  
				}
				,cols: [[ //表头
				  {field: 'id', title: 'ID', width:60}
				  ,{type:'checkbox'}
				  
				  ,{field: 'new_litpic', title: '缩略图', width:150,templet: '#litpic'} 
				  ,{field: 'title', title: '标题', edit:'text'}
				  <?php if($molds['isclasstype']==1){ ?>
				  ,{field: 'new_tid', title: '栏目'}
				  <?php } ?>
				  <?php $v_n=0;foreach( $fields_list as $v){ $v_n++;?>,{field: '<?php echo $v['field'] ?>', title: '<?php echo $v['fieldname'] ?>' <?php if($v['fieldtype']==1 || $v['fieldtype']==2){ ?>,edit:'text'<?php } ?> }<?php } ?>
				  ,{field: 'orders', title: '排序', width: 60, edit:'text'}
				  ,{field: 'hits', title: '点击', width: 60, edit:'text'}
				  ,{field: 'tuijian', title: '推荐',width: 60, templet: '#tuijian'}
				  ,{field: 'new_isshow', title: '审核',width:100, templet: '#isshow'}
				  ,{field: 'new_addtime', width:160,title: '时间'}
				  <?php if(checkAction('Article/editarticle') || checkAction('Article/deletearticle') || checkAction('Article/copyarticle')){ ?>
				  ,{field: '', title: '操作',width:240, toolbar: '#rightbar', fixed:'right'}
				  <?php } ?>
				 
				]]
			  });
			  
			    table.on('tool(jizhi_table)', function(obj){
					var data = obj.data; //获得当前行数据
					var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
					var tr = obj.tr; //获得当前行 tr 的DOM对象
					 
					switch(layEvent){
					  case 'edit':
						 x_admin_show('编辑',data.edit_url);
					  break;
					  case 'view':
						    var a = $('<a href="'+data.view_url+'" target="_blank">预览</a>').get(0);
							var e = document.createEvent('MouseEvents');
							e.initEvent( 'click', true, true );
							a.dispatchEvent(e);
					  break;
					  case 'delete':
							layer.confirm('确认要删除吗？',function(index){
				
								$.post("<?php echo U('Article/deletearticle') ?>",{id:data.id},function(r){
										var r = JSON.parse(r);
										if(r.code==0){
										 //发异步删除数据
											$(tr).remove();
											layer.msg(r.msg,{icon: 1,time:1000},function(){
												table.reload('jizhi_table', {
												  url: window.location.href+'?ajax=1'
												  ,where: {} //设定异步数据接口的额外参数
												 
												});
											
											});
											
											
											
										}else{
											
											layer.msg(r.msg,{icon: 5,time:1000});
										}
								})
								
							
							   
							});
					  break;
					  case 'copy':
					  
							$.post("<?php echo U('Article/copyarticle') ?>",{id:data.id},function(r){
								var r = JSON.parse(r);
								if(r.code==0){
									layer.msg(r.msg,{icon: 1,time:1000},function(){
										table.reload('jizhi_table', {
										  url: window.location.href+'?ajax=1'
										  ,where: {} //设定异步数据接口的额外参数
										 
										});
									});
									
									
								}else{
									layer.msg(r.msg,{icon: 5,time:1000});
								}
							})
					  
						 
					  break;
					  
					 
					}
				});
			  
			  table.on('checkbox(jizhi_table)', function(obj){
				 // console.log(obj.checked); //当前是否选中状态
				 // console.log(obj.data); //选中行的相关数据
				 // console.log(obj.type); //如果触发的是全选，则为：all，如果触发的是单选，则为：one
				 /*
					console.log(checkStatus.data) //获取选中行的数据
					console.log(checkStatus.data.length) //获取选中行数量，可作为是否有选中行的条件
					console.log(checkStatus.isAll ) //表格是否全选
				 */
				   var checkStatus = table.checkStatus('jizhi_table'); //idTest 即为基础参数 id 对应的值
				   var len = checkStatus.data.length;
				   var arr=[];
				   if(len>0){
					for(var i=0;i<len;i++){
						arr.push(checkStatus.data[i].id);
					}
				   }
				   $("#select_data").val(arr);
				   
					
				});
				
				table.on('edit(jizhi_table)', function(obj){ //注：edit是固定事件名，test是table原始容器的属性 lay-filter="对应的值"
				/*
				  console.log(obj.value); //得到修改后的值
				  console.log(obj.field); //当前编辑的字段名
				  console.log(obj.data); //所在行的所有相关数据  
				*/
				  var id = obj.data.id;
				  var value = obj.value;
				  var field = obj.field;
				  $.post("<?php echo U('Article/editArticleOrders') ?>",{'id':id,'value':value,'field':field},function(r){
						var r = JSON.parse(r);
						if(r.code==0){
							$("#select_data").val('');
							table.reload('jizhi_table', {
							  url: window.location.href+'?ajax=1'
							  ,where: {} //设定异步数据接口的额外参数
							 
							});
						}else{
							layer.msg(r.info,{icon: 5,time:1000});
						}
						
					});
				  
				  
				});

				
				form.on('submit(search)', function(data){
					
					table.reload('jizhi_table', {
					  url: window.location.href+'?ajax=1'
					  ,where: data.field //设定异步数据接口的额外参数
					});
				   
					return false;
				  });
					
			    form.on('select(change_tid)', function(data){
					
					
					var datas =  $("#select_data").val();
					var tid = parseInt(data.value);
					if(tid==0){
						alert('请选择修改栏目！');return false;
					}
					if(datas==''){
						alert('请选择对象！');return false;
					}
					layer.confirm('确认要批量修改['+datas+']内容为['+tid+']分类吗？',function(index){
						
						$.post("<?php echo U('Article/changeType') ?>",{tid:tid,data:datas},function(r){
						
								var r = JSON.parse(r);
								if(r.code==0){
									$("#select_data").val('');
									layer.msg('批量修改成功', {icon: 1,time:1000},function(){
										table.reload('jizhi_table', {
										  url: window.location.href+'?ajax=1'
										  ,where: {} //设定异步数据接口的额外参数
										 
										});
									});
									
								}else{
									
									layer.msg(r.msg,{icon: 5,time:1000});
								}
						})
						
						
						
					});
					
				
			    });
				form.on('select(change_tuijian)', function(data){
					
					
					var datas =  $("#select_data").val();
					var tj = parseInt(data.value);
					if(tj==0){
						alert('请选择修改属性！');return false;
					}
					if(datas==''){
						alert('请选择修改对象！');return false;
					}
					if(tj==1){
						var tuijian = '置顶';
					}else if(tj==2){
						var tuijian = '热点';
					}else{
						var tuijian = '推荐';
					}
					layer.confirm('确认要批量修改栏目ID为['+datas+']的属性为['+tuijian+']吗？<br/>【如果推荐属性相同，则取消该属性】',function(index){
						
						$.post("<?php echo U('Article/changeAttribute') ?>",{data:datas,tj:tj},function(r){
								
								var r = JSON.parse(r);
								if(r.code==0){
									$("#select_data").val('');
									layer.msg('批量修改成功', {icon: 1,time:1000},function(){
										table.reload('jizhi_table', {
										  url: window.location.href+'?ajax=1'
										  ,where: {} //设定异步数据接口的额外参数
										 
										});
									});
									
								}else{
									
									layer.msg(r.msg,{icon: 5,time:1000});
								}
						})
						
						
						
					});
					
				
			    });

			    form.on('select(change_isshow)', function(data){
					
					
					var datas =  $("#select_data").val();
					var isshow = parseInt(data.value);
					if(isshow==0){
						alert('请选择审核选项！');return false;
					}
					if(datas==''){
						alert('请选择审核对象！');return false;
					}
					if(isshow==1){
						var tip = '显示';
					}else if(isshow==2){
						var tip = '不显示';
					}else{
						var tip = '退回';
					}
					layer.confirm('确认要批量处理['+datas+']的为['+tip+']吗？',function(index){
						
						$.post("<?php echo U('Article/checkAll') ?>",{data:datas,isshow:isshow},function(r){
								
								var r = JSON.parse(r);
								if(r.code==0){
									$("#select_data").val('');
									layer.msg('批量审核成功', {icon: 1,time:1000},function(){
										table.reload('jizhi_table', {
										  url: window.location.href+'?ajax=1'
										  ,where: {} //设定异步数据接口的额外参数
										 
										});
									});
									
								}else{
									
									layer.msg(r.msg,{icon: 5,time:1000});
								}
						})
						
						
						
					});
					
				
			    });
			 
              
            });
			
			
			
		 
			
			
			
			 function delAll () {
				
				var data = $("#select_data").val();
				if(data==''){
					alert('请选择对象！');return false;
				}
				layer.confirm('确认要删除吗？'+data,function(index){
					
					$.post("<?php echo U('Article/deleteAll') ?>",{data:data},function(r){
					
							var r = JSON.parse(r);
							if(r.code==0){
							  
							  layer.msg('批量删除成功', {icon: 1,time:1000},function(){
								window.location.reload();
							  });
							  
							}else{
								
								layer.msg(r.msg,{icon: 5,time:1000});
							}
					})
					
					
					
				});
			  }
			 function copyAll(){

				var data = $("#select_data").val();
				if(data==''){
					alert('请选择对象！');return false;
				}
				layer.confirm('确认要复制吗？['+data+']',function(index){
					
					$.post("<?php echo U('Article/copyAll') ?>",{data:data},function(r){
					
							var r = JSON.parse(r);
							if(r.code==0){
							  
							  layer.msg('批量复制成功', {icon: 1,time:1000},function(){
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