<?php
namespace Admin\Controller;
use Common\Controller\AuthController;
use Org\Util\Rbac;

//后台用户管理控制器
class UserController extends AuthController{
    //角色模型
    private $_role = NULL;
    //用户模型
    private $_user = NULL;
    public function __construct(){
        parent::__construct();
        
        $this->assign('title', '用户管理');
        
        $this->_role = D('role');
        $this->_user = D('user');
    }
    
    //添加新的管理员
    public function add_new_user(){
        if(!IS_AJAX){
            //获取所有的角色
            $roleList = $this->_role->field_array('id,name');
           
            $this->assign('pageTitle', '添加用户');
            $this->assign('pageDesc', '添加新的后台管理用户，并给新用户分配相应的角色!');      
            
            $this->assign('roleList', $roleList);
            $this->display();
        }else{
            $data = array();
            if(!($error = $this->_user->add_user(I('post.')))){
                $data['res'] = false;
                $data['msg'] = $this->_user->getError();
            }else{
                $data['res'] = true;
            }
            $this->ajaxReturn($data);
        }
    }
    
    //管理员列表
    public function user_list(){
        if(!IS_AJAX){
                
                $this->assign('tableTitle', $this->_user->tableTitle);
                //var_dump($this->_user->tableTitle);exit;
                //var_dump($userList);exit;
                
                $this->assign('pageTitle', '管理员列表');
                $this->assign('pageDesc', 'xxxxxxxxxxxxxxxxxxxxxxxxxxx!');  
                
                $this->display();
            }else{
                //var_dump(I('get.'));exit;
                //按条件显示用户列表
                $condition = array(
                    'page' => floor(I('get.iDisplayStart')/I('get.iDisplayLength'))+1,
                    'limit' => I('get.iDisplayLength'),
                    'field' =>array(//用户名、角色名、邮箱、创建时间、上次登陆时间、上次登陆IP、状态、登陆次数
                        'shop_user.id',
                        'shop_user.username',
                        'shop_role.name' => 'role',
                        'shop_user.email',
                        'from_unixtime(shop_user.create_time,"%Y-%m-%d") as create_time',
                        'from_unixtime(shop_user.login_time,"%Y-%m-%d") as login_time',
                        'shop_user.login_ip',
                        'shop_user.status',
                        'shop_user.login_count'
                    ),
                    'order' => array(
                        'login_time' => 'desc',
                    ),
                    'join' => 'LEFT JOIN shop_role_user ON shop_user.id = shop_role_user.user_id',
                    'Join' => 'LEFT JOIN shop_role ON shop_role_user.role_id = shop_role.id'
                );
                $userList = $this->_user->user_list($condition);                
                
                $data['iTotalRecords'] = count($userList);
                $data['sEcho'] = I('get.sEcho');
                $data['iTotalDisplayRecords'] = count($userList);
                $data['_'] = I('get._');
                $data['aaData'] = $userList;
                
                $this->ajaxReturn($data);
            }
    }
    
    //添加新的角色
    public function add_new_role(){
        echo '待完成';
    }
   
    //角色列表
    public function role_list(){
        echo '待完成';
    }
    
    //添加新的权限
    public function add_new_node(){
        echo '待完成';
    }
    
    //权限列表
    public function node_list(){
        echo '待完成';
    }
}