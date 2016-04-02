<?php
namespace Admin\Model;
use Think\Model;

//用户表模型
class UserModel extends Model{
    //管理员列表的表头
    public $tableTitle = array(//用户名、角色名、邮箱、创建时间、上次登陆时间、上次登陆IP、状态、登陆次数
        '用户名',
        '角色名',
        '邮箱',
        '创建时间',
        '上次登陆时间',
        '上次登陆IP',
        '状态',
        '登陆次数',
        '操作'
    );
    //当前表中的所有字段
    private $_fields = array();
    //自动验证
    protected $_validate = array(
        array('username','/^[\w*#]{4,}$/','用户名不合法',1,'regex',1), //新增用户时验证
        array('username','','用户已经存在！',0,'unique',1), //新增用户时验证
        array('password','/^[\w*#]{4,}$/','密码不合法！',1,'regex',1), //新增用户时
    );
    //自动完成
    protected $_auto = array (
        array('create_time','time',1,'function'),  // 新增的时候把status字段设置为1
        array('login_time','time',2,'function') , // 对password字段在新增和编辑的时候使md5函数处理
        array('login_ip','get_client_ip',2,'function'), // 对name字段在新增和编辑的时候回调getName方法
        array('username','trim',1,'function'),
        array('password','trim',1,'function'),
        array('password','md5',1,'function'),
    );    
    public function __construct(){
        parent::__construct();
        $this->_fields = $this->getDbFields();
    }
    
    //获取某个用户的信息
    public function get_user_info($username,$field = 'all'){
        if(!$username){
            return false;
        }
        if(is_array($field)){
           foreach ($field as $f){
               if(!in_array($f, $this->_fields)){
                   $this->error = '字段不存在';
                   return false;
               }
           } 
        }
        $condition['username'] = $username;
        return $field=='all'?$this->where($condition)->find():$this->where($condition)->field($field)->find();
    }

    //更新用户的信息
    public function set_user_info($userInfo){
               if(!$this->create($userInfo)){
                   return false;
               }
               return $this->save();
    }
    
    //获取角色表中某个字段的数组('id'=>'name')
    public function field_array($field,$status = 1){
        $tmp = explode(',', $field);
        if(!tmp){
            return false;
        }
        foreach ($tmp as $f){
            if(!in_array($f, $this->_fields)){
                return false;
            }
        }
        $condition['status'] = $status;
        return $this->where($condition)->getField($field);
    }
    
    //新建一个分配好角色的用户
    public function add_user($userInfo){
        if(!$userInfo){
            $this->error = '数据不合法';
            return false;
        }
        $roleId = $userInfo['role'];
        unset($userInfo['role']);
        if(!$roleId || !is_int((int)$roleId)){
            $this->error = '请选择角色';
        }
        if(!$this->create($userInfo)){
            return false;
        }
       $newUserId = $this->add();
       if(!$newUserId){
           $this->error = '系统错误';
           return false;
       }
       //更新用户角色映射表
       $role_user = M('role_user');
       
       $data['role_id'] = $roleId;
       $data['user_id'] = $newUserId;
       
       return $role_user->add($data);
    }
    
    //按条件读取管理员列表（分页、排序、搜索某些用户）
    public function user_list($condition = []){
        //var_dump($condition);exit;
        $operation = array('page','limit','order','where','group','field','join');
        if(!is_array($condition)){
            $this->error = '参数必须为数组';
            return false;
        }

        $sOperation = $this;  
        $test = '$this';
        
        if(empty($condition)){
            //无条件查询
            return false;
        }else{
            
            foreach ($condition as $key => $value){
                $oper = strtolower($key);
                if(!in_array($oper, $operation)){
                    $this->error = '参数不合法';
                    return false;
                }else{
                    switch($oper){
                        case 'page'://分页的页数,必须为数字,大于0
//                             if(!(int)$value){
//                                 $this->error = '参数不合法';
//                                 return false;                                
//                             }
                            $test .= '->page';
                            $sOperation = $sOperation->page($value);
                            break;
                        case 'limit'://分页每页显示数目,必须为数字，大于0
//                             if(!(int)$value){
//                                 $this->error = '参数不合法';
//                                 return false;
//                             }
                            $test .= '->limit';
                            $sOperation = $sOperation->limit($value);                            
                            break;
                        case 'order'://排序
//                             if(!is_array($value)){
//                                 $this->error = '参数不合法';
//                                 return false;
//                             }
                            $test .= '->order';
                            $sOperation = $sOperation->order($value);                            
                            break;
                        case 'group'://分组
//                             if(is_string($value)){
//                                 $this->error = '参数不合法';
//                                 return false;
//                             }
                            $test .= '->group';
                            $sOperation = $sOperation->group($value);                            
                            break;
                        case 'field'://字段
//                             if(!is_array($value)){
//                                 $this->error = '参数不合法';
//                                 return false;
//                             }
                            $test .= '->field';
                            $sOperation = $sOperation->field($value);                            
                            break;
                        case 'join'://关联表
                            $test .= '->join';
                            $sOperation = $sOperation->join($value);
                            break;
                        case 'where'://where条件
                            $test .= '->where';
                            $sOperation = $sOperation->where($value);
                            break;
                        default:
                            $this->error = '参数不合法';
                            return false;
                    }
                }
            }
           //echo $test.'<br/>';
           return $sOperation->select();
            
        }
    }

}





