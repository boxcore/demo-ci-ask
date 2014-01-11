<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>中国创业指导网-用户注册</title>
<link rel="stylesheet" type="text/css" href="<?php echo src_url('css/style.css');?>"/>
</head>
<body>
<div class="login_box">
	<div id="capacity">
		<form name="register" action="<?php echo site_url('user/add_user');?>" method="POST" id="register">
			<div class="notice-icons message hide" id="message"> </div>
			<div class="cap_frame">
				<label>用户名:</label>
				<p class="cf_person"><em></em><input name="user" value="" type="text"></p>
			</div>
			<div class="cap_frame">
				<label>密码:</label>
				<p class="cf_lock"><em></em><input name="password" value="" type="password"></p>
			</div>
			<div class="cap_frame">
				<label>确认密码:</label>
				<p class="cf_lock"><em></em><input name="repassword" value="" type="password"></p>
			</div>
			<div class="cap_enter">
				<label></label>
				<p class="automatic"><a href="javascript:void(0);">《创业指导网用户注册协议》</a></p>
			</div>
			<span class="enter"><button type="submit">登 录</button></span>
		</form>
	</div>
	<div class="mrbc_right">
		<p class="have_account">已有<span>中国创业指导网</span>账号<a href="<?php echo site_url('user/login');?>">直接登录</a></p>
	</div>
</div>
</body>
</html>