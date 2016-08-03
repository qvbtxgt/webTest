<?php
return array (
		// '配置项'=>'配置值'
		
		// 打开网页追踪
		//'SHOW_PAGE_TRACE' => true,
		
		// 设置传入参数按变量顺序绑定
		'URL_PARAMS_BIND_TYPE' => 1,
		
		// 打开路由
		'URL_ROUTER_ON' => true,
		// 静态路由
		'URL_MAP_RULES' => array (
				'test/hello' => 'test/home.php/Home/News/hello',
				'News/:name' => function ($name) {
					echo 'Hello,' . $name;
				} 
		),
// 		'TAGLIB_BEGIN'          =>  '[',  // 标签库标签开始标记
// 		'TAGLIB_END'            =>  ']',  // 标签库标签结束标记
		
		// 路由规则配置
		'URL_ROUTE_RULES' => array (
				
				'News/:id\d' => 'News/read',
				'News/:name' => 'News/read',
				'News/:year\d/:month\d' => 'News/archive' 
		),
		'APP_SUB_DOMAIN_DEPLOY'   =>    1, // 开启子域名配置

		'db_type'  => 'mysql',
		'db_user'  => 'root',
		'db_pwd'   => '',
		'db_host'  => 'localhost',
		'db_port'  => '3306',
		'db_name'  => 'db',
		'db_prefix'=> 'stu_'
		
		);