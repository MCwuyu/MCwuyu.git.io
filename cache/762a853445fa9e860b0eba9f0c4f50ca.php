<?php if (!defined('CORE_PATH')) exit();?><!doctype html>
<html >
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

  <style type="text/css">
  html{ overflow-y:hidden;}
  i.jzicon {
		font-size: 18px;
		margin-right: 10px;
	}


  </style>
</head>
<body>
    <!-- 顶部开始 -->
    <div class="container">
        <div class="logo"><a href="<?php echo U('Index/index') ?>"><?php echo webConf('web_name') ?></a></div>
        <div class="left_open">
            <i title="展开左侧栏" class="iconfont">&#xe699;</i>
        </div>
		<?php if($top_num>0){ ?>
        <ul class="layui-nav left fast-add" lay-filter="">
		 <?php if(is_array($top_layout)){ ?>
		 <?php $v_n=0;foreach( $top_layout as $v){ $v_n++;?>
			<li class="layui-nav-item">
				<a href="javascript:;"><i class="iconfont"><?php echo htmlspecialchars_decode($v['icon']) ?></i><cite><?php echo $v['name'] ?></cite></a>
				<dl class="layui-nav-child"> 
				
				<?php $vv_n=0;foreach( $v['nav'] as $vv){ $vv_n++;?>
				<?php if($vv){ ?>
					<?php if(strpos($vv,'class')!==false){ ?>
					<dd class="top-nav"><a x_href="<?php echo $classnav[$vv]['act'] ?>" class="top_nav"><?php echo $classnav[$vv]['classname'] ?></a></dd>	
					<?php }else{ ?>
					<dd class="top-nav"><a x_href="<?php echo U($actions[$vv]['fc']) ?>" class="top_nav"><?php echo $actions[$vv]['name'] ?></a></dd>
					<?php } ?>
				<?php } ?>        
				<?php } ?>  
				  
				</dl>
			</li>
		 <?php } ?> 
		 <?php } ?>
		  
        </ul>
		<?php } ?>
        <ul class="layui-nav right" lay-filter="">
			<li class="layui-nav-item">
            <a class="top_nav_right"  x_href="<?php echo U('index/cleanCache') ?>"><i class="layui-icon layui-icon-refresh-3 jzicon"></i>清理缓存</a>
            
          </li>
          <li class="layui-nav-item">
            <a href="javascript:;"><i class="layui-icon layui-icon-username jzicon"></i><?php echo $admin['name'] ?></a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
              <dd><a x_href="<?php echo U('Index/details',['id'=>frencode($admin['id'])]) ?>" class="top_nav_right"      >个人信息</a></dd>
              
              <dd><a href="<?php echo U('Login/loginout') ?>">退出</a></dd>
            </dl>
          </li>

          <li class="layui-nav-item to-index"><a target="_blank" href="/"><i class="layui-icon layui-icon-home jzicon"></i>前台首页</a></li>
        </ul>
        
    </div>
    <!-- 顶部结束 -->
    <!-- 中部开始 -->
     <!-- 左侧菜单开始 -->
    <div class="left-nav layui-side layui-bg-black">
      <div id="side-nav" class="layui-side-scroll">
        <ul id="nav" class="layui-nav-tree">
			<li>
                <a  _href="<?php echo U('Index/welcome') ?>">
                    <i class="layui-icon layui-icon-home"></i>
                    <cite>后台首页</cite>
                    
                </a>
               
            </li>
		
				
		<?php if(is_array($left_layout)){ ?>
		<?php $v_n=0;foreach( $left_layout as $v){ $v_n++;?>
            <li>
                <a href="javascript:;">
                    <i class="iconfont"><?php echo htmlspecialchars_decode($v['icon']) ?></i>
                    <cite><?php echo $v['name'] ?></cite>
                    <i class="iconfont nav_right">&#xe6a7;</i>
                </a>
                <ul class="sub-menu">
				<?php $vv_n=0;foreach( $v['nav'] as $vv){ $vv_n++;?>
				<?php if($vv){ ?>
                    <li>
						<?php if(strpos($vv,'class')!==false){ ?>
						<a _href="<?php echo $classnav[$vv]['act'] ?>" ><cite><?php echo $classnav[$vv]['classname'] ?></cite></a>
						<?php }else{ ?>
                        <a _href="<?php echo U($actions[$vv]['fc']) ?>"><cite><?php echo $actions[$vv]['name'] ?></cite></a>
						<?php } ?>
                    </li >
				<?php } ?>
                <?php } ?>    
                    
                </ul>
            </li>
			
		<?php } ?>	
		<?php } ?>		
          
           
        </ul>
      </div>
    </div>
    <!-- <div class="x-slide_left"></div> -->
    <!-- 左侧菜单结束 -->
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
          <ul class="layui-tab-title">
            <li class="home"><i class="layui-icon">&#xe68e;</i>我的桌面</li>
          </ul>
          <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <iframe src="<?php echo U('Index/welcome') ?>" name="x-iframe" frameborder="0" scrolling="auto" class="x-iframe"></iframe>
            </div>
          </div>
        </div>
    </div>
     <ul class="rightmenu">
        <li data-type="closethis">关闭当前</li>
        <li data-type="closeother">关闭其他</li>
        <li data-type="closeall">关闭所有</li>
    </ul>
    <div class="page-content-bg"></div>
    <!-- 右侧主体结束 -->
    <!-- 中部结束 -->
    <!-- 底部开始 -->
 
	
		 <script>
 $(function(){

	var interval =  setInterval(function(){
	$.ajax({
		 url:"<?php echo U('Index/update_session_maxlifetime') ?>",//请求的url地址
		 dataType:"json",//返回格式为json
		 async:true,//请求是否异步，默认为异步，这也是ajax重要特性
		 data:{},//参数值
		 type:"GET",//请求方式
		 beforeSend:function(){
			//请求前的处理
			},
			 success:function(r){
			//请求成功时处理
					console.log(r);
			},
			 complete:function(){
			//请求完成的处理
			},
			 error:function(){
			//请求出错处理
			}

				
		
	})
	},5000);

 })
 

 
 </script>
    <!-- 底部结束 -->
   
</body>
</html>