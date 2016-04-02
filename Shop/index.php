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

// 定义应用目录
define('APP_PATH','./');

//定义网站根目录常量
define('SITE_URL','http://www.shop.com/');

//定义前台js文件目录常量
define('JS_URL',SITE_URL.'Public/Home/js/');

//定义前台css文件目录常量
define('CSS_URL',SITE_URL.'Public/Home/css/');

//定义前台fancybox文件目录常量
define('FANCYBOX_URL',SITE_URL.'Public/Home/fancybox/');

//定义前台superfish文件目录常量
define('SUPERFISH_URL',SITE_URL.'Public/Home/superfish/');

//定义前台img文件目录常量
define('IMG_URL',SITE_URL.'Public/Home/images/');

//定义后台js文件目录常量
define('ADMIN_JS_URL',SITE_URL.'Public/Admin/js/');

//定义后台css文件目录常量
define('ADMIN_CSS_URL',SITE_URL.'Public/Admin/css/');

//定义后台img文件目录常量
define('ADMIN_IMG_URL',SITE_URL.'Public/Admin/images/');

// 引入ThinkPHP入口文件
require '../think/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单