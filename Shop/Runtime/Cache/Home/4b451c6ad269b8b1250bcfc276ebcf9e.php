<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<head>
	<title><?php echo (L("ACCOUNT_TITLE")); ?></title>
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
		//验证手机号是否合法
		$.validator.addMethod('checkUsername',function(value,element){
			var pattern = /^[a-zA-Z#*_]{4}\d{4,}$/;
			return this.optional(element) || (pattern.test(value));
		},"<?php echo L('ACCOUNT_CHECKUSERNAME');?>");
		//验证密码是否合法(密码由字母数字下划线组成，字母下划线开头，4-50位)
		$.validator.addMethod('checkPassword',function(value,element){
			var pattern = /^[a-zA-Z_][\w]{3,49}$/;
			return this.optional(element) || (pattern.test(value));
		},"<?php echo L('ACCOUNT_CHECKPASSWORD');?>");
		
		$('form').validate({
			debug:false,
			rules:{
				username:{
					required:true,
					checkUsername:true
				},
				password:{
					required:true,
					checkPassword:true,
				},
				captcha:{
					required:true,
					rangelength:[4,4]
				}
			},
			messages:{
				username:{
					required:"<?php echo L('ACCOUNT_USERNAME_REQUIRED');?>"
				},
				password:{
					required:"<?php echo L('ACCOUNT_PASSWORD_REQUIRED');?>"
				},
				captcha:{
					required:"<?php echo L('ACCOUNT_CAPTCHA_REQUIRED');?>",
					rangelength:"<?php echo L('ACCOUNT_CAPTCHA_RANGELENGTH');?>"
				}
			},
	 		errorPlacement:function(error,element){
	 		   error.appendTo(element.parent());	
	 		},
	 		errorClass:'error',
	 		errorElement:'em',
	 		submitHandler:function(form){
	 			var url = "<?php echo U('user/login');?>";
	 			$.post(url,$(form).serialize(),function(data){
	 				//console.log(data); return;
	 				if(data.res){
	 					//登陆成功，跳转到前台首页
	 					location.href = "<?php echo U('Homepage/index');?>";
	 				}else{
	 					//登陆失败，错误信息显示
	 					$('#captcha').attr('src','<?php echo U("user/captcha");?>');
	 					alert(data.msg);
	 				}
	 			},'json');
	 		}
		});
	});
</script>
<body class="templatemo-bg-image-1">
	<div class="container">
		<div class="col-md-12">			
			<form class="form-horizontal templatemo-login-form-2" role="form" action="<?php echo U('user/login');?>" method="post">
				<div class="row">
					<div class="col-md-12">
						<h1><?php echo (L("ACCOUNT_LOGIN")); ?></h1>
					</div>
				</div>
				<div class="row">
					<div class="templatemo-one-signin col-md-6">
				        <div class="form-group">
				          <div class="col-md-12">		          	
				            <label for="username" class="control-label"><?php echo (L("ACCOUNT_USERNAME")); ?></label>
				            <div class="templatemo-input-icon-container">
				            	<i class="fa fa-user"></i>
				            	<input type="text" class="form-control" name="username" placeholder="" value="<?php echo ($username?$username:''); ?>">
				            </div>		            		            		            
				          </div>              
				        </div>
				        <div class="form-group">
				          <div class="col-md-12">
				            <label for="password" class="control-label"><?php echo (L("ACCOUNT_PASSWORD")); ?></label>
				            <div class="templatemo-input-icon-container">
				            	<i class="fa fa-lock"></i>
				            	<input type="password" class="form-control" name="password" placeholder="">
				            </div>
				          </div>
				        </div>
				        <div class="form-group">
				          <div class="col-md-12">
				            <label for="password" class="control-label"><?php echo (L("ACCOUNT_CAPTCHA")); ?></label>
				            <div class="templatemo-input-icon-container">
				            	<i class="fa fa-lock"></i>
				            	<input type="text" class="form-control" name="captcha" placeholder="" style="width:150px;float:left;">								
				            	<img onclick="$(this).attr('src','<?php echo U("user/captcha");?>');" id="captcha" src="<?php echo U('user/captcha');?>" class="form-control" alt="图片验证码" style="width:120px;height:34px;color:blue;float:right;padding:0px;">
				            </div>
				            <a href="javascript:$('#captcha').attr('src','<?php echo U("user/captcha");?>');" style="color:blue;"><?php echo (L("ACCOUNT_CAPTCHA_CHANGE")); ?></a>
				          </div>	
				        </div>			        
				        <div class="form-group">
				          <div class="col-md-12">
				            <div class="checkbox">
				                <label>
				                  <input name="remember" value="1" type="checkbox" <?php echo ($remember?'checked':''); ?>> <?php echo (L("ACCOUNT_REMEMBER_ME")); ?>
				                </label>
				            </div>
				          </div>
				        </div>
				        <div class="form-group">
				          <div class="col-md-12">
				            <input type="submit" value="<?php echo L('ACCOUNT_LOGIN_IN');?>" class="btn btn-warning">
				          </div>
				        </div>
				        <div class="form-group">
				          	<div class="col-md-12">
				        		<a href="<?php echo U('user/register');?>" class="text-center"><?php echo (L("ACCOUNT_REGISTER")); ?></a>
				       	 	</div>
				    	</div>
					</div>
					<div class="templatemo-other-signin col-md-6">
						<label class="margin-bottom-15">
<!-- 							One-click sign in using other services. Credit goes to <a rel="nofollow" href="http://lipis.github.io/bootstrap-social/">Bootstrap Social</a> for social sign in buttons.
 -->					
 						<?php echo (L("ACCOUNT_CHOOSE_PHONE")); ?>
 						</label>
						<a href="<?php echo U('user/phoneLogin');?>" class="btn btn-block btn-social btn-facebook margin-bottom-15">
						    <i class="fa fa-twitter"></i> <?php echo (L("ACCOUNT_PHONE")); ?>
						</a>
				        </div>						

					</div>   
				</div>				 	
		      </form>		      		      
		</div>
	</div>
</body>
</html>