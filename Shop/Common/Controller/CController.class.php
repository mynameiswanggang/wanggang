<?php
/*
 * 用户登陆控制基类
 */
namespace Common\Controller;

use Think\Controller;

class CController extends Controller{
    //公共头部的相关变量参数
    //网站的标题
    protected $siteTitle = NULL;
    protected $siteWelcome = NULL;
    protected $signInOut = NULL;
    protected $mycart = NULL;
    protected $signInOutUrl = NULL;
    protected $userInfo = NULL;
    protected $cartCount = 0;
    protected $topMenu = NULL; 
    protected $lang = NULL;
    protected $footerNAV = NULL;
    protected $contactUs = NULL;
    
    public function __construct(){
        parent::__construct();
        $this->userInfo = session('shop_account');
        
        //查询当前用户的购物车数量
        
        
        $this->siteWelcome = $this->userInfo?L('SITEWELCOME_ACCOUNT').$this->userInfo['username']:L('SITEWELCOME_GUEST'); 
        $this->signInOut = $this->userInfo?L('SIGN_OUT'):L('SIGN_IN');
        $this->signInOutUrl = $this->userInfo?U('user/logOut'):U('user/logIn');
        $this->mycart = L('CART').'('.$this->cartCount.')';
        $this->topMenu = C('HOME_TOPMENU');
        $this->lang = $this->lang();
        $this->footerNAV = C('FOOTER_QUICK_NAV');
        $this->contactUs = C('FOOTER_CONTACTS');
        
        $this->assign('siteWelcome',$this->siteWelcome);
        $this->assign('signInOut',$this->signInOut);
        $this->assign('signInOutUrl',$this->signInOutUrl);
        $this->assign('mycart',$this->mycart);
        $this->assign('topMenu',$this->topMenu);
        $this->assign('lang',$this->lang);
        $this->assign('footerNAV',$this->footerNAV);
        $this->assign('contactUs',$this->contactUs);
        
        //根据当前语言加载对应相应的模板
        $this->_theme();
    }
    
    //检查用户是否登陆
    protected function check(){
        //dump(session());exit;
         //首先判断用户是否登陆
        //$this->$_userInfo = session('shop_account');
        if(! $this->userInfo){
            //没有登陆跳转到登陆页面
            $this->redirect('user/index');
        }else{
            //登陆后判断用户信息是否准确
            if($this->userInfo['client_ip'] != session('client_ip') || $this->userInfo['client_token'] != session('client_token')){
                //重新登陆
                $this->redirect('user/index');           ;
            }
        }      
    }
    
    //返回当前的语言
    public function lang(){
       return strcasecmp(cookie('think_language'), 'en-us')?L('LANG_CH'):L('LANG_EN');
    }
    
    //切换语言
    public function switchLang(){
        strcasecmp(cookie('think_language'), 'en-us')?cookie('think_language','en-us'):cookie('think_language','zh-cn');
        $this->ajaxReturn(true);
    }
    
    //启用对应的语言主题
    private function _theme(){
        strcasecmp(cookie('think_language'), 'en-us')? C('DEFAULT_THEME', 'CH'):C('DEFAULT_THEME', 'EN');
    }
}