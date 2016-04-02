<?php
namespace Home\Controller;
//use Think\Controller;
use Common\Controller\SmsController;
use Think\Controller;

//前台用户管理控制器
class UserController extends Controller{
    public function index(){
      //显示登陆首页
        $this->display();
    }
    public function login(){
        //$this->check();
        //前台用户登陆界面
        if( ! IS_POST){
            $username = cookie('shop_username')?cookie('shop_username'):'';
            $remember = cookie('shop_remember')?cookie('shop_remember'):'';
            if($username && $remember){
                $this->assign('username',$username);
                $this->assign('remember',$remember);
            }
            $this->display();
        }else{
            //首先判断验证码是否正确
            $verify = new \Think\Verify();
            if(! $verify->check(I('post.captcha'),'verify')){
                $res = array(
                    'res' => false,
                    'msg' => L('ACCOUNT_CAPTCHA_ERROR'),
                );
                $this->ajaxReturn($res);
            }
            //获取用户的账号信息
            $account = M('account');
            $username = I('post.username')?I('post.username'):'';
            if($username){
                $info = $account->field('id,username, password, mobile, login_time, register_time, photo, email')->where("username='{$username}'")->find();
                if(! $info){
                    $res = array(
                        'res' => false,
                        'msg' => L('ACCOUNT_USERNAME_ERROR'),
                    );
                    $this->ajaxReturn($res);
                }else{
                    //对比密码是否正确
                    if(md5(I('post.password')) != $info['password']){
                        //密码错误
                        $res = array(
                            'res' => false,
                            'msg' => L('ACCOUNT_PASSWORD_ERROR'),
                        );
                        $this->ajaxReturn($res);
                    }else{
                        //登陆成功
                        $token = random(8,1);
                        $info['client_token'] = $token;
                        $info['client_ip'] = I('server.REMOTE_ADDR');
                        session('shop_account',$info);
                        session('client_ip',I('server.REMOTE_ADDR'));
                        session('client_token',$token);
                        //是否记住用户名
                        if(I('post.remember')){
                            cookie('shop_username',$username,3600*24*30);
                            cookie('shop_remember',1);
                        }else{
                            cookie('shop_username',null);
                            cookie('shop_remember',null);
                        }
                        //修改登陆时间和客户端ip地址
                        $data = array(
                            'id' => $info['id'],
                            'login_time' => time(),
                            'client_ip' => I('server.REMOTE_ADDR'),
                        );
                        $account->save($data);
                        $res = array(
                            'res' => true,
                        );
                        $this->ajaxReturn($res);
                    }
                }
            }else{
                $res = array(
                    'res' => false,
                    'msg' => L('ACCOUNT_USERNAME_ERROR'),
                );
                $this->ajaxReturn($res);
            }

        }
    }
    public function phoneLogin(){
            //$this->check();
        //前台用户登陆界面
        if( ! IS_POST){
            $mobile = cookie('shop_mobile')?cookie('shop_mobile'):'';
            $remember = cookie('shop_remember')?cookie('shop_remember'):'';
            //echo $mobile;exit;
            if($mobile && $remember){
                $this->assign('mobile',$mobile);
                $this->assign('remember',$remember);
            }
            $this->display();
        }else{
            //首先判断短信验证码是否正确
            $sms = new \Common\Controller\SmsController();
            if(! $sms->checkSms(I('post.sms'))){
                $res = array(
                    'res' => false,
                    'msg' => L('PHONE_SMS_ERROR'),
                );
                $this->ajaxReturn($res);
            }
            //获取用户的账号信息
            $account = M('account');
            $mobile = I('post.mobile')?I('post.mobile'):'';
            if($mobile){
                $info = $account->field('id,username, password, mobile, login_time, register_time, photo, email')->where("mobile='{$mobile}'")->find();
                if(! $info){
                    $res = array(
                        'res' => false,
                        'msg' => L('PHONE_MOBILE_ERROR'),
                    );
                    $this->ajaxReturn($res);
                }else{
                        //登陆成功
                        $token = random(8,1);
                        $info['client_token'] = $token;
                        $info['client_ip'] = I('server.REMOTE_ADDR');
                        session('shop_account',$info);
                        session('client_ip',I('server.REMOTE_ADDR'));
                        session('client_token',$token);
                        //是否记住手机号
                        if(I('post.remember')){
                            cookie('shop_mobile',$mobile,3600*24*30);
                            cookie('shop_remember',1);
                        }else{
                            cookie('shop_mobile',null);
                            cookie('shop_remember',null);
                        }
                        //修改登陆时间和客户端ip地址
                        $data = array(
                            'id' => $info['id'],
                            'login_time' => time(),
                            'client_ip' => I('server.REMOTE_ADDR'),
                        );
                        $account->save($data);
                        $res = array(
                            'res' => true,
                        );
                        $this->ajaxReturn($res);
                    
                }
            }else{
                $res = array(
                    'res' => false,
                    'msg' => L('PHONE_MOBILE_ERROR'),
                );
                $this->ajaxReturn($res);
            }

        }

    }
    public function register(){
        if(! IS_POST){
            //前台用户注册界面
            $this->display();            
        }else{
            //首先判断短信验证码是否正确
            $sms = new \Common\Controller\SmsController();
            if(! $sms->checkSms(I('post.sms'))){
                $res = array(
                    'res' => false,
                    'msg' => L('REGISTER_SMS_VALIDATE')
                );
                $this->ajaxReturn($res);
            }
            $account = M('account');
            //注册验证(手机号，短信验证码，密码，邮箱，性别)
            $validate = array(
                array('mobile','require','{%REGISTER_MOBILE_REQUIRED}',1),
                array('mobile','check_mobile','{%REGISTER_CHECKMOBILE}',1,'function'),
                array('mobile','','{%REGISTER_MOBILE_UNIQUE}',1,'unique',1),
                array('password','require','{%REGISTER_PASSWORD_REQUIRED}',1),
                array('password','check_password','{%REGISTER_CHECKPASSWORD}',1,'function'),
                array('email','email','{%REGISTER_EMAIL_EMAIL}',2),
                array('sex','require','{%REGISTER_SEX}',1),
                array('sex','0,1','{%REGISTER_SEX_IN}',1,'in')
            );
            $username = create_username();
            //自动完成
            $auto = array(
                array('password','md5',1,'function'),//加密密码
                array('username',$username,1,'string'),//生成账号名
                array('login_time','time',1,'function'),//登陆时间
                array('register_time','time',1,'function'),//注册时间
                array('client_ip',I('server.REMOTE_ADDR',1)),//客户端ip地址
            );
            $data = $account->validate($validate)->create();
            if(! $data){
                //验证失败，返回错误信息
                $msg = $account->getError();
                $res = array(
                    'res' => false,
                    'msg' => $msg
                );
                $this->ajaxReturn($res);
            }else{
                $account->auto($auto)->create();
                //保存数据到数据库
                $account->add();
                //验证通过，返回用户注册信息
                $msg = array(
                    'username' => $username,
                    'password' => str_scar(I('post.password'),2),
                    'mobile' => str_scar(I('post.mobile'),3),
                    'sex' => I('post.sex')?'REGISTER_FEMALE':'REGISTER_MALE',
                    'email' => I('post.email')?I('post.email'):''
                );
                $res = array(
                    'res' => true,
                    'msg' => $msg
                );
                $this->ajaxReturn($res);
            }
        }
    }
    public function captcha(){
        //生成图片验证码
        $config = array(
            'useImgBg' => true,
            'fontSize' => 30,
            //'imageW' => 120,
            //'imageH' => 34,
            'fontttf' => '5.ttf',
            'useNoise' => false,
            'length' => 4
        );
        $verify = new \Think\Verify($config);
        $verify->entry('verify');        
    }
    public function sms(){
        //生成短信验证码
        if(IS_POST){
            $mobile = I('post.mobile');
            $sms = new SmsController();
            $res = $sms->sendSms($mobile);
            if($res){
                $this->ajaxReturn(true);                
            }else{
                $this->ajaxReturn(false);
            }
        }
    }
    
    //退出登陆
    public function logout(){
        session('shop_account', NULL);
        $this->success('退出登陆成功！跳转到网站首页中...', __APP__.'/Homepage/index');
    }
}