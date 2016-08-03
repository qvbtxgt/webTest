<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
	<table class="table">
	<tr><th>学号</th><th>姓名</th><th>性别</th><th>操作</th></tr>
	<?php if(!empty($student_info)): if(is_array($student_info)): foreach($student_info as $key=>$v): ?><tr align="center">
				<td><?php echo ($v["stu_number"]); ?></td>
				<td><?php echo ($v["stu_name"]); ?></td>
				<td><?php echo ($v["stu_gender"]); ?></td>
				<td><div align="center"><a href="/test/index.php/Admin/Student/update/stu_id/<?php echo ($v["stu_id"]); ?>">编辑</a>&nbsp; &nbsp;<a href="/test/index.php/Admin/Student/delete/stu_id/<?php echo ($v["stu_id"]); ?>/class_id/<?php echo ($v["class_id"]); ?>"  onclick="javascript:if(confirm('确定要删除此信息吗？')){return true;}return false;">删除</a></div></td>
			</tr><?php endforeach; endif; ?>
		<?php else: ?>
		<tr align="center"><td colspan="5">查询的结果不存在！</td></tr><?php endif; ?>
</table>
	
	
</frameset>
</body>
</html>