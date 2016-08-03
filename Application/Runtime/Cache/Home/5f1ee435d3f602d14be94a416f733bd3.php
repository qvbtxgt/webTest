<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>

	<h1>欢迎来到这里。这是视图模板</h1>	
	
	[volist name='arr' id='number']
		<?php echo ($number["name:$number"]["id"]); ?>
	[/volist]

		
	[for start="1" end="5"]
		<?php echo ($i); ?>
	[/for]
	
	
	<!-- 我是HTML注释，这里name要传入变量  -->
	
	[switch name="name"]    
	[case value="1"]value1[/case]    
	[case value="2"]value2[/case]    
	[default /]default
	[/switch]
	
	
	[eq name="name" value="2"]
		equal 2
	[else/]
		notequal 2
	[/eq]
	
	
	
</body>
</html>