<?php
namespace Home\Controller;
use Common\Controller\CController;

//前台首页管理控制器
class HomepageController extends CController{
    public function __construct(){
        parent::__construct();
        
        $this->assign('siteTitle', L('HOMEPAGE_TITLE'));
        $this->assign('search', L('HOMEPAGE_SEARCH'));
    }
    
    public function index(){
        
      //显示首页
        $this->display();
    }
}