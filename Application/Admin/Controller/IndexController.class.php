<?php
namespace Admin\Controller;
use Think\Controller;
import("@.Model.Index");
class IndexController extends Controller {
    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
		echo 'Hello world!This is admin';
		
	}
	
	function hello(){
		if ($admin_name = session('admin_name')){
// 			$this->assign('admin_name',$admin_name);
// 			$this->display('welcome');//显示视图welcom.html文件
			echo U("Student/showMajor");
			U("Student/showMajor");
		}else {
			$this->error('非法用户，请先登录！',U('login'));//跳转到login方法
		}
		
	}
	
	public function login(){
		if (IS_POST){
			$admin = M("admin");
			$adminInfo = $admin -> create();//获取通过POST方式得到的表示信息
			$where = array('admin_name' => $adminInfo["admin_name"]);
			$checkcode = $_POST['check'];
			echo $checkcode;
			if(strtolower($checkcode) != strtolower($_SESSION['captch_code'])){
				$url='login.html';
				echo "<script>alert('验证码错误！');location.href='$url'</script>";
			}else {
			if ($realpwd = $admin->where($where)->getField("admin_pwd")){
				if ($realpwd == md5($adminInfo["admin_pwd"])){
					session('admin_name',$adminInfo['admin_name']);
// 					$this->success("登录成功！",U('hello'));//跳转到hello方法
					$this->success("登录成功！",U('Student/showMajor'));//跳转到Student控制器下的show方法
					
					//验证完用户名和密码后，跳转到学生管理系统界面
					return;
				}
			}else{
			//$this->error("用户名或密码不正确，请重试！");
			$url='login.html';
			echo "<script>alert('用户名或者密码错误！');location.href='$url'</script>";
			return ;//回到刚才登录的界面
			}}
		}
		$this->display();
	}
	
	
	function check(){
		if(IS_GET){
			if(isset($_GET['check'])&& !empty($_GET['check'])){
				session_start();
				//将用户输入的验证码与服务端存储的验证码内容进行对比
				if(strtolower($_GET['check']) == strtolower($_SESSION['captch_code'])){
					//echo '输入正确！';
					return true;
				}else{
					echo '*验证码错误！';
					//return false;
				}
			}else{
				echo "*必填！";
			}
		
		}
	}
	
	function image(){
		session_start();//必须处于程序顶部
		$width = 120;
		$height = 40;
		$image = imagecreatetruecolor($width,$height);   //生成100*30的底图
		$black = imagecolorallocate($image,0,0,0);//黑色
		$bgcolor = imagecolorallocate($image,255,255,255);//write
		imagefill($image,0,0,$bgcolor);//填充背景
	
		$captch_code = "";//用于记录验证码内容
		//生成4位随机验证码内容
		for($i=0;$i<4;$i++){
			$fontsize = 5;//设置验证码内容大小
			$fontcolor = imagecolorallocate($image,rand(0,100),rand(0,100),rand(0,100));//验证码颜色深
			$data = 'abcdefghijkmnpqrstuvwxyABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
			$fontcontent = substr($data,rand(0,strlen($data)-1),1);//从$data对象中随机获取一个字符
			$captch_code .= $fontcontent;
			$x = ($i*100/4)+rand(15,20);
			$y = rand(5,25);//设置验证码位置
			imageString($image,$fontsize,$x,$y,$fontcontent,$fontcolor);
		}
		$_SESSION['captch_code'] = $captch_code;
	
		for($i<0;$i<200;$i++){
			//增加干扰点
			$pointcolor = imagecolorallocate($image,rand(50,200),rand(50,200),rand(50,200));//干扰点颜色浅
			imagesetpixel($image,rand(1,$width-1),rand(1,$height-1),$pointcolor);
		}
	
		for($i=0;$i<3;$i++){
			//增加干扰线
			$linecolor = imagecolorallocate($image,rand(100,200),rand(100,200),rand(100,200));//干扰线颜色更浅
			imageline($image,rand(1,$width-1),rand(1,$height-1),rand(1,$width-1),rand(1,$height-1),$linecolor);
		}
	
		header('Content-Type:image/png');
		imagepng($image);//输出图像
	
		//end
		imagedestroy($image);
	}
	
}