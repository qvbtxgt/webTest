<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);
//生成Admin模块的目录
// define('BIND_MODULE','Admin');

//定义css,js,img常量
define("SITE_URL","http://localhost/test/");
define("CSS_URL", SITE_URL."Application/public/home/css/");//CSS
define("JS_URL", SITE_URL."Application/public/home/js/");//JS
define("IMG_URL", SITE_URL."Application/public/home/images/");//img
define("ACSS_URL", SITE_URL."Application/public/Admin/css/");//CSS
define("AJS_URL", SITE_URL."Application/public/Admin/js/");//JS
define("AIMG_URL", SITE_URL."Application/public/Admin/images/");//img

// 定义应用目录
define('APP_PATH','./Application/');

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单