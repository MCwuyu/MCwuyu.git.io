<?php if (!defined('CORE_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo $common ?>user/css/reset.css">
<link rel="stylesheet" href="<?php echo $common ?>user/css/user.css">
<link rel="stylesheet" href="//at.alicdn.com/t/font_1546140_3tb06o2k3sy.css">
<script src="<?php echo $common ?>user/js/jquery.min-1.10.2.js"></script>
  <title>个人中心</title>
</head>
<body>

<header>
  <div class="container">
    <div class="brand">
      <a href="<?php echo $webconf['domain'] ?>/" class="logo"><i class="iconfont iconhome"></i> 返回网站</a>
    </div>
    <div class="user-center">
     
      <ul class="user-login">
        <li class="user-message"><a href="<?php echo U('user/notify') ?>" title="消息"><i class="iconfont iconxinxi"></i> <span><?php echo has_no_read_msg() ?></span></a></li>
        <li class="user-icon">
          <a title="我的"><img src="<?php if(!$member['litpic']){ ?><?php echo $common ?>user/images/login.png<?php }else{ ?><?php echo $member['litpic'] ?><?php } ?>" alt=""></a>
          <ul class="user-menu">
            <li class="bt1"><a href="<?php echo U('user/userinfo') ?>" title="资料与账户">资料与账户</a></li>
            <!--<li class="bt1"><a href="<?php echo U('user/follow') ?>" title="我的关注">我的关注</a></li>-->
            <!--<li class="hidden-md"><a href="<?php echo U('user/fans') ?>" title="我的粉丝">我的粉丝</a></li>-->
            <!--<li><a href="<?php echo U('user/posts') ?>" title="我的投稿">我的投稿</a></li>-->
            <!--<li><a href="<?php echo U('user/collect') ?>" title="我的收藏">我的收藏</a></li>-->
            <!--<li class="hidden-md"><a href="<?php echo U('user/likes') ?>" title="我的喜欢">我的喜欢</a></li>-->
            <!--<li class="hidden-md"><a href="<?php echo U('user/comment') ?>" title="我的评论">我的评论</a></li>-->
            <li class="bt1"><a href="<?php echo U('user/wallet') ?>" title="我的钱包">我的钱包</a></li>
            <li class="hidden-md"><a href="<?php echo U('user/cart') ?>" title="购物车">购物车</a></li>
            <li><a href="<?php echo U('user/orders') ?>" title="我的订单">我的订单</a></li>
            <li class="bt1"><a href="<?php echo U('user/userinfo') ?>" title="修改密码">修改密码</a></li>
            <li><a href="<?php echo U('login/loginout') ?>" title="退出登录">退出登录</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</header>

<div class="login-page page">
  <div class="container clearfix">
    <div class="user-left hidden-sm">
      <div class="user-card">
        <div class="img-box">
          <a href="<?php echo U('user/userinfo') ?>" title="<?php echo $member['username'] ?>"><img src="<?php if(!$member['litpic']){ ?><?php echo $common ?>user/images/login.png<?php }else{ ?><?php echo $member['litpic'] ?><?php } ?>" alt="<?php echo $member['username'] ?>"></a>
        </div>
        <div class="username-info">
          <a href="<?php echo U('user/userinfo') ?>" title="<?php echo $member['username'] ?>"><?php echo $member['username'] ?></a>
        </div>
        <div class="autograph-info">
          <?php if($member['signature']){ ?><?php echo $member['signature'] ?><?php }else{ ?>他很懒，什么都没有留下~<?php } ?>
        </div>
        <div class="btn-area">
          <!--<a href="<?php echo U('user/release') ?>" class="btn-default btn-release">发布文章</a><br>-->
          <a href="<?php echo U('login/loginout') ?>" class="btn-default btn-sign-out">退出登录</a>
        </div>
      </div>
      <ul class="user-list">
        <!--<li <?php if(APP_ACTION=='follow'){ ?>class="active"<?php } ?>><a href="<?php echo U('user/follow') ?>" title="我的关注" class="bt1">我的关注</a></li>-->
        <!--<li <?php if(APP_ACTION=='fans'){ ?>class="active"<?php } ?>><a href="<?php echo U('user/fans') ?>" title="我的粉丝">我的粉丝</a></li>-->
        <!--<li <?php if(APP_ACTION=='posts'){ ?>class="active"<?php } ?>><a href="<?php echo U('user/posts') ?>" title="我的投稿">我的投稿</a></li>-->
        <!--<li <?php if(APP_ACTION=='collect'){ ?>class="active"<?php } ?>><a href="<?php echo U('user/collect') ?>" title="我的收藏">我的收藏</a></li>-->
        <!--<li <?php if(APP_ACTION=='likes'){ ?>class="active"<?php } ?>><a href="<?php echo U('user/likes') ?>" title="我的喜欢">我的喜欢</a></li>-->
        <li <?php if(APP_ACTION=='comment'){ ?>class="active"<?php } ?>><a href="<?php echo U('user/comment') ?>" title="我的评论">我的评论</a></li>
        <li <?php if(APP_ACTION=='wallet'){ ?>class="active"<?php } ?>><a href="<?php echo U('user/wallet') ?>" title="我的钱包" class="bt1">我的钱包</a></li>
        <li <?php if(APP_ACTION=='cart'){ ?>class="active"<?php } ?>><a href="<?php echo U('user/cart') ?>" title="购物车">购物车</a></li>
        <li <?php if(APP_ACTION=='orders'){ ?>class="active"<?php } ?>><a href="<?php echo U('user/orders') ?>" title="订单管理">订单管理</a></li>
        <li <?php if(APP_ACTION=='userinfo'){ ?>class="active"<?php } ?>><a href="<?php echo U('user/userinfo') ?>" title="资料账户">资料账户</a></li>
        <li <?php if(APP_ACTION=='setmsg'){ ?>class="active"<?php } ?>><a href="<?php echo U('user/setmsg') ?>" title="消息设置">消息设置</a></li>
        <li><a href="index.html" title="返回主页" class="bt1">返回主页</a></li>
      </ul>
    </div>
    <div class="user-right">
      <div class="user-tips">
        <p><i class="iconfont iconxiaoxi3"></i> 欢迎注册本站会员，注册会员后您将享受专属会员服务!包括但不限于专属文章浏览权限，会员投稿权限，在线购物权限，下载会员可见附件等实用功能，欢迎注册体验！</p>
      </div>
      <div class="user-content">
        <div class="user-tab">
          <div class="num">
            <a href="<?php echo U('user/posts',['molds'=>'article']) ?>" title="">
              <h4><?php echo $article_num ?></h4>
              <p>投稿</p>
            </a>
          </div>
          <div class="num">
            <a href="<?php echo U('user/posts',['molds'=>'product']) ?>" title="">
              <h4><?php echo $product_num ?></h4>
              <p>商品</p>
            </a>
          </div>
          <div class="num">
            <a href="<?php echo U('user/follow') ?>" title="">
              <h4><?php echo jz_follow($member['id']) ?></h4>
              <p>关注</p>
            </a>
          </div>
          <div class="num">
            <a href="<?php echo U('user/fans') ?>" title="">
              <h4><?php echo jz_fans($member['id']) ?></h4>
              <p>粉丝</p>
            </a>
          </div>
          <div class="num">
            <a href="<?php echo U('user/collect') ?>" title="">
              <h4><?php echo $collect_num ?></h4>
              <p>收藏</p>
            </a>
          </div>
          <div class="num">
            <a href="<?php echo U('user/comment') ?>" title="">
              <h4><?php echo $comment_num ?></h4>
              <p>评论</p>
            </a>
          </div>
          <div class="num">
            <a href="<?php echo U('user/likes') ?>" title="">
              <h4><?php echo $likes_num ?></h4>
              <p>点赞</p>
            </a>
          </div>
          <div class="num">
            <a href="<?php echo U('user/orders') ?>" title="">
              <h4><?php echo $order_num ?></h4>
              <p>订单</p>
            </a>
          </div>
        </div>
      </div>
      <div class="user-data">
        <h2>个人中心</h2>
        <p><span>用户名：</span><span><?php echo $member['username'] ?></span></p>
        <p><span>个性签名：</span><span><?php if($member['signature']){ ?><?php echo $member['signature'] ?><?php }else{ ?>他很懒，什么都没有留下~<?php } ?></span></p>
        <p><span>手机号码：</span><span><?php echo $member['tel'] ?></span></p>
        <p><span>电子邮箱：</span><span><?php echo $member['email'] ?></span></p>
        <p><span>生日：</span><span><?php if($member['birthday']){ ?><?php echo $member['birthday'] ?><?php }else{ ?>-<?php } ?></span></p>
        <p><span>性别：</span><span><?php if($member['sex']==1){ ?>男<?php }else if($member['sex']==2){ ?>女<?php }else{ ?>未知<?php } ?></span></p>
      </div>
    </div>
  </div>
</div>

<footer>
  <div class="copyright">
    <p><span>Copyright &copy; 2019-2099</span><span><a href="#" title="ICP备案号"><?php echo $webconf['web_beian'] ?></a></span></p>
  </div>
</footer>
<script src="<?php echo $common ?>user/js/user.js"></script>

</body>
</html>