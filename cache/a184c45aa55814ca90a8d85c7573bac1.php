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
  <title>资料与账号 - 个人中心</title>
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
        <h2>资料与账号</h2>
        <form action="" method="POST" onsubmit="checkform()" id="jizhiform" class="user-form">
          <div class="form-control">
            <label for="">头像：</label>
              <span class="view_img"><?php if($member['litpic']){ ?><img src="<?php echo $member['litpic'] ?>" height="100" style="border-radius: 50%;" /><?php } ?></span><br/>
              <input name="litpic" type="hidden" id="fileurl" value="<?php echo $member['litpic'] ?>" /><br/>
              <input type="file" class="btn btn-primary rounded btn-block" name="file" id="fileid">
          </div>
          <div class="form-control">
            <label for="">昵称：</label>
            <input type="text" value="<?php echo $member['username'] ?>" id="t_username" name="username" placeholder="请输入您的昵称">
          </div>
          <div class="form-control">
            <label for="">手机：</label>
            <input type="tel" value="<?php echo $member['tel'] ?>" name="tel" id="t_tel" placeholder="请输入您的手机号">
          </div>
          <div class="form-control">
            <label for="">邮箱：</label>
            <input type="email" value="<?php echo $member['email'] ?>" name="email" name="t_email" placeholder="请输入您的邮箱">
          </div>
          <div class="form-control">
            <label for="">性别：</label>
            <div class="check-box"><input type="radio" name="sex" value="1" <?php if($member['sex']==1){ ?>checked<?php } ?>>男 <input type="radio" name="sex" value="2" <?php if($member['sex']==2){ ?>checked<?php } ?>>女 <input type="radio" name="sex" value="0" <?php if($member['sex']==0){ ?>checked<?php } ?>>不展示</div>
          </div>
    <!--      <div class="form-control">-->
    <!--        <label for="">省份：</label>-->
    <!--        <input type="text" value="<?php echo $member['province'] ?>" name="province" name="t_province" placeholder="可不填">-->
    <!--      </div>-->
		  <!--<div class="form-control">-->
    <!--        <label for="">城市：</label>-->
    <!--        <input type="text" value="<?php echo $member['city'] ?>" name="city" name="t_city" placeholder="可不填">-->
    <!--      </div>-->
		  <!--<div class="form-control">-->
    <!--        <label for="">详细地址：</label>-->
    <!--        <input type="text" value="<?php echo $member['address'] ?>" name="address" name="t_address" placeholder="可不填">-->
    <!--      </div>-->
          <div class="form-control">
            <label for="password">新密码：</label>
            <div class="form-password">
              <input type="password" class="password1" name="password" id="t_password" value="" placeholder="如果不修改，请留空">
              <i class="iconfont iconyanjing"></i><i class="iconfont iconyanjing-guan"></i>
            </div>
          </div>
          <div class="form-control">
            <span><label for="setpassword">确认密码：</label></span>
            <div class="form-password">
              <input type="password" class="password1" name="repassword" id="t_repassword" value="" placeholder="如果不修改，请留空">
              <i class="iconfont iconyanjing"></i><i class="iconfont iconyanjing-guan"></i>
            </div>
          </div>
		  <div class="form-control">
            <label for="">邀请链接：</label>
            <input type="text" value="<?php echo U('login/register') ?>?invite=<?php echo $member['id'] ?>" readonly name="invite" id="t_invite" placeholder="邀请链接">
          </div>
          <div class="form-control">
            <span><label for="">个性签名：</label></span>
            <textarea name="signature" id="signature" placeholder="请输入您的个性签名"><?php echo $member['signature'] ?></textarea>
          </div>
          <span id="fields_ext"></span>
          <div class="form-control">
            <label for="submit"></label>
            <input type="submit" name="submit" value="提交">
          </div>
        </form>
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
<script type="text/javascript">
function get_fields(tid,id){
    var id = arguments[1]?arguments[1]:0;
    $.post("<?php echo U('common/get_fields') ?>",{molds:'member',tid:tid,id:id},function(res){
      if(res.code==0){
        //默认 res.tpl输出的是layui的模板HTML,可以审核元素查看res里面的内容
        //$("#ext_fields").html(res.tpl);
        var html = '';
        var len = res.fields_list.length;
        if(len>0){
          //根据对应的字段，进行HTML设计
          for(var i=0;i<len;i++){
            
          }
          
        }
        $("#fields_ext").html(res.tpl);
      }
      
    },'json');
  }
$(function(){
  get_fields(0,<?php echo $member['id'] ?>);
})
function checkform(){
    var username = $.trim($("#t_username").val());
    var tel = $.trim($("#t_tel").val());
    var password = $.trim($("#t_password").val());
    var repassword = $.trim($("#t_repassword").val());
    if(username==''){
      alert('账户名称不能为空！');$("#t_username").focus();return false;
    }
    if(password!=repassword){
      alert('两次密码不同！');$("#t_password").focus();return false;
    }
    return true;
}
$(document).ready(function(){
  $("#fileid").change(function(){
    var form=document.getElementById("jizhiform");
    var data =new FormData(form);
    $.ajax({
       url: "<?php echo U('common/uploads') ?>",//处理图片的文件路径
       type: "POST",//传输方式
       data: data,
       dataType:"json",   //返回格式为json
       processData: false,  // 告诉jQuery不要去处理发送的数据
       contentType: false,   // 告诉jQuery不要去设置Content-Type请求头
       success: function(response){
        
        if(response.code==0){
          
          var result = '';
          result +='<img src="' + response['url'] + '" height="100"  />';
          //$("#fileid").hide();
         // $("#upload_ok").show();
          $('.view_img').html(result);
          $("#fileurl").val(response['url']);
        }else{
          alert(response.error);
        }
        
       }
    });
    
  });

  
});
</script>
</body>
</html>