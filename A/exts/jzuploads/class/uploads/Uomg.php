<?php

class Uomg
{
    public $name = '优启梦云存储';
    public $ver = '1.0';

    public function save($file_path,$config=null)
    {
        $type = $config['upload']['uomg']['type'];
        $openid = $config['upload']['uomg']['openid'];
        $key = $config['upload']['uomg']['key'];
        if(empty($type)){
            $type = 'ali';
        }
        $filePath = $file_path;

        $url = 'https://api.uomg.com/api/image.'.$type;
        $data = [];
        //$data['imgurl'] = 'http://imgsrc.baidu.com/forum/pic/item/09f790529822720edafc8a9d76cb0a46f21faba3.jpg';
        $data['file'] = 'multipart';

        if (class_exists('CURLFile')) {
            $data['Filedata'] = new \CURLFile(realpath($file_path));
        } else {
            $data['Filedata'] = '@'.realpath($file_path);
        }

        $html = $this->curl_post_request($url,$data);
        $json = @json_decode($html,true);
        if($json['code']=='1'){
            $file_path = $json['imgurl'];
            @unlink($filePath);
        }

        return $file_path;
    }
	
	public function curl_post_request($url,$data=null){
		if(is_array($data)){
			$data = http_build_query($data);
		}
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, false);//不返回头部信息
		curl_setopt($ch, CURLOPT_POST, 1);
		if($data!=null){
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);	
		}
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);  //结果是否显示出来，1不显示，0显示    
		//判断是否https
		if(strpos($url,'https://')!==false){
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			$UserAgent = 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0; SLCC1; .NET CLR 2.0.50727; .NET CLR 3.0.04506; .NET CLR 3.5.21022; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
			curl_setopt($ch, CURLOPT_USERAGENT, $UserAgent);
		}
		$data = curl_exec($ch);
		curl_close($ch);
		if($data === FALSE) 
		{ 
		  $data = "curl Error:".curl_error($ch);
		} 
		return $data;
	}
}