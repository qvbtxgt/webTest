<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>学生课程</title>
<style type="text/css">
<//.table tr td{border:1px solid;}>
</style>
</head>
<body>
<!doctype html>
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
<h2 class="main-right-nav">院系专业 &gt; 专业列表</h2>
<table class="table">
	 <tr><th>专业</th><th>班级</th><th>操作</th></tr>
	 <?php if(!empty($info)): if(is_array($info)): foreach($info as $key=>$v): if(is_array($v["Class"])): foreach($v["Class"] as $k=>$vv): ?><tr align="center">
				<?php if(($k == 0)): ?><//rowspan 属性规定单元格可横跨的行数，我是注释，“$v.Class|count”是获取每个专业对应的班级数量>
					<td rowspan="<?php echo (count($v["Class"])); ?>" class="table-major"><?php echo ($v["major_name"]); ?></td><?php endif; ?>
				<td width="40%"><a href="/test/index.php/Admin/Student/showList?class_id=<?php echo ($vv["class_id"]); ?>"><?php echo ($vv["class_name"]); ?></a></td>
				<td><div align="center"><a href="/test/index.php/Admin/Student/showList?class_id=<?php echo ($vv["class_id"]); ?>">查看</a>&nbsp; &nbsp;<a href="/test/index.php/Admin/Student/delete?student_id=<?php echo ($v["student_id"]); ?>?class_id=<?php echo ($v["class_id"]); ?>"  onclick="javascript:if(confirm('确定要删除此信息吗？')){return true;}return false;">删除</a></div></td>
				</tr><?php endforeach; endif; endforeach; endif; ?>
		
		<?php else: ?>
		<tr><td colspan="3">查询的结果不存在！</td></tr><?php endif; ?>
</table>



	<div class="main-footer">
		<div>学生管理系统　本项目仅供学习使用</div>
	</div>
</body>
</html>
</body>
</html>