<?php
namespace Admin\Controller;
use Think\Controller;
use Org\Util\Rbac;

//后台用户登陆退出控制器
class PublicController extends Controller{
    public function login(){
        if( ! IS_POST){
            //显示后台登陆界面
            $this->display();
        }else{
            
            //获取用户的账号信息
            $account = D('user');
            $username = I('post.username')?I('post.username'):'';
            if($username){
                $info = $account->get_user_info($username);
                if(! $info){
                    $res = array(
                        'res' => false,
                        'msg' => '用户不存在!',
                    );
                    $this->ajaxReturn($res);
                }elseif(!$info['status']){
                    $res = array(
                        'res' => false,
                        'msg' => '用户被禁用，请联系管理员!',
                    );
                    $this->ajaxReturn($res);
                }else{
                    //对比密码是否正确
                    if(md5(I('post.password')) != $info['password']){
                        //密码错误
                        $res = array(
                            'res' => false,
                            'msg' => '用户名或密码错误',
                        );
                        $this->ajaxReturn($res);
                    }else{
                        //登陆成功
                        //写入session值
                        session('shop_user',$info);
                        session(C("USER_AUTH_KEY"), $info["id"]);
                        session("username", $info["username"]);
                        //修改登陆时间和客户端ip地址
                        $data = array(
                            'id' => $info['id'],
                            'login_count' => $info['login_count']+1,
                        );                        
                        $account->set_user_info($data);
                        
                        //如果为超级管理员，则无需验证
                        if($info['username'] == C('RBAC_SUPERADMIN')) {
                            session(C('ADMIN_AUTH_KEY'), true);
                        }
                        
                        //载入RBAC类
                        //import('ORG.Util.RBAC');
                        
                        //读取用户权限
                        Rbac::saveAccessList();                        
                        
                        $res = array(
                            'res' => true,
                        );
                        $this->ajaxReturn($res);
                    }
                }
            }else{
                $res = array(
                    'res' => false,
                    'msg' => '用户不存在',
                );
                $this->ajaxReturn($res);
            }

        }
    }
    
    //退出登陆
    public function logout(){
        session('shop_user', NULL);
        $this->success('退出登陆成功！跳转到登陆页面...', __APP__.'/Admin/Public/login');
    }
}