<?php
namespace Admin\Controller;

class upload{
	protected $fileName;//文件名
	protected $maxSize;//允许的最大文件大小
	protected $allowExt;//允许的扩展名
	protected $uploadPath;//文件上传指定目录
	protected $imgFlag;//文件是否为真实图片标志
	protected $fileInfo;//文件信息
	protected $error = '';//错误信息
	protected $ext;//上传图片的扩展名

	//构造函数
	public function __construct($fileName,$maxSize,$allowExt,$uploadPath,$imgFlag,$fileInfo){
		$this-> fileName   = $fileName;//文件名
		$this-> maxSize    = $maxSize;//允许的最大文件大小
		$this-> allowExt   = $allowExt;//允许的扩展名
		$this-> uploadPath = $uploadPath;//文件上传指定目录
		$this-> imgFlag    = $imgFlag;//文件是否为真实图片标志
		$this-> fileInfo   = $fileInfo;//文件信息
	}

	//检测是否有错误
	protected function checkError(){
		if($this->fileInfo['error'] > 0){
			switch($this->fileInfo['error']){
				case 1: $this->error = '文件大小超过了php.ini中upload_max_filesize选项限制的值！'; break;
				case 2: $this->error = '文件大小超过了表单中max_file_size选项指定的值！'; break;
				case 3: $this->error = '文件只有部分被上传！'; break;
				case 4: $this->error = '没有文件被上传！'; break;
				case 6: $this->error = '找不到临时文件夹！'; break;
				case 7: $this->error = '文件写入失败！'; break;
				case 8: $this->error = '由于PHP的扩展程序中断文件上传！'; break;
				default: $this->error ='未知错误！'; break;
			}
			return false;
		}
		return true;
	}

	//检测文件是否超出最大传输值
	protected function checkSize(){
		if($this->fileInfo['size'] > $this->maxSize){
			$this->error = '上传文件过大!';
			return false;
		}
		return true;
	}

	//检测扩展名是否允许上传
	protected function checkExt(){
		$this->ext = strtolower(pathinfo($this->fileInfo['name'],PATHINFO_EXTENSION));
		if(!in_array($this->ext,$this->allowExt)){
			$this->error = '不允许上传文件类型!';
			return false;
		}
		return true;
	}


	//检测扩展名是否为真实图片
	protected function checkTrueImg(){
		if($this->imgFlag){
			if(!@getimagesize($this->fileInfo['tmp_name'])){
				$this->error = '上传文件不是真实图片!';
				return false;
			}
		}
		return true;
	}

	//检测是否以POST方式上传，是否上传到了暂存目录
	protected function checkHTTPPost(){
		if(!is_uploaded_file($this->fileInfo['tmp_name'])){
			$this->error = '文件不是以POST方式上传的!';
			return false;
		}
		return true;
	}


	//打印错误信息
	protected function showError(){
		exit('<span style="color:red;">'.$this->error.'</span>');
	}


	//检测上传目录是否存在，不存在则创建
	protected function checkPath(){
		if(!file_exists($this->uploadPath)){
			mkdir($this->uploadPath,0777,true);
			chmod($this->uploadPath,0777);
		}
	}

	public function uploadFile(){
		if($this->checkError()&&$this->checkSize()&&$this->checkExt()&&$this->checkHTTPPost()&&$this->checkTrueImg()){
			$this->checkPath();
			$unique = md5(uniqid(microtime(true),true)).'.'.$this->ext;
			$destination = $this->uploadPath.'/'.$unique;
			if(@move_uploaded_file($this->fileInfo['tmp_name'],$destination)){
				echo '<script>alert("相片上传成功。")</script>';
				return $destination;
			}else{
				$this->error = '文件移动失败';
				$this->showError();
			}
		}else{
			$this->showError();
		}
	}
}
?>