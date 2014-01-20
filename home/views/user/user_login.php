<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>中国创业指导网-用户登录</title>
<link rel="stylesheet" type="text/css" href="<?php echo src_url('css/style.css');?>"/>
<script src="<?php echo src_url('js/jquery-1.7.1.min.js');?>"></script>
</head>
<body class="have_bg">
<div class="me_box">
	<div class="meb_left"><img src="<?php echo src_url('images/enter_banner.jpg');?>" height="338" width="494"> </div>
	<div class="enter_capacity">
		<div id="capacity">
			<h1>登录</h1>
			<div class="notice-icons message hide" id="message"> </div>
			<div class="cap_frame">
				<label>用户名:</label>
				<p class="cf_person"><em></em>
				<input name="username" id="username" placeholder="请输入账号" value="" type="text">
				</p>
				<span class="reminder" id="userinfo" style="display:none">请输入邮箱、用户名、手机号</span>
			</div>
			<div class="cap_frame">
				<label>密码:</label>
				<p class="cf_lock"><em></em>
				<input name="password" id="password" placeholder="请输入密码" value="" type="password">
				</p>
				<span class="reminder" id="passwordinfo" style="display:none">6-20位字符，可使用字母、数字或符号的组合</span>
			</div>
			<div class="cap_enter">
				<label></label>
				<p><span class="automatic"><input name="remember" value="1" type="checkbox" checked="checked">下次自动登录</span> </p>
			</div>
			<span class="enter"><button type="submit" onclick="checklogin()">登 录</button></span>
			<p class="no_register">还不是指导网的会员? <a href="<?php echo site_url('user/register');?>">马上免费注册</a></p>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
	$("#username").focus(function(){
		$("#userinfo").show().html('请输入邮箱、用户名、手机号');
	}).blur(function(){
		$("#userinfo").hide();
	});

	$("#password").focus(function(){
		$("#passwordinfo").show().html('6-20位字符，可使用字母、数字或符号的组合');
	}).blur(function(){
		$("#passwordinfo").hide();
	});
});

function checklogin(){
	var username = $.trim($("#username").val());
	var password = $.trim($("#password").val());
	

	
	if(username == ''){
		$("#userinfo").show().html('用户名不能为空');
		return false;
	}

	if(password == ''){
		$("#passwordinfo").show().html('密码不能为空');
		return false;
	}

	jQuery.ajax({
		type : "POST",
		url : "<?php echo site_url('user/verify_login');?>",
		data : {
			username : username,
			password : password
		}
	});
}
</script>
</body>
</html>
