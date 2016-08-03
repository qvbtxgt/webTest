<?php
namespace Admin\Controller;
use Think\Controller;

class StudentController extends Controller{
	
	
	function all(){
		$model = M('student');
		$stu_info = $model->order('createtime')->select();
		dump($stu_info);
		$this->assign('student_info',$stu_info);
		
		$this->display();
	}
	
	function showMajor(){
		$info = D('major')->relation(true)->select();//relation(true)是打开关联，注意没有引号
		$this->assign('info',$info);
// 		dump($info);
		$this->display();
	}
	
	function check(){
		
		$model = M("student");
		$stu_id = I('get.stu_id');
		echo 'stu_id is '.$stu_id;
		if(IS_GET){
			$length = strlen($stu_id);
			if ($length!=10 || !isset($_GET["stu_id"]) || empty($_GET["stu_id"])) {
				echo "请输入正确的学号";
			return;
			}
			$where = array('stu_number' => $stu_id);
			//通过模型类获取指定学生ID
			$student_info = $model->where($where)->select();
			//dump($student_info);
			if($student_info!=null){
				echo '学号已存在！';
			}else{
				echo '学号正确！';
			}
		}
		
	}
	
	
	function footer(){
		$this->display();
	}
	
	function showList(){
		//实例化Student模型对象
		$model = M('student');
		//判断是否有参数class_id，如果有则使用I方法接收并赋值给$class_id，如果没有则使用默认值1
		$class_id = I('param.class_id');
		echo 'class_id is '.I('param.class_id');
		//以数组的形式组合查询条件
		$where = array('class_id' => $class_id);
		//通过模型类获取指定班级ID的学生信息
		$student_info = $model->where($where)->select();
		//把班级ID分配到视图页面
		$this->assign('class_id', $class_id);
		//把学生信息分配到视图页面
		$this->assign('student_info', $student_info);
		//实例化Major模型对象，使用relation方法进行关联操作
		$major_info = D('major')->relation(true)->select();
		//把专业及班级信息分配到视图页面
		$this->assign('major_info', $major_info);
		
		
		//显示视图
		$this->display();
	}
	
	function add(){
		
		//获取学生所属班级id
		$class_id = I('param.class_id');
		echo 'class_id is '.$class_id;
		//判断是否有POST表单提交
		if (IS_POST) {
			//实例化studnet模型类
			$model = M('student');
			//获取要添加的学生信息
			$student_info = $model->create();
			//执行模型类的add()方法，完成数据添加
			if ($model->add()!== false) {
				//当添加成功后，提示信息并跳转到学生所属的学生列表页
				//$this->success('学生添加成功，正在跳转，请稍候！', "showList?class_id={$class_id}",5);
				//echo "__CONTROLLER__/showList?class_id={$class_id}";
				$url = "showList?class_id={$student_info['class_id']}";
				echo "<script>alert('学生添加成功');location.href='$url'</script>";
				return;
			}
			//添加失败，则返回到上一页面
			//$this->error('学号重复，添加失败，请重新输入！');
			$url = "showList?class_id={$student_info['class_id']}";
			echo "<script>alert('学号重复，添加失败!');location.href='$url'</script>";
			return;
		}
		//实例化Major模型对象，使用relation方法进行关联操作
		$major_info = D('major')->relation(true)->select();
		//将专业班级信息分配到视图页面中
		$this->assign('major_info', $major_info);
		//将班级id分配到视图页面中
		$this->assign('class_id', $class_id);
		//显示视图文件
		$this->display();
	}
	
	public function update() {
		//获取student模型类对象
		$model = M('student');
		//组合查询条件
		$where = array(
				'stu_id' => I('param.stu_id'),
		);
		echo 'stu_id is '.I('param.stu_id');
		//判断是否有POST数据，如果有则说明需要进行数据更新
		if (IS_POST) {
			//使用create方法获取表单数据
			$student_info = $model->create();
			//使用save方法进行数据更新
			if ($model->save() !== false) {
				//更新成功，则提示相关信息并跳转到当前学生所属班级的学生列表页
				//$this->success('学生信息更新成功，正在跳转，请稍候！', "showList?class_id={$student_info['class_id']}");
				$url = "showList?class_id={$student_info['class_id']}";
				echo "<script>alert('学生更新成功');location.href='$url'</script>";
				return;
			}
			//更新失败，提示相关信息并跳转到上一页面
			$this->error('学生信息更新失败，请重新输入！');
			return;
		}
		//根据查询条件获取学生信息，由于是单条数据，因此使用find方法
		$student_info = $model->where($where)->find();
// 		dump($student_info);
		//判断该学生是否存在，如果不存在则提示错误信息并返回上一页面
		if (!isset($student_info)) {
			$this->error('查询的学生信息不存在，请重新选择！');
			return;
		}
		//实例化Major模型对象，使用relation方法进行关联操作
		$major_info = D('major')->relation(true)->select();
		//将学生信息分配到视图页面
		$this->assign('student_info', $student_info);
		//将专业和班级信息分配到视图页面
		$this->assign('major_info', $major_info);
		//显示视图
		$this->display();
	}
	
	public function delete() {
		session_start();//必须处于程序顶部
		//获取student模型对象
		$model = M('student');
		//组合删除条件
		$where = array(
				'stu_id' => I('param.stu_id'),
		);
		echo '删除的stu_id='.I('param.stu_id');
		//获取班级id，用于删除成功时跳转
		$class_id = I('param.class_id');
		$url = "showList?class_id={$class_id}";
		$_SESSION['class_id'] = $class_id;
		//使用delete方法进行数据删除
		$stu_info = $model->where($where)->select();
		dump($stu_info);
		$res = $model->where($where)->delete();
		//判断删除是否成功，当返回值为false时，表示删除失败
		if ($res === false) {
			$this->error('删除失败，正在返回，请稍候！');
			return;
			//当返回值为0时，表示要删除的数据不存在
		} elseif ($res === 0) {
			$this->error('要删除的学生信息不存在，请重新选择！');
			return;
		}
		//不为false 0 则表示删除成功，跳转到被删除的学生所属班级的学生列表页
		$cl_id = $_SESSION['class_id'];
		$this->success('删除成功，正在跳转，请稍候！', "showList?class_id={$_SESSION['class_id']}",5);
		//echo '$cl_id='.$stu_info['class_id'];
		
		echo "<script>alert('学生删除成功');location.href='$url'</script>";
		return;
	}
	
	public function addAll(){
		//判断是否有POST表单提交
		if (IS_POST) {
			//实例化student模型类
			$model = M('student');
			//调用create()方法收集表单数据
			$data = $model->create();
			//由于表单存在多条学生数据，因此需要整理，定义$newDate数组变量，用来保存整理后的表单数据
			$new_data = array();
			//遍历$data数组
			foreach($data as $k => $v){
				//按照addAll()方法要求的格式，组合插入数据
				for($i=0,$len=count($v); $i<$len; $i++){
					isset($v[$i]) && $new_data[$i][$k] = $v[$i];
				}
			}
			if ($model->addAll($new_data)) {
				//当添加成功后，提示信息并跳转到学生所属的学生列表页
				$this->success('学生添加成功，正在跳转，请稍候！', U("showList"));
				return;
			}
			//添加失败，则返回到上一页面
			$this->error('学生添加失败，请重新输入！');
			return;
		}
		//实例化Major模型对象，使用relation方法进行关联操作
		$major_info = D('major')->relation(true)->select();
		//将专业班级信息分配到视图页面中
		$this->assign('major_info', $major_info);
		//显示视图文件
		$this->display();
	}
	
	function changePwd(){
		//获取登录用户信息
		$admin_name = session('admin_name');
		//实例化模块
		$model = M('admin');
		
		//设置查询条件
		$where = array(
				'admin_name' => $admin_name,
		);
		//获取登录用户的原密码
		$old_pwd = $model->where($where)->select();
		//判断是否提交
		if (IS_POST){
			$admin_info = $model->create();
			if ($old_pwd==md5($admin_info['get_pwd'])){
				$this->success('修改密码成功',U(__CONTROLLER__/showMajor));
			}
		}
		$this->error('输入的原密码有误，请重新输入……');
		return;
		$this->display();
	}
	//空方法
	public function _empty(){
		$this->error('开发中');
	}
}