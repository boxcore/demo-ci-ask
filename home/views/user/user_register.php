<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>中国创业指导网-用户注册</title>
<link rel="stylesheet" type="text/css" href="<?php echo src_url('css/style.css');?>"/>
</head>
<body>
	<div class="login_box">
		<form>
			<table width="640" border="0" class="loginbox_L">
				<tr>
					<td width="96" align="right">用户名：</td>
					<td width="472" class="case"><input name="username" type="text" class="user_name"></td>
				</tr>
				<tr>
					<td align="right">密码：</td>
					<td class="case"><input name="password" type="password" class="user_mes"></td>
				</tr>
				<tr>
					<td align="center">确认密码：</td>
					<td class="case"><input name="repassword" type="password" class="user_mes"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="automatic">《创业指导网用户注册协议》</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
						<div class="btnbg"><input name="" type="button" class="login_btn" value="同意协议并注册"></div>
					</td>
				</tr>
			</table>
		</form>
		<div class="mrbc_right">
			<p class="have_account">已有<span>中国创业指导网</span>账号<a href="<?php echo site_url('user/login');?>">直接登录</a></p>
		</div>
	</div>
</body>
</html>