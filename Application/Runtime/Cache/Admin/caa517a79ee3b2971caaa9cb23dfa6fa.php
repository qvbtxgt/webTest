<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>管理员登录</title>
</head>
<body>
	<form method="post" id="table">
		<table>
			<tr><td>用户名：</td><td><input type="text" name="admin_name" id="admin_name" placeholder="请输入用户名……"/></td></tr>
			<tr><td>密    码：</td><td><input type="password" name="admin_pwd" id="admin_pwd" placeholder="请输入密码……"/></td></tr>
			<tr><td>验证码：</td><td><input type='text' name='check' id='icode' value=''/><span id='checkcode'></span></td></tr>
			<tr><td><img id='captch' border='1' src="/test/index.php/Admin/Index/image?r=<?php echo rand();?>" width='100' heigth='30'/></td><td><a href='javascript:void(0)' onclick="document.getElementById('captch').src='/test/index.php/Admin/Index/image?r='+Math.random()">看不清？</a></td></tr>
			<tr><td><input type="reset" value="取消" /></td><td><input type="submit" value="登录" /></td></tr>
		</table>
	</form>
	<script src='/test/Public/jquery-3.1.0.min.js'></script>
	<script src='/test/Public/jquery.validate.js'></script>
<!--引入jquery框架-->
<script> 
var validator;
	$(document).ready(function(){
		validator = $("#table").validate({
			rules:{
				admin_name:{
					required:true,
					rangelength:[2,10],
					//remote:{
					//	url:
					//}
				},
				admin_pwd:{
					required:true,
					rangelength:[8,16],
					//remote:{
					//	url:
					//}
				},
				check:{
					required:true,
					remote:{
						url:"/test/index.php/Admin/Index/check?check="+$("#icode").val
						///test/index.php/Admin/Index表示当前控制器
					}
				}
			},
			messages:{
				admin_name:{
					required:"*必填！",
					rangelength:"长度不超过2到10位！",
					//remote:"输入有误！",
				},
				admin_pwd:{
					required:"*必填！",
					rangelength:"长度不超过8到16位！",
					//remote:"输入有误！",
				},
				check:{
					required:"*必填！",
					remote:"验证码错误！",
				},
			},
		});
	});
</script>
</body>
</html>