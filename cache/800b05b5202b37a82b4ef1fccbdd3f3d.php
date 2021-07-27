<?php if (!defined('CORE_PATH')) exit();?><!DOCTYPE HTML>
<html class="no-js">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="applicable-device" content="pc,mobile">  
  
<title><?php echo $webconf['web_name'] ?>-<?php echo $webconf['web_keyword'] ?></title> 
<!-- 使用url函数转换相关路径 -->
<link rel="stylesheet" href="<?php echo $tpl ?>style//css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo $tpl ?>style//css/style.css">
<link rel="stylesheet" href="<?php echo $tpl ?>style//css/iconfont.css" type="text/css" media="all">
<script src="<?php echo $tpl ?>style//js/jquery.min.js"></script>
<script type='text/javascript'>var globals = {"ajax_url":"","web_url":""};</script>
<!--[if lt IE 9]>
<script src="<?php echo $tpl ?>style//js/html5.min.js"></script>
<script src="<?php echo $tpl ?>style//js/respond.min.js"></script>
<![endif]-->  
  
<!-- 通过自有函数输出HTML头部信息 --> 
<!-- 首页og -->
<!-- 内容页og -->
 
<meta name="keywords" content="动漫分享" />
 
  
<style type="text/css">body {font-family: webmo!important;}
.image_title{display:none;}
.entry-content p img {
    margin: auto;
    display: block;
}
.logoegg{width: 120px !important;}
@media (max-width: 991px){
.logoegg {  display: none !important;}}
.sp-dark-mode .logoegg {  display: none;}



</style>
<script type="text/javascript">
(function () {
    window.TypechoComment = {
        dom : function (id) {
            return document.getElementById(id);
        },
    
        create : function (tag, attr) {
            var el = document.createElement(tag);
        
            for (var key in attr) {
                el.setAttribute(key, attr[key]);
            }
        
            return el;
        },

        reply : function (cid, coid) {
            var comment = this.dom(cid), parent = comment.parentNode,
                response = this.dom('respond-post-382'), input = this.dom('comment-parent'),
                form = 'form' == response.tagName ? response : response.getElementsByTagName('form')[0],
                textarea = response.getElementsByTagName('textarea')[0];

            if (null == input) {
                input = this.create('input', {
                    'type' : 'hidden',
                    'name' : 'parent',
                    'id'   : 'comment-parent'
                });

                form.appendChild(input);
            }

            input.setAttribute('value', coid);

            if (null == this.dom('comment-form-place-holder')) {
                var holder = this.create('div', {
                    'id' : 'comment-form-place-holder'
                });

                response.parentNode.insertBefore(holder, response);
            }

            comment.appendChild(response);
            this.dom('cancel-comment-reply-link').style.display = '';

            if (null != textarea && 'text' == textarea.name) {
                textarea.focus();
            }

            return false;
        },

        cancelReply : function () {
            var response = this.dom('respond-post-382'),
            holder = this.dom('comment-form-place-holder'), input = this.dom('comment-parent');

            if (null != input) {
                input.parentNode.removeChild(input);
            }

            if (null == holder) {
                return true;
            }

            this.dom('cancel-comment-reply-link').style.display = 'none';
            holder.parentNode.insertBefore(response, holder);
            return false;
        }
    };
})();
</script>
  
</head>
<body class=" " style="--theme: #2299DD;">  


<div class="site-main spimes-container">
<div class="top-bar">  
<div class="container clearnav secnav">
<!--移动端按钮-->
<nav class="navbar navbar-inverse navbar-<?php echo $tpl ?>style/-top">
<div class="container">
<div class="navbar-header">
<div class="m_nav-list" >
<a href="javascript:;" data-toggle="offcanvas" class="lines js-m-navlist">
<span class="line first-line"></span>
<span class="line second-line"></span>
<span class="line third-line"></span>
</a>
</div>
</div>
<div id="navbar" class="collapse navbar-collapse sidebar-offcanvas">
<!--移动导航s-->
<input class="wb-switch wb-yes" id="J_themesSwitchBtn" type="checkbox" onclick="javascript:switchNightMode()">  
<div class="mobile-sidebar-column">
<ul class="mobile-sidebar-menu ultop">
  
<?php $v_n=0;foreach( $classtypedata as $v){ $v_n++;?>
<?php if($v['isshow']==1){ ?>
<?php if($v['pid']==0){ ?>
   <li class="menu-item">
<a href="<?php echo $v['url'] ?>" title="<?php echo $v['classname'] ?>"><i class="icon iconfont icon-icon-test35"></i><?php echo $v['classname'] ?></a>
<?php } ?>
<?php } ?>
<?php } ?>
</li>

</ul>
</div>
<!--移动导航e-->
</div><!--/.nav-collapse -->
</div>
</nav> 
<div class="top-bar-left pull-left navlogo">				
<a href="<?php echo $webconf['domain'] ?>" class="logo box">
<img src="<?php echo $webconf['web_logo'] ?>" class="logo-light" id="logo-light" alt="<?php echo $webconf['web_name'] ?>" />
<img src="<?php echo $webconf['web_logo'] ?>" class="logo-dark d-none" id="logo-dark" alt="<?php echo $webconf['web_name'] ?>" />
 <b class="shan"></b>
</a>

</div>
<div class="search-btn">
<!--<a href="<?php echo U('user/release') ?>" class="btn btn-blue btn-article"><i class="icon iconfont icon-icon-test10"></i> 在线投稿</a>-->
</div>
<div class="search-warp clearfix">
<form action="<?php echo get_domain() ?>/search" method="GET" action="">

<div class="search-area" >
<input class="search-input" placeholder="搜索感兴趣的知识和文章" type="text" name="word" autocomplete="off" id="soblur">
<input name="molds" type="hidden" value="article" />
<!--弹出-->
<ul class="dropdown-menu top_so">
<?php
		$v_table ='article';
		$v_w=' 1=1 and istuijian=\'1\' ';
		$v_order=' id desc ';
		$v_fields=null;
		$v_limit='5';
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
<li><a href="<?php echo $v['url'] ?>"><span class="rank ran1"><?php echo $v_n ?></span> <?php echo $v['title'] ?><i class="view"><?php echo $v['hits'] ?>阅读</i></a></li>

<?php } ?>
<!--历史-->

<div id="jl_viewHistory" >
</div>
<!--历史-->
<div class="s_tag">
<?php
		$v_table ='tags';
		$v_w=' 1=1 and isshow=\'1\' ';
		$v_order=' id desc ';
		$v_fields=null;
		$v_limit='10';
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
<div class="item "><a href="<?php echo U('tags/index',['id'=>$v['id']]) ?>" rel="tag"><i>#</i> <?php echo $v['keywords'] ?></a></div>
<?php } ?>
</div>                                
</ul>
<!--弹出-->
</div>
<button class="showhide-search search-form-input" type="submit"><i class="icon iconfont icon-sousuo"></i></button>
</form>
</div>

  <?php if($islogin){ ?>
<!--手机端s-->
<div class="top-bar-right pull-right text-right mobs">
<div class="top-admin">	
<a href="javascript:;" id="soStats" class="sostats_click"><i id="soico" class="icon iconfont icon-sousuo"></i> 搜索</a>
    <div id="auStats" class="dropdown-toggle"><img src="<?php if(!$member['litpic']){ ?><?php echo $common ?>user/images/login.png<?php }else{ ?><?php echo $member['litpic'] ?><?php } ?>" width="25px" height="25px" class="navtar" >							<div class="austats" id="aus">
							<ul>
							<li><a href="<?php echo U('user/index') ?>"><i class="icon iconfont icon-wodeguanzhu"></i>个人中心</a></li>
							<li><a href="<?php echo U('user/release') ?>"><i class="icon iconfont icon-bianji"></i>发布文章</a></li>							
							<li><a href="<?php echo U('login/loginout') ?>"><i class="icon iconfont icon-shibai"></i>退出登录</a></li>							
							</ul>
						    </div>	

  </div>
  
   
<?php }else{ ?>




 <!--搜索框开始-->



<!--手机端s-->
<div class="top-bar-right pull-right text-right mobs">
<div class="top-admin">	
<a href="javascript:;" id="soStats" class="sostats_click"><i id="soico" class="icon iconfont icon-sousuo"></i> 搜索</a>

  <a href="<?php echo U('user/index') ?>"><i class="/icon iconfont icon iconfont icon-icon-test24"></i> 登录</a>
 

<?php } ?>


 <!--搜索框开始-->
<div class="navbar-search socollapse sostats" id="navbar-search" style="">
			<div class="container">
				<form action="<?php echo get_domain() ?>/search" method="GET" role="search" id="searchform" class="searchform shadow" action="">
				<input name="molds" type="hidden" value="article" />
					<div class="input-group">
						<input type="text" name="word" id="s" placeholder="请输入搜索关键词并按回车键…" class="form-control" required="" >
					
						<div class="input-group-append"> 
							<button class="btn btn-nostyle" type="submit"><i class="icon iconfont icon-sousuo"></i></button>
						</div>
					</div>
<!-- /input-group -->
				</form>
			</div>
</div>
<input class="wb-switch wb-no" id="J_themesSwitchBtn" type="checkbox" onclick="javascript:switchNightMode()">   
</div>
</div>

<!--手机端e-->			
</div>  
<!--s-->
<div class="new_header container clearnav">  
<div class="top-bar-left pull-left navs">
    
 
    			  
<nav class="top-bar-navigation">
<ul class="top-bar-menu">
<li class="menu-item"><a href="<?php echo $webconf['domain'] ?>"><i class="icon iconfont icon-shouye1"></i> 首页</a></li>					
<!--pc导航s-->              
 
	            <?php $v_n=0;foreach( $classtypedata as $v){ $v_n++;?>
<?php if($v['isshow']==1){ ?>
<?php if($v['pid']==0){ ?>   					                  
<li class="nav-s"><a href="<?php echo $v['url'] ?>" title="<?php echo $v['classname'] ?>"><?php echo $v['classname'] ?></a></li>
         <?php } ?>
<?php } ?>
<?php } ?>         



 
<!--pc导航e-->
</ul>
<div id="sidebar-toggle" class="sidebar-toggle">
<span></span>
</div>
</nav>
</div>
<div class="top-bar-right pull-right text-right">
<div class="top-admin">

  <?php if($islogin){ ?>
  <!--站点统计开始-->              
	
  
<a href="javascript:;" id="mStats" class="stats_click"><i class="icon iconfont icon-paihangbang"></i> 统计						<div class="stats">
							<ul>
														
																					<li>文章总数：<?php echo M('article')->getCount(['isshow'=>1]) ?> 篇</li>
								<li>会员总数：<?php echo M('member')->getCount() ?> 个</li>
							<li>留言总数：<?php echo M('message')->getCount(['isshow'=>1]) ?> 条</li>
						
							
							<li>分类总数：<?php   $num = M($v['molds'])->getCount('isshow=1 and tid in('.implode(",",$classtypedata[$v['id']]["children"]["ids"]).')');  ?>
<?php echo $num ?> 个</li>

							</ul>
						</div>	
</a>
	
					<!--站点统计结束-->
						<div class="login avt_tl">
			            							
							<div class="avt_cl"><img src="<?php if(!$member['litpic']){ ?><?php echo $common ?>user/images/login.png<?php }else{ ?><?php echo $member['litpic'] ?><?php } ?>" width="25px" height="25px" class="navtar" ><!--s--><div class="header__dropdown"> 
			
			<div class="header-box"> 
			<div class="refresh-header-top"> 
			
			<div class="header-top"> 
			
			<a class="user-names" href="<?php echo U('user/index') ?>">
			<img src="<?php if(!$member['litpic']){ ?><?php echo $common ?>user/images/login.png<?php }else{ ?><?php echo $member['litpic'] ?><?php } ?>" >			</a> 
			
			<span> <a class="user-names"  href="<?php echo U('user/index') ?>"><?php echo $member['username'] ?></a> <i  href="<?php echo U('user/index') ?>" class="wp wp-VIP"> 进入个人中心 </i>  </span> <p>注册会员，享受下载全站资源特权。</p>
			<a href="<?php echo U('login/loginout') ?>" class="logout" title="退出"><i class="icon iconfont icon-shibai"></i></a>
			</div></div> 
			
			
			<div class="header-center"> <div class="md-l"> <span class="md-tit">交易信息</span> 
			<span class="jinbi">账号ID：21</span> <span class="dou">性别：<span><?php if($member['sex']==1){ ?>男<?php }else if($member['sex']==2){ ?>女<?php }else{ ?>未知<?php } ?></span></p>
		 </div> <div class="md-r"> <span class="md-tit">个人信息</span> <span class="jinbi"></span> 
		
			<span class="dou" title="<?php echo $member['email'] ?>"><?php echo $member['email'] ?></span> 
			</div> </div>
			
			</div> </div>							<!--e-->
			<?php }else{ ?>
  
  <!--站点统计开始-->              
	
  
<a href="javascript:;" id="mStats" class="stats_click"><i class="icon iconfont icon-paihangbang"></i> 统计						<div class="stats">
							<ul>
														
																					<li>文章总数：<?php echo M('article')->getCount(['isshow'=>1]) ?> 篇</li>
								<li>会员总数：<?php echo M('member')->getCount() ?> 个</li>
							<li>留言总数：<?php echo M('message')->getCount(['isshow'=>1]) ?> 条</li>
						
							
							<li>分类总数：<?php   $num = M($v['molds'])->getCount('isshow=1 and tid in('.implode(",",$classtypedata[$v['id']]["children"]["ids"]).')');  ?>
<?php echo $num ?> 个</li>

							</ul>
						</div>	
</a>
  
					<!--站点统计结束-->
					<!--站点统计结束-->
						<div class="login avt_tl">
			            			                <i class="icon iconfont icon-zengjia"></i><span>登录			                
			                <!--s-->
						
			                <div class="header__dropdown"> 
			
<div class="login-div notlogin">
<div class="info">
<div class="info-thumb"> <i class="thumb" style="background-image:url(<?php echo $tpl ?>style//images/wu-user.png);"></i> </div>
<h2 class="user-name">您还未登录</h2>
<h4 class="user-info">登录体验更多功能</h4>
<a href="<?php echo U('user/index') ?>" class="modal-open btn btn-orange info-btn"> 立即登录 </a>

</div>

</div>
	<?php } ?>
<style>
.login-div {
    background: #fff;
    border-radius: 3px;
    overflow: hidden;
}
.login-div .info {
   
    position: relative;
    padding: 10px 80px;
}
.login-div .info .info-thumb {
    width: 50px;
    position: absolute;
    left: 10px;
    top: 8px;
    border: 4px solid #fff;
    box-shadow: 0 0 30px 0 #eee;
    border-radius: 100%;
}
.login-div .info .info-thumb .thumb {
    padding-top: 100%;
    border-radius: 100%;
    transition: none;
}
.login-div .info h2 {
    font-size: 14px;
    color: #333;
    margin-bottom: 6px;
    line-height: 1.5;
    height: 1.5em;
    overflow: hidden;
}
.login-div .info h4 {
    font-size: 12px;
    color: #888;
    font-weight: normal;
    line-height: 1.5;
    height: 1.5em;
    overflow: hidden;
    margin-bottom: 0px;
}
.login-div .info .info-btn {
        position: absolute;
    right: 20px;
    top: 15px;
    padding: 2px 10px;
    z-index: 10;
    font-size: 12px;
}
.login-div .info .info-btn:hover{ color:#fff; }
</style>
			
</div>			                <!--e-->
			                
			                </span>
			                
			            			            </div>
						<input class="wb-switch" id="J_themesSwitchBtn" type="checkbox" onclick="javascript:switchNightMode()">                
                        <!--夜间白天-->
				</div>
			</div>  
</div>
<!--e-->  

	<div id="percentageCounter"></div>
	</div><!-- .top-bar -->
	<div class="container">
	<main id="main" class="site-main">	<div class="row">
<div class="col-md-9 contpost" >
		
<div class="main-slider row">
<div class="sp-slideshow">	
<!-- 首页广告轮播 -->
<div class="swiper-container">
<div class="swiper-wrapper">

<?php
		$v_table ='collect';
		$v_w=' 1=1 and tid=1 and isshow=\'1\' ';
		$v_order='orders desc';
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
<div class="swiper-slide"><a class="block-fea" href="<?php echo $v['url'] ?>" title="<?php echo $v['title'] ?>" style="background-image: url(<?php echo $v['litpic'] ?>);">
<div class="entyr-icon"><i class="icon iconfont icon-shoucang"></i></div><header class="video-header"><span class="video-title">
<span class="badge arc_v2">推荐</span><?php echo $v['title'] ?></span></header></a></div>
<?php } ?>
<!-- Sw -->
</div>
<!-- 首页侧栏广告 -->
<div class="swiper-pagination"></div>
</div>			
</div><!-- sp-slideshow -->
<div class="small-slider">
<?php
		$v_table ='collect';
		$v_w=' 1=1 and tid=2 and isshow=\'1\' ';
		$v_order='orders desc';
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
<div class="small-slider-item"><a href="<?php echo $v['url'] ?>"  style="background-image: url(<?php echo $v['litpic'] ?>);" class="small-slider-img"><div class="title">

<span class="badge arc_v2">推荐</span><?php echo $v['title'] ?></div></a><div class="entyr-icon"><i class="icon iconfont icon-shoucang"></i></div></div>

<?php } ?>
<!-- s -->
</div></div>
<div class="part-mor contt top-news">
<div class="section-cont">
<div class="items">



<div class="item"><div class="hunter-item">


</a></div></div>
</div>
</div>
</div>

		<header class="site-header">
        <nav class="main-navigation">
		<ul class="menu-nav-inline">
		<li class="menu-item active"> 最新文章 </a> </li>
        
		<div class="primary-menu" >
		<ul class="_container" id="gogo">

		</div>	        
        </nav>
	</header><!-- #masthead -->
		
<div class="row" id="content">




<script>
    window.onload = function () {
        var dv = document.getElementById('projList'), ox;
        //上一次的位置 scrollLeft
        var last_left = 0;
        dv.onmousemove = function (e) {
            dv.onmousemove = mousemove;
            dv.onmouseup = mouseup;
            e = e || window.event;
            //如果上次有记录
            if(last_left > 0 ){
                //就减掉上次的距离
                ox = e.clientX-last_left;
            }else{
                ox = e.clientX- dv.scrollLeft;
                ox = e.clientX;
            }
            dv.className = 'aui-slide-item-list';
        };
        function mousemove(e) {
            e = e || window.event;
            
            dv.scrollLeft = e.clientX - ox;
        }
        function mouseup() {
            dv.className = 'aui-slide-item-list';
            dv.onmouseup = dv.onmousemove = null;
            
        }

    }()
</script>


<!-- 置顶-->
<?php
		$v_table ='article';
		$v_w=' 1=1  and  tid in('.implode(",",$classtypedata[1]["children"]["ids"]).') and istop=\'1\' ';
		$v_order=' id desc ';
		$v_fields=null;
		$v_limit='2';
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

<article class="post-list contt blockimg " id="post_264">
                <div class="entry-container"><span class="laid_title_l"></span>
                    <div class="block-image feaimg">
                    <a id="post_a_264" class="block-fea scrollLoading" style="background-image:url(<?php echo $v['litpic'] ?>)" href="<?php echo $v['url'] ?>" 
					title="<?php echo $v['title'] ?>" ><i class="mask"></i>
                    <span class="vodlist_top"><em class="voddate voddate_year"><?php echo $classtypedata[$v['tid']]['classname'] ?></em></span>

</a> <div class="entyr-icon"><i class="icon iconfont icon-tupian"></i></div>                    </div>
                    <header class="entry-header"><span class="entry-title"><a href="<?php echo $v['url'] ?>"><span class='badge arc_v6'>置顶</span><?php echo $v['title'] ?></a></span></header>
                    <div class="entry-summary ss"><p><?php echo $v['description'] ?></p></div>
                    <div class="entry-meta">

<?php if($v['member_id']){ ?>
 <a href="user/active/uname/<?php echo memberInfo($v['member_id'],'username') ?>">

 <img src="<?php if(!memberInfo($v['member_id'],'litpic')){ ?>https://q1.qlogo.cn/g?b=qq&nk=<?php echo $webconf['web_qq'] ?>&src_uin=www.jlwz.cn&s=0<?php }else{ ?><?php echo memberInfo($v['member_id'],'litpic') ?><?php } ?>" srcset="<?php if(!memberInfo($v['member_id'],'litpic')){ ?>https://q1.qlogo.cn/g?b=qq&nk=<?php echo $webconf['web_qq'] ?>&src_uin=www.jlwz.cn&s=0<?php }else{ ?><?php echo memberInfo($v['member_id'],'litpic') ?><?php } ?>" class="avatar avatar-140 photo" height="25" width="25"><?php echo memberInfo($v['member_id'],'username') ?></a>
<?php }else{ ?>


 <img src="<?php if(!memberInfo($v['member_id'],'litpic')){ ?>https://q1.qlogo.cn/g?b=qq&nk=<?php echo $webconf['web_qq'] ?>&src_uin=www.jlwz.cn&s=0<?php }else{ ?><?php echo memberInfo($v['member_id'],'litpic') ?><?php } ?>" srcset="<?php if(!memberInfo($v['member_id'],'litpic')){ ?>https://q1.qlogo.cn/g?b=qq&nk=<?php echo $webconf['web_qq'] ?>&src_uin=www.jlwz.cn&s=0<?php }else{ ?><?php echo memberInfo($v['member_id'],'litpic') ?><?php } ?>" class="avatar avatar-140 photo" height="25" width="25">苏七</a>
<?php } ?>
<span class="separator">/</span><a href="<?php echo $v['url'] ?>"><?php echo $classtypedata[$v['tid']]['classname'] ?></a><span class="separator">/</span><time datetime="<?php echo date('Y-m-d',$v['addtime']) ?>"><?php echo date('Y-m-d H:i:s',$v['addtime']) ?></time>
                        <span class="separator">/</span>
                        <?php echo $v['hits'] ?>阅读</div> </div> </article> 

<?php } ?>



<!-- 热文-->
<?php
		$v_table ='article';
		$v_w=' 1=1  and  tid in('.implode(",",$classtypedata[1]["children"]["ids"]).') and ishot=\'1\' ';
		$v_order=' id desc ';
		$v_fields=null;
		$v_limit='2';
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

<article class="post-list contt blockimg " id="post_264">
                <div class="entry-container"><span class="laid_title_l"></span>
                    <div class="block-image feaimg">
                    <a id="post_a_264" class="block-fea scrollLoading" style="background-image:url(<?php echo $v['litpic'] ?>)" href="<?php echo $v['url'] ?>" 
					title="<?php echo $v['title'] ?>" ><i class="mask"></i>
                    <span class="vodlist_top"><em class="voddate voddate_year"><?php echo $classtypedata[$v['tid']]['classname'] ?></em></span>

</a> <div class="entyr-icon"><i class="icon iconfont icon-tupian"></i></div>                    </div>
                    <header class="entry-header"><span class="entry-title"><a href="<?php echo $v['url'] ?>"><span class="badge arc_v4">热文</span><?php echo $v['title'] ?></a></span></header>
                    <div class="entry-summary ss"><p><?php echo $v['description'] ?></p></div>
                    <div class="entry-meta">

<?php if($v['member_id']){ ?>
 <a href="user/active/uname/<?php echo memberInfo($v['member_id'],'username') ?>">

 <img src="<?php if(!memberInfo($v['member_id'],'litpic')){ ?>https://q1.qlogo.cn/g?b=qq&nk=<?php echo $webconf['web_qq'] ?>&src_uin=www.jlwz.cn&s=0<?php }else{ ?><?php echo memberInfo($v['member_id'],'litpic') ?><?php } ?>" srcset="<?php if(!memberInfo($v['member_id'],'litpic')){ ?>https://q1.qlogo.cn/g?b=qq&nk=<?php echo $webconf['web_qq'] ?>&src_uin=www.jlwz.cn&s=0<?php }else{ ?><?php echo memberInfo($v['member_id'],'litpic') ?><?php } ?>" class="avatar avatar-140 photo" height="25" width="25"><?php echo memberInfo($v['member_id'],'username') ?></a>
<?php }else{ ?>


 <img src="<?php if(!memberInfo($v['member_id'],'litpic')){ ?>https://q1.qlogo.cn/g?b=qq&nk=<?php echo $webconf['web_qq'] ?>&src_uin=www.jlwz.cn&s=0<?php }else{ ?><?php echo memberInfo($v['member_id'],'litpic') ?><?php } ?>" srcset="<?php if(!memberInfo($v['member_id'],'litpic')){ ?>https://q1.qlogo.cn/g?b=qq&nk=<?php echo $webconf['web_qq'] ?>&src_uin=www.jlwz.cn&s=0<?php }else{ ?><?php echo memberInfo($v['member_id'],'litpic') ?><?php } ?>" class="avatar avatar-140 photo" height="25" width="25">苏七</a>
<?php } ?>
<span class="separator">/</span><a href="<?php echo $v['url'] ?>"><?php echo $classtypedata[$v['tid']]['classname'] ?></a><span class="separator">/</span><time datetime="<?php echo date('Y-m-d',$v['addtime']) ?>"><?php echo date('Y-m-d H:i:s',$v['addtime']) ?></time>
                        <span class="separator">/</span>
                        <?php echo $v['hits'] ?>阅读</div> </div> </article> 

<?php } ?>




<!-- 推荐-->
<?php
		$v_table ='article';
		$v_w=' 1=1  and  tid in('.implode(",",$classtypedata[1]["children"]["ids"]).') and ishot=\'1\' ';
		$v_order=' id desc ';
		$v_fields=null;
		$v_limit='2';
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

<article class="post-list contt blockimg " id="post_264">
                <div class="entry-container"><span class="laid_title_l"></span>
                    <div class="block-image feaimg">
                    <a id="post_a_264" class="block-fea scrollLoading" style="background-image:url(<?php echo $v['litpic'] ?>)" href="<?php echo $v['url'] ?>" 
					title="<?php echo $v['title'] ?>" ><i class="mask"></i>
                    <span class="vodlist_top"><em class="voddate voddate_year"><?php echo $classtypedata[$v['tid']]['classname'] ?></em></span>

</a> <div class="entyr-icon"><i class="icon iconfont icon-tupian"></i></div>                    </div>
                    <header class="entry-header"><span class="entry-title"><a href="<?php echo $v['url'] ?>"><span class="badge arc_v2">推荐</span><?php echo $v['title'] ?></a></span></header>
                    <div class="entry-summary ss"><p><?php echo $v['description'] ?></p></div>
                    <div class="entry-meta">

<?php if($v['member_id']){ ?>
 <a href="user/active/uname/<?php echo memberInfo($v['member_id'],'username') ?>">

 <img src="<?php if(!memberInfo($v['member_id'],'litpic')){ ?>https://q1.qlogo.cn/g?b=qq&nk=<?php echo $webconf['web_qq'] ?>&src_uin=www.jlwz.cn&s=0<?php }else{ ?><?php echo memberInfo($v['member_id'],'litpic') ?><?php } ?>" srcset="<?php if(!memberInfo($v['member_id'],'litpic')){ ?>https://q1.qlogo.cn/g?b=qq&nk=<?php echo $webconf['web_qq'] ?>&src_uin=www.jlwz.cn&s=0<?php }else{ ?><?php echo memberInfo($v['member_id'],'litpic') ?><?php } ?>" class="avatar avatar-140 photo" height="25" width="25"><?php echo memberInfo($v['member_id'],'username') ?></a>
<?php }else{ ?>


 <img src="<?php if(!memberInfo($v['member_id'],'litpic')){ ?>https://q1.qlogo.cn/g?b=qq&nk=<?php echo $webconf['web_qq'] ?>&src_uin=www.jlwz.cn&s=0<?php }else{ ?><?php echo memberInfo($v['member_id'],'litpic') ?><?php } ?>" srcset="<?php if(!memberInfo($v['member_id'],'litpic')){ ?>https://q1.qlogo.cn/g?b=qq&nk=<?php echo $webconf['web_qq'] ?>&src_uin=www.jlwz.cn&s=0<?php }else{ ?><?php echo memberInfo($v['member_id'],'litpic') ?><?php } ?>" class="avatar avatar-140 photo" height="25" width="25">苏七</a>
<?php } ?>
<span class="separator">/</span><a href="<?php echo $v['url'] ?>"><?php echo $classtypedata[$v['tid']]['classname'] ?></a><span class="separator">/</span><time datetime="<?php echo date('Y-m-d',$v['addtime']) ?>"><?php echo date('Y-m-d H:i:s',$v['addtime']) ?></time>
                        <span class="separator">/</span>
                        <?php echo $v['hits'] ?>阅读</div> </div> </article> 

<?php } ?>



<!----最近更新----->


<?php
		$v_table ='article';
		$v_w=' 1=1 ';
		$v_order='orders desc,addtime desc';
		$v_fields=null;
		$v_limit='5';
			$pagenum = $frpage;
			$v_page = new FrPHP\Extend\Page($v_table);
			$v_page->typeurl = 'tpl';
			$v_page->paged = 'page';
			$v_data = $v_page->where($v_w)->fields($v_fields)->orderby($v_order)->limit($v_limit)->page($pagenum)->go();
			$v_pages = $v_page->pageList(3,'?page=');
			$v_sum = $v_page->sum;
			$v_listpage = $v_page->listpage;
			$v_prevpage = $v_page->prevpage;
			$v_nextpage = $v_page->nextpage;
			$v_allpage = $v_page->allpage;$v_n=0;foreach($v_data as $v_key=> $v){
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

<article class="post-list contt blockimg " id="post_264">
                <div class="entry-container"><span class="laid_title_l"></span>
                    <div class="block-image feaimg">
                    <a id="post_a_264" class="block-fea scrollLoading" style="background-image:url(<?php echo $v['litpic'] ?>)" href="<?php echo $v['url'] ?>" 
					title="<?php echo $v['title'] ?>" ><i class="mask"></i>
                    <span class="vodlist_top"><em class="voddate voddate_year"><?php echo $classtypedata[$v['tid']]['classname'] ?></em></span>

</a> <div class="entyr-icon"><i class="icon iconfont icon-tupian"></i></div>                    </div>
                    <header class="entry-header"><span class="entry-title"><a href="<?php echo $v['url'] ?>"><?php echo $v['title'] ?></a></span></header>
                    <div class="entry-summary ss"><p><?php echo $v['description'] ?></p></div>
                    <div class="entry-meta">

<?php if($v['member_id']){ ?>
 <a href="user/active/uname/<?php echo memberInfo($v['member_id'],'username') ?>">

 <img src="<?php if(!memberInfo($v['member_id'],'litpic')){ ?>https://q1.qlogo.cn/g?b=qq&nk=<?php echo $webconf['web_qq'] ?>&src_uin=www.jlwz.cn&s=0<?php }else{ ?><?php echo memberInfo($v['member_id'],'litpic') ?><?php } ?>" srcset="<?php if(!memberInfo($v['member_id'],'litpic')){ ?>https://q1.qlogo.cn/g?b=qq&nk=<?php echo $webconf['web_qq'] ?>&src_uin=www.jlwz.cn&s=0<?php }else{ ?><?php echo memberInfo($v['member_id'],'litpic') ?><?php } ?>" class="avatar avatar-140 photo" height="25" width="25"><?php echo memberInfo($v['member_id'],'username') ?></a>
<?php }else{ ?>


 <img src="<?php if(!memberInfo($v['member_id'],'litpic')){ ?>https://q1.qlogo.cn/g?b=qq&nk=<?php echo $webconf['web_qq'] ?>&src_uin=www.jlwz.cn&s=0<?php }else{ ?><?php echo memberInfo($v['member_id'],'litpic') ?><?php } ?>" srcset="<?php if(!memberInfo($v['member_id'],'litpic')){ ?>https://q1.qlogo.cn/g?b=qq&nk=<?php echo $webconf['web_qq'] ?>&src_uin=www.jlwz.cn&s=0<?php }else{ ?><?php echo memberInfo($v['member_id'],'litpic') ?><?php } ?>" class="avatar avatar-140 photo" height="25" width="25">苏七</a>
<?php } ?>
<span class="separator">/</span><a href="<?php echo $v['url'] ?>"><?php echo $classtypedata[$v['tid']]['classname'] ?></a><span class="separator">/</span><time datetime="<?php echo date('Y-m-d',$v['addtime']) ?>"><?php echo date('Y-m-d H:i:s',$v['addtime']) ?></time>
                        <span class="separator">/</span>
                        <?php echo $v['hits'] ?>阅读</div> </div> </article> 

<?php } ?>

     



   <!--分页-->  	
</div>
<ol class="page-navigator cck">
<?php if($v_listpage['list']){ ?>
<li class="current">

	
	<li class=" <?php if($v_listpage['prev']){ ?>css<?php } ?>"><a href="<?php echo $v_listpage['prev'] ?>" >上一页</a></li>
	<?php $ss_n=0;foreach( $v_listpage['list'] as $ss){ $ss_n++;?>
	<li class="<?php if($ss['num']==$v_listpage['current_num']){ ?>current <?php } ?>"><a href="<?php echo $ss['url'] ?>" ><?php echo $ss['num'] ?></a></li>
	<?php } ?>
	<li class=" <?php if($v_listpage['next']){ ?>css<?php } ?>"><a href="<?php echo $v_listpage['next'] ?>" >下一页</a></li>
<?php } ?> 
</div> 
   
   
     <!--s--> 
    <!--首页右边广告--> 
<div class="col-md-3 widget-area " id="secondary">
        <section class="widget_img"><div class="adTags"><div class="adTag">广告</div>
		<?php
		$v_table ='collect';
		$v_w=' 1=1 and tid=4 and isshow=\'1\' ';
		$v_order='orders desc';
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
<a target="_blank" href=""> <img src="<?php echo $v['litpic'] ?>"> </a></div>
<?php } ?>
</section>
     <!--s--> 
         <section class="widget hunter-widget-hunter-authors g_m_i">
	<h4 class="widget-title"><i class="icon iconfont icon-wodeguanzhu"></i> <span>管理员</span></h4>
	<div class="hunter-cont">
    <ul class="hunter-authors">
      <?php    $articlenum = M('article')->getCount(['isshow'=>1]);   ?>
 <?php
		$v_table ='article';
		$v_w=' 1=1 ';
		$v_order=' id desc ';
		$v_fields=null;
		$v_limit='1';
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
 <?php if($v['member_id']){ ?>
<li><div class="item"><div class="hunter-avatar">
<a href="user/active/uname/<?php echo memberInfo($v['member_id'],'username') ?>"><div class="vatar">
<img src="<?php if(!memberInfo($v['member_id'],'litpic')){ ?><?php echo $common ?>user/images/login.png<?php }else{ ?><?php echo memberInfo($v['member_id'],'litpic') ?><?php } ?>">
<img class="va_v_honor" src="<?php echo $tpl ?>style//picture/authen.svg" title="认证用户"></div></a>
</div><div class="item-main"><div class="work"><?php echo memberInfo($v['member_id'],'username') ?><h4>阅读   <i></i><?php echo $v['hits'] ?>篇</h4></div></div></li> 
 <?php }else{ ?>

  
  <li><div class="item"><div class="hunter-avatar">
<a href="user/active/uname/<?php echo memberInfo($v['member_id'],'username') ?>"><div class="vatar">
<img src="<?php if(!memberInfo($v['member_id'],'litpic')){ ?>https://q1.qlogo.cn/g?b=qq&nk=<?php echo $webconf['web_qq'] ?>&src_uin=www.jlwz.cn&s=0<?php }else{ ?><?php echo memberInfo($v['member_id'],'litpic') ?><?php } ?>">
<img class="va_v_honor" src="<?php echo $tpl ?>style//picture/authen.svg" title="认证用户"></div></a>
</div><div class="item-main"><div class="work">苏七<h4>文章 <?php echo $articlenum ?>篇</h4></div></div></li>
<?php } ?>	
 
    <?php } ?>
	
	
</ul>
</div>
</section>
    <!--s--> 
 

  
  
  
   
<section class="widget abautor g_m_i">
<h4 class="widget-title"><i class="icon iconfont icon-paihangbang"></i> <span>置顶文章</span></h4> 
<?php
		$v_table ='article';
		$v_w=' 1=1 and istop=\'1\' ';
		$v_order='addtime desc';
		$v_fields=null;
		$v_limit='1';
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
<div class="box-top"><a href="<?php echo $v['url'] ?>">
<div class="box-img" style="background-image:url(<?php echo $v['litpic'] ?>);"></div>
</a><div class="box-avatar"><div class="box-avatar-left author-infos" data-id="121">
<img class="rounded-circle" src="https://q1.qlogo.cn/g?b=qq&nk=<?php echo $webconf['web_qq'] ?>&src_uin=www.jlwz.cn&s=0" width="40px" height="40px">
<div class="author-info-card"></div></div><div class="box-avatar-right"><span>
<a href="<?php echo $v['url'] ?>"><?php echo $v['title'] ?></a>
</span></div></div></div><div class="widget-box-intro"><i class="icon iconfont icon-dianzan1">
</i> <?php echo jz_zan($v['tid'],$v['id']) ?>赞，<i class="icon iconfont icon-remen"></i> 阅读：<?php echo $v['hits'] ?></div></section>

  <?php } ?>

  
    <!--s--> 
<section class="widget widget-hunter-topics g_m_i">
	<h4 class="widget-title"><i class="icon iconfont icon-huatifuhao"></i> <span>标签TAG</span></h4>
	<div class="items">	
	<?php
		$v_table ='tags';
		$v_w=' 1=1 and isshow=\'1\' ';
		$v_order=' id desc ';
		$v_fields=null;
		$v_limit='15';
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
    <div class="item "><div class="wall-item">
	
	<a href="<?php echo U('tags/index',['tagname'=>$v['keywords']]) ?>" rel="tag"><h2> <i class="clr_orange">#</i> <?php echo $v['keywords'] ?> </h2></a></div></div>
		<?php } ?>
</div>
</section>
      <!--s--> 
     <section class="widget g_m_i">
		<h4 class="widget-title"><i class="icon iconfont icon-taolunqu"></i> <span>热点文章</span></h4>
        <ul class="posts-widget">
           <?php
		$v_table ='article';
		$v_w=' 1=1 and ishot=\'1\' ';
		$v_order='addtime desc';
		$v_fields=null;
		$v_limit='6';
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
        <li><div class="widget-posts-text">
		<a class="widget-posts-title" href="<?php echo $v['url'] ?>" 
		title="<?php echo $v['title'] ?>"><i class="icon iconfont icon-icon-test29">
		</i><?php echo $v['title'] ?></a><div class="widget-posts-meta"><i><?php echo $v['comment_num'] ?> 评论</i></div></div></li><li>
		
		
		
		<?php } ?>
	        </ul>
    </section>
         
   	<div class="widget-fixed">
            

</div>
</main>
</div><!-- .container -->
<footer class="site-footer fsi">

<div class="news-foot">
<div class="container"><div class="part-news-foot">
  <h2 class="section-title">
  <i class="icon iconfont icon-icon-test25"></i>  <?php echo $classtypedata[2]['classname'] ?>	  </h2>
 <div class="section-content">    
     <?php
		$v_table ='article';
		$v_w=' 1=1  and  tid in('.implode(",",$classtypedata[2]["children"]["ids"]).') ';
		$v_order='addtime desc';
		$v_fields=null;
		$v_limit='5';
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
	 <div class="item">
            
                <div class="item-thumb">
				<div class="feaimg"><a href="<?php echo $v['url'] ?>" class="block-fea scrollLoading" style="background-image:url(<?php echo $v['litpic'] ?>)" ></a>
				<div class="entyr-icon ico-p"><i class="icon iconfont icon-icon-test15"></i></div></div></div>
                <div class="item-main">
                <div class="t_tl">
				<a href="<?php echo $v['url'] ?>"><?php echo $v['title'] ?></a></div>
                
               <div class="t_tls a_cl"> <span>
			   <img src="<?php echo $v['litpic'] ?>"
			   srcset="<?php if(!memberInfo($v['member_id'],'litpic')){ ?>https://q1.qlogo.cn/g?b=qq&nk=<?php echo $webconf['web_qq'] ?>&src_uin=www.jlwz.cn&s=0<?php }else{ ?><?php echo memberInfo($v['member_id'],'litpic') ?><?php } ?>" class="avatar photo" height="22" width="22"> 苏七</span>
                 <span><?php echo $v['hits'] ?>阅读</span></div>
                </div>

              
            </div>  
	   <?php } ?>
             </div>

</div>
</div>
</div>

    <div class="site-info clearfix">
        <div class="container">        
		<!--左边-->
   
       <div class="footer-left">
            <div class="footer-l-top">
			 
						
						<a href="/">在线留言</a>
						<a href="/">排行榜</a>
						<a href="/">关于我们</a>
						</div>
           <!-- 友情链接 -->               
            <div class="footer-l-btm">
            <p><?php echo $webconf['web_name'] ?></p>
			<p></p>
			<p class="links">友情链接：
			<?php
		$v_table ='links';
		$v_w=' 1=1 and isshow=\'1\' ';
		$v_order='orders desc';
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
			<a  target="_blank" href="<?php echo $v['url'] ?>"><?php echo $v['title'] ?></a></p>			</div>
                     <?php } ?>
					 <!-- 友情链接 end -->
        </div>
		<!--右边-->
        <div class="footer-right">
		            
        		<!--右边-->
        <div class="footer-right">
		            
        </div>
        </div>
    </div>    





<script src="<?php echo $tpl ?>style//js/swiper.min.js"></script>
<script src="<?php echo $tpl ?>style//js/getcon.js"></script> 
<div class="mobile-overlay"></div>
  
<script src="<?php echo $tpl ?>style//js/script.js"></script>
<script src="<?php echo $tpl ?>style//js/viewhistory.js"></script>
<script src="<?php echo $tpl ?>style//js/instantpage-5.1.0.js" type="module" defer></script>
<!--<script type="text/javascript">hljs.initHighlightingOnLoad();</script> -->
<script>


   
<script>
    var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    centeredSlides: true,
    autoplay: 3500,
    slidesPerView: 1,
    paginationClickable: true,
    autoplayDisableOnInteraction: false,
    spaceBetween: 0,
    loop: true
});

//点赞
	function data-cid(tid,id){
		$.ajax({
				 url:"<?php echo U('user/likesAction') ?>",//请求的url地址
				 dataType:"json",//返回格式为json
				 async:true,//请求是否异步，默认为异步，这也是ajax重要特性
				 data:{tid:tid,id:id,ajax:1},//参数值
				 type:"POST",//请求方式
				 beforeSend:function(){
					//请求前的处理
					},
					 success:function(r){
						if(r.code==0){
							alert(r.msg);
							window.location.reload();
						}else{
							alert(r.msg);
						}
							
					},
					 complete:function(){
					//请求完成的处理
					},
					 error:function(){
					//请求出错处理
						alert('网络错误');
					}

						
				
			})
	}
	function comment(zid,pid){
	$("#zid").val(zid);
	$("#pid").val(pid);
	if(pid!=0){
		//如果不是第一层评论，则@评论人昵称--特殊规则
		//如果要更改样式，请对应修改Home/CommentController.php里面内容
		var u = $('#comment_level_'+pid).html();
		$("#commentx").html('[@'+u+']');
	}
	$("#commentx").focus();//跳到跳到评论框
}
function likes(tid,id){
$.ajax({
 url:"<?php echo U('user/likesAction') ?>",//请求的url地址
 dataType:"json",//返回格式为json
 async:true,//请求是否异步，默认为异步，这也是ajax重要特性
 data:{tid:tid,id:id,ajax:1},//参数值
 type:"POST",//请求方式
 beforeSend:function(){
//请求前的处理
},
 success:function(r){
if(r.code==0){
alert(r.msg);
window.location.reload();
}else{
alert(r.msg);
}
},
 complete:function(){
//请求完成的处理
},
 error:function(){
//请求出错处理
alert('网络错误');
}
})
}
</script>
 <script>
   function addcart(tid,id,num){
		$.ajax({
			 url:"<?php echo U('user/addcart') ?>",//请求的url地址
			 dataType:"json",//返回格式为json
			 async:true,//请求是否异步，默认为异步，这也是ajax重要特性
			 data:{tid:tid,id:id,num:num,ajax:1},//参数值
			 type:"POST",//请求方式
			 beforeSend:function(){
				//请求前的处理
				},
				 success:function(r){
					if(r.code==0){
						window.location.href=r.url;
					}else{
						alert(r.msg);
					}
						
				},
				 complete:function(){
				//请求完成的处理
				},
				 error:function(){
				//请求出错处理
					alert('网络错误');
				}

					
			
		})
   }
   
   //收藏 
	function collect(tid,id){
		$.ajax({
				 url:"<?php echo U('user/collectAction') ?>",//请求的url地址
				 dataType:"json",//返回格式为json
				 async:true,//请求是否异步，默认为异步，这也是ajax重要特性
				 data:{tid:tid,id:id,ajax:1},//参数值
				 type:"POST",//请求方式
				 beforeSend:function(){
					//请求前的处理
					},
					 success:function(r){
						if(r.code==0){
							alert(r.msg);
							window.location.reload();
						}else{
							alert(r.msg);
						}
							
					},
					 complete:function(){
					//请求完成的处理
					},
					 error:function(){
					//请求出错处理
						alert('网络错误');
					}

						
				
			})
	}
	   
   //点赞
	function likes(tid,id){
		$.ajax({
				 url:"<?php echo U('user/likesAction') ?>",//请求的url地址
				 dataType:"json",//返回格式为json
				 async:true,//请求是否异步，默认为异步，这也是ajax重要特性
				 data:{tid:tid,id:id,ajax:1},//参数值
				 type:"POST",//请求方式
				 beforeSend:function(){
					//请求前的处理
					},
					 success:function(r){
						if(r.code==0){
							alert(r.msg);
							window.location.reload();
						}else{
							alert(r.msg);
						}
							
					},
					 complete:function(){
					//请求完成的处理
					},
					 error:function(){
					//请求出错处理
						alert('网络错误');
					}

						
				
			})
	}

function likes(tid,id){
$.ajax({
 url:"<?php echo U('user/likesAction') ?>",//请求的url地址
 dataType:"json",//返回格式为json
 async:true,//请求是否异步，默认为异步，这也是ajax重要特性
 data:{tid:tid,id:id,ajax:1},//参数值
 type:"POST",//请求方式
 beforeSend:function(){
//请求前的处理
},
 success:function(r){
if(r.code==0){
alert(r.msg);
window.location.reload();
}else{
alert(r.msg);
}
},
 complete:function(){
//请求完成的处理
},
 error:function(){
//请求出错处理
alert('网络错误');
}
})
}
   </script>
