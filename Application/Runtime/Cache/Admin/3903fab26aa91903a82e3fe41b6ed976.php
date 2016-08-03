<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>学生管理系统</title>
    <!-- 记得修改CSS文件的相对路径 -->
	<link href="<?php echo (ACSS_URL); ?>style.css" rel="stylesheet">
</head>
<body>
<div class="top">
	<div class="top-box">
		<h1 class="top-box-logo">学生管理系统</h1>
		<div class="top-box-nav">
			欢迎您！<a href="__CONTROLLER/Student/me"><?php echo ($admin_name); ?></a> <a href="#">密码修改</a> <a href="/test/index.php/Admin/Index/logout">安全退出</a>
		</div>
	</div>
</div>
<div class="main">
	<div class="main-left">
		<div class="main-left-nav">
			<div class="main-left-nav-head">
				<strong>院系专业</strong><div></div>
			</div>
			<a href="/test/index.php/Admin/Student/showMajor">专业列表</a>
			<a href="#">添加专业</a>

			<div class="main-left-nav-head">
				<strong>学生管理</strong><div></div>
			</div>
			<div class="main-left-nav-list">
				<div><a href="/test/index.php/Admin/Student/showList/class_id/1">学生列表</a></div>
				<div><a href="/test/index.php/Admin/Student/add">添加学生</a></div>
				<div><a href="/test/index.php/Admin/Student/addAll">批量添加</a></div>
			</div>
			<div class="main-left-nav-head">
				<strong>系统设置</strong><div></div>
			</div>
			<div class="main-left-nav-list">
				<div><a href="#">修改密码</a></div>
			</div>

			<div class="main-left-nav-head">
				<strong>教学系统</strong><div></div>
			</div>
		</div>
	</div>
	<div class="main-right">
<h2 class="main-right-nav">学生管理 &gt; 学生添加</h2>
<div class="main-right-table">
	<form method="post">
		<table class="table">
			<tr>
				<th>学号：</th>
				<td><input type="text" class="form-text" name='stu_number' id="stu_id"
					required><label id="stuID"></label></td>
			</tr>
			<tr>
				<th>姓名：</th>
				<td><input type="text" class="form-text" name='stu_name' id="stu_name"
					required><label id="stuName"></label></td>
			</tr>
			<tr>
				<th>性别：</th>
				<td><select name="stu_gender">
						<option value="男">男</option>
						<option value="女">女</option>
				</select></td>
			</tr>
			<tr>
				<th>所属班级：</th>
				<td><select name="class_id">
						<?php if(is_array($major_info)): foreach($major_info as $key=>$v): if(is_array($v["Class"])): foreach($v["Class"] as $key=>$vv): ?><option value="<?php echo ($vv["class_id"]); ?>"<?php if(($class_id) == $vv["class_id"]): ?>selected<?php endif; ?>><?php echo ($v["major_name"]); echo ($vv["class_name"]); ?>
								</option><?php endforeach; endif; endforeach; endif; ?>
				</select></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit"
					value="确认输入" class="form-btn"> <input type="reset"
					value="重新填写" class="form-btn"></td>
			</tr>
		</table>
	</form>
</div>

<script>
document.getElementById("stu_id").onblur = function(){
	 var request;
     if(window.XMLHttpRequest){
        request = new XMLHttpRequest();    //IE7+,Firefox,Chrome……
     }else{
        request = new ActiveXObject("Microsoft.XMLHTTP");//IE5、IE6或更早的版本
     }
	 var url="check.php?stu_id="+document.getElementById("stu_id").value;
	request.open('GET',url,true);
	request.send();
	request.onreadystatechange = function() {
		if (request.readyState===4) {
			if (request.status===200) { 
				document.getElementById("stuID").innerHTML = request.responseText;//XMLHttpRequest对象的responseText属性
			} else {
				alert("发生错误：" + request.status);
			}
		} 
	}
}

document.getElementById("stu_name").onkeyup = function()else{
        request = new ActiveXObject("Microsoft.XMLHTTP");//IE5、IE6或更早的版本
     }
	 var url="check?stu_name="+document.getElementById("stu_name").value;
	request.open('GET',url,true);
	request.send();
	request.onreadystatechange = function() {
		if (request.readyState===4) {
			if (request.status===200) { 
				//XMLHttpRequest对象的responseText属性
				document.getElementById("stuName").innerHTML = request.responseText;
			} else {
				alert("发生错误：" + request.status);
			}
		} 
	}
}
</script>


	<div class="main-footer">
		<div>学生管理系统　本项目仅供学习使用</div>
	</div>
</body>
</html>