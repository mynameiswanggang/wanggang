<?php
return array(
    //数据库连接配置
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'shop',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'shop_',    // 数据库表前缀
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
	//配置允许访问模块	
    'MODULE_ALLOW_LIST'    =>    array('Home','Admin'),
	//配置默认模块
	'DEFAULT_MODULE' =>'Home',
    //配置默认控制器
    'DEFAULT_CONTROLLER' => 'Homepage',
    //配置默认操作
    'DEFAULT_ACTION' =>'index',
    //多语言
    'LANG_AUTO_DETECT' => true, // 自动侦测语言 开启多语言功能后有效
    'LANG_SWITCH_ON' => true,
    'LANG_LIST'        => 'zh-cn,en-us', // 允许切换的语言列表 用逗号分隔
    'VAR_LANGUAGE'     => 'lang', // 默认语言切换变量    
    //COOKIE和SESSION前缀
    'COOKIE_PREFIX' => 'shop_',
    'SESSION_PREFIX' => 'shop_',  
);