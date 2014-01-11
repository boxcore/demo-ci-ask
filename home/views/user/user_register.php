<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>中国创业指导网-用户注册</title>
<link rel="stylesheet" type="text/css" href="<?php echo src_url('css/style.css');?>"/>
<script src="<?php echo src_url('js/jquery.validate.min.js');?>"></script>
<script src="<?php echo src_url('js/jquery-1.7.1.min.js');?>"></script>
<script src="<?php echo src_url('js/jquery.metadata.js');?>"></script>
</head>
<body>
<div class="login_box">
	<div id="capacity">
		<form name="" action="login" method="POST" id="login">
			<div class="notice-icons message hide" id="message"> </div>
			<div class="cap_frame">
				<label>用户名:</label>
				<p class="cf_person"><em></em>
					<input name="user" value="" type="text">
				</p>
				<span class="reminder">请输入邮箱、用户名、手机号</span>
			</div>
			<div class="cap_frame">
				<label>密码:</label>
				<p class="cf_lock"><em></em>
					<input name="password" value="" type="password">
				</p>
				<span class="reminder mima">6-20位字符，可使用字母、数字或符号的组合</span>
			</div>
			<div class="cap_frame">
				<label>确认密码:</label>
				<p class="cf_lock"><em></em>
					<input name="password" value="" type="password">
				</p>
			</div>
			<div class="cap_enter">
				<label></label>
				<p class="automatic"><a href="#">《创业指导网用户注册协议》</a></p>
			</div>
			<span class="enter"><button type="submit">登 录</button></span>
		</form>
	</div>
	<div class="mrbc_right">
		<p class="have_account">已有<span>中国创业指导网</span>账号<a href="#">直接登录</a></p>
	</div>
</div>
<script type="text/javascript">
$(function(){
	alert("1111111111");
	$("#register").validate();
});
</script>
</body>
</html>