<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>管理员登录</title>
</head>
<body>
	<form method="post">
		<table>
			<tr>
				<td>用户名：</td>
				<td><input type="text" style="height:30px" name="admin_name" placeholer="请输入用户名……"/></td>
			</tr>
			<tr>
				<td>密    码：</td>
				<td><input type="password" style="height:30px"  name="admin_pwd" /></td>
			</tr>
			<tr>
				<td>验证码：</td>
				<td><input type='text' style="width:50px;height:30px" name='check' id='icode' value=''/><span id='checkcode'><img id='captch' border='1' src="/test/index.php/Admin/Index/image?r=<?php echo rand();?>" width='100' heigth='30'/></span></td>
				<td><a href='javascript:void(0)' onclick="document.getElementById('captch').src='/test/index.php/Admin/Index/image?r='+Math.random()">看不清？</a></td>
			</tr>
			<!--<tr><td><img id='captch' border='1' src="/test/index.php/Admin/Index/image?r=<?php echo rand();?>" width='100' heigth='30'/></td><td><a href='javascript:void(0)' onclick="document.getElementById('captch').src='/test/index.php/Admin/Index/image?r='+Math.random()">看不清？</a></td></tr>-->
			<tr><td><input type="reset" value="取消" /></td><td><input type="submit" value="登录" /></td></tr>
		</table>
	</form>
	<script>
document.getElementById("icode").onblur=function(){
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