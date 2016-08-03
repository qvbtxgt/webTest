<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<style>
  	body{ background:#ccc; }
	.box{ width:320px; border: solid #ccc 1px; background:#fff; margin:0 auto; padding:0 0 10px 60px;}
	img{ width:90px; float:left;padding:2px;border:1px solid #999;}
	.exist{ float:left;}
	.upload{ clear:both; padding-top:15px; }
	h2{ padding-left:60px;font-size:20px;}
	.sub{ margin-left:85px; background:#0099FF; border:1px solid #55BBFF; width:85px; height:30px; color:#FFFFFF; font-size:13px; font-weight:bold; cursor:pointer; margin-top:5px;}
  </style>
</head>
<body>
<div class="box">
<h2>编辑用户头像</h2>
   <p>用户姓名：<?php echo "王五";?></p>
   <p class="exist">现有头像：</p>
   <img src="http://localhost/test/<?php echo ($des); ?>"  onerror="this.src='http://localhost/test/default.jpg'"/>
   
	<form method='post' enctype="multipart/form-data">
		<input type='file' name="myfile"/><br/>
		<input type='submit' value="上传文件"/>
	</form>
</div>
</body>
</html>