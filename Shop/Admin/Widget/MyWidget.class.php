<?php
namespace Admin\Widget;
use Common\Controller\AuthController;
use Org\Util\Rbac;

//widget控制器
class MyWidget extends AuthController{
   //用户的后台菜单
   private $menu = array();
    
    public function __construct(){
        parent::__construct();
        $menu = C('MENU');
//         $authMenu = Rbac::getModuleAccessList($this->_userInfo['id'],'menu');

        $this->menu = $this->check_menu($menu, $this->authMenu);
        //var_dump($this->menu);exit;
    }

    //加载后台菜单
    public function menu($currentMenu = 'user'){
        $this->assign('current',$currentMenu);
        $this->assign('userMenu',$this->menu);
        $this->display('My:menu');
    }
    
    //加载相应的菜单
    private function check_menu($menu, $authMenu){
        $subMenu = array();
        $temp = NULL;
        foreach ($menu as $key => $value){
            if(in_array($key,$authMenu)){
                $item = array();
                $count = 0;
                if(is_array($value)){
                        foreach ($value as $k => $v){
                            if(is_array($v)){
                                $tmp = array($k => $v);
                                $count++;
                                $item = array_merge($item,$this->check_menu($tmp, $authMenu));
                            }else{
                                $item[$k] = $v;
                            }
                        }
                        $item['subs'] = $count;
                }
                $subMenu[$key] = $item;
            }
        }
        return $subMenu;
    }
}











