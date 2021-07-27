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
              <a><cite>会员管理</cite></a>
              <a><cite>会员列表</cite></a>
              
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="iconfont" style="line-height:30px">&#xe6aa;</i></a>
        </div>
        <div class="x-body">
		
		<div class="layui-card">
			<div class="layui-card-body">
			
			<div class="layui-collapse">
		    <div class="layui-colla-item">
			<h2 class="layui-colla-title">搜索</h2>
				<div class="layui-colla-content layui-show">
				<div class="layui-row">
					<form class="layui-form layui-col-md12 x-so" method="get" id="myform">
					<div class="layui-input-inline">
					  <select name="isshow" lay-filter="isshow" class="layui-inline autosubmit">
					  <option value="">是否封禁</option>
					   
					   <option <?php if($isshow==1){ ?> selected="selected" <?php } ?>value="1">正常</option>
					   <option <?php if($isshow==2){ ?> selected="selected" <?php } ?>value="2">封禁</option>
					   
					
					  </select>
					</div>
					  <input class="layui-input" value="<?php echo $starttime ?>" placeholder="开始日" name="start" id="start">
					  <input class="layui-input" value="<?php echo $endtime ?>" placeholder="截止日" name="end" id="end">
					  <input type="text" name="username" value="<?php echo $username ?>"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
					  <input type="text" name="tel" value="<?php echo $tel ?>"  placeholder="请输入手机号" autocomplete="off" class="layui-input"> 
					  <?php echo $fields_search ?>
					  <button class="layui-btn"  lay-submit="" lay-filter="search">搜索</button>
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
		<?php if(checkAction('Member/memberedit')){ ?>
			<a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
		<?php } ?>	
		<?php if(checkAction('Member/member_del')){ ?>
			<a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="delete">删除</a>
		<?php } ?>	
			
		</script>
		<script type="text/html" id="toolbar">
		 <div class="layui-btn-container" style="font-size:15px;">
		 <?php if(checkAction('Member/deleteAll')){ ?>
			   <a class="layui-btn layui-btn-danger layui-btn-sm" onclick="delAll()">批量删除</a>
		 <?php } ?>	 
         <?php if(checkAction('Member/memberadd')){ ?>		 
			   <a class="layui-btn layui-btn-sm" onclick="x_admin_show('新增会员','<?php echo U('Member/memberadd') ?>')">新增会员</a>
		 <?php } ?>  
			
		 </div>
		</script>
		<script type="text/html" id="isshow">
		<?php if(checkAction('Member/change_status')){ ?>
		<input type="checkbox" value="{{d.id}}" name="switch" lay-filter="status"   lay-text="正常|封禁"  lay-skin="switch" {{#  if(d.isshow == 1){ }}checked{{#  } }}>
		<?php }else{ ?>
		{{#  if(d.isshow == 1){ }}<span class="layui-badge layui-bg-green">正常</span>{{# }else{ }}<span class="layui-badge">封禁</span>{{#  } }}
		<?php } ?>
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
				  ,{field: 'isshow', title: '状态',width: 100,templet:'#isshow'}
				  ,{field: 'username', title: '用户名'}
				  ,{field: 'new_gid', title: '分组',width:150}
				  ,{field: 'tel', title: '手机号',width:200}
				  ,{field: 'email', title: '邮箱',width:150}
				  ,{field: 'new_litpic', title: '头像',width:150} 
				  ,{field: 'jifen', title: '积分',width:150} 
				  ,{field: 'money', title: '余额',width:150} 
				  <?php $v_n=0;foreach( $fields_list as $v){ $v_n++;?>,{field: '<?php echo $v['field'] ?>', title: '<?php echo $v['fieldname'] ?>'}<?php } ?>
				 
				  ,{field: 'new_regtime', title: '加入时间',width:160}
				  ,{field: 'new_logintime', title: '登录时间',width:160}
				  <?php if(checkAction('Member/memberedit') || checkAction('Member/member_del')){ ?>
				  ,{field: '', title: '操作',width:200, toolbar: '#rightbar', fixed:'right'}
				  <?php } ?>
				 
				]]
			  });
			  
			    table.on('tool(jizhi_table)', function(obj){
					var data = obj.data; //获得当前行数据
					var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
					var tr = obj.tr; //获得当前行 tr 的DOM对象
					 
					switch(layEvent){
					  case 'edit':
						//console.log(data);
						 x_admin_show('查看',data.edit_url);
					  break;
					  case 'view':
						  
					  break;
					  case 'delete':
							layer.confirm('确认要删除吗？',function(index){
				
								$.post("<?php echo U('Member/member_del') ?>",{id:data.id},function(r){
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
					  
						
					  
						 
					  break;
					  
					 
					}
				});
				
			  
			  
			  table.on('checkbox(jizhi_table)', function(obj){
				
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
				
				
				
				form.on('submit(search)', function(data){
					
					table.reload('jizhi_table', {
					  url: window.location.href+'?ajax=1'
					  ,where: data.field //设定异步数据接口的额外参数
					 
					});
				   
					return false;
				  });
					
				form.on('switch(status)', function (data) {
					$.post("<?php echo U('change_status') ?>",{id:data.elem.value},function(r){ });
				});
					 
				
			 
              
            });
			
			
			
		 
			
			
			
			 function delAll () {
				
				var data = $("#select_data").val();
				if(data==''){
					alert('请选择对象！');return false;
				}
				layer.confirm('确认要删除吗？'+data,function(index){
					
					$.post("<?php echo U('Member/deleteAll') ?>",{data:data},function(r){
					
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
			
			 
			
			
       </script>
    </body>
</html>