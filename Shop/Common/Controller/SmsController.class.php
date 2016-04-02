<?php
namespace Common\Controller;


class SmsController{

    //验证码平台请求的用户名
    private $_account = 'cf_wg2015';
    
    //验证码平台请求的密码
    private $_password = 'wg3951142';
    
    //验证码平台的url
    private $_url = 'http://106.ihuyi.cn/webservice/sms.php?method=Submit';    
    
    /*生成验证码
     *参数：$mobile接受验证码的手机号,$content发送的验证码,$length验证码的位数
     */
    public function sendSms($mobile = '13166345997', $length = 4){
    
        $content = random($length,1);
        //$content = short_url('http://blog.csdn.net/xcy13638760/article/details/10116011');

        $arr['mobile'] = $mobile;
    
        $arr['content'] = '您的验证码是：【'.$content.'】。请不要把验证码泄露给其他人。';
    
        $arr['account'] = $this->_account;
    
        $arr['password'] = $this->_password;
    
        $res = xml_to_array(Post($arr,$this->_url));
    
        switch($res['SubmitResult']['code']){
             
            case 2://提交成功
                session('sms',$content); return true;
            case 0://提交失败
            case 400://非法ip访问
            case 4030://手机号码已被列为黑名单
            case 4050://账号被冻结
            case 4051://剩余条数不足
            default:return false;
        }
    
    }
    /*检查用户输入的验证码是否正确
     *
     */
    public function checkSms($value = ''){
        if(! $value || ! is_numeric($value))
            return false;
        if(strtolower($value) == strtolower(session('sms'))){
            return true;
        }
        return false;
    }    
}