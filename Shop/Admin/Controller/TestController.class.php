<?php
namespace Admin\Controller;
use Think\Controller;

//测试控制器
class TestController extends Controller{
    public function __construct(){
        parent::__construct();
    }
    
    //测试短链生成服务
    public function short($url){
        echo short_url($url);exit;
    }
    
    public function getip(){
        var_dump(get_client_ip());
    }
}