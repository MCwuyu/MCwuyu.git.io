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
  <title>我的订单 - 个人中心</title>
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
      <div class="common-tab">
        <h2><a href="<?php echo U('user/orders') ?>" <?php if(!$type){ ?>class="active"<?php } ?>>全部订单</a>
        <a href="<?php echo U('user/orders',['type'=>1]) ?>" <?php if($type==1){ ?>class="active"<?php } ?>>待付款</a>
        <a href="<?php echo U('user/orders',['type'=>2]) ?>" <?php if($type==2){ ?>class="active"<?php } ?>>已付款</a>
        <a href="<?php echo U('user/orders',['type'=>3]) ?>" <?php if($type==3){ ?>class="active"<?php } ?>>超时订单</a>
        <a href="<?php echo U('user/orders',['type'=>4]) ?>" <?php if($type==4){ ?>class="active"<?php } ?>>待发货</a>
        <a href="<?php echo U('user/orders',['type'=>5]) ?>" <?php if($type==5){ ?>class="active"<?php } ?>>已发货</a>
        <a href="<?php echo U('user/orders',['type'=>6]) ?>" <?php if($type==6){ ?>class="active"<?php } ?>>已废弃</a>
        </h2>
      </div>
      <div class="table release-table">
        <ul class="shop-record-list">
        <?php $v_n=0;foreach( $lists as $v){ $v_n++;?>
          <li>
            <div class="record-item">
              <p><span>下单时间：<?php echo $v['date'] ?></span>
              <?php if($v['isshow']==1){ ?>
              <span class="fr btn-sm btn-info">待支付</span>
              <?php }else if($v['isshow']==2){ ?>
              <span class="fr btn-sm btn-success">交易成功</span>
              <?php }else if($v['isshow']==3){ ?>
              <span class="fr btn-sm btn-danger">已超时</span>
              <?php }else if($v['isshow']==4){ ?>
              <span class="fr btn-sm btn-warning">待发货</span>
              <?php }else if($v['isshow']==5){ ?>
              <span class="fr btn-sm btn-success">已发货</span>
              <?php }else{ ?>
              <span class="fr btn-sm btn-warning">已废弃</span>
              <?php } ?>
              </p>
              <p><span>订单号：<a href="<?php echo $v['details'] ?>"><?php echo $v['orderno'] ?></a></span></p>
              <p><span>交易类型：<?php echo $v['paytype'] ?></span></p>
              <h4><span class="text-info">￥<?php echo $v['price'] ?></span><span class="fr"><a href="javascript:;" onclick="javascript:if(confirm('您确定要删除吗？'))window.location.href='<?php echo $v['del'] ?>'" class="change" title="删除">删除</a><a href="<?php echo $v['details'] ?>" class="btn-more" title="查看详情">查看详情</a></span></h4>
            </div>
          </li>
        <?php } ?>
         
        </ul>
        <div class="pagebar-common">
          <?php if($listpage['list']){ ?>
          <ul class="pagination">
          <li class="page-item <?php if(!$listpage['prev']){ ?>disabled<?php } ?>">
          <a class="page-link" href="<?php echo $listpage['prev'] ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php $ss_n=0;foreach( $listpage['list'] as $ss){ $ss_n++;?>
          <li class="page-item <?php if($ss['num']==$listpage['current_num']){ ?>active background<?php } ?>"><a href="<?php echo $ss['url'] ?>" class="page-link"><?php echo $ss['num'] ?></a></li>
          <?php } ?>
          <li class="page-item <?php if(!$listpage['next']){ ?>disabled<?php } ?>"><a class="page-link" href="<?php echo $listpage['next'] ?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
          </ul>
          <?php } ?>
        </div>
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