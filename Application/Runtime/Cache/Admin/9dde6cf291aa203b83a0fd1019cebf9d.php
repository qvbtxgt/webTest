<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>会员注册</title>
<style>
	*{
		font:14px/1.5 微软雅黑,宋体,arial;
	}
	div{
		margin:10% auto;
		width:50%;
		height:50%;
		background-color:#d9ffff;
	}
	form{
		padding:10px;
		
	}
	.lab{
		float:right;
	}
	input{
		width:200px;
	}
	td{
		height:1.5e;
	}
</style>
</head>
<body>
<div class="midd">
	<form method="post" id="table">
		<table>
			<tr>
				<td class="lab">用户名：</td>
				<td><input type="text" name="admin_name" id="admin_name" placeholder="只能包含数字、字母和汉字！"/></td>
			</tr>
			<tr>
				<td class="lab">昵  称：</td>
				<td><input type="text" name="name" id="name" /></td>
			</tr>
			<tr>
				<td class="lab">密  码：</td>
				<td><input type="password" name="admin_pwd" id="admin_pwd" /></td>
			</tr>
			<tr>
				<td class="lab">确认密码：</td>
				<td><input type="password" name="con_pwd" id="con_pwd" /></td>
			</tr>
			<tr>
				<td class="lab">QQ号：</td>
				<td><input type="text" name="qq" id="qq" /></td>
			</tr>
			<tr>
				<td class="lab">邮  箱：</td>
				<td><input type="text" name="email" id="email" /></td>
			</tr>
			<tr>
				<td class="lab">个人主页：</td>
				<td><input type="text" name="s_page" id="s_page" /></td>
			</tr>
			<tr>
				<td class="lab">验证码：</td>
				<td><input type='text' name='check' id='icode' value=''/>
				<span id='checkcode'></span></td>
			</tr>
			<tr>
				<td></td>
				<td><img id='captch' border='1' src="/test/index.php/Admin/Index/image?r=<?php echo rand();?>" width='100' heigth='30'/>
				<a href='javascript:void(0)' onclick="document.getElementById('captch').src='/test/index.php/Admin/Index/image?r='+Math.random()">看不清？</a></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="注册" style="width:200px"/></td>
			</tr>
		</table>
	</form>
</div>
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
				name:{
					required:true,
					rangelength:[2,8],
					//remote:{
					//	url:
					//}
				},
				admin_pwd:{
					required:true,
					rangelength:[6,16],
					//remote:{
					//	url:
					//}
				},
				confirm:{
					required:true,
					equalTo:admin_pwd,
					//remote:{
					//	url:
					//}
				},
				email:{
					required:true,
					email:true,
					//remote:{
					//	url:
					//}
				},
				s_page:{
					url:true,
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
				name:{
					required:"*必填！",
					rangelength:"长度不超过2到10位！",
					//remote:"输入有误！",
				},
				admin_pwd:{
					required:"*必填！",
					rangelength:"<i class='ok'></i>长度不超过6到16位！",
					//remote:"输入有误！",
				},
				confirm:{
					required:"*必填！",
					equalTo:"两次输入的密码不一致！"
				},
				email:{
					required:"*必填！",
					email:"请输入正确的邮箱！",
					//remote:{
					//	url:
					//}
				},
				s_page:{
					url:"请输入正确的网页地址！",
					//remote:{
					//	url:
					//}
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