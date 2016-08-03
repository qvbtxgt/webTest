<?php
namespace Home\Model;
use Think\Model;
class IndexModel extends Model{
	
	public function index(){
		$this->display();
		echo '大家好。';
	}
	
	//调用配置文件中的数据库的数据库配置1
	//protected $connection = 'DB_CONFIG1';
	
	
}