<?php

use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

class Qiniu
{
    public $name = '七牛云存储';
    public $ver = '1.0';

    public function save($file_path,$config=null)
    {
        $bucket = $config['upload']['qiniu']['bucket'];
        $accessKey = $config['upload']['qiniu']['accesskey'];
        $secretKey = $config['upload']['qiniu']['secretkey'];

        require_once __DIR__ . '/qiniu/autoload.php';

	   // 构建鉴权对象
		$auth = new Auth($accessKey, $secretKey);
		// 生成上传 Token
		$token = $auth->uploadToken($bucket);
		// 要上传文件的本地路径
		$filePath = $file_path;
		// 上传到七牛后保存的文件名
		$a = explode('.',$file_path);
		$pix = end($a);
		$key = time().rand(1000,9999).'.'.$pix;
		// 初始化 UploadManager 对象并进行文件的上传。
		$uploadMgr = new UploadManager();
		// 调用 UploadManager 的 putFile 方法进行文件的上传。
		list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
		
		if($err !== null) {
			return '/' . $file_path;
			
		}else{
			@unlink($filePath);
			return $config['upload']['qiniu']['url'] . '/' . $key;
		}
	   
	   
	   
       
        
    }
}