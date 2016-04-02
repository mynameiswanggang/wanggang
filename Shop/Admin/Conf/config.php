<?php
return array(
	//'配置项'=>'配置值'
//     //模板布局设置
     'LAYOUT_ON'             =>  true, // 是否启用布局
     'LAYOUT_NAME'           =>  'Layout/layout', // 当前布局名称 默认为layout

    //rbac相关配置
    "USER_AUTH_ON" => true,                    //是否开启权限验证(必配)
    "USER_AUTH_TYPE" => 1,                     //验证方式（1、登录验证；2、实时验证）
 
    "USER_AUTH_KEY" => 'uid',                  //用户认证识别号(必配)
    "ADMIN_AUTH_KEY" => 'superadmin',          //超级管理员识别号(必配)
    "USER_AUTH_MODEL" => 'user',               //验证用户表模型 ly_user
    'USER_AUTH_GATEWAY'  =>  '/Public/login',  //用户认证失败，跳转URL
 
    'AUTH_PWD_ENCODER'=>'md5',                 //默认密码加密方式
 
    "RBAC_SUPERADMIN" => 'admin',              //超级管理员名称   
 
 
    "NOT_AUTH_MODULE" => 'Public',       //无需认证的控制器
    "NOT_AUTH_ACTION" => 'index',              //无需认证的方法
 
    'REQUIRE_AUTH_MODULE' =>  '',              //默认需要认证的模块
    'REQUIRE_AUTH_ACTION' =>  '',              //默认需要认证的动作
 
    'GUEST_AUTH_ON'   =>  false,               //是否开启游客授权访问
    'GUEST_AUTH_ID'   =>  0,                   //游客标记
 
    "RBAC_ROLE_TABLE" => 'shop_role',            //角色表名称(必配)
    "RBAC_USER_TABLE" => 'shop_role_user',       //用户角色中间表名称(必配)
    "RBAC_ACCESS_TABLE" => 'shop_role_node',        //权限表名称(必配)
    "RBAC_NODE_TABLE" => 'shop_node',            //节点表名称(必配)
    
    //后台菜单
    "MENU" => array(
        'user' => array(
            'name' => '用户管理',
            'url' => '',
            'class' => 'charts',
            'other' => '',  
            'useradd' => array(
                 'name' => '添加用户',
                 'url' => 'user/add_new_user',
                 'class' => '',
                 'other' => '',
                ),
            'userlist' => array(
                'name' => '用户列表',
                'url' => 'user/user_list',
                'class' => '',
                'other' => '',
            ),
            'roleadd' => array(
                'name' => '添加角色',
                'url' => 'user/add_new_role',
                'class' => '',
                'other' => '',
            ),
            'rolelist'=> array(
                'name' => '角色列表',
                'url' => 'user/role_list',
                'class' => '',
                'other' => '',                
            ),
            'nodeadd' => array(
                'name' => '添加权限',
                'url' => 'user/add_new_node',
                'class' => '',
                'other' =>'',
            ),
            'nodelist' => array(
                'name' => '权限列表',
                'url' => 'user/node_list',
                'class' => '',
                'other' =>'',
            ),            
        ),
        'other' => array(
            'name' => '其他管理',
            'url' => '',
            'class' => 'forms',
            'other' => '',
            'othermanage1' => array(
                'name' => '其他管理1',
                'url' => '',
                'class' => '',
                'other' => '',
            ),
            'othermanage2' => array(
                'name' => '其他管理2',
                'url' => '',
                'class' => '',
                'other' => '',
            ),
            'othermanage3' => array(
                'name' => '其他管理3',
                'url' => '',
                'class' => '',
                'other' =>'',
            ),
        ),

        
    ),    
    
);