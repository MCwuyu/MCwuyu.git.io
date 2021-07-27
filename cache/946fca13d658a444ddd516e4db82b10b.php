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

    <script type="text/javascript" charset="utf-8" src="/static/common/user/uedit/ueditor.config.js?v=6"></script>
<script type="text/javascript" charset="utf-8" src="/static/common/user/uedit/ueditor.all.min.js?v=6"> </script>
<script type="text/javascript" charset="utf-8" src="/static/common/user/uedit/lang/zh-cn/zh-cn.js?v=6"></script>

<script>
var ue = UE.getEditor('editor',{
<?php if($webconf['ueditor_config']!=''){ ?>
toolbars : [[
		   <?php echo $webconf['ueditor_config'] ?>
			]]
<?php } ?>			
			});
</script>
  </head>
  
  <body>
   <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="/" target="main">首页</a>
        <a href="<?php echo U('Member/index') ?>" >会员管理</a>
        <a>
          <cite>会员修改</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="iconfont" style="line-height:30px">&#xe6aa;</i></a>
    </div>
    <div class="x-body layui-anim layui-anim-up">
        <form class="layui-form  layui-form-pane">
		<input name="go" value="1" type="hidden">
		<input name="id" value="<?php echo $data['id'] ?>" type="hidden">
		
		<div class="layui-tab">
			  <ul class="layui-tab-title">
				<li class="layui-this">基本信息</li>
				<li>扩展信息</li>
				
			  </ul>
			  <div class="layui-tab-content">
				<div class="layui-tab-item layui-show">
				<div class="layui-form-item">
              <label for="L_email" class="layui-form-label">
                  <span class="x-red">*</span>邮箱
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="L_email" value="<?php echo $data['email'] ?>" disabled name="email" required="" lay-verify="email"
                  autocomplete="off" class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red">*</span>用于找回密码
              </div>
          </div>
		  <div class="layui-form-item">
              <label for="L_tel" class="layui-form-label">
                  <span class="x-red"></span>手机号
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="L_tel" value="<?php echo $data['tel'] ?>" disabled  name="tel"  
                  autocomplete="off" class="layui-input">
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_username" class="layui-form-label">
                  <span class="x-red">*</span>昵称
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="L_username" name="username" value="<?php echo $data['username'] ?>" required="" lay-verify="nikename"
                  autocomplete="off" class="layui-input">
              </div>
          </div>
		  
		  <?php if(checkAction('Member/membergroup')){ ?>
		 
          <div class="layui-form-item">
              <label class="layui-form-label"><span class="x-red"></span>分组</label>
              <div class="layui-input-inline">
			  
                <select class="layui-input" name="gid" lay-verify="required">
				<?php
		$v_table ='member_group';
		$v_w=' 1=1 ';
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
				<option <?php if($data['gid']==$v['id']){ ?>selected<?php } ?> value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
				<?php } ?>
				
				</select>
              </div>
          </div>
		  <?php }else{ ?>
		  <input name="gid" type="hidden"	value="<?php echo $data['gid'] ?>" />
		  <?php } ?>
		  
		  <div class="layui-form-item">
              <label for="L_jifen" class="layui-form-label">
                  积分
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="L_jifen" name="jifen" value="<?php echo $data['jifen'] ?>" 
                  autocomplete="off" class="layui-input">
              </div>
          </div>
		  <div class="layui-form-item">
              <label for="money" class="layui-form-label">
                  钱包
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="money" name="money" value="<?php echo $data['money'] ?>" 
                  autocomplete="off" class="layui-input">
              </div>
          </div>
		  
		   
		  
		  
		   <div class="layui-form-item">
				<label for="litpic" class="layui-form-label">
					头像  
				</label>
				
				<div class="layui-input-inline">
					<input name="litpic" placeholder="上传图片" type="text" class="layui-input" id="litpic"  value="<?php echo $data['litpic'] ?>" />
				</div>
				<div class="layui-input-inline">
					<button class="layui-btn layui-btn-primary" id="litpic_upload" type="button" >选择图片</button>
				</div>
				<div class="layui-input-inline">
					<img id="litpic_img" class="img-responsive img-thumbnail" style="max-width: 200px;" src="<?php echo $data['litpic'] ?>" onerror="javascipt:this.src='<?php echo Tpl_style ?>/style/images/nopic.jpg'; this.title='图片未找到';this.onerror=''">
					<button type="button" onclick="deleteImage(this)" class="layui-btn layui-btn-sm layui-btn-radius layui-btn-danger " title="删除这张图片" >删除</button>
				</div>
			</div>
	  
		  <div class="layui-form-item">
              <label for="birthday" class="layui-form-label">
                  生日
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="birthday" name="birthday" value="<?php echo $data['birthday'] ?>" 
                  autocomplete="off" class="layui-input">
              </div>
          </div>
	         <div class="layui-form-item">
              <label for="signature" class="layui-form-label">
                  个性签名
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="signature" name="signature" value="<?php echo $data['signature'] ?>" 
                  autocomplete="off" class="layui-input">
              </div>
          </div>
		     
		      <div class="layui-form-item">
              <label for="province" class="layui-form-label">
                  省份
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="province" name="province" value="<?php echo $data['province'] ?>" 
                  autocomplete="off" class="layui-input">
              </div>
          </div>
          <div class="layui-form-item">
              <label for="city" class="layui-form-label">
                  城市
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="city" name="city" value="<?php echo $data['city'] ?>" 
                  autocomplete="off" class="layui-input">
              </div>
          </div>
		       <div class="layui-form-item">
              <label for="address" class="layui-form-label">
                  详细地址
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="address" name="address" value="<?php echo $data['address'] ?>" 
                  autocomplete="off" class="layui-input">
              </div>
          </div>
		  
          <div class="layui-form-item">
              <label for="L_pass" class="layui-form-label">
                  <span class="x-red">*</span>密码
              </label>
              <div class="layui-input-inline">
                  <input type="password" id="L_pass" name="pass"  lay-verify="pass"
                  autocomplete="off" class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  6到16个字符,不修改请留空
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
                  <span class="x-red">*</span>确认密码
              </label>
              <div class="layui-input-inline">
                  <input type="password" id="L_repass" name="repass"  lay-verify="repass"
                  autocomplete="off" class="layui-input">
              </div>
          </div>
		  
			<?php if($webconf['isrelative']==1){ ?>
			<span id="ext_fields"></span>
			<?php } ?>
	  
				</div>
				<div class="layui-tab-item">
				<?php if($webconf['isrelative']==0){ ?>
				<span id="ext_fields"></span>
				<?php } ?>
				</div>
			  </div>
		</div>
		
          
          <div class="layui-form-item" style="text-align:center;">
              
              <button  class="layui-btn" lay-filter="add" lay-submit="">
                  修改
              </button>
          </div>
      </form>
    </div>
    <script>
	$(function(){
	$(document).on('click','.delete_file',function(){
		//删除页面信息
		
		$(this).parent().remove();
	})
})

function get_fields(tid,id){
	var id = arguments[1]?arguments[1]:0;
	$.post("<?php echo U('Fields/get_fields') ?>",{molds:'<?php echo $fields_biaoshi ?>',tid:tid,id:id},function(r){
		$("#ext_fields").html(r);
	});
}
function deleteImage_auto(elm,field){
	$(elm).prev().attr("src", "<?php echo Tpl_style ?>/style/images/nopic.jpg");
	$('#'+field).val("");
}

function goleft(a){
	var str = $(a).parent().parent().parent().attr('class');
	var arr = $("."+str+" .upload-icon-img").toArray();
	var index = $('.'+str+' .upload-icon-img').index($(a).closest('.upload-icon-img'));
	var temp;
	if(index-1>=0){
		temp = arr[index];
		arr[index] = arr[index-1];
		arr[index-1] = temp;
		$(a).parent().parent().parent().html(arr)
	}
}
function goright(a){
	var str = $(a).parent().parent().parent().attr('class');
	var arr = $("."+str+" .upload-icon-img").toArray();
	var index = $('.'+str+' .upload-icon-img').index($(a).closest('.upload-icon-img'));
	var temp;
	if(index+1<arr.length){
		temp = arr[index];
		arr[index] = arr[index+1];
		arr[index+1] = temp;
		$(a).parent().parent().parent().html(arr)
	}
}
		function deleteImage(elm){
			$(elm).prev().attr("src", "<?php echo Tpl_style ?>/style/images/nopic.jpg");
			$('#litpic').val("");
		}
        layui.use(['form','layer','upload','laydate'], function(){
            $ = layui.jquery;
          var form = layui.form,
          layer = layui.layer,
          laydate = layui.laydate,
		      upload = layui.upload;
		  laydate.render({
            elem: '#birthday' //指定元素
          });
        //图片上传接口
		  upload.render({
			elem: '#litpic_upload',
			url: "<?php echo U('Common/uploads') ?>" //上传接口
			,data:{molds:'member'}
			,done: function(res){ //上传成功后的回调
			 
				if(res.code==0){
					 $('#litpic_img').attr('src',res.url);
					 $('#litpic').val(res.url);
				}else{
					 layer.alert(res.error, {icon: 5});
				}
			 
			}
		  });
        

          //监听提交
          form.on('submit(add)', function(data){
            console.log(data);
			$.post("<?php echo U('Member/memberedit') ?>",data.field,function(res){
				var r = JSON.parse(res);
				
				if(r.code==0){
					 //发异步，把数据提交给php
					layer.msg("修改成功", {icon: 6,time:2000},function () {
						
						<?php if($webconf['admintpl']=='tpl'){ ?>
						 window.location.href="<?php echo U('Member/index') ?>";
						<?php }else{ ?>
						parent.location.reload();
						<?php } ?>
						
					});
				}else{
					layer.msg(r.msg);
				}
			
				
				
			})
           
            return false;
          });
          
          get_fields(0,<?php echo $data['id'] ?>);
        });
    </script>
   
  </body>

</html>