<?php
namespace Home\Controller;
use Think\Controller;

class HomeController extends Controller {
	function home() {
		//查找系统中可以使用的常量 
// 		dump(get_defined_constants(true));
		$this->display();
	}
	
	function index(){
		$con = new \Home\Model\UserModel();
		dump($con);
	}
	
	function me(){
		
		$this->display();
	}
}