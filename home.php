<?php
//在入口文件中定义常量

define('DB_CONFIG2', 'mysql://root:@localhost:3306/db');
// define('BIND_MODULE','Admin');
	define('APP_DEBUG',true);
	define('APP_PATH','./Application/');//一定要记得加反斜杠"/"
	require './ThinkPHP/ThinkPHP.php';
	
	
	