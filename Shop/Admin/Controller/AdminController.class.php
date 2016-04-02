<?php
namespace Admin\Controller;
use Common\Controller\AuthController;
use Org\Util\Rbac;

//测试控制器
class AdminController extends AuthController{
    public function __construct(){
        parent::__construct();
    }
    
    //展示用户的相关信息
    public function index(){
        // var_dump(Rbac::getModuleAccessList(1,'menu'));exit;
       $this->display();
    }
    
    public function test(){
        echo 'test';
    }
}