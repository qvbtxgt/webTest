<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>会员注册</title>
<link href="<?php echo (ACSS_URL); ?>register.css" rel="stylesheet" type="text/css" />
<!--引入jquery框架-->
<script src='/test/Public/jquery-3.1.0.min.js'></script>
<script src='/test/Public/jquery.validate.js'></script>
<script src='<?php echo (AJS_URL); ?>before_check.js'></script>
<script src='<?php echo (AJS_URL); ?>register.js'></script>
</head>
<body>
<div class="header">
<div class="name" style="margin:0px auto;width:250px">
	<h1 style="font-size:35px;color:#ff0000;">大善大爱大成</h1>
</div>
<div class="jump"><span>已有帐号，去<a href="">登录</a></span></div>
</div>
<div class="main">
<h1 style="font-size:25px;color:#e86868;padding:30px 0px 0px 90px">会员注册：</h1>
<div class="midd">


	<form method="post" id="table">
		<table>
			<tr>
				<td class="lab">用户名：</td>
				<td><input class="input_txt" type="text" name="admin_name" id="admin_name" placeholder="请输入您的用户名（不少于2位）"/></td>
				<td ></td>
			</tr>
			<tr>
				<td class="lab">昵  称：</td>
				<td><input class="input_txt" type="text" name="name" id="name" placeholder="请输入您的昵称（不少于2位）"/></td>
				<td ></td>
			</tr>
			<tr>
				<td class="lab">性  别：</td>
				<td><div class="sex"><input type="radio" name="man" /><label for="man"/>男</label>
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="man"/><label for="man"/>女</label></div></td>
				<td ></td>
			</tr>
			<tr>
				<td class="lab">密  码：</td>
				<td><input class="input_txt" type="password" name="admin_pwd" id="admin_pwd" placeholder="密码包含数字或字母6-16位"/></td>
				<td ></td>
			</tr>
			<tr>
				<td class="lab">确认密码：</td>
				<td><input class="input_txt" type="password" name="con_pwd" id="con_pwd" placeholder="再次输入密码"/></td>
				<td ></td>
			</tr>
			<tr>
				<td class="lab">QQ号：</td>
				<td><input class="input_txt" type="text" name="qq" id="qq" placeholder="请输入您的QQ号码（5位以上数字）"/></td>
				<td ></td>
			</tr>
			<tr>
				<td class="lab">邮  箱：</td>
				<td><input class="input_txt" type="text" name="email" id="email" placeholder="请输入您的邮箱"/></td>
				<td ></td>
			</tr>
			<tr>
				<td class="lab">个人主页：</td>
				<td><input class="input_txt" type="text" name="s_page" id="s_page" placeholder="请输入您的个人主页"/></td>
				<td ></td>
			</tr>
			<tr>
				<td class="lab">验证码：</td>
				<td><input class="input_txt" type='text' name='check' id='icode' placeholder="请输入验证码（不分大小写）"/>
				<span id='checkcode' style="color:#e86868"></span></td>
			</tr>
			<tr>
				<td></td>
				<!--增加一个随机数，可以防止图片缓存-->
				<td><img id='captch' border='1' src="/test/index.php/Admin/Index/image?r=<?php echo rand();?>" width='100' heigth='30'/>
				<a href='javascript:void(0)' style="padding-left:100px;position:absolute;" onclick="document.getElementById('captch').src='/test/index.php/Admin/Index/image?r='+Math.random()">看不清？</a></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="注册" style="width:260px"/></td>
			</tr>
		</table>
	</form>
</div>
</div>
<script>
//使用Ajax异步交互实现验证码的校验
	document.getElementById("icode").onkeyup=function(){
	if(window.XMLHttpRequest){
		request = new XMLHttpRequest();    //IE7+,Firefox,Chrome……
     }else{
        request = new ActiveXObject("Microsoft.XMLHTTP");//IE5、IE6或更早的版本
     }
	 var url="check?check="+document.getElementById("icode").value;
	request.open('GET',url,true);
	request.send();
	request.onreadystatechange = function() {
		if (request.readyState===4) {
			if (request.status===200) {
				document.getElementById("checkcode").innerHTML = request.responseText;//XMLHttpRequest对象的responseText属性
			} else {
				alert("发生错误：" + request.status);
			}
		} 
	}		
}
</script>	
</body>
</html>