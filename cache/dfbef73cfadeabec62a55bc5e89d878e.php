<?php if (!defined('CORE_PATH')) exit();?><!DOCTYPE HTML>
<html class="no-js">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="applicable-device" content="pc,mobile">  
  
  
<title><?php echo $jz['title'] ?></title>
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
	<main id="main" class="site-main">	 
	<div class="row">
	<div class="col-md-9 contpost" id="content" >  
       
                
		<article class="post">
			<header class="entry-header page-header" >
			    <div class="">            
				<span class="badge arc_v3">推荐</span><span class="badge badge-hot"><a href="<?php echo $type['url'] ?>"><?php echo $type['classname'] ?></a></span>
                </div>
				<h1 class="entry-title page-title"><?php echo $v['title'] ?></h1>				
				<div class="contimg">
				<div class="author-infos" data-id="316">
				<img src="<?php echo $tpl ?>style//picture/1eb7441695154cd68d5f831af1516ee8.gif" srcset="<?php if(!$member['litpic']){ ?><?php echo $common ?>user/images/login.png<?php }else{ ?><?php echo $member['litpic'] ?><?php } ?>" class="avatar" height="35" width="35">				<div class="author-info-card">
					   <!--作者卡片-->
                       <!--作者卡片-->
					   </div>
				</div>
				</div>				
				<div class="entry-meta contpost-meta">					    
				    <a href="https://www.acgmkan.com/author/1">
				    <?php echo adminInfo($jz['userid'],'name') ?>					</a><span class="separator">/</span>					
										<time datetime="2021-01-07T07:56:00+08:00"><?php echo date('m-d',$jz['addtime']) ?></time>
										<span class="separator">/</span>
					<a href="https://www.acgmkan.com/316.html#comments"><?php echo $jz['comment_num'] ?> 评论</a>
					<span class="separator">/</span>
					<?php echo incrData('article',$jz['id'],'hits') ?> 阅读
					<span class="separator">/</span><?php echo jz_zan($jz['tid'],$jz['id']) ?> 赞
										<div class="site-lins">
<!-- 页面为文章单页时 -->
<span><a href="<?php echo $webconf['domain'] ?>" title="<?php echo $v['classname'] ?>">首页</a> <span class="sep">›</span> <a href="<?php echo $type['url'] ?>"><?php echo $type['classname'] ?></a> <span class="sep">›</span></span>
</div>				</div>
				<div class="postArticle-meta">
				
				</div>
				<div class="border-theme"></div>
			</header>
			<!--文章上方广告-->
            <div class="shadimg con_ad-top">           <!--文章上方广告-->
                         
			<div class="">
			    <p>	<?php echo $jz['description'] ?></p> 
				<p><?php echo $jz['body'] ?></p>  
				
				
				
				
<?php if($islogin){ ?>
<?php     $body = '||'.$jz['tid'].'-'.$jz['id'].'-'; ?>
<?php
		$v_table ='orders';
		$v_w=' 1=1 and userid=\''.$member['id'].'\' and ispay=\'1\'  and body like \'%'.$body.'%\' ';
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
<div class="read_outer"><a><i class="icon iconfont icon-shuju"></i> 解压密码：<?php echo $jz['jymm'] ?></a></div>
<div class="read_outer"><a><i class="icon iconfont icon-shuju"></i> 提取码：<?php echo $jz['xiazmm'] ?></a></div>
<div class="read_outer"><a href="<?php echo $jz['fufei'] ?>" ><i class="icon iconfont icon-shuju"></i> 百度网盘</a></div>
<?php } ?>
<?php if($v_n>0){ ?>
<br><br>
温馨提示：本站不提供安装，调试源码问题解决的服务！
<?php }else{ ?>
 <div class="Copyrightnew"><br><br>
内容需付费,暂时无法查看！<br> <br> <br> 
<button onclick="addcart(<?php echo $type['id'] ?>,<?php echo $jz['id'] ?>,1)" class="separator"  type="button">
<i class="icon-basket"></i> 加入购物车</button>
<button onclick="addcart(<?php echo $type['id'] ?>,<?php echo $jz['id'] ?>,1)" class="separator"  type="button">
<i class="icon-basket"></i> 价格:<?php echo $jz['price'] ?> 积分</button><br> 
</div>         <br> 
<?php } ?>
<?php }else{ ?>
<br><br>
未登录,无法查看下载地址！
<br> <br><br><br><br><br>
<?php } ?>





<!--<?php if($islogin){ ?>-->
<!--<?php if($member['gid']==2){ ?>-->
<!--<br><br>-->
<!--当前会员：永久会员-->

<!--可免费下载该资源！-->
<!--<div class="read_outer"><a><i class="icon iconfont icon-shuju"></i> 解压密码：<?php echo $jz['jymm'] ?></a></div>-->
<!--<div class="read_outer"><a><i class="icon iconfont icon-shuju"></i> 提取码：<?php echo $jz['xiazmm'] ?></a></div>-->
<!--<div class="read_outer"><a href="<?php echo $jz['fufei'] ?>" ><i class="icon iconfont icon-shuju"></i> 百度网盘</a></div>-->
<!--<br><br>-->
<!--<?php }else{ ?>-->
<!-- <div class="Copyrightnew"><br><br>-->
<!--所在用户组权限不足,请升级用户组<br> <br> <br> -->
<!--<br> -->
<!--</div>         <br> -->
<!--<?php } ?>-->

<!--<?php }else{ ?>-->
<!--<br><br>-->
<!--未登录,无法查看下载地址！-->
<!--<br> <br><br><br><br><br>-->
<!--<?php } ?>-->









              
                                <div class="Copyrightnew">本文来自投稿，不代表本站立场，如若转载，请注明出处：<?php echo $jz['url'] ?></div>               
                 
              </div>  
                        		<!--点赞s-->
                
                                
                <div class="dianzan text-center">
                    
                <button  type="button" id="agree-btn" data-cid="121" onclick="likes(<?php echo $type['id'] ?>,<?php echo $jz['id'] ?>)" data-url="<?php echo U('user/likesAction') ?>">
                <i class="icon iconfont icon-dianzan"></i>  
                <span>赞</span>
                <span class="agree-num"><?php echo jz_zan($jz['tid'],$jz['id']) ?></span>
                </button>
               
                <!--点赞e-->    
              	
              </div>
            <footer class="sider-footer">
			<div class="pos-r clearfix">
				<div class="share-box ">
 </div>
  <!--      <div class="weixin mouh" id="share-weixin">-->
		<!--	<i class="icon iconfont icon-icon-test38"></i>-->
		<!--	<div class="wx-t-x pos-a hide box" id="weixin-box">-->
		<!--        <img class="qrcode fl bor-3" src="https://api.pwmqr.com/qrcode/create/?url=<?php echo $jz['url'] ?>">-->
		<!--    </div>-->
		<!--</div>-->
  <!--      <span class="dot"></span>-->
  <!--      <a href=""  class="qzone">-->
		<!--<i class="icon iconfont icon-QQkongjian"></i>-->
		<!--</a>-->
        <span class="dot"></span>
        <a href="javascript:Share('tqq')" class="qq">
		<i class="icon iconfont icon-qq"></i>
		</a>
        <span class="dot"></span>
        <a href="javascript:Share('sina')" class="weibo">
		<i class="icon iconfont icon-weibo"></i>
		</a>
                  
        <span class="dot"></span>
        <a href="#comments" class="taolunqu">
		<i class="icon iconfont icon-taolunqu"></i>
		</a>
          
        <span class="dot"></span>
        <a href="javascript:addFavorite2()" class="weibo">
		<i class="icon iconfont icon-fuzhi"></i>
		</a>          
	    </div>              
        
        
		</div>

</footer>   
			<footer class="entry-footer fixed" id="footfix">
			    <div class="entry-bar-inner">
				<div class="post-tags">
				   
				<a href="<?php echo $v['url'] ?>"><?php echo $classtypedata[$v['tid']]['classname'] ?></a>                				</div>
				<div class="readlist">
				<div href="javascript:;" id="mClick" class="mobile_click">
                    <div class="share">					
					<div class="Menu-item"><a href="javascript:Share('tqq')"><i class="icon iconfont icon-qq"></i> QQ 分享</a></div>
					<div class="Menu-item"><a href="javascript:Share('sina')"><i class="icon iconfont icon-weibo"></i> 微博分享</a></div>
					<div class="Menu-item"><i class="icon iconfont icon-icon-test38"></i> 微信分享<img src="https://api.pwmqr.com/qrcode/create/?url=<?php echo $jz['url'] ?>"/>
				</div></div>
				<div><i class="icon iconfont icon-fenxiang" title="分享转发"> </i>分享</div>
				</div>
				<div class="read_outer"><a class="comiis_poster_a" href="javascript:;" title="生成封面"><i class="icon iconfont icon-tupian"></i> 封面</a></div>
				</div>
				</div>
			</footer>
			</article>
<!--下一篇上一篇--> 
<div class="entry-page">
<?php if($aprev){ ?>
<div class="entry-page-prev j-lazy" style="background-image: url(static/images/174005898.png)">
<a href="<?php echo $aprev['url'] ?>"> <span><?php echo $aprev['title'] ?></span> 
</a><div class="entry-page-info"> <span class="pull-left">« 上一篇</span> <span class="pull-right"><?php echo date('m-d',$v['addtime']) ?>

</span></div></div>
<?php }else{ ?>
<div class="entry-page-prev j-lazy" style="background-image: url(static/images/174005898.png)">
<a > <span>到头了</span> 
</a><div class="entry-page-info"> <span class="pull-left">« 上一篇</span> <span class="pull-right"><?php echo date('m-d',$v['addtime']) ?>

</span></div></div>
<?php } ?>
<?php if($anext){ ?>
<div class="entry-page-next j-lazy" style="background-image: url(static/images/2311276024.png)">
<a href="<?php echo $anext['url'] ?>"><span><?php echo $anext['title'] ?></span>
 </a><div class="entry-page-info"> <span class="pull-right">下一篇  »</span> <span class="pull-left"><?php echo date('m-d',$v['addtime']) ?></span></div></div> 
 <?php }else{ ?>
 <div class="entry-page-next j-lazy" style="background-image: url(static/images/2311276024.png)">
<a><span>到底了</span>
 </a><div class="entry-page-info"> <span class="pull-right">下一篇  »</span> <span class="pull-left"><?php echo date('m-d',$v['addtime']) ?></span></div></div> 
 <?php } ?>
</div>
<!--下一篇上一篇-->
	  
<!--	相关文章s-->
<!--        评论开启-->
    				
<!--<div class="part-mor">-->
<!--  <h3 class="section-title">-->
<!--    <span><i class="icon iconfont icon-icon-test25"></i> 相关推荐 </span>    -->
<!--  </h3>-->
<!--  <div class="section-cont">-->
<!--    <div class="items">	  -->
<!--	<?php
		$v_table ='article';
		$v_w=' 1=1 and tid='.$jz['tid'].'  and id not in('.$jz['id'].') ';
		$v_order='rand()';
		$v_fields=null;
		$v_limit='4';
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
			?>-->
<!--                  <div class="item"><div class="hunter-item"><a href="<?php echo $jz['url'] ?>" ><div class="hunter-thumb"><i class="thumb " style="background-image:url(<?php echo $jz['litpic'] ?>)"></i></div><h2><?php echo $jz['title'] ?></h2></a></div></div>-->
	  	      
<!--                  <?php } ?>-->
<!--	  </div>-->
<!--  </div>-->
<!--</div>      -->
<!--    	相关文章e-->
	
<?php if(!$islogin){ ?>
<div id="comments">
   
            <div id="respond-post-316" class="respond">

        	
        <div class="cancel-comment-reply">
        <a id="cancel-comment-reply-link" href="" rel="nofollow" style="display:none" onclick="return TypechoComment.cancelReply();">取消回复</a>        </div>
    

        <h3 id="response" class="comment-reply-title section-title"><span><i class="icon iconfont icon-pinglun"></i> 发表评论</span></h3>
        <form id="new_comment_form" method="post" action="" _lpchecked="1">
        <!--遮罩-->
                <div class="comment-overlay"> <div class="comment-overlay-login"><p>您必须<a href="<?php echo U('login/index') ?>">登录</a>才能评论哦~</p></div> </div>
                <!--遮罩-->
		<div class="comment_triggered" style="display: block;">
            <div class="input_body inp">
			                                <ul class="ident">
                    <li>
                        <input type="text" name="author" placeholder="昵称*" >
                    </li>
                    <li>
                        <input type="mail" name="mail" placeholder="邮件*" >
                    </li>                   
                </ul>
               
			                                       
            </div>
        </div>    
		<div class="new_comment"><textarea name="text" rows="3" class="textarea_box OwO-textarea" style="height: auto;" placeholder="说点什么把~" required></textarea></div> 
		<div class="input_body bottom"> <span class="OwO"></span><input type="submit" value="提交评论" class="comment_submit_button c_button">  </div> 
		</form>			 
    </div>
            <div class="allcomment-empy">成为第一个评论的人</div>
	</div>
	</div>
<?php }else{ ?>


        <h3 id="response" class="comment-reply-title section-title"><span><i class="icon iconfont icon-pinglun"></i> 发表评论</span></h3>
        <form id="new_comment_form" method="post" action="" _lpchecked="1">
        <!--遮罩-->
                <!--遮罩-->
		<div class="comment_triggered" style="display: block;">
            <div class="input_body inp">
			 					<div class="hasLogin">
							<img src="<?php if(!$member['litpic']){ ?><?php echo $common ?>user/images/login.png<?php }else{ ?><?php echo $member['litpic'] ?><?php } ?>" width="22px" height="22px" class="avatar hasLogin-author" ><?php echo $member['username'] ?> <a href="<?php echo U('login/loginout') ?>" title="Logout">退出 &raquo;</a>
					</div>	
						  
			                                       
            </div>
        </div>    
		<div class="new_comment"><textarea name="text" rows="3" class="textarea_box OwO-textarea" style="height: auto;" placeholder="说点什么把~" required></textarea></div> 
		<div class="input_body bottom"> <span class="OwO"></span><input type="submit" value="提交评论" class="comment_submit_button c_button">  </div> 
		</form>			 
    </div>

	
	<?php } ?>

	<div class="col-md-3 widget-area post_sider" id="secondary">
        <section class="widget abautor g_m_i">
        <h4 class="widget-title"><i class="icon iconfont icon-icon-test24"></i> <span>作者信息</span></h4>
        <div class="widget-list"> 
        <div class="av_v">  
		<a class="av_v_img" href="/user/active/uname/<?php echo memberInfo($jz['member_id'],'username') ?>"><img class="widget-about-image" src="https://q1.qlogo.cn/g?b=qq&nk=<?php echo $webconf['web_qq'] ?>&src_uin=www.jlwz.cn&s=0" srcset="https://q1.qlogo.cn/g?b=qq&nk=<?php echo $webconf['web_qq'] ?>&src_uin=www.jlwz.cn&s=0" class="avatar avatar-140 photo" height="70" width="70">        </a>
              
        </div>
        <div class="widget-about-intro">
        <div class="name">苏七</div>		
		<div class="widget-about-desc">文章 <?php echo M('article')->getCount(['isshow'=>1]) ?> 篇 <i>|</i> 8.2w 阅读</div>	
       
		<div class="widget-article-newest"><span>最新文章</span></div>
		<?php
		$v_table ='article';
		$v_w=' 1=1 ';
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
		<ul class="posts-widget"><li><div class="widget-posts-text"><a class="widget-posts-title" href="<?php echo $v['url'] ?>" title="<?php echo $v['title'] ?>"><i class="icon iconfont icon-icon-test29"></i> <?php echo $v['title'] ?></a><div class="widget-posts-meta"><i><?php echo $v['hits'] ?> 阅读</i></div></div></li>
		
	
		<?php } ?>
		
        </div> 		
        </div>
    </section>
	   <section class="widget g_m_i">
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
<div class="list-rounded my-n2">

<div class="py-2"><div class="ricon_rank rank1"><?php echo $v_n ?></div><div class="list-item list-overlay-content"><div class="media media-2x1"><a class="media-content" href="<?php echo $jz['url'] ?>"  style="background-image:url(<?php echo $v['litpic'] ?>);"><span class="overlay"></span></a></div><div class="list-content"><div class="list-body"><a href="<?php echo $jz['url'] ?>" class="list-title h-2x"><?php echo $jz['title'] ?></a></div><div class="list-footer"><div class="text-muted text-xs"><?php echo $v['hits'] ?> 阅读 ，<time class="d-inline-block"><?php echo date('m-d',$v['addtime']) ?></time>

</div></div></div></div></div>
<?php } ?>

</div>
</section>
   
       

  
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
         </div>
      </section></div></div>
      
      
	</div>
</main>
</div>


<!-- .container -->
<script type="text/javascript">
function Share(pType){
var pTitle = "<?php echo $jz['title'] ?>"; //待分享的标题
var pImage = "<?php echo $jz['litpic'] ?>"; //待分享的图片
var pContent = "<?php echo $jz['description'] ?>"; //待分享的内容
var pUrl = "<?php echo $jz['url'] ?>"; //当前的url地址
var pObj = jQuery("div[class='yogo_hc']").find("h4");
if(pObj.length){ pTitle = pObj.text();}
var pObj = jQuery("div[class='yogo_hcs']").find("em");
if(pObj.length){ pContent = pObj.text();  }
var pObj = jQuery("div[class='con_cons']").find("img");
if(pObj.length){ pImage = jQuery("div[class='con_cons']").find("img",0).attr("src");}
shareys(pType, pUrl, pTitle,pImage, pContent);
}
</script>
<script type="text/javascript">
$(".entry-content img").each(function(){
var imgsec=$(this).attr("src");
$(this).attr({"data-url":imgsec+"","src":"https://www.acgmkan.com/usr/themes/spimes/images/piex.gif"});
$(this).addClass("scrollLoading"); 
});
</script>
 <!--分享js--> 

<script src="<?php echo $tpl ?>style//js/html2canvas.min.js"></script>
<script src="<?php echo $tpl ?>style//js/common.js"></script>
<script>
	var poster_open = 'on';
	var txt1 = '长按识别二维码查看';
	var txt2 = '<?php echo $webconf['web_name'] ?>';
    var comiis_poster_start_wlat = 0;
	var comiis_rlmenu =  1;
	var comiis_nvscroll =  0;
    var comiis_poster_time_baxt;
    $(document).ready(function(){
        $(document).on('click', '.comiis_poster_a', function(e) {
            show_comiis_poster_ykzn();
        });
    });
    function comiis_poster_rrwz(){
        setTimeout(function(){
            html2canvas(document.querySelector(".comiis_poster_box_img"), {scale:2,useCORS:true}).then(canvas => {
                var img = canvas.toDataURL("image/jpeg", .9);
                document.getElementById('comiis_poster_images').src = img;
                $('.comiis_poster_load').hide();
                $('.comiis_poster_imgshow').show();
            });
        }, 100);
    }
    function show_comiis_poster_ykzn(){
        if(comiis_poster_start_wlat == 0){
            comiis_poster_start_wlat = 1;
            popup.open('<img src="https://www.acgmkan.com/usr/themes/spimes/poster/img/imageloading.gif" class="comiis_loading">');
			var url = window.location.href.split('#')[0];
			url = encodeURIComponent(url);
            var html = '<div id="comiis_poster_box" class="comiis_poster_nchxd">\n' +
                '<div class="comiis_poster_box">\n' +
                '<div class="comiis_poster_okimg">\n' +
                '<div style="padding:150px 0;" class="comiis_poster_load">\n' +
                '<div class="loading_color">\n' +
                '  <span class="loading_color1"></span>\n' +
                '  <span class="loading_color2"></span>\n' +
                '  <span class="loading_color3"></span>\n' +
                '  <span class="loading_color4"></span>\n' +
                '  <span class="loading_color5"></span>\n' +
                '  <span class="loading_color6"></span>\n' +
                '  <span class="loading_color7"></span>\n' +
                '</div>\n' +
                '<div class="comiis_poster_oktit">正在生成海报, 请稍候</div>\n' +
                '</div>\n' +
                '<div class="comiis_poster_imgshow" style="display:none">\n' +
                '<img src="" class="vm" id="comiis_poster_images">\n' +
                '<div class="comiis_poster_oktit">↑长按上图保存图片分享</div>\n' +
                '</div>\n' +
                '</div>\n' +
                '<div class="comiis_poster_okclose"><a href="javascript:;" class="comiis_poster_closekey"><img src="http://www.ayiu.xyz/static/upload/image/20210413/1618324927649797.png" class="vm"></a></div>\n' +
                '</div>\n' +
                '<div class="comiis_poster_box_img">\n' +
                '<div class="comiis_poster_img"><img src="<?php echo $jz['litpic'] ?>" class="vm" id="comiis_poster_image"></div>\n' +
                '<div class="comiis_poster_time"><?php echo date('Y-m-d',$v['addtime']) ?></div>\n' +
                '<div class="comiis_poster_tita"><?php echo $jz['title'] ?></div>\n' +
                '<div class="comiis_poster_txta"><?php echo $jz['description'] ?></div><div class="comiis_poster_x guig"></div>\n' +
                '<div class="comiis_poster_foot">\n' +
                '<img src="https://api.pwmqr.com/qrcode/create/?url=<?php echo $jz['url'] ?>" class="kmewm fqpl vm">\n' +
                '<img src="http://www.ayiu.xyz/static/upload/image/20210413/1618324765759386.png" class="kmzw vm"><span class="kmzwtip">'+txt1+'<br>'+txt2+'</span>\n' +
                '</div>\n' +
                '</div>\n' +
                '</div>';
            if(html.indexOf("comiis_poster") >= 0){
                comiis_poster_time_baxt = setTimeout(function(){
                    comiis_poster_rrwz();
                }, 5000);
                $('body').append(html);
                $('#comiis_poster_image').on('load',function(){
                    clearTimeout(comiis_poster_time_baxt);
                    comiis_poster_rrwz();
                });
                popup.close();
                setTimeout(function() {
                    $('.comiis_poster_box').addClass("comiis_poster_box_show");
                    $('.comiis_poster_closekey').off().on('click', function(e) {
                        $('.comiis_poster_box').removeClass("comiis_poster_box_show").on('webkitTransitionEnd transitionend', function() {
                            $('#comiis_poster_box').remove();
                            comiis_poster_start_wlat = 0;
                        });
                        return false;
                    });
                }, 60);
            }
        }
    }

    var new_comiis_user_share, is_comiis_user_share = 0;
    var as = navigator.appVersion.toLowerCase(), isqws = 0;
    if (as.match(/MicroMessenger/i) == "micromessenger" || as.match(/qq\//i) == "qq/") {
        isqws = 1;
    }
    if(isqws == 1){
        if(typeof comiis_user_share === 'function'){
            new_comiis_user_share = comiis_user_share;
            is_comiis_user_share = 1;
        }
        var comiis_user_share = function(){
            if(is_comiis_user_share == 1){
                isusershare = 0;
                new_comiis_user_share();
                if(isusershare == 1){
                    return false;
                }
            }
            isusershare = 1;
            show_comiis_poster_ykzn();
            return false;
        }
    }
</script>
<footer class="site-footer fsi">

    <div class="site-info clearfix">
        <div class="container">        
		<!--左边-->
       <div class="footer-left">
            <div class="footer-l-top">
			 
						<a href="/ylink.html">友情链接</a>
						<a href="/liuy.html">在线留言</a>
				         <a href="/about.html">关于我们</a>
						</div>
           <!-- 友情链接 -->               
            <div class="footer-l-btm">
           <p><?php echo $webconf['web_name'] ?></p>
			<p></p>
						</div>
                       <!-- 友情链接 end -->
        </div>
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

		   <script>
  
   
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