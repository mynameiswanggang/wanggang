<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<title><?php echo ($title); ?></title>
<link href="<?php echo (ADMIN_CSS_URL); ?>main.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>jquery.min.js"></script>

<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/spinner/ui.spinner.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/spinner/jquery.mousewheel.js"></script>

<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>jquery-ui.min.js"></script>

<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/charts/jquery.sparkline.min.js"></script>

<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/forms/uniform.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/forms/jquery.cleditor.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/forms/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/forms/jquery.validationEngine.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/forms/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/forms/autogrowtextarea.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/forms/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/forms/jquery.dualListBox.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/forms/jquery.inputlimiter.min.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/forms/chosen.jquery.min.js"></script>

<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/wizard/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/wizard/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/wizard/jquery.form.wizard.js"></script>

<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/uploader/plupload.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/uploader/plupload.html5.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/uploader/plupload.html4.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/uploader/jquery.plupload.queue.js"></script>

<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/tables/datatable.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/tables/tablesort.min.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/tables/resizable.min.js"></script>

<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/ui/jquery.tipsy.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/ui/jquery.collapsible.min.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/ui/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/ui/jquery.progress.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/ui/jquery.timeentry.min.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/ui/jquery.colorpicker.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/ui/jquery.jgrowl.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/ui/jquery.breadcrumbs.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/ui/jquery.sourcerer.js"></script>

<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/calendar.min.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/elfinder.min.js"></script>

<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>custom.js"></script>

<!-- <script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/charts/excanvas.min.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/charts/jquery.flot.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/charts/jquery.flot.orderBars.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/charts/jquery.flot.pie.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>plugins/charts/jquery.flot.resize.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>charts/chart.js"></script> -->

<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>message_cn.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>vue.js"></script>

<style>
em.error{
	color:red;
}
</style>

<!-- Shared on MafiaShare.net  --><!-- Shared on MafiaShare.net  --></head>

<body>

<!-- Left side content -->
<div id="leftSide">
    <div class="logo"><a href="index.html"><img src="<?php echo (ADMIN_IMG_URL); ?>logo.png" alt="" /></a></div>
    
    <div class="sidebarSep mt0"></div>
    
    <!-- Search widget -->
    <form action="" class="sidebarSearch">
        <input type="text" name="search" placeholder="搜索..." id="ac" />
        <input type="submit" value="" />
    </form>
    
    <div class="sidebarSep"></div>

    <!-- General balance widget -->
    <div class="logo" style="height:auto;">
		<div class="widget" style="background: none;margin-top:0px; border:none;">
                    <div class="newOrder">
                        <div class="userRow">
                            <a href="#" title=""><img src="<?php echo (ADMIN_IMG_URL); ?>user.png" alt="头像" class="floatL"></a>
                            <ul class="leftList">
                                <li><a href="#" title=""><strong><?php echo ($user["username"]); ?></strong></a></li>
                                <li>角色:<?php echo ($user["role"]); ?></li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                    
                        <div class="cLine"></div>
                        
                        <div class="orderRow">
                            <ul class="leftList">
                                <li>账号创建时间:</li>
                                <li>上次登陆时间:</li>
                                <li>上次登陆的IP：</li>
                                <li>邮箱：</li>
                                <li>登陆次数：</li>
                            </ul>
                            <ul class="rightList">
                                <li><strong><?php echo (date("Y/m/d",$user["create_time"])); ?></strong> |  <?php echo (date("H:i",$user["create_time"])); ?></li>
                                <li><strong><?php echo (date("Y/m/d",$user["login_time"])); ?></strong> |  <?php echo (date("H:i",$user["login_time"])); ?></li>
                                <li><strong class="orange"><?php echo ($user["login_ip"]); ?></strong></li>
                                <li><strong class="orange"><?php echo ($user["email"]); ?></strong></li>
                                <li><strong class="green"><?php echo ($user["login_count"]); ?></strong></li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
    </div>
    
    <div class="sidebarSep"></div>
    
    <!-- 后台菜单 -->
	<?php echo W('My/menu');?>
</div>


<!-- Right side -->
<div id="rightSide">

    <!-- Top fixed navigation -->
    <div class="topNav">
        <div class="wrapper">
            <div class="welcome"><a href="#" title=""><img src="<?php echo (ADMIN_IMG_URL); ?>userPic.png" alt="" /></a><span>Howdy, Eugene!</span></div>
            <div class="userNav">
                <ul>
                    <li><a href="#" title=""><img src="<?php echo (ADMIN_IMG_URL); ?>icons/topnav/profile.png" alt="" /><span>Profile</span></a></li>
                    <li><a href="#" title=""><img src="<?php echo (ADMIN_IMG_URL); ?>icons/topnav/tasks.png" alt="" /><span>Tasks</span></a></li>
                    <li class="dd"><a title=""><img src="<?php echo (ADMIN_IMG_URL); ?>icons/topnav/messages.png" alt="" /><span>Messages</span><span class="numberTop">8</span></a>
                        <ul class="userDropdown">
                            <li><a href="#" title="" class="sAdd">new message</a></li>
                            <li><a href="#" title="" class="sInbox">inbox</a></li>
                            <li><a href="#" title="" class="sOutbox">outbox</a></li>
                            <li><a href="#" title="" class="sTrash">trash</a></li>
                        </ul>
                    </li>
                    <li><a href="#" title=""><img src="<?php echo (ADMIN_IMG_URL); ?>icons/topnav/settings.png" alt="" /><span>Settings</span></a></li>
                    <li><a href="login.html" title=""><img src="<?php echo (ADMIN_IMG_URL); ?>icons/topnav/logout.png" alt="" /><span>Logout</span></a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    
    <!-- Responsive header -->
    <div class="resp">
        <div class="respHead">
            <a href="index.html" title=""><img src="<?php echo (ADMIN_IMG_URL); ?>loginLogo.png" alt="" /></a>
        </div>
        
        <div class="cLine"></div>
        <div class="smalldd">
            <span class="goTo"><img src="<?php echo (ADMIN_IMG_URL); ?>icons/light/home.png" alt="" />Dashboard</span>
            <ul class="smallDropdown">
                <li><a href="index.html" title=""><img src="<?php echo (ADMIN_IMG_URL); ?>icons/light/home.png" alt="" />Dashboard</a></li>
                <li><a href="charts.html" title=""><img src="<?php echo (ADMIN_IMG_URL); ?>icons/light/stats.png" alt="" />Statistics and charts</a></li>
                <li><a href="#" title="" class="exp"><img src="<?php echo (ADMIN_IMG_URL); ?>icons/light/pencil.png" alt="" />Forms stuff<strong>4</strong></a>
                    <ul>
                        <li><a href="forms.html" title="">Form elements</a></li>
                        <li><a href="form_validation.html" title="">Validation</a></li>
                        <li><a href="form_editor.html" title="">WYSIWYG and file uploader</a></li>
                        <li class="last"><a href="form_wizards.html" title="">Wizards</a></li>
                    </ul>
                </li>
                <li><a href="ui_elements.html" title=""><img src="<?php echo (ADMIN_IMG_URL); ?>icons/light/users.png" alt="" />Interface elements</a></li>
                <li><a href="tables.html" title="" class="exp"><img src="<?php echo (ADMIN_IMG_URL); ?>icons/light/frames.png" alt="" />Tables<strong>3</strong></a>
                    <ul>
                        <li><a href="table_static.html" title="">Static tables</a></li>
                        <li><a href="table_dynamic.html" title="">Dynamic table</a></li>
                        <li class="last"><a href="table_sortable_resizable.html" title="">Sortable &amp; resizable tables</a></li>
                    </ul>
                </li>
                <li><a href="#" title="" class="exp"><img src="<?php echo (ADMIN_IMG_URL); ?>icons/light/fullscreen.png" alt="" />Widgets and grid<strong>2</strong></a>
                    <ul>
                        <li><a href="widgets.html" title="">Widgets</a></li>
                        <li class="last"><a href="grid.html" title="">Grid</a></li>
                    </ul>
                </li>
                <li><a href="#" title="" class="exp"><img src="<?php echo (ADMIN_IMG_URL); ?>icons/light/alert.png" alt="" />Error pages<strong>6</strong></a>
                    <ul class="sub">
                        <li><a href="403.html" title="">403 page</a></li>
                        <li><a href="404.html" title="">404 page</a></li>
                        <li><a href="405.html" title="">405 page</a></li>
                        <li><a href="500.html" title="">500 page</a></li>
                        <li><a href="503.html" title="">503 page</a></li>
                        <li class="last"><a href="offline.html" title="">Website is offline</a></li>
                    </ul>
                </li>
                <li><a href="file_manager.html" title=""><img src="<?php echo (ADMIN_IMG_URL); ?>icons/light/files.png" alt="" />File manager</a></li>
                <li><a href="#" title="" class="exp"><img src="<?php echo (ADMIN_IMG_URL); ?>icons/light/create.png" alt="" />Other pages<strong>3</strong></a>
                    <ul>
                        <li><a href="typography.html" title="">Typography</a></li>
                        <li><a href="calendar.html" title="">Calendar</a></li>
                        <li class="last"><a href="gallery.html" title="">Gallery</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="cLine"></div>
    </div>
    
<script>
	$(function(){
		//验证用户名
		$.validator.addMethod('checkUsername',function(value,element){
			var pattern = /^[\w#*]{4,}$/;
			return this.optional(element) || (pattern.test(value));
		},"用户名不合法");
		//验证密码是否合法(密码由字母数字下划线组成，字母下划线开头，4-50位)
		$.validator.addMethod('checkPassword',function(value,element){
			var pattern = /^[a-zA-Z_][\w]{3,49}$/;
			return this.optional(element) || (pattern.test(value));
		},"密码不合法");
		
		$('#newUser').validate({
			debug:false,
			rules:{
				username:{
					required:true,
					checkUsername:true
				},
				password:{
					required:true,
					checkPassword:true
				},
				role:{
					required:true
				}
			},
			messages:{
				username:{
					required:'请输入用户名'
				},
				password:{
					required:'请输入密码'
				},
				role:{
					required:"请选择角色"
				}
			},
	 		errorPlacement:function(error,element){
		 		   error.appendTo(element.parent());	
		 		},
		 		errorClass:'error',
		 		errorElement:'em',
		 		submitHandler:function(form){
		 			var url = "<?php echo U('Admin/user/add_new_user');?>";
		 			$.post(url,$(form).serialize(),function(data){
		 				//console.log(data); return;
		 				if(data.res){
		 					//创建新用户成功，跳转到前台首页
		 					alert('创建新用户成功');
		 					location.href = "<?php echo U('Admin/user/user_list');?>";
		 				}else{
		 					//创建新用户失败，错误信息显示
		 					alert(data.msg);
		 				}
		 			},'json');
		 		}
		});		
	});


</script>
    <!-- Title area -->
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5><?php echo ($pageTitle); ?></h5>
                <span><?php echo ($pageDesc); ?></span>
            </div>
            <div class="middleNav">
                <ul>
                    <li class="mUser"><a href="#" title=""><span class="users"></span></a>
                        <ul class="mSub1">
                            <li><a href="#" title="">Add user</a></li>
                            <li><a href="#" title="">Statistics</a></li>
                            <li><a href="#" title="">Orders</a></li>
                        </ul>
                    </li>
                    <li class="mMessages"><a href="#" title=""><span class="messages"></span></a>
                        <ul class="mSub2">
                            <li><a href="#" title="">New tickets<span class="numberRight">8</span></a></li>
                            <li><a href="#" title="">Pending tickets<span class="numberRight">12</span></a></li>
                            <li><a href="#" title="">Closed tickets</a></li>
                        </ul>
                    </li>
                    <li class="mFiles"><a href="#" title="Or you can use a tooltip" class="tipN"><span class="files"></span></a></li>
                    <li class="mOrders"><a href="#" title=""><span class="orders"></span><span class="numberMiddle">8</span></a>
                        <ul class="mSub4">
                            <li><a href="#" title="">Pending uploads</a></li>
                            <li><a href="#" title="">Statistics</a></li>
                            <li><a href="#" title="">Trash</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    
    <div class="line"></div>
    
    <!-- Page statistics area -->
    <div class="statsRow">
        <div class="wrapper">
        	<div class="controlB">
            	<ul>
                	<li><a href="#" title=""><img src="<?php echo (ADMIN_IMG_URL); ?>icons/control/32/plus.png" alt="" /><span>Add new session</span></a></li>
                    <li><a href="#" title=""><img src="<?php echo (ADMIN_IMG_URL); ?>icons/control/32/database.png" alt="" /><span>New DB entry</span></a></li>
                    <li><a href="#" title=""><img src="<?php echo (ADMIN_IMG_URL); ?>icons/control/32/hire-me.png" alt="" /><span>Add new user</span></a></li>
                    <li><a href="#" title=""><img src="<?php echo (ADMIN_IMG_URL); ?>icons/control/32/statistics.png" alt="" /><span>Check statistics</span></a></li>
                    <li><a href="#" title=""><img src="<?php echo (ADMIN_IMG_URL); ?>icons/control/32/comment.png" alt="" /><span>Review comments</span></a></li>
                    <li><a href="#" title=""><img src="<?php echo (ADMIN_IMG_URL); ?>icons/control/32/order-149.png" alt="" /><span>Check orders</span></a></li>
                </ul>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    
    <div class="line"></div>
    
    <!-- Main content wrapper -->
    <div class="wrapper">
        
        <!-- Form -->
        <form id="newUser"  class="form" method="post">
                <div class="widget">
                    <div class="title"><img src="<?php echo (ADMIN_IMG_URL); ?>icons/dark/list.png" alt="" class="titleIcon" /><h6>新用户信息</h6></div>
                    <div class="formRow">
                        <label>用户名：</label>
                        <div class="formRight"><input id="username" name="username" type="text" value="" /></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label for="labelFor">密码：</label>
                        <div class="formRight"><input id="password" type="password" name="password" id="labelFor" value="" /></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label for="labelFor">分配角色：</label>
                        <div class="formRight">                            
                        <select name="role" >
                                <option value="">角色名</option>
                                <?php if(is_array($roleList)): foreach($roleList as $key=>$role): ?><option value="<?php echo ($key); ?>"><?php echo ($role); ?></option><?php endforeach; endif; ?>
                         </select>
                         </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <div class="formRight">
                        <a onclick="$('#newUser').submit();" href="javascript:void(0);" title="" class="wButton bluewB ml15 m10"><span>创建</span></a>
                        </div>
                        <div class="clear"></div>
                    </div>                                         
                </div>                             
         </form>
</div>


<div class="clear"></div>

</body>
</html>