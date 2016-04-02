<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<head>
	<title><?php echo (L("PHONE_TITLE")); ?></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="<?php echo (CSS_URL); ?>font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo (CSS_URL); ?>bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo (CSS_URL); ?>bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo (CSS_URL); ?>bootstrap-social.css" rel="stylesheet" type="text/css">	
	<link href="<?php echo (CSS_URL); ?>templatemo_style.css" rel="stylesheet" type="text/css">	
	<script type="text/javascript" src="<?php echo (JS_URL); ?>jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="<?php echo (JS_URL); ?>function.js"></script>
	<script type="text/javascript" src="<?php echo (JS_URL); ?>jquery.validate.js"></script>
	<script type="text/javascript" src="<?php echo (JS_URL); ?>message_cn.js"></script>
	<style>
		em.error{
			color:red;	
		}
	</style>	
</head>
<script>
	$(function(){
		$('#create_sms').attr('disabled',true);
		//验证手机号是否合法
		$.validator.addMethod('checkMobile',function(value,element){
			var pattern = /^((13[0-9])|(15[^4,\d])|(18[0,5-9]))\d{8}$/;
			return this.optional(element) || (pattern.test(value));
		},"<?php echo L('PHONE_CHECKMOBILE');?>");
		
		$('form').validate({
			debug:false,
			rules:{
				mobile:{
					required:true,
					checkMobile:true
				},
				sms:{
					required:true,
					digits:true,
					rangelength:[4,4]
				}
			},
			messages:{
				mobile:{
					required:"<?php echo L('PHONE_MOBILE_REQUIRED');?>"
				},
				sms:{
					required:"<?php echo L('PHONE_SMS_REQUIRED');?>",
					digits:"<?php echo L('PHONE_SMS_DIGITS');?>",
					rangelength:"<?php echo L('PHONE_SMS_RANGELENGTH');?>"
				}
			},
	 		errorPlacement:function(error,element){
	 		   error.appendTo(element.parent());	
	 		},
	 		errorClass:'error',
	 		errorElement:'em',
			success:function(element,test){
				if(test.name == 'mobile'){
					$('#create_sms').attr('disabled',false);
				}
			},	 		
	 		submitHandler:function(form){
	 			var url = "<?php echo U('user/phoneLogin');?>";
	 			$.post(url,$(form).serialize(),function(data){
	 				//console.log(data); return;
	 				if(data.res){
	 					//登陆成功，跳转到前台首页
	 					location.href = "<?php echo U('Homepage/index');?>";
	 				}else{
	 					//登陆失败，错误信息显示
	 					alert(data.msg);
	 				}
	 			},'json');
	 		}
		});
	});
</script>	
</head>
<body class="templatemo-bg-image-1">
	<div class="container">
		<div class="col-md-12">			
			<form class="form-horizontal templatemo-login-form-2" role="form" action="<?php echo U('user/phoneLogin');?>" method="post">
				<div class="row">
					<div class="col-md-12">
						<h1><?php echo (L("PHONE_LOGIN")); ?></h1>
					</div>
				</div>
				<div class="row">
					<div class="templatemo-one-signin col-md-6">
				        <div class="form-group">
				          <div class="col-md-12">		          	
				            <label for="username" class="control-label"><?php echo (L("PHONE")); ?></label>
				            <div class="templatemo-input-icon-container">
				            	<i class="fa fa-user"></i>
				            	<input type="text" class="form-control" name="mobile" placeholder="" value="<?php echo ($mobile?$mobile:''); ?>">
				            </div>		            		            		            
				          </div>              
				        </div>
				        <div class="form-group">
				          <div class="col-md-12">
				            <label for="password" class="control-label"><?php echo (L("PHONE_SMS")); ?></label>
				            <div class="templatemo-input-icon-container">
				            	<i class="fa fa-lock"></i>
				            	<input type="text" name="sms" class="form-control" placeholder="" style="width:150px;float:left;">
				            	<input type="button" onclick="get_mobile_code('<?php echo U('user/sms');?>');" class="form-control" id="create_sms" value="<?php echo L('PHONE_SMS_CHANGE');?>" style="width:120px;padding-left:10px;height:34px;color:blue;float:right;">
				            </div>
				          </div>
				        </div>
				        <div class="form-group">
				          <div class="col-md-12">
				            <div class="checkbox">
				                <label>
				                  <input type="checkbox" name="remember" value='1' <?php echo ($remember?'checked':''); ?>> <?php echo (L("PHONE_REMEMBER_ME")); ?>
				                </label>
				            </div>
				          </div>
				        </div>
				        <div class="form-group">
				          <div class="col-md-12">
				            <input type="submit" value="<?php echo L('PHONE_LOGIN_IN');?>" class="btn btn-warning">
				          </div>
				        </div>
				        <div class="form-group">
				          	<div class="col-md-12">
				        		<a href="<?php echo U('user/register');?>" class="text-center"><?php echo (L("PHONE_REGISTER")); ?></a>
				       	 	</div>
				    	</div>
					</div>
					<div class="templatemo-other-signin col-md-6">
						<label class="margin-bottom-15">
<!-- 							One-click sign in using other services. Credit goes to <a rel="nofollow" href="http://lipis.github.io/bootstrap-social/">Bootstrap Social</a> for social sign in buttons.
 -->					
 						<?php echo (L("PHONE_ACCOUNT_CHOOSE")); ?>	
 						</label>
						<a href="<?php echo U('user/login');?>" class="btn btn-block btn-social btn-facebook margin-bottom-15">
						    <i class="fa fa-facebook"></i> <?php echo (L("PHONE_ACCOUNT")); ?>
						</a>   
				</div>				 	
		      </form>		      		      
		</div>
	</div>
</body>
</html>