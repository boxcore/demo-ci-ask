<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>中国创业指导网-用户注册</title>
<link rel="stylesheet" type="text/css" href="<?php echo src_url('css/style.css');?>"/>
    <script src="<?php echo src_url('js/jquery-1.7.1.min.js');?>"></script>
    <script src="<?php echo src_url('js/common.js');?>"></script>
</head>
<body>
<div class="login_box">
	<div id="capacity">
		<div class="notice-icons message hide" id="message"> </div>
		<div class="cap_frame">
			<label>用户名: </label>
			<p class="cf_person"><em></em>
				<input name="username" value="" type="text" id="username">
			</p>
			<span class="reminder" id="userinfo" style="display:none">请输入邮箱、用户名、手机号</span>
		</div>
		<div class="cap_frame">
			<label>呢称: </label>
			<p class="cf_person"><em></em>
				<input name="nickname" value="" type="text" id="nickname">
			</p>
			<span class="reminder" id="nickinfo" style="display:none">例如:张三</span>
		</div>
		<div class="cap_frame">
			<label>密码: </label>
			<p class="cf_lock"><em></em>
				<input name="password" id="password" value="" type="password">
			</p>
			<span class="reminder mima" id="passwordinfo" style="display:none">6-20位字符，可使用字母、数字或符号的组合</span>
		</div>
		<div class="cap_frame">
			<label>确认密码: </label>
			<p class="cf_lock"><em></em>
				<input name="repassword" value="" type="password" id="repassword">
			</p>
			<span class="reminder mima" id="repasswordinfo" style="display:none">6-20位字符，可使用字母、数字或符号的组合</span>
		</div>
		<div class="cap_enter">
			<label></label>
			<p class="automatic"><a href="javascript:void(0);">《创业指导网用户注册协议》</a></p>
		</div>
        <input name="rel" type="hidden" value="<?php if( isset($_REQUEST['rel']) ) echo $_REQUEST['rel']; ?>"/>
		<span class="enter"><button type="submit" onclick="addUser()">注 册</button></span>
	</div>
	<div class="mrbc_right">
		<p class="have_account">已有<span>中国创业指导网</span>账号<a href="<?php echo site_url('user/login');?>">直接登录</a></p>
	</div>
</div>
<script type="text/javascript">
$(function(){
	$("#username").focus(function(){
		$("#userinfo").show().html('请输入邮箱、用户名、手机号');
	}).blur(function(){
		$("#userinfo").hide();
	});

	$("#nickname").focus(function(){
		$("#nickinfo").show().html('例如:张三');
	}).blur(function(){
		$("#nickinfo").hide();
	});

	$("#password").focus(function(){
		$("#passwordinfo").show().html('6-20位字符，可使用字母、数字或符号的组合');
	}).blur(function(){
		$("#passwordinfo").hide();
	});

	$("#repassword").focus(function(){
		$("#repasswordinfo").show().html('6-20位字符，可使用字母、数字或符号的组合');
	}).blur(function(){
		$("#repasswordinfo").hide();
	});
	
});

function addUser(){
	var username   = $.trim($("#username").val());
	var nickname   = $.trim($("#nickname").val());
	var password   = $.trim($("#password").val());
	var repassword = $.trim($("#repassword").val());

    var form_rel = $('input[name=rel]').val();
    if(form_rel == ''){
        form_rel = site_url+"user/center?ref="+window.location.href;
    }
	
	if(username == ''){
		$("#userinfo").show().html('用户名不能为空');
		return false;
	}

	if(nickname == ''){
		$("#nickinfo").show().html('昵称不能为空');
		return false;
	}

	if(password == ''){
		$("#passwordinfo").show().html('密码不能为空');
		return false;
	}

	if(repassword == ''){
		$("#repasswordinfo").show().html('密码不能为空');
		return false;
	}

	if(repassword !== password) {
		$("#repasswordinfo").show().html('两次密码不一样');
		return false;
	}

	jQuery.ajax({
		type : "POST",
		url : "<?php echo site_url('user/ajax_add_user');?>",
        dataType:"json",
		data : {
			username : username,
			nickname : nickname,
			password : password,
			repassword : repassword
		},
		success:function(data){
            if (data['flag']) {
				alert(data['message']);
				window.location.href = form_rel;
			} else {
				alert(data['message']);
                return false;
			}
		}
	});
}
</script>
</body>
</html>