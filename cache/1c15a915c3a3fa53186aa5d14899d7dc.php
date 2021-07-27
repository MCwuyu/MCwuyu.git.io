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
    <div class="x-body layui-anim layui-anim-up" style="background-color: #f2f2f2">
        <div class="layui-fluid">
        <div class="layui-card">
          <div class="layui-card-header">欢迎管理员：
            <span class="x-red"><?php echo $admin['name'] ?></span>！当前时间:<span id="time"><?php echo date('Y年m月d日 H:i:s') ?></span></div>
          <div class="layui-card-body">
         <div class="layui-card">
                        <div class="layui-card-body">
                            <div class="layui-carousel x-admin-carousel x-admin-backlog" lay-anim="" lay-indicator="inside" lay-arrow="none" style="width: 100%; height: 90px;">
                                <div carousel-item="">
                                    <ul class="layui-row layui-col-space10 layui-this">
                                        <li class="layui-col-xs3">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>站内用户</h3>
                                                <p>
                                                    <cite><?php echo $member_count ?></cite>人</p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs3">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>站内文章</h3>
                                                <p>
                                                    <cite><?php echo $article_num ?></cite>篇</p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs3">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>站内产品</h3>
                                                <p>
                                                    <cite><?php echo $product_num ?></cite>件</p>
                                            </a>
                                        </li>
                                      
                                        <li class="layui-col-xs3">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>站内留言</h3>
                                                <p>
                                                    <cite><?php echo $message_num ?></cite>条</p>
                                            </a>
                                        </li>
                                    
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
          </div>
        </div>
          <div class="layui-row layui-col-space15">
            <div class="layui-col-md8">    
              <div class="layui-card">
                <div class="layui-card-header">
                  最近更新
                  <a href="<?php echo U('Article/articlelist') ?>" class="layui-a-tips">全部文章</a>
                </div>
                <div class="layui-card-body">
                  <div class="layui-row layui-col-space10">
					<table class="layui-table">
					  <colgroup>
						<col >
						<col width="150">
						<col width="200">
						<col width="100">
					  </colgroup>
					  <thead>
						<tr>
						  <th>标题</th>
						  <th>缩略图</th>
						  <th>更新时间</th>
						  <th>阅读量</th>
						</tr> 
					  </thead>
					  <tbody>
					    <?php
		$v_table ='article';
		$v_w=' 1=1 ';
		$v_order='addtime desc';
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
						<tr>
						  <td><a href="<?php echo $v['url'] ?>" target="_blank"><?php echo newstr($v['title'],30) ?></a></td>
						  <td><?php if($v['litpic']){ ?><a href="<?php echo $v['url'] ?>" target="_blank"><img src="<?php echo $v['litpic'] ?>" width="150px" height="50px"></a><?php }else{ ?>无<?php } ?></td>
						  <td><?php echo formatTime($v['addtime'],'Y-m-d') ?></td>
						  <td><?php echo $v['hits'] ?></td>
						</tr>
					    <?php } ?>
						
					  </tbody>
					</table>
				  
                  </div>
                </div>
              </div>
              <?php   $comment = M('molds')->find(array('biaoshi'=>'comment')); ?>
              <?php if($comment['isopen']){ ?>
              <div class="layui-card">
                <div class="layui-card-header">最新评论</div>
                <div class="layui-card-body">
                  <dl class="layuiadmin-card-status">
                  <?php
		$v_table ='comment';
		$v_w=' 1=1 ';
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
                    <dd>
                    <?php    $user = memberInfo($v['userid']); ?>
                      <div class="layui-status-img"><a href="javascript:;"><?php if($user['litpic']!=''){ ?><img src="<?php echo $user['litpic'] ?>"><?php } ?></a></div>
                      <div>
                        <p><?php echo $user['username'] ?> 在 <a href="<?php echo $classtypedata[$v['tid']]['url'] ?>"><?php echo $classtypedata[$v['tid']]['classname'] ?></a> 发布了评论</p>
                        <span><?php echo formatTime($v['addtime'],'Y-m-d H:i:s') ?></span>
                      </div>
                    </dd>
                  <?php } ?>
                   
                  </dl>  
                </div>
              </div>  
              <?php } ?>   
            </div>
            <div class="layui-col-md4">
              <div class="layui-card">
                <div class="layui-card-header">版本信息</div>
                <div class="layui-card-body layui-text">
                  <table class="layui-table">
                    <colgroup>
                      <col width="100">
                      <col>
                    </colgroup>
                    <tbody>
                      <tr>
                        <td>当前版本</td>
                        <td>
                           v<?php echo $webconf['web_version'] ?> <a href="https://github.com/Cherry-toto/jizhicms" target="_blank" style="padding-left: 15px;">项目地址</a> 
                        </td>
                      </tr>
                      <tr>
                        <td>服务器</td>
                        <td>
                          <?php echo $_SERVER['SERVER_NAME'] ?>
                       </td>
                      </tr>
                      <tr>
                        <td>操作系统</td>
                        <td>
                          <?php echo php_uname('s') ?>
                       </td>
                      </tr>
                      <tr>
                        <td>运行环境</td>
                        <td>
                          <?php echo php_uname() ?>
                       </td>
                      </tr>
                      <tr>
                        <td>PHP版本</td>
                        <td>
                          <?php echo PHP_VERSION ?>
                       </td>
                      </tr>
                      <tr>
                        <td>运行方式</td>
                        <td>
                          <?php echo php_sapi_name() ?>
                       </td>
                      </tr>
                      <tr>
                        <td>上传限制</td>
                        <td>
                          <?php echo get_cfg_var ("upload_max_filesize") ?>
                       </td>
                      </tr>


                    </tbody>
                  </table>
                </div>
              </div>
             
            <div class="layui-card">
                <div class="layui-card-header">用户留言</div>
                <div class="layui-card-body">
                  <ul class="layuiadmin-card-status layuiadmin-home2-usernote">
                  <?php
		$v_table ='message';
		$v_w=' 1=1 ';
		$v_order='addtime desc';
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
                    <li>
                      <h3><?php echo $v['user'] ?></h3>
                      <p><?php echo $v['body'] ?></p>
                      <span><?php echo formatTime($v['addtime'],'Y-m-d H:i:s') ?></span>
                      <a href="<?php echo U('Message/editmessage',['id'=>$v['id']]) ?>"  class="layui-btn layui-btn-xs layuiadmin-reply">回复</a>
                    </li>
                  <?php } ?>
                   
                  </ul>
                </div>
              </div>

              
            </div>
          </div>
        </div>

    </div>
        <script>
		function time(){
			var vWeek,vWeek_s,vDay;
			vWeek = ["星期天","星期一","星期二","星期三","星期四","星期五","星期六"];
			var date =  new Date();
			year = date.getFullYear();
			month = ((date.getMonth() + 1)>=10)?(date.getMonth() + 1):'0'+(date.getMonth() + 1);
			//day = date.getDate();
			day = (date.getDate()>=10)?date.getDate():'0'+date.getDate();
			hours = (date.getHours()>=10)?date.getHours():'0'+date.getHours();
			minutes = (date.getMinutes()>=10)?date.getMinutes():'0'+date.getMinutes();
			seconds = (date.getSeconds()>=10)?date.getSeconds():'0'+date.getSeconds();
			vWeek_s = date.getDay();
			document.getElementById("time").innerHTML = year + "年" + month + "月" + day + "日" + "\t" + hours + ":" + minutes +":" + seconds + "\t" + vWeek[vWeek_s] ;

		};
		setInterval("time()",1000);

        </script>
    </body>
</html>