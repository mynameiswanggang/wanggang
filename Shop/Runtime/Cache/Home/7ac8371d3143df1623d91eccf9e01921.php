<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<head>
	<title><?php echo (L("LOGIN_TITLE")); ?></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="<?php echo (CSS_URL); ?>font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo (CSS_URL); ?>bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo (CSS_URL); ?>bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo (CSS_URL); ?>bootstrap-social.css" rel="stylesheet" type="text/css">	
	<link href="<?php echo (CSS_URL); ?>templatemo_style.css" rel="stylesheet" type="text/css">	
</head>
<body class="templatemo-bg-image-1">
	<div class="container">
		<div class="col-md-12">			
			<form class="form-horizontal templatemo-login-form-2" role="form" action="#" method="post">
				<div class="row">
					<div class="col-md-12">
						<h1><?php echo (L("LOGIN_CHOOSE")); ?></h1>
					</div>
				</div>
				<div class="row">
				
					<div class="templatemo-other-signin col-md-6" style="margin-left:200px;">
						<label class="margin-bottom-15">
						<!-- 	One-click sign in using other services. Credit goes to <a rel="nofollow" href="http://lipis.github.io/bootstrap-social/">Bootstrap Social</a> for social sign in buttons.
						 -->
						 <?php echo (L("LOGIN_ACCOUNT_OR_PHONE")); ?>
						 </label>
						<a href="<?php echo U('user/login');?>" class="btn btn-block btn-social btn-facebook margin-bottom-15">
						    <i class="fa fa-facebook"></i> <?php echo (L("LOGIN_ACCOUNT")); ?>
						</a>
						<a href="<?php echo U('user/phoneLogin');?>" class="btn btn-block btn-social btn-twitter margin-bottom-15">
						    <i class="fa fa-twitter"></i> <?php echo (L("LOGIN_PHONE")); ?>
						</a>
<!-- 						<a class="btn btn-block btn-social btn-google-plus">
						    <i class="fa fa-google-plus"></i> Sign in with Google
						</a> -->
					</div>   
				        <div class="form-group">
				          	<div class="col-md-12">
				        		<a href="<?php echo U('user/register');?>" class="text-center" style="color:blue;"><?php echo (L("ACCOUNT_REGISTER")); ?></a>
				       	 	</div>
				    	</div>					
				</div>				 	
		      </form>		      		      
		</div>
	</div>
</body>
</html>