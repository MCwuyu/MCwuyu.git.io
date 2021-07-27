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

		<link rel="stylesheet" type="text/css" href="<?php echo Tpl_style ?>/style/tags/jquery.tagsinput.css" />
		<script type="text/javascript" charset="utf-8" src="<?php echo Tpl_style ?>/style/tags/jquery.tagsinput.js"></script>
		
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
              <a><cite>首页</cite></a>
              <a><cite><?php echo $molds['name'] ?>管理</cite></a>
             
			 <a><cite>修改<?php echo $molds['name'] ?></cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="iconfont" style="line-height:30px">&#xe6aa;</i></a>
        </div>
        <div class="x-body">
            <form class="layui-form layui-form-pane" >
			<input type="hidden" name="go" value="1" />
			<input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
			
			<div class="layui-tab">
			  <ul class="layui-tab-title">
				<li class="layui-this">基本信息</li>
				<li>扩展信息</li>
				
			  </ul>
			  <div class="layui-tab-content">
				<div class="layui-tab-item layui-show">
				 <div class="layui-form-item">
                    <label for="title" class="layui-form-label">
                        <span class="x-red">*</span>标题
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="title" value="<?php echo $data['title'] ?>" style="width:500px;"  name="title" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
				<?php if($molds['isclasstype']==1){ ?>
				<div class="layui-form-item">
                    <label for="tid" class="layui-form-label">
                        <span class="x-red">*</span>栏目
                    </label>
                    <div class="layui-input-inline">
						<select name="tid" lay-search="" <?php if($molds['ismust']==1){ ?>lay-verify="required"<?php } ?> id="tid" >
						<?php if($molds['ismust']==1){ ?>
						<option value="">选择栏目</option>
						<?php }else{ ?>
						<option value="0">不限栏目</option>
						<?php } ?>
					   <?php $v_n=0;foreach( $classtypes as $v){ $v_n++;?>
					   <?php if($v['molds']=='article'){ ?>
					   <?php if($admin['classcontrol']==0 || $admin['isadmin']==1 || strpos($tids,','.$v['id'].',')!==false || $molds['iscontrol']==0){ ?>
					   <option <?php if($data['tid']==$v['id']){ ?> selected="selected" <?php } ?>  value="<?php echo $v['id'] ?>"><?php echo str_repeat('--', $v['level']) ?><?php echo $v['classname'] ?></option>
					   <?php } ?>
					   <?php } ?>
					   <?php } ?>
					   
					   </select>
                    </div>
                </div>
				<?php }else{ ?>
				<input type="hidden" name="tid" value="<?php echo $data['tid'] ?>" />
				<?php } ?>
				 <div class="layui-form-item">
                    <label for="seo_title" class="layui-form-label">
                        SEO标题
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="seo_title" value="<?php echo $data['seo_title'] ?>" style="width:500px;"  name="seo_title" 
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
				<div class="layui-form-item">
                    <label for="hits" class="layui-form-label">
                        <span class="x-red"></span>点击量
                    </label>
                    <div class="layui-input-inline">
                        <input type="number" id="hits" value="<?php echo $data['hits'] ?>" name="hits" 
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
				<div class="layui-form-item">
                    <label for="keywords" class="layui-form-label">
                        <span class="x-red"></span>关键词
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="keywords" value="<?php echo $data['keywords'] ?>" style="width:500px;"  name="keywords" 
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
				
              <div class="layui-form-item">
				<label for="litpic" class="layui-form-label">
					<span class="x-red"></span>图片  
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
	
				 <div class="layui-form-item layui-form-text">
                        <label for="description" class="layui-form-label">
                            <span class="x-red"></span>简介
                        </label>
                        <div class="layui-input-block">
                            <textarea  name="description" class="layui-textarea"><?php echo $data['description'] ?></textarea>
                        </div>
                    </div>
				 <div class="layui-form-item layui-form-text">
                    <label for="body" class="layui-form-label">
                        <span class="x-red"></span>内容
                    </label>
                    <div class="layui-input-block" style="clear:both;" >
					<?php if(!$data){ ?>
<script id="editor" name="body" type="text/plain" style="width:100%;height:400px;"></script>
<?php }else{ ?>
<script id="editor" name="body" type="text/plain" style="width:100%;height:400px;"><?php echo $data['body'] ?></script>
<?php } ?>
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
				
				
				<div class="layui-form-item">
                    <label for="orders" class="layui-form-label">
                        <span class="x-red"></span>排序
                    </label>
                    <div class="layui-input-inline">
                        <input type="number" id="orders" value="<?php echo $data['orders'] ?>" name="orders" 
                        autocomplete="off" class="layui-input">
                    </div>
					 <div class="layui-form-mid layui-word-aux">
					  数字越大越靠前
				  </div>
					
                </div>
				
				<div class="layui-form-item" pane>
                    <label for="tjsx" class="layui-form-label">
                        <span class="x-red"></span>推荐属性
                    </label>
                    <div class="layui-input-block">
                        <input type="checkbox" name="istop" value="1" title="置顶" <?php if($data['istop']==1){ ?>checked<?php } ?>>
						<input type="checkbox" name="ishot" value="1" title="热点" <?php if($data['ishot']==1){ ?>checked<?php } ?>>
						<input type="checkbox" name="istuijian" value="1" title="推荐" <?php if($data['istuijian']==1){ ?>checked<?php } ?>>
                    </div>
					 
					
                </div>
				<div class="layui-form-item layui-form-text">
                    <label for="tags" class="layui-form-label">
                        <span class="x-red"></span>TAG标签 [ 按Enter回车自动添加 ]
                    </label>
                    <div class="layui-input-block">
                       
						 <input id="tags" type="text" class="tags" name="tags" value="<?php echo trim($data['tags'],',') ?>"  autocomplete="off" class="layui-input"  />
                    </div>
                </div>
				<?php if($admin['isadmin']==1 || ($admin['isadmin']!=1 && $admin['ischeck']==0)){ ?>
				<div class="layui-form-item" pane>
                    <label for="isshow" class="layui-form-label">
                        <span class="x-red"></span>是否审核
                    </label>
                    <div class="layui-input-block">
                        <input type="radio" name="isshow" value="0" title="未审" <?php if($data['isshow']==0){ ?>checked<?php } ?>>
						<input type="radio" name="isshow" value="1" title="已审" <?php if($data['isshow']==1){ ?>checked<?php } ?>>
						<input type="radio" name="isshow" value="2" title="退回" <?php if($data['isshow']==2){ ?>checked<?php } ?>>
                    </div>
					 
					
                </div>
				<?php } ?>
				 <div class="layui-form-item">
                    <label for="addtime" class="layui-form-label">
                        <span class="x-red"></span>更新时间
                    </label>
                    <div class="layui-input-inline">
                      <input class="layui-input" value="<?php if($data){ ?><?php echo date('Y-m-d H:i:s',$data['addtime']) ?><?php }else{ ?><?php echo date('Y-m-d H:i:s') ?><?php } ?>" name="addtime" placeholder="文件日期" id="article_addtime">
                    </div>
                   
                </div>
				<div class="layui-form-item">
                    <label for="target" class="layui-form-label">
                        <span class="x-red"></span>外链URL
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="target" value="<?php echo $data['target'] ?>" name="target" 
                        autocomplete="off" class="layui-input">
                    </div>
					<div class="layui-form-mid layui-word-aux">
					  默认为空，系统访问内容则直接跳转到此链接
					</div>
					
                </div>
				<div class="layui-form-item">
                    <label for="ownurl" class="layui-form-label">
                        <span class="x-red"></span>自定义URL
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="ownurl" value="<?php echo $data['ownurl'] ?>" name="ownurl" 
                        autocomplete="off" class="layui-input">
                    </div>
					<div class="layui-form-mid layui-word-aux">
					  默认为空，自定义URL
					</div>
					
                </div>
				
				</div>
			  </div>
			</div>
               
                <div class="layui-form-item" id="jizhitj"  style="text-align:center;">
                   
                     <button  class="layui-btn" lay-filter="save" lay-submit="">
                        保存
                    </button>
                </div>
            </form>
        </div>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
      
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
			$(function() {
			  $('#tags').tagsInput({
					width:'auto',
					defaultText:'添加一个标签',
			  });
			})
			function deleteImage(elm){
				$(elm).prev().attr("src", "<?php echo Tpl_style ?>/style/images/nopic.jpg");
				$('#litpic').val("");
			}
            layui.use(['laydate','form','layer','upload'], function(){
                $ = layui.jquery;
              var form = layui.form
              ,layer = layui.layer;
			  laydate = layui.laydate;
			   var upload = layui.upload;
			laydate.render({
				elem: '#article_addtime', //指定元素
				type:'datetime'
			  });
              //图片上传接口
             upload.render({
				elem: '#litpic_upload',
				url: "<?php echo U('Common/uploads') ?>" //上传接口
				,data:{tid:function(){ return $("#tid").val();},molds:'article'}
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
              form.on('submit(save)', function(data){
                
				$.post("<?php echo U('editarticle') ?>",data.field,function(r){
					var r = JSON.parse(r);
					if(r.code==0){
					
						layer.confirm(r.msg, {
						  btn: ['返回列表','取消'] //按钮
						}, function(){
						  // 获得frame索引
						  <?php if($webconf['admintpl']=='tpl'){ ?>
						   window.location.href="<?php echo U('Article/articlelist') ?>";
						  <?php }else{ ?>
						   parent.location.reload();
						  <?php } ?>
						  
						}, function(){
						  
						});
					
					}else{
						layer.alert(r.msg, {icon: 5});
					}
				});
				
               
                return false;
              });
            get_fields(<?php echo $data['tid'] ?>,<?php echo $data['id'] ?>);
			form.on('select(tid)', function(data){
			 
			  get_fields(data.value,<?php echo $data['id'] ?>);
			  
			  
			});
			
           
              
              
            });
        </script>
      
    </body>

</html>