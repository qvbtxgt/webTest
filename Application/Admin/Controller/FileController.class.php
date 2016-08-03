<?php
namespace Admin\Controller;
use Think\Controller;

class FileController extends Controller{
	function index(){
		header('Content-type:text/html;charset=utf-8');
		require_once 'upload.class.php';//引入上传文件类
		if(IS_POST){
			$fileName = 'myfile';//文件名
			echo "hello";
			dump($fileName);
			$maxSize = 2097152;//允许的最大文件大小2M
			$allowExt = array('jpeg','jpg','png','gif');//允许的扩展名
			$uploadPath ='upload';//文件上传指定目录
			$imgFlag = true;//文件是否为真实图片标志
			$fileInfo = $_FILES[$fileName];//文件信息
			$upload = new upload($fileName,$maxSize,$allowExt,$uploadPath,$imgFlag,$fileInfo);
			$des = $upload->uploadFile();//方法返回的是图片上传的相对路径
			echo $des;
			$this->assign('des',$des);
		}
		$this->display();
	}
	
	
	function multi(){
		header('Content-type:text/html;charset=utf-8');
		require_once 'upload.class.php';//引入上传文件类
	}
}