<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->show('<style type="text/css">
        		*{ padding: 0; margin: 0; } 
        		div{ padding: 4px 48px;} 
        		body{ background: #fff; 
        		font-family: "微软雅黑"; 
        		color: #333;font-size:24px} 
        		h1{ font-size: 100px; 
        		font-weight: normal; 
        		margin-bottom: 12px; } 
        		p{ line-height: 1.8em; font-size: 36px } 
        		a:hover{color:red;}
        		</style>
        		<div style="padding: 24px 48px;"> 
        		<h1>:)</h1>
        		<p>欢迎使用 <b>ThinkPHP</b>！</p><br/>
        		版本 V{$Think.version}</div>
        		<script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script>
        		<thinkad id="ad_55e75dfae343f5a1"></thinkad>
        		<script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
		echo 'Hello world!This is home.';
		$this->display('hello');//调用当前模块下面的hello模板。
		echo  $this->display('Index:hello');//调用Index模块下面的hello模板。
		$name = '邹敏';
		$this->assign('name',$name);
		$data['name'] = 'ThinkPHP';
		$data['email'] = 'ThinkPHP@qq.com';
		$this->assign('data',$data);
		$this->display();
// 		$Verify = new \Think\Verify();
// 		$Verify->entry();
		
    
    }
	
	//空操作
	function _empty($name){
		echo '当前城市：'.$name;  //调用参数前面不要忘了加“.”
	}
	
	public function test($id){
		echo 'This is the Action of test.';
		echo 'id='  .$id;//调用参数前面不要忘了加“.”
		//echo C('Conf/config.php');//加入配置信息
		//$this->redirect('Index/hello',  5, '页面跳转中...');
	}
	
	function hello(){
		
		echo '<br>本文件的URL地址为：';
		echo U('Index/hello','xml');
		//XML标签和HTML标签的定界符"<>"不能冲突，否则会导致解析错误
		//所以将其改为"[]"
		C('TAGLIB_BEGIN' ,'[');
		C('TAGLIB_END',']' );
		//动态配置，连接数据库
// 		$connect = C('DB_CONFIG1' ,'mysql://root:@localhost:3306/db');
		$User = M('contacts','',$think.DB_CONFIG2);//调用入口文件中定义的常量
		$condition['sex'] = '女';
		//通过条件查询
		$arr = $User->where($condition)->select();
		echo $User->getLastSql();
		dump($arr);
		$this->assign('arr',$arr);
		$this->assign("name",w5);
		$this->display();
		$info = '测试信息';
		trace($info,'提示',debug);
		echo S(array(        'host'=>'192.168.1.10',    'port'=>'11211',    'prefix'=>'think',    'expire'=>60));
	}
	
	function conn(){
		
		//动态配置，连接数据库
		$connect = C('DB_CONFIG1' ,'mysql://root:@localhost:3306/db');
		$User = M('contacts','','DB_CONFIG1');
		$condition['sex'] = '女';
		//通过条件查询
		$arr = $User->where($condition)->select();
		dump($arr);
	}
	
}