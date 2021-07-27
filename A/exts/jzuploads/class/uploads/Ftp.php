<?php

class Ftp
{
    public $name = 'FTP存储';
    public $ver = '1.0';

    public function save($file_path,$config=null)
    {
		include_once(__DIR__ .'/ftp/Ftp.php');
        $ftp = new ftpOper();
        $ftp_config = [
            'ftp_host'=>$config['upload']['ftp']['host'],
            'ftp_port'=>$config['upload']['ftp']['port'],
            'ftp_user'=>$config['upload']['ftp']['user'],
            'ftp_pwd' =>$config['upload']['ftp']['pwd'],
            'ftp_dir'=>$config['upload']['ftp']['path'],
        ];
        $ftp->config($ftp_config);
        $ftp->connect();
        $a = $ftp->put( $file_path, $file_path);
        $filePath = $file_path;
        @unlink($filePath);
        return $config['upload']['ftp']['url'] . '/' . $file_path;
    }
}