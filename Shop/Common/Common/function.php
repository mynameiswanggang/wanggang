<?php
/*
 * 公共用户自定义函数
 */

 /*
  * 用于http请求函数
  */
function Post($curlPost,$url){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_NOBODY, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
    $return_str = curl_exec($curl);
    curl_close($curl);
    return $return_str;
}
/*将xml格式的数据转化为数组格式
 *
 */
function xml_to_array($xml){
    $reg = "/<(\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/";
    if(preg_match_all($reg, $xml, $matches)){
        $count = count($matches[0]);
        for($i = 0; $i < $count; $i++){
            $subxml= $matches[2][$i];
            $key = $matches[1][$i];
            if(preg_match( $reg, $subxml )){
                $arr[$key] = xml_to_array( $subxml );
            }else{
                $arr[$key] = $subxml;
            }
        }
    }
    return $arr;
}
/*产生指定长度的随机数
 *
 */
function random($length = 6 , $numeric = 0) {
    PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
    if($numeric) {
        $hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
    } else {
        $hash = '';
        $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
        $max = strlen($chars) - 1;
        for($i = 0; $i < $length; $i++) {
            $hash .= $chars[mt_rand(0, $max)];
        }
    }
    return $hash;
}
/*生成随机的用户名(4位随机字母+当前时间戳)
 * 
 */
function create_username(){
    $chars ='ABCDEFGHJKLMNOPQRSTUVWXYZabcdefghjkmnopqrstuvwxyz#*_';
    $chars = substr(str_shuffle($chars),0,4);
    $time = time();
    $username = $chars.$time;
    return $username;
}    

/*
 * 检查手机号是否合法
 */
function check_mobile($mobile){
    $pattern = '/^((13[0-9])|(15[^4,\d])|(18[0,5-9]))\d{8}$/';
    if(! preg_match($pattern, $mobile)){
        return false;
    }else{ 
        return true;
    }
}    

/*
 * 检查密码是否合法
 */
 function check_password($password){
     $pattern = '/^[a-zA-Z_][\w]{3,49}$/';
     if(! preg_match($pattern, $password)){
         return false;
     }else{
         return true;
     }
 }   
 
 /*
  * 将一个字符串保留指定位数，其余用符号代替
  * $pos要保留的字符个数
  */
  function str_scar($str,$pos = 0,$scar = '*'){
      $len = mb_strlen($str,'UTF-8');
      if($pos > $len || $pos < 0){
          return $str;
      }
      $head = mb_substr($str, 0, $pos,'UTF-8');
      $foot = str_repeat($scar, $len-$pos);
      return $head.$foot;
  }
  
  /*短连接生成
   * $url原网址
   */
  function short_url($url){
      if(!filter_var($url,FILTER_VALIDATE_URL)){
          return false;
      }

    $apiUrl = 'http://apis.baidu.com/chazhao/shorturl/shorturl';
    $header = array(
        'Content-Type:application/json',
        'apikey: b57f49b9417dfeb8a44fa22b46060952',
        //'Accept: application/xml',
    );
    $data = array('type' => 2, 'url' => array($url));
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch , CURLOPT_URL , $apiUrl);
    $res = curl_exec($ch);
    
    $res = json_decode($res,true);
    return $res['data']['urls'][0]['short_url'];
  }
  
  /*短网址生成
   *$url待转换的url
   */
  function short_site($url){
      if(!filter_var($url,FILTER_VALIDATE_URL)){
          return false;
      }
  
      $apiUrl = "http://apis.baidu.com/3023/shorturl/shorten?url_long={$url}";
        
      $header = array(
            "apikey: b57f49b9417dfeb8a44fa22b46060952",
        );
  
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch , CURLOPT_URL , $apiUrl);
        $res = curl_exec($ch);
  
        $res = json_decode($res,true);
        //var_dump(json_decode($res));exit;
        return $res['urls'][0]['result']?$res['urls'][0]['url_short']:false;
    }
  
  
  
  
  
  
  
  
  
  
  
  
  