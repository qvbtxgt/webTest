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
<h2 class="main-right-nav">学生管理 &gt; 学生列表</h2>
<div>
<form method="post">请选择班级：
	<select name="class_id">
		<?php if(is_array($major_info)): foreach($major_info as $key=>$v): if(is_array($v["Class"])): foreach($v["Class"] as $key=>$vv): ?><option value="<?php echo ($vv["class_id"]); ?>" 
				<?php if(($class_id) == $vv["class_id"]): ?>selected<?php endif; ?>>
				<?php echo ($v["major_name"]); echo ($vv["class_name"]); ?></option><?php endforeach; endif; endforeach; endif; ?>
	</select>
	<input type="submit" value="确定" class="form-btn" />
</form>
<table class="table">
	<tr><th>学号</th><th>姓名</th><th>性别</th><th>操作</th></tr>
	<?php if(!empty($student_info)): if(is_array($student_info)): foreach($student_info as $key=>$v): ?><tr align="center">
				<td><?php echo ($v["stu_number"]); ?></td>
				<td><?php echo ($v["stu_name"]); ?></td>
				<td><?php echo ($v["stu_gender"]); ?></td>
				<td><div align="center"><a href="/test/index.php/Admin/Student/update?stu_id=<?php echo ($v["stu_id"]); ?>">编辑</a>&nbsp; &nbsp;<a href="/test/index.php/Admin/Student/delete?stu_id=<?php echo ($v["stu_id"]); ?>?class_id=<?php echo ($v["class_id"]); ?>"  onclick="javascript:if(confirm('确定要删除此信息吗？')){return true;}return false;">删除</a></div></td>
			</tr><?php endforeach; endif; ?>
		<?php else: ?>
		<tr align="center"><td colspan="5">查询的结果不存在！</td></tr><?php endif; ?>
</table>
<div><a href="/test/index.php/Admin/Student/add?class_id=<?php echo ($class_id); ?>" class="main-right-tita">添加学生</a></div>
</div>


	<div class="main-footer">
		<div>学生管理系统　本项目仅供学习使用</div>
	</div>
</body>
</html>