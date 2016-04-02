<?php
namespace Common\Controller;
use Think\Controller;
use Org\Util\Rbac;

//权限控制基类控制器
class AuthController extends Controller{
    //用户的信息
    protected  $userInfo = NULL;
    //权限菜单
    protected $authMenu = NULL; 
    
    public function __construct(){
        parent::__construct();
        $this->auth_check();
        $this->userInfo = session('shop_user');
        //读取用户表中用户的权限菜单
        $this->authMenu = array(
            'user',
            'other',
            'useradd',
            'userlist',
            'roleadd',
            'rolelist',
            'nodeadd',
            'nodelist',
            'othermanage2',
            'othermanage3'
        );
        $this->assign('user',$this->userInfo);
    }
    
    //检查用户的权限
    private function auth_check(){
        $key = C('USER_AUTH_KEY');
        $key = session($key);
        if(!isset($key)) {
            //$this->redirect('Admin/Public/login');
            $this->error('请先登陆！',__MODULE__.'/Public/login',3);
        }
        
        //判断当前的控制器或操作是否无需经过权限验证
        $notAuth = in_array(MODULE_NAME, explode(',', C('NOT_AUTH_MODULE'))) || in_array(ACTION_NAME, C('NOT_AUTH_ACTION'));
        
        //超级管理员无需验证
        $superadmin = C('ADMIN_AUTH_KEY');
        if(session($superadmin)){
            return true;
        }
        
        //权限验证
        if(C('USER_AUTH_ON') && !$notAuth) {
            //import('ORG.Util.RBAC');
            //使用了项目分组，则必须引入GROUP_NAME
            Rbac::AccessDecision() || $this->error("你没有对应的权限");
        }        
    } 
    
    //没有权限页面
    public function noauth(){
        $this->display();
    }
}