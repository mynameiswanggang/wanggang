/**
 * 一些公共的js函数
 */

//生成手机验证码
function get_mobile_code(url){
		//RemainTime();return;
        $.post(url, {mobile:$.trim($('input[name=mobile]').val())}, function(msg) {
           // alert(jQuery.trim(unescape(msg)));
			if(msg==true){
				RemainTime();
			}
        });
	};
	var iTime = 59;
	var Account;
function RemainTime(){
		$('#create_sms').attr('disabled',true);
		var iSecond,sSecond="",sTime="";
		if (iTime >= 0){
			iSecond = parseInt(iTime%60);
			iMinute = parseInt(iTime/60)
			if (iSecond >= 0){
				if(iMinute>0){
					sSecond = iMinute + "分" + iSecond + "秒";
				}else{
					sSecond = iSecond + "秒";
				}
			}
			sTime=sSecond;
			if(iTime==0){
				clearTimeout(Account);
				sTime='获取手机验证码';
				iTime = 59;
				$('#create_sms').attr('disabled',false);
			}else{
				Account = setTimeout("RemainTime()",1000);
				iTime=iTime-1;
			}
		}else{
			sTime='没有倒计时';
		}
		$('#create_sms').val(sTime);
	}
